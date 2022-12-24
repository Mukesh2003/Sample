<?php 

 
 $servername="localhost";
 $username="root";
 $password="";
 //connection to mysql
 $conn=mysqli_connect($servername,$username,$password,"db");
 if(!$conn)
 {
	die("Connection Failed".mysql_error());
 }
 
 
 ?>