<?php
    require($_SERVER['DOCUMENT_ROOT'].'/config.php');
    require(root.'/vendor/autoload.php');

    use GuzzleHttp\Client;

    const authentification_parameters = "api_key=7222b8d04bf749f83dd5b306f3e4abf4";
    const base_url = "https://api.themoviedb.org/3";
    const image_url = "http://image.tmdb.org/t/p/original/";
    
    /**
     * Retourn un client http prêt à envoyer des requêtes
     * @return GuzzleHttp\Client
     */
    function get_client(){
        $client = new Client([
            'verify' => false,
            'stream' => false,
        ]);
        return $client;
    }
    
    /**
     * Envoie une requête à l'url passé en paramètre et récupère le body 
     * @param GuzzleHttp\Client $client 
     * @param string $url
     * @return object : objet parse du json reçu
     */
    function make_a_request(Client $client, string $url){
        $response = $client->get($url);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * Envoie une requête sur l'api movie db pour récupérer les filmes les plus populaires
     * @return array tableau des 20 derniers filmes les plus populaires
     */
    function get_films(int $page=1){
        $client= get_client();
        $body_response= make_a_request($client,base_url.'/movie/popular?page='.$page.'&language=fr&'.authentification_parameters); 
        return $body_response->results;
    }


    /**
     * Envoie une requête sur l'api movie db pour récupérer le film voulu
     * @param int $id : id du film à récupérer
     * @return object : objet contenant les infos du film
     */
    function get_film_by_id(int $id){
        $client = get_client();
        return make_a_request($client,base_url.'/movie/'.$id.'?language=fr&'.authentification_parameters);
        
    }

    function get_film_reviews_by_id(int $id){
        $client = get_client();
        return make_a_request($client,base_url.'/movie/'.$id.'/reviews?language=fr&'.authentification_parameters);

    }

    /**
     * Vérifie si l'id est bien défini dans la superglobale GET
     * @return bool true si elle est bien définie sinon false
     */
    function detail_verify_get(){
        if(isset($_GET['id'])){
            if(intval($_GET['id']) != 0){
                return true;
            }
        }
        return false;
    }

?>