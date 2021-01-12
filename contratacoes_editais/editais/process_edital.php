<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <title>Armazenando editais</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>

  <body>
      <?php
        session_start();

        include("conexao.php");

        $SQL = 'INSERT INTO editais
                            (nome_edital, data_de_publicacao, publico_alvo, arquivo, empresa_cnpj, descricao_edital)
                        VALUES ("'.$_POST["name_edital"].'", "'.$_POST["data_edital"].'", "'.$_POST["alvo"].'", "'.$_POST["arquivo"].'",'.$_SESSION["cnpj"].', "'.$_POST["descricao"].'")';

        $query = mysqli_query($conexao, $SQL);

        var_dump($query);



        print "<h1>Edital publicado</h1>";
        print '<br /><a href = "armazenamento_editais.php">Voltar</a>';


      ?>

     
  </body>

</html>

