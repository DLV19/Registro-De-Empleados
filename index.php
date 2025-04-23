<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Personal</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      background: #e0e5ec;
      font-family: 'Segoe UI', sans-serif;
    }

    .neumorphic-container {
      background: #e0e5ec;
      border-radius: 25px;
      padding: 30px;
      box-shadow: 15px 15px 30px #c4c9d3, -15px -15px 30px #ffffff;
    }

    .form-control {
      border-radius: 12px;
      box-shadow: inset 3px 3px 6px #c8ccd3, inset -3px -3px 6px #ffffff;
      border: none;
    }

    .btn-success {
      border-radius: 12px;
      box-shadow: 3px 3px 6px #c8ccd3, -3px -3px 6px #ffffff;
      font-weight: bold;
      transition: all 0.3s ease-in-out;
    }

    .btn-success:hover {
      background-color: #28c76f;
      box-shadow: inset 2px 2px 4px #a6aab2, inset -2px -2px 4px #ffffff;
    }

    h1 i {
      color: #28a745;
    }

    table {
      background-color: #f8f9fa;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 5px 5px 15px #c4c9d3, -5px -5px 15px #ffffff;
    }

    thead th {
      background-color: #212529 !important;
      color: #fff !important;
      text-align: center;
      vertical-align: middle;
    }

    td, th {
      vertical-align: middle;
    }
  </style>
</head>

<body class="bg-light">

  <?php include 'navbar.php'; ?>

  <div class="container py-5">
    <div class="neumorphic-container">

      <h1 class="mb-4 text-center">
        <i class="fas fa-user-tie me-2"></i>Registro de Empleados
      </h1>

      <!-- Formulario -->
      <form id="formAgregar" class="row g-3 mb-5" enctype="multipart/form-data">
        <div class="col-md-6">
          <label class="form-label"><i class="fas fa-user me-1"></i>Nombre completo</label>
          <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label"><i class="fas fa-envelope me-1"></i>Correo electrónico</label>
          <input type="email" name="correo" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label"><i class="fas fa-briefcase me-1"></i>Puesto</label>
          <input type="text" name="puesto" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label"><i class="fas fa-calendar-day me-1"></i>Fecha de ingreso</label>
          <input type="date" name="fecha_ingreso" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label"><i class="fas fa-camera me-1"></i>Foto</label>
          <input type="file" name="imagen" class="form-control" accept="image/*">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-success w-100">
            <i class="fas fa-save me-2"></i>Guardar empleado
          </button>
        </div>
      </form>

      <!-- Tabla -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle" id="tablaEmpleados">
          <thead>
            <tr>
              <th><i class="fas fa-user"></i> Nombre</th>
              <th><i class="fas fa-envelope"></i> Correo</th>
              <th><i class="fas fa-briefcase"></i> Puesto</th>
              <th><i class="fas fa-calendar-day"></i> Fecha</th>
              <th><i class="fas fa-image"></i> Foto</th>
              <th><i class="fas fa-cogs"></i> Acciones</th>
            </tr>
          </thead>
          <tbody>
            <!-- Se rellena dinámicamente -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="empleados.js"></script>
</body>
</html>
