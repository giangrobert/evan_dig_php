<?php require_once __DIR__ . '/../../../core/header.php';?>
<div class="container mt-5">
    <h1 class="mb-4">Dashboard - Escuela Bíblica Digital</h1>
    <div class="container mt-5">
        <h4>Selecciona un coordinador</h4>
        <form action="/" method="get" class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="coordinador_id">Coordinador:</label>
                        <select id="coordinador_id" name="coordinador_id" class="form-control">
                            <option value="">Todos los coordinadores</option>
                            <?php foreach ($coordinadores as $coordinador): ?>
                                <option value="<?= $coordinador['id']; ?>" <?= (isset($_GET['coordinador_id']) && $_GET['coordinador_id'] == $coordinador['id']) ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($coordinador['nombre']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="busqueda">Buscar por instructor:</label>
                        <input type="text" id="busqueda" name="busqueda" class="form-control" placeholder="Buscar por instructor" value="<?= $_GET['busqueda'] ?? '' ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="ordenar_por">Ordenar por:</label>
                        <select id="ordenar_por" name="ordenar_por" class="form-control">
                            <option value="instructor" <?= isset($_GET['ordenar_por']) && $_GET['ordenar_por'] == 'instructor' ? 'selected' : ''; ?>>Instructor</option>
                            <option value="total_estudiantes" <?= isset($_GET['ordenar_por']) && $_GET['ordenar_por'] == 'total_estudiantes' ? 'selected' : ''; ?>>Total de Estudiantes</option>
                            <option value="activos" <?= isset($_GET['ordenar_por']) && $_GET['ordenar_por'] == 'activos' ? 'selected' : ''; ?>>Activos</option>
                            <option value="inactivos" <?= isset($_GET['ordenar_por']) && $_GET['ordenar_por'] == 'inactivos' ? 'selected' : ''; ?>>Inactivos</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <select id="direccion" name="direccion" class="form-control">
                            <option value="ASC" <?= isset($_GET['direccion']) && $_GET['direccion'] == 'ASC' ? 'selected' : ''; ?>>Ascendente</option>
                            <option value="DESC" <?= isset($_GET['direccion']) && $_GET['direccion'] == 'DESC' ? 'selected' : ''; ?>>Descendente</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-2">
                    <button type="submit" class="btn btn-secondary">Buscar/Ordenar</button>
                </div>
            </div>
        </form>

        <?php if (!empty($reporte)): ?>
            <table class="table mt-3">
                <thead>
                <tr>
                    <th>Instructor</th>
                    <th>Total de Estudiantes</th>
                    <th>Activos</th>
                    <th>Inactivos</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($reporte as $fila): ?>
                    <tr>
                        <td><?= htmlspecialchars($fila['instructor']); ?></td>
                        <td><?= $fila['total_estudiantes']; ?></td>
                        <td><?= $fila['activos']; ?></td>
                        <td><?= $fila['inactivos']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card-deck h-100">
                <div class="card">
                    <img src="https://blog.linguaserve.com/hubfs/ventajas-coordinador-proyectos-traduccion.jpg" class="card-img-top" alt="Gestionar Coordinadores">
                    <div class="card-body">
                        <h5 class="card-title">Gestionar Coordinadores</h5>
                        <a href="coordinador/listar" class="btn btn-secondary">Ir a la página</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-deck h-100">
                <div class="card">
                    <img src="https://www.churchofjesuschrist.org/bc/content/ldsorg/content/images/AV110518_cah026-480.jpg" class="card-img-top" alt="Gestionar Instructores">
                    <div class="card-body">
                        <h5 class="card-title">Gestionar Instructores</h5>
                        <a href="instructor/listar" class="btn btn-secondary">Ir a la página</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-deck h-100">
                <div class="card">
                    <img src="https://files.adventistas.org/noticias/es/2019/07/30163207/grupoestudosbiblicos.jpg" class="card-img-top" alt="Gestionar Estudiantes">
                    <div class="card-body">
                        <h5 class="card-title">Gestionar Estudiantes</h5>
                        <a href="estudiante/listar" class="btn btn-secondary">Ir a la página</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<style>
    .card {
        height: 100%;
    }

    .card-img-top {
        object-fit: cover;
        height: 200px;
    }
</style>
<?php require_once __DIR__ . '/../../../core/footer.php';?>
