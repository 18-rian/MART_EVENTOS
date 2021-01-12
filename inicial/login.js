$(document).ready(function()
{
	var cont = 1;
	var contador  = 1;
	var cont_two = 1;

	$("#click_login").click(function()
	{
		if((contador == 1) || (cont == 2) || (cont_two == 2))
		{

			$.ajax
			({
				url: '../inicial/login.php',
				method: 'POST',
				data: {},
				success: function(get_back)
				{
						
						$('#form_login').html(get_back);
						contador = contador + 1;
						$('#form_como').empty();
						$('#form_empre').empty();
				}
			});
			
			
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

			$.ajax
			({
				url: '../comum/formulario_cliente.php',
				method: 'POST',
				data: {},
				success: function(get_back)
				{
						
						$('#form_como').html(get_back);
						cont = cont + 1;
						$('#form_login').empty();
						$('#form_empre').empty();
						contador = 1;
				}
			});
			
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

			$.ajax
			({
				url: '../empresa/form_empre.php',
				method: 'POST',
				data: {},
				success: function(get_back)
				{
						
						$('#form_empre').html(get_back);
						cont = cont + 1;
						$('#form_como').empty();
						$('#form_login').empty();
						cont_two = cont_two + 1;
			
			
						contador = 1;
						cont = 1;
				}
			});
			
		}
		else if(cont_two == 2)
		{
			cont_two = 1;
			$('#form_empre').empty();
		}
	
	
	});
});
