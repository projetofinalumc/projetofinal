<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Loca Articles - Inicio</title>
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
                <a href="/Inicio"><img src="/images/loja_img/MENOR.jpg" ></a>
              <!--  <a href="/Inicio" class="js-logo-clone">Loca Articles</a> -->
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                <?php if (session_status() !== PHP_SESSION_ACTIVE) {
                            session_start();
                          }?>
                <?php if(isset($_SESSION['nomeLocatario'])){echo "Bem Vindo! ".$_SESSION['nomeLocatario'];}else{ echo "Faça seu login ou Cadastre-se";}?>
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
            <li class="active">
              <a href="/Inicio">Inicio</a>
            </li>
            <li class="">
              <a href="/Sobre">Sobre nós</a>
            <li><a href="/produtos">Loja</a></li>
            <!-- <li><a href="#">New Arrivals</a></li> -->
            <li><a href="/contato">Contato</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="site-blocks-cover" style="background-image: url(/images/loja_img/vamosver.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
            <h2 class="mb-2">Veja esse lindo brinquedo para o seu evento</h2>
            <div class="intro-text text-center text-md-left">
              <p1 class="mb-4">Consulte os preços no catálogo da loja ou entre em contato com o nosso consultor de venda</p1>
              <p>
                <a href="/produtos" class="btn btn-sm btn-primary">Alugue agora</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-plus"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Acessibilidade</h2>
              <p>Locação com preço acessível e com facil acesso e site. </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-group"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Brinquedos para a família toda</h2>
              <p>Todos os brinquedos para sua festa de aniversário, festas de familiares e eventos direcionados para as crianças, tudo isso em um único lugar.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Suporte ágil e rápido</h2>
              <p>Nosso suporte sempre está em atendimento do horário das 8:00 às 18:00 Horas. Para mais informações ou contatos <a href="/contato">clique aqui.</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="site-section site-blocks-2">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="public/images/women.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Collections</span>
                <h3>Women</h3>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/children.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Collections</span>
                <h3>Children</h3>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/men.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Collections</span>
                <h3>Men</h3>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div> -->

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Mais Alugados</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              <div class="item">
                <div class="block-4 text-center" >
                  <figure class="block-4-image">
                    <img src="/images/imagens produtos/pulaPula.jpg" alt="" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Pula Pula</a></h3>                                   
                    <p class="text-primary font-weight-bold">R$250,00 reais</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="/images/imagens produtos/camaElastica.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Cama Elástica</a></h3>                    
                    <p class="text-primary font-weight-bold">$50</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="/images/imagens produtos/piscinaBolinha.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Piscina de Bolinhas</a></h3>                    
                    <p class="text-primary font-weight-bold">$50</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="/images/imagens produtos/pebolim2.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    
                    
                    <h3><a href="#">Mesa Pebolim</a></h3>                   
                    <p class="text-primary font-weight-bold">$50</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="/images/imagens produtos/tomboLegal.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Tombo Legal</a></h3>                   
                    <p class="text-primary font-weight-bold">R$50</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="site-section block-8">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Big Sale!</h2>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 mb-5">
            <a href="#"><img src="images/loja_img/blog_1.jpg" alt="Image placeholder" class="img-fluid rounded"></a>
          </div>
          <div class="col-md-12 col-lg-5 text-center pl-md-5">
            <h2><a href="#">50% less in all items</a></h2>
            <p class="post-meta mb-4">By <a href="#">Carl Smith</a> <span class="block-8-sep">&bullet;</span> September 3, 2018</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam iste dolor accusantium facere corporis ipsum animi deleniti fugiat. Ex, veniam?</p>
            <p><a href="#" class="btn btn-primary btn-sm">Shop Now</a></p>
          </div>
        </div>
      </div>
    </div> -->

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