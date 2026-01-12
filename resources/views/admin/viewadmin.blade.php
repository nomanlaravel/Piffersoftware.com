@include('layouts.header') @yield('main')
<!--End of the Navbar-->
<div class="customer_form">
   <div id="main" style="margin-left: 92%;"> <button class="openbtn" onclick="openNav()">☰</button> </div>
   <div id="mySidebar" class="sidebar admin-setting"> <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a> <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a> <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration Setting</a> <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
      <hr> <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
   </div>
   <!--Popup model for User new entry-->
   <!-- <div class="modal fade" id="add_user"> -->
   <!-- <div class="modal-dialog" role="document" style="max-width: 75%;"> -->
   <!-- <div class="modal-content"> -->
   <!--<div class="modal-header border-0">-->
   <!-- <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin-left:-20px;"><i>Branch View :</i>-->
   <!-- </h4>-->
   <!-- </div>-->
   <div class="modal-header border-0">
    <div style="display:flex; column-gap:10px; align-items:center">
        <button type="button" class="btn btn-link" onclick="history.back()">
         <i class="bi bi-arrow-left"></i>
        </button>
        <h5 class="mt-3" style="font-weight: 700;">Branch View: </h5>
    </div>
  </div>
    <!-- <div class="modal-body"> -->
    <section style="margin-bottom: 50px;">
        <button id="download-pdf">Download PDF</button>
        <button id="send-email">Send PDF via Email</button>
        <a href="https://web.whatsapp.com/send?text=Check%20out%20this%20link%3A%20" target="_blank"><button>Send via Whatsapp</button></a>


        <div id="emailModal" class="modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
            <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 40%; border-radius: 10px; text-align: center; margin-top:4%;">
            <span class="close" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; position: relative; left: 49%;" >&times;</span>
            <label for="emailInput">Email To:</label>
            <input type="email" id="emailInput" placeholder="Email">
            
            <label for="ccInput">CC Recipient:</label>
            <input type="email" id="ccInput" placeholder=" Enter CC Recipient">

            <label for="bccInput">BCC Recipient:</label>
            <input type="email" id="bccInput" placeholder="Enter BCC Recipient">

            <label for="subjectInput">Subject:</label>
            <input type="text" id="subjectInput" placeholder="Subject" autocomplete="off">

            <label for="bodyInput">Body:</label>
            <textarea id="bodyInput" rows="8" placeholder="Body" autocomplete="off"></textarea>

            <button id="sendEmailBtn" class="mt-2" style="width: 20%; display: block; margin: 0 auto;">Send</button>
            </div>
        </div>

        <div id="hiddenBootstrapAlert" class="alert alert-danger alert-dismissible fade" role="alert" style="display: hidden;">
            <span id="hiddenAlertContent"></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div id="hiddenRenewalAlert" class="alert alert-success alert-dismissible fade" role="alert">
            <span id="hiddenRenewalAlertContent"></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <form id="admin_form">
             
            <div class=" row main-content div">
                <div class="row">

                <div class="row mb-2" style="margin-left: 20px;">
                    <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
                      <h5 style="margin-right: 5%;">Office Activation Status</h5>
    
                      <div class="form-check form-check-inline" style="margin-right: 90px;">
                        <input class="form-check-input mr-2" type="radio" name="office_activation" {{ $admin->office_activation == '1' ? 'checked' : '' }}  value="1" id="activeRadio">
                        <label class="form-check-label" for="activeRadio">Active</label>
    
                        <input class="form-check-input ml-3 mr-2" type="radio" name="office_activation" {{ $admin->office_activation == '0' ? 'checked' : '' }}  value="0" id="inactiveRadio">
                        <label class="form-check-label" for="inactiveRadio">Inactive</label>
                      </div>
                    </div>
                </div>
    
            </div>
                <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;"> Office Details </h4>
                <div class="col-lg-12">
                <div class="row mb-2">
                    <div class="col-lg-3 spacing-right"> <label for="branch_office_name" class="form_control mb-1 w-100">Office Name</label> <input id="branch_office_name" name="branch_office_name" value="{{ $admin->branch_office_name }}" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly /> </div>
                    <div class="col-lg-3 spacing-right"> <label for="branch_office_name" class="form_control mb-1 w-100">Type</label> <input id="branch_type" name="branch_type" value="{{ $admin->branch_type }}" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly /> </div>
                    <div class="col-lg-3 spacing-right"> <label for="branch_office_code" class="form_control mb-1">Branch ID</label> <input id="branch_office_code" value="{{ $admin->branch_id }}" name="branch_id" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        <div class="mt-0"></div>
                    </div>
                    <div class="col-lg-3 spacing-right"> <label for="branch_reporting" class="form_control mb-1 w-100">Branch Reporting to</label> <input id="branch_type" name="branch_category" value="{{ $admin->branch_category }}" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly /> </div>
                    <div class="col-lg-3 spacing-right"> <label for="branch_office_code" class="form_control mb-1">PTCL No</label> <input id="branch_office_code" value="{{ $admin->branch_ptcl }}" name="branch_ptcl" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        <div class="mt-0"></div>
                    </div>
                    </div>
                    <h5><strong>Management Details :</strong></h5>
                    <div class="row">
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">GM Name</label> 
                            <input id="branch_office_name" value="{{ $admin->gm_name }}" name="gm_name" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        </div>
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">GM Cell No.</label> 
                            <input id="branch_office_name" value="{{ $admin->gm_cell }}" name="gm_cell" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        </div>
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">GM Email</label> 
                            <input id="branch_office_name" value="{{ $admin->gm_email }}" name="gm_email" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        </div>
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">DGM Name</label> 
                            <input id="branch_office_name" value="{{ $admin->dgm_name }}" name="dgm_name" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        </div>
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">DGM Cell No.</label> 
                            <input id="branch_office_name" value="{{ $admin->dgm_cell }}" name="dgm_cell" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        </div>
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">CRO Name</label> 
                            <input id="branch_office_name" value="{{ $admin->cro_name }}" name="cro_name" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        </div>
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">CRO Cell No.</label> 
                            <input id="branch_office_name" value="{{ $admin->cro_cell }}" name="cro_cell" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        </div>
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">PTCL No.</label> 
                            <input id="branch_office_name" value="{{ $admin->cro_ptcl }}" name="cro_ptcl" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        </div>
                    </div>
                    <h5><strong>Branch Address Details :</strong></h5>
                    <div class="row">
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">Office No.</label> 
                            <input id="branch_office_name" value="{{ $admin->branch_office_no }}" name="branch_office_no" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        </div>
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">Building</label> 
                            <input id="branch_office_name" value="{{ $admin->branch_building }}" name="branch_building" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        </div>
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">Block</label> 
                            <input id="branch_office_name" value="{{ $admin->branch_block }}" name="branch_block" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        </div>
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">Area</label> 
                            <input id="branch_office_name" value="{{ $admin->branch_area }}" name="branch_area" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        </div>
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">City</label> 
                            <input id="branch_office_name" value="{{ $admin->branch_city }}" name="branch_city" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        </div>
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">Photograph of Building</label> 
                            @if($admin->branch_photo)
                                <img src="{{ asset('/' . $admin->branch_photo) }}" alt="Photograph of Building" class="w-100" />
                            @endif
                        </div>
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">Pin Location</label> 
                            <input id="branch_office_name" value="{{ $admin->branch_pin }}" name="branch_pin" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        </div>
                        <div class="col-lg-3 spacing-right"> 
                            <label for="branch_office_name" class="form_control mb-1 w-100">GPS</label> 
                            <input id="branch_office_name" value="{{ $admin->branch_gps }}" name="branch_gps" type="text" class="form-control mt-1" aria-="true" aria-invalid="false" style="width: 100%;" readonly />
                        </div>
                    </div>
                </div>
            
            </div>
            
            <div class="container">
                <h5 style="margin-top: 45px;">{{ $admin->branch_office_name }} - HRM Employees</h5>
                @if($hrmRecords->isEmpty())
                    <p>No HRM employees found for this Admin.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Employee Number</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Cnic</th>
                                <th>Category</th>
                                <th>Action</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hrmRecords as $hrm)
                            <tr>
                                <td>{{ $hrm->employee_no }}</td>
                                <td>{{ $hrm->name }}</td>
                                <td>{{ $hrm->fname }}</td>
                                <td>{{ $hrm->cnic }}</td>
                                <td>{{ $hrm->category }}</td>
                                <td><a href="{{ route('viewhrm', $hrm->id) }}">View</a></td>
                              
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            
            <div class="container">
                <h5 style="margin-top: 45px;">{{ $admin->branch_office_name }} - Rental Properties</h5>
                @if($rentals->isEmpty())
                    <p>No rental properties found for this admin.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>RP Number</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rentals as $rental)
                            <tr>
                                <td>{{ $rental->rp_no }}</td>
                                <td>{{ $rental->type }}</td>
                                <td>{{ $rental->desc }}</td>
                                <td><a href="{{ route('viewrental', $rental->id) }}">View</a></td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
             <div class="container">
                <h5 style="margin-top: 45px;">{{ $admin->branch_office_name }} - Customers</h5>
                @if($customers->isEmpty())
                    <p>No Customers found for this branch.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>City of Deployment</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->customers_name }}</td>
                                <td>{{ $customer->city_of_deployment }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->email }}</td>
                                <td><a href="{{ route('viewcustomer', $customer->id) }}">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <!--Tabs forDetails-->

                <!--Dialy Branch Report-->
            
                <!-- add more consultant -->
                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion10">
                    @foreach ($admin->reports as $index => $report)
                        <!-- Initial Accordion Item -->
                        <div class="accordion-item signaccordion-item10" id="signatoryEntry10">
                            <h2 class="accordion-header" id="signatoryHeading{{ $index + 1 }}" style="color: white">
                                <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse" data-target="#signatoryCollapse{{ $index + 1 }}" aria-expanded="true" aria-controls="signatoryCollapse{{ $index + 1 }}">
                                    Report Entry {{ $index + 1 }}
                                </button>
                            </h2>
                            <div id="signatoryCollapse{{ $index + 1 }}" class="collapse show" aria-labelledby="signatoryHeading{{ $index + 1 }}">
                                <div class="accordion-body">
                                    <input type="hidden" name="reports[{{ $index }}][r_id]" value="{{ $report->id }}">
                                    <!-- Your content for signatory entry goes here -->
                                    <div class="row mb-2" id="signatoryDetailsContainer10">
                                        <div class="col-lg-12" id="consultant_add_fields">
                                        <div class=" row mb-2">
                                            <div class="col-lg-4 spacing-left"> Date <br> <input class="form-control" id="" name="reports[{{ $index }}][report_date]" value="{{ $report->report_date }}" type="date" placeholder="..." style="width: 103%;"> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> Branch Name <br> <input class="form-control" id="" name="reports[{{ $index }}][branch]" value="{{ $report->branch }}"  type="text" placeholder="..." style="width: 97%;" readonly> </div>
                                            <div class="col-lg-4 spacing-right"> Branch ID <br> <input class="form-control" id="" name="reports[{{ $index }}][site_id]" value="{{ $report->site_id }}" type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            
                                            <div class="col-lg-4 spacing-left"> Location <br> <input class="form-control" id="" name="reports[{{ $index }}][location]" value="{{ $report->location }}"  type="text" placeholder="..." style="width: 103%;" readonly> </div>
                                            <div class="col-lg-4 spacing-right"> Authorized Guards <br> <input class="form-control" id="" name="reports[{{ $index }}][auth_guards]" value="{{ $report->auth_guards }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left"> Army <br> <input class="form-control" id=""  name="reports[{{ $index }}][army]" value="{{ $report->army }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left"> SSG <br> <input class="form-control" id="" name="reports[{{ $index }}][ssg]" value="{{ $report->ssg }}"  type="text" placeholder="..." style="width: 103%;" readonly> </div>
                                        </div>
                                        <div class=" row mb-2">
                                            <div class="col-lg-4 spacing-right"> Civil <br> <input class="form-control" id="" name="reports[{{ $index }}][civil]" value="{{ $report->civil }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> Absentees <br> <input class="form-control" id="" name="reports[{{ $index }}][absente]" value="{{ $report->absente }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> Leave <br> <input class="form-control" id="" name="reports[{{ $index }}][leave]" value="{{ $report->leave }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-right"> Reason <br> <input class="form-control" id="" name="reports[{{ $index }}][reason]" value="{{ $report->reason }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> Reliver Provided <br> <input class="form-control" id="" name="reports[{{ $index }}][r_provided]" value="{{ $report->r_provided }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> Last Complaint Date <br> <input class="form-control" id="" name="reports[{{ $index }}][last_comp_date]" value="{{ $report->last_comp_date }}"  type="date" placeholder="..." style="width: 100%;" readonly> </div>
                                        </div>
                                        <div class=" row mb-2">
                                            <div class="col-lg-4 spacing-right"> Any Incident & Report No <br> <input class="form-control" id="" name="reports[{{ $index }}][any_inc]" value="{{ $report->any_inc }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-right"> Pending Nadra Versys <br> <input class="form-control" id="" name="reports[{{ $index }}][pending_nadra]" value="{{ $report->pending_nadra }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> Unsent DPO Reports <br> <input class="form-control" id="" name="reports[{{ $index }}][unsent_dpo_rep]" value="{{ $report->unsent_dpo_rep }}"  type="text" placeholder="..." style="width: 100%;" readonly></input> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> No. of resigns <br> <input class="form-control" id="" name="reports[{{ $index }}][no_of_resigns]" value="{{ $report->no_of_resigns }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-right"> Guards without bank started <br> <input class="form-control" id="" name="reports[{{ $index }}][guards_wout_bank]" value="{{ $report->guards_wout_bank }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> Any new Site Started <br> <input class="form-control" id="" name="reports[{{ $index }}][any_new_site]" value="{{ $report->any_new_site }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-4 spacing-left spacing-right"> No. of Guards <br> <input class="form-control" id="" name="reports[{{ $index }}][no_of_guards]" value="{{ $report->no_of_guards }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> Any Site Closed <br> <input class="form-control" id="" name="reports[{{ $index }}][any_site_closed]" value="{{ $report->any_site_closed }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> No. of Guards of Closed Site <br> <input class="form-control" id="" name="reports[{{ $index }}][no_of_guards_of_closed_site]" value="{{ $report->no_of_guards_of_closed_site }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-right"> Details of Escort Duties <br> <textarea class="form-control" id="" name="reports[{{ $index }}][escort_duties]" type="text" placeholder="..." style="width: 100%;" readonly>{{ $report->escort_duties }}</textarea> </div>
                                            <div class="col-lg-4 spacing-right"> Details of Events <br> <textarea class="form-control" id="" name="reports[{{ $index }}][event_details]" type="text" placeholder="..." style="width: 100%;" readonly>{{ $report->event_details }}</textarea> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> Amount of pending Recoveries <br> <input class="form-control" id="" name="reports[{{ $index }}][pending_recoveries]" value="{{ $report->pending_recoveries }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> Signature of Manager Accounts <br> <input class="form-control" id="" name="reports[{{ $index }}][sign_manager]" value="{{ $report->sign_manager }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-right"> Any staff on annual leave <br> <input class="form-control" id="" name="reports[{{ $index }}][staff_on_leav]" value="{{ $report->staff_on_leav }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> Any short leave of staff with Name <br> <input class="form-control" id="" name="reports[{{ $index }}][short_leav]" value="{{ $report->short_leav }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                        </div>
                                        <h5>Checklist :</h5>
                                        <div class="row mb-2">
                                            <div class="col-lg-4 spacing-left spacing-right"> Utility Bills Paid<br> <input class="form-control" id="" name="reports[{{ $index }}][utility_bills]" value="{{ $report->utility_bills }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-right">Bio Matric Working <br> <input class="form-control" id="" name="reports[{{ $index }}][bio_matric]" value="{{ $report->bio_matric }}"  type="text" placeholder="..." style="width: 100%;" readonly></div>
                                            <div class="col-lg-4 spacing-right">Bio Register Maintained  <br> <input class="form-control" id="" name="reports[{{ $index }}][bio_register]" value="{{ $report->bio_register }}"  type="text" placeholder="..." style="width: 100%;" readonly></div>
                                            <div class="col-lg-4 spacing-left spacing-right"> Office Rent Paid  <br> <input class="form-control" id="" name="reports[{{ $index }}][office_rent]" value="{{ $report->office_rent }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> UPS Working <br> <input class="form-control" id="" name="reports[{{ $index }}][ups]" value="{{ $report->ups }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-right"> Guard File Maintained  <br> <input class="form-control" id="" name="reports[{{ $index }}][guard_file]" value="{{ $report->guard_file }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right">  Guard Accomodation Rent Paid <br> <input class="form-control" id="" name="reports[{{ $index }}][guard_accomodation]" value="{{ $report->guard_accomodation }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> Any Maintainance Required  <br> <input class="form-control" id="" name="reports[{{ $index }}][any_maintainence]" value="{{ $report->any_maintainence }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> Weapon Register Maintained <br> <input class="form-control" id="" name="reports[{{ $index }}][weapon_register]" value="{{ $report->weapon_register }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-right"> CCTV Working  <br> <input class="form-control" id="" name="reports[{{ $index }}][cctv]" value="{{ $report->cctv }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right">  Attendance Register Maintained <br> <input class="form-control" id="" name="reports[{{ $index }}][attendance_register]" value="{{ $report->attendance_register }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right">  Kote Register Maintained <br> <input class="form-control" id="" name="reports[{{ $index }}][kote_register]" value="{{ $report->kote_register }}"  type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                        </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    </div> <!-- Add More and Remove Buttons -->
                    
                </div>
            
                
            
                <!-- add more Issuing Authority -->
                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion11">
                        @foreach ($admin->inventories as $index => $inventory)
                        <!-- Initial Accordion Item -->
                        <div class="accordion-item signaccordion-item11" id="signatoryEntry11{{ $index }}">
                            <h2 class="accordion-header" id="signatoryHeading11{{ $index }}" style="color: white">
                                <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse" data-target="#signatoryCollapse11{{ $index }}" aria-expanded="true" aria-controls="signatoryCollapse11{{ $index }}">
                                    Office Equipment {{ $index + 1 }}
                                </button>
                            </h2>
                            <div id="signatoryCollapse11{{ $index }}" class="collapse show" aria-labelledby="signatoryHeading11{{ $index }}">
                                <div class="accordion-body">
                                    <input type="hidden" name="inventories[{{ $index }}][i_id]" value="{{ $inventory->id }}">
                                    <!-- Your content for signatory entry goes here -->
                                    <div class="col-lg-12" id="authority_add_fields">
                                        <div class="row mb-2">
                                            <div class="col-lg-4 spacing-right"> Equipment Name <br> <input class="form-control" id=""  name="inventories[{{ $index }}][category]" value="{{ $inventory->category }}" type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-left spacing-right"> Quantity <br> <input class="form-control" id="" name="inventories[{{ $index }}][quantity]" value="{{ $inventory->quantity }}" type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-right"> Notes <br> <textarea class="form-control" id="" name="inventories[{{ $index }}][notes]" type="text" placeholder="..." style="width: 100%;" readonly>{{ $inventory->notes }}</textarea> </div>
                                            <div class="col-lg-4 spacing-right"> 
                                                <label for="branch_office_name" class="form_control mb-1 w-100">Attachments</label> 
                                                @if($inventory->attachments)
                                                    <img src="{{ asset('/' . $inventory->attachments) }}" alt="Photograph of Building" class="w-100" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Add More and Remove Buttons -->
                
                </div>
                
                {{-- Office Branding --}}
                <!-- Add More Office Branding -->
                <div class="container my-1">
                    <div class="accordion" id="brandingAccordion">
                        @foreach ($admin->brandings as $index => $branding)
                        <!-- Initial Accordion Item -->
                        <div class="accordion-item brandingaccordion-item" id="brandingEntry{{ $index }}">
                            <h2 class="accordion-header" id="brandingHeading{{ $index }}" style="color: white">
                                <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse" data-target="#brandingCollapse{{ $index }}" aria-expanded="true" aria-controls="brandingCollapse{{ $index }}">
                                    Office Branding {{ $index + 1 }}
                                </button>
                            </h2>
                            <div id="brandingCollapse{{ $index }}" class="collapse show" aria-labelledby="brandingHeading{{ $index }}">
                                <div class="accordion-body">
                                    <input type="hidden" name="brandings[{{ $index }}][b_id]" value="{{ $branding->id }}">
                                    <!-- Your content for branding entry goes here -->
                                    <div class="col-lg-12" id="branding_add_fields">
                                        <div class="row mb-2">
                                            <div class="col-lg-4 spacing-right"> Branding Type <br> <input class="form-control" id="" name="brandings[{{ $index }}][b_type]" value="{{ $branding->b_type }}" type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-right"> 
                                                <label for="branch_office_name" class="form_control mb-1 w-100">Picture of Branding</label> 
                                                @if ($branding->picture_of_b)
                                                    <div style="position: absolute; display: flex;">
                                                        <a href="{{ asset($branding->picture_of_b) }}" target="_blank">
                                                            <img src="{{ asset($branding->picture_of_b) }}" alt="Photograph of Branding" class="w-100" height="180px" width="180px">
                                                        </a>
                                                      
                                                        <a href="{{ route('admin.deleteImage', ['id' => $branding->id, 'column' => 'picture_of_b']) }}" onclick="return confirm('Are you sure you want to delete this image?')"
                                                            style="position: relative; right:13px; background: red; color: white; 
                                                            font-weight: bold; border-radius: 50%; width: 20px; height: 20px; 
                                                            text-align: center; line-height: 18px; font-size: 14px; text-decoration: none;">
                                                    x   
                                                    </a>
                                                    </div>
                                                @else
                                                    N/A
                                                @endif
                                                {{-- @if($branding->picture_of_b)
                                                    <img src="{{ asset('/' . $branding->picture_of_b) }}" alt="Photograph of Branding" class="w-100" />
                                                @endif --}}
                                            </div>
                                            <div class="col-lg-4 spacing-right"> Site of Branding <br> <input class="form-control" id="" name="brandings[{{ $index }}][site_of_b]" value="{{ $branding->site_of_b }}" type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                            <div class="col-lg-4 spacing-right"> Branding Cost <br> <input class="form-control" id="" name="brandings[{{ $index }}][cost_of_b]" value="{{ $branding->cost_of_b }}" type="text" placeholder="..." style="width: 100%;" readonly> </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-4 spacing-right">
                                                Periodical Maintenance <br> <input class="form-control" type="text" name="periodical_m[]" name="brandings[{{ $index }}][periodical_m]" value="{{ $branding->periodical_m }}" placeholder="" style="width: 100%;" readonly>
                                            </div>  
                                        </div>
                                        
                                        <div class="col-lg-4 spacing-right" id="maintenanceDateField" style="display: none;">
                                            Maintenance Date <br> 
                                            <input class="form-control" type="text" name="maintenance_date[]" name="brandings[{{ $index }}][maintenance_date]" value="{{ $branding->maintenance_date }}" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="row mb-2">
                                            <h5>Details of Vendor</h5>
                                            <div class="col-lg-3 spacing-left" >
                                                Vendor ID/No. <br> <input class="form-control" type="text" name="brandings[{{ $index }}][vendor_id]" value="{{ $branding->vendor_id }}" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Vendor Name<br> <input class="form-control" id="inpFile2" type="text" name="brandings[{{ $index }}][v_name]" value="{{ $branding->v_name }}" placeholder="..." style="width: 100%;" readonly ></textarea>
                                            </div>
                                            <div class="col-lg-3 spacing-left" >
                                                Vendor Cell Number. <br> <input class="form-control" type="text" name="brandings[{{ $index }}][v_cell]" value="{{ $branding->v_cell }}" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Office Number<br> <input class="form-control" id="inpFile2" type="text" name="brandings[{{ $index }}][v_office]" value="{{ $branding->v_office }}" placeholder="..." style="width: 100%;" readonly >
                                            </div>
                                            <div class="col-lg-3 spacing-left" >
                                                Floor <br> <input class="form-control" type="text" name="brandings[{{ $index }}][v_floor]" value="{{ $branding->v_floor }}" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Building<br> <input class="form-control" id="inpFile2" type="text" name="brandings[{{ $index }}][v_building]" value="{{ $branding->v_building }}" placeholder="..." style="width: 100%;" readonly >
                                            </div>
                                            <div class="col-lg-3 spacing-left" >
                                                Block <br> <input class="form-control" type="text" name="brandings[{{ $index }}][v_block]" value="{{ $branding->v_block }}" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Area <br> <input class="form-control" id="inpFile2" type="text" name="brandings[{{ $index }}][v_area]" value="{{ $branding->v_area }}" placeholder="..." style="width: 100%;" readonly >
                                            </div>
                                            <div class="col-lg-3 spacing-left" >
                                                City <br> <input class="form-control" type="text" name="brandings[{{ $index }}][v_city]" value="{{ $branding->v_city }}" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Photograph of Building<br> <input class="form-control" id="inpFile2" type="text" name="brandings[{{ $index }}][v_photo_b]" value="{{ $branding->v_photo_b }}" placeholder="..." style="width: 100%;" readonly >
                                            </div>
                                            <div class="col-lg-3 spacing-left" >
                                                Pin Location <br> <input class="form-control" type="text" name="brandings[{{ $index }}][v_pin]" value="{{ $branding->v_pin }}" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Notes<br> <textarea class="form-control" id="inpFile2" type="text" name="brandings[{{ $index }}][v_notes]"  placeholder="..." style="width: 100%;" readonly >{{ $branding->v_notes }}</textarea>
                                            </div>
                                            <!--<div class="col-lg-3 spacing-left" >-->
                                            <!--    Attachments <br> <input class="form-control" type="file" name="brandings[{{ $index }}][v_attach]" value="{{ $branding->v_attach }}" placeholder="..." style="width: 100%;" readonly>-->
                                            <!--</div>-->
                                            <div class="col-lg-3 spacing-right"> 
                                                <label for="branch_office_name" class="form_control mb-1 w-100">Attachments</label> 
                                                {{-- @if($branding->v_attach)
                                                    <img src="{{ asset('/' . $branding->v_attach) }}" alt="Photograph of Vendor" class="w-100" />
                                                @endif --}}
                                                @if ($branding->v_attach)
                                                    <div style="display: flex;">
                                                        <a href="{{ asset($branding->v_attach) }}" target="_blank">
                                                            <img src="{{ asset($branding->v_attach) }}" alt="Photograph of Vendor" class="w-100" height="180px" width="180px">
                                                        </a>
                                                              <a href="{{ route('admin.deleteImage', ['id' => $branding->id, 'column' => 'v_attach']) }}" onclick="return confirm('Are you sure you want to delete this image?')"
                                                            style="position: relative; right:13px; background: red; color: white; 
                                                            font-weight: bold; border-radius: 50%; width: 20px; height: 20px; 
                                                            text-align: center; line-height: 18px; font-size: 14px; text-decoration: none;">x</a>

                                                    </div>
                                                @else
                                                    N/A
                                                @endif
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Add More and Remove Buttons -->
                    
                </div>
            
                {{-- MoveAble Assets --}}
                <div class="row">
                    <div class="container my-1">
                        <div class="accordion" id="signatoryAccordion13">
                            @foreach ($admin->moveables as $index => $moveable)
                            <!-- Initial Accordion Item -->
                            <div class="accordion-item signaccordion-item13" id="signatoryEntry13{{ $index }}">
                                    <h2 class="accordion-header" id="signatoryHeading13{{ $index }}" style="color: white"> 
                                        <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse" data-target="#signatoryCollapse13{{ $index }}" aria-expanded="true" aria-controls="signatoryCollapse13{{ $index }}">
                                        Vehicle {{ $index + 1}}
                                    </button> 
                                    </h2>
                                <div id="signatoryCollapse13{{ $index }}" class="collapse show" aria-labelledby="signatoryHeading13{{ $index }}">
                                    <div class="accordion-body">
                                        <input type="hidden" name="moveables[{{ $index }}][m_id]" value="{{ $moveable->id }}">
                                        <div class="col-lg-12">
                                            <div class="row mb-2">
                                                <div class="col-lg-3 spacing-left spacing-right">
                                                    Type of Vehicle<br> <input class="form-control"
                                                        name="moveables[{{ $index }}][type_of_vehicle]" value="{{ $moveable->type_of_vehicle }}" type="text"
                                                        placeholder="..." style="width: 100%;" readonly>
                                                </div>
                                                <div class="col-lg-3 spacing-left spacing-right">
                                                    Vehicle No <br> <input class="form-control"
                                                        name="moveables[{{ $index }}][vehicle_no]" value="{{ $moveable->vehicle_no }}" type="text"
                                                        placeholder="..." style="width: 100%;" readonly>
                                                </div>
                                                <div class="col-lg-3 spacing-left spacing-right">
                                                Vehicle Model <br> <input class="form-control"
                                                    name="moveables[{{ $index }}][vehicle_model]" value="{{ $moveable->vehicle_model }}" type="text"
                                                    placeholder="..." style="width: 100%;" readonly>
                                                </div>
                                                <!--<div class="col-lg-3 spacing-right">-->
                                                <!--    Vehicle Picture <br> <input class="form-control" -->
                                                <!--        name="moveables[{{ $index }}][vehicle_pic]" value="{{ $moveable->vehicle_pic }}" type="file" placeholder="..."-->
                                                <!--        style="width: 100%;" readonly>-->
                                                <!--</div>-->
                                                <div class="col-lg-3 spacing-right"> 
                                                    <label for="branch_office_name" class="form_control mb-1 w-100">Vehicle Picture</label> 
                                                    @if($moveable->vehicle_pic)
                                                        <img src="{{ asset('/' . $moveable->vehicle_pic) }}" alt="Photograph of Vehicle" class="w-100" />
                                                    @endif
                                                </div>
                                                <!--<div class="col-lg-3 spacing-left spacing-right">-->
                                                <!--    Vehicle Book Picture <br> <input class="form-control"-->
                                                <!--    name="moveables[{{ $index }}][vehicle_book_pic]" value="{{ $moveable->vehicle_book_pic }}" type="file"-->
                                                <!--    placeholder="..." style="width: 100%;" readonly>-->
                                                <!--</div>-->
                                                <div class="col-lg-3 spacing-right"> 
                                                    <label for="branch_office_name" class="form_control mb-1 w-100">Vehicle Book Picture</label> 
                                                    @if($moveable->vehicle_book_pic)
                                                        <img src="{{ asset('/' . $moveable->vehicle_book_pic) }}" alt="Photograph of MoveAble Vehicle" class="w-100" />
                                                    @endif
                                                </div>
                                                <div class="col-lg-3 spacing-left">
                                                Payment Type <br> <input class="form-control" 
                                                    name="moveables[{{ $index }}][payment_type]" value="{{ $moveable->payment_type }}" type="text" placeholder="..."
                                                    style="width: 100%;" readonly>
                                                </div>
                                                <div class="col-lg-3 spacing-left spacing-right">
                                                    Vehicle Name <br> <input class="form-control"
                                                        name="moveables[{{ $index }}][vehicle_name]" value="{{ $moveable->vehicle_name }}" type="text"
                                                        placeholder="..." style="width: 100%;" readonly>
                                                </div>
                                                <div class="col-lg-3 spacing-left spacing-right">
                                                    Engine No. <br> <input class="form-control"
                                                        name="moveables[{{ $index }}][engine_no]" value="{{ $moveable->engine_no }}" type="text"
                                                        placeholder="..." style="width: 100%;" readonly>
                                                </div>
                                                <div class="col-lg-3 spacing-right">
                                                    Chasis No. <br> <input class="form-control" 
                                                        name="moveables[{{ $index }}][chasis_no]" value="{{ $moveable->chasis_no }}" type="text" placeholder="..."
                                                        style="width: 100%;" readonly>
                                                </div>
                                                <div class="col-lg-3 spacing-left spacing-right">
                                                    Vehicle Color <br> <input class="form-control"
                                                        name="moveables[{{ $index }}][vehicle_color]" value="{{ $moveable->vehicle_color }}" type="text"
                                                        placeholder="..." style="width: 100%;" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div> <!-- Add More and Remove Buttons -->
                        
                    </div>
                    {{-- <table class="table table-bordered mt-1" id="signatorySummaryTable13">
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
                <!-- Modify this area to include the form fields related to cars -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container  my-1" id="armourContainer" >
                        <div class="accordion" id="armourAccordion" >
                            @foreach ($admin->tokens as $index => $token)
                            <!-- Initial Accordion Item -->
                            <div class="accordion-item armouraccordion-item" id="armourEntry1{{ $index }}">
                                <h2 class="accordion-header" id="armourHeading1{{ $index }}" style="color: white">
                                    <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#armourCollapse1{{ $index }}" aria-expanded="true" aria-controls="armourCollapse1{{ $index }}">
                                        Token Entry {{ $index + 1 }}
                                    </button>
                                </h2>
                                <div id="armourCollapse1{{ $index }}" class="collapse show" aria-labelledby="armourHeading1{{ $index }}">
                                    <div class="accordion-body">
                                        <input type="hidden" name="tokens[{{ $index }}][t_id]" value="{{ $token->id }}">
                                        <div id="cleaningInfo">
                                            <div class="row col-lg-12">
                                                <div class="col-lg-4 spacing-right">
                                                    Amount Paid <br> <input class="form-control"  type="text" name="tokens[{{ $index }}][amount_paid]" value="{{ $token->amount_paid }}" placeholder="..." style="width: 100%;" readonly>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Type of Payment<br> <input class="form-control"  type="text" name="tokens[{{ $index }}][type_of_payment]" value="{{ $token->type_of_payment }}" placeholder="..." style="width: 100%;" readonly>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Instrument Number <br> <input class="form-control" type="text" name="tokens[{{ $index }}][ins_no]" value="{{ $token->ins_no }}" placeholder="..." style="width: 100%;" readonly>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Voucher No. <br> <input class="form-control" type="text" name="tokens[{{ $index }}][voucher_no]" value="{{ $token->voucher_no }}" placeholder="..." style="width: 100%;" readonly>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Payment Date <br> <input class="form-control" type="date" name="tokens[{{ $index }}][payment_date]" value="{{ $token->payment_date }}" placeholder="..." style="width: 100%;" readonly>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Notes <br> <textarea class="form-control" type="text" name="tokens[{{ $index }}][token_note]" placeholder="..." style="width: 100%;" readonly>{{ $token->token_note }}</textarea>
                                                </div>
                                                <div class="col-lg-3 spacing-right"> 
                                                    <label for="branch_office_name" class="form_control mb-1 w-100"> Attachment </label> 
                                                    @if($token->token_attach)
                                                        <img src="{{ asset('/' . $token->token_attach) }}" alt="Photograph of Token" class="w-100" />
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- Add More and Remove Buttons -->
                    
                        </div>
                        <div class="col-lg-4 spacing-right">
                        Next Token Payment Date <br> <input class="form-control" type="text" name="next_payment_date[]" placeholder="alert" style="width: 100%;" readonly>
                        </div>
                        {{-- <table class="table table-bordered mt-3" id="armourSummaryTable">
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
                
                {{-- Insurrance Company Tab --}} 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container  my-1" id="auditContainer" >
                        <div class="accordion" id="auditAccordion" >
                            @foreach ($admin->insurrances as $index => $insurrance)
                            <!-- Initial Accordion Item -->
                            <div class="accordion-item auditaccordion-item" id="auditEntry1{{ $index }}">
                                <h2 class="accordion-header" id="auditHeading1{{ $index }}" style="color: white">
                                    <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#auditCollapse1{{ $index }}" aria-expanded="true" aria-controls="auditCollapse1{{ $index }}">
                                        Insurance Company Details {{ $index + 1 }}
                                    </button>
                                </h2>
                                <div id="auditCollapse1{{ $index }}" class="collapse show" aria-labelledby="auditHeading1{{ $index }}">
                                    <div class="accordion-body">
                                        <input type="hidden" name="insurrances[{{ $index }}][ins_id]" value="{{ $insurrance->id }}">
                                        <div class=" row main-content div" id="auditsInfo">
                                            <div class="col-lg-12">
                                                <h5>POC :</h5>
                                                <div class="row mb-2">
                                                    <div class="col-lg-3 spacing-right">
                                                        Company Name : <br> <input class="form-control" name="insurrances[{{ $index }}][company_name]" value="{{ $insurrance->company_name }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                                    </div>
                                                    <div class="col-lg-3 spacing-left spacing-right">
                                                        Name <br> <input class="form-control" name="insurrances[{{ $index }}][i_poc_name]" value="{{ $insurrance->i_poc_name }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Web <br> <input class="form-control" name="insurrances[{{ $index }}][i_poc_web]" value="{{ $insurrance->i_poc_web }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Email <br> <input class="form-control" name="insurrances[{{ $index }}][i_poc_email]" value="{{ $insurrance->i_poc_email }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Cell Number : <br> <input class="form-control" name="insurrances[{{ $index }}][i_poc_cell]" value="{{ $insurrance->i_poc_cell }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                                    </div>
                                                    <div class="col-lg-3 spacing-left spacing-right">
                                                        Value of Sum Insured <br> <input class="form-control" name="insurrances[{{ $index }}][value_of_sum]" value="{{ $insurrance->value_of_sum }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                                    </div>
                                                    <!--<div class="col-lg-3 spacing-right">-->
                                                    <!--    Insurance Policy Attachment <br> <input class="form-control" name="insurrances[{{ $index }}][ins_p_pic]" value="{{ $insurrance->ins_p_pic }}" type="file" placeholder="..." style="width: 100%;" readonly>-->
                                                    <!--</div>-->
                                                    <div class="col-lg-3 spacing-right"> 
                                                        <label for="branch_office_name" class="form_control mb-1 w-100"> Insurance Policy Attachment </label> 
                                                        @if($insurrance->ins_p_pic)
                                                            <img src="{{ asset('/' . $insurrance->ins_p_pic) }}" alt="Photograph of Insurrance" class="w-100" />
                                                        @endif
                                                    </div>
                                                    <!--<div class="col-lg-3 spacing-right">-->
                                                    <!--    Certificate of Insurrance <br> <input class="form-control" name="insurrances[{{ $index }}][c_of_ins]" value="{{ $insurrance->c_of_ins }}" type="file" placeholder="..." style="width: 100%;" readonly>-->
                                                    <!--</div>-->
                                                    
                                                     <div class="col-lg-3 spacing-right"> 
                                                        <label for="branch_office_name" class="form_control mb-1 w-100"> Certificate of Insurrance  </label> 
                                                        @if($insurrance->ins_p_pic)
                                                            <img src="{{ asset('/' . $insurrance->c_of_ins) }}" alt="Photograph of Insurrance" class="w-100" />
                                                        @endif
                                                    </div>
                                                    
                                                    <h5>Address</h5>
                                                    <div class="col-lg-3 spacing-right">
                                                        Office No. : <br> <input class="form-control" name="insurrances[{{ $index }}][i_poc_office]" value="{{ $insurrance->i_poc_office }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                                    </div>
                                                    <div class="col-lg-3 spacing-left spacing-right">
                                                        Floor No. <br> <input class="form-control" name="insurrances[{{ $index }}][i_poc_floor]" value="{{ $insurrance->i_poc_floor }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Building <br> <input class="form-control" name="insurrances[{{ $index }}][i_poc_building]" value="{{ $insurrance->i_poc_building }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Block <br> <input class="form-control" name="insurrances[{{ $index }}][i_poc_block]" value="{{ $insurrance->i_poc_block }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Area <br> <input class="form-control" name="insurrances[{{ $index }}][i_poc_area]" value="{{ $insurrance->i_poc_area }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                                    </div>
                                                    <div class="col-lg-3 spacing-left spacing-right">
                                                        City <br> <input class="form-control" name="insurrances[{{ $index }}][i_poc_city]" value="{{ $insurrance->i_poc_city }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Photograph of Location <br> <input class="form-control" name="insurrances[{{ $index }}][i_poc_loc]" value="{{ $insurrance->i_poc_loc }}" type="file" placeholder="..." style="width: 100%;" readonly>
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Pin Location <br> <input class="form-control" name="insurrances[{{ $index }}][i_poc_pin]" value="{{ $insurrance->i_poc_pin }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right mt-2">
                                                Notes <br>
                                                <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="insurrances[{{ $index }}][ins_note]" rows="2" cols="38" readonly>
                                                    {{ $insurrance->ins_note }}
                                                </textarea>
                                                </div>
                                                <!--<div class="col-lg-6 spacing-left spacing-right mt-2">-->
                                                <!--    Attachments <br> <input class="form-control" name="insurrances[{{ $index }}][ins_attach]" value="{{ $insurrance->ins_attach }}" type="file" placeholder="..." style="width: 70%;" multiple>-->
                                                <!--</div>-->
                                                
                                                <div class="col-lg-3 spacing-right"> 
                                                    <label for="branch_office_name" class="form_control mb-1 w-100"> Certificate of Insurrance  </label> 
                                                    @if($insurrance->ins_p_pic)
                                                        <img src="{{ asset('/' . $insurrance->ins_attach) }}" alt="Photograph of Insurrance" class="w-100" />
                                                    @endif
                                                </div>
                                            </div>
                                            
                                        </div>
                                            
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    
                        <!-- Add More and Remove Buttons -->
                    

                        
                        </div>
                        {{-- <table class="table table-bordered mt-3" id="auditSummaryTable">
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
                        </table>  --}}
                        {{-- <button type="button" class="btn btn-primary saveButton" data-next-tab="#address-details">Save and Next</button> --}}
                    </div>
                </div>
            
                {{-- Tracking Company --}}
                <div class="container  my-1" id="promactContainer" >
                    <div class="accordion" id="promactAccordion" >
                        <!-- Initial Accordion Item -->
                        @foreach ($admin->trackers as $index => $tracker)
                        <div class="accordion-item promactaccordion-item" id="promactEntry1{{ $index }}">
                            <h2 class="accordion-header" id="promactHeading1{{ $index }}" style="color: white">
                                <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#promactCollapse1{{ $index }}" aria-expanded="true" aria-controls="promactCollapse1{{ $index }}">
                                    Tracker Details {{ $index + 1 }}
                                </button>
                            </h2>
                            <div id="promactCollapse1{{ $index }}" class="collapse show" aria-labelledby="promactHeading1{{ $index }}">
                                <div class="accordion-body">
                                <input type="hidden" name="trackers[{{ $index }}][tr_id]" value="{{ $tracker->id }}">
                                <div class=" row main-content div" id="">
                                    
                                    <div class="col-lg-12">
                                        <h5>POC :</h5>
                                        <div class="row mb-2">
                                            <div class="col-lg-3 spacing-right">
                                                Company Name : <br> <input class="form-control" name="trackers[{{ $index }}][tracker_company_name]" value="{{ $tracker->tracker_company_name }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Name <br> <input class="form-control" name="trackers[{{ $index }}][t_poc_name]" value="{{ $tracker->t_poc_name }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Web <br> <input class="form-control" name="trackers[{{ $index }}][t_poc_web]" value="{{ $tracker->t_poc_web }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Email <br> <input class="form-control" name="trackers[{{ $index }}][t_poc_email]" value="{{ $tracker->t_poc_email }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>

                                            <div class="col-lg-3 spacing-right">
                                                Cell Number : <br> <input class="form-control" name="trackers[{{ $index }}][t_poc_cell]" value="{{ $tracker->t_poc_cell }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <h5>Address</h5>
                                            <div class="col-lg-3 spacing-right">
                                                Office No. : <br> <input class="form-control" name="trackers[{{ $index }}][t_poc_office]" value="{{ $tracker->t_poc_office }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Floor No. <br> <input class="form-control" name="trackers[{{ $index }}][t_poc_floor]" value="{{ $tracker->t_poc_floor }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Building <br> <input class="form-control" name="trackers[{{ $index }}][t_poc_building]" value="{{ $tracker->t_poc_building }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Block <br> <input class="form-control" name="trackers[{{ $index }}][t_poc_block]" value="{{ $tracker->t_poc_block }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>

                                            <div class="col-lg-3 spacing-right">
                                                Area <br> <input class="form-control" name="trackers[{{ $index }}][t_poc_area]" value="{{ $tracker->t_poc_area }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                City <br> <input class="form-control" name="trackers[{{ $index }}][t_poc_city]" value="{{ $tracker->t_poc_city }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            
                                            <!--<div class="col-lg-3 spacing-right">-->
                                            <!--    Photograph of Location <br> <input class="form-control" name="trackers[{{ $index }}][t_poc_loc]" value="{{ $tracker->t_poc_loc }}" type="file" placeholder="..." style="width: 100%;" readonly>-->
                                            <!--</div>-->
                                            
                                            <div class="col-lg-3 spacing-right"> 
                                                <label for="branch_office_name" class="form_control mb-1 w-100"> Photograph of Location  </label> 
                                                @if($tracker->t_poc_loc)
                                                    <img src="{{ asset('/' . $tracker->t_poc_loc) }}" alt="Photograph of Tracker Company" class="w-100" />
                                                @endif
                                            </div>
                                                
                                                
                                            <div class="col-lg-3 spacing-right">
                                                Pin Location <br> <input class="form-control" name="trackers[{{ $index }}][t_poc_pin]" value="{{ $tracker->t_poc_pin }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-2">
                                        <div class="col-lg-6 spacing-right mt-2">
                                        Notes <br>
                                        <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="trackers[{{ $index }}][tracker_note]" rows="2" cols="38" readonly>
                                            {{ $tracker->tracker_note }}
                                        </textarea>
                                        </div>
                                        <!--<div class="col-lg-6 spacing-left spacing-right mt-2">-->
                                        <!--    Attachments <br> <input class="form-control" name="trackers[{{ $index }}][tracker_attach]" value="{{ $tracker->tracker_attach }}" type="file" placeholder="..." style="width: 70%;" multiple>-->
                                        <!--</div>-->
                                        
                                        <div class="col-lg-3 spacing-right"> 
                                            <label for="branch_office_name" class="form_control mb-1 w-100">Attachments</label> 
                                            @if($tracker->tracker_attach)
                                                <img src="{{ asset('/' . $tracker->tracker_attach) }}" alt="Photograph of Tracker Attchment" class="w-100" />
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Add More and Remove Buttons -->
                
                </div>
            
                {{-- Repair & Maintenance --}}
                <div class="accordion" id="notificationAccordion" >
                    <!-- Initial Accordion Item -->
                    @foreach ($admin->repairs as $index => $repair)
                    <div class="accordion-item notificationaccordion-item" id="notificationEntry1{{ $index }}">
                        <h2 class="accordion-header" id="notificationHeading1{{ $index }}" style="color: white">
                            <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#notificationCollapse1{{ $index }}" aria-expanded="true" aria-controls="notificationCollapse1{{ $index }}">
                                Repair & Maintenance {{ $index + 1 }}
                            </button>
                        </h2>
                        <div id="notificationCollapse1{{ $index }}" class="collapse show" aria-labelledby="notificationHeading1{{ $index }}">
                            <div class="accordion-body">
                            <input type="hidden" name="repairs[{{ $index }}][r_id]" value="{{ $repair->id }}">
                            <div class=" row main-content div" id="">
                                <div class="col-lg-12"> 
                                    <div class="row mb-2">
                                        <div class="col-lg-3 spacing-right">
                                            Serial No. <br> <input class="form-control" name="repairs[{{ $index }}][serial_no]" value="{{ $repair->serial_no }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="col-lg-3 spacing-left spacing-right">
                                            Description <br> <input class="form-control" name="repairs[{{ $index }}][r_desc]" value="{{ $repair->r_desc }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Amount of Bill <br> <input class="form-control" name="repairs[{{ $index }}][r_amount]" value="{{ $repair->r_amount }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Payment Made By <br> <input class="form-control" name="repairs[{{ $index }}][r_pay_by]" value="{{ $repair->r_pay_by }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Date <br> <input class="form-control" name="repairs[{{ $index }}][r_date]" value="{{ $repair->r_date }}" type="date" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <h5>Vendor Details :</h5>
                                        <div class="col-lg-3 spacing-right">
                                            Company Name : <br> <input class="form-control" name="repairs[{{ $index }}][repair_company_name]" value="{{ $repair->repair_company_name }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="col-lg-3 spacing-left spacing-right">
                                            Name <br> <input class="form-control" name="repairs[{{ $index }}][r_poc_name]" value="{{ $repair->r_poc_name }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Web <br> <input class="form-control" name="repairs[{{ $index }}][r_poc_web]" value="{{ $repair->r_poc_web }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Email <br> <input class="form-control" name="repairs[{{ $index }}][r_poc_email]" value="{{ $repair->r_poc_email }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Cell Number : <br> <input class="form-control" name="repairs[{{ $index }}][r_poc_cell]" value="{{ $repair->r_poc_cell }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <h5>Address</h5>
                                        <div class="col-lg-3 spacing-right">
                                            Office No. : <br> <input class="form-control" name="repairs[{{ $index }}][r_poc_office]" value="{{ $repair->r_poc_office }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="col-lg-3 spacing-left spacing-right">
                                            Floor No. <br> <input class="form-control" name="repairs[{{ $index }}][r_poc_floor]" value="{{ $repair->r_poc_floor }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Building <br> <input class="form-control" name="repairs[{{ $index }}][r_poc_building]" value="{{ $repair->r_poc_building }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Block <br> <input class="form-control" name="repairs[{{ $index }}][r_poc_block]" value="{{ $repair->r_poc_block }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>

                                        <div class="col-lg-3 spacing-right">
                                            Area <br> <input class="form-control" name="repairs[{{ $index }}][r_poc_area]" value="{{ $repair->r_poc_area }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="col-lg-3 spacing-left spacing-right">
                                            City <br> <input class="form-control" name="repairs[{{ $index }}][r_poc_city]" value="{{ $repair->r_poc_city }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        
                                        <!--<div class="col-lg-3 spacing-right">-->
                                        <!--    Photograph of Location <br> <input class="form-control" name="repairs[{{ $index }}][r_poc_loc]" value="{{ $repair->r_poc_loc }}" type="file" placeholder="..." style="width: 100%;" readonly>-->
                                        <!--</div>-->
                                        
                                        <div class="col-lg-3 spacing-right"> 
                                            <label for="branch_office_name" class="form_control mb-1 w-100"> Photograph of Location </label> 
                                            @if($repair->r_poc_loc)
                                                <img src="{{ asset('/' . $repair->r_poc_loc) }}" alt="Photograph of Repair Location" class="w-100" />
                                            @endif
                                        </div>
                                        
                                        <div class="col-lg-3 spacing-right">
                                            Pin Location <br> <input class="form-control" name="repairs[{{ $index }}][r_poc_pin]" value="{{ $repair->r_poc_pin }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                    </div>
                                </div>
                                <h5>Any Warranty :</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                                    Any Warranty <br> <input class="form-control" name="repairs[{{ $index }}][r_warranty]" value="{{ $repair->r_warranty }}" type="file" placeholder="..." style="width: 70%;">
                                    </div>
                                    <div class="col-lg-6 spacing-right mt-2">
                                    Notes <br>
                                    <textarea id="w3review12" class="form-control" name="repairs[{{ $index }}][warranty_note]" rows="2" cols="38" readonly>
                                        {{ $repair->warranty_note }}
                                    </textarea>
                                    </div>
                                    
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right mt-2">
                                    Notes <br>
                                    <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="repairs[{{ $index }}][repair_note]" rows="2" cols="38" readonly>
                                    {{ $repair->repair_note }}
                                    </textarea>
                                    </div>
                                    <!--<div class="col-lg-6 spacing-left spacing-right mt-2">-->
                                    <!--    Attachments <br> <input class="form-control" name="repairs[{{ $index }}][repair_attach]" value="{{ $repair->repair_attach }}" type="file" placeholder="..." style="width: 70%;" multiple>-->
                                    <!--</div>-->
                                    
                                    <div class="col-lg-6 spacing-right"> 
                                        <label for="branch_office_name" class="form_control mb-1 w-100"> Photograph of Location </label> 
                                        @if($repair->repair_attach)
                                            <img src="{{ asset('/' . $repair->repair_attach) }}" alt="Photograph of Repair Location" class="w-100" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        
                <!-- Add More and Remove Buttons -->
            
            
                {{-- Usage & Movement --}}
                <div class="row mb-2">
                <div class="col-lg-4 spacing-right">
                    <h5 class="mt-4" style="margin-left: 20px;"><strong><i>VEHICLE LOG BOOK</i></strong></h5>
                </div>
                </div>
                <div class="container my-5" id="ItemAccordionContainer">
                <div class="accordion" id="itemAccordion">
                    @foreach ($admin->usages as $index => $usage)
                    <!-- Initial Accordion Item -->
                    <div class="accordion-item itemAccordion-item" id="itemEntry1{{ $index }}">
                        <h2 class="accordion-header" id="itemHeading1{{ $index }}" style="color: white">
                            <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse" data-target="#collapseItem1{{ $index }}" aria-expanded="true" aria-controls="collapseItem1{{ $index }}">
                                Usage/Movement {{ $index + 1 }}
                            </button>
                        </h2>
                        <div id="collapseItem1{{ $index }}" class="collapse show" aria-labelledby="itemHeading1{{ $index }}">
                            <div class="accordion-body">
                                <input type="hidden" name="usages[{{ $index }}][u_id]" value="{{ $usage->id }}">
                                <div id="vendorDetailsContainer">
                                    <div class="form-type col-lg-12 spacing-right">
                                        <div class="d-flex mt-2">
                                            <div class="col-lg-6 spacing-right">
                                                Vehicle No.  <br>  <input class="form-control" type="text" name="usages[{{ $index }}][usage_vehicle_no]" value="{{ $usage->usage_vehicle_no }}" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-lg-6 spacing-left spacing-right">
                                                Average Per Liter: <br>  <input class="form-control" type="text" name="usages[{{ $index }}][avg_per_liter]" value="{{ $usage->avg_per_liter }}" placeholder="" style="width: 100%;" readonly>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="col-md-3">
                                                Date <br> <input class="form-control" name="usages[{{ $index }}][date_of_m]" value="{{ $usage->date_of_m }}" type="date" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                Time From <br> <input class="form-control" name="usages[{{ $index }}][time_from]" value="{{ $usage->time_from }}" type="time" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                Time To  <br> <input class="form-control" name="usages[{{ $index }}][time_to]" value="{{ $usage->time_to }}" type="time" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                Details Of Journey <br> <textarea class="form-control"  name="usages[{{ $index }}][details_of_j]" type="text" placeholder="..." style="width: 100%;" readonly>{{ $usage->details_of_j }}</textarea>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="col-md-3">
                                                Purpose Of Journey<br> <input class="form-control loi-price" name="usages[{{ $index }}][purpose_of_j]" value="{{ $usage->purpose_of_j }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                Name of Officer <br> <input class="form-control" name="usages[{{ $index }}][name_of_officer]" value="{{ $usage->name_of_officer }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                Meter Reading to <br> <input class="form-control" name="usages[{{ $index }}][meter_reading_to]" value="{{ $usage->meter_reading_to }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                Meter Reading From <br> <input class="form-control" name="usages[{{ $index }}][meter_reading_from]" value="{{ $usage->meter_reading_from }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-md-3 spacing-left">
                                            Distance Covered <input class="form-control" type="text" name="usages[{{ $index }}][distance_covered]" value="{{ $usage->distance_covered }}" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            Signature<br> <input class="form-control" name="usages[{{ $index }}][signature]" value="{{ $usage->signature }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            P.O.L Drawn<br> <input class="form-control" name="usages[{{ $index }}][p_o_l]" value="{{ $usage->p_o_l }}" type="text" placeholder="..." style="width: 100%;" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            Remarks<br> <input class="form-control" name="usages[{{ $index }}][remarks]" value="{{ $usage->remarks }}" type="text" placeholder="..." style="width: 100%;" readonly>
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
                    </div>
                    <div class="col-lg-3">
                    </div>
                    
                </div>
                </div>
                
            
            
                {{-- Notifications --}}
                
                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion12">
                        <!-- Initial Accordion Item -->
                        @foreach ($admin->notifications as $index => $notification)
                        <div class="accordion-item signaccordion-item12" id="signatoryEntry12{{ $index }}">
                            <h2 class="accordion-header" id="signatoryHeading12{{ $index }}" style="color: white">
                                <button class="accordion-button"
                                    style="background-color: #34005A; color:white" type="button"
                                    data-toggle="collapse" data-target="#signatoryCollapse12{{ $index }}"
                                    aria-expanded="true" aria-controls="signatoryCollapse12{{ $index }}">
                                    Notification Entry {{ $index + 1 }}
                                </button>
                            </h2>
                            <div id="signatoryCollapse12{{ $index }}" class="collapse show"
                                aria-labelledby="signatoryHeading12{{ $index }}">
                                <div class="accordion-body">
                                    <input type="hidden" name="notifications[{{ $index }}][n_id]" value="{{ $notification->id }}">
                                    <div class="col-lg-12 spacing-right">
                                        <div class="row mb-2">
                                            <div class="col-lg-3 spacing-right">
                                                Notification No.  <br>  <input class="form-control" type="text" name="notifications[{{ $index }}][notification_no]" value="{{ $notification->notification_no }}" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Notification Related to.  <br>  <input class="form-control" type="text" name="notifications[{{ $index }}][notification_related]" value="{{ $notification->notification_related }}" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                            
                                            <div class="col-lg-3">
                                                Notes. <br>  <textarea class="form-control" type="text" name="notifications[{{ $index }}][notification_notes]" placeholder="..." style="width: 100%;" readonly>{{ $notification->notification_notes }}</textarea>
                                            </div>
                                            <div class="col-lg-4 spacing-left">
                                                Attachment. <br>  <input class="form-control" type="file" name="notifications[{{ $index }}][notification_attach]" value="{{ $notification->notification_attach }}" placeholder="..." style="width: 100%;" readonly>
                                            </div> 
                                            
                                            <div class="col-lg-6 spacing-right"> 
                                                <label for="branch_office_name" class="form_control mb-1 w-100"> Attachment </label> 
                                                @if($notification->notification_attach)
                                                    <img src="{{ asset('/' . $notification->notification_attach) }}" alt="Photograph of Notification Attachment" class="mt-3 w-100" />
                                                @endif
                                            </div>
                                        </div>
                                        <h5>Notification To :</h5>
                                        <div class="row">
                                            <div class="col-lg-4 spacing-left">
                                                Notification Shared with . <br>  <input class="form-control" type="text" name="notifications[{{ $index }}][notification_to]" value="{{ $notification->notification_to }}" placeholder="..." style="width: 100%;" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Add More and Remove Buttons -->
                

                    {{-- <table class="table table-bordered mt-1" id="signatorySummaryTable12">
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
        
            {{-- <div class="footer" style="position: fixed; bottom: 0; width: 100%; background-color: #320056; padding: 10px; display: flex; justify-content: space-between; align-items: center; margin-left:-21%;"> <button type="button" name="cancel" class="btn btn-secondary" style="color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 80px;"><i>Cancel</i></button>
                <div style="display: flex; align-items: center;"> <img src="logo.png" alt="Logo" style="height: 30px; margin-right: 10px;">
                <h4 style="color: #fff; margin: 0; font-size: 14px;"><i>PIFFERS SECURITY SERVICES</i></h4>
                </div>
                <div class="dropdown" style="position: relative; display: inline-block;"> <button type="button" class="btn btn-primary" style="background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 150px;"><i style="margin-right:30px;">Submission &#8594;</i></button>
                <div class="dropdown-content" style="display: none; position: absolute; background-color: #f9f9f9; min-width: 130px; box-shadow: 0px -8px 16px 0px rgba(0,0,0,0.2); z-index: 1; bottom: 100%;"> <button type="submit" name="save_and_email" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & Email/Whatsapp</i></button> <button type="submit" name="save_and_share" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & share link</i></button> <button type="submit" name="save_and_new" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & New</i></button> <button type="submit" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & Close</i></button> </div>
                </div>
            </div> --}}
            <!--<button type="submit">Submit</button>-->
            
        </form>
   </section> <!-- </div> -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const downloadButton = document.getElementById('download-pdf');
    const sendButton = document.getElementById('send-email');
    const modal = document.getElementById('emailModal');
    const closeModal = modal.querySelector('.close');
    const sendEmailBtn = modal.querySelector('#sendEmailBtn');

    if (downloadButton && sendButton) {
        downloadButton.addEventListener('click', function() {
            downloadPDF();
        });

        sendButton.addEventListener('click', function() {
            modal.style.display = "block";
        });

        closeModal.addEventListener('click', function() {
            modal.style.display = "none";
        });

        sendEmailBtn.addEventListener('click', function() {
            sendPDFViaEmail();
        });
    } else {
        console.error('Buttons not found.');
    }
});

function downloadPDF() {
    const button = document.getElementById('download-pdf');
    if (button) {
        button.textContent = 'System is Generating PDF...';

        const element = document.getElementById('admin_form');
        if (element) {
            const options = {
                margin: 1,
                filename: 'admin_information.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf()
                .set(options)
                .from(element)
                .toPdf()
                .get('pdf')
                .then(function(pdf) {
                    console.log('PDF generated:', pdf);

                    pdf.save(options.filename);
                    button.textContent = 'PDF Generated!';
                })
                .catch(error => {
                    console.error('Error generating PDF:', error);
                    button.textContent = 'Failed to Generate PDF';
                });
        } else {
            console.error('Element with ID "admin_form" not found.');
            button.textContent = 'Failed to Generate PDF';
        }
    } else {
        console.error('Button with ID "download-pdf" not found.');
    }
}

function sendPDFViaEmail() {
    const modal = document.getElementById('emailModal');
    const emailInput = document.getElementById('emailInput');
    const ccInput = document.getElementById('ccInput');
    const bccInput = document.getElementById('bccInput');
    const subjectInput = document.getElementById('subjectInput');
    const bodyInput = document.getElementById('bodyInput');
    const button = document.getElementById('send-email');
    
    if (modal && emailInput && button) {
        modal.style.display = "none";

        button.textContent = 'System is Sending Email...';
        const email = emailInput.value;
        const cc = ccInput.value;
        const bcc = bccInput.value;
        const subject = subjectInput.value;
        const body = bodyInput.value;

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('email', email);
        formData.append('cc', cc); 
        formData.append('bcc', bcc); 
        formData.append('subject', subject);
        formData.append('body', body);

        const element = document.getElementById('admin_form');
        if (element) {
            const options = {
                margin: 1,
                filename: 'admin_information.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf()
                .set(options)
                .from(element)
                .toPdf()
                .get('pdf')
                .then(function(pdf) {
                    console.log('PDF generated:', pdf);

                    formData.append('pdf', pdf.output('blob'));

                    fetch('/public/send-pdf-email', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => {
                            console.log('Response status:', response.status);
                            console.log('Response status text:', response.statusText);
                            return response.json();
                        })
                        .then(data => {
                            console.log('Response data:', data);
                            if (data.message === 'Email sent successfully!') {
                                button.textContent = 'Email Sent!';
                            } else {
                                throw new Error('Failed to send email: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error sending email:', error);
                            button.textContent = 'Failed to Send Email';
                        });
                })
                .catch(error => {
                    console.error('Error generating PDF:', error);
                    button.textContent = 'Failed to Generate PDF';
                });
        } else {
            console.error('Element with ID "customer_form" not found.');
            button.textContent = 'Failed to Generate PDF';
        }
    } else {
        console.error('Modal or input fields not found.');
    }
}
</script>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"> </script> <!-- script for add more consultant details -->

</body>

</html>