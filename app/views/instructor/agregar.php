<?php require __DIR__ . '/../../../core/header.php'; ?>
<div class="container mt-5">
    <h2>Crear Instructor</h2>
    <form action="/instructor/agregar" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label for="coordinador">Coordinador:</label>
            <select name="coordinador_id" id="coordinador" class="form-control" required>
                <?php foreach ($coordinadores as $coordinador): ?>
                    <option value="<?= $coordinador['id']; ?>"><?= htmlspecialchars($coordinador['nombre']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-secondary">Guardar</button>
    </form>
</div>
<?php require __DIR__ . '/../../../core/footer.php'; ?>
