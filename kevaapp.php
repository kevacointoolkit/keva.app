<?php
error_reporting(0);
include("rpc.php");

$kpc = new Keva();

$kpc->username=$krpcuser;
$kpc->password=$krpcpass;
$kpc->host=$krpchost;
$kpc->port=$krpcport;

$rpc = new Raven();

$rpc->username=$rrpcuser;
$rpc->password=$rrpcpass;
$rpc->host=$rrpchost;
$rpc->port=$rrpcport;

$_REQ = array_merge($_GET, $_POST);//iotstat




//free keva

$freeadd=trim($_REQ["num"]);



if(strlen($freeadd)==34 or substr($freeadd,0,1)=="v") {




$ip=$_SERVER["REMOTE_ADDR"];
$ban=file_get_contents("blockip.txt");
if(stripos($ban,$ip))
{
die("Your IP Address is:$ip,you're forbiden to view this page!");
}

empty($_SERVER['HTTP_VIA']) or exit('Access Denied');

//mempool

$mempool= $kpc->getmempoolinfo();

$waitpool=intval($mempool['size']);


		if($waitpool>10)

			{

				$waittime=$waitpool*3;
				echo "<script>alert('Server is busy, Wait ".$waittime."mins');history.go(-1);</script>";exit;



			
			}

		
			$credit=0;


		





        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        }
        if (getenv('HTTP_X_REAL_IP')) {
            $ip = getenv('HTTP_X_REAL_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
            $ips = explode(',', $ip);
            $ip = $ips[0];
        } elseif (getenv('REMOTE_ADDR')) {
            $ip = getenv('REMOTE_ADDR');
        } else {
            $ip = '0.0.0.0';
        }

   


define('count_num','2');
define('count_time','86400');
session_start();
$now_time = time();

$ipdir="ipstat/";
$ipfile=$ipdir."".$ip.'.txt';
$ipfiled=$ipdir."".$_SERVER["HTTP_VIA"].'.txt';
$ipfilex=$ipdir."".$_SERVER["HTTP_X_FORWARDED_FOR"].'.txt';

if($_SERVER["HTTP_VIA"]!=""){$ipfile=$ipfiled;}
if($_SERVER["HTTP_X_FORWARDED_FOR"]!=""){$ipfile=$ipfilex;}

if(file_exists($ipfile))
	{

	$iptt=filemtime($ipfile);
	$ipread=intval(file_get_contents($ipfile))*10;

	if($ipread>10){$waitc=$ipread;}else{$waitc=10;}

		if(($now_time - $iptt) < $waitc)

			{
				echo "<script>alert('Wait ".$waitc."s');history.go(-1);</script>";exit;
			}
		else
			{

			$ipread=intval(file_get_contents($ipfile));

			if($ipread > 14)
						{
			
							if(($now_time - $iptt) < 600000){
			
							echo "<script>alert('Wait next week');history.go(-1);</script>";exit;
							}
							else
						
							{file_put_contents($ipfile,"1");
							
							}
						}
		    
			if($ipread > 1 & ($now_time - $iptt)<86400){echo "<script>alert('Wait next day');history.go(-1);</script>";exit;}

			$ipread=$ipread+1;

			file_put_contents($ipfile,$ipread);

			
			}
		
		}
		
		else
			
		{

		 file_put_contents($ipfile,"1");
			
		}

/*

if ($_SESSION){
    $last_time = $_SESSION['last_time'];
    $times = $_SESSION['times'] + 1;
    $_SESSION['times'] = $times;
	

}else{
    $last_time = $now_time;
    $times = 1;
	$iptimes =1;
    $_SESSION['times'] = $times;
    $_SESSION['last_time'] = $last_time;
	$_SESSION['myip']=$_SERVER["REMOTE_ADDR"];
	
}

if(($now_time - $last_time) < count_time){ if ($times>=count_num){
      echo "<script>alert('Wait next time.');history.go(-1);</script>";exit;
    }
}else{
    $times = 0;
    $_SESSION['last_time'] = $now_time;
    $_SESSION['times'] = $times;

}


*/

	if(substr($freeadd,0,1)=="v"){
	
	$freeadd=trim(str_replace("v","",$freeadd));

	$comm=$freeadd;

	if(is_numeric($comm) & strlen($comm)>4) 
	
	
	{



$blength=substr($comm , 0 , 1);
$block=substr($comm , 1 , $blength);
$btxn=$blength+1;
$btx=substr($comm , $btxn);





$blockhash= $kpc->getblockhash(intval($block));


$blockdata= $kpc->getblock($blockhash);


$txa=$blockdata['tx'][$btx];

if(!$txa) {$url ="/";echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";}

				
		$transaction= $kpc->getrawtransaction($txa,1);

					foreach($transaction['vout'] as $vout)
	   
						  {

					$op_return = $vout["scriptPubKey"]["asm"]; 

				
					$arr = explode(' ', $op_return); 

					if($arr[0] == 'OP_KEVA_NAMESPACE') 
								{

								 $cona=$arr[0];
								 $cons=$arr[1];
								 $conk=$arr[2];

								 $freeadd=$vout["scriptPubKey"]["addresses"][0];
								

								}
						  }
				
		
	}else{echo "<script>alert('NO SHORTCODE AVAILABLE');history.go(-1);</script>";exit;}
	
	}



$forfree=$freeadd;

$checkaddress= $kpc->listtransactions("",100);

$listaccount = $kpc->getbalance();

$listaccount=intval($listaccount);

$ip=strval($ip);



if($listaccount<1){echo "<script>alert('NO CREDIT AVAILABLE, PLEASE WAIT NEXT TIME. OR ASK SOMEONE TO SEND SOME TO 5982501 WITH APP (".$listaccount[''].")');history.go(-1);</script>";exit;}

$ok=0;

		$farr=array();
		$ftotal=array();

		foreach($checkaddress as $freetx)

			{
			
			extract($freetx);
			
			
			$farr["fcon"]=$confirmations;
			$farr["fadd"]=$address;

			if($category=="send"){$farr["send"]=1;$farr["sendnum"]=str_replace("-","",$amount);}else{$farr["send"]=0;}

		
			array_push($ftotal,$farr);

			}


			asort($ftotal);

			
/*
			
			$luckycount=0;
			$lucky=0;
			

		foreach($ftotal as $findsend)
			
		{

		if($findsend['send']==1){
		
	
			
		if($findsend['sendnum']>$lucky){$lucky=$findsend['sendnum'];}

		if($luckycount==10){if($lucky<1){$credit=1;}break;}

		$luckycount=$luckycount+1;}


		}

			$luckycount=0;
			$lucky=0;
			

		foreach($ftotal as $findsend)
			
		{

		if($findsend['send']==1){
		
	
			
		if($findsend['sendnum']>$lucky){$lucky=$findsend['sendnum'];}

		if($luckycount==99){if($lucky<10){$credit=10;}}

		$luckycount=$luckycount+1;}


		}


*/



foreach($ftotal as $findadd){

						
						

									
						if($findadd['fadd']==$forfree)

										   {
							
										

										if($findadd['fcon']>300)

											     {

												

										$age=$kpc->keva_list_namespaces();

										if(!$age[0]['namespaceId']){

										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
		
										
										
										$goodname=$age['namespaceId'];
										
										}

										else
										{
										
										$goodname=$age[0]['namespaceId'];
										
										}

										$bigstep=$kpc->keva_get("Nf5pmEk8acvBmTsMTPcEskEz3XHKDE38me","Congratulations");

										$namespaceb= $kpc->keva_get($goodname,"_KEVA_NS_");

		
		

			$title=$namespaceb['value'];

			$snl=strlen($namespaceb['height']);
				$snm=$namespaceb['height'];

				

				$getblockh=$kpc->getblockheaderbyheight($snm);
			
				$getblockh=$getblockh['block_header']['hash'];
				$getblocktx=$kpc->getblock($getblockh);

			
				$sncount=0;
		
					foreach($getblocktx['tx'] as $txa){

				
						$transaction= $kpc->getrawtransaction($txa,1);

							foreach($transaction['vout'] as $vout)
	   
							  {

								$op_return = $vout["scriptPubKey"]["asm"]; 

				
									$arrb = explode(' ', $op_return); 

									if($arrb[0] == 'OP_KEVA_NAMESPACE') 
										{

								 $cona=$arrb[0];
								 $cons=$arrb[1];
								 $conk=$arrb[2];
								  $cond=$vout["scriptPubKey"]["addresses"][0];

								 $assetn=Base58Check::encode($cons, false , 0 , false);

								 if($goodname==$assetn){ $sn=$snl."".$snm."".$sncount;}

										}
								 }
				
							

						$sncount=$sncount+1;

						}

						//$agex=$kpc->keva_put($goodname,"PLAYER",$ip);

						//vote

								//$vote="\n\nWelcome to the ture internet: IP net. Now we are in the Chia Global Hackathon @Asia 1. Vote for us. Vote to ipwallet.io. Make internet great again.\n\n<a href=https://hackerlink.io/grant/Chia/1/buidl>https://hackerlink.io/grant/Chia/1/buidl</a>\n\nOPEN <a href=https://ipwallet.io>ipwallet.io</a>\n\nHow to use ipwallet\n\n<a href=https://hackerlink.io/buidl/1175>https://hackerlink.io/buidl/1175</a>\n\n<a href=https://ipfs.keva.app/ipfs/QmZsDXKxCaY9YqNcJWT43TbQwbeBN3xyQ6MkVoH1awYGkG>video</a>";

										//$agex=$kpc->keva_put($goodname,"IPWALLET.IO",$vote);
				
						$bigstep['value']=$sn."\n\nYour first namespace number on the blockchain. You can play the game legend of satoshi to get free kva now.\n\n<a href=https://keva.app?rpg".$sn.">keva.app?rpg".$sn."</a>\n\n".$bigstep['value'];

						$agex=$kpc->keva_put($goodname,"Congratulations",$bigstep['value'],$forfree); 
													 
								

										echo "<script>alert('GET NAMESPACE NUMBER SUCCESS');history.go(-1);</script>";


										
										exit;

											    }

										else
								
											    { 

										$left=300-$findadd['fcon'];
		
									
										echo "<script>alert('WAIT ".$left." BLOCKS (2min/block) \u000a \u000aThis is only for beginer and emergency use. If you need more kva, please mining to supprt blockchain.');history.go(-1);</script>";
										
										   exit;

											    }

										  }
										else


										  {

											$ok=9;
										  }
										
									}


					if($ok=9)
											
									{
										$age=$kpc->keva_list_namespaces();
										if(!$age[0]['namespaceId']){

										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");



										
										
										$goodname=$age['namespaceId'];
										
										}

										else
										{
										
										$goodname=$age[0]['namespaceId'];
										
										}

										$bigstep=$kpc->keva_get("Nf5pmEk8acvBmTsMTPcEskEz3XHKDE38me","Congratulations");

										$namespaceb= $kpc->keva_get($goodname,"_KEVA_NS_");

		
		

			$title=$namespaceb['value'];

			$snl=strlen($namespaceb['height']);
				$snm=$namespaceb['height'];

				

				$getblockh=$kpc->getblockheaderbyheight($snm);
			
				$getblockh=$getblockh['block_header']['hash'];
				$getblocktx=$kpc->getblock($getblockh);

			
				$sncount=0;
		
					foreach($getblocktx['tx'] as $txa){

				
						$transaction= $kpc->getrawtransaction($txa,1);

							foreach($transaction['vout'] as $vout)
	   
							  {

								$op_return = $vout["scriptPubKey"]["asm"]; 

				
									$arrb = explode(' ', $op_return); 

									if($arrb[0] == 'OP_KEVA_NAMESPACE') 
										{

								 $cona=$arrb[0];
								 $cons=$arrb[1];
								 $conk=$arrb[2];
								  $cond=$vout["scriptPubKey"]["addresses"][0];

								 $assetn=Base58Check::encode($cons, false , 0 , false);

								 if($goodname==$assetn){ $sn=$snl."".$snm."".$sncount;}

										}
								 }
				
							

						$sncount=$sncount+1;

						}
				
						$bigstep['value']=$sn."\n\nYour first namespace number on the blockchain. You can play the game legend of satoshi to get free kva now.\n\n<a href=https://keva.app?rpg".$sn.">keva.app?rpg".$sn."</a>\n\n".$bigstep['value'];
													 
										//$agex=$kpc->keva_put($goodname,"PLAYER",$ip);
										//vote

										//$vote="\n\nWelcome to the ture internet: IP net. Now we are in the Chia Global Hackathon @Asia 1. Vote for us. Vote to ipwallet.io. Make internet great again.\n\n<a href=https://hackerlink.io/grant/Chia/1/buidl>https://hackerlink.io/grant/Chia/1/buidl</a>\n\nOPEN <a href=https://ipwallet.io>ipwallet.io</a>\n\nHow to use ipwallet\n\n<a href=https://hackerlink.io/buidl/1175>https://hackerlink.io/buidl/1175</a>\n\n<a href=https://ipfs.keva.app/ipfs/QmZsDXKxCaY9YqNcJWT43TbQwbeBN3xyQ6MkVoH1awYGkG>video</a>";

										//$agex=$kpc->keva_put($goodname,"IPWALLET.IO",$vote);

										$agex=$kpc->keva_put($goodname,"Congratulations",$bigstep['value'],$forfree); 

										

													 
									    
											
										echo "<script>alert('GET NAMESPACE NUMBER SUCCESS');history.go(-1);</script>";
									}

						}


//ok
	
		


//ok

$blocknum=$kpc->getblockcount();

$comm=trim($_REQ["num"]);

if(isset($_SERVER["QUERY_STRING"])){$comm=trim($_SERVER["QUERY_STRING"]);}

if(isset($_REQ["num"])){$comm=trim($_REQ["num"]);}

//theme



if(substr($comm,0,3)=="txt") {$comm=str_replace("txt","",$comm);$themeto="&theme=txt";}

if(substr($comm,0,3)=="pic") {$comm=str_replace("pic","",$comm);$themeto="&theme=pic";}

if(substr($comm,0,3)=="koh") {$comm=str_replace("koh","",$comm);$themeto="&theme=koh";}

if(substr($comm,0,5)=="album") {$comm=str_replace("album","",$comm);$themeto="&theme=album";}

if(substr($comm,0,5)=="stone") {$comm=str_replace("stone","",$comm);$themeto="&theme=milestone";}

if(substr($comm,0,4)=="roam") {$comm=str_replace("roam","",$comm);$themeto="&theme=roam";}

if(substr($comm,0,4)=="mind") {$comm=str_replace("mind","",$comm);$themeto="&theme=mind";}

if(substr($comm,0,9)=="assistant") {$comm=str_replace("assistant","",$comm);$themeto="&theme=assistant";}

if(substr($comm,0,1)=="a") {$comm=str_replace("a","",$comm);$themeto="&theme=assistant";}

if(substr($comm,0,4)=="list") {$comm=str_replace("list","",$comm);$themeto="&theme=list";}


if(substr($comm,0,4)=="book") {$comm=str_replace("book","",$comm);$themeto="&theme=book";}

if(substr($comm,0,2)=="qr") {$comm=str_replace("qr","",$comm);$themeto="&theme=qr";}


if(substr($comm,0,3)=="nft" or substr($comm,0,3)=="Rpg") {$comm=str_replace("nft","",$comm);$themeto="&theme=nft";}

if(substr($comm,0,3)=="rpg" or substr($comm,0,3)=="Rpg" ) {$comm=str_replace("rpg","",$comm);$comm=str_replace("Rpg","",$comm);$themeto="&theme=rpg";

$rpg=1;



}

if(!$comm & isset($_REQ["num"])){ $comm="65750121";}




if(is_numeric($comm) & strlen($comm)>4) 
	
	
	{



$blength=substr($comm , 0 , 1);
$block=substr($comm , 1 , $blength);
$btxn=$blength+1;
$btx=substr($comm , $btxn);





$blockhash= $kpc->getblockhash(intval($block));


$blockdata= $kpc->getblock($blockhash);


$txa=$blockdata['tx'][$btx];

if(!$txa) {$url ="/";echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";}

				
		$transaction= $kpc->getrawtransaction($txa,1);

					foreach($transaction['vout'] as $vout)
	   
						  {

					$op_return = $vout["scriptPubKey"]["asm"]; 

				
					$arr = explode(' ', $op_return); 

					if($arr[0] == 'OP_KEVA_NAMESPACE') 
								{

								 $cona=$arr[0];
								 $cons=$arr[1];
								 $conk=$arr[2];

						$freeadd=$vout["scriptPubKey"]["addresses"][0];
								

								}
						  }
				
				$asset=Base58Check::encode( $cons, false , 0 , false);

			  $namespace=$kpc->keva_get($asset,"_KEVA_NS_");



			  $rvncheck=$kpc->keva_get($asset,"RAVENCOIN");

			  $dogecheck=$kpc->keva_get($asset,"DOGECOIN");

			  $btccheck=$kpc->keva_get($asset,"BITCOIN");

			  $chiacheck=$kpc->keva_get($asset,"CHIA");

			  $firstcheck=$kpc->keva_get($asset,"Congratulations");

			  if($firstcheck['value']!=""){
			  
			  $newtx= $kpc->getrawtransaction($firstcheck['txid'],1);

			  $vnum=$firstcheck['vout'];

			  $freeadd=$newtx['vout'][$vnum]["scriptPubKey"]["addresses"][0];
			  
			  }
				
			
			  $title=bin2hex($namespace['value']);

			  //catsale

			  $chkoffer=$kpc->keva_get($asset,"CAT.SALE");

			  if($chkoffer['value']!=""){

				  $olink=$chkoffer['value'];
			  
			   $title=bin2hex($olink);
			  
			  }
		





if(!$asset) {$url ="/";echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";}



//rpg

if($rpg=="1") {


		//rpgguset

		if($asset=="Nb2R5b1iQFVnrDLHQSnKPW3gxt9KJYCKvz"){


			 $xolink="Guest".rand(1111,9999);
			  
			   $title=bin2hex($xolink);
		
		$comm="Keva";

		}


$url ="https://rpg.keva.app/?ns=".$asset."&gname=".$title."&scode=".$comm."&rvn=".$rvncheck["value"]."&keva=".$freeadd."&doge=".$dogecheck["value"]."&btc=".$btccheck["value"]."&chia=".$chiacheck["value"];echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";

}


$url ="/bludit/?lang=".$themeto."&asset=".$asset."&scode=".$comm."&group=no&gname=".$title;



echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";



}


$blockk=trim(str_replace("k","",$comm));

if(substr($comm,0,1)=="k" & is_numeric($blockk)==true) 

	{
	
	
	$url ="/bludit/?lang=&asset=".$comm;



	echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";
	
	}


echo "<!DOCTYPE html><head><title>KEVA</title><meta name=\"apple-mobile-web-app-capable\" content=\"yes\"><meta charset=\"UTF-8\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";

echo "<style>html, body {background-color: #212121;color: #fff;font-size: 15px;margin: 0 auto -100px;padding: 0;}a:link,a:visited,a:active{transition:0.5s;color: #28f428;	text-decoration: none;}a:hover { color:yellow; }.timeline {width:380px;padding-top:20px;position: relative;}.timeline:before {content: '';position: absolute;top: 0px;left: calc(42%);bottom: 0px;width: 2px;background: #ddd;}.timeline:after {content: ''; display: table;clear: both;}.entry {clear: both;text-align: left;position: relative;}.entry .title {margin-bottom: .5em;font-size:16px;float: left;width: 40%;text-align: right;position: relative;}.entry .title:before {}.entry .title h3 {margin: 0;font-size: 120%;}.entry .title p {margin: 0;line-height:30px;font-size: 100%;}.entry .body {float: right;font-size:16px;width: 55%;padding-top:1px;}.entry .body p {line-height: 1.4em;}.entry .body p:first-child {margin-top: 0;font-weight: 400;}entry .body ul {color: #ddd;padding-left: 0;list-style-type: none;}.entry .body ul li:before {content: '–';margin-right: .5em;}</style>";

echo "</head>";

echo "<body style=\"background-color: #212121;\">";


echo "<div style=\"padding: 5px;margin-bottom: 5px;box-shadow: 2px 2px 2px hsla(0,0%,0%,0.1);background: var(--ck-color-toolbar-background);text-align:right;font-size:10px;\"><p style=\"padding-right:7px;\">[ <a href=https://cat.sale><font color=\"8CEA00\">CAT.SALE</font></a> ] [ <a href=https://keva.app/nft><font color=\"8CEA00\">NFT</font></a> ] [ <a href=https://github.com/kevacoin-project/keva_wallet/releases target=_blank><font color=grey>WALLET</font></a> ] [ <a href=https://keva.one target=_blank><font color=grey>KEVA.ONE</font></a> ] [ <a href=https://kevamemorial.com target=_blank><font color=grey>MEMORIAL</font></a> ] [ <a href=\"https://api.qrserver.com/v1/create-qr-code/?size=300x300&data="."https://keva.app\" target=_blank><font color=grey>".$blocknum."</font></a> ]</p></div>";
		

			echo "<form action=\"\" method=\"post\" >";	

	
			
			echo "<center><img src=win.png><div style=\"display:block;width:100%;font-family: coda_regular, arial, helvetica, sans-serif;\"><ul style=\"padding-left:0px;border: 0px solid #59fbea;height:50px;margin-top:0px;padding-top:5px;\"><li style=\"list-style:none;color: #28f428;font-size:30px;letter-spacing:3px;display:inline;height:45px;background-color:#0b0c0d;\">";

			echo "<input type=\"text\" name=\"num\" id=\"editor\" class=\"textarea-inherit\"  style=\"width:175px;border: 1px solid #666666;font-family: coda_regular, arial, helvetica, sans-serif;-webkit-appearance: none;-webkit-border-radius:0;height:50px;font-size: 30px; background-color: rgb(11, 12, 13);color: #ddd;padding-left:10px;letter-spacing:2px;
\" value=\"".$_REQUEST["hvalue"]."\" maxlength=34 placeholder=\"0\"><input type=\"hidden\" name=\"keva\" vaule=\"1\"></center></li></ul>";


echo "<ul style=\"padding-left:0px;border: 0px solid #59fbea;height:50px;margin-top:0px;padding-top:5px;\"><li style=\"list-style:none;color: #28f428;font-size:10px;letter-spacing:3px;display:inline;height:45px;background-color:#0b0c0d;-webkit-appearance:none ;-webkit-border-radius: 0;border-radius:0;\">";

echo "<center><input type=\"submit\" value=\"OPEN\" style=\"border: 0px solid #666666;-webkit-appearance:none ;-webkit-border-radius: 0;border-radius:0;height:36px;background-color:#212121;color: #59fbea;height:50px;width:200px;font-size: 20px;padding-top:0px;\"></center></li></ul></div>";

echo "<script>document.getElementById(\"editor\").addEventListener(\"input\", function(){var op=\"\";var tmp = document.getElementById(\"editor\").value.replace(/\-/g, \"\");for (var i=0;i<tmp.length;i++){if (i%4===0 && i>0){op = op + \"\" + tmp.charAt(i);} else {op = op + tmp.charAt(i);} }document.getElementById(\"editor\").value = op;});</script>";
			

			
			echo "</form>";



?>

</div>

</body>
</html
