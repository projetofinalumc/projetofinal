<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Loca Articles - Loja</title>
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
                  <li>
                  <?php if(isset($_SESSION['Total_Carrinho'])){ ?>
                    <a href="/finalizar" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count"><?php echo $_SESSION['Total_Carrinho']?></span>
                    </a>
                    <?php }?>
                  </li> 
                  <?php if(isset($_SESSION['idLocatario'])){ ?>
                  <li><a href="/Sair"><span class="fa fa-power-off fa-lg"></span></a></li>
                  <?php } ?>
                  <li class="d-inline-block d-md-none ml-md-0"><a href="/" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
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
          <div class="col-md-12 mb-0"><a href="index.html">Início</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Loja</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Produtos</h2></div>

              </div>
            </div>
            
            <div class="row mb-5">
            <?php foreach ($ListaProduto as $ListaProduto){?>
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                    <a href="shop-single.html"><img src="images/produtos_cad/<?php echo $ListaProduto->getImgNome();?>" alt="Image placeholder" class="img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="<?php if(isset($_SESSION['idLocatario'])){ echo "/AdicionarCarrinho?Produto_id=".$ListaProduto->getId()."&Quantidade=".$ListaProduto->getQuantidade();}else{ echo "/Entrar";}?>"><?php echo $ListaProduto->getNome();?></a></h3>
                    <p class="mb-0"><?php echo $ListaProduto->getModelo();?></p>
                    <p class="text-primary font-weight-bold">R$<?php echo $ListaProduto->getValDiaria();?></p>
                  </div>
                </div>
              </div>
            <?php } ?>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                  
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

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
                <li class="address">Av. Dr. Cândido X. de Almeida e Souza, 200 - Centro Cívico, Mogi das Cruzes - SP, 08780-911/li>
                <li class="phone"><a href="tel://23923929210">+55 11 47474747</a></li>
                <li class="email">pfcsisinfo2019@gmail.com/li>
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
  <script src="/js/loja_js/aos.js"></script>

  <script src="/js/loja_js/main.js"></script>
    
  </body>
</html>