<?php
require_once "config.php";
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$title = "Laporan - Logistics Direct Supplier";
require_once "019/header.php";
require_once "019/navbar.php";
require_once "019/sidebar.php";
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Laporan</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <p>Generate and view logistics reports here.</p>
                    <!-- Tambahkan fitur laporan -->
                </div>
            </div>
        </div>
    </main>
</div>

<?php
require_once "019/footer.php";
?>
