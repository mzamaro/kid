<?php
$host    = "186.202.152.168";    #servidor
$login    = "kidbeerutabuffet";        #login do banco de dados
$senha    = "Adminkid43";            #senha do banco de dados
$db        = "kidbeerutabuffet";    #banco de dados


$con   = mysql_connect($host,$login,$senha) or die(mysql_erro());    #conecta com o servidor
$sel   = mysql_select_db($db) or die(mysql_error());                #seleciona a database
mysql_set_charset("utf-8", $con);
?>