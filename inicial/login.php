<body>

<h1>Realize seu login</h1>

<form action = "verifica.php" method = "POST">

    <div class="form-group form-row">
        <div class = "form-group">
            <div class = "form-group">
                <label>
                    E-mail:
                </label>
                <input type  = "mail" class="form-control" name = "mail" value = "" style = "width: 450px;"/>
            </div>
            <div class = "form-group">
                <label>
                    Senha
                </label>
                <input type = "password" class="form-control" name = "senha" value = "" />
            </div>
            <div class = "form-group">
            
                <input type = "submit" class="form-control" name = "Submeter" value = "Logar"/>
            </div>
            
            <div class = "form-group">
        
                <input type = "reset" name = "resetar" value = "Limpar" class="form-control"/>
            </div>
        </div>
    </div>
</form>

</body>
