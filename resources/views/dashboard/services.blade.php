<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" http-equiv="encoding" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Services | RightOnRittman</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.css"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-confirmation2/dist/bootstrap-confirmation.min.js"></script>


    <style>
        @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
        @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);

    </style>

    <link rel="stylesheet" href="../css/dashboard.css">

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="dashboard">RightOnRittman Dashboard</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="/dashboard">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link nav-link-collapse" data-toggle="collapse" href="#collapseComponents"
                        data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Modules</span>
                    </a>
                    <ul class="sidenav-second-level collapse show" id="collapseComponents">
                        <li>
                            <a href="titles">Titles</a>
                        </li>
                        <li>
                            <a href="webisodes">Webisodes</a>
                        </li>
                        <li>
                            <div class="p-3 ml-4 bg-secondary text-white">Services</div>
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
                        <a class="dropdown-item" href="../logout">
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
                <li class="breadcrumb-item active">Services</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-database"></i> Services
                </div>
                <div class="card-body">
                    @if (session('insertStatus'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h4>Amazing!</h4>
                            <p>{{ session('insertStatus') }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif(session('editStatus'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h4>Edit done!</h4>
                            <p>{{ session('editStatus') }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form id="serviceForm" action="{{ url('dashboard/servicesUpdate') }}" method="post">
                        <div class="input-group mb-3 mt-4 col-md-6 pl-0 ml-0">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <span class="input-group-text rounded-0" id="banner-title">Banner titles</span>
                            <input id="banner-ids" name="banner-ids" type="text" class="form-control rounded-0" placeholder="1,2,3" aria-label="Banner titles" value="{{implode(',', $banner_titles)}}" readonly></input>
                            <button id="edit-banner" type="button" class="btn btn-outline-primary rounded-0" style="display:block;"><i class="fa fa-pencil"></i></button>
                            <button id="update-banner" type="submit" class="btn btn-outline-success rounded-0" style="display:none;"><i class="fa fa-check"></i></button>                        
                        </div>
                    </form>
                    
                </div>
                <div class="card-footer small text-muted">
                    {{-- Retrieved <span id="datetime"></span>
                    <script>
                      var dt=new Date();
                      document.getElementById("datetime").innerHTML=dt.toLocaleString();
                    </script> --}}
                </div>
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
    </div>
</body>
<script type="text/javascript">
    document.getElementById('edit-banner').addEventListener('click',function(){
        document.getElementById('banner-ids').removeAttribute('readonly');
        document.getElementById('banner-ids').focus();
        document.getElementById('update-banner').style.display = 'block';
        document.getElementById('edit-banner').style.display = 'none'; 
    });

    document.getElementById('update-banner').addEventListener('click',function(){

        
        document.getElementById('update-banner').style.display = 'none';
        document.getElementById('banner-ids').setAttribute('readonly',true);
        document.getElementById('edit-banner').style.display = 'block';
    });
</script>

</html>
