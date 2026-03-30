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
                <section  style="margin-bottom: 50px;">
                    <!-- View Modal -->

            <div class="modal-header border-0">
                <div style="display:flex; column-gap:10px; align-items:center">
                    <button type="button" class="btn btn-link" onclick="history.back()">
                     <i class="bi bi-arrow-left"></i>
                    </button>
                    <h5 class="mt-3" style="font-weight: 700;"> Post Customers: </h5>
                </div>
              </div>

                    <form id="customerForm" action="{{ route('submit_customer') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--Customer / Main Form-->
                        <div class="row">
                            <div class="row mb-2" style="margin-left: 20px;">
                                <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
                                   <div>
                                  <h5>Customer Activation Status</h5>
                                  <div class="form-check form-check-inline" style="margin-right: 90px;">
                                    <input class="form-check-input mr-2" type="radio" name="customers_activation_check" value="1" id="activeRadio">
                                    <label class="form-check-label" for="activeRadio">Active</label>
                                    <input class="form-check-input ml-3 mr-2" type="radio" name="customers_activation_check" value="0" id="inactiveRadio">
                                    <label class="form-check-label" for="inactiveRadio">Inactive</label>
                                  </div>
                                    <div class="col-12">
                                    <div>
                                        <label class="form-label" for="entryofdate">Date Of Entry</label>
                                        <input class="form-control" type="date" name="date_of_entry"  id="entryofdate" >
                                    </div>
                                    </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="font-weight:600;">
                        <h5> Customer Information </h5>
                            <div class="col-lg-6 spacing-right">
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-right">
                                    Customer ID <br>  <input class="form-control" id="customers_id" name="customers_id" oninput="updateClientID(this.value)" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                    WhatsApp number <br>  <input class="form-control vldphone"  type="text" id="whatsapp_number" name="whatsapp_number" placeholder="e.g: 0340-2233444" style="width: 100%;" autocomplete="off">
                                    <div id="phoneError" class="phoneError" style="color: red"></div>
                                </div>
                            </div>
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-left">
                                    Customer Legal Name (As per NTN) <br>  <input class="form-control" id="customers_name" oninput="updateClientName(this.value)" type="text" name="customers_name" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right input-group">
                                    Display Name as <br>  <input class="form-control" id="d_name" value="" name="display_name_as" type="text" placeholder="..." style="width: 100%;">
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
                                <div class="col-lg-5 spacing-right">
                                    Region <br>  <input class="form-control" id="customers_region" type="text" name="customers_region" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                    Belongs to Branch
                                    <select id="" class="form-control mt-1" name="branch_name">
                                        <option value=""></option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->branch_office_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-6 spacing-left">
                                <div class="row mb-2 mt-3">
                                    <div class="col-lg-5 spacing-right">
                                        Nature of Business <br>  <input class="form-control" id="nature_of_business" name="nature_of_business" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 spacing-left">
                                        Website <br>  <input class="form-control vldwebsite" type="text" id="website" name="website" placeholder="" style="width: 100%;">
                                        <div id="websiteError" class="websiteError" style="color: red"></div>
                                    </div>
                                </div>
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-right">
                                    Phone/Cell no <br>  <input class="form-control vldphone"  type="text" id="phone" name="phone" oninput="updateClientPhone(this.value)" placeholder="..." style="width: 100%;" autocomplete="off">
                                    <div id="phoneError" class="phoneError" style="color: red"></div>
                                </div>
                                <div class="col-lg-6 spacing-left input-group">
                                    Email <br> <input class="form-control vldemail "  name="email" id="email" type="email" placeholder="..." oninput="updateClientEmail(this.value)" style="width: 100%;" autocomplete="off">
                                    <div id="emailError" class="emailError" style="color: red"></div>
                                </div>

                                <div class="row" style="margin-left: 3px; margin-top: 10px;">
                                    <div class="col-lg-11 spacing-right">
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Sub-customer</label>
                                           <!-- Add Select2 CSS -->
                                            <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

                                            <select class="form-control select2" id="sub_customer" name="sub_customer" style="width: 100%;">
                                                <option value="">Select a customer</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->id }} - {{ $customer->customers_name }}</option>
                                                @endforeach
                                            </select>

                                            <!-- Add jQuery and Select2 JS -->
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                            <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

                                            <script>
                                                $(document).ready(function() {
                                                    $('.select2').select2({
                                                        placeholder: "Select a customer",
                                                        allowClear: true
                                                    });
                                                });
                                            </script>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Approved Commercials</h5>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row mb-2 mt-3" style="margin-left:20px;">
                                                <div class="form-check form-check-inline spacing-left">
                                                    <input class="form-check-input checkbox-class" name="approved_com" type="checkbox" id="approved_commercials" value="">
                                                    <label class="form-check-label" for="inlineCheckbox1">Approved Commercials</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-2 mt-3 " >
                                                <div class="col-lg-6 spacing-left hidden-content" style="display: none">
                                                    Approved Commercial Attachments <br> <input class="form-control" id="hiddenelement" name="approved_attach" type="file" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row mb-2 mt-5" style="margin-left:20px;">
                                                <div class="form-check form-check-inline spacing-left">
                                                    <input class="form-check-input checkbox-class" type="checkbox" name="quick_box" id="quick_box" value="">
                                        <label class="form-check-label" for="inlineCheckbox1">QuickBooks</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-2 mt-3" >
                                                <div class="col-lg-6 spacing-left  hidden-content1" style="display: none">
                                                    QuickBooks Screenshot <br> <input class="form-control" name="quickbooks_attach" type="file" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-4">
                                <div class="row d-flex flex-row align-items-center">
                                    <div class="col-12">
                                         <div class="form-check form-check-inline" style="margin-right: 90px;">
                                            <input class="form-check-input mr-2" type="radio" name="payment" value="1" id="cashpaymentRadio">
                                            <label class="form-check-label" for="cashpaymentRadio">Cash</label>
                                            <input class="form-check-input ml-3 mr-2" type="radio" name="payment" value="2" id="ChequepaymentRadio">
                                            <label class="form-check-label" for="ChequepaymentRadio">Cheque</label>
                                        </div>
                                    </div>
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
                                    <select id="applicable_compliances" class="form-control mt-1"  name="applicable_compliances" style="width: 70%; border-radius: 4px 0 0 4px; ">
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
                        <button type="button" id="validateBtn" class="btn btn-primary mt-3">Save</button>
                        <div id="validationMessage" class="mt-3"></div>

                       <!-- Modal -->
                        <div id="myModal" class="modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
                            <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 30%; border-radius: 10px; text-align: center;">
                                <span class="close" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; position: relative; left: 49%;" >&times;</span>
                                <p id="popupMessage"></p>
                                <input type="text" id="urlInput" style="width: 98%; margin-top: 20px;" readonly>
                                <div style="margin-top: 20px;">
                                    <a href="https://mail.google.com/mail/u/0/#inbox" id="gmailIcon" style="text-decoration: none; color: #000; margin-right: 10px;"><i class="fab fa-google" style="font-size: 24px;"></i></a>
                                    <a href="https://web.whatsapp.com/send?text=Check%20out%20this%20link%3A%20" id="whatsappIcon" style="text-decoration: none; color: #000; margin-right: 10px;"><i class="fab fa-whatsapp" style="font-size: 24px;"></i></a>
                                    <span id="copyIcon" style="cursor: pointer; margin-right: 10px;"><i class="fas fa-copy" style="font-size: 24px;"></i></span>
                                    <span id="copyText" style="font-size: 14px; color: green;"></span>
                                </div>
                            </div>
                        </div>




                        <!--Tabs forDetails-->
                        <nav>
                            <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link disabled" id="nav-contact-tab" data-toggle="tab" href="#work-experience" role="tab" aria-controls="nav-experience" aria-selected="false">Contract Management
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

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {

                                $('.nav-tabs .nav-item').not(':first').addClass('disabled').attr('aria-disabled', 'true');


                                $('.saveButton').click(function() {
                                    var nextTabId = $(this).data('next-tab');
                                    var nextTabLink = $('a[href="' + nextTabId + '"]');

                                    // Enable the next tab
                                    nextTabLink.removeClass('disabled').removeAttr('aria-disabled');
                                    nextTabLink.tab('show');
                                });


                                $('.nav-tabs').on('click', '.nav-link', function(e) {
                                    if ($(this).hasClass('disabled')) {
                                        e.preventDefault();
                                        alert('Please click the "Save" button in the current tab before navigating to the next tab.');
                                    }
                                });
                            });
                        </script>
                        <script>
                            $(document).ready(function() {
                                $('#nav-meeting-tab').removeClass('disabled').removeAttr('aria-disabled');

                                $('#nav-score-tab').on('shown.bs.tab', function() {
                                    $('#nav-tab a[href="#meeting"]').removeClass('disabled').removeAttr('aria-disabled');
                                    $('#nav-tab a[href="#address-details"]').removeClass('disabled').removeAttr('aria-disabled');
                                });
                            });
                        </script>

                        <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
                            <!--contract management-->
                            <div class="tab-pane fade disabled m-3" style="opacity: 90%;" id="work-experience" role="tabpanel" aria-labelledby="nav-contact-tab">

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
                                                        <input class="form-check-input checkbox-class" name="approv_q_s" type="checkbox" id="myCheck1" value="" >

                                                        <label class="form-check-label" for="myCheck1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right ">
                                                <div class="hidden_content2"  style="display: none">
                                                    Attachments <br> <input class="form-control " name="approv_q_s_attach" type="file" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 mt-2 spacing-right">
                                                <div class=" mb-2 d-flex align-items-center">

                                                    <label for="Type Of Training:" class="form-check-label spacing-right">Approved Quotation Vetted by Contract Management Department :</label>
                                                    <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input " type="checkbox" name="approv_q_c" id="myCheck2" value="">
                                                        <label class="form-check-label" for="myCheck2"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right hidden_content3" style="display: none">
                                                Attachments <br> <input class="form-control" id="printing_date" name="approv_q_c_attach" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 mt-2 spacing-right">
                                                <div class=" mb-2 d-flex align-items-center">

                                                    <label for="Type Of Training:" class="form-check-label spacing-right">Approved Quotation Vetted by CFO :</label>
                                                    <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" type="checkbox" name="approv_q_cfo" id="myCheck3" >
                                                        <label class="form-check-label" for="myCheck3"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right hidden_content4" style="display: none">
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

                                            <div class="container my-1">
                                                <div class="accordion" id="signatoryAccordion">
                                                    <!-- Initial Accordion Item -->
                                                    <div class="accordion-item signaccordion-item" id="signatoryEntry1">
                                                        <h2 class="accordion-header" id="signatoryHeading1" style="color: white">
                                                            <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#signatoryCollapse1" aria-expanded="false" aria-controls="signatoryCollapse1">
                                                                Signatory Entry 1
                                                            </button>
                                                        </h2>
                                                        <div id="signatoryCollapse1" class="collapse" aria-labelledby="signatoryHeading1">
                                                            <div class="accordion-body">
                                                                <!-- Your content for signatory entry goes here -->
                                                                <div class="row mb-2" id="signatoryDetailsContainer">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Name <br> <input class="form-control" name="sign_name[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Designation <br> <input class="form-control" name="sign_desig[]" oninput="updateClientDesig(this.value)" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Cell No <br> <input class="form-control vldphone"  type="text" name="sign_cell[]" placeholder="..." style="width: 100%;">
                                                                        <div id="phoneError" class="phoneError" style="color: red"></div>
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Email <br> <input class="form-control vldemail" type="text" name="sign_email[]" placeholder="..." style="width: 100%;">
                                                                        <div id="emailError" class="emailError" style="color: red"></div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Add More and Remove Buttons -->
                                                <div class="row my-3">
                                                    <div class="col">
                                                        <button type="button" class="btn btn-primary" id="addSignatory" style="height:30px; width:150px;">Add More Signatory</button>
                                                    </div>
                                                    <button type="button" class="btn btn-primary" id="updateSignatoryTable">Save</button>

                                                </div>
                                            </div>

                                            <table class="table table-bordered mt-1" id="signatorySummaryTable">
                                                <thead>
                                                    <tr>
                                                        <th>Entry</th>
                                                        <th>Name</th>
                                                        <th>Designation</th>
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
                                                        <input class="form-check-input" name="signed_ser" type="checkbox" id="myCheck4" value="">
                                                        <label class="form-check-label" for="myCheck4"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right hidden_content5" style="display: none">
                                                Attachments <br> <input class="form-control" name="signed_ser_attach" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 mt-2 spacing-right">
                                                <div class=" mb-2 d-flex align-items-center">

                                                    <label for="Type Of Training:" class="form-check-label spacing-right">Communication Instructions Attached :</label>
                                                    <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" name="com_ins" type="checkbox" id="myCheck5" value="">
                                                        <label class="form-check-label" for="myCheck5"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right hidden_content6" style="display: none">
                                                Attachments <br> <input class="form-control" name="com_ins_attach" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 mt-2 spacing-right">
                                                <div class=" mb-2 d-flex align-items-center">

                                                    <label for="Type Of Training:" class="form-check-label spacing-right">Testimonials (Reference Letters) Attached :</label>
                                                    <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" name="testimonials" type="checkbox" id="myCheck6" value="">
                                                        <label class="form-check-label" for="myCheck6"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right hidden_content7" style="display: none">
                                                Attachments <br> <input class="form-control" name="testimonials_attach"  type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 mt-2 spacing-right">
                                                <div class=" mb-2 d-flex align-items-center">

                                                    <label for="Type Of Training:" class="form-check-label spacing-right">Details of Sales Incentives Attached :</label>
                                                    <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" name="sales_inc" type="checkbox" id="myCheck7" value="">
                                                        <label class="form-check-label" for="myCheck7"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right hidden_content8" style="display: none">
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

                                <div class="container my-1">
                                    <div class="accordion" id="salaryAccordion">
                                        <!-- Initial Accordion Item -->
                                        <div class="accordion-item salaryaccordion-item" id="salaryEntry1">
                                            <h2 class="accordion-header" id="salaryHeading1" style="color: white">
                                                <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#salaryCollapse1" aria-expanded="false" aria-controls="salaryCollapse1">
                                                    Salary Entry 1
                                                </button>
                                            </h2>
                                            <div id="salaryCollapse1" class="collapse" aria-labelledby="salaryHeading1">
                                                <div class="accordion-body">
                                                    <!-- Your content for signatory entry goes here -->
                                                    <div class=" row main-content div" id="salaryContainer">
                                                        <div class="col-lg-12">
                                                            <div class="row mb-2">

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
                                                                    Salary <br> <input class="form-control" id="head_office_email" name="sal_cat[]" type="text" placeholder="..." style="width: 100%;">
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
                                                                    <textarea id="w3review23"  class="form-control" name="other_ben[]" rows="2" cols="38" ></textarea>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-6 spacing-left spacing-right mt-2">
                                                                Attachements <br> <input class="form-control" type="file" name="sal_attach[]" placeholder="..." style="width: 70%;" multiple>
                                                            </div>
                                                            <div class="col-lg-6 spacing-left spacing-right mt-2">
                                                                Notes <br>
                                                                <textarea id="w3review3" class="form-control" name="sal_note[]" rows="2" cols="38" >
                                                                </textarea>
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
                                            <button type="button" class="btn btn-primary" id="addSalary" style="height:30px; width:150px;">Add More Salary</button>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="updateSalaryTable">Save</button>
                                    </div>
                                </div>

                                <table class="table table-bordered mt-1" id="salarySummaryTable">
                                    <thead>
                                        <tr>
                                            <th>Entry</th>
                                            <th>Category</th>
                                            <th>Salary of Category</th>
                                            <th>Leaves Allowed</th>
                                            <th>View</th>

                                            <!-- Add more columns as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Summary data will be added here dynamically -->
                                    </tbody>
                                </table>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Please press the "Next" button to go to the second tab.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary saveButton" data-next-tab="#education">Save and Next</button>
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



                                        {{-- <div class="container my-5">
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
                                        </div> --}}

                                        <div class="container my-1">
                                            <div class="accordion" id="manpowerAccordion">
                                                <!-- Initial Accordion Item -->
                                                <div class="accordion-item manaccordion-item" id="manpowerEntry1">
                                                    <h2 class="accordion-header" id="manpowerHeading1" style="color: white">
                                                        <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#manpowerCollapse1" aria-expanded="false" aria-controls="manpowerCollapse1">
                                                            Manpower Entry 1
                                                        </button>
                                                    </h2>
                                                    <div id="manpowerCollapse1" class="collapse" aria-labelledby="manpowerHeading1">
                                                        <div class="accordion-body">
                                                            <!-- Your content for signatory entry goes here -->
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
                                                    <button type="button" class="btn btn-primary" id="addManpower" style="height:30px; width:150px;">Add More Manpower</button>
                                                </div>
                                                <button type="button" class="btn btn-primary" id="updateManpowerTable" style="height:30px; width:150px;">Save</button>
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
                                                    <th>Action</th>
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
                               {{--//////////////// Emergency Accordion \\\\\\\\\\\\\\\\\\\\ --}}
                                <div class="container my-1">
                                    <div class="accordion" id="emergencyAccordion">
                                        <div class="accordion-item emergencyaccordion-item" id="emergencyEntry1">
                                            <h2 class="accordion-header" id="emergencyHeading1" style="color: white">
                                                <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#emergencyCollapse1" aria-expanded="false" aria-controls="emergencyCollapse1">
                                                    Emergency Entry 1
                                                </button>
                                            </h2>
                                            <div id="emergencyCollapse1" class="collapse" aria-labelledby="emergencyHeading1">
                                                <div class="accordion-body">
                                                    <!-- Your content for signatory entry goes here -->
                                                    <div class="row" id="emergencyServices_add_fields">
                                                        <div class=" row main-content div">
                                                            <div class="col-lg-6">
                                                                <div class="row mb-2">

                                                                    <div class="col-lg-6 spacing-left spacing-right form-group">
                                                                        Emergency Services <br>
                                                                        <div class="input-group" style="width: 100%;">
                                                                            <select id="dropdown" class="form-control mt-1" name="emer_ser[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                                <option value=""></option>
                                                                                @foreach ($emerser as $emerse)
                                                                                    <option value="{{ $emerse->emerser_name}}">{{ $emerse->emerser_name }}</option>
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
                                                                        Floor <br> <input class="form-control" id="head_office_cell_no" name="emer_floor[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>

                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Building <br> <input class="form-control" id="head_office_cell_no" name="emer_building[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
                                                                        Block <br> <input class="form-control" id="head_office_cell_no" name="emer_block[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>

                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Area <br> <input class="form-control" id="head_office_cell_no" name="emer_area[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
                                                                        City <br> <input class="form-control" id="head_office_cell_no" name="emer_city[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>

                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Photograph of Building <br> <input class="form-control" id="head_office_cell_no" name="emer_loc[]" type="file" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
                                                                        Email <br> <input class="form-control vldemail" id="" name="emer_email[]" type="text" placeholder="..." style="width: 100%;">
                                                                        <div  class="emailError" style="color: red"></div>
                                                                    </div>

                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Website <br> <input class="form-control vldwebsite" id="" name="emer_web[]" type="text" placeholder="..." style="width: 100%;">
                                                                        <div id="websiteError" class="websiteError" style="color: red"></div>
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
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

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add More and Remove Buttons -->
                                    <div class="row my-3">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary" id="addEmergency" style="height:30px; width:150px;">Add More Emergency</button>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="updateEmergencyTable" style="height:30px; width:150px;">Save</button>
                                    </div>
                                </div>

                                <table class="table table-bordered mt-1" id="emergencySummaryTable">
                                    <thead>
                                        <tr>
                                            <th>Entry</th>
                                            <th>Emergency Services</th>
                                            <th>POC Name</th>
                                            <th>POC Desig</th>
                                            <th>POC Cell No</th>
                                            <th>View</th>

                                            <!-- Add more columns as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Summary data will be added here dynamically -->
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary saveButton" data-next-tab="#guaranter-details">Save and Next</button>
                            </div>
                            <!--Address-->
                            <div class="tab-pane fade  m-3" style="opacity: 90%;" id="guaranter-details" role="tabpanel" aria-labelledby="nav-contact-tab">

                               {{-- ///////////////////   Department Accordion \\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                                <div class="container my-1">
                                    <div class="accordion" id="departmentAccordion">
                                        <!-- Initial Accordion Item -->
                                        <div class="accordion-item departmentaccordion-item" id="departmentEntry1">
                                            <h2 class="accordion-header" id="departmentHeading1" style="color: white">
                                                <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#departmentCollapse1" aria-expanded="false" aria-controls="departmentCollapse1">
                                                    Department Entry 1
                                                </button>
                                            </h2>
                                            <div id="departmentCollapse1" class="collapse" aria-labelledby="departmentHeading1">
                                                <div class="accordion-body">
                                                    <!-- Your content for signatory entry goes here -->
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
                                                                    Visiting Card (front) <br> <input class="form-control" name="dept_front[]" type="file" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-6  spacing-right">
                                                                    Visiting Card (back) <br> <input class="form-control" name="dept_back[]" type="file" placeholder="..." style="width: 100%;">
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
                                                                    Floor <br> <input class="form-control" name="dept_floor[]" type="text" placeholder="..." style="width: 100%;">
                                                                </div>

                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-lg-5 spacing-right">
                                                                    Building <br> <input class="form-control" name="dept_build[]" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-5 spacing-left">
                                                                    Block <br> <input class="form-control" name="dept_block[]" type="text" placeholder="..." style="width: 100%;">
                                                                </div>

                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-lg-5 spacing-right">
                                                                    Area <br> <input class="form-control" name="dept_area[]" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-5 spacing-left">
                                                                    City <br> <input class="form-control" name="dept_city[]" type="text" placeholder="..." style="width: 100%;">
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-5 spacing-right">
                                                                    Photograph of building <br> <input class="form-control" name="dept_photo[]" type="file" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-5 spacing-left">
                                                                    Pin Location <br> <input id="location-input3" class="form-control" name="dept_pin[]" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete3()">
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 spacing-right ">
                                                                    Attachments <br> <input class="form-control" name="dept_ex_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                                                                    </div>
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

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add More and Remove Buttons -->
                                    <div class="row my-3">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary" id="addDepartment" style="height:30px; width:170px;">Add More Department</button>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="updateDepartmentTable" style="height:30px; width:200px;">Save</button>
                                    </div>
                                </div>

                                <table class="table table-bordered mt-1" id="departmentSummaryTable">
                                    <thead>
                                        <tr>
                                            <th>Entry</th>
                                            <th>Department Type</th>
                                            <th>POC Name</th>
                                            <th>POC Email</th>
                                            <th>POC Cell No</th>
                                            <th>View</th>

                                            <!-- Add more columns as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Summary data will be added here dynamically -->
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary saveButton" data-next-tab="#patrolling">Save and Next</button>
                            </div>
                            <!--Patrolling Section-->
                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="patrolling" role="tabpanel" aria-labelledby="nav-loto-tab">
                                <h5>Supervisor Visits</h5>
                                <div class="row mb-2 mt-3">
                                    <div class="col-lg-4 spacing-right">
                                        Visit Performed By: <br> <input class="form-control" type="text" name="visit_perf_by" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Location: <br> <input class="form-control" type="text" name="pat_super_loc" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Date: <br> <input class="form-control" name="pat_super_date" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Day: <br> <input class="form-control" type="text" name="pat_super_day" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Time: <br> <input class="form-control" type="time" name="pat_super_times" placeholder="..." style="width: 100%;">

                                    </div>
                                    <div class="col-lg-4 spacing-right ">
                                        <div class="" >
                                            Photo Taken: <br> <input class="form-control " name="pat_super_photo" type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-4 spacing-right ">
                                        <div class="" >
                                            Video Recorded <br> <input class="form-control " name="pat_super_video" type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-3 spacing-right ">
                                        Inform Client about the visit via email: <br>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input mr-2" type="radio" name="pat_super_inform_email" value="1" id="activeEmailRadio">
                                        <label class="form-check-label" for="activeEmailRadio">Yes</label>

                                        <input class="form-check-input ml-3 mr-2" type="radio" name="pat_super_inform_email" value="0" id="inactiveEmailRadio" checked>
                                        <label class="form-check-label" for="inactiveEmailRadio">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="customModal" class="modal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60%; max-width: 1000px; height: 70%; max-height: 1200px; background-color: rgba(0, 0, 0, 0.5);">
                                    <div class="modal-content" style="position: relative; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); display: flex; flex-direction: column; align-items: center;">
                                        <span class="close" id="closeCustomModal" style="position: absolute; top: 10px; right: 10px; font-size: 20px; cursor: pointer;">&times;</span>
                                        <h5>Email Details</h5>

                                        <div style="display: flex; justify-content: space-between; width: 100%;">
                                            <div style="flex: 1;">
                                                <label for="recipientEmail" style="width: 100px;">To:</label>
                                                <input type="email" id="recipientEmail" name="recipientEmail" style="width: calc(106% - 120px);">
                                            </div>
                                            <div style="flex: 1;">
                                                <label for="ccEmail" style="width: 30px; margin-left: 30px;">CC:</label>
                                                <input type="email" id="ccEmail" style="width: calc(110% - 120px);" name="ccEmail">
                                            </div>
                                            <div style="flex: 1;">
                                                <label for="bccEmail" style="width: 50px;">BCC:</label>
                                                <input type="email" id="bccEmail" style="width: calc(110% - 120px);" name="bccEmail">
                                            </div>
                                        </div>

                                        <div style="width: 100%;">
                                            <label for="customEmailSubject" style="width: 100px;">Subject:</label>
                                            <input type="text" id="customEmailSubject" name="customEmailSubject" value="Post Visit Report by PIFFERS Security Services (Pvt.) Ltd." style="width: calc(100% - 120px);">
                                        </div>
                                        <div style="width: 100%;">
                                            <label for="customEmailBody" style="width: 100px;">Body:</label>
                                            <textarea id="customEmailBody" name="customEmailBody" rows="10" style="width: calc(100% - 120px);" ></textarea>
                                        </div>
                                        <div style="width: 100%;">
                                            <label for="customEmailAttachment" style="width: 100px;">Attachment:</label>
                                            <input type="file" id="customEmailAttachment" name="customEmailAttachment[]" accept="image/*, video/*" multiple>
                                        </div>
                                        <div class="mt-3" style="display: flex; gap: 10px; justify-content: center;">
                                            <button type="button" id="confirm-send-email" >Yes, Send Email</button>
                                            <button type="button" id="cancel-send-email" >Cancel</button>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary saveButton" data-next-tab="#site">Save and Next</button>
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


                                        <div class="container my-1" id="inspectionContainer" style="display:none;">
                                            <div class="accordion" id="inspectionAccordion" >
                                                <!-- Initial Accordion Item -->
                                                <div class="accordion-item inspectionaccordion-item" id="inspectionEntry1">
                                                    <h2 class="accordion-header" id="inspectionHeading1" style="color: white">
                                                        <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#inspectionCollapse1" aria-expanded="false" aria-controls="inspectionCollapse1">
                                                            Inspection Entry 1
                                                        </button>
                                                    </h2>
                                                    <div id="inspectionCollapse1" class="collapse" aria-labelledby="inspectionHeading1">
                                                        <div class="accordion-body">
                                                            <div id="inspectionDiv">
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

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Add More and Remove Buttons -->
                                            <div class="row my-3">
                                                <div class="col">
                                                    <button type="button" class="btn btn-primary" id="addInspection" style="height:30px; width:150px;">Add More Inspection</button>
                                                </div>
                                                <button type="button" class="btn btn-primary" id="updateInspectionTable">Save</button>

                                            </div>

                                            <table class="table table-bordered mt-3" id="inspectionSummaryTable">
                                                <thead>
                                                    <tr>
                                                        <th>Entry</th>
                                                        <th>Inspection Number</th>
                                                        <th>Inspection ID</th>
                                                        <th>Inspection Name</th>
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

                                    <div class="mt-2">
                                        <button class="btn btn-danger" type="button" id="remove_inspection_btn">
                                            Remove Inspection
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary saveButton" data-next-tab="#arm">Save and Next</button>
                            </div>
                            <!--Armourer-->
                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="arm" role="tabpanel" aria-labelledby="nav-loto-tab">

                                {{-- //////////////////////////////////   Armour   Accordion   \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                                <div class="container  my-1" id="armourContainer" >
                                    <div class="accordion" id="armourAccordion" >
                                        <!-- Initial Accordion Item -->
                                        <div class="accordion-item armouraccordion-item" id="armourEntry1">
                                            <h2 class="accordion-header" id="armourHeading1" style="color: white">
                                                <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#armourCollapse1" aria-expanded="false" aria-controls="armourCollapse1">
                                                    Armour Entry 1
                                                </button>
                                            </h2>
                                            <div id="armourCollapse1" class="collapse" aria-labelledby="armourHeading1">
                                                <div class="accordion-body">
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

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add More and Remove Buttons -->
                                    <div class="row my-3">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary" id="addArmour" style="height:30px; width:150px;">Add More Armour</button>

                                        </div>
                                        <button type="button" class="btn btn-primary" id="updateArmourTable" style="height:30px; width:150px;">Save</button>
                                    </div>


                                </div>

                                <table class="table table-bordered mt-3" id="armourSummaryTable">
                                    <thead>
                                        <tr>
                                            <th>Entry</th>
                                            <th>Branch Name</th>
                                            <th>Branch ID</th>
                                            <th>Client Name</th>
                                            <th>Sign of Customer</th>
                                            <th>View</th>

                                            <!-- Add more columns as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Summary data will be added here dynamically -->
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary saveButton" data-next-tab="#incident_report">Save and Next</button>
                            </div>
                            <!--Incident form-->
                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="incident_report" role="tabpanel" aria-labelledby="nav-incident-tab">

                                {{-- //////////////////////////  Incident  Accordion  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                                <div class="container  my-1" id="incidentContainer" >
                                    <div class="accordion" id="incidentAccordion" >
                                        <!-- Initial Accordion Item -->
                                        <div class="accordion-item incidentaccordion-item" id="incidentEntry1">
                                            <h2 class="accordion-header" id="incidentHeading1" style="color: white">
                                                <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#incidentCollapse1" aria-expanded="false" aria-controls="incidentCollapse1">
                                                    Incident Entry 1
                                                </button>
                                            </h2>
                                            <div id="incidentCollapse1" class="collapse" aria-labelledby="incidentHeading1">
                                                <div class="accordion-body">

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
                                                                    Site ID <br> <input class="form-control" type="text" name="client_site_id[]" oninput="updateClientSiteID(this.value)" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Client POC Name <br>
                                                                    <input class="form-control" type="text" name="client_poc[]" oninput="updateClientPoc(this.value)" placeholder="..." style="width: 100%;">
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
                                                                    Casualities <br> <input class="form-control" name="casual[]" type="text" placeholder="..." style="width: 115%;"">
                                                                </div>

                                                                <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 30px;">
                                                                    Injuired <br> <input class="form-control" name="injuired[]" type="text" placeholder="..." style="width: 101%;">
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

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add More and Remove Buttons -->
                                    <div class="row my-3">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary" id="addIncident" style="height:30px; width:150px;">Add More Incident</button>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="updateIncidentTable" style="height:30px; width:150px;">Save</button>
                                    </div>


                                </div>

                                <table class="table table-bordered mt-3" id="incidentSummaryTable">
                                    <thead>
                                        <tr>
                                            <th>Entry</th>
                                            <th>Client Name</th>
                                            <th>Client ID</th>
                                            <th>Client POC Name</th>
                                            <th>Cell</th>
                                            <th>View</th>

                                            <!-- Add more columns as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Summary data will be added here dynamically -->
                                    </tbody>
                                </table>

                                <h5 class="mt-5" style="text-align:center;"><b><u>Assigment Instruction Form</u></b></h5>

                                {{-- //////////////////////////////////   Assignment Accordion   \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                                <div class="container  my-1" id="assignmentContainer" >
                                    <div class="accordion" id="assignmentAccordion" >
                                        <!-- Initial Accordion Item -->
                                        <div class="accordion-item assignmentaccordion-item" id="assignmentEntry1">
                                            <h2 class="accordion-header" id="assignmentHeading1" style="color: white">
                                                <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#assignmentCollapse1" aria-expanded="false" aria-controls="assignmentCollapse1">
                                                    Assignment Entry 1
                                                </button>
                                            </h2>
                                            <div id="assignmentCollapse1" class="collapse" aria-labelledby="assignmentHeading1">
                                                <div class="accordion-body">
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
                                                                        Floor <br> <input class="form-control" id="head_office_cell_no" name="incharge_floor[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>

                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Building <br> <input class="form-control" id="head_office_cell_no" name="incharge_build[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
                                                                        Block <br> <input class="form-control" id="head_office_cell_no" name="incharge_block[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>

                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Area <br> <input class="form-control" id="head_office_cell_no" name="incharge_area[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
                                                                        City <br> <input class="form-control" id="head_office_cell_no" name="incharge_city[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>

                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
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

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add More and Remove Buttons -->
                                    <div class="row my-3">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary" id="addAssignment" style="height:30px; width:170px;">Add More Assignment</button>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="updateAssignmentTable" style="height:30px; width:170px;">Save</button>
                                    </div>


                                </div>

                                <table class="table table-bordered mt-3" id="assignmentSummaryTable">
                                    <thead>
                                        <tr>
                                            <th>Entry</th>
                                            <th>Customer Name</th>
                                            <th>Task Assigning</th>
                                            <th>Designation</th>
                                            <th>View</th>

                                            <!-- Add more columns as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Summary data will be added here dynamically -->
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary saveButton" data-next-tab="#audit">Save and Next</button>
                            </div>
                            <!--Audits-->
                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="audit" role="tabpanel" aria-labelledby="nav-loto-tab">
                                <h5>Audit</h5>


                                <div class="container  my-1" id="auditContainer" >
                                    <div class="accordion" id="auditAccordion" >
                                        <!-- Initial Accordion Item -->
                                        <div class="accordion-item auditaccordion-item" id="auditEntry1">
                                            <h2 class="accordion-header" id="auditHeading1" style="color: white">
                                                <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#auditCollapse1" aria-expanded="false" aria-controls="auditCollapse1">
                                                    Audit Entry 1
                                                </button>
                                            </h2>
                                            <div id="auditCollapse1" class="collapse" aria-labelledby="auditHeading1">
                                                <div class="accordion-body">
                                                    <div class=" row main-content div" id="auditsInfo">

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

                                                            <div class="col-lg-5 spacing-left spacing-right form-group">
                                                                Checked by: <br>
                                                                <div class="input-group" style="width: 100%;">
                                                                    <select id="dropdown" class="form-control mt-1" name="audit_checked_by[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                        <option value=""></option>
                                                                        @foreach ($checkedby as $checked)
                                                                            <option value="{{ $checked->checkedby_name}}">{{ $checked->checkedby_name }}</option>
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

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add More and Remove Buttons -->
                                    <div class="row my-3">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary" id="addAudit" style="height:30px; width:150px;">Add More Audits</button>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="updateAuditTable" style="height:30px; width:170px;">Save</button>
                                    </div>


                                </div>

                                <table class="table table-bordered mt-3" id="auditSummaryTable">
                                    <thead>
                                        <tr>
                                            <th>Entry</th>
                                            <th>File Audited By</th>
                                            <th>Signature</th>
                                            <th>Checked By</th>
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
                            <!--Intelligence-->
                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="intelligence" role="tabpanel" aria-labelledby="nav-loto-tab">
                                <p>Please Collect information of other Business/Group of Customer.</p>
                                <h5>POC :</h5>


                                <div class="container  my-1" id="businessinfoContainer" >
                                    <div class="accordion" id="businessinfoAccordion" >
                                        <!-- Initial Accordion Item -->
                                        <div class="accordion-item businessinfoaccordion-item" id="businessinfoEntry1">
                                            <h2 class="accordion-header" id="businessinfoHeading1" style="color: white">
                                                <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#businessinfoCollapse1" aria-expanded="false" aria-controls="businessinfoCollapse1">
                                                    Business Info Entry 1
                                                </button>
                                            </h2>
                                            <div id="businessinfoCollapse1" class="collapse" aria-labelledby="businessinfoHeading1">
                                                <div class="accordion-body">
                                                    <div id="businessInfo">
                                                        <div class=" row main-content div">

                                                            <div class="col-lg-12">
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-4">Name<br> <input class="form-control" id="head_office_cell_no" name="cb_name[]" type="text" placeholder="..." style="width: 100%;"></div>
                                                                    <div class="col-lg-4">Designation<br> <input class="form-control" id="head_office_cell_no" name="cb_desig[]" type="text" placeholder="..." style="width: 100%;"></div>
                                                                    <div class="col-lg-4">Company Name<br> <input class="form-control" id="head_office_cell_no" name="cb_comp_name[]" type="text" placeholder="..." style="width: 100%;"></div>
                                                                    <div class="col-lg-4">Email<br> <input class="form-control" id="head_office_cell_no" name="cb_email[]" type="text" placeholder="..." style="width: 100%;"></div>
                                                                    <div class="col-lg-4">Contact Number<br> <input class="form-control" id="head_office_cell_no" name="cb_cno[]" type="text" placeholder="..." style="width: 100%;"></div>
                                                                    <div class="col-lg-6 spacing-right">
                                                                        Name of Business <br> <input class="form-control" id="head_office_name" name="bussiness_name[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-6 spacing-right">
                                                                        Nature of Business <br> <input class="form-control" id="head_office_name" name="bussiness_nature[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-6 spacing-left mt-3">
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

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add More and Remove Buttons -->
                                    <div class="row my-3">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary" id="addBusinessinfo" style="height:30px; width:200px;">Add More Business Info</button>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="updateBusinessinfoTable" style="height:30px; width:170px;">Save</button>
                                    </div>


                                </div>

                                <table class="table table-bordered mt-3" id="businessinfoSummaryTable">
                                    <thead>
                                        <tr>
                                            <th>Entry</th>
                                            <th>Name of Business</th>
                                            <th>Nature of Business</th>
                                            <th>Email</th>
                                            <th>View</th>

                                            <!-- Add more columns as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Summary data will be added here dynamically -->
                                    </tbody>
                                </table>

                                <h5 style="text-align:center;"><b><u>Promotional Activities</u></b></h5>


                                <div class="container  my-1" id="promactContainer" >
                                    <div class="accordion" id="promactAccordion" >
                                        <!-- Initial Accordion Item -->
                                        <div class="accordion-item promactaccordion-item" id="promactEntry1">
                                            <h2 class="accordion-header" id="promactHeading1" style="color: white">
                                                <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#promactCollapse1" aria-expanded="false" aria-controls="promactCollapse1">
                                                    Promotional Activity Entry 1
                                                </button>
                                            </h2>
                                            <div id="promactCollapse1" class="collapse" aria-labelledby="promactHeading1">
                                                <div class="accordion-body">
                                                    <div class="row" id="give_a_ways">

                                                        <div class="col-lg-6 spacing-right form-group">
                                                            Customer Details Entered in all Promotional Activities <br>
                                                        <div class="input-group" style="width: 100%;">
                                                            <select id="dropdown" class="form-control mt-1" name="promotional_act[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                <option value=""></option>
                                                                @foreach ($activities as $activity)
                                                                    <option value="{{ $activity->activity_name}}">{{ $activity->activity_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-append" style="width: 30%;">
                                                                <a href="{{ route('activities') }}">
                                                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
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

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add More and Remove Buttons -->
                                    <div class="row my-3">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary" id="addPromact" style="height:30px; width:200px;">Add More Promotional</button>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="updatePromactTable" style="height:30px; width:170px;">Save</button>

                                    </div>


                                </div>

                                <table class="table table-bordered mt-3" id="promactSummaryTable">
                                    <thead>
                                        <tr>
                                            <th>Entry</th>
                                            <th>Customer Details</th>
                                            <th>Quantity</th>
                                            <th>Estimated Price</th>
                                            <th>View</th>

                                            <!-- Add more columns as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Summary data will be added here dynamically -->
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary saveButton" data-next-tab="#verifications">Save and Next</button>
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
                                <button type="button" class="btn btn-primary saveButton" data-next-tab="#notes-details">Save and Next</button>
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

                                  {{-- /////////////////////   Feedback Accordion  \\\\\\\\\\\\\\\\\\\\\\\\\ --}}

                                    <div class="container  my-1" id="feedbackContainer" style="display:none;">
                                        <div class="accordion" id="feedbackAccordion" >
                                            <!-- Initial Accordion Item -->
                                            <div class="accordion-item feedbackaccordion-item" id="feedbackEntry1">
                                                <h2 class="accordion-header" id="feedbackHeading1" style="color: white">
                                                    <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#feedbackCollapse1" aria-expanded="false" aria-controls="feedbackCollapse1">
                                                        Feedback Entry 1
                                                    </button>
                                                </h2>
                                                <div id="feedbackCollapse1" class="collapse" aria-labelledby="feedbackHeading1">
                                                    <div class="accordion-body">
                                                        <div id="feedbackForm">
                                                            <div class="row">
                                                            <div class="col-lg-7">
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-11 spacing-right">
                                                                        Client Name: <br> <input class="form-control" id="client_name" name="feed_client_name[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-11 spacing-right">
                                                                        Client POC Name: <br> <input class="form-control" id="client_poc" name="feed_client_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-11 spacing-right">
                                                                        Email: <br> <input class="form-control vldemail" id="client_email" name="feed_client_email[]" type="email" placeholder="..." style="width: 100%;">
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
                                                                        Site ID: <br> <input class="form-control" id="client_site_id" name="feed_client_site_id[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-5">
                                                                    <div class="col-lg-11 spacing-left spacing-right">
                                                                        Designation: <br> <input class="form-control" id="desig" name="feed_desig[]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-11 spacing-left spacing-right">
                                                                        Cell: <br> <input class="form-control vldphone" id="client_cell" type="text" name="feed_cell[]" placeholder="..." style="width: 100%;">
                                                                        <div id="phoneError" class="phoneError" style="color: red"></div>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="col-lg-11">
                                                                <table class="table table-bordered" id="feedbackTable">
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
                                                                                        to 10):-
                                                                                        (10 = Entirely Satisfied , 8 = Satisfied, 6 =
                                                                                        Neutral, 2 = Unsatisfied, 0 = Entirely
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
                                                                            <td width="5%"><input type="radio" name="q1[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q1[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q1[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q1[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q1[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">2.Discipline, Behavior & Character
                                                                                of Guards</td>
                                                                            <td width="5%"><input type="radio" name="q2[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q2[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q2[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q2[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q2[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">3. Smart Turnout of the Guards
                                                                                (Uniform)</td>
                                                                            <td width="5%"><input type="radio" name="q3[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q3[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q3[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q3[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q3[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">4.Working Condition of Weapons &
                                                                                Security Equipments</td>
                                                                            <td width="5%"><input type="radio" name="q4[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q4[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q4[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q4[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q4[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">5. Our Abidance regarding Taxes
                                                                                (Income Tax & Sales Tax)</td>
                                                                            <td width="5%"><input type="radio" name="q5[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q5[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q5[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q5[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q5[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">6. Our Compliance wrt EOBI, Social
                                                                                Security & GLI of Guards</td>
                                                                            <td width="5%"><input type="radio" name="q6[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q6[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q6[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q6[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q6[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">7. Timely Provision of Invoices &
                                                                                Guards Payroll Management</td>
                                                                            <td width="5%"><input type="radio" name="q7[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q7[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q7[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q7[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q7[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">8. Level of Training of Guards</td>
                                                                            <td width="5%"><input type="radio" name="q8[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q8[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q8[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q8[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q8[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">9. Level of Supervisory Staff
                                                                                Visiting the Guards</td>
                                                                            <td width="5%"><input type="radio" name="q9[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q9[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q9[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q9[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q9[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">10. PIFFERS Mgmt Approach &
                                                                                Behavior towards Customer Service</td>
                                                                            <td width="5%"><input type="radio" name="q10[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q10[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q10[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q10[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q10[]" value="5"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div class="col-lg-4 spacing-right mb-3">
                                                                    Total Score: <br> <input class="form-control" name="total_score[]" id="totalScore" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
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
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Add More and Remove Buttons -->
                                        <div class="row my-3">
                                            <div class="col">
                                                <button type="button" class="btn btn-primary" id="addFeedback" style="height:30px; width:150px;">Add More Feedback</button>
                                            </div>
                                            <button type="button" class="btn btn-primary" id="updateFeedbackTable" style="height:30px; width:150px;">Save</button>
                                        </div>

                                        <table class="table table-bordered mt-3" id="feedbackSummaryTable">
                                            <thead>
                                                <tr>
                                                    <th>Entry</th>
                                                    <th>Client Name</th>
                                                    <th>Client ID</th>
                                                    <th>Client POC Name</th>
                                                    <th>View</th>

                                                    <!-- Add more columns as needed -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Summary data will be added here dynamically -->
                                            </tbody>
                                        </table>
                                        <div class="mt-5">
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

                                {{-- ///////////////   Complaint Accordion   \\\\\\\\\\\\\\\\\\\\\\\\ --}}
                                <div class="container  my-1" id="complaintContainer" style="display:none;">
                                    <div class="accordion" id="complaintAccordion" >
                                        <!-- Initial Accordion Item -->
                                        <div class="accordion-item complaintaccordion-item" id="complaintEntry1">
                                            <h2 class="accordion-header" id="complaintHeading1" style="color: white">
                                                <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#complaintCollapse1" aria-expanded="false" aria-controls="complaintCollapse1">
                                                    Complaint Entry 1
                                                </button>
                                            </h2>
                                            <div id="complaintCollapse1" class="collapse" aria-labelledby="complaintHeading1">
                                                <div class="accordion-body">
                                                    <div class="row" id="complaintForm" >

                                                        <div class="col-lg-12">
                                                            <div class="row mb-2">


                                                                <div class="col-lg-4 spacing-left spacing-right">
                                                                    Complaint Number <br> <input class="form-control" name="complaint_no[]" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <h5 class="mt-3">Guards Duty</h5>



                                                                <div class="col-lg-5 spacing-left spacing-right form-group">
                                                                    Guards Duty <br>
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <select id="dropdown" class="form-control mt-1" name="complaint_guards_duty[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                            <option value=""></option>
                                                                            @foreach ($duties as $duty)
                                                                                <option value="{{ $duty->duty_name}}">{{ $duty->duty_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <div class="input-group-append" style="width: 30%;">
                                                                            <a href="{{ route('duties') }}">
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
                                                                    <br>
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <select id="dropdown" class="form-control mt-1" name="wea_uni_equip[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                            <option value=""></option>
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
                                                                    <br>
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <select id="dropdown" class="form-control mt-1" name="finance_dept[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                            <option value=""></option>
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
                                                                    <br>
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <select id="dropdown" class="form-control mt-1" name="src_complaint[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                            <option value=""></option>
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
                                                                    <select id="dropdown" class="form-control mt-1" name="complaint_tagged[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                        <option value=""></option>
                                                                        @foreach ($complaintsto as $complaintto)
                                                                            <option value="{{ $complaintto->tagged_to_name}}">{{ $complaintto->tagged_to_name }}</option>
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
                                                                    <select id="dropdown" class="form-control mt-1" name="complaint_arressed[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                        <option value=""></option>
                                                                        @foreach ($complaintsby as $complaintby)
                                                                            <option value="{{ $complaintby->addressed_by_name}}">{{ $complaintby->addressed_by_name }}</option>
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
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add More and Remove Buttons -->
                                    <div class="row my-3">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary" id="addComplaint" style="height:30px; width:150px;">Add More Complaint</button>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="updateComplaintTable" style="height:30px; width:150px;">Save</button>
                                    </div>

                                    <table class="table table-bordered mt-3" id="complaintSummaryTable">
                                        <thead>
                                            <tr>
                                                <th>Entry</th>
                                                <th>Complaint No</th>
                                                <th>Complaint Tagged To</th>
                                                <th>Complaint Addressed By</th>
                                                <th>View</th>

                                                <!-- Add more columns as needed -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Summary data will be added here dynamically -->
                                        </tbody>
                                    </table>



                                    <div class="mt-5">
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


                                <div class="container  my-1" id="notificationContainer" style="display:none;">
                                    <div class="accordion" id="notificationAccordion" >
                                        <!-- Initial Accordion Item -->
                                        <div class="accordion-item notificationaccordion-item" id="notificationEntry1">
                                            <h2 class="accordion-header" id="notificationHeading1" style="color: white">
                                                <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#notificationCollapse1" aria-expanded="false" aria-controls="notificationCollapse1">
                                                    Notification Entry 1
                                                </button>
                                            </h2>
                                            <div id="notificationCollapse1" class="collapse" aria-labelledby="notificationHeading1">
                                                <div class="accordion-body">
                                                    <div class="col-lg-12 spacing-right" id="notificationForm">
                                                        <div class="row mb-2">
                                                            <div class="col-lg-3 spacing-right">
                                                                Notification No. <br> <input class="form-control" type="text" name="notification_no[]" placeholder="..." style="width: 100%;">
                                                            </div>
                                                                <div class="col-lg-5 spacing-left spacing-right form-group">
                                                                    Notification Related to : <br>
                                                                <div class="input-group" style="width: 100%;">
                                                                    <select id="dropdown" class="form-control mt-1" name="notification_related[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                        <option value=""></option>
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
                                                                <select id="dropdown" class="form-control mt-1" name="notification_shared[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                    <option value=""></option>
                                                                    @foreach ($notificationshared as $notificationshare)
                                                                        <option value="{{ $notificationshare->notification_shared_name}}">{{ $notificationshare->notification_shared_name }}</option>
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


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add More and Remove Buttons -->
                                    <div class="row my-3">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary" id="addNotification" style="height:30px; width:150px;">Add More Notification</button>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="updateNotificationTable" style="height:30px; width:150px;">Save</button>
                                    </div>

                                    <table class="table table-bordered mt-3" id="notificationSummaryTable">
                                        <thead>
                                            <tr>
                                                <th>Entry</th>
                                                <th>Notification No</th>
                                                <th>Notification Related To To</th>
                                                <th>Notification Shared With By</th>
                                                <th>View</th>

                                                <!-- Add more columns as needed -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Summary data will be added here dynamically -->
                                        </tbody>
                                    </table>

                                    <div class="mt-5">
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
                                        <div class="nav nav-tabs mt-3" id="nav-tab-inner" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-meeting-tab" data-toggle="tab" href="#meeting" role="tab" aria-controls="nav-meeting" aria-selected="true">Meetings with Customer</a>
                                            <a class="nav-item nav-link" id="nav-score-tab" data-toggle="tab" href="#score" role="tab" aria-controls="nav-score" aria-selected="false">Score Card</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">

                                            <!--sales-pipeline-->
                                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-pipeline" role="tabpanel" aria-labelledby="nav-contact-tab">


                                            </div>
                                            <!--Meeting with Customer-->
                                            <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="meeting" role="tabpanel" aria-labelledby="nav-meeting-tab">
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
                                                            {{-- <div class="col-lg-5 spacing-right">
                                                            Frequency of Meeting <br> <input class="form-control" id="head_office_cell_no" name="meeting_freq" type="text" placeholder="..." style="width: 100%;">
                                                            </div> --}}
                                                            <div class="col-lg-5 spacing-right">
                                                                Frequency of Meeting <br>
                                                                <select class="form-control" id="head_office_cell_no" name="meeting_freq" style="width: 100%;">
                                                                    <option value=""></option>
                                                                    <option value="Monthly">Monthly</option>
                                                                    <option value="Weekly">Weekly</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-5 spacing-left">
                                                                Picture of Building <br> <input class="form-control" id="head_office_cell_no" name="meeting_freq_attach" type="file" placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5  spacing-right">
                                                                Note <br> <textarea class="form-control" id="head_office_email" name="meeting_freq_note" type="text" placeholder="..." style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-lg-5 spacing-right" style="display: none">
                                                                Alert <br> <input class="form-control" id="head_office_cell_no" name="meeting_freq_alert" type="text" placeholder="meeting is pending" style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                                            Attachments <br> <input class="form-control" type="file" name="meeting_alert_attach" placeholder="..." style="width: 70%;" multiple>
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                                                            Notes <br>
                                                            <textarea id="w3review21" oninput="trimSpaces21()" onclick="moveCursorToStart21()" class="form-control"  name="meeting_alert_notes"  rows="2" cols="38">
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary saveButton" data-next-tab="#score">Save and Next</button>
                                            </div>
                                            <!--Score Card-->
                                            <div class="tab-pane fade m-3" style="opacity: 90%;" id="score" role="tabpanel" aria-labelledby="nav-meeting-tab">
                                          <div class="container my-1">
                                            <div class="accordion" id="scoreCardAccordion">
                                                <!-- Initial Guarantor Accordion -->
                                                <div class="accordion-item" id="scoreCardEntry1">
                                                    <h2 class="accordion-header" id="scoreCardHeading1">
                                                        <button class="accordion-button" type="button" data-toggle="collapse" data-target="#scoreCardCollapse1" aria-expanded="true" aria-controls="scoreCardCollapse1">
                                                            scoreCard 1
                                                        </button>
                                                    </h2>
                                                    <div id="scoreCardCollapse1" class="accordion-collapse collapse show" aria-labelledby="scoreCardHeading1" >
                                                        <div class="accordion-body">
                                                            <img src="/public/smart.png" alt="smart-turnout" style="position:relative; left:22%;" />
                                                            <div class="row ">
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
                                                                <div class="row mt-3">
                                                                    <h5 class="text-center">Score Card of Monthly Performance Report</h5>

                                                                    <div class="col-lg-11">

                                                                        <table class="table table-bordered">
                                                                            <thead>
                                                                                <tr width="100%">
                                                                                    <th width="5%">Sr</th>
                                                                                    <th width="20%">Category</th>
                                                                                    <th width="45%">Sub-Category</th>
                                                                                    <th width="15%">Marks</th>
                                                                                    <th width="15%">Marks Obtained</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                {{-- Row 1 --}}
                                                                                <tr width="100%">
                                                                                    <td width="5%" rowspan="4">1</td>
                                                                                    <td width="20%" rowspan="4">Screening & Hiring</td>
                                                                                    <td width="45%">Shared Complete Hiring Form</td>
                                                                                    <td width="15%">5</td>
                                                                                    <td width="15%"><input class="mark-input1" type="number" name="marks1_schf"/></td>
                                                                                </tr>
                                                                                <!-- Additional rows for the same sub-category -->
                                                                                <tr width="100%">
                                                                                    <td width="45%">Received & Shared Verifications</td>
                                                                                    <td width="15%">5</td>
                                                                                    <td width="15%"><input class="mark-input1" type="number" name="marks1_rsv"/></td>
                                                                                </tr>
                                                                                <tr width="100%">
                                                                                    <td width="45%">Received & Shared Guarantor Confirmation</td>
                                                                                    <td width="15%">5</td>
                                                                                    <td width="15%"><input class="mark-input1" type="number" name="marks1_rsgc"/></td>
                                                                                </tr>
                                                                                <tr width="100%">
                                                                                    <td width="45%">Compliance Detail</td>
                                                                                    <td width="15%">5</td>
                                                                                    <td width="15%"><input class="mark-input1" type="number" name="marks1_cd"/></td>
                                                                                </tr>
                                                                                <tr width="100%" style="background-color: #3e3432">
                                                                                    <td width="5%" ></td>
                                                                                    <td width="20%" ></td>
                                                                                    <td width="45%" style="color: white">Total Marks:</td>
                                                                                    <td width="15%" style="color: white">20</td>
                                                                                    <td width="15%" style="color: white"><input id="result1" type="number"  name="marks1_tm1"/></td>
                                                                                </tr>
                                                                                {{-- Row 2 --}}
                                                                                <tr width="100%">
                                                                                    <td width="5%" >2</td>
                                                                                    <td width="20%">Smart Turnout</td>
                                                                                    <td width="45%">Uniform Status</td>
                                                                                    <td width="15%">15</td>
                                                                                    <td width="15%"><input class="mark-input2" type="number" name="marks2_us"/></td>
                                                                                </tr>
                                                                                <tr width="100%"  style="background-color: #3e3432">
                                                                                    <td width="5%" ></td>
                                                                                    <td width="20%" ></td>
                                                                                    <td width="45%" style="color: white">Total Marks:</td>
                                                                                    <td width="15%" style="color: white">15</td>
                                                                                    <td width="15%" style="color: white"><input id="result2" type="number"  name="marks2_tm2"/></td>
                                                                                </tr>
                                                                                {{-- Row 3 --}}
                                                                                <tr width="100%">
                                                                                    <td width="5%" rowspan="2">3</td>
                                                                                    <td width="20%" rowspan="2">State of The Art Weapons</td>
                                                                                    <td width="45%">Weapons Functioning Details Shared</td>
                                                                                    <td width="15%">5</td>
                                                                                    <td width="15%"><input class="mark-input3" type="number" name="marks3_wfds"/></td>
                                                                                </tr>
                                                                                <tr width="100%">
                                                                                    <td width="45%">Amour Visited</td>
                                                                                    <td width="15%">5</td>
                                                                                    <td width="15%"><input class="mark-input3" type="number" name="marks3_av"/></td>
                                                                                </tr>
                                                                                <tr width="100%"  style="background-color:#3e3432">
                                                                                    <td width="5%" ></td>
                                                                                    <td width="20%" ></td>
                                                                                    <td width="45%" style="color: white">Total Marks:</td>
                                                                                    <td width="15%" style="color: white">10</td>
                                                                                    <td width="15%" style="color: white"><input id="result3" type="number" name="marks3_tm3"/></td>
                                                                                </tr>
                                                                                {{-- Row 4 --}}
                                                                                <tr width="100%">
                                                                                    <td width="5%" rowspan="2">4</td>
                                                                                    <td width="20%" rowspan="2">Periodical Trainings</td>
                                                                                    <td width="45%">Execution of Live Fire Arms Trainings</td>
                                                                                    <td width="15%">8</td>
                                                                                    <td width="15%"><input class="mark-input4" type="number" name="marks4_elfat"/></td>
                                                                                </tr>
                                                                                <tr width="100%">
                                                                                    <td width="45%">Availability of Training Hand Book with Guards</td>
                                                                                    <td width="15%">5</td>
                                                                                    <td width="15%"><input class="mark-input4" type="number" name="marks4_athb"/></td>
                                                                                </tr>
                                                                                <tr width="100%"  style="background-color: #3e3432">
                                                                                    <td width="5%" ></td>
                                                                                    <td width="20%" ></td>
                                                                                    <td width="45%" style="color: white">Total Marks:</td>
                                                                                    <td width="15%" style="color: white">13</td>
                                                                                    <td width="15%" style="color: white"><input id="result4" type="number" name="marks4_tm4"/></td>
                                                                                </tr>
                                                                                {{-- Row 5 --}}
                                                                                <tr width="100%">
                                                                                    <td width="5%" rowspan="3">5</td>
                                                                                    <td width="20%" rowspan="3">Overall Excellence</td>
                                                                                    <td width="45%">Attendance Percentage as per Contract</td>
                                                                                    <td width="15%">5</td>
                                                                                    <td width="15%"><input class="mark-input5" type="number" name="marks5_apapc"/></td>
                                                                                </tr>
                                                                                <tr width="100%">
                                                                                    <td width="45%">Guarding Service</td>
                                                                                    <td width="15%">5</td>
                                                                                    <td width="15%"><input class="mark-input5" type="number" name="marks5_gs"/></td>
                                                                                </tr>
                                                                                <tr width="100%">
                                                                                    <td width="45%">Finance (Invoices,Payroll,EOBI,Social Security,Sales Tax,Recovery Ledger)</td>
                                                                                    <td width="15%">5</td>
                                                                                    <td width="15%"><input class="mark-input5" type="number" name="marks5_finance"/></td>
                                                                                </tr>
                                                                                <tr width="100%"  style="background-color: #3e3432">
                                                                                    <td width="5%" ></td>
                                                                                    <td width="20%" ></td>
                                                                                    <td width="45%" style="color: white">Total Marks:</td>
                                                                                    <td width="15%" style="color: white">15</td>
                                                                                    <td width="15%" style="color: white"><input id="result5" type="number" name="marks5_tm5"/></td>
                                                                                </tr>
                                                                                {{-- Row 6 --}}
                                                                                <tr width="100%">
                                                                                    <td width="5%" >6</td>
                                                                                    <td width="20%" >Customer Care</td>
                                                                                    <td width="45%">Shared Feedback Form (Soft via Email, Hard Copy Sent with Invoices)</td>
                                                                                    <td width="15%">5</td>
                                                                                    <td width="15%"><input class="mark-input6" type="number" name="marks6_sff"/></td>
                                                                                </tr>
                                                                                <tr width="100%"  style="background-color: #3e3432 ">
                                                                                    <td width="5%" ></td>
                                                                                    <td width="20%" ></td>
                                                                                    <td width="45%" style="color: white">Total Marks:</td>
                                                                                    <td width="15%" style="color: white">5</td>
                                                                                    <td width="15%" style="color: white"><input id="result6" type="number" name="marks6_tm6"/></td>
                                                                                </tr>
                                                                                {{-- Row 7 --}}
                                                                                <tr width="100%">
                                                                                    <td width="5%" rowspan="6">7</td>
                                                                                    <td width="20%" rowspan="6">PIFFERS Hedonistic Approach</td>
                                                                                    <td width="45%">Monthly Visit of Top Management(GM/DGM/RM)</td>
                                                                                    <td width="15%">7</td>
                                                                                    <td width="15%"><input class="mark-input7" type="number" name="marks7_mvtm"/></td>
                                                                                </tr>
                                                                                <tr width="100%">
                                                                                    <td width="45%">Monthly Performance Report Submitted</td>
                                                                                    <td width="15%">5</td>
                                                                                    <td width="15%"><input class="mark-input7" type="number" name="marks7_mprs"/></td>
                                                                                </tr>
                                                                                <tr width="100%">
                                                                                    <td width="45%">Shared Record of Learning Management Systems (LMS)</td>
                                                                                    <td width="15%">2.5</td>
                                                                                    <td width="15%"><input class="mark-input7" type="number" name="marks7_srlms"/></td>
                                                                                </tr>
                                                                                <tr width="100%">
                                                                                    <td width="45%">Reporting of Incident(s) at Site</td>
                                                                                    <td width="15%">2.5</td>
                                                                                    <td width="15%"><input class="mark-input7" type="number" name="marks7_risite"/></td>
                                                                                </tr>
                                                                                <tr width="100%">
                                                                                    <td width="45%">Reporting of Incident(s) at Surroundings</td>
                                                                                    <td width="15%">2.5</td>
                                                                                    <td width="15%"><input class="mark-input7" type="number" name="marks7_risurr"/></td>
                                                                                </tr>
                                                                                <tr width="100%">
                                                                                    <td width="45%">Shared Details of Nearby LEAs</td>
                                                                                    <td width="15%">2.5</td>
                                                                                    <td width="15%"><input class="mark-input7" type="number" name="marks7_sdnl"/></td>
                                                                                </tr>
                                                                                <tr width="100%"  style="background-color: #3e3432">
                                                                                    <td width="5%" ></td>
                                                                                    <td width="20%" ></td>
                                                                                    <td width="45%" style="color: white">Total Marks:</td>
                                                                                    <td width="15%" style="color: white">22</td>
                                                                                    <td width="15%" style="color: white"><input id="result7" type="number" name="marks7_tm7"/></td>
                                                                                </tr>
                                                                                {{-- Grand Total Row --}}
                                                                                <tr width="100%"  style="background-color: #32444f">
                                                                                    <td width="5%" ></td>
                                                                                    <td width="20%" ></td>
                                                                                    <td width="45%" style="color: white">Grand Total:</td>
                                                                                    <td width="15%" style="color: white">100</td>
                                                                                    <td width="15%" style="color: white"><input id="grandTotal" type="number" name="marks_grand_total"/></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3">
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
                                                                        Cell <br> <input class="form-control vldphone" name="gm_cell" type="text" placeholder="..." style="width: 100%;">
                                                                        <div id="phoneError" class="phoneError" style="color: red"></div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Add More and Save Buttons -->
                                            <div class="row my-3">
                                                <div class="col">
                                                    <button type="button" class="btn btn-primary" id="addscoreCardAccordion">Add new scoreCard</button>
                                                </div>
                                                <button type="button" class="btn btn-primary" id="savescoreCardEntries">Save</button>
                                            </div>

                                                <!-- scoreCard Summary Table -->
                                            <div class="table-responsive">
                                                    <table class="table table-bordered mt-1 " id="scoreCardSummaryTable">
                                                 <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Employee Name</th>
                                                        <th>Designation</th>
                                                        <th>Department</th>
                                                        <th>Salary Details</th>
                                                        <th>Attendance Records</th>
                                                        <th>Leave Records</th>
                                                    </tr>
                                                </thead>

                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                            </div>

                                        </div>


                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary saveButton" data-next-tab="#intelligence">Save and Next</button>
                            </div>
                        </div>
                        <div class="footer" style="position: fixed; bottom: 0; width: 100%; background-color: #320056; padding: 10px; display: flex; justify-content: space-between; align-items: center;">
                            <button type="button" name="cancel" class="btn btn-secondary" style="color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 80px;"><i>Cancel</i></button>
                            <div style="display: flex; align-items: center;">
                                <img src="logo.png" alt="Logo" style="height: 30px; margin-right: 10px;">
                                <h4 style="color: #fff; margin: 0; font-size: 14px;"><i>PIFFERS SECURITY SERVICES</i></h4>
                            </div>
                            <div class="dropdown" style="position: relative; display: inline-block;">
                                <button type="button" class="btn btn-primary" style="background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 150px;"><i style="margin-right:30px;">Submission  &#8594;</i></button>
                                <div class="dropdown-content" style="display: none; position: absolute; background-color: #f9f9f9; min-width: 130px; box-shadow: 0px -8px 16px 0px rgba(0,0,0,0.2); z-index: 1; bottom: 100%;">
                                    <button type="submit" name="save_and_email" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & Email/Whatsapp</i></button>
                                    <button type="submit" name="save_and_share" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & share link</i></button>
                                    <button type="submit" name="save_and_new" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & New</i></button>
                                    <button type="submit" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & Close</i></button>
                                </div>
                            </div>
                        </div>
                    </form>

                </section>

            <!-- </div> -->

        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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

<!-- Add this script tag before your custom script -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.getElementById("activeEmailRadio").addEventListener("click", function() {
        openCustomModal();
    });

    function openCustomModal() {
        document.getElementById("customModal").style.display = "block";

        const region = document.getElementById("customers_region").value;

        const emailBody = `
            Dear ${document.querySelector('input[name="customers_name"]').value},
            Greetings from PIFFERS!
            Hope you are doing well. It is submitted that, Supervisor ${document.querySelector('input[name="visit_perf_by"]').value} Visited ${document.querySelector('input[name="pat_super_loc"]').value} On ${document.querySelector('input[name="pat_super_date"]').value} on ${document.querySelector('input[name="pat_super_day"]').value}

            The Photos and videos of the visit are attached here for your reference
            Moreover, please feel free to contact us whenever you think we can be of any assistance.

            Thank You

            Best Regards

            Operation Department
            ${region}
            PIFFERS Security Services (Pvt.) Ltd.
        `;

        document.getElementById("customEmailBody").value = emailBody;

        const email = document.getElementById("email").value;
    }

    document.getElementById("confirm-send-email").addEventListener("click", function() {
        var emailSubject = document.getElementById("customEmailSubject").value;
        var emailBody = document.getElementById("customEmailBody").value;
        var recipientEmail = document.getElementById("recipientEmail").value;
        var ccEmail = document.getElementById("ccEmail").value;
        var bccEmail = document.getElementById("bccEmail").value;

        var attachmentFiles = document.getElementById("customEmailAttachment").files;
        var formData = new FormData();
        formData.append('subject', emailSubject);
        formData.append('body', emailBody);
        formData.append('recipientEmail', recipientEmail);
        formData.append('ccEmail', ccEmail);
        formData.append('bccEmail', bccEmail);

        for (var i = 0; i < attachmentFiles.length; i++) {
            formData.append('attachments[]', attachmentFiles[i]);
        }

        axios.post('/public/send-report-email', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        })
        .then(response => {
            if (response.data.status === 'success') {
                alert('Email sent successfully.');
            } else {
                alert('Failed to send email.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error occurred while sending email.');
        });

        document.getElementById("customModal").style.display = "none";
    });


    document.getElementById("cancel-send-email").addEventListener("click", function() {
        document.getElementById("customModal").style.display = "none";
    });

    document.getElementById("closeCustomModal").addEventListener("click", function() {
        document.getElementById("customModal").style.display = "none";
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        var successMessage = '{{ session("success") }}';
        var customerId = '{{ session("customerId") }}';

        if (successMessage && customerId) {
            var url = '{{ route("viewcustomer", ":id") }}';
            url = url.replace(':id', customerId);
            var popupMessage = 'Customer data stored successfully. Please find the URL below:';

            document.getElementById('popupMessage').innerText = popupMessage;

            document.getElementById('urlInput').value = url;

            var modal = document.getElementById('myModal');
            modal.style.display = "block";

            var closeBtn = document.getElementsByClassName("close")[0];
            closeBtn.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
    });
</script>

<script>
    document.getElementById("copyIcon").addEventListener("click", function() {
        var urlInput = document.getElementById("urlInput");
        urlInput.select();
        document.execCommand("copy");
        document.getElementById("copyText").textContent = "Link copied!";
    });

</script>


<script>
    $(document).ready(function() {
        var saveButtonClicked = false;

        $('#validateBtn').click(function() {
            console.log("Button clicked!");
            saveButtonClicked = true;

            var isValid = true;

            // Your validation logic here
            $('#customers_id').each(function() {
                var trimmedValue = $.trim($(this).val());
                console.log(trimmedValue);
                if (trimmedValue === '') {
                    isValid = false;
                    return false;
                }
            });

            if (isValid) {
                $('#validationMessage').removeClass('text-danger').addClass('text-success').html('<strong>Success : Mandatory fields are valid and Saved..!</strong>');
                enableTab();
            } else {
                $('#validationMessage').removeClass('text-success').addClass('text-danger').html('<strong>Customer ID is required required to access below tabs..!</strong>');
                disableTab();
            }
        });

        // Function to enable the tab if save button is clicked and all fields are valid
        function enableTab() {
            if (saveButtonClicked) {
                $('#nav-contact-tab').removeClass('disabled');
                $('#nav-contact-tab').attr('data-toggle', 'tab');
            }
        }

        // Function to disable the tab if any field is invalid or save button is not clicked
        function disableTab() {
            $('#nav-contact-tab').addClass('disabled');
            $('#nav-contact-tab').removeAttr('data-toggle');
        }
    });
</script>



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
                                                Visiting Card (front) <br> <input class="form-control" name="dept_front[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6  spacing-right">
                                                Visiting Card (back) <br> <input class="form-control" name="dept_back[]" type="file" placeholder="..." style="width: 100%;">
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
                                                Floor <br> <input class="form-control" name="dept_floor[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Building <br> <input class="form-control" name="dept_build[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Block <br> <input class="form-control" name="dept_block[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Area <br> <input class="form-control" name="dept_area[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                City <br> <input class="form-control" name="dept_city[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5 spacing-right">
                                                Photograph of building <br> <input class="form-control" name="dept_photo[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Pin Location <br> <input id="location-input7" class="form-control" name="dept_pin[]" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete7()">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 spacing-right">
                                                Attachments <br> <input class="form-control" name="dept_ex_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                                                </div>
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
                                                                    @foreach ($emerser as $emerse)
                                                                        <option value="{{ $emerse->emerser_name}}">{{ $emerse->emerser_name }}</option>
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
                                                    Floor <br> <input class="form-control" id="head_office_cell_no" name="emer_floor[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Building <br> <input class="form-control" id="head_office_cell_no" name="emer_building[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left">
                                    Block <br> <input class="form-control" id="head_office_cell_no" name="emer_block[]" type="text" placeholder="..." style="width: 100%;">
                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Area <br> <input class="form-control" id="head_office_cell_no" name="emer_area[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left">
                                    City <br> <input class="form-control" id="head_office_cell_no" name="emer_city[]" type="text" placeholder="..." style="width: 100%;">
                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Photograph of Building <br> <input class="form-control" id="head_office_cell_no" name="emer_loc[]" type="file" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left">
                                    Email <br> <input class="form-control " id="" name="emer_email[]" type="text" placeholder="..." style="width: 100%;">

                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Website <br> <input class="form-control " id="" name="emer_web[]" type="text" placeholder="..." style="width: 100%;">

                                </div>
                                <div class="col-lg-5 spacing-left">
                                    Pin location <br> <input class="form-control" id="location-input6" name="emer_pin[]" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete6()">
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
                        Casualities <br> <input class="form-control" name="casual[]" type="text" placeholder="..." style="width: 115%;"">
                    </div>

                    <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 30px;">
                        Injuired <br> <input class="form-control" name="injuired[]" type="text" placeholder="..." style="width: 101%;">
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

        <div class="row" >

                                   <div class="col-lg-12">
                                       <div class="row mb-2">


                                           <div class="col-lg-4 spacing-left spacing-right">
                                               Complaint Number <br> <input class="form-control" name="complaint_no[]" type="text" placeholder="..." style="width: 100%;">
                                           </div>
                                           <h5 class="mt-3">Guards Duty</h5>



                                           <div class="col-lg-5 spacing-left spacing-right form-group">
                                               Guards Duty <br>
                                               <div class="input-group" style="width: 100%;">
                                                   <select id="dropdown" class="form-control mt-1" name="complaint_guards_duty[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                       <option value=""></option>
                                                       @foreach ($duties as $duty)
                                                           <option value="{{ $duty->duty_name}}">{{ $duty->duty_name }}</option>
                                                       @endforeach
                                                   </select>
                                                   <div class="input-group-append" style="width: 30%;">
                                                       <a href="{{ route('duties') }}">
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
                                               <br>
                                               <div class="input-group" style="width: 100%;">
                                                   <select id="dropdown" class="form-control mt-1" name="wea_uni_equip[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                       <option value=""></option>
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
                                               <br>
                                               <div class="input-group" style="width: 100%;">
                                                   <select id="dropdown" class="form-control mt-1" name="finance_dept[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                       <option value=""></option>
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
                                               <br>
                                               <div class="input-group" style="width: 100%;">
                                                   <select id="dropdown" class="form-control mt-1" name="src_complaint[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                       <option value=""></option>
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
                                               <select id="dropdown" class="form-control mt-1" name="complaint_tagged[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                   <option value=""></option>
                                                   @foreach ($complaintsto as $complaintto)
                                                       <option value="{{ $complaintto->tagged_to_name}}">{{ $complaintto->tagged_to_name }}</option>
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
                                               <select id="dropdown" class="form-control mt-1" name="complaint_arressed[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                   <option value=""></option>
                                                   @foreach ($complaintsby as $complaintby)
                                                       <option value="{{ $complaintby->addressed_by_name}}">{{ $complaintby->addressed_by_name }}</option>
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
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                                                Notification Related to : <br>
                                            <div class="input-group" style="width: 100%;">
                                                <select id="dropdown" class="form-control mt-1" name="notification_related[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                    <option value=""></option>
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
                                            <select id="dropdown" class="form-control mt-1" name="notification_shared[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value=""></option>
                                                @foreach ($notificationshared as $notificationshare)
                                                    <option value="{{ $notificationshare->notification_shared_name}}">{{ $notificationshare->notification_shared_name }}</option>
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
                                                    Floor <br> <input class="form-control" id="head_office_cell_no" name="incharge_floor[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Building <br> <input class="form-control" id="head_office_cell_no" name="incharge_build[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Block <br> <input class="form-control" id="head_office_cell_no" name="incharge_block[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Area <br> <input class="form-control" id="head_office_cell_no" name="incharge_area[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    City <br> <input class="form-control" id="head_office_cell_no" name="incharge_city[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
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
                    <div class="col-lg-5 spacing-left spacing-right form-group">
                                            Checked by: <br>
                                            <div class="input-group" style="width: 100%;">
                                                <select id="dropdown" class="form-control mt-1" name="audit_checked_by[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                    <option value=""></option>
                                                    @foreach ($checkedby as $checked)
                                                        <option value="{{ $checked->checkedby_name}}">{{ $checked->checkedby_name }}</option>
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
                                        <select id="dropdown" class="form-control mt-1" name="promotional_act[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                            <option value=""></option>
                                            @foreach ($activities as $activity)
                                                <option value="{{ $activity->activity_name}}">{{ $activity->activity_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append" style="width: 30%;">
                                            <a href="{{ route('activities') }}">
                                                <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
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
    const feedbackForm = document.getElementById("feedbackContainer");

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
    const complaintForm = document.getElementById("complaintContainer");

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
    const notificationForm = document.getElementById("notificationContainer");

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
    const inspectionDiv = document.getElementById("inspectionContainer");

    addInspectionButton.addEventListener("click", () => {
        inspectionDiv.style.display = "block"; // Show the inspection form
    });

    removeInspectionButton.addEventListener("click", () => {
        inspectionDiv.style.display = "none"; // Hide the inspection form
    });
</script>

<script>
    const approved_commercials = document.getElementById('approved_commercials');
    const hiddenElements = document.querySelectorAll('.hidden-content');

    approved_commercials.addEventListener('click', function () {

        hiddenElements.forEach(element => {
            if (this.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        });
    });
</script>

<script>
    const quick_box = document.getElementById('quick_box');
    const hiddenElements1 = document.querySelectorAll('.hidden-content1');

    quick_box.addEventListener('click', function () {

        hiddenElements1.forEach(element => {
            if (this.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        });
    });
</script>
<script>
    const myCheck1 = document.getElementById('myCheck1');
    const hiddenElements2 = document.querySelectorAll('.hidden_content2');

    myCheck1.addEventListener('click', function () {

        hiddenElements2.forEach(element => {
            if (this.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        });
    });
</script>
<script>
    const myCheck2 = document.getElementById('myCheck2');
    const hiddenElements3 = document.querySelectorAll('.hidden_content3');

    myCheck2.addEventListener('click', function () {

        hiddenElements3.forEach(element => {
            if (this.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        });
    });
</script>
<script>
    const myCheck3 = document.getElementById('myCheck3');
    const hiddenElements4 = document.querySelectorAll('.hidden_content4');

    myCheck3.addEventListener('click', function () {

        hiddenElements4.forEach(element => {
            if (this.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        });
    });
</script>
<script>
    const myCheck4 = document.getElementById('myCheck4');
    const hiddenElements5 = document.querySelectorAll('.hidden_content5');

    myCheck4.addEventListener('click', function () {

        hiddenElements5.forEach(element => {
            if (this.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        });
    });
</script>
<script>
    const myCheck5 = document.getElementById('myCheck5');
    const hiddenElements6 = document.querySelectorAll('.hidden_content6');

    myCheck5.addEventListener('click', function () {

        hiddenElements6.forEach(element => {
            if (this.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        });
    });
</script>
<script>
    const myCheck6 = document.getElementById('myCheck6');
    const hiddenElements7 = document.querySelectorAll('.hidden_content7');

    myCheck6.addEventListener('click', function () {

        hiddenElements7.forEach(element => {
            if (this.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        });
    });
</script>
<script>
    const myCheck7 = document.getElementById('myCheck7');
    const hiddenElements8 = document.querySelectorAll('.hidden_content8');

    myCheck7.addEventListener('click', function () {

        hiddenElements8.forEach(element => {
            if (this.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        });
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
    function updateClientPoc(value) {
        document.getElementById('client_poc').value = value;
    }
</script>

<script>
    function updateClientSiteID(value) {
        document.getElementById('client_site_id').value = value;
    }
</script>

<script>
    function updateClientDesig(value) {
        document.getElementById('desig').value = value;
    }
</script>

<script>
    function updateClientEmail(value) {
        document.getElementById('client_email').value = value;
    }
</script>

<script>
    function updateClientPhone(value) {
        document.getElementById('client_cell').value = value;
    }
</script>

<script>
    $(document).ready(function() {
      function updateResultField() {
        var field1Value = $('#customers_id').val();
        var field2Value = $('#customers_name').val();
        var field3Value = $('#city_of_deployment').val();
        var field4Value = $('#customers_suffix').val();

        var resultValue = field1Value + '-' +' '+ field2Value+' '+field4Value+' '+'('+field3Value+')';

        $('#d_name').val(resultValue);
      }

      $('#customers_id, #customers_name,#customers_suffix,#city_of_deployment').on('input', function() {
        updateResultField();
      });
    });
  </script>



<script>
    function validateEmail() {
        var emailInputs = document.getElementsByClassName('vldemail');
        var emailErrors = document.getElementsByClassName('emailError');

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


        for (var i = 0; i < emailInputs.length; i++) {
            var emailInput = emailInputs[i];
            var emailError = emailErrors[i];

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
    function initAutocomplete6() {
        var input = document.getElementById('location-input6');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('latitude6').value = place.geometry.location.lat();
            document.getElementById('longitude6').value = place.geometry.location.lng();
        });
    }
</script>

<script>
    function initAutocomplete7() {
        var input = document.getElementById('location-input7');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('latitude7').value = place.geometry.location.lat();
            document.getElementById('longitude7').value = place.geometry.location.lng();
        });
    }
</script>


<script>
    google.maps.event.addDomListener(window, 'load', initAutocomplete);
</script>



  {{-- Script for Sub Customers: When user selects a customer in sub-customer, its data of mandatory fields is collected and entered into the fields of current --}}
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


        subCustomerSelect.addEventListener('change', function () {
            // Check if a customer is selected
            if (subCustomerSelect.value !== '') {
                // Fetch the selected customer's information
                var customerId = subCustomerSelect.value.split(' ')[0]; // Assuming the format is "id - name"
                fetchCustomerInfo(customerId);
            }
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

                // Clear all input fields when the select is disabled
                clearInputFields();
            }
        }

        function fetchCustomerInfo(customerId) {
            // Make an AJAX request to fetch the customer information
            var url = '/getcustomer/' + customerId;

            // Make an AJAX request
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Update the input fields with the fetched data only if they are empty
                    updateIfEmpty('customers_id', data.customers_id);
                    updateIfEmpty('customers_name', data.customers_name);
                    updateIfEmpty('customers_suffix', data.customers_suffix);
                    updateIfEmpty('city_of_deployment', data.city_of_deployment);
                    updateIfEmpty('customers_region', data.customers_region);
                    updateIfEmpty('d_name', data.display_name_as);
                    updateIfEmpty('nature_of_business', data.nature_of_business);
                    updateIfEmpty('website', data.website);
                    updateIfEmpty('phone', data.phone);
                    updateIfEmpty('email', data.email);

                    // Update other fields accordingly
                })
                .catch(error => console.error('Error:', error));
        }

        function updateIfEmpty(fieldId, value) {
            var field = document.getElementById(fieldId);
            // Check if the field is empty before updating
            if (field.value.trim() === '') {
                field.value = value;
            }
        }

        function clearInputFields() {
            // Clear all input fields
            document.getElementById('customers_id').value = '';
            document.getElementById('customers_name').value = '';
            document.getElementById('customers_suffix').value = '';
            document.getElementById('city_of_deployment').value = '';
            document.getElementById('customers_region').value = '';
            document.getElementById('d_name').value = '';
            document.getElementById('nature_of_business').value = '';
            document.getElementById('website').value = '';
            document.getElementById('phone').value = '';
            document.getElementById('email').value = '';

            // Clear other fields accordingly
        }
    });
</script>


{{-- // ManPower Accordian  --}}

<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addManpower').on('click', function () {
            var ManpowerAccordionCount = $('#manpowerAccordion .manaccordion-item').length + 1;

            var newManAccordion = `
                <div class="accordion-item manaccordion-item" id="manpowerEntry${ManpowerAccordionCount}">
                    <h2 class="accordion-header" id="manpowerHeading${ManpowerAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#manpowerCollapse${ManpowerAccordionCount}" aria-expanded="false" aria-controls="manpowerCollapse${ManpowerAccordionCount}">
                            Manpower Entry ${ManpowerAccordionCount}
                        </button>
                    </h2>
                    <div id="manpowerCollapse${ManpowerAccordionCount}" class="collapse" aria-labelledby="manpowerHeading${ManpowerAccordionCount}">
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
                        <button class="btn btn-danger btn-sm removeManAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#manpowerAccordion').append(newManAccordion);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeManAccordion', function () {
            $(this).closest('.manaccordion-item').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update summary table for manpower entries
        function updateManpowerSummaryTable() {
            // Clear existing rows
            $('#manpowerSummaryTable tbody').empty();

            // Iterate through each manpower accordion item and update the summary table
            $('.manaccordion-item').each(function (index) {
                var guardPost = $(this).find('[name="man_post[]"]').val();
                var category = $(this).find('[name="man_cat[]"]').val();
                var uniformType = $(this).find('[name="man_uni[]"]').val();
                var weaponType = $(this).find('[name="man_weapon[]"]').val();

                // Check if any relevant data is entered
                if (guardPost || category || uniformType || weaponType) {
                    // Add a new row to the summary table
                    $('#manpowerSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${guardPost}</td>
                            <td>${category}</td>
                            <td>${uniformType}</td>
                            <td>${weaponType}</td>
                            <td><button type="button" class="btn btn-primary view-manpower-button" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Manpower Button Click Event
        $('#addManpower').on('click', function () {
            var manpowerEntryCount = $('#manpowerAccordion .manaccordion-item').length + 1;

            var newManpowerEntry = `
                <!-- Your existing manpower accordion HTML goes here -->
            `;
            console.log('Adding manpower entry:', manpowerEntryCount);
            $('#manpowerAccordion').append(newManpowerEntry);
        });

        // Update Manpower Table Button Click Event
        $('#updateManpowerTable').on('click', function () {
            // Update the manpower summary table
            updateManpowerSummaryTable();
        });

        // View Manpower Button Click Event
        $(document).on('click', '.view-manpower-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.manaccordion-item').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Manpower Entry Button Click Event
        $(document).on('click', '.removeManpowerAccordion', function () {
            $(this).closest('.manaccordion-item').remove();
            // Update the manpower summary table
            updateManpowerSummaryTable();
        });

        // Prevent the default behavior of the Add More Manpower button
        $('#addManpower').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

{{-- signatory accordion --}}

<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addSignatory').on('click', function () {
            var SignatoryAccordionCount = $('#signatoryAccordion .signaccordion-item').length + 1;

            var newSignAccordion = `
                <div class="accordion-item signaccordion-item" id="signatoryEntry${SignatoryAccordionCount}">
                    <h2 class="accordion-header" id="signatoryHeading${SignatoryAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse${SignatoryAccordionCount}" aria-expanded="false" aria-controls="signatoryCollapse${SignatoryAccordionCount}">
                            Signatory Entry ${SignatoryAccordionCount}
                        </button>
                    </h2>
                    <div id="signatoryCollapse${SignatoryAccordionCount}" class="collapse" aria-labelledby="signatoryHeading${SignatoryAccordionCount}">
                        <div class="accordion-body">
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
                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeSignAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion').append(newSignAccordion);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion', function () {
            $(this).closest('.signaccordion-item').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update summary table for signatory entries
        function updateSignatorySummaryTable() {
            // Clear existing rows
            $('#signatorySummaryTable tbody').empty();

            // Iterate through each signatory accordion item and update the summary table
            $('.signaccordion-item').each(function (index) {
                var signName = $(this).find('[name="sign_name[]"]').val();
                var signDesig = $(this).find('[name="sign_desig[]"]').val();

                // Check if any relevant data is entered
                if (signName || signDesig) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${signName}</td>
                            <td>${signDesig}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory').on('click', function () {
            var signatoryEntryCount = $('#signatoryAccordion .signaccordion-item').length + 1;

            var newSignatoryEntry = `
                <!-- Your existing signatory accordion HTML goes here -->
            `;
            console.log('Adding signatory entry:', signatoryEntryCount);
            $('#signatoryAccordion').append(newSignatoryEntry);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable').on('click', function () {
            // Update the signatory summary table
            updateSignatorySummaryTable();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function () {
            $(this).closest('.signaccordion-item').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>


    {{-- Salary Accordion  --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addSalary').on('click', function () {
            var SalaryAccordionCount = $('#salaryAccordion .salaryaccordion-item').length + 1;

            var newSalaryAccordion = `
                <div class="accordion-item salaryaccordion-item" id="salaryEntry${SalaryAccordionCount}">
                    <h2 class="accordion-header" id="salaryHeading${SalaryAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#salaryCollapse${SalaryAccordionCount}" aria-expanded="false" aria-controls="salaryCollapse${SalaryAccordionCount}">
                            Salary Entry ${SalaryAccordionCount}
                        </button>
                    </h2>
                    <div id="salaryCollapse${SalaryAccordionCount}" class="collapse" aria-labelledby="salaryHeading${SalaryAccordionCount}">
                        <div class="accordion-body">
                            <div class=" row main-content div" id="salaryContainer">
                                                        <div class="col-lg-12">
                                                            <div class="row mb-2">

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
                                                                    Salary <br> <input class="form-control" id="head_office_email" name="sal_cat[]" type="text" placeholder="..." style="width: 100%;">
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

                                                    </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeSalaryAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#salaryAccordion').append(newSalaryAccordion);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSalaryAccordion', function () {
            $(this).closest('.salaryaccordion-item').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update summary table for salary entries
        function updateSalarySummaryTable() {
            // Clear existing rows
            $('#salarySummaryTable tbody').empty();

            // Iterate through each salary accordion item and update the summary table
            $('.salaryaccordion-item').each(function (index) {
                var category = $(this).find('[name="cat_name[]"]').val();
                var salary = $(this).find('[name="sal_cat[]"]').val();
                var leavesAllowed = $(this).find('[name="leaves_a[]"]').val();

                // Check if any relevant data is entered
                if (category || salary || leavesAllowed) {
                    // Add a new row to the summary table
                    $('#salarySummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${category}</td>
                            <td>${salary}</td>
                            <td>${leavesAllowed}</td>
                            <td><button type="button" class="btn btn-primary view-salary-button" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Salary Button Click Event
        $('#addSalary').on('click', function () {
            var salaryEntryCount = $('#salaryAccordion .salaryaccordion-item').length + 1;

            var newSalaryEntry = `
                <!-- Your existing salary accordion HTML goes here -->
            `;
            console.log('Adding salary entry:', salaryEntryCount);
            $('#salaryAccordion').append(newSalaryEntry);
        });

        // Update Salary Table Button Click Event
        $('#updateSalaryTable').on('click', function () {
            // Update the salary summary table
            updateSalarySummaryTable();
        });

        // View Salary Button Click Event
        $(document).on('click', '.view-salary-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.salaryaccordion-item').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Salary Entry Button Click Event
        $(document).on('click', '.removeSalaryAccordion', function () {
            $(this).closest('.salaryaccordion-item').remove();
            // Update the salary summary table
            updateSalarySummaryTable();
        });

        // Prevent the default behavior of the Add More Salary button
        $('#addSalary').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>




   {{-- Emergency Accordion --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addEmergency').on('click', function () {
            var EmergencyAccordionCount = $('#emergencyAccordion .emergencyaccordion-item').length + 1;

            var newEmergencyAccordion = `
                <div class="accordion-item emergencyaccordion-item" id="emergencyEntry${EmergencyAccordionCount}">
                    <h2 class="accordion-header" id="emergencyHeading${EmergencyAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#emergencyCollapse${EmergencyAccordionCount}" aria-expanded="false" aria-controls="emergencyCollapse${EmergencyAccordionCount}">
                            Emergency Entry ${EmergencyAccordionCount}
                        </button>
                    </h2>
                    <div id="emergencyCollapse${EmergencyAccordionCount}" class="collapse" aria-labelledby="emergencyHeading${EmergencyAccordionCount}">
                        <div class="accordion-body">
                            <div class="row" id="emergencyServices_add_fields">
                                    <div class=" row main-content div">
                                        <div class="col-lg-6">
                                            <div class="row mb-2">

                                                <div class="col-lg-6 spacing-left spacing-right form-group">
                                                    Emergency Services <br>
                                                    <div class="input-group" style="width: 100%;">
                                                        <select id="dropdown" class="form-control mt-1" name="emer_ser[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                            <option value=""></option>
                                                            @foreach ($emerser as $emerse)
                                                                <option value="{{ $emerse->emerser_name}}">{{ $emerse->emerser_name }}</option>
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
                                                    Floor <br> <input class="form-control" id="head_office_cell_no" name="emer_floor[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Building <br> <input class="form-control" id="head_office_cell_no" name="emer_building[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Block <br> <input class="form-control" id="head_office_cell_no" name="emer_block[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Area <br> <input class="form-control" id="head_office_cell_no" name="emer_area[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    City <br> <input class="form-control" id="head_office_cell_no" name="emer_city[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Photograph of Building <br> <input class="form-control" id="head_office_cell_no" name="emer_loc[]" type="file" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Email <br> <input class="form-control vldemail" id="" name="emer_email[]" type="text" placeholder="..." style="width: 100%;">
                                                    <div  class="emailError" style="color: red"></div>
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Website <br> <input class="form-control vldwebsite" id="" name="emer_web[]" type="text" placeholder="..." style="width: 100%;">
                                                    <div id="websiteError" class="websiteError" style="color: red"></div>
                                                </div>
                                                <div class="col-lg-5 spacing-left">
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
                var emerSer = $(this).find('[name="emer_ser[]"]').val();
                var emerPOCName = $(this).find('[name="emer_poc_name[]"]').val();
                var emerPOCDesig = $(this).find('[name="emer_poc_desig[]"]').val();
                var emerPOCCell = $(this).find('[name="emer_poc_cell[]"]').val();

                // Check if any relevant data is entered
                if (emerSer || emerPOCName || emerPOCDesig || emerPOCCell) {
                    // Add a new row to the summary table
                    $('#emergencySummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${emerSer}</td>
                            <td>${emerPOCName}</td>
                            <td>${emerPOCDesig}</td>
                            <td>${emerPOCCell}</td>
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

   {{-- Department Accordion   --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addDepartment').on('click', function () {
            var DepartmentAccordionCount = $('#departmentAccordion .departmentaccordion-item').length + 1;

            var newDepartmentAccordion = `
                <div class="accordion-item departmentaccordion-item" id="departmentEntry${DepartmentAccordionCount}">
                    <h2 class="accordion-header" id="departmentHeading${DepartmentAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#departmentCollapse${DepartmentAccordionCount}" aria-expanded="false" aria-controls="departmentCollapse${DepartmentAccordionCount}">
                            Department Entry ${DepartmentAccordionCount}
                        </button>
                    </h2>
                    <div id="departmentCollapse${DepartmentAccordionCount}" class="collapse" aria-labelledby="departmentHeading${DepartmentAccordionCount}">
                        <div class="accordion-body">
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
                                               Visiting Card (front) <br> <input class="form-control" name="dept_front[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6  spacing-right">
                                                Visiting Card (back) <br> <input class="form-control" name="dept_back[]" type="file" placeholder="..." style="width: 100%;">
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
                                                Floor <br> <input class="form-control" name="dept_floor[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Building <br> <input class="form-control" name="dept_build[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Block <br> <input class="form-control" name="dept_block[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Area <br> <input class="form-control" name="dept_area[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                City <br> <input class="form-control" name="dept_city[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5 spacing-right">
                                                Photograph of building <br> <input class="form-control" name="dept_photo[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Pin Location <br> <input id="location-input3" class="form-control" name="dept_pin[]" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete3()">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 spacing-right ">
                                                Attachments <br> <input class="form-control" name="dept_ex_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                                                </div>
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
                var deptType = $(this).find('[name="dept_type[]"]').val();
                var pocName = $(this).find('[name="dept_name[]"]').val();
                var pocEmail = $(this).find('[name="dept_email[]"]').val();
                var pocCell = $(this).find('[name="dept_cell[]"]').val();

                // Check if any relevant data is entered
                if (deptType || pocName || pocEmail || pocCell) {
                    // Add a new row to the summary table
                    $('#departmentSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${deptType}</td>
                            <td>${pocName}</td>
                            <td>${pocEmail}</td>
                            <td>${pocCell}</td>
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


  {{-- Inspection Accordion   --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addInspection').on('click', function () {
            var InspectionAccordionCount = $('#inspectionAccordion .inspectionaccordion-item').length + 1;

            var newInspectionAccordion = `
                <div class="accordion-item inspectionaccordion-item" id="inspectionEntry${InspectionAccordionCount}">
                    <h2 class="accordion-header" id="inspectionHeading${InspectionAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#inspectionCollapse${InspectionAccordionCount}" aria-expanded="false" aria-controls="inspectionCollapse${InspectionAccordionCount}">
                            Inspection Entry ${InspectionAccordionCount}
                        </button>
                    </h2>
                    <div id="inspectionCollapse${InspectionAccordionCount}" class="collapse" aria-labelledby="inspectionHeading${InspectionAccordionCount}">
                        <div class="accordion-body">
                            <div id="inspectionDiv" >
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
                var inspectionNumber = $(this).find('[name="inspection_no[]"]').val();
                var inspectionID = $(this).find('[name="inspection_emp_id[]"]').val();
                var inspectionName = $(this).find('[name="inspection_emp_name[]"]').val();

                // Check if any relevant data is entered
                if (inspectionNumber || inspectionID || inspectionName) {
                    // Add a new row to the summary table
                    $('#inspectionSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${inspectionNumber}</td>
                            <td>${inspectionID}</td>
                            <td>${inspectionName}</td>
                            <td><button type="button" class="btn btn-primary view-inspection-button" data-index="${index}">View</button></td>
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

  {{-- Armour Accordion   --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addArmour').on('click', function () {
            var ArmourAccordionCount = $('#armourAccordion .armouraccordion-item').length + 1;

            var newArmourAccordion = `
                <div class="accordion-item armouraccordion-item" id="armourEntry${ArmourAccordionCount}">
                    <h2 class="accordion-header" id="armourHeading${ArmourAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#armourCollapse${ArmourAccordionCount}" aria-expanded="false" aria-controls="armourCollapse${ArmourAccordionCount}">
                            Armour Entry ${ArmourAccordionCount}
                        </button>
                    </h2>
                    <div id="armourCollapse${ArmourAccordionCount}" class="collapse" aria-labelledby="armourHeading${ArmourAccordionCount}">
                        <div class="accordion-body">
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

   {{-- Incident Accordion   --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addIncident').on('click', function () {
            var IncidentAccordionCount = $('#incidentAccordion .incidentaccordion-item').length + 1;

            var newIncidentAccordion = `
                <div class="accordion-item incidentaccordion-item" id="incidentEntry${IncidentAccordionCount}">
                    <h2 class="accordion-header" id="incidentHeading${IncidentAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#incidentCollapse${IncidentAccordionCount}" aria-expanded="false" aria-controls="incidentCollapse${IncidentAccordionCount}">
                            Incident Entry ${IncidentAccordionCount}
                        </button>
                    </h2>
                    <div id="incidentCollapse${IncidentAccordionCount}" class="collapse" aria-labelledby="incidentHeading${IncidentAccordionCount}">
                        <div class="accordion-body">
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


   {{-- Assignment Accordion  --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addAssignment').on('click', function () {
            var AssignmentAccordionCount = $('#assignmentAccordion .assignmentaccordion-item').length + 1;

            var newAssignmentAccordion = `
                <div class="accordion-item assignmentaccordion-item" id="assignmentEntry${AssignmentAccordionCount}">
                    <h2 class="accordion-header" id="assignmentHeading${AssignmentAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#assignmentCollapse${AssignmentAccordionCount}" aria-expanded="false" aria-controls="assignmentCollapse${AssignmentAccordionCount}">
                            Assignment Entry ${AssignmentAccordionCount}
                        </button>
                    </h2>
                    <div id="assignmentCollapse${AssignmentAccordionCount}" class="collapse" aria-labelledby="assignmentHeading${AssignmentAccordionCount}">
                        <div class="accordion-body">

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
                                                    Floor <br> <input class="form-control" id="head_office_cell_no" name="incharge_floor[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Building <br> <input class="form-control" id="head_office_cell_no" name="incharge_build[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Block <br> <input class="form-control" id="head_office_cell_no" name="incharge_block[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Area <br> <input class="form-control" id="head_office_cell_no" name="incharge_area[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    City <br> <input class="form-control" id="head_office_cell_no" name="incharge_city[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
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

                                </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeAssignmentAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#assignmentAccordion').append(newAssignmentAccordion);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeAssignmentAccordion', function () {
            $(this).closest('.assignmentaccordion-item').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update assignment summary table for assignment entries
        function updateAssignmentSummaryTable() {
            // Clear existing rows
            $('#assignmentSummaryTable tbody').empty();

            // Iterate through each assignment accordion item and update the summary table
            $('.assignmentaccordion-item').each(function (index) {
                var customerName = $(this).find('[name="asig_customer_name[]"]').val();
                var taskAssigning = $(this).find('[name="task_assigning[]"]').val();
                var designation = $(this).find('[name="asig_desig[]"]').val();

                // Check if any relevant data is entered
                if (customerName || taskAssigning || designation) {
                    // Add a new row to the summary table
                    $('#assignmentSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${customerName}</td>
                            <td>${taskAssigning}</td>
                            <td>${designation}</td>
                            <td><button type="button" class="btn btn-primary view-assignment-button" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Assignment Button Click Event
        $('#addAssignment').on('click', function () {
            var assignmentEntryCount = $('#assignmentAccordion .assignmentaccordion-item').length + 1;

            var newAssignmentEntry = `
                <!-- Your existing assignment accordion HTML goes here -->
            `;
            console.log('Adding assignment entry:', assignmentEntryCount);
            $('#assignmentAccordion').append(newAssignmentEntry);
        });

        // Update Assignment Table Button Click Event
        $('#updateAssignmentTable').on('click', function () {
            // Update the assignment summary table
            updateAssignmentSummaryTable();
        });

        // View Assignment Button Click Event
        $(document).on('click', '.view-assignment-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.assignmentaccordion-item').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Prevent the default behavior of the Add More Assignment button
        $('#addAssignment').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

    {{-- Audit Accordion   --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addAudit').on('click', function () {
            var AuditAccordionCount = $('#auditAccordion .auditaccordion-item').length + 1;

            var newAuditAccordion = `
                <div class="accordion-item auditaccordion-item" id="auditEntry${AuditAccordionCount}">
                    <h2 class="accordion-header" id="auditHeading${AuditAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#auditCollapse${AuditAccordionCount}" aria-expanded="false" aria-controls="auditCollapse${AuditAccordionCount}">
                            Audit Entry ${AuditAccordionCount}
                        </button>
                    </h2>
                    <div id="auditCollapse${AuditAccordionCount}" class="collapse" aria-labelledby="auditHeading${AuditAccordionCount}">
                        <div class="accordion-body">

                            <div class=" row main-content div" id="auditsInfo">

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
                                                    @foreach ($checkedby as $checked)
                                                        <option value="{{ $checked->checkedby_name}}">{{ $checked->checkedby_name }}</option>
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
                var fileAuditedBy = $(this).find('[name="audit_file[]"]').val();
                var signature = $(this).find('[name="audit_sign[]"]').val();
                var checkedBy = $(this).find('[name="audit_checked_by[]"]').val();

                // Check if any relevant data is entered
                if (fileAuditedBy || signature || checkedBy) {
                    // Add a new row to the summary table
                    $('#auditSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${fileAuditedBy}</td>
                            <td>${signature}</td>
                            <td>${checkedBy}</td>
                            <td><button type="button" class="btn btn-primary view-audit-button" data-index="${index}">View</button></td>
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

   {{-- Business Info Accordion    --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addBusinessinfo').on('click', function () {
            var BusinessinfoAccordionCount = $('#businessinfoAccordion .businessinfoaccordion-item').length + 1;

            var newBusinessinfoAccordion = `
                <div class="accordion-item businessinfoaccordion-item" id="businessinfoEntry${BusinessinfoAccordionCount}">
                    <h2 class="accordion-header" id="businessinfoHeading${BusinessinfoAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#businessinfoCollapse${BusinessinfoAccordionCount}" aria-expanded="false" aria-controls="businessinfoCollapse${BusinessinfoAccordionCount}">
                            Business Info Entry ${BusinessinfoAccordionCount}
                        </button>
                    </h2>
                    <div id="businessinfoCollapse${BusinessinfoAccordionCount}" class="collapse" aria-labelledby="businessinfoHeading${BusinessinfoAccordionCount}">
                        <div class="accordion-body">

                            <div id="businessInfo">
                                    <div class=" row main-content div">

                                        <div class="col-lg-12">
                                            <div class="row mb-2">
                                                <div class="col-lg-4">Name<br> <input class="form-control" id="head_office_cell_no" name="cb_name[]" type="text" placeholder="..." style="width: 100%;"></div>
                                                                    <div class="col-lg-4">Designation<br> <input class="form-control" id="head_office_cell_no" name="cb_desig[]" type="text" placeholder="..." style="width: 100%;"></div>
                                                                    <div class="col-lg-4">Company Name<br> <input class="form-control" id="head_office_cell_no" name="cb_comp_name[]" type="text" placeholder="..." style="width: 100%;"></div>
                                                                    <div class="col-lg-4">Email<br> <input class="form-control" id="head_office_cell_no" name="cb_email[]" type="text" placeholder="..." style="width: 100%;"></div>
                                                                    <div class="col-lg-4">Contact Number<br> <input class="form-control" id="head_office_cell_no" name="cb_cno[]" type="text" placeholder="..." style="width: 100%;"></div>
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

                                    </div>
                                </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeBusinessinfoAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#businessinfoAccordion').append(newBusinessinfoAccordion);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeBusinessinfoAccordion', function () {
            $(this).closest('.businessinfoaccordion-item').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update business info summary table
        function updateBusinessInfoSummaryTable() {
            // Clear existing rows
            $('#businessinfoSummaryTable tbody').empty();

            // Iterate through each business info accordion item and update the summary table
            $('.businessinfoaccordion-item').each(function (index) {
                var businessName = $(this).find('[name="bussiness_name[]"]').val();
                var businessNature = $(this).find('[name="bussiness_nature[]"]').val();
                var businessEmail = $(this).find('[name="bussiness_email[]"]').val();

                // Check if any relevant data is entered
                if (businessName || businessNature || businessEmail) {
                    // Add a new row to the summary table
                    $('#businessinfoSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${businessName}</td>
                            <td>${businessNature}</td>
                            <td>${businessEmail}</td>
                            <td><button type="button" class="btn btn-primary view-business-info-button" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Business Info Button Click Event
        $('#addBusinessinfo').on('click', function () {
            var businessInfoEntryCount = $('#businessinfoAccordion .businessinfoaccordion-item').length + 1;

            var newBusinessInfoEntry = `
                <!-- Your existing business info accordion HTML goes here -->
            `;
            console.log('Adding business info entry:', businessInfoEntryCount);
            $('#businessinfoAccordion').append(newBusinessInfoEntry);
        });

        // Update Business Info Table Button Click Event
        $('#updateBusinessinfoTable').on('click', function () {
            // Update the business info summary table
            updateBusinessInfoSummaryTable();
        });

        // View Business Info Button Click Event
        $(document).on('click', '.view-business-info-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.businessinfoaccordion-item').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Prevent the default behavior of the Add More Business Info button
        $('#addBusinessinfo').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

   {{-- Promotional Activity Accordion --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addPromact').on('click', function () {
            var PromactAccordionCount = $('#promactAccordion .promactaccordion-item').length + 1;

            var newPromactAccordion = `
                <div class="accordion-item promactaccordion-item" id="promactEntry${PromactAccordionCount}">
                    <h2 class="accordion-header" id="promactHeading${PromactAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#promactCollapse${PromactAccordionCount}" aria-expanded="false" aria-controls="promactCollapse${PromactAccordionCount}">
                            Promotional Activity Entry ${PromactAccordionCount}
                        </button>
                    </h2>
                    <div id="promactCollapse${PromactAccordionCount}" class="collapse" aria-labelledby="promactHeading${PromactAccordionCount}">
                        <div class="accordion-body">
                            <div class="row" id="give_a_ways">

                                    <div class="col-lg-6 spacing-right form-group">
                                        Customer Details Entered in all Promotional Activities <br>
                                    <div class="input-group" style="width: 100%;">
                                        <select id="dropdown" class="form-control mt-1" name="promotional_act[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                            <option value=""></option>
                                            @foreach ($activities as $activity)
                                                <option value="{{ $activity->activity_name}}">{{ $activity->activity_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append" style="width: 30%;">
                                            <a href="{{ route('activities') }}">
                                                <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
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
                var customerDetails = $(this).find('[name="promotional_act[]"]').val();
                var quantity = $(this).find('[name="promotional_quantity[]"]').val();
                var estimatedPrice = $(this).find('[name="prom_price[]"]').val();

                // Check if any relevant data is entered
                if (customerDetails || quantity || estimatedPrice) {
                    // Add a new row to the summary table
                    $('#promactSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${customerDetails}</td>
                            <td>${quantity}</td>
                            <td>${estimatedPrice}</td>
                            <td><button type="button" class="btn btn-primary view-promact-button" data-index="${index}">View</button></td>
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


  {{-- Feedback Form Accordion  --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addFeedback').on('click', function () {
            var FeedbackAccordionCount = $('#feedbackAccordion .feedbackaccordion-item').length + 1;

            var newFeedbackAccordion = `
                <div class="accordion-item feedbackaccordion-item" id="feedbackEntry${FeedbackAccordionCount}">
                    <h2 class="accordion-header" id="feedbackHeading${FeedbackAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#feedbackCollapse${FeedbackAccordionCount}" aria-expanded="false" aria-controls="feedbackCollapse${FeedbackAccordionCount}">
                            Feedback Entry ${FeedbackAccordionCount}
                        </button>
                    </h2>
                    <div id="feedbackCollapse${FeedbackAccordionCount}" class="collapse" aria-labelledby="feedbackHeading${FeedbackAccordionCount}">
                        <div class="accordion-body">

                            <div id="feedbackForm">
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
                                                                <table class="table table-bordered" id="feedbackTable">
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
                                                                                        to 10):-
                                                                                        (10 = Entirely Satisfied , 8 = Satisfied, 6 =
                                                                                        Neutral, 2 = Unsatisfied, 0 = Entirely
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
                                                                            <td width="5%"><input type="radio" name="q1[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q1[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q1[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q1[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q1[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">2.Discipline, Behavior & Character
                                                                                of Guards</td>
                                                                            <td width="5%"><input type="radio" name="q2[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q2[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q2[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q2[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q2[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">3. Smart Turnout of the Guards
                                                                                (Uniform)</td>
                                                                            <td width="5%"><input type="radio" name="q3[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q3[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q3[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q3[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q3[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">4.Working Condition of Weapons &
                                                                                Security Equipments</td>
                                                                            <td width="5%"><input type="radio" name="q4[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q4[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q4[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q4[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q4[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">5. Our Abidance regarding Taxes
                                                                                (Income Tax & Sales Tax)</td>
                                                                            <td width="5%"><input type="radio" name="q5[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q5[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q5[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q5[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q5[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">6. Our Compliance wrt EOBI, Social
                                                                                Security & GLI of Guards</td>
                                                                            <td width="5%"><input type="radio" name="q6[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q6[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q6[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q6[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q6[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">7. Timely Provision of Invoices &
                                                                                Guards Payroll Management</td>
                                                                            <td width="5%"><input type="radio" name="q7[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q7[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q7[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q7[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q7[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">8. Level of Training of Guards</td>
                                                                            <td width="5%"><input type="radio" name="q8[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q8[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q8[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q8[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q8[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">9. Level of Supervisory Staff
                                                                                Visiting the Guards</td>
                                                                            <td width="5%"><input type="radio" name="q9[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q9[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q9[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q9[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q9[]" value="0"></td>
                                                                        </tr>
                                                                        <tr width="100%">
                                                                            <td width="75%">10. PIFFERS Mgmt Approach &
                                                                                Behavior towards Customer Service</td>
                                                                            <td width="5%"><input type="radio" name="q10[]" value="10"></td>
                                                                            <td width="5%"><input type="radio" name="q10[]" value="8"></td>
                                                                            <td width="5%"><input type="radio" name="q10[]" value="6"></td>
                                                                            <td width="5%"><input type="radio" name="q10[]" value="2"></td>
                                                                            <td width="5%"><input type="radio" name="q10[]" value="5"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div class="col-lg-4 spacing-right mb-3" id="totalScore">
                                                                    Total Score: <br> <input class="form-control" name="total_score[]" id="totalScore" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
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
                                                        </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeFeedbackAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#feedbackAccordion').append(newFeedbackAccordion);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeFeedbackAccordion', function () {
            $(this).closest('.feedbackaccordion-item').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update the feedback summary table
        function updateFeedbackSummaryTable() {
            // Clear existing rows
            $('#feedbackSummaryTable tbody').empty();

            // Iterate through each feedback accordion item and update the summary table
            $('.feedbackaccordion-item').each(function (index) {
                var clientName = $(this).find('[name="feed_client_name[]"]').val();
                var clientId = $(this).find('[name="feed_client_id[]"]').val();
                var clientPocName = $(this).find('[name="feed_client_poc_name[]"]').val();

                // Check if any relevant data is entered
                if (clientName || clientId || clientPocName) {
                    // Add a new row to the summary table
                    $('#feedbackSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${clientName}</td>
                            <td>${clientId}</td>
                            <td>${clientPocName}</td>
                            <td><button type="button" class="btn btn-primary view-feedback-button" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Feedback Button Click Event
        $('#addFeedback').on('click', function () {
            var feedbackEntryCount = $('#feedbackAccordion .feedbackaccordion-item').length + 1;

            var newFeedbackEntry = `
                <!-- Your existing feedback accordion HTML goes here -->
            `;
            console.log('Adding feedback entry:', feedbackEntryCount);
            $('#feedbackAccordion').append(newFeedbackEntry);
        });

        // Update Feedback Table Button Click Event
        $('#updateFeedbackTable').on('click', function () {
            // Update the feedback summary table
            updateFeedbackSummaryTable();
        });

        // View Feedback Button Click Event
        $(document).on('click', '.view-feedback-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.feedbackaccordion-item').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Prevent the default behavior of the Add More Feedback button
        $('#addFeedback').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>


  {{-- Complaint Accordion  --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addComplaint').on('click', function () {
            var ComplaintAccordionCount = $('#complaintAccordion .complaintaccordion-item').length + 1;

            var newComplaintAccordion = `
                <div class="accordion-item complaintaccordion-item" id="complaintEntry${ComplaintAccordionCount}">
                    <h2 class="accordion-header" id="complaintHeading${ComplaintAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#complaintCollapse${ComplaintAccordionCount}" aria-expanded="false" aria-controls="complaintCollapse${ComplaintAccordionCount}">
                            Complaint Entry ${ComplaintAccordionCount}
                        </button>
                    </h2>
                    <div id="complaintCollapse${ComplaintAccordionCount}" class="collapse" aria-labelledby="complaintHeading${ComplaintAccordionCount}">
                        <div class="accordion-body">

                            <div class="row" id="complaintForm" >

                                   <div class="col-lg-12">
                                       <div class="row mb-2">


                                           <div class="col-lg-4 spacing-left spacing-right">
                                               Complaint Number <br> <input class="form-control" name="complaint_no[]" type="text" placeholder="..." style="width: 100%;">
                                           </div>
                                           <h5 class="mt-3">Guards Duty</h5>



                                           <div class="col-lg-5 spacing-left spacing-right form-group">
                                               Guards Duty <br>
                                               <div class="input-group" style="width: 100%;">
                                                   <select id="dropdown" class="form-control mt-1" name="complaint_guards_duty[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                       <option value=""></option>
                                                       @foreach ($duties as $duty)
                                                           <option value="{{ $duty->duty_name}}">{{ $duty->duty_name }}</option>
                                                       @endforeach
                                                   </select>
                                                   <div class="input-group-append" style="width: 30%;">
                                                       <a href="{{ route('duties') }}">
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
                                               <br>
                                               <div class="input-group" style="width: 100%;">
                                                   <select id="dropdown" class="form-control mt-1" name="wea_uni_equip[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                       <option value=""></option>
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
                                               <br>
                                               <div class="input-group" style="width: 100%;">
                                                   <select id="dropdown" class="form-control mt-1" name="finance_dept[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                       <option value=""></option>
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
                                               <br>
                                               <div class="input-group" style="width: 100%;">
                                                   <select id="dropdown" class="form-control mt-1" name="src_complaint[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                       <option value=""></option>
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
                                               <select id="dropdown" class="form-control mt-1" name="complaint_tagged[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                   <option value=""></option>
                                                   @foreach ($complaintsto as $complaintto)
                                                       <option value="{{ $complaintto->tagged_to_name}}">{{ $complaintto->tagged_to_name }}</option>
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
                                               <select id="dropdown" class="form-control mt-1" name="complaint_arressed[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                   <option value=""></option>
                                                   @foreach ($complaintsby as $complaintby)
                                                       <option value="{{ $complaintby->addressed_by_name}}">{{ $complaintby->addressed_by_name }}</option>
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
                               </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeComplaintAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#complaintAccordion').append(newComplaintAccordion);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeComplaintAccordion', function () {
            $(this).closest('.complaintaccordion-item').remove();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update the complaint summary table
        function updateComplaintSummaryTable() {
            // Clear existing rows
            $('#complaintSummaryTable tbody').empty();

            // Iterate through each complaint accordion item and update the summary table
            $('.complaintaccordion-item').each(function (index) {
                var complaintNo = $(this).find('[name="complaint_no[]"]').val();
                var complaintTaggedTo = $(this).find('[name="complaint_tagged[]"]').val();
                var complaintAddressedBy = $(this).find('[name="complaint_arressed[]"]').val();

                // Check if any relevant data is entered
                if (complaintNo || complaintTaggedTo || complaintAddressedBy) {
                    // Add a new row to the summary table
                    $('#complaintSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${complaintNo}</td>
                            <td>${complaintTaggedTo}</td>
                            <td>${complaintAddressedBy}</td>
                            <td><button type="button" class="btn btn-primary view-complaint-button" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Complaint Button Click Event
        $('#addComplaint').on('click', function () {
            var complaintEntryCount = $('#complaintAccordion .complaintaccordion-item').length + 1;

            var newComplaintEntry = `
                <!-- Your existing complaint accordion HTML goes here -->
            `;
            console.log('Adding complaint entry:', complaintEntryCount);
            $('#complaintAccordion').append(newComplaintEntry);
        });

        // Update Complaint Table Button Click Event
        $('#updateComplaintTable').on('click', function () {
            // Update the complaint summary table
            updateComplaintSummaryTable();
        });

        // View Complaint Button Click Event
        $(document).on('click', '.view-complaint-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.complaintaccordion-item').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Prevent the default behavior of the Add More Complaint button
        $('#addComplaint').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

{{-- Notification Accordion  --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addNotification').on('click', function () {
            var NotificationAccordionCount = $('#notificationAccordion .notificationaccordion-item').length + 1;

            var newNotificationAccordion = `
                <div class="accordion-item notificationaccordion-item" id="notificationEntry${NotificationAccordionCount}">
                    <h2 class="accordion-header" id="notificationHeading${NotificationAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#notificationCollapse${NotificationAccordionCount}" aria-expanded="false" aria-controls="notificationCollapse${NotificationAccordionCount}">
                            Notification Entry ${NotificationAccordionCount}
                        </button>
                    </h2>
                    <div id="notificationCollapse${NotificationAccordionCount}" class="collapse" aria-labelledby="notificationHeading${NotificationAccordionCount}">
                        <div class="accordion-body">
                            <div class="col-lg-12 spacing-right" id="notificationForm">
                                                        <div class="row mb-2">
                                                            <div class="col-lg-3 spacing-right">
                                                                Notification No. <br> <input class="form-control" type="text" name="notification_no[]" placeholder="..." style="width: 100%;">
                                                            </div>
                                                                <div class="col-lg-5 spacing-left spacing-right form-group">
                                                                    Notification Related to : <br>
                                                                <div class="input-group" style="width: 100%;">
                                                                    <select id="dropdown" class="form-control mt-1" name="notification_related[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                        <option value=""></option>
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
                                                                <select id="dropdown" class="form-control mt-1" name="notification_shared[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                                    <option value=""></option>
                                                                    @foreach ($notificationshared as $notificationshare)
                                                                        <option value="{{ $notificationshare->notification_shared_name}}">{{ $notificationshare->notification_shared_name }}</option>
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
                var notificationNo = $(this).find('[name="notification_no[]"]').val();
                var notificationRelated = $(this).find('[name="notification_related[]"]').val();
                var notificationShared = $(this).find('[name="notification_shared[]"]').val();

                // Check if any relevant data is entered
                if (notificationNo || notificationRelated || notificationShared) {
                    // Add a new row to the summary table
                    $('#notificationSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${notificationNo}</td>
                            <td>${notificationRelated}</td>
                            <td>${notificationShared}</td>
                            <td><button type="button" class="btn btn-primary view-notification-button" data-index="${index}">View</button></td>
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


 {{-- ///////   scripts for score cards total number calculation  \\\\\\\\\\\ --}}
        {{-- for row 1 --}}
        <script>
            // Function to calculate and update the result field
            function updateResult() {
                var total = 0;

                // Loop through each input field with the class 'mark-input'
                $('.mark-input1').each(function() {
                    // Parse the value as a number, default to 0 if NaN
                    var value = parseFloat($(this).val()) || 0;

                    // Add the value to the total
                    total += value;
                });

                // Update the 'marks1_tm1' field with the calculated total
                $('#result1').val(total);
            }

            // Bind the updateResult function to the input fields' input event
            $('.mark-input1').on('input', updateResult);
        </script>
        {{-- for row 2 --}}
        <script>
            // Function to calculate and update the result field
            function update2Result() {
                var total = 0;

                // Loop through each input field with the class 'mark-input'
                $('.mark-input2').each(function() {
                    // Parse the value as a number, default to 0 if NaN
                    var value = parseFloat($(this).val()) || 0;

                    // Add the value to the total
                    total += value;
                });

                // Update the 'marks1_tm1' field with the calculated total
                $('#result2').val(total);
            }

            // Bind the updateResult function to the input fields' input event
            $('.mark-input2').on('input', update2Result);
        </script>
        {{-- for row 3 --}}
        <script>
            // Function to calculate and update the result field
            function update3Result() {
                var total = 0;

                // Loop through each input field with the class 'mark-input'
                $('.mark-input3').each(function() {
                    // Parse the value as a number, default to 0 if NaN
                    var value = parseFloat($(this).val()) || 0;

                    // Add the value to the total
                    total += value;
                });

                // Update the 'marks1_tm1' field with the calculated total
                $('#result3').val(total);
            }

            // Bind the updateResult function to the input fields' input event
            $('.mark-input3').on('input', update3Result);
        </script>
        {{-- for row 4 --}}
        <script>
            // Function to calculate and update the result field
            function update4Result() {
                var total = 0;

                // Loop through each input field with the class 'mark-input'
                $('.mark-input4').each(function() {
                    // Parse the value as a number, default to 0 if NaN
                    var value = parseFloat($(this).val()) || 0;

                    // Add the value to the total
                    total += value;
                });

                // Update the 'marks1_tm1' field with the calculated total
                $('#result4').val(total);
            }

            // Bind the updateResult function to the input fields' input event
            $('.mark-input4').on('input', update4Result);
        </script>
        {{-- for row 5 --}}
        <script>
            // Function to calculate and update the result field
            function update5Result() {
                var total = 0;

                // Loop through each input field with the class 'mark-input'
                $('.mark-input5').each(function() {
                    // Parse the value as a number, default to 0 if NaN
                    var value = parseFloat($(this).val()) || 0;

                    // Add the value to the total
                    total += value;
                });

                // Update the 'marks1_tm1' field with the calculated total
                $('#result5').val(total);
            }

            // Bind the updateResult function to the input fields' input event
            $('.mark-input5').on('input', update5Result);
        </script>
        {{-- for row 6 --}}
        <script>
            // Function to calculate and update the result field
            function update6Result() {
                var total = 0;

                // Loop through each input field with the class 'mark-input'
                $('.mark-input6').each(function() {
                    // Parse the value as a number, default to 0 if NaN
                    var value = parseFloat($(this).val()) || 0;

                    // Add the value to the total
                    total += value;
                });

                // Update the 'marks1_tm1' field with the calculated total
                $('#result6').val(total);
            }

            // Bind the updateResult function to the input fields' input event
            $('.mark-input6').on('input', update6Result);
        </script>
        {{-- for row 7 --}}
        <script>
            // Function to calculate and update the result field
            function update7Result() {
                var total = 0;

                // Loop through each input field with the class 'mark-input'
                $('.mark-input7').each(function() {
                    // Parse the value as a number, default to 0 if NaN
                    var value = parseFloat($(this).val()) || 0;

                    // Add the value to the total
                    total += value;
                });

                // Update the 'marks1_tm1' field with the calculated total
                $('#result7').val(total);
            }

            // Bind the updateResult function to the input fields' input event
            $('.mark-input7').on('input', update7Result);
        </script>
        {{-- for grand total --}}
        <script>
            // Function to update the grand total
            function updateGrandTotal() {
                var grandTotal = 0;

                // Loop through each set
                for (var i = 1; i <= 7; i++) {
                    // Loop through each mark-input field in the set
                    $('[class^=mark-input' + i + ']').each(function () {
                        var value = parseFloat($(this).val()) || 0;
                        grandTotal += value;
                    });
                }

                // Update the 'marks_grand_total' field with the calculated grand total
                $('#grandTotal').val(grandTotal);
            }

            // Function to update the Total Marks fields and trigger the grand total update
            function updateTotalMarks(setNumber) {
                var totalMarks = 0;

                // Loop through each mark-input field in the set
                $('[class^=mark-input' + setNumber + ']').each(function () {
                    var value = parseFloat($(this).val()) || 0;
                    totalMarks += value;
                });

                // Update the 'result' field in the set with the calculated total marks
                $('#result' + setNumber).val(totalMarks);

                // Trigger the grand total update
                updateGrandTotal();
            }

            // Bind the updateTotalMarks function to the input event for all mark-input fields
            $('[class^=mark-input]').on('input', function () {
                // Extract the set number from the field's class
                var setNumber = this.className.match(/\d+/)[0];
                updateTotalMarks(setNumber);
            });
        </script>

 {{-- Script for Feedback, which adds radio button values and stores to total score field  --}}


<script>
    // Function to calculate and update the Total Score
    function updateTotalScore(accordionId) {
        var totalScore = 0;

        // Loop through radio buttons in the current accordion
        $('#' + accordionId + ' input[type="radio"]:checked').each(function () {
            // Add the value of the selected radio button to the total score
            totalScore += parseInt($(this).val(), 10);
        });

        // Update the corresponding 'total_score' input field for the accordion
        $('#' + accordionId + ' input[name="total_score[]"]').val(totalScore);
    }

    // Bind the updateTotalScore function to the change event for all radio buttons
    $(document).on('change', 'input[type="radio"]', function () {
        var accordionId = $(this).closest('.feedbackaccordion-item').attr('id');
        updateTotalScore(accordionId);
    });

    // Initial calculation when the page is fully loaded
    $(document).ready(function () {
        // Loop through each existing accordion to calculate total score
        $('.feedbackaccordion-item').each(function () {
            var accordionId = $(this).attr('id');
            updateTotalScore(accordionId);
        });
    });
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the elements
        var meetingDateInput = document.getElementById('meeting_date');
        var frequencyInput = document.getElementById('meeting_freq');
        var alertTextarea = document.getElementById('w3review21');

        // Function to convert a date from one format to another
        function convertDateFormat(dateString, fromFormat, toFormat) {
            var dateObj = new Date(dateString);
            var year = dateObj.getFullYear();
            var month = ('0' + (dateObj.getMonth() + 1)).slice(-2);
            var day = ('0' + dateObj.getDate()).slice(-2);

            if (toFormat === 'MM/DD/YYYY') {
                return month + '/' + day + '/' + year;
            } else {
                return year + '-' + month + '-' + day;
            }
        }

        // Function to calculate the next meeting date
        function calculateNextMeetingDate() {
            var currentDate = new Date();
            var selectedDate = new Date(convertDateFormat(meetingDateInput.value, 'MM/DD/YYYY', 'YYYY-MM-DD'));
            var frequency = frequencyInput.value;

            if (frequency === 'Weekly') {
                selectedDate.setDate(selectedDate.getDate() + 7);
            } else if (frequency === 'Monthly') {
                selectedDate.setMonth(selectedDate.getMonth() + 1);
            }

            // Display the calculated next meeting date
            var nextMeetingDate = convertDateFormat(selectedDate.toISOString().split('T')[0], 'YYYY-MM-DD', 'MM/DD/YYYY');
            alertTextarea.value = 'Next Meeting date is on ' + nextMeetingDate;

            // Check if the calculated date is today or in the past
            if (
                currentDate.getFullYear() === selectedDate.getFullYear() &&
                currentDate.getMonth() === selectedDate.getMonth() &&
                currentDate.getDate() === selectedDate.getDate()
            ) {
                // Update to "Meeting Today" if the date arrives
                alertTextarea.value = 'Meeting Today!';

                // Show Bootstrap alert
                showBootstrapAlert();
            } else if (currentDate > selectedDate) {
                // Update to "Meeting was on" if the date has passed
                alertTextarea.value = 'Meeting was on ' + nextMeetingDate;
            }
        }

        // Function to show Bootstrap alert
        function showBootstrapAlert() {
            // You can customize the alert message and styling here
            var alertMessage = 'Today is the day for the meeting!';
            var alertHTML = `
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ${alertMessage}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;

            // Append the alert to the body
            document.body.insertAdjacentHTML('afterbegin', alertHTML);
        }

        // Add event listeners to update alert field when date or frequency changes
        meetingDateInput.addEventListener('input', calculateNextMeetingDate);
        frequencyInput.addEventListener('input', calculateNextMeetingDate);

        // Initial calculation on page load
        calculateNextMeetingDate();
    });

    // Function to trim leading and trailing spaces
    function trimSpaces21() {
        var textarea = document.getElementById('w3review21');
        textarea.value = textarea.value.trim();
    }

    // Function to move cursor to the start
    function moveCursorToStart21() {
        var textarea = document.getElementById('w3review21');
        textarea.setSelectionRange(0, 0);
    }
</script> --}}

{{-- Script for submit button that will give error on changing tab if there are empty fieds inside the content  --}}

<!-- Include this script in your HTML file -->
{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Array to store the tab content elements
        var tabContents = document.querySelectorAll('.tab-pane');

        // Add event listeners to all tabs
        tabContents.forEach(function (tabContent) {
            // Find the Save button within the current tab
            var saveButton = tabContent.querySelector('.save-button');

            // Add event listener to the Save button
            saveButton.addEventListener('click', function () {
                // Call a function to save the data for the current tab
                saveTabData(tabContent);
            });
        });

        // Add event listener to detect tab switch
        document.getElementById('nav-tab').addEventListener('click', function (event) {
            var targetTab = event.target.getAttribute('href');

            // Call a function to check if fields are empty when switching tabs
            checkEmptyFields(targetTab);
        });

        // Function to save data for the current tab
        function saveTabData(tabContent) {
            // Implement your logic to save data here
            console.log('Data saved for tab:', tabContent.id);
        }

        // Function to check if fields are empty when switching tabs
        function checkEmptyFields(targetTab) {
            // Get the current active tab content
            var currentTabContent = document.querySelector('.tab-pane.show.active');

            // Check if any required fields are empty in the current tab
            var emptyFields = checkRequiredFields(currentTabContent);

            // If there are empty fields, prevent switching tabs and show an alert
            if (emptyFields.length > 0) {
                event.preventDefault();
                alert('Please fill in all required fields before switching tabs.');
            }
        }

        // Function to check required fields in a given tab content
        function checkRequiredFields(tabContent) {
            // Select all required fields within the tab content
            var requiredFields = tabContent.querySelectorAll('[required]');

            // Filter out the empty required fields
            var emptyFields = Array.from(requiredFields).filter(function (field) {
                return field.value.trim() === '';
            });

            return emptyFields;
        }
    });
</script> --}}





<!-- Bootstrap CSS -->


<!-- Bootstrap JS and dependencies -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>




</body>
</html>



    <!-- Modal structure -->









