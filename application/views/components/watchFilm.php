<?php
echo '<script>document.title=" Xem phim ' . $data['data']->name_vi . ' | PHIMHAY.VN";</script>';
?>

<div class="watch-film">
    <div class="movie-gt">

        <div class="movie-gt-left">
            <img src="<?php echo $data['data']->poster; ?>">
            <div class="movie-trailer">
                <a href="<?php echo $data['data']->trailer ?>">Trailer</a>
            </div>
        </div>

        <div class="movie-gt-right">
            <div class="movie-tt">
                <h1><a href="#"><?php echo "XEM PHIM " . $data['data']->name_vi; ?></a></h1>
                <p><?php echo "Xem phim " . $data['data']->name_en; ?></p>
                <div class="movie-tt-nd">
                    <p><?php echo $data['data']->description; ?>[<a href="<?php echo "/film/detail/" . $data['data']->film_id; ?>">Xem thêm</a>]</p>
                </div>
            </div>
        </div>
    </div>

    <div class="movie" style="margin-top: 10px">
        <iframe width="640" height="360" src="<?php echo $data['data']->resource ?>"></iframe>
    </div>

    <div class="movie-dg" style="margin-top: 10px; background-color: #333;padding: 10px">
        <h1>Đánh giá phim <div class="fb-share-button" data-href="<?php echo "http://phimhay.vn/film/detail/" . $data['data']->film_id ?>" data-layout="button_count" style="float: right; margin-top: -10px;">
            </div>
        </h1>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div class="movie-dg-nd">
            <table>
                <td>
                    <?php
                    if ($data['like']) {
                        echo '<button id="like" class="btn-action active" onclick="like()">';
                    } else {
                        echo '<button id="like" class="btn-action" onclick="like()">';
                    }
                    ?>
                    <img src="/assets/images/like.png">
                    </button>
                </td>
                <td>
                    <p id="count-like"><?php echo $data['data']->num_like ?></p>
                </td>
                <td>

                    <?php
                    if ($data['dislike']) {
                        echo '<button id="dislike" class="btn-action active" style="margin-left: 10px;" onclick="dislike()">';
                    } else {
                        echo '<button id="dislike" class="btn-action" style="margin-left: 10px;" onclick="dislike()">';
                    }
                    ?>
                        <img src="/assets/images/dislike.png">
                    </button>
                </td>
                <td>
                    <p id="count-dislike"><?php echo $data['data']->num_dislike ?></p>
                </td>
            </table>
        </div>
    </div>

    <!-- <div class="movie-tap">
        <h1>Tập</h1>
        <div class="movie-tap-nd">
            <a href="#">1</a>
            <a href="#">1</a>
            <a href="#">1</a>
            <a href="#">1</a>
            <a href="#">1</a>
        </div>
    </div> -->
</div>