<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Credentials: true');

function carregaClasse($nomeDaClasse) {
    $pastas = ['Common', 'Controller', "Entity"];

    foreach ($pastas as $pasta) {
        $arquivo = "{$pasta}/{$nomeDaClasse}.php";
        if(file_exists($arquivo)){
            require_once($arquivo);
        }
    }
}

spl_autoload_register("carregaClasse");

require_once "Common/Router.php";

