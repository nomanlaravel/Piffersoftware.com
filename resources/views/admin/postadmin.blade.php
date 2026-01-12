@include('layouts.header')
@yield('main')
<!--End of the Navbar-->
<div class="customer_form">
  <div id="main" style="margin-left: 92%;"> <button class="openbtn" onclick="openNav()">☰</button> </div>
  <div id="mySidebar" class="sidebar admin-setting"> <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a> <a href="#"> <i
        class="bi bi-person-check-fill mr-2"></i> Update Profile</a> <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers
      Administration Setting</a> <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
    <hr> <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
  </div>
  <!--Popup model for User new entry-->
  <!-- <div class="modal fade" id="add_user"> -->
  <!-- <div class="modal-dialog" role="document" style="max-width: 75%;"> -->
  <!-- <div class="modal-content"> -->
  <!--<div class="modal-header border-0">-->
  <!--   <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin-left : -18px;"> Office Details </h4>-->
  <!--</div> -->
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
    <form action="{{ route('submitadmin')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">

        <div class="row mb-2" style="margin-left: 20px;">
          <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
            <h5 style="margin-right: 5%;">Office Activation Status</h5>

            <div class="form-check form-check-inline" style="margin-right: 90px;">
              <input class="form-check-input mr-2" type="radio" name="office_activation" value="1" id="activeRadio">
              <label class="form-check-label" for="activeRadio">Active</label>

              <input class="form-check-input ml-3 mr-2" type="radio" name="office_activation" value="0" id="inactiveRadio">
              <label class="form-check-label" for="inactiveRadio">Inactive</label>
            </div>
          </div>
        </div>

      </div>
      <div class=" row main-content div">
        <div class="col-lg-12">
          <div class="row mb-2">
            <div class="col-lg-3 spacing-right"> <label for="branch_office_name" class="form_control mb-1 w-100">Office Name</label> <input id="branch_office"
                value="" name="branch_office_name" type="text" class="form-control mt-1 branch_office" aria-="true" aria-invalid="false" style="width: 100%;" />
            </div>
            <div class="col-lg-3 spacing-right"> <label for="branch_type" class="form_control mb-1">Type</label> <select
                class="browser-default form-control mt-1" name="branch_type" id="branch_type" style="width: 100%;">
                <option value=""></option>
                <option value="Regional Head Quater">Regional Head Quarter</option>
                <option value="Head Office">Head Office</option>
                <option value="Branch">Branch</option>
                <option value="Other">Other</option>
              </select>
              <div class="mt-0"></div>
            </div>
            <div class="col-lg-3 spacing-right"> <label for="branch_office_code" class="form_control mb-1">Branch ID</label> <input id="branch_office_code"
                value="" name="branch_id" type="text" class="form-control mt-1 branch_office_code" aria-="true" aria-invalid="false" style="width: 100%;" />
              <div class="mt-0"></div>
            </div>
            <div class="col-lg-3 spacing-right form-group"> Branch Reporting to <br>
              <div class="input-group" style="width: 100%;"> <select id="applicable_compliances" class="form-control mt-1" name="branch_category[]"
                  style="width: 70%; border-radius: 4px 0 0 4px; ">
                  <option value=""></option>
                  @foreach($reportings as $reporting )
                  <option value="{{ $reporting->reporting_branch_name }}">{{ $reporting->reporting_branch_name }}</option>
                  @endforeach
                </select>
                <div class="input-group-append" style="width: 30%;"> <a href="{{ route('reporting') }}"> <button class="btn btn-primary" id="submit-category"
                      type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button> </a> </div>
              </div>
            </div>
            <div class="col-lg-3 spacing-right"> Branch Reporting to <br />
              <div class="input-group" style="width: 100%;">
                <select id="category" class="form-control mt-1" name="branch_category" style="width: 70%; border-radius: 4px 0 0 4px;">
                  <option value=""></option>
                  <option value="Head Office(001)">Head Office(001)</option>
                  <option value="RHQ North 1(051)">RHQ North 1(051)</option>
                  <option value="RHQ North 2(091)">RHQ North 2(091)</option>
                  <option value="RHQ Central 1(042)">RHQ Central 1(042)</option>
                  <option value="RHQ Central 2(0423)">RHQ Central 2(0423)</option>
                  <option value="RHQ South(021)">RHQ South(021)</option>
                </select>
                {{-- <button class="btn btn-primary" id="submit-category" type="button" style="width: 30%; margin-top: 4px; height: 38px; border-radius: 0 4px 4px 0;">Add</button> --}}
              </div>
            </div>
            <div class="col-lg-3 spacing-right"> <label for="branch_office_code" class="form_control mb-1">PTCL No</label> <input id="branch_office_code"
                value="" name="branch_ptcl" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" />
              <div class="mt-0"></div>
            </div>
          </div>
          <h5><strong>Management Details :</strong></h5>
          <div class="row">
            <div class="col-lg-3 spacing-right">
              <label for="branch_office_name" class="form_control mb-1 w-100">GM Name</label>
              <input id="branch_office_name" value="" name="gm_name" type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                style="width: 100%;" />
            </div>
            <div class="col-lg-3 spacing-right">
              <label for="branch_office_name" class="form_control mb-1 w-100">GM Cell No.</label>
              <input id="branch_office_name" value="" name="gm_cell" type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                style="width: 100%;" />
            </div>
            <div class="col-lg-3 spacing-right">
              <label for="branch_office_name" class="form_control mb-1 w-100">GM Email</label>
              <input id="branch_office_name" value="" name="gm_email" type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                style="width: 100%;" />
            </div>
            <div class="col-lg-3 spacing-right">
              <label for="branch_office_name" class="form_control mb-1 w-100">DGM Name</label>
              <input id="branch_office_name" value="" name="dgm_name" type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                style="width: 100%;" />
            </div>
            <div class="col-lg-3 spacing-right">
              <label for="branch_office_name" class="form_control mb-1 w-100">DGM Cell No.</label>
              <input id="branch_office_name" value="" name="dgm_cell" type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                style="width: 100%;" />
            </div>
            <div class="col-lg-3 spacing-right ">
    <label for="branch_office_name" class="form_control mb-1 w-100">CRO Name</label>
    <div class="input-group" style="width: 100%;">
        <select id="cro_select" class="form-control mt-1" name="cro_name"
            style="width: 70%; border-radius: 4px 0 0 4px;">
            <option value="">Select CRO</option>
            @foreach($cros as $cro)
                <option value="{{ $cro->name }}" data-phone="{{ $cro->phone }}">
                    {{ $cro->name }}
                </option>
            @endforeach
        </select>
        <div class="input-group-append" style="width: 30%;">
            <a href="{{ route('all.cros') }}">
                <button class="btn btn-primary" id="submit-category"
                    type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">
                    Add
                </button>
            </a>
        </div>
    </div>
</div>

<div class="col-lg-3 spacing-right">
    <label for="cro_cell" class="form_control mb-1 w-100">CRO Cell No.</label>
    <input id="cro_cell" name="cro_cell" type="text" class="form-control mt-1"
        style="width: 100%;" readonly />
