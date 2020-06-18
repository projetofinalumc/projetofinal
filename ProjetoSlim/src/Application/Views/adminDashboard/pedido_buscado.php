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
    <title>Devolução do Pedido</title>


    <!-- Fontfaces CSS-->
    <link rel="stylesheet" href="/css/admin_css/style.css" media="all">
    <link href="/css/admin_css/font-face.css" rel="stylesheet" media="all">
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
    <link href="/css/admin_css/theme.css" rel="stylesheet" media="all">

</head>
<script>
  function checkDefeito(idProduto) {
      if(document.getElementById("cb" + idProduto).checked == true){
      document.getElementById(idProduto).style.visibility = "visible";
      document.getElementById(idProduto).value = 1;         
      document.getElementById(idProduto).disabled = false;
      }else{
        document.getElementById(idProduto).style.visibility = "hidden";
        document.getElementById(idProduto).disabled = true;
      }
    }
</script>
<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                <div class="site-logo">
                <a href="/Inicio" class="js-logo-clone"><img src="/images/loja_img/MENOR.jpg" ></a>
                </div>                
             
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tags"></i>Produtos</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="/Admin/NovoProduto">Cadastrar novo produto</a>
                                </li>
                                <li>
                                    <!-- <a href="/Admin/ListaProduto">Lista de Produtos</a> -->
                                </li>
                                <li>
                                    <!-- <a href="index3.html">Dashboard 3</a> -->
                                </li>
                                <li>
                                    <!-- <a href="index4.html">Dashboard 4</a> -->
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-list-ul"></i>Pedido</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="/Admin/ListaPedido">Lista de Pedidos</a>
                                </li>
                                <li>
                                     <a href="/Admin/DevolucaoPedido">Devolucão de Pedido</a>
                                </li>
                                <li>
                                    <!-- <a href="index3.html">Dashboard 3</a> -->
                                </li>
                                <li>
                                    <!-- <a href="index4.html">Dashboard 4</a> -->
                                </li>
                            </ul>
                        </li>
                         <!-- <li>
                            <a href="chart.html">
                                <i class="fas fa-list-ul"></i>Pedidos</a>
                        </li> -->
                        <!--
                        <li class="active">
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li> -->
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li> -->
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
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">
                                            <?php 
                                            if (session_status() !== PHP_SESSION_ACTIVE) {
                                            session_start();
                                             } ?>
                                             <?php if (isset($_SESSION['nomeAdm'])) {
                                                echo "Bem Vindo! " . $_SESSION['nomeAdm'];
                                            } ?>
                                            </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <!-- <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a> -->
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="/Admin/Home"><?php echo $_SESSION['nomeAdm'];  ?></a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <!-- <div class="account-dropdown__item">
                                                    <a href="/Admin/MeuUsuario">
                                                        <i class="zmdi zmdi-account"></i>Meu Usuario</a>
                                                </div> -->
                                                <!-- <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div> -->
                                                <!-- <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div> -->
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="/Admin/logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
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
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Devolução do Pedido Nº </h2>
    <!-- session_start(); $_SESSION['idPedido']; -->
    <!-- Esse session é para receber direto da controller ou por sessão,
    o id do Pedido que está sendo verificado na pagina atual; -->
                                    
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                        <!-- <i class="zmdi zmdi-plus"></i>add item</button> -->
                                </div>
                            </div>
                        </div>
                    <div class="position_form">
        <!-- Modal -->
        <?php foreach($ListaPedidos as $Pedido){?>
<?php 
$multaPedido = 0;
           if($Pedido->getStatus() == "ATRASADO"){
           
            $dataDevolucao = $Pedido->getDataDevolucao();
            $dataDevolucao = date_create($dataDevolucao);
 
            $data = getdate();
            $dataArrumada = $data['year'].'-'.$data['mon'].'-'.$data['mday'];
            $dataDeHoje = date_create($dataArrumada);
 
            $diff = date_diff($dataDeHoje,$dataDevolucao);
            $diasAtrasado = $diff->format("%a");
            
             $multaPedido = $Pedido->getMultaPedido();
 
             $multaPedido = $multaPedido * (int)$diasAtrasado;
                 
         }
    ?>
         <table class="table table-sm table-dark">
            <thead>
                <tr>
                    <th scope="col">Cód do Pedido</th>
                    <th scope="col">Data do Retirada</th>
                    <th scope="col">Data para Devolução </th>
        <?php if($multaPedido != 0){?> <th scope="col">Multa de Atraso(R$)</th><?php }?>
                    <th scope="col">Total do Pedido(R$)</th>
                    <th scope="col">Status</th>
                    <th scope="col">Lista de Produtos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $Pedido->getidPedido();?></td>
                    <td><?php echo $Pedido->getdataRetirada();?></td>
                    <td><?php echo $Pedido->getdataDevolucao();?></td>
    <?php if($multaPedido != 0){?> <td>R$ <?php echo $multaPedido;?></td><?php }?>
                    <td>R$ <?php echo $Pedido->getvalorTotal();?></td>
                    <td><?php echo $Pedido->getStatus();?>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeModalDevolucao">
                     Itens do Pedido
                    </button></td> 
                </tr>
            </tbody>
        </table>
    <?php }?>

    <?php if(isset($msg)){?>
        <form action="/Admin/Finalizando" method="POST">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong>Finalizando Pedido</strong> 
                </div>
              
                <div class="card-body card-block">

                
                    <table class="table table-top-campaign">
                        <tbody>

                            
                            <?php foreach ($ListaPedidos as $Pedido) { ?>
                                <?php $ListaItemPedido = $Pedido->getListaItemPedido();  ?>
    
                            <tr>
                            <td class="text-black font-weight-bold"><strong>Valor do Pedido</strong></td>
                            <?php $valorTotal = $Pedido->getValorTotal(); 
                                $valorMulta = $Pedido->getMultaPedido();?>
                            <td class="text-black font-weight-bold"><strong> R$<?php echo $valorTotal - $valorMulta; ?></strong></td>
                            <input type="text" name="idPedido" value="<?php echo $Pedido->getidPedido();?>" hidden>
                            </tr>
                            <tr>
                            <td class="text-black font-weight-bold"><strong>Multa</strong></td>
                            <td class="text-black font-weight-bold"><strong> R$<?php echo $Pedido->getMultaPedido(); ?></strong></td>
                            </tr>
                            <tr>
                            <td class="text-black font-weight-bold"><strong>Valor Total</strong></td>
                            <td class="text-black font-weight-bold"><strong>R$<?php echo $Pedido->getValorTotal(); ?></strong></td>
                            </tr>
                            <?php } ?>
                        </tbody >
                    </table>
                    
      
                </div>
              
                <button type="submit" class="btn btn-primary" >Finalizar</button>
            </div>
            
        </div>
    </form>
    </div>
    <?php }?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


                <!-- modal large FILTRO -->
        
