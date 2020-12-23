<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" http-equiv="encoding" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Titles | RightOnRittman</title>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet"> --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.css" rel="stylesheet">
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
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
                <a class="nav-link nav-link-collapse" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                  <i class="fa fa-fw fa-wrench"></i>
                  <span class="nav-link-text">Modules</span>
                </a>
                <ul class="sidenav-second-level collapse show" id="collapseComponents">
                  <li>
                    <div class="p-3 ml-4 bg-secondary text-white">Titles</div>
                    {{-- <a class="text-white">Packages</a> --}}
                  </li>
                  <li>
                    <a href="">Webisodes</a>
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
                <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{Auth::user()->name}}
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
              <li class="breadcrumb-item active">Titles</li>
            </ol>
            
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-database"></i> Titles
              </div>
              <div class="card-body">
                @if(session('insertStatus'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <h4>Amazing!</h4>
                  <p>{{session('insertStatus')}}</p>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @elseif(session('editStatus'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <h4>Edit done!</h4>
                  <p>{{session('editStatus')}}</p>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                <div>
                  <button style="margin-bottom: 10px" class="btn btn-secondary" data-toggle="modal" data-target="#insertModal">
                    <i class="fa fa-plus"></i>
                    <b>Insert a title</b>
                  </button>
                  <button style="margin-bottom: 10px" class="btn btn-danger delete_all" data-url="{{url('dashboard/titlesDelete')}}">
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
                                <th>id</th>
                                <th>name</th>
                                <th>year</th>
                                <th>type</th>
                                <th>genre</th>
                                <th>links</th>
                                <th>age</th>
                                <th>duration</th>
                                <th>description</th>
                                <th>views</th>
                                <th>actions</th>
                            </tr>
                    </thead>
                    <tbody>
                      @foreach($titles as $title)
                        <tr id="{{$title->id}}">
                          <td><input type="checkbox" class="sub_chk" data-id="{{$title->id}}"></td>
                          <td>{{$title->id}}</td>
                          <td>{{$title->name}}</td>
                          <td>{{$title->year}}</td>
                          <td>{{$title->type}}</td>
                          <td>{{$title->genre}}</td>
                          <td>
                              <p><a href="{{$title->long_poster}}" target="_blank">Long</a></p>
                              <p><a href="{{$title->wide_poster}}" target="_blank">Wide</a></p>
                              <p><a href="{{$title->trailer_link}}" target="_blank">Trailer</a></p>
                              <p><a href="{{$title->asset}}" target="_blank">Asset</a></p>
                              <p><a href="{{$title->vtt}}" target="_blank">VTT</a></p>
                          </td>
                          <td>{{$title->age}}</td>
                          <td>{{$title->duration}}</td>
                          <td>{{$title->description}}</td>
                          <td>{{$title->views}}</td>
                          <td>
                            <button style="margin-bottom: 10px" class="btn btn-outline-danger delete_single" data-url="{{url('dashboard/titlesDelete')}}" data-id="{{$title->id}}">
                                <i class="fa fa-trash"></i>
                            </button>
                            <button style="margin-bottom: 10px" class="btn btn-outline-primary edit_single" data-id="{{$title->id}}" data-name="{{$title->name}}" data-year="{{$title->year}}" data-type="{{$title->type}}" data-genre="{{$title->genre}}" data-longposter="{{$title->long_poster}}" data-wideposter="{{$title->wide_poster}}" data-trailerlink="{{$title->trailer_link}}" data-asset="{{$title->asset}}" data-vtt="{{$title->vtt}}" data-age="{{$title->age}}" data-duration="{{$title->duration}}" data-description="{{$title->description}}" data-views="{{$title->views}}" data-toggle="modal" data-target="#editModal">
                              <i class="fa fa-pencil"></i>
                            </button>
                          </td>
                        </tr>
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
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalTitle">Edit title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="{{url('dashboard/titlesUpdate')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="form-row">
                        <div class="form-group col md-4">
                            <label for="editTitleId">DB id</label>
                            <input type="text" class="form-control" id="editTitleId" name="editTitleId" readonly>
                        </div>
                        <div class="form-group col md-8">
                            <label for="editTitleViews">Views</label>
                            <input type="text" class="form-control" id="editTitleViews" name="editTitleViews" readonly>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-8">
                          <label for="editTitleName">Name</label>
                          <input type="text" class="form-control" id="editTitleName" name="editTitleName" required>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="editTitleYear">Year of release</label>
                          <input type="text" class="form-control" id="editTitleYear" name="editTitleYear" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="editTitleType">Type</label>
                          <input type="text" class="form-control" id="editTitleType" name="editTitleType" required>
                          
                        </div>
                        
                        <div class="form-group col-md-8">
                          <label for="editTitleGenre">Comma-separated genres</label>
                          <input type="text" class="form-control" id="editTitleGenre" name="editTitleGenre" required>                        
                        </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="editTitleLongPoster">Long Poster</label>
                              <input type="text" class="form-control" id="editTitleLongPoster" name="editTitleLongPoster">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="editTitleWidePoster">Wide Poster</label>
                            <input type="text" class="form-control" id="editTitleWidePoster" name="editTitleWidePoster">                        
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-3">
                              <label for="editTitleTrailerLink">Trailer Link</label>
                              <input type="text" class="form-control" id="editTitleTrailerLink" name="editTitleTrailerLink">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="editTitleAsset">Asset</label>
                            <input type="text" class="form-control" id="editTitleAsset" name="editTitleAsset" required>                        
                          </div>
                          <div class="form-group col-md-3">
                              <label for="editTitleVTT">VTT</label>
                              <input type="text" class="form-control" id="editTitleVTT" name="editTitleVTT">                        
                            </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="editTitleAge">Age</label>
                              <input type="text" class="form-control" id="editTitleAge" name="editTitleAge" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="editTitleAsset">Duration</label>
                            <input type="text" class="form-control" id="editTitleDuration" name="editTitleDuration" required>                        
                          </div>       
                      </div>
                      <div class="form-group">
                        <label for="editTitleDescription">Description</label>
                        <textarea type="text" class="form-control" id="editTitleDescription" name="editTitleDescription" rows="6" required></textarea>
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
          
          <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="insertModalLongTitle">Insert a title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{url('dashboard/titles')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <label for="inputTitleName">Name</label>
                        <input type="text" class="form-control" id="inputTitleName" name="inputTitleName" placeholder="eg: The Social Dilemma" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputTitleYear">Year of release</label>
                        <input type="text" class="form-control" id="inputTitleYear" name="inputTitleYear" placeholder="eg: 2019" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputTitleType">Type</label>
                        <input type="text" class="form-control" id="inputTitleType" name="inputTitleType" placeholder="eg: Movie | Series" required>
                        
                      </div>
                      
                      <div class="form-group col-md-8">
                        <label for="inputTitleGenre">Comma-separated genres</label>
                        <input type="text" class="form-control" id="inputTitleGenre" name="inputTitleGenre" placeholder="eg: Thriller, Mystery" required>                        
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputTitleLongPoster">Long Poster</label>
                            <input type="text" class="form-control" id="inputTitleLongPoster" name="inputTitleLongPoster" placeholder="eg: https://...">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputTitleWidePoster">Wide Poster</label>
                          <input type="text" class="form-control" id="inputTitleWidePoster" name="inputTitleWidePoster" placeholder="eg: https://...">                        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputTitleTrailerLink">Trailer Link</label>
                            <input type="text" class="form-control" id="inputTitleTrailerLink" name="inputTitleTrailerLink" placeholder="eg: https://youtube.com...">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputTitleAsset">Asset</label>
                          <input type="text" class="form-control" id="inputTitleAsset" name="inputTitleAsset" placeholder="eg: https://..." required>                        
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTitleVTT">VTT</label>
                            <input type="text" class="form-control" id="inputTitleVTT" name="inputTitleVTT" placeholder="eg: https://...">                        
                          </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputTitleAge">Age</label>
                            <input type="text" class="form-control" id="inputTitleAge" name="inputTitleAge" placeholder="eg: 12+" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputTitleAsset">Duration</label>
                          <input type="text" class="form-control" id="inputTitleDuration" name="inputTitleDuration" placeholder="eg: 1h 2m" required>                        
                        </div>       
                    </div>
                    <div class="form-group">
                      <label for="inputTitleDescription">Description</label>
                      <textarea type="text" class="form-control" id="inputTitleDescription" name="inputTitleDescription" placeholder="eg: This movie includes..." rows="6" required></textarea>
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
        $('#editModal').on('show.bs.modal',function(e)
        {
          var id=$(e.relatedTarget).data('id');
          var titleName=$(e.relatedTarget).data('name');
          var titleYear=$(e.relatedTarget).data('year');
          var titleType=$(e.relatedTarget).data('type');
          var titleGenre=$(e.relatedTarget).data('genre');
          var titleLongPoster=$(e.relatedTarget).data('longposter');
          var titleWidePoster=$(e.relatedTarget).data('wideposter');
          var titleTrailerLink=$(e.relatedTarget).data('trailerlink');
          var titleAsset=$(e.relatedTarget).data('asset');
          var titleVTT=$(e.relatedTarget).data('vtt');
          var titleAge=$(e.relatedTarget).data('age');
          var titleDuration=$(e.relatedTarget).data('duration');
          var titleDescription=$(e.relatedTarget).data('description');
          var titleViews=$(e.relatedTarget).data('views');

          $(e.currentTarget).find('input[name="editTitleId"]').val(id);
          $(e.currentTarget).find('input[name="editTitleName"]').val(titleName);
          $(e.currentTarget).find('input[name="editTitleYear"]').val(titleYear);
          $(e.currentTarget).find('input[name="editTitleType"]').val(titleType);
          $(e.currentTarget).find('input[name="editTitleGenre"]').val(titleGenre);
          $(e.currentTarget).find('input[name="editTitleLongPoster"]').val(titleLongPoster);
          $(e.currentTarget).find('input[name="editTitleWidePoster"]').val(titleWidePoster);
          $(e.currentTarget).find('input[name="editTitleTrailerLink"]').val(titleTrailerLink);
          $(e.currentTarget).find('input[name="editTitleAsset"]').val(titleAsset);
          $(e.currentTarget).find('input[name="editTitleVTT"]').val(titleVTT);
          $(e.currentTarget).find('input[name="editTitleAge"]').val(titleAge);
          $(e.currentTarget).find('input[name="editTitleDuration"]').val(titleDuration);
          $(e.currentTarget).find('input[name="editTitleViews"]').val(titleViews);
          $(e.currentTarget).find('textarea[name="editTitleDescription"]').val(titleDescription);
          
        });
        
        $(document).ready(function(){
            $('#master').on('click',function(e){
                if($(this).is(':checked',true))
                {
                    $('.sub_chk').prop('checked',true);
                }
                else{
                    $('.sub_chk').prop('checked',false);
                }
            });
        
        $('.delete_all').on('click',function(e){
            var allVals=[];
            $(".sub_chk:checked").each(function(){
                allVals.push($(this).attr('data-id'));
            });
            if(allVals.length<=0)
            {
                alert("Please select row");
            }
            else{
                
                var check=confirm("Are you sure you want to delete this row?");
                if(check==true){
                    var join_selected_values=allVals.join(",");
                    var baap=$(this).parent();
                    baap.html(
                        `<button style="margin-bottom: 10px" class="btn btn-secondary" disabled><i class="fa fa-plus"></i><b> Insert a title</b></button> <button style="margin-bottom: 10px" class="btn btn-danger"><div class="spinner-grow spinner-grow-sm" role="status"><span class="sr-only">Loading...</span></div></button>`
                    );
                    $.ajax({
                        url:$(this).data('url'),
                        type:'DELETE',
                        headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                        data:'ids='+join_selected_values,
                        success:function(data){
                            if(data['success']){
                                $(".sub_chk:checked").each(function(){
                                    $(this).parents('tr').remove();
                                });
                                baap.html(`<button style="margin-bottom: 10px" class="btn btn-secondary" disabled><i class="fa fa-plus"></i><b> Insert a package</b></button> <button style="margin-bottom: 10px" class="btn btn-warning" type="button" disabled><span class="spinner-border spinner-border-sm" role="status"></span>  Refreshing..</button>`);
                                alert(data['success']);
                                location.reload(true);
                            }
                            else if(data['error']){
                                alert(data['error']);                             
                            }
                            else{
                                alert('Something went seriously wrong');
                            }
                        },
                        error:function(data){
                            alert(data.responseText);
                            
                        }
                    });
                    $.each(allVals,function(index,value){          
                        var rows=$('table tr').filter("[data-row-id='"+value+"']");
                        rows.remove();
                    });
                }
            }
        });
        $('.delete_single').on('click',function(e){
            
            var baap=$(this).parent();
            baap.html(
                `<button style="margin-bottom: 10px" class="btn btn-danger"><div class="spinner-grow spinner-grow-sm" role="status"><span class="sr-only">Loading...</span></div></button>`
            );
                
            var selected_values=[];
            selected_values.push($(this).attr('data-id'));
            $.ajax({
                url:$(this).data('url'),
                type:'DELETE',
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                data:'ids='+selected_values,
                success:function(data){
                    if(data['success']){
                      
                      baap.html(`<button style="margin-bottom: 10px" class="btn btn-warning" type="button" disabled><span class="spinner-border spinner-border-sm" role="status"></span> <span class="sr-only"> Refreshing..</span></button>`);
                      alert(data['success']);
                      baap.parent().remove();
                      location.reload(true);
                    }
                    else if(data['error']){
                        alert(data['error']);                             
                    }
                    else{
                        alert('Something went seriously wrong');
                    }
                },
                error:function(data){
                    alert(data.responseText);
                    
                }
            });
            
            $.each(selected_values,function(index,value){
                var rows=$('table tr').filter("[data-row-id='"+value+"']");
                rows.remove();
            });
                    
            
                    
        });
        
        
        });
      </script>
</html>