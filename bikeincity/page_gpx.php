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
 <!-- Добавляем файлы стилей CSS для библиотеки -->
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5/leaflet.css" />
 <!--[if lte IE 8]>
     <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5/leaflet.ie.css" />
 <![endif]-->

  <!-- Добавляем ссылку на JS-скрипт библиотеки -->
 <script src="http://cdn.leafletjs.com/leaflet-0.5/leaflet.js"></script>

 <script src="GPX.js"></script>

 <style>

#map {width: 100%; height: 100%;position: absolute; }

 </style>

<div id="map"></div>

<script type='text/javascript'>

//Определяем карту, координаты центра и начальный масштаб
var map = L.map('map').setView([51.54, 46.02], 13);

//Добавляем на нашу карту слой OpenStreetMap
L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


var track = new L.GPX("2.gpx", {async: true});
            //.on("loaded", function(e) { map.fitBounds(e.target.getBounds()); });
var track1 = new L.GPX("gpx/GpsiesTrack2.gpx", {async: true});
            //.on("loaded", function(e) { map.fitBounds(e.target.getBounds()); });
var track2 = new L.GPX("gpx/GpsiesTrack3.gpx", {async: true});
            //.on("loaded", function(e) { map.fitBounds(e.target.getBounds()); });
var track3 = new L.GPX("gpx/GpsiesTrack4.gpx", {async: true});
            //.on("loaded", function(e) { map.fitBounds(e.target.getBounds()); });
var track4 = new L.GPX("gpx/GpsiesTrack5.gpx", {async: true});
            //.on("loaded", function(e) { map.fitBounds(e.target.getBounds()); });
var track5 = new L.GPX("gpx/GpsiesTrack6.gpx", {async: true});
            //.on("loaded", function(e) { map.fitBounds(e.target.getBounds()); });
var track6 = new L.GPX("gpx/GpsiesTrack1.gpx", {async: true});
            //.on("loaded", function(e) { map.fitBounds(e.target.getBounds()); });
/*
track.setStyle({
    color: 'red'
});*/

map.addLayer(track);
map.addLayer(track1);
map.addLayer(track2);
map.addLayer(track3);
map.addLayer(track4);
map.addLayer(track5);
map.addLayer(track6);


map.addControl(new L.Control.Layers({}, {'track_01':track,'track_02':track1,'track_03':track2,'track_04':track3,'track_05':track4,'track_06':track5,'track_07':track6}));
</script>

		<!--## -->
		<!-- FOOTER CODE -->
		<script type="text/javascript">$(document).ready(function(){$('[href*="brandjs"]').attr('style', 'display:none !important');$('a[href="'+window.location.href+'"]').addClass('w--current');});</script>
		<?php if(file_exists('footer_code_'.pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME).'.php'))
    { include_once 'footer_code_'.pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME).'.php'; } ?>
		<?php if(file_exists('footer_code.php')){ include_once 'footer_code.php'; } ?>
	</body>
</html>
