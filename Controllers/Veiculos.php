<?php
require_once './Models/VeiculosModel.php';

class Veiculos {

    public function index()
    {
        require_once 'Views/template.php';
    }

    public function create()
    {
        $veiculosModel = new VeiculosModel();
        echo json_encode($veiculosModel->create($_POST));
    }

    public function read()
    {
        $veiculosModel = new VeiculosModel();
        if (isset($_POST)) {
            echo json_encode($veiculosModel->read($_POST));
            return;
        }

        echo json_encode($veiculosModel->read(null));
    }

    public function update()
    {
        $veiculosModel = new VeiculosModel();
        $id = $_POST['idveiculos'];
        unset($_POST['idveiculos']);
        echo json_encode($veiculosModel->update($id, $_POST));
    }

    public function delete($id)
    {
        $veiculosModel = new VeiculosModel();
        echo json_encode($veiculosModel->delete($id));
    }

}