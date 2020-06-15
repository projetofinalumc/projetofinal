<?php


namespace App\Application\Models;

use App\Application\Models\ConnectionFactory as Connection;
use App\Application\Models\Produto;
require_once (__DIR__."/../Models/Produto.classe.php");
require_once (__DIR__."/../Models/Connection.Classe.php"); // importando a Connection.Classe.php para fazer  a conexao com o banco de dados // importando a Produto.classe.php para poder cadastrar o obj no banco de dados

class ProdutoDAO {

    //put your code here

    function __construct($conn) {
        $this->conn = $conn;
}
    public function verProduto() {
        $listProd = array();
        $sql = "SELECT * from Produto ORDER BY idProduto DESC;"; 

        //recebendo os dados da query
        $resultado = $this->conn->query($sql);
       if ($resultado->num_rows > 0) {

            
            while ($row = $resultado->fetch_assoc()) {

                $prodt = new Produto();
                $prodt->setId($row["idProduto"]);
                $prodt->setNome($row["nome"]);
                $prodt->setModelo($row["modelo"]);
                $prodt->setValDiaria($row["valdiaria"]);
                $prodt->setDimensao($row["dimensao"]);
                $prodt->setQuantidade($row["quantidade"]);
                $prodt->setPrecoPerda($row["precoPerda"]);
                $prodt->setImgNome($row["imgNome"]);
                $listProd[] = $prodt;
            }
            return $listProd;
        } else {
            return "0 results";
        } 


       
    }
  public function verProdutoFiltrado($prodt){
     
      $sql = "SELECT * FROM Produto WHERE ";
        
      if($prodt->getNome() !== ""){
          $nome = $prodt->getNome();
          $sql = $sql." AND nome = '$nome'"; 
          //$sql = $sql." AND dataPedido = $dataPedido"; 
       }
     if($prodt->getModelo() !== ""){
          $modelo =  $prodt->getModelo();
          $sql = $sql." AND modelo = '$modelo'";
       }
      if($prodt->getValDiaria() !== (double)0){
           $valDiaria = $prodt->getValDiaria();
          $sql = $sql." AND valdiaria = $valDiaria"; 
      }
      if($prodt->getQuantidade() !== 0){
          $sql = $sql." AND quantidade = ".$prodt->getQuantidade(); 
      }
      if($prodt->getPrecoPerda() !== (double)0){
        $sql = $sql." AND precoPerda = ".$prodt->getPrecoPerda(); 
      } 

      if($prodt->getId() !== 0){
        $sql = $sql." AND idProduto = ".$prodt->getId(); 
      } 
       
        $partefinalSQL = substr($sql, 33);
        $sql = "SELECT * FROM Produto WHERE ";
        $sqlFinal = $sql.$partefinalSQL.";";

              //recebendo os dados da query
              $resultado = $this->conn->query($sqlFinal);
              try{
                      if ($resultado->num_rows > 0) {
              
                          
                          while ($row = $resultado->fetch_assoc()) {
              
                              $Produto = new Produto();
                              $Produto->setId($row["idProduto"]);
                              $Produto->setNome($row["nome"]);
                              $Produto->setModelo($row["modelo"]);
                              $Produto->setValDiaria($row["valdiaria"]);
                              $Produto->setDimensao($row["dimensao"]);
                              $Produto->setQuantidade($row["quantidade"]);
                              $Produto->setPrecoPerda($row["precoPerda"]);
                              $Produto->setImgNome($row["imgNome"]);
                              $listProd[] = $Produto;
                          }
                          return $listProd;
                      } else {
                          return "0 result";
                      } 

              }catch(Exception $e){
                  return $e;
              }
    }

