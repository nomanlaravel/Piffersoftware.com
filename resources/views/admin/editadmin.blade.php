@include('layouts.header') @yield('main')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--End of the Navbar-->
<div class="customer_form">
    <style>
        .nav-link {
            font-size: 15px;
            font-weight: bold
        }
    </style>

    <div id="main" style="margin-left: 92%;">
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>
    <div id="mySidebar" class="sidebar admin-setting"> <a href="javascript:void(0)" class="closebtn"
            onclick="closeNav()">×</a>
        <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
        <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration Setting</a>
        <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
        <hr>
        <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
    </div>
    <!--Popup model for User new entry-->
    <!-- <div class="modal fade" id="add_user"> -->
    <!-- <div class="modal-dialog" role="document" style="max-width: 75%;"> -->
    <!-- <div class="modal-content"> -->
    <div class="modal-header border-0">
        <div style="display:flex; column-gap:10px; align-items:center">
            <button type="button" class="btn btn-link" onclick="history.back()">
                <i class="bi bi-arrow-left"></i>
            </button>
            <h5 class="mt-3" style="font-weight: 700;">Office Details </h5>
        </div>
    </div>
    <!-- <div class="modal-body"> -->
    <section style="margin-bottom: 50px;">
        <form action="{{ route('update_admin', ['id' => $admins->id]) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class=" row main-content div">
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">Office Name</label>
                            <input id="branch_office_name" name="branch_office_name"
                                value="{{ $admins->branch_office_name }}" type="text" class="form-control mt-1"
                                aria-="true" aria-invalid="false" style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">Type</label>
                            <input id="branch_type" name="branch_type" value="{{ $admins->branch_type }}" type="text"
                                class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_code" class="form_control mb-1">Branch ID</label>
                            <input id="branch_office_code" value="{{ $admins->branch_id }}" name="branch_id" type="text"
                                class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" />
                            <div class="mt-0"></div>
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_reporting" class="form_control mb-1 w-100">Branch Reporting to</label>
                            <input id="branch_type" name="branch_category" value="{{ $admins->branch_category }}"
                                type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                                style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_code" class="form_control mb-1">PTCL No</label>
                            <input id="branch_office_code" value="{{ $admins->branch_ptcl }}" name="branch_ptcl"
                                type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                                style="width: 100%;" />
                            <div class="mt-0"></div>
                        </div>
                    </div>
                    <h5><strong>Management Details :</strong></h5>
                    <div class="row">
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">GM Name</label>
                            <input id="branch_office_name" value="{{ $admins->gm_name }}" name="gm_name" type="text"
                                class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">GM Cell No.</label>
                            <input id="branch_office_name" value="{{ $admins->gm_cell }}" name="gm_cell" type="text"
                                class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">GM Email</label>
                            <input id="branch_office_name" value="{{ $admins->gm_email }}" name="gm_email" type="text"
                                class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">DGM Name</label>
                            <input id="branch_office_name" value="{{ $admins->dgm_name }}" name="dgm_name" type="text"
                                class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">DGM Cell No.</label>
                            <input id="branch_office_name" value="{{ $admins->dgm_cell }}" name="dgm_cell" type="text"
                                class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">CRO Name</label>
                            <input id="branch_office_name" value="{{ $admins->cro_name }}" name="cro_name" type="text"
                                class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">CRO Cell No.</label>
                            <input id="branch_office_name" value="{{ $admins->cro_cell }}" name="cro_cell" type="text"
                                class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">PTCL No.</label>
                            <input id="branch_office_name" value="{{ $admins->cro_ptcl }}" name="cro_ptcl" type="text"
                                class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" />
                        </div>
                    </div>
                    <h5><strong>Branch Address Details :</strong></h5>
                    <div class="row">
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">Office No.</label>
                            <input id="branch_office_name" value="{{ $admins->branch_office_no }}"
                                name="branch_office_no" type="text" class="form-control mt-1" aria-="true"
                                aria-invalid="false" style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">Building</label>
                            <input id="branch_office_name" value="{{ $admins->branch_building }}" name="branch_building"
                                type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                                style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">Block</label>
                            <input id="branch_office_name" value="{{ $admins->branch_block }}" name="branch_block"
                                type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                                style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">Area</label>
                            <input id="branch_office_name" value="{{ $admins->branch_area }}" name="branch_area"
                                type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                                style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">City</label>
                            <input id="branch_office_name" value="{{ $admins->branch_city }}" name="branch_city"
                                type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                                style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">Photograph of Building
                            </label>
                            <input id="branch_office_name" value="{{ $admins->branch_photo }}" name="branch_photo"
                                type="file" class="form-control mt-1" aria-="true" aria-invalid="false"
                                style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">Pin Location</label>
                            <input id="branch_office_name" value="{{ $admins->branch_pin }}" name="branch_pin"
                                type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                                style="width: 100%;" />
                        </div>
                        <div class="col-lg-3 spacing-right">
                            <label for="branch_office_name" class="form_control mb-1 w-100">GPS</label>
                            <input id="branch_office_name" value="{{ $admins->branch_gps }}" name="branch_gps"
                                type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                                style="width: 100%;" />
                        </div>
                    </div>
                </div>
            </div>
            <!--Tabs forDetails-->
            <nav>
                <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#report" role="tab"
                        aria-controls="nav-home" aria-selected="true">Daily Branch Report</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#office" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Office Inventory</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#branding" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Office Branding</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#moveable" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Moveable Assets</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#notification" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Notifications</a>
                    <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#social_account_report"
                        role="tab" aria-controls="nav-home" aria-selected="true">Reports</a>

                    <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#cro_register_reports"
                        role="tab" aria-controls="nav-home" aria-selected="true">CRO Register Reports</a>


                    <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#internal_dispatches"
                        role="tab" aria-controls="nav-home" aria-selected="true">Internal Dispatches</a>
                </div>
            </nav>
            <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
                <!--Dialy Branch Report-->
                <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="report" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <!-- add more consultant -->
                    <div class="container my-1">
                        <div class="accordion" id="signatoryAccordion10">
                            @foreach ($admins->reports as $index => $report)
                                <!-- Initial Accordion Item -->
                                <div class="accordion-item signaccordion-item10" id="signatoryEntry10">
                                    <h2 class="accordion-header" id="signatoryHeading{{ $index + 1 }}" style="color: white">
                                        <button class="accordion-button" style="background-color: #34005A; color:white"
                                            type="button" data-toggle="collapse"
                                            data-target="#signatoryCollapse{{ $index + 1 }}" aria-expanded="false"
                                            aria-controls="signatoryCollapse{{ $index + 1 }}">
                                            Report Entry {{ $index + 1 }} , Date: {{ $report->report_date }} ,
                                            Branch ID: {{ $report->site_id }} , Location: {{ $report->location }}
                                        </button>
                                    </h2>
                                    <div id="signatoryCollapse{{ $index + 1 }}" class="collapse"
                                        aria-labelledby="signatoryHeading{{ $index + 1 }}">
                                        <div class="accordion-body">
                                            <input type="hidden" name="reports[{{ $index }}][r_id]"
                                                value="{{ $report->id }}">
                                            <!-- Your content for signatory entry goes here -->
                                            <div class="row mb-2" id="signatoryDetailsContainer10">
                                                <div class="col-lg-12" id="consultant_add_fields">
                                                    <div class=" row mb-2">
                                                        <div class="col-lg-4 spacing-left"> Date
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][report_date]"
                                                                value="{{ $report->report_date }}" type="date"
                                                                placeholder="..." style="width: 103%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Branch Name
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][branch]"
                                                                value="{{ $report->branch }}" type="text" placeholder="..."
                                                                style="width: 97%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right"> Branch ID
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][site_id]"
                                                                value="{{ $report->site_id }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left"> Location
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][location]"
                                                                value="{{ $report->location }}" type="text"
                                                                placeholder="..." style="width: 103%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right"> Authorized Guards
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][auth_guards]"
                                                                value="{{ $report->auth_guards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left"> Army
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][army]"
                                                                value="{{ $report->army }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left"> SSG
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][ssg]" value="{{ $report->ssg }}"
                                                                type="text" placeholder="..." style="width: 103%;">
                                                        </div>
                                                    </div>
                                                    <div class=" row mb-2">
                                                        <div class="col-lg-4 spacing-right"> Civil
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][civil]"
                                                                value="{{ $report->civil }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Absentees
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][absente]"
                                                                value="{{ $report->absente }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Leave
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][leave]"
                                                                value="{{ $report->leave }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right"> Reason
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][reason]"
                                                                value="{{ $report->reason }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Reliver Provided
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][r_provided]"
                                                                value="{{ $report->r_provided }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Last Complaint
                                                            Date
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][last_comp_date]"
                                                                value="{{ $report->last_comp_date }}" type="date"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <div class=" row mb-2">
                                                        <div class="col-lg-4 spacing-right"> Any Incident & Report No
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][any_inc]"
                                                                value="{{ $report->any_inc }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right"> Pending Nadra Versys
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][pending_nadra]"
                                                                value="{{ $report->pending_nadra }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Unsent DPO Reports
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][unsent_dpo_rep]"
                                                                value="{{ $report->unsent_dpo_rep }}" type="text"
                                                                placeholder="..." style="width: 100%;"></input>
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> No. of resigns
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][no_of_resigns]"
                                                                value="{{ $report->no_of_resigns }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right"> Guards without bank started
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][guards_wout_bank]"
                                                                value="{{ $report->guards_wout_bank }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Any new Site
                                                            Started
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][any_new_site]"
                                                                value="{{ $report->any_new_site }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-4 spacing-left spacing-right"> No. of Guards
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][no_of_guards]"
                                                                value="{{ $report->no_of_guards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Any Site Closed
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][any_site_closed]"
                                                                value="{{ $report->any_site_closed }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> No. of Guard of
                                                            Closed Site
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][no_of_guards_of_closed_site]"
                                                                value="{{ $report->no_of_guards_of_closed_site }}"
                                                                type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right"> Details of Escort Duties
                                                            <br>
                                                            <textarea class="form-control" id=""
                                                                name="reports[{{ $index }}][escort_duties]" type="text"
                                                                placeholder="..."
                                                                style="width: 100%;">{{ $report->escort_duties }}</textarea>
                                                        </div>
                                                        <div class="col-lg-4 spacing-right"> Details of Events
                                                            <br>
                                                            <textarea class="form-control" id=""
                                                                name="reports[{{ $index }}][event_details]" type="text"
                                                                placeholder="..."
                                                                style="width: 100%;">{{ $report->event_details }}</textarea>
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Amount of pending
                                                            Recoveries
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][pending_recoveries]"
                                                                value="{{ $report->pending_recoveries }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Signature of
                                                            Manager Accounts
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][sign_manager]"
                                                                value="{{ $report->sign_manager }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right"> Any staff on annual leave
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][staff_on_leav]"
                                                                value="{{ $report->staff_on_leav }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Any short leave of
                                                            staff with Name
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][short_leav]"
                                                                value="{{ $report->short_leav }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <h5>Checklist :</h5>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-4 spacing-left spacing-right"> Utility Bills Paid
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][utility_bills]"
                                                                value="{{ $report->utility_bills }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right">Bio Matric Working
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][bio_matric]"
                                                                value="{{ $report->bio_matric }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right">Bio Register Maintained
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][bio_register]"
                                                                value="{{ $report->bio_register }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Office Rent Paid
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][office_rent]"
                                                                value="{{ $report->office_rent }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> UPS Working
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][ups]" value="{{ $report->ups }}"
                                                                type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right"> Guard File Maintained
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][guard_file]"
                                                                value="{{ $report->guard_file }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Guard Accomodation
                                                            Rent Paid
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][guard_accomodation]"
                                                                value="{{ $report->guard_accomodation }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Any Maintainance
                                                            Required
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][any_maintainence]"
                                                                value="{{ $report->any_maintainence }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Weapon Register
                                                            Maintained
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][weapon_register]"
                                                                value="{{ $report->weapon_register }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right"> CCTV Working
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][cctv]"
                                                                value="{{ $report->cctv }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Attendance
                                                            Register Maintained
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][attendance_register]"
                                                                value="{{ $report->attendance_register }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"> Kote Register
                                                            Maintained
                                                            <br>
                                                            <input class="form-control" id=""
                                                                name="reports[{{ $index }}][kote_register]"
                                                                value="{{ $report->kote_register }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!-- Add More and Remove Buttons -->
                        <div class="row my-3">
                            <div class="col">
                                <button type="button" class="btn btn-primary" id="addSignatory10"
                                    style="height:30px; width:150px;">Add More </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Office Inventory --}}
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="office" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <!-- add more Issuing Authority -->
                    <div class="container my-1">
                        <div class="accordion" id="signatoryAccordion11">
                            @foreach ($admins->inventories as $index => $inventory)
                                <!-- Initial Accordion Item -->
                                <div class="accordion-item signaccordion-item11" id="signatoryEntry11{{ $index }}">
                                    <h2 class="accordion-header" id="signatoryHeading11{{ $index }}" style="color: white">
                                        <button class="accordion-button" style="background-color: #34005A; color:white"
                                            type="button" data-toggle="collapse"
                                            data-target="#signatoryCollapse11{{ $index }}" aria-expanded="false"
                                            aria-controls="signatoryCollapse11{{ $index }}">
                                            Office Equipment {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <div id="signatoryCollapse11{{ $index }}" class="collapse"
                                        aria-labelledby="signatoryHeading11{{ $index }}">
                                        <div class="accordion-body">
                                            <input type="hidden" name="inventories[{{ $index }}][i_id]"
                                                value="{{ $inventory->id }}">
                                            <!-- Your content for signatory entry goes here -->
                                            <div class="col-lg-12" id="authority_add_fields">
                                                <div class="row mb-2">
                                                    <div class="col-lg-4 spacing-right"> Equipment Name
                                                        <br>
                                                        <input class="form-control" id=""
                                                            name="inventories[{{ $index }}][category]"
                                                            value="{{ $inventory->category }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right"> Quantity
                                                        <br>
                                                        <input class="form-control" id=""
                                                            name="inventories[{{ $index }}][quantity]"
                                                            value="{{ $inventory->quantity }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-right"> Notes
                                                        <br>
                                                        <textarea class="form-control" id=""
                                                            name="inventories[{{ $index }}][notes]" type="text"
                                                            placeholder="..."
                                                            style="width: 100%;">{{ $inventory->notes }}</textarea>
                                                    </div>
                                                    <div class="col-lg-4 spacing-right"> Attachments
                                                        <br>
                                                        <input class="form-control" id=""
                                                            name="inventories[{{ $index }}][attachments]"
                                                            value="{{ $inventory->attachments }}" type="file"
                                                            placeholder="..." style="width: 90%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Add More and Remove Buttons -->
                        <div class="row my-3">
                            <div class="col">
                                <button type="button" class="btn btn-primary" id="addSignatory11"
                                    style="height:30px; width:150px;">Add More </button>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Office Branding --}}
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="branding" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <!-- Add More Office Branding -->
                    <div class="container my-1">
                        <div class="accordion" id="brandingAccordion">
                            @foreach ($admins->brandings as $index => $branding)
                                <!-- Initial Accordion Item -->
                                <div class="accordion-item brandingaccordion-item" id="brandingEntry{{ $index }}">
                                    <h2 class="accordion-header" id="brandingHeading{{ $index }}" style="color: white">
                                        <button class="accordion-button" style="background-color: #34005A; color:white"
                                            type="button" data-toggle="collapse" data-target="#brandingCollapse{{ $index }}"
                                            aria-expanded="false" aria-controls="brandingCollapse{{ $index }}">
                                            Office Branding {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <div id="brandingCollapse{{ $index }}" class="collapse"
                                        aria-labelledby="brandingHeading{{ $index }}">
                                        <div class="accordion-body">
                                            <input type="hidden" name="brandings[{{ $index }}][b_id]"
                                                value="{{ $branding->id }}">
                                            <!-- Your content for branding entry goes here -->
                                            <div class="col-lg-12" id="branding_add_fields">
                                                <div class="row mb-2">
                                                    <div class="col-lg-4 spacing-right"> Branding Type
                                                        <br>
                                                        <input class="form-control" id=""
                                                            name="brandings[{{ $index }}][b_type]"
                                                            value="{{ $branding->b_type }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right"> Picture of Branding
                                                        <br>
                                                        <input class="form-control" id=""
                                                            name="brandings[{{ $index }}][picture_of_b]"
                                                            value="{{ $branding->picture_of_b }}" type="file"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-right"> Site of Branding
                                                        <br>
                                                        <input class="form-control" id=""
                                                            name="brandings[{{ $index }}][site_of_b]"
                                                            value="{{ $branding->site_of_b }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-right"> Branding Cost
                                                        <br>
                                                        <input class="form-control" id=""
                                                            name="brandings[{{ $index }}][cost_of_b]"
                                                            value="{{ $branding->cost_of_b }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-4 spacing-right">
                                                        Periodical Maintenance
                                                        <br>
                                                        <input class="form-control" type="text" name="periodical_m[]"
                                                            name="brandings[{{ $index }}][periodical_m]"
                                                            value="{{ $branding->periodical_m }}" placeholder=""
                                                            style="width: 100%;">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 spacing-right" id="maintenanceDateField"
                                                    style="display: none;">
                                                    Maintenance Date
                                                    <br>
                                                    <input class="form-control" type="text" name="maintenance_date[]"
                                                        name="brandings[{{ $index }}][maintenance_date]"
                                                        value="{{ $branding->maintenance_date }}" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="row mb-2">
                                                    <h5>Details of Vendor</h5>
                                                    <div class="col-lg-3 spacing-left">
                                                        Vendor ID/No.
                                                        <br>
                                                        <input class="form-control" type="text"
                                                            name="brandings[{{ $index }}][vendor_id]"
                                                            value="{{ $branding->vendor_id }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Vendor Name
                                                        <br>
                                                        <input class="form-control" id="inpFile2" type="text"
                                                            name="brandings[{{ $index }}][v_name]"
                                                            value="{{ $branding->v_name }}" placeholder="..."
                                                            style="width: 100%;">
                                                        </textarea>
                                                    </div>
                                                    <div class="col-lg-3 spacing-left">
                                                        Vendor Cell Number.
                                                        <br>
                                                        <input class="form-control" type="text"
                                                            name="brandings[{{ $index }}][v_cell]"
                                                            value="{{ $branding->v_cell }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Office Number
                                                        <br>
                                                        <input class="form-control" id="inpFile2" type="text"
                                                            name="brandings[{{ $index }}][v_office]"
                                                            value="{{ $branding->v_office }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-3 spacing-left">
                                                        Floor
                                                        <br>
                                                        <input class="form-control" type="text"
                                                            name="brandings[{{ $index }}][v_floor]"
                                                            value="{{ $branding->v_floor }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Building
                                                        <br>
                                                        <input class="form-control" id="inpFile2" type="text"
                                                            name="brandings[{{ $index }}][v_building]"
                                                            value="{{ $branding->v_building }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-3 spacing-left">
                                                        Block
                                                        <br>
                                                        <input class="form-control" type="text"
                                                            name="brandings[{{ $index }}][v_block]"
                                                            value="{{ $branding->v_block }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Area
                                                        <br>
                                                        <input class="form-control" id="inpFile2" type="text"
                                                            name="brandings[{{ $index }}][v_area]"
                                                            value="{{ $branding->v_area }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-3 spacing-left">
                                                        City
                                                        <br>
                                                        <input class="form-control" type="text"
                                                            name="brandings[{{ $index }}][v_city]"
                                                            value="{{ $branding->v_city }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Photograph of Building
                                                        <br>
                                                        <input class="form-control" id="inpFile2" type="text"
                                                            name="brandings[{{ $index }}][v_photo_b]"
                                                            value="{{ $branding->v_photo_b }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-3 spacing-left">
                                                        Pin Location
                                                        <br>
                                                        <input class="form-control" type="text"
                                                            name="brandings[{{ $index }}][v_pin]"
                                                            value="{{ $branding->v_pin }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Notes
                                                        <br>
                                                        <textarea class="form-control" id="inpFile2" type="text"
                                                            name="brandings[{{ $index }}][v_notes]" placeholder="..."
                                                            style="width: 100%;">{{ $branding->v_notes }}</textarea>
                                                    </div>
                                                    <div class="col-lg-3 spacing-left">
                                                        Attachments
                                                        <br>
                                                        <input class="form-control" type="file"
                                                            name="brandings[{{ $index }}][v_attach]"
                                                            value="{{ $branding->v_attach }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Add More and Remove Buttons -->
                        <div class="row my-3">
                            <div class="col">
                                <button type="button" class="btn btn-primary" id="addBranding"
                                    style="height:30px; width:150px;">Add More </button>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- MoveAble Assets --}}
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="moveable" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="container my-1">
                            <div class="accordion" id="signatoryAccordion13">
                                @foreach ($admins->moveables as $index => $moveable)
                                    <!-- Initial Accordion Item -->
                                    <div class="accordion-item signaccordion-item13" id="signatoryEntry13{{ $index }}">
                                        <h2 class="accordion-header" id="signatoryHeading13{{ $index }}"
                                            style="color: white">
                                            <button class="accordion-button" style="background-color: #34005A; color:white"
                                                type="button" data-toggle="collapse"
                                                data-target="#signatoryCollapse13{{ $index }}" aria-expanded="false"
                                                aria-controls="signatoryCollapse13{{ $index }}">
                                                Vehicle {{ $index + 1 }}
                                            </button>
                                        </h2>
                                        <div id="signatoryCollapse13{{ $index }}" class="collapse"
                                            aria-labelledby="signatoryHeading13{{ $index }}">
                                            <div class="accordion-body">
                                                <input type="hidden" name="moveables[{{ $index }}][m_id]"
                                                    value="{{ $moveable->id }}">
                                                <div class="col-lg-12">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-3 spacing-left spacing-right">
                                                            Type of Vehicle
                                                            <br>
                                                            <input class="form-control"
                                                                name="moveables[{{ $index }}][type_of_vehicle]"
                                                                value="{{ $moveable->type_of_vehicle }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-left spacing-right">
                                                            Vehicle No
                                                            <br>
                                                            <input class="form-control"
                                                                name="moveables[{{ $index }}][vehicle_no]"
                                                                value="{{ $moveable->vehicle_no }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-left spacing-right">
                                                            Vehicle Model
                                                            <br>
                                                            <input class="form-control"
                                                                name="moveables[{{ $index }}][vehicle_model]"
                                                                value="{{ $moveable->vehicle_model }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right">
                                                            Vehicle Picture
                                                            <br>
                                                            <input class="form-control"
                                                                name="moveables[{{ $index }}][vehicle_pic]"
                                                                value="{{ $moveable->vehicle_pic }}" type="file"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-left spacing-right">
                                                            Vehicle Book Picture
                                                            <br>
                                                            <input class="form-control"
                                                                name="moveables[{{ $index }}][vehicle_book_pic]"
                                                                value="{{ $moveable->vehicle_book_pic }}" type="file"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-left">
                                                            Payment Type
                                                            <br>
                                                            <input class="form-control"
                                                                name="moveables[{{ $index }}][payment_type]"
                                                                value="{{ $moveable->payment_type }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-left spacing-right">
                                                            Vehicle Name
                                                            <br>
                                                            <input class="form-control"
                                                                name="moveables[{{ $index }}][vehicle_name]"
                                                                value="{{ $moveable->vehicle_name }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-left spacing-right">
                                                            Engine No.
                                                            <br>
                                                            <input class="form-control"
                                                                name="moveables[{{ $index }}][engine_no]"
                                                                value="{{ $moveable->engine_no }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right">
                                                            Chasis No.
                                                            <br>
                                                            <input class="form-control"
                                                                name="moveables[{{ $index }}][chasis_no]"
                                                                value="{{ $moveable->chasis_no }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-left spacing-right">
                                                            Vehicle Color
                                                            <br>
                                                            <input class="form-control"
                                                                name="moveables[{{ $index }}][vehicle_color]"
                                                                value="{{ $moveable->vehicle_color }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Add More and Remove Buttons -->
                            <div class="row my-3">
                                <div class="col">
                                    <button type="button" class="btn btn-primary" id="addSignatory13"
                                        style="height:30px; width:150px;">Add More </button>
                                </div>
                            </div>
                        </div>
                        {{--
                        <table class="table table-bordered mt-1" id="signatorySummaryTable13">
                            <thead>
                                <tr>
                                    <th>Entry</th>
                                    <th>Vehicle Type</th>
                                    <th>Vehicle Number</th>
                                    <th>Vehicle Model</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table> --}}

                    </div>
                    <ul class="nav nav-tabs" id="moveable-sub-tabs" role="tablist" style="margin-top: 20px;">
                        <li class="nav-item">
                            <a class="nav-link active" id="vehicle-tab" data-toggle="tab" href="#vehicle" role="tab"
                                aria-controls="vehicle" aria-selected="true">Vehicle Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="insurrance-tab" data-toggle="tab" href="#insurrance" role="tab"
                                aria-controls="bike" aria-selected="false">Insurance Copmany
                                Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tracker-tab" data-toggle="tab" href="#tracker" role="tab"
                                aria-controls="tracker" aria-selected="false">Tracker Copmany
                                Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="repair-tab" data-toggle="tab" href="#repair" role="tab"
                                aria-controls="repair" aria-selected="false">Repair &
                                Maintenance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="usage-tab" data-toggle="tab" href="#usage" role="tab"
                                aria-controls="usage" aria-selected="false">Usage/Movement</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="moveable-sub-tab-content">
                        <div class="tab-pane fade show active" id="vehicle" role="tabpanel"
                            aria-labelledby="vehicle-tab">
                            <!-- Car Form Content -->
                            <!-- Modify this area to include the form fields related to cars -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="container  my-1" id="armourContainer">
                                        <div class="accordion" id="armourAccordion">
                                            @foreach ($admins->tokens as $index => $token)
                                                <!-- Initial Accordion Item -->
                                                <div class="accordion-item armouraccordion-item"
                                                    id="armourEntry1{{ $index }}">
                                                    <h2 class="accordion-header" id="armourHeading1{{ $index }}"
                                                        style="color: white">
                                                        <button class="accordion-button"
                                                            style="background-color: #34005A; color:white" type="button"
                                                            data-toggle="collapse"
                                                            data-target="#armourCollapse1{{ $index }}" aria-expanded="false"
                                                            aria-controls="armourCollapse1{{ $index }}">
                                                            Token Entry {{ $index + 1 }}
                                                        </button>
                                                    </h2>
                                                    <div id="armourCollapse1{{ $index }}" class="collapse"
                                                        aria-labelledby="armourHeading1{{ $index }}">
                                                        <div class="accordion-body">
                                                            <input type="hidden" name="tokens[{{ $index }}][t_id]"
                                                                value="{{ $token->id }}">
                                                            <div id="cleaningInfo">
                                                                <div class="row col-lg-12">
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Amount Paid
                                                                        <br>
                                                                        <input class="form-control" type="text"
                                                                            name="tokens[{{ $index }}][amount_paid]"
                                                                            value="{{ $token->amount_paid }}"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Type of Payment
                                                                        <br>
                                                                        <input class="form-control" type="text"
                                                                            name="tokens[{{ $index }}][type_of_payment]"
                                                                            value="{{ $token->type_of_payment }}"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Instrument Number
                                                                        <br>
                                                                        <input class="form-control" type="text"
                                                                            name="tokens[{{ $index }}][ins_no]"
                                                                            value="{{ $token->ins_no }}" placeholder="..."
                                                                            style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Voucher No.
                                                                        <br>
                                                                        <input class="form-control" type="text"
                                                                            name="tokens[{{ $index }}][voucher_no]"
                                                                            value="{{ $token->voucher_no }}"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Payment Date
                                                                        <br>
                                                                        <input class="form-control" type="date"
                                                                            name="tokens[{{ $index }}][payment_date]"
                                                                            value="{{ $token->payment_date }}"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Notes
                                                                        <br>
                                                                        <textarea class="form-control" type="text"
                                                                            name="tokens[{{ $index }}][token_note]"
                                                                            placeholder="..."
                                                                            style="width: 100%;">{{ $token->token_note }}</textarea>
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Attachment
                                                                        <br>
                                                                        <input class="form-control" type="file"
                                                                            name="tokens[{{ $index }}][token_attach]"
                                                                            value="{{ $token->token_attach }}"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Add More and Remove Buttons -->
                                        <div class="row my-3">
                                            <div class="col">
                                                <button type="button" class="btn btn-primary" id="addArmour"
                                                    style="height:30px; width:150px;">Add More</button>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Next Token Payment Date
                                        <br>
                                        <input class="form-control" type="text" name="next_payment_date[]"
                                            placeholder="alert" style="width: 100%;">
                                    </div>
                                    {{--
                                    <table class="table table-bordered mt-3" id="armourSummaryTable">
                                        <thead>
                                            <tr>
                                                <th>Entry</th>
                                                <th>Amount Paid</th>
                                                <th>Type of Payment</th>
                                                <th>Voucher No.</th>
                                                <th>Payment Date</th>
                                                <th>View</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table> --}}
                                </div>
                            </div>
                        </div>
                        {{-- Insurrance Company Tab --}}
                        <div class="tab-pane fade" id="insurrance" role="tabpanel" aria-labelledby="insurrance-tab">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="container  my-1" id="auditContainer">
                                        <div class="accordion" id="auditAccordion">
                                            @foreach ($admins->insurrances as $index => $insurrance)
                                                <!-- Initial Accordion Item -->
                                                <div class="accordion-item auditaccordion-item"
                                                    id="auditEntry1{{ $index }}">
                                                    <h2 class="accordion-header" id="auditHeading1{{ $index }}"
                                                        style="color: white">
                                                        <button class="accordion-button"
                                                            style="background-color: #34005A; color:white" type="button"
                                                            data-toggle="collapse" data-target="#auditCollapse1{{ $index }}"
                                                            aria-expanded="false"
                                                            aria-controls="auditCollapse1{{ $index }}">
                                                            Insurance Company Details {{ $index + 1 }}
                                                        </button>
                                                    </h2>
                                                    <div id="auditCollapse1{{ $index }}" class="collapse"
                                                        aria-labelledby="auditHeading1{{ $index }}">
                                                        <div class="accordion-body">
                                                            <input type="hidden" name="insurrances[{{ $index }}][ins_id]"
                                                                value="{{ $insurrance->id }}">
                                                            <div class=" row main-content div" id="auditsInfo">
                                                                <div class="col-lg-12">
                                                                    <h5>POC :</h5>
                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Company Name :
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][company_name]"
                                                                                value="{{ $insurrance->company_name }}"
                                                                                type="text" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-left spacing-right">
                                                                            Name
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][i_poc_name]"
                                                                                value="{{ $insurrance->i_poc_name }}"
                                                                                type="text" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Web
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][i_poc_web]"
                                                                                value="{{ $insurrance->i_poc_web }}"
                                                                                type="text" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Email
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][i_poc_email]"
                                                                                value="{{ $insurrance->i_poc_email }}"
                                                                                type="text" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Cell Number :
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][i_poc_cell]"
                                                                                value="{{ $insurrance->i_poc_cell }}"
                                                                                type="text" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-left spacing-right">
                                                                            Value of Sum Insured
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][value_of_sum]"
                                                                                value="{{ $insurrance->value_of_sum }}"
                                                                                type="text" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Insurance Policy Attachment
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][ins_p_pic]"
                                                                                value="{{ $insurrance->ins_p_pic }}"
                                                                                type="file" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Certificate of Insurrance
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][c_of_ins]"
                                                                                value="{{ $insurrance->c_of_ins }}"
                                                                                type="file" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <h5>Address</h5>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Office No. :
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][i_poc_office]"
                                                                                value="{{ $insurrance->i_poc_office }}"
                                                                                type="text" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-left spacing-right">
                                                                            Floor No.
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][i_poc_floor]"
                                                                                value="{{ $insurrance->i_poc_floor }}"
                                                                                type="text" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Building
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][i_poc_building]"
                                                                                value="{{ $insurrance->i_poc_building }}"
                                                                                type="text" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Block
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][i_poc_block]"
                                                                                value="{{ $insurrance->i_poc_block }}"
                                                                                type="text" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Area
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][i_poc_area]"
                                                                                value="{{ $insurrance->i_poc_area }}"
                                                                                type="text" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-left spacing-right">
                                                                            City
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][i_poc_city]"
                                                                                value="{{ $insurrance->i_poc_city }}"
                                                                                type="text" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Photograph of Location
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][i_poc_loc]"
                                                                                value="{{ $insurrance->i_poc_loc }}"
                                                                                type="file" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Pin Location
                                                                            <br>
                                                                            <input class="form-control"
                                                                                name="insurrances[{{ $index }}][i_poc_pin]"
                                                                                value="{{ $insurrance->i_poc_pin }}"
                                                                                type="text" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-6 spacing-right mt-2">
                                                                        Notes
                                                                        <br>
                                                                        <textarea id="w3review12"
                                                                            onclick="moveCursorToStart12()"
                                                                            oninput="trimSpaces12()" class="form-control"
                                                                            name="insurrances[{{ $index }}][ins_note]"
                                                                            rows="2" cols="38">
                                                                                        {{ $insurrance->ins_note }}
                                                                                    </textarea>
                                                                    </div>
                                                                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                                                                        Attachments
                                                                        <br>
                                                                        <input class="form-control"
                                                                            name="insurrances[{{ $index }}][ins_attach]"
                                                                            value="{{ $insurrance->ins_attach }}"
                                                                            type="file" placeholder="..."
                                                                            style="width: 70%;" multiple>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Add More and Remove Buttons -->
                                        <div class="row my-3">
                                            <div class="col">
                                                <button type="button" class="btn btn-primary" id="addAudit"
                                                    style="height:30px; width:150px;">Add More</button>
                                            </div>

                                        </div>

                                    </div>
                                    {{--
                                    <table class="table table-bordered mt-3" id="auditSummaryTable">
                                        <thead>
                                            <tr>
                                                <th>Entry</th>
                                                <th>Comany Name.</th>
                                                <th>POC Name.</th>
                                                <th>POC Cell No.</th>
                                                <th>View</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table> --}} {{--
                                    <button type="button" class="btn btn-primary saveButton"
                                        data-next-tab="#address-details">Save and Next</button> --}}
                                </div>
                            </div>
                        </div>
                        {{-- Tracking Company --}}
                        <div class="tab-pane fade" id="tracker" role="tabpanel" aria-labelledby="tracker-tab">
                            <div class="container  my-1" id="promactContainer">
                                <div class="accordion" id="promactAccordion">
                                    <!-- Initial Accordion Item -->
                                    @foreach ($admins->trackers as $index => $tracker)
                                        <div class="accordion-item promactaccordion-item" id="promactEntry1{{ $index }}">
                                            <h2 class="accordion-header" id="promactHeading1{{ $index }}"
                                                style="color: white">
                                                <button class="accordion-button"
                                                    style="background-color: #34005A; color:white" type="button"
                                                    data-toggle="collapse" data-target="#promactCollapse1{{ $index }}"
                                                    aria-expanded="false" aria-controls="promactCollapse1{{ $index }}">
                                                    Tracker Details {{ $index + 1 }}
                                                </button>
                                            </h2>
                                            <div id="promactCollapse1{{ $index }}" class="collapse"
                                                aria-labelledby="promactHeading1{{ $index }}">
                                                <div class="accordion-body">
                                                    <input type="hidden" name="trackers[{{ $index }}][tr_id]"
                                                        value="{{ $tracker->id }}">
                                                    <div class=" row main-content div" id="">

                                                        <div class="col-lg-12">
                                                            <h5>POC :</h5>
                                                            <div class="row mb-2">
                                                                <div class="col-lg-3 spacing-right">
                                                                    Company Name :
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="trackers[{{ $index }}][tracker_company_name]"
                                                                        value="{{ $tracker->tracker_company_name }}"
                                                                        type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-left spacing-right">
                                                                    Name
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="trackers[{{ $index }}][t_poc_name]"
                                                                        value="{{ $tracker->t_poc_name }}" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Web
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="trackers[{{ $index }}][t_poc_web]"
                                                                        value="{{ $tracker->t_poc_web }}" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Email
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="trackers[{{ $index }}][t_poc_email]"
                                                                        value="{{ $tracker->t_poc_email }}" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>

                                                                <div class="col-lg-3 spacing-right">
                                                                    Cell Number :
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="trackers[{{ $index }}][t_poc_cell]"
                                                                        value="{{ $tracker->t_poc_cell }}" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <h5>Address</h5>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Office No. :
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="trackers[{{ $index }}][t_poc_office]"
                                                                        value="{{ $tracker->t_poc_office }}" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-left spacing-right">
                                                                    Floor No.
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="trackers[{{ $index }}][t_poc_floor]"
                                                                        value="{{ $tracker->t_poc_floor }}" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Building
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="trackers[{{ $index }}][t_poc_building]"
                                                                        value="{{ $tracker->t_poc_building }}" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Block
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="trackers[{{ $index }}][t_poc_block]"
                                                                        value="{{ $tracker->t_poc_block }}" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>

                                                                <div class="col-lg-3 spacing-right">
                                                                    Area
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="trackers[{{ $index }}][t_poc_area]"
                                                                        value="{{ $tracker->t_poc_area }}" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-left spacing-right">
                                                                    City
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="trackers[{{ $index }}][t_poc_city]"
                                                                        value="{{ $tracker->t_poc_city }}" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Photograph of Location
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="trackers[{{ $index }}][t_poc_loc]"
                                                                        value="{{ $tracker->t_poc_loc }}" type="file"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Pin Location
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="trackers[{{ $index }}][t_poc_pin]"
                                                                        value="{{ $tracker->t_poc_pin }}" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col-lg-6 spacing-right mt-2">
                                                                Notes
                                                                <br>
                                                                <textarea id="w3review12" onclick="moveCursorToStart12()"
                                                                    oninput="trimSpaces12()" class="form-control"
                                                                    name="trackers[{{ $index }}][tracker_note]" rows="2"
                                                                    cols="38">
                                                                                {{ $tracker->tracker_note }}
                                                                            </textarea>
                                                            </div>
                                                            <div class="col-lg-6 spacing-left spacing-right mt-2">
                                                                Attachments
                                                                <br>
                                                                <input class="form-control"
                                                                    name="trackers[{{ $index }}][tracker_attach]"
                                                                    value="{{ $tracker->tracker_attach }}" type="file"
                                                                    placeholder="..." style="width: 70%;" multiple>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Add More and Remove Buttons -->
                                <div class="row my-3">
                                    <div class="col">
                                        <button type="button" class="btn btn-primary" id="addPromact"
                                            style="height:30px; width:200px;">Add More</button>
                                    </div>

                                </div>

                            </div>

                            {{--
                            <table class="table table-bordered mt-3" id="promactSummaryTable">
                                <thead>
                                    <tr>
                                        <th>Entry</th>
                                        <th>Company Name</th>
                                        <th>Poc Name</th>
                                        <th>POC Cell</th>
                                        <th>View</th>


                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table> --}}

                        </div>
                        {{-- Repair & Maintenance --}}
                        <div class="tab-pane fade" id="repair" role="tabpanel" aria-labelledby="repair-tab">
                            <div class="accordion" id="notificationAccordion">
                                <!-- Initial Accordion Item -->
                                @foreach ($admins->repairs as $index => $repair)
                                    <div class="accordion-item notificationaccordion-item"
                                        id="notificationEntry1{{ $index }}">
                                        <h2 class="accordion-header" id="notificationHeading1{{ $index }}"
                                            style="color: white">
                                            <button class="accordion-button" style="background-color: #34005A; color:white"
                                                type="button" data-toggle="collapse"
                                                data-target="#notificationCollapse1{{ $index }}" aria-expanded="false"
                                                aria-controls="notificationCollapse1{{ $index }}">
                                                Repair & Maintenance {{ $index + 1 }}
                                            </button>
                                        </h2>
                                        <div id="notificationCollapse1{{ $index }}" class="collapse"
                                            aria-labelledby="notificationHeading1{{ $index }}">
                                            <div class="accordion-body">
                                                <input type="hidden" name="repairs[{{ $index }}][r_id]"
                                                    value="{{ $repair->id }}">
                                                <div class=" row main-content div" id="">
                                                    <div class="col-lg-12">
                                                        <div class="row mb-2">
                                                            <div class="col-lg-3 spacing-right">
                                                                Serial No.
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][serial_no]"
                                                                    value="{{ $repair->serial_no }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-3 spacing-left spacing-right">
                                                                Description
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_desc]"
                                                                    value="{{ $repair->r_desc }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-3 spacing-right">
                                                                Amount of Bill
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_amount]"
                                                                    value="{{ $repair->r_amount }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-3 spacing-right">
                                                                Payment Made By
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_pay_by]"
                                                                    value="{{ $repair->r_pay_by }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-3 spacing-right">
                                                                Date
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_date]"
                                                                    value="{{ $repair->r_date }}" type="date"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <h5>Vendor Details :</h5>
                                                            <div class="col-lg-3 spacing-right">
                                                                Company Name :
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][repair_company_name]"
                                                                    value="{{ $repair->repair_company_name }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-3 spacing-left spacing-right">
                                                                Name
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_poc_name]"
                                                                    value="{{ $repair->r_poc_name }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-3 spacing-right">
                                                                Web
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_poc_web]"
                                                                    value="{{ $repair->r_poc_web }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-3 spacing-right">
                                                                Email
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_poc_email]"
                                                                    value="{{ $repair->r_poc_email }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-3 spacing-right">
                                                                Cell Number :
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_poc_cell]"
                                                                    value="{{ $repair->r_poc_cell }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <h5>Address</h5>
                                                            <div class="col-lg-3 spacing-right">
                                                                Office No. :
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_poc_office]"
                                                                    value="{{ $repair->r_poc_office }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-3 spacing-left spacing-right">
                                                                Floor No.
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_poc_floor]"
                                                                    value="{{ $repair->r_poc_floor }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-3 spacing-right">
                                                                Building
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_poc_building]"
                                                                    value="{{ $repair->r_poc_building }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-3 spacing-right">
                                                                Block
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_poc_block]"
                                                                    value="{{ $repair->r_poc_block }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>

                                                            <div class="col-lg-3 spacing-right">
                                                                Area
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_poc_area]"
                                                                    value="{{ $repair->r_poc_area }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-3 spacing-left spacing-right">
                                                                City
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_poc_city]"
                                                                    value="{{ $repair->r_poc_city }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-3 spacing-right">
                                                                Photograph of Location
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_poc_loc]"
                                                                    value="{{ $repair->r_poc_loc }}" type="file"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-3 spacing-right">
                                                                Pin Location
                                                                <br>
                                                                <input class="form-control"
                                                                    name="repairs[{{ $index }}][r_poc_pin]"
                                                                    value="{{ $repair->r_poc_pin }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h5>Any Warranty :</h5>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                                            Any Warranty
                                                            <br>
                                                            <input class="form-control"
                                                                name="repairs[{{ $index }}][r_warranty]"
                                                                value="{{ $repair->r_warranty }}" type="file"
                                                                placeholder="..." style="width: 70%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-right mt-2">
                                                            Notes
                                                            <br>
                                                            <textarea id="w3review12" class="form-control"
                                                                name="repairs[{{ $index }}][warranty_note]" rows="2"
                                                                cols="38">
                                                                            {{ $repair->warranty_note }}
                                                                        </textarea>
                                                        </div>

                                                    </div>

                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-right mt-2">
                                                            Notes
                                                            <br>
                                                            <textarea id="w3review12" onclick="moveCursorToStart12()"
                                                                oninput="trimSpaces12()" class="form-control"
                                                                name="repairs[{{ $index }}][repair_note]" rows="2"
                                                                cols="38">
                                                                            {{ $repair->repair_note }}
                                                                        </textarea>
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                                            Attachments
                                                            <br>
                                                            <input class="form-control"
                                                                name="repairs[{{ $index }}][repair_attach]"
                                                                value="{{ $repair->repair_attach }}" type="file"
                                                                placeholder="..." style="width: 70%;" multiple>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Add More and Remove Buttons -->
                            <div class="row my-3">
                                <div class="col">
                                    <button type="button" class="btn btn-primary" id="addNotification"
                                        style="height:30px; width:150px;">Add More</button>
                                </div>

                            </div>

                            {{--
                            <table class="table table-bordered mt-3" id="notificationSummaryTable">
                                <thead>
                                    <tr>
                                        <th>Entry</th>
                                        <th>Serial No</th>
                                        <th>Description</th>
                                        <th>Amount Of Bill</th>
                                        <th>View</th>


                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table> --}}
                        </div>
                        {{-- Usage & Movement --}}
                        <div class="tab-pane fade" id="usage" role="tabpanel" aria-labelledby="usage-tab">
                            <div class="row mb-2">
                                <div class="col-lg-4 spacing-right">
                                    <h5 class="mt-4" style="margin-left: 20px;"><strong><i>VEHICLE LOG
                                                BOOK</i></strong></h5>
                                </div>
                            </div>
                            <div class="container my-5" id="ItemAccordionContainer">
                                <div class="accordion" id="itemAccordion">
                                    @foreach ($admins->usages as $index => $usage)
                                        <!-- Initial Accordion Item -->
                                        <div class="accordion-item itemAccordion-item" id="itemEntry1{{ $index }}">
                                            <h2 class="accordion-header" id="itemHeading1{{ $index }}" style="color: white">
                                                <button class="accordion-button"
                                                    style="background-color: #34005A; color:white" type="button"
                                                    data-toggle="collapse" data-target="#collapseItem1{{ $index }}"
                                                    aria-expanded="false" aria-controls="collapseItem1{{ $index }}">
                                                    Usage/Movement {{ $index + 1 }}
                                                </button>
                                            </h2>
                                            <div id="collapseItem1{{ $index }}" class="collapse"
                                                aria-labelledby="itemHeading1{{ $index }}">
                                                <div class="accordion-body">
                                                    <input type="hidden" name="usages[{{ $index }}][u_id]"
                                                        value="{{ $usage->id }}">
                                                    <div id="vendorDetailsContainer">
                                                        <div class="form-type col-lg-12 spacing-right">
                                                            <div class="d-flex mt-2">
                                                                <div class="col-lg-6 spacing-right">
                                                                    Vehicle No.
                                                                    <br>
                                                                    <input class="form-control" type="text"
                                                                        name="usages[{{ $index }}][usage_vehicle_no]"
                                                                        value="{{ $usage->usage_vehicle_no }}"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-6 spacing-left spacing-right">
                                                                    Average Per Liter:
                                                                    <br>
                                                                    <input class="form-control" type="text"
                                                                        name="usages[{{ $index }}][avg_per_liter]"
                                                                        value="{{ $usage->avg_per_liter }}" placeholder=""
                                                                        style="width: 100%;">
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-2">
                                                                <div class="col-md-3">
                                                                    Date
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="usages[{{ $index }}][date_of_m]"
                                                                        value="{{ $usage->date_of_m }}" type="date"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Time From
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="usages[{{ $index }}][time_from]"
                                                                        value="{{ $usage->time_from }}" type="time"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Time To
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="usages[{{ $index }}][time_to]"
                                                                        value="{{ $usage->time_to }}" type="time"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Details Of Journey
                                                                    <br>
                                                                    <textarea class="form-control"
                                                                        name="usages[{{ $index }}][details_of_j]"
                                                                        type="text" placeholder="..."
                                                                        style="width: 100%;">{{ $usage->details_of_j }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-2">
                                                                <div class="col-md-3">
                                                                    Purpose Of Journey
                                                                    <br>
                                                                    <input class="form-control loi-price"
                                                                        name="usages[{{ $index }}][purpose_of_j]"
                                                                        value="{{ $usage->purpose_of_j }}" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Name of Officer
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="usages[{{ $index }}][name_of_officer]"
                                                                        value="{{ $usage->name_of_officer }}" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Meter Reading to
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="usages[{{ $index }}][meter_reading_to]"
                                                                        value="{{ $usage->meter_reading_to }}" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Meter Reading From
                                                                    <br>
                                                                    <input class="form-control"
                                                                        name="usages[{{ $index }}][meter_reading_from]"
                                                                        value="{{ $usage->meter_reading_from }}" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="col-md-3 spacing-left">
                                                                Distance Covered
                                                                <input class="form-control" type="text"
                                                                    name="usages[{{ $index }}][distance_covered]"
                                                                    value="{{ $usage->distance_covered }}" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-md-3">
                                                                Signature
                                                                <br>
                                                                <input class="form-control"
                                                                    name="usages[{{ $index }}][signature]"
                                                                    value="{{ $usage->signature }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-md-3">
                                                                P.O.L Drawn
                                                                <br>
                                                                <input class="form-control"
                                                                    name="usages[{{ $index }}][p_o_l]"
                                                                    value="{{ $usage->p_o_l }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-md-3">
                                                                Remarks
                                                                <br>
                                                                <input class="form-control"
                                                                    name="usages[{{ $index }}][remarks]"
                                                                    value="{{ $usage->remarks }}" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Add More and Remove Buttons -->
                                <div class="row my-3">
                                    <div class="col-lg-3">
                                        <button type="button" class="btn btn-primary" id="addAccItem"
                                            style="height:30px; width:150px;">Add More</button>
                                    </div>
                                    <div class="col-lg-3">
                                    </div>
                                    <div class="col-lg-3">
                                    </div>
                                    <div class="col-lg-3">

                                    </div>
                                </div>
                            </div>
                            {{--
                            <table class="table table-bordered my-3" id="itemSummaryTable">
                                <thead>
                                    <tr>
                                        <th>Entry</th>
                                        <th>Date</th>
                                        <th>Name of Officer</th>
                                        <th>Distance Covered</th>
                                        <th>P.O.L Drawn</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table> --}}
                        </div>
                    </div>
                </div>
                {{-- Notifications --}}
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="notification" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <div class="container my-1">
                        <div class="accordion" id="signatoryAccordion12">
                            <!-- Initial Accordion Item -->
                            @foreach ($admins->notifications as $index => $notification)
                                <div class="accordion-item signaccordion-item12" id="signatoryEntry12{{ $index }}">
                                    <h2 class="accordion-header" id="signatoryHeading12{{ $index }}" style="color: white">
                                        <button class="accordion-button" style="background-color: #34005A; color:white"
                                            type="button" data-toggle="collapse"
                                            data-target="#signatoryCollapse12{{ $index }}" aria-expanded="false"
                                            aria-controls="signatoryCollapse12{{ $index }}">
                                            Notification Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <div id="signatoryCollapse12{{ $index }}" class="collapse"
                                        aria-labelledby="signatoryHeading12{{ $index }}">
                                        <div class="accordion-body">
                                            <input type="hidden" name="notifications[{{ $index }}][n_id]"
                                                value="{{ $notification->id }}">
                                            <div class="col-lg-12 spacing-right">
                                                <div class="row mb-2">
                                                    <div class="col-lg-3 spacing-right">
                                                        Notification No.
                                                        <br>
                                                        <input class="form-control" type="text"
                                                            name="notifications[{{ $index }}][notification_no]"
                                                            value="{{ $notification->notification_no }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Notification Related to.
                                                        <br>
                                                        <input class="form-control" type="text"
                                                            name="notifications[{{ $index }}][notification_related]"
                                                            value="{{ $notification->notification_related }}"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>

                                                    <div class="col-lg-3">
                                                        Notes.
                                                        <br>
                                                        <textarea class="form-control" type="text"
                                                            name="notifications[{{ $index }}][notification_notes]"
                                                            placeholder="..."
                                                            style="width: 100%;">{{ $notification->notification_notes }}</textarea>
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Attachment.
                                                        <br>
                                                        <input class="form-control" type="file"
                                                            name="notifications[{{ $index }}][notification_attach]"
                                                            value="{{ $notification->notification_attach }}"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <h5>Notification To :</h5>
                                                <div class="row">
                                                    <div class="col-lg-4 spacing-left">
                                                        Notification Shared with .
                                                        <br>
                                                        <input class="form-control" type="text"
                                                            name="notifications[{{ $index }}][notification_to]"
                                                            value="{{ $notification->notification_to }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Add More and Remove Buttons -->
                        <div class="row my-3">
                            <div class="col">
                                <button type="button" class="btn btn-primary" id="addSignatory12"
                                    style="height:30px; width:150px;">Add More
                                </button>
                            </div>

                        </div>

                        {{--
                        <table class="table table-bordered mt-1" id="signatorySummaryTable12">
                            <thead>
                                <tr>
                                    <th>Entry</th>
                                    <th>Notification No.</th>
                                    <th>Notification Related To</th>
                                    <th>Notification To </th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table> --}}
                    </div>
                </div>
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="social_account_report" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                        <li class="nav-item " role="presentation">
                            <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Files Report Nationwide
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false"> Weekly Nationwide Security/Sedulous &amp; Handbooks
                                Report</button>
                        </li>

                        {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-Sales-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Sales" type="button" role="tab" aria-controls="pills-Sales"
                                aria-selected="false">Sales Register Report</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-Quotation-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Quotation" type="button" role="tab"
                                aria-controls="pills-Quotation" aria-selected="false">Quotation Register Report
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-Feedback-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Feedback" type="button" role="tab" aria-controls="pills-Feedback"
                                aria-selected="false">Feedback Register Report
                            </button>
                        </li> --}}
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-dailysalesreport-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-dailysalesreport" type="button" role="tab"
                                aria-controls="pills-dailysalesreport" aria-selected="false">Daily Sales Report
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-southregionalesreport-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-southregionalesreport" type="button" role="tab"
                                aria-controls="pills-southregionalesreport" aria-selected="false">REGION WISE - DAILY
                                SALES & FEEDBACK LOG
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-southvisitsalesreport-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-southvisitsalesreport" type="button" role="tab"
                                aria-controls="pills-southvisitsalesreport" aria-selected="false">REGION WISE - WEEKLY
                                SALES VISIT PLAN
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-regionpipelinereport-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-regionpipelinereport" type="button" role="tab"
                                aria-controls="pills-regionpipelinereport" aria-selected="false">REGION WISE - DAILY
                                PIPELINE SALES REPORT
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-regionvisitpipelinereport-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-regionvisitpipelinereport" type="button" role="tab"
                                aria-controls="pills-regionvisitpipelinereport" aria-selected="false">Region wise Daily
                                Finalize Sales report
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="container-fluid mt-4">
                                <h2 class="text-center text-light bg-dark py-2">
                                    Files Report Nationwide
                                </h2>
                                <div class="card">
                                    <div class="card-body">
                                        <table id="clientReportTable" class="table table-bordered table-striped">
                                            <thead style="position: sticky; top: 0; background: #fff; z-index: 1;">
                                                <tr>
                                                    <th>Branches</th>
                                                    <th>Customers Files</th>
                                                    <th>Sedulous Files</th>
                                                    <th>Training Files</th>
                                                    <th>Guard Files</th>
                                                    <th>Score Card</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($compaigns as $index => $compaign)
                                                                                            <tr>

                                                                                                <td>{{ $compaign->region }}</td>

                                                                                                <td>
                                                                                                    <input type="text" name="customer_files"
                                                                                                        class="form-control autosave" data-id="{{ $compaign->id }}"
                                                                                                        value="{{ $compaign->customer_files }}">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" name="sedulous_files"
                                                                                                        class="form-control autosave" data-id="{{ $compaign->id }}"
                                                                                                        value="{{ $compaign->sedulous_files }}">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" name="training_files"
                                                                                                        class="form-control autosave" data-id="{{ $compaign->id }}"
                                                                                                        value="{{ $compaign->training_files }}">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" name="guard_files"
                                                                                                        class="form-control autosave" data-id="{{ $compaign->id }}"
                                                                                                        value="{{ $compaign->guard_files }}">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" name="score_card"
                                                                                                        class="form-control autosave" data-id="{{ $compaign->id }}"
                                                                                                        value="{{ $compaign->score_card }}">
                                                                                                </td>

                                                                                                <td>Update: {{
                                                    \Carbon\Carbon::parse($compaign->updated_at)->format('d-M-Y') }}
                                                                                                </td>
                                                                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <script>
                                document.querySelectorAll('.autosave').forEach(input => {
                                    input.addEventListener('change', function () {
                                        const id = this.getAttribute('data-id');
                                        const field = this.getAttribute('name');
                                        const value = this.value;
                                        fetch("{{ route('campaign.autosave') }}", {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            },
                                            body: JSON.stringify({
                                                id,
                                                field,
                                                value
                                            })
                                        })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.status === 'success') {
                                                    console.log('Saved successfully');
                                                } else {
                                                    alert('Save failed');
                                                }
                                            });
                                    });
                                });
                            </script>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <div class="container-fluid">
                                <h3 class="text-center text-light bg-dark">Weekly Handbook Nationwide Report -
                                    {{ \Carbon\Carbon::now()->format('d F Y') }}
                                </h3>

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>BRANCH ID</th>
                                            <th>BRANCH Name</th>
                                            <th>NEW Profiles</th>
                                            <th>OLD Profiles</th>
                                            <th>SEDULOUS</th>
                                            <th>HANDBOOKS</th>
                                            <th>KEY CHAINS</th>
                                            <th>CALENDARS</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="wn_report_table">
                                        <tr>
                                            <td>
                                                <input type="hidden" id="branchsss_id" value="{{ $admins->branch_id }}">
                                                <input type="text" value="{{ $admins->branch_id }}" class="form-control"
                                                    disabled>



                                            </td>
                                            <td> <input type="text" value="{{ $admins->branch_office_name }}"
                                                    class="form-control" disabled></td>
                                            <td>
                                                <input type="text" class="form-control" id="new_profiles">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="old_profiles">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="sedulous_profiles">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="handbooks">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="kay_chains">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="calenders">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="remarks">

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success"
                                                    onclick="saveNationwide()">Save</button>
                                            </td>
                                        </tr>
                                        @foreach ($wnationswide as $item)
                                            <tr>
                                                <td>{{ $item->branch_id }}</td>
                                                <td>{{ $item->admin->branch_office_name ?? 'N/A' }}</td>
                                                <td>{{ $item->new_profiles }}</td>
                                                <td>{{ $item->old_profiles }}</td>
                                                <td>{{ $item->sedulous_profiles }}</td>
                                                <td>{{ $item->handbooks }}</td>
                                                <td>{{ $item->kay_chains }}</td>
                                                <td>{{ $item->calenders }}</td>
                                                <td>{{ $item->remarks }}</td>
                                                <td><span class="badge bg-success">Saved</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <script>
                                function saveNationwide() {
                                    const data = {
                                        branch_id: document.getElementById('branchsss_id').value,
                                        new_profiles: document.getElementById('new_profiles').value,
                                        old_profiles: document.getElementById('old_profiles').value,
                                        sedulous_profiles: document.getElementById('sedulous_profiles').value,
                                        handbooks: document.getElementById('handbooks').value,
                                        kay_chains: document.getElementById('kay_chains').value,
                                        calenders: document.getElementById('calenders').value,
                                        remarks: document.getElementById('remarks').value,

                                    };

                                    fetch("{{ route('wnationwide.store') }}", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/json",
                                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                        },
                                        body: JSON.stringify(data)
                                    })
                                        .then(response => response.json())
                                        .then(res => {
                                            if (res.status === 'success') {
                                                alert("Data save successfully!");

                                                const newRow = document.createElement("tr");
                                                newRow.innerHTML = `
                                                  <td>${data.branch_id}</td>
                                                  <td>${data.new_profiles}</td>
                                                  <td>${data.old_profiles}</td>
                                                  <td>${data.sedulous_profiles}</td>
                                                  <td>${data.handbooks}</td>
                                                  <td>${data.kay_chains}</td>
                                                  <td>${data.calenders}</td>
                                                  <td>${data.remarks}</td>

                                                  <td>Saved</td>
                                              `;
                                                document.getElementById('wn_report_table').prepend(newRow);

                                                // Clear input fields
                                                ['new_profiles', 'old_profiles', 'sedulous_profiles', 'handbooks', 'kay_chains', 'calenders',
                                                    'remarks'
                                                ].forEach(id => {
                                                    document.getElementById(id).value = '';
                                                });

                                            } else {
                                                alert("Failed to save.");
                                            }
                                        })
                                        .catch(err => {
                                            console.error(err);
                                            alert("Error occurred.");
                                        });
                                }
                            </script>
                        </div>

                        {{-- <div class="tab-pane fade" id="pills-Sales" role="tabpanel"
                            aria-labelledby="pills-Sales-tab">
                            <div class="container-fluid">

                                <h3 class="text-center text-light bg-dark">Sales Register
                                    Report-{{ \Carbon\Carbon::now()->format('d F Y') }}</h3>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Select Start and End Date</th>
                                            <th>{{ $admins->branch_category }} {{ $admins->cro_name }}</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" id="branch_id"
                                                    value="{{ $admins->id }}" disabled>
                                                <input type="hidden" id="report_name" value="sales_register_report">
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <input type="date" id="startDate" class="form-control"
                                                        placeholder="Start Date">
                                                    <input type="date" id="endDate" class="form-control"
                                                        placeholder="End Date">
                                                </div>
                                            </td>
                                            <td>
                                                <input type="file" id="dailyFile" class="form-control">
                                            </td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-success" id="uploadButton">Upload
                                                    Sales Report</button>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                                <script>
                                    document.getElementById('uploadButton').addEventListener('click', function () {
                                        const fileInput = document.getElementById('dailyFile');
                                        const startDateInput = document.getElementById('startDate');
                                        const endDateInput = document.getElementById('endDate');
                                        const branchId = document.getElementById('branch_id').value;
                                        const reportName = document.getElementById('report_name').value;

                                        const file = fileInput.files[0];
                                        const startDate = startDateInput.value;
                                        const endDate = endDateInput.value;

                                        if (!file || !startDate || !endDate) {
                                            alert("Please select start date, end date and a file.");
                                            return;
                                        }

                                        const formData = new FormData();
                                        formData.append('branch_id', branchId);
                                        formData.append('start_date', startDate);
                                        formData.append('end_date', endDate);
                                        formData.append('report_name', reportName);
                                        formData.append('attachment', file);

                                        fetch("{{ route('sales.register.report') }}", {
                                            method: 'POST',
                                            headers: {
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            },
                                            body: formData
                                        })
                                            .then(response => response.json())
                                            .then(data => {
                                                alert(data.message || 'File uploaded!');
                                                fileInput.value = '';
                                                startDateInput.value = '';
                                                endDateInput.value = '';
                                            })
                                            .catch(error => {
                                                console.error(error);
                                                alert('Failed to upload file.');
                                            });
                                    });
                                </script>
                                <table class="table table-bordered" id="salesReportTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Branch Name</th>
                                            <th>CRO Name</th>
                                            <th>Attachment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($salesreports as $index => $report)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>Start Date: {{ \Carbon\Carbon::parse($report->start_date)->format('d M
                                                Y') }} <br> End Date: {{
                                                \Carbon\Carbon::parse($report->end_date)->format('d M Y') }}</td>
                                            <td>{{ $report->branch->branch_category ?? '-' }}</td>
                                            <td>{{ $report->branch->cro_name ?? '-' }}</td>
                                            <td>
                                                @if ($report->attachment)
                                                <div style="position: absolute; display: flex; ">
                                                    <a href="{{ asset($report->attachment) }}" target="_blank">
                                                        <img src="{{ asset($report->attachment) }}" alt="Attachment"
                                                            style="border: 1px solid #ccc; border-radius: 4px;"
                                                            width="40" height="40">
                                                    </a>
                                                    <a href="{{ route('latestlicenseattachment', $report->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete this image?')"
                                                        style="position: relative; right:13px; background: red; color: white;
                                            font-weight: bold; border-radius: 50%; width: 20px; height: 20px;
                                            text-align: center; line-height: 18px; font-size: 14px; text-decoration: none;">
                                                        ×
                                                    </a>
                                                </div>
                                                @else N/A @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('report.delete',$report->id) }}"
                                                    class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>


                            </div>
                        </div> --}}

                        {{-- <div class="tab-pane fade" id="pills-Quotation" role="tabpanel"
                            aria-labelledby="pills-Quotation-tab">
                            <div class="container-fluid">
                                <h3 class="text-center text-light bg-dark">
                                    Quotation Register Report - {{ \Carbon\Carbon::now()->format('d F Y') }}
                                </h3>


                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Select Date</th>
                                            <th>{{ $admins->branch_category }} {{ $admins->cro_name }}</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <input type="date" id="quotationstartDate" class="form-control"
                                                        placeholder="Start Date">
                                                    <input type="date" id="quotationendDate" class="form-control"
                                                        placeholder="End Date">
                                                </div>

                                            </td>
                                            <td>
                                                <input type="file" id="quotationFile" class="form-control">
                                            </td>
                                            <td class="text-end">
                                                <input type="hidden" id="quotationBranchId" value="{{ $admins->id }}">
                                                <input type="hidden" id="quotationReportName"
                                                    value="quotation_register_report">
                                                <button type="button" class="btn btn-success"
                                                    id="uploadQuotationButton">Upload Quotation</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered" id="quotationReportTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Cro Name</th>
                                            <th>Attachment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quotationReports as $index => $report)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>Start Date: {{ \Carbon\Carbon::parse($report->start_date)->format('d M
                                                Y') }} <br> End Date: {{
                                                \Carbon\Carbon::parse($report->end_date)->format('d M Y') }}</td>
                                            <td>{{ $report->branch?->cro_name }}</td>
                                            <td>
                                                @if ($report->attachment)
                                                <a href="{{ asset($report->attachment) }}" target="_blank">
                                                    <img src="{{ asset($report->attachment) }}" width="40" height="40"
                                                        alt="file">
                                                </a> @else N/A @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('report.delete',$report->id) }}"
                                                    class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <script>
                                    document.getElementById('uploadQuotationButton').addEventListener('click', function () {
                                        const fileInput = document.getElementById('quotationFile');
                                        const qutestartDateInput = document.getElementById('quotationstartDate');
                                        const quteendDateInput = document.getElementById('quotationendDate');
                                        const branchId = document.getElementById('quotationBranchId').value;
                                        const reportName = document.getElementById('quotationReportName').value;

                                        const file = fileInput.files[0];
                                        const qstartDate = qutestartDateInput.value;
                                        const qendDate = quteendDateInput.value;

                                        if (!file || !qstartDate || !qendDate) {
                                            alert("Please select start date, end date and a file.");
                                            return;
                                        }

                                        const formData = new FormData();
                                        formData.append('branch_id', branchId);
                                        formData.append('start_date', qstartDate);
                                        formData.append('end_date', qendDate);
                                        formData.append('report_name', reportName);
                                        formData.append('attachment', file);

                                        fetch("{{ route('sales.register.report') }}", {
                                            method: 'POST',
                                            headers: {
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            },
                                            body: formData
                                        })
                                            .then(response => response.json())
                                            .then(data => {
                                                alert(data.message || 'Quotation uploaded!');
                                                fileInput.value = '';
                                                qutestartDateInput.value = '';
                                                quteendDateInput.value = '';
                                                location.reload(); // Or update the table dynamically
                                            })
                                            .catch(error => {
                                                console.error(error);
                                                alert('Failed to upload quotation.');
                                            });
                                    });

                                </script>

                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-Feedback" role="tabpanel"
                            aria-labelledby="pills-Feedback-tab">
                            <div class="container-fluid">
                                <h3 class="text-center text-light bg-dark">Feedback Register Report -
                                    {{ \Carbon\Carbon::now()->format('d F Y') }}</h3>

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Select Date</th>
                                            <th>{{ $admins->branch_category }} {{ $admins->cro_name }}</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <input type="date" id="feedbackstartDate" class="form-control"
                                                        placeholder="Start Date">
                                                    <input type="date" id="feedbackendDate" class="form-control"
                                                        placeholder="End Date">
                                                </div>

                                            </td>
                                            <td>
                                                <input type="file" id="feedbackFile" class="form-control">
                                            </td>
                                            <td class="text-end">
                                                <input type="hidden" id="feedbackBranchId" value="{{ $admins->id }}">
                                                <input type="hidden" id="feedbackReportName"
                                                    value="feedback_register_report">
                                                <button type="button" class="btn btn-success"
                                                    id="uploadFeedbackButton">Upload Feedback</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="table table-bordered" id="feedbackReportTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>CRO Name</th>
                                            <th>Attachment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feedbackReports as $index => $report)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>Start Date: {{ \Carbon\Carbon::parse($report->start_date)->format('d M
                                                Y') }} <br> End Date: {{
                                                \Carbon\Carbon::parse($report->end_date)->format('d M Y') }}</td>
                                            <td>{{ $report->branch?->cro_name }}</td>
                                            <td>
                                                @if ($report->attachment)
                                                <a href="{{ asset($report->attachment) }}" target="_blank">
                                                    <img src="{{ asset($report->attachment) }}" width="40" height="40"
                                                        alt="file">
                                                </a> @else N/A @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('report.delete',$report->id) }}"
                                                    class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <script>
                                document.getElementById('uploadFeedbackButton').addEventListener('click', function () {
                                    const fileInput = document.getElementById('feedbackFile');
                                    const feedstartDateInput = document.getElementById('feedbackstartDate');
                                    const feedendDateInput = document.getElementById('feedbackendDate');
                                    const branchId = document.getElementById('feedbackBranchId').value;
                                    const reportName = document.getElementById('feedbackReportName').value;


                                    const file = fileInput.files[0];
                                    const fstartDate = feedstartDateInput.value;
                                    const fendDate = feedendDateInput.value;

                                    if (!file || !fstartDate || !fendDate) {
                                        alert("Please select start date, end date and a file.");
                                        return;
                                    }
                                    const formData = new FormData();
                                    formData.append('branch_id', branchId);
                                    formData.append('start_date', fstartDate);
                                    formData.append('end_date', fendDate);
                                    formData.append('report_name', reportName);
                                    formData.append('attachment', file);

                                    fetch("{{ route('sales.register.report') }}", {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: formData
                                    })
                                        .then(response => response.json())
                                        .then(data => {
                                            alert(data.message || 'Quotation uploaded!');
                                            fileInput.value = '';
                                            feedstartDateInput.value = '';
                                            feedendDateInput.value = '';
                                            location.reload(); // Or update the table dynamically
                                        })
                                        .catch(error => {
                                            console.error(error);
                                            alert('Failed to upload quotation.');
                                        });
                                });
                            </script>

                        </div>
                        --}}
                        <div class="tab-pane fade" id="pills-dailysalesreport" role="tabpanel"
                            aria-labelledby="pills-dailysalesreport-tab">
                            <div class=" mt-3">
                                <div>
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Profile</th>
                                                <th>Quotations</th>
                                                <th>Visiting Cards</th>
                                                <th>Guards</th>
                                                <th>Contractual Value</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="date" class="form-control" id="date">
                                                    <input type="hidden" class="form-control" value="{{ $admins->id }}"
                                                        id="sales_branch_id">
                                                </td>
                                                <td><input type="text" class="form-control" id="profile"></td>
                                                <td><input type="text" class="form-control" id="quotations"></td>
                                                <td><input type="text" class="form-control" id="visiting_cards"></td>
                                                <td><input type="text" class="form-control" id="guards"></td>
                                                <td><input type="text" class="form-control" id="contractual_value"></td>
                                                <td><button class="btn btn-primary" id="saveBtn">Save</button></td>
                                            </tr>
                                            @foreach ($contractDetail as $item)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }}</td>
                                                    <td>{{ $item->profile }}</td>
                                                    <td>{{ $item->quotations }}</td>
                                                    <td>{{ $item->visiting_cards }}</td>
                                                    <td>{{ $item->guards }}</td>
                                                    <td>{{ $item->contractual_value }}</td>
                                                    <td><span class="badge bg-success">Saved</span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <script>
                                        $('#saveBtn').on('click', function () {
                                            let data = {
                                                date: $('#date').val(),
                                                branch_id: $('#sales_branch_id').val(),
                                                profile: $('#profile').val(),
                                                quotations: $('#quotations').val(),
                                                visiting_cards: $('#visiting_cards').val(),
                                                guards: $('#guards').val(),
                                                contractual_value: $('#contractual_value').val(),
                                                _token: '{{ csrf_token() }}' // Laravel CSRF token
                                            };

                                            $.ajax({
                                                url: "{{ route('weekly.sales.record') }}", // Replace with your actual route
                                                method: "POST",
                                                data: data,
                                                success: function (response) {
                                                    alert('Data saved successfully!');
                                                    console.log(response);
                                                },
                                                error: function (xhr) {
                                                    alert('Something went wrong!');
                                                    console.log(xhr.responseText);
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>

                        <!-- ////////////////////////////////////////// -->
                        {{--Region wise Feedback log --}}
                        <div class="tab-pane fade" id="pills-southregionalesreport" role="tabpanel">
                            <div class="container mt-4">

                                {{-- HEADER --}}
                                <div class="d-flex justify-content-between mb-3">
                                    <h4>DAILY SALES & FEEDBACK LOG REPORT</h4>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#createModal">
                                        + Add Report
                                    </button>
                                </div>

                                {{-- TABLE --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Region</th>
                                            <th>Branch Name</th>
                                            <th>Branch ID</th>
                                            <th>Employee Name</th>
                                            <th>Designation</th>
                                            <th>No Of Visit</th>
                                            <th>Date</th>
                                            <th>Day</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($reports as $key => $report)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $report->region->region_name ?? 'N/A' }}</td>
                                                <td>{{ $report->admin->branch_office_name ?? 'N/A' }}</td>
                                                <td>{{ $report->branch_id ?? 'N/A' }}</td>
                                                <td>{{ $report->employee_name }}</td>
                                                <td>{{ $report->designation }}</td>
                                                <td>{{ $report->monday }}</td>           
                                                <td>{{ $report->created_at }}</td>
                                                <td>{{ \Carbon\Carbon::parse($report->created_at)->format('l') }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-info editBtn"
                                                        data-id="{{ $report->id }}">
                                                        Edit
                                                    </button>

                                                    <button type="button" class="btn btn-sm btn-danger deleteBtn"
                                                        data-id="{{ $report->id }}">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="12" class="text-center">No reports found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                     
<script>
$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Limit updates to this specific table (avoid affecting other tables on the page).
    const $dailyFeedbackTbody = $('#pills-southregionalesreport table tbody');

    const formatDayFromDate = function (dateStr) {
        if (!dateStr) return 'N/A';

        // Backend returns "Y-m-d" (or sometimes ISO). Convert safely.
        let dateOnly = dateStr.toString().split('T')[0];
        dateOnly = dateOnly.split(' ')[0];

        // Use local midnight to avoid timezone shifting the weekday.
        const d = new Date(dateOnly + 'T00:00:00');
        if (isNaN(d.getTime())) return 'N/A';

        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        return days[d.getDay()] ?? 'N/A';
    };

    const removeEmptyRow = function () {
        $dailyFeedbackTbody.find('tr').filter(function () {
            return $(this).text().trim().includes('No reports found');
        }).remove();
    };

    const resequenceRows = function () {
        $dailyFeedbackTbody.find('tr').each(function (i) {
            $(this).find('td:first').text(i + 1);
        });
    };

    // CREATE REPORT
    $('#createReportBtn').click(function (e) {
        e.preventDefault();

        let formData = {
            region_id: $('#create_region_id').val(),
            admin_id: $('#create_admin_id').val(),
            employee_name: $('#create_employee_name').val(),
            designation: $('#create_designation').val(),
            type: $('#create_type').val(),
            created_at: $('#create_created_at').val(),
            monday: $('#create_monday').val(),
        };

        $.ajax({
            url: "{{ route('regionReport.store') }}",
            type: 'POST',
            data: formData,

            success: function (response) {
                toastr.success('Report created successfully!');
                $('#createModal').modal('hide');

                removeEmptyRow();

                let newRow = `
                    <tr>
                        <td>${$dailyFeedbackTbody.children('tr').length + 1}</td>
                        <td>${response.region_name ?? 'N/A'}</td>
                        <td>${response.branch_name ?? 'N/A'}</td>
                        <td>${response.branch_id ?? 'N/A'}</td>
                        <td>${response.employee_name ?? ''}</td>
                        <td>${response.designation ?? ''}</td>
                        <td>${response.monday}</td>
                        <td>${response.created_at}</td>
                        <td>${formatDayFromDate(response.created_at)}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info editBtn" data-id="${response.id}">Edit</button>
                            <button type="button" class="btn btn-sm btn-danger deleteBtn" data-id="${response.id}">Delete</button>
                        </td>
                    </tr>
                `;

                $dailyFeedbackTbody.prepend(newRow);
                resequenceRows();
                $('#createForm')[0].reset();
            },

            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || 'Create failed');
            }
        });
    });

    // EDIT BUTTON
    $(document).on('click', '.editBtn', function () {
        let id = $(this).data('id');

        $.ajax({
            url: "/region-reports/edit/" + id,
            type: "GET",

            success: function (data) {

                $('#e_region_id').val(data.region_id);
                $('#e_admin_id').val(data.admin_id);
                $('#e_employee_name').val(data.employee_name);
                $('#e_designation').val(data.designation);
                $('#e_monday').val(data.monday);
                let date = data.created_at.split('T')[0];
                $('#e_created_at').val(date);

                $('#editForm').attr('action', "/region-reports/update/" + id);
                $('#editModal').modal('show');
            },

            error: function () {
                toastr.error('Error loading data');
            }
        });
    });

    // UPDATE REPORT
    $('#editForm').submit(function (e) {
        e.preventDefault();

        let actionUrl = $(this).attr('action');
        let formData = $(this).serialize();

        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: formData,

            success: function (response) {
                toastr.success('Updated successfully!');
                $('#editModal').modal('hide');

                let row = $(`button[data-id="${response.id}"]`).closest('tr');

                row.find('td:eq(1)').text(response.region_name ?? 'N/A');
                row.find('td:eq(2)').text(response.branch_name ?? 'N/A');
                row.find('td:eq(3)').text(response.branch_id ?? 'N/A');
                row.find('td:eq(4)').text(response.employee_name);
                row.find('td:eq(5)').text(response.designation);
                row.find('td:eq(6)').text(response.monday);
                row.find('td:eq(7)').text(response.created_at);
                row.find('td:eq(8)').text(formatDayFromDate(response.created_at)); // 👈 DAY UPDATE
            },

            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || 'Update failed');
            }
        });
    });

    // DELETE REPORT
    $(document).on('click', '.deleteBtn', function () {

        if (!confirm('Are you sure you want to delete this report?')) return;

        let btn = $(this);
        let id = btn.data('id');

        $.ajax({
            url: "/region-reports/delete/" + id,
            type: 'DELETE',

            success: function () {
                toastr.success('Deleted successfully!');

                btn.closest('tr').fadeOut(300, function () {
                    $(this).remove();
                    resequenceRows();
                });
            },

            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || 'Delete failed');
            }
        });
    });

});
</script>
                            </div>

                        </div>
                        <!-- WEEKLY SALES VISIT PLAN -->
                        <div class="tab-pane fade" id="pills-southvisitsalesreport" role="tabpanel">
                            <div class="container mt-4">

                                {{-- HEADER --}}
                                <div class="d-flex justify-content-between mb-3">
                                    <h4>WEEKLY SALES VISIT PLAN</h4>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#createModalRegionReport">
                                        + Add Report
                                    </button>
                                </div>

                                {{-- TABLE --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Region</th>
                                            <th>Branch Name</th>
                                            <th>Branch ID</th>
                                            <th>Employee Name</th>
                                            <th>Designation</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($visitReports as $key => $visitReport)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $visitReport->region->region_name ?? 'N/A' }}</td>
                                                <td>{{ $visitReport->admin->branch_office_name ?? 'N/A' }}</td>
                                                <td>{{ $visitReport->branch_id ?? 'N/A' }}</td>
                                                <td>{{ $visitReport->employee_name }}</td>
                                                <td>{{ $visitReport->designation }}</td>
                                                <td>{{ $visitReport->created_at }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-info regionReportEditBtn"
                                                        data-id="{{ $visitReport->id }}">
                                                        Edit
                                                    </button>

                                                    <button type="button"
                                                        class="btn btn-sm btn-danger regionReportDeleteBtn"
                                                        data-id="{{ $visitReport->id }}">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="12" class="text-center">No reports found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                               <script>
$(document).ready(function () {

    // =========================
    // CSRF SETUP
    // =========================
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Scope DOM operations to this specific table/tab
    const $visitPlanTbody = $('#pills-southvisitsalesreport table tbody');

    const removeEmptyRow = function () {
        $visitPlanTbody.find('tr').filter(function () {
            return $(this).text().trim().includes('No reports found');
        }).remove();
    };

    const resequenceRows = function () {
        $visitPlanTbody.find('tr').each(function (i) {
            // first td is "#"
            $(this).find('td:first').text(i + 1);
        });
    };

    // =========================
    // EDIT (LOAD DATA)
    // =========================
    $(document).on('click', '.regionReportEditBtn', function () {

        let id = $(this).data('id');

        $.ajax({
            url: "/region-reports/edit/" + id,
            type: "GET",

            success: function (data) {

                $('#e_region_id_report').val(data.region_id);
                $('#e_admin_id_report').val(data.admin_id);
                $('#e_employee_name_report').val(data.employee_name);
                $('#e_designation_report').val(data.designation);

                let date = data.created_at.split('T')[0];
                $('#e_created_at_report').val(date);

                $('#editFormRegionReport').attr('action', "/region-reports/update/" + id);

                $('#editModalRegionReport').modal('show');
            },

            error: function () {
                toastr.error('Error loading data');
            }
        });
    });

    // =========================
    // CREATE REPORT (NO RELOAD)
    // =========================
    $('#createReportBtnRegionReport').click(function (e) {
        e.preventDefault();

        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('region_id', $('#create_region_id_report').val());
        formData.append('admin_id', $('#create_admin_id_report').val());
        formData.append('employee_name', $('#create_employee_name_report').val());
        formData.append('designation', $('#create_designation_report').val());
        formData.append('type', $('#create_type_region_report').val());
        formData.append('created_at', $('#create_created_at_report').val());

        $.ajax({
            url: "{{ route('regionReport.store') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,

            success: function (response) {

                toastr.success('Report created successfully!');
                $('#createModalRegionReport').modal('hide');

                // ADD NEW ROW WITHOUT RELOAD
                let newRow = `
                    <tr>
                        <td>${$visitPlanTbody.children('tr').length + 1}</td>
                        <td>${response.region_name ?? 'N/A'}</td>
                        <td>${response.branch_name ?? 'N/A'}</td>
                        <td>${response.branch_id ?? 'N/A'}</td>
                        <td>${response.employee_name ?? ''}</td>
                        <td>${response.designation ?? ''}</td>
                        <td>${response.created_at ?? ''}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info regionReportEditBtn" data-id="${response.id}">
                                Edit
                            </button>

                            <button type="button" class="btn btn-sm btn-danger regionReportDeleteBtn" data-id="${response.id}">
                                Delete
                            </button>
                        </td>
                    </tr>
                `;

                removeEmptyRow();
                $visitPlanTbody.prepend(newRow);
                resequenceRows();

                // reset form
                $('#createReportFormRegion')[0]?.reset();
            },

            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || 'Failed to create report');
            }
        });
    });
    // UPDATE REPORT
    $('#editFormRegionReport').submit(function (e) {
        e.preventDefault();

        let url = $(this).attr('action');
        let formData = $(this).serialize();

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,

            success: function (response) {

                toastr.success('Report updated successfully!');
                $('#editModalRegionReport').modal('hide');

                // UPDATE EXISTING ROW
                let row = $(`button[data-id="${response.id}"]`).closest('tr');

                row.find('td:eq(1)').text(response.region_name ?? 'N/A');
                row.find('td:eq(2)').text(response.branch_name ?? 'N/A');
                row.find('td:eq(3)').text(response.branch_id ?? 'N/A');
                row.find('td:eq(4)').text(response.employee_name);
                row.find('td:eq(5)').text(response.designation);
                row.find('td:eq(6)').text(response.created_at ?? '');
            },

            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || 'Update failed');
            }
        });
    });

    // DELETE REPORT 

    $(document).on('click', '.regionReportDeleteBtn', function () {

        if (!confirm('Are you sure you want to delete this report?')) return;

        let btn = $(this);
        let id = btn.data('id');

        $.ajax({
            url: "/region-reports/delete/" + id,
            type: 'DELETE',

            success: function () {

                toastr.success('Report deleted successfully!');

                // REMOVE ROW ONLY
                btn.closest('tr').fadeOut(300, function () {
                    $(this).remove();
                    resequenceRows();
                });
            },

            error: function (xhr) {
                toastr.error(xhr.responseJSON?.message || 'Delete failed');
            }
        });
    });

});
</script>
                            </div>

                        </div>
                        <!-- Pipeline Reports -->
                        <div class="tab-pane fade" id="pills-regionpipelinereport" role="tabpanel"
                            aria-labelledby="pills-regionpipelinereport-tab">

                            <!-- pipeline reports -->
                            <div class="container mt-4">

                                <div class="d-flex justify-content-between mb-3">
                                    <h4>Region Wise Daily Sales Pipeline</h4>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#createPipelineModal">
                                        + Add Pipeline Report
                                    </button>
                                </div>

                                {{-- TABLE --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Branch Name</th>
                                            <th>Region Name</th>
                                            <th>Prospect Name</th>
                                            <th>Sales Perform by</th>
                                            <th>Number of Technical Proposal Sent</th>
                                            <th>Number of Quotation Shared</th>
                                            <th>Required Services</th>
                                            <th>Remarks</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($pipelines as $key => $pipeline)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $pipeline->admin->branch_office_name ?? 'N/A' }}</td>
                                                <td>{{ $pipeline->region->region_name ?? 'N/A' }}</td>
                                                <td>{{ $pipeline->prospect_name ?? 'N/A' }}</td>
                                                <td>{{ $pipeline->sales_visit }}</td>
                                                <td>{{ $pipeline->proposal_sent }}</td>
                                                <td>{{ $pipeline->quotation_sent }}</td>
                                                <td>{{ $pipeline->required_services }}</td>
                                                <td>{{ $pipeline->remarks }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-info pipelineEditBtn"
                                                        data-id="{{ $pipeline->id }}">Edit</button>
                                                    <button class="btn btn-sm btn-danger pipelineDeleteBtn"
                                                        data-id="{{ $pipeline->id }}">Delete</button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No pipelines reports found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>

                            {{-- ================= AJAX ================= --}}
                            <script>
                                $(document).ready(function () {

                                    const $tab = $('#pills-regionpipelinereport');
                                    const $tbody = () => $tab.find('table tbody');

                                    const removeEmptyRow = function () {
                                        $tbody().find('tr').filter(function () {
                                            return $(this).text().trim().includes('No pipelines reports found');
                                        }).remove();
                                    };

                                    // CREATE
                                    $('#pipelineCreateBtn').click(function () {
                                        $.ajax({
                                            url: "{{ route('pipelineReport.store') }}",
                                            type: "POST",
                                            data: {
                                                _token: "{{ csrf_token() }}",
                                                admin_id: $('#pipeline_create_admin_id').val(),
                                                region_id: $('#pipeline_create_region_id').val(),
                                                prospect_name: $('#pipeline_create_prospect_name').val(),
                                                sales_visit: $('#pipeline_create_sales_visit').val(),
                                                proposal_sent: $('#pipeline_create_proposal_sent').val(),
                                                quotation_sent: $('#pipeline_create_quotation_sent').val(),
                                                required_services: $('#pipeline_create_required_services').val(),
                                                remarks: $('#pipeline_create_remarks').val(),
                                            },
                                            success: function (response) {
                                                toastr.success(response.message ?? 'Created Successfully');
                                                $('#createPipelineModal').modal('hide');

                                                const pipeline = response.data ?? {};

                                                removeEmptyRow();

                                                let srNo = $tbody().children('tr').length + 1;

                                                const newRow = `
                                                    <tr>
                                                        <td>${srNo}</td>
                                                        <td>${pipeline.admin?.branch_office_name ?? 'N/A'}</td>
                                                        <td>${pipeline.region?.region_name ?? 'N/A'}</td>
                                                        <td>${pipeline.prospect_name ?? 'N/A'}</td>
                                                        <td>${pipeline.sales_visit ?? ''}</td>
                                                        <td>${pipeline.proposal_sent ?? ''}</td>
                                                        <td>${pipeline.quotation_sent ?? ''}</td>
                                                        <td>${pipeline.required_services ?? ''}</td>
                                                        <td>${pipeline.remarks ?? ''}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-info pipelineEditBtn"
                                                                data-id="${pipeline.id}">Edit</button>
                                                            <button type="button" class="btn btn-sm btn-danger pipelineDeleteBtn"
                                                                data-id="${pipeline.id}">Delete</button>
                                                        </td>
                                                    </tr>
                                                `;

                                                $tbody().prepend(newRow);
                                            },
                                            error: function (xhr) {
                                                toastr.error(xhr.responseJSON?.message || 'Create failed');
                                            }
                                        });
                                    });

                                    // EDIT LOAD (delegated for dynamically added rows)
                                    $(document).on('click', '.pipelineEditBtn', function () {
                                        let id = $(this).data('id');

                                        $.get("/pipeline-reports/edit/" + id, function (data) {
                                            $('#pipeline_edit_admin_id').val(data.admin_id);
                                            $('#pipeline_edit_region_id').val(data.region_id);
                                            $('#pipeline_edit_prospect_name').val(data.prospect_name);
                                            $('#pipeline_edit_sales_visit').val(data.sales_visit);
                                            $('#pipeline_edit_proposal_sent').val(data.proposal_sent);
                                            $('#pipeline_edit_quotation_sent').val(data.quotation_sent);
                                            $('#pipeline_edit_required_services').val(data.required_services);
                                            $('#pipeline_edit_remarks').val(data.remarks);

                                            $('#editPipelineForm').attr('action', "/pipeline-reports/update/" + id);
                                            $('#editPipelineModal').modal('show');
                                        });
                                    });

                                    // UPDATE
                                    $('#editPipelineForm').submit(function (e) {
                                        e.preventDefault();

                                        let action = $(this).attr('action');

                                        $.ajax({
                                            url: action,
                                            type: "POST",
                                            data: {
                                                _token: "{{ csrf_token() }}",
                                                _method: "PUT",
                                                admin_id: $('#pipeline_edit_admin_id').val(),
                                                region_id: $('#pipeline_edit_region_id').val(),
                                                prospect_name: $('#pipeline_edit_prospect_name').val(),
                                                sales_visit: $('#pipeline_edit_sales_visit').val(),
                                                proposal_sent: $('#pipeline_edit_proposal_sent').val(),
                                                quotation_sent: $('#pipeline_edit_quotation_sent').val(),
                                                required_services: $('#pipeline_edit_required_services').val(),
                                                remarks: $('#pipeline_edit_remarks').val(),
                                            },
                                            success: function (response) {
                                                toastr.success(response.message ?? 'Updated Successfully');
                                                $('#editPipelineModal').modal('hide');

                                                const pipeline = response.data ?? {};
                                                const row = $(`button.pipelineEditBtn[data-id="${pipeline.id}"]`).closest('tr');

                                                // Column indexes: 0 Sr# | 1 Branch | 2 Region | 3 Prospect | 4 Sales | 5 Proposal | 6 Quotation | 7 Required | 8 Remarks
                                                row.find('td:eq(1)').text(pipeline.admin?.branch_office_name ?? 'N/A');
                                                row.find('td:eq(2)').text(pipeline.region?.region_name ?? 'N/A');
                                                row.find('td:eq(3)').text(pipeline.prospect_name ?? 'N/A');
                                                row.find('td:eq(4)').text(pipeline.sales_visit ?? '');
                                                row.find('td:eq(5)').text(pipeline.proposal_sent ?? '');
                                                row.find('td:eq(6)').text(pipeline.quotation_sent ?? '');
                                                row.find('td:eq(7)').text(pipeline.required_services ?? '');
                                                row.find('td:eq(8)').text(pipeline.remarks ?? '');
                                            },
                                            error: function (xhr) {
                                                toastr.error(xhr.responseJSON?.message || 'Update failed');
                                            }
                                        });
                                    });

                                    // DELETE (delegated for dynamically added rows)
                                    $(document).on('click', '.pipelineDeleteBtn', function () {
                                        if (!confirm('Delete this record?')) return;

                                        let id = $(this).data('id');
                                        let $btn = $(this);

                                        $.ajax({
                                            url: "/pipeline-reports/delete/" + id,
                                            type: "POST",
                                            data: {
                                                _token: "{{ csrf_token() }}",
                                                _method: "DELETE"
                                            },
                                            success: function (response) {
                                                toastr.success(response.message ?? 'Deleted Successfully');
                                                $btn.closest('tr').fadeOut(300, function () {
                                                    $(this).remove();
                                                });
                                            },
                                            error: function (xhr) {
                                                toastr.error(xhr.responseJSON?.message || 'Delete failed');
                                            }
                                        });
                                    });

                                });
                            </script>

                        </div>
                        <!-- ///////////////////////////////////////////// -->
                        <div class="tab-pane fade" id="pills-regionvisitpipelinereport" role="tabpanel"
                            aria-labelledby="pills-regionvisitpipelinereport-tab">

                            <!-- pipeline reports -->
                            <div class="container mt-4">

                                <div class="d-flex justify-content-between mb-3">
                                    <h4>Region wise Daily Finalize Sales report</h4>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#createVisitPipelineModal">
                                        + Add Pipeline Report
                                    </button>
                                </div>

                                {{-- TABLE --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Customer Name</th>
                                            <th>Branch Name</th>
                                            <th>Region Name</th>
                                            <th>Sales Perform by</th>
                                            <th>Number of Technical Proposal Sent</th>
                                            <th>Number of Quotation Shared</th>
                                            <th>Number Of Guard Deployed</th>
                                            <th>Contractual Value</th>
                                            <th>Total Margin</th>
                                            <th>Date of Deployment</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($visitPipelines as $key => $visitPipeline)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $visitPipeline->customer_name ?? 'N/A' }}</td>
                                                <td>{{ $visitPipeline->branch_office_name ?? 'N/A' }}</td>
                                                <td>{{ $visitPipeline->region->region_name ?? 'N/A' }}</td>
                                                <td>{{ $visitPipeline->sales_visit }}</td>
                                                <td>{{ $visitPipeline->proposal_sent }}</td>
                                                <td>{{ $visitPipeline->quotation_sent }}</td>
                                                <td>{{ $visitPipeline->guard_deployed_by_ho }}</td>
                                                <td>{{ $visitPipeline->contractual_value }}</td>
                                                <td>{{ $visitPipeline->total_margin }}</td>
                                                <td>{{ $visitPipeline->created_at }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-info visitPipelineEditBtn"
                                                        data-id="{{ $visitPipeline->id }}">Edit</button>
                                                    <button class="btn btn-sm btn-danger visitPipelineDeleteBtn"
                                                        data-id="{{ $visitPipeline->id }}">Delete</button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="11" class="text-center">No pipelines reports found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>

                            <script>
                                $(document).ready(function () {
                                    const $tab = $('#pills-regionvisitpipelinereport');
                                    const $tbody = () => $tab.find('table tbody');

                                    const formatDate = function (value) {
                                        if (!value) return '';
                                        // Laravel/Eloquent may send ISO strings like "2026-04-29T00:00:00.000000Z"
                                        return value.toString().split('T')[0];
                                    };

                                    const removeEmptyRow = function () {
                                        $tbody().find('tr').filter(function () {
                                            return $(this).text().trim().includes('No pipelines reports found');
                                        }).remove();
                                    };

                                    // Edit functionality
                                    $(document).on('click', '.visitPipelineEditBtn', function () {
                                        let id = $(this).data('id');
                                        $.ajax({
                                            url: "/visit-reports/edit/" + id,
                                            type: "GET",
                                            success: function (data) {
                                                $('#vp_e_region_id').val(data.region_id);
                                                $('#vp_e_admin_id').val(data.admin_id);
                                                $('#vp_e_customer_name').val(data.customer_name);
                                                $('#vp_e_sales_visit').val(data.sales_visit);
                                                $('#vp_e_proposal_sent').val(data.proposal_sent);
                                                $('#vp_e_quotation_sent').val(data.quotation_sent);
                                                $('#vp_e_guard_deployed').val(data.guard_deployed_by_ho);
                                                $('#vp_e_contractual_value').val(data.contractual_value);
                                                $('#vp_e_total_margin').val(data.total_margin);
                                                    let date = data.created_at.split('T')[0];
                                                $('#vp_e_created_at').val(date);
                                                $('#editVisitPipelineForm').attr('action', "/visit-reports/update/" + id);
                                                $('#editVisitPipelineModal').modal('show');
                                            },
                                            error: function () {
                                                alert('Error loading data');
                                            }
                                        });
                                    });

                                    // Create Report AJAX
                                    $('#vp_createReportBtn').click(function (e) {
                                        e.preventDefault();
                                        let formData = new FormData();
                                        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                                        formData.append('region_id', $('#vp_create_region_id').val());
                                        formData.append('admin_id', $('#vp_create_admin_id').val());
                                        formData.append('customer_name', $('#vp_create_customer_name').val());
                                        formData.append('sales_visit', $('#vp_create_sales_visit').val());
                                        formData.append('proposal_sent', $('#vp_create_proposal_sent').val());
                                        formData.append('quotation_sent', $('#vp_create_quotation_sent').val());
                                        formData.append('guard_deployed_by_ho', $('#vp_create_guard_deployed').val());
                                        formData.append('contractual_value', $('#vp_create_contractual_value').val());
                                        formData.append('total_margin', $('#vp_create_total_margin').val());
                                        formData.append('created_at', $('#vp_create_created_at').val());
                                        $.ajax({
                                            url: "{{ route('visitReport.store') }}",
                                            type: 'POST',
                                            data: formData,
                                            processData: false,
                                            contentType: false,
                                            success: function (response) {
                                                toastr.success(response.message ?? 'Report created successfully!');
                                                $('#createVisitPipelineModal').modal('hide');

                                                const report = response.data ?? {};
                                                removeEmptyRow();

                                                let srNo = $tbody().children('tr').length + 1;

                                                const newRow = `
                                                    <tr>
                                                        <td>${srNo}</td>
                                                        <td>${report.customer_name ?? 'N/A'}</td>
                                                        <td>${report.branch_office_name ?? 'N/A'}</td>
                                                        <td>${report.region?.region_name ?? 'N/A'}</td>
                                                        <td>${report.sales_visit ?? ''}</td>
                                                        <td>${report.proposal_sent ?? ''}</td>
                                                        <td>${report.quotation_sent ?? ''}</td>
                                                        <td>${report.guard_deployed_by_ho ?? ''}</td>
                                                        <td>${report.contractual_value ?? ''}</td>
                                                        <td>${report.total_margin ?? ''}</td>
                                                        <td>${formatDate(report.created_at)}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-info visitPipelineEditBtn"
                                                                data-id="${report.id}">Edit</button>
                                                            <button type="button" class="btn btn-sm btn-danger visitPipelineDeleteBtn"
                                                                data-id="${report.id}">Delete</button>
                                                        </td>
                                                    </tr>
                                                `;

                                                $tbody().prepend(newRow);
                                            },
                                            error: function (xhr) {
                                                toastr.error('Error: ' + (xhr.responseJSON?.message || 'Failed to create report'));
                                            }
                                        });
                                    });

                                    // UPDATE (prevent full page refresh)
                                    $('#editVisitPipelineForm').submit(function (e) {
                                        e.preventDefault();

                                        let url = $(this).attr('action');
                                        let formData = $(this).serialize();

                                        $.ajax({
                                            url: url,
                                            type: 'POST',
                                            data: formData,
                                            success: function (response) {
                                                toastr.success(response.message ?? 'Report updated successfully!');
                                                $('#editVisitPipelineModal').modal('hide');

                                                const report = response.data ?? {};
                                                const row = $(`button.visitPipelineEditBtn[data-id="${report.id}"]`).closest('tr');

                                                // Column indexes:
                                                // 0 Sr# | 1 Customer | 2 Branch | 3 Region | 4 Sales | 5 Proposal | 6 Quotation | 7 Guard |
                                                // 8 Contractual | 9 Total Margin | 10 Date | 11 Actions
                                                row.find('td:eq(1)').text(report.customer_name ?? 'N/A');
                                                row.find('td:eq(2)').text(report.branch_office_name ?? 'N/A');
                                                row.find('td:eq(3)').text(report.region?.region_name ?? 'N/A');
                                                row.find('td:eq(4)').text(report.sales_visit ?? '');
                                                row.find('td:eq(5)').text(report.proposal_sent ?? '');
                                                row.find('td:eq(6)').text(report.quotation_sent ?? '');
                                                row.find('td:eq(7)').text(report.guard_deployed_by_ho ?? '');
                                                row.find('td:eq(8)').text(report.contractual_value ?? '');
                                                row.find('td:eq(9)').text(report.total_margin ?? '');
                                                row.find('td:eq(10)').text(formatDate(report.created_at));
                                            },
                                            error: function (xhr) {
                                                toastr.error(xhr.responseJSON?.message || 'Update failed');
                                            }
                                        });
                                    });

                                    // Delete Report AJAX
                                    $(document).on('click', '.visitPipelineDeleteBtn', function () {
                                        if (confirm('Are you sure you want to delete this report?')) {
                                            let id = $(this).data('id');
                                            let $btn = $(this);

                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                            });
                                            $.ajax({
                                                url: "/visit-reports/delete/" + id,
                                                type: 'DELETE',
                                                success: function (response) {
                                                    toastr.success(response.message ?? 'Report deleted successfully!');
                                                    $btn.closest('tr').fadeOut(300, function () {
                                                        $(this).remove();
                                                    });
                                                },
                                                error: function (xhr, status, error) {
                                                    toastr.error('Delete failed: ' + (xhr.responseJSON?.message || error));
                                                }
                                            });
                                        }
                                    });
                                });
                            </script>

                        </div>

                        <!-- ///////////////////////////////////////////// -->
                    </div>
                </div>
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="cro_register_reports" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Task Record
                                Dairy</button>
                        </li>
                        <!--<li class="nav-item" role="presentation">-->
                        <!--  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>-->
                        <!--</li>-->
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">Notice Log
                                Sheet</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Weapon-Record-tab" data-bs-toggle="tab"
                                data-bs-target="#Weapon-Record" type="button" role="tab" aria-controls="Weapon-Record"
                                aria-selected="false">Weakly Weapon Record</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Uniform-Record-tab" data-bs-toggle="tab"
                                data-bs-target="#Uniform-Record" type="button" role="tab" aria-controls="Uniform-Record"
                                aria-selected="false">Weakly Uniform Record</button>
                        </li>


                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="container-fluid mt-4">
                                <div>
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="{{ asset('https://piffersoftware.com/images/piffer-logo1.png') }}"
                                                alt="PSS Logo" class="img-fluid position-end" style="max-height: 80px;">
                                        </div>
                                        <div class="col-md-10">
                                            <h1 class="mb-0" style="font-family: Stencil; font-size: 3rem;">PIFFERS
                                                SECURITY SERVICES (PVT.) LTD</h1>
                                        </div>
                                        <h2 class="text-center"
                                            style="font-family: Stencil; font-size: 1.98rem; text-decoration: underline;">
                                            TASK REPORT DAIRY - {{ \Carbon\Carbon::now()->format('d F Y') }}</h2>
                                        <h4 style="letter-spacing: 1px;">Please enter if any task assigned by GM/DGM in
                                            this register and also mark in calender.</h4>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6 text-start">Page No. ______________</div>
                                        <div class="col-md-6 text-end">Date: ______________</div>
                                        <span class="text-end" style="letter-spacing: 2px;">Mon Tue Wed Thu Fri
                                            Sat</span>
                                    </div>
                                    <div id="taskRecordSection" class="mt-3">
                                        @csrf
                                        {{-- CSRF meta already in layouts/header.blade.php --}}
                                        <table class="table table-bordered" style="border: 4px solid black;">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">Sr.No</th>
                                                    <th class="text-center" rowspan="2">Description of Task</th>
                                                    <th class="text-center" rowspan="2">Dependence on any other <br>
                                                        Department / Organization</th>
                                                    <th class="text-center" rowspan="2">Task Assigned by</th>
                                                    <th class="text-center" colspan="2">Completion Date</th>
                                                    <th class="text-center" rowspan="2">Signature</th>
                                                    <th class="text-center" rowspan="2">Action</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">Review Date</th>
                                                    <th class="text-center">Completion Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="2">
                                                        <input type="number" name="sr_no" id="srNo" class="form-control"
                                                            placeholder="Auto" readonly>
                                                    </td>
                                                    <td rowspan="2">
                                                        <textarea name="description_task" id="descriptionTask"
                                                            class="form-control" rows="2"
                                                            placeholder="Enter task description"></textarea>
                                                    </td>
                                                    <td rowspan="2">
                                                        <textarea name="dependence_department_organization"
                                                            id="dependenceDepartment" class="form-control" rows="2"
                                                            placeholder="Enter department/organization"></textarea>
                                                    </td>
                                                    <td rowspan="2">
                                                        <input type="text" name="task_assigned_by" id="taskAssignedBy"
                                                            class="form-control" placeholder="Enter assigned by">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="date" name="review_date" id="reviewDate"
                                                            class="form-control">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="date" name="completion_date" id="completionDate"
                                                            class="form-control">
                                                    </td>
                                                    <td rowspan="2">
                                                        <input type="text" name="signature" id="signature"
                                                            class="form-control" placeholder="Enter signature">
                                                    </td>
                                                    <td rowspan="2" class="text-center">
                                                        <button type="button" class="btn btn-success"
                                                            id="saveTaskBtn">Save Task</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>Review Date</small></td>
                                                    <td class="text-center"><small>Completion Date</small></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        <h5>Task Diary Records</h5>

                                        @if($taskdeiry->count() > 0)
                                            <table class="table table-bordered table-striped">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Sr.No</th>
                                                        <th>Description</th>
                                                        <th>Department</th>
                                                        <th>Assigned By</th>
                                                        <th>Review Date</th>
                                                        <th>Completion Date</th>
                                                        <th>Signature</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($taskdeiry as $index => $task)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $task->description_task }}</td>
                                                            <td>{{ $task->dependence_department_organization }}</td>
                                                            <td>{{ $task->task_assigned_by }}</td>
                                                            <td>{{ $task->review_date ? \Carbon\Carbon::parse($task->review_date)->format('d-m-Y') : '--' }}
                                                            </td>
                                                            <td>{{ $task->completion_date ? \Carbon\Carbon::parse($task->completion_date)->format('d-m-Y') : '--' }}
                                                            </td>
                                                            <td>
                                                                @if($task->signature)
                                                                    {{ $task->signature }}
                                                                @else
                                                                    --
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="alert alert-warning">No task records found.</div>
                                        @endif
                                    </div>
                                    <div id="responseMessage" class="mt-3"></div>
                                </div>
                            </div>
                            <script>
                                document.getElementById('saveTaskBtn').addEventListener('click', function () {

                                    let section = document.getElementById('taskRecordSection');
                                    let inputs = section.querySelectorAll('input, textarea');
                                    let formData = new FormData();

                                    const requiredFields = [
                                        'description_task',
                                        'dependence_department_organization',
                                        'task_assigned_by',
                                        'review_date',
                                        'completion_date',
                                        'signature'
                                    ];

                                    let isValid = true;

                                    // 🔴 Validation with Toastr
                                    requiredFields.forEach(fieldName => {
                                        const field = section.querySelector(`[name="${fieldName}"]`);
                                        if (!field.value.trim()) {
                                            isValid = false;

                                            toastr.error(`Please fill ${field.placeholder || fieldName}`, '', {
                                                positionClass: "toast-top-right",
                                                progressBar: true,
                                                timeOut: 3000
                                            });
                                        }
                                    });

                                    if (!isValid) return;

                                    // Append data
                                    inputs.forEach(input => {
                                        formData.append(input.name, input.value);
                                    });

                                    formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

                                    const saveButton = document.getElementById('saveTaskBtn');
                                    const originalText = saveButton.textContent;

                                    saveButton.textContent = 'Saving...';
                                    saveButton.disabled = true;

                                    // 🔵 Loading Toast
                                    toastr.info('Saving task...', '', {
                                        positionClass: "toast-top-right",
                                        progressBar: true,
                                        timeOut: 2000
                                    });

                                    fetch("{{ route('admin.task_record_dairy') }}", {
                                        method: 'POST',
                                        body: formData
                                    })
                                        .then(res => {
                                            if (!res.ok) {
                                                throw new Error(`HTTP ${res.status}`);
                                            }
                                            return res.json();
                                        })
                                        .then(data => {

                                            if (data.success) {

                                                // ✅ Success Toast
                                                toastr.success(data.message, '', {
                                                    positionClass: "toast-top-right",
                                                    progressBar: true,
                                                    timeOut: 3000
                                                });

                                                // ✅ Add new row dynamically
                                                const tbody = document.getElementById('taskRecordsTableBody');
                                                if (tbody) {
                                                    const newRow = document.createElement('tr');

                                                    newRow.innerHTML = `
                    <td>${data.data.sr_no}</td>
                    <td>${data.data.description_task}</td>
                    <td>${data.data.dependence_department_organization}</td>
                    <td>${data.data.task_assigned_by}</td>
                    <td>${data.data.review_date ? new Date(data.data.review_date).toLocaleDateString('en-GB') : '--'}</td>
                    <td>${data.data.completion_date ? new Date(data.data.completion_date).toLocaleDateString('en-GB') : '--'}</td>
                    <td>${data.data.signature || '--'}</td>
                `;

                                                    tbody.prepend(newRow); // add on top
                                                }

                                                // ✅ Clear form
                                                inputs.forEach(input => input.value = '');
                                                document.getElementById('srNo').value = '';

                                            } else {
                                                toastr.error(data.message || 'Something went wrong', '', {
                                                    positionClass: "toast-top-right",
                                                    progressBar: true,
                                                    timeOut: 3000
                                                });
                                            }
                                        })
                                        .catch(error => {
                                            console.error(error);

                                            toastr.error('Failed to save task. Please try again.', '', {
                                                positionClass: "toast-top-right",
                                                progressBar: true,
                                                timeOut: 3000
                                            });
                                        })
                                        .finally(() => {
                                            saveButton.textContent = originalText;
                                            saveButton.disabled = false;
                                        });

                                });
                            </script>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="container-fluid mt-3">
                                <div>
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="https://piffersoftware.com/images/piffer-logo1.png" alt="PSS Logo"
                                                class="img-fluid position-end" style="max-height: 80px;">
                                        </div>
                                        <div class="col-md-10">
                                            <h1 class="mb-0" style="font-family: Stencil; font-size: 3rem;">
                                                PIFFERS SECURITY SERVICES (PVT.) LTD
                                            </h1>
                                        </div>
                                        <h2 class="text-center"
                                            style="font-family: Stencil; font-size: 1.98rem; text-decoration: underline;">
                                            NOTICE LOG SHEET
                                        </h2>
                                    </div>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Enter Notice Details</th>
                                                <th>Upload File</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control mb-2"
                                                                id="regulator_name" placeholder="Regulator Name">
                                                            <input type="date" class="form-control mb-2"
                                                                id="notice_date" placeholder="Notice Date">
                                                            <input type="date" class="form-control mb-2"
                                                                id="notice_received_on"
                                                                placeholder="Notice Received On">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="date" class="form-control mb-2"
                                                                id="reporting_date"
                                                                placeholder="Reporting/Hearing Date">
                                                            <input type="text" class="form-control mb-2"
                                                                id="concern_department"
                                                                placeholder="Concern Department">
                                                            <select class="form-control mb-2" id="notice_entered"
                                                                name="notice_entered">
                                                                <option value="">-- Select Notice Entered --</option>
                                                                <option value="1">Yes</option>
                                                                <option value="0">No</option>
                                                            </select>

                                                            <select class="form-control mb-2" id="reported_to_cro"
                                                                name="reported_to_cro">
                                                                <option value="">-- Select Reported to CRO --</option>
                                                                <option value="1">Yes</option>
                                                                <option value="0">No</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <textarea class="form-control" id="notice_description"
                                                        placeholder="Notice Description"></textarea>
                                                </td>
                                                <td>
                                                    <input type="file" id="noticeFile" class="form-control">
                                                </td>
                                                <td class="text-end">
                                                    <button type="button" class="btn btn-success"
                                                        id="uploadNoticeButton">Upload Notice</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered" id="taskRecordsTable">
                                        <tbody id="taskRecordsTableBody">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Regulator Name</th>
                                                    <th>Notice Date</th>
                                                    <th>Received On</th>
                                                    <th>Reporting Date</th>
                                                    <th>Concern Department</th>
                                                    <th>Description</th>
                                                    <th>Attachment</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                            @foreach ($notices as $index => $notice)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $notice->regulator_name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($notice->notice_date)->format('d M Y') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($notice->notice_received_on)->format('d M
                                                                    Y') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($notice->reporting_date)->format('d M Y')
                                                                    }}</td>
                                                    <td>{{ $notice->concern_department }}</td>
                                                    <td>{{ $notice->notice_description }}</td>
                                                    <td>
                                                        @if ($notice->attachment)
                                                            <a href="{{ asset('storage/' . $notice->attachment) }}"
                                                                target="_blank">
                                                                <img src="{{ asset('storage/' . $notice->attachment) }}"
                                                                    width="40" height="40" alt="file">
                                                            </a>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('notice.delete', $notice->id) }}"
                                                            class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <script>
                                    document.getElementById('uploadNoticeButton').addEventListener('click', function () {
                                        const formData = new FormData();
                                        const fields = [
                                            'regulator_name', 'notice_date', 'notice_received_on',
                                            'reporting_date', 'concern_department', 'notice_entered',
                                            'reported_to_cro', 'notice_description'
                                        ];

                                        for (let field of fields) {
                                            const value = document.getElementById(field).value;
                                            if (!value) {
                                                alert("Please fill all the fields");
                                                return;
                                            }
                                            formData.append(field, value);
                                        }

                                        const file = document.getElementById('noticeFile').files[0];
                                        if (!file) {
                                            alert("Please upload a file");
                                            return;
                                        }
                                        formData.append('attachment', file);

                                        // Add CSRF token to FormData
                                        formData.append('_token', '{{ csrf_token() }}');

                                        fetch("{{ route('notice.store') }}", {
                                            method: 'POST',
                                            body: formData
                                        })
                                            .then(response => {
                                                if (!response.ok) {
                                                    return response.json().then(err => { throw err });
                                                }
                                                return response.json();
                                            })
                                            .then(data => {
                                                alert(data.message || 'Notice uploaded!');
                                                location.reload();
                                            })
                                            .catch(error => {
                                                console.error(error);
                                                if (error.errors) {
                                                    let messages = Object.values(error.errors).flat().join("\n");
                                                    alert("Validation Errors:\n" + messages);
                                                } else {
                                                    alert('Upload failed.');
                                                }
                                            });
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Weapon-Record" role="tabpanel"
                            aria-labelledby="Weapon-Record-tab">
                            @if (auth()->check() && auth()->user()->role !== 'client')
                                <div class=" mt-5 mb-5 d-flex justify-content-end">
                                    <a class="btn btn-primary btn-sm" href="{{ route('post.weakly.recordes') }}">
                                        + New Record
                                    </a>
                                </div>
                            @endif
                            <div class="row align-items-center">
                                <div class="col-lg-2">
                                    <img src="https://piffersoftware.com/images/piffer-logo1.png" alt="Piffer Logo"
                                        style="max-height: 80px;">
                                </div>
                                <div class="col-lg-8 text-center">
                                    <h1 class="mb-0" style="font-family: 'Stencil', sans-serif; font-size: 2rem;">Weekly
                                        Weapon Record Report</h1>
                                </div>
                                <div class="col-lg-2">
                                    <img src="{{ asset('https://piffersoftware.com/images/piffer-logo1.png') }}"
                                        alt="Secondary Logo" style="max-height: 80px;">
                                </div>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table table-bordered table-hover exportable" style="width:100%">
                                    <thead class="gm-header">
                                        <tr>
                                            <th colspan="2" class="text-center">Weekly Weapon Record</th>
                                            <th colspan="6" class="text-center">12 Bore</th>
                                            <th colspan="6" class="text-center">30 Bore</th>
                                            <th colspan="6" class="text-center">9mm Pistol</th>
                                            <th colspan="2" class="text-center">7mm Rifles</th>
                                            <th colspan="2" class="text-center">222 Bore Rifle</th>
                                            <th colspan="2" class="text-center">44 Bore Rifle</th>
                                            <th colspan="2" class="text-center">223 Bore Rifle</th>
                                            <th colspan="2" class="text-center">223 M4 Rifle</th>
                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <th>Branch Name</th>
                                            <th>Repeater</th>
                                            <th>Body Guard</th>
                                            <th>Wooden Body</th>
                                            <th>G3 Style</th>
                                            <th>Total Bullets</th>
                                            <th>Total</th>
                                            <th>7 Shots</th>
                                            <th>14 Shots</th>
                                            <th>MP-5</th>
                                            <th>Kalakov</th>
                                            <th>Total Bullets</th>
                                            <th>Total</th>
                                            <th>MP-5</th>
                                            <th>Zagana</th>
                                            <th>Breta</th>
                                            <th>Glock</th>
                                            <th>Total Bullets</th>
                                            <th>Total</th>
                                            <th>Standard</th>
                                            <th>Total Bullets</th>
                                            <th>Standard</th>
                                            <th>Total Bullets</th>
                                            <th>Standard</th>
                                            <th>Total Bullets</th>
                                            <th>Standard</th>
                                            <th>Total Bullets</th>
                                            <th>Standard</th>
                                            <th>Total Bullets</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($records as $record)
                                            <tr>
                                                <td>{{ $record->date ?? 'N/A' }}</td>
                                                <td>{{ $record->Wbranch->branch_office_name ?? 'N/A' }}</td>
                                                <td>{{ $record->repeater ?? 'N/A' }}</td>
                                                <td>{{ $record->body_guard ?? 'N/A' }}</td>
                                                <td>{{ $record->wooden_body ?? 'N/A' }}</td>
                                                <td>{{ $record->g3_style ?? 'N/A' }}</td>
                                                <td>{{ $record->bore12_total_bullets ?? 'N/A' }}</td>
                                                <td>{{ $record->bore12_total ?? 'N/A' }}</td>
                                                <td>{{ $record->seven_shots ?? 'N/A' }}</td>
                                                <td>{{ $record->fourteen_shots ?? 'N/A' }}</td>
                                                <td>{{ $record->mp5 ?? 'N/A' }}</td>
                                                <td>{{ $record->kalakov ?? 'N/A' }}</td>
                                                <td>{{ $record->bore30_total_bullets ?? 'N/A' }}</td>
                                                <td>{{ $record->bore30_total ?? 'N/A' }}</td>
                                                <td>{{ $record->mp_5 ?? 'N/A' }}</td>
                                                <td>{{ $record->zagana ?? 'N/A' }}</td>
                                                <td>{{ $record->breta ?? 'N/A' }}</td>
                                                <td>{{ $record->glock ?? 'N/A' }}</td>
                                                <td>{{ $record->mm9_total_bullets ?? 'N/A' }}</td>
                                                <td>{{ $record->mm9_total ?? 'N/A' }}</td>
                                                <td>{{ $record->mm7_standard ?? 'N/A' }}</td>
                                                <td>{{ $record->mm7_total_bullets ?? 'N/A' }}</td>
                                                <td>{{ $record->rifle_222 ?? 'N/A' }}</td>
                                                <td>{{ $record->rifle_222_bullets ?? 'N/A' }}</td>
                                                <td>{{ $record->rifle_44 ?? 'N/A' }}</td>
                                                <td>{{ $record->rifle_44_bullets ?? 'N/A' }}</td>
                                                <td>{{ $record->rifle_223 ?? 'N/A' }}</td>
                                                <td>{{ $record->rifle_223_bullets ?? 'N/A' }}</td>
                                                <td>{{ $record->rifle_223_m4 ?? 'N/A' }}</td>
                                                <td>{{ $record->rifle_223_m4_bullets ?? 'N/A' }}</td>
                                            </tr>
                                            @if (!$loop->last)
                                                <tr>
                                                    <td colspan="30" class="bg-light"></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr class="table-secondary">
                                            <td colspan="2" class="text-center"><strong>Total of Branch</strong></td>
                                            <td>{{ $totals['repeater'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['body_guard'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['wooden_body'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['g3_style'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['bore12_total_bullets'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['bore12_total'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['seven_shots'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['fourteen_shots'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['mp5'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['kalakov'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['bore30_total_bullets'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['bore30_total'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['mp_5'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['zagana'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['breta'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['glock'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['mm9_total_bullets'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['mm9_total'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['mm7_standard'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['mm7_total_bullets'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['rifle_222'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['rifle_222_bullets'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['rifle_44'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['rifle_44_bullets'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['rifle_223'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['rifle_223_bullets'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['rifle_223_m4'] ?? 'N/A' }}</td>
                                            <td>{{ $totals['rifle_223_m4_bullets'] ?? 'N/A' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="Uniform-Record" role="tabpanel"
                            aria-labelledby="Uniform-Record-tab">
                            @if (auth()->check() && auth()->user()->role !== 'client')
                                <div class=" mt-5 mb-5 d-flex justify-content-end">
                                    <a class="btn btn-primary btn-sm" href="{{ route('post.weakly.recordes') }}">
                                        + New Record
                                    </a>
                                </div>
                            @endif
                            <div class="row align-items-center">
                                <div class="col-lg-2">
                                    <img src="https://piffersoftware.com/images/piffer-logo1.png" alt="Piffer Logo"
                                        style="max-height: 80px;">
                                </div>
                                <div class="col-lg-8 text-center">
                                    <h1 class="mb-0" style="font-family: 'Stencil', sans-serif; font-size: 2rem;">Weekly
                                        Uniform Record Report</h1>
                                </div>
                                <div class="col-lg-2">
                                    <img src="{{ asset('https://piffersoftware.com/images/piffer-logo1.png') }}"
                                        alt="Secondary Logo" style="max-height: 80px;">
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered table-hover exportable">
                                    <thead class="gm-header">
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Branch</th>
                                            <th>Standard Uniform</th>
                                            <th>White Sleeves</th>
                                            <th>Ssg Uniform</th>
                                            <th>T Shirt</th>
                                            <th>Lady Gown</th>
                                            <th>Suit</th>
                                            <th>Dms</th>
                                            <th>Standard Shows</th>
                                            <th>Beige Color Shoes</th>
                                            <th>Whistile N Dory</th>
                                            <th>Employee Card</th>
                                            <th>P Gap</th>
                                            <th>Barret Cap</th>
                                            <th>White Belt</th>
                                            <th>Black Belt</th>
                                            <th>Sash</th>
                                            <th>Qamar Barand</th>
                                            <th>White Gloves</th>
                                            <th>White Arm Sleves</th>
                                            <th>Arm Band</th>
                                            <th>Scarf</th>
                                            <th>Winter Jacket</th>
                                            <th>High Visibility Jacket</th>
                                            <th>Jarsee</th>
                                            <th>Rain Coat</th>
                                            <th>Umbrella</th>
                                            <th>Torch</th>
                                            <th>Others</th>
                                            <th>Supervisor Signature</th>
                                            <th>Manager Operation Signature</th>
                                            <th>Gm Signature</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($uniformbranches as $index => $record)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $record->uni_date ?? 'N/A' }}</td>
                                                <td>{{ $record->Ubranch->branch_office_name ?? 'N/A' }}</td>

                                                <td>{{ $record->stand_uniform ?? 'N/A' }}</td>
                                                <td>{{ $record->white_sleeves ?? 'N/A' }}</td>
                                                <td>{{ $record->ssg_uniform ?? 'N/A' }}</td>
                                                <td>{{ $record->t_shirt ?? 'N/A' }}</td>
                                                <td>{{ $record->lady_gown ?? 'N/A' }}</td>
                                                <td>{{ $record->suit ?? 'N/A' }}</td>
                                                <td>{{ $record->dms ?? 'N/A' }}</td>
                                                <td>{{ $record->standard_shows ?? 'N/A' }}</td>
                                                <td>{{ $record->beige_color_shoes ?? 'N/A' }}</td>
                                                <td>{{ $record->whistile_n_dory ?? 'N/A' }}</td>
                                                <td>{{ $record->employee_card ?? 'N/A' }}</td>
                                                <td>{{ $record->p_gap ?? 'N/A' }}</td>
                                                <td>{{ $record->barret_cap ?? 'N/A' }}</td>
                                                <td>{{ $record->white_belt ?? 'N/A' }}</td>
                                                <td>{{ $record->black_belt ?? 'N/A' }}</td>
                                                <td>{{ $record->sash ?? 'N/A' }}</td>
                                                <td>{{ $record->qamar_barand ?? 'N/A' }}</td>
                                                <td>{{ $record->white_gloves ?? 'N/A' }}</td>
                                                <td>{{ $record->white_arm_sleves ?? 'N/A' }}</td>
                                                <td>{{ $record->arm_band ?? 'N/A' }}</td>
                                                <td>{{ $record->scarf ?? 'N/A' }}</td>
                                                <td>{{ $record->winter_jacket ?? 'N/A' }}</td>
                                                <td>{{ $record->high_visibility_jacket ?? 'N/A' }}</td>
                                                <td>{{ $record->jarsee ?? 'N/A' }}</td>
                                                <td>{{ $record->rain_coat ?? 'N/A' }}</td>
                                                <td>{{ $record->umbrella ?? 'N/A' }}</td>
                                                <td>{{ $record->torch ?? 'N/A' }}</td>
                                                <td>{{ $record->others ?? 'N/A' }}</td>
                                                <td>{{ $record->supervisor_signature ?? 'N/A' }}</td>
                                                <td>{{ $record->manager_operation_signature ?? 'N/A' }}</td>
                                                <td>{{ $record->gm_signature ?? 'N/A' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="internal_dispatches" role="tabpanel"
                    aria-labelledby="nav-home-tab">


                </div>
            </div>
            <button type="submit" class="btn btn-success btn-sm float-right mt-4">Submit</button>
        </form>
    </section>
</div>
</div>
<!-- </div> -->
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
<!-- script for add more consultant details -->

<script>
    $('.editable-like').on('blur', function () {
        let newValue = $(this).text().trim();
        let id = $(this).data('id'); // like 'facebook_morning_post'
        let parts = id.split('_');
        let platform = parts[0];
        let post_type = parts.slice(1).join('_'); // handles multiple parts
        $.ajax({
            url: '{{ route('update.likes') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                platform: platform,
                post_type: post_type,
                value: newValue
            },
            success: function (response) {
                console.log('Updated successfully');
            },
            error: function (err) {
                alert('Update failed');
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        var openAccordions = []; // Array to store IDs of open accordion items
        // Add More Button Click Event
        $('#addSignatory10').on('click', function () {
            var SignatoryAccordionCount10 = $('#signatoryAccordion10 .signaccordion-item10').length + 1;
            var newSignAccordion10 = `
            <div class="accordion-item signaccordion-item10">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" style="background-color: #34005A; color:white">
                        Report Entry ${SignatoryAccordionCount10}
                    </button>
                </h2>
                <div class="collapse" id="signatoryCollapse10${SignatoryAccordionCount10}">
                    <div class="accordion-body">
                        <input type="hidden" name="reports[${SignatoryAccordionCount10 - 1}][r_id]" value="">
                        <!-- Your content for signatory entry goes here -->
                        <div class="row mb-2" id="signatoryDetailsContainer10">
                            <div class="col-lg-12" id="consultant_add_fields">
                                <div class=" row mb-2">
                                    <div class="col-lg-4 spacing-left"> Date <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][report_date]" type="date" placeholder="..." style="width: 103%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Branch Name <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][branch]" type="text" placeholder="..." style="width: 97%;"> </div>
                                    <div class="col-lg-4 spacing-right"> Branch ID <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][site_id]" type="text" placeholder="..." style="width: 100%;"> </div>

                                    <div class="col-lg-4 spacing-left"> Location <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][location]" type="text" placeholder="..." style="width: 103%;"> </div>
                                    <div class="col-lg-4 spacing-right"> Authorized Guards <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][auth_guards]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left"> Army <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][army]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left"> SSG <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][ssg]" type="text" placeholder="..." style="width: 103%;"> </div>
                                </div>
                                <div class=" row mb-2">
                                    <div class="col-lg-4 spacing-right"> Civil <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][civil]"  type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Absentees <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][absente]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Leave <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][leave]"  type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-right"> Reason <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][reason]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Reliver Provided <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][r_provided]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Last Complaint Date <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][last_comp_date]" type="date" placeholder="..." style="width: 100%;"> </div>
                                </div>
                                <div class=" row mb-2">
                                    <div class="col-lg-4 spacing-right"> Any Incident & Report No <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][any_inc]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-right"> Pending Nadra Versys <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][pending_nadra]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Unsent DPO Reports <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][unsent_dpo_rep]"  type="text" placeholder="..." style="width: 100%;"></input> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> No. of resigns <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][no_of_resigns]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-right"> Guards without bank started <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][guards_wout_bank]"  type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Any new Site Started <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][any_new_site]" type="text" placeholder="..." style="width: 100%;"> </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-left spacing-right"> No. of Guards <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][no_of_guards]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Any Site Closed <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][any_site_closed]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> No. of Guards of closed Site <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][no_of_guards_of_closed_site]" type="text" placeholder="..." style="width: 100%;"> </div>

                                    <div class="col-lg-4 spacing-right"> Details of Escort Duties <br> <textarea class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][escort_duties]" type="text" placeholder="..." style="width: 100%;"></textarea> </div>
                                    <div class="col-lg-4 spacing-right"> Details of Events <br> <textarea class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][event_details]" type="text" placeholder="..." style="width: 100%;"></textarea> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Amount of pending Recoveries <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][pending_recoveries]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Signature of Manager Accounts <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][sign_manager]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-right"> Any staff on annual leave <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][staff_on_leav]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Any short leave of staff with Name <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][short_leav]" type="text" placeholder="..." style="width: 100%;"> </div>
                                </div>
                                <h5>Checklist :</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-left spacing-right"> Utility Bills Paid<br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][utility_bills]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-right">Bio Matric Working <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][bio_matric]" type="text" placeholder="..." style="width: 100%;"></div>
                                    <div class="col-lg-4 spacing-right">Bio Register Maintained  <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][bio_register]" type="text" placeholder="..." style="width: 100%;"></div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Office Rent Paid  <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][office_rent]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> UPS Working <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][ups]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-right"> Guard File Maintained  <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][guard_file]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right">  Guard Accomodation Rent Paid <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][guard_accomodation]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Any Maintainance Required  <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][any_maintainence]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Weapon Register Maintained <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][weapon_register]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-right"> CCTV Working  <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][cctv]"  type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right">  Attendance Register Maintained <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][attendance_register]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right">  Kote Register Maintained <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][kote_register]" type="text" placeholder="..." style="width: 100%;"> </div>
                                </div>

                            </div>
                        </div>
                    </div>
                     <button class="btn btn-danger removeSignAccordion10" type="button" style="width:10%; margin-left:13px;">
                         Remove
                     </button>
                </div>
            </div>
        `;
            $('#signatoryAccordion10').append(newSignAccordion10);
        });
        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion10', function () {
            var accordionItem = $(this).closest('.accordion-item');
            var accordionId = accordionItem.find('.collapse').attr('id');
            var index = openAccordions.indexOf(accordionId);
            if (index !== -1) {
                openAccordions.splice(index, 1); // Remove accordion ID from openAccordions array
            }
            accordionItem.remove();
        });
        // Accordion Button Click Event
        $(document).on('click', '.accordion-button', function () {
            var accordionItem = $(this).closest('.accordion-item');
            var accordionId = accordionItem.find('.collapse').attr('id');
            var isOpen = openAccordions.includes(accordionId);
            if (!isOpen) {
                openAccordions.push(accordionId); // Add accordion ID to openAccordions array
                accordionItem.find('.collapse').addClass('show');
            } else {
                var index = openAccordions.indexOf(accordionId);
                if (index !== -1) {
                    openAccordions.splice(index, 1); // Remove accordion ID from openAccordions array
                }
                accordionItem.find('.collapse').removeClass('show');
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable10() {
            // Clear existing rows
            $('#signatorySummaryTable10 tbody').empty();
            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item10').each(function (index) {
                var site_id = $(this).find('[name="site_id[]"]').val();
                var branch = $(this).find('[name="branch[]"]').val();
                var location = $(this).find('[name="location[]"]').val();
                var auth_guards = $(this).find('[name="auth_guards[]"]').val();
                var army = $(this).find('[name="army[]"]').val();
                var ssg = $(this).find('[name="ssg[]"]').val();
                // Check if any relevant data is entered
                if (site_id || branch || location || auth_guards || army || ssg) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable10 tbody').append(`
                               <tr>
                                   <td>${index + 1}</td>
                                   <td>${site_id}</td>
                                   <td>${branch}</td>
                                   <td>${location}</td>
                                   <td>${auth_guards}</td>
                                   <td>${army}</td>
                                   <td>${ssg}</td>
                                   <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                                   <!-- Add more columns as needed -->
                               </tr>
                           `);
                }
            });
        }
        // Add More Signatory Button Click Event
        $('#addSignatory10').on('click', function () {
            var signatoryEntryCount10 = $('#signatoryAccordion10 .signaccordion-item10').length + 1;
            var newSignatoryEntry10 = `
                       <!-- Your existing signatory accordion HTML goes here -->

                   `;
            console.log('Adding signatory entry:', signatoryEntryCount10);
            $('#signatoryAccordion10').append(newSignatoryEntry10);
        });
        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable10').on('click', function () {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable10();
        });
        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item10').eq(index);
            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });
        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function () {
            $(this).closest('.signaccordion-item10').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable10();
        });
        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory10').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>
<!-- script for add more Issuing Authority -->
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addSignatory11').on('click', function () {
            var SignatoryAccordionCount11 = $('#signatoryAccordion11 .signaccordion-item11').length + 1;
            var newSignAccordion11 = `
                <div class="accordion-item signaccordion-item11" id="signatoryEntry11${SignatoryAccordionCount11}">
                    <h2 class="accordion-header" id="signatoryHeading11${SignatoryAccordionCount11}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse11${SignatoryAccordionCount11}" aria-expanded="false" aria-controls="signatoryCollapse11${SignatoryAccordionCount11}">
                            Office Equipment ${SignatoryAccordionCount11}
                        </button>
                    </h2>
                    <div id="signatoryCollapse11${SignatoryAccordionCount11}" class="collapse" aria-labelledby="signatoryHeading11${SignatoryAccordionCount11}">
                        <div class="accordion-body">
                            <input type="hidden" name="inventories[${SignatoryAccordionCount11 - 1}][i_id]" value="">
                            <div class="row mb-2" id="signatoryDetailsContainer11">
                                <div class="col-lg-12" id="authority_add_fields">
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right"> Equipment Name <br> <input class="form-control" id=""  name="inventories[${SignatoryAccordionCount11 - 1}][category]" type="text" placeholder="..." style="width: 100%;"> </div>
                                        <div class="col-lg-4 spacing-left spacing-right"> Quantity <br> <input class="form-control" id=""  name="inventories[${SignatoryAccordionCount11 - 1}][quantity]" type="text" placeholder="..." style="width: 100%;"> </div>
                                        <div class="col-lg-4 spacing-right"> Notes <br> <textarea class="form-control" id=""  name="inventories[${SignatoryAccordionCount11 - 1}][notes]" type="text" placeholder="..." style="width: 100%;"></textarea> </div>
                                        <div class="col-lg-4 spacing-right"> Attachments <br> <input class="form-control" id="" name="inventories[${SignatoryAccordionCount11 - 1}][attachments]" type="file" placeholder="..." style="width: 90%;"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger removeSignAccordion11" type="button" style="width:10%; margin-left:13px;">
                            Remove
                        </button>
                    </div>
                </div>
            `;
            $('#signatoryAccordion11').append(newSignAccordion11);
        });
        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion11', function () {
            $(this).closest('.signaccordion-item11').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable11() {
            // Clear existing rows
            $('#signatorySummaryTable11 tbody').empty();
            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item11').each(function (index) {
                var category = $(this).find('[name="category[]"]').val();
                var quantity = $(this).find('[name="quantity[]"]').val();
                var notes = $(this).find('[name="notes[]"]').val();
                // Check if any relevant data is entered
                if (category || quantity || notes) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable11 tbody').append(`
                               <tr>
                                   <td>${index + 1}</td>
                                   <td>${category}</td>
                                   <td>${quantity}</td>
                                   <td>${notes}</td>
                                   <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                                   <!-- Add more columns as needed -->
                               </tr>
                           `);
                }
            });
        }
        // Add More Signatory Button Click Event
        $('#addSignatory11').on('click', function () {
            var signatoryEntryCount11 = $('#signatoryAccordion11 .signaccordion-item11').length + 1;
            var newSignatoryEntry11 = `
                       <!-- Your existing signatory accordion HTML goes here -->

                   `;
            console.log('Adding signatory entry:', signatoryEntryCount11);
            $('#signatoryAccordion11').append(newSignatoryEntry11);
        });
        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable11').on('click', function () {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable11();
        });
        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item11').eq(index);
            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });
        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function () {
            $(this).closest('.signaccordion-item11').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable11();
        });
        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory11').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

{{-- Office Branding --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addSignatory13').on('click', function () {
            var SignatoryAccordionCount13 = $('#signatoryAccordion13 .signaccordion-item13').length + 1;
            var newSignAccordion13 = `
                <div class="accordion-item signaccordion-item13" id="signatoryEntry13${SignatoryAccordionCount13}">
                    <h2 class="accordion-header" id="signatoryHeading13${SignatoryAccordionCount13}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse13${SignatoryAccordionCount13}" aria-expanded="false" aria-controls="signatoryCollapse13${SignatoryAccordionCount13}">
                            Vehcile Entry ${SignatoryAccordionCount13}
                        </button>
                    </h2>
                    <div id="signatoryCollapse13${SignatoryAccordionCount13}" class="collapse" aria-labelledby="signatoryHeading13${SignatoryAccordionCount13}">
                        <div class="accordion-body">
                            <input type="hidden" name="moveables[${SignatoryAccordionCount13 - 1}][m_id]" value="">
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Type of Vehicle <br> <input class="form-control"
                                                name="type_of_vehicle[]" name="moveables[${SignatoryAccordionCount13 - 1}][type_of_vehicle]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Vehicle No <br> <input class="form-control"
                                                name="vehicle_no[]" name="moveables[${SignatoryAccordionCount13 - 1}][vehicle_no]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Vehicle Model <br> <input class="form-control"
                                            name="vehicle_model[]" name="moveables[${SignatoryAccordionCount13 - 1}][vehicle_model]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Vehicle Picture <br> <input class="form-control"
                                            name="vehicle_pic[]" name="moveables[${SignatoryAccordionCount13 - 1}][vehicle_pic]" type="file" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Vehicle Book Picture <br> <input class="form-control"
                                            name="vehicle_book_pic[]" name="moveables[${SignatoryAccordionCount13 - 1}][vehicle_book_pic]" type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left">
                                        Payment Type <br> <input class="form-control"
                                        name="payment_type[]" name="moveables[${SignatoryAccordionCount13 - 1}][payment_type]" type="text" placeholder="..."
                                        style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Vehicle Name <br> <input class="form-control"
                                                name="vehicle_name[]" name="moveables[${SignatoryAccordionCount13 - 1}][vehicle_name]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Engine No. <br> <input class="form-control"
                                                name="engine_no[]" name="moveables[${SignatoryAccordionCount13 - 1}][engine_no]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Chasis No. <br> <input class="form-control"
                                            name="chasis_no[]" name="moveables[${SignatoryAccordionCount13 - 1}][chasis_no]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Vehicle Color <br> <input class="form-control"
                                                name="vehicle_color[]" name="moveables[${SignatoryAccordionCount13 - 1}][vehicle_color]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                            </div>
                        <button class="btn btn-danger removeSignAccordion13" type="button" style="width:10%; margin-left:13px;">
                            Remove
                        </button>
                    </div>
                </div>
            `;
            $('#signatoryAccordion13').append(newSignAccordion13);
        });
        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion13', function () {
            $(this).closest('.signaccordion-item13').remove();
        });
    });
</script>
<!-- Script for Issuing Authority in Table -->
<script>
    $(document).ready(function () {
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable13() {
            // Clear existing rows
            $('#signatorySummaryTable13 tbody').empty();
            // Iterate through each accordion item and update the summary table
            $('.signaccordion-item13').each(function (index) {
                var selectedOption = $(this).find('[name="type_of_vehicle[]"] option:selected');
                var typeOfVehicleText = selectedOption
                    .text(); // Fetch the text content of the selected option
                var vehicleNo = $(this).find('[name="vehicle_no[]"]').val();
                var vehicleModel = $(this).find('[name="vehicle_model[]"]').val();
                // Check if any relevant data is entered
                if (typeOfVehicleText || vehicleNo || vehicleModel) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable13 tbody').append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${typeOfVehicleText}</td> <!-- Use typeOfVehicleText to display the text content of the selected option -->
                        <td>${vehicleNo}</td>
                        <td>${vehicleModel}</td>
                        <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                        <!-- Add more columns as needed -->
                    </tr>
                `);
                }
            });
        }
        // Add More Signatory Button Click Event
        $('#addSignatory13').on('click', function () {
            var signatoryEntryCount13 = $('#signatoryAccordion13 .signaccordion-item13').length + 1;
            var newSignatoryEntry13 = `
            <!-- Your existing signatory accordion HTML goes here -->
        `;
            console.log('Adding signatory entry:', signatoryEntryCount13);
            $('#signatoryAccordion13').append(newSignatoryEntry13);
            // Update the signatory summary table after adding a new signatory entry
            updateSignatorySummaryTable13();
        });
        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable13').on('click', function () {
            // Update the signatory summary table
            updateSignatorySummaryTable13();
        });
        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item13').eq(index);
            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });
        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function () {
            $(this).closest('.signaccordion-item13').remove();
            // Update the signatory summary table after removing a signatory entry
            updateSignatorySummaryTable13();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addBranding').on('click', function () {
            var brandingAccordionCount = $('#brandingAccordion .brandingaccordion-item').length + 1;
            var newBrandingAccordion = `
            <div class="accordion-item brandingaccordion-item" id="brandingEntry${brandingAccordionCount}">
                <h2 class="accordion-header" id="brandingHeading${brandingAccordionCount}">
                    <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#brandingCollapse${brandingAccordionCount}" aria-expanded="false" aria-controls="brandingCollapse${brandingAccordionCount}">
                        Office Branding ${brandingAccordionCount}
                    </button>
                </h2>
                <div id="brandingCollapse${brandingAccordionCount}" class="collapse" aria-labelledby="brandingHeading${brandingAccordionCount}">
                    <div class="accordion-body">
                        <input  type="hidden" name="brandings[${brandingAccordionCount - 1}][b_id]" >
                        <div id="inspectionDiv">
                            <div id="inspectionInfo">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                      Branding Type <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][b_type]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                      Picture of Branding <br> <input class="form-control" type="file" name="brandings[${brandingAccordionCount - 1}][picture_of_b]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                      Site of Branding. <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][site_of_b]" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                  <div class="col-lg-4 spacing-right">
                                    Branding Cost <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][cost_of_b]" placeholder="" style="width: 100%;">
                                    <div id="phoneError" class="error-message-phone" style="color: red"></div>
                                </div>
                                  <div class="col-lg-4 spacing-right">
                                      Periodical Maintenance <br>
                                      <select class="form-control" name="brandings[${brandingAccordionCount - 1}][periodical_m]" id="periodicalMaintenance" style="width: 100%;" onchange="toggleMaintenanceDateInput()">
                                          <option value=""></option>
                                          <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                      </select>
                                  </div>

                                  <div class="col-lg-4 spacing-right" id="maintenanceDateField">
                                      Maintenance Date <br>
                                      <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][maintenance_date]" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                                <div class="row mb-2">
                                    <h5>Details of Vendor</h5>
                                    <div class="col-lg-3 spacing-left" >
                                      Vendor ID/No. <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][vendor_id]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Vendor Name<br> <input class="form-control" id="inpFile2" type="text" name="brandings[${brandingAccordionCount - 1}][v_name]" placeholder="..." style="width: 100%;" ></textarea>
                                    </div>
                                    <div class="col-lg-3 spacing-left" >
                                      Vendor Cell Number. <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][v_cell]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Office Number<br> <input class="form-control" id="inpFile2" type="text" name="brandings[${brandingAccordionCount - 1}][v_office]" placeholder="..." style="width: 100%;" >
                                    </div>
                                    <div class="col-lg-3 spacing-left" >
                                      Floor <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][v_floor]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Building<br> <input class="form-control" id="inpFile2" type="text" name="brandings[${brandingAccordionCount - 1}][v_building]" placeholder="..." style="width: 100%;" >
                                    </div>
                                    <div class="col-lg-3 spacing-left" >
                                      Block <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][v_block]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Area<br> <input class="form-control" id="inpFile2" type="text" name="brandings[${brandingAccordionCount - 1}][v_area]" placeholder="..." style="width: 100%;" >
                                    </div>
                                    <div class="col-lg-3 spacing-left" >
                                      City <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][v_city]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Photograph of Building<br> <input class="form-control" id="inpFile2" type="text" name="brandings[${brandingAccordionCount - 1}][v_photo_b]" placeholder="..." style="width: 100%;" >
                                    </div>
                                    <div class="col-lg-3 spacing-left" >
                                      Pin Location <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][v_pin]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Notes<br> <textarea class="form-control" id="inpFile2" type="text" name="brandings[${brandingAccordionCount - 1}][v_notes]"  placeholder="..." style="width: 100%;" ></textarea>
                                    </div>
                                    <div class="col-lg-3 spacing-left" >
                                      Attachments <br> <input class="form-control" type="file" name="brandings[${brandingAccordionCount - 1}][v_attach]" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>


                            </div>
                        </div>

                      </div>
                </div>
            </div>
        `;
            $('#brandingAccordion').append(newBrandingAccordion);
        });
        // Remove Accordion Button Click Event
        $(document).on('click', '.removeBrandingAccordion', function () {
            $(this).closest('.brandingaccordion-item').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update summary table for inspection entries
        function updateInspectionSummaryTable() {
            // Clear existing rows
            $('#inspectionSummaryTable tbody').empty();
            // Iterate through each inspection accordion item and update the summary table
            $('.inspectionaccordion-item').each(function (index) {
                var btype = $(this).find('[name="b_type[]"]').val();
                var siteofB = $(this).find('[name="site_of_b[]"]').val();
                var costofB = $(this).find('[name="cost_of_b[]"]').val();
                // Check if any relevant data is entered
                if (btype || siteofB || costofB) {
                    // Add a new row to the summary table
                    $('#inspectionSummaryTable tbody').append(`
                      <tr>
                          <td>${index + 1}</td>
                          <td>${btype}</td>
                          <td>${siteofB}</td>
                          <td>${costofB}</td>
                          <td><button type="button" style="width: 55%;" class="btn btn-primary view-inspection-button" data-index="${index}">View</button></td>
                          <!-- Add more columns as needed -->
                      </tr>
                  `);
                }
            });
        }
        // Add More Inspection Button Click Event
        $('#addInspection').on('click', function () {
            var inspectionEntryCount = $('#inspectionAccordion .inspectionaccordion-item').length + 1;
            var newInspectionEntry = `
              <!-- Your existing inspection accordion HTML goes here -->
          `;
            console.log('Adding inspection entry:', inspectionEntryCount);
            $('#inspectionAccordion').append(newInspectionEntry);
        });
        // Update Inspection Table Button Click Event
        $('#updateInspectionTable').on('click', function () {
            // Update the inspection summary table
            updateInspectionSummaryTable();
        });
        // View Inspection Button Click Event
        $(document).on('click', '.view-inspection-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.inspectionaccordion-item').eq(index);
            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });
        // Prevent the default behavior of the Add More Inspection button
        $('#addInspection').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addArmour').on('click', function () {
            var ArmourAccordionCount = $('#armourAccordion .armouraccordion-item').length + 1;
            var newArmourAccordion = `
              <div class="accordion-item armouraccordion-item" id="armourEntry${ArmourAccordionCount}">
                  <h2 class="accordion-header" id="armourHeading${ArmourAccordionCount}">
                      <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#armourCollapse${ArmourAccordionCount}" aria-expanded="false" aria-controls="armourCollapse${ArmourAccordionCount}">
                          Token Entry ${ArmourAccordionCount}
                      </button>
                  </h2>
                  <div id="armourCollapse${ArmourAccordionCount}" class="collapse" aria-labelledby="armourHeading${ArmourAccordionCount}">
                    <div class="accordion-body">
                        <input type="hidden" name="tokens[${ArmourAccordionCount - 1}][t_id]" value="">
                        <div id="cleaningInfo">
                            <div class="row col-lg-12">
                                <div class="col-lg-4 spacing-right">
                                    Amount Paid <br> <input class="form-control" type="text" name="tokens[${ArmourAccordionCount - 1}][amount_paid]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Type of Payment <br> <input class="form-control" type="text" name="tokens[${ArmourAccordionCount - 1}][type_of_payment]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Instrument Number <br> <input class="form-control" type="text" name="tokens[${ArmourAccordionCount - 1}][ins_no]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Voucher No. <br> <input class="form-control" type="text" name="tokens[${ArmourAccordionCount - 1}][voucher_no]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Payment Date <br> <input class="form-control" type="date" name="tokens[${ArmourAccordionCount - 1}][payment_date]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Notes <br> <textarea class="form-control" type="text"  name="tokens[${ArmourAccordionCount - 1}][token_note]" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Attachment <br> <input class="form-control" type="file" name="tokens[${ArmourAccordionCount - 1}][token_attach]" placeholder="..." style="width: 100%;">
                                </div>
                            </div>


                        </div>

                    </div>
                    <button class="btn btn-danger btn-sm removeArmourAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                  </div>
              </div>
          `;
            $('#armourAccordion').append(newArmourAccordion);
        });
        // Remove Accordion Button Click Event
        $(document).on('click', '.removeArmourAccordion', function () {
            $(this).closest('.armouraccordion-item').remove();
        });
    });
</script>

<!-- JavaScript code -->
<script>
    $(document).ready(function () {
        // Function to update summary table for armour entries
        function updateArmourSummaryTable() {
            // Clear existing rows
            $('#armourSummaryTable tbody').empty();
            // Iterate through each armour accordion item and update the summary table
            $('.armouraccordion-item').each(function (index) {
                var amountPaid = $(this).find('[name="amount_paid[]"]').val();
                var typeOfPayment = $(this).find('[name="type_of_payment[]"]').val();
                var insNo = $(this).find('[name="ins_no[]"]').val();
                var voucherNo = $(this).find('[name="voucher_no[]"]').val();
                // Check if any relevant data is entered
                if (amountPaid || typeOfPayment || insNo || voucherNo) {
                    // Add a new row to the summary table
                    $('#armourSummaryTable tbody').append(`
                      <tr>
                          <td>${index + 1}</td>
                          <td>${amountPaid}</td>
                          <td>${typeOfPayment}</td>
                          <td>${insNo}</td>
                          <td>${voucherNo}</td>
                          <td><button type="button" style="width: 64%;" class="btn btn-primary view-armour-button" data-index="${index}">View</button></td>
                          <!-- Add more columns as needed -->
                      </tr>
                  `);
                }
            });
        }
        // Add More Armour Button Click Event
        $('#addArmour').on('click', function () {
            var armourEntryCount = $('#armourAccordion .armouraccordion-item').length + 1;
            var newArmourEntry = `
              <!-- Your existing armour accordion HTML goes here -->
          `;
            console.log('Adding armour entry:', armourEntryCount);
            $('#armourAccordion').append(newArmourEntry);
        });
        // Update Armour Table Button Click Event
        $('#updateArmourTable').on('click', function () {
            // Update the armour summary table
            updateArmourSummaryTable();
        });
        // View Armour Button Click Event
        $(document).on('click', '.view-armour-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.armouraccordion-item').eq(index);
            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });
        // Prevent the default behavior of the Add More Armour button
        $('#addArmour').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>
{{-- Insurance Company Details --}}

<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addAudit').on('click', function () {
            var AuditAccordionCount = $('#auditAccordion .auditaccordion-item').length + 1;
            var newAuditAccordion = `
              <div class="accordion-item auditaccordion-item" id="auditEntry${AuditAccordionCount}">
                  <h2 class="accordion-header" id="auditHeading${AuditAccordionCount}">
                      <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#auditCollapse${AuditAccordionCount}" aria-expanded="false" aria-controls="auditCollapse${AuditAccordionCount}">
                          Insurance Company Details Entry ${AuditAccordionCount}
                      </button>
                  </h2>
                  <div id="auditCollapse${AuditAccordionCount}" class="collapse" aria-labelledby="auditHeading${AuditAccordionCount}">
                    <div class="accordion-body">
                        <input type="hidden" name="insurrances[${AuditAccordionCount - 1}][ins_id]" value="">
                      <div class=" row main-content div" id="auditsInfo">
                          <div class="col-lg-12">
                              <h5>POC :</h5>
                              <div class="row mb-2">
                                  <div class="col-lg-3 spacing-right">
                                      Company Name : <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][company_name]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Name <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_name]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Web <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_web]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Email <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_email]" type="text" placeholder="..." style="width: 100%;">
                                  </div>

                                  <div class="col-lg-3 spacing-right">
                                    Cell Number : <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_cell]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Value of Sum Insured <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][value_of_sum]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Insurance Policy Attachment <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][ins_p_pic]" type="file" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Certificate of Insurrance <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][c_of_ins]" type="file" placeholder="..." style="width: 100%;">
                                  </div>
                                  <h5>Address</h5>
                                  <div class="col-lg-3 spacing-right">
                                    Office No. : <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_office]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Floor No. <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_floor]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Building <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_building]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Block <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_block]" type="text" placeholder="..." style="width: 100%;">
                                  </div>

                                  <div class="col-lg-3 spacing-right">
                                    Area <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_area]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      City <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_city]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Photograph of Location <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_loc]" type="file" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Pin Location <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_pin]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                          </div>

                          <div class="row mb-2">
                              <div class="col-lg-6 spacing-right mt-2">
                              Notes <br>
                              <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="insurrances[${AuditAccordionCount - 1}][ins_note]" rows="2" cols="38">
                              </textarea>
                              </div>
                              <div class="col-lg-6 spacing-left spacing-right mt-2">
                                  Attachments <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][ins_attach]" type="file" placeholder="..." style="width: 70%;" multiple>
                              </div>

                          </div>

                      </div>

                  </div>
                      <button class="btn btn-danger btn-sm removeAuditAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                  </div>
              </div>
          `;
            $('#auditAccordion').append(newAuditAccordion);
        });
        // Remove Accordion Button Click Event
        $(document).on('click', '.removeAuditAccordion', function () {
            $(this).closest('.auditaccordion-item').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update audit summary table for audit entries
        function updateAuditSummaryTable() {
            // Clear existing rows
            $('#auditSummaryTable tbody').empty();
            // Iterate through each audit accordion item and update the summary table
            $('.auditaccordion-item').each(function (index) {
                var companyName = $(this).find('[name="company_name[]"]').val();
                var iPocName = $(this).find('[name="i_poc_name[]"]').val();
                var iPocCell = $(this).find('[name="i_poc_cell[]"]').val();
                // Check if any relevant data is entered
                if (companyName || iPocName || iPocCell) {
                    // Add a new row to the summary table
                    $('#auditSummaryTable tbody').append(`
                      <tr>
                          <td>${index + 1}</td>
                          <td>${companyName}</td>
                          <td>${iPocName}</td>
                          <td>${iPocCell}</td>
                          <td><button type="button" style="width : 65%;" class="btn btn-primary view-audit-button" data-index="${index}">View</button></td>
                          <!-- Add more columns as needed -->
                      </tr>
                  `);
                }
            });
        }
        // Add More Audit Button Click Event
        $('#addAudit').on('click', function () {
            var auditEntryCount = $('#auditAccordion .auditaccordion-item').length + 1;
            var newAuditEntry = `
              <!-- Your existing audit accordion HTML goes here -->
          `;
            console.log('Adding audit entry:', auditEntryCount);
            $('#auditAccordion').append(newAuditEntry);
        });
        // Update Audit Table Button Click Event
        $('#updateAuditTable').on('click', function () {
            // Update the audit summary table
            updateAuditSummaryTable();
        });
        // View Audit Button Click Event
        $(document).on('click', '.view-audit-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.auditaccordion-item').eq(index);
            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });
        // Prevent the default behavior of the Add More Audit button
        $('#addAudit').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

{{-- Tracker Tab Accordion --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addPromact').on('click', function () {
            var PromactAccordionCount = $('#promactAccordion .promactaccordion-item').length + 1;
            var newPromactAccordion = `
                <div class="accordion-item promactaccordion-item" id="promactEntry${PromactAccordionCount}">
                    <h2 class="accordion-header" id="promactHeading${PromactAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#promactCollapse${PromactAccordionCount}" aria-expanded="false" aria-controls="promactCollapse${PromactAccordionCount}">
                            Tracker Details Entry ${PromactAccordionCount}
                        </button>
                    </h2>
                    <div id="promactCollapse${PromactAccordionCount}" class="collapse" aria-labelledby="promactHeading${PromactAccordionCount}">
                        <div class="accordion-body">
                            <input type="hidden" name="trackers[${PromactAccordionCount - 1}][tr_id]" value="">
                          <div class=" row main-content div" id="">

                              <div class="col-lg-12">
                                  <h5>POC :</h5>
                                  <div class="row mb-2">
                                      <div class="col-lg-3 spacing-right">
                                          Company Name : <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][tracker_company_name]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-left spacing-right">
                                          Name <br> <input class="form-control"  name="trackers[${PromactAccordionCount - 1}][t_poc_name]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-right">
                                          Web <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_web]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-right">
                                          Email <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_email]" type="text" placeholder="..." style="width: 100%;">
                                      </div>

                                      <div class="col-lg-3 spacing-right">
                                        Cell Number : <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_cell]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <h5>Address</h5>
                                      <div class="col-lg-3 spacing-right">
                                        Office No. : <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_office]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-left spacing-right">
                                          Floor No. <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_floor]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-right">
                                          Building <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_building]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-right">
                                          Block <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_block]" type="text" placeholder="..." style="width: 100%;">
                                      </div>

                                      <div class="col-lg-3 spacing-right">
                                        Area <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_area]"  type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-left spacing-right">
                                          City <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_city]" name="t_poc_city[]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-right">
                                          Photograph of Location <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_loc]" type="file" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-right">
                                          Pin Location <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_pin]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                  </div>
                              </div>

                              <div class="row mb-2">
                                  <div class="col-lg-6 spacing-right mt-2">
                                  Notes <br>
                                  <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="trackers[${PromactAccordionCount - 1}][tracker_note]" rows="2" cols="38">
                                  </textarea>
                                  </div>
                                  <div class="col-lg-6 spacing-left spacing-right mt-2">
                                      Attachments <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][tracker_attach]"  type="file" placeholder="..." style="width: 70%;" multiple>
                                  </div>
                              </div>

                          </div>

                        </div>
                        <button class="btn btn-danger btn-sm removePromactAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;
            $('#promactAccordion').append(newPromactAccordion);
        });
        // Remove Accordion Button Click Event
        $(document).on('click', '.removePromactAccordion', function () {
            $(this).closest('.promactaccordion-item').remove();
        });
    });
</script>

<!-- JavaScript Function to Update Summary Table -->
<script>
    $(document).ready(function () {
        // Function to update promotional activity summary table
        function updatePromactSummaryTable() {
            // Clear existing rows
            $('#promactSummaryTable tbody').empty();
            // Iterate through each promotional activity accordion item and update the summary table
            $('.promactaccordion-item').each(function (index) {
                // Extract relevant information
                var trackerCompanyName = $(this).find('[name="tracker_company_name[]"]').val();
                var tPocName = $(this).find('[name="t_poc_name[]"]').val();
                var tPocCell = $(this).find('[name="t_poc_cell[]"]').val();
                // Check if any relevant data is entered
                if (trackerCompanyName || tPocName || tPocCell) {
                    // Add a new row to the summary table
                    $('#promactSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${trackerCompanyName}</td>
                            <td>${tPocName}</td>
                            <td>${tPocCell}</td>
                            <td><button type="button" style="width : 64%;" class="btn btn-primary view-promact-button" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }
        // Add More Promotional Button Click Event
        $('#addPromact').on('click', function () {
            var promactEntryCount = $('#promactAccordion .promactaccordion-item').length + 1;
            var newPromactEntry = `
                <!-- Your existing promotional activity accordion HTML goes here -->
            `;
            console.log('Adding promotional activity entry:', promactEntryCount);
            $('#promactAccordion').append(newPromactEntry);
        });
        // Update Promotional Activity Table Button Click Event
        $('#updatePromactTable').on('click', function () {
            // Update the promotional activity summary table
            updatePromactSummaryTable();
        });
        // View Promotional Activity Button Click Event
        $(document).on('click', '.view-promact-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.promactaccordion-item').eq(index);
            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });
        // Prevent the default behavior of the Add More Promotional button
        $('#addPromact').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

{{-- Repair & Maintenance Accordion --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addNotification').on('click', function () {
            var NotificationAccordionCount = $('#notificationAccordion .notificationaccordion-item')
                .length + 1;
            var newNotificationAccordion = `
              <div class="accordion-item notificationaccordion-item" id="notificationEntry${NotificationAccordionCount}">
                  <h2 class="accordion-header" id="notificationHeading${NotificationAccordionCount}">
                      <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#notificationCollapse${NotificationAccordionCount}" aria-expanded="false" aria-controls="notificationCollapse${NotificationAccordionCount}">
                          Repair & Maintenance Entry ${NotificationAccordionCount}
                      </button>
                  </h2>
                  <div id="notificationCollapse${NotificationAccordionCount}" class="collapse" aria-labelledby="notificationHeading${NotificationAccordionCount}">
                    <div class="accordion-body">
                    <input type="hidden" name="repairs[${NotificationAccordionCount - 1}][r_id]" value="">
                      <div class=" row main-content div" id="">

                          <div class="col-lg-12">

                              <div class="row mb-2">
                                  <div class="col-lg-3 spacing-right">
                                  Serial No. <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][serial_no]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Description <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_desc]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Amount of Bill <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_amount]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Payment Made By <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_pay_by]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                    Date <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_date]" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                  <h5>Vendor Details :</h5>
                                  <div class="col-lg-3 spacing-right">
                                      Company Name : <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][repair_company_name]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Name <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_name]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Web <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_web]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Email <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_email]" type="text" placeholder="..." style="width: 100%;">
                                  </div>

                                  <div class="col-lg-3 spacing-right">
                                    Cell Number : <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_cell]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <h5>Address</h5>
                                  <div class="col-lg-3 spacing-right">
                                    Office No. : <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_office]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Floor No. <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_floor]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Building <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_building]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Block <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_block]" type="text" placeholder="..." style="width: 100%;">
                                  </div>

                                  <div class="col-lg-3 spacing-right">
                                    Area <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_area]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      City <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_city]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Photograph of Location <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_loc]" type="file" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Pin Location <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_pin]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                          </div>
                          <h5>Any Warranty :</h5>
                          <div class="row mb-2">
                              <div class="col-lg-6 spacing-left spacing-right mt-2">
                              Any Warranty <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_warranty]" type="file" placeholder="..." style="width: 70%;" multiple>
                              </div>
                              <div class="col-lg-6 spacing-right mt-2">
                              Notes <br>
                              <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="repairs[${NotificationAccordionCount - 1}][warranty_note]"  rows="2" cols="38">
                              </textarea>
                              </div>

                          </div>

                          <div class="row mb-2">
                            <div class="col-lg-6 spacing-right mt-2">
                            Notes <br>
                            <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="repairs[${NotificationAccordionCount - 1}][repair_note]" rows="2" cols="38">
                            </textarea>
                            </div>
                            <div class="col-lg-6 spacing-left spacing-right mt-2">
                                Attachments <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][repair_attach]" type="file" placeholder="..." style="width: 70%;" multiple>
                            </div>
                        </div>
                      </div>

                    </div>
                    <button class="btn btn-danger btn-sm removeNotificationAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                  </div>
              </div>
          `;
            $('#notificationAccordion').append(newNotificationAccordion);
        });
        // Remove Accordion Button Click Event
        $(document).on('click', '.removeNotificationAccordion', function () {
            $(this).closest('.notificationaccordion-item').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update the notification summary table
        function updateNotificationSummaryTable() {
            // Clear existing rows
            $('#notificationSummaryTable tbody').empty();
            // Iterate through each notification accordion item and update the summary table
            $('.notificationaccordion-item').each(function (index) {
                var serialNo = $(this).find('[name="serial_no[]"]').val();
                var rdesc = $(this).find('[name="r_desc[]"]').val();
                var rAmount = $(this).find('[name="r_amount[]"]').val();
                // Check if any relevant data is entered
                if (serialNo || rdesc || rAmount) {
                    // Add a new row to the summary table
                    $('#notificationSummaryTable tbody').append(`
                      <tr>
                          <td>${index + 1}</td>
                          <td>${serialNo}</td>
                          <td>${rdesc}</td>
                          <td>${rAmount}</td>
                          <td><button type="button" style="width : 64%;" class="btn btn-primary view-notification-button" data-index="${index}">View</button></td>
                          <!-- Add more columns as needed -->
                      </tr>
                  `);
                }
            });
        }
        // Add More Notification Button Click Event
        $('#addNotification').on('click', function () {
            var notificationEntryCount = $('#notificationAccordion .notificationaccordion-item')
                .length + 1;
            var newNotificationEntry = `
              <!-- Your existing notification accordion HTML goes here -->
          `;
            console.log('Adding notification entry:', notificationEntryCount);
            $('#notificationAccordion').append(newNotificationEntry);
        });
        // Update Notification Table Button Click Event
        $('#updateNotificationTable').on('click', function () {
            // Update the notification summary table
            updateNotificationSummaryTable();
        });
        // View Notification Button Click Event
        $(document).on('click', '.view-notification-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.notificationaccordion-item').eq(index);
            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });
        // Prevent the default behavior of the Add More Notification button
        $('#addNotification').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

{{-- /////// Usage Movement \\\\\ --}}

<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addAccItem').on('click', function () {
            var itemAccordionCount = $('#itemAccordion .itemAccordion-item').length + 1;
            var newItemAccordion = `
                <div class="accordion-item itemAccordion-item" id="itemEntry${itemAccordionCount}">
                    <h2 class="accordion-header" id="itemHeading${itemAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white" data-toggle="collapse" data-target="#collapseItem${itemAccordionCount}" aria-expanded="false" aria-controls="collapseItem${itemAccordionCount}">
                            Usage/Movement Entry ${itemAccordionCount}
                        </button>
                    </h2>
                    <div id="collapseItem${itemAccordionCount}" class="collapse" aria-labelledby="itemHeading${itemAccordionCount}">
                        <div class="accordion-body">
                            <input type="hidden" name="usages[${itemAccordionCount - 1}][u_id]" value="">
                          <div id="vendorDetailsContainer">

                              <div class="form-type col-lg-12 spacing-right">
                                    <div class="d-flex mt-2">
                                        <div class="col-lg-6 spacing-right">
                                            Vehicle No.  <br>  <input class="form-control" type="text" name="usages[${itemAccordionCount - 1}][usage_vehicle_no]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 spacing-left spacing-right">
                                            Average Per Liter: <br>  <input class="form-control" type="text" name="usages[${itemAccordionCount - 1}][avg_per_liter]" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>
                                  <div class="d-flex mt-2">
                                      <div class="col-md-3">
                                          Date <br> <input class="form-control" name="usages[${itemAccordionCount - 1}][date_of_m]" type="date" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-md-3">
                                          Time From <br> <input class="form-control" name="usages[${itemAccordionCount - 1}][time_from]" type="time" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-md-3">
                                          Time To  <br> <input class="form-control" name="usages[${itemAccordionCount - 1}][time_to]" type="time" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-md-3">
                                          Details Of Journey <br> <textarea class="form-control" name="usages[${itemAccordionCount - 1}][details_of_j]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                      </div>
                                  </div>
                                  <div class="d-flex mt-2">
                                      <div class="col-md-3">
                                          Purpose Of Journey<br> <input class="form-control loi-price" name="usages[${itemAccordionCount - 1}][purpose_of_j]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-md-3">
                                        Name of Officer <br> <input class="form-control" name="usages[${itemAccordionCount - 1}][name_of_officer]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-md-3">
                                        Meter Reading to <br> <input class="form-control" name="usages[${itemAccordionCount - 1}][meter_reading_to]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-md-3">
                                        Meter Reading From <br> <input class="form-control" name="usages[${itemAccordionCount - 1}][meter_reading_from]" type="text" placeholder="..." style="width: 100%;">
                                      </div>

                                  </div>
                              </div>
                              <div class="d-flex">
                                  <div class="col-md-3 spacing-left">
                                    Distance Covered <input class="form-control" type="text" name="usages[${itemAccordionCount - 1}][distance_covered]" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-md-3">
                                    Signature<br> <input class="form-control" name="usages[${itemAccordionCount - 1}][signature]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-md-3">
                                    P.O.L Drawn<br> <input class="form-control" name="usages[${itemAccordionCount - 1}][p_o_l]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-md-3">
                                    Remarks<br> <input class="form-control" name="usages[${itemAccordionCount - 1}][remarks]" type="text" placeholder="..." style="width: 100%;">
                                  </div>

                              </div>

                          </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeItemAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;
            console.log('Adding accordion item:', itemAccordionCount);
            $('#itemAccordion').append(newItemAccordion);
        });
        // Remove Accordion Button Click Event
        $(document).on('click', '.removeItemAccordion', function () {
            $(this).closest('.itemAccordion-item').remove();
        });
    });
