<?php
if (isset($_FILES['images'])) {
    $total = count($_FILES['images']['name']);

    // Create upload folder if not exist
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

    for ($i = 0; $i < $total; $i++) {
        $name = $_FILES['images']['name'][$i];
        $tmp = $_FILES['images']['tmp_name'][$i];
        $size = $_FILES['images']['size'][$i];

        // Check file size (max 3MB)
        if ($size > 3 * 1024 * 1024) {
            echo "File '$name' is too large. Skipped.<br>";
            continue;
        }

        // Check if file is an image
        $type = mime_content_type($tmp);
        if (strpos($type, 'image') !== 0) {
            echo "File '$name' is not an image. Skipped.<br>";
            continue;
        }

        // Save the file
        $destination = 'uploads/' . basename($name);
        if (move_uploaded_file($tmp, $destination)) {
            echo "Uploaded '$name' successfully.<br>";
        } else {
            echo "Failed to upload '$name'.<br>";
        }
    }
} else {
    echo "No images uploaded.";
}
?>
