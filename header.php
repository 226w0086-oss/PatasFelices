<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include 'includes/funciones.php';
if (!isset($_SESSION['usuario'])) {
    header('Location: /PATAS_FELICES/login.php');
    exit;
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Patas Felices - Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/PATAS_FELICES/css/estilos.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="/PATAS_FELICES/index.php">🐾 Patas Felices</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navmenu">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="/PATAS_FELICES/duenos/listar_duenos.php">Dueños</a></li>
        <li class="nav-item"><a class="nav-link" href="/PATAS_FELICES/mascotas/listar_mascotas.php">Mascotas</a></li>
        <li class="nav-item"><a class="nav-link" href="/PATAS_FELICES/veterinarios/listar_veterinarios.php">Veterinarios</a></li>
        <li class="nav-item"><a class="nav-link" href="/PATAS_FELICES/citas/listar_citas.php">Citas</a></li>
      </ul>
      <div class="d-flex align-items-center">
        <span class="text-white me-3">Usuario: <?= isset($_SESSION['usuario']) ? esc($_SESSION['usuario']) : '' ?></span>
        <a class="btn btn-outline-light btn-sm" href="/PATAS_FELICES/logout.php">Salir</a>
      </div>
    </div>
  </div>
</nav>
<main class="container my-4">
