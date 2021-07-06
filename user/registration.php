<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
  <title>BOOKING PORTAL</title>
<style type="text/css">
	#contenar{
		height: 100%;
		width: 100%;
    background-image: url("hotelroom.jpg");
    background-size: cover;
		
	}
	#r{
		margin-top: 0%;
		margin-bottom: 5%;
		margin-left: 33%;
		float: center;
		background-color: black;
    color: white;
    opacity:0.9;
    border-bottom: solid 10px orange;
    width: 500px;
    position: absolute;
    top: 30%;
    padding: 10px;
    box-shadow: 0px 0px 8px 5px rgba(0,0,0,0.6);

		
	}

  td{
    color:white;
  }

  #submit{
    background-color: grey; 
    color:white; 
    height: 30px; 
    width:100px; 
    position: absolute; 
    left: 200px
  }

  #submit:hover{
    background-color: white;
    color: black;
  }
	</style>
	

     
</head>

<body bgcolor="black">
  <h1 align="center" style="color:black; background-color:orange; font-family: Agency FB; height: 40px; vertical-align: middle;"><b>Book Your Room</b></h1>
<?php
include('include/db_con.php');
session_start();
if(isset($_POST['sub']))
{
$username=$_POST['username'];
$roomtype=$_POST['field_1'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$room_nos=$_POST['room_nos'];
$amount=$_POST['roomprice'];

$checkroom= "select count(*) from roomdetail where room_type='".$roomtype."' ";
$check=mysqli_query($con,$checkroom) or die (mysqli_error($con));
$roomcount=mysqli_fetch_array($check,MYSQLI_ASSOC);
 $checkcount=$roomcount[0];
if($checkcount>=10)
{
?> <script>alert("Sorry Rooms Are not Available :( please try another Option !!");</script>
<?php }
else{
$s1="INSERT INTO roomdetail (username,checkin_date,checkout_date,room_type,no_of_room,amount)VALUES('".$username."','".$startdate."','".$enddate."','".$roomtype."','".$room_nos."','".$amount."')";
mysqli_query($con,$s1) or die (mysqli_error($con));
header("location:success.php");
}
}
?>

<div id="contenar">

	<div id="r">
	<form action="registration.php" method="POST">
	
	<h2 style="font-family:courier new; color:white ;"> Welcome <?php session_start(); if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?> !</h2>
        <table cellspacing="6">
		
          <tr>
            <td width="113">Check in Date</td>
            <td width="215">
              <input name="startdate1" type="date"  value="<?php if(isset($_POST['startdate1'])){ echo $_POST['startdate1']; }?>" /></td>
          </tr>
          <tr>
            <td>Check out Date</td>
            <td>
              <input name="enddate1" type="date" value="<?php if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; }?>" onchange='this.form.submit()' /></td>
          </tr>
			
       </table>
		</form>
		<form action="registration.php" method="POST">
        <table cellspacing="6">
		
          <tr>
            <td width="113"></td>
            <td width="215">
              <input name="startdate" type="hidden" value=" <?php if(isset($_POST['startdate1'])){ echo $_POST['startdate1']; }?> " /></td>
          </tr>
          <tr>
            <td></td>
            <td><input name="username" type="hidden" value="<?php session_start(); if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?>"  />
              <input name="enddate" type="hidden" value=" <?php if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; }?> "  /></td>
          </tr>
		  <tr>
            <td>Room Type </td>
            <td>
              <select class="text_select" id="field_1" name="field_1" >  
<option value="00">- Select -</option>   
<?php if(isset($_POST['startdate1'])){
$paymentDate = $_POST['startdate1'];
$contractDateBegin = '2018-12-20';
$contractDateEnd ='2020-03-25';

if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd))
{
 $s2="select * from roomtype where room_seson ='high season' ";
$s3=mysqli_query($con,$s2);
}
else
{
$s2="select * from roomtype where room_seson='low season' ";
$s3=mysqli_query($con,$s2);
}


?>
<?php while($catdata=mysqli_fetch_array($s3,MYSQLI_ASSOC)) { ?>  <option value="<?php echo $catdata['room_price']; ?>"><?php echo $catdata['room_type']; ?></option>
           <?php } ?>
		   <?php } ?>
           </select></td>
          </tr>
		  <tr>
            <td>Price per Room</td>
            <td>
             Rs.<span id="a1"  ></span>
           </td>
          </tr>
		   <tr>
            <td>No. of Guest per Room</td>
            <td>
              <input name="guest" type="text " size="10"/></td>
          </tr>
		  <tr>
            <td>No. of Rooms </td>
            <td>
              <input name="room_nos" id="room_nos" type="text " size="10" onChange="gettotal1()" /></td>
          </tr>
		  <tr>
            <td>Total Amount To Pay</td>
            <td>
             <input type="text" name="roomprice" id="total1"  size="10px" readonly="" />
           </td>
          </tr>
		  
          <tr>
            <td colspan="2" align="center">
			<input type="submit" name="sub" value="Pay & Book" id="submit" /><br></td>
            </tr>
			
       </table>
		</form>
		
		<script language="javascript" type="text/javascript">
function notEmpty(){

var e = document.getElementById("field_1");
var strUser = e.options[e.selectedIndex].value;
 var strUser=document.getElementById('a1').innerHTML=strUser;




}
notEmpty()
    
    document.getElementById("field_1").onchange = notEmpty;


   function gettotal1(){
      var gender1=document.getElementById('a1').innerHTML;
      var gender2=document.getElementById('room_nos').value;
      var gender3=parseFloat(gender1)* parseFloat(gender2);
			
      document.getElementById('total1').value=gender3;
	
   }
			</script>
 
		
	</div>
</div>
</body>
</html>