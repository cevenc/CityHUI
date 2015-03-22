<?php
include 'authorize.php';

$longitude=$_POST['longitude'];
$latitude=$_POST['latitude'];
$statecommcon = $_POST['statecommcon'];
$stateid = $_POST['stateid'];

$statecommtime=date("Y-m-d H:i:s");


 
 try{
 
  mysql_query("INSERT INTO statecomment (user_id,  statecomm_con,state_id,statecomm_time,longitude,latitude)
    VALUES ('$userid', '$statecommcon','$stateid','$statecommtime', '$longitude','$latitude')");
  $result=mysql_query("SELECT user_id FROM state WHERE state_id='$stateid'");
  $row = mysql_fetch_array($result);
  $useridd=$row['user_id'];
   mysql_query("UPDATE user SET `user_newmsg`='1' WHERE user_id = '$useridd'");
  
}
 
   catch(Exception $e) {
   echo "comment fail";
  }
 
 	 echo "comment success";
  

mysql_close($con);
?>