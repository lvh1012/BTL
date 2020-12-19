<div class="block">
    <h2 class="block-title">
        <span class="title">
        TÌM KIẾM: <?php echo $data['keyword'] ?>
        </span>
    </h2>
    <div class="block-body">
        <ul class="list-film">
            <?php
            foreach ($data['data'] as $film) {
                echo '<li>
                <a class="movie-item" href="/film/detail/'.$film->film_id.'">
                    <div class="block-wrap">
                        <div class="movie-thumbnail">
                            <img src="' . $film->poster . '">
                        </div>
                        <div class="movie-meta">';
                echo '<div class="movie-title-vi">' . $film->name_vi . '</div>';
                echo '<span class="movie-title-en">' . $film->name_en . '</span>';
                echo '<span class="movie-title-time">' . $film->time . ' phút</span>';
                echo '<span class="ribbon">HD-Vietsub</span>';
                echo ' </div>
                </div>
            </a>
        </li>';
            }
            ?>
        </ul>
    </div>
</div>