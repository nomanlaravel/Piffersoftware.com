@include('layouts.header')

@yield('main')
<link rel="stylesheet" href="css/mBox.css">

<div class="customer_form">
    @include('headerlogout')
    <div class="row mt-3">
        <div class="col-lg-6">
            <h4><i><b>Import Branches:</b></i></h4>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary">Import</button>
            </form>
        </div>

        <div class="col-lg-6">
            <h4><i><b>Search Branches:</b></i></h4>

            <!-- Search Form -->
            <div class="input-group mb-3">
                <input type="text" id="admin-search" class="form-control" placeholder="Search here...">
            </div>
        </div>
    </div>

    <div class="tab-content" id="myTabContent">
        <!--<h5 class="mt-3" style="font-weight: 700;">-->
        <!--    Branches and Head Office-->
        <!--</h5>-->
        <div class="modal-header border-0">
            <div style="display:flex; column-gap:10px; align-items:center">
                <button type="button" class="btn btn-link" onclick="history.back()">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <h5 class="mt-3" style="font-weight: 700;"> Branches and Head Office </h5>
            </div>
        </div>
        <!--Toggle tab- Status Form-->
        <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">
            @if (auth()->user()->role !== 'client')
                <div class=" float-end">
                    <a class="btn btn-primary btn-sm " href="{{ url('postadmin') }}">
                        + New Branch
                    </a>
                    {{-- <a href="{{ route('weakly.recordes') }}" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-plus"></i> Record</a> --}}
                </div>
            @endif
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Daily Branch Report</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Weekly Milleage Record</button>
                    </li>
                </ul>
                <div class="tab-content mt-3" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form method="GET" action="{{ route('search_baranceshes.admins') }}" class="mt-3">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <label>Daily Branch Report</label>
                                <select name="branch_office_name" class="form-control">
                                    <option value="">-- Select Branch --</option>
                                    <option value="all" {{ request('branch_office_name') == 'all' ? 'selected' : '' }}>All
                                        Branches</option>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->branch_office_name }}"
                                            {{ request('branch_office_name') == $branch->branch_office_name ? 'selected' : '' }}>
                                            {{ $branch->branch_office_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Report Date</label>
                                <input type="date" name="report_date" class="form-control"
                                    value="{{ request('report_date') }}">
                            </div>
                            <div class="col-md-3 mt-4">
                                <button type="submit" class="btn btn-outline-light"><img
                                        src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt=""
                                        width="30px" height="30px"></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form method="GET" action="{{ route('admin.moveable.assets') }}">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label>Daily Branch Report</label>
                        <select name="branch_office_name" class="form-control">
                            <option value="">-- Select Branch --</option>
                            <option value="all" {{ request('branch_office_name') == 'all' ? 'selected' : '' }}>All
                                Branches</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->branch_office_name }}"
                                    {{ request('branch_office_name') == $branch->branch_office_name ? 'selected' : '' }}>
                                    {{ $branch->branch_office_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 mt-4">
                        <button type="submit" class="btn btn-outline-light"><img
                                src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt=""
                                width="30px" height="30px"></button>
                    </div>
                </div>
            </form>
            </div>
            </div>
            <div class="table-responsive mt-2">
                <div style="height: 380px; overflow-y: auto;">
                    <table class="table table-bordered table-striped table-fixed">
                        <thead>
                            <tr>
                                <th class="col-lg-1 col-sm-1 col-1">Branch ID</th>
                                <th class="col-lg-3 col-sm-5 col-1">Branch Name</th>
                                <th class="col-lg-4 col-sm-5 col-1">Branch Reporting To</th>
                                <th class="col-lg-2 col-sm-5 col-1">PTCL No.</th>
                                <th class="col-lg-1 col-sm-1 col-1">Action</th>
                            </tr>
                        </thead>

                        <tbody id="branch-table-body">
                            @foreach ($branches as $branch)
                                <tr>
                                    <td>{{ $branch->branch_id }}</td>
                                    <td>{{ $branch->branch_office_name }}</td>
                                    <td>{{ $branch->branch_category }}</td>
                                    <td>{{ $branch->branch_ptcl }}</td>
                                    <td style="display:flex; gap: 10px; align-items: center;">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('crotask', ['id' => $branch->id]) }}"><i
                                                class="fa-solid fa-bars-progress"></i></a>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('viewadmin', ['id' => $branch->id]) }}"><i
                                                class="fa-solid fa-eye"></i></a>
                                        @if (auth()->user()->role !== 'client')
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('editadmin', ['id' => $branch->id]) }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('deleteadmin', ['id' => $branch->id]) }}"
                                                class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function() {
        function searchAdmins() {
            var searchText = $('#admin-search').val().toLowerCase();
            $.ajax({
                url: "{{ route('search.admins') }}",
                type: 'GET',
                data: {
                    search: searchText
                },
                success: function(data) {
                    $('table tbody').html(data.html);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error: ", status, error);
                    $('table tbody').html(
                        '<tr><td colspan="5">There was an error processing your request.</td></tr>'
                        );
                }
            });
        }

        $('#admin-search').on('input', searchAdmins);
    });
</script>
