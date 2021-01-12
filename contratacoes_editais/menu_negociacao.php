<?php session_start(); ?>

<!DOCTYPE html>

<html>
  <head>
      <title>Menu - Negócios</title>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script>
          function lista_con(id)
          {
              
              $(document).ready(function()
              {
                 $.ajax
                 ({
                      url: 'situacao.php',
                      method: 'POST',
                      data: {id: id},
                      success: function(back)
                      {
                          $('#lisedi').html(back);
                      }
                 });
              });
          }
          function lista_edital()
          {
              $(document).ready(function()
              {
                //Fazer o listamento
                $.ajax
                 ({
                      url: 'lis_edi.php',
                      method: 'POST',
                      data: {},
                      success: function(volt)
                      {
                          $('#lisedi').html(volt);
                      }
                 });
              });
          }
      </script>
  </head>
  <body>
      
    <?php include("../menu_empresa/barra_one.php"); ?>
    <h1>Página de realização de contratação de grupos itinerantes</h1>
    
    <section id = "area_1">
        <table class="table table-hover">
            <tr>
                <td><a href = "editais/armazenamento_editais.php"><button class="btn btn-white">Públicar edital cultural!</button></a></td>
                <td><a href = "contratacao/contrato.php"><button class="btn btn-white">Realizar negociação direta com grupos itinerantes</button></a> </td>
            </tr>
        
        </table>
        
        <br /> 
    
    </section>
    
    <section id = "area_2">
        
        
        <table class="table table-hover">
            <tr>
                <td><!--Estado de negociação -->
                    <?php print '<button class="btn btn-white" onclick = "lista_con('.$_SESSION["id_evento"].');">Andamento das conversas</button>'; ?>
                   </td>
                <td><button onclick = "lista_edital();" class="btn btn-white">Lista de editais públicados</button>
                </td>
            </tr>
        
        </table>
        
        <a id = "lisedi"></a>
      
        
        <!--Lista de editais -->
        <br />
        <br />
        
    </section>
      
    
  </body>
</html>
