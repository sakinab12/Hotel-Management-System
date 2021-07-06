<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>ADMIN LOGIN</title>
<style type="text/css">
	#contenair{
		height: 90%;
		width: 100%;
		background-image: url("hotel.jpg");
		
	}
	#r{

		background-color: black;
		background-position: center;
		border-bottom: solid 10px orange;
		box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.8);
		position:relative;
		top:210px;
		left: 510px;
		width: 480px;
		color: white;
		opacity: 0.9;
		align-content: center;
		align-items: center;
		text-align: center;
		padding-left: 20px;

	
	}
	#btn{
		background-color: grey;
	}
	#btn:hover{
		background-color: orange;
	}
	</style>
	

</head>
<body bgcolor="black">
	<h1 align="center" style=" background-color: orange; font-family: Agency FB; height: 40px; vertical-align: middle;">WELCOME TO OUR HOTEL</h1>
<div id="contenair">
	<div id="r" >
	<h1 align="center" style="color:white;">Admin Login</h1>
	<?php 
	include('../include/db_con.php');
	session_start();
		if (isset($_POST['username'],$_POST['password']))
			   {
                $username=$_POST['username'];
                $password=$_POST['password'];
  
                   if (empty($username) || empty($password))
                   {
                      $error = 'Hey All fields are required!!';
                    }
                     
					 else {  
					 $login="select * from admin where admin_name='".$username."' and admin_password ='".$password."'";
					 $result=mysqli_query($con,$login);
					 print_r($result);
				
					 
					if(mysqli_fetch_array($result,MYSQLI_ASSOC)){
				 $_SESSION['logged_in']='true';
				 $_SESSION['username']=$username;
					 header('Location:adminpanal.php');
					 exit();
					 } else {
					 $error='Incorrect details !!';
					 }
					       }
		}
  
  ?>
	<form action="index.php" method="POST">
	
        <table align="center">
		<tr> <?php  if (isset($error)) {?>
           <small style="color:orange;"><?php echo $error; ?>
            <br /> <br />
           <?php } ?> </tr>
          <tr style="color:white;">
            <td width="113" >Email:</td>
            <td width="215">
              <input name="username" type="text"  size="40" /></td>
          </tr>
          <tr><td><br></td><td><br></td></tr>
          <tr>
            <td style="color:white;">Password:</td>
            <td>
              <input name="password" type="password"  size="40" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><br><br>
			<input id="btn" type="submit" name="sub" value="Login" /></td>
            </tr>
			
       </table>
		</form>
		
		
	</div>
</div>
</body>
</html>