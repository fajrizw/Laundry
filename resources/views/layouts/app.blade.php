<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Laundry</title>

     {{-- jQuery --}}
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


    <link href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset("vendors/feather/feather.css") }}">
  <link rel="stylesheet" href="{{ asset("vendors/ti-icons/css/themify-icons.css") }}">
  <link rel="stylesheet" href="{{ asset("vendors/css/vendor.bundle.base.css") }}">
  <link rel="stylesheet" href="{{ asset("vendors/select2/select2.min.css") }}">
  <link rel="stylesheet" href="{{ asset("vendors/select2-bootstrap-theme/select2-bootstrap.min.css") }}">
  <!-- endinject -->
   <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset("vendors/datatables.net-bs4/dataTables.bootstrap4.css") }}">
  <link rel="stylesheet" type="text/css" href="{{ asset("js/select.dataTables.min.css") }}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset("css/vertical-layout-light/style.css") }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="img/favicon.png" />

  {{-- <link href="{{ asset("css/maps/vertical-layout-light/style.css.map") }}" rel="stylesheet">
  <link href="{{ asset("css/vertical-layout-light/style.css") }}" rel="stylesheet"> --}}
  <!-- Template Stylesheet -->
  {{-- <link href="{{ asset("css/style.css") }}" rel="stylesheet"> --}}
  @vite(["resources/js/app.js"])
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
  </style>

</head>
<body>
@if(Auth::check())
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{ route("dashboard") }}"><img alt="BubbleBox"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{ route("dashboard") }}"><img src="img/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <i class="icon-ellipsis"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <form class="" action="{{ route("logout") }}" method="POST">
                @csrf
       <i class="ti-power-off text-primary"></i>
                    {{ " Log out" }}

            </form>

              </a>
            </div>
          </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SETTINGS</p>
          <form class="sidebar-link" action="{{ route("logout") }}" method="POST">
            @csrf
            <button class="btn btn-light text-sm text-dark form-control border border-dark "><i class="align-middle fas fa-right-from-bracket"></i>
                {{ " Log out" }}
            </button>
        </form>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>

        </div>
      </div>


      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route("dashboard") }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if(Auth::user()->id_role == 1)
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route("users.index") }}">User</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route("member.index") }}">Member</a></li>
              </ul>
            </div>
          </li>
          @endif
          @if(Auth::user()->id_role == 2)
          <li class="nav-item">
            <a class="nav-link" href="{{ route("member.index") }}">
                <i class="icon-head menu-icon"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
          @endif
          @if(Auth::user()->id_role == 2 || Auth::user()->id_role == 1 || Auth::user()->id_role == 3)
          <li class="nav-item">
            <a class="nav-link" href="{{ route("transaksi.index") }}">

                <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Transaksi</span>
            </a>
          </li>
          @endif
          @if(Auth::user()->id_role == 1)
          <li class="nav-item">
            <a class="nav-link" href="{{ route("paket.index") }}">
                <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Paket</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route("voucher.index") }}">
                <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Voucher</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route("outlet.index") }}">
                <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Outlet</span>
            </a>
          </li>
          @endif
        </ul>
      </nav>
@endif
  <!-- container-scroller -->
    <!-- Navbar End -->
        {{-- @hasSection('content') --}}

        <div class="p-3">
            @if(Session::has("message"))

            <span class="alert alert-{{ Session::get("message")["type"] }} d-flex align-items-center">{{ Session::get("message")["message"] }}</span>

        @endif


        {{-- @yield('alert')


        <span class="alert alert-success d-flex align-items-center">asDASDasf</span> --}}

        </div>


        @yield('content')
        {{-- @endif --}}


        @stack('scripts')

        {{-- <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> --}}
        <script src="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></scrip
        <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>



           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>



           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>

           <script src="https://kit.fontawesome.com/0affa65abc.js" crossorigin="anonymous"></script>

  <!-- plugins:js -->
  <script src="{{ asset("vendors/js/vendor.bundle.base.js") }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
 <script src="vendors/datatables.net/jquery.dataTables.js"></script>
 <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="{{ asset("js/dataTables.select.min.js") }}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->

  <script src="{{ asset("vendors/select2/select2.min.js") }}"></script>

  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <script src="{{ asset("vendors/typeahead.js/typeahead.bundle.min.js") }}"></script>
  <script src="{{ asset("js/select2.js") }}"></script>

  <script src="{{ asset("js/apexchart.js") }}"></script>
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
    <script>
      function updateDateTime() {
  // Mendapatkan elemen dengan ID "date" dan "time"
  var dateElement = document.getElementById("date");
  var timeElement = document.getElementById("time");
    // Mendapatkan waktu saat ini
    var now = new Date();

  // Memperbarui isi elemen dengan tanggal dan waktu saat ini
  dateElement.innerHTML = now.toLocaleDateString();
  timeElement.innerHTML = now.toLocaleTimeString();

    // Mengatur timer untuk memperbarui waktu setiap detik
    setTimeout(updateTime, 1000);
}

// Memanggil fungsi updateDateTime() saat halaman selesai dimuat
window.onload = updateDateTime
      </script>
  <!-- End custom js for this page-->
</body>

</html>


