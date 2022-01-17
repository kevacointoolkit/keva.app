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







foreach ($listasset as $k=>$v) 

			{
			
			extract($v);

$value=hex2bin($value);

		$key2=strip_tags($key,"");

		if(stristr($key2,"_g") == true){continue;}

		if(stristr($key2,"NAMESPACE ADDRESS") == true){continue;}
		if(stristr($key2,"LOAD ALL BLOCK CONTENTS") == true){continue;}

		

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


			<!-- Load Bludit Plugins: Page Begin -->
			<?php Theme::plugins('pageBegin'); ?>

			<div class="card mt-2">
				<div class="card-header"><?php echo $page->category(); ?></div>
				<img src="" alt="">
				<div class="card-body">
					<div class="card-title">
						<h3 class="text-primary"><?php echo $key; ?></h3>
					</div>
					<p class="text-info card-subtitle mb-3"><?php echo "<span ".$rgb."><a href=?theme=".$_REQUEST["theme"]."&asset=".$gnamespace."&gname=".bin2hex($gnamex).">".$gnamex."</a></span>"; ?> -
					<?php 
				if(stristr($key,"Congratulations") == true){$key=$_REQUEST["scode"].".txt";}
				$keyb=bin2hex($key);
				$valueb=bin2hex($valuex);
			echo "<a href=?fk=".$keyb."&fv=".$valueb.">[ DOWNLOAD FILE ]</a>"; ?></p>
					<div class="card-text" style="font-family: 'PingFang SC', 'Noto Sans CJK SC', 'Heiti SC', 'DengXian', 'Microsoft YaHei', Helvetica, Segoe UI, Arial, sans-serif; ">
						<?php if(stristr($key2,"Congratulations") == true){echo $valuex;} ?>
					</div>
					
				</div>
			</div>
			<?php Theme::plugins('pageEnd'); ?>
			<?php } ?>
        </div>
    </div>
</div> <!-- END Content Container HOME -->


