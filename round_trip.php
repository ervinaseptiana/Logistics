<?php
require_once "config.php";
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$title = "Round Trip - Logistics Direct Supplier";
require_once "019/header.php";
require_once "019/navbar.php";
require_once "019/sidebar.php";
?>

<style>
    #layoutSidenav_content {
        background-color: #A85555; /* Warna merah */
        padding: 60px;
        min-height: 100vh;
    }

    #layoutSidenav #layoutSidenav_nav {
        background-color: #ffffff; /* Warna putih */
    }

    .navbar {
        background-color: #ffffff; /* Warna putih */
    }

    .table thead {
        background-color: #f8f9fa;
    }
</style>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active" style="color: #D5D3D3; font-size: 18px;">Round Trip</li>
            </ol>

            <!-- Form Filter -->
            <div class="card mb-3">
                <div class="card-body">
                    <form method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>

<?php
require_once "019/footer.php";
?>
