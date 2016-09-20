<?php
echo date("Y-m-d H:i:s",strtotime("now"));

$preflist = array("赤","黒");

foreach ($preflist as $pref){
	print $pref."<br/>";
}
?>
