<?php

declare(strict_types=1);
namespace App\Application\Actions\User;



use Slim\Views\PhpRenderer;
use App\Application\Models\ProdutoDAO;
use App\Application\Models\Produto;
use App\Application\Models\Endereco as Endereco;
use App\Application\Models\ConnectionFactory;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once  (__DIR__."/../../DAO/ProdutoDAO.php");
//require_once (__DIR__."/../../Models/Locatario.classe.php");
require_once  (__DIR__."/../../DAO/EnderecoDAO.php");
require_once (__DIR__."/../../Models/Produto.classe.php");



class ControllerCarrinho{
 
    static function adicionarProduto(Request $request, Response $response, $args) {
      
        session_start();
        
        
        $renderer = new PhpRenderer(__DIR__."/../../Views/locatarioDashboard/"); 

       if(!isset($_SESSION['Carrinho'])){
           $_SESSION['Carrinho'][] = '{"Produtoid":'.$_GET['Produto_id'].', "Quantidade":'.$_GET['Quantidade'].'}';
       }else{

        foreach($_SESSION['Carrinho'] as $key=>$produto){

          $obj  = json_decode($produto,false);

            if($obj->Produtoid == $_GET['Produto_id']){
                $obj->Quantidade = $_GET['Quantidade'];
                
                $_SESSION['Carrinho'][$key] = json_encode($obj);
               // return $renderer->render($response, "teste2.php", $args); 
            }
        }
       array_push($_SESSION['Carrinho'],'{"Produtoid":'.$_GET['Produto_id'].', "Quantidade":'.$_GET['Quantidade'].' }');
        
       }
   

      $_SESSION['Total_Carrinho'] = count($_SESSION['Carrinho']);
      

       //return $renderer->render($response, "teste2.php", $args); 
       

    }

   public function retirarProduto(Request $request, Response $response, $args) {
        
        session_start();

        foreach($_SESSION['Carrinho'] as $key=>$produto){

            $obj  = json_decode($produto,false);
  
              if($obj->Produtoid == $_GET['Produto_id']){

                  unset($_SESSION['Carrinho'][$key]);
              }
          }
        
          $_SESSION['Total_Carrinho'] = count($_SESSION['Carrinho']);
          
          $renderer = new PhpRenderer(__DIR__."/../../Views/loja/"); 

         return $this->finalizarCarrinho($request,$response,$args);
     } 



     public function finalizarCarrinho(Request $request, Response $response, $args) {
        
        session_start();
         
        $conn = ConnectionFactory::Connect();

        $produtoDAO = new ProdutoDAO($conn);

        $produtos = $_SESSION['Carrinho'];

        $listProduto = $produtoDAO->buscarProdutosCarrinho($produtos);


        $args = ["ListaProdutos" => $listProduto];//passando todos os produtos da lista carrinho, que estão no carrinho
        
          $renderer = new PhpRenderer(__DIR__."/../../Views/loja/"); 

         return $renderer->render($response, "cart.php", $args); 
     } 
 
}
