<?php
require_once '../TPE/app/models/modelos.model.php';
require_once '../TPE/app/views/abmModelos.view.php';
require_once '../TPE/app/helpers/auth.helper.php';
class AbmModelosController
{
    private $view;
    private $model;

    public function __construct()
    {
        AuthHelper::verify();
        $this->view = new AbmModelosView();
        $this->model = new ModelosModel();
    }

    public function showModelos()
    {
        $modelos = $this->model->getAllModelos();
        $this->view->showModelos($modelos);
    }

    public function showPropertiesByModelo($modelo)
    {
        $properties = $this->model->getProperties($modelo);
        $this->view->showPropertiesByModel($properties);
    }

    public function editModelo($modelo)
    {
        $modelo = $this->model->getModeloByModelo($modelo);
        $this->view->editModelo($modelo);

    }

    public function updateModelo()
    {
        if (!empty($_POST)) {
            $modelo = $_POST['modelo'];
            $cilindrada = $_POST['cilindrada'];
            $velocidad = $_POST['velocidad_max'];
            $tipo_uso = $_POST['tipo_uso'];
            $capacidad = $_POST['capacidad_tanque'];

            if (isset($cilindrada) && isset($velocidad) && isset($modelo) && isset($tipo_uso) && isset($capacidad)) {
                $this->model->updateModelo($modelo, $velocidad, $cilindrada, $tipo_uso, $capacidad);
                header('Location: ' . BASE_URL . 'abmModelos');
            } else {
                $this->view->showError("Debe completar todos los campos");
            }

        }

    }

    public function addModelo()
    {
        if (!empty($_POST)) {
            $modelo = $_POST['modelo'];
            $cilindrada = $_POST['cilindrada'];
            $velocidad = $_POST['velocidad_max'];
            $tipo_uso = $_POST['tipo_uso'];
            $capacidad = $_POST['capacidad_tanque'];

            $existe = $this->model->verifyModeloMoto($modelo);
            if (!$existe) {
                if (isset($cilindrada) && isset($velocidad) && isset($modelo) && isset($tipo_uso) && isset($capacidad)) {
                    $this->model->addModelo($modelo, $velocidad, $cilindrada, $tipo_uso, $capacidad);
                    header('Location: ' . BASE_URL . 'abmModelos');
                } else {
                    $this->view->showError("Debe completar todos los campos");
                }
            } else {

                $this->view->showError("El modelo ya existe");
            }
        }
    }

    public function deleteModelo($modelo)
    {
        $existe = $this->model->verifyModeloMoto($modelo);

        if ($existe) {
            $this->view->showError("El género a eliminar está siendo usado por una canción");
        } else {
            $this->model->deleteModelo($modelo);
            header('Location: ' . BASE_URL . 'abmModelos');
        }
    }

}

?>