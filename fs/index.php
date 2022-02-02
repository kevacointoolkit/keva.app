<?php
error_reporting(0);


$landns="NfyA9uESbodmZj6ZaQZgBAsF8TYkhdivQk";
$offerdata="Na7KxN5eFAvt1JUgks9LGmVHMq5sW2pm2F";
$playerdata="NgGWiqM3h8BjqPpwuhiUuiCbEs4ffcve6X";
$landholder="NQMjkXm8UgJmgRmTUSwr7kA2v6JzvFJD39";

$landnum=rand(1,5);
$landnum=1;
$landnum=strval($landnum);

$kpc = new Keva();
$_REQ = array_merge($_GET, $_POST);

$landholdercheck=$kpc->keva_get($landholder,$landnum);
$hadd=explode(',',$landholdercheck['value']);
$haddn=$hadd[0];
$haddx=$hadd[1];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="generator" content="Bludit">
<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- Dynamic title tag -->
	<title>KEVA.APP | GALAXY</title>

	<!-- Dynamic description tag -->
	<meta name="description" content="">

	<!-- Include Favicon -->
	<link rel="icon" href="https://keva.app/bludit/bl-themes/koh/img/favicon.png" type="image/png">

	<!-- Include CSS Bootstrap file from Bludit Core -->
<style>
html,
body,

.site_font {
  font-family: coda_regular, arial, helvetica, sans-serif;
}



html, body {
  background-color: #0b0c0d;
  color: #fff;
  font-size: 15px;
  margin: 0 auto -100px;
  padding: 0;

}

.textarea-inherit {
    width: 90%;
    overflow: auto;
    word-break: break-all;
}

::-webkit-scrollbar { width: 0 !important }



a:link,
a:visited,
a:active{
 transition:0.5s;
color: #28f428;	
  text-decoration: none;
}

a:hover { color:yellow; }

input[type="text"],
input[type="submit"] {
  font-size: 18px;
}



input[type="text"],
input[type="submit"] {
  border: 1px solid #59fbea;
  font-family: coda_regular, arial, helvetica, sans-serif;
  -webkit-appearance: none;
  -webkit-border-radius: 0;
  height:42px;
 

}

input[type="text"] {
  background-color: rgb(11, 12, 13);
  color: #ddd;

 width:50%;
 padding-left:5px;

}

input[type="submit"] {
  background-color: rgb(0, 79, 74);
  color: #59fbea;
  padding: 5px 22px;
  margin-left:3px;
  height:45px;
    
}

div{margin:1px;border:0;padding:0;}

#door {

margin-top:0px;
  
font-size: 15px;
  

}

#newworld{

margin-top:100px;
  
  font-size: 15px;
  

}





#tech {

  


text-align: left;
vertical-align:middle;

  border: 0px solid #59fbea;
  font-family: coda_regular, arial, helvetica, sans-serif;
  -webkit-appearance: none;
  -webkit-border-radius: 0;
  font-size:24px;

width:98%;

 
  
}




.crt {
  animation: textShadow 0.00s infinite;
}

            #nav
            {
                /*width: 80%;*/
                margin: 0 auto;
			
                border: 0px solid #59fbea;
            }
            ul,li 
            {
                margin: 0px;
                padding: 0px;
                list-style: none;
            }
            ul 
            {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;


            }



@keyframes fadeIn {
  0% {
    top:5%;
  }
  100% {
    top: 100%;
  }
}

            li
            {
                border: 1px solid #59fbea;
                width: 700px;
				height:100px;
				word-break: break-all;
			background-color: rgb(0, 79, 74);
                text-align: center;
                margin-top: 10px;
                margin-bottom: 7px;
				margin-right: 5px;
				margin-left: 1px;
				padding-top:10px;
				padding-left:2px;
				padding-right:2px;
                flex:auto;  
				

            }
			p
			{
			margin-left: 5px;
			}
#universe {

line-height:26px;
ont-weight:100px;
font-size: 22px;
position: absolute;
  
}

p
{

color:#ccc;
margin-top:2px;

}

