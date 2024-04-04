<?php require __DIR__ . '/../../../core/header.php'; ?>
<div class="container mt-5">
    <h2>Editar Estudiante</h2>
    <form action="/estudiante/editar" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($estudiante['id']); ?>">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= htmlspecialchars($estudiante['nombre']); ?>" required>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" name="activo" id="activo" class="form-check-input bg-dark" value="1" <?= $estudiante['activo'] ? 'checked' : ''; ?>>
                <label for="activo" class="form-check-label">Activo</label>
            </div>
        </div>
        <div class="form-group mb-2">
            <label for="instructor">Instructor:</label>
            <select name="instructor_id" id="instructor" class="form-control" required>
                <?php foreach ($instructores as $instructor): ?>
                    <option value="<?= $instructor['id']; ?>" <?= $instructor['id'] == $estudiante['instructor_id'] ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($instructor['nombre']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-secondary">Actualizar</button>
    </form>
</div>
<?php require __DIR__ . '/../../../core/footer.php'; ?>
