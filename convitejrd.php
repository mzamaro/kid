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
<html>
<head>
<title>convite_kidbeeruta_jardim</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table id="Table_01" width="680" height="839" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td>
			<img src="http://www.kidbeerutabuffet.com.br/convite/kidjrd/images/convite_kidbeeruta_jardim_01.jpg" style="display:block;" width="144" height="385" alt=""></td>
<td background="http://www.kidbeerutabuffet.com.br/convite/kidjrd/images/convite_kidbeeruta_jardim_02.jpg" bgcolor="#ccdc44" width="374" height="385" valign="top" align="center" style="display:block;">
  <!--[if gte mso 9]>
  <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:374px;height:385px;">
    <v:fill type="tile" src="http://www.kidbeerutabuffet.com.br/convite/kidjrd/images/convite_kidbeeruta_jardim_02.jpg" color="#ccdc44" />
    <v:textbox inset="0,0,0,0">
  <![endif]-->
<br><br><br><br><br>
<br>
<p style="font-weight:bold; text-align:center;">
              '.utf8_decode($convidado).' </p>
      <p style="text-align:center;">
		  Dia:  '.$newdataniver.' &agrave;s '.$hinicio.'hrs <br>
		  voc&ecirc; est&aacute; convidado para<br>
		  uma festa de pura divers&atilde;o.<br>
		  Venha comemorar o anivers&aacute;rio de '. $idade .
(($idade == '1') ?  ' ano':' anos') .
'
<br>	
          '.(($sexo == 'F') ? ' da':' do').' '.$nome.' <br>
          Ser&aacute; no Kidbeeruta <br>
em Jardim.<br>
Sua presen&ccedil;a &eacute; importante para n&oacute;s.       
  <!--[if gte mso 9]>
    </v:textbox>
  </v:rect>
  <![endif]-->
</p>
</td>
		<td>
			<img src="http://www.kidbeerutabuffet.com.br/convite/kidjrd/images/convite_kidbeeruta_jardim_03.jpg" style="display:block;" width="162" height="385" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="http://www.kidbeerutabuffet.com.br/convite/kidjrd/images/convite_kidbeeruta_jardim_04.jpg" alt="" width="680" height="454" usemap="#Map" style="display:block;" border="0"></td>
	</tr>
</table>


<map name="Map">
  <area shape="circle" coords="208,285,28" href="http://www.kidbeerutabuffet.com.br/convite/confimar.php?id='.$idconv.'&idn='.$id.'">
  <area shape="circle" coords="473,284,29" href="http://www.kidbeerutabuffet.com.br/convite/confimarn.php?id='.$idconv.'&idn='.$id.'">
  <area shape="rect" coords="239,421,445,440" href="http://www.kidbeeruta.com.br/mapa_jardim.swf" target="_blank">
</map>
<p style="text-align:center;">Caso n�o consiga visualizar o convite <a href="http://www.kidbeerutabuffet.com.br/convite/convitekjrd.php?id='.$idconv.'&idn='.$id.'" target="_blank">clique aqui!</a></p>

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
            @mysql_query("UPDATE ". $tabela ." SET codStatus = '0', enviado = '1' WHERE idniver= ".$id."");
 
             
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