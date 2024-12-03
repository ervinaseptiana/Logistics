<div id="layoutSidenav">
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion bg_white" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Home</div>
                <a class="nav-link" href="<?= $main_url ?>index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <hr class="mb-0"></hr>
                <div class="sb-sidenav-menu-heading">Menu</div>

                <!--buttom membuka submenu-->
                <a class="nav-link collapsed" href="<?= $main_url ?>index.php" data-bs-toggle="collapse" data-bs-target="#submenuLogistics" aria-expanded="false" aria-controls="submenuLogistics">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-truck-fast"></i></div>
                    Logistics
                    <div class="sb-nav-link-icon ms-auto"><i class="fa-solid fa-chevron-down"></i></div>
                </a>

                <!--submenu collapse-->
                <div class="collapse" id="submenuLogistics">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?= $main_url ?>upload_file.php">Upload Data</a>
                        <a class="nav-link" href="<?= $main_url ?>production.php">Production</a>
                        <a class="nav-link" href="<?= $main_url ?>inventory.php">Packing</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu"></div>
                <a class="nav-link" href="<?= $main_url ?>index.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-route"></i></div>
                    Round Trip
                </a>
                <div class="sb-sidenav-menu"></div>
                <a class="nav-link" href="<?= $main_url ?>index.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                    Report
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
                Admin
        </div>
    </nav>
</div>