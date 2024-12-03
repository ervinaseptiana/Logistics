<?php
require_once "config.php";
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Pesan keberhasilan/gagal
if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
}

// Ambil data dari tabel upload
$files = [];
$result = $conn->query("SELECT * FROM upload ORDER BY uploaded_at DESC");
if ($result) {
    $files = $result->fetch_all(MYSQLI_ASSOC);
}

$title = "Packing Data - Logistics Direct Supplier";
require_once "019/header.php";
require_once "019/navbar.php";
require_once "019/sidebar.php";
?>

<style>
    /* Warna background bagian tengah */
    #layoutSidenav_content {
        background-color: #A85555; /* Warna merah */
        padding: 60px;
        min-height: 100vh;
    }

    /* Warna background sidebar */
    #layoutSidenav #layoutSidenav_nav {
        background-color: #ffffff; /* Warna putih */
    }

    /* Tabel styling */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table thead {
        background-color: #f8f9fa;
        color: #333;
    }

    table th, table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
    }
</style>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active" style="color: #D5D3D3; font-size: 18px;">Packing</li>
            </ol>

            <div class="card mb-5">
                <div class="card-header">
                    <h3>Uploaded Packing Files</h3>
                </div>
                <div class="card-body">
                    <?php if (!empty($files)) : ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>File Name</th>
                                    <th>Uploaded At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($files as $index => $file) : ?>
                                    <tr>
                                        <td><?= $index + 1; ?></td>
                                        <td><?= htmlspecialchars($file['file_name']); ?></td>
                                        <td><?= htmlspecialchars($file['uploaded_at']); ?></td>
                                        <td>
                                            <a href="uploads/<?= htmlspecialchars($file['file_path']); ?>" class="btn btn-success btn-sm" target="_blank">View</a>
                                            <a href="delete_file.php?id=<?= $file['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this file?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>No packing files uploaded yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
    <?php require_once "019/footer.php"; ?>
</div>