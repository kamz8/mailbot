isValidate = false;
$(document).ready(function() {

    if(!isValidate) 
	{
		$('#user button').attr('disabled', ' ');
		$('#server button').attr('disabled', ' ');	
	}
	else
	{
		$('#user button').removeAttr('disabled');	
		$('#server button').removeAttr('disabled', ' ');
	}
	validateUser();
	validateServer();
	
});

function validateUser()
{
	    isValidate = false;
	$('#user input[name=user]').on('blur', function() {	
	
	var input = $('#user input[name=user]');
		var userName =  input.val();
		userName = userName.toLowerCase();
		var pattern = /[ \t\r\n\v\f]/
		userName = userName.replace(pattern, "");
		input.val(userName);
		console.log(userName);
		
		if(userName == 0) 
		{
			console.log(1);
			
			$('#user:first div:first .col-sm-10').toggleClass('has-error has-feedback');
			$('#user:first div:first .col-sm-10').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');	
			isValidate = false;
		}else 
		{
			$('#user:first div:first .col-sm-10').removeClass('has-error has-feedback');
			$('#user:first .col-sm-10 span').remove();
			isValidate = true;	
		
		}
		
    if(!isValidate) 
	{
		$('#user button').attr('disabled', ' ');	
	}
	else
	{
		$('#user button').removeAttr('disabled');	
	}
	
	});
	
	$('#user input[name=pass]').on('blur', function() {	
		var input = $('#user input[name=pass]');
		var pass =  input.val();
		var inputSelector = '#user div:eq(2) div';
		var pattern = /[ \t\r\n\v\f]/
		pass = pass.replace(pattern, "");	
		console.log('pass');
		
			$(inputSelector).removeClass('has-error has-feedback');
			$('#user:first .col-sm-10 span').remove();
			isValidate = false;
		if(pass.length < 8 || pass.length == 0) 
		{
			console.log(pass.length);
			
			$(inputSelector).toggleClass('has-error has-feedback');
			$(inputSelector).append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');	
			isValidate = false;
		}else 
		{
			$(inputSelector).removeClass('has-error has-feedback');
			$('#user:first .col-sm-10 span').remove();
			isValidate = true;	
			console.log(pass.length)
		}
	
	
		
	});
	
	$('#user input[name=email]').on('blur', function() {	
		var input = $('#user input[name=email]');
		var val =  input.val();
		var inputSelector = '#user div:eq(4) div';
		var pattern = /[ \t\r\n\v\f]/;
		var isemail = /^[0-9a-zA-Z_.-]+@[0-9a-zA-Z.-]+\.[a-zA-Z]{2,3}$/;
		val = val.toLowerCase();
		val = val.replace(pattern, "");
		input.val(val);	
		console.log('pass');
		
			$(inputSelector).removeClass('has-error has-feedback');
			$('#user:first .col-sm-10 span').remove();
			isValidate = false;
		if(val.length == 0 || isemail.test(val) == false ) 
		{
			console.log('1')
			$(inputSelector).toggleClass('has-error has-feedback');
			$(inputSelector).append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');

			isValidate = false;
		}else 
		{
			$(inputSelector).removeClass('has-error has-feedback');
			$('#user div:eq(4) div span').remove();
			isValidate = true;	
			console.log(isValidate)
		}	
		
    if(!isValidate) 
	{
		$('#user button').attr('disabled', ' ');	
	}
	else
	{
		$('#user button').removeAttr('disabled');	
	}
		
	});
	
/*			$('#user input[name=user]').on('blur', function() {	
		var userName =  $('#user input[name=user]').val();
		
	});*/
		
}


