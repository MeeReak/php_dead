<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //check if the image is existed
    if (isset($_FILES['image'])) {
        //get the file
        $file = $_FILES['image'];

        //check if the file is larger than 3MB
        if ($file['size'] > 3 * 1024 * 1024) {
            echo "File is too large. Maximum size is 3MB.";
            exit;
        }

        //get the type of file
        $file_type = mime_content_type($file['tmp_name']);

        //check if the file is not image
        if (strpos($file_type, 'image') !== 0) {
            echo "Only image files are allowed.";
            exit;
        }

        //check if the folder is exited or not
        if (!is_dir('upload')) {
            mkdir('upload', 777, true);
        }


        // Set a name and move the uploaded file
        $new_file_name = 'upload/' . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $new_file_name)) {
            echo "Success!";
        } else {
            echo "Error!";
        }
    } else {
        echo "No file uploaded.";
        exit;
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Upload in one file</title>
</head>

<body style="background: grey">

</body>
<form method="post" enctype="multipart/form-data">
    <label>Select Image (Maximum 3MB):</label><br>
    <input type="file" name="image" accept="image/*" require><br><br>
    <button type="submit">Upload</button>
</form>

</html>