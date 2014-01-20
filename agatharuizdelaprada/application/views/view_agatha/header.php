<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>App de Prueba</title>
		<!-- css -->
		<link rel="stylesheet" href="../includes/css/style.css" type="text/css" media="screen" />
		<!-- Javascript -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src="../includes/js/jquery.validate.js" ></script>
		<script type="text/javascript" src="../includes/js/main.js" ></script>
	</head>
	<body>
	<div id="fb-root"></div>
	<script type="text/javascript" src="https://connect.facebook.net/es_LA/all.js#appId=<?php echo APP_ID ?>&amp;xfbml=1"></script>
	<script type="text/javascript">
	window.fbAsyncInit = function() {
		FB.init({ appId: '<?php echo APP_ID ?>', status:true, cookie:true, xfbml:true, oauth:true });
		FB.Canvas.setSize({ width: 810, height: 810 });
	};
	(function() {
		var e = document.createElement('script'); e.async = true;
		e.src = document.location.protocol +
				'//connect.facebook.net/es_LA/all.js';
		document.getElementById('fb-root').appendChild(e);
	}());
	</script>
	<ul class="menu">
	  <li><a href="../includes/bases/bases.pdf" target="_blank" class="bases"></a></li>
	  <li><a href="#" class="premios"></a></li>
	</ul>	