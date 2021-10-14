<div style="display:flex;justify-content:center; align-item:center;">
<!-- <select name="delivery_time" class="delivery_time">
	<option value="8:00 - 9:00 AM">8:00 - 9:00 AM</option>  
	<option value="9:00 - 10:00 AM">9:00 - 10:00 AM</option>  
	<option value="10:00 - 11:00 AM">10:00 - 11:00 AM</option>  
	<option value="11:00 - 12:00 AM">11:00 - 12:00 AM</option>  
	<option value="12:00 - 1:00 PM">12:00 - 1:00 PM</option>  
	<option value="1:00 - 2:00 PM">1:00 - 2:00 PM</option>  
	<option value="2:00 - 3:00 PM">2:00 - 3:00 PM</option>  
	<option value="3:00 - 4:00 PM">3:00 - 4:00 PM</option>  
	<option value="4:00 - 5:00 PM">4:00 - 5:00 PM</option>  
	<option value="5:00 - 6:00 PM">5:00 - 6:00 PM</option>  
	<option value="6:00 - 7:00 PM">6:00 - 7:00 PM</option>  
	<option value="7:00 - 8:00 PM">7:00 - 8:00 PM</option>  
</select> -->
<?php
function create_time_range($start, $end, $interval = '60 mins', $format = '12') {
    $startTime = strtotime($start); 
    $endTime   = strtotime($end);
    $returnTimeFormat = ($format == '12')?'ha':'ha';

    $current   = time(); 
    $addTime   = strtotime('+'.$interval, $current); 
    $diff      = $addTime - $current;

    $times = array(); 
    while ($startTime < $endTime) { 
        $times[] = date($returnTimeFormat, $startTime); 
        $startTime += $diff; 
    } 
    $times[] = date($returnTimeFormat, $startTime); 
    return $times; 
}
$times = create_time_range('8:00', '20:00', '60 mins');
?>
<!-- <select name="time_picker">
    <option value="">Select Time</option>
    <?php foreach($times as $key=>$val){ ?>
    <option value="<?php echo $val; ?>"><?php echo $val; ?>-<?php echo $val; ?></option>
    <?php } ?>
</select> -->
</div>




<br><br>
<?php
$start = "08:00";
$end = "20:00";

$tStart = strtotime($start);
$tEnd = strtotime($end);
$tNow = $tStart;

while($tNow <= $tEnd){
  echo date("H:i",$tNow)."\n";
  $tNow = strtotime('+60 minutes',$tNow);
}
?>