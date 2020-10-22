<?php

namespace Common;
require_once "Controller/UsuarioController.php";
require_once "bootstrap.php";

use Controller;
use Klein\Klein;


$klein = new Klein();

$klein->respond('GET', '/usuarios', function () use ($entityManager) {
    return json_encode((new Controller\UsuarioController($entityManager))->getUsuarios());
});

$klein->respond('POST', '/usuario', function ($request) use ($entityManager) {
    return json_encode((new Controller\UsuarioController($entityManager))->insertUsuario(json_decode($request->body(), true)));
});

$klein->respond('GET', '/usuarios/[i:id]', function ($request) use ($entityManager) {
    return json_encode((new Controller\UsuarioController($entityManager))->getUsuarioById($request->id));
});

$klein->dispatch();