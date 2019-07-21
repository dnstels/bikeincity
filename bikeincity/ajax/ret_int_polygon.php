<?
header('Access-Control-Allow-Origin: *');

$redis=new Redis();
$redis->connect('127.0.0.1');
$redis->select(0);

$points=array();
$points_keys=$redis->keys('pol_*');
natsort($points_keys);
foreach ($points_keys as $key => $value ) {
    $point=$redis->hGetAll($value);
    //foreach ($point as $k => $v){ $point[$k]=floatval($v);}
    array_push($points,array(floatval($point['lat']),floatval($point['lng'])));
}

print json_encode(array($points));
?>