</script>

{{-- /////// Item Accordion Summary \\\\\\\ --}}
<script>
    $(document).ready(function () {
        function updateItemSummaryTableAndCalculateSum() {
            $('#itemSummaryTable tbody').empty();
            var totalAmountSum = 0;
            $('.itemAccordion-item').each(function (index) {
                var dateOfM = $(this).find('[name="date_of_m[]"]').val();
                var nameOfOfficer = $(this).find('[name="name_of_officer[]"]').val();
                var distanceCovered = $(this).find('[name="distance_covered[]"]').val();
                var pOL = $(this).find('[name="p_o_l[]"]').val();
                if (dateOfM || nameOfOfficer || distanceCovered || pOL) {
                    $('#itemSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${dateOfM}</td>
                            <td>${nameOfOfficer}</td>
                            <td>${distanceCovered}</td>
                            <td>${pOL}</td>
                            <td><button type="button" style="width : 65%;" class="btn btn-primary view-button-1" data-target="#collapseItem${index + 1}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
            $('[name="estimated_amount_loi"]').val(totalAmountSum.toFixed(2));
        }
        $('#addToItemTable').on('click', function () {
            updateItemSummaryTableAndCalculateSum();
        });
        // View Button Click Event
        $(document).on('click', '.view-button-1', function () {
            var targetId = $(this).data('target');
            $(targetId).collapse('toggle');
        });
        // Prevent the default behavior of the Add More button
        $('#addAccItem').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

<!-- Script for renewal  -->
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addSignatory12').on('click', function () {
            var SignatoryAccordionCount12 = $('#signatoryAccordion12 .signaccordion-item12').length + 1;
            var newSignAccordion12 = `
                <div class="accordion-item signaccordion-item12" id="signatoryEntry12${SignatoryAccordionCount12}">
                    <h2 class="accordion-header" id="signatoryHeading12${SignatoryAccordionCount12}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse12${SignatoryAccordionCount12}" aria-expanded="false" aria-controls="signatoryCollapse12${SignatoryAccordionCount12}">
                            Notification Entry ${SignatoryAccordionCount12}
                        </button>
                    </h2>
                    <div id="signatoryCollapse12${SignatoryAccordionCount12}" class="collapse" aria-labelledby="signatoryHeading12${SignatoryAccordionCount12}">
                        <div class="accordion-body">
                            <input type="hidden" name="notifications[${SignatoryAccordionCount12 - 1}][n_id]" value="">
                            <div class="col-lg-12 spacing-right">
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Notification No.  <br>  <input class="form-control" type="text" name="notifications[${SignatoryAccordionCount12 - 1}][notification_no]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Notification Related to  <br>  <input class="form-control" type="text" name="notifications[${SignatoryAccordionCount12 - 1}][notification_related]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3">
                                        Notes. <br>  <textarea class="form-control" type="text" name="notifications[${SignatoryAccordionCount12 - 1}][notification_notes]" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Attachment. <br>  <input class="form-control" type="file" name="notifications[${SignatoryAccordionCount12 - 1}][notification_attach]" placeholder="..." style="width: 100%;">
                                        </div>

                                </div>
                                <h5>Notification To :</h5>
                                <div class="row">
                                    <div class="col-lg-3 spacing-right">
                                        Notification Shared with <br>  <input class="form-control" type="text" name="notifications[${SignatoryAccordionCount12 - 1}][notification_to]" placeholder="..." style="width: 100%;">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger removeSignAccordion12" type="button" style="width:10%; margin-left:13px;">
                            Remove
                        </button>
                    </div>
                </div>
            `;
            $('#signatoryAccordion12').append(newSignAccordion12);
        });
        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion12', function () {
            $(this).closest('.signaccordion-item12').remove();
        });
    });
</script>
<!-- Script for show data for renewal in table  -->
<script>
    $(document).ready(function () {
        // Function to update summary table for Vehicle entries
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable12() {
            // Clear existing rows
            $('#signatorySummaryTable12 tbody').empty();
            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item12').each(function (index) {
                var notificationNo = $(this).find('[name="notification_no[]"]').val();
                var notificationRelated = $(this).find(
                    '[name="notification_related[]"] option:selected')
                    .text(); // Retrieve selected option text
                var notificationTo = $(this).find('[name="notification_to[]"] option:selected')
                    .text(); // Retrieve selected option text
                // Check if any relevant data is entered
                if (notificationNo || notificationRelated || notificationTo) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable12 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${notificationNo}</td>
                            <td>${notificationRelated}</td>
                            <td>${notificationTo}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }
        $(document).ready(function () {
            // Add More Signatory Button Click Event
            $('#addSignatory12').on('click', function () {
                var signatoryEntryCount12 = $('#signatoryAccordion12 .signaccordion-item12')
                    .length + 1;
                var newSignatoryEntry12 = `
                    <!-- Your existing signatory accordion HTML goes here -->
                `;
                console.log('Adding signatory entry:', signatoryEntryCount12);
                $('#signatoryAccordion12').append(newSignatoryEntry12);
                // Update the signatory summary table
                updateSignatorySummaryTable12();
            });
            // Update Signatory Table Button Click Event
            $('#updateSignatoryTable12').on('click', function () {
                // Update the signatory summary table
                console.log("clicked save");
                updateSignatorySummaryTable12();
            });
            // View Signatory Button Click Event
            $(document).on('click', '.view-signatory-button', function () {
                var index = $(this).data('index');
                var accordionItem = $('.signaccordion-item12').eq(index);
                // Toggle the collapse state of the accordion item
                accordionItem.find('.collapse').collapse('toggle');
            });
            // Remove Signatory Entry Button Click Event
            $(document).on('click', '.removeSignAccordion12', function () {
                $(this).closest('.signaccordion-item12').remove();
                // Update the signatory summary table
                updateSignatorySummaryTable12();
            });
            // Prevent the default behavior of the Add More Signatory button
            $('#addSignatory12').on('click', function (event) {
                event.preventDefault();
            });
        });
    });
</script>
{{-- CREATE MODAL --}}
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Add Region Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="type" id="create_type" value="feedback_log">
                        <label class="form-label">Region</label>
                        <select name="region_id" id="create_region_id" class="form-control" required>
                            <option value="">-- Select Region --</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Branch (Admin)</label>
                        <select name="admin_id" id="create_admin_id" class="form-control" required>
                            <option value="">-- Select Branch --</option>
                            @foreach($admis as $admi)
                                <option value="{{ $admi->id }}">
                                    {{ $admi->branch_office_name }} (ID:
                                    {{ $admi->branch_id }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Employee Name</label>
                        <input type="text" name="employee_name" id="create_employee_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Designation</label>
                        <input type="text" name="designation" id="create_designation" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Of Visit</label>
                        <input type="text" name="monday" id="create_monday" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" name="created_at" id="create_created_at" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="createReportBtn" class="btn btn-primary">Save Report</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- EDIT MODAL --}}
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Region Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="editForm" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Region</label>
                        <select name="region_id" id="e_region_id" class="form-control">
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Branch</label>
                        <select name="admin_id" id="e_admin_id" class="form-control">
                            @foreach($admis as $admi)
                                <option value="{{ $admi->id }}">
                                    {{ $admi->branch_office_name }} (ID:
                                    {{ $admi->branch_id }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Employee Name</label>
                        <input type="text" name="employee_name" id="e_employee_name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Designation</label>
                        <input type="text" name="designation" id="e_designation" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>No Of Visit</label>
                        <input type="text" name="monday" id="e_monday" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="created_at" id="e_created_at" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>

{{-- CREATE MODAL --}}
<div class="modal fade" id="createModalRegionReport" tabindex="-1" aria-labelledby="createModalRegionReportLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalRegionReportLabel">Add Region
                    Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createFormRegionReport">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="type" id="create_type_region_report" value="visit_plan">
                        <label class="form-label">Region</label>
                        <select name="region_id" id="create_region_id_report" class="form-control" required>
                            <option value="">-- Select Region --</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Branch (Admin)</label>
                        <select name="admin_id" id="create_admin_id_report" class="form-control" required>
                            <option value="">-- Select Branch --</option>
                            @foreach($admis as $admi)
                                <option value="{{ $admi->id }}">
                                    {{ $admi->branch_office_name }} (ID:
                                    {{ $admi->branch_id }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Employee Name</label>
                        <input type="text" name="employee_name" id="create_employee_name_report" class="form-control"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Designation</label>
                        <input type="text" name="designation" id="create_designation_report" class="form-control"
                            required>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="date" name="created_at" id="create_created_at_report" class="form-control"
                                placeholder="date">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="createReportBtnRegionReport" class="btn btn-primary">Save Report</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- EDIT MODAL --}}
<div class="modal fade" id="editModalRegionReport" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Region Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="editFormRegionReport" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Region</label>
                        <select name="region_id" id="e_region_id_report" class="form-control">
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Branch</label>
                        <select name="admin_id" id="e_admin_id_report" class="form-control">
                            @foreach($admis as $admi)
                                <option value="{{ $admi->id }}">
                                    {{ $admi->branch_office_name }} (ID:
                                    {{ $admi->branch_id }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Employee Name</label>
                        <input type="text" name="employee_name" id="e_employee_name_report" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Designation</label>
                        <input type="text" name="designation" id="e_designation_report" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="created_at" id="e_created_at_report" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>


{{-- ================= CREATE MODAL ================= --}}
<div class="modal fade" id="createPipelineModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Add Pipeline Report</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="createPipelineForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Branch (Admin)</label>
                        <select name="admin_id" id="pipeline_create_admin_id" class="form-control" required>
                            <option value="">-- Select Branch --</option>
                            @foreach($admis as $admi)
                                <option value="{{ $admi->id }}">
                                    {{ $admi->branch_office_name }} (ID:
                                    {{ $admi->branch_id }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Region</label>
                        <select id="pipeline_create_region_id" class="form-control">
                            <option value="">-- Select Region --</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Prospect Name</label>
                        <input type="text" name="prospect_name" id="pipeline_create_prospect_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Sales Perform by</label>
                        <input type="text" name="sales_visit" id="pipeline_create_sales_visit" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Number of Technical Proposal Sent</label>
                        <input type="text" name="proposal_sent" id="pipeline_create_proposal_sent" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Number of Quotation Sent</label>
                        <input type="text" name="quotation_sent" id="pipeline_create_quotation_sent"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Required Services</label>
                        <input type="text" name="required_services" id="pipeline_create_required_services"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Remarks</label>
                        <input type="text" name="remarks" id="pipeline_create_remarks" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" id="pipelineCreateBtn" class="btn btn-primary">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>

{{-- ================= EDIT MODAL ================= --}}
<div class="modal fade" id="editPipelineModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Edit Pipeline Report</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="editPipelineForm">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Branch</label>
                        <select name="admin_id" id="pipeline_edit_admin_id" class="form-control">
                            @foreach($admis as $admi)
                                <option value="{{ $admi->id }}">
                                    {{ $admi->branch_office_name }} (ID:
                                    {{ $admi->branch_id }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Region</label>
                        <select id="pipeline_edit_region_id" class="form-control">
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Prospect Name</label>
                        <input type="text" name="prospect_name" id="pipeline_edit_prospect_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Sales Perform by</label>
                        <input type="text" name="sales_visit" id="pipeline_edit_sales_visit" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Number of Technical Proposal Sent</label>
                        <input type="text" name="proposal_sent" id="pipeline_edit_proposal_sent" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Number of Quotation Sent</label>
                        <input type="text" name="quotation_sent" id="pipeline_edit_quotation_sent" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Required Services</label>
                        <input type="text" name="required_services" id="pipeline_edit_required_services"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Remarks</label>
                        <input type="text" name="remarks" id="pipeline_edit_remarks" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>


{{-- CREATE MODAL --}}
<div class="modal fade" id="createVisitPipelineModal" tabindex="-1" aria-labelledby="createVisitPipelineModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createVisitPipelineModalLabel">Add Visit
                    Pipeline Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createVisitPipelineForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Customer Name</label>
                        <input type="text" name="customer_name" id="vp_create_customer_name" class="form-control"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Branch Name</label>
                        <select name="admin_id" id="vp_create_admin_id" class="form-control" required>
                            <option value="">-- Select Branch --</option>
                            @foreach($admis as $admi)
                                <option value="{{ $admi->id }}">
                                    {{ $admi->branch_office_name }} (ID: {{ $admi->branch_id }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Region Name</label>
                        <select name="region_id" id="vp_create_region_id" class="form-control" required>
                            <option value="">-- Select Region --</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sales Perform by</label>
                        <input type="text" name="sales_visit" id="vp_create_sales_visit" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Number of Technical Proposal Send</label>
                        <input type="text" name="proposal_sent" id="vp_create_proposal_sent" class="form-control"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Number of Quotation Shared</label>
                        <input type="text" name="quotation_sent" id="vp_create_quotation_sent" class="form-control"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Number Of Guard Deployed</label>
                        <input type="text" name="guard_deployed_by_ho" id="vp_create_guard_deployed"
                            class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contractual Value</label>
                        <input type="text" name="contractual_value" id="vp_create_contractual_value"
                            class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total Margin</label>
                        <input type="text" name="total_margin" id="vp_create_total_margin" class="form-control"
                            required>
                    </div>
                     <div class="mb-3">
                        <label class="form-label">Date of Deployment</label>
                        <input type="date" name="created_at" id="vp_create_created_at" class="form-control"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="vp_createReportBtn" class="btn btn-primary">Save Report</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- EDIT MODAL --}}
<div class="modal fade" id="editVisitPipelineModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Visit Pipeline Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="editVisitPipelineForm" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Customer Name</label>
                        <input type="text" name="customer_name" id="vp_e_customer_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Branch Name</label>
                        <select name="admin_id" id="vp_e_admin_id" class="form-control">
                            @foreach($admis as $admi)
                                <option value="{{ $admi->id }}">
                                    {{ $admi->branch_office_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Region Name</label>
                        <select name="region_id" id="vp_e_region_id" class="form-control">
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Sales Perform by</label>
                        <input type="text" name="sales_visit" id="vp_e_sales_visit" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Number of Technical Proposal Sent</label>
                        <input type="text" name="proposal_sent" id="vp_e_proposal_sent" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Number of Quotation Shared</label>
                        <input type="text" name="quotation_sent" id="vp_e_quotation_sent" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Number Of Guard Deployed</label>
                        <input type="text" name="guard_deployed_by_ho" id="vp_e_guard_deployed" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Contractual Value</label>
                        <input type="text" name="contractual_value" id="vp_e_contractual_value" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Total Margin</label>
                        <input type="text" name="total_margin" id="vp_e_total_margin" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Date of Deployment</label>
                        <input type="date" name="created_at" id="vp_e_created_at" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>


</html>