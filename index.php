<?php

//memanggil setiap halaman
require_once "config.php";
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$title = "Dashboard - Logistics Direct Supplier";
require_once "019/header.php";
require_once "019/navbar.php";
require_once "019/sidebar.php";

?>

<style>
    /* Warna background bagian tengah */
    #layoutSidenav_content {
        background-color: #A85555;
        padding: 20px;
        min-height: 100vh;
    }

    /* Warna sidebar */
    #layoutSidenav #layoutSidenav_nav {
        background-color: #ffffff; 
    }

    /* Warna navbar */
    .navbar {
        background-color: #ffffff; 
    }
</style>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active" style="color : #D5D3D3; font-size: 18px;">Dashboard</li>
            </ol>

            <!--komponen/widget-->
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="card bg-white text-black fw-bold mb-4">
                        <div class="card-body" class="sb-nav-link-icon">
                            <i class="fa-solid fa-truck-moving"></i> Volume Truck
                        </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-black stretched-link" href="#">0 m3</a>
                            <div class="small text-white">
                                <i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4">
                    <div class="card bg-white text-black fw-bold mb-4">
                        <div class="card-body" class="sb-nav-link-icon">
                            <i class="fa-solid fa-border-all"></i> All Orders
                        </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-black stretched-link" href="#">0 order</a>
                            <div class="small text-white">
                                <i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4">
                    <div class="card bg-white text-black fw-bold mb-4">
                        <div class="card-body" class="sb-nav-link-icon">
                            <i class="fa-regular fa-clock"></i> Ritase
                        </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-black stretched-link" href="#">0</a>
                            <div class="small text-white">
                                <i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--diagram-->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header text-black fw-bold">
                            <i class="fa fa-bar-chart"></i>
                            Bar Chart Orders Overview
                        </div>
                            <div class="card-body"><canvas id="myBarChart" height="70"></canvas></div>
                        </div>
                    </div>
                </div>

                <!--tabel-->
                <div class="card mb-4">
                    <div class="card-header text-black fw-bold">
                        <i class="fa-solid fa-location-pin"></i>
                        Route Activity
                        </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Route</th>
                                    <th>Distance</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
</main>
                
<?php require_once "019/footer.php"; ?>