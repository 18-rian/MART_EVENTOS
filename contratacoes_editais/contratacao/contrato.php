<!DOCTYPE html>

<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <title>Solicitação de contrato</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function()
        {
            $("#lista").click(function()
            {
                $.ajax
                ({
                  url: 'list_groups.php',
                  method: 'POST',
                  data: {},
                  success: function(voltar)
                  {
                      $('#list_of_groups').html(voltar);
                  }
                }); 
            });
        });
      
    </script>
    <style>
        #bloco_middle
        {
            display: inline-block;
            /*border: 2px solid black;*/
            padding: 2% 5% 5% 5%;        
            margin: 7% 35% 0% 35%;
            border-radius: 10px;
        }
        button 
        {
            margin-top: 9%;        
            margin-bottom: 9%;        
        }
    </style>
  </head>

  <body>
      
       <?php include("../editais/barra.php"); ?>
    <section id = "bloco_middle" class = "jumbotron">
        <h2>Grupos itinerantes</h2>
        
        <button id = "lista" class="btn btn-dark">Lista de cia e artistas</button>
        <section id = "list_of_groups">
            
        </section>
    </section>
    
   <!--<div class = "modal fade bd-example-modal-lg" id = "modal_repre" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <!--<div class="modal-header">
                    <h4 class="modal-title" id = "nome_evento">Detalhes do evento</h4>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <!--<div class="modal-body" style = "overflow: scroll;">
                    <a id = "data"></a>
                </div>

                <!-- Modal footer -->
                <!--<div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div
    </div>--->
  </body>

</html>
