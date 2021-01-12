<!DOCTYPE html>

<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <title>Solicitação de contrato</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    
    </script>
  </head>

  <body>
    <?php 
        session_start();
        $cnpj_temp = $_SESSION["cnpj_temp"];
        $id_evento = $_SESSION["id_evento"];
        $cnpj = $_SESSION['cnpj'];
        $nome = $_SESSION["nome"];
        
      
        include("../editais/barra.php"); 
    
    ?>
      
      <br />
    <form action = "processa.php" method="post">
        <label>Grupo contratado: </label>
        <?php print '<input type = "text" name = "nome" value = "'.$nome.'"/>' ?>
        
        <br />
        
        <label>Descrição de função:</label>
        
        <textarea id =  "descri" name = "des" value = "" class="form-control" rows="5">
            
        </textarea>
        
        <br />
        
        <input type = "submit" name = "subemter" value = "Iniciar negociação" />
      
    </form>

  </body>

</html>
