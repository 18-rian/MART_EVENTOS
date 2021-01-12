<?php 
    
    include("../base_de_dados/conexao.php");

    $SQL = "SELECT 
				id_evento, nome, descricao, local, data_horario, perfil_evento, capa_evento
			FROM
				eventos";

	$query = mysqli_query($conexao, $SQL);
	if(mysqli_num_rows($query) > 0) //Se verdadeiro
	{
        $count = 0;
		while($registros = mysqli_fetch_assoc($query))
		{

            if($registros["data_horario"] >= date("Y-m-d H:i:s"))
            {
                $repre[$count] = $registros["capa_evento"];

                $count = $count + 1;

                if($count == 3)
                {
                    break;
                }
            }
            
        }

	}

?>

    <center style = "background-color: black; min-width: 80%; max-height: 500px; min-height: 500px; margin-left: 10%; margin-right: 10%;">
        <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner" style = "min-width: 70%; max-height: 500px; min-height: 500px;">
            <div class="carousel-item active">
                <?php print '<img src="../empresa/eventos/'.$repre[0].'" alt="Los Angeles" style = "min-width: 60%; max-height: 400px; min-height: 400px;">'; ?>
            </div>
            <div class="carousel-item">
                <?php print '<img src="../empresa/eventos/'.$repre[1].'" alt="Los Angeles" style = "min-width: 60%; max-height: 400px; min-height: 400px;">'; ?>
            </div>
            <div class="carousel-item">
                <?php print '<img src="../empresa/eventos/'.$repre[2].'" alt="Los Angeles" style = "min-width: 60%; max-height: 400px; min-height: 400px;">'; ?>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        </a>

        </div>
    </center>
<?php
    
?>
