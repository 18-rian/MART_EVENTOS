

<?php session_start(); ?>
<head>
    <meta charset = "UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function meus_eventos()
        {
            //selecionar os eventos que irá comparecer. 
            $(document).ready(function ()
            {
                $.ajax
                    ({
                        url: '../menu/listar_eventos.php',
                        method: 'POST',
                        data: {},
                        success: function(get_back)
                        {
                             //$("#eventos").html(get_back);
                             
                             $("#lista").html(get_back);
                             $("#eventos").modal('show');
                        }
				    });   
            });
        }
        function acesse(evento_id)
        {
            
            $(document).ready(function ()
            {	
                $.ajax
                ({
                    url: '../inicial/transicao.php',
                    method: 'POST',
                    data: {id_evento: evento_id},
                    success: function(back)
                    {
                         
                         $("#lista_es").html(back);
                         $("#evento_especi").modal('show');
                    }
                });
            });
        }
        function editais()
        {
            $(document).ready(function ()
            {
                $.ajax
                ({
                    url: '../menu/editais_publicados.php',
                    method: 'POST',
                    data: {},
                    success: function(volta)
                    {
                         $("#edital").html(volta);
                         $("#edi").modal('show');
                    }
                });
            });
        }
       $(document).ready(function(){
       $("#barra").on("input", function () {
            var word = $("#barra").val();
            $.ajax
            ({
                url: '../inicial/select.php',
                method: 'POST',
                data: {word: word},
                success: function(retorno)
                {
                    if(retorno == "foi")
                    {
                        
                        window.location.href = "../inicial/transicao_com.php";    
                        
                    }
                    else
                    {
                        $("#pes").html(retorno);    
                    }



                }

            });
        });
    });
        
    </script>
</head>

<nav class="navbar navbar-expand-sm navbar-dark navbar-static-top fixed-top" style = "background-color: red;">
    <a class="navbar-brand" href="../menu/perfil_usua.php"> <?php echo '<img src="'.$_SESSION["perfil"].'" style = "width: 5%; min-width: 25%; max-height: 80px; min-height: 80px;"/>     '; print "  Bem vindo á MART,".$_SESSION['nome'].""; ?></a>
    <ul>
        <li>
            <a href = "../menu/menu.php" style = "margin-left: 50%;"><img src = "../logoti.png" style = " height: 50px;"/></a>
            <form class="form-inline my-2 my-lg-0" style = "margin-left: 30%;">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" id = "barra" list = "pes" style = "width: 700px;display: block-inline; border-bottom: 4px solid black;">
                        
                <datalist id = "pes">

                 </datalist>
            
            </form>
        </li>
    </ul>
      <ul class="navbar-nav" style = "margin-left: 180px; color: white;">
        <li class="nav-item">
          <a class="nav-link" onClick = "meus_eventos();" data-target="#eventos" style = "color: white; border-bottom: 6px solid black;">Eventos marcados</a>
        </li>
          <?php
                if ($_SESSION['editais_s_n'] == "Sim")
                {
                    print '<li class="nav-item">
                        <a class="nav-link" onClick = "editais();" style = "color: white; border-bottom: 6px solid black;" data-target="#editais">Editais publicados.</a>
                    </li>';    
                }
                
            ?>
        <p class="text-right"></p>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href = "../menu/logout.php" style = "color: white; border-bottom: 6px solid black; height: 65px;">Logout</a>
            </li>
          </ul>
        </ul>
</nav>
    <div class = "modal fade bd-example-modal-lg" id = "eventos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id = "nome_evento">Lista de eventos</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <a id = "lista"></a>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        
    </div>
    

    <div class = "modal fade bd-example-modal-lg" id = "evento_especi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id = "nome_edital">Detalhes do evento</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <a id = "lista_es"></a>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


    </div>

    <div class = "modal fade bd-example-modal-lg" id = "edi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id = "nome_edital">Lista de editais</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <a id = "edital"></a>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


    </div>

    
            
