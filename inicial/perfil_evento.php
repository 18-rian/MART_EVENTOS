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
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<title><?php $_SESSION["id_evento"]; ?></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
            
            function sair(a)
            {
                $.ajax
                    ({
                        url: '../inicial/saindo.php',
                        method: 'POST',
                        data: {a:a},
                        success: function(get_back)
                        {
                             $("body").html(get_back);
                        }
                    });
                alert("Desmarcou presença do evento.");
                window.location.reload();
            }
			function botao(a)
			{
                
                if(a == 00)
                {
                    alert("Para participar do evento é necessário a realização de um login!");
                    $('#logado').append('<h1>Realize seu login</h1><form action = "verifica.php" method = "POST"><label>E-mail:</label><input type  = "mail" name = "mail" value = "" /><label>Senha</label><input type = "password" name = "senha" value = "" /><input type = "submit" name = "Submeter" value = "Logar"/><input type = "reset" name = "resetar" value = "limpar"/></form>');
                }
                else
                {
                    
                    $.ajax
                    ({
                        url: '../inicial/confirm_presen.php',
                        method: 'POST',
                        data: {a:a},
                        success: function(get_back)
                        {
                             $("body").html(get_back);
                        }
                    });
                    
                    alert("Presença confirmada no evento.");
                    window.location.reload();
                }
			}
			function botao_cadastro()
			{
				$('#area_cadas').append('<h1>Seja um cliente MART</h1><form action = "../comum/processa.php" method = "POST"><label>Nome:</label> <input type = "text" name = "nome" value = "" required /><label>Sobrenome:</label> <input type = "text" name = "sobrenome" value = "" required/><br /><label>E-mail:</label> <input type = "text" name = "mail" value = "" required/><label>Senha: </label> <input type = "password" name = "senha" value = "" required/><br /><label>Data de nascimento:</label> <input type = "date" name = "data" value = "" required/> <label>Cidade: </label> <input type = "text" name = "city" value = "" required/><br /><label>Deseja estar ciente sobre seleções de grupos artísticos ou a abertura de editais?</label> Sim<input type = "radio" name = "editais" value = "Sim" /> Não<input type = "radio" name = "editais" value = "Nao" /> <br /> <input type = "submit" name = "submeter" value = "Enviar" required/><input type = "reset" name = "resetar" value = "Limpar" required/></form>');
			}
            
            function url(url)
            {
                
                window.open(url);
                
            }
		</script>
	</head>

	<body>
        
        <?php
            if($true == 00)
            {
                print '<h1> <a href = "pagina_inicial.php">Bem vindo ao MART</a></h1>';        
            }
            else
            {
                print '<h1> <a href = "../menu/menu.php">Bem vindo ao MART</a></h1>';
            }
        ?>
		<h3>Tabela de informações do evento</h3>
		<?php
			include("../base_de_dados/conexao.php");

        ?>

        <p id = "area_foto">
            <?php 
                include("../empresa/eventos/foto_evento_perfil.php");
            ?>
        </p>

        <?php
			$SQL = 'SELECT
						 id_evento, nome, descricao, local, data_horario, url
					FROM
						eventos
					WHERE
				        id_evento = '.$_SESSION["id_evento"].';';
            
			$query = mysqli_query($conexao, $SQL);

			if(mysqli_num_rows($query) > 0) //Se verdadeiro
			{
				
				while($registros = mysqli_fetch_assoc($query))
				{
					print '<span style="font-weight:bold;">'.$registros["nome"].'</span>';
                    //$registros["descricao"];
                    //$registros["local"];
                    //$registros["data_horario"];
                    
                    $SQL_TWO = 'SELECT * FROM publico WHERE evento_id = '.$_SESSION["id_evento"].';';
                    
                    $query_two = mysqli_query($conexao, $SQL_TWO);
                    
                    $publico = mysqli_num_rows($query_two);
                    
                    $data_evento = $registros["data_horario"];
                    $url = $registros["eventos.url"];
				}
				
			 
                    
                }    
            
		?>

		<br />
        <?php 
            $repree = $_SESSION["id_evento"];
            $SQL_two = 'SELECT * FROM publico WHERE cliente_id = '.$true.' AND evento_id = '.$repree.';';
                
            $query_twoo = mysqli_query($conexao, $SQL_two);
            
            if(mysqli_num_rows($query_twoo) > 0) //Se verdadeiro
			{
                $data_atual = date('y/m/d H:i:s');
                if($data_evento >= $data_atual)
                {
                    print '<br /><button onclick = url("'.$url.'");>Entrar na sala do evento!</button>';
                }

                print '<section id = "fazendo_logando">
			             <button onclick = "sair('.$true.');" class="font-weight-bold btn btn-light btn btn-outline-dark" >Deixar evento</button>
			             <div id = "logado"></div>
		              </section>';
            }
            else
            {
                print '<section id = "fazendo_logando">
			             <button onclick = "botao('.$true.');" class="font-weight-bold btn btn-light btn btn-outline-dark" >Participar do evento</button>
			             <div id = "logado"></div>
		              </section>';
            }
            
        ?>
		

		<?php 
            if($true == 00)
            {
                print '<section>
                            <button onclick = "botao_cadastro();" class="font-weight-bold btn btn-light btn btn-outline-dark" >Se cadastrar na aplicação</button>
                            <div id = "area_cadas"></div>
                        </section>
                        ';    
            }
            mysqli_close($conexao);
        ?>
        
       
	</body>

</html>
