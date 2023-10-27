<?php
require_once 'app/models/user.model.php';
require_once 'app/views/auth.view.php';
require_once 'app/helpers/auth.helper.php';
class AuthController{
    private $model;
    private $view;

    function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function auth() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $this->view->showError('Faltan completar datos');
            return;
        }

        $user = $this->model->getByUsername($username);
        if ($user && password_verify($password, $user->password)) {
            AuthHelper::login($user);
            header('Location: ' . BASE_URL . 'abmMotos');
        } else {
            $this->view->showError('Usuario o contraseña incorrectos');
        }
    }

    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL . 'login');    
    }
}

?>