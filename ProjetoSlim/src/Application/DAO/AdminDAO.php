<?php


namespace App\Application\Models;

use App\Application\Models\Admin;
require_once (__DIR__."/../Models/Admin.classe.php");
require_once (__DIR__."/../Models/Connection.Classe.php");
use App\Application\Models\ConnectionFactory as Connection;


class AdminDAO {

//put your code here
    
    private $conn; 

            function __construct(\mysqli $conn) {
                    $this->conn = $conn; 
            }

    public function fazerLogin(\Admin $admin) {

        $sql = "SELECT * FROM admin WHERE login = ? AND senha = ?;";
        //recebendo os dados da query
        $stmt =  $this->conn->prepare($sql);

        $admin_login = $admin->getLogin();
        $admin_senha = $admin->getSenha();

        $stmt->bind_param('ss', $admin_login,$admin_senha);
        $stmt->execute();
        
        $resultado = $stmt->get_result();

       if ($resultado->num_rows > 0) {


            while ($row = $resultado->fetch_assoc()) {

            
                $adm = new \Admin();
                $adm->setLogin($row['login']);
                $adm->setSenha($row['senha']);
                $login = $adm;
                
                
            }

           
            
            return $login;
        } else {
            return false;
        }

        $this->conn->close();
    }
}