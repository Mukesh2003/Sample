<?php
    require_once("connect.php");
    $id=$_POST["Transfer_certificate"];
    if(!$id){
        header('Location: sc.html'); 
    }
if(isset($_POST["Transfer_certificate"])){
    $query1=" SELECT * from `study` where `Roll_Number` = '".$id."' ";
    $queryfire1 = mysqli_query($conn, $query1);
    $num1=mysqli_num_rows($queryfire1); 
    $result1=mysqli_query($conn,$query1); 
    $row1=mysqli_fetch_assoc($result1);

    $query=" SELECT * from samplestudent1 where RollNumber = '".$id."' ";
    $queryfire = mysqli_query($conn, $query);
    $num=mysqli_num_rows($queryfire); 
    $query2="SELECT `STUDY` FROM serial";
    $queryfire2 = mysqli_query($conn, $query2);
    $row2=mysqli_fetch_assoc($queryfire2);
    if($num){
        $result=mysqli_query($conn,$query); 
        $row=mysqli_fetch_assoc($result);
    }
    else{
        header('Location: sc.html');  
    }

}
else{

    $query1=" SELECT * from `study` where `Roll_Number` = '".$id."' ";
    $queryfire1 = mysqli_query($conn, $query1);
    $num1=mysqli_num_rows($queryfire1); 
    $result1=mysqli_query($conn,$query1); 
    $row1=mysqli_fetch_assoc($result1);
    $query2="SELECT `STUDY` FROM serial";
    $queryfire2 = mysqli_query($conn, $query2);
    $row2=mysqli_fetch_assoc($queryfire2);
    if(isset($_POST['save'])){
        $idd=$_POST['adm_no'];
        $course=$_POST['inst'];
        $sur_name=$_POST['stu_sur_name'];
        $name=$_POST['stu_name'];
        $father_name=$_POST['father_name'];
        $father_sur_name=$_POST['father_sur_name'];
        // $date=$_POST['date'];
        $strt_date=$_POST['course_from'];
        $end_date=$_POST['course_to'];
        $conduct=$_POST['conduct'];
        $query="UPDATE samplestudent1 SET Student_Name='$name',Student_Sur_Name='$sur_name',Father_Name='$father_name',Father_Sur_Name='$father_sur_name',Course='$course',Course_start_date='$strt_date',Course_end_date='$end_date',Conduct='$conduct' where RollNumber='$idd'";
        $query_run=mysqli_query($conn,$query);
    }

    if(isset($_POST['print'])){  
        $val4=$row2['STUDY']+1;
        $query4="UPDATE serial SET STUDY='$val4'";
        $query_run4=mysqli_query($conn,$query4);
        $idd=$_POST['adm_no'];
        $date=$_POST['date'];
        $query5=" SELECT * from `study` where `Roll_Number` = '".$idd."' ";
        $num5 = mysqli_query($conn, $query5);
        $num6 =mysqli_num_rows($num5); 

        if($num6)
        {
            $query1= "UPDATE `study` SET `dup`='DUPLICATE' WHERE `Roll_Number`='".$idd."'";
            $query_run=mysqli_query($conn,$query1);
        }
        else{
            $query1= "INSERT into `study`(`Roll_Number`,`Date`) values ('".$idd."','".$date."')";
            $query_run=mysqli_query($conn,$query1);
            $query1= "UPDATE `study` SET `dup`='DUPLICATE' WHERE `Roll_Number`='".$idd."'";
            $query_run=mysqli_query($conn,$query1);
        }
    }

}

?>
<html>
<head>
<title>
study certificate
</title>
<style>
input[type=text] {
  width: auto;
  padding: 0.5px 0.5px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid black;
  text-align: center;

}
.a{
input[type=text] {
  width: auto;
  padding: 0.5px 0.5px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid black;
  text-align: left;
}
}
#sum{
font-size:21px;
}
#sum1{
font-size:17px;
}
#s1{
font-size:14px;
}
#s2{
font-size:18px;
}
#s3{
font-size:18px;
}
#sum3{
font-size:22px;
}
#sum4{
font-size:60px;
}
.sum5{
margin:30px;
margin-left:400px;
}
.sum6{
margin:30px;
margin-left:450px;
margin-right:410px;
font-size:17px;
}
.sum7{
margin-left:410px;
}
.sum8
{
font-size:30px;;
}

