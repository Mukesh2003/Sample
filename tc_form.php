<?php
    require_once("connect.php"); 
    $id=$_POST["fname"];
    if(!$id){
        header('Location: roll.html'); 
    }
    if(isset($_POST["fname"])){
    $query1=" SELECT * from `tc` where `Roll_Number` = '".$id."' ";
        $queryfire1 = mysqli_query($conn, $query1);
        $num1=mysqli_num_rows($queryfire1); 
        $result1=mysqli_query($conn,$query1); 
        $row1=mysqli_fetch_assoc($result1);
    $query=" SELECT * from samplestudent1 where RollNumber = '".$id."' ";
    $queryfire = mysqli_query($conn, $query);
    $num=mysqli_num_rows($queryfire); 
    $query2="SELECT `TC` FROM serial";
    $queryfire2 = mysqli_query($conn, $query2);
    $row2=mysqli_fetch_assoc($queryfire2);
    if($num){
        $result=mysqli_query($conn,$query); 
        $row=mysqli_fetch_assoc($result);
    }
    else{
        header('Location: roll.html');  
    }
}
else{
    $query1=" SELECT * from `tc` where `Roll_Number` = '".$id."' ";
        $queryfire1 = mysqli_query($conn, $query1);
        $num1=mysqli_num_rows($queryfire1); 
        $result1=mysqli_query($conn,$query1); 
        $row1=mysqli_fetch_assoc($result1);
    $query2="SELECT TC FROM serial";
    $queryfire2 = mysqli_query($conn, $query2);
    $row2=mysqli_fetch_assoc($queryfire2);
    if(isset($_POST['save'])){
        $id=$_POST['admin_no'];
        $course=$_POST['course'];
        $sur_name=$_POST['sur_name'];
        $name=$_POST['name'];
        $father_name=$_POST['father_name'];
        $father_sur_name=$_POST['father_sur_name'];
        // $date=$_POST['date'];
        $religion=$_POST['religion'];
        $dob=$_POST['dob'];
        $date_adm=$_POST['date_adm'];
        $qualify=$_POST['qualify'];
        $fee_pay=$_POST['fee_pay'];
        $date_left=$_POST['date_left'];
        $remarks=$_POST['remarks'];
        $conduct=$_POST['conduct'];
        $query="UPDATE samplestudent1 SET Course='$course',Student_Name='$name',Student_Sur_Name='$sur_name',Father_Name='$father_name',Father_Sur_Name='$father_sur_name',
        Nationality='$religion',Date_of_Birth='$dob',Admission_date='$date_adm',
        Promoted='$qualify',Fee_paid='$fee_pay',Date_college_left='$date_left',
        Remarks='$remarks',Conduct='$conduct' where RollNumber='$id'";
        $query_run=mysqli_query($conn,$query);
    }
    if(isset($_POST['print'])){
        $val4=$row2['TC']+1;
        $query4="UPDATE serial SET TC='$val4'";
        $query_run4=mysqli_query($conn,$query4);
        $idd=$_POST['admin_no'];
        $date=$_POST['date'];
        $query5=" SELECT * from `tc` where `Roll_Number` = '".$idd."' ";
        $num5 = mysqli_query($conn, $query5);
        $num6 =mysqli_num_rows($num5); 

        if($num6)
        {
            $query1= "UPDATE `tc` SET `dup`='DUPLICATE' WHERE `Roll_Number`='".$idd."'";
            $query_run=mysqli_query($conn,$query1);
        }
        else{
            $query1= "INSERT into `tc`(`Roll_Number`,`Date`) values ('".$idd."','".$date."')";
            $query_run=mysqli_query($conn,$query1);
            $query1= "UPDATE `tc` SET `dup`='DUPLICATE' WHERE `Roll_Number`='".$idd."'";
            $query_run=mysqli_query($conn,$query1);
        }
    }
}
?>
<html>
<head>
<!-- <title>jntugv1</title> -->
<link rel="stylesheet" href="fom.css">
<style>
    input[type=text] {
  width: 150;
  padding: 0.5px 0.5px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid black;
  text-align: center;

}
.cls{
margin-top:75px;
margin-left:550px;
font-size:15px;
}
*{
 font-family:Calibri;
 }

h2{
    font-family: Calibri; 
    font-size: 26pt;         
    font-style: normal; 
    color:black;
    text-align: center; 
  }

table1{
  border: 1px solid black;
  width:200%;
}
 table2 {
  border: 1px solid black;
}
table3 {
  border: 1px solid black;
}
.sum
{
  font-size:22px;
}
.sum1
{
  font-size:20px;
}
.sum2
{
  font-size:22px;
}
.sum3
{
 font-size:15px;
}
/* .image { 
        background-image: url("logo.jpg");
        background-repeat:no-repeat;
        background-position:center;
        background-size: 40% 50%;
        image-resolution: 30dpi;
        } */

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
<form action="tc_form.php" method = "post">
<table align="center" class="table1">
<tr>
<td>Serial No:<input type="text" name="serial" maxlength="1000" value="<?php 
   echo $row2['TC'];
   ?>">
   <td align="right"> <input type="text"  name="dup" value= "<?php 
      if($num1){
        echo $row1['dup'];
      }
     ?>"></td> 
</tr>
</td>
</tr>
<tr>
<td class="sum" ><center>JAWAHARLAL  NEHRU TECHNOLOGICAL UNIVERSITY KAKINADA</center>
</td>

