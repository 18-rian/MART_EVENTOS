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
		<script src = "menu_empresa.js"></script>
        <script>
            $(document).ready(function ()
            {
                $("#listar").click(function()
                {
                    $.ajax
                    ({
                        url: 'lista_soli.php',
                        method: 'POST',
                        data: {},
                        success: function(voltar)
                        {
                            $('#area').html(voltar);
                        }
                    });
                });

                
            });            


            function editar(id_evento)
            {
                $(document).ready(function()
                {
                    
                    $.ajax
                    ({
                        url: "auto.php",
                        method: "POST",
                        data: {id_evento: id_evento},
                        success: function(get_back)
                        {
                            window.location.href = "perfil_evento.php";
                            //$("body").html(get_back);

                        }
                    });    
                });
                
            }

        </script>
    </head>

    <body id = "perfil">
        
        <?php include("../menu_empresa/barra.php"); ?>
        <br />
        
        
        <section id = "area">
            <center>
		    <a href = "menu.php" style = "margin-botton: 5%; margin-left: 25%; margin-right: 25%; margin-top: 30%; padding: 2.5%;"><img src = "../mart.png"/></a>

        </center>
            
            <section class = "jumbotron" style = "margin-top: 5%;">
            <h2>Eventos da empresa</h2>
            <?php
				include("../base_de_dados/conexao.php");

				 $SQL = 'SELECT
                        id_evento, nome, descricao, local, data_horario, perfil_evento
                    FROM
                        eventos
                    WHERE
                        cnpj_empresa = '. $_SESSION["cnpj"].'';

				$query = mysqli_query($conexao, $SQL);
				if(mysqli_num_rows($query) > 0) //Se verdadeiro
				{
                    $count = 0;
                    print '<div class="row">';
					while($registros = mysqli_fetch_assoc($query))
					{
                        print '
                            <div class="card" style="width: 18%; margin: 40px 0px 0px 85px; background-color: black;">
                                <div>
                                    <img class="card-img-top" src= "../empresa/eventos/'.$registros["perfil_evento"].'" alt="Card image cap" style = "min-width: 35%; max-height: 300px; min-height: 300px;">
                                    <div>
                                            <div class="card-body text" style = "color: white;">
                                                <h5 class="card-title">'.$registros["nome"].'</h5>
                                                <a>
                                                    <button type="button" class="btn btn-primary font-weight-bold btn btn-light btn btn-outline-blue" onClick = "editar('.$registros["id_evento"].');">
                                                        Acessar evento
                                                    </button>
                                                </a>
                                        </div>
                                    </div>
                                </div>
			                </div>
                            ';

                       

						//print '<tr><td>'.$count.'</td>';
						//print '<td></td>';
						//print '<td>'.$registros["local"].'</td>';
						//print '<td></td>';
						//print '<td><button class=""  onClick = eve('.$registros["id_evento"].');>Acesse o evento</button></td></tr>';

                       



                        $matriz[$count] = $registros["capa_evento"];

                        $count = $count + 1;
                        
                    }

                    
                    print '</div>';
				}

                mysqli_close($conexao);
			?>
            </section>
            
            
        </section>
        
        
        
    </body>
</html>
