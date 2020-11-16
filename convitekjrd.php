
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
include_once("conecta.php");
    $idn  =  $_GET['idn'];

	$seleciona = mysql_query("SELECT * FROM clientes WHERE idniver = '$idn'")or die("Erro na consulta".mysql_error());
  if($seleciona == ''){
	   echo 'Nenhum Registro';
   }else{
	 while($res_id = mysql_fetch_array($seleciona)){
	$id            = $res_id['idniver'];	 
	$nome          = $res_id['nomeniver'];
	$dataniver     = $res_id['datafesta'];
	$sexo          = $res_id['sexo'];  
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
   //	global $nome,$newdataniver,$hinicio,$hend,$idade,$unidade,$rotulo;
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
<map name="Map">
  <area shape="circle" coords="208,285,28" href="http://www.kidbeerutabuffet.com.br/convite/confimar.php?id='.$idconv.'&idn='.$id.'">
  <area shape="circle" coords="473,284,29" href="http://www.kidbeerutabuffet.com.br/convite/confimarn.php?id='.$idconv.'&idn='.$id.'">
  <area shape="rect" coords="239,421,445,440" href="http://www.kidbeeruta.com.br/mapa_jardim.swf" target="_blank">
</map>

</body>
</html>';


?>

</body>
</html>
  