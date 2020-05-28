<!DOCTYPE html>
<html lang="en">

<head>
  <title>Loca Articles - Cadastro</title>
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

<script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

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
                <a href="/Inicio" class=""><img src="/images/loja_img/MENOR.jpg" ></a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                <?php session_start();?>
                <?php if(isset($_SESSION['nomeLocatario'])){echo "Bem Vindo! ".$_SESSION['nomeLocatario'];}else{ echo "Fazer Login ou Cadastre-se";}?>
                <li><a href="<?php if(isset($_SESSION['idLocatario'])){echo "/Locatario/locatario";}else{echo  "/Entrar" ;} ?>"><span class="icon icon-person"></span></a></li>
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
            <li class="a">
              <a href="/Inicio">Início</a>
            </li>
            <li class="a">
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
          <div class="col-md-12 mb-0"><a href="index.html">Inicio</a> <span class="mx-2 mb-0">/</span> <strong
              class="text-black">Cadastrar Locatario</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row" id="form-register">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black" id="form-register-title">Preencha o formulário de cadastro</h2>
          </div>
          <div class="col-md-12">

            <form action="/registrar" method="post">
              <div class="form-cad-loc">
                <div class="p-3 p-lg-5 border">
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_fname" class="text-black">Primeiro nome: <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="col-md-6">
                      <label for="c_lname" class="text-black">Sobrenome: <span class="text-danger" >*</span></label>
                      <input type="text" class="form-control" id="c_lname" name="c_lname" required>
                    </div>
                    <div class="col-md-12">
                      <label for="password" class="text-black">Senha:<span class="text-danger">*</span></label>
                      <input type="password" class="form-control" id="password" name="password_loc" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_email" class="text-black">Email:<span class="text-danger">*</span></label>
                      <input type="email" class="form-control" id="email" name="email_loc" placeholder="" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_subject" class="text-black">CPF:<span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_subject" class="text-black">CEP:<span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" id="numero_cep" name="numero_cep" onblur="pesquisacep(this.value);" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                    <label for="c_subject" class="text-black">Estado:<span class="text-danger">*</span> </label>
                    <select name="uf" id="uf" class="form-control">
                            <option value="">Selecione</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_subject" class="text-black">Logradouro:<span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" id="rua" name="logradouro_end" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_subject" class="text-black">Bairro:<span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" id="bairro" name="bairro_loc" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_subject" class="text-black">Cidade:<span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" id="cidade" name="cidade_loc" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_subject" class="text-black">Numero:<span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" id="numero_end" name="numero_end" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-12">
                      <input type="submit" class="btn btn-primary btn-lg btn-block" value="Cadastrar" required>
                    </div>
                  </div>
                </div>
              </div>
            </form>
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
                <h3 class="footer-heading mb-4">Mais opções</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Vendas onlines</a></li>
                  <!--<li><a href="#">Features</a></li>-->
                  <li><a href="#">Carrinho de compras</a></li>
                  <!--<li><a href="#">Store builder</a></li>-->
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
              <h3 class="footer-heading mb-4">Contate-nos</h3>
              <ul class="list-unstyled">
                <li class="address">Av. Dr. Cândido Xavier de Almeida Souza, 200 - Centro Cívico, Mogi das Cruzes - SP,
                  08780-911</li>
                <li class="phone"><a href="tel://23923929210">+55 011930981711</a></li>
                <li class="email">pfcsisinfo2019@gmail.com</li>
              </ul>
            </div>

            <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Se inscreva!</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                  <input type="submit" class="btn btn-sm btn-primary" value="Enviar">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script data-cfasync="false"
                src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
              <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made
              with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank"
                class="text-primary">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
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