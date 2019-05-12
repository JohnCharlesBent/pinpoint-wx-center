<?php
$ftp_server = "ftp.lakana.com";

$pass = "Zi8bPspCRsvWKkdmNK4D";

$user = "nxs-wpritv-weathersticks";

$ftp_conn = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server"); 

$login = ftp_login($ftp_conn, $user, $pass);

$file = '/WPRI_Newport';

$file_suffix = '.tmp';

$xml_file = simplexml_load_file('ftp://'.$user.':'.$pass.'@'.$ftp_server.$file.$file_suffix);

var_dump(json_encode($xml_file));
?>