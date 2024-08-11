<?php
$web_root_dir = $_SERVER['DOCUMENT_ROOT']; // Get the web server's document root directory
$target_dir = $web_root_dir . "/shared.d/uploads";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Check if file already exists
if (file_exists($target_file)) {
    // File with the same name exists, check checksum only if it's the same file
    $uploaded_file_checksum = md5_file($_FILES["fileToUpload"]["tmp_name"]);
    $existing_file_checksum = md5_file($target_file);

    if ($uploaded_file_checksum === $existing_file_checksum) {
        echo "A file with similar name and checksum already exists.";
        $uploadOk = 0;
    } else {
        echo "A file with similar name already exists, but with different content.";
        $uploadOk = 0;
    }
}

// Check file size (e.g., limit to 10MB)
$max_file_size = 10 * 1024 * 1024; // 10MB
if ($_FILES["fileToUpload"]["size"] > $max_file_size) {
    echo "Sorry, your file is too large. Max allowed size is 10MB.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
