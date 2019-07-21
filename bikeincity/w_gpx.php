<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Leaflet - выводим GPX</title>

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
 


</head>

<body>
<div id="map"></div>

<script type='text/javascript'>

//Определяем карту, координаты центра и начальный масштаб
var map = L.map('map').setView([56.326944, 44.0075], 12);

//Добавляем на нашу карту слой OpenStreetMap
L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var track = new L.GPX("2.gpx", {async: true})
	    .on("loaded", function(e) { map.fitBounds(e.target.getBounds()); });
var track1 = new L.GPX("gpx/GpsiesTrack2.gpx", {async: true})
	    .on("loaded", function(e) { map.fitBounds(e.target.getBounds()); });
var track2 = new L.GPX("gpx/GpsiesTrack3.gpx", {async: true})
	    .on("loaded", function(e) { map.fitBounds(e.target.getBounds()); });
var track3 = new L.GPX("gpx/GpsiesTrack4.gpx", {async: true})
	    .on("loaded", function(e) { map.fitBounds(e.target.getBounds()); });
var track4 = new L.GPX("gpx/GpsiesTrack5.gpx", {async: true})
	    .on("loaded", function(e) { map.fitBounds(e.target.getBounds()); });
var track5 = new L.GPX("gpx/GpsiesTrack6.gpx", {async: true})
	    .on("loaded", function(e) { map.fitBounds(e.target.getBounds()); });
var track6 = new L.GPX("gpx/GpsiesTrack1.gpx", {async: true})
	    .on("loaded", function(e) { map.fitBounds(e.target.getBounds()); });

track.setStyle({
    color: 'red'
});
map.addLayer(track);
map.addLayer(track1);
map.addLayer(track2);
map.addLayer(track3);
map.addLayer(track4);
map.addLayer(track5);
map.addLayer(track6);

map.addControl(new L.Control.Layers({}, {'GPX':track}));

</script>

</body>
</html>