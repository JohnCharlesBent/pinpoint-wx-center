# Pinpoint Weather Center for WPRI 12 Providence

## Module Structure
css - *style.css* -- css file for styles
inc - *foot.php* - footer file
	  *functions.php* - php functions for pulling wx data from xml file, loading al of the locations (this comes from the `$sticks` variable)
	  *get-location-data.php* - calls `get_location_wx_data()` function (found in *functions.php* file)
	  *head.php* - contains html head tag and opening body tag
	  *foot.php* - contains footer and loads javascript file
	  *wx-sticks.php* - contains variable `$sticks` which load wx stick sponsor data
img - contains all images. Images are named *[stick number].jpg*. 
js - contains the main.js file. This contains an ajax function `get_wx_stick_data_ajax()` that uses ajax to fire the *get-location-data.php* file.
index.php - contains main html code and calls php functions `load_wx_sticks()` and `load_wx_sticks_nav()` to load the sponsor data from the *wx-sticks.php* file


## How To Add a New WX Stick

Open the file wx-sticks.php. This is located in the inc folder. This file contains a variable, `$sticks`. The `$sticks` variable is an array containing each sponsor information for each wx_stick.

```php
$sticks = array(
		array(
			'id' => 1,
			'location' => 'Cumberland',
			'xml_file' => 'WPRI_Cumberland Kitchen & Bath.xml',
			'sponsor' => 'Cumberland Kitchen & Bath',
			'sponsor_url' => 'https://www.cumberlandkitchen.com',
			'address' => '1764 Mendon Road, Cumberland, RI',
		),
		array(
			'id' => 2,
			'location' => 'Smithfield',
			'xml_file' => 'WPRI_Ephraim Doumato Jewelers.xml',
			'sponsor' => 'Ephraim Doumato Jewelers',
			'sponsor_url' => 'https://doumatojewelers.com',
			'address' => '425 Putnam Pike, Smithfield, RI',
		),
		array(
			'id' => 3,
			'location' => 'Newport',
			'xml_file' => 'WPRI_Newport.xml',
			'sponsor' => 'Viking Hotel',
			'sponsor_url' => 'https://www.hotelviking.com',
			'address' => '1 Bellevue Ave, Newport, RI',
		),
		array(
			'id' => 4,
			'location' => 'Tiverton',
			'xml_file' => 'WPRI_Phil\'s Propane.xml',
			'sponsor' => 'Phil’s Propane',
			'sponsor_url' => 'https://philspropane.com',
			'address' => '77 Crandall Road, Tiverton, RI',
		),
		array(
			'id' => 5,
			'location' => 'North Kingstown',
			'xml_file' => 'WPRI_Scalabrini Villa.xml',
			'sponsor' => 'Scalabrini Villa',
			'sponsor_url' => 'https://scalabrinivilla.com',
			'address' => '860 North Quidnessett Road, North Kingstown, RI',
		),
		array(
			'id' => 6,
			'location' => 'Narragansett',
			'xml_file' => 'WPRI_The Village Inn.xml',
			'sponsor' => 'Aqua Blue Hotel & Conference Center',
			'sponsor_url' => 'http://topofthebayrestaurant.com',
			'address' => '1 Beach Street Narragansett, RI',
		),
		array(
			'id' => 7,
			'location' => 'Warwick',
			'xml_file' => 'WPRI_Top of the Bay.xml',
			'sponsor' => 'Top of the Bay Restaurant',
			'sponsor_url' => 'http://topofthebayrestaurant.com',
			'address' => '898 Oakland Beach Ave, Warwick, RI',
		)
	);
```
Copy the last `array(...)` and add it to the end of the `$sticks` array. Make sure to add a `,` before the array you just pasted. Edit the text after the `=>` (these are the values, the text before the `=>` are the keys). The id needs to be a number, so don't put it in quotes. Make sure to add an image for the sponsor logo named [id number].jpg. 

## How To Edit A WX Stick
Find the array that contains the name of the xml file for the wx stick you want to edit. Edit the values.

