<?php
session_start();
if(!isset($_SESSION['usuariosession']) AND !isset($_SESSION['senhasession'])){
	header("Location: ../admin/index.php");
	exit;
}
?>

<?php
$id     = $_GET['idniver'];

        include ("class.phpmailer.php");
        include ("conecta.php");

       
            //Campos para envio da mensagem

            $de      = $_SESSION['usuariosession'];
            $para    = utf8_decode('contato@kidbeerutabuffet.com.br');
            
          
  
	$seleciona = mysql_query("SELECT * FROM clientes WHERE idniver='$id'")or die("Erro na consulta".mysql_error());

   if($seleciona == ''){
	   echo 'Nenhum Registro';
   }else{
	 while($res_id = mysql_fetch_array($seleciona)){
	$id            = $res_id['idniver'];	 
	$nome          = $res_id['nomeniver'];
	$dataniver     = $res_id['datafesta'];
	 if (strstr($dataniver, "-")){
    $aux2 = explode ("-", $dataniver);
    $newdataniver = $aux2[2] . "/". $aux2[1] . "/" . $aux2[0];}
			$hinicio  =  $res_id['horaini'];
		    $hend     =  $res_id['horaend'];
		    $idade    =  $res_id['idade'];
			
	 }}               
   	
 echo 
'<table border="0" cellpadding="0" cellspacing="0" width="620" align="center">

  <tr>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="294" height="1" border="0" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="34" height="1" border="0" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="31" height="1" border="0" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="14" height="1" border="0" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="63" height="1" border="0" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="13" height="1" border="0" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="17" height="1" border="0" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="73" height="1" border="0" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="18" height="1" border="0" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="63" height="1" border="0" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>

  <tr>
   <td rowspan="11"><img name="kidverde_r1_c1" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r1_c1.jpg" width="294" height="413" border="0" id="kidverde_r1_c1" alt="" /></td>
   <td colspan="9"><img name="kidverde_r1_c2" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r1_c2.jpg" width="326" height="72" border="0" id="kidverde_r1_c2" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="1" height="72" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="6" colspan="2"><img name="kidverde_r2_c2" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r2_c2.jpg" width="65" height="179" border="0" id="kidverde_r2_c2" alt="" /></td>
   <td colspan="5" background="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r2_c4.jpg"><font style="color:#000" size="4" face="Trebuchet MS, Arial, Helvetica, sans-serif">'.$convidado.'</font></td>
   <td rowspan="4" colspan="2"><img name="kidverde_r2_c9" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r2_c9.jpg" width="81" height="107" border="0" id="kidverde_r2_c9" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="1" height="36" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="5"><img name="kidverde_r3_c4" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r3_c4.jpg" width="180" height="19" border="0" id="kidverde_r3_c4" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="1" height="19" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="5" background="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r4_c4.jpg">'.$newdataniver.'</td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="1" height="35" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="5"><img name="kidverde_r5_c4" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r5_c4.jpg" width="180" height="17" border="0" id="kidverde_r5_c4" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="1" height="17" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="2" background="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r6_c4.jpg">'.$hinicio.'</td>
   <td rowspan="4" colspan="2"><img name="kidverde_r6_c6" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r6_c6.jpg" width="30" height="144" border="0" id="kidverde_r6_c6" alt="" /></td>
   <td colspan="2" background="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r6_c8.jpg">'.$hend.'</td>
   <td rowspan="6"><img name="kidverde_r6_c10" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r6_c10.jpg" width="63" height="234" border="0" id="kidverde_r6_c10" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="1" height="28" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="2"><img name="kidverde_r7_c4" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r7_c4.jpg" width="77" height="44" border="0" id="kidverde_r7_c4" alt="" /></td>
   <td rowspan="3" colspan="2"><img name="kidverde_r7_c8" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r7_c8.jpg" width="91" height="116" border="0" id="kidverde_r7_c8" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="1" height="44" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="4"><img name="kidverde_r8_c2" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r8_c2.jpg" width="34" height="162" border="0" id="kidverde_r8_c2" alt="" /></td>
   <td colspan="2" background="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r8_c3.jpg">'.$idade.'</td>
   <td rowspan="4"><img name="kidverde_r8_c5" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r8_c5.jpg" width="63" height="162" border="0" id="kidverde_r8_c5" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="1" height="31" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="3" colspan="2"><img name="kidverde_r9_c3" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r9_c3.jpg" width="45" height="131" border="0" id="kidverde_r9_c3" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="1" height="41" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="2"><img name="kidverde_r10_c6" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r10_c6.jpg" width="13" height="90" border="0" id="kidverde_r10_c6" alt="" /></td>
   <td colspan="3" background="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r10_c7.jpg">'.$nome.'</td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="1" height="31" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="3"><img name="kidverde_r11_c7" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r11_c7.jpg" width="108" height="59" border="0" id="kidverde_r11_c7" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="1" height="59" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="kidverde_r12_c1" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r12_c1.jpg" width="294" height="140" border="0" id="kidverde_r12_c1" alt="" /></td>
   <td colspan="9"><img name="kidverde_r12_c2" src="http://www.kidbeerutabuffet.com.br/imagens/kidverde_r12_c2.jpg" width="326" height="140" border="0" id="kidverde_r12_c2" alt="" /></td>
   <td><img src="http://www.kidbeerutabuffet.com.br/imagens/spacer.gif" width="1" height="140" border="0" alt="" /></td>
  </tr>
</table>';
 
         

			 
           
 



 
     
?>