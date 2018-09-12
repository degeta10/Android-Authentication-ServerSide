<?php

class DBoperations{
    
    private $con;
    
    function __construct()
    {
        require_once dirname(__FILE__).'/DBconnect.php';

        $db_connect = new DBconnect();

        $this->con = $db_connect->connect();
    }

    function createUser($user,$pass,$email)
    {
        $password = md5($pass);
        $query = $this->con
            ->prepare("INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES (NULL,?,?,?);");
        $query->bind_param("sss",$user,$password,$email);
        if ( $query->execute() ) {
            return true;
        } else {
            return false;
        }      

    }
}

?>