<?php 
include "../address.php";

// MYSQLI
$mysqli = new mysqli('localhost', 'root', '', $databaseName);
print '<h3>MYSQLI: simple select</h3>';
$rs = $mysqli->query( 'SELECT * FROM users;' );
while($row = $rs->fetch_object())
{
debug($row);
}
print '<h3>MYSQLI: calling sp with out variables</h3>';
$rs = $mysqli->query( 'CALL login("araf", "arefea" , @first)' );
$rs = $mysqli->query( 'SELECT @first' );
while($row = $rs->fetch_object())
{
debug($row);
}

function debug($o)
{
print '<pre>';
print_r($o);
print '</pre>';
}



 ?>