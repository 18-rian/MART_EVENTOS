<?php session_start(); ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            var conta = 0;
            function altera_campo(representante)
            {

                $(document).ready(function ()
                {
                    var a = $("#"+representante).attr("id");

                    if(a == 1)
                    {
                        if(conta != 10000)
                        {
                            $("#um").html('<input type = "text" id = "pega_um" value = "" class="form-control" />');
                            conta = 10000;
                        }
                        else if(conta == 10000)
                        {
                            var valor = $("#pega_um").val();

                            $.ajax
                            ({
                                url: '../menu_empresa/update.php',
                                method: 'POST',
                                data: {valor:""+valor+"",
                                      a: a},
                                success: function(get_back)
                                {
                                     //$("body").html(get_back);
                                }
                            });


                            $("#um").text(valor);


                            conta = 0;
                        }

                    }
                    if(a == 2)
                    {
                        //mudar o campo


                        if(conta != 10000)
                        {
                            $("#dois").html('<input type = "text" value = "" class="form-control" id = "pega_dois" />')
                            conta = 10000;
                        }
                        else if(conta == 10000)
                        {
                            var valor = $("#pega_dois").val();
                            $.ajax
                            ({
                                url: '../menu_empresa/update.php',
                                method: 'POST',
                                data: {valor:""+valor+"",
                                      a: a},
                                success: function(get_back)
                                {
                                     //$("body").html(get_back);
                                }
                            });


                            $("#dois").text(valor);


                            conta = 0;
                        }
                    }
                    if(a == 3)
                    {   
                        if(conta != 10000)
                        {

                            $("#tres").html('<input type = "text" value = "" class="form-control" id = "pega_tres" />')
                            conta = 10000;
                        }
                        else if(conta == 10000)
                        {
                            var valor = $("#pega_tres").val();

                            $.ajax
                            ({
                                url: '../menu_empresa/update.php',
                                method: 'POST',
                                data: {valor:""+valor+"",
                                      a: a},
                                success: function(get_back)
                                {
                                     //$("body").html(get_back);
                                }
                            });

                            $("#tres").text(valor);


                            conta = 0;
                        }
                    }
                    if(a == 4)
                    {

                        if(conta != 10000)
                        {
                            $("#quatro").html('<input type="datetime-local" value="" class="form-control" id = "pega_quatro" />')

                            conta = 10000;
                        }
                        else if(conta == 10000)
                        {
                            var valor = $("#pega_quatro").val();

                            $.ajax
                            ({
                                url: '../menu_empresa/update.php',
                                method: 'POST',
                                data: {valor:""+valor+"",
                                      a: a},
                                success: function(get_back)
                                {
                                     //$("body").html(get_back);
                                }
                            });
                            $("#quatro").text(valor);


                            conta = 0;
                        }
                    }
                    if(a == 5)
                    {

                        if(conta != 10000)
                        {

                            $("#cinco").html('<input type = "text" value = "" class="form-control" id = "pega_cinco"/>')

                            conta = 10000;
                        }
                        else if(conta == 10000)
                        {
                            var valor = $("#pega_cinco").val();

                            $.ajax
                            ({
                                url: '../menu_empresa/update.php',
                                method: 'POST',
                                data: {valor:""+valor+"",
                                      a: a},
                                success: function(get_back)
                                {
                                     //$("body").html(get_back);
                                }
                            });
                            $("#cinco").text(valor);


                            conta = 0;
                        }
                    }

                })



            }

            function excluir(id_excludente)
            {
                $(document).ready(function ()
                {
                    var resultado = confirm("Deseja mesmo exluir este evento?");
                    //alert(resultado);
                    
                    if(resultado == true)
                    {
                        $.ajax
                            ({
                                url: '../menu_empresa/excluir_evento.php',
                                method: 'POST',
                                data: {id_excludente:""+id_excludente+""},
                                success: function(get_back)
                                {
                                    $("body").html(get_back);
                                    window.location.href = "../menu_empresa/menu.php";
                                }
                            });
                    }
                    
                });
            }
        </script>
    </head>
    <body>
        <?php

            include("../menu_empresa/barra.php");
            print '<h1 class = "display-3">Informações sobre seu próprio evento</h1>';
            
            include("../base_de_dados/conexao.php");

        ?>
        <div  id = "area">
            <p id = "area_foto" style = "margin-bottom: 35%; margin-top: 5%;">
                <hr style = "border: 4px solid black;" />
                <?php 
                    include("../empresa/eventos/foto_evento_perfil_dom.php");
                ?>
            </p>
                
            <?php

                
                $sessao_exclu = $_POST["id_evento"];
               
                //print $_SESSION["id_evento"];

                //print $_POST["id_evento"];
                include("../base_de_dados/conexao.php");


                $SQL = 'SELECT
                             nome, descricao, local, data_horario, url
                        FROM
                            eventos
                        WHERE
                            id_evento = '.$_SESSION["id_evento"].';';

                $query = mysqli_query($conexao, $SQL);
                //print $SQL;

                print '<style rel="stylesheet" type="text/css">
                            .imagem{
                               background: url(lapis.png);
                               width: 46px;
                                height: 44px;
                                
                            }



                    </style>';

                if(mysqli_num_rows($query) > 0) //Se verdadeiro
                {

                    print '<table class="table table-hover">';
                    print '<thead>
                      <tr>
                        <th>Nome do evento</th>
                        <th></th>
                        <th>Descrição</th>
                        <th></th>
                        <th>Local</th>
                        <th></th>
                        <th>data_horario</th>
                        <th></th>
                        <th>url</th>
                        <th></th>
                      </tr>
                    </thead>';
                    while($registros = mysqli_fetch_assoc($query))
                    {
                        print '<tr>';
                        print '<td><a id = "um">'.$registros["nome"].'</a></td><td onClick = "altera_campo(1);" id = "1" val = "1"><img src="lapis.png" widht = "3.5%" height = "3.5%"/></td>';
                        print '<td><a id = "dois">'.$registros["descricao"].'</a></td><td onClick = "altera_campo(2);" id = "2"><img src="lapis.png" widht = "3.5%" height = "3.5%"/></td>';
                        print '<td><a id = "tres">'.$registros["local"].'</a></td><td onClick = "altera_campo(3);" id = "3"><img src="lapis.png" widht = "3.5%" height = "3.5%"/></td>';
                        print '<td><a id = "quatro">'.$registros["data_horario"].'</a></td><td onClick = "altera_campo(4);" id = "4"><img src="lapis.png" widht = "3.5%" height = "3.5%"/></td>';
                        print '<td><a id = "cinco">'.$registros["url"].'</a></td><td onClick = "altera_campo(5);" id = "5"><img src="lapis.png" widht = "3.5%" height = "3.5%"/></td></tr>';

                    }
                    print "</table><br />";

                    print '<a href = "../contratacoes_editais/menu_negociacao.php"><button class="btn btn-dark" style = "margin-left: 2%;">Realizar contratação de artistas para este evento</button></a>';

                }
                  
            ?>
            

            
            <?php print '<button  onclick = "excluir('.$sessao_exclu.');" class="btn btn-dark" style = "margin-left: 2%;">Excluir evento</button>'; ?>

        </div>    <br />
    
    </body>

</html>
