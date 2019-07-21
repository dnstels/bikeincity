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
 <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>

<?php

function FillTPrGr(){  // Заполнение массива - пока что на наше усмотрение
global $TPrGr; // Массив, хранящий в себе данные по точкам притяжения граждан
/* Для примера пока взял только пять точек. На текущем этапе вся информация хранится
в массиве, но это сделано только для текущего удобства. Возможно, в дальшейшем
целесообразно перевести ее в БД, но это уже за рамками разрабатываемого прототипа.
Функцию же по такому поводу можно и сохранить, изменив лишь ее содержание */

$TPrGr = array(  // Географическая широта, географическая долгота, коэффициент притяжения k=ni/N
  array(51.53878192549949, 46.006962588980315, 0.2, 'СГУ'),
  array(51.53621926685662, 46.02343331368604, 0.3, 'Главпочтамт'),
  array(51.532779073981104, 46.02079836173732, 0.3, 'Крытый рынок'),
  array(51.546551528317586, 46.017658293669, 0.1, 'Сенной рынок'),
  array(51.52659825190124, 46.05593542703025, 0.1, 'Набережная Космонавтов')
);
}

/* *************************************************************** */

function GetMPTPrGr($a) {  // Наиболее привлекательные точки притяжения граждан
/* Здесь $a - это задаваемая пользователем величина, большим или равным которой
должен быть коэффициент притяжения граждан. Иными словами, это наиболее посещаемые
места, которые в первую очередь должны быть в транспортной доступности. Ну а поскольку
вариантов с разбросом значений данной величины может быть великое множество, на
текущем этапе лучше сделать так, чтобы она задавалась самим пользователем или программистом.
Результат работы функции - массив, содержащий координаты наиболее интересных мест города */
global $TPrGr, $MPTPrGr;
$j=0;
 for ($i=0; $i < count($TPrGr); $i++) {
  if ($TPrGr[$i][2] >= $a ) {
    $MPTPrGr[$j][0] = $TPrGr[$i][0];
    $MPTPrGr[$j][1] = $TPrGr[$i][1];
    $j++;
  }
 }
}

/* *************************************************************** */

function FillRoads(){  // Заполнение массива - пока что на наше усмотрение
global $Roads; // Массив, хранящий в себе данные по точкам скопления транспорта
/* Для примера пока взял только N точек. Сделал по аналогии с точками притяжения
граждан. В отличие от первоначального замысла, здесь нет надобности описывать все
без исключения точки "Центрального Многоугольника", а только те, что характеризуются
ненулевой загруженностью, как бы она ни вычислялась, и содержательно соответствуют
путям движения личного и общественного транспорта. Правда, если вкладывать в них
такой смысл, то необходимо, чтобы точки шли последовательно */

$Roads = array(
  array(51.53655503134922, 46.0228689840535, 5.0, 'Московская'),
  array(51.53597777001439, 46.023067467520605, 5.5, 'Чапаева'),
  array(51.53448953650605, 46.02218233854569, 6.0, 'Чапаева'),
  array(51.533162161707125, 46.0214098623494, 6.5, 'Чапаева'),
  array(51.531343461310065, 46.020336978743444, 6.0, 'Чапаева'),
  array(51.52952468825231, 46.01926945955552, 5.5, 'Чапаева')
);
}

/* *************************************************************** */

function MNK(){  // Определение точек маршрута, ближайших к точкам максимального скопления граждан
/* Для упрощения работы и ввиду того, что требуется найти лишь точку, ближайшую к заданной, исходя
только из ее координат, а не растояние как таковое, для оценки близости точек применяется некое
подобие метода наименьших квадратов: оценивается сумма квадратов разностей координат. Выпуклостью
поверхности Земли в данном случае пренебрегаем для упрощения вычислений.

В дальнейшем, отталкиваясь от значений массивов $CloserPoint и $MPTPrGr, можно будет прокладывать
веломаршруты (размерность обоих указанных массивов полностью совпадает) */

global $MPTPrGr, $Roads, $CloserPoint; // Последний массив - для хранения координат точек, ближайших к точкам из массива $MPTPrGr

for ($i=0; $i < count($MPTPrGr); $i++) {
  $min = 100500;
  for ($j=0; $j < count($Roads); $j++) {
    $aa = ($MPTPrGr[$i][0]-$Roads[$j][0])**2 + ($MPTPrGr[$i][1]-$Roads[$j][1])**2;
    if ($aa < $min) {
      $min = $aa;
      $CloserPoint[$i][0] = $Roads[$j][0];
      $CloserPoint[$i][1] = $Roads[$j][1];
    }
  }
}

}

