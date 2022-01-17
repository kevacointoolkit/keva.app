<?php
error_reporting(0);
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
	<link rel="stylesheet" type="text/css" href="https://keva.app/bludit/bl-kernel/css/bootstrap.min.css?version=3.12.0">

	<!-- Include CSS Styles from this theme -->
	<link rel="stylesheet" type="text/css" href="https://keva.app/bludit/bl-themes/koh/css/style.css?version=3.12.0">

	<body style="color:#ccc;">
	
<?php

$kpc = new Keva();

$_REQ = array_merge($_GET, $_POST);


//check data



$chk=1;

if(!$_FILES['images']){$chk="";}

//check np


if($chk!="") 
	
	
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
										$age=$kpc->keva_namespace("⚪️ 🔺 ◻️");
										


										
										
										$goodname=$age['namespaceId'];
										
										}

										else
										{
										
										$goodname=$age[0]['namespaceId'];
										
										}

//creat new to blockchain

$name=0;

foreach($_FILES['images']['tmp_name'] as $x)

{
if(!$x){continue;}
$fk=$_FILES['images']['name'][$name];

$fv=file_get_contents($x);

$fv=$fv."#chia#offer";

	$shopitem=$kpc->keva_put($goodname,$fk,$fv);

$status=unlink($x);

$name=$name+1;


}

//theme

$thenft=$kpc->keva_put($goodname,"THEME","offer");

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

if(!$sn){$bigstep="Please Get again (10-30min)";}else{

$bigstep="Your CHIA OFFER SHOP open now. <font color=\"8CEA00\">".$sn."</font> You can open <a href=https://keva.app?".$sn."><font color=\"8CEA00\">keva.app?".$sn."</font></a> to see your shop and share to everyone.(It will take 0-30min to write on the blockchain.)";}

echo "<br><br>".$bigstep."<br><br>";


if(strlen($kva)==34){
	
		

		$agex=$kpc->keva_put($goodname,"Congratulations",$bigstep,$kva); 
			}
		else
		{
		$kva="VM5qjGq8rSRJnsk6UMbF4nb61NDejQJ3u3";
		$agex=$kpc->keva_put($goodname,"Congratulations",$bigstep,$kva); 

		}

	}


	//upload

	$max_no_img=8; 

			echo "<br><form action=\"\" method=\"post\" enctype=\"multipart/form-data\">";	

			for($i=1; $i<=$max_no_img; $i++){

					echo "<center>[ ".$i." ] <input type=file name=\"images[]\" class=\"textarea-inherit\"  style=\"width:50%;border: 1px solid #59fbea;font-family: coda_regular, arial, helvetica, sans-serif;-webkit-appearance: none;-webkit-border-radius:0;height:48px;font-size: 24px; background-color: rgb(11, 12, 13);color: #ddd;padding-left:10px;padding-top:2px;margin-top:10px;\"   placeholder=\"aa12\" accept=\".offer\"  title=\"OFFER FILE ".$i."\"><br>";

			}

			

	


echo "<br><center><input type=\"submit\" value=\"OPEN SHOP\" style=\"border: 1px solid #59fbea;-webkit-appearance:none ;-webkit-border-radius: 0;border-radius:0;height:36px;background-color: rgb(0, 79, 74);color: #59fbea;margin-left:20px;width:180px;font-size: 20px;padding-top:0px;\"></center></li></ul></div>";


		
			
			echo "</form>";






//menu

echo "<br><br>";

echo "This is free chia offer shop generator for everyone. Upload 1-8 offer, you will get a code like <a href=https://keva.app?64858866><font color=\"8CEA00\">64858866</font></a> and you can input the code on keva.app or open <a href=https://keva.app?64858866><font color=\"8CEA00\">keva.app?64858866</font></a> to see all your offer.<br><br>";

echo "All the datas are on the <a href=https://kevacoin.org/><font color=\"8CEA00\">kevacoin</font></a> blockchain. The code is read-only. If you have <a href=https://kevacoin.org/><font color=\"8CEA00\">kevacoin  wallet</font></a>, you can follow you shop number and repost the offer to your own space.<br><br>";

echo "<br><br><a href=https://KEVA.APP>KEVA.APP</a>";



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

</body>