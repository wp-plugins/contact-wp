<?php
/*
Plugin Name: Contact WP
Plugin URI: http://plugins.sonicity.eu/contact-plugin/
Description: Displays a Contact Form, for your users to message you through.
Version: 1.0.5
Author: Sonicity Plugins
Author URI: http://plugins.sonicity.eu
*/

/*  Copyright 2010 Sonicity Plugins - support@sonicity.eu

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Hook for adding admin menus
add_action('admin_menu', 'contact_wp_add_pages');

// action function for above hook
function contact_wp_add_pages() {
    add_options_page('Contact WP', 'Contact WP', 'administrator', 'contact_wp', 'contact_wp_options_page');
}

// contact_wp_options_page() displays the page content for the Test Options submenu
function contact_wp_options_page() {

    // variables for the field and option names 
    $opt_name = 'mt_email_address';
    $opt_name_2 = 'mt_email_subject';
    $opt_name_3 = 'mt_email_captcha';
    $opt_name_4 = 'mt_email_phone';
    $opt_name_5 = 'mt_contact_plugin_support';
    $opt_name_6 = 'mt_email_thanks';
    $opt_name_7 = 'mt_email_akismet';
	$opt_name_8 = 'mt_email_location';
	$opt_name_9 = 'mt_email_recaptcha';
	$opt_name_10 = 'mt_email_widmessage';
	$opt_name_11 = 'mt_email_title';
    $hidden_field_name = 'mt_contact_submit_hidden';
    $data_field_name = 'mt_email_address';
    $data_field_name_2 = 'mt_email_subject';
    $data_field_name_3 = 'mt_email_captcha';
    $data_field_name_4 = 'mt_email_phone';
    $data_field_name_5 = 'mt_contact_plugin_support';
    $data_field_name_6 = 'mt_email_thanks';
    $data_field_name_7 = 'mt_email_akismet';
	$data_field_name_8 = 'mt_email_location';
	$data_field_name_9 = 'mt_email_recaptcha';
	$data_field_name_10 = 'mt_email_widmessage';
	$data_field_name_11 = 'mt_email_title';

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );
    $opt_val_2 = get_option($opt_name_2);
    $opt_val_3 = get_option($opt_name_3);
    $opt_val_4 = get_option($opt_name_4);
    $opt_val_5 = get_option($opt_name_5);
    $opt_val_6 = get_option($opt_name_6);
    $opt_val_7 = get_option($opt_name_7);
	$opt_val_8 = get_option($opt_name_8);
	$opt_val_9 = get_option($opt_name_9);
	$opt_val_10 = get_option($opt_name_10);
	$opt_val_11 = get_option($opt_name_11);

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val = $_POST[ $data_field_name ];
        $opt_val_2 = $_POST[$data_field_name_2];
        $opt_val_3 = $_POST[$data_field_name_3];
        $opt_val_4 = $_POST[$data_field_name_4];
        $opt_val_5 = $_POST[$data_field_name_5];
        $opt_val_6 = $_POST[$data_field_name_6];
        $opt_val_7 = $_POST[$data_field_name_7];
		$opt_val_8 = $_POST[$data_field_name_8];
		$opt_val_9 = $_POST[$data_field_name_9];
		$opt_val_10 = $_POST[$data_field_name_10];
		$opt_val_11 = $_POST[$data_field_name_11];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );
        update_option( $opt_name_2, $opt_val_2 );
        update_option( $opt_name_3, $opt_val_3 );
        update_option( $opt_name_4, $opt_val_4 );
        update_option( $opt_name_5, $opt_val_5 );
        update_option( $opt_name_6, $opt_val_6 );  
        update_option( $opt_name_7, $opt_val_7 ); 
		update_option( $opt_name_8, $opt_val_8 );
		update_option( $opt_name_9, $opt_val_9 );
		update_option( $opt_name_10, $opt_val_10 );
		update_option( $opt_name_11, $opt_val_11 );

        // Put an options updated message on the screen

?>
<div class="updated"><p><strong><?php _e('Options saved.', 'mt_trans_domain' ); ?></strong></p></div>
<?php

    }

    // Now display the options editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'Contact Plugin Options', 'mt_trans_domain' ) . "</h2>";

echo "<br />Use this plugin by entering [contact] onto a page or post, or by using the widget!<br />";

    // options form
    

    $change1 = get_option("mt_email_subject");
    $change2 = get_option("mt_email_captcha");
    $change3 = get_option("mt_contact_plugin_support");
    $change4 = get_option("mt_email_phone");
    $change5 = get_option("mt_email_akismet");
	$change6 = get_option("mt_email_location");
	$change7 = get_option("mt_email_recaptcha");

if ($change1=="Yes" || $change1=="") {
$change1="checked";
$change11="";
} else {
$change1="";
$change11="checked";
}

if ($change2=="None" || $change2=="") {
$change2="checked";
$change21="";
$change22="";
} if ($change2=="Captcha") {
$change2="";
$change21="checked";
$change22="";
} else {
$change2="";
$change21="";
$change22="checked";
}

if ($change3=="Yes" || $change3=="") {
$change3="checked";
$change31="";
} else {
$change3="";
$change31="checked";
}

if ($change4=="Yes" || $change4=="") {
$change4="checked";
$change41="";
} else {
$change4="";
$change41="checked";
}

if ($change5=="Yes" || $change5=="") {
$change5="checked";
$change51="";
} else {
$change5="";
$change51="checked";
}

if ($change6=="Yes" || $change6=="") {
$change6="checked";
$change61="";
} else {
$change6="";
$change61="checked";
}

if ($change7=="Yes") {
$change7="checked";
$change71="";
} else {
$change7="";
$change71="checked";
}
    ?>
<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p><?php _e("Widget Title:", 'mt_trans_domain' ); ?> 
<input type="text" name="<?php echo $data_field_name_11; ?>" value="<?php echo $opt_val_11; ?>" size="50">
</p><hr />

<p><?php _e("Your E-Mail:", 'mt_trans_domain' ); ?> 
<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="50">
</p><hr />

<p><?php _e("Message Text (Appears below Title):", 'mt_trans_domain' ); ?> 
<textarea name="<?php echo $data_field_name_10; ?>" rows="5" cols="40"><?php echo $opt_val_10; ?></textarea>
</p><hr />

<p><?php _e("Show Subject Field?", 'mt_trans_domain' ); ?> 
<input type="radio" name="<?php echo $data_field_name_2; ?>" value="Yes" <?php echo $change1; ?>>Yes
<input type="radio" name="<?php echo $data_field_name_2; ?>" value="No" <?php echo $change11; ?>>No
</p><hr />

<p><?php _e("Show Phone Number Field?", 'mt_trans_domain' ); ?> 
<input type="radio" name="<?php echo $data_field_name_4; ?>" value="Yes" <?php echo $change4; ?>>Yes
<input type="radio" name="<?php echo $data_field_name_4; ?>" value="No" <?php echo $change41; ?>>No
</p><hr />

<p><?php _e("Show Address Fields?", 'mt_trans_domain' ); ?> 
<input type="radio" name="<?php echo $data_field_name_8; ?>" value="Yes" <?php echo $change6; ?>>Yes
<input type="radio" name="<?php echo $data_field_name_8; ?>" value="No" <?php echo $change61; ?>>No
</p><hr />

<p><?php _e("CAPTCHA Method:", 'mt_trans_domain' ); ?> 
<input type="radio" name="<?php echo $data_field_name_3; ?>" value="None" <?php echo $change2; ?>>None
<input type="radio" name="<?php echo $data_field_name_3; ?>" value="Captcha" <?php echo $change21; ?>>Default CAPTCHA
<input type="radio" name="<?php echo $data_field_name_3; ?>" value="Recaptcha" <?php echo $change22; ?>>ReCAPTCHA
</p><hr />

<p><?php _e("Enable Akismet Spam Checking?", 'mt_trans_domain' ); ?> 
<input type="radio" name="<?php echo $data_field_name_7; ?>" value="Yes" <?php echo $change5; ?>>Yes
<input type="radio" name="<?php echo $data_field_name_7; ?>" value="No" <?php echo $change51; ?>>No
</p><hr />

<p><?php _e("Thank You Message:", 'mt_trans_domain' ); ?> 
<textarea rows="5" cols="40" name="<?php echo $data_field_name_6; ?>"><?php echo $opt_val_6; ?></textarea>
</p><hr />

<p><?php _e("Support the Plugin?", 'mt_trans_domain' ); ?> 
<input type="radio" name="<?php echo $data_field_name_5; ?>" value="Yes" <?php echo $change3; ?>>Yes
<input type="radio" name="<?php echo $data_field_name_5; ?>" value="No" <?php echo $change31; ?>>No
</p><hr />

<p class="submit">
<input type="submit" name="Submit" value="<?php _e('Update Options', 'mt_trans_domain' ) ?>" />
</p><hr />

</form>
</div>
<?php } ?>
<?php
if (strpos($_SERVER['REQUEST_URI'], 'wp-admin') == false) { ?>
<?php session_start();
} 

/**
 * The reCAPTCHA server URL's
 */
