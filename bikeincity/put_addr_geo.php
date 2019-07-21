<?
header('Access-Control-Allow-Origin: *');
exec('/sys/srv/www/cli/geocode_yandex.py '.$_GET['addr']);
?>
