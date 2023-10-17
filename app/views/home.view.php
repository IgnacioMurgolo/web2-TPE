<?php

class HomeView
{
    public function showHome($motos)
    {
        require 'templates/header.phtml';
        require 'templates/home.phtml';
        require 'templates/footer.phtml';
    }
    public function showProperties($properties)
    {
        require 'templates/header.phtml';
        require 'templates/properties.phtml';
        require 'templates/footer.phtml';
    }
    public function showModels($models)
    {
        require 'templates/header.phtml';
        require 'templates/models.phtml';
        require 'templates/footer.phtml';
    }

    public function showError($error) {
        require 'templates/header.phtml';
        require 'templates/error.phtml';
        require 'templates/footer.phtml';
    }
}

?>