<?php

//
// Update: 2008-06-23
//

$ethernet_default = 'eth0';

if( $_POST["hidop"] != '' ){
  $mode = $_POST["hidop"];
} else {
  echo 'no arg error<br>';
  exit;
}

if( $_POST["interface"] != '' ){
	$ethernet_name = $_POST["interface"];
} else {
  $ethernet_name = $ethernet_default;
}

if( $mode == 'dhcp' ){
  $run = 'netsh interface ip set address "' . $ethernet_name .'" dhcp';
  echo $run.'<br>';
  system($run);
  echo '<br>';
  $run = 'netsh interface ip set dns "' . $ethernet_name .'" dhcp';
  echo $run.'<br>';
  system($run);
  echo '<br>';
} elseif( $mode == 'staticip' ){
  $run = 'netsh interface ip set address "' . $ethernet_name . '" static ' . $_POST["ip"] . ' ' . $_POST["mask"] . ' ' . $_POST["gw"] . ' 1';
  echo $run.'<br>';
  system($run);
  echo '<br>';
  $run = 'netsh interface ip set dns "' . $ethernet_name . '" static '.$_POST["dns"].' primary';
  echo $run.'<br>';
  system($run);
} else {
  echo 'mode is not support by '.$mode.'<br>';
}

?>