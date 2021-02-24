<?php

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

$_REQ = array_merge($_GET, $_POST);

//rpc

		$arr=array();
		$arra=array();
		$totalass=array();
		$combine="";


if(isset($_REQ["asset"])){$asset=$_REQ["asset"];}

if(!$_REQ["asset"]){$asset="NdwmTDJw1GRnLzz3CARsp3tX878pogZqLS";}

$blocknum=trim(str_replace("k","",$asset));

$knum="";

if(substr($asset,0,1)=="k" & is_numeric($blocknum)==true) 
	
	{

		

			$blockhash= $kpc-> getblockhash(intval($blocknum));

			$blockdata= $kpc->getblock($blockhash);

			foreach($blockdata['tx'] as $txa)

			{
			
			$transaction= $kpc->getrawtransaction($txa,1);

			foreach($transaction['vout'] as $vout)
	   
				  {

					$op_return = $vout["scriptPubKey"]["asm"]; 

					$arrx = explode(' ', $op_return); 

					if($arrx[0] == 'OP_KEVA_PUT') 

						{

							$arra["heightx"]=$transaction['blocktime'];
							$arra["key"]=hex2bin($arrx[2]);

							//$arra["keyhex"]=$arrx[2];

							$arra["value"]=$arrx[3];
			
							$arra["gtime"]=$transaction['time'];

							$arra["txx"]=$transaction['txid'];

					$cons=$arrx[1];
				
				
					$asset=Base58Check::encode( $cons, false , 0 , false);

					if(isset($_REQ["roam"])){$THEME="roam";if($asset!=trim($_REQ["roam"])){continue;}}

					$arra["gnamespace"]=$asset;

					
					$info= $kpc->keva_filter($asset,"",60000);

					$namespace=$kpc->keva_get($asset,"_KEVA_NS_");

					$title=$namespace['value'];

					$arra["gnamex"]=$title;

					array_push($totalass,$arra);

					$knum=1;
				
						} 

				 }

			}
	
	}

	$txid=$txa;



//unlock account

$utime=30;

$ufee=0.9;

	$unlock=0;

	$messageacc=trim($_REQ["scode"]);

	$listaccount = $kpc->listaccounts();
				

			if(isset($listaccount[$messageacc]))
			
					{
						$accaddress=$kpc->getaddressesbyaccount($messageacc);
					
						$shopaddress=$accaddress[0];
						
					
						$forfree=$shopaddress;

						$checkaddress= $kpc->listtransactions($messageacc,1);


						if($checkaddress[0]["confirmations"]<$utime & is_numeric($checkaddress[0]["confirmations"]) & $checkaddress[0]["amount"]>$ufee){$unlock=1;}
					
						$unlockleft=$utime-$checkaddress[0]["confirmations"];
						
					}
			
					else

					{

				

					$shopaddress = $kpc->getnewaddress($messageacc);


					}




