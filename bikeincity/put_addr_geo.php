<?
header('Access-Control-Allow-Origin: *');
echo $_GET['addr'];
exec('/sys/srv/www/cli/geocode_yandex.py '.$_GET['addr']);
?>
