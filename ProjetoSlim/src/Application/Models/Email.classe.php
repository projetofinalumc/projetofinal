<?php

namespace App\Application\Models;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use Application\Models\Locatario;
use Application\Models\Produto;
use Application\Models\getEnderecoPedido;
require_once("PHPMailer.php");
require_once("SMTP.php");
require_once("OAuth.php");
require_once("Exception.php");

class Email{
// Instantiation and passing `true` enables exceptions

private PHPMailer $mail;
 
  public function _construct(){
  }


  public function _configuracao(){

    try {

        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'pfcsisinfo2019@gmail.com';                     // SMTP username
        $mail->Password   = 'Efipfc2020';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
   
        
        return $mail;
    } catch (Exception $e) {
        return ;#"Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

  }

 
  public function mensagem_Bem_Vindo($Locatario){

    try {
             
            // $mail = $this->_configuracao();

             $mail = new PHPMailer(true);
             //Server settings
            # $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
             $mail->isSMTP();                                            // Send using SMTP
             $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
             $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
             $mail->Username   = 'pfcsisinfo2019@gmail.com';                     // SMTP username
             $mail->Password   = 'Efipfc2020';                               // SMTP password
             $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
             $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
         
             $nome = $Locatario->getNome();    
             $id = $Locatario->getId();         
             $locatarioEmail =  $Locatario->getEmail();
             
            $mail->setfrom('pfcsisinfo2019@gmail.com', 'Mailer');
            $mail->addAddress($locatarioEmail);  
          #  $mail->isHTML(true);       // Add a recipient
                       // Set email format to HTML
            $mail->Subject = "Bem vindo ao Loca Articles $id";
            $mail->Body    = "Seja Bem-Vindo <b>$nome</b>";
            $mail->AltBody = 'Ficamos felizes em saber, que você deu preferência aos nossos produtos. Fique a vontade';
        
            $teste = $mail->send();
      
    } catch (Exception $e) {
        return ;#"Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

  }


public function mensagem_Pedido_Realizado($Pedido){

    try {
             
             
            $mail = new PHPMailer(true);
            //Server settings
           # $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'pfcsisinfo2019@gmail.com';                     // SMTP username
            $mail->Password   = 'Efipfc2020';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                

                  
             $locatario = $Pedido->getLocatarioPedido();
             $locatarioEmail = $locatario->getEmail();

             $mail->setfrom('pfcsisinfo2019@gmail.com', 'Mailer');
             $mail->addAddress($locatarioEmail);     // Add a recipient

            // Content
          #  $mail->isHTML(true);    
            $nomeLocatario = $locatario->getNome();
            $Codigo = $Pedido->getidPedido();                              // Set email format to HTML
            $mail->Subject = "Pedido de codigo $Codigo.";
            
            $mail->Body    = "O Pedido de cod <b>$Codigo</b> foi realizado com sucesso <b>$nomeLocatario</b>";
            $mail->AltBody = 'O status do seu Pedido foi alterado para aguardando devolução';
           # $mail->isHTML(true);

            $mail->send();
        

       // return 'Message has been sent';
    } catch (Exception $e) {
       // return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

  }
  
}
?>
