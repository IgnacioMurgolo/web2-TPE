<?php
require_once 'app/controllers/home.controller.php';
require_once 'app/controllers/auth.controller.php';
require_once 'app/controllers/abmMotos.controller.php';
require_once 'app/controllers/abmModelos.controller.php';


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new HomeController();
        $controller->showHome();
        break;
    case 'verMas':
        $controller = new HomeController();
        $controller->showProperties($params[1]);
        break;
    case 'listarModelos':
        $controller = new HomeController();
        $controller->showModels();
        break;
    case 'verMasModelo':
        $controller = new HomeController();
        $controller->showPropertiesByModelo($params);
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'abmMotos':
        $controller = new AbmMotosController();
        $controller->showMotos();
        break;
    case 'verMasAdm':
        $controller = new AbmMotosController();
        $controller->showProperties($params[1]);
        break;
    case 'verMasModeloAdm':
        $controller = new AbmModelosController();
        $controller->showPropertiesByModelo($params[1]);
        break;
    case 'editMoto':
        $controller = new AbmMotosController();
        $controller->editMoto($params[1]);
        break;
    case 'updateMoto':
        $controller = new AbmMotosController();
        $controller->updateMoto();
        break;
    case 'add':
        $controller = new AbmMotosController();
        $controller->addMoto();
        break;
    case 'delete':
        $controller = new AbmMotosController();
        $controller->removeMoto($params[1]);
        break;
    case 'abmModelos':
        $controller = new AbmModelosController();
        $controller->showModelos();
        break;
    case 'editModelo':
        $controller = new AbmModelosController();
        $controller->editModelo($params[1]);
        break;
    case 'updateModelo':
        $controller = new AbmModelosController();
        $controller->updateModelo();
        break;
    case 'addModelo':
        $controller = new AbmModelosController();
        $controller->addModelo();
        break;
    case 'deleteModelo':
        $controller = new AbmModelosController();
        $controller->deleteModelo($params[1]);
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default:
        echo "404 Page Not Found";
        break;

}
?>