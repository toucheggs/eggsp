<?php
/*
	Codigo desarrollado por Chevi ( http://chevismo.com )
	Twitter: @Chevi_
	BOT para seguir a tus seguidores. Articulo en http://blog.chevismo.com/2011/07/bots-de-twitter-parte-2/
	Si utilizas este codigo en tu web, por favor deja un link hacia el articulo.
*/
include('lib/twitter.php');
include_once('lib/simple_html_dom.php');
$response = array();
// -------------------------------------- //
// 				CONFIGURACION			  //
	// Rellena bien las siguientes variables:
	define('TWITTER_ID',910761589);  // Entra en http://chevismo.com/twitterid
	$twitter = new Twitter('sLS2ILE79vkUAQXmNGgiw', 'zfUD6h0YvFSXNv1t6uvRRbASw7DSno5wBgen7jcMr08');	// Disponible en dev.twitter.com Creando una App
	$twitter->setOAuthToken('910761589-F5iSZTA92TjlRUAOBPfFdo5ZVYaH3OSDSEeFfRHC');		// En My Access Token
	$twitter->setOAuthTokenSecret('8CmCoFffDr2LE7Di48LrJpAC6ABRMQU6LVFp6dM'); // En My Access Token
	// A continuacion escribe la palabra/s que el BOT buscara para responder:
	$palabra = 'to:eggspander1_9';
	
	// El User Agent no es demasiado importante, pon lo que quieras
	$userAgent = 'Mi Aplicacion de Twitter';
	// Que quieres que tu bot diga a los usuarios?
	// El BOT dira una de las siguientes frases al azar cada vez
	

// --------------------------------------- //
// --------------------------------------- //

try {
	$file = "http://feed43.com/6867350715405626.xml";   // normalmente el xml en wordpress esta en tu dominio.com/feed/
   $data = simplexml_load_file($file);
	foreach ($data->channel->item as $item) {
	$link[] = $item->link;
	$titulo[] = $item->title;
	}
	srand ((double) microtime() * 1000000);
   $random_number1 = rand(0,count($titulo)-1);
    
	$htmlCode = file_get_html('http://trends24.in/spain/');

    foreach ($htmlCode->find('div[class=trend-card] li a') as $elements) {
        $hashtag[] = $elements->plaintext;
        
       
    } 	
   srand ((double) microtime() * 1000000);
   $random_number2 = rand(0,10-1);
   $twitter->statusesUpdate($titulo[$random_number1].' '.$hashtag[$random_number2].' '.$link[$random_number1]);
	
		
		
	}catch(Exception $e){
		echo '{NO ENVIADO: '.$e.'}';
   }  