</tr>
<tr>
<td class="sum1"><center>UNIVERSITY COLLEGE OF ENGINEERING,VIZINAGARAM-535003(AP)</center></td>
</tr>
</table>
<table class="table2" align="center">
<tr>
<td width=250>Adm.No:<input type="text" name="admin_no" value = "<?php    
       echo $id;
    ?>"></td>
<td width=200 align="center"><img src="logo.jpg" width="100" height="100" alt="hii"></td>
<td width=300 align="center">Date:<input type="text" name="date" value="<?php
  echo "".date("d-m-Y");
?>"></td>
</td>
<!-- <td align="right"> <input type="text"  name="dup" value= "<?php 
      if($num1){
        echo $row1['dup'];
      }
     ?>"></td>  -->
</tr>
</table>

<table class="table3" align="center" >
<tr>
<td class="sum2"><center><b>TRANSFER CERTIFICATE</b></center>
</td>
</tr>

<table  align="center" cellpadding="0" width="95%">
<tr>
<td class="t1">1.</td>
<td>Name of the College which the pupil is leaving</td>
<td>....</td>
<td align="center"><input type="text" name="college_name" maxlength="1000" style="width:200%;" value = "<?php    
       echo  "University College of Engineering,Vizianagaram" ;
    ?>"/>
</td>
</tr>
<tr>
<td class="t1">2.</td>
<td> Name of the pupil</td>
<td>....</td>
<td align="center"><input type="text" name="sur_name" maxlength="1000" value = "<?php    
       echo $row['Student_Sur_Name'];?>"></td>
       <td>
        <input type="text" name="name" maxlength="1000" value = "<?php    
       echo $row['Student_Name'];?>">
      
 
</td>
</tr>
<tr>
<td >3.</td>
    <td>Name of the Father/Guardian</td>
<td>....</td>
    <td align="center"><input type="text" name="father_sur_name" maxlength="1000" width ="100" value = "<?php    
       echo $row['Father_Sur_Name'];?>"></td>
       <td>
       <input type="text" name="father_name" maxlength="1000" width ="100" value = "<?php    
       echo $row['Father_Name'];?>">
    </td>
    </tr>
    <tr>
        <td >4.</td>
        <td>Nationality,Religion,Caste</td>
         <td>....</td><td align="center">
        <input type="text" name="religion" maxlength="1000" style="width:200%;" value = "<?php    
        echo $row['Nationality'];
    ?>"/>
        </td>
        </tr>
       
       
 
<!----- Date Of Birth -------------------------------------------------------->
<tr>
<td >5.</td>
<td>Date Of Birth as entered in the adimission register(in words)</td>
 <td>....</td>
<td align="center"><input type="text" name="dob" maxlength=1000 style="width:200%;" value = "<?php    
       echo $row['Date_of_Birth'];
    ?>"></td>
</tr>
<tr>
<td >6.</td>
    <td>Class in which the pupil was studying at the time of leaving</td>
<td>....</td>
    <td align="center"><input type="text" name="course" maxlength="1000"  style="width:200%;" value = "<?php    
       echo $row['Course'];
    ?>"/>
    
    </td>
    </tr>

    <tr>
        <td>7.</td>
        <td>Date of admission</td>
<td>....</td>
        <td align="center"><input type="text" name="date_adm" maxlength="1000" style="width:200%;" value = "<?php    
         echo $row['Admission_date'];
    ?>"/>
        
        </td>
        </tr>
             

<tr>
<td>8.</td>
<td>Whether qualified for promotion to a higher class</td>
<td>....</td>
<td align="center"><input type="text" name="qualify" maxlength="1000" style="width:200%;" value = "<?php    
       echo $row['Promoted'];
    ?>"/>

</td>
</tr>
 

<tr>
<td>9.</td>
    <td> Whether the pupil has paid all the fees due to the college</td>
<td>....</td>
    <td align="center"><input type="text" name="fee_pay" maxlength="1000" style="width:200%;"
    value = "<?php    
       echo $row['Fee_paid'];
    ?>"/>
    
    </td>
    </tr>
     

<tr>
<td>10.</td>
<td>Date on which pupil actually left the college</td>
<td>....</td>
<td align="center"><input type="text" name="date_left" maxlength="1000" style="width:200%;"
value = "<?php    
       echo $row['Date_college_left'];
    ?>"/>
</td>
</tr>
 



 

<tr>
<td>11.</td>
    <td>Date on which appilication for Transfer Certificate was made <br> on behalf the pupil by his/her parent or Guardian </td>
<td>....</td>
    <td align="center"><input type="text" name="date_made" maxlength="1000" style="width:200%;"
    value = "<?php    
        echo "".date("d-m-Y");
    ?>"/></td>
    </tr>
 
<tr>
<td>12.</td>
<td>Counduct and Character</td>
<td>....</td>
<td align="center"><input type="text" name="conduct" maxlength="1000" style="width:200%;"
value = "<?php    
       echo $row['Conduct'];
    ?>"/>
</td>
</tr>

<tr>
<td>13.</td>
<td>General Remarks</td>
<td>....</td>
<td align="center"><input type="text" name="remarks" maxlength="1000" style="width:200%;"
value = "<?php    
       echo $row['Remarks'];
    ?>"/>
</td>
</tr>

</table>
<div class="cls">
<center>
PRINCIPAL<br>
UNIVERSITY COLLEGE OF ENGINEERING<br>
JNTUK VIZIANAGARAM CAMPUS
</center>
<tr>
    <td><input id="save" type="submit" value="save" name="save"></td>
    <td><input id="print" type="submit" value="print" name="print" onclick = "prFun()">  </td>
</tr>
<div>
</form>
</body>
</html>