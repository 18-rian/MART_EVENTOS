<?php
    session_start();
    $id = $_SESSION["id"];

    include("../base_de_dados/conexao.php");

    $SQL_list = "select
	               publico.evento_id, eventos.nome
                FROM 
		          publico
                INNER JOIN eventos
                    ON 
	           publico.cliente_id = $id AND eventos.id_evento = publico.evento_id;";

    $query_list = mysqli_query($conexao, $SQL_list);
    if(mysqli_num_rows($query_list) > 0) //Se verdadeiro
    {
        print '<div class="form-group"><table class = "table table-hover">';
        print '<thead class="thead-dark">
                    <tr>
                        <th>Nome do evento</th>
                        <th>Botão de acesso</th>
                    </tr>
                </thead>';
        while($registros_list = mysqli_fetch_assoc($query_list))
        {
            print '<tr>';
            print '<td>'.$registros_list["nome"].'</td>';
            print '<td><button class="font-weight-bold btn btn-light btn btn-outline-dark" onClick = acesse('.$registros_list["evento_id"].');>Acesse o evento</button></td></tr>';
        }
        print "</table></div>";
    }
    else
    {
        print "<h1>Sem evento</h1>";
        
    }

    mysqli_close($conexao);

?>
