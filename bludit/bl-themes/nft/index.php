<?php
error_reporting(0);

if (empty($content)): ?>
	<div class="text-center p-4">
	<?php $language->p('No pages found') ?>
	</div>

<?php endif ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>KEVA.APP</title>
<meta name="Keywords" content="">
<meta name="Description" content="GALAXY">
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">



<link href="/bludit/bl-themes/nft/css/style.css" rel="stylesheet" type="text/css">


</head>

<body>



	<!-- Content -->
	<?php
		// $WHERE_AM_I variable detect where the user is browsing
		// If the user is watching a particular page the variable takes the value "page"
		// If the user is watching the frontpage the variable takes the value "home"
		if ($WHERE_AM_I == 'page') {
			include(THEME_DIR_PHP.'page.php');
		} else {
			include(THEME_DIR_PHP.'home.php');
		}
	?>

	


</body>
</html>