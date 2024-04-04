<?php require __DIR__ . '/../../../core/header.php'; ?>
<div class="container mt-5">
    <h2>Instructores</h2>
    <a href="/instructor/agregar" class="btn btn-secondary mb-3">Crear Instructor</a>
    <ul class="list-group">
        <?php foreach ($instructores as $instructor): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= htmlspecialchars($instructor['nombre']); ?> - Coordinador: <?= htmlspecialchars($instructor['coordinador']); ?>
                <div class="btn-group" role="group" aria-label="Acciones">
                    <a href="/instructor/editar?id=<?= $instructor['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/instructor/eliminar?id=<?= $instructor['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php require __DIR__ . '/../../../core/footer.php'; ?>
