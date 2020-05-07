<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\User\ControllerTest;
use App\Application\Actions\User\ControllerLocatario;
use App\Application\Actions\User\ControllerCarrinho;
use App\Application\Actions\User\ControllerProduto;
use App\Application\Actions\User\ControllerAdmin;
use App\Application\Actions\User\ControllerSession;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {


    //Carrinho
    $app->group('', function (Group $group) {

        $group->post('/AdicionarCarrinho', ControllerCarrinho::class .':adicionarProduto');
        //$group->get('/AdicionarCarrinho', ControllerCarrinho::class .':adicionarProduto');
        $group->get('/retirarCarrinho', ControllerCarrinho::class .':retirarProduto');
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
        $group->get('/Sobre', function($request, $response, $args){
            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/loja');

            return $renderer->render($response, "about.php");
        });
        $group->get('/listaproduto', function($request, $response, $args){
            foreach($args['ListaProdutos'] as $produto){
                echo $produto->getNome();
            }
            

        });
        
        

        $group->get('/AdicionarCarrinho', function($request, $response, $args){
            ControllerCarrinho::adicionarProduto($request, $response,$args);
           return ControllerProduto::listar($request, $response,$args);
        });

        
        $group->get('/Home/Endereco/{id}', ControllerLocatario::class .':buscarEndereco' );
        $group->get('/produtos', ControllerProduto::class .':listar');
        $group->post('/Home', ControllerLocatario::class .':login');
        $group->post('/CadastraEnd', ControllerLocatario::class .':cadastrarNovoEndereco');
        $group->post('/EditarEnd', ControllerLocatario::class .':editarEndereco');
        $group->post('/Editar', ControllerLocatario::class .':alterar');
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

    //Admin
    $app->group('/Admin', function (Group $group) {

        
        $group->get('/Entrar' ,function ($request, $response, $args){
            $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/adminDashboard/');
            
            return $renderer->render($response, "login.php", $args);
        });
        $group->post('/Home', ControllerAdmin::class .':login');
        $group->post('/Sair' , ControllerAdmin::class . 'logout');
       
    });
   
   
   
    //Testes 

    $app->group('/Teste', function (Group $group) {

        $group->get('/produto', ControllerProduto::class .':listar');
        $group->post('/categoria', ControllerTest::class .':adicionar');
        $group->post('/excluir', ControllerTest::class .':excluir');
        $group->post('/alterar', ControllerTest::class .':alterar');
        $group->get('/Home', ControllerSession::class .':login');
       

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
       

    });    
    //Locatario
    // $app->group('/Locatario', function(Group $group){

    //     $group->get('/',);
    // });
};
