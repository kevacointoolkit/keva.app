<?php
error_reporting(0);

?>

<?php if (empty($content)): ?>
	<div class="text-center p-4">
	<?php $language->p('No pages found') ?>
	</div>
<?php endif ?>

<!-- Print all the content -->

<div style="overflow: auto;font-size:20px;padding-top:50px;padding-left:10px;">
    <svg xmlns="http://www.w3.org/2000/svg" id="svgContainer" version="1.1" height="600" width="1000"
         style="border:0px solid #eee">
    </svg>
</div>

</body>

<?php 

if(!$gname){if(isset($_REQ["gname"])){$gnamer=hex2bin($_REQ["gname"]);}else{$gnamer="";}}else{$gnamer=$gname;}


?>


<script>
    // typeScript 
    // class Node {
    //     title: string;
    //     children: [Node];
    //     fontColor?: string = null;
    //     borderColor?: string = null;
    //     bgColor?: string = null;
    // }

    const treeData = [
        {
            title: '<?php echo $gnamer; ?>',
            children: [
<?php

$totalmind=array();
$child="";
$childx="";
$childy="";

foreach ($listasset as $k=>$v) 

			{
			
			extract($v);

			if($gtime=="1579143600" or $gtime=="1231006505" or $key=="THEME"){continue;}

			$arrm["key"]=$key;
			$arrm["value"]=hex2bin($value);
			
			array_push($totalmind,$arrm);
			}


			asort($totalmind);

$okey="";

$kn=0;

$ktotal=count($totalmind);


foreach ($totalmind as $n=>$m) 

	{

			extract($m);

			$valuex=trim(str_replace("\n","",$value));

			if($_REQ["sort"]==1){$valuex=$key." ".$valuex;}

//0
			
if(!$okey)

		{

echo "{title: \"".$valuex."\",";

		}

else
	
		{

//5

		if(strlen($key)>3)
			
			
			{


//7
				if(strlen($key)>5)
			
		
					{

					

					 if(!$childx){$childx=7;echo " children: [";}


					 echo "{title: \"".$valuex."\"},";

				

					}	

					else
//5					
					
					{

					if(strlen($okey)==5){echo "},";}

					if(strlen($okey)==7){echo "]},";$childx="";}

	
					
					 if(!$child){$child=5;echo " children: [";}


					$ma=substr($key,5,1);
					$mb=substr($okey,5,1);
					
					if($ma==$mb)
						
							{
							
							
						echo "{title: \"".$valuex."\",";
						
						
							}
					
//1.1.2

					else
						
							{
							
						
						
						echo "{title: \"".$valuex."\",";
						
							}

				
						
					
					}	
//5					
			

			}

//3

			else
	
			{

//2.1

	if(strlen($okey)==5){ echo "},";}

	if(strlen($okey)==7){echo "]},";}

			$na=substr($key,0,1);
			$nb=substr($okey,0,1);
				

			if($na!=$nb)
				
				{
					if($child=="5" or $childx=="7" ){echo "]},";$child="";$childx="";}else{

					echo "},";}

					echo "{title: \"".$valuex."\",";

				
				
				}
//1.2
				else
				
				{
					

					if($child=="5"){echo "]},";$child="";}else{

					echo "},";}

					echo "{title: \"".$valuex."\",";

				}




			}
					
		
		


		}



$okey=$key;


$kn=$kn+1;


			}





if($kn==$ktotal & strlen($key)=="7"){echo "]},]},";$childx="";}

if($kn==$ktotal & strlen($key)=="5"){echo "},]},";$child="";}

if($kn==$ktotal & strlen($key)=="3"){echo "},";}


					echo "]}];";






	 ?>



        


    const nodeFontS = 24; 
    const interval = 25;  
    const padding = 4;    
    const margin_y = 6;     
    const fontColor = "#626262";  
    const borderColor = "#55aaee";  
    const lineColor = "#55aaee";  

    const svg = document.getElementById('svgContainer');

    let _svgW = 0;
    let _lastNodeN = 0;
    const _nodeH = nodeFontS + padding * 2 + margin_y * 2;

   
    reBuildData(treeData, null);
    buildSvg(treeData);
    setSvgContainerSize(_svgW+30, _lastNodeN * _nodeH + 30);

    console.log('treeData');
    console.log(treeData);
    console.log(_lastNodeN);

    function reBuildData(d, parent) {  
        d.forEach((v, i) => {
            v.parent = parent;
            if (v.children && v.children.length > 0) {
                reBuildData(v.children, v);
                parentY(v, d.length, i)
            } else {
                _lastNodeN = _lastNodeN + 1;
                v.y = _lastNodeN;
                parentY(v, d.length, i)
            }
        })
    }

    function parentY(lastNode, len, i) {  
        const parent = lastNode.parent;
        if (len === (i + 1) && !!parent) {
            const s = parent.children[0].y;
            parent.y = s + (lastNode.y - s) / 2
        }
    }

    function setSvgContainerSize(w, h) { 
        svg.setAttribute("width", w);
        svg.setAttribute("height", h);
    }

    function buildSvg(data) { 
        data.forEach((v) => {
            buildNode(v);
            if (!!v.children && v.children.length > 0) {
                buildSvg(v.children)
            }
        })
    }

    function buildNode(node) { 
        const gTag = document.createElementNS('http://www.w3.org/2000/svg', 'g');
        const textTag = document.createElementNS('http://www.w3.org/2000/svg', 'text');
        const text = document.createTextNode(node.title);
        textTag.appendChild(text);

        gTag.appendChild(textTag)
        svg.appendChild(gTag);

        textTag.setAttribute("fill", node.fontColor ? node.fontColor : fontColor);
        const parentx = !!node.parent ? node.parent.x : 0;
        const parentw = !!node.parent ? node.parent.w : 0;
        const intervalNow = !!node.parent ? interval : 0;

        const textH = Math.ceil(textTag.getBBox().height);
        node.w = Math.ceil(textTag.getBBox().width) + padding * 2;
        node.x = parentx + parentw + intervalNow + 6;
        gTag.setAttribute('transform', `translate(${node.x + padding},${node.y * (_nodeH) + textH / 2 - 5})`);
        if ((node.w + node.x) > _svgW) {
            _svgW = node.w + node.x;
        }
        gTag.insertBefore(drawBorder(node), textTag);
        drawLine(node);
    }

    function drawBorder(node){  
        const fan = document.createElementNS('http://www.w3.org/2000/svg', 'path');
        fan.setAttribute("d", getBorderD(node));
        fan.setAttribute('stroke', node.borderColor ? node.borderColor : borderColor);
        fan.setAttribute("stroke-width", "1");
        fan.setAttribute("fill", node.bgColor?node.bgColor:"none");
        return fan;
    }
    function getBorderD(node){  
        return `M0,-17h${node.w-8}a5,5,0,0,1,5,5v13a5,5,0,0,1,-5,5h-${node.w-8}a5,5,0,0,1,-5,-5v-13a5,5,0,0,1,5,-5z`
    }

    function drawLine(node) {  
        if (!node.parent) {
            return
        }
        const fan = document.createElementNS('http://www.w3.org/2000/svg', 'path');
        svg.appendChild(fan);
        fan.setAttribute("d", getD(node));
        fan.setAttribute('stroke', lineColor);
        fan.setAttribute("stroke-width", "1");
        fan.setAttribute("fill", "none");
    }

    function getD(node) {  
        const parent = node.parent;
        if (parent.y != node.y) {
            return `M${parent.x + parent.w} ${parent.y * _nodeH} C${parent.x + parent.w + 15} ${parent.y * _nodeH} ${node.x - 15} ${node.y * _nodeH} ${node.x} ${node.y * _nodeH}`;
        } else {
            return `M${parent.x + parent.w} ${parent.y * _nodeH} L${node.x} ${node.y * _nodeH}`;
        }
    }
</script>