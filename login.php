<?php

require "conn.php";

$name = "John";
$password = "qwe123";

$mysql_qry= "select * from users where name like '$name' and password like '$password';";

// $mysql_qry= "SELECT * FROM users WHERE username = '".$_POST['name']."' and password = '".$_POST['password']."'";

$result = mysqli_query($conn,$mysql_qry); 

if (mysqli_num_rows($result) > 0) {  
    echo "login successfully";
} else {
    echo "login un-successfully";
}

?>