{
	"version":"Sample 1.0.0",

<?php
	
	$prand="model".$_REQUEST["model"].".moc";


	
    echo "\"model\": \"".$prand."\",";
    
?>

	"textures":[
		"model.1024/texture_00.png"
	],
	"motions":{
		"idle":[
			{"file":"motions/daiji_idle.mtn",
			"fade_in": 0,
            "fade_out": 0}
		],
		"":[
			{"file":"motions/motou_01.mtn"},
			{"file":"motions/motou_02.mtn"},
			{"file":"motions/motou_03.mtn"},
			{"file":"motions/wait_01.mtn"},
			{"file":"motions/wait_02.mtn"}
		]
	},
	"physics":"physics.json",
	"hit_areas": [
    {
      "name": "face",
      "id": "D_REF.FACE"
    },
    {
      "name": "body",
      "id": "D_REF.BODY"
    }
  ]
}