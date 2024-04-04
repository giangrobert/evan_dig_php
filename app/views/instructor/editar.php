<?php require __DIR__ . '/../../../core/header.php'; ?>
<div class="container mt-5">
    <h2>Editar Instructor</h2>
    <form action="/instructor/editar" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($instructor['id']); ?>">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= htmlspecialchars($instructor['nombre']); ?>" required>
        </div>
        <div class="form-group mb-2">
            <label for="coordinador">Coordinador:</label>
            <select name="coordinador_id" id="coordinador" class="form-control" required>
                <?php foreach ($coordinadores as $coordinador): ?>
                    <option value="<?= $coordinador['id']; ?>" <?= $coordinador['id'] == $instructor['coordinador_id'] ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($coordinador['nombre']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-secondary">Actualizar</button>
    </form>
</div>
<?php require __DIR__ . '/../../../core/footer.php'; ?>
