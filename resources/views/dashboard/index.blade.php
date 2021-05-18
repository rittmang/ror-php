<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" http-equiv="encoding" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Dashboard | ROR</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.css"
        rel="stylesheet">

    <style>
        @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
        @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);

    </style>



    <link rel="stylesheet" href="css/dashboard.css">

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="">ROR Dashboard</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"
                        data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Modules</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="dashboard/titles">Titles</a>
                        </li>
                        <li>
                            <a href="dashboard/webisodes">Webisodes</a>
                        </li>
                        <li>
                            <a href="">Services</a>
                        </li>
                    </ul>
                </li>

            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                        <a class="dropdown-item" href="logout">
                            <span>
                                <strong>
                                    Logout
                                </strong>
                            </span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content-wrapper">

        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">My Dashboard</li>
            </ol>
            <div id="accordion">
                <div class="card mb-3">
                    <div class="card-header" id="headingOne">
                        <button class="btn btn-link" style="text-decoration: none" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fa fa-database"></i> Titles
                        </button>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Year</th>
                                            <th>Genre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($movie_titles as $title)
                                            <tr>
                                                <td>{{ $title->id }}</td>
                                                <td>{{ $title->name }}</td>
                                                <td>{{ $title->year }}</td>
                                                <td>{{ $title->genre }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">
                        Retrieved <span id="datetime"></span>
                        <script>
                            var dt = new Date();
                            document.getElementById("datetime").innerHTML = dt.toLocaleString();

                        </script>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header" id="headingTwo">
                        <button class="btn btn-link" style="text-decoration: none" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fa fa-database"></i> Series
                        </button>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Year</th>
                                            <th>Genre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($series_titles as $title)
                                            <tr>
                                                <td>{{ $title->id }}</td>
                                                <td>{{ $title->name }}</td>
                                                <td>{{ $title->year }}</td>
                                                <td>{{ $title->genre }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer small text-muted">
                        {{-- Retrieved <span id="datetime"></span>
                      <script>
                        var dt=new Date();
                        document.getElementById("datetime").innerHTML=dt.toLocaleString();
                      </script> --}}
                    </div>
                </div>
                {{-- <div class="card mb-3">
                <div class="card-header" id="headingThree">
                  <button class="btn btn-link" style="text-decoration: none" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fa fa-database"></i> Services
                  </button>
                </div> 
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    <div class="table-responsive">
                      {{-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>details</th>
                            <th>imgfile</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($services as $service)
                            <tr>
                              <td>{{$service->id}}</td>
                              <td>{{$service->title}}</td>
                              <td>{{$service->details}}</td>
                              <td>{{$service->imgfile}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table> --}}
            </div>
        </div>
    </div>
    <div class="card-footer small text-muted">
        {{-- Retrieved <span id="datetime"></span>
                      <script>
                        var dt=new Date();
                        document.getElementById("datetime").innerHTML=dt.toLocaleString();
                      </script> --}}
    </div>
    </div> --}}
    </div>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        {{-- <div class="container">
              <div class="text-center">
                <small>Copyright ©GetPlaced 2020</small>
              </div>
            </div> --}}
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    </div>
</body>

</html>
