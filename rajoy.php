<?php
/*
	Codigo desarrollado por Chevi ( http://chevismo.com )
	Twitter: @Chevi_
	BOT para seguir a tus seguidores. Articulo en http://blog.chevismo.com/2011/07/bots-de-twitter-parte-2/
	Si utilizas este codigo en tu web, por favor deja un link hacia el articulo.
*/
include('lib/twitter.php');
include('lib/simple_html_dom.php');
$response = array();
$archivo=fopen("C:\\robots\\CD_ROOT\\AutoPlay\\Docs\\servidor\\www\\Pandereta\\datos.txt","w+") or die("Problemas");
// -------------------------------------- //
// 				CONFIGURACION			  //
	// Rellena bien las siguientes variables:
	define('TWITTER_ID',910761589);  // Entra en http://chevismo.com/twitterid
	$twitter = new Twitter('sLS2ILE79vkUAQXmNGgiw', 'zfUD6h0YvFSXNv1t6uvRRbASw7DSno5wBgen7jcMr08');	// Disponible en dev.twitter.com Creando una App
	$twitter->setOAuthToken('910761589-F5iSZTA92TjlRUAOBPfFdo5ZVYaH3OSDSEeFfRHC');		// En My Access Token
	$twitter->setOAuthTokenSecret('8CmCoFffDr2LE7Di48LrJpAC6ABRMQU6LVFp6dM'); // En My Access Token
	// A continuacion escribe la palabra/s que el BOT buscara para responder:
	$palabra = 'pandereta%20pais';
	
	// El User Agent no es demasiado importante, pon lo que quieras
	$userAgent = 'Mi Aplicacion de Twitter';
	// Que quieres que tu bot diga a los usuarios?
	// El BOT dira una de las siguientes frases al azar cada vez
$response[] = ' Rajoy ese patoso, nos va a mandar todos al foso. ';
$response[] = ' Rajoy con la Merkel es muy baboso, joder que tio, es tan asqueroso... ';
$response[] = ' Este tio lo va a dejar todo fangoso, sí, es Rajoy, el casposo ';
$response[] = ' Lo de Rajoy no es contagioso, lo suyo solo es derechoso. ';
$response[] = ' Uyyyy que sospechoso, ¿quien hay ahí? es Rajoy, el insidioso. ';
$response[] = ' Ayyyy esto es muy escabroso, es Rajoy, el ponzoñoso. ';
$response[] = ' Rajoy que asqueroso, lo deja todo salivoso. ';
$response[] = ' Esto es muy penumbroso, Rajoy para los españoles, es pernicioso. ';
$response[] = ' Gritemos todos y sin compasión, ¡Vete ya! Rajoy dimisión. ';
$response[] = ' Menudo es Rajoy, menudo endoso, para el estado español, es un tenebroso. ';
$response[] = ' De presidente de entre todos los candidatos salió Rajoy, el pelagatos. ';
$response[] = ' Yo con este no remonto, es Rajoy, el barbitonto. ';
$response[] = ' Yo de este país ya no saco jugo, es por culpa de Rajoy, ¡será besugo! ';
$response[] = ' Rajoy tarugo a este paso no me llega ni pá un mendrugo. ';
$response[] = ' Como siga así me voy a quedar desnudo, Rajoy que tio tan cojonudo. ';
$response[] = ' Ante la Merkel no emite ni un estornudo, ese es Rajoy el muy calzonudo. ';
$response[] = ' Rajoy va por ahí de caballerote, en realidad es tonto, pero de capirote. ';
$response[] = ' Defiende a España, no seas pasmarote, ayyy Rajoy eres un perrote.  ';
$response[] = ' Cada día en el almuerzo, de tí me acuerdo, Rajoy, mastuerzo. ';
$response[] = ' Que sople fuerte el cierzo, que se lleve a Rajoy, el mastuerzo. ';
$response[] = ' A mi ya me tiene muy aburrido, es Rajoy, un malparido. ';
$response[] = ' Rajoy el zangarullón, como siga así, una revolución. ';
$response[] = ' Rajoy es muy vacilón, a ver si va a acabar en un atolón. ';
$response[] = ' Rajoy ¡So mugroso, piojoso, sarnoso, harto sopas, zumayo, pregonao, vaya un zamarro, nalgas tunas, pecho tordo! ';
$response[] = ' Rajoy ¡Chotacabras, cierrabares, golfo, cabeza buque, ansia rota, violón, casca, cabeza flor, muertohambre! ';
$response[] = ' Rajoy ¡Mercachifle, quitahipos, petrimetre, rastrapiés, tirillas, don nadie, tuercebotas, espantajo, botarate! ';
$response[] = ' Rajoy ¡Bellaco, zascandil, sietemachos, berzotas, sacamuelas, catacaldos, robaperas, gazmoño, rastracueros! ';
$response[] = ' "Los españoles son muy españoles y son mucho españoles." Mariano Rajoy ';
$response[] = ' "Esto no es como el agua que cae del cielo sin que se sepa muy bien porqué." Mariano Rajoy ';
$response[] = ' "Exportar es positivo porque vendes lo que produces." Mariano Rajoy ';
$response[] = ' "Un vaso es un vaso y un plato es un plato." Mariano Rajoy ';
$response[] = ' "La cerámica de Talavera no es cosa menor. Dicho de otra manera, es cosa mayor." Mariano Rajoy ';
$response[] = ' "Viva el vino." Mariano Rajoy ';
$response[] = ' "No podemos gastar más de lo que tenemos porque entonces lo tenemos que pedir prestado." Mariano Rajoy ';
$response[] = ' "It`s very difficult todo esto." Mariano Rajoy ';
$response[] = ' "Porque después del año 14 viene el año 15." Mariano Rajoy ';
$response[] = ' "¡Venga ya, toma democracia!." Mariano Rajoy ';
$response[] = ' "¿Y la europea?." Mariano Rajoy ';
$response[] = ' "ETA es una gran nación." Mariano Rajoy ';
$response[] = ' "Fin de la cita." Mariano Rajoy ';
 
// --------------------------------------- //
// --------------------------------------- //
   
	$htmlCode = file_get_html('http://trends24.in/spain/');

    foreach ($htmlCode->find('div[class=trend-box] li a[target=tw]') as $elements) {
        $hashtag[] = $elements->plaintext;
        
       
    } 

 	try {
	

srand ((double) microtime() * 1000000);
$random_number1 = rand(0,count($response)-1);
srand ((double) microtime() * 1000000);
$random_number2 = rand(0,10-1);
$texto = utf8_decode ($response[$random_number1]);
fputs($archivo, $texto);
fclose($archivo);
$twitter->statusesUpdate($response[$random_number1].' '.$hashtag[$random_number2]);
	
		
		echo 'Enviado '.$response[$random_number1].'<br />';
	}catch(Exception $e){
		echo '{NO ENVIADO: '.$e.'}';
	}
