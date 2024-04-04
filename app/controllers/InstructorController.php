<?php

require_once __DIR__ .  '/../models/InstructorModel.php';

class InstructorController {
    protected $instructorModel;

    public function __construct($db) {
        $this->instructorModel = new InstructorModel($db);
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nombre'])) {
            $this->instructorModel->crearInstructor($_POST['nombre'], $_POST['coordinador_id']);
            header('Location: /instructor/listar');
            exit;
        }

        $coordinadores = $this->instructorModel->obtenerCoordinadores();
        require_once __DIR__ . '/../views/instructor/agregar.php';
    }

    public function listar() {
        $instructores = $this->instructorModel->obtenerInstructoresConCoordinadores();
        require_once __DIR__ . '/../views/instructor/listar.php';
    }

    public function eliminar() {
        if (!empty($_GET['id'])) {
            $this->instructorModel->eliminar($_GET['id']);
        }
        header('Location: /instructor/listar');
        exit;
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nombre'])) {
            $this->instructorModel->actualizarInstructor($_POST['id'], $_POST['nombre'], $_POST['coordinador_id']);
            header('Location: /instructor/listar');
            exit;
        }

        if (!empty($_GET['id'])) {
            $instructor = $this->instructorModel->obtenerInstructorPorId($_GET['id']);
            if (!$instructor) {
                exit('Instructor no encontrado.');
            }
            $coordinadores = $this->instructorModel->obtenerCoordinadores();
            require_once __DIR__ . '/../views/instructor/editar.php';
        } else {
            exit('ID de instructor requerido.');
        }
    }
}
