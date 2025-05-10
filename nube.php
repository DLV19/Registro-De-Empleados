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
  <title>Soluciones en la Nube</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<!-- Estilos personalizados (siempre al final para sobrescribir lo anterior) -->
<link rel="stylesheet" href="estilos_nube.css">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

  <?php include 'navbar.php'; ?>

  <div class="container py-5">
    <div class="neumorphic-container animate__animated animate__fadeInUp">

      <h1 class="text-center mb-4">
        <img src="https://www.gstatic.com/images/branding/product/1x/drive_2020q4_48dp.png" alt="Google Drive">
        Recursos Compartidos Google Drive
      </h1>

      <div class="row justify-content-center g-4">
        <!-- Video -->
        <div class="col-md-4">
          <div class="card h-100 border-0">
            <div class="card-body text-center">
              <i class="fas fa-video fa-3x text-danger mb-3"></i>
              <h5 class="card-title">Conoce a nuestros CEO’s</h5>
              <p class="card-text">Las mentes más brillantes del planeta.</p>
              <a href="https://drive.google.com/drive/folders/1KM6SGF35Sq-jKf2ntJLzsmzfnZY2AwqY?usp=drive_link" target="_blank" class="btn btn-outline-primary">
                Ver Video
              </a>
            </div>
          </div>
        </div>

        <!-- Imagen -->
        <div class="col-md-4">
          <div class="card h-100 border-0">
            <div class="card-body text-center">
              <i class="fas fa-image fa-3x text-success mb-3"></i>
              <h5 class="card-title">Compañías Tecnológicas</h5>
              <p class="card-text">Consulta las imágenes oficiales.</p>
              <a href="https://drive.google.com/drive/folders/1j0xGkUpA6k_zCTVZ0r4pPWqvSX3H0yO8?usp=sharing" target="_blank" class="btn btn-outline-success">
                Ver Imagen
              </a>
            </div>
          </div>
        </div>

        <!-- Carpeta -->
        <div class="col-md-4">
          <div class="card h-100 border-0">
            <div class="card-body text-center">
              <i class="fas fa-folder-open fa-3x text-warning mb-3"></i>
              <h5 class="card-title">Biografías CEO’s</h5>
              <p class="card-text">Consulta las biografías oficiales.</p>
              <a href="https://drive.google.com/drive/folders/1_BIjeXsg3fTaMqu5xG-J2D1O7f-1gsEo?usp=sharing" target="_blank" class="btn btn-outline-warning">
                Abrir Carpeta
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Botón volver -->
      <div class="text-center mt-5 animate__animated animate__fadeInUp">
        <a href="index.php" class="btn btn-secondary">
          <i class="fas fa-arrow-left me-2"></i> Volver al registro
        </a>
      </div>

    </div>
  </div>

</body>
</html>
