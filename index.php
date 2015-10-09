<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mountain Aloha Concierge</title>
	<!-- <link rel="icon" type="image/ico" href="_images/favicon.ico"> -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="_scripts/custom-modernizr.js?<?php echo time(); ?>"></script>
	<link rel="stylesheet" href="_css/under-construction-styles.css?<?php echo time(); ?>">	

</head>
<body onload="document.forms[0].name.focus();">
<div id="bg-div-one">
  <img src="_images/logo-01-opacity.png" alt="Under Construction">
</div>
<div id="wrapper">
<header>
	<h1>Mountain Aloha Concierge</h1>
	<img src="_images/logo-01.png" alt="Under Construction">
</header>
<section id="left-side">

<h2>Home &amp; Lifestyle Management Services</h2>
	<ul>
	<li>Errand Services</li>
	<li>Event Planning</li>
	<li>Property Management Services</li>
	</ul>

</section>
<section id="right-side">
	<p>While our Website is under construction please feel free to contact us for more information.</p>
    <form action="formmail.php" method="post" id="contactForm" onSubmit="return validateEmail(document.forms[0].email.value);">
        
    <ul>
        <li>
          <label class="text" for="name">Name</label>
          <input name="name" type="text" id="name" tabindex="10" />
        </li>
        <li>
          <label class="text" for="email">Email</label>
          <input name="email" type="email" id="email" tabindex="20" />
        </li>
        <li>
          <label class="text" for="comments">Comments</label>
          <textarea name="comments" id="comments" tabindex="30"></textarea>
        </li>
        <li>
            <input id="send" type="submit" value="Send" tabindex="40" /><input id="clear" type="button" value="Clear" onClick="rUSure()" tabindex="50" />
        </li>
        
    </ul> 
    
    </form>

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