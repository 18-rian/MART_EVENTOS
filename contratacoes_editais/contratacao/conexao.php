<?php

	//Conectar com o software de banco de dados
	//MySQL

	$conexao = mysqli_connect("localhost", "root", "");

	if(!$conexao)
	{
		print "<h1>Erro_aqui</h1>";

		print mysqli_connect_error($conexao). "<br>";
		exit();
	}


	//selecionando a base de dados
	$db = mysqli_select_db($conexao, "mart_banco_new");

	if(!$db)
	{
		print "a";
		print "Erro";
		print mysqli_error($db)."<br>";
		exit();
	}

	

?>
