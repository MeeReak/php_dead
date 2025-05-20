<?php
if (isset($_FILES['image'])) {
    $file = $_FILES['image'];

    // Check if file size is less than 3MB
    if ($file['size'] > 3 * 1024 * 1024) {
        echo "File is too large. Maximum size is 3MB.";
        exit;
    }

    // Get file type
    $fileType = mime_content_type($file['tmp_name']);

    // Allow only image types
    if (strpos($fileType, 'image') !== 0) {
        echo "Only image files are allowed.";
        exit;
    }

    // Make sure the uploads folder exists
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

    // Set a name and move the uploaded file
    $newFileName = 'uploads/' . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $newFileName)) {
        echo "Image uploaded successfully!";
    } else {
        echo "Failed to upload image.";
    }
} else {
    echo "No file uploaded.";
}
// <?php
// // Define max file size (in bytes)
// $maxFileSize = 3 * 1024 * 1024; // 3MB

// // Define allowed image MIME types
// $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

// // Check if a file is uploaded
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
//     $file = $_FILES['image'];

//     // Check for errors
//     if ($file['error'] !== UPLOAD_ERR_OK) {
//         echo "Upload failed with error code " . $file['error'];
//         exit;
//     }

//     // Validate file size
//     if ($file['size'] > $maxFileSize) {
//         echo "Error: File size exceeds 3MB limit.";
//         exit;
//     }

//     // Validate MIME type
//     $finfo = finfo_open(FILEINFO_MIME_TYPE);
//     $mimeType = finfo_file($finfo, $file['tmp_name']);
//     finfo_close($finfo);

//     if (!in_array($mimeType, $allowedMimeTypes)) {
//         echo "Error: Only image files (JPG, PNG, GIF, WEBP) are allowed.";
//         exit;
//     }

//     // Create uploads directory if not exists
//     $uploadDir = __DIR__ . '/uploads/';
//     if (!is_dir($uploadDir)) {
//         mkdir($uploadDir, 0755, true);
//     }

//     // Create unique file name
//     $fileName = uniqid('img_', true) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
//     $destination = $uploadDir . $fileName;

//     // Move file to upload directory
//     if (move_uploaded_file($file['tmp_name'], $destination)) {
//         echo "Image uploaded successfully: uploads/" . $fileName;
//     } else {
//         echo "Error: Failed to move uploaded file.";
//     }
// } else {
//     echo "No image uploaded.";
// }
