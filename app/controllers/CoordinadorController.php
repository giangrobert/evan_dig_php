<?php

require_once __DIR__ . '/../models/CoordinadorModel.php'; // Asegúrate de ajustar la ruta

class CoordinadorController {
    protected $coordinadorModel;

    public function __construct($db) {
        $this->coordinadorModel = new CoordinadorModel($db);
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nombre'])) {
            $this->coordinadorModel->crearCoordinador($_POST['nombre']);
            header('Location: /coordinador/listar');
            exit;
        }

        require_once __DIR__ . '/../views/coordinador/crear.php';
    }
    public function listar() {
        $coordinadores = $this->coordinadorModel->obtenerCoordinadores();
        require_once __DIR__ . '/../views/coordinador/listar.php';
    }
    public function eliminar() {
        if (!empty($_GET['id'])) {
            $this->coordinadorModel->eliminarCoordinador($_GET['id']);
        }
        header('Location: /coordinador/listar');
        exit;
    }
    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nombre'])) {
            // Procesar el formulario
            $this->coordinadorModel->actualizarCoordinador($_POST['id'], $_POST['nombre']);
            header('Location: /coordinador/listar');
            exit;
        }

        if (!empty($_GET['id'])) {
            $coordinador = $this->coordinadorModel->obtenerCoordinadorPorId($_GET['id']);
            require_once __DIR__ . '/../views/coordinador/editar.php';
        } else {
            exit('ID de coordinador requerido.');
        }
    }

    public function mostrarDashboard() {
        $coordinadorId = $_GET['coordinador_id'] ?? null;
        $reporte = [];
        $coordinadores = $this->coordinadorModel->obtenerCoordinadores2();

        if ($coordinadorId) {
            $reporte = $this->coordinadorModel->obtenerReportePorCoordinador($coordinadorId);
        }

        require '../views/dashboard/mostrar.php'; // Asegúrate de ajustar la ruta
    }

}
