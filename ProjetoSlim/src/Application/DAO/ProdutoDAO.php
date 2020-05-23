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
        $sql = "SELECT * from Produto;"; 

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
                $listProd[] = $prodt;
            }
            return $listProd;
        } else {
            return "0 results";
        } 

      //  $conn->close();
       
    }

    public function adicionarProduto(Produto $prodt) {
      //Preparando um comando sql para parametrização     
      $sql = "INSERT INTO Produto(nome,modelo,valDiaria,dimensao,quantidade,precoPerda) Values(?,?,?,?,?,?);";                    
      $stmt = $this->conn->prepare($sql);
      //Passando os parametros e seus tipos (s = String, d = Double , i = Int)
      $nome = $prodt->getNome();
      $modelo = $prodt->getModelo();
      $valDiaria = $prodt->getValDiaria();
      $Dimensao = $prodt->getDimensao();
      $Quantidade = $prodt->getQuantidade();
      $PrecoPerda = $prodt->getPrecoPerda();

       $stmt->bind_param('ssisid',$nome ,$modelo,$valDiaria,$Dimensao ,$Quantidade,$PrecoPerda);

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

    public function alterarProduto(\Produto $prodt) {
      //  $conn = ConnectionFactory::Connect();
        $sql = "UPDATE Produto SET nome = ".$prodt->getNome()." , modelo = ".$prodt->getModelo()." , valdiaria = ".$prodt->getValDiaria().", dimensao = ".$prodt->getDimensao().", quantidade = ".$prodt->getQuantidade().", precoPerda = ".$prodt->getPrecoPerda().", categoria = ".$prodt->getCategoria()->getIdCategoria()." WHERE id = ".$prodt->getId().";";
        $conn->query($sql);
        //$stmt->bind_param('ssisidii', $prodt->getNome(), $prodt->getModelo(), $prodt->getValDiaria(), $prodt->getDimensao(), $prodt->getQuantidade(),$prodt->getPrecoPerda(),$prodt->getCategoria()->getIdCategoria(),$prodt->getId());
        //$stmt->execute();
        //$stmt->close();
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

    public function excluirProduto(\Produto $prodt) {
      //  $conn = ConnectionFactory::Connect();
        $sql = "DELETE FROM Produto WHERE id = ".$prodt->getId().";";
        $stmt = $conn->query($sql);

    }

}