</div>


            <div class="col-lg-3 spacing-right">
              <label for="cro_ptcl" class="form_control mb-1 w-100">PTCL No.</label>
              <input id="cro_ptcl" value="" name="cro_ptcl" type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                style="width: 100%;" />
            </div>
          </div>
          <h5><strong>Branch Address Details :</strong></h5>
          <div class="row">
            <div class="col-lg-3 spacing-right">
              <label for="branch_office_name" class="form_control mb-1 w-100">Office No.</label>
              <input id="branch_office_name" value="" name="branch_office_no" type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                style="width: 100%;" />
            </div>
            <div class="col-lg-3 spacing-right">
              <label for="branch_office_name" class="form_control mb-1 w-100">Building</label>
              <input id="branch_office_name" value="" name="branch_building" type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                style="width: 100%;" />
            </div>
            <div class="col-lg-3 spacing-right">
              <label for="branch_office_name" class="form_control mb-1 w-100">Block</label>
              <input id="branch_office_name" value="" name="branch_block" type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                style="width: 100%;" />
            </div>
            <div class="col-lg-3 spacing-right">
              <label for="branch_office_name" class="form_control mb-1 w-100">Area</label>
              <input id="branch_office_name" value="" name="branch_area" type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                style="width: 100%;" />
            </div>
            <div class="col-lg-3 spacing-right">
              <label for="branch_office_name" class="form_control mb-1 w-100">City</label>
              <input id="branch_office_name" value="" name="branch_city" type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                style="width: 100%;" />
            </div>
            <div class="col-lg-3 spacing-right">
              <label for="branch_office_name" class="form_control mb-1 w-100">Photograph of Building</label>
              <input id="branch_office_name" value="" name="branch_photo" type="file" class="form-control mt-1" aria-="true" aria-invalid="false"
                style="width: 100%;" />
            </div>
            <div class="col-lg-3 spacing-right">
              <label for="branch_office_name" class="form_control mb-1 w-100">Pin Location</label>
              <input id="branch_office_name" value="" name="branch_pin" type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                style="width: 100%;" />
            </div>
            <div class="col-lg-3 spacing-right">
              <label for="branch_office_name" class="form_control mb-1 w-100">GPS</label>
              <input id="branch_office_name" value="" name="branch_gps" type="text" class="form-control mt-1" aria-="true" aria-invalid="false"
                style="width: 100%;" />
            </div>
          </div>
        </div>
      </div>
      <!--Tabs forDetails-->
      <nav>
        <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#report" role="tab" aria-controls="nav-home" aria-selected="true">Daily
            Branch Report</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#office" role="tab" aria-controls="nav-profile" aria-selected="false">Office
            Inventory</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#branding" role="tab" aria-controls="nav-profile"
            aria-selected="false">Office Branding</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#moveable" role="tab" aria-controls="nav-profile"
            aria-selected="false">Moveable Assets</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#notification" role="tab" aria-controls="nav-profile"
            aria-selected="false">Notifications</a>
        </div>
      </nav>
      <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
        <!--Dialy Branch Report-->
        <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="report" role="tabpanel" aria-labelledby="nav-home-tab">
          <!-- add more consultant -->
          <div class="container my-1">
            <div class="accordion" id="signatoryAccordion10">
              <!-- Initial Accordion Item -->
              <div class="accordion-item signaccordion-item10" id="signatoryEntry10">
                <h2 class="accordion-header" id="signatoryHeading10" style="color: white"> <button class="accordion-button"
                    style="background-color: #34005A; color:white" type="button" data-toggle="collapse" data-target="#signatoryCollapse10" aria-expanded="false"
                    aria-controls="signatoryCollapse10"> Report Entry 1 </button> </h2>
                <div id="signatoryCollapse10" class="collapse" aria-labelledby="signatoryHeading10">
                  <div class="accordion-body">
                    <!-- Your content for signatory entry goes here -->
                    <div class="row mb-2" id="signatoryDetailsContainer10">
                      <div class="col-lg-12" id="consultant_add_fields">
                        <div class="row mb-2">
                          <div class="col-lg-4 spacing-left"> Date <br> <input class="form-control" id="" name="report_date[]" type="date" placeholder="..."
                              style="width: 103%;"> </div>
                          <div class="col-lg-4 spacing-left spacing-right"> Branch Name <br> <input class="form-control report_branch" id="" name="branch[]"
                              type="text" placeholder="..." style="width: 97%;"> </div>
                          <div class="col-lg-4 spacing-right"> Branch ID <br> <input class="form-control report_branch_id" id="" name="site_id[]" type="text"
                              placeholder="..." style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-left"> Location <br> <input class="form-control" id="" name="location[]" type="text" placeholder="..."
                              style="width: 103%;"> </div>
                          <div class="col-lg-4 spacing-right"> Authorized Guards <br> <input class="form-control" id="" name="auth_guards[]" type="text"
                              placeholder="..." style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-left"> Army <br> <input class="form-control" id="" name="army[]" type="text" placeholder="..."
                              style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-left"> SSG <br> <input class="form-control" id="" name="ssg[]" type="text" placeholder="..."
                              style="width: 103%;"> </div>
                        </div>
                        <div class=" row mb-2">
                          <div class="col-lg-4 spacing-right"> Civil <br> <input class="form-control" id="" name="civil[]" type="text" placeholder="..."
                              style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-left spacing-right"> Absentees <br> <input class="form-control" id="" name="absente[]" type="text"
                              placeholder="..." style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-left spacing-right"> Leave <br> <input class="form-control" id="" name="leave[]" type="text"
                              placeholder="..." style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-right"> Reason <br> <input class="form-control" id="" name="reason[]" type="text" placeholder="..."
                              style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-left spacing-right"> Reliver Provided <br> <input class="form-control" id="" name="r_provided[]"
                              type="text" placeholder="..." style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-left spacing-right"> Last Complaint Date <br> <input class="form-control" id="" name="last_comp_date[]"
                              type="date" placeholder="..." style="width: 100%;"> </div>
                        </div>
                        <div class=" row mb-2">
                          <div class="col-lg-4 spacing-right"> Any Incident & Report No <br> <input class="form-control" id="" name="any_inc[]" type="text"
                              placeholder="..." style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-right"> Pending Nadra Versys <br> <input class="form-control" id="" name="pending_nadra[]" type="text"
                              placeholder="..." style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-left spacing-right"> Unsent DPO Reports <br> <input class="form-control" id="" name="unsent_dpo_rep[]"
                              type="text" placeholder="..." style="width: 100%;"></input> </div>
                          <div class="col-lg-4 spacing-left spacing-right"> No. of resigns <br> <input class="form-control" id="" name="no_of_resigns[]"
                              type="text" placeholder="..." style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-right"> Guards without bank started <br> <input class="form-control" id="" name="guards_wout_bank[]"
                              type="text" placeholder="..." style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-left spacing-right"> Any new Site Started <br> <input class="form-control" id="" name="any_new_site[]"
                              type="text" placeholder="..." style="width: 100%;"> </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-4 spacing-left spacing-right"> No. of Guards of New Site <br> <input class="form-control" id=""
                              name="no_of_guards[]" type="text" placeholder="..." style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-left spacing-right"> Any Site Closed <br> <input class="form-control" id="" name="any_site_closed[]"
                              type="text" placeholder="..." style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-left spacing-right"> No of Guards of Closed Site <br> <input class="form-control" id=""
                              name="no_of_guards_of_closed_site[]" type="text" placeholder="..." style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-right"> Details of Escort Duties <br> <textarea class="form-control" id="" name="escort_duties[]"
                              type="text" placeholder="..." style="width: 100%;"></textarea> </div>
                          <div class="col-lg-4 spacing-right"> Details of Events <br> <textarea class="form-control" id="" name="event_details[]" type="text"
                              placeholder="..." style="width: 100%;"></textarea> </div>
                          <div class="col-lg-4 spacing-left spacing-right"> Amount of pending Recoveries <br> <input class="form-control" id=""
                              name="pending_recoveries[]" type="text" placeholder="..." style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-left spacing-right"> Signature of Manager Accounts <br> <input class="form-control" id=""
                              name="sign_manager[]" type="text" placeholder="..." style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-right"> Any staff on annual leave <br> <input class="form-control" id="" name="staff_on_leav[]"
                              type="text" placeholder="..." style="width: 100%;"> </div>
                          <div class="col-lg-4 spacing-left spacing-right"> Any short leave of staff with Name <br> <input class="form-control" id=""
                              name="short_leav[]" type="text" placeholder="..." style="width: 100%;"> </div>
                        </div>
                        <h5>Checklist :</h5>
                        <div class=" row mb-2">
                          <div class="col-lg-4 spacing-right">
                            Utility Bills Paid <br>
                            <select id="staff_category" class="form-control" name="utility_bills[]" style="width: 100%;">
                              <option value=""></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Bio Matric Working <br>
                            <select id="staff_category" class="form-control" name="bio_matric[]" style="width: 100%;">
                              <option value=""></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Bio Register Maintained <br>
                            <select id="staff_category" class="form-control" name="bio_register[]" style="width: 100%;">
                              <option value=""></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Office Rent Paid <br>
                            <select id="staff_category" class="form-control" name="office_rent[]" style="width: 100%;">
                              <option value=""></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div class="col-lg-4 spacing-right">
                            UPS Working <br>
                            <select id="staff_category" class="form-control" name="ups[]" style="width: 100%;">
                              <option value=""></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Guard File Maintained <br>
                            <select id="staff_category" class="form-control" name="guard_file[]" style="width: 100%;">
                              <option value=""></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Guard Accomodation Rent Paid <br>
                            <select id="staff_category" class="form-control" name="guard_accomodation[]" style="width: 100%;">
                              <option value=""></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Any Maintainance Required <br>
                            <select id="staff_category" class="form-control" name="any_maintainence[]" style="width: 100%;">
                              <option value=""></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Weapon Register Maintained <br>
                            <select id="staff_category" class="form-control" name="weapon_register[]" style="width: 100%;">
                              <option value=""></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div class="col-lg-4 spacing-right">
                            CCTV Working <br>
                            <select id="staff_category" class="form-control" name="cctv[]" style="width: 100%;">
                              <option value=""></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Attendance Register Maintained <br>
                            <select id="staff_category" class="form-control" name="attendance_register[]" style="width: 100%;">
                              <option value=""></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Kote Register Maintained <br>
                            <select id="staff_category" class="form-control" name="kote_register[]" style="width: 100%;">
                              <option value=""></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- Add More and Remove Buttons -->
            <div class="row my-3">
              <div class="col"> <button type="button" class="btn btn-primary" id="addSignatory10" style="height:30px; width:150px;">Add More </button> </div>
              <button type="button" class="btn btn-primary" id="updateSignatoryTable10">Save</button>
            </div>
          </div>
          <table class="table table-bordered mt-1" id="signatorySummaryTable10">
            <thead>
              <tr>
                <th>Entry</th>
                <th>Branch ID</th>
                <th>Branch</th>
                <th>Location</th>
                <th>Guards</th>
                <th>Army</th>
                <th>SSG</th>
                <th>View</th> <!-- Add more columns as needed -->
              </tr>
            </thead>
            <tbody>
              <!-- Summary data will be added here dynamically -->
            </tbody>
          </table>
        </div>
        {{-- Office Inventory --}}
        <div class="tab-pane fade m-3" style="opacity: 90%;" id="office" role="tabpanel" aria-labelledby="nav-home-tab">
          <!-- add more Issuing Authority -->
          <div class="container my-1">
            <div class="accordion" id="signatoryAccordion11">
              <!-- Initial Accordion Item -->
              <div class="accordion-item signaccordion-item11" id="signatoryEntry11">
                <h2 class="accordion-header" id="signatoryHeading11" style="color: white"> <button class="accordion-button"
                    style="background-color: #34005A; color:white" type="button" data-toggle="collapse" data-target="#signatoryCollapse11" aria-expanded="false"
                    aria-controls="signatoryCollapse11"> Office Equipment 1 </button> </h2>
                <div id="signatoryCollapse11" class="collapse" aria-labelledby="signatoryHeading11">
                  <div class="accordion-body">
                    <!-- Your content for signatory entry goes here -->
                    <div class="col-lg-12" id="authority_add_fields">
                      <div class="row mb-2">
                        <div class="col-lg-4 spacing-right form-group"> Equipment Name <br>
                          <div class="input-group" style="width: 100%;"> <select id="applicable_compliances" class="form-control mt-1" name="category[]"
                              style="width: 70%; border-radius: 4px 0 0 4px; ">
                              <option value=""></option>
                              @foreach($adminequipments as $adminequipment )
                              <option value="{{ $adminequipment->adminequipment_name }}">{{ $adminequipment->adminequipment_name }}</option>
                              @endforeach
                            </select>
                            <div class="input-group-append" style="width: 30%;"> <a href="{{ route('adminequipments') }}"> <button class="btn btn-primary"
                                  id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                              </a> </div>
                          </div>
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right"> Quantity <br> <input class="form-control" id="" name="quantity[]" type="text"
                            placeholder="..." style="width: 100%;"> </div>
                        <div class="col-lg-4 spacing-right"> Notes <br> <textarea class="form-control" id="" name="notes[]" type="text" placeholder="..."
                            style="width: 100%;"></textarea> </div>
                        <div class="col-lg-4 spacing-right"> Attachments <br> <input class="form-control" id="" name="attachments[]" type="file"
                            placeholder="..." style="width: 90%;"> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- Add More and Remove Buttons -->
            <div class="row my-3">
              <div class="col"> <button type="button" class="btn btn-primary" id="addSignatory11" style="height:30px; width:150px;">Add More </button> </div>
              <button type="button" class="btn btn-primary" id="updateSignatoryTable11">Save</button>
            </div>
          </div>
          <table class="table table-bordered mt-1" id="signatorySummaryTable11">
            <thead>
              <tr>
                <th>Entry</th>
                <th>Equipment Name</th>
                <th>Quantity</th>
                <th>Notes</th>
                <th>View</th> <!-- Add more columns as needed -->
              </tr>
            </thead>
            <tbody>
              <!-- Summary data will be added here dynamically -->
            </tbody>
          </table>
        </div>
        {{-- Office Branding --}}
        <div class="tab-pane fade m-3" style="opacity: 90%;" id="branding" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="container my-1" id="inspectionContainer">
            <div class="accordion" id="inspectionAccordion">
              <!-- Initial Accordion Item -->
              <div class="accordion-item inspectionaccordion-item" id="inspectionEntry1">
                <h2 class="accordion-header" id="inspectionHeading1" style="color: white">
                  <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse"
                    data-target="#inspectionCollapse1" aria-expanded="false" aria-controls="inspectionCollapse1">
                    Office Branding Entry 1
                  </button>
                </h2>
                <div id="inspectionCollapse1" class="collapse" aria-labelledby="inspectionHeading1">
                  <div class="accordion-body">
                    <div id="inspectionDiv">
                      <div id="inspectionInfo">
                        <div class="row mb-2">
                          <div class="col-lg-4 spacing-right">
                            Branding Type <br> <input class="form-control" type="text" name="b_type[]" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Picture of Branding <br> <input class="form-control" type="file" name="picture_of_b[]" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Site of Branding. <br> <input class="form-control" type="text" name="site_of_b[]" placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-4 spacing-right">
                            Branding Cost <br> <input class="form-control" type="text" name="cost_of_b[]" placeholder="" style="width: 100%;">
                            <div id="phoneError" class="error-message-phone" style="color: red"></div>
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Periodical Maintenance <br>
                            <select class="form-control" name="periodical_m[]" id="periodicalMaintenance" style="width: 100%;"
                              onchange="toggleMaintenanceDateInput()">
                              <option value=""></option>
                              <option value="yes">Yes</option>
                              <option value="no">No</option>
                            </select>
                          </div>

                          <div class="col-lg-4 spacing-right" id="maintenanceDateField" style="display: none;">
                            Maintenance Date <br>
                            <input class="form-control" type="text" name="maintenance_date[]" placeholder="..." style="width: 100%;">
                          </div>

                        </div>
                        <div class="row mb-2">
                          <h5>Details of Vendor</h5>
                          <div class="col-lg-3 spacing-left">
                            Vendor ID/No. <br> <input class="form-control" type="text" name="vendor_id[]" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                            Vendor Name<br> <input class="form-control" id="inpFile2" type="text" name="v_name[]" placeholder="..."
                              style="width: 100%;"></textarea>
                          </div>
                          <div class="col-lg-3 spacing-left">
                            Vendor Cell Number. <br> <input class="form-control" type="text" name="v_cell[]" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                            Office Number<br> <input class="form-control" id="inpFile2" type="text" name="v_office[]" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left">
                            Floor <br> <input class="form-control" type="text" name="v_floor[]" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                            Building<br> <input class="form-control" id="inpFile2" type="text" name="v_building[]" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left">
                            Block <br> <input class="form-control" type="text" name="v_block[]" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                            Area <br> <input class="form-control" id="inpFile2" type="text" name="v_area[]" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left">
                            City <br> <input class="form-control" type="text" name="v_city[]" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                            Photograph of Building<br> <input class="form-control" id="inpFile2" type="text" name="v_photo_b[]" placeholder="..."
                              style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left">
                            Pin Location <br> <input class="form-control" type="text" name="v_pin[]" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                            Notes<br> <textarea class="form-control" id="inpFile2" type="text" name="v_notes[]" placeholder="..."
                              style="width: 100%;"></textarea>
                          </div>
                          <div class="col-lg-3 spacing-left">
                            Attachments <br> <input class="form-control" type="file" name="v_attach[]" placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Add More and Remove Buttons -->
            <div class="row my-3">
              <div class="col">
                <button type="button" class="btn btn-primary" id="addInspection" style="height:30px; width:150px;">Add More</button>
              </div>
              <button type="button" class="btn btn-primary" id="updateInspectionTable">Save</button>

            </div>

            <table class="table table-bordered mt-3" id="inspectionSummaryTable">
              <thead>
                <tr>
                  <th>Entry</th>
                  <th>Bradning Type</th>
                  <th>Site Of Branding</th>
                  <th>Branding Cost</th>
                  <th>View</th>

                  <!-- Add more columns as needed -->
                </tr>
              </thead>
              <tbody>
                <!-- Summary data will be added here dynamically -->
              </tbody>
            </table>
          </div>
        </div>
        {{-- MoveAble Assets --}}
        <div class="tab-pane fade m-3" style="opacity: 90%;" id="moveable" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="row">
            <div class="container my-1">
              <div class="accordion" id="signatoryAccordion13">
                <!-- Initial Accordion Item -->
                <div class="accordion-item signaccordion-item13" id="signatoryEntry13">
                  <h2 class="accordion-header" id="signatoryHeading13" style="color: white"> <button class="accordion-button"
                      style="background-color: #34005A; color:white" type="button" data-toggle="collapse" data-target="#signatoryCollapse13"
                      aria-expanded="false" aria-controls="signatoryCollapse13"> Vehicle Entry 1 </button> </h2>
                  <div id="signatoryCollapse13" class="collapse" aria-labelledby="signatoryHeading13">
                    <div class="accordion-body">
                      <div class="col-lg-12">
                        <div class="row mb-2">
                          <div class="col-lg-3 spacing-left spacing-right">
                            Type of Vehicle <br>
                            <select id="staff_category" class="form-control" name="type_of_vehicle[]" style="width: 100%;">
                              <option value=""></option>
                              <option value="Car">Car</option>
                              <option value="Bike">Bike</option>
                            </select>
                          </div>
                          <div class="col-lg-3 spacing-left spacing-right">
                            Vehicle No <br> <input class="form-control" name="vehicle_no[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left spacing-right">
                            Vehicle Model <br> <input class="form-control" name="vehicle_model[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                            Vehicle Picture <br> <input class="form-control" name="vehicle_pic[]" type="file" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left spacing-right">
                            Vehicle Book Picture <br> <input class="form-control" name="vehicle_book_pic[]" type="file" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left">
                            Payment Type <br> <input class="form-control" name="payment_type[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left spacing-right">
                            Vehicle Name <br> <input class="form-control" name="vehicle_name[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left spacing-right">
                            Engine No. <br> <input class="form-control" name="engine_no[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                            Chasis No. <br> <input class="form-control" name="chasis_no[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left spacing-right">
                            Vehicle Color <br> <input class="form-control" name="vehicle_color[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- Add More and Remove Buttons -->
              <div class="row my-3">
                <div class="col"> <button type="button" class="btn btn-primary" id="addSignatory13" style="height:30px; width:150px;">Add More </button> </div>
                <button type="button" class="btn btn-primary" id="updateSignatoryTable13">Save</button>
              </div>
            </div>
            <table class="table table-bordered mt-1" id="signatorySummaryTable13">
              <thead>
                <tr>
                  <th>Entry</th>
                  <th>Vehicle Type</th>
                  <th>Vehicle Number</th>
                  <th>Vehicle Model</th>
                  <th>View</th> <!-- Add more columns as needed -->
                </tr>
              </thead>
              <tbody>
                <!-- Summary data will be added here dynamically -->
              </tbody>
            </table>

          </div>
          <ul class="nav nav-tabs" id="moveable-sub-tabs" role="tablist" style="margin-top: 20px;">
            <li class="nav-item">
              <a class="nav-link active" id="vehicle-tab" data-toggle="tab" href="#vehicle" role="tab" aria-controls="vehicle" aria-selected="true">Vehicle
                Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="insurrance-tab" data-toggle="tab" href="#insurrance" role="tab" aria-controls="bike" aria-selected="false">Insurance
                Copmany Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tracker-tab" data-toggle="tab" href="#tracker" role="tab" aria-controls="tracker" aria-selected="false">Tracker Copmany
                Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="repair-tab" data-toggle="tab" href="#repair" role="tab" aria-controls="repair" aria-selected="false">Repair &
                Maintenance</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="usage-tab" data-toggle="tab" href="#usage" role="tab" aria-controls="usage" aria-selected="false">Usage/Movement</a>
            </li>
          </ul>

          <div class="tab-content" id="moveable-sub-tab-content">
            <div class="tab-pane fade show active" id="vehicle" role="tabpanel" aria-labelledby="vehicle-tab">
              <!-- Car Form Content -->
              <!-- Modify this area to include the form fields related to cars -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="container  my-1" id="armourContainer">
                    <div class="accordion" id="armourAccordion">
                      <!-- Initial Accordion Item -->
                      <div class="accordion-item armouraccordion-item" id="armourEntry1">
                        <h2 class="accordion-header" id="armourHeading1" style="color: white">
                          <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse"
                            data-target="#armourCollapse1" aria-expanded="false" aria-controls="armourCollapse1">
                            Token Entry 1
                          </button>
                        </h2>
                        <div id="armourCollapse1" class="collapse" aria-labelledby="armourHeading1">
                          <div class="accordion-body">
                            <div id="cleaningInfo">
                              <div class="row col-lg-12">
                                <div class="col-lg-4 spacing-right">
                                  Amount Paid <br> <input class="form-control" type="text" name="amount_paid[]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                  Type of Payment <br>
                                  <select id="staff_category" class="form-control" name="type_of_payment[]" style="width: 100%;">
                                    <option value=""></option>
                                    <option value="Cash">Cash</option>
                                    <option value="Cheque">Cheque</option>
                                  </select>
                                </div>
                                <div class="col-lg-4 spacing-right">
                                  Instrument Number <br> <input class="form-control" type="text" name="ins_no[]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                  Voucher No. <br> <input class="form-control" type="text" name="voucher_no[]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                  Payment Date <br> <input class="form-control" type="date" name="payment_date[]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                  Notes <br> <textarea class="form-control" type="text" name="token_note[]" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-4 spacing-right">
                                  Attachment <br> <input class="form-control" type="file" name="token_attach[]" placeholder="..." style="width: 100%;">
                                </div>
                              </div>


                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Add More and Remove Buttons -->
                    <div class="row my-3">
                      <div class="col">
                        <button type="button" class="btn btn-primary" id="addArmour" style="height:30px; width:150px;">Add More</button>
                      </div>
                      <button type="button" class="btn btn-primary" id="updateArmourTable" style="height:30px; width:150px;">Save</button>
                    </div>
                  </div>
                  <div class="col-lg-4 spacing-right">
                    Next Token Payment Date <br> <input class="form-control" type="text" name="next_payment_date[]" placeholder="alert" style="width: 100%;">
                  </div>
                  <table class="table table-bordered mt-3" id="armourSummaryTable">
                    <thead>
                      <tr>
                        <th>Entry</th>
                        <th>Amount Paid</th>
                        <th>Type of Payment</th>
                        <th>Voucher No.</th>
                        <th>Payment Date</th>
                        <th>View</th>
                        <!-- Add more columns as needed -->
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Summary data will be added here dynamically -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            {{-- Insurrance Company Tab --}}
            <div class="tab-pane fade" id="insurrance" role="tabpanel" aria-labelledby="insurrance-tab">
              <!-- Bike Form Content -->
              <!-- Modify this area to include the form fields related to bikes -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="container  my-1" id="auditContainer">
                    <div class="accordion" id="auditAccordion">
                      <!-- Initial Accordion Item -->
                      <div class="accordion-item auditaccordion-item" id="auditEntry1">
                        <h2 class="accordion-header" id="auditHeading1" style="color: white">
                          <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse"
                            data-target="#auditCollapse1" aria-expanded="false" aria-controls="auditCollapse1">
                            Insurance Company Details Entry 1
                          </button>
                        </h2>
                        <div id="auditCollapse1" class="collapse" aria-labelledby="auditHeading1">
                          <div class="accordion-body">
                            <div class=" row main-content div" id="auditsInfo">
                              <div class="col-lg-12">
                                <h5>POC :</h5>
                                <div class="row mb-2">
                                  <div class="col-lg-3 spacing-right">
                                    Company Name : <br> <input class="form-control" name="company_name[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                    Name <br> <input class="form-control" name="i_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                    Web <br> <input class="form-control" name="i_poc_web[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                    Email <br> <input class="form-control" name="i_poc_email[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                    Cell Number : <br> <input class="form-control" name="i_poc_cell[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                    Value of Sum Insured <br> <input class="form-control" name="value_of_sum[]" type="text" placeholder="..."
                                      style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                    Insurance Policy Attachment <br> <input class="form-control" name="ins_p_pic[]" type="file" placeholder="..."
                                      style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                    Certificate of Insurrance <br> <input class="form-control" name="c_of_ins[]" type="file" placeholder="..."
                                      style="width: 100%;">
                                  </div>
                                  <h5>Address</h5>
                                  <div class="col-lg-3 spacing-right">
                                    Office No. : <br> <input class="form-control" name="i_poc_office[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                    Floor No. <br> <input class="form-control" name="i_poc_floor[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                    Building <br> <input class="form-control" name="i_poc_building[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                    Block <br> <input class="form-control" name="i_poc_block[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                    Area <br> <input class="form-control" name="i_poc_area[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                    City <br> <input class="form-control" name="i_poc_city[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                    Photograph of Location <br> <input class="form-control" name="i_poc_loc[]" type="file" placeholder="..."
                                      style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                    Pin Location <br> <input class="form-control" name="i_poc_pin[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                </div>
                              </div>

                              <div class="row mb-2">
                                <div class="col-lg-6 spacing-right mt-2">
                                  Notes <br>
                                  <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="ins_note[]"
                                    rows="2" cols="38">
                                                </textarea>
                                </div>
                                <div class="col-lg-6 spacing-left spacing-right mt-2">
                                  Attachments <br> <input class="form-control" name="ins_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                                </div>

                              </div>

                            </div>

                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Add More and Remove Buttons -->
                    <div class="row my-3">
                      <div class="col">
                        <button type="button" class="btn btn-primary" id="addAudit" style="height:30px; width:150px;">Add More</button>
                      </div>
                      <button type="button" class="btn btn-primary" id="updateAuditTable" style="height:30px; width:170px;">Save</button>
                    </div>


                  </div>
                  <table class="table table-bordered mt-3" id="auditSummaryTable">
                    <thead>
                      <tr>
                        <th>Entry</th>
                        <th>Comany Name.</th>
                        <th>POC Name.</th>
                        <th>POC Cell No.</th>
                        <th>View</th>

                        <!-- Add more columns as needed -->
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Summary data will be added here dynamically -->
                    </tbody>
                  </table>
                  <button type="button" class="btn btn-primary saveButton" data-next-tab="#address-details">Save and Next</button>
                </div>
              </div>
            </div>
            {{-- Tracking Company --}}
            <div class="tab-pane fade" id="tracker" role="tabpanel" aria-labelledby="tracker-tab">
              <div class="container  my-1" id="promactContainer">
                <div class="accordion" id="promactAccordion">
                  <!-- Initial Accordion Item -->
                  <div class="accordion-item promactaccordion-item" id="promactEntry1">
                    <h2 class="accordion-header" id="promactHeading1" style="color: white">
                      <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse"
                        data-target="#promactCollapse1" aria-expanded="false" aria-controls="promactCollapse1">
                        Tracker Details Entry 1
                      </button>
                    </h2>
                    <div id="promactCollapse1" class="collapse" aria-labelledby="promactHeading1">
                      <div class="accordion-body">
                        <div class=" row main-content div" id="">

                          <div class="col-lg-12">
                            <h5>POC :</h5>
                            <div class="row mb-2">
                              <div class="col-lg-3 spacing-right">
                                Company Name : <br> <input class="form-control" name="tracker_company_name[]" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-3 spacing-left spacing-right">
                                Name <br> <input class="form-control" name="t_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-3 spacing-right">
                                Web <br> <input class="form-control" name="t_poc_web[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-3 spacing-right">
                                Email <br> <input class="form-control" name="t_poc_email[]" type="text" placeholder="..." style="width: 100%;">
                              </div>

                              <div class="col-lg-3 spacing-right">
                                Cell Number : <br> <input class="form-control" name="t_poc_cell[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <h5>Address</h5>
                              <div class="col-lg-3 spacing-right">
                                Office No. : <br> <input class="form-control" name="t_poc_office[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-3 spacing-left spacing-right">
                                Floor No. <br> <input class="form-control" name="t_poc_floor[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-3 spacing-right">
                                Building <br> <input class="form-control" name="t_poc_building[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-3 spacing-right">
                                Block <br> <input class="form-control" name="t_poc_block[]" type="text" placeholder="..." style="width: 100%;">
                              </div>

                              <div class="col-lg-3 spacing-right">
                                Area <br> <input class="form-control" name="t_poc_area[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-3 spacing-left spacing-right">
                                City <br> <input class="form-control" name="t_poc_city[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-3 spacing-right">
                                Photograph of Location <br> <input class="form-control" name="t_poc_loc[]" type="file" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-3 spacing-right">
                                Pin Location <br> <input class="form-control" name="t_poc_pin[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                            </div>
                          </div>

                          <div class="row mb-2">
                            <div class="col-lg-6 spacing-right mt-2">
                              Notes <br>
                              <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="tracker_note[]"
                                rows="2" cols="38">
                                        </textarea>
                            </div>
                            <div class="col-lg-6 spacing-left spacing-right mt-2">
                              Attachments <br> <input class="form-control" name="tracker_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>

                <!-- Add More and Remove Buttons -->
                <div class="row my-3">
                  <div class="col">
                    <button type="button" class="btn btn-primary" id="addPromact" style="height:30px; width:200px;">Add More</button>
                  </div>
                  <button type="button" class="btn btn-primary" id="updatePromactTable" style="height:30px; width:170px;">Save</button>

                </div>


              </div>

              <table class="table table-bordered mt-3" id="promactSummaryTable">
                <thead>
                  <tr>
                    <th>Entry</th>
                    <th>Company Name</th>
                    <th>Poc Name</th>
                    <th>POC Cell</th>
                    <th>View</th>

                    <!-- Add more columns as needed -->
                  </tr>
                </thead>
                <tbody>
                  <!-- Summary data will be added here dynamically -->
                </tbody>
              </table>

            </div>
            {{-- Repair & Maintenance --}}
            <div class="tab-pane fade" id="repair" role="tabpanel" aria-labelledby="repair-tab">
              <div class="accordion" id="notificationAccordion">
                <!-- Initial Accordion Item -->
                <div class="accordion-item notificationaccordion-item" id="notificationEntry1">
                  <h2 class="accordion-header" id="notificationHeading1" style="color: white">
                    <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse"
                      data-target="#notificationCollapse1" aria-expanded="false" aria-controls="notificationCollapse1">
                      Repair & Maintenance Entry 1
                    </button>
                  </h2>
                  <div id="notificationCollapse1" class="collapse" aria-labelledby="notificationHeading1">
                    <div class="accordion-body">
                      <div class=" row main-content div" id="">
                        <div class="col-lg-12">
                          <div class="row mb-2">
                            <div class="col-lg-3 spacing-right">
                              Serial No. <br> <input class="form-control" name="serial_no[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-left spacing-right">
                              Description <br> <input class="form-control" name="r_desc[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                              Amount of Bill <br> <input class="form-control" name="r_amount[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                              Payment Made By <br> <input class="form-control" name="r_pay_by[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                              Date <br> <input class="form-control" name="r_date[]" type="date" placeholder="..." style="width: 100%;">
                            </div>
                            <h5>Vendor Details :</h5>
                            <div class="col-lg-3 spacing-right">
                              Company Name : <br> <input class="form-control" name="repair_company_name[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-left spacing-right">
                              Name <br> <input class="form-control" name="r_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                              Web <br> <input class="form-control" name="r_poc_web[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                              Email <br> <input class="form-control" name="r_poc_email[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                              Cell Number : <br> <input class="form-control" name="r_poc_cell[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <h5>Address</h5>
                            <div class="col-lg-3 spacing-right">
                              Office No. : <br> <input class="form-control" name="r_poc_office[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-left spacing-right">
                              Floor No. <br> <input class="form-control" name="r_poc_floor[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                              Building <br> <input class="form-control" name="r_poc_building[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                              Block <br> <input class="form-control" name="r_poc_block[]" type="text" placeholder="..." style="width: 100%;">
                            </div>

                            <div class="col-lg-3 spacing-right">
                              Area <br> <input class="form-control" name="r_poc_area[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-left spacing-right">
                              City <br> <input class="form-control" name="r_poc_city[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                              Photograph of Location <br> <input class="form-control" name="r_poc_loc[]" type="file" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                              Pin Location <br> <input class="form-control" name="r_poc_pin[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                          </div>
                        </div>
                        <h5>Any Warranty :</h5>
                        <div class="row mb-2">
                          <div class="col-lg-6 spacing-left spacing-right mt-2">
                            Any Warranty <br> <input class="form-control" name="r_warranty[]" type="file" placeholder="..." style="width: 70%;">
                          </div>
                          <div class="col-lg-6 spacing-right mt-2">
                            Notes <br>
                            <textarea id="w3review12" class="form-control" name="warranty_note[]" rows="2" cols="38">
                                    </textarea>
                          </div>

                        </div>

                        <div class="row mb-2">
                          <div class="col-lg-6 spacing-right mt-2">
                            Notes <br>
                            <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="repair_note[]"
                              rows="2" cols="38">
                                  </textarea>
                          </div>
                          <div class="col-lg-6 spacing-left spacing-right mt-2">
                            Attachments <br> <input class="form-control" name="repair_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <!-- Add More and Remove Buttons -->
              <div class="row my-3">
                <div class="col">
                  <button type="button" class="btn btn-primary" id="addNotification" style="height:30px; width:150px;">Add More</button>
                </div>
                <button type="button" class="btn btn-primary" id="updateNotificationTable" style="height:30px; width:150px;">Save</button>
              </div>

              <table class="table table-bordered mt-3" id="notificationSummaryTable">
                <thead>
                  <tr>
                    <th>Entry</th>
                    <th>Serial No</th>
                    <th>Description</th>
                    <th>Amount Of Bill</th>
                    <th>View</th>

                    <!-- Add more columns as needed -->
                  </tr>
                </thead>
                <tbody>
                  <!-- Summary data will be added here dynamically -->
                </tbody>
              </table>
            </div>
            {{-- Usage & Movement --}}
            <div class="tab-pane fade" id="usage" role="tabpanel" aria-labelledby="usage-tab">
              <div class="row mb-2">
                <div class="col-lg-4 spacing-right">
                  <h5 class="mt-4" style="margin-left: 20px;"><strong><i>VEHICLE LOG BOOK</i></strong></h5>
                </div>
              </div>
              <div class="container my-5" id="ItemAccordionContainer">
                <div class="accordion" id="itemAccordion">
                  <!-- Initial Accordion Item -->
                  <div class="accordion-item itemAccordion-item" id="itemEntry1">
                    <h2 class="accordion-header" id="itemHeading1" style="color: white">
                      <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse"
                        data-target="#collapseItem1" aria-expanded="false" aria-controls="collapseItem1">
                        Usage/Movement Entry 1
                      </button>
                    </h2>
                    <div id="collapseItem1" class="collapse" aria-labelledby="itemHeading1">
                      <div class="accordion-body">
                        <div id="vendorDetailsContainer">
                          <div class="form-type col-lg-12 spacing-right">
                            <div class="d-flex mt-2">
                              <div class="col-lg-6 spacing-right">
                                Vehicle No. <br> <input class="form-control" type="text" name="usage_vehicle_no[]" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-left spacing-right">
                                Average Per Liter: <br> <input class="form-control" type="text" name="avg_per_liter[]" placeholder="" style="width: 100%;">
                              </div>
                            </div>
                            <div class="d-flex mt-2">
                              <div class="col-md-3">
                                Date <br> <input class="form-control" name="date_of_m[]" type="date" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-md-3">
                                Time From <br> <input class="form-control" name="time_from[]" type="time" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-md-3">
                                Time To <br> <input class="form-control" name="time_to[]" type="time" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-md-3">
                                Details Of Journey <br> <textarea class="form-control" name="details_of_j[]" type="text" placeholder="..."
                                  style="width: 100%;"></textarea>
                              </div>
                            </div>
                            <div class="d-flex mt-2">
                              <div class="col-md-3">
                                Purpose Of Journey<br> <input class="form-control loi-price" name="purpose_of_j[]" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-md-3">
                                Name of Officer <br> <input class="form-control" name="name_of_officer[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-md-3">
                                Meter Reading to <br> <input class="form-control" name="meter_reading_to[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-md-3">
                                Meter Reading From <br> <input class="form-control" name="meter_reading_from[]" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                            </div>
                          </div>
                          <div class="d-flex">
                            <div class="col-md-3 spacing-left">
                              Distance Covered <input class="form-control" type="text" name="distance_covered[]" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-md-3">
                              Signature<br> <input class="form-control" name="signature[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-md-3">
                              P.O.L Drawn<br> <input class="form-control" name="p_o_l[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-md-3">
                              Remarks<br> <input class="form-control" name="remarks[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Add More and Remove Buttons -->
                <div class="row my-3">
                  <div class="col-lg-3">
                    <button type="button" class="btn btn-primary" id="addAccItem" style="height:30px; width:150px;">Add More</button>
                  </div>
                  <div class="col-lg-3">
                  </div>
                  <div class="col-lg-3">
                  </div>
                  <div class="col-lg-3">
                    <button type="button" class="btn btn-primary" id="addToItemTable" style="height:30px; width:150px;">Save</button>
                  </div>
                </div>
              </div>
              <table class="table table-bordered my-3" id="itemSummaryTable">
                <thead>
                  <tr>
                    <th>Entry</th>
                    <th>Date</th>
                    <th>Name of Officer</th>
                    <th>Distance Covered</th>
                    <th>P.O.L Drawn</th>
                    <th>Action</th>
                    <!-- Add more columns as needed -->
                  </tr>
                </thead>
                <tbody>
                  <!-- Summary data will be added here dynamically -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
        {{-- Notifications --}}
        <div class="tab-pane fade m-3" style="opacity: 90%;" id="notification" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="container my-1">
            <div class="accordion" id="signatoryAccordion12">
              <!-- Initial Accordion Item -->
              <div class="accordion-item signaccordion-item12" id="signatoryEntry12">
                <h2 class="accordion-header" id="signatoryHeading12" style="color: white">
                  <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse"
                    data-target="#signatoryCollapse12" aria-expanded="false" aria-controls="signatoryCollapse12">
                    Notification Entry 1
                  </button>
                </h2>
                <div id="signatoryCollapse12" class="collapse" aria-labelledby="signatoryHeading12">
                  <div class="accordion-body">
                    <div class="col-lg-12 spacing-right">
                      <div class="row mb-2">
                        <div class="col-lg-3 spacing-right">
                          Notification No. <br> <input class="form-control" type="text" name="notification_no[]" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right form-group">
                          Notification Related to : <br>
                          <div class="input-group" style="width: 100%;">
                            <select id="applicable_compliances" class="form-control mt-1" name="notification_related[]"
                              style="width: 70%; border-radius: 4px 0 0 4px; ">
                              <option value=""></option>
                              <option value="tax">Tax</option>
                              <option value="threat alert">Threat Alert</option>
                            </select>
                            <div class="input-group-append" style="width: 30%;">
                              <a>
                                <button class="btn btn-primary" id="submit-category" type="button"
                                  style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          Notes. <br> <textarea class="form-control" type="text" name="notification_notes[]" placeholder="..." style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-4 spacing-left">
                          Attachment. <br> <input class="form-control" type="file" name="notification_attach[]" placeholder="..." style="width: 100%;">
                        </div>

                      </div>
                      <h5>Notification To :</h5>
                      <div class="row">

                        <div class="col-lg-4 spacing-right form-group">
                          Notification Shared with : <br>
                          <div class="input-group" style="width: 100%;">
                            <select id="applicable_compliances" class="form-control mt-1" name="notification_to[]"
                              style="width: 70%; border-radius: 4px 0 0 4px; ">
                              <option value=""></option>
                              <option value="staff">Staff</option>
                              <option value="customer">Customer</option>
                            </select>
                            <div class="input-group-append" style="width: 30%;">
                              <a>
                                <button class="btn btn-primary" id="submit-category" type="button"
                                  style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Add More and Remove Buttons -->
            <div class="row my-3">
              <div class="col">
                <button type="button" class="btn btn-primary" id="addSignatory12" style="height:30px; width:150px;">Add More
                </button>
              </div>
              <button type="button" class="btn btn-primary" id="updateSignatoryTable12">Save</button>

            </div>

            <table class="table table-bordered mt-1" id="signatorySummaryTable12">
              <thead>
                <tr>
                  <th>Entry</th>
                  <th>Notification No.</th>
                  <th>Notification Related To</th>
                  <th>Notification To </th>
                  <th>Action</th>
                  <!-- Add more columns as needed -->
                </tr>
              </thead>
              <tbody>
                <!-- Summary data will be added here dynamically -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="footer"
        style="position: fixed; bottom: 0; width: 100%; background-color: #320056; padding: 10px; display: flex; justify-content: space-between; align-items: center; margin-left:-21%;">
        <button type="button" name="cancel" class="btn btn-secondary"
          style="color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 80px;"><i>Cancel</i></button>
        <div style="display: flex; align-items: center;"> <img src="logo.png" alt="Logo" style="height: 30px; margin-right: 10px;">
          <h4 style="color: #fff; margin: 0; font-size: 14px;"><i>PIFFERS SECURITY SERVICES</i></h4>
        </div>
        <div class="dropdown" style="position: relative; display: inline-block;"> <button type="button" class="btn btn-primary"
            style="background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 150px;"><i
              style="margin-right:30px;">Submission &#8594;</i></button>
          <div class="dropdown-content"
            style="display: none; position: absolute; background-color: #f9f9f9; min-width: 130px; box-shadow: 0px -8px 16px 0px rgba(0,0,0,0.2); z-index: 1; bottom: 100%;">
            <button type="submit" name="save_and_email"
              style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save
                & Email/Whatsapp</i></button>
            <button type="submit" name="save_and_share"
              style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save
                & share link</i></button>
            <button type="submit" name="save_and_new"
              style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save
                & New</i></button>
            <button type="submit"
              style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save
                & Close</i></button>
          </div>
        </div>
      </div>
    </form>
  </section> <!-- </div> -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.getElementById('cro_select').addEventListener('change', function () {
        let phone = this.options[this.selectedIndex].getAttribute('data-phone');
        document.getElementById('cro_cell').value = phone ? phone : '';
    });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      document.querySelector('.dropdown').addEventListener('mouseover', function () {
          document.querySelector('.dropdown-content').style.display = 'block';
      });

      document.querySelector('.dropdown').addEventListener('mouseout', function () {
          document.querySelector('.dropdown-content').style.display = 'none';
      });
  });
</script>
<script>
  $(document).ready(function() {
      $('#periodicalMaintenance').change(function() {
          if ($(this).val() === 'yes') {
              $('#maintenanceDateField').show();
          } else {
              $('#maintenanceDateField').hide();
          }
      });
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"> </script>
<!-- script for add more consultant details -->


<script>
  $(document).ready(function () {
      // Function to update all fields with the class 'report_branch' and 'report_branch_id'
      function updateFields() {
          const officeNameValue = $('.branch_office').val();
          const officeCodeValue = $('.branch_office_code').val();
          $('.report_branch').val(officeNameValue);
          $('.report_branch_id').val(officeCodeValue);
      }

      // Add event listeners to main office name and code fields
      $('.branch_office').on('input', updateFields);
      $('.branch_office_code').on('input', updateFields);

      // Add More Button Click Event
      $('#addSignatory10').on('click', function () {
          var SignatoryAccordionCount10 = $('#signatoryAccordion10 .signaccordion-item10').length + 1;

          var newSignAccordion10 = `
              <div class="accordion-item signaccordion-item10" id="signatoryEntry10${SignatoryAccordionCount10}">
                  <h2 class="accordion-header" id="signatoryHeading10${SignatoryAccordionCount10}">
                      <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse10${SignatoryAccordionCount10}" aria-expanded="false" aria-controls="signatoryCollapse10${SignatoryAccordionCount10}">
                          Report Entry ${SignatoryAccordionCount10}
                      </button>
                  </h2>
                  <div id="signatoryCollapse10${SignatoryAccordionCount10}" class="collapse" aria-labelledby="signatoryHeading10${SignatoryAccordionCount10}">
                      <div class="accordion-body">
                          <!-- Your content for signatory entry goes here -->
                          <div class="row mb-2" id="signatoryDetailsContainer10">
                              <div class="col-lg-12" id="consultant_add_fields">
                                  <div class=" row mb-2">
                                      <div class="col-lg-4 spacing-left"> Date <br> <input class="form-control" id="" name="report_date[]" type="date" placeholder="..." style="width: 103%;"> </div>
                                      <div class="col-lg-4 spacing-left spacing-right"> Branch Name <br> <input class="form-control report_branch" id="" name="branch[]" type="text" placeholder="..." style="width: 97%;"> </div>
                                      <div class="col-lg-4 spacing-right"> Branch ID <br> <input class="form-control report_branch_id" id="" name="site_id[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-left"> Location <br> <input class="form-control" id="" name="location[]" type="text" placeholder="..." style="width: 103%;"> </div>
                                      <div class="col-lg-4 spacing-right"> Authorized Guards <br> <input class="form-control" id="" name="auth_guards[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-left"> Army <br> <input class="form-control" id="" name="army[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-left"> SSG <br> <input class="form-control" id="" name="ssg[]" type="text" placeholder="..." style="width: 103%;"> </div>
                                  </div>
                                  <div class=" row mb-2">
                                      <div class="col-lg-4 spacing-right"> Civil <br> <input class="form-control" id="" name="civil[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-left spacing-right"> Absentees <br> <input class="form-control" id="" name="absente[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-left spacing-right"> Leave <br> <input class="form-control" id="" name="leave[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-right"> Reason <br> <input class="form-control" id="" name="reason[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-left spacing-right"> Reliver Provided <br> <input class="form-control" id="" name="r_provided[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-left spacing-right"> Last Complaint Date <br> <input class="form-control" id="" name="last_comp_date[]" type="date" placeholder="..." style="width: 100%;"> </div>
                                  </div>
                                  <div class=" row mb-2">
                                      <div class="col-lg-4 spacing-right"> Any Incident & Report No <br> <input class="form-control" id="" name="any_inc[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-right"> Pending Nadra Versys <br> <input class="form-control" id="" name="pending_nadra[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-left spacing-right"> Unsent DPO Reports <br> <input class="form-control" id="" name="unsent_dpo_rep[]" type="text" placeholder="..." style="width: 100%;"></input> </div>
                                      <div class="col-lg-4 spacing-left spacing-right"> No. of resigns <br> <input class="form-control" id="" name="no_of_resigns[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-right"> Guards without bank started <br> <input class="form-control" id="" name="guards_wout_bank[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-left spacing-right"> Any new Site Started <br> <input class="form-control" id="" name="any_new_site[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                  </div>
                                  <div class=" row mb-2">
                                      <div class="col-lg-4 spacing-left spacing-right"> No. of Guards <br> <input class="form-control" id="" name="no_of_guards[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-left spacing-right"> Any Site Closed <br> <input class="form-control" id="" name="any_site_closed[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-left spacing-right"> No of Guards of Closed Site <br> <input class="form-control" id="" name="no_of_guards_of_closed_site[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-right"> Details of Escort Duties <br> <textarea class="form-control" id="" name="escort_duties[]" type="file" placeholder="..." style="width: 100%;"></textarea> </div>
                                      <div class="col-lg-4 spacing-right"> Details of Events <br> <textarea class="form-control" id="" name="event_details[]" type="file" placeholder="..." style="width: 100%;"></textarea> </div>
                                      <div class="col-lg-4 spacing-left spacing-right"> Amount of pending Recoveries <br> <input class="form-control" id="" name="pending_recoveries[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-left spacing-right"> Signature of Manager Accounts <br> <input class="form-control" id="" name="sign_manager[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-right"> Any staff on annual leave <br> <input class="form-control" id="" name="staff_on_leav[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                      <div class="col-lg-4 spacing-left spacing-right"> Any short leave of staff with Name <br> <input class="form-control" id="" name="short_leav[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                  </div>
                                  <h5>Checklist :</h5>
                                  <div class=" row mb-2">
                                      <div class="col-lg-4 spacing-right">
                                          Utility Bills Paid <br>
                                          <select id="staff_category" class="form-control" name="utility_bills[]" style="width: 100%;">
                                              <option value=""></option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                                      <div class="col-lg-4 spacing-right">
                                          Bio Matric Working <br>
                                          <select id="staff_category" class="form-control" name="bio_matric[]" style="width: 100%;">
                                              <option value=""></option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                                      <div class="col-lg-4 spacing-right">
                                          Bio Register Maintained <br>
                                          <select id="staff_category" class="form-control" name="bio_register[]" style="width: 100%;">
                                              <option value=""></option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                                      <div class="col-lg-4 spacing-right">
                                          Office Rent Paid <br>
                                          <select id="staff_category" class="form-control" name="office_rent[]" style="width: 100%;">
                                              <option value=""></option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                                      <div class="col-lg-4 spacing-right">
                                          UPS Working <br>
                                          <select id="staff_category" class="form-control" name="ups[]" style="width: 100%;">
                                              <option value=""></option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                                      <div class="col-lg-4 spacing-right">
                                          Guard File Maintained <br>
                                          <select id="staff_category" class="form-control" name="guard_file[]" style="width: 100%;">
                                              <option value=""></option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                                      <div class="col-lg-4 spacing-right">
                                          Guard Accomodation Rent Paid <br>
                                          <select id="staff_category" class="form-control" name="guard_accomodation[]" style="width: 100%;">
                                              <option value=""></option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                                      <div class="col-lg-4 spacing-right">
                                          Any Maintainance Required <br>
                                          <select id="staff_category" class="form-control" name="any_maintainence[]" style="width: 100%;">
                                              <option value=""></option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                                      <div class="col-lg-4 spacing-right">
                                          Weapon Register Maintained <br>
                                          <select id="staff_category" class="form-control" name="weapon_register[]" style="width: 100%;">
                                              <option value=""></option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                                      <div class="col-lg-4 spacing-right">
                                          CCTV Working <br>
                                          <select id="staff_category" class="form-control" name="cctv[]" style="width: 100%;">
                                              <option value=""></option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                                      <div class="col-lg-4 spacing-right">
                                          Attendance Register Maintained <br>
                                          <select id="staff_category" class="form-control" name="attendance_register[]" style="width: 100%;">
                                              <option value=""></option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                                      <div class="col-lg-4 spacing-right">
                                          Kote Register Maintained <br>
                                          <select id="staff_category" class="form-control" name="kote_register[]" style="width: 100%;">
                                              <option value=""></option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <button class="btn btn-danger removeSignAccordion10" type="button" style="width:10%; margin-left:13px;">
                          Remove
                      </button>
                  </div>
              `;

          $('#signatoryAccordion10').append(newSignAccordion10);
          // Update the new fields with the current office name and code values
          updateFields();
      });

      // Remove Accordion Button Click Event
      $(document).on('click', '.removeSignAccordion10', function () {
          $(this).closest('.signaccordion-item10').remove();
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
</script> <!-- script for add more Issuing Authority -->
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
                          <div class="row mb-2" id="signatoryDetailsContainer11">
                              <div class="col-lg-12" id="authority_add_fields">
                               <div class="row mb-2">
                                   <div class="col-lg-4 spacing-right form-group"> Equipment Name <br>
                                      <div class="input-group" style="width: 100%;"> <select id="applicable_compliances" class="form-control mt-1" name="category[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                               <option value=""></option>
                                                @foreach($adminequipments as $adminequipment )
                                                     <option value="{{ $adminequipment->adminequipment_name }}">{{ $adminequipment->adminequipment_name }}</option>
                                                @endforeach
                                         </select>
                                         <div class="input-group-append" style="width: 30%;"> <a> <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button> </a> </div>
                                      </div>
                                   </div>
                                   <div class="col-lg-4 spacing-left spacing-right"> Quantity <br> <input class="form-control" id="" name="quantity[]" type="text" placeholder="..." style="width: 100%;"> </div>
                                   <div class="col-lg-4 spacing-right"> Notes <br> <textarea class="form-control" id="" name="notes[]" type="text" placeholder="..." style="width: 100%;"></textarea> </div>
                                   <div class="col-lg-4 spacing-right"> Attachments <br> <input class="form-control" id="" name="attachments[]" type="file" placeholder="..." style="width: 90%;"> </div>
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
</script> <!-- Script for Issuing Authority in Table -->
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
                          <div class="col-lg-12">
                              <div class="row mb-2">
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Type of Vehicle <br>
                                      <select id="staff_category" class="form-control" name="type_of_vehicle[]" style="width: 100%;">
                                          <option value=""></option>
                                          <option value="Car">Car</option>
                                          <option value="Bike">Bike</option>
                                      </select>
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Vehicle No <br> <input class="form-control"
                                              name="vehicle_no[]" type="text"
                                          placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Vehicle Model <br> <input class="form-control"
                                          name="vehicle_model[]" type="text"
                                          placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Vehicle Picture <br> <input class="form-control"
                                          name="vehicle_pic[]" type="file" placeholder="..."
                                          style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Vehicle Book Picture <br> <input class="form-control"
                                          name="vehicle_book_pic[]" type="file"
                                          placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left">
                                      Payment Type <br> <input class="form-control"
                                      name="payment_type[]" type="text" placeholder="..."
                                      style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Vehicle Name <br> <input class="form-control"
                                              name="vehicle_name[]" type="text"
                                          placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Engine No. <br> <input class="form-control"
                                              name="engine_no[]" type="text"
                                          placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Chasis No. <br> <input class="form-control"
                                          name="chasis_no[]" type="text" placeholder="..."
                                          style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Vehicle Color <br> <input class="form-control"
                                              name="vehicle_color[]" type="text"
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
</script> <!-- Script for Issuing Authority in Table -->
<script>
  $(document).ready(function () {
      // Function to update summary table for Vehicle entries
      function updateSignatorySummaryTable13() {
          // Clear existing rows
          $('#signatorySummaryTable13 tbody').empty();

          // Iterate through each accordion item and update the summary table
          $('.signaccordion-item13').each(function (index) {
              var selectedOption = $(this).find('[name="type_of_vehicle[]"] option:selected');
              var typeOfVehicleText = selectedOption.text(); // Fetch the text content of the selected option
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
      $('#addInspection').on('click', function () {
          var InspectionAccordionCount = $('#inspectionAccordion .inspectionaccordion-item').length + 1;

          var newInspectionAccordion = `
              <div class="accordion-item inspectionaccordion-item" id="inspectionEntry${InspectionAccordionCount}">
                  <h2 class="accordion-header" id="inspectionHeading${InspectionAccordionCount}">
                      <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#inspectionCollapse${InspectionAccordionCount}" aria-expanded="false" aria-controls="inspectionCollapse${InspectionAccordionCount}">
                          Office Branding ${InspectionAccordionCount}
                      </button>
                  </h2>
                  <div id="inspectionCollapse${InspectionAccordionCount}" class="collapse" aria-labelledby="inspectionHeading${InspectionAccordionCount}">
                    <div class="accordion-body">
                      <div id="inspectionDiv">
                          <div id="inspectionInfo">
                              <div class="row mb-2">
                                  <div class="col-lg-4 spacing-right">
                                    Branding Type <br> <input class="form-control" type="text" name="b_type[]" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-4 spacing-right">
                                    Picture of Branding <br> <input class="form-control" type="file" name="picture_of_b[]" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-4 spacing-right">
                                    Site of Branding. <br> <input class="form-control" type="text" name="site_of_b[]" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                              <div class="row mb-2">
                                <div class="col-lg-4 spacing-right">
                                  Branding Cost <br> <input class="form-control" type="text" name="cost_of_b[]" placeholder="" style="width: 100%;">
                                  <div id="phoneError" class="error-message-phone" style="color: red"></div>
                              </div>
                                <div class="col-lg-4 spacing-right">
                                    Periodical Maintenance <br>
                                    <select class="form-control" name="periodical_m[]" id="periodicalMaintenance" style="width: 100%;" onchange="toggleMaintenanceDateInput()">
                                        <option value=""></option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>

                                <div class="col-lg-4 spacing-right" id="maintenanceDateField">
                                    Maintenance Date <br>
                                    <input class="form-control" type="text" name="maintenance_date[]" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                              <div class="row mb-2">
                                  <h5>Details of Vendor</h5>
                                  <div class="col-lg-3 spacing-left" >
                                    Vendor ID/No. <br> <input class="form-control" type="text" name="vendor_id[]" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Vendor Name<br> <input class="form-control" id="inpFile2" type="text" name="v_name[]" placeholder="..." style="width: 100%;" ></textarea>
                                  </div>
                                  <div class="col-lg-3 spacing-left" >
                                    Vendor Cell Number. <br> <input class="form-control" type="text" name="v_cell[]" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Office Number<br> <input class="form-control" id="inpFile2" type="text" name="v_office[]" placeholder="..." style="width: 100%;" >
                                  </div>
                                  <div class="col-lg-3 spacing-left" >
                                    Floor <br> <input class="form-control" type="text" name="v_floor[]" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Building<br> <input class="form-control" id="inpFile2" type="text" name="v_building[]" placeholder="..." style="width: 100%;" >
                                  </div>
                                  <div class="col-lg-3 spacing-left" >
                                    Block <br> <input class="form-control" type="text" name="v_block[]" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Area<br> <input class="form-control" id="inpFile2" type="text" name="v_area[]" placeholder="..." style="width: 100%;" >
                                  </div>
                                  <div class="col-lg-3 spacing-left" >
                                    City <br> <input class="form-control" type="text" name="v_city[]" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Photograph of Building<br> <input class="form-control" id="inpFile2" type="text" name="v_photo_b[]" placeholder="..." style="width: 100%;" >
                                  </div>
                                  <div class="col-lg-3 spacing-left" >
                                    Pin Location <br> <input class="form-control" type="text" name="v_pin[]" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Notes<br> <textarea class="form-control" id="inpFile2" type="text" name="v_notes[]" placeholder="..." style="width: 100%;" ></textarea>
                                  </div>
                                  <div class="col-lg-3 spacing-left" >
                                    Attachments <br> <input class="form-control" type="file" name="v_attach[]" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>


                          </div>
                      </div>

                    </div>
                      <button class="btn btn-danger btn-sm removeInspectionAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                  </div>
              </div>
          `;

          $('#inspectionAccordion').append(newInspectionAccordion);
      });

      // Remove Accordion Button Click Event
      $(document).on('click', '.removeInspectionAccordion', function () {
          $(this).closest('.inspectionaccordion-item').remove();
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
                        <div id="cleaningInfo">
                            <div class="row col-lg-12">
                                <div class="col-lg-4 spacing-right">
                                    Amount Paid <br> <input class="form-control" type="text" name="amount_paid[]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                  Type of Payment <br>
                                  <select id="staff_category" class="form-control" name="type_of_payment[]" style="width: 100%;">
                                      <option value=""></option>
                                      <option value="Cash">Cash</option>
                                      <option value="Cheque">Cheque</option>
                                  </select>
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Instrument Number <br> <input class="form-control" type="text" name="ins_no[]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Voucher No. <br> <input class="form-control" type="text" name="voucher_no[]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Payment Date <br> <input class="form-control" type="date" name="payment_date[]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Notes <br> <textarea class="form-control" type="text" name="token_note[]" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Attachment <br> <input class="form-control" type="file" name="token_attach[]" placeholder="..." style="width: 100%;">
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
                      <div class=" row main-content div" id="auditsInfo">
                          <div class="col-lg-12">
                              <h5>POC :</h5>
                              <div class="row mb-2">
                                  <div class="col-lg-3 spacing-right">
                                      Company Name : <br> <input class="form-control"  name="company_name[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Name <br> <input class="form-control"  name="i_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Web <br> <input class="form-control"  name="i_poc_web[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Email <br> <input class="form-control"  name="i_poc_email[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>

                                  <div class="col-lg-3 spacing-right">
                                    Cell Number : <br> <input class="form-control"  name="i_poc_cell[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Value of Sum Insured <br> <input class="form-control"  name="value_of_sum[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Insurance Policy Attachment <br> <input class="form-control"  name="ins_p_pic[]" type="file" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Certificate of Insurrance <br> <input class="form-control"  name="c_of_ins[]" type="file" placeholder="..." style="width: 100%;">
                                  </div>
                                  <h5>Address</h5>
                                  <div class="col-lg-3 spacing-right">
                                    Office No. : <br> <input class="form-control"  name="i_poc_office[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Floor No. <br> <input class="form-control"  name="i_poc_floor[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Building <br> <input class="form-control"  name="i_poc_building[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Block <br> <input class="form-control"  name="i_poc_block[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>

                                  <div class="col-lg-3 spacing-right">
                                    Area <br> <input class="form-control"  name="i_poc_area[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      City <br> <input class="form-control"  name="i_poc_city[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Photograph of Location <br> <input class="form-control"  name="i_poc_loc[]" type="file" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Pin Location <br> <input class="form-control"  name="i_poc_pin[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                          </div>

                          <div class="row mb-2">
                              <div class="col-lg-6 spacing-right mt-2">
                              Notes <br>
                              <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="ins_note[]" rows="2" cols="38">
                              </textarea>
                              </div>
                              <div class="col-lg-6 spacing-left spacing-right mt-2">
                                  Attachments <br> <input class="form-control" name="ins_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
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
                        <div class=" row main-content div" id="">

                            <div class="col-lg-12">
                                <h5>POC :</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Company Name : <br> <input class="form-control"  name="tracker_company_name[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Name <br> <input class="form-control"  name="t_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Web <br> <input class="form-control"  name="t_poc_web[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Email <br> <input class="form-control"  name="t_poc_email[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>

                                    <div class="col-lg-3 spacing-right">
                                      Cell Number : <br> <input class="form-control"  name="t_poc_cell[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <h5>Address</h5>
                                    <div class="col-lg-3 spacing-right">
                                      Office No. : <br> <input class="form-control"  name="t_poc_office[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Floor No. <br> <input class="form-control"  name="t_poc_floor[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Building <br> <input class="form-control"  name="t_poc_building[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Block <br> <input class="form-control"  name="t_poc_block[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>

                                    <div class="col-lg-3 spacing-right">
                                      Area <br> <input class="form-control"  name="t_poc_area[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        City <br> <input class="form-control"  name="t_poc_city[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Photograph of Location <br> <input class="form-control"  name="t_poc_loc[]" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Pin Location <br> <input class="form-control"  name="t_poc_pin[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-6 spacing-right mt-2">
                                Notes <br>
                                <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="tracker_note[]" rows="2" cols="38">
                                </textarea>
                                </div>
                                <div class="col-lg-6 spacing-left spacing-right mt-2">
                                    Attachments <br> <input class="form-control" name="tracker_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
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

{{-- Repair & Maintenance Accordion  --}}
<script>
  $(document).ready(function () {
      // Add More Button Click Event
      $('#addNotification').on('click', function () {
          var NotificationAccordionCount = $('#notificationAccordion .notificationaccordion-item').length + 1;

          var newNotificationAccordion = `
              <div class="accordion-item notificationaccordion-item" id="notificationEntry${NotificationAccordionCount}">
                  <h2 class="accordion-header" id="notificationHeading${NotificationAccordionCount}">
                      <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#notificationCollapse${NotificationAccordionCount}" aria-expanded="false" aria-controls="notificationCollapse${NotificationAccordionCount}">
                          Repair & Maintenance Entry ${NotificationAccordionCount}
                      </button>
                  </h2>
                  <div id="notificationCollapse${NotificationAccordionCount}" class="collapse" aria-labelledby="notificationHeading${NotificationAccordionCount}">
                    <div class="accordion-body">
                      <div class=" row main-content div" id="">

                          <div class="col-lg-12">

                              <div class="row mb-2">
                                  <div class="col-lg-3 spacing-right">
                                  Serial No. <br> <input class="form-control"  name="serial_no[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Description <br> <input class="form-control"  name="r_desc[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Amount of Bill <br> <input class="form-control"  name="r_amount[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Payment Made By <br> <input class="form-control"  name="r_pay_by[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                    Date <br> <input class="form-control"  name="r_date[]" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                  <h5>Vendor Details :</h5>
                                  <div class="col-lg-3 spacing-right">
                                      Company Name : <br> <input class="form-control"  name="repair_company_name[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Name <br> <input class="form-control"  name="r_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Web <br> <input class="form-control"  name="r_poc_web[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Email <br> <input class="form-control"  name="r_poc_email[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>

                                  <div class="col-lg-3 spacing-right">
                                    Cell Number : <br> <input class="form-control"  name="r_poc_cell[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <h5>Address</h5>
                                  <div class="col-lg-3 spacing-right">
                                    Office No. : <br> <input class="form-control"  name="r_poc_office[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Floor No. <br> <input class="form-control"  name="r_poc_floor[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Building <br> <input class="form-control"  name="r_poc_building[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Block <br> <input class="form-control"  name="r_poc_block[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>

                                  <div class="col-lg-3 spacing-right">
                                    Area <br> <input class="form-control"  name="r_poc_area[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      City <br> <input class="form-control"  name="r_poc_city[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Photograph of Location <br> <input class="form-control"  name="r_poc_loc[]" type="file" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Pin Location <br> <input class="form-control"  name="r_poc_pin[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                          </div>
                          <h5>Any Warranty :</h5>
                          <div class="row mb-2">
                              <div class="col-lg-6 spacing-left spacing-right mt-2">
                              Any Warranty <br> <input class="form-control" name="r_warranty[]" type="file" placeholder="..." style="width: 70%;" multiple>
                              </div>
                              <div class="col-lg-6 spacing-right mt-2">
                              Notes <br>
                              <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="warranty_note[]" rows="2" cols="38">
                              </textarea>
                              </div>

                          </div>

                          <div class="row mb-2">
                            <div class="col-lg-6 spacing-right mt-2">
                            Notes <br>
                            <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="repair_note[]" rows="2" cols="38">
                            </textarea>
                            </div>
                            <div class="col-lg-6 spacing-left spacing-right mt-2">
                                Attachments <br> <input class="form-control" name="repair_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
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
          var notificationEntryCount = $('#notificationAccordion .notificationaccordion-item').length + 1;

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


{{-- /////// Usage Movement  \\\\\  --}}


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

                        <div id="vendorDetailsContainer">

                            <div class="form-type col-lg-12 spacing-right">
                                  <div class="d-flex mt-2">
                                      <div class="col-lg-6 spacing-right">
                                          Vehicle No.  <br>  <input class="form-control" type="text" name="usage_vehicle_no[]" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-6 spacing-left spacing-right">
                                          Average Per Liter: <br>  <input class="form-control" type="text" name="avg_per_liter[]" placeholder="" style="width: 100%;">
                                      </div>
                                  </div>
                                <div class="d-flex mt-2">
                                    <div class="col-md-3">
                                        Date <br> <input class="form-control" name="date_of_m[]" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-md-3">
                                        Time From <br> <input class="form-control" name="time_from[]" type="time" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-md-3">
                                        Time To  <br> <input class="form-control" name="time_to[]" type="time" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-md-3">
                                        Details Of Journey <br> <textarea class="form-control" name="details_of_j[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                </div>
                                <div class="d-flex mt-2">
                                    <div class="col-md-3">
                                        Purpose Of Journey<br> <input class="form-control loi-price" name="purpose_of_j[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-md-3">
                                      Name of Officer <br> <input class="form-control" name="name_of_officer[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-md-3">
                                      Meter Reading to <br> <input class="form-control" name="meter_reading_to[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-md-3">
                                      Meter Reading From <br> <input class="form-control" name="meter_reading_from[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-md-3 spacing-left">
                                  Distance Covered <input class="form-control" type="text" name="distance_covered[]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-md-3">
                                  Signature<br> <input class="form-control" name="signature[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-md-3">
                                  P.O.L Drawn<br> <input class="form-control" name="p_o_l[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-md-3">
                                  Remarks<br> <input class="form-control" name="remarks[]" type="text" placeholder="..." style="width: 100%;">
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
                                  <div class="col-lg-12 spacing-right">
                                      <div class="row mb-2">
                                          <div class="col-lg-3 spacing-right">
                                              Notification No.  <br>  <input class="form-control" type="text" name="notification_no[]" placeholder="..." style="width: 100%;">
                                          </div>
                                          <div class="col-lg-4 spacing-right form-group">
                                              Notification Related to : <br>
                                              <div class="input-group" style="width: 100%;">
                                                  <select id="applicable_compliances" class="form-control mt-1"  name="notification_related[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                      <option value=""></option>
                                                      <option value="tax">Tax</option>
                                                      <option value="threat">Threat Alert</option>
                                                  </select>
                                                  <div class="input-group-append" style="width: 30%;">
                                                      <a>
                                                          <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-lg-3">
                                              Notes. <br>  <textarea class="form-control" type="text" name="notification_notes[]" placeholder="..." style="width: 100%;"></textarea>
                                          </div>
                                          <div class="col-lg-4 spacing-left">
                                              Attachment. <br>  <input class="form-control" type="file" name="notification_attach[]" placeholder="..." style="width: 100%;">
                                           </div>

                                      </div>
                                      <h5>Notification To :</h5>
                                      <div class="row">

                                          <div class="col-lg-4 spacing-right form-group">
                                              Notification Shared with : <br>
                                              <div class="input-group" style="width: 100%;">
                                                  <select id="applicable_compliances" class="form-control mt-1"  name="notification_to[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                      <option value=""></option>
                                                      <option value="staff">Staff</option>
                                                      <option value="customer">Customer</option>
                                                  </select>
                                                  <div class="input-group-append" style="width: 30%;">
                                                      <a>
                                                          <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                      </a>
                                                  </div>
                                              </div>
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
              var notificationRelated = $(this).find('[name="notification_related[]"] option:selected').text(); // Retrieve selected option text
              var notificationTo = $(this).find('[name="notification_to[]"] option:selected').text(); // Retrieve selected option text
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
              var signatoryEntryCount12 = $('#signatoryAccordion12 .signaccordion-item12').length + 1;

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
</body>

</html>
