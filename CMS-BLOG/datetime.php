<?php 

date_default_timezone_set("Africa/Nairobi");

$settime = time();
$mytime = strftime("%B-%d-%Y %H:%M:%S", $settime);

echo $mytime ;

// $mytime2 = strftime("%Y-%m-%d %H:%M:%S", $settime);
// echo $mytime2;

?>