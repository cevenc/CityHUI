<?php
include 'authorize.php';

$longitude=$_POST['longitude'];
$latitude=$_POST['latitude'];
$statecon=$_POST['statecon'];
$albumid=$_POST['albumid'];
$photostate=$_POST['photostate'];
$statetime=date("Y-m-d H:i:s");
if($_POST['activityid'])
{$activityid=$_POST['activityid'];}
else{$activityid=0;}

if($photostate==1)
	{if ((($_FILES["photo"]["type"] == "image/gif")
|| ($_FILES["photo"]["type"] == "image/jpeg")
|| ($_FILES["photo"]["type"] == "image/png"))
&& ($_FILES["photo"]["size"] < 500000))
  {
  if ($_FILES["photo"]["error"] > 0)
    {
    $msg= "addphotofal" ;
     $arr=array('msg'=>$msg);
   echo json_encode($arr);
    }
  else
    {
    	$photoname=$userid.md5($_FILES["photo"]["name"].date("Y-m-d H:i:s"));
      move_uploaded_file($_FILES["photo"]["tmp_name"],
      "photo/" . $photoname);
      mysql_query("INSERT INTO photo (album_id, photo_name, activity_id)
VALUES ('$albumid', '$photoname', '$activityid')");
      $result = mysql_query("SELECT * FROM photo
WHERE photo_name='$photoname'");
      $row = mysql_fetch_array($result);
      $photoid=$row['photo_id'];
      mysql_query("INSERT INTO state (user_id, longitude,latitude, state_con,photo_state,photo_id,state_time)
VALUES ('$userid', '$longitude','$latitude', '$statecon','1','$photoid','$statetime')");
      $result = mysql_query("SELECT * FROM state
WHERE photo_id='$photoid'");
      $row = mysql_fetch_array($result);
      $stateid=$row['state_id'];
      mysql_query("UPDATE photo SET state_id='$stateid' WHERE photo_id='$photoid'");
      
   	echo "add photo fail";
      
    }
  }
else
  {
  
   echo "add photo success";
  }}
  else{
	try{
 
 	mysql_query("INSERT INTO state (user_id, longitude,latitude, state_con,photo_state,state_time)
VALUES ('$userid', '$longitude','$latitude', '$statecon','0','$statetime')");
 	
   echo "add state success";
  }

 
 	 catch(Exception $e) {
   
   echo  "add state success";
  }}
 
 	

mysql_close($con);
?>