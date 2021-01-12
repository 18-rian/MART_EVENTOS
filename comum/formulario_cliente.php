<h1>Seja um cliente MART</h1>
		
<form action = "../comum/processa.php" method = "POST" enctype="multipart/form-data">

	<div class="form-group col-md-6">

		<label>
			Nome:
		</label>
		
		<input type = "text" style = "border: 3px solid black;" required class = "btn-block" name = "nome" value = ""/>
		
		<label>
			Sobrenome:
		</label>
		
		<input type = "text" style = "border: 3px solid black;" class="form-control form-control-sm" name = "sobrenome" value = "" required/>
		
		<br />
		
		<label>
			E-mail:
		</label>
		
		<input type = "text" class="form-control form-control-sm" style = "border: 3px solid black;" name = "mail" value = "" required/>
		
		<label>
			Senha:
		</label>
		
		<input type = "password" style = "border: 3px solid black;" class="form-control form-control-sm" name = "senha" value = "" required/>
		
		<br />
		
		<label>
			Data de nascimento:
		</label>
		
		<input type = "date" style = "border: 3px solid black;" class="form-control form-control-sm" name = "data" value = "" required/>
		
		<label>
			Cidade:
		</label>
		
		<input type = "text" class="form-control form-control-lg" style = "border: 3px solid black;" name = "city" value = "" required/>
		
		<br />
		
		<label>
			Deseja estar ciente sobre seleções de grupos artísticos ou a abertura de editais?
		</label>
		
		<br /> 
		
		Sim
			<input type = "radio" style = "border: 3px solid black;" class="form-control form-control-sm" name = "editais" value = "Sim" />
		<label>
			Não
		</label>
		<input type = "radio" style = "border: 3px solid black;" class="form-control form-control-sm" name = "editais" value = "Nao" />
		
		<br />
		
		<label>
			Foto de perfil:
		</label>
		
		<input type="file" name="perfil" accept="image/*" class="form-control form-control-lg"/>
		
		<br />
		
		<label>
			Foto de capa:
		</label>
		
		<input type="file" name="capa" accept="image/*" class="form-control form-control-lg"/>
		
		<br />
		
		<input type = "submit" style = "border: 3px solid black;" class="form-control form-control-sm" name = "submeter" value = "Enviar" required/>
		
		<input type = "reset" style = "border: 3px solid black;" class="form-control form-control-sm" name = "resetar" value = "Limpar" required/>         
		
	</div>
</form>
