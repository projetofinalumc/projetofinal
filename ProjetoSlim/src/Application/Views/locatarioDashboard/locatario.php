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
    <title>Dados Locatário</title>

    <!-- Fontfaces CSS-->
    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/css/style.css" rel="stylesheet" media="all">
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
                        <a href="/Inicio" class=""><img scr="/images/loja_img/MENOR.jpg"></a>
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
                <div class="">
                    <a href="/Inicio" class="js-logo-clone"><img src="/images/loja_img/MENOR.jpg" ></a>
                </div>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active">
                            <a href="/Locatario/locatario">
                                <i class="fas fa-box"></i>Pedidos</a>
                        </li>
                        <!-- <li>
                            <a href="/Locatario">
                                <i class="fas fa-shopping-cart"></i>Carrinho</a>
                        </li> -->
                        <li>
                            <a href="/Locatario/DadosLocatario">
                                <i class="fa fa-user"></i>Meus Dados</a>
                        </li>
                        <li>
                            <a href="/produtos">
                                <i class="fa fa-shopping-bag"></i>Loja</a>
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
                                <!-- <input class="au-input au-input--xl" type="text" name="search" placeholder="Buscar" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button> -->
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                                session_start();
                                                                            } ?>
                                                <?php if (isset($_SESSION['nomeLocatario'])) {
                                                    echo "Bem Vindo! " . $_SESSION['nomeLocatario'];
                                                } ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                                    <span class="email"><?php if (isset($_SESSION['nomeLocatario'])) {
                                                                            echo " " . $_SESSION['nomeLocatario'];
                                                                        } ?></span>
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
            <!-- END HEADER DESKTOP-->
            
            <!-- MAIN CONTENT-->
            
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-13">
                                <?php if (!is_null($ListaPedidos)){ ?>
                                    <div class="table-responsive table--no-card m-b-30">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>Data Pedido</th>
                                                    <th>Cód. Pedido</th>
                                                    <th>data Retirada</th>
                                                    <th class="text-right">Endereço</th>
                                                    <th class="text-right">Data Devolução</th>
                                                    <th class="text-right">Valor Total</th>
                                                    <th class="text-right">Status</th>
                                                    <th class="text-right"></th>
                                                </tr>
                                            </thead>
                                    <?php } ?>                           
                                            <?php 
                                              if (is_null($ListaPedidos)){ echo $msg; } else{ 
                                            foreach ($ListaPedidos as $listaPedidos) { ?>
                                               
                                        <form action="/Locatario/CancelarPedido" method="POST">
                                            <tbody>

                                                <tr>
                                                    <td><?php echo $listaPedidos->getdataPedido(); ?></td>
                                                    <td><?php echo $listaPedidos->getidPedido(); ?></td>
                                                    <td><?php echo $listaPedidos->getdataRetirada(); ?></td>
                                                    <?php $Endereco = $listaPedidos->getEnderecoPedido(); ?>
                                                    <td class="text-right"> <?php echo $Endereco->getLogradouro()." ".$Endereco->getNumero();?></td>
                                                    <td class="text-right"><?php echo $listaPedidos->getdataDevolucao(); ?></td>
                                                    <td class="text-right"><?php echo "R$" .$listaPedidos->getValorTotal(); ?></td>
                                                    <td><?php echo $listaPedidos->getStatus(); ?><input type="text" name="idPedido" value="<?php echo $listaPedidos->getidPedido(); ?>" hidden></td>
                                                    <input type="text" name="dataDevolucao" value="<?php echo $listaPedidos->getdataDevolucao(); ?>" hidden>
                                                    <td>
                                                    <?php if($listaPedidos->getStatus() == 'ESPERA'){?>
                                                    <div class="table-data-feature">
                                                        <button type="submit" class="item" data-original-title="Send">
                                                        <span class="iconify" data-icon="whh:circledelete" data-inline="false" style="font-size: 25px"></span>
                                                        </button>

                                                        <button type="button" data-toggle="modal" data-target="#largeModal<?php echo $listaPedidos->getidPedido(); ?>">
                                                        <span class="iconify" data-icon="ic:sharp-more-horiz" data-inline="false"></span>
                                                        </button>
                                                      </div>
                                                      <?php }else{?>
                                                        <button type="button" data-toggle="modal" data-target="#largeModal<?php echo $listaPedidos->getidPedido(); ?>">
                                                        <span class="iconify" data-icon="ic:sharp-more-horiz" data-inline="false"></span>
                                                      <?php }?>
                                                    </td>

                                                </tr>

                                            </tbody>
                                        </form>
                                            <?php } ?>
                                            <?php }?> 

                                        </table>
                                    </div>
                                </div>

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


    <!-- modal large inicio-->

    <?php  if (!is_null($ListaPedidos)){    ?>
    <?php foreach ($ListaPedidos as $listaPedidos) { ?>
 <form>
    <div class="modal fade" id="largeModal<?php echo $listaPedidos->getidPedido(); ?>" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"> 
                <h4 class="modal-title" id="largeModalLabel">Detalhes do Pedido</h4>              
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                </div>
                <?php }?>
                <div class="modal-body">
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-13">
                                    <div class="table-responsive table--no-card m-b-30">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <td><p>Cód. Pedido</p></td>
                                                    <td><p>Quantidade</p></td>
                                                    <td><p class="text-right">Valor unitario</p></td>
                                                    <td><p class="text-right">Valor Total</p></td>
                                                </tr>
                                            </thead>
                                            <?php $listItemPedido = $listaPedidos->getlistaItemPedido();?>
                                            <?php foreach ($listItemPedido  as $itemPedido) { ?>
                                            <tbody>
                                                <tr>
                                                    <td><p><?php echo $itemPedido->getIdProduto(); ?></p></td>
                                                    <td><p><?php echo $itemPedido->getQuantidade(); ?></p></td>
                                                    <td><p><?php echo $itemPedido->getValorUnitario(); ?></p></td>
                                                    <td><p><?php echo $itemPedido->getValorUnitario(); ?></p></td>

                                                </tr>

                                            </tbody>
                                            <?php } ?>
                                            <?php }?>    
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Confirm</button>
                    <button type="button" class="btn btn-primary">CANCELAR</button>
                </div>
            </div>
        </div>
    </div>
   </form> 
    <?php //}?>
    <!-- end modal large fiim-->

    <!-- Jquery JS-->
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- /vendor JS       -->
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
    <script src="/js/locatario_js/main.js"></script>

</body>

</html>
<!-- end document-->