<?php
include 'authorize.php';

$username=$_POST['username'];
$usersex=$_POST['usersex'];
$userbirth=$_POST['userbirth'];
$userplace=$_POST['userplace'];
$userliving=$_POST['userliving'];

try{
mysql_query("UPDATE user SET `user_name`='$username', `user_sex`='$usersex', `user_birth`='$userbirth', `user_place`='$userplace', `user_living`='$userliving' ,`user_state`='1'
WHERE user_id = '$userid'");
echo "edit personal success"}
catch(Exception $e) {
   echo "edit personal fail";
  }

mysql_close($con);
?>