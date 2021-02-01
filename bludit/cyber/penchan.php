<?php

//config

$bdo="PENCHAN";

$prand=rand(1,24);

//maker

$maker="";

$makerlink="";

//full

$bbmess=420;

$bbbottom=0;
$bbwidth=400;
$bbhight=430;

$bbw=380;
$bbh=500;

//page

$ssbottom=0;
$sswidth=220;
$sshight=175;

$ssw=196;
$ssh=175;

include("tia_core.php");

?>

<script type="text/javascript">
    loadlive2d("live2d", "/bludit/live2d/model/penchan/model.php?model=<?php echo $prand;?>");
</script>