table {
color:#999;
  table-layout: fixed;
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #999;
}
tr td{color:#999;border: 1px solid #ccc;}

</style>


	<body style="color:#ccc;">
	
<?php



//land


			
$arr=array();
	
$totalass=array();



$info= $kpc->keva_filter($landns,"",0);

	foreach($info as $x_value=>$x)

			{
			
			extract($x);

			if(stristr($key,"KEVA_NS_")==true){continue;}

			$arr["height"]=$height;
			$arr["key"]=$key;
			$arr["keyb"]=bin2hex($key);
			$arr["value"]=bin2hex($value);
			$arr["txid"]=$txid;

		array_push($totalass,$arr);
	
}

asort($totalass);

echo "<div id=\"universe\" class=\"crt\"><div id=\"nav\">";
		echo "<ul>";

foreach ($totalass as $o=>$p) 

			{
			
			extract($p);

$landholdern=$kpc->keva_get($landholder,$key);

if($landholdern!=""){

$haddshow=explode(',',$landholdern['value']);}else{$haddshow="";}
			

if($landnum==$key){

echo "<ul><li style=\"animation: textShadow 1.00s infinite;box-shadow:0px 0px 20px 1px #ffff00,0px 0px 10px 1px #ffff00 inset;background-color: #222222;display:block;height:250px;width:125px;line-height:10px;font-size:24px;padding-top:10px;padding-left:10px;padding-right:10px;letter-spacing:1px;word-break: normal;\"><p style=\"font-size:48px;center;padding-top:20px;line-height:0px;\">&#127968;<p style=\"font-size:20px;center;padding-top:5px;line-height:0px;\">".$haddshow[0]."</p><hr><span style=\"letter-spacing:2.2px;padding-left:4px;font-size:16px;font-weight:bold;\">LISBON</span></p><p><span style=\"border:1px solid #ffff00;padding:10px;line-height:20px;box-shadow:0px 0px 5px 1px #ffff00,0px 0px 5px 1px #ffff00 inset;font-weight:bold;\"\"> ".$key." </span></p><p  style=\"letter-spacing:2.2px;padding-top:5px;font-size:24px;line-height:24px;text-align:right;\">".hex2bin($value)."<br>".(hex2bin($value)/10)."</p></li></ul>";

}else{

echo "<ul><li style=\"animation: textShadow 1.00s infinite;box-shadow:0px 0px 20px 1px #59fbea,0px 0px 10px 1px #59fbea inset;background-color: #222222;display:block;height:250px;width:125px;line-height:10px;font-size:24px;padding-top:10px;padding-left:10px;padding-right:10px;letter-spacing:1px;word-break: normal;\"><p style=\"font-size:48px;center;padding-top:20px;line-height:0px;\">&#127968;<p style=\"font-size:20px;center;padding-top:5px;line-height:0px;\">".$haddshow[0]."</p><hr><span style=\"letter-spacing:2.2px;padding-left:4px;font-size:16px;font-weight:bold;\">LISBON</span></p><p><span style=\"border:1px solid #59fbea;padding:10px;line-height:20px;box-shadow:0px 0px 5px 1px #59fbea,0px 0px 5px 1px #59fbea inset;font-weight:bold;\"\"> ".$key." </span></p><p  style=\"letter-spacing:2.2px;padding-top:5px;font-size:24px;line-height:24px;text-align:right;\">".hex2bin($value)."<br>".(hex2bin($value)/10)."</p></li></ul>";}
			
			}

		echo "</div>";


//check data

echo "<div id=\"nav\">";

$chk=1;

if(!$_FILES['images']){$chk="";}

$deal=0;

//check np

$xchadd=$_REQ["xch"];

if($chk!="" & $_REQ["xch"]!="") 
	
	
	{

		

//creat new to blockchain

$name=0;

foreach($_FILES['images']['tmp_name'] as $x)

{
if(!$x){continue;}
$fk=$_FILES['images']['name'][$name];

$fv=file_get_contents($x);

//check record

$fvc=substr($fv,-30);



$checkfile= $kpc->keva_get($offerdata,$fvc);

if(!$checkfile['value']){

//check data

$pdata=array('offer' => $fv);

$postfields="get_offer_summary";



$url="https://localhost/".$postfields;



            $postData = json_encode($pdata);
            
            
        
       
						$ch = curl_init();
						$params[CURLOPT_URL] = $url;   
						$params[CURLOPT_HEADER] = false; 
						$params[CURLOPT_RETURNTRANSFER] = true; 
						$params[CURLOPT_FOLLOWLOCATION] = true; 
						$params[CURLOPT_POST] = true;
						$params[CURLOPT_PORT] = 9257;
						$params[CURLOPT_POSTFIELDS] = $postData;
						$params[CURLOPT_SSL_VERIFYPEER] = false;
						$params[CURLOPT_SSL_VERIFYHOST] = false;

						$params[CURLOPT_SSLCERTTYPE] = 'PEM';
						$params[CURLOPT_SSLCERT] = 'pcrt.pem';
						$params[CURLOPT_SSLKEYTYPE] = 'PEM';
						$params[CURLOPT_SSLKEY] = 'pkey.pem';


     curl_setopt_array($ch, $params); 
     $content = curl_exec($ch); 
	$output = curl_getinfo($ch);
     curl_close($ch);



//echo $content;


$total=json_decode($content, true);


foreach ($total as $k=>$v) {  
 
 foreach($v as $a=>$b){  
	
	

	 if($a=="offered"){

	  foreach($b as $c=>$d){  
	
	$offerc=$c; 
	$offern=$d; }
							}

	 	 if($a=="requested"){

	  foreach($b as $f=>$g){  
	
	$reqc=$f; 
	$reqn=$g; }
							 }

	 
			}  
		}  


$offerint=intval($offern);



if($offerc=="xch" & $offerint>9999999999 & $reqc=="78ad32a8c9ea70f27d73e9306fc467bab2a6b15b30289791e37ab6e8612212b1" & $reqn=="1000"){

$pdata=array('offer' => $fv);

$postfields="take_offer";



$url="https://localhost/".$postfields;



            $postData = json_encode($pdata);
            
            
        
       
						$ch = curl_init();
						$params[CURLOPT_URL] = $url;   
						$params[CURLOPT_HEADER] = false; 
						$params[CURLOPT_RETURNTRANSFER] = true; 
						$params[CURLOPT_FOLLOWLOCATION] = true; 
						$params[CURLOPT_POST] = true;
						$params[CURLOPT_PORT] = 9257;
						$params[CURLOPT_POSTFIELDS] = $postData;
						$params[CURLOPT_SSL_VERIFYPEER] = false;
						$params[CURLOPT_SSL_VERIFYHOST] = false;

						$params[CURLOPT_SSLCERTTYPE] = 'PEM';
						$params[CURLOPT_SSLCERT] = 'pcrt.pem';
						$params[CURLOPT_SSLKEYTYPE] = 'PEM';
						$params[CURLOPT_SSLKEY] = 'pkey.pem';


     curl_setopt_array($ch, $params); 
     $content = curl_exec($ch); 
	$output = curl_getinfo($ch);
     curl_close($ch);





$total=json_decode($content, true);

if($total['success']=="1"){echo "offer accepted.";

$offerint=$offerint;

$saveoffer=$xchadd.",".$offerint;

$offerint=strval($offerint);

$putfile= $kpc->keva_put($offerdata,$fvc,$saveoffer);

$playerfile= $kpc->keva_put($playerdata,$xchadd,$offerint);

$deal=1;

}else{echo $total['error'];}

}else{

echo "Offer error, the offer must xch>0.01 level=1";

 }

}else{echo "The offer already uploaded";}
$status=unlink($x);

$name=$name+1;


}




if($deal==1){


		$age=$kpc->keva_list_namespaces();

		$goodname="";

		foreach($age as $z_value=>$z)
		{

		extract($z);

		if(stristr($displayName,"PLAYER️")==true){

			$goodname=$namespaceId;
					
			break;
			
			}

		}
	
		if(!$goodname){

										$age=$kpc->keva_namespace("FORTUNE PLAYER️");
										$age=$kpc->keva_namespace("FORTUNE PLAYER️");
										//$age=$kpc->keva_namespace("FORTUNE PLAYER️");
										//$age=$kpc->keva_namespace("FORTUNE PLAYER️");
										//$age=$kpc->keva_namespace("FORTUNE PLAYER️");
										//$age=$kpc->keva_namespace("FORTUNE PLAYER️");
										//$age=$kpc->keva_namespace("FORTUNE PLAYER️");
										//$age=$kpc->keva_namespace("FORTUNE PLAYER️");
										
										$goodname=$age['namespaceId'];
										
										}





//getnum




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


$bigstep=$xchadd;



$landcheck= $kpc->keva_get($landholder,$landnum);

//buy land

if(strlen($landcheck['value'])==1){

$holderkeva=$sn.",".$goodname;

$putholder=$kpc->keva_put($landholder,$landnum,$holderkeva);




$kva=$_REQ["kva"];


if(strlen($kva)==34){
	
		

		$agex=$kpc->keva_put($goodname,"CHIA",$bigstep); 

		//$agex=$kpc->keva_put($goodname,"CHIA",$bigstep,$kva); 



			}
		else
		{

		$kva="VM5qjGq8rSRJnsk6UMbF4nb61NDejQJ3u3";

		$agex=$kpc->keva_put($goodname,"CHIA",$bigstep);
		
		//$agex=$kpc->keva_put($goodname,"Congratulations",$bigstep,$kva); 

		

		 }

	echo "You got land ".$landnum;

		}else{
		
		
//pay shop

$playcoinget=$kpc->keva_get($playerdata,$xchadd);

$coinleft=$playcoinget['value'];

$coinleft=intval($coinleft);

$landpaycheck=$kpc->keva_get($landns,$landnum);

$landpay=$landpaycheck['value'];

$landpay=intval($landpay);

$coinsum=$coinleft-$landpay/10;

//refund

$pdata=array('wallet_id' => "1",'amount' => 1,'address' => 0,'fee' => 0);

					
					$pdata['address']=$xchadd;
					$pdata['amount']=$coinsum;

					$postfields="send_transaction";

					$url="https://localhost/".$postfields;



					 $postData = json_encode($pdata);
            
            
        
       
							$ch = curl_init();
						$params[CURLOPT_URL] = $url;   
						$params[CURLOPT_HEADER] = false; 
						$params[CURLOPT_RETURNTRANSFER] = true; 
						$params[CURLOPT_FOLLOWLOCATION] = true; 
						$params[CURLOPT_POST] = true;
						$params[CURLOPT_PORT] = 9257;
						$params[CURLOPT_POSTFIELDS] = $postData;
						$params[CURLOPT_SSL_VERIFYPEER] = false;
						 $params[CURLOPT_SSL_VERIFYHOST] = false;

							$params[CURLOPT_SSLCERTTYPE] = 'PEM';
							$params[CURLOPT_SSLCERT] = 'pcrt.pem';
						$params[CURLOPT_SSLKEYTYPE] = 'PEM';
						$params[CURLOPT_SSLKEY] = 'pkey.pem';


     curl_setopt_array($ch, $params); 
     $content = curl_exec($ch); 
	$output = curl_getinfo($ch);
     curl_close($ch);


$total=json_decode($content, true);



if(!$total['transaction_id']){print_r(json_decode($content, true));}else{

echo "Your number is ".$landnum;}

//send fee



$haddrcheck=$kpc->keva_get($haddx,"CHIA");


$pdata['address']=$haddrcheck['value'];

$landpayo=$coinleft-$coinsum;


					$pdata['amount']=$landpayo;

					$postfields="send_transaction";

					$url="https://localhost/".$postfields;



					 $postData = json_encode($pdata);
            
            
        
       
							$ch = curl_init();
						$params[CURLOPT_URL] = $url;   
						$params[CURLOPT_HEADER] = false; 
						$params[CURLOPT_RETURNTRANSFER] = true; 
						$params[CURLOPT_FOLLOWLOCATION] = true; 
						$params[CURLOPT_POST] = true;
						$params[CURLOPT_PORT] = 9257;
						$params[CURLOPT_POSTFIELDS] = $postData;
						$params[CURLOPT_SSL_VERIFYPEER] = false;
						 $params[CURLOPT_SSL_VERIFYHOST] = false;

							$params[CURLOPT_SSLCERTTYPE] = 'PEM';
							$params[CURLOPT_SSLCERT] = 'pcrt.pem';
						$params[CURLOPT_SSLKEYTYPE] = 'PEM';
						$params[CURLOPT_SSLKEY] = 'pkey.pem';


     curl_setopt_array($ch, $params); 
     $content = curl_exec($ch); 
	$output = curl_getinfo($ch);
     curl_close($ch);


$total=json_decode($content, true);



if(!$total['transaction_id']){print_r(json_decode($content, true));}else{

echo " Pay ".$landpayo." to the shop ".$hadd[0];

			}



		}
	
	}

	}




	//upload

	$max_no_img=1; 




			echo "<br><form name=form1 action=\"\" method=\"post\" enctype=\"multipart/form-data\"  onSubmit=\"return closebut()\">";	

			for($i=1; $i<=$max_no_img; $i++){

					echo "<center><input type=file name=\"images[]\" class=\"textarea-inherit\"  style=\"width:50%;border: 1px solid #59fbea;font-family: coda_regular, arial, helvetica, sans-serif;-webkit-appearance: none;-webkit-border-radius:0;height:48px;font-size: 24px; background-color: rgb(11, 12, 13);color: #ddd;padding-left:10px;padding-top:2px;margin-top:10px;\"   placeholder=\"aa12\" accept=\".offer\"  title=\"OFFER FILE ".$i."\"><br>";

			}

			

			echo "<center><input type=\"text\" name=\"xch\" id=\"editor\" class=\"textarea-inherit\"  style=\"width:50%;border: 1px solid #59fbea;font-family: coda_regular, arial, helvetica, sans-serif;-webkit-appearance: none;-webkit-border-radius:0;height:48px;font-size: 24px; background-color: rgb(11, 12, 13);color: #ddd;padding-left:10px;padding-top:2px;margin-top:10px;\" value=\"\" maxlength=62 placeholder=\"CHIA ADDRESS\"><br>";

			echo "<input type=\"text\" name=\"kva\" id=\"editor\" class=\"textarea-inherit\"  style=\"width:50%;border: 1px solid #59fbea;font-family: coda_regular, arial, helvetica, sans-serif;-webkit-appearance: none;-webkit-border-radius:0;height:48px;font-size: 24px; background-color: rgb(11, 12, 13);color: #ddd;padding-left:10px;padding-top:2px;margin-top:10px;\" value=\"\" maxlength=34 placeholder=\"KEVA ADDRESS IF YOU HAVE\"></center><br>";



echo "<br><center><input type=\"submit\" id=\"btn\" value=\"GO CAT\" style=\"border: 1px solid #59fbea;-webkit-appearance:none ;-webkit-border-radius: 0;border-radius:0;border: 1px solid #59fbea;webkit-appearance: none;-webkit-border-radius: 0;height:42px;background-color: rgb(0, 79, 74);color: #59fbea;height:36px;margin-left:20px;width:200px;font-size: 20px;padding-top:3px;\"></center></li></ul></div>";


		
			
			echo "</form>";






//menu

echo "<br><br>";

echo "This is free chia offer shop generator for everyone. Upload 1-8 offer, you will get a code like <a href=https://keva.app?64858866><font color=\"8CEA00\">64858866</font></a> and you can input the code on keva.app or open <a href=https://keva.app?64858866><font color=\"8CEA00\">keva.app?64858866</font></a> to see all your offer.<br><br>";

echo "All the datas are on the <a href=https://kevacoin.org/><font color=\"8CEA00\">kevacoin</font></a> blockchain. The code is read-only. If you have <a href=https://kevacoin.org/><font color=\"8CEA00\">kevacoin  wallet</font></a>, you can follow you shop number and repost the offer to your own space.<br><br>";

echo "<br><br><a href=https://KEVA.APP>KEVA.APP</a>";

	echo "</div>";

 class Keva {

    private $proto;

    private $url;
    private $CACertificate;

    public $status;
    public $error;
    public $raw_response;
    public $response;

    private $id = 0;

    public function __construct($url = null) {
		
        $this->username      = 'galaxy'; // RPC Username
        $this->password      = 'frontier'; // RPC Password
		$this->host          = '127.0.0.1'; // Localhost
        $this->port          = '9992';
        $this->url           = $url;

        $this->proto         = 'http';
        $this->CACertificate = null;
    }

    public function setSSL($certificate = null) {
        $this->proto         = 'https';
        $this->CACertificate = $certificate;
    }

    public function __call($method, $params) {
        $this->status       = null;
        $this->error        = null;
        $this->raw_response = null;
        $this->response     = null;

        $params = array_values($params);

        $this->id++;

        $request = json_encode(array(
            'method' => $method,
            'params' => $params,
            'id'     => $this->id
        ));

        $curl    = curl_init("{$this->proto}://{$this->host}:{$this->port}/{$this->url}");
        $options = array(
            CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
            CURLOPT_USERPWD        => $this->username . ':' . $this->password,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_HTTPHEADER     => array('Content-type: text/plain'),
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $request
        );

        if (ini_get('open_basedir')) {
            unset($options[CURLOPT_FOLLOWLOCATION]);
        }

        if ($this->proto == 'https') {
            if (!empty($this->CACertificate)) {
                $options[CURLOPT_CAINFO] = $this->CACertificate;
                $options[CURLOPT_CAPATH] = DIRNAME($this->CACertificate);
            } else {
                $options[CURLOPT_SSL_VERIFYPEER] = false;
            }
        }

        curl_setopt_array($curl, $options);

        $this->raw_response = curl_exec($curl);
        $this->response     = json_decode($this->raw_response, true);

        $this->status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $curl_error = curl_error($curl);

        curl_close($curl);

        if (!empty($curl_error)) {
            $this->error = $curl_error;
        }

        if ($this->response['error']) {
            $this->error = $this->response['error']['message'];
        } elseif ($this->status != 200) {
            switch ($this->status) {
                case 400:
                    $this->error = 'HTTP_BAD_REQUEST';
                    break;
                case 401:
                    $this->error = 'HTTP_UNAUTHORIZED';
                    break;
                case 403:
                    $this->error = 'HTTP_FORBIDDEN';
                    break;
                case 404:
                    $this->error = 'HTTP_NOT_FOUND';
                    break;
            }
        }

        if ($this->error) {
			return false;
        }

        return $this->response['result'];
    }
}



//check58

class Hash
{
    public static function SHA256(string $data, $raw = true): string
    {
        return hash('sha256', $data, $raw);
    }

    public static function sha256d(string $data): string
    {
        return hash('sha256', hash('sha256', $data, true), true);
    }

    public static function RIPEMD160(string $data, $raw = true): string
    {
        return hash('ripemd160', $data, $raw);
    }
}

class Base58
{
    const AVAILABLE_CHARS = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';

    public static function encode($num, $length = 58): string
    {
        return Crypto::dec2base($num, $length, self::AVAILABLE_CHARS);
    }

    public static function decode(string $addr, int $length = 58): string
    {
        return Crypto::base2dec($addr, $length, self::AVAILABLE_CHARS);
    }
}

/**
 * @codeCoverageIgnore
 */
class Base58Check
{
    /**
     * Encode Base58Check
     *
     * @param string $string
     * @param int $prefix
     * @param bool $compressed
     * @return string
     */
    public static function encode(string $string, int $prefix = 128, bool $compressed = true)
    {
        $string = hex2bin($string);

        if ($prefix) {
            $string = chr($prefix) . $string;
        }

        if ($compressed) {
            $string .= chr(0x01);
        }

        $string = $string . substr(Hash::SHA256(Hash::SHA256($string)), 0, 4);

        $base58 = Base58::encode(Crypto::bin2bc($string));
        for ($i = 0; $i < strlen($string); $i++) {
            if ($string[$i] != "\x00") {
                break;
            }

            $base58 = '1' . $base58;
        }
        return $base58;
    }

    /**
     * Decoding from Base58Check
     *
     * @param string $string
     * @param int $removeLeadingBytes
     * @param int $removeTrailingBytes
     * @param bool $removeCompression
     * @return bool|string
     */
    public static function decode(string $string, int $removeLeadingBytes = 1, int $removeTrailingBytes = 4, bool $removeCompression = true)
    {
        $string = bin2hex(Crypto::bc2bin(Base58::decode($string)));

        //If end bytes: Network type
        if ($removeLeadingBytes) {
            $string = substr($string, $removeLeadingBytes * 2);
        }

        //If the final bytes: Checksum
        if ($removeTrailingBytes) {
            $string = substr($string, 0, -($removeTrailingBytes * 2));
        }

        //If end bytes: compressed byte
        if ($removeCompression) {
            $string = substr($string, 0, -2);
        }

        return $string;
    }
}


/**
 * @codeCoverageIgnore
 */
class Crypto
{
    public static function bc2bin($num)
    {
        return self::dec2base($num, 256);
    }

    public static function dec2base($dec, $base, $digits = false)
    {
        if ($base < 2 || $base > 256) {
            die("Invalid Base: " . $base);
        }

        bcscale(0);
        $value = "";

        if (!$digits) {
            $digits = self::digits($base);
        }

        while ($dec > $base - 1) {
            $rest = bcmod($dec, $base);
            $dec = bcdiv($dec, $base);
            $value = $digits[$rest] . $value;
        }
        $value = $digits[intval($dec)] . $value;

        return (string)$value;
    }

    public static function base2dec($value, $base, $digits = false)
    {
        if ($base < 2 || $base > 256) {
            die("Invalid Base: " . $base);
        }

        bcscale(0);

        if ($base < 37) {
            $value = strtolower($value);
        }
        if (!$digits) {
            $digits = self::digits($base);
        }

        $size = strlen($value);
        $dec = "0";

        for ($loop = 0; $loop < $size; $loop++) {
            $element = strpos($digits, $value[$loop]);
            $power = bcpow($base, $size - $loop - 1);
            $dec = bcadd($dec, bcmul($element, $power));
        }

        return (string)$dec;
    }

    public static function digits($base)
    {
        if ($base > 64) {
            $digits = "";
            for ($loop = 0; $loop < 256; $loop++) {
                $digits .= chr($loop);
            }
        } else {
            $digits = "0123456789abcdefghijklmnopqrstuvwxyz";
            $digits .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ-_";
        }
        $digits = substr($digits, 0, $base);

        return (string)$digits;
    }

    public static function bin2bc($num)
    {
        return self::base2dec($num, 256);
    }
}

 function getBase58CheckAddress($addressBin){
            $hash0 = Hash::SHA256($addressBin);
            $hash1 = Hash::SHA256($hash0);
            $checksum = substr($hash1, 0, 4);
            $checksum = $addressBin . $checksum;
            $result = Base58::encode(Crypto::bin2bc($checksum));

            return $result;
        }


?>

<br>
<script type="text/javascript"> 
var wait=60; 

 function sendform () 
      {
         
              document.form1.submit();
         
      }


function time(o) { 
if (wait == 0) { 
o.removeAttribute("disabled"); 
o.value="GO CAT"; 
wait = 600; 
} else { 
o.setAttribute("disabled", true); 
o.value=wait+"s"; 
wait--; 
setTimeout(function() { 
time(o) 
}, 
1000) 
} 
} 
document.getElementById("btn").onclick=function(){sendform(time(this));} 
</script> 
</body>