    public function adicionarProduto($prodt) {
      //Preparando um comando sql para parametrização     
      $sql = "INSERT INTO Produto(nome,modelo,valDiaria,dimensao,quantidade,precoPerda,imgNome) Values(?,?,?,?,?,?,?);";                    
      $stmt = $this->conn->prepare($sql);
      //Passando os parametros e seus tipos (s = String, d = Double , i = Int)
      $nome = $prodt->getNome();
      $modelo = $prodt->getModelo();
      $valDiaria = $prodt->getValDiaria();
      $Dimensao = $prodt->getDimensao();
      $Quantidade = $prodt->getQuantidade();
      $PrecoPerda = $prodt->getPrecoPerda();
      $imgNome = $prodt->getImgNome();

       $stmt->bind_param('ssisids',$nome ,$modelo,$valDiaria,$Dimensao ,$Quantidade,$PrecoPerda,$imgNome);

      // $stmt->bindParam(1, $nome);
      // $stmt->bindParam(2, $modelo);
      // $stmt->bindParam(3, $valDiaria);
      // $stmt->bindParam(4, $Dimensao);
      // $stmt->bindParam(5, $Quantidade);
      // $stmt->bindParam(6, $PrecoPerda);

      // Executando o comando parametrizado
      $stmt->execute();
      // $insert_id = $stmt->insert_id();
      $stmt->close();
       // $conn = ConnectionFactory::Connect();
     //  $sql = "INSERT INTO Produto(nome,modelo,valdiaria,dimensao,quantidade,precoPerda,categoria) Values(".$prodt->getNome().",".$prodt->getModelo().",".$prodt->getValDiaria().",".$prodt->getQuantidade().",".$prodt->getPrecoPerda().",".$prodt->getCategoria()->getIdCategoria().";";
   //    $conn->query($sql);
 
    }

    public function alterarProduto($prodt) {
      $nome = $prodt->getNome();
      $modelo = $prodt->getModelo();
      $valDiaria = $prodt->getValDiaria();
      $dimensao = $prodt->getDimensao();
      $quantidade = $prodt->getQuantidade();
      $precoPerda = $prodt->getPrecoPerda();
      $id = $prodt->getId();
      $imgNome = $prodt->getImgNome();

      //  $conn = ConnectionFactory::Connect();
      $sql = "UPDATE Produto SET nome = '$nome', modelo = '$modelo', valdiaria = $valDiaria, dimensao = '$dimensao', quantidade = $quantidade, precoPerda = $precoPerda, imgNome = '$imgNome' WHERE idProduto = $id;";
      //$sql = "UPDATE Produto SET nome = ".$prodt->getNome()." , modelo = ".$prodt->getModelo()." , valdiaria = ".$prodt->getValDiaria().", dimensao = ".$prodt->getDimensao().", quantidade = ".$prodt->getQuantidade().", precoPerda = ".$prodt->getPrecoPerda()." WHERE idProduto = ".$prodt->getId();
       $this->conn->query($sql);
        //$stmt->bind_param('ssisidii', $prodt->getNome(), $prodt->getModelo(), $prodt->getValDiaria(), $prodt->getDimensao(), $prodt->getQuantidade(),$prodt->getPrecoPerda(),$prodt->getCategoria()->getIdCategoria(),$prodt->getId());
        //$stmt->execute();
        //$stmt->close();
    }


    public function retirarProdutoEstoque($listItemPedido) {
        
        $sql = "select idProduto,quantidade from Produto WHERE ";

        foreach($listItemPedido as $item){

            $sql = $sql."idProduto = ".$item->getIdProduto()." OR "; 
        }

        $sql = substr($sql,0,-3);

        $sql = $sql.";";
        


         $resultado = $this->conn->query($sql);

         $index = 0;
      if ($resultado->num_rows > 0) {
       
        
          
        while ($row = $resultado->fetch_assoc()) {
                $item = $listItemPedido[$index];
                $prodt = new Produto();
                $quantidadePedido = $item->getQuantidade();
                $quantidadeEstoque = $row["quantidade"];
                $estoqueAtualizado = $quantidadeEstoque  - $quantidadePedido;
                $prodt->setId($row["idProduto"]);
                $prodt->setQuantidade($estoqueAtualizado);
                $listProd[] = $prodt;
                $index = $index + 1;
            
        }

    }else{
        return false;
    }

      foreach($listProd as $prodt){
        $quantidadeNova = $prodt->getQuantidade();
        $idProduto= $prodt->getId();
        $sql = "UPDATE Produto SET quantidade = $quantidadeNova WHERE idProduto = $idProduto";
        $this->conn->query($sql);
      }
       
}

public function adicionarProdutoEstoque($listItemPedido) {
        
    $sql = "select idProduto,quantidade from Produto WHERE ";

    foreach($listItemPedido as $item){

        $sql = $sql."idProduto = ".$item->getIdProduto()." OR "; 
    }

    $sql = substr($sql,0,-3);

    $sql = $sql.";";
    


     $resultado = $this->conn->query($sql);

     $index = 0;
  if ($resultado->num_rows > 0) {
   
    
      
    while ($row = $resultado->fetch_assoc()) {
            $item = $listItemPedido[$index];
            $prodt = new Produto();
            $quantidadePedido = $item->getQuantidade();
            $quantidadeEstoque = $row["quantidade"];
            $estoqueAtualizado = $quantidadeEstoque  + $quantidadePedido;
            $prodt->setId($row["idProduto"]);
            $prodt->setQuantidade($estoqueAtualizado);
            $listProd[] = $prodt;
            $index = $index + 1;
        
    }

}else{
    return false;
}

  foreach($listProd as $prodt){
    $quantidadeNova = $prodt->getQuantidade();
    $idProduto= $prodt->getId();
    $sql = "UPDATE Produto SET quantidade = $quantidadeNova WHERE idProduto = $idProduto";
    $this->conn->query($sql);
  }
   
}



