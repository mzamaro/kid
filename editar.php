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
<title>Edi&ccedil;&atilde;o de texto</title>
<!-- TinyMCE -->
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript"
   src="tinymce/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
    language : "pt",
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
theme_advanced_buttons1:
"code,bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,cleanup,link,unlink,image,table,formatselect,fontselect,fontsizeselect,forecolor,backcolor,bullist,numlist,fullscreen",

		// Theme options
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_buttons4 : "",


		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
	 content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
    file_browser_callback : "tinyBrowser",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
</head>
<?php
 include_once("conecta.php");
 ?>
<body>
<?php if(isset($_POST['editar'])){
	$texto1 = $_POST['texto1'];
	$texto2 = $_POST['texto2'];
	$texto3 = $_POST['texto3'];
	$atualiza = mysql_query("UPDATE pagina1 SET sabemos = '$texto1' , eventos = '$texto2' , procedimento = '$texto3' ");
    if ($atualiza =='0'){
		echo 'Erro ao atualizar';
	}else{
    echo 'Textos Atualizados com Sucesso!<br>';
	}
}?>
<strong>Edi&ccedil;&atilde;o da P&aacute;gina O que Fazemos </strong>
<div id="central" align="center">
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <p><strong>Sabemos e realizamos o que voc&ecirc;, cliente, quer:</strong></p>
   <?php
 
  $id = $_GET['id'];
   $seleciona_texto = mysql_query("SELECT * FROM pagina1 WHERE id = '1'")or die("Erro ao selecionar as fotos".mysql_error());
   if($seleciona_texto == ''){
	   echo 'Nenhum Registro';
   }else{
	 while($res_id = mysql_fetch_array($seleciona_texto)){
	$sabemos = $res_id['sabemos'];
	$eventos = $res_id['eventos'];
	$procedimento = $res_id['procedimento'];	   
	 }
  ?>
    <textarea name="texto1" id="texto1" cols="45" rows="5"><?php echo $sabemos;?>
    </textarea>
   <p><strong>Tipos de Eventos:</strong></p>
  <p>
    <label>
      <textarea name="texto2" id="texto2" cols="45" rows="5"><?php echo $eventos;?>
      </textarea>
    </label>
  </p>
  <p><strong>Procedimentos</strong>:</p>
  <p>
    <label>
      <textarea name="texto3" id="texto3" cols="45" rows="5"><?php echo $procedimento;}?>
         </textarea>
    </label>
  </p>
  <p>&nbsp;</p>
  <p>
       <input type="submit" name="editar" id="editar" value="Editar" />&nbsp;&nbsp;
       <input type="button" onclick="javascript:history.back()" value="Voltar"> 
     </p>
</form>
</div>
</body>
</html>