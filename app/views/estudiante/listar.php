<?php require __DIR__ . '/../../../core/header.php'; ?>
<div class="container mt-5">
    <h2>Estudiantes</h2>
    <a href="/estudiante/agregar" class="btn btn-secondary mb-3">Añadir Estudiante</a> <!-- Ajusta la URL según tu enrutamiento -->
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Nombre</th>
            <th>Instructor</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($estudiantes as $estudiante): ?>
            <tr>
                <td><?= htmlspecialchars($estudiante['nombre']); ?></td>
                <td><?= htmlspecialchars($estudiante['instructor']); ?></td>
                <td><?= $estudiante['activo'] ? 'Activo' : 'Inactivo'; ?></td>
                <td>
                    <a href="/estudiante/editar?id=<?= $estudiante['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/estudiante/eliminar?id=<?= $estudiante['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require __DIR__ . '/../../../core/footer.php'; ?>

