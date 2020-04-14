
<?php

require_once ('../Models/Connection.Classe.php');
require_once ('../Models/Locador.classe.php');

class LocadorDAO {

    //put your code here

    public function LocadorDao() {
        
    }

    public function buscarLocador() {
        
        $listLocador = array();
        $sql = 'SELECT * from Locador;';       
        $conn = ConnectionFactory::Connect();
        //recebendo os dados da query
        $resultado = $conn->query($sql);
       if ($resultado->num_rows > 0) {

            //lcdr = LOCADOR
            while ($row = $resultado->fetch_assoc()) {
                $lcdr = new Locador();
                $lcdr->setId($row["id"]);
                $lcdr->setCnpj($row["cnpj"]);
                $listLocador[] = $lcdr;
            }
            return $listLocador;
        } else {
            return "0 results";
        } 

        $conn->close();
       
    }

    public function cadastrarLocador(Locador $lcdr) {
        
        $conn = ConnectionFactory::Connect();
        //Preparando um comando sql para parametrização                         
        $stmt = $conn->prepare("INSERT INTO Locador (cnpj) Values(?);");
        //Passando os parametros e seus tipos (s = String, d = Double , i = Int)
        $stmt->bind_param('i', $lcdr->getCnpj());
        // Executando o comando parametrizado
        if ($stmt->execute() === TRUE) {
            return "DEU CERTO";
        } else {
            return "ERRO";
        }
       
        $stmt->close();
    }
        
    public function alterarLocador(Locador $lcdr) {
        $conn = ConnectionFactory::Connect();
        $sql = "UPDATE Locador SET cnpj = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $lcdr->getCnpj());
        $stmt->execute();
        $stmt->close();
    }

    public function excluirProduto(Locador $lcdr) {
        $conn = ConnectionFactory::Connect();
        $sql = "DELETE FROM Locador WHERE id=?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $lcdr->getId());
        $stmt->execute();
        $stmt->close();
    }

}
