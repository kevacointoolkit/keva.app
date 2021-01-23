<?php

$themes = buildThemes();

if(isset($_REQUEST["theme"])){$checktheme=$_REQUEST["theme"];}

else{if($theme<>""){$checktheme=$theme;}
else{$checktheme="social";}}

echo "<script>function submitForm(){var form = document.getElementById(\"myform\");form.submit();}</script>";

echo "<a href=https://keva.app?".$_REQUEST["scode"]."><font color=grey size=2.5>keva.app?".$_REQUEST["scode"]."</a>&nbsp;<form action=\"\" method=\"get\" id=\"myform\"><select name=\"theme\" onchange=\"submitForm();\">";

foreach($themes as $t){

if($t["dirname"]==$checktheme){$val=" selected=\"selected\"";}else{$val="";}

echo "<option value=\"".$t["dirname"]."\"".$val.">".$t["dirname"]."</option>";

}

echo "</select></font>";

echo "<input type=\"hidden\" name=\"asset\" value=\"".$_REQUEST["asset"]."\">";
echo "<input type=\"hidden\" name=\"group\" value=\"".$_REQUEST["group"]."\">";
echo "<input type=\"hidden\" name=\"gname\" value=\"".$_REQUEST["gname"]."\">";
echo "<input type=\"hidden\" name=\"sort\" value=\"".$_REQUEST["sort"]."\">";
echo "<input type=\"hidden\" name=\"scode\" value=\"".$_REQUEST["scode"]."\">";


echo "</form>";

?>
