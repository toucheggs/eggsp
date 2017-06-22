<?php

header('Content-type: text/html; charset=utf-8');

require 'xml.php';
require 'lib/config.php';
require 'lib/tmhOAuth.php';                                                                                
require 'lib/tmhUtilities.php';
require 'trends.php';

$tmhOAuth = new tmhOAuth(array(
   'consumer_key'    => 'sLS2ILE79vkUAQXmNGgiw',
    'consumer_secret' => 'zfUD6h0YvFSXNv1t6uvRRbASw7DSno5wBgen7jcMr08',
    'user_token'      => '910761589-F5iSZTA92TjlRUAOBPfFdo5ZVYaH3OSDSEeFfRHC',
    'user_secret'     => '8CmCoFffDr2LE7Di48LrJpAC6ABRMQU6LVFp6dM',	
    'curl_ssl_verifypeer'   => false
  ));

$file = "listado.xml";   // normalmente el xml en wordpress esta en tu dominio.com/feed/
	
$data = simplexml_load_file($file);

$archivos = count(glob('{*.jpg,*.gif,*.png,*.jpeg}',GLOB_BRACE));
srand ((double) microtime() * 1000000);
$random_number = rand(0,($archivos)-2);
$item = $data->file[$random_number];  




$file2 = "trends.xml";	
$data2 = simplexml_load_file($file2);

foreach ($data2->title as $item2) { 

$hashtag[] = $item2;

}
srand ((double) microtime() * 1000000);
$random_number2 = rand(0,10-1);


$code = $tmhOAuth->request('POST', 'https://api.twitter.com/1.1/statuses/update_with_media.json',
array(
    'media[]'  => file_get_contents($item),
    'status'   => $hashtag[$random_number2] // Don't give up..
  ),
    true, // use auth
    true  // multipart
  );
  
?>