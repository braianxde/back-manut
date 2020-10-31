<?php

namespace Common;
require_once "bootstrap.php";
require_once "Controller/UsuarioController.php";
require_once "Controller/SessionController.php";
require_once "Controller/AreaTecController.php";
require_once "Controller/EquipamentoController.php";
require_once "Controller/CentroCustoController.php";
require_once "Controller/TecnicoController.php";

use Controller\SessionController;
use Controller\UsuarioController;
use Controller\AreaTecController;
use Controller\EquipamentoController;
use Controller\CentroCustoController;
use Controller\TecnicoController;
use Klein\Klein;

$klein = new Klein();

function verificaLogin($token) {
    $autenticado = (new SessionController())->verificaLogado($token);

    if (!$autenticado) {
        throw new \Exception("Usuario nao autenticado", 564);
    }
}

function returnUsuarioNaoAutenticado() {
    return json_encode([
        "success" => false,
        "msg" => "Usuario nao autenticado"
    ]);
}

$klein->respond('GET', '/usuarios', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new UsuarioController())->getUsuarios());
    } catch (\Exception $e) {
        return returnUsuarioNaoAutenticado();
    }
});

$klein->respond('POST', '/usuario', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new UsuarioController())->insertUsuario(json_decode($request->body(), true)));
    } catch (\Exception $e) {
        return returnUsuarioNaoAutenticado();
    }
});

$klein->respond('GET', '/usuarios/[i:id]', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new UsuarioController())->getUsuarioById($request->id));
    } catch (\Exception $e) {
        return returnUsuarioNaoAutenticado();
    }
});

$klein->respond('POST', '/login', function ($request) {
    return json_encode((new SessionController())->login(json_decode($request->body(), true)));
});

$klein->respond('GET', '/areaTec', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new AreaTecController())->getAreaTecs());
    } catch (\Exception $e) {
        return returnUsuarioNaoAutenticado();
    }
});

$klein->respond('GET', '/equipamento', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new EquipamentoController())->getEquipamentos());
    } catch (\Exception $e) {
        return returnUsuarioNaoAutenticado();
    }
});

$klein->respond('GET', '/centroCusto', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new CentroCustoController())->getCentroCustos());
    } catch (\Exception $e) {
        return returnUsuarioNaoAutenticado();
    }
});

$klein->respond('GET', '/tecnico', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new TecnicoController())->getTecnicos());
    } catch (\Exception $e) {
        return returnUsuarioNaoAutenticado();
    }
});


$klein->dispatch();