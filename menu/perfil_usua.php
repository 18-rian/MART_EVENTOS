<!DOCTYPE html>

<hmtl>
    <head>
        <title>Perfil</title>

        <meta charset = "UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
			function eve(id_evento)
			{
				
				$.ajax
                ({
                    url: '../inicial/transicao.php',
                    method: 'POST',
                    data: {id_evento:id_evento},
                    success: function(get_back)
                    {
                         $("#data").html(get_back);
                         $("#modal_repre").modal('show');
                    }
				});
            }
            $(document).ready(function()
            {
                $("#table").on("input", function ()
                {
                    var word_two = $("#table").val();
                    $.ajax
                    ({
                        url: '../inicial/select_two.php',
                        method: "POST",
                        data: {word_two: word_two},
                        success: function(retorna)
                        {
                            
                            $("#area_alvo").html(retorna);    
                            
                        }
                    });
                })
            });
		</script>
        
    
    </head>
    <body>
        
        <?php 
            include("barra_usu.php");

       
            session_start();
            //var_dump($_SESSION["capa"]);
            print '<div><img src = "'.$_SESSION["capa"].'" height= "450px" width="100%" style = "margin-top: 8%; filter: blur(4px); position:absolute; left:1px; top:1px; z-index: 1;" />';
            print '<img src = "'.$_SESSION["perfil"].'" height= "250px" width="250px" style = "margin-top: 23%; margin-left: 2%; position:absolute; left:1px; top:1px; z-index: 2;" />';
            print '<h5 style = "margin-top: 40%;letter-spacing: 3px; font-family: arial">
                        <span style="font-weight:bold; margin-left: 20%; margin-top: 1000px; height: 400px;">'.$_SESSION["nome"].' </span>
                    <a style = "font-family: arial; font-weight:bold; margin-top: -20%;">
                        '.$_SESSION["sobrenome"].'                     
                    </a>
                    </h5>
                    </div>';

            print '<hr style = "border: 8px solid black; background-color: black;"/>';

            //eventos que o usuário participou

            include("../base_de_dados/conexao.php");

            $SQL = 'SELECT nome FROM eventos right JOIN publico ON cliente_id = '.$_SESSION["id"].' AND evento_id = id_evento;';

           

            $query_table = mysqli_query($conexao, $SQL);

            if(mysqli_num_rows($query_table) > 0) //Se verdadeiro
            {
                print '<table class = "table table-hover">';
                print '<thead class="thead-dark">
                        <tr><th colspan = "2" style = "text-align: center;">HISTÓRICO DE EVENTOS</th></tr>
                            <tr>
                                <th></th>
                                <th>Nome do evento</th>
                            </tr>
                        </thead>';
                while($registros_table = mysqli_fetch_assoc($query_table))
                {
                    if($registros_table["nome"] != null)
                    {
                        print '<tr>';
                        print '<td></td>';
                        print '<td>'.$registros_table["nome"].'</td></tr>';    
                    }

                }
                print "</table>";
            }
            else
            {
                print "<h1>Sem evento</h1>";

            }
            mysqli_close($conexao);
            

        ?>
        
    </body>
</hmtl>

