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
   //	global $nome,$newdataniver,$hinicio,$hend,$idade,$unidade,$rotulo;
 echo'    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Convite Kidbeeruta</title>

</head>
<body>
<table id="Table_01" width="620" height="675" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td>
			<img src="http://www.kidbeerutabuffet.com.br/convite/kidsa/images/kidsa_01.jpg" width="299" height="408" alt="" style="display:block;"></td>
		<td background="http://www.kidbeerutabuffet.com.br/convite/kidsa/images/kidsa_02.jpg" width="321" height="408" >
         <!--[if gte vml 1]>
          <v:shape 
								stroked=f
								style= position:absolute;			
										z-index:-1;
										visibility:visible;
										width:321px; 
										height:408px;			
										top:0;
										left:0;
										border:0;>
								<v:imagedata src="http://www.kidbeerutabuffet.com.br/convite/kidsa/images/kidsa_02.jpg"/>
							</v:shape>
							<![endif]-->
        <font face="Tahoma, Geneva, sans-serif" size="4" color="#000000" style="margin-left:5px;" >Ol&aacute;, '.utf8_decode($convidado).'</font><br>
            <br>
            <font face="Tahoma, Geneva, sans-serif" size="4" color="#000000" style="margin-left:5px;" >Dia: '.$newdataniver.' </font> <br>
            <br>
            <font face="Tahoma, Geneva, sans-serif" size="4" color="#000000" style="margin-left:5px;">Hora: '.$hinicio.' as '.$hend.'hrs </font><br>
            <br>
            			';
			if ($idade == '1') {
echo '<font face="Tahoma, Geneva, sans-serif" size="3" color="#000000" style="margin-left:5px;" >Venha comemorar meu anivers&aacute;rio de <br>
'.$idade.' ano no Kidbeeruta '.$unidade.'</font> <br>';
}else{
echo '<font face="Tahoma, Geneva, sans-serif" size="3" color="#000000" style="margin-left:5px;" >Venha comemorar meu anivers&aacute;rio de <br>
'.$idade.' anos no Kidbeeruta '.$unidade.'</font> <br>';
}
echo '
<br>
<font face="Tahoma, Geneva, sans-serif" size="3" color="#000000" style="margin-left:5px;">Espero por voc&ecirc;!</font><br>
<br>
<font face="Tahoma, Geneva, sans-serif" size="3" color="#000000" style="margin-left:5px;">'.utf8_encode($nome).'</font></td>
			</td>
	</tr>
		  
	<tr>
		<td colspan="2">
			<img src="http://www.kidbeerutabuffet.com.br/convite/'.$rotulo.'"  border="0" usemap="#Map" style="display:block;"></td>
	</tr>
</table>

</body>
</html>

</body>
</html>
<form action="" method="post" >
<div class="botao" align="center">
<input  type="submit" value="Enviar Convite" name="enviar" id="enviar" /><input type="button" value="Voltar" onClick="history.go(-1)">
</form>
</div>';
if(isset($_POST['enviar'])){
header("location:conv.php?idniver=".$id."");
}

?>

</body>
</html>
  