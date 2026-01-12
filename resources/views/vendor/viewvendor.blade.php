@include('layouts.header')

@yield('main')
<!--End of the Navbar-->

<!--Customer Form-->
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
            <!-- <div class="modal-content border-0"> -->
                 <div class="modal-header border-0">

                    <div class="modal-header border-0 d-flex align-items-center" style="margin-left:-37px;">
                        <button type="button" class="btn btn-link" onclick="history.back()">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-weight: bold;">Vendor</h4>
                    </div>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <!-- <div class="modal-body"> -->
                    <section>

                        <form action="{{ route('vendor.update' , $vendor->id) }}" method="POST" class="liscence_form  border-0" style="width: 90%;">
                            @method('PUT')
                            @csrf
                            <div class=" row main-content div">
                                <div class="col-lg-12">
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Vendor ID <br> <input class="form-control" readonly id="" name="vendor_id" value="{{ $vendor->vendor_id }}" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Vendor Name <br> <input class="form-control" readonly id="" name="vendor_name" value="{{ $vendor->vendor_name }}" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Description of Vendor <br> <textarea class="form-control" readonly id="" name="desc_vendor" type="text" placeholder="..." style="width: 100%;">{{ $vendor->desc_vendor }}</textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Vendor Profile Attachment <br> <input class="form-control" readonly id="" name="vendor_profile_attach" value="{{ $vendor->vendor_profile_attach }}" type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Email <br> <input class="form-control" readonly id="" name="vendor_email" value="{{ $vendor->vendor_email }}" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Website <br> <input class="form-control" readonly id="" name="vendor_website" value="{{ $vendor->vendor_website }}" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Notes <br> <textarea class="form-control" readonly id="" name="vendor_notes" type="text" placeholder="..." style="width: 100%;">{{ $vendor->vendor_notes }}</textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Attachments <br> <input class="form-control" readonly name="vendor_attach" value="{{ $vendor->vendor_attach }}" type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!--Tabs forDetails-->



                                <!--Address Details-->
                                <div class="tab-pane fade show active m-3" style="opacity: 90%;"
                                     id="address" role="tabpanel" aria-labelledby="nav-home-tab">
                                     <div class="col-lg-12 d-flex">
                                     <div class="col-lg-6 spacing-left">
                                        <h5>Office Address</h5>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Office No <br> <input class="form-control" readonly id="" name="office_no" value="{{ $vendor->office_no }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                Floor <br> <input class="form-control" readonly id="" name="o_floor" value="{{ $vendor->o_floor }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-left">
                                                Building <br> <input class="form-control" readonly id="" name="o_building" value="{{ $vendor->o_building }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                Block <br> <input class="form-control" readonly id="" name="o_block" value="{{ $vendor->o_block }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-left">
                                                Area <br> <input class="form-control" readonly id="" name="o_area" value="{{ $vendor->o_area }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                City <br> <input class="form-control" readonly id="" name="o_city" value="{{ $vendor->o_city }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-left">
                                                Photograph of Building <br> <input class="form-control" readonly id="" name="o_photo" value="{{ $vendor->o_photo }}" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                Pin location <br> <input class="form-control" readonly id="" name="o_pin" value="{{ $vendor->o_pin }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Email <br> <input class="form-control" readonly id="" name="o_email" value="{{ $vendor->o_email }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Website <br> <input class="form-control" readonly id="" name="o_website" value="{{ $vendor->o_website }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 spacing-left">
                                        <h5>Factory Address</h5>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Office No <br> <input class="form-control" readonly id="" name="f_office_no" value="{{ $vendor->f_office_no }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                Floor <br> <input class="form-control" readonly id="" name="f_floor" value="{{ $vendor->f_floor }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-left">
                                                Building <br> <input class="form-control" readonly id="" name="f_building" value="{{ $vendor->f_building }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                Block <br> <input class="form-control" readonly id="" name="f_block" value="{{ $vendor->f_block }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-left">
                                                Area <br> <input class="form-control" readonly id="" name="f_area" value="{{ $vendor->f_area }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                City <br> <input class="form-control" readonly id="" name="f_city" value="{{ $vendor->f_city }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-left">
                                                Photograph of Building <br> <input class="form-control" readonly id="" name="f_photo" value="{{ $vendor->f_photo }}" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                Pin location <br> <input class="form-control" readonly id="" name="f_pin" value="{{ $vendor->f_pin }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Email <br> <input class="form-control" readonly id="" name="f_email" value="{{ $vendor->f_email }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Website <br> <input class="form-control" readonly id="" name="f_website" value="{{ $vendor->f_website }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>

                                    </div>
                                     </div>
                                     <div class="col-lg-6 m-2 spacing-left">
                                        <h5>WareHouse Address</h5>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Office No <br> <input class="form-control" readonly id="" name="w_office_no" value="{{ $vendor->w_office_no }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                Floor <br> <input class="form-control" readonly id="" name="w_floor" value="{{ $vendor->w_floor }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right spacing-left">
                                                Building <br> <input class="form-control" readonly id="" name="w_building" value="{{ $vendor->w_building }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                Block <br> <input class="form-control" readonly id="" name="w_block" value="{{ $vendor->w_block }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-left">
                                                Area <br> <input class="form-control" readonly id="" name="w_area" value="{{ $vendor->w_area }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                City <br> <input class="form-control" readonly id="" name="w_city" value="{{ $vendor->w_city }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-left">
                                                Photograph of Building <br> <input class="form-control" readonly id="" name="w_photo" value="{{ $vendor->w_photo }}" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right">
                                                Pin location <br> <input class="form-control" readonly id="" name="w_pin" value="{{ $vendor->w_pin }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Email <br> <input class="form-control" readonly id="" name="w_email" value="{{ $vendor->w_email }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Website <br> <input class="form-control" readonly id="" name="w_website" value="{{ $vendor->w_website }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--Issuing Authority-->
                                <div class="tab-pane fade m-3" style="opacity: 90%;" id="corporate" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <div class="col-lg-3 spacing-right">
                                                Vendor CUIN <br> <input class="form-control" readonly id="" name="vendor_cuin" value="{{ $vendor->vendor_cuin }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Vendor NTN <br> <input class="form-control" readonly id="" name="vendor_ntn" value="{{ $vendor->vendor_ntn }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Vendor SIN <br> <input class="form-control" readonly id="" name="vendor_sin" value="{{ $vendor->vendor_sin }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                SECP attachment <br> <input class="form-control" readonly id="" name="vendor_secp_attach" type="file" style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Notes <br> <textarea class="form-control" readonly id="" name="cop_notes" placeholder="..." style="width: 100%;">{{ $vendor->cop_notes }}</textarea>
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Attachments <br> <input class="form-control" readonly id="" name="cop_attach" type="file" style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Type Of Entity <br> <input class="form-control" readonly id="" name="type_of_entity" value="{{ $vendor->type_of_entity }}" type="text" style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Certificate of Registration <br> <input class="form-control" readonly id="" name="certification_attach" type="file" style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Details of Board of Directors <br> <input class="form-control" readonly id="" name="directors_attach" type="file" style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- POC Details -->
                                <div class="tab-pane fade m-3" style="opacity: 90%;" id="poc" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="col-lg-12">
                                        <div class="container my-1">
                                            <div class="accordion" id="signatoryAccordion11">
                                                @foreach($vendor->vendorpocs as $index => $poc)
                                                    <div class="accordion-item signaccordion-item11" id="signatoryEntry11{{ $index + 1 }}">
                                                        <h2 class="accordion-header" id="signatoryHeading11{{ $index + 1 }}" style="color: white">
                                                            <button class="accordion-button" style="background-color: #34005A; color:white" type="button" aria-expanded="true" aria-controls="signatoryCollapse11{{ $index + 1 }}">
                                                                POC Entry {{ $index + 1 }}
                                                            </button>
                                                        </h2>
                                                        <div id="signatoryCollapse11{{ $index + 1 }}" class="accordion-body show" aria-labelledby="signatoryHeading11{{ $index + 1 }}">
                                                            <div class="col-lg-12" id="authority_add_fields">
                                                                <input type="hidden" name="vendorpocs[{{ $index }}][p_id]" value="{{ $poc->id }}">
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-3 spacing-right">
                                                                        POC name <br> <input class="form-control" readonly name="vendorpocs[{{ $index }}][v_poc_name]" type="text" value="{{ $poc->v_poc_name }}" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-3 spacing-left spacing-right">
                                                                        Cell number <br> <input class="form-control" readonly name="vendorpocs[{{ $index }}][v_poc_cell]" type="text" value="{{ $poc->v_poc_cell }}" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-3 spacing-right">
                                                                        Email <br> <input class="form-control" readonly name="vendorpocs[{{ $index }}][v_poc_email]" type="text" value="{{ $poc->v_poc_email }}" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-3 spacing-left spacing-right">
                                                                        CNIC number <br> <input class="form-control" readonly name="vendorpocs[{{ $index }}][v_poc_cnic]" type="text" value="{{ $poc->v_poc_cnic }}" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-3 spacing-right">
                                                                        CNIC Front Photograph <br> <input class="form-control" readonly name="vendorpocs[{{ $index }}][v_poc_front_attach]" type="file" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-3 spacing-right">
                                                                        CNIC Back Photograph <br> <input class="form-control" readonly name="vendorpocs[{{ $index }}][v_poc_back_attach]" type="file" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-3 spacing-right">
                                                                        Notes <br> <textarea class="form-control" readonly name="vendorpocs[{{ $index }}][v_poc_notes]" type="text" placeholder="..." style="width: 100%;">{{ $poc->v_poc_notes }}</textarea>
                                                                    </div>
                                                                    <div class="col-lg-3 spacing-right">
                                                                        Attachments <br> <input class="form-control" readonly name="vendorpocs[{{ $index }}][v_poc_attach]" type="file" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Account Details -->
                                <div class="tab-pane fade m-3" style="opacity: 90%;" id="account" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="container my-1">
                                        <div class="accordion" id="signatoryAccordion12">
                                            @foreach($vendor->vendoraccounts as $index => $account)
                                                <div class="accordion-item signaccordion-item12" id="signatoryEntry12{{ $index + 1 }}">
                                                    <h2 class="accordion-header" id="signatoryHeading12{{ $index + 1 }}" style="color: white">
                                                        <button class="accordion-button" style="background-color: #34005A; color:white" type="button" aria-expanded="true" aria-controls="signatoryCollapse12{{ $index + 1 }}">
                                                            Account Entry {{ $index + 1 }}
                                                        </button>
                                                    </h2>
                                                    <div id="signatoryCollapse12{{ $index + 1 }}" class="accordion-body show" aria-labelledby="signatoryHeading12{{ $index + 1 }}">
                                                        <div class="row mb-2" id="signatoryDetailsContainer12">
                                                            <input type="hidden" name="vendoraccounts[{{ $index }}][a_id]" value="{{ $account->id }}">
                                                            <div class="col-lg-12">
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-3 spacing-right">
                                                                        Bank Name <br> <input class="form-control" readonly name="vendoraccounts[{{ $index }}][v_bank_name]" type="text" value="{{ $account->v_bank_name }}" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-3 spacing-left spacing-right">
                                                                        Account Title <br> <input class="form-control" readonly name="vendoraccounts[{{ $index }}][v_bank_title]" type="text" value="{{ $account->v_bank_title }}" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-3 spacing-right">
                                                                        Account Number <br> <input class="form-control" readonly name="vendoraccounts[{{ $index }}][v_bank_number]" type="text" value="{{ $account->v_bank_number }}" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-3 spacing-right">
                                                                        IBAN No <br> <input class="form-control" readonly name="vendoraccounts[{{ $index }}][v_bank_iban]" type="text" value="{{ $account->v_bank_iban }}" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-3 spacing-right">
                                                                        Payment Terms <br> <input class="form-control" readonly name="vendoraccounts[{{ $index }}][v_bank_terms]" type="text" value="{{ $account->v_bank_terms }}" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-3 spacing-right">
                                                                        Notes <br> <textarea class="form-control" readonly name="vendoraccounts[{{ $index }}][v_bank_notes]" type="text" placeholder="..." style="width: 100%;">{{ $account->v_bank_notes }}</textarea>
                                                                    </div>
                                                                    <div class="col-lg-3 spacing-right">
                                                                        Attachments <br> <input class="form-control" readonly name="vendoraccounts[{{ $index }}][v_bank_attach]" type="file" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addSignatory11').on('click', function () {
            var SignatoryAccordionCount11 = $('#signatoryAccordion11 .signaccordion-item11').length + 1;

            var newSignAccordion11 = `
                <div class="accordion-item signaccordion-item11" id="signatoryEntry11${SignatoryAccordionCount11}">
                    <h2 class="accordion-header" id="signatoryHeading11${SignatoryAccordionCount11}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse11${SignatoryAccordionCount11}" aria-expanded="false" aria-controls="signatoryCollapse11${SignatoryAccordionCount11}">
                            POC Entry ${SignatoryAccordionCount11}
                        </button>
                    </h2>
                    <div id="signatoryCollapse11${SignatoryAccordionCount11}" class="collapse" aria-labelledby="signatoryHeading11${SignatoryAccordionCount11}">
                        <div class="accordion-body">
                            <div class="col-lg-12" id="authority_add_fields">
                                <input type="hidden" name="vendorpocs[${SignatoryAccordionCount11 - 1}][p_id]" value="">
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        POC name <br> <input class="form-control" readonly name="vendorpocs[${SignatoryAccordionCount11 - 1}][v_poc_name]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Cell number <br> <input class="form-control" readonly name="vendorpocs[${SignatoryAccordionCount11 - 1}][v_poc_cell]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Email <br> <input class="form-control" readonly name="vendorpocs[${SignatoryAccordionCount11 - 1}][v_poc_email]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        CNIC number <br> <input class="form-control" readonly name="vendorpocs[${SignatoryAccordionCount11 - 1}][v_poc_cnic]" type="text"  placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        CNIC Front Photograph <br> <input class="form-control" readonly name="vendorpocs[${SignatoryAccordionCount11 - 1}][v_poc_front_attach]" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        CNIC Back Photograph <br> <input class="form-control" readonly name="vendorpocs[${SignatoryAccordionCount11 - 1}][v_poc_back_attach]" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Notes <br> <textarea class="form-control" readonly name="vendorpocs[${SignatoryAccordionCount11 - 1}][v_poc_notes]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Attachments <br> <input class="form-control" readonly name="vendorpocs[${SignatoryAccordionCount11 - 1}][v_poc_attach]" type="file" placeholder="..." style="width: 100%;">
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
                        <input type="hidden" name="vendoraccounts[${SignatoryAccordionCount12 - 1}][a_id]" value="">
                        <div class="accordion-body">
                            <div class="row mb-2" id="signatoryDetailsContainer12">
                                <input type="hidden" name="vendoraccounts[{{ $index }}][a_id]" value="{{ $account->id }}">
                                <div class="col-lg-12">
                                    <div class="row mb-2">
                                        <div class="col-lg-3 spacing-right">
                                            Bank Name <br> <input class="form-control" readonly name="vendoraccounts[${SignatoryAccordionCount12 - 1}][v_bank_name]" type="text"  placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left spacing-right">
                                            Account Title <br> <input class="form-control" readonly name="vendoraccounts[${SignatoryAccordionCount12 - 1}][v_bank_title]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Account Number <br> <input class="form-control" readonly  name="vendoraccounts[${SignatoryAccordionCount12 - 1}][v_bank_number]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            IBAN No <br> <input class="form-control" readonly name="vendoraccounts[${SignatoryAccordionCount12 - 1}][v_bank_iban]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Payment Terms <br> <input class="form-control" readonly name="vendoraccounts[${SignatoryAccordionCount12 - 1}][v_bank_terms]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Notes <br> <textarea class="form-control" readonly name="vendoraccounts[${SignatoryAccordionCount12 - 1}][v_bank_notes]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            Attachments <br> <input class="form-control" readonly  name="vendoraccounts[${SignatoryAccordionCount12 - 1}][v_bank_attach]" type="file" placeholder="..." style="width: 100%;">
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


</body>

</html>


