<?php 

class AbmModelosView{

    public function showModelos($modelos){
        require 'templates/header.phtml';
        require 'templates/modelosTable.phtml';
        require 'templates/formModeloAdd.phtml';
        require 'templates/footer.phtml';
    }

    public function showPropertiesByModel($properties){
        require 'templates/header.phtml';
        require 'templates/properties.phtml';
        require 'templates/footer.phtml';
    }

    public function editModelo($modelo){
        require 'templates/header.phtml';
        require 'templates/editFormModelo.phtml';
        require 'templates/footer.phtml';
    }

    public function showError($error) {
        require 'templates/header.phtml';
        require 'templates/error.phtml';
        require 'templates/footer.phtml';
    }

    
}

?>