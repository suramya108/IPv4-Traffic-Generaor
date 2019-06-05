<?php
$us=$_POST['username'];
//echo $us;
$p=$_POST['password'];
$con=new mysqli("localhost","root","cciitk","db");
$res = mysqli_query($con,"select * from sg where username='$us' and pass ='$p'") or die("connection failure".mysqli_error($con));
if(mysqli_num_rows($res)==1)
{
header("location: login.html");
echo "good";
}
else
{
echo "try again";
}
