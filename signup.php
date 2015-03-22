<?php
include 'connect_db.php';
header('Content-type:text/json');
$phone=$_POST['phone'];
$passowrd=$_POST['password'];
$usertime=date("Y-m-d");


 $sql = "SELECT * FROM user WHERE user_phone = '$phone'";
 $res = mysql_query($sql);
 $rows=mysql_num_rows($res);
  if($rows){
   $msg="phonexits";
   $arr=array('msg'=>$msg);
   echo json_encode($arr);
 }
 else{
 	mysql_query("INSERT INTO user (user_phone, user_password,user_identity,user_time,user_state,user_newmsg) 
VALUES ('$phone', '$passowrd','1','$usertime','0','0')");
 
 echo "signup success";}
 
 	

mysql_close($con);
?>