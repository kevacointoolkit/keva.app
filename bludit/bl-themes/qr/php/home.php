<?php
error_reporting(0);
?>
<?php if (empty($content)): ?>
	<div class="mt-4">
	<?php $language->p('No pages found') ?>
	</div>
<?php endif ?>

<?php

if($pin<>""){



echo "<div class=\"card-body\">";
	


echo "<div>&#x1F4D1;<div id=\"post-content\">";



echo str_replace("\n","<br>",$pin);

echo "</div></div></div></div><hr>";



}


foreach ($listasset as $k=>$v) 

			{
			
			extract($v);

$value=hex2bin($value);

		$key2=strip_tags($key,"");

		if(stristr($key2,"_g") == true){continue;}

		//check re

		if(strlen($key2) == "64"){
		
		
		
									$txcount=1;
									$txloop=$key2;

									
								

									while($txcount<50) {
									
									$txcount++;

									

									$transaction= $kpc->getrawtransaction($txloop,1);
								

									
									

									foreach($transaction['vout'] as $vout)
	   
									  {

										$op_return = $vout["scriptPubKey"]["asm"]; 

				
										$arr = explode(' ', $op_return); 

										

										if($arr[0] == 'OP_KEVA_PUT') 
										{
											 $cona=$arr[1];
											 $cons=$arr[2];
											 $conk=$arr[3];

						

											$txloop=hex2bin($cons);

										
						
		
											if(strlen($txloop)<>64){$key="RE:".$txloop;break;}
													
								
													}
												
												}
											}

										
		
		
		}

			$x_value="<h4>[ ".$key2." ]</h4>";

		
			$key=trim($key);
			$keylink=bin2hex($key);

		


//showall

			if(stristr($value,"decodeURIComponent") == true){$value=$txx;}

			$valuex=str_replace("\n","<br>",$value);

	if(!$gname){if(isset($_REQ["gname"])){$gnamer=hex2bin($_REQ["gname"]);}else{$gnamer="";}}else{$gnamer=$gname;}

	if($gnamespace==$asset){$gnamer=$title;}
?>

<!-- Post -->
<div class="card my-5 border-0">

	<!-- Load Bludit Plugins: Page Begin -->
	<?php Theme::plugins('pageBegin'); ?>

	<!-- Cover image -->
	<?php if ($page->coverImage()): ?>
	<img class="card-img-top mb-3 rounded-0" alt="Cover Image" src="<?php echo $page->coverImage(); ?>"/>
	<?php endif ?>

	<div class="card-body">
		<!-- Title -->
		
			<h2 class="title"><?php echo $key; ?></h2>
		
		<!-- Creation date -->
		<h6 class="card-subtitle mb-3 text-muted"><?php echo date('Y-m-d H:i',$gtime); ?> - <span <?php echo $rgb; ?>><?php echo $gnamex; ?></span></h6>

		<!-- Breaked content -->
		<?php 
			
		$b=bin2hex($valuex);
		


			
		echo "<img src=/bludit/qr.php?v=".$b."&theme=1>";
		
		?>


	</div>

	<!-- Load Bludit Plugins: Page End -->
	<?php Theme::plugins('pageEnd'); ?>

</div>
<hr>
<?php } 


//keva

function html2text($str){
 $str = preg_replace("/<style .*?<\\/style>/is", "", $str);
 $str = preg_replace("/<script .*?<\\/script>/is", "", $str);
 $str = preg_replace("/<br \\s*\\/>/i", "\r\n", $str);
 $str = preg_replace("/<\\/?p>/i", "\r\n", $str);
 $str = preg_replace("/<\\/?td>/i", "", $str);
 $str = preg_replace("/<\\/?div>/i", ">>>>", $str);
 $str = preg_replace("/<\\/?blockquote>/i", "", $str);
 $str = preg_replace("/<\\/?li>/i", ">>>>", $str);
 $str = preg_replace("/ /i", " ", $str);
 $str = preg_replace("/ /i", " ", $str);
 $str = preg_replace("/&/i", "&", $str);
 $str = preg_replace("/&/i", "&", $str);
 $str = preg_replace("/</i", "<", $str);
 $str = preg_replace("/</i", "<", $str);
 $str = preg_replace("/¡°/i", '"', $str);
 $str = preg_replace("/&ldquo/i", '"', $str);
 $str = preg_replace("/¡®/i", "'", $str);
 $str = preg_replace("/&lsquo/i", "'", $str);
 $str = preg_replace("/'/i", "'", $str);
 $str = preg_replace("/&rsquo/i", "'", $str);
 $str = preg_replace("/>/i", ">", $str);
 $str = preg_replace("/>/i", ">", $str);
 $str = preg_replace("/¡±/i", '"', $str);
 $str = preg_replace("/&rdquo/i", '"', $str);
 $str = strip_tags($str);
 $str = html_entity_decode($str, ENT_QUOTES, "utf-8");
 $str = preg_replace("/&#.*?;/i", "", $str);
 return $str;
}



?>


