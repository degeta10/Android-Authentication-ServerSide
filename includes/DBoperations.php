<?php

class DBoperations{
    
    private $con;
    
    function __construct()
    {
        require_once dirname(__FILE__).'/DBconnect.php';

        $db_connect = new DBconnect();

        $this->con = $db_connect->connect();
    }

    private function isUserExist($email)
    {
        $query =$this->con->prepare("SELECT id FROM users WHERE email = ?");
        $query->bind_param("s",$email);
        $query->execute();
        $query->store_result();
        return $query->num_rows>0;
    }
    
    public function loginUser($email,$pass)
    {
        $password =md5($pass);
        $query =$this->con->prepare("SELECT id FROM users WHERE email = ? AND password = ?");
        $query->bind_param("ss",$email,$password);
        $query->execute();
        $query->store_result();

        return $query->num_rows>0;
    }

    public function getUserByEmail($email)
    {
        $query =$this->con->prepare("SELECT * FROM users WHERE email = ?");
        $query->bind_param("s",$email);
        $query->execute();
        return $query->get_result()->fetch_assoc();
    }

    public function createUser($user,$pass,$email)
    {
        if ($this->isUserExist($email)) {
           return 0;
        }
        else {
            $password = md5($pass);
            $query = $this->con
                ->prepare("INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES (NULL,?,?,?);");
            $query->bind_param("sss",$user,$password,$email);
            if ( $query->execute() ) {
                return 1;
            } else {
                return 2;
            }   
        }
    }
}

?>