define("RECAPTCHA_API_SERVER", "http://api.recaptcha.net");
define("RECAPTCHA_API_SECURE_SERVER", "https://api-secure.recaptcha.net");
define("RECAPTCHA_VERIFY_SERVER", "api-verify.recaptcha.net");

/**
 * Encodes the given data into a query string format
 * @param $data - array of string elements to be encoded
 * @return string - encoded request
 */
function _recaptcha_qsencode ($data) {
        $req = "";
        foreach ( $data as $key => $value )
                $req .= $key . '=' . urlencode( stripslashes($value) ) . '&';

        // Cut the last '&'
        $req=substr($req,0,strlen($req)-1);
        return $req;
}



/**
 * Submits an HTTP POST to a reCAPTCHA server
 * @param string $host
 * @param string $path
 * @param array $data
 * @param int port
 * @return array response
 */
function _recaptcha_http_post($host, $path, $data, $port = 80) {

        $req = _recaptcha_qsencode ($data);

        $http_request  = "POST $path HTTP/1.0\r\n";
        $http_request .= "Host: $host\r\n";
        $http_request .= "Content-Type: application/x-www-form-urlencoded;\r\n";
        $http_request .= "Content-Length: " . strlen($req) . "\r\n";
        $http_request .= "User-Agent: reCAPTCHA/PHP\r\n";
        $http_request .= "\r\n";
        $http_request .= $req;

        $response = '';
        if( false == ( $fs = @fsockopen($host, $port, $errno, $errstr, 10) ) ) {
                die ('Could not open socket');
        }

        fwrite($fs, $http_request);

        while ( !feof($fs) )
                $response .= fgets($fs, 1160); // One TCP-IP packet
        fclose($fs);
        $response = explode("\r\n\r\n", $response, 2);

        return $response;
}



