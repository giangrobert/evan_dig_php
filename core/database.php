<?php

$dbPath = __DIR__ . '/database.sqlite';
$db = new PDO("sqlite:$dbPath");

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    // Coordinadores
    $db->exec("CREATE TABLE IF NOT EXISTS Coordinadores (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT NOT NULL
    );");

    // Instructores
    $db->exec("CREATE TABLE IF NOT EXISTS Instructores (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT NOT NULL,
        coordinador_id INTEGER,
        FOREIGN KEY (coordinador_id) REFERENCES Coordinadores (id)
    );");

    // Estudiantes
    $db->exec("CREATE TABLE IF NOT EXISTS Estudiantes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT NOT NULL,
        activo BOOLEAN NOT NULL DEFAULT 1,
        instructor_id INTEGER,
        FOREIGN KEY (instructor_id) REFERENCES Instructores (id)
    );");
} catch (Exception $e) {
    echo "Error al crear la base de datos y las tablas: " . $e->getMessage();
}
