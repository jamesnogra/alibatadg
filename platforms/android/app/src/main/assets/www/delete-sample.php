<?php

	$file_name = $_GET['pic'];
	$dir = 'temp/';

	echo '<h2>Deleting this sample picture (please wait to redirect):</h2>';
	echo '<img src="'.$dir.$file_name.'" />';
	unlink($dir.$file_name);

	header("Refresh:2; url=list-all-samples.php");

?>