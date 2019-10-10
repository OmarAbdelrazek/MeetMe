<?php
session_start();

include "databaseConnect.php";


?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Home - MeetMe</title>

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
                                <span class="nav-text">Discover</span>

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
                                        <img src="assets/img/user/user.png" class="user-img" width="40px" height="40px" alt="User Image" />
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
                                            <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'];    ?>
                                            <small class="pt-1" id="email"><?php echo $_SESSION['email']; ?></small>
                                        </div>
                                    </li>


                                    <li>
                                        <a href="email-inbox.html">
                                            <i class="mdi mdi-email"></i> Message
                                        </a>
                                    </li>

                                    <li>
                                        <a href="accountSettings.php"> <i class="mdi mdi-settings"></i> Account Setting
                                        </a>
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
                        <div class="row no-gutters">
                            <div class="col-lg-4 col-xl-3">
                                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                                    <div class="card text-center widget-profile px-0 border-0">
                                        <div class="card-img mx-auto rounded-circle">
                                            <?php
                                            if (empty($_SESSION['pic'])) {
                                                ?>
                                                <img src="assets/img/user/user.png" alt="User Image" />
                                            <?php } else {
                                                ?>
                                                <img src="<?php echo $_SESSION['pic']; ?>" width="100px" height="100px" alt="User Image" />
                                            <?php } ?>
                                        </div>

                                        <div class="card-body">
                                            <h4 class="py-2 text-dark"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></h4>
                                            <p><?php echo $_SESSION['email']; ?></p>
                                            <a class="btn btn-primary btn-pill btn-lg my-4" href="#">Follow</a>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <div class="text-center pb-4">
                                            <h6 class="text-dark pb-2">1503</h6>
                                            <p>Friends</p>
                                        </div>

                                        <div class="text-center pb-4">
                                            <h6 class="text-dark pb-2">1200</h6>
                                            <p>Requests</p>
                                        </div>
                                    </div>
                                    <hr class="w-100">
                                    <div class="contact-info pt-4">
                                        <h5 class="text-dark mb-1">Contact Information</h5>
                                        <p class="text-dark font-weight-medium pt-4 mb-2">Email address</p>
                                        <p><?php echo $_SESSION['email']; ?></p>


                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-9">
                                <div class="profile-content-right py-5">
                                    <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="timeline-tab" data-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true">Timeline</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="post-tab" data-toggle="tab" href="#post" role="tab" aria-controls="post" aria-selected="false">New post</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content px-3 px-xl-5" id="myTabContent">
                                        <div class="tab-pane fade show active" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                                            <?php

                                            $query  = 'SELECT posts.* , users.first_name ,users.gender ,users.pic, users.last_name from posts , users where posts.user_id = users.user_id order by posts.post_time desc';
                                            $result = mysqli_query($link, $query);
                                            while ($row = mysqli_fetch_array($result)) {


                                                ?>

                                                <div class="media mt-5 profile-timeline-media">
                                                    <div class="align-self-start iconbox-45 overflow-hidden mr-3">
                                                        <?php
                                                        // $query = "SELECT `pic` FROM `users` WHERE user_id=".$row['userId']." ";
                                                        // $pic = mysqli_query($link,$query);
                                                        // echo $pic;
                                                        if ($row['pic']) {
                                                            $pic = $row['pic'];
                                                            ?>




                                                        <?php } else {
                                                            if ($row['gender'] == 0) {
                                                                $pic = "assets/img/user/male.png";
                                                            } else {
                                                                $pic = "assets/img/user/female.png";
                                                            }
                                                        }
                                                        ?>
                                                        <img src="<?php echo $pic;  ?>" width="40px" height="40px" alt="Generic placeholder image">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mt-0 text-dark"> <?php
                                                                                    echo $row['first_name'] . " " . $row["last_name"];


                                                                                    ?></h6>
                                                        <span class="float-right"><?= $row['post_time'] ?></span>
                                                        <p><?php echo $row['post_data']; ?></p>

                                                    </div>
                                                </div>

                                            
                                            <?php
                                            }
                                            ?>
                                            
                                        
                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>

            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year">2019</span> Copyright Sleek Dashboard Bootstrap Template by
                        <a class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
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
    <script src="assets/plugins/jekyll-search.min.js"></script>
    <script src="assets/js/sleek.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/date-range.js"></script>
    <script src="assets/js/map.js"></script>
    <script src="assets/js/custom.js"></script>




</body>

</html>