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

  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="estilos.css">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        <!-- Nombre -->
        <div class="col-md-6">
          <label class="form-label">
            <i class="fas fa-user me-1"></i>Nombre completo
          </label>
          <input type="text" name="nombre" class="form-control" required>
        </div>

        <!-- Correo -->
        <div class="col-md-6">
          <label class="form-label">
            <i class="fas fa-envelope me-1"></i>Correo electrónico
          </label>
          <input type="email" name="correo" class="form-control" required>
        </div>

        <!-- Puesto -->
        <div class="col-md-6">
          <label class="form-label">
            <i class="fas fa-briefcase me-1"></i>Puesto
          </label>
          <input type="text" name="puesto" class="form-control" required>
        </div>

        <!-- Fecha de ingreso -->
        <div class="col-md-6">
          <label class="form-label">
            <i class="fas fa-calendar-day me-1"></i>Fecha de ingreso
          </label>
          <input type="date" name="fecha_ingreso" class="form-control" required>
        </div>

        <!-- Enlace a nube -->
        <div class="col-md-6 d-flex align-items-end">
          <a href="nube.php" class="btn btn-outline-info w-100 d-flex align-items-center justify-content-center gap-2">
            <img src="https://www.gstatic.com/images/branding/product/1x/drive_2020q4_48dp.png"
                 alt="Google Drive" width="24" height="24">
            Ver Recursos Compartidos Google Drive
          </a>
        </div>

        <!-- Imagen -->
        <div class="col-md-6">
          <label class="form-label">
            <i class="fas fa-camera me-1"></i>Foto
          </label>
          <input type="file" name="imagen" class="form-control" accept="image/*">
        </div>

        <!-- Botón Guardar -->
        <div class="col-12">
          <button type="submit" class="btn btn-success w-100">
            <i class="fas fa-save me-2"></i>Guardar empleado
          </button>
        </div>
      </form>

      <!-- Tabla de empleados -->
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
            <!-- Se rellena dinámicamente desde empleados.js -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Script -->
  <script src="empleados.js"></script>
</body>
</html>
