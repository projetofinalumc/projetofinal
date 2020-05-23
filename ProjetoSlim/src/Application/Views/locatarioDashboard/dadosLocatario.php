<?php
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }

   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Meus Dados</title>

    <!-- Fontfaces CSS-->
    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/css/locatario_css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                <div class="site-logo">
                    <a href="/Inicio" class="js-logo-clone">Loca Articles</a>
                </div>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="/Locatario/locatario">
                                <i class="fas fa-box"></i>Pedidos</a>
                        </li>
                        <li>
                            <a href="/Locatario">
                                <i class="fas fa-shopping-cart"></i>Carrinho</a>
                        </li>
                        <li class="active">
                            <a href="/Locatario/DadosLocatario'">
                                <i class="fa fa-user"></i>Meus Dados</a>
                        </li>


                    </ul>
                    </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Buscar" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">

                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php if (isset($_SESSION['nomeLocatario'])) { echo "Bem Vindo! " . $_SESSION['nomeLocatario']; } ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                                    <span class="email"><?php if (isset($_SESSION['nomeLocatario'])) { echo " " . $_SESSION['nomeLocatario']; } ?></span>
                                                                            
                                                                    
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="/victor/locatario">
                                                        <i class="zmdi zmdi-account"></i>Conta</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="/Locatario/Sair">
                                                    <i class="zmdi zmdi-power"></i>Sair</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-6">

                                
                                <form action="/Locatario/retornaDados" method="post">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Dados Pessoais</strong>

                                        </div>

                                        <?php //foreach ($dados_locatario as $dados_locatario){  
                                            //echo $dadoslocatario->getNome();    
                                        ?>
                                        <div class="card-body card-block">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Nome:</label>
                                                <input type="text" id="company" value="<?php //echo $dados_locatario->getNome(); ?>" class="form-control" name="txtNome">
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Email</label>
                                                <input type="text" id="vat" value="<?php //echo $dados_locatario->getEmail(); ?>" class="form-control" name="txtEmail">
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Senha</label>
                                                <input type="password" id="vat" value="<?php //echo $dados_locatario->getSenha(); ?>" class="form-control" name="txtSenha">
                                            </div>
                                           <!-- <div class="form-group">
                                                <label for="street" class=" form-control-label">Data de Nascimento</label><?php  //$ = $dados_locatario->getData(); ?>
                                                <input type="date" id="street" class="form-control" value="">
                                            </div> -->
                                            <div class="row form-group">
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <label for="city" class=" form-control-label">CPF</label>
                                                        <input type="text" id="city" value="<?php //echo $dados_locatario->getCPF(); ?>" class="form-control" name="txtCPF"> 
                                                                                                    
                                                    </div>
                                                </div>

                                            </div>
                                            <button type="submit" action="/Locatario/EditarDados" class="btn btn-warning">
                                                <i class="fa fa-edit"></i> Atualizar
                                            </button>
                                            <button type="reset" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Limpar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <?php //} ?>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Endereço</strong>
                                    </div>
                                    <?php //$count = 0
                                    ?>
                                    <?php //foreach($lista_endereco as $lista_endereco){
                                    ?>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">


                                            <div class="card">
                                                <div class="card-header">
                                                    Endereco <strong>#<?php //echo $count +=1 
                                                                        ?></strong>
                                                </div>
                                                <div class="card-body card-block">
                                                    <form action="" method="post" class="form-inline">
                                                        <div class="form-group">
                                                            <label for="exampleInputName2" class="pr-1  form-control-label">CEP</label>
                                                            <input type="text" id="exampleInputName2" value="<?php //echo $lista_endereco->getCep();
                                                                                                                ?>" required="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputName2" class="pr-1  form-control-label">Bairro</label>
                                                            <input type="text" id="exampleInputName2" value="<?php //echo $lista_endereco->getBairro();
                                                                                                                ?>" required="" class="form-control">
                                                            </di>
                                                            <div class="form-group">
                                                                <label for="exampleInputName2" class="pr-1  form-control-label">Estado</label>
                                                                <input type="text" id="exampleInputName2" value="<?php //echo $lista_endereco->getEstado();
                                                                                                                    ?>" class="form-control">
                                                            </div>
                                                    </form>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-send"></i> Editar
                                                    </button>
                                                    <button type="reset" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> Limpar
                                                    </button>
                                                </div>
                                            </div>
                                            <?php //}
                                            ?>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Jquery JS-->
                <script src="/vendor/jquery-3.2.1.min.js"></script>
                <!-- Bootstrap JS-->
                <script src="/vendor/bootstrap-4.1/popper.min.js"></script>
                <script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>
                <!-- Vendor JS       -->
                <script src="/vendor/slick/slick.min.js">
                </script>
                <script src="/vendor/wow/wow.min.js"></script>
                <script src="/vendor/animsition/animsition.min.js"></script>
                <script src="/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
                </script>
                <script src="/vendor/counter-up/jquery.waypoints.min.js"></script>
                <script src="/vendor/counter-up/jquery.counterup.min.js">
                </script>
                <script src="/vendor/circle-progress/circle-progress.min.js"></script>
                <script src="/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
                <script src="/vendor/chartjs/Chart.bundle.min.js"></script>
                <script src="/vendor/select2/select2.min.js">
                </script>

                <!-- Main JS-->
                <script src="/js/admin_js/main.js"></script>

</body>

</html>
<!-- end document-->