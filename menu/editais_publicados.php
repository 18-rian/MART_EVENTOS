<?php
    include("../base_de_dados/conexao.php");

    $SQL_EDI = "select 
                    nome_edital, publico_alvo, descricao_edital
                FROM
                    editais;";

    $query_edi = mysqli_query($conexao, $SQL_EDI);

    if(mysqli_num_rows($query_edi) > 0) //Se verdadeiro
    {
        print '<div class="form-group col-md-6""><table class = "table table-hover">';
        print '<thead class="thead-dark">
                    <tr>
                        <th>nome_edital</th>
                        <th>Botão de acesso</th>
                        <th>Descrição</th>
                    </tr>
                </thead>';
        while($registros_edit = mysqli_fetch_assoc($query_edi))
        {
            print '<tr>';
            print '<td>'.$registros_edit["nome_edital"].'</td>';
            print '<td>'.$registros_edit["publico_alvo"].'</td>';
            print '<td>'.$registros_edit["descricao_edital"].'</td>';
            print '</tr>';
        }
        print "</table></div>";
    }
    else
    {
        print $SQL_EDI;
        print $query_edi;
    }



?>
