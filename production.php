<?php
require_once "config.php";
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$title = "Production";
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
</style>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active" style="color: #D5D3D3; font-size: 18px;">Production</li>
            </ol>

            <!-- Form Filter -->
            <div class="card mb-3">
                <div class="card-body">
                    <form method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search by Order ID or Area Code" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- tampilan jumlah order-->
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="card bg-white text-black fw-bold mb-4">
                        <div class="card-body" class="sb-nav-link-icon"><i class="fa fa-calculator"></i> Total Orders </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-black stretched-link" href="#">0</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                       </div>
                    </div>
                </div>

                <!-- Pilihan Area Code -->
                <div class="col-xl-4 col-md-4">
                    <div class="card bg-white text-black fw-bold mb-2">
                        <div class="card-body">
                            <label for="areaCode">Area Code</label>
                            <select id="areaCode" name="area_code" class="form-select">
                                <option value="">All</option>
                                <option value="">GATE 4/ TRIMMING KIRI</option>
                                <option value="">GATE 4/FRAME</option>
                                <option value="">GATE 4/SUB ASSY</option>
                                <option value="">GATE 4/DIRECT SUPPLY</option>
                                <option value="">GATE 4/MBT</option>
                                <option value="">GATE 4/ TRIMMING KANAN</option>
                            <?php
                            // Fetch unique Area Codes from the database
                            $areaQuery = "SELECT DISTINCT area_code FROM logistics ORDER BY area_code ASC";
                            $areaResult = $conn->query($areaQuery);
                            if ($areaResult->num_rows > 0) {
                                while ($areaRow = $areaResult->fetch_assoc()) {
                                $selected = (isset($_GET['area_code']) && $_GET['area_code'] == $areaRow['area_code']) ? 'selected' : '';
                                    echo "<option value='" . htmlspecialchars($areaRow['area_code']) . "' $selected>" . htmlspecialchars($areaRow['area_code']) . "</option>";
                                }
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Date-->
        <div class="col-xl-4 col-md-4">
            <div class="card bg-white text-black fw-bold mb-2">
                <div class="card-body">
                    <label for="datePicker">Select Date</label>
                    <input type="date" id="datePicker" name="selected_date" class="form-control" 
                        value="<?= isset($_GET['selected_date']) ? htmlspecialchars($_GET['selected_date']) : '' ?>">
                </div>
            </div>
        </div>
    </main>
</div>

<?php
require_once "019/footer.php";
?>
