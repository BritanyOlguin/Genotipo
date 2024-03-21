<?= $this->extend('layouts/dashboard-layout') ?>

<?= $this->section('content') ?>
<h1>Servicios</h1>
<a href="<?= site_url('servicios/nuevo') ?>" class="btn btn-primary">Añadir Nuevo Servicio</a>
<table class="table">
    <thead>
        <tr>
            <th>Título</th>
            <th style="width: 40%;">Descripción</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($servicios)) : ?>
            <?php foreach ($servicios as $servicio) : ?>
                <tr>
                    <td><?= esc($servicio['titulo']) ?></td>
                    <td><?= esc($servicio['descripcion']) ?></td>
                    <td>
                        <?php if (!empty($servicio['imagen'])) : ?>
                            <img src="<?= base_url('storage/' . esc($servicio['imagen'])) ?>" alt="Imagen de servicio" class="img-fluid" style="max-width: 100px; height: auto;">
                        <?php else : ?>
                            Sin imagen
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= site_url('servicios/editar/' . $servicio['id']) ?>" class="btn btn-info">Editar</a>
                        <a href="<?= site_url('servicios/eliminar/' . $servicio['id']) ?>" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar este servicio?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="3" class="text-center">No se encontraron servicios.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?= $this->endSection() ?>