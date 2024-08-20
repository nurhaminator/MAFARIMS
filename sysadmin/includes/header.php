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
        .dropdown-menu{
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
        <div class="btn-group">
            <a href="#">
                <img src="../assets/defaultpic.png" alt="" width="32" height="32" class="rounded-circle me-2">
            </a>
            <button class="btn btn-white btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                System Administrator
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Profile Settings</a></li>
                <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

