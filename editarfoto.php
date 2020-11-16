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
<script type="text/javascript">
function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}
</script>




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
if($_FILES['arquivo']['size'] > 0 ){ # a imgem foi postada	
$file = $_FILES['arquivo'];
$filename = $file['name'];
}else{
$filename = $_POST['imagem'];
}
$idfoto = $_POST['idfoto'];
$desc = $_POST['desc'];
$query = "UPDATE fotos set foto = '$filename' , descricao = '$desc' where idfotos ='$idfoto'";
mysql_query($query);
if ($query =='0'){
	echo'<div class="alert"> Erro ao atualizar! </div>';
	
	}else{
    echo'<div class="alert"> Imagem atualizada com sucesso! </div>';
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
    $idfoto   = $res_id['idfotos'];	
	$idalbum = $res_id['idalbum'];
	
	echo'<img src="../galeria/'.$img.'" width="120" height="90">';
	?>
    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
    <input name="idfoto" type="hidden" value="<?php echo $idfoto;?>"/>
    <input name="imagem" type="hidden" value="<?php echo $img;?>"/>
	<input name="arquivo" type="file" value="<?php echo $img;?>"/>
    <br />
       <br />
    <textarea name="desc" id="desc" cols="45" rows="5" maxlength="90" onkeyup="return ismaxlength(this)"><?php echo $desc;}}}?></textarea>
    max: 90 caracteres
    <br />
    <input name="editar" id="editar" type="submit" value="Editar" />
    <INPUT TYPE="button" name="complete1" value="Voltar" onClick="parent.location='edit_img.php?id=<?php echo $idalbum;?>'">
    </form>
  
   
        </div>            </div>                                        	
</div>                         </div><!--fim da div Meio-->               
                        
                                
                                	
                      
                        		

</div><!--Termino da div Global-->
</body>
</html>