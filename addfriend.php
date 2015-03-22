<?php
include 'authorize.php';
$friendid=$_POST['friendid'];

mysql_query("INSERT INTO Relationship_11 (user_id,  use_user_id)
    VALUES ('$userid', '$friendid')");


echo "add friend success";
mysql_close($con);
?>