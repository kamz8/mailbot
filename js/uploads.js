        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });
	
	    $(document).ready( function() {
			var inputSelector = '#mailform div:eq(1)';
			
        $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
            console.log(numFiles);
            console.log(label);
			
			$('#upload-label').attr('value', label);
        	var res = label.split('.');
			console.log(res[1]);
			$('.glyphicon-ok-circle').hide()
			$('.glyphicon-exclamation-sign').hide();
				$(inputSelector).removeClass('has-success has-error');
				$(".input-group i").remove();	
			if(res[1]=='csv') 
			{
			$(inputSelector).removeClass('has-error');	
			$(inputSelector).toggleClass('has-success');	
			$(".input-group").append(' <i class="glyphicon glyphicon-ok form-control-feedback"></i>');
			
			console.log('ok');
			}
			else 
			{
			$(inputSelector).removeClass('has-success');
			$('.glyphicon-exclamation-sign').show();
			$(inputSelector).toggleClass('has-error');
			$(".input-group").append(' <i class="glyphicon glyphicon-remove form-control-feedback"></i>');
			
			
			}
    });
	

	
});

