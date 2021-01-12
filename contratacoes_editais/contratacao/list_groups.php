<!DOCTYPE html>

<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <title>Solicitação de contrato</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        function negocia(cnpj)
        {
            
            $(document).ready(function()
            {
                $.ajax
                ({
                  url: 'puxador.php',
                  method: 'POST',
                  data: {cnpj: cnpj},
                  success: function(voltar)
                  {
                      $('body').html(voltar);
                  }
                });
            });
        }
    </script>
  </head>

  <body>
    <?php
        include("conexao.php");

         $SELECT = "SELECT 
               cnpj_itine, nome
            FROM 
                grupos_itinerantes
            ";

            $query = mysqli_query($conexao, $SELECT);


            if(mysqli_num_rows($query) > 0) //Se verdadeiro
            {
                print '<table class="table table-hover" style = "border-radius: 10px;">';
                while($registros = mysqli_fetch_assoc($query))
                {
                    print "<tr>";
                    print '<td style = "text-align: center; vertical-align: middle;">'.$registros["nome"].'</td>';
                    print '<td onClick = "negocia('.$registros["cnpj_itine"].');" class="btn btn-white"><button>Negociar com o grupo</button></td>';
                    print "</tr>";
                }
                print "</table>";

            }
      
      //'".$registros['cnpj_itine']."', '".."'
    ?>
      
      

  </body>

</html>




