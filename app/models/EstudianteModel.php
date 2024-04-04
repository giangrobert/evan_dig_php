<?php

class EstudianteModel
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function agregarEstudiante($nombre, $activo, $instructorId)
    {
        $stmt = $this->db->prepare("INSERT INTO Estudiantes (nombre, activo, instructor_id) VALUES (:nombre, :activo, :instructor_id)");
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':activo', $activo, PDO::PARAM_INT);
        $stmt->bindParam(':instructor_id', $instructorId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function listarInstructores()
    {
        $stmt = $this->db->query("SELECT id, nombre FROM Instructores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerEstudiantesConInstructores() {
        $stmt = $this->db->query("SELECT Estudiantes.id, Estudiantes.nombre, Estudiantes.activo, Instructores.nombre AS instructor FROM Estudiantes JOIN Instructores ON Estudiantes.instructor_id = Instructores.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function actualizarEstudiante($id, $nombre, $activo, $instructorId) {
        $stmt = $this->db->prepare("UPDATE Estudiantes SET nombre = :nombre, activo = :activo, instructor_id = :instructor_id WHERE id = :id");
        $stmt->execute([':nombre' => $nombre, ':activo' => $activo, ':instructor_id' => $instructorId, ':id' => $id]);
    }

    public function obtenerEstudiantePorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM Estudiantes WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function eliminarEstudiante($id) {
        $stmt = $this->db->prepare("DELETE FROM Estudiantes WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
