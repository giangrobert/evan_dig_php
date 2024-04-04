<?php require __DIR__ . '/../../../core/header.php'; ?>
    <div class="container mt-5">
        <h2>Editar Coordinador</h2>
        <form action="/coordinador/editar" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($coordinador['id']); ?>">
            <div class="form-group mb-2">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?= htmlspecialchars($coordinador['nombre']); ?>" required>
            </div>
            <button type="submit" class="btn btn-secondary">Actualizar</button>
        </form>
    </div>
<?php require __DIR__ . '/../../../core/footer.php'; ?>