<?php 
    session_start();

    include "../base_de_dados/conexao.php";

    $SQL = "SELECT 
                id, nome, sobrenome, email, senha, data_de_nasc, cidade, editais_s_n, foto_perfil, foto_capa
            FROM
                cliente
            WHERE
                email = '".$_POST['mail']."' AND senha = '".$_POST['senha']."'";

    $query = mysqli_query($conexao, $SQL);

    if(mysqli_num_rows($query) > 0) //Se verdadeiro
    {
        while($registros = mysqli_fetch_assoc($query))
        {
            $_SESSION['id'] = $registros['id'];
            $_SESSION['nome'] = $registros['nome'];
            $nome = $registros['nome'];
            $_SESSION['sobrenome'] = $registros['sobrenome'];
            $_SESSION['email'] = $registros['email'];
            $_SESSION['senha'] = $registros['senha'];
            $_SESSION['data_de_nasc'] = $registros['data_de_nasc'];
            $_SESSION['cidade'] = $registros['cidade'];
            $_SESSION['editais_s_n'] = $registros['editais_s_n'];
            $_SESSION["perfil"] = $registros['foto_perfil'];
	        $_SESSION["capa"] = $registros['foto_capa'];
        }
        header("location:../menu/menu.php");
    }
    else
    {
        $SQL_two = "SELECT 
                        cnpj, nome_empresa, email, senha, localizacao, cidade, tipos_eventos, foto_empresa, capa_empresa
                    FROM 
                        empresa
                    WHERE
                        email = '".$_POST['mail']."' AND senha = '".$_POST['senha']."'";
        $query_two = mysqli_query($conexao, $SQL_two);

        if(mysqli_num_rows($query_two) > 0) //Se verdadeiro
        {
            while($registros_two = mysqli_fetch_assoc($query_two))
            {
                echo "entrou";
                $_SESSION['cnpj'] = $registros_two['cnpj'];
                $_SESSION['nome_empresa'] = $registros_two['nome_empresa'];
                $_SESSION['email'] = $registros_two['email'];
                $_SESSION['senha'] = $registros_two['senha'];
                $_SESSION['localizacao'] = $registros_two['localizacao'];
                $_SESSION['cidade'] = $registros_two['cidade'];
                $_SESSION['tipos_eventos'] = $registros_two['tipos_eventos'];
                $_SESSION["perfil"] = $registros_two['foto_empresa'];
	            $_SESSION["capa"] = $registros_two["capa_empresa"];
            }
            var_dump($_SESSION['cnpj']);
            header("location:../menu_empresa/menu.php");
        }
        else
        {
            header("location:../inicial/pagina_inicial.php");
        }

    }


    mysqli_close($conexao);
?>