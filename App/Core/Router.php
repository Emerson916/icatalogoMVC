<?php
    namespace App\Core;

class Router{

    private $controller;
    private $method = "index";
    private $params;

    function __construct(){
        //recuperar a URl que está sendo acessada
        $url = $this->parseURL();

        //se o controller existir dentro da pasta de controllers
        if(isset($url[1]) && file_exists("../App/Controller/" . $url[1] . ".php")){

            $this->controller = $url[1];
            unset($url[1]);
        }elseif(empty($url[1])){

            //Setamos o controller padrão da aplicação (produtos)
            $this->controller = "produtos";
        }else{
            //Se não existir e houver um controller na url
            //exibimos página não encontrada
           $this->controller = "erro404";
        }
        
        //importamos o controller
        require_once "../App/Controller/" . $this->controller . ".php";

        //instancia o controller
        $this->controller = new $this->controller;

        //Se houver um método na url e ele existir no controller
        //atribuimos ao atributo method 
        if(isset($url[2])){
            if(method_exists($this->controller, $url[2])){
                $this->method = $url[2];
                unset($url[2]);
                unset($url[0]);
            }
        }

        //Pegamos os paramentros da url
        $this->params = $url ? array_values($url) : [];


        //Executamos o método dentro do controller, passando os paramentros
        call_user_func_array([$this->controller, $this->method], $this->params );
    }

    //Recuperar a URL e retornar os parametros
    private function parseURL(){
        return explode("/", $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
    }
}