<html style="height: auto;" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Caskade</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/plugins/adminlte/css/adminlte.min.css">
    <!-- Chosen style -->
    <link rel="stylesheet" href="/plugins/chosen/chosen.min.css">
    <!-- Custom style -->
    <link rel="stylesheet" href="/style.css">
    <!-- jQuery uI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Eingeloggt</span>
                        <div class="dropdown-divider"></div>

                        <a href="/User/reset" class="dropdown-item">
                            <i class="fas fa-lock mr-2"></i> Password Reset
                        </a>
                        <div class="dropdown-divider"></div>

                        <?php
                        $session = new ModelSession();
                        if ($session->get("user")) : ?>
                            <a href="/User/logout" class="dropdown-item">
                                <i class="fas fa-arrow-circle-right"></i> Logout
                            </a>
                            <div class="dropdown-divider"></div>
                        <?php endif; ?>

                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/Contract/index" class="brand-link elevation-2" style="height: 3.5rem;">
                <img src="/images/logos/caskade_logo.png" alt="" class="brand-image" style="margin-left: 0px; height: 1.5rem;">
                <span class="brand-text font-weight-light" style="font-family: 'Times New Roman', Times;">CASKADE</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/User/index" class="nav-link <?= str_contains($_GET['route'], "User") ? "active" : "" ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Benutzer
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Client/index" class="nav-link <?= str_contains($_GET['route'], "Client") ? "active" : "" ?>">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>
                                    Kunden
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Product/index" class="nav-link <?= str_contains($_GET['route'], "Product") ? "active" : "" ?>">
                                <i class="nav-icon fas fa-beer"></i>
                                <p>
                                    Produkte
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Contract/index" class="nav-link <?= str_contains($_GET['route'], "Contract") ? "active" : "" ?>">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Verträge
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?= str_contains($_GET['route'], "Statistic") ? "active" : "" ?>">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Statistiken
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="<?= str_contains($_GET['route'], "Statistic") ? "display: block;" : "display: none;" ?>">
                                <li class="nav-item">
                                    <a href="/Statistic/endcontract" class="nav-link <?= str_contains($_GET['route'], "Statistic/endcontract") ? "active" : "" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Auslaufende Verträge</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Statistic/salesvolume" class="nav-link <?= str_contains($_GET['route'], "Statistic/salesvolume") ? "active" : "" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Umsatzvolumen</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 100vh; height: fit-content;
    padding-bottom: 6rem;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $_GET['route'] ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active"><?= $_GET['route'] ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content ">



                <?php if (isset($errorMessages)) :
                    foreach ($errorMessages as $errorMessage) : ?>

                        <div class="alert">
                            <?= $errorMessage; ?>
                        </div>

                <?php endforeach;
                endif;
                ?>



                <?= $view; ?>




            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>IPA Aaron Schreiber <?= date("Y") ?><a href="https://huanga.com"> Huanga IT Solutions AG</a></strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark" style="display: none;">
            <!-- Control sidebar content goes here -->

            <!-- /.control-sidebar -->
            <div id="sidebar-overlay"></div>
    </div>
    <!-- ./wrapper -->


    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/plugins/adminlte/js/adminlte.min.js"></script>

    <!-- jQuery -->
    <script src="/plugins/chosen/chosen.jquery.min.js"></script>

    <!-- jQuery uI -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script src="/script.js"></script>

</body>

</html>