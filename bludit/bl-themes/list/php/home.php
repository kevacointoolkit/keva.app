<?php
error_reporting(0);
?>
<?php if (empty($content)): ?>
	<div class="mt-4">
	<?php $language->p('No pages found') ?>
	</div>
<?php endif ?>
<script type="text/javascript" src="/jquery.js"></script>

<div class="card my-5 border-0"  id=\"lgDemo\">
<br>
<?php

if($pin<>""){



echo "<div class=\"card-body\" >";
	


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





	<div  class="item">
		<!-- Title -->
		
			 <div class="item">
		<div class="m-box">
			<div class="m-list"><h4 class="title"><?php echo $key; ?></h4><h6 class="card-subtitle mb-3 text-muted"><?php echo date('Y-m-d H:i',$gtime); ?> - <?php echo "<a href=?theme=".$_REQUEST["theme"]."&asset=".$gnamespace."&gname=".bin2hex($gnamex).">".$gnamex."</a>"; ?></h6>
			</div>
		

		<!-- Creation date -->
		<div class="m-content">
		
		<!-- Breaked content -->
		<?php echo turnUrlIntoHyperlink($valuex); ?>

		</div>
        

       
    
    </div></div>


	</div>

	


<hr>
<?php } ?>

</div>

<script>

$(function () {
        var icon=$('.icon-list');
        $('.m-list').click(function () {
            $(this).next('div').slideToggle();
            changeIcon($(this).children(icon));
        });
    });
	function changeIcon(mainNode) {
        if (mainNode) {
            if (mainNode.css("background-image").indexOf("iconfont-right.png") >= 0) {
                mainNode.css("background-image","url('images/iconfont-unfold.png')");
            } else {
                mainNode.css("background-image","url('images/iconfont-right.png')");
            }
        }
    }
    </script>
