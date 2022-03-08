<?php
    $title= 'Accueil';
    require_once($_SERVER['DOCUMENT_ROOT']."/config.php");
    require_once(root."/src/functions.php");
    require_once(root."/inc/header.php");
    require_once(root."/inc/header.php");
    $movies=[];
    if (isset($_GET['page'])){
        $movies= get_films($_GET['page']);
    }else{
        $movies= get_films();
    }
?>
    <div class="container p-2">
        <div class="row row-cols-4">
            <?php 
                foreach ($movies as $movie) {
                    $movie_img_url= image_url.$movie->poster_path;
                    $movie_title= $movie->original_title;
                    $movie_overview= $movie->overview;
                    $movie_id= $movie->id;
                    require(root."/inc/components/movie_item.php");
                }
            ?>
        </div>
        <div class="d-flex justify-content-around">
            <?php  
               $direction= "Précédent";
               require(root."/inc/button.php");
               $direction= "Suivant";
               require(root."/inc/button.php");
            ?>
        </div>
    </div>

<?php
    require_once(root."/inc/footer.php");
?>