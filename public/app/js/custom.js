$(document).ready(function() {
    $("#nuevaDireccion").hide();
});

var crearDireccion = function(){
    if($("#direccion").val() == 99){
        $("#nuevaDireccion").show();
    }else{
        $("#nuevaDireccion").hide();
    }
}

$('#formComida').on('submit', function(event) {
            
    
    event.preventDefault();
    
    var $comida = $(this).find('input:radio[name=comida]:checked');
    //var $cantidad = $(this).find('input:text[name=cantidadComida]');
    var comida = $comida.val();
    //var cantidad = $cantidad.val();
    var cantidad = 1;
    
    var $direccion = $(this).find('input:hidden[name=ajax]');

    var direccion = $direccion.val();
    
    $.ajax({
        // la URL para la petición
        //url : 'envio/ajax',
        url : direccion,
     
        // la información a enviar
        // (también es posible utilizar una cadena de datos)
        data : { id : comida, cantidad : cantidad },
     
        // especifica si será una petición POST o GET
        type : 'POST',
     
        // el tipo de información que se espera de respuesta
        dataType : 'json',
     
        // código a ejecutar si la petición es satisfactoria;
        // la respuesta es pasada como argumento a la función
        success : function(json) {
            $('#tbody').append('<tr><td>'+json.codigo+'<input name="productoFinal[]" type="hidden" value="'+json.id+'"/></td><td>'+json.nombre+'</td><td>'+'$'+json.precio+'</td><td>'+'<input type="hidden" name="productoFinalCantida[]" value="'+cantidad+'" />'+cantidad+'</td><td>'+'$'+parseFloat(json.precio*cantidad).toFixed(2)+'</td><td><input type="button" class="btn btn-danger m-btn m-btn--icon m- m-btn--outline-2x btn-block borrar" value="Borrar"/></td></tr>');
            var $total = parseFloat($('#total').text());
            $total = $total + parseFloat((json.precio*cantidad).toFixed(2));
            
            $('#total').text(parseFloat($total).toFixed(2));
        },
     
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
     
        // código a ejecutar sin importar si la petición falló o no
        complete : function(xhr, status) {
            //alert('Petición realizada');
        }
    });
});

$('#formCombo').on('submit', function(event) {
            
    
    event.preventDefault();
    
    var $comida = $(this).find('input:radio[name=combo]:checked');
    //var $cantidad = $(this).find('input:text[name=cantidadCombo]');
    var comida = $comida.val();
    //var cantidad = $cantidad.val();
    var cantidad = 1;

    var $direccion = $(this).find('input:hidden[name=ajax]');

    var direccion = $direccion.val();
    
    $.ajax({
        // la URL para la petición
        url : direccion,
     
        // la información a enviar
        // (también es posible utilizar una cadena de datos)
        data : { id : comida, cantidad : cantidad },
     
        // especifica si será una petición POST o GET
        type : 'POST',
     
        // el tipo de información que se espera de respuesta
        dataType : 'json',
     
        // código a ejecutar si la petición es satisfactoria;
        // la respuesta es pasada como argumento a la función
        success : function(json) {
            $('#tbody').append('<tr><td>'+json.codigo+'<input name="productoFinal[]" type="hidden" value="'+json.id+'"/></td><td>'+json.nombre+'</td><td>'+'$'+json.precio+'</td><td>'+'<input type="hidden" name="productoFinalCantida[]" value="'+cantidad+'" />'+cantidad+'</td><td>'+'$'+parseFloat(json.precio*cantidad).toFixed(2)+'</td><td><input type="button" class="btn btn-danger m-btn m-btn--icon m- m-btn--outline-2x btn-block borrar" value="Borrar"/></td></tr>');
            var $total = parseFloat($('#total').text());
            $total = $total + parseFloat((json.precio*cantidad).toFixed(2));
            
            $('#total').text(parseFloat($total).toFixed(2));
        },
     
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
     
        // código a ejecutar sin importar si la petición falló o no
        complete : function(xhr, status) {
            //alert('Petición realizada');
        }
    });
});

