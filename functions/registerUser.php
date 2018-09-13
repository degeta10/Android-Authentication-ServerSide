<?php

require_once '../includes/DBoperations.php';
$response=  array();

if ($_SERVER['REQUEST_METHOD']=='POST') {

    if (($_POST['username']) and isset($_POST['password']) and isset($_POST['email'])) {
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

// if($_SERVER['REQUEST_METHOD']=='POST'){
//     if(
//         isset($_POST['username']) and
//             isset($_POST['email']) and
//                 isset($_POST['password']))
//         {
//         //operate the data further 
 
//         $db = new DbOperations(); 
 
//         $result = $db->createUser(   $_POST['username'],
//                                     $_POST['password'],
//                                     $_POST['email']
//                                 );
//         if($result == 1){
//             $response['error'] = false; 
//             $response['message'] = "User registered successfully";
//         }elseif($result == 2){
//             $response['error'] = true; 
//             $response['message'] = "Some error occurred please try again";          
//         }elseif($result == 0){
//             $response['error'] = true; 
//             $response['message'] = "It seems you are already registered, please choose a different email and username";                     
//         }
 
//     }else{
//         $response['error'] = true; 
//         $response['message'] = "Required fields are missing";
//     }
// }else{
//     $response['error'] = true; 
//     $response['message'] = "Invalid Request";
// }



?>