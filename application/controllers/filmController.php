<?php

class filmController extends framework
{


    public function __construct()
    {
        $this->filmModel = $this->model('filmModel');
    }

    public function index($filmID)
    {
        $this->view("not-found");
    }

    public function filmcr()
    {
        $data = $this->filmModel->getFilm(1);
        $this->view("filmcr", $data);
    }

    public function filmbo()
    {
        $data = $this->filmModel->getFilm(3);
        $this->view("filmbo", $data);
    }

    public function filmle()
    {
        $data = $this->filmModel->getFilm(2);
        $this->view("filmle", $data);
    }

    public function request()
    {
        $this->view("request");
    }

    public function detail($filmID = null)
    {
        if (isset($filmID) && !empty($filmID)) {
            $data = [
                'data' => $this->filmModel->getDetail($filmID),
                'comment' => $this->filmModel->getComment($filmID),
                'favorite' => false,
                'like' => false,
                'dislike' => false,
                'actor' => $this->filmModel->getActor($filmID),
                'director' => $this->filmModel->getDirector($filmID),
            ];
            if ($this->getSession('userId')) {
                $data['favorite'] = $this->filmModel->isFavorite($this->getSession('userId'), $filmID);
                $data['like'] = $this->filmModel->isLike($this->getSession('userId'), $filmID);
                $data['dislike'] = $this->filmModel->isDislike($this->getSession('userId'), $filmID);
            }
            $this->view("detail", $data);
        } else {
            $this->view("not-found");
        }
    }

    public function watch($filmID = null)
    {
        if (isset($filmID) && !empty($filmID)) {
            // them phim vao danh sach xem gan nhat
            $watchLatest = $this->getNoti("watchLatest");
            if (isset($watchLatest)) {
                $list = explode("|", $watchLatest);
                if (!in_array($filmID, $list)) {
                    if (count($list) == 4) {
                        array_shift($list);
                    }
                    array_push($list, $filmID);
                    $this->setNoti("watchLatest", join("|", $list));
                }
            } else {
                $this->setNoti("watchLatest", $filmID);
            }

            // tang view len 1 don vi
            $this->filmModel->increView($filmID);

            $data = [
                'data' => $this->filmModel->getDetail($filmID),
                'comment' => $this->filmModel->getComment($filmID),
                'like' => false,
                'dislike' => false
            ];

            if ($this->getSession('userId')) {
                $data['like'] = $this->filmModel->isLike($this->getSession('userId'), $filmID);
                $data['dislike'] = $this->filmModel->isDislike($this->getSession('userId'), $filmID);
            }
            $this->view("watch", $data);
        }
        else{
            $this->view("not-found");
        }
    }

    public function search()
    {
        $keyword = $_POST['keyword'];
        $data = [
            'data' => $this->filmModel->searchByKeyword($keyword),
            'keyword' => $keyword
        ];
        // var_dump($data);
        $this->view('search', $data);
    }

    public function download($filmID)
    {
        $film = $this->filmModel->getFilmByID($filmID);
        $filepath = ROOT . DS . "public" . $film->resource;
        // Process download
        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);
            exit;
        }
    }
}
