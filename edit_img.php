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
                                    <div  class="pginicial"><a href="editimagens.php" title="pagina inicial" >Página inicial</a></div>
   <p><strong>Imagens:</strong></p>
      <?php
  if(isset($_GET['id'])){
	 $id = intval($_GET['id']);
		$seleciona_img = mysql_query("SELECT * FROM fotos WHERE idalbum = '$id' ")or die("Erro ao selecionar as fotos".mysql_error());
   $count = mysql_num_rows($seleciona_img);
   if ($count == '') {
   	   echo '<div class="alert">Nenhum Registro</div>';
   }else{
	 while($res_id = mysql_fetch_assoc($seleciona_img)){
	$img    = $res_id['foto'];
	$desc   = $res_id['descricao'];	
    $idfoto   = $res_id['idfotos'];	;
	echo'<img src="../galeria/'.$img.'" width="120" height="90">';
	// <img src=\"galeria/$img"."".'_thumb.jpg'."\"	 
	echo'&nbsp;&nbsp;&nbsp;&nbsp;';
   echo'<div id="descricao">'.$desc.'</div>';
    echo'<div id="edicao">
	<a href="editarfoto.php?idalbum='.$id.'&amp;idfoto='.$idfoto.'">Editar</a>&nbsp;
  <a href="edit_img.php?idalbum='.$id.'&amp;idfoto='.$idfoto.'">Excluir</a>
  
  </div>';
   	   }}}?> 
   <?php if(isset($_GET['idfoto'])){
$idfoto = $_GET['idfoto'];
$query = "DELETE FROM fotos where idfotos = '$idfoto'";
mysql_query($query);
if ($query =='0'){
	echo'<div class="alert"> Erro ao atualizar! </div>';
	
	}else{
    echo'<div class="alert"> Imagem apagada com sucesso! <br><a href="editimagens.php" style="margin-left:50px;">Voltar</a> </div>';

	}	

}
?>
        </div>            </div>                                        	
</div>                         </div><!--fim da div Meio-->               
                        
                                
                                	
                      
                        		

</div><!--Termino da div Global-->
</body>
</html>