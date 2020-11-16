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
<link rel="stylesheet" href="../css/result.css" type="text/css" />
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
   <p><strong>Cadastro de:</strong></p><br />
   <div  class="pginicial"><a href="cadastro.php" title="pagina inicial">Página inicial</a></div>
   	  <?php
  if(isset($_GET['id'])){
	 $id = intval($_GET['id']);
		$resultado = mysql_query("SELECT * FROM cadastro WHERE id = '$id' ")or die("Erro na consulta".mysql_error());
   if($resultado == ''){
	   echo 'Nenhum Registro';
   }else{
	 while($res_id = mysql_fetch_assoc($resultado)){
	$nome          = $res_id['nome'];
	$email         = $res_id['email'];	
    $telefoneres   = $res_id['telefoneres'];
	$telefonecom   = $res_id['telefonecom'];
	$celular       = $res_id['celular'];
	$niver         = $res_id['niver'];
	$niver         = explode("-", $niver);
	$endereco      = $res_id['endereco'];
	$bairro        = $res_id['bairro'];
	$cidade        = $res_id['cidade'];
	$estado        = $res_id['estado'];
	$cep           = $res_id['cep'];
	$opcao         = $res_id['opcao'];
	$msg           = $res_id['msg'];

    $nome = utf8_decode($nome);
    $endereco = utf8_decode($endereco);
    $cidade = utf8_decode($cidade);
       
echo' <div id="conteudo">
 <table width="256" border="0">
  <tr>
    <td width="113">Nome:</td>
    <td width="86">'.$nome.'</td>
  </tr>
  <tr>
    <td>E-mail:</td>
    <td>'.$email.'</td>
  </tr>
  <tr>
    <td>Telefone-Res:</td>
    <td>'.$telefoneres.'</td>
  </tr>
  <tr>
    <td>Telefone-Com:</td>
    <td>'.$telefonecom.'</td>
  </tr>
  <tr>
    <td>Celular:</td>
    <td>'.$celular.'</td>
  </tr>
  <tr>
    <td>Aniversário:</td>
    <td>'.$niver[2]."/".$niver[1]."/".$niver[0].'</td>
  </tr>
  <tr>
    <td>Endereço:</td>
    <td>'.$endereco.'</td>
  </tr>
  <tr>
    <td>Bairro:</td>
    <td>'.$bairro.'</td>
  </tr>
  <tr>
    <td>Cidade:</td>
    <td>'.$cidade.'</td>
  </tr>
  <tr>
    <td>Estado:</td>
    <td>'.$estado.'</td>
  </tr>
  <tr>
    <td>Cep:</td>
    <td>'.$cep.'</td>
  </tr>
  <tr>
    <td>Evento:</td>
    <td>'.$opcao.'</td>
  </tr>
  <tr>
    <td>Observação:</td>
    <td>'.$msg.'</td>
  </tr>
</table><br>
</div>';
echo'<a href="excluir.php?id='.$id.'" style="margin-left:30px;">Excluir</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'<a href="alterar.php?id='.$id.'">Alterar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
   	   }}}?> 
<a href="javascript:void(0)" onClick="javascript:imprime('conteudo')">Imprimir</a>

        </div>            </div>                                        	
</div>         
    
                </div><!--fim da div Meio-->               
                        
                           	
                      
                        		

</div><!--Termino da div Global-->
</body>
</html>