/* *************************************************************** */

FillTPrGr();      // Заполняем массив по точкам притяжения граждан
GetMPTPrGr(0.25); // Находим места, у которых коэффициент притяжения больше или равен 0,25
FillRoads();      // Заполняем массив по маршрутам движения транспорта
MNK();            // Находим точки маршрутов, ближайшие к точкам притяжения

/* *************************************************************** */

?>

<CENTER>

<div id="mapid" style="width: 800px; height: 600px;"></div>
<script>

    var map = L.map('mapid').setView([51.54, 46.02], 13);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox.streets'
    }).addTo(map);
      map.on('click', function(e) {
        onMapClick(e);
  });

    function onMapClick(e) {
    console.log("--> "+e.latlng);
    }

</script>

<P>Общий перечень точек притяжения граждан</P>
<TABLE BORDER=1>
<!-- Заголовок таблицы -->
<TR>
<TH>X</TH>
<TH>Y</TH>
<TH>k</TH>
<TH>Comment</TH>
</TR>
<script>
<?php
#echo "map.addLayer(new L.marker([51.5177820731346,46.006962588980315],{draggable: 'true'}));";
# echo "console.log(123)";
 for ($i=0; $i < count($TPrGr); $i++) {
# $x= $TPrGr[$i][0];$x= $TPrGr[$i][1];
echo "\nmap.addLayer(new L.marker([".$TPrGr[$i][0].",".$TPrGr[$i][1]."], {draggable: 'true'}));";
#echo "console.log(".$i.")";
#+','+"+$TPrGr[$i][1]+");";
#echo "map.addLayer(new L.marker(["+$TPrGr[$i][0]+","+ $TPrGr[$i][1]+"],{draggable: 'true'}));";
};
?>

</script>
<!-- Тело таблицы -->
<?php for ($i=0; $i < count($TPrGr); $i++) { ?>
<TR>
<?php for ($j=0; $j < 4; $j++) { ?>
<TD><?php echo $TPrGr[$i][$j];
?>
</TD>
<?php } ?>
</TR>
<?php } ?>
</TABLE>


<P>Перечень точек притяжения граждан, у которых k>=0,25</P>
<TABLE BORDER=1>
<!-- Заголовок таблицы -->
<TR>
<TH>X</TH>
<TH>Y</TH>
</TR>
<!-- Тело таблицы -->
<?php for ($i=0; $i < count($MPTPrGr); $i++) { ?>
<TR>
<?php for ($j=0; $j < 2; $j++) { ?>
<TD><?php echo $MPTPrGr[$i][$j]; ?>
</TD>
<?php } ?>
</TR>
<?php } ?>
</TABLE>


<P>Совокупность точек, образующих маршруты движения транспорта</P>
<TABLE BORDER=1>
<!-- Заголовок таблицы -->
<TR>
<TH>X</TH>
<TH>Y</TH>
<TH>k</TH>
<TH>Comment</TH>
</TR>
<!-- Тело таблицы -->
<?php for ($i=0; $i < count($Roads); $i++) { ?>
<TR>
<?php for ($j=0; $j < 4; $j++) { ?>
<TD><?php echo $Roads[$i][$j]; ?>
</TD>
<?php } ?>
</TR>
<?php } ?>
</TABLE>


<P>Точки маршрутов транспорта, ближайшие к точкам притяжения граждан с k>=0,25 (по их числу)</P>
<TABLE BORDER=1>
<!-- Заголовок таблицы -->
<TR>
<TH>X</TH>
<TH>Y</TH>
</TR>
<!-- Тело таблицы -->
<?php for ($i=0; $i < count($CloserPoint); $i++) { ?>
<TR>
<?php for ($j=0; $j < 2; $j++) { ?>
<TD><?php echo $CloserPoint[$i][$j]; ?>
</TD>
<?php } ?>
</TR>
<?php } ?>
</TABLE>

</CENTER>

		<!--## -->
		<!-- FOOTER CODE -->
		<script type="text/javascript">$(document).ready(function(){$('[href*="brandjs"]').attr('style', 'display:none !important');$('a[href="'+window.location.href+'"]').addClass('w--current');});</script>
		<?php if(file_exists('footer_code_'.pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME).'.php'))
    { include_once 'footer_code_'.pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME).'.php'; } ?>
		<?php if(file_exists('footer_code.php')){ include_once 'footer_code.php'; } ?>
	</body>
</html>
