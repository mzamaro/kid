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

<table id="Table_01" width="620" height="465" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td >
			<img src="http://www.kidbeerutabuffet.com.br/convite/kidprincess/images/kidprincesas_01.jpg" width="46" height="465" alt=""></td>
		<td background="http://www.kidbeerutabuffet.com.br/convite/kidprincess/images/kidprincesas_02.jpg" width="219" height="465">
			<font face="Tahoma, Geneva, sans-serif" size="3" color="#FF0099" style="margin-left:20px;" >Ol&aacute;, '.utf8_decode($convidado).'</font><br>
            <font face="Tahoma, Geneva, sans-serif" size="3" color="#FF0099" style="margin-left:10px;" >Dia: '.$newdataniver.' </font><br>
           <p> <font face="Tahoma, Geneva, sans-serif" size="2" color="#FF0099" style="margin-left:10px;">Hora: '.$hinicio.' as '.$hend.'hrs </font></p>
';
if ($idade == '1') {
echo '
		  <font face="Tahoma, Geneva, sans-serif" size="3" color="#FF0099" style="margin-left:10px;" >Venha comemorar meu anivers&aacute;rio de 
'.$idade.' ano </font><br><font face="Tahoma, Geneva, sans-serif" size="2" color="#FF0099" style="margin-left:5px;" > no Kidbeeruta '.$unidade.'</font><br>';
}else{
echo '
		  <font face="Tahoma, Geneva, sans-serif" size="3" color="#FF0099" style="margin-left:10px;" >Venha comemorar meu anivers&aacute;rio de 
'.$idade.' anos </font><br><font face="Tahoma, Geneva, sans-serif" size="2" color="#FF0099" style="margin-left:5px;" > no Kidbeeruta '.$unidade.'</font><br>';
}
echo '

<p><font face="Tahoma, Geneva, sans-serif" size="3" color="#FF0099"style="margin-left:10px;">Espero por voc&ecirc;!</font></p>
<font face="Tahoma, Geneva, sans-serif" size="3" color="#FF0099" style="margin-left:30px;">'.utf8_encode($nome).'</font>     
            </td>
		<td>
			<img src="http://www.kidbeerutabuffet.com.br/convite/kidprincess/images/kidprincesas_03.jpg" width="355" height="465" alt=""></td>
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

header("location:envia_princess.php?idniver=".$id."");
}
	
?>
</body>
</html>
