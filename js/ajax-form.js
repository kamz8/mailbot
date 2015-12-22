$("form button").click(function() {
   var subject = $('input[name=Subject]').val();
   var checkbox = $('input[name=checkbox]').val();
   $("#loading").show();
   var validate = false;
	console.log(checkbox);
	if(subject=='') $('.container-fluid .row:').add('brak tematu');

if(validate==true)
    $.ajax({
        type: "POST",
        url: "./rozpocznij-kampanie/?app=send",
        data: {
            subject: ''+subject,
            checkbox: ''+checkbox,
			
        },
        complete: function() {
			alert( "zkończyłem");
                $("#loading").hide();
        },
        success: function(msg) {
                alert( "Dane zwrotne: " + msg );
				   $("form button").attr("disabled", true);
                    setTimeout(function(){
                        $("#form button").attr("disabled", false); 
                    }, 10000);
        },
        error: function() {
                alert( "Wystąpił błąd w połączniu :(");
        }
    });
	
});

function loading(x)
{
	$('#loading div').css('width',x+'%');
}