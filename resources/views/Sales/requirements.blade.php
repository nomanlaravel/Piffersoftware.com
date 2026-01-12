@include('layouts.header')

@yield('main')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<div class="customer_form">
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
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#branches"
                type="button" role="tab" aria-controls="branches" aria-selected="true"> Total Requirements
            </button>
        </li>
    </ul>

    @if (Auth::user()->role != 'customer')
    <div class="row mt-3">
        <div class="col-lg-6">
            <h4><i><b>Import Requirements:</b></i></h4>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary">Import</button>
            </form>
        </div>

        <div class="col-lg-6">
            <h4><i><b>Search Requirement:</b></i></h4>

            <!-- Search Form -->
            <div class="input-group mb-3">
                <input type="text" id="customer-search" class="form-control" placeholder="Search here...">
            </div>

            <div id="search-results"></div>

        </div>
    </div>
    @endif

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">

            @if (Auth::user()->role != 'customer' && Auth::user()->role != 'client')
                <div class="new_branch mt-2">
                    <a href="{{ route('requirements.post') }}"><button>+ New Requirement</button></a>
                </div>
            @endif
            @if ($requirements->isEmpty())
                <p>No requirements found.</p>
            @else
            <ul class="nav nav-tabs mb-3" id="campaignTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="files-tab" data-bs-toggle="tab" data-bs-target="#files" type="button" role="tab" aria-controls="files" aria-selected="true">
                        Active RFQ/Tender Log Register For Piffers Security
                    </button>
                </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link" id="Active-tab" data-bs-toggle="tab" data-bs-target="#Active" type="button" role="tab" aria-controls="Active" aria-selected="true">
                        Active RFQ/Tender Log Register For Piffers Sedulous
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="campaignTabContent">
                <!-- Files Reports Nationwide Tab -->
                <div class="tab-pane fade show active" id="files" role="tabpanel" aria-labelledby="files-tab">
                    {{-- <h4>Files Reports Nationwide</h4> --}}
                <form method="GET" action="{{ route('search.requirement.report') }}">
                    <div class="row mb-4">
                        <!-- RHQ Dropdown -->
                        <div class="col-md-3">
                            <label>Region</label>
                            <select name="rhq" class="form-control">
                                <option value="">-- Select Region --</option>
                                <option value="all" {{ request('rhq') == 'all' ? 'selected' : '' }}>All Branches</option>
                                @foreach ($requirements as $rhq)
                                    <option value="{{ $rhq->rhq }}" {{ request('rhq') == $rhq->rhq ? 'selected' : '' }}>
                                        {{ $rhq->rhq }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Date Input -->
                        <div class="col-md-3">
                            <label>Start Date</label>
                            <input type="date" name="s_date" class="form-control" value="{{ request('s_date') }}">
                        </div>
                        <div class="col-md-3">
                            <label>End Date</label>
                            <input type="date" name="e_date" class="form-control" value="{{ request('e_date') }}">
                        </div>

                            <!-- Submit Button -->
                            <div class="col-md-2 mt-4">
                                <button type="submit" class="btn btn-outline-light">
                                    <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px" height="30px">
                                </button>
                            </div>
                        </div>
                </form>


                </div>
                <div class="tab-pane fade show" id="Active" role="tabpanel" aria-labelledby="Active-tab">
                    {{-- <h4>Files Reports Nationwide</h4> --}}
                <form method="GET" action="{{ route('search.active.requirement.report') }}">
                    <div class="row mb-4">
                        <!-- RHQ Dropdown -->
                        <div class="col-md-3">
                            <label>Region</label>
                            <select name="rhq" class="form-control">
                                <option value="">-- Select Region --</option>
                                <option value="all" {{ request('rhq') == 'all' ? 'selected' : '' }}>All Branches</option>
                                @foreach ($requirements as $rhq)
                                    <option value="{{ $rhq->rhq }}" {{ request('rhq') == $rhq->rhq ? 'selected' : '' }}>
                                        {{ $rhq->rhq }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Date Input -->
                        <div class="col-md-3">
                            <label>Start Date</label>
                            <input type="date" name="s_date" class="form-control" value="{{ request('s_date') }}">
                        </div>
                        <div class="col-md-3">
                            <label>End Date</label>
                            <input type="date" name="e_date" class="form-control" value="{{ request('e_date') }}">
                        </div>

                            <!-- Submit Button -->
                            <div class="col-md-2 mt-4">
                                <button type="submit" class="btn btn-outline-light">
                                    <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px" height="30px">
                                </button>
                            </div>
                        </div>
                </form>


                </div>
            </div>
                <table class="table table-bordered table-striped table-fixed mt-3">
                    <thead>
                        <tr>
                            <th>Lead Generated By</th>
                            <th>Prospect No</th>
                            <th>Category</th>
                            <th>RHQ</th>
                            <th>Branch Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requirements as $requirement)
                            <tr>
                                <td>{{ $requirement->leadBy }}</td>
                                <td>{{ $requirement->prospectNo }}</td>
                                <td>{{ $requirement->category }}</td>
                                <td>{{ $requirement->rhq }}</td>
                                <td>{{ $requirement->branch_name }}</td>
                                <td>
                                    <a href="{{ route('requirements.view', ['id' => $requirement->id]) }}">
                                        <i class="material-icons" style="color: rgb(92, 92, 255);">visibility</i>
                                    </a>
                                    <a href="{{ route('requirements.edit', ['id' => $requirement->id]) }}">
                                         <i class="material-icons" stlye="color: rgb(57, 221, 57);">edit</i>
                                    </a>
                                    <a href="{{ route('requirements.delete', ['id' => $requirement->id]) }}">
                                         <i class="material-icons" stlye="color: rgb(57, 221, 57);">delete</i>
                                    </a>
                                     {{-- @if (Auth::user()->role != 'customer' && Auth::user()->role != 'client')
                                      <a href="{{ route('editcustomer', ['id' => $requirement->id]) }}" class="ml-2">
                                       <i class="material-icons" stlye="color: rgb(57, 221, 57);">edit</i>
                                       </a>
                                    @endif --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @endif
        </div>
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
                    <p>Are you sure you want to delete?</p>
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

@include('layouts.footer')

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
$(document).ready(function () {
    function searchCustomers() {
        var searchText = $('#customer-search').val().toLowerCase();
        $.ajax({
            url: "{{ route('search.customers') }}",
            type: 'GET',
            data: { search: searchText },
            success: function (data) {
                // Update the table body with the new rows
                $('table tbody').html(data.html);
            },
            error: function (xhr, status, error) {
                console.error("AJAX error: ", status, error);
                console.error("Response: ", xhr.responseText);
                $('table tbody').html('<tr><td colspan="4">There was an error processing your request.</td></tr>');
            }
        });
    }

    $('#search-button').click(searchCustomers);

    $('#customer-search').on('input', searchCustomers);
});
</script>
