<html>
<head>
	<title>FEEDBACK</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	#background{
		background-image: url(hotel.jpg);
		background-position: center;
		height: 600px;
		background-repeat: no-repeat;
		background-size: cover;

	}

	#feedback{
		background-color: black;
		background-position: center;
		border-bottom: solid 10px orange;
		box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.8);
		position:relative;
		top:100px;
		left: 510px;
		width: 480px;
		color: white;
		opacity: 0.9;
		align-content: center;
		align-items: center;
		text-align: center;
		padding-left: 20px;

	}
	#submit{
		background-color: grey; 
		color:white; 
		height: 30px; 
		width:100px; 
		position: absolute; 
		left: 320px
	}

	#submit:hover{
		background-color: orange;
		color: white;
	}


	#hf{
  border-width: 0px;
  margin: 0px;

}
#emailvalidation,#validationfeedback,#namevalidation{
	color: orange;
}

#submitform{
	color: orange;
}
.t{
		border-radius: 5px;
	}
.t:hover{
		box-shadow: 0px 0px 5px 5px rgba(255,255,255,0.8);
	}
a{
	text-decoration: none;
	color: black;
}
</style>
<script type="text/javascript">
	function submitFunciton()
	 { var error_name = document.getElementById("namevalidation"); 
	 error_name.innerHTML = ""; 
	 var error_email = document.getElementById("emailvalidation"); 
	 error_email.innerHTML = ""; 

	 var error_feedback= document.getElementById("validationfeedback");
	 error_feedback.innerHTML="";
	 var flag=true;
	 var a = "";

	  var email_regex =/^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
	 var name_regex = /^[A-Za-z]{0,30}$/;
	 if(a.localeCompare(document.getElementById("name").value)==0)
		{
			error_name.innerHTML += "   Name field is empty!"; 
			flag=false;
			return flag;
		}
	 if (!name_regex.test(document.getElementById("name").value)) 
	{ error_name.innerHTML += "   Name should be letters only and maximum of 30!"; 
		flag=false;
		return flag;
		}
	   
	   if (!email_regex.test(document.getElementById("email").value)) 
	   	{ error_email.innerHTML += "   Invalid email!";
	   		flag=false;
	   		return flag;
	   	 }

	   	 if(a.localeCompare(document.getElementById("userfeedback").value) ==0)
	   	 {
	   	 	error_feedback.innerHTML += "Feedback field is empty!";
	   	 	flag=false;
	   	 	return flag;
	   	 }
	   	
	  } 
</script>
</head>
<?php 
				include('include/db_con.php');
			
				if(isset($_POST['submit']))
				{
				$n=$_POST['name'];
				$e=$_POST['email'];
				$f=$_POST['feedback'];
				$s="INSERT INTO feedback (name, email, feedback)VALUES('$_POST[name]','$_POST[email]','$_POST[feedback]')";
				mysqli_query($con,$s) or die (mysqli_error($con));
				header("location:feedbacksuccess.php");

				mysqli_close($con);
				}
?>

<body bgcolor="black">
	<h1 align="center" style=" background-color: orange; font-family: Agency FB; height: 40px; vertical-align: middle;">Feedback</h1>
	<div id="background" width="100%">
	<div id="feedback">
		<br>
		<br>
		<form  action="feedback.php" method="POST" onSubmit="return submitFunciton();">
			<table id="feedbacktable" border="0" align="center" width="100%" style="margin:0px;">
				
				<tr>
					<td style="color:white">Name:</td><td><input type="text" name="name" id="name" placeholder="Enter your name" size="45" style="font-family: Calibri Light"></td>
					
				</tr>
				<tr>
					<td></td><td><div id="namevalidation"></div></td>
				</tr>

				<tr>
					<td style="color:white">E-mail Id: </td> <td><input type="text" name="email" id="email" placeholder="Enter your email Id" size="45" style="font-family: Calibri Light"></td>
					
				</tr>
				<tr>
					<td></td><td><div id="emailvalidation"></div></td>
				</tr>

				<tr>
					<td style="color:white; vertical-align: top; font-family: Calibri Light;">Feedback: </td>
					<td><textarea rows="10" cols="40" name="feedback" id="userfeedback"> </textarea><br></td>
				</tr>
				<tr>
					<td></td><td><div id="validationfeedback"></div></td>
				</tr>

				<tr>
					<td></td> <td ><button type="submit" name="submit" value="submit" id="submit" onclick="submitFunciton()">Submit</button><br><br></td>
				</tr>

				<tr>
					<td><div id="submitfeedbackform"></div></td>
				</tr>

			</table>
	</form>
</div>
</div>
<br>
<br>
<div class="t" width="100%" align="center" style="background-color: orange;" ><a href="index.php"><font size="6" face="Agency FB"><b>GO TO LOGIN</b></font></a></div>
</body>
</html>