    public function buscarProdutosCarrinho($produto) {
      
      $primeiroValor = array_shift($produto);
      $obj = json_decode($primeiroValor);  
      $sql = "SELECT * FROM Produto WHERE idProduto = ".$obj->Produtoid;

      foreach($produto as $valor){
        
          $obj = json_decode($valor);  
        
          $sql = $sql." OR idProduto = ".$obj->Produtoid." ";
      
      
      }
      
      $sql = $sql.";";

      $resultado = $this->conn->query($sql);


      if ($resultado->num_rows > 0) {


        while ($row = $resultado->fetch_assoc()) {
                $prodt = new Produto();
                $prodt->setId($row["idProduto"]);
                $prodt->setNome($row["nome"]);
                $prodt->setModelo($row["modelo"]);
                $prodt->setValDiaria($row["valdiaria"]);
                $prodt->setDimensao($row["dimensao"]);
                $prodt->setQuantidade($row["quantidade"]);
                $prodt->setPrecoPerda($row["precoPerda"]);
                $prodt->setImgNome($row["imgNome"]);
                $listProd[] = $prodt;
            
        }

        return $listProd;
    }else{
        return false;
    }

     
  }

  public function buscarProdutosDefeituosos($listaProdutosDefeituosos) {
      
    $sql = "";

    
      
    foreach($listaProdutosDefeituosos as $ProdutosDefeituoso){
      
       
      $sql = $sql."OR idProduto = ".$ProdutosDefeituoso->getIdProduto()." ";
    
    
    }


    $sqlInicial = "SELECT * FROM Produto WHERE";
    $sqlFinal = substr($sql,2);
    $sql = $sqlInicial.$sqlFinal.";";
  

    $resultado = $this->conn->query($sql);


    if ($resultado->num_rows > 0) {


      while ($row = $resultado->fetch_assoc()) {
              $prodt = new Produto();
              $prodt->setId($row["idProduto"]);
              $prodt->setNome($row["nome"]);
              $prodt->setModelo($row["modelo"]);
              $prodt->setValDiaria($row["valdiaria"]);
              $prodt->setDimensao($row["dimensao"]);
              $prodt->setQuantidade($row["quantidade"]);
              $prodt->setPrecoPerda($row["precoPerda"]);
              $prodt->setImgNome($row["imgNome"]);
              $listProd[] = $prodt;
          
      }

      return $listProd;
  }else{
      return false;
  }

   
}

    public function buscarProdutoPorId(\Produto $prodtEdit) {


        $sql = "SELECT * FROM Produto WHERE id = ". $prodtEdit->getId() .";";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {


            while ($row = $resultado->fetch_assoc()) {
                    $NovaCategoria = new CategoriaDAO($conn);
                    $prodt = new \Produto();
                    $prodt->setId($row["id"]);
                    $prodt->setNome($row["nome"]);
                    $prodt->setModelo($row["modelo"]);
                    $prodt->setValDiaria($row["valdiaria"]);
                    $prodt->setDimensao($row["dimensao"]);
                    $prodt->setQuantidade($row["quantidade"]);
                    $prodt->setPrecoPerda($row["precoPerda"]);
                    $prodt->setCategoria($NovaCategoria->buscarCategoriaPorId($row["categoria"]));
                
                
            }

            return $prodt;
        }else{
            return false;
        }
        

       
    }

    public function buscarProdutoPor30(int $id) {


      $sql = "SELECT COUNT(*) FROM Produto ;".
      $resultado = $conn->query($sql);

          return $resutado;

     
  }
  public function quantidadeDeProdutos() {


    $sql = "SELECT COUNT(*) FROM Produto ;".
    $resultado = $conn->query($sql);

        return (int)$resutado;
   
}

    public function excluirProduto($prodt) {
      //  $conn = ConnectionFactory::Connect();
        $sql = "DELETE FROM Produto WHERE idProduto = ".$prodt->getId().";";
        $stmt = $this->conn->query($sql);

    }

}
