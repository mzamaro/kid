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
<link rel="stylesheet" href="../css/listar.css" type="text/css" />
<script src="fs.js" type="text/javascript"></script>
<script src="fsprint.js" type="text/javascript"></script>
<link href="imprime.css" media="screen" rel="stylesheet" />
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
                                	  <div class="texto">
   <p><strong>Lista de Clientes:</strong></p><br />
   <div id="conteudo">
      <?php
 $seleciona = mysql_query("SELECT * FROM cadastro")or die("Erro na consulta".mysql_error());
   if($seleciona == ''){
	   echo 'Nenhum Registro';
   }else{
	 while($res_id = mysql_fetch_assoc($seleciona)){
	$id            = $res_id['id'];	 
	$nome          = $res_id['nome'];
	$niver         = $res_id['niver'];
	$niver         = explode("-", $niver);
	$email         = $res_id['email'];	
    $telefone      = $res_id['telefoneres'];
	
	echo'
 <table width="580" border="0">
  <tr>
    <td >Nome:</td>
	<td >Data:</td>
    <td >E-mail:</td>
    <td >Telefone:</td> 
  </tr>
  <tr>
    <td width="180"><a href="resultado.php?id='.$id.'">'.$nome.'</a><br><br></td>
    <td width="180">'.$niver[2]."/".$niver[1]."/".$niver[0].'</td>
	<td width="180">'.$email.'</td>
	<td width="189">'.$telefone.'</td>
  </tr>
      </table><br>
'

   	   ;}}?> 
       </div>
 <INPUT TYPE="button" name="complete1" value="Voltar" style="margin-left:140px;" onClick="parent.location='cadastro.php'">
 <INPUT TYPE="button" name="imprimir" value="Imprimir" style="margin-left:50px;" onClick="javascript:imprime('conteudo')">
        </div>            </div>                                        	
</div>         
    
                </div><!--fim da div Meio-->               
                        
                           	
                      
                        		

</div><!--Termino da div Global-->
</body>
</html>