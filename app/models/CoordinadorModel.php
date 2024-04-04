<?php

class CoordinadorModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function crearCoordinador($nombre) {
        $stmt = $this->db->prepare("INSERT INTO Coordinadores (nombre) VALUES (:nombre)");
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function obtenerCoordinadores() {
        $stmt = $this->db->query("SELECT * FROM Coordinadores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerCoordinadores2() {
        $stmt = $this->db->query("SELECT * FROM Coordinadores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function eliminarCoordinador($id) {
        $stmt = $this->db->prepare("DELETE FROM Coordinadores WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function actualizarCoordinador($id, $nombre) {
        $stmt = $this->db->prepare("UPDATE Coordinadores SET nombre = :nombre WHERE id = :id");
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function obtenerCoordinadorPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM Coordinadores WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function obtenerReportePorCoordinador($coordinadorId, $busqueda = '', $ordenarPor = 'instructor', $direccion = 'ASC') {
        $ordenarPor = in_array($ordenarPor, ['instructor', 'total_estudiantes', 'activos', 'inactivos']) ? $ordenarPor : 'instructor';
        $direccion = strtoupper($direccion) === 'ASC' ? 'ASC' : 'DESC';

        $sql = "
        SELECT 
            Instructores.nombre AS instructor,
            COUNT(Estudiantes.id) AS total_estudiantes,
            SUM(CASE WHEN Estudiantes.activo = 1 THEN 1 ELSE 0 END) AS activos,
            SUM(CASE WHEN Estudiantes.activo = 0 THEN 1 ELSE 0 END) AS inactivos
        FROM Instructores
        LEFT JOIN Estudiantes ON Instructores.id = Estudiantes.instructor_id
        WHERE Instructores.coordinador_id = :coordinadorId
        AND Instructores.nombre LIKE :busqueda
        GROUP BY Instructores.id
        ORDER BY $ordenarPor $direccion
    ";
        $stmt = $this->db->prepare($sql);
        $busqueda = '%' . $busqueda . '%';
        $stmt->bindParam(':coordinadorId', $coordinadorId, PDO::PARAM_INT);
        $stmt->bindParam(':busqueda', $busqueda, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
