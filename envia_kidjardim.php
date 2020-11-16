<?php
session_start();
if(!isset($_SESSION['usuariosession']) AND !isset($_SESSION['senhasession'])){
	header("Location: ../admin/index.php");
	exit;
}
?>

<?php
$id     = $_GET['idniver'];

        include ("class.phpmailer.php");
        include ("conecta.php");

       
            //Campos para envio da mensagem

            $de      = $_SESSION['usuariosession'];
            $para    = utf8_decode('convite@kidbeerutabuffet.com.br');
          
  
	$seleciona = mysql_query("SELECT * FROM clientes WHERE idniver='$id'")or die("Erro na consulta".mysql_error());

   if($seleciona == ''){
	   echo 'Nenhum Registro';
   }else{
	 while($res_id = mysql_fetch_array($seleciona)){
	$id            = $res_id['idniver'];	 
	$nome          = $res_id['nomeniver'];
    $email_cli     = $res_id['email'];
    $sexo          = $res_id['sexo'];
	$dataniver     = $res_id['datafesta'];
	 if (strstr($dataniver, "-")){
    $aux2 = explode ("-", $dataniver);
    $newdataniver = $aux2[2] . "/". $aux2[1] . "/" . $aux2[0];}
			$horaini  =  $res_id['horaini'];
		    if (strstr($horaini, ":")){
    $y = explode(":", $horaini);	
    $hor = $y[0];
    $min = $y[1];	
    $hinicio = "$hor:$min";}
$hend     =  $res_id['horaend'];
		    $idade    =  $res_id['idade'];
			$unidade  =  $res_id['unidade']; 
	 }}              
     
   

 function html($convidado){
   global $nome,$sexo,$newdataniver,$hinicio,$hend,$idade,$idconv,$id;
return '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Convite KidBeeruta</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	background-color:#dbebaa;
}
-->
</style></head>

<body>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  	<td align="center"><font face="Arial, Helvetica, sans-serif" size="-1" color="#625702">Caso n�o consiga visualizar esta mensagem, <a href="">utilize este link para visualizar no navegador</a>.</font></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
  </tr>
  <tr>
    <td><img src="http://www.kidbeerutabuffet.com.br/convite/kidjardim/header.jpg" width="720" height="131" style="display:block"/></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#dbebaa"><font face="Arial, Helvetica, sans-serif" size="+3" color="#625702"> '.utf8_decode($convidado).' <br />
    Chegou o meu anivers�rio!</font></td>
  </tr>
 
  <tr>
    <td align="center" bgcolor="#dbebaa"><br />
     <font color="#625702" size="+2" face="Arial, Helvetica, sans-serif">     Voc� esta convidado para uma festa de pura divers�o</font><br />
     <br />
    <font color="#625702" size="+2" face="Arial, Helvetica, sans-serif"> Dia:  '.$newdataniver.' �s '.$hinicio.'hrs <br />
    Venha comemorar meu anivers�rio de '. $idade .
(($idade == '1') ?  ' ano':' anos') .
'</font><br />
    <font color="#625702" size="+2" face="Arial, Helvetica, sans-serif">Ser� no Kid beeruta Jardim em Santo Andr� </font><br /><br />
        
    <font face="Arial, Helvetica, sans-serif" size="+2" color="#625702">aguardo a sua presen�a<br /></font><br />
    <font color="#625702" size="+2" face="Arial, Helvetica, sans-serif">'.$nome.'</font></td>
  </tr>
  <tr>
    <td bgcolor="#dbebaa"><img src="http://www.kidbeerutabuffet.com.br/convite/kidjardim/footer.jpg" width="720" height="206" alt="kidbeeruta" style="display:block" /></td>
  </tr>
  <tr>
    <td bgcolor="#dbebaa"><table width="720" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><a href="http://www.kidbeerutabuffet.com.br/convite/confimar.php?id='.$idconv.'&idn='.$id.'"><img src="http://www.kidbeerutabuffet.com.br/convite/kidjardim/vou.jpg" width="250" height="88" border="0" style="display:block" alt="Botão Vou" /></a></td>
             <td><img src="http://www.kidbeerutabuffet.com.br/convite/kidjardim/branco.jpg" width="242" height="88" border="0" style="display:block" alt="Botão Talvez" /></td>
        <td><a href="http://www.kidbeerutabuffet.com.br/convite/confimarn.php?id='.$idconv.'&idn='.$id.'"><img src="http://www.kidbeerutabuffet.com.br/convite/kidjardim/naovou.jpg" width="242" height="88" border="0" style="display:block" alt="Botão Não Vou" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><a href="#"><img src="http://www.kidbeerutabuffet.com.br/convite/kidjardim/endereco.jpg" border="0" style="display:block" alt="" /></a></td>
  </tr>
  <tr>
    <td> <a href="http://www.kidbeeruta.com.br/mapa_jardim.swf" target="_blank"><img src="http://www.kidbeerutabuffet.com.br/convite/kidjardim/comochegar.jpg" width="720" height="133" border="0" style="display:block" alt="curta nossa página no Facebook" /></a></td>
  </tr>
