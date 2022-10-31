<?php
    include('conn.php');
    session_start();
    $data = json_decode(file_get_contents("php://input"));
     
    $out = array('error' => false);
    $username = mysqli_real_escape_string($conn, $data->username);
    $password = mysqli_real_escape_string($conn, $data->password);
     
    $query=$conn->query("select * from usertable where email='$username' and password='$password'");
    if($query->num_rows > 0){
        $row=$query->fetch_array();
        $_SESSION['user']=$row['id'];
        $out['message'] = $row['name'];
    }
    else{
        $out['error'] = true;
    }
   
    echo json_encode($out);
?>