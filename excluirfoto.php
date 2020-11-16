<?php
session_start();
if(!isset($_SESSION['usuariosession']) AND !isset($_SESSION['senhasession'])){
	header("Location: index.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bia &amp; Sylvia Administrativo</title>
<link rel="stylesheet" href="../css/editimg.css" type="text/css" />





</head>

<body>
<?php
include_once("conecta.php");
    $login = $_SESSION['usuariosession']; 
    $senha = $_SESSION['senhasession'] ;
	$sql = mysql_query("SELECT * FROM admin WHERE login='$login ' AND senha='$senha'");
	while($linha = mysql_fetch_array($sql)){
		$nome = $linha['nome'];
	}
?>
<!--inicio da div Global-->
<?php if(isset($_POST['editar'])){
$file = $_FILES['arquivo'];
$filename = $file['name'];
$idfoto = $_POST['idfoto'];
$desc = $_POST['desc'];
$query = "DELETE From fotos foto = '$filename' , descricao = '$desc' where idfotos ='$idfoto'";
mysql_query($query);
if ($query =='0'){
	echo'<div id="alert"> Erro ao atualizar! </div>';
	
	}else{
    echo'<div id="alert"> Imagem apagada com sucesso! </div>';
	}
$path     = $file['tmp_name'];
$new_path = "../galeria/".$file['name'];

move_uploaded_file($path, $new_path);
	
}?>

<div id="global">
	  <!--inicio da div topo--><div id="topo">
            	<div id="logomarca">
          <a href="index.php" title="Bia & Sylvia Gastronomia"><img src="../img_layout/logomarca.png" alt="Bia & Sylvia Gastronomia" border="0" /></a></div>
                	<div id="menu_h" align="center">
                    <ul>
                    <?php echo 'Seja Bem Vindo(a) &nbsp;&nbsp;'.$nome; ?> 	
                    </ul>
                    </div>
   	  <div id="localizacao">
                        <div id="loc_desc">
        <img src="../images/endereco.jpg" width="221" height="59" /></div>
              </div>
            </div><!--Fim da div topo-->
            			<!--inicio da div Banner--><div id="banner">
                        <img src="../img_layout/clientes_tarja.jpg" alt="Banner" />
</div><!--Fim da div Banner-->
                        <!--inicio da div Meio--><div id="meio">
                        	
                       	  <div id="col_meio">
                                	<div  class="titulo">Selecione a imagem para edi&ccedil;&atilde;o:</div>
                                    <div class="texto">
   <p><strong>Imagens:</strong></p>
      <?php
  if(isset($_GET['idfoto'])){
	 $idfoto = intval($_GET['idfoto']);
     //$idfoto = ($_GET['idfotos']);
		$seleciona_img = mysql_query("SELECT * FROM fotos WHERE idfotos = '$idfoto' ")or die("Erro ao selecionar as fotos".mysql_error());
   if($seleciona_img == ''){
	   echo 'Nenhum Registro';
   }else{
	 while($res_id = mysql_fetch_assoc($seleciona_img)){
	$img    = $res_id['foto'];
	$desc   = $res_id['descricao'];	
    $idfoto   = $res_id['idfotos'];	; 
	
	echo'<img src="../galeria/'.$img.'" width="120" height="90">';
	?>
    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
    <input name="idfoto" type="hidden" value="<?php echo $idfoto;?>"/>
	<input name="arquivo" type="file" value="<?php echo $img; ?>"/>
    <br />
        <br />
    <textarea name="desc" id="desc" cols="45" rows="5"><?php echo $desc;}}}?></textarea>
    <br />
    <input name="editar" id="editar" type="submit" value="Apagar" />
    </form>
  
   
        </div>            </div>                                        	
</div>                         </div><!--fim da div Meio-->               
                        
                                
                                	
                      
                        		

</div><!--Termino da div Global-->
</body>
</html>