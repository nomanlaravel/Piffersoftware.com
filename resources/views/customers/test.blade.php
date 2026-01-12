@include('layouts.header')

@yield('main')

<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

<div class="customer_form">

    <div id="main" style="margin-left: 92%;">
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   

    <div id="mySidebar" class="sidebar admin-setting">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
        <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration Setting</a>
        <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
        <hr>
        <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
    </div>

    
<!--Popup model for User new entry-->
    <!-- <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true"> -->
    <!-- <div class="modal-dialog" role="document" style="max-width: 75%;"> -->
        <!-- <div class="modal-content"> -->
            <div class="modal-header border-0">
                <!-- <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;"> </h4> -->

                <!-- <button type="button" class="close" aria-label="Close" onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>

            <!-- <div class="modal-body"> -->
                <section>
                    <!-- View Modal -->
                    


                    <form  action="{{ route('submit_customer') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <!--Customer / Main Form-->
                        <div class="row" style="font-weight:600;">
                        <h5> Customer Information </h5>
                            <div class="col-lg-6 spacing-right">
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-right">
                                    Customer ID <br>  <input class="form-control" id="c_id" name="customers_id" oninput="updateClientID(this.value)" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-left">
                                    Customer Legal Name (As per NTN) <br>  <input class="form-control" id="customers_name" oninput="updateClientName(this.value)" type="text" name="customers_name" placeholder="" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-right">
                                    Suffix <br>  <input class="form-control" id="customers_suffix" type="text" name="customers_suffix" placeholder="..." style="width: 100%;">
                                </div>
                                
                                <div class="col-lg-6 spacing-left">
                                    City of Deployment <br>  <input class="form-control" id="city_of_deployment" type="text" name="city_of_deployment" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-10 spacing-right input-group">
                                    Display Name as <br>  <input class="form-control" id="d_name" value="" name="display_name_as" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            </div>
                            
                            <div class="col-lg-6 spacing-left">
                                <div class="row mb-2 mt-3">
                                    <div class="col-lg-5 spacing-right">
                                        Nature of Business <br>  <input class="form-control" id="nature" name="nature_of_business" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 spacing-left">
                                        Website <br>  <input class="form-control vldwebsite" type="text" id="web" name="website" placeholder="" style="width: 100%;">
                                        <div id="websiteError" class="websiteError" style="color: red"></div>
                                    </div>
                                </div>
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-right">
                                    Phone/Cell no <br>  <input class="form-control vldphone"  type="text" id="phone" name="phone" placeholder="..." style="width: 100%;">
                                    <div id="phoneError" class="phoneError" style="color: red"></div>
                                </div>
                                <div class="col-lg-6 spacing-left input-group">
                                    Email <br> <input class="form-control vldemail "  name="email" id="email" type="email" placeholder="..." style="width: 100%;">
                                    <div id="emailError" class="emailError" style="color: red"></div>
                                </div>
                                {{-- <div class="row" style="margin-left: 3px; margin-top: 10px;">
                                    <div class="col-lg-11 spacing-right">
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Sub-customer</label>
                                            <input class="form-controld form-control" id="sub_customer" name="sub_customer" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div class="row" style="margin-left: 3px; margin-top: 10px;">
                                    <div class="col-lg-11 spacing-right">
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Sub-customer</label>
                                            <select class="form-control" id="sub_customer" name="sub_customer" style="width: 100%;">
                                                <option value="">Select a customer</option>
                                                
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->customers_name }}">{{ $customer->customers_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row" style="margin-left: 3px; margin-top: 10px;">
                                    <div class="col-lg-11 spacing-right">
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Sub-customer</label>
                                            <select class="form-control" id="sub_customer" name="sub_customer" style="width: 100%;">
                                                <option value="">Select a customer</option>
                                                {{-- Fetch customer names from your database and loop through them --}}
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }} - {{ $customer->customers_name }}">
                                                        {{ $customer->id }} - {{ $customer->customers_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                            </div>
                            <div class="col-lg-6">
                                <h5>Approved Commercials</h5>
                                <div class="row mb-2 mt-3" style="margin-left:20px;">
                                    <div class="form-check form-check-inline spacing-left">
                                        <input class="form-check-input" name="approved_com" type="checkbox" id="approved_commercials" value="">
                                        <label class="form-check-label" for="inlineCheckbox1">Approved Commercials</label>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-5" style="margin-left:20px;">
                                <div class="form-check form-check-inline spacing-left">
                                    <input class="form-check-input" type="checkbox" name="quick_box" id="quick_box" value="">
                                    <label class="form-check-label" for="inlineCheckbox1">QuickBooks</label>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-2 mt-3">
                                    <div class="col-lg-6 spacing-left">
                                        Approved Commercial Attachments <br> <input class="form-control" name="approved_attach" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                            <div class="row mb-2 mt-3">
                                    <div class="col-lg-6 spacing-left">
                                        QuickBooks Screenshot <br> <input class="form-control" name="quickbooks_attach" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                            </div>
                            </div>
                            <div class="col-lg-6 mt-4">
                                <div class="row d-flex flex-row align-items-center">
                                    <div class="col-4 mt-2"> <div class="row " style="margin-left:22px;">
                                        <div class="form-check form-check-inline spacing-left">
                                            <input class="form-check-input" name="eobi" type="checkbox" id="eobi_check" value="">
                                            <label class="form-check-label" for="inlineCheckbox1">EOBI</label>
                                        </div>                                     
                                    </div>
                                    </div>
                                    <div class="col-4 mt-2">
                                        <div class="row " style="margin-left:20px;">
                                            <div class="form-check form-check-inline spacing-left">
                                                <input class="form-check-input" type="checkbox" name="social_security" id="social_security_check" value="">
                                                <label class="form-check-label" for="inlineCheckbox1">Social Security</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 mt-2">
                                        <div class="row" style="margin-left:20px;">
                                            <div class="form-check form-check-inline spacing-left">
                                                <input class="form-check-input" type="checkbox" name="grp_life_ins" id="grp_life_ins" value="">
                                                <label class="form-check-label" for="inlineCheckbox1">Group Life Insurance</label>
                                            </div>
                                            </div>
                                    </div>
                                </div>                             
                            </div>
                            <div class="col-lg-4 spacing-right form-group">
                                Applicable Compliances <br>
                                <div class="input-group" style="width: 100%;">
                                    <select id="dropdown" class="form-control mt-1" name="applicable_compliances" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                        <option value=""></option>
                                        @foreach ($compliances as $compliance)
                                            <option value="{{ $compliance->compliance_name }}">{{ $compliance->compliance_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append" style="width: 30%;">
                                        <a href="{{ route('compliance') }}">
                                            <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--Tabs forDetails-->
                        <nav>
                            <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-contact-tab" data-toggle="tab" href="#work-experience" role="tab" aria-controls="nav-experience" aria-selected="false">Contract Management
                                </a>
                                <a class="nav-item nav-link " id="nav-deployment-tab" data-toggle="tab" href="#education" role="tab" aria-controls="nav-deployment" aria-selected="false">Deployment Plan
                                </a>
                                <a class="nav-item nav-link " id="nav-contact-tab" data-toggle="tab" href="#guaranter-details" role="tab" aria-controls="nav-contact" aria-selected="false">Point of Contacts (POC)
                                </a>
                                <a class="nav-item nav-link" id="nav-operation-tab" data-toggle="tab"
                                    href="#patrolling" role="tab" aria-controls="nav-operations"
                                    aria-selected="false">Patrolling Supervisor Log
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#site" role="tab" aria-controls="nav-biometric" aria-selected="false"> Site Inspection
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#arm" role="tab" aria-controls="nav-biometric" aria-selected="false"> Armourer
                                </a>
                                <a class="nav-item nav-link" id="nav-incident-tab" data-toggle="tab" href="#incident_report" role="tab" aria-controls="nav-incident" aria-selected="false">Incident Report & Assignment Instruction Form
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#audit" role="tab" aria-controls="nav-biometric" aria-selected="false"> Audits
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#address-details" role="tab" aria-controls="nav-address" aria-selected="false">Monthly
                                    Performance Review Report
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#intelligence" role="tab" aria-controls="nav-biometric" aria-selected="false">BI & Promotional Activities
                                </a> 
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#verifications" role="tab" aria-controls="nav-verifications" aria-selected="false">Feedback Management
                                </a>
                               
                            </div>
                        </nav>


                        <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
                            <!--contract management-->
                            <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="work-experience" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="row">
                                    <h5 style="text-align:center;">Contract at a Glance</h5>
                                    <div class="row col-lg-12">
                                        <div class="col-lg-4 spacing-right">
                                            Summary of approved Strength: <br> <input class="form-control" name="sum_apr" type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Accomodation Status: <br> <input class="form-control" name="acm_status" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Meal Details: <br> <input class="form-control" name="meal_detail" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right MT-2">
                                            Any approved KPIs or SOW: <br> <input class="form-control" name="apr_kpi" type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-6 mt-2 spacing-right">
                                                <div class=" mb-2 d-flex align-items-center">

                                                    <label for="Type Of Training:" class="form-check-label spacing-right">Approved Quotation Vetted by Sales Department :</label>
                                                    <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" name="approv_q_s" type="checkbox" id="inlineCheckbox1" value="">
                                                        <label class="form-check-label" for="inlineCheckbox1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Attachments <br> <input class="form-control" name="approv_q_s_attach" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 mt-2 spacing-right">
                                                <div class=" mb-2 d-flex align-items-center">

                                                    <label for="Type Of Training:" class="form-check-label spacing-right">Approved Quotation Vetted by Contract Management Department :</label>
                                                    <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" type="checkbox" name="approv_q_c" id="inlineCheckbox1" value="">
                                                        <label class="form-check-label" for="inlineCheckbox1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Attachments <br> <input class="form-control" id="printing_date" name="approv_q_c_attach" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 mt-2 spacing-right">
                                                <div class=" mb-2 d-flex align-items-center">

                                                    <label for="Type Of Training:" class="form-check-label spacing-right">Approved Quotation Vetted by CFO :</label>
                                                    <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" type="checkbox" name="approv_q_cfo" id="inlineCheckbox1" value="">
                                                        <label class="form-check-label" for="inlineCheckbox1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Attachments <br> <input class="form-control" id="printing_date" name="approv_q_cfo_attach" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="row mb-2 mt-4">
                                                <div class="col-lg-5 spacing-right">
                                                    Contract Execution Date: <br> <input class="form-control" name="c_e_date" type="date" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-right">
                                                    Contract end Date: <br> <input class="form-control" name="c_end_date" type="date" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-right">
                                                    Contract Renewal Date <br> <input class="form-control" name="c_r_date" type="date" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-right">
                                                    Renewal Reminder <br> <input class="form-control" name="c_r_rem" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <h5>Signatory Details :</h5>
                                            <div class="row mb-2" id="signatoryDetailsContainer">
                                                <div class="col-lg-5 spacing-right">
                                                    Name <br> <input class="form-control" name="sign_name[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-right">
                                                    Designation <br> <input class="form-control" name="sign_desig[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-right">
                                                    Cell No <br> <input class="form-control vldphone"  type="text" name="sign_cell[]" placeholder="..." style="width: 100%;">
                                                    <div id="phoneError" class="phoneError" style="color: red"></div>
                                                </div>
                                                <div class="col-lg-5 spacing-right">
                                                    Email <br> <input class="form-control vldemail" type="text" name="sign_email[]" placeholder="..." style="width: 100%;">
                                                    <div id="emailError" class="emailError" style="color: red"></div>
                                                </div>
                                                <div class="new_branch mt-2" style="width:20%;">
                                                    <button type="button" id="add_new_renewal_btn" onclick="addSignatorySection()">
                                                        Add More
                                                    </button>
                                                </div>
                                            </div>
                                           
    
                                            
                                        </div>


                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        <div class="row mb-2">
                                            <div class="col-lg-12 spacing-right">
                                                Draft Contract and Signed Agreement Read by<br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" id="compliances" name="sales_dept" type="checkbox" id="inlineCheckbox1" value="">
                                                    <label class="form-check-label" for="inlineCheckbox1">Sales Dept.</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" id="compliances" name="cmd" type="checkbox" id="inlineCheckbox2" value="">
                                                    <label class="form-check-label" for="inlineCheckbox2">CMD</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" id="compliances" name="ops_dept" type="checkbox" id="inlineCheckbox2" value="">
                                                    <label class="form-check-label" for="inlineCheckbox2">Ops Dept.</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" id="compliances" name="finance_dept" type="checkbox" id="inlineCheckbox2" value="">
                                                    <label class="form-check-label" for="inlineCheckbox2">Finance Dept.</label>
                                                </div>
                                                <div class="form-check form-c=heck-inline">
                                                    <input class="form-check-input" id="compliances" name="directors" type="checkbox" id="inlineCheckbox2" value="">
                                                    <label class="form-check-label" for="inlineCheckbox2">Directors.</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 mt-2 spacing-right">
                                                <div class=" mb-2 d-flex align-items-center">

                                                    <label for="Type Of Training:" class="form-check-label spacing-right">Signed Service Contract Agreement Attached :</label>
                                                    <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" name="signed_ser" type="checkbox" id="inlineCheckbox1" value="">
                                                        <label class="form-check-label" for="inlineCheckbox1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Attachments <br> <input class="form-control" name="signed_ser_attach" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 mt-2 spacing-right">
                                                <div class=" mb-2 d-flex align-items-center">

                                                    <label for="Type Of Training:" class="form-check-label spacing-right">Communication Instructions Attached :</label>
                                                    <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" name="com_ins" type="checkbox" id="inlineCheckbox1" value="">
                                                        <label class="form-check-label" for="inlineCheckbox1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Attachments <br> <input class="form-control" name="com_ins_attach" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 mt-2 spacing-right">
                                                <div class=" mb-2 d-flex align-items-center">

                                                    <label for="Type Of Training:" class="form-check-label spacing-right">Testimonials (Reference Letters) Attached :</label>
                                                    <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" name="testimonials" type="checkbox" id="inlineCheckbox1" value="">
                                                        <label class="form-check-label" for="inlineCheckbox1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Attachments <br> <input class="form-control" name="testimonials_attach"  type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 mt-2 spacing-right">
                                                <div class=" mb-2 d-flex align-items-center">

                                                    <label for="Type Of Training:" class="form-check-label spacing-right">Details of Sales Incentives :</label>
                                                    <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" name="sales_inc" type="checkbox" id="inlineCheckbox1" value="">
                                                        <label class="form-check-label" for="inlineCheckbox1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Attachments <br> <input class="form-control" name="sales_inc_attach" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <h5>Performance Guaranty :</h5>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="pay_order" id="compliances-na" type="checkbox" value="">
                                            <label class="form-check-label" for="compliances-na">N/A.</label>
                                        </div>
                                        <div id="sectionToHide">
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Insurance Company Name <br> <input class="form-control" name="insc_name" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-right">
                                                    Date of issue <br> <input class="form-control" name="insc_date" type="date" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 spacing-right mb-3">
                                                Performance Guaranty issued via <br>
                                                <select id="staff_category" class="form-control" name="per_guan" style="width: 100%;">
                                                    <option value="">Pay Order</option>
                                                    <option value="">Demand Draft</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <div id="work_add_fields">

                                    </div>

                                    <div class="row mb-2">
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Attachments <br> <input class="form-control" name="perfom_attach" type="file" placeholder="..." style="width: 70%;" multiple>
                                        </div>
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Notes <br>
                                            <textarea id="w3review" class="form-control" name="perform_note" rows="2" cols="38" oninput="trimSpaces()" onclick="moveCursorToStart()">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <h5 style="text-align:center;"><b><u>Payment Terms</u></b></h5>
                                <div class="row">
                                    <div class="row mt-3" style="font-weight:600;">
                                        <div class="col-lg-6 spacing-right mb-3">
                                            Payment Terms <br>
                                            <select class="form-control" name="pay_terms" style="width: 100%;">
                                                <option value="">Cash</option>
                                                <option value="">Cheque</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-type col-lg-6 spacing-right">
                                        NTN from FBR Site <br> <input class="form-control" type="file" name="ntn_fbr" placeholder="..." style="width: 100%;">
                                    </div>
                                    <h5 class="mt-3">Relevant Details of Manager Billing of Customer</h5>
                                    <div class="row">
                                        <div class=" row main-content div">
                                            <div class="col-lg-6">
                                                <div class="row mb-2">
                                                    <div class="col-lg-6 spacing-right">
                                                        POC Name <br> <input class="form-control" id="head_office_name" name="poc_name" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Designation <br> <input class="form-control" id="head_office_email" name="poc_desig" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Cell Number <br> <input class="form-control vldphone" id="head_office_name" name="poc_cell" type="text" placeholder="..." style="width: 100%;">
                                                        <div id="phoneError" class="phoneError" style="color: red"></div>
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Email <br> <input class="form-control vldemail" id="head_office_email" name="poc_email" type="email" placeholder="..." style="width: 100%;">
                                                        <div id="emailError" class="emailError" style="color: red"></div>
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Billing Cycle Details <br> <input class="form-control" id="head_office_name" name="poc_bill_c" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Billing Portal Details <br> <input class="form-control" id="head_office_email" name="poc_bill_d" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Billing Portal Link <br> <input class="form-control" id="head_office_name" name="poc_bill_l" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-lg-6 spacing-left">
                                                <h5>Address</h5>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right">
                                                        Office No <br> <input class="form-control" id="head_office_cell_no" name="poc_office" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left">
                                                        Floor <br> <input class="form-control" id="head_office_cell_no" name="poc_floor" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right">
                                                        Building <br> <input class="form-control" id="head_office_cell_no" name="poc_building" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left">
                                                        Block <br> <input class="form-control" id="head_office_cell_no" name="poc_block" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    
                                                    <div class="col-lg-5 spacing-right">
                                                        Area <br> <input class="form-control" id="head_office_cell_no" name="poc_area" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left">
                                                        City <br> <input class="form-control" id="head_office_cell_no" name="poc_city" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row">                                          
                                                    <div class="col-lg-5 spacing-right">
                                                        Photograph of Location <br> <input class="form-control" id="" name="poc_photo" type="file" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJW5_mifeg4pTLOW_Hgx70vDhU4osTceg&libraries=places" defer></script>
                                                    <div class="col-lg-5 spacing-left">
                                                        Pin location <br> <input id="location-input" class="form-control" name="poc_pin" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete()">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div>
                                                         <br> <input class="form-control" id="longitude" name="longitude" type="hidden" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div >
                                                         <br> <input class="form-control" id="latitude" name="latitude" type="hidden" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                                                        Notes <br>
                                                        <textarea id="w3review1" class="form-control" name="poc_note" rows="2" cols="38" oninput="trimSpaces1()" onclick="moveCursorToStart1()">
                                                        </textarea>
                                                    </div>
                                                   <div class="col-lg-6 spacing-left spacing-right mt-2">
                                                        Attachements <br> <input class="form-control" name="poc_attach" type="file" placeholder="..." style="width: 70%;" multiple>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" row main-content div">
                                            <h5>Customer's CFO Details :</h5>
                                            <div class="col-lg-6">
                                                <div class="row mb-2">
                                                    <div class="col-lg-6 spacing-right">
                                                        Name <br> <input class="form-control" id="head_office_name" name="cf_name" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Designation <br> <input class="form-control" id="head_office_email" name="cf_desig" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Cell Number <br> <input class="form-control vldphone" id="head_office_name" name="cf_no" type="text" placeholder="..." style="width: 100%;">
                                                        <div id="phoneError" class="phoneError" style="color: red"></div>
                                                    </div>
                                                     <div class="col-lg-6 spacing-left spacing-right">
                                                        Email <br> <input class="form-control vldemail" id="head_office_name" name="cf_email" type="text" placeholder="..." style="width: 85%;">
                                                        <div id="emailError" class="emailError" style="color: red"></div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-6 spacing-left">
                                                <h5>Address</h5>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right">
                                                        Office No <br> <input class="form-control" id="head_office_cell_no" name="cf_office" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                     <div class="col-lg-5 spacing-left">
                                                        Floor <br> <input class="form-control" id="head_office_cell_no" name="cf_floor" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-right">
                                                        Building <br> <input class="form-control" id="head_office_cell_no" name="cf_building" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left">
                                                        Block <br> <input class="form-control" id="head_office_cell_no" name="cf_block" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    
                                                    <div class="col-lg-5 spacing-right">
                                                        Area <br> <input class="form-control" id="head_office_cell_no" name="cf_area" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left">
                                                        City <br> <input class="form-control" id="head_office_cell_no" name="cf_city" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    
                                                    <div class="col-lg-5 spacing-right">
                                                        Photograph of Location <br> <input class="form-control" id="head_office_cell_no" name="cf_photo" type="file" placeholder="..." style="width: 100%;">
                                                    </div>
                                                   
                                                    <div class="col-lg-5 spacing-left">
                                                        Pin Location <br> <input id="location-input1" class="form-control" name="cf_pin" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete1()">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div>
                                                         <br> <input class="form-control" id="head_office_cell_no" name="longitude1" type="hidden" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div >
                                                         <br> <input class="form-control" id="head_office_cell_no" name="latitude1" type="hidden" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                                                        Notes <br>
                                                        <textarea id="w3review2" class="form-control" name="cf_note" rows="2" cols="38" oninput="trimSpaces2()" onclick="moveCursorToStart2()">
                                                        </textarea>
                                                    </div>
                                                   <div class="col-lg-6 spacing-left spacing-right mt-2">
                                                        Attachements <br> <input class="form-control" name="cf_attach" type="file" placeholder="..." style="width: 70%;" multiple>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <h5 class="mt-3" style="text-align:center;"><b><u>List OF Currency</u></b> </h5>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-left spacing-right form-group">
                                                List Of Currency <br>
                                                <div class="input-group" style="width: 100%;">
                                                    <select id="dropdown" class="form-control mt-1" name="list_curr" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                        <option value=""></option>
                                                        @foreach ($currencies as $currency)
                                                            <option value="{{ $currency->currency_name }}">{{ $currency->currency_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="{{ route('currency') }}">
                                                            <button class="btn btn-primary" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-lg-12 spacing-right">
                                                    List Of Provinces<br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input province-checkbox" name="fbr" type="checkbox" id="fbr_check" value="">
                                                        <label class="form-check-label" for="inlineCheckbox1">FBR.</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input province-checkbox" name="pra" type="checkbox" id="pra_check" value="">
                                                        <label class="form-check-label" for="inlineCheckbox2">PRA</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input province-checkbox" name="kpra" type="checkbox" id="kpra_check" value="">
                                                        <label class="form-check-label" for="inlineCheckbox2">KPRA</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input province-checkbox" name="srb" type="checkbox" id="srb_check" value="">
                                                        <label class="form-check-label" for="inlineCheckbox2">SRB</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input province-checkbox" name="bra" type="checkbox" id="bra_check" value="">
                                                        <label class="form-check-label" for="inlineCheckbox2">BRA</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input province-checkbox" name="ajk" type="checkbox" id="ajk_check" value="">
                                                        <label class="form-check-label" for="inlineCheckbox2">AJK</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input province-checkbox" name="gb" type="checkbox" id="gb_check" value="">
                                                        <label class="form-check-label" for="inlineCheckbox2">GB</label>
                                                    </div>
                                                     <div class="form-check form-check-inline">
                                                        <input class="form-check-input " name="all" type="checkbox" id="checkboxProv" value="">
                                                        <label class="form-check-label" for="inlineCheckbox2">ALL</label>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-lg-6 spacing-right">
                                            Attachment <br> <input class="form-control" id="head_office_name" name="currency_attach" type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 spacing-right">
                                            Notes <br> <textarea class="form-control" id="head_office_email" name="currency_note" type="text" placeholder="..." style="width: 100%;"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <h5 style="text-align:center;"><b><u>Salary and Other Benefits</u></b></h5>
                                <div class=" row main-content div" id="salaryContainer">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            {{-- <div class="col-lg-3 spacing-right">
                                                Category : <br> <input class="form-control" id="head_office_name" name="cat_name[]" type="text" placeholder="..." style="width: 100%;">
                                            </div> --}}
                                            <div class="col-lg-4 spacing-right form-group">
                                                Category <br>
                                                <div class="input-group" style="width: 100%;">
                                                    <select id="dropdown" class="form-control mt-1" name="cat_name[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                        <option value=""></option>
                                                        @foreach ($saobcategories as $saobcategory)
                                                            <option value="{{ $saobcategory->saob_category_name}}">{{ $saobcategory->saob_category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="{{ route('saobcategory') }}">
                                                            <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Salary of [Category] <br> <input class="form-control" id="head_office_email" name="sal_cat[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Salary for No. of days <br> <input class="form-control" id="head_office_name" name="sal_days[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Leaves Allowed <br> <input class="form-control" id="head_office_name" name="leaves_a[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Other Benefits <br> 
                                                {{-- <input class="form-control" id="head_office_name" name="other_ben[]" type="text" placeholder="..." style="width: 100%;"> --}}
                                                <textarea id="w3review23" oninput="trimSpaces23()" onclick="moveCursorToStart23()" class="form-control" name="other_ben[]" rows="2" cols="38" ></textarea>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Attachements <br> <input class="form-control" type="file" name="sal_attach[]" placeholder="..." style="width: 70%;" multiple>
                                        </div>
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Notes <br>
                                            <textarea id="w3review3" oninput="trimSpaces3()" onclick="moveCursorToStart3()" class="form-control" name="sal_note[]" rows="2" cols="38" >
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="new_branch mt-2" style="width:20%;">
                                        <button type="button" id="add_new_renewal_btn" onclick="addSalarySection()">
                                            Add More
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--deployment details-->
                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="education" role="tabpanel" aria-labelledby="nav-deployment-tab">
                               
                               
                                <div class="row">
                                    <h5 style="text-align:center"><b><u>Manpower Deployment Plan</u></b></h5>
                                    
                                  
                                        
                                        {{-- <div class="row col-lg-12 manpower">
                                            <div class="col-lg-6 spacing-right">
                                                <div class="row mb-2">
                                                   
                                                    <input class="form-control" type="hidden" name="man_id[]" placeholder="..." style="width: 100%;">
                                                     <div class="col-lg-5 spacing-left spacing-right form-group">
                                                        Guard Post No <br>
                                                        <div class="input-group" style="width: 100%;">
                                                            <select id="dropdown" class="form-control mt-1" name="man_post[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                <option value=""></option>
                                                                @foreach ($guardposts as $guardpost)
                                                                    <option value="{{ $guardpost->guard_post }}">{{ $guardpost->guard_post }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-append" style="width: 30%;">
                                                                <a href="{{ route('guardpost') }}">
                                                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right form-group">
                                                        Category <br>
                                                        <div class="input-group" style="width: 100%;">
                                                            <select id="dropdown" class="form-control mt-1" name="man_cat[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                <option value=""></option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-append" style="width: 30%;">
                                                                <a href="{{ route('category') }}">
                                                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                     <div class="col-lg-5 spacing-left spacing-right form-group">
                                                        Uniform Type <br><input class="form-control" name="man_uni[]" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right form-group">
                                                        Uniform Number <br> <input class="form-control" name="man_uni_no[]" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right form-group">
                                                        Weapon Type <br> <input class="form-control" name="man_weapon[]" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                     <div class="col-lg-5 spacing-left spacing-right form-group">
                                                        Ammunition Type <br> <input class="form-control" name="man_ammu[]" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right form-group">
                                                        Equipment <br> <input class="form-control" name="man_equip[]" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="form-type col-lg-5 spacing-right">
                                                        Picture of Equipment <br> <input class="form-control" name="man_equip_attach[]" type="file" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    
                                                        <div class="form-type col-lg-5 spacing-left spacing-right form-group">
                                                            Approved Leaves. <br> <input class="form-control" name="man_apr_l[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="form-type col-lg-5 spacing-left spacing-right form-group">
                                                            Salary of total days. <br> <input class="form-control" name="man_salary[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                    
                                                </div>
                                                
                                            </div>
                                            <div class="col-lg-6 spacing-left">
                                                <div class="row mb-3">
                                                    <div class="form-type col-lg-6 spacing-right">
                                                        Shift Start date. <br> <input class="form-control" name="s_start_date[]" type="date" placeholder="..." style="width: 100%;">
                                                       
    
                                                    </div>
                                                    <div class="form-type col-lg-6 spacing-right">
                                                        Shift End date. <br> <input class="form-control" name="s_end_date[]" type="date" placeholder="..." style="width: 100%;">
                                                        <div id="shiftEndDateError" style="color: red;"></div>
    
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="form-type col-lg-6 spacing-right">
                                                        Shift Start time. <br> <input class="form-control" name="s_start_time[]" type="time" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="form-type col-lg-6 spacing-right">
                                                        Shift End time. <br> <input class="form-control" name="s_end_time[]" type="time" placeholder="..." style="width: 100%;">
                                                        <div id="shiftEndTimeError" style="color: red;"></div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="form-type col-lg-6 spacing-right">
                                                    Deployment Start date. <br> <input class="form-control" name="man_start_date[]" type="date" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="form-type col-lg-6 spacing-right">
                                                    Deployment End date. <br> <input class="form-control" name="man_end_date[]" type="date" placeholder="..." style="width: 100%;">
                                                    <div id="deploymentEndDateError" style="color: red;"></div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="form-type col-lg-6 spacing-right">
                                                    Deployment Start time. <br> <input class="form-control" name="man_start_time[]" type="time" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="form-type col-lg-6 spacing-right">
                                                    Deployment End time. <br> <input class="form-control"  name="man_end_time[]" type="time" placeholder="..." style="width: 100%;">
                                                    <div id="deploymentEndTimeError" style="color: red;"></div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="form-type col-lg-6 spacing-right">
                                                    Quantity. <br> <input class="form-control" name="man_quan[]" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="form-type col-lg-6 spacing-right">
                                                    Duty Hours. <br> <input class="form-control"  name="man_hours[]" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                   
                                                    <div class="form-type col-lg-6 spacing-right">
                                                    Post Orders / JD of Guard Post. <br> <input class="form-control" name="man_jd_attach[]" type="file" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="form-type col-lg-6 spacing-right">
                                                    Any Special Instructions. <br> 
                                                    <textarea class="form-control" id="w3review22" oninput="trimSpaces22()" onclick="moveCursorToStart22()" name="man_any_sp[]" type="notes" placeholder="..." style="width: 100%;"></textarea>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                           
                                       
                                        </div>   --}}

                                    

                                        <div class="container my-5">
                                            <div class="accordion" id="manpowerAccordion">
                                                <!-- Initial Accordion Item -->
                                                <div class="accordion-item" id="manpowerEntry1" >
                                                    <h2 class="accordion-header" id="manpowerHeading1" style="color: white" >
                                                        <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                                            Manpower Entry 1
                                                        </button>
                                                    </h2>
                                                    <div id="collapse1" class="collapse" aria-labelledby="manpowerHeading1">
                                                        <div class="accordion-body">
                                                            <div class="row col-lg-12 manpower">
                                                                <div class="col-lg-6 spacing-right">
                                                                    <div class="row mb-2">
                                                                       
                                                                        <input class="form-control" type="hidden" name="man_id[]" placeholder="..." style="width: 100%;">
                                                                         <div class="col-lg-5 spacing-left spacing-right form-group">
                                                                            Guard Post No <br>
                                                                            <div class="input-group" style="width: 100%;">
                                                                                <select id="dropdown" class="form-control mt-1" name="man_post[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                                    <option value=""></option>
                                                                                    @foreach ($guardposts as $guardpost)
                                                                                        <option value="{{ $guardpost->guard_post }}">{{ $guardpost->guard_post }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="input-group-append" style="width: 30%;">
                                                                                    <a href="{{ route('guardpost') }}">
                                                                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-5 spacing-left spacing-right form-group">
                                                                            Category <br>
                                                                            <div class="input-group" style="width: 100%;">
                                                                                <select id="dropdown" class="form-control mt-1" name="man_cat[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                                    <option value=""></option>
                                                                                    @foreach ($categories as $category)
                                                                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="input-group-append" style="width: 30%;">
                                                                                    <a href="{{ route('category') }}">
                                                                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div> 
                                                                         <div class="col-lg-5 spacing-left spacing-right form-group">
                                                                            Uniform Type <br><input class="form-control" name="man_uni[]" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-5 spacing-left spacing-right form-group">
                                                                            Uniform Number <br> <input class="form-control" name="man_uni_no[]" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-5 spacing-left spacing-right form-group">
                                                                            Weapon Type <br> <input class="form-control" name="man_weapon[]" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                         <div class="col-lg-5 spacing-left spacing-right form-group">
                                                                            Ammunition Type <br> <input class="form-control" name="man_ammu[]" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-5 spacing-left spacing-right form-group">
                                                                            Equipment <br> <input class="form-control" name="man_equip[]" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="form-type col-lg-5 spacing-right">
                                                                            Picture of Equipment <br> <input class="form-control" name="man_equip_attach[]" type="file" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        
                                                                            <div class="form-type col-lg-5 spacing-left spacing-right form-group">
                                                                                Approved Leaves. <br> <input class="form-control" name="man_apr_l[]" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="form-type col-lg-5 spacing-left spacing-right form-group">
                                                                                Salary of total days. <br> <input class="form-control" name="man_salary[]" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                        
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col-lg-6 spacing-left">
                                                                    <div class="row mb-3">
                                                                        <div class="form-type col-lg-6 spacing-right">
                                                                            Shift Start date. <br> <input class="form-control" name="s_start_date[]" type="date" placeholder="..." style="width: 100%;">
                                                                           
                        
                                                                        </div>
                                                                        <div class="form-type col-lg-6 spacing-right">
                                                                            Shift End date. <br> <input class="form-control" name="s_end_date[]" type="date" placeholder="..." style="width: 100%;">
                                                                            <div id="shiftEndDateError" style="color: red;"></div>
                        
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="form-type col-lg-6 spacing-right">
                                                                            Shift Start time. <br> <input class="form-control" name="s_start_time[]" type="time" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="form-type col-lg-6 spacing-right">
                                                                            Shift End time. <br> <input class="form-control" name="s_end_time[]" type="time" placeholder="..." style="width: 100%;">
                                                                            <div id="shiftEndTimeError" style="color: red;"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="form-type col-lg-6 spacing-right">
                                                                        Deployment Start date. <br> <input class="form-control" name="man_start_date[]" type="date" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="form-type col-lg-6 spacing-right">
                                                                        Deployment End date. <br> <input class="form-control" name="man_end_date[]" type="date" placeholder="..." style="width: 100%;">
                                                                        <div id="deploymentEndDateError" style="color: red;"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="form-type col-lg-6 spacing-right">
                                                                        Deployment Start time. <br> <input class="form-control" name="man_start_time[]" type="time" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="form-type col-lg-6 spacing-right">
                                                                        Deployment End time. <br> <input class="form-control"  name="man_end_time[]" type="time" placeholder="..." style="width: 100%;">
                                                                        <div id="deploymentEndTimeError" style="color: red;"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="form-type col-lg-6 spacing-right">
                                                                        Quantity. <br> <input class="form-control" name="man_quan[]" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="form-type col-lg-6 spacing-right">
                                                                        Duty Hours. <br> <input class="form-control"  name="man_hours[]" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                       
                                                                        <div class="form-type col-lg-6 spacing-right">
                                                                        Post Orders / JD of Guard Post. <br> <input class="form-control" name="man_jd_attach[]" type="file" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="form-type col-lg-6 spacing-right">
                                                                        Any Special Instructions. <br> 
                                                                        <textarea class="form-control" id="w3review22" oninput="trimSpaces22()" onclick="moveCursorToStart22()" name="man_any_sp[]" type="notes" placeholder="..." style="width: 100%;"></textarea>
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
                                                    <button type="button" class="btn btn-primary" id="addManpower" style="height:30px; width:150px;" >Add More Manpower</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    
                                        <table class="table table-bordered mt-1" id="manpowerSummaryTable">
                                            <thead>
                                                <tr>
                                                    <th>Entry</th>
                                                    <th>Guard Post</th>
                                                    <th>Category</th>
                                                    <th>Uniform Type</th>
                                                    <th>Weapon Type</th>
                                                    <!-- Add more columns as needed -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Summary data will be added here dynamically -->
                                            </tbody>
                                        </table>
                                                                        
                                    <h5>Patrolling Vehicle</h5>
                                    <div class="row mb-3">
                                        <div class="form-type col-lg-6 spacing-right">
                                            Vehicle Name <br> <input class="form-control" name="pat_name" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="form-type col-lg-6 spacing-right">
                                            Model <br> <input class="form-control" name="pat_model" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-type col-lg-6 spacing-right">
                                            Make <br> <input class="form-control" name="pat_make" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="form-type col-lg-6 spacing-right">
                                            Registration No. <br> <input class="form-control" name="pat_reg" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-type col-lg-6 spacing-right">
                                        Quantity. <br> <input class="form-control"  name="pat_quan" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="form-type col-lg-6 spacing-right">
                                        Price Per Unit. <br> <input class="form-control" name="pat_price" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-type col-lg-6 spacing-right">
                                        Total Value. <br> <input class="form-control" name="pat_val" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>

                                </div>



                                <h5 style="text-align:center"><u><b>Emergency Services</b></u></h5>
                                <div class="row" id="emergencyServices_add_fields">
                                    <div class=" row main-content div">
                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                
                                                <div class="col-lg-6 spacing-left spacing-right form-group">
                                                    Emergency Services <br>
                                                    <div class="input-group" style="width: 100%;">
                                                        <select id="dropdown" class="form-control mt-1" name="emer_ser[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                            <option value=""></option>
                                                            @foreach ($emerser as $emerser)
                                                                <option value="{{ $emerser->emerser_name}}">{{ $emerser->emerser_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-append" style="width: 30%;">
                                                            <a href="{{ route('emerser') }}">
                                                                <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Picture of Police Station <br> <input class="form-control" name="emer_pic[]" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-6">
                                                        <!--Image Preview Biometric-->
                                                        <div class="image-preview26" id="imagePreview26">
                                                            <img src="" alt="Image Preview26" class="image-preview__image26" style="height: 100%; width:100%; margin-left:-15px">
                                                            <span class="image-preview__default-text26"> Image Preview </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5>POC</h5>
                                                <div class="col-lg-6 spacing-right">
                                                    Name. <br> <input class="form-control" id="head_office_name" name="emer_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Designation. <br> <input class="form-control" id="head_office_name" name="emer_poc_desig[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Cell Number. <br> <input class="form-control vldphone" id="head_office_name" name="emer_poc_cell[]" type="text" placeholder="..." style="width: 100%;">
                                                    <div id="phoneError" class="phoneError" style="color: red"></div>
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Email. <br> <input class="form-control vldemail" id="head_office_name" name="emer_poc_email[]" type="email" placeholder="..." style="width: 100%;">
                                                    <div  class="emailError" style="color: red"></div>
                                                </div>
                                               
                                                <div class="col-lg-6 spacing-right">
                                                    Notes. <br> <textarea class="form-control" id="w3review4" oninput="trimSpaces4()" onclick="moveCursorToStart4()" name="emer_poc_notes[]" type="notes" placeholder="..." style="width: 100%;"></textarea>
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Attachment <br> <input class="form-control" id="head_office_name" name="emer_poc_attach[]" type="file" placeholder="..." style="width: 100%;" >
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-6 spacing-left">
                                            <h5>Address :</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Office No <br> <input class="form-control" id="head_office_cell_no" name="emer_office[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Building <br> <input class="form-control" id="head_office_cell_no" name="emer_building[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Block <br> <input class="form-control" id="head_office_cell_no" name="emer_block[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Area <br> <input class="form-control" id="head_office_cell_no" name="emer_area[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    City <br> <input class="form-control" id="head_office_cell_no" name="emer_city[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Photograph of Building <br> <input class="form-control" id="head_office_cell_no" name="emer_loc[]" type="file" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Email <br> <input class="form-control vldemail" id="" name="emer_email[]" type="text" placeholder="..." style="width: 100%;">
                                                    <div  class="emailError" style="color: red"></div>
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Website <br> <input class="form-control vldwebsite" id="" name="emer_web[]" type="text" placeholder="..." style="width: 100%;">
                                                    <div id="websiteError" class="websiteError" style="color: red"></div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Pin location <br> <input id="location-input2" class="form-control" id="" name="emer_pin[]" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete2()">
                                                </div>
                                                <div >
                                                    <br> <input class="form-control" id="" name="longitude2[]" type="hidden" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div >
                                                   <br> <input class="form-control" id="" name="latitude2[]" type="hidden" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 spacing-left mt-2">
                                    Applicable Rental Property Number <br> <input class="form-control" name="emer_app_rental[]" type="text" placeholder="..." style="width: 70%;" multiple>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Attachements <br> <input class="form-control" name="emer_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                                        </div>
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Notes <br>
                                            <textarea id="w3review5" oninput="trimSpaces5()" onclick="moveCursorToStart5()" class="form-control" name="emer_note[]" rows="2" cols="38">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div style="width: 50%;">
                                    <button class="btn btn-primary" type="button" onclick="emergencyServices_add_fields()">Add More</button>
                                </div>
                            </div>
                            <!--Address-->
                            <div class="tab-pane fade  m-3" style="opacity: 90%;" id="guaranter-details" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="row add-more">
                                    <div class=" row main-content div" id="department_add_fields">
                                        <div class="spacing-right form-group">
                                        Department Type <br>
                                        <div class="input-group" style="width: 100%;">
                                            <select id="dropdown" class="form-control mt-1" name="dept_type[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value=""></option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->department_name }}">{{ $department->department_name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append" style="width: 30%;">
                                                <a href="{{ route('department') }}">
                                                    <button class="btn btn-primary" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-6 spacing-right">
                                                POC Name <br> <input class="form-control" name="dept_name[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Email <br> <input class="form-control vldemail" name="dept_email[]" type="text" placeholder="..." style="width: 100%;">
                                                <div id="emailError" class="emailError" style="color: red"></div>
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Cell Number <br> <input class="form-control vldphone" name="dept_cell[]" type="text" placeholder="..." style="width: 100%;">
                                                <div id="phoneError" class="phoneError" style="color: red"></div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Address <br> <input class="form-control" name="dept_address[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6  spacing-right">
                                                Designation <br> <input class="form-control" name="dept_desig[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                CNIC picture (front) <br> <input class="form-control" name="dept_front[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6  spacing-right">
                                                CNIC picture (back) <br> <input class="form-control" name="dept_back[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-left spacing-right">
                                                Notes <br>
                                                <textarea id="w3review6" onclick="moveCursorToStart6()" oninput="trimSpaces6()" class="form-control" name="dept_notes[]" rows="2" cols="24">
                                                </textarea>
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Attachments <br> <input class="form-control" name="dept_attach[]" type="file" placeholder="..." style="width: 100%;" multiple>
                                            </div>
                                            
                                        </div>

                                    </div>

                                    <div class="col-lg-6 spacing-left">
                                        <h5>Address</h5>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Office No <br> <input class="form-control" name="dept_office[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Building <br> <input class="form-control" name="dept_build[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Block <br> <input class="form-control" name="dept_block[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Area <br> <input class="form-control" name="dept_area[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                City <br> <input class="form-control" name="dept_city[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Photograph of building <br> <input class="form-control" name="dept_photo[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5 spacing-right">
                                                Pin Location <br> <input id="location-input3" class="form-control" name="dept_pin[]" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete3()">
                                            </div>
                                            <div class="col-lg-6 spacing-left ">
                                                Attachments <br> <input class="form-control" name="dept_ex_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                                                </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div >
                                                 <br> <input class="form-control" name="longitude3[]" type="hidden" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div >
                                                <br> <input class="form-control" name="latitude3[]" type="hidden" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Notes <br>
                                                <textarea id="w3review7" onclick="moveCursorToStart7()" oninput="trimSpaces7()" class="form-control" name="dept_ex_notes[]" rows="2" cols="38">
                                                </textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    </div>
                                    <div style="width: 50%;">
                                        <button class="btn btn-primary" type="button" onclick="department_add_fields()">Add More</button>
                                    </div>
                                </div>
                            </div>
                            <!--Patrolling Section-->
                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="patrolling" role="tabpanel" aria-labelledby="nav-loto-tab">
                                <h5>Supervisor Visits</h5>
                            </div>
                             <!--Site-->
                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="site" role="tabpanel" aria-labelledby="nav-loto-tab">
                                <div class="row">
                                    <div class="col-lg-12 spacing-right">
                                        <h5>Inspection Performed By :</h5>
                                        <div class="mt-2">
                                            <button class="btn btn-danger" type="button" id="add_inspection_btn">
                                                Add Inspection  
                                            </button>
                                        </div>
                                        <div id="inspectionDiv" style="display:none;">
                                            <div id="inspectionInfo">
                                                <div class="row mb-2">
                                                    <div class="col-lg-4 spacing-right">
                                                        Inspection Number <br> <input class="form-control" type="text" name="inspection_no[]" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Employee id <br> <input class="form-control" type="text" name="inspection_emp_id[]" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Employee Name <br> <input class="form-control" type="text" name="inspection_emp_name[]" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-4 spacing-right">
                                                        Cell Number: <br> <input class="form-control" type="text" name="inspection_emp_cell[]" placeholder="" style="width: 100%;">
                                                        <div id="phoneError" class="error-message-phone" style="color: red"></div>
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Department <br> <input class="form-control" type="text" name="inspection_emp_dept[]" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left" style="margin-left:8px;">
                                                        Date of inspection. <br> <input class="form-control" type="date" name="inspection_date[]" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Picture of Inspection <br> <input class="form-control basic-info-attachements" id="inpFile22" type="file" name="inspection_pic[]" placeholder="..." style="width: 100%;" multiple>
                                                        <div class="image-preview22" id="imagePreview22">
                                                            <img src="" alt="Image Preview22" class="image-preview__image22" style="height: 30%; width:30%;">
                                                            <span class="image-preview__default-text22"> Image Preview </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Remarks of Petroling Officer <br> <textarea class="form-control basic-info-attachements" id="inpFile2" type="text" name="inspection_rem_petr[]" placeholder="..." style="width: 100%;" multiple></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        Notes <br> <textarea class="form-control basic-info-attachements" type="text" name="inspection_note[]" id="w3review8" oninput="trimSpaces8()" onclick="moveCursorToStart8()"  placeholder="..." style="width: 100%;" multiple></textarea>
                                                    </div>
                                                    <div class="col-lg-3 spacing-left">
                                                        Attachments <br> <input class="form-control basic-info-attachements" id="" type="file" name="inspection_attach[]" placeholder="..." style="width: 100%;" multiple>
                                                    </div>
                                                    <div class="new_branch mt-2">
                                                        <button type="button" id="add_new_renewal_btn">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <button class="btn btn-primary" type="button" id="add_inspection_btn" onclick="addInspectionSection()">
                                                        Add Inspection
                                                    </button>
                                                </div>
                                            </div> 
                                            <div class="mt-2">
                                                <button class="btn btn-danger" type="button" id="remove_inspection_btn">
                                                    Remove Inspection  
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                </div>
                            </div>
                            <!--Armourer-->
                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="arm" role="tabpanel" aria-labelledby="nav-loto-tab">
                                <div id="cleaningInfo">
                                    <div class="row col-lg-12">
                                        <div class="col-lg-4 spacing-right">
                                            Branch Name <br> <input class="form-control" type="text" name="arm_branch_name[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Branch ID <br> <input class="form-control" type="text" name="arm_branch_id[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Site ID <br> <input class="form-control" type="text" name="arm_site_id[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Client Name <br> <input class="form-control" type="text" name="arm_client_name[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Weapon Number <br> <input class="form-control" type="text" name="arm_weapon_no[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Weapon Bore <br> <input class="form-control" type="text" name="arm_weapon_bore[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Weapon Type <br> <input class="form-control" type="text" name="arm_weapon_type[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Working Details <br> <input class="form-control" type="text" name="arm_work_detail[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Sign of Customer <br> <input class="form-control" type="text" name="arm_sign_cus[]" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <div class="col-lg-4 spacing-right" style="margin-bottom: 10px;">
                                                New Authority Letter Issue : <br> <input class="form-control" id="head_office_name" name="arm_auth[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                                            New Authority Letter No <br> <input class="form-control" id="head_office_email" id="inpFile42" name="arm_auth_no[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                                            New Authority Letter Validity <br> <input class="form-control" id="head_office_email" name="arm_auth_date[]" type="date" placeholder="..." style="width: 100%;">

                                            </div>
                                            <div class="col-lg-4 spacing-right" style="margin-bottom: 10px;">
                                                Date of issue <br> <input class="form-control" id="head_office_name" name="arm_auth_issue[]" type="date" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                                                Number of weapon cleaned <br> <input class="form-control" id="head_office_email" id="inpFile42" name="arm_weapon_cleaned[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                                                Type of weapon cleaned <br> <input class="form-control" id="head_office_email" name="type_weapon_cleaned[]" type="input" placeholder="..." style="width: 100%;">

                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Picture before cleaning <br> <input class="form-control" id="head_office_name" name="arm_pic_b[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Picture after cleaning <br> <input class="form-control" id="head_office_name" name="arm_pic_a[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Cost of the day <br> <input class="form-control" id="head_office_name" name="arm_cost_day[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Cost Bill <br> <input class="form-control" id="head_office_name" name="arm_cost_bill[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Next cleaning activity due on : <br> <input class="form-control" id="head_office_name" name="arm_next_clean[]" type="date" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-4 spacing-right mt-2">
                                                Notes <br>
                                                <textarea id="w3review9" oninput="trimSpaces9()" class="form-control" onclick="moveCursorToStart9()" name="arm_auth_notes[]" rows="2" cols="38">
                                                </textarea>
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right mt-2">
                                                Attachments <br> <input class="form-control" name="arm_auth_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="new_branch mt-2">
                                        <button type="button" id="addCleaning" onclick="addCleaningSection()">Add More</button>
                                    </div>
                                </div>
                            </div>
                            <!--Incident form-->
                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="incident_report" role="tabpanel" aria-labelledby="nav-incident-tab">
                                <div class="row client-info">
                                    <div class="col-lg-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-3 spacing-right">
                                                Client Name <br>
                                                <input class="form-control" type="text" name="client_name[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Client ID <br> <input class="form-control" type="text" name="client_id[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Site ID <br> <input class="form-control" type="text" name="client_site_id[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Client POC Name <br>
                                                <input class="form-control" type="text" name="client_poc[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Cell <br> <input class="form-control vldphone" type="text" name="client_cell[]" placeholder="..." style="width: 100%;">
                                                <div id="phoneError" class="phoneError" style="color: red"></div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Email <br> <input class="form-control vldemail" type="text" name="client_email[]" placeholder="..." style="width: 100%;">
                                                <div id="emailError" class="emailError" style="color: red"></div>
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Site Address <br>
                                                <input class="form-control" type="text" name="client_site_address[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Office/Floor <br> <input class="form-control" name="client_office[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Building Name<br> <input class="form-control" name="client_build[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Street <br>
                                                <input class="form-control" type="text" name="client_street[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Area <br> <input class="form-control" name="client_area[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                City <br> <input class="form-control" name="client_city[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 12px;">
                                                FIR # <br> <input class="form-control" name="client_fir[]" type="text" placeholder="..." style="width: 115%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 30px;">
                                                Arrest # <br> <input class="form-control" name="arrest[]" type="text" placeholder="..." style="width: 101%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 12px;">
                                                Casualities # <br> <input class="form-control" name="casual[]" type="text" placeholder="..." style="width: 115%;"">
                                            </div>

                                            <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 30px;">
                                                Injuired # <br> <input class="form-control" name="injuired[]" type="text" placeholder="..." style="width: 101%;">
                                            </div>

                                            <div class="row mb-2" style="margin-left:2px;">
                                                <div class="col-lg-6 spacing-left spacing-right">
                                                    Incident Reported to <br>
                                                    <select id="" class="form-control" name="incident_rep[]" style="width: 100%;">
                                                        <option value="PIFFERS Office">PIFFERS Office</option>
                                                        <option value="Police Station/15">Police Station/15</option>
                                                        <option value="Ambulance">Ambulance</option>
                                                        <option value="Fire Brigade">Fire Brigade</option>
                                                        <option value="Rescue 1122">Rescue 1122</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 spacing-left spacing-right">
                                                    Police Officer Name <br> <input class="form-control" name="police_officer_name[]" type="text" placeholder="..." style="width: 87%;">
                                                </div>
                                                <div class="col-lg-6 spacing-left spacing-right">
                                                    Station <br> <input class="form-control" type="text" name="station[]" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-left spacing-right">
                                                    Rank <br> <input class="form-control" type="text" name="rank[]" placeholder="..." style="width: 87%;">
                                                </div>
                                                <div class="col-lg-6 spacing-left spacing-right">
                                                    Report Made by <br> <input class="form-control" name="report_made_by[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-left spacing-right">
                                                    Date <br> <input class="form-control" name="report_date[]" type="date" placeholder="..." style="width: 87%;">
                                                </div>
                                                <div class="col-lg-6 spacing-left spacing-right">
                                                    Time <br> <input class="form-control" name="report_time[]" type="time" placeholder="..." style="width: 87%;">
                                                </div>
                                                <div class="col-lg-6 spacing-left spacing-right">
                                                    Approved By <br> <input class="form-control" name="report_apr_by[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-left spacing-right">
                                                    Shared with <br> <input class="form-control" name="report_shared[]" type="text" placeholder="..." style="width: 87%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Incident Type <br> <select id="" class="form-control" name="incident_type[]" style="width: 100%;">
                                                    <option value="Abuse">Abuse</option>
                                                    <option value="Violence">Violence</option>
                                                    <option value="Theft">Theft</option>
                                                    <option value="Robbery">Robbery</option>
                                                    <option value="Damage">Damage</option>
                                                    <option value="Terrorism">Terrorism</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 spacing-left spacing-right">
                                                Weapon used by Attacker <br> <select id="" class="form-control" name="weapon_used[]" style="width: 100%;">
                                                    <option value="Gun">Gun</option>
                                                    <option value="Knives">Knives</option>
                                                    <option value="Stones">Stones</option>
                                                    <option value="Physical">Physical</option>
                                                    <option value="Chemical">Chemical</option>
                                                    <option value="Gas">Gas</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 spacing-left spacing-right">
                                                Details of Attacker <br> <select id="" class="form-control" name="detail_of_attacker[]" style="width: 83%;">
                                                    <option value="Entry">Entry</option>
                                                    <option value="Exit">Exit</option>
                                                    <option value="Car/Bike">Car/Bike</option>
                                                    <option value="Car/Bike No">Car/Bike No</option>
                                                    <option value="Model">Model</option>
                                                    <option value="Type">Type</option>
                                                    <option value="Color">Color</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 spacing-left spacing-right" style="margin-left: -42px;">
                                                Attacker Description <br> <select id="" class="form-control" name="attacker_desc[]" style="width: 100%;">
                                                    <option value="Gender">Gender</option>
                                                    <option value="Age">Age</option>
                                                    <option value="Height">Height</option>
                                                    <option value="Complexion">Complexion</option>
                                                    <option value="Hair Color">Hair Color</option>
                                                    <option value="Wearing Color">Wearing Color</option>
                                                </select>
                                            </div>
                                            <div class="row mb-2" style="margin-left: -24px;">
                                                <div class="col-lg-3 spacing-right">
                                                    Shoes <br>
                                                    <input class="form-control" type="text" name="attacker_shoe[]" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 spacing-left spacing-right">
                                                    Beard/M <br> <input class="form-control" name="attacker_beard[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Language <br> <input class="form-control" type="text" name="attacker_lang[]" placeholder="..." style="width: 117%;">
                                                </div>
                                                <div class="col-lg-3 spacing-right">
                                                    Focused on <br>
                                                    <input class="form-control" type="text" name="focused[]" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 spacing-left spacing-right">
                                                    Opening Phrase <br> <input class="form-control" name="opening_phrase[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Anything Unusual <br> <input class="form-control" name="any_usual[]" type="text" placeholder="..." style="width: 117%;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2" style="margin-top: -10px ;">
                                            <div class="col-lg-6 spacing-left spacing-right">
                                                Estimated Loss in PKR <br> <input class="form-control" name="estimated_loss[]" type="text" placeholder="..." style="width: 91%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right" style="margin-left: -20px;">
                                                Description of Loss <br> <input class="form-control" type="text" name="desc_loss[]" placeholder="..." style="width: 110%;">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 spacing-left spacing-right" style="margin-top:-6px; margin-left:-15px;">
                                            Officers Response <br> <select id="" class="form-control" name="officer_response[]" style="width: 100%;">
                                                <option value="Defense">Defense</option>
                                                <option value="Attack">Attack</option>
                                                <option value="Direct Firing">Direct Firing</option>
                                                <option value="Air Firing">Air Firing</option>
                                                <option value="Use Physical Force">Use Physical Force</option>
                                                <option value="Stick">Stick</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Attachements <br> <input class="form-control" type="file" name="incident_attach[]" placeholder="..." style="width: 70%;" multiple>
                                        </div>
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Notes <br>
                                            <textarea id="w3review10" onclick="moveCursorToStart10()" oninput="trimSpaces10()" class="form-control" name="incident_note[]" rows="2" cols="38">
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="new_branch mt-2">
                                        <button type="button" onclick="client_add_fields()">
                                            Add More
                                        </button>
                                    </div>
                                </div>
                                <h5 style="text-align:center;"><b><u>Assigment Instruction Form</u></b></h5>
                                <div class="row" id="assignmentInfo">
                                    <div class="col-lg-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-3 spacing-right">
                                                Customer Name <br>
                                                <input class="form-control" name="asig_customer_name[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Task Assigning <br> <input class="form-control" name="task_assigning[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Designation <br>
                                                <input class="form-control" type="text" name="asig_desig[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Office/Floor <br> <input class="form-control" name="asig_office[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Building Name<br> <input class="form-control" type="text" name="asig_building[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Road/Street <br> <input class="form-control" type="text" name="asig_road[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                Area <br> <input class="form-control" type="text" name="asig_area[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                City <br> <input class="form-control" type="text" name="asig_city[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                Country <br> <input class="form-control" type="text" name="asig_country[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Security Incharge <br> <input class="form-control" name="asig_security[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                Contact Details <br> <input class="form-control" name="asig_contact[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                            <h5>Site Incharge Details</h5>
                                            <div class="col-lg-3 spacing-right">
                                                Incharge Name <br>
                                                <input class="form-control" type="text" name="incharge_name[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Designation <br>
                                                <input class="form-control" type="text" name="incharge_desig[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Contact Details <br> <input class="form-control" name="incharge_contact[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-8 spacing-right">
                                                High Risk Areas <br>
                                                <input class="form-control" type="text" name="incharge_help[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-8 spacing-right">
                                                Description of Risk <br>
                                                <input class="form-control" type="text" name="incharge_desc[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-8 spacing-right">
                                                History of Risk <br> <input class="form-control" name="incharge_risk[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-8 spacing-right" style="margin-top: 40px">
                                                Assigned Area Manager Of PIFFERS <br>
                                                <input class="form-control" type="text" name="incharge_asig[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-8 spacing-right">
                                                Signed By <br> <input class="form-control" name="incharge_signed_by[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-8 spacing-right">
                                                Date <br> <input class="form-control" type="date" name="incharge_date[]" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-2">
                                        <h5>Address</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Office No <br> <input class="form-control" id="head_office_cell_no" name="incharge_offc[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Building <br> <input class="form-control" id="head_office_cell_no" name="incharge_build[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Block <br> <input class="form-control" id="head_office_cell_no" name="incharge_block[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Area <br> <input class="form-control" id="head_office_cell_no" name="incharge_area[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    City <br> <input class="form-control" id="head_office_cell_no" name="incharge_city[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Pin Location <br> <input class="form-control" id="location-input4" name="incharge_pin[]" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete4()">
                                                </div>
                                                <div >
                                                     <br> <input class="form-control" id="head_office_cell_no" name="longitude4[]" type="hidden" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div >
                                                    <br> <input class="form-control" id="head_office_cell_no" name="latitude4[]" type="hidden" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Country <br> <input class="form-control" name="incharge_country[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Site ID <br> <input class="form-control" name="incharge_site[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                A-Guard <br> <input class="form-control" name="incharge_a_g[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Un-A-Guard <br> <input class="form-control" name="incharge_a_ung[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Total Guard <br> <input class="form-control" name="incharge_t_g[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-8 spacing-right" style="margin-top:80px">
                                                Recent Security Related Incidents <br>
                                                <input class="form-control" type="text" name="rec_inc_rel[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-8 spacing-right">
                                                Frequency Of Occurence <br>
                                                <input class="form-control" type="text" name="feq_occ[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-8 spacing-right">
                                                Expectations from PIFFERS <br>
                                                <input class="form-control" type="text" name="exp_piff[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-8 spacing-right">
                                                Any Special Instructions <br> <input class="form-control" name="any_spec[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                            <div class="col-lg-8 spacing-right">
                                                Petrolling Instruction <br>
                                                <input class="form-control" type="text" name="petr_instruc[]" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>
                                    </div>
                                    <h3></h3>
                                    <div class="row mb-2">
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Attachments <br> <input class="form-control" type="file" name="asig_ex_attach[]" placeholder="..." style="width: 70%;" multiple>
                                        </div>
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Notes <br>
                                            <textarea id="w3review11" onclick="moveCursorToStart11()" oninput="trimSpaces11()" class="form-control" name="asig_ex_notes[]" rows="2" cols="38">
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="new_branch mt-2">
                                        <button type="button" id="addAssignment" onclick="addAssignmentSection()">Add More</button>
                                    </div>
                                </div>
                            </div>
                            <!--Audits-->
                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="audit" role="tabpanel" aria-labelledby="nav-loto-tab">
                                <div class=" row main-content div" id="auditsInfo">
                                    <h5>Audit 1 :</h5>
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <div class="col-lg-3 spacing-right">
                                                File Audited By : <br> <input class="form-control" id="head_office_name" name="audit_file[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Signature <br> <input class="form-control" id="head_office_email" name="audit_sign[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Date <br> <input class="form-control" id="head_office_name" name="audit_date[]" type="date" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Attachments <br> <input class="form-control" id="head_office_name" name="audit_attach[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mt-3">Checked By :</h5>
                                    <div class="row mb-2">
                                        {{-- <div class="col-lg-5 spacing-right form-group">
                                            Checked by: <br>
                                            <div class="input-group" style="width: 100%;">
                                                <select id="" class="form-control mt-1" name="audit_checked_by[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                    <option value="CMD">CMD</option>
                                                    <option value="CM">CM</option>
                                                    <option value="DGM">DGM</option>
                                                    <option value="GM">GM</option>
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                    <a>
                                                        <button class="btn btn-primary" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-5 spacing-left spacing-right form-group">
                                            Checked by: <br>
                                            <div class="input-group" style="width: 100%;">
                                                <select id="dropdown" class="form-control mt-1" name="audit_checked_by[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                    <option value=""></option>
                                                    @foreach ($checkedby as $checkedby)
                                                        <option value="{{ $checkedby->checkedby_name}}">{{ $checkedby->checkedby_name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                    <a href="{{ route('checkedby') }}">
                                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Attachements <br> <input class="form-control" name="audit_ex_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                                        </div>
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Notes <br>
                                            <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="audit_note[]" rows="2" cols="38">
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 spacing-left my-3">
                                        <button type="button" class="add-more-btn" onclick="audits_add_more()">Add More</button>
                                    </div>
                                    
                                </div>

                            </div>
                            <!--Intelligence-->
                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="intelligence" role="tabpanel" aria-labelledby="nav-loto-tab">
                                <div id="businessInfo">
                                    <div class=" row main-content div">
                                        <p>Please Collect information of other Business/Group of Customer.</p>
                                        <h5>POC :</h5>
                                        <div class="col-lg-12">
                                            <div class="row mb-2">

                                                <div class="col-lg-6 spacing-right">
                                                    Name of Business <br> <input class="form-control" id="head_office_name" name="bussiness_name[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Nature of Business <br> <input class="form-control" id="head_office_name" name="bussiness_nature[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-left">
                                                    <h5>Address</h5>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5 spacing-right">
                                                            Office No <br> <input class="form-control" id="head_office_cell_no" name="bussiness_office_no[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-5 spacing-left">
                                                            Floor <br> <input class="form-control" id="head_office_cell_no" name="bussiness_floor[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-5">
                                                            Building <br> <input class="form-control" id="head_office_cell_no" name="bussiness_building[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5 spacing-right">
                                                            Block <br> <input class="form-control" id="head_office_cell_no" name="bussiness_block[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-5 spacing-left">
                                                            Area <br> <input class="form-control" id="head_office_cell_no" name="bussiness_area[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5 spacing-right">
                                                            City <br> <input class="form-control" id="head_office_cell_no" name="bussiness_city[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-5 spacing-left">
                                                            Photograph of Building <br> <input class="form-control" id="" name="bussiness_photo[]" type="file" placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5 spacing-right">
                                                            Email <br> <input class="form-control vldemail" id="" name="bussiness_email[]" type="text" placeholder="..." style="width: 100%;">
                                                            <div id="emailError" class="emailError" style="color: red"></div>
                                                        </div>
                                                        <div class="col-lg-5 spacing-left">
                                                            Website <br> <input class="form-control vldwebsite" id="" name="bussiness_web[]" type="text" placeholder="..." style="width: 100%;">
                                                            <div id="websiteError" class="websiteError" style="color: red"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5 spacing-right">
                                                            Pin location <br> <input class="form-control" id="location-input5" name="bussiness_pin[]" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete5()">
                                                        </div>
                                                        <div >
                                                            <br> <input class="form-control" id="" name="longitude5[]" type="hidden" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div >
                                                            <br> <input class="form-control" id="" name="latitude5[]" type="hidden" placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                
                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                        <div class="col-lg-4 spacing-left spacing-right mt-2">
                                            Notes <br>
                                            <textarea id="w3review13" onclick="moveCursorToStart13()" oninput="trimSpaces13()" class="form-control" name="bussiness_notes[]" rows="2" cols="38">
                                            </textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right mt-2">
                                            Attachements <br> <input class="form-control" type="file" name="bussiness_attach[]" placeholder="..." style="width: 70%;" multiple>
                                        </div>
                                            
                                        </div>
                                        <div class="col-lg-2 spacing-left my-3">
                                            <button type="button" class="add-more-btn" onclick="business_add_more()">Add More</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <h5 style="text-align:center;"><b><u>Promotional Activities</u></b></h5>
                                <div class="row" id="give_a_ways">
                                    <div class="col-lg-6 spacing-right form-group">
                                        Customer Details Entered in all Promotional Activities <br>
                                        <div class="input-group" style="width: 100%;">
                                            <select id="category" class="form-control mt-1" name="promotional_act[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value=""></option>
                                                @foreach ($activities as $activity)
                                                        <option value="{{ $activity->activity_name}}">{{ $activity->activity_name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append" style="width: 30%;">
                                                <a href="{{ route('activities') }}">
                                                    <button class="btn btn-primary" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-1">
                                        <div class="spacing-left">
                                            Quantity <br> <input class="form-control" type="text" name="promotional_quantity[]" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                     <div class="form-type col-lg-6 spacing-right">
                                        Estimated price<br> <input class="form-control" id="shift_start_date" name="prom_price[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="form-type col-lg-6 spacing-right">
                                        Date <br> <input class="form-control" id="shift_end_date" name="prom_date[]" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6">
                                   
                                        Notes <br> <textarea id="w3review14" onclick="moveCursorToStart14()" oninput="trimSpaces14()" class="form-control" name="promotional_notes[]" rows="2" cols="38">
                                            </textarea>
                                   
                                    </div>
                                    <div class="col-lg-6">
                                 
                                        Attachments <br> <input class="form-control" type="file" name="promotional_attach[]" placeholder="..." style="width: 100%;">
                                   
                                    </div>
                                    
                                   
                                   
                                  
                                    <div class="col-lg-2 spacing-left my-5">
                                        <button type="button" class="add-more-btn" onclick="addPromotionalActivitySection()">Add More</button>
                                    </div>
                                </div>
                            </div>
                           
                            <!--Notes Tab-->
                            <div class="tab-pane fade  m-3" style="opacity: 90%;" id="notes-details" role="tabpanel" aria-labelledby="nav-notes-tab">

                                <div class="row">
                                    <div class="col-lg-6 spacing-right">
                                        <div class="row mb-2">
                                            <div class="form-type col-lg-6 spacing-right">
                                                Notes <br> <textarea class="form-control" type="text"  name="" placeholder="" style="width: 100%;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Language Tab-->
                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="language-details" role="tabpanel" aria-labelledby="nav-language-tab">

                                <div class="row">
                                    <div class="col-lg-6 spacing-right">
                                        <div class="row mb-2">
                                            <div class="form-type col-lg-6 spacing-right">
                                                Language <br> <select id="" class="form-control" name="" style="width: 100%;">
                                                    <option value="">English</option>
                                                    <option value="">French</option>
                                                    <option value="">Spanish</option>
                                                    <option value="">Chinese</option>
                                                    <option value="">Portuguese</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                 
                            <!--Feedback-->
                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="verifications" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <h5 class="mt-4" style="text-align:center;"><u><b>FEEDBACK</b></u></h5>
                                <div class="feedback">
                                    <div class="mt-2">
                                        <button class="btn btn-danger" type="button" id="add_feedback_btn" onclick="togglefeedbackForm">
                                            Add Feedback
                                        </button>
                                    </div>

                                    <div id="feedbackForm" style="display: none">
                                        <div class="row">
                                        <div class="col-lg-7">
                                            <div class="row mb-2">
                                                <div class="col-lg-11 spacing-right">
                                                    Client Name: <br> <input class="form-control" id="client_name" name="feed_client_name[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-11 spacing-right">
                                                    Client POC Name: <br> <input class="form-control" name="feed_client_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-11 spacing-right">
                                                    Email: <br> <input class="form-control vldemail" name="feed_client_email[]" type="date" placeholder="..." style="width: 100%;">
                                                    <div id="emailError" class="emailError" style="color: red"></div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-5">
                                            <div class="row mb-2">
                                                <div class="col-lg-6 spacing-left spacing-right">
                                                    Client ID: <br> <input class="form-control" id="client_id" name="feed_client_id[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-right">
                                                    Site ID: <br> <input class="form-control" name="feed_client_site_id[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-11 spacing-left spacing-right">
                                                    Designation: <br> <input class="form-control" name="feed_desig[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-11 spacing-left spacing-right">
                                                    Cell: <br> <input class="form-control vldphone" type="text" name="feed_cell[]" placeholder="..." style="width: 100%;">
                                                    <div id="phoneError" class="phoneError" style="color: red"></div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-11">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <div class="row mb-5">
                                                        <div class="col-lg-4 spacing-left spacing-right">
                                                            <h5>Feedback for the month:</h5>
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right">
                                                            <input class="form-control" type="text" name="feed_month[]" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        

                                                    </div>


                                                    <tr width="100%">
                                                        <th width="75%">
                                                            <p><b>A: Please Rate the following (Encircle from 1
                                                                    to 5):-
                                                                    (1 = Entirely Satisfied , 2 = Satisfied, 3 =
                                                                    Neutral, 4 = Unsatisfied, 5 = Entirely
                                                                    Unsatisfied)</b>
                                                            </p>
                                                        </th>
                                                        <th width="5%">Entirely Satisfied</th>
                                                        <th width="5%"> Satisfied</th>
                                                        <th width="5%">Neutral</th>
                                                        <th width="5%">Unsatisfied</th>
                                                        <th width="5%">Entirely Unsatisfied</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr width="100%">
                                                        <td width="75%">1. Punctuality and Attendance of
                                                            Guards</td>
                                                        <td width="5%"><input type="radio" name="q1[]" value="1"></td>
                                                        <td width="5%"><input type="radio" name="q1[]" value="2"></td>
                                                        <td width="5%"><input type="radio" name="q1[]" value="3"></td>
                                                        <td width="5%"><input type="radio" name="q1[]" value="4"></td>
                                                        <td width="5%"><input type="radio" name="q1[]" value="5"></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="75%">2.Discipline, Behavior & Character
                                                            of Guards</td>
                                                        <td width="5%"><input type="radio" name="q2[]" value="1"></td>
                                                        <td width="5%"><input type="radio" name="q2[]" value="2"></td>
                                                        <td width="5%"><input type="radio" name="q2[]" value="3"></td>
                                                        <td width="5%"><input type="radio" name="q2[]" value="4"></td>
                                                        <td width="5%"><input type="radio" name="q2[]" value="5"></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="75%">3. Smart Turnout of the Guards
                                                            (Uniform)</td>
                                                        <td width="5%"><input type="radio" name="q3[]" value="1"></td>
                                                        <td width="5%"><input type="radio" name="q3[]" value="2"></td>
                                                        <td width="5%"><input type="radio" name="q3[]" value="3"></td>
                                                        <td width="5%"><input type="radio" name="q3[]" value="4"></td>
                                                        <td width="5%"><input type="radio" name="q3[]" value="5"></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="75%">4.Working Condition of Weapons &
                                                            Security Equipments</td>
                                                        <td width="5%"><input type="radio" name="q4[]" value="1"></td>
                                                        <td width="5%"><input type="radio" name="q4[]" value="2"></td>
                                                        <td width="5%"><input type="radio" name="q4[]" value="3"></td>
                                                        <td width="5%"><input type="radio" name="q4[]" value="4"></td>
                                                        <td width="5%"><input type="radio" name="q4[]" value="5"></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="75%">5. Our Abidance regarding Taxes
                                                            (Income Tax & Sales Tax)</td>
                                                        <td width="5%"><input type="radio" name="q5[]" value="1"></td>
                                                        <td width="5%"><input type="radio" name="q5[]" value="2"></td>
                                                        <td width="5%"><input type="radio" name="q5[]" value="3"></td>
                                                        <td width="5%"><input type="radio" name="q5[]" value="4"></td>
                                                        <td width="5%"><input type="radio" name="q5[]" value="5"></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="75%">6. Our Compliance wrt EOBI, Social
                                                            Security & GLI of Guards</td>
                                                        <td width="5%"><input type="radio" name="q6[]" value="1"></td>
                                                        <td width="5%"><input type="radio" name="q6[]" value="2"></td>
                                                        <td width="5%"><input type="radio" name="q6[]" value="3"></td>
                                                        <td width="5%"><input type="radio" name="q6[]" value="4"></td>
                                                        <td width="5%"><input type="radio" name="q6[]" value="5"></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="75%">7. Timely Provision of Invoices &
                                                            Guards Payroll Management</td>
                                                        <td width="5%"><input type="radio" name="q7[]" value="1"></td>
                                                        <td width="5%"><input type="radio" name="q7[]" value="2"></td>
                                                        <td width="5%"><input type="radio" name="q7[]" value="3"></td>
                                                        <td width="5%"><input type="radio" name="q7[]" value="4"></td>
                                                        <td width="5%"><input type="radio" name="q7[]" value="5"></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="75%">8. Level of Training of Guards</td>
                                                        <td width="5%"><input type="radio" name="q8[]" value="1"></td>
                                                        <td width="5%"><input type="radio" name="q8[]" value="2"></td>
                                                        <td width="5%"><input type="radio" name="q8[]" value="3"></td>
                                                        <td width="5%"><input type="radio" name="q8[]" value="4"></td>
                                                        <td width="5%"><input type="radio" name="q8[]" value="5"></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="75%">9. Level of Supervisory Staff
                                                            Visiting the Guards</td>
                                                        <td width="5%"><input type="radio" name="q9[]" value="1"></td>
                                                        <td width="5%"><input type="radio" name="q9[]" value="2"></td>
                                                        <td width="5%"><input type="radio" name="q9[]" value="3"></td>
                                                        <td width="5%"><input type="radio" name="q9[]" value="4"></td>
                                                        <td width="5%"><input type="radio" name="q9[]" value="5"></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="75%">10. PIFFERS Mgmt Approach &
                                                            Behavior towards Customer Service</td>
                                                        <td width="5%"><input type="radio" name="q10[]" value="1"></td>
                                                        <td width="5%"><input type="radio" name="q10[]" value="2"></td>
                                                        <td width="5%"><input type="radio" name="q10[]" value="3"></td>
                                                        <td width="5%"><input type="radio" name="q10[]" value="4"></td>
                                                        <td width="5%"><input type="radio" name="q10[]" value="5"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p><b></b>B: Would you please, like to refer us any other Company /
                                            Organization?</b></p>
                                        <div class="col-lg-7">
                                            <div class="row mb-2">
                                                <div class="col-lg-11 spacing-right">
                                                    Company Name: <br> <input class="form-control" name="feed_company_name[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-11 spacing-right">
                                                    POC Name: <br> <input class="form-control" name="feed_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-11 spacing-right">
                                                    Suggestions / Comments:<br> <input class="form-control" name="feed_comment[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-11 spacing-right">
                                                    Feedback Form Filled By:<br> <input class="form-control" name="feedback_form[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-5">
                                            <div class="row mb-2">

                                                <div class="col-lg-11 spacing-left spacing-right">
                                                    Email: <br> <input class="form-control vldemail" type="text" name="feed_email[]" placeholder="..." style="width: 100%;">
                                                    <div id="emailError" class="emailError" style="color: red"></div>
                                                </div>
                                                <div class="col-lg-11 spacing-left spacing-right">
                                                    Telephone: <br> <input class="form-control" type="text" name="feed_telephone[]" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-11 spacing-left spacing-right">
                                                    Signature & Date: <br> <input class="form-control" name="feed_signature[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <p>To Be Filled by PIFFERS SECURITY SERVICES (PVT) LTD</p>
                                        <div class="col-lg-11 spacing-right">
                                            Feedback Form Received By: <br> <input class="form-control" name="feed_received[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-11 spacing-right">
                                            Remarks: <br> <input class="form-control" type="text" name="feed_remarks[]" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-11 spacing-right">
                                            Attachments: <br> <input id="" class="form-control" name="feed_attach[]" type="file" placeholder="..." style="width: 100%;">
                                        </div>

                                    </div>
                                    <div class="mt-2">
                                        <button class="btn btn-primary" type="button" id="" onclick="addFeedbackSection()">
                                            Add Feedback
                                        </button>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn btn-danger" type="button" id="remove_feedback_btn">
                                            Remove Feedback
                                        </button>
                                    </div>
                                    </div>
                                </div>
                                <h5 class="mt-4" style="text-align:center;"><u><b>Complaints Management</b></u></h5>
                                <div class=" mt-2">
                                    <button class="btn btn-dark" type="button" id="add_complaint_btn" onclick="toggleComplaintForm()">
                                        Add Complaint
                                    </button>
                                </div>
                                <div class="row" id="complaintForm" style="display:none;">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            
                                            
                                            <div class="col-lg-4 spacing-left spacing-right">
                                                Complaint Number <br> <input class="form-control" name="complaint_no[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <h5 class="mt-3">Guards Duty</h5>
                                            
                                            <div class="col-lg-5 spacing-left spacing-right form-group">
                                                Guards Duty <br>
                                                <div class="input-group" style="width: 100%;">
                                                    <select class="form-control mt-1" name="complaint_guards_duty" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                        <option value=""></option>
                                                        @foreach ($duties as $duty)
                                                                <option value="{{ $duty->duty_name}}">{{ $duty->duty_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="{{ route('duties') }}">
                                                            <button class="btn btn-primary" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                                                Notes <br>   <textarea id="w3review" class="form-control" name="complaint_gaurd_note[]" rows="2" cols="40">
                                                </textarea>
                                                </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Attachments <br> <input class="form-control" name="complaint_guard_attach[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <h5>Weapons, Uniform and Equipment</h5>
                                            <div class="col-lg-5 spacing-left spacing-right form-group">
                                                Weapons, Uniform and Equipment <br>
                                                <div class="input-group" style="width: 100%;">
                                                    <select class="form-control mt-1" name="wea_uni_equip[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                        <option value=" "> </option>
                                                        @foreach ($equipments as $equipment)
                                                                <option value="{{ $equipment->equipment_name}}">{{ $equipment->equipment_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="{{ route('equipments') }}">
                                                            <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                                                Notes <br>   <textarea id="w3review15" oninput="trimSpaces15()" onclick="moveCursorToStart15()" class="form-control" name="wue_note[]" rows="2" cols="40">
                                                </textarea>
                                                </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Attachments <br> <input class="form-control" name="wue_attach[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <h5>Finance Department</h5>
                                            <div class="col-lg-5 spacing-left spacing-right form-group">
                                                Finance Department <br>
                                                <div class="input-group" style="width: 100%;">
                                                    <select class="form-control mt-1" name="finance_dept[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                        <option value=""> </option>
                                                         @foreach ($finances as $finance)
                                                                <option value="{{ $finance->finance_name}}">{{ $finance->finance_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="{{ route('finances') }}">
                                                            <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                                                Notes <br>   <textarea id="w3review16" oninput="trimSpaces16()" onclick="moveCursorToStart16()" class="form-control" name="fd_note[]" rows="2" cols="40">
                                                </textarea>
                                                </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Attachments <br> <input class="form-control" name="fd_attach[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <h5>Source of Complaint</h5>
                                            <div class="col-lg-5 spacing-left spacing-right form-group">
                                                Source of Complaint <br>
                                                <div class="input-group" style="width: 100%;">
                                                    <select class="form-control mt-1" name="src_complaint[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                        <option value=" "> </option>
                                                         @foreach ($sources as $source)
                                                                <option value="{{ $source->source_name}}">{{ $source->source_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="{{ route('sources') }}">
                                                            <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                                                Notes <br>   <textarea id="w3review17" oninput="trimSpaces17()" onclick="moveCursorToStart17()" class="form-control" name="src_note[]" rows="2" cols="40">
                                                </textarea>
                                                </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Attachments <br> <input class="form-control" name="src_attach[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <h5>Management Issues</h5>

                                            <div class="col-lg-3 spacing-right">
                                                <label for="mng_feedback">Feedback:</label> <br>
                                                <select class="form-control mb-2" name="mng_feed[]" style="width: 100%; margin-top: -7px;">
                                                    <option value=""> </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Attachments <br>
                                                <input class="form-control" id="printing_date" name="mng_attach[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>

                                            <div class="col-lg-3 spacing-left" style="margin-left: 12px">
                                                Notes <br>
                                                <textarea id="w3review18" oninput="trimSpaces18()" onclick="moveCursorToStart18()" class="form-control" name="mng_note[]" rows="2" cols="40"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <h5>Complaint POC Details</h5>
                                            <div class="col-lg-4 spacing-right">
                                                Name <br> <input class="form-control" name="complaint_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Designation <br> <input class="form-control" name="complaint_poc_desig[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Department <br> <input class="form-control" name="complaint_poc_dept[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Email<br> <input class="form-control vldemail" name="complaint_poc_email[]" type="text" placeholder="..." style="width: 100%;">
                                                <div id="emailError" class="emailError" style="color: red"></div>
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Contact Number<br> <input class="form-control" name="complaint_poc_contact[]" type="text" placeholder="..." style="width: 100%;">
                                                <div id="phoneError" class="error-message" style="color: red"></div>
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Picture of Complaint <br> <input class="form-control" name="complaint_picture[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Details of Complaint <br> <textarea class="form-control" name="details_complaint[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Details Attachment<br> <input class="form-control" name="details_attach[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right form-group">
                                                Complaint Tagged To : <br>
                                                <div class="input-group" style="width: 100%;">
                                                    <select class="form-control mt-1" name="complaint_tagged[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                        <option value=""> </option>
                                                        @foreach ($complaintsTaggedTos as $complaintsto)
                                                                <option value="{{ $complaintsto->tagged_to_name}}">{{ $complaintsto->tagged_to_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="{{ route('complaintto') }}">
                                                            <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right form-group">
                                                Complaint Addressed By  : <br>
                                                <div class="input-group" style="width: 100%;">
                                                    <select class="form-control mt-1" name="complaint_arressed[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                        <option value=" "></option>
                                                         @foreach ($complaintsAddressedBies as $complaintsby)
                                                                <option value="{{ $complaintsby->addressed_by_name}}">{{ $complaintsby->addressed_by_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="{{ route('complaintby') }}">
                                                            <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Attachements <br> <input class="form-control" type="file" name="complaint_addressed_attach[]" placeholder="..." style="width: 70%;" multiple>
                                        </div>
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Notes <br>
                                            <textarea id="w3review19" oninput="trimSpaces19()" class="form-control" onclick="moveCursorToStart19()" name="complaint_addressed_note[]" rows="2" cols="38">
                                            </textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-2">
                                        <button class="btn btn-primary" type="button" id="" onclick="addComplaintSection()">
                                            Add Complaint
                                        </button>
                                    </div> 
                                    <div class="mt-2">
                                        <button class="btn btn-dark" type="button" id="remove_complaint_btn" >
                                            Remove Complaint
                                        </button>
                                    </div>  
                                </div>
                                <h5 class="mt-4" style="text-align:center;"><u><b>Notifications</b></u></h5>
                                <div class="mt-2">
                                    <button class="btn btn-info" type="button" id="add_notification_btn">
                                        Add Notification
                                    </button>
                                </div>
                                <div class="col-lg-12 spacing-right" id="notificationForm" style="display:none;">
                                    <div class="row mb-2">
                                        <div class="col-lg-3 spacing-right">
                                            Notification No. <br> <input class="form-control" type="text" name="notification_no[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right form-group">
                                                Notification Related to : <br>
                                                <div class="input-group" style="width: 100%;">
                                                    <select class="form-control mt-1" name="notification_related[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                        <option value=""> </option>
                                                        @foreach ($notifications as $notification)
                                                                <option value="{{ $notification->notification_name}}">{{ $notification->notification_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="{{ route('notifications') }}">
                                                            <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-lg-4 spacing-left">
                                            Attachment. <br> <input class="form-control" type="file" name="notification_attach[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3">
                                            Notes. <br> <textarea class="form-control" type="text" name="notification_note[]" placeholder="..." style="width: 100%;"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5 spacing-left spacing-right form-group">
                                            Notification Shared With : <br>
                                            <div class="input-group" style="width: 100%;">
                                                <select class="form-control mt-1" name="notification_shared[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                    <option value=""> </option>
                                                     @foreach ($notificationshared as $notification)
                                                                <option value="{{ $notification->notification_shared_name}}">{{ $notification->notification_shared_name }}</option>
                                                        @endforeach
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                    <a href="{{ route('notificationshared') }}">
                                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Attachements <br> <input class="form-control" type="file" name="notification_ex_attach[]" placeholder="..." style="width: 70%;" multiple>
                                        </div>
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Notes <br>
                                            <textarea id="w3review20" oninput="trimSpaces20()" class="form-control" onclick="moveCursorToStart20()" name="notification_ex_note[]" rows="2" cols="38">
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn btn-primary" type="button" id="" onclick="addNotificationSection()">
                                            Add Notification
                                        </button>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn btn-info" type="button" id="remove_notification_btn">
                                            Remove Notification
                                        </button>
                                    </div> 
                                </div>
                            </div>
                            <!--monthly performance-->
                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="address-details" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <!--Tabs forDetails-->
                                <div class="row">
                                    <nav>
                                        <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link" id="nav-meeting-tab" data-toggle="tab" href="#meeting" role="tab" aria-controls="nav-meeting" aria-selected="false">Meetings
                                            with Customer
                                            </a>
                                            <a class="nav-item nav-link" id="nav-meeting-tab" data-toggle="tab" href="#score" role="tab" aria-controls="nav-meeting" aria-selected="false">Score Card
                                            </a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">

                                            <!--sales-pipeline-->
                                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-pipeline" role="tabpanel" aria-labelledby="nav-contact-tab">


                                            </div>
                                            <!--Meeting with Customer-->
                                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="meeting" role="tabpanel" aria-labelledby="nav-meeting-tab">
                                                <div class=" row main-content div">
                                                    <div class="col-lg-6">
                                                        <div class="row mb-2">
                                                            <div class="col-lg-6 spacing-right">
                                                                Date of meeting <br> <input class="form-control" id="head_office_name" name="meeting_date" type="date" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left spacing-right">
                                                                Meeting Chaired By <br> <input class="form-control" id="head_office_email" name="meeting_chaired" type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-6 spacing-right">
                                                                Minutes of Meeting <br> <input class="form-control" id="head_office_name" name="meeting_minutes" type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left spacing-right">
                                                                Attachment <br> <input class="form-control" id="head_office_email" name="meeting_attach" type="file" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5  spacing-right">
                                                            Customer Comments <br> <textarea class="form-control" id="head_office_comp" name="meeting_comment" type="text" placeholder="..." style="width: 100%;"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        <div class="row mb-2">
                                                            
                                                            <div class="col-lg-5 spacing-left spacing-right form-group">
                                                                Main Point of Concern <br>
                                                                <div class="input-group" style="width: 100%;">
                                                                    <select id="dropdown" class="form-control mt-1" name="meeting_main_point" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                        <option value=""></option>
                                                                        @foreach ($mpoc as $mpoc)
                                                                            <option value="{{ $mpoc->mpoc_name}}">{{ $mpoc->mpoc_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="input-group-append" style="width: 30%;">
                                                                        <a href="{{ route('mpoc') }}">
                                                                            <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5 spacing-left">
                                                                Attachment <br> <input class="form-control" id="head_office_cell_no" name="meeting_ex_attach" type="file" placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5 spacing-right">
                                                            Frequency of Meeting <br> <input class="form-control" id="head_office_cell_no" name="meeting_freq" type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left">
                                                                Picture of Building <br> <input class="form-control" id="head_office_cell_no" name="meeting_freq_attach" type="file" placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5  spacing-right">
                                                                Note <br> <textarea class="form-control" id="head_office_email" name="meeting_freq_note" type="text" placeholder="..." style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-lg-5 spacing-right">
                                                                Alert <br> <input class="form-control" id="head_office_cell_no" name="meeting_freq_alert" type="text" placeholder="meeting is pending" style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                                            Attachements <br> <input class="form-control" type="file" name="meeting_alert_attach" placeholder="..." style="width: 70%;" multiple>
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                                            Notes <br>
                                                            <textarea id="w3review21" oninput="trimSpaces21()" onclick="moveCursorToStart21()" class="form-control"  name="meeting_alert_notes"  rows="2" cols="38">
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Score Card-->
                                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="score" role="tabpanel" aria-labelledby="nav-meeting-tab">
                                            <img src="/smart.png" alt="smart-turnout" style="position:relative; left:22%;" />
                                            <div class="row mb-1">
                                                <div class="col-lg-4 spacing-left">
                                                    Customer Name <br> <input class="form-control" name="scr_cus_name" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-left">
                                                    Region <br> <input class="form-control" name="scr_cus_region" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-left">
                                                    Customer ID <br> <input class="form-control" name="scr_cus_id" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-left">
                                                    Site ID <br> <input class="form-control" name="scr_cus_site_id" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-left">
                                                    Report <br> <input class="form-control" name="scr_cus_report" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-left">
                                                    Date <br> <input class="form-control" name="scr_cus_date" type="date" placeholder="..." style="width: 100%;">
                                                </div>
                                                </div>
                                                <hr width="90%" />
                                                <div class="row mb-1">
                                                    <div class="col-lg-4 spacing-left">
                                                        Customer POC Name <br> <input class="form-control" name="cus_poc_name" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Signature <br> <input class="form-control" name="cus_poc_signature" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Cell <br> <input class="form-control vldphone" name="cus_poc_cell" type="text" placeholder="..." style="width: 100%;">
                                                        <div id="phoneError" class="phoneError" style="color: red"></div>
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        CRO Name <br> <input class="form-control" name="cro_name" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Signature <br> <input class="form-control" name="cro_signature" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Cell <br> <input class="form-control vldphone" name="cro_cell" type="text" placeholder="..." style="width: 100%;">
                                                        <div id="phoneError" class="phoneError" style="color: red"></div>
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        GM/DGM Name <br> <input class="form-control" name="gm_name" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Signature <br> <input class="form-control" name="gm_signature" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Cell <br> <input class="form-control vldphone" name="gm_signature" type="text" placeholder="..." style="width: 100%;">
                                                        <div id="phoneError" class="phoneError" style="color: red"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" >
                                                      <img src="score.jpg" height="1000" width="800"/>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <button type="submit"  class="btn btn-primary" style="margin-left: 20%;">Submit</button>
                    </form>

                </section>

            <!-- </div> -->

        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    var signatoryRoom = 1;

    function addSignatorySection() {
        signatoryRoom++;
        var objTo = document.getElementById('signatoryDetailsContainer');
        var divTest = document.createElement("div");
        divTest.setAttribute("class", "removeclass" + signatoryRoom);

        divTest.innerHTML = `
        
            <div class="row mb-2">
                <div class="col-lg-5 spacing-right">
                    Name <br> <input class="form-control" name="sign_name[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-right">
                    Designation <br> <input class="form-control" name="sign_desig[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-right">
                    Cell No <br> <input class="form-control vldphone" type="text" name="sign_cell[]" placeholder="..." style="width: 100%;">
                    <div id="phoneError" class="phoneError" style="color: red"></div>
                </div>
                <div class="col-lg-5 spacing-right">
                    Email <br> <input class="form-control vldemail" type="text" name="sign_email[]" placeholder="..." style="width: 100%;">
                    <div id="emailError" class="emailError" style="color: red"></div>
                </div>
                <div class="new_branch mt-2">
                    <button type="button" onclick="removeSignatorySection(${signatoryRoom})">
                        Remove
                    </button>
                </div>
            </div>
            <hr>
        `;

        objTo.appendChild(divTest);
    }

    function removeSignatorySection(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>

<script>
    var salaryRoom = 1;

    function addSalarySection() {
        salaryRoom++;
        var objTo = document.getElementById('salaryContainer');
        var divTest = document.createElement("div");
        divTest.setAttribute("class", "removeclass" + salaryRoom);

        divTest.innerHTML = `
        <div class=" row main-content div">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <div class="col-lg-3 spacing-right">
                                                Category : <br> <input class="form-control" id="head_office_name" name="cat_name[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Salary of [Category] <br> <input class="form-control" id="head_office_email" name="sal_cat[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Salary for No. of days <br> <input class="form-control" id="head_office_name" name="sal_days[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Leaves Allowed <br> <input class="form-control" id="head_office_name" name="leaves_a[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Other Benefits <br> 
                                                {{-- <input class="form-control" id="head_office_name" name="other_ben[]" type="text" placeholder="..." style="width: 100%;"> --}}
                                                <textarea id="w3review23" oninput="trimSpaces23()" onclick="moveCursorToStart23()" class="form-control" name="other_ben[]" rows="2" cols="38" ></textarea>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Attachements <br> <input class="form-control" type="file" name="sal_attach[]" placeholder="..." style="width: 70%;" multiple>
                                        </div>
                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                            Notes <br>
                                            <textarea id="w3review3" oninput="trimSpaces3()" onclick="moveCursorToStart3()" class="form-control" name="sal_note" rows="2" cols="38" >
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="new_branch mt-2">
                                        <button type="button" onclick="removeSignatorySection(${salaryRoom})">
                                            Remove
                                        </button>
                                    </div>
                                </div>
        `;

        objTo.appendChild(divTest);
    }

    function removeSalarySection(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>




<script>
    var departmentRoom = 1;

function department_add_fields() {
    departmentRoom++;
    var objTo = document.getElementById('department_add_fields');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "third-col removeclass" + departmentRoom);

    divtest.innerHTML = `
    <div class="row">
    <div class="spacing-right form-group">
                                        Department Type <br>
                                        <div class="input-group" style="width: 100%;">
                                            <select id="dropdown" class="form-control mt-1" name="dept_type[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value=""></option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->department_name }}">{{ $department->department_name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append" style="width: 30%;">
                                                <a href="{{ route('department') }}">
                                                    <button class="btn btn-primary" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-6 spacing-right">
                                                POC Name <br> <input class="form-control" name="dept_name[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Email <br> <input class="form-control vldemail" name="dept_email[]" type="text" placeholder="..." style="width: 100%;">
                                                <div id="emailError" class="emailError" style="color: red"></div>
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Cell Number <br> <input class="form-control vldphone" name="dept_cell[]" type="text" placeholder="..." style="width: 100%;">
                                                <div id="phoneError" class="phoneError" style="color: red"></div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                Address <br> <input class="form-control" name="dept_address[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6  spacing-right">
                                                Designation <br> <input class="form-control" name="dept_desig[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right">
                                                CNIC picture (front) <br> <input class="form-control" name="dept_front[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6  spacing-right">
                                                CNIC picture (back) <br> <input class="form-control" name="dept_back[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-left spacing-right">
                                                Notes <br>
                                                <textarea id="w3review6" onclick="moveCursorToStart6()" oninput="trimSpaces6()" class="form-control" name="dept_notes[]" rows="2" cols="24">
                                                </textarea>
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Attachments <br> <input class="form-control" name="dept_attach[]" type="file" placeholder="..." style="width: 100%;" multiple>
                                            </div>
                                            
                                        </div>

                                    </div>

                                    <div class="col-lg-6 spacing-left">
                                        <h5>Address</h5>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Office No <br> <input class="form-control" name="dept_office[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Building <br> <input class="form-control" name="dept_build[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Block <br> <input class="form-control" name="dept_block[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Area <br> <input class="form-control" name="dept_area[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                City <br> <input class="form-control" name="dept_city[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Photograph of building <br> <input class="form-control" name="dept_photo[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5 spacing-right">
                                                Pin Location <br> <input id="location-input3" class="form-control" name="dept_pin[]" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete3()">
                                            </div>
                                            <div class="col-lg-6 spacing-left ">
                                                Attachments <br> <input class="form-control" name="dept_ex_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                                                </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div >
                                                 <br> <input class="form-control" name="longitude3[]" type="hidden" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div >
                                                <br> <input class="form-control" name="latitude3[]" type="hidden" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Notes <br>
                                                <textarea id="w3review7" onclick="moveCursorToStart7()" oninput="trimSpaces7()" class="form-control" name="dept_ex_notes[]" rows="2" cols="38">
                                                </textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    </div>
        
        <div class="input-group-append" style="width: 30%;">
            <button class="btn btn-primary" type="button" onclick="department_remove_fields(${departmentRoom})">Remove Department</button>
        </div>
    `;

    objTo.appendChild(divtest);
}

function department_remove_fields(rid) {
    $('.removeclass' + rid).remove();
}

</script>

<script>
    var emergencyServicesRoom = 1;

function emergencyServices_add_fields() {
    emergencyServicesRoom++;
    var objTo = document.getElementById('emergencyServices_add_fields');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "third-col removeclass" + emergencyServicesRoom);

    divtest.innerHTML = `
        <div class="row">
            <div class=" row main-content div">
                <div class="col-lg-6">
                    <div class="row mb-2">
                        <div class="col-lg-6 spacing-left spacing-right form-group">
                                                    Emergency Services <br>
                                                    <div class="input-group" style="width: 100%;">
                                                        <select id="dropdown" class="form-control mt-1" name="emer_ser[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                            <option value=""></option>
                                                           
                                                                <option value="{{ $emerser->emerser_name}}">{{ $emerser->emerser_name }}</option>
                                                           
                                                        </select>
                                                        <div class="input-group-append" style="width: 30%;">
                                                            <a href="{{ route('emerser') }}">
                                                                <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                        <div class="col-lg-6 spacing-right">
                            Picture of Police Station <br> <input class="form-control" name="emer_pic[]" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-6">
                                <!--Image Preview Biometric-->
                                <div class="image-preview26" id="imagePreview26">
                                    <img src="" alt="Image Preview26" class="image-preview__image26" style="height: 100%; width:100%; margin-left:-15px">
                                    <span class="image-preview__default-text26"> Image Preview </span>
                                </div>
                            </div>
                        </div>
                        <h5>POC</h5>
                        <div class="col-lg-6 spacing-right">
                            Name. <br> <input class="form-control" id="head_office_name" name="emer_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Designation. <br> <input class="form-control" id="head_office_name" name="emer_poc_desig[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Cell Number. <br> <input class="form-control" id="head_office_name" name="emer_poc_cell[]" type="text" placeholder="..." style="width: 100%;">
                            
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Email. <br> <input class="form-control " id="head_office_name" name="emer_poc_email[]" type="text" placeholder="..." style="width: 100%;">
                            
                        </div>
                        
                        <div class="col-lg-6 spacing-right">
                            Notes. <br> <textarea class="form-control" id="head_office_name" name="emer_poc_notes[]" type="notes" placeholder="..." style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Attachment <br> <input class="form-control" id="head_office_name" name="emer_poc_attach[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 spacing-left">
                    <h5>Address :</h5>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Office No <br> <input class="form-control" id="head_office_cell_no" name="emer_office[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Building <br> <input class="form-control" id="head_office_cell_no" name="emer_building[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Block <br> <input class="form-control" id="head_office_cell_no" name="emer_block[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Area <br> <input class="form-control" id="head_office_cell_no" name="emer_area[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            City <br> <input class="form-control" id="head_office_cell_no" name="emer_city[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Photograph of Building <br> <input class="form-control" id="head_office_cell_no" name="emer_loc[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Email <br> <input class="form-control " id="" name="emer_email[]" type="text" placeholder="..." style="width: 100%;">
                            
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Website <br> <input class="form-control " id="" name="emer_web[]" type="text" placeholder="..." style="width: 100%;">
                            
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Pin location <br> <input class="form-control" id="" name="emer_pin[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div>
                            <br> <input class="form-control" id="" name="longitude2[]" type="hidden" placeholder="..." style="width: 100%;">
                        </div>
                        <div>
                             <br> <input class="form-control" id="" name="latitude2[]" type="hidden" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 spacing-right mt-2">
            Applicable Rental Property Number <br> <input class="form-control" name="emer_app_rental[]" type="text" placeholder="..." style="width: 70%;" multiple>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6 spacing-right spacing-right mt-2">
                    Attachements <br> <input class="form-control" name="emer_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                </div>
                <div class="col-lg-6 spacing-left spacing-right mt-2">
                    Notes <br>
                    <textarea id="w3review" class="form-control" name="emer_note[]" rows="2" cols="38">
                    </textarea>
                </div>
            </div>
        </div>
        
        <div style="width: 50%;">
            <button class="btn btn-primary" type="button" onclick="emergencyServices_remove_fields(${emergencyServicesRoom})" >Remove</button>
        </div>
    `;

    objTo.appendChild(divtest);
}

function emergencyServices_remove_fields(rid) {
    $('.removeclass' + rid).remove();
}

</script>

<script>
    // Get the "ALL" checkbox
    const allCheckbox = document.getElementById('checkboxProv');

    // Get all checkboxes with the 'province-checkbox' class
    const provinceCheckboxes = document.querySelectorAll('.province-checkbox');

    // Add click event listener to "ALL" checkbox
    allCheckbox.addEventListener('click', function () {
        provinceCheckboxes.forEach(function (checkbox) {
            // Set the state of each province checkbox to match the "ALL" checkbox
            checkbox.checked = allCheckbox.checked;
        });
    });
</script>


{{-- <script>
    var manpowerRoom = 1;

    function manpower_add_fields() {
    manpowerRoom++;
    var objTo = document.querySelector('.manpower');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "third-col removeclass" + manpowerRoom);

    divtest.innerHTML = `
        <div class="row col-lg-12 manpower">
            <div class="col-lg-6 spacing-right">
                <div class="row mb-2">
                    <input class="form-control" type="hidden" name="man_id[]" placeholder="..." style="width: 100%;">
                    <div class="form-type col-lg-5 spacing-left">
                        Guard Post No <br> <div class="input-group" style="width: 100%;">
                            <select id="dropdown" class="form-control mt-1" name="man_post[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                <option value=""></option>
                                @foreach ($guardposts as $guardpost)
                                    <option value="{{ $guardpost->guard_post }}">{{ $guardpost->guard_post }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append" style="width: 30%;">
                                <a href="{{ route('guardpost') }}">
                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                        Category <br>
                        <div class="input-group" style="width: 100%;">
                            <select id="dropdown" class="form-control mt-1" name="man_cat[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                <option value=""></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append" style="width: 30%;">
                                <a>
                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                        Uniform Type <br> <input class="form-control" name="man_uni[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                        Uniform Number <br> <input class="form-control" name="man_uni_no[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                        Weapon Type <br> <input class="form-control" name="man_weapon[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                        Ammunition Type <br> <input class="form-control" name="man_ammu[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                        Equipment <br> <input class="form-control" name="man_equip[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="form-type col-lg-5 spacing-right">
                        Picture of Equipment <br> <input class="form-control" name="man_equip_attach[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                </div>
                
            </div>
            <div class="col-lg-6 spacing-left">
                <div class="row mb-3">
                    <div class="form-type col-lg-6 spacing-right">
                        Shift Start date. <br> <input class="form-control" name="s_start_date[]" type="date" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="form-type col-lg-6 spacing-right">
                        Shift End date. <br> <input class="form-control" name="s_end_date[]" type="date" placeholder="..." style="width: 100%;">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-type col-lg-6 spacing-right">
                        Shift Start time. <br> <input class="form-control" name="s_start_time[]" type="time" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="form-type col-lg-6 spacing-right">
                        Shift End time. <br> <input class="form-control" name="s_end_time[]" type="time" placeholder="..." style="width: 100%;">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-type col-lg-6 spacing-right">
                    Deployment Start date. <br> <input class="form-control" name="man_start_date[]" type="date" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="form-type col-lg-6 spacing-right">
                    Deployment End date. <br> <input class="form-control" name="man_end_date[]" type="date" placeholder="..." style="width: 100%;">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-type col-lg-6 spacing-right">
                    Deployment Start time. <br> <input class="form-control" name="man_start_time[]" type="time" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="form-type col-lg-6 spacing-right">
                    Deployment End time. <br> <input class="form-control"  name="man_end_time[]" type="time" placeholder="..." style="width: 100%;">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-type col-lg-6 spacing-right">
                    Quantity. <br> <input class="form-control" name="man_quan[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="form-type col-lg-6 spacing-right">
                    Duty Hours. <br> <input class="form-control"  name="man_hours[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-type col-lg-6 spacing-right">
                    Post Orders / JD of Guard Post. <br> <input class="form-control" name="man_jd[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="form-type col-lg-6 spacing-right">
                    Any Special Instructions. <br> <input class="form-control" name="man_any_sp[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-type col-lg-6 spacing-right">
                        Approved Leaves. <br> <input class="form-control" name="man_apr_l[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="form-type col-lg-6 spacing-right">
                        Salary of total days. <br> <input class="form-control" name="man_salary[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="new_branch mt-2">
                    <button type="button" onclick="manpower_add_fields()">
                        Add more
                    </button>
                </div>
            </div>
        </div>  
        <div class="row mb-2">
            <div class="new_branch mt-2">
                <button type="button" onclick="manpower_remove_fields(${manpowerRoom})">
                    Remove
                </button>
            </div>
        </div>
    `;

    objTo.appendChild(divtest);
    }

    function manpower_remove_fields(rid) {
        $('.removeclass' + rid).remove();
    }
</script> --}}

<script>
    var clientRoom = 1;

function client_add_fields() {
    clientRoom++;
    var objTo = document.querySelector('.client-info');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "third-col removeclass" + clientRoom);

    divtest.innerHTML = `
        <div class="row">
            <div class="col-lg-6">
                <div class="row mb-2">
                    <div class="col-lg-3 spacing-right">
                        Client Name <br>
                        <input class="form-control" type="text" name="client_name[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-left spacing-right">
                        Client ID <br> <input class="form-control" type="text" name="client_id[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right">
                        Site ID <br> <input class="form-control" type="text" name="client_site_id[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right">
                        Client POC Name <br>
                        <input class="form-control" type="text" name="client_poc[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-left spacing-right">
                        Cell <br> <input class="form-control " type="text" name="client_cell[]" placeholder="..." style="width: 100%;">
                        
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right">
                        Email <br> <input class="form-control" type="text" name="client_email[]" placeholder="..." style="width: 100%;">
                        
                    </div>
                    <div class="col-lg-3 spacing-right">
                        Site Address <br>
                        <input class="form-control" type="text" name="client_site_address[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-left spacing-right">
                        Office/Floor <br> <input class="form-control" name="client_office[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right">
                        Building Name<br> <input class="form-control" name="client_build[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right">
                        Street <br>
                        <input class="form-control" type="text" name="client_street[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-left spacing-right">
                        Area <br> <input class="form-control" name="client_area[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right">
                        City <br> <input class="form-control" name="client_city[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 12px;">
                        FIR # <br> <input class="form-control" name="client_fir[]" type="text" placeholder="..." style="width: 115%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 30px;">
                        Arrest # <br> <input class="form-control" name="arrest[]" type="text" placeholder="..." style="width: 101%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 12px;">
                        Casualities # <br> <input class="form-control" name="casual[]" type="text" placeholder="..." style="width: 115%;"">
                    </div>

                    <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 30px;">
                        Injuired # <br> <input class="form-control" name="injuired[]" type="text" placeholder="..." style="width: 101%;">
                    </div>

                    <div class="row mb-2" style="margin-left:2px;">
                        <div class="col-lg-6 spacing-left spacing-right">
                            Incident Reported to <br>
                           <select id="" class="form-control" name="incident_rep[]" style="width: 100%;">
                                <option value="PIFFERS Office">PIFFERS Office</option>
                                <option value="Police Station/15">Police Station/15</option>
                                <option value="Ambulance">Ambulance</option>
                                <option value="Fire Brigade">Fire Brigade</option>
                                <option value="Rescue 1122">Rescue 1122</option>
                            </select>
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right">
                            Police Officer Name <br> <input class="form-control" name="police_officer_name[]" type="text" placeholder="..." style="width: 87%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right">
                            Station <br> <input class="form-control" type="text" name="station[]" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right">
                            Rank <br> <input class="form-control" type="text" name="rank[]" placeholder="..." style="width: 87%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right">
                            Report Made by <br> <input class="form-control" name="report_made_by[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right">
                            Date <br> <input class="form-control" name="report_date[]" type="date" placeholder="..." style="width: 87%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right">
                            Time <br> <input class="form-control" name="report_time[]" type="time" placeholder="..." style="width: 87%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right">
                            Approved By <br> <input class="form-control" name="report_apr_by[]" type="time" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right">
                            Shared with <br> <input class="form-control" name="report_shared[]" type="text" placeholder="..." style="width: 87%;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row mb-2">
                    <div class="col-lg-5 spacing-left spacing-right">
                        Incident Type <br> <select id="" class="form-control" name="incident_type[]" style="width: 100%;">
                            <option value="Abuse">Abuse</option>
                            <option value="Violence">Violence</option>
                            <option value="Theft">Theft</option>
                            <option value="Robbery">Robbery</option>
                            <option value="Damage">Damage</option>
                            <option value="Terrorism">Terrorism</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-lg-6 spacing-left spacing-right">
                        Weapon used by Attacker <br> <select id="" class="form-control" name="weapon_used[]" style="width: 100%;">
                            <option value="Gun">Gun</option>
                            <option value="Knives">Knives</option>
                            <option value="Stones">Stones</option>
                            <option value="Physical">Physical</option>
                            <option value="Chemical">Chemical</option>
                            <option value="Gas">Gas</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="col-lg-6 spacing-left spacing-right">
                        Details of Attacker <br> <select id="" class="form-control" name="detail_of_attacker[]" style="width: 83%;">
                            <option value="Entry">Entry</option>
                            <option value="Exit">Exit</option>
                            <option value="Car/Bike">Car/Bike</option>
                            <option value="Car/Bike No">Car/Bike No</option>
                            <option value="Model">Model</option>
                            <option value="Type">Type</option>
                            <option value="Color">Color</option>
                        </select>
                    </div>
                    <div class="col-lg-6 spacing-left spacing-right" style="margin-left: -42px;">
                        Attacker Description <br> <select id="" class="form-control" name="attacker_desc[]" style="width: 100%;">
                            <option value="Gender">Gender</option>
                            <option value="Age">Age</option>
                            <option value="Height">Height</option>
                            <option value="Complexion">Complexion</option>
                            <option value="Hair Color">Hair Color</option>
                            <option value="Wearing Color">Wearing Color</option>
                        </select>
                    </div>
                    <div class="row mb-2" style="margin-left: -24px;">
                        <div class="col-lg-3 spacing-right">
                            Shoes <br>
                            <input class="form-control" type="text" name="attacker_shoe[]" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-3 spacing-left spacing-right">
                            Beard/M <br> <input class="form-control" name="attacker_beard[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right">
                            Language <br> <input class="form-control" type="text" name="attacker_lang[]" placeholder="..." style="width: 117%;">
                        </div>
                        <div class="col-lg-3 spacing-right">
                            Focused on <br>
                            <input class="form-control" type="text" name="focused[]" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-3 spacing-left spacing-right">
                            Opening Phrase <br> <input class="form-control" name="opening_phrase[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right">
                            Anything Unusual <br> <input class="form-control" name="any_usual[]" type="text" placeholder="..." style="width: 117%;">
                        </div>
                    </div>
                </div>
                <div class="row mb-2" style="margin-top: -10px ;">
                    <div class="col-lg-6 spacing-left spacing-right">
                        Estimated Loss in PKR <br> <input class="form-control" name="estimated_loss[]" type="text" placeholder="..." style="width: 91%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right" style="margin-left: -20px;">
                        Description of Loss <br> <input class="form-control" type="text" name="desc_loss[]" placeholder="..." style="width: 110%;">
                    </div>
                </div>
                <div class="col-lg-6 spacing-left spacing-right" style="margin-top:-6px; margin-left:-15px;">
                    Officers Response <br> <select id="" class="form-control" name="officer_response[]" style="width: 100%;">
                        <option value="Defense">Defense</option>
                        <option value="Attack">Attack</option>
                        <option value="Direct Firing">Direct Firing</option>
                        <option value="Air Firing">Air Firing</option>
                        <option value="Use Physical Force">Use Physical Force</option>
                        <option value="Stick">Stick</option>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6 spacing-left spacing-right mt-2">
                    Attachements <br> <input class="form-control" type="file" name="incident_attach[]" placeholder="..." style="width: 70%;" multiple>
                </div>
                <div class="col-lg-6 spacing-left spacing-right mt-2">
                    Notes <br>
                    <textarea id="w3review" class="form-control" name="incident_note[]" rows="2" cols="38">
                    </textarea>
                </div>
            </div>
            <div class="new_branch mt-2">
                 <button type="button" onclick="client_remove_fields(${clientRoom})">Remove</button>
            </div>
        </div>
    `;

    objTo.appendChild(divtest);
}

function client_remove_fields(rid) {
    var element = document.querySelector('.removeclass' + rid);
    element.parentNode.removeChild(element);
}

</script>

<script>
    var inspectionRoom = 1;

    function addInspectionSection() {
        inspectionRoom++;
        var objTo = document.getElementById('inspectionInfo');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "removeclass" + inspectionRoom);

        divtest.innerHTML = `
            <div class="row mb-2">
                <div class="col-lg-4 spacing-right">
                    Inspection Number <br> <input class="form-control" type="text" name="inspection_no[]" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Employee id <br> <input class="form-control" type="text" name="inspection_emp_id[]" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Name <br> <input class="form-control" type="text" name="inspection_emp_name[]" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-4 spacing-right">
                    Cell Number: <br> <input class="form-control" type="text" name="inspection_emp_cell[]" placeholder="" style="width: 100%;">
                    
                </div>
                <div class="col-lg-4 spacing-right">
                    Department <br> <input class="form-control" type="text" name="inspection_emp_dept[]" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left" style="margin-left:8px;">
                    Date of inspection. <br> <input class="form-control" type="date" name="inspection_date[]" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left">
                    Picture of Inspection <br> <input class="form-control basic-info-attachements" id="inpFile${inspectionRoom}" type="file" name="inspection_pic[]" placeholder="..." style="width: 100%;" multiple>
                    <div class="image-preview${inspectionRoom}" id="imagePreview${inspectionRoom}">
                        <img src="" alt="Image Preview" class="image-preview__image" style="height: 30%; width:30%;">
                        <span class="image-preview__default-text"> Image Preview </span>
                    </div>
                </div>
                <div class="col-lg-4 spacing-right">
                    Remarks of Petroling Officer <br> <textarea class="form-control basic-info-attachements" id="inpFile2" type="text" name="inspection_rem_petr[]" placeholder="..." style="width: 100%;" multiple></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    Notes <br> <textarea class="form-control basic-info-attachements" id="" type="text" name="inspection_note[]" placeholder="..." style="width: 100%;" multiple></textarea>
                </div>
                <div class="col-lg-3 spacing-left">
                    Attachments <br> <input class="form-control basic-info-attachements" id="" type="file" name="inspection_attach[]" placeholder="..." style="width: 100%;" multiple>
                </div>
                <div class="new_branch mt-2">
                    <button type="button" onclick="removeInspectionSection(${inspectionRoom})">
                        Remove
                    </button>
                </div>
            </div>
            <hr>
        `;

        objTo.appendChild(divtest);
    }

    function removeInspectionSection(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>

<script>
    var feedbackRoom = 1;

    function addFeedbackSection() {
        feedbackRoom++;
        var objTo = document.getElementById('feedbackForm');
        var divTest = document.createElement("div");
        divTest.setAttribute("class", "removeclass" + feedbackRoom);

        divTest.innerHTML = `
            <div class="feedback">
                                    
                <div id="feedbackForm">
                    <div class="row">
                    <div class="col-lg-7">
                        <div class="row mb-2">
                            <div class="col-lg-11 spacing-right">
                                Client Name: <br> <input class="form-control" name="feed_client_name[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-11 spacing-right">
                                Client POC Name: <br> <input class="form-control" name="feed_client_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-11 spacing-right">
                                Email: <br> <input class="form-control " name="feed_client_email[]" type="date" placeholder="..." style="width: 100%;">
                                
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-5">
                        <div class="row mb-2">
                            <div class="col-lg-6 spacing-left spacing-right">
                                Client ID: <br> <input class="form-control" name="feed_client_id[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-right">
                                Site ID: <br> <input class="form-control" name="feed_client_site_id[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-lg-11 spacing-left spacing-right">
                                Designation: <br> <input class="form-control" name="feed_desig[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-11 spacing-left spacing-right">
                                Cell: <br> <input class="form-control " type="text" name="feed_cell[]" placeholder="..." style="width: 100%;">
                                
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-11">
                        <table class="table table-bordered">
                            <thead>
                                <div class="row mb-5">
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        <h5>Feedback for the month:</h5>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        <input class="form-control" type="text" name="feed_month[]" placeholder="..." style="width: 100%;">
                                    </div>
                                    

                                </div>


                                <tr width="100%">
                                    <th width="75%">
                                        <p><b>A: Please Rate the following (Encircle from 1
                                                to 5):-
                                                (1 = Entirely Satisfied , 2 = Satisfied, 3 =
                                                Neutral, 4 = Unsatisfied, 5 = Entirely
                                                Unsatisfied)</b>
                                        </p>
                                    </th>
                                    <th width="5%">Entirely Satisfied</th>
                                    <th width="5%"> Satisfied</th>
                                    <th width="5%">Neutral</th>
                                    <th width="5%">Unsatisfied</th>
                                    <th width="5%">Entirely Unsatisfied</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr width="100%">
                                    <td width="75%">1. Punctuality and Attendance of
                                        Guards</td>
                                    <td width="5%"><input type="radio" name="q1[]" value="1"></td>
                                    <td width="5%"><input type="radio" name="q1[]" value="2"></td>
                                    <td width="5%"><input type="radio" name="q1[]" value="3"></td>
                                    <td width="5%"><input type="radio" name="q1[]" value="4"></td>
                                    <td width="5%"><input type="radio" name="q1[]" value="5"></td>
                                </tr>
                                <tr width="100%">
                                    <td width="75%">2.Discipline, Behavior & Character
                                        of Guards</td>
                                    <td width="5%"><input type="radio" name="q2[]" value="1"></td>
                                    <td width="5%"><input type="radio" name="q2[]" value="2"></td>
                                    <td width="5%"><input type="radio" name="q2[]" value="3"></td>
                                    <td width="5%"><input type="radio" name="q2[]" value="4"></td>
                                    <td width="5%"><input type="radio" name="q2[]" value="5"></td>
                                </tr>
                                <tr width="100%">
                                    <td width="75%">3. Smart Turnout of the Guards
                                        (Uniform)</td>
                                    <td width="5%"><input type="radio" name="q3[]" value="1"></td>
                                    <td width="5%"><input type="radio" name="q3[]" value="2"></td>
                                    <td width="5%"><input type="radio" name="q3[]" value="3"></td>
                                    <td width="5%"><input type="radio" name="q3[]" value="4"></td>
                                    <td width="5%"><input type="radio" name="q3[]" value="5"></td>
                                </tr>
                                <tr width="100%">
                                    <td width="75%">4.Working Condition of Weapons &
                                        Security Equipments</td>
                                    <td width="5%"><input type="radio" name="q4[]" value="1"></td>
                                    <td width="5%"><input type="radio" name="q4[]" value="2"></td>
                                    <td width="5%"><input type="radio" name="q4[]" value="3"></td>
                                    <td width="5%"><input type="radio" name="q4[]" value="4"></td>
                                    <td width="5%"><input type="radio" name="q4[]" value="5"></td>
                                </tr>
                                <tr width="100%">
                                    <td width="75%">5. Our Abidance regarding Taxes
                                        (Income Tax & Sales Tax)</td>
                                    <td width="5%"><input type="radio" name="q5[]" value="1"></td>
                                    <td width="5%"><input type="radio" name="q5[]" value="2"></td>
                                    <td width="5%"><input type="radio" name="q5[]" value="3"></td>
                                    <td width="5%"><input type="radio" name="q5[]" value="4"></td>
                                    <td width="5%"><input type="radio" name="q5[]" value="5"></td>
                                </tr>
                                <tr width="100%">
                                    <td width="75%">6. Our Compliance wrt EOBI, Social
                                        Security & GLI of Guards</td>
                                    <td width="5%"><input type="radio" name="q6[]" value="1"></td>
                                    <td width="5%"><input type="radio" name="q6[]" value="2"></td>
                                    <td width="5%"><input type="radio" name="q6[]" value="3"></td>
                                    <td width="5%"><input type="radio" name="q6[]" value="4"></td>
                                    <td width="5%"><input type="radio" name="q6[]" value="5"></td>
                                </tr>
                                <tr width="100%">
                                    <td width="75%">7. Timely Provision of Invoices &
                                        Guards Payroll Management</td>
                                    <td width="5%"><input type="radio" name="q7[]" value="1"></td>
                                    <td width="5%"><input type="radio" name="q7[]" value="2"></td>
                                    <td width="5%"><input type="radio" name="q7[]" value="3"></td>
                                    <td width="5%"><input type="radio" name="q7[]" value="4"></td>
                                    <td width="5%"><input type="radio" name="q7[]" value="5"></td>
                                </tr>
                                <tr width="100%">
                                    <td width="75%">8. Level of Training of Guards</td>
                                    <td width="5%"><input type="radio" name="q8[]" value="1"></td>
                                    <td width="5%"><input type="radio" name="q8[]" value="2"></td>
                                    <td width="5%"><input type="radio" name="q8[]" value="3"></td>
                                    <td width="5%"><input type="radio" name="q8[]" value="4"></td>
                                    <td width="5%"><input type="radio" name="q8[]" value="5"></td>
                                </tr>
                                <tr width="100%">
                                    <td width="75%">9. Level of Supervisory Staff
                                        Visiting the Guards</td>
                                    <td width="5%"><input type="radio" name="q9[]" value="1"></td>
                                    <td width="5%"><input type="radio" name="q9[]" value="2"></td>
                                    <td width="5%"><input type="radio" name="q9[]" value="3"></td>
                                    <td width="5%"><input type="radio" name="q9[]" value="4"></td>
                                    <td width="5%"><input type="radio" name="q9[]" value="5"></td>
                                </tr>
                                <tr width="100%">
                                    <td width="75%">10. PIFFERS Mgmt Approach &
                                        Behavior towards Customer Service</td>
                                    <td width="5%"><input type="radio" name="q10[]" value="1"></td>
                                    <td width="5%"><input type="radio" name="q10[]" value="2"></td>
                                    <td width="5%"><input type="radio" name="q10[]" value="3"></td>
                                    <td width="5%"><input type="radio" name="q10[]" value="4"></td>
                                    <td width="5%"><input type="radio" name="q10[]" value="5"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <p><b></b>B: Would you please, like to refer us any other Company /
                        Organization?</b></p>
                    <div class="col-lg-7">
                        <div class="row mb-2">
                            <div class="col-lg-11 spacing-right">
                                Company Name: <br> <input class="form-control" name="feed_company_name[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-11 spacing-right">
                                POC Name: <br> <input class="form-control" name="feed_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-11 spacing-right">
                                Suggestions / Comments:<br> <input class="form-control" name="feed_comment[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-11 spacing-right">
                                Feedback Form Filled By:<br> <input class="form-control" name="feedback_form[]" type="text" placeholder="..." style="width: 100%;">
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="row mb-2">

                            <div class="col-lg-11 spacing-left spacing-right">
                                Email: <br> <input class="form-control " type="text" name="feed_email[]" placeholder="..." style="width: 100%;">
                                
                            </div>
                            <div class="col-lg-11 spacing-left spacing-right">
                                Telephone: <br> <input class="form-control" type="text" name="feed_telephone[]" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-11 spacing-left spacing-right">
                                Signature & Date: <br> <input class="form-control" name="feed_signature[]" type="text" placeholder="..." style="width: 100%;">
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <p>To Be Filled by PIFFERS SECURITY SERVICES (PVT) LTD</p>
                    <div class="col-lg-11 spacing-right">
                        Feedback Form Received By: <br> <input class="form-control" name="feed_received[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-11 spacing-right">
                        Remarks: <br> <input class="form-control" type="text" name="feed_remarks[]" placeholder="..." style="width: 100%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-11 spacing-right">
                        Attachments: <br> <input id="" class="form-control" name="feed_attach[]" type="file" placeholder="..." style="width: 100%;">
                    </div>

                </div>
                <div class="new_branch mt-2">
                    <button type="button" onclick="removeFeedbackSection(${feedbackRoom})">
                        Remove
                    </button>
                </div>
                </div>

            </div>
        `;

        objTo.appendChild(divTest);
    }

    function removeFeedbackSection(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>

<script>
    var complaintRoom = 1;

    function addComplaintSection() {
        complaintRoom++;
        var objTo = document.getElementById('complaintForm');
        var divTest = document.createElement("div");
        divTest.setAttribute("class", "removeclass" + complaintRoom);

        divTest.innerHTML = `
            <div class="col-lg-12">
                <div class="row mb-2">
                    
                    
                    <div class="col-lg-4 spacing-left spacing-right">
                        Complaint Number <br> <input class="form-control" name="complaint_no[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <h5 class="mt-3">Guards Duty</h5>
                    
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                        Guards Duty <br>
                        <div class="input-group" style="width: 100%;">
                            <select class="form-control mt-1" name="complaint_guards_duty" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                <option value="Legal Fee">Guards Behaviour</option>
                                <option value="Speed Money">Absenteeism </option>
                                <option value="Consultancy Fee">Guards Sleeping</option>
                            </select>
                            <div class="input-group-append" style="width: 30%;">
                                <a>
                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                        Notes <br>   <textarea id="w3review" class="form-control" name="complaint_gaurd_note[]" rows="2" cols="40">
                        </textarea>
                        </div>
                    <div class="col-lg-3 spacing-left spacing-right">
                        Attachments <br> <input class="form-control" name="complaint_guard_attach[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row mb-2">
                    <h5>Weapons, Uniform and Equipment</h5>
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                        Weapons, Uniform and Equipment <br>
                        <div class="input-group" style="width: 100%;">
                            <select class="form-control mt-1" name="wea_uni_equip[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                <option value="Legal Fee">Uniform</option>
                                <option value="Speed Money">Aemourer </option>
                                <option value="Consultancy Fee">Ammunition</option>
                                <option value="Legal Fee">Wireless Sets</option>
                                <option value="Speed Money">Torch </option>
                            </select>
                            <div class="input-group-append" style="width: 30%;">
                                <a>
                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                        Notes <br>   <textarea id="w3review" class="form-control" name="wue_note[]" rows="2" cols="40">
                        </textarea>
                        </div>
                    <div class="col-lg-3 spacing-left spacing-right">
                        Attachments <br> <input class="form-control" name="wue_attach[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row mb-2">
                    <h5>Finance Department</h5>
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                        Finance Department <br>
                        <div class="input-group" style="width: 100%;">
                            <select class="form-control mt-1" name="finance_dept[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                <option value="Legal Fee">Email</option>
                                <option value="Speed Money">SMS</option>
                                <option value="Consultancy Fee">CALL</option>
                                <option value="Legal Fee">UAN</option>
                                <option value="Speed Money">WHATSAPP </option>
                            </select>
                            <div class="input-group-append" style="width: 30%;">
                                <a>
                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                        Notes <br>   <textarea id="w3review" class="form-control" name="fd_note[]" rows="2" cols="40">
                        </textarea>
                        </div>
                    <div class="col-lg-3 spacing-left spacing-right">
                        Attachments <br> <input class="form-control" name="fd_attach[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row mb-2">
                    <h5>Source of Complaint</h5>
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                        Source of Complaint <br>
                        <div class="input-group" style="width: 100%;">
                            <select class="form-control mt-1" name="src_complaint[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                <option value="Legal Fee">Email</option>
                                <option value="Speed Money">SMS</option>
                                <option value="Consultancy Fee">CALL</option>
                                <option value="Legal Fee">UAN</option>
                                <option value="Speed Money">WHATSAPP </option>
                            </select>
                            <div class="input-group-append" style="width: 30%;">
                                <a>
                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                        Notes <br>   <textarea id="w3review" class="form-control" name="src_note[]" rows="2" cols="40">
                        </textarea>
                        </div>
                    <div class="col-lg-3 spacing-left spacing-right">
                        Attachments <br> <input class="form-control" name="src_attach[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row mb-2">
                    <h5>Management Issues</h5>
                    <div class="col-lg-3 mt-2 spacing-right">
                        <div class=" mb-2 d-flex align-items-center">
                            Feedback : <br>
                            <select class="form-control mt-1" name="mng_feed[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 spacing-left spacing-right">
                        Attachments <br> <input class="form-control" id="printing_date" name="mng_attach[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-left" style="margin-left: 12px">
                        Notes <br>   <textarea id="w3review" class="form-control" name="mng_note[]" rows="2" cols="40">
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row mb-2">
                    <h5>Complaint POC Details</h5>
                    <div class="col-lg-4 spacing-right">
                        Name <br> <input class="form-control" name="complaint_poc_name" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-right">
                        Designation <br> <input class="form-control" name="complaint_poc_desig[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-right">
                        Department <br> <input class="form-control" name="complaint_poc_dept[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-right">
                        Email<br> <input class="form-control" name="complaint_poc_email[]" type="text" placeholder="..." style="width: 100%;">
                       
                    </div>
                    <div class="col-lg-4 spacing-right">
                        Contact Number<br> <input class="form-control " name="complaint_poc_contact[]" type="text" placeholder="..." style="width: 100%;">
                        
                    </div>
                    <div class="col-lg-4 spacing-right">
                        Picture of Complaint <br> <input class="form-control" name="complaint_picture[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-right">
                        Details of Complaint <br> <input class="form-control" name="details_complaint[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-right">
                        Details Attachment<br> <input class="form-control" name="details_attach[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                        Complaint Tagged To : <br>
                        <div class="input-group" style="width: 100%;">
                            <select class="form-control mt-1" name="complaint_tagged[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                <option value="Legal Fee">talha sahni</option>
                            </select>
                            <div class="input-group-append" style="width: 30%;">
                                <a>
                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                        Complaint Addressed By  : <br>
                        <div class="input-group" style="width: 100%;">
                            <select class="form-control mt-1" name="complaint_arressed[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                <option value="Legal Fee">talha sahni</option>
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
            <div class="row mb-2">
                <div class="col-lg-6 spacing-left spacing-right mt-2">
                    Attachements <br> <input class="form-control" type="file" name="complaint_addressed_attach[]" placeholder="..." style="width: 70%;" multiple>
                </div>
                <div class="col-lg-6 spacing-left spacing-right mt-2">
                    Notes <br>
                    <textarea id="w3review" class="form-control" name="complaint_addressed_attach[]" rows="2" cols="38">
                    </textarea>
                </div>
            </div>
            <div class="new_branch mt-2">
                <button type="button" onclick="removeComplaintSection(${complaintRoom})">
                    Remove
                </button>
            </div>
            <hr>
        `;

        objTo.appendChild(divTest);
    }

    function removeComplaintSection(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>

<script>
    var notificationRoom = 1;

    function addNotificationSection() {
        notificationRoom++;
        var objTo = document.getElementById('notificationForm');
        var divTest = document.createElement("div");
        divTest.setAttribute("class", "removeclass" + notificationRoom);

        divTest.innerHTML = `
            <div class="col-lg-12 spacing-right" id="notificationForm">
                <div class="row mb-2">
                    <div class="col-lg-3 spacing-right">
                        Notification No. <br> <input class="form-control" type="text" name="notification_no[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-left spacing-right form-group">
                            Notification Related to : <br>
                            <div class="input-group" style="width: 100%;">
                                <select class="form-control mt-1" name="notification_related[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value="tax">tax</option>
                                </select>
                                <div class="input-group-append" style="width: 30%;">
                                    <a>
                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-4 spacing-left">
                        Attachment. <br> <input class="form-control" type="file" name="notification_attach[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3">
                        Notes. <br> <textarea class="form-control" type="text" name="notification_note[]" placeholder="..." style="width: 100%;"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                        Notification Shared With : <br>
                        <div class="input-group" style="width: 100%;">
                            <select class="form-control mt-1" name="notification_shared[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                <option value="talha sahni">talha sahni</option>
                            </select>
                            <div class="input-group-append" style="width: 30%;">
                                <a>
                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                        Attachements <br> <input class="form-control" type="file" name="notification_ex_attach[]" placeholder="..." style="width: 70%;" multiple>
                    </div>
                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                        Notes <br>
                        <textarea id="w3review" class="form-control" name="notification_ex_note[]" rows="2" cols="38">
                        </textarea>
                    </div>
                </div>
                
            </div>
            <div class="new_branch mt-2">
                <button type="button" onclick="removeNotificationSection(${notificationRoom})">
                    Remove
                </button>
            </div>
            <hr>
        `;

        objTo.appendChild(divTest);
    }

    function removeNotificationSection(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>


<script>
    var assignmentRoom = 1;

function addAssignmentSection() {
    assignmentRoom++;
    var objTo = document.getElementById('assignmentInfo');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "removeclass" + assignmentRoom);

    divtest.innerHTML = `
        <div class="row">
            <div class="col-lg-6">
                <div class="row mb-2">
                    <div class="col-lg-3 spacing-right">
                        Customer Name <br>
                        <input class="form-control" name="asig_customer_name[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-left spacing-right">
                        Task Assigning <br> <input class="form-control" name="task_assigning[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right">
                        Designation <br>
                        <input class="form-control" type="text" name="asig_desig[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right">
                        Office/Floor <br> <input class="form-control" name="asig_office[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-left spacing-right">
                        Building Name<br> <input class="form-control" type="text" name="asig_building[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right">
                        Road/Street <br> <input class="form-control" type="text" name="asig_road[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-right">
                        Area <br> <input class="form-control" type="text" name="asig_area[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right">
                        City <br> <input class="form-control" type="text" name="asig_city[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-right">
                        Country <br> <input class="form-control" type="text" name="asig_country[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right">
                        Security Incharge <br> <input class="form-control" name="asig_security[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-right">
                        Contact Details <br> <input class="form-control" name="asig_contact[]" type="text" placeholder="..." style="width: 100%;">
                    </div>

                    <h5>Site Incharge Details</h5>
                    <div class="col-lg-3 spacing-right">
                        Incharge Name <br>
                        <input class="form-control" type="text" name="incharge_name[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right">
                        Designation <br>
                        <input class="form-control" type="text" name="incharge_desig[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-left spacing-right">
                        Contact Details <br> <input class="form-control" name="incharge_contact[]" type="text" placeholder="..." style="width: 100%;">
                        
                    </div>
                    <div class="col-lg-8 spacing-right">
                        High Risk Areas <br>
                        <input class="form-control" type="text" name="incharge_help[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-8 spacing-right">
                        Description of Risk <br>
                        <input class="form-control" type="text" name="incharge_desc[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-8 spacing-right">
                        History of Risk <br> <input class="form-control" name="incharge_risk[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-8 spacing-right" style="margin-top: 40px">
                        Assigned Area Manager Of PIFFERS <br>
                        <input class="form-control" type="text" name="incharge_asig[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-8 spacing-right">
                        Signed By <br> <input class="form-control" name="incharge_signed_by[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-8 spacing-right">
                        Date <br> <input class="form-control" type="date" name="incharge_date[]" placeholder="..." style="width: 100%;">
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="row mb-2">
                <h5>Address</h5>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Office No <br> <input class="form-control" id="head_office_cell_no" name="incharge_offc[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Building <br> <input class="form-control" id="head_office_cell_no" name="incharge_build[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Block <br> <input class="form-control" id="head_office_cell_no" name="incharge_block[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Area <br> <input class="form-control" id="head_office_cell_no" name="incharge_area[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            City <br> <input class="form-control" id="head_office_cell_no" name="incharge_city[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Pin Location <br> <input class="form-control" id="head_office_cell_no" name="incharge_pin[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div>
                            <br> <input class="form-control" id="head_office_cell_no" name="longitude4[]" type="hidden" placeholder="..." style="width: 100%;">
                        </div>
                        <div>
                            <br> <input class="form-control" id="head_office_cell_no" name="latitude4[]" type="hidden" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right">
                        Country <br> <input class="form-control" name="incharge_country[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right">
                        Site ID <br> <input class="form-control" name="incharge_site[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right">
                        A-Guard <br> <input class="form-control" name="incharge_a_g[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right">
                        Un-A-Guard <br> <input class="form-control" name="incharge_a_ung[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right">
                        Total Guard <br> <input class="form-control" name="incharge_t_g[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-8 spacing-right" style="margin-top:80px">
                        Recent Security Related Incidents <br>
                        <input class="form-control" type="text" name="rec_inc_rel[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-8 spacing-right">
                        Frequency Of Occurence <br>
                        <input class="form-control" type="text" name="feq_occ[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-8 spacing-right">
                        Expectations from PIFFERS <br>
                        <input class="form-control" type="text" name="exp_piff[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-8 spacing-right">
                        Any Special Instructions <br> <input class="form-control" name="any_spec[]" type="text" placeholder="..." style="width: 100%;">
                    </div>

                    <div class="col-lg-8 spacing-right">
                        Petrolling Instruction <br>
                        <input class="form-control" type="text" name="petr_instruc[]" placeholder="..." style="width: 100%;">
                    </div>

                </div>
            </div>
            <h3></h3>
            <div class="row mb-2">
                <div class="col-lg-6 spacing-left spacing-right mt-2">
                    Attachments <br> <input class="form-control" type="file" name="asig_ex_attach[]" placeholder="..." style="width: 70%;" multiple>
                </div>
                <div class="col-lg-6 spacing-left spacing-right mt-2">
                    Notes <br>
                    <textarea id="w3review" class="form-control" name="asig_ex_notes[]" rows="2" cols="38">
                    </textarea>
                </div>
            </div>
            <div class="new_branch mt-2">
                <button type="button" onclick="removeAssignmentSection(${assignmentRoom})">Remove</button>
            </div>
        </div>
    `;

    objTo.appendChild(divtest);
}

function removeAssignmentSection(rid) {
    var element = document.querySelector('.removeclass' + rid);
    element.parentNode.removeChild(element);
}
</script>

<script>
    var cleaningRoom = 1;

function addCleaningSection() {
    cleaningRoom++;
    var objTo = document.getElementById('cleaningInfo');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "removeclass" + cleaningRoom);

    divtest.innerHTML = `
         <div>
            <div class="row col-lg-12">
                <div class="col-lg-4 spacing-right">
                    Branch Name <br> <input class="form-control" type="text" name="arm_branch_name[]" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Branch ID <br> <input class="form-control" type="text" name="arm_branch_id[]" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Site ID <br> <input class="form-control" type="text" name="arm_site_id[]" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Client Name <br> <input class="form-control" type="text" name="arm_client_name[]" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Weapon Number <br> <input class="form-control" type="text" name="arm_weapon_no[]" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Weapon Bore <br> <input class="form-control" type="text" name="arm_weapon_bore[]" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Weapon Type <br> <input class="form-control" type="text" name="arm_weapon_type[]" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Working Details <br> <input class="form-control" type="text" name="arm_work_detail[]" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Sign of Customer <br> <input class="form-control" type="text" name="arm_sign_cus[]" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row mb-2">
                    <div class="col-lg-4 spacing-right" style="margin-bottom: 10px;">
                        New Authority Letter Issue : <br> <input class="form-control" id="head_office_name" name="arm_auth[]" type="checkbox" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                    New Authority Letter No <br> <input class="form-control" id="head_office_email" id="inpFile42" name="arm_auth_no[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                    New Authority Letter Validity <br> <input class="form-control" id="head_office_email" name="arm_auth_date[]" type="date" placeholder="..." style="width: 100%;">

                    </div>
                    <div class="col-lg-4 spacing-right" style="margin-bottom: 10px;">
                        Date of issue <br> <input class="form-control" id="head_office_name" name="arm_auth_issue[]" type="date" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                        Number of weapon cleaned <br> <input class="form-control" id="head_office_email" id="inpFile42" name="arm_weapon_cleaned[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                        Type of weapon cleaned <br> <input class="form-control" id="head_office_email" name="type_weapon_cleaned[]" type="input" placeholder="..." style="width: 100%;">

                    </div>
                    <div class="col-lg-4 spacing-right">
                        Picture before cleaning <br> <input class="form-control" id="head_office_name" name="arm_pic_b[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-right">
                        Picture after cleaning <br> <input class="form-control" id="head_office_name" name="arm_pic_a[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-right">
                        Cost of the day <br> <input class="form-control" id="head_office_name" name="arm_cost_day[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-right">
                        Cost Bill <br> <input class="form-control" id="head_office_name" name="arm_cost_bill[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-right">
                        Next cleaning activity due on : <br> <input class="form-control" id="head_office_name" name="arm_next_clean[]" type="date" placeholder="..." style="width: 100%;">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-4 spacing-right mt-2">
                        Notes <br>
                        <textarea id="w3review" class="form-control" name="arm_auth_notes[]" rows="2" cols="38">
                        </textarea>
                    </div>
                    <div class="col-lg-4 spacing-left spacing-right mt-2">
                        Attachments <br> <input class="form-control" name="arm_auth_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                    </div>
                
                </div>

            </div>
            <div class="new_branch mt-2">
                 <button type="button" class="removeCleaning" onclick="removeCleaningSection(${cleaningRoom})">Remove</button>
            </div>
        </div>
    `;

    objTo.appendChild(divtest);
}

function removeCleaningSection(room) {
    document.querySelector('.removeclass' + room).remove();
}

</script>

<script>
    var auditsRoom = 1;

function audits_add_more() {
    auditsRoom++;
    var objTo = document.getElementById('auditsInfo');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "audits-section removeclass" + auditsRoom);

    divtest.innerHTML = `
        <div class="col-lg-12">
            <div class="row mb-2">
                <div class="col-lg-3 spacing-right">
                    File Audited By: <br>
                    <input class="form-control" name="audit_file[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-left spacing-right">
                    Signature: <br>
                    <input class="form-control" name="audit_sign[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Date: <br>
                    <input class="form-control" name="audit_date[]" type="date" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Attachments: <br>
                    <input class="form-control" name="audit_attach[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <h5 class="mt-3">Checked By :</h5>
                <div class="row mb-2">
                   
                </div>
                <div class="row mb-2">
                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                        Attachements <br> <input class="form-control" name="audit_ex_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                    </div>
                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                        Notes <br>
                        <textarea id="w3review" class="form-control" name="audit_note[]" rows="2" cols="38">
                        </textarea>
                    </div>
                </div>
                <button type="button" class="remove-audit-btn" onclick="removeAuditSection(${auditsRoom})">Remove</button>
            </div>
        </div>
    `;

    objTo.appendChild(divtest);
}

function removeAuditSection(room) {
    document.querySelector('.audits-section.removeclass' + room).remove();
}

</script>

<script>
    var businessRoom = 1;

function business_add_more() {
    businessRoom++;
    var objTo = document.getElementById('businessInfo');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "business-section removeclass" + businessRoom);

    divtest.innerHTML = `
        <div class="col-lg-12">
            <div class="row mb-2">
                <h5>POC :</h5>
                <div class="col-lg-12">
                    <div class="row mb-2">

                        <div class="col-lg-6 spacing-right">
                            Name of Business <br> <input class="form-control" name="bussiness_name[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Nature of Business <br> <input class="form-control" name="bussiness_nature[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left">
                            <h5>Address</h5>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Office No <br> <input class="form-control" name="bussiness_office_no[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                    Floor <br> <input class="form-control" name="bussiness_floor[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5">
                                    Building <br> <input class="form-control" name="bussiness_building[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Block <br> <input class="form-control" name="bussiness_block[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left">
                                    Area <br> <input class="form-control" name="bussiness_area[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    City <br> <input class="form-control" name="bussiness_city[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left">
                                    Photograph of Building <br> <input class="form-control" name="bussiness_photo[]" type="file" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Email <br> <input class="form-control vldemail" name="bussiness_email[]" type="text" placeholder="..." style="width: 100%;">
                                    <div id="emailError" class="emailError" style="color: red"></div>
                                </div>
                                <div class="col-lg-5 spacing-left">
                                    Website <br> <input class="form-control " name="bussiness_web[]" type="text" placeholder="..." style="width: 100%;">
                                    
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Pin location <br> <input class="form-control" name="bussiness_pin[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div>
                                    <br> <input class="form-control" name="longitude5[]" type="hidden" placeholder="..." style="width: 100%;">
                                </div>
                                <div>
                                    <br> <input class="form-control" name="latitude5[]" type="hidden" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                        </div>
                        

                        
                    </div>

                </div>
                <div class="row mb-2">
                <div class="col-lg-4 spacing-left spacing-right mt-2">
                    Notes <br>
                    <textarea id="w3review" class="form-control" name="bussiness_notes[]" rows="2" cols="38">
                    </textarea>
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-2">
                    Attachements <br> <input class="form-control" type="file" name="bussiness_attach[]" placeholder="..." style="width: 70%;" multiple>
                </div>
                    
                </div>
                <button type="button" class="remove-business-btn" onclick="removeBusinessSection(${businessRoom})">Remove</button>
            </div>
        </div>
    `;

    objTo.appendChild(divtest);
}

function removeBusinessSection(room) {
    document.querySelector('.business-section.removeclass' + room).remove();
}

</script>

<script>
    var promotionalActivityRoom = 1;

    function addPromotionalActivitySection() {
        promotionalActivityRoom++;
        var objTo = document.getElementById('give_a_ways');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "removeclass" + promotionalActivityRoom);

        divtest.innerHTML = `
            <div class="row">
                <div class="col-lg-6 spacing-right form-group">
                    Customer Details Entered in all Promotional Activities <br>
                    <div class="input-group" style="width: 100%;">
                        <select id="category" class="form-control mt-1" name="promotional_act[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                            <option value="Calenders">Calenders</option>
                            <option value="Iftar">Iftar</option>
                            <option value="Greetings Card">Greetings Card</option>
                            <option value="Give aways">Give aways</option>
                            <option value="Thought">Thought</option>
                            <option value="Corporate">Corporate</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 mt-1">
                    <div class="spacing-left">
                        Quantity <br> <input class="form-control" type="text" name="promotional_quantity[]" placeholder="..." style="width: 100%;">
                    </div>
                </div>
                    <div class="form-type col-lg-6 spacing-right">
                    Estimated price<br> <input class="form-control" id="shift_start_date" name="prom_price[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="form-type col-lg-6 spacing-right">
                    Date <br> <input class="form-control" id="shift_end_date" name="prom_date[]" type="date" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6">
                
                    Notes <br> <textarea id="w3review" class="form-control" name="promotional_notes[]" rows="2" cols="38">
                        </textarea>
                
                </div>
                <div class="col-lg-6">
                
                    Attachments <br> <input class="form-control" type="file" name="promotional_attach[]" placeholder="..." style="width: 100%;">
                
                </div>
                <div class="col-lg-2 spacing-left my-5">
                    <button type="button" onclick="removePromotionalActivitySection(${promotionalActivityRoom})">Remove</button>
                </div>
            </div>
            <hr>
        `;

        objTo.appendChild(divtest);
    }

    function removePromotionalActivitySection(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>



<script>
    $('#edit-customer-icon').click(function() {
  //  openModal();
    });
</script>

<script>
    function openModal() {
    $('#add_user').modal('show');
    }

    // Click event for the "New Customer" button
    $('[data-target="#add_user"]').click(function() {
    openModal();
    });

</script>






<script>
    function closeModal() {
        $('#add_user').modal('hide');
    }
</script>


<script>
    // Wait for the DOM to load
    document.addEventListener('DOMContentLoaded', function() {
        // Select the search input element
        var searchInput = document.getElementById('search-input');

        // Select the table rows
        var rows = document.querySelectorAll('#my-table tbody tr');

        // Convert the rows to an array for easier manipulation
        var rowsArray = Array.from(rows);

        // Add an event listener for input changes
        searchInput.addEventListener('input', function() {
        var searchText = this.value.toLowerCase(); // Get the search text in lowercase

        // Filter the rows based on the search text
        var filteredRows = rowsArray.filter(function(row) {
            var nameColumn = row.querySelector('.col-lg-3'); // Select the column with the name

            // Get the name from the column
            var name = nameColumn.textContent.toLowerCase();

            // Check if the name matches the search text
            return name.includes(searchText);
        });

        // Move the matching rows to the top
        filteredRows.forEach(function(row) {
            row.parentNode.prepend(row);
        });
        });
    });
</script>



<script>
    const addFeedbackButton = document.getElementById("add_feedback_btn");
    const removeFeedbackButton = document.getElementById("remove_feedback_btn");
    const feedbackForm = document.getElementById("feedbackForm");

    addFeedbackButton.addEventListener("click", () => {
        feedbackForm.style.display = "block"; // Show the feedback form
    });

    removeFeedbackButton.addEventListener("click", () => {
        feedbackForm.style.display = "none"; // Hide the feedback form
    });
</script>

<script>
    const addComplaintButton = document.getElementById("add_complaint_btn");
    const removeComplaintButton = document.getElementById("remove_complaint_btn");
    const removeComplaintSectionButton = document.getElementById("remove_complaint_section_btn");
    const complaintForm = document.getElementById("complaintForm");

    addComplaintButton.addEventListener("click", () => {
        complaintForm.style.display = "block"; // Show the form
        removeComplaintButton.style.display = "block"; // Show the remove button
    });

    removeComplaintButton.addEventListener("click", () => {
        complaintForm.style.display = "none"; // Hide the form
        removeComplaintButton.style.display = "none"; // Hide the remove button
    });

    removeComplaintSectionButton.addEventListener("click", () => {
        complaintForm.style.display = "none"; // Hide the form
        removeComplaintButton.style.display = "none"; // Hide the remove button
    });
</script>

<script>
    const addNotificationButton = document.getElementById("add_notification_btn");
    const removeNotificationButton = document.getElementById("remove_notification_btn");
    const notificationForm = document.getElementById("notificationForm");

    addNotificationButton.addEventListener("click", () => {
        notificationForm.style.display = "block"; // Show the notification form
    });

    removeNotificationButton.addEventListener("click", () => {
        notificationForm.style.display = "none"; // Hide the notification form
    });
</script>

<script>
    const addInspectionButton = document.getElementById("add_inspection_btn");
    const removeInspectionButton = document.getElementById("remove_inspection_btn");
    const inspectionDiv = document.getElementById("inspectionDiv");

    addInspectionButton.addEventListener("click", () => {
        inspectionDiv.style.display = "block"; // Show the inspection form
    });

    removeInspectionButton.addEventListener("click", () => {
        inspectionDiv.style.display = "none"; // Hide the inspection form
    });
</script>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var index = 0;

        $('#addMoreCheckbox').on('click', function() {
            index++;
            var inputHtml = '<input type="text" class="form-control currencyName" placeholder="New Currency ' + index + '">';
            var checkboxHtml = '<div class="form-check form-check-inline"><input class="form-check-input" name="compliances[]" type="checkbox" id="inlineCheckbox' + (index + 5) + '">' + inputHtml + '</div>';
            $('#new-checkboxes').append(checkboxHtml);

            // Update the newly added input field to create a corresponding label for the checkbox
            $('.currencyName').last().on('blur', function() {
                var checkboxId = $(this).siblings('input[type="checkbox"]').attr('id');
                var labelHtml = '<label class="form-check-label" for="' + checkboxId + '">' + $(this).val() + '</label>';
                $(this).siblings('input[type="checkbox"]').after(labelHtml);
                $(this).hide(); // Hide the input field after the label is created
            });
        });
    });
</script>


<script>
    $(document).ready(function() {
        var index = 0;

        $('#addMoreCheckbox1').on('click', function() {
            index++;
            var inputHtml = '<input type="text" class="form-control currencyName" placeholder="New ' + index + '">';
            var checkboxHtml = '<div class="form-check form-check-inline"><input class="form-check-input" name="compliances[]" type="checkbox" id="inlineCheckbox' + (index + 5) + '">' + inputHtml + '</div>';
            $('#new-checkboxes1').append(checkboxHtml);

            // Update the newly added input field to create a corresponding label for the checkbox
            $('.currencyName').last().on('blur', function() {
                var checkboxId = $(this).siblings('input[type="checkbox"]').attr('id');
                var labelHtml = '<label class="form-check-label" for="' + checkboxId + '">' + $(this).val() + '</label>';
                $(this).siblings('input[type="checkbox"]').after(labelHtml);
                $(this).hide(); // Hide the input field after the label is created
            });
        });
    });
</script>

<script>
    let input = document.querySelector(".input");
    let button = document.querySelector(".form-controld");
    button.disabled = true;
    input.addEventListener("change", stateHandle);

    function stateHandle() {
        if (document.querySelector(".input").value === "") {
            button.disabled = true;
        } else {
            button.disabled = false;
        }
    }
</script>


<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
    }
</script>





<!-- <script>
    const inpFile = document.getElementById("inpFile");
    const previewContainer = document.getElementById("imagePreview");
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

    inpFile.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText.style.display = "none";
            previewImage.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText.style.display = "null";
            previewImage.style.display = "null";
            previewImage.setAttribute("src", "");
        }


    });
</script> -->

<!-- <script>
    const inpFile1 = document.getElementById("inpFile1");
    const previewContainer1 = document.getElementById("imagePreview1");
    const previewImage1 = previewContainer1.querySelector(".image-preview__image1");
    const previewDefaultText1 = previewContainer1.querySelector(".image-preview__default-text1");

    inpFile1.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText1.style.display = "none";
            previewImage1.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage1.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText1.style.display = "null";
            previewImage1.style.display = "null";
            previewImage1.setAttribute("src", "");
        }


    });
</script> -->

<!--Image Preview Education-->
<!-- <script>
    const inpFile3 = document.getElementById("inpFile3");
    const previewContainer3 = document.getElementById("imagePreview3");
    const previewImage3 = previewContainer3.querySelector(".image-preview__image3");
    const previewDefaultText3 = previewContainer3.querySelector(".image-preview__default-text3");

    inpFile3.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText3.style.display = "none";
            previewImage3.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage3.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText3.style.display = "null";
            previewImage3.style.display = "null";
            previewImage3.setAttribute("src", "");
        }


    });
</script> -->

<!--Image Preview Compliance-->
<!-- <script>
    const inpFile4 = document.getElementById("inpFile4");
    const previewContainer4 = document.getElementById("imagePreview4");
    const previewImage4 = previewContainer4.querySelector(".image-preview__image4");
    const previewDefaultText4 = previewContainer4.querySelector(".image-preview__default-text4");

    inpFile4.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText4.style.display = "none";
            previewImage4.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage4.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText4.style.display = "null";
            previewImage4.style.display = "null";
            previewImage4.setAttribute("src", "");
        }


    });
</script> -->

<!--Image Preview Biometric-->
<!-- <script>
    const inpFile6 = document.getElementById("inpFile6");
    const previewContainer6 = document.getElementById("imagePreview6");
    const previewImage6 = previewContainer6.querySelector(".image-preview__image6");
    const previewDefaultText6 = previewContainer6.querySelector(".image-preview__default-text6");

    inpFile6.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText6.style.display = "none";
            previewImage6.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage6.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText6.style.display = "null";
            previewImage6.style.display = "null";
            previewImage6.setAttribute("src", "");
        }


    });
</script> -->

<!-- <script>
    const inpFile7 = document.getElementById("inpFile7");
    const previewContainer7 = document.getElementById("imagePreview7");
    const previewImage7 = previewContainer7.querySelector(".image-preview__image7");
    const previewDefaultText7 = previewContainer7.querySelector(".image-preview__default-text7");

    inpFile7.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText7.style.display = "none";
            previewImage7.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage7.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText7.style.display = "null";
            previewImage7.style.display = "null";
            previewImage7.setAttribute("src", "");
        }


    });
</script> -->

<!-- <script>
    const inpFile8 = document.getElementById("inpFile8");
    const previewContainer8 = document.getElementById("imagePreview8");
    const previewImage8 = previewContainer8.querySelector(".image-preview__image8");
    const previewDefaultText8 = previewContainer8.querySelector(".image-preview__default-text8");

    inpFile8.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText8.style.display = "none";
            previewImage8.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage8.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText8.style.display = "null";
            previewImage8.style.display = "null";
            previewImage8.setAttribute("src", "");
        }


    });
</script> -->

<!-- <script>
    const inpFile9 = document.getElementById("inpFile9");
    const previewContainer9 = document.getElementById("imagePreview9");
    const previewImage9 = previewContainer9.querySelector(".image-preview__image9");
    const previewDefaultText9 = previewContainer9.querySelector(".image-preview__default-text9");

    inpFile9.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText9.style.display = "none";
            previewImage9.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage9.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText9.style.display = "null";
            previewImage9.style.display = "null";
            previewImage9.setAttribute("src", "");
        }


    });
</script> -->

<!-- <script>
    const inpFile10 = document.getElementById("inpFile10");
    const previewContainer10 = document.getElementById("imagePreview10");
    const previewImage10 = previewContainer10.querySelector(".image-preview__image10");
    const previewDefaultText10 = previewContainer10.querySelector(".image-preview__default-text10");

    inpFile10.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText10.style.display = "none";
            previewImage10.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage10.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText10.style.display = "null";
            previewImage10.style.display = "null";
            previewImage10.setAttribute("src", "");
        }


    });
</script> -->

<!-- <script>
    const inpFile11 = document.getElementById("inpFile11");
    const previewContainer11 = document.getElementById("imagePreview11");
    const previewImage11 = previewContainer11.querySelector(".image-preview__image11");
    const previewDefaultText11 = previewContainer11.querySelector(".image-preview__default-text11");

    inpFile11.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText11.style.display = "none";
            previewImage11.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage11.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText11.style.display = "null";
            previewImage11.style.display = "null";
            previewImage11.setAttribute("src", "");
        }


    });
</script> -->
<!--
<script>
    const inpFile12 = document.getElementById("inpFile12");
    const previewContainer12 = document.getElementById("imagePreview12");
    const previewImage12 = previewContainer12.querySelector(".image-preview__image12");
    const previewDefaultText12 = previewContainer12.querySelector(".image-preview__default-text12");

    inpFile12.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText12.style.display = "none";
            previewImage12.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage12.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText12.style.display = "null";
            previewImage12.style.display = "null";
            previewImage12.setAttribute("src", "");
        }


    });
</script> -->

<!-- <script>
    const inpFile15 = document.getElementById("inpFile15");
    const previewContainer15 = document.getElementById("imagePreview15");
    const previewImage15 = previewContainer15.querySelector(".image-preview__image15");
    const previewDefaultText15 = previewContainer15.querySelector(".image-preview__default-text15");

    inpFile15.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText15.style.display = "none";
            previewImage15.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage15.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText15.style.display = "null";
            previewImage15.style.display = "null";
            previewImage15.setAttribute("src", "");
        }


    });
</script> -->

<!-- <script>
    const inpFile20 = document.getElementById("inpFile20");
    const previewContainer20 = document.getElementById("imagePreview20");
    const previewImage20 = previewContainer20.querySelector(".image-preview__image20");
    const previewDefaultText20 = previewContainer20.querySelector(".image-preview__default-text20");

    inpFile20.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText20.style.display = "none";
            previewImage20.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage20.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText20.style.display = "null";
            previewImage20.style.display = "null";
            previewImage20.setAttribute("src", "");
        }


    });
</script> -->

<!-- <script>
    const inpFile21 = document.getElementById("inpFile21");
    const previewContainer21 = document.getElementById("imagePreview21");
    const previewImage21 = previewContainer21.querySelector(".image-preview__image21");
    const previewDefaultText21 = previewContainer21.querySelector(".image-preview__default-text21");

    inpFile21.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText21.style.display = "none";
            previewImage21.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage21.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText21.style.display = "null";
            previewImage21.style.display = "null";
            previewImage21.setAttribute("src", "");
        }
    });
</script> -->

<!-- <script>
    const inpFile22 = document.getElementById("inpFile22");
    const previewContainer22 = document.getElementById("imagePreview22");
    const previewImage22 = previewContainer22.querySelector(".image-preview__image22");
    const previewDefaultText22 = previewContainer22.querySelector(".image-preview__default-text22");

    inpFile22.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText22.style.display = "none";
            previewImage22.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage22.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText22.style.display = "null";
            previewImage22.style.display = "null";
            previewImage22.setAttribute("src", "");
        }
    });
</script> -->

<!-- <script>
    const inpFile30 = document.getElementById("inpFile30");
    const previewContainer30 = document.getElementById("imagePreview30");
    const previewImage30 = previewContainer30.querySelector(".image-preview__image30");
    const previewDefaultText30 = previewContainer30.querySelector(".image-preview__default-text30");

    inpFile30.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText30.style.display = "none";
            previewImage30.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage30.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText30.style.display = "null";
            previewImage30.style.display = "null";
            previewImage30.setAttribute("src", "");
        }
    });
</script> -->



<!-- <script>
    const inpFile41 = document.getElementById("inpFile41");
    const previewContainer41 = document.getElementById("imagePreview41");
    const previewImage41 = previewContainer41.querySelector(".image-preview__image41");
    const previewDefaultText41 = previewContainer41.querySelector(".image-preview__default-text41");

    inpFile41.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText41.style.display = "none";
            previewImage41.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage41.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText41.style.display = "null";
            previewImage41.style.display = "null";
            previewImage41.setAttribute("src", "");
        }

    });
</script> -->

<!-- <script>
    const inpFile42 = document.getElementById("inpFile42");
    const previewContainer42 = document.getElementById("imagePreview42");
    const previewImage42 = previewContainer42.querySelector(".image-preview__image42");
    const previewDefaultText42 = previewContainer42.querySelector(".image-preview__default-text42");

    inpFile42.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText42.style.display = "none";
            previewImage42.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage42.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText42.style.display = "null";
            previewImage42.style.display = "null";
            previewImage42.setAttribute("src", "");
        }

    });
</script> -->

<!-- <script>
    const inpFile43 = document.getElementById("inpFile43");
    const previewContainer43 = document.getElementById("imagePreview43");
    const previewImage43 = previewContainer43.querySelector(".image-preview__image43");
    const previewDefaultText43 = previewContainer43.querySelector(".image-preview__default-text43");

    inpFile43.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText43.style.display = "none";
            previewImage43.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage43.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText43.style.display = "null";
            previewImage43.style.display = "null";
            previewImage43.setAttribute("src", "");
        }

    });
</script> -->
<!--
<script>
    const inpFile44 = document.getElementById("inpFile44");
    const previewContainer44 = document.getElementById("imagePreview44");
    const previewImage44 = previewContainer44.querySelector(".image-preview__image44");
    const previewDefaultText44 = previewContainer44.querySelector(".image-preview__default-text44");

    inpFile44.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            previewDefaultText44.style.display = "none";
            previewImage44.style.display = "block";

            reader.addEventListener("load", function() {
                previewImage44.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);
        } else {
            previewDefaultText44.style.display = "null";
            previewImage44.style.display = "null";
            previewImage44.setAttribute("src", "");
        }

    });
</script> -->

<script>
    $(document).ready(function () {
        // Hide the second section initially.
        $("#sectionToHide").hide();

        // Listen for the click event on the "N/A" checkbox.
        $("#compliances-na").on("click", function () {
            // Toggle the visibility of the second section based on the checkbox's checked status.
            if (!this.checked) {
                $("#sectionToHide").show();
            } else {
                $("#sectionToHide").hide();
            }
        });

        // Check the initial state of the checkbox and show/hide the section accordingly.
        if ($("#compliances-na").is(":checked")) {
            $("#sectionToHide").hide();
        } else {
            $("#sectionToHide").show();
        }
    });
</script>

<script>
    function trimSpaces() {
        var textarea = document.getElementById('w3review');
        textarea.value = textarea.value.trim();
    }

    function moveCursorToStart() {
        var textarea = document.getElementById('w3review');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces1() {
        var textarea = document.getElementById('w3review1');
        textarea.value = textarea.value.trim();
    }

    function moveCursorToStart1() {
        var textarea = document.getElementById('w3review1');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces2() {
        var textarea = document.getElementById('w3review2');
        textarea.value = textarea.value.trim();
    }

    function moveCursorToStart2() {
        var textarea = document.getElementById('w3review2');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces3() {
        var textarea = document.getElementById('w3review3');
        textarea.value = textarea.value.trim();
    }

    function moveCursorToStart3() {
        var textarea = document.getElementById('w3review3');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces4() {
        var textarea = document.getElementById('w3review4');
        textarea.value = textarea.value.trim();
    }

     function moveCursorToStart4() {
        var textarea = document.getElementById('w3review4');
        textarea.setSelectionRange(0, 0);
    }
</script>
<script>
    function trimSpaces23() {
        var textarea = document.getElementById('w3review23');
        textarea.value = textarea.value.trim();
    }

     function moveCursorToStart23() {
        var textarea = document.getElementById('w3review23');
        textarea.setSelectionRange(0, 0);
    }
</script>
<script>
    function trimSpaces22() {
        var textarea = document.getElementById('w3review22');
        textarea.value = textarea.value.trim();
    }

     function moveCursorToStart22() {
        var textarea = document.getElementById('w3review22');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces5() {
        var textarea = document.getElementById('w3review5');
        textarea.value = textarea.value.trim();
    }

      function moveCursorToStart5() {
        var textarea = document.getElementById('w3review5');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces6() {
        var textarea = document.getElementById('w3review6');
        textarea.value = textarea.value.trim();
    }

     function moveCursorToStart6() {
        var textarea = document.getElementById('w3review6');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces7() {
        var textarea = document.getElementById('w3review7');
        textarea.value = textarea.value.trim();
    }

    function moveCursorToStart7() {
        var textarea = document.getElementById('w3review7');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces8() {
        var textarea = document.getElementById('w3review8');
        textarea.value = textarea.value.trim();
    }


    function moveCursorToStart8() {
        var textarea = document.getElementById('w3review8');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces9() {
        var textarea = document.getElementById('w3review9');
        textarea.value = textarea.value.trim();
    }

     function moveCursorToStart9() {
        var textarea = document.getElementById('w3review9');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces10() {
        var textarea = document.getElementById('w3review10');
        textarea.value = textarea.value.trim();
    }

     function moveCursorToStart10() {
        var textarea = document.getElementById('w3review10');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces11() {
        var textarea = document.getElementById('w3review11');
        textarea.value = textarea.value.trim();
    }

     function moveCursorToStart11() {
        var textarea = document.getElementById('w3review11');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces12() {
        var textarea = document.getElementById('w3review12');
        textarea.value = textarea.value.trim();
    }

    function moveCursorToStart12() {
        var textarea = document.getElementById('w3review12');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces13() {
        var textarea = document.getElementById('w3review13');
        textarea.value = textarea.value.trim();
    }

    function moveCursorToStart13() {
        var textarea = document.getElementById('w3review13');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces14() {
        var textarea = document.getElementById('w3review14');
        textarea.value = textarea.value.trim();
    }

     function moveCursorToStart14() {
        var textarea = document.getElementById('w3review14');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces15() {
        var textarea = document.getElementById('w3review15');
        textarea.value = textarea.value.trim();
    }

    function moveCursorToStart15() {
        var textarea = document.getElementById('w3review15');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces16() {
        var textarea = document.getElementById('w3review16');
        textarea.value = textarea.value.trim();
    }

     function moveCursorToStart16() {
        var textarea = document.getElementById('w3review16');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces17() {
        var textarea = document.getElementById('w3review17');
        textarea.value = textarea.value.trim();
    }

     function moveCursorToStart17() {
        var textarea = document.getElementById('w3review17');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces18() {
        var textarea = document.getElementById('w3review18');
        textarea.value = textarea.value.trim();
    }

     function moveCursorToStart18() {
        var textarea = document.getElementById('w3review18');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces19() {
        var textarea = document.getElementById('w3review19');
        textarea.value = textarea.value.trim();
    }

     function moveCursorToStart19() {
        var textarea = document.getElementById('w3review19');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces20() {
        var textarea = document.getElementById('w3review20');
        textarea.value = textarea.value.trim();
    }

     function moveCursorToStart20() {
        var textarea = document.getElementById('w3review20');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function trimSpaces21() {
        var textarea = document.getElementById('w3review21');
        textarea.value = textarea.value.trim();
    }

     function moveCursorToStart21() {
        var textarea = document.getElementById('w3review21');
        textarea.setSelectionRange(0, 0);
    }
</script>

<script>
    function updateClientName(value) {
        document.getElementById('client_name').value = value;
    }
</script>

<script>
    function updateClientID(value) {
        document.getElementById('client_id').value = value;
    }
</script>

<script>
    $(document).ready(function() {
      // Function to update the result field
      function updateResultField() {
        var field1Value = $('#c_id').val();
        var field2Value = $('#customers_name').val();
        var field3Value = $('#city_of_deployment').val();
        var field4Value = $('#customers_suffix').val();
  
        // Your logic to combine the values (in this example, concatenation)
        var resultValue = field1Value + '-' +' '+ field2Value+' '+field4Value+' '+'('+field3Value+')';
  
        // Update the result field
        $('#d_name').val(resultValue);
      }
  
      // Trigger the function when the values in the first two fields change
      $('#c_id, #customers_name,#customers_suffix,#city_of_deployment').on('input', function() {
        updateResultField();
      });
    });
  </script>



<script>
    function validateEmail() {
        var emailInputs = document.getElementsByClassName('vldemail');
        var emailErrors = document.getElementsByClassName('emailError');

        // Regular expression for a basic email format validation
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Iterate through email inputs
        for (var i = 0; i < emailInputs.length; i++) {
            var emailInput = emailInputs[i];
            var emailError = emailErrors[i];

            // Check if the email is empty
            if (emailInput.value.trim() === '') {
                emailError.innerText = ''; // No error if the input is empty
            } else if (!emailRegex.test(emailInput.value)) {
                if (!/@/.test(emailInput.value)) {
                    emailError.innerText = 'Please enter the "@" sign';
                } else if (!/.com$/.test(emailInput.value)) {
                    emailError.innerText = 'Please enter ".com" at the end';
                } else {
                    emailError.innerText = 'Invalid email format';
                }
            } else {
                emailError.innerText = '';
            }
        }
    }

    // Attach the event listener to each email input
    var emailInputs = document.getElementsByClassName('vldemail');
    for (var i = 0; i < emailInputs.length; i++) {
        emailInputs[i].addEventListener('input', validateEmail);
    }
</script>


<script>
    function validatePhoneNumber() {
        var phoneInputs = document.getElementsByClassName('vldphone');
        var phoneErrors = document.getElementsByClassName('phoneError');

        // Regular expression for a Pakistani phone number format
        var phoneRegex = /^(0[3-9][0-9]{2}[- ]?[0-9]{7})$/;

        // Iterate through phone inputs
        for (var i = 0; i < phoneInputs.length; i++) {
            var phoneInput = phoneInputs[i];
            var phoneError = phoneErrors[i];

            // Check if the phone number is empty
            if (phoneInput.value.trim() === '') {
                phoneError.innerText = ''; // No error if the input is empty
            } else if (!/^[0-9- ]+$/.test(phoneInput.value)) {
                phoneError.innerText = 'Only numbers and a single dash (-) are allowed';
            } else if (!phoneRegex.test(phoneInput.value)) {
                phoneError.innerText = 'Invalid phone number format. e.g: 03XX-XXXXXXX';
            } else if (phoneInput.value.length !== 12 && phoneInput.value.indexOf('-') !== -1) {
                phoneError.innerText = 'Phone number must be 12 characters long';
            } else if (!/-/.test(phoneInput.value.substring(4, 5))) {
                phoneError.innerText = 'Dash (-) is missing after the first 4 digits';
            } else {
                phoneError.innerText = '';
            }
        }
    }

    // Attach the event listener to each phone input
    var phoneInputs = document.getElementsByClassName('vldphone');
    for (var i = 0; i < phoneInputs.length; i++) {
        phoneInputs[i].addEventListener('input', validatePhoneNumber);
    }
</script>

<script>
    function validateWebsite() {
        var websiteInputs = document.getElementsByClassName('vldwebsite');
        var websiteErrors = document.getElementsByClassName('websiteError');

        // Regular expression for a website format
        // var websiteRegex = /^www\.[a-zA-Z0-9-]+\.com$/;
        var websiteRegex = /^(https?:\/\/)?www\.[a-zA-Z0-9-]+\.(com|co|uk|pk)$/; 


        // Iterate through website inputs
        for (var i = 0; i < websiteInputs.length; i++) {
            var websiteInput = websiteInputs[i];
            var websiteError = websiteErrors[i];

            // Check if the website is empty
            if (websiteInput.value.trim() === '') {
                websiteError.innerText = ''; // No error if the input is empty
            } else if (!/^www\./.test(websiteInput.value)) {
                websiteError.innerText = 'Please start with "www."';
            } else if (!websiteRegex.test(websiteInput.value)) {
                websiteError.innerText = 'Invalid website format. Please use the format like www.example.com';
            } else {
                websiteError.innerText = '';
            }
        }
    }

    // Attach the event listener to each website input
    var websiteInputs = document.getElementsByClassName('vldwebsite');
    for (var i = 0; i < websiteInputs.length; i++) {
        websiteInputs[i].addEventListener('input', validateWebsite);
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get references to the shift start and end date inputs
        var startDateInput = document.getElementsByName('s_start_date[]')[0];
        var endDateInput = document.getElementsByName('s_end_date[]')[0];
        var endDateError = document.getElementById('shiftEndDateError');

        // Attach an input event listener to the end date input
        endDateInput.addEventListener('input', function () {
            validateShiftDates(startDateInput, endDateInput, endDateError);
        });
    });

    function validateShiftDates(startDateInput, endDateInput, endDateError) {
        var startDate = new Date(startDateInput.value);
        var endDate = new Date(endDateInput.value);

        // Check if the end date is smaller than the start date
        if (endDate < startDate) {
            endDateError.textContent = 'Shift End date should be greater than or equal to Shift Start date.';
            // Optionally, you can clear the end date input or take other actions
            // endDateInput.value = ''; // Uncomment this line to clear the end date input
        } else {
            endDateError.textContent = '';
        }
    }

    // Add this function to be called on form submission
    function validateForm() {
        var startDateInput = document.getElementsByName('s_start_date[]')[0];
        var endDateInput = document.getElementsByName('s_end_date[]')[0];
        var endDateError = document.getElementById('shiftEndDateError');

        validateShiftDates(startDateInput, endDateInput, endDateError);

        // Check if there are any errors before allowing form submission
        if (endDateError.textContent !== '') {
            // Prevent the form from being submitted
            event.preventDefault();
        }
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get references to the shift start and end date inputs
        var startDateInput = document.getElementsByName('man_start_date[]')[0];
        var endDateInput = document.getElementsByName('man_end_date[]')[0];
        var endDateError = document.getElementById('deploymentEndDateError');

        // Attach an input event listener to the end date input
        endDateInput.addEventListener('input', function () {
            validateShiftDates(startDateInput, endDateInput, endDateError);
        });
    });

    function validateShiftDates(startDateInput, endDateInput, endDateError) {
        var startDate = new Date(startDateInput.value);
        var endDate = new Date(endDateInput.value);

        // Check if the end date is smaller than the start date
        if (endDate < startDate) {
            endDateError.textContent = 'Deployment End date should be greater than or equal to Deployment Start date.';
            // Optionally, you can clear the end date input or take other actions
            // endDateInput.value = ''; // Uncomment this line to clear the end date input
        } else {
            endDateError.textContent = '';
        }
    }

    // Add this function to be called on form submission
    function validateForm() {
        var startDateInput = document.getElementsByName('man_start_date[]')[0];
        var endDateInput = document.getElementsByName('man_end_date[]')[0];
        var endDateError = document.getElementById('deploymentEndDateError');

        validateShiftDates(startDateInput, endDateInput, endDateError);

        // Check if there are any errors before allowing form submission
        if (endDateError.textContent !== '') {
            // Prevent the form from being submitted
            event.preventDefault();
        }
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get references to the shift start and end time inputs
        var startTimeInput = document.getElementsByName('s_start_time[]')[0];
        var endTimeInput = document.getElementsByName('s_end_time[]')[0];
        var endTimeError = document.getElementById('shiftEndTimeError');

        // Attach an input event listener to the end time input
        endTimeInput.addEventListener('input', function () {
            validateShiftTimes(startTimeInput, endTimeInput, endTimeError);
        });
    });

    function validateShiftTimes(startTimeInput, endTimeInput, endTimeError) {
        var startTime = startTimeInput.valueAsDate;
        var endTime = endTimeInput.valueAsDate;

        // Check if the end time is greater than the start time
        if (endTime && startTime && endTime <= startTime) {
            endTimeError.textContent = 'Shift End time should be greater than Shift Start time.';
            // Optionally, you can clear the end time input or take other actions
            // endTimeInput.value = ''; // Uncomment this line to clear the end time input
        } else {
            endTimeError.textContent = '';
        }
    }

    // Add this function to be called on form submission
    function validateForm() {
        var startTimeInput = document.getElementsByName('s_start_time[]')[0];
        var endTimeInput = document.getElementsByName('s_end_time[]')[0];
        var endTimeError = document.getElementById('shiftEndTimeError');

        validateShiftTimes(startTimeInput, endTimeInput, endTimeError);

        // Check if there are any errors before allowing form submission
        if (endTimeError.textContent !== '') {
            // Prevent the form from being submitted
            event.preventDefault();
        }
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get references to the shift start and end time inputs
        var startTimeInput = document.getElementsByName('man_start_time[]')[0];
        var endTimeInput = document.getElementsByName('man_end_time[]')[0];
        var endTimeError = document.getElementById('deploymentEndTimeError');

        // Attach an input event listener to the end time input
        endTimeInput.addEventListener('input', function () {
            validateShiftTimes(startTimeInput, endTimeInput, endTimeError);
        });
    });

    function validateShiftTimes(startTimeInput, endTimeInput, endTimeError) {
        var startTime = startTimeInput.valueAsDate;
        var endTime = endTimeInput.valueAsDate;

        // Check if the end time is greater than the start time
        if (endTime && startTime && endTime <= startTime) {
            endTimeError.textContent = 'Deployment End time should be greater than Deployment Start time.';
            // Optionally, you can clear the end time input or take other actions
            // endTimeInput.value = ''; // Uncomment this line to clear the end time input
        } else {
            endTimeError.textContent = '';
        }
    }

    // Add this function to be called on form submission
    function validateForm() {
        var startTimeInput = document.getElementsByName('man_start_time[]')[0];
        var endTimeInput = document.getElementsByName('man_end_time[]')[0];
        var endTimeError = document.getElementById('deploymentEndTimeError');

        validateShiftTimes(startTimeInput, endTimeInput, endTimeError);

        // Check if there are any errors before allowing form submission
        if (endTimeError.textContent !== '') {
            // Prevent the form from being submitted
            event.preventDefault();
        }
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get references to the shift start and end time inputs
        var startTimeInput = document.getElementsByName('s_start_time[]')[0];
        var endTimeInput = document.getElementsByName('s_end_time[]')[0];
        var dutyHoursInput = document.getElementsByName('man_hours[]')[0];

        // Attach an input event listener to both start and end time inputs
        startTimeInput.addEventListener('input', updateDutyHours);
        endTimeInput.addEventListener('input', updateDutyHours);

        function updateDutyHours() {
            var startTime = parseTime(startTimeInput.value);
            var endTime = parseTime(endTimeInput.value);

            if (startTime && endTime) {
                var dutyHours = calculateDutyHours(startTime, endTime);
                dutyHoursInput.value = dutyHours;
            } else {
                dutyHoursInput.value = ''; // Clear duty hours if either start or end time is not valid
            }
        }

        function parseTime(timeString) {
            // Parse time in HH:mm format
            var parts = timeString.split(':');
            if (parts.length === 2) {
                var hours = parseInt(parts[0], 10);
                var minutes = parseInt(parts[1], 10);
                if (!isNaN(hours) && !isNaN(minutes)) {
                    return { hours: hours, minutes: minutes };
                }
            }
            return null;
        }

        function calculateDutyHours(startTime, endTime) {
            // Calculate the time difference in minutes
            var startMinutes = startTime.hours * 60 + startTime.minutes;
            var endMinutes = endTime.hours * 60 + endTime.minutes;
            var timeDifference = endMinutes - startMinutes;

            // Convert the time difference back to HH:mm format
            var calculatedHours = Math.floor(timeDifference / 60);
            var calculatedMinutes = timeDifference % 60;

            return ('0' + calculatedHours).slice(-2) + ':' + ('0' + calculatedMinutes).slice(-2);
        }
    });
</script>


{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get references to the leaves allowed and salary for no. of days inputs
        var leavesAllowedInput = document.getElementsByName('leaves_a')[0];
        var salaryForDaysInput = document.getElementsByName('sal_days')[0];

        // Attach an input event listener to the salary for days input
        salaryForDaysInput.addEventListener('input', function () {
            updateLeavesAllowed(leavesAllowedInput, salaryForDaysInput);
        });

        // Trigger initial calculation
        updateLeavesAllowed(leavesAllowedInput, salaryForDaysInput);
    });

    function updateLeavesAllowed(leavesAllowedInput, salaryForDaysInput) {
        var salaryForDays = parseFloat(salaryForDaysInput.value);

        // Check if the salary for days is a valid number
        if (!isNaN(salaryForDays)) {
            // Calculate leaves allowed based on the formula (30 - Salary for No. of days)
            var leavesAllowed = 30 - salaryForDays;

            // Update the leaves allowed input value
            leavesAllowedInput.value = leavesAllowed.toFixed(2);

            // Optional: You can perform additional validation or adjustments here
        } else {
            // If the salary for days is not a valid number, clear the leaves allowed input
            leavesAllowedInput.value = '';
        }
    }
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get references to the leaves allowed and salary for no. of days inputs
        var leavesAllowedInputs = document.getElementsByName('leaves_a[]');
        var salaryForDaysInputs = document.getElementsByName('sal_days[]');

        // Attach input event listeners to all salary for days inputs
        for (var i = 0; i < salaryForDaysInputs.length; i++) {
            salaryForDaysInputs[i].addEventListener('input', function (event) {
                var index = Array.from(salaryForDaysInputs).indexOf(event.target);
                updateLeavesAllowed(leavesAllowedInputs[index], salaryForDaysInputs[index]);
            });
        }

        // Trigger initial calculation for all inputs
        for (var i = 0; i < leavesAllowedInputs.length; i++) {
            updateLeavesAllowed(leavesAllowedInputs[i], salaryForDaysInputs[i]);
        }
    });

    function updateLeavesAllowed(leavesAllowedInput, salaryForDaysInput) {
        var salaryForDays = parseFloat(salaryForDaysInput.value);

        // Check if the salary for days is a valid number
        if (!isNaN(salaryForDays)) {
            // Calculate leaves allowed based on the formula (30 - Salary for No. of days)
            var leavesAllowed = 30 - salaryForDays;

            // Update the leaves allowed input value
            leavesAllowedInput.value = leavesAllowed.toFixed(2);

            // Optional: You can perform additional validation or adjustments here
        } else {
            // If the salary for days is not a valid number, clear the leaves allowed input
            leavesAllowedInput.value = '';
        }
    }
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Get references to the approved leaves and salary for total days inputs
    var approvedLeavesInputs = document.getElementsByName('man_apr_l[]');
    var salaryForTotalDaysInputs = document.getElementsByName('man_salary[]');

    // Attach input event listeners to all salary for total days inputs
    for (var i = 0; i < salaryForTotalDaysInputs.length; i++) {
        salaryForTotalDaysInputs[i].addEventListener('input', function (event) {
            var index = Array.from(salaryForTotalDaysInputs).indexOf(event.target);
            updateApprovedLeaves(approvedLeavesInputs[index], salaryForTotalDaysInputs[index]);
        });
    }

    // Attach input event listeners to all approved leaves inputs
    for (var i = 0; i < approvedLeavesInputs.length; i++) {
        approvedLeavesInputs[i].addEventListener('input', function (event) {
            var index = Array.from(approvedLeavesInputs).indexOf(event.target);
            updateSalaryForTotalDays(salaryForTotalDaysInputs[index], approvedLeavesInputs[index]);
        });
    }

    // Trigger initial calculation for all inputs
    for (var i = 0; i < approvedLeavesInputs.length; i++) {
        updateApprovedLeaves(approvedLeavesInputs[i], salaryForTotalDaysInputs[i]);
    }
});

function updateApprovedLeaves(approvedLeavesInput, salaryForTotalDaysInput) {
    var salaryForTotalDays = parseFloat(salaryForTotalDaysInput.value);

    // Check if the salary for total days is a valid number
    if (!isNaN(salaryForTotalDays)) {
        // Calculate approved leaves based on the formula (30 - Salary for Total Days)
        var approvedLeaves = 30 - salaryForTotalDays;

        // Update the approved leaves input value
        approvedLeavesInput.value = approvedLeaves.toFixed(2);

        // Optional: You can perform additional validation or adjustments here
    } else {
        // If the salary for total days is not a valid number, clear the approved leaves input
        approvedLeavesInput.value = '';
    }
}

function updateSalaryForTotalDays(salaryForTotalDaysInput, approvedLeavesInput) {
    var approvedLeaves = parseFloat(approvedLeavesInput.value);

    // Check if the approved leaves is a valid number
    if (!isNaN(approvedLeaves)) {
        // Calculate salary for total days based on the formula (30 - Approved Leaves)
        var salaryForTotalDays = 30 - approvedLeaves;

        // Update the salary for total days input value
        salaryForTotalDaysInput.value = salaryForTotalDays.toFixed(2);

        // Optional: You can perform additional validation or adjustments here
    } else {
        // If the approved leaves is not a valid number, clear the salary for total days input
        salaryForTotalDaysInput.value = '';
    }
}

</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get references to the quantity, price per unit, and total value inputs
        var quantityInput = document.getElementsByName('pat_quan')[0];
        var pricePerUnitInput = document.getElementsByName('pat_price')[0];
        var totalValueInput = document.getElementsByName('pat_val')[0];

        // Attach input event listeners to the quantity and price per unit inputs
        quantityInput.addEventListener('input', updateTotalValue);
        pricePerUnitInput.addEventListener('input', updateTotalValue);

        // Trigger initial calculation
        updateTotalValue();
    });

    function updateTotalValue() {
        var quantity = parseFloat(document.getElementsByName('pat_quan')[0].value);
        var pricePerUnit = parseFloat(document.getElementsByName('pat_price')[0].value);

        // Check if both quantity and price per unit are valid numbers
        if (!isNaN(quantity) && !isNaN(pricePerUnit)) {
            // Calculate total value based on the formula (Quantity * Price Per Unit)
            var totalValue = quantity * pricePerUnit;

            // Update the total value input value
            document.getElementsByName('pat_val')[0].value = totalValue.toFixed(2);

            // Optional: You can perform additional validation or adjustments here
        } else {
            // If either quantity or price per unit is not a valid number, clear the total value input
            document.getElementsByName('pat_val')[0].value = '';
        }
    }
</script> 



<script>
    function initAutocomplete() {
        var input = document.getElementById('location-input');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('latitude').value = place.geometry.location.lat();
            document.getElementById('longitude').value = place.geometry.location.lng();
        });
    }
</script>

<script>
    function initAutocomplete1() {
        var input = document.getElementById('location-input1');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('latitude1').value = place.geometry.location.lat();
            document.getElementById('longitude1').value = place.geometry.location.lng();
        });
    }
</script>

<script>
    function initAutocomplete2() {
        var input = document.getElementById('location-input2');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('latitude2').value = place.geometry.location.lat();
            document.getElementById('longitude2').value = place.geometry.location.lng();
        });
    }
</script>

<script>
    function initAutocomplete3() {
        var input = document.getElementById('location-input3');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('latitude3').value = place.geometry.location.lat();
            document.getElementById('longitude3').value = place.geometry.location.lng();
        });
    }
</script>

<script>
    function initAutocomplete4() {
        var input = document.getElementById('location-input4');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('latitude4').value = place.geometry.location.lat();
            document.getElementById('longitude4').value = place.geometry.location.lng();
        });
    }
</script>

<script>
    function initAutocomplete5() {
        var input = document.getElementById('location-input5');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('latitude5').value = place.geometry.location.lat();
            document.getElementById('longitude5').value = place.geometry.location.lng();
        });
    }
