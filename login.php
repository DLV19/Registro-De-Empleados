<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Estilos visuales -->
  <style>
    body {
      background: #e0e5ec;
      font-family: 'Segoe UI', sans-serif;
    }

    .neumorphic-card {
      background: #e0e5ec;
      border-radius: 20px;
      box-shadow: 10px 10px 30px #bec4d1, -10px -10px 30px #ffffff;
      transition: transform 0.3s ease;
    }

    .neumorphic-card:hover {
      transform: scale(1.01);
    }

    .form-control {
      border-radius: 12px;
      box-shadow: inset 3px 3px 6px #c8ccd3, inset -3px -3px 6px #ffffff;
      border: none;
    }

    .btn-primary {
      border-radius: 12px;
      box-shadow: 3px 3px 6px #c8ccd3, -3px -3px 6px #ffffff;
      font-weight: bold;
      letter-spacing: 1px;
    }

    .btn-primary:hover {
      background-color: #0d6efd;
      box-shadow: inset 2px 2px 4px #a6aab2, inset -2px -2px 4px #ffffff;
    }

    .form-label i {
      color: #0d6efd;
    }

    .text-center a {
      text-decoration: none;
      font-weight: 500;
      color: #0d6efd;
    }

    .text-center a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

  <div class="neumorphic-card p-4" style="width: 100%; max-width: 420px;">
    <h3 class="mb-4 text-center">
      <i class="fas fa-sign-in-alt me-2"></i>Iniciar sesión
    </h3>

    <form id="loginForm">
      <div class="mb-3">
        <label class="form-label"><i class="fas fa-envelope me-1"></i>Correo electrónico</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label"><i class="fas fa-lock me-1"></i>Contraseña</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary w-100 mt-2">
        <i class="fas fa-sign-in-alt me-2"></i>Entrar
      </button>
    </form>

    <div class="text-center mt-4">
      <a href="registro.php"><i class="fas fa-user-plus me-1"></i>¿No tienes cuenta? Regístrate</a>
    </div>
  </div>

  <script>
    document.getElementById("loginForm").addEventListener("submit", async function (e) {
      e.preventDefault();
      const formData = new FormData(this);

      const res = await fetch("validar_login.php", {
        method: "POST",
        body: formData
      });

      const data = await res.text();

      if (data.trim() === "ok") {
        Swal.fire("¡Bienvenido!", "Redirigiendo...", "success").then(() => {
          window.location.href = "index.php";
        });
      } else {
        Swal.fire("Error", data.trim(), "error");
      }
    });
  </script>

</body>
</html>
