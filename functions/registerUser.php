<?php

require_once '../includes/DBoperations.php';
$response=  array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    if ($username and $password and $email) {       
 
        $db = new DbOperations();  
        $result = $db->createUser( $username, $password, $email);

        if($result == 1){
            $response['error'] = false; 
            $response['message'] = "User registered successfully";
        }elseif($result == 2){
            $response['error'] = true; 
            $response['message'] = "Some error occurred please try again";          
        }elseif($result == 0){
            $response['error'] = true; 
            $response['message'] = "It seems you are already registered, please choose a different email";                     
        }
 
    }else{
        $response['error'] = true; 
        $response['message'] = "Required fields are missing";
    }
}else{
    $response['error'] = true; 
    $response['message'] = "Invalid Request";
}

echo json_encode($response);

?>