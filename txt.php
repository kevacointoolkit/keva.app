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

$_REQ = array_merge($_GET, $_POST);

//rpc

		$arr=array();
		$arra=array();
		$totalass=array();
		$combine="";

	$asset=$_REQ["asset"];


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

		
		
			
		
		$error = $kpc->error;

			if($error != "") 
		
					{
	
					echo "<p>&nbsp;&nbsp;Error list</p>";
					exit;
					}

		$namespace=$kpc->keva_get($asset,"_KEVA_NS_");

					$txtfile=$namespace['value'];

		$arr=array();
		
		foreach($info as $x_value=>$x)

			{
			
			extract($x);

			$arr["heightx"]=$height;
			$arr["key"]=$key;
			$arr["value"]=$value;

			array_push($totalass,$arr);

			}

arsort($totalass);
	


		foreach($totalass as $m=>$n)

			{
			
			extract($n);

			

			$txtfile=$txtfile."<br><br># ".$key."<br><br>".strip_tags($value);

			

			}


$txtfile=str_replace("<br>","\r\n",$txtfile);



header( "Content-Type: application/octet-stream" );
    $ua = $_SERVER["HTTP_USER_AGENT"];
    $filename = $_REQ["scode"].".txt";
    
	
   $encoded_filename  = urlencode( $filename );
     $encoded_filename  =  str_replace ( "+" ,  "%20" ,  $encoded_filename );
       
     if  (preg_match( "/MSIE/" ,  $_SERVER [ 'HTTP_USER_AGENT' ]) ) {
         header( 'Content-Disposition:  attachment; filename="'  .  $encoded_filename  .  '"' );
     }  elseif  (preg_match( "/Firefox/" ,  $_SERVER [ 'HTTP_USER_AGENT' ])) {
        // header('Content-Disposition: attachment; filename*="utf8' .  $filename . '"');
         header( 'Content-Disposition: attachment; filename*="'  .   $filename  .  '"' );
     }  else  {
         header( 'Content-Disposition: attachment; filename="'  .   $filename  .  '"' );
     }



echo $txtfile;




?>



