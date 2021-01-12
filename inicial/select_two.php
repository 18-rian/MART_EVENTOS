<?php 
                
    include("../base_de_dados/conexao.php");

    $pala = $_POST["word_two"];

    if($pala == NULL)
    {
        $SQL = "SELECT 
                    id_evento, nome, descricao, local, data_horario, perfil_evento, capa_evento, cidade
            FROM
                eventos";

        $query = mysqli_query($conexao, $SQL);

        if(mysqli_num_rows($query) > 0) //Se verdadeiro
        {
            $count = 0;
            print '<div class="row" id = "area_alvo">';
            while($registros = mysqli_fetch_assoc($query))
            {
                if($registros["data_horario"] >= date("Y-m-d H:i:s"))
                {
                    print '
                        
                            <div class="card" style="width: 20%; margin: 20px 0px 100px 120px; background-color: black;">
                                <div class = "container">
                                    <img class="card-img-top" src= "../empresa/eventos/'.$registros["perfil_evento"].'" alt="Card image cap" style = "min-width: 40%; max-height: 220px; min-height: 220px;">
                                    <div class="overlay">
                                        <div class="text">
                                            <div class="card-body" style = "color: white;">
                                                
                                                <a>
                                                    <button type="button" class="btn btn-primary font-weight-bold btn btn-light btn btn-outline-blue" data-toggle="modal" data-target="#modal_repre" onClick = "eve('.$registros['id_evento'].');">
                                                        Acessar evento
                                                    </button>
                                                </a>
                                        </div>
                                    </div>
                                </div>  
                                <p class="card-text" style = "font-family: arial; margin-top: 3%; background-color: white; text-align: center;">'.$registros["nome"].'<br />'.$registros["cidade"].'</p>
                            </div>
                            </div>

                            <div class = "modal fade bd-example-modal-xl" id = "modal_repre" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title" id = "nome_evento">Detalhes do evento</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body" style = "overflow: scroll;">
                                            <a id = "data"></a>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        
                       ';
                 }
           }
        }
    }
    else
    {
        $SQL_two = "SELECT 
                nome, perfil_evento, cidade, id_evento, data_horario
            FROM
                eventos
            WHERE
                nome like '$pala%' or cidade like '$pala%';";//PESQUISAR AS PALAVRAS QUE COMEÇAM COM A LETRA DA VARIAVEL "$PALA"  

        $query_two = mysqli_query($conexao, $SQL_two);     


        if(mysqli_num_rows($query_two) > 0) //Se verdadeiro
        {
            while($registros = mysqli_fetch_assoc($query_two))
            {
                if($registros["data_horario"] >= date("Y-m-d H:i:s"))
                {
                    print '
                        
                            <div class="card" style="width: 20%; margin: 20px 0px 100px 120px; background-color: black;">
                                <div class = "container">
                                    <img class="card-img-top" src= "../empresa/eventos/'.$registros["perfil_evento"].'" alt="Card image cap" style = "min-width: 40%; max-height: 220px; min-height: 220px;">
                                    <div class="overlay">
                                        <div class="text">
                                            <div class="card-body" style = "color: white;">
                                                <h5 class="card-title"></h5>
                                                <a>
                                                    <button type="button" class="btn btn-primary font-weight-bold btn btn-light btn btn-outline-blue" data-toggle="modal" data-target="#modal_repre" onClick = "eve('.$registros['id_evento'].');">
                                                        Acessar evento
                                                    </button>
                                                </a>
                                        </div>
                                    </div>
                                </div>  
                                <p class="card-text" style = "font-family: arial; margin-top: 3%; background-color: white; text-align: center;">'.$registros["nome"].'<br />'.$registros["cidade"].'</p>
                            </div>
                            </div>

                            <div class = "modal fade bd-example-modal-xl" id = "modal_repre" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title" id = "nome_evento">Detalhes do evento</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body" style = "overflow: scroll;">
                                            <a id = "data"></a>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        
                    ';
                }
            }
        }
    }
   
   
   /* $SQL_two = "SELECT 
                id_evento
            FROM
                eventos
            WHERE
                nome = '$pala';";//PESQUISAR AS PALAVRAS QUE COMEÇAM COM A LETRA DA VARIAVEL "$PALA"  

    $query_two = mysqli_query($conexao, $SQL_two);     


    if(mysqli_num_rows($query_two) > 0) //Se verdadeiro
    {
        
        $count = 0;
    
        while($registros = mysqli_fetch_assoc($query_two))
        {
            session_start();
            $_SESSION["id_evento"] = $registros["id_evento"];
            print "foi";
            
            
        }

    }
    else
    {
        $SQL = "SELECT 
                    id_evento, nome, data_horario, perfil_evento
                FROM
                    eventos
                WHERE
                    nome like '$pala%';";//PESQUISAR AS PALAVRAS QUE COMEÇAM COM A LETRA DA VARIAVEL "$PALA"  

        $query = mysqli_query($conexao, $SQL);     
        
        

        if(mysqli_num_rows($query) > 0) //Se verdadeiro
        {
            
            $count = 0;
        
            while($registro = mysqli_fetch_assoc($query))
            {
            

                print '<option value = "'.$registro['nome'].'">'.$registro['data_horario'].'</option>';

                
                
            }

        }
    } 
    */


    mysqli_close($conexao);



?>
