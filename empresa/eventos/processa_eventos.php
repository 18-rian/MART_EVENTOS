<!DOCTYPE html>

<html lang = "pt-BR">
	
	<head>
		<title>Bem vindo ao MART</title>
		<meta charset = "UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>
	
	<body class =  ".display-3">
        <?php
            session_start();

            $filename = $_FILES['perfil']['name'];
            $filename_two = $_FILES["capa"]["name"];
            
            

            $location = "img_eventos/".$filename;
            $location_two = "img_eventos/".$filename_two;
            
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
                echo 0;
            }
            else
            {  
                $newName = 'img_eventos/'.md5(uniqid($filename)).".".$imageFileType;
                $newName_two = 'img_eventos/'.md5(uniqid($filename_two)).".".$imageFileType_TWO;
                
                if((move_uploaded_file($_FILES['perfil']['tmp_name'], $newName)) AND ((move_uploaded_file($_FILES['capa']['tmp_name'], $newName_two))))
                {
                    //echo '<img src="'.$newName.'" style = "width: 35%;"/> <br />';
                    //echo '<img src="'.$newName_two.'" style = "width: 50%;"/>';
                }
                else
                {
                    echo 0;
                }


            }


            include("conexao.php");



            $SQL = "INSERT INTO eventos
                         (nome, descricao, cidade, local, data_horario, cnpj_empresa, url, perfil_evento, capa_evento)
                    VALUES
                        ('".$_POST['nome']."', '".$_POST['descricao']."',  '".$_POST['cidade']."', '".$_POST['endereco']."', '".$_POST['data_hora']."', ".$_POST['cnpj'].", '".$_POST['url']."', '".$newName."', '".$newName_two."');
                    ";
            $query = mysqli_query($conexao, $SQL);


            if($query == NULL)
            {

                print "Erro aqui <br />";
                print $SQL;

            }
            else
            {
                $last_id = mysqli_insert_id($conexao);


                $_SESSION["id_evento"] = $last_id;
                //print $_SESSION["id_evento"];

                print '<a class = "display-4">Evento cadastrado com sucesso!<br /> </a><br />';
                print '<a href = "../puxador.php" class = "display-4">Página do evento!</a>';

            }

            mysqli_close($conexao); 
        ?>

        
    
    
    </body>
    
</html>
