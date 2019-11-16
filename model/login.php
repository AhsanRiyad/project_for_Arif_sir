<?php 

include "../address.php";

include $APP_ROOT.'assets/linker/db.php' ; 



$data =  file_get_contents('php://input');

$d1 = json_decode($data);


if (hash_equals($_SESSION['csrf_token1'], $email = $d1->csrf_token1)) {




    $email = $d1->email;
    $password1 = md5($d1->password);



    $conn = get_mysqli_connection();

    $sql = "CALL login( ?, ?, @result)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss' , $email, $password1);
    $stmt->execute();   

    $stmt->close();
    $sql = 'select @result as st'; 
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $conn->close();
//print_r($row);
    echo $row['st'];


}else{
    echo 'you are not authorized';
}



?>