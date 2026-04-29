@include('layouts.header')
@yield('main')
<div class="customer_form">
    @include('headerlogout')
    <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">

        <!-- Add Tabs -->
        <ul class="nav nav-tabs mb-3" id="campaignTab" role="tablist">
            <li class="nav-item active" role="presentation">
                <button class="nav-link" id="mailchimp-tab" data-bs-toggle="tab" data-bs-target="#mailchimp"
                    type="button" role="tab" aria-controls="mailchimp" aria-selected="false">
                    Log of sales Campaign
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="files-tab" data-bs-toggle="tab" data-bs-target="#files" type="button"
                    role="tab" aria-controls="files" aria-selected="true">
                    Files Reports Nationwide
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="social_media_analytics-tab" data-bs-toggle="tab"
                    data-bs-target="#social_media_analytics" type="button" role="tab"
                    aria-controls="social_media_analytics" aria-selected="false">
                    Social Media Accounts Reporting
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="social_media_sales_report-tab" data-bs-toggle="tab"
                    data-bs-target="#social_media_sales_report" type="button" role="tab"
                    aria-controls="social_media_sales_report" aria-selected="false">
                    Sales Register Report
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Quotation-tab" data-bs-toggle="tab" data-bs-target="#Quotation"
                    type="button" role="tab" aria-controls="Quotation" aria-selected="false">
                    Quotation Register Report
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Feedback-tab" data-bs-toggle="tab" data-bs-target="#Feedback" type="button"
                    role="tab" aria-controls="Feedback" aria-selected="false">
                    Feedback Register Report
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Nationwide-tab" data-bs-toggle="tab" data-bs-target="#Nationwide"
                    type="button" role="tab" aria-controls="Nationwide" aria-selected="false">
                    Weekly Profile & Handbook Nationwide
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="CroDailyTask-tab" data-bs-toggle="tab" data-bs-target="#CroDailyTask"
                    type="button" role="tab" aria-controls="CroDailyTask" aria-selected="false">
                    Cro Daily Tasks
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tasRecordDairy-tab" data-bs-toggle="tab" data-bs-target="#tasRecordDairy"
                    type="button" role="tab" aria-controls="tasRecordDairy" aria-selected="false">
                    Task Record Dairy
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="noticeLogSheet-tab" data-bs-toggle="tab" data-bs-target="#noticeLogSheet"
                    type="button" role="tab" aria-controls="noticeLogSheet" aria-selected="false">
                    Notice Log Sheet
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="weekly-sales-report-tab" data-bs-toggle="tab"
                    data-bs-target="#weekly-sales-report" type="button" role="tab" aria-controls="weekly-sales-report"
                    aria-selected="false">
                    weekly sales report
                </button>
            </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="region-reports-tab" data-bs-toggle="tab" data-bs-target="#region-reports"
                        type="button" role="tab" aria-controls="region-reports" aria-selected="false">
                        Region Wise - Daily Sales & Feedback Log Reports
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link" id="region-visit-reports-tab" data-bs-toggle="tab" data-bs-target="#region-visit-reports"
                        type="button" role="tab" aria-controls="region-visit-reports" aria-selected="false">
                        Region Wise - Weekly Sales Visit Plan Reports
                    </button>
                    </li> 
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="region-pipeline-reports-tab" data-bs-toggle="tab" data-bs-target="#region-pipeline-reports"
                        type="button" role="tab" aria-controls="region-pipeline-reports" aria-selected="false">
                        Region Wise - Daily Pipeline Sales Reports
                    </button>
                    </li> 
                    <li class="nav-item" role="presentation">
                    <button class="nav-link" id="region-visitpipeline-reports-tab" data-bs-toggle="tab" data-bs-target="#region-visitpipeline-reports"
                        type="button" role="tab" aria-controls="region-visitpipeline-reports" aria-selected="false">
                        Region wise Daily Finalize Sales report
                    </button>
                    </li>    
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="campaignTabContent">
            <!-- Sales Email Campaign Report Tab -->
            <div class="tab-pane fade active show" id="mailchimp" role="tabpanel" aria-labelledby="mailchimp-tab">
                {{-- <h4>Log Of Sales Email Campaign Report (Mailchimp)</h4> --}}
                <form method="GET" action="{{ route('sales.email.compaign.search') }}">
                    <div class="row mb-4">
                        <div class="col-md-2">
                            <label>Campaign Start Date</label>
                            <input type="date" name="start_date" class="form-control"
                                value="{{ request('start_date') }}">
                        </div>
                        <div class="col-md-2">
                            <label>Campaign End Date</label>
                            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                        </div>
                        <div class="col-md-3">
                            <label>Campaign Number</label>
                            <input type="text" name="campaign_number" class="form-control"
                                value="{{ request('campaign_number') }}">
                        </div>
                        <div class="col-md-3">
                            <label>Audience Segment</label>
                            <select name="segment" class="form-control" value="{{ request('segment') }}">
                                <option value="">Select a Segment</option>
                                @foreach (App\Models\Segment::all() as $segment)
                                    <option value="{{ $segment->segment_name }}">{{ $segment->segment_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Item Category</label>
                            <select name="item_name" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->item_name }}">{{ $item->item_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1 mt-4">
                            <button type="submit" class="btn btn-outline-light">
                                <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px"
                                    height="30px">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Files Reports Nationwide Tab -->
            <div class="tab-pane fade  " id="files" role="tabpanel" aria-labelledby="files-tab">
                {{-- <h4>Files Reports Nationwide</h4> --}}
                <form method="GET" action="{{ route('search.compaign.admins') }}">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label>Region</label>
                            <select name="region" class="form-control" value="{{ request('region') }}">
                                <option value="">Select a region</option>
                                <option value="all" {{ request('region') == 'all' ? 'selected' : '' }}>All
                                    Regions</option>
                                @foreach (App\Models\Region::all() as $region)
                                    <option value="{{ $region->region_name }}">{{ $region->region_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Branch</label>
                            <select name="branch" class="form-control">
                                <!-- Default -->
                                <option value="">Select a branch</option>
                                <option value="all" {{ request('branch') == 'all' ? 'selected' : '' }}>All Branches
                                </option>

                                <!-- Only if branches exist -->
                                @if($branches->isNotEmpty())
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch }}" {{ request('branch') == $branch ? 'selected' : '' }}>
                                            {{ $branch }}
                                        </option>
                                    @endforeach
                                @endif
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
            <div class="tab-pane fade " id="social_media_analytics" role="tabpanel" aria-labelledby="files-tab">
                {{-- <h4>Files Reports Nationwide</h4> --}}
                <form method="GET" action="{{ route('daily.analytics.compaign.search') }}">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control" value="{{ request('date') }}" />
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
                            <label>Branch</label>
                            <select name="branch" class="form-control">
                                <!-- Default -->
                                <option value="">Select a branch</option>
                                <option value="all" {{ request('branch') == 'all' ? 'selected' : '' }}>All Branches
                                </option>

                                <!-- Only if branches exist -->
                                @if($branches->isNotEmpty())
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch }}" {{ request('branch') == $branch ? 'selected' : '' }}>
                                            {{ $branch }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-outline-light">
                                <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px"
                                    height="30px">
                            </button>

                        </div>
                </form>
            </div>
            <div class="container-fluid mt-4">
                <h2 class="text-center text-light bg-dark py-2">
                    Social Media Accounts Reporting
                </h2>
                <div class="card">
                    <div class="card-body">
                        {{-- <h2>Social Media Analytics ({{ $analytics->date }})</h2> --}}
                        <table border="1" cellpadding="10">
                            <tr>
                                <th>Platform</th>
                                <th>Morning Post</th>
                                <th>Why PIFFERS</th>
                                <th>What We Do</th>
                                <th>What We Do Vedio</th>
                                <th>Subscribers</th>
                                <th>Comments</th>
                            </tr>
                            <tr>
                                <td><strong>LinkedIn</strong></td>
                                <td>
                                    <input type="text" class="live-input" name="linkedin_morning_post"
                                        value="{{ $analytics->linkedin_morning_post }}">
                                </td>
                                <td>
                                    <input type="text" class="live-input" name="linkedin_why_pifra"
                                        value="{{ $analytics->linkedin_why_pifra }}">
                                </td>
                                <td>
                                    <input type="text" class="live-input" name="linkedin_what_we_do"
                                        value="{{ $analytics->linkedin_what_we_do }}">
                                </td>
                                <td>
                                    <input type="text" class="live-input" name="linkedin_what_we_do_vedio"
                                        value="{{ $analytics->linkedin_what_we_do_vedio }}">
                                </td>
                                <td>
                                    <input type="text" class="live-input" name="linkedin_subscribers"
                                        value="{{ $analytics->linkedin_subscribers }}">
                                </td>
                                <td>
                                    <input type="text" class="live-input" name="linkedin_comments"
                                        value="{{ $analytics->linkedin_comments }}">
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Facebook</strong></td>
                                <td>
                                    <input type="text" class="live-input" name="facebook_morning_post"
                                        value="{{ $analytics->facebook_morning_post }}">
                                </td>
                                <td>
                                    <input type="text" class="live-input" name="facebook_why_pifra"
                                        value="{{ $analytics->facebook_why_pifra }}">
                                </td>
                                <td>
                                    <input type="text" class="live-input" name="facebook_what_we_do"
                                        value="{{ $analytics->facebook_what_we_do }}">
                                </td>
                                <td>
                                    <input type="text" class="live-input" name="facebook_what_we_do_vedio"
                                        value="{{ $analytics->facebook_what_we_do_vedio }}">
                                </td>
                                <td>
                                    <input type="text" class="live-input" name="facebook_subscribers"
                                        value="{{ $analytics->facebook_subscribers }}">
                                </td>
                                <td>
                                    <input type="text" class="live-input" name="facebook_comments"
                                        value="{{ $analytics->facebook_comments }}">
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Instagram</strong></td>
                                <td>
                                    <input type="text" class="live-input" name="instagram_morning_post"
                                        value="{{ $analytics->instagram_morning_post }}">
                                </td>
                                <td>
                                    <input type="text" class="live-input" name="instagram_why_pifra"
                                        value="{{ $analytics->instagram_why_pifra }}">
                                </td>
                                <td>
                                    <input type="text" class="live-input" name="instagram_what_we_do"
                                        value="{{ $analytics->instagram_what_we_do }}">
                                </td>
                                <td>
                                    <input type="text" class="live-input" name="instagram_what_we_do_vedio"
                                        value="{{ $analytics->instagram_what_we_do_vedio }}">
                                </td>
                                <td>
                                    <input type="text" class="live-input" name="instagram_subscribers"
                                        value="{{ $analytics->instagram_subscribers }}">
                                </td>
                                <td>
                                    <input type="text" class="live-input" name="instagram_comments"
                                        value="{{ $analytics->instagram_comments }}">
                                </td>
                            </tr>
                        </table>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $('.live-input').on('blur', function () {
                                let field = $(this).attr('name');
                                let value = $(this).val();
                                $.ajax({
                                    url: '{{ route('analytics.update') }}',
                                    method: 'POST',
                                    data: {
                                        _token: $('meta[name="csrf-token"]').attr('content'),
                                        field: field,
                                        value: value
                                    },
                                    success: function (response) {
                                        console.log('Saved:', field);
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>

            </div>

        </div>
        <div class="tab-pane fade " id="social_media_sales_report" role="tabpanel" aria-labelledby="files-tab">

            <form method="GET" action="{{ route('search.sales.register.report') }}">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-3">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-3">
                        <label>OR Select Month</label>
                        <input type="month" name="month" class="form-control" value="{{ request('month') }}">

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
        <div class="tab-pane fade " id="Quotation" role="tabpanel" aria-labelledby="files-tab">

            <form method="GET" action="{{ route('search.quotation.register.report') }}">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-3">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-3">
                        <label>OR Select Month</label>
                        <input type="month" name="month" class="form-control" value="{{ request('month') }}">
                    </div>
                    <div class="col-md-3">
                        <label>Region</label>
                        <select name="region" class="form-control" value="{{ request('region') }}">
                            <option value="">Select a region</option>
                            <option value="all" {{ request('region') == 'all' ? 'selected' : '' }}>All
                                Regions</option>
                            @foreach (App\Models\Cro::all() as $region)
                                <option value="{{ $region->region }}">{{ $region->region }}</option>
                            @endforeach
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
        <div class="tab-pane fade " id="Feedback" role="tabpanel" aria-labelledby="files-tab">

            <form method="GET" action="{{ route('search.feedback.register.report') }}">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-3">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-2">
                        <label>OR Select Month</label>
                        <input type="month" name="month" class="form-control" value="{{ request('month') }}">
                    </div>
                    <div class="col-md-2">
                        <label>Region</label>
                        <select name="region" class="form-control" value="{{ request('region') }}">
                            <option value="">Select a region</option>
                            <option value="all" {{ request('region') == 'all' ? 'selected' : '' }}>All
                                Regions</option>
                            @foreach (App\Models\Cro::all() as $region)
                                <option value="{{ $region->region }}">{{ $region->region }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
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
                    <div class="col-md-2">
                        <label>Customer Name</label>
                        <select name="client_name" class="form-control">
                            <option value="">Select Customer</option>
                            <option value="all" {{ request('name') == 'all' ? 'selected' : '' }}>All Customers</option>
                            @foreach(\App\Models\Cro::select('name')->distinct()->get() as $customer)
                                <option value="{{ $customer->name }}" {{ request('name') == $customer->name ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1 mt-4">
                        <label>Client ID</label>
                        <select  class="form-control">
                        </select>
                    </div>
                    <div class="col-md-1 mt-4">
                        <button type="submit" class="btn btn-outline-light mt-2">
                            <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="Search"
                                width="30px" height="30px">
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade " id="Nationwide" role="tabpanel" aria-labelledby="files-tab">
            {{-- <h4>Files Reports Nationwide</h4> --}}
            <form method="GET" action="{{ route('search.nationwide.report') }}">
                <div class="row mb-4">

                    <div class="col-md-3">
                        <label>Branch</label>
                        <select name="branch" class="form-control">
                            <option value="">Select a branch</option>
                            <option value="all" {{ request('branch') == 'all' ? 'selected' : '' }}>All Branches
                            </option>
                            @foreach (App\Models\Admin::all() as $branch)
                                <option value="{{ $branch->branch_id }}" {{ request('branch') == $branch->branch_id ? 'selected' : '' }}>
                                    {{ $branch->branch_office_name }}
                                </option>
                            @endforeach
                        </select>


                    </div>
                    <div class="col-md-3">
                        <label>Remarks</label>
                        <input type="text" name="remarks" class="form-control" value="{{ request('remarks') }}" />
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
        <div class="tab-pane fade" id="CroDailyTask" role="tabpanel" aria-labelledby="CroDailyTask-tab">
            <form method="GET" action="{{ route('searchcrotask') }}" class="mb-3">
                <div class="row align-items-end">

                    <!-- Month -->
                    <div class="col-md-2">
                        <label class="form-label">Month</label>
                        <input type="month" id="monthInput" name="month" class="form-control"
                            value="{{ request('month') }}">
                    </div>

                    <!-- Date Range -->
                    <div class="col-md-3">
                        <label class="form-label">Date Range</label>
                        <input type="text" id="dateRangeInputCro" name="date_range" class="form-control"
                            placeholder="Select date range" readonly value="{{ request('date_range') }}">
                    </div>

                    <!-- Region -->
                    <div class="col-md-3">
                        <label class="form-label">Region</label>
                        <select name="region" class="form-control">
                            <option value="">Select a region</option>
                            <option value="all" {{ request('region') == 'all' ? 'selected' : '' }}>All Regions
                            </option>
                            @foreach (App\Models\Region::all() as $region)
                                <option value="{{ $region->region_name }}" {{ request('region') == $region->region_name ? 'selected' : '' }}>
                                    {{ $region->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Branch -->
                    <div class="col-md-3">
                        <label class="form-label">Branch</label>
                        <select name="branch" class="form-control">
                            <option value="">Select a branch</option>
                            <option value="all" {{ request('branch') == 'all' ? 'selected' : '' }}>All Branches
                            </option>
                            @foreach (App\Models\Admin::all() as $branch)
                                <option value="{{ $branch->branch_id }}" {{ request('branch') == $branch->branch_id ? 'selected' : '' }}>
                                    {{ $branch->branch_office_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Button -->
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-outline-light mt-4">
                            <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" width="25">
                        </button>
                    </div>

                </div>
            </form>
        </div>
        <div class="tab-pane fade " id="tasRecordDairy" role="tabpanel" aria-labelledby="tasRecordDairy-tab">
            <form method="GET" action="{{ route('search_task_record_dairy') }}" class="mb-3">
                <div class="row">
                    <div class="col-md-2">
                        <label>Review Date</label>
                        <input type="month" name="month" class="form-control" value="{{ request('review_date') }}" />
                    </div>
                    <div class="col-md-2">
                        <label>Completion Date</label>
                        <input type="month" name="month" class="form-control"
                            value="{{ request('completion_date') }}" />
                    </div>
                    <div class="col-md-2 align-self-end">
                        <button type="submit" class="btn btn-outline-light">
                            <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px"
                                height="30px">
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade " id="noticeLogSheet" role="tabpanel" aria-labelledby="noticeLogSheet-tab">
            <form method="GET" action="{{ route('search_notice_log_sheet') }}" class="mb-3">
                <div class="row">
                    <div class="col-md-2">
                        <label>Date of Notice</label>
                        <input type="date" name="month" class="form-control" value="{{ request('notice_date') }}" />
                    </div>
                    <div class="col-md-2">
                        <label>Notice Received On</label>
                        <input type="month" name="month" class="form-control"
                            value="{{ request('notice_received_on') }}" />
                    </div>
                    <div class="col-md-2">
                        <label>Reporting/Hearing Date</label>
                        <input type="date" name="month" class="form-control" value="{{ request('reporting_date') }}" />
                    </div>
                    <div class="col-md-2 align-self-end">
                        <button type="submit" class="btn btn-outline-light">
                            <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" alt="" width="30px"
                                height="30px">
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade " id="weekly-sales-report" role="tabpanel" aria-labelledby="weekly-sales-report-tab">

            <form method="GET" action="{{ route('search.weeklly.sales.reports') }}">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label>Deployment Date</label>
                        <input type="date" name="date" class="form-control" value="{{ request('date') }}" />
                    </div>
                    <!-- Region -->
                    <div class="col-md-3">
                        <label class="form-label">Region</label>
                        <select name="region" class="form-control">
                            <option value="">Select a region</option>
                            <option value="all" {{ request('region') == 'all' ? 'selected' : '' }}>All Regions</option>

                            @foreach (App\Models\Admin::select('branch_category')->distinct()->get() as $region)
                                <option value="{{ $region->branch_category }}" 
                                    {{ request('region') == $region->branch_category ? 'selected' : '' }}>
                                    {{ $region->branch_category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Branch -->
                    <div class="col-md-3">
                        <label class="form-label">Branch</label>
                        <select name="branch" class="form-control">
                            <option value="">Select a branch</option>
                            <option value="all" {{ request('branch') == 'all' ? 'selected' : '' }}>All Branches
                            </option>
                            @foreach (App\Models\Admin::all() as $branch)
                                <option value="{{ $branch->branch_id }}" {{ request('branch') == $branch->branch_id ? 'selected' : '' }}>
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
        <div class="tab-pane fade " id="region-reports" role="tabpanel" aria-labelledby="region-reports-tab">
            <form method="GET" action="{{ route('regionwise.index') }}" class="mb-3">
                <div class="row mb-4">
                    <!-- Region -->
                    <div class="col-md-3">
                        <label class="form-label">Region</label>
                        <select name="region" class="form-control">
                            <option value="">Select a region</option>
                            <option value="all" {{ request('region') == 'all' ? 'selected' : '' }}>All Regions
                            </option>
                            @foreach (App\Models\Region::all() as $region)
                                <option value="{{ $region->region_name }}" {{ request('region') == $region->region_name ? 'selected' : '' }}>
                                    {{ $region->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Date Range -->
                    <div class="col-md-3">
                        <label class="form-label">Date Range</label>
                        <input type="text" id="dateRangeInputRegion" name="date_range" class="form-control"
                            placeholder="Select date range" readonly value="{{ request('date_range') }}">
                    </div>
                     <!-- Employee -->
                    <div class="col-md-3">
                        <label class="form-label">Employee</label>
                        <select name="employee_name" class="form-control">
                            <option value="">Select Employee</option>

                            <option value="all" {{ request('employee_name') == 'all' ? 'selected' : '' }}>
                                All Employees
                            </option>

                            @foreach (
                                App\Models\RegionReport::where('type', 'feedback_log')
                                    ->whereNotNull('employee_name')
                                    ->select('employee_name')
                                    ->distinct()
                                    ->get() as $report
                            )
                                <option value="{{ $report->employee_name }}"
                                    {{ request('employee_name') == $report->employee_name ? 'selected' : '' }}>
                                    {{ $report->employee_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Button -->
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-outline-light mt-4">
                            <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" width="25">
                        </button>
                    </div>

                </div>
            </form>
        </div>
        <div class="tab-pane fade " id="region-pipeline-reports" role="tabpanel" aria-labelledby="region-pipeline-reports-tab">
            <form method="GET" action="{{ route('pipelinesales.index') }}" class="mb-3">
                <div class="row mb-4">
                    <!-- Region -->
                    <div class="col-md-3">
                        <label class="form-label">Region</label>
                        <select name="region" class="form-control">
                            <option value="">Select a region</option>
                            <option value="all" {{ request('region') == 'all' ? 'selected' : '' }}>All Regions
                            </option>
                            @foreach (App\Models\Region::all() as $region)
                                <option value="{{ $region->region_name }}" {{ request('region') == $region->region_name ? 'selected' : '' }}>
                                    {{ $region->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Date Range -->
                    <div class="col-md-3">
                        <label class="form-label">Date Range</label>
                        <input type="text" id="datePipelineInputRegion" name="date_range" class="form-control"
                            placeholder="Select date range" readonly value="{{ request('date_range') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Prospect</label>
                        <select name="prospect_name" class="form-control">
                            <option value="">Select Prospect</option>

                            <option value="all" {{ request('prospect_name') == 'all' ? 'selected' : '' }}>
                                All Prospects
                            </option>

                            @foreach (App\Models\PipelineReport::select('prospect_name')->distinct()->get() as $report)
                                <option value="{{ $report->prospect_name }}"
                                    {{ request('prospect_name') == $report->prospect_name ? 'selected' : '' }}>
                                    {{ $report->prospect_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Button -->
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-outline-light mt-4">
                            <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" width="25">
                        </button>
                    </div>

                </div>
            </form>
        </div>
        <div class="tab-pane fade " id="region-visit-reports" role="tabpanel" aria-labelledby="region-visit-reports-tab">
            <form method="GET" action="{{ route('visitsales.index') }}" class="mb-3">
                <div class="row mb-4">
                    <!-- Region -->
                    <div class="col-md-3">
                        <label class="form-label">Region</label>
                        <select name="region" class="form-control">
                            <option value="">Select a region</option>
                            <option value="all" {{ request('region') == 'all' ? 'selected' : '' }}>All Regions
                            </option>
                            @foreach (App\Models\Region::all() as $region)
                                <option value="{{ $region->region_name }}" {{ request('region') == $region->region_name ? 'selected' : '' }}>
                                    {{ $region->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Date Range -->
                    <div class="col-md-3">
                        <label class="form-label">Date Range</label>
                        <input type="text" id="dateVisitInputRegion" name="date_range" class="form-control"
                            placeholder="Select date range" readonly value="{{ request('date_range') }}">
                    </div>
                     <!-- Employee -->
                    <div class="col-md-3">
                        <label class="form-label">Employee</label>
                        <select name="employee_name" class="form-control">
                            <option value="">Select Employee</option>

                            <option value="all" {{ request('employee_name') == 'all' ? 'selected' : '' }}>
                                All Employees
                            </option>

                            @foreach (
                                App\Models\RegionReport::where('type', 'visit_plan')
                                    ->whereNotNull('employee_name')
                                    ->select('employee_name')
                                    ->distinct()
                                    ->get() as $report
                            )
                                <option value="{{ $report->employee_name }}"
                                    {{ request('employee_name') == $report->employee_name ? 'selected' : '' }}>
                                    {{ $report->employee_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Button -->
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-outline-light mt-4">
                            <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" width="25">
                        </button>
                    </div>

                </div>
            </form>
        </div>
        <div class="tab-pane fade " id="region-visitpipeline-reports" role="tabpanel" aria-labelledby="region-visit-reports-tab">
            <form method="GET" action="{{ route('visitPipelinesales.index') }}" class="mb-3">
                <div class="row mb-4">
                    <!-- Region -->
                    <div class="col-md-3">
                        <label class="form-label">Region</label>
                        <select name="region" class="form-control">
                            <option value="">Select a region</option>
                            <option value="all" {{ request('region') == 'all' ? 'selected' : '' }}>All Regions
                            </option>
                            @foreach (App\Models\Region::all() as $region)
                                <option value="{{ $region->region_name }}" {{ request('region') == $region->region_name ? 'selected' : '' }}>
                                    {{ $region->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Date Range -->
                    <div class="col-md-3">
                        <label class="form-label">Date Range</label>
                        <input type="text" id="dateVisitPipelineInputRegion" name="date_range" class="form-control"
                            placeholder="Select date range" readonly value="{{ request('date_range') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Customer</label>
                        <select name="customer_name" class="form-control">
                            <option value="">Select Customer</option>

                            <option value="all" {{ request('customer_name') == 'all' ? 'selected' : '' }}>
                                All Customers
                            </option>

                            @foreach (App\Models\VisitPipelineReport::select('customer_name')->distinct()->get() as $report)
                                <option value="{{ $report->customer_name }}"
                                    {{ request('customer_name') == $report->customer_name ? 'selected' : '' }}>
                                    {{ $report->customer_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Button -->
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-outline-light mt-4">
                            <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png" width="25">
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1/daterangepicker.min.js"></script>
<script>
    $(function () {
        // Initialize both pickers
        $('#dateRangeInputCro, #dateRangeInputRegion, #datePipelineInputRegion, #dateVisitInputRegion, #dateVisitPipelineInputRegion').daterangepicker({
            opens: 'right',
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            },
        });

        // CroDailyTask handler
        $('#dateRangeInputCro').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
            filterByDate(picker.startDate.format('YYYY-MM-DD'), picker.endDate.format('YYYY-MM-DD'));
        });

        // Region Reports handler
        $('#dateRangeInputRegion').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
            filterByDate(picker.startDate.format('YYYY-MM-DD'), picker.endDate.format('YYYY-MM-DD'));
        });

        // Pipeline Sales handler
        $('#datePipelineInputRegion').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
            filterByDate(picker.startDate.format('YYYY-MM-DD'), picker.endDate.format('YYYY-MM-DD'));
        });

        // Visit Sales handler
        $('#dateVisitInputRegion').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
            filterByDate(picker.startDate.format('YYYY-MM-DD'), picker.endDate.format('YYYY-MM-DD'));
        }); 

        // Visit Pipeline Sales handler
        $('#dateVisitPipelineInputRegion').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
            filterByDate(picker.startDate.format('YYYY-MM-DD'), picker.endDate.format('YYYY-MM-DD'));
        });

        // Shared cancel handler
        $('#dateRangeInputCro, #dateRangeInputRegion, #datePipelineInputRegion, #dateVisitInputRegion, #dateVisitPipelineInputRegion').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
    });

    function filterByDate(start, end) {
        console.log("Filtering data from:", start, "to", end);
        // AJAX request to Laravel backend if needed
    }
</script>
