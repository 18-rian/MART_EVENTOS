<!DOCTYPE html>

<html lang = "pt-BR">
	
	<head>
		<title>Bem vindo ao MART</title>
		<meta charset = "UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
            $(document).ready(function ()
            {
                puxando();
                function puxando()
                {
                window.location.href = "../menu_empresa/perfil_evento.php";    
                 }        
            });


        </script>
	</head>
	
	<body class =  ".display-3">
        <?php

            session_start();
            $id_evento = $_SESSION["id_evento"];


            include("../base_de_dados/conexao.php");

            $SELECT = "SELECT 
                            nome, descricao, local, data_horario, cnpj_empresa, url
                        FROM 
                            eventos
                        WHERE 
                            id_evento = $id_evento";

            $query = mysqli_query($conexao, $SELECT);

            if(mysqli_num_rows($query) > 0) //Se verdadeiro
            {
                while($registros = mysqli_fetch_assoc($query))
                {
                    $nome_evento = $registros['nome'];
                    $descricao = $registros['descricao'];
                    $local = $registros['local'];
                    $data_horario = $registros['data_horario'];
                    $cnpj_empresa = $registros['cnpj_empresa'];
                    $url = $registros['url'];
                }
                print '<ul class="list-group">
                      <li class="list-group-item">NOME DO EVENTO: '.$nome_evento.' </li>
                      <li class="list-group-item">DESCRIÇÃO: '.$descricao.' </li>
                      <li class="list-group-item">LOCAL: '.$local.'</li>
                      <li class="list-group-item">DATA E HORÁRIO: '.$data_horario.'</li>
                      <li class="list-group-item">CNPJ: '.$cnpj_empresa.' </li>
                      <li class="list-group-item">URL: '.$url.' </li>
                    </ul>';
                print "<br/>";
                print "<br/>";
                print " <br/>";
                print " <br/>";
                print "<br/>";
                print "<br/>";

                print '<br /><a href = "../menu_empresa/perfil_evento.php">Ir para o perfil do evento</a>';

            }
            else
            {
                print "erro!";

            }


        ?>

    
    
    </body>
    
</html>
