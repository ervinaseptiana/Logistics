<?php
require_once "config.php";
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Direktori tempat file akan disimpan
$target_dir = "upload/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_name = basename($_FILES['file']['name']);
        $target_file = $target_dir . $file_name;

        // Pastikan direktori ada, jika belum maka buat
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        // Pindahkan file ke direktori tujuan
        if (move_uploaded_file($file_tmp, $target_file)) {
            // Simpan informasi file ke database
            $stmt = $conn->prepare("INSERT INTO upload (file_name) VALUES (?)");
            $stmt->bind_param("s", $file_name);

            if ($stmt->execute()) {
                $_SESSION['success'] = "File uploaded and saved successfully!";
            } else {
                $_SESSION['error'] = "Database error: Unable to save file information.";
            }

            $stmt->close();
        } else {
            $_SESSION['error'] = "Failed to move the uploaded file.";
        }
    } else {
        $_SESSION['error'] = "No file uploaded or an error occurred.";
    }
} else {
    $_SESSION['error'] = "Invalid request method.";
}

// Redirect back to the upload page
header("Location: upload.php");
exit();
