<?php
date_default_timezone_set("Asia/Dhaka");
//Custom time set
$date = date_create('2001-01-01');
date_time_set($date, 12, 00);
$date = date_format($date, 'h:ia') . "\n";
// $c_hour = date("h:00a");
$c_hour = $date;
if($c_hour < strtotime("8:00") && $c_hour < strtotime("17:00")){
	$c_hour = "7:00";
}else{
	$c_hour = $date;
}
$start = $c_hour;
$end = "18:00";

$tStart = strtotime($start);
$tStart = strtotime('+60 minutes',$tStart);
$tEnd = strtotime($end);
$tNow = $tStart;

?>
<select name="" id="">
<?php
while($tNow <= $tEnd){
?>
<option value=""><?php echo date("ha",$tNow)."\n";$tNow = strtotime('+60 minutes',$tNow); ?> - <?php echo date("h:ia",$tNow)."\n";?></option>
<?php } ?>
</select>

<br><br><br><br><br><hr>

<?php
echo $date;
?>