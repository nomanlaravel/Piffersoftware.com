@include('layouts.header')   
@yield('main')  
<div class="customer_form">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="jquery-3.7.1.min.js"></script>
    <div id="main" style="margin-left: 92%;">
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>

    <div id="mySidebar" class="sidebar admin-setting">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
        <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration Setting</a>
        <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
        <hr>
        <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
    </div>
        <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#branches" type="button" role="tab" aria-controls="branches" aria-selected="true">Staff Members </button>
        </li>
    </ul>
     
    <!--<div class="row mt-3">-->
    <!--    @if (Auth::user()->role != 'customer')-->
    <!--    <div class="col-lg-6">-->
    <!--        <h4><i><b>Import Employees:</b></i></h4>-->

    <!--        @if ($message = Session::get('success'))-->
    <!--            <div class="alert alert-success">-->
    <!--                <p>{{ $message }}</p>-->
    <!--            </div>-->
    <!--        @endif-->

    <!--        <form action="{{ route('hrm.import') }}" method="POST" enctype="multipart/form-data">-->
    <!--            @csrf-->
    <!--            <div class="form-group">-->
    <!--                <input type="file" class="form-control" name="file" required>-->
    <!--            </div>-->
    <!--            <button type="submit" class="btn btn-primary">Import</button>-->
    <!--        </form>-->
    <!--    </div>-->

    <!--    <div class="col-lg-6">-->
    <!--        <h4><i><b>Search Employee:</b></i></h4>-->

            <!-- Search Form -->
    <!--        <div class="input-group mb-3">-->
    <!--            <input type="text" id="hrm-search" class="form-control" placeholder="Search here...">-->
    <!--        </div>-->

    <!--        <div id="search-results"></div>-->

    <!--    </div>-->
    <!--    @endif-->
    <!--</div>-->       

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">
            <!--<h5 class="mt-3" style="font-weight: 700;">-->
            <!--    Human Resource Management-->
            <!--</h5>-->
            <div class="modal-header border-0">
                <div style="display:flex; column-gap:10px; align-items:center">
                    <button type="button" class="btn btn-link" onclick="history.back()">
                     <i class="bi bi-arrow-left"></i>
                    </button>
                    <h5 class="mt-3" style="font-weight: 700;"> sub guard: </h5>
                </div>
              </div>
            <!--<div class="new_branch mt-2" style="width:100%;">-->
            <!--    @if (Auth::user()->role != 'customer' && Auth::user()->role != 'client')-->
            <!--        <a class="btn btn-primary" href="{{ url('posthrm') }}">+ New Staff</a>-->
            <!--    @endif-->
            <!--</div>-->
            <div class="table-responsive mt-2">
                <div>
                    <table class="table table-bordered table-striped table-fixed">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>Category</th>
                                <th>Designation</th>
                                <th>Hired At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="employee-table-body">
                            @foreach($subGuards as $hrm)
                            <tr>
                                <td>{{$hrm->name}}</td>
                                <td>{{$hrm->fname}}</td>
                                <td>{{$hrm->category}}</td>
                                <td>{{$hrm->designation}}</td>
                                <td>{{$hrm->hired_at}}</td>
                                <td style="display:flex; justify-content-between gap: 10px; align-items: center;">
                                    <form action="{{ route('viewhrm', ['id' => $hrm->id]) }}" >
                                        @csrf
                                        <button type="submit" class="btn" ><i class="material-icons" style="color: rgb(92, 92, 255);">visibility</i></button>
                                    </form>
                                    @if (Auth::user()->role != 'customer' && Auth::user()->role != 'client')
                                    <form action="{{ route('edithrm', ['id' => $hrm->id]) }}" >
                                        @csrf
                                        <button type="submit" class="btn" ><i class="material-icons" style="color: rgb(57, 221, 57);">edit</i></button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
          <style>
                .pagination {
                    display: flex;
                    justify-content: center;
                    gap: 8px;
                    margin-left:20px;
                }

                .pagination .page-item .page-link {
                    border-radius: 5px;
                    padding: 8px 12px;
                    color: #007bff;
                    border: 1px solid #ddd;
                    transition: 0.3s;
                }

                .pagination .page-item.active .page-link {
                    background-color: #007bff;
                    color: white;
                    border-color: #007bff;
                }

                .pagination .page-item .page-link:hover {
                    background-color: #f8f9fa;
                }
            </style>

      <div class="d-flex justify-content-between mt-4">
               
            </div>
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to Delete?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <form id="deleteForm" action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    
 </div>
@include('layouts.footer')