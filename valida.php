<?php
//conecta com o db
include ("conecta.php");
$email= $_POST['usuario'];
$senha = $_POST['senha'];
//faz a confirmação de nome e senha no db
$logar = mysql_query("SELECT email, senha FROM clientes WHERE email='$email' AND senha='$senha'") or die("erro ao selecionar");
/*aqui depois de verificado redirecionamos a pagina secreta(caso nome e senha estarem corretos) ou senha e apelido não conferem caso tais estiverem errados. Repare que há uma rotina para o valor inserido em senha não seja nulo.

obs: Aonde esta escrito paginasecreta.php é aonde vc deve colocar a página para onde o script ira redirecionar*/

if (strlen($senha)< 1)
echo '<div id="erro">senha não confere</div>';
elseif (mysql_num_rows($logar)>0 ){
header("location:convite.php");
} else {
echo "senha não confere!";
}
?>
