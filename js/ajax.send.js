$(document).ready(function() {
	var isValidate = false;


    if(!isValidate) 
	{
		$('#mailform button').attr('disabled', ' ');
		
	}
	else
	{
		$('#mailform button').removeAttr('disabled');	
	}

	
	
	$('#mailform input[name=Subject]').on('blur', function() {	
	
	var input = $('#mailform input[name=Subject]');
		var val =  input.val();

		var inputSelector = '#mailform div:eq(0) div';
		var pattern = /^(.)$/;

		val = val.replace(pattern, ".");
		input.val(val);	
		console.log('subject');
		
			$(inputSelector).removeClass('has-error has-feedback');
			$('#mailform div:eq(0) div span').remove();
			isValidate = false;
		if(val.length < 3 || val.length == 0 ) 
		{
			console.log('1')
			$(inputSelector).toggleClass('has-error has-feedback');
			$(inputSelector).append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');

			isValidate = false;
		}else 
		{
			$(inputSelector).removeClass('has-error has-feedback');
			$('#mailform div:eq(0) div span').remove();
			isValidate = true;	
			console.log('Validate: '+isValidate)
		}	
		

	
	});
	
	
	        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });
	

			
        $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
            console.log(numFiles);
            console.log(label);
			var inputSelector = '#mailform div:eq(4) div';
			$('#upload-label').attr('value', label);
        	var res = label.split('.');
			console.log(res[1]);

				$(inputSelector).removeClass('has-success has-error');
				$(".input-group i").remove();	
			if(res[1]=='html' || res[1]=='htm') 
			{
			$(inputSelector).removeClass('has-error');	
			$(inputSelector).toggleClass('has-success');	
			$(".input-group").append(' <i class="glyphicon glyphicon-ok form-control-feedback"></i>');
			
			console.log('ok');
				isValidate = true;
			}
			else 
			{
			$(inputSelector).removeClass('has-success');

			$(inputSelector).toggleClass('has-error');
			$(".input-group").append(' <i class="glyphicon glyphicon-remove form-control-feedback"></i>');
			isValidate = false;
			
			}
	if(!isValidate) 
	{
		$('#mailform button').attr('disabled', ' ');
		
	}
	else
	{
		$('#mailform button').removeAttr('disabled');	
	}
	
					
    });
	

	

		
$("form button").click(function() {
   var subject = $('input[name=Subject]').val();
   var checkbox = $('input[name=checkbox]').val();
   $("#loading").show();
   var validate = false;
	console.log(checkbox);
	if(subject=='')
	{
		$('.container-fluid .row:').add('brak tematu');
		
	}
	

if(isValidate)
    $.ajax({
        type: "POST",
        url: "./test.php",
        data: {
            subject: ''+subject,
            checkbox: ''+checkbox,
			send: true,
			
        },
        complete: function() {
			alert( "zkończyłem");
                $("#loading").hide();
        },
		
		progress: function(e)
		{
			 alert( "Dane zwrotne: " + e );
		},
		
        success: function(msg) {
                alert( "Dane zwrotne: " + msg );
				   $("form button").attr("disabled", true);
                    setTimeout(function(){
                        $("#form button").attr("disabled", false); 
                    }, 100);
        },
        error: function() {
                alert( "Wystąpił błąd w połączniu :(");
        }
    });
	
});


});
function loading(x)
{
	$('#loading div').css('width',x+'%');
}