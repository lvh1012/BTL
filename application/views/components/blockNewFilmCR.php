<div class="block">
    <h2 class="block-title">
        <span class="title">
            Phim chiếu rạp mới
        </span>
        <a class="more" href="/film/filmcr" title="Phim chiếu rạp mới">
            Xem thêm
        </a>
    </h2>
    <div class="block-body">
        <ul class="list-film">
            <?php
            foreach ($data['phim-chieu-rap-moi'] as $film) {
                echo '<li>
                <a class="movie-item" href="/film/detail/'.$film->film_id.'">
                    <div class="block-wrap">
                        <div class="movie-thumbnail">
                            <img src="'. $film->poster .'" alt="">
                        </div>
                        <div class="movie-meta">';
                echo '<div class="movie-title-vi">'.$film->name_vi.'</div>';
                echo '<span class="movie-title-en">'.$film->name_en.'</span>';
                echo '<span class="movie-title-time">'.$film->time.' phút</span>';
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