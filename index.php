<?php

require __DIR__ . '/lib_ext/autoload.php';

use Notification\Email;

$novoEmail = new Email;
$novoEmail ->sendEmail("assunto de teste", "<p>Esse é um email de <b>teste</b></p>", "jakson@ceschinsys.com.br", "Jakson", "jlceschin@gmail.com", "Ceschin");

var_dump($novoEmail);
