<?php

declare(strict_types=1);
namespace App\Application\Actions\User;



use Slim\Views\PhpRenderer;
use App\Application\Models\LocatarioDAO;
use App\Application\Models\Locatario;
use App\Application\Models\Endereco as Endereco;
use App\Application\Models\ConnectionFactory;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once  (__DIR__."/../../DAO/LocatarioDAO.php");
//require_once (__DIR__."/../../Models/Locatario.classe.php");
require_once  (__DIR__."/../../DAO/EnderecoDAO.php");
require_once (__DIR__."/../../Models/Endereco.classe.php");



class ControllerLocatario{
 
    public function listar(Request $request, Response $response, $args) {
      
        
        $renderer = new PhpRenderer(__DIR__."/../../Views/loja/");

        return $renderer->render($response, "newloc.php", $args);
        //return $renderer->render($response, "test.php", $args);
    }

   public function cadastrar(Request $request, Response $response, $args) {
        
        $conn = ConnectionFactory::Connect();
        
        $locatario = new \Locatario();


        $locatario->setCPF((int)$_POST['cpf']);
        $locatario->setEmail((string)$_POST['email_loc']);
        $locatario->setNome((string)$_POST['first_name']);
        $locatario->setSenha((string)$_POST['password_loc']);

        $locatarioDAO = new LocatarioDAO($conn);

        $locatarioDAO->cadastrarLocatario($locatario);

        $locatarioCadastrado = $locatarioDAO->buscarLocatarioPorCpf($locatario);

        $endereco_locatario = new \Endereco();

        $endereco_locatario->setLogradouro($_POST['logradouro_end']);
        $endereco_locatario->setNumero((int)$_POST['numero_end']);
        $endereco_locatario->setCep((int)$_POST['numero_cep']);
        $endereco_locatario->setEstado($_POST['estado_end']);
        $endereco_locatario->setIdLocatario($locatarioCadastrado->getId());
        

        $enderecoDAO = new \EnderecoDAO($conn);

        $enderecoDAO->cadastrarEndereco($endereco_locatario); 
        

         return $this->listar($request, $response, $args);
     } 


     public function cadastrarNovoEndereco(Request $request, Response $response, $args) {
        
        $conn = ConnectionFactory::Connect();
        
        $novo_endereco = new Endereco();
        session_start();

        $novo_endereco->setIdLocatario($_SESSION['idLocatario']);
        $novo_endereco->setLogradouro($_POST['logradouro_end']);
        $novo_endereco->setNumero((int)$_POST['numero_end']);
        $novo_endereco->setCep((int)$_POST['numero_cep']);
        $novo_endereco->setEstado($_POST['estado_end']);
        
        $novo_enderecoDAO = new \EnderecoDAO($conn);

        $novo_enderecoDAO->cadastrarEndereco($novo_endereco);

        
         return $this->retornarDadosLocario($request, $response, $args);
     } 


     public function editarEndereco(Request $request, Response $response, $args) {
        
        $conn = ConnectionFactory::Connect();
        
        $endereco_edit = new Endereco();
        session_start();

        $endereco_edit->setIdLocatario($_SESSION['idLocatario']);
        $endereco_edit->setId($_POST['idEndereco']);
        $endereco_edit->setLogradouro($_POST['logradouro_edit']);
        $endereco_edit->setNumero((int)$_POST['numero_edit']);
        $endereco_edit->setCep((int)$_POST['cep_edit']);
        $endereco_edit->setEstado($_POST['estado_edit']);
        
        $endereco_editDAO = new \EnderecoDAO($conn);

        $endereco_editDAO->alterarEndereco($endereco_edit);

        
        return $this->retornarDadosLocario($request, $response, $args);
     } 


     

     public function retornarDadosLocario(Request $request, Response $response, $args) {
        
            $conn = ConnectionFactory::Connect();
           // session_start();

            $idloc = $_SESSION['idLocatario'];

            $locatario = new Locatario();

            $locatario->setId((int)$idloc);
            $locatarioDAO = new LocatarioDAO($conn);

            $DadosLocatario = $locatarioDAO->buscarLocatarioPorID($locatario);
            
           $endereco_locatario = new Endereco();

            $endereco_locatario->setIdLocatario($idloc);

            $enderecoDAO = new \EnderecoDAO($conn);

            $endereco = $enderecoDAO->buscarEnderecoPorId($endereco_locatario);

            //$DadosLocatario->setEndereco($endereco); 

            $args = ['dados_locatario' => $DadosLocatario, 'lista_endereco' => $endereco];

            $renderer = new PhpRenderer(__DIR__."/../../Views/locatarioDashboard/");

            return $renderer->render($response, "form.php", $args);
         
     } 

     public function alterar(Request $request, Response $response, $args) {
        
        $conn = ConnectionFactory::Connect();

        session_start();
        $idloc = $_SESSION['idLocatario'];
        

        $locatario = new \Locatario();


        $locatario->setId($idloc);
        $locatario->setCPF((int)$_POST['txtCPF']);
        $locatario->setEmail((string)$_POST['txtEmail']);
        $locatario->setNome((string)$_POST['txtNome']);
        $locatario->setSenha((string)$_POST['txtSenha']);
        

        $locatarioDAO = new LocatarioDAO($conn);

        $locatarioDAO->alterarLocatario($locatario);

       
      
        return $this->retornarDadosLocario($request, $response, $args);
   } 

   public function login(Request $request, Response $response, $args) {

    $conn = ConnectionFactory::Connect();
        
    $locatario = new Locatario(); 


    $locatario->setEmail((String)$_POST['email']);
    $locatario->setSenha((String)$_POST['senha']);

    $locatarioDAO = new LocatarioDAO($conn);
    
    /// FAZER A VERIFICACAO ------>>
    $locatarioLogado =  $locatarioDAO->buscarLocatarioPorEmail($locatario);

    
    $renderer = new PhpRenderer(__DIR__."/../../Views/locatarioDashboard/");

    session_start();

    if($locatarioLogado != NULL ){

        $_SESSION['user'] = "<div class='alert alert-sucess'>Login realizado com sucesso!</div>";
        $_SESSION['idLocatario'] = $locatarioLogado->getId();
        
        return $this->retornarDadosLocario($request, $response, $args);

    }else{

        $_SESSION['msgErro'] = "<div class='alert alert-danger'>Login e/ou senha inválidos</div>";

        return $renderer->render($response, "login.php", $args); 

    }

 } 

}
