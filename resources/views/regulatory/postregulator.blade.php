@include('layouts.header')
@yield('main')
<!--Customer Form-->
<div class="customer_form">
@include('headerlogout')
    <!--Popup model for User new entry-->
    <!-- <div class="modal fade" id="add_user">  -->
    <!-- <div class="modal-dialog" role="document" style="max-width: 75%;"> -->
    <!-- <div class="modal-content"> -->
    <div class="modal-header border-0">
          <div style="display:flex; column-gap:10px; align-items:center">
             <button type="button" class="btn btn-link" onclick="history.back()">
                <i class="bi bi-arrow-left"></i>
            </button>
           <h5 class="mt-3" style="font-weight: 700;">Regulator</h5>
        </div>
      

        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> -->
    </div>
    <!-- <div class="modal-body"> -->
    <section>

        <form action="{{ route('submit_regulator') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="row mb-2" style="margin-left: 20px;">
                    <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
                      <h5>Regulator Activation Status</h5>
                      <div class="form-check form-check-inline" style="margin-right: 90px;">
                        <input class="form-check-input mr-2" type="radio" name="regulator_activation" value="1" id="activeRadio">
                        <label class="form-check-label" for="activeRadio">Active</label>
                        <input class="form-check-input ml-3 mr-2" type="radio" name="regulator_activation" value="0" id="inactiveRadio">
                        <label class="form-check-label" for="inactiveRadio">Inactive</label>
                      </div>
                    </div>
                </div>

            </div>
            <div class=" row main-content div">
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Regulatory ID <br> <input class="form-control mt-1" id="head_office_name" name="reg_id"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Type <br> <input class="form-control mt-1" id="head_office_name" name="reg_type" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right ">
                            Jurisdiction <br> <input class="form-control mt-1" id="head_office_name" name="jurisdiction"
                                type="text" placeholder="..." style="width: 100%; ">
                        </div>
                        <div class="col-lg-4  spacing-right mt-3">
                            Department <br> <input class="form-control mt-1" id="head_office_email" name="deptartment"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4  spacing-right mt-3">
                            Section <br> <input class="form-control mt-1" id="head_office_email" name="section"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            License No <br> <input class="form-control mt-1" id="head_office_name" name="license_no"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Document No <br> <input class="form-control mt-1" id="head_office_name" name="document_no"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Latest License Attachment <br> <input class="form-control mt-1" id="head_office_name"
                                name="license_attach[]" type="file" placeholder="..." style="width: 100%;" multiple>
                        </div>

                        <div class="col-lg-4 spacing-right mt-3">
                            Validity from : <br> <input class="form-control mt-1" id="head_office_name"
                                name="validity_from" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Expiry Date <br> <input class="form-control mt-1" id="head_office_name" name="expiry_date"
                                type="date" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right mt-3">
                            Notes : <br> <textarea class="form-control mt-1" id="head_office_name" name="notes"
                                type="text" placeholder="..." style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Attachments <br> <input class="form-control mt-1" id="head_office_name" name="attachments[]"
                                type="file" multiple placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                </div>

            </div>

            <!--Tabs forDetails-->

            <nav>
                <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#operating" role="tab"
                        aria-controls="nav-home" aria-selected="true">Operating License Details</a>
                    <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#weapon" role="tab"
                        aria-controls="nav-home" aria-selected="true">Weapon License Details</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#any_other" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Any Other License Details</a>

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
                <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="operating" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <nav>
                        <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#consultant"
                                role="tab" aria-controls="nav-home" aria-selected="true">Consultant Details
                            </a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#address"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Address
                            </a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#issuing"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Issuing
                                Authority</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                href="#operating_renewals" role="tab" aria-controls="nav-contact"
                                aria-selected="false">Operating License
                                Renewals</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#laws" role="tab"
                                aria-controls="nav-contact" aria-selected="false">Laws</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#history"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Renewal History</a>
                        </div>
                    </nav>

                    <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
                        <!--Consultant Details-->
                        <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="consultant" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="container my-1">
                                <div class="accordion" id="signatoryAccordion17">
                                    <!-- Initial Accordion Item -->
                                    <div class="accordion-item signaccordion-item17" id="signatoryEntry17">
                                        <h2 class="accordion-header" id="signatoryHeading17"
                                            style="color: white">
                                            <button class="accordion-button"
                                                style="background-color: #34005A; color:white" type="button"
                                                data-toggle="collapse" data-target="#signatoryCollapse17"
                                                aria-expanded="false" aria-controls="signatoryCollapse17">
                                                Entry 1 
                                            </button>
                                        </h2>
                                        <div id="signatoryCollapse17" class="collapse"
                                            aria-labelledby="signatoryHeading17">
                                            <div class="accordion-body">
                                                <!-- Your content for signatory entry goes here -->
                                                <div class="row mb-2" id="signatoryDetailsContainer17">
                                                    <div class=" row mb-2">
                                                        <div class="col-lg-4 spacing-right">
                                                            Consultant Name <br> <input
                                                                class="form-control mt-1" id="head_office_name"
                                                                name="oper_name[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right">
                                                            Designation <br> <input class="form-control mt-1"
                                                                id="head_office_email" name="oper_desig[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right">
                                                            Organization <br> <input class="form-control mt-1"
                                                                id="head_office_name" name="oper_org[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right mt-3">
                                                            Cell Number <br> <input class="form-control mt-1"
                                                                id="head_office_name" name="oper_cell[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left mt-3">
                                                            Email <br> <input class="form-control mt-1"
                                                                id="head_office_name" name="oper_email[]"
                                                                type="text" placeholder="..."
                                                                style="width: 103%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right mt-3">
                                                            Consultancy Fees <br> <input
                                                                class="form-control mt-1" id="head_office_name"
                                                                name="oper_fee[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right mt-3">
                                                            Visiting Card Front <br> <input
                                                                class="form-control mt-1" id="head_office_name"
                                                                name="oper_front[]" type="file" multiple
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right spacing-left mt-3">
                                                            Visiting Card Back <br> <input
                                                                class="form-control mt-1" id="head_office_name"
                                                                name="oper_back[]" type="file" placeholder="..."
                                                                style="width: 100%;" multiple>
                                                        </div>
                                                    </div>
                                                    <h5>Consultant Bank Details :</h5>
                                                    <div class=" row ">
                                                        <div class="col-lg-4 spacing-right">
                                                            Bank Name <br> <input class="form-control mt-1"
                                                                id="head_office_name" name="oper_bank[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right">
                                                            Account Title <br> <input class="form-control mt-1"
                                                                id="head_office_email" name="oper_account[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right">
                                                            Account Number <br> <input class="form-control mt-1"
                                                                id="head_office_email" name="oper_acc_no[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-right mt-3">
                                                            Any Agreed Financials <br> <input
                                                                class="form-control mt-1" id="head_office_email"
                                                                name="oper_fin[]" type="file" placeholder="..."
                                                                style="width: 100%;" multiple>
                                                        </div>

                                                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                            Notes <br> <textarea class="form-control mt-1" id=""
                                                                name="oper_notes[]" type="text"
                                                                placeholder="..."
                                                                style="width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                            Attachment <br> <input class="form-control mt-1"
                                                                id="head_office_email" name="oper_attachments[]"
                                                                type="file" placeholder="..."
                                                                style="width: 100%;" multiple>
                                                        </div>
                                                    </div>
                                                    <h5>Consultant Address</h5>
                                                <div class="col-lg-12">
                                                        <div class="row mb-2">
                                                        <div class="col-lg-4 spacing-right ">
                                                            Office No <br> <input class="form-control mt-1"
                                                                id="head_office_cell_no" name="oper_office[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left">
                                                            Building <br> <input class="form-control mt-1"
                                                                id="head_office_cell_no" name="oper_build[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                   
                                                
                                                   
                                                        <div class="col-lg-4 spacing-right mt-2">
                                                            Block <br> <input class="form-control mt-1"
                                                                id="head_office_cell_no" name="oper_block[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left mt-2">
                                                            Area <br> <input class="form-control mt-1"
                                                                id="head_office_cell_no" name="oper_area[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                   
                                                        <div class="col-lg-4 spacing-right mt-2">
                                                            City <br> <input class="form-control mt-1"
                                                                id="head_office_cell_no" name="oper_city[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left mt-2">
                                                            Photograph of Building <br> <input
                                                                class="form-control mt-1" id=""
                                                                name="oper_photo[]" type="file"
                                                                placeholder="..." style="width: 100%;" multiple>
                                                        </div>
                                                    
                                                        <div class="col-lg-4 spacing-right mt-2">
                                                            Email <br> <input class="form-control mt-1" id=""
                                                                name="oper_a_email[]" type="email"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left mt-2">
                                                            Website <br> <input class="form-control mt-1" id=""
                                                                name="oper_web[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                   
                                                        <div class="col-lg-4 spacing-right mt-2">
                                                            Pin location <br> <input class="form-control mt-1"
                                                                id="" name="oper_pin[]" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left mt-2">
                                                            GPS <br> <input class="form-control mt-1" id=""
                                                                name="oper_gps[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                   
                                                        <div class="col-lg-4 spacing-right mt-2">
                                                            Notes <br> <textarea class="form-control mt-1" id=""
                                                                name="oper_ex_notes[]" type="text"
                                                                placeholder="..."
                                                                style="width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-lg-4 spacing-left mt-2">
                                                            Attachments <br> <input class="form-control mt-1"
                                                                id="" name="oper_ex_attach[]" type="file"
                                                                placeholder="..." style="width: 100%;" multiple>
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
                                        <button type="button" class="btn btn-primary" id="addSignatory17"
                                            style="height:30px; width:150px;">Add More
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-primary"
                                        id="updateSignatoryTable17">Save</button>
                                </div>
                            </div>
                            <table class="table table-bordered mt-1" id="signatorySummaryTable17">
                                <thead>
                                    <tr>
                                        <th>Entry</th>
                                        <th>Consultant Name</th>
                                        <th>Designation</th>
                                        <th>Organization</th>
                                        <th>Cell No</th>
                                        <th>Email</th>
                                        <th>Consultant Fees</th>
                                        <th>View</th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Summary data will be added here dynamically -->
                                </tbody>
                            </table>

                        </div>
                        <!--Address-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="address" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="col-lg-12 spacing-left">
                                <h5>Home Department Address</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right ">
                                        Office No <br> <input class="form-control mt-1" id="head_office_cell_no"
                                            name="oper_home_office" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Building <br> <input class="form-control mt-1" id="head_office_cell_no"
                                            name="oper_home_build" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                              
                                    <div class="col-lg-4 spacing-right mt-2">
                                        Block <br> <input class="form-control mt-1" id="head_office_cell_no"
                                            name="oper_home_block" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left mt-2">
                                        Area <br> <input class="form-control mt-1" id="head_office_cell_no"
                                            name="oper_home_area" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                               
                                    <div class="col-lg-4 spacing-right mt-2">
                                        City <br> <input class="form-control mt-1" id="head_office_cell_no"
                                            name="oper_home_city" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left mt-2">
                                        Photograph of Building <br> <input class="form-control mt-1" id=""
                                            name="oper_home_photo" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                               
                                    <div class="col-lg-4 spacing-right mt-2">
                                        Email <br> <input class="form-control mt-1" id="" name="oper_home_email"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left mt-2">
                                        Website <br> <input class="form-control mt-1" id="" name="oper_home_web"
                                            type="text" placeholder="..." style="width: 100%;">
                                    </div>
                               
                                    <div class="col-lg-4 spacing-right">
                                        Pin location <br> <input class="form-control" id="" name="oper_home_pin"
                                            type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        GPS <br> <input class="form-control" id="" name="oper_home_gps" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control" id="head_office_name"
                                            name="oper_home_notes" type="text" placeholder="..."
                                            style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Attachments <br> <input class="form-control" id="head_office_email"
                                            name="oper_home_attach[]" type="file" placeholder="..." style="width: 100%;"
                                            multiple>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--Issuing Authority-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="issuing" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="container my-1">
                                <div class="accordion" id="signatoryAccordion18">
                                    <!-- Initial Accordion Item -->
                                    <div class="accordion-item signaccordion-item18" id="signatoryEntry18">
                                        <h2 class="accordion-header" id="signatoryHeading18"
                                            style="color: white">
                                            <button class="accordion-button"
                                                style="background-color: #34005A; color:white" type="button"
                                                data-toggle="collapse" data-target="#signatoryCollapse18"
                                                aria-expanded="false" aria-controls="signatoryCollapse18">
                                                Entry 1
                                            </button>
                                        </h2>
                                        <div id="signatoryCollapse18" class="collapse"
                                            aria-labelledby="signatoryHeading18">
                                            <div class="accordion-body">
                                                <!-- Your content for signatory entry goes here -->
                                                <div class="row mb-2" id="signatoryDetailsContainer18">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-3 spacing-right">
                                                            Concerned Officer Name <br> <input
                                                                class="form-control mt-1" id="oper_cn_officer"
                                                                name="oper_iss_co_name[]" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-left spacing-right">
                                                            Designation <br> <input class="form-control mt-1"
                                                                id="oper_desig" name="oper_iss_co_desig[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right">
                                                            Department <br> <input class="form-control mt-1"
                                                                id="head_office_name" name="oper_iss_co_dept[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right">
                                                            Section <br> <input class="form-control mt-1"
                                                                id="head_office_name"
                                                                name="oper_iss_co_section[]" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right mt-3">
                                                            PTCL Number <br> <input class="form-control mt-1"
                                                                id="head_office_name" name="oper_iss_co_ptcl[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>

                                                        <div class="col-lg-3 spacing-left mt-3">
                                                            Cell Number <br> <input class="form-control mt-1"
                                                                id="head_office_name" name="oper_iss_co_cell[]"
                                                                type="text" placeholder="..."
                                                                style="width: 105%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right mt-3">
                                                            Email <br> <input class="form-control mt-1"
                                                                id="head_office_name" name="oper_iss_co_email[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right mt-3">
                                                            Website <br> <input class="form-control mt-1"
                                                                id="head_office_name" name="oper_iss_co_web[]"
                                                                type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right mt-3">
                                                            Visiting Card Front <br> <input
                                                                class="form-control mt-1" id="head_office_name"
                                                                name="oper_iss_co_front[]" type="file"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right spacing-left mt-3">
                                                            Visiting Card Back <br> <input
                                                                class="form-control mt-1" id="head_office_name"
                                                                name="oper_iss_co_back[]" type="file"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="row mb-2 mt-2">
                                                            <div class="col-lg-5 spacing-right mt-3">
                                                                Notes <br> <textarea class="form-control mt-1"
                                                                    id="head_office_name"
                                                                    name="oper_iss_co_notes[]" type="text"
                                                                    placeholder="..."
                                                                    style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-lg-5 spacing-left mt-3">
                                                                Attachments <br> <input
                                                                    class="form-control mt-1"
                                                                    id="head_office_email"
                                                                    name="oper_iss_co_attach[]" type="file"
                                                                    placeholder="..." style="width: 100%;"
                                                                    multiple>
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
                                        <button type="button" class="btn btn-primary" id="addSignatory18"
                                            style="height:30px; width:150px;">Add More
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-primary"
                                        id="updateSignatoryTable18">Save</button>
                                </div>
                            </div>
                            <table class="table table-bordered mt-1" id="signatorySummaryTable18">
                                <thead>
                                    <tr>
                                        <th>Entry</th>
                                        <th>Concerned Officer Name</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Section</th>
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
                        <!--Weapon License Renewals-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="operating_renewals" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <h5>Renewal Application : </h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Initiating Date <br> <input class="form-control mt-1" id="head_office_name"
                                            name="oper_ra_date" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Request Letter Attachment <br> <input class="form-control mt-1"
                                            id="head_office_email" name="oper_ra_letter" type="file" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Document Submitted with Renewal Application <br> <input
                                            class="form-control mt-1" id="head_office_name" name="oper_ra_doc"
                                            type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                            name="oper_ra_notes" type="text" placeholder="..."
                                            style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                            name="oper_ra_attach" type="file" placeholder="..." style="width: 103%;">
                                    </div>

                                </div>
                            </div>
                            <h5>Renewal Correspondence :</h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Correspondence Date <br> <input class="form-control mt-1" id="head_office_name"
                                            name="oper_rc_date" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Correspondence Letter Attachment <br> <input class="form-control mt-1"
                                            id="head_office_name" name="oper_rc_letter" type="file" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Document Submitted with Renewal Correspondence <br> <input
                                            class="form-control mt-1" id="head_office_name" name="oper_rc_doc"
                                            type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                            name="oper_rc_notes" type="text" placeholder="..."
                                            style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                            name="oper_rc_attach" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                            <h5>Renewal Approval :</h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Approval Date <br> <input class="form-control mt-1" id="head_office_name"
                                            name="oper_rap_date" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Approval Letter Attachment <br> <input class="form-control mt-1"
                                            id="head_office_name" name="oper_rap_letter" type="file" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Document Submitted with Renewal Approval <br> <input class="form-control mt-1"
                                            id="head_office_name" name="oper_rap_doc" type="file" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                            name="oper_rap_notes" type="text" placeholder="..."
                                            style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                            name="oper_rap_attach" type="file" placeholder="..." style="width: 100%;">
                                    </div>

                                </div>
                            </div>
                            <div id="operating_finance_add_fields">
                                <h3 style="border: 2px solid black; width: 99%; padding: 10px;"><b>Finances
                                        :</b></h3>
                                <!-- Add more Finance -->
                                <div class="container my-1">
                                    <div class="accordion" id="signatoryAccordion19">
                                        <!-- Initial Accordion Item -->
                                        <div class="accordion-item signaccordion-item19" id="signatoryEntry19">
                                            <h2 class="accordion-header" id="signatoryHeading19"
                                                style="color: white">
                                                <button class="accordion-button"
                                                    style="background-color: #34005A; color:white" type="button"
                                                    data-toggle="collapse" data-target="#signatoryCollapse19"
                                                    aria-expanded="false" aria-controls="signatoryCollapse19">
                                                    Entry 1
                                                </button>
                                            </h2>
                                            <div id="signatoryCollapse19" class="collapse"
                                                aria-labelledby="signatoryHeading19">
                                                <div class="accordion-body">
                                                    <!-- Your content for signatory entry goes here -->
                                                    <div class="row mb-2" id="signatoryDetailsContainer19">
                                                        <div class="col-lg-6 spacing-right mb-3">
                                                            Category <br>
                                                            <select class="form-control"
                                                                name="oper_fee_category[]" style="width: 100%;">
                                                                <option value=""> </option>
                                                                <option value="Legal Fee">Legal Fee</option>
                                                                <option value="Speed Money">Speed Money</option>
                                                                <option value="Consultancy Fee">Consultancy Fee
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <h5 style="margin-left:10px;">Withdrawal From:</h5>
                                                        <div class="col-lg-12">
                                                            <div class="row mb-2">
                                                                <div class="col-lg-4 spacing-right">
                                                                    Bank Name <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_bank[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div
                                                                    class="col-lg-4 spacing-left spacing-right">
                                                                    Cheque/Instrument No. <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_email"
                                                                        name="oper_finance_cheque[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Scanned copy of Cheque/Instrument<br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_copy[]" type="file"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right mt-3">
                                                                    Amount in figures <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_amount[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div
                                                                    class="col-lg-4 spacing-left spacing-right mt-3">
                                                                    Notes <br> <textarea
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_notes[]" type="text"
                                                                        placeholder="..."
                                                                        style="width: 100%;"></textarea>
                                                                </div>
                                                                <div
                                                                    class="col-lg-4 spacing-left spacing-rightmt-3">
                                                                    Attachments <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_email"
                                                                        name="oper_finance_attach[]" type="file"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <h5>Withdrawal By :</h5>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Name <br> <input class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_wb_name[]"
                                                                        type="text" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <div
                                                                    class="col-lg-4 spacing-left spacing-right">
                                                                    Employee ID <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_email"
                                                                        name="oper_finance_wb_id[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Designation <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_wb_desig[]"
                                                                        type="text" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right mt-3">
                                                                    Cell Number <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_wb_cell[]"
                                                                        type="text" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-left mt-3">
                                                                    Email ID <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_wb_email[]"
                                                                        type="text" placeholder="..."
                                                                        style="width: 103%;">
                                                                </div>
                                                                <div
                                                                    class="col-lg-4 spacing-left spacing-right mt-3">
                                                                    Notes <br> <textarea
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_wb_notes[]"
                                                                        type="text" placeholder="..."
                                                                        style="width: 100%;"></textarea>
                                                                </div>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Attachments <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_email"
                                                                        name="oper_finance_wb_attach[]"
                                                                        type="file" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <h5 class="mt-2">Fees :</h5>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Fees <br> <input class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_fee[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div
                                                                    class="col-lg-4 spacing-left spacing-right lh-lg">
                                                                    Date of Fees Deposit <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_email"
                                                                        name="oper_finance_fee_date[]"
                                                                        type="date" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right lh-lg">
                                                                    Name of bank<br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_fee_bank[]"
                                                                        type="text" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right mt-3">
                                                                    Instrument Number <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_fee_ins[]"
                                                                        type="text" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <div
                                                                    class="col-lg-4 spacing-left spacing-right mt-3">
                                                                    Deposit Slip Attachment <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_email"
                                                                        name="oper_finance_slip_attach[]"
                                                                        type="file" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right mt-3">
                                                                    Notes <br> <textarea
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_fee_notes[]"
                                                                        type="text" placeholder="..."
                                                                        style="width: 100%;"></textarea>
                                                                </div>
                                                                <div
                                                                    class="col-lg-4 spacing-left spacing-right mt-3">
                                                                    Attachments <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_email"
                                                                        name="oper_finance_fee_attach[]"
                                                                        type="file" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <h5 class="mt-2">Deposited By :</h5>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Name <br> <input class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_db_name[]"
                                                                        type="text" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <div
                                                                    class="col-lg-4 spacing-left spacing-right">
                                                                    Employee ID <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_email"
                                                                        name="oper_finance_db_id[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Designation <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_db_desig[]"
                                                                        type="text" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right mt-3">
                                                                    Cell Number <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_db_cell[]"
                                                                        type="text" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-left mt-3">
                                                                    Email ID <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_db_email[]"
                                                                        type="text" placeholder="..."
                                                                        style="width: 103%;">
                                                                </div>
                                                                <div
                                                                    class="col-lg-4 spacing-left spacing-right mt-3">
                                                                    Notes <br> <textarea
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="oper_finance_db_notes[]"
                                                                        type="text" placeholder="..."
                                                                        style="width: 100%;"></textarea>
                                                                </div>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Attachments <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_email"
                                                                        name="oper_finance_db_attach[]"
                                                                        type="file" placeholder="..."
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
                                            <button type="button" class="btn btn-primary" id="addSignatory19"
                                                style="height:30px; width:150px;">Add More
                                            </button>
                                        </div>
                                        <button type="button" class="btn btn-primary"
                                            id="updateSignatoryTable19">Save</button>
                                    </div>
                                </div>
                                <table class="table table-bordered mt-1" id="signatorySummaryTable19">
                                    <thead>
                                        <tr>
                                            <th>Entry</th>
                                            <th>Category</th>
                                            <th>Bank Name</th>
                                            <th>Cheque/Instrument No</th>
                                            <th>Amount in figure</th>
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
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="laws" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                            name="oper_laws_notes" type="text" placeholder="..."
                                            style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                            name="oper_laws_attach" type="file" placeholder="..." style="width: 100%;">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Renewals History-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="history" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <h5 style="text-align:center;">Backend Summary will be shown here </h5>
                        </div>
                    </div>

                </div>

                <!--Weapon License Details-->
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="weapon" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <nav>
                        <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#w_consultant"
                                role="tab" aria-controls="nav-home" aria-selected="true">Consultant Details
                            </a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#w_address"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Address
                            </a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#w_issuing"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Issuing
                                Authority</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                href="#w_weapon_renewals" role="tab" aria-controls="nav-contact"
                                aria-selected="false">Weapon License
                                Renewals</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#w_details"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Weapon License Details</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#w_laws"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Laws</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#w_history"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Renewal History</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#w_summary"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Weapon License Summary</a>
                        </div>
                    </nav>

                    <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
                        <!--Consultant Details-->
                        <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="w_consultant"
                            role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="container my-1">
                                <div class="accordion" id="signatoryAccordion21">
                                    <!-- Initial Accordion Item -->
                                    <div class="accordion-item signaccordion-item21" id="signatoryEntry21">
                                        <h2 class="accordion-header" id="signatoryHeading21"
                                            style="color: white">
                                            <button class="accordion-button"
                                                style="background-color: #34005A; color:white" type="button"
                                                data-toggle="collapse" data-target="#signatoryCollapse21"
                                                aria-expanded="false" aria-controls="signatoryCollapse21">
                                                Entry 1
                                            </button>
                                        </h2>
                                        <div id="signatoryCollapse21" class="collapse"
                                            aria-labelledby="signatoryHeading21">
                                            <div class="accordion-body">
                                                <!-- Your content for signatory entry goes here -->
                                                <div class="row mb-2" id="signatoryDetailsContainer21">
                                                    <div class="col-lg-12" id="weapon_consultant_add_fields">
                                                        <div class=" row mb-2">
                                                            <div class="col-lg-4 spacing-right">
                                                                Consultant Name <br> <input
                                                                    class="form-control mt-1"
                                                                    id="head_office_name" name="wep_name[]"
                                                                    type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Designation <br> <input
                                                                    class="form-control mt-1"
                                                                    id="head_office_email" name="wep_desig[]"
                                                                    type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Organization <br> <input
                                                                    class="form-control mt-1"
                                                                    id="head_office_name" name="wep_org[]"
                                                                    type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right mt-3">
                                                                Cell Number <br> <input
                                                                    class="form-control mt-1"
                                                                    id="head_office_name" name="wep_cell[]"
                                                                    type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left mt-3">
                                                                Email <br> <input class="form-control mt-1"
                                                                    id="head_office_name" name="wep_email[]"
                                                                    type="text" placeholder="..."
                                                                    style="width: 103%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right mt-3">
                                                                Consultancy Fees <br> <input
                                                                    class="form-control mt-1"
                                                                    id="head_office_name" name="wep_fee[]"
                                                                    type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right mt-3">
                                                                Visiting Card Front <br> <input
                                                                    class="form-control mt-1"
                                                                    id="head_office_name" name="wep_front[]"
                                                                    type="file" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div
                                                                class="col-lg-4 spacing-right spacing-left mt-3">
                                                                Visiting Card Back <br> <input
                                                                    class="form-control mt-1"
                                                                    id="head_office_name" name="wep_back[]"
                                                                    type="file" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <h5>Consultant Bank Details :</h5>
                                                        <div class=" row mb-2">
                                                            <div class="col-lg-4 spacing-right">
                                                                Bank Name <br> <input class="form-control mt-1"
                                                                    id="head_office_name" name="wep_bank[]"
                                                                    type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Account Title <br> <input
                                                                    class="form-control mt-1"
                                                                    id="head_office_email" name="wep_acc[]"
                                                                    type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Account Number <br> <input
                                                                    class="form-control mt-1"
                                                                    id="head_office_email" name="wep_acc_no[]"
                                                                    type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right mt-3">
                                                                Any Agreed Financials <br> <input
                                                                    class="form-control mt-1"
                                                                    id="head_office_email" name="wep_fin[]"
                                                                    type="file" placeholder="..."
                                                                    style="width: 100%;" multiple>
                                                            </div>
                                                            <div
                                                                class="col-lg-4 spacing-left spacing-right mt-3">
                                                                Notes <br> <textarea class="form-control mt-1"
                                                                    id="" name="wep_notes[]" type="text"
                                                                    placeholder="..."
                                                                    style="width: 100%;"></textarea>
                                                            </div>
                                                            <div
                                                                class="col-lg-4 spacing-left spacing-right mt-3">
                                                                Attachment <br> <input class="form-control mt-1"
                                                                    id="head_office_email" name="wep_attach[]"
                                                                    type="file" placeholder="..."
                                                                    style="width: 100%;" multiple>
                                                            </div>
                                                        </div>
                                                        <h5>Consultant Address</h5>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5 spacing-right">
                                                                Office No <br> <input class="form-control mt-1"
                                                                    id="head_office_cell_no" name="wep_office[]"
                                                                    type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left">
                                                                Building <br> <input class="form-control mt-1"
                                                                    id="head_office_cell_no" name="wep_build[]"
                                                                    type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5 spacing-right mt-2">
                                                                Block <br> <input class="form-control mt-1"
                                                                    id="head_office_cell_no" name="wep_block[]"
                                                                    type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left mt-2">
                                                                Area <br> <input class="form-control mt-1"
                                                                    id="head_office_cell_no" name="wep_area[]"
                                                                    type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5 spacing-right mt-2">
                                                                City <br> <input class="form-control mt-1"
                                                                    id="head_office_cell_no" name="wep_city[]"
                                                                    type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left mt-2">
                                                                Photograph of Building <br> <input
                                                                    class="form-control mt-1" id=""
                                                                    name="wep_photo[]" type="file"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5 spacing-right mt-2">
                                                                Email <br> <input class="form-control mt-1"
                                                                    id="" name="wep_a_email[]" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left mt-2">
                                                                Website <br> <input class="form-control mt-1"
                                                                    id="" name="wep_web[]" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5 spacing-right mt-2">
                                                                Pin location <br> <input
                                                                    class="form-control mt-1" id=""
                                                                    name="wep_pin[]" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left mt-2">
                                                                GPS <br> <input class="form-control mt-1" id=""
                                                                    name="wep_gps[]" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-lg-5 spacing-right ">
                                                                Notes <br> <textarea class="form-control mt-1"
                                                                    id="" name="wep_ex_notes[]" type="text"
                                                                    placeholder="..."
                                                                    style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-lg-5 spacing-left">
                                                                Attachments <br> <input
                                                                    class="form-control mt-1" id=""
                                                                    name="wep_ex_attach[]" type="file"
                                                                    placeholder="..." style="width: 100%;"
                                                                    multiple>
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
                                        <button type="button" class="btn btn-primary" id="addSignatory21"
                                            style="height:30px; width:150px;">Add More
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-primary"
                                        id="updateSignatoryTable21">Save</button>
                                </div>
                            </div>
                            <table class="table table-bordered mt-1" id="signatorySummaryTable21">
                                <thead>
                                    <tr>
                                        <th>Entry</th>
                                        <th>Consultant Name</th>
                                        <th>Designation</th>
                                        <th>Organization</th>
                                        <th>Cell No</th>
                                        <th>Email</th>
                                        <th>Consultant Fees</th>
                                        <th>View</th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Summary data will be added here dynamically -->
                                </tbody>
                            </table>
                        </div>
                        <!--Address-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="w_address" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="col-lg-6 spacing-left">
                                <h5>Home Department Address</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Office No <br> <input class="form-control mt-1" id="head_office_cell_no"
                                            name="wep_home_office" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Building <br> <input class="form-control mt-1" id="head_office_cell_no"
                                            name="wep_home_build" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-5 spacing-right">
                                        Block <br> <input class="form-control mt-1" id="head_office_cell_no"
                                            name="wep_home_block" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Area <br> <input class="form-control mt-1" id="head_office_cell_no"
                                            name="wep_home_area" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-5 spacing-right">
                                        City <br> <input class="form-control mt-1" id="head_office_cell_no"
                                            name="wep_home_city" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Photograph of Building <br> <input class="form-control mt-1" id=""
                                            name="wep_home_photo" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-5 spacing-right">
                                        Email <br> <input class="form-control mt-1" id="" name="wep_home_email"
                                            type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Website <br> <input class="form-control mt-1" id="" name="wep_home_email"
                                            type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-5 spacing-right">
                                        Pin location <br> <input class="form-control mt-1" id="" name="wep_home_pin"
                                            type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        GPS <br> <input class="form-control mt-1" id="" name="wep_home_pin" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-lg-5 spacing-right">
                                        Notes <br> <textarea class="form-control" id="" name="wep_home_notes"
                                            type="text" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Attachments <br> <input class="form-control" id="" name="wep_home_attach"
                                            type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Issuing Authority-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="w_issuing" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <h5 style="margin-left:12px;">Issuing Authority</h5>
                            <<div class="container my-1">
                                <div class="accordion" id="signatoryAccordion22">
                                    <!-- Initial Accordion Item -->
                                    <div class="accordion-item signaccordion-item22" id="signatoryEntry22">
                                        <h2 class="accordion-header" id="signatoryHeading22"
                                            style="color: white">
                                            <button class="accordion-button"
                                                style="background-color: #34005A; color:white" type="button"
                                                data-toggle="collapse" data-target="#signatoryCollapse22"
                                                aria-expanded="false" aria-controls="signatoryCollapse22">
                                                Entry 1
                                            </button>
                                        </h2>
                                        <div id="signatoryCollapse22" class="collapse"
                                            aria-labelledby="signatoryHeading22">
                                            <div class="accordion-body">
                                                <!-- Your content for signatory entry goes here -->
                                                <div class="row mb-2" id="signatoryDetailsContainer22">
                                                    <div id="weapon_authority_add_fields">
                                                        <div class="col-lg-12">
                                                            <div class="row mb-2">
                                                                <div class="col-lg-3 spacing-right">
                                                                    Concerned Officer Name <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_iss_co_name[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div
                                                                    class="col-lg-3 spacing-left spacing-right">
                                                                    Designation <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_email"
                                                                        name="wep_iss_co_desig[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Department <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_iss_co_dept[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Section <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_iss_co_sec[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right lh-lg">
                                                                    PTCL Number <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_iss_co_ptcl[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-left mt-3">
                                                                    Cell Number <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_iss_co_cell[]" type="text"
                                                                        placeholder="..." style="width: 107%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right mt-3">
                                                                    Email <br> <input class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_iss_co_email[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right mt-3">
                                                                    Website <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_iss_co_web[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right mt-3">
                                                                    Visiting Card Front <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_iss_co_front[]" type="file"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div
                                                                    class="col-lg-3 spacing-right spacing-left mt-3">
                                                                    Visiting Card Back <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_iss_co_back[]" type="file"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="row mb-2 mt-3">
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Notes <br> <textarea
                                                                            class="form-control mt-1" id=""
                                                                            name="wep_iss_co_notes[]"
                                                                            type="text" placeholder="..."
                                                                            style="width: 100%;"></textarea>
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left">
                                                                        Attachments <br> <input
                                                                            class="form-control mt-1" id=""
                                                                            name="wep_iss_co_attach[]"
                                                                            type="file" placeholder="..."
                                                                            style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 style="margin-left:12px;">Printing Authority</h5>
                                                        <div class="col-lg-12">
                                                            <div class="row mb-2">
                                                                <div class="col-lg-3 spacing-right">
                                                                    Concerned Officer Name <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_p_co_name[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div
                                                                    class="col-lg-3 spacing-left spacing-right">
                                                                    Designation <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_email"
                                                                        name="wep_co_p_desig[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Department <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_co_p_dept[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Section <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_co_p_sec[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right mt-3">
                                                                    PTCL Number <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_co_p_ptcl[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>

                                                                <div class="col-lg-3 spacing-left mt-3">
                                                                    Cell Number <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_co_p_cell[]" type="text"
                                                                        placeholder="..." style="width: 103%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right mt-3">
                                                                    Email <br> <input class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_co_p_email[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right mt-3">
                                                                    Website <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_co_p_web[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right mt-3">
                                                                    Visiting Card Front <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_co_p_front[]" type="file"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div
                                                                    class="col-lg-3 spacing-right spacing-left mt-3">
                                                                    Visiting Card Back <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_co_p_back[]" type="file"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col-lg-4 spacing-right">
                                                                    Notes <br> <textarea
                                                                        class="form-control mt-1"
                                                                        id="head_office_name"
                                                                        name="wep_co_p_notes[]" type="text"
                                                                        placeholder="..."
                                                                        style="width: 100%;"></textarea>
                                                                </div>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Attachments <br> <input
                                                                        class="form-control mt-1"
                                                                        id="head_office_email"
                                                                        name="wep_co_p_attach[]" type="file"
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
                                        <button type="button" class="btn btn-primary" id="addSignatory22"
                                            style="height:30px; width:150px;">Add More
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-primary"
                                        id="updateSignatoryTable22">Save</button>
                                </div>
                            </div>
                            <table class="table table-bordered mt-1" id="signatorySummaryTable22">
                                <thead>
                                    <tr>
                                        <th>Entry</th>
                                        <th>Concerned Officer Name</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Section</th>
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
                        <!--Weapon License Renewals-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="w_weapon_renewals" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <h5>Renewal Application : </h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Initiating Date <br> <input class="form-control mt-1" id="head_office_name"
                                            name="wep_ra_date" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Request Letter Attachment <br> <input class="form-control mt-1"
                                            id="head_office_email" name="wep_ra_letter" type="file" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Document Submitted with Renewal Application <br> <input
                                            class="form-control mt-1" id="wep_ra_doc" name="wep_ra_doc" type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                            name="wep_ra_notes" type="text" placeholder="..."
                                            style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_ra_attach" type="file" placeholder="..." style="width: 104%;">
                                    </div>

                                </div>
                            </div>
                            <h5>Renewal Correspondence :</h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Correspondence Date <br> <input class="form-control mt-1" id="head_office_name"
                                            name="wep_rc_date" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Correspondence Letter Attachment <br> <input class="form-control mt-1"
                                            id="head_office_name" name="wep_rc_letter" type="file" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Document Submitted with Renewal Correspondence <br> <input
                                            class="form-control mt-1" id="head_office_name" name="wep_rc_docs"
                                            type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                            name="wep_rc_notes" type="text" placeholder="..."
                                            style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_rc_attach" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                            <h5>Renewal Approval :</h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Approval Date <br> <input class="form-control mt-1" id="head_office_name"
                                            name="wep_rap_date" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Approval Letter Attachment <br> <input class="form-control mt-1"
                                            id="head_office_name" name="wep_rap_letter" type="file" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Document Submitted with Renewal Approval <br> <input class="form-control mt-1"
                                            id="head_office_name" name="wep_rap_docs" type="file" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                            name="audit_date" type="wep_rap_notes" placeholder="..."
                                            style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_rap_attach" type="file" placeholder="..." style="width: 100%;">
                                    </div>

                                </div>
                            </div>
                            <h3 style="border: 2px solid black; width: 99%; padding: 10px;"><b>Finances :</b></h3>
                            <h4 style="text-align:center;"><b>Legal Fee :</b></h4>
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <!-- add more Legal -->
                                            <div class="container my-1">
                                                <div class="accordion" id="signatoryAccordion24">
                                                    <!-- Initial Accordion Item -->
                                                    <div class="accordion-item signaccordion-item24"
                                                        id="signatoryEntry24">
                                                        <h2 class="accordion-header" id="signatoryHeading24"
                                                            style="color: white">
                                                            <button class="accordion-button"
                                                                style="background-color: #34005A; color:white"
                                                                type="button" data-toggle="collapse"
                                                                data-target="#signatoryCollapse24" aria-expanded="false"
                                                                aria-controls="signatoryCollapse24">
                                                                Entry 1
                                                            </button>
                                                        </h2>
                                                        <div id="signatoryCollapse24" class="collapse"
                                                            aria-labelledby="signatoryHeading24">
                                                            <div class="accordion-body">
                                                                <!-- Your content for signatory entry goes here -->
                                                                <div class="row mb-2" id="signatoryDetailsContainer24">
                                                                    <div class="row legal_fee">
                                                                        <h5 style="margin-left:10px;">Withdrawal From:
                                                                        </h5>
                                                                        <div class="col-lg-4 spacing-right">
                                                                            Bank Name <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_bank[]" type="text"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-4 spacing-left spacing-right">
                                                                            Cheque/Instrument No. <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_email"
                                                                                name="wep_legal_cheque[]" type="text"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right">
                                                                            Scanned copy of Cheque/Instrument<br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_copy[]" type="file"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right mt-3">
                                                                            Amount in figures <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_amount[]" type="text"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-4 spacing-left spacing-right mt-3">
                                                                            Notes <br> <textarea
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_notes[]" type="text"
                                                                                placeholder="..."
                                                                                style="width: 100%;"></textarea>
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-4 spacing-left spacing-right mt-3">
                                                                            Attachments <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_email"
                                                                                name="wep_legal_attach[]" type="file"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <h5>Withdrawal By :</h5>
                                                                        <div class="col-lg-4 spacing-right">
                                                                            Name <br> <input class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_wb_name[]" type="text"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-4 spacing-left spacing-right">
                                                                            Employee ID <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_email"
                                                                                name="wep_legal_wb_id[]" type="text"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right">
                                                                            Designation <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_wb_desig[]" type="text"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right mt-3">
                                                                            Cell Number <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_wb_cell[]" type="text"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-left mt-3">
                                                                            Email ID <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_wb_email[]" type="text"
                                                                                placeholder="..." style="width: 103%;">
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-4 spacing-left spacing-right mt-3">
                                                                            Notes <br> <textarea
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_wb_notes[]" type="text"
                                                                                placeholder="..."
                                                                                style="width: 100%;"></textarea>
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right">
                                                                            Attachments <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_email"
                                                                                name="wep_legal_wb_attach[]" type="file"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <h5 class="mt-2">Fees :</h5>
                                                                        <div class="col-lg-4 spacing-left">
                                                                            Fees A <br> <input class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_fee_a[]" type="text"
                                                                                placeholder="..." style="width: 103%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right">
                                                                            Fees B <br> <input class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_fee_b[]" type="text"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right">
                                                                            Total Fees <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_fee_t[]" type="text"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-4 spacing-left spacing-right mt-3">
                                                                            Date of Fees Deposit <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_email"
                                                                                name="wep_legal_fee_date[]" type="date"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right mt-3">
                                                                            Name of bank<br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_fee_bank[]" type="text"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right mt-3">
                                                                            Instrument Number <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_fee_ins[]" type="text"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-4 spacing-left spacing-right mt-3">
                                                                            Deposit Slip Attachment <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_email"
                                                                                name="wep_legal_fee_slip[]" type="file"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right mt-3">
                                                                            Notes <br> <textarea
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_fee_notes[]" type="text"
                                                                                placeholder="..."
                                                                                style="width: 100%;"></textarea>
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-4 spacing-left spacing-right mt-3">
                                                                            Attachments <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_email"
                                                                                name="wep_legal_fee_attach[]"
                                                                                type="file" placeholder="..."
                                                                                style="width: 100%;">
                                                                        </div>
                                                                        <h5 class="mt-2">Deposited By :</h5>
                                                                        <div class="col-lg-4 spacing-right">
                                                                            Name <br> <input class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_db_name[]" type="text"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-4 spacing-left spacing-right">
                                                                            Employee ID <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_email"
                                                                                name="wep_legal_db_id[]" type="text"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right">
                                                                            Designation <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_db_desig[]" type="text"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right mt-3">
                                                                            Cell Number <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_db_cell[]" type="text"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-left mt-3">
                                                                            Email ID <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_db_email[]" type="text"
                                                                                placeholder="..." style="width: 103%;">
                                                                        </div>
                                                                        <div
                                                                            class="col-lg-4 spacing-left spacing-right mt-3">
                                                                            Notes <br> <textarea
                                                                                class="form-control mt-1"
                                                                                id="head_office_name"
                                                                                name="wep_legal_db_notes[]" type="text"
                                                                                placeholder="..."
                                                                                style="width: 100%;"></textarea>
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right mb-3">
                                                                            Attachments <br> <input
                                                                                class="form-control mt-1"
                                                                                id="head_office_email"
                                                                                name="wep_legal_db_attach[]" type="file"
                                                                                placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div id="legalDetailsContainer"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Add More and Remove Buttons -->
                                                <div class="row my-3">
                                                    <div class="col">
                                                        <button type="button" class="btn btn-primary"
                                                            id="addSignatory24" style="height:30px; width:150px;">Add
                                                            More
                                                        </button>
                                                    </div>
                                                    <button type="button" class="btn btn-primary"
                                                        id="updateSignatoryTable24">Save</button>
                                                </div>
                                            </div>
                                            <table class="table table-bordered mt-1" id="signatorySummaryTable24">
                                                <thead>
                                                    <tr>
                                                        <th>Entry</th>
                                                        <th>Bank Name</th>
                                                        <th>Cheque/Instrument No.</th>
                                                        <th>Amount in figure</th>
                                                        <th>Notes</th>
                                                        <th>View</th>
                                                        <!-- Add more columns as needed -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Summary data will be added here dynamically -->
                                                </tbody>
                                            </table>
                                            <h3 style="border: 2px solid black; width: 99%; padding: 10px;">
                                                <b>Finances
                                                    :</b></h3>
                                            <!-- add more finance -->
                                            <div class="container my-1">
                                                <div class="accordion" id="signatoryAccordion25">
                                                    <!-- Initial Accordion Item -->
                                                    <div class="accordion-item signaccordion-item25" id="signatoryEntry25">
                                                        <h2 class="accordion-header" id="signatoryHeading25" style="color: white">
                                                            <button class="accordion-button"
                                                                style="background-color: #34005A; color:white" type="button"
                                                                data-toggle="collapse" data-target="#signatoryCollapse25"
                                                                aria-expanded="false" aria-controls="signatoryCollapse25">
                                                                Entry 1
                                                            </button>
                                                        </h2>
                                                        <div id="signatoryCollapse25" class="collapse"
                                                            aria-labelledby="signatoryHeading25">
                                                            <div class="accordion-body">
                                                                <!-- Your content for signatory entry goes here -->
                                                                <div class="row mb-2" id="signatoryDetailsContainer25">
                                                                    <div class="col-lg-6 spacing-right mb-3">
                                                                        Category <br>
                                                                        <select class="form-control" name="wep_fee_category[]"
                                                                            style="width: 100%;">
                                                                            <option value=""></option>
                                                                            <option value="Speed Money">Speed Money</option>
                                                                            <option value="Consultancy Fee">Consultancy Fee</option>
                                                                        </select>
                                                                    </div>
                                                                    <h5 style="margin-left:10px;">Withdrawal From:</h5>
                                                                    <div class="col-lg-12">
                                                                        <div class="row mb-2">
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Bank Name <br> <input class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_bank[]"
                                                                                    type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Cheque/Instrument No. <br> <input class="form-control mt-1"
                                                                                    id="head_office_email" name="wep_finance_cheque[]"
                                                                                    type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Scanned copy of Cheque/Instrument<br> <input
                                                                                    class="form-control mt-1" id="head_office_name"
                                                                                    name="wep_finance_copy[]" type="file" placeholder="..."
                                                                                    style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right mt-3">
                                                                                Amount in figures <br> <input class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_amount[]"
                                                                                    type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                                                Notes <br> <textarea class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_notes[]"
                                                                                    type="text" placeholder="..."
                                                                                    style="width: 100%;"></textarea>
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-rightmt-3">
                                                                                Attachments <br> <input class="form-control mt-1"
                                                                                    id="head_office_email" name="wep_finance_attach[]"
                                                                                    type="file" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <h5>Withdrawal By :</h5>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Name <br> <input class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_wb_name[]"
                                                                                    type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Employee ID <br> <input class="form-control mt-1"
                                                                                    id="head_office_email" name="wep_finance_wb_id[]"
                                                                                    type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Designation <br> <input class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_wb_desig[]"
                                                                                    type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right mt-3">
                                                                                Cell Number <br> <input class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_wb_cell[]"
                                                                                    type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left mt-3">
                                                                                Email ID <br> <input class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_wb_email[]"
                                                                                    type="text" placeholder="..." style="width: 103%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                                                Notes <br> <textarea class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_wb_notes[]"
                                                                                    type="text" placeholder="..."
                                                                                    style="width: 100%;"></textarea>
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Attachments <br> <input class="form-control mt-1"
                                                                                    id="head_office_email" name="wep_finance_wb_attach[]"
                                                                                    type="file" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <h5 class="mt-2">Fees :</h5>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Fees <br> <input class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_fee[]"
                                                                                    type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right lh-lg">
                                                                                Date of Fees Deposit <br> <input class="form-control mt-1"
                                                                                    id="head_office_email" name="wep_finance_fee_date[]"
                                                                                    type="date" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right lh-lg">
                                                                                Name of bank<br> <input class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_fee_bank[]"
                                                                                    type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right mt-3">
                                                                                Instrument Number <br> <input class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_fee_ins[]"
                                                                                    type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                                                Deposit Slip Attachment <br> <input
                                                                                    class="form-control mt-1" id="head_office_email"
                                                                                    name="wep_finance_slip_attach[]" type="file"
                                                                                    placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right mt-3">
                                                                                Notes <br> <textarea class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_fee_notes[]"
                                                                                    type="text" placeholder="..."
                                                                                    style="width: 100%;"></textarea>
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                                                Attachments <br> <input class="form-control mt-1"
                                                                                    id="head_office_email" name="wep_finance_fee_attach[]"
                                                                                    type="file" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <h5 class="mt-2">Deposited By :</h5>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Name <br> <input class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_db_name[]"
                                                                                    type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Employee ID <br> <input class="form-control mt-1"
                                                                                    id="head_office_email" name="wep_finance_db_id[]"
                                                                                    type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Designation <br> <input class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_db_desig[]"
                                                                                    type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right mt-3">
                                                                                Cell Number <br> <input class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_db_cell[]"
                                                                                    type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left mt-3">
                                                                                Email ID <br> <input class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_db_email[]"
                                                                                    type="text" placeholder="..." style="width: 103%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                                                Notes <br> <textarea class="form-control mt-1"
                                                                                    id="head_office_name" name="wep_finance_db_notes[]"
                                                                                    type="text" placeholder="..."
                                                                                    style="width: 100%;"></textarea>
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Attachments <br> <input class="form-control mt-1"
                                                                                    id="head_office_email" name="wep_finance_db_attach[]"
                                                                                    type="file" placeholder="..." style="width: 100%;">
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
                                                        <button type="button" class="btn btn-primary" id="addSignatory25"
                                                            style="height:30px; width:150px;">Add More
                                                        </button>
                                                    </div>
                                                    <button type="button" class="btn btn-primary"
                                                        id="updateSignatoryTable25">Save</button>
                                                </div>
                                            </div>
                                            <table class="table table-bordered mt-1" id="signatorySummaryTable25">
                                                <thead>
                                                    <tr>
                                                        <th>Entry</th>
                                                        <th>Category</th>
                                                        <th>Bank Name</th>
                                                        <th>Cheque/Instrument No</th>
                                                        <th>Amount in figure</th>
                                                        <th>Note</th>
                                                        <th>View</th>
                                                        <!-- Add more columns as needed -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Summary data will be added here dynamically -->
                                                </tbody>
                                            </table>
                                            <h3 style="border: 2px solid black; width: 99%; padding: 10px; margin-top:12px;">
                                                <b>Division :</b>
                                            </h3>
                                            <!-- add more division -->
                                            <div class="container my-1">
                                                <div class="accordion" id="signatoryAccordion26">
                                                    <!-- Initial Accordion Item -->
                                                    <div class="accordion-item signaccordion-item26" id="signatoryEntry26">
                                                        <h2 class="accordion-header" id="signatoryHeading26" style="color: white">
                                                            <button class="accordion-button"
                                                                style="background-color: #34005A; color:white" type="button"
                                                                data-toggle="collapse" data-target="#signatoryCollapse26"
                                                                aria-expanded="false" aria-controls="signatoryCollapse26">
                                                                Entry 1
                                                            </button>
                                                        </h2>
                                                        <div id="signatoryCollapse26" class="collapse"
                                                            aria-labelledby="signatoryHeading26">
                                                            <div class="accordion-body">
                                                                <!-- Your content for signatory entry goes here -->
                                                                <div class="row mb-2" id="signatoryDetailsContainer26">
                                                                    <div>
                                                                        <div class="col-lg-12">
                                                                            <div class="row mb-2">
                                                                                <div class="col-lg-4 spacing-right">
                                                                                    Category <br> <input class="form-control mt-1"
                                                                                        id="head_office_name" name="division_category[]"
                                                                                        type="text" placeholder="..." style="width: 100%;">
                                                                                </div>
                                                                                <div class="col-lg-4 spacing-right">
                                                                                    Quantity <br> <input class="form-control mt-1"
                                                                                        id="head_office_name" name="division_quantity[]"
                                                                                        type="text" placeholder="..." style="width: 100%;">
                                                                                </div>
                                                                                <div class="col-lg-4 mt-4">
                                                                                    <div class=" mb-2 d-flex align-items-center ">
                                                                                        <div class="form-check form-check-inline spacing-left ">
                                                                                            <input class="form-check-input"
                                                                                                name="division_book[]" type="checkbox"
                                                                                                id="inlineCheckbox1" value="">
                                                                                            <label class="form-check-label"
                                                                                                for="inlineCheckbox1">Book</label>
                                                                                        </div>
                                                                                        <div class="form-check form-check-inline spacing-left">
                                                                                            <input class="form-check-input"
                                                                                                name="division_card[]" type="checkbox"
                                                                                                id="inlineCheckbox2" value="">
                                                                                            <label class="form-check-label"
                                                                                                for="inlineCheckbox2">Card</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 spacing-right">
                                                                                    Caliber <br> <input class="form-control mt-1"
                                                                                        id="head_office_name" name="division_caliber[]"
                                                                                        type="text" placeholder="..." style="width: 100%;">
                                                                                </div>
                                                                                <div class="col-lg-4 spacing-right">
                                                                                    Jurisdiction: <br> <input class="form-control mt-1"
                                                                                        id="head_office_name" name="division_juris[]"
                                                                                        type="text" placeholder="..." style="width: 100%;">
                                                                                </div>
                                                                                <div class="col-lg-4 spacing-right ">
                                                                                    Sanction Letter Number <br> <input class="form-control mt-1"
                                                                                        id="head_office_name" name="division_sanc[]" type="text"
                                                                                        placeholder="..." style="width: 100%;">
                                                                                </div>
                                                                                <div class="col-lg-4 spacing-right mt-3">
                                                                                    Scanned copy of Sanction Letter: (Attachment)
                                                                                    <br> <input class="form-control mt-1" id="head_office_name"
                                                                                        name="division_sanc_copy[]" type="file"
                                                                                        placeholder="..." style="width: 100%;">
                                                                                </div>
                                                                                <div class="col-lg-4 mt-2">
                                                                                    <div class=" mb-2 d-flex align-items-center m-5">
                                                                                        <div
                                                                                            class="form-check form-check-inline spacing-left mt-2">
                                                                                            <input class="form-check-input"
                                                                                                name="division_nbp[]" type="checkbox"
                                                                                                id="inlineCheckbox1" value="">
                                                                                            <label class="form-check-label"
                                                                                                for="inlineCheckbox1">NBP</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-check form-check-inline spacing-left mt-2">
                                                                                            <input class="form-check-input" name="division_pb[]"
                                                                                                type="checkbox" id="inlineCheckbox2" value="">
                                                                                            <label class="form-check-label"
                                                                                                for="inlineCheckbox2">PB</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-4">
                                                                            <div class="col-lg-6 spacing-right">
                                                                                Notes <br> <textarea class="form-control mt-1"
                                                                                    id="head_office_name" name="division_notes[]" type="text"
                                                                                    placeholder="..." style="width: 100%;"></textarea>
                                                                            </div>
                                                                            <div class="col-lg-6 spacing-right">
                                                                                Attachments <br> <input class="form-control mt-1"
                                                                                    id="head_office_email" name="division_attach[]" type="file"
                                                                                    placeholder="..." style="width: 100%;">
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
                                                        <button type="button" class="btn btn-primary" id="addSignatory26"
                                                            style="height:30px; width:150px;">Add More
                                                        </button>
                                                    </div>
                                                    <button type="button" class="btn btn-primary"
                                                        id="updateSignatoryTable26">Save</button>
                                                </div>
                                            </div>
                                            <table class="table table-bordered mt-1" id="signatorySummaryTable26">
                                                <thead>
                                                    <tr>
                                                        <th>Entry</th>
                                                        <th>Category</th>
                                                        <th>Quantity</th>
                                                        <th>Caliber</th>
                                                        <th>Jurisdiction</th>
                                                        <th>Sanction Letter Number</th>
                                                        <th>Note</th>
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
                        <!--Weapon License Details-->
                        <div class="tab-pane fade m-3 weapon-license-item1" style="opacity: 90%;" id="w_details"
                            role="tabpanel" aria-labelledby="nav-home-tab">
                            <!-- <div class="col-lg-12" id="weapon_details_add_fields">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        License Number <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_license[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Weapon Number <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_lic_no[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Type <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_lic_type[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Caliber <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_lic_caliber[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Jurisdiction <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_lic_juris[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Tenure of Renewal <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_lic_tenure[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Cost of Renewal <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_lic_cost[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Expiry date <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_lic_expiry[]" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Sanction Date <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_lic_sancdate[]" type="date" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        License Attachment <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_lic_attach[]" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Weapon Dealer Name: <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_lic_dealername[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Vendor ID: <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_lic_vendorid[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Scanned Stamp of License
                                        <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_lic_scanned[]" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Endorsement From <br>
                                        <select class="form-control mt-1" name="wep_lic_category[]"
                                            style="width: 100%;">
                                            <option value="select">select</option>
                                            <option value="DG Office">DG Office</option>
                                            <option value="Post Office">Post Office</option>
                                        </select>
                                        Add Custom Endorsement <br>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="wep_lic_add_cus_end"
                                                id="leadcustom-category" placeholder="Enter custom lead">
                                            <button class="btn btn-primary" id="leadsubmit-category" type="button"
                                                style="margin-top: 4px;">Add</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Endorsement Date: <br> <input class="form-control mt-1" id=""
                                            name="wep_lic_endate[]" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right ">
                                        Scanned Copy of Endorsement: <br> <input class="form-control mt-1" id=""
                                            name="wep_lic_encopy[]" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-left spacing-right" style="margin-left: 5px">
                                            Notes <br> <textarea class="form-control mt-1" id=""
                                                name="wep_lic_ex_notes[]" type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right" style="margin-left: 5px">
                                            Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                                name="wep_lic_ex_attach[]" type="file" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- add more weapo License Details -->
                            <div class="container my-1">
                                <div class="accordion" id="signatoryAccordion15">
                                    <!-- Initial Accordion Item -->
                                    <div class="accordion-item signaccordion-item15" id="signatoryEntry15">
                                        <h2 class="accordion-header" id="signatoryHeading15" style="color: white">
                                            <button class="accordion-button"
                                                style="background-color: #34005A; color:white" type="button"
                                                data-toggle="collapse" data-target="#signatoryCollapse15"
                                                aria-expanded="false" aria-controls="signatoryCollapse15">
                                                Entry 1
                                            </button>
                                        </h2>
                                        <div id="signatoryCollapse15" class="collapse"
                                            aria-labelledby="signatoryHeading15">
                                            <div class="accordion-body">
                                                <!-- Your content for signatory entry goes here -->
                                                <div class="row mb-2" id="signatoryDetailsContainer15">
                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                        License Number <br> <input class="form-control mt-1"
                                                            id="head_office_email" name="wep_license[]" type="text"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                        Weapon Number <br> <input class="form-control mt-1"
                                                            id="head_office_email" name="wep_lic_no[]" type="text"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                        Type <br> <input class="form-control mt-1"
                                                            id="head_office_email" name="wep_lic_type[]" type="text"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                        Caliber <br> <input class="form-control mt-1"
                                                            id="head_office_email" name="wep_lic_caliber[]" type="text"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                        Jurisdiction <br> <input class="form-control mt-1"
                                                            id="head_office_email" name="wep_lic_juris[]" type="text"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                        Tenure of Renewal <br> <input class="form-control mt-1"
                                                            id="head_office_email" name="wep_lic_tenure[]" type="text"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                        Cost of Renewal <br> <input class="form-control mt-1"
                                                            id="head_office_email" name="wep_lic_cost[]" type="text"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                        Expiry date <br> <input class="form-control mt-1"
                                                            id="head_office_email" name="wep_lic_expiry[]" type="date"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                        Sanction Date <br> <input class="form-control mt-1"
                                                            id="head_office_email" name="wep_lic_sancdate[]" type="date"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                        License Attachment <br> <input class="form-control mt-1"
                                                            id="head_office_email" name="wep_lic_attach[]" type="file"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                        Weapon Dealer Name: <br> <input class="form-control mt-1"
                                                            id="head_office_email" name="wep_lic_dealername[]"
                                                            type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                        Vendor ID: <br> <input class="form-control mt-1"
                                                            id="head_office_email" name="wep_lic_vendorid[]" type="text"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                        Scanned Stamp of License
                                                        <br> <input class="form-control mt-1" id="head_office_email"
                                                            name="wep_lic_scanned[]" type="file" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Endorsement From <br>
                                                        <select class="form-control mt-1" name="wep_lic_category[]"
                                                            style="width: 100%;">
                                                            <option value="select">select</option>
                                                            <option value="DG Office">DG Office</option>
                                                            <option value="Post Office">Post Office</option>
                                                        </select>
                                                        Add Custom Endorsement <br>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                name="wep_lic_add_cus_end" id="leadcustom-category"
                                                                placeholder="Enter custom lead">
                                                            <button class="btn btn-primary" id="leadsubmit-category"
                                                                type="button" style="margin-top: 4px;">Add</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                        Endorsement Date: <br> <input class="form-control mt-1" id=""
                                                            name="wep_lic_endate[]" type="date" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right ">
                                                        Scanned Copy of Endorsement: <br> <input
                                                            class="form-control mt-1" id="" name="wep_lic_encopy[]"
                                                            type="file" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-4 spacing-left spacing-right"
                                                            style="margin-left: 5px">
                                                            Notes <br> <textarea class="form-control mt-1" id=""
                                                                name="wep_lic_ex_notes[]" type="text" placeholder="..."
                                                                style="width: 100%;"></textarea>
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right"
                                                            style="margin-left: 5px">
                                                            Attachments <br> <input class="form-control mt-1"
                                                                id="head_office_email" name="wep_lic_ex_attach[]"
                                                                type="file" placeholder="..." style="width: 100%;">
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
                                        <button type="button" class="btn btn-primary" id="addSignatory15"
                                            style="height:30px; width:150px;">Add More
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-primary"
                                        id="updateSignatoryTable15">Save</button>
                                </div>
                            </div>
                        </div>
                        <!--Laws-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="w_laws" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                            name="wep_laws_notes" type="text" placeholder="..."
                                            style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_laws_attach" type="file" placeholder="..." style="width: 100%;">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Renewals History-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="w_history" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <h5 style="text-align:center;">Backend Summary will be shown here </h5>
                        </div>
                        <!--Weapon License Summary-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="w_summary" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <table class="table table-bordered table-responsive mt-1" id="signatorySummaryTable15">
                                <thead>
                                    <tr>
                                        <th>s No</th>
                                        <th>License Number</th>
                                        <th>Weapon Number</th>
                                        <th>Type</th>
                                        <th>Caliber</th>
                                        <th>Jurisdiction</th>
                                        <th>Tenure of Renewal</th>
                                        <th>Cost of Renewal</th>
                                        <th>Expiry date</th>
                                        <th>Sanction Date</th>
                                        <th>License Attachment</th>
                                        <th>Weapon Dealer Name</th>
                                        <th>Vendor ID</th>
                                        <th>Scanned Stamp of License</th>
                                        <th>Endorsement From</th>
                                        <th>Endorsement Date</th>
                                        <th>Add Custom Endorsement</th>
                                        <th>Scanned Copy of Endorsement</th>
                                        <th>Notes</th>
                                        <th>Attachments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Summary data will be added here dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <!--Any other License Details-->
                <div class="tab-pane fade m-3" style="opacity: 90%;" id="any_other" role="tabpanel"
                    aria-labelledby="nav-home-tab">
                    <nav>
                        <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#a_consultant"
                                role="tab" aria-controls="nav-home" aria-selected="true">Consultant Details
                            </a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#a_address"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Address
                            </a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#a_issuing"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Issuing
                                Authority</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                href="#a_weapon_renewals" role="tab" aria-controls="nav-contact" aria-selected="false">
                                Renewals</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#a_laws"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Laws</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#a_history"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Renewal History</a>
                        </div>
                    </nav>

                    <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
                        <!--Consultant Details-->
                        <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="a_consultant"
                            role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="container my-1">
                                <div class="accordion" id="signatoryAccordion27">
                                    <!-- Initial Accordion Item -->
                                    <div class="accordion-item signaccordion-item27" id="signatoryEntry27">
                                        <h2 class="accordion-header" id="signatoryHeading27" style="color: white">
                                            <button class="accordion-button"
                                                style="background-color: #34005A; color:white" type="button"
                                                data-toggle="collapse" data-target="#signatoryCollapse27"
                                                aria-expanded="false" aria-controls="signatoryCollapse27">
                                                Entry 1
                                            </button>
                                        </h2>
                                        <div id="signatoryCollapse27" class="collapse"
                                            aria-labelledby="signatoryHeading27">
                                            <div class="accordion-body">
                                                <!-- Your content for signatory entry goes here -->
                                                <div class="row mb-2" id="signatoryDetailsContainer27">
                                                    <div class="col-lg-12" id="lisence_consultant_add_fields">
                                                        <div class=" row mb-2">
                                                            <div class="col-lg-4 spacing-right">
                                                                Consultant Name <br> <input class="form-control mt-1"
                                                                    id="head_office_name" name="other_name[]" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Designation <br> <input class="form-control mt-1" id="head_office_email"
                                                                    name="other_desig[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right">
                                                                Organization <br> <input class="form-control mt-1" id="head_office_name"
                                                                    name="other_org[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right mt-3">
                                                                Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                                                    name="other_cell[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left mt-3">
                                                                Email <br> <input class="form-control mt-1" id="head_office_name"
                                                                    name="other_email[]" type="text" placeholder="..."
                                                                    style="width: 103%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right mt-3">
                                                                Consultancy Fees <br> <input class="form-control mt-1"
                                                                    id="head_office_name" name="other_fee[]" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right mt-3">
                                                                Visiting Card Front <br> <input class="form-control mt-1"
                                                                    id="head_office_name" name="other_front[]" type="file"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right spacing-left mt-3">
                                                                Visiting Card Back <br> <input class="form-control mt-1"
                                                                    id="head_office_name" name="other_back[]" type="file"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <h5>Consultant Bank Details :</h5>
                                                        <div class=" row ">
                                                            <div class="col-lg-4 spacing-right">
                                                                Bank Name <br> <input class="form-control mt-1" id="head_office_name"
                                                                    name="other_bank[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Account Title <br> <input class="form-control mt-1"
                                                                    id="head_office_email" name="other_account[]" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                Account Number <br> <input class="form-control mt-1"
                                                                    id="head_office_email" name="other_acc_no[]" type="text"
                                                                    placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-4 spacing-right mt-3">
                                                                Any Agreed Financials <br> <input class="form-control mt-1"
                                                                    id="head_office_email" name="other_fin[]" type="file"
                                                                    placeholder="..." style="width: 100%;" multiple>
                                                            </div>

                                                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                                Notes <br> <textarea class="form-control mt-1" id=""
                                                                    name="other_notes[]" type="text" placeholder="..."
                                                                    style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                                Attachment <br> <input class="form-control mt-1" id="head_office_email"
                                                                    name="other_attachments[]" type="file" placeholder="..."
                                                                    style="width: 100%;" multiple>
                                                            </div>
                                                        </div>
                                                        <h5>Consultant Address</h5>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-5 spacing-right ">
                                                                Office No <br> <input class="form-control mt-1" id="head_office_cell_no"
                                                                    name="other_office[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left">
                                                                Building <br> <input class="form-control mt-1" id="head_office_cell_no"
                                                                    name="other_build[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-lg-5 spacing-right mt-2">
                                                                Block <br> <input class="form-control mt-1" id="head_office_cell_no"
                                                                    name="other_block[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left mt-2">
                                                                Area <br> <input class="form-control mt-1" id="head_office_cell_no"
                                                                    name="other_area[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-lg-5 spacing-right mt-2">
                                                                City <br> <input class="form-control mt-1" id="head_office_cell_no"
                                                                    name="other_city[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left mt-2">
                                                                Photograph of Building <br> <input class="form-control mt-1" id=""
                                                                    name="other_photo[]" type="file" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-5 spacing-right mt-2">
                                                                Email <br> <input class="form-control mt-1" id="" name="other_a_email[]"
                                                                    type="email" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left mt-2">
                                                                Website <br> <input class="form-control mt-1" id="" name="other_web[]"
                                                                    type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-lg-5 spacing-right mt-2">
                                                                Pin location <br> <input class="form-control mt-1" id=""
                                                                    name="other_pin[]" type="text" placeholder="..."
                                                                    style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 spacing-left mt-2">
                                                                GPS <br> <input class="form-control mt-1" id="" name="other_gps[]"
                                                                    type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-lg-5 spacing-right mt-2">
                                                                Notes <br> <textarea class="form-control mt-1" id=""
                                                                    name="other_ex_notes[]" type="text" placeholder="..."
                                                                    style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-lg-5 spacing-left mt-2">
                                                                Attachments <br> <input class="form-control mt-1" id=""
                                                                    name="other_ex_attach[]" type="file" placeholder="..."
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
                                        <button type="button" class="btn btn-primary" id="addSignatory27"
                                            style="height:30px; width:150px;">Add More
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-primary"
                                        id="updateSignatoryTable27">Save</button>
                                </div>
                            </div>
                            <table class="table table-bordered mt-1" id="signatorySummaryTable27">
                                <thead>
                                    <tr>
                                        <th>Entry</th>
                                        <th>Consultant Name</th>
                                        <th>Designation</th>
                                        <th>Organization</th>
                                        <th>Cell No</th>
                                        <th>Email</th>
                                        <th>Consultant Fee</th>
                                        <th>View</th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Summary data will be added here dynamically -->
                                </tbody>
                            </table>
                        </div>
                        <!--Address-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="a_address" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="col-lg-6 spacing-left">
                                <h5>Address</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Office No <br> <input class="form-control mt-1" id="head_office_cell_no"
                                            name="any_a_office" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Building <br> <input class="form-control mt-1" id="head_office_cell_no"
                                            name="any_a_build" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-5 spacing-right mt-2">
                                        Block <br> <input class="form-control mt-1" id="head_office_cell_no"
                                            name="any_a_block" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left mt-2">
                                        Area <br> <input class="form-control mt-1" id="head_office_cell_no"
                                            name="any_a_area" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-5 spacing-right mt-2">
                                        City <br> <input class="form-control mt-1" id="head_office_cell_no"
                                            name="any_a_city" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left mt-2">
                                        Photograph of Building <br> <input class="form-control mt-1" id=""
                                            name="any_a_photo" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-5 spacing-right mt-2">
                                        Email <br> <input class="form-control mt-1" id="" name="any_a_photo" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left mt-2">
                                        Website <br> <input class="form-control mt-1" id="" name="any_a_web" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-5 spacing-right mt-2">
                                        Pin location <br> <input class="form-control mt-1" id="" name="any_a_pin"
                                            type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left mt-2">
                                        GPS <br> <input class="form-control mt-1" id="" name="any_a_gps" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2 mt-3">
                                    <div class="col-lg-5 spacing-right ">
                                        Notes <br> <textarea class="form-control mt-1" id="" name="any_a_notes"
                                            type="text" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-5 spacing-left ">
                                        Attachments <br> <input class="form-control mt-1" id="" name="any_a_attach"
                                            type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Issuing Authority-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="a_issuing" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="container my-1">
                                <div class="accordion" id="signatoryAccordion28">
                                    <!-- Initial Accordion Item -->
                                    <div class="accordion-item signaccordion-item28" id="signatoryEntry28">
                                        <h2 class="accordion-header" id="signatoryHeading28" style="color: white">
                                            <button class="accordion-button"
                                                style="background-color: #34005A; color:white" type="button"
                                                data-toggle="collapse" data-target="#signatoryCollapse28"
                                                aria-expanded="false" aria-controls="signatoryCollapse28">
                                                Entry 1
                                            </button>
                                        </h2>
                                        <div id="signatoryCollapse28" class="collapse"
                                            aria-labelledby="signatoryHeading28">
                                            <div class="accordion-body">
                                                <!-- Your content for signatory entry goes here -->
                                                <div class="row mb-2" id="signatoryDetailsContainer28">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-3 spacing-right">
                                                            Concerned Officer Name <br> <input class="form-control mt-1"
                                                                id="other_cn_officer" name="other_iss_co_name[]" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-left spacing-right">
                                                            Designation <br> <input class="form-control mt-1" id="oper_desig"
                                                                name="other_iss_co_desig[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right">
                                                            Department <br> <input class="form-control mt-1" id="head_office_name"
                                                                name="other_iss_co_dept[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right">
                                                            Section <br> <input class="form-control mt-1" id="head_office_name"
                                                                name="other_iss_co_section[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right mt-3">
                                                            PTCL Number <br> <input class="form-control mt-1" id="head_office_name"
                                                                name="other_iss_co_ptcl[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>

                                                        <div class="col-lg-3 spacing-left mt-3">
                                                            Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                                                name="other_iss_co_cell[]" type="text" placeholder="..."
                                                                style="width: 105%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right mt-3">
                                                            Email <br> <input class="form-control mt-1" id="head_office_name"
                                                                name="other_iss_co_email[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right mt-3">
                                                            Website <br> <input class="form-control mt-1" id="head_office_name"
                                                                name="other_iss_co_web[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right mt-3">
                                                            Visiting Card Front <br> <input class="form-control mt-1"
                                                                id="head_office_name" name="other_iss_co_front[]" type="file"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right spacing-left mt-3">
                                                            Visiting Card Back <br> <input class="form-control mt-1"
                                                                id="head_office_name" name="other_iss_co_back[]" type="file"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="row mb-2 mt-2">
                                                            <div class="col-lg-5 spacing-right mt-3">
                                                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                                                    name="other_iss_co_notes[]" type="text" placeholder="..."
                                                                    style="width: 100%;"></textarea>
                                                            </div>
                                                            <div class="col-lg-5 spacing-left mt-3">
                                                                Attachments <br> <input class="form-control mt-1"
                                                                    id="head_office_email" name="other_iss_co_attach[]" type="file"
                                                                    placeholder="..." style="width: 100%;">
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
                                        <button type="button" class="btn btn-primary" id="addSignatory28"
                                            style="height:30px; width:150px;">Add More
                                        </button>
                                    </div>
                                    <button type="button" class="btn btn-primary"
                                        id="updateSignatoryTable28">Save</button>
                                </div>
                            </div>

                            <table class="table table-bordered mt-1" id="signatorySummaryTable28">
                                <thead>
                                    <tr>
                                        <th>Entry</th>
                                        <th>Concerned Officer Name</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Section</th>
                                        <th>PTCL Number</th>
                                        <th>Cell Number</th>
                                        <th>Email</th>
                                        <th>Website</th>
                                        <th>Note</th>
                                        <th>View</th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Summary data will be added here dynamically -->
                                </tbody>
                            </table>

                            <div class="new_branch mt-2">
                                <button type="button" id="add_new_renewal_btn">
                                    Submit
                                </button>
                            </div>
                        </div>
                        <!--Renewals-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="a_weapon_renewals" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <h5>Renewal Application : </h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Initiating Date <br> <input class="form-control mt-1" id="head_office_name"
                                            name="any_ra_date" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Request Letter Attachment <br> <input class="form-control mt-1"
                                            id="head_office_email" name="any_ra_letter" type="file" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Document Submitted with Renewal Application <br> <input
                                            class="form-control mt-1" id="any_ra_docs" name="audit_file" type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                            name="any_ra_notes" type="text" placeholder="..."
                                            style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                            name="any_ra_attach" type="file" placeholder="..." style="width: 103%;">
                                    </div>

                                </div>
                            </div>
                            <h5>Renewal Correspondence :</h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Correspondence Date <br> <input class="form-control mt-1" id="head_office_name"
                                            name="any_rc_date" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Correspondence Letter Attachment <br> <input class="form-control mt-1"
                                            id="head_office_name" name="any_rc_letter" type="file" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Document Submitted with Renewal Correspondence <br> <input
                                            class="form-control mt-1" id="head_office_name" name="any_rc_docs"
                                            type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                            name="any_rc_notes" type="text" placeholder="..."
                                            style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                            name="any_rc_attach" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                            <h5>Renewal Approval :</h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Approval Date <br> <input class="form-control mt-1" id="head_office_name"
                                            name="any_rap_date" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Approval Letter Attachment <br> <input class="form-control mt-1"
                                            id="head_office_name" name="any_rap_letter" type="file" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Document Submitted with Renewal Approval <br> <input class="form-control mt-1"
                                            id="head_office_name" name="any_rap_docs" type="file" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                            name="any_rap_notes" type="text" placeholder="..."
                                            style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                            name="any_rap_attach" type="file" placeholder="..." style="width: 100%;">
                                    </div>

                                </div>
                            </div>
                            <div id="lisence_finance_add_fields">
                                <h3 style="border: 2px solid black; width: 99%; padding: 10px;"><b>Finances
                                        :</b></h3>
                                <!-- add more finance -->
                                <div class="container my-1">
                                    <div class="accordion" id="signatoryAccordion29">
                                        <!-- Initial Accordion Item -->
                                        <div class="accordion-item signaccordion-item29" id="signatoryEntry29">
                                            <h2 class="accordion-header" id="signatoryHeading29" style="color: white">
                                                <button class="accordion-button"
                                                    style="background-color: #34005A; color:white" type="button"
                                                    data-toggle="collapse" data-target="#signatoryCollapse29"
                                                    aria-expanded="false" aria-controls="signatoryCollapse29">
                                                    Entry 1
                                                </button>
                                            </h2>
                                            <div id="signatoryCollapse29" class="collapse"
                                                aria-labelledby="signatoryHeading29">
                                                <div class="accordion-body">
                                                    <!-- Your content for signatory entry goes here -->
                                                    <div class="row mb-2" id="signatoryDetailsContainer29">
                                                        <div class="col-lg-6 spacing-right mb-3">
                                                            Category <br>
                                                            <select class="form-control" name="other_fee_category[]"
                                                                style="width: 100%;">
                                                                <option value=""> </option>
                                                                <option value="Legal Fee">Legal Fee</option>
                                                                <option value="Speed Money">Speed Money</option>
                                                                <option value="Consultancy Fee">Consultancy Fee</option>
                                                            </select>
                                                        </div>
                                                        <h5 style="margin-left:10px;">Withdrawal From:</h5>
                                                        <div class="col-lg-12">
                                                            <div class="row mb-2">
                                                                <div class="col-lg-4 spacing-right">
                                                                    Bank Name <br> <input class="form-control mt-1"
                                                                        id="head_office_name" name="other_finance_bank[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-left spacing-right">
                                                                    Cheque/Instrument No. <br> <input class="form-control mt-1"
                                                                        id="head_office_email" name="other_finance_cheque[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Scanned copy of Cheque/Instrument<br> <input
                                                                        class="form-control mt-1" id="head_office_name"
                                                                        name="other_finance_copy[]" type="file" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right mt-3">
                                                                    Amount in figures <br> <input class="form-control mt-1"
                                                                        id="head_office_name" name="other_finance_amount[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                                    Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                                                        name="other_finance_notes[]" type="text" placeholder="..."
                                                                        style="width: 100%;"></textarea>
                                                                </div>
                                                                <div class="col-lg-4 spacing-left spacing-rightmt-3">
                                                                    Attachments <br> <input class="form-control mt-1"
                                                                        id="head_office_email" name="other_finance_attach[]" type="file"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <h5>Withdrawal By :</h5>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Name <br> <input class="form-control mt-1" id="head_office_name"
                                                                        name="other_finance_wb_name[]" type="text" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-left spacing-right">
                                                                    Employee ID <br> <input class="form-control mt-1"
                                                                        id="head_office_email" name="other_finance_wb_id[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Designation <br> <input class="form-control mt-1"
                                                                        id="head_office_name" name="other_finance_wb_desig[]"
                                                                        type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right mt-3">
                                                                    Cell Number <br> <input class="form-control mt-1"
                                                                        id="head_office_name" name="other_finance_wb_cell[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-left mt-3">
                                                                    Email ID <br> <input class="form-control mt-1" id="head_office_name"
                                                                        name="other_finance_wb_email[]" type="text" placeholder="..."
                                                                        style="width: 103%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                                    Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                                                        name="other_finance_wb_notes[]" type="text" placeholder="..."
                                                                        style="width: 100%;"></textarea>
                                                                </div>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Attachments <br> <input class="form-control mt-1"
                                                                        id="head_office_email" name="other_finance_wb_attach[]"
                                                                        type="file" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <h5 class="mt-2">Fees :</h5>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Fees <br> <input class="form-control mt-1" id="head_office_name"
                                                                        name="other_finance_fee[]" type="text" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-left spacing-right lh-lg">
                                                                    Date of Fees Deposit <br> <input class="form-control mt-1"
                                                                        id="head_office_email" name="other_finance_fee_date[]"
                                                                        type="date" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right lh-lg">
                                                                    Name of bank<br> <input class="form-control mt-1"
                                                                        id="head_office_name" name="other_finance_fee_bank[]"
                                                                        type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right mt-3">
                                                                    Instrument Number <br> <input class="form-control mt-1"
                                                                        id="head_office_name" name="other_finance_fee_ins[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                                    Deposit Slip Attachment <br> <input class="form-control mt-1"
                                                                        id="head_office_email" name="other_finance_slip_attach[]"
                                                                        type="file" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right mt-3">
                                                                    Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                                                        name="other_finance_fee_notes[]" type="text" placeholder="..."
                                                                        style="width: 100%;"></textarea>
                                                                </div>
                                                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                                    Attachments <br> <input class="form-control mt-1"
                                                                        id="head_office_email" name="other_finance_fee_attach[]"
                                                                        type="file" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <h5 class="mt-2">Deposited By :</h5>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Name <br> <input class="form-control mt-1" id="head_office_name"
                                                                        name="other_finance_db_name[]" type="text" placeholder="..."
                                                                        style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-left spacing-right">
                                                                    Employee ID <br> <input class="form-control mt-1"
                                                                        id="head_office_email" name="other_finance_db_id[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Designation <br> <input class="form-control mt-1"
                                                                        id="head_office_name" name="other_finance_db_desig[]"
                                                                        type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-right mt-3">
                                                                    Cell Number <br> <input class="form-control mt-1"
                                                                        id="head_office_name" name="other_finance_db_cell[]" type="text"
                                                                        placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-left mt-3">
                                                                    Email ID <br> <input class="form-control mt-1" id="head_office_name"
                                                                        name="other_finance_db_email[]" type="text" placeholder="..."
                                                                        style="width: 103%;">
                                                                </div>
                                                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                                    Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                                                        name="other_finance_db_notes[]" type="text" placeholder="..."
                                                                        style="width: 100%;"></textarea>
                                                                </div>
                                                                <div class="col-lg-4 spacing-right">
                                                                    Attachments <br> <input class="form-control mt-1"
                                                                        id="head_office_email" name="other_finance_db_attach[]"
                                                                        type="file" placeholder="..." style="width: 100%;">
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
                                            <button type="button" class="btn btn-primary" id="addSignatory29"
                                                style="height:30px; width:150px;">Add More
                                            </button>
                                        </div>
                                        <button type="button" class="btn btn-primary"
                                            id="updateSignatoryTable29">Save</button>
                                    </div>
                                </div>
                                <table class="table table-bordered mt-1" id="signatorySummaryTable29">
                                <thead>
                                    <tr>
                                        <th>Entry</th>
                                        <th>Category</th>
                                        <th>Bank Name</th>
                                        <th>Cheque/Instrument No</th>
                                        <th>Amount in figure</th>
                                        <th>Note</th>
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
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="a_laws" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                            name="any_laws_notes" type="text" placeholder="..."
                                            style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                            name="any_laws_attach" type="file" placeholder="..." style="width: 100%;">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Renewals History-->
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="a_history" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <h5 style="text-align:center;">Backend Summary will be shown here </h5>
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer" style="position: fixed; bottom: 0; width: 100%; background-color: #320056; padding: 10px; display: flex; justify-content: space-between; align-items: center; margin-left:-21%;">
                <button type="button" name="cancel" class="btn btn-secondary" style="color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 80px;"><i>Cancel</i></button>
                <div style="display: flex; align-items: center;">
                    <img src="{{asset('logo.png')}}" alt="Logo" style="height: 30px; margin-right: 10px;">
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
            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
        </form>

    </section>
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
        var regulatorId = '{{ session("regulatorId") }}';

        if (successMessage && regulatorId) {
            var url = '{{ route("viewregulator", ":id") }}';
            url = url.replace(':id', regulatorId);
            var popupMessage = 'Regulator data stored successfully. Please find the URL below:';

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- script for add more consultant details in (operating license details) -->
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addSignatory17').on('click', function () {
            var SignatoryAccordionCount17 = $('#signatoryAccordion17 .signaccordion-item17').length + 1;
            console.log("adding....", newSignAccordion17);
            var newSignAccordion17 = `
        <div class="accordion-item signaccordion-item17" id="signatoryEntry17${SignatoryAccordionCount17}">
            <h2 class="accordion-header" id="signatoryHeading17${SignatoryAccordionCount17}">
                <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse17${SignatoryAccordionCount17}" aria-expanded="false" aria-controls="signatoryCollapse17${SignatoryAccordionCount17}">
                    Entry ${SignatoryAccordionCount17}
                </button>
            </h2>
            <div id="signatoryCollapse17${SignatoryAccordionCount17}" class="collapse" aria-labelledby="signatoryHeading17${SignatoryAccordionCount17}">
                <div class="accordion-body">
                    <div class="row mb-2" id="signatoryDetailsContainer17">
                        <div class=" row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Consultant Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_name[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Designation <br> <input class="form-control mt-1" id="head_office_email"
                                    name="oper_desig[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Organization <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_org[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_cell[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_email[]" type="text" placeholder="..." style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Consultancy Fees <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_fee[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Visiting Card Front <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_front[]" type="file" multiple placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right spacing-left mt-3">
                                Visiting Card Back <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_back[]" type="file" placeholder="..." style="width: 100%;"
                                    multiple>
                            </div>
                        </div>
                        <h5>Consultant Bank Details :</h5>
                        <div class=" row ">
                            <div class="col-lg-4 spacing-right">
                                Bank Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_bank[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Account Title <br> <input class="form-control mt-1" id="head_office_email"
                                    name="oper_account[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Account Number <br> <input class="form-control mt-1" id="head_office_email"
                                    name="oper_acc_no[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Any Agreed Financials <br> <input class="form-control mt-1"
                                    id="head_office_email" name="oper_fin[]" type="file" placeholder="..."
                                    style="width: 100%;" multiple>
                            </div>

                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="" name="oper_notes[]"
                                    type="text" placeholder="..." style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachment <br> <input class="form-control mt-1" id="head_office_email"
                                    name="oper_attachments[]" type="file" placeholder="..." style="width: 100%;"
                                    multiple>
                            </div>
                        </div>
                        <h5>Consultant Address</h5>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right ">
                                Office No <br> <input class="form-control mt-1" id="head_office_cell_no"
                                    name="oper_office[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Building <br> <input class="form-control mt-1" id="head_office_cell_no"
                                    name="oper_build[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-5 spacing-right mt-2">
                                Block <br> <input class="form-control mt-1" id="head_office_cell_no"
                                    name="oper_block[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Area <br> <input class="form-control mt-1" id="head_office_cell_no"
                                    name="oper_area[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-5 spacing-right mt-2">
                                City <br> <input class="form-control mt-1" id="head_office_cell_no"
                                    name="oper_city[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Photograph of Building <br> <input class="form-control mt-1" id=""
                                    name="oper_photo[]" type="file" placeholder="..." style="width: 100%;"
                                    multiple>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 spacing-right mt-2">
                                Email <br> <input class="form-control mt-1" id="" name="oper_a_email[]"
                                    type="email" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Website <br> <input class="form-control mt-1" id="" name="oper_web[]"
                                    type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-5 spacing-right mt-2">
                                Pin location <br> <input class="form-control mt-1" id="" name="oper_pin[]"
                                    type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                GPS <br> <input class="form-control mt-1" id="" name="oper_gps[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-5 spacing-right mt-2">
                                Notes <br> <textarea class="form-control mt-1" id="" name="oper_ex_notes[]"
                                    type="text" placeholder="..." style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Attachments <br> <input class="form-control mt-1" id="" name="oper_ex_attach[]"
                                    type="file" placeholder="..." style="width: 100%;" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger removeSignAccordion17 mb-2" type="button"
                style="width:10%; margin-left:13px;"">Remove</button>
            </div>
        </div>
    `;

            $('#signatoryAccordion17').append(newSignAccordion17);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion17', function () {
            $(this).closest('.signaccordion-item17').remove();
        });
    });
</script>

<!-- script for show consultant details in (operating license details) in table -->
<script>
    $(document).ready(function () {
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable17() {
            // Clear existing rows
            $('#signatorySummaryTable17 tbody').empty();

            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item17').each(function (index) {
                var consultant_name = $(this).find('[name="oper_name[]"]').val();
                var desig = $(this).find('[name="oper_desig[]"]').val();
                var Organization = $(this).find('[name="oper_org[]"]').val();
                var cell_no = $(this).find('[name="oper_cell[]"]').val();
                var email = $(this).find('[name="oper_email[]"]').val();
                var consultant_fee = $(this).find('[name="oper_fee[]"]').val();
                // Check if any relevant data is entered
                if (consultant_name || desig || Organization || cell_no || email || consultant_fee) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable17 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${consultant_name}</td>
                            <td>${desig}</td>
                            <td>${Organization}</td>
                            <td>${cell_no}</td>
                            <td>${email}</td>
                            <td>${consultant_fee}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory17').on('click', function () {
            var signatoryEntryCount17 = $('#signatoryAccordion17 .signaccordion-item17').length + 1;
            console.log("adding");
            var newSignatoryEntry17 = `
                <!-- Your existing signatory accordion HTML goes here -->

            `;
            console.log('Adding signatory entry:', signatoryEntryCount17);
            $('#signatoryAccordion17').append(newSignatoryEntry17);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable17').on('click', function () {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable17();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item17').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function () {
            $(this).closest('.signaccordion-item17').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable17();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory17').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addSignatory18').on('click', function () {
            var SignatoryAccordionCount18 = $('#signatoryAccordion18 .signaccordion-item18').length + 1;

            var newSignAccordion18 = `
        <div class="accordion-item signaccordion-item18" id="signatoryEntry18${SignatoryAccordionCount18}">
            <h2 class="accordion-header" id="signatoryHeading18${SignatoryAccordionCount18}">
                <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse18${SignatoryAccordionCount18}" aria-expanded="false" aria-controls="signatoryCollapse18${SignatoryAccordionCount18}">
                    Entry ${SignatoryAccordionCount18}
                </button>
            </h2>
            <div id="signatoryCollapse18${SignatoryAccordionCount18}" class="collapse" aria-labelledby="signatoryHeading18${SignatoryAccordionCount18}">
                <div class="accordion-body">
                    <div class="row mb-2" id="signatoryDetailsContainer18">
                        <div class="row mb-2">
                            <div class="col-lg-3 spacing-right">
                                Concerned Officer Name <br> <input class="form-control mt-1"
                                    id="oper_cn_officer" name="oper_iss_co_name[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-left spacing-right">
                                Designation <br> <input class="form-control mt-1" id="oper_desig"
                                    name="oper_iss_co_desig[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                                Department <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_iss_co_dept[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                                Section <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_iss_co_section[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right mt-3">
                                PTCL Number <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_iss_co_ptcl[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>

                            <div class="col-lg-3 spacing-left mt-3">
                                Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_iss_co_cell[]" type="text" placeholder="..."
                                    style="width: 105%;">
                            </div>
                            <div class="col-lg-3 spacing-right mt-3">
                                Email <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_iss_co_email[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right mt-3">
                                Website <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_iss_co_web[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right mt-3">
                                Visiting Card Front <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_iss_co_front[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right spacing-left mt-3">
                                Visiting Card Back <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_iss_co_back[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="row mb-2 mt-2">
                                <div class="col-lg-5 spacing-right mt-3">
                                    Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                        name="oper_iss_co_notes[]" type="text" placeholder="..."
                                        style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-5 spacing-left mt-3">
                                    Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                        name="oper_iss_co_attach[]" type="file" placeholder="..."
                                        style="width: 100%;" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger removeSignAccordion18" type="button" style="width:10%; margin-left:13px;"
                    ">Remove</button>
            </div>
        </div>
    `;

            $('#signatoryAccordion18').append(newSignAccordion18);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion18', function () {
            $(this).closest('.signaccordion-item18').remove();
        });
    });
</script>

<!-- script for show data of issuing authority in (operating license details) in table -->
<script>
    $(document).ready(function () {
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable18() {
            // Clear existing rows
            $('#signatorySummaryTable18 tbody').empty();

            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item18').each(function (index) {
                var cn_off_name = $(this).find('[name="oper_iss_co_name[]"]').val();
                var desig = $(this).find('[name="oper_iss_co_desig[]"]').val();
                var depart = $(this).find('[name="oper_iss_co_dept[]"]').val();
                var section = $(this).find('[name="oper_iss_co_section[]"]').val();
                var ptcl_no = $(this).find('[name="oper_iss_co_ptcl[]"]').val();
                var cell_no = $(this).find('[name="oper_iss_co_cell[]"]').val();
                var email = $(this).find('[name="oper_iss_co_email[]"]').val();
                var website = $(this).find('[name="oper_iss_co_web[]"]').val();
                var note = $(this).find('[name="oper_iss_co_notes[]"]').val();

                // Check if any relevant data is entered
                if (cn_off_name || desig || depart || section || ptcl_no || cell_no || email || website || note) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable18 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${cn_off_name}</td>
                            <td>${desig}</td>
                            <td>${depart}</td>
                            <td>${section}</td>
                            <td>${ptcl_no}</td>
                            <td>${cell_no}</td>
                            <td>${email}</td>
                            <td>${website}</td>
                            <td>${note}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory18').on('click', function () {
            var signatoryEntryCount18 = $('#signatoryAccordion18 .signaccordion-item18').length + 1;

            var newSignatoryEntry18 = `
                <!-- Your existing signatory accordion HTML goes here -->

            `;
            console.log('Adding signatory entry:', signatoryEntryCount18);
            $('#signatoryAccordion18').append(newSignatoryEntry18);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable18').on('click', function () {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable18();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item18').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function () {
            $(this).closest('.signaccordion-item18').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable18();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory18').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addSignatory19').on('click', function () {
            var SignatoryAccordionCount19 = $('#signatoryAccordion19 .signaccordion-item19').length + 1;

            var newSignAccordion19 = `
        <div class="accordion-item signaccordion-item19" id="signatoryEntry19${SignatoryAccordionCount19}">
            <h2 class="accordion-header" id="signatoryHeading19${SignatoryAccordionCount19}">
                <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse19${SignatoryAccordionCount19}" aria-expanded="false" aria-controls="signatoryCollapse19${SignatoryAccordionCount19}">
                    Entry ${SignatoryAccordionCount19}
                </button>
            </h2>
            <div id="signatoryCollapse19${SignatoryAccordionCount19}" class="collapse" aria-labelledby="signatoryHeading19${SignatoryAccordionCount19}">
                <div class="accordion-body">
                    <div class="row mb-2" id="signatoryDetailsContainer19">
                        <div class="col-lg-6 spacing-right mb-3">
                            Category <br>
                            <select class="form-control" name="oper_fee_category[]" style="width: 100%;">
                                <option value=""> </option>
                                <option value="Legal Fee">Legal Fee</option>
                                <option value="Speed Money">Speed Money</option>
                                <option value="Consultancy Fee">Consultancy Fee</option>
                            </select>
                        </div>
                        <h5 style="margin-left:10px;">Withdrawal From:</h5>
                        <div class="col-lg-12">
                            <div class="row mb-2">
                                <div class="col-lg-4 spacing-right">
                                    Bank Name <br> <input class="form-control mt-1" id="head_office_name"
                                        name="oper_finance_bank[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right">
                                    Cheque/Instrument No. <br> <input class="form-control mt-1"
                                        id="head_office_email" name="oper_finance_cheque[]" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Scanned copy of Cheque/Instrument<br> <input class="form-control mt-1"
                                        id="head_office_name" name="oper_finance_copy[]" type="file"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-3">
                                    Amount in figures <br> <input class="form-control mt-1"
                                        id="head_office_name" name="oper_finance_amount[]" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                    Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                        name="oper_finance_notes[]" type="text" placeholder="..."
                                        style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-4 spacing-left spacing-rightmt-3">
                                    Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                        name="oper_finance_attach[]" type="file" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <h5>Withdrawal By :</h5>
                                <div class="col-lg-4 spacing-right">
                                    Name <br> <input class="form-control mt-1" id="head_office_name"
                                        name="oper_finance_wb_name[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right">
                                    Employee ID <br> <input class="form-control mt-1" id="head_office_email"
                                        name="oper_finance_wb_id[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Designation <br> <input class="form-control mt-1" id="head_office_name"
                                        name="oper_finance_wb_desig[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-3">
                                    Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                        name="oper_finance_wb_cell[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left mt-3">
                                    Email ID <br> <input class="form-control mt-1" id="head_office_name"
                                        name="oper_finance_wb_email[]" type="text" placeholder="..."
                                        style="width: 103%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                    Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                        name="oper_finance_wb_notes[]" type="text" placeholder="..."
                                        style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                        name="oper_finance_wb_attach[]" type="file" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <h5 class="mt-2">Fees :</h5>
                                <div class="col-lg-4 spacing-right">
                                    Fees <br> <input class="form-control mt-1" id="head_office_name"
                                        name="oper_finance_fee[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right lh-lg">
                                    Date of Fees Deposit <br> <input class="form-control mt-1"
                                        id="head_office_email" name="oper_finance_fee_date[]" type="date"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right lh-lg">
                                    Name of bank<br> <input class="form-control mt-1" id="head_office_name"
                                        name="oper_finance_fee_bank[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-3">
                                    Instrument Number <br> <input class="form-control mt-1"
                                        id="head_office_name" name="oper_finance_fee_ins[]" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                    Deposit Slip Attachment <br> <input class="form-control mt-1"
                                        id="head_office_email" name="oper_finance_slip_attach[]" type="file"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-3">
                                    Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                        name="oper_finance_fee_notes[]" type="text" placeholder="..."
                                        style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                    Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                        name="oper_finance_fee_attach[]" type="file" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <h5 class="mt-2">Deposited By :</h5>
                                <div class="col-lg-4 spacing-right">
                                    Name <br> <input class="form-control mt-1" id="head_office_name"
                                        name="oper_finance_db_name[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right">
                                    Employee ID <br> <input class="form-control mt-1" id="head_office_email"
                                        name="oper_finance_db_id[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Designation <br> <input class="form-control mt-1" id="head_office_name"
                                        name="oper_finance_db_desig[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-3">
                                    Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                        name="oper_finance_db_cell[]" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left mt-3">
                                    Email ID <br> <input class="form-control mt-1" id="head_office_name"
                                        name="oper_finance_db_email[]" type="text" placeholder="..."
                                        style="width: 103%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                    Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                        name="oper_finance_db_notes[]" type="text" placeholder="..."
                                        style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                        name="oper_finance_db_attach[]" type="file" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger removeSignAccordion19" type="button" style="width:10%; margin-left:13px;"
                    >Remove</button>
            </div>
        </div>
    `;

            $('#signatoryAccordion19').append(newSignAccordion19);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion19', function () {
            $(this).closest('.signaccordion-item19').remove();
        });
    });
</script>

<!-- script for show data of finance operating renewal license in (operating license details) in table -->
<script>
    $(document).ready(function () {
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable19() {
            // Clear existing rows
            $('#signatorySummaryTable19 tbody').empty();

            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item19').each(function (index) {
                var oper_finance_category = $(this).find('[name="oper_fee_category[]"]').val();
                var oper_finance_bankName = $(this).find('[name="oper_finance_bank[]"]').val();
                var oper_finance_chequeNo = $(this).find('[name="oper_finance_cheque[]"]').val();
                var oper_finance_amountInFigure = $(this).find('[name="oper_finance_amount[]"]').val();

                // Check if any relevant data is entered
                if (oper_finance_category || oper_finance_bankName || oper_finance_chequeNo || oper_finance_amountInFigure) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable19 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${oper_finance_category}</td>
                            <td>${oper_finance_bankName}</td>
                            <td>${oper_finance_chequeNo}</td>
                            <td>${oper_finance_amountInFigure}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory19').on('click', function () {
            var signatoryEntryCount19 = $('#signatoryAccordion19 .signaccordion-item19').length + 1;

            var newSignatoryEntry19 = `
                <!-- Your existing signatory accordion HTML goes here -->

            `;
            console.log('Adding signatory entry:', signatoryEntryCount19);
            $('#signatoryAccordion19').append(newSignatoryEntry19);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable19').on('click', function () {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable19();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item19').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function () {
            $(this).closest('.signaccordion-item19').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable19();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory19').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addSignatory21').on('click', function () {
            var SignatoryAccordionCount21 = $('#signatoryAccordion21 .signaccordion-item21').length + 1;

            var newSignAccordion21 = `
        <div class="accordion-item signaccordion-item21" id="signatoryEntry21${SignatoryAccordionCount21}">
            <h2 class="accordion-header" id="signatoryHeading21${SignatoryAccordionCount21}">
                <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse21${SignatoryAccordionCount21}" aria-expanded="false" aria-controls="signatoryCollapse21${SignatoryAccordionCount21}">
                    Entry ${SignatoryAccordionCount21}
                </button>
            </h2>
            <div id="signatoryCollapse21${SignatoryAccordionCount21}" class="collapse" aria-labelledby="signatoryHeading21${SignatoryAccordionCount21}">
                <div class="accordion-body">
                    <div class="row mb-2" id="signatoryDetailsContainer21">
                        <div class="col-lg-12" id="weapon_consultant_add_fields">
                            <div class=" row mb-2">
                                <div class="col-lg-4 spacing-right">
                                    Consultant Name <br> <input class="form-control mt-1" id="head_office_name"
                                        name="wep_name[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right">
                                    Designation <br> <input class="form-control mt-1" id="head_office_email"
                                        name="wep_desig[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Organization <br> <input class="form-control mt-1" id="head_office_name"
                                        name="wep_org[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-3">
                                    Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                        name="wep_cell[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left mt-3">
                                    Email <br> <input class="form-control mt-1" id="head_office_name"
                                        name="wep_email[]" type="text" placeholder="..." style="width: 103%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-3">
                                    Consultancy Fees <br> <input class="form-control mt-1" id="head_office_name"
                                        name="wep_fee[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-3">
                                    Visiting Card Front <br> <input class="form-control mt-1" id="head_office_name"
                                        name="wep_front[]" type="file" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right spacing-left mt-3">
                                    Visiting Card Back <br> <input class="form-control mt-1" id="head_office_name"
                                        name="wep_back[]" type="file" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <h5>Consultant Bank Details :</h5>
                            <div class=" row mb-2">
                                <div class="col-lg-4 spacing-right">
                                    Bank Name <br> <input class="form-control mt-1" id="head_office_name"
                                        name="wep_bank[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right">
                                    Account Title <br> <input class="form-control mt-1" id="head_office_email"
                                        name="wep_acc[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right">
                                    Account Number <br> <input class="form-control mt-1" id="head_office_email"
                                        name="wep_acc_no[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-3">
                                    Any Agreed Financials <br> <input class="form-control mt-1"
                                        id="head_office_email" name="wep_fin[]" type="file" placeholder="..."
                                        style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                    Notes <br> <textarea class="form-control mt-1" id="" name="wep_notes[]"
                                        type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                    Attachment <br> <input class="form-control mt-1" id="head_office_email"
                                        name="wep_attach[]" type="file" placeholder="..." style="width: 100%;"
                                        multiple>
                                </div>
                            </div>
                            <h5>Consultant Address</h5>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Office No <br> <input class="form-control mt-1" id="head_office_cell_no"
                                        name="wep_office[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left">
                                    Building <br> <input class="form-control mt-1" id="head_office_cell_no"
                                        name="wep_build[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right mt-2">
                                    Block <br> <input class="form-control mt-1" id="head_office_cell_no"
                                        name="wep_block[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left mt-2">
                                    Area <br> <input class="form-control mt-1" id="head_office_cell_no"
                                        name="wep_area[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right mt-2">
                                    City <br> <input class="form-control mt-1" id="head_office_cell_no"
                                        name="wep_city[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left mt-2">
                                    Photograph of Building <br> <input class="form-control mt-1" id=""
                                        name="wep_photo[]" type="file" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right mt-2">
                                    Email <br> <input class="form-control mt-1" id="" name="wep_a_email[]"
                                        type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left mt-2">
                                    Website <br> <input class="form-control mt-1" id="" name="wep_web[]" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right mt-2">
                                    Pin location <br> <input class="form-control mt-1" id="" name="wep_pin[]"
                                        type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left mt-2">
                                    GPS <br> <input class="form-control mt-1" id="" name="wep_gps[]" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-lg-5 spacing-right ">
                                    Notes <br> <textarea class="form-control mt-1" id="" name="wep_ex_notes[]"
                                        type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-5 spacing-left">
                                    Attachments <br> <input class="form-control mt-1" id="" name="wep_ex_attach[]"
                                        type="file" placeholder="..." style="width: 100%;" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger removeSignAccordion21" type="button" style="width:10%; margin-left:13px;"
                    >Remove</button>
            </div>
        </div>
    `;

            $('#signatoryAccordion21').append(newSignAccordion21);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion21', function () {
            $(this).closest('.signaccordion-item21').remove();
        });
    });
</script>

<!-- script for show data of consultant details  in (weoapon license details) in table -->
<script>
    $(document).ready(function () {
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable21() {
            // Clear existing rows
            $('#signatorySummaryTable21 tbody').empty();

            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item21').each(function (index) {
                var cons_we_name = $(this).find('[name="wep_name[]"]').val();
                var cons_we_desig = $(this).find('[name="wep_desig[]"]').val();
                var cons_we_org = $(this).find('[name="wep_org[]"]').val();
                var cons_we_cell_no = $(this).find('[name="wep_cell[]"]').val();
                var cons_we_email = $(this).find('[name="wep_email[]"]').val();
                var cons_we_consFee = $(this).find('[name="wep_fee[]"]').val();

                // Check if any relevant data is entered
                if (cons_we_name || cons_we_desig || cons_we_org || cons_we_cell_no || cons_we_email || cons_we_consFee) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable21 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${cons_we_name}</td>
                            <td>${cons_we_desig}</td>
                            <td>${cons_we_org}</td>
                            <td>${cons_we_cell_no}</td>
                            <td>${cons_we_email}</td>
                            <td>${cons_we_consFee}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory21').on('click', function () {
            var signatoryEntryCount21 = $('#signatoryAccordion21 .signaccordion-item21').length + 1;

            var newSignatoryEntry21 = `
                <!-- Your existing signatory accordion HTML goes here -->

            `;
            console.log('Adding signatory entry:', signatoryEntryCount21);
            $('#signatoryAccordion21').append(newSignatoryEntry21);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable21').on('click', function () {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable21();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item21').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function () {
            $(this).closest('.signaccordion-item21').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable21();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory21').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addSignatory22').on('click', function () {
            var SignatoryAccordionCount22 = $('#signatoryAccordion22 .signaccordion-item22').length + 1;

            var newSignAccordion22 = `
        <div class="accordion-item signaccordion-item22" id="signatoryEntry22${SignatoryAccordionCount22}">
            <h2 class="accordion-header" id="signatoryHeading22${SignatoryAccordionCount22}">
                <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse22${SignatoryAccordionCount22}" aria-expanded="false" aria-controls="signatoryCollapse22${SignatoryAccordionCount22}">
                    Entry ${SignatoryAccordionCount22}
                </button>
            </h2>
            <div id="signatoryCollapse22${SignatoryAccordionCount22}" class="collapse" aria-labelledby="signatoryHeading22${SignatoryAccordionCount22}">
                <div class="accordion-body">
                    <div class="row mb-2" id="signatoryDetailsContainer22">
                        <div id="weapon_authority_add_fields">
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Concerned Officer Name <br> <input class="form-control mt-1"
                                            id="head_office_name" name="wep_iss_co_name[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Designation <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_iss_co_desig[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Department <br> <input class="form-control mt-1" id="head_office_name"
                                            name="wep_iss_co_dept[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Section <br> <input class="form-control mt-1" id="head_office_name"
                                            name="wep_iss_co_sec[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right lh-lg">
                                        PTCL Number <br> <input class="form-control mt-1" id="head_office_name"
                                            name="wep_iss_co_ptcl[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left mt-3">
                                        Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                            name="wep_iss_co_cell[]" type="text" placeholder="..."
                                            style="width: 107%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Email <br> <input class="form-control mt-1" id="head_office_name"
                                            name="wep_iss_co_email[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Website <br> <input class="form-control mt-1" id="head_office_name"
                                            name="wep_iss_co_web[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Visiting Card Front <br> <input class="form-control mt-1"
                                            id="head_office_name" name="wep_iss_co_front[]" type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right spacing-left mt-3">
                                        Visiting Card Back <br> <input class="form-control mt-1"
                                            id="head_office_name" name="wep_iss_co_back[]" type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="row mb-2 mt-3">
                                        <div class="col-lg-4 spacing-right">
                                            Notes <br> <textarea class="form-control mt-1" id=""
                                                name="wep_iss_co_notes[]" type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-left">
                                            Attachments <br> <input class="form-control mt-1" id=""
                                                name="wep_iss_co_attach[]" type="file" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 style="margin-left:12px;">Printing Authority</h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Concerned Officer Name <br> <input class="form-control mt-1"
                                            id="head_office_name" name="wep_p_co_name[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Designation <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_co_p_desig[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Department <br> <input class="form-control mt-1" id="head_office_name"
                                            name="wep_co_p_dept[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Section <br> <input class="form-control mt-1" id="head_office_name"
                                            name="wep_co_p_sec[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        PTCL Number <br> <input class="form-control mt-1" id="head_office_name"
                                            name="wep_co_p_ptcl[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left mt-3">
                                        Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                            name="wep_co_p_cell[]" type="text" placeholder="..."
                                            style="width: 103%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Email <br> <input class="form-control mt-1" id="head_office_name"
                                            name="wep_co_p_email[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Website <br> <input class="form-control mt-1" id="head_office_name"
                                            name="wep_co_p_web[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Visiting Card Front <br> <input class="form-control mt-1"
                                            id="head_office_name" name="wep_co_p_front[]" type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right spacing-left mt-3">
                                        Visiting Card Back <br> <input class="form-control mt-1"
                                            id="head_office_name" name="wep_co_p_back[]" type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                            name="wep_co_p_notes[]" type="text" placeholder="..."
                                            style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                            name="wep_co_p_attach[]" type="file" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger removeSignAccordion22" type="button" style="width:10%; margin-left:13px;"
                    ">Remove</button>
            </div>
        </div>
    `;

            $('#signatoryAccordion22').append(newSignAccordion22);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion22', function () {
            $(this).closest('.signaccordion-item22').remove();
        });
    });
</script>

<!-- script for show data of issuing authority in (weapon license details) in table -->
<script>
    $(document).ready(function () {
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable22() {
            // Clear existing rows
            $('#signatorySummaryTable22 tbody').empty();

            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item22').each(function (index) {
                var iss_officer_name = $(this).find('[name="wep_iss_co_name[]"]').val();
                var iss_we_desig = $(this).find('[name="wep_iss_co_desig[]"]').val();
                var iss_we_depart = $(this).find('[name="wep_iss_co_dept[]"]').val();
                var iss_we_sec = $(this).find('[name="wep_iss_co_sec[]"]').val();
                var iss_we_ptclNo = $(this).find('[name="wep_iss_co_ptcl[]"]').val();
                var iss_we_cellNo = $(this).find('[name="wep_iss_co_cell[]"]').val();
                var iss_we_email = $(this).find('[name="wep_iss_co_email[]"]').val();
                var iss_we_website = $(this).find('[name="wep_iss_co_web[]"]').val();
                var iss_we_notes = $(this).find('[name="wep_iss_co_notes[]"]').val();

                // Check if any relevant data is entered
                if (iss_officer_name || iss_we_desig || iss_we_depart || iss_we_sec || iss_we_ptclNo
                    || iss_we_cellNo || iss_we_email || iss_we_website || iss_we_notes) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable22 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${iss_officer_name}</td>
                            <td>${iss_we_desig}</td>
                            <td>${iss_we_depart}</td>
                            <td>${iss_we_sec}</td>
                            <td>${iss_we_ptclNo}</td>
                            <td>${iss_we_cellNo}</td>
                            <td>${iss_we_email}</td>
                            <td>${iss_we_website}</td>
                            <td>${iss_we_notes}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory22').on('click', function () {
            var signatoryEntryCount22 = $('#signatoryAccordion22 .signaccordion-item22').length + 1;

            var newSignatoryEntry22 = `
                <!-- Your existing signatory accordion HTML goes here -->

            `;
            console.log('Adding signatory entry:', signatoryEntryCount22);
            $('#signatoryAccordion22').append(newSignatoryEntry22);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable22').on('click', function () {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable22();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item22').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function () {
            $(this).closest('.signaccordion-item22').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable22();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory22').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addSignatory24').on('click', function () {
            var SignatoryAccordionCount24 = $('#signatoryAccordion24 .signaccordion-item24').length + 1;

            var newSignAccordion24 = `
        <div class="accordion-item signaccordion-item24" id="signatoryEntry24${SignatoryAccordionCount24}">
            <h2 class="accordion-header" id="signatoryHeading24${SignatoryAccordionCount24}">
                <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse24${SignatoryAccordionCount24}" aria-expanded="false" aria-controls="signatoryCollapse24${SignatoryAccordionCount24}">
                    Entry ${SignatoryAccordionCount24}
                </button>
            </h2>
            <div id="signatoryCollapse24${SignatoryAccordionCount24}" class="collapse" aria-labelledby="signatoryHeading24${SignatoryAccordionCount24}">
                <div class="accordion-body">
                    <div class="row mb-2" id="signatoryDetailsContainer24">
                        <div class="row legal_fee">
                            <h5 style="margin-left:10px;">Withdrawal From:</h5>
                            <div class="col-lg-4 spacing-right">
                                Bank Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_bank[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Cheque/Instrument No. <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_legal_cheque[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Scanned copy of Cheque/Instrument<br> <input class="form-control mt-1"
                                    id="head_office_name" name="wep_legal_copy[]" type="file"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Amount in figures <br> <input class="form-control mt-1"
                                    id="head_office_name" name="wep_legal_amount[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_legal_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5>Withdrawal By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_wb_name[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_legal_wb_id[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_wb_desig[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_wb_cell[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_wb_email[]" type="text" placeholder="..."
                                    style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_wb_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_legal_wb_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Fees :</h5>
                            <div class="col-lg-4 spacing-left">
                                Fees A <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_fee_a[]" type="text" placeholder="..."
                                    style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Fees B <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_fee_b[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Total Fees <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_fee_t[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Date of Fees Deposit <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_legal_fee_date[]" type="date"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Name of bank<br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_fee_bank[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Instrument Number <br> <input class="form-control mt-1"
                                    id="head_office_name" name="wep_legal_fee_ins[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Deposit Slip Attachment <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_legal_fee_slip[]" type="file"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_fee_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_legal_fee_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Deposited By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_db_name[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_legal_db_id[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_db_desig[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_db_cell[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_db_email[]" type="text" placeholder="..."
                                    style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="wep_legal_db_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-right mb-3">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_legal_db_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-danger removeSignAccordion24" type="button" style="width:10%; margin-left:13px;"
                    >Remove</button>
            </div>
        </div>
    `;

            $('#signatoryAccordion24').append(newSignAccordion24);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion24', function () {
            $(this).closest('.signaccordion-item24').remove();
        });
    });
</script>

<!-- script for show data legal in weapon license renewal in (weapon license details) in table -->
<script>
    $(document).ready(function () {
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable24() {
            // Clear existing rows
            $('#signatorySummaryTable24 tbody').empty();

            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item24').each(function (index) {
                var we_legal_bank = $(this).find('[name="wep_legal_bank[]"]').val();
                var we_legal_cheque = $(this).find('[name="wep_legal_cheque[]"]').val();
                var we_legal_amount = $(this).find('[name="wep_legal_amount[]"]').val();
                var we_legal_note = $(this).find('[name="wep_legal_notes[]"]').val();

                // Check if any relevant data is entered
                if (we_legal_bank || we_legal_cheque || we_legal_amount || we_legal_note) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable24 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${we_legal_bank}</td>
                            <td>${we_legal_cheque}</td>
                            <td>${we_legal_amount}</td>
                            <td>${we_legal_note}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button3" style="width: 100%" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory24').on('click', function () {
            var signatoryEntryCount24 = $('#signatoryAccordion24 .signaccordion-item24').length + 1;

            var newSignatoryEntry24 = `
                <!-- Your existing signatory accordion HTML goes here -->

            `;
            console.log('Adding signatory entry:', signatoryEntryCount24);
            $('#signatoryAccordion24').append(newSignatoryEntry24);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable24').on('click', function () {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable24();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button3', function () {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item24').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function () {
            $(this).closest('.signaccordion-item24').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable24();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory24').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory25').on('click', function() {
            var SignatoryAccordionCount25 = $('#signatoryAccordion25 .signaccordion-item25').length + 1;

            var newSignAccordion25 = `
                <div class="accordion-item signaccordion-item25" id="signatoryEntry25${SignatoryAccordionCount25}">
                    <h2 class="accordion-header" id="signatoryHeading25${SignatoryAccordionCount25}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse25${SignatoryAccordionCount25}" aria-expanded="false" aria-controls="signatoryCollapse25${SignatoryAccordionCount25}">
                            Entry ${SignatoryAccordionCount25}
                        </button>
                    </h2>
                    <div id="signatoryCollapse25${SignatoryAccordionCount25}" class="collapse" aria-labelledby="signatoryHeading25${SignatoryAccordionCount25}">
                        <div class="accordion-body">
                            <div class="row mb-2" id="signatoryDetailsContainer25">
                                <div class="col-lg-6 spacing-right mb-3">
                                    Category <br>
                                    <select class="form-control" name="wep_fee_category[]"
                                        style="width: 100%;">
                                        <option value=""> </option>
                                        <option value="Speed Money">Speed Money</option>
                                        <option value="Consultancy Fee">Consultancy Fee</option>
                                    </select>
                                </div>
                                <h5 style="margin-left:10px;">Withdrawal From:</h5>
                                <div class="col-lg-12">
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Bank Name <br> <input class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_bank[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Cheque/Instrument No. <br> <input class="form-control mt-1"
                                                id="head_office_email" name="wep_finance_cheque[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Scanned copy of Cheque/Instrument<br> <input
                                                class="form-control mt-1" id="head_office_name"
                                                name="wep_finance_copy[]" type="file" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right mt-3">
                                            Amount in figures <br> <input class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_amount[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                                            Notes <br> <textarea class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_notes[]"
                                                type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-rightmt-3">
                                            Attachments <br> <input class="form-control mt-1"
                                                id="head_office_email" name="wep_finance_attach[]"
                                                type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                        <h5>Withdrawal By :</h5>
                                        <div class="col-lg-4 spacing-right">
                                            Name <br> <input class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_wb_name[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Employee ID <br> <input class="form-control mt-1"
                                                id="head_office_email" name="wep_finance_wb_id[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Designation <br> <input class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_wb_desig[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right mt-3">
                                            Cell Number <br> <input class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_wb_cell[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left mt-3">
                                            Email ID <br> <input class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_wb_email[]"
                                                type="text" placeholder="..." style="width: 103%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                                            Notes <br> <textarea class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_wb_notes[]"
                                                type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Attachments <br> <input class="form-control mt-1"
                                                id="head_office_email" name="wep_finance_wb_attach[]"
                                                type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                        <h5 class="mt-2">Fees :</h5>
                                        <div class="col-lg-4 spacing-right">
                                            Fees <br> <input class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_fee[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right lh-lg">
                                            Date of Fees Deposit <br> <input class="form-control mt-1"
                                                id="head_office_email" name="wep_finance_fee_date[]"
                                                type="date" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right lh-lg">
                                            Name of bank<br> <input class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_fee_bank[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right mt-3">
                                            Instrument Number <br> <input class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_fee_ins[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                                            Deposit Slip Attachment <br> <input
                                                class="form-control mt-1" id="head_office_email"
                                                name="wep_finance_slip_attach[]" type="file"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right mt-3">
                                            Notes <br> <textarea class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_fee_notes[]"
                                                type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                                            Attachments <br> <input class="form-control mt-1"
                                                id="head_office_email" name="wep_finance_fee_attach[]"
                                                type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                        <h5 class="mt-2">Deposited By :</h5>
                                        <div class="col-lg-4 spacing-right">
                                            Name <br> <input class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_db_name[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Employee ID <br> <input class="form-control mt-1"
                                                id="head_office_email" name="wep_finance_db_id[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Designation <br> <input class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_db_desig[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right mt-3">
                                            Cell Number <br> <input class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_db_cell[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left mt-3">
                                            Email ID <br> <input class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_db_email[]"
                                                type="text" placeholder="..." style="width: 103%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                                            Notes <br> <textarea class="form-control mt-1"
                                                id="head_office_name" name="wep_finance_db_notes[]"
                                                type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Attachments <br> <input class="form-control mt-1"
                                                id="head_office_email" name="wep_finance_db_attach[]"
                                                type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger removeSignAccordion25" type="button" style="width:10%; margin-left:13px;"
                            >Remove</button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion25').append(newSignAccordion25);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion25', function() {
            $(this).closest('.signaccordion-item25').remove();
        });
    });
</script>

<!-- script for show data of finance in weapon license renewal in (weapon license details) in table -->
<script>
    $(document).ready(function() {
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable25() {
            // Clear existing rows
            $('#signatorySummaryTable25 tbody').empty();

            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item25').each(function(index) {
                var we_finance_category = $(this).find('[name="wep_fee_category[]"]').val();
                var we_finance_bank = $(this).find('[name="wep_finance_bank[]"]').val();
                var we_finance_cheque = $(this).find('[name="wep_finance_cheque[]"]').val();
                var we_finance_amount = $(this).find('[name="wep_finance_amount[]"]').val();
                var we_finance_note = $(this).find('[name="wep_finance_notes[]"]').val();

                // Check if any relevant data is entered
                if (we_finance_category || we_finance_bank || we_finance_cheque || we_finance_amount || we_finance_note) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable25 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${we_finance_category}</td>
                            <td>${we_finance_bank}</td>
                            <td>${we_finance_cheque}</td>
                            <td>${we_finance_amount}</td>
                            <td>${we_finance_note}</td>
                                    <td><button type="button" class="btn btn-primary view-signatory-button2" style="width: 100%" data-index="${index}">View</button></td>
                                    <!-- Add more columns as needed -->
                                </tr>
                            `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory25').on('click', function() {
            var signatoryEntryCount25 = $('#signatoryAccordion25 .signaccordion-item25').length + 1;

            var newSignatoryEntry25 = `
                        <!-- Your existing signatory accordion HTML goes here -->

                    `;
            console.log('Adding signatory entry:', signatoryEntryCount25);
            $('#signatoryAccordion25').append(newSignatoryEntry25);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable25').on('click', function() {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable25();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button2', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item25').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function() {
            $(this).closest('.signaccordion-item25').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable25();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory25').on('click', function(event) {
            event.preventDefault();
        });
    });
</script>

<!-- script for add more division in weapon license renewal in (weapon license details) -->
<script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory26').on('click', function() {
            var SignatoryAccordionCount26 = $('#signatoryAccordion26 .signaccordion-item26').length + 1;

            var newSignAccordion26 = `
                <div class="accordion-item signaccordion-item26" id="signatoryEntry26${SignatoryAccordionCount26}">
                    <h2 class="accordion-header" id="signatoryHeading26${SignatoryAccordionCount26}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse26${SignatoryAccordionCount26}" aria-expanded="false" aria-controls="signatoryCollapse26${SignatoryAccordionCount26}">
                            Entry ${SignatoryAccordionCount26}
                        </button>
                    </h2>
                    <div id="signatoryCollapse26${SignatoryAccordionCount26}" class="collapse" aria-labelledby="signatoryHeading26${SignatoryAccordionCount26}">
                        <div class="accordion-body">
                            <div class="row mb-2" id="signatoryDetailsContainer26">
                                <div>
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <div class="col-lg-4 spacing-right">
                                                Category <br> <input class="form-control mt-1"
                                                    id="head_office_name" name="division_category[]"
                                                    type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Quantity <br> <input class="form-control mt-1"
                                                    id="head_office_name" name="division_quantity[]"
                                                    type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 mt-4">
                                                <div class=" mb-2 d-flex align-items-center ">
                                                    <div class="form-check form-check-inline spacing-left ">
                                                        <input class="form-check-input"
                                                            name="division_book[]" type="checkbox"
                                                            id="inlineCheckbox1" value="">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox1">Book</label>
                                                    </div>
                                                    <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input"
                                                            name="division_card[]" type="checkbox"
                                                            id="inlineCheckbox2" value="">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox2">Card</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Caliber <br> <input class="form-control mt-1"
                                                    id="head_office_name" name="division_caliber[]"
                                                    type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Jurisdiction: <br> <input class="form-control mt-1"
                                                    id="head_office_name" name="division_juris[]"
                                                    type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right ">
                                                Sanction Letter Number <br> <input class="form-control mt-1"
                                                    id="head_office_name" name="division_sanc[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right mt-3">
                                                Scanned copy of Sanction Letter: (Attachment)
                                                <br> <input class="form-control mt-1" id="head_office_name"
                                                    name="division_sanc_copy[]" type="file"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 mt-2">
                                                <div class=" mb-2 d-flex align-items-center m-5">
                                                    <div
                                                        class="form-check form-check-inline spacing-left mt-2">
                                                        <input class="form-check-input"
                                                            name="division_nbp[]" type="checkbox"
                                                            id="inlineCheckbox1" value="">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox1">NBP</label>
                                                    </div>
                                                    <div
                                                        class="form-check form-check-inline spacing-left mt-2">
                                                        <input class="form-check-input" name="division_pb[]"
                                                            type="checkbox" id="inlineCheckbox2" value="">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox2">PB</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-6 spacing-right">
                                            Notes <br> <textarea class="form-control mt-1"
                                                id="head_office_name" name="division_notes[]" type="text"
                                                placeholder="..." style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-6 spacing-right">
                                            Attachments <br> <input class="form-control mt-1"
                                                id="head_office_email" name="division_attach[]" type="file"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger removeSignAccordion26" type="button" style="width:10%; margin-left:13px;"
                            >Remove</button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion26').append(newSignAccordion26);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion26', function() {
            $(this).closest('.signaccordion-item26').remove();
        });
    });
</script>

<!-- script for show data of division in weapon license renewal in (weapon license details) in table -->
<script>
    $(document).ready(function() {
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable26() {
            // Clear existing rows
            $('#signatorySummaryTable26 tbody').empty();

            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item26').each(function(index) {
                var divi_catgory = $(this).find('[name="division_category[]"]').val();
                var divi_quantity = $(this).find('[name="division_quantity[]"]').val();
                var divi_caliber = $(this).find('[name="division_caliber[]"]').val();
                var divi_Jurisdiction = $(this).find('[name="division_juris[]"]').val();
                var divi_sanc = $(this).find('[name="division_sanc[]"]').val();
                var divi_note = $(this).find('[name="division_notes[]"]').val();

                // Check if any relevant data is entered
                if (divi_catgory || divi_quantity || divi_caliber || divi_Jurisdiction || divi_sanc || divi_note) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable26 tbody').append(`
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${divi_catgory}</td>
                                    <td>${divi_quantity}</td>
                                    <td>${divi_caliber}</td>
                                    <td>${divi_Jurisdiction}</td>
                                    <td>${divi_sanc}</td>
                                    <td>${divi_note}</td>
                                    <td><button type="button" class="btn btn-primary view-signatory-button1" style="width: 100%" data-index="${index}">View</button></td>
                                    <!-- Add more columns as needed -->
                                </tr>
                            `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory26').on('click', function() {
            var signatoryEntryCount26 = $('#signatoryAccordion26 .signaccordion-item26').length + 1;

            var newSignatoryEntry26 = `
                        <!-- Your existing signatory accordion HTML goes here -->

                    `;
            console.log('Adding signatory entry:', signatoryEntryCount26);
            $('#signatoryAccordion26').append(newSignatoryEntry26);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable26').on('click', function() {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable26();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button1', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item26').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function() {
            $(this).closest('.signaccordion-item26').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable26();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory26').on('click', function(event) {
            event.preventDefault();
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory27').on('click', function() {
            var SignatoryAccordionCount27 = $('#signatoryAccordion27 .signaccordion-item27').length + 1;

            var newSignAccordion27 = `
                <div class="accordion-item signaccordion-item27" id="signatoryEntry27${SignatoryAccordionCount27}">
                    <h2 class="accordion-header" id="signatoryHeading27${SignatoryAccordionCount27}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse27${SignatoryAccordionCount27}" aria-expanded="false" aria-controls="signatoryCollapse27${SignatoryAccordionCount27}">
                            Entry ${SignatoryAccordionCount27}
                        </button>
                    </h2>
                    <div id="signatoryCollapse27${SignatoryAccordionCount27}" class="collapse" aria-labelledby="signatoryHeading27${SignatoryAccordionCount27}">
                        <div class="accordion-body">
                            <div class="row mb-2" id="signatoryDetailsContainer27">
                                <div class="col-lg-12" id="lisence_consultant_add_fields">
                                    <div class=" row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Consultant Name <br> <input class="form-control mt-1"
                                                id="head_office_name" name="other_name[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Designation <br> <input class="form-control mt-1" id="head_office_email"
                                                name="other_desig[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Organization <br> <input class="form-control mt-1" id="head_office_name"
                                                name="other_org[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right mt-3">
                                            Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                                name="other_cell[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left mt-3">
                                            Email <br> <input class="form-control mt-1" id="head_office_name"
                                                name="other_email[]" type="text" placeholder="..."
                                                style="width: 103%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right mt-3">
                                            Consultancy Fees <br> <input class="form-control mt-1"
                                                id="head_office_name" name="other_fee[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right mt-3">
                                            Visiting Card Front <br> <input class="form-control mt-1"
                                                id="head_office_name" name="other_front[]" type="file"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right spacing-left mt-3">
                                            Visiting Card Back <br> <input class="form-control mt-1"
                                                id="head_office_name" name="other_back[]" type="file"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <h5>Consultant Bank Details :</h5>
                                    <div class=" row ">
                                        <div class="col-lg-4 spacing-right">
                                            Bank Name <br> <input class="form-control mt-1" id="head_office_name"
                                                name="other_bank[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Account Title <br> <input class="form-control mt-1"
                                                id="head_office_email" name="other_account[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Account Number <br> <input class="form-control mt-1"
                                                id="head_office_email" name="other_acc_no[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right mt-3">
                                            Any Agreed Financials <br> <input class="form-control mt-1"
                                                id="head_office_email" name="other_fin[]" type="file"
                                                placeholder="..." style="width: 100%;" multiple>
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                                            Notes <br> <textarea class="form-control mt-1" id=""
                                                name="other_notes[]" type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                                            Attachment <br> <input class="form-control mt-1" id="head_office_email"
                                                name="other_attachments[]" type="file" placeholder="..."
                                                style="width: 100%;" multiple>
                                        </div>
                                    </div>
                                    <h5>Consultant Address</h5>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right ">
                                            Office No <br> <input class="form-control mt-1" id="head_office_cell_no"
                                                name="other_office[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left">
                                            Building <br> <input class="form-control mt-1" id="head_office_cell_no"
                                                name="other_build[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-5 spacing-right mt-2">
                                            Block <br> <input class="form-control mt-1" id="head_office_cell_no"
                                                name="other_block[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left mt-2">
                                            Area <br> <input class="form-control mt-1" id="head_office_cell_no"
                                                name="other_area[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-5 spacing-right mt-2">
                                            City <br> <input class="form-control mt-1" id="head_office_cell_no"
                                                name="other_city[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left mt-2">
                                            Photograph of Building <br> <input class="form-control mt-1" id=""
                                                name="other_photo[]" type="file" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5 spacing-right mt-2">
                                            Email <br> <input class="form-control mt-1" id="" name="other_a_email[]"
                                                type="email" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left mt-2">
                                            Website <br> <input class="form-control mt-1" id="" name="other_web[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-5 spacing-right mt-2">
                                            Pin location <br> <input class="form-control mt-1" id=""
                                                name="other_pin[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left mt-2">
                                            GPS <br> <input class="form-control mt-1" id="" name="other_gps[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-5 spacing-right mt-2">
                                            Notes <br> <textarea class="form-control mt-1" id=""
                                                name="other_ex_notes[]" type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-5 spacing-left mt-2">
                                            Attachments <br> <input class="form-control mt-1" id=""
                                                name="other_ex_attach[]" type="file" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger removeSignAccordion27" type="button" style="width:10%; margin-left:13px;"
                            >Remove</button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion27').append(newSignAccordion27);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion27', function() {
            $(this).closest('.signaccordion-item27').remove();
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory28').on('click', function() {
            var SignatoryAccordionCount28 = $('#signatoryAccordion28 .signaccordion-item28').length + 1;

            var newSignAccordion28 = `
                <div class="accordion-item signaccordion-item28" id="signatoryEntry28${SignatoryAccordionCount28}">
                    <h2 class="accordion-header" id="signatoryHeading28${SignatoryAccordionCount28}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse28${SignatoryAccordionCount28}" aria-expanded="false" aria-controls="signatoryCollapse28${SignatoryAccordionCount28}">
                            Entry ${SignatoryAccordionCount28}
                        </button>
                    </h2>
                    <div id="signatoryCollapse28${SignatoryAccordionCount28}" class="collapse" aria-labelledby="signatoryHeading28${SignatoryAccordionCount28}">
                        <div class="accordion-body">
                            <div class="row mb-2" id="signatoryDetailsContainer28">
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Concerned Officer Name <br> <input class="form-control mt-1"
                                            id="other_cn_officer" name="other_iss_co_name[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Designation <br> <input class="form-control mt-1" id="oper_desig"
                                            name="other_iss_co_desig[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Department <br> <input class="form-control mt-1" id="head_office_name"
                                            name="other_iss_co_dept[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Section <br> <input class="form-control mt-1" id="head_office_name"
                                            name="other_iss_co_section[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        PTCL Number <br> <input class="form-control mt-1" id="head_office_name"
                                            name="other_iss_co_ptcl[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>

                                    <div class="col-lg-3 spacing-left mt-3">
                                        Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                            name="other_iss_co_cell[]" type="text" placeholder="..."
                                            style="width: 105%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Email <br> <input class="form-control mt-1" id="head_office_name"
                                            name="other_iss_co_email[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Website <br> <input class="form-control mt-1" id="head_office_name"
                                            name="other_iss_co_web[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Visiting Card Front <br> <input class="form-control mt-1"
                                            id="head_office_name" name="other_iss_co_front[]" type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right spacing-left mt-3">
                                        Visiting Card Back <br> <input class="form-control mt-1"
                                            id="head_office_name" name="other_iss_co_back[]" type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="row mb-2 mt-2">
                                        <div class="col-lg-5 spacing-right mt-3">
                                            Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                                name="other_iss_co_notes[]" type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-5 spacing-left mt-3">
                                            Attachments <br> <input class="form-control mt-1"
                                                id="head_office_email" name="other_iss_co_attach[]" type="file"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger removeSignAccordion28" type="button" style="width:10%; margin-left:13px;"
                            >Remove</button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion28').append(newSignAccordion28);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion28', function() {
            $(this).closest('.signaccordion-item28').remove();
        });
    });
    </script>

<!-- script for show data of issuing authority in (any other License details) in table -->
<script>
    $(document).ready(function() {
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable28() {
            // Clear existing rows
            $('#signatorySummaryTable28 tbody').empty();

            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item28').each(function(index) {
                var other_iss_officer_name = $(this).find('[name="other_iss_co_name[]"]').val();
                var other_iss_we_desig = $(this).find('[name="other_iss_co_desig[]"]').val();
                var other_iss_we_depart = $(this).find('[name="other_iss_co_dept[]"]').val();
                var other_iss_we_sec = $(this).find('[name="other_iss_co_section[]"]').val();
                var other_iss_we_ptclNo = $(this).find('[name="other_iss_co_ptcl[]"]').val();
                var other_iss_we_cellNo = $(this).find('[name="other_iss_co_cell[]"]').val();
                var other_iss_we_email = $(this).find('[name="other_iss_co_email[]"]').val();
                var other_iss_we_website = $(this).find('[name="other_iss_co_web[]"]').val();
                var other_iss_we_notes = $(this).find('[name="other_iss_co_notes[]"]').val();

                // Check if any relevant data is entered
                if (other_iss_officer_name || other_iss_we_desig || other_iss_we_depart || other_iss_we_sec || other_iss_we_ptclNo
                    || other_iss_we_cellNo || other_iss_we_email || other_iss_we_website || other_iss_we_notes) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable28 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${other_iss_officer_name}</td>
                            <td>${other_iss_we_desig}</td>
                            <td>${other_iss_we_depart}</td>
                            <td>${other_iss_we_sec}</td>
                            <td>${other_iss_we_ptclNo}</td>
                            <td>${other_iss_we_cellNo}</td>
                            <td>${other_iss_we_email}</td>
                            <td>${other_iss_we_website}</td>
                            <td>${other_iss_we_notes}</td>
                                    <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                                    <!-- Add more columns as needed -->
                                </tr>
                            `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory28').on('click', function() {
            var signatoryEntryCount28 = $('#signatoryAccordion28 .signaccordion-item28').length + 1;

            var newSignatoryEntry28 = `
                        <!-- Your existing signatory accordion HTML goes here -->

                    `;
            console.log('Adding signatory entry:', signatoryEntryCount28);
            $('#signatoryAccordion28').append(newSignatoryEntry28);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable28').on('click', function() {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable28();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item28').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function() {
            $(this).closest('.signaccordion-item28').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable28();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory28').on('click', function(event) {
            event.preventDefault();
        });
    });
</script>

<!-- script for show data of consultant details in (any other License details) in table -->
<script>
    $(document).ready(function() {
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable27() {
            // Clear existing rows
            $('#signatorySummaryTable27 tbody').empty();

            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item27').each(function(index) {
                var other_consultant_name = $(this).find('[name="other_name[]"]').val();
                var other_desig = $(this).find('[name="other_desig[]"]').val();
                var other_Organization = $(this).find('[name="other_org[]"]').val();
                var other_cell_no = $(this).find('[name="other_cell[]"]').val();
                var other_email = $(this).find('[name="other_email[]"]').val();
                var other_consultant_fee = $(this).find('[name="other_fee[]"]').val();

                // Check if any relevant data is entered
                if (other_consultant_name || other_desig || other_Organization || other_cell_no || other_email || other_consultant_fee) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable27 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${other_consultant_name}</td>
                            <td>${other_desig}</td>
                            <td>${other_Organization}</td>
                            <td>${other_cell_no}</td>
                            <td>${other_email}</td>
                            <td>${other_consultant_fee}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                                </tr>
                            `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory27').on('click', function() {
            var signatoryEntryCount27 = $('#signatoryAccordion27 .signaccordion-item27').length + 1;

            var newSignatoryEntry27 = `
                        <!-- Your existing signatory accordion HTML goes here -->

                    `;
            console.log('Adding signatory entry:', signatoryEntryCount27);
            $('#signatoryAccordion27').append(newSignatoryEntry27);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable27').on('click', function() {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable27();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item27').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function() {
            $(this).closest('.signaccordion-item27').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable27();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory27').on('click', function(event) {
            event.preventDefault();
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory29').on('click', function() {
            var SignatoryAccordionCount29 = $('#signatoryAccordion29 .signaccordion-item29').length + 1;

            var newSignAccordion29 = `
                <div class="accordion-item signaccordion-item29" id="signatoryEntry29${SignatoryAccordionCount29}">
                    <h2 class="accordion-header" id="signatoryHeading29${SignatoryAccordionCount29}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse29${SignatoryAccordionCount29}" aria-expanded="false" aria-controls="signatoryCollapse29${SignatoryAccordionCount29}">
                            Entry ${SignatoryAccordionCount29}
                        </button>
                    </h2>
                    <div id="signatoryCollapse29${SignatoryAccordionCount29}" class="collapse" aria-labelledby="signatoryHeading29${SignatoryAccordionCount29}">
                        <div class="accordion-body">
                            <div class="row mb-2" id="signatoryDetailsContainer29">
                                <div class="col-lg-6 spacing-right mb-3">
                                    Category <br>
                                    <select class="form-control" name="other_fee_category[]"
                                        style="width: 100%;">
                                        <option value=""> </option>
                                        <option value="Legal Fee">Legal Fee</option>
                                        <option value="Speed Money">Speed Money</option>
                                        <option value="Consultancy Fee">Consultancy Fee</option>
                                    </select>
                                </div>
                                <h5 style="margin-left:10px;">Withdrawal From:</h5>
                                <div class="col-lg-12">
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Bank Name <br> <input class="form-control mt-1"
                                                id="head_office_name" name="other_finance_bank[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Cheque/Instrument No. <br> <input class="form-control mt-1"
                                                id="head_office_email" name="other_finance_cheque[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Scanned copy of Cheque/Instrument<br> <input
                                                class="form-control mt-1" id="head_office_name"
                                                name="other_finance_copy[]" type="file" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right mt-3">
                                            Amount in figures <br> <input class="form-control mt-1"
                                                id="head_office_name" name="other_finance_amount[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                                            Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                                name="other_finance_notes[]" type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-rightmt-3">
                                            Attachments <br> <input class="form-control mt-1"
                                                id="head_office_email" name="other_finance_attach[]" type="file"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <h5>Withdrawal By :</h5>
                                        <div class="col-lg-4 spacing-right">
                                            Name <br> <input class="form-control mt-1" id="head_office_name"
                                                name="other_finance_wb_name[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Employee ID <br> <input class="form-control mt-1"
                                                id="head_office_email" name="other_finance_wb_id[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Designation <br> <input class="form-control mt-1"
                                                id="head_office_name" name="other_finance_wb_desig[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right mt-3">
                                            Cell Number <br> <input class="form-control mt-1"
                                                id="head_office_name" name="other_finance_wb_cell[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left mt-3">
                                            Email ID <br> <input class="form-control mt-1" id="head_office_name"
                                                name="other_finance_wb_email[]" type="text" placeholder="..."
                                                style="width: 103%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                                            Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                                name="other_finance_wb_notes[]" type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Attachments <br> <input class="form-control mt-1"
                                                id="head_office_email" name="other_finance_wb_attach[]"
                                                type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                        <h5 class="mt-2">Fees :</h5>
                                        <div class="col-lg-4 spacing-right">
                                            Fees <br> <input class="form-control mt-1" id="head_office_name"
                                                name="other_finance_fee[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right lh-lg">
                                            Date of Fees Deposit <br> <input class="form-control mt-1"
                                                id="head_office_email" name="other_finance_fee_date[]"
                                                type="date" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right lh-lg">
                                            Name of bank<br> <input class="form-control mt-1"
                                                id="head_office_name" name="other_finance_fee_bank[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right mt-3">
                                            Instrument Number <br> <input class="form-control mt-1"
                                                id="head_office_name" name="other_finance_fee_ins[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                                            Deposit Slip Attachment <br> <input class="form-control mt-1"
                                                id="head_office_email" name="other_finance_slip_attach[]"
                                                type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right mt-3">
                                            Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                                name="other_finance_fee_notes[]" type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                                            Attachments <br> <input class="form-control mt-1"
                                                id="head_office_email" name="other_finance_fee_attach[]"
                                                type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                        <h5 class="mt-2">Deposited By :</h5>
                                        <div class="col-lg-4 spacing-right">
                                            Name <br> <input class="form-control mt-1" id="head_office_name"
                                                name="other_finance_db_name[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Employee ID <br> <input class="form-control mt-1"
                                                id="head_office_email" name="other_finance_db_id[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Designation <br> <input class="form-control mt-1"
                                                id="head_office_name" name="other_finance_db_desig[]"
                                                type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right mt-3">
                                            Cell Number <br> <input class="form-control mt-1"
                                                id="head_office_name" name="other_finance_db_cell[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left mt-3">
                                            Email ID <br> <input class="form-control mt-1" id="head_office_name"
                                                name="other_finance_db_email[]" type="text" placeholder="..."
                                                style="width: 103%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                                            Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                                name="other_finance_db_notes[]" type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Attachments <br> <input class="form-control mt-1"
                                                id="head_office_email" name="other_finance_db_attach[]"
                                                type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger removeSignAccordion29" type="button" style="width:10%; margin-left:13px;"
                            >Remove</button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion29').append(newSignAccordion29);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion29', function() {
            $(this).closest('.signaccordion-item29').remove();
        });
    });
    </script>

<!-- script for show data of finance in renewal in (any other License details) i table -->
<script>
    $(document).ready(function() {
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable29() {
            // Clear existing rows
            $('#signatorySummaryTable29 tbody').empty();

            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item29').each(function(index) {
                var other_finance_category = $(this).find('[name="other_fee_category[]"]').val();
                var other_finance_bank = $(this).find('[name="other_finance_bank[]"]').val();
                var other_finance_cheque = $(this).find('[name="other_finance_cheque[]"]').val();
                var other_finance_amount = $(this).find('[name="other_finance_amount[]"]').val();
                var other_finance_note = $(this).find('[name="other_finance_notes[]"]').val();

                // Check if any relevant data is entered
                if (other_finance_category || other_finance_bank || other_finance_cheque || other_finance_amount || other_finance_note) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable29 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${other_finance_category}</td>
                            <td>${other_finance_bank}</td>
                            <td>${other_finance_cheque}</td>
                            <td>${other_finance_amount}</td>
                            <td>${other_finance_note}</td>
                                    <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                                    <!-- Add more columns as needed -->
                                </tr>
                            `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory29').on('click', function() {
            var signatoryEntryCount29 = $('#signatoryAccordion29 .signaccordion-item29').length + 1;

            var newSignatoryEntry29 = `
                        <!-- Your existing signatory accordion HTML goes here -->

                    `;
            console.log('Adding signatory entry:', signatoryEntryCount29);
            $('#signatoryAccordion29').append(newSignatoryEntry29);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable29').on('click', function() {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable29();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item29').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function() {
            $(this).closest('.signaccordion-item29').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable29();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory29').on('click', function(event) {
            event.preventDefault();
        });
    });
</script>


<script>
document.getElementById("submit-category2").addEventListener("click", function() {
    var customCategory = document.getElementById("custom-dropdown-category1").value;
    var select = document.getElementById("weapon_category1");
    var option = document.createElement("option");
    option.text = customCategory;
    option.value = customCategory;
    select.add(option);
});
</script>

<script>
document.getElementById("submit-category3").addEventListener("click", function() {
    var customCategory = document.getElementById("custom-dropdown-category2").value;
    var select = document.getElementById("bore_category1");
    var option = document.createElement("option");
    option.text = customCategory;
    option.value = customCategory;
    select.add(option);
});
</script>

<script>
document.getElementById("submit-city").addEventListener("click", function() {
    var customCategory = document.getElementById("custom-city").value;
    var select = document.getElementById("catagory");
    var option = document.createElement("option");
    option.text = customCategory;
    option.value = customCategory;
    select.add(option);
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
<!--  -->
<script>
var room3 = 1;

function consultant_add_fields() {

    room3++;
    var objTo = document.getElementById('operating-consultant_add_fields');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "third-col removeclass" + room3);
    var rdiv = 'removeclass' + room3;

    divtest.innerHTML = `
                <div class="row">
                    <div class=" row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Consultant Name <br> <input class="form-control mt-1" id="head_office_name"
                                name="oper_name[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Designation <br> <input class="form-control mt-1" id="head_office_email"
                                name="oper_desig[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Organization <br> <input class="form-control mt-1" id="head_office_name"
                                name="oper_org[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                name="oper_cell[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left mt-3">
                            Email <br> <input class="form-control mt-1" id="head_office_name"
                                name="oper_email[]" type="text" placeholder="..." style="width: 103%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Consultancy Fees <br> <input class="form-control mt-1" id="head_office_name"
                                name="oper_fee[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Visiting Card Front <br> <input class="form-control mt-1" id="head_office_name"
                                name="oper_front[]" type="file" multiple placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right spacing-left mt-3">
                            Visiting Card Back <br> <input class="form-control mt-1" id="head_office_name"
                                name="oper_back[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <h5>Consultant Bank Details :</h5>
                    <div class=" row ">
                        <div class="col-lg-4 spacing-right">
                            Bank Name <br> <input class="form-control mt-1" id="head_office_name"
                                name="oper_bank[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Account Title <br> <input class="form-control mt-1" id="head_office_email"
                                name="oper_account[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Account Number <br> <input class="form-control mt-1" id="head_office_email"
                                name="oper_acc_no[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Any Agreed Financials <br> <input class="form-control mt-1"
                                id="head_office_email" name="oper_fin[]" type="file" placeholder="..."
                                style="width: 100%;">
                        </div>

                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Notes <br> <textarea class="form-control mt-1" id="" name="oper_notes[]"
                                type="text" placeholder="..." style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Attachment <br> <input class="form-control mt-1" id="head_office_email"
                                name="oper_attachments[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <h5>Consultant Address</h5>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right ">
                            Office No <br> <input class="form-control mt-1" id="head_office_cell_no"
                                name="oper_office[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Building <br> <input class="form-control mt-1" id="head_office_cell_no"
                                name="oper_build[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            Block <br> <input class="form-control mt-1" id="head_office_cell_no"
                                name="oper_block[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Area <br> <input class="form-control mt-1" id="head_office_cell_no"
                                name="oper_area[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            City <br> <input class="form-control mt-1" id="head_office_cell_no"
                                name="oper_city[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Photograph of Building <br> <input class="form-control mt-1" id=""
                                name="oper_photo[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 spacing-right mt-2">
                            Email <br> <input class="form-control mt-1" id="" name="oper_a_email[]" type="email"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Website <br> <input class="form-control mt-1" id="" name="oper_web[]" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            Pin location <br> <input class="form-control mt-1" id="" name="oper_pin[]"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            GPS <br> <input class="form-control mt-1" id="" name="oper_gps[]" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            Notes <br> <textarea class="form-control mt-1" id="" name="oper_ex_notes[]"
                                type="text" placeholder="..." style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Attachments <br> <input class="form-control mt-1" id="" name="oper_ex_attach[]"
                                type="file" placeholder="..." style="width: 100%;">
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
    var objTo = document.getElementById('operating_authority_add_fields');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "third-col removeclass" + authorityRoom);

    divtest.innerHTML = `
            <h5>Issuing Authority :</h5>
            <div class="row mb-2">
                <div class="col-lg-3 spacing-right">
                    Concerned Officer Name <br> <input class="form-control mt-1"
                        id="oper_cn_officer" name="oper_iss_co_name[]" type="text" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-left spacing-right">
                    Designation <br> <input class="form-control mt-1" id="oper_desig"
                        name="oper_iss_co_desig[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Department <br> <input class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_dept[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Section <br> <input class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_section[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    PTCL Number <br> <input class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_ptcl[]" type="text" placeholder="..." style="width: 100%;">
                </div>

                <div class="col-lg-3 spacing-left mt-3">
                    Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_cell[]" type="text" placeholder="..." style="width: 105%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Email <br> <input class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_email[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Website <br> <input class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_web[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Visiting Card Front <br> <input class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_front[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right spacing-left mt-3">
                    Visiting Card Back <br> <input class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_back[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="row mb-2 mt-2">
                    <div class="col-lg-5 spacing-right mt-3">
                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                            name="oper_iss_co_notes[]" type="text" placeholder="..."
                            style="width: 100%;"></textarea>
                    </div>
                    <div class="col-lg-5 spacing-left mt-3">
                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                            name="oper_iss_co_attach[]" type="file" placeholder="..."
                            style="width: 100%;">
                    </div>
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
var weapon_authority_Room = 1;

function weapon_authority_add_fields() {
    weapon_authority_Room++;
    var objTo = document.getElementById('weapon_authority_add_fields');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "third-col removeclass" + weapon_authority_Room);

    divtest.innerHTML = `
            <h5>Issuing Authority :</h5>
            <div class="row mb-2">
                <div class="col-lg-4 spacing-right">
                    <input type="hidden" name="i_id[]" value="${weapon_authority_Room}">
                </div>
                <div class="col-lg-3 spacing-right">
                    Concerned Officer Name <br> <input class="form-control mt-1"
                        id="head_office_name" name="wep_iss_co_name[]" type="text" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-left spacing-right">
                    Designation <br> <input class="form-control mt-1" id="head_office_email"
                        name="wep_iss_co_desig[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Department <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_dept[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Section <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_sec[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right lh-lg">
                    PTCL Number <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_ptcl[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-left mt-3">
                    Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_cell[]" type="text" placeholder="..." style="width: 107%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Email <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_email[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Website <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_web[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Visiting Card Front <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_front[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right spacing-left mt-3">
                    Visiting Card Back <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_back[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="row mb-2 mt-3">
                    <div class="col-lg-4 spacing-right">
                        Notes <br> <textarea class="form-control mt-1" id="" name="wep_iss_co_notes[]"
                            type="text" placeholder="..." style="width: 100%;"></textarea>
                    </div>
                    <div class="col-lg-4 spacing-left">
                        Attachments <br> <input class="form-control mt-1" id="" name="wep_iss_co_attach[]"
                            type="file" placeholder="..." style="width: 100%;">
                    </div>
                </div>
            </div>
            <h5>Printing Authority:</h5>
            <div class="col-lg-12">
                <div class="row mb-2">
                    <div class="col-lg-3 spacing-right">
                        Concerned Officer Name <br> <input class="form-control mt-1"
                            id="head_office_name" name="wep_p_co_name[]" type="text" placeholder="..."
                            style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-left spacing-right">
                        Designation <br> <input class="form-control mt-1" id="head_office_email"
                            name="wep_co_p_desig[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right">
                        Department <br> <input class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_dept[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right">
                        Section <br> <input class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_sec[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right mt-3">
                        PTCL Number <br> <input class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_ptcl[]" type="text" placeholder="..." style="width: 100%;">
                    </div>

                    <div class="col-lg-3 spacing-left mt-3">
                        Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_cell[]" type="text" placeholder="..." style="width: 103%;">
                    </div>
                    <div class="col-lg-3 spacing-right mt-3">
                        Email <br> <input class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_email[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right mt-3">
                        Website <br> <input class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_web[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right mt-3">
                        Visiting Card Front <br> <input class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_front[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right spacing-left mt-3">
                        Visiting Card Back <br> <input class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_back[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4 spacing-right">
                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_notes[]" type="text" placeholder="..."
                            style="width: 100%;"></textarea>
                    </div>
                    <div class="col-lg-4 spacing-right">
                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                            name="wep_co_p_attach[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                </div>
            </div>
            <button type="button" onclick="authority_remove_fields(${weapon_authority_Room})">Remove</button>
            `;

    objTo.appendChild(divtest);
}

function authority_remove_fields(rid) {
    $('.removeclass' + rid).remove();
}
</script>

<script>
var lisence_finance_Room = 1;

function lisence_finance_add_fields() {
    lisence_finance_Room++;
    var objTo = document.getElementById('lisence_finance_add_fields');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "third-col removeclass" + lisence_finance_Room);

    divtest.innerHTML = `
                <div class="row add-more">
                    <div class="col-lg-4 spacing-right">
                        <input type="hidden" name="r_id[]" value="${lisence_finance_Room}">
                    </div>
                    <h3 style="border: 2px solid black; width: 99%; padding: 10px;"><b>Finances :</b></h3>
                    <div class="col-lg-6 spacing-right mb-3">
                        Category <br>
                        <select class="form-control" name="other_fee_category[]" style="width: 100%;">
                            <option value=""> </option>
                            <option value="Legal Fee">Legal Fee</option>
                            <option value="Speed Money">Speed Money</option>
                            <option value="Consultancy Fee">Consultancy Fee</option>
                        </select>
                    </div>

                    <h5 style="margin-left:10px;">Withdrawal From:</h5>
                    <div class="col-lg-12">
                        <div class="row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Bank Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="other_finance_bank[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Cheque/Instrument No. <br> <input class="form-control mt-1"
                                    id="head_office_email" name="other_finance_cheque[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Scanned copy of Cheque/Instrument<br> <input class="form-control mt-1"
                                    id="head_office_name" name="other_finance_copy[]" type="file"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Amount in figures <br> <input class="form-control mt-1"
                                    id="head_office_name" name="other_finance_amount[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="other_finance_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-rightmt-3">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="other_finance_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5>Withdrawal By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="other_finance_wb_name[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input class="form-control mt-1" id="head_office_email"
                                    name="other_finance_wb_id[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input class="form-control mt-1" id="head_office_name"
                                    name="other_finance_wb_desig[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                    name="other_finance_wb_cell[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input class="form-control mt-1" id="head_office_name"
                                    name="other_finance_wb_email[]" type="text" placeholder="..."
                                    style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="other_finance_wb_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="other_finance_wb_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Fees :</h5>
                            <div class="col-lg-4 spacing-right">
                                Fees <br> <input class="form-control mt-1" id="head_office_name"
                                    name="other_finance_fee[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right lh-lg">
                                Date of Fees Deposit <br> <input class="form-control mt-1"
                                    id="head_office_email" name="other_finance_fee_date[]" type="date"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right lh-lg">
                                Name of bank<br> <input class="form-control mt-1" id="head_office_name"
                                    name="other_finance_fee_bank[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Instrument Number <br> <input class="form-control mt-1"
                                    id="head_office_name" name="other_finance_fee_ins[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Deposit Slip Attachment <br> <input class="form-control mt-1"
                                    id="head_office_email" name="other_finance_slip_attach[]" type="file"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="other_finance_fee_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="other_finance_fee_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Deposited By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="other_finance_db_name[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input class="form-control mt-1" id="head_office_email"
                                    name="other_finance_db_id[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input class="form-control mt-1" id="head_office_name"
                                    name="other_finance_db_desig[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                    name="other_finance_db_cell[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input class="form-control mt-1" id="head_office_name"
                                    name="other_finance_db_email[]" type="text" placeholder="..."
                                    style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="other_finance_db_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="other_finance_db_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Include other "Finances" input fields here -->
                <button type="button" onclick="finance_remove_fields(${lisence_finance_Room})">Remove Finance</button>
            `;

    objTo.appendChild(divtest);
}

function finance_remove_fields(rid) {
    $('.removeclass' + rid).remove();
}
</script>

<script>
var weapon_consultant_room3 = 1;

function weapon_consultant_add_fields() {

    weapon_consultant_room3++;
    var objTo = document.getElementById('weapon_consultant_add_fields');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "third-col removeclass" + weapon_consultant_room3);
    var rdiv = 'removeclass' + weapon_consultant_room3;

    divtest.innerHTML = `
                <div class="row">
                    <h5>Consultant Details :</h5>
                    <div class=" row mb-2">
                        <div class="col-lg-4 spacing-right">
                            <input type="hidden" name="c_id[]" value="${weapon_consultant_room3}">
                        </div>
                        <div class=" row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Consultant Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_name[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Designation <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_desig[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Organization <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_org[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_cell[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_email[]" type="text" placeholder="..." style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Consultancy Fees <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_fee[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Visiting Card Front <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_front[]" type="file" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right spacing-left mt-3">
                                Visiting Card Back <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_back[]" type="file" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <h5>Consultant Bank Details :</h5>
                        <div class=" row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Bank Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_bank[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Account Title <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_acc[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Account Number <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_acc_no[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Any Agreed Financials <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_fin[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="" name="wep_notes[]"
                                    type="text" placeholder="..." style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachment <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_attach[]" type="file" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <h5>Consultant Address</h5>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Office No <br> <input class="form-control mt-1" id="head_office_cell_no"
                                    name="wep_office[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Building <br> <input class="form-control mt-1" id="head_office_cell_no"
                                    name="wep_build[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right mt-2">
                                Block <br> <input class="form-control mt-1" id="head_office_cell_no"
                                    name="wep_block[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Area <br> <input class="form-control mt-1" id="head_office_cell_no"
                                    name="wep_area[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right mt-2">
                                City <br> <input class="form-control mt-1" id="head_office_cell_no"
                                    name="wep_city[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Photograph of Building <br> <input class="form-control mt-1" id=""
                                    name="wep_photo[]" type="file" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right mt-2">
                                Email <br> <input class="form-control mt-1" id="" name="wep_a_email[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Website <br> <input class="form-control mt-1" id="" name="wep_web[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right mt-2">
                                Pin location <br> <input class="form-control mt-1" id="" name="wep_pin[]"
                                    type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                GPS <br> <input class="form-control mt-1" id="" name="wep_gps[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-5 spacing-right ">
                                Notes <br> <textarea class="form-control mt-1" id="" name="wep_ex_notes[]"
                                    type="text" placeholder="..." style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Attachments <br> <input class="form-control mt-1" id="" name="wep_ex_attach[]"
                                    type="file" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <button type="button" style="width:20%; margin-left:13px;" onclick="consultant_remove_fields(${weapon_consultant_room3})">Remove</button>
                </div>`;

    objTo.appendChild(divtest);
}

function consultant_remove_fields(rid) {
    $('.removeclass' + rid).remove();
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- script for add more weapon license -->
<script>
$(document).ready(function() {
    // Add More Button Click Event
    $('#addSignatory15').on('click', function() {
        var SignatoryAccordionCount15 = $('#signatoryAccordion15 .signaccordion-item15').length + 1;

        var newSignAccordion15 = `
            <div class="accordion-item signaccordion-item15" id="signatoryEntry15${SignatoryAccordionCount15}">
                <h2 class="accordion-header" id="signatoryHeading15${SignatoryAccordionCount15}">
                    <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse15${SignatoryAccordionCount15}" aria-expanded="false" aria-controls="signatoryCollapse15${SignatoryAccordionCount15}">
                        Entry ${SignatoryAccordionCount15}
                    </button>
                </h2>
                <div id="signatoryCollapse15${SignatoryAccordionCount15}" class="collapse" aria-labelledby="signatoryHeading15${SignatoryAccordionCount15}">
                    <div class="accordion-body">
                        <div class="row mb-2" id="signatoryDetailsContainer15">
                            <div class="col-lg-4 spacing-left spacing-right">
                                License Number <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_license[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Weapon Number <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_lic_no[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Type <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_lic_type[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Caliber <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_lic_caliber[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Jurisdiction <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_lic_juris[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Tenure of Renewal <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_lic_tenure[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Cost of Renewal <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_lic_cost[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Expiry date <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_lic_expiry[]" type="date"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Sanction Date <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_lic_sancdate[]" type="date"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                License Attachment <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_lic_attach[]" type="file"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Weapon Dealer Name: <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_lic_dealername[]"
                                    type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Vendor ID: <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_lic_vendorid[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Scanned Stamp of License
                                <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_lic_scanned[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Endorsement From <br>
                                <select class="form-control mt-1" name="wep_lic_category[]"
                                    style="width: 100%;">
                                    <option value="select">select</option>
                                    <option value="DG Office">DG Office</option>
                                    <option value="Post Office">Post Office</option>
                                </select>
                                Add Custom Endorsement <br>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                        name="wep_lic_add_cus_end" id="leadcustom-category"
                                        placeholder="Enter custom lead">
                                    <button class="btn btn-primary" id="leadsubmit-category"
                                        type="button" style="margin-top: 4px;">Add</button>
                                </div>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Endorsement Date: <br> <input class="form-control mt-1" id=""
                                    name="wep_lic_endate[]" type="date" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right ">
                                Scanned Copy of Endorsement: <br> <input
                                    class="form-control mt-1" id="" name="wep_lic_encopy[]"
                                    type="file" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-4 spacing-left spacing-right"
                                    style="margin-left: 5px">
                                    Notes <br> <textarea class="form-control mt-1" id=""
                                        name="wep_lic_ex_notes[]" type="text" placeholder="..."
                                        style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right"
                                    style="margin-left: 5px">
                                    Attachments <br> <input class="form-control mt-1"
                                        id="head_office_email" name="wep_lic_ex_attach[]"
                                        type="file" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger removeSignAccordion15 mb-2" type="button"
                        style="width:10%; margin-left:13px;"">Remove</button>
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


<!-- Script for show weapon license summary in table -->
<script>
$(document).ready(function() {
    // Function to update summary table for Vehicals entries
    function updateSignatorySummaryTable15() {
        // Clear existing rows
        $('#signatorySummaryTable15 tbody').empty();

        // Iterate through each gaurd accordion item and update the summary table
        $('.signaccordion-item15').each(function(index) {
            var licenseNumber = $(this).find('[name="wep_license[]"]').val();
            var weaponNo = $(this).find('[name="wep_lic_no[]"]').val();
            var wepLicType = $(this).find('[name="wep_lic_type[]"]').val();
            var wepLicCaliber = $(this).find('[name="wep_lic_caliber[]"]').val();
            var wepLicJuris = $(this).find('[name="wep_lic_juris[]"]').val();
            var wepLicTenure = $(this).find('[name="wep_lic_tenure[]"]').val();
            var wepLicCost = $(this).find('[name="wep_lic_cost[]"]').val();
            var wepLicExpiry = $(this).find('[name="wep_lic_expiry[]"]').val();
            var wepLicSancdate = $(this).find('[name="wep_lic_sancdate[]"]').val();
            var wepLicAttach = $(this).find('[name="wep_lic_attach[]"]').val();
            var wepLicDealername = $(this).find('[name="wep_lic_dealername[]"]').val();
            var wepLicVendorid = $(this).find('[name="wep_lic_vendorid[]"]').val();
            var wepLicScanned = $(this).find('[name="wep_lic_scanned[]"]').val();
            var wepLicCategory = $(this).find('[name="wep_lic_category[]"]').val();
            var wepLicAddCusEnd = $(this).find('[name="wep_lic_add_cus_end"]').val();
            var wepLicEndate = $(this).find('[name="wep_lic_endate[]"]').val();
            var webLicEncopy = $(this).find('[name="wep_lic_encopy[]"]').val();
            var wepLicExNotes = $(this).find('[name="wep_lic_ex_notes[]"]').val();
            var wepLicExAttach = $(this).find('[name="wep_lic_ex_attach[]"]').val();
            console.log(licenseNumber);
            if (licenseNumber || weaponNo || wepLicType || wepLicCaliber || wepLicJuris ||
                wepLicTenure || wepLicCost || wepLicExpiry || wepLicSancdate || wepLicAttach ||
                wepLicDealername || wepLicVendorid || wepLicScanned || wepLicCategory ||
                wepLicAddCusEnd ||
                wepLicEndate || webLicEncopy || wepLicExNotes || wepLicExAttach) {
                $('#signatorySummaryTable15 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${licenseNumber}</td>
                            <td>${weaponNo}</td>
                            <td>${wepLicType}</td>
                            <td>${wepLicCaliber}</td>
                            <td>${wepLicJuris}</td>
                            <td>${wepLicTenure}</td>
                            <td>${wepLicCost}</td>
                            <td>${wepLicExpiry}</td>
                            <td>${wepLicSancdate}</td>
                            <td>${wepLicAttach}</td>
                            <td>${wepLicDealername}</td>
                            <td>${wepLicVendorid}</td>
                            <td>${wepLicScanned}</td>
                            <td>${wepLicCategory}</td>
                            <td>${wepLicEndate}</td>
                            <td>${wepLicAddCusEnd}</td>
                            <td>${webLicEncopy}</td>
                            <td>${wepLicExNotes}</td>
                            <td>${wepLicExAttach}</td>
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
        console.log("clicked save");
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
    $(document).on('click', '.removeSignatoryAccordion', function() {
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
var legalRoom = 1;

function addLegalDetails() {
    legalRoom++;
    var objTo = document.getElementById('legalDetailsContainer'); // Adjust the ID to match your structure
    var divTest = document.createElement("div");
    divTest.setAttribute("class", "removeclass" + legalRoom);

    divTest.innerHTML = `
            <!-- Your HTML code here -->
              <div class="row legal_fee">
                <div class="col-lg-4 spacing-right">
                    <input type="hidden" name="c_id[]" value="${legalRoom}">
                </div>
                <div class="col-lg-4 spacing-right">
                    Bank Name <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_legal_bank[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right">
                    Cheque/Instrument No. <br> <input class="form-control mt-1"
                        id="head_office_email" name="wep_legal_cheque[]" type="text" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Scanned copy of Cheque/Instrument<br> <input class="form-control mt-1"
                        id="head_office_name" name="wep_legal_copy[]" type="file" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right mt-3">
                    Amount in figures <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_legal_amount[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                        name="wep_legal_notes[]" type="text" placeholder="..."
                        style="width: 100%;"></textarea>
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Attachments <br> <input class="form-control mt-1" id="head_office_email"
                        name="wep_legal_attach[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <h5>Withdrawal By :</h5>
                <div class="col-lg-4 spacing-right">
                    Name <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_legal_wb_name[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right">
                    Employee ID <br> <input class="form-control mt-1" id="head_office_email"
                        name="wep_legal_wb_id[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Designation <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_legal_wb_desig[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right mt-3">
                    Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_legal_wb_cell[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left mt-3">
                    Email ID <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_legal_wb_email[]" type="text" placeholder="..." style="width: 103%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                        name="wep_legal_wb_notes[]" type="text" placeholder="..."
                        style="width: 100%;"></textarea>
                </div>
                <div class="col-lg-4 spacing-right">
                    Attachments <br> <input class="form-control mt-1" id="head_office_email"
                        name="wep_legal_wb_attach[]" type="file" placeholder="..."
                        style="width: 100%;">
                </div>
                <h5 class="mt-2">Fees :</h5>
                <div class="col-lg-4 spacing-left">
                    Fees A <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_legal_fee_a[]" type="text" placeholder="..." style="width: 103%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Fees B <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_legal_fee_b[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Total Fees <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_legal_fee_t[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Date of Fees Deposit <br> <input class="form-control mt-1"
                        id="head_office_email" name="wep_legal_fee_date[]" type="date"
                        placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right mt-3">
                    Name of bank<br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_legal_fee_bank[]" type="text" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right mt-3">
                    Instrument Number <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_legal_fee_ins[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Deposit Slip Attachment <br> <input class="form-control mt-1"
                        id="head_office_email" name="wep_legal_fee_slip[]" type="file"
                        placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right mt-3">
                    Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                        name="wep_legal_fee_notes[]" type="text" placeholder="..."
                        style="width: 100%;"></textarea>
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Attachments <br> <input class="form-control mt-1" id="head_office_email"
                        name="wep_legal_fee_attach[]" type="file" placeholder="..."
                        style="width: 100%;">
                </div>
                <h5 class="mt-2">Deposited By :</h5>
                <div class="col-lg-4 spacing-right">
                    Name <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_legal_db_name[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right">
                    Employee ID <br> <input class="form-control mt-1" id="head_office_email"
                        name="wep_legal_db_id[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Designation <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_legal_db_desig[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right mt-3">
                    Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_legal_db_cell[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left mt-3">
                    Email ID <br> <input class="form-control mt-1" id="head_office_name"
                        name="wep_legal_db_email[]" type="text" placeholder="..." style="width: 103%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                        name="wep_legal_db_notes[]" type="text" placeholder="..."
                        style="width: 100%;"></textarea>
                </div>
                <div class="col-lg-4 spacing-right">
                    Attachments <br> <input class="form-control mt-1" id="head_office_email"
                        name="wep_legal_db_attach[]" type="file" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="new_branch mt-2">
                    <button type="button" onclick="removeLegalDetails(${legalRoom})">
                        Remove
                    </button>
                </div>
            </div>

            <hr>
        `;

    objTo.appendChild(divTest);
}

function removeLegalDetails(rid) {
    var element = document.querySelector('.removeclass' + rid);
    element.parentNode.removeChild(element);
}
</script>

<script>
var lisence_consultant_room3 = 1;

function lisence_consultant_add_fields() {

    lisence_consultant_room3++;
    var objTo = document.getElementById('lisence_consultant_add_fields');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "third-col removeclass" + lisence_consultant_room3);
    var rdiv = 'removeclass' + lisence_consultant_room3;

    divtest.innerHTML = `
                <div class="row">
                    <div class=" row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Consultant Name <br> <input class="form-control mt-1" id="head_office_name"
                                name="other_name[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Designation <br> <input class="form-control mt-1" id="head_office_email"
                                name="other_desig[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Organization <br> <input class="form-control mt-1" id="head_office_name"
                                name="other_org[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                name="other_cell[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left mt-3">
                            Email <br> <input class="form-control mt-1" id="head_office_name"
                                name="other_email[]" type="text" placeholder="..." style="width: 103%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Consultancy Fees <br> <input class="form-control mt-1" id="head_office_name"
                                name="other_fee[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Visiting Card Front <br> <input class="form-control mt-1" id="head_office_name"
                                name="other_front[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right spacing-left mt-3">
                            Visiting Card Back <br> <input class="form-control mt-1" id="head_office_name"
                                name="other_back[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <h5>Consultant Bank Details :</h5>
                    <div class=" row ">
                        <div class="col-lg-4 spacing-right">
                            Bank Name <br> <input class="form-control mt-1" id="head_office_name"
                                name="other_bank[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Account Title <br> <input class="form-control mt-1" id="head_office_email"
                                name="other_account[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Account Number <br> <input class="form-control mt-1" id="head_office_email"
                                name="other_acc_no[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Any Agreed Financials <br> <input class="form-control mt-1"
                                id="head_office_email" name="other_fin[]" type="file" placeholder="..."
                                style="width: 100%;">
                        </div>

                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Notes <br> <textarea class="form-control mt-1" id="" name="other_notes[]"
                                type="text" placeholder="..." style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Attachment <br> <input class="form-control mt-1" id="head_office_email"
                                name="other_attachments[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <h5>Consultant Address</h5>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right ">
                            Office No <br> <input class="form-control mt-1" id="head_office_cell_no"
                                name="other_office[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Building <br> <input class="form-control mt-1" id="head_office_cell_no"
                                name="other_build[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            Block <br> <input class="form-control mt-1" id="head_office_cell_no"
                                name="other_block[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Area <br> <input class="form-control mt-1" id="head_office_cell_no"
                                name="other_area[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            City <br> <input class="form-control mt-1" id="head_office_cell_no"
                                name="other_city[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Photograph of Building <br> <input class="form-control mt-1" id=""
                                name="other_photo[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 spacing-right mt-2">
                            Email <br> <input class="form-control mt-1" id="" name="other_a_email[]" type="email"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Website <br> <input class="form-control mt-1" id="" name="other_web[]" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            Pin location <br> <input class="form-control mt-1" id="" name="other_pin[]"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            GPS <br> <input class="form-control mt-1" id="" name="other_gps[]" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            Notes <br> <textarea class="form-control mt-1" id="" name="other_ex_notes[]"
                                type="text" placeholder="..." style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Attachments <br> <input class="form-control mt-1" id="" name="other_ex_attach[]"
                                type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <button type="button" style="width:20%; margin-left:13px;" onclick="consultant_remove_fields(${lisence_consultant_room3})">Remove</button>
                </div>`;

    objTo.appendChild(divtest);
}

function consultant_remove_fields(rid) {
    $('.removeclass' + rid).remove();
}
</script>

<script>
var lisence_authority_Room = 1;

function lisence_authority_add_fields() {
    lisence_authority_Room++;
    var objTo = document.getElementById('lisence_authority_add_fields');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "third-col removeclass" + lisence_authority_Room);

    divtest.innerHTML = `
            <h5>Issuing Authority :</h5>
            <div class="row mb-2">
                <div class="col-lg-4 spacing-right">
                    <input type="hidden" name="i_id[]" value="${lisence_authority_Room}">
                </div>
                <div class="col-lg-3 spacing-right">
                    Concerned Officer Name <br> <input class="form-control mt-1"
                        id="other_cn_officer" name="other_iss_co_name[]" type="text" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-left spacing-right">
                    Designation <br> <input class="form-control mt-1" id="oper_desig"
                        name="other_iss_co_desig[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Department <br> <input class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_dept[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Section <br> <input class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_section[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    PTCL Number <br> <input class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_ptcl[]" type="text" placeholder="..." style="width: 100%;">
                </div>

                <div class="col-lg-3 spacing-left mt-3">
                    Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_cell[]" type="text" placeholder="..." style="width: 105%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Email <br> <input class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_email[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Website <br> <input class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_web[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Visiting Card Front <br> <input class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_front[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right spacing-left mt-3">
                    Visiting Card Back <br> <input class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_back[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="row mb-2 mt-2">
                    <div class="col-lg-5 spacing-right mt-3">
                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                            name="other_iss_co_notes[]" type="text" placeholder="..."
                            style="width: 100%;"></textarea>
                    </div>
                    <div class="col-lg-5 spacing-left mt-3">
                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                            name="other_iss_co_attach[]" type="file" placeholder="..."
                            style="width: 100%;">
                    </div>
                </div>
            </div>
            </div>
                <button type="button" onclick="authority_remove_fields(${lisence_authority_Room})">Remove</button>
            `;

    objTo.appendChild(divtest);
}

function authority_remove_fields(rid) {
    $('.removeclass' + rid).remove();
}
</script>

<script>
var operating_finance_Room = 1;

function operating_finance_add_fields() {
    operating_finance_Room++;
    var objTo = document.getElementById('operating_finance_add_fields');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "third-col removeclass" + operating_finance_Room);

    divtest.innerHTML = `
                <div class="row add-more">
                    <div class="col-lg-4 spacing-right">
                        <input type="hidden" name="r_id[]" value="${operating_finance_Room}">
                    </div>
                    <h3 style="border: 2px solid black; width: 99%; padding: 10px;"><b>Finances :</b></h3>
                    <div class="col-lg-6 spacing-right mb-3">
                        Category <br>
                        <select class="form-control" name="oper_fee_category[]" style="width: 100%;">
                            <option value=""> </option>
                            <option value="Legal Fee">Legal Fee</option>
                            <option value="Speed Money">Speed Money</option>
                            <option value="Consultancy Fee">Consultancy Fee</option>
                        </select>
                    </div>

                    <h5 style="margin-left:10px;">Withdrawal From:</h5>
                    <div class="col-lg-12">
                        <div class="row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Bank Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_bank[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Cheque/Instrument No. <br> <input class="form-control mt-1"
                                    id="head_office_email" name="oper_finance_cheque[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Scanned copy of Cheque/Instrument<br> <input class="form-control mt-1"
                                    id="head_office_name" name="oper_finance_copy[]" type="file"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Amount in figures <br> <input class="form-control mt-1"
                                    id="head_office_name" name="oper_finance_amount[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-rightmt-3">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="oper_finance_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5>Withdrawal By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_wb_name[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input class="form-control mt-1" id="head_office_email"
                                    name="oper_finance_wb_id[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_wb_desig[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_wb_cell[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_wb_email[]" type="text" placeholder="..."
                                    style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_wb_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="oper_finance_wb_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Fees :</h5>
                            <div class="col-lg-4 spacing-right">
                                Fees <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_fee[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right lh-lg">
                                Date of Fees Deposit <br> <input class="form-control mt-1"
                                    id="head_office_email" name="oper_finance_fee_date[]" type="date"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right lh-lg">
                                Name of bank<br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_fee_bank[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Instrument Number <br> <input class="form-control mt-1"
                                    id="head_office_name" name="oper_finance_fee_ins[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Deposit Slip Attachment <br> <input class="form-control mt-1"
                                    id="head_office_email" name="oper_finance_slip_attach[]" type="file"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_fee_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="oper_finance_fee_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Deposited By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_db_name[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input class="form-control mt-1" id="head_office_email"
                                    name="oper_finance_db_id[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_db_desig[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_db_cell[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_db_email[]" type="text" placeholder="..."
                                    style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_db_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="oper_finance_db_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Include other "Finances" input fields here -->
                <button type="button" onclick="finance_remove_fields(${operating_finance_Room})">Remove Finance</button>
            `;

    objTo.appendChild(divtest);
}

function finance_remove_fields(rid) {
    $('.removeclass' + rid).remove();
}
</script>


<script>
var weapon_finance_Room = 1;

function weapon_finance_add_fields() {
    operating_finance_Room++;
    var objTo = document.getElementById('weapon_finance_add_fields');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "third-col removeclass" + weapon_finance_Room);

    divtest.innerHTML = `
                <div class="row add-more">
                    <div class="col-lg-4 spacing-right">
                        <input type="hidden" name="r_id[]" value="${weapon_finance_Room}">
                    </div>
                    <h3 style="border: 2px solid black; width: 99%; padding: 10px;"><b>Finances :</b></h3>
                    <div class="col-lg-6 spacing-right mb-3">
                        Category <br>
                        <select class="form-control" name="wep_fee_category[]" style="width: 100%;">
                            <option value=""> </option>
                            <option value="Speed Money">Speed Money</option>
                            <option value="Consultancy Fee">Consultancy Fee</option>
                        </select>
                    </div>

                    <h5 style="margin-left:10px;">Withdrawal From:</h5>
                    <div class="col-lg-12">
                        <div class="row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Bank Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_bank[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Cheque/Instrument No. <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_finance_cheque[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Scanned copy of Cheque/Instrument<br> <input class="form-control mt-1"
                                    id="head_office_name" name="wep_finance_copy[]" type="file"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Amount in figures <br> <input class="form-control mt-1"
                                    id="head_office_name" name="wep_finance_amount[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-rightmt-3">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_finance_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5>Withdrawal By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_wb_name[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_finance_wb_id[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_wb_desig[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_wb_cell[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_wb_email[]" type="text" placeholder="..."
                                    style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_wb_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_finance_wb_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Fees :</h5>
                            <div class="col-lg-4 spacing-right">
                                Fees <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_fee[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right lh-lg">
                                Date of Fees Deposit <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_finance_fee_date[]" type="date"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right lh-lg">
                                Name of bank<br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_fee_bank[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Instrument Number <br> <input class="form-control mt-1"
                                    id="head_office_name" name="wep_finance_fee_ins[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Deposit Slip Attachment <br> <input class="form-control mt-1"
                                    id="head_office_email" name="wep_finance_slip_attach[]" type="file"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_fee_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_finance_fee_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Deposited By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_db_name[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_finance_db_id[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_db_desig[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_db_cell[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_db_email[]" type="text" placeholder="..."
                                    style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_db_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input class="form-control mt-1" id="head_office_email"
                                    name="wep_finance_db_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Include other "Finances" input fields here -->
                <button type="button" onclick="weapon_finance_remove_fields(${weapon_finance_Room})">Remove Finance</button>
            `;

    objTo.appendChild(divtest);
}

function weapon_finance_remove_fields(rid) {
    $('.removeclass' + rid).remove();
}
</script>


<script>
var divisionRoom = 1;

function addDivisionDetails() {
    divisionRoom++;
    var objTo = document.getElementById('divisionDetailsContainer'); // Adjust the ID to match your structure
    var divTest = document.createElement("div");
    divTest.setAttribute("class", "removeclass" + divisionRoom);

    divTest.innerHTML = `
            <!-- Your HTML code here -->
            <div>
                <h3 style="border: 2px solid black; width: 99%; padding: 10px; margin-top:12px;">
                    <b>Division :</b>
                </h3>
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Category <br> <input class="form-control mt-1" id="head_office_name"
                                name="division_category[]" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Quantity <br> <input class="form-control mt-1" id="head_office_name"
                                name="division_quantity[]" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-4 mt-4">
                            <div class=" mb-2 d-flex align-items-center ">
                                <div class="form-check form-check-inline spacing-left ">
                                    <input class="form-check-input" name="division_book[]"
                                        type="checkbox" id="inlineCheckbox1" value="">
                                    <label class="form-check-label"
                                        for="inlineCheckbox1">Book</label>
                                </div>
                                <div class="form-check form-check-inline spacing-left">
                                    <input class="form-check-input" name="division_card[]"
                                        type="checkbox" id="inlineCheckbox2" value="">
                                    <label class="form-check-label"
                                        for="inlineCheckbox2">Card</label>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 spacing-right">
                            Caliber <br> <input class="form-control mt-1" id="head_office_name"
                                name="division_caliber[]" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                        <div class="col-lg-4 spacing-right">
                            Jurisdiction: <br> <input class="form-control mt-1"
                                id="head_office_name" name="division_juris[]" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>

                        <div class="col-lg-4 spacing-right ">
                            Sanction Letter Number <br> <input class="form-control mt-1"
                                id="head_office_name" name="division_sanc[]" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Scanned copy of Sanction Letter: (Attachment)
                            <br> <input class="form-control mt-1" id="head_office_name"
                                name="division_sanc_copy[]" type="file" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class=" mb-2 d-flex align-items-center m-5">
                                <div class="form-check form-check-inline spacing-left mt-2">
                                    <input class="form-check-input" name="division_nbp[]"
                                        type="checkbox" id="inlineCheckbox1" value="">
                                    <label class="form-check-label"
                                        for="inlineCheckbox1">NBP</label>
                                </div>
                                <div class="form-check form-check-inline spacing-left mt-2">
                                    <input class="form-check-input" name="division_pb[]"
                                        type="checkbox" id="inlineCheckbox2" value="">
                                    <label class="form-check-label" for="inlineCheckbox2">PB</label>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6 spacing-right">
                        Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                            name="division_notes[]" type="text" placeholder="..."
                            style="width: 100%;"></textarea>
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Attachments <br> <input class="form-control mt-1" id="head_office_email"
                            name="division_attach[]" type="file" placeholder="..."
                            style="width: 100%;">
                    </div>
                </div>
                <div class="new_branch mt-2">
                    <button type="button" onclick="removeDivisionDetails(${divisionRoom})">
                        Remove
                    </button>
                </div>
                <hr>
            </div>
        `;

    objTo.appendChild(divTest);
}

function removeDivisionDetails(rid) {
    var element = document.querySelector('.removeclass' + rid);
    element.parentNode.removeChild(element);
}
</script>
<!--  -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('form').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
        }
    });
});
</script>
</body>

</html>
