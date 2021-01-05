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
				
		
	}else{echo "<script>alert('NO SHORTCOAD AVAILABLE');history.go(-1);</script>";exit;}
	
	}



$forfree=$freeadd;

$checkaddress= $kpc->listtransactions("credit",100);

$listaccount = $kpc->listaccounts();

if($listaccount['credit']<1){echo "<script>alert('NO CREDIT AVAILABLE, PLEASE WAIT NEXT TIME. OR ASK SOMEONE TO SEND SOME TO 5982501 WITH APP (".$listaccount['credit'].")');history.go(-1);</script>";exit;}

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


		foreach($ftotal as $findadd){

						
						

									
						if($findadd['fadd']==$forfree)

										   {
							
										

										if($findadd['fcon']>30)

											     {

										$age= $kpc->sendfrom("credit",$forfree,$credit);

										echo "<script>alert('GET ".$credit." CREDIT SUCCESS');history.go(-1);</script>";



										exit;

											    }

										else
								
											    { 

										$left=30-$findadd['fcon'];
		
									
										echo "<script>alert('WAIT ".$left." BLOCKS (2min/block)');history.go(-1);</script>";
										
										   exit;

											    }

										  }
										else


										  {

											$ok=9;
										  }
										
									}


					if($ok=9)
											
									{$age= $kpc->sendfrom("credit",$forfree,$credit);
											
										echo "<script>alert('GET ".$credit." CREDIT SUCCESS');history.go(-1);</script>";
									}

						}


//ok
	
		


//ok

$blocknum=$kpc->getblockcount();

$comm=trim($_REQ["num"]);

//theme

$themeto="social";

if(substr($comm,0,3)=="txt") {$comm=str_replace("txt","",$comm);$themeto="txt";}

if(substr($comm,0,3)=="pic") {$comm=str_replace("pic","",$comm);$themeto="pic";}

if(substr($comm,0,3)=="koh") {$comm=str_replace("koh","",$comm);$themeto="koh";}

if(substr($comm,0,5)=="album") {$comm=str_replace("album","",$comm);$themeto="album";}

if(substr($comm,0,5)=="stone") {$comm=str_replace("stone","",$comm);$themeto="milestone";}

if(!$comm & isset($_REQ["num"])){ $comm="5570511";}




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
								

								}
						  }
				
				$asset=Base58Check::encode( $cons, false , 0 , false);

			  $namespace=$kpc->keva_get($asset,"_KEVA_NS_");

			  $title=bin2hex($namespace['value']);


if(!$asset) {$url ="/";echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";}



$url ="/bludit/?lang=&theme=".$themeto."&asset=".$asset."&scode=".$comm."&group=no&gname=".$title;



echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";



}


$blockk=trim(str_replace("k","",$comm));

if(substr($comm,0,1)=="k" & is_numeric($blockk)==true) 

	{
	
	
	$url ="/bludit/?lang=&asset=".$comm;



	echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";
	
	}


echo "<!DOCTYPE html><head><title>KEVA</title><meta name=\"apple-mobile-web-app-capable\" content=\"yes\"><meta charset=\"UTF-8\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";

echo "<style>html, body {background-color: #212121;color: #fff;font-size: 15px;margin: 0 auto -100px;padding: 0;}a:link,a:visited,a:active{transition:0.5s;color: #28f428;	text-decoration: none;}a:hover { color:yellow; }.timeline {width:380px;padding-top:20px;position: relative;}.timeline:before {content: '';position: absolute;top: 0px;left: calc(42%);bottom: 0px;width: 2px;background: #ddd;}.timeline:after {content: ''; display: table;clear: both;}.entry {clear: both;text-align: left;position: relative;}.entry .title {margin-bottom: .5em;font-size:16px;float: left;width: 40%;text-align: right;position: relative;}.entry .title:before {}.entry .title h3 {margin: 0;font-size: 120%;}.entry .title p {margin: 0;line-height:30px;font-size: 100%;}.entry .body {float: right;font-size:16px;width: 55%;padding-top:1px;}.entry .body p {line-height: 1.4em;}.entry .body p:first-child {margin-top: 0;font-weight: 400;}entry .body ul {color: #ddd;padding-left: 0;list-style-type: none;}.entry .body ul li:before {content: '¨C';margin-right: .5em;}</style>";

echo "</head>";

echo "<body style=\"background-color: #212121;\">";


echo "<div style=\"padding: 5px;margin-bottom: 5px;box-shadow: 2px 2px 2px hsla(0,0%,0%,0.1);background: var(--ck-color-toolbar-background);text-align:right;font-size:10px;\"><p style=\"padding-right:7px;\">[ <a href=https://github.com/kevacoin-project/keva_wallet/releases target=_blank><font color=grey>WALLET</font></a> ] [ <a href=https://kevamemorial.com target=_blank><font color=grey>MEMORIAL</font></a> ] [ <a href=\"https://api.qrserver.com/v1/create-qr-code/?size=300x300&data="."https://keva.app\" target=_blank><font color=grey>".$blocknum."</font></a> ]</p></div>";
		

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
