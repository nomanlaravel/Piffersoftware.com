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
                        <!--<div class="modal-header border-0">-->
                        <!--    <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;"><i>Chamber View</i>-->
                        <!--    </h4>-->

                        <!--     <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                        <!--        <span aria-hidden="true">&times;</span>-->
                        <!--    </button> -->
                        <!--</div>-->
                          <div class="modal-header border-0">
                              <div style="display:flex; column-gap:10px; align-items:center">
                                 <button type="button" class="btn btn-link" onclick="history.back()">
                                    <i class="bi bi-arrow-left"></i>
                                </button>
                               <h5 class="mt-3" style="font-weight: 700;">Chamber View</h5>
                            </div>
                       </div>
                        <!-- <div class="modal-body"> -->
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


                                <form id="chamber_form">
                                     <div class="row">

                                        <div class="row mb-2" style="margin-left: 20px;">
                                            <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
                                              <h5>Chamber Activation Status</h5>

                                              <div class="form-check form-check-inline" style="margin-right: 90px;">
                                                <input class="form-check-input mr-2" type="radio" name="chamber_activation" {{ $chambers->chamber_activation == '1' ? 'checked' : '' }} value="1" id="activeRadio">
                                                <label class="form-check-label" for="activeRadio">Active</label>

                                                <input class="form-check-input ml-3 mr-2" type="radio" name="chamber_activation" {{ $chambers->chamber_activation == '0' ? 'checked' : '' }} value="0" id="inactiveRadio">
                                                <label class="form-check-label" for="inactiveRadio">Inactive</label>
                                              </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class=" row main-content div">
                                        <div class="col-lg-12">
                                             <div class="col-lg-12">
                                            <div class="row mb-2">
                                                <div class="col-lg-4 spacing-right">
                                                    Regulatory ID : <br> <input readonly class="form-control" id="head_office_name" value="{{ $chambers->chamber_regulatory_id }}" name="chamber_regulatory_id" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Type <br> <input readonly class="form-control" id="head_office_name" value="{{ $chambers->chamber_type }}" name="chamber_type" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Jurisdiction <br> <input readonly class="form-control" id="head_office_name" name="chamber_jurisdication" value="{{ $chambers->chamber_jurisdication }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Membership No  <br> <input readonly class="form-control" id="head_office_name" name="chamber_membership_no" value="{{ $chambers->chamber_membership_no }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Serial No <br> <input readonly class="form-control" id="head_office_name" name="chamber_serial_no" value="{{ $chambers->chamber_serial_no }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Book No  <br> <input readonly class="form-control" id="head_office_name" name="chamber_book_no" value="{{ $chambers->chamber_book_no }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Membership Type <br> <input readonly class="form-control" id="head_office_name" name="chamber_membership_type" value="{{ $chambers->chamber_membership_type }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Member Since  <br> <input readonly class="form-control" id="head_office_name" name="chamber_member_since" value="{{ $chambers->chamber_member_since }}" type="date" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Latest Certificate Attachment <br> <input readonly class="form-control" id="head_office_name" name="chamber_latest_certification" value="{{ $chambers->chamber_latest_certification }}" type="file" placeholder="..." style="width: 100%;">
                                                     <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="image-preview42" id="imagePreview42">
                                                            @if($chambers->chamber_latest_certification)
                                                            <img src="{{ asset($chambers->chamber_latest_certification) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Validity from : <br> <input readonly class="form-control" id="head_office_name" name="chamber_validity_from" type="date" value="{{ $chambers->chamber_validity_from }}" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Expiry Date <br> <input readonly class="form-control" id="head_office_name" name="chamber_expiry_date" type="date" value="{{ $chambers->chamber_expiry_date }}" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="row mb-2">
                                                <div class="col-lg-4  spacing-right">
                                                    Focal Person <br> <input readonly class="form-control" id="head_office_email" name="chamber_person" value="{{ $chambers->chamber_person }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-left" style="margin-left:19px;">
                                                    Latest Membership Card (front) <br> <input readonly class="form-control" id="head_office_name" value="{{ $chambers->chamber_membership_front }}" name="chamber_membership_front" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="image-preview42" id="imagePreview42">
                                                            @if($chambers->chamber_membership_front)
                                                            <img src="{{ asset($chambers->chamber_membership_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Latest Membership Card (back) <br> <input readonly class="form-control" id="head_office_name" value="{{ $chambers->chamber_membership_back }}" name="chamber_membership_back" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="image-preview42" id="imagePreview42">
                                                            @if($chambers->chamber_membership_back)
                                                            <img src="{{ asset($chambers->chamber_membership_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="col-lg-4 spacing-right">
                                                Notes <br> <textarea readonly class="form-control" id="head_office_name" name="chamber_notes" type="text" placeholder="..." style="width: 100%;">{{ $chambers->chamber_notes }}</textarea readonly>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                Attachments <br> <input readonly class="form-control" id="head_office_email" value="{{ $chambers->chamber_attachments }}" name="chamber_attachments" type="file" placeholder="..." style="width: 100%;">
                                                <div class="col-lg-5 spacing-right">
                                                    <!-- Image Preview Biometric -->
                                                    <div class="image-preview42" id="imagePreview42">
                                                        @if($chambers->chamber_attachments)
                                                        <img src="{{ asset($chambers->chamber_attachments) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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


                                    <!--Consultant Details-->
                                    <div class="tab-pane fade show active m-3" style="opacity: 90%;"
                                        id="consultant" role="tabpanel" aria-labelledby="nav-home-tab">

                                        <div class="col-lg-12">
                                            <div id="consultantAccordion">
                                                @foreach ($chambers->chamberconsultants as $index => $consultant)
                                                    <div class="accordion-item" id="consultantItem{{ $index + 1 }}">
                                                        <h2 class="accordion-header" id="consultantHeading{{ $index + 1 }}">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#consultantCollapse{{ $index + 1 }}" aria-expanded="true" aria-controls="consultantCollapse{{ $index + 1 }}">
                                                                Consultant Entry {{ $index + 1 }}
                                                            </button>
                                                        </h2>
                                                        <div id="consultantCollapse{{ $index + 1 }}" class="accordion-collapse collapse show" aria-labelledby="consultantHeading{{ $index + 1 }}">
                                                            <div class="accordion-body">
                                                                <div class=" row mb-2">
                                                                    <input readonly type="hidden" name="chamberconsultants[{{ $index }}][c_id]" value="{{ $consultant->id }}">
                                                                    <div class="col-lg-4 spacing-right">
                                                                        <input readonly class="form-control" name="chamberconsultants[{{ $index }}][c_name]" value="{{ $consultant->c_name }}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                                        Designation <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_desig]" value="{{$consultant->c_desig}}"  type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Organization <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_org]" value="{{$consultant->c_org}}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Cell Number <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_cell]" value="{{$consultant->c_cell}}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left">
                                                                        Email <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_email]" value="{{$consultant->c_email}}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left">
                                                                        Consultancy Fees <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_fee]" value="{{$consultant->c_fee}}"  type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <h5>Consultant Bank Details :</h5>
                                                                <div class=" row mb-2">
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Bank Name  <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_bank]" value="{{$consultant->c_bank}}"  type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                                        Acccount Title <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_acc]" value="{{$consultant->c_acc}}"  type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                                        Acccount Number <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_acc_num]" value="{{$consultant->c_acc_num}}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-right">
                                                                        Cheque Book Attachment <br>
                                                                        <input readonly class="form-control" name="chamberconsultants[{{ $index }}][c_cheque]" type="file" placeholder="..." style="width: 100%;">
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
                                                                        Notes <br> <textarea readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_notes]" type="text" placeholder="..." style="width: 100%;">{{$consultant->c_notes}}</textarea readonly>
                                                                    </div>
                                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                                        Attachment <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_attach]" value="{{$consultant->c_attach}}" type="file" placeholder="..." style="width: 100%;">
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
                                                                        Office No <br> <input readonly class="form-control" name="chamberconsultants[{{ $index }}][c_office]" value="{{$consultant->c_office}}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
                                                                        Building <br> <input readonly class="form-control"  name="chamberconsultants[{{ $index }}][c_building]" value="{{$consultant->c_building}}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Block <br> <input readonly class="form-control" name="chamberconsultants[{{ $index }}][c_block]" value="{{$consultant->c_block}}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
                                                                        Area <br> <input readonly class="form-control"  name="chamberconsultants[{{ $index }}][c_area]" value="{{$consultant->c_area}}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        City <br> <input readonly class="form-control" name="chamberconsultants[{{ $index }}][c_city]" value="{{$consultant->c_city}}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
                                                                        Photograph of Location <br> <input readonly class="form-control" name="chamberconsultants[{{ $index }}][c_loc]" value="{{$consultant->c_loc}}" type="file" placeholder="..." style="width: 100%;">
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
                                                                        Email <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_a_email]" value="{{$consultant->c_a_email}}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
                                                                        Website <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_website]" value="{{$consultant->c_website}}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Pin location <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_pin]" value="{{$consultant->c_pin}}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
                                                                        Google Map <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_map]" value="{{$consultant->c_map}}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Notes <br> <textarea readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_ex_notes]" type="text" placeholder="..." style="width: 100%;">{{$consultant->c_ex_notes}}</textarea readonly>
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
                                                                        Attachments <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_ex_attach]" value="{{$consultant->c_ex_attach}}" type="file" placeholder="..." style="width: 100%;">
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
                                        </div>
                                        
                                    </div>
                                    <!--Address Details-->
                                    <div class="tab-pane fade show m-3" style="opacity: 90%;"
                                        id="address" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="col-lg-6 spacing-left">
                                            <h5>Address</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Office No <br> <input readonly class="form-control" name="a_office" value="{{$chambers->chamber_a_office}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Building <br> <input readonly class="form-control" name="a_build" value="{{$chambers->chamber_a_build}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Block <br> <input readonly class="form-control" name="a_block" value="{{$chambers->chamber_a_block}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Area <br> <input readonly class="form-control" name="a_area" value="{{$chambers->chamber_a_area}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    City <br> <input readonly class="form-control" name="a_city" value="{{$chambers->chamber_a_city}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Photograph of Building <br> <input readonly class="form-control" id="" name="a_photo" value="{{$chambers->chamber_a_photo}}" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="image-preview42" id="imagePreview42">
                                                            @if($chambers->chamber_a_photo)
                                                            <img src="{{ asset($chambers->chamber_a_photo) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Email <br> <input readonly class="form-control" id="" name="a_email" value="{{$chambers->chamber_a_email}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Website <br> <input readonly class="form-control" id="" name="a_website" value="{{$chambers->chamber_a_website}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Pin location <br> <input readonly class="form-control" id="" name="a_pin" value="{{$chambers->chamber_a_pin}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    GPS <br> <input readonly class="form-control" id="" name="a_gps" value="{{$chambers->chamber_a_gps}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Notes <br> <textarea readonly class="form-control" id="" name="a_notes"  type="text" placeholder="..." style="width: 100%;">{{$chambers->chamber_a_notes}}</textarea readonly>
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Attachments <br> <input readonly class="form-control" id="" name="a_attach" value="{{$chambers->chamber_a_attach}}" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="image-preview42" id="imagePreview42">
                                                            @if($chambers->chamber_a_attach)
                                                            <img src="{{ asset($chambers->chamber_a_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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

                                    <div class="col-lg-12" id="authority_add_fields">
                                        
                                        <div id="authorityAccordion">
                                            @foreach ($chambers->chamberissuings as $index => $issuing)
                                                <div class="accordion-item" id="authorityItem{{ $index + 1 }}">
                                                    <h2 class="accordion-header" id="authorityHeading{{ $index + 1 }}">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#authorityCollapse{{ $index + 1 }}" aria-expanded="true" aria-controls="authorityCollapse{{ $index + 1 }}">
                                                            Authority Entry {{ $index + 1 }}
                                                        </button>
                                                    </h2>
                                                    <div id="authorityCollapse{{ $index + 1 }}" class="accordion-collapse collapse show" aria-labelledby="authorityHeading{{ $index + 1 }}" data-bs-parent="#authorityAccordion">
                                                        <div class="accordion-body">
                                                            <input readonly type="hidden" name="chamberissuings[{{ $index }}][i_id]" value="{{ $issuing->id }}">
                                                            <div class="row mb-2">
                                                                <div class="col-lg-3 spacing-right">
                                                                    Concerned Officer Name  <br> <input readonly class="form-control"  value="{{ $issuing->cofficer_name }}" id="head_office_name" name="chamberissuings[{{ $index }}][cofficer_name]" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-left spacing-right">
                                                                    Designation <br> <input readonly class="form-control" id="head_office_email" value="{{ $issuing->cofficer_desig }}" name="chamberissuings[{{ $index }}][cofficer_desig]" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    PTCL Number <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[{{ $index }}][cofficer_ptcl]" value="{{ $issuing->cofficer_ptcl }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Cell Number <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[{{ $index }}][cofficer_cell]" value="{{ $issuing->cofficer_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Email <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[{{ $index }}][cofficer_email]" value="{{ $issuing->cofficer_email }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Website <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[{{ $index }}][cofficer_website]" value="{{ $issuing->cofficer_website }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Visiting Card Front <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[{{ $index }}][cofficer_front]" value="{{ $issuing->cofficer_front }}" type="file" placeholder="..." style="width: 100%;">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        <!-- Image Preview Biometric -->
                                                                        <div class="image-preview42" id="imagePreview42">
                                                                            @if($issuing->cofficer_front)
                                                                            <img src="{{ asset($issuing->cofficer_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                            @else
                                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 spacing-right spacing-left">
                                                                    Visiting Card Back <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[{{ $index }}][cofficer_back]" value="{{ $issuing->cofficer_back }}" type="file" placeholder="..." style="width: 100%;">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        <!-- Image Preview Biometric -->
                                                                        <div class="image-preview42" id="imagePreview42">
                                                                            @if($issuing->cofficer_back)
                                                                            <img src="{{ asset($issuing->cofficer_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                            @else
                                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Notes <br> <textarea readonly class="form-control" id="" name="chamberissuings[{{ $index }}][cofficer_notes]" type="text" placeholder="..." style="width: 100%;">{{ $issuing->cofficer_notes }}</textarea readonly>
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                                        Attachment <br> <input readonly class="form-control" id="head_office_email" name="chamberissuings[{{ $index }}][cofficer_attach]" value="{{ $issuing->cofficer_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                                        <div class="col-lg-5 spacing-right">
                                                                        <!-- Image Preview Biometric -->
                                                                            <div class="image-preview42" id="imagePreview42">
                                                                                @if($issuing->cofficer_attach)
                                                                                <img src="{{ asset($issuing->cofficer_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                @else
                                                                                <span class="image-preview__default-text42">Image Preview</span>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h5>Details of Secretary Journal</h5>
                                                            <div class="row mb-2">
                                                                <div class="col-lg-3 spacing-right">
                                                                    Concerned Officer Name  <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[{{ $index }}][sj_name]" value="{{ $issuing->sj_name }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-left spacing-right">
                                                                    Designation <br> <input readonly class="form-control" id="head_office_email" name="chamberissuings[{{ $index }}][sj_desig]" value="{{ $issuing->sj_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    PTCL Number <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[{{ $index }}][sj_ptcl]" value="{{ $issuing->sj_ptcl }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Cell Number <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[{{ $index }}][sj_cell]" value="{{ $issuing->sj_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Email <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[{{ $index }}][sj_email]" value="{{ $issuing->sj_email }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Website <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[{{ $index }}][sj_web]" value="{{ $issuing->sj_web }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-lg-3 spacing-right">
                                                                    Visiting Card Front <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[{{ $index }}][sj_front]" value="{{ $issuing->sj_front }}" type="file" placeholder="..." style="width: 100%;">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        <!-- Image Preview Biometric -->
                                                                        <div class="image-preview42" id="imagePreview42">
                                                                            @if($issuing->sj_front)
                                                                            <img src="{{ asset($issuing->sj_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                            @else
                                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 spacing-right spacing-left">
                                                                    Visiting Card Back <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[{{ $index }}][sj_back]" value="{{ $issuing->sj_back }}" type="file" placeholder="..." style="width: 100%;">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        <!-- Image Preview Biometric -->
                                                                        <div class="image-preview42" id="imagePreview42">
                                                                            @if($issuing->sj_back)
                                                                            <img src="{{ asset($issuing->sj_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                            @else
                                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Notes <br> <textarea readonly class="form-control" id="" name="chamberissuings[{{ $index }}][sj_notes]" type="text" placeholder="..." style="width: 100%;">{{ $issuing->sj_notes }}</textarea readonly>
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                                        Attachment <br> <input readonly class="form-control" id="head_office_email" name="chamberissuings[{{ $index }}][sj_attach]" value="{{ $issuing->sj_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                                        <div class="col-lg-5 spacing-right">
                                                                            <!-- Image Preview Biometric -->
                                                                            <div class="image-preview42" id="imagePreview42">
                                                                                @if($issuing->sj_attach)
                                                                                <img src="{{ asset($issuing->sj_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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
                                    </div>
                                    
                                    
                                    </div>
                                    <!--Renewals Details-->
                                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="renewals"
                                        role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <h5>Application : </h5>
                                        <div class="col-lg-12">
                                            <div class="row mb-2">
                                                <div class="col-lg-4 spacing-right">
                                                    Initiating Date  <br> <input readonly class="form-control" id="" name="application_date" value="{{ $chambers->chamber_application_date }}" type="date" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-left spacing-right">
                                                    Request Letter Attachment <br> <input readonly class="form-control" id="" name="application_letter" value="{{ $chambers->chamber_application_letter }}" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="image-preview42" id="imagePreview42">
                                                            @if($chambers->chamber_application_letter)
                                                            <img src="{{ asset($chambers->chamber_application_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Notes <br> <textarea readonly class="form-control" id="" name="application_notes" type="text" placeholder="..." style="width: 100%;">{{ $chambers->chamber_application_notes }}</textarea readonly>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Attachments <br> <input readonly class="form-control" id="" name="application_attach" value="{{ $chambers->chamber_application_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="image-preview42" id="imagePreview42">
                                                            @if($chambers->chamber_application_attach)
                                                            <img src="{{ asset($chambers->chamber_application_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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
                                                    Corespondence Date  <br> <input readonly class="form-control" id="" name="corespondence_date" value="{{ $chambers->chamber_corespondence_date }}" type="date" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Corespondence Letter Attachment  <br> <input readonly class="form-control" id="" name="corespondence_letter" value="{{ $chambers->chamber_corespondence_letter }}" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="image-preview42" id="imagePreview42">
                                                            @if($chambers->chamber_corespondence_letter)
                                                            <img src="{{ asset($chambers->chamber_corespondence_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Notes <br> <textarea readonly class="form-control" id="" name="corespondence_notes" type="text" placeholder="..." style="width: 100%;">{{ $chambers->chamber_corespondence_notes }}</textarea readonly>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Attachments <br> <input readonly class="form-control" id="" name="corespondence_attach" value="{{ $chambers->chamber_corespondence_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="image-preview42" id="imagePreview42">
                                                            @if($chambers->chamber_corespondence_attach)
                                                            <img src="{{ asset($chambers->chamber_corespondence_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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
                                                    Approval Date  <br> <input readonly class="form-control" id="" name="approval_date" value="{{ $chambers->chamber_approval_date }}" type="date" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Approval Letter Attachment  <br> <input readonly class="form-control" id="" name="approval_letter" value="{{ $chambers->chamber_approval_letter }}" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="image-preview42" id="imagePreview42">
                                                            @if($chambers->chamber_approval_letter)
                                                            <img src="{{ asset($chambers->chamber_approval_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Notes <br> <textarea readonly class="form-control" id="" name="approval_notes" type="text" placeholder="..." style="width: 100%;">{{ $chambers->chamber_approval_notes }}</textarea readonly>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Attachments <br> <input readonly class="form-control" id="" name="approval_attach" value="{{ $chambers->chamber_approval_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="image-preview42" id="imagePreview42">
                                                            @if($chambers->chamber_approval_attach)
                                                            <img src="{{ asset($chambers->chamber_approval_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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
                                            <div id="financesAccordion">
                                                @foreach ($chambers->chamberrenewals as $index => $renewal)
                                                    <div class="accordion-item" id="financeItem{{ $index + 1 }}">
                                                        <h2 class="accordion-header" id="financeHeading{{ $index + 1 }}">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#financeCollapse{{ $index + 1 }}" aria-expanded="true" aria-controls="financeCollapse{{ $index + 1 }}">
                                                                Finance Entry {{ $index + 1 }}
                                                            </button>
                                                        </h2>
                                                        <div id="financeCollapse{{ $index + 1 }}" class="accordion-collapse collapse show" aria-labelledby="financeHeading{{ $index + 1 }}" data-bs-parent="#financesAccordion">
                                                            <div class="accordion-body">
                                                                <div>
                                                                    <input readonly type="hidden" name="chamberrenewals[{{ $index }}][r_id]" value="{{ $renewal->id }}">
                                                                    
                                                                    <div class="col-lg-6 spacing-right mb-3" id="finance_add_fields">
                                                                        Category <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][fee_category]" value="{{ $renewal->fee_category }}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <h5>Withdrawal From:</h5>
                                                                    <div class="col-lg-12">
                                                                        <div class="row mb-2">
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Bank Name  <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][wf_bank_name]" value="{{ $renewal->wf_bank_name }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Cheque/Instrument No. <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][wf_cheque]" value="{{ $renewal->wf_cheque }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Cheque/Instrument<br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][wf_cheque_attach]" value="{{ $renewal->wf_cheque_attach }}" type="file" placeholder="..." style="width: 100%;">
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
                                                                                Amount in figures <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][wf_amount]" value="{{ $renewal->wf_amount }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Notes <br> <textarea readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][wf_notes]" type="text" placeholder="..." style="width: 100%;">{{ $renewal->wf_notes }}</textarea readonly>
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Attachments <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][wf_attach]" value="{{ $renewal->wf_attach }}" type="file"   placeholder="..." style="width: 100%;">
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
                                                                                Name  <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][wb_name]" value="{{ $renewal->wb_name }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Employee ID <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][wb_id]" value="{{ $renewal->wb_id }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Designation <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][wb_desig]" value="{{ $renewal->wb_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Cell Number <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][wb_cell]" value="{{ $renewal->wb_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Email ID <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][wb_email]" value="{{ $renewal->wb_email }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Notes <br> <textarea readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][wb_attach]" type="text" placeholder="..." style="width: 100%;">{{ $renewal->wb_notes }}</textarea readonly>
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Attachments <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][wb_attach]" value="{{ $renewal->wb_attach }}" type="file"   placeholder="..." style="width: 100%;">
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
                                                                                Fees  <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][fee]" value="{{ $renewal->fee }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Date of Renewal Fee Deposit <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][fee_date]" value="{{ $renewal->fee_date }}" type="date" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Name of bank<br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][fee_bank]" value="{{ $renewal->fee_bank }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Instrument Number <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][fee_ins]" value="{{ $renewal->fee_ins }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Deposit Slip Attachment <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][fee_slip]" value="{{ $renewal->fee_slip }}" type="file"   placeholder="..." style="width: 100%;">
                                                                                <div class="col-lg-5 spacing-right">
                                                                                    <!-- Image Preview Biometric -->
                                                                                    <div class="image-preview42" id="imagePreview42">
                                                                                        @if($renewal->fee_slip)
                                                                                        <img src="{{ asset($renewal->fee_slip) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                        @else
                                                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Notes <br> <textarea readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][fee_notes]" type="text" placeholder="..." style="width: 100%;">{{ $renewal->fee_notes }}</textarea readonly>
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Attachments <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][fee_attach]" value="{{ $renewal->fee_attach }}" type="file"   placeholder="..." style="width: 100%;">
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
                                                                                Name  <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][db_name]" value="{{ $renewal->db_name }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Employee ID <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][db_id]" value="{{ $renewal->db_id }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">    
                                                                                Designation <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][db_desig]" value="{{ $renewal->db_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Cell Number <br> <input readonly class="form-control" id=""name="chamberrenewals[{{ $index }}][db_cell]" value="{{ $renewal->db_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Email ID <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][db_email]" value="{{ $renewal->db_email }}" type="text" placeholder="..." style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-left spacing-right">
                                                                                Notes <br> <textarea readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][db_notes]" type="text" placeholder="..." style="width: 100%;">{{ $renewal->db_notes }}</textarea readonly>
                                                                            </div>
                                                                            <div class="col-lg-4 spacing-right">
                                                                                Attachments <br> <input readonly class="form-control" id="" name="chamberrenewals[{{ $index }}][db_attach]" value="{{ $renewal->db_attach }}" type="file"   placeholder="..." style="width: 100%;">
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
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <!--Laws-->
                                    <div class="tab-pane fade m-3" style="opacity: 90%;"
                                    id="law" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <div class="col-lg-4 spacing-right">
                                            Notes <br> <textarea readonly class="form-control" id="" name="chamber_laws_notes" type="text" placeholder="..." style="width: 100%;">{{$chambers->chamber_laws_notes}}</textarea readonly>
                                                
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right">
                                            Attachments <br> <input readonly class="form-control" id="" name="chamber_laws_attach" value="{{$chambers->chamber_laws_attach}}" type="file" placeholder="..." style="width: 100%;">
                                                <div class="col-lg-5 spacing-right">
                                                    <!-- Image Preview Biometric -->
                                                    <div class="image-preview42" id="imagePreview42">
                                                        @if($chambers->chamber_laws_attach)
                                                        <img src="{{ asset($chambers->chamber_laws_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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
    
            const element = document.getElementById('chamber_form');
            if (element) {
                const options = {
                    margin: 1,
                    filename: 'chamber_information.pdf',
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
                console.error('Element with ID "chamber_form" not found.');
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
    
            const element = document.getElementById('chamber_form');
            if (element) {
                const options = {
                    margin: 1,
                    filename: 'chamber_information.pdf',
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
                console.error('Element with ID "chamber_form" not found.');
                button.textContent = 'Failed to Generate PDF';
            }
        } else {
            console.error('Modal or input fields not found.');
        }
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




<script>
    // Counter to track the number of consultant entries
    let consultantCount = {{ count($chambers->chamberconsultants) }};

    // Function to add a new consultant entry
    function addConsultantEntry() {
        consultantCount++; // Increment the counter
        const newEntryHtml = `
            <div class="accordion-item" id="consultantItem${consultantCount}">
                <h2 class="accordion-header" id="consultantHeading${consultantCount}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#consultantCollapse${consultantCount}" aria-expanded="true" aria-controls="consultantCollapse${consultantCount}">
                        Consultant Entry ${consultantCount}
                    </button>
                </h2>
                <div id="consultantCollapse${consultantCount}" class="accordion-collapse collapse show" aria-labelledby="consultantHeading${consultantCount}" data-bs-parent="#consultantAccordion">
                    <div class="accordion-body">

                        <input readonly type="hidden" name="chamberconsultants[${consultantCount - 1}][c_id]" value="">
                        <div class=" row mb-2">
                            
                            <div class="col-lg-4 spacing-right">
                                <input readonly class="form-control" name="chamberconsultants[{{ $index }}][c_name]" name="chamberconsultants[${consultantCount - 1}][c_name]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Designation <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_desig]" name="chamberconsultants[${consultantCount - 1}][c_desig]" value=""  type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Organization <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_org]" name="chamberconsultants[${consultantCount - 1}][c_org]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Cell Number <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_cell]" name="chamberconsultants[${consultantCount - 1}][c_cell]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left">
                                Email <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_email]" name="chamberconsultants[${consultantCount - 1}][c_email]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left">
                                Consultancy Fees <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_fee]" name="chamberconsultants[${consultantCount - 1}][c_fee]" value=""  type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <h5>Consultant Bank Details :</h5>
                        <div class=" row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Bank Name  <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_bank]" name="chamberconsultants[${consultantCount - 1}][c_bank]" value=""  type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Acccount Title <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_acc]" name="chamberconsultants[${consultantCount - 1}][c_acc]" value=""  type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Acccount Number <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_acc_num]" name="chamberconsultants[${consultantCount - 1}][c_acc_num]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Cheque Book Attachment <br>
                                <input readonly class="form-control" name="chamberconsultants[{{ $index }}][c_cheque]" name="chamberconsultants[${consultantCount - 1}][c_cheque]" type="file" placeholder="..." style="width: 100%;">
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
                                Notes <br> <textarea readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_notes]" name="chamberconsultants[${consultantCount - 1}][c_notes]" type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Attachment <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_attach]" name="chamberconsultants[${consultantCount - 1}][c_attach]" value="" type="file" placeholder="..." style="width: 100%;">
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
                                Office No <br> <input readonly class="form-control" name="chamberconsultants[{{ $index }}][c_office]" name="chamberconsultants[${consultantCount - 1}][c_office]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Building <br> <input readonly class="form-control"  name="chamberconsultants[{{ $index }}][c_building]" name="chamberconsultants[${consultantCount - 1}][c_building]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Block <br> <input readonly class="form-control" name="chamberconsultants[{{ $index }}][c_block]" name="chamberconsultants[${consultantCount - 1}][c_block]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Area <br> <input readonly class="form-control"  name="chamberconsultants[{{ $index }}][c_area]" name="chamberconsultants[${consultantCount - 1}][c_area]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                City <br> <input readonly class="form-control" name="chamberconsultants[{{ $index }}][c_city]" name="chamberconsultants[${consultantCount - 1}][c_city]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Photograph of Location <br> <input readonly class="form-control" name="chamberconsultants[{{ $index }}][c_loc]" name="chamberconsultants[${consultantCount - 1}][c_loc]" value="" type="file" placeholder="..." style="width: 100%;">
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
                                Email <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_a_email]" name="chamberconsultants[${consultantCount - 1}][c_a_email]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Website <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_website]" name="chamberconsultants[${consultantCount - 1}][c_website]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Pin location <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_pin]" name="chamberconsultants[${consultantCount - 1}][c_pin]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Google Map <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_map]" name="chamberconsultants[${consultantCount - 1}][c_map]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Notes <br> <textarea readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_ex_notes]" name="chamberconsultants[${consultantCount - 1}][c_ex_notes]" type="text" placeholder="..." style="width: 100%;">{{$consultant->c_ex_notes}}</textarea readonly>
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Attachments <br> <input readonly class="form-control" id="" name="chamberconsultants[{{ $index }}][c_ex_attach]" name="chamberconsultants[${consultantCount - 1}][c_ex_attach]" value="" type="file" placeholder="..." style="width: 100%;">
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
        // Append the new entry HTML to the consultant accordion
        $('#consultantAccordion').append(newEntryHtml);
    }

    // Add event listener to the "Add More Consultant Entry" button
    $('#addConsultant').on('click', function() {
        addConsultantEntry();
    });
</script>

<script>
    // Counter to track the number of authority entries
    let authorityCount = {{ count($chambers->chamberissuings) }};

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
                        <input readonly type="hidden" name="chamberissuings[${authorityCount - 1}][i_id]" value="">
                        <div class="row mb-2">
                            <div class="col-lg-3 spacing-right">
                                Concerned Officer Name  <br> <input readonly class="form-control"  value="" id="head_office_name" name="chamberissuings[${authorityCount - 1}][cofficer_name]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-left spacing-right">
                                Designation <br> <input readonly class="form-control" id="head_office_email" value="" name="chamberissuings[${authorityCount - 1}][cofficer_desig]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                                PTCL Number <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[${authorityCount - 1}][cofficer_ptcl]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                                Cell Number <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[${authorityCount - 1}][cofficer_cell]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                                Email <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[${authorityCount - 1}][cofficer_email]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                                Website <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[${authorityCount - 1}][cofficer_website]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                                Visiting Card Front <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[${authorityCount - 1}][cofficer_front]" value="" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($issuing->cofficer_front)
                                        <img src="{{ asset($issuing->cofficer_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 spacing-right spacing-left">
                                Visiting Card Back <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[${authorityCount - 1}][cofficer_back]" value="" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($issuing->cofficer_back)
                                        <img src="{{ asset($issuing->cofficer_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Notes <br> <textarea readonly class="form-control" id="" name="chamberissuings[${authorityCount - 1}][cofficer_notes]" type="text" placeholder="..." style="width: 100%;">{{ $issuing->cofficer_notes }}</textarea readonly>
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Attachment <br> <input readonly class="form-control" id="head_office_email" name="chamberissuings[${authorityCount - 1}][cofficer_attach]" value="" type="file" placeholder="..." style="width: 100%;">
                                    <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                        <div class="image-preview42" id="imagePreview42">
                                            @if($issuing->cofficer_attach)
                                            <img src="{{ asset($issuing->cofficer_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5>Details of Secretary Journal</h5>
                        <div class="row mb-2">
                            <div class="col-lg-3 spacing-right">
                                Concerned Officer Name  <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[${authorityCount - 1}][sj_name]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-left spacing-right">
                                Designation <br> <input readonly class="form-control" id="head_office_email" name="chamberissuings[${authorityCount - 1}][sj_desig]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                                PTCL Number <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[${authorityCount - 1}][sj_ptcl]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                                Cell Number <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[${authorityCount - 1}][sj_cell]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                                Email <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[${authorityCount - 1}][sj_email]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                                Website <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[${authorityCount - 1}][sj_web]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                                Visiting Card Front <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[${authorityCount - 1}][sj_front]" value="" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($issuing->sj_front)
                                        <img src="{{ asset($issuing->sj_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 spacing-right spacing-left">
                                Visiting Card Back <br> <input readonly class="form-control" id="head_office_name" name="chamberissuings[${authorityCount - 1}][sj_back]" value="" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($issuing->sj_back)
                                        <img src="{{ asset($issuing->sj_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Notes <br> <textarea readonly class="form-control" id="" name="chamberissuings[${authorityCount - 1}][sj_notes]" type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Attachment <br> <input readonly class="form-control" id="head_office_email" name="chamberissuings[${authorityCount - 1}][sj_attach]" value="" type="file" placeholder="..." style="width: 100%;">
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="image-preview42" id="imagePreview42">
                                            @if($issuing->sj_attach)
                                            <img src="{{ asset($issuing->sj_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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
        // Append the new entry HTML to the authority accordion
        $('#authorityAccordion').append(newEntryHtml);
    }

    // Add event listener to the "Add More Authority Entry" button
    $('#addAuthority').on('click', function() {
        addAuthorityEntry();
    });
</script>

<script>
    // Counter to track the number of finance entries
    let financeCount = {{ count($chambers->chamberrenewals) }};

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
                <div id="financeCollapse${financeCount}" class="accordion-collapse collapse show" aria-labelledby="financeHeading${financeCount}" data-bs-parent="#financesAccordion">
                    <div class="accordion-body">
                        <div>
                            <input readonly type="hidden" name="chamberrenewals[${financeCount - 1}][r_id]" value="">
                            <div class="col-lg-6 spacing-right mb-3" id="finance_add_fields">
                                Category <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][fee_category]" name="chamberrenewals[{{ $index }}][fee_category]" value="{{ $renewal->fee_category }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <h5>Withdrawal From:</h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Bank Name  <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][wf_bank_name]" name="chamberrenewals[{{ $index }}][wf_bank_name]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Cheque/Instrument No. <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][wf_cheque]" name="chamberrenewals[{{ $index }}][wf_cheque]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Cheque/Instrument<br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][wf_cheque_attach]" name="chamberrenewals[{{ $index }}][wf_cheque_attach]" value="" type="file" placeholder="..." style="width: 100%;">
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
                                        Amount in figures <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][wf_amount]" name="chamberrenewals[{{ $index }}][wf_amount]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Notes <br> <textarea readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][wf_notes]" name="chamberrenewals[{{ $index }}][wf_notes]" type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Attachments <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][wf_attach]" name="chamberrenewals[{{ $index }}][wf_attach]" value="" type="file"   placeholder="..." style="width: 100%;">
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
                                        Name  <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][wb_name]" name="chamberrenewals[{{ $index }}][wb_name]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Employee ID <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][wb_id]" name="chamberrenewals[{{ $index }}][wb_id]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Designation <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][wb_desig]" name="chamberrenewals[{{ $index }}][wb_desig]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Cell Number <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][wb_cell]" name="chamberrenewals[{{ $index }}][wb_cell]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Email ID <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][wb_email]" name="chamberrenewals[{{ $index }}][wb_email]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Notes <br> <textarea readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][wb_notes]" name="chamberrenewals[{{ $index }}][wb_notes]" type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][wb_attach]" name="chamberrenewals[{{ $index }}][wb_attach]" value="" type="file"   placeholder="..." style="width: 100%;">
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
                                        Fees  <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][fee]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Date of Renewal Fee Deposit <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][fee_date]" value="" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Name of bank<br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][fee_bank]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Instrument Number <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][fee_ins]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Deposit Slip Attachment <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][fee_slip]" value="" type="file"   placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($renewal->fee_slip)
                                                <img src="{{ asset($renewal->fee_slip) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][fee_notes]" name="chamberrenewals[{{ $index }}][fee_notes]" type="text" placeholder="..." style="width: 100%;">{{ $renewal->fee_notes }}</textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Attachments <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][fee_attach]" name="chamberrenewals[{{ $index }}][fee_attach]" value="" type="file"   placeholder="..." style="width: 100%;">
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
                                        Name  <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][db_name]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Employee ID <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][db_id]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">    
                                        Designation <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][db_desig]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Cell Number <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][db_cell]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Email ID <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][db_email]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Notes <br> <textarea readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][db_notes]" type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input readonly class="form-control" id="" name="chamberrenewals[${financeCount - 1}][db_attach]"  value="" type="file"   placeholder="..." style="width: 100%;">
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
            </div>
        `;
        // Append the new entry HTML to the finance accordion
        $('#financesAccordion').append(newEntryHtml);
    }

    // Add event listener to the "Add More Finance Entry" button
    $('#addFinance').on('click', function() {
        addFinanceEntry();
    });
</script>



</body>

 

</html>
