<?php
include 'authorize.php';
$stateid=$_POST['stateid'];

$result = mysql_query("SELECT statecomment.user_id as userid,statecomment.state_id as stateid,statecomm_id,user_name,user_sex,user_head,statecomm_con,statecomment.longitude as longitude,statecomment.latitude as latitude,statecomm_time FROM statecomment left join state on state.state_id = statecomment.state_id left join user on statecomment.user_id=user.user_id where statecomment.state_id='$stateid' order by statecomm_time desc");
while($row = mysql_fetch_array($result))
{

$userid=$row['userid'];
$stateid=$row['stateid'];
$username=$row['user_name'];
$usersex=$row['user_sex'];
$userhead="userhead"."/".$row['user_head'];
$statecommid=$row['statecomm_id'];
$statecommcon=$row['statecomm_con'];
$longitude=$row['longitude'];
$latitude=$row['latitude'];
$statetime=$row['statecomm_time'];


$arrs[]=array('stateid'=>$stateid,'username'=>$username,'userhead'=>$userhead,'userid'=>$userid,'usersex'=>$usersex,'longitude'=>$longitude,'latitude'=>$latitude,'statecommtime'=>$statetime,
	'statecommcon'=>$statecommcon);
}
$arr=array('statecomment'=>$arrs);
echo json_encode($arr);



mysql_close($con);
?>