//main



	
if(!$txid)

		{

		$asset=trim($asset);
		
		$gstat=$_REQ["group"];

		if(!$gstat){$gstat="no";};

		if($gstat=="no"){$gchange="following";}
		if($gstat=="following"){$gchange="all";}
		if($gstat=="all"){$gchange="follower";}
		
		if($gstat=="follower"){$gchange="build";}
		if($gstat=="build"){$gchange="no";}

	
if($unlock=="0"){
$gshow=$kpc->keva_group_show($asset,60000);}else{$gshow=$kpc->keva_group_show($asset,60000000);}

$fing=0;
$fer=0;

			foreach($gshow as $s_value=>$s)
				{

				if($s["initiator"]==0){$fing=$fing+1;}
				if($s["initiator"]==1){$fer=$fer+1;}
			
				}




		 
		if($gstat=="no"){

		if($unlock=="0"){


		//power check

		$rvncheck=$kpc->keva_get($asset,"RAVENCOIN");

		if(!$rvncheck["value"]){

		 $info= $kpc->keva_filter($asset,"",60000);}

		 else
			{
			
			$rvnadd=$rvncheck["value"];

			$pipboypower=$rpc->listassetbalancesbyaddress($rvnadd);


			if($pipboypower["KEVA.APP/CHIP/POWER"]!="" & $pipboypower["KEVA.APP/CYBER/PIP_BOY"]!="")
				
			{ 
				if($pipboypower["KEVA.APP/CHIP/SUPERPOWER"]!="")
					
				{
				
				$powercount=$pipboypower["KEVA.APP/CHIP/POWER"]+$pipboypower["KEVA.APP/CHIP/SUPERPOWER"]*10000+60000;

				$poweradd=$powercount-60000;

				$poweradd=$poweradd." POWER";
				$info= $kpc->keva_filter($asset,"",$powercount);
				
				}

				else{$powercount=$pipboypower["KEVA.APP/CHIP/POWER"]+60000;
				$poweradd=$pipboypower["KEVA.APP/CHIP/POWER"]." POWER";
				$info= $kpc->keva_filter($asset,"",$powercount);}
				}
			

			if($pipboypower["KEVA.APP/CHIP/SUPERPOWER"]!="" & $pipboypower["KEVA.APP/CYBER/PIP_BOY"]!="" & !$info)
				
			{ 
				$powercount=$pipboypower["KEVA.APP/CHIP/POWER"]*10000+60000;
				$poweradd=$pipboypower["KEVA.APP/CHIP/POWER"]." POWER";
				$info= $kpc->keva_filter($asset,"",$powercount);
				}
			



				 if(!$info)	{

				 $info= $kpc->keva_filter($asset,"",60000);}

			
		 
			}
		 
		 
		 
		 
		 }else{$info= $kpc->keva_filter($asset,"",60000000);}
		 
		 
		 }

		 elseif($gstat=="all" or $gstat=="following" or $gstat=="build"){

		 $info= $kpc->keva_group_filter($asset,"all","",60000);}

		 elseif($gstat=="foller"){

		 $info= $kpc->keva_group_filter($asset,"other","",60000);}

		 else{ $info= $kpc->keva_group_filter($asset,"all","",60000);}

		 
		 //pending

		 if($_REQ["pending"]==1){$info= $kpc->keva_pending($asset);}
		 

	 
			$namespace=$kpc->keva_get($asset,"_KEVA_NS_");

			$title=$namespace['value'];
	 
			$txone=$namespace['txid'];

			$voutone=$namespace['vout'];

			$txr=$kpc->getrawtransaction($txone,1);

			$addrone=$txr['vout'][$voutone]["scriptPubKey"]["addresses"][0];
			$titleone=$title;

		
			
		
	

		$pin="";

		$theme="";

		foreach($info as $x_value=>$x)

			{
			
			extract($x);

			$mscheck=$kpc->keva_get($asset,"MYSPACE");

			If($mscheck['value']!=""){$myspace=$mscheck['value'];break;}

			If($key=="_KEVA_NS_"){$title=$value;continue;}
			If($key=="ID"){$title=$value;}
			//reward

			If($key=="REWARD"){$reward=$value;}

			if(substr($value,0,12)=="mimblewimble"){continue;}

			if(substr($key,0,17)=="__WALLET_TRANSFER"){continue;}

				//countdown

			If($key=="COUNTDOWN"){$key=" ";$value="<p id=\"demo\" style=\"font-size:60px;text-align:center;\"></p><script>var countDownDate = ".strtotime($value)." * 1000;var now = ".time()." * 1000;var x = setInterval(function() {now = now + 1000;var distance = countDownDate - now; var days = Math.floor(distance / (1000 * 60 * 60 * 24));var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)); var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));var seconds = Math.floor((distance % (1000 * 60)) / 1000);document.getElementById(\"demo\").innerHTML = days + \"d \" + hours + \"h \" +minutes + \"m \" + seconds + \"s \";if (distance < 0) {clearInterval(x);document.getElementById(\"demo\").innerHTML = \"EXPIRED\";} }, 1000);</script>";}

			//four digits not support hex2bin

			$arr["heightx"]=$height;
			$arr["key"]=$key;
			$arr["value"]=bin2hex($value);
			$arr["txx"]=$txid;
			$arr["gnamespace"]=$asset;
			$arr["gnamex"]=$title;

			
			$gtime= $kpc->getrawtransaction($txid,1);

			$arr["gtime"]=$gtime["time"];


			$arr["adds"]=$addrone;
		
			
			

			
			
			

			//pin

			If($key=="PIN"){$pin=$value;}
			If($key=="THEME"){$theme=trim(strip_tags($value));}
			If($key=="MP3"){$mp3=trim(strip_tags($value));}
			If($key=="RANDOM"){$rand=$value;}


		

			//cyber

			If($key=="RAVENCOIN"){$rvnadd=$value;$rvntime=$gtime["time"];}
			If($key=="BITCOIN"){$btcadd=$value;}
			If($key=="ETHEREUM"){$ethadd=$value;}
			If($key=="MONERO"){$xmradd=$value;}
			If($key=="ANN"){$ann=$value;}
			If($key=="ASSISTANT"){$assistant=trim(strip_tags(strtoupper($value)));}
			If($key=="BITDOGE"){$bitdoge=$value;}
			If($key=="WSB"){$wsb=$value;}
			If($key=="TIA"){$tia=$value;}
			If($key=="MODEL"){$model=trim($value);}
			If($key=="DOGECEO"){$dogeceo=$value;}
			If($key=="HODLONAUT"){$hodlonaut=$value;}
			If($key=="TORORO"){$tororo=$value;}
			If($key=="PENCHAN"){$penchan=$value;}
			If($key=="GOLDEN"){$golden=$value;}
			If($key=="PIP_BOY"){$pipboy=$value;}
			If($key=="SLOT-A"){$slota=trim($value);}
			If($key=="SLOT-B"){$slotb=trim($value);}
			If($key=="SLOT-C"){$slotc=trim($value);}
			If($key=="SLOT-D"){$slotd=trim($value);}
			If($key=="INVISIBLE"){$invisible=trim($value);}
	

			

		

			//if($namespace==$asset){$arr["gname"]=$title;}

			If($key=="IPFS"){$value=str_replace(array("/r/n", "/r", "/n"), "",$value);$ipfsr=trim($value);}

			

			
			array_push($totalass,$arr);

			}




	

//myspace

if($myspace!="")
				
			{
				$arr=array();
				$totalass=array();
				
		
				$myarr=explode("\n",$value);

				$mytime=count($myarr);

				while($mytime>-1)
					
				{
				
				

				if($mytime<>count($myarr)){$mysp=$myarr[$mytime];}



//short code to namespace
					
				$comm=$mysp;
					
				$blength=substr($comm , 0 , 1);
				$block=substr($comm , 1 , $blength);
				$btxn=$blength+1;
				$btx=substr($comm , $btxn);


				$blockhash= $kpc->getblockhash(intval($block));

				$blockdata= $kpc->getblock($blockhash);

				$txa=$blockdata['tx'][$btx];

				$transaction= $kpc->getrawtransaction($txa,1);

					foreach($transaction['vout'] as $vout)
	   
						  {

							$op_return = $vout["scriptPubKey"]["asm"]; 

				
							$arrs = explode(' ', $op_return); 

							if($arrs[0] == 'OP_KEVA_NAMESPACE') 
								{

								 $cona=$arrs[0];
								 $cons=$arrs[1];
								 $conk=$arrs[2];
								

								}
						  }
					if($mytime<>count($myarr)){
					$asset=Base58Check::encode( $cons, false , 0 , false);}

					
					$mytime=$mytime-1;

					$info= $kpc->keva_filter($asset,"",60000);

					$namespace=$kpc->keva_get($asset,"_KEVA_NS_");

					$title=$namespace['value'];


//array
					
					foreach($info as $x_value=>$x)

						{
			
						extract($x);

						If($key=="_KEVA_NS_"){continue;}

						

					

						$arr["heightx"]=$height;
						$arr["key"]=$key;
						$arr["adds"]=$address;
						$arr["value"]=bin2hex($value);
						$arr["txx"]=$txid;
						$arr["gnamespace"]=$asset;
						$arr["gnamex"]=$title;
						$arr["mysp"]=$comm;
						
			
						$gtime= $kpc->getrawtransaction($txid,1);

						$arr["gtime"]=$gtime["time"];


						If($key=="THEME"){$theme=trim(strip_tags($value));}

						If($key=="MP3"){$mp3=$value;}

						
						
			If($key=="IPFS"){$value=str_replace(array("/r/n", "/r", "/n"), "",$value);$ipfsr=trim($value);}
			
						

						array_push($totalass,$arr);

				
				
						}	

					//array over



					}

			}
			
//chipcheck

$pipboyslot=$rpc->listassetbalancesbyaddress($rvnadd);

if($pipboyslot["KEVA.APP/CHIP/IMAGE"]!="" & !$pipboyslot["KEVA.APP/CYBER/PIPBOY"]!=""){$slotn=$pipboyslot["KEVA.APP/CHIP/IMAGE"];}else{$slota="";$slotb="";$slotc="";$slotd="";}


//slota


if($slota!=""){
		
	
	


	if($pipboyslot[$slota]!="" & $slotn<>0)


			{

			$slotn=$slotn-1;
		
		$slotinfo = $rpc->getassetdata($slota);
			
					

			

					$slotimg="<img src=https://ravencoin.asset-explorer.net/ipfs/".$slotinfo["ipfs_hash"].">";

						$arrz["heightx"]="9999999";
						$arrz["key"]=$slota;
						$arrz["adds"]=$addrone;
						$arrz["value"]=bin2hex($slotimg);
						$arrz["txx"]=$txone;
						$arrz["gnamespace"]="";
						$arrz["gnamex"]=$title;
						$arrz["mysp"]=$comm;
						$arrz["gtime"]=time();

						if(!$knum){
						array_push($totalass,$arrz);}
						
						}
					
				}

			

//slotb


if($slotb!=""){
		




	if($pipboyslot[$slotb]!="" & $slotn<>0)


			{

			$slotn=$slotn-1;
		$slotinfo = $rpc->getassetdata($slotb);
			
					

			

					$slotimg="<img src=https://ravencoin.asset-explorer.net/ipfs/".$slotinfo["ipfs_hash"].">";

						$arrz["heightx"]="9999998";
						$arrz["key"]=$slotb;
						$arrz["adds"]=$addrone;
						$arrz["value"]=bin2hex($slotimg);
						$arrz["txx"]=$txone;
						$arrz["gnamespace"]="";
						$arrz["gnamex"]=$title;
						$arrz["mysp"]=$comm;
						$arrz["gtime"]=time();

						
						
								if(!$knum){
						array_push($totalass,$arrz);}
						
						}
					
				}

			


						arsort($totalass);
		

//namespace like


if(!$reward){
		$addinfo="<br><img src=/bludit/qr.php?v=".$addrone."><br><br>".$addrone;
		}
		else
			{
		$addinfo=$reward; if(strlen(trim($reward))==34){$addinfo="<br><img src=/bludit/qr.php?v=".$reward."><br><br>".$reward;}
		}

						$arrz["heightx"]="";
						$arrz["key"]="NAMESPACE ADDRESS";
						$arrz["adds"]=$addrone;
						$arrz["value"]=bin2hex($addinfo);
						$arrz["txx"]=$txone;
						$arrz["gnamespace"]="";
						$arrz["gnamex"]="REWARD ".$_REQ["scode"];
						$arrz["mysp"]=$comm;
						$arrz["gtime"]="1231006505";

						if(substr($reward,0,12)=="mimblewimble"){$a=1;}else{array_push($totalass,$arrz);}
						
						}


