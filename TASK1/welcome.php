<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:index.php');
    }
    include('conn.php');
    $query=$conn->query("select * from usertable where id='".$_SESSION['user']."'");
    $row=$query->fetch_array();
?>

<!DOCTYPE html>
<html>
<head>
<title>DASHBOARD</title>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>USER DASHBOARD</h2>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <h2><center>Welcome, <?php echo $row['name']; ?></center></h2>
            <center><a href="logout.php" class="btn btn-danger"> Logout</a></center>
        </div>
    </div>
</div>
</body>
</html>