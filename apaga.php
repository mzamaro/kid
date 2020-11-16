<?php
	include("conecta.php");
	
	$id = $_GET['id'];
    $query = "DELETE FROM contatos WHERE id = '$id'";
    $result = mysql_query($query);

	
?>