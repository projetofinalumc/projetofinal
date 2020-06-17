<?php
namespace App\Application\Actions\User;

use Slim\Views\PhpRenderer;
use App\Application\Models\Endereco;
use App\Application\Models\EnderecoDAO;

use App\Application\Models\ProdutoDAO;
use App\Application\Models\PedidoDAO;
use DateTime;
use App\Application\Models\Email;
use App\Application\Models\LocatarioDAO;
use App\Application\Models\Pedido;
use App\Application\Models\Produto;
use App\Application\Models\Locatario;
use App\Application\Models\ItemPedido;
use App\Application\Models\ConnectionFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once(__DIR__ . "/../../DAO/LocatarioDAO.php");
require_once (__DIR__."/../../Models/Locatario.classe.php");
require_once (__DIR__."/../../Models/Email.classe.php");
require_once (__DIR__."/../../Models/ItemPedido.classe.php");
require_once(__DIR__ . "/../../DAO/EnderecoDAO.php");
require_once(__DIR__ . "/../../DAO/ProdutoDAO.php");
require_once(__DIR__ . "/../../DAO/PedidoDAO.php");
require_once(__DIR__ . "/../../Models/Endereco.classe.php");
require_once(__DIR__ . "/../../Models/Pedido.classe.php");


class ControllerPedido{
    public function gerarPedido(Request $request, Response $response, $args){

        session_start();
         
        $conn = ConnectionFactory::Connect();

        $produtoDAO = new ProdutoDAO($conn);

        foreach($_SESSION['Carrinho'] as $key=>$produto){

                 $obj  = json_decode($produto,false);
  
              
                  $obj->Quantidade = $_POST["Produto$obj->Produtoid"];
                  
                  $_SESSION['Carrinho'][$key] = json_encode($obj);
              }

        $produtos = $_SESSION['Carrinho'];


        $listProdutoPedido = $produtoDAO->buscarProdutosCarrinho($produtos);

        $valorTotal = 0;
        
        foreach($listProdutoPedido as $Produto){

             

            $id = $Produto->getId();
            $QuantidadePedido = $_POST["Produto$id"];
            $valorDiaria = $Produto->getValDiaria();
            $nomeProduto = $Produto->getNome();

            $itemPedido = new ItemPedido();
            $itemPedido->setNomeProduto($nomeProduto);
            $itemPedido->setIdProduto($id);
            $itemPedido->setQuantidade($QuantidadePedido);
            $itemPedido->setValorUnitario($valorDiaria);
            $valor =  $itemPedido->getQuantidade() * $itemPedido->getValorUnitario();

            $listaItemPedido[] = $itemPedido;
            $valorTotal += $valor;
           
        }
        
        $multaPedido = $valorTotal * 0.1;
        
        $locatario = new Locatario();
        $locatario->setId((int)$_SESSION['idLocatario']);
        $locatarioDAO = new LocatarioDAO($conn);
        $locatarioPedido = $locatarioDAO->buscarLocatarioPorID($locatario);

            
        $EnderecoLocatario = new Endereco();
        $EnderecoLocatario->setIdLocatario($_SESSION['idLocatario']);
        $EnderecoDAO = new EnderecoDAO($conn);
        $listaEnderecoLocatario = $EnderecoDAO->buscarEnderecoPorId($EnderecoLocatario);
        
        $locatarioPedido->setListaEndereco($listaEnderecoLocatario);

        $pedido = new Pedido();
        $pedidoDAO = new PedidoDAO($conn);
        //$pedido->setvalortotal($_POST['valortotal']);
        //$pedido->setdataPedido(date('d/m/y'));
        $pedido->setLocatarioPedido($locatarioPedido);
        $pedido->setlistaItemPedido($listaItemPedido);
        $pedido->setvalorTotal((float)$valorTotal);
        $pedido->setMultaPedido($multaPedido);
       

        //$args = ['PedidoLocatario' => $pedido];
         $_SESSION['PedidoLocatario'] = serialize($pedido); 

        $renderer = new PhpRenderer(__DIR__.'/../../Views/loja/');

        return $renderer->render($response,"checkout.php",$args);       
    }
    public function Ver_Pedido_Locatario(Request $request, Response $response, $args)
    {
        $conn = ConnectionFactory::Connect();

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
          }

