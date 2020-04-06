<?php


//namespace App\Application\Models;

use App\Application\Models\Categoria;
require_once (__DIR__."/../Models/Categoria.classe.php");
require_once (__DIR__."/../Models/Connection.Classe.php");
use App\Application\Models\ConnectionFactory as Connection;


class CategoriaDAO extends \PDO {

//put your code here
    
    //private $conn; 

            function __construct() {
                 //   $conn = $conn; 
            }

    public function verCategoria() {
        $conn= new \mysqli('db4free.net', 'usercaneta123','123456as','bancoteste123');
        $listCategotia = array();
        $sql = 'SELECT * from Categoria;';
        //recebendo os dados da query
        $resultado =  $conn->query($sql);
        if ($resultado->num_rows > 0) {


            while ($row = $resultado->fetch_assoc()) {
                $cat = new \Categoria();
                $cat->setIdCategoria($row["codcategoria"]);
                $cat->setNomeCategoria($row["nomeCategoria"]);
                $listCategoria[] = $cat;
            }
            return $listCategoria;
        } else {
            return "0 results";
        }

        $conn->close();
    }

    public function adicionarCategoria(\Categoria $cat) {

        $nomeCategoria = $cat->getNomeCategoria();

        //Preparando um comando sql para parametrização                         
        $stmt = $conn->prepare("INSERT INTO Categoria(nomeCategoria) Values(?);");
        //Passando os parametros e seus tipos (s = String, d = Double , i = Int)
        $stmt->bind_param('s', $nomeCategoria);
        // Executando o comando parametrizado
        if ($stmt->execute() === TRUE) {
            return "DEU CERTO";
        } else {
            return "ERRO";
        }

        $stmt->close();
    }

    public function alterarCategoria(\Categoria $cat) {
        $sql = "UPDATE Categoria SET nomeCategoria = ". $cat->getNomeCategoria() . " WHERE codcategoria = ". $cat->getIdCategoria() .";";
        $stmt = $conn->query($sql);
        //$stmt->bind_param('si', $cat->getNomeCategoria(), $cat->getIdCategoria()); 
        //$stmt->execute();
        
    }

    public function excluirCategoria(\Categoria $cat) {
        $sql = "DELETE FROM Categoria WHERE codcategoria = ". $cat->getIdCategoria() .";";
        $stmt = $conn->query($sql);
    }

     public function buscarCategoriaPorId(int $id) {


        $sql = "SELECT * FROM Categoria WHERE codcategoria = ". $id .";";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {


            while ($row = $resultado->fetch_assoc()) {
                $Categoria = new \Categoria();
                $Categoria->setIdCategoria((int)$row["codcategoria"]);
                $Categoria->setNomeCategoria((string)$row["nomeCategoria"]);
            }

            return $Categoria;
        }else{
            return false;
        }

       
    }


}