.noout:  {
    outline: none;
    border:none;
    background-color: transparent;
    resize:none;
}
</style>

<script>

var prFun=function(){

    var pr=document.getElementById("print");
    var sa=document.getElementById("save");
    pr.style.visibility = 'hidden';
    sa.style.visibility = 'hidden';
    window.print();
}
</script>


</head>
<body>
<form action="study.php" method = "post">
<div>
<center>
<table><tr><td width = 700 align = left><label>Serial.No :</label><input type="text" value=" <?php 
   echo $row2['STUDY'];
   ?>"> </font></td>
<td align="right"> <input type="text"  name="dup" value= "<?php 
    //  echo $row1;
    //  echo $num1;

      if($num1){
        echo $row1['dup'];
      }
     ?>"></td>    
</tr></table>
</center>
<center>
<b>
<div id="sum3">JAWAHARLAL NEHRU TECHNOLOGICAL UNIVERSITY KAKINADA <br></div>
</b>
<div id="sum">UNIVERSITY COLLEGE OF ENGINEERING, VIZIANAGARAM - 535003(A.P.)</div>
</center>
<center>
<table>
<tr>
<td width =300> <font size = "3"><label>Adm.No :</label><input type = "text"   name = "adm_no"  value = "<?php    
       echo $id;
    ?>"> </font> </td>
<td width = 180 align="center"> <img src="logo.jpg" alt ="LOGO" height = 120 width = 120></td>
<td> <font size = "3"><label>Date:</label><input type = text name = "date"  value = "<?php    
       echo "".date("d-m-Y");?>"> </font> <br></br></td>
 
     

    
</tr>
</table>
</center>
<div class = sum8><br>
<center>
STUDY & CONDUCT CERTIFICATE<br></br>
</center>
</div>
<center>
<table>
<tr>
<td width = 650px align ="right">
<label>This is to certify that Mr./Ms. </label> <input type = text  size="10" name = "stu_sur_name" value = "<?php    
       echo $row['Student_Sur_Name'];?>">
    <input type = text size="22" class="a" name = "stu_name" value = "<?php    
       echo $row['Student_Name'];
    ?>"></br>
</td></tr>
<tr><td align="center">
    <label>S/o,D/o </label><input type = text size="22" name ="father_sur_name" value = "<?php    
       echo $row['Father_Sur_Name'];?>">
       <input type = text class="a" size="22" name ="father_name" value = "<?php    
       echo $row['Father_Name'];?>"><label>has studied in the</label>
 </td></tr><tr><td>
 <label> institution in the</label><input type = text size="22" name ="inst" value = "<?php    
       echo $row['Course'];
    ?>"><label>course from </label><input type = text size="15" name = "course_from" value = "<?php    
    echo $row['Course_start_date'];
 ?>">
<label>to</label><input type = text size="15" name = "course_to" value = "<?php    
       echo $row['Course_end_date'];
    ?>" ></td></tr><tr><td align="center"></div><br>

<label>During his/her stay at this college his/her conduct and character </label></td></tr><tr><td><label> were found to be</label> <input type = text size="15" name="conduct" value = "<?php    
       echo $row['Conduct'];
    ?>"> </label></br>
</td>
</tr>
</table>
</center>
<br><br><br>
<div class=sum5>
<div id = s1><center>PRINCIPAL<br>
UNIVERSITY COLLEGE OF ENGINEERING<br>
JNTUK VIZIANAGARAM CAMPUS</div></center>
<?php
//  echo $_POST["print"];  
//  echo $pri;  
//  echo $sav;  

 ?>
</div>
<center>
    <input id="save" type="submit" value="save" name="save">
    <input id="print" type="submit" value="print" name="print" onclick="prFun()">  
</center>
</form>
</body>
</html>
<!-- onclick="prFun()" -->