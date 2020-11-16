<?php
include_once("conecta.php");
$id  =  $_GET['id'];
$idn =  $_GET['idn'];

$confirmando = mysql_query("UPDATE contatos set confirma = 'sim' WHERE id = '$id'")or die("Erro na consulta".mysql_error());

if ($confirmando =='0'){
	
	 	echo 'Erro ao Atualizar';		
}else{
$sconvidado = mysql_query("SELECT * from contatos where id = '$id'")or die("Erro na consulta".mysql_error());	
if($sconvidado == ''){
	   echo 'Nenhum Registro';
   }else{
	 while($req_id = mysql_fetch_array($sconvidado)){
	
	$nomeconv          = $req_id['nome'];
	$email             = $req_id['email'];

	 }}   	
	
	
	
$scliente = mysql_query("SELECT * from clientes where idniver ='$idn'")or die("Erro na consulta".mysql_error());	
if($scliente == ''){
	   echo 'Nenhum Registro';
   }else{
	 while($resq_id = mysql_fetch_array($scliente)){
	$id            = $resq_id['idniver'];	 
	$nome          = $resq_id['nomeniver'];
	$para          = $resq_id['email'];
    $dia           = $resq_id['datafesta'];
    if (strstr($dia, "-")){
    $aux2 = explode ("-", $dia);
    $newdia = $aux2[2] . "/". $aux2[1] . "/" . $aux2[0];}
    $horas         = $resq_id['horaini'];
    $unidade       = $resq_id['unidade'];
	 }}   
  $assunto = "Confirmação de presença na festa de " .$nome. "";
  $msgn .= "Confirmação de presença na festa de " .$nome. "<br /><br />";
		$msgn .= "O convidado ".$nomeconv."<br /><br />";
		$msgn .= "E-mail: ".$email."<br /><br />";
		$msgn .= "Confirmou a sua presença na sua festa!<br /><br />";	
        $msgn .= "Dia " .$newdia. " as " .$horas. "hrs no Kid Beeruta ".$unidade."!<br /><br />";

    $remetente = "enviado@kidbeeruta.com.br";

    require_once('mailer/class.phpmailer.php');
    $phpmail = new PHPMailer();
    
    $phpmail->IsSMTP('smtp'); // envia por SMTP
	$phpmail->Mailer = ('mail');
    $phpmail->SMTPSecure = 'ssl';
    $phpmail->Host = "smtp.kidbeerutabuffet.com.br"; // SMTP servers
	$phpmail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticaÃ§Ã£o
	$phpmail->Port = 587;
	$phpmail->Username = 'convite@kidbeerutabuffet.com.br'; // SMTP username
	$phpmail->Password = '@#Suporte'; // SMTP password
    $phpmail->Sender = ('convite@kidbeerutabuffet.com.br');
		

    $phpmail->IsHTML(true);
    $phpmail->From = ('convite@kidbeerutabuffet.com.br');
    $phpmail->FromName = utf8_decode($nomeconv);
    $phpmail->AddAddress($para,utf8_decode($nome));
	$phpmail->Subject = $assunto;
	$phpmail->Body .= $msgn;		
	
	if(!$phpmail->Send()){
	 echo'<div id="alert">Erro ao enviar mensagem!</div>';
 }else{
  echo("<script type='text/javascript'> alert('Você confirmou sua presença obrigado !!!'
); location.href='http://www.kidbeeruta.com.br';</script>");
 }
  
     
          
			
		
	
}


?>