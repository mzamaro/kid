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
<link rel="stylesheet" href="../css/adm.css" type="text/css" />
<script src="fs.js" type="text/javascript"></script>
<script src="fsprint.js" type="text/javascript"></script>
<link href="imprime.css" media="screen" rel="stylesheet" />
    <script type="text/javascript">
function submitform()
{
    document.forms["form1"].submit();
}

    </script>



</head>

<body>
<?php
include "conecta.php";
    $login = $_SESSION['usuariosession']; 
    $senha = $_SESSION['senhasession'] ;
	$sql = mysql_query("SELECT * FROM admin WHERE login='$login ' AND senha='$senha'");
	while($linha = mysql_fetch_array($sql)){
		$nome = $linha['nome'];
	}
?>
<!--inicio da div Global--><div id="global">
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
                        	<div id="col_esc">
                            	
                                	<div id="esc_img"></div>
                            </div>
                            	<div id="col_meio">
                                	<div  class="titulo">Consulta de Clientes:</div>
                                    <div  class="pginicial"><a href="cadastro.php" title="pagina inicial">Página inicial</a></div>
                                    <div class="texto">
   <ul>

                                         
<form name="form1" id="form1" action="" method="post" >
<label>Digite o nome ou mês de aniversário(número):</label>
<input type="text" style="display: none;" disabled="disabled" size="1" />
<input name="busca" id="busca" type="text" >
<input name="buscar" id="buscar" type="submit"  value="Buscar" />
</form>
     </ul>
     <br />
     Resultado:
     <br />
     <br />
     <div id="conteudo">
     <?php  
   include_once("conecta.php");
    if(isset($_POST['buscar'])){   
   $search = $_POST['busca'];
   $seleciona = mysql_query("SELECT * FROM cadastro WHERE nome like '%$search%' OR month(niver) = '$search' OR opcao like '%$search%' ORDER BY id ASC")or die("Erro ao buscar".mysql_error());
   $count = mysql_num_rows($seleciona);
   if ($count == '') {
    echo '<div id="alert">Nenhum resultado!</div>';
} else {
	
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
 ;} } }  ?>    

     </div> 
      <INPUT TYPE="button" name="complete1" value="Voltar" style="margin-left:140px;" onClick="parent.location='cadastro.php'">
      <INPUT TYPE="button" name="imprimir" value="Imprimir" style="margin-left:50px;" onClick="javascript:imprime('conteudo')">

                                  </div>
          
                                  	
                            
                                   
                          </div>
                                </div>
                                	
                        </div><!--fim da div Meio-->
                        		

</div><!--Termino da div Global-->
</body>
</html>