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

$title = "Upload Data - Logistics Direct Supplier";
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
</style>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active" style="color: #D5D3D3; font-size: 18px;">Upload</li>
            </ol>

        <div class="card mb-5">
            <div class="card-body">
                <form action="upload_process.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-5">
                        <label for="file" class="form-label">Upload File</label>
                        <input class="form-control" type="file" id="file" name="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</main>
    
<?php require_once "019/footer.php"; ?>