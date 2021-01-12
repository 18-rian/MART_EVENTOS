<!DOCTYPE html>

<html lang="pt-BR">
    
    <head>
        <meta charset = "UTF-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            function s_n(repre)
            {
                var x = document.getElementById("here").value;
                
                if(x == 'aceitar')
                {
                    alert("O contratante irá entrar em contato com você!"); 
                    $(document).ready(function ()
                    {
                        var y = 1;
                        $.ajax
                        ({
                            url: 'resposta.php',
                            method: 'POST',
                            data: {y: y,
                                  repre: repre},
                            success: function(back)
                            {
                                $("#"+repre+'').html(back);
                            }
                        });
                    
                    });
                }
                else
                {
                    alert("Contrato recusado.");
                    $(document).ready(function ()
                    {
                        var y = 2;
                        $.ajax
                        ({
                            url: 'resposta.php',
                            method: 'POST',
                            data: {y: y,
                                  repre: repre},
                            success: function(back)
                            {
                                $("#"+repre+'').html(back);
                            }
                        });
                    
                    });
                }
                
                
                window.location.reload();
            }
        
        </script>
    </head>
    
    <body>
    
        <?php 
    
            session_start();

            $cnpj = $_SESSION["cnpj"];

            include("../base_de_dados/conexao.php");

            $sql = 'SELECT 
                        *
                    FROM
                        contratacao
                    WHERE 
                        grupos_itinerantes_contratado = '.$cnpj.' AND situacao = 1; ';

            $query = mysqli_query($conexao, $sql);



            if(mysqli_num_rows($query) > 0) //Se verdadeiro
            {
                print '<center class = "display-1">Notificações</center>';
                print '<table class="table table-hover table-bordered">';
                print "<tr>";
                print '<td>Nome do evento:</td>';
                print '<td>Data do evento:</td>';
                print '<td>Local:</td>';
                print '<td>Empresa:</td>';
                print '<td>Descrição:</td>';
                print '<td>Resposta:</td>';
                print '</tr>';
                
                $cont = 0;
                while($registros = mysqli_fetch_assoc($query))
                {   
                    $a[$cont] = $registros["id_contrato"];
                    
                    
                    print '<tr id = "$cont">';
                    
                    $sql_two = 'SELECT
                                    eventos.nome, eventos.data_horario, eventos.local, empresa.nome_empresa
                                FROM
                                    eventos, empresa
                                WHERE
                                    eventos.id_evento = '.$registros["eventos_id_evento"].'
                                    AND empresa.cnpj = '.$registros["eventos_cnpj_empresa"].'';

                    $query_two = mysqli_query($conexao, $sql_two);

                    //fazer a pegada dos dados!

                    while($registro_two = mysqli_fetch_assoc($query_two))
                    {

                        print '<td>'.$registro_two["nome"].'</td>';
                        print '<td>'.$registro_two["data_horario"].'</td>';
                        print '<td>'.$registro_two["local"].'</td>';
                        print '<td>'.$registro_two["nome_empresa"].'</td>';
                        print '<td>'.$registros["descricao_funcao"].'</td>';
                        print '<td><select name="respo" id = "here" onchange = "s_n('.$a[$cont].');">
                                        <option>...</option>
                                        <option value = "aceitar">Aceitar</option> 
                                        <option value = "recusar">Recusar</option>
                                    </select></td>';
                    }

                    print '</tr>';

                }
                print "</table>";
            }
            else
            {
                print "Nenhuma solicitação";
            }





        ?>
    
    </body>


</html>

