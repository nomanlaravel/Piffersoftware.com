@include('layouts.header')

@yield('main')
<link rel="stylesheet" href="css/mBox.css">
<div class="customer_form">
    @include('headerlogout')
    <div class="row mt-3">
        <div class="col-lg-6">
            <h4><i><b>Import Campaigns:</b></i></h4>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary">Import</button>
            </form>
        </div>

        <div class="col-lg-6">
            <h4><i><b>Search Campaigns:</b></i></h4>

            <!-- Search Form -->
            <div class="input-group mb-3">
                <input type="text" id="admin-search" class="form-control" placeholder="Search here...">
            </div>
        </div>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="modal-header border-0">
            <div style="display:flex; column-gap:10px; align-items:center">
                <button type="button" class="btn btn-link" onclick="history.back()">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <h5 class="mt-3" style="font-weight: 700;">Total Campaigns </h5>
            </div>
            @if (auth()->user()->role !== 'client')
            <div>
                <a class="btn btn-primary float-end" href="{{route('campaign.add')}}">
                    + New Campaign

                </a>
            </div>
            @endif
        </div>
        <!--Toggle tab- Status Form-->
        <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">

            <!-- Add Tabs -->
            <!--<ul class="nav nav-tabs mb-3" id="campaignTab" role="tablist">-->
            <!--     <li class="nav-item active" role="presentation">-->
            <!--        <button class="nav-link" id="mailchimp-tab" data-bs-toggle="tab" data-bs-target="#mailchimp" type="button" role="tab"-->
            <!--            aria-controls="mailchimp" aria-selected="false">-->
            <!--          Log Of Sales Email Campaign Report (Mailchimp)-->
            <!--        </button>-->
            <!--    </li>-->
            <!--    <li class="nav-item" role="presentation">-->
            <!--        <button class="nav-link " id="files-tab" data-bs-toggle="tab" data-bs-target="#files" type="button" role="tab" aria-controls="files"-->
            <!--            aria-selected="true">-->
            <!--            Files Reports Nationwide-->
            <!--        </button>-->
            <!--    </li>-->

            <!--    <li class="nav-item" role="presentation">-->
            <!--        <button class="nav-link" id="social_media_analytics-tab" data-bs-toggle="tab" data-bs-target="#social_media_analytics" type="button"-->
            <!--            role="tab" aria-controls="social_media_analytics" aria-selected="false">-->
            <!--            Social Media Accounts Reporting-->
            <!--        </button>-->
            <!--    </li>-->
            <!--    <li class="nav-item" role="presentation">-->
            <!--        <button class="nav-link" id="social_media_sales_report-tab" data-bs-toggle="tab" data-bs-target="#social_media_sales_report" type="button"-->
            <!--            role="tab" aria-controls="social_media_sales_report" aria-selected="false">-->
            <!--            Sales Register Report-->
            <!--        </button>-->
            <!--    </li>-->
            <!--    <li class="nav-item" role="presentation">-->
            <!--        <button class="nav-link" id="Quotation-tab" data-bs-toggle="tab" data-bs-target="#Quotation" type="button" role="tab"-->
            <!--            aria-controls="Quotation" aria-selected="false">-->
            <!--            Quotation Register Report-->
            <!--        </button>-->
            <!--    </li>-->
            <!--    <li class="nav-item" role="presentation">-->
            <!--        <button class="nav-link" id="Feedback-tab" data-bs-toggle="tab" data-bs-target="#Feedback" type="button" role="tab" aria-controls="Feedback"-->
            <!--            aria-selected="false">-->
            <!--            Feedback Register Report-->
            <!--        </button>-->
            <!--    </li>-->
            <!--    <li class="nav-item" role="presentation">-->
            <!--        <button class="nav-link" id="Nationwide-tab" data-bs-toggle="tab" data-bs-target="#Nationwide" type="button" role="tab"-->
            <!--            aria-controls="Nationwide" aria-selected="false">-->
            <!--            Weekly Handbook Nationwide Report-->
            <!--        </button>-->
            <!--    </li>-->
            <!--    <li class="nav-item" role="presentation">-->
            <!--        <button class="nav-link" id="CroDailyTask-tab" data-bs-toggle="tab" data-bs-target="#CroDailyTask" type="button" role="tab"-->
            <!--            aria-controls="CroDailyTask" aria-selected="false">-->
            <!--            Cro Daily Tasks-->
            <!--        </button>-->
            <!--    </li>-->
            <!--    <li class="nav-item" role="presentation">-->
            <!--            <button class="nav-link" id="tasRecordDairy-tab" data-bs-toggle="tab" data-bs-target="#tasRecordDairy" type="button" role="tab" aria-controls="tasRecordDairy" aria-selected="false">-->
            <!--                    Task Record Dairy-->
            <!--            </button>-->
            <!--        </li>-->

            <!--        <li class="nav-item" role="presentation">-->
            <!--            <button class="nav-link" id="noticeLogSheet-tab" data-bs-toggle="tab" data-bs-target="#noticeLogSheet" type="button" role="tab" aria-controls="noticeLogSheet" aria-selected="false">-->
            <!--                    Notice Log Sheet-->
            <!--            </button>-->
            <!--         </li>-->
            <!--        <li class="nav-item" role="presentation">-->
            <!--            <button class="nav-link" id="weekly-sales-report-tab" data-bs-toggle="tab" data-bs-target="#weekly-sales-report" type="button" role="tab" aria-controls="weekly-sales-report" aria-selected="false">-->
            <!--                    weekly sales report-->
            <!--            </button>-->
            <!--        </li>-->

            <!--</ul>-->

            <!-- Tab Content -->
            <!--<div class="tab-content" id="campaignTabContent">-->
                   <!-- Sales Email Campaign Report Tab -->
            <!--    <div class="tab-pane fade active show" id="mailchimp" role="tabpanel" aria-labelledby="mailchimp-tab">-->
            <!--        {{-- <h4>Log Of Sales Email Campaign Report (Mailchimp)</h4> --}}-->
            <!--        <form method="GET" action="{{ route('sales.email.compaign.search') }}">-->
            <!--            <div class="row mb-4">-->
            <!--                <div class="col-md-2">-->
            <!--                    <label>Campaign Start Date</label>-->
            <!--                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-2">-->
            <!--                    <label>Campaign End Date</label>-->
            <!--                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-3">-->
            <!--                    <label>Campaign Number</label>-->
            <!--                    <input type="text" name="campaign_number" class="form-control" value="{{ request('campaign_number') }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-3">-->
            <!--                    <label>Audience Segment</label>-->
            <!--                    <select name="segment" class="form-control" value="{{ request('segment') }}">-->
            <!--                        <option value="">Select a Segment</option>-->
            <!--                        @foreach (App\Models\Segment::all() as $segment)-->
            <!--                        <option value="{{ $segment->segment_name }}">{{ $segment->segment_name }}</option>-->
            <!--                        @endforeach-->
            <!--                    </select>-->
            <!--                </div>-->
            <!--                <div class="col-md-3">-->
            <!--                    <label>Item Category</label>-->
            <!--                    <select name="item_name" class="form-control">-->
            <!--                        <option value="">Select Category</option>-->
            <!--                        @foreach ($items as $item)-->
            <!--                        <option value="{{ $item->item_name }}">{{ $item->item_name }}</option>-->
            <!--                        @endforeach-->
            <!--                    </select>-->
            <!--                </div>-->
            <!--                <div class="col-md-1 mt-4">-->
            <!--                    <button type="submit" class="btn btn-outline-light">-->
            <!--                        <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px" height="30px">-->
            <!--                    </button>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </form>-->
            <!--    </div>-->
                <!-- Files Reports Nationwide Tab -->
            <!--    <div class="tab-pane fade  " id="files" role="tabpanel" aria-labelledby="files-tab">-->
            <!--        {{-- <h4>Files Reports Nationwide</h4> --}}-->
            <!--        <form method="GET" action="{{ route('search.compaign.admins') }}">-->
            <!--            <div class="row mb-4">-->
            <!--                <div class="col-md-3">-->
            <!--                    <label>Region</label>-->
            <!--                    <select name="region" class="form-control" value="{{ request('region') }}">-->
            <!--                        <option value="">Select a region</option>-->
            <!--                        <option value="all" {{ request('region') == 'all' ? 'selected' : '' }}>All-->
            <!--                    Regions</option>-->
            <!--                        @foreach (App\Models\Region::all() as $region)-->
            <!--                        <option value="{{ $region->region_name }}">{{ $region->region_name }}</option>-->
            <!--                        @endforeach-->
            <!--                    </select>-->
            <!--                </div>-->
            <!--                <div class="col-md-2 mt-4">-->
            <!--                    <button type="submit" class="btn btn-outline-light">-->
            <!--                        <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px" height="30px">-->
            <!--                    </button>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </form>-->
            <!--    </div>-->



            <!--    <div class="tab-pane fade " id="social_media_analytics" role="tabpanel" aria-labelledby="files-tab">-->
            <!--        {{-- <h4>Files Reports Nationwide</h4> --}}-->
            <!--        <form method="GET" action="{{ route('daily.analytics.compaign.search') }}">-->
            <!--            <div class="row mb-4">-->
            <!--                <div class="col-md-3">-->
            <!--                    <label>Date</label>-->
            <!--                    <input type="date" name="date" class="form-control" value="{{ request('date') }}" />-->
            <!--                </div>-->
            <!--                <div class="col-md-2 mt-4">-->
            <!--                    <button type="submit" class="btn btn-outline-light">-->
            <!--                        <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px" height="30px">-->
            <!--                    </button>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </form>-->
            <!--    </div>-->
            <!--    <div class="tab-pane fade " id="social_media_sales_report" role="tabpanel" aria-labelledby="files-tab">-->

            <!--        <form method="GET" action="{{ route('search.sales.register.report') }}">-->
            <!--            <div class="row mb-4">-->
            <!--                <div class="col-md-3">-->
            <!--                    <label>Start Date</label>-->
            <!--                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-3">-->
            <!--                    <label>End Date</label>-->
            <!--                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-3">-->
            <!--                    <label>OR Select Month</label>-->
            <!--                   <input type="month" name="month" class="form-control" value="{{ request('month') }}">-->

            <!--                </div>-->
            <!--                <div class="col-md-2 mt-4">-->
            <!--                    <button type="submit" class="btn btn-outline-light mt-2">-->
            <!--                        <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="Search" width="30px" height="30px">-->
            <!--                    </button>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </form>-->

            <!--    </div>-->
            <!--    <div class="tab-pane fade " id="Quotation" role="tabpanel" aria-labelledby="files-tab">-->

            <!--        <form method="GET" action="{{ route('search.quotation.register.report') }}">-->
            <!--            <div class="row mb-4">-->
            <!--                <div class="col-md-3">-->
            <!--                    <label>Start Date</label>-->
            <!--                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-3">-->
            <!--                    <label>End Date</label>-->
            <!--                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-3">-->
            <!--                    <label>OR Select Month</label>-->
            <!--                    <input type="month" name="month" class="form-control" value="{{ request('month') }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-2 mt-4">-->
            <!--                    <button type="submit" class="btn btn-outline-light mt-2">-->
            <!--                        <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="Search" width="30px" height="30px">-->
            <!--                    </button>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </form>-->
            <!--    </div>-->
            <!--    <div class="tab-pane fade " id="Feedback" role="tabpanel" aria-labelledby="files-tab">-->

            <!--        <form method="GET" action="{{ route('search.feedback.register.report') }}">-->
            <!--             <div class="row mb-4">-->
            <!--                <div class="col-md-3">-->
            <!--                    <label>Start Date</label>-->
            <!--                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-3">-->
            <!--                    <label>End Date</label>-->
            <!--                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-3">-->
            <!--                    <label>OR Select Month</label>-->
            <!--                    <input type="month" name="month" class="form-control" value="{{ request('month') }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-2 mt-4">-->
            <!--                    <button type="submit" class="btn btn-outline-light mt-2">-->
            <!--                        <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="Search" width="30px" height="30px">-->
            <!--                    </button>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </form>-->
            <!--    </div>-->
            <!--    <div class="tab-pane fade " id="Nationwide" role="tabpanel" aria-labelledby="files-tab">-->
            <!--        {{-- <h4>Files Reports Nationwide</h4> --}}-->
            <!--        <form method="GET" action="{{ route('search.nationwide.report') }}">-->
            <!--        <div class="row mb-4">-->

            <!--            <div class="col-md-3">-->
            <!--                <label>Branch</label>-->
            <!--                <select name="branch" class="form-control">-->
            <!--                    <option value=""></option>-->
            <!--                <option value="all" {{ request('branch') == 'all' ? 'selected' : '' }}>All Branches</option>-->
            <!--                @foreach(App\Models\Admin::all() as $branch)-->
            <!--                    <option value="{{ $branch->branch_id }}" {{ request('branch') == $branch->branch_id ? 'selected' : '' }}>-->
            <!--                        {{ $branch->branch_office_name }}-->
            <!--                    </option>-->
            <!--                @endforeach-->
            <!--            </select>-->


            <!--            </div>-->
            <!--            <div class="col-md-3">-->
            <!--                <label>Remarks</label>-->
            <!--                <input type="text" name="remarks" class="form-control" value="{{ request('remarks') }}" />-->
            <!--            </div>-->

            <!--            <div class="col-md-2 mt-4">-->
            <!--                <button type="submit" class="btn btn-outline-light">-->
            <!--                    <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px" height="30px">-->
            <!--                </button>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </form>-->


            <!--    </div>-->
            <!--    <div class="tab-pane fade " id="CroDailyTask" role="tabpanel" aria-labelledby="CroDailyTask-tab">-->
            <!--        {{-- <h4>Files Reports Nationwide</h4> --}}-->
            <!--        <form method="GET" action="{{ route('searchcrotask') }}" class="mb-3">-->
            <!--            <div class="row">-->

            <!--                <div class="col-md-2">-->
            <!--                    <label>Month</label>-->
            <!--                    <input type="month" name="month" class="form-control" value="{{ request('month') }}" />-->
            <!--                </div>-->

            <!--                <div class="col-md-2 align-self-end">-->
            <!--                    <button type="submit" class="btn btn-outline-light">-->
            <!--                        <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px" height="30px">-->
            <!--                    </button>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </form>-->
            <!--    </div>-->
            <!--    <div class="tab-pane fade " id="tasRecordDairy" role="tabpanel" aria-labelledby="tasRecordDairy-tab">-->
            <!--    <form method="GET" action="{{ route('search_task_record_dairy') }}" class="mb-3">-->
            <!--         <div class="row">-->
            <!--            <div class="col-md-2">-->
            <!--                <label>Review Date</label>-->
            <!--                    <input type="month" name="month" class="form-control" value="{{ request('review_date') }}" />-->
            <!--            </div>-->
            <!--            <div class="col-md-2">-->
            <!--                <label>Completion Date</label>-->
            <!--                    <input type="month" name="month" class="form-control" value="{{ request('completion_date') }}" />-->
            <!--            </div>-->
            <!--            <div class="col-md-2 align-self-end">-->
            <!--                <button type="submit" class="btn btn-outline-light">-->
            <!--                    <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px" height="30px">-->
            <!--                </button>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </form>-->
            <!--   </div>-->
            <!--<div class="tab-pane fade " id="noticeLogSheet" role="tabpanel" aria-labelledby="noticeLogSheet-tab">-->
            <!--                <form method="GET" action="{{ route('search_notice_log_sheet') }}" class="mb-3">-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-md-2">-->
            <!--                            <label>Date of Notice</label>-->
            <!--                                <input type="date" name="month" class="form-control" value="{{ request('notice_date') }}" />-->
            <!--                        </div>-->
            <!--                        <div class="col-md-2">-->
            <!--                            <label>Notice Received On</label>-->
            <!--                                <input type="month" name="month" class="form-control" value="{{ request('notice_received_on') }}" />-->
            <!--                        </div>-->
            <!--                        <div class="col-md-2">-->
            <!--                            <label>Reporting/Hearing Date</label>-->
            <!--                                <input type="date" name="month" class="form-control" value="{{ request('reporting_date') }}" />-->
            <!--                        </div>-->
            <!--                        <div class="col-md-2 align-self-end">-->
            <!--                            <button type="submit" class="btn btn-outline-light">-->
            <!--                                <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px" height="30px">-->
            <!--                            </button>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </form>-->
            <!--</div>-->
            <!--<div class="tab-pane fade " id="weekly-sales-report" role="tabpanel" aria-labelledby="weekly-sales-report-tab">-->

            <!--    <form method="GET" action="{{ route('search.weeklly.sales.reports') }}">-->
            <!--            <div class="row mb-4">-->
            <!--                <div class="col-md-3">-->
            <!--                    <label>Date</label>-->
            <!--                    <input type="date" name="date" class="form-control" value="{{ request('date') }}" />-->
            <!--                </div>-->
            <!--                <div class="col-md-2 mt-4">-->
            <!--                    <button type="submit" class="btn btn-outline-light">-->
            <!--                        <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px" height="30px">-->
            <!--                    </button>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </form>-->

            <!--</div>-->
            <!--</div>-->

            <div class="table-responsive mt-2">
                <div style="height: 380px; overflow-y: auto;">
                    <table class="table table-bordered table-striped table-fixed">
                        <thead>
                            <tr>
                                <th class="col-lg-2 col-sm-1 col-1">Campaign Number</th>
                                <th class="col-lg-2 col-sm-1 col-1">Campaign Start Date</th>
                                <th class="col-lg-2 col-sm-1 col-1">Item Name</th>
                                <th class="col-lg-2 col-sm-5 col-1">Leader Name</th>
                                <th class="col-lg-3 col-sm-5 col-1"> Email ID</th>

                                <th class="col-lg-1 col-sm-1 col-1">Action</th>
                            </tr>
                        </thead>

                        <tbody id="branch-table-body">
                            @foreach($campaigns as $campaign)
                            <tr>
                                <td>{{$campaign->campaign_number}}</td>
                                <td>{{$campaign->start_date}}</td>
                                <td>{{$campaign->item_name}}</td>
                                <td>{{$campaign->leader_name}}</td>
                                <td>{{$campaign->leader_email_id}}</td>

                                <td style="display:flex; gap: 10px; align-items: center;">
                                    <a class="btn btn-primary btn-sm" href="{{ route('campaign.view', ['id' => $campaign->id]) }}"><i class="fa-solid fa-eye"></i></a>
                                    @if (auth()->user()->role !== 'client')
                                    <a class="btn btn-primary btn-sm" href="{{ route('campaign.edit', ['id' => $campaign->id]) }}"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('campaign.delete', ['id' => $campaign->id]) }}" class="btn btn-danger btn-sm"><i
                                            class="fa-solid fa-trash"></i></a>

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
    $(document).ready(function () {
    function searchAdmins() {
        var searchText = $('#admin-search').val().toLowerCase();
        $.ajax({
            url: "{{ route('search.admins') }}",
            type: 'GET',
            data: { search: searchText },
            success: function (data) {
                $('table tbody').html(data.html);
            },
            error: function (xhr, status, error) {
                console.error("AJAX error: ", status, error);
                $('table tbody').html('<tr><td colspan="5">There was an error processing your request.</td></tr>');
            }
        });
    }

    $('#admin-search').on('input', searchAdmins);
    });

</script>
