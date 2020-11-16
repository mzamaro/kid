<?php function sendMail($assunto,$msgn,$remetente,$nomeremetente,$destino,$nomedestino){
require_once('mailer/class.phpmailer.php');
	  $phpmail = new PHPMailer();
    
    $phpmail->IsSMTP(); // envia por SMTP
	$phpmail->Host = "smtp.kidbeerutabuffet.com.br"; // SMTP servers
	$phpmail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
	$phpmail->Port = 587;
	$phpmail->Username = 'convite@kidbeerutabuffet.com.br'; // SMTP username
	$phpmail->Password = '@#Suporte'; // SMTP password


    $phpmail->IsHTML(true);
    $phpmail->From = $remetente;
    $phpmail->FromName = utf8_decode($nomeremetente);
    $phpmail->AddAddress($destino,utf8_decode($nomedestino));
	$phpmail->Subject = utf8_decode($assunto);
	$phpmail->Body .= utf8_decode($msgn);		
	
	if(!$phpmail->Send()){
	 echo'<div id="alert">Erro ao enviar mensagem!</div>';
 }else{
  $_SESSION['enviado']='<div id="alert">Mensagem Enviada!</div>';
  header('Location: convite.php');
 }
  
  
}
	
				?>