<?php

if(!$_REQ["asset"] or $_REQ["sort"]==0){$sort=1;}
if($_REQ["sort"]==1){$sort=0;asort($listasset);}

if(!$theme){$theme=$_REQ["theme"];}

if(!$_REQ["theme"]){$theme="social";}

$navlink="?lang=&asset=".$_REQ["asset"]."&theme=".$theme."&scode=".$_REQ["scode"]."&group=no&gname=".$_REQ["gname"]."&sort=".$sort;
?>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark text-uppercase">
	<div class="container">
		<a class="navbar-brand" href=<?php echo $navlink; ?>>
			<span class="text-white"><font color=#28f428><?php echo $site->title(); ?></font></span>
		</a><?php include("theme.php"); ?>
		
		<div class="collapse navbar-collapse" id="navbarResponsive">

			

		</div>
	</div>
</nav>