<?php foreach($ListaPedidos as $Pedido){?>
    <?php $ListaItemPedido = $Pedido->getlistaItemPedido();?>
    <?php $id = $Pedido->getidPedido();?>
    <?php $Status = $Pedido->getStatus();?>
    <div class="modal fade" id="largeModalDevolucao" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <?php if($Status == "ESPERA"){$rota = "/Admin/Retirada";}else{$rota = "/Admin/DevolucaoFinal";}?>
        <form action="<?php echo $rota;?>" method="POST">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Checking de Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                
                    <table class="table table-sm table-dark">
            <thead>
                <tr>
                    <th scope="col">Cód do Produto</th>
                    <th scope="col">Valor Unitario</th>
                    <th scope="col">Quantidade</th>
                
<?php if($Status != "CANCELADO" && $Status != "ESPERA" && $Status != "FINALIZADO"){?>   <th scope="col">Lista de Produtos</th><?php }?>
                </tr>
            </thead>
            
            <tbody>
            <input type="text" value="<?php echo $id;?>" name="idPedido" hidden>
            <?php foreach($ListaItemPedido as $itemPedido){?>
                <tr>
                    <td><?php echo $itemPedido->getIdProduto();?></td>
                   
                    <td>R$ <?php echo $itemPedido->getValorUnitario();?></td>
                    <td> <?php echo $itemPedido->getQuantidade();?></td>
                  
            <?php if($Status != "CANCELADO" && $Status != "ESPERA" && $Status != "FINALIZADO"){?> <td>  <input type="checkbox" id="cb<?php echo $itemPedido->getIdProduto();?>" onclick="checkDefeito(<?php echo $itemPedido->getIdProduto();?>)" name="inputDefeituoso[]" value="<?php echo $itemPedido->getIdProduto();?>"><label> Defeito/Perdido</label><input id="<?php echo $itemPedido->getIdProduto();?>" name="quantidadeDefeito<?php echo $itemPedido->getIdProduto();?>" type="number" max="<?php echo $itemPedido->getQuantidade();?>" min="1" style="visibility: hidden;"></td> <?php }?>
                </tr>
                <?php }?>
            </tbody>
            
        </table>

                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                    <?php $dataRetirada = date_create($Pedido->getdataRetirada());?>
                    <?php $dataHoje = date_create(date('Y/m/d'));?>
                    <?php $data = date_diff($dataHoje,$dataRetirada); ?>
                    <?php $dataComp = $data->format("%R%a");?>                   
            <?php if($Status != "CANCELADO" && $Status != "FINALIZADO" && $dataComp <= 0){?>   <button type="submit" class="btn btn-primary" >Confirmar</button> <?php }?>
                </div>
            </div>
        </div>
        </form>  
    </div>
    <?php }?>
			<!-- end modal large -->

    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
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
