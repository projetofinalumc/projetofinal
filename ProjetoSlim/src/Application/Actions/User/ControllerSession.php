<?php

declare(strict_types=1);

namespace App\Application\Actions\User;



use Slim\Views\PhpRenderer;
use App\Application\Models\LocatarioDAO;
use App\Application\Models\Locatario;
use App\Application\Models\Endereco as Endereco;
use App\Application\Models\ConnectionFactory;
use App\Application\User\ControllerLocatario;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once(__DIR__ . "/../../DAO/LocatarioDAO.php");
require_once(__DIR__."/../../Models/Locatario.classe.php");
require_once(__DIR__ . "/../../DAO/EnderecoDAO.php");
require_once(__DIR__ . "/../../Models/Endereco.classe.php");
//  require_once(__DIR__ . "/../../Models/ConnectionFactory");


class ControllerSession
{   
    public function entrar (Request $request, Response $response, $args) {
         
        

        $renderer = new PhpRenderer(__DIR__."/../../Views/locatarioDashboard/");

        return $renderer->render($response, "login.php", $args);
    }

    public function login(Request $request, Response $response, $args)
    {

        $conn = ConnectionFactory::Connect();

        $locatario = new Locatario();


        $locatario->setEmail((string) $_POST['email']);
        $locatario->setSenha((string) $_POST['senha']);

        $locatarioDAO = new LocatarioDAO($conn);

        /// FAZER A VERIFICACAO ------>>
        $locatarioLogado =  $locatarioDAO->buscarLocatarioPorEmail($locatario);


        $renderer = new PhpRenderer(__DIR__ . "/../../Views/locatarioDashboard/");

        session_start();

        if ($locatarioLogado != NULL) {

            $_SESSION['user'] = "<div class='alert alert-sucess'>Login realizado com sucesso!</div>";
            $_SESSION['idLocatario'] = $locatarioLogado->getId();

            return $renderer->render($response, "index.php", $args);
        } else {

            $_SESSION['msgErro'] = "<div class='alert alert-danger'>Login e/ou senha inválidos</div>";

            return $renderer->render($response, "login.php", $args);
        }
    }

    public function logout(Request $request, Response $response, $args)
    {

        $renderer = new PhpRenderer(__DIR__ . "/../../Views/locatarioDashboard/");

        if (isset($_SESSION['idLocatario'])){
            session_destroy();
            
            return $renderer->render($response, "login.php", $args);
        }

    }
}
