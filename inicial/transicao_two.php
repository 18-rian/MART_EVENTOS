<?php 

    session_start();

    if(!empty($_SESSION["id"]))
    {
        //se ela existir
        $true = $_SESSION["id"];
        
        
    }
    else
    {
        $true = 00;
    }

    $id = $_POST["id_evento"];


    if($true != 00)
    {
        $SQL_two = 'SELECT * FROM publico WHERE cliente_id = '.$true.' AND evento_id = '.$repree.';';
        
        $query_twoo = mysqli_query($conexao, $SQL_two);
        
        if(mysqli_num_rows($query_twoo) > 0) //Se verdadeiro
        {
            $data_atual = date('y/m/d H:i:s');
            if($data_evento >= $data_atual)
            {
                print '<br /><button onclick = url("'.$url.'");>Entrar na sala do evento!</button>';
            }

            print '<section id = "fazendo_logando">
                        <button type="button" class="btn btn-primary" onclick = "sair('.$true.');">Deixar evento</button>
                        <div id = "logado"></div>
                    </section>';
                    
        }
        else
        {
            print '<section id = "fazendo_logando">
                        <button type="button" class="btn btn-primary" onclick = "botao('.$true.');"">Participar do evento</button>
                        <div id = "logado"></div>
                    </section>';
        }
                
    }
    else
    {
        print '<section>
                   <button type="button" class="btn btn-primary" onclick = "botao_cadastro();"">Se cadastrar na aplicação</button>
                    <div id = "area_cadas"></div>
               </section>
                        ';    
    }
          

?>