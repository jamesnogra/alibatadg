<?php

	$dir    = 'temp';
	$samples = scandir($dir);
	echo '<h2><a href="download-all-samples.php">Download All '.count($samples).'</a></h2>';

	$last_char = '';
	foreach ($samples as $pic) {
		$pieces_file_name = explode('.', $pic);
		if ($pieces_file_name[0]) {
			if ($last_pic!=$pieces_file_name[0]) {
				echo '<hr><h3>'.$pieces_file_name[0].'</h3>';
			}
			$last_pic = $pieces_file_name[0];
			echo '<a onclick="return confirm(\'Are you sure you want to delete this sample?\');" href="delete-sample.php?pic='.$pic.'"><img src="'.$dir.'/'.$pic.'" title="Pic '.$pic.'" style="border:1px solid #CCCCCC;" /></a> ';
		}
	}
	echo '<hr>';

?>