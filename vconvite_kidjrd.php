﻿<?php
session_start();
if(!isset($_SESSION['usuariosession']) AND !isset($_SESSION['senhasession'])){
	header("Location: ../admin/index.php");
	exit;
}
?>
<?php ob_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>kid Beeruta Convite Online</title>
<style type="text/css">
.botao input{margin-left:20px;}
</style>
</head>
<body>

<?php
include "conecta.php";
    $login = $_SESSION['usuariosession']; 
    $senha = $_SESSION['senhasession'] ;
		
	$seleciona = mysql_query("SELECT * FROM clientes WHERE email='$login ' AND senha='$senha'")or die("Erro na consulta".mysql_error());
  if($seleciona == ''){
	   echo 'Nenhum Registro';
   }else{
	 while($res_id = mysql_fetch_array($seleciona)){
	$id            = $res_id['idniver'];	 
	$nome          = $res_id['nomeniver'];
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
     
     $seleciona2 = mysql_query("SELECT * FROM unidade WHERE nome ='$unidade'")or die("Erro na consulta".mysql_error());

   if($seleciona2 == ''){
	   echo 'Nenhum Registro';
   }else{
	 while($linha = mysql_fetch_array($seleciona2)){
	$rotulo         = $linha['rotulo'];	 
		 
			
	 }}  
   //	global $nome,$sexo,$newdataniver,$hinicio,$hend,$idade,$unidade,$rotulo;
 echo'    
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
<td background="http://www.kidbeerutabuffet.com.br/convite/kidjrd/images/convite_kidbeeruta_jardim_02.jpg" bgcolor="#ccdc44" width="374" height="385" valign="top" style="display:block;">
  <!--[if gte mso 9]>
  <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:374px;height:385px;">
    <v:fill type="tile" src="http://www.kidbeerutabuffet.com.br/convite/kidjrd/images/convite_kidbeeruta_jardim_02.jpg" color="#ccdc44" />
    <v:textbox inset="0,0,0,0">
  <![endif]-->
<br><br><br><br><br>
 <div style="margin-left:40px;" align="center">
       <br>   
              '.utf8_decode($convidado).' <br>
		  Dia:  '.$newdataniver.' &agrave;s '.$hinicio.'hrs <br>
		  voc&ecirc; est&aacute; convidado para<br>
		  uma festa de pura divers&atilde;o.<br>
		  Venha comemorar o anivers&aacute;rio de '. $idade .
(($idade == '1') ?  ' ano':' anos') .
'

<br>	
        '.(($sexo == 'F') ? ' da':' do').' '.$nome.'	  <br>
          Ser&aacute; no Kidbeeruta Jardim<br>
em Santo Andr&eacute;.<br>
Sua presen&ccedil;a &eacute; muito importante para n&oacute;s.
 </div>           
  <!--[if gte mso 9]>
    </v:textbox>
  </v:rect>
  <![endif]-->
</td>
		<td>
			<img src="http://www.kidbeerutabuffet.com.br/convite/kidjrd/images/convite_kidbeeruta_jardim_03.jpg" style="display:block;" width="162" height="385" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="http://www.kidbeerutabuffet.com.br/convite/kidjrd/images/convite_kidbeeruta_jardim_04.jpg" style="display:block;" width="680" height="454" alt=""></td>
	</tr>
</table>

</body>
</html>
<form action="" method="post" >
<div class="botao" align="center">
<input  type="submit" value="Enviar Convite" name="enviar" id="enviar" /><input type="button" value="Voltar" onClick="history.go(-1)">
</form>
</div>';
if(isset($_POST['enviar'])){
header("location:convitejrd.php?idniver=".$id."");
}

?>

</body>
</html>
  