<?php 
echo 'in php';

if (isset($_POST['submit']))
{
	echo 'button clicked';
}


?>


 <form action='#' method='post'>
 	<input name="submit" type='submit' value='submit'>
 </form>