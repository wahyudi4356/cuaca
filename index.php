<?php
require 'vendor/autoload.php';
date_default_timezone_set('Asia/jakarta');

//$date = Carbon\Carbon::createFromDate(1945, 8, 17);
//printf("Kapan indonesia merdeka ? %s\n", $date->diffForHumans());

$api = new RestClient([
        'base_url' => "https://ibnux.github.io/BMKG-importer", // "https://api.twitter.com/1.1",
        'format' => "json",
        'curl_options'=> [
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false
     // https://dev.twitter.com/docs/auth/application-only-auth
    //'headers' => ['Authorization' => 'Bearer '.OAUTH_BEARER],
]]);
$result = $api->get("cuaca/501320", ['q' => "#php"]);
        // GET http://api.twitter.com/1.1/search/tweets.json?q=%23php
if($result->info->http_code == 200)
        // var_dump($result->decode_response());
$data = $result->decode_response();
//printf("Cuaca kota singkawang tanggal %s, adalah %s dengan suhu %s derajat celcius", $data[0]->jamCuaca, $data[0]->cuaca, $data[0]->tempC);

foreach((array) $data as $item) {
      printf("Cuaca kota singkawang tanggal %s, adalah %s dengan suhu %s derajat celcius. \n", $item->jamCuaca, $item->cuaca, $item->tempC );
}

