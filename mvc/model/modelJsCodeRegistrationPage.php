<?php 
	if($msg == 'successful')
	{

		?>
		<script type="text/javascript">
			var i = document.getElementById('msg');
			i.innerHTML = 'Registraion successful';
			i.classList.remove('text-dark');
			i.classList.add('text-white' , 'bg-success');

		</script>
		<?php 
	}
	else if($msg == 'Duplicate Email')
	{

		?>
		<script type="text/javascript">
			var i = document.getElementById('msg');
			i.innerHTML = 'Email already used';
			i.classList.remove('text-dark');
			i.classList.add('text-white' , 'bg-danger');

		</script>


		<?php 
	}
	?>
	
