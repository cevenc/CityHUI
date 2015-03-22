<?php
include 'authorize.php';


$result = mysql_query("SELECT user_newmsg FROM user WHERE user_id='$userid'");
$row = mysql_fetch_array($result);
$state=$row['user_newmsg'];
if($state==1)
	{echo "new message";}
else{echo "no message";}



mysql_close($con);
?>