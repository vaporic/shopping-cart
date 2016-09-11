// Recuerda reemplazar tu llave de modo sandbox por la de producción cuando estés listo para procesar cargos reales.

Conekta.setPublishableKey("key_NNXvxMWHmGEpYexFfJHmigA");

// Los parámetros pueden ser un objeto de javascript, una forma de HTML o una forma de JQuery

var errorResponseHandler, successResponseHandler, tokenParams;
var $form = $('#checkout-form');

// Después de tener una respuesta exitosa, envía la información al servidor

successResponseHandler = function(token) {
	/*return $.post('/process_payment?token_id=' + token.id, function() {
    	return document.location = 'payment_succeeded';
    });*/
    $form.append($('<input type="hidden" name="conektaTokenId" />').val(token.id));
    $form.get(0).submit();
};

// Después de recibir un error

errorResponseHandler = function(error) {
	$('#charge-error').removeClass('hidden');
	$('#charge-error').text(error.message);
	$form.find('button').prop('disabled', false);
};

// Submit form buy

$form.submit(function(e){
	$('#charge-error').addClass('hidden');
	$form.find('button').prop('disabled', true);
	// Tokenizar una tarjeta en Conekta
	tokenParams = {
		"card": {
	   		"number": $('#card-number').val(),
	    	"name": $('#card-name').val(),
	    	"exp_year": $('#card-expiry-year').val(),
	    	"exp_month": $('#card-expiry-month').val(),
	    	"cvc": $('#card-cvc').val(),
	    	"address": {
	        	"street1": $("#address").val()
	     	}
	  	}
	};
	Conekta.token.create(tokenParams, successResponseHandler, errorResponseHandler);
	return false;
});