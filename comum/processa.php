<?php
	
	session_start();
	
	$filename = $_FILES['perfil']['name'];
	$filename_two = $_FILES["capa"]["name"];

	$location = "../comum/img/".$filename;
	$location_two = "../comum/img/".$filename_two;
	
	$uploadOk = 1;
	$uploadOk_two = 1;

	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	$imageFileType_TWO = pathinfo($location_two,PATHINFO_EXTENSION);
	
	$valid_extensions = array("jpg","jpeg","png");
	
	if(!in_array(strtolower($imageFileType),$valid_extensions) AND (!in_array(strtolower($imageFileType_TWO),$valid_extensions)))
	{
		$uploadOk = 0;
		$uploadOk_two = 0;
	}
	
	if(($uploadOk == 0) AND ($uploadOk_two == 0))
	{
		//echo 0;
	}
	else
	{  
		$newName = '../comum/img/'.md5(uniqid($filename)).".".$imageFileType;
		$newName_two = '../comum/img/'.md5(uniqid($filename_two)).".".$imageFileType_TWO;
		
		if((move_uploaded_file($_FILES['perfil']['tmp_name'], $newName)) AND ((move_uploaded_file($_FILES['capa']['tmp_name'], $newName_two))))
		{
			//echo '<img src="'.$newName.'" style = "width: 35%;"/> <br />';
			//echo '<img src="'.$newName_two.'" style = "width: 50%;"/>';
			/*
			$insert = "UPDATE USERS SET PROFILE_PHOTO = ? WHERE EMAIL like ?";
			$stmt = Conexao::getConn()->prepare($insert);
			$stmt->bindValue(1, $newName);
			$stmt->bindValue(2, $email);
			$stmt->execute();
			echo 1;*/
		}
		else
		{
			echo 0;
		}


	}

	$nome = $_POST["nome"];
	$sobre = $_POST["sobrenome"];
	$mail = $_POST["mail"];
	$senha = $_POST["senha"];
	$data = $_POST["data"];
	$city = $_POST["city"];;
	$edital = $_POST["editais"];
	
	include "../base_de_dados/conexao.php";

	$inserindo = "INSERT INTO cliente
						(nome, sobrenome, email, senha, data_de_nasc, cidade, editais_s_n, foto_perfil, foto_capa)
					VALUES ('$nome', '$sobre', '$mail', '$senha', '$data', '$city', '$edital', '$newName', '$newName_two')";
	
	$query = mysqli_query($conexao, $inserindo);


	$_SESSION["nome"] = $nome;
	$_SESSION["sobrenome"] = $sobre;
	$_SESSION["email"] = $mail;
	$_SESSION["senha"] = $senha;
	$_SESSION["data_de_nasc"] = $data;
	$_SESSION["cidade"] = $city;
	$_SESSION["editais_s_n"] = $edital;
	$_SESSION["perfil"] = $newName;
	$_SESSION["capa"] = $newName_two;

    $last_id = mysqli_insert_id($conexao);
    $_SESSION["id"] = $last_id;
	

	mysqli_close($conexao);

	header("location:../menu/menu.php");
	
?>
