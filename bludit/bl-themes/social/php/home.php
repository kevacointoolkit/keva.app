<?php
error_reporting(0);

?>
<?php if (empty($content)): ?>
	<div class="mt-4">
	<?php $language->p('No pages found') ?>
	</div>
<?php endif ?>


<div id="jslistOfPosts">
<br>

	<!-- Post -->
	<div class="card my-2 p-2">


<?php 

	//if(!$gname){if(isset($_REQ["gname"])){$gnamer=hex2bin($_REQ["gname"]);}else{$gnamer="";}}else{$gnamer=$gname;}

	//if($gnamespace==$asset){$gnamer=$title;}

if($pin<>""){



echo "<div class=\"card-body\">";
	
echo "<img class=\"float-left rounded-circle\" style=\"width: 48px\" src=".letter_avatar($gnamer).">";

echo "<div style=\"padding-left: 56px\">&#x1F4D1;<div id=\"post-content\">";



echo str_replace("\n","<br>",$pin);

echo "</div></div></div>";



}






foreach ($listasset as $k=>$v) 

			{
			
			extract($v);
		
		if(stristr($key2,"NAMESPACE ADDRESS") == true){continue;}
		if(stristr($key2,"KEVA.APP") == true){continue;}
		if(stristr($key2,"LOAD ALL BLOCK CONTENTS") == true){continue;}


$value=hex2bin($value);

	if(stristr($value,"LOAD 60000+ BLOCKS") == true){continue;}

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




?>




		<div class="card-body">
			<!-- Profile picture -->
			<img class="float-left rounded-circle" style="width: 48px" src="<?php echo letter_avatar($gnamex); ?>" />

			<div style="padding-left: 56px">
				<!-- Post's author and date -->
				<p class="mb-2 text-muted">
					<?php echo "<span ".$rgb."><a href=?theme=".$_REQUEST["theme"]."&asset=".$gnamespace."&scode=".$mysp."&gname=".bin2hex($gnamex).">".$gnamex."</a></span>"; ?> -
					<?php echo date('Y-m-d H:i',$gtime); ?>
				</p>

				<!-- Post's content -->
				<div id="post-content" style="font-family: 'PingFang SC', 'Noto Sans CJK SC', 'Heiti SC', 'DengXian', 'Microsoft YaHei', Helvetica, Segoe UI, Arial, sans-serif; ">
				<?php echo $valuex; ?>
				</div>

			
			</div>
		</div>

		


	<?php } ?>
		</div>
</div>
