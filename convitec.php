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
<title>Kid Beeruta Convite Online</title>
		<link rel="stylesheet" href="css/jquery.ui.all.css">
      <link rel="stylesheet" href="jquery-ui-1.10.0.custom.css"/>
	<script src="js/jquery-1.6.2.min.js"></script>
	<script src="js/jquery-ui-1.8.16.custom.min.js"></script>
	<script src="js/culture/jquery.ui.datepicker-pt-BR.js"></script>
<link rel="stylesheet" href="../css/adm.css" type="text/css" />

        <style>
    body { font-size: 62.5%; }
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
  
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
	#table {
	width: 100%;
	height: 100%;
	position: static;
	display: table;
	*overflow: hidden; /* hack para o IE6 e IE7 */
	*position: relative; /* hack para o IE6 e IE7 */
}

#cell {
	vertical-align: middle;
	display: table-cell;
	position: static;
	*top: 50%; /* hack para o IE6 e IE7 */
	*position: absolute; /* hack para o IE6 e IE7 */
}

#users-contain {
	top: -50%;
	width:500px;
	margin: auto;
	position: relative;
	border:#F00 dotted 1px;
	padding:10px;
	font:12px "Trebuchet MS", Arial, Helvetica, sans-serif;
}
#informacoes-2 form a {margin-left:-40px;}
#informacoes-3 p {color:#000000; font:14px "Trebuchet MS", Arial, Helvetica, sans-serif;}
  </style>


	<script>
	//$(document).ready(function(){ 
    //$("#abas").tabs("select", 2); 
 
	$(function() {
		$("#abas").tabs();
		$("#abas").tabs("select", 2); 
		
	 }); 	 
				</script>

<script>
function deleterow(id){
if (confirm('Deseja apagar o registro?')) {
$.get('apaga.php', {id: +id, ajax: 'true' },
function(){
$("#row_"+id).fadeOut("slow");
$(".message").fadeIn("slow");
$(".message").delay(2000).fadeOut(1000);
});
}
}
</script>



    <script>

  $(function() {
	  
    var name = $( "#name" ),
      email = $( "#email" ),
	  idniver = $("<?php if(isset ($_SESSION['sessionid'])){echo $_SESSION['sessionid'];}?>"),
      allFields = $( [] ).add( name ).add( email ).add( idniver ),
      tips = $( ".validateTips" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Tamanho de " + n + " deve ter " +
          min + " e " + max + "caracteres." );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
	  resizable: false,
      buttons: {
        "Cadastra Convidado": function() {
          var bValid = true;
          allFields.removeClass( "ui-state-error" );
 
          bValid = bValid && checkLength( name, "nome", 4, 30 );
          bValid = bValid && checkLength( email, "email", 6, 40 );
           
          bValid = bValid && checkRegexp( name, /^([a-zA-Z]*)(.*)+$/i, "Nome deve conter apenas letras." );
          // From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
          bValid = bValid && checkRegexp( email, /^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\-]+\.[a-z]{2,4}$/i ,"Email Inválido.");
 
     
 
          if ( bValid ) {
			  
			  $.ajax({
				  url : 'cadastrar.php',
				  type : 'post',
				  //data : 'name=' + $('#name').val() + 'email=' + $('#email').val() + 'password=' + $('#password').val(),
				  data : $("#form").serialize(),
				  success: function(data){
                   	     					  
					  }
			  })
			  
           $( "#users tbody" ).append( "<tr>" +
              "<td>" + name.val() + "</td>" +
           "<td>" + email.val() + "</td>" +
		 
		  		                  "</tr>" );
				
		
            $( this ).dialog( "close" );
          }
        },
        Cancelar: function() {
          $( this ).dialog( "close" );
        }
      },
      close: function() {
        allFields.val( "" ).removeClass( "ui-state-error" );
      }
    });
 
    $( "#create-user" )
      .button()
      .click(function() {
        $( "#dialog-form" ).dialog( "open" );
      });
  });
  
  
  </script>
</head>

<body>
<!--inicio da div Global--><div id="global">
			<!--inicio da div topo--><div id="topo">
            	<div id="logomarca">
    <a href="index.php" title="Kid Beeruta"><img src="imagem/kid-beeruta-do-campo.jpg" alt="kid Beeruta" border="0" /></a></div>
                	<div id="menu_h" align="center">
                    <ul>
                    <?php echo 'Seja Bem Vindo(a) &nbsp;&nbsp;'.$_SESSION['sessionnome']; ?> 	
                    </ul>
                    </div>
   	  <div id="localizacao">
                        <div id="loc_desc">
  <img src="imagem/abelha.jpg" /></div>
              </div>
            </div><!--Fim da div topo-->
            			
