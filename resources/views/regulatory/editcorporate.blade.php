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
                    <!-- <div class="modal-content"> -->
                        <div class="modal-header border-0">
                            <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;"> Corporate
                            </h4>

                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> -->
                        </div>
                        <!-- <div class="modal-body"> -->
                            <section>

                                <form action="{{ route('update_corporate', ['id' => $corporates->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">

                                        <div class="row mb-2" style="margin-left: 20px;">
                                            <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
                                              <h5>Corporate Activation Status</h5>

                                              <div class="form-check form-check-inline" style="margin-right: 90px;">
                                                <input class="form-check-input mr-2" type="radio" name="corporate_activation" {{ $corporates->corporate_activation == '1' ? 'checked' : '' }}  value="1" id="activeRadio">
                                                <label class="form-check-label" for="activeRadio">Active</label>

                                                <input class="form-check-input ml-3 mr-2" type="radio" name="corporate_activation" {{ $corporates->corporate_activation == '0' ? 'checked' : '' }} value="0" id="inactiveRadio">
                                                <label class="form-check-label" for="inactiveRadio">Inactive</label>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" row main-content div">
                                        <div class="col-lg-12">
                                            <div class="row mb-2">
                                                <div class="col-lg-4 spacing-right">
                                                    Regulatory ID : <br> <input class="form-control" id="" name="regulatory_id" value="{{$corporates->regulatory_id}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Name of Certification <br> <input class="form-control" id="" name="name_of_certification" value="{{$corporates->name_of_certification}}"  type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Registration No <br> <input class="form-control" id="" name="registration_no" value="{{$corporates->registration_no}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Certificate No <br> <input class="form-control" id="" name="certification_no" value="{{$corporates->certification_no}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Initial Registration Date <br> <input class="form-control" id="" name="initial_reg_date"  value="{{$corporates->initial_reg_date}}" type="date" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right ">
                                                    Latest Certificate Attachments <br> <input class="form-control" id="" name="latest_certification" value="{{$corporates->latest_certification}}" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="image-preview42" id="imagePreview42">
                                                            @if($corporates->latest_certification)
                                                            <img src="{{ asset($corporates->latest_certification) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Validity from : <br> <input class="form-control" id="" name="validity_from" value="{{$corporates->validity_from}}" type="date" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Expiry Date <br> <input class="form-control" id="" name="expiry_date" value="{{$corporates->expiry_date}}"  type="date" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                Notes <br> <textarea class="form-control" id="" name="notes" type="text" placeholder="..." style="width: 100%;">{{$corporates->notes}}</textarea>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                Attachments <br> <input class="form-control" id="" name="attachments" value="{{$corporates->attachments}}"  type="file" placeholder="..." style="width: 100%;" multiple>
                                                    <div class="col-lg-5 spacing-right">
                                                            <!-- Image Preview Biometric -->
                                                        <div class="image-preview42" id="imagePreview42">
                                                            @if($corporates->attachments)
                                                            <img src="{{ asset($corporates->attachments) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!--Tabs forDetails-->

                                    <nav>
                                        <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                               href="#consultant" role="tab" aria-controls="nav-home"
                                               aria-selected="true">Consultant Details</a>
                                            <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab"
                                                href="#address" role="tab" aria-controls="nav-home"
                                                aria-selected="true">Address</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                                href="#issuing" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">Issuing Authority</a>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                                href="#renewals" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">Renewals</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                                href="#law" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Laws</a>
                                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                                href="#history" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Renewal History</a>
                                        </div>
                                    </nav>


                                    <div class="tab-content" style="font-size: small; font-weight: 600;"
                                        id="nav-tabContent">
                                         <!--Consultant Details-->
                                        <div class="tab-pane fade show active m-3" style="opacity: 90%;"
                                             id="consultant" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <h5>Consultant Details:</h5>
                                            <div class="container my-5">
                                                <div class="accordion" id="consultantAccordion">
                                                    <!-- Initial Accordion Items -->
                                                    @foreach ($corporates->corporateconsultants as $index => $consultant)
                                                        <div class="accordion-item" id="consultantEntry{{ $index + 1 }}">
                                                            <h2 class="accordion-header" id="consultantHeading{{ $index + 1 }}">
                                                                <button class="accordion-button" type="button" data-toggle="collapse" data-target="#consultantCollapse{{ $index + 1 }}" aria-expanded="false" aria-controls="consultantCollapse{{ $index + 1 }}">
                                                                    Consultant Entry {{ $index + 1 }}
                                                                </button>
                                                            </h2>
                                                            <div id="consultantCollapse{{ $index + 1 }}" class="collapse" aria-labelledby="consultantHeading{{ $index + 1 }}">
                                                                <div class="accordion-body">
                                                                    <input type="hidden" name="corporateconsultants[{{ $index }}][c_id]" value="{{ $consultant->id }}">
                                                                    <div class=" row mb-2">
                                                                        <input type="hidden" name="corporateconsultants[{{ $index }}][c_id]" value="{{ $consultant->id }}">
                                                                        <div class="col-lg-4 spacing-right">
                                                                            <input class="form-control" name="corporateconsultants[{{ $index }}][c_name]" value="{{ $consultant->c_name }}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-left spacing-right">
                                                                            Designation <br> <input class="form-control" id="" name="corporateconsultants[{{ $index }}][c_desig]" value="{{$consultant->c_desig}}"  type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right">
                                                                            Organization <br> <input class="form-control" id="" name="corporateconsultants[{{ $index }}][c_org]" value="{{$consultant->c_org}}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right">
                                                                            Cell Number <br> <input class="form-control" id="" name="corporateconsultants[{{ $index }}][c_cell]" value="{{$consultant->c_cell}}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-left">
                                                                            Email <br> <input class="form-control" id="" name="corporateconsultants[{{ $index }}][c_email]" value="{{$consultant->c_email}}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-left">
                                                                            Consultancy Fees <br> <input class="form-control" id="" name="corporateconsultants[{{ $index }}][c_fee]" value="{{$consultant->c_fee}}"  type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                    </div>
                                                                    <h5>Consultant Bank Details :</h5>
                                                                    <div class=" row mb-2">
                                                                        <div class="col-lg-4 spacing-right">
                                                                            Bank Name  <br> <input class="form-control" id="" name="corporateconsultants[{{ $index }}][c_bank]" value="{{$consultant->c_bank}}"  type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-left spacing-right">
                                                                            Acccount Title <br> <input class="form-control" id="" name="corporateconsultants[{{ $index }}][c_acc]" value="{{$consultant->c_acc}}"  type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-left spacing-right">
                                                                            Acccount Number <br> <input class="form-control" id="" name="corporateconsultants[{{ $index }}][c_acc_num]" value="{{$consultant->c_acc_num}}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-right">
                                                                            Cheque Book Attachment <br>
                                                                            <input class="form-control" name="corporateconsultants[{{ $index }}][c_cheque]" type="file" placeholder="..." style="width: 100%;">
                                                                            <div class="col-lg-5 spacing-right">
                                                                                <!-- Image Preview for Cheque -->
                                                                                <div class="image-preview42" id="imagePreview42">
                                                                                    @if ($consultant->c_cheque)
                                                                                        <img src="{{ asset($consultant->c_cheque) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                    @else
                                                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-left spacing-right">
                                                                            Notes <br> <textarea class="form-control" id="" name="corporateconsultants[{{ $index }}][c_notes]" type="text" placeholder="..." style="width: 100%;">{{$consultant->c_notes}}</textarea>
                                                                        </div>
                                                                        <div class="col-lg-4 spacing-left spacing-right">
                                                                            Attachment <br> <input class="form-control" id="" name="corporateconsultants[{{ $index }}][c_attach]" value="{{$consultant->c_attach}}" type="file" placeholder="..." style="width: 100%;">
                                                                            <div class="col-lg-5 spacing-right">
                                                                                <!-- Image Preview Biometric -->
                                                                                <div class="image-preview42" id="imagePreview42">
                                                                                    @if($consultant->c_attach)
                                                                                    <img src="{{ asset($consultant->c_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                    @else
                                                                                    <span class="image-preview__default-text42">Image Preview</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h5>Consultant Address</h5>
                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-5 spacing-right">
                                                                            Office No <br> <input class="form-control" name="corporateconsultants[{{ $index }}][c_office]" value="{{$consultant->c_office}}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-5 spacing-left">
                                                                            Building <br> <input class="form-control"  name="corporateconsultants[{{ $index }}][c_building]" value="{{$consultant->c_building}}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-5 spacing-right">
                                                                            Block <br> <input class="form-control" name="corporateconsultants[{{ $index }}][c_block]" value="{{$consultant->c_block}}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-5 spacing-left">
                                                                            Area <br> <input class="form-control"  name="corporateconsultants[{{ $index }}][c_area]" value="{{$consultant->c_area}}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-5 spacing-right">
                                                                            City <br> <input class="form-control" name="corporateconsultants[{{ $index }}][c_city]" value="{{$consultant->c_city}}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-5 spacing-left">
                                                                            Photograph of Location <br> <input class="form-control" name="corporateconsultants[{{ $index }}][c_loc]" value="{{$consultant->c_loc}}" type="file" placeholder="..." style="width: 100%;">
                                                                            <div class="col-lg-5 spacing-right">
                                                                                <!-- Image Preview Biometric -->
                                                                                <div class="image-preview42" id="imagePreview42">
                                                                                    @if($consultant->c_loc)
                                                                                    <img src="{{ asset($consultant->c_loc) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                    @else
                                                                                    <span class="image-preview__default-text42">Image Preview</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-5 spacing-right">
                                                                            Email <br> <input class="form-control" id="" name="corporateconsultants[{{ $index }}][c_a_email]" value="{{$consultant->c_a_email}}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-5 spacing-left">
                                                                            Website <br> <input class="form-control" id="" name="corporateconsultants[{{ $index }}][c_website]" value="{{$consultant->c_website}}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-5 spacing-right">
                                                                            Pin location <br> <input class="form-control" id="" name="corporateconsultants[{{ $index }}][c_pin]" value="{{$consultant->c_pin}}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-5 spacing-left">
                                                                            Google Map <br> <input class="form-control" id="" name="corporateconsultants[{{ $index }}][c_map]" value="{{$consultant->c_map}}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-5 spacing-right">
                                                                            Notes <br> <textarea class="form-control" id="" name="corporateconsultants[{{ $index }}][c_ex_notes]" type="text" placeholder="..." style="width: 100%;">{{$consultant->c_ex_notes}}</textarea>
                                                                        </div>
                                                                        <div class="col-lg-5 spacing-left">
                                                                            Attachments <br> <input class="form-control" id="" name="corporateconsultants[{{ $index }}][c_ex_attach]" value="{{$consultant->c_ex_attach}}" type="file" placeholder="..." style="width: 100%;">
                                                                            <div class="col-lg-5 spacing-right">
                                                                                <!-- Image Preview Biometric -->
                                                                                <div class="image-preview42" id="imagePreview42">
                                                                                    @if($consultant->c_ex_attach)
                                                                                    <img src="{{ asset($consultant->c_ex_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                    @else
                                                                                    <span class="image-preview__default-text42">Image Preview</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- Add More Button -->
                                                <div class="row my-3">
                                                    <div class="col">
                                                        <button type="button" class="btn btn-primary" id="addConsultant" style="height:30px; width:150px;">Add More Consultant</button>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="col-lg-12" >
                                                @foreach ($corporates->corporateconsultants as $index => $consultant)

                                                @endforeach
                                            </div>

                                            <div id="consultant_add_fields">

                                            </div> --}}

                                        </div>
                                        <!--Address Details-->
                                        <div class="tab-pane fade show m-3" style="opacity: 90%;"
                                            id="address" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="col-lg-6 spacing-left">
                                                <h5>Address</h5>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right">
                                                        Office No <br> <input class="form-control" name="a_office" value="{{$corporates->a_office}}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left">
                                                        Building <br> <input class="form-control" name="a_build" value="{{$corporates->a_build}}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right">
                                                        Block <br> <input class="form-control" name="a_block" value="{{$corporates->a_block}}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left">
                                                        Area <br> <input class="form-control" name="a_area" value="{{$corporates->a_area}}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right">
                                                        City <br> <input class="form-control" name="a_city" value="{{$corporates->a_city}}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left">
                                                        Photograph of Building <br> <input class="form-control" id="" name="a_photo" value="{{$corporates->a_photo}}" type="file" placeholder="..." style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <!-- Image Preview Biometric -->
                                                            <div class="image-preview42" id="imagePreview42">
                                                                @if($corporates->a_photo)
                                                                <img src="{{ asset($corporates->a_photo) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                @else
                                                                <span class="image-preview__default-text42">Image Preview</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right">
                                                        Email <br> <input class="form-control" id="" name="a_email" value="{{$corporates->a_email}}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left">
                                                        Website <br> <input class="form-control" id="" name="a_website" value="{{$corporates->a_website}}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right">
                                                        Pin location <br> <input class="form-control" id="" name="a_pin" value="{{$corporates->a_pin}}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left">
                                                        GPS <br> <input class="form-control" id="" name="a_gps" value="{{$corporates->a_gps}}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right">
                                                        Notes <br> <textarea class="form-control" id="" name="a_notes"  type="text" placeholder="..." style="width: 100%;">{{$corporates->a_notes}}</textarea>
                                                    </div>
                                                    <div class="col-lg-5 spacing-left">
                                                        Attachments <br> <input class="form-control" id="" name="a_attach" value="{{$corporates->a_attach}}" type="file" placeholder="..." style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <!-- Image Preview Biometric -->
                                                            <div class="image-preview42" id="imagePreview42">
                                                                @if($corporates->a_attach)
                                                                <img src="{{ asset($corporates->a_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                @else
                                                                <span class="image-preview__default-text42">Image Preview</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Issuing Authority-->
                                        <div class="tab-pane fade m-3" style="opacity: 90%;"
                                            id="issuing" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="container my-5">
                                                <div id="authorityAccordion">
                                                    @foreach ($corporates->corporateissuings as $index => $issuing)
                                                        <div class="accordion-item" id="authorityItem{{ $index + 1 }}">
                                                            <h2 class="accordion-header" id="authorityHeading{{ $index + 1 }}">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#authorityCollapse{{ $index + 1 }}" aria-expanded="true" aria-controls="authorityCollapse{{ $index + 1 }}">
                                                                    Authority Entry {{ $index + 1 }}
                                                                </button>
                                                            </h2>
                                                            <div id="authorityCollapse{{ $index + 1 }}" class="accordion-collapse collapse show" aria-labelledby="authorityHeading{{ $index + 1 }}">
                                                                <div class="accordion-body">
                                                                    <!-- Authority Entry Fields -->
                                                                    <div class="row mb-2">
                                                                        <input type="hidden" name="corporateissuings[{{ $index }}][i_id]" value="{{ $issuing->id }}">
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Name <br> <input class="form-control" name="corporateissuings[{{ $index }}][i_name]" value="{{ $issuing->i_name }}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-left spacing-right">
                                                                            Designation <br> <input class="form-control" name="corporateissuings[{{ $index }}][i_desig]" value="{{ $issuing->i_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            PTCL Number <br> <input class="form-control" id="" name="corporateissuings[{{ $index }}][i_ptcl]" value="{{ $issuing->i_ptcl }}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Cell Number <br> <input class="form-control" id="" name="corporateissuings[{{ $index }}][i_cell]" value="{{ $issuing->i_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Email <br> <input class="form-control" id="" name="corporateissuings[{{ $index }}][i_email]" value="{{ $issuing->i_email }}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Website <br> <input class="form-control" id="" name="corporateissuings[{{ $index }}][i_website]" value="{{ $issuing->i_website }}" type="text" placeholder="..." style="width: 100%;">
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right">
                                                                            Visiting Card Front <br> <input class="form-control" id="" name="corporateissuings[{{ $index }}][i_front]" value="{{ $issuing->i_front }}" type="file" placeholder="..." style="width: 100%;">
                                                                            <div class="col-lg-5 spacing-right">
                                                                                <!-- Image Preview Biometric -->
                                                                                <div class="image-preview42" id="imagePreview42">
                                                                                    @if($issuing->i_front)
                                                                                    <img src="{{ asset($issuing->i_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                    @else
                                                                                    <span class="image-preview__default-text42">Image Preview</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-3 spacing-right spacing-left">
                                                                            Visiting Card Back <br> <input class="form-control" id=""  name="corporateissuings[{{ $index }}][i_back]" value="{{ $issuing->i_back }}" type="file" placeholder="..." style="width: 100%;">
                                                                            <div class="col-lg-5 spacing-right">
                                                                                <!-- Image Preview Biometric -->
                                                                                <div class="image-preview42" id="imagePreview42">
                                                                                    @if($issuing->i_back)
                                                                                    <img src="{{ asset($issuing->i_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                    @else
                                                                                    <span class="image-preview__default-text42">Image Preview</span>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-2">
                                                                            <div class="col-lg-5 spacing-right">
                                                                                Notes <br> <textarea class="form-control" id=""  name="corporateissuings[{{ $index }}][i_notes]" type="text" placeholder="..." style="width: 100%;">{{ $issuing->i_notes }}</textarea>
                                                                            </div>
                                                                            <div class="col-lg-5 spacing-left">
                                                                                Attachments <br> <input class="form-control" id="" name="corporateissuings[{{ $index }}][i_attach]" value="{{ $issuing->i_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                                                <div class="col-lg-5 spacing-right">
                                                                                    <!-- Image Preview Biometric -->
                                                                                    <div class="image-preview42" id="imagePreview42">
                                                                                        @if($issuing->i_attach)
                                                                                        <img src="{{ asset($issuing->i_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                        @else
                                                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <!-- Add More Button -->
                                                <div class="row my-3">
                                                    <div class="col">
                                                        <button type="button" class="btn btn-primary" id="addAuthority" style="height:30px; width:150px;">Add More Authority</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Renewals Details-->
                                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="renewals"
                                            role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <h5>Application : </h5>
                                            <div class="col-lg-12">
                                                <div class="row mb-2">
                                                    <div class="col-lg-4 spacing-right">
                                                        Initiating Date  <br> <input class="form-control" id="" name="application_date" value="{{ $corporates->application_date }}" type="date" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                        Request Letter Attachment <br> <input class="form-control" id="" name="application_letter" value="{{ $corporates->application_letter }}" type="file" placeholder="..." style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <!-- Image Preview Biometric -->
                                                            <div class="image-preview42" id="imagePreview42">
                                                                @if($corporates->application_letter)
                                                                <img src="{{ asset($corporates->application_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                @else
                                                                <span class="image-preview__default-text42">Image Preview</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Notes <br> <textarea class="form-control" id="" name="application_notes" type="text" placeholder="..." style="width: 100%;">{{ $corporates->application_notes }}</textarea>
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Attachments <br> <input class="form-control" id="" name="application_attach" value="{{ $corporates->application_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <!-- Image Preview Biometric -->
                                                            <div class="image-preview42" id="imagePreview42">
                                                                @if($corporates->application_attach)
                                                                <img src="{{ asset($corporates->application_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                @else
                                                                <span class="image-preview__default-text42">Image Preview</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <h5>Corespondence :</h5>
                                            <div class="col-lg-12">
                                                <div class="row mb-2">
                                                    <div class="col-lg-4 spacing-right">
                                                        Corespondence Date  <br> <input class="form-control" id="" name="corespondence_date" value="{{ $corporates->corespondence_date }}" type="date" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Corespondence Letter Attachment  <br> <input class="form-control" id="" name="corespondence_letter" value="{{ $corporates->corespondence_letter }}" type="file" placeholder="..." style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <!-- Image Preview Biometric -->
                                                            <div class="image-preview42" id="imagePreview42">
                                                                @if($corporates->corespondence_letter)
                                                                <img src="{{ asset($corporates->corespondence_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                @else
                                                                <span class="image-preview__default-text42">Image Preview</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Notes <br> <textarea class="form-control" id="" name="corespondence_notes" type="text" placeholder="..." style="width: 100%;">{{ $corporates->corespondence_notes }}</textarea>
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Attachments <br> <input class="form-control" id="" name="corespondence_attach" value="{{ $corporates->corespondence_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <!-- Image Preview Biometric -->
                                                            <div class="image-preview42" id="imagePreview42">
                                                                @if($corporates->corespondence_attach)
                                                                <img src="{{ asset($corporates->corespondence_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                @else
                                                                <span class="image-preview__default-text42">Image Preview</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5>Approval :</h5>
                                            <div class="col-lg-12">
                                                <div class="row mb-2">
                                                    <div class="col-lg-4 spacing-right">
                                                        Approval Date  <br> <input class="form-control" id="" name="approval_date" value="{{ $corporates->approval_date }}" type="date" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Approval Letter Attachment  <br> <input class="form-control" id="" name="approval_letter" value="{{ $corporates->approval_letter }}" type="file" placeholder="..." style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <!-- Image Preview Biometric -->
                                                            <div class="image-preview42" id="imagePreview42">
                                                                @if($corporates->approval_letter)
                                                                <img src="{{ asset($corporates->approval_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                @else
                                                                <span class="image-preview__default-text42">Image Preview</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Notes <br> <textarea class="form-control" id="" name="approval_notes" type="text" placeholder="..." style="width: 100%;">{{ $corporates->approval_notes }}</textarea>
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Attachments <br> <input class="form-control" id="" name="approval_attach" value="{{ $corporates->approval_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <!-- Image Preview Biometric -->
                                                            <div class="image-preview42" id="imagePreview42">
                                                                @if($corporates->approval_attach)
                                                                <img src="{{ asset($corporates->approval_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                @else
                                                                <span class="image-preview__default-text42">Image Preview</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div>
                                                <h3 style="border: 2px solid black; width: 99%; padding: 10px;"><b>Finances :</b></h3>
                                                <div id="financeAccordion">
                                                    @foreach ($corporates->corporaterenewals as $index => $renewal)
                                                        <div class="accordion-item" id="financeItem{{ $index + 1 }}">
                                                            <h2 class="accordion-header" id="financeHeading{{ $index + 1 }}">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#financeCollapse{{ $index + 1 }}" aria-expanded="true" aria-controls="financeCollapse{{ $index + 1 }}">
                                                                    Finance Entry {{ $index + 1 }}
                                                                </button>
                                                            </h2>
                                                            <div id="financeCollapse{{ $index + 1 }}" class="accordion-collapse collapse show" aria-labelledby="financeHeading{{ $index + 1 }}" >
                                                                <div class="accordion-body">
                                                                    <input type="hidden" name="corporaterenewals[{{ $index }}][r_id]" value="{{ $renewal->id }}">
                                                                    <div class="col-lg-6 spacing-right mb-3" id="finance_add_fields">
                                                                        Category <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][fee_category]" value="{{ $renewal->fee_category }}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <h5>Withdrawal From:</h5>
                                                                    <div class="col-lg-12">
                                                                        <div class="row mb-2">
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Bank Name  <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wf_bank_name]" value="{{ $renewal->wf_bank_name }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Cheque/Instrument No. <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wf_cheque]" value="{{ $renewal->wf_cheque }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Cheque/Instrument<br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wf_cheque_attach]" value="{{ $renewal->wf_cheque_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                                                <div class="col-lg-5 spacing-right">
                                                                                    <!-- Image Preview Biometric -->
                                                                                    <div class="image-preview42" id="imagePreview42">
                                                                                        @if($renewal->wf_cheque_attach)
                                                                                        <img src="{{ asset($renewal->wf_cheque_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                        @else
                                                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Amount in figures <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wf_amount]" value="{{ $renewal->wf_amount }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Notes <br> <textarea class="form-control" id="" name="corporaterenewals[{{ $index }}][wf_notes]" type="text" placeholder="..." style="width: 100%;">{{ $renewal->wf_notes }}</textarea>
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Attachments <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wf_attach]" value="{{ $renewal->wf_attach }}" type="file"   placeholder="..." style="width: 100%;">
                                                                                <div class="col-lg-5 spacing-right">
                                                                                    <!-- Image Preview Biometric -->
                                                                                    <div class="image-preview42" id="imagePreview42">
                                                                                        @if($renewal->wf_attach)
                                                                                        <img src="{{ asset($renewal->wf_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                        @else
                                                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <h5>Withdrawal By :</h5>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Name  <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wb_name]" value="{{ $renewal->wb_name }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Employee ID <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wb_id]" value="{{ $renewal->wb_id }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Designation <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wb_desig]" value="{{ $renewal->wb_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Cell Number <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wb_cell]" value="{{ $renewal->wb_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Email ID <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wb_email]" value="{{ $renewal->wb_email }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Notes <br> <textarea class="form-control" id="" name="corporaterenewals[{{ $index }}][wb_attach]" type="text" placeholder="..." style="width: 100%;">{{ $renewal->wb_attach }}</textarea>
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Attachments <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wb_attach]" value="{{ $renewal->wb_attach }}" type="file"   placeholder="..." style="width: 100%;">
                                                                                <div class="col-lg-5 spacing-right">
                                                                                    <!-- Image Preview Biometric -->
                                                                                    <div class="image-preview42" id="imagePreview42">
                                                                                        @if($renewal->wb_attach)
                                                                                        <img src="{{ asset($renewal->wb_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                        @else
                                                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="mt-2">Fees :</h5>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Fees  <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][fee]" value="{{ $renewal->fee }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Date of Renewal Fee Deposit <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][fee_date]" value="{{ $renewal->fee_date }}" type="date" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Name of bank<br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][fee_bank]" value="{{ $renewal->fee_bank }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Instrument Number <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][fee_ins]" value="{{ $renewal->fee_ins }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Deposit Slip Attachment <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][fee_slip]" value="{{ $renewal->fee_slip }}" type="file"   placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Notes <br> <textarea class="form-control" id="" name="corporaterenewals[{{ $index }}][fee_notes]" type="text" placeholder="..." style="width: 100%;">{{ $renewal->fee_notes }}</textarea>
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Attachments <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][fee_attach]" value="{{ $renewal->fee_attach }}" type="file"   placeholder="..." style="width: 100%;">
                                                                                <div class="col-lg-5 spacing-right">
                                                                                    <!-- Image Preview Biometric -->
                                                                                    <div class="image-preview42" id="imagePreview42">
                                                                                        @if($renewal->fee_attach)
                                                                                        <img src="{{ asset($renewal->fee_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                        @else
                                                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="mt-2">Deposited By :</h5>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Name  <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][db_name]" value="{{ $renewal->db_name }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Employee ID <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][db_id]" value="{{ $renewal->db_id }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Designation <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][db_desig]" value="{{ $renewal->db_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Cell Number <br> <input class="form-control" id=""name="corporaterenewals[{{ $index }}][db_cell]" value="{{ $renewal->db_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Email ID <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][db_email]" value="{{ $renewal->db_email }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Notes <br> <textarea class="form-control" id="" name="corporaterenewals[{{ $index }}][db_notes]" type="text" placeholder="..." style="width: 100%;">{{ $renewal->db_notes }}</textarea>
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Attachments <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][db_attach]" value="{{ $renewal->db_attach }}" type="file"   placeholder="..." style="width: 100%;">
                                                                                <div class="col-lg-5 spacing-right">
                                                                                    <!-- Image Preview Biometric -->
                                                                                    <div class="image-preview42" id="imagePreview42">
                                                                                        @if($renewal->db_attach)
                                                                                        <img src="{{ asset($renewal->db_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                        @else
                                                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <!-- Add More Button -->
                                                <div class="row my-3">
                                                    <div class="col">
                                                        <button type="button" class="btn btn-primary" id="addFinance" style="height:30px; width:150px;">Add More Finance Entry</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Laws-->
                                        <div class="tab-pane fade m-3" style="opacity: 90%;"
                                        id="law" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="col-lg-12">
                                            <div class="row mb-2">
                                                <div class="col-lg-4 spacing-right">
                                                Notes <br> <textarea class="form-control" id="" name="laws_notes" type="text" placeholder="..." style="width: 100%;">{{$corporates->laws_notes}}</textarea>

                                                </div>
                                                <div class="col-lg-4 spacing-left spacing-right">
                                                Attachments <br> <input class="form-control" id="" name="laws_attach" value="{{$corporates->laws_attach}}" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="image-preview42" id="imagePreview42">
                                                            @if($corporates->laws_attach)
                                                            <img src="{{ asset($corporates->laws_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        </div>
                                        <!--History-->
                                        <div class="tab-pane fade m-3" style="opacity: 90%;"
                                        id="history" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <h5 style="text-align:center">History Shown after backend</h5>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </section>

                        <!-- </div> -->

                    </div>
                <!-- </div> -->
            <!-- </div> -->

        <!-- </div> -->
        <!--Customer form ends here-->
    <!-- </div> -->





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
        var consultantRoom = {{ count($corporates->corporateconsultants) }} + 1;

        $(document).ready(function () {
            $('#addConsultant').on('click', function () {
                var accordionCount = $('.accordion-item').length + 1;

                var accordionHtml = `
                    <div class="accordion-item" id="consultantEntry${consultantRoom}">
                        <h2 class="accordion-header" id="consultantHeading${consultantRoom}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#consultantCollapse${consultantRoom}" aria-expanded="false" aria-controls="consultantCollapse${consultantRoom}">
                                Consultant Entry ${consultantRoom}
                            </button>
                        </h2>
                        <div id="consultantCollapse${consultantRoom}" class="collapse" aria-labelledby="consultantHeading${consultantRoom}">
                            <div class="accordion-body">
                                <!-- Your empty form fields go here -->
                                <input type="hidden" name="corporateconsultants[${consultantRoom - 1}][c_id]" value="">

                                <div class=" row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        <input class="form-control" name="corporateconsultants[${consultantRoom - 1}][c_name]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Designation <br> <input class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_desig]" value=""  type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Organization <br> <input class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_org]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Cell Number <br> <input class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_cell]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Email <br> <input class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_email]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Consultancy Fees <br> <input class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_fee]" value=""  type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <h5>Consultant Bank Details :</h5>
                                <div class=" row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Bank Name  <br> <input class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_bank]" value=""  type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Acccount Title <br> <input class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_acc]" value=""  type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Acccount Number <br> <input class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_acc_num]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Cheque Book Attachment <br>
                                        <input class="form-control" name="corporateconsultants[${consultantRoom - 1}][c_cheque]" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview for Cheque -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if ($consultant->c_cheque)
                                                    <img src="{{ asset($consultant->c_cheque) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                    <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Notes <br> <textarea class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_notes]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Attachment <br> <input class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_attach]" value="" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($consultant->c_attach)
                                                <img src="{{ asset($consultant->c_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5>Consultant Address</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Office No <br> <input class="form-control" name="corporateconsultants[${consultantRoom - 1}][c_office]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Building <br> <input class="form-control"  name="corporateconsultants[${consultantRoom - 1}][c_building]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Block <br> <input class="form-control"  name="corporateconsultants[${consultantRoom - 1}][c_block]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Area <br> <input class="form-control" name="corporateconsultants[${consultantRoom - 1}][c_area]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        City <br> <input class="form-control" name="corporateconsultants[${consultantRoom - 1}][c_city]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Photograph of Location <br> <input class="form-control" name="corporateconsultants[${consultantRoom - 1}][c_loc]" value="" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($consultant->c_loc)
                                                <img src="{{ asset($consultant->c_loc) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Email <br> <input class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_a_email]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Website <br> <input class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_website]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Pin location <br> <input class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_pin]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Google Map <br> <input class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_map]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Notes <br> <textarea class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_ex_notes]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Attachments <br> <input class="form-control" id="" name="corporateconsultants[${consultantRoom - 1}][c_ex_attach]" value="" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($consultant->c_ex_attach)
                                                <img src="{{ asset($consultant->c_ex_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                `;

                $('#consultantAccordion').append(accordionHtml);
                consultantRoom++;
            });
        });
    </script>

    <script>
        // Counter to track the number of authority entries
        let authorityCount = {{ count($corporates->corporateissuings) }};

        // Function to add a new authority entry
        function addAuthorityEntry() {
            authorityCount++; // Increment the counter
            const newEntryHtml = `
                <div class="accordion-item" id="authorityItem${authorityCount}">
                    <h2 class="accordion-header" id="authorityHeading${authorityCount}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#authorityCollapse${authorityCount}" aria-expanded="true" aria-controls="authorityCollapse${authorityCount}">
                            Authority Entry ${authorityCount}
                        </button>
                    </h2>
                    <div id="authorityCollapse${authorityCount}" class="accordion-collapse collapse show" aria-labelledby="authorityHeading${authorityCount}" data-bs-parent="#authorityAccordion">
                        <div class="accordion-body">
                            <!-- Authority Entry Fields -->
                            <div class="row mb-2">
                                <input type="hidden" name="corporateissuings[${authorityCount - 1}][i_id]" value="">
                                <div class="col-lg-3 spacing-right">
                                    Name <br> <input class="form-control" name="corporateissuings[${authorityCount - 1}][i_name]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-left spacing-right">
                                    Designation <br> <input class="form-control" name="corporateissuings[${authorityCount - 1}][i_desig]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    PTCL Number <br> <input class="form-control" id="" name="corporateissuings[{{ $index }}][i_ptcl]" name="corporateissuings[${authorityCount - 1}][i_ptcl]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Cell Number <br> <input class="form-control" id="" name="corporateissuings[{{ $index }}][i_cell]" name="corporateissuings[${authorityCount - 1}][i_cell]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Email <br> <input class="form-control" id="" name="corporateissuings[{{ $index }}][i_email]" name="corporateissuings[${authorityCount - 1}][i_email]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Website <br> <input class="form-control" id="" name="corporateissuings[{{ $index }}][i_website]" name="corporateissuings[${authorityCount - 1}][i_website]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    Visiting Card Front <br> <input class="form-control" id="" name="corporateissuings[{{ $index }}][i_front]" name="corporateissuings[${authorityCount - 1}][i_front]" type="file" placeholder="..." style="width: 100%;">
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="image-preview42" id="imagePreview42">
                                            @if($issuing->i_front)
                                            <img src="{{ asset($issuing->i_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 spacing-right spacing-left">
                                    Visiting Card Back <br> <input class="form-control" id=""  name="corporateissuings[{{ $index }}][i_back]" name="corporateissuings[${authorityCount - 1}][i_back]" type="file" placeholder="..." style="width: 100%;">
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="image-preview42" id="imagePreview42">
                                            @if($issuing->i_back)
                                            <img src="{{ asset($issuing->i_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Notes <br> <textarea class="form-control" id=""  name="corporateissuings[{{ $index }}][i_notes]" name="corporateissuings[${authorityCount - 1}][i_notes]"  type="text" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Attachments <br> <input class="form-control" id="" name="corporateissuings[{{ $index }}][i_attach]" name="corporateissuings[${authorityCount - 1}][i_attach]" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($issuing->i_attach)
                                                <img src="{{ asset($issuing->i_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            // Append the new entry HTML to the accordion
            $('#authorityAccordion').append(newEntryHtml);
        }

        // Add event listener to the "Add More" button
        $('#addAuthority').on('click', function() {
            addAuthorityEntry();
        });
    </script>

    <script>
        // Counter to track the number of finance entries
        let financeCount = {{ count($corporates->corporaterenewals) }};

        // Function to add a new finance entry
        function addFinanceEntry() {
            financeCount++; // Increment the counter
            const newEntryHtml = `
                <div class="accordion-item" id="financeItem${financeCount}">
                    <h2 class="accordion-header" id="financeHeading${financeCount}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#financeCollapse${financeCount}" aria-expanded="true" aria-controls="financeCollapse${financeCount}">
                            Finance Entry ${financeCount}
                        </button>
                    </h2>
                    <div id="financeCollapse${financeCount}" class="accordion-collapse collapse show" aria-labelledby="financeHeading${financeCount}" data-bs-parent="#financeAccordion">
                        <div class="accordion-body">

                            <input type="hidden" name="corporaterenewals[${financeCount - 1}][r_id]" value="">
                            <div class="col-lg-6 spacing-right mb-3" id="finance_add_fields">
                                Category <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][fee_category]" name="corporaterenewals[${financeCount - 1}][fee_category]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <h5>Withdrawal From:</h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Bank Name  <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wf_bank_name]" name="corporaterenewals[${financeCount - 1}][wf_bank_name]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Cheque/Instrument No. <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wf_cheque]" name="corporaterenewals[${financeCount - 1}][wf_cheque]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Cheque/Instrument<br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wf_cheque_attach]" name="corporaterenewals[${financeCount - 1}][wf_cheque_attach]" value="" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($renewal->wf_cheque_attach)
                                                <img src="{{ asset($renewal->wf_cheque_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Amount in figures <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wf_amount]" name="corporaterenewals[${financeCount - 1}][wf_amount]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Notes <br> <textarea class="form-control" id="" name="corporaterenewals[{{ $index }}][wf_notes]" name="corporaterenewals[${financeCount - 1}][wf_notes]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Attachments <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wf_attach]" name="corporaterenewals[${financeCount - 1}][wf_attach]" value="" type="file"   placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($renewal->wf_attach)
                                                <img src="{{ asset($renewal->wf_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Withdrawal By :</h5>
                                    <div class="col-lg-4 spacing-right">
                                        Name  <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wb_name]" name="corporaterenewals[${financeCount - 1}][wb_name]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Employee ID <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wb_id]" name="corporaterenewals[${financeCount - 1}][wb_id]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Designation <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wb_desig]" name="corporaterenewals[${financeCount - 1}][wb_desig]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Cell Number <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wb_cell]" name="corporaterenewals[${financeCount - 1}][wb_cell]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Email ID <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wb_email]" name="corporaterenewals[${financeCount - 1}][wb_email]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Notes <br> <textarea class="form-control" id="" name="corporaterenewals[{{ $index }}][wb_attach]" name="corporaterenewals[${financeCount - 1}][wb_attach]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][wb_attach]" name="corporaterenewals[${financeCount - 1}][wb_attach]" value="" type="file"   placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($renewal->wb_attach)
                                                <img src="{{ asset($renewal->wb_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mt-2">Fees :</h5>
                                    <div class="col-lg-4 spacing-right">
                                        Fees  <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][fee]" name="corporaterenewals[${financeCount - 1}][fee]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Date of Renewal Fee Deposit <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][fee_date]" name="corporaterenewals[${financeCount - 1}][fee_date]" value="" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Name of bank<br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][fee_bank]" name="corporaterenewals[${financeCount - 1}][fee_bank]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Instrument Number <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][fee_ins]" name="corporaterenewals[${financeCount - 1}][fee_ins]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Deposit Slip Attachment <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][fee_slip]" name="corporaterenewals[${financeCount - 1}][fee_slip]" value="" type="file"   placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea class="form-control" id="" name="corporaterenewals[{{ $index }}][fee_notes]" name="corporaterenewals[${financeCount - 1}][fee_notes]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Attachments <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][fee_attach]" name="corporaterenewals[${financeCount - 1}][fee_attach]" value="" type="file"   placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($renewal->fee_attach)
                                                <img src="{{ asset($renewal->fee_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mt-2">Deposited By :</h5>
                                    <div class="col-lg-4 spacing-right">
                                        Name  <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][db_name]" name="corporaterenewals[${financeCount - 1}][db_name]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Employee ID <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][db_id]" name="corporaterenewals[${financeCount - 1}][db_id]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Designation <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][db_desig]" name="corporaterenewals[${financeCount - 1}][db_desig]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Cell Number <br> <input class="form-control" id=""name="corporaterenewals[{{ $index }}][db_cell]" name="corporaterenewals[${financeCount - 1}][db_cell]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Email ID <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][db_email]" name="corporaterenewals[${financeCount - 1}][db_email]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Notes <br> <textarea class="form-control" id="" name="corporaterenewals[{{ $index }}][db_notes]" name="corporaterenewals[${financeCount - 1}][db_notes]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input class="form-control" id="" name="corporaterenewals[{{ $index }}][db_attach]" name="corporaterenewals[${financeCount - 1}][db_attach]" value="" type="file"   placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($renewal->db_attach)
                                                <img src="{{ asset($renewal->db_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            // Append the new entry HTML to the finance accordion
            $('#financeAccordion').append(newEntryHtml);
        }

        // Add event listener to the "Add More Finance Entry" button
        $('#addFinance').on('click', function() {
            addFinanceEntry();
        });
    </script>


</body>



</html>
