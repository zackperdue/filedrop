<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	
	<?php foreach($styles as $location => $media): ?>
		<?php echo HTML::style($location, array('media' => $media))."\n"; ?>
	<?php endforeach; ?>
</head>
<body>
	<h1>Filedrop</h1>
	<?php echo $nav; ?>
	
	<?php echo $page; ?>
		
	<?php foreach($scripts as $script): ?>
		<?php echo HTML::script($script)."\n"; ?>
	<?php endforeach; ?>
</body>
</html>