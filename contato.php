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
</head>
<body>
<!--inicio da div Global-->
<div id="global">
	  <!--inicio da div topo--><div id="topo">
            	<div id="logomarca"> <img src="../img_layout/logomarca.png" alt="Bia & Sylvia Gastronomia" border="0" /></div>
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
                            	
                              <div id="esc_img">
                              <div  class="titulo"><strong>Cadastro de Clientes</strong></div>
                                <div id="contato">
                <form name="form1" method="post" action="">
                <?php				
				include_once("conecta.php");
				
				 if(isset($_POST['enviar'])){
				
$erros = "";

if(empty($_POST['nome'])){
    $erros .= "O nome deve ser preenchido.<br />";
}

if(empty($_POST['email']) ){
    $erros .= "O E-mail deve ser preenchido.<br />";
	

}else{
    $email = $_POST['email'];
    eregi("([\._0-9A-Za-z-]+)@([0-9A-Za-z-]+)(\.[0-9A-Za-z\.]+)",$email,$match);
    if(!isset($match)){
        $erros .= "O e-mail informado é inválido.<br />";
    }
}

	
if(empty($_POST['msg'])){
    $erros .= "A mensagem deve ser preenchida.<br />";
}

if(empty($erros) ){

    
	
	$query = "INSERT INTO cadastro (nome,email,telefoneres,telefonecom,celular,niver,endereco,bairro,cidade,estado,cep,opcao) VALUES ('".$_POST['nome']."','".$_POST['email']."', '".$_POST['telefoneres']."', '".$_POST['telefonecom']."', '".$_POST['celular']."', '".$_POST['niver']."', '".$_POST['endereco']."', '".$_POST['bairro']."', '".$_POST['cidade']."', '".$_POST['estado']."', '".$_POST['cep']."', '".$_POST['opcao']."')";
mysql_query($query);

    $send = $phpmail->Send();

    if($send){
		echo'<div id="alert">A Mensagem foi enviada com sucesso.</div>';
         }else{
		 echo "Não foi possível enviar a mensagem. Erro: " .$phpmail->ErrorInfo;
    }

}else{
    
 echo'<div id="alert">'.$erros.'</div>';
  }		
				
				}
				?>
                
               <label for="usuario" class="textoform">Nome:</label>
               <input name="nome" type="text" id="nome" size="30"    >
               <input name="assunto" type="hidden" id="assunto" value="Contato Site Bia&Sylvia"  >
               <br />
               <label for="telefoneres" class="textoform">Tel.Residencial:</label> 
               <input name="telefoneres" type="text" id="telefoneres" size="30" />
                  <br />
              <label for="celular" class="textoform">Tel.Comercial:</label>
              <input name="telefonecom" type="text" id="telefonecom" size="30"   >
              <br>
              <label for="celular" class="textoform">Celular:</label> 
              <input name="celular" type="text" id="celular" size="30"  >
              <br>  
              <label for="email" class="textoform" style="text-align:left;">E-mail: </label>
          <input name="email" type="text" id="email" size="30"   >
              <br>  
              <label for="celular" class="textoform">Anivers&aacute;rio</label>
              <input name="niver" type="text" id="niver" size="30"  >
              <br>  
              <label for="celular" class="textoform">Endere&ccedil;o:</label>
              <input name="endereco" type="text" id="endereco" size="30"   >
              <br> 
            <label for="bairro" class="textoform">Bairro:</label>
              <input name="bairro" type="text" id="bairro" size="30">
              <br />
             <label for="cidade" id="cidade" class="textoform" >Cidade:</label>
              <input name="cidade" type="text"  id="cidade" size="30" >
              <br />
              <label for="estado" class="textoform" >Estado:</label>
              <input name="estado" type="text" id="estado" size="2" maxlength="2" style="width:20px;" >
              <label for="cep" class="textoform" style="padding-right:20px;" >CEP:</label>
             <input name="cep" type="text" id="cep"  size="16" maxlength="9"  >
               <br />
         <label for="interesse" class="textoform" style="padding-right:50px;">Interesse:</label>
         <label for="opcao"  class="textoform" style=" width:45px;margin-right:10px;">Evento&nbsp;Corporativo:</label>
         <input type="radio" name="opcao"   value="evento_corporativo" >
         <label for="opcao" class="textoform" id="evento">Evento&nbsp;Pessoal:</label>
         <input type="radio" name="opcao" value="evento_pessoal" checked >
         
           <br />
           <label for="mensagem" class="textoform">Observa&ccedil;ões:</label>      
                 <br />   
              <textarea rows="5" cols="40" name="msg" id="msg" ></textarea>
               <br />    
               <div id="botao">
            <input name="enviar" type="submit" id="enviar" value="Cadastrar"/> 
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