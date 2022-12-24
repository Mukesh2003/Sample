<?php
require_once("connect.php"); 

if(!empty($_POST['save'])){
    $username=$_POST['user_name'];
    $password=$_POST['password'];
    $query= "select * from login where user_name='$username' and password = '$password'";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    if($count>0){
        echo "Login Successful";
        header('Location: cse_main_page.html');
    } 
    else{
        echo "Not successful";
    }
}
?>
<html>
<title>Login_page</title>
<head>
    <link rel="stylesheet" href="style.css">
</head>

<body bgcolor="paleyellow">
    <h1 align="center">JNTU-GV</h1>
    <h2 align="center">Student Certificates</h2>
    <center>
    <form action="" method="post">
       <b> User Name :</b><input type="text" name="user_name" placeholder="username"> <br><br>
       <b> Password :<b> <input type="password" name="password" placeholder="password"><br></br>
       <input type="submit" value="login" name="save">
         
</body>
</html>
        