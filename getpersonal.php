<?php
include 'authorize.php';

if($_POST['userid'])
	{$userid=$_POST['userid'];}
$result = mysql_query("SELECT * FROM user where user_id='$userid'");
$row = mysql_fetch_array($result);
try{
$userid=$row['user_id'];
$username=$row['user_name'];
$usersex=$row['user_sex'];
$userbirth=$row['user_birth'];
$userplace=$row['user_place'];
$userliving=$row['user_living'];
$userhead="userhead/".$row['user_head'];
$usertime=$row['user_time'];
$useridentity=$row['user_identity'];
$userstate=$row['user_state'];
$msg="getpersonalsuc";
$arr=array('username'=>$username,'userhead'=>$userhead,'userid'=>$userid,'useridentity'=>$useridentity,'usersex'=>$usersex,'userbirth'=>$userbirth,
	'userplace'=>$userplace,'usertime'=>$usertime,'userstate'=>$userstate,'userliving'=>$userliving,'msg'=>$msg);
echo json_encode($arr);}
catch(Exception $e) {
   echo "get personal fail";
  }
mysql_close($con);
?>