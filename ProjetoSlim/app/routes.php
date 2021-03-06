<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\User\ControllerTest;
use App\Application\Actions\User\ControllerLocatario;
use App\Application\Actions\User\ControllerCarrinho;
use App\Application\Actions\User\ControllerPedido;
use App\Application\Actions\User\ControllerProduto;
use App\Application\Actions\User\ControllerAdmin;
use App\Application\Actions\User\ControllerSession;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
//ola_teste
    //Carrinho
    $app->group('', function (Group $group) {

       # $group->post('/AdicionarCarrinho', ControllerCarrinho::class .':adicionarProduto');
        //$group->get('/AdicionarCarrinho', ControllerCarrinho::class .':adicionarProduto');
        $group->post('/retirarCarrinho', ControllerCarrinho::class .':retirarProduto');
        $group->get('/finalizar', ControllerCarrinho::class .':finalizarCarrinho');

        $group->get('/Entrar', function ($request, $response, $args) {

            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/locatarioDashboard/');
            
            #session_start();
            #unset($_SESSION['user']);
        
        
            return $renderer->render($response, "login.php", $args);
   

            
        });
        $group->get('/contato', function ($request, $response, $args) {

            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/loja/');
            
            #session_start();
            #unset($_SESSION['user']);
        
        
            return $renderer->render($response, "contact.php", $args);
   

            
        });
        $group->get('/Cadastro/NovoLocatario', function($request, $response, $args){

            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/loja/');
    
            return $renderer->render($response, "newloc.php", $args);
    
        });


        $group->get('/cart', function ($request, $response, $args) {

            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/loja/');
            
            //session_start();
            //unset($_SESSION['user']);
        
        
            return $renderer->render($response, "cart.php", $args);
   

            
        });
        
        $group->get('/Inicio', function($request, $response, $args){

            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/loja');


            return $renderer->render($response,"index.php",$args);


        });

        $group->get('/Sair', function($request, $response, $args){

            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
                session_destroy();
              }
            

            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/loja');


            return $renderer->render($response,"index.php",$args);


        });

        $group->get('/Sobre', function($request, $response, $args){
            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/loja');

            return $renderer->render($response, "about.php");
        });
        $group->get('/listaproduto', function($request, $response, $args){
            foreach($args['ListaProdutos'] as $produto){
                echo $produto->getNome();
            }
            

        });
        $group->post('/AdicionarCarrinho', function($request, $response, $args){
            ControllerCarrinho::adicionarProduto($request, $response,$args);
           return ControllerProduto::listarProdutosLoja($request, $response,$args);
        });

        
        $group->get('/Home/Endereco/{id}', ControllerLocatario::class .':buscarEndereco' );
        $group->get('/produtos', ControllerProduto::class .':listarProdutosLoja');
        $group->post('/Home', ControllerLocatario::class .':loginLocatario');
        $group->post('/CadastraEnd', ControllerLocatario::class .':cadastrarNovoEndereco');
        
        $group->post('/Editar', ControllerLocatario::class .':alterarDadosLocatario');
        $group->post('/registrar', ControllerLocatario::class .':cadastrar');
        $group->get('/register', ControllerLocatario::class .':listar');
        
        $group->get('/Home', ControllerLocatario::class .':retornarDadosLocario' );


        $group->get('/Tabelas', function ($request, $response, $args) {

            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/locatarioDashboard/');

            session_start();
            
            if(isset($_SESSION['user'])){
                return $renderer->render($response, "table.php", $args);
            }else{
                return $response->withHeader('Location', '/')
                                ->withStatus(301);
            }

            
        });
        $group->post('/login/cadastro', ControllerLocatario::class .':adicionar');
    });

    //Admin -> edição ishi
    $app->group('/Admin', function (Group $group) {

        
        $group->get('/Entrar' ,function ($request, $response, $args){

            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/adminDashboard/');

            
            return $renderer->render($response, "login.php", $args);
        });
        $group->get('/Tabela' ,function ($request, $response, $args){

            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/adminDashboard/');

            
            return $renderer->render($response, "table2.php", $args);
        });

        $group->get('/DevolucaoPedido' ,function ($request, $response, $args){

            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/adminDashboard/');

            
            return $renderer->render($response, "buscar_devolucao_pedido.php", $args);
        });

        $group->get('/teste' ,function ($request, $response, $args){

            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/adminDashboard/');

            
            return $renderer->render($response, "pedido_buscado.php", $args);
        });
        $group->get('/NovoProduto' , ControllerProduto::class . ':listarprodutoAdmin');
        $group->post('/NovoProduto' , ControllerProduto::class . ':adicionarProduto');
        $group->post('/FiltroProduto' , ControllerProduto::class . ':listarProdutoAdminFiltrado');
        $group->post('/EditarProduto' , ControllerProduto::class . ':alterarProduto');
        $group->post('/DeletarProduto' , ControllerProduto::class . ':excluirProduto');
        $group->get('/ListaPedido' , ControllerPedido::class . ':Ver_Pedido_Admin');
        $group->post('/BuscarPedido' , ControllerPedido::class . ':buscarPedidoDevolucao');
        $group->post('/DevolucaoFinal' , ControllerPedido::class . ':devolucaoPedidoLocatario');
        $group->post('/Retirada' , ControllerPedido::class . ':retiradaPedidoLocatario');
        $group->post('/Finalizando' , ControllerPedido::class . ':finalizandoPedidoLocatario');

       # $group->get('/FinalizarPedido' , ControllerPedido::class . ':finalizarPedido');
        $group->get('/Email' , ControllerPedido::class . ':Email');
        $group->post('/ListaPedido' , ControllerPedido::class . ':Ver_Pedido_Admin_filtrado');
        $group->get('/AreaAdministrador' ,function ($request, $response, $args){

            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/adminDashboard/');

            
             return $renderer->render($response, "index.php", $args);
        });
        $group->post('/Home', ControllerAdmin::class .':login');
        $group->get('/Sair' , ControllerSession::class . ':logout');
        $group->post('/ListaProduto', ControllerProduto::class . ':listarprodutoAdmin');
        $group->post('/Adicionar', ControllerProduto::class . ':adicionarProduto');
        $group->post('/ExcluirProduto', ControllerProduto::class . ':excluirProduto');
        $group->post('/retornaImagem', ControllerProduto::class . ':retornaImagem');
        
        // $group->get('/table', ControllerProduto::class . ':listarprodutoAdmin');
    });
   
   
   
   
    //ROTAS PARA TESTES VICTOR

    $app->group('/victor', function (Group $group) {    

        //teste de view
        $group->get('/teste', function ($request, $response, $args) {
            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/loja');
            return $renderer->render($response,"finalCadastro.php",$args);

        });     

    });    

    //ROTAS DE TESTE PARA A DASHBOARD DE LOCATARIO
    $app->group('/Locatario', function (Group $group) {

        $group->get('/table', function ($request, $response, $args) {
            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/locatarioDashboard/');
            return $renderer->render($response,"table.php",$args);

        });


        $group->get('/map', function ($request, $response, $args) {
            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/locatarioDashboard/');
            return $renderer->render($response,"map.php",$args);

            
        });

        $group->get('/modal', function ($request, $response, $args) {
            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/locatarioDashboard/');
            return $renderer->render($response,"modal.php",$args);

            
        });
        
       
        //Edições de Victor para Dashboard Locatario
        $group->get('/Entrar', function ($request, $response, $args) {
            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/locatarioDashboard/');
            return $renderer->render($response,"login.php",$args);

        });

        

        $group->get('/carrinho', function ($request, $response, $args) {
            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/locatarioDashboard/');
            return $renderer->render($response,"chart.php",$args);

        });

        $group->get('/DadosLocatario', ControllerLocatario::class .':retornarDadosLocario');

        $group->post('/alterar', ControllerTest::class .':alterar');
        $group->post('/Login', ControllerSession::class .':login');
        $group->post('/EditarEnd', ControllerLocatario::class .':editarEndereco');
        $group->get('/Sair', ControllerSession::class .':logout');
        $group->post('/CancelarPedido', ControllerPedido::class .':cancelarPedidoLocatario');
        $group->get('/locatario', ControllerPedido::class .':Ver_Pedido_Locatario');
        $group->post('/retornaDados', ControllerLocatario::class .':retornarDadosLocario');
        $group->post('/EditarDados', ControllerLocatario::class .':alterar');

    });    
    

               //ROTAS DE TESTE PARA LOJA
            $app->group('/Loja', function (Group $group) {

                $group->get('/teste',ControllerPedido::class . ':Ver_Pedido_Locatario');
                $group->post('/checkout',ControllerPedido::class . ':montandoPedido');
                #$group->post('/pedidoFinal',ControllerPedido::class . ':gerandoPedido');
                $group->post('/pedidoFinal', ControllerPedido::class .':gerandoPedido');
       });

    //Locatario
    // $app->group('/Locatario', function(Group $group){

    //     $group->get('/',);
    // });
};
