<?php

require_once __DIR__ . '/../models/CoordinadorModel.php'; // Asegúrate de ajustar la ruta


class HomeController {
    public function index() {
        require_once __DIR__ . '/../views/home/index.php';
    }

    protected $coordinadorModel;

    public function __construct($db) {
        $this->coordinadorModel = new CoordinadorModel($db);
    }

    public function mostrarDashboard() {
        $coordinadorId = $_GET['coordinador_id'] ?? null;
        $busqueda = $_GET['busqueda'] ?? '';
        $ordenarPor = $_GET['ordenar_por'] ?? 'instructor';
        $direccion = $_GET['direccion'] ?? 'ASC';
        $coordinadores = $this->coordinadorModel->obtenerCoordinadores();
        $reporte = [];

        if ($coordinadorId) {
            $reporte = $this->coordinadorModel->obtenerReportePorCoordinador($coordinadorId, $busqueda, $ordenarPor, $direccion);
        }

        require_once __DIR__ . '/../views/home/index.php'; // Asegúrate de ajustar la ruta
    }


}
