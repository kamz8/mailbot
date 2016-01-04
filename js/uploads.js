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
        	var res = label.split('.');
			console.log(res[1]);
			$('.glyphicon-ok-circle').hide()
			$('.glyphicon-exclamation-sign').hide();
			if(res[1]=='csv') 
			{
			$('.glyphicon-ok-circle').show();
			console.log('ok');
			}
			else 
			{
			$('.glyphicon-exclamation-sign').show();
			
			}
    });
	

	
});

