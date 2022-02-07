<?php
error_reporting(0);
?>
<?php if (empty($content)): ?>
	<div class="mt-4">
	<?php $language->p('No pages found') ?>
	</div>
<?php endif ?>

<div class="container mt-4"> <!-- Content Container HOME -->
        <div class="row">
		

        <div class="col-md-8">
			<!-- Post -->
<?php



if($pin<>""){



echo "<div class=\"card mt-2\">";
	
echo "<div class=\"card-body\"><div class=\"card-title\"><h3 class=\"text-primary\">&#x1F4D1;</h3></div>";

echo "<div><div id=\"post-content\">";


echo "<div class=\"card-text\">";

echo str_replace("\n","<br>",$pin);

echo "</div></div></div></div></div>";



}

//shop

$shopns=$_REQ["asset"];

$checkshop=$kpc->keva_get($shopns,"Congratulations");




if($checkshop['value']!=""){

$checknm=$kpc->keva_get($shopns,"_KEVA_NS_");

echo "<div class=\"card mt-2\">";
	
echo "<div class=\"card-body\"><div class=\"card-title\"><br><h3 class=\"text-primary\">".$checknm['value']." SHOP</h3></div>";

echo "<div><div id=\"post-content\">";


echo "<div class=\"card-text\">";

echo "This is CHIA OFFER shop, you can use chia wallet to accept offers.";

echo "</div></div></div></div></div>";



}

echo "<div class=\"card mt-2\">";
	
echo "<div class=\"card-body\">";

foreach ($listasset as $k=>$v) 

			{
			
			extract($v);

$value=hex2bin($value);

		$key2=strip_tags($key,"");

		if(stristr($key2,"_g") == true){continue;}

		if(stristr($key2,"Congratulations") == true){continue;}
		if(stristr($key2,"NAMESPACE ADDRESS") == true){continue;}
		if(stristr($key2,"LOAD ALL BLOCK CONTENTS") == true){continue;}

		



			$x_value="<h4>[ ".$key2." ]</h4>";

		
			$key=trim($key);
			$keylink=bin2hex($key);

		


//showall



			if(stristr($value,"decodeURIComponent") == true){$value=$txx;}

			$valuex=str_replace("\n","<br>",$value);



	if(!$gname){if(isset($_REQ["gname"])){$gnamer=hex2bin($_REQ["gname"]);}else{$gnamer="";}}else{$gnamer=$gname;}

	if($gnamespace==$asset){$gnamer=$title;}
?>


			<!-- Load Bludit Plugins: Page Begin -->
			<?php Theme::plugins('pageBegin'); ?>

		
					<div class="card-title">
						<h4 class="text-primary"><?php 
				
				$keyb=bin2hex($key);
				$valueb=bin2hex($valuex);
				
				$keyx=str_replace(".offer","",$key);
				$keyx=str_replace("_x_"," ]</font> ..... ",$keyx);

				$keyx=str_replace("(1)","",$keyx);
				$keyx=str_replace("(2)","",$keyx);
				$keyx=str_replace("(3)","",$keyx);


			echo "<a href=https://chia.keva.app/offer.php?txid=".$txx.">[ ".$keyx."</a>"; ?></h4>
					</div>
				
					
					
				
			<?php } 
			
			echo "</div></div></div></div></div>";?>

        </div>
    </div>
</div> <!-- END Content Container HOME -->


