<?php

declare(strict_types=1);
namespace App\Application\Actions\User;



use Slim\Views\PhpRenderer;
use App\Application\Models\ProdutoDAO;
use App\Application\Models\Produto;
use App\Application\Models\CategoriaDAO;
use App\Application\Models\Categoria;
//use App\Application\Models\ConnectionFactory;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once  (__DIR__."/../../DAO/ProdutoDAO.php");
require_once (__DIR__."/../../Models/Produto.classe.php");
require_once  (__DIR__."/../../DAO/CategoriaDAO.php");
require_once (__DIR__."/../../Models/Categoria.classe.php");


class ControllerProduto{
 
    public function listar(Request $request, Response $response, $args) {
         
       $conn = \ConnectionFactory::Connect();
       
      // $CatDAO = new CategoriaDAO();
       
      // $ListCat = $CatDAO->verCategoria();

       $ProdutoDAO = new ProdutoDAO($conn);
       
       $ListProduto = $ProdutoDAO->verProduto();

       $args = ["ListaProduto" => $ListProduto];
        

        $renderer = new PhpRenderer(__DIR__."/../../Views/loja/");

        return $renderer->render($response, "shop.php", $args);
    }

    public function cadastrarProduto(Request $request, Response $response, $args) {
         
        $conn = ConnectionFactory::Connect();
        
        $CatDAO = new CategoriaDAO($conn);
        
        $ListCat = $CatDAO->verCategoria();

        $args = [
                   "ListaCategoria"=> $ListCat
         ];
         
 
         $renderer = new PhpRenderer(__DIR__."/../../Views/adminDashboard/");
 
         return $renderer->render($response, "edit.php", $args);
     }
 

   public function adicionar(Request $request, Response $response, $args) {
        
        $conn = ConnectionFactory::Connect();
        
        $ProdutoNovo = new \Produto();

        $ProdutoNovo->setNome($_POST['txtNome']);
        $ProdutoNovo->setModelo($_POST['txtModelo']);
        $ProdutoNovo->setValDiaria((double)$_POST['txtValDiaria']);
        $ProdutoNovo->setDimensao($_POST['txtDimensao']);
        $ProdutoNovo->setQuantidade((int)$_POST['txtQuantidade']);
        $ProdutoNovo->setPrecoPerda((double)$_POST['txtPrecoPerda']);

        $CatDAO = new CategoriaDAO($conn);

        $CategoriaProdutoNovo = $CatDAO->buscarCategoriaPorId((int)$_POST['id_categoria']);

        $ProdutoNovo->setCategoria($CategoriaProdutoNovo);
        
        $ProdutoDAO = new ProdutoDAO($conn);

        $ProdutoDAO->adicionarProduto($ProdutoNovo);

         return $this->listar($request, $response, $args);
     } 

     public function verEdicaoProduto(Request $request, Response $response, $args) {
        
        $conn = ConnectionFactory::Connect();
       
        $CatDAO = new CategoriaDAO($conn);       
        $ListCat = $CatDAO->verCategoria();
        
       
        $route = $request->getAttribute('route');

        $IdProdutoEditar = $route->getArgument('id');

        $ProdutoEdit = new \Produto();
        
        $ProdutoEdit->setId((int)$IdProdutoEditar);
        $ProdutoDAO = new ProdutoDAO($conn);
        $ProdutoParaEditar = $ProdutoDAO->buscarProdutoPorId($ProdutoEdit);

        $args = [
            "ProdutoParaEditar"=> $ProdutoParaEditar,
            "ListaCategoria"=> $ListCat
          ];
  
          $renderer = new PhpRenderer(__DIR__."/../../Views/adminDashboard/");

          return $renderer->render($response, "edit.php", $args);
     } 

     public function excluir(Request $request, Response $response, $args) {
        $conn = ConnectionFactory::Connect();

        $route = $request->getAttribute('route');
        $IdProdutoDeletado = $route->getArgument('id');

        $ProdutoDeletado = new \Produto();
        $ProdutoDeletado->setId((int)$IdProdutoDeletado);
        
        $ProdutoDAO = new ProdutoDAO($conn);

         $ProdutoDAO->excluirProduto($ProdutoDeletado);

         return $this->listar($request, $response, $args);
     } 

     public function alterar(Request $request, Response $response, $args) {
        
        $conn = ConnectionFactory::Connect();
        
        $CatDAO = new CategoriaDAO($conn);
        $CategoriaProdutoEditado = $CatDAO->buscarCategoriaPorId((int)$_POST['id_categoria']);

        $ProdutoEditado = new \Produto();

        $ProdutoEditado->setNome($_POST['txtNome']);
        $ProdutoEditado->setId((int)$_POST['txtId']);
        $ProdutoEditado->setModelo($_POST['txtModelo']);
        $ProdutoEditado->setValDiaria((double)$_POST['txtValDiaria']);
        $ProdutoEditado->setDimensao($_POST['txtDimensao']);
        $ProdutoEditado->setQuantidade((int)$_POST['txtQuantidade']);
        $ProdutoEditado->setPrecoPerda((double)$_POST['txtPrecoPerda']);
        $ProdutoEditado->setCategoria($CategoriaProdutoEditado);

        $ProdutoDAO = new ProdutoDAO($conn);
        $ProdutoDAO->alterarProduto($ProdutoEditado);
        
      return $this->listar($request, $response, $args);
   } 

}
