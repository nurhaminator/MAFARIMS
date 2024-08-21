    <style>
        .logo {
            font-weight: 800;
        }

        nav {
            z-index: 1;
            position: fixed;
            width: 100%;
            background-color: #fff;
            border-bottom: 1px solid #e9ecef;
            padding: 10px;
        }

        .dropdown-menu {
            background-color: #d8f0cc;
        }
    </style>
    </head>

    <body>
        <nav class="navbar navbar">
            <a class="navbar-brand fs-3 logo text-success" href="#">
                <img src="../assets/logo.png" alt="" width="60" height="60" class="d-inline-block align-text-center" />
                MAFARIMS
            </a>
            <div>
                <div class="hamburger">
                    <i class="fas fa-bars"></i>
                </div>
                <button type="button" class="btn position-relative">
                    <a href="#">
                        <img src="https://icones.pro/wp-content/uploads/2022/02/icone-de-cloche-jaune.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    </a>
                    <span class="position-absolute top-0 start translate-middle badge rounded-pill bg-danger">
                        0
                        <span class="visually-hidden">unread notifications</span>
                    </span>
                </button>
                <div class="btn-group">
                    <a href="#">
                        <img src="../assets/defaultpic.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    </a>
                    <button class="btn btn-white btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        System Administrator
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./profilesettings.php">Profile Settings</a></li>
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>

        </nav>
    </body>