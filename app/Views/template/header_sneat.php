<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>EDUCACIÓN | Portal de la Dirección General de Administración</title>
    <meta name="description" content="" />
    <link rel="shortcut icon" href="<?= base_url("public/images") ?>/favicon.png" type="image/png" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url("public/library/sneat_template") ?>/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?= base_url("public/library/sneat_template") ?>/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url("public/library/sneat_template") ?>/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url("public/library/sneat_template") ?>/css/demo.css" />
    <link rel="stylesheet" href="<?= base_url("public/library/sneat_template") ?>/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url("public/library/sneat_template") ?>/vendor/libs/apex-charts/apex-charts.css" />
    <script src="<?= base_url("public/library/sneat_template") ?>/vendor/js/helpers.js"></script>
    <script src="<?= base_url("public/library/sneat_template") ?>/js/config.js"></script>
    <script src="<?= base_url("public/library/sweetalert2") ?>/sweetalert2.js"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="<?= base_url("portal/inicio") ?>" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img style="max-width: 16%; height : auto;" src="<?= base_url("public/images") ?>/setab-logo-large.jpg">
                        </span>
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <li class="menu-item <?= CORE_CONTROLLER . "/" . CORE_METHOD == "Portal/inicio" ? "active" : "" ?>">
                        <a href="<?= base_url("portal/inicio") ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Inicio</div>
                        </a>
                    </li>
                    <li class="menu-item <?= CORE_CONTROLLER == "Portal_tramites" ? "active open" : "" ?>">
                        <a href=" javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-highlight"></i>
                        <div data-i18n="Layouts">Trámites</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?= CORE_CONTROLLER . "/" . CORE_METHOD == "Portal_tramites/contrataciones" ? "active" : "" ?>">
                                <a href="<?= base_url("portal_tramites/contrataciones") ?>" class="menu-link">
                                    <div>Contrataciones</div>
                                </a>
                            </li>
                            <li class="menu-item <?= CORE_CONTROLLER . "/" . CORE_METHOD == "Portal_tramites/solicitudes_pago" ? "active" : "" ?>">
                                <a href="<?= base_url("portal_tramites/solicitudes_pago") ?>" class="menu-link">
                                    <div>Solicitud de pago de prestaciones</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item <?= CORE_CONTROLLER == "Portal_formatos" ? "active open" : "" ?>">
                        <a href=" javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-file-blank"></i>
                        <div data-i18n="Layouts">Formatos</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?= CORE_CONTROLLER . "/" . CORE_METHOD == "Portal_formatos/solicitud_empleo_estatal" ? "active" : "" ?>">
                                <a href="<?= base_url("portal_formatos/solicitud_empleo_estatal") ?>" class="menu-link">
                                    <div>Solicitud de empleo estatal</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php if(array_search("Revisión", array_column(session()->get("user_permissions"), "parent_node")) !== false){ ?>
                    <li class="menu-item <?= CORE_CONTROLLER == "Portal_revision" ? "active open" : "" ?>">
                        <a href=" javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-book-reader"></i>
                        <div data-i18n="Layouts">Revisión</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?= CORE_CONTROLLER . "/" . CORE_METHOD == "Portal_revision/revisa_docs_contratacion" ? "active" : "" ?>">
                                <a href="<?= base_url("portal_revision/revisa_docs_contratacion") ?>" class="menu-link">
                                    <div>Revisa documentos de contratación</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php }
                    if(array_search("Subir información", array_column(session()->get("user_permissions"), "parent_node")) !== false){ ?>
                    <li class="menu-item <?= CORE_CONTROLLER == "Portal_subida" ? "active open" : "" ?>">
                        <a href=" javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-spreadsheet  "></i>
                        <div data-i18n="Layouts">Subir información</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?= CORE_CONTROLLER . "/" . CORE_METHOD == "Portal_subida/layout_contratacion" ? "active" : "" ?>">
                                <a href="<?= base_url("portal_subida/layout_contratacion") ?>" class="menu-link">
                                    <div>Layout contratación</div>
                                </a>
                            </li>
                            <li class="menu-item <?= CORE_CONTROLLER . "/" . CORE_METHOD == "Portal_subida/layout_solicitud" ? "active" : "" ?>">
                                <a href="<?= base_url("portal_subida/layout_solicitud") ?>" class="menu-link">
                                    <div>Layout solicitud de pago</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Otros</span>
                    </li>
                    <li class="menu-item">
                        <a href="https://tabasco.gob.mx/avisos-de-privacidad-1" class="menu-link" target="_blank">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div>Aviso de privacidad</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?= base_url() ?>" class="menu-link" target="_blank">
                            <i class="menu-icon tf-icons bx bx-world"></i>
                            <div>Página de la DGA</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <div class="layout-page">
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="<?= base_url("public/images") ?>/user.png" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?= base_url("public/images") ?>/user.png" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block"><?= session("user_data")["username"] ?></span>
                                                    <small class="text-muted"><?= session("user_data")["nombre"] ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Perfil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url("portal") ?>">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Cerrar sesión</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">