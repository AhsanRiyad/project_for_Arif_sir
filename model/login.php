<?php 

include "../address.php";

include $db ; 



$data =  file_get_contents('php://input');

$d1 = json_decode($data);


/*if (hash_equals($_SESSION['csrf_token1'], $email = $d1->csrf_token1)) {

*/


    $conn = get_mysqli_connection();
    $password1 = md5($d1->password);
    $email = mysqli_real_escape_string($conn ,  $d1->email);

    $sql = "CALL login( ?, ?, @result)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss' , $email, $password1);
    $stmt->execute();   

    $stmt->close();
    $sql = 'select @result as st'; 
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    

    if($row['st'] == 'YES_USER'){
        $_SESSION['email'] =  $email;
        $_SESSION['type'] = 'user';

       


        $sql = 'select * from users_registration ur , users_info ui , users_address ua , verification_info  vi ,  user_uploads uu where uu.email = ur.email and ui.email = ur.email and  ua.email = ur.email and vi.email = ur.email and  ur.email ='.'"'.$email.'"';  
        $result = mysqli_query($conn, $sql);
        $row1 = mysqli_fetch_assoc($result);
        $_SESSION['users_info'] = $row1;

        // format
        // echo $_SESSION['users_info']['email'];



    }else if($row['st'] == 'YES_ADMIN'){
        $_SESSION['email'] =  $email;
        $_SESSION['type'] = 'admin';
    }

//print_r($row);
    $conn->close();
    echo $row['st'];


/*}else{
    echo 'you are not authorized';
}
*/


?>