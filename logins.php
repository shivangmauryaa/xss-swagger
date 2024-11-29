<?php
// Check if a file has been uploaded
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Set the upload directory (ensure this directory is writable by the web server)
    $uploadDir = 'uploads/';
    
    // Make sure the uploads directory exists
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create uploads directory if not exists
    }

    // Get file information
    $fileName = basename($file['name']);
    $fileTmpPath = $file['tmp_name'];
    $filePath = $uploadDir . $fileName;

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "Error uploading file!";
        exit();
    }

    // Move the uploaded file to the uploads directory
    if (move_uploaded_file($fileTmpPath, $filePath)) {
        echo "File uploaded successfully!<br>";
        echo "File location: " . realpath($filePath); // Display the full file path
    } else {
        echo "File upload failed!";
    }
} else {
    echo "No file uploaded.";
}
?>
