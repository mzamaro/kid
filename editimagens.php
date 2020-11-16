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
                                	<div  class="titulo">Selecione a galeria para edição:</div>
                                    <div class="texto">
   <ul>                                                            
<li> &nbsp;&nbsp;&nbsp;&nbsp;<a href="edit_img.php?id=1" target="_self">Árabe</a></li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit_img.php?id=2" target="_self">Finger Food</a></li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit_img.php?id=3" target="_self">Coffee Breaks</a></li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit_img.php?id=4" target="_self">Cocktails</a></li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit_img.php?id=5" target="_self">Eventos</a></li>
<li>&nbsp;&nbsp;&nbsp;&nbsp;<a href="cadastro.php" target="_self">Voltar</a></li>
  </ul>
<div id="edicao"><a href="incluirfoto.php?id=1" target="_self">AdicionarFoto</a> <a href="incluirfoto.php?id=2" target="_self">AdicionarFoto</a><br /><a href="incluirfoto.php?id=3" target="_self">AdicionarFoto</a><br /><a href="incluirfoto.php?id=4" target="_self">AdicionarFoto</a><br /><a href="incluirfoto.php?id=5" target="_self">AdicionarFoto</a> </div>
                                  </div>
                                    
                                  	
                            
                                   
                          </div>
                                </div>
                                	
                        </div><!--fim da div Meio-->
                        		

</div><!--Termino da div Global-->
</body>
</html>