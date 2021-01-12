<?php 
                
    include("../base_de_dados/conexao.php");
    
    $pala = $_POST["word"];
    
    $SQL_two = "SELECT 
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
                if($registro["data_horario"] >= date("Y-m-d H:i:s"))
                {
               

                    print '<option value = "'.$registro['nome'].'">'.$registro['data_horario'].'</option>';
                }
                
                
            }

	    }
    } 
    
    
    
    mysqli_close($conexao);
?>
