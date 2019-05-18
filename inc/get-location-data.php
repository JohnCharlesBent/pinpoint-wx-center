<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/**
* get location data ...
**/
include('wx-sticks.php');
include('functions.php');

$wx_id = $_POST['wx_id'];

get_location_wx_data($wx_id, $sticks);

?>