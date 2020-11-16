
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bia & Sylvia Gastronomia</title>
<link rel="stylesheet" href="../css/cadastro.css" type="text/css" />
<style type="text/css">
#alert2 {
		left:521px;
	top:330px;
	width:400px;
	height:24px;
	z-index:1;
}
body {font:13px segoe ui;}

#label {width:100px; height:25px; float:left; padding-top:8px;}

#form input {margin:6px;}

#right {
	position:absolute;
	display: block;
	float:right;
	
	
}
</style>
<script>
function dateMask(inputData, e){
if(document.all) // Internet Explorer
var tecla = event.keyCode;
else //Outros Browsers
var tecla = e.which;

if(tecla >= 47 && tecla < 58){ // numeros de 0 a 9 e "/"
var data = inputData.value;
if (data.length == 2 || data.length == 5){
data += '/';
inputData.value = data;
}
}else if(tecla == 8 || tecla == 0) // Backspace, Delete e setas direcionais(para mover o cursor, apenas para FF)
return true;
else
return false;
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
		$usuario = $linha['nome'];
	}
?>
<!--inicio da div Global-->
<div id="global">
	  <!--inicio da div topo--><div id="topo">
            	<div id="logomarca"> <img src="../img_layout/logomarca.png" alt="Bia & Sylvia Gastronomia" border="0" /></div>
                	<div id="menu_h" align="center">
                    <ul>
                    	<?php echo 'Seja Bem Vindo(a) &nbsp;&nbsp;'.$usuario; ?> 
                    </ul>
                    </div>
   	  <div id="localizacao">
                        <div id="loc_desc">
        <img src="../images/endereco.jpg" width="221" height="59" /></div>
              </div>
            </div><!--Fim da div topo-->
            		
                        <!--inicio da div Meio--><div id="meio">
                        	<div id="col_esc">
                            	
                              <div id="esc_img">
                              <div  class="titulo"><strong>Cadastro de Cliente</strong></div>
                               <div  class="pginicial"><a href="cadastro.php" title="pagina inicial">Página inicial</a></div>
                                <div id="contato">
                <form name="form1" method="post" enctype="multipart/form-data" action="">
                <?php				
				include_once("conecta.php");
				
				 if(isset($_POST['enviar'])){
				
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefoneres = $_POST['telefoneres'];
	$telefonecom = $_POST['telefonecom'];
	$celular = $_POST['celular'];
	$niver = trim($_POST["niver"]);
    if (strstr($niver, "/")){
    $aux2 = explode ("/", $niver);
    $datai2 = $aux2[2] . "-". $aux2[1] . "-" . $aux2[0];}
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$cep = $_POST['cep'];
	$opcao = $_POST['opcao'];
	$msg = $_POST['msg'];	
	
$erros = "";

if(empty($nome)){
    $erros .= "O nome deve ser preenchido.<br />";
}

if(empty($email)){
    $erros .= "O E-mail deve ser preenchido.<br />";
	

}else{
    eregi("([\._0-9A-Za-z-]+)@([0-9A-Za-z-]+)(\.[0-9A-Za-z\.]+)",$email,$match);
    if(!isset($match)){
        $erros .= "O e-mail informado é inválido.<br />";
    }
}


if(empty($erros) ){
	
    	
	$query = "INSERT INTO cadastro (nome,email,telefoneres,telefonecom,celular,niver,endereco,bairro,cidade,estado,cep,opcao,msg) VALUES ('".$nome."','".$email."', '".$telefoneres."', '".$telefonecom."', '".$celular."', '".$datai2."', '".$endereco."', '".$bairro."', '".$cidade."', '".$estado."', '".$cep."', '".$opcao."', '".$msg."')";
mysql_query($query);

      if ($query =='0'){
	echo'<div id="alert"> Erro ao Cadastrar! </div>';
	
	}else{
    echo'<div id="alert"> Cadastro '.$nome.' realizado com sucesso! </div>';
	$nome = "";
	$email = "";
	$telefoneres = "";
	$telefonecom = "";
	$celular = "";
	$niver = "";
	$endereco = "";
	$bairro = "";
	$cidade = "";
	$estado = "";
	$cep = "";
	$opcao = "";
	$msg = "";				
	}

}else{
    
 echo'<div id="alert">'.$erros.'</div>';
  }		
				
				}
				?>
                
<div id="esquerda" style="width: 45%; float: left;">
<span id="label">Nome: </span>

<input type="text" name="name"><br>

<span id="label">Endereço: </span>

<input type="text" name="name"><br>

<span id="label">Complemento: </span>

<input type="text" name="name"><br>

<span id="label">CEP: </span>

<input type="text" name="name"><br>

<span id="label">Estado: </span>

<input type="text" name="name"><br>

<span id="label">Telefone: </span>

<input type="text" name="name"><br>

<span id="label">RG: </span>

<input type="text" name="name"><br>
</div>
<span id="right" style="width: 65%;  float: right;">

<span id="label">CNPJ: </span>

<input type="text" name="name"><br>

<span id="label">Número: </span>

<input type="text" name="name"><br>

<span id="label">Bairro: </span>

<input type="text" name="name"><br>

<span id="label">Cidade: </span>

<input type="text" name="name"><br>

<span id="label">Site: </span>

<input type="text" name="name"><br>

<span id="label">Celular: </span>

<input type="text" name="name"><br>

<span id="label">E-mail: </span>

<input type="text" name="name"><br>

</span>
<div style="clear: both;"></div>
<input name="enviar" type="submit" value="Cadastrar" />
</form>
      
</div>           
                                    
                            </div>
                            </div>
                            	
                           
                                </div>
                                	
                        </div><!--fim da div Meio-->
                        		

</div><!--Termino da div Global-->
</body>
</html>