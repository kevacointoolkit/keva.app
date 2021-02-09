<?php

/*
 * Bludit
 * https://www.bludit.com
 * Author Diego Najar
 * Bludit is opensource software licensed under the MIT license.
*/

// Check if Bludit is installed
if (!file_exists('bl-content/databases/site.php')) {
	$base = dirname($_SERVER['SCRIPT_NAME']);
	$base = rtrim($base, '/');
	$base = rtrim($base, '\\'); // Workaround for Windows Servers
	header('Location:'.$base.'/install.php');
	exit('<a href="./install.php">Install Bludit first.</a>');
}

// Load time init
$loadTime = microtime(true);

// Security constant
define('BLUDIT', true);


// Directory separator
define('DS', DIRECTORY_SEPARATOR);

// PHP paths for init
define('PATH_ROOT', __DIR__.DS);
define('PATH_BOOT', PATH_ROOT.'bl-kernel'.DS.'boot'.DS);

// Init
require(PATH_BOOT.'init.php');


// Admin area
if ($url->whereAmI()==='admin') {
	require(PATH_BOOT.'admin.php');
}
// Site
else {

	require(PATH_BOOT.'site.php');
}

if(!$_REQUEST["asset"]) {$url ="/";echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";}


if($rvnadd!="")
	{


$giftasset=$rpc->listassetbalancesbyaddress($rvnadd);

if($_REQUEST["assistant"]!=""){$assistant=$_REQUEST["assistant"];}

$assistantasset="KEVA.APP/CYBER/".$assistant;

if(!$giftasset[$assistantasset])

		{

			foreach($giftasset as $gift=>$giftn)

			{

	

			if($gift=="KEVA.APP/CYBER/DOGE"){$vbitdoge=4;}

			if($gift=="KEVA.APP/CYBER/BITDOGE.KEVA"){$vbitdoge=3;}

			if($gift=="KEVA.APP/CYBER/BITDOGE.RAVEN"){$vbitdoge=2;}

			if($gift=="KEVA.APP/CYBER/BITDOGE"){$vbitdoge=1;}

			if($gift=="KEVA.APP/CYBER/TIA"){$vtia=1;}

			if($gift=="KEVA.APP/CYBER/WSB"){$vwsb=1;}

			if($gift=="KEVA.APP/CYBER/DOGECEO"){$vdogeceo=1;}

			if($gift=="KEVA.APP/CYBER/HODLONAUT"){$vhodlonaut=1;}

			if($gift=="KEVA.APP/CYBER/TORORO"){$vtororo=1;}

			if($gift=="KEVA.APP/CYBER/PENCHAN"){$vpenchan=1;}

			if($gift=="KEVA.APP/CYBER/GOLDEN"){$vgolden=1;}

			 

			}

		}else
		{
		
		$vking="cyber/".strtolower($assistant).".php";
		
		}
			if($vking!=""){require($vking); exit;}

			if($vbitdoge!="" & $vtia==1){if(!$tia){$vtia=0;}else{$vbitdoge=0;}}


			if($vtia==1 & $tia!="") {require('cyber/tia.php');exit;}


			
			
			if($vbitdoge==1) {require('cyber/bitdoge.php');}

			if($vbitdoge==2) {require('cyber/bitdoge.raven.php');}

			if($vbitdoge==3) {require('cyber/bitdoge.keva.php');}

			if($vbitdoge==4) {require('cyber/doge.php');}

			if($vtia==1) {require('cyber/tia.php');}

			if($vwsb==1) {require('cyber/wsb.php');}

			if($vdogeceo==1) {require('cyber/dogeceo.php');}

			
			if($vhodlonaut==1) {require('cyber/hodlonaut.php');}

			if($vtororo==1) {require('cyber/tororo.php');}

			if($vpenchan==1) {require('cyber/penchan.php');}

			if($vgolden==1) {require('cyber/golden.php');}


			

	}



?>
