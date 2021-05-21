<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" http-equiv="encoding" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Webisodes | RightOnRittman</title>
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
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
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
                            <div class="p-3 ml-4 bg-secondary text-white">Webisodes</div>
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
                <li class="breadcrumb-item active">Webisodes</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-database"></i> Webisodes
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
                    @elseif(session('errorStatus'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4>Error occurred!</h4>
                            <p>{{ session('errorStatus') }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>    
                    @endif
                    <div>
                        <button style="margin-bottom: 10px" class="btn btn-primary" data-toggle="modal"
                            data-target="#insertModal">
                            <i class="fa fa-plus"></i>
                            <b>Insert an episode</b>
                        </button>
                        <button style="margin-bottom: 10px" class="btn btn-danger delete_all"
                            data-url="{{ url('dashboard/webisodesDelete') }}">
                            <i class="fa fa-trash"></i>
                            Delete All Selected
                        </button>
                    </div>
                    <div>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="master"></th>
                                    <th>ID</th>
                                    <th>Episode</th>
                                    <th>Title</th>
                                    <th>Poster</th>
                                    <th>Asset</th>
                                    <th>VTT</th>
                                    <th>Duration</th>
                                    <th>Views</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $current_title=$webisodes[0]->title_id;
                                @endphp
                                @foreach ($webisodes as $webisode)
                                    @if($webisode->title_id != $current_title)
                                       <tr height="20px"></tr> 
                                    @endif
                                    <tr id="{{ $webisode->id }}">
                                        <td><input type="checkbox" class="sub_chk" data-id="{{ $webisode->id }}"></td>
                                        <td>{{ $webisode->id }}</td>
                                        <td><p>S{{ $webisode->season }}E{{ $webisode->episode }} {{ $webisode->ep_name }}
                                        </td>
                                        <td>{{ $webisode->title_id }}</td>
                                        <td><a href="{{ $webisode->wide_poster }}" target="_blank">Wide</a></td>
                                        <td><a href="{{ $webisode->asset }}" target="_blank">Asset</a></td>
                                        <td><a href="{{ $webisode->vtt }}" target="_blank">VTT</a></td>
                                        <td>{{ $webisode->duration }}</td>
                                        <td>{{ $webisode->views }}</td>
                                        <td>
                                            <button style="margin-bottom: 10px"
                                                class="btn btn-outline-danger delete_single"
                                                data-url="{{ url('dashboard/webisodesDelete') }}"
                                                data-id="{{ $webisode->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <button style="margin-bottom: 10px"
                                                class="btn btn-outline-primary edit_single"
                                                data-id="{{ $webisode->id }}" data-name="{{ $webisode->ep_name }}"
                                                data-season="{{ $webisode->season }}" data-episode="{{ $webisode->episode }}"
                                                data-titleid="{{ $webisode->title_id }}" data-wideposter="{{ $webisode->wide_poster }}" 
                                                data-asset="{{ $webisode->asset }}" data-vtt="{{ $webisode->vtt }}" 
                                                data-duration="{{ $webisode->duration }}" data-views="{{ $webisode->views }}"
                                                data-toggle="modal" data-target="#editModal">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    @php
                                        $current_title=$webisode->title_id;    
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
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

        {{-- Begin modal template --}}
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalTitle">Edit title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('dashboard/webisodesUpdate') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-row">
                                <div class="form-group col md-3">
                                    <label for="editWebisodeId">DB id</label>
                                    <input type="text" class="form-control" id="editWebisodeId" name="editWebisodeId"
                                        readonly>
                                </div>
                                <div class="form-group col md-3">
                                    <label for="editWebisodeViews">Views</label>
                                    <input type="text" class="form-control" id="editWebisodeViews" name="editWebisodeViews"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="editWebisodeTitleId">Title ID</label>
                                    <input type="text" class="form-control" id="editWebisodeTitleId" name="editWebisodeTitleId"
                                        required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="editWebisodeSeason">Season</label>
                                    <input type="text" class="form-control" id="editWebisodeSeason" name="editWebisodeSeason"
                                        required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="editWebisodeEpisode">Episode</label>
                                    <input type="text" class="form-control" id="editWebisodeEpisode" name="editWebisodeEpisode"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="editWebisodeName">Name</label>
                                    <input type="text" class="form-control" id="editWebisodeName" name="editWebisodeName"
                                        required>
                                </div>                                            
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="editWebisodeWidePoster">Wide Poster</label>
                                    <input type="text" class="form-control" id="editWebisodeWidePoster"
                                        name="editWebisodeWidePoster">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="editWebisodeAsset">Asset</label>
                                    <input type="text" class="form-control" id="editWebisodeAsset" name="editWebisodeAsset"
                                        required>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="editWebisodeVTT">VTT</label>
                                    <input type="text" class="form-control" id="editWebisodeVTT" name="editWebisodeVTT">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="editWebisodeDuration">Duration</label>
                                    <input type="text" class="form-control" id="editWebisodeDuration"
                                        name="editWebisodeDuration" required>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="insertModalLongTitle">Insert an episode</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('dashboard/webisodes') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputWebisodeName">Title ID</label>
                                    <input type="text" class="form-control" id="inputWebisodeTitleId" name="inputWebisodeTitleId"
                                        placeholder="eg: 30" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputWebisodeSeason">Season</label>
                                    <input type="text" class="form-control" id="inputWebisodeSeason"
                                        name="inputWebisodeSeason" placeholder="eg: 1" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputWebisodeEpisode">Episode</label>
                                    <input type="text" class="form-control" id="inputWebisodeEpisode" name="inputWebisodeEpisode"
                                        placeholder="eg: 1" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputWebisodeName">Name</label>
                                    <input type="text" class="form-control" id="inputWebisodeName" name="inputWebisodeName"
                                        placeholder="eg: Ishq Se Risk" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputWebisodeWidePoster">Wide Poster</label>
                                    <input type="text" class="form-control" id="inputWebisodeWidePoster" name="inputWebisodeWidePoster"
                                        placeholder="eg: https://..." required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputWebisodeAsset">Asset</label>
                                    <input type="text" class="form-control" id="inputWebisodeAsset"
                                        name="inputWebisodeAsset" placeholder="eg: https://..." required>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="inputWebisodeVTT">VTT</label>
                                    <input type="text" class="form-control" id="inputWebisodeVTT" name="inputWebisodeVTT"
                                        placeholder="eg: https://..." required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputWebisodeDuration">Duration</label>
                                    <input type="text" class="form-control" id="inputWebisodeDuration" name="inputWebisodeDuration"
                                        placeholder="eg: 1h 56m">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- $('#editModal').on('show.bs.modal',function(e){
              var opener=e.relatedTarget;
              var 
          }) --}}
        <!-- Logout Modal-->
    </div>
</body>
<script type="text/javascript">
    $('#editModal').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var webisodeName = $(e.relatedTarget).data('name');
        var webisodeSeason = $(e.relatedTarget).data('season');
        var webisodeEpisode = $(e.relatedTarget).data('episode');
        var webisodeTitleId = $(e.relatedTarget).data('titleid');
        var webisodeWidePoster = $(e.relatedTarget).data('wideposter');
        var webisodeAsset = $(e.relatedTarget).data('asset');
        var webisodeVTT = $(e.relatedTarget).data('vtt');
        var webisodeDuration = $(e.relatedTarget).data('duration');
        var webisodeViews = $(e.relatedTarget).data('views');

        $(e.currentTarget).find('input[name="editWebisodeId"]').val(id);
        $(e.currentTarget).find('input[name="editWebisodeName"]').val(webisodeName);
        $(e.currentTarget).find('input[name="editWebisodeSeason"]').val(webisodeSeason);
        $(e.currentTarget).find('input[name="editWebisodeEpisode"]').val(webisodeEpisode);
        $(e.currentTarget).find('input[name="editWebisodeTitleId"]').val(webisodeTitleId);
        $(e.currentTarget).find('input[name="editWebisodeWidePoster"]').val(webisodeWidePoster);
        $(e.currentTarget).find('input[name="editWebisodeAsset"]').val(webisodeAsset);
        $(e.currentTarget).find('input[name="editWebisodeVTT"]').val(webisodeVTT);
        $(e.currentTarget).find('input[name="editWebisodeDuration"]').val(webisodeDuration);
        $(e.currentTarget).find('input[name="editWebisodeViews"]').val(webisodeViews);

    });

    $(document).ready(function() {
        $('#master').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $('.sub_chk').prop('checked', true);
            } else {
                $('.sub_chk').prop('checked', false);
            }
        });

        $('.delete_all').on('click', function(e) {
            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });
            if (allVals.length <= 0) {
                alert("Please select row");
            } else {

                var check = confirm("Are you sure you want to delete this row?");
                if (check == true) {
                    var join_selected_values = allVals.join(",");
                    var baap = $(this).parent();
                    baap.html(
                        `<button style="margin-bottom: 10px" class="btn btn-secondary" disabled><i class="fa fa-plus"></i><b> Insert a title</b></button> <button style="margin-bottom: 10px" class="btn btn-danger"><div class="spinner-grow spinner-grow-sm" role="status"><span class="sr-only">Loading...</span></div></button>`
                    );
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + join_selected_values,
                        success: function(data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents('tr').remove();
                                });
                                baap.html(
                                    `<button style="margin-bottom: 10px" class="btn btn-secondary" disabled><i class="fa fa-plus"></i><b> Insert a title</b></button> <button style="margin-bottom: 10px" class="btn btn-warning" type="button" disabled><span class="spinner-border spinner-border-sm" role="status"></span>  Refreshing..</button>`
                                    );
                                alert(data['success']);
                                location.reload(true);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Something went seriously wrong');
                            }
                        },
                        error: function(data) {
                            alert(data.responseText);

                        }
                    });
                    $.each(allVals, function(index, value) {
                        var rows = $('table tr').filter("[data-row-id='" + value + "']");
                        rows.remove();
                    });
                }
            }
        });
        $('.delete_single').on('click', function(e) {

            var baap = $(this).parent();
            baap.html(
                `<button style="margin-bottom: 10px" class="btn btn-danger"><div class="spinner-grow spinner-grow-sm" role="status"><span class="sr-only">Loading...</span></div></button>`
            );

            var selected_values = [];
            selected_values.push($(this).attr('data-id'));
            $.ajax({
                url: $(this).data('url'),
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: 'ids=' + selected_values,
                success: function(data) {
                    if (data['success']) {

                        baap.html(
                            `<button style="margin-bottom: 10px" class="btn btn-warning" type="button" disabled><span class="spinner-border spinner-border-sm" role="status"></span> <span class="sr-only"> Refreshing..</span></button>`
                            );
                        alert(data['success']);
                        baap.parent().remove();
                        location.reload(true);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Something went seriously wrong');
                    }
                },
                error: function(data) {
                    alert(data.responseText);

                }
            });

            $.each(selected_values, function(index, value) {
                var rows = $('table tr').filter("[data-row-id='" + value + "']");
                rows.remove();
            });



        });


    });

</script>

</html>