        $sessaoid = $_SESSION['idLocatario']; 
        $locatario = new Locatario();
        $locatario->setId($sessaoid);
        $Pedido = new Pedido();
        $Pedido->setLocatarioPedido($locatario);
        // $_SESSION['idLocatario']
        $PedidoDAO = new PedidoDAO($conn);
        $listaPedidos = $PedidoDAO->BuscarPedidos_Locatario($Pedido);

        //$args = ['ListaPedidos' => $listaPedidos];

        if (is_null($listaPedidos)){

            $args = ['ListaPedidos' => $listaPedidos, 'msg' => "Você ainda não realizou nenhum Pedido"];

            
        }else {
            $args = ['ListaPedidos' => $listaPedidos];
        }

        $renderer = new PhpRenderer(__DIR__.'/../../Views/locatarioDashboard/');
        
        return $renderer->render($response, "locatario.php", $args);
    }

    public function cancelarPedidoLocatario(Request $request, Response $response, $args)
    {
        $conn = ConnectionFactory::Connect();
        
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
          }
         
        $Pedido = new Pedido();
        // $_SESSION['idLocatario']
        $PedidoDAO = new PedidoDAO($conn);

        $Pedido->setidPedido((int)$_POST['idPedido']);

        $PedidoCancelado = $PedidoDAO->BuscarItemPedido($Pedido);
        $PedidoCancelado->setStatus("CANCELADO");

        $listaItemPedido = $PedidoCancelado->getlistaItemPedido();
        $ProdutoDAO = new ProdutoDAO($conn);
        $ProdutoDAO->adicionarProdutoEstoque($listaItemPedido);

        $listaPedidos = $PedidoDAO->trocarStatusPedido($PedidoCancelado);

        
        return $this->Ver_Pedido_Locatario($request, $response, $args);

    }

    public function devolucaoPedidoLocatario(Request $request, Response $response, $args)
    {
        
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        
        $Pedido = new Pedido();
        $Pedido->setidPedido((int)$_POST['idPedido']);
        
        $conn = ConnectionFactory::Connect();
        
        $PedidoDAO = new PedidoDAO($conn);
        $listPedidoDevolucao = $PedidoDAO->buscarPedidoPorId($Pedido);
       $PedidoDevolucao = $listPedidoDevolucao[0];  
       #Verificando se o Pedido está atrasado.
        if($PedidoDevolucao->getStatus() == "ATRASADO"){
            
           $dataDevolucao = $PedidoDevolucao->getDataDevolucao();
           $dataDevolucao = date_create($dataDevolucao);

           $data = getdate();
           $dataArrumada = $data['year'].'-'.$data['mon'].'-'.$data['mday'];
           $dataDeHoje = date_create($dataArrumada);

           #Pegando a quantos dias o Peido está atrasado para devolução
           $diff = date_diff($dataDeHoje,$dataDevolucao);
           $diasAtrasado = $diff->format("%a");
           
            $multaPedido = $PedidoDevolucao->getMultaPedido();

            $multaPedido = $multaPedido * (int)$diasAtrasado;

            $PedidoDevolucao->setMultaPedido($multaPedido);
                
        }else{   
            $PedidoDevolucao->setMultaPedido(0);
        }
        
        # Valindo a Perca de Produtos
        
        $ItensPedidoDevolucao = $PedidoDevolucao->getlistaItemPedido();
        
        if(isset($_POST['inputDefeituoso'])){
            
            $produtoDefeituoso =  $_POST['inputDefeituoso']; 
            $QuantProdutoDefeituoso = count($produtoDefeituoso);
            
            $produtoDefeituosoSelecionado = [];
            for($i=0; $i < $QuantProdutoDefeituoso; $i++)
            {
                $ProdutoDefeito = new itemPedido();
                $ProdutoDefeito->setIdProduto((int)$produtoDefeituoso[$i]);
                $produtoDefeituosoSelecionado[] = $ProdutoDefeito;
                $listItemDevolucao = [];        
                
                foreach($ItensPedidoDevolucao as $itemDevolucao){
                    $idItemDevolucao = $itemDevolucao->getIdProduto();
                    $idProdutoDefeito = $produtoDefeituoso[$i];
                    
                    if($idItemDevolucao == $idProdutoDefeito){
                        $quantidadeItemPedido = $itemDevolucao->getQuantidade();
                        $quantidadeItemDefeituoso = (int)$_POST["quantidadeDefeito$idItemDevolucao"];
                        $quantidadeAtualizada = $quantidadeItemPedido - $quantidadeItemDefeituoso;
                        $itemDevolucao->setQuantidade($quantidadeAtualizada);
                        $listItemDevolucao[] = $itemDevolucao;
                    }else{
                        $listItemDevolucao[] = $itemDevolucao;
                    }
                    
                    
                }
            }
            
            
            $valorPercaTotal = 0;
            $ProdutoDAO = new ProdutoDAO($conn);
            $listaProdutoDefeituoso = $ProdutoDAO->buscarProdutosDefeituosos($produtoDefeituosoSelecionado);
            foreach($listaProdutoDefeituoso as $ProdutoDefeituoso){
                
                $id = $ProdutoDefeituoso->getId();
                $valorPerca = $ProdutoDefeituoso->getPrecoPerda();
                $quantidadeProdutoDefeito = (int)$_POST["quantidadeDefeito$id"];
                $valorPerca = $valorPerca * $quantidadeProdutoDefeito;
                $valorPercaTotal = $valorPercaTotal + $valorPerca;
            }
            
            $multa = $PedidoDevolucao->getMultaPedido();
            $multa = $multa + $valorPercaTotal;
            $PedidoDevolucao->setMultaPedido($multa);
            
        }else{
            
            $listItemDevolucao = $PedidoDevolucao->getlistaItemPedido();
        }
                
        
        $ProdutoDAO = new ProdutoDAO($conn);

            
        $multa = $PedidoDevolucao->getMultaPedido();
        $valorTotal = $PedidoDevolucao->getValorTotal();
        $valorTotalFinal =  $multa + $valorTotal;
        
        $PedidoDevolucao->setValorTotal($valorTotalFinal);

        $ProdutoDAO = new ProdutoDAO($conn);
        $ProdutoDAO->adicionarProdutoEstoque($listItemDevolucao);

        $PedidoDAO->alterarPedido($PedidoDevolucao);
        $listaPedidos[] = $PedidoDevolucao;
        $msg = "Finalizando Pedido";
        $args = ['ListaPedidos' => $listaPedidos, 'msg' => $msg];

        $renderer = new PhpRenderer(__DIR__.'/../../Views/adminDashboard/');
        
        return $renderer->render($response, "pedido_buscado.php", $args);

    }

    public function finalizandoPedidoLocatario(Request $request, Response $response, $args)
    {
        $conn = ConnectionFactory::Connect();

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
          }
        

         
        $Pedido = new Pedido();
        $Pedido->setidPedido((int)$_POST['idPedido']);
       
        
        $PedidoDAO = new PedidoDAO($conn);
        $listPedidoDevolucao = $PedidoDAO->buscarPedidoPorId($Pedido);
        $PedidoRetira = $listPedidoDevolucao[0];
        $PedidoRetira->setStatus("FINALIZADO");
        $PedidoDAO->trocarStatusPedido($PedidoRetira);
        $listaPedidos[] = $PedidoRetira;
        $args = ['ListaPedidos' => $listaPedidos];

        

        $renderer = new PhpRenderer(__DIR__.'/../../Views/adminDashboard/');
        
      // return $renderer->render($response, "devolucao.php", $args);
        return $renderer->render($response, "pedido_buscado.php", $args);
    }
    
    public function retiradaPedidoLocatario(Request $request, Response $response, $args)
    {
        $conn = ConnectionFactory::Connect();

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
          }
        

         
        $Pedido = new Pedido();
        $Pedido->setidPedido((int)$_POST['idPedido']);
       
        
        $PedidoDAO = new PedidoDAO($conn);
        $listPedidoDevolucao = $PedidoDAO->buscarPedidoPorId($Pedido);
        $PedidoRetira = $listPedidoDevolucao[0];
        $PedidoRetira->setStatus("AGUARDANDO DEVOLUCAO");
        $PedidoDAO->trocarStatusPedido($PedidoRetira);
        $listaPedidos[] = $PedidoRetira;
        $args = ['ListaPedidos' => $listaPedidos];

        

        $renderer = new PhpRenderer(__DIR__.'/../../Views/adminDashboard/');
        
      // return $renderer->render($response, "devolucao.php", $args);
        return $renderer->render($response, "pedido_buscado.php", $args);
    }


    public function Ver_Pedido_Admin(Request $request, Response $response, $args)
    {
        $conn = ConnectionFactory::Connect();

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
          }
         
        $Pedido = new Pedido();
        // $_SESSION['idLocatario']
        $PedidoDAO = new PedidoDAO($conn);

        $listaPedidos = $PedidoDAO->BuscarPedidos_Administrador();

        

        $args = ['ListaPedidos' => $listaPedidos];

        

        $renderer = new PhpRenderer(__DIR__.'/../../Views/adminDashboard/');
        
      // return $renderer->render($response, "devolucao.php", $args);
        return $renderer->render($response, "ListaPedidos.php", $args);
    }


    public function Ver_Pedido_Admin_Devolucao(Request $request, Response $response, $args)
    {
        $conn = ConnectionFactory::Connect();

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
          }
         
        $Pedido = new Pedido();
        // $_SESSION['idLocatario']
        $PedidoDAO = new PedidoDAO($conn);

                
        $data = getdate();

        $dataDevolucao = $data['year'].'-'.$data['mon'].'-'.$data['mday'];
        $Pedido->setidPedido(0);
        
        $Pedido->setdataDevolucao($dataDevolucao);
        $Pedido->setdataRetirada($dataDevolucao);

        $listaPedidos = $PedidoDAO->BuscarPedidos_Administrador_Devolucao($Pedido);


        $args = ['ListaPedidos' => $listaPedidos];

        $renderer = new PhpRenderer(__DIR__.'/../../Views/adminDashboard/');
        
        return $renderer->render($response, "devolucao.php", $args);
        //return $renderer->render($response, "ListaPedidos.php", $args);
    }

    public function Email(Request $request, Response $response, $args){
        $locatario = new Locatario();
        $locatario->setEmail("c1a0a4e98c@emailmonkey.club");
        $email = new Email();
        $mail = $email->mensagem_Bem_Vindo($locatario);
        $args  = ['mail' => $mail];
        $renderer = new PhpRenderer(__DIR__.'/../../Views/adminDashboard/');
        
        return $renderer->render($response, "teste.php", $args);

    }
    

    public function finalizarPedido(Request $request, Response $response, $args)
    {
        $conn = ConnectionFactory::Connect();
        
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
          }
         
        $Pedido = new Pedido();
        // $_SESSION['idLocatario']
        $PedidoDAO = new PedidoDAO($conn);

        $Pedido->setidPedido((int)$_GET['idPedido']);
        $Pedido->setStatus($_GET["status"]);


        $listaPedidos = $PedidoDAO->trocarStatusPedido($Pedido);


