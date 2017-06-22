<?php

require 'lib/config.php';
require 'lib/tmhOAuth.php';
require 'lib/tmhUtilities.php';
include("lib/simple_html_dom.php");
require 'trends.php';

//

$tmhOAuth = new tmhOAuth(array(
   'consumer_key'    => 'sLS2ILE79vkUAQXmNGgiw',
    'consumer_secret' => 'zfUD6h0YvFSXNv1t6uvRRbASw7DSno5wBgen7jcMr08',
    'user_token'      => '910761589-F5iSZTA92TjlRUAOBPfFdo5ZVYaH3OSDSEeFfRHC',
    'user_secret'     => '8CmCoFffDr2LE7Di48LrJpAC6ABRMQU6LVFp6dM',	
    'curl_ssl_verifypeer'   => false
  ));

$destino="toucheggs";
	// A continuacion escribe la palabra/s que el BOT buscara para responder:
	
	// El User Agent no es demasiado importante, pon lo que quieras
	$userAgent = 'Mi Aplicacion de Twitter';
	// Que quieres que tu bot diga a los usuarios?
	// El BOT dira una de las siguientes frases al azar cada vez

// --------------------------------------- //
// --------------------------------------- //
   
$file2 = "trends.xml";	
$data2 = simplexml_load_file($file2);

foreach ($data2->title as $item2) { 

$hashtag[] = $item2;

}

$response = array();
$response [] = "http://feed43.com/1247023383173647.xml";
$response [] = "http://feed43.com/5021500086021778.xml";
$response [] = "http://feed43.com/7775824525103848.xml"; 
$response [] = "http://feed43.com/1123422510573105.xml"; 
$response [] = "http://feed43.com/8461110023273436.xml"; 
$response [] = "http://feed43.com/3012667468173203.xml"; 
$response [] = "http://feed43.com/5702407355488376.xml"; 
$response [] = "http://feed43.com/5673482104448030.xml"; 

srand ((double) microtime() * 1000000);
$data = simplexml_load_file($response[rand(0,count($response)-1)]);

$foto = array();
$titulo = array();


foreach ($data->channel->item as $item) {
$foto[] = $item->link;
$titulo[] = $item->title;

}

srand ((double) microtime() * 1000000);
$random_number = rand(0,7-1);





srand ((double) microtime() * 1000000);
$random_number2 = rand(0,10-1);

$code = $tmhOAuth->request('POST', 'https://api.twitter.com/1.1/statuses/update_with_media.json',
array(
    'media[]'  => file_get_contents($foto[$random_number]),
    'status'   => $titulo[$random_number].' '.$hashtag[$random_number2] // Don't give up..
  ),
    true, // use auth
    true  // multipart
  );


?>