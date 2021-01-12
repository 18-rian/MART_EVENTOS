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
			
		</script>
        
    
    </head>
    <body>
        
        <?php 
            include("barra.php");

            print '<div id = "area">';
            session_start();
            //var_dump($_SESSION["capa"]);
            print '<div><img src = "'.$_SESSION["capa"].'" height= "450px" width="100%" style = "margin-top: 8%; filter: blur(4px); position:absolute; left:1px; top:1px; z-index: 1;" />';
            print '<img src = "'.$_SESSION["perfil"].'" height= "250px" width="250px" style = "margin-top: 23%; margin-left: 2%; position:absolute; left:1px; top:1px; z-index: 2;" />';
            print '<h5 style = "margin-top: 32%;letter-spacing: 3px; font-family: arial">
                        <span style="font-weight:bold; margin-left: 20%; height: 400px;">'.$_SESSION["nome_empresa"].' </span>
                    
                    </h5>
                    </div>';

            print '<hr style = "border: 8px solid black; background-color: black;"/>';

            //eventos que o usuário participou

            include("../base_de_dados/conexao.php");

            $SQL = 'SELECT nome FROM eventos where cnpj_empresa = '.$_SESSION['cnpj'].'';

           

            $query_table = mysqli_query($conexao, $SQL);

            if(mysqli_num_rows($query_table) > 0) //Se verdadeiro
            {
                print '<table class = "table table-hover">';
                print '<thead class="thead-dark">
                        <tr><th colspan = "2" style = "text-align: center;">HISTÓRICO DE EVENTOS DA EMPRESA</th></tr>
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
        </div>
    </body>
</hmtl>