$('#formBebida').on('submit', function(event) {
            
    
    event.preventDefault();
    
    var $comida = $(this).find('select[name=bebida]');
    var $cantidad = 1;
    var comida = $comida.val();
    var cantidad = $cantidad;
    var $direccion = $(this).find('input:hidden[name=ajax]');

    var direccion = $direccion.val();
    
    $.ajax({
        // la URL para la petición
        url : direccion,
     
        // la información a enviar
        // (también es posible utilizar una cadena de datos)
        data : { id : comida, cantidad : cantidad },
     
        // especifica si será una petición POST o GET
        type : 'POST',
     
        // el tipo de información que se espera de respuesta
        dataType : 'json',
     
        // código a ejecutar si la petición es satisfactoria;
        // la respuesta es pasada como argumento a la función
        success : function(json) {

            $('#tbody').append('<tr><td>'+json.codigo+'<input name="productoFinal[]" type="hidden" value="'+json.id+'"/></td><td>'+json.nombre+'</td><td>'+'$'+json.precio+'</td><td>'+'<input type="hidden" name="productoFinalCantida[]" value="'+cantidad+'" />'+cantidad+'</td><td>'+'$'+parseFloat(json.precio*cantidad).toFixed(2)+'</td><td><input type="button" class="btn btn-danger m-btn m-btn--icon m- m-btn--outline-2x btn-block borrar" value="Borrar"/></td></tr>');
            
            var $total = parseFloat($('#total').text());
            $total = $total + parseFloat((json.precio*cantidad).toFixed(2));
            
            $('#total').text(parseFloat($total).toFixed(2));
        },
     
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
     
        // código a ejecutar sin importar si la petición falló o no
        complete : function(xhr, status) {
            //alert('Petición realizada');
        }
    });
});

$('#cliente_empresa_cuitCuil').on('change', function(event) {  

    var cuit = $('#cliente_empresa_cuitCuil').val();
    
    var direccion = 'nuevo/ajax';
    
    $.ajax({
        // la URL para la petición
        url : direccion,
     
        // la información a enviar
        // (también es posible utilizar una cadena de datos)
        data : { cuit : cuit },
     
        // especifica si será una petición POST o GET
        type : 'POST',
     
        // el tipo de información que se espera de respuesta
        dataType : 'json',
     
        // código a ejecutar si la petición es satisfactoria;
        // la respuesta es pasada como argumento a la función
        success : function(json) {
            if(json.valor==true){
                $('#cuitCuil').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><strong>Cuidado!</strong>El numero de cuit ingresado ya se encuentra cargado en el sistema.</div>');
            }
        },
     
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
     
        // código a ejecutar sin importar si la petición falló o no
        complete : function(xhr, status) {
            //alert('Petición realizada');
        },

    });
});

$('#cliente_particular_dni').on('change', function(event) {  

    var dni = $('#cliente_particular_dni').val();

    var direccion = 'nuevo/ajax';
    
    $.ajax({
        // la URL para la petición
        url : direccion,
     
        // la información a enviar
        // (también es posible utilizar una cadena de datos)
        data : { dni : dni },
     
        // especifica si será una petición POST o GET
        type : 'POST',
     
        // el tipo de información que se espera de respuesta
        dataType : 'json',
     
        // código a ejecutar si la petición es satisfactoria;
        // la respuesta es pasada como argumento a la función
        success : function(json) {
            if(json.valor==true){
                $('#dni').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><strong>Cuidado!</strong>El numero de dni ingresado ya se encuentra cargado en el sistema.</div>');
            }
        },
     
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
     
        // código a ejecutar sin importar si la petición falló o no
        complete : function(xhr, status) {
            //alert('Petición realizada');
        },

    });
});

$('#bomba_idProveedor').on('change', function(event) {  

    var idProveedor = $('#bomba_idProveedor').val();

    var direccion = 'nuevo/ajax';
    
    $.ajax({
        // la URL para la petición
        url : direccion,
     
        // la información a enviar
        // (también es posible utilizar una cadena de datos)
        data : { idProveedor : idProveedor },
     
        // especifica si será una petición POST o GET
        type : 'POST',
     
        // el tipo de información que se espera de respuesta
        dataType : 'json',
     
        // código a ejecutar si la petición es satisfactoria;
        // la respuesta es pasada como argumento a la función
        success : function(json) {
            if(json.valor==true){
                $('#idProveedor').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><strong>Cuidado!</strong>El codigo ingresado ya se encuentra cargado en el sistema.</div>');
            }
        },
     
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
     
        // código a ejecutar sin importar si la petición falló o no
        complete : function(xhr, status) {
            //alert('Petición realizada');
        },

    });
});

$('#repuesto_idProveedor').on('change', function(event) {  

    var idProveedor = $('#repuesto_idProveedor').val();

    var direccion = 'nuevo/ajax';
    
    $.ajax({
        // la URL para la petición
        url : direccion,
     
        // la información a enviar
        // (también es posible utilizar una cadena de datos)
        data : { idProveedor : idProveedor },
     
        // especifica si será una petición POST o GET
        type : 'POST',
     
        // el tipo de información que se espera de respuesta
        dataType : 'json',
     
        // código a ejecutar si la petición es satisfactoria;
        // la respuesta es pasada como argumento a la función
        success : function(json) {
            if(json.valor==true){
                $('#idProveedor').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><strong>Cuidado!</strong>El codigo ingresado ya se encuentra cargado en el sistema.</div>');
            }
        },
     
        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
     
        // código a ejecutar sin importar si la petición falló o no
        complete : function(xhr, status) {
            //alert('Petición realizada');
        },

    });
});

$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    console.log($(this).closest('').val());
    $(this).closest('tr').remove();
});