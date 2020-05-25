<?php

namespace App\Application\Models;
use App\Application\Models\ConnectionFactory as Connection;
use App\Application\Models\Endereco as Endereco;


require_once (__DIR__.'/../Models/Connection.Classe.php');
require_once (__DIR__.'/../Models/Endereco.classe.php');

class EnderecoDAO {
    
    function __construct(\mysqli $conn) {
        $this->conn = $conn;
}

    public function cadastrarEndereco($endereco) {
        //$conexao = new \mysqli('db4free.net', 'usercaneta123','123456as','bancoteste123');
       

        $idLocatario = $endereco->getIdLocatario();   
        $Logradouro = $endereco->getLogradouro();
        $cep = $endereco->getCep();
        $estado = $endereco->getEstado();
        $numero = $endereco->getNumero();
        $bairro = $endereco->getBairro();
        $cidade = $endereco->getCidade();
        //Preparando um comando sql para parametrização           
        $sql = "INSERT INTO Endereco (id_locatario, logradouro, cep, estado, numero, Bairro,Cidade) VALUES ($idLocatario,'$Logradouro',$cep,'$estado',$numero,'$bairro','$cidade');";

        $stmt = $this->conn->query($sql);   


        //Passando os parametros e seus tipos (s = String, d = Double , i = Int)
        // $stmt->bind_param('isisis', $idLocatario,$Logradouro,$cep,$estado,$numero,$bairro,$cidade);
        
         // Executando o comando parametrizado
         //$stmt->execute();

         $this->conn->close();
    }

    public function buscarEnderecoPorId($endereco) {
        //$conexao = new \mysqli('db4free.net', 'usercaneta123','123456as','bancoteste123');
       
        //Preparando um comando sql para parametrização           
        $sql = "SELECT * FROM Endereco WHERE id_locatario = ?;";

        $stmt = $this->conn->prepare($sql);   

        $idLocatario = $endereco->getIdLocatario();   
    

        //Passando os parametros e seus tipos (s = String, d = Double , i = Int)
         $stmt->bind_param('i', $idLocatario);
        
         // Executando o comando parametrizad

         if ($stmt->execute()){
            /* store first result set */
           $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {      

                    $enderecoLocatario = new Endereco();
                    $enderecoLocatario->setIdLocatario((int)$row["id_locatario"]);
                    $enderecoLocatario->setLogradouro((string)$row["logradouro"]);
                    $enderecoLocatario->setId((int)$row["id_endereco"]);
                    $enderecoLocatario->setCep((int)$row["cep"]);
                    $enderecoLocatario->setNumero((int)$row["numero"]);
                    $enderecoLocatario->setEstado((string)$row["estado"]);
                    $enderecoLocatario->setBairro((string)$row["Bairro"]);
                    $enderecoLocatario->setCidade((string)$row["Cidade"]);
                    $listEnderecoLocatario[] = $enderecoLocatario;
            
            }
      
      return $listEnderecoLocatario;
    }

         $conexao->close();
    }

    public function buscarPorIdEndereco($endereco) {
        //$conexao = new \mysqli('db4free.net', 'usercaneta123','123456as','bancoteste123');
       
        //Preparando um comando sql para parametrização           
        $sql = "SELECT * FROM Endereco WHERE id_endereco = ?;";

        $stmt = $this->conn->prepare($sql);   

        $idEndereco = $endereco->getId();   
    

        //Passando os parametros e seus tipos (s = String, d = Double , i = Int)
         $stmt->bind_param('i', $idEndereco);
        
         // Executando o comando parametrizad

         if ($stmt->execute()){
            /* store first result set */
           $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {      

                    $enderecoLocatario = new Endereco();
                    $enderecoLocatario->setIdLocatario((int)$row["id_locatario"]);
                    $enderecoLocatario->setLogradouro((string)$row["logradouro"]);
                    $enderecoLocatario->setId((int)$row["id_endereco"]);
                    $enderecoLocatario->setCep((int)$row["cep"]);
                    $enderecoLocatario->setEstado((string)$row["estado"]);
                    $enderecoLocatario->setBairro((string)$row["Bairro"]);
                    $enderecoLocatario->setCidade((string)$row["Cidade"]);
                    $enderecoLocatario->setNumero((int)$row["numero"]);
                    $listEnderecoLocatario = $enderecoLocatario;
            
            }
      
      return $listEnderecoLocatario;
    }

         $conexao->close();
    }
    
      public function alterarEndereco(Endereco $endereco) {

       /// $conexao = new \mysqli('db4free.net', 'usercaneta123','123456as','bancoteste123');

        $sql = "UPDATE Endereco SET logradouro = ? ,cep = ? , estado = ? ,numero = ? , Bairro = ?, Cidade = ? WHERE id_endereco = ? AND id_locatario = ?";
        $stmt = $this->conn->prepare($sql);

        $logradouroEditado = $endereco->getLogradouro();
        $cepEditado = $endereco->getCep();
        $estadoEditado = $endereco->getEstado();

        $cidadeEditado = $endereco->getCidade();


        $numeroEditado = $endereco->getNumero();
        $idEditado = $endereco->getId();
        $idLocatarioEditado = $endereco->getIdLocatario();

        $bairroEditado = $endereco->getBairro();


        $stmt->bind_param('sisissii', $logradouroEditado,$cepEditado,$estadoEditado,$numeroEditado,$bairroEditado,$cidadeEditado,$idEditado,$idLocatarioEditado);
        $stmt->execute();
        $stmt->close();
    }
    
     public function excluirEndereco(Endereco $endereco) {
        $conn = ConnectionFactory::Connect();
        $sql = "DELETE FROM Endereco WHERE id=?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $lcdr->getId());
        $stmt->execute();
        $stmt->close();
    }
    
}
?>