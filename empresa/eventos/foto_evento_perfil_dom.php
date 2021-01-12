<?php
    session_start();
    
?>
<!DOCTYPE html>

<html lang = "pt-BR">
    <head>
        <meta charset = "UTF-8" />
        <title><?php  echo $_SESSION['nome_empresa']; ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

    <body>
        <?php 
            include("../base_de_dados/conexao.php");
            

            if($_SESSION["id_evento"] == NULL)
            {
                $id_c = $_POST["id"];
            }
            else
            {
                $id_c = $_SESSION["id_evento"];
            }


            $SQL = 'SELECT
                         perfil_evento, capa_evento
                    FROM
                        eventos
                    WHERE
                        id_evento = '.$id_c.';';

            $query = mysqli_query($conexao, $SQL);

            while($registros = mysqli_fetch_assoc($query))
            {
                $foto = $registros["perfil_evento"];
                $capa = $registros["capa_evento"];
            }
            
            //print $foto;
            print '<div><img src= "../empresa/eventos/'.$foto.'" height= "450px" width="100%" style = "margin-top: 8%; filter: blur(4px); position:absolute; left:1px; top:1px; z-index: 1;"/>';
            print '<img src= "../empresa/eventos/'.$foto.'" height= "250px" width="250px" style = "margin-top: 23%; margin-left: 2%; position:absolute; left:1px; top:1px; z-index: 2;"/></div>';
            
            mysqli_close($conexao);

           
        ?>

        
    </body>
</html>
