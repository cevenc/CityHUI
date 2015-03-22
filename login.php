<?php
include 'connect_db.php';
header('Content-type:text/json');
$phone=$_POST['phone'];
$passowrd=$_POST['password'];

if ($phone && $passowrd){
 $sql = "SELECT * FROM user WHERE user_phone = '$phone' and user_password='$passowrd'";
 $res = mysql_query($sql);
 $rows=mysql_fetch_array($res);
  if($rows){

   $msg="loginsuc";
   $username=$rows['user_name'];
   $userid=$rows['user_id'];
   $useridentity=$rows['user_identity'];
   $userstate=$rows['user_state'];
   $arr=array('username'=>$username,'userid'=>$userid,'useridentity'=>$useridentity,'userstate'=>$userstate,'msg'=>$msg);
   echo json_encode($arr);
 }
 else{

 echo "login fail";}
}else {
  echo "login fail";}
}
mysql_close($con);
?>