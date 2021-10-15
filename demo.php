<?php
date_default_timezone_set("Asia/Dhaka");
//Custom time set
$date = date_create('2001-01-01');
date_time_set($date, 3, 00);
$date = date_format($date, 'h:i');
//Custom first hour set
$fhour = date_create('2001-01-01');
date_time_set($fhour, 7, 00);
$fhour = date_format($fhour, 'h:i');
//Second hour set
$shour = date_create('2001-01-01');
date_time_set($shour, 17, 00);
$shour = date_format($shour, 'h:i');

// $c_hour = date("h:00");
// $date = date("h:00");
$c_hour = $date;

if($c_hour <= $fhour && $c_hour >= $shour){
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
// echo $date;
?>