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



			foreach($giftasset as $gift=>$giftn)

			{

			

			

			if($gift=="KEVA.APP/CYBER/BITDOGE.KEVA"){$vbitdoge=3;}

			if($gift=="KEVA.APP/CYBER/BITDOGE.RAVEN"){$vbitdoge=2;}

			if($gift=="KEVA.APP/CYBER/BITDOGE"){$vbitdoge=1;}



			if($gift=="KEVA.APP/CYBER/TIA"){$vtia=1;}

			}


			if($vbitdoge!="" & $vtia==1){if(!$tia){$vtia=0;}else{$vbitdoge=0;}}


			if($vtia==1 & $tia!="") {require('cyber/tia.php');exit;}


			
			
			if($vbitdoge==1) {require('cyber/bitdoge.php');}

			if($vbitdoge==2) {require('cyber/bitdoger.php');}

			if($vbitdoge==3) {require('cyber/bitdogek.php');}

			if($vtia==1) {require('cyber/tia.php');}

			

	}



?>
