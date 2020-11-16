<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kid Beeruta Convite online</title>
<link rel="stylesheet" href="../css/login.css" type="text/css" />
</head>

<body>
<div id="box">

<div id="contato">
<div id="img" align="center"><img src="imagem/kid-beeruta-do-campo.jpg" width="168" height="112" alt="logo" /></div>
<?php
session_start();

include "conecta.php";
//gravando usuario e senha numa variÃ¡vel
if(isset($_POST['button'])){
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$datahoje = date("Y-m-d");

//conectando com o banco de dados e o servidor

$query = ("SELECT * FROM clientes WHERE email='$usuario' AND senha='$senha' AND '$datahoje' <= datafesta");
	$res=mysql_query($query) or die("Error: ". mysql_error(). " with query ". $query);
		
	while($linha = mysql_fetch_array($res)){
		$id = $linha['idniver'];
		$nome = $linha['nome'];
		
	 
	}


if(mysql_num_rows($res)== 1){
	
	$_SESSION['usuariosession'] = $usuario;
    $_SESSION['senhasession']   = $senha;
	$_SESSION['sessionid']	= $id;
	$_SESSION['sessionnome']	=  utf8_encode($nome);
	$loginGoTo = "convite.php";
	header("Location: $loginGoTo");

	}else{
		
      $_SESSION['expirou']='<div id="erro">Usuário expirou!</div>';
	   @mysql_query("UPDATE clientes SET ativo = 0 WHERE idniver = '$id'");
	
	unset($_SESSION['usuariosession']);
	unset($_SESSION['senhasession']);

	if(isset($_SESSION['expirou'])){
	echo $_SESSION['expirou'];
	
		}
		
	}

		

}

?> 
 <div id="erro"></div> 
<form name="form1" method="post" enctype="multipart/form-data" action="">
               <fieldset>
               <legend>Painel Convite Online</legend>
               <label>
               <span>E-mail:</span>
               <input name="usuario" type="text" id="usuario" size="30"  >
               </label>
               <label>
               <span>Senha:</span> 
               <input name="senha" type="password" id="senha" size="30"/>
               </label>
                           
            <input name="button" type="submit" id="button" value="Logar" class="btn"/> 
               
               </fieldset>                   
          </form> 
          
</div>    
</div>

</body>
</html>
