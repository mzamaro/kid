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
   //	global $nome,$newdataniver,$hinicio,$hend,$idade,$unidade,$rotulo;
 echo'    
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
  	<td align="center"><font face="Arial, Helvetica, sans-serif" size="-1" color="#625702">Caso não consiga visualizar esta mensagem, <a href="">utilize este link para visualizar no navegador</a>.</font></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
  </tr>
  <tr>
    <td><img src="http://www.kidbeerutabuffet.com.br/convite/kidjardim/header.jpg" width="720" height="131" style="display:block"/></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#dbebaa"><font face="Arial, Helvetica, sans-serif" size="+3" color="#625702"> '.utf8_decode($convidado).' <br />
    Chegou o meu aniversário!</font></td>
  </tr>
 
  <tr>
    <td align="center" bgcolor="#dbebaa"><br />
     <font color="#625702" size="+2" face="Arial, Helvetica, sans-serif">     Você esta convidado para uma festa de pura diversão</font><br />
     <br />
    <font color="#625702" size="+2" face="Arial, Helvetica, sans-serif"> Dia:  '.$newdataniver.' &agrave;s '.$hinicio.'hrs <br />
    Venha comemorar meu aniversário de '. $idade .
(($idade == '1') ?  ' ano':' anos') .
'</font><br />
    <font color="#625702" size="+2" face="Arial, Helvetica, sans-serif">Será no Kid beeruta Jardim em Santo André </font><br /><br />
        
    <font face="Arial, Helvetica, sans-serif" size="+2" color="#625702">aguardo a sua presença<br /></font><br />
    <font color="#625702" size="+2" face="Arial, Helvetica, sans-serif">'.$nome.'</font></td>
  </tr>
  <tr>
    <td bgcolor="#dbebaa"><img src="http://www.kidbeerutabuffet.com.br/convite/kidjardim/footer.jpg" width="720" height="206" alt="kidbeeruta" style="display:block" /></td>
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
<form action="" method="post" >
<div class="botao" align="center">
<input  type="submit" value="Enviar Convite" name="enviar" id="enviar" /><input type="button" value="Voltar" onClick="history.go(-1)">
</form>
</div>';
if(isset($_POST['enviar'])){
header("location:envia_kidjardim.php?idniver=".$id."");
}

?>

</body>
</html>
  
         