<!DOCTYPE html>
<?php


if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}


$PedidoLocatario = unserialize($_SESSION['PedidoLocatario']);
//setcookie("PedidoLocatario", $PedidoLocatario);           
?>
<html lang="en">

<head>
  <title>Loca Artiles - Finalizar Pedido</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="fonts/loja_fonts/icomoon/style.css">

  <link rel="stylesheet" href="/css/loja_css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/loja_css/magnific-popup.css">
  <link rel="stylesheet" href="/css/loja_css/jquery-ui.css">
  <link rel="stylesheet" href="/css/loja_css/owl.carousel.min.css">
  <link rel="stylesheet" href="/css/loja_css/owl.theme.default.min.css">


  <link rel="stylesheet" href="/css/loja_css/aos.css">

  <link rel="stylesheet" href="/css/loja_css/style.css">
  <script src="https://kit.fontawesome.com/a3c008cb1b.js" crossorigin="anonymous"></script>

</head>
<script>
  function checkEndereco(idProduto) {
    document.getElementById("c_ship_different_address").checked = false;
    document.getElementById("ship_different_address").className = "collapse";

    var inputs = document.querySelectorAll('.c_create_account');
    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].getAttribute('id') !== idProduto) {
        inputs[i].checked = false;
        document.getElementById("endereco" + inputs[i].getAttribute('id')).className = "collapse";
      }

    }


  }

  function checkOutroEndereco() {
    var inputs = document.querySelectorAll('.c_create_account');
    for (var i = 0; i < inputs.length; i++) {
      inputs[i].checked = false;
      document.getElementById("endereco" + inputs[i].getAttribute('id')).className = "collapse";
    }

  }
</script>

