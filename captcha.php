<?php
//Start the session so we can store what the code actually is.
session_start();

//Now lets use md5 to generate a totally random string
$md5 = md5(microtime() * mktime());

/*
We dont need a 32 character long string so we trim it down to 5
*/
$string = substr($md5,0,5);

/*
Now for the GD stuff, for ease of use lets create
 the image from a background image.
*/

// Create a 100*30 image
$captcha = imagecreate(101, 30);

switch ($i = rand(0, 5)) {
case 0:
$bg = imagecolorallocate($captcha, 255, 255, 255);
break;
case 1:
$bg = imagecolorallocate($captcha, 230, 240, 250);
break;
case 2:
$bg = imagecolorallocate($captcha, 210, 255, 213);
break;
case 3:
$bg = imagecolorallocate($captcha, 150, 200, 170);
break;
case 4:
$bg = imagecolorallocate($captcha, 167, 213, 241);
break;
case 5:
$bg = imagecolorallocate($captcha, 180, 220, 200);
break;
}

/*
Lets set the colours, the colour $line is used to generate lines.
 Using a blue misty colours. The colour codes are in RGB
*/

$black = imagecolorallocate($captcha, rand(0, 80), rand(0, 80), rand(0, 80));
$line = imagecolorallocate($captcha,rand(225,233),rand(235,239),rand(235,239));

/*
Now to make it a little bit harder for any bots to break, 
assuming they can break it so far. Lets add some lines
in (static lines) to attempt to make the bots life a little harder
*/
imageline($captcha,rand(0,5),rand(0,5),rand(35,40),rand(25,30),$line);
imageline($captcha,rand(35,42),rand(0,5),rand(60,65),rand(25,30),$line);
imageline($captcha,rand(80,85),rand(40,50),rand(90,95),rand(60,70),$line);

/*
Now for the all important writing of the randomly generated string to the image.
*/
imagestring($captcha, 5, 20, 10, $string, $black);


/*
Encrypt and store the key inside of a session
*/

$_SESSION['key'] = md5($string);

/*
Output the image
*/
header("Content-type: image/png");
imagepng($captcha);
?> 
