<?php

declare(strict_types=1);
namespace App\Application\Actions\User;



use Slim\Views\PhpRenderer;
use App\Application\Models\AdminDAO;
use App\Application\Models\Admin;
use App\Application\Models\ConnectionFactory;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once  (__DIR__."/../../DAO/AdminDAO.php");
require_once (__DIR__."/../../Models/Admin.classe.php");
require_once (__DIR__."/../../Models/Connection.Classe.php");




class ControllerAdmin{
 
    public function entrar (Request $request, Response $response, $args) {
         
      

        $renderer = new PhpRenderer(__DIR__."/../../Views/adminDashboard/");

        return $renderer->render($response, "login.php", $args);
    }

   public function login (Request $request, Response $response, $args) {

        

        $conn = ConnectionFactory::Connect();
        
        $admin = new \Admin(); 

        $admin->setLogin((String)$_POST['user']);
        $admin->setSenha((String)$_POST['senha']);

        $AdminDAO = new AdminDAO($conn);
        
        $login = $AdminDAO->fazerLogin($admin); 
        
        $renderer = new PhpRenderer(__DIR__."/../../Views/adminDashboard/");

        session_start();

        if ($login != false){

            
            $_SESSION['msgSucesso'] = "<div class='alert alert-sucess'>Login realizado com sucesso!</div>";
            
           
            return $renderer->render($response, "index.php", $args);
            
        } else {
           
            //$_SESSION['msg'] = "Login e/ou Senha incorretos!";
     
            $_SESSION['msgErro'] = "<div class='alert alert-danger'>Login e/ou senha inválidos</div>";
            return $renderer->render($response, "login.php", $args); 
           
                
        }     
   }

   public function logout (Request $request, Response $response, $args) {
    
        if (isset($_GET['sair']) == 'logout'){

            echo "Logout realizado com sucesso.";
            session_start();
            session_destroy();

            return $renderer->render($response, "login.php", $args);
        }
    }

}
