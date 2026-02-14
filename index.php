<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $contrasena = trim($_POST['contrasena'] ?? '');

    if ($usuario !== '' && $contrasena !== '') {
        $mensaje = 'Datos recibidos correctamente.';
        $tipoMensaje = 'success';
    } else {
        $mensaje = 'Por favor complete ambos campos.';
        $tipoMensaje = 'danger';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso IMSS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --imss-verde-oscuro: #00563f;
            --imss-verde-principal: #006b4f;
            --imss-verde-suave: #2f8f74;
            --imss-crema: #f3f7f3;
            --imss-dorado: #d8b26e;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background:
                radial-gradient(circle at 20% 20%, rgba(216, 178, 110, 0.22), transparent 35%),
                radial-gradient(circle at 80% 0%, rgba(47, 143, 116, 0.32), transparent 35%),
                linear-gradient(145deg, var(--imss-verde-oscuro), var(--imss-verde-principal));
            display: grid;
            place-items: center;
            color: #ffffff;
        }

        .login-wrapper {
            width: min(95%, 420px);
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(11px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1.5rem;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.28);
            overflow: hidden;
        }

        .login-header {
            background: linear-gradient(135deg, rgba(0, 86, 63, 0.95), rgba(0, 107, 79, 0.95));
            padding: 2rem;
            text-align: center;
            border-bottom: 2px solid rgba(216, 178, 110, 0.35);
        }

        .login-header h1 {
            margin-bottom: 0.35rem;
            font-size: 1.7rem;
            font-weight: 700;
            letter-spacing: 0.4px;
        }

        .login-header p {
            margin: 0;
            color: #d7eee6;
            font-size: 0.97rem;
        }

        .login-body {
            padding: 2rem;
            background-color: rgba(243, 247, 243, 0.12);
        }

        .form-label {
            font-weight: 600;
            color: #f5fffa;
        }

        .form-control {
            border-radius: 0.9rem;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(255, 255, 255, 0.4);
            background-color: rgba(255, 255, 255, 0.86);
            color: #114337;
        }

        .form-control:focus {
            border-color: var(--imss-dorado);
            box-shadow: 0 0 0 0.2rem rgba(216, 178, 110, 0.3);
        }

        .btn-imss {
            width: 100%;
            border: none;
            border-radius: 999px;
            padding: 0.8rem;
            font-weight: 700;
            color: #fff;
            background: linear-gradient(90deg, #006b4f, #2f8f74);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 10px 24px rgba(0, 86, 63, 0.35);
        }

        .btn-imss:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 26px rgba(0, 86, 63, 0.4);
        }

        .input-group-text {
            border-radius: 0.9rem 0 0 0.9rem;
            border: 1px solid rgba(255, 255, 255, 0.4);
            background-color: rgba(216, 178, 110, 0.95);
            color: #1f3f34;
            font-weight: 700;
        }

        .footer-note {
            margin-top: 1rem;
            text-align: center;
            color: #dcf3ea;
            font-size: 0.88rem;
        }
    </style>
</head>
<body>
    <main class="login-wrapper">
        <section class="login-header">
            <h1>Portal de Acceso IMSS</h1>
            <p>Ingrese sus credenciales para continuar</p>
        </section>

        <section class="login-body">
            <?php if (!empty($mensaje)): ?>
                <div class="alert alert-<?= htmlspecialchars($tipoMensaje) ?>" role="alert">
                    <?= htmlspecialchars($mensaje) ?>
                </div>
            <?php endif; ?>

            <form method="POST" id="loginForm" novalidate>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <div class="input-group">
                        <span class="input-group-text">@</span>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ej. juan.perez" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña" required>
                </div>

                <button type="submit" class="btn btn-imss">Iniciar Sesión</button>
                <p class="footer-note">Plataforma segura de autenticación institucional</p>
            </form>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(function () {
            $('#loginForm').on('submit', function (event) {
                var usuario = $('#usuario').val().trim();
                var contrasena = $('#contrasena').val().trim();

                if (!usuario || !contrasena) {
                    event.preventDefault();
                    $('.alert').remove();
                    $('<div>', {
                        class: 'alert alert-danger',
                        role: 'alert',
                        text: 'Debe capturar usuario y contraseña.'
                    }).prependTo('.login-body');
                }
            });
        });
    </script>
</body>
</html>
