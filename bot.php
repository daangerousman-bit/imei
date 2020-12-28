<?php
set_time_limit(0);
error_reporting(0);
function generateRandomString($length = 10) {
$characters = '0123456789';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];
}
return $randomString;
}
function getStr($string,$start,$end){
$str = explode($start,$string);
$str = explode($end,$str[1]);
return $str[0];
}
echo "============================\n";
echo "       BOT VALID IMEI\n";
echo "Create by : Charles Giovanni\n";
echo "=============================\n";

echo 'JUMLAH : ';
$jumlah = trim(fgets(STDIN)); 
$i=1;
while($i <= $jumlah){
$ime = generateRandomString(6);
$imei = '866228052'.$ime.'';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://penuyul.online/imei.php?imei='.$imei);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Connection: keep-alive';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
echo $result;
$file = fopen('IMEI.txt', 'a+');
fwrite($file, "$result\n");
fclose($file);
$i++;
}
