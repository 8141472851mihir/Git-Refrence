<?php
function image_upload($file) {
    if (isset($file) && $file['error'] == 0) {
        $file_name = $file['name'];
        $file_tmp_name = $file['tmp_name'];
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $upload_dir = 'img/';

        // Create directory if it does not exist
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Generate a unique file name
        $new_file_name = time() . '_' . $file_name;
        $target_path = $upload_dir . $new_file_name;

        // Validate file type
        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($file_tmp_name, $target_path)) {
                return $target_path; 
            } else {
                echo "File upload failed.<br>";
            }
        } else {
            echo "Invalid file type: $file_extension<br>";
        }
    } else {
        echo "File error code: " . $file['error'] . "<br>";
    }
    return ''; 
}

?>
