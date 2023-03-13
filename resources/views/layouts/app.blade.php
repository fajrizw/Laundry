<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LAUNDRY</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

   {{-- jQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">


    <link href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    {{-- <!-- Google Web Fonts --> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    {{-- <link href="{{ asset("lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css") }}" rel="stylesheet" /> --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("js/main.js") }}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">
    @vite(["resources/js/app.js"])


    <style>
        #form-control{
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        }

        button{
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        }
    </style>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="/dashboard" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>LAUNDRY</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="/dashboard" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Master Data</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Data User</a>
                            <a href="/member" class="dropdown-item">Data Member</a>
                            <a href="button.html" class="dropdown-item">Data Transaksi</a>
                            <a href="/outlet" class="dropdown-item">Data Outlet</a>
                            <a href="/paket" class="dropdown-item">Data Paket</a>
                            <a href="/voucher" class="dropdown-item">Data Voucher</a>
                        </div>
                    </div>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
        <!-- Sidebar End -->
    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <form class="d-none d-md-flex ms-4">
                <input class="form-control border-0" type="search" placeholder="Search">
            </form>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-envelope me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Message</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all message</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-bell me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Notificatin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Profile updated</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">New user added</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Password changed</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all notifications</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">John Doe</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->
        {{-- @hasSection('content') --}}
        <div class="p-3">
            @if(Session::has("message"))

            <span class="alert alert-{{ Session::get("message")["type"] }} d-flex align-items-center">{{ Session::get("message")["message"] }}</span>

        @endif
        </div>

        @yield('content')
        {{-- @endif --}}


        @stack('scripts')
        {{-- <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> --}}
        {{-- <script src="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css"></script> --}}
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
           <!-- JavaScript Libraries -->

           <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

           <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

           <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://kit.fontawesome.com/0affa65abc.js" crossorigin="anonymous"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        function validate(form) {
    var isChecked = Array.prototype.some.call(form.querySelectorAll('input[name=jenis_kelamin]'), function (radio) {
        return radio.checked;
    });

    if (!isChecked) {
        alert("You must select Male or Female");
    }

    return isChecked;
}

        </script>
    </body>
</html>
