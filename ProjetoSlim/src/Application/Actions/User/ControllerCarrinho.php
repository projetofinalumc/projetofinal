<?php

declare(strict_types=1);
namespace App\Application\Actions\User;



use Slim\Views\PhpRenderer;
use App\Application\Models\LocatarioDAO;
use App\Application\Models\Locatario;
use App\Application\Models\Endereco as Endereco;
use App\Application\Models\ConnectionFactory;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once  (__DIR__."/../../DAO/LocatarioDAO.php");
//require_once (__DIR__."/../../Models/Locatario.classe.php");
require_once  (__DIR__."/../../DAO/EnderecoDAO.php");
require_once (__DIR__."/../../Models/Endereco.classe.php");



class ControllerCarrinho{
 
    public function adicionarProduto(Request $request, Response $response, $args) {
      
        session_start();
        
        $renderer = new PhpRenderer(__DIR__."/../../Views/locatarioDashboard/"); 

       if(!isset($_SESSION['Carrinho'])){
           $_SESSION['Carrinho'][] = '{"Produtoid":'.$_POST['Produto_id'].', "Quantidade":'.$_POST['Quantidade'].'}';
       }else{

        foreach($_SESSION['Carrinho'] as $key=>$produto){

          $obj  = json_decode($produto,false);

            if($obj->Produtoid == $_POST['Produto_id']){
                $obj->Quantidade = $_POST['Quantidade'];
                
                $_SESSION['Carrinho'][$key] = json_encode($obj);
                return $renderer->render($response, "teste.php", $args); 
            }
        }
       array_push($_SESSION['Carrinho'],'{"Produtoid":'.$_POST['Produto_id'].', "Quantidade":'.$_POST['Quantidade'].' }');
        
       }

       


       return $renderer->render($response, "teste.php", $args); 
       

    }

   public function retirarProduto(Request $request, Response $response, $args) {
        
        session_start();

        foreach($_SESSION['Carrinho'] as $key=>$produto){

            $obj  = json_decode($produto,false);
  
              if($obj->Produtoid == $_POST['Produto_id']){

                  unset($_SESSION['Carrinho'][$key]);
              }
          }
        
          $renderer = new PhpRenderer(__DIR__."/../../Views/locatarioDashboard/"); 

         return $renderer->render($response, "teste.php", $args); 
     } 
 
}
