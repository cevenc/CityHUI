<?php
include 'authorize.php';

header('Content-type:text/json');
$longitude=$_POST['longitude'];
$latitude=$_POST['latitude'];
$n=$_POST['n'];
$i = $_POST['i'];//差值可自定义，值越大，范围就越大



$result = mysql_query("SELECT state.user_id as stateuserid,state.state_id as statestateid,user_name,user_sex,user_head,photo_state,state_con,longitude,latitude,state_time,photo_name FROM state left join photo on photo.photo_id = state.photo_id left join user on state.user_id=user.user_id 
	WHERE latitude > '$latitude'-'$i' and
latitude < '$latitude'+'$i' and
longitude > '$longitude'-'$i' and
longitude < '$longitude'+'$i'
order by state_time desc ,ACOS(SIN(('$latitude' * 3.1415) / 180 ) *SIN((latitude * 3.1415) / 180 ) +COS(('$latitude' * 3.1415) / 180 ) * COS((latitude * 3.1415) / 180 ) *COS(('$longitude'* 3.1415) / 180 - (longitude * 3.1415) / 180 ) ) * 6380 asc limit $n");
while($row = mysql_fetch_array($result))
{

$userid=$row['stateuserid'];
$stateid=$row['statestateid'];
$username=$row['user_name'];
$usersex=$row['user_sex'];
$userhead="userhead"."/".$row['user_head'];
$statecon=$row['state_con'];
$longitude=$row['longitude'];
$latitude=$row['latitude'];
$statetime=$row['state_time'];
$photostate=$row['photo_state'];
$photo="photo/".$row['photo_name'];
$sql="SELECT COUNT(*) AS count FROM statecomment WHERE state_id='$stateid'"; 
$res=mysql_fetch_array(mysql_query($sql)); 
$commentcount=$res['count']; 
$arrs[]=array('stateid'=>$stateid,'username'=>$username,'userhead'=>$userhead,'userid'=>$userid,'usersex'=>$usersex,'longitude'=>$longitude,'latitude'=>$latitude,'statetime'=>$statetime,
	'photostate'=>$photostate,'photo'=>$photo,'statecon'=>$statecon,'commentcount'=>$commentcount);
}
$arr=array('state'=>$arrs);
echo json_encode($arr);



mysql_close($con);
?>