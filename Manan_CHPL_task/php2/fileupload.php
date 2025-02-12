<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'files/'; 
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];

        
        $fileNamefinal = preg_replace('/[^a-zA-Z0-9\.\-_]/', '_', $fileName);

        // Destination path
        $destinationPath = $uploadDir . $fileNamefinal;
            
        // Move the uploaded file to the destination directory
            if (move_uploaded_file($fileTmpPath, $destinationPath)) {
            echo "<h2>File Uploaded Successfully!</h2>";
            echo "<p>File Name: " . $fileNamefinal . "</p>";
            
            } else {
             echo "<h2>Error: Failed to move uploaded file.</h2>";
            }
        
    } else {
        echo "<h2>Error: No file uploaded or an error occurred.</h2>";
    }
} else {
    echo "<h2>Error: Invalid request method.</h2>";
}
?>
