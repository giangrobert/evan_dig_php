<?php

require_once __DIR__ . '/../models/EstudianteModel.php';
class EstudianteController
{
    protected $estudianteModel;

    public function __construct($db)
    {
        $this->estudianteModel = new EstudianteModel($db);
    }

    public function agregar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nombre']) && isset($_POST['instructor_id'])) {
            $activo = isset($_POST['activo']) ? 1 : 0;
            $this->estudianteModel->agregarEstudiante($_POST['nombre'], $activo, $_POST['instructor_id']);
            header('Location: /estudiante/listar'); // Ajusta la ubicación según tu enrutamiento
            exit;
        }

        $instructores = $this->estudianteModel->listarInstructores();
        require_once __DIR__ . '/../views/estudiante/agregar.php'; // Asegúrate de ajustar las rutas según tu estructura
    }

    public function listar() {
        $estudiantes = $this->estudianteModel->obtenerEstudiantesConInstructores();
        require_once __DIR__ . '/../views/estudiante/listar.php'; // Asegúrate de ajustar las rutas según tu estructura
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesar el formulario
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $activo = isset($_POST['activo']) ? 1 : 0;
            $instructor_id = $_POST['instructor_id'];

            $this->estudianteModel->actualizarEstudiante($id, $nombre, $activo, $instructor_id);

            header('Location: /estudiante/listar'); // Ajusta la redirección según tu enrutamiento
            exit;
        }

        // Cargar vista de edición
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $estudiante = $this->estudianteModel->obtenerEstudiantePorId($id);

            if (!$estudiante) {
                exit('Estudiante no encontrado.');
            }

            // Obtener lista de instructores para el selector
            $instructores = $this->estudianteModel->listarInstructores();

            require_once __DIR__ . '/../views/estudiante/editar.php'; // Asegúrate de ajustar las rutas según tu estructura
        } else {
            exit('ID de estudiante requerido.');
        }
    }

    public function eliminar() {
        if (!empty($_GET['id'])) {
            $this->estudianteModel->eliminarEstudiante($_GET['id']);
        }
        header('Location: /estudiante/listar'); // Ajusta la redirección según tu enrutamiento
        exit;
    }



    // Otros métodos como listar, editar, borrar, etc.
}
