<?php session_start(); ?>
<script src = "menu_empresa.js"></script>

<nav class="navbar navbar-expand-sm navbar-dark navbar-static-top" style = "background-color: red;">
    <a class="navbar-brand" href="../menu_empresa/empre_per.php"><?php echo '<img src="'.$_SESSION["perfil"].'" style = "min-width: 25%; max-height: 100px; min-height: 100px;"/>  '; print '<a style = "font-family: arial-black;  font-size: 300%;">'.$_SESSION['nome_empresa'].'</a>'; ?></a>
      <ul class="navbar-nav" style = "margin-left: 15%;">
        <li class="nav-item">
          <a id = "eventos" style = "margin-right: 20%;"><button style = "background-color: white; border: none; color: black; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;">Criar evento</button></a>
        </li>
        <li class="nav-item">
          <a id = "lista" style = "margin-left: 10%;"><button style = "background-color: white; border: none; color: black; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;">Lista de eventos</button></a>
        </li>
        <li class="nav-item">
          <a href = "../menu_empresa/menu.php" style = "margin-left: 15%;"><button style = "background-color: white; border: none; color: black; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;">Eventos da empresa</button></a>
        </li>


        <p class="text-right"></p>
        <ul class="nav navbar-nav navbar-right" style = "margin-left: 5%;">
            
            <?php
            //há de fazer a verificação se é ou não empresa itinerante
            $localizacao = $_SESSION['localizacao'];
            if($localizacao == "Itinerante")
            {
                //Depois há de criar um botão para receber as notificações de oferta de trabalho
                //e dar a opção de escolha. 

                print ' <li class="nav-item">
                            <a><button id = "listar" style = "background-color: white; border: none; color: black; padding: 27px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin-left: 80%; ">Notificações</button></a>
                        </li>';
                ?>
                    <li style = "margin-top: -77px;"> 
                      <a href = "../menu/logout.php"><button style = "background-color: white; border: none; color: black; padding: 27px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;" class = "glyphicon glyphicon-log-in">Logout</button></a>
                    </li>
                <?php
            }
            else
            {
                ?>
                <li style = "margin-left: 10px;"> 
                  <a href = "../menu/logout.php"><button style = "background-color: white; border: none; color: black; padding: 27px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;" class = "glyphicon glyphicon-log-in">Logout</button></a>
                </li>    
                <?php
            }

          ?>            

        

            
                <!--<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
          </ul>
        </ul>
</nav>
