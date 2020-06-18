<?php

declare(strict_types=1);

namespace App\Application\Actions\User;



use Slim\Views\PhpRenderer;
use App\Application\Models\LocatarioDAO;
use App\Application\Models\EnderecoDAO;
use App\Application\Models\Locatario;
use App\Application\Models\Endereco as Endereco;
use App\Application\Models\ConnectionFactory;
use App\Application\Models\Email;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once(__DIR__ . "/../../DAO/LocatarioDAO.php");
//require_once (__DIR__."/../../Models/Locatario.classe.php");
require_once(__DIR__ . "/../../DAO/EnderecoDAO.php");
require_once (__DIR__."/../../Models/Email.classe.php");
require_once(__DIR__ . "/../../Models/Endereco.classe.php");



class ControllerLocatario
{

    public function listar(Request $request, Response $response, $args)
    {


        $renderer = new PhpRenderer(__DIR__ . "/../../Views/loja/");

        return $renderer->render($response, "newloc.php", $args);    }

    public function cadastrar(Request $request, Response $response, $args)
    {

        $conn = ConnectionFactory::Connect();

        $locatario = new Locatario();


        $locatario->setCPF((string) $_POST['cpf']);
        $locatario->setEmail((string) $_POST['email_loc']);
        $locatario->setNome((string)$_POST['first_name']." ".$_POST['c_lname']);
        //$locatario->setDataNascimento((string) $_POST['data_nascimento']);
        $locatario->setSenha((string) $_POST['password_loc']);

        $locatarioDAO = new LocatarioDAO($conn);

        $locatarioDAO->cadastrarLocatario($locatario);

        $locatarioCadastrado = $locatarioDAO->ultimoLocatario();
        

        $endereco_locatario = new Endereco();

        $endereco_locatario->setLogradouro($_POST['logradouro_end']);
        $endereco_locatario->setNumero((int) $_POST['numero_end']);
        $endereco_locatario->setCep((int) $_POST['numero_cep']);
        $endereco_locatario->setEstado($_POST['uf']);
        $endereco_locatario->setBairro($_POST['bairro_loc']);
        $endereco_locatario->setCidade($_POST['cidade_loc']);
        $endereco_locatario->setIdLocatario((int)$locatarioCadastrado->getId());


        $enderecoDAO = new EnderecoDAO($conn);

        $enderecoDAO->cadastrarEndereco($endereco_locatario);

         $email = new Email();

         $email->mensagem_Bem_Vindo($locatario);

         $args = ['locatarioCadastrado' => $locatario];
       $renderer = new PhpRenderer(__DIR__ . "/../../Views/loja/");

       return $renderer->render($response, "finalCadastro.php", $args);
    }


    public function cadastrarNovoEndereco(Request $request, Response $response, $args)
    {

        $conn = ConnectionFactory::Connect();

        $novo_endereco = new Endereco();
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $novo_endereco->setIdLocatario($_SESSION['idLocatario']);
        $novo_endereco->setLogradouro($_POST['logradouro_end']);
        $novo_endereco->setNumero((int) $_POST['numero_end']);
        $novo_endereco->setCep((int) $_POST['numero_cep']);
        $novo_endereco->setEstado($_POST['estado_end']);

        $novo_enderecoDAO = new EnderecoDAO($conn);

        $novo_enderecoDAO->cadastrarEndereco($novo_endereco);


        return $this->retornarDadosLocario($request, $response, $args);
    }


    public function editarEndereco(Request $request, Response $response, $args)
    {

        $conn = ConnectionFactory::Connect();

        $endereco_edit = new Endereco();
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $endereco_edit->setIdLocatario($_SESSION['idLocatario']);
        $endereco_edit->setId((int)$_POST['idEndereco']);
        $endereco_edit->setLogradouro($_POST['logradouro_edit']);
        $endereco_edit->setNumero((int) $_POST['numero_edit']);
        $endereco_edit->setCep((int) $_POST['cep_edit']);
        $endereco_edit->setEstado($_POST['estado_edit']);
        $endereco_edit->setBairro($_POST['bairro_edit']);
        $endereco_edit->setCidade($_POST['cidade_edit']);

        $endereco_editDAO = new EnderecoDAO($conn);

        $endereco_editDAO->alterarEndereco($endereco_edit);


        return $this->retornarDadosLocario($request, $response, $args);
    }




    public function retornarDadosLocario(Request $request, Response $response, $args)
    {

        $conn = ConnectionFactory::Connect();

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $idloc = $_SESSION['idLocatario'];

        $locatario = new Locatario();

        $locatario->setId((int)$idloc);
        $locatarioDAO = new LocatarioDAO($conn);

        $DadosLocatario = $locatarioDAO->buscarLocatarioPorID($locatario);

        $endereco_locatario = new Endereco();

        $endereco_locatario->setIdLocatario($idloc);

        $enderecoDAO = new EnderecoDAO($conn);

        $endereco = $enderecoDAO->buscarEnderecoPorId($endereco_locatario);

        //$DadosLocatario->setEndereco($endereco); 

        $args = ['dados_locatario' => $DadosLocatario, 'lista_endereco' => $endereco];

        $renderer = new PhpRenderer(__DIR__ . "/../../Views/locatarioDashboard/");

        return $renderer->render($response, "dadosLocatario.php", $args);
    }

    public function alterar(Request $request, Response $response, $args)
    {

        $conn = ConnectionFactory::Connect();


        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $idloc = $_SESSION['idLocatario'];


        $locatario = new Locatario();


        $locatario->setId($idloc);
        $locatario->setCPF((string) $_POST['txtCPF']);
        $locatario->setEmail((string) $_POST['txtEmail']);
        $locatario->setNome((string) $_POST['txtNome']);
        //$locatario->setSenha((string) $_POST['txtSenha']);


        $locatarioDAO = new LocatarioDAO($conn);

        $locatarioDAO->alterarLocatario($locatario);



        return $this->retornarDadosLocario($request, $response, $args);
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


        session_start();

        if ($locatarioLogado != NULL) {


            $renderer = new PhpRenderer(__DIR__ . "/../../Views/loja/");

           
            $_SESSION['idLocatario'] = $locatarioLogado->getId();
            $_SESSION['nomeLocatario'] =  $locatarioLogado->getNome();
            return $renderer->render($response, "index.php", $args);

        } else {

            $renderer = new PhpRenderer(__DIR__ . "/../../Views/locatarioDashboard/");

            $_SESSION['msgErro'] = "<div class='alert alert-danger'>Login e/ou senha inválidos</div>";

            return $renderer->render($response, "login.php", $args);
        }

    }

    
}