//slotc


if($slotc!=""){
		
	

	if($pipboyslot[$slotc]!="" & $slotn<>0)


			{

			$slotn=$slotn-1;
		$slotinfo = $rpc->getassetdata($slotc);
			
					

			

					$slotimg="<img src=https://ravencoin.asset-explorer.net/ipfs/".$slotinfo["ipfs_hash"].">";

						$arrz["heightx"]="";
						$arrz["key"]=$slotc;
						$arrz["adds"]=$addrone;
						$arrz["value"]=bin2hex($slotimg);
						$arrz["txx"]=$txone;
						$arrz["gnamespace"]="";
						$arrz["gnamex"]=$title;
						$arrz["mysp"]=$comm;
						$arrz["gtime"]=time();

						
						if(!$knum){
						array_push($totalass,$arrz);}
						
						}
					
				}


//slotd


if($slotd!=""){
	


	if($pipboyslot[$slotd]!="" & $slotn<>0)


			{

			$slotn=$slotn-1;
		
		$slotinfo = $rpc->getassetdata($slotd);
			
					

			

					$slotimg="<img src=https://ravencoin.asset-explorer.net/ipfs/".$slotinfo["ipfs_hash"].">";

						$arrz["heightx"]="";
						$arrz["key"]=$slotd;
						$arrz["adds"]=$addrone;
						$arrz["value"]=bin2hex($slotimg);
						$arrz["txx"]=$txone;
						$arrz["gnamespace"]="";
						$arrz["gnamex"]=$title;
						$arrz["mysp"]=$comm;
						$arrz["gtime"]=time();

						
						
							if(!$knum){
						array_push($totalass,$arrz);}
						
						}
					
				}


		