/**
 * Gets the challenge HTML (javascript and non-javascript version).
 * This is called from the browser, and the resulting reCAPTCHA HTML widget
 * is embedded within the HTML form it was called from.
 * @param string $pubkey A public key for reCAPTCHA
 * @param string $error The error given by reCAPTCHA (optional, default is null)
 * @param boolean $use_ssl Should the request be made over ssl? (optional, default is false)

 * @return string - The HTML to be embedded in the user's form.
 */
function recaptcha_get_html ($pubkey, $error = null, $use_ssl = false)
{
	if ($pubkey == null || $pubkey == '') {
		die ("To use reCAPTCHA you must get an API key from <a href='http://recaptcha.net/api/getkey'>http://recaptcha.net/api/getkey</a>");
	}
	
	if ($use_ssl) {
                $server = RECAPTCHA_API_SECURE_SERVER;
        } else {
                $server = RECAPTCHA_API_SERVER;
        }

        $errorpart = "";
        if ($error) {
           $errorpart = "&amp;error=" . $error;
        }
        return '<script type="text/javascript" src="'. $server . '/challenge?k=' . $pubkey . $errorpart . '"></script>

	<noscript>
  		<iframe src="'. $server . '/noscript?k=' . $pubkey . $errorpart . '" height="300" width="500" frameborder="0"></iframe><br/>
  		<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
  		<input type="hidden" name="recaptcha_response_field" value="manual_challenge"/>
	</noscript>';
}




/**
 * A ReCaptchaResponse is returned from recaptcha_check_answer()
 */
class ReCaptchaResponse {
        var $is_valid;
        var $error;
}


