<?php 
	
	//Conectar com o software de banco de dados
	//MySQL
	
	/*$conexao = mysqli_connect("db4free.net:3306", "jarvis_ifsp", "rn123456789");

	if(!$conexao)
	{
		print "<h1>Erro</h1>";

		print mysqli_connect_error($conexao). "<br>";
		exit();
	}
	
	
	//selecionando a base de dados
	$db = mysqli_select_db($conexao, "marteven");
	
	if(!$db)
	{
		print "a";
		print "Erro";
		print mysqli_error($db)."<br>";
		exit();
	}*/

	$conexao = @mysqli_connect("db4free.net:3306", "jarvis_ifsp", "rn123456789", "marteven")
			or die("Erro ao abrir");
			
	mysqli_set_charset($conexao, "utf8");
	
?>
