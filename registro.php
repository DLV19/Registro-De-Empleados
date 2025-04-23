<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Usuario</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    .btn-success {
      border-radius: 12px;
      box-shadow: 3px 3px 6px #c8ccd3, -3px -3px 6px #ffffff;
      font-weight: bold;
      letter-spacing: 1px;
    }

    .btn-success:hover {
      background-color: #28c76f;
      box-shadow: inset 2px 2px 4px #a6aab2, inset -2px -2px 4px #ffffff;
    }

    .form-label i {
      color: #198754;
    }

    .text-center a {
      text-decoration: none;
      font-weight: 500;
      color: #198754;
    }

    .text-center a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

  <div class="neumorphic-card p-4" style="width: 100%; max-width: 420px;">
    <h3 class="mb-4 text-center">
      <i class="fas fa-user-plus me-2"></i>Crear una cuenta
    </h3>
    
    <form id="registroForm">
      <div class="mb-3">
        <label class="form-label"><i class="fas fa-envelope me-1"></i>Correo electrónico</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      
      <div class="mb-3">
        <label class="form-label"><i class="fas fa-lock me-1"></i>Contraseña</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-success w-100 mt-2">
        <i class="fas fa-user-check me-2"></i>Registrarme
      </button>
    </form>

    <div class="text-center mt-4">
      <a href="login.php"><i class="fas fa-sign-in-alt me-1"></i>¿Ya tienes cuenta? Inicia sesión</a>
    </div>
  </div>

  <script>
    document.getElementById("registroForm").addEventListener("submit", async function (e) {
      e.preventDefault();

      const formData = new FormData(this);

      const res = await fetch("crear_usuario.php", {
        method: "POST",
        body: formData
      });

      const data = await res.json();

      if (data.success) {
        Swal.fire("¡Registro exitoso!", "Redirigiendo al login...", "success").then(() => {
          window.location.href = "login.php";
        });
      } else {
        Swal.fire("Error", data.error || "No se pudo crear el usuario", "error");
      }
    });
  </script>

</body>
</html>
