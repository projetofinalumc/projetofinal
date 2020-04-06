<?php

declare(strict_types=1);
namespace App\Application\Actions\User;



use Slim\Views\PhpRenderer;
use App\Application\Models\CategoriaDAO;
use App\Application\Models\Categoria;
use App\Application\Models\ConnectionFactory;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once  (__DIR__."/../../DAO/CategoriaDAO.php");
require_once (__DIR__."/../../Models/Connection.Classe.php");




class ControllerTest{
 
    public function listar(Request $request, Response $response, $args) {
      

        $renderer = new PhpRenderer(__DIR__."/../../Views/locatarioDashboard/");

        return $renderer->render($response, "login.php", $args);
    }

   public function adicionar(Request $request, Response $response, $args) {
       
    
    
    $mysqli = new \mysqli('db4free.net', 'usercaneta123','123456as','bancoteste123');
        
    if ($mysqli -> connect_errno) {
        $resposta = "Failed to connect to MySQL: " . $mysqli -> connect_error;
        
     }else{

       $resposta = 'foi moleque';
     }

    

       $args = ['resposta' => $resposta];
         return $this->listar($request, $response, $args);
     } 


     public function excluir(Request $request, Response $response, $args) {
        $conn = ConnectionFactory::Connect();
       
        $categoriaExcluida = new \Categoria();

        $categoriaExcluida->setIdCategoria((int)$_POST['codDelete']);

        $CatDAO = new CategoriaDAO($conn);
        $CatDAO->excluirCategoria($categoriaExcluida);
        
         return $this->listar($request, $response, $args);
     } 

     public function alterar(Request $request, Response $response, $args) {
      $conn = ConnectionFactory::Connect();
     
      $categoriaAlterada = new \Categoria();

      $categoriaAlterada->setIdCategoria((int)$_POST['txtCod']);
      $categoriaAlterada->setNomeCategoria($_POST['txtNome']);

      $CatDAO = new CategoriaDAO($conn);
      $CatDAO->alterarCategoria($categoriaAlterada);
      
      return $this->listar($request, $response, $args);
   } 

}
