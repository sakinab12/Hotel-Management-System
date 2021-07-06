<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ADMIN PANEL</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() 
		{  $("tr:even").css("background-color", "#fad7a0");
		 $("tr:odd").css("background-color", "#fdebd0");
		  $("td").css("padding", "0.1em 0.8em"); 
		  $("th").css("padding", "0.8em"); 
		$("#cr").click(function(){
			$("#tb1").slideDown("slow");
			$("#create").slideDown("slow");});
		$("#f").click(function(){
			$("#tb2").slideDown("slow");});

		$("#d").click(function(){
			$("#tb0").slideDown("slow");	
		
		});
		});
	</script>
<style>
	#tb1{
		display:none;
	}
	#tb0{
		display:none;
	}
	#tb2{
		display:none;
	}
	
	#create{
		border-radius: 3px;
		background-color:green;
		color: white;
		width: 10%;
		height: 40px;
		display:none;
	}
	#create:hover{
		background-color: grey;
		box-shadow: 0px 0px 2px 2px rgba(255,255,255,0.8);
	}
	a{
		text-decoration: none;
		color:black;
	}
	.link{
		text-decoration: none;
		color:white;
	}
	.link:hover{
		text-decoration: none;
		color:black;
	}
	#btn1{
		background-color: green;
	}
    #btn1:hover{
		box-shadow: 0px 0px 2px 2px rgba(255,255,255,0.8);
		background-color: lightgreen;
	}
	#btn2{
		background-color: red;	}

	#btn2:hover{
		box-shadow: 0px 0px 2px 2px rgba(255,255,255,0.8);
		background-color: #e57c78;
	}
	a{
		color: black;
		text-decoration: none;

	}
	.t{
		border-radius: 5px;
	}
	.t:hover{
		box-shadow: 0px 0px 5px 5px rgba(255,255,255,0.8);
	
	}

</style>

</head>

<body bgcolor="black">
 	  <h1 align="center" style=" background-color: orange; font-family: Agency FB; height: 40px; vertical-align: middle;">WELCOME ADMIN</h1>
	 <!-- <h1>welcome admin</h1>-->
	 
	   <?php
	  include('../include/db_con.php');
	  $sql2="select * from users ";
	  $row2=mysqli_query($con,$sql2) or die (mysqli_error($con));
	  ?>
	  <br>

	<!--<div style="background-image: url(hotel2.jpg); height:800px; background-repeat: no-repeat; background-size:cover; border-radius: 20px; box-shadow:0px 0px 20px 5px rgba(255,255,255,0.7);">-->
	  <!--<div id="cr" style="background-color: white; text-align: center; color: black; width: 60.02%; position: relative; left:301px; border-right: solid 5px black;"><font size="5"><b>Current Bookings</b></font></div>
	 <br><br><br>-->
	 <table id="d" border="0" align="center" width="60%" cellpadding="5" cellspacing="0"><tr><th style="background-color:lightgrey;">Registered Customer Details</th></tr></table>
<table id="tb0" border="0" align="center" width="60%" cellpadding="5" cellspacing="0">
	  	<tr style="color:black; background-color: darkgrey;"><th>User ID</th><th>First Name</th><th>Lastname</th> <th>Phone No.</th><th>Username</th><th>City</th><th>Country</th><th>Payment Type</th></tr>
	  <?php
	  
	  while($data2=mysqli_fetch_array($row2,MYSQLI_ASSOC))
	  {
	  ?>
	  <tr>
	  <td style="color:black; "><?php echo $data2['user_id']; ?></td>
	  <td style="color:black;"><?php echo $data2['first_name']; ?></td>
	  <td style="color:black; "><?php echo $data2['last_name']; ?></td>
	  <td style="color:black;  "><?php echo $data2['day_phone']; ?></td>
	  <td style="color:black; "><?php echo $data2['user_name']; ?></td>
	  <td style="color:black; "><?php echo $data2['city']; ?></td>
	  <td style="color:black;"><?php echo $data2['country']; ?></td>
	  <td style="color:black;"><?php echo $data2['payment_type']; ?></td>
	  </tr>
	 <?php
	 }
	?>
	 </table>
<?php
	  include('../include/db_con.php');
	  $sql="select * from roomdetail ";
	  $row=mysqli_query($con,$sql) or die (mysqli_error($con));
	  ?>
	  
<table id="cr" border="0" align="center" width="60%" cellpadding="5" cellspacing="0"><tr><th style="background-color:grey;">Current Bookings</th></tr></table>
<table id="tb1" border="0" align="center" width="60%" cellpadding="5" cellspacing="0">
	  	<tr style="color:black; background-color: darkgrey;"><th>Id</th><th>Username</th><th>Booking start date</th><th>Booking end date</th> <th>Cost per Room </th><th>No. of Rooms</th><th>Total Cost</th><th>Update</th><th>Delete</th></tr>
	  <?php
	  
	  while($data=mysqli_fetch_array($row,MYSQLI_ASSOC))
	  {
	  ?>
	  <tr>
	  <td style="color:black; "><?php echo $data['id']; ?></td>
	  <td style="color:black;"><?php echo $data['username']; ?></td>
	  <td style="color:black; "><?php echo $data['checkin_date']; ?></td>
	  <td style="color:black;  "><?php echo $data['checkout_date']; ?></td>
	  <td style="color:black; "><?php echo $data['room_type']; ?></td>
	  <td style="color:black; "><?php echo $data['no_of_room']; ?></td>
	  <td style="color:black;"><?php echo $data['amount']; ?></td>
	  <td  ><button id="btn1"><a href="update.php?id=<?php echo $data['id']; ?>" class="link">update</a></button></td>
	  <td ><button id="btn2"><a href="delete.php?id=<?php echo $data['id']; ?>" class="link">delete</a></button></td>
	  </tr>
	  <?php
	  }
	  ?>
	  </table>
	   <!--<div  align="center" ><button id="create"><a href="registrationadmin.php"><font size="2" face="Candara Light" style="color:white;"><b>Create New Booking</b></font></a></button></div>-->
	   <table id="ab" border="0" align="center" width="60%" cellpadding="5" cellspacing="0"><tr><th style="background-color:lightgrey;"><a href="registrationadmin.php">Add New Booking</a></th></tr></table>
	  
	  <?php
	  include('../include/db_con.php');
	  $sqlf="select * from feedback ";
	  $rowf=mysqli_query($con,$sqlf) or die (mysqli_error($con));
	 
	  ?>
	  <!--<div  style="background-color: white; text-align: center; color: black; width: 20%; position: relative; left:600px; border-radius: 5px;"><font size="5"><b>Feedback Details</b></font></div><br>-->
	  <table id="f" border="0" align="center" width="60%" cellpadding="5" cellspacing="0"><tr><th style="background-color: grey;">View Feedback</th></tr></table>

	  <table id="tb2" border="0" align="center" width="60%" cellpadding="5" cellspacing="0">
	  	<tr><th>Name</th><th>E-mail</th><th>Feedback</th></tr>
	  <?php
	  
	  while($dataf=mysqli_fetch_array($rowf,MYSQLI_ASSOC))
	  {
	  ?>
	  <tr>
	  <td><?php echo $dataf['name']; ?></td>
	  <td><?php echo $dataf['email']; ?></td>
	  <td><?php echo $dataf['feedback']; ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  </table>
	  
	  </div>
	<!--</div>-->
	<br><br><br>

	<div class="t"  style="background-color: orange; width: 400px; text-align: center; position: absolute;left: 570px;" ><a href="index.php"><font size="6" face="Agency FB"><b>SIGN OUT</b></font></a></div>
</body>
</html>
