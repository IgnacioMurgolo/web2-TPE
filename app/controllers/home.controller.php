<?php
require_once '../TPE/app/models/motos.model.php';
require_once '../TPE/app/views/home.view.php';
require_once '../TPE/app/models/modelos.model.php';
require_once '../TPE/app/helpers/auth.helper.php';
class HomeController
{
    private $model;
    private $viewHome;
    private $modeloModel;

    public function __construct()
    {
        $this->model = new MotosModel();
        $this->viewHome = new HomeView();
        $this->modeloModel = new ModelosModel();
    }
    public function showHome()
    {
        $motos = $this->model->getMotos();
        $this->viewHome->showHome($motos);
    }
    public function showProperties($id)
    {
        $properties = $this->model->getPropertiesById($id);
        $this->viewHome->showProperties($properties);
    }

    public function showPropertiesByModelo($modelo)
    {
        $properties = $this->modeloModel->getProperties($modelo);
        $this->viewHome->showProperties($properties);
    }

    public function showModels()
    {
        $models = $this->modeloModel->getModelos();
        $this->viewHome->showModels($models);
    }
}

?>