<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/custom.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css">

        <link href="https://vjs.zencdn.net/7.18.1/video-js.css" rel="stylesheet" />
        <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> 
    </head>
    <body class="sb-nav-fixed">
    <div class="spinner-wrapper">
        <div class="spinner"></div>
    </div>
    <?php 
    $directoryURI = $_SERVER['REQUEST_URI'];;
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $first_part = $components[2];
    ?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="./">Pragma Edu. Office</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
               
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profile-settings">Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="exit-session">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link <?php if ($first_part=="" || $first_part=="index") {echo "active"; } else  {echo "notActive";}?>" href="./">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-tablet"></i></div>
                                Course Tabs
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?php if ($first_part=="add-new-courseTab" || $first_part=="course-tabs") {echo "show active"; } else  {echo "notActive";}?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?php if ($first_part=="course-tabs") {echo "active"; } else  {echo "notActive";}?>" href="course-tabs">Courses Tabs</a>
                                    <a class="nav-link <?php if ($first_part=="add-new-courseTab") {echo "active"; } else  {echo "notActive";}?>" href="add-new-courseTab">Add New Course Tab</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsOne" aria-expanded="false" aria-controls="collapseLayoutsOne">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Courses
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?php if ($first_part=="courses-list" || $first_part=="add-new-course") {echo "show active"; } else  {echo "notActive";}?>" id="collapseLayoutsOne" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?php if ($first_part=="courses-list") {echo "active"; } else  {echo "notActive";}?>" href="courses-list">Courses List</a>
                                    <a class="nav-link <?php if ($first_part=="add-new-course") {echo "active"; } else  {echo "notActive";}?>" href="add-new-course">Add New Course</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsSeven" aria-expanded="false" aria-controls="collapseLayoutsSeven">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Courses & Updates
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?php if ($first_part=="course-subjects" || $first_part=="course-updates-actions") {echo "show active"; } else  {echo "notActive";}?>" id="collapseLayoutsSeven" aria-labelledby="headingSeven" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?php if ($first_part=="course-subjects") {echo "active"; } else  {echo "notActive";}?>" href="course-subjects">Course -> Subjects</a>
                                    <a class="nav-link <?php if ($first_part=="course-updates-actions") {echo "active"; } else  {echo "notActive";}?>" href="course-updates-actions">Course Updates</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Students
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?php if ($first_part=="students-list" || $first_part=="add-new-student" || $first_part=="search-student") {echo "show active"; } else  {echo "notActive";}?>" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?php if ($first_part=="students-list") {echo "active"; } else  {echo "notActive";}?>" href="students-list">Students List</a>
                                    <a class="nav-link <?php if ($first_part=="add-new-student") {echo "active"; } else  {echo "notActive";}?>" href="add-new-student">Add New Student</a>
                                    <a class="nav-link <?php if ($first_part=="search-student") {echo "active"; } else  {echo "notActive";}?>" href="search-student">Search Student</a>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">UI Addons</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsTwoNine" aria-expanded="false" aria-controls="collapseLayoutsTwoNine">
                                <div class="sb-nav-link-icon"><i class="fas fa-display"></i></div>
                                Display Add-ons
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?php if ($first_part=="display-toppers" || $first_part=="display-downloads" || $first_part=="display-current-affairs") {echo "show active"; } else  {echo "notActive";}?>" id="collapseLayoutsTwoNine" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?php if ($first_part=="display-toppers") {echo "active"; } else  {echo "notActive";}?>" href="display-toppers">Toppers</a>
                                    <a class="nav-link <?php if ($first_part=="display-downloads") {echo "active"; } else  {echo "notActive";}?>" href="display-downloads">Downloads</a>
                                    <a class="nav-link <?php if ($first_part=="display-current-affairs") {echo "active"; } else  {echo "notActive";}?>" href="display-current-affairs">Current Affairs</a>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsTwo" aria-expanded="false" aria-controls="collapseLayoutsTwo">
                                <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                                Announcements
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?php if ($first_part=="announcements" || $first_part=="add-new-announcement") {echo "show active"; } else  {echo "notActive";}?>" id="collapseLayoutsTwo" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?php if ($first_part=="announcements") {echo "active"; } else  {echo "notActive";}?>" href="announcements">Announcements</a>
                                    <a class="nav-link <?php if ($first_part=="add-new-announcement") {echo "active"; } else  {echo "notActive";}?>" href="add-new-announcement">Add New </a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsThree" aria-expanded="false" aria-controls="collapseLayoutsThree">
                                <div class="sb-nav-link-icon"><i class="fas fa-gift"></i></div>
                                Discount Offers
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?php if ($first_part=="discount-offers" || $first_part=="add-new-offer") {echo "show active"; } else  {echo "notActive";}?>" id="collapseLayoutsThree" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?php if ($first_part=="discount-offers") {echo "active"; } else  {echo "notActive";}?>" href="discount-offers">All Offers</a>
                                    <a class="nav-link <?php if ($first_part=="add-new-offer") {echo "active"; } else  {echo "notActive";}?>" href="add-new-offer">Add New </a>
                                </nav>
                            </div>
                            
                            <a class="nav-link <?php if ($first_part=="system-settings") {echo "active"; } else  {echo "notActive";}?>" href="system-settings">
                                <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                                Settings
                            </a>

                            <div class="sb-sidenav-menu-heading">Account Actions</div>
                            <a class="nav-link" href="profile-settings">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Profile
                            </a>
                            <a class="nav-link" href="exit-session">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $admin_name_onSession; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">