<?php

require_once '../includes/DBoperations.php';
$response=  array();

if ($_SERVER['REQUEST_METHOD']=='POST') {

    if (isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email'])) {
        $db_connect= new DBoperations();
        if ($db_connect->createUser($_POST['username'],$_POST['password'],$_POST['email'])) {
            $response['error'] =false;
            $response['message']= "User registered successfully!";
        } else {
            $response['error'] =true;
            $response['message']= "User registered failed!";
        }       
        
    } else{
        $response['error'] =true;
        $response['message']= "Required fields are missing!";
    }
} else {
    $response['error'] =true;
    $response['message']= "Invalid Request";
}

echo json_encode($response);

?>