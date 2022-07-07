  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
  
  <!-- Favicons -->
  <link href="<?php echo $baseURL; ?>assets/new-img/favicon.png" rel="icon">
  <link href="<?php echo $baseURL; ?>assets/new-img/favicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Vendor CSS Files -->
  <link href="<?php echo $baseURL; ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo $baseURL; ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo $baseURL; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $baseURL; ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo $baseURL; ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo $baseURL; ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo $baseURL; ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo $baseURL; ?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo $baseURL; ?>assets/css/custom.css" rel="stylesheet">

  <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

  <link href="https://vjs.zencdn.net/7.18.1/video-js.css" rel="stylesheet" />
  <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> 

</head>

<?php 
    $directoryURI = $_SERVER['REQUEST_URI'];;
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $first_part = $components[2];
?>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="<?php echo $baseURL; ?>"><img src="assets/new-img/Pragma-Education-Web.png"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="<?php if ($first_part=="" || $first_part=="index") {echo "active"; } else  {echo "notActive";}?>" href="./">Dashboard</a></li>
          <li><a class="<?php if ($first_part=="test-series") {echo "active"; } else  {echo "notActive";}?>" href="test-series">Test Series's</a></li>
          <li><a class="<?php if ($first_part=="all-courses") {echo "active"; } else  {echo "notActive";}?>" href="all-courses">Courses</a></li>

          <?php include('functions/enrolledCoursesOnMenu.php'); ?>

            <li class="dropdown"><a href="#" class="<?php if ($first_part=="profile" || $first_part=="logout") {echo "active"; } else  {echo "notActive";}?>"><span><u><?php echo $student_name_session; ?></u></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="<?php if ($first_part=="profile") {echo "active"; } else  {echo "notActive";}?>" href="profile">Profile</a></li>
              <li><a class="<?php if ($first_part=="logout") {echo "active"; } else  {echo "notActive";}?>" href="logout">Logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->