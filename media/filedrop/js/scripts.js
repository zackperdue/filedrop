$(function(){
	
	var dropbox = $('.form');
	
	dropbox.filedrop({
	
		paramname: 'file',
		maxfiles: 5,
		maxfilesize: 10, //MB
		url: '/ajax/upload',
		
		uploadStarted: function(i, file, len)
		{
			console.log(file);
		}
	
	});
	
	$('.create-new-directory').on('click', function(e){
		
		$.ajax({
			type: 'POST',
			url: '/ajax/create_directory',
			data: 'current_dir=upload&dirname=zacksFolder',
			dataType: 'json',
			success: function(response){
				console.log(response);
				if(response.status == 'success')
				{
				
				}else if(response.status == 'failed')
				{
					alert(response.errors.dirname);
				}
			},
			error: function(response){
			
			}
		});
		
		e.preventDefault()
	});
	
	
	
});