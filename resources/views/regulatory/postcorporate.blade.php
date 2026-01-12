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

            <!--Popup model for User new entry-->
            <!-- <div class="modal fade" id="add_user"> -->
            <!-- <div class="modal-dialog" role="document" style="max-width: 75%;"> -->
            <!-- <div class="modal-content"> -->
            <!--<div class="modal-header border-0">-->
            <!--    <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;"> Corporate-->
            <!--    </h4>-->

                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <!--                    <span aria-hidden="true">&times;</span>-->
            <!--                </button> -->
            <!--</div>-->
                                      <div class="modal-header border-0">
                              <div style="display:flex; column-gap:10px; align-items:center">
                                 <button type="button" class="btn btn-link" onclick="history.back()">
                                    <i class="bi bi-arrow-left"></i>
                                </button>
                               <h5 class="mt-3" style="font-weight: 700;">Corporate</h5>
                            </div>
                       </div>
            <!-- <div class="modal-body"> -->
            <section>

                <form method="POST" action="{{ route('submit_corporate') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="row mb-2" style="margin-left: 20px;">
                            <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
                              <h5>Corporate Activation Status</h5>

                              <div class="form-check form-check-inline" style="margin-right: 90px;">
                                <input class="form-check-input mr-2" type="radio" name="corporate_activation" value="1" id="activeRadio">
                                <label class="form-check-label" for="activeRadio">Active</label>

                                <input class="form-check-input ml-3 mr-2" type="radio" name="corporate_activation" value="0" id="inactiveRadio">
                                <label class="form-check-label" for="inactiveRadio">Inactive</label>
                              </div>
                            </div>
                        </div>

                    </div>
                    <div class=" row main-content div">
                        <div class="col-lg-12">
                            <div class="row mb-2">
                                <div class="col-lg-4 spacing-right">
                                    Regulatory ID : <br> <input class="form-control" id="" name="regulatory_id"
                                        type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Name of Certification <br> <input class="form-control" id=""
                                        name="name_of_certification" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Registration No <br> <input class="form-control" id="" name="registration_no"
                                        type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Certificate No <br> <input class="form-control" id="" name="certification_no"
                                        type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Initial Registration Date <br> <input class="form-control" id=""
                                        name="initial_reg_date" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right ">
                                    Latest Certificate Attachments <br> <input class="form-control" id=""
                                        name="latest_certification" type="file" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Validity from : <br> <input class="form-control" id="" name="validity_from"
                                        type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Expiry Date <br> <input class="form-control" id="" name="expiry_date" type="date"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Notes <br> <textarea class="form-control" id="" name="notes" type="text"
                                        placeholder="..." style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Attachments <br> <input class="form-control" id="" name="attachments" type="file"
                                        placeholder="..." style="width: 100%;" multiple>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--Tabs forDetails-->

                    <nav>
                        <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#consultant"
                                role="tab" aria-controls="nav-home" aria-selected="true">Consultant Details</a>
                            <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#address" role="tab"
                                aria-controls="nav-home" aria-selected="true">Address</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#issuing"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Issuing Authority</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#renewals"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Renewals</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#law" role="tab"
                                aria-controls="nav-contact" aria-selected="false">Laws</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#history"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Renewal History</a>
                        </div>
                    </nav>

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


                    <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
                        <!--Consultant Details-->
                        <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="consultant" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <!-- add more consultant -->
                            <div class="container my-1">
                                <div class="accordion" id="signatoryAccordion10">
                                    <!-- Initial Accordion Item -->
                                    <div class="accordion-item signaccordion-item10" id="signatoryEntry10">
                                        <h2 class="accordion-header" id="signatoryHeading10" style="color: white">
                                            <button class="accordion-button"
                                                style="background-color: #34005A; color:white" type="button"
                                                data-toggle="collapse" data-target="#signatoryCollapse10"
                                                aria-expanded="false" aria-controls="signatoryCollapse10">
                                                Entry 1
                                            </button>
                                        </h2>
                                        <div id="signatoryCollapse10" class="collapse"
                                            aria-labelledby="signatoryHeading10">
                                            <div class="accordion-body">
                                                <!-- Your content for signatory entry goes here -->
                                                <div class="row mb-2" id="signatoryDetailsContainer10">
                                                    <div class="col-lg-12" id="consultant_add_fields">
                                                        <div class=" row mb-2">
                                                            <input type="hidden" name="c_id[]" value="">
                                                            <div class="col-lg-4 spacing-right">
                                                                Name <br> <input class="form-control" id=""
                                                                    name="c_name[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Designation <br> <input class="form-control" id=""
                                                                    name="c_desig[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Organization <br> <input class="form-control" id=""
                                                                    name="c_org[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Cell Number <br> <input class="form-control" id=""
                                                                    name="c_cell[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left">
                                                                Email <br> <input class="form-control" id=""
                                                                    name="c_email[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left">
                                                                Consultancy Fees <br> <input class="form-control" id=""
                                                                    name="c_fee[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <h5>Consultant Bank Details :</h5>
                                                        <div class=" row mb-2">
                                                            <div class="col-lg-4 spacing-right">
                                                                Bank Name <br> <input class="form-control" id=""
                                                                    name="c_bank[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Acccount Title <br> <input class="form-control" id=""
                                                                    name="c_acc[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Acccount Number <br> <input class="form-control" id=""
                                                                    name="c_acc_num[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Cheque Book Attachment <br> <input class="form-control"
                                                                    id="" name="c_cheque[]" type="file"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Notes <br> <textarea class="form-control" id=""
                                                                    name="c_notes[]" type="text" placeholder="..."
                                                                    style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Attachment <br> <input class="form-control" id=""
                                                                    name="c_attach[]" type="file" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <h5>Consultant Address</h5>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5 spacing-right">
                                                                Office No <br> <input class="form-control"
                                                                    name="c_office[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left">
                                                                Building <br> <input class="form-control"
                                                                    name="c_building[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5 spacing-right">
                                                                Block <br> <input class="form-control" name="c_block[]"
                                                                    type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left">
                                                                Area <br> <input class="form-control" name="c_area[]"
                                                                    type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5 spacing-right">
                                                                City <br> <input class="form-control" name="c_city[]"
                                                                    type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left">
                                                                Photograph of Location <br> <input class="form-control"
                                                                    name="c_loc[]" type="file" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5 spacing-right">
                                                                Email <br> <input class="form-control" id=""
                                                                    name="c_a_email[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left">
                                                                Website <br> <input class="form-control" id=""
                                                                    name="c_website[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5 spacing-right">
                                                                Pin location <br> <input class="form-control" id=""
                                                                    name="c_pin[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left">
                                                                Google Map <br> <input class="form-control" id=""
                                                                    name="c_map[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5 spacing-right">
                                                                Notes <br> <textarea class="form-control" id=""
                                                                    name="c_ex_notes[]" type="text" placeholder="..."
                                                                    style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-lg-5 spacing-left">
                                                                Attachments <br> <input class="form-control" id=""
                                                                    name="c_ex_attach[]" type="file" placeholder="..."
                                                                    style="width: 100%;">
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
                                        <button type="button" class="btn btn-primary" id="addSignatory10"
                                            style="height:30px; width:150px;">Add More
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-primary"
                                        id="updateSignatoryTable10">Save</button>

                                </div>
                            </div>
                            <table class="table table-bordered mt-1" id="signatorySummaryTable10">
                                <thead>
                                    <tr>
                                        <th>Entry</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Organization</th>
                                        <th>Cell Number</th>
                                        <th>Email</th>
                                        <th>Consultancy Fees</th>
                                        <th>View</th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Summary data will be added here dynamically -->
                                </tbody>
                            </table>
                        </div>

                        <!--Address Details-->
                        <div class="tab-pane fade show m-3" style="opacity: 90%;" id="address" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="col-lg-6 spacing-left">
                                <h5>Address</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Office No <br> <input class="form-control" name="a_office" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Building <br> <input class="form-control" name="a_build" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Block <br> <input class="form-control" name="a_block" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Area <br> <input class="form-control" name="a_area" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        City <br> <input class="form-control" name="a_city" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Photograph of Building <br> <input class="form-control" id="" name="a_photo"
                                            type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Email <br> <input class="form-control" id="" name="a_email" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Website <br> <input class="form-control" id="" name="a_website" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Pin location <br> <input class="form-control" id="" name="a_pin" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        GPS <br> <input class="form-control" id="" name="a_gps" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Notes <br> <textarea class="form-control" id="" name="a_notes" type="text"
                                            placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Attachments <br> <input class="form-control" id="" name="a_attach" type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Issuing Authority-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="issuing" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <input type="hidden" name="i_id[]" value="">

                            <!-- add more Issuing Authority -->
                            <div class="container my-1">
                                <div class="accordion" id="signatoryAccordion11">
                                    <!-- Initial Accordion Item -->
                                    <div class="accordion-item signaccordion-item11" id="signatoryEntry11">
                                        <h2 class="accordion-header" id="signatoryHeading11" style="color: white">
                                            <button class="accordion-button"
                                                style="background-color: #34005A; color:white" type="button"
                                                data-toggle="collapse" data-target="#signatoryCollapse11"
                                                aria-expanded="false" aria-controls="signatoryCollapse11">
                                                Entry 1
                                            </button>
                                        </h2>
                                        <div id="signatoryCollapse11" class="collapse"
                                            aria-labelledby="signatoryHeading11">
                                            <div class="accordion-body">
                                                <!-- Your content for signatory entry goes here -->
                                                <div class="col-lg-12" id="authority_add_fields">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-3 spacing-right">
                                                            Name <br> <input class="form-control" id="" name="i_name[]"
                                                                type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-left spacing-right">
                                                            Designation <br> <input class="form-control" id=""
                                                                name="i_desig[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right">
                                                            PTCL Number <br> <input class="form-control" id=""
                                                                name="i_ptcl[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right">
                                                            Cell Number <br> <input class="form-control" id=""
                                                                name="i_cell[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right">
                                                            Email <br> <input class="form-control" id=""
                                                                name="i_email[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right">
                                                            Website <br> <input class="form-control" id=""
                                                                name="i_website[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right">
                                                            Visiting Card Front <br> <input class="form-control" id=""
                                                                name="i_front[]" type="file" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right spacing-left">
                                                            Visiting Card Back <br> <input class="form-control" id=""
                                                                name="i_back[]" type="file" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5 spacing-right">
                                                                Notes <br> <textarea class="form-control" id=""
                                                                    name="i_notes[]" type="text" placeholder="..."
                                                                    style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-lg-5 spacing-left">
                                                                Attachments <br> <input class="form-control" id=""
                                                                    name="i_attach[]" type="file" placeholder="..."
                                                                    style="width: 100%;">
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
                                        <button type="button" class="btn btn-primary" id="addSignatory11"
                                            style="height:30px; width:150px;">Add More
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-primary"
                                        id="updateSignatoryTable11">Save</button>

                                </div>
                            </div>
                            <table class="table table-bordered mt-1" id="signatorySummaryTable11">
                                <thead>
                                    <tr>
                                        <th>Entry</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>PTCL Number</th>
                                        <th>Cell Number</th>
                                        <th>Email</th>
                                        <th>Website</th>
                                        <th>Notes</th>
                                        <th>View</th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Summary data will be added here dynamically -->
                                </tbody>
                            </table>


                        </div>

                        <!--Renewals Details-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="renewals" role="tabpanel"
                            aria-labelledby="nav-profile-tab">
                            <div class="renewal-detials">
                                <h5>Application : </h5>
                                <div class="col-lg-12">
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Initiating Date <br> <input class="form-control" id=""
                                                name="chamber_application_date" type="date" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Request Letter Attachment <br> <input class="form-control"
                                                id="head_office_email" name="chamber_application_letter" type="file"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Notes <br> <textarea class="form-control" id=""
                                                name="chamber_application_notes" type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Attachments <br> <input class="form-control" id="head_office_email"
                                                name="chamber_application_attach" type="file" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <h5>Corespondence :</h5>
                                <div class="col-lg-12">
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Corespondence Date <br> <input class="form-control" id=""
                                                name="chamber_corespondence_date" type="date" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Corespondence Letter Attachment <br> <input class="form-control" id=""
                                                name="chamber_corespondence_letter" type="file" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Notes <br> <textarea class="form-control" id=""
                                                name="chamber_corespondence_notes" type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Attachments <br> <input class="form-control" id="head_office_email"
                                                name="chamber_corespondence_attach" type="file" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <h5>Approval :</h5>
                                <div class="col-lg-12">
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Approval Date <br> <input class="form-control" id=""
                                                name="chamber_approval_date" type="date" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Approval Letter Attachment <br> <input class="form-control" id=""
                                                name="chamber_approval_letter" type="file" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Notes <br> <textarea class="form-control" id=""
                                                name="chamber_approval_notes" type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Attachments <br> <input class="form-control" id="head_office_email"
                                                name="chamber_approval_attach" type="file" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <button type="button" class="btn btn-primary mx-4 my-4"
                                            id="updateSignatoryTable13">Save</button>
                                    </div>
                                </div>
                            </div>
                            <div id="finance_add_fields">
                                <input type="hidden" name="r_id[]" value="">
                                <h3 style="border: 2px solid black; width: 99%; padding: 10px;"><b>Finances :</b></h3>
                                <!-- add more finanace -->
                                <div class="container my-1">
                                    <div class="accordion" id="signatoryAccordion12">
                                        <!-- Initial Accordion Item -->
                                        <div class="accordion-item signaccordion-item12" id="signatoryEntry12">
                                            <h2 class="accordion-header" id="signatoryHeading12" style="color: white">
                                                <button class="accordion-button"
                                                    style="background-color: #34005A; color:white" type="button"
                                                    data-toggle="collapse" data-target="#signatoryCollapse12"
                                                    aria-expanded="false" aria-controls="signatoryCollapse12">
                                                    Entry 1
                                                </button>
                                            </h2>
                                            <div id="signatoryCollapse12" class="collapse"
                                                aria-labelledby="signatoryHeading12">
                                                <div class="accordion-body">
                                                    <!-- Your content for signatory entry goes here -->
                                                    <div class="row mb-2" id="signatoryDetailsContainer12">
                                                        <div class="container my-1">
                                                            <div class="col-lg-6 spacing-right mb-3">
                                                                Category <br>
                                                                <select class="form-control" name="fee_category[]"
                                                                    style="width: 100%;">
                                                                    <option value="Legal Fee">Legal Fee</option>
                                                                    <option value="Speed Money">Speed Money</option>
                                                                    <option value="Consultancy Fee">Consultancy Fee
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <h5>Withdrawal From:</h5>
                                                            <div class="col-lg-12">
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Bank Name <br> <input class="form-control" id=""
                                                                            name="wf_bank_name[]" type="text"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                                        Cheque/Instrument No. <br> <input
                                                                            class="form-control" id=""
                                                                            name="wf_cheque[]" type="text"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Cheque/Instrument<br> <input
                                                                            class="form-control" id=""
                                                                            name="wf_cheque_attach[]" type="file"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Amount in figures <br> <input
                                                                            class="form-control" id=""
                                                                            name="wf_amount[]" type="text"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                                        Notes <br> <textarea class="form-control" id=""
                                                                            name="wf_notes[]" type="text"
                                                                            placeholder="..."
                                                                            style="width: 100%;"></textarea>
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                                        Attachments <br> <input class="form-control"
                                                                            id="" name="wf_attach[]" type="file"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <h5>Withdrawal By :</h5>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Name <br> <input class="form-control" id=""
                                                                            name="wb_name[]" type="text"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                                        Employee ID <br> <input class="form-control"
                                                                            id="" name="wb_id[]" type="text"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Designation <br> <input class="form-control"
                                                                            id="" name="wb_desig[]" type="text"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Cell Number <br> <input class="form-control"
                                                                            id="" name="wb_cell[]" type="text"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Email ID <br> <input class="form-control" id=""
                                                                            name="wb_email[]" type="text"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                                        Notes <br> <textarea class="form-control" id=""
                                                                            name="wb_notes[]" type="text"
                                                                            placeholder="..."
                                                                            style="width: 100%;"></textarea>
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Attachments <br> <input class="form-control"
                                                                            id="" name="wb_attach[]" type="file"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <h5 class="mt-2">Fees :</h5>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Fees <br> <input class="form-control" id=""
                                                                            name="fee[]" type="text" placeholder="..."
                                                                            style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                                        Date of Renewal Fee Deposit <br> <input
                                                                            class="form-control" id="" name="fee_date[]"
                                                                            type="date" placeholder="..."
                                                                            style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Name of bank<br> <input class="form-control"
                                                                            id="" name="fee_bank[]" type="text"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Instrument Number <br> <input
                                                                            class="form-control" id="" name="fee_ins[]"
                                                                            type="text" placeholder="..."
                                                                            style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                                        Deposit Slip Attachment <br> <input
                                                                            class="form-control" id="" name="fee_slip[]"
                                                                            type="file" placeholder="..."
                                                                            style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Notes <br> <textarea class="form-control" id=""
                                                                            name="fee_notes[]" type="text"
                                                                            placeholder="..."
                                                                            style="width: 100%;"></textarea>
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                                        Attachments <br> <input class="form-control"
                                                                            id="" name="fee_attach[]" type="file"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <h5 class="mt-2">Deposited By :</h5>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Name <br> <input class="form-control" id=""
                                                                            name="db_name[]" type="text"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                                        Employee ID <br> <input class="form-control"
                                                                            id="" name="db_id[]" type="text"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Designation <br> <input class="form-control"
                                                                            id="" name="db_desig[]" type="text"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Cell Number <br> <input class="form-control"
                                                                            id="" name="db_cell[]" type="text"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Email ID <br> <input class="form-control" id=""
                                                                            name="db_email[]" type="text"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                                        Notes <br> <textarea class="form-control" id=""
                                                                            name="db_notes[]" type="text"
                                                                            placeholder="..."
                                                                            style="width: 100%;"></textarea>
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Attachments <br> <input class="form-control"
                                                                            id="" name="db_attach[]" type="file"
                                                                            placeholder="..." style="width: 100%;">
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
                                            <button type="button" class="btn btn-primary" id="addSignatory12"
                                                style="height:30px; width:150px;">Add More
                                            </button>
                                        </div>
                                        <button type="button" class="btn btn-primary"
                                            id="updateSignatoryTable12">Save</button>

                                    </div>
                                </div>
                                <table class="table table-bordered mt-1" id="signatorySummaryTable12">
                                    <thead>
                                        <tr>
                                            <th>Entry</th>
                                            <th>Category</th>
                                            <th>Bank Name</th>
                                            <th>Cheque/Instrument No</th>
                                            <th>Amount in figures</th>
                                            <th>Notes</th>
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

                        <!--Laws-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="law" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control" id="" name="laws_notes" type="text"
                                            placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Attachments <br> <input class="form-control" id="" name="laws_attach"
                                            type="file" placeholder="..." style="width: 100%;">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--History-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="history" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <!-- make table of renewal history in this place -->
                            <div>
                                <table class="table table-bordered mt-1" id="signatorySummaryTable13">
                                    <thead>
                                        <tr>
                                            <th>Entry</th>
                                            <th>Initiating Date</th>
                                            <th>Notes</th>
                                            <th>Corespondence Date</th>
                                            <th>Notes</th>
                                            <th>Approval Date</th>
                                            <th>Notes</th>
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
                    <div class="footer" style="position: fixed; bottom: 0; width: 100%; background-color: #320056; padding: 10px; display: flex; justify-content: space-between; align-items: center; margin-left:-21%;">
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

        </div>
        <!-- </div> -->
        <!-- </div> -->

        <!-- </div> -->
        <!--Customer form ends here-->
        <!-- </div> -->

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

        <script>
            document.addEventListener('DOMContentLoaded', function() {

                var successMessage = '{{ session("success") }}';
                var corporateId = '{{ session("corporateId") }}';

                if (successMessage && corporateId) {
                    var url = '{{ route("viewcorporate", ":id") }}';
                    url = url.replace(':id', corporateId);
                    var popupMessage = 'Corporate data stored successfully. Please find the URL below:';

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
            var room3 = 1;

            function consultant_add_fields() {
                room3++;
                var objTo = document.getElementById('consultant_add_fields');
                var divtest = document.createElement("div");
                divtest.setAttribute("class", "third-col removeclass" + room3);
                var rdiv = 'removeclass' + room3;

                divtest.innerHTML = `
                <div class="row">
                    <h5>Consultant Details :</h5>
                    <div class=" row mb-2">
                        <div class="col-lg-4 spacing-right">
                            <input type="hidden" name="c_id[]" value="${room3}">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Name  <br> <input class="form-control" id="" name="c_name[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Designation <br> <input class="form-control" id="" name="c_desig[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Organization <br> <input class="form-control" id="" name="c_org[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Cell Number <br> <input class="form-control" id="" name="c_cell[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left">
                            Email <br> <input class="form-control" id="" name="c_email[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left">
                            Consultancy Fees <br> <input class="form-control" id="" name="c_fee[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <h5>Consultant Bank Details :</h5>
                    <div class=" row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Bank Name  <br> <input class="form-control" id="" name="c_bank[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Acccount Title <br> <input class="form-control" id="" name="c_acc[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Acccount Number <br> <input class="form-control" id="" name="c_acc_num[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Cheque Book Attachment <br> <input class="form-control" id="" name="c_cheque[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Notes <br> <textarea class="form-control" id="" name="c_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Attachment <br> <input class="form-control" id="" name="c_attach[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <h5>Consultant Address</h5>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Office No <br> <input class="form-control" name="c_office[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Building <br> <input class="form-control"  name="c_building[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Block <br> <input class="form-control" name="c_block[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Area <br> <input class="form-control"  name="c_area[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            City <br> <input class="form-control" name="c_city[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Photograph of Location <br> <input class="form-control" name="c_loc[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Email <br> <input class="form-control" id="" name="c_a_email[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Website <br> <input class="form-control" id="" name="c_website[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Pin location <br> <input class="form-control" id="" name="c_pin[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Google Map <br> <input class="form-control" id="" name="c_map[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Notes <br> <textarea class="form-control" id="" name="c_ex_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Attachments <br> <input class="form-control" id="" name="c_ex_attach[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <button type="button" style="width:20%; margin-left:13px;" onclick="consultant_remove_fields(${room3})">Remove</button>
                </div>`;

                objTo.appendChild(divtest);
            }

            function consultant_remove_fields(rid) {
                $('.removeclass' + rid).remove();
            }
        </script>

        <script>
            var authorityRoom = 1;

            function authority_add_fields() {
                authorityRoom++;
                var objTo = document.getElementById('authority_add_fields');
                var divtest = document.createElement("div");
                divtest.setAttribute("class", "third-col removeclass" + authorityRoom);

                divtest.innerHTML = `
            <h5>Issuing Authority :</h5>
            <div class="row mb-2">
                <div class="col-lg-4 spacing-right">
                    <input type="hidden" name="i_id[]" value="${authorityRoom}">
                </div>
                <div class="col-lg-3 spacing-right">
                Name  <br> <input class="form-control" id="" name="i_name[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-left spacing-right">
                Designation <br> <input class="form-control" id="" name="i_desig[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                PTCL Number <br> <input class="form-control" id="" name="i_ptcl[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                Cell Number <br> <input class="form-control" id="" name="i_cell[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Email <br> <input class="form-control" id="" name="i_email[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Website <br> <input class="form-control" id="" name="i_website[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Visiting Card Front <br> <input class="form-control" id="" name="i_front[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right spacing-left">
                    Visiting Card Back <br> <input class="form-control" id="" name="i_back[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="row mb-2">
                <div class="col-lg-5 spacing-right">
                    Notes <br> <textarea class="form-control" id="" name="i_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                </div>
                <div class="col-lg-5 spacing-left">
                    Attachments <br> <input class="form-control" id="" name="i_attach[]" type="file" placeholder="..." style="width: 100%;">
                </div>
            </div>
            </div>
                <button type="button" onclick="authority_remove_fields(${authorityRoom})">Remove</button>
            `;

                objTo.appendChild(divtest);
            }

            function authority_remove_fields(rid) {
                $('.removeclass' + rid).remove();
            }

        </script>

        <script>
            var financeRoom = 1;

            function finance_add_fields() {
                financeRoom++;
                var objTo = document.getElementById('finance_add_fields');
                var divtest = document.createElement("div");
                divtest.setAttribute("class", "third-col removeclass" + financeRoom);

                divtest.innerHTML = `
                <div class="row add-more">
                    <div class="col-lg-4 spacing-right">
                        <input type="hidden" name="r_id[]" value="${financeRoom}">
                    </div>
                    <h3 style="border: 2px solid black; width: 99%; padding: 10px;"><b>Finances :</b></h3>
                    <div class="col-lg-6 spacing-right mb-3">
                        Category <br>
                        <select class="form-control" name="fee_category[]" style="width: 100%;">
                            <option value="Legal Fee">Legal Fee</option>
                            <option value="Speed Money">Speed Money</option>
                            <option value="Consultancy Fee>Consultancy Fee</option>
                        </select>
                    </div>
                    <h5>Withdrawal From:</h5>
                    <div class="col-lg-12">
                        <div class="row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Bank Name  <br> <input class="form-control" id="" name="wf_bank_name[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Cheque/Instrument No. <br> <input class="form-control" id="" name="wf_cheque[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Cheque/Instrument<br> <input class="form-control" id="" name="wf_cheque_attach[]" type="file" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Amount in figures <br> <input class="form-control" id="" name="wf_amount[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Notes <br> <textarea class="form-control" id="" name="wf_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Attachments <br> <input class="form-control" id="" name="wf_attach[]" type="file"   placeholder="..." style="width: 100%;">
                            </div>
                            <h5>Withdrawal By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name  <br> <input class="form-control" id="" name="wb_name[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input class="form-control" id="" name="wb_id[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input class="form-control" id="" name="wb_desig[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Cell Number <br> <input class="form-control" id="" name="wb_cell[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Email ID <br> <input class="form-control" id="" name="wb_email[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Notes <br> <textarea class="form-control" id="" name="wb_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input class="form-control" id="" name="wb_attach[]" type="file"   placeholder="..." style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Fees :</h5>
                            <div class="col-lg-4 spacing-right">
                                Fees  <br> <input class="form-control" id="" name="fee[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Date of Renewal Fee Deposit <br> <input class="form-control" id="" name="fee_date[]" type="date" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Name of bank<br> <input class="form-control" id="" name="fee_bank[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Instrument Number <br> <input class="form-control" id="" name="fee_ins[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Deposit Slip Attachment <br> <input class="form-control" id="" name="fee_slip[]" type="file"   placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Notes <br> <textarea class="form-control" id="" name="fee_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Attachments <br> <input class="form-control" id="" name="fee_attach[]" type="file"   placeholder="..." style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Deposited By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name  <br> <input class="form-control" id="" name="db_name[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input class="form-control" id="" name="db_id[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input class="form-control" id="" name="db_desig[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Cell Number <br> <input class="form-control" id="" name="db_cell[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Email ID <br> <input class="form-control" id="" name="db_email[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Notes <br> <textarea class="form-control" id="" name="db_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input class="form-control" id="" name="db_attach[]" type="file"   placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Include other "Finances" input fields here -->
                <button type="button" onclick="finance_remove_fields(${financeRoom})">Remove Finance</button>
            `;

                objTo.appendChild(divtest);
            }

            function finance_remove_fields(rid) {
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

        <!-- script for add more consultant details -->
        <script>
            $(document).ready(function () {
                // Add More Button Click Event
                $('#addSignatory10').on('click', function () {
                    var SignatoryAccordionCount10 = $('#signatoryAccordion10 .signaccordion-item10').length + 1;

                    var newSignAccordion10 = `
                            <div class="accordion-item signaccordion-item10" id="signatoryEntry10${SignatoryAccordionCount10}">
                                <h2 class="accordion-header" id="signatoryHeading10${SignatoryAccordionCount10}">
                                    <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse10${SignatoryAccordionCount10}" aria-expanded="false" aria-controls="signatoryCollapse10${SignatoryAccordionCount10}">
                                        Entry ${SignatoryAccordionCount10}
                                    </button>
                                </h2>
                                <div id="signatoryCollapse10${SignatoryAccordionCount10}" class="collapse" aria-labelledby="signatoryHeading10${SignatoryAccordionCount10}">
                                    <div class="accordion-body">
                                        <div class="row mb-2" id="signatoryDetailsContainer10">
                                            <div class="col-lg-12" id="consultant_add_fields">
                                <div class=" row mb-2">
                                    <input type="hidden" name="c_id[]" value="">
                                    <div class="col-lg-4 spacing-right">
                                        Name <br> <input class="form-control" id="" name="c_name[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Designation <br> <input class="form-control" id="" name="c_desig[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Organization <br> <input class="form-control" id="" name="c_org[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Cell Number <br> <input class="form-control" id="" name="c_cell[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Email <br> <input class="form-control" id="" name="c_email[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Consultancy Fees <br> <input class="form-control" id="" name="c_fee[]"
                                            type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <h5>Consultant Bank Details :</h5>
                                <div class=" row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Bank Name <br> <input class="form-control" id="" name="c_bank[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Acccount Title <br> <input class="form-control" id="" name="c_acc[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Acccount Number <br> <input class="form-control" id="" name="c_acc_num[]"
                                            type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Cheque Book Attachment <br> <input class="form-control" id="" name="c_cheque[]"
                                            type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Notes <br> <textarea class="form-control" id="" name="c_notes[]" type="text"
                                            placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Attachment <br> <input class="form-control" id="" name="c_attach[]" type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <h5>Consultant Address</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Office No <br> <input class="form-control" name="c_office[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Building <br> <input class="form-control" name="c_building[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Block <br> <input class="form-control" name="c_block[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Area <br> <input class="form-control" name="c_area[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        City <br> <input class="form-control" name="c_city[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Photograph of Location <br> <input class="form-control" name="c_loc[]"
                                            type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Email <br> <input class="form-control" id="" name="c_a_email[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Website <br> <input class="form-control" id="" name="c_website[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Pin location <br> <input class="form-control" id="" name="c_pin[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Google Map <br> <input class="form-control" id="" name="c_map[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Notes <br> <textarea class="form-control" id="" name="c_ex_notes[]" type="text"
                                            placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Attachments <br> <input class="form-control" id="" name="c_ex_attach[]"
                                            type="file" placeholder="..." style="width: 100%;">
                                    </div>
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
                    $(this).closest('.signaccordion-item10').remove();
                });
            });
        </script>
        <!-- script for show data of consultant details in table -->
        <script>
            $(document).ready(function () {
                // Function to update summary table for Vehicle entries
                function updateSignatorySummaryTable10() {
                    // Clear existing rows
                    $('#signatorySummaryTable10 tbody').empty();

                    // Iterate through each guard accordion item and update the summary table
                    $('.signaccordion-item10').each(function (index) {
                        var consaltant_name = $(this).find('[name="c_name[]"]').val();
                        var desg = $(this).find('[name="c_desig[]"]').val();
                        var org = $(this).find('[name="c_org[]"]').val();
                        var cell_number = $(this).find('[name="c_cell[]"]').val();
                        var email = $(this).find('[name="c_email[]"]').val();
                        var comsaltant_fees = $(this).find('[name="c_fee[]"]').val();

                        // Check if any relevant data is entered
                        if (consaltant_name || desg || org || cell_number || email || comsaltant_fees) {
                            // Add a new row to the summary table
                            $('#signatorySummaryTable10 tbody').append(`
                                        <tr>
                                            <td>${index + 1}</td>
                                            <td>${consaltant_name}</td>
                                            <td>${desg}</td>
                                            <td>${org}</td>
                                            <td>${cell_number}</td>
                                            <td>${email}</td>
                                            <td>${comsaltant_fees}</td>
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
                                    Entry ${SignatoryAccordionCount11}
                                </button>
                            </h2>
                            <div id="signatoryCollapse11${SignatoryAccordionCount11}" class="collapse" aria-labelledby="signatoryHeading11${SignatoryAccordionCount11}">
                                <div class="accordion-body">
                                    <div class="row mb-2" id="signatoryDetailsContainer11">
                                        <div class="col-lg-12" id="authority_add_fields">
                                            <div class="row mb-2">
                                                <div class="col-lg-3 spacing-right">
                                                    Name <br> <input class="form-control" id="" name="i_name[]"
                                                        type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 spacing-left spacing-right">
                                                    Designation <br> <input class="form-control" id=""
                                                        name="i_desig[]" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 spacing-right">
                                                    PTCL Number <br> <input class="form-control" id=""
                                                        name="i_ptcl[]" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 spacing-right">
                                                    Cell Number <br> <input class="form-control" id=""
                                                        name="i_cell[]" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 spacing-right">
                                                    Email <br> <input class="form-control" id=""
                                                        name="i_email[]" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 spacing-right">
                                                    Website <br> <input class="form-control" id=""
                                                        name="i_website[]" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 spacing-right">
                                                    Visiting Card Front <br> <input class="form-control" id=""
                                                        name="i_front[]" type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 spacing-right spacing-left">
                                                    Visiting Card Back <br> <input class="form-control" id=""
                                                        name="i_back[]" type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right">
                                                        Notes <br> <textarea class="form-control" id=""
                                                            name="i_notes[]" type="text" placeholder="..."
                                                            style="width: 100%;"></textarea>
                                                    </div>
                                                    <div class="col-lg-5 spacing-left">
                                                        Attachments <br> <input class="form-control" id=""
                                                            name="i_attach[]" type="file" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                </div>
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
        <!-- Script for Issuing Authority in Table -->
        <script>
            $(document).ready(function () {
                // Function to update summary table for Vehicle entries
                function updateSignatorySummaryTable11() {
                    // Clear existing rows
                    $('#signatorySummaryTable11 tbody').empty();

                    // Iterate through each guard accordion item and update the summary table
                    $('.signaccordion-item11').each(function (index) {
                        var name = $(this).find('[name="i_name[]"]').val();
                        var designation = $(this).find('[name="i_desig[]"]').val();
                        var PTCL_Number = $(this).find('[name="i_ptcl[]"]').val();
                        var Cell_Number = $(this).find('[name="i_cell[]"]').val();
                        var Email = $(this).find('[name="i_email[]"]').val();
                        var Website = $(this).find('[name="i_website[]"]').val();
                        var Notes = $(this).find('[name="i_notes[]"]').val();

                        // Check if any relevant data is entered
                        if (name || designation || PTCL_Number || Cell_Number || Email || Website || Notes) {
                            // Add a new row to the summary table
                            $('#signatorySummaryTable11 tbody').append(`
                                        <tr>
                                            <td>${index + 1}</td>
                                            <td>${name}</td>
                                            <td>${designation}</td>
                                            <td>${PTCL_Number}</td>
                                            <td>${Cell_Number}</td>
                                            <td>${Email}</td>
                                            <td>${Website}</td>
                                            <td>${Notes}</td>
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
                                            Entry ${SignatoryAccordionCount12}
                                        </button>
                                    </h2>
                                    <div id="signatoryCollapse12${SignatoryAccordionCount12}" class="collapse" aria-labelledby="signatoryHeading12${SignatoryAccordionCount12}">
                                        <div class="accordion-body">
                                            <div class="row mb-2" id="signatoryDetailsContainer12">
                                                <div class="container my-1">
                                                    <div class="col-lg-6 spacing-right mb-3">
                                                        Category <br>
                                                        <select class="form-control" name="fee_category[]" style="width: 100%;">
                                                            <option value="Legal Fee">Legal Fee</option>
                                                            <option value="Speed Money">Speed Money</option>
                                                            <option value="Consultancy Fee">Consultancy Fee</option>
                                                        </select>
                                                    </div>
                                                    <h5>Withdrawal From:</h5>
                                                    <div class="col-lg-12">
                                                        <div class="row mb-2">
                                                            <div class="col-lg-4 spacing-right">
                                                                Bank Name <br> <input class="form-control" id="" name="wf_bank_name[]"
                                                                    type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Cheque/Instrument No. <br> <input class="form-control" id=""
                                                                    name="wf_cheque[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Cheque/Instrument<br> <input class="form-control" id=""
                                                                    name="wf_cheque_attach[]" type="file" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Amount in figures <br> <input class="form-control" id=""
                                                                    name="wf_amount[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Notes <br> <textarea class="form-control" id="" name="wf_notes[]"
                                                                    type="text" placeholder="..." style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Attachments <br> <input class="form-control" id="" name="wf_attach[]"
                                                                    type="file" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <h5>Withdrawal By :</h5>
                                                            <div class="col-lg-4 spacing-right">
                                                                Name <br> <input class="form-control" id="" name="wb_name[]" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Employee ID <br> <input class="form-control" id="" name="wb_id[]"
                                                                    type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Designation <br> <input class="form-control" id="" name="wb_desig[]"
                                                                    type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Cell Number <br> <input class="form-control" id="" name="wb_cell[]"
                                                                    type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Email ID <br> <input class="form-control" id="" name="wb_email[]"
                                                                    type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Notes <br> <textarea class="form-control" id="" name="wb_notes[]"
                                                                    type="text" placeholder="..." style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Attachments <br> <input class="form-control" id="" name="wb_attach[]"
                                                                    type="file" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <h5 class="mt-2">Fees :</h5>
                                                            <div class="col-lg-4 spacing-right">
                                                                Fees <br> <input class="form-control" id="" name="fee[]" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Date of Renewal Fee Deposit <br> <input class="form-control" id=""
                                                                    name="fee_date[]" type="date" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Name of bank<br> <input class="form-control" id="" name="fee_bank[]"
                                                                    type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Instrument Number <br> <input class="form-control" id=""
                                                                    name="fee_ins[]" type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Deposit Slip Attachment <br> <input class="form-control" id=""
                                                                    name="fee_slip[]" type="file" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Notes <br> <textarea class="form-control" id="" name="fee_notes[]"
                                                                    type="text" placeholder="..." style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Attachments <br> <input class="form-control" id="" name="fee_attach[]"
                                                                    type="file" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <h5 class="mt-2">Deposited By :</h5>
                                                            <div class="col-lg-4 spacing-right">
                                                                Name <br> <input class="form-control" id="" name="db_name[]" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Employee ID <br> <input class="form-control" id="" name="db_id[]"
                                                                    type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Designation <br> <input class="form-control" id="" name="db_desig[]"
                                                                    type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Cell Number <br> <input class="form-control" id="" name="db_cell[]"
                                                                    type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Email ID <br> <input class="form-control" id="" name="db_email[]"
                                                                    type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Notes <br> <textarea class="form-control" id="" name="db_notes[]"
                                                                    type="text" placeholder="..." style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Attachments <br> <input class="form-control" id="" name="db_attach[]"
                                                                    type="file" placeholder="..." style="width: 100%;">
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
                function updateSignatorySummaryTable12() {
                    // Clear existing rows
                    $('#signatorySummaryTable12 tbody').empty();

                    // Iterate through each guard accordion item and update the summary table
                    $('.signaccordion-item12').each(function (index) {
                        var Category = $(this).find('[name="fee_category[]"]').val();
                        var Bank_Name = $(this).find('[name="wf_bank_name[]"]').val();
                        var Cheque_Instrument = $(this).find('[name="wf_cheque[]"]').val();
                        var Amount_in_figures = $(this).find('[name="wf_amount[]"]').val();
                        var Notes = $(this).find('[name="wf_notes[]"]').val();
                        console.log(Category);
                        console.log(Bank_Name);
                        console.log(Cheque_Instrument);
                        // Check if any relevant data is entered
                        if (Category || Bank_Name || Cheque_Instrument || Amount_in_figures || Notes) {
                            // Add a new row to the summary table
                            $('#signatorySummaryTable12 tbody').append(`
                                            <tr>
                                                <td>${index + 1}</td>
                                                <td>${Category}</td>
                                                <td>${Bank_Name}</td>
                                                <td>${Cheque_Instrument}</td>
                                                <td>${Amount_in_figures}</td>
                                                <td>${Notes}</td>
                                                <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                                                <!-- Add more columns as needed -->
                                            </tr>
                                        `);
                        }
                    });
                }

                // Add More Signatory Button Click Event
                $('#addSignatory12').on('click', function () {
                    var signatoryEntryCount12 = $('#signatoryAccordion12 .signaccordion-item12').length + 1;

                    var newSignatoryEntry12 = `
                                    <!-- Your existing signatory accordion HTML goes here -->

                                `;
                    console.log('Adding signatory entry:', signatoryEntryCount12);
                    $('#signatoryAccordion12').append(newSignatoryEntry12);
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
                $(document).on('click', '.removeSignatoryAccordion', function () {
                    $(this).closest('.signaccordion-item12').remove();
                    // Update the signatory summary table
                    updateSignatorySummaryTable12();
                });

                // Prevent the default behavior of the Add More Signatory button
                $('#addSignatory12').on('click', function (event) {
                    event.preventDefault();
                });
            });
        </script>
        <!-- Script for renewal history table  -->
        <script>
            $(document).ready(function () {
                // Function to update summary table for Vehicle entries
                function updateSignatorySummaryTable13() {
                    // Clear existing rows
                    $('#signatorySummaryTable13 tbody').empty();

                    // Iterate through each guard accordion item and update the summary table
                    $('.renewal-detials').each(function (index) {
                        var Initiating_Date = $(this).find('[name="chamber_application_date"]').val();
                        var ch_app_Notes = $(this).find('[name="chamber_application_notes"]').val();
                        var Corespondence_Date = $(this).find('[name="chamber_corespondence_date"]').val();
                        var ch_cr_Notes = $(this).find('[name="chamber_corespondence_notes"]').val();
                        var Approval_Date = $(this).find('[name="chamber_approval_date"]').val();
                        var ch_appr_Notes = $(this).find('[name="chamber_approval_notes"]').val();

                        // Check if any relevant data is entered
                        if (Initiating_Date || ch_app_Notes || Corespondence_Date || ch_cr_Notes || Approval_Date || ch_appr_Notes) {
                            // Add a new row to the summary table
                            $('#signatorySummaryTable13 tbody').append(`
                                        <tr>
                                            <td>${index + 1}</td>
                                            <td>${Initiating_Date}</td>
                                            <td>${ch_app_Notes}</td>
                                            <td>${Corespondence_Date}</td>
                                            <td>${ch_cr_Notes}</td>
                                            <td>${Approval_Date}</td>
                                            <td>${ch_appr_Notes}</td>
                                            <!-- Add more columns as needed -->
                                        </tr>
                                    `);
                        }
                    });
                }

                // Update Signatory Table Button Click Event
                $('#updateSignatoryTable13').on('click', function () {
                    // Update the signatory summary table
                    console.log("clicked save");
                    updateSignatorySummaryTable13();
                });


                // Prevent the default behavior of the Add More Signatory button
                $('#addSignatory13').on('click', function (event) {
                    event.preventDefault();
                });
            });
        </script>


</body>



</html>
