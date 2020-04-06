<?php

declare(strict_types=1);
namespace App\Application\Actions\User;



use Slim\Views\PhpRenderer;
use App\Application\Models\CategoriaDAO;
use App\Application\Models\Categoria;
use App\Application\Models\ProdutoDAO;
use App\Application\Models\Produto;
use App\Application\Models\ConnectionFactory;

use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once  (__DIR__."/../../DAO/CategoriaDAO.php");
require_once (__DIR__."/../../Models/Categoria.classe.php");
require_once  (__DIR__."/../../DAO/ProdutoDAO.php");
require_once (__DIR__."/../../Models/Produto.classe.php");




class ControllerVitrine{
 
    public function listar(Request $request, Response $response, $args) {
      
        
        $renderer = new PhpRenderer(__DIR__."/../../Views/loja/");

        return $renderer->render($response, "shop.php", $args);
    }

   public function verVitrine(Request $request, Response $response, $args) {
        
  
            $conn = ConnectionFactory::Connect();
            
            $CatDAO = new CategoriaDAO($conn);
            
            $ListCat = $CatDAO->verCategoria();

            $ProdutoDAO = new ProdutoDAO($conn);
            
            $ListProduto = $ProdutoDAO->verProduto();

            $adapter = new ArrayAdapter($ListProduto);
            $pagerfanta = new Pagerfanta($adapter);
            
            $pagerfanta->setMaxPerPage(30); 
        

            $args = ["ListaProduto" => $ListProduto,
                    "ListaCategoria"=> $ListCat,
                     "pagerfanta" => $pagerfanta
            ];

            $renderer = new PhpRenderer(__DIR__."/../../Views/loja/");

            return $renderer->render($response, "shop.php", $args);
     } 


     public function excluir(Request $request, Response $response, $args) {

        
         return $this->listar($request, $response, $args);
     } 

     public function alterar(Request $request, Response $response, $args) {

      
      return $this->listar($request, $response, $args);
   } 

}
