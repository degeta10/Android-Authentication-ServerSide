<?php

require_once '../includes/DBoperations.php';
$response=  array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    $email = $_POST['email'];
    $password = $_POST['password'];    

    if ( $password and $email ) {
        $db = new DbOperations();  
        $result = $db->loginUser($email,$password);
        if ($result == 1) {
            $user = $db->getUserByEmail($email);
            $response['error'] = false; 
            $response['id'] = $user['id'];
            $response['username'] = $user['username'];
            $response['email'] = $user['email'];            
        }
        else
        {
            $response['error'] = true; 
            $response['message'] = "Invalid Username / Password";
        }
       
    }
    else{
        $response['error'] = true; 
        $response['message'] = "Required fields are missing";
    }
}
echo json_encode($response);
?>