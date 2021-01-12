<!DOCTYPE html>

<hmtl>
    <head>
        <title>Menu</title>

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
    <body class =  ".display-3">
        
        <?php include("barra_usu.php") ?>
        <center style = "margin-top: 5%;" >
		    <a href = "../menu/menu.php" style = "margin-left: 25%; margin-right: 25%; padding: 2.5%;"><img src = "../mart.png" style = "margin-top: 5%;"/></a>
            <h2 style = "margin-bottom: 5%;">ACOMPANHE OS EVENTOS QUE RODAM A SUA REGIÃO</h2>
            <hr style = "border: 8px solid black; background-color: black;" />
        </center>
        <section class = "area_eventos" style = "margin-top: 5%; margin-left: 10%; margin-right: 10%;">

            <div>
                <?php include("../inicial/slides.php"); ?>
        
            </div>
         </section>

        <section class = "jumbotron" style = "margin-left: 10%; margin-right: 10%; margin-top: 5%;">
            <input type = "search" class="form-control mr-sm-2" style = "width: 100%; height: 35px; border-radius: 6px; border: none; border-bottom: 5px solid black;" placeholder="Digite o nome da cidade ou o nome do evento" id = "table"/> <!--Pesquisar o nome do evento -->
            
            <hr />
			<?php
				include("../base_de_dados/conexao.php");

				$SQL = "SELECT 
                            id_evento, nome, descricao, local, data_horario, perfil_evento, capa_evento
						FROM
                            eventos";
                            
                $query = mysqli_query($conexao, $SQL);
                
				if(mysqli_num_rows($query) > 0) //Se verdadeiro
				{
                    print '<div class="row" id = "area_alvo">';
					while($registros = mysqli_fetch_assoc($query))
					{
                        if($registros["data_horario"] >= date("Y-m-d H:i:s"))
                        {

                        print '<div class="card" style="width: 20%; margin: 50px 0px 10px 50px; background-color: black;">
                                    <img class="card-img-top" src= "../empresa/eventos/'.$registros["perfil_evento"].'" alt="Card image cap" style = "min-width: 20%; max-height: 300px; min-height: 300px;">
                                    <div class="card-body" style = "color: white;">
                                        <h5 class="card-title">'.$registros["nome"].'</h5>
                                        <p class="card-text">Descrição do evento: '.$registros["descricao"].'</p>
                                        <p class = "card-text">Momento: '.$registros["data_horario"].'</p>
                            
                            
                                        <a>
                                            <button type="button" class="btn btn-primary font-weight-bold btn btn-light btn btn-outline-dark" data-toggle="modal" data-target="#modal_repre" onClick = "eve('.$registros['id_evento'].');">Acessar evento</button></td>
                                        </a>

                                
                                    </div>
                                </div>';        

                        $count = $count + 1;
                        
                        print '<div class = "modal fade bd-example-modal-lg" id = "modal_repre" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id = "nome_evento">Detalhes do evento</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <a id = "data"></a>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
			            </div>
                            ';
                        }
					};
					
                };
                print "</div>"

                
			?>
		</section>
    
    </body>
</hmtl>

