<?php
namespace App\Application\Models;


use App\Application\Models\ConnectionFactory as Connection;
use App\Application\Models\Locatario;
require_once (__DIR__."/../Models/Locatario.classe.php");
require_once (__DIR__."/../Models/Connection.Classe.php");





class LocatarioDAO {
    

            function __construct(\mysqli $conn) {
                    $this->conn = $conn; 
            }

     public function buscarLocatario (){
        
        $listLocatario = array();
        $sql = 'SELECT * from Locatario;';
        $conn = ConnectionFactory::Connect();
        //recebendo os dados da query 
        $resultado = $conn->query($sql);
        if ($resultado->num_rows > 0){
            
            //lcdr = LOCATARIO
            while ($row = $resultado->fetch_assoc()){

            }
        }
    }

    public function buscarLocatarioPorCpf($locatario){
        
       // $conexao = new \mysqli('db4free.net', 'usercaneta123','123456as','bancoteste123');

        $cpf = $locatario->getCPF();
        $stmt = $this->conn->prepare("SELECT * FROM Locatario WHERE cpf = ?;");
      
        $stmt->bind_param('i', $cpf );
       
        if ($stmt->execute()){
                /* store first result set */
               $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {                       
                        $novo_locatario = new Locatario();

                        $novo_locatario->setId($row["id"]);
                        $novo_locatario->setCPF($row["cpf"]);
                        $novo_locatario->setNome((string)$row["Nome"]);
                        $novo_locatario->setEmail((string)$row["email"]);
                
                }
          
          return $novo_locatario;
        }
        return false;
    }

    public function buscarLocatarioPorID($locatario){
        
        $conexao = new \mysqli('db4free.net', 'usercaneta123','123456as','bancoteste123');

        $id = $locatario->getId();
        $stmt = $conexao->prepare("SELECT * FROM Locatario WHERE id = ?;");
        
      
        $stmt->bind_param('i', $id );
       
        if ($stmt->execute()){
                /* store first result set */
               $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {                       
                        $novo_locatario = new Locatario();

                        $novo_locatario->setId($row["id"]);
                        $novo_locatario->setCPF($row["cpf"]);
                        $novo_locatario->setNome((string)$row["Nome"]);
                        $novo_locatario->setEmail((string)$row["email"]);
                
                }
          
          return $novo_locatario;
        }
        return false;
    }

    public function buscarLocatarioPorEmail($locatario){
        
        //$conexao = new \mysqli('localhost', 'root','','bancoteste123');

        $email = $locatario->getEmail();
        $senha = $locatario->getSenha();

        $stmt = $this->conn->prepare("SELECT * FROM Locatario WHERE email = ? AND senhaloc = ?;");
      
        $stmt->bind_param('ss', $email, $senha );
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0){
                /* store first result set */
                $novo_locatario = new Locatario();
              
                while ($row = $result->fetch_assoc()) {                       
                        

                        $novo_locatario->setId($row["id"]);
                        $novo_locatario->setCPF($row["cpf"]);
                        $novo_locatario->setNome((string)$row["Nome"]);
                        $novo_locatario->setEmail((string)$row["email"]);
                
                }
          
          return $novo_locatario;
        }
        return NULL;
    }
    
    public function cadastrarLocatario ($locatario){
        
        //$conexao = new \mysqli('db4free.net', 'usercaneta123','123456as','bancoteste123');

        $cpf = $locatario->getCpf();
        $nome = $locatario->getNome();
        $email = $locatario->getEmail();
        $senha = $locatario->getSenha();

        

        //Preparando um comando sql para parametrização
        $stmt =  $this->conn->prepare("INSERT INTO `Locatario` (`cpf`, `Nome`, `email`,`senhaloc`) VALUES (?,?,?,?);");
        //Passando os parametros e seus tipos (s = String, d = double, i = Int )
        $stmt->bind_param('isss', $cpf,$nome,$email,$senha);
        //Executando o comando parametrizado
        $stmt->execute();        
        $stmt->close();
    }
    
    public function alterarLocatario(\Locatario $locatario){

        $conexao = new \mysqli('db4free.net', 'usercaneta123','123456as','bancoteste123');

        $id = $locatario->getId();
        $cpf = $locatario->getCpf();
        $nome = $locatario->getNome();
        $email = $locatario->getEmail();
        $senha = $locatario->getSenha();
        
        $sql = "UPDATE Locatario SET cpf = ? , Nome = ?, email = ?, senhaloc = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param('isssi', $cpf,$nome,$email,$senha,$id);
        $stmt->execute();
        $stmt->close();             
    }
    
    public function alterarEnderecoLocatario(\Locatario $locatario){

        $conexao = new \mysqli('db4free.net', 'usercaneta123','123456as','bancoteste123');

        $id = $locatario->getId();
        $cpf = $locatario->getCpf();
        $nome = $locatario->getNome();
        $email = $locatario->getEmail();
        $senha = $locatario->getSenha();
        
        $sql = "UPDATE Locatario SET cpf = ? , Nome = ?, email = ?, senhaloc = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param('isssi', $cpf,$nome,$email,$senha,$id);
        $stmt->execute();
        $stmt->close();             
    }
    public function excluirLocatario (Locatario $locatario){
        $conn = ConnectionFactory::Connect();
        $sql = "DELETE FROM Locatario WHERE cpf=?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $locatario->getId());
        $stmt->execute();
        $stmt->close();
        
    }
}
