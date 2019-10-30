<?php 

include "../address.php";

include $APP_ROOT.'assets/linker/db.php' ; 


if(isset($_POST['email'])){
    $cookie_name = 'email' ;
    $cookie_value = $_POST['email'] ; 
    setcookie($cookie_name, $cookie_value, time()+6, "/");
}

if(isset($_POST['email']) && isset($_POST['password'])){

    $pdo = get_PDO_connection();

        // calling stored procedure command
    $sql = 'CALL login(:email , :pass , @level)';
    
        // prepare for execution of the stored procedure
    $stmt = $pdo->prepare($sql);


    $email = $_POST['email'];
    $password = $_POST['password'];

    

        // pass value to the command
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $password, PDO::PARAM_STR);


        // execute the stored procedure
    $stmt->execute();

    $stmt->closeCursor();

        // execute the second query to get customer's level
    $row = $pdo->query("SELECT @level AS level")->fetch(PDO::FETCH_ASSOC);
    print_r($row);
    if ($row) {
        	//echo  $row['level'];
            // return $row !== false ? $row['level'] : null;
        if($row['level']=='NO'){

            setcookie('login_error', 'wrong email/password', time()+6, "/");

            header("Location: ".$loginPage);

                //echo 'no';
        }else if($row['level']=='YES'){

                //echo 'successfull' ;
            header("Location: ".$dashboardPage);
        }


    }

}



?>