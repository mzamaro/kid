<?php
session_start();
if(!isset($_SESSION['usuariosession']) AND !isset($_SESSION['senhasession'])){
	header("Location: ../convite/index.php");
	exit;
}
?>
<html>
<head>
<title>convite_kidbeeruta_5w_lounge</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
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
echo'	
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
<form action="" method="post" >
<div class="botao" align="center">
<input  type="submit" value="Enviar Convite" name="enviar" id="enviar" /><input type="button" value="Voltar" onClick="history.go(-1)">
</form>
</div>';
if(isset($_POST['enviar'])){
header("location:envia_kidlounge.php?idniver=".$id."");
}

?>

</body>
</html>