/**
  * Calls an HTTP POST function to verify if the user's guess was correct
  * @param string $privkey
  * @param string $remoteip
  * @param string $challenge
  * @param string $response
  * @param array $extra_params an array of extra variables to post to the server
  * @return ReCaptchaResponse
  */
function recaptcha_check_answer ($privkey, $remoteip, $challenge, $response, $extra_params = array())
{
	if ($privkey == null || $privkey == '') {
		die ("To use reCAPTCHA you must get an API key from <a href='http://recaptcha.net/api/getkey'>http://recaptcha.net/api/getkey</a>");
	}

	if ($remoteip == null || $remoteip == '') {
		die ("For security reasons, you must pass the remote ip to reCAPTCHA");
	}

	
	
        //discard spam submissions
        if ($challenge == null || strlen($challenge) == 0 || $response == null || strlen($response) == 0) {
                $recaptcha_response = new ReCaptchaResponse();
                $recaptcha_response->is_valid = false;
                $recaptcha_response->error = 'incorrect-captcha-sol';
                return $recaptcha_response;
        }

        $response = _recaptcha_http_post (RECAPTCHA_VERIFY_SERVER, "/verify",
                                          array (
                                                 'privatekey' => $privkey,
                                                 'remoteip' => $remoteip,
                                                 'challenge' => $challenge,
                                                 'response' => $response
                                                 ) + $extra_params
                                          );

        $answers = explode ("\n", $response [1]);
        $recaptcha_response = new ReCaptchaResponse();

        if (trim ($answers [0]) == 'true') {
                $recaptcha_response->is_valid = true;
        }
        else {
                $recaptcha_response->is_valid = false;
                $recaptcha_response->error = $answers [1];
        }
        return $recaptcha_response;

}

/**
 * gets a URL where the user can sign up for reCAPTCHA. If your application
 * has a configuration page where you enter a key, you should provide a link
 * using this function.
 * @param string $domain The domain where the page is hosted
 * @param string $appname The name of your application
 */
function recaptcha_get_signup_url ($domain = null, $appname = null) {
	return "http://recaptcha.net/api/getkey?" .  _recaptcha_qsencode (array ('domain' => $domain, 'app' => $appname));
}

function _recaptcha_aes_pad($val) {
	$block_size = 16;
	$numpad = $block_size - (strlen ($val) % $block_size);
	return str_pad($val, strlen ($val) + $numpad, chr($numpad));
}

/* Mailhide related code */

function _recaptcha_aes_encrypt($val,$ky) {
	if (! function_exists ("mcrypt_encrypt")) {
		die ("To use reCAPTCHA Mailhide, you need to have the mcrypt php module installed.");
	}
	$mode=MCRYPT_MODE_CBC;   
	$enc=MCRYPT_RIJNDAEL_128;
	$val=_recaptcha_aes_pad($val);
	return mcrypt_encrypt($enc, $ky, $val, $mode, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0");
}


function _recaptcha_mailhide_urlbase64 ($x) {
	return strtr(base64_encode ($x), '+/', '-_');
}

/* gets the reCAPTCHA Mailhide url for a given email, public key and private key */
function recaptcha_mailhide_url($pubkey, $privkey, $email) {
	if ($pubkey == '' || $pubkey == null || $privkey == "" || $privkey == null) {
		die ("To use reCAPTCHA Mailhide, you have to sign up for a public and private key, " .
		     "you can do so at <a href='http://mailhide.recaptcha.net/apikey'>http://mailhide.recaptcha.net/apikey</a>");
	}
	

	$ky = pack('H*', $privkey);
	$cryptmail = _recaptcha_aes_encrypt ($email, $ky);
	
	return "http://mailhide.recaptcha.net/d?k=" . $pubkey . "&c=" . _recaptcha_mailhide_urlbase64 ($cryptmail);
}

/**
 * gets the parts of the email to expose to the user.
 * eg, given johndoe@example,com return ["john", "example.com"].
 * the email is then displayed as john...@example.com
 */
function _recaptcha_mailhide_email_parts ($email) {
	$arr = preg_split("/@/", $email );

	if (strlen ($arr[0]) <= 4) {
		$arr[0] = substr ($arr[0], 0, 1);
	} else if (strlen ($arr[0]) <= 6) {
		$arr[0] = substr ($arr[0], 0, 3);
	} else {
		$arr[0] = substr ($arr[0], 0, 4);
	}
	return $arr;
}

/**
 * Gets html to display an email address given a public an private key.
 * to get a key, go to:
 *
 * http://mailhide.recaptcha.net/apikey
 */
function recaptcha_mailhide_html($pubkey, $privkey, $email) {
	$emailparts = _recaptcha_mailhide_email_parts ($email);
	$url = recaptcha_mailhide_url ($pubkey, $privkey, $email);
	
	return htmlentities($emailparts[0]) . "<a href='" . htmlentities ($url) .
		"' onclick=\"window.open('" . htmlentities ($url) . "', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;\" title=\"Reveal this e-mail address\">...</a>@" . htmlentities ($emailparts [1]);

}

function valid_email($email) {
  // First, we check that there's one @ symbol, and that the lengths are right
  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
    // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
     if (!ereg("^(([A-Za-z0-9!#$%&#038;'*+/=?^_`{|}~-][A-Za-z0-9!#$%&#038;'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
      return false;
    }
  }  
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
        return false;
      }
    }
  }
  return true;
}


