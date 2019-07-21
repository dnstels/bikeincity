<?
$string=file_get_contents($argv[1]);
$arr=json_decode($string);



$redis=new Redis();
$redis->connect('127.0.0.1');
$redis->select(0);

$redis->delete('pol_');

foreach ($arr[0] as $k => $v)  {
 $redis->hSet("pol_".$k, 'lat', $v[0]);
 $redis->hSet("pol_".$k, 'lng', $v[1]);
   
}

?>