//unlock block

if($unlock=="1"){$unleft="LOAD ALL BLOCKS SUCCESS (".count($totalass)." CONTENTS TOTAL). TIME LEFT ".$unlockleft." BLOCKS ( ".($unlockleft*2)." Mins ) FOR ALL TO READ.";}else{
$unleft="LOAD 60000+".$poweradd." BLOCKS. If you want to load all block contents, you can send 1 keva to this node address, then click this button <button onClick=\"window.location.reload();\">Refresh Page</button>. You can also download kevacoin wallet free to load all.(<a href=https://apps.apple.com/us/app/kevacoin-wallet/id1515670405?ls=1>ios</a>/<a href=https://play.google.com/store/apps/details?id=org.kevacoin.kevawallet>android</a>/<a href=https://github.com/kevacoin-project/keva_wallet/releases>apk</a>)</a>";}

		$unlockinfo=$unleft."<br><br><img src=/bludit/qr.php?v=".$shopaddress."><br><br>".$shopaddress;

						$arrz["heightx"]="";
						$arrz["key"]="LOAD ALL BLOCK CONTENTS";
						$arrz["adds"]=$shopaddress;
						$arrz["value"]=bin2hex($unlockinfo);
						$arrz["txx"]="";
						$arrz["gnamespace"]="";
						$arrz["gnamex"]="KEVA.APP ";
						$arrz["mysp"]="";
						$arrz["gtime"]="1579143600";

						if(!$knum){
						array_push($totalass,$arrz);}



						
					
	