//        $args = ['ListaPedidos' => $listaPedidos];

       // $renderer = new PhpRenderer(__DIR__.'/../../Views/adminDashboard/');
        
        return $this->Ver_Pedido_Admin_Devolucao($request, $response, $args);
        //return $renderer->render($response, "ListaPedidos.php", $args);


    }

    public function Ver_Pedido_Admin_filtrado(Request $request, Response $response, $args)
    {
        $conn = ConnectionFactory::Connect();

        session_start();
         
        $Pedido = new Pedido();
        // $_SESSION['idLocatario']
        $PedidoDAO = new PedidoDAO($conn);

        if(isset($_POST['dataRetirada'])){$Pedido->setdataRetirada($_POST['dataRetirada']);}//else{$Pedido->setdataRetirada(NULL);}
        if(isset($_POST['dataPedido'])){$Pedido->setdataPedido($_POST['dataPedido']);}//else{$Pedido->setdataPedido(NULL);}
        if(isset($_POST['dataDevolucao'])){$Pedido->setdataDevolucao($_POST['dataDevolucao']);}//else{$Pedido->setdataDevolucao(NULL);}
        if(isset($_POST['idPedido'])){$Pedido->setidPedido((int)$_POST['idPedido']);}

        $listaPedidos = $PedidoDAO->BPA_filtro($Pedido);

        $args = ['ListaPedidos' => $listaPedidos];

        $renderer = new PhpRenderer(__DIR__.'/../../Views/adminDashboard/');
        
        //return $renderer->render($response, "ListaPedidos.php", $args);
        return $renderer->render($response, "ListaPedidos.php", $args);
    }


    public function buscarPedidoDevolucao(Request $request, Response $response, $args)
    {
        $conn = ConnectionFactory::Connect();

        session_start();
         
        $Pedido = new Pedido();
        // $_SESSION['idLocatario']
        $PedidoDAO = new PedidoDAO($conn);

        $Pedido->setidPedido((int)$_POST['id_Pedido']);
        $listaPedidos = $PedidoDAO->buscarPedidoPorId($Pedido);

        $renderer = new PhpRenderer(__DIR__.'/../../Views/adminDashboard/');
        
        if($listaPedidos != NULL){

            $args = ['ListaPedidos' => $listaPedidos];
    
    
            return $renderer->render($response, "pedido_buscado.php", $args);


        }else{
            $msg = "Codigo de Pedido Invalido";
            $args = ['msgErro' => $msg];
            return $renderer->render($response, "buscar_devolucao_pedido.php", $args);

        }
    }




    public function gerandoPedido(Request $request, Response $response, $args)
    {
        if(!isset($_SESSION)){ session_start(); }

        
        $pedido = unserialize($_SESSION['PedidoLocatario']);
        $todosEnderecos = $_POST['inputEndereco'];

        unset($_SESSION['PedidoLocatario']);
        unset($_SESSION['Carrinho']);
        unset($_SESSION['Total_Carrinho']);

        $N = count($todosEnderecos);
        $enderecoSelecionado = 0;
        for($i=0; $i < $N; $i++)
        {
            $enderecoSelecionado = $todosEnderecos[$i];
        }
        $conn = ConnectionFactory::Connect();

        $EnderecoSelecionado = new Endereco();
        $EnderecoSelecionado->setId($enderecoSelecionado);

        $EnderecoDAO = new EnderecoDAO($conn);
        $EnderecoPedido = $EnderecoDAO->buscarPorIdEndereco($EnderecoSelecionado);

        $pedido->setEnderecoPedido($EnderecoPedido);

        $data = getdate();

        $dataPedido = $data['year'].'-'.$data['mon'].'-'.$data['mday'];

        $dataInicial = (string)$_POST['dataInicial'];
        //$datetime = new DateTime((string)$dataPedido);
        $datetime = new DateTime($dataInicial);
        $datetime->modify('+1 day');
        $dataDevolucao = (string)$datetime->format('Y-m-d');


        

        $pedido->setdataPedido($dataPedido);
        $pedido->setdataRetirada($dataInicial);
        $pedido->setdataDevolucao($dataDevolucao);

        $PedidoDAO = new PedidoDAO($conn);

        $pedidoEmail =  $PedidoDAO->gerarPedido($pedido);

        $listaItemPedido = $pedido->getlistaItemPedido();
        
        $ProdutoDAO = new ProdutoDAO($conn);
        $ProdutoDAO->retirarProdutoEstoque($listaItemPedido);
        $email = new Email();

        $email->mensagem_Pedido_Realizado($pedidoEmail);

        $args = ['Pedido' => $pedido];
   
        $renderer = new PhpRenderer(__DIR__.'/../../Views/loja/');
        
        return $renderer->render($response, "final.php", $args);
    }

}
?>