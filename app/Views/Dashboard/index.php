<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<h1>Dashboard</h1>
<p>Bienvenido al Dashboard.</p>

<a href="<?= base_url('logout') ?>">Cerrar Sesión</a>
<?= $this->endSection() ?>
