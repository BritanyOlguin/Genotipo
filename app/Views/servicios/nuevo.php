<?= $this->extend('layouts/dashboard-layout') ?>

<?= $this->section('content') ?>
<h1>Añadir Nuevo Servicio</h1>

<?php if (session()->has('errors')) : ?>
    <div class="alert alert-danger">
        <?php foreach (session('errors') as $error) : ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="<?= site_url('servicios/guardar') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="<?= old('titulo') ?>" required>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?= old('descripcion') ?></textarea>
    </div>

    <div class="form-group">
        <label for="imagen">Imagen</label>
        <input type="file" class="form-control-file" id="imagen" name="imagen" onchange="previewImage();">
        <img id="imagenPrevisualizacion" src="#" alt="Previsualización de la imagen" style="max-width: 100%; height: auto; display: none;">
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="<?= site_url('servicios') ?>" class="btn btn-secondary">Cancelar</a>
</form>

<script>
    function previewImage() {
        const input = document.getElementById('imagen');
        const imagePreview = document.getElementById('imagenPrevisualizacion');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block'; // Muestra la previsualización
            };

            reader.readAsDataURL(input.files[0]); // Lee el archivo seleccionado
        }
    }
</script>
<?= $this->endSection() ?>