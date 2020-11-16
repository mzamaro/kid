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
   global $nome,$newdataniver,$hinicio,$hend,$idade,$idconv,$id;
return '
<html>
<head>
<title>convite_kidbeeruta_5w_lounge</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">     
<table id="Table_01" width="647" height="800" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td background="http://www.kidbeerutabuffet.com.br/convite/lounge/images/lounge_01.jpg" width="647" height="171" ><p style="color:#FFF; margin-left:250px; margin-top:125px; font-family:Verdana, Geneva, sans-serif; font-size:18px;"> '.utf8_decode($convidado).'</p>
			<!--[if gte mso 9]>
  <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:647px;height:171px;">
    <v:fill type="tile" src="http://www.kidbeerutabuffet.com.br/convite/lounge/images/lounge_01.jpg" color="#f39120" />
    <v:textbox inset="0,0,0,0">
  <![endif]-->
			</td>
	</tr>
	<tr>
		<td background ="http://www.kidbeerutabuffet.com.br/convite/lounge/images/lounge_02.jpg" width="647" height="110">
		<!--[if gte mso 9]>
  <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:647px;height:110px;">
    <v:fill type="tile" src="http://www.kidbeerutabuffet.com.br/convite/lounge/images/lounge_02.jpg" color="#f39120" />
    <v:textbox inset="0,0,0,0">
  <![endif]-->
        <p style="color:#FFF; margin-left:240px; margin-top:55px; font-family:Verdana, Geneva, sans-serif; font-size:18px;">  Festa da(o) '.$nome.'</p>
	  </td>
	</tr>
	<tr>
		<td background="http://www.kidbeerutabuffet.com.br/convite/lounge/images/lounge_03.jpg" width="647" height="109" >
		<!--[if gte mso 9]>
  <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:647px;height:109px;">
    <v:fill type="tile" src="http://www.kidbeerutabuffet.com.br/convite/lounge/images/lounge_03.jpg" color="#f39120" />
    <v:textbox inset="0,0,0,0">
  <![endif]-->
       <p style="color:#FFF; margin-left:240px; margin-top:55px; font-family:Verdana, Geneva, sans-serif; font-size:18px;"> '.$newdataniver.'</p>
			</td>
	</tr>
	<tr>
		<td background="http://www.kidbeerutabuffet.com.br/convite/lounge/images/lounge_04.jpg" width="647" height="109">
		<!--[if gte mso 9]>
  <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:647px;height:109px;">
    <v:fill type="tile" src="http://www.kidbeerutabuffet.com.br/convite/lounge/images/lounge_04.jpg" color="#f39120" />
    <v:textbox inset="0,0,0,0">
  <![endif]-->
        <p style="color:#FFF; margin-left:240px; margin-top:55px; font-family:Verdana, Geneva, sans-serif; font-size:18px;"> Kid Beeruta Lounge</p>
			</td>
	</tr>
	<tr>
		<td>
			<img src="http://www.kidbeerutabuffet.com.br/convite/lounge/images/lounge_05.jpg" alt="" width="647" height="301" usemap="#Map" border="0"></td>
	</tr>
</table>

<map name="Map">
  <area shape="rect" coords="509,130,542,167" href="http://www.kidbeerutabuffet.com.br/convite/confimar.php?id='.$idconv.'&idn='.$id.'">>
  <area shape="rect" coords="570,129,615,183" href="http://www.kidbeerutabuffet.com.br/convite/confimarn.php?id='.$idconv.'&idn='.$id.'">
  <area shape="rect" coords="212,277,412,295" href="http://www.kidbeeruta.com.br/mapa_jardim.swf" target="_blank">>
</map>
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
            
            $mail->Host = "smtp.kidbeerutabuffet.com.br"; // SMTP servers
			$mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticaÃƒÆ’Ã†'Ãƒâ€ 'ÃƒÆ’Ã¢â‚¬Â 'ÃƒÆ’Ã†'ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â§ÃƒÆ’Ã†'Ãƒâ€ 'ÃƒÆ’Ã¢â‚¬Â 'ÃƒÆ’Ã†'ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â£o
			$mail->Port = 587;
            $mail->Username = 'convite@kidbeerutabuffet.com.br'; // SMTP username
			$mail->Password = '@#Suporte'; // SMTP password
            $mail->Sender = ('convite@kidbeerutabuffet.com.br');
            $mail->From = ('convite@kidbeerutabuffet.com.br');
            $mail->FromName = $de;
            $mail->AddAddress ($para);
            $mail->AddReplyTo = ('convite@kidbeerutabuffet.com.br');
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
                echo 'Convite  enviado para: '. $para .' j enviado<br /></div>';
				 
            }



            }
 



 
     
?>