</table>
</body>
</html>
';}
         $tabela = "contatos";
 
       // CAMPOS UTILIZADOS PARA A CONSULTA
        $campos = "id, idniver, nome, email, codStatus, enviado";
 
          // NUMERO MÃƒÆ’Ã†'Ãƒâ€ 'ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚ÂXIMO DE ENVIO
       $quant = 3;
 
            // TEMPO ENTRE UM PROCESSO DE ENVIO E OUTRO
         $seg = 5;
 
        
 
            // RESGATA O VALOR DA GLOBAL INICIO
            $inicio = $_GET["inicio"];
 
            // ATRIBUI O RESULTADO DA SOMA ENTRE INICIO E QUANT
          $fim = $inicio + $quant;
 
            // VERIFICA SE FOI ATRIBUIDO VALOR A VARIAVEL "INICIO"
           if($inicio == ""){
 
            // ATRIBUI O VALOR 0 CASO NÃƒÆ’Ã†'Ãƒâ€ 'ÃƒÆ’Ã¢â‚¬Â 'O EXISTA VALOR ATRIBUIDO
            $inicio = 0;
           }else{
 
            // ATRIBUI O VALOR DA GLOBAL INICIO CASO JA EXISTA VALOR ATRIBUIDO
            $inicio = $_GET["inicio"];
            }
 
            // EXECUTA A CONSULTA OU INFORMA UM ERRO CASO OCORRA
         $sql = mysql_query("SELECT ". $campos ." FROM ". $tabela ." WHERE idniver = ".$id." AND codStatus = 0 AND enviado = 0 LIMIT ". $inicio .",". $quant)or die(mysql_error());
 
            // VERIFICA SE AINDA EXISTEM EMAILS A SEREM ENVIADOS
           if(mysql_num_rows($sql) == 0){
 
            // ALTERANDO O VALOR DO CAMPO CODSTATUS PARA 0
            @mysql_query("UPDATE ". $tabela ." SET codStatus = '0', enviado = '1'  WHERE idniver= ".$id."");
 
             
            // INFORMO O TÃƒÆ’Ã†'Ãƒâ€ 'ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€šÃ‚Â°RMINO DO PROCESSO
              echo("<script type='text/javascript'> alert('Convites enviados com sucesso !!!'
); location.href='convite.php';</script>");
}else{
 
            // CONTINUA EFETUANDO O ENVIO
            header("refresh:".$seg.";URL=?inicio=".$fim."&idniver=".$id."");
             
            }
            echo "Enviando os convites aguarde o fim do processo <br>";
            // CRIA O LAÃƒÆ’Ã†'Ãƒâ€ 'ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€šÃ‚Â¡O REPETITIVO
           while($r = mysql_fetch_array($sql)){
 
            // ADICIONAMOS OS PADRÃƒÆ’Ã†'Ãƒâ€ 'ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€šÃ‚Â¢ES DE DESTINATRIO
            
            $para      = $r["email"];
            $fulano    = $r["nome"];
            $fulano    = utf8_decode($fulano);
            $idconv    = $r["id"];

            //Criando a classe PHPMailer para envio de newsletter
 
            $mail = new PHPMailer();
			$mail->IsSMTP = ('smtp');
            $mail->Mailer = ('mail');
            $mail->SMTPSecure = 'ssl';
           	$mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticaÃƒÆ’Ã†'Ãƒâ€ 'ÃƒÆ’Ã¢â‚¬Â 'ÃƒÆ’Ã†'ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â§ÃƒÆ’Ã†'Ãƒâ€ 'ÃƒÆ’Ã¢â‚¬Â 'ÃƒÆ’Ã†'ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â£o
		
            $mail->Host = "smtp.kidbeerutabuffet.com.br"; // SMTP servers
			$mail->Port = 587;
            $mail->Username = 'convite@kidbeerutabuffet.com.br'; // SMTP username
			$mail->Password = '@#Suporte1'; // SMTP password
            $mail->Sender = ('convite@kidbeerutabuffet.com.br');
            $mail->SetFrom ('convite@kidbeerutabuffet.com.br','Convite KidBeeruta');
            $mail->AddAddress ($para);  
            $mail->ClearReplyTos();
            $mail->AddReplyTo($email_cli,$nome);
            $mail->Wordwrap = 50;
            $mail->Subject = "Convite para $fulano";
            $mail->IsHTML = (true);
			
            

			 
            $texto = 'Convite Kid Beeruta';
            $mail->Body = html( $r["nome"]);
            //$mail->Body = $html;
            $mail->AltBody = $texto;
 
            if($mail->Send()){
              
            echo 'Convite enviado para: '. $para .' Ok<br /></div>';
 
                           //Altero o cÃƒÆ’Ã†'Ãƒâ€ 'ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â³digo para 1 para parar o envio do loop
 
                @mysql_query("UPDATE". $tabela ."SET codStatus = '1', enviado = '1' ");
 
            } else {
                echo 'Convite  enviado para: '. $para .' j� enviado<br /></div>';
				 
            }



            }
 



 
     
?>