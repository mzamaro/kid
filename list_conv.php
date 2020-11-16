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
<title>Kid Beeruta Buffet</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
<script src="jquery.jclock-1.2.0.js.txt" type="text/javascript"></script>
<script type="text/javascript" src="jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>
<script type="text/javascript">
$(function($) {
    $('.jclock').jclock();
});
</script>

<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />


<script src="js/jquery.PrintArea.js_4.js"></script>
<script src="js/core.js"></script>



</head>
<body>
<div id="main_container">

	<div class="header">
    <div class="logo"><a href="#"><img src="images/logo.jpg" alt="" title="" border="0" /></a></div>
    
    <div class="right_header"><?php echo 'Bem Vindo(a) &nbsp;'.$_SESSION['usuariosession']; ?>   | <a href="logout.php" class="logout">Sair</a></div>
    <div class="jclock"></div>
    </div>
    
    <div class="main_content">
    
                    <div class="menu">
                    <ul>
                    <li><a class="current" href="inicio.php">Listar Clientes</a></li>
                    <li><a href="cadastro.php">Cadastra Cliente<!--[if IE 7]><!--></a><!--<![endif]-->
                   
                    </li>
                    <li><a href="consulta.php">Consulta Cliente<!--[if IE 7]><!--></a><!--<![endif]-->
                   
                              
                        </li>
                    <li>  <a href="#" class="print" rel="right_content">
Imprimir Lista de convidados<!--[if IE 7]><!--></a><!--<![endif]-->
                                       
                              
                        </li>
                         
                                        </ul>
                    </div> 
                    
                    
                    
                    
    <div class="center_content">  
    
    
    
    <div class="left_content">
    
           
    
    <div id="right_content">            
     
   <?php echo '<h2>Lista de convidados de &nbsp;&nbsp;</h2>'; ?>
   
 <?php

include "conecta.php";
    $id     = $_GET['id'];
		
	$seleciona = mysql_query("SELECT * FROM contatos WHERE idniver='$id'")or die("Erro na consulta".mysql_error());
    $count = mysql_num_rows($seleciona);
   if ($count == '') {
    echo '<div id="alert">Nenhum convidado na Lista!</div>';
} else {

	 echo'                      
<table id="rounded-corner" >
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company">Nome</th>
            <th scope="col" class="rounded">E-mail</th>
            <th scope="col" class="rounded">Data-Nascimento</th>
        </tr>
    </thead>
	
        <tfoot>
    	<tr>
        	<td colspan="6" class="rounded-foot-left"></td>
        	<td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>
    <tbody>
	';
	 while($res_id = mysql_fetch_array($seleciona)){
	$id            = $res_id['id'];	 
	$nome          = $res_id['nome'];
	$email    = $res_id['email'];    
 echo '   
		<tr>
		    <td>'.$nome.'</td>
            <td>'.$email.'</td>
			<td>&nbsp;</td>
        </tr> ';}}
echo'    	        
    </tbody>
</table>
';

?>

	 
        
    
      
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
  

</div>		
</body>
</html>