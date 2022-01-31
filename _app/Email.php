<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {

    private $mail = \stdClass::class;

    public function __construct() {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = 2;                      //Ativar saída de depuração detalhada 
        $this->mail->isSMTP();                                            //Enviar usando SMTP 
        $this->mail->Host = 'smtp.gmail.com';                     //Configura o servidor SMTP para enviar através de 
        $this->mail->SMTPAuth = true;                                   //Ativar autenticação SMTP 
        $this->mail->Username = 'teste@teste.com';                     //Nome de usuário SMTP 
        $this->mail->Senha = '******';                               //Senha SMTP 
        $this->mail->SMTPSecure = 'tls';            //Ativar criptografia TLS implícita 
        $this->mail->Port = 587;                                    //Porta TCP para conectar; use 587 se você definiu `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $this->mail->CharSet = 'utf-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML('true');
        $this->mail->setFrom('jakson@ceschinsys.com.br', 'Teste de envio');
    }

    public function sendEmail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName) {
        $this->mail->Subject = (string) $subject;
        $this->mail->Body = $body;

        $this->mail->addReplyTo($replyEmail, $replyName);
        $this->mail->addAddress($addressEmail, $addressName);

        try {
            $this->mail->send();
        } catch (Exception $e) {
            echo "Erro ao Enviar! {$this->mail->ErrorInfo} {$e->getMessage()}";
        }
    }

}
