    @include('layouts.header')

    @yield('main')

    <!--End of the Navbar-->

    <!--Customer Form-->
    <link rel="stylesheet" href="css/mBox.css">
    <div class="customer_form">

        <div id="main" style="margin-left: 92%;">
        <button class="openbtn" onclick="openNav()">☰</button>
        </div>

        <div id="mySidebar" class="sidebar admin-setting">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
            <a href="#" style="color: gold;"> <i class="bi bi-gear mr-2"></i> PIFFERS Administration Setting</a>
            <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
            <hr>
            <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
        </div>
 
      




        <section style="margin-bottom:60px;">
            <!--<h4 style="margin-left:-12px;"><strong>Rental Property Details :</strong></h4>-->
             <div class="modal-header border-0">
            <div style="display:flex; column-gap:10px; align-items:center">
                <button type="button" class="btn btn-link" onclick="history.back()">
                 <i class="bi bi-arrow-left"></i>
                </button>
                <h5 class="mt-3" style="font-weight: 700;"> Rental Property Details: </h5>
            </div>
          </div>
            <form action="{{ route('store_rental')}}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class=" row main-content div mt-4" >
                <div class="col-lg-6">

                    <div class="row mb-2">
                       <div class="col-lg-6 spacing-left">
                            <label for="office_name">Office Name</label>
                            <select class="form-control" name="office_name">
                                @foreach ($offices as $office)
                                    <option value="{{ $office->id }}">>{{ $office->branch_office_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 spacing-left mt-1">
                            RP Number <br> <input class="form-control mt-1" id="rp_no" name="rp_no" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left">
                            Type of Property <br> <select id="" class="form-control mt-1" name="type" style="width: 100%;">
                                <option value="RHQ">RHQ</option>
                                <option value="Guards Accommodation">Guards Accommodation</option>
                                <option value="Head Office">Head Office</option>
                                <option value="Branch">Branch</option>
                                </select>
                        </div>
                        <div class="col-lg-6 spacing-left">
                            Description of Property <br> <input class="form-control mt-1" id="desc" name="desc" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    <!--    <div class="col-lg-6 spacing-left spacing-right mt-2">-->
                    <!--        Picture of Property <br> <input class="form-control mt-1" id="" name="pic" type="file" placeholder="..." style="width: 100%;"><div class="col-lg-4 spacing-right">-->
                        <!--Image Preview Biometric-->
                    <!--    <div class="image-preview4" id="imagePreview4">-->
                    <!--        <img src="" alt="Image Preview4" class="image-preview__image4" style="height: 30%; width:30%;">-->
                    <!--        <span class="image-preview__default-text4"> Image Preview </span>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <!--</div>-->
                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                        Picture of Property <br>
                        <input class="form-control mt-1" id="propertyImageInput" name="pic" type="file" placeholder="..." style="width: 100%;">
                        <div class="col-lg-4 spacing-right mt-3">
                            <!-- Image Preview Biometric -->
                            <div class="image-preview4" id="imagePreview4">
                                <img src="" alt="Image Preview4" class="image-preview__image4" style="height: 100%; width: 100%; display: none;">
                                <span class="image-preview__default-text4">Image Preview</span>
                            </div>
                            <button id="cancelPreview" class="btn btn-danger mt-2" style="display: none;">Cancel</button>
                        </div>
                    </div>


                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                        Branch ID <br> <input class="form-control mt-1" id="" name="branch" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right mt-2">
                        Reporting to <br> <input class="form-control mt-1" id="" name="report_to" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="form-check form-check-inline spacing-left mt-2">
                        <input class="form-check-input" type="checkbox" id="prop_care" value="negative">
                        <h5 class="form-check-label" for="inlineCheckbox1">Property Caretaker Details :</h5>
                    </div>
                    <div class="col-lg-12 spacing-right mb-4" id="prop-field" style="display:none;">
                        <div class="col-lg-6 spacing-left spacing-right">
                            Name <br> <input class="form-control mt-1" id="" name="care_name" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right mt-1">
                            Cell <br> <input class="form-control mt-1" id="" name="care_cell" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right mt-1">
                            CNIC Front<br> <input class="form-control mt-1" id="" name="care_cnic" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right mt-1">
                            CNIC Back<br> <input class="form-control mt-1" id="" name="care_back" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right mt-1">
                            Attachments <br> <input class="form-control mt-1" id="" name="care_attach" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-check form-check-inline spacing-left mt-2">
                        <input class="form-check-input" type="checkbox" id="plaza_m" value="negative">
                        <h5 class="form-check-label" for="inlineCheckbox1">Plaza Management Details :</h5>
                    </div>
                    <div class="col-lg-12 spacing-right mb-4" id="plaza-field" style="display:none;">
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Name <br> <input class="form-control mt-1" id="" name="plaza_name" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Cell <br> <input class="form-control mt-1" id="" name="plaza_cell" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Bank Name <br> <input class="form-control mt-1" id="" name="plaza_bank" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Account Number <br> <input class="form-control mt-1" id="" name="plaza_account" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            CNIC <br> <input class="form-control mt-1" id="" name="plaza_cnic" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            CNIC <br> <input class="form-control mt-1" id="" name="plaza_back" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Attachments <br> <input class="form-control mt-1" id="" name="plaza_attach" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                    </div>
                    <div class="form-check form-check-inline spacing-left mt-2">
                        <input class="form-check-input" type="checkbox" id="incharge_m" value="negative">
                        <h5 class="form-check-label" for="inlineCheckbox1">Incharge of the Property :</h5>
                    </div>
                    <div class="col-lg-12 spacing-right mb-4" id="incharge-field" style="display:none;">
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Name <br> <input class="form-control mt-1 " id="" name="inc_name" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Employeee ID <br> <input class="form-control mt-1" id="" name="inc_id" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Designation <br> <input class="form-control mt-1" id="" name="inc_desig" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Cell Number <br> <input class="form-control mt-1" id="" name="inc_cell" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Email <br> <input class="form-control mt-1" id="" name="inc_email" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Attachments <br> <input class="form-control mt-1" id="" name="inc_atatch" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                    </div>


                    <!-- <div class="col-lg-6 mt-4" style="margin-bottom: 40px; width: 50%;">
                        <button type="button" id="add-more-btn" class="add-more-btn" onclick="toggleHiddenDiv()">KITCHEN</button>
                    </div>

                    <div id="hidden-div" style="display: none;">
                        <h5>Inventory Details:</h5>
                        <div id="inventory-container">
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Item Code <br>
                                    <input class="form-control mt-1" name="inventory_items[][item_code]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Attachments <br>
                                    <input class="form-control mt-1" name="inventory_items[][attachment]" type="file" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Notes <br>
                                    <textarea class="form-control mt-1" name="inventory_items[][notes]" type="file" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-5 mt-4" style="width: 50%;">
                                    <button type="button" style="margin-top: 16px; margin-left: -9px;" onclick="addMoreFields()">Add More</button>
                                </div>
                            </div>
                        </div>
                        <h5>Hygiene Policy:</h5>
                        <div id="hygiene-container">
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Attachments <br>
                                    <input class="form-control mt-1" name="hygiene_items[][hyg_attachments]" type="file" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Notes <br>
                                    <textarea class="form-control mt-1" name="hygiene_items[][hyg_notes]" type="file" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-5" style="width: 50%;">
                                    <button type="button" onclick="addMoreHygieneFields()">Add More</button>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    </div>

                </div>

                <div class="col-lg-6 spacing-left">

                    <h5>Address</h5>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Office No <br> <input class="form-control mt-1" id="head_office_cell_no" name="office_no" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Building <br> <input class="form-control mt-1" id="head_office_cell_no" name="building" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right mt-2">
                            Block <br> <input class="form-control mt-1" id="head_office_cell_no" name="block" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Area <br> <input class="form-control mt-1" id="head_office_cell_no" name="area" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right mt-2">
                            City <br> <input class="form-control mt-1" id="head_office_cell_no" name="city" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Location <br> <input class="form-control mt-1" id="head_office_cell_no" name="location" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right mt-2">
                            PhotoGraph of Building <br> <input class="form-control mt-1" id="photo_b" name="photo_b" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            GPS <br> <input class="form-control mt-1" id="head_office_cell_no" name="gps" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-check form-check-inline spacing-left mt-2">
                        <input class="form-check-input" type="checkbox" id="prop_owner" value="negative">
                        <h5 class="form-check-label" for="inlineCheckbox1">Property owner Details :</h5>
                    </div>
                        <div class="col-lg-12 spacing-right mb-4" id="owner-fields" style="display:none;">
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right">
                            Owner Name : <br> <input class="form-control mt-1" id="" name="owner_name" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right">
                            Owner CNIC NO : <br> <input class="form-control mt-1" id="" name="owner_cnic" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Owner Cell NO : <br> <input class="form-control mt-1" id="" name="owner_cell" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Owner CNIC (Front) :  <br> <input class="form-control mt-1" id="" name="owner_front" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Owner CNIC (Back) : <br> <input class="form-control mt-1" id="" name="owner_back" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Owner Bank Name :  <br> <input class="form-control mt-1" id="" name="owner_bank" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Owner Account Title :  <br> <input class="form-control mt-1" id="" name="owner_acc" type="text" placeholder="..." style="width: 108%;">
                        </div>
                        <div class="col-lg-5  mt-2" style="margin-left: 3px">
                            Owner Account No:  <br> <input class="form-control mt-1" id="" name="owner_acc_no" type="text" placeholder="..." style="width: 122%;">
                        </div>
                        </div>
                        </div>
                    </div>

                    <div class="form-check form-check-inline spacing-left mt-2">
                        <input class="form-check-input" type="checkbox" id="prop_ntn" value="negative">
                        <h5 class="form-check-label" for="inlineCheckbox1">Utility Bills :</h5>
                    </div>

                    <div class="col-lg-12 spacing-right mb-4" id="ntn-fields" style="display:none;">
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right">
                            Electric Meter Reading <br> <input class="form-control mt-1" id="" name="electric" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right">
                            Attachments <br> <input class="form-control mt-1" id="" name="elec_attach" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Gas Meter Reading <br> <input class="form-control mt-1" id="" name="gas" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Attachments <br> <input class="form-control mt-1" id="" name="gas_attach" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Date of moving in <br> <input class="form-control mt-1" id="" name="mov_in" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Date of Moving Out <br> <input class="form-control mt-1" id="" name="mov_out" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-md-4">
                            <div class="form-check form-check-inline spacing-left mt-2">
                                <input class="form-check-input" type="checkbox" id="last_copy_checkbox" value="">
                                <label class="form-check-label" for="last_copy_checkbox">Last Copy of paid Bill</label>
                            </div>
                        </div>
                        <div class="col-md-8" id="attachments_div" style="display:none;">
                            <div>
                                Attachments <br>
                                <input class="form-control" id="" name="last_bill" type="file" placeholder="..." style="width: 77%;">
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>


            
            <h4 style="margin-left:-12px;"><strong>Rental Payment Details :</strong></h4>
             <div class="row">

                <div class="col-lg-12 spacing-right mb-4">
                        <!-- <div class="col-lg-3" style="
                            margin-bottom: 40px;
                            width: 25%;">
                                <button type="button" class="add-more-btn" onclick=""> + new Rental Payment Details</button>
                        </div> -->
                        <div class="row mb-2">
                            <div class="col-lg-4 spacing-right">
                                RP No.  <br>  <input class="form-control" type="text" name="rental_number" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3">
                                Amount of Advance. <br>  <input class="form-control" type="text" name="amount_advance" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3">
                                Instrument No. <br>  <input class="form-control" type="text" name="instrument_no" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-4">
                            Voucher No. <br>  <input class="form-control basic-info-attachements" id="" type="text" name="voucher_no" placeholder="..." style="width: 100%;" multiple>
                            </div>
                            <div class="col-lg-3 spacing-left">
                                Name of Bank <br>  <input class="form-control basic-info-attachements" id="inpFile2" type="text" name="name_bank" placeholder="..." style="width: 100%;" multiple>
                            </div>
                            <div class="col-lg-4">
                                Attachments. <br>  <input class="form-control basic-info-attachements" id="" type="file" name="rental_pic" placeholder="..." style="width: 100%;" multiple>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-4">
                                Notes <br>  <textarea class="form-control basic-info-attachements" id="" type="text" name="rental_notes" placeholder="..." style="width: 100%;" multiple></textarea>
                            </div>


                        </div>
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
                                                <div id="rental-container">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-4 spacing-right">
                                                            Rental Amount. <br>
                                                            <input class="form-control" type="text" name="rental_amount[]" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-4 spacing-left spacing-right">
                                                            Agreement Execution Date: <br>
                                                            <input class="form-control" type="date" name="agreement_execution_date[]" placeholder="" style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-left">
                                                            Agreement End date: <br>
                                                            <input class="form-control" type="date" name="agreement_end_date[]" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-3 spacing-right">
                                                            Agreement Attachment: <br>
                                                            <input class="form-control" type="file" name="agreement_attachment[]" placeholder="..." style="width: 100%;">
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
                                    <th>Rental Amount</th>
                                    <th>Agreement Execution Date</th>
                                    <th>Agreement End date</th>
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
            {{-- <div class="footer" style="position: fixed; bottom: 0; width: 100%; background-color: #320056; padding: 10px; display: flex; justify-content: space-between; align-items: center; margin-left:-21%;">
                <button type="button" name="cancel" class="btn btn-secondary" style="color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 80px;"><i>Cancel</i></button>
                <div style="display: flex; align-items: center;">
                    <img src="logo.png" alt="Logo" style="height: 30px; margin-right: 10px;">
                    <h4 style="color: #fff; margin: 0; font-size: 14px;"><i>PIFFERS SECURITY SERVICES</i></h4>
                </div>
                <div class="dropdown" style="position: relative; display: inline-block;">
                    <button type="button" class="btn btn-primary" style="background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 150px;"><i style="margin-right:30px;">Submission  &#8594;</i></button>
                    <div class="dropdown-content" style="display: none; position: absolute; background-color: #f9f9f9; min-width: 130px; box-shadow: 0px -8px 16px 0px rgba(0,0,0,0.2); z-index: 1; bottom: 100%;">
                        <button type="button" name="save_and_email" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & Email/Whatsapp</i></button>
                        <button type="button" name="save_and_share" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & share link</i></button>
                        <button type="submit" name="save_and_new" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & New</i></button>
                        <button type="submit" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & Close</i></button>
                    </div>
                </div>
            </div> --}}
            <button type="submit" class="btn btn-secondary" style="margin-left: 5px; float:right;">Submit</button>
            </form>
        </section>

    </div>
<script>
    const imageInput = document.getElementById('propertyImageInput');
    const imagePreviewContainer = document.getElementById('imagePreview4');
    const imagePreviewImage = imagePreviewContainer.querySelector('.image-preview__image4');
    const imagePreviewDefaultText = imagePreviewContainer.querySelector('.image-preview__default-text4');
    const cancelButton = document.getElementById('cancelPreview');

    imageInput.addEventListener('change', function () {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            imagePreviewDefaultText.style.display = "none"; // Hide default text
            imagePreviewImage.style.display = "block";     // Show image
            cancelButton.style.display = "block";          // Show cancel button

            reader.addEventListener('load', function () {
                imagePreviewImage.setAttribute('src', this.result); // Set image source
            });

            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            resetPreview(); // Reset preview if no file is selected
        }
    });

    // Cancel button functionality
    cancelButton.addEventListener('click', function () {
        resetPreview();
        imageInput.value = ""; // Clear the file input
    });

    // Function to reset the preview
    function resetPreview() {
        imagePreviewDefaultText.style.display = "block"; // Show default text
        imagePreviewImage.style.display = "none";        // Hide image
        imagePreviewImage.setAttribute('src', '');       // Reset image source
        cancelButton.style.display = "none";             // Hide cancel button
    }
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
                        <div id="rental-container">
                            <div class="row mb-2">
                                <div class="col-lg-4 spacing-right">
                                    Rental Amount. <br>
                                    <input class="form-control" type="text" name="rental_amount[]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right">
                                    Agreement Execution Date: <br>
                                    <input class="form-control" type="date" name="agreement_execution_date[]" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-left">
                                    Agreement End date: <br>
                                    <input class="form-control" type="date" name="agreement_end_date[]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Agreement Attachment: <br>
                                    <input class="form-control" type="file" name="agreement_attachment[]" placeholder="..." style="width: 100%;">
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
                    var rental_amount = $(this).find('[name="rental_amount[]"]').val();
                    var agreement_execution_date = $(this).find('[name="agreement_execution_date[]"]').val();
                    var agreement_end_date = $(this).find('[name="agreement_end_date[]"]').val();
                    var agreement_attachment = $(this).find('[name="agreement_attachment[]"]').val();
                    // Check if any relevant data is entered
                    if (rental_amount || agreement_execution_date || agreement_end_date || agreement_attachment) {
                        // Add a new row to the summary table
                        $('#signatorySummaryTable17 tbody').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${rental_amount}</td>
                                <td>${agreement_execution_date}</td>
                                <td>${agreement_end_date}</td>
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
        const checkbox4 = document.getElementById('prop_care');
        const propField = document.getElementById('prop-field');

        checkbox4.addEventListener('change', (event) => {
            if (event.target.checked) {
            propField.style.display = 'block';
            } else {
            propField.style.display = 'none';
            }
        });
    </script>

    <script>
        const checkbox5 = document.getElementById('plaza_m');
        const plazaField = document.getElementById('plaza-field');

        checkbox5.addEventListener('change', (event) => {
            if (event.target.checked) {
            plazaField.style.display = 'block';
            } else {
            plazaField.style.display = 'none';
            }
        });
    </script>

    <script>
        const checkbox6 = document.getElementById('incharge_m');
        const inchargeField = document.getElementById('incharge-field');

        checkbox6.addEventListener('change', (event) => {
            if (event.target.checked) {
            inchargeField.style.display = 'block';
            } else {
            inchargeField.style.display = 'none';
            }
        });
    </script>

    <script>
        const checkbox10 = document.getElementById('prop_owner');
        const ownerField = document.getElementById('owner-fields');

        checkbox10.addEventListener('change', (event) => {
            if (event.target.checked) {
            ownerField.style.display = 'block';
            } else {
            ownerField.style.display = 'none';
            }
        });
    </script>

    <script>
        const checkbox7 = document.getElementById('prop_ntn');
        const ntnField = document.getElementById('ntn-fields');

        checkbox7.addEventListener('change', (event) => {
            if (event.target.checked) {
            ntnField.style.display = 'block';
            } else {
            ntnField.style.display = 'none';
            }
        });
    </script>

    <script>
        const checkbox8 = document.getElementById('kote_incharge');
        const koteField = document.getElementById('kote-field');

        checkbox8.addEventListener('change', (event) => {
            if (event.target.checked) {
            koteField.style.display = 'block';
            } else {
            koteField.style.display = 'none';
            }
        });
    </script>

    <script>
        const checkbox9 = document.getElementById('armorer');
        const armField = document.getElementById('armorer-field');

        checkbox9.addEventListener('change', (event) => {
            if (event.target.checked) {
            armField.style.display = 'block';
            } else {
            armField.style.display = 'none';
            }
        });
    </script>

    <script>
        const lastCopyCheckbox = document.getElementById('last_copy_checkbox');
        const attachmentsDiv = document.getElementById('attachments_div');

        lastCopyCheckbox.addEventListener('change', (event) => {
            if (event.target.checked) {
                attachmentsDiv.style.display = 'block';
            } else {
                attachmentsDiv.style.display = 'none';
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleHiddenDiv() {
            var hiddenDiv = document.getElementById('hidden-div');
            if (hiddenDiv.style.display === 'none') {
                hiddenDiv.style.display = 'block';
            } else {
                hiddenDiv.style.display = 'none';
            }
        }
    </script>

    <script>
        function addMoreFields() {
        var container = document.getElementById('inventory-container');

        // Create a new div to hold the fields
        var newDiv = document.createElement('div');
        newDiv.className = 'row mb-2';

        // Create the item code field
        var itemCodeField = document.createElement('div');
        itemCodeField.className = 'col-lg-5 spacing-left spacing-right';
        itemCodeField.innerHTML = 'Item Code <br> <input class="form-control mt-1" name="item_code[]" type="text" placeholder="..." style="width: 100%;">';

        // Create the attachments field
        var attachmentsField = document.createElement('div');
        attachmentsField.className = 'col-lg-5 spacing-left spacing-right';
        attachmentsField.innerHTML = 'Attachments <br> <input class="form-control mt-1" name="attachments[]" type="file" placeholder="..." style="width: 100%;">';

        // Create the notes field
        var notesField = document.createElement('div');
        notesField.className = 'col-lg-5 spacing-left spacing-right';
        notesField.innerHTML = 'Notes <br> <textarea class="form-control mt-1" name="notes[]" type="file" placeholder="..." style="width: 100%;"></textarea>';

        // Create the remove button
        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.innerText = 'Remove';
        removeButton.style.width = '80px';
        removeButton.style.height = '30px';
        removeButton.style.marginTop = '36px';
        removeButton.style.marginLeft = '7px'
        removeButton.addEventListener('click', function() {
            container.removeChild(newDiv);
        });

        // Append the fields and remove button to the new div
        newDiv.appendChild(itemCodeField);
        newDiv.appendChild(attachmentsField);
        newDiv.appendChild(notesField);
        newDiv.appendChild(removeButton);


        // Append the new div to the container
        container.appendChild(newDiv);
        }
    </script>

    <script>
        function addMoreHygieneFields() {
        var container = document.getElementById('hygiene-container');

        // Create a new div to hold the fields
        var newDiv = document.createElement('div');
        newDiv.className = 'row mb-2';

        // Create the attachments field
        var attachmentsField = document.createElement('div');
        attachmentsField.className = 'col-lg-5 spacing-left spacing-right';
        attachmentsField.innerHTML = 'Attachments <br> <input class="form-control" name="hyg_attachments[]" type="file" placeholder="..." style="width: 100%;">';

        // Create the notes field
        var notesField = document.createElement('div');
        notesField.className = 'col-lg-5 spacing-left spacing-right';
        notesField.innerHTML = 'Notes <br> <textarea class="form-control" name="hyg_notes[]" type="file" placeholder="..." style="width: 100%;"></textarea>';

        // Create the remove button
        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.innerText = 'Remove';
        removeButton.style.width = '80px';
        removeButton.style.height = '30px';
        removeButton.style.marginTop = '36px';
        removeButton.style.marginLeft = '7px'
        removeButton.className = 'remove-button';

        removeButton.addEventListener('click', function() {
            container.removeChild(newDiv);
        });

        // Append the fields and remove button to the new div
        newDiv.appendChild(attachmentsField);
        newDiv.appendChild(notesField);
        newDiv.appendChild(removeButton);

        // Append the new div to the container
        container.appendChild(newDiv);
        }
    </script>

    
    <script>
    function addMoreRentalFields() {
        var container = document.getElementById('rental-container');

        // Create a new div to hold the fields
        var newDiv = document.createElement('div');
        newDiv.className = 'row mb-2';

        // Create the rental amount field
        var rentalAmountField = document.createElement('div');
        rentalAmountField.className = 'col-lg-6 ';
        rentalAmountField.innerHTML = 'Rental Amount. <br> <input class="form-control" type="text" name="rental_amount[]" placeholder="..." style="width: 100%;">';

        // Create the agreement execution date field
        var agreementExecutionDateField = document.createElement('div');
        agreementExecutionDateField.className = 'col-lg-6';
        agreementExecutionDateField.innerHTML = 'Agreement Execution Date: <br> <input class="form-control" type="date" name="agreement_execution_date[]" placeholder="" style="width: 100%;">';

        // Create a new div to hold the fields
        var newDiv = document.createElement('div');
        newDiv.className = 'row mb-2';

        // Create the agreement end date field
        var agreementEndDateField = document.createElement('div');
        agreementEndDateField.className = 'col-lg-6 ';
        agreementEndDateField.innerHTML = 'Agreement End date: <br> <input class="form-control" type="date" name="agreement_end_date[]" placeholder="..." style="width: 100%;">';

        // Create the agreement attachment field
        var agreementAttachmentField = document.createElement('div');
        agreementAttachmentField.className = 'col-lg-6';
        agreementAttachmentField.innerHTML = 'Agreement Attachment: <br> <input class="form-control" type="file" name="agreement_attachment[]" placeholder="..." style="width: 100%;">';

        // Create the remove button
        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.innerText = 'Remove';
        removeButton.style.width = '80px';
        removeButton.style.height = '30px';
        removeButton.style.marginTop = '22px';
        removeButton.className = 'remove-button';

        removeButton.addEventListener('click', function() {
        container.removeChild(newDiv);
        });

        // Append the fields and remove button to the new div
        newDiv.appendChild(rentalAmountField);
        newDiv.appendChild(agreementExecutionDateField);
        newDiv.appendChild(agreementEndDateField);
        newDiv.appendChild(agreementAttachmentField);
        newDiv.appendChild(removeButton);

        // Append the new div to the container
        container.appendChild(newDiv);
    }
    </script>



    @include('layouts.footer')
