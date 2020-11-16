<?php
   include("db.php");
   
   $idniver  = $_POST['idniver'];
   $nome     = $_POST['name'];
   $email    = $_POST['email'];
   $enviado  = 0;
   $pdo = conectar();
   
   $sql = "INSERT INTO contatos(idniver,nome,email,enviado)VALUES(:idniver,:nome,:email,:enviado)";
    $cadastra = $pdo->prepare($sql);
	$cadastra->bindValue(":idniver",$idniver);
    $cadastra->bindValue(":nome",$nome);
    $cadastra->bindValue(":email",$email);
    $cadastra->bindValue(":enviado",$enviado);
    $cadastra->execute();
	
	if($cadastra->rowCount() == 1){
	echo "Cadastro sucesso";
	}else{
		echo "erro ao cadastrar";
	}
   
?>