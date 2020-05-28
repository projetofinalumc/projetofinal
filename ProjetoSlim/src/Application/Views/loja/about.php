<!DOCTYPE html>
<html lang="en">

<head>
  <title>Loca Articles - Sobre</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <script src="https://kit.fontawesome.com/a3c008cb1b.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="/fonts/loja_fonts/icomoon/style.css">

  <link rel="stylesheet" href="/css/loja_css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/loja_css/magnific-popup.css">
  <link rel="stylesheet" href="/css/loja_css/jquery-ui.css">
  <link rel="stylesheet" href="/css/loja_css/owl.carousel.min.css">
  <link rel="stylesheet" href="/css/loja_css/owl.theme.default.min.css">


  <link rel="stylesheet" href="/css/loja_css/aos.css">

  <link rel="stylesheet" href="/css/loja_css/style.css">
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
                <a href="/Inicio" class=""><img src="/images/loja_img/MENOR.jpg"></a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <?php session_start(); ?>
                  <?php if (isset($_SESSION['nomeLocatario'])) {
                    echo "Bem Vindo! " . $_SESSION['nomeLocatario'];
                  } else {
                    echo "Fazer Login ou Cadastre-se";
                  } ?>
                  <li><a href="<?php if (isset($_SESSION['idLocatario'])) {
                                  echo "/Locatario/locatario";
                                } else {
                                  echo  "/Entrar";
                                } ?>"><span class="icon icon-person"></span></a></li>
                  <li>
                    <?php if (isset($_SESSION['Total_Carrinho'])) { ?>
                      <a href="/finalizar" class="site-cart">
                        <span class="icon icon-shopping_cart"></span>
                        <span class="count"><?php echo $_SESSION['Total_Carrinho'] ?></span>
                      </a>
                    <?php } ?>
                    <?php if (isset($_SESSION['idLocatario'])) { ?>
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
            <li class="a">
              <a href="/Inicio">Início</a>
            </li>
            <li class="active">
              <a href="/Sobre">Sobre nós</a>
            <li><a href="/produtos">Loja</a></li>
            <!-- <li><a href="#">New Arrivals</a></li> -->
            <li><a href="/contato">Contato</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Início</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Sobre</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section border-bottom" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <div class="block-16">
              <figure>
                <img src="/images/loja_img/equipe.jpg"  class="img-fluid rounded">
                <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-button popup-vimeo"><span class="ion-md-play"></span></a>

              </figure>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5">


            <div class="site-section-heading pt-3 mb-4">
              <h2 class="text-black">Sobre nós...</h2>
            </div>
            <p>A Loca Articles foi fundada em 10 de fevereiro de 2018, por luma awsville, em ribeirão preto, interior paulista. Com o intuito de oferecer aos seus clientes, artigos para locação para eventos, estes sendo propriamente para eventos de criança.</p>
            <p></p>

          </div>
        </div>
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
  <script src="j/s/loja_js/bootstrap.min.js"></script>
  <script src="/js/loja_js/owl.carousel.min.js"></script>
  <script src="/js/loja_js/jquery.magnific-popup.min.js"></script>
  <script src="/js/loja_js/aos.js"></script>

  <script src="/js/loja_js/main.js"></script>

</body>

</html>