<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('header_title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

  </head>
  <body>
    <div id="overlay">
      <div class="cv-spinner">
        <span class="spinner">
        </span>
      </div>
    </div>
    <div class="container">
    {{-- <div style="margin-left:50px; margin-right:50px;"> --}}
        <nav class="navbar navbar-expand-md navbar-dark bg-white px-5 fixed-top shadow p-3 mb-3 bg-body rounded css-1xze0z9">
          <div class="container">
            <button class="btn btn-outlined" href="" class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
              <span class="material-icons" style="vertical-align: -6px; color: rgb(0, 0, 0)">apps</span>
            </button>
            <a href="">
              <img src="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/9cc110cc704f85cee7a5539e75ec2a4c.png" alt="Responsive image" class="img-fluid" style="height: 25px;">
             
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " align="" id="navbarSupportedContent">
              <ul class="navbar-nav mx-auto me-auto mb-2 mb-lg-0 mt-2" align="center"></ul>
              {{-- <ul class="navbar-nav">
                <li class="nav-item">
                  <div class="btn-group dropdown show">
                    <a class="nav-link" href="#" data-bs-toggle="dropdown">
                      <span class="material-icons" style="color: white;">add_box</span>
                      <span class="d-md-none d-xs-block">ADD</span>
                    </a>
                    <div class="shadow dropdown-menu dropdown-menu-end px-3">
                      <div class="row">
                        <div class="col-8"> Add </div>
                        <div class="col-4" align="right">
                          <span class="count_item badge badge-secondary"></span>
                        </div>
                      </div>
                      <hr class="divider my-2" />
                    </div>
                  </div>
                </li>
              </ul> --}}
            </div>
          </div>
        </nav>
        <div class="pricing-header p-3 pb-md-2 mt-5 mx-auto text-center"></div>
        <div class="offcanvas offcanvas-start my-5 element" tabindex="-1" id="offcanvasExample"
            data-bs-keyboard="false" data-bs-backdrop="false" aria-labelledby="offcanvasExampleLabel"
            style=" visibility: visible; flex-grow: 1; height: 100%; overflow-y: auto; background: #fff; top: 25px; width: 280px;">
          <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="{{ route('siswa.index') }}" class="nav-link collapsed">
                  <span class="material-icons" style="vertical-align: -6px; color: black;">apps</span>
                  <span style="color: black;">Siswa</span>
                </a>
              </li>
              <li>
                <a href="{{ route('profile') }}" class="nav-link collapsed">
                  <span class="material-icons" style="vertical-align: -6px; color: black;">straighten</span>
                  <span style="color: black;">Profile</span>
                </a>
              </li>
              <hr>
              <li>
                @if (Auth::check())
                <a href="{{ route('logout') }}" class="nav-link collapsed" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <span class="material-icons" style="vertical-align: -6px; color: black;">logout</span>
                  <span style="color: black;">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>
                @endif
              </li>

            </ul>
          </div>
        </div>
      <div class="row">
        <div class="col"> @yield('content') </div>
      </div>
    </div>
    {{-- </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts" integrity="sha512-vIqZt7ReO939RQssENNbZ+Iu3j0CSsgk41nP3AYabLiIFajyebORlk7rKPjGddmO1FQkbuOb2EVK6rJkiHsmag==" crossorigin="anonymous"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script> --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js" integrity="sha256-04C2SeXF6JtsrsX+sFnI+gFdm56VJdhW49hWm4m+0io=" crossorigin="anonymous"></script>


    </script>
  </body>
</html>
<style>
  .bg-light {
  background-color: #fff !important;
  }
</style>
