<?php
    session_start();

    include("../base_de_dados/conexao.php");

    $SQL = "SELECT 
                 nome, descricao, local, data_horario
            FROM
                eventos";


    $query = mysqli_query($conexao, $SQL);

    if(mysqli_num_rows($query) > 0) //Se verdadeiro
    {
        $count = 0;
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
            print '<td>'.$registros["data_horario"].'</td></tr>';

            $count = $count + 1;
        }
        print "</table>";

       

    }
    
?>