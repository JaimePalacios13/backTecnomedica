<?php
session_start();
?>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col" >
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><span>Dashboard</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_info">
                            <h2><?= strtoupper($_SESSION['nombre']) ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="height: 1000vh;">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="dashboard"><i class="fa fa-home"></i> Home </a>
                                </li>
                                <li><a href="<?= base_url() ?>/usuarios"><i class="fas fa-user-shield"></i> Usuarios </a>
                                <li><a href="<?= base_url() ?>/categorias"><i class="fas fa-folder-plus"></i> Categorias </a>
                                <li><a href="<?= base_url() ?>/marcas"><i class="fas fa-folder-plus"></i> Marcas </a>
                                <li><a href="<?= base_url() ?>/productos"><i class="fas fa-tags"></i> Productos </a>
                                <li><a href="<?= base_url() ?>/contactos"><i class="fas fa-address-card"></i> Detalle Contacto </a>
                                <li><a><i class="fas fa-gear"></i>Configuración <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= base_url() ?>/historia">Historia / frase</a></li>
                                        <li><a href="<?= base_url() ?>/carousel">Carousel</a></li>
                                        <li><a href="<?= base_url() ?>/mision-vision">Misión y Visión</a></li>
                                        <li><a href="<?= base_url() ?>/politica-compromiso">Politica y compromiso</a></li>
                                    </ul>
                                </li>

                                <!-- <li><a href="<?= base_url() ?>productos"><i class="glyphicon glyphicon-tag"></i> Productos </a>

                                <li><a href="<?= base_url() ?>presupuesto"><i class="fas fa-money"></i> Presupuesto </a>

                                <li><a><i class="fa fa-edit"></i> Item 5 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="#">Item 5.1</a></li>
                                        <li><a href="#">Item 5.2</a></li>
                                        <li><a href="#">Item 5.3</a></li>
                                        <li><a href="#">Item 5.4</a></li>
                                        <li><a href="#">Item 5.5</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i>Item 6 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="#">Item 6.1</a></li>
                                        <li><a href="#">Item 6.2</a></li>
                                    </ul>
                                </li> -->
                            </ul>
                        </div>


                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url() ?>cerrar_session">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/70/User_icon_BLACK-01.png" alt=""><?= $_SESSION['nombre'] ?>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;"> Perfil</a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Configuraciones</span>
                                    </a>
                                    <a class="dropdown-item" href="<?= base_url() ?>/cerrar_session"><i class="fa fa-sign-out pull-right"></i>
                                        Cerrar sesión</a>
                                </div>
                            </li>
                            <!-- Aquí estaría la bandeja de mensaje -->
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <div class="right_col" role="main">