function show_form() {
  $my_email = get_option("mt_email_address"); 
  $option_subject = get_option("mt_email_subject"); 
  $option_phone = get_option("mt_email_phone");
  $title = get_option("mt_email_title");

if ($title=="") {
$title="Contact Us";
}

echo "<strong>".$title."</strong><br /><br />";

if (get_option("mt_email_captcha")=="Captcha") {
  $option_captcha = "Yes";
} else {
$option_captcha="No";
}

  $plugin_support2 = get_option("mt_contact_plugin_support");
  $thank_you = get_option("mt_email_thanks");
  $hidden_variable = $_POST['hidden_variable'];
  $option_akismet = get_option("mt_email_akismet");
  $option_address = get_option("mt_email_location");

if (get_option("mt_email_captcha")=="Recaptcha") {
  $option_recaptcha = "Yes";
} else {
$option_recaptcha="No";
}

  $widmessage = get_option("mt_email_widmessage");
  
$publickey = "6Lf9ZgkAAAAAALgJB4GaIzWm19-_oXt1-DXjgLNx ";
$privatekey = "6Lf9ZgkAAAAAACbb_XF1oVlF2VKjWJih-BK6Wz7_ ";


if ($hidden_variable=="done") {
$sub_name=$_POST['myname'];
$sub_email=$_POST['email'];
$sub_phone=$_POST['phone'];
$sub_subject=$_POST['subject'];
$sub_message=$_POST['message'];
$captcha_entry=$_POST['captcha'];
$sub_address1=$_POST['address1'];
$sub_address2=$_POST['address2'];
$sub_address3=$_POST['address3'];
$sub_address4=$_POST['address4'];
$sub_address5=$_POST['address5'];
$sub_address6=$_POST['address6'];

if ($option_akismet=="Yes") {

$blog_url_akismet=get_bloginfo('url');

$GLOBALS["akismet_key"]		= "3cd548c8aaf9";
$GLOBALS["akismet_home"]	= $blog_url_akismet;
$GLOBALS["akismet_ua"]		= "jakeruston/1.0";
$GLOBALS["akismet_host"]	= "rest.akismet.com";
$GLOBALS["akismet_url"]		= "1.1";

function akismet_check ( $vars ) {
	if ( !( _akismet_login() ) ) { return false; }
	$vars["blog"]	= $GLOBALS["akismet_home"];
	$host				= $GLOBALS["akismet_key"] . "." . $GLOBALS["akismet_host"];
	$url				= "http://$host/" . $GLOBALS["akismet_url"] 
						. "/comment-check";
	$result			= _akismet_send( $vars, $host, $url );
	if ( $result == "false" ) { return false; }
	else                      { return true;  }
}

function _akismet_login ( ) {
	$args		= array( "key"  => $GLOBALS["akismet_key"],
							"blog" => $GLOBALS["akismet_home"] );
	$host		= $GLOBALS["akismet_host"];
	$url		= "http://$host/" . $GLOBALS["akismet_url"] . "/verify-key";
	$valid	= _akismet_send( $args, $host, $url );	
	if ( $valid == 'valid' ) { return true;  }
	else                     { return false; }
}

function _akismet_send ( $args = "", $host = "", $url = "" ) {

	// All of these are mandatory
	if ( !( is_array( $args ) ) ) { return false; }
	if ( $host == "" )            { return false; }
	if ( $url  == "" )            { return false; }
	
	// The request we wish to send
	$content	= "";
	foreach ( $args as $key => $val ) {
		$content	.= "$key=" . rawurlencode( stripslashes( $val ) ) . "&";
	}

	// The actual HTTP request
	$request	= "POST $url HTTP/1.0\r\n"
		. "Host: $host\r\n"
		. "Content-Type: application/x-www-form-urlencoded\r\n"
		. "User-Agent: " . $GLOBALS["akismet_ua"] . " | vanhegan.net-akismet.inc.php/1.0\r\n"
		. "Content-Length: " . strlen( $content ) . "\r\n\r\n"
		. "$content\r\n";
		
	$port			= 80;
	$response	= "";
	
	// Open a TCP file handle to the server, send our data
	if ( false !== ( $fh = fsockopen( $host, $port, $errno, $errstr, 3 ) ) ) {
		fwrite( $fh, $request );
		while ( !( feof( $fh ) ) ) { $response	.= fgets( $fh, 1160 ); }
		fclose( $fh );	
		// Split header and footer
		$response	= explode( "\r\n\r\n", $response, 2 );
	}
	return $response[ 1 ];
}


   $vars    = array();

	// Add the contents of the $_SERVER array, to help Akismet out
   foreach ( $_SERVER as $key => $val ) { $vars[ $key ] = $val; }

	// Mandatory fields of information
   $vars["user_ip"]           	= $_SERVER["REMOTE_ADDR"];
   $vars["user_agent"]        	= $_SERVER["HTTP_USER_AGENT"];
   $vars["comment_content"]   	= $sub_message;
   $vars["comment_author"]			= $sub_name;
   $vars["comment_author_email"]	= $sub_email;
   
if ( akismet_check( $vars ) ) {
echo "Your message was marked as spam. Unfortunately, your message has not been sent.";
exit;
}
}

$sub_name=strip_tags($sub_name);
$sub_email=strip_tags($sub_email);
$sub_phone=strip_tags($sub_phone);
$sub_subject=strip_tags($sub_subject);
$sub_message=strip_tags($sub_message);
$sub_address1=strip_tags($sub_address1);
$sub_address2=strip_tags($sub_address2);
$sub_address3=strip_tags($sub_address3);
$sub_address4=strip_tags($sub_address4);
$sub_address5=strip_tags($sub_address5);
$sub_address6=strip_tags($sub_address6);

if ($sub_name=="" || $sub_email=="" || $sub_message=="") {
echo "A required field was not filled in. Please <a href='".$_SERVER['php_self']."'>go back</a> and try again.";
exit;
}

if (valid_email($sub_email)!="1") {
echo "The e-mail address entered is not valid. Please <a href='".$_SERVER['php_self']."'>go back</a> and try again.";
exit;
}

if ($option_recaptcha=="Yes") {
$ans=recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
if ($ans->is_valid) {
} else {
echo "The CAPTCHA code was entered incorrectly. Please <a href='".$_SERVER['php_self']."'>go back</a> and try again.";
exit;
}
}

if ($option_captcha=="Yes") {
if(md5($captcha_entry) != $_SESSION['key']) {
echo "The CAPTCHA code was entered incorrectly. Please <a href='".$_SERVER['php_self']."'>go back</a> and try again.";
exit;
}
}

$headers = "From: $sub_email";

if (!$sub_subject=="") {
$sub_subject=" - ".$sub_subject;
}

$emailsubject="Contact Form".$sub_subject;
$emailmessage="Name: $sub_name\n\nE-Mail: $sub_email\n\n";

if ($option_phone=="Yes") {
$emailmessage .= "Phone: $sub_phone\n\n";
}

if ($option_address=="Yes") {
$emailmessage .= "Address: $sub_address1, $sub_address2, $sub_address4, $sub_address5, $sub_address6\n\n";
}

if ($option_subject=="Yes" || $option_subject=="") {
$emailmessage .= "Subject: $sub_subject\n\n";
}

$emailmessage .= "Message: $sub_message";
mail($my_email,$emailsubject,$emailmessage,$headers);
echo $thank_you;

} else {

echo $widmessage . "<br /><br />";

echo '<form action="'.$_SERVER['php_self'].'" method="post">';

echo '<p>Name*: <input type="text" name="myname" /></p>';

echo '<p>E-Mail*: <input type="text" name="email" /></p>';

if ($option_phone=="Yes") {
echo '<p>Phone: <input type="text" name="phone" /></p>';
}

if ($option_address=="Yes") {
echo '<p>Address Line 1: <input type="text" name="address1" /></p>';
}

if ($option_address=="Yes") {
echo '<p>Address Line 2: <input type="text" name="address2" /></p>';
}

if ($option_address=="Yes") {
echo '<p>City: <input type="text" name="address3" /></p>';
}

if ($option_address=="Yes") {
echo '<p>County/State/Region: <input type="text" name="address4" /></p>';
}

if ($option_address=="Yes") {
echo '<p>Postal/Zip Code: <input type="text" name="address5" /></p>';
}

if ($option_address=="Yes") {
echo '<p>Country: <select id="address6" name="address6">
<option value="Afghanistan">Afghanistan</option>
<option value="Åland Islands">Åland Islands</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antarctica">Antarctica</option>
<option value="Antigua and Barbuda">Antigua and Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Bouvet Island">Bouvet Island</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
<option value="Brunei Darussalam">Brunei Darussalam</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote Divoire">Cote Divoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Territories">French Southern Territories</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guernsey">Guernsey</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-bissau">Guinea-bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jersey">Jersey</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea, Republic of">Korea, Republic of</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Lao Peoples Democratic Republic">Lao Peoples Democratic Republic</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macao">Macao</option>
<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
<option value="Moldova, Republic of">Moldova, Republic of</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montenegro">Montenegro</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherlands">Netherlands</option>
<option value="Netherlands Antilles">Netherlands Antilles</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Northern Mariana Islands">Northern Mariana Islands</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Pitcairn">Pitcairn</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russian Federation">Russian Federation</option>
<option value="Rwanda">Rwanda</option>
<option value="Saint Helena">Saint Helena</option>
<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
<option value="Saint Lucia">Saint Lucia</option>
<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome and Principe">Sao Tome and Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syrian Arab Republic">Syrian Arab Republic</option>
<option value="Taiwan, Province of China">Taiwan, Province of China</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
<option value="Thailand">Thailand</option>
<option value="Timor-leste">Timor-leste</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States">United States</option>
<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Viet Nam">Viet Nam</option>
<option value="Virgin Islands, British">Virgin Islands, British</option>
<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
<option value="Wallis and Futuna">Wallis and Futuna</option>
<option value="Western Sahara">Western Sahara</option>
<option value="Yemen">Yemen</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select></p>';
}

if ($option_subject=="Yes" || $option_subject=="") {
echo '<p>Subject: <input type="text" name="subject" /></p>';
}

echo '<p>Message*: <textarea rows="5" cols="30" name="message"></textarea></p>';

if ($option_captcha=="Yes") { echo '<p>CAPTCHA*:<br /><img src="wp-content/plugins/contact-wp/captcha.php" /><input type="text" name="captcha" /></p>'; }

if ($option_recaptcha=="Yes") { echo '<p>CAPTCHA*: <center>' . recaptcha_get_html($publickey, $error) . '</center></p>'; }

echo '<input type="hidden" name="hidden_variable" value="done" /><input type="submit" value="Submit" /></form>';

echo '<p><strong>* = Required field</strong</p>';

if ($plugin_support2=="Yes" || $plugin_support2=="") {
echo "<p style='font-size:x-small'>Contact Plugin made by <a href='http://www.xeromi.net'>Web Hosting</a></p>";
}

}
}

function show_new_form() {
show_form();
}

function init_contact_widget() {
register_sidebar_widget('Contact Widget', 'show_form');
}

add_action("plugins_loaded", "init_contact_widget");

add_shortcode('contact', 'show_new_form');

?>
