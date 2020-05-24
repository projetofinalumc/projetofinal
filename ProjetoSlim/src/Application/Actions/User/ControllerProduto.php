<?php

declare(strict_types=1);
namespace App\Application\Actions\User;



use Slim\Views\PhpRenderer;
use App\Application\Models\ProdutoDAO;
use App\Application\Models\Produto;
use App\Application\Models\CategoriaDAO;
use App\Application\Models\Categoria;
use App\Application\Models\ConnectionFactory;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once  (__DIR__."/../../DAO/ProdutoDAO.php");
require_once (__DIR__."/../../Models/Produto.classe.php");
require_once  (__DIR__."/../../DAO/CategoriaDAO.php");
require_once (__DIR__."/../../Models/Categoria.classe.php");


class ControllerProduto{
 
    static function listar(Request $request, Response $response, $args) {
         
       $conn = ConnectionFactory::Connect();

       $ProdutoDAO = new ProdutoDAO($conn);
       
       $ListProduto = $ProdutoDAO->verProduto();

       $args = ["ListaProduto" => $ListProduto];
        

        $renderer = new PhpRenderer(__DIR__."/../../Views/loja/");

        return $renderer->render($response, "shop.php", $args);

    }

    static function listarprodutoAdmin(Request $request, Response $response, $args) {
         
        $conn = ConnectionFactory::Connect();
 
        $ProdutoDAO = new ProdutoDAO($conn);
        
        $ListProduto = $ProdutoDAO->verProduto();
 
        $args = ["ListaProduto" => $ListProduto];
         
 
         $renderer = new PhpRenderer(__DIR__."/../../Views/adminDashboard/");
 
         return $renderer->render($response, "novoproduto.php", $args);
 
     }


     static function listarProdutoAdminFiltrado(Request $request, Response $response, $args) {
         
      $conn = ConnectionFactory::Connect();

      $ProdutoFiltrado = new Produto();

      
      if(isset($_POST['txtNome'])){$ProdutoFiltrado->setNome($_POST['txtNome']);}//else{$ProdutoFiltrado->setdataRetirada(NULL);}
      if(isset($_POST['txtModelo'])){$ProdutoFiltrado->setModelo($_POST['txtModelo']);}//else{$ProdutoFiltrado->setdataPedido(NULL);}
      if(isset($_POST['txtValdiaria'])){$ProdutoFiltrado->setValDiaria((double)$_POST['txtValdiaria']);}//else{$ProdutoFiltrado->setdataDevolucao(NULL);}
      if(isset($_POST["idProduto"])){$ProdutoFiltrado->setId((int)$_POST['idProduto']);}
      if(isset($_POST["txtPrecoPerda"])){$ProdutoFiltrado->setPrecoPerda((double)$_POST['txtPrecoPerda']);}
      if(isset($_POST["txtQuantidade"])){$ProdutoFiltrado->setQuantidade((int)$_POST['txtQuantidade']);}

      $ProdutoDAO = new ProdutoDAO($conn);
      
      $ListProduto = $ProdutoDAO->verProdutoFiltrado($ProdutoFiltrado);

      $args = ["ListaProduto" => $ListProduto];
       

       $renderer = new PhpRenderer(__DIR__."/../../Views/adminDashboard/");

       return $renderer->render($response, "novoproduto.php", $args);

   }
 

   //  public function cadastrarProduto(Request $request, Response $response, $args) {
         
   //      $conn = ConnectionFactory::Connect();
        
   //      $CatDAO = new CategoriaDAO($conn);
        
   //      $ListCat = $CatDAO->verCategoria();

   //      $args = [
   //                 "ListaCategoria"=> $ListCat
   //       ];
         
 
   //       $renderer = new PhpRenderer(__DIR__."/../../Views/adminDashboard/");
 
   //       return $renderer->render($response, "edit.php", $args);
   //   }
 

   public function adicionar(Request $request, Response $response, $args) {
        
      ///    $renderer = new PhpRenderer(__DIR__."/../../Views/adminDashboard/");

      //     return $renderer->render($response, "testecrud.php", $args);
      //     return $this->listar($request, $response, $args);

      $conn = ConnectionFactory::Connect();

      $ProdutoNovo = new Produto();

          $ProdutoNovo->setNome($_POST['txtNome']);
          $ProdutoNovo->setModelo($_POST['txtModelo']);
          $ProdutoNovo->setValDiaria((float)$_POST['txtValDiaria']);
          $ProdutoNovo->setDimensao($_POST['txtDimensao']);
          $ProdutoNovo->setQuantidade((Int)$_POST['txtQuantidade']);
          $ProdutoNovo->setPrecoPerda((float)$_POST['txtPrecoPerda']);

            $temp = explode(".", $_FILES["img"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES["img"]["tmp_name"], "images/produtos_cad/" . $newfilename);

            $ProdutoNovo->setImgNome($newfilename);


         $ProdutoDAO = new ProdutoDAO($conn);
         $ProdutoDAO->adicionarProduto($ProdutoNovo);
        
        //return $this->listarprodutoAdmin($request, $response, $args);
        //$renderer = new PhpRenderer(__DIR__."/../../Views/adminDashboard/");
        return $this->listarprodutoAdmin($request, $response, $args);
        // return $renderer->render($response, "ListaProduto.php", $args);
       // return $renderer->render($response, "teste.php", $args);
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

          $IdProdutoDeletado = $_GET['idExcluir'];
          $ProdutoDeletado = new Produto();
          $ProdutoDeletado->setId((int)$IdProdutoDeletado);
        
          $ProdutoDAO = new ProdutoDAO($conn);

         $ProdutoDAO->excluirProduto($ProdutoDeletado);
       
          return $this->listarprodutoAdmin($request, $response, $args);
     } 

     public function alterar(Request $request, Response $response, $args) {
        
        $conn = ConnectionFactory::Connect();
        
        //$CatDAO = new CategoriaDAO($conn);
        //$CategoriaProdutoEditado = $CatDAO->buscarCategoriaPorId((int)$_POST['id_categoria']);

        $ProdutoEditado = new Produto();
        $imgNome = $_FILES["img"]["name"];

        $ProdutoEditado->setNome($_POST['txtNome']);
        $ProdutoEditado->setId((int)$_POST['txtId']);
        $ProdutoEditado->setModelo($_POST['txtModelo']);
        $ProdutoEditado->setValDiaria((double)$_POST['txtValDiaria']);
        $ProdutoEditado->setDimensao($_POST['txtDimensao']);
        $ProdutoEditado->setQuantidade((int)$_POST['txtQuantidade']);
        $ProdutoEditado->setPrecoPerda((double)$_POST['txtPrecoPerda']);
        $ProdutoEditado->setImgNome($imgNome);
        //$ProdutoEditado->setCategoria($CategoriaProdutoEditado);

        $ProdutoDAO = new ProdutoDAO($conn);
        $ProdutoDAO->alterarProduto($ProdutoEditado);
        
      return $this->listarprodutoAdmin($request, $response, $args);
   } 

}
