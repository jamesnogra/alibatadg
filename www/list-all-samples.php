<?php

	$dir    = 'temp';
	$samples = scandir($dir);

	$last_char = '';
	foreach ($samples as $pic) {
		$pieces_file_name = explode('.', $pic);
		if ($pieces_file_name[0]) {
			if ($last_pic!=$pieces_file_name[0]) {
				echo '<h3>'.$pieces_file_name[0].'</h3>';
			}
			$last_pic = $pieces_file_name[0];
			echo '<img src="'.$dir.'/'.$pic.'" title="Pic '.$pic.'" style="border:1px solid #CCCCCC;" /> ';
		}
	}

?>