//ipfs

$arr2=array();
$totalass2=array();

echo "<script>window.onload=function(){var id = document.getElementById(\loading\");setTimeout(function(){document.body.removeChild(id)},1000);}</script>";
 

foreach ($totalass as $o=>$p) 

			{
			
			extract($p);

			//if(!$key){$key=$keyhex;}
			
			if($theme=="paper" or $theme=="book" or $_REQ["theme"]=="paper" or $_REQ["theme"]=="book"){$arr2["sort"]=$key;}

			if($key=="THEME"){continue;}

			$arr2["heightx"]=$heightx;
			$arr2["key"]=$key;
			$arr2["adds"]=$adds;
			$arr2["value"]=$value;
			$arr2["txx"]=$txx;
			$arr2["gnamespace"]=$gnamespace;
			$arr2["gnamex"]=$gnamex;
			$arr2["mysp"]=$mysp;
			$arr2["gtime"]=$gtime;

			//asset

			If($key=="ASSET")
				
			{
			
			if($rvnadd!=""){
				
				$giftassetx=$rpc->listassetbalancesbyaddress($rvnadd);

				$arr2["value"]="Ravencoin assets list.<br>" ;

				foreach($giftassetx as $giftx=>$giftnx)
					{
					
						$listinfo = $rpc->getassetdata($giftx);
			
	
		
						$kimg="<img width=20 src=https://ravencoin.asset-explorer.net/ipfs/".$listinfo["ipfs_hash"]." onerror=\"this.src='/bludit/no.jpg'\">";
						
						
					
					$arr2["value"]=$arr2["value"]."<br>".$kimg." ".$giftx." (".$giftnx.")";

					}
				$arr2["value"]=$arr2["value"]."<br><br><font size=2>".$rvnadd."</font>";

				$arr2["value"]=bin2hex($arr2["value"]);
			}else{$arr2["value"]="No ravencoin asset in this address";}

			}

			//ipfs

			$value=hex2bin($value);

			preg_match('/(?:\{)(.*)(?:\})/i',$value,$match);

			//rand

			if(!$ipfsr){

			$linkrand=rand(1,4);

			if($linkrand==1){$ipfsr="https://ipfs.jbb.one/ipfs/";$ipfsn="jbb.one";}
			if($linkrand==2){$ipfsr="https://ipfs.k1ic.com/ipfs/";$ipfsn="k1ic.com";}
			if($linkrand==3){$ipfsr="https://cloudflare-ipfs.com/ipfs/";$ipfsn="cloudflare-ipfs.com";}
			if($linkrand==4){$ipfsr="https://gateway.ravenland.org/ipfs/";$ipfsn="ravenland.org";}
			//if($linkrand==5){$ipfsr="https://ipfs.eternum.io/";$ipfsn="eternum.io";}
			//if($linkrand==6){$ipfsr="https://ipfs.globalupload.io/";$ipfsn="globalupload.io";}
			//if($linkrand==7){$ipfsr="https://ipfs.jbb.one/ipfs/";$ipfsn="jbb.one";}
			//if($linkrand==8){$ipfsr="https://ipfs.jbb.one/ipfs/";$ipfsn="jbb.one";}
			//if($linkrand==9){$ipfsr="https://ipfs.jbb.one/ipfs/";$ipfsn="jbb.one";}

						}

			
			if($match[0]<>"")
				
					{

//image

				if(stristr($match[0],"image") == true)

						{$ipfsarr=explode("|",$match[0]);

					$filetype=explode("/",$ipfsarr[1]);

					$typ=str_replace("}","",$filetype[1]);

					$ipfsadd=str_replace("{","",$ipfsarr[0]);

					$urla=$ipfsr.trim(substr($ipfsarr[0],2,46));
					$urlb=trim($ipfscon)."".trim(substr($ipfsarr[0],2,46));

					if($theme=="paper" or $_REQ["theme"]=="paper"){$ipfslk="<img src=\"".$urla."\" onerror=\"this.src='/bludit/loading.png'\">";}else{


					$ipfslk="<img src=\"".$urla."\" onerror=\"this.src='/bludit/loading.png'\"><br><font size=1>(The IPFS Gateway is ".$ipfsr.")<br>"."<a href=".$urlb." target=blank>".$ipfsadd."</a></font>";}
					

					$value=str_replace($match[0],$ipfslk,$value);

				

					$arr2["value"]=bin2hex($value);
					
						}
					


//video

					if(stristr($match[0],"video") == true)

						{
							
						$ipfsarr=explode("|",$match[0]);

						$filetype=explode("/",$ipfsarr[1]);

						$typ=str_replace("}","",$filetype[1]);

						$ipfsadd=str_replace("{","",$ipfsarr[0]);

						$urla=$ipfsr.trim(substr($ipfsarr[0],2,46));
						$urlb=trim($ipfscon)."".trim(substr($ipfsarr[0],2,46));

						$ipfslk="<video id=\"screenVideo\" width=\"100%\" autoplay loop controls src=\"".$urla."\" webkit-playsinline=\"true\" playsinline=\"true\" x-webkit-airplay=\"allow\" x5-video-player-type=\"h5\" x5-video-player-fullscreen=\"true\" x5-video-orientation=\"portraint\" style=\"object-fit:fill;\"></video><br><font size=1>(The IPFS Gateway is ".$ipfsr.")<br>"."<a href=".$urlb." target=blank>".$ipfsadd."</a></font>";
					

						$value=str_replace($match[0],$ipfslk,$value);

				

						$arr2["value"]=bin2hex($value);
					
						}
					}	

					array_push($totalass2,$arr2);
			}

