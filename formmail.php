<?php

error_reporting(E_ALL ^ E_NOTICE);

/*
local instructions in: Tools/PHP FormMail
*/

$my_email = "abbey@mountainalohaconcierge.com";
// $my_email = "robert@robertmeans.com";
/* let visitor fill in the "from" field - leave string below empty */
$from_email = "";
/* below is tied into html at btm of this php. unnecessary extra step so commented out. */
// $continue = "";

$errors = array();

if(count($_COOKIE)){foreach(array_keys($_COOKIE) as $value){unset($_REQUEST[$value]);}}

if(isset($_REQUEST['email']) && !empty($_REQUEST['email']))
{

$_REQUEST['email'] = trim($_REQUEST['email']);

if(substr_count($_REQUEST['email'],"@") != 1 || stristr($_REQUEST['email']," ") || stristr($_REQUEST['email'],"\\") || stristr($_REQUEST['email'],":")){$errors[] = "Email address is invalid";}else{$exploded_email = explode("@",$_REQUEST['email']);if(empty($exploded_email[0]) || strlen($exploded_email[0]) > 64 || empty($exploded_email[1])){$errors[] = "Email address is invalid";}else{if(substr_count($exploded_email[1],".") == 0){$errors[] = "Email address is invalid";}else{$exploded_domain = explode(".",$exploded_email[1]);if(in_array("",$exploded_domain)){$errors[] = "Email address is invalid";}else{foreach($exploded_domain as $value){if(strlen($value) > 63 || !preg_match('/^[a-z0-9-]+$/i',$value)){$errors[] = "Email address is invalid"; break;}}}}}}

}

if(!(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) && stristr($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST']))){$errors[] = "There are many other scripts out there that are much easier to hijack. Please leave this one alone.";}

function recursive_array_check_blank($element_value)
{

global $set;

if(!is_array($element_value)){if(!empty($element_value)){$set = 1;}}
else
{

foreach($element_value as $value){if($set){break;} recursive_array_check_blank($value);}

}

}

recursive_array_check_blank($_REQUEST);

if(!$set){$errors[] = "<script>alert('\\n\\nYou cannot submit a blank form.');window.location.replace('index.php');</script>";}


unset($set);

if(count($errors)){foreach($errors as $value){print "$value<br>";} exit;}

if(!defined("PHP_EOL")){define("PHP_EOL", strtoupper(substr(PHP_OS,0,3) == "WIN") ? "\r\n" : "\n");}

function build_message($request_input){if(!isset($message_output)){$message_output ="";}if(!is_array($request_input)){$message_output = $request_input;}else{foreach($request_input as $key => $value){if(!empty($value)){if(!is_numeric($key)){$message_output .= str_replace("_"," ",ucfirst($key)).": ".build_message($value).PHP_EOL.PHP_EOL;}else{$message_output .= build_message($value).", ";}}}}return rtrim($message_output,", ");}

$message = build_message($_REQUEST);

$message = $message . PHP_EOL.PHP_EOL."".PHP_EOL."";

$message = stripslashes($message);

$subject = "Message from Mountain Aloha Concierge Website";

$subject = stripslashes($subject);

if($from_email)
{

$headers = "From: " . $from_email;
$headers .= PHP_EOL;
$headers .= "Reply-To: " . $_REQUEST['email'];

}
else
{

$from_name = "";

if(isset($_REQUEST['name']) && !empty($_REQUEST['name'])){$from_name = stripslashes($_REQUEST['name']);}

$headers = "From: {$from_name} <{$_REQUEST['email']}>"."\r\n";
/* gotta make sure the creeps are not e-mailing you - the Internet can be a big, dangerous place! */
$headers .= "BCC: robert@robertmeans.com\r\n";

}

mail($my_email,$subject,$message,$headers);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ABC Company, Inc.</title>
	<!-- <link rel="icon" type="image/ico" href="_images/favicon.ico"> -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="_css/under-construction-styles.css?<?php echo time(); ?>">	

</head>
<body onload="document.forms[0].name.focus();">
<div id="wrapper">
<header>
	<h1>Mountain Aloha Concierge</h1>
	<img src="_images/logo-01.png" alt="Under Construction">
</header>

<section id="success">
	<h2>Your message was sent successfully!</h2>
	<p><a href="http://www.mountainalohaconcierge.com">Back to homepage</a></p>
</section>

<footer>
	<div id="left">
		<p>Abbey Lynn Beach, Founder &amp; Visionarian</p>
	</div>
	<div id="center">
		<p><i class="fa fa-map-marker"></i> Serving Evergreen, Colorado<br>
		&amp; surrounding area</p>
	</div>
	<div id="right">
		<p><i class="fa fa-phone-square"></i> <a class="tel" tabIndex="-1" href="tel:(303) 555-1234">720.471.6483</a></p>
	</div>
	<div class="copyright"><p>&copy; 2015 Mountain Aloha Concierge | <a href="http://www.evergreenwebdesign.com" target="_blank">Evergreen Web Design</a></p></div>
</footer>
</div><!-- #wrapper -->

<script type="text/javascript" src="_scripts/scripts.js?<?php echo time(); ?>"></script>
<script src="http://localhost:35729/livereload.js"></script>	
</body>
</html>