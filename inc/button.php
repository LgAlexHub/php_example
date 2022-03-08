<?php
    $get_isset = isset($_GET['page']);
    $url= "http://".$_SERVER['SERVER_NAME']."?page=";
    if ($direction == "Suivant"){
        if ($get_isset){
            $url.= $_GET['page']+1;
        }else {
            $url.= "2";
        }
    }else{
       if ($get_isset){
            if ($_GET['page']>=2){
                $url.= $_GET['page']-1;
            }else{
                $url.= "1";
            }
       }else {
            $url.= "1";
       }
    }
?>

<a href="<?= $url ?>">
    <button class="btn btn-primary">
        <?= $direction ?>
    </button>
</a>