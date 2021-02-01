<?php
error_reporting(0);

?>


<?php 

if($pin<>""){


echo "<section class=\"home-page\"><div class=\"container\"><div class=\"row\"><div class=\"col-lg-8 mx-auto\">";

echo "<a class=\"text-dark\" href=\"\"><h2 class=\"title\">&#x1F4D1;</h2></a>";

echo "<p class=\"page-description\">";


echo str_replace("\n","<br>",$pin);

echo "</p></div></div></div></section>";



}

if(isset($_REQ["roam"])){$npa=$_REQ["roam"];}else{$npa=$_REQ["asset"];}

$rule="/\[\[([^\]]*)\]\]/i";

foreach ($listasset as $k=>$v) 

			{
			
			extract($v);

$value=hex2bin($value);

		$key2=strip_tags($key,"");

		if(stristr($key2,"_g") == true or $key=="THEME"){continue;}

		//check re





			$x_value="<h4>[ ".$key2." ]</h4>";

		
			$key=trim($key);
			$keylink=bin2hex($key);

			

		//roam



			if(stristr($value,"decodeURIComponent") == true){
				
				 if(isset($_REQ["tx"])==false){ 

					//$value = strip_tags($value);

					$value = preg_replace("<script[^>]*?>.*?</script>", "", $value);
				
				}
			}
		

	

		

		preg_match_all($rule,$value,$results);

		
		
				
		

				foreach ($results[1] as $r) 

				{
					
					//echo $r;
					

					$namecheck=$kpc->keva_group_get($npa,$r);

					$ntx=$namecheck["txid"];

					if($namecheck["value"]!="") 
		
						{
						$nplink="<a href=\"/bludit/?theme=roam&asset=k".$namecheck["height"]."&roam=".$namecheck["namespace"]."&tx=".substr($ntx,0,10)."\">".$r."</a>";
						$value=str_replace($r,$nplink,$value);
						}


				}

								
if(isset($_REQ["tx"])){if(stristr($txx,$_REQ["tx"]) == false){continue;}}				



//showall



			$valuex=str_replace("\n","<br>",$value);


?>

<section class="home-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto">

				<!-- Load Bludit Plugins: Page Begin -->
				<?php Theme::plugins('pageBegin'); ?>

				<!-- Page title -->
				<a class="text-dark" href="<?php echo "/bludit/?theme=roam&asset=k".$heightx."&roam=".$gnamespace."&tx=".substr($txx,0,10); ?>">
					<h2 class="title"><?php echo $key; ?></h2>
				</a>

				<!-- Page description -->
				
				<p class="page-description" style="word-break: break-all;"><?php echo $valuex; ?><br>
				
				


				<?php

				echo "<br><hr><font size=1>Bi-directional link</font><br>";

				echo "<li style=\"display:block;height:auto;width:auto;padding-top:20px;line-height:40px;font-size:18px;color:#cccccc;\"><p align=left>";

				$infob= $kpc->keva_group_filter($gnamespace,"self","",60000);
				
				foreach ($infob as $x=>$c) 
					
				{

					extract($c);


					preg_match_all($rule,$value,$results);

			foreach ($results[1] as $s) 

				{
				

				
						if($key2==$s)

							

					{

				$nplink="<a href=\"/bludit/?theme=roam&asset=k".$height."&roam=".$namespace."&tx=".substr($txid,0,10)."\">".$key."</a>";

				
				
			 
						echo "[[".$nplink."]]";
						
						echo "&nbsp;&nbsp;&nbsp;&nbsp;<br>";

				

					}}

				}

				echo "</p></li>";

				?>

				</p>
			

	
			</div>
		</div>
	</div>
</section>

<?php 	} ?>


