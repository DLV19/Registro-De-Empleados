<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit;
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <span class="navbar-brand">Sistema de Registro de Personal</span>
    
    <div class="d-flex ms-auto">
      <span class="navbar-text text-white me-3">
        Bienvenido, <strong><?= $_SESSION['usuario']; ?></strong>
      </span>
      <a href="logout.php" class="btn btn-outline-light btn-sm">Cerrar sesión</a>
    </div>
  </div>
</nav>
