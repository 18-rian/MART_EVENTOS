<?php
    session_start();


    $filename = $_FILES['perfil']['name'];
    $filename_two = $_FILES["capa"]["name"];
    
    

	$location = "../empresa/img/".$filename;
    $location_two = "../empresa/img/".$filename_two;
	
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
		$newName = '../empresa/img/'.md5(uniqid($filename)).".".$imageFileType;
		$newName_two = '../empresa/img/'.md5(uniqid($filename_two)).".".$imageFileType_TWO;
		
		if((move_uploaded_file($_FILES['perfil']['tmp_name'], $newName)) AND ((move_uploaded_file($_FILES['capa']['tmp_name'], $newName_two))))
		{
			echo '<img src="'.$newName.'" style = "width: 35%;"/> <br />';
			echo '<img src="'.$newName_two.'" style = "width: 50%;"/>';
		}
		else
		{
			echo 0;
		}


    }
    

    print "estou aqui";
    include "../base_de_dados/conexao.php";

    $cnpj = $_POST["cnpj"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $localizacao = $_POST["localizacao"];
    $cidade = $_POST["cidade"];
    $tipos = $_POST["tipos"];

    $inserindo = "INSERT INTO empresa
						(cnpj, nome_empresa, email, senha, localizacao, cidade, tipos_eventos, foto_empresa, capa_empresa)
                    VALUES ($cnpj, '$nome' , '$email', '$senha', '$localizacao', '$cidade', '$tipos', '$newName', '$newName_two')";

    $query = mysqli_query($conexao, $inserindo);
    print $inserindo;
    if($localizacao == "Itinerante")
    {
        //print "Entrou aquiiii";
		$iti = "INSERT INTO grupos_itinerantes
						(cnpj_itine, nome)
                    VALUES($cnpj, '$nome')";
                    
        $query_two = mysqli_query($conexao, $iti);
	}

    $_SESSION["cnpj"] = $cnpj;
    $_SESSION["nome_empresa"] = $nome;
	$_SESSION["email"] = $email;
	$_SESSION["senha"] = $senha;
	$_SESSION["localizacao"] = $localizacao;
	$_SESSION["cidade"] = $cidade;
    $_SESSION["tipos_eventos"] = $tipos;
    $_SESSION["perfil"] = $newName;
	$_SESSION["capa"] = $newName_two;

	header("location:../menu_empresa/menu.php");
    
    mysqli_close($conexao);
?>