//random

$listasset=$totalass2;

if($rand!=""){
	

$listasset=array();

$randn="";



for($rn=0;$rn<$rand;$rn=$rn+1){

$randn=rand(0,count($totalass2));

array_push($listasset,$totalass2[$randn]);

}
}


function hsv2rgb($H, $S, $V)
{
    // hack to get rid of unreadable pale yellow on white
    if ($H > 0.1 && $H < 0.7) {
        $V -= 0.15;
    }
    if ($S == 0) {
        $R = $G = $B = $V * 255;
    } else {
        $var_H = $H * 6;
        $var_i = floor($var_H);
        $var_1 = $V * (1 - $S);
        $var_2 = $V * (1 - $S * ($var_H - $var_i));
        $var_3 = $V * (1 - $S * (1 - ($var_H - $var_i)));
        if ($var_i == 0) {
            $var_R = $V;
            $var_G = $var_3;
            $var_B = $var_1;
        } else {
            if ($var_i == 1) {
                $var_R = $var_2;
                $var_G = $V;
                $var_B = $var_1;
            } else {
                if ($var_i == 2) {
                    $var_R = $var_1;
                    $var_G = $V;
                    $var_B = $var_3;
                } else {
                    if ($var_i == 3) {
                        $var_R = $var_1;
                        $var_G = $var_2;
                        $var_B = $V;
                    } else {
                        if ($var_i == 4) {
                            $var_R = $var_3;
                            $var_G = $var_1;
                            $var_B = $V;
                        } else {
                            $var_R = $V;
                            $var_G = $var_1;
                            $var_B = $var_2;
                        }
                    }
                }
            }
        }
        $R = $var_R * 255;
        $G = $var_G * 255;
        $B = $var_B * 255;
    }
    return array($R, $G, $B);
}
function letter_avatar($text)
    {
        $total = unpack('L', hash('adler32', $text, true))[1];
        $hue = $total % 360;
        list($r, $g, $b) = hsv2rgb($hue / 360, 0.3, 0.9);

        $bg = "rgb({$r},{$g},{$b})";
        $color = "#ffffff";
        $first = mb_strtoupper(mb_substr($text, 0, 1));
        $src = base64_encode('<svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="100" width="100"><rect fill="' . $bg . '" x="0" y="0" width="100" height="100"></rect><text x="50" y="50" font-size="50" text-copy="fast" fill="' . $color . '" text-anchor="middle" text-rights="admin" alignment-baseline="central">' . $first . '</text></svg>');
        $value = 'data:image/svg+xml;base64,' . $src;
        return $value;
    }


?>