$(document).ready(function() {
	console.log('jQuery is Working');
	  // search key type event
	$('#search').keyup(function{
		 if($('#search').val()) {
		let search= $('#search').val();
		console.log(search);
		$.ajax({
			url: 'processcreateprestamo.php',
			 data: { search },
            type: 'POST',
            success: function(response){
            	 if(!response.error) {
            let tasks = JSON.parse(response);
            let template = '';
            tasks.forEach(task => {
              template += `
                     <li><a href="#" class="task-item">${task.name}</a></li>
                    ` 
            });
            $('#task-result').show();
            $('#container').html(template);
          }
            }
		})
	})
});