<!--inicio da div Meio--><div id="meio">
                        	<div id="col_esc">
                            	
                                	</div>
                            	<div id="col_meio">
                                	<br />
                                    <div class="texto">
                      <div id="abas">
        <ul>
            <li><a href="#informacoes-1">Convidados</a></li>
            <li><a href="#informacoes-2">Convite</a></li>
            <li><a href="#informacoes-3">Relat&oacute;rio de envio</a></li>
        </ul>
        <div id="informacoes-1">

            <div id="dialog-form" title="Criar novo usuarios">
  <p class="validateTips">Todos os campos são necessarios.</p>
     
  <form id="form" name="form" method="post" enctype="multipart/form-data">
  <fieldset>
    <input type="hidden" name="idniver" id="idniver" class="text ui-widget-content ui-corner-all" value="<?php if(isset ($_SESSION['sessionid'])){echo $_SESSION['sessionid'];}?>">
   
	<label for="name">Name</label>
    <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all"  />
    <label for="email">Email</label>
    <input type="text" name="email" id="email" class="text ui-widget-content ui-corner-all" />
    
     </fieldset>
  </form>
</div>
 
<div id="table">
	<div id="cell">
<div id="users-contain" class="ui-widget" >
  <h1>Lista de Convidados:</h1>
   
  <table id="users" class="ui-widget ui-widget-content">
    <thead>
      <tr class="ui-widget-header ">
        <td>Nome</td>
        <td>Email</td>
        <td>A&ccedil;&otilde;es</td>
             </tr>
    </thead>
 
    <tbody>
    
  <?php require_once "db.php" ;?>  
    <?php
	$idniver = $_SESSION['sessionid'];
	
	$pdo = conectar();
    $listar = $pdo->query("SELECT * FROM contatos where idniver='$idniver' ");
	$dados = $listar->fetchAll(PDO::FETCH_OBJ);
	$d = new ArrayIterator($dados);
	while($d->valid()):
    ?>
      
      <tr id="row_<?php echo $d->current()->id; ?>">
  
     
            <td><?php echo $d->current()->nome; ?></td>
        <td><?php echo $d->current()->email; ?></td>
          <td><a href="#" onclick="deleterow(<?php echo $d->current()->id; ?>)" class="delete"><img src="delete.png" title="Deletar registro" alt="Deletar registro" width="16" height="16" border="0" /></a></td>
          
      </tr>
      <?php
      $d -> next();	 
	  endwhile;  	  
	  
	  ?>
    </tbody>
  </table>

<button id="create-user">Cadastrar convidado</button>
</div>
     </div>
</div>
        </div>
        <div id="informacoes-2">        

            <p>Selecione o modelo do convite:</p>
                   <form action="" method="post">   
               <a href="vconvite_kidsbc.php"><img src="imagem/kidsbcthumb.jpg" border="0" /></a>     
                <a href="vconvite_kidjrd.php"><img src="imagem/verdethumb.jpg" border="0" /></a>
             <a href="convite_kidlounge.php"><img src="imagem/kidloungethumb.jpg"  border="0" /></a>
             
            </form>

            </div>
        

                                <div id="informacoes-3" >             
            <?php

include ("conecta.php");
$sql = mysql_query("SELECT * FROM contatos WHERE idniver = '".$_SESSION['sessionid']."'");
$total = mysql_num_rows($sql);

?>
            <p style="text-align:center;font-size:16px; color:#03C; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif">Total de convidados na lista:&nbsp;&nbsp;&nbsp;&nbsp;   <?php echo $total; ?></p>
 <?php

$sql2 = mysql_query("SELECT confirma FROM contatos WHERE idniver = '".$_SESSION['sessionid']."' and confirma = 'sim' ");
$totalsim = mysql_num_rows($sql2);

?>
            <p style="font-size:16px; color:#093; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif"><img src="imagem/confirmou_sim.jpg" title="Presen&ccedil;a confirmada">Confirmaram presen&ccedil;a atrav&eacute;s do convite online:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $totalsim; ?></p>
<?php

$sql3 = mysql_query("SELECT confirma FROM contatos WHERE idniver = '".$_SESSION['sessionid']."' and confirma = 'nao' ");
$totaln = mysql_num_rows($sql3);

?>            


<p style="font-size:16px; color:#F00; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif"><img src="imagem/confirmou_nao.jpg" title="N&atilde;o poder&atilde;o comparecer">Confirmaram que n&atilde;o poder&atilde;o comparecer ao evento:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $totaln; ?> </p>
      
</div>
     </div>
</div>
        </div>     	
                        </div><!--fim da div Meio-->
                        		

</div><!--Termino da div Global-->
</body>
</html>