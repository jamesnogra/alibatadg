<?php
    echo "SIZE: " . (int)$_SERVER['CONTENT_LENGTH'] . "<br />";
    if (array_key_exists('imageData',$_REQUEST)) {
        $imgData = base64_decode($_REQUEST['imageData']);

        // Path where the image is going to be saved
        if (isset($_POST['from_users'])) {
            $filePath = 'temp_other_users/'.$_POST['curent_character'] . '.' . generateRandomString(4) . '-' . $_POST['full_name'] . '.png';
        } else {
            $filePath = 'temp/'.$_POST['curent_character'] . '.' . generateRandomString(4) . '-' . $_POST['full_name'] . '.png';
        }
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

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

?>