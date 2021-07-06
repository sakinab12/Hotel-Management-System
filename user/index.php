<?php 
	include('include/db_con.php');
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
					 $login="SELECT * from users WHERE user_name='".$username."' and user_password ='".$password."'";
					 $result=mysqli_query($con,$login);
					 print_r($result);
				
					 
					if(mysqli_fetch_array($result,MYSQLI_ASSOC)){
				 $_SESSION['logged_in']='true';
				 $_SESSION['username']=$username;
					 header('Location:registration.php');
					 exit();
					 } else {
					 $error='Incorrect details !!';
					 }
					       }
		}
  
  ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>LOGIN</title>
<style type="text/css">
	@font-face{
		font-family: 'Anurati';
		src: url("fonts/Anurati-Regular.otf");
	}
	#background{
		background-image: url(hotel.jpg);
		background-size: cover;
		width: 100%;
		height: 100%
	}

	
	#login{
		margin-top: 5%;
		margin-bottom: 50px;
		margin-right: 300px;
		float: right;
		height:550px;
		width:420px;
		background-color: black;
		color: white;
		padding: 10px;
		border-bottom: solid 10px orange;
		box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.8);
		opacity: 0.9;
	}
	#signup
	{
		margin-top: 5%;
		margin-bottom: 50px;
		margin-left:300px;
		float: left;
		height:550px;
		width: 420px;
		background-color: black;
		color:white;
		padding:10px;
		border-bottom: solid 10px orange;
		box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.8);
		opacity: 0.9;
	}

	#heading{
		color:black; 
		font-family: Anurati;
		background-color: grey;
	}

	#btn{
		background-color: grey;
		color: black;
		height: 30px;
		width: 70px;

	}

	#btn:hover{
		background-color: orange;
		color:white;

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
	
<script>
     
        function signup()
      {

          var alt="";
          var x=document.forms["signupform"]["firstname"].value;
          if (x==null || x=="")
            {
              alt +="First name must be filled out\n";
              
            
            }
         var y=document.forms["signupform"]["lastname"].value;
         if (y==null || y=="")
            {
              
              alt += "Last name must be filled out\n";
              
            }
			var x=document.forms["signupform"]["daytimephone"].value;
          if (x==null || x=="")
            {
              alt +="First name must be filled out\n";
              
            
            }
          var z=document.forms["signupform"]["email"].value;
          var atpos=z.indexOf("@");
          var dotpos=z.lastIndexOf(".");
              
           if (atpos<1 || dotpos<atpos+2 || dotpos+2>=z.length)
              {
             alt += "Not a valid e-mail address\n";
             
              }
         
          var v=document.forms["signupform"]["password1"].value; 
         
          if (v==null || v=="")
            {
              alt += "password must be filled out\n";
                 
            }
         var t=document.forms["signupform"]["password2"].value; 
         if (t==null || t=="")
            {
              alt += "confirm password must be filled out\n";
                
            }
			 if (v != t)
            {
              alt += "password  doesn't  match\n";
                 
            }
          if((document.forms["signupform"]["usertype1"].checked==false)&& (document.forms["signupform"]["usertype2"].checked==false))
      
            {
               alt += "payment type  must be filled out\n";
                     
            }
   
        if (alt != "")
             {
               alert(alt);
              return false;
             }
			 
			 
			
}

     </script>
</head>
<body bgcolor="black">
 <h1 align="center" style="color:black; background-color:orange; font-family: Agency FB; height: 40px; vertical-align: middle;"><b>Welcome To Our Hotel </b></h1>

<?php 
include('include/db_con.php');
if(isset($_POST['Submit']))
{
$fn=$_POST['firstname'];
$ln=$_POST['lastname'];
$phone=$_POST['daytimephone'];
$email=$_POST['email'];
$pass=$_POST['password1'];
$city=$_POST['city'];
$country=$_POST['country'];
$intr=$_POST['usertype'];
$s1="INSERT INTO users (first_name,last_name,day_phone,user_name,user_password,city,country,payment_type)VALUES('".$fn."','".$ln."','".$phone."','".$email."','".$pass."','".$city."','".$country."','".$intr."')";
mysqli_query($con,$s1) or die (mysqli_error($con));
header("location:signupsuccess.php");
}
?>
<div id="background">

<div id="signup" align="left">
<h2 align="center">Create A New Account</h2>
<table style="color: white;">
 <form method="POST" name="signupform" action="index.php" onSubmit="return signup();" >
		 <tr>
		<td height="40">FirstName:</td>
		<td><input name="firstname" type="text" id="firstname" size="40" /></td>
	</tr>
	<tr>
		<td height="40">LastName:</td>
		<td><input name="lastname" type="text" id="lastname" size="40"  />
		
		</td>
	</tr>
	<tr>
		<td height="40">Phone:</td>
		<td><input name="daytimephone" type="text" id="daytimephone" size="40" class="phone" />
		</td>
	</tr>
	<tr>
		<td height="40">E-mail:</td>
		<td><input name="email" type="text" id="email" size="40"  />
		
		</td>
	</tr>
	
	<tr>
		<td height="40">Password:</td>
		<td><input name="password1" type="password" id="password1" size="40" />
		
		</td>
	</tr>
	<tr>
		<td height="40">Confirm Password:</td>
		<td><input name="password2" type="password" id="password2" size="40" />
		
		</td>
	</tr>
    <br>
	<tr>
		<td height="40">City/State</td>
		<td><input name="city" type="text" id="city" size="40"  />
		</td>
	</tr>
    <br>
	<tr>
		<td height="40">Country</td>
		<td><input name="country" type="text" id="country" size="40" />
		
		</td>
	</tr>
    <br>
	<tr>
		<td>Payment Type:</td>
		<td><input type="radio" name="usertype" id="usertype1" value="cash" />Cash
		<input type="radio" name="usertype" id="usertype2" value="paypal" />Paypal/CreditCard
		</td>
	</tr>
	<tr>
	<td align="center" colspan="2"><br><input type="submit" name="Submit" value="Submit" id="btn"/>           <input type="reset" name="reset" value="Reset" id="btn" /></td></tr>
    </form>
   </table>
</div>
	<div id="login" align="right">
	
	
	<form action="index.php" method="POST">
	<h2 align="center" id="h">Login Here<br><br><br></h2>
        <table align="center" id="t" style="color:white">
		<tr> <?php  if (isset($error)) {?>
           <small style="color:#aa0000;"><?php echo $error; ?>
            <br /> <br />
           <?php } ?> </tr>
          <tr>
            <td width="113">Email:<br><br></td>
            <td width="215">
              <input name="username" type="text"  size="40" /><br><br></td>
          </tr>
          <tr>
            <td>Password:</td>
            <td>
              <input name="password" type="password"  size="40" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><br>
			<input type="submit" name="sub" value="Login" id="btn" /></td>
            </tr>
			
       </table>
		</form>
		
		
	</div>
</div>
<div width="100%" bgcolor="black">
	<table width="100%" cellspacing="10" style="background-color:black;color: white;">
		<tr><td class="t" width="50%" bgcolor="orange" align="center">
			<a href="contactus.php"> <font size="6" face="Agency FB"><b>Contact Us</b></font> </a>
		</td><td class="t" width="50%" bgcolor="orange" align="center" ><a href="Feedback.php"><font size="6" face="Agency FB"><b>Feedback</b></font></a></td></tr>
	</div>
</body>
</html>