<?php

class AuthView
{
    public function showLogin()
    {
        require 'templates/header.phtml';
        require 'templates/login.phtml';
        require 'templates/footer.phtml';
    }

    public function showError($error) {
        require 'templates/header.phtml';
        require 'templates/error.phtml';
        require 'templates/footer.phtml';
    }
}


?>