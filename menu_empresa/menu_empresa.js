


$(document).ready(function()
{   
    
    var contador = 1;
    var cont = 1;
    $("#eventos").click(function()
    {
        if(contador == 1)
        {
            $.ajax
            ({
                url: '../empresa/eventos/form.php',
                method: 'POST',
                data: {},
                success: function(back)
                {
                    $('#area').html(back);
                }
            });
        }
    });

    $("#lista").click(function()
    {
        if(cont == 1)
        {   
            $.ajax
            ({
                url: 'lista_eventos.php',
                method: 'POST',
                data: {},
                success: function(get_back)
                {
                    $("#area").html(get_back)
                }
            });
        }
    });
    $("#eventos_proprios").click(function()
    {
        var count = 1;
        if(count == 1)
        {   
            $.ajax
            ({
                url: 'eventos_criados.php',
                method: 'POST',
                data: {},
                success: function(voltar)
                {
                    $("#area").html(voltar)
                }
            });
        }
    });
    

});
