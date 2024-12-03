<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar bg-White">
            <!--Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?= $main_url?>index.php" style="font-weight: bold; color : #A85555; font-size: 1.2rem;">
                <img src="asset/image/logohino.png" alt="Logo" style="height: 50px; width: auto; margin-right: 2px;">
                Logistics Direct Supplier
            </a>

            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <span class="text-capitalize"><?= "Admin"?></span>
            </form>

            <!--Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-dark" href="profile.php">Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item text-dark" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>