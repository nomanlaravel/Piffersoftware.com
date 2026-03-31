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
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="social_media_analytics-tab" data-bs-toggle="tab"
                    data-bs-target="#social_media_analytics" type="button" role="tab"
                    aria-controls="social_media_analytics" aria-selected="false">
                    Social Media Report
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Quotation-tab" data-bs-toggle="tab" data-bs-target="#Quotation"
                    type="button" role="tab" aria-controls="Quotation" aria-selected="false">
                    Quotation Log Registered
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Feedback-tab" data-bs-toggle="tab" data-bs-target="#Feedback" type="button"
                    role="tab" aria-controls="Feedback" aria-selected="false">
                    Daily Feedback
                </button>
                </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="rfq-security-tab" data-bs-toggle="tab" data-bs-target="#rfq-security" type="button" role="tab" aria-controls="rfq-security" aria-selected="false">
                            Active RFQ/Tender Log Register For Piffers Security
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="rfq-sedulous-tab" data-bs-toggle="tab" data-bs-target="#rfq-sedulous" type="button" role="tab" aria-controls="rfq-sedulous" aria-selected="false">
                            Active RFQ/Tender Log Register For Piffers Sedulous
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="client-report-tab" data-bs-toggle="tab"
                            data-bs-target="#client-report" type="button" role="tab">
                            Reports like Closed/Terminated Client List
                        </button>
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
                                <input type="date" name="daily_report_date" class="form-control"
                                    value="{{ request('daily_report_date') }}">
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
            <div class="tab-pane fade " id="social_media_analytics" role="tabpanel" aria-labelledby="files-tab">
                {{-- <h4>Files Reports Nationwide</h4> --}}
                <form method="GET" action="{{ route('admin.admin.social.report') }}">
                    <div class="row mb-4">
                            <div class="col-md-3">
                                <label>Report Date</label>
                                <input type="date" name="social_report_date" class="form-control"
                                    value="{{ request('social_report_date') }}">
                            </div>
                        <!-- Month -->
                        <div class="col-md-2">
                            <label class="form-label">Month</label>
                            <input type="month" id="monthInput" name="month" class="form-control"
                                value="{{ request('month') }}">
                        </div>
                        <div class="col-md-3">
                            <label>Region</label>
                            <select name="region" class="form-control">
                                <!-- Default -->
                                <option value="">Select a region</option>
                                <option value="all" {{ request('region') == 'all' ? 'selected' : '' }}>All Regions
                                </option>

                                <!-- Only if regions exist -->
                                @if($regions->isNotEmpty())
                                    @foreach($regions as $region)
                                        <option value="{{ $region }}" {{ request('region') == $region ? 'selected' : '' }}>
                                            {{ $region }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

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
                            
                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-outline-light">
                                <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px"
                                    height="30px">
                            </button>

                        </div>
                        </div>
                </form>
            </div>
             <div class="tab-pane fade " id="Quotation" role="tabpanel" aria-labelledby="files-tab">

            <form method="GET" action="{{ route('admin.quotation.report') }}">
                <div class="row mb-4">
                     <div class="col-md-3">
                                <label>Report Date</label>
                                <input type="date" name="quotation_report_date" class="form-control"
                                    value="{{ request('quotation_report_date') }}">
                            </div>
                    <div class="col-md-2">
                        <label>OR Month</label>
                        <input type="month" name="month" class="form-control" value="{{ request('month') }}">
                    </div>
                    <div class="col-md-2">
                        <label>Region</label>
                        <select name="region" class="form-control">
                            <option value="">Select a Region</option>
                            <option value="all" {{ request('region') == 'all' ? 'selected' : '' }}>All Regions</option>
                            @if(isset($regions))
                                @foreach($regions as $region)
                                    <option value="{{ $region }}" {{ request('region') == $region ? 'selected' : '' }}>
                                        {{ $region }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Branch</label>
                        <select name="branch" class="form-control">
                            <option value="">Select a Branches</option>
                            <option value="all" {{ request('branch') == 'all' ? 'selected' : '' }}>All Branches</option>
                            @if(isset($branches))
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->branch_office_name }}" {{ request('branch') == $branch->branch_office_name ? 'selected' : '' }}>
                                        {{ $branch->branch_office_name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-1 mt-4">
                        <button type="submit" class="btn btn-outline-light">
                            <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="Search"
                                width="30px" height="30px">
                        </button>
                    </div>
                </div>
            </form>
        </div>
         <div class="tab-pane fade " id="Feedback" role="tabpanel" aria-labelledby="files-tab">

            <form method="GET" action="{{ route('admin.feedback.report') }}">
                <div class="row mb-4">
                     <div class="col-md-3">
                                <label>Report Date</label>
                                <input type="date" name="feedback_report_date" class="form-control"
                                    value="{{ request('feedback_report_date') }}">
                            </div>
                    <div class="col-md-3">
                        <label>OR Select Month</label>
                        <input type="month" name="month" class="form-control" value="{{ request('month') }}">
                    </div>
                    <div class="col-md-2">
                        <label>Region</label>
                        <select name="region" class="form-control">
                            <option value="">Select a Region</option>
                            <option value="all" {{ request('region') == 'all' ? 'selected' : '' }}>All Regions</option>
                            @if(isset($regions))
                                @foreach($regions as $region)
                                    <option value="{{ $region }}" {{ request('region') == $region ? 'selected' : '' }}>
                                        {{ $region }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Branch</label>
                        <select name="branch" class="form-control">
                            <option value="">Select a branch</option>
                            <option value="all" {{ request('branch') == 'all' ? 'selected' : '' }}>All Branches
                            </option>
                            @foreach (App\Models\Admin::all() as $branch)
                                <option value="{{ $branch->branch_office_name }}" {{ request('branch') == $branch->branch_office_name ? 'selected' : '' }}>
                                    {{ $branch->branch_office_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mt-4">
                        <button type="submit" class="btn btn-outline-light mt-2">
                            <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="Search"
                                width="30px" height="30px">
                        </button>
                    </div>
                </div>
            </form>
        </div>
         <div class="tab-pane fade" id="client-report" role="tabpanel">

    <form method="GET" action="{{ route('admin.client') }}" class="mt-3">
        <div class="row mb-4">

            <!-- Status Filter -->
            <div class="col-md-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>
                        Active
                    </option>
                    <option value="terminated" {{ request('status') == 'terminated' ? 'selected' : '' }}>
                        Terminated
                    </option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="col-md-2 mt-4">
                <button type="submit" class="btn btn-outline-light mt-2">
                    <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png"
                        alt="Search" width="30px" height="30px">
                </button>
            </div>

        </div>
    </form>

</div>

            <!-- New RFQ/Tender Security Tab -->
            <div class="tab-pane fade" id="rfq-security" role="tabpanel" aria-labelledby="rfq-security-tab">
                <form method="GET" action="{{ route('search.requirement.report') }}">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label>Region</label>
                            <select name="rhq" class="form-control">
                                <option value="">-- Select Region --</option>
                                <option value="all" {{ request('rhq') == 'all' ? 'selected' : '' }}>All Branches</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->branch_office_name }}" {{ request('rhq') == $branch->branch_office_name ? 'selected' : '' }}>
                                        {{ $branch->branch_office_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Start Date</label>
                            <input type="date" name="s_date" class="form-control" value="{{ request('s_date') }}">
                        </div>
                        <div class="col-md-3">
                            <label>End Date</label>
                            <input type="date" name="e_date" class="form-control" value="{{ request('e_date') }}">
                        </div>
                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-outline-light">
                                <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px" height="30px">
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- New RFQ/Tender Sedulous Tab -->
            <div class="tab-pane fade" id="rfq-sedulous" role="tabpanel" aria-labelledby="rfq-sedulous-tab">
                <form method="GET" action="{{ route('search.active.requirement.report') }}">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label>Region</label>
                            <select name="rhq" class="form-control">
                                <option value="">-- Select Region --</option>
                                <option value="all" {{ request('rhq') == 'all' ? 'selected' : '' }}>All Branches</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->branch_office_name }}" {{ request('rhq') == $branch->branch_office_name ? 'selected' : '' }}>
                                        {{ $branch->branch_office_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Start Date</label>
                            <input type="date" name="s_date" class="form-control" value="{{ request('s_date') }}">
                        </div>
                        <div class="col-md-3">
                            <label>End Date</label>
                            <input type="date" name="e_date" class="form-control" value="{{ request('e_date') }}">
                        </div>
                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-outline-light">
                                <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px" height="30px">
                            </button>
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
