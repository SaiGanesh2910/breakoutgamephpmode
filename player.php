<?php
$name=$_REQUEST['pname'];
$score=$_REQUEST['']
$con=mysqli_connect('localhost','root','','players');
$sql="insert into ranks(PlayerName,Score,Time, Rank) values('$name',0,0,0); ";
if(mysqli_query($con,$sql))
echo "yes";
else
echo "No";
?>