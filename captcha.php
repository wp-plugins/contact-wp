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

switch ($i = rand(0, 5)) {
case 0:
$captcha = imagecreatefrompng("./captcha.png");
break;
case 1:
$captcha = imagecreatefrompng("./captcha2.png");
break;
case 2:
$captcha = imagecreatefrompng("./captcha3.png");
break;
case 3:
$captcha = imagecreatefrompng("./captcha4.png");
break;
case 4:
$captcha = imagecreatefrompng("./captcha5.png");
break;
case 5:
$captcha = imagecreatefrompng("./captcha6.png");
break;
}

/*
Lets set the colours, the colour $line is used to generate lines.
 Using a blue misty colours. The colour codes are in RGB
*/

$black = imagecolorallocate($captcha, rand(230,255), rand(230,255), rand(230,255));
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
