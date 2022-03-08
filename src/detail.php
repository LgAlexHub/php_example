<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/config.php");
    require_once(root."/src/functions.php");
    $movie;
    if (detail_verify_get()){
        $movie= get_film_by_id(intval($_GET['id']));
        $date= date_create($movie->release_date);
        $date= date_format($date, 'd/m/Y ');
    }else{
        header('Location: http://moviez/');
    }
    $title= $movie->title;
    require_once(root."/inc/header.php");
?>
    <div class="container mt-2">
        <p class="h3">
            <?= $movie->title ?>
        </p>
        <div class="row">
            <div class="col">
                <img class="w-100" src="<?= image_url.$movie->poster_path ?>" alt="">
            </div>
            <div class="col">
                <p class="h2">
                    Synopsis :
                </p>
                <p class="h6">
                    <?= $movie->overview ?>
                </p>
                <hr>
                <p class="h5">
                    Sortie le : <?= $date ?>
                </p>
                <hr>
                <p class="h4">Genres :</p>
                <?php 
                    foreach($movie->genres as $genre){
                        echo "<span class='badge rounded-pill bg-primary m-2'>
                            $genre->name
                        </span>";
                    }
                ?>
                <hr>
                <p class="h2">
                    Budget :
                </p>
                <p>
                    <?= $movie->budget ?> $
                </p>
                <hr>
                <p class="h2">
                    Produit par : 
                </p>
                <div class="row row-cols-3">
                    <?php 
                        foreach($movie->production_companies as $company){
                            $company_logo_url= image_url.$company->logo_path;
                            $company_name= $company->name;
                            require(root."/inc/components/company_item.php");
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once(root."/inc/footer.php");
?>