<?php
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $uploadDir = 'uploads/';
    
    if (!file_exists($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            die("Failed to create directory.");
        }
    }

    $fileName = basename($file['name']);
    $fileTmpPath = $file['tmp_name'];
    $filePath = $uploadDir . $fileName;

    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Error uploading file. Error code: " . $file['error']);
    }

    echo "File type: " . $file['type'] . "<br>";
    echo "File size: " . $file['size'] . " bytes<br>";

    if (strpos($file['type'], 'php') !== false) {
        echo "Temporary file path: " . $fileTmpPath . "<br>";

        if (move_uploaded_file($fileTmpPath, $filePath)) {
            echo "PHP file uploaded successfully!<br>";
            echo "File location on server: " . realpath($filePath) . "<br>";
            echo "You can access the file at: <a href='/uploads/" . $fileName . "'>http://yourserver.com/uploads/" . $fileName . "</a>";
        } else {
            die("Failed to move uploaded file to the destination directory.");
        }
    } else {
        die("Only PHP files are allowed.");
    }
} else {
    echo "No file uploaded.";
}
?>
