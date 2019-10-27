<?php 
include "../address.php";


    try {
        $pdo = new PDO("mysql:host=$hostName;dbname=$databaseName", $userName, $password);
 
        // calling stored procedure command
        $sql = 'CALL login(:id , :pass , @level)';
 
        // prepare for execution of the stored procedure
        $stmt = $pdo->prepare($sql);
 		$customerNumber = 'aref';
 		$pass = 'rf' ; 
        // pass value to the command
        $stmt->bindParam(':id', $customerNumber, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);

 
        // execute the stored procedure
        $stmt->execute();
 
        $stmt->closeCursor();
 
        // execute the second query to get customer's level
        $row = $pdo->query("SELECT @level AS level")->fetch(PDO::FETCH_ASSOC);
        print_r($row);
        if ($row) {
        	echo  $row['level'];
            return $row !== false ? $row['level'] : null;
        }
    } catch (PDOException $e) {
        die("Error occurred:" . $e->getMessage());
    }
    



 ?>