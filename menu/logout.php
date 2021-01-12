<?php 
    session_start();
    if(!empty($_SESSION))
    {
        session_destroy();
        header("location: ../inicial/pagina_inicial.php");
    }
    else
    {
        header("location: ../inicial/pagina_inicial.php");
    }

?>