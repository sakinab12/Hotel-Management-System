<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"assignment") or die(mysqli_error($con));
error_reporting(E_ALL ^ E_NOTICE);
?>