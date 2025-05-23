<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['images'])) {
        $total = count($_FILES['images']['name']);

        if (!is_dir('uploads')) {
            mkdir('uploads', 777, true);
        }

        for ($i = 0; $i < $total; $i++) {
            $file_size = $_FILES['images']['size'][$i];
            $file_name = $_FILES['images']['name'][$i];
            $file_tmp = $_FILES['images']['tmp_name'][$i];
            $destination = 'uploads/' . basename($_FILES['images']['name'][$i]);

            if ($file_size > 3 * 1024 * 1024) {
                echo "File '$file_name' is too large. Skipped.<br>";
                continue;
            }

            $file_type = mime_content_type($file_tmp);
            if (strpos($file_type, 'image') !== 0) {
                echo "File '$file_name' is not an image. Skipped.<br>";
                continue;
            }

            if (move_uploaded_file($file_tmp, $destination)) {
                echo "Uploaded '$file_name' successfully.<br>";
            } else {
                echo "Failed to upload '$file_name'.<br>";
            }
        }
    } else {
        echo "No file uploaded.";
        exit;
    }
} else {
    echo "Method not allowed!!";
    exit;
}
