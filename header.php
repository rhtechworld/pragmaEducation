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
$first_part = $components[1];
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
          <li><a class="<?php if ($first_part=="" || $first_part=="index") {echo "active"; } else  {echo "notActive";}?>" href="<?php echo $baseURL; ?>">Home</a></li>
          <li><a class="<?php if ($first_part=="toppers") {echo "active"; } else  {echo "notActive";}?>" href="<?php echo $baseURL; ?>toppers">Toppers</a></li>
          <li><a class="<?php if ($first_part=="videos") {echo "active"; } else  {echo "notActive";}?>" href="<?php echo $baseURL; ?>videos">Videos</a></li>
          <li><a class="<?php if ($first_part=="faculties") {echo "active"; } else  {echo "notActive";}?>" href="<?php echo $baseURL; ?>faculties">Faculties</a></li>
          <li><a class="<?php if ($first_part=="courses") {echo "active"; } else  {echo "notActive";}?>" href="<?php echo $baseURL; ?>courses">Courses</a></li>
          <li><a class="<?php if ($first_part=="downloads") {echo "active"; } else  {echo "notActive";}?>" href="<?php echo $baseURL; ?>downloads">Downloads</a></li>
          <li><a class="<?php if ($first_part=="current-affairs") {echo "active"; } else  {echo "notActive";}?>" href="<?php echo $baseURL; ?>current-affairs">Current Affairs</a></li>
          <li class="dropdown"><a href="#" class="<?php if ($first_part=="about" || $first_part=="why-us") {echo "active"; } else  {echo "notActive";}?>"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="<?php if ($first_part=="about") {echo "active"; } else  {echo "notActive";}?>" href="<?php echo $baseURL; ?>about">About Pragma</a></li>
              <li><a class="<?php if ($first_part=="why-us") {echo "active"; } else  {echo "notActive";}?>" href="<?php echo $baseURL; ?>why-us">why choose us</a></li>
            </ul>
          </li>
          <li><a class="<?php if ($first_part=="contact") {echo "active"; } else  {echo "notActive";}?>" href="<?php echo $baseURL; ?>contact">Contact</a></li>
          <li class="dropdown"><a href="#" class="<?php if ($first_part=="login" || $first_part=="register") {echo "active"; } else  {echo "notActive";}?>"><span>Student Access</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="<?php if ($first_part=="login") {echo "active"; } else  {echo "notActive";}?>" href="<?php echo $baseURL; ?>login">Login</a></li>
              <li><a class="<?php if ($first_part=="register") {echo "active"; } else  {echo "notActive";}?>" href="<?php echo $baseURL; ?>register">Register</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->