<body>
  <?php $Locatario = $PedidoLocatario->getLocatarioPedido(); ?>
  <?php $listaEndereco = $Locatario->getListaEndereco(); ?>


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
                <a href="/Inicio" class="js-logo-clone"><img src="/images/loja_img/MENOR.jpg"></a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <?php if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                  } ?>
                  <?php if (isset($_SESSION['nomeLocatario'])) {
                    echo "Bem Vindo! " . $_SESSION['nomeLocatario'];
                  } else {
                    echo "Fazer Login ou Cadastre-se";
                  } ?>
                  <li><a href="<?php if (isset($_SESSION['idLocatario'])) {
                                  echo "/Teste";
                                } else {
                                  echo "/Entrar";
                                } ?>"><span class="icon icon-person"></span></a></li>
                  <li><a href="#"><span class=""></span></a></li>
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
          <div class="col-md-12 mb-0"><a href="index.html">Início</a> <span class="mx-2 mb-0">/</span> <a href="cart.html">Carrinho</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Finalizar Pedido</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <form action="/Loja/pedidoFinal" method="POST">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-12">
              <div class="border p-4 rounded" role="alert">
                Ainda não tem seu cadastro? <a href="#">Clique aqui!</a> para se cadastrar!!
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
              <h2 class="h3 mb-3 text-black">Endereços</h2>
              <div class="p-3 p-lg-5 border">

                <label for="c_country" class="text-black">Escolha um endereço para envio: <span class="text-danger">*</span></label>
                <?php foreach ($listaEndereco as $key => $Endereco) { ?>
                  <div class="form-group">
                    <label for="c_create_account" class="text-black" aria-controls="create_an_account"><input name="inputEndereco[]" data-toggle="collapse" href="#endereco<?php echo $Endereco->getId(); ?>" role="button" aria-expanded="false" onclick="checkEndereco('<?php echo $Endereco->getId(); ?>')" type="checkbox" value="<?php echo $Endereco->getId(); ?>" class="c_create_account" id="<?php echo $Endereco->getId(); ?>"> <?php echo $Endereco->getLogradouro(); ?></label>
                    <div class="collapse" id="endereco<?php echo $Endereco->getId(); ?>">
                      <div class="py-2">
                        <p class="mb-3"> <?php echo $Endereco->getLogradouro() . " " . $Endereco->getNumero() . " " . $Endereco->getBairro() . " " . $Endereco->getEstado() . " " . $Endereco->getCidade(); ?> </p>
                      </div>
                    </div>
                  </div>
                <?php   } ?>



                <div class="form-group">
                  <label for="c_ship_different_address" class="text-black"><input aria-controls="ship_different_address" data-toggle="collapse" href="#ship_different_address" role="button" aria-expanded="false" onclick="checkOutroEndereco()" type="checkbox" value="1" id="c_ship_different_address"> Deseja mandar para um Endreço Diferente?</label>
                  <div class="collapse" id="ship_different_address">
                    <div class="py-2">

                      <div class="form-group">
                        <label for="c_diff_country" class="text-black">Country <span class="text-danger">*</span></label>
                        <select id="c_diff_country" class="form-control">
                          <option value="1">Select a country</option>
                          <option value="2">bangladesh</option>
                          <option value="3">Algeria</option>
                          <option value="4">Afghanistan</option>
                          <option value="5">Ghana</option>
                          <option value="6">Albania</option>
                          <option value="7">Bahrain</option>
                          <option value="8">Colombia</option>
                          <option value="9">Dominican Republic</option>
                        </select>
                      </div>


                      <div class="form-group row">
                        <div class="col-md-6">
                          <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
                        </div>
                        <div class="col-md-6">
                          <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="c_diff_companyname" class="text-black">Company Name </label>
                          <input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Street address">
                        </div>
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                      </div>

                      <div class="form-group row">
                        <div class="col-md-6">
                          <label for="c_diff_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
                        </div>
                        <div class="col-md-6">
                          <label for="c_diff_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
                        </div>
                      </div>

                      <div class="form-group row mb-5">
                        <div class="col-md-6">
                          <label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
                        </div>
                        <div class="col-md-6">
                          <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Phone Number">
                        </div>
                      </div>

                    </div>

                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-6">

              <div class="row mb-5">
                <div class="col-md-12">
                  <h2 class="h3 mb-3 text-black">Data Retirada</h2>
                  <div class="p-3 p-lg-5 border">

                    <label for="c_code" class="text-black mb-3">Selecione uma Data para retirar o seu Pedido.</label>
                    <div class="form-group row">
                      <?php
                      $data = getdate();

                      $hoje = $data['year'] . '-' . '0' . $data['mon'] . '-' . $data['mday'];
                      ?>
                      <div class="col-10">
                        <input class="form-control" type="date" id="example-date-input" name="dataInicial" value="<?php echo $hoje ?>" min="<?php echo $hoje ?>" max="2020-12-31">
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="row mb-5">
                <div class="col-md-12">
                  <h2 class="h3 mb-3 text-black">Seu Pedido</h2>
                  <div class="p-3 p-lg-5 border">
                    <table class="table site-block-order-table mb-5">
                      <thead>
                        <th>Produto</th>
                        <th>Total</th>
                      </thead>
                      <tbody>

                        <?php $listaDeProdutos = $PedidoLocatario->getlistaProduto(); ?>
                        <?php foreach ($listaDeProdutos as $Produto) { ?>
                          <tr>
                            <td> <?php echo $Produto->getNome(); ?> <strong class="mx-2">x</strong> <?php echo $Produto->getQuantidade(); ?> </td>
                            <td>R$ <?php echo $Produto->getValDiaria() * $Produto->getQuantidade() ?></td>
                          </tr>
                        <?php } ?>
                        <tr>
                          <td class="text-black font-weight-bold"><strong>Valor Total</strong></td>
                          <td class="text-black font-weight-bold"><strong>R$<?php echo $PedidoLocatario->getValorTotal(); ?></strong></td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="border p-3 mb-3">
                      <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                      <div class="collapse" id="collapsebank">
                        <div class="py-2">
                          <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                        </div>
                      </div>
                    </div>

                    <div class="border p-3 mb-3">
                      <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>

                      <div class="collapse" id="collapsecheque">
                        <div class="py-2">
                          <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                        </div>
                      </div>
                    </div>

                    <div class="border p-3 mb-5">
                      <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                      <div class="collapse" id="collapsepaypal">
                        <div class="py-2">
                          <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <input class="btn btn-primary btn-lg py-3 btn-block" type="submit"> Place Order </input>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
      </form>
    </div>
    <!-- </form> -->
  </div>

  <footer class="site-footer border-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="row">
            <div class="col-md-12">
              <h3 class="footer-heading mb-4">Navigations</h3>
            </div>
            <div class="col-md-6 col-lg-4">
              <ul class="list-unstyled">
                <li><a href="#">Sell online</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Shopping cart</a></li>
                <li><a href="#">Store builder</a></li>
              </ul>
            </div>
            <div class="col-md-6 col-lg-4">
              <ul class="list-unstyled">
                <li><a href="#">Mobile commerce</a></li>
                <li><a href="#">Dropshipping</a></li>
                <li><a href="#">Website development</a></li>
              </ul>
            </div>
            <div class="col-md-6 col-lg-4">
              <ul class="list-unstyled">
                <li><a href="#">Point of sale</a></li>
                <li><a href="#">Hardware</a></li>
                <li><a href="#">Software</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
          <h3 class="footer-heading mb-4">Promo</h3>
          <a href="#" class="block-6">
            <img src="images/hero_1.jpg" alt="Image placeholder" class="img-fluid rounded mb-4">
            <h3 class="font-weight-light  mb-0">Finding Your Perfect Shoes</h3>
            <p>Promo from nuary 15 &mdash; 25, 2019</p>
          </a>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="block-5 mb-5">
            <h3 class="footer-heading mb-4">Contact Info</h3>
            <ul class="list-unstyled">
              <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
              <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
              <li class="email">emailaddress@domain.com</li>
            </ul>
          </div>

          <div class="block-7">
            <form action="#" method="post">
              <label for="email_subscribe" class="footer-heading">Subscribe</label>
              <div class="form-group">
                <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                <input type="submit" class="btn btn-sm btn-primary" value="Send">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
            <script>
              document.write(new Date().getFullYear());
            </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
        <?php #session_regenerate_id(); session_write_close();
        ?>
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