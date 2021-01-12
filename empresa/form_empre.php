<!DOCTYPE html>

<html lang = "pt-BR">
	<head>
		<meta charset = "UTF-8" />
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<title>Cadastrando</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style>
            form
             {
                display: inline-block;
                border: 1px solid black;
                margin: 5% 0 25% 25%;
                padding: 2% 2% 2% 2%;
              }
            input
            {
                display: block;
            }
            
            h1
            {
                text-align: center;        
            }
        </style>
	</head>
	<body>
		<center><a href = "../inicial/pagina_inicial.php" style = "display: block; background-color: white; border: 1px solid black; font-family: arial; height: 30%;" class = "display-3">Bem vindo ao MART</a></center>
		
		<section id = "cadastro">
            <form action = "../empresa/processa.php" method = "POST" enctype="multipart/form-data">
                <h1>Cadastro da empresa</h1>
                <label>
                    Digite o CNPJ da empresa
                </label>
                
                <input class="form-control btn-block" type = "number" name = "cnpj" value = ""/>
                <label>
                    Nome da empresa
                </label>
                
                <input type = "text"class="form-control btn-block" name = "nome" value = ""/>
                
                <label>
                    E-mail: 
                </label>
                
                <input type = "text" class="form-control btn-block" name = "email" value = "" />
                
                <label>
                    Senha:
                </label>
                
                <input type = "password" name = "senha" value = "" class="form-control btn-block" />
                
                <br />
                
                <label>
                    A empresa é fixa ou itinirante? (Para grupos artisticos, é recomendável que selecione a opção itinirante)
                </label>
                
                <br />
                
                <input type = "text" class="form-control btn-block" name = "localizacao" value = "Digite o endereço fixo:" />
                
                <br />
                
                Itinerante
                <input type = "radio" name = "localizacao" value = "Itinerante" class="form-control btn-block" />
                <br />
                
                <label>
                    Cidade: 
                </label> 
                
                <input type = "text" name = "cidade" value = "" class="form-control btn-block"/>
                
                <br />
                
                <label>
                    Tipos de eventos realizados:
                    <br />
                </label>
                
                <br /> 

                <label>
		            Foto de perfil da empresa:
                </label>
                
                <input type="file" name="perfil" accept="image/*" class="form-control form-control-lg"/>
                
                <br />
                
                <label>
                    Foto de capa da empresa:
                </label>
                
                <input type="file" name="capa" accept="image/*" class="form-control form-control-lg"/>
                
                <br />


                Teatro ou Stadup 
                <input type = "checkbox" class="form-control" name = "tipos" value = "Teatro_stadup" /> 
                 Músicas 
                <input type = "checkbox" name = "editais" value = "Músicas" class="form-control" />
                Exposições
                <input type = "checkbox" name = "editais" value = "Exposições" class="form-control"/>
                Oficinas
                <input type = "checkbox" name = "editais" value = "oficinas" class="form-control" />
                <br />
                <input type = "submit" name = "submeter" value = "Enviar" required class = "btn btn-success btn-block"/>
                <br /><br />
		        <input type = "reset" name = "resetar" value = "Limpar" required class="btn btn-danger btn-block"/>
                
            <form>
        </section>
		<br >
	</body>

</html>
