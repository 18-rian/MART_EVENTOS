<?php 
    
    session_start();
    
    $id_evento = $_POST["id"];
    $id_empre = $_SESSION['cnpj'];


    include("../base_de_dados/conexao.php");
    
    $sql = 'SELECT 
                grupos_itinerantes_contratado, situacao
            FROM 
                contratacao
            WHERE
                eventos_id_evento = '.$id_evento.' AND eventos_cnpj_empresa = '.$id_empre.'';

    $query = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($query) > 0) //Se verdadeiro
    {
        while($registros = mysqli_fetch_assoc($query))
        {
            $situa = $registros["situacao"];
            
            if($situa == 1)
            {
                print 'Aguardando resposta do grupo <br />';
            }
            else if($situa == 2)
            {
                print "<center>Negociação realizada com sucesso. Entrar em contato para resolver todos os outros detalhes da negociação.</center>";
                
                $cnpj_itine = $registros['grupos_itinerantes_contratado'];
                
                $sql_two = "SELECT 
                                nome_empresa, email
                            FROM 
                                empresa
                            WHERE
                                cnpj = ".$cnpj_itine."";
                
                $query_two = mysqli_query($conexao, $sql_two);
                
                if(mysqli_num_rows($query_two) > 0) //Se verdadeiro
                {
                    while($registro = mysqli_fetch_assoc($query_two))
                    {
                        print '<br /><center>Grupo:'.$registro["nome_empresa"].' - E-mail: '.$registro["email"].'. Mande um email!</center>';
                    }
                }

                
            }
            else if($situa == 3)
            {
                print "<br />O grupo recusou a oferta. ";
            }
            else
            {
                print "erro no código <br />";
                var_dump($query);
            }
        }
        

    }

    mysqli_close($conexao);
    


?>
