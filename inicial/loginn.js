$(document).ready(function()
{
	var cont = 1;
	var contador  = 1;
	var cont_two = 1;

	$("#click_login").click(function()
	{
		if((contador == 1) || (cont == 2) || (cont_two == 2))
		{
			$('#form_login').append('<h1>Realize seu login</h1><form action = "verifica.php" method = "POST"><div class="form-group form-row"><div class = "form-group col-md-6"><div class = "form-group col-md-6"><label>E-mail:</label><input type  = "mail" class="form-control form-control-sm" name = "mail" value = "" style = "border: 3px solid black;" /></div><div class = "form-group col-md-6"><label>Senha</label><input type = "password" class="form-control form-control-sm" name = "senha" value = "" style = "border: 3px solid black;"/></div><div class = "form-group col-md-6"><input type = "submit" class="form-control form-control-sm" name = "Submeter" value = "Logar" style = "border: 3px solid black;"/></div><div class = "form-group col-md-6"><input type = "reset" name = "resetar" value = "Limpar" class="form-control form-control-sm" style = "border: 3px solid black;"/></div> </div></div></form>');
			contador = contador + 1;
			$('#form_como').empty();
			$('#form_empre').empty();
		}
		else if((contador == 2) && (cont == 1))
		{
			contador = 1;
			$('#form_login').empty();
			
		}
		
	});
	$("#click_comum").click(function()
	{
		if((cont == 1) || (contador == 2) || (cont_two == 2))
		{
			cont = cont + 1;
			$('#form_como').append('<h1>Seja um cliente MART</h1><form action = "../comum/processa.php" method = "POST"><div class="form-group col-md-6""><label>Nome:</label> <input type = "text" style = "border: 3px solid black;" class="form-control form-control-sm" name = "nome" value = "" required /><label>Sobrenome:</label> <input type = "text" style = "border: 3px solid black;" class="form-control form-control-sm" name = "sobrenome" value = "" required/><br /><label>E-mail:</label> <input type = "text" class="form-control form-control-sm" style = "border: 3px solid black;" name = "mail" value = "" required/><label>Senha: </label> <input type = "password" style = "border: 3px solid black;" class="form-control form-control-sm" name = "senha" value = "" required/><br /><label>Data de nascimento:</label> <input type = "date" style = "border: 3px solid black;" class="form-control form-control-sm" name = "data" value = "" required/> <label>Cidade: </label> <input type = "text" class="form-control form-control-lg" style = "border: 3px solid black;" name = "city" value = "" required/><br /><label>Deseja estar ciente sobre seleções de grupos artísticos ou a abertura de editais? </label> <br /> Sim<input type = "radio" style = "border: 3px solid black;" class="form-control form-control-sm" name = "editais" value = "Sim" /> <label>Não</label><input type = "radio" style = "border: 3px solid black;" class="form-control form-control-sm" name = "editais" value = "Nao" /><br /> <input type = "submit" style = "border: 3px solid black;" class="form-control form-control-sm" name = "submeter" value = "Enviar" required/><input type = "reset" style = "border: 3px solid black;" class="form-control form-control-sm" name = "resetar" value = "Limpar" required/>         </div></form>');
			$('#form_login').empty();
			$('#form_empre').empty();
			contador = 1;
		}
		else if(cont == 2)
		{
			cont = 1;
			$('#form_como').empty();
		}
		
	
	});
	$("#click_empre").click(function()
	{
		if((cont_two == 1) || (contador == 2) || cont == 2)
		{
			cont_two = cont_two + 1;
			$('#form_como').empty();
			$('#form_login').empty();
			$('#form_empre').append('<h1>Seja um cliente MART</h1><section id = "cadastro"><form action = "../empresa/processa.php" method = "POST"> <div class="form-group col-md-6""> <label>Digite o CNPJ da empresa</label><input class="form-control" type = "number" name = "cnpj" value = ""/> <label>Nome da empresa</label> <input type = "text" class="form-control" name = "nome" value = "" /><label>E-mail: </label> <input type = "text" class="form-control" name = "email" value = "" /><label>Senha: </label> <input type = "password" name = "senha" value = "" class="form-control" /><br /><label>A empresa é fixa ou itinirante? (Para grupos artisticos, é recomendável que selecione a opção itinirante)</label><br /><input type = "text" class="form-control" name = "localizacao" value = "Digite o endereço fixo:" /> <br />Itinerante<input type = "radio" name = "localizacao" value = "Itinerante" class="form-control" /> <br /><label>Cidade: </label> <input type = "text" name = "cidade" value = "" class="form-control"/><br /><label>Tipos de eventos realizados:<br /></label> <br /> Teatro ou Stadup <input type = "checkbox" class="form-control" name = "tipos" value = "Teatro_stadup" />  Músicas <input type = "checkbox" name = "editais" value = "Músicas" class="form-control" /> Exposições<input type = "checkbox" name = "editais" value = "Exposições" class="form-control"/> Oficinas<input type = "checkbox" name = "editais" value = "oficinas" class="form-control" /><br /><input type = "submit" name = "submeter" value = "Enviar" class="form-control"/><input type = "reset" name = "resetar" value = "Limpar" class="form-control"/></div><form></section>');
			contador = 1;
			cont = 1;
		}
		else if(cont_two == 2)
		{
			cont_two = 1;
			$('#form_empre').empty();
		}
	
	
	});
});
