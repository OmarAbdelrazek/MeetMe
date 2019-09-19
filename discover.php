<?php
session_start();

$link = mysqli_connect('localhost', 'root', '2182104667', 'social_network');
if (mysqli_connect_errno()) {
    print_r(mysqli_connect_error());
    exit();
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>MeetMe</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
    <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
    <link href="assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet" />
    <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="assets/plugins/ladda/ladda.min.css" rel="stylesheet" />
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />



    <!-- FAVICON -->
    <link href="assets/img/favicon.png" rel="shortcut icon" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="assets/plugins/nprogress/nprogress.js"></script>
</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="home.php">
                        <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                            <g fill="none" fill-rule="evenodd">
                                <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                            </g>
                        </svg>
                        <span class="brand-name">Meet Me</span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-scrollbar">

                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">


                        <li>
                            <a class="sidenav-item-link" href="home.php">
                                <i class="mdi mdi-home-account"></i>

                                <span class="nav-text">Home</span>

                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="discover.php">
                                <i class="mdi mdi-account-group-outline"></i>
                                <span class="nav-text">Discover </span>

                                <span class="badge badge-success">new</span>

                            </a>
                        </li>



                </div>


            </div>
        </aside>



        <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header " id="header">
                <nav class="navbar navbar-static-top navbar-expand-lg">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>


                    <div class="navbar-right ">
                        <ul class="nav navbar-nav">
                            <!-- Github Link Button -->


                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <?php
                                    if (empty($_SESSION['pic'])) {
                                        ?>
                                        <img src="assets/img/user/user.png" class="user-img" alt="User Image" />
                                    <?php } else {
                                        ?>
                                        <img src="<?php echo $_SESSION['pic']; ?>" class="user-img" width="40px" height="40px" alt="User Image" />
                                    <?php } ?>
                                    <span class="d-none d-lg-inline-block">
                                        <?php
                                        $query  = "SELECT users.first_name , users.last_name , users.email FROM users WHERE user_id = " . $_SESSION['userId'];
                                        $result = mysqli_query($link, $query);

                                        $row = mysqli_fetch_array($result);
                                        echo $row['first_name'] . " " . $row['last_name'];

                                        ?>
                                    </span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-left">
                                    <!-- User image -->
                                    <li class="dropdown-header">
                                        <?php
                                        if (empty($_SESSION['pic'])) {
                                            ?>
                                            <img src="assets/img/user/user.png" class="img-circle" alt="User Image" />
                                        <?php } else {
                                            ?>
                                            <img src="<?php echo $_SESSION['pic']; ?>" class="img-circle" alt="User Image" />
                                        <?php } ?>
                                        <div class="d-inline-block">
                                            <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'];    ?> <small class="pt-1" id="email"><?php echo $_SESSION['email']; ?></small>
                                        </div>
                                    </li>


                                    <li>
                                        <a href="email-inbox.html">
                                            <i class="mdi mdi-email"></i> Message
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#"> <i class="mdi mdi-settings"></i> Account Setting </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <a href="logout.php"> <i class="mdi mdi-logout"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>


            </header>


            <div class="content-wrapper">
                <div class="content">
                    <div class="bg-white border rounded">
                        <div class="card card-default">
                            <div class="card-header card-header-border-bottom">
                                <h2>Discover people</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <?php
                                    $query  = 'SELECT `first_name`,`email`,`gender`,`pic`,`last_name`,`user_id` FROM `users`';
                                    $result = mysqli_query($link, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <div class="col-md-6 col-xl-3">
                                            <div class="card mb-4">
                                                <?php
                                                if ($row['pic']) {
                                                    $pic = $row['pic'];
                                                    ?>
                                                    
                                                <?php } else {
                                                    if ($row['gender'] == 0) {
                                                        $pic = "assets/img/user/male.png";

                                                        ?>

                                                    <?php } else {
                                                        $pic = "assets/img/user/female.png";
                                                    }
                                                }  ?>
                                                

                                                <div class="card-body">
                                                <img class="card-img-top mb-4 rounded"  src="<?php echo $pic ?>">
                                                    <h5 class="card-title text-primary"><?php echo $row['first_name'] . " " . $row['last_name'];  ?></h5>
                                                    <p class="card-text pb-3 nowrap" ></p> <?php echo $row['email'];
                                                                                
                                                                                ?> </p>
                                                                                 <p class="card-text pb-3"> <?php
                                                                                if ($row['gender'] == 0) {
                                                                                    echo "\nMale";
                                                                                } else {
                                                                                    echo "\nFemale";
                                                                                }
                                                                                ?> </p>
                                                    <a href="#" class="btn btn-outline-primary">Add Friend</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                    ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>




            </div>

            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year">2019</span> Copyright Meet Me
                    </p>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>

        </div>
    </div>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/toaster/toastr.min.js"></script>
    <script src="assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/charts/Chart.min.js"></script>
    <script src="assets/plugins/ladda/spin.min.js"></script>
    <script src="assets/plugins/ladda/ladda.min.js"></script>
    <script src="assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="assets/plugins/daterangepicker/moment.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- <script src="assets/plugins/jekyll-search.min.js"></script> -->
    <script src="assets/js/sleek.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/date-range.js"></script>
    <script src="assets/js/map.js"></script>
    <script src="assets/js/custom.js"></script>

    <script type="text/javascript">

    </script>




</body>

</html>