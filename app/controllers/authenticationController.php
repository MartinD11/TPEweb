<?php
require_once './app/views/authenticationView.php';
require_once './app/models/userModel.php';
require_once './app/helpers/auth.helper.php';

class authenticationController {
    private $view;
    private $model;

    function __construct() {
        $this->model = new userModel();
        $this->view = new authenticationView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function ValidateUser(){
        $user = $_POST['user'];
        $password = $_POST['password'];

        if(empty($user) || empty($password)){
            $this->view->showLogin("faltan completar datos");
            return;
        }

        $user = $this->model->getByUser($user);

        if($user && password_verify($password, $user->Password)){
            AuthHelper::login($user);
            
            header('Location: ' . BASE_URL);

        }else {
            $this->view->showLogin('Usuario inválido');
        }

    }

    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL. '/home');    
    }


}