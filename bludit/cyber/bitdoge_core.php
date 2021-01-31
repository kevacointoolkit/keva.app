<?php

if(is_numeric($bitdoge)==true)
			
		{

$comm=$bitdoge;

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
				
			$assetadd=Base58Check::encode( $cons, false , 0 , false);

			$uname=$kpc->keva_get($assetadd,"_KEVA_NS_");
		}


 echo $uname['value'];?>":function(){window.open("<?php 



echo "/bludit/?asset=".$assetadd; ?>")},"KEVA APK":function(){window.open("https://github.com/kevacoin-project/keva_wallet/releases")}},"ASSISTANT":{<?php

	foreach($giftasset as $gift=>$giftn)

			{

			if(stristr($gift,"KEVA.APP") == true)
				
			
				{
					
										
					$gift=str_replace("KEVA.APP/CYBER/","",$gift);

					echo "\"".$gift."\":function(){window.open(\"/bludit/?".$_SERVER['QUERY_STRING']."&assistant=".$gift."\")},";
				
				
				}


			}






?>},"HIDE":function(){this.hide()}},<?php



		
		if(is_numeric($bitdoge)==true)
			
		{


		
			$ukey=$kpc->keva_get($assetadd,"SYSWORDS");

			

			$uinfo= $kpc->keva_filter($assetadd,"",720);

			//syswords

			if(!$ukey['value']){
				
				//no update

				if(count($uinfo)<1)

									{
				
										$syswords="syswords:[\"Wow, there are nothing new about ".$uname['value']." today.\"],";
									}
				//update
									else

									{

										$syswords="syswords:[\"Wow, there are something new about  ".$uname['value']." today.\"],";

									}

								}
								else

								{
				
			$syswords="syswords:[".$ukey['value']."],";

								}

			echo $syswords;

			//words

			//check np

			if(count($uinfo)<1){$uinfo= $kpc->keva_filter($assetadd,"",21000);}

			//check np again
			
			if(count($uinfo)<1){$uword=$kpc->keva_get($assetadd,"WORDS");
			
			
			if(!$uword['value']){$words="words:[\"".$uname['value']." completely decentralized.\"]";echo $words;}
								else
								{
									
								$words="words:[".$uword['value']."]";

								echo $words;

								}
							}
			

						//check u words

			

			
			if(count($uinfo)>0)

				{

				$uuwords="";

				echo "words:[";
				
				foreach($uinfo as $u_value=>$u)

						{
				
			extract($u);

			If($key=="_KEVA_NS_"){continue;}

			If($key=="SYSWORDS" or $key=="BITDOGE"){continue;}
			
			
			if(substr($value,0,12)=="mimblewimble"){continue;}

			$key=strip_tags($key);

			$gtime= $kpc->getrawtransaction($txid,1);

			$utime=$gtime["time"];

			
			$key="\"".$key."\",";

			echo $key;

						}

				echo "]";
				}


            

			//words test

			//$words="words:[\"".count($uinfo)."\"]";

			//echo $words;

		
		
		
		}
		else{echo $bitdoge;}

?>