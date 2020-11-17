<?php

require_once "vendor/autoload.php";

require_once "bootstrap.php";

use App\Controller\UsuarioController;
use App\Controller\SessionController;
use App\Controller\AreaTecController;
use App\Controller\EquipamentoController;
use App\Controller\TecnicoController;
use App\Controller\ChamadoController;
use App\Controller\ComentarioController;
use App\Controller\UsuarioTipoController;
use App\Controller\CentroCustoController;
use App\Entity\Equipamento;
use Klein\Klein;

$klein = new Klein();

function verificaLogin($token) {
    $autenticado = (new SessionController())->verificaLogado($token);

    if (!$autenticado) {
        throw new \Exception("Usuario nao autenticado", 564);
    }
}

function returnUsuarioNaoAutenticadoOrExeption($exception) {
    return $exception->getMessage();
    return json_encode([
        "success" => false,
        "msg" => "Usuario nao autenticado"
    ]);
}

$klein->respond('GET', '/usuarios', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new UsuarioController())->getUsuarios());
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('GET', '/usuariosComTipo', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new UsuarioController())->getUsuariosComDescricao());
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('POST', '/usuario', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new UsuarioController())->insertUsuario(json_decode($request->body(), true)));
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('GET', '/usuarios/[i:id]', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new UsuarioController())->getUsuarioById($request->id));
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('POST', '/login', function ($request) {
    return json_encode((new SessionController())->login(json_decode($request->body(), true)));
});

$klein->respond('GET', '/areaTec', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new AreaTecController())->getAreaTecs());
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('GET', '/equipamento', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new EquipamentoController())->getEquipamentos());
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('GET', '/equipamentoId/[i:id]', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new EquipamentoController())->getEquipamentoById($request->id));
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('GET', '/centroCusto', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new CentroCustoController())->getCentroCustos());
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('GET', '/tecnico', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new TecnicoController())->getTecnicos());
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('GET', '/chamado', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new ChamadoController())->getChamados());
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('GET', '/chamados/[i:id]', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new ChamadoController())->getChamadoById($request->id));
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('POST', '/chamado', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new ChamadoController())->inserirChamado(json_decode($request->body(), true)));
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('POST', '/chamado/[i:id]', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new ChamadoController())->alterarChamado($request->id, json_decode($request->body(), true)));
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('GET', '/comentario', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new ComentarioController())->getComentarios());
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('GET', '/comentario/[i:id]', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new ComentarioController())->getComentarioById($request->id));
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('POST', '/comentario', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new ComentarioController())->inseriComentario(json_decode($request->body(), true)));
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('GET', '/comentarioPorChamado/[i:idChamado]', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new ComentarioController())->getComentarioByIdChamado($request->idChamado));
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

//Pesquisas com Joins Específicos

$klein->respond('GET', '/chamadoCompleto/[i:id]', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new ChamadoController())->getChamadoCompletoById($request->id));
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});


//rotas para preencher DB para testes

$klein->respond('POST', '/insertEquipamento', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new EquipamentoController())->insertEquipamento(json_decode($request->body(), true)));
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('POST', '/insertCentroCusto', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new CentroCustoController())->insertCentroCusto(json_decode($request->body(), true)));
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('POST', '/insertAreaTecnica', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new AreaTecController())->insertAreaTecnica(json_decode($request->body(), true)));
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('POST', '/insertUsuarioTeste', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new UsuarioController())->insertUsuarioTeste(json_decode($request->body(), true)));
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->respond('POST', '/insertTecnico', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new TecnicoController())->insertTecnico(json_decode($request->body(), true)));
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});


$klein->respond('POST', '/insertUsuarioTipoTeste', function ($request) {
    try {
        verificaLogin($request->headers()->get("AuthorizationManut"));
        return json_encode((new UsuarioTipoController())->insertUsuariosTiposTeste());
    } catch (\Exception $exception) {
        return returnUsuarioNaoAutenticadoOrExeption($exception);
    }
});

$klein->dispatch();