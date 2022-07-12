<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Igor Henrique Constant">
    <title>Gerenciador de Conteúdo - Tecendo Infâncias</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7bc0885a91.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url("assets/dashboard/images/favicon-sala03.png") ?>" type="image/x-icon">


    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/css/dashboard.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/css/bootstrap.min.css') ?>">

    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
</head>

<body>

    <header class="navbar navbar-dark sticky-top flex-md-nowrap p-3 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Tecendo Infâncias</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="login/sair"><b>LOGOUT</b> <i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 bottom">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <?php echo anchor('admin', '<span><i class="fas fa-tachometer-alt"></i> Dashboard</span>', array('class' => 'nav-link')) ?>
                        </li>
                    </ul>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Módulos - Site</span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <?php echo anchor('banners', '<span><i class="fas fa-laptop-code"></i> Banners</span>', array('class' => 'nav-link')) ?>
                        </li>
                        <li class="nav-item">
                            <?php echo anchor('home', '<span><i class="fas fa-laptop-code"></i> Home</span>', array('class' => 'nav-link')) ?>
                        </li>
                        <li class="nav-item">
                            <?php echo anchor('sobre', '<span><i class="fas fa-laptop-code"></i> Sobre</span>', array('class' => 'nav-link')) ?>
                        </li>
                        <li class="nav-item">
                            <?php echo anchor('projetos', '<span><i class="fas fa-laptop-code"></i> Projetos</span>', array('class' => 'nav-link')) ?>
                        </li>
                        <li class="nav-item">
                            <?php echo anchor('relatorio', '<span><i class="fas fa-laptop-code"></i> Relatório</span>', array('class' => 'nav-link')) ?>
                        </li>
                        <li class="nav-item">
                            <?php echo anchor('knowhowconteudo', '<span><i class="fas fa-laptop-code"></i> Know-How</span>', array('class' => 'nav-link')) ?>
                        </li>
                        <li class="nav-item">
                            <?php echo anchor('pesquisaconteudo', '<span><i class="fas fa-laptop-code"></i> Pesquisa</span>', array('class' => 'nav-link')) ?>
                        </li>
                    </ul>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Cadastros</span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <?php echo anchor('usuarios', '<span><i class="fas fa-users"></i> Usuários</span>', array('class' => 'nav-link')) ?>
                        </li>
                    </ul>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Manutenção</span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <?php echo anchor('backup/gerarsql', '<i class="fas fa-cloud-download-alt"></i> Backup SQL</span>', array('class' => 'nav-link')) ?>
                        </li>
                    </ul>
                </div>
            </nav>