<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="build/js/app.js"></script>
    <link rel="shortcut icon" href="<?= asset('images/logo.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('build/styles.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
    <title>CIBERDEFENSA</title>
    <style>
        /* Estilos personalizados para el navbar */
        .navbar {
            background-color: #0a1b2f; /* Azul más oscuro para darle un estilo más serio */
            border-bottom: 3px solid #28a745; /* Verde para darle un toque atractivo y profesional */
        }

        .navbar-brand {
            font-weight: bold;
            color: #fff;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            margin-right: 10px;
        }

        .nav-link {
            color: #ffffff;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .nav-link i {
            color: #ffffff; /* Color blanco para los iconos */
            margin-right: 8px; /* Espaciado entre el icono y el texto */
        }

        .nav-link:hover {
            color: #28a745; /* Verde en hover para una combinación profesional */
        }

        .nav-link:hover i {
            color: #28a745; /* También cambia el icono a verde en hover */
        }

        .nav-item .dropdown-menu {
            background-color: #0a1b2f; /* Mantener el azul oscuro en los dropdowns */
            border: none;
        }

        .dropdown-item:hover {
            background-color: #28a745; /* Verde para los ítems en hover */
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #28a745; /* Verde al hacer hover sobre el botón de menú */
        }

        .progress-bar {
            background-color: #28a745; /* Verde en la barra de progreso */
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;charset=UTF8,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 30 30\' fill=\'white\'%3E%3Cpath stroke=\'rgba(255, 255, 255, 0.5)\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' d=\'M4 7h22M4 15h22M4 23h22\'/%3E%3C/svg%3E');
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/ejemplo/">
                <img src="<?= asset('./images/logo.png') ?>" width="35px" alt="cit">
                Ciberdefensa
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/app_ciber/"><i class="bi bi-house-fill me-2"></i>Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-gear me-2"></i>CARTA
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item nav-link text-white" href="/app_ciber/mapa"><i class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>GRAFICAS</a>
                            </li>
                            <li>
                                <a class="dropdown-item nav-link text-white" href="/app_ciber/mantenimiento"><i class="ms-lg-0 ms-2 bi bi-plus-circle me-2"></i>OPERACIONES</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="col-lg-1 d-grid mb-lg-0 mb-2">
                    <a href="/menu/" class="btn btn-success"><i class="bi bi-arrow-bar-left"></i> MENÚ</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="progress fixed-bottom" style="height: 6px;">
        <div class="progress-bar progress-bar-animated" id="bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <div class="container-fluid pt-5 mb-4" style="min-height: 85vh">
        <?php echo $contenido; ?>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <p style="font-size: xx-small; font-weight: bold;">
                    Comando de Informática y Tecnología, <?= date('Y') ?> &copy;
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="build/js/inicio.js"></script>
</body>
</html>
