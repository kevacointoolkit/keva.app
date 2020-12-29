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
		$totalass=array();
			$combine="";


if(isset($_REQ["asset"])){$asset=$_REQ["asset"];}





if(!$_REQ["asset"]){$asset="NdwmTDJw1GRnLzz3CARsp3tX878pogZqLS";}


$blocknum=trim(str_replace("k","",$asset));

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


							$arr["heightx"]=$blockhash["height"];
							$arr["key"]=hex2bin($arrx[2]);
		
							$arr["value"]=$arrx[3];
			
							
							

							$arr["gtime"]=$transaction["time"];

			$cons=$arrx[1];
				
				
					$asset=Base58Check::encode( $cons, false , 0 , false);
					$arr["gnamespace"]=$asset;

					
					$info= $kpc->keva_filter($asset,"",60000);

					$namespace=$kpc->keva_get($asset,"_KEVA_NS_");

					$title=$namespace['value'];

					$arr["gnamex"]=$title;

					array_push($totalass,$arr);
				
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

		 $info= $kpc->keva_filter($asset,"",60000);}else{$info= $kpc->keva_filter($asset,"",60000000);}
		 
		 
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

		
			
		
		$error = $kpc->error;

			if($error != "") 
		
					{
	
					echo "<p>&nbsp;&nbsp;Error list</p>";
					exit;
					}

		

		$pin="";

		$theme="";

		foreach($info as $x_value=>$x)

			{
			
			extract($x);

			If($key=="_KEVA_NS_"){$title=$value;continue;}
			If($key=="ID"){$title=$value;}
			//reward

			If($key=="REWARD"){$reward=$value;}

			if(substr($value,0,12)=="mimblewimble"){continue;}

			$arr["heightx"]=$height;
			$arr["key"]=$key;
			$arr["value"]=bin2hex($value);
			$arr["txx"]=$txid;
			$arr["gnamespace"]=$asset;
			$arr["gnamex"]=$title;

			
			$gtime= $kpc->getrawtransaction($txid,1);

			$arr["gtime"]=$gtime["time"];


			$arr["adds"]=$addrone;
		
			
			

			If($key=="MYSPACE"){$myspace=$value;break;}

			

			//pin

			If($key=="PIN"){$pin=$value;}
			If($key=="THEME"){$theme=trim(strip_tags($value));}
			If($key=="MP3"){$mp3=$value;}
			If($key=="RANDOM"){$rand=$value;}

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

		
//unlock block

if($unlock=="1"){$unleft="LOAD ALL BLOCKS SUCCESS, TIME LEFT ".$unlockleft." BLOCKS ( ".($unlockleft*2)." Mins )";}else{$unleft="If you want to load all block contents, you can send 1 keva to this address, or download kevacoin wallet (ios/android/<a href=https://github.com/kevacoin-project/keva_wallet/releases>apk</a>)</a>";}

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

						array_push($totalass,$arrz);
						
					
	
	








//ipfs

$arr2=array();
$totalass2=array();

foreach ($totalass as $o=>$p) 

			{
			
			extract($p);

			$arr2["heightx"]=$heightx;
			$arr2["key"]=$key;
			$arr2["adds"]=$adds;
			$arr2["value"]=$value;
			$arr2["txx"]=$txx;
			$arr2["gnamespace"]=$gnamespace;
			$arr2["gnamex"]=$gnamex;
			$arr2["mysp"]=$mysp;
			$arr2["gtime"]=$gtime;

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

					$ipfslk="<img src=\"".$urla."\" onerror=\"this.src='/bludit/loading.png'\"><br>(<font size=2>The IPFS Gateway is ".$ipfsr.")<br>"."<a href=".$urlb." target=blank>".$ipfsadd."</a>";
					

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

						$ipfslk="<video id=\"screenVideo\" width=\"100%\" autoplay loop controls src=\"".$urla."\" webkit-playsinline=\"true\" playsinline=\"true\" x-webkit-airplay=\"allow\" x5-video-player-type=\"h5\" x5-video-player-fullscreen=\"true\" x5-video-orientation=\"portraint\" style=\"object-fit:fill;\"></video><br>(<font size=2>The IPFS Gateway is ".$ipfsr.")<br>"."<a href=".$urlb." target=blank>".$ipfsadd."</a>";
					

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
