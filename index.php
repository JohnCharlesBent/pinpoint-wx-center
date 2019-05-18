<?php
/** error reporting -- uncomment to see php errors 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
**/

include('inc/wx-sticks.php');
include('inc/functions.php');
include('inc/head.php');
?>
<div class="loading-modal hidden">
	<img src="img/generic_logo.png" alt="WPRI Pinpoint Weather Center logo for modal" />
	<span class="loading-txt">Loading Weather Data</span>
</div>
<div class="wrapper">
	<header class="pinpoint-wx__header">
		<img src="img/title.png" alt="WPRI Pinpoint Weather Center logo" />
	</header>
	<nav class="wx-nav__wrapper"><select class="wx-nav">
		<option selected disabled>-- Select a location --</option>
		<?php load_wx_sticks_nav($sticks); ?>
	</select></nav>

	<div class="wx-sticks__wrapper">
		<ul class="wx-sticks__options">
			<?php load_wx_sticks($sticks); ?>
		</ul>
		<div class="wx-sticks__details">
		</div>
	</div>
	<div class="wx-data__wrapper hidden">
		<span class="close-btn">Close <i class="fas fa-window-close"></i>
	</div>


<?php
include('inc/foot.php');
?>