<?php
    if (array_key_exists('imageData',$_REQUEST)) {
        $imgData = base64_decode($_REQUEST['imageData']);

        // Path where the image is going to be saved
        $filePath = 'myImage.png';

        // Delete previously uploaded image
        if (file_exists($filePath)) { unlink($filePath); }

        // Write $imgData into the image file
        $file = fopen($filePath, 'w');
        fwrite($file, $imgData);
        fclose($file);
        echo "Saved as " . $filePath;
    } else {
        echo "ERROR";
    }
?>