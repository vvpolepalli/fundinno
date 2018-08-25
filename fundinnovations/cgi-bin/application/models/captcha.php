<?php

class Captcha extends CI_Model

{

	 function __construct()

    {

        parent::__construct();

    }/* Show Captcha Image */
	function show_image($width = 88, $height = 31, $string_new)
	{
			// Number of characters
		 $chars_number = 4;
		// Numbers (1), Letters (2), Letters & Numbers (3)
		$string_type = 3;
		// Font Size
		$font_size = 14;
		
		// Border Color (optional)
		$border_color = '239, 239, 239';
    	// Path to TrueType Font
    	$tt_font = UPLOAD_PATH.'application/language/verdana.ttf';
    	//echo $tt_font;
    	if(isSet($tt_font))
		{
			if(!file_exists($tt_font)) exit('The path to the true type font is incorrect.');

		}
		
			if($chars_number < 3) exit('The captcha code must have at least 3 characters');
			$string = $string_new;
			$im = @ImageCreate($width, $height) or die("Cannot Initialize new GD image stream");
			/* Set a White & Transparent Background Color */
			//echo $string;
			$bg = ImageColorAllocateAlpha($im, 255, 255, 255, 127); // (PHP 4 >= 4.3.2, PHP 5)

			ImageFill($im, 0, 0, $bg);

			/* Border Color */

			if($border_color)
			{
			list($red, $green, $blue) = explode(',', $border_color);
			$border = ImageColorAllocate($im, $red, $green, $blue);
			ImageRectangle($im, 0, 0, $width - 1, $height - 1, $border);
			}

			$textcolor = ImageColorAllocate($im, 191, 120, 120);
			$y = 24;
			for($i = 0; $i < $chars_number; $i++)
			{

			$char = $string[$i];
			$factor = 15;
			$x = ($factor * ($i + 1)) - 6;
			$angle = rand(1, 15);
			imagettftext($im, $font_size, $angle, $x, $y, $textcolor, $tt_font, $char);
			}
			//echo 'sdssd';
			//echo $string; 
			if(!isset($_SESSION['security_code']))
			{
				$_SESSION['security_code'] = md5($string);
			}
			else
			{
				unset($_SESSION['security_code']); 
				$_SESSION['security_code'] = md5($string);
			}

		/* Output the verification image */

			header("Content-type: image/png");
			ImagePNG($im);
			exit;
		}



		function generate_string()
		{
			// Number of characters
			 $chars_number = 4;
			// Numbers (1), Letters (2), Letters & Numbers (3)
			$string_type = 3;
			// Font Size
			$font_size = 14;
			// Border Color (optional)
			$border_color = '239, 239, 239';
			// Path to TrueType Font
			$tt_font = 'arial.ttf';

			if($string_type == 1) // letters
			{
			$array = range('A','Z');
			}
			else if($string_type == 2) // numbers
			{
			$array = range(1,9);
			}
			else // letters & numbers
			{
			$x = ceil($chars_number / 2);
			$array_one = array_rand(array_flip(range('A','Z')), $x);
			if($x <= 2) $x = $x - 1;
			$array_two = array_rand(array_flip(range(1,9)), $chars_number - $x);
			$array = array_merge($array_one, $array_two);
			}

			$rand_keys = array_rand($array, $chars_number);

			$string = '';

			foreach($rand_keys as $key)
			{
			$string .= $array[$key];
			}
			return $string;
		}

}

?>