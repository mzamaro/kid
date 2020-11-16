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
			<img src="http://www.kidbeerutabuffet.com.br/convite/kidcampo/images/kidcampo_01.jpg" width="297" height="401" alt="" style="display:block;"></td>
		<td background="http://www.kidbeerutabuffet.com.br/convite/kidcampo/images/kidcampo_02.jpg" width="323" height="401">
			 <!--[if gte vml 1]>
          <v:shape 
								stroked=f
								style= position:absolute;			
										z-index:-1;
										visibility:visible;
										width:323px; 
										height:401px;			
										top:0;
										left:0;
										border:0;>
								<v:imagedata src="http://www.kidbeerutabuffet.com.br/convite/kidcampo/images/kidcampo_02.jpg"/>
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
<font face="Tahoma, Geneva, sans-serif" size="3" color="#000000" style="margin-left:5px;">'.utf8_encode($nome).'</font>                            
            </td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="http://www.kidbeerutabuffet.com.br/convite/'.$rotulo.'" border="0" usemap="#Map" style="display:block;"></td>
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
header("location:envia_sbc.php?idniver=".$id."");
}
				  
/*	function normaliza($string){

        $url = $string;
        $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
        $url = trim($url, "-");
        $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
        $url = strtolower($url);
        $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
        return $url;
}
if(isset($_POST['enviar'])){
$dataniver = (wordwrap($_POST['dataniver'], 35, "\n", 1));
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$horaini = $_POST['horaini'];
$horafim = $_POST['horaend'];
$_arquivo = normaliza($nome.$dataniver). ".jpg";
$_dir = "";
// Criamos uma imagem de 400x120 Pixels
$imagem = imagecreatefromjpeg("http://www.kidbeerutabuffet.com.br/convite/kidsbc.jpg");
// Quando utilizamos o imagecolorallocate() pela primeira vez, ele assume essa cor como fundo da imagem, ou seja o background
$fundo = imagecolorallocate($imagem, 166, 0, 0);
// Definimos aqui a cor do Texto, lembrando que as cores são especificadas em padrao RBG
$texto = imagecolorallocate($imagem, 80, 40, 1);
// Com o comando imagestring() escrevemos os textos, neste comando especificamos os parametros da imagem, o tamanho da fonte que neste caso vai de 1 a 5, a posição X e Y, o texto, e a cor (que definimos acima)
imagettftext($imagem, 16, 0,350, 350, $texto, "font/HelvNeu37ThiCon.ttf", $nome);
imagettftext($imagem, 16, 0, 330, 280, $texto, "font/trebucbd.ttf", $idade);
imagettftext($imagem,24, 0, 350, 205, $texto, "font/HelvNeu37ThiCon.ttf", $horaini);
imagettftext($imagem,24, 0, 470, 205, $texto, "font/HelvNeu37ThiCon.ttf", $horafim);
imagettftext($imagem, 24, 0, 390, 150, $texto, "font/HelvNeu37ThiCon.ttf", $dataniver);
// Neste caso como utlizamos o JPG, usamos o comando imagejpeg() especificando a imagem em questão, e a qualidade de compactação do JPG. Se for utilizar GIF substitua pelo comando imagegif($imagem), e se for PNG pelo imagepng($imagem)
$_dir = "convite/". $_arquivo;
				
imagejpeg( $imagem, $_dir, 80 );

// Limpamos a memória utilizada
imagedestroy($imagem);

header("location:$_dir");
//header("location:conv.php?imagem=$_dir&nome=$nome");

}*/
?>

</body>
</html>
  