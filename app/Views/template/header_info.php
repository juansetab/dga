<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDUCACIÓN | Dirección General de Administración</title>
    <link rel="shortcut icon" href="<?= base_url("public/images") ?>/favicon.png" type="image/png" />
    <link href="<?= base_url("public/library") ?>/bootstrap-5.3.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?= base_url("public/library") ?>/bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #621132;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="<?= base_url() ?>"><b>DGA</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="filter: grayscale(1) invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown text-white">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Recursos Humanos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url("drh/requisitos_contratacion_estatal") ?>">Requisitos y formatos de contratación estatal</a></li>
                            <li><a class="dropdown-item" href="#">Requisitos y formatos de contratación federal</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url("drh/portal_incidencias_estatal") ?>">Portal de incidencias estatal</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="https://tabasco.gob.mx/avisos-de-privacidad-1">Avisos de privacidad</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>