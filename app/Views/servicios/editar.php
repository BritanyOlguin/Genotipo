<?= $this->extend('layouts/dashboard-layout') ?>

<?= $this->section('content') ?>
<h1>Editar Servicio</h1>
<form action="<?= site_url('servicios/actualizar') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $servicio['id'] ?>">
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="<?= esc($servicio['titulo']) ?>" required>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?= esc($servicio['descripcion']) ?></textarea>
    </div>
    <!-- Mostrar la imagen actual si existe -->
    <?php if (!empty($servicio['imagen'])) : ?>
        <div class="form-group">
            <label>Imagen Actual</label>
            <div>
                <img src="<?= base_url('storage/' . esc($servicio['imagen'])) ?>" alt="Imagen actual" style="width: 100%; max-width: 250px;">
                <input type="text" class="form-control" id="imagenActual" name="imagenActual" value="<?= esc($servicio['imagen']) ?>" readonly>
            </div>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <label for="imagen">Nueva Imagen</label>
        <input type="file" class="form-control-file" id="imagen" name="imagen" onchange="previsualizarImagen(event);">
        <!-- Contenedor para la previsualización de la nueva imagen -->
        <div class="mt-3">
            <img id="previsualizacion" src="#" alt="Previsualización de imagen" style="width: 100%; max-width: 250px; display: none;">
        </div>
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="<?= site_url('servicios') ?>" class="btn btn-secondary">Cancelar</a>
</form>
<script>
    function previsualizarImagen(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('previsualizacion');
            output.src = reader.result;
            output.style.display = 'block'; // Mostrar la previsualización
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<?= $this->endSection() ?>