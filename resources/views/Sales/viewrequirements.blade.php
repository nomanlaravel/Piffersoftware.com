@include('layouts.header')

@yield('main')
<!--End of the Navbar-->



<div class="customer_form">

    <div id="main" style="margin-left: 92%;">
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>

    <div id="mySidebar" class="sidebar admin-setting">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
        <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration
            Setting</a>
        <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
        <hr>
        <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
    </div>
    
    <section>
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
    <h5 style="text-align:center;"><b><u>Prospect Details</u></b></h5>
    <form  method="POST" id="sales_form"  enctype="multipart/form-data">
        @csrf
        <div>
            <div class="row mb-2">
                <div class="col-lg-4 spacing-right">
                    Prospect No <br> <input class="form-control mt-2" name="prospectNo" value="{{ $requirements->prospectNo }}"  id="prospectNo" type="text" placeholder="..."
                        style="width: 84%;">
                </div>
                <div class="col-lg-4 form-group">
                    Category:<br>
                    <div class="input-group" style="width: 88%;">
                        <input class="form-control mt-2" name="category"  value="{{ $requirements->category }}" type="text" placeholder="..."
                        style="width: 84%;">

                    </div>
                </div>
                <div class="col-lg-4 form-group">
                    RHQ :<br>
                    <div class="input-group" style="width: 88%;">
                        <input class="form-control mt-2" name="rhq" value="{{ $requirements->rhq }}" type="text" placeholder="..."
                        style="width: 84%;">
                    </div>
                </div>
                <div class="col-lg-4 form-group">
                    Branch Name  <br> <input class="form-control" name="branch_name" value="{{ $requirements->branch_name }}" type="text" placeholder="..." style="width: 88%;">

                </div>
                <div class="col-lg-4">
                    Branch Code <br> <input class="form-control" name="branch_code" value="{{ $requirements->branch_code }}" type="text" placeholder="..." style="width: 88%;">
                </div>
                <div class="col-lg-4">
                    List of Giveaways <br> <input class="form-control" name="lis_of_give" value="{{ $requirements->lis_of_give }}" type="text" placeholder="..." style="width: 88%;">
                </div>
            </div>
            <div class="mt-3 mb-3">
                <!-- Promotional Activities Dropdown -->


                <!-- <h5 class="mt-2">List of Promotional Activities</h5>
                            <div class="form-check form-check-inline spacing-left">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="negative">
                            <label class="form-check-label" for="inlineCheckbox1">Calenders</label>
                            </div>
                            <div class="form-check form-check-inline spacing-left">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="positives">
                            <label class="form-check-label" for="inlineCheckbox2">Iftar</label>
                            </div>
                            <div class="form-check form-check-inline spacing-left">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="negative">
                            <label class="form-check-label" for="inlineCheckbox1">Greeting Cards</label>
                            </div>
                            <div class="form-check form-check-inline spacing-left">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="positives">
                            <label class="form-check-label" for="inlineCheckbox2">Giveaways</label>
                            </div>
                            <div class="form-check form-check-inline spacing-left">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="negative">
                            <label class="form-check-label" for="inlineCheckbox1">Thought of the Day</label>
                            </div>
                            <div class="form-check form-check-inline spacing-left">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="positives">
                            <label class="form-check-label" for="inlineCheckbox2">Coporate SMS</label>
                            </div>
                            <div class="form-check form-check-inline spacing-left">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="negative">
                            <label class="form-check-label" for="inlineCheckbox1">All</label>
                            </div>
                            <div id="new-check"></div>
                            <div id="new-check">
                                <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="compliances[]" type="checkbox" id="addMoreCheckbox">
                                        <label class="form-check-label" for="addMoreCheckbox">Add More</label>
                                </div>
                            </div> -->
            </div>
            <div class="row mb-2">
                <div class="col-lg-3 mt-1">
                    Organization Name <br> <input class="form-control" name="orgName" value="{{ $requirements->orgName }}" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 mt-1">
                    Organization Type <br> <input class="form-control" name="orgType" value="{{ $requirements->orgType }}" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 mt-1">
                    Lead Generated By <br> <input class="form-control" name="leadBy" value="{{ $requirements->leadBy }}" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 mt-1">
                    Lead Type: <br> <input class="form-control" name="leadType" value="{{ $requirements->leadType }}" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-3 mt-1">
                    Cash or Taxable: <br> <input class="form-control" name="cash_or_taxable" value="{{ $requirements->cash_or_taxable }}" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>

            <h5><b>Lead Generated By:</b></h5>
            <div class="row mb-2">
                <div class="col-lg-4 spacing-right">
                    Lead Agent Name <br> <input class="form-control" name="leadBy" value="{{ $requirements->leadBy }}" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Type of Lead : <br> <input class="form-control" name="typeLead" value="{{ $requirements->typeLead }}" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Source of Lead : <br> <input class="form-control" name="srcLead" value="{{ $requirements->srcLead }}" type="text" placeholder="..." style="width: 100%;">
                </div>


                <div class="container my-1">
                    <div class="accordion" id="departmentAccordion">
                        @if($requirements->requirementpocs && $requirements->requirementpocs->isNotEmpty())
                            @foreach ($requirements->requirementpocs as $index => $poc)
                                <div class="accordion-item departmentaccordion-item" id="departmentEntry{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="departmentHeading{{ $index + 1 }}" style="color: white">
                                        <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse" data-target="#departmentCollapse{{ $index + 1 }}" aria-expanded="false" aria-controls="departmentCollapse{{ $index + 1 }}">
                                            POC Details {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <div id="departmentCollapse{{ $index + 1 }}" class="collapse show" aria-labelledby="departmentHeading{{ $index + 1 }}" data-parent="#departmentAccordion">
                                        <div class="accordion-body">
                                            <input type="hidden" name="requirementpocs[{{ $index }}][p_id]" value="{{ $poc->id }}">
                                            <div class="row mb-2">
                                                <div class="col-lg-4 spacing-right">
                                                    POC Name <br>
                                                    <input class="form-control" name="req_poc_name[]" value="{{ $poc->req_poc_name }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    POC Contact Number <br>
                                                    <input class="form-control" name="req_poc_num[]" value="{{ $poc->req_poc_num }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    POC Designation <br>
                                                    <input class="form-control" name="req_poc_desig[]" value="{{ $poc->req_poc_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Visiting Card (Front) <br>
                                                    <input class="form-control" name="req_poc_visiting_front[]" id="inpFile1" type="file" style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Visiting Card (Back) <br>
                                                    <input class="form-control" name="req_poc_visiting_back[]" id="inpFile2" type="file" style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Email <br>
                                                    <input class="form-control" name="req_poc_email[]" value="{{ $poc->req_poc_email }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    POC Organization Name <br>
                                                    <input class="form-control" name="req_poc_org_name[]" value="{{ $poc->req_poc_org_name }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <h5>POC Address</h5>

                                                <div class="col-lg-4 spacing-right">
                                                    Office No <br> <input class="form-control" id="" name="req_poc_office_no[]" value="{{  $poc->req_poc_office_no }}"
                                                        type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Floor <br> <input class="form-control" id="" name="req_poc_floor[]" value="{{  $poc->req_poc_floor }}" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>


                                                <div class="col-lg-4 spacing-right">
                                                    Building <br> <input class="form-control" id="" name="req_poc_building[]" value="{{  $poc->req_poc_building }}"
                                                        type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Block <br> <input class="form-control" id="" name="req_poc_block[]" value="{{  $poc->req_poc_block }}"
                                                        type="text" placeholder="..." style="width: 100%;">
                                                </div>


                                                <div class="col-lg-4 spacing-right">
                                                    Area <br> <input class="form-control" id="" name="req_poc_area[]" value="{{  $poc->req_poc_area }}"
                                                        type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    City <br> <input class="form-control" id="" name="req_poc_city[]" type="text" value="{{  $poc->req_poc_city }}"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Photograph of Building <br> <input class="form-control" id="" name="req_poc_building_attach[]" value="{{  $poc->req_poc_building_attach }}" type="file"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <!-- <div class="col-lg-6 spacing-right">
                                                        Email <br> <input class="form-control" id="" name="c_pin" type="text" placeholder="..." style="width: 100%;">
                                                    </div> -->
                                                <div class="col-lg-4 spacing-right">
                                                    Pin location <br> <input class="form-control" id="" name="req_poc_pin[]" type="text" value="{{  $poc->req_poc_pin }}" placeholder="..."
                                                        style="width: 100%;">
                                                </div>

                                                <!-- <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-left">
                                                            Website <br> <input class="form-control" id="" name="c_pin" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-left">
                                                            Google Map <br> <input class="form-control" id="" name="c_pin" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No POC details found.</p>
                        @endif
                    </div>
                </div>


                <h5><b>Lead Assigned By:</b></h5>
                <div class="col-lg-3 spacing-right">
                    Name <br> <input class="form-control" id="leadAssignedByName" value="{{ $requirements->leadAssignedByName }}" name="leadAssignedByName" type="text" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Phone Number <br> <input class="form-control" value="{{ $requirements->leadAssignedByphoneNo }}" name="leadAssignedByphoneNo" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Email <br> <input class="form-control" value="{{ $requirements->leadAssignedByemail }}" name="leadAssignedByemail" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Employee ID <br> <input class="form-control" value="{{ $requirements->leadAssignedById }}" name="leadAssignedById" type="text" placeholder="..." style="width: 100%;">
                </div>

                <h5><b>Lead Assigned To:</b></h5>
                <div class="col-lg-3 spacing-right">
                    Name <br> <input class="form-control" value="{{ $requirements->leadAssignedToName }}" name="leadAssignedToName" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Phone Number <br> <input class="form-control" value="{{ $requirements->leadAssignedTophoneNo }}" name="leadAssignedTophoneNo" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Email <br> <input class="form-control" value="{{ $requirements->leadAssignedToEmail }}" name="leadAssignedToEmail" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Employee ID <br> <input class="form-control" value="{{ $requirements->leadAssignedToId }}" name="leadAssignedToId" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Estimated Quantity <br> <input class="form-control" value="{{ $requirements->leadAssignedToEstdQuan }}" name="leadAssignedToEstdQuan" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Backend Calculation <br> <input class="form-control" value="{{ $requirements->backendCalculation }}" name="backendCalculation" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <!--Tabs forDetails-->
                <!--address-info-->

                <div class="container my-1">
                    <div class="accordion" id="emergencyAccordion">
                        @if($requirements->requirementaddress && $requirements->requirementaddress->isNotEmpty())
                            @foreach ($requirements->requirementaddress as $index => $address)
                                <div class="accordion-item emergencyaccordion-item" id="emergencyEntry{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="emergencyHeading{{ $index + 1 }}" style="color: white">
                                        <button class="accordion-button" style="background-color: #34005A; color:white" type="button"
                                            data-toggle="collapse" data-target="#emergencyCollapse{{ $index + 1 }}"
                                            aria-expanded="false"
                                            aria-controls="emergencyCollapse{{ $index + 1 }}">
                                            Address Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <div id="emergencyCollapse{{ $index + 1 }}" class="collapse"
                                        aria-labelledby="emergencyHeading{{ $index + 1 }}">
                                        <div class="accordion-body">
                                            <!-- Accordion Content -->
                                            <div class="row" id="emergencyServices_add_fields">
                                                <div class="row">
                                                    <div class="col-lg-6 spacing-left">
                                                        <h5>Address</h5>
                                                        <div class="row mb-1">
                                                            <div class="col-lg-5 spacing-right">
                                                                Office No <br>
                                                                <input class="form-control" id="" name="requirementaddress[{{ $index }}][office_no]"
                                                                    type="text" value="{{ $address->office_no }}" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-right">
                                                                Floor <br>
                                                                <input class="form-control" id="" name="requirementaddress[{{ $index }}][floor]"
                                                                    type="text" value="{{ $address->floor }}" placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-lg-5 spacing-right">
                                                                Building <br>
                                                                <input class="form-control" id="" name="requirementaddress[{{ $index }}][building]"
                                                                    type="text" value="{{ $address->building }}" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-right">
                                                                Block <br>
                                                                <input class="form-control" id="" name="requirementaddress[{{ $index }}][block]"
                                                                    type="text" value="{{ $address->block }}" placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-lg-5 spacing-right">
                                                                Area <br>
                                                                <input class="form-control" id="" name="requirementaddress[{{ $index }}][area]"
                                                                    type="text" value="{{ $address->area }}" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-right">
                                                                City <br>
                                                                <input class="form-control" id="" name="requirementaddress[{{ $index }}][city]"
                                                                    type="text" value="{{ $address->city }}" placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-lg-5 spacing-right">
                                                                Photograph of Building <br>
                                                                <input class="form-control" id="" name="requirementaddress[{{ $index }}][builidng_attach]"
                                                                    type="file" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-right">
                                                                Pin location <br>
                                                                <input class="form-control" id="" name="requirementaddress[{{ $index }}][pin_location]"
                                                                    type="text" value="{{ $address->pin_location }}" placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        <div class="row mb-1">
                                                            <div class="col-lg-10 spacing-right">
                                                                Company <br>
                                                                <input class="form-control" type="text" name="requirementaddress[{{ $index }}][company]"
                                                                    value="{{ $address->company }}" placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-lg-10 spacing-right">
                                                                Email <br>
                                                                <input class="form-control" type="text" name="requirementaddress[{{ $index }}][email]"
                                                                    value="{{ $address->email }}" placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-lg-10 spacing-right">
                                                                Website <br>
                                                                <input class="form-control" type="text" name="requirementaddress[{{ $index }}][website]"
                                                                    value="{{ $address->website }}" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-10 spacing-right">
                                                                Attachments <br>
                                                                <input class="form-control" type="file" name="requirementaddress[{{ $index }}][attachments]"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-lg-10 spacing-right">
                                                                Notes & Remarks <br>
                                                                <textarea style="width: 100%;" id="" name="requirementaddress[{{ $index }}][notes]"
                                                                    cols="15" rows="4">{{ $address->notes }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Accordion Content -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No Address details found.</p>
                        @endif
                    </div>
                </div>


                {{-- <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion">
                        <!-- Initial Accordion Item -->
                        <div class="accordion-item signaccordion-item" id="GuardEntry1">
                            <h2 class="accordion-header" id="signatoryHeading1"
                                style="color: white">
                                <button class="accordion-button"
                                    style="background-color: #34005A; color:white" type="button"
                                    data-toggle="collapse" data-target="#signatoryCollapse1"
                                    aria-expanded="false" aria-controls="signatoryCollapse1">
                                    Guard Entry 1
                                </button>
                            </h2>
                            <div id="signatoryCollapse1" class="collapse"
                                aria-labelledby="signatoryHeading1">
                                <div class="row row-fluid mx-2 mt-2 mb-2">
                                    <div class="col-lg-4 form-group spacing-left">
                                        Category:<br> <input class="form-control" name="guard_category[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 spacing-right">
                                        Quantity : <br>
                                        <select id="leadcategory" name="guard_quantity[]" class="form-control mt-1"
                                            style="width: 100%;">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 spacing-left">
                                        Shift Timing : <br>
                                        <select id="leadcategory" name="guard_shift_timing[]" class="form-control mt-1"
                                            style="width: 100%;">
                                            <option value="1x">1x</option>
                                            <option value="2x">2x</option>
                                            <option value="3x">3x</option>
                                            <option value="4x">4x</option>
                                            <option value="5x">5x</option>
                                            <option value="6x">6x</option>
                                            <option value="7x">7x</option>
                                            <option value="8x">8x</option>
                                            <option value="9x">9x</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 spacing-right">
                                        Food by Client : <br>
                                        <select id="leadcategory" name="guard_food[]" class="form-control mt-1"
                                            style="width: 100%;">
                                            <option value="">Yes</option>
                                            <option value="">No</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 spacing-left">
                                        Accomodation By Client : <br>
                                        <select id="leadcategory" name="guard_accomodation[]" class="form-control mt-1"
                                            style="width: 100%;">
                                            <option value="">Yes</option>
                                            <option value="">No</option>
                                        </select>
                                    </div>
                                    <!-- <div class="col-lg-6 spacing-right">
                                                Food by Client : <br>
                                                <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
                                                    <option value="">Yes</option>
                                                    <option value="">No</option>
                                                </select>
                                            </div> -->
                                    <div class="col-lg-6 spacing-right">
                                        Transportation by Client : <br>
                                        <select id="leadcategory" name="guard_transportation[]" class="form-control mt-1"
                                            style="width: 100%;">
                                            <option value="">Yes</option>
                                            <option value="">No</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 spacing-left">
                                        Required on monthly basis : <br>
                                        <select id="monthlyRequirement" name="guard_required_monthly[]" class="form-control mt-1"
                                            style="width: 100%;">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 spacing-right"
                                        id="dailyRequirementSection">
                                        Required on dialy basis : <br>
                                        <select id="dailyRequirement" name="guard_required_dialy[]" type="text" class="form-control mt-1"
                                            style="width: 100%;">
                                            <option value=""></option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mt-1" id="noOfDays">
                                        No. of days Security Staff required for <br>
                                        <input class="form-control" name="no_of_days_guard_required[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Financial Working Excel Sheet <br> <input class="form-control mt-1"
                                            id="head_office_email" name="financial_working_excel_attach[]"  type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Financial Working Word Sheet <br> <input class="form-control mt-1"
                                            id="head_office_email" name="financial_working_word_attach[]"  type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Financial Working PDF Sheet <br> <input class="form-control mt-1"
                                            id="head_office_email" name="financial_working_pdf_attach[]"  type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Notes <br> <textarea class="form-control mt-1"
                                            id="head_office_name" name="guard_notes[]" type="text"
                                            placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        Attachments <br> <input class="form-control mt-1"
                                            id="head_office_email" name="guard_attach[]" type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div> --}}

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion">
                        @if($requirements->requirementguard && $requirements->requirementguard->isNotEmpty())
                            @foreach ($requirements->requirementguard as $index => $guard)
                                <div class="accordion-item signaccordion-item" id="GuardEntry{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading{{ $index + 1 }}" style="color: white">
                                        <button class="accordion-button" style="background-color: #34005A; color:white" type="button"
                                            data-toggle="collapse" data-target="#signatoryCollapse{{ $index + 1 }}"
                                            aria-expanded="false" aria-controls="signatoryCollapse{{ $index + 1 }}">
                                            Guard Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <div id="signatoryCollapse{{ $index + 1 }}" class="collapse" aria-labelledby="signatoryHeading{{ $index + 1 }}">
                                        <div class="row row-fluid mx-2 mt-2 mb-2">
                                            <div class="col-lg-4 form-group spacing-left">
                                                Category:<br>
                                                <input class="form-control" name="guard_category[{{ $index }}]" type="text" value="{{ $guard->guard_category }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Quantity :<br>
                                                <input class="form-control" name="guard_quantity[{{ $index }}]" type="text" value="{{ $guard->guard_quantity }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-left">
                                                Shift Timing :<br>
                                                <input class="form-control" name="guard_shift_timing[{{ $index }}]" type="text" value="{{ $guard->guard_shift_timing }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Food by Client :<br>
                                                <input class="form-control" name="guard_food[{{ $index }}]" type="text" value="{{ $guard->guard_food }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-left">
                                                Accommodation by Client :<br>
                                                <input class="form-control" name="guard_accommodation[{{ $index }}]" type="text" value="{{ $guard->guard_accommodation }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Transportation by Client :<br>
                                                <input class="form-control" name="guard_transportation[{{ $index }}]" type="text" value="{{ $guard->guard_transportation }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-left">
                                                Required on Monthly Basis :<br>
                                                <input class="form-control" name="guard_required_monthly[{{ $index }}]" type="text" value="{{ $guard->guard_required_monthly }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-right" id="dailyRequirementSection">
                                                Required on Daily Basis :<br>
                                                <input class="form-control" name="guard_required_daily[{{ $index }}]" type="text" value="{{ $guard->guard_required_daily }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1" id="noOfDays">
                                                No. of Days Security Staff Required :<br>
                                                <input class="form-control" name="no_of_days_guard_required[{{ $index }}]" type="text" value="{{ $guard->no_of_days_guard_required }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6">
                                                Financial Working Excel Sheet :<br>
                                                <input class="form-control mt-1" name="financial_working_excel_attach[{{ $index }}]" type="file" style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6">
                                                Financial Working Word Sheet :<br>
                                                <input class="form-control mt-1" name="financial_working_word_attach[{{ $index }}]" type="file" style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6">
                                                Financial Working PDF Sheet :<br>
                                                <input class="form-control mt-1" name="financial_working_pdf_attach[{{ $index }}]" type="file" style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6">
                                                Notes :<br>
                                                <textarea class="form-control mt-1" name="guard_notes[{{ $index }}]" placeholder="..." style="width: 100%;">{{ $guard->guard_notes }}</textarea>
                                            </div>
                                            <div class="col-lg-6">
                                                Attachments :<br>
                                                <input class="form-control mt-1" name="guard_attach[{{ $index }}]" type="file" style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No Guard details found.</p>
                        @endif
                    </div>
                </div>


                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion2">
                        @if($requirements->requirementvehicle && $requirements->requirementvehicle->isNotEmpty())
                            @foreach ($requirements->requirementvehicle as $index => $vehicle)
                                <!-- Initial Accordion Item -->
                                <div class="accordion-item signaccordion-item2" id="signatoryEntry2{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading2"
                                        style="color: white">
                                        <button class="accordion-button"
                                            style="background-color: #34005A; color:white" type="button"
                                            data-toggle="collapse" data-target="#signatoryCollapse2{{ $index + 1 }}"
                                            aria-expanded="false" aria-controls="signatoryCollapse2{{ $index + 1 }}">
                                            Vehical Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <div id="signatoryCollapse2{{ $index + 1 }}" class="collapse"
                                        aria-labelledby="signatoryHeading2{{ $index + 1 }}">
                                        <div class="accordion-body">
                                             <!--Your content for signatory entry goes here -->
                                            <div class="row mb-2" id="signatoryDetailsContainer">
                                                <div class="col-lg-6 form-group spacing-left">
                                                    Ownership Status:<br> <input
                                                    class="form-control"  name="vehicle_ownership[{{ $index }}]" value="{{ $vehicle->vehicle_ownership }}" type="text"
                                                    placeholder="..." style="width: 100%;">

                                                </div>
                                                <div class="col-lg-6 form-group spacing-left">
                                                    Types:<br> <input
                                                    class="form-control" name="vehicle_type[]"  value="{{ $vehicle->vehicle_type }}"  type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 form-group spacing-left">
                                                    Category:<br> <input
                                                    class="form-control" name="vehicle_category[]"  value="{{ $vehicle->vehicle_category }}"  type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Required for : <br> <input
                                                    class="form-control" name="vehicle_required[]" value="{{ $vehicle->vehicle_required }}" type="text"
                                                    placeholder="..." style="width: 100%;">

                                                </div>
                                                <div class="col-lg-6 mt-1">
                                                    Monthly Maintenance Cost <br> <input
                                                        class="form-control" name="vehicle_mantenance[]" value="{{ $vehicle->vehicle_mantenance }}" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 mt-1 spacing-right">
                                                    Fuel <br> <input
                                                    class="form-control" name="vehicle_fuel[]" value="{{ $vehicle->vehicle_fuel }}" type="text"
                                                    placeholder="..." style="width: 100%;">


                                                </div>
                                                <div>
                                                    <div class="col-lg-6 mt-1 " id="fuel_rate_km"
                                                        >
                                                    </div>
                                                    <div class="col-lg-6 mt-1 " id="fuel_rate_km_req"
                                                        ">
                                                        Rate Per Kilometer <br> <input
                                                            class="form-control" name="vehicle_rate_per_km[]" value="{{ $vehicle->vehicle_rate_per_km }}" type="text"
                                                            placeholder="..." style="width: 100%;">

                                                        Kilometer Required <br> <input
                                                            class="form-control" name="vehicle_km_required[]" value="{{ $vehicle->vehicle_km_required }}" type="text"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mt-1 spacing-right">
                                                    Toll Tax & Parking Charges <br> <input
                                                    class="form-control" name="vehicle_toll[]" value="{{ $vehicle->vehicle_toll }}" type="text"
                                                    placeholder="..." style="width: 100%;">


                                                </div>
                                                <div class="col-lg-6 mt-1 " id="tooltax1"
                                                   >
                                                </div>
                                                <div class="col-lg-6 mt-1 " id="tooltax2"
                                                    >
                                                    Toll Tax & Parking Charges: <br> <input
                                                        class="form-control" name="vehicle_tol[]" value="{{ $vehicle->vehicle_tol }}" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>

                                                <div class="col-lg-6 mt-1">
                                                    Meter Reading at the start of the duty <br> <input
                                                        class="form-control" name="vehicle_meter_reading[]" value="{{ $vehicle->vehicle_meter_reading }}" type="file"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 mt-1">
                                                    Picture of Meter Reading before duty <br> <input
                                                        class="form-control" name="vehicle_meter_picture[]" value="{{ $vehicle->vehicle_meter_picture }}" type="file"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 mt-1">
                                                    Reporting Time <br> <input class="form-control"
                                                        type="time" name="vehicle_reporting_time[]" value="{{ $vehicle->vehicle_reporting_time }}" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                 <div class="col-lg-6 mt-1 " id="reporting_address">
                                        Reporting Address   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                                    </div> -->

                                                <div class="col-lg-6 mt-2 ml-3 ">
                                                    <input class="form-check-input" name="vehicle_reporting_address[]"  type="checkbox" {{ $vehicle->vehicle_reporting_address ? 'checked' : '' }}
                                                        id="reporting_address_check">
                                                    <label class="form-check-label"
                                                        for="check">Reporting Address</label>
                                                </div>

                                                 Address Form 
                                                <div class="container " id="reporting_address_form"
                                                    style="display: none;">
                                                    <div class="row row-cols-2">
                                                        <div class="col-lg-6 mt-1">
                                                            Office No <br> <input class="form-control"
                                                                id="" name="vehicle_rep_office_no[]" value="{{ $vehicle->vehicle_rep_office_no }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 mt-1">
                                                            Floor <br> <input class="form-control" id=""
                                                                type="text" name="vehicle_rep_floor[]" value="{{ $vehicle->vehicle_rep_floor }}" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 mt-1">
                                                            Building <br> <input class="form-control"
                                                                id="" name="vehicle_rep_building[]" value="{{ $vehicle->vehicle_rep_building }}"  type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 mt-1">
                                                            Block <br> <input class="form-control" id=""
                                                                type="text" name="vehicle_rep_block[]" value="{{ $vehicle->vehicle_rep_block }}" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 mt-1">
                                                            Area <br> <input class="form-control" id=""
                                                                type="text" name="vehicle_rep_area[]" value="{{ $vehicle->vehicle_rep_area }}" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 mt-1">
                                                            City <br> <input class="form-control" id=""
                                                                type="text" name="vehicle_rep_city[]" value="{{ $vehicle->vehicle_rep_city }}" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 mt-1">
                                                            Photograph of Building <br> <input
                                                                class="form-control" name="vehicle_rep_picture[]" value="{{ $vehicle->vehicle_rep_picture }}" id=""
                                                                type="file" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 mt-1">
                                                            Pin location <br> <input
                                                                class="form-control" name="vehicle_rep_location[]" value="{{ $vehicle->vehicle_rep_location }}" id=""
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                                  

                                                <div class="col-lg-6 mt-1">
                                                    Duty Start Date <br> <input class="form-control"
                                                        type="date" name="vehicle_duty_start_date[]" value="{{ $vehicle->vehicle_duty_start_date }}" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 mt-1">
                                                    Duty End Date <br> <input class="form-control"
                                                        type="date" name="vehicle_duty_end_date[]" value="{{ $vehicle->vehicle_duty_end_date }}" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 mt-1">
                                                    Duty Start Time <br> <input class="form-control"
                                                        type="time" name="vehicle_duty_start_time[]" value="{{ $vehicle->vehicle_duty_start_time }}" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 mt-1">
                                                    Duty End Time <br> <input class="form-control"
                                                        type="time" name="vehicle_duty_end_time[]" value="{{ $vehicle->vehicle_duty_end_time }}" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 mt-1">
                                                    Shift Duration <br> <input class="form-control"
                                                        type="text" name="vehicle_shift_duration[]" value="{{ $vehicle->vehicle_shift_duration }}"  placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 mt-1">
                                                    No. of Shifts <br> <input class="form-control"
                                                        type="text" name="vehicle_no_of_shifts[]" value="{{ $vehicle->vehicle_no_of_shifts }}" placeholder="..."
                                                        style="width: 100%;">
                                                </div>

                                                 Required with Driver : <br>
                                        <select id="driver" class="form-control mt-1" name="category" style="width: 90%;">
                                            <option value="yes">Yes</option>
                                            <option value="">No</option>
                                        </select> -->
                                                <div class="col-lg-6 spacing-right mt-2 ml-3 ">
                                                    <input class="form-check-input" name="vehicle_req_with_driver[]" type="checkbox" {{ $vehicle->vehicle_req_with_driver ? 'checked' : '' }}
                                                        id="check_driver">
                                                    <label class="form-check-label" for="check">Required
                                                        with Driver</label>
                                                </div>

                                                <div class="col-lg-6 mt-1" id="food_driver"
                                                    style="display: none;">

                                                    Food For Driver By Client <br> <input
                                                    class="form-control" name="vehicle_food_by_client[]" value="{{ $vehicle->vehicle_food_by_client }}" type="text"
                                                    placeholder="..." style="width: 100%;">

                                                </div>

                                                <div class="col-lg-6 spacing-right mt-2 ml-3 ">
                                                    <input class="form-check-input" name="vehicle_req_with_security[]" type="checkbox" {{ $vehicle->vehicle_req_with_security ? 'checked' : '' }}
                                                        id="check_staff">
                                                    <label class="form-check-label" for="check">Required
                                                        With Security
                                                        Staff</label>
                                                </div>

                                                 Men Guarding Services Tab 

                                                <div class="new-div" id="check_staff_Men_Guarding"
                                                    style="display:none;">
                                                    <div class="col-lg-12">
                                                        <div class="row mb-2">

                                                            <div class="col-lg-6 spacing-right">
                                                                Category <br> <input
                                                                class="form-control" name="vehicle_guard_category[]" value="{{ $vehicle->vehicle_guard_category }}" type="text"
                                                                placeholder="..." style="width: 100%;">

                                                            </div>
                                                            <div class="col-lg-6 spacing-right">
                                                                Quantity : <br> <input
                                                                class="form-control" name="vehicle_guard_quantity[]" value="{{ $vehicle->vehicle_guard_quantity }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-6 spacing-right">
                                                                Shift Timing : <br>  <input
                                                                class="form-control" name="vehicle_guard_shift_timing[]" value="{{ $vehicle->vehicle_guard_shift_timing }}" type="text"
                                                                placeholder="..." style="width: 100%;">

                                                            </div>
                                                            <div class="col-lg-6 spacing-right">
                                                                Food by Client : <br> <input
                                                                class="form-control" name="vehicle_guard_food_by_client[]" value="{{ $vehicle->vehicle_guard_food_by_client }}" type="text"
                                                                placeholder="..." style="width: 100%;">

                                                            </div>
                                                            <div class="col-lg-6 spacing-right">
                                                                Accomodation By Client : <br>  <input
                                                                class="form-control" name="vehicle_guard_accomodation[]" value="{{ $vehicle->vehicle_guard_accomodation }}" type="text"
                                                                placeholder="..." style="width: 100%;">

                                                            </div>

                                                            <div class="col-lg-6 spacing-right">
                                                                Transportation by Client : <br>  <input
                                                                class="form-control" name="vehicle_guard_transportation[]" value="{{ $vehicle->vehicle_guard_transportation }}" type="text"
                                                                placeholder="..." style="width: 100%;">

                                                            </div>
                                                            <div class="col-lg-6 spacing-right">
                                                                Required on monthly basis : <br> <input
                                                                class="form-control" name="vehicle_guard_req_monthly[]" value="{{ $vehicle->vehicle_guard_req_monthly }}" type="text"
                                                                placeholder="..." style="width: 100%;">

                                                            </div>
                                                            <div class="col-lg-6 spacing-right">
                                                                Required on dialy basis : <br>  <input
                                                                class="form-control" name="vehicle_guard_req_dialy[]" value="{{ $vehicle->vehicle_guard_req_dialy }}" type="text"
                                                                placeholder="..." style="width: 100%;">

                                                            </div>
                                                            <div class="col-lg-6 mt-1">
                                                                No. of days Security Staff required for
                                                                <br> <input class="form-control" name="vehicle_guard_no[]" value="{{ $vehicle->vehicle_guard_no }}"
                                                                    type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                Notes <br> <textarea
                                                                    class="form-control mt-1"
                                                                    id="head_office_name" name="vehicle_guard_notes[]"
                                                                    type="text"
                                                                    placeholder="..."
                                                                    style="width: 100%;">{{ $vehicle->vehicle_guard_notes }}</textarea>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                Attachments <br> <input
                                                                    class="form-control mt-1"
                                                                    id="head_office_email" value="{{ $vehicle->vehicle_guard_attach }}" name="vehicle_guard_attach[]"
                                                                    type="file"
                                                                    placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                             <button class="new-branch mt-2" onclick="removeNewDiv7()">Remove</button> 
                                                        </div>
                                                    </div>
                                                </div>

                                                  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @else
                            <p>No Vehicle details found.</p>
                        @endif
                    </div>
                </div>

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion3">
                        @if($requirements->requirementcanine && $requirements->requirementcanine->isNotEmpty())
                            @foreach ($requirements->requirementcanine as $index => $canine)
                                <!-- Initial Accordion Item -->
                                <div class="accordion-item signaccordion-item3" id="signatoryEntry3{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading3{{ $index + 1 }}"
                                        style="color: white">
                                        <button class="accordion-button"
                                            style="background-color: #34005A; color:white" type="button"
                                            data-toggle="collapse" data-target="#signatoryCollapse3{{ $index + 1 }}"
                                            aria-expanded="false" aria-controls="signatoryCollapse3{{ $index + 1 }}">
                                            Canine Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <!--<div id="signatoryCollapse3{{ $index + 1 }}" class="collapse"-->
                                    <!--    aria-labelledby="signatoryHeading3{{ $index + 1 }}">-->
                                    <!--    <div class="accordion-body">-->
                                            <!-- Your content for signatory entry goes here -->
                                    <!--        <div class="row mb-2" id="signatoryDetailsContainer3">-->
                                    <!--            <div class="col-lg-6 spacing-right">-->
                                    <!--                Required for : <br> <input class="form-control"-->
                                    <!--                type="text" name="canine_req_for[]" value="{{ $canine->canine_req_for }}" placeholder="..."-->
                                    <!--                style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 form-group spacing-left">-->
                                    <!--                Category:<br> <input class="form-control"-->
                                    <!--                type="text" name="canine_category[]" value="{{ $canine->canine_category }}" placeholder="..."-->
                                    <!--                style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1" id="noOfDaysDogs">-->
                                    <!--                No. of days Dogs Require for <br> <input-->
                                    <!--                    class="form-control" name="canine_req_for_days[]" value="{{ $canine->canine_req_for_days }}" type="text"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Color of Dog <br> <input class="form-control"-->
                                    <!--                    type="text" name="canine_color[]" value="{{ $canine->canine_color }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                No. of Dog(s) <br> <input class="form-control"-->
                                    <!--                    type="text" name="canine_no[]" value="{{ $canine->canine_no }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 spacing-right">-->
                                    <!--                Required with Handler : <br> <input class="form-control"-->
                                    <!--                type="text" name="canine_req_handler[]" value="{{ $canine->canine_req_handler }}" placeholder="..."-->
                                    <!--                style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1" id="nameOFHandler">-->
                                    <!--                Name of Handler <br> <input class="form-control"-->
                                    <!--                    type="text" name="canine_handler_name[]" value="{{ $canine->canine_handler_name }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1" id="cnicOFHandler">-->
                                    <!--                CNIC <br> <input class="form-control" name="canine_handler_cnic_no[]" value="{{ $canine->canine_handler_cnic_no }}" type="text"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1" id="ageOFHandler">-->
                                    <!--                Age <br> <input class="form-control" name="canine_handler_age[]" value="{{ $canine->canine_handler_age }}" type="text"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1" id="experienceOFHandler">-->
                                    <!--                Experience <br> <input class="form-control"-->
                                    <!--                    type="text" name="canine_handler_exp[]" value="{{ $canine->canine_handler_exp }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1" id="cellNoOFHandler">-->
                                    <!--                Cell Number <br> <input class="form-control"-->
                                    <!--                    type="text" name="canine_handler_cell[]" value="{{ $canine->canine_handler_cell }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1" id="cnicFrontOFHandler">-->
                                    <!--                CNIC Front <br> <input class="form-control"-->
                                    <!--                    type="file" name="canine_handler_cnic_front[]" value="{{ $canine->canine_handler_cnic_front }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1" id="cnicBackOFHandler">-->
                                    <!--                CNIC Back <br> <input class="form-control"-->
                                    <!--                    type="file" name="canine_handler_cnic_back[]" value="{{ $canine->canine_handler_cnic_back }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Duty Start Date <br> <input class="form-control"-->
                                    <!--                    type="date" name="canine_duty_start_date[]" value="{{ $canine->canine_duty_start_date }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Duty End Date <br> <input class="form-control"-->
                                    <!--                    type="date" name="canine_duty_end_date[]" value="{{ $canine->canine_duty_end_date }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Duty Start Time <br> <input class="form-control"-->
                                    <!--                    type="time" name="canine_duty_start_time[]" value="{{ $canine->canine_duty_start_time }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Duty End Time <br> <input class="form-control"-->
                                    <!--                    type="time" name="canine_duty_end_time[]" value="{{ $canine->canine_duty_end_time }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Shift Duration <br> <input class="form-control"-->
                                    <!--                    type="text" name="canine_shift_duration[]" value="{{ $canine->canine_shift_duration }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                No. of Shifts <br> <input class="form-control"-->
                                    <!--                    type="text" name="canine_no_of_shifts[]" value="{{ $canine->canine_no_of_shifts }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Picture of Dogs <br> <input class="form-control"-->
                                    <!--                    type="file" name="canine_pic_of_dogs[]" value="{{ $canine->canine_pic_of_dogs }}" multiple placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6">-->
                                    <!--                Notes <br> <textarea class="form-control mt-1"-->
                                    <!--                    id="head_office_name"-->
                                    <!--                    type="text" name="canine_notes[]" placeholder="..."-->
                                    <!--                    style="width: 100%;">{{ $canine->canine_notes }}</textarea>-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6">-->
                                    <!--                Attachments <br> <input class="form-control mt-1"-->
                                    <!--                    id="head_office_email" value="{{ $canine->canine_attach }}" name="canine_attach[]"-->
                                    <!--                    type="file" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            @endforeach
                        @else
                            <p>No Canine details found.</p>
                        @endif
                    </div>
                </div>

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion4">
                        <!-- Initial Accordion Item -->
                        @if($requirements->requirementfacilitation && $requirements->requirementfacilitation->isNotEmpty())
                            @foreach ($requirements->requirementfacilitation as $index => $facilitation)
                                <div class="accordion-item signaccordion-item4" id="signatoryEntry4{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading4{{ $index + 1 }}"
                                        style="color: white">
                                        <button class="accordion-button"
                                            style="background-color: #34005A; color:white" type="button"
                                            data-toggle="collapse" data-target="#signatoryCollapse4{{ $index + 1 }}"
                                            aria-expanded="false" aria-controls="signatoryCollapse4{{ $index + 1 }}">
                                            Facilitation Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <!--<div id="signatoryCollapse4{{ $index + 1 }}" class="collapse"-->
                                    <!--    aria-labelledby="signatoryHeading4{{ $index + 1 }}">-->
                                    <!--    <div class="accordion-body">-->
                                            <!-- Your content for signatory entry goes here -->
                                    <!--        <div class="row mb-2" id="signatoryDetailsContainer">-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Guest Arrival Time <br> <input class="form-control"-->
                                    <!--                    type="time" name="guest_arrival_time[]" value="{{ $facilitation->guest_arrival_time }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Security Team Reporting Time <br> <input-->
                                    <!--                    class="form-control" name="security_reporting_time[]" value="{{ $facilitation->security_reporting_time }}" type="time"-->
                                    <!--                    placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                PhotoGraph of Guest <br> <input class="form-control"-->
                                    <!--                    type="file" name="photograph_of_guest[]" value="{{ $facilitation->photograph_of_guest }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                PhotoGraph of Passport <br> <input-->
                                    <!--                    class="form-control" name="photograph_of_passport[]" value="{{ $facilitation->photograph_of_passport }}" type="file"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Nationality of Guest <br> <input-->
                                    <!--                    class="form-control" name="nationality_of_guest[]" value="{{ $facilitation->nationality_of_guest }}" type="text"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-4 spacing-right"-->
                                    <!--                id="ssReportingLocation">-->
                                    <!--                <input class="form-check-input" name="security_staff_rep_loc[]" {{ $facilitation->security_staff_rep_loc ? 'checked' : '' }}  type="checkbox">-->
                                    <!--                <label class="form-check-label" for="check">Security-->
                                    <!--                    Staff Reporting-->
                                    <!--                    Location</label>-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-2 ml-3 ">-->
                                    <!--                <input class="form-check-input" name="airline_details[]" {{ $facilitation->airline_details ? 'checked' : '' }}  type="checkbox"-->
                                    <!--                    id="airline_check">-->
                                    <!--                <label class="form-check-label" for="check">AirLine-->
                                    <!--                    Details</label>-->
                                    <!--            </div>-->

                                    <!--            <div id="airline_check_form" class="container"-->
                                    <!--                style="display: none;">-->
                                    <!--                <div class="row row-cols-2">-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Name Of AirLine: <br> <input-->
                                    <!--                            class="form-control" name="name_of_airline[]" value="{{ $facilitation->name_of_airline }}" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Contact Number Of AirLine <br> <input-->
                                    <!--                            class="form-control" name="contact_of_airline[]" value="{{ $facilitation->contact_of_airline }}" type="number"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Email Of AirLine <br> <input-->
                                    <!--                            class="form-control" name="email_of_airline[]" value="{{ $facilitation->email_of_airline }}" type="email"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Website Of AirLine <br> <input-->
                                    <!--                            class="form-control" name="web_of_airline[]" value="{{ $facilitation->web_of_airline }}" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->

                                    <!--            <div class="col-lg-6 mt-2 ml-3 ">-->
                                    <!--                <input class="form-check-input" name="poc_of_airline[]" {{ $facilitation->poc_of_airline ? 'checked' : '' }}  type="checkbox"-->
                                    <!--                    id="POC_check">-->
                                    <!--                <label class="form-check-label" for="check">POC of-->
                                    <!--                    Airline</label>-->
                                    <!--            </div>-->

                                    <!--            <div class="container" id="POC_check_form"-->
                                    <!--                style="display: none;">-->
                                    <!--                <div class="row row-cols-2">-->
                                    <!--                    <div class="col-lg-12"> Address of POC of-->
                                    <!--                        Airline:</div>-->
                                    <!--                    <div class="col-lg-6 spacing-right">-->
                                    <!--                        POC Name <br> <input class="form-control"-->
                                    <!--                            type="text" name="facility_poc_name[]" value="{{ $facilitation->facility_poc_name }}" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 spacing-right">-->
                                    <!--                        POC Designation <br> <input-->
                                    <!--                            class="form-control" name="facility_poc_desig[]" value="{{ $facilitation->facility_poc_desig }}" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 spacing-right">-->
                                    <!--                        POC Contact No <br> <input-->
                                    <!--                            class="form-control" name="facility_poc_contact[]" value="{{ $facilitation->facility_poc_contact }}" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 spacing-right">-->
                                    <!--                        POC Email <br> <input class="form-control"-->
                                    <!--                            type="text" name="facility_poc_email[]" value="{{ $facilitation->facility_poc_email }}" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 spacing-right">-->
                                    <!--                        Office No <br> <input class="form-control"-->
                                    <!--                        type="text" name="facility_poc_office[]" value="{{ $facilitation->facility_poc_office }}" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 spacing-right">-->
                                    <!--                        Floor <br> <input class="form-control" id=""-->
                                    <!--                            type="text" name="facility_poc_floor[]" value="{{ $facilitation->facility_poc_floor }}" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 spacing-right">-->
                                    <!--                        Building <br> <input class="form-control"-->
                                    <!--                            type="text" name="facility_poc_building[]" value="{{ $facilitation->facility_poc_building }}" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 spacing-right">-->
                                    <!--                        Block <br> <input class="form-control"-->
                                    <!--                        type="text" name="facility_poc_block[]" value="{{ $facilitation->facility_poc_block }}" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 spacing-right">-->
                                    <!--                        Area <br> <input class="form-control"-->
                                    <!--                            type="text" name="facility_poc_area[]" value="{{ $facilitation->facility_poc_area }}" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 spacing-right">-->
                                    <!--                        City <br> <input class="form-control"-->
                                    <!--                            type="text" name="facility_poc_city[]" value="{{ $facilitation->facility_poc_city }}" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 spacing-right">-->
                                    <!--                        Photograph of Building <br> <input-->
                                    <!--                            class="form-control" id=""-->
                                    <!--                            type="file" name="facility_poc_building_photo[]" value="{{ $facilitation->facility_poc_building_photo }}" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 spacing-right">-->
                                    <!--                        Pin location <br> <input-->
                                    <!--                            class="form-control" id=""-->
                                    <!--                            type="text" name="facility_poc_loc[]" value="{{ $facilitation->facility_poc_loc }}" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                                <!--  -->

                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Flight Number <br> <input class="form-control"-->
                                    <!--                    type="text" name="flight_number[]" value="{{ $facilitation->flight_number }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Flying from which Country <br> <input-->
                                    <!--                    class="form-control" name="flying_from[]" value="{{ $facilitation->flying_from }}" type="text"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Guest/Focal Person Contact Number <br> <input-->
                                    <!--                    class="form-control" name="guest_number[]" value="{{ $facilitation->guest_number }}" type="text"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Copy Of Guest Ticket <br> <input-->
                                    <!--                    class="form-control" name="copy_of_guest_ticket[]" value="{{ $facilitation->copy_of_guest_ticket }}" type="file"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Copy of Guest Visa <br> <input class="form-control"-->
                                    <!--                    type="file" name="copy_of_guest_visa[]" value="{{ $facilitation->copy_of_guest_visa }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Guest Travelling Schedule <br> <input-->
                                    <!--                    class="form-control" name="guest_schedule[]" value="{{ $facilitation->guest_schedule }}" type="file"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <h5 class="mt-1">Baggage Details :</h5>-->
                                    <!--            <div class="col-lg-6 spacing-right">-->
                                    <!--                Hand Carry : <br> <input class="form-control" name="hand_carry[]" value="{{ $facilitation->hand_carry }}" type="text"-->
                                    <!--                placeholder="..." style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Weight <br> <input class="form-control" name="luggage_weight[]" value="{{ $facilitation->luggage_weight }}" type="text"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Tag Number of Booked Luggage <br> <input-->
                                    <!--                    class="form-control" name="tag_number[]" value="{{ $facilitation->tag_number }}" type="text"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Color of Bags <br> <input class="form-control"-->
                                    <!--                    type="text" name="color_of_bags[]" value="{{ $facilitation->color_of_bags }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Weight of Bags <br> <input class="form-control"-->
                                    <!--                    type="text" name="weight_of_bags[]" value="{{ $facilitation->weight_of_bags }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Picture of Bags <br> <input class="form-control"-->
                                    <!--                    type="file" name="picture_of_bags[]" value="{{ $facilitation->picture_of_bags }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6">-->
                                    <!--                Notes <br> <textarea class="form-control mt-1"-->
                                    <!--                    id="head_office_name"-->
                                    <!--                    type="text" name="facilitation_notes[]"  placeholder="..."-->
                                    <!--                    style="width: 100%;">{{ $facilitation->facilitation_notes }}</textarea>-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6">-->
                                    <!--                Attachments <br> <input class="form-control mt-1"-->
                                    <!--                    id="head_office_email" name="facilitation_attach[]" value="{{ $facilitation->facilitation_attach }}"-->
                                    <!--                    type="file" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            @endforeach
                        @else
                        <p>No Facilitation details found.</p>
                    @endif
                    </div>


                </div>

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion4_1">
                        @if($requirements->requirementjet && $requirements->requirementjet->isNotEmpty())
                            @foreach ($requirements->requirementjet as $index => $jet)
                            <!-- Initial Accordion Item -->
                            <div class="accordion-item signaccordion-item4_1" id="signatoryEntry4_1{{ $index + 1 }}">
                                <h2 class="accordion-header" id="signatoryHeading4_1{{ $index + 1 }}"
                                    style="color: white">
                                    <button class="accordion-button"
                                        style="background-color: #34005A; color:white" type="button"
                                        data-toggle="collapse" data-target="#signatoryCollapse4_1{{ $index + 1 }}"
                                        aria-expanded="false" aria-controls="signatoryCollapse4_1{{ $index + 1 }}">
                                        Private Jet Entry {{ $index + 1 }}
                                    </button>
                                </h2>
                                <!--<div id="signatoryCollapse4_1{{ $index + 1 }}" class="collapse"-->
                                <!--    aria-labelledby="signatoryHeading4_1{{ $index + 1 }}">-->
                                <!--    <div class="accordion-body">-->
                                <!--        <div class="row mb-2" id="signatoryDetailsContainer4_1">-->
                                            <!-- Your content for entry goes here -->
                                <!--            <div class="col-lg-6 mt-1">-->
                                <!--                No. of Days Private Jet Required for <br> <input-->
                                <!--                    class="form-control" name="no_of_days_private_jet[]" value="{{ $jet->no_of_days_private_jet }}" type="text"-->
                                <!--                    placeholder="..."-->
                                <!--                    style="width: 100%;">-->
                                <!--            </div>-->
                                <!--            <div class="col-lg-6 spacing-right">-->
                                <!--                Fuel <br>  <input name="fuel_for_private_jet[]" value="{{ $jet->fuel_for_private_jet }}"-->
                                <!--                class="form-control" type="text" placeholder="..."-->
                                <!--                style="width: 100%;">-->

                                <!--            </div>-->
                                <!--            <div class="col-lg-12 mt-1 spacing-right" id="rateOfFuel">-->
                                <!--                Rate of Fuel per Kilometer <br> <input name="rate_of_fuel_for_jet[]" value="{{ $jet->rate_of_fuel_for_jet }}"-->
                                <!--                    class="form-control" type="text" placeholder="..."-->
                                <!--                    style="width: 100%;">-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                            @endforeach
                        @else
                            <p>No Jet details found.</p>
                        @endif
                    </div>

                </div>

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion5">
                        @if($requirements->requirementevent && $requirements->requirementevent->isNotEmpty())
                            @foreach ($requirements->requirementevent as $index => $event)
                            <!-- Initial Accordion Item -->
                                <div class="accordion-item signaccordion-item5" id="signatoryEntry5{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading5{{ $index + 1 }}"
                                        style="color: white">
                                        <button class="accordion-button"
                                            style="background-color: #34005A; color:white" type="button"
                                            data-toggle="collapse" data-target="#signatoryCollapse5{{ $index + 1 }}"
                                            aria-expanded="false" aria-controls="signatoryCollapse5{{ $index + 1 }}">
                                            Event Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <!--<div id="signatoryCollapse5{{ $index + 1 }}" class="collapse"-->
                                    <!--    aria-labelledby="signatoryHeading5{{ $index + 1 }}">-->
                                    <!--    <div class="accordion-body">-->
                                            <!-- Your content for entry goes here -->
                                    <!--        <div class="row mb-2" id="signatoryDetailsContainer5">-->
                                    <!--            <div class="row mb-2">-->
                                    <!--                <div class="col-lg-6 spacing-right" id="Owner">-->
                                    <!--                    Ownership Status : <br>  <input class="form-control" name="ownership_status[]"-->
                                    <!--                    type="text" value="{{ $event->ownership_status }}"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->

                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 spacing-right">-->
                                    <!--                    Required for : <br>   <input class="form-control" name="event_req_for[]"-->
                                    <!--                    type="text" value="{{ $event->event_req_for }}"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->

                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 mt-1">-->
                                    <!--                    No of days Security Staff Required for <br>-->
                                    <!--                    <input class="form-control" name="event_no_of_staff[]"-->
                                    <!--                        type="text" value="{{ $event->event_no_of_staff }}"-->
                                    <!--                        placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 mt-1">-->
                                    <!--                    Duty Start Date <br> <input class="form-control"-->
                                    <!--                        type="date" name="event_duty_start_date[]" value="{{ $event->event_duty_start_date }}" placeholder="..."-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 mt-1">-->
                                    <!--                    Duty End Date <br> <input class="form-control"-->
                                    <!--                        type="date" name="event_duty_end_date[]" value="{{ $event->event_duty_end_date }}" placeholder="..."-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 mt-1">-->
                                    <!--                    Duty Start Time <br> <input class="form-control"-->
                                    <!--                        type="time" name="event_duty_start_time[]" value="{{ $event->event_duty_start_time }}" placeholder="..."-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 mt-1">-->
                                    <!--                    Duty End Time <br> <input class="form-control"-->
                                    <!--                        type="time" name="event_duty_end_time[]" value="{{ $event->event_duty_end_time }}" placeholder="..."-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 mt-1">-->
                                    <!--                    Shift Duration <br> <input class="form-control"-->
                                    <!--                        type="text" name="event_shift_duration[]" value="{{ $event->event_shift_duration }}" placeholder="..."-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 mt-1 spacing-right">-->
                                    <!--                    Shift Type : <br> <input class="form-control"-->
                                    <!--                    type="text" name="event_shift_type[]" value="{{ $event->event_shift_type }}" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->

                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 mt-1">-->
                                    <!--                    No. of Shifts <br> <input class="form-control"-->
                                    <!--                        type="text" name="event_no_of_shifts[]" value="{{ $event->event_no_of_shifts }}" placeholder="..."-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 mt-2 ml-3 ">-->
                                    <!--                    <input class="form-check-input" name="event_reporting_location[]" type="checkbox"-->
                                    <!--                        id="reporting_location_check">-->
                                    <!--                    <label class="form-check-label"-->
                                    <!--                        for="check">Reporting Location</label>-->
                                    <!--                </div>-->

                                                    <!-- Address -->
                                    <!--                <div class="container " id="reporting_location_form"-->
                                    <!--                    style="display: none;">-->
                                    <!--                    <div class="row row-cols-2">-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Office No <br> <input-->
                                    <!--                                class="form-control" name="event_office_no[]" id=""-->
                                    <!--                                type="text" placeholder="..." value="{{ $event->event_office_no }}"-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Floor <br> <input class="form-control"-->
                                    <!--                                id="" type="text" name="event_floor[]"-->
                                    <!--                                placeholder="..." value="{{ $event->event_floor }}"-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Building <br> <input-->
                                    <!--                                class="form-control" id="" value="{{ $event->event_building }}"-->
                                    <!--                                type="text" name="event_building[]" placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Block <br> <input class="form-control"-->
                                    <!--                                id="" name="event_block[]" value="{{ $event->event_block }}" type="text"-->
                                    <!--                                placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Area <br> <input class="form-control"-->
                                    <!--                                id="" type="text" name="event_area[]"-->
                                    <!--                                placeholder="..." value="{{ $event->event_area }}"-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            City <br> <input class="form-control"-->
                                    <!--                                id=""  type="text" name="event_city[]"-->
                                    <!--                                placeholder="..." value="{{ $event->event_city }}"-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Photograph of Building <br> <input-->
                                    <!--                                class="form-control" id="" name="event_photo[]"-->
                                    <!--                                type="file" placeholder="..." value="{{ $event->event_photo }}"-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Pin location <br> <input-->
                                    <!--                                class="form-control" id="" name="event_loc[]"-->
                                    <!--                                type="text" placeholder="..." value="{{ $event->event_loc }}"-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                                    <!--  -->

                                    <!--                <div class="col-lg-6 mt-1">-->
                                    <!--                    Event Date <br> <input class="form-control"-->
                                    <!--                        type="date" value="{{ $event->event_date }}" placeholder="..." name="event_date[]"-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 mt-1">-->
                                    <!--                    Event Venue <br> <input class="form-control"-->
                                    <!--                        type="file" value="{{ $event->event_venue }}" placeholder="..." name="event_venue[]"-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Deployment Plan <br> <input-->
                                    <!--                        class="form-control mt-1"-->
                                    <!--                        id="head_office_email" name="event_deployment_plan[]"-->
                                    <!--                        type="file" placeholder="..." value="{{ $event->event_deployment_plan }}"-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Notes <br> <textarea class="form-control mt-1"-->
                                    <!--                        id="head_office_name" name="event_security_notes[]"-->
                                    <!--                        type="text" placeholder="..."-->
                                    <!--                        style="width: 100%;">{{ $event->event_security_notes }}</textarea>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Attachments <br> <input-->
                                    <!--                        class="form-control mt-1"-->
                                    <!--                        id="head_office_email" name="event_security_attach[]"-->
                                    <!--                        type="file" placeholder="..." value="{{ $event->event_security_attach }}"-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->


                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            @endforeach
                        @else
                            <p>No Event details found.</p>
                        @endif
                    </div>


                </div>

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion6">
                        @if($requirements->requirementconsultancy && $requirements->requirementconsultancy->isNotEmpty())
                            @foreach ($requirements->requirementconsultancy as $index => $consultancy)
                                <!-- Initial Accordion Item -->
                                <div class="accordion-item signaccordion-item6" id="signatoryEntry6{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading6{{ $index + 1 }}"
                                        style="color: white">
                                        <button class="accordion-button"
                                            style="background-color: #34005A; color:white" type="button"
                                            data-toggle="collapse" data-target="#signatoryCollapse6{{ $index + 1 }}"
                                            aria-expanded="false" aria-controls="signatoryCollapse6{{ $index + 1 }}">
                                            Security Consultancy Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <!--<div id="signatoryCollapse6{{ $index + 1 }}" class="collapse"-->
                                    <!--    aria-labelledby="signatoryHeading6{{ $index + 1 }}">-->
                                    <!--    <div class="accordion-body">-->
                                    <!--        <div class="row mb-2" id="signatoryDetailsContainer6">-->
                                                <!-- Your content for entry goes here -->
                                    <!--            <div class="col-lg-6 form-group spacing-left">-->
                                    <!--                Category:<br> <input class="form-control mt-1"-->
                                    <!--                id=""  type="file" value="{{ $consultancy->consultancy_category }}" name="consultancy_category[]"-->
                                    <!--                placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6">-->
                                    <!--                Scope of Work <br> <input class="form-control mt-1"-->
                                    <!--                    id=""  type="file" value="{{ $consultancy->scope_of_work }}" name="scope_of_work[]"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1 ">-->
                                    <!--                Internal Deadline <br> <input-->
                                    <!--                    class="form-control mt-1" id=""-->
                                    <!--                    type="date" name="internal_deadline[]" value="{{ $consultancy->internal_deadline }}"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1 ">-->
                                    <!--                Date of Submission of Report <br> <input-->
                                    <!--                    class="form-control mt-1" id="" name="consultancy_date_of_submission[]"-->
                                    <!--                    type="date" value="{{ $consultancy->consultancy_date_of_submission }}"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Notes <br> <textarea class="form-control mt-1"-->
                                    <!--                    id="head_office_name" name="consultancy_notes[]"-->
                                    <!--                    type="text" placeholder="..."-->
                                    <!--                    style="width: 100%;">{{ $consultancy->consultancy_notes }}</textarea>-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Attachements <br> <input class="form-control" value="{{ $consultancy->consultancy_attach }}"-->
                                    <!--                    type="file" placeholder="..." name="consultancy_attach[]"-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            @endforeach
                        @else
                            <p>No Security Consultancy details found.</p>
                        @endif
                    </div>


                </div>

                <div class="container my-1" >
                    <div class="accordion" id="signatoryAccordion7" style="width:100%;">
                        @if($requirements->requirementfire && $requirements->requirementfire->isNotEmpty())
                            @foreach ($requirements->requirementfire as $index => $fire)
                                <!-- Initial Accordion Item -->
                                <!--<div class="accordion-item signaccordion-item7" id="signatoryEntry7{{ $index + 1 }}">-->
                                <!--    <h2 class="accordion-header" id="signatoryHeading7{{ $index + 1 }}"-->
                                <!--        style="color: white">-->
                                <!--        <button class="accordion-button"-->
                                <!--            style="background-color: #34005A; color:white" type="button"-->
                                <!--            data-toggle="collapse" data-target="#signatoryCollapse7{{ $index + 1 }}"-->
                                <!--            aria-expanded="false" aria-controls="signatoryCollapse7{{ $index + 1 }}">-->
                                <!--            Active Fire Equipment Entry {{ $index + 1 }}-->
                                <!--        </button>-->
                                <!--    </h2>-->
                                <!--    <div id="signatoryCollapse7{{ $index + 1 }}" class="collapse"-->
                                <!--        aria-labelledby="signatoryHeading7{{ $index + 1 }}">-->
                                <!--        <div class="accordion-body">-->
                                <!--            <div class="row mb-2" id="signatoryDetailsContainer7">-->
                                <!--                <div class="row mb-2">-->
                                <!--                    <div class="col-lg-3 spacing-right">-->
                                <!--                        Fire Class: <br>   <input class="form-control"-->
                                <!--                        type="text" name="fire_equipment_name[]" value="{{ $fire->fireClass }}" placeholder="..."-->
                                <!--                        style="width: 100%;">-->
                                <!--                    </div>-->
                                <!--                    <div class="col-lg-12 spacing-right" id="classAContent" style="display:none">-->
                                <!--                        <div class="row mt-2">-->
                                <!--                            <h5>Cylinder Type</h5>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="waterCylinder[]" id="checkbox1">-->
                                <!--                                <label for="checkbox1">Water Cylinder</label>-->
                                <!--                            </div>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="dryChemical[]" id="checkbox2">-->
                                <!--                                <label for="checkbox2">Dry Chemical Powder BE </label>-->
                                <!--                            </div>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="CoTwo[]" id="checkbox3">-->
                                <!--                                <label for="checkbox3">Carbon Dioxide CO2 </label>-->
                                <!--                            </div>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="foam[]" id="checkbox4">-->
                                <!--                                <label for="checkbox4">Foam</label>-->
                                <!--                            </div>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="wetChemical[]" id="checkbox5">-->
                                <!--                                <label for="checkbox5">Wet Chemical</label>-->
                                <!--                            </div>-->
                                <!--                        </div>-->
                                <!--                    </div>-->
                                <!--                    <div class="col-lg-12 spacing-right" id="classBContent" style="display:none;">-->
                                <!--                        <div class="row mt-2">-->
                                <!--                            <h5>Cylinder Type</h5>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="dryChemicalAbe[]" id="checkbox1">-->
                                <!--                                <label for="checkbox1">Dry Chemical Powder ABE</label>-->
                                <!--                            </div>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="dryChemicalBe[]" id="checkbox2">-->
                                <!--                                <label for="checkbox2">Dry Chemical Powder BE </label>-->
                                <!--                            </div>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="Co2[]" id="checkbox3">-->
                                <!--                                <label for="checkbox3">Carbon Dioxide CO2 </label>-->
                                <!--                            </div>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="foam2[]" id="checkbox4">-->
                                <!--                                <label for="checkbox4">Foam</label>-->
                                <!--                            </div>-->
                                <!--                        </div>-->
                                <!--                    </div>-->
                                <!--                    <div class="col-lg-12 spacing-right" id="classCContent" style="display:none;">-->
                                <!--                        <div class="row mt-2">-->
                                <!--                            <h5>Cylinder Type</h5>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="dryChemicalPowderABE[]" id="checkbox1">-->
                                <!--                                <label for="checkbox1">Dry Chemical Powder ABE</label>-->
                                <!--                            </div>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="dryChemicalPowderBE[]" id="checkbox2">-->
                                <!--                                <label for="checkbox2">Dry Chemical Powder BE </label>-->
                                <!--                            </div>-->
                                <!--                        </div>-->
                                <!--                    </div>-->
                                <!--                    <div class="col-lg-12 spacing-right" id="classDContent" style="display:none;">-->
                                <!--                        <div class="row mt-2">-->
                                <!--                            <h5>Cylinder Type</h5>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="dryChemicalPowderABE1[]" id="checkbox1">-->
                                <!--                                <label for="checkbox1">Dry Chemical Powder ABE</label>-->
                                <!--                            </div>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="dryChemicalPowderBE1[]" id="checkbox2">-->
                                <!--                                <label for="checkbox2">Dry Chemical Powder BE </label>-->
                                <!--                            </div>-->
                                <!--                        </div>-->
                                <!--                    </div>-->
                                <!--                    <div class="col-lg-12 spacing-right" id="classEContent" style="display:none;">-->
                                <!--                        <div class="row mt-2">-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="dryChemicalPowderABE2[]" id="checkbox1">-->
                                <!--                                <label for="checkbox1">Dry Chemical Powder ABE</label>-->
                                <!--                            </div>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="dryChemicalPowderBE2[]" id="checkbox2">-->
                                <!--                                <label for="checkbox2">Dry Chemical Powder BE </label>-->
                                <!--                            </div>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="cd2[]" id="checkbox2">-->
                                <!--                                <label for="checkbox2">Carbon Dioxide CO2</label>-->
                                <!--                            </div>-->
                                <!--                        </div>-->
                                <!--                    </div>-->
                                <!--                    <div class="col-lg-12 spacing-right" id="classFContent" style="display:none;">-->
                                <!--                        <div class="row mt-2">-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="dryChemicalPowderBE3[]" id="checkbox2">-->
                                <!--                                <label for="checkbox2">Dry Chemical Powder BE </label>-->
                                <!--                            </div>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="foam3[]" id="checkbox1">-->
                                <!--                                <label for="checkbox1">Foam</label>-->
                                <!--                            </div>-->
                                <!--                            <div class="col-lg-2">-->
                                <!--                                <input type="checkbox" input="wetChemical2[]" id="checkbox2">-->
                                <!--                                <label for="checkbox2">Wet Chemical</label>-->
                                <!--                            </div>-->
                                <!--                        </div>-->
                                <!--                    </div>-->
                                <!--                    <div class="col-lg-3 spacing-right">-->
                                <!--                        Equipment Name : <br>-->
                                <!--                        <input class="form-control"-->
                                <!--                        type="text" name="fire_equipment_name[]" value="{{ $fire->fire_equipment_name }}" placeholder="..."-->
                                <!--                        style="width: 100%;">-->
                                <!--                    </div>-->
                                <!--                    <div class="col-lg-3 spacing-right">-->
                                <!--                        Cylinder Size : <br>-->
                                <!--                        <input class="form-control"-->
                                <!--                            type="text" name="fire_cylinder_type[]" value="{{ $fire->fire_cylinder_type }}" placeholder="..."-->
                                <!--                            style="width: 100%;">-->
                                <!--                    </div>-->
                                <!--                    <div class="col-lg-3 mt-1">-->
                                <!--                        Article No<br> <input class="form-control"-->
                                <!--                            type="text" name="fire_article_no[]" value="{{ $fire->fire_article_no }}"  placeholder="..."-->
                                <!--                            style="width: 100%;">-->
                                <!--                    </div>-->
                                <!--                    <div class="col-lg-3 mt-1">-->
                                <!--                        Model <br> <input class="form-control" name="fire_model[]" value="{{ $fire->fire_model }}" type="text" placeholder="..."-->
                                <!--                            style="width: 100%;">-->
                                <!--                    </div>-->
                                <!--                    <div class="col-lg-3 mt-1 spacing-right">-->
                                <!--                        Year of Manufacturing : <br>-->
                                <!--                        <input class="form-control" name="fire_year_of_manufacturing[]" value="{{ $fire->fire_year_of_manufacturing }}" type="text" placeholder="..."-->
                                <!--                            style="width: 100%;">-->
                                <!--                    </div>-->
                                <!--                    <div class="col-lg-3 spacing-right">-->
                                <!--                        Expiry Date : <br>-->
                                <!--                        <input class="form-control" name="fire_expiry_date[]" value="{{ $fire->fire_expiry_date }}" type="text" placeholder="..."-->
                                <!--                            style="width: 100%;">-->
                                <!--                    </div>-->
                                <!--                    <div class="col-lg-3 mt-1">-->
                                <!--                        Warranty Period <br> <input class="form-control" id=""-->
                                <!--                            type="text" name="fire_warranty_period[]" value="{{ $fire->fire_warranty_period }}" placeholder="..." style="width: 100%;">-->
                                <!--                    </div>-->
                                <!--                    <p>"Your Fire Fighting Cylinder is going to expire on "</p>-->
                                <!--                    <div class="container " id="">-->
                                <!--                        <div class="row row-cols-2">-->

                                <!--                            <div class="col-lg-3 mt-1">-->
                                <!--                                Color <br> <input class="form-control" id="" name="fire_color[]" value="{{ $fire->fire_color }}" type="text"-->
                                <!--                                    placeholder="..." style="width: 100%;">-->
                                <!--                            </div>-->
                                <!--                            <div class="col-lg-3 mt-1">-->
                                <!--                                Quantity <br> <input class="form-control" id="" name="fire_quantity[]" value="{{ $fire->fire_quantity }}"-->
                                <!--                                    type="text" placeholder="..." style="width: 100%;">-->
                                <!--                            </div>-->
                                <!--                            <div class="col-lg-3 mt-1">-->
                                <!--                                Specifications Sheet: <br> <input class="form-control" id="" value="{{ $fire->fire_specifications }}"-->
                                <!--                                    type="file" name="fire_specifications[]" placeholder="..." style="width: 100%;">-->
                                <!--                            </div>-->
                                <!--                        </div>-->
                                <!--                    </div>-->
                                <!--                </div>-->
                                <!--                <div class="col-lg-6">-->
                                <!--                    Notes <br> <textarea class="form-control mt-1"-->
                                <!--                        id="head_office_name"-->
                                <!--                        type="text" name="fire_notes[]" placeholder="..."-->
                                <!--                        style="width: 100%;">{{ $fire->fire_notes }}</textarea>-->
                                <!--                </div>-->
                                <!--                <div class="col-lg-6">-->
                                <!--                    Attachments <br> <input class="form-control mt-1"-->
                                <!--                        id="head_office_email" name="fire_attach[]"-->
                                <!--                        type="file" placeholder="..." value="{{ $fire->fire_attach }}"-->
                                <!--                        style="width: 100%;">-->
                                <!--                </div>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                            @endforeach
                        @else
                            <p>No Fire details found.</p>
                        @endif
                    </div>

                </div>

                <div class="container my-1" >
                    <div class="accordion" id="signatoryAccordion15" style="width:100%;">
                        <!-- Initial Accordion Item -->
                        @if($requirements->requirementotherfire && $requirements->requirementotherfire->isNotEmpty())
                        @foreach ($requirements->requirementotherfire as $index => $otherfire)
                        <!--<div class="accordion-item signaccordion-item15" id="signatoryEntry15{{ $index + 1 }}">-->
                        <!--    <h2 class="accordion-header" id="signatoryHeading15{{ $index + 1 }}"-->
                        <!--        style="color: white">-->
                        <!--        <button class="accordion-button"-->
                        <!--            style="background-color: #34005A; color:white" type="button"-->
                        <!--            data-toggle="collapse" data-target="#signatoryCollapse15{{ $index + 1 }}"-->
                        <!--            aria-expanded="false" aria-controls="signatoryCollapse15{{ $index + 1 }}">-->
                        <!--            Other Active Fire Protection Entry {{ $index + 1 }}-->
                        <!--        </button>-->
                        <!--    </h2>-->
                        <!--    <div id="signatoryCollapse15{{ $index + 1 }}" class="collapse"-->
                        <!--        aria-labelledby="signatoryHeading15{{ $index + 1 }}">-->
                        <!--        <div class="accordion-body">-->
                        <!--            <div class="row mb-2" id="signatoryDetailsContainer15">-->
                        <!--                <div class="row mb-2">-->
                        <!--                    <div class="col-lg-6 spacing-right">-->
                        <!--                        Categories : <br> <input class="form-control"-->
                        <!--                        type="text" name="other_fire_category[]" value="{{ $otherfire->other_fire_category }}" placeholder="..."-->
                        <!--                        style="width: 100%;">-->
                        <!--                    </div>-->
                        <!--                    <div class="col-lg-6 spacing-right">-->
                        <!--                        Equipment Name : <br>-->
                        <!--                        <input class="form-control"-->
                        <!--                            type="text" name="other_equip_name[]" value="{{ $otherfire->other_equip_name }}" placeholder="..."-->
                        <!--                            style="width: 100%;">-->
                        <!--                    </div>-->
                        <!--                    <div class="col-lg-6 mt-1">-->
                        <!--                        Article No<br> <input class="form-control"-->
                        <!--                            type="text" name="other_article_no[]" value="{{ $otherfire->other_article_no }}" placeholder="..."-->
                        <!--                            style="width: 100%;">-->
                        <!--                    </div>-->
                        <!--                    <div class="col-lg-6 mt-1">-->
                        <!--                        Model <br> <input class="form-control" name="other_model[]" value="{{ $otherfire->other_model }}" type="text" placeholder="..."-->
                        <!--                            style="width: 100%;">-->
                        <!--                    </div>-->
                        <!--                    <div class="col-lg-6 mt-1 spacing-right">-->
                        <!--                        Year of Manufacturing : <br>-->
                        <!--                        <input class="form-control" name="other_year_of_manufacture[]" value="{{ $otherfire->other_year_of_manufacture }}" type="text" placeholder="..."-->
                        <!--                            style="width: 100%;">-->
                        <!--                    </div>-->
                        <!--                    <div class="col-lg-6 spacing-right">-->
                        <!--                        Expiry Date : <br>-->
                        <!--                        <input class="form-control" name="other_expiry_date[]" value="{{ $otherfire->other_expiry_date }}" type="text" placeholder="..."-->
                        <!--                            style="width: 100%;">-->
                        <!--                    </div>-->
                        <!--                    <p>"Your Fire Fighting Cylinder is going to expire on "</p>-->
                        <!--                    <div class="container " id="">-->
                        <!--                        <div class="row row-cols-2">-->
                        <!--                            <div class="col-lg-6 mt-1">-->
                        <!--                                Warranty Period <br> <input class="form-control" id=""-->
                        <!--                                    type="text" name="other_warranty_period[]" value="{{ $otherfire->other_warranty_period }}" placeholder="..." style="width: 100%;">-->
                        <!--                            </div>-->
                        <!--                            <div class="col-lg-6 mt-1">-->
                        <!--                                Color <br> <input class="form-control" id="" name="other_fire_category[]" type="text"-->
                        <!--                                value="{{ $otherfire->other_fire_category }}" placeholder="..." style="width: 100%;">-->
                        <!--                            </div>-->
                        <!--                            <div class="col-lg-6 mt-1">-->
                        <!--                                Quantity <br> <input class="form-control" id=""-->
                        <!--                                value="{{ $otherfire->other_quantity }}" type="text" name="other_quantity[]" placeholder="..." style="width: 100%;">-->
                        <!--                            </div>-->
                        <!--                            <div class="col-lg-6 mt-1">-->
                        <!--                                Specifications Sheet: <br> <input class="form-control" id=""-->
                        <!--                                value="{{ $otherfire->other_specifications }}" type="file" name="other_specifications[]" placeholder="..." style="width: 100%;">-->
                        <!--                            </div>-->
                        <!--                            <div class="col-lg-6 mt-1">-->
                        <!--                                Scope of Work <br> <input class="form-control" id=""-->
                        <!--                                value="{{ $otherfire->other_scope_of_work }}"  type="file" name="other_scope_of_work[]" placeholder="..." style="width: 100%;">-->
                        <!--                            </div>-->
                        <!--                            <div class="col-lg-6 mt-1">-->
                        <!--                                Any Special Instructions <br> <textarea class="form-control mt-1"-->
                        <!--                                id="head_office_name" name="other_fire_category[]"-->
                        <!--                                type="text" placeholder="..." value="{{ $otherfire->other_fire_category }}"-->
                        <!--                                style="width: 100%;"></textarea>-->
                        <!--                            </div>-->
                        <!--                            <div class="col-lg-6 mt-1">-->
                        <!--                                Picture of Building/Premises:  <br> <input class="form-control" id=""-->
                        <!--                                value="{{ $otherfire->other_picture_of_building }}"   type="file" name="other_picture_of_building[]" placeholder="..." style="width: 100%;">-->
                        <!--                            </div>-->
                        <!--                            <div class="col-lg-6 mt-1">-->
                        <!--                                Complete Equipment Cost:  <br> <input class="form-control" id=""-->
                        <!--                                value="{{ $otherfire->other_complete_cost }}"   type="text" name="other_complete_cost[]" placeholder="..." style="width: 100%;">-->
                        <!--                            </div>-->
                        <!--                            <div class="col-lg-6 mt-1">-->
                        <!--                                Delivery charges:  <br> <input class="form-control" id=""-->
                        <!--                                value="{{ $otherfire->other_delivery_charges }}"   type="text" name="other_delivery_charges[]" placeholder="..." style="width: 100%;">-->
                        <!--                            </div>-->
                        <!--                            <div class="col-lg-6 mt-1">-->
                        <!--                                Installation Cost: <br> <input class="form-control" id=""-->
                        <!--                                value="{{ $otherfire->other_installtion_cost }}"   type="text" name="other_installtion_cost[]" placeholder="..." style="width: 100%;">-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="col-lg-6">-->
                        <!--                    Notes <br> <textarea class="form-control mt-1"-->
                        <!--                        id="head_office_name" name="other_fire_notes[]"-->
                        <!--                        type="text" placeholder="..."-->
                        <!--                        style="width: 100%;">{{ $otherfire->other_fire_notes }}</textarea>-->
                        <!--                </div>-->
                        <!--                <div class="col-lg-6">-->
                        <!--                    Attachments <br> <input class="form-control mt-1"-->
                        <!--                        id="head_office_email" name="other_fire_attachment[]"-->
                        <!--                        type="file" placeholder="..." value="{{ $otherfire->other_fire_attachment }}"-->
                        <!--                        style="width: 100%;">-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        @endforeach
                        @else
                            <p>No Other Fire details found.</p>
                        @endif
                    </div>

                </div>

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion16">
                        <!-- Initial Accordion Item -->
                        @if($requirements->requirementpassive && $requirements->requirementpassive->isNotEmpty())
                            @foreach ($requirements->requirementpassive as $index => $passive)
                                <div class="accordion-item signaccordion-item16" id="signatoryEntry16{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading16{{ $index + 1 }}"
                                        style="color: white">
                                        <button class="accordion-button"
                                            style="background-color: #34005A; color:white" type="button"
                                            data-toggle="collapse" data-target="#signatoryCollapse16{{ $index + 1 }}"
                                            aria-expanded="false" aria-controls="signatoryCollapse16{{ $index + 1 }}">
                                            Passive Fire Protection Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <div id="signatoryCollapse16{{ $index + 1 }}" class="collapse"
                                        aria-labelledby="signatoryHeading16{{ $index + 1 }}">
                                        <div class="accordion-body">
                                            <div class="row mb-2" id="signatoryDetailsContainer16">
                                                <div class="row mb-2">
                                                    <div class="col-lg-12 spacing-right">
                                                        Categories : <br>     <input class="form-control"
                                                        type="text" name="passive_category[]" value="{{ $passive->passive_category }}" placeholder="..."
                                                        style="width: 100%;">
                                                    </div>
                                                    <h5>Dimensions</h5>
                                                    <div class="col-lg-6 spacing-right">
                                                        Length : <br>
                                                        <input class="form-control"
                                                            type="text" name="passive_dimension[]" value="{{ $passive->passive_dimension }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 mt-1">
                                                        Width<br> <input class="form-control"
                                                            type="text" name="passive_width[]" value="{{ $passive->passive_width }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 mt-1">
                                                        Height <br> <input class="form-control" name="passive_height[]" value="{{ $passive->passive_height }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 mt-1 spacing-right">
                                                        Thickness/Depth : <br>
                                                        <input class="form-control" name="passive_depth[]" value="{{ $passive->passive_depth }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Quantity : <br>
                                                        <input class="form-control" name="passive_quantity[]" value="{{ $passive->passive_quantity }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Material : <br>
                                                        <input class="form-control"
                                                            type="text" name="passive_material[]" value="{{ $passive->passive_material }}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 mt-1">
                                                        Equipment Name <br> <input class="form-control"
                                                            type="text" name="passive_equipment[]" value="{{ $passive->passive_equipment }}"  placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 mt-1">
                                                        Article No <br> <input class="form-control" name="passive_article[]" value="{{ $passive->passive_article }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 mt-1 spacing-right">
                                                        Model : <br>
                                                        <input class="form-control" name="passive_model[]" value="{{ $passive->passive_model }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Year of Manufacturing : <br>
                                                        <input class="form-control" name="passive_year_of_manufacture[]" value="{{ $passive->passive_year_of_manufacture }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Expiry Date:  : <br>
                                                        <input class="form-control" name="passive_expiry[]" value="{{ $passive->passive_expiry }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <p>"Your Passive Fire Fighting Cylinder is going to expire on "</p>
                                                    <div class="container " id="">
                                                        <div class="row row-cols-2">
                                                            <div class="col-lg-6 mt-1">
                                                                Warranty Period <br> <input class="form-control" id=""
                                                                value="{{ $passive->passive_warranty }}"       type="text" name="passive_warranty[]" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-6 mt-1">
                                                                Color <br> <input class="form-control" name="passive_color[]" id=""  type="text"
                                                                value="{{ $passive->passive_color }}"      placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-6 mt-1">
                                                                Quantity <br> <input class="form-control" name="passive_second_quantity[]" id=""
                                                                value="{{ $passive->passive_second_quantity }}"  type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-6 mt-1">
                                                                Scope of Work <br> <input class="form-control" name="passive_scope_of_work[]" id=""
                                                                value="{{ $passive->passive_scope_of_work }}"    type="file" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-6 mt-1">
                                                                Any Special Instructions <br> <textarea class="form-control mt-1"
                                                                id="head_office_name" name="passive_instruction[]"
                                                                type="text" placeholder="..." value="{{ $passive->passive_instruction }}"
                                                                style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-lg-6 mt-1">
                                                                Picture of Building/Premises:  <br> <input class="form-control" id=""
                                                                value="{{ $passive->passive_building_picture }}"  type="file" name="passive_building_picture[]" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-6 mt-1">
                                                                Complete Equipment Cost:  <br> <input class="form-control" id=""
                                                                value="{{ $passive->passive_complete_cost }}"  type="text" name="passive_complete_cost[]" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-6 mt-1">
                                                                Delivery charges:  <br> <input class="form-control" id=""
                                                                value="{{ $passive->passive_delivery_charges }}"   type="text" name="passive_delivery_charges[]" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-6 mt-1">
                                                                Installation Cost: <br> <input class="form-control" id=""
                                                                value="{{ $passive->passive_cost }}"  type="text" name="passive_cost[]" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-6 mt-1">
                                                                Drawings of the Buildings/Premises <br> <input class="form-control" id=""
                                                                value="{{ $passive->passive_drawings }}"    type="file" name="passive_drawings[]" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-6 mt-1">
                                                                Pictures of the Buildings/Premises <br> <input class="form-control" id=""
                                                                value="{{ $passive->passive_pictures }}"  type="file" name="passive_pictures[]" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-6 mt-1">
                                                                Complete Equipment Charges: <br> <input class="form-control" id=""
                                                                value="{{ $passive->passive_complete_equip_charges }}"   type="text" name="passive_complete_equip_charges[]" placeholder="..." style="width: 100%;">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No Passive Fire details found.</p>
                        @endif
                    </div>

                </div>

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion8">
                        @if($requirements->requirementequipment && $requirements->requirementequipment->isNotEmpty())
                            @foreach ($requirements->requirementequipment as $index => $equipment)
                                <!-- Initial Accordion Item -->
                                <div class="accordion-item signaccordion-item8" id="signatoryEntry8{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading8{{ $index + 1 }}"
                                        style="color: white">
                                        <button class="accordion-button"
                                            style="background-color: #34005A; color:white" type="button"
                                            data-toggle="collapse" data-target="#signatoryCollapse8{{ $index + 1 }}"
                                            aria-expanded="false" aria-controls="signatoryCollapse8{{ $index + 1 }}">
                                            Security Equipment Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <!--<div id="signatoryCollapse8{{ $index + 1 }}" class="collapse"-->
                                    <!--    aria-labelledby="signatoryHeading8{{ $index + 1 }}">-->
                                    <!--    <div class="accordion-body">-->
                                    <!--        <div class="row mb-2" id="signatoryDetailsContainer8">-->
                                                <!-- Your content for entry goes here -->
                                    <!--            <div class="col-lg-6 form-group spacing-left">-->
                                    <!--                Category:<br> <input-->
                                    <!--                class="form-control" type="text" name="equipment_category[]"-->
                                    <!--                placeholder="..." value="{{ $equipment->equipment_category }}" style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 spacing-right">-->
                                    <!--                Ownership Status : <br> <input-->
                                    <!--                class="form-control" type="text" name="equipment_ownership[]"-->
                                    <!--                value="{{ $equipment->equipment_ownership }}" placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->

                                    <!--            <div class="col-lg-6 spacing-right mt-1">-->
                                    <!--                Rental : <br> <input-->
                                    <!--                class="form-control" type="text" name="equipment_rental[]"-->
                                    <!--                value="{{ $equipment->equipment_rental }}" placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                No of days Equipment Required for <br> <input-->
                                    <!--                    class="form-control" type="text" name="equipment_no_of_days[]"-->
                                    <!--                    value="{{ $equipment->equipment_no_of_days }}"   placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Quantity <br> <input class="form-control"-->
                                    <!--                    type="text" placeholder="..." name="equipment_quality[]"-->
                                    <!--                    value="{{ $equipment->equipment_quality }}"   style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 spacing-right mt-1">-->
                                    <!--                Training for Customer's Staff Required : <br> <input class="form-control"-->
                                    <!--                type="text" placeholder="..." name="equipment_training[]"-->
                                    <!--                value="{{ $equipment->equipment_training }}"   style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 spacing-right">-->
                                    <!--                Delivery Required : <br> <input class="form-control"-->
                                    <!--                type="text" placeholder="..." name="equipment_delivery[]"-->
                                    <!--                value="{{ $equipment->equipment_delivery }}"   style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-2 ml-3 ">-->
                                    <!--                <input class="form-check-input" name="equipment_dilevery_loc[]" type="checkbox"-->
                                    <!--                    id="delievery_location_check_1">-->
                                    <!--                <label class="form-check-label"-->
                                    <!--                    for="check">Delievery Location </label>-->
                                    <!--            </div>-->
                                    <!--            <div class="container " id="delievery_location_form_1"-->
                                    <!--                style="display: none;">-->
                                    <!--                <div class="row row-cols-2">-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Office No <br> <input class="form-control"-->
                                    <!--                            id=""  type="text"  value="{{ $equipment->equipment_del_office_no }}" name="equipment_del_office_no[]"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Floor <br> <input class="form-control" id=""-->
                                    <!--                            type="text"  value="{{ $equipment->equipment_del_floor }}" placeholder="..." name="equipment_del_floor[]"-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Building <br> <input class="form-control"-->
                                    <!--                            id=""  value="{{ $equipment->equipment_del_building }}"  type="text" name="equipment_del_building[]"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Block <br> <input class="form-control" id=""-->
                                    <!--                            type="text"  value="{{ $equipment->equipment_del_block }}" placeholder="..." name="equipment_del_block[]"-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Area <br> <input class="form-control" id=""-->
                                    <!--                            type="text"  value="{{ $equipment->equipment_del_area }}" placeholder="..." name="equipment_del_area[]"-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        City <br> <input class="form-control" name="equipment_del_city[]" id=""-->
                                    <!--                            type="text"  value="{{ $equipment->equipment_del_city }}" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Photograph of Building <br> <input-->
                                    <!--                            class="form-control"  value="{{ $equipment->equipment_del_photo_building }}" id="" name="equipment_del_photo_building[]"-->
                                    <!--                            type="file" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Pin location <br> <input-->
                                    <!--                            class="form-control"  value="{{ $equipment->equipment_del_pin_loc }}" id="" name="equipment_del_pin_loc[]"-->
                                    <!--                            type="text" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->

                                    <!--            <div class="col-lg-6 spacing-right">-->
                                    <!--                Installation Required : <br> <input class="form-control"-->
                                    <!--                id="" name="equipment_installation_req[]" value="{{ $equipment->equipment_installation_req }}" type="text"-->
                                    <!--                placeholder="..." style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-2 ml-3 ">-->
                                    <!--                <input class="form-check-input" name="equipment_ins_loc[]"  type="checkbox"-->
                                    <!--                    id="installation_location_check_1">-->
                                    <!--                <label class="form-check-label"-->
                                    <!--                    for="check">Installation Location-->
                                    <!--                </label>-->
                                    <!--            </div>-->

                                    <!--            <div class="container "-->
                                    <!--                id="installation_location_form_1"-->
                                    <!--                style="display: none;">-->
                                    <!--                <div class="row row-cols-2">-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Office No <br> <input class="form-control"-->
                                    <!--                            id="" name="equipment_ins_office_no[]" value="{{ $equipment->equipment_ins_office_no }}" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Floor <br> <input class="form-control" id=""-->
                                    <!--                            type="text" name="equipment_ins_floor[]" value="{{ $equipment->equipment_ins_floor }}" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Building <br> <input class="form-control"-->
                                    <!--                            id="" type="text" name="equipment_ins_building[]" value="{{ $equipment->equipment_ins_building }}"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Block <br> <input class="form-control" id=""-->
                                    <!--                            type="text" placeholder="..." name="equipment_ins_block[]" value="{{ $equipment->equipment_ins_block }}"-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Area <br> <input class="form-control" id=""-->
                                    <!--                            type="text" placeholder="..." name="equipment_ins_area[]" value="{{ $equipment->equipment_ins_area }}"-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        City <br> <input class="form-control" name="equipment_ins_city[]" id=""-->
                                    <!--                            type="text" placeholder="..." value="{{ $equipment->equipment_ins_city }}"-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Photograph of Building <br> <input-->
                                    <!--                            class="form-control" name="equipment_ins_photo_building[]" id=""-->
                                    <!--                            type="file" placeholder="..." value="{{ $equipment->equipment_ins_photo_building }}"-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Pin location <br> <input-->
                                    <!--                            class="form-control" name="equipment_ins_pin_location[]" id=""-->
                                    <!--                            type="text" placeholder="..." value="{{ $equipment->equipment_ins_pin_location }}"-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6">-->
                                    <!--                Notes <br> <textarea class="form-control mt-1"-->
                                    <!--                    id="head_office_name" name="equipment_notes[]"-->
                                    <!--                    type="text" placeholder="..."-->
                                    <!--                    style="width: 100%;">{{ $equipment->equipment_notes }}</textarea>-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6">-->
                                    <!--                Attachments <br> <input class="form-control mt-1"-->
                                    <!--                    id="head_office_email" name="equipment_attachment[]" value="{{ $equipment->equipment_attachment }}"-->
                                    <!--                    type="file" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                        @endforeach
                        @else
                            <p>No Equipment details found.</p>
                        @endif
                    </div>


                </div>

                <div class="container  my-1" id="incidentContainer" >
                    <div class="accordion" id="incidentAccordion" >
                        @if($requirements->requirementbarrier && $requirements->requirementbarrier->isNotEmpty())
                            @foreach ($requirements->requirementbarrier as $index => $barrier)
                                <!-- Initial Accordion Item -->
                                <div class="accordion-item incidentaccordion-item" id="incidentEntry1{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="incidentHeading1{{ $index + 1 }}" style="color: white">
                                        <button class="accordion-button" style="background-color: #34005A; color:white"  type="button"
                                        data-toggle="collapse" data-target="#incidentCollapse1{{ $index + 1 }}" aria-expanded="false"
                                        aria-controls="incidentCollapse1{{ $index + 1 }}">
                                            Automatic Traffic Barrier Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <!--<div id="incidentCollapse1{{ $index + 1 }}" class="collapse" aria-labelledby="incidentHeading1{{ $index + 1 }}">-->
                                    <!--    <div class="accordion-body">-->
                                    <!--        <div class="row client-info">-->

                                    <!--            <div class="row mb-2">-->
                                    <!--                <div class="col-lg-6 form-group spacing-left">-->
                                    <!--                    Ownership Status :<br> <input class="form-control" type="text" name="barrier_ownership[]" value="{{ $barrier->barrier_ownership }}" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 form-group spacing-left">-->
                                    <!--                    Rental :<br> <input class="form-control" type="text" name="barrier_rental[]" value="{{ $barrier->barrier_rental }}" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    No. of Days:  <br>-->
                                    <!--                    <input class="form-control" type="text" name="barrier_no_of_days[]" value="{{ $barrier->barrier_no_of_days }}" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Model: <br> <input class="form-control" name="barrier_model[]" value="{{ $barrier->barrier_model }}" type="text"  placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Brand:  <br> <input class="form-control" name="barrier_brand[]" value="{{ $barrier->barrier_brand }}" type="text"  placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Specifications: <br>-->
                                    <!--                    <input class="form-control" type="text" name="barrier_specifications[]" value="{{ $barrier->barrier_specifications }}" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Quantity:  <br> <input class="form-control vldphone" type="text" name="barrier_quantity[]" value="{{ $barrier->barrier_quantity }}"  placeholder="..." style="width: 100%;">-->
                                    <!--                    <div id="phoneError" class="phoneError" style="color: red"></div>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Unit Price:  <br> <input class="form-control vldemail" name="barrier_unit[]" value="{{ $barrier->barrier_unit }}" type="text"  placeholder="..." style="width: 100%;">-->
                                    <!--                    <div id="emailError" class="emailError" style="color: red"></div>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Total Price: <br>-->
                                    <!--                    <input class="form-control" type="text" name="barrier_price[]" value="{{ $barrier->barrier_price }}" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <h5>Road Loop Detector: </h5>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Model:  <br> <input class="form-control" name="detector_model[]" value="{{ $barrier->detector_model }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Brand: <br> <input class="form-control" name="detector_brand[]" value="{{ $barrier->detector_brand }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Specifications: <br>-->
                                    <!--                    <textarea class="form-control" type="text" name="detector_specifications[]" placeholder="..." style="width: 100%;">{{ $barrier->detector_specifications }}</textarea>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Quantity:  <br> <input class="form-control" name="detector_quantity[]" value="{{ $barrier->detector_quantity }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Unit Price: <br> <input class="form-control" name="detector_unit[]" value="{{ $barrier->detector_unit }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Total Price: <br> <input class="form-control" name="detector_price[]" value="{{ $barrier->detector_price }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <h5>Traffic Lights: </h5>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Model:  <br> <input class="form-control" name="traffic_model[]" value="{{ $barrier->traffic_model }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Brand: <br> <input class="form-control" name="traffic_brand[]" value="{{ $barrier->traffic_brand }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Specifications: <br>-->
                                    <!--                    <textarea class="form-control" type="text" name="traffic_specifications[]" placeholder="..." style="width: 100%;">{{ $barrier->traffic_specifications }}</textarea>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Quantity:  <br> <input class="form-control" name="traffic_quantity[]" value="{{ $barrier->traffic_quantity }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Unit Price: <br> <input class="form-control" name="traffic_unit[]" value="{{ $barrier->traffic_unit }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Total Price: <br> <input class="form-control" name="traffic_price[]" value="{{ $barrier->traffic_price }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <h5>Breakaway Coupler: </h5>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Model:  <br> <input class="form-control" name="coupler_model[]" value="{{ $barrier->coupler_model }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Brand: <br> <input class="form-control" name="coupler_brand[]" value="{{ $barrier->coupler_brand }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Specifications: <br>-->
                                    <!--                    <textarea class="form-control" type="text" name="coupler_specification[]" placeholder="..." style="width: 100%;">{{ $barrier->coupler_specification }}</textarea>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Quantity:  <br> <input class="form-control" name="coupler_quantity[]" value="{{ $barrier->coupler_quantity }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Unit Price: <br> <input class="form-control" name="coupler_unit[]" value="{{ $barrier->coupler_unit }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Total Price: <br> <input class="form-control" name="coupler_price[]" value="{{ $barrier->coupler_price }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <h5>E-Tag Long Range RFID Reader: </h5>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Model:  <br> <input class="form-control" name="tag_model[]" value="{{ $barrier->tag_model }}"  type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Brand: <br> <input class="form-control" name="tag_brand[]" value="{{ $barrier->tag_brand }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Specifications: <br>-->
                                    <!--                    <textarea class="form-control" type="text" name="tag_specifications[]" placeholder="..." style="width: 100%;">{{ $barrier->tag_specifications }}</textarea>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Quantity:  <br> <input class="form-control"  name="tag_quantity[]" value="{{ $barrier->tag_quantity }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Unit Price: <br> <input class="form-control" name="tag_unit[]" value="{{ $barrier->tag_unit }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Total Price: <br> <input class="form-control" name="tag_price[]" value="{{ $barrier->tag_price }}"  type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <h5>Long Range E-Tags: </h5>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Model:  <br> <input class="form-control" name="Etag_model[]" value="{{ $barrier->Etag_model }}"  type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Brand: <br> <input class="form-control" name="Etag_brand[]" value="{{ $barrier->Etag_brand }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Specifications: <br>-->
                                    <!--                    <textarea class="form-control" type="text" name="Etag_specifications[]"  placeholder="..." style="width: 100%;">{{ $barrier->Etag_specifications }}</textarea>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Quantity:  <br> <input class="form-control" name="Etag_quantity[]" value="{{ $barrier->Etag_quantity }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Unit Price: <br> <input class="form-control" name="Etag_unit[]" value="{{ $barrier->Etag_unit }}"  type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Total Price: <br> <input class="form-control" name="Etag_price[]" value="{{ $barrier->Etag_price }}"  type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->

                                    <!--                <h5>Pole for E-Tag Reader: </h5>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Model:  <br> <input class="form-control" name="pole_model[]" value="{{ $barrier->pole_model }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Brand: <br> <input class="form-control" name="pole_brand[]" value="{{ $barrier->pole_brand }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Specifications: <br>-->
                                    <!--                    <textarea class="form-control" name="pole_specifications[]"  type="text" placeholder="..." style="width: 100%;">{{ $barrier->pole_specifications }}</textarea>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Quantity:  <br> <input class="form-control" name="pole_quantity[]" value="{{ $barrier->pole_quantity }}"  type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Unit Price: <br> <input class="form-control" name="pole_unit[]" value="{{ $barrier->pole_unit }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Total Price: <br> <input class="form-control" name="pole_price[]" value="{{ $barrier->pole_price }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <h5>Distribution Box with Circuit Breaker: </h5>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Model:  <br> <input class="form-control" name="breaker_model[]" value="{{ $barrier->breaker_model }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Brand: <br> <input class="form-control" type="text" name="breaker_brand[]" value="{{ $barrier->breaker_brand }}" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Specifications: <br>-->
                                    <!--                    <textarea class="form-control" type="text" name="breaker_specifications[]" placeholder="..." style="width: 100%;">{{ $barrier->breaker_specifications }}</textarea>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Quantity:  <br> <input class="form-control" name="breaker_quantity[]" value="{{ $barrier->breaker_quantity }}"  type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Unit Price: <br> <input class="form-control"  name="breaker_unit[]" value="{{ $barrier->breaker_unit }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Total Price: <br> <input class="form-control" name="breaker_price[]" value="{{ $barrier->breaker_price }}" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 form-group">-->
                                    <!--                    Installation, Testing & Commissioning :<br> <input class="form-control" name="barrier_installation[]" value="{{ $barrier->breaker_price }}" type="text" placeholder="..." style="width: 100%;">-->

                                    <!--                </div>-->

                                    <!--                <div class="col-lg-6 form-group">-->
                                    <!--                    Training of Customer Staff Required :<br>  <input class="form-control" name="barrier_training[]" value="{{ $barrier->breaker_price }}" type="text" placeholder="..." style="width: 100%;">-->

                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Upload Training Material : <br> <input class="form-control" name="barrier_upload_training[]" value="{{ $barrier->barrier_upload_training }}" type="file" placeholder="..." style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 form-group">-->
                                    <!--                    Delivery Required :<br> <input class="form-control" name="barrier_delivery[]" value="{{ $barrier->barrier_upload_training }}" type="file" placeholder="..." style="width: 100%;">-->

                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 mt-2 ml-3 ">-->
                                    <!--                    <input class="form-check-input" name="barrier_del_loc[]" type="checkbox"-->
                                    <!--                        id="delievery_location_check_3">-->
                                    <!--                    <label class="form-check-label"-->
                                    <!--                        for="check">Delievery Location-->
                                    <!--                    </label>-->
                                    <!--                </div>-->
                                    <!--                <div class="container "-->
                                    <!--                    id="delievery_location_form_3"-->
                                    <!--                    style="display: none;">-->
                                    <!--                    <div class="row row-cols-2">-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Office No <br> <input-->
                                    <!--                                class="form-control" id=""-->
                                    <!--                                type="text" name="barrier_office_no[]" value="{{ $barrier->barrier_office_no }}" placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Floor <br> <input class="form-control"-->
                                    <!--                                id="" name="barrier_floor[]"  value="{{ $barrier->barrier_floor }}" type="text"-->
                                    <!--                                placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Building <br> <input-->
                                    <!--                                class="form-control" id=""-->
                                    <!--                                type="text" name="barrier_building[]" value="{{ $barrier->barrier_building }}" placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Block <br> <input class="form-control"-->
                                    <!--                                id="" name="barrier_block[]"  value="{{ $barrier->barrier_block }}" type="text"-->
                                    <!--                                placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Area <br> <input class="form-control"-->
                                    <!--                                id="" name="barrier_area[]" value="{{ $barrier->barrier_area }}" type="text"-->
                                    <!--                                placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            City <br> <input class="form-control"-->
                                    <!--                                id="" name="barrier_city[]" value="{{ $barrier->barrier_city }}" type="text"-->
                                    <!--                                placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Photograph of Building <br> <input-->
                                    <!--                                class="form-control" id=""-->
                                    <!--                                type="file" name="barrier_photo_building[]" value="{{ $barrier->barrier_photo_building }}" placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Pin location <br> <input-->
                                    <!--                                class="form-control" id=""-->
                                    <!--                                type="text" name="barrier_pin_loc[]" value="{{ $barrier->barrier_pin_loc }}" placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6 mt-2 ml-3 ">-->
                                    <!--                    <input class="form-check-input" name="barrier_ins_loc[]" type="checkbox"-->
                                    <!--                        id="installation_location_check_3">-->
                                    <!--                    <label class="form-check-label"-->
                                    <!--                        for="check">Installation Location-->
                                    <!--                    </label>-->
                                    <!--                </div>-->
                                    <!--                <div class="container "-->
                                    <!--                    id="installation_location_form_3"-->
                                    <!--                    style="display: none;">-->
                                    <!--                    <div class="row row-cols-2">-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Office No <br> <input-->
                                    <!--                                class="form-control" id=""-->
                                    <!--                                type="text" name="barrier_ins_office[]" value="{{ $barrier->barrier_ins_office }}" placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Floor <br> <input class="form-control"-->
                                    <!--                                id=""  name="barrier_ins_floor[]" value="{{ $barrier->barrier_ins_floor }}" type="text"-->
                                    <!--                                placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Building <br> <input-->
                                    <!--                                class="form-control" id=""-->
                                    <!--                                type="text"  name="barrier_ins_building[]" value="{{ $barrier->barrier_ins_building }}" placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Block <br> <input class="form-control"-->
                                    <!--                                id=""  name="barrier_ins_block[]" value="{{ $barrier->barrier_ins_block }}"  type="text"-->
                                    <!--                                placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Area <br> <input class="form-control"-->
                                    <!--                                id=""  name="barrier_ins_area[]" value="{{ $barrier->barrier_ins_area }}"  type="text"-->
                                    <!--                                placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            City <br> <input class="form-control"-->
                                    <!--                                id=""  name="barrier_ins_city[]" value="{{ $barrier->barrier_ins_city }}" type="text"-->
                                    <!--                                placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Photograph of Building <br> <input-->
                                    <!--                                class="form-control" id=""-->
                                    <!--                                type="file"  name="barrier_ins_photo_building[]" value="{{ $barrier->barrier_ins_photo_building }}" placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-6 mt-1">-->
                                    <!--                            Pin location <br> <input-->
                                    <!--                                class="form-control" id=""-->
                                    <!--                                type="text"  name="barrier_ins_pin_loc[]" value="{{ $barrier->barrier_ins_pin_loc }}" placeholder="..."-->
                                    <!--                                style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->

                                    <!--            <div class="row mb-2">-->
                                    <!--                <div class="col-lg-6 mt-2">-->
                                    <!--                    Attachements <br> <input class="form-control" type="file"  name="barrier_attachments[]"  value="{{ $barrier->barrier_attachments }}" placeholder="..." style="width: 100%;" multiple>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-6">-->
                                    <!--                    Notes <br>-->
                                    <!--                    <textarea id="w3review10" onclick="moveCursorToStart10()" name="barrier_notes[]" oninput="trimSpaces10()" class="form-control"  rows="2" cols="38">{{ $barrier->barrier_notes }}-->
                                    <!--                    </textarea>-->
                                    <!--                </div>-->
                                    <!--            </div>-->

                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            @endforeach
                        @else
                            <p>No Barrier details found.</p>
                        @endif
                    </div>




                </div>

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion9_1">
                        @if($requirements->requirementattendance && $requirements->requirementattendance->isNotEmpty())
                            @foreach ($requirements->requirementattendance as $index => $attendance)
                                <!-- Initial Accordion Item -->
                                <div class="accordion-item signaccordion-item9_1"
                                    id="signatoryEntry9_1{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading9_1{{ $index + 1 }}"
                                        style="color: white">
                                        <button class="accordion-button"
                                            style="background-color: #34005A; color:white"
                                            type="button" data-toggle="collapse"
                                            data-target="#signatoryCollapse9_1{{ $index + 1 }}"
                                            aria-expanded="false"
                                            aria-controls="signatoryCollapse9_1{{ $index + 1 }}">
                                            Attendence Machine Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <!--<div id="signatoryCollapse9_1{{ $index + 1 }}" class="collapse"-->
                                    <!--    aria-labelledby="signatoryHeading9_1{{ $index + 1 }}">-->
                                    <!--    <div class="accordion-body">-->
                                    <!--        <div class="row mb-2" id="signatoryDetailsContainer9_1">-->
                                                <!-- Your content for entry goes here -->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Category <br> <input class="form-control"-->
                                    <!--                    type="text" name="attendance_category[]" placeholder="..."-->
                                    <!--                    value="{{ $attendance->attendance_category }}"-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Rate per Unit <br> <input class="form-control"-->
                                    <!--                    type="text" name="attendance_rate[]" placeholder="..."-->
                                    <!--                    value="{{ $attendance->attendance_rate }}" style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Specifications Sheet: <br> <input class="form-control"-->
                                    <!--                    type="file" name="attendance_sheet[]" placeholder="..."-->
                                    <!--                    value="{{ $attendance->attendance_sheet }}" style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Specifications: <br> <textarea class="form-control"-->
                                    <!--                    type="file" name="attendance_specifications[]" placeholder="..."-->
                                    <!--                    value="{{ $attendance->attendance_specifications }}" style="width: 100%;"></textarea>-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Notes : <br> <textarea class="form-control"-->
                                    <!--                    type="file" name="attendance_notes[]" placeholder="..."-->
                                    <!--                    style="width: 100%;">{{ $attendance->attendance_notes }}</textarea>-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Attachment : <br> <input class="form-control"-->
                                    <!--                    type="file" name="attendance_attachment[]" placeholder="..."-->
                                    <!--                    value="{{ $attendance->attendance_attachment }}"   style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            @endforeach
                        @else
                            <p>No Attendance details found.</p>
                        @endif
                    </div>


                </div>

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion9_2">
                        <!-- Initial Accordion Item -->
                        @if($requirements->requirementweb && $requirements->requirementweb->isNotEmpty())
                            @foreach ($requirements->requirementweb as $index => $web)
                                <div class="accordion-item signaccordion-item9_2"
                                    id="signatoryEntry9_2{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading9_2{{ $index + 1 }}"
                                        style="color: white">
                                        <button class="accordion-button"
                                            style="background-color: #34005A; color:white"
                                            type="button" data-toggle="collapse"
                                            data-target="#signatoryCollapse9_2{{ $index + 1 }}"
                                            aria-expanded="false"
                                            aria-controls="signatoryCollapse9_2{{ $index + 1 }}">
                                            Web Surveillance Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <!--<div id="signatoryCollapse9_2{{ $index + 1 }}" class="collapse"-->
                                    <!--    aria-labelledby="signatoryHeading9_2{{ $index + 1 }}">-->
                                    <!--    <div class="accordion-body">-->
                                    <!--        <div class="row mb-2" id="signatoryDetailsContainer9_2">-->
                                                <!-- Your content for entry goes here -->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Category <br> <input class="form-control"-->
                                    <!--                    type="text" name="web_category[]" value="{{ $web->web_category }}" placeholder="..."-->

                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Scope of Work <br> <input class="form-control"-->
                                    <!--                    type="file" name="web_scope[]" value="{{ $web->web_scope }}"  placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Internal Deadline:<br> <input-->
                                    <!--                    class="form-control" name="web_date[]" value="{{ $web->web_date }}"  type="date"-->
                                    <!--                    placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Date of Submission of Report:<br> <input-->
                                    <!--                    class="form-control" name="web_sub_date[]" value="{{ $web->web_sub_date }}"  type="date"-->
                                    <!--                    placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Notes <br> <textarea class="form-control mt-1"-->
                                    <!--                    id="head_office_name" name="web_notes[]"-->
                                    <!--                    type="text" placeholder="..."-->
                                    <!--                    style="width: 100%;">{{ $web->web_notes }}</textarea>-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Attachments:<br> <input-->
                                    <!--                    class="form-control" value="{{ $web->web_attachments }}"  name="web_attachments[]" type="file"-->
                                    <!--                    placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            @endforeach
                        @else
                            <p>No Web Survillence details found.</p>
                        @endif
                    </div>

                </div>

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion9">
                        <!-- Initial Accordion Item -->
                        @if($requirements->requirementcctv && $requirements->requirementcctv->isNotEmpty())
                            @foreach ($requirements->requirementcctv as $index => $cctv)
                                <div class="accordion-item signaccordion-item9"
                                    id="signatoryEntry9{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading9{{ $index + 1 }}"
                                        style="color: white">
                                        <button class="accordion-button"
                                            style="background-color: #34005A; color:white"
                                            type="button" data-toggle="collapse"
                                            data-target="#signatoryCollapse9{{ $index + 1 }}" aria-expanded="false"
                                            aria-controls="signatoryCollapse9{{ $index + 1 }}">
                                            CCTV Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <!--<div id="signatoryCollapse9{{ $index + 1 }}" class="collapse"-->
                                    <!--    aria-labelledby="signatoryHeading9{{ $index + 1 }}">-->
                                    <!--    <div class="accordion-body">-->
                                    <!--        <div class="row mb-2" id="signatoryDetailsContainer9">-->
                                                <!-- Your content for entry goes here -->
                                    <!--            <div class="col-lg-6 form-group spacing-left">-->
                                    <!--                Category:<br> <input class="form-control"-->
                                    <!--                type="text" value="{{ $cctv->cctv_category }}" placeholder="..." name="cctv_category[]"-->
                                    <!--                style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 form-group spacing-left">-->
                                    <!--                CCTV Brand:<br> <input class="form-control"-->
                                    <!--                type="text" value="{{ $cctv->cctv_brand }}" placeholder="..." name="cctv_brand[]"-->
                                    <!--                style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 form-group spacing-left">-->
                                    <!--                Model :<br> <input class="form-control"-->
                                    <!--                type="text" value="{{ $cctv->cctv_model }}" placeholder="..." name="cctv_model[]"-->
                                    <!--                style="width: 100%;">-->

                                    <!--            </div>-->

                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Year of Manufacturing <br> <input class="form-control"-->
                                    <!--                    type="text" value="{{ $cctv->cctv_year_of_manu }}" placeholder="..." name="cctv_year_of_manu[]"-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->

                                    <!--            <div class="col-lg-6 form-group spacing-left">-->
                                    <!--                Pixels :<br> <input class="form-control"-->
                                    <!--                type="text" value="{{ $cctv->cctv_pixels }}" placeholder="..." name="cctv_pixels[]"-->
                                    <!--                style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1 spacing-right">-->
                                    <!--                Night Vision : <br> <input class="form-control"-->
                                    <!--                type="text" value="{{ $cctv->cctv_night_vision }}" placeholder="..." name="cctv_night_vision[]"-->
                                    <!--                style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 form-group spacing-left">-->
                                    <!--                CCTV Type :<br> <input class="form-control"-->
                                    <!--                type="text" value="{{ $cctv->cctv_type }}" placeholder="..." name="cctv_type[]"-->
                                    <!--                style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 form-group spacing-left">-->
                                    <!--                Backup Storage :<br> <input class="form-control"-->
                                    <!--                type="text" value="{{ $cctv->cctv_backup }}" placeholder="..." name="cctv_backup[]"-->
                                    <!--                style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 form-group spacing-left">-->
                                    <!--                NVR :<br> <input class="form-control"-->
                                    <!--                type="text" value="{{ $cctv->cctv_nvr }}" placeholder="..." name="cctv_nvr[]"-->
                                    <!--                style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1 spacing-right">-->
                                    <!--                Power Cable : <br> <input class="form-control"-->
                                    <!--                type="text" value="{{ $cctv->cctv_powercable }}" placeholder="..." name="cctv_powercable[]"-->
                                    <!--                style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 form-group spacing-left">-->
                                    <!--                POE Switch :<br> <input class="form-control"-->
                                    <!--                type="text" value="{{ $cctv->cctv_poe }}" placeholder="..." name="cctv_poe[]"-->
                                    <!--                style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Quantity <br> <input class="form-control"-->
                                    <!--                    type="text" value="{{ $cctv->cctv_quantity }}" placeholder="..." name="cctv_quantity[]"-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                Monthly Maintenance Cost <br> <input-->
                                    <!--                    class="form-control" value="{{ $cctv->cctv_monthly_cost }}" type="text" name="cctv_monthly_cost[]"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1 spacing-right">-->
                                    <!--                Required on : <br> <input class="form-control"-->
                                    <!--                type="text" value="{{ $cctv->cctv_req_on }}" placeholder="..." name="cctv_req_on[]"-->
                                    <!--                style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-1">-->
                                    <!--                No of days Equipment Required for <br> <input-->
                                    <!--                    class="form-control" type="text" value="{{ $cctv->cctv_no_of_days }}" name="cctv_no_of_days[]"-->
                                    <!--                    placeholder="..." style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-2 ml-3 ">-->
                                    <!--                <input class="form-check-input" name="cctv_del_loc[]" type="checkbox"-->
                                    <!--                    id="delievery_location_check_2">-->
                                    <!--                <label class="form-check-label"-->
                                    <!--                    for="check">Delievery Location-->
                                    <!--                </label>-->
                                    <!--            </div>-->
                                    <!--            <div class="container "-->
                                    <!--                id="delievery_location_form_2"-->
                                    <!--                style="display: none;">-->
                                    <!--                <div class="row row-cols-2">-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Office No <br> <input-->
                                    <!--                            class="form-control" id="" value="{{ $cctv->cctv_del_office }}" name="cctv_del_office[]"-->
                                    <!--                            type="text" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Floor <br> <input class="form-control"-->
                                    <!--                            id=""  type="text" value="{{ $cctv->cctv_del_floor }}" name="cctv_del_floor[]"-->
                                    <!--                            placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Building <br> <input-->
                                    <!--                            class="form-control" id="" value="{{ $cctv->cctv_del_building }}" name="cctv_del_building[]"-->
                                    <!--                            type="text" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Block <br> <input class="form-control"-->
                                    <!--                            id=""  type="text" value="{{ $cctv->cctv_del_block }}" name="cctv_del_block[]"-->
                                    <!--                            placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Area <br> <input class="form-control"-->
                                    <!--                            id=""  type="text" value="{{ $cctv->cctv_del_area }}" name="cctv_del_area[]"-->
                                    <!--                            placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        City <br> <input class="form-control"-->
                                    <!--                            id=""  type="text" value="{{ $cctv->cctv_del_city }}" name="cctv_del_city[]"-->
                                    <!--                            placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Photograph of Building <br> <input-->
                                    <!--                            class="form-control" value="{{ $cctv->cctv_del_photo_building }}" id="" name="cctv_del_photo_building[]"-->
                                    <!--                            type="file" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Pin location <br> <input-->
                                    <!--                            class="form-control" value="{{ $cctv->cctv_del_pin_loc }}" id="" name="cctv_del_pin_loc[]"-->
                                    <!--                            type="text" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 mt-2 ml-3 ">-->
                                    <!--                <input class="form-check-input" name="cctv_ins_loc[]" type="checkbox"-->
                                    <!--                    id="installation_location_check_2">-->
                                    <!--                <label class="form-check-label"-->
                                    <!--                    for="check">Installation Location-->
                                    <!--                </label>-->
                                    <!--            </div>-->
                                    <!--            <div class="container "-->
                                    <!--                id="installation_location_form_2"-->
                                    <!--                style="display: none;">-->
                                    <!--                <div class="row row-cols-2">-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Office No <br> <input-->
                                    <!--                            class="form-control" name="cctv_ins_office[]"  id=""-->
                                    <!--                            type="text" value="{{ $cctv->cctv_ins_office }}" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Floor <br> <input class="form-control"-->
                                    <!--                            id="" value="{{ $cctv->cctv_ins_floor }}"  type="text" name="cctv_ins_floor[]"-->
                                    <!--                            placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Building <br> <input-->
                                    <!--                            class="form-control" id=""-->
                                    <!--                            type="text" value="{{ $cctv->cctv_ins_building }}" placeholder="..." name="cctv_ins_building[]"-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Block <br> <input class="form-control" name="cctv_ins_block[]"-->
                                    <!--                            id="" value="{{ $cctv->cctv_ins_block }}" type="text"-->
                                    <!--                            placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Area <br> <input class="form-control" name="cctv_ins_area[]"-->
                                    <!--                            id="" value="{{ $cctv->cctv_ins_area }}" type="text"-->
                                    <!--                            placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        City <br> <input class="form-control"-->
                                    <!--                            id="" value="{{ $cctv->cctv_ins_city }}"  type="text" name="cctv_ins_city[]"-->
                                    <!--                            placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Photograph of Building <br> <input-->
                                    <!--                            class="form-control" id="" name="cctv_ins_photo_building[]"-->
                                    <!--                            type="file" value="{{ $cctv->cctv_ins_photo_building }}" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="col-lg-6 mt-1">-->
                                    <!--                        Pin location <br> <input-->
                                    <!--                            class="form-control" id="" name="cctv_ins_pin_loc[]"-->
                                    <!--                            type="text" value="{{ $cctv->cctv_ins_pin_loc }}" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 spacing-right">-->
                                    <!--                Maintenance Required : <br>  <input-->
                                    <!--                class="form-control" id="" name="cctv_maintenance_req[]"-->
                                    <!--                type="text" value="{{ $cctv->cctv_maintenance_req }}" placeholder="..."-->
                                    <!--                style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6 spacing-right">-->
                                    <!--                Maintenance Required : <br>  <input-->
                                    <!--                class="form-control" id="" name="cctv_maintenance_req_basis[]"-->
                                    <!--                type="text" value="{{ $cctv->cctv_maintenance_req_basis }}" placeholder="..."-->
                                    <!--                style="width: 100%;">-->

                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6">-->
                                    <!--                Notes <br> <textarea class="form-control mt-1"-->
                                    <!--                    id="head_office_name" name="cctv_notes[]"-->
                                    <!--                    type="text" placeholder="..."-->
                                    <!--                    style="width: 100%;">{{ $cctv->cctv_notes }}</textarea>-->
                                    <!--            </div>-->
                                    <!--            <div class="col-lg-6">-->
                                    <!--                Attachments <br> <input-->
                                    <!--                    class="form-control mt-1"-->
                                    <!--                    id="head_office_email" value="{{ $cctv->cctv_attachments }}" name="cctv_attachments[]"-->
                                    <!--                    type="file" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            @endforeach
                        @else
                            <p>No CCTV details found.</p>
                        @endif
                    </div>


                </div>

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion17" style="width:100%;">
                        <!-- Initial Accordion Item -->
                        @if($requirements->requirementalarm && $requirements->requirementalarm->isNotEmpty())
                            @foreach ($requirements->requirementalarm as $index => $alarm)
                                <div class="accordion-item signaccordion-item17" id="signatoryEntry17{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading17{{ $index + 1 }}"
                                        style="color: white">
                                        <button class="accordion-button"
                                            style="background-color: #34005A; color:white" type="button"
                                            data-toggle="collapse" data-target="#signatoryCollapse17{{ $index + 1 }}"
                                            aria-expanded="false" aria-controls="signatoryCollapse17{{ $index + 1 }}">
                                            Alarm Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <!--<div id="signatoryCollapse17{{ $index + 1 }}" class="collapse"-->
                                    <!--    aria-labelledby="signatoryHeading17{{ $index + 1 }}">-->
                                    <!--    <div class="accordion-body">-->
                                    <!--        <div class="row mb-2" id="signatoryDetailsContainer17">-->
                                    <!--            <div class="row mb-2">-->
                                    <!--                <div class="col-lg-3 spacing-right">-->
                                    <!--                    Categories : <br>  <input class="form-control"-->
                                    <!--                    type="text" value="{{ $alarm->alarm_category }}" name="alarm_category[]" placeholder="..."-->
                                    <!--                    style="width: 100%;">-->

                                    <!--                </div>-->
                                    <!--                <div class="col-lg-3 spacing-right">-->
                                    <!--                    Equipment Name:  : <br>-->
                                    <!--                    <input class="form-control"-->
                                    <!--                        type="text" value="{{ $alarm->alarm_equipment }}" name="alarm_equipment[]" placeholder="..."-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-3 mt-1">-->
                                    <!--                    Voltage (if any):  <br> <input class="form-control"-->
                                    <!--                        type="text" value="{{ $alarm->alarm_voltage }}" name="alarm_voltage[]"  placeholder="..."-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-3 mt-1">-->
                                    <!--                    Ampere (if any):   <br>-->
                                    <!--                    <input class="form-control" value="{{ $alarm->alarm_ampere }}" name="alarm_ampere[]" type="text" placeholder="..."-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-3 mt-1 spacing-right">-->
                                    <!--                    Article No  <br>-->
                                    <!--                    <input class="form-control" value="{{ $alarm->alarm_article_no }}" name="alarm_article_no[]"  type="text" placeholder="..."-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-3 spacing-right">-->
                                    <!--                    Model : <br>-->
                                    <!--                    <input class="form-control" value="{{ $alarm->alarm_model }}" name="alarm_model[]"  type="text" placeholder="..."-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-3 spacing-right">-->
                                    <!--                    Year of Manufacturing : <br>-->
                                    <!--                    <input class="form-control"-->
                                    <!--                        type="text" name="alarm_year[]" value="{{ $alarm->alarm_year }}" placeholder="..."-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <div class="col-lg-3 spacing-right">-->
                                    <!--                    Expiry Date:  : <br>-->
                                    <!--                    <input class="form-control" value="{{ $alarm->alarm_expiry }}" name="alarm_expiry[]" type="text" placeholder="..."-->
                                    <!--                        style="width: 100%;">-->
                                    <!--                </div>-->
                                    <!--                <p>"Your Passive Fire Fighting Cylinder is going to expire on "</p>-->
                                    <!--                <div class="container " id="">-->
                                    <!--                    <div class="row row-cols-2">-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Warranty Period <br> <input class="form-control" id=""-->
                                    <!--                                type="text" value="{{ $alarm->alarm_warranty }}" name="alarm_warranty[]" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Color <br> <input class="form-control" id="" type="text"-->
                                    <!--                                placeholder="..." value="{{ $alarm->alarm_color }}" name="alarm_color[]" style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Quantity <br> <input class="form-control" id=""-->
                                    <!--                                type="text" value="{{ $alarm->alarm_quantity }}" name="alarm_quantity[]" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Scope of Work <br> <input class="form-control" id=""-->
                                    <!--                                type="file" value="{{ $alarm->alarm_scope }}" name="alarm_scope[]" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Any Special Instructions <br> <textarea class="form-control mt-1"-->
                                    <!--                            id="head_office_name" name="alarm_ins[]"-->
                                    <!--                            type="text"  placeholder="..."-->
                                    <!--                            style="width: 100%;">{{ $alarm->alarm_ins }}</textarea>-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Drawings of Building/Premises:  <br> <input class="form-control" id=""-->
                                    <!--                                type="file" value="{{ $alarm->alarm_drawings }}" name="alarm_drawings[]" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Picture of Building/Premises:  <br> <input class="form-control" id=""-->
                                    <!--                                type="file" value="{{ $alarm->alarm_pictures }}" name="alarm_pictures[]" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Complete Equipment Cost:  <br> <input class="form-control" id=""-->
                                    <!--                                type="text" value="{{ $alarm->alarm_cost }}" name="alarm_cost[]" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Delivery charges:  <br> <input class="form-control" id=""-->
                                    <!--                                type="text" value="{{ $alarm->alarm_charges }}" name="alarm_charges[]" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Installation Cost: <br> <input class="form-control" id=""-->
                                    <!--                                type="text" value="{{ $alarm->alarm_ins_cost }}" name="alarm_ins_cost[]" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->

                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->

                                    <!--                        </div>-->
                                    <!--                        <h3 class="mt-2">Dimensions (if any) :</h3>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->

                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->

                                    <!--                        </div>-->
                                    <!--                        <br>-->

                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Length (if any):  <br> <input class="form-control" id=""-->
                                    <!--                                type="text" value="{{ $alarm->alarm_length }}" name="alarm_length[]" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Width (if any):  <br> <input class="form-control" id=""  type="text"-->
                                    <!--                                placeholder="..." value="{{ $alarm->alarm_width }}" name="alarm_width[]" style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Height (if any):  <br> <input class="form-control" id=""-->
                                    <!--                                type="text" value="{{ $alarm->alarm_height }}" name="alarm_height[]" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Thickness (if any):  <br> <input class="form-control" id=""-->
                                    <!--                                type="text" value="{{ $alarm->alarm_thickness }}" name="alarm_thickness[]" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Diameter (if any):  <br> <input class="form-control" id=""-->
                                    <!--                                type="text" value="{{ $alarm->alarm_diameter }}" name="alarm_diameter[]" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->

                                    <!--                        <div class="col-lg-3 spacing-right">-->
                                    <!--                            Installation of smoke Detectors : <br>-->
                                    <!--                            <input class="form-control" value="{{ $alarm->alarm_ins_smoke }}" name="alarm_ins_smoke[]" id="installationCharges"  type="text" placeholder="..." style="width: 100%;">-->

                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1" id="installationChargesField" style="display: none;">-->
                                    <!--                            Installation charges of Smoke Detectors:<br>-->
                                    <!--                            <input class="form-control" value="{{ $alarm->alarm_ins_cost_smoke }}" name="alarm_ins_cost_smoke[]" id="installationCharges"  type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->

                                    <!--                        <div class="col-lg-3 spacing-right">-->
                                    <!--                            Internal Shifting of Panel/Devices: <br>-->
                                    <!--                            <input class="form-control" value="{{ $alarm->alarm_internal_shifting }}" name="alarm_internal_shifting[]" id="installationCharges"  type="text" placeholder="..." style="width: 100%;">-->

                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1" id="internalShiftingChargesField" style="display: none;">-->
                                    <!--                            Internal Shifting Charges of Panel/Devices: <br>-->
                                    <!--                            <input class="form-control" value="{{ $alarm->alarm_internal_shifting_charges }}" name="alarm_internal_shifting_charges[]" id="internalShiftingCharges" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->

                                    <!--                        <div class="col-lg-3 spacing-right">-->
                                    <!--                            Reinstallation of Complete Alarm System: <br>-->
                                    <!--                            <input class="form-control" value="{{ $alarm->alarm_reinstall }}" name="alarm_reinstall[]" id="installationCharges"  type="text" placeholder="..." style="width: 100%;">-->

                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1" id="reinstallationChargesField" style="display: none;">-->
                                    <!--                            Reinstallation Charges of Complete Alarm System: <br>-->
                                    <!--                            <input class="form-control" value="{{ $alarm->alarm_reinstall_charges }}" name="alarm_reinstall_charges[]" id="reinstallationCharges" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->

                                    <!--                        <div class="col-lg-3 spacing-right">-->
                                    <!--                            QRF Monitoring Required: <br>-->
                                    <!--                            <input class="form-control" value="{{ $alarm->alarm_qrf }}" name="alarm_qrf[]" id="installationCharges"  type="text" placeholder="..." style="width: 100%;">-->

                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1" id="qrfMonitoringChargesField" style="display: none;">-->
                                    <!--                            Monthly QRF Monitoring Charges: <br>-->
                                    <!--                            <input class="form-control" value="{{ $alarm->alarm_qrf_monthly_charges }}" name="alarm_qrf_monthly_charges[]" id="monthlyQrfMonitoringCharges" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                            Yearly QRF Monitoring Charges: <br>-->
                                    <!--                            <input class="form-control" value="{{ $alarm->alarm_qrf_yearly_charges }}" name="alarm_qrf_yearly_charges[]" id="yearlyQrfMonitoringCharges" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->

                                    <!--                        <div class="col-lg-3 spacing-right">-->
                                    <!--                            Police Monitoring Required: <br>-->
                                    <!--                            <input class="form-control" value="{{ $alarm->alarm_police_req }}" name="alarm_police_req[]" id="installationCharges"  type="text" placeholder="..." style="width: 100%;">-->

                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1" id="policeMonitoringChargesField" style="display: none;">-->
                                    <!--                            Monthly Police Monitoring Charges: <br>-->
                                    <!--                            <input class="form-control" value="{{ $alarm->alarm_police_monthly_charges }}" name="alarm_police_monthly_charges[]" id="monthlyPoliceMonitoringCharges" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                            Yearly Police Monitoring Charges: <br>-->
                                    <!--                            <input class="form-control" value="{{ $alarm->alarm_police_yearly_charges }}" name="alarm_police_yearly_charges[]" id="yearlyPoliceMonitoringCharges" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->

                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Visit Charges KHI/LHR/ISB/RWP :  <br> <input class="form-control" id=""-->
                                    <!--                                type="text" value="{{ $alarm->alarm_visit_charges }}" name="alarm_visit_charges[]" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Visit Charges Out City :  <br> <input class="form-control" id=""-->
                                    <!--                                type="text" value="{{ $alarm->alarm_visit_city }}" name="alarm_visit_city[]" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->

                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Notes  <br> <textarea class="form-control" id=""-->
                                    <!--                                type="text"  name="alarm_notes[]" placeholder="..." style="width: 100%;">{{ $alarm->alarm_notes }}</textarea>-->
                                    <!--                        </div>-->
                                    <!--                        <div class="col-lg-3 mt-1">-->
                                    <!--                            Attachments:  <br> <input class="form-control" id="" name=""-->
                                    <!--                                type="file" value="{{ $alarm->alarm_attachments }}" name="alarm_attachments[]" placeholder="..." style="width: 100%;">-->
                                    <!--                        </div>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            @endforeach
                        @else
                            <p>No Alarm Details details found.</p>
                        @endif
                    </div>

                </div>

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion12">
                        @if($requirements->complainesshownwht && $requirements->complainesshownwht->isNotEmpty())
                            @foreach ($requirements->complainesshownwht as $index => $shownwht)
                                <div class="accordion-item signaccordion-item12" id="signatoryEntry12{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading12{{ $index + 1 }}" style="color: white">
                                        <button class="accordion-button" style="background-color: #34005A; color:white"
                                            type="button" data-toggle="collapse" data-target="#signatoryCollapse12{{ $index + 1 }}"
                                            aria-expanded="false" aria-controls="signatoryCollapse12{{ $index + 1 }}">
                                            With Complaines- Shown WHT Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <!--<div id="signatoryCollapse12{{ $index + 1 }}" class="collapse" aria-labelledby="signatoryHeading12{{ $index + 1 }}">-->
                                    <!--    <div class="accordion-body">-->
                                            <!-- Your content for entry goes here -->
                                    <!--        <div class="row mb-2" id="signatoryDetailsContainer12">-->
                                    <!--            <div class="col-12 d-flex">-->
                                    <!--                <div class="col-md-4">-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        Category : <br> <input class="form-control" value="{{ $shownwht->wc_sw_category }}" name="wc_sw_category[]" type="text"-->
                                    <!--                        placeholder="..." style="width: 100%;">-->

                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Social Security:</label>-->
                                    <!--                        <input class="form-control"  value="{{ $shownwht->wc_sw_social_check }}" name="wc_sw_social_check[]" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Weapon & Ammunition-->
                                    <!--                            Cost:</label>-->
                                    <!--                        <input class="form-control"  value="{{ $shownwht->wc_sw_weapon }}" name="wc_sw_weapon[]" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Monthly Rate Per-->
                                    <!--                            Unit:</label>-->
                                    <!--                        <input class="form-control monthly_Rate_Per_UnitFieldc1"-->
                                    <!--                        name="wc_sw_monthly_rate[]"  value="{{ $shownwht->wc_sw_monthly_rate }}" type="text" placeholder="..."-->
                                    <!--                            style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Total Monthly Rate per-->
                                    <!--                            Unit:</label>-->
                                    <!--                        <input class="form-control totalMonthlyRatePerUnitFieldc1"-->
                                    <!--                        name="wc_sw_total_monthly_rate[]"  value="{{ $shownwht->wc_sw_total_monthly_rate }}" type="text" placeholder="..."-->
                                    <!--                            style="width: 100%;" readONly>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-md-4">-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label"  for="">Salary:</label>-->
                                    <!--                        <input class="form-control"  value="{{ $shownwht->wc_sw_salary }}" id="salary" name="wc_sw_salary[]" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Group/ Life-->
                                    <!--                            insurance:</label>-->
                                    <!--                        <input class="form-control"  value="{{ $shownwht->wc_sw_group }}"  name="wc_sw_group[]" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Training Cost:</label>-->
                                    <!--                        <input class="form-control"  value="{{ $shownwht->wc_sw_training_cost }}" name="wc_sw_training_cost[]" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Applicable GST-->
                                    <!--                            Percentage:</label>-->
                                    <!--                        <input class="form-control"  value="{{ $shownwht->wc_sw_app_gst }}" name="wc_sw_app_gst[]" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">GST:</label>-->
                                    <!--                        <input class="form-control gstFieldc1"  value="{{ $shownwht->wc_sw_monthly_gst }}" name="wc_sw_monthly_gst[]" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->

                                    <!--                <div class="col-md-4">-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Reliever Allowance:</label>-->
                                    <!--                        <input class="form-control "-->
                                    <!--                        name="wc_sw_rel_allowance[]"  value="{{ $shownwht->wc_sw_rel_allowance }}" id="relieverAllowance" type="text" placeholder="..."-->
                                    <!--                            style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">EOBI:</label>-->
                                    <!--                        <input class="form-control"  value="{{ $shownwht->wc_sw_eobi }}" name="wc_sw_eobi[]" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Uniform Cost:</label>-->
                                    <!--                        <input class="form-control"  value="{{ $shownwht->wc_sw_uni_cost }}" name="wc_sw_uni_cost[]" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                                        <!-- <div class="mb-3">
                                    <!--                        <label class="form-check-label" for="">Hidden Admin Cost:</label>-->
                                    <!--                        <input class="form-control" id="hiddenAdminCostField"-->
                                    <!--                            name="hiddenAdminCost" type="text" placeholder="..."-->
                                    <!--                            style="width: 100%;">-->
                                    <!--                    </div> -->-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Applicable WHT-->
                                    <!--                            Percentage:</label>-->
                                    <!--                        <input class="form-control"  value="{{ $shownwht->wc_sw_app_wht }}" name="wc_sw_app_wht[]" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">WHT:</label>-->
                                    <!--                        <input class="form-control whtFieldc1"  value="{{ $shownwht->wc_sw_wht }}" name="wc_sw_wht[]" type="text"-->
                                    <!--                            placeholder="..." style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Admin Cost:</label>-->
                                    <!--                        <input class="form-control"  value="{{ $shownwht->wc_sw_admin_cost }}" id="adminCostField" name="wc_sw_admin_cost[]"-->
                                    <!--                            type="text" placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                                        <!-- <div class="mb-3">
                                    <!--                        <label class="form-check-label" for="">Total Admin Cost:</label>-->
                                    <!--                        <input class="form-control" id="totalAdminCostField"-->
                                    <!--                            name="totalAdminCost" type="text" placeholder="..."-->
                                    <!--                            style="width: 100%;" readOnly>-->
                                    <!--                    </div> -->-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            @endforeach
                        @else
                            <p>No Complaines details found.</p>
                        @endif
                    </div>
                    <!-- Add More and Remove Buttons -->

                </div>

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion11">
                        @if($requirements->complaineshiddenwht && $requirements->complaineshiddenwht->isNotEmpty())
                            @foreach ($requirements->complaineshiddenwht as $index => $hiddenwht)
                                <div class="accordion-item signaccordion-item11" id="signatoryEntry11{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading11{{ $index + 1 }}" style="color: white">
                                        <button class="accordion-button" style="background-color: #34005A; color:white"
                                            type="button" data-toggle="collapse" data-target="#signatoryCollapse11{{ $index + 1 }}"
                                            aria-expanded="false" aria-controls="signatoryCollapse11{{ $index + 1 }}">
                                            With Complaines- Hidden WHT Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <!--<div id="signatoryCollapse11{{ $index + 1 }}" class="collapse" aria-labelledby="signatoryHeading11{{ $index + 1 }}">-->
                                    <!--    <div class="accordion-body">-->
                                            <!-- Your content for entry goes here -->
                                    <!--        <div class="row mb-2" id="signatoryDetailsContainer11">-->
                                    <!--            <div class="col-12 d-flex">-->
                                    <!--                <div class="col-md-4">-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        Category : <br>  <input class="form-control" name="wc_hw_category[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_category }}" placeholder="..." style="width: 100%;">-->

                                    <!--                    </div>-->

                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Social Security:</label>-->
                                    <!--                        <input class="form-control" name="wc_hw_social[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_social }}"    placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->

                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Weapon & Ammunition-->
                                    <!--                            Cost:</label>-->
                                    <!--                        <input class="form-control" name="wc_hw_weapon[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_weapon }}"   placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->

                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Monthly Rate Per-->
                                    <!--                            Unit:</label>-->
                                    <!--                        <input class="form-control monthly_Rate_Per_UnitFieldc"-->
                                    <!--                        name="wc_hw_monthly_rate[]" type="text" placeholder="..."-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_monthly_rate }}"  style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->

                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Total Monthly Rate per-->
                                    <!--                            Unit:</label>-->
                                    <!--                        <input class="form-control totalMonthlyRatePerUnitFieldc"-->
                                    <!--                        name="wc_hw_total_monthly_rate[]" type="text" placeholder="..."-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_total_monthly_rate }}"  style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">WHT:</label>-->
                                    <!--                        <input class="form-control whtFieldc" name="wc_hw_wht[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_wht }}"    placeholder="..." style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-md-4">-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Salary:</label>-->
                                    <!--                        <input class="form-control" id="hidesalary" name="wc_hw_salary[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_salary }}"  placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->

                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Group/ Life-->
                                    <!--                            insurance:</label>-->
                                    <!--                        <input class="form-control" name="wc_hw_group[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_group }}"   placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->

                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Training Cost:</label>-->
                                    <!--                        <input class="form-control" name="wc_hw_training_cost[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_training_cost }}" placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->

                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Applicable GST-->
                                    <!--                            Percentage:</label>-->
                                    <!--                        <input class="form-control" name="wc_hw_app_gst[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_app_gst }}"   placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->

                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">GST:</label>-->
                                    <!--                        <input class="form-control gstFieldc" name="wc_hw_gst[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_gst }}"   placeholder="..." style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->

                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Admin Cost:</label>-->
                                    <!--                        <input class="form-control adminCostFieldc" name="wc_hw_admin_cost[]"-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_admin_cost }}"   type="text" placeholder="..." style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->

                                    <!--                </div>-->

                                    <!--                <div class="col-md-4">-->

                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Reliever Allowance:</label>-->
                                    <!--                        <input class="form-control "-->
                                    <!--                        name="wc_hw_rel_allowance[]" id="hiderelieverAllowance" type="text" placeholder="..."-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_rel_allowance }}"   style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">EOBI:</label>-->
                                    <!--                        <input class="form-control" name="wc_hw_eobi[]" name="EOBI" type="text"-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_eobi }}"  placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->

                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Uniform Cost:</label>-->
                                    <!--                        <input class="form-control" name="wc_hw_uni_cost[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_uni_cost }}"   placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->

                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Hidden Admin Cost:</label>-->
                                    <!--                        <input class="form-control" id="hiddenAdminCostField"-->
                                    <!--                        name="wc_hw_hidden_admin_cost[]" type="text" placeholder="..."-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_hidden_admin_cost }}"  style="width: 100%;">-->
                                    <!--                    </div>-->

                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Applicable WHT-->
                                    <!--                            Percentage:</label>-->
                                    <!--                        <input class="form-control" name="wc_hw_app_wht_per[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->wc_hw_app_wht_per }}"   placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->

                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Total Admin Cost:</label>-->
                                    <!--                        <input class="form-control totalAdminCostFieldc"-->
                                    <!--                            name="wc_hw_total_admin_cost[]" type="text" placeholder="..."-->
                                    <!--                            value="{{ $hiddenwht->wc_hw_total_admin_cost }}"  style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->

                                    <!--                </div>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            @endforeach
                        @else
                            <p>No Hidden Compaines details found.</p>
                        @endif
                    </div>
                    <!-- Add More and Remove Buttons -->

                </div>

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion13">
                        @if($requirements->lumpsumshownwht && $requirements->lumpsumshownwht->isNotEmpty())
                            @foreach ($requirements->lumpsumshownwht as $index => $shownwht)
                                <div class="accordion-item signaccordion-item13" id="signatoryEntry13{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading13{{ $index + 1 }}" style="color: white">
                                        <button class="accordion-button" style="background-color: #34005A; color:white"
                                            type="button" data-toggle="collapse" data-target="#signatoryCollapse13{{ $index + 1 }}"
                                            aria-expanded="false" aria-controls="signatoryCollapse13{{ $index + 1 }}">
                                            Lump Sum- Shown WHT Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <!--<div id="signatoryCollapse13{{ $index + 1 }}" class="collapse" aria-labelledby="signatoryHeading13{{ $index + 1 }}">-->
                                    <!--    <div class="accordion-body">-->
                                            <!-- Your content for entry goes here -->
                                    <!--        <div class="row mb-2" id="signatoryDetailsContainer13">-->
                                    <!--            <div class="col-12 d-flex">-->
                                    <!--                <div class="col-md-4">-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        Category : <br><input class="form-control" name="ls_sw_category[]" type="text"-->
                                    <!--                        value="{{ $shownwht->ls_sw_category }}" placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Social Security:</label>-->
                                    <!--                        <input class="form-control" name="ls_sw_social[]" type="text"-->
                                    <!--                        value="{{ $shownwht->ls_sw_social }}"  placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Weapon & Ammunition-->
                                    <!--                            Cost:</label>-->
                                    <!--                        <input class="form-control" name="ls_sw_weapon_cost[]" type="text"-->
                                    <!--                        value="{{ $shownwht->ls_sw_weapon_cost }}"  placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Monthly Rate Per-->
                                    <!--                            Unit:</label>-->
                                    <!--                        <input class="form-control monthly_Rate_Per_UnitFieldc2"-->
                                    <!--                        type="text" placeholder="..." name="ls_sw_monthly_rate[]"-->
                                    <!--                        value="{{ $shownwht->ls_sw_monthly_rate }}"   style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Total Monthly Rate per-->
                                    <!--                            Unit:</label>-->
                                    <!--                        <input class="form-control totalMonthlyRatePerUnitFieldc2"-->
                                    <!--                        value="{{ $shownwht->ls_sw_total_monthly_rate }}"   type="text" placeholder="..." name="ls_sw_total_monthly_rate[]"-->
                                    <!--                            style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-md-4">-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Salary:</label>-->
                                    <!--                        <input class="form-control" type="text" name="ls_sw_salary[]"-->
                                    <!--                        value="{{ $shownwht->ls_sw_salary }}"  placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Group/ Life-->
                                    <!--                            insurance:</label>-->
                                    <!--                        <input class="form-control" name="ls_sw_group_life[]" type="text"-->
                                    <!--                        value="{{ $shownwht->ls_sw_group_life }}"   placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Training Cost:</label>-->
                                    <!--                        <input class="form-control" name="ls_sw_training_cost[]" type="text"-->
                                    <!--                        value="{{ $shownwht->ls_sw_training_cost }}"  placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Applicable GST:</label>-->
                                    <!--                        <input class="form-control" name="ls_sw_app_gst[]"  type="text"-->
                                    <!--                        value="{{ $shownwht->ls_sw_app_gst }}"   placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">GST:</label>-->
                                    <!--                        <input class="form-control gstFieldc2" name="ls_sw_gst[]" type="text"-->
                                    <!--                        value="{{ $shownwht->ls_sw_gst }}"   placeholder="..." style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-md-4">-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">EOBI:</label>-->
                                    <!--                        <input class="form-control" name="ls_sw_eobi[]"  type="text"-->
                                    <!--                        value="{{ $shownwht->ls_sw_eobi }}"  placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Uniform Cost:</label>-->
                                    <!--                        <input class="form-control"  name="ls_sw_uni_cost[]" type="text"-->
                                    <!--                        value="{{ $shownwht->ls_sw_uni_cost }}"   placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Admin Cost:</label>-->
                                    <!--                        <input class="form-control"  type="text" name="ls_sw_admin_cost[]"-->
                                    <!--                        value="{{ $shownwht->ls_sw_admin_cost }}" placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Applicable WHT:</label>-->
                                    <!--                        <input class="form-control"  type="text" name="ls_sw_app_wht[]"-->
                                    <!--                        value="{{ $shownwht->ls_sw_app_wht }}"  placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">WHT:</label>-->
                                    <!--                        <input class="form-control whtFieldc2" name="ls_sw_wht[]"  type="text"-->
                                    <!--                        value="{{ $shownwht->ls_sw_wht }}"  placeholder="..." style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            @endforeach
                        @else
                            <p>No Shown Lump Sum details found.</p>
                        @endif
                    </div>

                </div>

                <div class="container my-1">
                    <div class="accordion" id="signatoryAccordion14">
                        @if($requirements->lumpsumhiddenwht && $requirements->lumpsumhiddenwht->isNotEmpty())
                            @foreach ($requirements->lumpsumhiddenwht as $index => $hiddenwht)
                                <div class="accordion-item signaccordion-item14" id="signatoryEntry14{{ $index + 1 }}">
                                    <h2 class="accordion-header" id="signatoryHeading14{{ $index + 1 }}" style="color: white">
                                        <button class="accordion-button" style="background-color: #34005A; color:white"
                                            type="button" data-toggle="collapse" data-target="#signatoryCollapse14{{ $index + 1 }}"
                                            aria-expanded="false" aria-controls="signatoryCollapse14{{ $index + 1 }}">
                                            Lump Sum- Hidden WHT Entry {{ $index + 1 }}
                                        </button>
                                    </h2>
                                    <!--<div id="signatoryCollapse14{{ $index + 1 }}" class="collapse" aria-labelledby="signatoryHeading14{{ $index + 1 }}">-->
                                    <!--    <div class="accordion-body">-->
                                            <!-- Your content for entry goes here -->
                                    <!--        <div class="row mb-2" id="signatoryDetailsContainer14">-->
                                    <!--            <div class="col-12 d-flex">-->
                                    <!--                <div class="col-md-4">-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        Category : <br>   <input class="form-control" name="ls_hw_category[]"  type="text"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_category }}"    placeholder="..." style="width: 100%;">-->

                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Uniform Cost:</label>-->
                                    <!--                        <input class="form-control" name="ls_hw_uni_cost[]"  type="text"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_uni_cost }}"     placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Weapon & Ammunition-->
                                    <!--                            Cost:</label>-->
                                    <!--                        <input class="form-control" name="ls_hw_weapon_cost[]"  type="text"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_weapon_cost }}"  placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Monthly Rate Per-->
                                    <!--                            Unit:</label>-->
                                    <!--                        <input class="form-control monthly_Rate_Per_UnitFieldc3" name="ls_hw_monthly_rate[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_monthly_rate }}" placeholder="..."  style="width: 100%;"-->
                                    <!--                            readOnly>-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Total Monthly Rate per-->
                                    <!--                            Unit:</label>-->
                                    <!--                        <input class="form-control totalMonthlyRatePerUnitFieldc3"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_total_monthly_rate }}" type="text" placeholder="..." name="ls_hw_total_monthly_rate[]"-->
                                    <!--                            style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-md-4">-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Salary:</label>-->
                                    <!--                        <input class="form-control" name="ls_hw_salary[]"  type="text"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_salary }}"    placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Social Security:</label>-->
                                    <!--                        <input class="form-control" name="ls_hw_social[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_social }}"   placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Training Cost:</label>-->
                                    <!--                        <input class="form-control" name="ls_hw_training_cost[]"  type="text"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_training_cost }}"   placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Applicable GST-->
                                    <!--                            Percentage:</label>-->
                                    <!--                        <input class="form-control" name="ls_hw_app_gst[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_app_gst }}"    placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">GST:</label>-->
                                    <!--                        <input class="form-control gstFieldc3" name="ls_hw_gst[]"  type="text"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_gst }}"   placeholder="..." style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Admin Cost:</label>-->
                                    <!--                        <input class="form-control adminCostFieldc3"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_admin_cost }}"    type="text" placeholder="..." name="ls_hw_admin_cost[]" style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--                <div class="col-md-4">-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">EOBI:</label>-->
                                    <!--                        <input class="form-control" name="ls_hw_eobi[]"  type="text"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_eobi }}"   placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Group/ Life-->
                                    <!--                            insurance:</label>-->
                                    <!--                        <input class="form-control" name="ls_hw_group_life[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_group_life }}"   placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Hidden Admin Cost:</label>-->
                                    <!--                        <input class="form-control" name="ls_hw_hidden_admin_cost[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_hidden_admin_cost }}"   placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Applicable WHT-->
                                    <!--                            Percentage:</label>-->
                                    <!--                        <input class="form-control" name="ls_hw_app_wht_per[]"  type="text"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_category }}"    placeholder="..." style="width: 100%;">-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">WHT:</label>-->
                                    <!--                        <input class="form-control whtFieldc3" name="ls_hw_wht[]" type="text"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_wht }}"   placeholder="..." style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                    <div class="mb-3">-->
                                    <!--                        <label class="form-check-label" for="">Total Admin Cost:</label>-->
                                    <!--                        <input class="form-control totalAdminCostFieldc3" name="ls_hw_total_admin_cost[]"-->
                                    <!--                        value="{{ $hiddenwht->ls_hw_total_admin_cost }}"    type="text" placeholder="..."-->
                                    <!--                            style="width: 100%;" readOnly>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            @endforeach
                        @else
                            <p>No Hidden Lump Sum details found.</p>
                        @endif
                    </div>

                </div>

                <div id="reverse-working">
                    <h3 style="margin-left: 30px; margin-top: 10px;">Reverse Working</h3>
                    <div class="col-12 d-flex">
                        <div class="col-md-4">
                            <div class="mb-3">
                                Category : <br>  <input class="form-control" type="text" name="reverseAfterWht" placeholder="..." style="width: 100%;">
                                <select id="category" class="form-control mt-1" name="reverseCategory" style="width: 100%;">
                                    <option value=""> Select</option>
                                    <option value="Supervisor"> Supervisor</option>
                                    <option value="Guard EX">Guard EX</option>
                                    <option value="Guard C">Guard C</option>
                                    <option value="Lady Searcher">Lady Searcher</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-check-label" for="">After WHT:</label>
                                <input class="form-control" type="text" name="reverseAfterWht" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="mb-3">
                                <label class="form-check-label" for="">Salary:</label>
                                <input class="form-control" type="text" name="reverseSalary" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="mb-3">
                                <label class="form-check-label" for="">Total Profit:</label>
                                <input class="form-control" type="text" name="reverseTotalProfit" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-check-label" for="">Rate:</label>
                                <input class="form-control" type="text" name="reverseRate" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="mb-3">
                                <label class="form-check-label" for="">GST:</label>
                                <input class="form-control" type="text" name="reverseGst" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="mb-3">
                                <label class="form-check-label" for="">Profit:</label>
                                <input class="form-control" type="text" name="reverseProfit" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-check-label" for="">WHT:</label>
                                <input class="form-control" type="text" name="reverseWht" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="mb-3">
                                <label class="form-check-label" for="">After GST:</label>
                                <input class="form-control" type="text" name="reverseAfterGst" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="mb-3">
                                <label class="form-check-label" for="">QTY:</label>
                                <input class="form-control" type="text" name="reverseQuantity" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <!-- Add more Reverse Working (in comercial section) -->
                </div>


                <!--Details of Sales Agent-->
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="details-of-sales-agent" role="tabpanel"
                    aria-labelledby="nav-contact-tab">
                    <div class="row">
                        <div class="col-lg-12 spacing-right">
                            <div class="row mb-2">
                                <h5>Doer of the Task :</h5>
                                <div class="col-lg-3 43spacing-right">
                                    Employee id <br> <input class="form-control" name="doerEmpId" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 43spacing-right">
                                    Name <br> <input class="form-control" type="text" name="doerName" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Cell Number <br> <input class="form-control" name="doerCellNo"  type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Email <br> <input class="form-control" name="doerEmail"  type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <h5>Observer of the Task :</h5>
                                <div class="col-lg-3 43spacing-right">
                                    Employee id <br> <input class="form-control" name="observerEmpId" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 43spacing-right">
                                    Name <br> <input class="form-control" name="observerName" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Cell Number <br> <input class="form-control" name="observerCellNo" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Email <br> <input class="form-control" type="text" name="observerEmail" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <h5>Approver of the Task :</h5>
                                <div class="col-lg-3 43spacing-right">
                                    Employee id <br> <input class="form-control" name="approverEmpId" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 43spacing-right">
                                    Name <br> <input class="form-control" name="approverName" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Cell Number <br> <input class="form-control" name="approverCellNo" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Email <br> <input class="form-control" name="approverEmail" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <h5>Visitor :</h5>
                                <div class="col-lg-3 43spacing-right">
                                    Employee id <br> <input class="form-control" name="visitorEmpId" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 43spacing-right">
                                    Name <br> <input class="form-control" name="visitorName" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Cell Number <br> <input class="form-control" name="visitorCellNo" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Email <br> <input class="form-control" name="visitorEmail" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <h5>To Whom he Met :</h5>
                                <div class="col-lg-4 spacing-right">
                                    Name <br> <input class="form-control" name="hemet" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Visiting Card (Front) <br> <input class="form-control" name="visitingCardFront" id="inpFile3" type="file"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Visiting Card (Back) <br> <input class="form-control" name="visitingCardBack" id="inpFile4" type="file"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="row mb-2" style="display: flex; justify-content:end">
                                    <div class="col-lg-3 spacing-right">
                                        <!--Image Preview Biometric-->
                                        <div class="image-preview3" id="imagePreview3" style="margin-left: -135px;">
                                            <img src="" alt="Image Preview3" class="image-preview__image3"
                                                style="height: 30%; width:30%;">
                                            <span class="image-preview__default-text3"> Image Preview </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 spacing-left" style="margin-left: 20px;">
                                        <!--Image Preview Biometric-->
                                        <div class="image-preview4" id="imagePreview4" style="margin-left: -54px;">
                                            <img src="" alt="Image Preview4" class="image-preview__image4"
                                                style="height: 30%; width:30%;">
                                            <span class="image-preview__default-text4"> Image Preview12 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Sales Visit-->
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-visit" role="tabpanel"
                    aria-labelledby="nav-contact-tab">
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Name of Visitor <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                    Date of Visit <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5  spacing-right">
                                    To whom He Met <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-5  spacing-right">
                                    Minutes of Meeting <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 6%;">
                                <div class="col-lg-5 spacing-right">
                                    Type <br>
                                    <select id="hrm_type" class="form-control" name="hrmType" style="width: 100%;">
                                        <option value="Public">Public</option>
                                        <option value="Private">Private</option>
                                    </select>
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Initiation Date <br> <input class="form-control" type="date" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-lg-5 spacing-right">
                                    Submission Date <br> <input class="form-control" type="date" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Bid Security
                                    <select id="hrm_type" class="form-control" name="hrmType" style="width: 100%;">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-lg-5 spacing-right">
                                    Status
                                    <select id="hrm_type" class="form-control" name="hrmType" style="width: 100%;">
                                        <option value="Document-Collection">Document Collection</option>
                                        <option value="WIP">WIP</option>
                                        <option value="Submitted">Submitted</option>
                                        <option value="Qualified">Qualified</option>
                                        <option value="Disqualified">Disqualified</option>
                                    </select>
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Region
                                    <select id="hrm_type" class="form-control" name="hrmType" style="width: 100%;">
                                        <option value="No">Region 1</option>
                                        <option value="Yes">Region 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 spacing-right">
                            <div class="row mb-2">
                                <div class="col-lg-10">
                                    Notes & Remarks <br>
                                    <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
                                </div>
                                <div class="col-lg-10 ">
                                    Other Attachement <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5  spacing-right">
                                    Name of Courier Service <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left">
                                    Screen Shots (Delivery Status) <br> <input class="form-control" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-10 ">
                                    TCS Slip <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--attachements-->
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="attachements" role="tabpanel"
                    aria-labelledby="nav-contact-tab">
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="row">
                                <div class="col-lg-10">
                                    Attachements <br> <input class="form-control" type="file" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-10">
                                    Notes & Remarks <br>
                                    <textarea style="width: 100%;" name="" id="" cols="20" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Comparative Analysis-->
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="comparative-analysis" role="tabpanel"
                    aria-labelledby="nav-contact-tab">
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="row mb-2">
                                <div class="col-lg-10 spacing-right">
                                    Competitor's Name <br> <input class="form-control" name="competitorName" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5  spacing-right">
                                    Competitors's Rate <br> <input class="form-control" name="competitorRate" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-5  spacing-right">
                                    Number of Guards <br> <input class="form-control" name="noOfGuards" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-5  spacing-right">
                                    Attachments <br> <input class="form-control" name="competitorAttach" type="file" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-5  spacing-right">
                                    Target Pricing <br> <input class="form-control" name="targetPrice" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6 spacing-right">
                            <div class="row mb-2">
                                <div class="col-lg-10">
                                    Notes & Remarks <br>
                                    <textarea style="width: 100%;" name="competitorNotes" id="" cols="20" rows="4"></textarea>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <!--RFQ Documents-->



                <!-- Source RFQ Content -->
                <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="source-rfq" role="tabpanel"
                    aria-labelledby="nav-source-rfq-tab">
                    <div class="row">
                        <div class="col-lg-12 spacing-right">
                            <div class="row mb-2">
                                <div class="col-lg-4">
                                    Source of RFQ:<br>  <input class="form-control" name="srcOfRfq" type="file"
                                    placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Supporting of Source of RFQ <br> <input class="form-control" name="supportingRfqAttach" type="file"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    RFQ Document <br> <input class="form-control" type="file" name="rfqDocAttach" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Common Services Required <br> <input class="form-control" name="commonSerReq" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <h5>Fees of Tender Document :</h5>
                                <div class="col-lg-4 spacing-right">
                                    Amount <br> <input class="form-control" name="amount" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Instrument No <br> <input class="form-control" name="insNo" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Name of Bank <br> <input class="form-control" name="bankName" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3 spacing-right">
                                    Screenshot of Documents shared by Prospect <br> <input class="form-control"
                                        type="text" name="screenshotDoc" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Date of Publication <br> <input class="form-control" name="pubDate" type="date" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Submission Date <br> <input class="form-control" name="subDate" type="date" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Internal Deadline <br> <input class="form-control" name="internalDeadline" type="date" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class=" mb-2 mt-2 d-flex align-items-center">
                                    <div class="form-check form-check-inline spacing-left">
                                        <input class="form-check-input" type="checkbox" name="bidMoney" id="bidMoneyCheckbox"
                                            value="negative">
                                        <label class="form-check-label" for="bidMoneyCheckbox">Bid Money</label>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Decision <br> <input class="form-control" name="decision" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                </div>


                                <div id="otherCheckboxesContainer" style="display: none">
                                    <div class="mb-2 mt-2 d-flex align-items-center">
                                        <div id="crossed">
                                            <div class="form-check form-check-inline spacing-left">
                                                <input class="form-check-input" name="cheque" type="checkbox"
                                                    id="crossedChequeCheckbox" value="">
                                                <label class="form-check-label" for="crossedChequeCheckbox">Crossed
                                                    Cheque</label>
                                            </div>
                                        </div>
                                        <div id="pay">
                                            <div class="form-check form-check-inline spacing-left">
                                                <input class="form-check-input" name="payOrder" type="checkbox" id="payOrderCheckbox"
                                                    value="">
                                                <label class="form-check-label" for="payOrderCheckbox">Pay Order</label>
                                            </div>
                                        </div>
                                        <div id="demand">
                                            <div class="form-check form-check-inline spacing-left">
                                                <input class="form-check-input" name="demand" type="checkbox" id="demandDraftCheckbox"
                                                    value="">
                                                <label class="form-check-label" for="demandDraftCheckbox">Demand
                                                    Draft</label>
                                            </div>
                                        </div>
                                        <div id="bank">
                                            <div class="form-check form-check-inline spacing-left">
                                                <input class="form-check-input" name="guarantee" type="checkbox"
                                                    id="bankGuaranteeCheckbox" value="">
                                                <label class="form-check-label" for="bankGuaranteeCheckbox">Bank
                                                    Guarantee</label>
                                            </div>
                                        </div>
                                        <div id="insurrance">
                                            <div class="form-check form-check-inline spacing-left">
                                                <input class="form-check-input" name="insGuan" type="checkbox"
                                                    id="insuranceGuaranteeCheckbox" value="">
                                                <label class="form-check-label"
                                                    for="insuranceGuaranteeCheckbox">Insurance
                                                    Guarantee</label>
                                            </div>
                                        </div>
                                        <div id="online">
                                            <div class="form-check form-check-inline spacing-left">
                                                <input class="form-check-input" name="transfer" type="checkbox"
                                                    id="insuranceGuaranteeCheckbox" value="">
                                                <label class="form-check-label" for="insuranceGuaranteeCheckbox">Online
                                                    Transfer</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Submission Proof <input class="form-control" name="subProfAttach" type="file" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <h5>Submission Details :</h5>
                                <div class="col-lg-4 spacing-right">
                                    RFQ submitted By : <br> <input class="form-control" name="rfqSubBy" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    RFQ submitted on : <br> <input class="form-control" name="rfqSubOn" type="date" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    RFQ submitted Via : <br> <input class="form-control" name="rfqSubVia" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Technical Proposal : <br> <input class="form-control" name="tecPro" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Financial Proposal : <br> <input class="form-control" name="finPro" type="file" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Tender Opening Date : <br> <input class="form-control" name="tenOpn" type="date" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    List of Participating Companies with Financials <br> <input class="form-control"
                                        type="file" name="listComAttach" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="mb-2 mt-2 d-flex align-items-center">
                                    <div class="form-check form-check-inline spacing-left">
                                        <input class="form-check-input" name="byHand" id="byHandSubmittionCheckBox" type="checkbox"
                                            value="negative">
                                        <label class="form-check-label" for="inlineCheckbox1">By Hand</label>
                                    </div>
                                    <div class="row" id="byHandSubmittion_form" style="display: none;">
                                        <div class="col-lg-4 spacing-right">
                                            Time of Submission : <br> <input class="form-control" name="timeSub" type="time"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Submitted to : <br> <input class="form-control" name="subTo" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Scanned Receving Of Submission <input class="form-control" name="scanRecAttach" type="file"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class=" mb-2 mt-2 d-flex align-items-center">
                                    <div class="form-check form-check-inline spacing-left">
                                        <input class="form-check-input" id="viaCourierSubmittion_checkBox"
                                            type="checkbox" id="inlineCheckbox1" name="viaCourier" value="negative">
                                        <label class="form-check-label" for="inlineCheckbox1">Via Courier</label>
                                    </div>
                                    <div class="row" id="viaCourierSubmittion_form" style="display: none;">
                                        <div class="col-lg-6 spacing-right">
                                            Name of Courier : <br> <input class="form-control" name="nameOfCourier" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 spacing-right">
                                            Time of Dispatching : <br> <input class="form-control" name="timeOfDispatching" type="time"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class=" mb-2 mt-2 d-flex align-items-center">
                                    <div class="form-check form-check-inline spacing-left">
                                        <input class="form-check-input" name="viaEmail" id="viaEmailSubmittion_checkBox" type="checkbox"
                                            id="inlineCheckbox1" value="negative">
                                        <label class="form-check-label" for="inlineCheckbox1">Via Email</label>
                                    </div>
                                    <div class="col-lg-4 spacing-right" id="viaEmailSubmittion_form"
                                        style="display: none;">
                                        Time of Submission : <br> <input class="form-control" name="emailtimeSub" type="time"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>

                            </div>
                            <div id="targetDiv" style="display: none;">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Amount <br> <input class="form-control" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Instrument No. <br> <input class="form-control" id="inpFile3" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Name of Bank <br> <input class="form-control" id="inpFile4" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="form-check form-check-inline spacing-left">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="negative">
                                        <label class="form-check-label" for="inlineCheckbox1"
                                            style="margin-right: 20px;">Draft Contract Agreement</label>
                                        Attachments <input class="form-control" type="file" placeholder="..."
                                            style="width: 30%;">
                                    </div>
                                </div>
                            </div>
                            <div class=" mb-2 mt-2 d-flex align-items-center">
                                <div class="form-check form-check-inline spacing-left">
                                    <input class="form-check-input" type="checkbox" id="grev"
                                        onclick="toggleGrievanceDiv()" name="anyGrev" value="negative">
                                    <label class="form-check-label" for="grevCheckbox">Any Greviances</label>
                                </div>
                            </div>
                            <div id="grevCheckbox" style="display:none">
                                <div class="row">
                                    <div class="col-lg-4 spacing-right">
                                        Greviance Related to : <br> <input class="form-control" name="grevRelated" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Greviance Attachment: <br> <input class="form-control" name="grevAttach" type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bid Security Record -->
                <div class="tab-pane fade show  m-3" style="opacity: 90%;" id="bid-security" role="tabpanel"
                    aria-labelledby="nav-bid-security-tab">
                    <div class="row">
                        <div class="col-lg-4 spacing-right">
                            Date: <br> <input class="form-control" type="date" name="bidDate" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Company Name: <br> <input class="form-control" name="companyName" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            In Favor of: <br> <input class="form-control" name="inFavourOf" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 spacing-right mt-1">
                            Bid Security Amount: <br> <input class="form-control" name="bidAmount" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-1">
                            Type: <br> <input class="form-control" type="text" name="bidType" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-1">
                            Bank Name: <br> <input class="form-control" name="bidBankName" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 spacing-right mt-1">
                            Instrument No: <br> <input class="form-control" name="bidInsNo" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-1">
                            Received: <br> <input class="form-control" name="bidReceived" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-1">
                            Remarks: <br> <input class="form-control" name="bidRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 spacing-right mt-1">
                            Notes <br>
                            <textarea style="width: 100%;" name="bidNotes" id="" cols="15" rows="4"></textarea>
                        </div>
                        <div class="col-lg-4 spacing-right mt-1">
                            Attachments: <br> <input class="form-control" name="bidAttach" type="file" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                </div>

                <!--  Bid Survey Checklist  -->
                <div class="tab-pane fade show  m-3" style="opacity: 90%;" id="survey-checklist" role="tabpanel"
                    aria-labelledby="nav-survey-checklist-tab">
                    <div class="col-lg-4 spacing-right">
                        Location/Client Name: <br> <input class="form-control" name="location" type="text" placeholder="..."
                            style="width: 100%;">
                    </div>
                    <h5 class="mt-2">1. Security Company deployed?</h5>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            Response: <br> <input class="form-control" name="scdResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Remarks: <br> <input class="form-control" name="scdRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                    <h5 class="mt-2">2. Duty Hours?</h5>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            Response: <br> <input class="form-control" name="dhResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Remarks: <br> <input class="form-control" name="dhRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                    <h5 class="mt-2">3. Security Incharge Details?</h5>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6>a) Rank?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="sidRankResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="sidRankRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6>b) Salary?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="sidSalaryResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="sidSalaryRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6>c) Monthly Leaves?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="sidMonthlyResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="sidMonthlyRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6>d) EOBI & Social Security?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="sidEOBIResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="sidEOBIRankRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6>d) Social Security Card?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="sidSocialResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="sidSocialRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <h5 class="mt-2">4. Number of Security in charge deployed?</h5>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            Response: <br> <input class="form-control" name="securityinChargeResponse"  type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Remarks: <br> <input class="form-control" name="securityinChargeRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>

                    <h5 class="mt-2">5. Security Supervisor Details?</h5>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div>
                                <h6>a) Rank? </h6>
                            </div>
                            Response: <br> <input class="form-control" name="ssdRankResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:18px;">

                            Remarks: <br> <input class="form-control" name="ssdRankRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6> b) Salary?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="ssdSalaryResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="ssdSalaryRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6>c) Monthly Leaves?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="ssdMonthlyResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="ssdMonthlyRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6> d) EOBI & Social Security?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="ssdEOBIResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="ssdEOBIRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6>e) Social Security Card?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="ssdSocialResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="ssdSocialRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <h5 class="mt-2">6. Number of Security Supervoisers deployed?</h5>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            Response: <br> <input class="form-control" name="nssdResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Remarks: <br> <input class="form-control" name="nssdRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                    <h5 class="mt-2">7. Security Guard Civil Details?</h5>

                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6> a) Salary?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="sgcdSalaryResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">
                            Remarks: <br> <input class="form-control" name="sgcdSalaryRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6>b) Monthly Leaves?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="sgcdMonthlyResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="sgcdMonthlyRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6> c) EOBI & Social Security?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="sgcdEOBIResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="sgcdEOBIRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6> d) Social Security Card?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="sgcdSocialResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="sgcdSocialRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                    <h5 class="mt-2">8. Number of Civil Guards?</h5>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            Response: <br> <input class="form-control" name="nocgResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Remarks: <br> <input class="form-control" name="nocgRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                    <h5 class="mt-2">9. Number of Ex-Army Guards?</h5>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            Response: <br> <input class="form-control" name="noegResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Remarks: <br> <input class="form-control" name="noegRemarks"  type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                    <h5 class="mt-2">10. Food for security staff?</h5>

                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6> a) Free of cost by client?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="ffssFreeResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="ffssFreeRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6>b) Or any charges per month?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="ffssCostResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="ffssCostRemarks"  type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6> c) All time food avaliable
                                    or duty time only?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="ffssFoodResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="ffssFoodRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                    <h5 class="mt-2">11. Accomodation by client or Security
                        Company?
                    </h5>

                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6> a) If by Security Company,
                                    what is the rent?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="abcResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="abcRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                    <h5 class="mt-2">12. Patrolling Vehicle</h5>

                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6> a) Bike?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="abcBikeResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="abcBikeRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6>b) Or 4x wheeler?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="abcFourResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="abcFourRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6> c) Which Vehicle?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="abcVehicleResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="abcVehicleRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6> d) How many rounds per day?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="abcRoundsResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="abcRoundsRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6> e) Fuel by client/company?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="abcFuelResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="abcFuelRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6> f) Fuel Consumption?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="abcConsumptionResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right" style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="abcConsumptionRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                    <h5 class="mt-2">13. Wireless Equipment if any?
                        Quantity? Model?
                    </h5>

                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="mt-2">
                                <h6> a) Visit Conducted by?</h6>
                            </div>
                            Response: <br> <input class="form-control" name="weResponse" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right " style="margin-top:35px;">

                            Remarks: <br> <input class="form-control" name="weRemarks" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="row">
                            <div class="col-lg-6 spacing-right mt-2">

                                Notes: <br> <textarea class="form-control" name="checklistNotes" style="width: 100%;" name="" id="" cols="15"
                                    rows="4"></textarea>
                            </div>
                            <div class="col-lg-6 spacing-right" style="margin-top:26px;">

                                Attachements: <br> <input class="form-control" name="checklistAttach" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>

                        </div>

                    </div>
                    <!--  Bid Survey Checklist End -->

                </div>

                <!-- SOPs for tenders -->
                <div class="tab-pane fade show  m-3" style="opacity: 90%;" id="SOPs-tenders" role="tabpanel"
                    aria-labelledby="nav-SOPs-tenders-tab">
                    <div class="col-lg-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr width="100%" class="text-center">
                                    <th width="5%">Sr</th>
                                    <th width="45%">Task</th>
                                    <th width="25%">Timeline</th>
                                    <th width="25%">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr width="100%">
                                    <td width="5%">1</td>
                                    <td width="45%">Maintain Log Book with following details <br>
                                        - Document purchase Fee <br>
                                        - Pre-bid Meeting <br>
                                        - Bid security <br>
                                        - Number of guards <br>
                                        - Region <br>
                                        - Submission deadline <br>
                                        - Opening date <br>
                                    </td>
                                    <td width="25%">Same day of receiving ad</td>
                                    <td width="25%"><input name="rem" /></td>
                                </tr>
                                <tr width="100%">
                                    <td width="5%">2</td>
                                    <td width="45%">Collect documents</td>
                                    <td width="25%">Within 2 days of ad</td>
                                    <td width="25%"><input name="rem1" /></td>
                                </tr>
                                <tr width="100%">
                                    <td width="5%">3</td>
                                    <td width="45%">Send email for Bid Security to finance</td>
                                    <td width="45%">Same day of receiving documents</td>
                                    <td width="25%"><input name="rem2"  /></td>
                                </tr>
                                <tr width="100%">
                                    <td width="5%">4</td>
                                    <td width="45%">Pre-bid Meeting <br>
                                        - Inform concerned person to visit <br>
                                        - Share and brief tender docs to discuss points
                                    </td>
                                    <td width="25%">01 day before pre-bid</td>
                                    <td width="25%"><input  name="rem3" /></td>
                                </tr>
                                <tr width="100%">
                                    <td width="5%">5</td>
                                    <td width="45%">Site survey </td>
                                    <td width="25%">Atleast 4x days before submission</td>
                                    <td width="25%"><input name="rem4" /></td>
                                </tr>
                                <tr width="100%">
                                    <td width="5%">6</td>
                                    <td width="45%">Tender Working <br>
                                        - Technical proposal completion
                                    </td>
                                    <td width="25%">4x days before tender deadline</td>
                                    <td width="25%"><input name="rem5" /></td>
                                </tr>
                                <tr width="100%">
                                    <td width="5%">7</td>
                                    <td width="45%">Financial proposal and submission </td>
                                    <td width="25%">3x days before deadline</td>
                                    <td width="25%"><input name="rem6" /></td>
                                </tr>
                                <tr width="100%">
                                    <td width="5%">8</td>
                                    <td width="45%">Bid security log </td>
                                    <td width="25%">Record the same day of preparation <br>
                                        Update Finance team two a week
                                    </td>
                                    <td width="25%"><input name="rem7" /></td>
                                </tr>
                                <tr width="100%">
                                    <td width="5%">9</td>
                                    <td width="45%">Opening Report <br>
                                        - Make comparison sheet and share in group
                                    </td>
                                    <td width="25%">Same day of opening</td>
                                    <td width="25%"><input name="rem8" /></td>
                                </tr>
                                <tr width="100%">
                                    <td width="5%">10</td>
                                    <td width="45%">Grievance letter </td>
                                    <td width="25%">As per direction from management</td>
                                    <td width="25%"><input name="rem9" /></td>
                                </tr>
                                <tr width="100%">
                                    <td width="5%">11</td>
                                    <td width="45%">Return of bid security</td>
                                    <td width="25%">Max after 10 days of opening/ 7 days after evaluation report</td>
                                    <td width="25%"><input name="rem10" /></td>
                                </tr>


                            </tbody>
                        </table>
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <label for="excelFile" class="btn btn-success">Upload Excel Sheet</label>
                                    <input type="file" id="excelFile" accept=".xls, .xlsx" style="display: none;" />
                                </div>
                            </div>
                        </div>
                        <div id="excelDataTableContent" class="table-responsive">
                            <table id="excelDataTable" class="table table-bordered border-primary table-hover">
                                <!-- Table content will be dynamically inserted here -->
                            </table>
                        </div>

                    </div>
                </div>

                <!-- Daily RFQ Reports -->
                <div class="tab-pane fade show  m-3" style="opacity: 90%;" id="daily-report" role="tabpanel"
                    aria-labelledby="daily-report-tab">
                    <div class="row">
                        <div class="container  my-1" id="armourContainer" >
                            <div class="accordion" id="armourAccordion" >
                                <!-- Initial Accordion Item -->
                                <div class="accordion-item armouraccordion-item" id="armourEntry1">
                                    <h2 class="accordion-header" id="armourHeading1" style="color: white">
                                        <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#armourCollapse1" aria-expanded="false" aria-controls="armourCollapse1">
                                            RFQ Report 1
                                        </button>
                                    </h2>
                                    <div id="armourCollapse1" class="collapse" aria-labelledby="armourHeading1">
                                        <div class="accordion-body">
                                            <div id="cleaningInfo" class="row">
                                                <div class="col-lg-4 spacing-right">
                                                    Date: <br> <input class="form-control" type="date" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Report Uploaded By (Name): <br> <input class="form-control" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">

                                                    Report Uploaded By (Number): <br> <input class="form-control" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    Report Uploaded By (Email): <br> <input class="form-control" type="email" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    Office ID: <br> <input class="form-control" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    Department ID: <br> <input class="form-control" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    Reporting Person Name: <br> <input class="form-control" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    Reporting Person Number: <br> <input class="form-control" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    Reporting Person Email: <br> <input class="form-control" type="email" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    Region Name: <br> <input class="form-control" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    Region Code: <br> <input class="form-control" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    GM: <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    DGM: <br> <input class="form-control" type="email" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    CRO: <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    Client/ Location Visited: <br> <input class="form-control" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    Response By: <br> <input class="form-control" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    Opening Date: <br> <input class="form-control" type="date" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    Status: <br> <input class="form-control" type="email" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    Remarks: <br> <input class="form-control" type="email" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">
                                                    Notes <br>
                                                    <textarea class="form-control" style="width: 100%;"  id="" cols="15"
                                                        rows="4"></textarea>
                                                </div>
                                                <div class="col-lg-4 spacing-right mt-2">

                                                    Attachements: <br> <input class="form-control" type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>


                    <!-- Daily RFQ Reports End -->
                </div>



            </div>
            <button type="submit">Submit</button>
        </div>

    </form>
    
    </section>


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

        const element = document.getElementById('sales_form');
        if (element) {
            const options = {
                margin: 1,
                filename: 'sales_information.pdf',
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
            console.error('Element with ID "sales_form" not found.');
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

        const element = document.getElementById('sales_form');
        if (element) {
            const options = {
                margin: 1,
                filename: 'sales_information.pdf',
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        document.getElementById('categoryOfEquipment').addEventListener('change', function () {
            var selectedOption = this.value;
            hideAllContent(); // Hide all content first

            // Show content based on selected option
            switch (selectedOption) {
                case 'ClassA':
                    document.getElementById('classAContent').style.display = 'block';
                    break;
                case 'ClassB':
                    document.getElementById('classBContent').style.display = 'block';
                    break;
                case 'ClassC':
                    document.getElementById('classCContent').style.display = 'block';
                    break;
                case 'ClassD':
                    document.getElementById('classDContent').style.display = 'block';
                    break;
                case 'ClassE':
                    document.getElementById('classEContent').style.display = 'block';
                    break;
                case 'ClassF':
                    document.getElementById('classFContent').style.display = 'block';
                    break;
                default:
                    // Do nothing if no option selected
                    break;
            }
        });

        // Function to hide all content
        function hideAllContent() {
            var contentDivs = document.querySelectorAll('.col-lg-12.spacing-right[id$="Content"]');
            contentDivs.forEach(function (div) {
                div.style.display = 'none';
            });
        }
    </script>

    <script>
        document.getElementById('smokeDetectorInstallation').addEventListener('change', function () {
            var installationOption = this.value;
            var installationChargesField = document.getElementById('installationChargesField');

            if (installationOption === 'yes') {
                installationChargesField.style.display = 'block';
            } else {
                installationChargesField.style.display = 'none';
            }
        });
    </script>

    <script>
        document.getElementById('internalShiftingSelect').addEventListener('change', function () {
            var internalShiftingOption = this.value;
            var internalShiftingChargesField = document.getElementById('internalShiftingChargesField');

            if (internalShiftingOption === 'yes') {
                internalShiftingChargesField.style.display = 'block';
            } else {
                internalShiftingChargesField.style.display = 'none';
            }
        });
    </script>

    <script>
        document.getElementById('reinstallationSelect').addEventListener('change', function () {
            var reinstallationOption = this.value;
            var reinstallationChargesField = document.getElementById('reinstallationChargesField');

            if (reinstallationOption === 'yes') {
                reinstallationChargesField.style.display = 'block';
            } else {
                reinstallationChargesField.style.display = 'none';
            }
        });
    </script>

    <script>
        document.getElementById('qrfMonitoringSelect').addEventListener('change', function () {
            var qrfMonitoringOption = this.value;
            var qrfMonitoringChargesField = document.getElementById('qrfMonitoringChargesField');

            if (qrfMonitoringOption === 'yes') {
                qrfMonitoringChargesField.style.display = 'block';
            } else {
                qrfMonitoringChargesField.style.display = 'none';
            }
        });
    </script>

    <script>
        document.getElementById('monthlyQrfMonitoringCharges').addEventListener('input', function () {
            var monthlyCharges = parseFloat(this.value);
            var yearlyChargesField = document.getElementById('yearlyQrfMonitoringCharges');

            if (!isNaN(monthlyCharges)) {
                yearlyChargesField.value = monthlyCharges * 12;
            } else {
                yearlyChargesField.value = '';
            }
        });
    </script>

    <script>
        document.getElementById('policeMonitoringSelect').addEventListener('change', function () {
            var policeMonitoringOption = this.value;
            var policeMonitoringChargesField = document.getElementById('policeMonitoringChargesField');

            if (policeMonitoringOption === 'yes') {
                policeMonitoringChargesField.style.display = 'block';
            } else {
                policeMonitoringChargesField.style.display = 'none';
            }
        });
    </script>

    <script>
        document.getElementById('monthlyPoliceMonitoringCharges').addEventListener('input', function () {
            var monthlyCharges = parseFloat(this.value);
            var yearlyChargesField = document.getElementById('yearlyPoliceMonitoringCharges');

            if (!isNaN(monthlyCharges)) {
                yearlyChargesField.value = monthlyCharges * 12;
            } else {
                yearlyChargesField.value = '';
            }
        });
    </script>

    <script>
    $(document).ready(function() {
        $("#men_addmore_btn").click(function() {
            $(".row-fluid:last").clone().appendTo(".row-fluid");
            $("#men_remove_btn").show();
            $("#men_addmore_btn").hide();
        });
        $("#men_remove_btn").click(function() {
            $(".row-fluid:last").remove();
            $("#men_remove_btn").hide();
            $("#men_addmore_btn").show();


        });






        $("#check-complaines").change(function() {
            if (this.checked) {
                $("#check1").show();
            } else {
                $("#check1").hide();
            }
        });
        $("#check-lumpsum").change(function() {
            if (this.checked) {
                $("#check2").show();
            } else {
                $("#check2").hide();
            }
        });

        $("#check1-shown").change(function() {
            if (this.checked) {
                $("#shown-WHT").show();
            } else {
                $("#shown-WHT").hide();
            }
        });
        $("#check1-hidden").change(function() {
            if (this.checked) {
                $("#hidden-WHT").show();
            } else {
                $("#hidden-WHT").hide();
            }
        });

        $("#check2-shown").change(function() {
            if (this.checked) {
                $("#shown-WHT-2").show();
            } else {
                $("#shown-WHT-2").hide();
            }
        });
        $("#check2-hidden").change(function() {
            if (this.checked) {
                $("#hidden-WHT-2").show();
            } else {
                $("#hidden-WHT-2").hide();
            }
        });

        $("#check-reverse").change(function() {
            if (this.checked) {
                $("#reverse-working").show();
            } else {
                $("#reverse-working").hide();
            }
        });

    });
    </script>


    <!-- <script>
        document.getElementById("reporting_address").addEventListener("click", function(event) {
            event.preventDefault(); // prevent the default behavior of the link

            var div = document.getElementById("reporting_address_form");

            if (div.style.display === "none") {
                div.style.display = "block"; // show the div
            } else {
                div.style.display = "none"; // hide the div
            }
         });
     </script> -->

    <script>
    const reporting_address_check = document.getElementById("reporting_address_check");
    const reporting_address_form = document.getElementById("reporting_address_form");
    $("#reporting_address_check").change(function() {
        if (this.checked) {

            $("#reporting_address_form").show();
        } else {

            $("#reporting_address_form").hide();
        }
    });
    </script>

    <script>
    $(document).ready(function() {
        $("#byHandSubmittionCheckBox").change(function() {
            if (this.checked) {
                $("#byHandSubmittion_form").show();
            } else {
                $("#byHandSubmittion_form").hide();
            }
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $("#viaCourierSubmittion_checkBox").change(function() {
            if (this.checked) {
                $("#viaCourierSubmittion_form").show();
            } else {
                $("#viaCourierSubmittion_form").hide();
            }
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $("#viaEmailSubmittion_checkBox").change(function() {
            if (this.checked) {
                $("#viaEmailSubmittion_form").show();
            } else {
                $("#viaEmailSubmittion_form").hide();
            }
        });
    });
    </script>

    <script>
    $("#reporting_address_escort_check").change(function() {
        if (this.checked) {

            $("#reporting_address_escort_form").show();
        } else {

            $("#reporting_address_escort_form").hide();
        }
    });
    </script>

    <script>
    $("#check_driver").change(function() {
        if (this.checked) {

            $("#food_driver").show();
        } else {

            $("#food_driver").hide();
        }
    });
    </script>
    <script>
    $("#check_escort_driver").change(function() {
        if (this.checked) {

            $("#food_escort_driver").show();
        } else {

            $("#food_escort_driver").hide();
        }
    });
    </script>
    <script>
    $("#check_staff").change(function() {
        if (this.checked) {

            $("#check_staff_Men_Guarding").show();
        } else {

            $("#check_staff_Men_Guarding").hide();
        }
    });
    </script>
    <script>
    $("#check_escort_staff").change(function() {
        if (this.checked) {

            $("#check_escort_staff_Men_Guarding").show();
        } else {

            $("#check_escort_staff_Men_Guarding").hide();
        }
    });
    </script>


    <!-- <script>
    document.getElementById("airline").addEventListener("click", function(event) {
        event.preventDefault(); // prevent the default behavior of the link

        var div = document.getElementById("airline_details");

        if (div.style.display === "none") {
            div.style.display = "block"; // show the div
        } else {
            div.style.display = "none"; // hide the div
        }
     });
 </script> -->
    <script>
    $("#airline_check").change(function() {
        if (this.checked) {

            $("#airline_check_form").show();
        } else {

            $("#airline_check_form").hide();
        }
    });
    </script>

    <!-- <script>
    document.getElementById("POC").addEventListener("click", function(event) {
        event.preventDefault(); // prevent the default behavior of the link

        var div = document.getElementById("POC_airline");

        if (div.style.display === "none") {
            div.style.display = "block"; // show the div
        } else {
            div.style.display = "none"; // hide the div
        }
     });
 </script> -->
    <script>
    $("#POC_check").change(function() {
        if (this.checked) {

            $("#POC_check_form").show();
        } else {

            $("#POC_check_form").hide();
        }
    });
    </script>

    <script>
    $("#reporting_location_check").change(function() {
        if (this.checked) {

            $("#reporting_location_form").show();
        } else {

            $("#reporting_location_form").hide();
        }
    });
    </script>
    <script>
    $("#escort_services_check").change(function() {
        if (this.checked) {

            $("#escort_services_form").show();
        } else {

            $("#escort_services_form").hide();
        }
    });
    </script>
    <script>
    $("#canine_services_check").change(function() {
        if (this.checked) {

            $("#canine_services_form").show();
        } else {

            $("#canine_services_form").hide();
        }
    });
    </script>

    <script>
    $("#delievery_location_check").change(function() {
        if (this.checked) {

            $("#delievery_location_form").show();
        } else {

            $("#delievery_location_form").hide();
        }
    });
    </script>
    <script>
    $("#delievery_location_check_1").change(function() {
        if (this.checked) {

            $("#delievery_location_form_1").show();
        } else {

            $("#delievery_location_form_1").hide();
        }
    });
    </script>
    <script>
    $("#delievery_location_check_2").change(function() {
        if (this.checked) {

            $("#delievery_location_form_2").show();
        } else {

            $("#delievery_location_form_2").hide();
        }
    });
    </script>
    <script>
    $("#installation_location_check").change(function() {
        if (this.checked) {

            $("#installation_location_form").show();
        } else {

            $("#installation_location_form").hide();
        }
    });
    </script>
    <script>
        $("#delievery_location_check_3").change(function() {
            if (this.checked) {

                $("#delievery_location_form_3").show();
            } else {

                $("#delievery_location_form_3").hide();
            }
        });
        </script>
        <script>
        $("#installation_location_check_3").change(function() {
            if (this.checked) {

                $("#installation_location_form_3").show();
            } else {

                $("#installation_location_form_3").hide();
            }
        });
        </script>
    <script>
    $("#installation_location_check_1").change(function() {
        if (this.checked) {

            $("#installation_location_form_1").show();
        } else {

            $("#installation_location_form_1").hide();
        }
    });
    </script>
    <script>
    $("#installation_location_check_2").change(function() {
        if (this.checked) {

            $("#installation_location_form_2").show();
        } else {

            $("#installation_location_form_2").hide();
        }
    });
    </script>



    <!-- <script>
    document.getElementById("delivery_location").addEventListener("click", function(event) {
        event.preventDefault(); // prevent the default behavior of the link

        var div = document.getElementById("delivery_location_address");

        if (div.style.display === "none") {
            div.style.display = "block"; // show the div
        } else {
            div.style.display = "none"; // hide the div
        }
     });
 </script> -->




    <!-- <script>
        document.getElementsByClassName("fuel").addEventListener("change", function (e) {
            e.preventDefault();

            var div = document.getElementById("fuel_rate_1");
            var selectedOption = this.value;

            if (selectedOption === "fuel_rate_1") {
                div.style.display = "flex"; // show the div
            } else {
                div.style.display = "none"; // hide the div
            }
        });
    </script> -->

    <script>
    var fuel = document.getElementById("fuel");
    var fuel_rate_km = document.getElementById("fuel_rate_km");
    var fuel_rate_km_req = document.getElementById("fuel_rate_km_req");

    fuel.addEventListener("change", function() {
        if (fuel.value === "fuel_rate_1") {

            fuel_rate_km.style.display = "block";
            fuel_rate_km_req.style.display = "none";
        } else if (fuel.value === "fuel_rate_2") {

            fuel_rate_km.style.display = "none";
            fuel_rate_km_req.style.display = "block";
        }
    });
    </script>
    <script>
    var tooltaxdropdown = document.getElementById("tooltax_dropdown");
    var tooltax1 = document.getElementById("tooltax1");
    var tooltax2 = document.getElementById("tooltax2");

    tooltaxdropdown.addEventListener("change", function() {
        if (tooltaxdropdown.value === "tool_actual") {

            tooltax1.style.display = "block";
            tooltax2.style.display = "none";
        } else if (tooltaxdropdown.value === "tool_km") {

            tooltax1.style.display = "none";
            tooltax2.style.display = "block";
        }
    });
    </script>

    <script>
    var fuel_1 = document.getElementById("fuel_1");
    var fuel_rate_km_1 = document.getElementById("fuel_rate_km_1");
    var fuel_rate_km_req_1 = document.getElementById("fuel_rate_km_req_1");

    fuel.addEventListener("change", function() {
        if (fuel_1.value === "fuel_rate_1_1") {

            fuel_rate_km_1.style.display = "block";
            fuel_rate_km_req_1.style.display = "none";
        } else if (fuel_1.value === "fuel_rate_2_2") {

            fuel_rate_km_1.style.display = "none";
            fuel_rate_km_req_1.style.display = "block";
        }
    });
    </script>

    <script>
    document.getElementById("leadsubmit-category").addEventListener("click", function() {
        var customCategory = document.getElementById("leadcustom-category").value;
        var select = document.getElementById("leadcategory");
        var option = document.createElement("option");
        option.text = customCategory;
        option.value = customCategory;
        select.add(option);
    });
    </script>

    <script>
    function toggleCol8(colId) {
        var colCount = 11; // Number of columns

        for (var i = 1; i <= colCount; i++) {
            var col = document.getElementById('col-lg-8-' + i);
            if (col) {
                col.style.display = i === colId ? 'block' : 'none';
            }
        }
    }
    </script>
    `
    <script>
    function toggleDiv() {
        var div = document.getElementById("inputDiv");
        if (div.style.display === "none") {
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    }
    </script>

    <script>
    function toggleDiv1() {
        var div1 = document.getElementById("inputDiv1");
        if (div1.style.display === "none") {
            div1.style.display = "block";
        } else {
            div1.style.display = "none";
        }
    }
    </script>

    <script>
    document.getElementById("men-guard").addEventListener("click", function(event) {
        event.preventDefault(); // prevent the default behavior of the link
        var div = document.getElementById("men");
        if (div.style.display === "none") {
            div.style.display = "block"; // show the div
        } else {
            div.style.display = "none"; // hide the div
        }
    });
    </script>

    <script>
    document.getElementById("escort1").addEventListener("click", function(event) {
        event.preventDefault(); // prevent the default behavior of the link
        var div = document.getElementById("escort");
        if (div.style.visibility === "hidden") {
            div.style.visibility = "visible"; // show the element
        } else {
            div.style.visibility = "hidden"; // hide the element
        }
    });
    </script>

    <script>
    document.getElementById("canine1").addEventListener("click", function(event) {
        event.preventDefault(); // prevent the default behavior of the link
        var div = document.getElementById("canine");
        if (div.style.display === "none") {
            div.style.display = "block"; // show the div
        } else {
            div.style.display = "none"; // hide the div
        }
    });
    </script>

    <script>
    document.getElementById("facility1").addEventListener("click", function(event) {
        event.preventDefault(); // prevent the default behavior of the link
        var div = document.getElementById("facility");
        if (div.style.display === "none") {
            div.style.display = "block"; // show the div
        } else {
            div.style.display = "none"; // hide the div
        }
    });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const salaryInput = document.getElementById('salary');
            const relieverAllowanceInput = document.getElementById('relieverAllowance');

            salaryInput.addEventListener('input', function() {
                const salary = parseFloat(salaryInput.value);
                const relieverAllowance = (salary / 26 * 4).toFixed(2); // Calculate reliever allowance
                relieverAllowanceInput.value = isNaN(relieverAllowance) ? '' : relieverAllowance; // Update reliever allowance input
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const salaryInput = document.getElementById('hidesalary');
            const relieverAllowanceInput = document.getElementById('hiderelieverAllowance');

            salaryInput.addEventListener('input', function() {
                const salary = parseFloat(salaryInput.value);
                const relieverAllowance = (salary / 26 * 4).toFixed(2); // Calculate reliever allowance
                relieverAllowanceInput.value = isNaN(relieverAllowance) ? '' : relieverAllowance; // Update reliever allowance input
            });
        });
    </script>



    <!--Further Images Display Setup-->

    <script>
    document.getElementById('img1').addEventListener('click', function() {
        var newDiv = document.getElementById('newDiv');
        newDiv.style.display = 'block';
    });

    function removeNewDiv() {
        var newDiv = document.getElementById('newDiv');
        newDiv.style.display = 'none';
    }
    </script>
    <script>
    document.getElementById('img2').addEventListener('click', function() {
        var newDiv = document.getElementById('newDiv');
        newDiv.style.display = 'block';
    });

    function removeNewDiv() {
        var newDiv = document.getElementById('newDiv');
        newDiv.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img2').addEventListener('click', function() {
        var newDiv1 = document.getElementById('newDiv1');
        newDiv1.style.display = 'block';
    });

    function removeNewDiv1() {
        var newDiv1 = document.getElementById('newDiv1');
        newDiv1.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img3').addEventListener('click', function() {
        $('#newDiv5-a').hide();
        var newDiv5 = document.getElementById('newDiv5');
        newDiv5.style.display = 'block';
    });

    function removeNewDiv5() {
        var newDiv5 = document.getElementById('newDiv5');
        newDiv5.style.display = 'none';
    }
    </script>
    <script>
    document.getElementById('img3-a').addEventListener('click', function() {
        $('#newDiv5').hide();
        var newDiv5_a = document.getElementById('newDiv5-a');
        newDiv5_a.style.display = 'block';
    });

    function removeNewDiv5_a() {
        var newDiv5_a = document.getElementById('newDiv5-a');
        newDiv5_a.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img4').addEventListener('click', function() {
        var newDiv6 = document.getElementById('newDiv6');
        newDiv6.style.display = 'block';
    });

    function removeNewDiv6() {
        var newDiv6 = document.getElementById('newDiv6');
        newDiv6.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img5').addEventListener('click', function() {
        var newDiv7 = document.getElementById('newDiv7');
        newDiv7.style.display = 'block';
    });

    function removeNewDiv7() {
        var newDiv7 = document.getElementById('newDiv7');
        newDiv7.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img6').addEventListener('click', function() {
        var newDiv8 = document.getElementById('newDiv8');
        newDiv8.style.display = 'block';
    });

    function removeNewDiv8() {
        var newDiv8 = document.getElementById('newDiv8');
        newDiv8.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img9').addEventListener('click', function() {
        $('#newDiv10-a').hide();
        var newDiv10 = document.getElementById('newDiv10');
        newDiv10.style.display = 'block';
    });

    function removeNewDiv10() {
        var newDiv10 = document.getElementById('newDiv10');
        newDiv10.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img9-a').addEventListener('click', function() {
        $('#newDiv10').hide();
        var newDiv10a = document.getElementById('newDiv10-a');
        newDiv10a.style.display = 'block';
    });

    function removeNewDiv10_a() {
        var newDiv10_a = document.getElementById('newDiv10-a');
        newDiv10_a.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img10').addEventListener('click', function() {
        var newDiv11 = document.getElementById('newDiv11');
        newDiv11.style.display = 'block';
    });

    function removeNewDiv11() {
        var newDiv11 = document.getElementById('newDiv11');
        newDiv11.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img11').addEventListener('click', function() {
        var newDiv12 = document.getElementById('newDiv12');
        newDiv12.style.display = 'block';
    });

    function removeNewDiv12() {
        var newDiv12 = document.getElementById('newDiv12');
        newDiv12.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img11-a').addEventListener('click', function() {
        var newDiv12a = document.getElementById('newDiv12-a');
        newDiv12a.style.display = 'block';
    });

    function removeNewDiv12a() {
        var newDiv12a = document.getElementById('newDiv12-a');
        newDiv12a.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img12').addEventListener('click', function() {
        var newDiv13 = document.getElementById('newDiv13');
        newDiv13.style.display = 'block';
    });

    function removeNewDiv13() {
        var newDiv13 = document.getElementById('newDiv13');
        newDiv13.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img13').addEventListener('click', function() {
        $("#newDiv14-a").hide();
        $("#newDiv14-b").hide();
        var newDiv14 = document.getElementById('newDiv14');
        newDiv14.style.display = 'block';


    });

    function removeNewDiv14() {
        var newDiv14 = document.getElementById('newDiv14');
        newDiv14.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img13-a').addEventListener('click', function() {
        $("#newDiv14").hide();
        $("#newDiv14-b").hide();
        var newDiv14a = document.getElementById('newDiv14-a');
        newDiv14a.style.display = 'block';

    });
    </script>
    <script>
    function remove_newDiv14_a() {
        var newDiv14a = document.getElementById('newDiv14-a');
        newDiv14a.style.display = 'none';
    }
    </script>
    <script>
    document.getElementById('img13-b').addEventListener('click', function() {
        $("#newDiv14").hide();
        $("#newDiv14-a").hide();
        var newDiv14b = document.getElementById('newDiv14-b');
        newDiv14b.style.display = 'block';

    });
    </script>
    <script>
    function remove_newDiv14_b() {
        var newDiv14b = document.getElementById('newDiv14-b');
        newDiv14b.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img14').addEventListener('click', function() {
        var newDiv15 = document.getElementById('newDiv15');
        newDiv15.style.display = 'block';
    });

    function removeNewDiv15() {
        var newDiv15 = document.getElementById('newDiv15');
        newDiv15.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img15').addEventListener('click', function() {
        var newDiv3 = document.getElementById('newDiv3');
        newDiv3.style.display = 'block';
    });

    function removeNewDiv3() {
        var newDiv3 = document.getElementById('newDiv3');
        newDiv3.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img16').addEventListener('click', function() {
        var newDiv4 = document.getElementById('newDiv4');
        newDiv4.style.display = 'block';
    });

    function removeNewDiv4() {
        var newDiv4 = document.getElementById('newDiv4');
        newDiv4.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img3').addEventListener('click', function() {
        var newDiv9 = document.getElementById('newDiv9');
        newDiv9.style.display = 'block';
    });

    function removeNewDiv9() {
        var newDiv9 = document.getElementById('newDiv9');
        newDiv9.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img20').addEventListener('click', function() {
        var newDiv17 = document.getElementById('newDiv17');
        newDiv17.style.display = 'block';
    });

    function removeNewDiv17() {
        var newDiv17 = document.getElementById('newDiv17');
        newDiv17.style.display = 'none';
    }
    </script>

    <script>
    document.getElementById('img23').addEventListener('click', function() {
        var newDiv18 = document.getElementById('newDiv18');
        newDiv18.style.display = 'block';
        console.log("clicked", newDiv18);
    });

    function removeNewDiv18() {
        var newDiv18 = document.getElementById('newDiv18');
        newDiv18.style.display = 'none';
    }
    </script>


    <script>
    document.getElementById('img25').addEventListener('click', function() {
        var newDiv25 = document.getElementById('newDiv25');
        newDiv25.style.display = 'block';
    });

    function removeNewDiv25() {
        var newDiv25 = document.getElementById('newDiv25');
        newDiv25.style.display = 'none';
    }
    </script>


    <!--Checkboxes-->

    <script>
    const checkbox = document.getElementById('pilotcheck');
    const inputContainer = document.getElementById('inputContainer');

    checkbox.addEventListener('change', function() {
        if (checkbox.checked) {
            inputContainer.style.display = 'block';
        } else {
            inputContainer.style.display = 'none';
        }
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#otherCheckboxesContainer').hide();

        // Add an event listener to the Bid Money checkbox
        $('#bidMoneyCheckbox').change(function() {
            if ($(this).is(':checked')) {
                // If the Bid Money checkbox is checked, display the other checkboxes
                $('#otherCheckboxesContainer').show();
            } else {
                // If the Bid Money checkbox is unchecked, hide the other checkboxes
                $('#otherCheckboxesContainer').hide();
            }
        });
    });
    </script>

    <script>
    function toggleGrievanceDiv() {
        const grevCheckbox = document.getElementById("grev");
        const grevDiv = document.getElementById("grevCheckbox");

        if (grevCheckbox.checked) {
            grevDiv.style.display = "block";
        } else {
            grevDiv.style.display = "none";
        }
    }
    </script>

    <script>
    // POC Daily Sales Add Fields
    var room13 = 1;

    function poc_dailysales_add_fields() {

        room13++;
        var objTo = document.getElementById('poc_dailysales_add_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "first-col removeclass" + room13);
        var rdiv = 'removeclass' + room13;
        divtest.innerHTML =
            '<div class="row"> <div class="col-lg-4"> POC Name <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4"> POC Contact Number <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-2 spacing-left mt-4 mx-4"> <button type="button" class="remove-btn" onclick="poc_dailysales_remove_fields(' +
            room13 + ')">remove</button> </div></div>';
        objTo.appendChild(divtest)
    }

    function poc_dailysales_remove_fields(rid) {
        $('.removeclass' + rid).remove();
    }

    // Planning POC Add Fields
    var room15 = 1;

    function planning_poc_add_fields() {

        room15++;
        var objTo = document.getElementById('planning_poc_add_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "first-col removeclass" + room15);
        var rdiv = 'removeclass' + room15;
        divtest.innerHTML =
            '<div class="row"> <div class="col-lg-4"> POC Name <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4"> POC Contact Number <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-2 spacing-left mt-4 mx-4"> <button type="button" class="remove-btn" onclick="planning_poc_remove_fields(' +
            room15 + ')">remove</button> </div></div>';
        objTo.appendChild(divtest)
    }

    function planning_poc_remove_fields(rid) {
        $('.removeclass' + rid).remove();
    }

    //sales_address_add_fields
    var room12 = 1;

    function sales_address_add_fields() {

        room12++;
        var objTo = document.getElementById('sales_address_add_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "first-col removeclass" + room12);
        var rdiv = 'removeclass' + room12;
        divtest.innerHTML =
            ' <div class="row"> <div class="col-lg-6 spacing-right"> <div class="row mb-2"> <div class="col-lg-2 spacing-right"> Street <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> State <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> Country <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Region <br> <select id="hrm_type" class="form-control" name="hrmType" style="width: 100%;"> <option value="hrm_guard">region1</option> <option value="hrm_staff">region2</option> </select> </div> <div class="col-lg-3 spacing-left spacing-right"> City <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-2 spacing-left spacing-right"> Zip Code <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="form-control" type="text" placeholder="www.facebook.com/" style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="form-control" type="text" placeholder="www.skype.com/" style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="form-control" type="text" placeholder="www.twitter.com/" style="width: 100%;"> </div> </div> </div> <div class="col-lg-6 spacing-right"> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> Company <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-6 spacing-right"> Email <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> Fax <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div>  <div class="row mb-1"> <div class="col-lg-10 spacing-right"> website <br> <input class="form-control" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> Notes <br> <textarea style="width: 100%;" name="" id="" cols="15" rows="4"></textarea> </div> </div> </div> <div class="row"> <div class="col-lg-3" style="margin-left: 35%;"> <button type="button" class="remove-btn" style="width: 90%;" onclick="sales_address_remove_fields(' +
            room12 + ')">Remove Addresses</button> </div> </div> </div>';
        objTo.appendChild(divtest)
    }

    function sales_address_remove_fields(rid) {
        $('.removeclass' + rid).remove();
    }

    //dailysales_address_add_fields
    var room14 = 1;

    function dailysales_address_add_fields() {

        room14++;
        var objTo = document.getElementById('dailysales_address_add_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "first-col removeclass" + room14);
        var rdiv = 'removeclass' + room14;
        divtest.innerHTML =
            ' <div class="row"> <div class="col-lg-6 spacing-right"> <div class="row mb-2"> <div class="col-lg-2 spacing-right"> Street <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> State <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> Country <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Region <br> <select id="hrm_type" class="form-control" name="hrmType" style="width: 100%;"> <option value="hrm_guard">region1</option> <option value="hrm_staff">region2</option> </select> </div> <div class="col-lg-3 spacing-left spacing-right"> City <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-2 spacing-left spacing-right"> Zip Code <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="form-control" type="text" placeholder="www.facebook.com/" style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="form-control" type="text" placeholder="www.skype.com/" style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="form-control" type="text" placeholder="www.twitter.com/" style="width: 100%;"> </div> </div> </div> <div class="col-lg-6 spacing-right"> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> Company <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-6 spacing-right"> Email <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> Fax <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div>  <div class="row mb-1"> <div class="col-lg-10 spacing-right"> website <br> <input class="form-control" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> Notes <br> <textarea style="width: 100%;" name="" id="" cols="15" rows="4"></textarea> </div> </div> </div> <div class="row"> <div class="col-lg-3" style="margin-left: 35%;"> <button type="button" class="remove-btn" style="width: 90%;" onclick="dailysales_address_remove_fields(' +
            room14 + ')">Remove Addresses</button> </div> </div> </div>';
        objTo.appendChild(divtest)
    }

    function dailysales_address_remove_fields(rid) {
        $('.removeclass' + rid).remove();
    }

    // POC Lead Generation Details Add Fields
    var room11 = 1;

    function poc_add_fields() {

        room11++;
        var objTo = document.getElementById('poc_add_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "first-col removeclass" + room11);
        var rdiv = 'removeclass' + room11;
        divtest.innerHTML = '<div class="row"> <div class="col-lg-3"> POC Name ' + room11 +
            ' <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-3"> POC Contact Number ' +
            room11 +
            ' <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div>  <div class="col-lg-3"> Visiting Card ' +
            room11 +
            ' <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-2 spacing-left mt-4 mx-4"> <button type="button" class="remove-btn" onclick="poc_remove_fields(' +
            room11 + ')">remove</button> </div></div>';
        objTo.appendChild(divtest)
    }

    function poc_remove_fields(rid) {
        $('.removeclass' + rid).remove();
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- Script for validation on save button -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(document).ready(function() {
        var saveButtonClicked = false;

        $('#validateBtn').click(function() {
            console.log("Button clicked!");
            saveButtonClicked = true;

            var isValid = true;

            // Your validation logic here
            $('#prospectNo').each(function() {
                var trimmedValue = $.trim($(this).val());
                console.log(trimmedValue);
                if (trimmedValue === '') {
                    isValid = false;
                    return false;
                }
            });

            if (isValid) {
                $('#validationMessage').removeClass('text-danger').addClass('text-success').html(
                    '<strong>Success : Mandatory fields are valid and Saved..!</strong>');
                // enableTab();
            } else {
                $('#validationMessage').removeClass('text-success').addClass('text-danger').html(
                    '<strong>Prospect No is required..!</strong>');
                // disableTab();
            }
        });

        // Function to enable the tab if save button is clicked and all fields are valid
        // function enableTab() {
        //     if (saveButtonClicked) {
        //         $('#nav-contact-tab').removeClass('disabled');
        //         $('#nav-contact-tab').attr('data-toggle', 'tab');
        //     }
        // }

        // Function to disable the tab if any field is invalid or save button is not clicked
        // function disableTab() {
        //     $('#nav-contact-tab').addClass('disabled');
        //     $('#nav-contact-tab').removeAttr('data-toggle');
        // }
    });
    </script>

    <!-- Script For Add more Gaurd Services -->
    <script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory').on('click', function() {
            var SignatoryAccordionCount = $('#signatoryAccordion .signaccordion-item').length + 1;

            var newSignAccordion = `
                        <div class="accordion-item signaccordion-item" id="GuardEntry1${SignatoryAccordionCount}">
                            <h2 class="accordion-header" id="signatoryHeading${SignatoryAccordionCount}">
                                <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse${SignatoryAccordionCount}" aria-expanded="false" aria-controls="signatoryCollapse${SignatoryAccordionCount}">
                                    Guard Entry ${SignatoryAccordionCount}
                                </button>
                            </h2>
                            <div id="signatoryCollapse${SignatoryAccordionCount}" class="collapse" aria-labelledby="signatoryHeading${SignatoryAccordionCount}">
                            <div class="row row-fluid mx-2 mt-2 mb-2">

                                <div class="col-lg-6 spacing-left">
                                    Category <br>
                                    <select id="staff_category" class="form-control" name="guard_category[]"  style="width: 100%;">
                                        <option value="Armed Security Supervisor (Ex-Servicemen)">Armed Security Supervisor (Ex-Servicemen)</option>
                                        <option value="Armed Security Supervisor (Civil)">Armed Security Supervisor (Civil)</option>
                                        <option value="Unarmed Security Supervisor (Ex-Servicemen)">Unarmed Security Supervisor (Ex-Servicemen)</option>
                                        <option value="Unarmed Security Supervisor (Civil)">Unarmed Security Supervisor (Civil)</option>
                                        <option value="Armed Security Guard (Ex-Servicemen)">Armed Security Guard (Ex-Servicemen)</option>
                                        <option value="Armed Security Guard (Civil)">Armed Security Guard (Civil)</option>
                                        <option value="Unarmed Security Guard(Ex-Servicemen)">Unarmed Security Guard(Ex-Servicemen)</option>
                                        <option value="Unarmed Security Guard(Civil)">Unarmed Security Guard(Civil)</option>
                                        <option value="Close Protection Office/Executive Protective Officers">Close Protection Office/Executive Protective Officers</option>
                                        <option value="Lady Searcher">Lady Searcher</option>
                                        <option value="Male Searcher">Male Searcher</option>
                                        <option value="Bouncers">Bouncers</option>
                                        <option value="Project Head">Project Head</option>
                                        <option value="Security Manager">Security Manager</option>
                                        <option value="SSG">SSG</option>
                                        <option value="Male Facilitation Officer">Male Facilitation Officer</option>
                                        <option value="Female Facilitation Officer">Female Facilitation Officer</option>
                                        <option value="Escort Security Guard">Escort Security Guard</option>
                                        <option value="Baggae Scanner Operator">Baggae Scanner Operator</option>
                                        <option value="Sniper">Sniper</option>
                                        <option value="Traffic Controller">Traffic Controller</option>
                                        <option value="Ceremonial Guard">Ceremonial Guard</option>
                                        <option value="VIP Ceremonial Guard">VIP Ceremonial Guard</option>
                                        <option value="VVIP Ceremonial Guard">VVIP Ceremonial Guard</option>
                                        <option value="Fire Birgade">Fire Birgade</option>
                                        <option value="Paramedic Staff">Paramedic Staff</option>
                                        <option value="Security Facilitation Officers(SFO)">Security Facilitation Officers(SFO)</option>
                                        <option value="Guide">Guide</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Quantity : <br>
                                    <select id="leadcategory" class="form-control mt-1" name="guard_quantity[]"  style="width: 100%;">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 spacing-left">
                                    Shift Timing : <br>
                                    <select id="leadcategory" class="form-control mt-1" name="guard_shift_timing[]"  style="width: 100%;">
                                        <option value="1x">1x</option>
                                        <option value="2x">2x</option>
                                        <option value="3x">3x</option>
                                        <option value="4x">4x</option>
                                        <option value="5x">5x</option>
                                        <option value="6x">6x</option>
                                        <option value="7x">7x</option>
                                        <option value="8x">8x</option>
                                        <option value="9x">9x</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 spacing-right">
                                   Food by Client : <br>
                                    <select id="leadcategory" class="form-control mt-1" name="guard_food[]"  style="width: 100%;">
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 spacing-left">
                                    Accomodation By Client : <br>
                                    <select id="leadcategory" class="form-control mt-1" name="guard_accomodation[]"  style="width: 100%;">
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                     </select>
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Transportation by Client : <br>
                                    <select id="leadcategory" class="form-control mt-1" name="guard_transportation[]" style="width: 100%;">
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 spacing-left">
                                    Required on monthly basis : <br>
                                    <select id="monthlyRequirement" class="form-control mt-1" name="guard_required_monthly[]"  style="width: 100%;">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 spacing-right"  id="dailyRequirementSection">
                                    Required on dialy basis : <br>
                                    <select  id="dailyRequirement" class="form-control mt-1" name="guard_required_dialy[]" style="width: 100%;">
                                        <option value=""></option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 mt-1" id="noOfDays">
                                    No. of days Security Staff required for    <br>
                                    <input class="form-control" type="text" name="no_of_days_guard_required[]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6">
                                    Financial Working Excel Sheet <br> <input class="form-control mt-1"
                                        id="head_office_email" name="financial_working_excel_attach[]"  type="file"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6">
                                    Financial Working Word Sheet <br> <input class="form-control mt-1"
                                        id="head_office_email" name="financial_working_word_attach[]"  type="file"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6">
                                    Financial Working PDF Sheet <br> <input class="form-control mt-1"
                                        id="head_office_email" name="financial_working_pdf_attach[]"  type="file"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6">
                                    Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="guard_notes[]"  type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    Attachments <br> <input class="form-control mt-1" id="head_office_email" name="guard_attach[]"  type="file"   placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                                <button class="btn btn-danger btn-sm removeSignAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                            </div>
                        </div>
                    `;

            $('#signatoryAccordion').append(newSignAccordion);



        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion', function() {
            $(this).closest('.signaccordion-item').remove();
        });

    });
    </script>

    <!-- Script For Show data in table and Update Table of Gaurd servises -->
    <script>
    $(document).ready(function() {
        // Function to update summary table for Guard entries
        function updateSignatorySummaryTable() {
            // Clear existing rows
            $('#signatorySummaryTable tbody').empty();

            // Iterate through each gaurd accordion item and update the summary table
            $('.signaccordion-item').each(function(index) {
                var gCategory = $(this).find('[name="ay_other_d"]').val();
                var gQuality = $(this).find('[name="category"]').val();
                var gShift = $(this).find('[name="category"]').val();
                console.log(gShift);
                // Check if any relevant data is entered
                if (gCategory || gQuality || gShift) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable tbody').append(`
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${gCategory}</td>
                                    <td>${gQuality}</td>
                                    <td>${gShift}</td>
                                    <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                                    <!-- Add more columns as needed -->
                                </tr>
                            `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory').on('click', function() {
            var signatoryEntryCount = $('#signatoryAccordion .signaccordion-item').length + 1;

            var newSignatoryEntry = `
                        <!-- Your existing signatory accordion HTML goes here -->

                    `;
            console.log('Adding signatory entry:', signatoryEntryCount);
            $('#signatoryAccordion').append(newSignatoryEntry);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable').on('click', function() {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function() {
            $(this).closest('.signaccordion-item').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory').on('click', function(event) {
            event.preventDefault();
        });
    });
    </script>

    <!-- Script for Add more Vehicals -->
    <script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory2').on('click', function() {
            var SignatoryAccordionCount2 = $('#signatoryAccordion2 .signaccordion-item2').length + 1;

            var newSignAccordion2 = `
                <div class="accordion-item signaccordion-item2" id="signatoryEntry2${SignatoryAccordionCount2}">
                    <h2 class="accordion-header" id="signatoryHeading2${SignatoryAccordionCount2}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse2${SignatoryAccordionCount2}" aria-expanded="false" aria-controls="signatoryCollapse2${SignatoryAccordionCount2}">
                            Vehical Entry ${SignatoryAccordionCount2}
                        </button>
                    </h2>
                    <div id="signatoryCollapse2${SignatoryAccordionCount2}" class="collapse" aria-labelledby="signatoryHeading2${SignatoryAccordionCount2}">
                        <div class="accordion-body">
                            <div class="row mb-2" id="signatoryDetailsContainer">
                            <div class="col-lg-6 spacing-right">

                                                Ownership Status:<br>
                                                <div class="input-group" style="width: 100%;">
                                                    <select id="applicable_compliances" class="form-control mt-1" name="vehicle_ownership[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                        <option value=""></option>
                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="">
                                                            <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 form-group spacing-left">
                                                Types:<br>
                                                <div class="input-group" style="width: 100%;">
                                                    <select id="applicable_compliances" class="form-control mt-1" name="vehicle_type[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                        <option value=""></option>
                                                        <option value="Pilot Vehicle">Pilot Vehicle
                                                        </option>
                                                        <option value="Escort Vehicle">Escort Vehicle
                                                        </option>
                                                        <option value="Follow Up Vehicle">Follow Up
                                                            Vehicle</option>
                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="">
                                                            <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 form-group spacing-left">
                                                Category:<br>
                                                <div class="input-group" style="width: 100%;">
                                                    <select id="applicable_compliances" class="form-control mt-1" name="vehicle_category[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                        <option value=""></option>

                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="">
                                                            <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Required for : <br>
                                                <select id="leadcategory" name="vehicle_required[]" class="form-control mt-1"
                                                    style="width: 100%;">
                                                    <option value="">Monthly Basis</option>
                                                    <option value="">Daily Basis</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Monthly Maintenance Cost <br> <input class="form-control" name="vehicle_mantenance[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1 spacing-right">
                                                Fuel <br>

                                                <select id="fuel" name="vehicle_fuel[]" class="form-control mt-1 "
                                                    style="width: 100%;">
                                                    <option value="fuel_rate_1"> As per Actual</option>
                                                    <option value="fuel_rate_2"> Per Kilometer</option>
                                                </select>
                                            </div>
                                            <div>
                                                <div class="col-lg-6 mt-1 " id="fuel_rate_km" style="display:none;">
                                                </div>
                                                <div class="col-lg-6 mt-1 " id="fuel_rate_km_req" style="display:none;">
                                                    Rate Per Kilometer <br> <input class="form-control" name="vehicle_rate_per_km[]" type="text"
                                                        placeholder="..." style="width: 100%;">

                                                    Kilometer Required <br> <input class="form-control" name="vehicle_km_required[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-1 spacing-right">
                                                Tool Tax & Parking Charges <br>

                                                <select id="tooltax_dropdown" name="vehicle_toll[]" class="form-control mt-1 "
                                                    style="width: 100%;">
                                                    <option value="tool_actual"> As per Actual</option>
                                                    <option value="tool_km">Fixed</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 mt-1 " id="tooltax1" style="display:none;">
                                            </div>
                                            <div class="col-lg-6 mt-1 " id="tooltax2" style="display:none;">
                                                Tool Tax & Parking Charges: <br> <input class="form-control "
                                                    type="text" name="vehicle_tol[]" placeholder="..." style="width: 100%;">
                                            </div>

                                            <div class="col-lg-6 mt-1">
                                                Meter Reading at the start of the duty <br> <input class="form-control"
                                                    type="file" name="vehicle_meter_reading[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Picture of Meter Reading before duty <br> <input class="form-control"
                                                    type="file" name="vehicle_meter_picture[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Reporting Time <br> <input class="form-control" name="vehicle_reporting_time[]" type="time"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                            <!-- <div class="col-lg-6 mt-1 " id="reporting_address">
                                                        Reporting Address   <br>  <input class="form-control" name="vehicle_reporting_address[]" type="text" placeholder="..." style="width: 100%;">
                                                    </div> -->

                                            <div class="col-lg-6 mt-2 ml-3 ">
                                                <input class="form-check-input" name="vehicle_rep_office_no[]" type="checkbox"
                                                    id="reporting_address_check">
                                                <label class="form-check-label" for="check">Reporting Address</label>
                                            </div>




                                            <!-- Address Form -->
                                            <div class="container " id="reporting_address_form" style="display: none;">
                                            <div class="row row-cols-2">
                                                    <div class="col-lg-6 mt-1">
                                                        Office No <br> <input class="form-control" id=""
                                                            type="text" name="vehicle_rep_office_no[]" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 mt-1">
                                                        Floor <br> <input class="form-control" id="" name="vehicle_rep_floor[]" type="text"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 mt-1">
                                                        Building <br> <input class="form-control" id=""
                                                          name="vehicle_rep_building[]"  type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 mt-1">
                                                        Block <br> <input class="form-control" id=""  type="text" name="vehicle_rep_block[]"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 mt-1">
                                                        Area <br> <input class="form-control" id="" name="vehicle_rep_area[]"  type="text"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 mt-1">
                                                        City <br> <input class="form-control" id="" name="vehicle_rep_city[]"  type="text"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 mt-1">
                                                        Photograph of Building <br> <input class="form-control" id=""
                                                             type="file" name="vehicle_rep_picture[]" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 mt-1">
                                                        Pin location <br> <input class="form-control" id=""
                                                            type="text" name="vehicle_rep_location[]" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  -->

                                            <div class="col-lg-6 mt-1">
                                                Duty Start Date <br> <input class="form-control" type="date"
                                                    placeholder="..." name="vehicle_duty_start_date[]" style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Duty End Date <br> <input class="form-control" type="date"
                                                    placeholder="..." name="vehicle_duty_end_date[]" style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Duty Start Time <br> <input class="form-control" type="time"
                                                    placeholder="..." name="vehicle_duty_start_time[]" style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Duty End Time <br> <input class="form-control" type="time"
                                                    placeholder="..." name="vehicle_duty_end_time[]" style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Shift Duration <br> <input class="form-control" type="text"
                                                    placeholder="..." name="vehicle_shift_duration[]" style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                No. of Shifts <br> <input class="form-control" type="text"
                                                    placeholder="..." name="vehicle_no_of_shifts[]" style="width: 100%;">
                                            </div>


                                            <div class="col-lg-6 spacing-right mt-2 ml-3 ">
                                                <input class="form-check-input" type="checkbox" name="vehicle_req_with_driver[]" id="check_driver">
                                                <label class="form-check-label" for="check">Required with Driver</label>
                                            </div>



                                            <div class="col-lg-6 mt-1" id="food_driver" style="display: none;">

                                                Food For Driver By Client <br>
                                                <select id="tooltax_dropdown" name="vehicle_food_by_client[]" class="form-control mt-1 "
                                                    style="width: 100%;">
                                                    <option value="tool_actual"> Yes</option>
                                                    <option value="tool_km">No</option>
                                                </select>
                                            </div>




                                            <div class="col-lg-6 spacing-right mt-2 ml-3 ">
                                                <input class="form-check-input" type="checkbox" name="vehicle_req_with_security[]" id="check_staff">
                                                <label class="form-check-label" for="check">Required With Security
                                                    Staff</label>
                                            </div>

                                            <!-- Men Guarding Services Tab -->

                                            <div class="new-div" id="check_staff_Men_Guarding" style="display:none;">
                                                <div class="col-lg-12">
                                                    <div class="row mb-2">

                                                        <div class="col-lg-6 spacing-right">
                                                            Category <br>
                                                            <select id="staff_category" name="vehicle_guard_category[]" class="form-control"
                                                                 style="width: 100%;">
                                                                <option value="">Armed Security Supervisor
                                                                    (Ex-Servicemen)</option>
                                                                <option value="">Armed Security Supervisor (Civil)
                                                                </option>
                                                                <option value="">Unarmed Security Supervisor
                                                                    (Ex-Servicemen)</option>
                                                                <option value="">Unarmed Security Supervisor (Civil)
                                                                </option>
                                                                <option value="">Armed Security Guard (Ex-Servicemen)
                                                                </option>
                                                                <option value="">Armed Security Guard (Civil)</option>
                                                                <option value="">Unarmed Security Guard(Ex-Servicemen)
                                                                </option>
                                                                <option value="">Unarmed Security Guard(Civil)</option>
                                                                <option value="">Close Protection Office/Executive
                                                                    Protective Officers</option>
                                                                <option value="">Lady Searcher</option>
                                                                <option value="">Male Searcher</option>
                                                                <option value="">Bouncers</option>
                                                                <option value="">Project Head</option>
                                                                <option value="">Security Manager</option>
                                                                <option value="">SSG</option>
                                                                <option value="">Male Facilitation Officer</option>
                                                                <option value="">Female Facilitation Officer</option>
                                                                <option value="">Escort Security Guard</option>
                                                                <option value="">Baggae Scanner Operator</option>
                                                                <option value="">Sniper</option>
                                                                <option value="">Traffic Controller</option>
                                                                <option value="">Ceremonial Guard</option>
                                                                <option value="">VIP Ceremonial Guard</option>
                                                                <option value="">VVIP Ceremonial Guard</option>
                                                                <option value="">Fire Birgade</option>
                                                                <option value="">Paramedic Staff</option>
                                                                <option value="">Security Facilitation Officers(SFO)
                                                                </option>
                                                                <option value="">Guide</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 spacing-right">
                                                            Quantity : <br>

                                                            <select id="leadcategory" name="vehicle_guard_quantity[]" class="form-control mt-1"
                                                                 style="width: 100%;">
                                                                <option value="">1</option>
                                                                <option value="">2</option>
                                                                <option value="">3</option>
                                                                <option value="">4</option>
                                                                <option value="">5</option>
                                                                <option value="">6</option>
                                                                <option value="">7</option>
                                                                <option value="">8</option>
                                                                <option value="">9</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 spacing-right">
                                                            Shift Timing : <br>
                                                            <select id="leadcategory" name="vehicle_guard_shift_timing[]" class="form-control mt-1"
                                                                 style="width: 90%;">
                                                                <option value="">1x</option>
                                                                <option value="">2x</option>
                                                                <option value="">3x</option>
                                                                <option value="">4x</option>
                                                                <option value="">5x</option>
                                                                <option value="">6x</option>
                                                                <option value="">7x</option>
                                                                <option value="">8x</option>
                                                                <option value="">9x</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 spacing-right">
                                                            Food by Client : <br>
                                                            <select id="leadcategory" name="vehicle_guard_food_by_client[]" class="form-control mt-1"
                                                                 style="width: 90%;">
                                                                <option value="">Yes</option>
                                                                <option value="">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 spacing-right">
                                                            Accomodation By Client : <br>
                                                            <select id="leadcategory" name="vehicle_guard_accomodation[]" class="form-control mt-1"
                                                                 style="width: 90%;">
                                                                <option value="">Yes</option>
                                                                <option value="">No</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-6 spacing-right">
                                                            Transportation by Client : <br>
                                                            <select id="leadcategory" name="vehicle_guard_transportation[]" class="form-control mt-1"
                                                                 style="width: 90%;">
                                                                <option value="">Yes</option>
                                                                <option value="">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 spacing-right">
                                                            Required on monthly basis : <br>
                                                            <select id="leadcategory" name="vehicle_guard_req_monthly[]" class="form-control mt-1"
                                                                 style="width: 90%;">
                                                                <option value="">Yes</option>
                                                                <option value="">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 spacing-right">
                                                            Required on dialy basis : <br>
                                                            <select id="leadcategory" name="vehicle_guard_req_dialy[]" class="form-control mt-1"
                                                               style="width: 90%;">
                                                                <option value="">Yes</option>
                                                                <option value="">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 mt-1">
                                                            No. of days Security Staff required for <br> <input
                                                                class="form-control" name="vehicle_guard_no[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            Notes <br> <textarea class="form-control mt-1"
                                                                id="head_office_name" name="vehicle_guard_notes[]"  type="text"
                                                                placeholder="..." style="width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            Attachments <br> <input class="form-control mt-1"
                                                                id="head_office_email" name="vehicle_guard_attach[]"  type="file"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <!-- <button class="new-branch mt-2" onclick="removeNewDiv7()">Remove</button> -->
                                                    </div>
                                                </div>
                                            </div>

                                            <!--  -->
                                            <div class="col-lg-6">
                                                Notes <br> <textarea class="form-control mt-1" name="[]" id="head_office_name"
                                                     type="text" placeholder="..."
                                                    style="width: 100%;"></textarea>
                                            </div>
                                            <div class="col-lg-6">
                                                Attachments <br> <input class="form-control mt-1" name="[]" id="head_office_email"
                                                     type="file" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeSignAccordion2 mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion2').append(newSignAccordion2);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion2', function() {
            $(this).closest('.signaccordion-item2').remove();
        });
    });
    </script>

    <!-- Script For Show data in table and update table of Vehicals -->
    <script>
    $(document).ready(function() {
        // Function to update summary table for Vehicals entries
        function updateSignatorySummaryTable2() {
            // Clear existing rows
            $('#signatorySummaryTable2 tbody').empty();

            // Iterate through each gaurd accordion item and update the summary table
            $('.signaccordion-item2').each(function(index) {
                var OnerStatus = $(this).find('[name="oscategory"]').val();
                var types = $(this).find('[name="tcategory"]').val();
                var category = $(this).find('[name="ccategory"]').val();
                console.log(OnerStatus);
                console.log(types);
                console.log(category);
                // Check if any relevant data is entered
                if (OnerStatus || types || category) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable2 tbody').append(`
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${OnerStatus}</td>
                                    <td>${types}</td>
                                    <td>${category}</td>
                                    <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                                    <!-- Add more columns as needed -->
                                </tr>
                            `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory2').on('click', function() {
            var signatoryEntryCount2 = $('#signatoryAccordion2 .signaccordion-item2').length + 1;

            var newSignatoryEntry2 = `
                        <!-- Your existing signatory accordion HTML goes here -->

                    `;
            console.log('Adding signatory entry:', signatoryEntryCount2);
            $('#signatoryAccordion2').append(newSignatoryEntry2);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable2').on('click', function() {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable2();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item2').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function() {
            $(this).closest('.signaccordion-item2').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable2();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory2').on('click', function(event) {
            event.preventDefault();
        });
    });
    </script>

    <!-- Script for add more Canine -->
    <script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory3').on('click', function() {
            var SignatoryAccordionCount3 = $('#signatoryAccordion3 .signaccordion-item3').length + 1;

            var newSignAccordion3 = `
                <div class="accordion-item signaccordion-item3" id="signatoryEntry3${SignatoryAccordionCount3}">
                    <h2 class="accordion-header" id="signatoryHeading3${SignatoryAccordionCount3}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse3${SignatoryAccordionCount3}" aria-expanded="false" aria-controls="signatoryCollapse3${SignatoryAccordionCount3}">
                            Canine Entry ${SignatoryAccordionCount3}
                        </button>
                    </h2>
                    <div id="signatoryCollapse3${SignatoryAccordionCount3}" class="collapse" aria-labelledby="signatoryHeading3${SignatoryAccordionCount3}">
                        <div class="accordion-body">
                            <div class="row mb-2" id="signatoryDetailsContainer3">
                                <div class="col-lg-6 spacing-right">
                                    Required for : <br>
                                    <select id="req_leadcategory"
                                        class="form-control mt-1" name="canine_req_for[]"
                                        style="width: 100%;">
                                        <option value="MonthlyBasis">Monthly Basis
                                        </option>
                                        <option value="DailyBasis">Daily Basis</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group spacing-left">
                                    Category:<br>
                                    <div class="input-group" style="width: 100%;">
                                        <select id="applicable_compliances" class="form-control mt-1" name="canine_category[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                            <option value=""></option>
                                        </select>
                                        <div class="input-group-append" style="width: 30%;">
                                            <a href="">
                                                <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-1" id="noOfDaysDogs">
                                    No. of days Dogs Require for <br> <input
                                        class="form-control" type="text" name="canine_req_for_days[]"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Color of Dog <br> <input class="form-control"
                                        type="text" placeholder="..." name="canine_color[]"
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    No. of Dog(s) <br> <input class="form-control"

                                        type="text" placeholder="..." name="canine_no[]"
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Required with Handler : <br>
                                    <select id="req_handler_leadcategory" name="canine_req_handler[]"
                                        class="form-control mt-1"
                                        style="width: 100%;">
                                        <option value="">select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 mt-1" id="nameOFHandler">
                                    Name of Handler <br> <input class="form-control"
                                        type="text" name="canine_handler_name[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1" id="cnicOFHandler">
                                    CNIC <br> <input class="form-control" name="canine_handler_cnic_no[]" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1" id="ageOFHandler">
                                    Age <br> <input class="form-control" name="canine_handler_age[]" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1" id="experienceOFHandler">
                                    Experience <br> <input class="form-control"
                                        type="text" name="canine_handler_exp[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1" id="cellNoOFHandler">
                                    Cell Number <br> <input class="form-control"
                                        type="text" name="canine_handler_cell[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1" id="cnicFrontOFHandler">
                                    CNIC Front <br> <input class="form-control"
                                        type="file" name="canine_handler_cnic_front[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1" id="cnicBackOFHandler">
                                    CNIC Back <br> <input class="form-control"
                                        type="file" name="canine_handler_cnic_back[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Duty Start Date <br> <input class="form-control"
                                        type="date" name="canine_duty_start_date[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Duty End Date <br> <input class="form-control"
                                        type="date" name="canine_duty_end_date[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Duty Start Time <br> <input class="form-control"
                                        type="time" name="canine_duty_start_time[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Duty End Time <br> <input class="form-control"
                                        type="time" name="canine_duty_end_time[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Shift Duration <br> <input class="form-control"
                                        type="text" name="canine_shift_duration[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    No. of Shifts <br> <input class="form-control"
                                        type="text" name="canine_no_of_shifts[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Picture of Dogs <br> <input class="form-control"
                                        type="file" name="canine_pic_of_dogs[]" multiple placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6">
                                    Notes <br> <textarea class="form-control mt-1"
                                        id="head_office_name"
                                        type="text" name="canine_notes[]" placeholder="..."
                                        style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    Attachments <br> <input class="form-control mt-1"
                                        id="head_office_email"
                                        type="file" name="canine_attach[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeSignAccordion3 mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion3').append(newSignAccordion3);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion3', function() {
            $(this).closest('.signaccordion-item3').remove();
        });
    });
    </script>


    <!-- Script for show data in table and update table of canine services -->
    <script>
    $(document).ready(function() {
        // Function to update summary table for signatory entries
        function updateSignatorySummaryTable3() {
            // Clear existing rows
            $('#signatorySummaryTable3 tbody').empty();

            // Iterate through each signatory accordion item and update the summary table
            $('.signaccordion-item3').each(function(index) {
                var reqFor = $(this).find('[name="reqFor"]').val();
                var colorOfDog = $(this).find('[name="colorOfDog"]').val();
                var noOfDog = $(this).find('[name="noOfDog"]').val();

                // Check if any relevant data is entered
                if (reqFor || colorOfDog || noOfDog) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable3 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${reqFor}</td>
                            <td>${colorOfDog}</td>
                            <td>${noOfDog}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button"style="width: 100%" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory3').on('click', function() {
            var signatoryEntryCount3 = $('#signatoryAccordion3 .signaccordion-item3').length + 1;

            var newSignatoryEntry3 = `
                <!-- Your existing signatory accordion HTML goes here -->
            `;
            console.log('Adding signatory entry:', signatoryEntryCount3);
            $('#signatoryAccordion3').append(newSignatoryEntry3);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable3').on('click', function() {
            // Update the signatory summary table
            updateSignatorySummaryTable3();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item3').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion3', function() {
            $(this).closest('.signaccordion-item3').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable3();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory3').on('click', function(event) {
            event.preventDefault();
        });
    });
    </script>

    <!-- Script for add more Facilitation Services -->
    <script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory4').on('click', function() {
            var SignatoryAccordionCount4 = $('#signatoryAccordion4 .signaccordion-item4').length + 1;

            var newSignAccordion4 = `
                <div class="accordion-item signaccordion-item4" id="signatoryEntry4${SignatoryAccordionCount4}">
                    <h2 class="accordion-header" id="signatoryHeading4${SignatoryAccordionCount4}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse4${SignatoryAccordionCount4}" aria-expanded="false" aria-controls="signatoryCollapse4${SignatoryAccordionCount4}">
                            Facilitation Entry ${SignatoryAccordionCount4}
                        </button>
                    </h2>
                    <div id="signatoryCollapse4${SignatoryAccordionCount4}" class="collapse" aria-labelledby="signatoryHeading4${SignatoryAccordionCount4}">
                        <div class="accordion-body">
                            <div class="row mb-2" id="signatoryDetailsContainer">
                                <div class="col-lg-6 mt-1">
                                    Guest Arrival Time <br> <input class="form-control"
                                         type="time" name="guest_arrival_time[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Security Team Reporting Time <br> <input
                                        class="form-control" name="security_reporting_time[]" type="time"
                                         placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    PhotoGraph of Guest <br> <input class="form-control"
                                        type="file" name="photograph_of_guest[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    PhotoGraph of Passport <br> <input
                                        class="form-control" name="photograph_of_passport[]" type="file"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Nationality of Guest <br> <input
                                        class="form-control" name="nationality_of_guest[]" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-4 spacing-right"
                                    id="ssReportingLocation">
                                    <input class="form-check-input" name="security_staff_rep_loc[]" type="checkbox">
                                    <label class="form-check-label" for="check">Security
                                        Staff Reporting
                                        Location</label>
                                </div>
                                <div class="col-lg-6 mt-2 ml-3 ">
                                    <input class="form-check-input" name="airline_details[]" type="checkbox"
                                        id="airline_check">
                                    <label class="form-check-label" for="check">AirLine
                                        Details</label>
                                </div>
                                <div id="airline_check_form" class="container"
                                    style="display: none;">
                                    <div class="row row-cols-2">
                                        <div class="col-lg-6 mt-1">
                                            Name Of AirLine: <br> <input
                                                class="form-control" name="name_of_airline[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Contact Number Of AirLine <br> <input
                                                class="form-control" name="contact_of_airline[]" type="number"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Email Of AirLine <br> <input
                                                class="form-control" name="email_of_airline[]" type="email"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Website Of AirLine <br> <input
                                                class="form-control" name="web_of_airline[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-2 ml-3 ">
                                    <input class="form-check-input" name="poc_of_airline[]" type="checkbox"
                                        id="POC_check">
                                    <label class="form-check-label" for="check">POC of
                                        Airline</label>
                                </div>
                                <div class="container" id="POC_check_form"
                                    style="display: none;">
                                    <div class="row row-cols-2">
                                        <div class="col-lg-12"> Address of POC of
                                            Airline:</div>
                                        <div class="col-lg-6 spacing-right">
                                            POC Name <br> <input class="form-control"
                                                type="text" name="facility_poc_name[]" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 spacing-right">
                                            POC Designation <br> <input
                                                class="form-control" name="facility_poc_desig[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 spacing-right">
                                            POC Contact No <br> <input
                                                class="form-control" name="facility_poc_contact[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 spacing-right">
                                            POC Email <br> <input class="form-control"
                                                 type="text" name="facility_poc_email[]" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 spacing-right">
                                            Office No <br> <input class="form-control"
                                                 type="text" name="facility_poc_office[]" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 spacing-right">
                                            Floor <br> <input class="form-control" id=""
                                                 type="text" name="facility_poc_floor[]" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 spacing-right">
                                            Building <br> <input class="form-control"
                                                 type="text" name="facility_poc_building[]" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 spacing-right">
                                            Block <br> <input class="form-control"
                                                 type="text" name="facility_poc_block[]" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 spacing-right">
                                            Area <br> <input class="form-control"
                                                 type="text" name="facility_poc_area[]" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 spacing-right">
                                            City <br> <input class="form-control"
                                                 type="text" name="facility_poc_city[]" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 spacing-right">
                                            Photograph of Building <br> <input
                                                class="form-control" id=""
                                                type="file" name="facility_poc_building_photo[]" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 spacing-right">
                                            Pin location <br> <input
                                                class="form-control" id=""
                                                type="text" name="facility_poc_loc[]" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                    </div>
                                </div>

                                <!--  -->
                                <div class="col-lg-6 mt-1">
                                    Flight Number <br> <input class="form-control"
                                        type="text" name="flight_number[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Flying from which Country <br> <input
                                        class="form-control" name="flying_from[]" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Guest/Focal Person Contact Number <br> <input
                                        class="form-control" name="guest_number[]" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Copy Of Guest Ticket <br> <input
                                        class="form-control" name="copy_of_guest_ticket[]" type="file"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Copy of Guest Visa <br> <input class="form-control"
                                        type="file" name="copy_of_guest_visa[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Guest Travelling Schedule <br> <input
                                        class="form-control" name="guest_schedule[]" type="file"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <h5 class="mt-1">Baggage Details :</h5>
                                <div class="col-lg-6 spacing-right">
                                    Hand Carry : <br>
                                    <select id="leadcategory" name="hand_carry[]" class="form-control mt-1"
                                         style="width: 100%;">
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Weight <br> <input class="form-control" name="luggage_weight[]" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Tag Number of Booked Luggage <br> <input
                                        class="form-control" name="tag_number[]" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Color of Bags <br> <input class="form-control"
                                        type="text" name="color_of_bags[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Weight of Bags <br> <input class="form-control"
                                        type="text" name="weight_of_bags[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Picture of Bags <br> <input class="form-control"
                                        type="file" name="picture_of_bags[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6">
                                    Notes <br> <textarea class="form-control mt-1"
                                        id="head_office_name"
                                        type="text" name="facilitation_notes[]" placeholder="..."
                                        style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    Attachments <br> <input class="form-control mt-1"
                                        id="head_office_email" name="facilitation_attach[]"
                                        type="file" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeSignAccordion4 mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion4').append(newSignAccordion4);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion4', function() {
            $(this).closest('.signaccordion-item4').remove();
        });
    });
    </script>

    <!-- Script for show data in table and update of Facilitation Services -->
    <script>
    $(document).ready(function() {
        // Function to update summary table for signatory entries
        function updateSignatorySummaryTable4() {
            // Clear existing rows
            $('#signatorySummaryTable4 tbody').empty();

            // Iterate through each signatory accordion item and update the summary table
            $('.signaccordion-item4').each(function(index) {
                var gATime = $(this).find('[name="gATime"]').val();
                var sTeamRepoTime = $(this).find('[name="sTeamRepoTime"]').val();
                var nOfGuest = $(this).find('[name="nOfGuest"]').val();

                // Check if any relevant data is entered
                if (gATime || sTeamRepoTime || nOfGuest) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable4 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${gATime}</td>
                            <td>${sTeamRepoTime}</td>
                            <td>${nOfGuest}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory4').on('click', function() {
            var signatoryEntryCount4 = $('#signatoryAccordion4 .signaccordion-item4').length + 1;

            var newSignatoryEntry4 = `
                <!-- Your existing signatory accordion HTML goes here -->
            `;
            console.log('Adding signatory entry:', signatoryEntryCount4);
            $('#signatoryAccordion4').append(newSignatoryEntry4);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable4').on('click', function() {
            // Update the signatory summary table
            updateSignatorySummaryTable4();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item4').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion4', function() {
            $(this).closest('.signaccordion-item4').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable4();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory4').on('click', function(event) {
            event.preventDefault();
        });
    });
    </script>

    <!-- Script for add more Facilitation Services (private jet) -->
    <script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory4_1').on('click', function() {
            var SignatoryAccordionCount4_1 = $('#signatoryAccordion4_1 .signaccordion-item4_1').length +
                1;

            var newSignAccordion4_1 = `
        <div class="accordion-item signaccordion-item4_1" id="signatoryEntry4_1${SignatoryAccordionCount4_1}">
            <h2 class="accordion-header" id="signatoryHeading4_1${SignatoryAccordionCount4_1}">
                <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse4_1${SignatoryAccordionCount4_1}" aria-expanded="false" aria-controls="signatoryCollapse4_1${SignatoryAccordionCount4_1}">
                    Private Jet Entry ${SignatoryAccordionCount4_1}
                </button>
            </h2>
            <div id="signatoryCollapse4_1${SignatoryAccordionCount4_1}" class="collapse" aria-labelledby="signatoryHeading4_1${SignatoryAccordionCount4_1}">
                <div class="accordion-body">
                    <div class="row mb-2" id="signatoryDetailsContainer4_1">
                        <!-- Your content for entry goes here -->
                        <div class="col-lg-6 mt-1">
                            No. of Days Private Jet Required for <br> <input
                                class="form-control" name="no_of_days_private_jet[]" type="text"
                                placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Fuel <br>
                            <select id="leadcategoryfuel" name="fuel_for_private_jet[]" class="form-control mt-1"
                                 style="width: 100%;">
                                <option value="">select</option>
                                <option value="As Per Actual">As Per Actual</option>
                                <option value="As Per Kilometer">As Per Kilometer
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-12 mt-1 spacing-right" id="rateOfFuel">
                            Rate of Fuel per Kilometer <br> <input
                                class="form-control" name="rate_of_fuel_for_jet[]" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm removeSignAccordion4_1 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
            </div>
        </div>
        `;

            $('#signatoryAccordion4_1').append(newSignAccordion4_1);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion4_1', function() {
            $(this).closest('.signaccordion-item4_1').remove();
        });
    });
    </script>

    <!-- Script for show data in table and update of Facilitation Services (private jet) -->
    <script>
    $(document).ready(function() {
        // Function to update summary table for signatory entries
        function updateSignatorySummaryTable4_1() {
            // Clear existing rows
            $('#signatorySummaryTable4_1 tbody').empty();

            // Iterate through each signatory accordion item and update the summary table
            $('.signaccordion-item4_1').each(function(index) {
                var no_of_days_req_jet = $(this).find('[name="noOfDaysReqJet"]').val();
                var fuel = $(this).find('[name="fuel"]').val();
                var rete_of_fuel_per_kilo_M = $(this).find('[name="rateOfFuelPerKiloM"]').val();

                // Check if any relevant data is entered
                if (no_of_days_req_jet || fuel || rete_of_fuel_per_kilo_M) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable4_1 tbody').append(`
                <tr>
                    <td>${index + 1}</td>
                    <td>${no_of_days_req_jet}</td>
                    <td>${fuel}</td>
                    <td>${rete_of_fuel_per_kilo_M}</td>
                    <td><button type="button" class="btn btn-primary view-signatory-button4_1" style="width: 100%" data-index="${index}">View</button></td>
                </tr>
            `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory4_1').on('click', function() {
            var signatoryEntryCount4_1 = $('#signatoryAccordion4_1 .signaccordion-item4_1').length + 1;

            var newSignatoryEntry4_1 = `
        <!-- Your existing signatory accordion HTML goes here, adjusted for 4_1 -->
        `;
            console.log('Adding signatory entry:', signatoryEntryCount4_1);
            $('#signatoryAccordion4_1').append(newSignatoryEntry4_1);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable4_1').on('click', function() {
            // Update the signatory summary table
            updateSignatorySummaryTable4_1();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button4_1', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item4_1').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion4_1', function() {
            $(this).closest('.signaccordion-item4_1').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable4_1();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory4_1').on('click', function(event) {
            event.preventDefault();
        });
    });
    </script>

    <!-- Script for add more event Services -->
    <script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory5').on('click', function() {
            var SignatoryAccordionCount5 = $('#signatoryAccordion5 .signaccordion-item5').length + 1;

            var newSignAccordion5 = `
            <div class="accordion-item signaccordion-item5" id="signatoryEntry5${SignatoryAccordionCount5}">
                <h2 class="accordion-header" id="signatoryHeading5${SignatoryAccordionCount5}">
                    <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse5${SignatoryAccordionCount5}" aria-expanded="false" aria-controls="signatoryCollapse5${SignatoryAccordionCount5}">
                        Event Entry ${SignatoryAccordionCount5}
                    </button>
                </h2>
                <div id="signatoryCollapse5${SignatoryAccordionCount5}" class="collapse" aria-labelledby="signatoryHeading5${SignatoryAccordionCount5}">
                    <div class="accordion-body">
                        <div class="row mb-2" id="signatoryDetailsContainer5">
                            <div class="row mb-2">
                                <div class="col-lg-6 spacing-right" id="Owner">
                                    Ownership Status : <br>
                                    <select id="Ownership_yes" name="ownership_status[]"
                                        class="form-control mt-1"
                                        style="width: 100%;">
                                        <option value="Company Owned">Company Owned
                                        </option>
                                        <option value="OutSourced">OutSourced
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Required for : <br>
                                    <select id="leadcategory" name="event_req_for[]"
                                        class="form-control mt-1"
                                        style="width: 100%;">
                                        <option value="Daily">Daily</option>
                                        <option value="Monthly">Monthly</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 mt-1">
                                    No of days Security Staff Required for <br>
                                    <input class="form-control" name="event_no_of_staff[]"
                                         type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Duty Start Date <br> <input class="form-control"
                                        type="date" name="event_duty_start_date[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Duty End Date <br> <input class="form-control"
                                        type="date" name="event_duty_end_date[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Duty Start Time <br> <input class="form-control"
                                        type="time" name="event_duty_start_time[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Duty End Time <br> <input class="form-control"
                                        type="time" name="event_duty_end_time[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Shift Duration <br> <input class="form-control"
                                        type="text" name="event_shift_duration[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1 spacing-right">
                                    Shift Type : <br>
                                    <select id="leadcategory" name="event_shift_type[]"
                                        class="form-control mt-1"
                                        style="width: 100%;">
                                        <option value="">Day Shift</option>
                                        <option value="">Night Shift</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 mt-1">
                                    No. of Shifts <br> <input class="form-control"
                                        type="text" name="event_no_of_shifts[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-2 ml-3 ">
                                    <input class="form-check-input" name="event_reporting_location[]" type="checkbox"
                                        id="reporting_location_check">
                                    <label class="form-check-label"
                                        for="check">Reporting Location</label>
                                </div>
                                <!-- Address -->
                                <div class="container " id="reporting_location_form"
                                    style="display: none;">
                                    <div class="row row-cols-2">
                                        <div class="col-lg-6 mt-1">
                                            Office No <br> <input
                                                class="form-control" id=""
                                                type="text" name="event_office_no[]" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Floor <br> <input class="form-control"
                                                id="" name="event_floor[]" type="text"
                                                placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Building <br> <input
                                                class="form-control" id=""
                                                type="text" name="event_building[]" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Block <br> <input class="form-control"
                                                id="" name="event_block[]"  type="text"
                                                placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Area <br> <input class="form-control"
                                                id="" name="event_area[]" type="text"
                                                placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            City <br> <input class="form-control"
                                                id="" name="event_city[]" type="text"
                                                placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Photograph of Building <br> <input
                                                class="form-control" id=""
                                                type="file" name="event_photo[]" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Pin location <br> <input
                                                class="form-control" id=""
                                                type="text" name="event_loc[]" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="col-lg-6 mt-1">
                                    Event Date <br> <input class="form-control"
                                        type="date" name="event_date[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Event Venue <br> <input class="form-control"
                                        type="file" name="event_venue[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6">
                                    Deployment Plan <br> <input
                                        class="form-control mt-1"
                                        id="head_office_email"
                                        type="file" name="event_deployment_plan[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6">
                                    Notes <br> <textarea class="form-control mt-1"
                                        id="head_office_name"
                                        type="text" name="event_security_notes[]" placeholder="..."
                                        style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    Attachments <br> <input
                                        class="form-control mt-1"
                                        id="head_office_email"
                                        type="file" name="event_security_attach[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <!-- Escort Services Form -->
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger btn-sm removeSignAccordion5 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
                </div>
            </div>
        `;

            $('#signatoryAccordion5').append(newSignAccordion5);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion5', function() {
            $(this).closest('.signaccordion-item5').remove();
        });
    });
    </script>

    <!-- Script for show data in table and update of event Services -->
    <script>
    $(document).ready(function() {
        // Function to update summary table for signatory entries
        function updateSignatorySummaryTable5() {
            // Clear existing rows
            $('#signatorySummaryTable5 tbody').empty();

            // Iterate through each signatory accordion item and update the summary table
            $('.signaccordion-item5').each(function(index) {
                var owner_ship_s = $(this).find('[name="ownershipS"]').val();
                var required_For = $(this).find('[name="requiredFor"]').val();
                var no_Of_Days_Staff_R = $(this).find('[name="noOfDaysStaffR"]').val();

                // Check if any relevant data is entered
                if (owner_ship_s || required_For || no_Of_Days_Staff_R) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable5 tbody').append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${owner_ship_s}</td>
                        <td>${required_For}</td>
                        <td>${no_Of_Days_Staff_R}</td>
                        <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                        <!-- Add more columns as needed -->
                    </tr>
                `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory5').on('click', function() {
            var signatoryEntryCount5 = $('#signatoryAccordion5 .signaccordion-item5').length + 1;

            var newSignatoryEntry5 = `
            <!-- Your existing signatory accordion HTML goes here -->
        `;
            console.log('Adding signatory entry:', signatoryEntryCount5);
            $('#signatoryAccordion5').append(newSignatoryEntry5);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable5').on('click', function() {
            // Update the signatory summary table
            updateSignatorySummaryTable5();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item5').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion5', function() {
            $(this).closest('.signaccordion-item5').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable5();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory5').on('click', function(event) {
            event.preventDefault();
        });
    });
    </script>

    <!-- Script for add more secuirty consultancy Services -->
    <script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory6').on('click', function() {
            var SignatoryAccordionCount6 = $('#signatoryAccordion6 .signaccordion-item6').length + 1;

            var newSignAccordion6 = `
        <div class="accordion-item signaccordion-item6" id="signatoryEntry6${SignatoryAccordionCount6}">
            <h2 class="accordion-header" id="signatoryHeading6${SignatoryAccordionCount6}">
                <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse6${SignatoryAccordionCount6}" aria-expanded="false" aria-controls="signatoryCollapse6${SignatoryAccordionCount6}">
                    Secuirty Consultancy Entry ${SignatoryAccordionCount6}
                </button>
            </h2>
            <div id="signatoryCollapse6${SignatoryAccordionCount6}" class="collapse" aria-labelledby="signatoryHeading6${SignatoryAccordionCount6}">
                <div class="accordion-body">
                    <div class="row mb-2" id="signatoryDetailsContainer6">
                        <!-- Your content for entry goes here -->
                        <div class="col-lg-6 form-group spacing-left">
                            Category:<br>
                            <div class="input-group" style="width: 100%;">
                                <select id="applicable_compliances" name="consultancy_category[]" class="form-control mt-1"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                    <option value="Security Planning">Security
                                        Planning</option>
                                    <option value="Risk Analysis">Risk Analysis
                                    </option>
                                    <option value="HSSE Survey">HSSE Survey</option>
                                    <option value="Security Training">Security
                                        Training</option>
                                    <option value="MEE TOO & Imitate Brand">MEE TOO
                                        & Imitate Brand
                                    </option>
                                </select>
                                <div class="input-group-append" style="width: 30%;">
                                    <a href="">
                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            Scope of Work <br> <input class="form-control mt-1"
                                id="" name="scope_of_work[]" type="file"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Internal Deadline:<br> <input
                                class="form-control" name="internal_deadline[]" type="date"
                                 placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1 ">
                            Date of Submission of Report <br> <input
                                class="form-control mt-1" name="consultancy_date_of_submission[]" id=""
                                type="date"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Notes <br> <textarea class="form-control mt-1"
                                id="head_office_name" name="consultancy_notes[]"
                                type="text" placeholder="..."
                                style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-6 mt-1">
                            Attachements <br> <input class="form-control"
                                type="file" name="consultancy_attach[]" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm removeSignAccordion6 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
            </div>
        </div>
        `;

            $('#signatoryAccordion6').append(newSignAccordion6);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion6', function() {
            $(this).closest('.signaccordion-item6').remove();
        });
    });
    </script>

    <!-- Script for show data in table and update of secuirty consultancy Services -->
    <Script>
    $(document).ready(function() {
        // Function to update summary table for signatory entries
        function updateSignatorySummaryTable6() {
            // Clear existing rows
            $('#signatorySummaryTable6 tbody').empty();

            // Iterate through each signatory accordion item and update the summary table
            $('.signaccordion-item6').each(function(index) {
                var category_of_sec = $(this).find('[name="categoryOfSecuirty"]').val();
                var scope_of_work = $(this).find('[name="scopeOfWork"]').val();
                var date_of_submittion = $(this).find('[name="dateOfSubmittion"]').val();

                // Check if any relevant data is entered
                if (category_of_sec || scope_of_work || date_of_submittion) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable6 tbody').append(`
                <tr>
                    <td>${index + 1}</td>
                    <td>${category_of_sec}</td>
                    <td>${scope_of_work}</td>
                    <td>${date_of_submittion}</td>
                    <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                    <!-- Add more columns as needed -->
                </tr>
            `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory6').on('click', function() {
            var signatoryEntryCount6 = $('#signatoryAccordion6 .signaccordion-item6').length + 1;

            var newSignatoryEntry6 = `
        <!-- Your existing signatory accordion HTML goes here -->
        `;
            console.log('Adding signatory entry:', signatoryEntryCount6);
            $('#signatoryAccordion6').append(newSignatoryEntry6);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable6').on('click', function() {
            // Update the signatory summary table
            updateSignatorySummaryTable6();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item6').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion6', function() {
            $(this).closest('.signaccordion-item6').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable6();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory6').on('click', function(event) {
            event.preventDefault();
        });
    });
    </Script>


    <!-- Script for add more Fire fighting Services -->
    <script>
        $(document).ready(function() {
            // Add More Button Click Event
            $('#addSignatory7').on('click', function() {
                var SignatoryAccordionCount7 = $('#signatoryAccordion7 .signaccordion-item7').length + 1;

                var newSignAccordion7 = `
            <div class="accordion-item signaccordion-item7" id="signatoryEntry7${SignatoryAccordionCount7}">
                <h2 class="accordion-header" id="signatoryHeading7${SignatoryAccordionCount7}">
                    <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse7${SignatoryAccordionCount7}" aria-expanded="false" aria-controls="signatoryCollapse7${SignatoryAccordionCount7}">
                    Active Fire Equipment Entry ${SignatoryAccordionCount7}
                    </button>
                </h2>
                <div id="signatoryCollapse7${SignatoryAccordionCount7}" class="collapse" aria-labelledby="signatoryHeading7${SignatoryAccordionCount7}">
                    <div class="accordion-body">
                        <div class="row mb-2" id="signatoryDetailsContainer7">
                                                                            <div class="row mb-2">
                                                                                <div class="col-lg-3 spacing-right">
                                                                                    Fire Class: <br>
                                                                                    <select class="form-control mt-1"
                                                                                        style="width: 100%;" name="fireClass[]" id="categoryOfEquipment" >
                                                                                        <option value=" "></option>
                                                                                        <option value="ClassA" id="classA">Class A – Flammable Materials (e.g. Paper & Wood)</option>
                                                                                        <option value="ClassB" id="classB">Class B – Flammable Liquid (e.g. Paint & Petrol)</option>
                                                                                        <option value="ClassC" id="classC">Class C – Flammable Gasses (e.g. Butane & Methane)</option>
                                                                                        <option value="ClassD" id="classD">Class D – Flammable Metals (e.g. Lithium & Potassium)</option>
                                                                                        <option value="ClassE" id="classE">Class E – Electrical Equipment (e.g. Computers & Generators)</option>
                                                                                        <option value="ClassF" id="classF">Class F – Cooking Fats and Oils (e.g. Fryers & Chip Pans)</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-lg-12 spacing-right" id="classAContent" style="display:none">
                                                                                    <div class="row mt-2">
                                                                                        <h5>Cylinder Type</h5>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="waterCylinder[]" id="checkbox1">
                                                                                            <label for="checkbox1">Water Cylinder</label>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="dryChemical[]" id="checkbox2">
                                                                                            <label for="checkbox2">Dry Chemical Powder BE </label>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="CoTwo[]" id="checkbox3">
                                                                                            <label for="checkbox3">Carbon Dioxide CO2 </label>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="foam[]" id="checkbox4">
                                                                                            <label for="checkbox4">Foam</label>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="wetChemical[]" id="checkbox5">
                                                                                            <label for="checkbox5">Wet Chemical</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12 spacing-right" id="classBContent" style="display:none;">
                                                                                    <div class="row mt-2">
                                                                                        <h5>Cylinder Type</h5>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="dryChemicalAbe[]" id="checkbox1">
                                                                                            <label for="checkbox1">Dry Chemical Powder ABE</label>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="dryChemicalBe[]" id="checkbox2">
                                                                                            <label for="checkbox2">Dry Chemical Powder BE </label>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="Co2[]" id="checkbox3">
                                                                                            <label for="checkbox3">Carbon Dioxide CO2 </label>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="foam2[]" id="checkbox4">
                                                                                            <label for="checkbox4">Foam</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12 spacing-right" id="classCContent" style="display:none;">
                                                                                    <div class="row mt-2">
                                                                                        <h5>Cylinder Type</h5>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="dryChemicalPowderABE[]" id="checkbox1">
                                                                                            <label for="checkbox1">Dry Chemical Powder ABE</label>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="dryChemicalPowderBE[]" id="checkbox2">
                                                                                            <label for="checkbox2">Dry Chemical Powder BE </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12 spacing-right" id="classDContent" style="display:none;">
                                                                                    <div class="row mt-2">
                                                                                        <h5>Cylinder Type</h5>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="dryChemicalPowderABE1[]" id="checkbox1">
                                                                                            <label for="checkbox1">Dry Chemical Powder ABE</label>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="dryChemicalPowderBE1[]" id="checkbox2">
                                                                                            <label for="checkbox2">Dry Chemical Powder BE </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12 spacing-right" id="classEContent" style="display:none;">
                                                                                    <div class="row mt-2">
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="dryChemicalPowderABE2[]" id="checkbox1">
                                                                                            <label for="checkbox1">Dry Chemical Powder ABE</label>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="dryChemicalPowderBE2[]" id="checkbox2">
                                                                                            <label for="checkbox2">Dry Chemical Powder BE </label>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="cd2[]" id="checkbox2">
                                                                                            <label for="checkbox2">Carbon Dioxide CO2</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12 spacing-right" id="classFContent" style="display:none;">
                                                                                    <div class="row mt-2">
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="dryChemicalPowderBE3[]" id="checkbox2">
                                                                                            <label for="checkbox2">Dry Chemical Powder BE </label>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="foam3[]" id="checkbox1">
                                                                                            <label for="checkbox1">Foam</label>
                                                                                        </div>
                                                                                        <div class="col-lg-2">
                                                                                            <input type="checkbox" input="wetChemical2[]" id="checkbox2">
                                                                                            <label for="checkbox2">Wet Chemical</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3 spacing-right">
                                                                                    Equipment Name : <br>
                                                                                    <input class="form-control"
                                                                                    type="text" name="fire_equipment_name[]" placeholder="..."
                                                                                    style="width: 100%;">
                                                                                </div>
                                                                                <div class="col-lg-3 spacing-right">
                                                                                    Cylinder Size : <br>
                                                                                    <input class="form-control"
                                                                                        type="text" name="fire_cylinder_type[]" placeholder="..."
                                                                                        style="width: 100%;">
                                                                                </div>
                                                                                <div class="col-lg-3 mt-1">
                                                                                    Article No<br> <input class="form-control"
                                                                                        type="text" name="fire_article_no[]"  placeholder="..."
                                                                                        style="width: 100%;">
                                                                                </div>
                                                                                <div class="col-lg-3 mt-1">
                                                                                    Model <br> <input class="form-control" name="fire_model[]" type="text" placeholder="..."
                                                                                        style="width: 100%;">
                                                                                </div>
                                                                                <div class="col-lg-3 mt-1 spacing-right">
                                                                                    Year of Manufacturing : <br>
                                                                                    <input class="form-control" name="fire_year_of_manufacturing[]" type="text" placeholder="..."
                                                                                        style="width: 100%;">
                                                                                </div>
                                                                                <div class="col-lg-3 spacing-right">
                                                                                    Expiry Date : <br>
                                                                                    <input class="form-control" name="fire_expiry_date[]" type="text" placeholder="..."
                                                                                        style="width: 100%;">
                                                                                </div>
                                                                                <div class="col-lg-3 mt-1">
                                                                                    Warranty Period <br> <input class="form-control" id=""
                                                                                        type="text" name="fire_warranty_period[]" placeholder="..." style="width: 100%;">
                                                                                </div>
                                                                                <p>"Your Fire Fighting Cylinder is going to expire on "</p>
                                                                                <div class="container " id="">
                                                                                    <div class="row row-cols-2">

                                                                                        <div class="col-lg-3 mt-1">
                                                                                            Color <br> <input class="form-control" id="" name="fire_color[]" type="text"
                                                                                                placeholder="..." style="width: 100%;">
                                                                                        </div>
                                                                                        <div class="col-lg-3 mt-1">
                                                                                            Quantity <br> <input class="form-control" id="" name="fire_quantity[]"
                                                                                                type="text" placeholder="..." style="width: 100%;">
                                                                                        </div>
                                                                                        <div class="col-lg-3 mt-1">
                                                                                            Specifications Sheet: <br> <input class="form-control" id=""
                                                                                                type="file" name="fire_specifications[]" placeholder="..." style="width: 100%;">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                Notes <br> <textarea class="form-control mt-1"
                                                                                    id="head_office_name"
                                                                                    type="text" name="fire_notes[]" placeholder="..."
                                                                                    style="width: 100%;"></textarea>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                Attachments <br> <input class="form-control mt-1"
                                                                                    id="head_office_email" name="fire_attach[]"
                                                                                    type="file" placeholder="..."
                                                                                    style="width: 100%;">
                                                                            </div>
                                                                        </div>
                    </div>
                    <button class="btn btn-danger btn-sm removeSignAccordion7 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
                </div>
            </div>
            `;

                $('#signatoryAccordion7').append(newSignAccordion7);
            });

            // Remove Accordion Button Click Event
            $(document).on('click', '.removeSignAccordion7', function() {
                $(this).closest('.signaccordion-item7').remove();
            });
        });
    </script>


    <!-- Script for show data in table and update of fire fighting Services -->
    <script>
        $(document).ready(function() {
            // Function to update summary table for signatory entries
            function updateSignatorySummaryTable7() {
                // Clear existing rows
                $('#signatorySummaryTable7 tbody').empty();

                // Iterate through each signatory accordion item and update the summary table
                $('.signaccordion-item7').each(function(index) {
                    var equip_name = $(this).find('[name="equip_name"]').val();
                    var cylinder_size = $(this).find('[name="cylinder_size"]').val();
                    var article_no = $(this).find('[name="article_no"]').val();

                    // Check if any relevant data is entered
                    if (equip_name || cylinder_size || article_no) {
                        // Add a new row to the summary table
                        $('#signatorySummaryTable7 tbody').append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${equip_name}</td>
                        <td>${cylinder_size}</td>
                        <td>${article_no}</td>
                        <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                        <!-- Add more columns as needed -->
                    </tr>
                `);
                    }
                });
            }

            // Add More Signatory Button Click Event
            $('#addSignatory7').on('click', function() {
                var signatoryEntryCount7 = $('#signatoryAccordion7 .signaccordion-item7').length + 1;

                var newSignatoryEntry7 = `
            <!-- Your existing signatory accordion HTML goes here -->
            `;
                console.log('Adding signatory entry:', signatoryEntryCount7);
                $('#signatoryAccordion7').append(newSignatoryEntry7);
            });

            // Update Signatory Table Button Click Event
            $('#updateSignatoryTable7').on('click', function() {
                // Update the signatory summary table
                updateSignatorySummaryTable7();
            });

            // View Signatory Button Click Event
            $(document).on('click', '.view-signatory-button', function() {
                var index = $(this).data('index');
                var accordionItem = $('.signaccordion-item7').eq(index);

                // Toggle the collapse state of the accordion item
                accordionItem.find('.collapse').collapse('toggle');
            });

            // Remove Signatory Entry Button Click Event
            $(document).on('click', '.removeSignatoryAccordion7', function() {
                $(this).closest('.signaccordion-item7').remove();
                // Update the signatory summary table
                updateSignatorySummaryTable7();
            });

            // Prevent the default behavior of the Add More Signatory button
            $('#addSignatory7').on('click', function(event) {
                event.preventDefault();
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            // Add More Button Click Event
            $('#addSignatory15').on('click', function() {
                var SignatoryAccordionCount15 = $('#signatoryAccordion15 .signaccordion-item15').length + 1;

                var newSignAccordion15 = `
            <div class="accordion-item signaccordion-item15" id="signatoryEntry15${SignatoryAccordionCount15}">
                <h2 class="accordion-header" id="signatoryHeading15${SignatoryAccordionCount15}">
                    <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse15${SignatoryAccordionCount15}" aria-expanded="false" aria-controls="signatoryCollapse15${SignatoryAccordionCount15}">
                    Other Active Fire Equipment Entry ${SignatoryAccordionCount15}
                    </button>
                </h2>
                <div id="signatoryCollapse15${SignatoryAccordionCount15}" class="collapse" aria-labelledby="signatoryHeading15${SignatoryAccordionCount15}">
                    <div class="accordion-body">
                        <div class="row mb-2" id="signatoryDetailsContainer15">
                            <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Categories : <br>
                                    <select id="" class="form-control mt-1" name="other_fire_category[]"
                                        style="width: 100%;">
                                        <option value=""> </option>
                                        <option value="">Deluge System</option>
                                        <option value="">Sprinkler System
                                        </option>
                                        <option value="">Fire Monitor and Hydrants </option>
                                        <option value="">Fixed Foam System</option>
                                        <option value="">Fixed Gas Suppression system
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Equipment Name : <br>
                                    <input class="form-control"
                                        type="text" name="other_equip_name[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Article No<br> <input class="form-control"
                                        type="text" name="other_article_no[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Model <br> <input class="form-control" name="other_model[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1 spacing-right">
                                    Year of Manufacturing : <br>
                                    <input class="form-control" name="other_year_of_manufacture[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Expiry Date : <br>
                                    <input class="form-control" name="other_expiry_date[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <p>"Your Fire Fighting Cylinder is going to expire on "</p>
                                <div class="container " id="">
                                    <div class="row row-cols-2">
                                        <div class="col-lg-6 mt-1">
                                            Warranty Period <br> <input class="form-control" id=""
                                                type="text" name="other_warranty_period[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Color <br> <input class="form-control" id="" name="other_color[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Quantity <br> <input class="form-control" id=""
                                                type="text" name="other_quantity[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Specifications Sheet: <br> <input class="form-control" id=""
                                                type="file" name="other_specifications[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Scope of Work <br> <input class="form-control" id=""
                                                type="file" name="other_scope_of_work[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Any Special Instructions <br> <textarea class="form-control mt-1"
                                            id="head_office_name" name="other_instruction[]"
                                            type="text" placeholder="..."
                                            style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Picture of Building/Premises:  <br> <input class="form-control" id=""
                                                type="file" name="other_picture_of_building[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Complete Equipment Cost:  <br> <input class="form-control" id=""
                                                type="text" name="other_complete_cost[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Delivery charges:  <br> <input class="form-control" id=""
                                                type="text" name="other_delivery_charges[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Installation Cost: <br> <input class="form-control" id=""
                                                type="text" name="other_installtion_cost[]" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                Notes <br> <textarea class="form-control mt-1"
                                    id="head_office_name" name="other_fire_notes[]"
                                    type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-6">
                                Attachments <br> <input class="form-control mt-1"
                                    id="head_office_email" name="other_fire_attachment[]"
                                    type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger btn-sm removeSignAccordion15 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
                </div>
            </div>
            `;

                $('#signatoryAccordion15').append(newSignAccordion15);
            });

            // Remove Accordion Button Click Event
            $(document).on('click', '.removeSignAccordion15', function() {
                $(this).closest('.signaccordion-item15').remove();
            });
        });
    </script>


    <!-- Script for show data in table and update of fire fighting Services -->
    <script>
        $(document).ready(function() {
            // Function to update summary table for signatory entries
            function updateSignatorySummaryTable15() {
                // Clear existing rows
                $('#signatorySummaryTable15 tbody').empty();

                // Iterate through each signatory accordion item and update the summary table
                $('.signaccordion-item15').each(function(index) {
                    var model = $(this).find('[name="model"]').val();
                    var e_name = $(this).find('[name="e_name"]').val();
                    var a_no = $(this).find('[name="a_no"]').val();

                    // Check if any relevant data is entered
                    if (model || e_name || a_no) {
                        // Add a new row to the summary table
                        $('#signatorySummaryTable15 tbody').append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${e_name}</td>
                        <td>${a_no}</td>
                        <td>${model}</td>
                        <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                        <!-- Add more columns as needed -->
                    </tr>
                `);
                    }
                });
            }

            // Add More Signatory Button Click Event
            $('#addSignatory15').on('click', function() {
                var signatoryEntryCount15 = $('#signatoryAccordion15 .signaccordion-item15').length + 1;

                var newSignatoryEntry15 = `
            <!-- Your existing signatory accordion HTML goes here -->
            `;
                console.log('Adding signatory entry:', signatoryEntryCount15);
                $('#signatoryAccordion15').append(newSignatoryEntry15);
            });

            // Update Signatory Table Button Click Event
            $('#updateSignatoryTable15').on('click', function() {
                // Update the signatory summary table
                updateSignatorySummaryTable15();
            });

            // View Signatory Button Click Event
            $(document).on('click', '.view-signatory-button', function() {
                var index = $(this).data('index');
                var accordionItem = $('.signaccordion-item15').eq(index);

                // Toggle the collapse state of the accordion item
                accordionItem.find('.collapse').collapse('toggle');
            });

            // Remove Signatory Entry Button Click Event
            $(document).on('click', '.removeSignatoryAccordion15', function() {
                $(this).closest('.signaccordion-item15').remove();
                // Update the signatory summary table
                updateSignatorySummaryTable15();
            });

            // Prevent the default behavior of the Add More Signatory button
            $('#addSignatory15').on('click', function(event) {
                event.preventDefault();
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            // Add More Button Click Event
            $('#addSignatory16').on('click', function() {
                var SignatoryAccordionCount16 = $('#signatoryAccordion16 .signaccordion-item16').length + 1;

                var newSignAccordion16 = `
                <div class="accordion-item signaccordion-item16" id="signatoryEntry16${SignatoryAccordionCount16}">
                <h2 class="accordion-header" id="signatoryHeading16${SignatoryAccordionCount16}">
                    <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse16${SignatoryAccordionCount16}" aria-expanded="false" aria-controls="signatoryCollapse16${SignatoryAccordionCount16}">
                    Passive Fire Equipment Entry ${SignatoryAccordionCount16}
                    </button>
                </h2>
                <div id="signatoryCollapse16${SignatoryAccordionCount16}" class="collapse" aria-labelledby="signatoryHeading16${SignatoryAccordionCount16}">
                    <div class="accordion-body">
                        <div class="row mb-2" id="signatoryDetailsContainer16">
                            <div class="row mb-2">
                                <div class="col-lg-12 spacing-right">
                                    Categories : <br>
                                    <select id="" name="passive_category[]" class="form-control mt-1"
                                        style="width: 100%;">
                                        <option value=""> </option>
                                        <option value="">Fire Doors</option>
                                        <option value="">Fire Walls
                                        </option>
                                        <option value="">Fire Proof Coating </option>
                                        <option value="">Fire Proof (K Mass) Coating </option>
                                        <option value="">Fire Proof Enclosures
                                        </option>
                                        <option value="">Concrete Structure
                                        </option>
                                    </select>
                                </div>
                                <h5>Dimensions</h5>
                                <div class="col-lg-6 spacing-right">
                                    Length : <br>
                                    <input class="form-control"
                                        type="text" name="passive_dimension[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Width<br> <input class="form-control"
                                        type="text" name="passive_width[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Height <br> <input class="form-control" name="passive_height[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1 spacing-right">
                                    Thickness/Depth : <br>
                                    <input class="form-control" name="passive_depth[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Quantity : <br>
                                    <input class="form-control" name="passive_quantity[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Material : <br>
                                    <input class="form-control"
                                        type="text" name="passive_material[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Equipment Name <br> <input class="form-control"
                                        type="text" name="passive_equipment[]"  placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Article No <br> <input class="form-control" name="passive_article[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1 spacing-right">
                                    Model : <br>
                                    <input class="form-control" name="passive_model[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Year of Manufacturing : <br>
                                    <input class="form-control" name="passive_year_of_manufacture[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Expiry Date:  : <br>
                                    <input class="form-control" name="passive_expiry[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <p>"Your Passive Fire Fighting Cylinder is going to expire on "</p>
                                <div class="container " id="">
                                    <div class="row row-cols-2">
                                        <div class="col-lg-6 mt-1">
                                            Warranty Period <br> <input class="form-control" id=""
                                                type="text" name="passive_warranty[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Color <br> <input class="form-control" name="passive_color[]" id=""  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Quantity <br> <input class="form-control" name="passive_second_quantity[]" id=""
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Scope of Work <br> <input class="form-control" name="passive_scope_of_work[]" id=""
                                                type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Any Special Instructions <br> <textarea class="form-control mt-1"
                                            id="head_office_name" name="passive_instruction[]"
                                            type="text" placeholder="..."
                                            style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Picture of Building/Premises:  <br> <input class="form-control" id=""
                                                type="file" name="passive_building_picture[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Complete Equipment Cost:  <br> <input class="form-control" id=""
                                                type="text" name="passive_complete_cost[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Delivery charges:  <br> <input class="form-control" id=""
                                                type="text" name="passive_delivery_charges[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Installation Cost: <br> <input class="form-control" id=""
                                                type="text" name="passive_cost[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Drawings of the Buildings/Premises <br> <input class="form-control" id=""
                                                type="file" name="passive_drawings[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Pictures of the Buildings/Premises <br> <input class="form-control" id=""
                                                type="file" name="passive_pictures[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            Complete Equipment Charges: <br> <input class="form-control" id=""
                                                type="text" name="passive_complete_equip_charges[]" placeholder="..." style="width: 100%;">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger btn-sm removeSignAccordion116 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
                </div>
            </div>
            `;

                $('#signatoryAccordion16').append(newSignAccordion16);
            });

            // Remove Accordion Button Click Event
            $(document).on('click', '.removeSignAccordion16', function() {
                $(this).closest('.signaccordion-item16').remove();
            });
        });
    </script>



    <!-- Script for show data in table and update of fire fighting Services -->
    <script>
        $(document).ready(function() {
            // Function to update summary table for signatory entries
            function updateSignatorySummaryTable16() {
                // Clear existing rows
                $('#signatorySummaryTable16 tbody').empty();

                // Iterate through each signatory accordion item and update the summary table
                $('.signaccordion-item16').each(function(index) {
                    var passive_cat = $(this).find('[name="passive_cat"]').val();
                    var length = $(this).find('[name="length"]').val();
                    var width = $(this).find('[name="width"]').val();

                    // Check if any relevant data is entered
                    if (passive_cat || length || width) {
                        // Add a new row to the summary table
                        $('#signatorySummaryTable16 tbody').append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${passive_cat}</td>
                        <td>${length}</td>
                        <td>${width}</td>
                        <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                        <!-- Add more columns as needed -->
                    </tr>
                `);
                    }
                });
            }

            // Add More Signatory Button Click Event
            $('#addSignatory16').on('click', function() {
                var signatoryEntryCount16 = $('#signatoryAccordion16 .signaccordion-item16').length + 1;

                var newSignatoryEntry16 = `
            <!-- Your existing signatory accordion HTML goes here -->
            `;
                console.log('Adding signatory entry:', signatoryEntryCount16);
                $('#signatoryAccordion16').append(newSignatoryEntry16);
            });

            // Update Signatory Table Button Click Event
            $('#updateSignatoryTable16').on('click', function() {
                // Update the signatory summary table
                updateSignatorySummaryTable16();
            });

            // View Signatory Button Click Event
            $(document).on('click', '.view-signatory-button', function() {
                var index = $(this).data('index');
                var accordionItem = $('.signaccordion-item16').eq(index);

                // Toggle the collapse state of the accordion item
                accordionItem.find('.collapse').collapse('toggle');
            });

            // Remove Signatory Entry Button Click Event
            $(document).on('click', '.removeSignatoryAccordion16', function() {
                $(this).closest('.signaccordion-item16').remove();
                // Update the signatory summary table
                updateSignatorySummaryTable16();
            });

            // Prevent the default behavior of the Add More Signatory button
            $('#addSignatory16').on('click', function(event) {
                event.preventDefault();
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            // Add More Button Click Event
            $('#addSignatory17').on('click', function() {
                var SignatoryAccordionCount17 = $('#signatoryAccordion17 .signaccordion-item17').length + 1;

                var newSignAccordion17 = `
                <div class="accordion-item signaccordion-item17" id="signatoryEntry17${SignatoryAccordionCount17}">
                <h2 class="accordion-header" id="signatoryHeading17${SignatoryAccordionCount17}">
                    <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse17${SignatoryAccordionCount17}" aria-expanded="false" aria-controls="signatoryCollapse17${SignatoryAccordionCount17}">
                    Alarm Entry ${SignatoryAccordionCount17}
                    </button>
                </h2>
                <div id="signatoryCollapse17${SignatoryAccordionCount17}" class="collapse" aria-labelledby="signatoryHeading17${SignatoryAccordionCount17}">
                    <div class="accordion-body">
                        <div class="row mb-2" id="signatoryDetailsContainer17">
                            <div class="row mb-2">
                                <div class="col-lg-3 spacing-right">
                                    Categories : <br>
                                    <select id="" name="alarm_category[]" class="form-control mt-1"
                                         style="width: 100%;">
                                        <option value=""> </option>
                                        <option value="">Alarm Panel DSC</option>
                                        <option value="">Key Pad
                                        </option>
                                        <option value="">Metal Box </option>
                                        <option value="">Empty Panel Box</option>
                                        <option value="">Transformer
                                        </option>
                                        <option value="">Battery
                                        </option>
                                        <option value="">Add more with backend
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Equipment Name:  : <br>
                                    <input class="form-control"
                                        type="text" name="alarm_equipment[]"  placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 mt-1">
                                    Voltage (if any):  <br> <input class="form-control"
                                        type="text" name="alarm_voltage[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 mt-1">
                                    Ampere (if any):   <br> <input class="form-control" name="alarm_ampere[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 mt-1 spacing-right">
                                    Article No  <br>
                                    <input class="form-control" name="alarm_article_no[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Model : <br>
                                    <input class="form-control" name="alarm_model[]"  type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Year of Manufacturing : <br>
                                    <input class="form-control"
                                        type="text" name="alarm_year[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Expiry Date:  : <br>
                                    <input class="form-control" name="alarm_expiry[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <p>"Your Passive Fire Fighting Cylinder is going to expire on "</p>
                                <div class="container " id="">
                                    <div class="row row-cols-2">
                                        <div class="col-lg-3 mt-1">
                                            Warranty Period <br> <input class="form-control" id=""
                                                type="text" name="alarm_warranty[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Color <br> <input class="form-control" id="" name="alarm_color[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Quantity <br> <input class="form-control" id=""
                                                type="text" name="alarm_quantity[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Scope of Work <br> <input class="form-control" id=""
                                                type="file" name="alarm_scope[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Any Special Instructions <br> <textarea class="form-control mt-1"
                                            id="head_office_name"
                                            type="text" name="alarm_ins[]" placeholder="..."
                                            style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Drawings of Building/Premises:  <br> <input class="form-control" id=""
                                                type="file" name="alarm_drawings[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Picture of Building/Premises:  <br> <input class="form-control" id=""
                                                type="file" name="alarm_pictures[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Complete Equipment Cost:  <br> <input class="form-control" id=""
                                                type="text" name="alarm_cost[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Delivery charges:  <br> <input class="form-control" id=""
                                                type="text" name="alarm_charges[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Installation Cost: <br> <input class="form-control" id=""
                                                type="text" name="alarm_ins_cost[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <p>Dimensions ( if any ) :</p>
                                        <div class="col-lg-3 mt-1">
                                            Length (if any):  <br> <input class="form-control" id=""
                                                type="text" name="alarm_length[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Width (if any):  <br> <input class="form-control" id="" name="alarm_width[]"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Height (if any):  <br> <input class="form-control" id=""
                                                type="text" name="alarm_height[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Thickness (if any):  <br> <input class="form-control" id=""
                                                type="text" name="alarm_thickness[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Diameter (if any):  <br> <input class="form-control" id=""
                                                type="text" name="alarm_diameter[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Installation of smoke Detectors : <br>
                                            <select id="" name="alarm_ins_smoke[]" class="form-control mt-1"
                                                 style="width: 100%;">
                                                <option value=""> </option>
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Installation charges of Smoke Detectors:<br> <input class="form-control" id=""
                                                type="text" name="alarm_ins_cost_smoke[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Internal Shifting of Panel/Devices:  <br>
                                            <select id="" name="alarm_internal_shifting[]" class="form-control mt-1"
                                                style="width: 100%;">
                                                <option value=""> </option>
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Internal Shifting Charges of Panel/Devices:  <br> <input class="form-control" id=""
                                                type="text" name="alarm_internal_shifting_charges[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Reinstallation of Complete Alarm System : <br>
                                            <select id="" name="alarm_reinstall[]" class="form-control mt-1"
                                                style="width: 100%;">
                                                <option value=""> </option>
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Reinstallation Charges of Complete Alarm System:  <br> <input class="form-control" id=""
                                                type="text" name="alarm_reinstall_charges[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            QRF Monitoring Required : <br>
                                            <select id="" name="alarm_qrf[]" class="form-control mt-1"
                                                style="width: 100%;">
                                                <option value=""> </option>
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 mt-1" id="qrfMonitoringChargesField" style="display: none;">
                                            Monthly QRF Monitoring Charges: <br>
                                            <input class="form-control" name="alarm_qrf_monthly_charges[]" id="monthlyQrfMonitoringCharges" type="text" placeholder="..." style="width: 100%;">
                                            Yearly QRF Monitoring Charges: <br>
                                            <input class="form-control" name="alarm_qrf_yearly_charges[]" id="yearlyQrfMonitoringCharges" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Police Monitoring Required : <br>
                                            <select id="" name="alarm_police_req[]" class="form-control mt-1"
                                                 style="width: 100%;">
                                                <option value=""> </option>
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Monthly Police Monitoring Charges:  <br> <input class="form-control" id=""
                                                type="text" name="alarm_police_monthly_charges[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Monthly Police Monitoring Charges:  <br> <input class="form-control" id=""
                                                type="text" name="alarm_police_yearly_charges[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Visit Charges KHI/LHR/ISB/RWP :  <br> <input class="form-control" id=""
                                                type="text" name="alarm_visit_charges[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Visit Charges Out City :  <br> <input class="form-control" id=""
                                                type="text" name="alarm_visit_city[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Notes  <br> <textarea class="form-control" id=""
                                                type="text" name="alarm_notes[]" placeholder="..." style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            Attachments:  <br> <input class="form-control" id="" name=""
                                                type="file" name="alarm_attachments[]" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger btn-sm removeSignAccordion17 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
                </div>
            </div>
            `;

                $('#signatoryAccordion17').append(newSignAccordion17);
            });

            // Remove Accordion Button Click Event
            $(document).on('click', '.removeSignAccordion17', function() {
                $(this).closest('.signaccordion-item17').remove();
            });
        });
    </script>


    <!-- Script for show data in table and update of fire fighting Services -->
    <script>
        $(document).ready(function() {
            // Function to update summary table for signatory entries
            function updateSignatorySummaryTable17() {
                // Clear existing rows
                $('#signatorySummaryTable17 tbody').empty();

                // Iterate through each signatory accordion item and update the summary table
                $('.signaccordion-item17').each(function(index) {
                    var equi_name = $(this).find('[name="equi_name"]').val();
                    var arc_no = $(this).find('[name="arc_no"]').val();
                    var mod = $(this).find('[name="mod"]').val();

                    // Check if any relevant data is entered
                    if (equi_name || arc_no || mod) {
                        // Add a new row to the summary table
                        $('#signatorySummaryTable17 tbody').append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${equi_name}</td>
                        <td>${arc_no}</td>
                        <td>${mod}</td>
                        <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                        <!-- Add more columns as needed -->
                    </tr>
                `);
                    }
                });
            }

            // Add More Signatory Button Click Event
            $('#addSignatory16').on('click', function() {
                var signatoryEntryCount17 = $('#signatoryAccordion17 .signaccordion-item17').length + 1;

                var newSignatoryEntry17 = `
            <!-- Your existing signatory accordion HTML goes here -->
            `;
                console.log('Adding signatory entry:', signatoryEntryCount17);
                $('#signatoryAccordion17').append(newSignatoryEntry17);
            });

            // Update Signatory Table Button Click Event
            $('#updateSignatoryTable17').on('click', function() {
                // Update the signatory summary table
                updateSignatorySummaryTable17();
            });

            // View Signatory Button Click Event
            $(document).on('click', '.view-signatory-button', function() {
                var index = $(this).data('index');
                var accordionItem = $('.signaccordion-item17').eq(index);

                // Toggle the collapse state of the accordion item
                accordionItem.find('.collapse').collapse('toggle');
            });

            // Remove Signatory Entry Button Click Event
            $(document).on('click', '.removeSignatoryAccordion17', function() {
                $(this).closest('.signaccordion-item17').remove();
                // Update the signatory summary table
                updateSignatorySummaryTable17();
            });

            // Prevent the default behavior of the Add More Signatory button
            $('#addSignatory17').on('click', function(event) {
                event.preventDefault();
            });
        });
    </script>

<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addEmergency').on('click', function () {
            var EmergencyAccordionCount = $('#emergencyAccordion .emergencyaccordion-item').length + 1;

            var newEmergencyAccordion = `
                <div class="accordion-item emergencyaccordion-item" id="emergencyEntry${EmergencyAccordionCount}">
                    <h2 class="accordion-header" id="emergencyHeading${EmergencyAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#emergencyCollapse${EmergencyAccordionCount}" aria-expanded="false" aria-controls="emergencyCollapse${EmergencyAccordionCount}">
                            Address Entry ${EmergencyAccordionCount}
                        </button>
                    </h2>
                    <div id="emergencyCollapse${EmergencyAccordionCount}" class="collapse" aria-labelledby="emergencyHeading${EmergencyAccordionCount}">
                        <div class="accordion-body">
                            <div class="row" id="emergencyServices_add_fields">
                                <div class="row">

                                    <div class="col-lg-6 spacing-left">
                                        <h5>Address</h5>
                                        <div class="row mb-1">
                                            <div class="col-lg-5 spacing-right">
                                                Office No <br> <input class="form-control" id="" name="office_no[]"
                                                    type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                Floor <br> <input class="form-control" id="" name="floor[]"  type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-5 spacing-right">
                                                Building <br> <input class="form-control" id=""
                                                    name="building[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                Block <br> <input class="form-control" id=""
                                                    type="text" name="block[]" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-5 spacing-right">
                                                Area <br> <input class="form-control" id=""
                                                    type="text" name="area" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                City <br> <input class="form-control" id="head_office_cell_no" name="city[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-5 spacing-right">
                                                Photograph of Building <br> <input class="form-control" id="" name="builidng_attach[]" type="file"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                Pin location <br> <input class="form-control" id="" name="pin_location"  type="text"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 spacing-right">
                                        <div class="row mb-1">
                                            <div class="col-lg-10 spacing-right">
                                                Company <br> <input class="form-control" type="text" name="company[]" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-10 spacing-right">
                                                Email <br> <input class="form-control" type="text" name="email[]" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-10 spacing-right">
                                                website <br> <input class="form-control" type="text" name="website[]" id="degree"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-10 spacing-right">
                                                Attachments <br> <input class="form-control" type="file" name="attachments[]" id="degree"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-lg-10 spacing-right">
                                                Notes & Remarks <br>
                                                <textarea style="width: 100%;" id="" name="notes[]" cols="15" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-danger btn-sm removeEmergencyAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#emergencyAccordion').append(newEmergencyAccordion);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeEmergencyAccordion', function () {
            $(this).closest('.emergencyaccordion-item').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update summary table for emergency entries
        function updateEmergencySummaryTable() {
            // Clear existing rows
            $('#emergencySummaryTable tbody').empty();

            // Iterate through each emergency accordion item and update the summary table
            $('.emergencyaccordion-item').each(function (index) {
                var officeNo = $(this).find('[name="office_no[]"]').val();
                var floor = $(this).find('[name="floor[]"]').val();
                var building = $(this).find('[name="building[]"]').val();
                var block = $(this).find('[name="block[]"]').val();

                // Check if any relevant data is entered
                if (officeNo || floor || building || block) {
                    // Add a new row to the summary table
                    $('#emergencySummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${officeNo}</td>
                            <td>${floor}</td>
                            <td>${building}</td>
                            <td>${block}</td>
                            <td><button type="button" class="btn btn-primary view-emergency-button" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Update Emergency Table Button Click Event
        $('#updateEmergencyTable').on('click', function () {
            // Update the emergency summary table
            updateEmergencySummaryTable();
        });

        // View Emergency Button Click Event
        $(document).on('click', '.view-emergency-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.emergencyaccordion-item').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addDepartment').on('click', function () {
            var DepartmentAccordionCount = $('#departmentAccordion .departmentaccordion-item').length + 1;

            var newDepartmentAccordion = `
                <div class="accordion-item departmentaccordion-item" id="departmentEntry${DepartmentAccordionCount}">
                    <h2 class="accordion-header" id="departmentHeading${DepartmentAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#departmentCollapse${DepartmentAccordionCount}" aria-expanded="false" aria-controls="departmentCollapse${DepartmentAccordionCount}">
                            POC Details ${DepartmentAccordionCount}
                        </button>
                    </h2>
                    <div id="departmentCollapse${DepartmentAccordionCount}" class="collapse" aria-labelledby="departmentHeading${DepartmentAccordionCount}">
                        <div class="accordion-body">
                            <div class="row add-more">
                                <div class=" row main-content div" id="department_add_fields">
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            POC Name <br> <input class="form-control" name="req_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right spacing-left">
                                            POC Contact Number <br> <input class="form-control" name="req_poc_num[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right spacing-left">
                                            POC Designation <br> <input class="form-control" name="req_poc_desig[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right spacing-right">
                                            Visiting Card (Front) <br> <input class="form-control" name="req_poc_visiting_front[]" id="inpFile1" type="file" placeholder="..."
                                                style="width: 100%;">

                                        </div>
                                        <div class="col-lg-4 spacing-right spacing-left">
                                            Visiting Card (Back) <br> <input class="form-control" name="req_poc_visiting_back[]" type="file" id="inpFile2" placeholder="..."
                                                style="width: 100%;">

                                        </div>
                                        <div class="col-lg-4 spacing-right spacing-left">
                                            Email <br> <input class="form-control" type="text" name="req_poc_email[]" placeholder="..." style="width: 97%;">
                                        </div>
                                        <div class="col-lg-4 mb-3 ">
                                            POC Organization Name: <br> <input class="form-control" name="req_poc_org_name[]" type="text" placeholder="..." style="width: 97%;">
                                        </div>
                                        <h5>POC Address</h5>

                                        <div class="col-lg-4 spacing-right">
                                            Office No <br> <input class="form-control" id="" name="req_poc_office_no[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Floor <br> <input class="form-control" id="" name="req_poc_floor[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>


                                        <div class="col-lg-4 spacing-right">
                                            Building <br> <input class="form-control" id="" name="req_poc_building[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Block <br> <input class="form-control" id="" name="req_poc_block[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>


                                        <div class="col-lg-4 spacing-right">
                                            Area <br> <input class="form-control" id="" name="req_poc_area[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            City <br> <input class="form-control" id="" name="req_poc_city[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Photograph of Building <br> <input class="form-control" id="" name="req_poc_building_attach[]" type="file"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <!-- <div class="col-lg-6 spacing-right">
                                                Email <br> <input class="form-control" id="" name="c_pin" type="text" placeholder="..." style="width: 100%;">
                                            </div> -->
                                        <div class="col-lg-4 spacing-right">
                                            Pin location <br> <input class="form-control" id="" name="req_poc_pin[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>

                                        <!-- <div class="row mb-2">
                                                <div class="col-lg-6 spacing-left">
                                                    Website <br> <input class="form-control" id="" name="c_pin" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-left">
                                                    Google Map <br> <input class="form-control" id="" name="c_pin" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                        </div> -->
                                    </div>
                                </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-danger btn-sm removeDepartmentAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#departmentAccordion').append(newDepartmentAccordion);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeDepartmentAccordion', function () {
            $(this).closest('.departmentaccordion-item').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update summary table for department entries
        function updateDepartmentSummaryTable() {
            // Clear existing rows
            $('#departmentSummaryTable tbody').empty();

            // Iterate through each department accordion item and update the summary table
            $('.departmentaccordion-item').each(function (index) {
                var reqPocName = $(this).find('[name="req_poc_name[]"]').val();
                var reqPocNum = $(this).find('[name="req_poc_num[]"]').val();
                var reqPocEmail = $(this).find('[name="req_poc_email[]"]').val();
                var reqPocDesig = $(this).find('[name="req_poc_desig[]"]').val();

                // Check if any relevant data is entered
                if (reqPocName || reqPocNum || reqPocEmail || reqPocDesig) {
                    // Add a new row to the summary table
                    $('#departmentSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${reqPocName}</td>
                            <td>${reqPocNum}</td>
                            <td>${reqPocEmail}</td>
                            <td>${reqPocDesig}</td>
                            <td><button type="button" class="btn btn-primary view-department-button" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Department Button Click Event
        $('#addDepartment').on('click', function () {
            var departmentEntryCount = $('#departmentAccordion .departmentaccordion-item').length + 1;

            var newDepartmentEntry = `
                <!-- Your existing department accordion HTML goes here -->
            `;
            console.log('Adding department entry:', departmentEntryCount);
            $('#departmentAccordion').append(newDepartmentEntry);
        });

        // Update Department Table Button Click Event
        $('#updateDepartmentTable').on('click', function () {
            // Update the department summary table
            updateDepartmentSummaryTable();
        });

        // View Department Button Click Event
        $(document).on('click', '.view-department-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.departmentaccordion-item').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Prevent the default behavior of the Add More Department button
        $('#addDepartment').on('click', function (event) {
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
                            RFQ Report ${ArmourAccordionCount}
                        </button>
                    </h2>
                    <div id="armourCollapse${ArmourAccordionCount}" class="collapse" aria-labelledby="armourHeading${ArmourAccordionCount}">
                        <div class="accordion-body">
                            <div id="cleaningInfo" class="row">
                                <div class="col-lg-4 spacing-right">
                                    Date: <br> <input class="form-control" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Report Uploaded By (Name): <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">

                                    Report Uploaded By (Number): <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    Report Uploaded By (Email): <br> <input class="form-control" type="email" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    Office ID: <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    Department ID: <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    Reporting Person Name: <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    Reporting Person Number: <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    Reporting Person Email: <br> <input class="form-control" type="email" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    Region Name: <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    Region Code: <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    GM: <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    DGM: <br> <input class="form-control" type="email" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    CRO: <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    Client/ Location Visited: <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    Response By: <br> <input class="form-control" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    Opening Date: <br> <input class="form-control" type="date" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    Status: <br> <input class="form-control" type="email" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    Remarks: <br> <input class="form-control" type="email" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">
                                    Notes <br>
                                    <textarea class="form-control" style="width: 100%;" id="" cols="15"
                                        rows="4"></textarea>
                                </div>
                                <div class="col-lg-4 spacing-right mt-2">

                                    Attachements: <br> <input class="form-control" type="file" placeholder="..."
                                        style="width: 100%;">
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
                var branchName = $(this).find('[name="arm_branch_name[]"]').val();
                var branchID = $(this).find('[name="arm_branch_id[]"]').val();
                var clientName = $(this).find('[name="arm_client_name[]"]').val();
                var signCustomer = $(this).find('[name="arm_sign_cus[]"]').val();

                // Check if any relevant data is entered
                if (branchName || branchID || clientName || signCustomer) {
                    // Add a new row to the summary table
                    $('#armourSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${branchName}</td>
                            <td>${branchID}</td>
                            <td>${clientName}</td>
                            <td>${signCustomer}</td>
                            <td><button type="button" class="btn btn-primary view-armour-button" data-index="${index}">View</button></td>
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

<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addIncident').on('click', function () {
            var IncidentAccordionCount = $('#incidentAccordion .incidentaccordion-item').length + 1;

            var newIncidentAccordion = `
                <div class="accordion-item incidentaccordion-item" id="incidentEntry${IncidentAccordionCount}">
                    <h2 class="accordion-header" id="incidentHeading${IncidentAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#incidentCollapse${IncidentAccordionCount}" aria-expanded="false" aria-controls="incidentCollapse${IncidentAccordionCount}">
                            Automatic Traffic Barrier Entry ${IncidentAccordionCount}
                        </button>
                    </h2>
                    <div id="incidentCollapse${IncidentAccordionCount}" class="collapse" aria-labelledby="incidentHeading${IncidentAccordionCount}">
                        <div class="accordion-body">
                           <div class="row client-info">
                                <div class="row mb-2">
                                    <div class="col-lg-6 form-group spacing-left">
                                        Ownership Status :<br>
                                        <div class="input-group" style="width: 100%;">
                                            <select id="applicable_compliances" class="form-control mt-1" name="barrier_ownership[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value=""></option>
                                            </select>
                                            <div class="input-group-append" style="width: 30%;">
                                                <a href="">
                                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 form-group spacing-left">
                                        Rental :<br>
                                        <div class="input-group" style="width: 100%;">
                                            <select id="applicable_compliances" class="form-control mt-1"  name="barrier_rental[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value="">Monthly</option>
                                                <option value="">Dialy</option>
                                            </select>
                                            <div class="input-group-append" style="width: 30%;">
                                                <a href="">
                                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        No. of Days:  <br>
                                        <input class="form-control" type="text" name="barrier_no_of_days[]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Model: <br> <input class="form-control" name="barrier_model[]" type="text"  placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Brand:  <br> <input class="form-control" name="barrier_brand[]" type="text"  placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Specifications: <br>
                                        <input class="form-control" type="text" name="barrier_specifications[]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Quantity:  <br> <input class="form-control vldphone" type="text" name="barrier_quantity[]"  placeholder="..." style="width: 100%;">
                                        <div id="phoneError" class="phoneError" style="color: red"></div>
                                    </div>
                                    <div class="col-lg-6">
                                        Unit Price:  <br> <input class="form-control vldemail" name="barrier_unit[]" type="text"  placeholder="..." style="width: 100%;">
                                        <div id="emailError" class="emailError" style="color: red"></div>
                                    </div>
                                    <div class="col-lg-6">
                                        Total Price: <br>
                                        <input class="form-control" type="text" name="barrier_price[]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <h5>Road Loop Detector: </h5>
                                    <div class="col-lg-6">
                                        Model:  <br> <input class="form-control" name="detector_model[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Brand: <br> <input class="form-control" name="detector_brand[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Specifications: <br>
                                        <textarea class="form-control" type="text" name="detector_specifications[]" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        Quantity:  <br> <input class="form-control" name="detector_quantity[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Unit Price: <br> <input class="form-control" name="detector_unit[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Total Price: <br> <input class="form-control" name="detector_price[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <h5>Traffic Lights: </h5>
                                    <div class="col-lg-6">
                                        Model:  <br> <input class="form-control" name="traffic_model[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Brand: <br> <input class="form-control" name="traffic_brand[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Specifications: <br>
                                        <textarea class="form-control" type="text" name="traffic_specifications[]" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        Quantity:  <br> <input class="form-control" name="traffic_quantity[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Unit Price: <br> <input class="form-control" name="traffic_unit[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Total Price: <br> <input class="form-control" name="traffic_price[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <h5>Breakaway Coupler: </h5>
                                    <div class="col-lg-6">
                                        Model:  <br> <input class="form-control" name="coupler_model[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Brand: <br> <input class="form-control" name="coupler_brand[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Specifications: <br>
                                        <textarea class="form-control" type="text" name="coupler_specification[]"  placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        Quantity:  <br> <input class="form-control" name="coupler_quantity[]"  type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Unit Price: <br> <input class="form-control" name="coupler_unit[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Total Price: <br> <input class="form-control" name="coupler_price[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <h5>E-Tag Long Range RFID Reader: </h5>
                                    <div class="col-lg-6">
                                        Model:  <br> <input class="form-control" name="tag_model[]"  type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Brand: <br> <input class="form-control" name="tag_brand[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Specifications: <br>
                                        <textarea class="form-control" type="text" name="tag_specifications[]" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        Quantity:  <br> <input class="form-control"  name="tag_quantity[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Unit Price: <br> <input class="form-control" name="tag_unit[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Total Price: <br> <input class="form-control" name="tag_price[]"  type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <h5>Long Range E-Tags: </h5>
                                    <div class="col-lg-6">
                                        Model:  <br> <input class="form-control" name="Etag_model[]"  type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Brand: <br> <input class="form-control" name="Etag_brand[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Specifications: <br>
                                        <textarea class="form-control" type="text" name="Etag_specifications[]" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        Quantity:  <br> <input class="form-control" name="Etag_quantity[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Unit Price: <br> <input class="form-control" name="Etag_unit[]"  type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Total Price: <br> <input class="form-control" name="Etag_price[]"  type="text" placeholder="..." style="width: 100%;">
                                    </div>

                                    <h5>Pole for E-Tag Reader: </h5>
                                    <div class="col-lg-6">
                                        Model:  <br> <input class="form-control" name="pole_model[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Brand: <br> <input class="form-control" name="pole_brand[]"  type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Specifications: <br>
                                        <textarea class="form-control" name="pole_specifications[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        Quantity:  <br> <input class="form-control" name="pole_quantity[]"  type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Unit Price: <br> <input class="form-control" name="pole_unit[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Total Price: <br> <input class="form-control" name="pole_price[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <h5>Distribution Box with Circuit Breaker: </h5>
                                    <div class="col-lg-6">
                                        Model:  <br> <input class="form-control" name="breaker_model[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Brand: <br> <input class="form-control" type="text" name="breaker_brand[]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Specifications: <br>
                                        <textarea class="form-control" type="text" name="breaker_specifications[]" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        Quantity:  <br> <input class="form-control" name="breaker_quantity[]"  type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Unit Price: <br> <input class="form-control"  name="breaker_unit[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                        Total Price: <br> <input class="form-control" name="breaker_price[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        Installation, Testing & Commissioning :<br>
                                        <div class="input-group" style="width: 100%;">
                                            <select id="applicable_compliances" class="form-control mt-1" name="barrier_installation[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 form-group">
                                        Training of Customer Staff Required :<br>
                                        <div class="input-group" style="width: 100%;">
                                            <select id="applicable_compliances" class="form-control mt-1" name="barrier_training[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        Upload Training Material : <br> <input class="form-control" name="barrier_upload_training[]" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        Delivery Required :<br>
                                        <div class="input-group" style="width: 100%;">
                                            <select id="applicable_compliances" class="form-control mt-1" name="barrier_delivery[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-2 ml-3 ">
                                        <input class="form-check-input" name="barrier_del_loc[]" type="checkbox"
                                            id="delievery_location_check_3">
                                        <label class="form-check-label"
                                            for="check">Delievery Location
                                        </label>
                                    </div>
                                    <div class="container "
                                        id="delievery_location_form_3"
                                        style="display: none;">
                                        <div class="row row-cols-2">
                                            <div class="col-lg-6 mt-1">
                                                Office No <br> <input
                                                    class="form-control" id=""
                                                    type="text" name="barrier_office_no[]" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Floor <br> <input class="form-control"
                                                    id="" name="barrier_floor[]"  type="text"
                                                    placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Building <br> <input
                                                    class="form-control" id=""
                                                    type="text" name="barrier_building[]" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Block <br> <input class="form-control"
                                                    id="" name="barrier_block[]"  type="text"
                                                    placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Area <br> <input class="form-control"
                                                    id="" name="barrier_area[]" type="text"
                                                    placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                City <br> <input class="form-control"
                                                    id="" name="barrier_city[]"  type="text"
                                                    placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Photograph of Building <br> <input
                                                    class="form-control" id=""
                                                    type="file" name="barrier_photo_building[]" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Pin location <br> <input
                                                    class="form-control" id=""
                                                    type="text" name="barrier_pin_loc[]" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-2 ml-3 ">
                                        <input class="form-check-input" name="barrier_ins_loc[]" type="checkbox"
                                            id="installation_location_check_3">
                                        <label class="form-check-label"
                                            for="check">Installation Location
                                        </label>
                                    </div>
                                    <div class="container "
                                        id="installation_location_form_3"
                                        style="display: none;">
                                        <div class="row row-cols-2">
                                            <div class="col-lg-6 mt-1">
                                                Office No <br> <input
                                                    class="form-control" id=""
                                                    type="text" name="barrier_ins_office[]" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Floor <br> <input class="form-control"
                                                    id=""  name="barrier_ins_floor[]" type="text"
                                                    placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Building <br> <input
                                                    class="form-control" id=""
                                                    type="text"  name="barrier_ins_building[]" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Block <br> <input class="form-control"
                                                    id=""  name="barrier_ins_block[]"  type="text"
                                                    placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Area <br> <input class="form-control"
                                                    id=""  name="barrier_ins_area[]"  type="text"
                                                    placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                City <br> <input class="form-control"
                                                    id=""  name="barrier_ins_city[]" type="text"
                                                    placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Photograph of Building <br> <input
                                                    class="form-control" id=""
                                                    type="file"  name="barrier_ins_photo_building[]" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Pin location <br> <input
                                                    class="form-control" id=""
                                                    type="text"  name="barrier_ins_pin_loc[]" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-6 mt-2">
                                        Attachements <br> <input class="form-control" type="file"  name="barrier_attachments[]"  placeholder="..." style="width: 100%;" multiple>
                                    </div>
                                    <div class="col-lg-6">
                                        Notes <br>
                                        <textarea id="w3review10" onclick="moveCursorToStart10()"  name="barrier_notes[]" oninput="trimSpaces10()" class="form-control"  rows="2" cols="38">
                                        </textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeIncidentAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#incidentAccordion').append(newIncidentAccordion);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeIncidentAccordion', function () {
            $(this).closest('.incidentaccordion-item').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update incident summary table for incident entries
        function updateIncidentSummaryTable() {
            // Clear existing rows
            $('#incidentSummaryTable tbody').empty();

            // Iterate through each incident accordion item and update the summary table
            $('.incidentaccordion-item').each(function (index) {
                var clientName = $(this).find('[name="client_name[]"]').val();
                var clientID = $(this).find('[name="client_id[]"]').val();
                var clientPOC = $(this).find('[name="client_poc[]"]').val();
                var clientCell = $(this).find('[name="client_cell[]"]').val();

                // Check if any relevant data is entered
                if (clientName || clientID || clientPOC || clientCell) {
                    // Add a new row to the summary table
                    $('#incidentSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${clientName}</td>
                            <td>${clientID}</td>
                            <td>${clientPOC}</td>
                            <td>${clientCell}</td>
                            <td><button type="button" class="btn btn-primary view-incident-button" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Incident Button Click Event
        $('#addIncident').on('click', function () {
            var incidentEntryCount = $('#incidentAccordion .incidentaccordion-item').length + 1;

            var newIncidentEntry = `
                <!-- Your existing incident accordion HTML goes here -->
            `;
            console.log('Adding incident entry:', incidentEntryCount);
            $('#incidentAccordion').append(newIncidentEntry);
        });

        // Update Incident Table Button Click Event
        $('#updateIncidentTable').on('click', function () {
            // Update the incident summary table
            updateIncidentSummaryTable();
        });

        // View Incident Button Click Event
        $(document).on('click', '.view-incident-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.incidentaccordion-item').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Prevent the default behavior of the Add More Incident button
        $('#addIncident').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

    <!-- Script for add more secuirty equipment Services -->
    <script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory8').on('click', function() {
            var SignatoryAccordionCount8 = $('#signatoryAccordion8 .signaccordion-item8').length + 1;

            var newSignAccordion8 = `
        <div class="accordion-item signaccordion-item8" id="signatoryEntry8${SignatoryAccordionCount8}">
            <h2 class="accordion-header" id="signatoryHeading8${SignatoryAccordionCount8}">
                <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse8${SignatoryAccordionCount8}" aria-expanded="false" aria-controls="signatoryCollapse8${SignatoryAccordionCount8}">
                Security Equipment Entry ${SignatoryAccordionCount8}
                </button>
            </h2>
            <div id="signatoryCollapse8${SignatoryAccordionCount8}" class="collapse" aria-labelledby="signatoryHeading8${SignatoryAccordionCount8}">
                <div class="accordion-body">
                    <div class="row mb-2" id="signatoryDetailsContainer8">
                        <!-- Your content for entry goes here -->
                        <div class="col-lg-6 form-group spacing-left">
                            Category:<br>
                            <div class="input-group" style="width: 100%;">
                                <select id="applicable_compliances" class="form-control mt-1" name="equipment_category[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                    <option value="Walk through Gate">Walk through
                                        Gate</option>
                                    <option value="Metal Detector">Metal Detector
                                    </option>
                                    <option value="Barriers">Barriers</option>
                                    <option value="Traffic Equipment">Traffic
                                        Equipment</option>
                                </select>
                                <div class="input-group-append" style="width: 30%;">
                                    <a href="">
                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Ownership Status : <br>
                            <select class="form-control mt-1" name="equipment_ownership[]"
                                style="width: 100%;">
                                <option value="Company Owned">Company Owned
                                </option>
                                <option value="OutSourced">OutSourced</option>
                            </select>
                        </div>

                        <div class="col-lg-6 spacing-right mt-1">
                            Rental : <br>
                            <select id="leadcategory" class="form-control mt-1" name="equipment_rental[]"
                                style="width: 100%;">
                                <option value="Daily">Daily</option>
                                <option value="Monthly">Monthly</option>
                            </select>
                        </div>
                        <div class="col-lg-6 mt-1">
                            No of days Equipment Required for <br> <input
                                class="form-control" type="text" name="equipment_no_of_days[]"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Quantity <br> <input class="form-control"
                                type="text" placeholder="..." name="equipment_quality[]"
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right mt-1">
                            Training for Customer's Staff Required : <br>
                            <select id="leadcategory" name="equipment_training[]" class="form-control mt-1"
                                style="width: 100%;">
                                <option value="">Yes</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Delivery Required : <br>
                            <select id="leadcategory" name="equipment_delivery[]" class="form-control mt-1"
                                style="width: 100%;">
                                <option value="">Yes</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="col-lg-6 mt-2 ml-3 ">
                            <input class="form-check-input" name="equipment_dilevery_loc[]" type="checkbox"
                                id="delievery_location_check_1">
                            <label class="form-check-label"
                                for="check">Delievery Location </label>
                        </div>
                        <div class="container " id="delievery_location_form_1"
                            style="display: none;">
                            <div class="row row-cols-2">
                                <div class="col-lg-6 mt-1">
                                    Office No <br> <input class="form-control"
                                        id=""  type="text" name="equipment_del_office_no[]"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Floor <br> <input class="form-control" id=""
                                        type="text" placeholder="..." name="equipment_del_floor[]"
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Building <br> <input class="form-control"
                                        id=""  type="text" name="equipment_del_building[]"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Block <br> <input class="form-control" id=""
                                        type="text" placeholder="..." name="equipment_del_block[]"
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Area <br> <input class="form-control" id=""
                                        type="text" placeholder="..." name="equipment_del_area[]"
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    City <br> <input class="form-control" name="equipment_del_city[]" id=""
                                        type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Photograph of Building <br> <input
                                        class="form-control" id="" name="equipment_del_photo_building[]"
                                        type="file" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Pin location <br> <input
                                        class="form-control" id="" name="equipment_del_pin_loc[]"
                                        type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 spacing-right">
                            Installation Required : <br>
                            <select id="leadcategory" name="equipment_installation_req[]" class="form-control mt-1"
                                style="width: 100%;">
                                <option value="">Yes</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="col-lg-6 mt-2 ml-3 ">
                            <input class="form-check-input" name="equipment_ins_loc[]" type="checkbox"
                                id="installation_location_check_1">
                            <label class="form-check-label"
                                for="check">Installation Location
                            </label>
                        </div>

                        <div class="container "
                            id="installation_location_form_1"
                            style="display: none;">
                            <div class="row row-cols-2">
                                <div class="col-lg-6 mt-1">
                                    Office No <br> <input class="form-control"
                                        id="" name="equipment_ins_office_no[]" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Floor <br> <input class="form-control" id=""
                                        type="text" name="equipment_ins_floor[]" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Building <br> <input class="form-control"
                                        id="" type="text" name="equipment_ins_building[]"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Block <br> <input class="form-control" id=""
                                        type="text" placeholder="..." name="equipment_ins_block[]"
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Area <br> <input class="form-control" id=""
                                        type="text" placeholder="..." name="equipment_ins_area[]"
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    City <br> <input class="form-control" name="equipment_ins_city[]" id=""
                                        type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Photograph of Building <br> <input
                                        class="form-control" name="equipment_ins_photo_building[]" id=""
                                        type="file" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Pin location <br> <input
                                        class="form-control" name="equipment_ins_pin_location[]" id=""
                                        type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            Notes <br> <textarea class="form-control mt-1"
                                id="head_office_name" name="equipment_notes[]"
                                type="text" placeholder="..."
                                style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-6">
                            Attachments <br> <input class="form-control mt-1"
                                id="head_office_email" name="equipment_attachment[]"
                                type="file" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm removeSignAccordion8 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
            </div>
        </div>
        `;

            $('#signatoryAccordion8').append(newSignAccordion8);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion8', function() {
            $(this).closest('.signaccordion-item8').remove();
        });
    });
    </script>


    <!-- Script for show data in table and update of secuirty equipment Services -->
    <Script>
    $(document).ready(function() {
        // Function to update summary table for signatory entries
        function updateSignatorySummaryTable8() {
            // Clear existing rows
            $('#signatorySummaryTable8 tbody').empty();

            // Iterate through each signatory accordion item and update the summary table
            $('.signaccordion-item8').each(function(index) {
                var category_of_sec_eq = $(this).find('[name="categoryOfSecEqu"]').val();
                var owner_ship_s = $(this).find('[name="onwerShipStatus"]').val();
                var rental_for = $(this).find('[name="rentalFor"]').val();

                // Check if any relevant data is entered
                if (category_of_sec_eq || owner_ship_s || rental_for) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable8 tbody').append(`
                <tr>
                    <td>${index + 1}</td>
                    <td>${category_of_sec_eq}</td>
                    <td>${owner_ship_s}</td>
                    <td>${rental_for}</td>
                    <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                    <!-- Add more columns as needed -->
                </tr>
            `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory8').on('click', function() {
            var signatoryEntryCount8 = $('#signatoryAccordion8 .signaccordion-item8').length + 1;

            var newSignatoryEntry8 = `
        <!-- Your existing signatory accordion HTML goes here -->
        `;
            console.log('Adding signatory entry:', signatoryEntryCount8);
            $('#signatoryAccordion8').append(newSignatoryEntry8);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable8').on('click', function() {
            // Update the signatory summary table
            updateSignatorySummaryTable8();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item8').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion8', function() {
            $(this).closest('.signaccordion-item8').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable8();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory8').on('click', function(event) {
            event.preventDefault();
        });
    });
    </Script>

    <!-- Script for add more Electronic and web Services (CCTV) -->
    <script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory9').on('click', function() {
            var SignatoryAccordionCount9 = $('#signatoryAccordion9 .signaccordion-item9').length + 1;

            var newSignAccordion9 = `
        <div class="accordion-item signaccordion-item9" id="signatoryEntry9${SignatoryAccordionCount9}">
            <h2 class="accordion-header" id="signatoryHeading9${SignatoryAccordionCount9}">
                <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse9${SignatoryAccordionCount9}" aria-expanded="false" aria-controls="signatoryCollapse9${SignatoryAccordionCount9}">
                    CCTV Entry ${SignatoryAccordionCount9}
                </button>
            </h2>
            <div id="signatoryCollapse9${SignatoryAccordionCount9}" class="collapse" aria-labelledby="signatoryHeading9${SignatoryAccordionCount9}">
                <div class="accordion-body">
                    <div class="row mb-2" id="signatoryDetailsContainer9">
                        <!-- Your content for entry goes here -->
                        <div class="col-lg-6 form-group spacing-left">
                            Category:<br>
                            <div class="input-group" style="width: 100%;">
                                <select id="applicable_compliances" class="form-control mt-1" name="cctv_category[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                    <option
                                    value="CCTV & Time Attendance Machine">
                                    CCTV & Time
                                    Attendance Machine</option>
                                <option value="Supporting Equipment">
                                    Supporting Equipment
                                </option>
                                <option value="Web Surveillance Services">
                                    Web Surveillance
                                    Services</option>
                                </select>
                                <div class="input-group-append" style="width: 30%;">
                                    <a href="">
                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 form-group spacing-left">
                            CCTV Brand:<br>
                            <div class="input-group" style="width: 100%;">
                                <select id="applicable_compliances" class="form-control mt-1" name="cctv_brand[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                </select>
                                <div class="input-group-append" style="width: 30%;">
                                    <a href="">
                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 form-group spacing-left">
                            Model :<br>
                            <div class="input-group" style="width: 100%;">
                                <select id="applicable_compliances" class="form-control mt-1" name="cctv_model[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                </select>
                                <div class="input-group-append" style="width: 30%;">
                                    <a href="">
                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-1">
                            Year of Manufacturing <br> <input class="form-control"
                                type="text" placeholder="..." name="cctv_year_of_manu[]"
                                style="width: 100%;">
                        </div>

                        <div class="col-lg-6 form-group spacing-left">
                            Pixels :<br>
                            <div class="input-group" style="width: 100%;">
                                <select id="applicable_compliances" class="form-control mt-1" name="cctv_pixels[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                </select>
                                <div class="input-group-append" style="width: 30%;">
                                    <a href="">
                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-1 spacing-right">
                            Night Vision : <br>
                            <select id="leadcategory"
                                class="form-control mt-1" name="cctv_night_vision[]"
                                style="width: 100%;">
                                <option value="">Yes</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="col-lg-6 form-group spacing-left">
                            CCTV Type :<br>
                            <div class="input-group" style="width: 100%;">
                                <select id="applicable_compliances" class="form-control mt-1" name="cctv_type[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                </select>
                                <div class="input-group-append" style="width: 30%;">
                                    <a href="">
                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 form-group spacing-left">
                            Backup Storage :<br>
                            <div class="input-group" style="width: 100%;">
                                <select id="applicable_compliances" class="form-control mt-1" name="cctv_backup[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                </select>
                                <div class="input-group-append" style="width: 30%;">
                                    <a href="">
                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 form-group spacing-left">
                            NVR :<br>
                            <div class="input-group" style="width: 100%;">
                                <select id="applicable_compliances" class="form-control mt-1" name="cctv_nvr[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                </select>
                                <div class="input-group-append" style="width: 30%;">
                                    <a href="">
                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-1 spacing-right">
                            Power Cable : <br>
                            <select id="leadcategory" name="cctv_powercable[]"
                                class="form-control mt-1"
                                style="width: 100%;">
                                <option value="">Yes</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="col-lg-6 form-group spacing-left">
                            POE Switch :<br>
                            <div class="input-group" style="width: 100%;">
                                <select id="applicable_compliances" class="form-control mt-1" name="cctv_poe[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                </select>
                                <div class="input-group-append" style="width: 30%;">
                                    <a href="">
                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-1">
                            Quantity <br> <input class="form-control"
                                type="text" placeholder="..." name="cctv_quantity[]"
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Monthly Maintenance Cost <br> <input
                                class="form-control" type="text" name="cctv_monthly_cost[]"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1 spacing-right">
                            Required on : <br>
                            <select id="leadcategory"
                                class="form-control mt-1" name="cctv_req_on[]"
                                style="width: 100%;">
                                <option value="">Daily Basis</option>
                                <option value="">Monthly Basis</option>
                            </select>
                        </div>
                        <div class="col-lg-6 mt-1">
                            No of days Equipment Required for <br> <input
                                class="form-control" type="text" name="cctv_no_of_days[]"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-2 ml-3 ">
                            <input class="form-check-input" name="cctv_del_loc[]" type="checkbox"
                                id="delievery_location_check_2">
                            <label class="form-check-label"
                                for="check">Delievery Location
                            </label>
                        </div>
                        <div class="container "
                            id="delievery_location_form_2"
                            style="display: none;">
                            <div class="row row-cols-2">
                                <div class="col-lg-6 mt-1">
                                    Office No <br> <input
                                        class="form-control" id="" name="cctv_del_office[]"
                                        type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Floor <br> <input class="form-control"
                                        id=""  type="text" name="cctv_del_floor[]"
                                        placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Building <br> <input
                                        class="form-control" id="" name="cctv_del_building[]"
                                        type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Block <br> <input class="form-control"
                                        id=""  type="text" name="cctv_del_block[]"
                                        placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Area <br> <input class="form-control"
                                        id=""  type="text" name="cctv_del_area[]"
                                        placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    City <br> <input class="form-control"
                                        id=""  type="text" name="cctv_del_city[]"
                                        placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Photograph of Building <br> <input
                                        class="form-control" id="" name="cctv_del_photo_building[]"
                                        type="file" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Pin location <br> <input
                                        class="form-control" id="" name="cctv_del_pin_loc[]"
                                        type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-2 ml-3 ">
                            <input class="form-check-input" name="cctv_ins_loc[]" type="checkbox"
                                id="installation_location_check_2">
                            <label class="form-check-label"
                                for="check">Installation Location
                            </label>
                        </div>
                        <div class="container "
                            id="installation_location_form_2"
                            style="display: none;">
                            <div class="row row-cols-2">
                                <div class="col-lg-6 mt-1">
                                    Office No <br> <input
                                        class="form-control" name="cctv_ins_office[]"  id=""
                                        type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Floor <br> <input class="form-control"
                                        id=""  type="text" name="cctv_ins_floor[]"
                                        placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Building <br> <input
                                        class="form-control" id=""
                                        type="text" placeholder="..." name="cctv_ins_building[]"
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Block <br> <input class="form-control" name="cctv_ins_block[]"
                                        id="" type="text"
                                        placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Area <br> <input class="form-control" name="cctv_ins_area[]"
                                        id="" type="text"
                                        placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    City <br> <input class="form-control"
                                        id=""  type="text" name="cctv_ins_city[]"
                                        placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Photograph of Building <br> <input
                                        class="form-control" id="" name="cctv_ins_photo_building[]"
                                        type="file" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-6 mt-1">
                                    Pin location <br> <input
                                        class="form-control" id="" name="cctv_ins_pin_loc[]"
                                        type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Maintenance Required : <br>
                            <select id="leadcategory"
                                class="form-control mt-1" name="cctv_maintenance_req[]"
                                style="width: 100%;">
                                <option value="">Yes</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Maintenance Required : <br>
                            <select id="leadcategory"
                                class="form-control mt-1" name="cctv_maintenance_req_basis[]"
                                style="width: 100%;">
                                <option value="">Monthly Maintenance
                                </option>
                                <option value="">Annually Maintenance
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            Notes <br> <textarea class="form-control mt-1"
                                id="head_office_name" name="cctv_notes[]"
                                type="text" placeholder="..."
                                style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-6">
                            Attachments <br> <input
                                class="form-control mt-1"
                                id="head_office_email" name="cctv_attachments[]"
                                type="file" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm removeSignAccordion9 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
            </div>
        </div>
        `;

            $('#signatoryAccordion9').append(newSignAccordion9);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion9', function() {
            $(this).closest('.signaccordion-item9').remove();
        });
    });
    </script>


    <!-- Script for show data in table and update of electronic and web Services (CCTV) -->
    <Script>
    $(document).ready(function() {
        // Function to update summary table for signatory entries
        function updateSignatorySummaryTable9() {
            // Clear existing rows
            $('#signatorySummaryTable9 tbody').empty();

            // Iterate through each signatory accordion item and update the summary table
            $('.signaccordion-item9').each(function(index) {
                var category_of_cctv = $(this).find('[name="categoryOfCCTV"]').val();
                var cctv_Brand = $(this).find('[name="cctvBrand"]').val();
                var pixels = $(this).find('[name="pixels"]').val();

                // Check if any relevant data is entered
                if (category_of_cctv || cctv_Brand || pixels) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable9 tbody').append(`
                <tr>
                    <td>${index + 1}</td>
                    <td>${category_of_cctv}</td>
                    <td>${cctv_Brand}</td>
                    <td>${pixels}</td>
                    <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                    <!-- Add more columns as needed -->
                </tr>
            `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory9').on('click', function() {
            var signatoryEntryCount9 = $('#signatoryAccordion9 .signaccordion-item9').length + 1;

            var newSignatoryEntry9 = `
        <!-- Your existing signatory accordion HTML goes here -->
        `;
            console.log('Adding signatory entry:', signatoryEntryCount9);
            $('#signatoryAccordion9').append(newSignatoryEntry9);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable9').on('click', function() {
            // Update the signatory summary table
            updateSignatorySummaryTable9();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item9').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion9', function() {
            $(this).closest('.signaccordion-item9').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable9();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory9').on('click', function(event) {
            event.preventDefault();
        });
    });
    </Script>

    <!-- Script for add more Electronic and web Services (Time Attendance Machine) -->
    <script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory9_1').on('click', function() {
            var SignatoryAccordionCount9_1 = $('#signatoryAccordion9_1 .signaccordion-item9_1').length +
                1;

            var newSignAccordion9_1 = `
        <div class="accordion-item signaccordion-item9_1" id="signatoryEntry9_1${SignatoryAccordionCount9_1}">
            <h2 class="accordion-header" id="signatoryHeading9_1${SignatoryAccordionCount9_1}">
                <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse9_1${SignatoryAccordionCount9_1}" aria-expanded="false" aria-controls="signatoryCollapse9_1${SignatoryAccordionCount9_1}">
                Attendence Machine Entry ${SignatoryAccordionCount9_1}
                </button>
            </h2>
            <div id="signatoryCollapse9_1${SignatoryAccordionCount9_1}" class="collapse" aria-labelledby="signatoryHeading9_1${SignatoryAccordionCount9_1}">
                <div class="accordion-body">
                    <div class="row mb-2" id="signatoryDetailsContainer9_1">
                        <!-- Your content for entry goes here -->
                        <div class="col-lg-6 mt-1">
                            Category <br> <input class="form-control"
                                type="text" name="attendance_category[]" placeholder="..."

                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Rate per Unit <br> <input class="form-control"
                                type="text" name="attendance_rate[]" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Specifications Sheet: <br> <input class="form-control"
                                type="file" name="attendance_sheet[]" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Specifications: <br> <textarea class="form-control"
                                type="file" name="attendance_specifications[]" placeholder="..."
                            style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-6 mt-1">
                            Notes : <br> <textarea class="form-control"
                                type="file" name="attendance_notes[]" placeholder="..."
                                style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-6 mt-1">
                            Attachment : <br> <input class="form-control"
                                type="file" name="attendance_attachment[]" placeholder="..."
                                style="width: 100%;">
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm removeSignAccordion9_1 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
            </div>
        </div>
        `;

            $('#signatoryAccordion9_1').append(newSignAccordion9_1);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion9_1', function() {
            $(this).closest('.signaccordion-item9_1').remove();
        });
    });
    </script>

    <!-- Script for show data in table and update of electronic and web Services (Time Attendance Machine) -->
    <script>
    $(document).ready(function() {
        // Function to update summary table for signatory entries
        function updateSignatorySummaryTable9_1() {
            // Clear existing rows
            $('#signatorySummaryTable9_1 tbody').empty();

            // Iterate through each signatory accordion item and update the summary table
            $('.signaccordion-item9_1').each(function(index) {
                var category_of_AttM = $(this).find('[name="categoryOfTimeAtteM"]').val();
                var rete_per_unit = $(this).find('[name="retePerUnit"]').val();

                // Check if any relevant data is entered
                if (category_of_AttM || rete_per_unit) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable9_1 tbody').append(`
                <tr>
                    <td>${index + 1}</td>
                    <td>${category_of_AttM}</td>
                    <td>${rete_per_unit}</td>
                    <td><button type="button" class="btn btn-primary view-signatory-button9_1" style="width: 100%" data-index="${index}">View</button></td>
                </tr>
            `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory9_1').on('click', function() {
            var signatoryEntryCount9_1 = $('#signatoryAccordion9_1 .signaccordion-item9_1').length + 1;

            var newSignatoryEntry9_1 = `
        <!-- Your existing signatory accordion HTML goes here, adjusted for 9_1 -->
        `;
            console.log('Adding signatory entry:', signatoryEntryCount9_1);
            $('#signatoryAccordion9_1').append(newSignatoryEntry9_1);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable9_1').on('click', function() {
            // Update the signatory summary table
            updateSignatorySummaryTable9_1();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button9_1', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item9_1').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion9_1', function() {
            $(this).closest('.signaccordion-item9_1').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable9_1();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory9_1').on('click', function(event) {
            event.preventDefault();
        });
    });
    </script>


    <!-- Script for add more Electronic and web Services (Web Surveillance Solution) -->
    <script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory9_2').on('click', function() {
            var SignatoryAccordionCount9_2 = $('#signatoryAccordion9_2 .signaccordion-item9_2').length +
                1;

            var newSignAccordion9_2 = `
        <div class="accordion-item signaccordion-item9_2" id="signatoryEntry9_2${SignatoryAccordionCount9_2}">
            <h2 class="accordion-header" id="signatoryHeading9_2${SignatoryAccordionCount9_2}">
                <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse9_2${SignatoryAccordionCount9_2}" aria-expanded="false" aria-controls="signatoryCollapse9_2${SignatoryAccordionCount9_2}">
                Web Surveillance Entry ${SignatoryAccordionCount9_2}
                </button>
            </h2>
            <div id="signatoryCollapse9_2${SignatoryAccordionCount9_2}" class="collapse" aria-labelledby="signatoryHeading9_2${SignatoryAccordionCount9_2}">
                <div class="accordion-body">
                    <div class="row mb-2" id="signatoryDetailsContainer9_2">
                        <!-- Your content for entry goes here -->
                        <div class="col-lg-6 mt-1">
                            Category <br> <input class="form-control"
                                type="text" placeholder="..."

                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Scope of Work <br> <input class="form-control"
                                type="file" placeholder="..."
                                 style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Date of Submission of Report:<br> <input
                                class="form-control" type="date"
                                 placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Notes <br> <textarea class="form-control mt-1"
                                id="head_office_name"
                                type="text" placeholder="..."
                                style="width: 100%;"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger btn-sm removeSignAccordion9_2 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
            </div>
        </div>
        `;

            $('#signatoryAccordion9_2').append(newSignAccordion9_2);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion9_2', function() {
            $(this).closest('.signaccordion-item9_2').remove();
        });
    });
    </script>

    <!-- Script for show data in table and update of electronic and web Services (Web Surveillance Solution) -->
    <script>
    $(document).ready(function() {
        // Function to update summary table for signatory entries
        function updateSignatorySummaryTable9_2() {
            // Clear existing rows
            $('#signatorySummaryTable9_2 tbody').empty();

            // Iterate through each signatory accordion item and update the summary table
            $('.signaccordion-item9_2').each(function(index) {
                var category_of_webSol = $(this).find('[name="categoryOfWebSol"]').val();
                var scope_of_work = $(this).find('[name="scopOfWork"]').val();
                var date_of_submittion = $(this).find('[name="dateOfSubmittion"]').val();

                // Check if any relevant data is entered
                if (category_of_webSol || scope_of_work || date_of_submittion) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable9_2 tbody').append(`
                <tr>
                    <td>${index + 1}</td>
                    <td>${category_of_webSol}</td>
                    <td>${scope_of_work}</td>
                    <td>${date_of_submittion}</td>
                    <td><button type="button" class="btn btn-primary view-signatory-button9_2" style="width: 100%" data-index="${index}">View</button></td>
                </tr>
            `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory9_2').on('click', function() {
            var signatoryEntryCount9_2 = $('#signatoryAccordion9_2 .signaccordion-item9_2').length + 1;

            var newSignatoryEntry9_2 = `
        <!-- Your existing signatory accordion HTML goes here, adjusted for 9_2 -->
        `;
            console.log('Adding signatory entry:', signatoryEntryCount9_2);
            $('#signatoryAccordion9_2').append(newSignatoryEntry9_2);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable9_2').on('click', function() {
            // Update the signatory summary table
            updateSignatorySummaryTable9_2();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button9_2', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item9_2').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion9_2', function() {
            $(this).closest('.signaccordion-item9_2').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable9_2();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory9_2').on('click', function(event) {
            event.preventDefault();
        });
    });
    </script>

    <!-- Script for show Required on daily basis and no of days staff required in men gaurding services -->

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var monthlySelect = document.getElementById('monthlyRequirement');
        var dailySection = document.getElementById('dailyRequirementSection');
        var dailySelect = document.getElementById('dailyRequirement'); // Assuming this is your daily dropdown
        var noOfDayStaffRequired = document.getElementById('noOfDays');

        function toggleDailyRequirement() {
            // console.log('Monthly selection changed:', monthlySelect.value); // Debugging log
            if (monthlySelect.value === 'No') {
                // console.log('Showing daily section'); // Debugging log
                dailySection.style.display = 'block';
            } else {
                // console.log('Hiding daily section'); // Debugging log
                dailySection.style.display = 'none';
                noOfDayStaffRequired.style.display = 'none';
                dailySelect.value = '';
            }

        }

        function toggleNoOfDayStaffRequiredFor() {
            if (dailySelect.value === 'Yes') {
                noOfDayStaffRequired.style.display = 'block';

            } else {
                noOfDayStaffRequired.style.display = 'none';
            }
        }

        toggleDailyRequirement(); // Initial check

        monthlySelect.addEventListener('change', function() {
            toggleDailyRequirement();
            if (monthlySelect.value === 'Yes') {
                noOfDayStaffRequired.style.display = 'none';
            }
        });
        dailySelect.addEventListener('change', toggleNoOfDayStaffRequiredFor);
    });
    </script>

    <!-- Script for show no of days Dogs required and
    Required with Handler in Canine services -->
    <Script>
    document.addEventListener('DOMContentLoaded', function() {
        var requiredFor = document.getElementById('req_leadcategory');
        var noOfDayDogsRequired = document.getElementById('noOfDaysDogs');

        var reqWithHandler = document.getElementById('req_handler_leadcategory');
        var hName = document.getElementById('nameOFHandler');
        var hCNIC = document.getElementById('cnicOFHandler');
        var hAge = document.getElementById('ageOFHandler');
        var hExperience = document.getElementById('experienceOFHandler');
        var hCellNo = document.getElementById('cellNoOFHandler');
        var hCNICF = document.getElementById('cnicFrontOFHandler');
        var hCNICB = document.getElementById('cnicBackOFHandler');


        function toggleNoOfDayDogsRequiredFor() {
            if (requiredFor.value === 'DailyBasis') {
                noOfDayDogsRequired.style.display = 'block';
            } else {
                noOfDayDogsRequired.style.display = 'none';
            }
        }
        toggleNoOfDayDogsRequiredFor();

        function toggleHandlerDetails() {
            if (reqWithHandler.value === "Yes") {
                hName.style.display = 'block';
                hCNIC.style.display = 'block';
                hAge.style.display = 'block';
                hExperience.style.display = 'block';
                hCellNo.style.display = 'block';
                hCNICF.style.display = 'block';
                hCNICB.style.display = 'block';
            } else {
                hName.style.display = 'none';
                hCNIC.style.display = 'none';
                hAge.style.display = 'none';
                hExperience.style.display = 'none';
                hCellNo.style.display = 'none';
                hCNICF.style.display = 'none';
                hCNICB.style.display = 'none';
            }
        }
        toggleHandlerDetails();


        requiredFor.addEventListener('change', toggleNoOfDayDogsRequiredFor);
        reqWithHandler.addEventListener('change', toggleHandlerDetails);
    });
    </Script>

    <!-- Script for show (Rate of fuel per kilometer) field of privet jet -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {

        var selectFuel = document.getElementById('leadcategoryfuel');
        var rateOfFuelField = document.getElementById('rateOfFuel');

        function toggleRateOfFuelTextField() {
            if (selectFuel.value === 'As Per Kilometer') {
                rateOfFuelField.style.display = 'block';
            } else {
                rateOfFuelField.style.display = 'none';
            }
        }
        toggleRateOfFuelTextField();

        selectFuel.addEventListener('change', toggleRateOfFuelTextField);
    })
    </script>

    <!-- Script for Add more with complains-Hidden WHT (in commercial section) -->

    <script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory11').on('click', function() {
            var SignatoryAccordionCount11 = $('#signatoryAccordion11 .signaccordion-item11').length + 1;

            var newSignAccordion11 = `
                <div class="accordion-item signaccordion-item11" id="signatoryEntry11${SignatoryAccordionCount11}">
                    <h2 class="accordion-header" id="signatoryHeading11${SignatoryAccordionCount11}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse11${SignatoryAccordionCount11}" aria-expanded="false" aria-controls="signatoryCollapse11${SignatoryAccordionCount11}">
                            Entry ${SignatoryAccordionCount11}
                        </button>
                    </h2>
                    <div id="signatoryCollapse11${SignatoryAccordionCount11}" class="collapse" aria-labelledby="signatoryHeading11${SignatoryAccordionCount11}">
                        <div class="accordion-body">
                            <div class="row mb-2" id="signatoryDetailsContainer11">
                                <div class="col-12 d-flex">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            Category : <br>
                                            <select  name="wc_hw_category[]" class="form-control mt-1"
                                                style="width: 100%;">
                                                <option>Select</option>
                                                <option value="Armed Security Supervisor">Armed Security
                                                    Supervisor</option>
                                                <option value="Armed Security Guard
                                                    (Ex-Army">Armed Security Guard
                                                    (Ex-Army)</option>
                                                <option value="Armed Security Guard
                                                    (Civil)">Armed Security Guard
                                                    (Civil)</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Social Security:</label>
                                            <input class="form-control" name="wc_hw_social[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Weapon & Ammunition
                                                Cost:</label>
                                            <input class="form-control" name="wc_hw_weapon[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Monthly Rate Per
                                                Unit:</label>
                                            <input class="form-control monthly_Rate_Per_UnitFieldc"
                                            name="wc_hw_monthly_rate[]" type="text" placeholder="..."
                                                style="width: 100%;" readOnly>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Total Monthly Rate per
                                                Unit:</label>
                                            <input class="form-control totalMonthlyRatePerUnitFieldc"
                                            name="wc_hw_total_monthly_rate[]" type="text" placeholder="..."
                                                style="width: 100%;" readOnly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">WHT:</label>
                                            <input class="form-control whtFieldc" name="wc_hw_wht[]" type="text"
                                                placeholder="..." style="width: 100%;" readOnly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Salary:</label>
                                            <input class="form-control" id="hidesalary" name="wc_hw_salary[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Group/ Life
                                                insurance:</label>
                                            <input class="form-control" name="wc_hw_group[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Training Cost:</label>
                                            <input class="form-control" name="wc_hw_training_cost[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Applicable GST
                                                Percentage:</label>
                                            <input class="form-control" name="wc_hw_app_gst[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-check-label" for="">GST:</label>
                                            <input class="form-control gstFieldc" name="wc_hw_gst[]" type="text"
                                                placeholder="..." style="width: 100%;" readOnly>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Admin Cost:</label>
                                            <input class="form-control adminCostFieldc" name="wc_hw_admin_cost[]"
                                                type="text" placeholder="..." style="width: 100%;" readOnly>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Reliever Allowance:</label>
                                            <input class="form-control "
                                            name="wc_hw_rel_allowance[]" id="hiderelieverAllowance" type="text" placeholder="..."
                                                style="width: 100%;" readOnly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">EOBI:</label>
                                            <input class="form-control" name="wc_hw_eobi[]" name="EOBI" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Uniform Cost:</label>
                                            <input class="form-control" name="wc_hw_uni_cost[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Hidden Admin Cost:</label>
                                            <input class="form-control" id="hiddenAdminCostField"
                                            name="wc_hw_hidden_admin_cost[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Applicable WHT
                                                Percentage:</label>
                                            <input class="form-control" name="wc_hw_app_wht_per[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Total Admin Cost:</label>
                                            <input class="form-control totalAdminCostFieldc"
                                                name="wc_hw_total_admin_cost[]" type="text" placeholder="..."
                                                style="width: 100%;" readOnly>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeSignAccordion11 mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion11').append(newSignAccordion11);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion11', function() {
            $(this).closest('.signaccordion-item11').remove();
        });
    });
    </script>

    <!-- Script for show data in table of complains-Hidden WHT (in commercial section) -->

    <script>
    $(document).ready(function() {
        // Function to update summary table for entries
        function updateSignatorySummaryTable11() {
            // Clear existing rows
            $('#signatorySummaryTable11 tbody').empty();

            // Iterate through each signatory accordion item and update the summary table
            $('.signaccordion-item11').each(function(index) {
                var category_of_G = $(this).find('[name="categoryOfG"]').val();
                var salary = parseFloat($(this).find('[name="salry"]').val());
                // var Reli_Allow = parseFloat($(this).find('[name="relieverAllowance"]').val());
                var eobi = parseFloat($(this).find('[name="EOBI"]').val());
                var social_Sec = parseFloat($(this).find('[name="socialSecuirty"]').val());
                var group_L_Ins = parseFloat($(this).find('[name="groupLifeInsurance"]').val());
                var uniform_Cost = parseFloat($(this).find('[name="uniformCost"]').val());
                var weapon_Amm_Cost = parseFloat($(this).find('[name="w&ACost"]').val());
                var traninig_Cost = parseFloat($(this).find('[name="traningCost"]').val());
                // var admin_Cost = parseFloat($(this).find('[name="adminCost"]').val());
                // var monthly_R_P_U = parseFloat($(this).find('[name="monthlyRatePerUnit"]').val());
                // var gst = parseFloat($(this).find('[name="gst"]').val());
                // var total_Monthly_R_P_U = parseFloat($(this).find('[name="totalMonthlyRatePerUnit"]').val());

                var hidden_Admin_Cost = parseFloat($(this).find('[name="hiddenAdminCost"]').val());
                // var total_admin_cost = parseFloat($(this).find('[name="totalAdminCost"]').val());
                var app_gst_percentage = parseFloat($(this).find('[name="app_gst_perc"]').val());
                var app_wht_percentage = parseFloat($(this).find('[name="app_wht_perc"]').val());

                // For Reliever Allowance
                var reli_allowance = parseFloat($(this).find('[name="relieverAllowance"]').val());

                // $('#reli_allowField').val(
                //     reli_allowance);
                // $('.reli_allowFieldc').val(reli_allowance);

                // Sum Of Following For Admin Cost
                var forAdminCost_sof = salary + reli_allowance + eobi + social_Sec + group_L_Ins +
                    uniform_Cost + weapon_Amm_Cost + traninig_Cost;
                console.log(forAdminCost_sof, 'sof');

                // For Admin Cost
                var AdmiCost = parseFloat(((hidden_Admin_Cost + (forAdminCost_sof / 0.96)) -
                    forAdminCost_sof).toFixed(2));
                $(this).find('.adminCostFieldc').val(AdmiCost);
                // $('#adminCostField').val(AdmiCost);
                // $('.adminCostFieldc').val(AdmiCost);

                // For Monthly Rate Per Unit
                var monthly_Rate_Per_Unit = parseFloat((salary + reli_allowance + eobi + social_Sec +
                        group_L_Ins + uniform_Cost + weapon_Amm_Cost + traninig_Cost + AdmiCost)
                    .toFixed(2));
                $(this).find('.monthly_Rate_Per_UnitFieldc').val(monthly_Rate_Per_Unit);
                // $('#monthly_Rate_Per_UnitField').val(monthly_Rate_Per_Unit);
                // $('.monthly_Rate_Per_UnitFieldc').val(monthly_Rate_Per_Unit);

                // For Total Admin Cost
                var total_Admin_Cost = parseFloat((AdmiCost + hidden_Admin_Cost).toFixed(2));
                $(this).find('.totalAdminCostFieldc').val(total_Admin_Cost);
                // $('#totalAdminCostField').val(total_Admin_Cost);
                // $('.totalAdminCostFieldc').val(total_Admin_Cost);

                // For GST
                var gst = parseFloat((monthly_Rate_Per_Unit * (app_gst_percentage / 100)).toFixed(2));
                $(this).find('.gstFieldc').val(gst);
                // $('#gstField').val(gst);
                // $('.gstFieldc').val(gst);

                // For Total Monthly Rate Per Unit
                var total_Monthly_R_P_U = parseFloat((monthly_Rate_Per_Unit + gst).toFixed(2));
                $(this).find('.totalMonthlyRatePerUnitFieldc').val(total_Monthly_R_P_U);
                // $('#totalMonthlyRatePerUnitField').val(total_Monthly_R_P_U);
                // $('.totalMonthlyRatePerUnitFieldc').val(total_Monthly_R_P_U);

                // For WHT
                var wht = parseFloat((total_Monthly_R_P_U - (monthly_Rate_Per_Unit + gst)).toFixed(2));
                $(this).find('.whtFieldc').val(wht);
                // $('#whtField').val(wht);
                // $('.whtFieldc').val(wht);


                // Check if any relevant data is entered
                if (category_of_G || salary || reli_allowance || eobi || social_Sec ||
                    group_L_Ins || uniform_Cost || weapon_Amm_Cost ||
                    traninig_Cost || AdmiCost || monthly_Rate_Per_Unit || gst ||
                    total_Monthly_R_P_U || hidden_Admin_Cost || total_Admin_Cost) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable11 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${category_of_G}</td>
                            <td>${salary}</td>
                            <td>${reli_allowance}</td>
                            <td>${eobi}</td>
                            <td>${social_Sec}</td>
                            <td>${group_L_Ins}</td>
                            <td>${uniform_Cost}</td>
                            <td>${weapon_Amm_Cost}</td>
                            <td>${traninig_Cost}</td>
                            <td>${AdmiCost}</td>
                            <td>${monthly_Rate_Per_Unit}</td>
                            <td>${gst}</td>
                            <td>${total_Monthly_R_P_U}</td>
                            <td>${hidden_Admin_Cost}</td>
                            <td>${total_Admin_Cost}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button11" style="width: 100%;" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory11').on('click', function() {
            var signatoryEntryCount11 = $('#signatoryAccordion11 .signaccordion-item11')
                .length + 1;

            var newSignatoryEntry11 = `
                <!-- Your existing signatory accordion HTML goes here -->

            `;
            console.log('Adding signatory entry:', signatoryEntryCount11);
            $('#signatoryAccordion11').append(newSignatoryEntry11);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable11').on('click', function() {
            // Update the signatory summary table
            updateSignatorySummaryTable11();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button11', function() {
            var index = $(this).data('index');
            var accordionItem11 = $('.signaccordion-item11').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem11.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion11', function() {
            $(this).closest('.signaccordion-item11').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable11();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory11').on('click', function(event) {
            event.preventDefault();
        });
    });
    </script>

    <!-- Script for Add more with complains-Shown WHT (in commercial section) -->
    <script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory12').on('click', function() {
            var SignatoryAccordionCount12 = $('#signatoryAccordion12 .signaccordion-item12').length + 1;

            var newSignAccordion12 = `
                <div class="accordion-item signaccordion-item12" id="signatoryEntry12${SignatoryAccordionCount12}">
                    <h2 class="accordion-header" id="signatoryHeading12${SignatoryAccordionCount12}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse12${SignatoryAccordionCount12}" aria-expanded="false" aria-controls="signatoryCollapse12${SignatoryAccordionCount12}">
                            Entry ${SignatoryAccordionCount12}
                        </button>
                    </h2>
                    <div id="signatoryCollapse12${SignatoryAccordionCount12}" class="collapse" aria-labelledby="signatoryHeading12${SignatoryAccordionCount12}">
                        <div class="accordion-body">
                            <div class="row mb-2" id="signatoryDetailsContainer12">
                                <div class="col-12 d-flex">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            Category : <br>
                                            <select id="category" name="wc_sw_category[]" class="form-control mt-1" name="categoryOfG"
                                                style="width: 100%;">
                                                <option>Select</option>
                                                <option value="Armed Security Supervisor">Armed Security
                                                    Supervisor</option>
                                                <option value="Armed Security Guard
                                                    (Ex-Army">Armed Security Guard
                                                    (Ex-Army)</option>
                                                <option value="Armed Security Guard
                                                    (Civil)">Armed Security Guard
                                                    (Civil)</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Social Security:</label>
                                            <input class="form-control" name="wc_sw_social_check[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Weapon & Ammunition
                                                Cost:</label>
                                            <input class="form-control" name="wc_sw_weapon[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Monthly Rate Per
                                                Unit:</label>
                                            <input class="form-control monthly_Rate_Per_UnitFieldc1"
                                            name="wc_sw_monthly_rate[]" type="text" placeholder="..."
                                                style="width: 100%;" readOnly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Total Monthly Rate per
                                                Unit:</label>
                                            <input class="form-control totalMonthlyRatePerUnitFieldc1"
                                            name="wc_sw_total_monthly_rate[]" type="text" placeholder="..."
                                                style="width: 100%;" readONly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-check-label"  for="">Salary:</label>
                                            <input class="form-control" id="salary" name="wc_sw_salary[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Group/ Life
                                                insurance:</label>
                                            <input class="form-control"  name="wc_sw_group[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Training Cost:</label>
                                            <input class="form-control" name="wc_sw_training_cost[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Applicable GST
                                                Percentage:</label>
                                            <input class="form-control" name="wc_sw_app_gst[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">GST:</label>
                                            <input class="form-control gstFieldc1" name="wc_sw_monthly_gst[]" type="text"
                                                placeholder="..." style="width: 100%;" readOnly>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Reliever Allowance:</label>
                                            <input class="form-control "
                                            name="wc_sw_rel_allowance[]" id="relieverAllowance" type="text" placeholder="..."
                                                style="width: 100%;" readOnly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">EOBI:</label>
                                            <input class="form-control" name="wc_sw_eobi[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Uniform Cost:</label>
                                            <input class="form-control" name="wc_sw_uni_cost[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label class="form-check-label" for="">Hidden Admin Cost:</label>
                                            <input class="form-control" id="hiddenAdminCostField"
                                                name="hiddenAdminCost" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div> -->
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Applicable WHT
                                                Percentage:</label>
                                            <input class="form-control" name="wc_sw_app_wht[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">WHT:</label>
                                            <input class="form-control whtFieldc1" name="wc_sw_wht[]" type="text"
                                                placeholder="..." style="width: 100%;" readOnly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Admin Cost:</label>
                                            <input class="form-control" id="adminCostField" name="wc_sw_admin_cost[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label class="form-check-label" for="">Total Admin Cost:</label>
                                            <input class="form-control" id="totalAdminCostField"
                                                name="totalAdminCost" type="text" placeholder="..."
                                                style="width: 100%;" readOnly>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeSignAccordion12 mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion12').append(newSignAccordion12);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion12', function() {
            $(this).closest('.signaccordion-item12').remove();
        });
    });
    </script>

    <!-- Script for show data in table of complains-Shown WHT (in commercial section) -->
    <script>
    $(document).ready(function() {
        // Function to update summary table for entries
        function updateSignatorySummaryTable12() {
            // Clear existing rows
            $('#signatorySummaryTable12 tbody').empty();

            // Iterate through each signatory accordion item and update the summary table
            $('.signaccordion-item12').each(function(index) {
                var category_of_G = $(this).find('[name="categoryOfG"]').val();
                var salary = parseFloat($(this).find('[name="salry"]').val());
                var reli_allowance = parseFloat($(this).find('[name="hiderelieverAllowance"]').val());
                var eobi = parseFloat($(this).find('[name="EOBI"]').val());
                var social_Sec = parseFloat($(this).find('[name="socialSecuirty"]').val());
                var group_L_Ins = parseFloat($(this).find('[name="groupLifeInsurance"]').val());
                var uniform_Cost = parseFloat($(this).find('[name="uniformCost"]').val());
                var weapon_Amm_Cost = parseFloat($(this).find('[name="w&ACost"]').val());
                var traninig_Cost = parseFloat($(this).find('[name="traningCost"]').val());
                var admin_Cost = parseFloat($(this).find('[name="adminCost"]').val());
                // var monthly_R_P_U = parseFloat($(this).find('[name="monthlyRatePerUnit"]').val());
                // var gst = parseFloat($(this).find('[name="gst"]').val());
                // var total_Monthly_R_P_U = parseFloat($(this).find('[name="totalMonthlyRatePerUnit"]').val());

                // var hidden_Admin_Cost = parseFloat($(this).find('[name="hiddenAdminCost"]').val());
                // var total_admin_cost = parseFloat($(this).find('[name="totalAdminCost"]').val());
                var app_gst_percentage = parseFloat($(this).find('[name="app_gst_perc"]').val());
                var app_wht_percentage = parseFloat($(this).find('[name="app_wht_perc"]').val());


                // Sum Of Following For Admin Cost
                // var forAdminCost_sof = salary + reli_allowance + eobi + social_Sec + group_L_Ins +
                //     uniform_Cost + weapon_Amm_Cost + traninig_Cost;
                // console.log(forAdminCost_sof, 'sof');

                // For Admin Cost
                // var AdmiCost = parseFloat(((hidden_Admin_Cost + (forAdminCost_sof / 0.96)) -
                //     forAdminCost_sof).toFixed(2));
                // $('#adminCostField').val(AdmiCost);
                // $('.adminCostFieldc').val(AdmiCost);

                // For Monthly Rate Per Unit
                var monthly_Rate_Per_Unit = parseFloat((salary + reli_allowance + eobi + social_Sec +
                        group_L_Ins + uniform_Cost + weapon_Amm_Cost + traninig_Cost + admin_Cost)
                    .toFixed(2));
                $(this).find('.monthly_Rate_Per_UnitFieldc1').val(monthly_Rate_Per_Unit);
                // For Total Admin Cost
                // var total_Admin_Cost = parseFloat((AdmiCost + hidden_Admin_Cost).toFixed(2));
                // $('#totalAdminCostField').val(total_Admin_Cost);
                // $('.totalAdminCostFieldc').val(total_Admin_Cost);

                // For GST
                var gst = parseFloat((monthly_Rate_Per_Unit * (app_gst_percentage / 100)).toFixed(2));
                $(this).find('.gstFieldc1').val(gst);
                // $('.gstFieldc1').val(gst);

                // For Total Monthly Rate Per Unit
                var total_Monthly_R_P_U = parseFloat(((monthly_Rate_Per_Unit + gst) / 0.96).toFixed(2));
                $(this).find('.totalMonthlyRatePerUnitFieldc1').val(total_Monthly_R_P_U);

                // For WHT
                var wht = parseFloat((total_Monthly_R_P_U - (monthly_Rate_Per_Unit + gst)).toFixed(2));
                $(this).find('.whtFieldc1').val(wht);


                // Check if any relevant data is entered
                if (category_of_G || salary || reli_allowance || eobi || social_Sec ||
                    group_L_Ins || uniform_Cost || weapon_Amm_Cost ||
                    traninig_Cost || admin_Cost || monthly_Rate_Per_Unit || gst ||
                    wht || total_Monthly_R_P_U) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable12 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${category_of_G}</td>
                            <td>${salary}</td>
                            <td>${reli_allowance}</td>
                            <td>${eobi}</td>
                            <td>${social_Sec}</td>
                            <td>${group_L_Ins}</td>
                            <td>${uniform_Cost}</td>
                            <td>${weapon_Amm_Cost}</td>
                            <td>${traninig_Cost}</td>
                            <td>${admin_Cost}</td>
                            <td>${monthly_Rate_Per_Unit}</td>
                            <td>${gst}</td>
                            <td>${wht}</td>
                            <td>${total_Monthly_R_P_U}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button12" style="width: 100%;" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory12').on('click', function() {
            var signatoryEntryCount12 = $('#signatoryAccordion12 .signaccordion-item12')
                .length + 1;

            var newSignatoryEntry12 = `
                <!-- Your existing signatory accordion HTML goes here -->

            `;
            console.log('Adding signatory entry:', signatoryEntryCount12);
            $('#signatoryAccordion12').append(newSignatoryEntry12);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable12').on('click', function() {
            // Update the signatory summary table
            updateSignatorySummaryTable12();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button12', function() {
            var index = $(this).data('index');
            var accordionItem12 = $('.signaccordion-item12').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem12.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion12', function() {
            $(this).closest('.signaccordion-item12').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable12();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory12').on('click', function(event) {
            event.preventDefault();
        });
    });
    </script>

    <!--  Script for Add more with Lump sum-Shown WHT (in commercial section)  -->
    <script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory13').on('click', function() {
            var SignatoryAccordionCount13 = $('#signatoryAccordion13 .signaccordion-item13').length + 1;

            var newSignAccordion13 = `
                <div class="accordion-item signaccordion-item13" id="signatoryEntry13${SignatoryAccordionCount13}">
                    <h2 class="accordion-header" id="signatoryHeading13${SignatoryAccordionCount13}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse13${SignatoryAccordionCount13}" aria-expanded="false" aria-controls="signatoryCollapse13${SignatoryAccordionCount13}">
                            Entry ${SignatoryAccordionCount13}
                        </button>
                    </h2>
                    <div id="signatoryCollapse13${SignatoryAccordionCount13}" class="collapse" aria-labelledby="signatoryHeading13${SignatoryAccordionCount13}">
                        <div class="accordion-body">
                            <div class="row mb-2" id="signatoryDetailsContainer13">
                                <div class="col-12 d-flex">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            Category : <br>
                                            <select id="category" class="form-control mt-1"
                                                style="width: 100%;">
                                                <option value="">select</option>
                                                <option value="Armed Security Supervisor">Armed Security
                                                    Supervisor</option>
                                                <option value="Armed Security Guard
                                                    (Ex-Army)">Armed Security Guard(Ex-Army)</option>
                                                <option value="Armed Security Guard
                                                    (Civil)">Armed Security Guard(Civil)</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Social Security:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Weapon & Ammunition
                                                Cost:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Monthly Rate Per
                                                Unit:</label>
                                            <input class="form-control monthly_Rate_Per_UnitFieldc2"
                                                 type="text" placeholder="..."
                                                style="width: 100%;" readOnly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Total Monthly Rate per
                                                Unit:</label>
                                            <input class="form-control totalMonthlyRatePerUnitFieldc2"
                                                type="text" placeholder="..."
                                                style="width: 100%;" readOnly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Salary:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Group/ Life
                                                        Insur-ancet:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Training Cost:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Applicable GST:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">GST:</label>
                                            <input class="form-control gstFieldc2"  type="text"
                                                placeholder="..." style="width: 100%;" readOnly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">EOBI:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Uniform Cost:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Admin Cost:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Applicable WHT:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">WHT:</label>
                                            <input class="form-control whtFieldc2"  type="text"
                                                placeholder="..." style="width: 100%;" readOnly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeSignAccordion13 mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion13').append(newSignAccordion13);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion13', function() {
            $(this).closest('.signaccordion-item13').remove();
        });
    });
    </script>

    <!-- Script for show data in table of Lump sum-Shown WHT (in commercial section) -->
    <script>
    $(document).ready(function() {
        // Function to update summary table for entries
        function updateSignatorySummaryTable13() {
            // Clear existing rows
            $('#signatorySummaryTable13 tbody').empty();

            // Iterate through each signatory accordion item and update the summary table
            $('.signaccordion-item13').each(function(index) {
                var category_of_G = $(this).find('[name="categoryOfG"]').val();
                var salary = parseFloat($(this).find('[name="salry"]').val());
                // var Reli_Allow = parseFloat($(this).find('[name="relieverAllowance"]').val());
                var eobi = parseFloat($(this).find('[name="EOBI"]').val());
                var social_Sec = parseFloat($(this).find('[name="socialSecuirty"]').val());
                var group_L_Ins = parseFloat($(this).find('[name="groupLifeInsurance"]').val());
                var uniform_Cost = parseFloat($(this).find('[name="uniformCost"]').val());
                var weapon_Amm_Cost = parseFloat($(this).find('[name="w&ACost"]').val());
                var traninig_Cost = parseFloat($(this).find('[name="traningCost"]').val());
                var admin_Cost = parseFloat($(this).find('[name="adminCost"]').val());
                // var monthly_R_P_U = parseFloat($(this).find('[name="monthlyRatePerUnit"]').val());
                // var gst = parseFloat($(this).find('[name="gst"]').val());
                // var total_Monthly_R_P_U = parseFloat($(this).find('[name="totalMonthlyRatePerUnit"]').val());

                // var hidden_Admin_Cost = parseFloat($(this).find('[name="hiddenAdminCost"]').val());
                // var total_admin_cost = parseFloat($(this).find('[name="totalAdminCost"]').val());
                var app_gst_percentage = parseFloat($(this).find('[name="app_gst_perc"]').val());
                var app_wht_percentage = parseFloat($(this).find('[name="app_wht_perc"]').val());

                // For Reliever Allowance
                var reli_allowance = parseFloat((salary / (26 * 4)).toFixed(2));
                parseFloat($(this).find('.reli_allowFieldc2').val(reli_allowance));

                // Sum Of Following For Admin Cost
                // var forAdminCost_sof = salary + reli_allowance + eobi + social_Sec + group_L_Ins +
                //     uniform_Cost + weapon_Amm_Cost + traninig_Cost;
                // console.log(forAdminCost_sof, 'sof');

                // For Admin Cost
                // var AdmiCost = parseFloat(((hidden_Admin_Cost + (forAdminCost_sof / 0.96)) -
                //     forAdminCost_sof).toFixed(2));
                // $('#adminCostField').val(AdmiCost);
                // $('.adminCostFieldc').val(AdmiCost);

                // For Monthly Rate Per Unit
                var monthly_Rate_Per_Unit = (salary + reli_allowance + eobi + social_Sec +
                    group_L_Ins + uniform_Cost + weapon_Amm_Cost + traninig_Cost + admin_Cost);
                var monthly_Rate_Per_Unit = parseFloat(monthly_Rate_Per_Unit.toFixed(2));
                //console.log(monthly_Rate_Per_Unit);
                $(this).find('.monthly_Rate_Per_UnitFieldc2').val(monthly_Rate_Per_Unit);
                // For Total Admin Cost
                // var total_Admin_Cost = parseFloat((AdmiCost + hidden_Admin_Cost).toFixed(2));
                // $('#totalAdminCostField').val(total_Admin_Cost);
                // $('.totalAdminCostFieldc').val(total_Admin_Cost);

                // For GST
                var gst = parseFloat((monthly_Rate_Per_Unit * (app_gst_percentage / 100)).toFixed(2));
                $(this).find('.gstFieldc2').val(gst);
                // $('.gstFieldc1').val(gst);

                // For Total Monthly Rate Per Unit
                var total_Monthly_R_P_U = parseFloat(((monthly_Rate_Per_Unit + gst) / 0.96).toFixed(2));
                $(this).find('.totalMonthlyRatePerUnitFieldc2').val(total_Monthly_R_P_U);

                // For WHT
                var wht = parseFloat((total_Monthly_R_P_U - (monthly_Rate_Per_Unit + gst)).toFixed(2));
                $(this).find('.whtFieldc2').val(wht);


                // Check if any relevant data is entered
                if (category_of_G || salary || reli_allowance || uniform_Cost || weapon_Amm_Cost ||
                    traninig_Cost || admin_Cost || monthly_Rate_Per_Unit || gst ||
                    wht || total_Monthly_R_P_U) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable13 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${category_of_G}</td>
                            <td>${salary}</td>
                            <td>${reli_allowance}</td>
                            <td>${uniform_Cost}</td>
                            <td>${weapon_Amm_Cost}</td>
                            <td>${traninig_Cost}</td>
                            <td>${admin_Cost}</td>
                            <td>${monthly_Rate_Per_Unit}</td>
                            <td>${gst}</td>
                            <td>${wht}</td>
                            <td>${total_Monthly_R_P_U}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button13" style="width: 100%;" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory13').on('click', function() {
            var signatoryEntryCount13 = $('#signatoryAccordion13 .signaccordion-item13')
                .length + 1;

            var newSignatoryEntry13 = `
                <!-- Your existing signatory accordion HTML goes here -->

            `;
            console.log('Adding signatory entry:', signatoryEntryCount13);
            $('#signatoryAccordion13').append(newSignatoryEntry13);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable13').on('click', function() {
            // Update the signatory summary table
            updateSignatorySummaryTable13();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button13', function() {
            var index = $(this).data('index');
            var accordionItem13 = $('.signaccordion-item13').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem13.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion13', function() {
            $(this).closest('.signaccordion-item13').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable13();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory13').on('click', function(event) {
            event.preventDefault();
        });
    });
    </script>

    <!--  Script for Add more with Lump sum-Hidden WHT (in commercial section)  -->
    <script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory14').on('click', function() {
            var SignatoryAccordionCount14 = $('#signatoryAccordion14 .signaccordion-item14').length + 1;

            var newSignAccordion14 = `
                <div class="accordion-item signaccordion-item14" id="signatoryEntry14${SignatoryAccordionCount14}">
                    <h2 class="accordion-header" id="signatoryHeading14${SignatoryAccordionCount14}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse14${SignatoryAccordionCount14}" aria-expanded="false" aria-controls="signatoryCollapse14${SignatoryAccordionCount14}">
                            Entry ${SignatoryAccordionCount14}
                        </button>
                    </h2>
                    <div id="signatoryCollapse14${SignatoryAccordionCount14}" class="collapse" aria-labelledby="signatoryHeading14${SignatoryAccordionCount14}">
                        <div class="accordion-body">
                            <div class="row mb-2" id="signatoryDetailsContainer14">
                                <div class="col-12 d-flex">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            Category : <br>
                                            <select id="category" class="form-control mt-1"
                                                style="width: 100%;">
                                                <option value="">select</option>
                                                <option value="Armed Security Supervisor">Armed Security
                                                    Supervisor</option>
                                                <option value="Armed Security Guard(Ex-Army)">Armed Security
                                                    Guard
                                                    (Ex-Army)</option>
                                                <option value="Armed Security Guard(Civil)">Armed Security Guard
                                                    (Civil)</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Uniform Cost:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Weapon & Ammunition
                                                Cost:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Monthly Rate Per
                                                Unit:</label>
                                            <input class="form-control monthly_Rate_Per_UnitFieldc3" type="text"
                                                placeholder="..." style="width: 100%;"
                                                readOnly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Total Monthly Rate per
                                                Unit:</label>
                                            <input class="form-control totalMonthlyRatePerUnitFieldc3"
                                                type="text" placeholder="..."
                                                style="width: 100%;" readOnly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Salary:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Social Security:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Training Cost:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Applicable GST
                                                Percentage:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">GST:</label>
                                            <input class="form-control gstFieldc3"  type="text"
                                                placeholder="..." style="width: 100%;" readOnly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Admin Cost:</label>
                                            <input class="form-control adminCostFieldc3"
                                                type="text" placeholder="..." style="width: 100%;" readOnly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">EOBI:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Group/ Life insurance:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Hidden Admin Cost:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Applicable WHT
                                                Percentage:</label>
                                            <input class="form-control"  type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">WHT:</label>
                                            <input class="form-control whtFieldc3"  type="text"
                                                placeholder="..." style="width: 100%;" readOnly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check-label" for="">Total Admin Cost:</label>
                                            <input class="form-control totalAdminCostFieldc3"
                                                type="text" placeholder="..."
                                                style="width: 100%;" readOnly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeSignAccordion14 mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion14').append(newSignAccordion14);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion14', function() {
            $(this).closest('.signaccordion-item14').remove();
        });
    });
    </script>

    <!-- Script for show data in table of Lump sum-Hidden WHT (in commercial section) -->
    <script>
    $(document).ready(function() {
        // Function to update summary table for entries
        function updateSignatorySummaryTable14() {
            // Clear existing rows
            $('#signatorySummaryTable14 tbody').empty();

            // Iterate through each signatory accordion item and update the summary table
            $('.signaccordion-item14').each(function(index) {
                var category_of_G = $(this).find('[name="categoryOfG"]').val();
                var salary = parseFloat($(this).find('[name="salry"]').val());
                // var Reli_Allow = parseFloat($(this).find('[name="relieverAllowance"]').val());
                var eobi = parseFloat($(this).find('[name="EOBI"]').val());
                var social_Sec = parseFloat($(this).find('[name="socialSecuirty"]').val());
                var group_L_Ins = parseFloat($(this).find('[name="groupLifeInsurance"]').val());
                var uniform_Cost = parseFloat($(this).find('[name="uniformCost"]').val());
                var weapon_Amm_Cost = parseFloat($(this).find('[name="w&ACost"]').val());
                var traninig_Cost = parseFloat($(this).find('[name="traningCost"]').val());
                // var admin_Cost = parseFloat($(this).find('[name="adminCost"]').val());
                // var monthly_R_P_U = parseFloat($(this).find('[name="monthlyRatePerUnit"]').val());
                // var gst = parseFloat($(this).find('[name="gst"]').val());
                // var total_Monthly_R_P_U = parseFloat($(this).find('[name="totalMonthlyRatePerUnit"]').val());

                var hidden_Admin_Cost = parseFloat($(this).find('[name="hiddenAdminCost"]').val());
                // var total_admin_cost = parseFloat($(this).find('[name="totalAdminCost"]').val());
                var app_gst_percentage = parseFloat($(this).find('[name="app_gst_perc"]').val());
                var app_wht_percentage = parseFloat($(this).find('[name="app_wht_perc"]').val());

                // For Reliever Allowance

                var reli_allowance = parseFloat((salary / (26 * 4)).toFixed(2));

                // $(this).find('.reli_allowFieldc3').val(reli_allowance);
                // $('#reli_allowField').val(
                //     reli_allowance);
                // $('.reli_allowFieldc').val(reli_allowance);

                // Sum Of Following For Admin Cost
                var forAdminCost_sof = (salary + reli_allowance + eobi + social_Sec + group_L_Ins +
                    uniform_Cost + weapon_Amm_Cost + traninig_Cost);
                console.log(forAdminCost_sof, 'sof');

                // For Admin Cost
                var AdmiCost = parseFloat(((hidden_Admin_Cost + (forAdminCost_sof / 0.96)) -
                    forAdminCost_sof).toFixed(2));
                $(this).find('.adminCostFieldc3').val(AdmiCost);
                // $('#adminCostField').val(AdmiCost);
                // $('.adminCostFieldc').val(AdmiCost);

                // For Monthly Rate Per Unit
                var monthly_Rate_Per_Unit = parseFloat((salary + reli_allowance + eobi + social_Sec +
                        group_L_Ins + uniform_Cost + weapon_Amm_Cost + traninig_Cost + AdmiCost)
                    .toFixed(2));
                $(this).find('.monthly_Rate_Per_UnitFieldc3').val(monthly_Rate_Per_Unit);
                // $('#monthly_Rate_Per_UnitField').val(monthly_Rate_Per_Unit);
                // $('.monthly_Rate_Per_UnitFieldc').val(monthly_Rate_Per_Unit);

                // For Total Admin Cost
                var total_Admin_Cost = parseFloat((AdmiCost + hidden_Admin_Cost).toFixed(2));
                $(this).find('.totalAdminCostFieldc3').val(total_Admin_Cost);
                // $('#totalAdminCostField').val(total_Admin_Cost);
                // $('.totalAdminCostFieldc').val(total_Admin_Cost);

                // For GST
                var gst = parseFloat((monthly_Rate_Per_Unit * (app_gst_percentage / 100)).toFixed(2));
                $(this).find('.gstFieldc3').val(gst);
                // $('#gstField').val(gst);
                // $('.gstFieldc').val(gst);

                // For Total Monthly Rate Per Unit
                var total_Monthly_R_P_U = parseFloat((monthly_Rate_Per_Unit + gst).toFixed(2));
                $(this).find('.totalMonthlyRatePerUnitFieldc3').val(total_Monthly_R_P_U);
                // $('#totalMonthlyRatePerUnitField').val(total_Monthly_R_P_U);
                // $('.totalMonthlyRatePerUnitFieldc').val(total_Monthly_R_P_U);

                // For WHT
                var wht = parseFloat((total_Monthly_R_P_U - (monthly_Rate_Per_Unit + gst)).toFixed(2));
                $(this).find('.whtFieldc3').val(wht);
                // $('#whtField').val(wht);
                // $('.whtFieldc').val(wht);


                // Check if any relevant data is entered
                if (category_of_G || salary || reli_allowance || uniform_Cost || weapon_Amm_Cost ||
                    traninig_Cost || AdmiCost || monthly_Rate_Per_Unit || gst ||
                    total_Monthly_R_P_U || hidden_Admin_Cost || total_Admin_Cost) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable14 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${category_of_G}</td>
                            <td>${salary}</td>
                            <td>${reli_allowance}</td>
                            <td>${uniform_Cost}</td>
                            <td>${weapon_Amm_Cost}</td>
                            <td>${traninig_Cost}</td>
                            <td>${AdmiCost}</td>
                            <td>${monthly_Rate_Per_Unit}</td>
                            <td>${gst}</td>
                            <td>${total_Monthly_R_P_U}</td>
                            <td>${hidden_Admin_Cost}</td>
                            <td>${total_Admin_Cost}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button14" style="width: 100%;" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory14').on('click', function() {
            var signatoryEntryCount14 = $('#signatoryAccordion14 .signaccordion-item14')
                .length + 1;

            var newSignatoryEntry14 = `
                <!-- Your existing signatory accordion HTML goes here -->

            `;
            console.log('Adding signatory entry:', signatoryEntryCount14);
            $('#signatoryAccordion14').append(newSignatoryEntry14);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable14').on('click', function() {
            // Update the signatory summary table
            updateSignatorySummaryTable14();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button14', function() {
            var index = $(this).data('index');
            var accordionItem14 = $('.signaccordion-item14').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem14.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion14', function() {
            $(this).closest('.signaccordion-item14').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable14();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory14').on('click', function(event) {
            event.preventDefault();
        });
    });
    </script>

    <!-- Script for Add more with Reverse working (in commercial section) -->



    <!-- Script for show data in table of Reverse working (in commercial section) -->


    <!-- Script for Excel sheet upload or update in SOP of tender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script>
    document.getElementById('excelFile').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function(event) {
            var data = new Uint8Array(event.target.result);
            var workbook = XLSX.read(data, {
                type: 'array'
            });
            var firstSheetName = workbook.SheetNames[0];
            var worksheet = workbook.Sheets[firstSheetName];
            displaySheet(worksheet);
        };
        reader.readAsArrayBuffer(event.target.files[0]);
    });

    function displaySheet(worksheet) {
        // Convert sheet to HTML and insert into table
        var htmlstr = XLSX.utils.sheet_to_html(worksheet);
        document.getElementById("excelDataTable").innerHTML = htmlstr.split('<table')[1].split('</table>')[0];

        // Make table editable and listen for changes
        makeTableEditable();
    }

    function makeTableEditable() {
        var table = document.getElementById("excelDataTable");
        var cells = table.getElementsByTagName('td');
        for (let i = 0; i < cells.length; i++) {
            cells[i].setAttribute('contenteditable', 'true');
            cells[i].addEventListener('blur', function(event) {
                // This is where you'd handle cell updates
                // For now, it just logs the new value
                console.log('Cell updated to:', event.target.innerText);
                // Update the table or data structure as needed
            });
        }
    }
    </script>



    <!-- Script for automatically total admin cost text field updated -->
    <!-- <script>
    $(document).on('input', '#hiddenAdminCostField', function() {
        var hidden_Admin_Cost = parseFloat($(this).val()) || 0;

        // Directly target the admin cost field by its ID since it's unique
        var admin_Cost = parseFloat($('#adminCostField').val()) || 0;

        // Calculate the total admin cost
        var total_Admin_Cost = parseFloat((admin_Cost + hidden_Admin_Cost).toFixed(
            2));
        console.log(total_Admin_Cost);

        // Set the value of the total admin cost field
        $('#totalAdminCostField').val(total_Admin_Cost);
    });
    </script> -->



    </body>

    </html>
