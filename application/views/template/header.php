<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo SITE_TITLE?></title>
	
	<?php foreach($styles as $style):?>
	<link href="<?php echo $style?>" rel="stylesheet">
	<?php endforeach?>
	
	<script>
	  var site_url = "<?php echo site_url()?>";
	</script>

  </head>

  <body>
  
	<div id="wrapper">
	
	  <!-- Page content -->
	  <div id="page-content-wrapper">
		<!-- Keep all page content within the page-content inset div! -->
		<div class="page-content inset">
		  <div class="row">
