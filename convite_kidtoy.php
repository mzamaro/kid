<?php
session_start();
if(!isset($_SESSION['usuariosession']) AND !isset($_SESSION['senhasession'])){
	header("Location: ../admin/index.php");
	exit;
}
?>
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

echo'
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
			<img src="http://www.kidbeerutabuffet.com.br/convite/kidtoy/images/toy_01.jpg" width="127" height="415" alt=""></td>
		<td background="http://www.kidbeerutabuffet.com.br/convite/kidtoy/images/toy_02.jpg" width="349" height="415" >
			<p><font face="Tahoma, Geneva, sans-serif" size="4" color="#0066CC" style="margin-left:10px;" >Ol&aacute;, '.utf8_decode($convidado).'</font><br>
			  <font face="Tahoma, Geneva, sans-serif" size="4" color="#0066CC" style="margin-left:10px;" >Dia: '.$newdataniver.' </font><br>
			  <font face="Tahoma, Geneva, sans-serif" size="4" color="#0066CC" style="margin-left:10px;">Hora: '.$hinicio.' as '.$hend.'hrs </font><br>
			  <font face="Tahoma, Geneva, sans-serif" size="3" color="#0066CC" style="margin-left:10px;" >Venha comemorar meu anivers&aacute;rio</font><br>
     <font face="Tahoma, Geneva, sans-serif" size="3" color="#0066CC" style="margin-left:10px;" >de '.$idade.' anos </font><br>
  <font face="Tahoma, Geneva, sans-serif" size="3" color="#0066CC" style="margin-left:10px;" > no Kidbeeruta '.$unidade.'</font><br>
  <font face="Tahoma, Geneva, sans-serif" size="3" color="#0066CC"style="margin-left:10px;">Espero por voc&ecirc;!</font><br>
  <br>
<font face="Tahoma, Geneva, sans-serif" size="3" color="#0066CC" style="margin-left:10px;">'.utf8_encode($nome).'</font></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    </td>
		<td>
			<img src="http://www.kidbeerutabuffet.com.br/convite/kidtoy/images/toy_03.jpg" width="144" height="415" alt=""></td>
	</tr>

    <tr>
		<td colspan="3">
			<img src="http://www.kidbeerutabuffet.com.br/convite/'.$rotulo.'" alt=""  border="0" usemap="#Map" style="display:block;"></td>
	</tr>
</table>
</body>
</html>
<form action="" method="post" >
<div class="botao" align="center">
<input  type="submit" value="Enviar Convite" name="enviar" id="enviar" /><input type="button" value="Voltar" onClick="history.go(-1)">
</form>
</div>
';
if(isset($_POST['enviar'])){

header("location:envia_toy.php?idniver=".$id."");
}
	
?>
</body>
</html>
