<?php
    include('conn.php');
    $data = json_decode(file_get_contents("php://input"));
     
    $out = array('error' => false);
    $name=mysqli_real_escape_string($conn, $data->name);
    $username = mysqli_real_escape_string($conn, $data->username);
    $password = mysqli_real_escape_string($conn, $data->password);
     
    $query=$conn->query("SELECT * FROM usertable WHERE email='$username' AND password='$password'");
    if($query->num_rows > 0){
        $out['error']=true;
    }
    else
    {
       $query=$conn->query("INSERT INTO usertable(name,email,password)VALUES('$name','$username','$password')");
    }
   
    echo json_encode($out);
?>