</script>


<script>
    google.maps.event.addDomListener(window, 'load', initAutocomplete);
</script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        var checkbox = document.getElementById('exampleCheck1');
        var subCustomerSelect = document.getElementById('sub_customer');

        // Set the initial state
        updateSubCustomerSelect();

        // Add an event listener to the checkbox
        checkbox.addEventListener('change', function () {
            updateSubCustomerSelect();
        });

        function updateSubCustomerSelect() {
            // Check if the checkbox is checked
            if (checkbox.checked) {
                // Enable and make the select element writable/selectable
                subCustomerSelect.removeAttribute('disabled');
            } else {
                // Disable the select element
                subCustomerSelect.setAttribute('disabled', 'disabled');
                // Clear the selected value
                subCustomerSelect.value = '';
            }
        }
    });
</script>






{{-- // ManPower Accordian Script --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addManpower').on('click', function () {
            var accordionCount = $('.accordion-item').length + 1;

            var newAccordion = `
                <div class="accordion-item" id="manpowerEntry${accordionCount}">
                    <h2 class="accordion-header" id="manpowerHeading${accordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#collapse${accordionCount}" aria-expanded="false" aria-controls="collapse${accordionCount}">
                            Manpower Entry ${accordionCount}
                        </button>
                        
                    </h2>
                    <div id="collapse${accordionCount}" class="collapse" aria-labelledby="manpowerHeading${accordionCount}">
                        <div class="accordion-body">
                            <div class="row col-lg-12 manpower">
                                <div class="col-lg-6 spacing-right">
                                    <div class="row mb-2">
                                       
                                        <input class="form-control" type="hidden" name="man_id[]" placeholder="..." style="width: 100%;">
                                         <div class="col-lg-5 spacing-left spacing-right form-group">
                                            Guard Post No <br>
                                            <div class="input-group" style="width: 100%;">
                                                <select id="dropdown" class="form-control mt-1" name="man_post[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                    <option value=""></option>
                                                    @foreach ($guardposts as $guardpost)
                                                        <option value="{{ $guardpost->guard_post }}">{{ $guardpost->guard_post }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                    <a href="{{ route('guardpost') }}">
                                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 spacing-left spacing-right form-group">
                                            Category <br>
                                            <div class="input-group" style="width: 100%;">
                                                <select id="dropdown" class="form-control mt-1" name="man_cat[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                    <option value=""></option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                    <a href="{{ route('category') }}">
                                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div> 
                                         <div class="col-lg-5 spacing-left spacing-right form-group">
                                            Uniform Type <br><input class="form-control" name="man_uni[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left spacing-right form-group">
                                            Uniform Number <br> <input class="form-control" name="man_uni_no[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left spacing-right form-group">
                                            Weapon Type <br> <input class="form-control" name="man_weapon[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                         <div class="col-lg-5 spacing-left spacing-right form-group">
                                            Ammunition Type <br> <input class="form-control" name="man_ammu[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left spacing-right form-group">
                                            Equipment <br> <input class="form-control" name="man_equip[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="form-type col-lg-5 spacing-right">
                                            Picture of Equipment <br> <input class="form-control" name="man_equip_attach[]" type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                        
                                            <div class="form-type col-lg-5 spacing-left spacing-right form-group">
                                                Approved Leaves. <br> <input class="form-control" name="man_apr_l[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="form-type col-lg-5 spacing-left spacing-right form-group">
                                                Salary of total days. <br> <input class="form-control" name="man_salary[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6 spacing-left">
                                    <div class="row mb-3">
                                        <div class="form-type col-lg-6 spacing-right">
                                            Shift Start date. <br> <input class="form-control" name="s_start_date[]" type="date" placeholder="..." style="width: 100%;">
                                           

                                        </div>
                                        <div class="form-type col-lg-6 spacing-right">
                                            Shift End date. <br> <input class="form-control" name="s_end_date[]" type="date" placeholder="..." style="width: 100%;">
                                            <div id="shiftEndDateError" style="color: red;"></div>

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-type col-lg-6 spacing-right">
                                            Shift Start time. <br> <input class="form-control" name="s_start_time[]" type="time" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="form-type col-lg-6 spacing-right">
                                            Shift End time. <br> <input class="form-control" name="s_end_time[]" type="time" placeholder="..." style="width: 100%;">
                                            <div id="shiftEndTimeError" style="color: red;"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-type col-lg-6 spacing-right">
                                        Deployment Start date. <br> <input class="form-control" name="man_start_date[]" type="date" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="form-type col-lg-6 spacing-right">
                                        Deployment End date. <br> <input class="form-control" name="man_end_date[]" type="date" placeholder="..." style="width: 100%;">
                                        <div id="deploymentEndDateError" style="color: red;"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-type col-lg-6 spacing-right">
                                        Deployment Start time. <br> <input class="form-control" name="man_start_time[]" type="time" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="form-type col-lg-6 spacing-right">
                                        Deployment End time. <br> <input class="form-control"  name="man_end_time[]" type="time" placeholder="..." style="width: 100%;">
                                        <div id="deploymentEndTimeError" style="color: red;"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-type col-lg-6 spacing-right">
                                        Quantity. <br> <input class="form-control" name="man_quan[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="form-type col-lg-6 spacing-right">
                                        Duty Hours. <br> <input class="form-control"  name="man_hours[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                       
                                        <div class="form-type col-lg-6 spacing-right">
                                        Post Orders / JD of Guard Post. <br> <input class="form-control" name="man_jd_attach[]" type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="form-type col-lg-6 spacing-right">
                                        Any Special Instructions. <br> 
                                        <textarea class="form-control" id="w3review22" oninput="trimSpaces22()" onclick="moveCursorToStart22()" name="man_any_sp[]" type="notes" placeholder="..." style="width: 100%;"></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                             </div>  
                        </div>
                        <button class="btn btn-danger btn-sm removeAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                   
                </div>
                `;

            $('#manpowerAccordion').append(newAccordion);
        });

        // Remove Accordion Button Click Event
         
          $(document).on('click', '.removeAccordion', function () {
            $(this).closest('.accordion-item').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Your existing code...

        // Add code to update summary table
        function updateSummaryTable() {
            // Clear existing rows
            $('#manpowerSummaryTable tbody').empty();

            // Iterate through each accordion item and update the summary table
            $('.accordion-item').each(function (index) {
                var guardPost = $(this).find('[name="man_post[]"]').val();
                var category = $(this).find('[name="man_cat[]"]').val();
                var uniformType = $(this).find('[name="man_uni[]"]').val();
                var weaponType = $(this).find('[name="man_weapon[]"]').val();

                // Add more variables for other columns

                // Add a new row to the summary table
                $('#manpowerSummaryTable tbody').append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${guardPost}</td>
                        <td>${category}</td>
                        <td>${uniformType}</td>
                        <td>${weaponType}</td>
                        <!-- Add more columns as needed -->
                    </tr>
                `);
            });
        }

        // Add More Button Click Event
        $('#addManpower').on('click', function () {
            // Your existing code...

            // Add code to update summary table
            updateSummaryTable();
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeAccordion', function () {
            $(this).closest('.accordion-item').remove();

            // Add code to update summary table
            updateSummaryTable();
        });
    });
</script>

<script>
    var auditsRoom = 1;

function audits_add_more() {
    auditsRoom++;
    var objTo = document.getElementById('auditsInfo');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "audits-section removeclass" + auditsRoom);

    divtest.innerHTML = `
        <div class="col-lg-12">
            <div class="row mb-2">
                <div class="col-lg-3 spacing-right">
                    File Audited By: <br>
                    <input class="form-control" name="audit_file[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-left spacing-right">
                    Signature: <br>
                    <input class="form-control" name="audit_sign[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Date: <br>
                    <input class="form-control" name="audit_date[]" type="date" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Attachments: <br>
                    <input class="form-control" name="audit_attach[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <h5 class="mt-3">Checked By :</h5>
                <div class="row mb-2">
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                                            Checked by: <br>
                                            <div class="input-group" style="width: 100%;">
                                                <select id="dropdown" class="form-control mt-1" name="audit_checked_by[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                    <option value=""></option>
                                                    
                                                        
                                                        <option value="{{ $checkedby->checkedby_name}}">{{ $checkedby->checkedby_name }}</option>
                                                   
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                    <a href="{{ route('checkedby') }}">
                                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                        Attachements <br> <input class="form-control" name="audit_ex_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                    </div>
                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                        Notes <br>
                        <textarea id="w3review" class="form-control" name="audit_note[]" rows="2" cols="38">
                        </textarea>
                    </div>
                </div>
                <button type="button" class="remove-audit-btn" onclick="removeAuditSection(${auditsRoom})">Remove</button>
            </div>
        </div>
    `;

    objTo.appendChild(divtest);
}

function removeAuditSection(room) {
    document.querySelector('.audits-section.removeclass' + room).remove();
}

</script>



<!-- Bootstrap CSS -->


<!-- Bootstrap JS and dependencies -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>




</body>
</html>



    <!-- Modal structure -->
   

  