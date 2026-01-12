@include('layouts.header')

@yield('main')


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
    <!-- <div class="modal fade" id="add_user">  -->
    <!-- <div class="modal-dialog" role="document" style="max-width: 75%;"> -->
    <!-- <div class="modal-content"> -->
    <div class="modal-header border-0">
          <div style="display:flex; column-gap:10px; align-items:center">
             <button type="button" class="btn btn-link" onclick="history.back()">
                <i class="bi bi-arrow-left"></i>
            </button>
     <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;"><i>Regulator View</i>
        </div>
        
        </h4>

    </div>

    <section>
        <button class="mb-4" id="download-pdf">Download PDF</button>
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
            <input type="text" id="subjectInput" placeholder="Subject">

            <label for="bodyInput">Body:</label>
            <textarea id="bodyInput" rows="8" placeholder="Body"></textarea>

            <button id="sendEmailBtn" class="mt-2" style="width: 20%; display: block; margin: 0 auto;">Send</button>
            </div>
        </div>
        <form id="regulator_form">
            <div class="row">

                <div class="row mb-2" style="margin-left: 20px;">
                    <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
                      <h5>Regulator Activation Status</h5>

                      <div class="form-check form-check-inline" style="margin-right: 90px;">
                        <input class="form-check-input mr-2" type="radio" name="regulator_activation" {{ $regulators->regulator_activation == '1' ? 'checked' : '' }} value="1" id="activeRadio">
                        <label class="form-check-label" for="activeRadio">Active</label>

                        <input class="form-check-input ml-3 mr-2" type="radio" name="regulator_activation" {{ $regulators->regulator_activation == '0' ? 'checked' : '' }} value="0" id="inactiveRadio">
                        <label class="form-check-label" for="inactiveRadio">Inactive</label>
                      </div>
                    </div>
                </div>

            </div>
            <div class=" row main-content div">
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Regulatory ID <br> <input readonly class="form-control mt-1" id="head_office_name" name="reg_id"
                               value="{{ $regulators->reg_id }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Type <br> <input readonly class="form-control mt-1" id="head_office_name" name="reg_type" value="{{ $regulators->reg_type }}" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right ">
                            Jurisdiction <br> <input readonly class="form-control mt-1" id="head_office_name" name="jurisdiction"
                            value="{{ $regulators->jurisdiction }}"    type="text" placeholder="..." style="width: 100%; ">
                        </div>
                        <div class="col-lg-4  spacing-right mt-3">
                            Department <br> <input readonly class="form-control mt-1" id="head_office_email" name="deptartment"
                            value="{{ $regulators->deptartment }}"    type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4  spacing-right mt-3">
                            Section <br> <input readonly class="form-control mt-1" id="head_office_email" name="section"
                            value="{{ $regulators->section }}"    type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            License No <br> <input readonly class="form-control mt-1" id="head_office_name" name="license_no"
                            value="{{ $regulators->license_no }}"    type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Document No <br> <input readonly class="form-control mt-1" id="head_office_name" name="document_no"
                            value="{{ $regulators->document_no }}"    type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Latest License Attachment <br> <input readonly class="form-control mt-1" id="head_office_name"
                            value="{{ $regulators->license_attach }}"    name="license_attach[]" type="file" placeholder="..." style="width: 100%;" multiple>
                        </div>

                        <div class="col-lg-4 spacing-right mt-3">
                            Validity from : <br> <input readonly class="form-control mt-1" id="head_office_name" name="validity_from"
                            value="{{ $regulators->validity_from }}"    type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Expiry Date <br> <input readonly class="form-control mt-1" id="head_office_name" name="expiry_date"
                            value="{{ $regulators->expiry_date }}"    type="date" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right mt-3">
                            Notes : <br> <textarea readonly class="form-control mt-1" id="head_office_name" name="notes"
                            type="text" placeholder="..." style="width: 100%;">{{ $regulators->notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Attachments <br> <input readonly class="form-control mt-1" id="head_office_name" name="attachments[]"
                            value="{{ $regulators->attachments }}"    type="file"  placeholder="..." style="width: 100%;">


                        </div>
                    </div>
                </div>

            </div>

            <h5>Operating License Details</h5>
            <!--Consultant Details-->
            <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="consultant" role="tabpanel"
                aria-labelledby="nav-home-tab">
                
                <div>
                    <div id="consultantsAccordion">
                        @foreach ($regulators->operatingconsultants as $index => $op_consultant)
                            <div class="accordion-item" id="consultantItem{{ $index + 1 }}">
                                <h2 class="accordion-header" id="consultantHeading{{ $index + 1 }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#consultantCollapse{{ $index + 1 }}" aria-expanded="true" aria-controls="consultantCollapse{{ $index + 1 }}">
                                        Consultant Entry {{ $index + 1 }}
                                    </button>
                                </h2>
                                <div id="consultantCollapse{{ $index + 1 }}" class="accordion-collapse collapse show" aria-labelledby="consultantHeading{{ $index + 1 }}" data-bs-parent="#consultantsAccordion">
                                    <div class="accordion-body">
                                        <div class=" row mb-2">
                                            <input readonly type="hidden" name="operatingconsultants[{{ $index }}][opc_id]" value="{{ $op_consultant->id }}">
                                            <div class="col-lg-4 spacing-right">
                                                Consultant Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingconsultants[{{ $index }}][oper_name]" value="{{ $op_consultant->oper_name }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right">
                                                Designation <br> <input readonly class="form-control mt-1" id="head_office_email"
                                                name="operatingconsultants[{{ $index }}][oper_desig]" value="{{ $op_consultant->oper_desig }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Organization <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingconsultants[{{ $index }}][oper_org]" value="{{ $op_consultant->oper_org }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right mt-3">
                                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingconsultants[{{ $index }}][oper_cell]" value="{{ $op_consultant->oper_cell }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left mt-3">
                                                Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingconsultants[{{ $index }}][oper_email]" value="{{ $op_consultant->oper_email }}" type="text" placeholder="..." style="width: 103%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right mt-3">
                                                Consultancy Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingconsultants[{{ $index }}][oper_fee]" value="{{ $op_consultant->oper_fee }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right mt-3">
                                                Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingconsultants[{{ $index }}][oper_front]" value="{{ $op_consultant->oper_front }}" type="file" placeholder="..." style="width: 100%;" multiple>
                                            </div>
                                            <div class="col-lg-4 spacing-right spacing-left mt-3">
                                                Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingconsultants[{{ $index }}][oper_back]" value="{{ $op_consultant->oper_back }}" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <h5>Consultant Bank Details :</h5>
                                        <div class=" row ">
                                            <div class="col-lg-4 spacing-right">
                                                Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingconsultants[{{ $index }}][oper_bank]" value="{{ $op_consultant->oper_bank }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right">
                                                Account Title <br> <input readonly class="form-control mt-1" id="head_office_email"
                                                name="operatingconsultants[{{ $index }}][oper_account]" value="{{ $op_consultant->oper_account }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right">
                                                Account Number <br> <input readonly class="form-control mt-1" id="head_office_email"
                                                name="operatingconsultants[{{ $index }}][oper_acc_no]" value="{{ $op_consultant->oper_acc_no }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right mt-3">
                                                Any Agreed Financials <br> <input readonly class="form-control mt-1"
                                                id="head_office_email" value="{{ $op_consultant->oper_fin }}" name="operatingconsultants[{{ $index }}][oper_fin]" type="file" placeholder="..."
                                                style="width: 100%;">
                                            </div>
    
                                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                Notes <br> <textarea readonly class="form-control mt-1" name="operatingconsultants[{{ $index }}][oper_notes]"
                                                    type="text" placeholder="..." style="width: 100%;">{{ $op_consultant->oper_notes }}</textarea readonly>
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                Attachment <br> <input readonly class="form-control mt-1" value="{{ $op_consultant->oper_attachments }}" id="head_office_email"
                                                name="operatingconsultants[{{ $index }}][oper_attachments]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <h5>Consultant Address</h5>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right ">
                                                Office No <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                                name="operatingconsultants[{{ $index }}][oper_office]" value="{{ $op_consultant->oper_office }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Building <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                                name="operatingconsultants[{{ $index }}][oper_build]" value="{{ $op_consultant->oper_build }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-lg-5 spacing-right mt-2">
                                                Block <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                                name="operatingconsultants[{{ $index }}][oper_block]" value="{{ $op_consultant->oper_block }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left mt-2">
                                                Area <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                                name="operatingconsultants[{{ $index }}][oper_area]" value="{{ $op_consultant->oper_area }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-lg-5 spacing-right mt-2">
                                                City <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                                name="operatingconsultants[{{ $index }}][oper_city]" value="{{ $op_consultant->oper_city }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left mt-2">
                                                Photograph of Building <br> <input readonly class="form-control mt-1" id=""
                                                name="operatingconsultants[{{ $index }}][oper_photo]" value="{{ $op_consultant->oper_photo }}" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5 spacing-right mt-2">
                                                Email <br> <input readonly class="form-control mt-1" value="{{ $op_consultant->oper_a_email }}" name="operatingconsultants[{{ $index }}][oper_a_email]" type="email"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left mt-2">
                                                Website <br> <input readonly class="form-control mt-1" value="{{ $op_consultant->oper_web }}" name="operatingconsultants[{{ $index }}][oper_web]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-lg-5 spacing-right mt-2">
                                                Pin location <br> <input readonly class="form-control mt-1" value="{{ $op_consultant->oper_pin }}" name="operatingconsultants[{{ $index }}][oper_pin]"
                                                    type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left mt-2">
                                                GPS <br> <input readonly class="form-control mt-1" value="{{ $op_consultant->oper_gps }}" name="operatingconsultants[{{ $index }}][oper_gps]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-lg-5 spacing-right mt-2">
                                                Notes <br> <textarea readonly class="form-control mt-1" name="operatingconsultants[{{ $index }}][oper_ex_notes]"
                                                    type="text" placeholder="..." style="width: 100%;">{{ $op_consultant->oper_ex_notes }}</textarea readonly>
                                            </div>
                                            <div class="col-lg-5 spacing-left mt-2">
                                                Attachments <br> <input readonly class="form-control mt-1" value="{{ $op_consultant->oper_ex_attach }}" name="operatingconsultants[{{ $index }}][oper_ex_attach]"
                                                type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                
                    <!-- Add More Button -->
                    {{-- <div class="row my-3">
                        <div class="col">
                            <button type="button" class="btn btn-primary" id="addConsultant" style="height:30px; width:200px;">Add More Consultant Entry</button>
                        </div>
                    </div> --}}
                </div>
                
            </div>
            <!--Address-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="address" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <div class="col-lg-6 spacing-left">
                    <h5>Home Department Address</h5>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right ">
                            Office No <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="oper_home_office" value="{{ $regulators->oper_home_office }}"  type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Building <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="oper_home_build" value="{{ $regulators->oper_home_build }}"  type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right mt-2">
                            Block <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="oper_home_block" value="{{ $regulators->oper_home_block }}"  type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Area <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="oper_home_area" value="{{ $regulators->oper_home_area }}"  type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right mt-2">
                            City <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="oper_home_city" value="{{ $regulators->oper_home_city }}"  type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Photograph of Building <br> <input readonly class="form-control mt-1" id=""
                            name="oper_home_photo" value="{{ $regulators->oper_home_photo }}"  type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->oper_home_photo)
                                    <img src="{{ asset($regulators->oper_home_photo) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right mt-2">
                            Email <br> <input readonly class="form-control mt-1" id="" name="oper_home_email"
                            value="{{ $regulators->oper_home_email }}"      placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Website <br> <input readonly class="form-control mt-1" id="" name="oper_home_web"
                            value="{{ $regulators->oper_home_web }}"     type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Pin location <br> <input readonly class="form-control" id="" name="oper_home_pin"
                            value="{{ $regulators->oper_home_pin }}"     type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            GPS <br> <input readonly class="form-control" id="" name="oper_home_gps" type="text"
                            value="{{ $regulators->oper_home_gps }}"     placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2 mt-2">
                        <div class="col-lg-5 spacing-right">
                            Notes <br> <textarea readonly class="form-control" id="head_office_name"
                                name="oper_home_notes" type="text" placeholder="..."
                                    style="width: 100%;">{{ $regulators->oper_home_notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Attachments <br> <input readonly class="form-control" id="head_office_email"
                            value="{{ $regulators->oper_home_attach }}"     name="oper_home_attach[]" type="file" placeholder="..." style="width: 100%;" multiple>
                                <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
                                    <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
                                        @if($regulators->oper_home_attach)
                                            @php
                                                $attachments = explode(',', $regulators->oper_home_attach);
                                            @endphp
                                            @foreach ($attachments as $attachment)
                                                <div style="padding: 10px;">
                                                    @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
                                                        <!-- Display Image -->
                                                        <img src="{{ asset($attachment) }}" alt="Image Preview" class="preview-image" style="height: 120px; width: 120px;">
                                                    @elseif (Str::endsWith($attachment, ['.pdf']))
                                                        <!-- Display PDF -->
                                                        <embed src="{{ asset($attachment) }}" type="application/pdf" class="preview-pdf" style="width:100px; height:100px;" />
                                                        <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download PDF</a>
                                                    @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
                                                        <!-- Display Excel Sheet -->
                                                        <div class="preview-excel" style="text-align: center;">
                                                            <p>Excel Sheet Name: {{ pathinfo($attachment)['basename'] }}</p>
                                                            <a href="{{ asset($attachment) }}">Download Excel Sheet</a>
                                                        </div>
                                                    @else
                                                        <span class="preview-default-text">Preview</span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        @else
                                            <span class="preview-default-text">No attachments found</span>
                                        @endif
                                    </div>
                                </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--Issuing Authority-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="issuing" role="tabpanel"
                aria-labelledby="nav-home-tab">

                <div class="col-lg-12" id="operating_authority_add_fields">
                    <!-- Existing operating authority entries -->
                    @foreach ($regulators->operatingissuings as $index => $op_issuing)
                    <div class="accordion-item" id="operatingAuthorityItem{{ $index }}">
                        <h2 class="accordion-header" id="operatingAuthorityHeading{{ $index }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#operatingAuthorityCollapse{{ $index }}" aria-expanded="true" aria-controls="operatingAuthorityCollapse{{ $index }}">
                                Operating Authority Entry {{ $index + 1 }}
                            </button>
                        </h2>
                        <div id="operatingAuthorityCollapse{{ $index }}" class="accordion-collapse collapse show" aria-labelledby="operatingAuthorityHeading{{ $index }}" data-bs-parent="#operatingAuthorityAccordion">
                            <div class="accordion-body">
                                <div class="row mb-2">
                                    <input readonly type="hidden" name="operatingissuings[{{ $index }}][opi_id]" value="{{ $op_issuing->id }}">
                                    <div class="col-lg-3 spacing-right">
                                        Concerned Officer Name <br> <input readonly class="form-control mt-1"
                                            name="operatingissuings[{{ $index }}][oper_iss_co_name]" value="{{ $op_issuing->oper_iss_co_name }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Designation <br> <input readonly class="form-control mt-1" id="oper_desig"
                                        name="operatingissuings[{{ $index }}][oper_iss_co_desig]" value="{{ $op_issuing->oper_iss_co_desig }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Department <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingissuings[{{ $index }}][oper_iss_co_dept]" value="{{ $op_issuing->oper_iss_co_dept }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Section <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingissuings[{{ $index }}][oper_iss_co_section]" value="{{ $op_issuing->oper_iss_co_section }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        PTCL Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingissuings[{{ $index }}][oper_iss_co_ptcl]" value="{{ $op_issuing->oper_iss_co_ptcl }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>

                                    <div class="col-lg-3 spacing-left mt-3">
                                        Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingissuings[{{ $index }}][oper_iss_co_cell]" value="{{ $op_issuing->oper_iss_co_cell }}" type="text" placeholder="..." style="width: 105%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingissuings[{{ $index }}][oper_iss_co_email]" value="{{ $op_issuing->oper_iss_co_email }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Website <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingissuings[{{ $index }}][oper_iss_co_web]" value="{{ $op_issuing->oper_iss_co_web }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingissuings[{{ $index }}][oper_iss_co_front]" value="{{ $op_issuing->oper_iss_co_front }}" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($op_issuing->oper_iss_co_front)
                                                <img src="{{ asset($op_issuing->oper_iss_co_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 spacing-right spacing-left mt-3">
                                        Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingissuings[{{ $index }}][oper_iss_co_back]" value="{{ $op_issuing->oper_iss_co_back }}" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($op_issuing->oper_iss_co_back)
                                                <img src="{{ asset($op_issuing->oper_iss_co_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2 mt-2">
                                        <div class="col-lg-5 spacing-right mt-3">
                                            Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                            name="operatingissuings[{{ $index }}][oper_iss_co_notes]" type="text" placeholder="..."
                                                style="width: 100%;">{{ $op_issuing->oper_iss_co_notes }}</textarea readonly>
                                        </div>
                                        <div class="col-lg-5 spacing-left mt-3">
                                            Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                            name="operatingissuings[{{ $index }}][oper_iss_co_attach]" value="{{ $op_issuing->oper_iss_co_attach }}" type="file" placeholder="..."
                                            style="width: 100%;" multiple>
                                            <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
                                                <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
                                                    @if($op_issuing->oper_iss_co_attach)
                                                        @php
                                                            $attachments = explode(',', $op_issuing->oper_iss_co_attach);
                                                        @endphp
                                                        @foreach ($attachments as $attachment)
                                                            <div style="padding: 10px;">
                                                                @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
                                                                    <!-- Display Image -->
                                                                    <img src="{{ asset($attachment) }}" alt="Image Preview" class="preview-image" style="height: 120px; width: 120px;">
                                                                @elseif (Str::endsWith($attachment, ['.pdf']))
                                                                    <!-- Display PDF -->
                                                                    <embed src="{{ asset($attachment) }}" type="application/pdf" class="preview-pdf" style="width:100px; height:100px;" />
                                                                    <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download PDF</a>
                                                                @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
                                                                    <!-- Display Excel Sheet -->
                                                                    <div class="preview-excel" style="text-align: center;">
                                                                        <p>Excel Sheet Name: {{ pathinfo($attachment)['basename'] }}</p>
                                                                        <a href="{{ asset($attachment) }}">Download Excel Sheet</a>
                                                                    </div>
                                                                @else
                                                                    <span class="preview-default-text">Preview</span>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <span class="preview-default-text">No attachments found</span>
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

                
                {{-- <div class="new_branch mt-2">
                    <button type="button" onclick="authority_add_fields()">
                        Add authority
                    </button>
                </div> --}}
            </div>
            <!--Weapon License Renewals-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="operating_renewals" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <h5>Renewal Application : </h5>
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Initiating Date <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="oper_ra_date" value="{{ $regulators->oper_ra_date }}" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Request Letter Attachment <br> <input readonly class="form-control mt-1"
                            id="head_office_email" value="{{ $regulators->oper_ra_letter }}" name="oper_ra_letter" type="file" placeholder="..."
                            style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->oper_ra_letter)
                                    <img src="{{ asset($regulators->oper_ra_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Document Submitted with Renewal Application <br> <input readonly
                            class="form-control mt-1" id="head_office_name" name="oper_ra_doc"
                            type="file" value="{{ $regulators->oper_ra_doc }}" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->oper_ra_letter)
                                    <img src="{{ asset($regulators->oper_ra_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="oper_ra_notes" type="text" placeholder="..."
                                style="width: 100%;">{{ $regulators->oper_ra_notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-4 spacing-left">
                            Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="oper_ra_attach" value="{{ $regulators->oper_ra_attach }}" type="file" placeholder="..." style="width: 103%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->oper_ra_letter)
                                    <img src="{{ asset($regulators->oper_ra_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <h5>Renewal Correspondence :</h5>
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Correspondence Date <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="oper_rc_date" value="{{ $regulators->oper_rc_date }}" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Correspondence Letter Attachment <br> <input readonly class="form-control mt-1"
                            id="head_office_name" value="{{ $regulators->oper_rc_letter }}" name="oper_rc_letter" type="file" placeholder="..."
                            style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->oper_rc_letter)
                                    <img src="{{ asset($regulators->oper_rc_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Document Submitted with Renewal Correspondence <br> <input readonly
                            class="form-control mt-1" id="head_office_name" value="{{ $regulators->oper_rc_doc }}" name="oper_rc_doc"
                            type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->oper_rc_doc)
                                    <img src="{{ asset($regulators->oper_rc_doc) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="oper_rc_notes"  type="text" placeholder="..."
                                style="width: 100%;">{{ $regulators->oper_rc_notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="oper_rc_attach" value="{{ $regulators->oper_rc_attach }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->oper_rc_attach)
                                    <img src="{{ asset($regulators->oper_rc_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h5>Renewal Approval :</h5>
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Approval Date <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="oper_rap_date" value="{{ $regulators->oper_rap_date }}" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Approval Letter Attachment <br> <input readonly class="form-control mt-1"
                            id="head_office_name" value="{{ $regulators->oper_rap_letter }}" name="oper_rap_letter" type="file" placeholder="..."
                            style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->oper_rap_letter)
                                    <img src="{{ asset($regulators->oper_rap_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Document Submitted with Renewal Approval <br> <input readonly class="form-control mt-1"
                            id="head_office_name" value="{{ $regulators->oper_rap_doc }}" name="oper_rap_doc" type="file" placeholder="..."
                            style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->oper_rap_doc)
                                    <img src="{{ asset($regulators->oper_rap_doc) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="oper_rap_notes"  type="text" placeholder="..."
                                style="width: 100%;">{{ $regulators->oper_rap_notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="oper_rap_attach" value="{{ $regulators->oper_rap_attach }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->oper_rap_attach)
                                    <img src="{{ asset($regulators->oper_rap_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- HTML Markup -->
                <div id="operatingRenewalsAccordion">
                    <!-- Existing operating renewal entries -->
                    @foreach ($regulators->operatingrenewals as $index => $op_renewal)
                    <div class="accordion-item" id="operatingRenewalItem{{ $index }}">
                        <h2 class="accordion-header" id="operatingRenewalHeading{{ $index }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#operatingRenewalCollapse{{ $index }}" aria-expanded="true" aria-controls="operatingRenewalCollapse{{ $index }}">
                                Operating Renewal Entry {{ $index + 1 }}
                            </button>
                        </h2>
                        <div id="operatingRenewalCollapse{{ $index }}" class="accordion-collapse collapse show" aria-labelledby="operatingRenewalHeading{{ $index }}" data-bs-parent="#operatingRenewalsAccordion">
                            <div class="accordion-body">
                                <div>
                                    <h3 style="border: 2px solid black; width: 99%; padding: 10px;"><b>Finances :</b></h3>
                                    
                                    <input readonly type="hidden" name="operatingrenewals[{{ $index }}][opr_id]" value="{{ $op_renewal->id }}">
                                    <div class="col-lg-6 spacing-right mb-3">
                                        Category <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[{{ $index }}][oper_fee_category]" value="{{ $op_renewal->oper_fee_category }}" type="text" placeholder="..."
                                        style="width: 100%;"> 
                                    </div>
    
                                    <h5 style="margin-left:10px;">Withdrawal From:</h5>
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <div class="col-lg-4 spacing-right">
                                                Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingrenewals[{{ $index }}][oper_finance_bank]" value="{{ $op_renewal->oper_finance_bank }}" type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right">
                                                Cheque/Instrument No. <br> <input readonly class="form-control mt-1"
                                                    id="head_office_email" value="{{ $op_renewal->oper_finance_cheque }}" name="operatingrenewals[{{ $index }}][oper_finance_cheque]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Scanned copy of Cheque/Instrument<br> <input readonly class="form-control mt-1"
                                                id="head_office_name" value="{{ $op_renewal->oper_finance_copy }}" name="operatingrenewals[{{ $index }}][oper_finance_copy]" type="file"
                                                placeholder="..." style="width: 100%;">
                                                <div class="col-lg-5 spacing-right">
                                                    <!-- Image Preview Biometric -->
                                                    <div class="image-preview42" id="imagePreview42">
                                                        @if($op_renewal->oper_finance_copy)
                                                        <img src="{{ asset($op_renewal->oper_finance_copy) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                        @else
                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 spacing-right mt-3">
                                                Amount in figures <br> <input readonly class="form-control mt-1"
                                                    id="head_office_name" value="{{ $op_renewal->oper_finance_amount }}" name="operatingrenewals[{{ $index }}][oper_finance_amount]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingrenewals[{{ $index }}][oper_finance_notes]" type="text" placeholder="..."
                                                    style="width: 100%;">{{ $op_renewal->oper_finance_notes }}</textarea readonly>
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-rightmt-3">
                                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                                name="operatingrenewals[{{ $index }}][oper_finance_attach]" value="{{ $op_renewal->oper_finance_attach }}" type="file" placeholder="..."
                                                style="width: 100%;">
                                                <div class="col-lg-5 spacing-right">
                                                    <!-- Image Preview Biometric -->
                                                    <div class="image-preview42" id="imagePreview42">
                                                        @if($op_renewal->oper_finance_attach)
                                                        <img src="{{ asset($op_renewal->oper_finance_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                        @else
                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <h5>Withdrawal By :</h5>
                                            <div class="col-lg-4 spacing-right">
                                                Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingrenewals[{{ $index }}][oper_finance_wb_name]" value="{{ $op_renewal->oper_finance_wb_name }}" type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right">
                                                Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                                name="operatingrenewals[{{ $index }}][oper_finance_wb_id]" value="{{ $op_renewal->oper_finance_wb_id }}" type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingrenewals[{{ $index }}][oper_finance_wb_desig]" value="{{ $op_renewal->oper_finance_wb_desig }}" type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right mt-3">
                                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingrenewals[{{ $index }}][oper_finance_wb_cell]" value="{{ $op_renewal->oper_finance_wb_cell }}" type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left mt-3">
                                                Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingrenewals[{{ $index }}][oper_finance_wb_email]" value="{{ $op_renewal->oper_finance_wb_email }}" type="text" placeholder="..."
                                                    style="width: 103%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingrenewals[{{ $index }}][oper_finance_wb_notes]" type="text" placeholder="..."
                                                    style="width: 100%;">{{ $op_renewal->oper_finance_wb_notes }}</textarea readonly>
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                                name="operatingrenewals[{{ $index }}][oper_finance_wb_attach]" value="{{ $op_renewal->oper_finance_wb_attach }}" type="file" placeholder="..."
                                                style="width: 100%;">
                                                <div class="col-lg-5 spacing-right">
                                                    <!-- Image Preview Biometric -->
                                                    <div class="image-preview42" id="imagePreview42">
                                                        @if($op_renewal->oper_finance_wb_attach)
                                                        <img src="{{ asset($op_renewal->oper_finance_wb_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                        @else
                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="mt-2">Fees :</h5>
                                            <div class="col-lg-4 spacing-right">
                                                Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingrenewals[{{ $index }}][oper_finance_fee]" value="{{ $op_renewal->oper_finance_fee }}" type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right lh-lg">
                                                Date of Fees Deposit <br> <input readonly class="form-control mt-1"
                                                    id="head_office_email" value="{{ $op_renewal->oper_finance_fee_date }}" name="operatingrenewals[{{ $index }}][oper_finance_fee_date]" type="date"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right lh-lg">
                                                Name of bank<br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingrenewals[{{ $index }}][oper_finance_fee_bank]" value="{{ $op_renewal->oper_finance_fee_bank }}" type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right mt-3">
                                                Instrument Number <br> <input readonly class="form-control mt-1"
                                                    id="head_office_name" value="{{ $op_renewal->oper_finance_fee_ins }}" name="operatingrenewals[{{ $index }}][oper_finance_fee_ins]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                Deposit Slip Attachment <br> <input readonly class="form-control mt-1"
                                                id="head_office_email" value="{{ $op_renewal->oper_finance_slip_attach }}" name="operatingrenewals[{{ $index }}][oper_finance_slip_attach]" type="file"
                                                placeholder="..." style="width: 100%;">
                                                <div class="col-lg-5 spacing-right">
                                                    <!-- Image Preview Biometric -->
                                                    <div class="image-preview42" id="imagePreview42">
                                                        @if($op_renewal->oper_finance_slip_attach)
                                                        <img src="{{ asset($op_renewal->oper_finance_slip_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                        @else
                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 spacing-right mt-3">
                                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingrenewals[{{ $index }}][oper_finance_fee_notes]" type="text" placeholder="..."
                                                    style="width: 100%;"></textarea readonly>
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                                name="operatingrenewals[{{ $index }}][oper_finance_fee_attach]" value="{{ $op_renewal->oper_finance_fee_attach }}" type="file" placeholder="..."
                                                style="width: 100%;">
                                                <div class="col-lg-5 spacing-right">
                                                    <!-- Image Preview Biometric -->
                                                    <div class="image-preview42" id="imagePreview42">
                                                        @if($op_renewal->oper_finance_fee_attach)
                                                        <img src="{{ asset($op_renewal->oper_finance_fee_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                        @else
                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="mt-2">Deposited By :</h5>
                                            <div class="col-lg-4 spacing-right">
                                                Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingrenewals[{{ $index }}][oper_finance_db_name]" value="{{ $op_renewal->oper_finance_db_name }}" type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right">
                                                Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                                name="operatingrenewals[{{ $index }}][oper_finance_db_id]" value="{{ $op_renewal->oper_finance_db_id }}" type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingrenewals[{{ $index }}][oper_finance_db_desig]" value="{{ $op_renewal->oper_finance_db_desig }}" type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-right mt-3">
                                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingrenewals[{{ $index }}][oper_finance_db_cell]" value="{{ $op_renewal->oper_finance_db_cell }}" type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left mt-3">
                                                Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingrenewals[{{ $index }}][oper_finance_db_email]" value="{{ $op_renewal->oper_finance_db_email }}" type="text" placeholder="..."
                                                    style="width: 103%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                                name="operatingrenewals[{{ $index }}][oper_finance_db_notes]" type="text" placeholder="..."
                                                    style="width: 100%;">{{ $op_renewal->oper_finance_db_notes }}</textarea readonly>
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                                name="operatingrenewals[{{ $index }}][oper_finance_db_attach]" value="{{ $op_renewal->oper_finance_db_attach }}" type="file" placeholder="..."
                                                style="width: 100%;">
                                                <div class="col-lg-5 spacing-right">
                                                    <!-- Image Preview Biometric -->
                                                    <div class="image-preview42" id="imagePreview42">
                                                        @if($op_renewal->oper_finance_db_attach)
                                                        <img src="{{ asset($op_renewal->oper_finance_db_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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
            <!--Laws-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="laws" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="oper_laws_notes" type="text" placeholder="..."
                                style="width: 100%;">{{ $regulators->oper_laws_notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="oper_laws_attach" value="{{ $regulators->oper_laws_attach }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->oper_laws_attach)
                                    <img src="{{ asset($regulators->oper_laws_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--Renewals History-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="history" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <h5 style="text-align:center;">Backend Summary will be shown here </h5>
            </div>
         
            <h5>Weapon License Details</h5>
            <!--Consultant Details-->
            <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="w_consultant"
                role="tabpanel" aria-labelledby="nav-home-tab">

                <div id="weaponConsultantsAccordion">
                    <!-- Existing weapon consultant entries -->
                    @foreach ($regulators->weaponconsultants as $index => $we_consultant)
                    <div class="accordion-item" id="weaponConsultantItem{{ $index }}">
                        <h2 class="accordion-header" id="weaponConsultantHeading{{ $index }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#weaponConsultantCollapse{{ $index }}" aria-expanded="true" aria-controls="weaponConsultantCollapse{{ $index }}">
                                Weapon Consultant {{ $index + 1 }}
                            </button>
                        </h2>
                        <div id="weaponConsultantCollapse{{ $index }}" class="accordion-collapse collapse show" aria-labelledby="weaponConsultantHeading{{ $index }}" data-bs-parent="#weaponConsultantsAccordion">
                            <div class="accordion-body">
                                <input readonly type="hidden" name="weaponconsultants[{{ $index }}][we_id]" value="">
                                <div class=" row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponconsultants[{{ $index }}][wep_bank]" value="{{ $we_consultant->wep_bank }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Account Title <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="weaponconsultants[{{ $index }}][wep_acc]" value="{{ $we_consultant->wep_acc }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Account Number <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="weaponconsultants[{{ $index }}][wep_acc_no]" value="{{ $we_consultant->wep_acc_no }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Any Agreed Financials <br> <input readonly class="form-control mt-1"
                                        name="weaponconsultants[{{ $index }}][wep_fin]" value="{{ $we_consultant->wep_fin }}" type="file" placeholder="..."
                                        style="width: 100%;">
                                        
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Notes <br> <textarea readonly class="form-control mt-1" id="" name="weaponconsultants[{{ $index }}][wep_notes]"
                                            type="text" placeholder="..." style="width: 100%;">{{ $we_consultant->wep_notes }}</textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Attachment <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="weaponconsultants[{{ $index }}][wep_attach]" value="{{ $we_consultant->wep_attach }}" type="file" placeholder="..." style="width: 100%;">
                                        
                                    </div>
                                </div>
                                <h5>Consultant Address</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Office No <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                        name="weaponconsultants[{{ $index }}][wep_office]" value="{{ $we_consultant->wep_office }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Building <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                        name="weaponconsultants[{{ $index }}][wep_build]" value="{{ $we_consultant->wep_build }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right mt-2">
                                        Block <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                        name="weaponconsultants[{{ $index }}][wep_block]" value="{{ $we_consultant->wep_block }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left mt-2">
                                        Area <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                        name="weaponconsultants[{{ $index }}][wep_area]" value="{{ $we_consultant->wep_area }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right mt-2">
                                        City <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                        name="weaponconsultants[{{ $index }}][wep_city]" value="{{ $we_consultant->wep_city }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left mt-2">
                                        Photograph of Building <br> <input readonly class="form-control mt-1" id=""
                                        name="weaponconsultants[{{ $index }}][wep_photo]" value="{{ $we_consultant->wep_photo }}" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($we_consultant->wep_photo)
                                                <img src="{{ asset($we_consultant->wep_photo) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right mt-2">
                                        Email <br> <input readonly class="form-control mt-1" value="{{ $we_consultant->wep_a_email }}" name="weaponconsultants[{{ $index }}][wep_a_email]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left mt-2">
                                        Website <br> <input readonly class="form-control mt-1" value="{{ $we_consultant->wep_web }}" name="weaponconsultants[{{ $index }}][wep_web]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right mt-2">
                                        Pin location <br> <input readonly class="form-control mt-1" value="{{ $we_consultant->wep_pin }}" name="weaponconsultants[{{ $index }}][wep_pin]""
                                            type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left mt-2">
                                        GPS <br> <input readonly class="form-control mt-1" value="{{ $we_consultant->wep_gps }}" name="weaponconsultants[{{ $index }}][wep_gps]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-5 spacing-right ">
                                        Notes <br> <textarea readonly class="form-control mt-1" name="weaponconsultants[{{ $index }}][wep_ex_notes]"
                                            type="text" placeholder="..." style="width: 100%;">{{ $we_consultant->wep_ex_notes }}</textarea readonly>
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Attachments <br> <input readonly class="form-control mt-1" value="{{ $we_consultant->wep_ex_attach }}" name="weaponconsultants[{{ $index }}][wep_ex_attach]"
                                        type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($we_consultant->wep_ex_attach)
                                                <img src="{{ asset($we_consultant->wep_ex_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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
            <!--Address-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="w_address" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <div class="col-lg-6 spacing-left">
                    <h5>Home Department Address</h5>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Office No <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="wep_home_office" value="{{ $regulators->wep_home_office }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Building <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="wep_home_build" value="{{ $regulators->wep_home_build }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right">
                            Block <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="wep_home_block" value="{{ $regulators->wep_home_block }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Area <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="wep_home_area" value="{{ $regulators->wep_home_area }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right">
                            City <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="wep_home_city" value="{{ $regulators->wep_home_city }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Photograph of Building <br> <input readonly class="form-control mt-1" id=""
                            name="wep_home_photo" value="{{ $regulators->wep_home_photo }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->wep_home_photo)
                                    <img src="{{ asset($regulators->wep_home_photo) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right">
                            Email <br> <input readonly class="form-control mt-1" id="" name="wep_home_email"
                                type="text" value="{{ $regulators->wep_home_email }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Website <br> <input readonly class="form-control mt-1" id="" name="wep_home_email"
                                type="text" value="{{ $regulators->wep_home_email }}" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right">
                            Pin location <br> <input readonly class="form-control mt-1" id="" name="wep_home_pin"
                                type="text" value="{{ $regulators->wep_home_pin }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            GPS <br> <input readonly class="form-control mt-1" value="{{ $regulators->wep_home_pin }}" name="wep_home_pin" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2 mt-3">
                        <div class="col-lg-5 spacing-right">
                            Notes <br> <textarea readonly class="form-control" id="" name="wep_home_notes"
                                type="text" placeholder="..." style="width: 100%;">{{ $regulators->wep_home_notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Attachments <br> <input readonly class="form-control" id="" name="wep_home_attach"
                            type="file" value="{{ $regulators->wep_home_attach }}" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->wep_home_attach)
                                    <img src="{{ asset($regulators->wep_home_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="w_issuing" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <h5 style="margin-left:12px;">Issuing Authority</h5>

                <div id="weaponIssuingsAccordion">
                    <!-- Existing weapon issuing entries -->
                    @foreach ($regulators->weaponissuings as $index => $we_issuing)
                    <div class="accordion-item" id="weaponIssuingItem{{ $index }}">
                        <h2 class="accordion-header" id="weaponIssuingHeading{{ $index }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#weaponIssuingCollapse{{ $index }}" aria-expanded="true" aria-controls="weaponIssuingCollapse{{ $index }}">
                                Weapon Issuing Entry {{ $index + 1 }}
                            </button>
                        </h2>
                        <div id="weaponIssuingCollapse{{ $index }}" class="accordion-collapse collapse show" aria-labelledby="weaponIssuingHeading{{ $index }}" data-bs-parent="#weaponIssuingsAccordion">
                            <div class="accordion-body">
                                
                                <div>
                                    <input readonly type="hidden" name="weaponissuings[{{ $index }}][wei_id]" value="{{ $we_issuing->id }}">
                                    <div class="col-lg-12" >
                                        <div class="row mb-2">
                                            <div class="col-lg-3 spacing-right">
                                                Concerned Officer Name <br> <input readonly class="form-control mt-1"
                                                name="weaponissuings[{{ $index }}][wep_iss_co_name]" value="{{ $we_issuing->wep_iss_co_name }}" type="text" placeholder="..."
                                                style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Designation <br> <input readonly class="form-control mt-1" id="head_office_email"
                                                name="weaponissuings[{{ $index }}][wep_iss_co_desig]" value="{{ $we_issuing->wep_iss_co_desig }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Department <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_iss_co_dept]" value="{{ $we_issuing->wep_iss_co_dept }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Section <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_iss_co_sec]" value="{{ $we_issuing->wep_iss_co_sec }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right lh-lg">
                                                PTCL Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_iss_co_ptcl]" value="{{ $we_issuing->wep_iss_co_ptcl }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-left mt-3">
                                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_iss_co_cell]" value="{{ $we_issuing->wep_iss_co_cell }}" type="text" placeholder="..." style="width: 107%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right mt-3">
                                                Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_iss_co_email]" value="{{ $we_issuing->wep_iss_co_email }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right mt-3">
                                                Website <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_iss_co_web]" value="{{ $we_issuing->wep_iss_co_web }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right mt-3">
                                                Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_iss_co_front]" value="{{ $we_issuing->wep_iss_co_front }}" type="file" placeholder="..." style="width: 100%;">
                                                <div class="col-lg-5 spacing-right">
                                                    <!-- Image Preview Biometric -->
                                                    <div class="image-preview42" id="imagePreview42">
                                                        @if($we_issuing->wep_iss_co_front)
                                                        <img src="{{ asset($we_issuing->wep_iss_co_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                        @else
                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 spacing-right spacing-left mt-3">
                                                Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_iss_co_back]" value="{{ $we_issuing->wep_iss_co_back }}" type="file" placeholder="..." style="width: 100%;">
                                                <div class="col-lg-5 spacing-right">
                                                    <!-- Image Preview Biometric -->
                                                    <div class="image-preview42" id="imagePreview42">
                                                        @if($we_issuing->wep_iss_co_back)
                                                        <img src="{{ asset($we_issuing->wep_iss_co_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                        @else
                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2 mt-3">
                                                <div class="col-lg-4 spacing-right">
                                                    Notes <br> <textarea readonly class="form-control mt-1" id="" name="weaponissuings[{{ $index }}][wep_iss_co_notes]"
                                                        type="text" placeholder="..." style="width: 100%;">{{ $we_issuing->wep_iss_co_notes }}</textarea readonly>
                                                </div>
                                                <div class="col-lg-4 spacing-left">
                                                    Attachments <br> <input readonly class="form-control mt-1" id="" name="weaponissuings[{{ $index }}][wep_iss_co_attach]"
                                                    type="file" value="{{ $we_issuing->wep_iss_co_attach }}" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="image-preview42" id="imagePreview42">
                                                            @if($we_issuing->wep_iss_co_attach)
                                                            <img src="{{ asset($we_issuing->wep_iss_co_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 style="margin-left:12px;">Printing Authority</h5>
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <div class="col-lg-3 spacing-right">
                                                Concerned Officer Name <br> <input readonly class="form-control mt-1"
                                                name="weaponissuings[{{ $index }}][wep_p_co_name]" value="{{ $we_issuing->wep_p_co_name }}" type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right">
                                                Designation <br> <input readonly class="form-control mt-1" id="head_office_email"
                                                name="weaponissuings[{{ $index }}][wep_co_p_desig]" value="{{ $we_issuing->wep_co_p_desig }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Department <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_co_p_dept]" value="{{ $we_issuing->wep_co_p_dept }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right">
                                                Section <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_co_p_sec]" value="{{ $we_issuing->wep_co_p_sec }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right mt-3">
                                                PTCL Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_co_p_ptcl]" value="{{ $we_issuing->wep_co_p_ptcl }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
    
                                            <div class="col-lg-3 spacing-left mt-3">
                                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_co_p_cell]" value="{{ $we_issuing->wep_co_p_cell }}" type="text" placeholder="..." style="width: 103%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right mt-3">
                                                Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_co_p_email]" value="{{ $we_issuing->wep_co_p_email }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right mt-3">
                                                Website <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_co_p_web]" value="{{ $we_issuing->wep_co_p_web }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right mt-3">
                                                Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_co_p_front]" value="{{ $we_issuing->wep_co_p_front }}" type="file" placeholder="..." style="width: 100%;">
                                                <div class="col-lg-5 spacing-right">
                                                    <!-- Image Preview Biometric -->
                                                    <div class="image-preview42" id="imagePreview42">
                                                        @if($we_issuing->wep_co_p_front)
                                                        <img src="{{ asset($we_issuing->wep_co_p_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                        @else
                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 spacing-right spacing-left mt-3">
                                                Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_co_p_back]" value="{{ $we_issuing->wep_co_p_back }}" type="file" placeholder="..." style="width: 100%;">
                                                <div class="col-lg-5 spacing-right">
                                                    <!-- Image Preview Biometric -->
                                                    <div class="image-preview42" id="imagePreview42">
                                                        @if($we_issuing->wep_co_p_back)
                                                        <img src="{{ asset($we_issuing->wep_co_p_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                        @else
                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-lg-4 spacing-right">
                                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                                name="weaponissuings[{{ $index }}][wep_co_p_notes]" type="text" placeholder="..."
                                                    style="width: 100%;">{{ $we_issuing->wep_co_p_notes }}</textarea readonly>
                                            </div>
                                            <div class="col-lg-4 spacing-right">
                                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                                name="weaponissuings[{{ $index }}][wep_co_p_attach]" value="{{ $we_issuing->wep_co_p_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                <div class="col-lg-5 spacing-right">
                                                    <!-- Image Preview Biometric -->
                                                    <div class="image-preview42" id="imagePreview42">
                                                        @if($we_issuing->wep_co_p_attach)
                                                        <img src="{{ asset($we_issuing->wep_co_p_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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
            <!--Weapon License Renewals-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="w_weapon_renewals" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <h5>Renewal Application : </h5>
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Initiating Date <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="wep_ra_date" value="{{ $regulators->wep_ra_date }}" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Request Letter Attachment <br> <input readonly class="form-control mt-1"
                            id="head_office_email" value="{{ $regulators->wep_ra_letter }}" name="wep_ra_letter" type="file" placeholder="..."
                            style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->wep_ra_letter)
                                    <img src="{{ asset($regulators->wep_ra_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Document Submitted with Renewal Application <br> <input readonly
                            class="form-control mt-1" id="wep_ra_doc" value="{{ $regulators->wep_ra_doc }}" name="wep_ra_doc" type="file"
                            placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->wep_ra_doc)
                                    <img src="{{ asset($regulators->wep_ra_doc) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="wep_ra_notes" type="text" placeholder="..."
                                style="width: 100%;">{{ $regulators->wep_ra_notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-4 spacing-left">
                            Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="wep_ra_attach" value="{{ $regulators->wep_ra_attach }}" type="file" placeholder="..." style="width: 104%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->wep_ra_attach)
                                    <img src="{{ asset($regulators->wep_ra_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <h5>Renewal Correspondence :</h5>
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Correspondence Date <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="wep_rc_date" value="{{ $regulators->wep_rc_date }}" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Correspondence Letter Attachment <br> <input readonly class="form-control mt-1"
                            id="head_office_name" value="{{ $regulators->wep_rc_letter }}" name="wep_rc_letter" type="file" placeholder="..."
                            style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->wep_rc_letter)
                                    <img src="{{ asset($regulators->wep_rc_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Document Submitted with Renewal Correspondence <br> <input readonly
                            class="form-control mt-1" id="head_office_name" value="{{ $regulators->wep_rc_docs }}" name="wep_rc_docs"
                            type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->wep_rc_docs)
                                    <img src="{{ asset($regulators->wep_rc_docs) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="wep_rc_notes" type="text" placeholder="..."
                                style="width: 100%;">{{ $regulators->wep_rc_notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="wep_rc_attach" value="{{ $regulators->wep_rc_attach }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->wep_rc_attach)
                                    <img src="{{ asset($regulators->wep_rc_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h5>Renewal Approval :</h5>
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Approval Date <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="wep_rap_date" value="{{ $regulators->wep_rap_date }}" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Approval Letter Attachment <br> <input readonly class="form-control mt-1"
                            id="head_office_name" value="{{ $regulators->wep_rap_letter }}" name="wep_rap_letter" type="file" placeholder="..."
                            style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->wep_rap_letter)
                                    <img src="{{ asset($regulators->wep_rap_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Document Submitted with Renewal Approval <br> <input readonly class="form-control mt-1"
                            id="head_office_name" value="{{ $regulators->wep_rap_docs }}" name="wep_rap_docs" type="file" placeholder="..."
                            style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->wep_rap_docs)
                                    <img src="{{ asset($regulators->wep_rap_docs) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="wep_rap_notes" type="text" placeholder="..."
                                style="width: 100%;">{{ $regulators->wep_rap_notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="wep_rap_attach" value="{{ $regulators->wep_rap_attach }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->wep_rap_attach)
                                    <img src="{{ asset($regulators->wep_rap_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <h3 style="border: 2px solid black; width: 99%; padding: 10px;"><b>Finances :</b></h3>
                <h4 style="text-align:center;"><b>Legal Fee :</b></h4>
                <h5 style="margin-left:10px;">Withdrawal From:</h5>
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="row legal_fee">
                            @foreach ($regulators->weaponlegals as $index => $legal)
                            {{-- <input readonly type="hidden" name="weaponlegals[{{ $index }}][le_id]" value="{{ $legal->id }}"> --}}
                            <div class="col-lg-4 spacing-right">
                                Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_bank]" value="{{ $legal->wep_legal_bank }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Cheque/Instrument No. <br> <input readonly class="form-control mt-1"
                                    name="weaponlegals[{{ $index }}][wep_legal_cheque]" value="{{ $legal->wep_legal_cheque }}" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Scanned copy of Cheque/Instrument<br> <input readonly class="form-control mt-1"
                                name="weaponlegals[{{ $index }}][wep_legal_copy]" value="{{ $legal->wep_legal_copy }}" type="file" placeholder="..."
                                style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($legal->wep_legal_copy)
                                        <img src="{{ asset($legal->wep_legal_copy) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Amount in figures <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_amount]" value="{{ $legal->wep_legal_amount }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_notes]"  type="text" placeholder="..."
                                    style="width: 100%;">{{ $legal->wep_legal_notes }}</textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="weaponlegals[{{ $index }}][wep_legal_attach]" value="{{ $legal->wep_legal_attach }}" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($legal->wep_legal_attach)
                                        <img src="{{ asset($legal->wep_legal_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <h5>Withdrawal By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_wb_name]" value="{{ $legal->wep_legal_wb_name }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="weaponlegals[{{ $index }}][wep_legal_wb_id]" value="{{ $legal->wep_legal_wb_id }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_wb_desig]" value="{{ $legal->wep_legal_wb_desig }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_wb_cell]" value="{{ $legal->wep_legal_wb_cell }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_wb_email]" value="{{ $legal->wep_legal_wb_email }}" type="text" placeholder="..." style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_wb_notes]" type="text" placeholder="..."
                                    style="width: 100%;">{{ $legal->wep_legal_wb_notes }}</textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="weaponlegals[{{ $index }}][wep_legal_wb_attach]" value="{{ $legal->wep_legal_wb_attach }}" type="file" placeholder="..."
                                style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($legal->wep_legal_wb_attach)
                                        <img src="{{ asset($legal->wep_legal_wb_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <h5 class="mt-2">Fees :</h5>
                            <div class="col-lg-4 spacing-left">
                                Fees A <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_fee_a]" value="{{ $legal->wep_legal_fee_a }}" type="text" placeholder="..." style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Fees B <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_fee_b]" value="{{ $legal->wep_legal_fee_b }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Total Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_fee_t]" value="{{ $legal->wep_legal_fee_t }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Date of Fees Deposit <br> <input readonly class="form-control mt-1"
                                name="weaponlegals[{{ $index }}][wep_legal_fee_date]" value="{{ $legal->wep_legal_fee_date }}" type="date"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Name of bank<br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_fee_bank]" value="{{ $legal->wep_legal_fee_bank }}" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Instrument Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_fee_ins]" value="{{ $legal->wep_legal_fee_ins }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Deposit Slip Attachment <br> <input readonly class="form-control mt-1"
                                name="weaponlegals[{{ $index }}][wep_legal_fee_slip]" value="{{ $legal->wep_legal_fee_slip }}" type="file"
                                placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($legal->wep_legal_fee_slip)
                                        <img src="{{ asset($legal->wep_legal_fee_slip) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_fee_notes]" type="text" placeholder="..."
                                    style="width: 100%;">{{ $legal->wep_legal_fee_notes }}</textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="weaponlegals[{{ $index }}][wep_legal_fee_attach]" value="{{ $legal->wep_legal_fee_attach }}" type="file" placeholder="..."
                                style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($legal->wep_legal_fee_attach)
                                        <img src="{{ asset($legal->wep_legal_fee_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <h5 class="mt-2">Deposited By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_db_name]" value="{{ $legal->wep_legal_db_name }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="weaponlegals[{{ $index }}][wep_legal_db_id]" value="{{ $legal->wep_legal_db_id }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_db_desig]" value="{{ $legal->wep_legal_db_desig }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_db_cell]" value="{{ $legal->wep_legal_db_cell }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_db_email]" value="{{ $legal->wep_legal_db_email }}" type="text" placeholder="..." style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlegals[{{ $index }}][wep_legal_db_notes]" type="text" placeholder="..."
                                    style="width: 100%;">{{ $legal->wep_legal_db_notes }}</textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="weaponlegals[{{ $index }}][wep_legal_db_attach]" value="{{ $legal->wep_legal_db_attach }}" type="file" placeholder="..."
                                style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($legal->wep_legal_db_attach)
                                        <img src="{{ asset($legal->wep_legal_db_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="new_branch mt-2">
                                <button type="button" onclick="addLegalDetails()">Add More (Legal)</button>
                            </div> --}}
                            @endforeach
                            {{-- <div id="legalDetailsContainer"></div> --}}
                        </div>
                        <div id="weapon_finance_add_fields">
                            @foreach ($regulators->weaponrenewals as $index => $we_renewals)
                            <input readonly type="hidden" name="weaponrenewals[{{ $index }}][wer_id]" value="{{ $we_renewals->id }}">
                            <h3 style="border: 2px solid black; width: 99%; padding: 10px;"><b>Finances :</b></h3>
                            <div class="col-lg-6 spacing-right mb-3">
                                Category <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponrenewals[{{ $index }}][wep_fee_category]" value="{{ $we_renewals->wep_fee_category }}" type="text" placeholder="..."
                                style="width: 100%;"> 
                            </div>

                            <h5 style="margin-left:10px;">Withdrawal From:</h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponrenewals[{{ $index }}][wep_finance_bank]" value="{{ $we_renewals->wep_finance_bank }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Cheque/Instrument No. <br> <input readonly class="form-control mt-1"
                                            id="head_office_email" name="weaponrenewals[{{ $index }}][wep_finance_cheque]" value="{{ $we_renewals->wep_finance_cheque }}" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Scanned copy of Cheque/Instrument<br> <input readonly class="form-control mt-1"
                                        id="head_office_name" name="weaponrenewals[{{ $index }}][wep_finance_copy]" value="{{ $we_renewals->wep_finance_copy }}" type="file"
                                        placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($we_renewals->wep_finance_copy)
                                                <img src="{{ asset($we_renewals->wep_finance_copy) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Amount in figures <br> <input readonly class="form-control mt-1"
                                            id="head_office_name" name="weaponrenewals[{{ $index }}][wep_finance_amount]" value="{{ $we_renewals->wep_finance_amount }}" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponrenewals[{{ $index }}][wep_finance_notes]" type="text" placeholder="..."
                                            style="width: 100%;">{{ $we_renewals->wep_finance_notes }}</textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-rightmt-3">
                                        Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="weaponrenewals[{{ $index }}][wep_finance_attach]" value="{{ $we_renewals->wep_finance_attach }}" type="file" placeholder="..."
                                        style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($we_renewals->wep_finance_attach)
                                                <img src="{{ asset($we_renewals->wep_finance_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Withdrawal By :</h5>
                                    <div class="col-lg-4 spacing-right">
                                        Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponrenewals[{{ $index }}][wep_finance_wb_name]" value="{{ $we_renewals->wep_finance_wb_name }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="weaponrenewals[{{ $index }}][wep_finance_wb_id]" value="{{ $we_renewals->wep_finance_wb_id }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponrenewals[{{ $index }}][wep_finance_wb_desig]" value="{{ $we_renewals->wep_finance_wb_desig }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponrenewals[{{ $index }}][wep_finance_wb_cell]" value="{{ $we_renewals->wep_finance_wb_cell }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left mt-3">
                                        Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponrenewals[{{ $index }}][wep_finance_wb_email]" value="{{ $we_renewals->wep_finance_wb_email }}" type="text" placeholder="..."
                                            style="width: 103%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponrenewals[{{ $index }}][wep_finance_wb_notes]" type="text" placeholder="..."
                                            style="width: 100%;">{{ $we_renewals->wep_finance_wb_notes }}</textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="weaponrenewals[{{ $index }}][wer_id]" value="{{ $we_renewals->wep_finance_wb_attach }}" type="file" placeholder="..."
                                        style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($we_renewals->wep_finance_wb_attach)
                                                <img src="{{ asset($we_renewals->wep_finance_wb_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mt-2">Fees :</h5>
                                    <div class="col-lg-4 spacing-right">
                                        Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponrenewals[{{ $index }}][wep_finance_fee]" value="{{ $we_renewals->wep_finance_fee }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right lh-lg">
                                        Date of Fees Deposit <br> <input readonly class="form-control mt-1"
                                        name="weaponrenewals[{{ $index }}][wep_finance_fee_date]" value="{{ $we_renewals->wep_finance_fee_date }}" type="date"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right lh-lg">
                                        Name of bank<br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponrenewals[{{ $index }}][wep_finance_fee_bank]" value="{{ $we_renewals->wep_finance_fee_bank }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Instrument Number <br> <input readonly class="form-control mt-1"
                                        name="weaponrenewals[{{ $index }}][wep_finance_fee_ins]" value="{{ $we_renewals->wep_finance_fee_ins }}" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Deposit Slip Attachment <br> <input readonly class="form-control mt-1"
                                        name="weaponrenewals[{{ $index }}][wep_finance_slip_attach]" value="{{ $we_renewals->wep_finance_slip_attach }}" type="file"
                                        placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($we_renewals->wep_finance_slip_attach)
                                                <img src="{{ asset($we_renewals->wep_finance_slip_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponrenewals[{{ $index }}][wep_finance_fee_notes]" type="text" placeholder="..."
                                            style="width: 100%;">{{ $we_renewals->wep_finance_fee_notes }}</textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="weaponrenewals[{{ $index }}][wep_finance_fee_attach]" value="{{ $we_renewals->wep_finance_fee_attach }}" type="file" placeholder="..."
                                        style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($we_renewals->wep_finance_fee_attach)
                                                <img src="{{ asset($we_renewals->wep_finance_fee_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mt-2">Deposited By :</h5>
                                    <div class="col-lg-4 spacing-right">
                                        Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponrenewals[{{ $index }}][wep_finance_db_name]" value="{{ $we_renewals->wep_finance_db_name }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="weaponrenewals[{{ $index }}][wep_finance_db_id]" value="{{ $we_renewals->wep_finance_db_id }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponrenewals[{{ $index }}][wep_finance_db_desig]" value="{{ $we_renewals->wep_finance_db_desig }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponrenewals[{{ $index }}][wep_finance_db_cell]" value="{{ $we_renewals->wep_finance_db_cell }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left mt-3">
                                        Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponrenewals[{{ $index }}][wep_finance_db_email]" value="{{ $we_renewals->wep_finance_db_email }}" type="text" placeholder="..."
                                            style="width: 103%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponrenewals[{{ $index }}][wep_finance_db_notes]" type="text" placeholder="..."
                                            style="width: 100%;">{{ $we_renewals->wep_finance_db_notes }}</textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="weaponrenewals[{{ $index }}][wep_finance_db_attach]" value="{{ $we_renewals->wep_finance_db_attach }}" type="file" placeholder="..."
                                        style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($we_renewals->wep_finance_db_attach)
                                                <img src="{{ asset($we_renewals->wep_finance_db_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{-- <div class="new_branch mt-2">
                            <button type="button" onclick="weapon_finance_add_fields()">
                                Add Finance
                            </button>
                        </div> --}}
                        <div>
                            @foreach ($regulators->weapondivisions as $index => $division)
                            <input readonly type="hidden" name="weapondivisions[{{ $index }}][wed_id]" value="{{ $division->id }}">
                            <h3 style="border: 2px solid black; width: 99%; padding: 10px; margin-top:12px;">
                                <b>Division :</b>
                            </h3>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Category <br> <input readonly class="form-control mt-1" id="head_office_name"
                                            name="division_category[]" value="{{ $division->division_category }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Quantity <br> <input readonly class="form-control mt-1" id="head_office_name"
                                            name="division_quantity[]" value="{{ $division->division_quantity }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 mt-4">
                                        <div class=" mb-2 d-flex align-items-center ">
                                            <div class="form-check form-check-inline spacing-left ">
                                                <input readonly class="form-check-input readonly" {{ $division->division_book ? 'checked' : '' }} name="division_book[]"
                                                    type="checkbox" id="inlineCheckbox1" value="">
                                                <label class="form-check-label"
                                                    for="inlineCheckbox1">Book</label>
                                            </div>
                                            <div class="form-check form-check-inline spacing-left">
                                                <input readonly class="form-check-input readonly" name="division_card[]"
                                                {{ $division->division_card ? 'checked' : '' }}    type="checkbox" id="inlineCheckbox2" value="">
                                                <label class="form-check-label"
                                                    for="inlineCheckbox2">Card</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-4 spacing-right">
                                        Caliber <br> <input readonly class="form-control mt-1" id="head_office_name"
                                            name="division_caliber[]" value="{{ $division->division_caliber }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>

                                    <div class="col-lg-4 spacing-right">
                                        Jurisdiction: <br> <input readonly class="form-control mt-1"
                                            id="head_office_name" value="{{ $division->division_juris }}" name="division_juris[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>

                                    <div class="col-lg-4 spacing-right ">
                                        Sanction Letter Number <br> <input readonly class="form-control mt-1"
                                            id="head_office_name" value="{{ $division->division_sanc }}" name="division_sanc[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Scanned copy of Sanction Letter: (Attachment)
                                        <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="division_sanc_copy[]" value="{{ $division->division_sanc_copy }}" type="file" placeholder="..."
                                        style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($division->division_sanc_copy)
                                                <img src="{{ asset($division->division_sanc_copy) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-2">
                                        <div class=" mb-2 d-flex align-items-center m-5">
                                            <div class="form-check form-check-inline spacing-left mt-2">
                                                <input readonly class="form-check-input readonly" {{ $division->division_nbp ? 'checked' : '' }} name="division_nbp[]"
                                                    type="checkbox" id="inlineCheckbox1" value="">
                                                <label class="form-check-label"
                                                    for="inlineCheckbox1">NBP</label>
                                            </div>
                                            <div class="form-check form-check-inline spacing-left mt-2">
                                                <input readonly class="form-check-input readonly" {{ $division->division_pb ? 'checked' : '' }} name="division_pb[]"
                                                    type="checkbox" id="inlineCheckbox2" value="">
                                                <label class="form-check-label" for="inlineCheckbox2">PB</label>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-6 spacing-right">
                                    Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                        name="division_notes[]" type="text" placeholder="..."
                                        style="width: 100%;">{{ $division->division_notes }}</textarea readonly>
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="division_attach[]" value="{{ $division->division_attach }}" type="file" placeholder="..."
                                    style="width: 100%;">
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="image-preview42" id="imagePreview42">
                                            @if($division->division_attach)
                                            <img src="{{ asset($division->division_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{-- <button type="button" onclick="addDivisionDetails()">Add More</button> --}}
                        </div>
                        <div id="divisionDetailsContainer"></div>
                    </div>
                </div>
            </div>
            <!--Weapon License Details-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="w_details" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <div class="col-lg-12" id="weapon_details_add_fields">
                    @foreach ($regulators->weaponlicenses as $index => $license)
                    <input readonly type="hidden" name="weaponlicenses[{{ $index }}][lic_id]" value="{{ $license->id }}">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-left spacing-right">
                            License Number <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="weaponlicenses[{{ $index }}][wep_license]" value="{{ $license->wep_license }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Weapon Number <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="weaponlicenses[{{ $index }}][wep_lic_no]" value="{{ $license->wep_lic_no }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Type <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="weaponlicenses[{{ $index }}][wep_lic_type]" value="{{ $license->wep_lic_type }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Caliber <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="weaponlicenses[{{ $index }}][wep_lic_caliber]" value="{{ $license->wep_lic_caliber }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Jurisdiction <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="weaponlicenses[{{ $index }}][wep_lic_juris]" value="{{ $license->wep_lic_juris }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Tenure of Renewal <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="weaponlicenses[{{ $index }}][wep_lic_tenure]" value="{{ $license->wep_lic_tenure }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Cost of Renewal <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="weaponlicenses[{{ $index }}][wep_lic_cost]" value="{{ $license->wep_lic_cost }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Expiry date <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="weaponlicenses[{{ $index }}][wep_lic_expiry]" value="{{ $license->wep_lic_expiry }}" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Sanction Date <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="weaponlicenses[{{ $index }}][wep_lic_sancdate]" value="{{ $license->wep_lic_sancdate }}" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            License Attachment <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="weaponlicenses[{{ $index }}][wep_lic_attach]" value="{{ $license->wep_lic_attach }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($license->wep_lic_attach)
                                    <img src="{{ asset($license->wep_lic_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Weapon Dealer Name: <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="weaponlicenses[{{ $index }}][wep_lic_dealername]" value="{{ $license->wep_lic_dealername }}" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Vendor ID: <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="weaponlicenses[{{ $index }}][wep_lic_vendorid]" value="{{ $license->wep_lic_vendorid }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Scanned Stamp of License
                            <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="weaponlicenses[{{ $index }}][wep_lic_scanned]" value="{{ $license->wep_lic_scanned }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($license->wep_lic_scanned)
                                    <img src="{{ asset($license->wep_lic_scanned) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Endorsement From <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="weaponlicenses[{{ $index }}][wep_lic_category]" value="{{ $license->wep_lic_category }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Endorsement Date: <br> <input readonly class="form-control mt-1" id="wep_lic_endate"
                            name="weaponlicenses[{{ $index }}][wep_lic_endate]" value="{{ $license->wep_lic_endate }}" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right ">
                            Scanned Copy of Endorsement: <br> <input readonly class="form-control mt-1"
                            name="weaponlicenses[{{ $index }}][wep_lic_encopy]" value="{{ $license->wep_lic_encopy }}" type="file" placeholder="..."
                            style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($license->wep_lic_encopy)
                                    <img src="{{ asset($license->wep_lic_encopy) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-left" style="margin-left: -20px">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="weaponlicenses[{{ $index }}][wep_lic_ex_notes]" type="text" placeholder="..."
                                    style="width: 87%;">{{ $license->wep_lic_ex_notes }}</textarea readonly>
                            </div>
                            <div class="col-lg-5 spacing-left " style="margin-left: -45px">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="weaponlicenses[{{ $index }}][wep_lic_ex_attach]" value="{{ $license->wep_lic_ex_attach }}" type="file" placeholder="..."
                                style="width: 85%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($license->wep_lic_ex_attach)
                                        <img src="{{ asset($license->wep_lic_ex_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- <div class="new_branch mt-2">
                    <button type="button" onclick="weapon_details_add_fields()">
                        Add Details
                    </button>
                </div> --}}
            </div>
            <!--Laws-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="w_laws" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="wep_laws_notes"  type="text" placeholder="..."
                                style="width: 100%;">{{ $regulators->wep_laws_notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="wep_laws_attach" value="{{ $regulators->wep_laws_attach }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->wep_laws_attach)
                                    <img src="{{ asset($regulators->wep_laws_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
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
                <h5 style="text-align:center;">Backend Summary will be shown here </h5>
            </div>
            
            <h5>Any Other License Details</h5>
            <!--Consultant Details-->
            <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="a_consultant"
                role="tabpanel" aria-labelledby="nav-home-tab">
                <div id="otherConsultantsAccordion">
                    <!-- Existing other consultant entries -->
                    @foreach ($regulators->otherconsultants as $index => $oth_consultant)
                    <div class="accordion-item" id="otherConsultantItem{{ $index }}">
                        <h2 class="accordion-header" id="otherConsultantHeading{{ $index }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#otherConsultantCollapse{{ $index }}" aria-expanded="true" aria-controls="otherConsultantCollapse{{ $index }}">
                                Other Consultant {{ $index + 1 }}
                            </button>
                        </h2>
                        <div id="otherConsultantCollapse{{ $index }}" class="accordion-collapse collapse show" aria-labelledby="otherConsultantHeading{{ $index }}" data-bs-parent="#otherConsultantsAccordion">
                            <div class="accordion-body">
                                <div class=" row mb-2">
                                    <input readonly type="hidden" name="otherconsultants[{{ $index }}][oth_id]" value="{{ $oth_consultant->id }}">
                                    <div class="col-lg-4 spacing-right">
                                        Consultant Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="otherconsultants[{{ $index }}][other_name]" value="{{ $oth_consultant->other_name }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Designation <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="otherconsultants[{{ $index }}][other_desig]" value="{{ $oth_consultant->other_desig }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Organization <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="otherconsultants[{{ $index }}][other_org]" value="{{ $oth_consultant->other_org }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="otherconsultants[{{ $index }}][other_cell]" value="{{ $oth_consultant->other_cell }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left mt-3">
                                        Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="otherconsultants[{{ $index }}][other_email]" value="{{ $oth_consultant->other_email }}" type="text" placeholder="..." style="width: 103%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Consultancy Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="otherconsultants[{{ $index }}][other_fee]" value="{{ $oth_consultant->other_fee }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="otherconsultants[{{ $index }}][other_front]" value="{{ $oth_consultant->other_front }}" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($oth_consultant->other_front)
                                                <img src="{{ asset($oth_consultant->other_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 spacing-right spacing-left mt-3">
                                        Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="otherconsultants[{{ $index }}][other_back]" value="{{ $oth_consultant->other_back }}" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($oth_consultant->other_back)
                                                <img src="{{ asset($oth_consultant->other_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5>Consultant Bank Details :</h5>
                                <div class=" row ">
                                    <div class="col-lg-4 spacing-right">
                                        Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="otherconsultants[{{ $index }}][other_bank]" value="{{ $oth_consultant->other_bank }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Account Title <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="otherconsultants[{{ $index }}][other_account]" value="{{ $oth_consultant->other_account }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Account Number <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="otherconsultants[{{ $index }}][other_acc_no]" value="{{ $oth_consultant->other_acc_no }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Any Agreed Financials <br> <input readonly class="form-control mt-1"
                                        name="otherconsultants[{{ $index }}][other_fin]" value="{{ $oth_consultant->other_fin }}" type="file" placeholder="..."
                                        style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($oth_consultant->other_fin)
                                                <img src="{{ asset($oth_consultant->other_fin) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Notes <br> <textarea readonly class="form-control mt-1" id="" name="otherconsultants[{{ $index }}][other_notes]"
                                            type="text" placeholder="..." style="width: 100%;">{{ $oth_consultant->other_notes }}</textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Attachment <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="otherconsultants[{{ $index }}][other_attachments]" value="{{ $oth_consultant->other_attachments }}" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($oth_consultant->other_attachments)
                                                <img src="{{ asset($oth_consultant->other_attachments) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5>Consultant Address</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right ">
                                        Office No <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                        name="otherconsultants[{{ $index }}][other_office]" value="{{ $oth_consultant->other_office }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Building <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                        name="otherconsultants[{{ $index }}][other_build]" value="{{ $oth_consultant->other_build }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-5 spacing-right mt-2">
                                        Block <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                        name="otherconsultants[{{ $index }}][other_block]" value="{{ $oth_consultant->other_block }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left mt-2">
                                        Area <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                        name="otherconsultants[{{ $index }}][other_area]" value="{{ $oth_consultant->other_area }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-5 spacing-right mt-2">
                                        City <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                        name="otherconsultants[{{ $index }}][other_city]" value="{{ $oth_consultant->other_city }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left mt-2">
                                        Photograph of Building <br> <input readonly class="form-control mt-1" id=""
                                        name="otherconsultants[{{ $index }}][other_photo]" value="{{ $oth_consultant->other_photo }}" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($oth_consultant->other_photo)
                                                <img src="{{ asset($oth_consultant->other_photo) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 spacing-right mt-2">
                                        Email <br> <input readonly class="form-control mt-1" value="{{ $oth_consultant->other_a_email }}" name="otherconsultants[{{ $index }}][other_a_email]" type="email"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left mt-2">
                                        Website <br> <input readonly class="form-control mt-1" value="{{ $oth_consultant->other_web }}" name="otherconsultants[{{ $index }}][other_web]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-5 spacing-right mt-2">
                                        Pin location <br> <input readonly class="form-control mt-1" value="{{ $oth_consultant->other_pin }}" name="otherconsultants[{{ $index }}][other_pin]"
                                            type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left mt-2">
                                        GPS <br> <input readonly class="form-control mt-1" value="{{ $oth_consultant->other_gps }}" name="otherconsultants[{{ $index }}][other_gps]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-5 spacing-right mt-2">
                                        Notes <br> <textarea readonly class="form-control mt-1" id="" name="otherconsultants[{{ $index }}][other_ex_notes]"
                                            type="text" placeholder="..." style="width: 100%;">{{ $oth_consultant->other_ex_notes }}</textarea readonly>
                                    </div>
                                    <div class="col-lg-5 spacing-left mt-2">
                                        Attachments <br> <input readonly class="form-control mt-1" value="{{ $oth_consultant->other_ex_attach }}" name="otherconsultants[{{ $index }}][other_ex_attach]"
                                        type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($oth_consultant->other_ex_attach)
                                                <img src="{{ asset($oth_consultant->other_ex_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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
                
                <!-- Button to add more other consultant entries -->
               

            </div>
            <!--Address-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="a_address" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <div class="col-lg-6 spacing-left">
                    <h5>Address</h5>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Office No <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="any_a_office" value="{{ $regulators->any_a_office }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Building <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="any_a_build" value="{{ $regulators->any_a_build }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            Block <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="any_a_block" value="{{ $regulators->any_a_block }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Area <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="any_a_area" value="{{ $regulators->any_a_area }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            City <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="any_a_city" value="{{ $regulators->any_a_city }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Photograph of Building <br> <input readonly class="form-control mt-1" id=""
                            name="any_a_photo" value="{{ $regulators->any_a_photo }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->any_a_photo)
                                    <img src="{{ asset($regulators->any_a_photo) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            Email <br> <input readonly class="form-control mt-1" value="{{ $regulators->any_a_email }}" name="any_a_email" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Website <br> <input readonly class="form-control mt-1" value="{{ $regulators->any_a_web }}" name="any_a_web" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            Pin location <br> <input readonly class="form-control mt-1" value="{{ $regulators->any_a_pin }}" name="any_a_pin"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            GPS <br> <input readonly class="form-control mt-1" value="{{ $regulators->any_a_gps }}" name="any_a_gps" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2 mt-3">
                        <div class="col-lg-5 spacing-right ">
                            Notes <br> <textarea readonly class="form-control mt-1" id="" name="any_a_notes"
                                type="text" placeholder="..." style="width: 100%;">{{ $regulators->any_a_notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-5 spacing-left ">
                            Attachments <br> <input readonly class="form-control mt-1" value="{{ $regulators->any_a_attach }}" name="any_a_attach"
                            type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->any_a_attach)
                                    <img src="{{ asset($regulators->any_a_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="a_issuing" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <div class="col-lg-12" id="lisence_authority_add_fields">
                    @foreach ($regulators->otherissuings as $index => $oth_issuing)
                    <div class="row mb-2">
                        <input readonly type="hidden" name="otherissuings[{{ $index }}][othi_id]" value="{{ $oth_issuing->id }}">
                        <div class="col-lg-3 spacing-right">
                            Concerned Officer Name <br> <input readonly class="form-control mt-1"
                                id="other_cn_officer"  name="otherissuings[{{ $index }}][other_iss_co_name]" value="{{ $oth_issuing->other_iss_co_name }}" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-3 spacing-left spacing-right">
                            Designation <br> <input readonly class="form-control mt-1" id="oper_desig"
                            name="otherissuings[{{ $index }}][other_iss_co_desig]" value="{{ $oth_issuing->other_iss_co_desig }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-3 spacing-right">
                            Department <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="otherissuings[{{ $index }}][other_iss_co_dept]" value="{{ $oth_issuing->other_iss_co_dept }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-3 spacing-right">
                            Section <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="otherissuings[{{ $index }}][other_iss_co_section]" value="{{ $oth_issuing->other_iss_co_section }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-3 spacing-right mt-3">
                            PTCL Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="otherissuings[{{ $index }}][other_iss_co_ptcl]" value="{{ $oth_issuing->other_iss_co_ptcl }}" type="text" placeholder="..." style="width: 100%;">
                        </div>

                        <div class="col-lg-3 spacing-left mt-3">
                            Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="otherissuings[{{ $index }}][other_iss_co_cell]" value="{{ $oth_issuing->other_iss_co_cell }}" type="text" placeholder="..." style="width: 105%;">
                        </div>
                        <div class="col-lg-3 spacing-right mt-3">
                            Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="otherissuings[{{ $index }}][other_iss_co_email]" value="{{ $oth_issuing->other_iss_co_email }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-3 spacing-right mt-3">
                            Website <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="otherissuings[{{ $index }}][other_iss_co_web]" value="{{ $oth_issuing->other_iss_co_web }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-3 spacing-right mt-3">
                            Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="otherissuings[{{ $index }}][other_iss_co_front]" value="{{ $oth_issuing->other_iss_co_front }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($oth_issuing->other_iss_co_front)
                                    <img src="{{ asset($oth_issuing->other_iss_co_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 spacing-right spacing-left mt-3">
                            Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="otherissuings[{{ $index }}][other_iss_co_back]" value="{{ $oth_issuing->other_iss_co_back }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($oth_issuing->other_iss_co_back)
                                    <img src="{{ asset($oth_issuing->other_iss_co_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2 mt-2">
                            <div class="col-lg-5 spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="otherissuings[{{ $index }}][other_iss_co_notes]" type="text" placeholder="..."
                                    style="width: 100%;">{{ $oth_issuing->other_iss_co_notes }}</textarea readonly>
                            </div>
                            <div class="col-lg-5 spacing-left mt-3">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="otherissuings[{{ $index }}][other_iss_co_attach]" value="{{ $oth_issuing->other_iss_co_attach }}" type="file" placeholder="..."
                                style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($oth_issuing->other_iss_co_attach)
                                        <img src="{{ asset($oth_issuing->other_iss_co_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- <div class="new_branch mt-2">
                    <button type="button" onclick="lisence_authority_add_fields()">
                        Add authority
                    </button>
                </div>
                <div class="new_branch mt-2">
                    <button type="button" id="add_new_renewal_btn">
                        Submit
                    </button>
                </div> --}}
            </div>
            <!--Renewals-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="a_weapon_renewals" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <h5>Renewal Application : </h5>
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Initiating Date <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="any_ra_date" value="{{ $regulators->any_ra_date }}" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Request Letter Attachment <br> <input readonly class="form-control mt-1"
                            id="head_office_email" name="any_ra_letter" value="{{ $regulators->any_ra_letter }}" type="file" placeholder="..."
                            style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->any_ra_letter)
                                    <img src="{{ asset($regulators->any_ra_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Document Submitted with Renewal Application <br> <input readonly
                            class="form-control mt-1" id="" value="{{ $regulators->any_ra_docs }}" name="any_ra_docs" type="file"
                            placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->any_ra_docs)
                                    <img src="{{ asset($regulators->any_ra_docs) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="any_ra_notes" type="text" placeholder="..."
                                style="width: 100%;">{{ $regulators->any_ra_notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-4 spacing-left">
                            Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="any_ra_attach" value="{{ $regulators->any_ra_attach }}" type="file" placeholder="..." style="width: 103%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->any_ra_attach)
                                    <img src="{{ asset($regulators->any_ra_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <h5>Renewal Correspondence :</h5>
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Correspondence Date <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="any_rc_date" value="{{ $regulators->any_rc_date }}" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Correspondence Letter Attachment <br> <input readonly class="form-control mt-1"
                            id="head_office_name" value="{{ $regulators->any_rc_letter }}" name="any_rc_letter" type="file" placeholder="..."
                            style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->any_rc_letter)
                                    <img src="{{ asset($regulators->any_rc_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Document Submitted with Renewal Correspondence <br> <input readonly
                            class="form-control mt-1" id="head_office_name" value="{{ $regulators->any_rc_docs }}" name="any_rc_docs"
                            type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->any_rc_docs)
                                    <img src="{{ asset($regulators->any_rc_docs) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="any_rc_notes" type="text" placeholder="..."
                                style="width: 100%;">{{ $regulators->any_rc_notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="any_rc_attach" value="{{ $regulators->any_rc_attach }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->any_rc_attach)
                                    <img src="{{ asset($regulators->any_rc_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h5>Renewal Approval :</h5>
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Approval Date <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="any_rap_date" value="{{ $regulators->any_rap_date }}" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Approval Letter Attachment <br> <input readonly class="form-control mt-1"
                            id="head_office_name" value="{{ $regulators->any_rap_letter }}" name="any_rap_letter" type="file" placeholder="..."
                            style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->any_rap_letter)
                                    <img src="{{ asset($regulators->any_rap_letter) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Document Submitted with Renewal Approval <br> <input readonly class="form-control mt-1"
                            id="head_office_name" value="{{ $regulators->any_rap_docs }}" name="any_rap_docs" type="file" placeholder="..."
                            style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->any_rap_docs)
                                    <img src="{{ asset($regulators->any_rap_docs) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="any_rap_notes" type="text" placeholder="..."
                                style="width: 100%;">{{ $regulators->any_rap_notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="any_rap_attach" value="{{ $regulators->any_rap_attach }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->any_rap_attach)
                                    <img src="{{ asset($regulators->any_rap_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="lisence_finance_add_fields">
                    
                    <h3 style="border: 2px solid black; width: 99%; padding: 10px;"><b>Finances :</b></h3>
                    @foreach ($regulators->otherrenewals as $index => $othr_renewal)
                    <div>
                        <input readonly type="hidden" name="otherrenewals[{{ $index }}][othr_id]" value="{{ $othr_renewal->id }}">
                        <div class="col-lg-6 spacing-right mb-3">
                            Category <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="otherrenewals[{{ $index }}][other_fee_category]" value="{{ $othr_renewal->other_fee_category }}" type="text" placeholder="..."
                            style="width: 100%;">
                        </div>

                        <h5 style="margin-left:10px;">Withdrawal From:</h5>
                        <div class="col-lg-12">
                            <div class="row mb-2">
                                <div class="col-lg-4 spacing-right">
                                    Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="otherrenewals[{{ $index }}][other_finance_bank]" value="{{ $othr_renewal->other_finance_bank }}" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right">
                                    Cheque/Instrument No. <br> <input readonly class="form-control mt-1"
                                    name="otherrenewals[{{ $index }}][other_finance_cheque]" value="{{ $othr_renewal->other_finance_cheque }}" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Scanned copy of Cheque/Instrument<br> <input readonly class="form-control mt-1"
                                    name="otherrenewals[{{ $index }}][other_finance_copy]" value="{{ $othr_renewal->other_finance_copy }}" type="file"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-3">
                                    Amount in figures <br> <input readonly class="form-control mt-1"
                                    name="otherrenewals[{{ $index }}][other_finance_amount]" value="{{ $othr_renewal->other_finance_amount }}" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                    Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="otherrenewals[{{ $index }}][other_finance_notes]" type="text" placeholder="..."
                                        style="width: 100%;">{{ $othr_renewal->other_finance_notes }}</textarea readonly>
                                </div>
                                <div class="col-lg-4 spacing-left spacing-rightmt-3">
                                    Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="otherrenewals[{{ $index }}][other_finance_attach]" value="{{ $othr_renewal->other_finance_attach }}" type="file" placeholder="..."
                                    style="width: 100%;">
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="image-preview42" id="imagePreview42">
                                            @if($othr_renewal->other_finance_attach)
                                            <img src="{{ asset($othr_renewal->other_finance_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <h5>Withdrawal By :</h5>
                                <div class="col-lg-4 spacing-right">
                                    Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="otherrenewals[{{ $index }}][other_finance_wb_name]" value="{{ $othr_renewal->other_finance_wb_name }}" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right">
                                    Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="otherrenewals[{{ $index }}][other_finance_wb_id]" value="{{ $othr_renewal->other_finance_wb_id }}" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="otherrenewals[{{ $index }}][other_finance_wb_desig]" value="{{ $othr_renewal->other_finance_wb_desig }}" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-3">
                                    Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="otherrenewals[{{ $index }}][other_finance_wb_cell]" value="{{ $othr_renewal->other_finance_wb_cell }}" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left mt-3">
                                    Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="otherrenewals[{{ $index }}][other_finance_wb_email]" value="{{ $othr_renewal->other_finance_wb_email }}" type="text" placeholder="..."
                                        style="width: 103%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                    Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="otherrenewals[{{ $index }}][other_finance_wb_notes]"  type="text" placeholder="..."
                                        style="width: 100%;">{{ $othr_renewal->other_finance_wb_notes }}</textarea readonly>
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="otherrenewals[{{ $index }}][other_finance_wb_attach]" value="{{ $othr_renewal->other_finance_wb_attach }}" type="file" placeholder="..."
                                    style="width: 100%;">
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="image-preview42" id="imagePreview42">
                                            @if($othr_renewal->other_finance_wb_attach)
                                            <img src="{{ asset($othr_renewal->other_finance_wb_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mt-2">Fees :</h5>
                                <div class="col-lg-4 spacing-right">
                                    Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="otherrenewals[{{ $index }}][other_finance_fee]" value="{{ $othr_renewal->other_finance_fee }}" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right lh-lg">
                                    Date of Fees Deposit <br> <input readonly class="form-control mt-1"
                                    name="otherrenewals[{{ $index }}][other_finance_fee_date]" value="{{ $othr_renewal->other_finance_fee_date }}" type="date"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right lh-lg">
                                    Name of bank<br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="otherrenewals[{{ $index }}][other_finance_fee_bank]" value="{{ $othr_renewal->other_finance_fee_bank }}" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-3">
                                    Instrument Number <br> <input readonly class="form-control mt-1"
                                    name="otherrenewals[{{ $index }}][other_finance_fee_ins]" value="{{ $othr_renewal->other_finance_fee_ins }}" type="text"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                    Deposit Slip Attachment <br> <input readonly class="form-control mt-1"
                                    name="otherrenewals[{{ $index }}][other_finance_slip_attach]" value="{{ $othr_renewal->other_finance_slip_attach }}" type="file"
                                    placeholder="..." style="width: 100%;">
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="image-preview42" id="imagePreview42">
                                            @if($othr_renewal->other_finance_slip_attach)
                                            <img src="{{ asset($othr_renewal->other_finance_slip_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 spacing-right mt-3">
                                    Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="otherrenewals[{{ $index }}][other_finance_fee_notes]" type="text" placeholder="..."
                                        style="width: 100%;">{{ $othr_renewal->other_finance_fee_notes }}</textarea readonly>
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                    Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="otherrenewals[{{ $index }}][other_finance_fee_attach]" value="{{ $othr_renewal->other_finance_fee_attach }}" type="file" placeholder="..."
                                    style="width: 100%;">
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="image-preview42" id="imagePreview42">
                                            @if($othr_renewal->other_finance_fee_attach)
                                            <img src="{{ asset($othr_renewal->other_finance_fee_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mt-2">Deposited By :</h5>
                                <div class="col-lg-4 spacing-right">
                                    Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="otherrenewals[{{ $index }}][other_finance_db_name]" value="{{ $othr_renewal->other_finance_db_name }}" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right">
                                    Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="otherrenewals[{{ $index }}][other_finance_db_id]" value="{{ $othr_renewal->other_finance_db_id }}" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="otherrenewals[{{ $index }}][other_finance_db_desig]" value="{{ $othr_renewal->other_finance_db_desig }}" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right mt-3">
                                    Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="otherrenewals[{{ $index }}][other_finance_db_cell]" value="{{ $othr_renewal->other_finance_db_cell }}" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left mt-3">
                                    Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="otherrenewals[{{ $index }}][other_finance_db_email]" value="{{ $othr_renewal->other_finance_db_email }}" type="text" placeholder="..."
                                        style="width: 103%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right mt-3">
                                    Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="otherrenewals[{{ $index }}][other_finance_db_notes]" type="text" placeholder="..."
                                        style="width: 100%;">{{ $othr_renewal->other_finance_db_notes }}</textarea readonly>
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="otherrenewals[{{ $index }}][other_finance_db_attach]" value="{{ $othr_renewal->other_finance_db_attach }}" type="file" placeholder="..."
                                    style="width: 100%;">
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="image-preview42" id="imagePreview42">
                                            @if($othr_renewal->other_finance_db_attach)
                                            <img src="{{ asset($othr_renewal->other_finance_db_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- <div class="new_branch mt-2">
                    <button type="button" onclick="lisence_finance_add_fields()">
                        Add Finance
                    </button>
                </div> --}}
            </div>
            <!--Laws-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="a_laws" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                name="any_laws_notes" type="text" placeholder="..."
                                style="width: 100%;">{{ $regulators->any_laws_notes }}</textarea readonly>
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="any_laws_attach" value="{{ $regulators->any_laws_attach }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="image-preview42" id="imagePreview42">
                                    @if($regulators->any_laws_attach)
                                    <img src="{{ asset($regulators->any_laws_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                    <span class="image-preview__default-text42">Image Preview</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--Renewals History-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="a_history" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <h5 style="text-align:center;">Backend Summary will be shown here </h5>
            </div>
          
        </form>

    </section>
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

        const element = document.getElementById('regulator_form');
        if (element) {
            const options = {
                margin: 1,
                filename: 'regulatory_information.pdf',
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
            console.error('Element with ID "training_form" not found.');
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
        formData.append('cc', cc); // Append CC value
        formData.append('bcc', bcc); // Append BCC value
        formData.append('subject', subject);
        formData.append('body', body);

        // Generate PDF and send it via email
        const element = document.getElementById('regulator_form');
        if (element) {
            const options = {
                margin: 1,
                filename: 'regulatory_information.pdf',
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
            console.error('Element with ID "training_form" not found.');
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
    let consultantCount = {{ count($regulators->operatingconsultants) }};

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
                <div id="consultantCollapse${consultantCount}" class="accordion-collapse collapse show" aria-labelledby="consultantHeading${consultantCount}" >
                    <div class="accordion-body">
                        <div class=" row mb-2">
                            <input readonly type="hidden" name="operatingconsultants[${consultantCount - 1}][opc_id]" value="">
                            
                            <div class="col-lg-4 spacing-right">
                                Consultant Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingconsultants[${consultantCount - 1}][oper_name]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Designation <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="operatingconsultants[${consultantCount - 1}][oper_desig]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Organization <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingconsultants[${consultantCount - 1}][oper_org]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingconsultants[${consultantCount - 1}][oper_cell]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingconsultants[${consultantCount - 1}][oper_email]" value="" type="text" placeholder="..." style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Consultancy Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingconsultants[${consultantCount - 1}][oper_fee]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingconsultants[${consultantCount - 1}][oper_front][]" value="" type="file" placeholder="..." style="width: 100%;" multiple>
                                <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
                                    <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
                                        @if($op_consultant->oper_front)
                                            @php
                                                $attachments = explode(',', $op_consultant->oper_front);
                                            @endphp
                                            @foreach ($attachments as $attachment)
                                                <div style="padding: 10px;">
                                                    @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
                                                        <!-- Display Image -->
                                                        <img src="{{ asset($attachment) }}" alt="Image Preview" class="preview-image" style="height: 120px; width: 120px;">
                                                    @elseif (Str::endsWith($attachment, ['.pdf']))
                                                        <!-- Display PDF -->
                                                        <embed src="{{ asset($attachment) }}" type="application/pdf" class="preview-pdf" style="width:100px; height:100px;" />
                                                        <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download PDF</a>
                                                    @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
                                                        <!-- Display Excel Sheet -->
                                                        <div class="preview-excel" style="text-align: center;">
                                                            <p>Excel Sheet Name: {{ pathinfo($attachment)['basename'] }}</p>
                                                            <a href="{{ asset($attachment) }}">Download Excel Sheet</a>
                                                        </div>
                                                    @else
                                                        <span class="preview-default-text">Preview</span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        @else
                                            <span class="preview-default-text">No attachments found</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 spacing-right spacing-left mt-3">
                                Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingconsultants[${consultantCount - 1}][oper_back]" value="" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($op_consultant->oper_back)
                                        <img src="{{ asset($op_consultant->oper_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5>Consultant Bank Details :</h5>
                        <div class=" row ">
                            <div class="col-lg-4 spacing-right">
                                Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingconsultants[${consultantCount - 1}][oper_bank]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Account Title <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="operatingconsultants[${consultantCount - 1}][oper_account]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Account Number <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="operatingconsultants[${consultantCount - 1}][oper_acc_no]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Any Agreed Financials <br> <input readonly class="form-control mt-1"
                                id="head_office_email" value=""  name="operatingconsultants[${consultantCount - 1}][oper_fin]" type="file" placeholder="..."
                                style="width: 100%;">
                                <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
                                    <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
                                        @if($op_consultant->oper_fin)
                                            @php
                                                $attachments = explode(',', $op_consultant->oper_fin);
                                            @endphp
                                            @foreach ($attachments as $attachment)
                                                <div style="padding: 10px;">
                                                    @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
                                                        <!-- Display Image -->
                                                        <img src="{{ asset($attachment) }}" alt="Image Preview" class="preview-image" style="height: 120px; width: 120px;">
                                                    @elseif (Str::endsWith($attachment, ['.pdf']))
                                                        <!-- Display PDF -->
                                                        <embed src="{{ asset($attachment) }}" type="application/pdf" class="preview-pdf" style="width:100px; height:100px;" />
                                                        <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download PDF</a>
                                                    @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
                                                        <!-- Display Excel Sheet -->
                                                        <div class="preview-excel" style="text-align: center;">
                                                            <p>Excel Sheet Name: {{ pathinfo($attachment)['basename'] }}</p>
                                                            <a href="{{ asset($attachment) }}">Download Excel Sheet</a>
                                                        </div>
                                                    @else
                                                        <span class="preview-default-text">Preview</span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        @else
                                            <span class="preview-default-text">No attachments found</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" 
                                    type="text"  name="operatingconsultants[${consultantCount - 1}][oper_notes]" placeholder="..." style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachment <br> <input readonly class="form-control mt-1" value="" id="head_office_email"
                                name="operatingconsultants[${consultantCount - 1}][oper_attachments]" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
                                    <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
                                        @if($op_consultant->oper_attachments)
                                            @php
                                                $attachments = explode(',', $op_consultant->oper_attachments);
                                            @endphp
                                            @foreach ($attachments as $attachment)
                                                <div style="padding: 10px;">
                                                    @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
                                                        <!-- Display Image -->
                                                        <img src="{{ asset($attachment) }}" alt="Image Preview" class="preview-image" style="height: 120px; width: 120px;">
                                                    @elseif (Str::endsWith($attachment, ['.pdf']))
                                                        <!-- Display PDF -->
                                                        <embed src="{{ asset($attachment) }}" type="application/pdf" class="preview-pdf" style="width:100px; height:100px;" />
                                                        <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download PDF</a>
                                                    @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
                                                        <!-- Display Excel Sheet -->
                                                        <div class="preview-excel" style="text-align: center;">
                                                            <p>Excel Sheet Name: {{ pathinfo($attachment)['basename'] }}</p>
                                                            <a href="{{ asset($attachment) }}">Download Excel Sheet</a>
                                                        </div>
                                                    @else
                                                        <span class="preview-default-text">Preview</span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        @else
                                            <span class="preview-default-text">No attachments found</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5>Consultant Address</h5>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right ">
                                Office No <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="operatingconsultants[${consultantCount - 1}][oper_office]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Building <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="operatingconsultants[${consultantCount - 1}][oper_build]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-5 spacing-right mt-2">
                                Block <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="operatingconsultants[${consultantCount - 1}][oper_block]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Area <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="operatingconsultants[${consultantCount - 1}][oper_area]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-5 spacing-right mt-2">
                                City <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="operatingconsultants[${consultantCount - 1}][oper_city]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Photograph of Building <br> <input readonly class="form-control mt-1" id=""
                                name="operatingconsultants[${consultantCount - 1}][oper_photo]" value="" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($op_consultant->oper_photo)
                                        <img src="{{ asset($op_consultant->oper_photo) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 spacing-right mt-2">
                                Email <br> <input readonly class="form-control mt-1"  name="operatingconsultants[${consultantCount - 1}][oper_a_email]" value="" type="email"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Website <br> <input readonly class="form-control mt-1"  name="operatingconsultants[${consultantCount - 1}][oper_web]" value="" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-5 spacing-right mt-2">
                                Pin location <br> <input readonly class="form-control mt-1" value=""  name="operatingconsultants[${consultantCount - 1}][oper_pin]"
                                    type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                GPS <br> <input readonly class="form-control mt-1" value=""  name="operatingconsultants[${consultantCount - 1}][oper_gps]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-5 spacing-right mt-2">
                                Notes <br> <textarea readonly class="form-control mt-1"  name="operatingconsultants[${consultantCount - 1}][oper_ex_notes]"
                                    type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Attachments <br> <input readonly class="form-control mt-1"  name="operatingconsultants[${consultantCount - 1}][oper_ex_attach]" value=""
                                type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
                                    <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
                                        @if($op_consultant->oper_ex_attach)
                                            @php
                                                $attachments = explode(',', $op_consultant->oper_ex_attach);
                                            @endphp
                                            @foreach ($attachments as $attachment)
                                                <div style="padding: 10px;">
                                                    @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
                                                        <!-- Display Image -->
                                                        <img src="{{ asset($attachment) }}" alt="Image Preview" class="preview-image" style="height: 120px; width: 120px;">
                                                    @elseif (Str::endsWith($attachment, ['.pdf']))
                                                        <!-- Display PDF -->
                                                        <embed src="{{ asset($attachment) }}" type="application/pdf" class="preview-pdf" style="width:100px; height:100px;" />
                                                        <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download PDF</a>
                                                    @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
                                                        <!-- Display Excel Sheet -->
                                                        <div class="preview-excel" style="text-align: center;">
                                                            <p>Excel Sheet Name: {{ pathinfo($attachment)['basename'] }}</p>
                                                            <a href="{{ asset($attachment) }}">Download Excel Sheet</a>
                                                        </div>
                                                    @else
                                                        <span class="preview-default-text">Preview</span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        @else
                                            <span class="preview-default-text">No attachments found</span>
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
        $('#consultantsAccordion').append(newEntryHtml);
    }

    // Add event listener to the "Add More Consultant Entry" button
    $('#addConsultant').on('click', function() {
        addConsultantEntry();
    });
</script>

<script>
    // Counter to track the number of operating authority entries
    let operatingAuthorityCount = {{ count($regulators->operatingissuings) }};

    // Function to add a new operating authority entry
    function addOperatingAuthorityEntry() {
        operatingAuthorityCount++; 
        const newEntryHtml = `
            <div class="accordion-item" id="operatingAuthorityItem${operatingAuthorityCount}">
                <h2 class="accordion-header" id="operatingAuthorityHeading${operatingAuthorityCount}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#operatingAuthorityCollapse${operatingAuthorityCount}" aria-expanded="true" aria-controls="operatingAuthorityCollapse${operatingAuthorityCount}">
                        Operating Authority Entry ${operatingAuthorityCount}
                    </button>
                </h2>
                <div id="operatingAuthorityCollapse${operatingAuthorityCount}" class="accordion-collapse collapse show" aria-labelledby="operatingAuthorityHeading${operatingAuthorityCount}" data-bs-parent="#operatingAuthorityAccordion">
                    <div class="accordion-body">
                        <input readonly type="hidden" name="operatingissuings[${operatingAuthorityCount - 1}][opi_id]" value="">
                        <div class="row mb-2">
                            <div class="col-lg-3 spacing-right">
                                Concerned Officer Name <br> <input readonly class="form-control mt-1"
                                    name="operatingissuings[{{ $index }}][oper_iss_co_name]" name="operatingissuings[${operatingAuthorityCount - 1}][oper_iss_co_name]" value="" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-left spacing-right">
                                Designation <br> <input readonly class="form-control mt-1" id="oper_desig"
                                name="operatingissuings[{{ $index }}][oper_iss_co_desig]" name="operatingissuings[${operatingAuthorityCount - 1}][oper_iss_co_desig]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                                Department <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingissuings[{{ $index }}][oper_iss_co_dept]" name="operatingissuings[${operatingAuthorityCount - 1}][oper_iss_co_dept]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                                Section <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingissuings[{{ $index }}][oper_iss_co_section]" name="operatingissuings[${operatingAuthorityCount - 1}][oper_iss_co_section]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right mt-3">
                                PTCL Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingissuings[{{ $index }}][oper_iss_co_ptcl]" name="operatingissuings[${operatingAuthorityCount - 1}][oper_iss_co_ptcl]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>

                            <div class="col-lg-3 spacing-left mt-3">
                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingissuings[{{ $index }}][oper_iss_co_cell]" name="operatingissuings[${operatingAuthorityCount - 1}][oper_iss_co_cell]" value="" type="text" placeholder="..." style="width: 105%;">
                            </div>
                            <div class="col-lg-3 spacing-right mt-3">
                                Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingissuings[{{ $index }}][oper_iss_co_email]" name="operatingissuings[${operatingAuthorityCount - 1}][oper_iss_co_email]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right mt-3">
                                Website <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingissuings[{{ $index }}][oper_iss_co_web]" name="operatingissuings[${operatingAuthorityCount - 1}][oper_iss_co_web]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right mt-3">
                                Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingissuings[{{ $index }}][oper_iss_co_front]" name="operatingissuings[${operatingAuthorityCount - 1}][oper_iss_co_front]" value="" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($op_issuing->oper_iss_co_front)
                                        <img src="{{ asset($op_issuing->oper_iss_co_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 spacing-right spacing-left mt-3">
                                Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingissuings[{{ $index }}][oper_iss_co_back]" name="operatingissuings[${operatingAuthorityCount - 1}][oper_iss_co_back]" value="" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($op_issuing->oper_iss_co_back)
                                        <img src="{{ asset($op_issuing->oper_iss_co_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2 mt-2">
                                <div class="col-lg-5 spacing-right mt-3">
                                    Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="operatingissuings[${operatingAuthorityCount - 1}][oper_iss_co_notes]" type="text" placeholder="..."
                                        style="width: 100%;"></textarea readonly>
                                </div>
                                <div class="col-lg-5 spacing-left mt-3">
                                    Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="operatingissuings[${operatingAuthorityCount - 1}][oper_iss_co_attach]" value="" type="file" placeholder="..."
                                    style="width: 100%;" multiple>
                                    <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
                                        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
                                            @if($op_issuing->oper_iss_co_attach)
                                                @php
                                                    $attachments = explode(',', $op_issuing->oper_iss_co_attach);
                                                @endphp
                                                @foreach ($attachments as $attachment)
                                                    <div style="padding: 10px;">
                                                        @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
                                                            <!-- Display Image -->
                                                            <img src="{{ asset($attachment) }}" alt="Image Preview" class="preview-image" style="height: 120px; width: 120px;">
                                                        @elseif (Str::endsWith($attachment, ['.pdf']))
                                                            <!-- Display PDF -->
                                                            <embed src="{{ asset($attachment) }}" type="application/pdf" class="preview-pdf" style="width:100px; height:100px;" />
                                                            <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download PDF</a>
                                                        @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
                                                            <!-- Display Excel Sheet -->
                                                            <div class="preview-excel" style="text-align: center;">
                                                                <p>Excel Sheet Name: {{ pathinfo($attachment)['basename'] }}</p>
                                                                <a href="{{ asset($attachment) }}">Download Excel Sheet</a>
                                                            </div>
                                                        @else
                                                            <span class="preview-default-text">Preview</span>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @else
                                                <span class="preview-default-text">No attachments found</span>
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
        // Append the new entry HTML to the container
        $('#operating_authority_add_fields').append(newEntryHtml);
    }

    // Add event listener to the button for adding more operating authority entries
    $('#addOperatingAuthority').on('click', function() {
        addOperatingAuthorityEntry();
    });
</script>


<script>
    // Counter to track the number of operating renewal entries
    let operatingRenewalCount = {{ count($regulators->operatingrenewals) }};

    // Function to add a new operating renewal entry
    function addOperatingRenewalEntry() {
        operatingRenewalCount++; // Increment the counter
        const newEntryHtml = `
            <div class="accordion-item" id="operatingRenewalItem${operatingRenewalCount}">
                <h2 class="accordion-header" id="operatingRenewalHeading${operatingRenewalCount}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#operatingRenewalCollapse${operatingRenewalCount}" aria-expanded="true" aria-controls="operatingRenewalCollapse${operatingRenewalCount}">
                        Operating Renewal Entry ${operatingRenewalCount}
                    </button>
                </h2>
                <div id="operatingRenewalCollapse${operatingRenewalCount}" class="accordion-collapse collapse show" aria-labelledby="operatingRenewalHeading${operatingRenewalCount}" data-bs-parent="#operatingRenewalsAccordion">
                    <div class="accordion-body">
                        <div>
                            <h3 style="border: 2px solid black; width: 99%; padding: 10px;"><b>Finances :</b></h3>
                            <input readonly type="hidden" name="operatingrenewals[${operatingAuthorityCount - 1}][opr_id]" value="">
                            <div class="col-lg-6 spacing-right mb-3">
                                Category <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="operatingrenewals[{{ $index }}][oper_fee_category]" name="operatingrenewals[${operatingAuthorityCount - 1}][oper_fee_category]" value="" type="text" placeholder="..."
                                style="width: 100%;"> 
                            </div>

                            <h5 style="margin-left:10px;">Withdrawal From:</h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[{{ $index }}][oper_finance_bank]" name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_bank]" value="" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Cheque/Instrument No. <br> <input readonly class="form-control mt-1"
                                            id="head_office_email" value="" name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_cheque]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Scanned copy of Cheque/Instrument<br> <input readonly class="form-control mt-1"
                                        id="head_office_name" value="" name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_copy]" type="file"
                                        placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($op_renewal->oper_finance_copy)
                                                <img src="{{ asset($op_renewal->oper_finance_copy) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Amount in figures <br> <input readonly class="form-control mt-1"
                                            id="head_office_name" value="" name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_amount]"  type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_notes]" type="text" placeholder="..."
                                            style="width: 100%;">{{ $op_renewal->oper_finance_notes }}</textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-rightmt-3">
                                        Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_attach]" value="" type="file" placeholder="..."
                                        style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($op_renewal->oper_finance_attach)
                                                <img src="{{ asset($op_renewal->oper_finance_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Withdrawal By :</h5>
                                    <div class="col-lg-4 spacing-right">
                                        Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_wb_name]" value="" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_wb_id]" value="" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_wb_desig]" value="" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_wb_cell]" value="" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left mt-3">
                                        Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_wb_email]" value="" type="text" placeholder="..."
                                            style="width: 103%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_wb_notes]" type="text" placeholder="..."
                                            style="width: 100%;"></textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_wb_attach]"  value="" type="file" placeholder="..."
                                        style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($op_renewal->oper_finance_wb_attach)
                                                <img src="{{ asset($op_renewal->oper_finance_wb_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mt-2">Fees :</h5>
                                    <div class="col-lg-4 spacing-right">
                                        Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_fee]" value="" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right lh-lg">
                                        Date of Fees Deposit <br> <input readonly class="form-control mt-1"
                                            id="head_office_email" value="" name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_fee_date]" type="date"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right lh-lg">
                                        Name of bank<br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_fee_bank]" value="" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Instrument Number <br> <input readonly class="form-control mt-1"
                                            id="head_office_name" value="" name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_fee_ins]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Deposit Slip Attachment <br> <input readonly class="form-control mt-1"
                                        id="head_office_email" value="" name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_slip_attach]" type="file"
                                        placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($op_renewal->oper_finance_slip_attach)
                                                <img src="{{ asset($op_renewal->oper_finance_slip_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_fee_notes]" type="text" placeholder="..."
                                            style="width: 100%;"></textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_fee_attach]" value="" type="file" placeholder="..."
                                        style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($op_renewal->oper_finance_fee_attach)
                                                <img src="{{ asset($op_renewal->oper_finance_fee_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mt-2">Deposited By :</h5>
                                    <div class="col-lg-4 spacing-right">
                                        Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_db_name]" value="" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_db_id]" value="" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_db_desig]" value="" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right mt-3">
                                        Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_db_desig]" value="" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left mt-3">
                                        Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_db_email]" value="" type="text" placeholder="..."
                                            style="width: 103%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right mt-3">
                                        Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_db_notes]" type="text" placeholder="..."
                                            style="width: 100%;"></textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="operatingrenewals[${operatingAuthorityCount - 1}][oper_finance_db_attach]" value="" type="file" placeholder="..."
                                        style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($op_renewal->oper_finance_db_attach)
                                                <img src="{{ asset($op_renewal->oper_finance_db_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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
        // Append the new entry HTML to the container
        $('#operatingRenewalsAccordion').append(newEntryHtml);
    }

    // Add event listener to the button for adding more operating renewal entries
    $('#addOperatingRenewal').on('click', function() {
        addOperatingRenewalEntry();
    });
</script>


{{-- //  Weapon starts --}}
<script>
    // Counter to track the number of weapon consultant entries
    let weaponConsultantCount = {{ count($regulators->weaponconsultants) }};

    function addWeaponConsultantEntry() {
        weaponConsultantCount++; // Increment the counter
        const newEntryHtml = `
            <div class="accordion-item" id="weaponConsultantItem${weaponConsultantCount}">
                <h2 class="accordion-header" id="weaponConsultantHeading${weaponConsultantCount}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#weaponConsultantCollapse${weaponConsultantCount}" aria-expanded="true" aria-controls="weaponConsultantCollapse${weaponConsultantCount}">
                        Weapon Consultant ${weaponConsultantCount}
                    </button>
                </h2>
                <div id="weaponConsultantCollapse${weaponConsultantCount}" class="accordion-collapse collapse show" aria-labelledby="weaponConsultantHeading${weaponConsultantCount}" data-bs-parent="#weaponConsultantsAccordion">
                    <div class="accordion-body">
                        <input readonly type="hidden" name="weaponconsultants[${weaponConsultantCount - 1}][we_id]" value="">
                        <div class=" row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="weaponconsultants[${weaponConsultantCount - 1}][wep_bank]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Account Title <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="weaponconsultants[${weaponConsultantCount - 1}][wep_acc]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Account Number <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="weaponconsultants[${weaponConsultantCount - 1}][wep_acc_no]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Any Agreed Financials <br> <input readonly class="form-control mt-1"
                                name="weaponconsultants[${weaponConsultantCount - 1}][wep_fin]" value="" type="file" placeholder="..."
                                style="width: 100%;">
                             
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="" name="weaponconsultants[${weaponConsultantCount - 1}][wep_notes]"
                                    type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachment <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="weaponconsultants[${weaponConsultantCount - 1}][wep_attach]" value="" type="file" placeholder="..." style="width: 100%;">
                               
                            </div>
                        </div>
                        <h5>Consultant Address</h5>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Office No <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="weaponconsultants[${weaponConsultantCount - 1}][wep_office]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Building <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="weaponconsultants[${weaponConsultantCount - 1}][wep_build]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right mt-2">
                                Block <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="weaponconsultants[${weaponConsultantCount - 1}][wep_block]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Area <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="weaponconsultants[${weaponConsultantCount - 1}][wep_area]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right mt-2">
                                City <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="weaponconsultants[${weaponConsultantCount - 1}][wep_city]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Photograph of Building <br> <input readonly class="form-control mt-1" id=""
                                name="weaponconsultants[${weaponConsultantCount - 1}][wep_photo]" value="" type="file" placeholder="..." style="width: 100%;">
                              
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right mt-2">
                                Email <br> <input readonly class="form-control mt-1" value="" name="weaponconsultants[${weaponConsultantCount - 1}][wep_a_email]"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Website <br> <input readonly class="form-control mt-1" value="" name="weaponconsultants[${weaponConsultantCount - 1}][wep_web]"
                                    placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right mt-2">
                                Pin location <br> <input readonly class="form-control mt-1" value="" name="weaponconsultants[${weaponConsultantCount - 1}][wep_pin]"
                                    type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                GPS <br> <input readonly class="form-control mt-1" value="" name="weaponconsultants[${weaponConsultantCount - 1}][wep_gps]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-5 spacing-right ">
                                Notes <br> <textarea readonly class="form-control mt-1" name="weaponconsultants[${weaponConsultantCount - 1}][wep_ex_notes]" 
                                    type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Attachments <br> <input readonly class="form-control mt-1" value="" name="weaponconsultants[${weaponConsultantCount - 1}][wep_ex_attach]"
                                type="file" placeholder="..." style="width: 100%;">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        // Append the new entry HTML to the container
        $('#weaponConsultantsAccordion').append(newEntryHtml);
    }

    // Add event listener to the button for adding more weapon consultant entries
    $('#addWeaponConsultant').on('click', function() {
        addWeaponConsultantEntry();
    });
</script>

<!-- Script for dynamic addition of weapon issuing entries -->
<script>
    // Counter to track the number of weapon issuing entries
    let weaponIssuingCount = {{ count($regulators->weaponissuings) }};

    // Function to add a new weapon issuing entry
    function addWeaponIssuingEntry() {
        weaponIssuingCount++; // Increment the counter
        const newEntryHtml = `
            <div class="accordion-item" id="weaponIssuingItem${weaponIssuingCount}">
                <h2 class="accordion-header" id="weaponIssuingHeading${weaponIssuingCount}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#weaponIssuingCollapse${weaponIssuingCount}" aria-expanded="true" aria-controls="weaponIssuingCollapse${weaponIssuingCount}">
                        Weapon Issuing Entry ${weaponIssuingCount}
                    </button>
                </h2>
                <div id="weaponIssuingCollapse${weaponIssuingCount}" class="accordion-collapse collapse show" aria-labelledby="weaponIssuingHeading${weaponIssuingCount}" data-bs-parent="#weaponIssuingsAccordion">
                    <div class="accordion-body">
                        <div>
                            <input readonly type="hidden" name="weaponissuings[${weaponIssuingCount - 1}][wei_id]" value="">
                            <div class="col-lg-12" >
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Concerned Officer Name <br> <input readonly class="form-control mt-1"
                                        name="weaponissuings[${weaponIssuingCount - 1}][wep_iss_co_name]" value="" type="text" placeholder="..."
                                        style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Designation <br> <input readonly class="form-control mt-1" id="head_office_email"
                                        name="weaponissuings[${weaponIssuingCount - 1}][wep_iss_co_desig]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Department <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponissuings[${weaponIssuingCount - 1}][wep_iss_co_dept]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Section <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponissuings[${weaponIssuingCount - 1}][wep_iss_co_sec]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right lh-lg">
                                        PTCL Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponissuings[${weaponIssuingCount - 1}][wep_iss_co_ptcl]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left mt-3">
                                        Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponissuings[${weaponIssuingCount - 1}][wep_iss_co_cell]" value="" type="text" placeholder="..." style="width: 107%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponissuings[${weaponIssuingCount - 1}][wep_iss_co_email]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Website <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponissuings[${weaponIssuingCount - 1}][wep_iss_co_web]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponissuings[${weaponIssuingCount - 1}][wep_iss_co_front]" value="" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($we_issuing->wep_iss_co_front)
                                                <img src="{{ asset($we_issuing->wep_iss_co_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 spacing-right spacing-left mt-3">
                                        Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                                        name="weaponissuings[${weaponIssuingCount - 1}][wep_iss_co_back]" value="" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($we_issuing->wep_iss_co_back)
                                                <img src="{{ asset($we_issuing->wep_iss_co_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2 mt-3">
                                        <div class="col-lg-4 spacing-right">
                                            Notes <br> <textarea readonly class="form-control mt-1" id=""
                                            name="weaponissuings[${weaponIssuingCount - 1}][wep_iss_co_notes]" type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                                        </div>
                                        <div class="col-lg-4 spacing-left">
                                            Attachments <br> <input readonly class="form-control mt-1" id="" 
                                            type="file" name="weaponissuings[${weaponIssuingCount - 1}][wep_iss_co_attach]" value="" placeholder="..." style="width: 100%;">
                                            <div class="col-lg-5 spacing-right">
                                                <!-- Image Preview Biometric -->
                                                <div class="image-preview42" id="imagePreview42">
                                                    @if($we_issuing->wep_iss_co_attach)
                                                    <img src="{{ asset($we_issuing->wep_iss_co_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                    @else
                                                    <span class="image-preview__default-text42">Image Preview</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 style="margin-left:12px;">Printing Authority</h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Concerned Officer Name <br> <input readonly class="form-control mt-1"
                                        name="weaponissuings[{{ $index }}][wep_p_co_name]"  value="" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Designation <br> <input readonly class="form-control mt-1" id="head_office_email"
                                         name="weaponissuings[${weaponIssuingCount - 1}][wep_co_p_desig]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Department <br> <input readonly class="form-control mt-1" id="head_office_name"
                                         name="weaponissuings[${weaponIssuingCount - 1}][wep_co_p_dept]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Section <br> <input readonly class="form-control mt-1" id="head_office_name"
                                         name="weaponissuings[${weaponIssuingCount - 1}][wep_co_p_sec]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        PTCL Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                         name="weaponissuings[${weaponIssuingCount - 1}][wep_co_p_ptcl]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>

                                    <div class="col-lg-3 spacing-left mt-3">
                                        Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                       name="weaponissuings[${weaponIssuingCount - 1}][wep_co_p_cell]" value="" type="text" placeholder="..." style="width: 103%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                                         name="weaponissuings[${weaponIssuingCount - 1}][wep_co_p_email]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Website <br> <input readonly class="form-control mt-1" id="head_office_name"
                                         name="weaponissuings[${weaponIssuingCount - 1}][wep_co_p_web]" value="" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right mt-3">
                                        Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                                         name="weaponissuings[${weaponIssuingCount - 1}][wep_co_p_front]" value="" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($we_issuing->wep_co_p_front)
                                                <img src="{{ asset($we_issuing->wep_co_p_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 spacing-right spacing-left mt-3">
                                        Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                                         name="weaponissuings[${weaponIssuingCount - 1}][wep_co_p_back]" value="" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($we_issuing->wep_co_p_back)
                                                <img src="{{ asset($we_issuing->wep_co_p_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else
                                                <span class="image-preview__default-text42">Image Preview</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4 spacing-right">
                                        Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                       name="weaponissuings[${weaponIssuingCount - 1}][wep_co_p_notes]" type="text" placeholder="..."
                                            style="width: 100%;"></textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                        Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                         name="weaponissuings[${weaponIssuingCount - 1}][wep_co_p_attach]" value="" type="file" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <!-- Image Preview Biometric -->
                                            <div class="image-preview42" id="imagePreview42">
                                                @if($we_issuing->wep_co_p_attach)
                                                <img src="{{ asset($we_issuing->wep_co_p_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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
        // Append the new entry HTML to the container
        $('#weaponIssuingsAccordion').append(newEntryHtml);
    }

    // Add event listener to the button for adding more weapon issuing entries
    $('#addWeaponIssuing').on('click', function() {
        addWeaponIssuingEntry();
    });
</script>


<!-- Script for dynamic addition of other consultant entries -->
<script>
    // Counter to track the number of other consultant entries
    let otherConsultantCount = {{ count($regulators->otherconsultants) }};

    // Function to add a new other consultant entry
    function addOtherConsultantEntry() {
        otherConsultantCount++; // Increment the counter
        const newEntryHtml = `
            <div class="accordion-item" id="otherConsultantItem${otherConsultantCount}">
                <h2 class="accordion-header" id="otherConsultantHeading${otherConsultantCount}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#otherConsultantCollapse${otherConsultantCount}" aria-expanded="true" aria-controls="otherConsultantCollapse${otherConsultantCount}">
                        Other Consultant ${otherConsultantCount}
                    </button>
                </h2>
                <div id="otherConsultantCollapse${otherConsultantCount}" class="accordion-collapse collapse show" aria-labelledby="otherConsultantHeading${otherConsultantCount}" data-bs-parent="#otherConsultantsAccordion">
                    <div class="accordion-body">
                        <div class=" row mb-2">
                            <input readonly type="hidden" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="">
                            <div class="col-lg-4 spacing-right">
                                Consultant Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="otherconsultants[{{ $index }}][other_name]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_name }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Designation <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="otherconsultants[{{ $index }}][other_desig]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_desig }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Organization <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="otherconsultants[{{ $index }}][other_org]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_org }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="otherconsultants[{{ $index }}][other_cell]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_cell }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="otherconsultants[{{ $index }}][other_email]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_email }}" type="text" placeholder="..." style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Consultancy Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="otherconsultants[{{ $index }}][other_fee]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_fee }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="otherconsultants[{{ $index }}][other_front]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_front }}" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($oth_consultant->other_front)
                                        <img src="{{ asset($oth_consultant->other_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 spacing-right spacing-left mt-3">
                                Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="otherconsultants[{{ $index }}][other_back]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_back }}" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($oth_consultant->other_back)
                                        <img src="{{ asset($oth_consultant->other_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5>Consultant Bank Details :</h5>
                        <div class=" row ">
                            <div class="col-lg-4 spacing-right">
                                Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="otherconsultants[{{ $index }}][other_bank]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_bank }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Account Title <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="otherconsultants[{{ $index }}][other_account]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_account }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Account Number <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="otherconsultants[{{ $index }}][other_acc_no]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_acc_no }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Any Agreed Financials <br> <input readonly class="form-control mt-1"
                                name="otherconsultants[{{ $index }}][other_fin]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_fin }}" type="file" placeholder="..."
                                style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($oth_consultant->other_fin)
                                        <img src="{{ asset($oth_consultant->other_fin) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="" name="otherconsultants[{{ $index }}][other_notes]"
                                name="otherconsultants[${otherConsultantCount - 1}][oth_id]" type="text" placeholder="..." style="width: 100%;">{{ $oth_consultant->other_notes }}</textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachment <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="otherconsultants[{{ $index }}][other_attachments]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_attachments }}" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($oth_consultant->other_attachments)
                                        <img src="{{ asset($oth_consultant->other_attachments) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5>Consultant Address</h5>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right ">
                                Office No <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="otherconsultants[{{ $index }}][other_office]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_office }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Building <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="otherconsultants[{{ $index }}][other_build]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_build }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-5 spacing-right mt-2">
                                Block <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="otherconsultants[{{ $index }}][other_block]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_block }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Area <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="otherconsultants[{{ $index }}][other_area]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_area }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-5 spacing-right mt-2">
                                City <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="otherconsultants[{{ $index }}][other_city]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_city }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Photograph of Building <br> <input readonly class="form-control mt-1" id=""
                                name="otherconsultants[{{ $index }}][other_photo]" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" value="{{ $oth_consultant->other_photo }}" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($oth_consultant->other_photo)
                                        <img src="{{ asset($oth_consultant->other_photo) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 spacing-right mt-2">
                                Email <br> <input readonly class="form-control mt-1" value="{{ $oth_consultant->other_a_email }}" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" name="otherconsultants[{{ $index }}][other_a_email]" type="email"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Website <br> <input readonly class="form-control mt-1" value="{{ $oth_consultant->other_web }}" name="otherconsultants[${otherConsultantCount - 1}][oth_id]" name="otherconsultants[{{ $index }}][other_web]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-5 spacing-right mt-2">
                                Pin location <br> <input readonly class="form-control mt-1" value="{{ $oth_consultant->other_pin }}"  name="otherconsultants[{{ $index }}][other_pin]"
                                    type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                GPS <br> <input readonly class="form-control mt-1" value="{{ $oth_consultant->other_gps }}" name="otherconsultants[{{ $index }}][other_gps]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-5 spacing-right mt-2">
                                Notes <br> <textarea readonly class="form-control mt-1" id="" name="otherconsultants[{{ $index }}][other_ex_notes]"
                                    type="text" placeholder="..." style="width: 100%;">{{ $oth_consultant->other_ex_notes }}</textarea readonly>
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Attachments <br> <input readonly class="form-control mt-1" value="{{ $oth_consultant->other_ex_attach }}" name="otherconsultants[{{ $index }}][other_ex_attach]"
                                type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="image-preview42" id="imagePreview42">
                                        @if($oth_consultant->other_ex_attach)
                                        <img src="{{ asset($oth_consultant->other_ex_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
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
        // Append the new entry HTML to the container
        $('#otherConsultantsAccordion').append(newEntryHtml);
    }

    // Add event listener to the button for adding more other consultant entries
    $('#addOtherConsultant').on('click', function() {
        addOtherConsultantEntry();
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
                            Consultant Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="oper_name[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Designation <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="oper_desig[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Organization <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="oper_org[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="oper_cell[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left mt-3">
                            Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="oper_email[]" type="text" placeholder="..." style="width: 103%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Consultancy Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="oper_fee[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="oper_front[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right spacing-left mt-3">
                            Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="oper_back[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <h5>Consultant Bank Details :</h5>
                    <div class=" row ">
                        <div class="col-lg-4 spacing-right">
                            Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="oper_bank[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Account Title <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="oper_account[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Account Number <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="oper_acc_no[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Any Agreed Financials <br> <input readonly class="form-control mt-1"
                                id="head_office_email" name="oper_fin[]" type="file" placeholder="..."
                                style="width: 100%;">
                        </div>

                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Notes <br> <textarea readonly class="form-control mt-1" id="" name="oper_notes[]"
                                type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Attachment <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="oper_attachments[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <h5>Consultant Address</h5>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right ">
                            Office No <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="oper_office[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Building <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="oper_build[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            Block <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="oper_block[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Area <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="oper_area[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            City <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="oper_city[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Photograph of Building <br> <input readonly class="form-control mt-1" id=""
                                name="oper_photo[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 spacing-right mt-2">
                            Email <br> <input readonly class="form-control mt-1" id="" name="oper_a_email[]" type="email"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Website <br> <input readonly class="form-control mt-1" id="" name="oper_web[]" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            Pin location <br> <input readonly class="form-control mt-1" id="" name="oper_pin[]"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            GPS <br> <input readonly class="form-control mt-1" id="" name="oper_gps[]" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            Notes <br> <textarea readonly class="form-control mt-1" id="" name="oper_ex_notes[]"
                                type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Attachments <br> <input readonly class="form-control mt-1" id="" name="oper_ex_attach[]"
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
                    Concerned Officer Name <br> <input readonly class="form-control mt-1"
                        id="oper_cn_officer" name="oper_iss_co_name[]" type="text" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-left spacing-right">
                    Designation <br> <input readonly class="form-control mt-1" id="oper_desig"
                        name="oper_iss_co_desig[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Department <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_dept[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Section <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_section[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    PTCL Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_ptcl[]" type="text" placeholder="..." style="width: 100%;">
                </div>

                <div class="col-lg-3 spacing-left mt-3">
                    Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_cell[]" type="text" placeholder="..." style="width: 105%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_email[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Website <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_web[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_front[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right spacing-left mt-3">
                    Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="oper_iss_co_back[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="row mb-2 mt-2">
                    <div class="col-lg-5 spacing-right mt-3">
                        Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                            name="oper_iss_co_notes[]" type="text" placeholder="..."
                            style="width: 100%;"></textarea readonly>
                    </div>
                    <div class="col-lg-5 spacing-left mt-3">
                        Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
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
                    <input readonly type="hidden" name="i_id[]" value="${weapon_authority_Room}">
                </div>
                <div class="col-lg-3 spacing-right">
                    Concerned Officer Name <br> <input readonly class="form-control mt-1"
                        id="head_office_name" name="wep_iss_co_name[]" type="text" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-left spacing-right">
                    Designation <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_iss_co_desig[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Department <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_dept[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Section <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_sec[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right lh-lg">
                    PTCL Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_ptcl[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-left mt-3">
                    Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_cell[]" type="text" placeholder="..." style="width: 107%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_email[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Website <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_web[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_front[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right spacing-left mt-3">
                    Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_iss_co_back[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="row mb-2 mt-3">
                    <div class="col-lg-4 spacing-right">
                        Notes <br> <textarea readonly class="form-control mt-1" id="" name="wep_iss_co_notes[]"
                            type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                    </div>
                    <div class="col-lg-4 spacing-left">
                        Attachments <br> <input readonly class="form-control mt-1" id="" name="wep_iss_co_attach[]"
                            type="file" placeholder="..." style="width: 100%;">
                    </div>
                </div>
            </div>
            <h5>Printing Authority:</h5>
            <div class="col-lg-12">
                <div class="row mb-2">
                    <div class="col-lg-3 spacing-right">
                        Concerned Officer Name <br> <input readonly class="form-control mt-1"
                            id="head_office_name" name="wep_p_co_name[]" type="text" placeholder="..."
                            style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-left spacing-right">
                        Designation <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="wep_co_p_desig[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right">
                        Department <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_dept[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right">
                        Section <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_sec[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right mt-3">
                        PTCL Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_ptcl[]" type="text" placeholder="..." style="width: 100%;">
                    </div>

                    <div class="col-lg-3 spacing-left mt-3">
                        Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_cell[]" type="text" placeholder="..." style="width: 103%;">
                    </div>
                    <div class="col-lg-3 spacing-right mt-3">
                        Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_email[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right mt-3">
                        Website <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_web[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right mt-3">
                        Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_front[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-3 spacing-right spacing-left mt-3">
                        Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_back[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4 spacing-right">
                        Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                            name="wep_co_p_notes[]" type="text" placeholder="..."
                            style="width: 100%;"></textarea readonly>
                    </div>
                    <div class="col-lg-4 spacing-right">
                        Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
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
                        <input readonly type="hidden" name="r_id[]" value="${lisence_finance_Room}">
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
                                Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="other_finance_bank[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Cheque/Instrument No. <br> <input readonly class="form-control mt-1"
                                    id="head_office_email" name="other_finance_cheque[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Scanned copy of Cheque/Instrument<br> <input readonly class="form-control mt-1"
                                    id="head_office_name" name="other_finance_copy[]" type="file"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Amount in figures <br> <input readonly class="form-control mt-1"
                                    id="head_office_name" name="other_finance_amount[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="other_finance_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-rightmt-3">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="other_finance_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5>Withdrawal By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="other_finance_wb_name[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="other_finance_wb_id[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="other_finance_wb_desig[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="other_finance_wb_cell[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="other_finance_wb_email[]" type="text" placeholder="..."
                                    style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="other_finance_wb_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="other_finance_wb_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Fees :</h5>
                            <div class="col-lg-4 spacing-right">
                                Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="other_finance_fee[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right lh-lg">
                                Date of Fees Deposit <br> <input readonly class="form-control mt-1"
                                    id="head_office_email" name="other_finance_fee_date[]" type="date"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right lh-lg">
                                Name of bank<br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="other_finance_fee_bank[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Instrument Number <br> <input readonly class="form-control mt-1"
                                    id="head_office_name" name="other_finance_fee_ins[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Deposit Slip Attachment <br> <input readonly class="form-control mt-1"
                                    id="head_office_email" name="other_finance_slip_attach[]" type="file"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="other_finance_fee_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="other_finance_fee_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Deposited By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="other_finance_db_name[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="other_finance_db_id[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="other_finance_db_desig[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="other_finance_db_cell[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="other_finance_db_email[]" type="text" placeholder="..."
                                    style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="other_finance_db_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="other_finance_db_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Include other "Finances" input readonly fields here -->
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
                            <input readonly type="hidden" name="c_id[]" value="${weapon_consultant_room3}">
                        </div>
                        <div class=" row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Consultant Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_name[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Designation <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="wep_desig[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Organization <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_org[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_cell[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_email[]" type="text" placeholder="..." style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Consultancy Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_fee[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_front[]" type="file" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right spacing-left mt-3">
                                Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_back[]" type="file" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <h5>Consultant Bank Details :</h5>
                        <div class=" row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_bank[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Account Title <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="wep_acc[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Account Number <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="wep_acc_no[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Any Agreed Financials <br> <input readonly class="form-control mt-1"
                                    id="head_office_email" name="wep_fin[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="" name="wep_notes[]"
                                    type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachment <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="wep_attach[]" type="file" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <h5>Consultant Address</h5>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Office No <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                    name="wep_office[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Building <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                    name="wep_build[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right mt-2">
                                Block <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                    name="wep_block[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Area <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                    name="wep_area[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right mt-2">
                                City <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                    name="wep_city[]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Photograph of Building <br> <input readonly class="form-control mt-1" id=""
                                    name="wep_photo[]" type="file" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right mt-2">
                                Email <br> <input readonly class="form-control mt-1" id="" name="wep_a_email[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                Website <br> <input readonly class="form-control mt-1" id="" name="wep_web[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right mt-2">
                                Pin location <br> <input readonly class="form-control mt-1" id="" name="wep_pin[]"
                                    type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left mt-2">
                                GPS <br> <input readonly class="form-control mt-1" id="" name="wep_gps[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-5 spacing-right ">
                                Notes <br> <textarea readonly class="form-control mt-1" id="" name="wep_ex_notes[]"
                                    type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Attachments <br> <input readonly class="form-control mt-1" id="" name="wep_ex_attach[]"
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

<script>
    var weapon_details_room3 = 1;

    function weapon_details_add_fields() {

        weapon_details_room3++;
        var objTo = document.getElementById('weapon_details_add_fields');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "third-col removeclass" + weapon_details_room3);
        var rdiv = 'removeclass' + weapon_details_room3;

        divtest.innerHTML = `
                <div class="row">
                <h5>Weapon License Details :</h5>
                    
                <div class="col-lg-4 spacing-left spacing-right">
                    License Number <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_license[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right">
                    Weapon Number <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_lic_no[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right">
                    Type <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_lic_type[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Caliber <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_lic_caliber[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Jurisdiction <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_lic_juris[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Tenure of Renewal <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_lic_tenure[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Cost of Renewal <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_lic_cost[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Expiry date <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_lic_expiry[]" type="date" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Sanction Date <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_lic_sancdate[]" type="date" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    License Attachment <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_lic_attach[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Weapon Dealer Name: <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_lic_dealername[]" type="text" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Vendor ID: <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_lic_vendorid[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Scanned Stamp of License
                    <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_lic_scanned[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Endorsement From <br>
                    <select  class="form-control mt-1" name="wep_lic_category[]"
                        style="width: 100%;">
                        <option value=""></option>
                        <option value="">DG Office</option>
                        <option value="">Post Office</option>
                    </select>
                    Add Custom Endorsement <br>
                    <div class="input readonly-group">
                        <input readonly type="text" class="form-control" id="leadcustom-category"
                            placeholder="Enter custom lead">
                        <button class="btn btn-primary" id="leadsubmit-category" type="button"
                            style="margin-top: 4px;">Add</button>
                    </div>
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Endorsement Date: <br> <input readonly class="form-control mt-1" id="wep_lic_endate"
                        name="wep_lic_endate[]" type="date" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right ">
                    Scanned Copy of Endorsement: <br> <input readonly class="form-control mt-1"
                        id="head_office_email" name="wep_lic_encopy[]" type="file" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="row mb-2">
                    <div class="col-lg-5 spacing-left" style="margin-left: -20px">
                        Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                            name="wep_lic_ex_notes[]" type="text" placeholder="..."
                            style="width: 87%;"></textarea readonly>
                    </div>
                    <div class="col-lg-5 spacing-left " style="margin-left: -45px">
                        Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                            name="wep_lic_ex_attach[]" type="file" placeholder="..."
                            style="width: 85%;">
                    </div>
                </div>
                    <button type="button" style="width:20%; margin-left:13px;" onclick="consultant_remove_fields(${weapon_details_room3})">Remove</button>
                </div>`;

        objTo.appendChild(divtest);
    }

    function consultant_remove_fields(rid) {
        $('.removeclass' + rid).remove();
    }
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
                    <input readonly type="hidden" name="c_id[]" value="${legalRoom}">
                </div>
                <div class="col-lg-4 spacing-right">
                    Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_bank[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right">
                    Cheque/Instrument No. <br> <input readonly class="form-control mt-1"
                        id="head_office_email" name="wep_legal_cheque[]" type="text" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Scanned copy of Cheque/Instrument<br> <input readonly class="form-control mt-1"
                        id="head_office_name" name="wep_legal_copy[]" type="file" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right mt-3">
                    Amount in figures <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_amount[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_notes[]" type="text" placeholder="..."
                        style="width: 100%;"></textarea readonly>
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_legal_attach[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <h5>Withdrawal By :</h5>
                <div class="col-lg-4 spacing-right">
                    Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_wb_name[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right">
                    Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_legal_wb_id[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_wb_desig[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right mt-3">
                    Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_wb_cell[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left mt-3">
                    Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_wb_email[]" type="text" placeholder="..." style="width: 103%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_wb_notes[]" type="text" placeholder="..."
                        style="width: 100%;"></textarea readonly>
                </div>
                <div class="col-lg-4 spacing-right">
                    Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_legal_wb_attach[]" type="file" placeholder="..."
                        style="width: 100%;">
                </div>
                <h5 class="mt-2">Fees :</h5>
                <div class="col-lg-4 spacing-left">
                    Fees A <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_fee_a[]" type="text" placeholder="..." style="width: 103%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Fees B <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_fee_b[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Total Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_fee_t[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Date of Fees Deposit <br> <input readonly class="form-control mt-1"
                        id="head_office_email" name="wep_legal_fee_date[]" type="date"
                        placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right mt-3">
                    Name of bank<br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_fee_bank[]" type="text" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right mt-3">
                    Instrument Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_fee_ins[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Deposit Slip Attachment <br> <input readonly class="form-control mt-1"
                        id="head_office_email" name="wep_legal_fee_slip[]" type="file"
                        placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right mt-3">
                    Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_fee_notes[]" type="text" placeholder="..."
                        style="width: 100%;"></textarea readonly>
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_legal_fee_attach[]" type="file" placeholder="..."
                        style="width: 100%;">
                </div>
                <h5 class="mt-2">Deposited By :</h5>
                <div class="col-lg-4 spacing-right">
                    Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_db_name[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right">
                    Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                        name="wep_legal_db_id[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right">
                    Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_db_desig[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-right mt-3">
                    Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_db_cell[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-4 spacing-left mt-3">
                    Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_db_email[]" type="text" placeholder="..." style="width: 103%;">
                </div>
                <div class="col-lg-4 spacing-left spacing-right mt-3">
                    Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                        name="wep_legal_db_notes[]" type="text" placeholder="..."
                        style="width: 100%;"></textarea readonly>
                </div>
                <div class="col-lg-4 spacing-right">
                    Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
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
                            Consultant Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="other_name[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Designation <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="other_desig[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Organization <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="other_org[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="other_cell[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left mt-3">
                            Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="other_email[]" type="text" placeholder="..." style="width: 103%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Consultancy Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="other_fee[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="other_front[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right spacing-left mt-3">
                            Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="other_back[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <h5>Consultant Bank Details :</h5>
                    <div class=" row ">
                        <div class="col-lg-4 spacing-right">
                            Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="other_bank[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Account Title <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="other_account[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                            Account Number <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="other_acc_no[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Any Agreed Financials <br> <input readonly class="form-control mt-1"
                                id="head_office_email" name="other_fin[]" type="file" placeholder="..."
                                style="width: 100%;">
                        </div>

                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Notes <br> <textarea readonly class="form-control mt-1" id="" name="other_notes[]"
                                type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right mt-3">
                            Attachment <br> <input readonly class="form-control mt-1" id="head_office_email"
                                name="other_attachments[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <h5>Consultant Address</h5>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right ">
                            Office No <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="other_office[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Building <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="other_build[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            Block <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="other_block[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Area <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="other_area[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            City <br> <input readonly class="form-control mt-1" id="head_office_cell_no"
                                name="other_city[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Photograph of Building <br> <input readonly class="form-control mt-1" id=""
                                name="other_photo[]" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 spacing-right mt-2">
                            Email <br> <input readonly class="form-control mt-1" id="" name="other_a_email[]" type="email"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Website <br> <input readonly class="form-control mt-1" id="" name="other_web[]" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            Pin location <br> <input readonly class="form-control mt-1" id="" name="other_pin[]"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            GPS <br> <input readonly class="form-control mt-1" id="" name="other_gps[]" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 spacing-right mt-2">
                            Notes <br> <textarea readonly class="form-control mt-1" id="" name="other_ex_notes[]"
                                type="text" placeholder="..." style="width: 100%;"></textarea readonly>
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Attachments <br> <input readonly class="form-control mt-1" id="" name="other_ex_attach[]"
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
                    <input readonly type="hidden" name="i_id[]" value="${lisence_authority_Room}">
                </div>
                <div class="col-lg-3 spacing-right">
                    Concerned Officer Name <br> <input readonly class="form-control mt-1"
                        id="other_cn_officer" name="other_iss_co_name[]" type="text" placeholder="..."
                        style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-left spacing-right">
                    Designation <br> <input readonly class="form-control mt-1" id="oper_desig"
                        name="other_iss_co_desig[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Department <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_dept[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right">
                    Section <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_section[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    PTCL Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_ptcl[]" type="text" placeholder="..." style="width: 100%;">
                </div>

                <div class="col-lg-3 spacing-left mt-3">
                    Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_cell[]" type="text" placeholder="..." style="width: 105%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Email <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_email[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Website <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_web[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right mt-3">
                    Visiting Card Front <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_front[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right spacing-left mt-3">
                    Visiting Card Back <br> <input readonly class="form-control mt-1" id="head_office_name"
                        name="other_iss_co_back[]" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="row mb-2 mt-2">
                    <div class="col-lg-5 spacing-right mt-3">
                        Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                            name="other_iss_co_notes[]" type="text" placeholder="..."
                            style="width: 100%;"></textarea readonly>
                    </div>
                    <div class="col-lg-5 spacing-left mt-3">
                        Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
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
                        <input readonly type="hidden" name="r_id[]" value="${operating_finance_Room}">
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
                                Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_bank[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Cheque/Instrument No. <br> <input readonly class="form-control mt-1"
                                    id="head_office_email" name="oper_finance_cheque[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Scanned copy of Cheque/Instrument<br> <input readonly class="form-control mt-1"
                                    id="head_office_name" name="oper_finance_copy[]" type="file"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Amount in figures <br> <input readonly class="form-control mt-1"
                                    id="head_office_name" name="oper_finance_amount[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-rightmt-3">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="oper_finance_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5>Withdrawal By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_wb_name[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="oper_finance_wb_id[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_wb_desig[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_wb_cell[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_wb_email[]" type="text" placeholder="..."
                                    style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_wb_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="oper_finance_wb_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Fees :</h5>
                            <div class="col-lg-4 spacing-right">
                                Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_fee[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right lh-lg">
                                Date of Fees Deposit <br> <input readonly class="form-control mt-1"
                                    id="head_office_email" name="oper_finance_fee_date[]" type="date"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right lh-lg">
                                Name of bank<br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_fee_bank[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Instrument Number <br> <input readonly class="form-control mt-1"
                                    id="head_office_name" name="oper_finance_fee_ins[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Deposit Slip Attachment <br> <input readonly class="form-control mt-1"
                                    id="head_office_email" name="oper_finance_slip_attach[]" type="file"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_fee_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="oper_finance_fee_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Deposited By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_db_name[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="oper_finance_db_id[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_db_desig[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_db_cell[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_db_email[]" type="text" placeholder="..."
                                    style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="oper_finance_db_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="oper_finance_db_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Include other "Finances" input readonly fields here -->
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
                        <input readonly type="hidden" name="r_id[]" value="${weapon_finance_Room}">
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
                                Bank Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_bank[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Cheque/Instrument No. <br> <input readonly class="form-control mt-1"
                                    id="head_office_email" name="wep_finance_cheque[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Scanned copy of Cheque/Instrument<br> <input readonly class="form-control mt-1"
                                    id="head_office_name" name="wep_finance_copy[]" type="file"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Amount in figures <br> <input readonly class="form-control mt-1"
                                    id="head_office_name" name="wep_finance_amount[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-rightmt-3">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="wep_finance_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5>Withdrawal By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_wb_name[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="wep_finance_wb_id[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_wb_desig[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_wb_cell[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_wb_email[]" type="text" placeholder="..."
                                    style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_wb_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="wep_finance_wb_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Fees :</h5>
                            <div class="col-lg-4 spacing-right">
                                Fees <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_fee[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right lh-lg">
                                Date of Fees Deposit <br> <input readonly class="form-control mt-1"
                                    id="head_office_email" name="wep_finance_fee_date[]" type="date"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right lh-lg">
                                Name of bank<br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_fee_bank[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Instrument Number <br> <input readonly class="form-control mt-1"
                                    id="head_office_name" name="wep_finance_fee_ins[]" type="text"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Deposit Slip Attachment <br> <input readonly class="form-control mt-1"
                                    id="head_office_email" name="wep_finance_slip_attach[]" type="file"
                                    placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_fee_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="wep_finance_fee_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <h5 class="mt-2">Deposited By :</h5>
                            <div class="col-lg-4 spacing-right">
                                Name <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_db_name[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right">
                                Employee ID <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="wep_finance_db_id[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Designation <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_db_desig[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right mt-3">
                                Cell Number <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_db_cell[]" type="text" placeholder="..."
                                    style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left mt-3">
                                Email ID <br> <input readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_db_email[]" type="text" placeholder="..."
                                    style="width: 103%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-3">
                                Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                                    name="wep_finance_db_notes[]" type="text" placeholder="..."
                                    style="width: 100%;"></textarea readonly>
                            </div>
                            <div class="col-lg-4 spacing-right">
                                Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
                                    name="wep_finance_db_attach[]" type="file" placeholder="..."
                                    style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Include other "Finances" input readonly fields here -->
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
                            Category <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="division_category[]" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Quantity <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="division_quantity[]" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-4 mt-4">
                            <div class=" mb-2 d-flex align-items-center ">
                                <div class="form-check form-check-inline spacing-left ">
                                    <input readonly class="form-check-input readonly" name="division_book[]"
                                        type="checkbox" id="inlineCheckbox1" value="">
                                    <label class="form-check-label"
                                        for="inlineCheckbox1">Book</label>
                                </div>
                                <div class="form-check form-check-inline spacing-left">
                                    <input readonly class="form-check-input readonly" name="division_card[]"
                                        type="checkbox" id="inlineCheckbox2" value="">
                                    <label class="form-check-label"
                                        for="inlineCheckbox2">Card</label>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 spacing-right">
                            Caliber <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="division_caliber[]" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>

                        <div class="col-lg-4 spacing-right">
                            Jurisdiction: <br> <input readonly class="form-control mt-1"
                                id="head_office_name" name="division_juris[]" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>

                        <div class="col-lg-4 spacing-right ">
                            Sanction Letter Number <br> <input readonly class="form-control mt-1"
                                id="head_office_name" name="division_sanc[]" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Scanned copy of Sanction Letter: (Attachment)
                            <br> <input readonly class="form-control mt-1" id="head_office_name"
                                name="division_sanc_copy[]" type="file" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class=" mb-2 d-flex align-items-center m-5">
                                <div class="form-check form-check-inline spacing-left mt-2">
                                    <input readonly class="form-check-input readonly" name="division_nbp[]"
                                        type="checkbox" id="inlineCheckbox1" value="">
                                    <label class="form-check-label"
                                        for="inlineCheckbox1">NBP</label>
                                </div>
                                <div class="form-check form-check-inline spacing-left mt-2">
                                    <input readonly class="form-check-input readonly" name="division_pb[]"
                                        type="checkbox" id="inlineCheckbox2" value="">
                                    <label class="form-check-label" for="inlineCheckbox2">PB</label>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6 spacing-right">
                        Notes <br> <textarea readonly class="form-control mt-1" id="head_office_name"
                            name="division_notes[]" type="text" placeholder="..."
                            style="width: 100%;"></textarea readonly>
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Attachments <br> <input readonly class="form-control mt-1" id="head_office_email"
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
</body>

</html>