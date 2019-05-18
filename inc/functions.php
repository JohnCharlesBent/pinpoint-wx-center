<?php
/** 
* load_wx_sticks() 
* Load sponsor data from $stick array -- found in file inc/wx-sticks.php 
* Add or remove wx sponsor xml and information in the wx-sticks.php file.
**/


function load_wx_sticks($sticks) {

	$s = '';
	foreach($sticks as $stick) {

		if(file_exists('img/'.$stick['id'].'.jpg')) {
			$logo = '<img src="img/'.$stick['id'].'.jpg" alt="'.$stick['sponsor'].' logo" />';
		} else {
			$logo = '<img src="img/generic_logo.png" alt="WPRI 12 logo" />';
		}

		$s .= '<li data-id="'.$stick['id'].'">'.
				'<div class="sponsor_logo">'.
					$logo.
				'</div>'.
				'<div class="sponsor_information">'.
						'<h2>Current weather conditions in '.$stick['location'].'</h2>'.
						'<h3> Sponsored by: <a href="'.$stick['sponsor_url'].'" target="_top">'.$stick['sponsor'].
					'</a></h3>'.
					'<div class="sponsor_address">'.
						$stick['address'].
					'</div>'.
					'<div class="wx-stick__btn">'.
						'<span class="btn" data-id="'.$stick['id'].'"> Click for live weather data <i class="fas fa-angle-right"></i></span>'.
					'</div>'.
				'</div>'.
			'</li>';

	}

	echo $s;
}

function load_wx_sticks_nav($sticks) {
	$options = '';
	foreach($sticks as $stick) {
		$options .= '<option value="'.$stick['id'].'">'.
						$stick['sponsor'].
					'</option>';
	}
	echo $options;
}

function get_location_wx_data($id, $sticks) {
	$id = (int)$id;
	$ftp_server = "ftp.lakana.com";
	$pass = "password";
	$user = "nxs-wpritv-weathersticks";
	$ftp_conn = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server"); 

	$login = ftp_login($ftp_conn, $user, $pass);
	$sponsor = array();
	foreach($sticks as $stick) {
		if($id === $stick['id']) {
			$file = $stick['xml_file'];
			$xml_file = simplexml_load_file('ftp://'.$user.':'.$pass.'@'.$ftp_server.'/'.$file);

			
			$xml_file = json_decode(json_encode($xml_file), 1);
			$xml_file = array_merge($xml_file, array('sponsor' => $stick['sponsor'], 'sponsor_id' => $stick['id'], 'sponsor_address' => $stick['address']));

			$data = json_encode($xml_file);
			
			echo $data;

		}
	}
}

?>