 {
    "version":"Sample 1.0.0",
    "model":"tororo.moc",
		
	<?php
	
	$prand=$_REQUEST["model"];
	
    echo "\"textures\":[\"tororo/".trim($prand).".png\"],";


    
?>

"pose":"tororo.pose.json",
"name":"tororo",
"motions":{"idle":[{"file":"mtn/00_idle.mtn"}],"":[{"file":"mtn/01.mtn"},{"file":"mtn/02.mtn"},{"file":"mtn/03.mtn"},{"file":"mtn/04.mtn"},{"file":"mtn/05.mtn"},{"file":"mtn/06.mtn"},{"file":"mtn/07.mtn"},{"file":"mtn/08.mtn"}]}

}