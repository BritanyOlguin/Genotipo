<?= $this->extend('layouts/dashboard-layout') ?>

<?= $this->section('content') ?>
    <h1>Dashboard</h1>
    <p>Bienvenido a tu dashboard</p>

<a href="<?= base_url('logout') ?>">Cerrar Sesión</a>
<?= $this->endSection() ?>