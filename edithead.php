<?php
include 'authorize.php';


try{
if ((($_FILES["userhead"]["type"] == "image/gif")
|| ($_FILES["userhead"]["type"] == "image/jpeg")
|| ($_FILES["userhead"]["type"] == "image/png"))
&& ($_FILES["userhead"]["size"] < 500000))
  {
  if ($_FILES["userhead"]["error"] > 0)
    {
    $msg= "editheadfal" ;
     $arr=array('msg'=>$msg);
   echo json_encode($arr);
    }
  else
    {
    	$userheadname=$userid.md5($_FILES["userhead"]["name"].date("Y-m-d H:i:s"));
      move_uploaded_file($_FILES["userhead"]["tmp_name"],
      "userhead/" . $userheadname);
      mysql_query("UPDATE user SET `user_head`='$userheadname'
WHERE user_id = '$userid'");
      
   	echo "edit head success";
      
    }
  }
else
  {
 
   echo "edit head failed";
  }}
catch(Exception $e) {
  echo "edit head failed";
  }


mysql_close($con);
?>