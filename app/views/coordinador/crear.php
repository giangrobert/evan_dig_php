<?php require __DIR__ . '/../../../core/header.php'; ?>
<div class="container mt-5 p-5">
    <div class="form-container">
        <h2 class="form-title">Crear Coordinador</h2>
        <form action="/coordinador/crear" method="post" class="custom-form">
            <div class="form-group mb-2">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-secondary">Guardar</button>
        </form>
    </div>
</div>
<?php require __DIR__ . '/../../../core/footer.php'; ?>