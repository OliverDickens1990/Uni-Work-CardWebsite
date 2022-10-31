
<?php
//page link
$xmltxt = file_get_contents('https://weather-broker-cdn.api.bbci.co.uk/en/observation/rss/2643123');
$xml = simplexml_load_string($xmltxt)  ;
//var_dump($xml) ;
echo "<br/><br/>" ;
$num = sizeof($xml->article) ;

$xsl = new DOMDocument;
$xsl->load('weather.xsl');

$proc = new XSLTProcessor() ;
$proc->importStyleSheet($xsl);
$result = $proc->transformtoXML($xml) ;

echo $result;


?>
