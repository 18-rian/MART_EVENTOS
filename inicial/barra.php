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
        $(document).ready(function(){
               $("#barra").on("input", function (){
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
<div>
            <nav class="navbar navbar-expand-sm navbar-red navbar-static-top fixed-top navbar-light" style = "background-color: red; man-height: 1%; min-height: 1%;">
                <section class = "area_login">
                    <ul class="navbar-nav">
                         <ul class="nav justify-content-end">
                            <section id = "login">
                                <li class="nav-item">
                                  <a class="font-weight-bold btn btn-light btn btn-outline-dark nav-link" style = "margin: 0px 12px 5px 0px;" id = "click_login" data-target="#modalPoll-1" data-toggle="modal"> <button style = "background-color: white; border: none; color: black; padding: 4px 4px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px;">Login</button></a>
                                </li>
                                <div>
                                    <?php include ("../inicial/modal_form.php")?>
                                </div>
                                
                            </section>


                             <section id = "comum">
                                 <li class="nav-item">
                                    <a id = "click_comum" class="font-weight-bold btn btn-light btn btn-outline-dark nav-link" style = "margin: 0px 10px 5px 0px; text-decoration: none;" href = "../comum/cadastro.php"><button style = "background-color: white; border: none; color: black; padding: 4px 4px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px;">Realizar cadastro comum</button></a>
                                </li>
                            </section>
                            
                            <section>
                                <li class="nav-item">
                                  <a class="nav-link font-weight-bold btn btn-light btn btn-outline-dark" id = "click_empre" style = "text-decoration: none; margin: 0px 10px 5px 0px;" href = "../empresa/form_empre.php"><button style = "background-color: white; border: none; color: black; padding: 4px 4px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px;">Realizar cadastro empresarial</button></a>
                                 </li>
                            </section>
                        </ul>
                    </ul>
                </section>
                <a href = "pagina_inicial.php" style = "margin-left: 8%;">
                    <img src = "../logoti.png" style = "height: 50px; margin-left: 10%; "/>
                </a>
            <!--barra de pesquisa-->

         <form class="form-inline my-2 my-lg-0" style = "margin-left: 16%;">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" id = "barra" list = "pes" style = "width: 450px; display: inline-block; border-bottom: 8px solid black;">
            
            <datalist id = "pes">

            </datalist>
         </form>
            </nav>
            
         </div>
