<?php require __DIR__ . '/../../../core/header.php'; ?>
    <div class="container mt-5">
        <h2>Coordinadores</h2>
        <a href="/coordinador/crear" class="btn btn-secondary mb-3">Crear Coordinador</a> <!-- Ajusta según tu enrutamiento -->
        <ul class="list-group">
            <?php foreach ($coordinadores as $coordinador): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= htmlspecialchars($coordinador['nombre']); ?>
                    <div class="btn-group" role="group" aria-label="Acciones">
                        <a href="/coordinador/editar?id=<?= $coordinador['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="/coordinador/eliminar?id=<?= $coordinador['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php require __DIR__ . '/../../../core/footer.php'; ?>