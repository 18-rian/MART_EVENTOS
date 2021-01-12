<head>
    <meta charset = "UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<script>
    function transi(id)
    {
        $(document).ready(function ()
        {
            
            $.ajax
            ({
                url: '../inicial/passagem.php',
                method: 'POST',
                data: {id:id},
                success: function(get_back)
                {
                    $("body").html(get_back);
                    window.location.href = "../inicial/transicao_com.php";

                }
                
            });
        });
    }
</script>

<?php
	session_start();
	

	
	include("../base_de_dados/conexao.php");   

	//include("../empresa/eventos/foto_evento_perfil.php");
    
    $id = $_POST["id_evento"];

	$SQL = 'SELECT
				id_evento, nome, descricao, local, data_horario, url, capa_evento
			FROM
				eventos
			WHERE
				id_evento = '.$id.';';
	
    $query = mysqli_query($conexao, $SQL);

	if(mysqli_num_rows($query) > 0) //Se verdadeiro
	{
		print '<table>';
		
		while($registros = mysqli_fetch_assoc($query))
		{
			
			//$registros["nome"];
			//$registros["descricao"];
			//$registros["local"];
			//$registros["data_horario"];
			
			
			print '<tr><th>Capa do evento:</th><td><img src= "../empresa/eventos/'.$registros["capa_evento"].'" height= "345px" width="90%"/></td></tr>';
			print '<tr><th>Nome do evento:</th><td>'.$registros["nome"].'</td></tr>';
			print '<tr><th>Descrição do evento:</th><td>'.$registros["descricao"].'</td></tr>';
			print '<tr><th>Data e horário:</th><td>'.$registros["data_horario"].'</td></tr>';
            print '<tr><th>Local do evento:</th><td>'.$registros["local"].'</td></tr>';
            print '<tr><th>Página do evento:</th><td><button class="btn btn-primary" data-target="#evento_especi" onClick = "transi('.$registros["id_evento"].');">Acessar página</button></td></tr>';
			
        }
        

		print "</table>";
		//$publico = mysqli_num_rows($query_two);
		
			
	}    
	
	
	
	
	
?>
