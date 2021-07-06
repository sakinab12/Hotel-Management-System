<?php 
if(isset($_POST['submit']))
{
$to="12sakinabandookwala@gmail.com";
$subject= $_POST['subject']; 
$message= $_POST['message']; 
$from = $_POST['email'];
$headers = "From:" . $from;
$send=mail($to,$subject,$message,$headers);
if($send){
echo "congrats! The following Mail has been Sent<br><br>";
echo "<b>To:</b> $to<br>";
echo "<b>From:</b> $from<br>";
echo "<b>Subject:</b> $subject<br>";
echo "<b>Message:</b><br>";
echo $message;
}
else
   echo "<font color='white'>"."error in sending mail...."."</font>";
}
?>
<html>
<head>
	<title>CONTACT US</title>
	<meta charset="utf-8"/>
	<script type="text/javascript">
	function submitFunction()
	 { var error_email = document.getElementById("validationemail"); 
	 error_email.innerHTML = ""; 
	 var error_subject = document.getElementById("validationsubject"); 
	 error_subject.innerHTML = ""; 

	 var error_message= document.getElementById("validationmessage");
	 error_message.innerHTML="";
	 var flag=true;
	 var a = "";

	  var email_regex =/^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
	 var name_regex = /^[A-Za-z]{0,30}$/;
	 if(a.localeCompare(document.getElementById("email").value)==0)
		{
			error_email.innerHTML += "   Email field is empty!"; 
			flag=false;
			return flag;
		}
	   
	   if (!email_regex.test(document.getElementById("email").value)) 
	   	{ error_email.innerHTML += "   Invalid email!";
	   		flag=false;
	   		return flag;
	   	 }
	   	 if(a.localeCompare(document.getElementById("subject").value)==0)
		{
			error_email.innerHTML += "   Subject field is empty!"; 
			flag=false;
			return flag;
		}

	   	 if(a.localeCompare(document.getElementById("message").value) ==0)
	   	 {
	   	 	error_message.innerHTML += "message field is empty!";
	   	 	flag=false;
	   	 	return flag;
	   	 }
	   	return flag;
	  } 
</script>
<style>
	#background{
		background-image: url(hotel.jpg);
		background-position: center;
		height: 600px;
		background-repeat: no-repeat;
		background-size: cover;

	}

	#ContactUs{
		background-color: black;
		background-position: center;
		box-shadow: 0px 0px 10px 10px rgba(0,0,0,0.5);
		border-bottom: solid 10px orange;
		position:absolute;
		top:125px;
		left: 510px;
		width: 540px;
		height: 520px;
		color: white;
		opacity: 0.9;
		align-content: center;
		align-items: center;
		text-align: center;
		padding-left:20px;


	}

	.btn{
		background-color: grey; 
		color:black; 
		height: 40px; 
		width:100px; 
		position: absolute; 
		left: 320px
	}

	.btn:hover{
		background-color: orange;
		color:white;
	}

	
#validationemail,#validationsubject,#validationmessage{
	color:orange;
}
#submitcontactusform{
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


</head>

<body bgcolor="black">
	
	
	<h1 align="center" style=" background-color: orange; font-family: Agency FB;  color:black">Contact Us</h1>
	<br>
	<div id="background" width="100%">
	<div id="ContactUs">
		<form method="post" action="">
			<table id="table" border="0" align="center" width="100%" style="margin:0px;">
				
			<tr>
				<td colspan="2" style="color:orange"><br><b>IF YOU HAVE ANY QUESTIONS, DO NOT HESITATE TO ASK THEM!<b><br></td>
			</tr>
			<tr>
				<td colspan="2" style="color:white"><br>For any queries you can contact us on our whatsapp no. : +91 7845623467<br><br></td>
			</tr>
			<tr>
				<td colspan="2" style="color:white">You can also send your queries/questions through mail here:<br><br></td>
			</tr>
			<tr>
			<td style="color:white">E-mail Id: <br><br></td> <td><input type="text" name="email" id="email" placeholder="Enter your email Id" size="45" style="font-family: Calibri Light"><br><br></td>
			<br>
            
		</tr>
		<tr>
			<td><span id="validationemail"></span></td>
		</tr>
		<tr>
			<td style="color:white">Subject: <br><br></td> <td><input type="text" name="subject" id="subject" placeholder="Enter the subject" size="45" style="font-family: Calibri Light"><br><br></td>
		</tr>
		<tr>
			<td><span id="validationsubject"></span></td>
		</tr>
		<tr>
			<td style="color:white; vertical-align: top; font-family: Calibri Light;">Message: </td><td><textarea rows="10" cols="40" name="message" id="message">Feel free to message your questions and problems here! We will respond soon.... </textarea><br><</td>
		</tr>
		<tr>
			<td><span id="validationmessage"></span></td>
		</tr>
		
		<tr><td></td> <td ><button type="submit" name="submit" class="btn" onsubmit="submitFunction()">Send Message</button><br><br>
			<div id="submitcontactusform"></div></td>
		</tr>
			</table>
	</form>
</div>
</div>
<br>
<div class="t" width="100%" align="center" style="background-color: orange;" ><a href="index.php"><font size="6" face="Agency FB"><b>GO TO LOGIN</b></font></a></td>

</body>
</html>