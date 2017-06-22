<?php
//header ("content-type: text/xml");
$xml = new DomDocument('1.0', 'UTF-8');
require_once('lib/twitteroauth.php');

$woid = "23424950";// --- where on earth ID --- (1 = global/earth) --- 

$consumerkey = "sLS2ILE79vkUAQXmNGgiw";
$consumersecret = "zfUD6h0YvFSXNv1t6uvRRbASw7DSno5wBgen7jcMr08";
$accesstoken = "910761589-F5iSZTA92TjlRUAOBPfFdo5ZVYaH3OSDSEeFfRHC";
$accesstokensecret = "8CmCoFffDr2LE7Di48LrJpAC6ABRMQU6LVFp6dM";
$connection = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);


$tweets = $connection->get("https://api.twitter.com/1.1/trends/place.json?id=".$woid);

$trends = $tweets[0]->trends;


$root = $xml->createElement('channel');
$root = $xml->appendChild($root);
   
foreach($trends as $trend){

        
        $subnode = $xml->createElement('title');
       $subnode = $root->appendChild($subnode);
      //---Insertar el texto del nombre en el nodo
      $text = $xml->createTextNode($trend->name);
      $subnode->appendChild($text);
        
      
       
   
}
$xml->save('trends.xml');
?>

