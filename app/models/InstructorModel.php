<?php

class InstructorModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function crearInstructor($nombre, $coordinadorId) {
        $stmt = $this->db->prepare("INSERT INTO Instructores (nombre, coordinador_id) VALUES (:nombre, :coordinador_id)");
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':coordinador_id', $coordinadorId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function obtenerCoordinadores() {
        $stmt = $this->db->query("SELECT id, nombre FROM Coordinadores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerInstructoresConCoordinadores() {
        $stmt = $this->db->query("SELECT Instructores.id, Instructores.nombre, Coordinadores.nombre as coordinador FROM Instructores JOIN Coordinadores ON Instructores.coordinador_id = Coordinadores.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM Instructores WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
    public function actualizarInstructor($id, $nombre, $coordinadorId) {
        $stmt = $this->db->prepare("UPDATE Instructores SET nombre = :nombre, coordinador_id = :coordinador_id WHERE id = :id");
        $stmt->execute([':nombre' => $nombre, ':coordinador_id' => $coordinadorId, ':id' => $id]);
    }

    public function obtenerInstructorPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM Instructores WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
