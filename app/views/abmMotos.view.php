<?php

class AbmMotosView{

    public function showMotos($motos, $modelos){
        require 'templates/header.phtml';
        require 'templates/motosTable.phtml';
        require 'templates/formMoto.phtml';
        require 'templates/footer.phtml';
    }

    public function editMoto($moto, $modelos, $id){
        require 'templates/header.phtml';
        require 'templates/editForm.phtml';
        require 'templates/footer.phtml';
    }
    public function showError($error) {
        require 'templates/header.phtml';
        require 'templates/error.phtml';
        require 'templates/footer.phtml';
    }
    public function showProperties($properties)
    {
        require 'templates/header.phtml';
        require 'templates/properties.phtml';
        require 'templates/footer.phtml';
    }
}


?>