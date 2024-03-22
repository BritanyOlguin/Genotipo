<?= $this->extend('layouts/dashboard-layout') ?>

<?= $this->section('content') ?>
    <h1>Bienvenido <?= esc($user->username) ?></h1>
    <p>Ingresa a Servicios para poder registrar nuevos servicios o productos</p>
<?= $this->endSection() ?>