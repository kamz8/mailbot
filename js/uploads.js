        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });
	
	    $(document).ready( function() {
        $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
            console.log(numFiles);
            console.log(label);
			$('#upload-label').attr('value', label);
        
		$.ajax({
        type: "POST",
        url: "./uploader.php",
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
    });
	
	$("form button[name=submit]").click(function() {
		
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