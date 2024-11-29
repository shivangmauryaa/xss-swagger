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

    // Check if the uploaded file is a PHP file (or your preferred type)
    if (strpos($file['type'], 'php') !== false) {
        // Move the uploaded PHP file to the server's uploads directory
        if (move_uploaded_file($fileTmpPath, $filePath)) {
            echo "PHP file uploaded successfully!<br>";
            echo "File location on server: " . realpath($filePath) . "<br>"; // Display the full file path

            // Provide the file URL to access it
            echo "You can access the file at: <a href='/uploads/" . $fileName . "'>http://yourserver.com/uploads/" . $fileName . "</a>";
        } else {
            echo "File upload failed!";
        }
    } else {
        echo "Please upload a PHP file.";
    }
} else {
    echo "No file uploaded.";
}
?>
