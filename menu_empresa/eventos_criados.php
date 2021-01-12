<!DOCTYPE html>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type = "text/javascript">
            function editar(id_evento)
            {
                $(document).ready(function()
                {
                    
                    $.ajax
                    ({
                        url: "perfil_evento.php",
                        method: "POST",
                        data: {id_evento: id_evento},
                        success: function(get_back)
                        {
                            $("body").html(get_back);

                        }
                    });    
                });
                
            }

        </script>

    </head>

    <body>
        <?php
            session_start();

            include("../base_de_dados/conexao.php");

            $SQL = 'SELECT
                        id_evento, nome, descricao, local, data_horario
                    FROM
                        eventos
                    WHERE
                        cnpj_empresa = '. $_SESSION["cnpj"].'';

            $query = mysqli_query($conexao, $SQL);

            if(mysqli_num_rows($query) > 0) //Se verdadeiro
            {
                $count = 1;
                 print '<table class="table table-hover">';
                    print '<thead>
                      <tr>
                        <th>Contação</th>
                        <th>Nome do evento</th>
                        <th>Descrição</th>
                        <th>Local</th>
                        <th>data_horario</th>
                      </tr>
                    </thead>';
                while($registros = mysqli_fetch_assoc($query))
                {

                    print '<tr><td>'.$count.'</td>';
                    print '<td>'.$registros["nome"].'</td>';
                    print '<td>'.$registros["descricao"].'</td>';
                    print '<td>'.$registros["local"].'</td>';
                    print '<td>'.$registros["data_horario"].'</td>';
                    print '<td onClick = "editar('.$registros["id_evento"].');">Para editar o evento, clique aqui</td></tr>';

                    $count = $count + 1;
                }
                print "</table>";
            }
            else
            {
                print '<a class = "display-4">Nenhum evento registrado</a>';
            }

            mysqli_close($conexao);
        
        
        ?>


    </body>
</html>
