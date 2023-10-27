<?php
require_once 'app/models/modelos.model.php';
require_once 'app/models/motos.model.php';
require_once 'app/views/abmMotos.view.php';
require_once 'app/helpers/auth.helper.php';

class AbmMotosController
{
    private $model;
    private $modelosModel;
    private $view;

    public function __construct()
    {
        AuthHelper::verify();
        $this->model = new MotosModel();
        $this->modelosModel = new ModelosModel();
        $this->view = new AbmMotosView();
    }

    public function showMotos()
    {
        $motos = $this->model->getMotos();
        $modelos = $this->modelosModel->getModelos();
        $this->view->showMotos($motos, $modelos);
    }
    public function showProperties($id)
    {
        $properties = $this->model->getPropertiesById($id);
        $this->view->showProperties($properties);
    }

    public function editMoto($id)
    {
        $moto = $this->model->getMotoById($id);
        $modelos = $this->modelosModel->getModelos();
        $this->view->editMoto($moto, $modelos, $id);
    }

    public function updateMoto()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $anio = $_POST['anio'];
            $precio = $_POST['precio'];
            if (isset($id) && isset($marca) && isset($modelo) && isset($anio) && isset($precio)) {
                $this->model->updateMoto($id, $marca, $modelo, $anio, $precio);
                header('Location: ' . BASE_URL . 'abmMotos');
            } else {
                $this->view->showError("Debe completar todos los campos");
            }

        }
    }

    public function removeMoto($id)
    {
        if (isset($id)) {
            $this->model->deleteMoto($id);
            header('Location: ' . BASE_URL . 'abmMotos');
        }
    }

    public function addMoto()
    {
        if (!empty($_POST)) {
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $anio = $_POST['anio'];
            $precio = $_POST['precio'];
            if (isset($marca) && isset($modelo) && isset($anio) && isset($precio)) {
                $this->model->addMoto($marca, $modelo, $anio, $precio);
                header('Location: ' . BASE_URL . 'abmMotos');
            } else {
                $this->view->showError("Debe completar todos los campos");
            }
        }
    }
}


?>