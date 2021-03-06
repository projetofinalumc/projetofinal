<!DOCTYPE html>
<?php


if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}


  //$PedidoLocatario = unserialize($_SESSION['PedidoLocatario']);
  //setcookie("PedidoLocatario", $PedidoLocatario);           
?>
<html lang="en">
  <head>
    <title>Loca Artiles - Carrinho</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/loja_fonts/icomoon/style.css">

    <link rel="stylesheet" href="/css/loja_css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/loja_css/magnific-popup.css">
    <link rel="stylesheet" href="/css/loja_css/jquery-ui.css">
    <link rel="stylesheet" href="/css/loja_css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/loja_css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/loja_css/aos.css">

    <link rel="stylesheet" href="css/loja_css/style.css">
    <script src="https://kit.fontawesome.com/a3c008cb1b.js" crossorigin="anonymous"></script>
    
  </head>
  <script>
        function somaBtnOnclick(id,quantidade) {
           valorTotal = Number(document.getElementById(id).value);
              if(valorTotal != quantidade){
                document.getElementById(id).value = Number(document.getElementById(id).value) + 1;
            }
        }
        function subtrairBtnOnclick(id) {
            if(document.getElementById(id).value != 1){
              document.getElementById(id).value = Number(document.getElementById(id).value) - 1;
            }
        }
        $("btnExcluir").click(function() {
           $(this).closest("form").attr("action", "retirarCarrinho");     
        });
</script> 
<style>
input[type=number]::-webkit-inner-spin-button { 
    -webkit-appearance: none;
    
}
input[type=number] { 
   -moz-appearance: textfield;
   appearance: textfield;

}

</style>

<body>

  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
    <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Pesquise">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="">
                <a href="/Inicio" class="js-logo-clone"><img src="/images/loja_img/MENOR.jpg" ></a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                <?php if (session_status() !== PHP_SESSION_ACTIVE) {
                            session_start();
                          }?>
                <?php if(isset($_SESSION['nomeLocatario'])){echo "Bem Vindo! ".$_SESSION['nomeLocatario'];}else{ echo "Fazer Login ou Cadastre-se";}?>
                  <li><a href="<?php if(isset($_SESSION['idLocatario'])){echo "/Locatario/locatario";}else{echo "/Entrar";} ?>"><span class="icon icon-person"></span></a></li>
                  <li><a href="#"><span class=""></span></a></li>
                  <li>
                  <?php if(isset($_SESSION['Total_Carrinho'])){ ?>
                    <a href="/finalizar" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count"><?php echo $_SESSION['Total_Carrinho']?></span>
                    </a>
                    <?php }?>
                  <?php if(isset($_SESSION['idLocatario'])){ ?>
                  <li><a href="/Sair"><span class="fa fa-power-off fa-lg"></span></a></li>
                  <?php } ?>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
      <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="">
              <a href="/Inicio">Início</a>
            </li>
            <li class="">
              <a href="/Sobre">Sobre nós</a>
            <li class="active"><a href="/produtos">Loja</a></li>
            <!-- <li><a href="#">New Arrivals</a></li> -->
            <li><a href="/contato">Contato</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Início</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Carrinho</strong></div>
        </div>
      </div>
    </div>
    </header>

    <div class="site-section">
    <form class="col-md-12" method="post" action="/Loja/checkout">
      <div class="container">
        <div class="row mb-5">
          
            <div class="site-blocks-table">
            <?php //if (!is_null($ListaPedidos)){ ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Imagem</th>
                    <th class="product-name">Produto</th>
                    <th class="product-price">Valor Diária</th>
                    <th class="product-quantity">Quantidade</th>
                    <!--th class="product-total">Total</th> -->
                    <th class="product-remove">Remover</th>
                  </tr>
                </thead>
                <tbody>

                
                <?php 
                //if (is_null($ListaPedidos)){ echo "Você ainda não tem nenhum produto no carrinho"; } else{
                foreach($ListaProdutos as $produto){?>
                
                  <tr>
                    <td class="product-thumbnail">
                      <img src="images/produtos_cad/<?php echo $produto->getImgNome(); ?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $produto->getNome()?></h2>
                    </td>
                    <td>R$ <?php echo $produto->getValDiaria()?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" onclick="subtrairBtnOnclick(<?php echo $produto->getId();?>)" type="button">&minus;</button>
                        </div>
                        <input type="number" readonly="true" class="form-control text-center" name="Produto<?php echo $produto->getId();?>" id="<?php echo $produto->getId();?>" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" onclick="somaBtnOnclick(<?php echo $produto->getId();?>,<?php echo $produto->getQuantidade();?>)" type="button">&plus;</button>
                        </div>
                      </div>
                    </td>
                    <input type="number" name="Produto_id" value="<?php echo $produto->getId();?>" hidden>
                    <td><button formaction="retirarCarrinho" id="btnExcluir" type="submit" class="btn btn-primary btn-sm">X</button></td>
                    
                  </tr>
                 <?php }?>
                <?php //}?>
                </tbody>
              </table>
                <?php  ?>
            </div>
          
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <!-- <button class="btn btn-primary btn-sm btn-block">FINALIZAR</button> -->
                <button  type="submit" class="btn btn-primary btn-sm btn-block">FINALIZAR</button>
              </div>
              <div class="col-md-6">
                <!-- <button class="btn btn-outline-primary btn-sm btn-block">Continuar comprando</button> -->
                <a href="/produtos" class="btn btn-outline-primary btn-sm btn-block">CONTINUAR alugando</a>
              </div>
            </div>
           
            <!-- Cupom de desconto
              <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-sm">Apply Coupon</button>
              </div> -->
            </div>
          </div>
          </form>
       
        </div>
      </div>
    </div>

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navegação</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="/Inicio">Início</a></li>
                  <li><a href="/Sobre">Sobre Nós</a></li>
                  <li><a href="/produtos">Loja</a></li>
                  <li><a href="/contato">Contato</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                
              </div>
              <div class="col-md-6 col-lg-4">
                
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
          
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contato</h3>
              <ul class="list-unstyled">
                <li class="address">Av. Dr. Cândido X. de Almeida e Souza, 200 - Centro Cívico, Mogi das Cruzes - SP, 08780-911</li>
                <li class="phone"><a href="">+55 11 47474747</a></li>
                <li class="email">pfcsisinfo2019@gmail.com</li>
              </ul>
            </div>

            <div class="block-7">
            </div>
          </div>
        </div>    
      </div>
    </footer>
  </div>

  <script src="/js/loja_js/jquery-3.3.1.min.js"></script>
  <script src="/js/loja_js/jquery-ui.js"></script>
  <script src="/js/loja_js/popper.min.js"></script>
  <script src="/js/loja_js/bootstrap.min.js"></script>
  <script src="/js/loja_js/owl.carousel.min.js"></script>
  <script src="/js/loja_js/jquery.magnific-popup.min.js"></script>
  <!-- <script src="/js/loja_js/aos.js"></script> -->

  <script src="/js/loja_js/main.js"></script>
    
  </body>
</html>