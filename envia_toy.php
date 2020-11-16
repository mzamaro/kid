
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
			$hinicio  =  $res_id['horaini'];
		    $hend     =  $res_id['horaend'];
		    $idade    =  $res_id['idade'];
			$unidade  =  $res_id['unidade'];
	 }}              
     
     $seleciona2 = mysql_query("SELECT * FROM unidade WHERE nome ='$unidade'")or die("Erro na consulta".mysql_error());

   if($seleciona2 == ''){
	   echo 'Nenhum Registro';
   }else{
	 while($linha = mysql_fetch_array($seleciona2)){
	$rotulo         = $linha['rotulo'];	 
		 
			
	 }}  
   	
   function html($convidado){
   global $nome,$newdataniver,$hinicio,$hend,$idade,$unidade,$rotulo;
   return 
   
'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Convite Kidbeeruta</title>
<style type="text/css">
v\:* { behavior: url(#default#VML); display:inline-block}
</style>
</head>
<body>

<table id="Table_01" width="620" height="415" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td>
			<img src="http://www.kidbeerutabuffet.com.br/convite/kidtoy/images/toy_01.jpg" width="127" height="415" alt="" style="display:block;"></td>
		<td background="http://www.kidbeerutabuffet.com.br/convite/kidtoy/images/toy_02.jpg" width="349" height="415" >
			 <!--[if gte vml 1]>
          <v:shape 
								stroked=f
								style= position:absolute;			
										z-index:-1;
										visibility:visible;
										width:349px; 
										height:415px;			
										top:0;
										left:0;
										border:0;>
								<v:imagedata src="http://www.kidbeerutabuffet.com.br/convite/kidtoy/images/toy_02.jpg" />
							</v:shape>
							<![endif]-->
		
			<p><font face="Tahoma, Geneva, sans-serif" size="4" color="#0066CC" style="margin-left:10px;" >Ol&aacute;, '.utf8_decode($convidado).'</font><br>
			  <font face="Tahoma, Geneva, sans-serif" size="4" color="#0066CC" style="margin-left:10px;" >Dia: '.$newdataniver.' </font><br>
			  <font face="Tahoma, Geneva, sans-serif" size="4" color="#0066CC" style="margin-left:10px;">Hora: '.$hinicio.' as '.$hend.'hrs </font><br>
			  <font face="Tahoma, Geneva, sans-serif" size="3" color="#0066CC" style="margin-left:10px;" >Venha comemorar meu anivers&aacute;rio</font><br>
     <font face="Tahoma, Geneva, sans-serif" size="3" color="#0066CC" style="margin-left:10px;" >de '.$idade.' anos </font><br>
  <font face="Tahoma, Geneva, sans-serif" size="3" color="#0066CC" style="margin-left:10px;" > no Kidbeeruta '.$unidade.'</font><br>
  <font face="Tahoma, Geneva, sans-serif" size="3" color="#0066CC"style="margin-left:10px;">Espero por voc&ecirc;!</font><br>
  <br>
<font face="Tahoma, Geneva, sans-serif" size="3" color="#0066CC" style="margin-left:10px;">'.$nome.'</font></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    </td>
		<td>
			<img src="http://www.kidbeerutabuffet.com.br/convite/kidtoy/images/toy_03.jpg" width="144" height="415" alt="" style="display:block;"></td>
	</tr>

    <tr>
		<td colspan="3">
			<img src="http://www.kidbeerutabuffet.com.br/convite/'.$rotulo.'" alt=""  border="0" usemap="#Map" style="display:block;"></td>
	</tr>
</table>
<map name="Map" id="Map">
  <area shape="rect" coords="77,161,244,187" href="http://www.kidbeerutabuffet.com.br/convite/confimar.php?id='.$idconv.'" />
  <area shape="rect" coords="404,160,548,191" href="http://www.kidbeerutabuffet.com.br/convite/confimarn.php?id='.$idconv.'" />
  <area shape="rect" coords="296,226,390,251" href="http://www.kidbeeruta.com.br/mapa_jardim.swf" target="_blank" />
</map>
</body>
</html>
'; }
            $tabela = "contatos";
 
       // CAMPOS UTILIZADOS PARA A CONSULTA
        $campos = "id, idniver, nome, email, codStatus";
 
          // NUMERO MÃƒÆ'Ã†'Ãƒâ€šÃ‚ÂXIMO DE ENVIO
       $quant = 3;
 
            // TEMPO ENTRE UM PROCESSO DE ENVIO E OUTRO
         $seg = 5;
 
        
 
            // RESGATA O VALOR DA GLOBAL INICIO
            $inicio = $_GET["inicio"];
 
            // ATRIBUI O RESULTADO DA SOMA ENTRE INICIO E QUANT
          $fim = $inicio + $quant;
 
            // VERIFICA SE FOI ATRIBUIDO VALOR A VARIAVEL "INICIO"
           if($inicio == ""){
 
            // ATRIBUI O VALOR 0 CASO NÃƒÆ'Ã†'Ãƒâ€ 'O EXISTA VALOR ATRIBUIDO
            $inicio = 0;
           }else{
 
            // ATRIBUI O VALOR DA GLOBAL INICIO CASO JA EXISTA VALOR ATRIBUIDO
            $inicio = $_GET["inicio"];
            }
 
            // EXECUTA A CONSULTA OU INFORMA UM ERRO CASO OCORRA
         $sql = mysql_query("SELECT ". $campos ." FROM ". $tabela ." WHERE idniver = ".$id." AND codStatus = 0 LIMIT ". $inicio .",". $quant)or die(mysql_error());
 
            // VERIFICA SE AINDA EXISTEM EMAILS A SEREM ENVIADOS
           if(mysql_num_rows($sql) == 0){
 
            // ALTERANDO O VALOR DO CAMPO CODSTATUS PARA 0
            @mysql_query("UPDATE ". $tabela ." SET codStatus = 0 WHERE idniver= ".$id."");
 
            // INFORMO O TÃƒÆ'Ã†'ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â°RMINO DO PROCESSO
              echo("<script type='text/javascript'> alert('Convites enviados com sucesso !!!'
); location.href='convitec.php';</script>");
}else{
 
            // CONTINUA EFETUANDO O ENVIO
            header("refresh:".$seg.";URL=?inicio=".$fim."&idniver=".$id."");
             
            }
            echo "Enviando os convites aguarde o fim do processo <br>";
            // CRIA O LAÃƒÆ'Ã†'ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â¡O REPETITIVO
           while($r = mysql_fetch_array($sql)){
 
            // ADICIONAMOS OS PADRÃƒÆ'Ã†'ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â¢ES DE DESTINATRIO
            
            $para      = $r["email"];
            $fulano    = $r["nome"];
             $fulano = utf8_decode($fulano);

            //Criando a classe PHPMailer para envio de newsletter
 
            $mail = new PHPMailer();
			$mail->IsSMTP = ('smtp');
            $mail->Mailer = ('mail');
            $mail->SMTPSecure = 'ssl';
            
            $mail->Host = "smtp.kidbeerutabuffet.com.br"; // SMTP servers
			$mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticaÃƒÆ'Ã†'Ãƒâ€ 'ÃƒÆ'Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â§ÃƒÆ'Ã†'Ãƒâ€ 'ÃƒÆ'Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â£o
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
              
            echo ' <p>Convite enviado para:'. $para .'Ok </p> </div>';
 
              
                //Altero o cÃƒÆ'Ã†'Ãƒâ€šÃ‚Â³digo para 1 para parar o envio do loop
 
                @mysql_query("UPDATE". $tabela ."SET codStatus = 1");
 
            } else {
                echo ' <p>Convite não enviado para:'. $para .'</p></div>';
				 
            }
            }
 



 
     
?>