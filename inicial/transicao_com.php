<?php
 	session_start();
   
   if(!empty($_SESSION["id"]))
   {
        //se ela existir
        $true = $_SESSION["id"];
        
        
   }
    else
    {
        $true = 00;
    }
    
?>

<!DOCTYPE html>

<html lang = "pt-BR">
	<head>
		<meta charset = "UTF-8" />
		<title><?php //$_SESSION["id_evento"]; ?></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		    <script>
            
                function sair(a, b)
                {
                    
                    $.ajax
                        ({
                            url: '../inicial/saindo.php',
                            method: 'POST',
                            data: {a:a, 
                                    b: b},
                            success: function(get_back)
                            {
                                 $("body").html(get_back);
                            }
                        });
                    alert("Desmarcou presença do evento.");
                    window.location.reload();
                }
			    function botao(a, b)
			    {
                    
                    if(a == 00)
                    {
                        alert("Para participar do evento é necessário a realização de um login!");
                        //$('#logado').append('<h1>Realize seu login</h1><form action = "verifica.php" method = "POST"><br /><label>E-mail:</label><input type  = "mail" name = "mail" value = "" /><br /><label>Senha</label><input type = "password" name = "senha" value = "" /><br /><input type = "submit" name = "Submeter" value = "Logar"/><br /><input type = "reset" name = "resetar" value = "limpar"/></form>');
                    }
                    else
                    {
                        
                        $.ajax
                        ({
                            url: '../inicial/confirm_presen.php',
                            method: 'POST',
                            data: {a:a,
                                    b:b},
                            success: function(get_back)
                            {
                                 $("body").html(get_back);
                            }
                        });
                        
                        alert("Presença confirmada no evento.");
                        window.location.reload();
                    }
			    }
			    
                function url(url)
                {
                    
                    window.open(url);
                    
                }
		    </script>
            
        </head>

	<body>

        
            <?php
                                                
                
                if(isset($_POST["id"]))
                {
                    $id_c = $_POST["id"];
                    $_SESSION["id_evento"] = $id_c;

                    //print "oiiiiiiii";
                   
                }
                else if(isset($_SESSION["id_evento"]))
                {
                    
                    $id_c = $_SESSION["id_evento"]; 
                    
                }


                
                if($true == 00)
                {
                    
                   
                   print '<div>';
                    include("../inicial/barra.php");
                    print '</div>';
                }
                else
                {
                    
                    include("../menu/barra_usu.php");
                }
            ?>
            <p id = "area_foto" style = "margin-bottom: 50%;">
                <?php 
                    include("../empresa/eventos/foto_evento_perfil.php");
                    
                ?>
            </p>
            
		    <?php
			    include("../base_de_dados/conexao.php");

            ?>

            <div>

            <?php
			    $SQL = 'SELECT
						     id_evento, nome, descricao, local, data_horario, url
					    FROM
						    eventos
					    WHERE
				            id_evento = '.$id_c.';';
                
			    $query = mysqli_query($conexao, $SQL);

			    if(mysqli_num_rows($query) > 0) //Se verdadeiro
			    {
				    
				    while($registros = mysqli_fetch_assoc($query))
				    {

                        //
                        //$registros["local"];

                        print '<br /><p><div class = "jumbotron" style = "display: inline-block; margin-left: 10%; width:45%; border-top: 8px solid black;">'.$registros["descricao"].'</div></p>';
                        
                        
                        $SQL_TWO = 'SELECT * FROM publico WHERE evento_id = '.$id_c.';';
                        
                        $query_two = mysqli_query($conexao, $SQL_TWO);
                        
                        $publico = mysqli_num_rows($query_two);
                        
                        
                        $data_evento = $registros["data_horario"];
                        $url = $registros["eventos.url"];
				    }
				    session_start();
			        
                    print '<div class = "jumbotron" style = "display: inline-block; border-top: 8px solid black; margin-left: 10%; margin-top: 1%; width:45%;">
                            <table>
                                <tr><th>Público:</th><td>'.$publico.' pessoas confirmadas</td></tr>
                               
                            </table> 

                           </div>';
			     
                        
                    }    
                
		    ?>

		    <br />
            
		    <?php 
                $repree = $id_c;
                
                $SQL_two = 'SELECT * FROM publico WHERE cliente_id = '.$true.' AND evento_id = '.$repree.';';
                    
                $query_twoo = mysqli_query($conexao, $SQL_two);
                print '<div class = "jumbotron" style = "display: inline-block; border-top: 8px solid black; margin-left: 60%; margin-top: -250px; height: 90%; vertical-align: text-top;>';
                if(mysqli_num_rows($query_twoo) > 0) //Se verdadeiro
			    {
                    
                    
                    $data_atual = date('y/m/d H:i:s');
                    if($data_evento == $data_atual)
                    {
                        print '<br /><button class = "font-weight-bold btn btn-outline-dark btn btn-primary" style = "margin-left: 2%;" onclick = url("'.$url.'");>Entrar na sala do evento!</button>'; 
                        
                    }

                    print '<section id = "fazendo_logando">
			                 <button style = "margin-left: 2%; margin-top: 1%;" onclick = "sair('.$true.', '.$id_c.');" class="font-weight-bold btn btn-outline-dark btn btn-primary">Deixar evento</button>
			                 <div id = "logado" style = "margin-top: 10%;"></div>
		                  </section>';
                }
                else
                {
                    print '<section id = "fazendo_logando">
			                 <button style = "margin-right: 10%; margin-top: 1%;" onclick = "botao('.$true.', '.$id_c.');" class="font-weight-bold  btn btn-outline-dark btn btn-primary" data-target="#modalPoll-1" data-toggle="modal">Participar do evento</button>
			                 <div id = "logado" style = "margin-top: 1%;"></div>
		                  </section>
                        ';
                    if($true == 00)
                    {
                        print "<div>";
                              include ("../inicial/modal_form.php");
                        print "</div>";
                    }

                }
                
            ?>

		    <?php 
                if($true == 00)
                {
                    print '
                                <a href = "../comum/cadastro.php"><button style = "margin-left: 60%%;" class="font-weight-bold btn btn-outline-dark btn btn-primary">Se cadastrar na aplicação</button></a>
                                <div id = "area_cadas"></div>
                            
                            ';    
                }
                mysqli_close($conexao);
            ?>
            </div>
        </div>
       
	</body>

</html>
