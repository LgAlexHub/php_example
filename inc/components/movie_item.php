<div class="col-lg-3 d-flex align-items-strech p-1">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                <?= $movie_title ?>
            </h5>
        </div>
        <img class="card-img-top" src="<?= $movie_img_url ?>" alt="Poster <?php $movie_title ?>">
        <div class="card-body">
            <div class="mh-50">
                <p class="card-text overflox-hidden">
                    <?= $movie_overview ?>
                </p>
            </div>
        </div>
        <div class="card-footer">
            <a href="http://moviez/src/detail.php?id=<?=$movie_id?>" class="btn btn-primary w-100">
                Détail
            </a>
        </div>
    </div>
</div>