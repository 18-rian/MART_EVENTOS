<?php
  include("conexao.php");

  session_start();

  $SQL = 'SELECT
            nome_edital, data_de_publicacao, publico_alvo, arquivo, empresa_cnpj, descricao_edital
          FROM
            editais
          WHERE
            empresa_cnpj = '.$_SESSION["cnpj"].'';

  $query = mysqli_query($conexao, $SQL);

  if(mysqli_num_rows($query) > 0) //Se verdadeiro
  {
      print '<table class="table table-hover" style = "margin-bottom: 5%;">';
      print '<thead><th colspan = "5">Informações</th></thead>';
      while($registros = mysqli_fetch_assoc($query))
      {
          print '<tr>';
          print '<td>'.$registros["nome_edital"].'</td>';
          print '<td>'.$registros["data_de_publicacao"].'</td>';
          print '<td>'.$registros["publico_alvo"].'</td>';
          print '<td>'.$registros["arquivo"].'</td>';
          print '<td>'.$registros["descricao_edital"].'</td>';
          print '</tr>';
      }
      print "</table>";



  }
?>
