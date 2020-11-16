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
include "conecta.php";
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
            			<!--inicio da div Banner--><div id="banner">
                        <img src="../img_layout/clientes_tarja.jpg" alt="Banner" />
</div><!--Fim da div Banner-->
                        <!--inicio da div Meio--><div id="meio">
                        	<div id="col_esc">
                            	
                              <div id="esc_img">
                              <div  class="titulo"><strong>Edição de Cadastro</strong></div>
                                <div id="contato">
                <form name="form1" method="post" enctype="multipart/form-data" action="">
                <?php				
				include_once("conecta.php");
				
 			 if(isset($_POST['editar'])){
 
				 
	$id = $_POST['id'];			
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
	
	$query = mysql_query("UPDATE cadastro set nome = '$nome' , email = '$email' , telefoneres = '$telefoneres' , telefonecom = '$telefonecom' , celular = '$celular' , niver = '$datai2', endereco = '$endereco', bairro = '$bairro' , cidade = '$cidade' , estado = '$estado' , cep = '$cep', opcao = '$opcao', msg = '$msg' where id ='$id'");
	
	      if ($query =='0'){
	echo'<div id="alert"> Erro ao Alterar! </div>';
	
	}else{
    echo'<div id="alert"> Alteração realizada com sucesso! </div>';
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
                
            <?php
  if(isset($_GET['id'])){
	$id = $_GET['id'];
    $selecao = mysql_query("SELECT * FROM cadastro WHERE id = '$id' ")or die("Erro ao selecionar registro".mysql_error());
   if($selecao == ''){
	   echo 'Nenhum Registro Encontrado!';
   }else{
	 while($res_id = mysql_fetch_assoc($selecao)){
	$id            = $res_id['id'];
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
	 }
   }
            ?>    
                
               <label for="usuario" class="textoform">Nome:</label>
               <input name="id" type="hidden" id="id" size="30" value="<?php echo $id;?>"  />
               <input name="nome" type="text" id="nome" size="30" value="<?php echo $nome;?>"   >
               <br />
               <label for="telefoneres" class="textoform">Tel.Residencial:</label> 
               <input name="telefoneres" type="text" id="telefoneres" size="30" value="<?php echo $telefoneres; ?>"/>
                  <br />
              <label for="celular" class="textoform">Tel.Comercial:</label>
              <input name="telefonecom" type="text" id="telefonecom" size="30" value="<?php echo $telefonecom;?>"  >
              <br>
              <label for="celular" class="textoform">Celular:</label> 
              <input name="celular" type="text" id="celular" size="30" value="<?php echo $celular;?>"  >
              <br>  
              <label for="email" class="textoform" style="text-align:left;">E-mail: </label>
          <input name="email" type="text" id="email" size="30" value="<?php echo $email;?>"   >
              <br>  
              <label for="celular" class="textoform">Anivers&aacute;rio</label>
              <input name="niver" type="text" id="niver" size="30"  maxlength="10" onkeypress="return dateMask(this, event);"
               value="<?php  echo $niver[2]."/".$niver[1]."/".$niver[0];?>"  >
              <br> 
              <label for="celular" class="textoform">Endere&ccedil;o:</label>
              <input name="endereco" type="text" id="endereco" size="30" value="<?php echo $endereco;?>"  >
              <br> 
            <label for="bairro" class="textoform">Bairro:</label>
              <input name="bairro" type="text" id="bairro" size="30" value="<?php echo $bairro;?>">
              <br />
             <label for="cidade" id="cidade" class="textoform" >Cidade:</label>
              <input name="cidade" type="text"  id="cidade" size="30" value="<?php echo $cidade;?>" >
              <br />
              <label for="estado" class="textoform" >Estado:</label>
              <input name="estado" type="text" id="estado" size="2" maxlength="2" style="width:20px;" value="<?php echo $estado;?>" >
              <label for="cep" class="textoform" style="padding-right:20px;" >CEP:</label>
             <input name="cep" type="text" id="cep"  size="16" maxlength="9" value="<?php echo $cep;?>" >
               <br />
         <label for="interesse" class="textoform" style="padding-right:50px;">Interesse:</label>
         <label for="opcao"  class="textoform" style=" width:45px;margin-right:10px;">Evento&nbsp;Corporativo:</label>
         <input type="radio" name="opcao"   value="evento corporativo" >
         <label for="opcao" class="textoform" id="evento">Evento&nbsp;Pessoal:</label>
         <input type="radio" name="opcao" value="evento pessoal" checked >
         
           <br />
           <label for="mensagem" class="textoform">Observa&ccedil;ões:</label>      
                 <br />   
              <textarea rows="5" cols="40" name="msg" id="msg"><?php echo $msg; }?></textarea>
               <br /> 
               <div id="bt_position">   
            <input name="editar" type="submit" id="editar" class="botao" value="Editar"/>
            <INPUT TYPE="button" name="complete1" value="Voltar" onClick="parent.location='cadastro.php'">
            
              </div>                       
          </form> 
         
</div>           
                                    
                            </div>
                            </div>
                            	
                           
                                </div>
                                	
                        </div><!--fim da div Meio-->
                        		

</div><!--Termino da div Global-->
</body>
</html>