function validateServer()
{
$('#server input[name=host]').on('blur', function() {	
		var input =  $('#server input[name=host]');
		var val = input.val();
		
		var inputSelector = '#server div:eq(0) div';
		var pattern = /[ \t\r\n\v\f]/;
		var isAdress = /^[0-9a-zA-Z_.-]+\.[0-9a-zA-Z.-]+\.[a-zA-Z]{2,3}$/;
		val = val.toLowerCase();
		val = val.replace(pattern, "");		
		input.val(val);
		
			$(inputSelector).removeClass('has-error has-feedback');
			$('#server div:eq(0) div span').remove();
			isValidate = false;
		if(val.length == 0 || isAdress.test(val) == false ) 
		{
			console.log('1')
			$(inputSelector).toggleClass('has-error has-feedback');
			$(inputSelector).append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');

			isValidate = false;
		}else 
		{
			$(inputSelector).removeClass('has-error has-feedback');
			$('#server div:eq(1) div span').remove();
			isValidate = true;	
			console.log(isValidate)
		}
		
		
	if(!isValidate) 
	{
		$('#server button').attr('disabled', ' ');	
	}
	else
	{
		$('#server button').removeAttr('disabled');	
	}
	});
	
	
    $('#server input[name=port]').on('blur', function() {	
		var input =  $('#server input[name=port]');
		var val = input.val();
		input.val(val);
		var inputSelector = '#server div:eq(4) div';
		var pattern = /[ \t\r\n\v\f]/;
		var isport = /^\d+$/;
		val = val.toLowerCase();
		val = val.replace(pattern, "");		
		
		console.log(val);
			$(inputSelector).removeClass('has-error has-feedback');
			$('#server div:eq(4) div span').remove();
			isValidate = false;
		if( val.length == 0 || isport.test(val) == false || parseInt(val) >65535) 
		{
			console.log(val.length);
			$(inputSelector).toggleClass('has-error has-feedback');
			$(inputSelector).append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');

			isValidate = false;
		}else 
		{
			$(inputSelector).removeClass('has-error has-feedback');
			$('#server div:eq(4) div span').remove();
			isValidate = true;	
			console.log(isValidate)
		}
		
		
	if(!isValidate) 
	{
		$('#server button').attr('disabled', ' ');	
	}
	else
	{
		$('#server button').removeAttr('disabled');	
	}
	});
	
	$('#server input[name=user]').on('blur', function() {	
		var input =  $('#server input[name=user]');
		var val = input.val();
		input.val(val);
		var inputSelector = '#server div:eq(6) div';
		var pattern = /[ \t\r\n\v\f]/;
		
		val = val.toLowerCase();
		val = val.replace(pattern, "");		
		
		console.log(val);
			$(inputSelector).removeClass('has-error has-feedback');
			$('#server div:eq(6) div span').remove();
			isValidate = false;
			
		if( val.length == 0 ) 
		{
			console.log(val.length);
			$(inputSelector).toggleClass('has-error has-feedback');
			$(inputSelector).append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');

			isValidate = false;
		}else 
		{
			$(inputSelector).removeClass('has-error has-feedback');
			$('#server div:eq(6) div span').remove();
			isValidate = true;	
			console.log(isValidate)
		}
		
		
	if(!isValidate) 
	{
		$('#server button').attr('disabled', ' ');	
	}
	else
	{
		$('#server button').removeAttr('disabled');	
	}
	});
	

	$('#server input[name=pass]').on('blur', function() {	
		var input =  $('#server input[name=pass]');
		var val = input.val();
		input.val(val);
		var inputSelector = '#server div:eq(8) div';
		var pattern = /[ \t\r\n\v\f]/;
		
		val = val.toLowerCase();
		val = val.replace(pattern, "");		
		
		console.log(val);
			$(inputSelector).removeClass('has-error has-feedback');
			$('#server div:eq(8) div span').remove();
			isValidate = false;
			
		if(val.length < 6 || val.length == 0) 
		{
			console.log(val.length);
			$(inputSelector).toggleClass('has-error has-feedback');
			$(inputSelector).append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');

			isValidate = false;
		}else 
		{
			$(inputSelector).removeClass('has-error has-feedback');
			$('#server div:eq(8) div span').remove();
			isValidate = true;	
			console.log(isValidate)
		}
		
		

	});	
	
	
}