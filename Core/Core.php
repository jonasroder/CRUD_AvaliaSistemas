<?php

class Core
{
    public function __construct()
    {
        $this->run();
    }

    public function run()
    {   
        $controller = 'Veiculos';
        $metodo = 'index';
        $parametros = array();

        if (isset($_GET['pag'])) {
            $url = $_GET['pag'];
        }

        //Possui informação após dominio www.site.com/classe/função/parametro
        if (!empty($url)) {
            $url = explode('/', $url);
            $controller = ucfirst($url[0]); //Pega a classe
            
            if(isset($url[1]) && !empty($url[1])){
                $metodo = $url[1]; //Pega o Método 
            }
            
            if(isset($url[2]) && !empty($url[2])){
                $parametros = array($url[2]); // Pega O parametro
            }

        }

        $caminho = '/Controllers/'.$controller.'.php';

        if(!file_exists($caminho) && !method_exists($controller, $metodo)){
            $controller = 'Veiculos';
            $metodo = 'index';
        }
        
        $c = new $controller;

        call_user_func_array(array($c,$metodo), $parametros);
    }
}
