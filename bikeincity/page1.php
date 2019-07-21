<!DOCTYPE html>
<!-- Last Published: Sun Jul 21 2019 03:02:48 GMT+0000 (UTC) --><html data-wf-page="5d31ee121d4e283ff70286df" data-wf-site="5d31ee121d4e2814330286b8">
	<head>
		<meta charset="utf-8">
		<title>Page</title>
		<link rel="stylesheet" type="text/css" href="css/style.css?ver=1563678378">
		<meta content="Page" property="og:title">
		<meta content="width=device-width, initial-scale=1" name="viewport">
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
		<script type="text/javascript">WebFont.load({  google: {    families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Droid Sans:400,700"]  }});</script>
		<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif]-->
		<script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
               <script src="js/jquery.js"></script>

		<link href="images/5d33d2e6166bd88cfda92cc0_Fav.jpg" rel="shortcut icon" type="image/x-icon">
		<link href="images/5d33d2a2d1cb7fe33933ca2c_Fav20(2).jpg" rel="apple-touch-icon">
		<meta name="author" content="wtw">
		<!-- HEAD CODE -->
		<?php if(file_exists('head_code_'.pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME).'.php'))
    { include_once 'head_code_'.pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME).'.php'; } ?>
		<?php if(file_exists('head_code.php')){ include_once 'head_code.php'; } ?>
	</head>
	<body>
		<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="js/script.js?ver=1563678378" type="text/javascript"></script>
		<script src="./mail.js" type="text/javascript"></script>
		<script src="https://www.google.com/recaptcha/api.js"></script>
		<!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
		<!--## -->
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
		<div id="mapid1" style="width: 100%; height: 100%;position: absolute;"></div>
		<script>

		    var map = L.map('mapid1').setView([51.54, 46.02], 13);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox.streets'
    }).addTo(map);
       var polyOnMap = false;
  
 var polygon = L.polygon([[[51.51652364491768,46.00779943819297],
[51.5177820731346,46.006962588980315],
[51.525162147496985,45.99431871562973],
[51.54133300499193,45.98880884035057],
[51.56122812951401,46.00284279411395],
[51.55149187903211,46.01415278741376],
[51.54405344111486,46.04582431146163],
[51.54833470578002,46.05148913690107],
[51.54057461539978,46.07509257623212],
[51.52879812732258,46.062885427507275],
[51.51652364491768,46.00779943819297]]]
); 
   map.addLayer(polygon);
   polyOnMap = true;
</script>
		<!--## -->
		<!-- FOOTER CODE -->
		<script type="text/javascript">$(document).ready(function(){$('[href*="brandjs"]').attr('style', 'display:none !important');$('a[href="'+window.location.href+'"]').addClass('w--current');});</script>
		<?php if(file_exists('footer_code_'.pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME).'.php'))
    { include_once 'footer_code_'.pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME).'.php'; } ?>
		<?php if(file_exists('footer_code.php')){ include_once 'footer_code.php'; } ?>
	</body>
</html>
