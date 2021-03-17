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


//airdrop

/* */

/*


$nowblockcheck=intval($kevablock)-intval($listasset[0]["heightx"]);


if($nowblockcheck<5040)

		{


//check address



		$farr=array();
		$ftotal=array();

		$checkaddress= $kpc->listtransactions("",5040);

			foreach($checkaddress as $freetx)

			{
			
			extract($freetx);
			
			
			$farr["fcon"]=$confirmations;
			$farr["fadd"]=$address;

			if($category=="send"){$farr["send"]=1;$farr["sendnum"]=str_replace("-","",$amount);}else{$farr["send"]=0;}

		
			array_push($ftotal,$farr);

			}


			asort($ftotal);

			$eventa=0;
			$eventb=0;
			
		if(!$reward){$npadd=$addrone;}else{$npadd=$reward;}

				foreach($ftotal as $findadd){

						
						if($findadd['fadd']==$npadd)

						 {
								 $eventa=1;

							if($findadd['fcon']>720)

								{

								$eventb=1;

								break;

								}
						 }
					


				}

if($eventa==0 or $eventb==1){



$eventroll=rand(1,10000);

		//kva

		if($eventroll>1000){

		$forfree=1;

		$bonuschip=$kpc->sendtoaddress($npadd,$forfree);}

		else

		{

		$forfree=1;
		
		$bonuschip=$rpc->sendtoaddress($rvnadd,$forfree);

		}
		
		//chip

		$carda="KEVA.APP/CYBER/PIP_BOY";

		$cardb="KEVA.APP/CHIP/IMAGE";

		$cardc="KEVA.APP/CHIP/RGB";

		$cardd="KEVA.APP/CYBER/GOLDEN";


		if($eventroll>4000){

		$bonuschip=$rpc->transfer($carda,1,$rvnadd);}else
		{$bonuschip=$rpc->transfer($cardb,1,$rvnadd);}


		if($eventroll<3000){

		$bonuschip=$rpc->transfer($cardc,1,$rvnadd);}


		if($eventroll<500){

		$bonuschip=$rpc->transfer($cardd,1,$rvnadd);}



		


		
		}



	}



	

*/

//assistant

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

			if($gift=="KEVA.APP/CYBER/PIP_BOY"){$vpipboy=1;}

			 

			}

		}else
		{
		
		$vking="cyber/".strtolower($assistant).".php";

		if($giftasset["KEVA.APP/CHIP/INVISIBLE"]!="" & $assistant=="PIP_BOY" & !$invisible)
			{$vking="";}
		
		}
			if($vking!=""){require($vking); exit;}

			
			

			if($vbitdoge!="" & $vtia==1){if(!$tia){$vtia=0;}else{$vbitdoge=0;}}


			if($vtia==1 & $tia!="") {require('cyber/tia.php');exit;}

			
			
			
			if($vbitdoge==1) {$pipoff=1;require('cyber/bitdoge.php');exit;}

			if($vbitdoge==2) {$pipoff=1;require('cyber/bitdoge.raven.php');exit;}

			if($vbitdoge==3) {$pipoff=1;require('cyber/bitdoge.keva.php');exit;}

			if($vbitdoge==4) {$pipoff=1;require('cyber/doge.php');exit;}

			if($vtia==1) {$pipoff=1;require('cyber/tia.php');exit;}

			if($vwsb==1) {$pipoff=1;require('cyber/wsb.php');exit;}

			if($vdogeceo==1) {$pipoff=1;require('cyber/dogeceo.php');exit;}

			
			if($vhodlonaut==1) {$pipoff=1;require('cyber/hodlonaut.php');exit;}

			if($vtororo==1) {$pipoff=1;require('cyber/tororo.php');exit;}

			if($vpenchan==1) {$pipoff=1;require('cyber/penchan.php');exit;}

			if($vgolden==1) {$pipoff=1;require('cyber/golden.php');exit;}


			if($vpipboy==1) {require('cyber/pip_boy.php');exit;}
			

	}



?>
