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
        <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration Setting</a>
        <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
        <hr>
        <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
    </div>

    <section>
         <div class="modal-header border-0">
                <div style="display:flex; column-gap:10px; align-items:center">
                    <button type="button" class="btn btn-link" onclick="history.back()">
                     <i class="bi bi-arrow-left"></i>
                    </button>
                    <h5 class="mt-3" style="font-weight: 700;"> HRM View: </h5>
                </div>
              </div>
        <!--<h4 style="font-weight: bold;" class="mb-3"><i>HRM View :</i>-->
        <!--</h4>-->
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
         <div class="row">
            <div class="row mb-2" style="margin-left: 20px;">
                <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
                  <h5>Employee Activation Status</h5>

                  <div class="form-check form-check-inline" style="margin-right: 90px;">
                    <input class="form-check-input mr-2" type="radio" name="activation" value="1" {{ $hrms->activation == '1' ? 'checked' : '' }} id="activeRadio">
                    <label class="form-check-label" for="activeRadio">Active</label>

                    <input class="form-check-input ml-3 mr-2" type="radio" name="activation" {{ $hrms->activation == '0' ? 'checked' : '' }} value="0" id="inactiveRadio">
                    <label class="form-check-label" for="inactiveRadio">Inactive</label>
                  </div>
                </div>
            </div>

        </div>
        <div class="row">


            <form id="hrm_form">
                <div class="tab-content" id="">
                    <div class="row" style="font-weight:600;">

                        <div class="col-lg-6 spacing-right">
                            <div class="row mb-2 mt-1">
                                <div class="col-lg-11">
                                    Name <br>  <input readonly class="form-control" name="name" value="{{ $hrms->name }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-right">
                                    Father's Name <br>  <input readonly class="form-control" name="fname" value="{{ $hrms->fname }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-left">
                                    CNIC <br>  <input readonly class="form-control" type="text" name="cnic" value="{{ $hrms->cnic }}" placeholder="XXXXX-XXXXXXX-X" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-right">
                                Employee No <br>  <input readonly class="form-control" type="text" value="{{ $hrms->employee_no }}" name="employee_no" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-left input readonly-group">
                                    Cell Phone (official) <br>  <input readonly class="form-control" name="cell" value="{{ $hrms->cell }}"  type="text" placeholder="" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-right">
                                    Bank Name <br>  <input readonly class="form-control" type="text" name="bank" value="{{ $hrms->bank }}" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-left input readonly-group">
                                    Bank Account <br>  <input readonly class="form-control" name="bank_account" value="{{ $hrms->bank_account }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-right">
                                    Client ID <br>  <input readonly class="form-control" type="text" name="client_id" value="{{ $hrms->client_id }}"  placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-left">
                                    Client Name <br>  <input readonly class="form-control" name="client_name" value="{{ $hrms->client_name }}"  type="text" placeholder="..." style="width: 88%;">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 spacing-left">
                            <div class="row mb-2">
                                <div class="col-lg-5 pt-1 spacing-right">
                                    Photograph <br>
                                    <input readonly class="form-control" name="photo" id="inpFile42" type="file" placeholder="" style="width: 100%;">
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                           <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->photo, true)) ? json_decode($hrms->photo, true) : [$hrms->photo]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->photo, true)) ? pathinfo(json_decode($hrms->photo, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->photo, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->photo, true)) ? getFilePreview(json_decode($hrms->photo, true)[0]) : getFilePreview($hrms->photo) !!}
                                       </div>
                                        <!--<div class="image-preview42" id="imagePreview42">-->
                                        <!--    @if($hrms->photo)-->
                                        <!--    <img src="{{ asset($hrms->photo) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                                        <!--    @else-->
                                        <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                                        <!--    @endif-->
                                        <!--</div>-->
                                    </div>
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right form-group">
                                    Category <br>
                                    <input readonly type="text" class="form-control mt-1" name="category" value="{{ $hrms->category }}" placeholder="" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-2 pt-1 spacing-right">
                                    Rank <br>  <input readonly class="form-control" value="{{ $hrms->rank }}" type="text" name="rank" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Designation <br><input readonly class="form-control" name="designation" value="{{ $hrms->designation }}"  type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-3 pt-1 spacing-left spacing-right">
                                    Unit <br>  <input readonly class="form-control" name="unit" value="{{ $hrms->unit }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-10 spacing-right">
                                    Hired At <br> <input readonly type="text" name="hired_at" value="{{ $hrms->hired_at }}" class="form-control mt-1" placeholder="" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-right">
                                    Region <br>  <input readonly class="form-control" type="text" name="hrm_region" value="{{ $hrms->hrm_region }}" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-left">
                                    Location <br>  <input readonly class="form-control" name="hrm_location" value="{{ $hrms->hrm_location }}" type="text" placeholder="" style="width: 88%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <!--Basic Info-->
                    <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="basic-info" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class="col-lg-6 spacing-right">
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Date of Birth  <br>  <input readonly class="form-control" type="date"  name="dob" value="{{ $hrms->dob }}" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Religion <br>  <input readonly class="form-control" type="text" name="religion" value="{{ $hrms->religion }}" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left">
                                            Caste <br>  <input readonly class="form-control" type="text" name="caste" value="{{ $hrms->caste }}" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-3 spacing-right">
                                            Gender  <br><input readonly class="form-control"  name="gender" value="{{ $hrms->gender }}" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                        Cell No (personal)  <br>  <input readonly class="form-control" name="p_cell" value="{{ $hrms->p_cell }}" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                        <div class="col-lg-4 spacing-left ">
                                            Emergency Contact No <br>  <input readonly class="form-control" type="text" value="{{ $hrms->e_cell }}" name="e_cell" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-5 ">
                                            Blood Group  <br>  <input readonly class="form-control" type="text" name="blood" value="{{ $hrms->blood }}" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6">
                                            Email <br>  <input readonly class="form-control" type="text" name="email" value="{{ $hrms->email }}" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-4 spacing-right">
                                        CNIC Picture (front) <br>  <input readonly class="form-control" id="inpFile1" type="file" value="{{ $hrms->cnic_front }}" name="cnic_front" placeholder="" style="width: 100%;" multiple>
                                        <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->cnic_front, true)) ? json_decode($hrms->cnic_front, true) : [$hrms->cnic_front]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->cnic_front, true)) ? pathinfo(json_decode($hrms->cnic_front, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->cnic_front, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->cnic_front, true)) ? getFilePreview(json_decode($hrms->cnic_front, true)[0]) : getFilePreview($hrms->cnic_front) !!}
                                       </div>
                                        {{-- <div class="image-preview1" id="imagePreview1">
                                            @if($hrms->cnic_front)
                                            <img src="{{ asset($hrms->cnic_front) }}" alt="Image Preview1" class="image-preview__image1" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text1">Image Preview</span>
                                            @endif
                                        </div> --}}
                                    </div>

                                    </div>

                                    <div class="col-lg-4 spacing-right spacing-left">
                                        CNIC Picture (back) <br>  <input readonly class="form-control basic-info-attachements" id="inpFile12" type="file" value="{{ $hrms->cnic_back }}" name="cnic_back" placeholder="" style="width: 100%;" multiple>
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->cnic_back, true)) ? json_decode($hrms->cnic_back, true) : [$hrms->cnic_back]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->cnic_back, true)) ? pathinfo(json_decode($hrms->cnic_back, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->cnic_back, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->cnic_back, true)) ? getFilePreview(json_decode($hrms->cnic_back, true)[0]) : getFilePreview($hrms->cnic_back) !!}
                                    </div>
                                        {{-- <div class="image-preview12" id="imagePreview12">
                                            @if($hrms->cnic_back)
                                            <img src="{{ asset($hrms->cnic_back) }}" alt="Image Preview12" class="image-preview__image12" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text12">Image Preview</span>
                                            @endif
                                        </div> --}}
                                    </div>
                                    <div class="col-lg-3 spacing-left">
                                        Attachments <br>
                                        <input readonly class="form-control basic-info-attachements" id="inpFile3" type="file" name="f_attach[]" placeholder="" style="width: 100%;" multiple>
                                    </div>
                                    <div class="row">
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->f_attach, true)) ? json_decode($hrms->f_attach, true) : [$hrms->f_attach]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->f_attach, true)) ? pathinfo(json_decode($hrms->f_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->f_attach, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->f_attach, true)) ? getFilePreview(json_decode($hrms->f_attach, true)[0]) : getFilePreview($hrms->f_attach) !!}
                                    </div>

                                    </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-3 spacing-right">

                                    </div>
                                    <div class="col-lg-3 spacing-left" style="margin-left: 45px;">

                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 spacing-left">
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Marital Status  <br>  <input readonly class="form-control" type="text" name="m_status" value="{{ $hrms->m_status }}" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-2 spacing-left spacing-right">
                                        No. of kids <br>  <input readonly class="form-control" type="text" name="no_of_kids" value="{{ $hrms->no_of_kids }}" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-2 spacing-left spacing-right">
                                        Male Kids <br>  <input readonly class="form-control" type="text" name="m_kids" value="{{ $hrms->m_kids }}" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left">
                                        Female Kids <br>  <input readonly class="form-control" type="text" name="f_kids" value="{{ $hrms->f_kids }}" placeholder="" style="width: 100%;">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        CNIC Issue date <br>  <input readonly class="form-control" name="cnic_issue" type="date" value="{{ $hrms->cnic_issue }}" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        CNIC Expiry Date <br>  <input readonly class="form-control" type="date" name="cnic_expire" value="{{ $hrms->cnic_expire }}" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Notes <br>
                                        <textarea readonly id="w3review" class="form-control" name="notes" rows="4" cols="53">{{ $hrms->notes }}</textarea readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--address-details-->
                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="address-details" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                            <div class="col-lg-6 spacing-right">
                                <h5>Temporary Address</h5>
                                    <div class="row mb-2">
                                    <div class="col-lg-8 spacing-right">
                                        Address  <br>  <input readonly class="form-control" name="t_address" value="{{ $hrms->t_address }}" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left">
                                        Area  <br>  <input readonly class="form-control" type="text" value="{{ $hrms->t_area }}" name="t_area" placeholder="" style="width: 100%;">
                                    </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                            City  <br>  <input readonly class="form-control" type="text" value="{{ $hrms->t_city }}" name="t_city" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left spacing-right">
                                            Police Station <br>  <input readonly class="form-control" value="{{ $hrms->t_police }}" name="t_police" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left">
                                            District <br>  <input readonly class="form-control" value="{{ $hrms->t_district }}" name="t_district" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Post Office  <br>  <input readonly class="form-control" name="t_post" value="{{ $hrms->t_post }}" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Tehsil <br>  <input readonly class="form-control" type="text" value="{{ $hrms->t_tehsil }}" name="t_tehsil" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left">
                                            Province <br>  <input readonly class="form-control" type="text" value="{{ $hrms->t_province }}" name="t_province" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                        Postal Code  <br>  <input readonly class="form-control" name="t_postal" value="{{ $hrms->t_postal }}" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Residing Since  <br>  <input readonly class="form-control" name="t_residing" value="{{ $hrms->t_residing }}" type="date" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 spacing-left">
                                        GPS Location <br>  <input readonly class="form-control" name="t_gps" value="{{ $hrms->t_gps }}" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                        Attachements <br>  <input readonly class="form-control" name="t_attach" type="file" placeholder="" style="width: 100%;" multiple>
                                        </div>
                                        <div class="row">
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->t_attach, true)) ? json_decode($hrms->t_attach, true) : [$hrms->t_attach]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->t_attach, true)) ? pathinfo(json_decode($hrms->t_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->t_attach, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->t_attach, true)) ? getFilePreview(json_decode($hrms->t_attach, true)[0]) : getFilePreview($hrms->t_attach) !!}
                                       </div>
                                        {{-- @if($hrms->attachments)
                                            @foreach($hrms->attachments as $attachment)
                                                <div class="col-lg-3">
                                                    <div class="attachment">
                                                        <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif --}}
                                        </div>
                                        <div class="col-lg-5 spacing-left spacing-right">
                                        Notes <br>   <textarea readonly id="w3review" class="form-control"   name="t_note" rows="4" cols="37">{{ $hrms->t_note }}
                                        </textarea readonly>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-lg-6 spacing-left">
                                <h5>Permanent Address</h5>
                                    <input readonly class="check-box mx-1" type="checkbox" id="sameAsTemp" placeholder=""> Same as Temporary Address
                                    <div class="row mb-2">

                                        <div class="col-lg-12 spacing-left">

                                    <div class="row mb-2">
                                    <div class="col-lg-8 spacing-right">
                                        Address  <br>  <input readonly class="form-control" type="text" value="{{ $hrms->p_address }}" name="p_address" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left">
                                        Area  <br>  <input readonly class="form-control" type="text" value="{{ $hrms->p_area }}" name="p_area" placeholder="" style="width: 100%;">
                                    </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                            City  <br>  <input readonly class="form-control" name="p_city" value="{{ $hrms->p_city }}" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left spacing-right">
                                            Police Station <br>  <input readonly class="form-control" value="{{ $hrms->p_police }}" name="p_police" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left">
                                            District <br>  <input readonly class="form-control" value="{{ $hrms->p_district }}" name="p_district" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Post Office  <br>  <input readonly class="form-control" name="p_post" value="{{ $hrms->p_post }}" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Tehsil <br>  <input readonly class="form-control" name="p_tehsil" value="{{ $hrms->p_tehsil }}" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left">
                                            Province <br>  <input readonly class="form-control" name="p_province" value="{{ $hrms->p_province }}" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                        Postal Code  <br>  <input readonly class="form-control" name="p_postal" value="{{ $hrms->p_postal }}" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Residing Since  <br>  <input readonly class="form-control" name="p_residing" value="{{ $hrms->p_residing }}" type="date" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 spacing-left">
                                        GPS Location <br>  <input readonly class="form-control" name="p_gps" value="{{ $hrms->p_gps }}" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    </div>

                                    <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Attachements <br>  <input readonly class="form-control" type="file" name="p_attach" placeholder="" style="width: 100%;" multiple>
                                        </div>
                                        <div class="row">
                                            <div class="file-preview"
                                            style="cursor: pointer;"
                                            data-files="{{ json_encode(is_array(json_decode($hrms->p_attach, true)) ? json_decode($hrms->p_attach, true) : [$hrms->p_attach]) }}"
                                            data-extension="{{ is_array(json_decode($hrms->p_attach, true)) ? pathinfo(json_decode($hrms->p_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->p_attach, PATHINFO_EXTENSION) }}"
                                            onclick="openFileModal(this, 0)">
                                            {!! is_array(json_decode($hrms->p_attach, true)) ? getFilePreview(json_decode($hrms->p_attach, true)[0]) : getFilePreview($hrms->p_attach) !!}
                                           </div>
                                        {{-- @if($hrms->attachments)
                                            @foreach($hrms->attachments as $attachment)
                                                <div class="col-lg-3">
                                                    <div class="attachment">
                                                        <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif --}}
                                        </div>
                                        <div class="col-lg-5 spacing-left spacing-right">
                                        Notes <br>   <textarea readonly id="w3review" class="form-control" name="p_note"  name="w3review" rows="4" cols="37">{{ $hrms->p_note }}
                                        </textarea readonly>
                                        </div>
                                    </div>
                                    <!--<h5>Next of Kin</h5>-->
                                    <div class="row mt-2">
                                        <!--<div class="row mb-2">-->
                                        <!--    <div class="col-lg-5 spacing-right">-->
                                        <!--        Name <br>  <input readonly class="form-control" name="nok_name" value="{{ $hrms->nok_name }}" type="text" placeholder="" style="width: 100%;">-->
                                        <!--    </div>-->
                                        <!--    <div class="col-lg-5 spacing-right ">-->
                                        <!--        CNIC <br>  <input readonly class="form-control" name="nok_cnic" value="{{ $hrms->nok_cnic }}" type="text" placeholder="" style="width: 100%;">-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                                    <!--<div class="row mb-2">-->
                                    <!--    <div class="col-lg-5 spacing-right">-->
                                    <!--    Father Name <br>  <input readonly class="form-control" name="nok_fname" value="{{ $hrms->nok_fname }}" type="text" placeholder="" style="width: 100%;">-->
                                    <!--    </div>-->
                                    <!--    <div class="col-lg-5 spacing-left spacing-right">-->
                                    <!--        Relationship <br>  <input readonly class="form-control" name="nok_relation" value="{{ $hrms->nok_relation }}" type="text" placeholder="" style="width: 100%;">-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="row mb-2">-->
                                    <!--    <div class="col-lg-5 spacing-right">-->
                                    <!--        Death Certification <br>  <input readonly class="form-control" name="nok_death" value="{{ $hrms->nok_death }}" type="text" placeholder="" style="width: 100%;">-->
                                    <!--    </div>-->
                                    <!--    <div class="col-lg-5 spacing-left spacing-right">-->
                                    <!--        FRC (Family Registration Certificate) <br> <input readonly class="form-control" name="nok_frc" value="{{ $hrms->nok_frc }}" type="text" placeholder="" style="width: 100%;">-->
                                    <!--    </div>-->
                                    <!--</div>-->


                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--verifications-->
                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="verifications" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                        <h4>Types of Verification</h4>
                            <div class="col-lg-6">
                                <div class="row mb-2">
                                    <div class="col-lg-11 ">
                                        Hiring Form  <br>  <input readonly class="form-control" id="inpFile13" name="h_verify" type="file" placeholder="" style="width: 100%;">
                                    </div>
                                     <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->h_verify, true)) ? json_decode($hrms->h_verify, true) : [$hrms->h_verify]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->h_verify, true)) ? pathinfo(json_decode($hrms->h_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->h_verify, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->h_verify, true)) ? getFilePreview(json_decode($hrms->h_verify, true)[0]) : getFilePreview($hrms->h_verify) !!}
                                       </div>
                                        {{-- <div class="image-preview42" id="imagePreview42">
                                            @if($hrms->h_verify)
                                            <img src="{{ asset($hrms->h_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-11 ">
                                    Biometric Verification  <br>  <input readonly class="form-control" id="inpFile14" name="b_verify" type="file" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->b_verify, true)) ? json_decode($hrms->b_verify, true) : [$hrms->b_verify]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->b_verify, true)) ? pathinfo(json_decode($hrms->b_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->b_verify, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->b_verify, true)) ? getFilePreview(json_decode($hrms->b_verify, true)[0]) : getFilePreview($hrms->b_verify) !!}
                                       </div>
                                        {{-- <div class="image-preview42" id="imagePreview42">
                                            @if($hrms->b_verify)
                                            <img src="{{ asset($hrms->b_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-11"  style="margin-top: 17px;">
                                        Postal Verification  <br>  <input readonly class="form-control" id="inpFile15" type="file" name="p_verify" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->p_verify, true)) ? json_decode($hrms->p_verify, true) : [$hrms->p_verify]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->p_verify, true)) ? pathinfo(json_decode($hrms->p_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->p_verify, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->p_verify, true)) ? getFilePreview(json_decode($hrms->p_verify, true)[0]) : getFilePreview($hrms->p_verify) !!}
                                       </div>
                                        {{-- <div class="image-preview42" id="imagePreview42">
                                            @if($hrms->p_verify)
                                            <img src="{{ asset($hrms->p_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-11 ">
                                    Discharge Book/Experience Certificate  <br>  <input readonly class="form-control" id="inpFile16" name="d_book" type="file" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="file-preview"
                                    style="cursor: pointer;"
                                    data-files="{{ json_encode(is_array(json_decode($hrms->d_book, true)) ? json_decode($hrms->d_book, true) : [$hrms->d_book]) }}"
                                    data-extension="{{ is_array(json_decode($hrms->d_book, true)) ? pathinfo(json_decode($hrms->d_book, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->d_book, PATHINFO_EXTENSION) }}"
                                    onclick="openFileModal(this, 0)">
                                    {!! is_array(json_decode($hrms->d_book, true)) ? getFilePreview(json_decode($hrms->d_book, true)[0]) : getFilePreview($hrms->d_book) !!}
                                   </div>
                                    {{-- <div class="image-preview42" id="imagePreview42">
                                        @if($hrms->d_book)
                                        <img src="{{ asset($hrms->d_book) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div> --}}
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    Vote Verification  <br>  <input readonly class="form-control" type="file" id="inpFile17" name="v_verify" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="file-preview"
                                    style="cursor: pointer;"
                                    data-files="{{ json_encode(is_array(json_decode($hrms->v_verify, true)) ? json_decode($hrms->v_verify, true) : [$hrms->v_verify]) }}"
                                    data-extension="{{ is_array(json_decode($hrms->v_verify, true)) ? pathinfo(json_decode($hrms->v_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->v_verify, PATHINFO_EXTENSION) }}"
                                    onclick="openFileModal(this, 0)">
                                    {!! is_array(json_decode($hrms->v_verify, true)) ? getFilePreview(json_decode($hrms->v_verify, true)[0]) : getFilePreview($hrms->v_verify) !!}
                                   </div>
                                    {{-- <div class="image-preview42" id="imagePreview42">
                                        @if($hrms->v_verify)
                                        <img src="{{ asset($hrms->v_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div> --}}
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    Copy of last Utility Bill   <br>  <input readonly class="form-control" id="inpFile18" name="copy_bill" type="file" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="file-preview"
                                    style="cursor: pointer;"
                                    data-files="{{ json_encode(is_array(json_decode($hrms->copy_bill, true)) ? json_decode($hrms->copy_bill, true) : [$hrms->copy_bill]) }}"
                                    data-extension="{{ is_array(json_decode($hrms->copy_bill, true)) ? pathinfo(json_decode($hrms->copy_bill, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->copy_bill, PATHINFO_EXTENSION) }}"
                                    onclick="openFileModal(this, 0)">
                                    {!! is_array(json_decode($hrms->copy_bill, true)) ? getFilePreview(json_decode($hrms->copy_bill, true)[0]) : getFilePreview($hrms->copy_bill) !!}
                                   </div>
                                    {{-- <div class="image-preview42" id="imagePreview42">
                                        @if($hrms->copy_bill)
                                        <img src="{{ asset($hrms->copy_bill) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div> --}}
                                </div>
                            </div>
                                <div class="row mb-2">
                                    <div class="col-lg-11" style="margin-top: 10px;">
                                        NADRA Verification  <br>  <input readonly class="form-control" id="inpFile19" type="file" name="n_verify" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="file-preview"
                                    style="cursor: pointer;"
                                    data-files="{{ json_encode(is_array(json_decode($hrms->n_verify, true)) ? json_decode($hrms->n_verify, true) : [$hrms->n_verify]) }}"
                                    data-extension="{{ is_array(json_decode($hrms->n_verify, true)) ? pathinfo(json_decode($hrms->n_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->n_verify, PATHINFO_EXTENSION) }}"
                                    onclick="openFileModal(this, 0)">
                                    {!! is_array(json_decode($hrms->n_verify, true)) ? getFilePreview(json_decode($hrms->n_verify, true)[0]) : getFilePreview($hrms->n_verify) !!}
                                   </div>
                                    {{-- <div class="image-preview42" id="imagePreview42">
                                        @if($hrms->n_verify)
                                        <img src="{{ asset($hrms->n_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div> --}}
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                EVS Verification  <br>  <input readonly class="form-control" type="file" id="inpFile20" name="insurrance" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                    <div class="file-preview"
                                    style="cursor: pointer;"
                                    data-files="{{ json_encode(is_array(json_decode($hrms->insurrance, true)) ? json_decode($hrms->insurrance, true) : [$hrms->insurrance]) }}"
                                    data-extension="{{ is_array(json_decode($hrms->insurrance, true)) ? pathinfo(json_decode($hrms->insurrance, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->insurrance, PATHINFO_EXTENSION) }}"
                                    onclick="openFileModal(this, 0)">
                                    {!! is_array(json_decode($hrms->insurrance, true)) ? getFilePreview(json_decode($hrms->insurrance, true)[0]) : getFilePreview($hrms->insurrance) !!}
                                   </div>
                                    {{-- <div class="image-preview42" id="imagePreview42">
                                        @if($hrms->insurrance)
                                        <img src="{{ asset($hrms->insurrance) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div> --}}
                                </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-11" style="margin-top: 10px;">
                                        Guard Bank Account  <br>  <input readonly class="form-control" id="inpFile21" type="file" name="guard_bank" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-right">
                                    <!-- Image Preview Biometric -->
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->guard_bank, true)) ? json_decode($hrms->guard_bank, true) : [$hrms->guard_bank]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->guard_bank, true)) ? pathinfo(json_decode($hrms->guard_bank, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->guard_bank, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->guard_bank, true)) ? getFilePreview(json_decode($hrms->guard_bank, true)[0]) : getFilePreview($hrms->guard_bank) !!}
                                    </div>
                                    {{-- <div class="image-preview42" id="imagePreview42">
                                            @if($hrms->guard_bank)
                                            <img src="{{ asset($hrms->guard_bank) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    Bio Metric Record  <br>  <input readonly class="form-control"  id="inpFile22"  type="file" name="bio_verify" placeholder="" style="width: 100%;">
                                </div>
                               <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->bio_verify, true)) ? json_decode($hrms->bio_verify, true) : [$hrms->bio_verify]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->bio_verify, true)) ? pathinfo(json_decode($hrms->bio_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->bio_verify, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->bio_verify, true)) ? getFilePreview(json_decode($hrms->bio_verify, true)[0]) : getFilePreview($hrms->bio_verify) !!}
                                    </div>
                                {{-- <div class="image-preview42" id="imagePreview42">
                                        @if($hrms->bio_verify)
                                        <img src="{{ asset($hrms->bio_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div> --}}
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    Covid 19 Vaccination  <br>  <input readonly class="form-control" id="inpFile23" type="file" name="c_verify" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->c_verify, true)) ? json_decode($hrms->c_verify, true) : [$hrms->c_verify]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->c_verify, true)) ? pathinfo(json_decode($hrms->c_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->c_verify, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->c_verify, true)) ? getFilePreview(json_decode($hrms->c_verify, true)[0]) : getFilePreview($hrms->c_verify) !!}
                                    </div>
                                {{-- <div class="image-preview42" id="imagePreview42">
                                        @if($hrms->c_verify)
                                        <img src="{{ asset($hrms->c_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div> --}}
                                </div>
                                </div>

                                <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    DPO Verification  <br>  <input readonly class="form-control" id="inpFile24" name="dpo_verify" type="file" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->dpo_verify, true)) ? json_decode($hrms->dpo_verify, true) : [$hrms->dpo_verify]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->dpo_verify, true)) ? pathinfo(json_decode($hrms->dpo_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->dpo_verify, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->dpo_verify, true)) ? getFilePreview(json_decode($hrms->dpo_verify, true)[0]) : getFilePreview($hrms->dpo_verify) !!}
                                    </div>
                                {{-- <div class="image-preview42" id="imagePreview42">
                                        @if($hrms->dpo_verify)
                                        <img src="{{ asset($hrms->dpo_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div> --}}
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-11">
                                    DPO Form Sent <input readonly class="form-control" value="{{ $hrms->form_send }}" name="form_send" type="text" placeholder="" style="width: 100%;">
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-11">
                                    DPO Form Sent on <br> <input readonly class="form-control" name="sent_on" value="{{ $hrms->sent_on }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                DPO Form Sent  <br>  <input readonly class="form-control" id="inpFile24" name="form_attach" type="file" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->form_attach, true)) ? json_decode($hrms->form_attach, true) : [$hrms->form_attach]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->form_attach, true)) ? pathinfo(json_decode($hrms->form_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->form_attach, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->form_attach, true)) ? getFilePreview(json_decode($hrms->form_attach, true)[0]) : getFilePreview($hrms->form_attach) !!}
                                    </div>
                                {{-- <div class="image-preview42" id="imagePreview42">
                                        @if($hrms->form_attach)
                                        <img src="{{ asset($hrms->form_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div> --}}
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-11">
                                DPO Form Received  <br><input readonly class="form-control" type="text" name="form_rec" value="{{ $hrms->form_rec }}"  placeholder="" style="width: 100%;">
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-11">
                                    DPO Form Received on <br> <input readonly class="form-control" name="rec_on" value="{{ $hrms->rec_on }}" type="date" placeholder="" style="width: 100%;">
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    DPO Form Received  <br>  <input readonly class="form-control" id="inpFile24" name="rec_attach" type="file" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->rec_attach, true)) ? json_decode($hrms->rec_attach, true) : [$hrms->rec_attach]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->rec_attach, true)) ? pathinfo(json_decode($hrms->rec_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->rec_attach, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->rec_attach, true)) ? getFilePreview(json_decode($hrms->rec_attach, true)[0]) : getFilePreview($hrms->rec_attach) !!}
                                    </div>
                                {{-- <div class="image-preview42" id="imagePreview42">
                                        @if($hrms->rec_attach)
                                        <img src="{{ asset($hrms->rec_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div> --}}
                                </div>
                                </div>

                                <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    8300 Verification  <br>  <input readonly class="form-control" id="inpFile25" type="file" name="eight_verify" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->eight_verify, true)) ? json_decode($hrms->eight_verify, true) : [$hrms->eight_verify]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->eight_verify, true)) ? pathinfo(json_decode($hrms->eight_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->eight_verify, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->eight_verify, true)) ? getFilePreview(json_decode($hrms->eight_verify, true)[0]) : getFilePreview($hrms->eight_verify) !!}
                                    </div>
                                {{-- <div class="image-preview42" id="imagePreview42">
                                        @if($hrms->eight_verify)
                                        <img src="{{ asset($hrms->eight_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div> --}}
                                </div>
                                </div>

                                <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    E Sahulat Verification  <br>  <input readonly class="form-control" id="inpFile26" type="file" name="sahulat_v" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                <!-- Image Preview Biometric -->
                                <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->sahulat_v, true)) ? json_decode($hrms->sahulat_v, true) : [$hrms->sahulat_v]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->sahulat_v, true)) ? pathinfo(json_decode($hrms->sahulat_v, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->sahulat_v, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->sahulat_v, true)) ? getFilePreview(json_decode($hrms->sahulat_v, true)[0]) : getFilePreview($hrms->sahulat_v) !!}
                                    </div>
                                {{-- <div class="image-preview42" id="imagePreview42">
                                        @if($hrms->sahulat_v)
                                        <img src="{{ asset($hrms->sahulat_v) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                        @else
                                        <span class="image-preview__default-text42">Image Preview</span>
                                        @endif
                                    </div> --}}
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input readonly class="form-control" name="look_back1" value="{{ $hrms->look_back1 }}" type="date" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input readonly class="form-control" name="frequency1" value="{{ $hrms->frequency1 }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea readonly class="form-control" name="notes1" type="text" placeholder="" style="width: 100%;">{{ $hrms->notes1 }}</textarea readonly>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input readonly class="form-control" name="look_back2" value="{{ $hrms->look_back2 }}" type="date" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input readonly class="form-control" name="frequency2" value="{{ $hrms->frequency2 }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea readonly class="form-control" name="notes2"  type="text" placeholder="" style="width: 100%;">{{ $hrms->notes2 }}</textarea readonly>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input readonly class="form-control" name="look_back3" value="{{ $hrms->look_back3 }}" type="date" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input readonly class="form-control" name="frequency3" value="{{ $hrms->frequency3 }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea readonly class="form-control" name="notes3" type="text" placeholder="" style="width: 100%;">{{ $hrms->notes3 }}</textarea readonly>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input readonly class="form-control" name="look_back4" value="{{ $hrms->look_back4 }}" type="date" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input readonly class="form-control" name="frequency4" value="{{ $hrms->frequency4 }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea readonly class="form-control" name="notes4" type="text" placeholder="" style="width: 100%;">{{ $hrms->notes4 }}</textarea readonly>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input readonly class="form-control" name="look_back5" value="{{ $hrms->look_back5 }}" type="date" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input readonly class="form-control" name="frequency5" value="{{ $hrms->frequency5 }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea readonly class="form-control" name="notes5" type="text" placeholder="" style="width: 100%;">{{ $hrms->notes5 }}</textarea readonly>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input readonly class="form-control" name="look_back6" value="{{ $hrms->look_back6 }}" type="date" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input readonly class="form-control" name="frequency6" value="{{ $hrms->frequency6 }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea readonly class="form-control" name="notes6" type="text" placeholder="" style="width: 100%;">{{ $hrms->notes6 }}</textarea readonly>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input readonly class="form-control" name="look_back7" value="{{ $hrms->look_back7 }}" type="date" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input readonly class="form-control" name="frequency7" value="{{ $hrms->frequency7 }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea readonly class="form-control" name="notes7" type="text" placeholder="" style="width: 100%;">{{ $hrms->notes7 }}</textarea readonly>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input readonly class="form-control" name="look_back8" value="{{ $hrms->look_back8 }}" type="date" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input readonly class="form-control" name="frequency8" value="{{ $hrms->frequency8 }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea readonly class="form-control" name="notes8" type="text" placeholder="" style="width: 100%;">{{ $hrms->notes8 }}</textarea readonly>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input readonly class="form-control" name="look_back9" value="{{ $hrms->look_back9 }}" type="date" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input readonly class="form-control" name="frequency9" value="{{ $hrms->frequency9 }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea readonly class="form-control" name="notes9" type="text" placeholder="" style="width: 100%;">{{ $hrms->notes9 }}</textarea readonly>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input readonly class="form-control" name="look_back10" value="{{ $hrms->look_back10 }}" type="date" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input readonly class="form-control" name="frequency10" value="{{ $hrms->frequency10 }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea readonly class="form-control" name="notes10" type="text" placeholder="" style="width: 100%;">{{ $hrms->notes10 }}</textarea readonly>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input readonly class="form-control" name="look_back11" value="{{ $hrms->look_back11 }}" type="date" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input readonly class="form-control" name="frequency11" value="{{ $hrms->frequency11 }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea readonly class="form-control" name="notes11" type="text" placeholder="" style="width: 100%;">{{ $hrms->notes11 }}</textarea readonly>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input readonly class="form-control" name="look_back12" value="{{ $hrms->look_back12 }}" type="date" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input readonly class="form-control" name="frequency12" value="{{ $hrms->frequency12 }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea readonly class="form-control" name="notes12" type="text" placeholder="" style="width: 100%;">value={{ $hrms->notes12 }}</textarea readonly>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input readonly class="form-control" name="look_back13" value="{{ $hrms->look_back13 }}" type="date" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input readonly class="form-control" name="frequency13" value="{{ $hrms->frequency13 }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea readonly class="form-control" name="notes13" type="text" placeholder="" style="width: 100%;">{{ $hrms->notes13 }}</textarea readonly>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input readonly class="form-control" name="look_back14" value="{{ $hrms->look_back14 }}" type="date" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input readonly class="form-control" name="frequency14" value="{{ $hrms->frequency14 }}" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea readonly class="form-control" name="notes14" type="text" placeholder="" style="width: 100%;">{{ $hrms->notes14 }}</textarea readonly>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!--Gurantor Fields-->

                        <div id="guarantorAccordion">
                            <!-- Existing guarantor entries -->
                            @foreach ($hrms->guarantors as $index => $guarantor)
                            <div class="accordion-item" id="guarantorItem{{ $index }}">
                                <h2 class="accordion-header" id="guarantorHeading{{ $index }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#guarantorCollapse{{ $index }}" aria-expanded="true" aria-controls="guarantorCollapse{{ $index }}">
                                        Guarantor No. {{ $index + 1 }}
                                    </button>
                                </h2>
                                <div id="guarantorCollapse{{ $index }}" class="accordion-collapse collapse show" aria-labelledby="guarantorHeading{{ $index }}" data-bs-parent="#guarantorAccordion">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-6" style="margin-top: 28px;">
                                                <input readonly type="hidden" name="guarantors[{{ $index }}][g_id]" value="{{ $guarantor->id }}">
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right">
                                                        Name  <br>  <input readonly class="form-control" name="guarantors[{{ $index }}][g_name]" value="{{ $guarantor->g_name }}" type="text" placeholder="" style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left spacing-right">
                                                        Father Name <br>  <input readonly class="form-control" name="guarantors[{{ $index }}][g_fname]" value="{{ $guarantor->g_fname }}" type="text" placeholder="" style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-6 spacing-right">
                                                        Relationship<br>  <input readonly class="form-control" type="text" value="{{ $guarantor->g_relation }}" name="guarantors[{{ $index }}][g_relation]" placeholder="" style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Tenure of Relation<br>  <input readonly class="form-control" type="text" value="{{ $guarantor->g_tenure_rel }}" name="guarantors[{{ $index }}][g_tenure_rel]"  placeholder="" style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-6 spacing-right">
                                                    CNIC (front)  <br>  <input readonly class="form-control" type="file" value="{{ $guarantor->g_cnic_f }}" name="guarantors[{{ $index }}][g_cnic_f]" placeholder="" style="width: 100%;">
                                                    <div class="file-preview"
                                                    style="cursor: pointer;"
                                                    data-files="{{ json_encode(is_array(json_decode($guarantor->g_cnic_f, true)) ? json_decode($guarantor->g_cnic_f, true) : [$guarantor->g_cnic_f]) }}"
                                                    data-extension="{{ is_array(json_decode($guarantor->g_cnic_f, true)) ? pathinfo(json_decode($guarantor->g_cnic_f, true)[0], PATHINFO_EXTENSION) : pathinfo($guarantor->g_cnic_f, PATHINFO_EXTENSION) }}"
                                                    onclick="openFileModal(this, 0)">
                                                    {!! is_array(json_decode($guarantor->g_cnic_f, true)) ? getFilePreview(json_decode($guarantor->g_cnic_f, true)[0]) : getFilePreview($guarantor->g_cnic_f) !!}
                                                </div>
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                    CNIC (back)  <br>  <input readonly class="form-control" type="file" value="{{ $guarantor->g_cnic_b }}" name="guarantors[{{ $index }}][g_cnic_b]" placeholder="" style="width: 100%;">
                                                    <div class="file-preview"
                                                    style="cursor: pointer;"
                                                    data-files="{{ json_encode(is_array(json_decode($guarantor->g_cnic_b, true)) ? json_decode($guarantor->g_cnic_b, true) : [$guarantor->g_cnic_b]) }}"
                                                    data-extension="{{ is_array(json_decode($guarantor->g_cnic_b, true)) ? pathinfo(json_decode($guarantor->g_cnic_b, true)[0], PATHINFO_EXTENSION) : pathinfo($guarantor->g_cnic_b, PATHINFO_EXTENSION) }}"
                                                    onclick="openFileModal(this, 0)">
                                                    {!! is_array(json_decode($guarantor->g_cnic_b, true)) ? getFilePreview(json_decode($guarantor->g_cnic_b, true)[0]) : getFilePreview($guarantor->g_cnic_b) !!}
                                                </div>
                                                </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-11 spacing-right">
                                                        Postal Verification of References <br>  <input readonly class="form-control" value="{{ $guarantor->pos_verify }}" name="guarantors[{{ $index }}][pos_verify]" type="text" placeholder="" style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 spacing-left">
                                                <h5>Address :</h5>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right">
                                                        Office No <br> <input readonly class="form-control" id="head_office_cell_no" name="guarantors[{{ $index }}][head_office_no]" value="{{ $guarantor->head_office_no }}" type="text" placeholder="" style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left">
                                                        Floor No <br> <input readonly class="form-control" id="head_office_cell_no" name="guarantors[{{ $index }}][head_floor_no]" value="{{ $guarantor->head_floor_no }}" type="text" placeholder="" style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right">
                                                        Building <br> <input readonly class="form-control" id="head_office_cell_no" name="guarantors[{{ $index }}][head_building]" value="{{ $guarantor->head_building }}" type="text" placeholder="" style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left">
                                                        Block <br> <input readonly class="form-control" id="head_office_cell_no" name="guarantors[{{ $index }}][head_block]" value="{{ $guarantor->head_block }}" type="text" placeholder="" style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right">
                                                        Area <br> <input readonly class="form-control" id="head_office_cell_no" name="guarantors[{{ $index }}][head_area]" value="{{ $guarantor->head_area }}" type="text" placeholder="" style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left">
                                                        City <br> <input readonly class="form-control" id="head_office_cell_no" name="guarantors[{{ $index }}][head_city]" value="{{ $guarantor->head_city }}" type="text" placeholder="" style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-11 spacing-right">
                                                        Attachements <br>  <input readonly class="form-control" type="file" name="guarantors[{{ $index }}][head_attach]"  placeholder="" style="width: 88%;" multiple>
                                                    </div>
                                                    <div class="row">
                                                        @if($hrms->attachments)
                                                            @foreach($hrms->attachments as $attachment)
                                                                <div class="col-lg-3">
                                                                    <div class="attachment">
                                                                        <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
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

                        <!-- Button to add more guarantor details entries -->
                        {{-- <button type="button" id="addGuarantorEntry" class="btn btn-primary">Add More Guarantor Details</button> --}}


                        {{-- <center>
                            <button type="button" class="add-more-btn mt-3 mb-3" onclick="guarantor_add_fields()">
                                Add More
                            </button>
                        </center> --}}

                        <div id="guarantor_add_fields">

                        </div>

                        <div class="row">
                            <h5>
                                Finger Print Samples
                            </h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Little Finger  <br>  <input readonly class="form-control" id="inpFile6" type="file" name="l_finger" placeholder="" style="width: 100%;" multiple>
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Fore Finger <br>  <input readonly class="form-control" type="file" id="inpFile7" name="f_finger" placeholder="" style="width: 100%;" multiple>
                                    </div>
                                    <div class="col-lg-3 spacing-left">
                                        Middle Finger <br>  <input readonly class="form-control" type="file" id="inpFile8" name="m_finger" placeholder="" style="width: 100%;" multiple>
                                    </div>
                                </div>

                                <!--Pictures-->
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->l_finger, true)) ? json_decode($hrms->l_finger, true) : [$hrms->l_finger]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->l_finger, true)) ? pathinfo(json_decode($hrms->l_finger, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->l_finger, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->l_finger, true)) ? getFilePreview(json_decode($hrms->l_finger, true)[0]) : getFilePreview($hrms->l_finger) !!}
                                    </div>
                                        {{-- <div class="image-preview42" id="imagePreview42">
                                            @if($hrms->l_finger)
                                            <img src="{{ asset($hrms->l_finger) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div> --}}
                                    </div>
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->f_finger, true)) ? json_decode($hrms->f_finger, true) : [$hrms->f_finger]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->f_finger, true)) ? pathinfo(json_decode($hrms->f_finger, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->f_finger, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->f_finger, true)) ? getFilePreview(json_decode($hrms->f_finger, true)[0]) : getFilePreview($hrms->f_finger) !!}
                                    </div>
                                        {{-- <div class="image-preview42" id="imagePreview42">
                                            @if($hrms->f_finger)
                                            <img src="{{ asset($hrms->f_finger) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div> --}}
                                    </div>
                                    {{-- <div class="col-lg-5 spacing-right">

                                        <div class="image-preview42" id="imagePreview42">
                                            @if($hrms->f_finger)
                                            <img src="{{ asset($hrms->f_finger) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Index Finger  <br>  <input readonly class="form-control" id="inpFile9" type="file" name="i_finger" placeholder="" style="width: 100%;" multiple>
                                    </div>
                                    <div class="col-lg-3 spacing-left ">
                                        Thumb Finger <br>  <input readonly class="form-control" type="file" id="inpFile10" name="t_finger" placeholder="" style="width: 100%;" multiple>
                                    </div>
                                    <div class="col-lg-3 spacing-left ">
                                        Additionals <br>  <input readonly class="form-control" type="file" id="inpFile11" name="additionals" placeholder="" style="width: 100%;" multiple>
                                    </div>
                                </div>



                                <!--Pictures-->
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->i_finger, true)) ? json_decode($hrms->i_finger, true) : [$hrms->i_finger]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->i_finger, true)) ? pathinfo(json_decode($hrms->i_finger, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->i_finger, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->i_finger, true)) ? getFilePreview(json_decode($hrms->i_finger, true)[0]) : getFilePreview($hrms->i_finger) !!}
                                    </div>
                                        {{-- <div class="image-preview42" id="imagePreview42">
                                            @if($hrms->i_finger)
                                            <img src="{{ asset($hrms->i_finger) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div> --}}
                                    </div>
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                    <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->t_finger, true)) ? json_decode($hrms->t_finger, true) : [$hrms->t_finger]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->t_finger, true)) ? pathinfo(json_decode($hrms->t_finger, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->t_finger, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->t_finger, true)) ? getFilePreview(json_decode($hrms->t_finger, true)[0]) : getFilePreview($hrms->t_finger) !!}
                                    </div>
                                        {{-- <div class="image-preview42" id="imagePreview42">
                                            @if($hrms->t_finger)
                                            <img src="{{ asset($hrms->t_finger) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div> --}}
                                    </div>
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->additionals, true)) ? json_decode($hrms->additionals, true) : [$hrms->additionals]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->additionals, true)) ? pathinfo(json_decode($hrms->additionals, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->additionals, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->additionals, true)) ? getFilePreview(json_decode($hrms->additionals, true)[0]) : getFilePreview($hrms->additionals) !!}
                                    </div>
                                        {{-- <div class="image-preview42" id="imagePreview42">
                                            @if($hrms->additionals)
                                            <img src="{{ asset($hrms->additionals) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div> --}}
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-2">
                            <div class="col-lg-3 spacing-right">
                                Attachements <br>  <input readonly class="form-control" type="file" name="f_attachment" placeholder="" style="width: 100%;" multiple>
                                </div>
                                <div class="row">
                                    @if($hrms->attachments)
                                        @foreach($hrms->attachments as $attachment)
                                            <div class="col-lg-3">
                                                <div class="attachment">
                                                    <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                Notes <br>   <textarea readonly id="w3review" class="form-control" name="finger_note" rows="4" cols="35">{{ $hrms->finger_note }}
                                </textarea readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--education-->
                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="education" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <h5 style="text-align:center;"><u><b>Education</b></u></h5>

                        <div id="educationAccordion">
                            <!-- Existing education entries -->
                            @foreach ($hrms->education as $index => $education)
                            <div class="accordion-item" id="educationItem{{ $index }}">
                                <h2 class="accordion-header" id="educationHeading{{ $index }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#educationCollapse{{ $index }}" aria-expanded="true" aria-controls="educationCollapse{{ $index }}">
                                        Education Details {{ $index + 1 }}
                                    </button>
                                </h2>
                                <div id="educationCollapse{{ $index }}" class="accordion-collapse collapse show" aria-labelledby="educationHeading{{ $index }}" data-bs-parent="#educationAccordion">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <input readonly type="hidden" name="education[{{ $index }}][d_id]" value="{{ $education->id }}">
                                            <div class="col-lg-6">
                                                <div class="row mb-2">
                                                    <div class="form-type col-lg-3">
                                                        Name of Degree  <br>  <input readonly class="form-control" type="text" value="{{ $education->degree }}" name="education[{{ $index }}][degree]" placeholder="" style="width: 100%;">
                                                    </div>
                                                    <div class="form-type col-lg-3">
                                                        Date <br>  <input readonly class="form-control" type="date" name="education[{{ $index }}][degree_date]" value="{{ $education->degree_date }}" placeholder="" style="width: 100%;">
                                                    </div>
                                                    <div class="form-type col-lg-5 spacing-left">
                                                        Scanned Certificate of Degree <br>  <input readonly class="form-control" type="file" name="education[{{ $index }}][degree_pic]" placeholder="" style="width: 100%;" multiple>
                                                    </div>
                                                    <div class="row">
                                                        @if($hrms->attachments)
                                                            @foreach($hrms->attachments as $attachment)
                                                                <div class="col-lg-3">
                                                                    <div class="attachment">
                                                                        <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>

                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-lg-6 form-type spacing-right">
                                                        Institute Name <br>  <input readonly class="form-control" name="education[{{ $index }}][institute_name]" value="{{ $education->institute_name }}" type="text" placeholder="" style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 form-type spacing-left">
                                                    Awarding Body <br>  <input readonly class="form-control"name="education[{{ $index }}][a_body]" type="text" value="{{ $education->a_body }}" placeholder="" style="width: 100%;">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-11 ">
                                                        Notes <br>
                                                        <textarea readonly id="w3review" class="form-control" style="width: 100%;" name="education[{{ $index }}][ex_notes]" rows="4" cols="40">{{ $education->ex_notes }}
                                                        </textarea readonly>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-4 spacing-left">
                                                <div class="row mb-3">
                                                    <div class="form-type col-lg-5 spacing-right">
                                                        Degree No. <br>  <input readonly class="form-control" name="education[{{ $index }}][degree_no]" value="{{ $education->degree_no }}" type="text" placeholder="" style="width: 100%;">
                                                    </div>
                                                    <div class="form-type col-lg-5 spacing-left spacing-right">
                                                    Degree Level <br>  <input readonly class="form-control" name="education[{{ $index }}][degree_level]" value="{{ $education->degree_level }}" type="text" placeholder="" style="width: 100%;">
                                                </div>
                                                </div>
                                                <div class="row mb-2">
                                                <div class="form-type col-lg-5 spacing-right">
                                                    Marks Obtained  <br>  <input readonly class="form-control" type="text" name="education[{{ $index }}][ob_marks]" value="{{ $education->ob_marks }}" placeholder="" style="width: 100%;">
                                                    </div>
                                                    <div class="form-type col-lg-5 spacing-right">
                                                        Total Marks  <br>  <input readonly class="form-control" type="text"  name="education[{{ $index }}][t_marks]" value="{{ $education->t_marks }}" placeholder="" style="width: 100%;">
                                                    </div>

                                                    <div class="form-type col-lg-5  spacing-right">
                                                        Grade <br>  <input readonly class="form-control" type="text"  name="education[{{ $index }}][grade]" value="{{ $education->grade }}" placeholder="" style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <div class="form-type col-lg-5 spacing-right">
                                                    Start Date <br>  <input readonly class="form-control" type="date"  name="education[{{ $index }}][date_start]" value="{{ $education->date_start }}" placeholder="" style="width: 100%;">
                                                </div>
                                                <div class="form-type col-lg-5 spacing-right">
                                                    End Date <br>  <input readonly class="form-control" type="date" name="education[{{ $index }}][date_end]" value="{{ $education->date_end }}" placeholder="" style="width: 100%;">
                                                </div>
                                                </div>
                                                <div class="row mb-2">
                                                <div class="col-lg-10 mt-3 form-type spacing-right">
                                                    Address of Institution <br>  <input readonly class="form-control" name="education[{{ $index }}][adress_inst]" value="{{ $education->adress_inst }}" type="text" placeholder="" style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                Attachement <br>  <input readonly class="form-control" type="file" name="education[{{ $index }}][deg_attach]"  placeholder="" style="width: 100%;" multiple>
                                            </div>
                                            <div class="row">
                                                @if($hrms->attachments)
                                                    @foreach($hrms->attachments as $attachment)
                                                        <div class="col-lg-3">
                                                            <div class="attachment">
                                                                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>
                                                            </div>
                                                        </div>
                                                    @endforeach
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

                        <!-- Button to add more education entries -->
                        {{-- <button type="button" id="addEducationEntry" class="btn btn-primary">Add More Education Details</button> --}}

                        <h5 style="text-align:center;"><u><b>Health</b></u></h5>
                        <div class="row">
                            <div class="col-lg-6 spacing-right">
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                        Age  <br>  <input readonly class="form-control" id="inpFile5" name="h_age" value="{{ $hrms->h_age }}" type="text" placeholder="" style="width: 100%;" multiple>
                                        </div>
                                        <div class="col-lg-5 spacing-left">
                                        Weight  <br>  <input readonly class="form-control" type="text" name="weight" value="{{ $hrms->weight }}" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Height  <br> <input readonly class="form-control" type="text" name="height" value="{{ $hrms->height }}" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left spacing-right">
                                        Complection <br>  <input readonly class="form-control" type="text" name="complection" value="{{ $hrms->complection }}" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left">
                                            Disease <br><input readonly id="medical_category" class="form-control" name="ay_other_d" value="{{ $hrms->ay_other_d }}" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Medical Category  <br><input readonly class="form-control" name="medical_category" value="{{ $hrms->medical_category }}" placeholder="" style="width: 100%;" multiple>
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Card of Verification <br>  <input readonly class="form-control" id="inpFile44" name="vaccine_card" type="file" placeholder="" style="width: 100%;" multiple>
                                        </div>
                                        <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->vaccine_card, true)) ? json_decode($hrms->vaccine_card, true) : [$hrms->vaccine_card]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->vaccine_card, true)) ? pathinfo(json_decode($hrms->vaccine_card, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->vaccine_card, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->vaccine_card, true)) ? getFilePreview(json_decode($hrms->vaccine_card, true)[0]) : getFilePreview($hrms->vaccine_card) !!}
                                    </div>
                                        {{-- <div class="image-preview42" id="imagePreview42">
                                            @if($hrms->vaccine_card)
                                            <img src="{{ asset($hrms->vaccine_card) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div> --}}
                                    </div>


                                    </div>
                                    <h6 class="mt-4">For Phsychometric Test: <a href="phsychometric.html">Click Here</a></h6>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                        Medical Fitness Certificate <br>  <input readonly class="form-control" name="medical_fit_card" type="file" placeholder="" style="width: 100%;" multiple>
                                        </div>
                                        <div class="row">
                                            <div class="file-preview"
                                            style="cursor: pointer;"
                                            data-files="{{ json_encode(is_array(json_decode($hrms->medical_fit_card, true)) ? json_decode($hrms->medical_fit_card, true) : [$hrms->medical_fit_card]) }}"
                                            data-extension="{{ is_array(json_decode($hrms->medical_fit_card, true)) ? pathinfo(json_decode($hrms->medical_fit_card, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->medical_fit_card, PATHINFO_EXTENSION) }}"
                                            onclick="openFileModal(this, 0)">
                                            {!! is_array(json_decode($hrms->medical_fit_card, true)) ? getFilePreview(json_decode($hrms->medical_fit_card, true)[0]) : getFilePreview($hrms->medical_fit_card) !!}
                                        </div>
                                            {{-- @if($hrms->attachments)
                                            @foreach($hrms->attachments as $attachment)
                                                <div class="col-lg-3">
                                                    <div class="attachment">
                                                        <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif --}}
                                        </div>
                                        <div class="col-lg-6 spacing-left">
                                        Attachments <br>  <input readonly class="form-control" type="file" name="medical_fit_attach" placeholder="" style="width: 100%;" multiple>
                                        </div>
                                        <div class="row">
                                             <div class="file-preview"
                                            style="cursor: pointer;"
                                            data-files="{{ json_encode(is_array(json_decode($hrms->medical_fit_attach, true)) ? json_decode($hrms->medical_fit_attach, true) : [$hrms->medical_fit_attach]) }}"
                                            data-extension="{{ is_array(json_decode($hrms->medical_fit_attach, true)) ? pathinfo(json_decode($hrms->medical_fit_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->medical_fit_attach, PATHINFO_EXTENSION) }}"
                                            onclick="openFileModal(this, 0)">
                                            {!! is_array(json_decode($hrms->medical_fit_attach, true)) ? getFilePreview(json_decode($hrms->medical_fit_attach, true)[0]) : getFilePreview($hrms->medical_fit_attach) !!}
                                        </div>
                                        <!--@if($hrms->attachments)-->
                                        <!--    @foreach($hrms->attachments as $attachment)-->
                                        <!--        <div class="col-lg-3">-->
                                        <!--            <div class="attachment">-->
                                        <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    @endforeach-->
                                        <!--@endif-->
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                                        Notes <br>   <textarea readonly id="w3review" class="form-control" name="medical_fit_note" rows="4" cols="40">
                                            {{ $hrms->medical_fit_note }}
                                        </textarea readonly>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-lg-6 spacing-left">
                                <h5>Details Of Physician</h5>
                                <div class="row mb-2">

                                        <div class="col-lg-12 spacing-left">

                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                    Name <br>  <input readonly class="form-control" type="text" value="{{ $hrms->phy_name }}" name="phy_name" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                    Number  <br>  <input readonly class="form-control" type="text" value="{{ $hrms->phy_cell }}" name="phy_cell" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                                <h5>Address</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Office No  <br>  <input readonly class="form-control" name="phy_office" value="{{ $hrms->phy_office }}" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Building <br>  <input readonly class="form-control" name="phy_building" value="{{ $hrms->phy_building }}" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-right">
                                        Block  <br>  <input readonly class="form-control" name="phy_block" value="{{ $hrms->phy_block }}" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Area <br>  <input readonly class="form-control" name="phy_area" value="{{ $hrms->phy_area }}" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-right">
                                        City  <br>  <input readonly class="form-control" name="phy_city" value="{{ $hrms->phy_city }}" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Location <br>  <input readonly class="form-control" name="phy_loc" value="{{ $hrms->phy_loc }}" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                        Notes  <br>  <textarea readonly class="form-control" name="phy_note"  type="text" placeholder="" style="width: 100%;">{{ $hrms->phy_note }}</textarea readonly>
                                    </div>
                                    <div class="col-lg-6 spacing-right">
                                        Attachment  <br>  <input readonly class="form-control" name="phy_attach" type="file" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="row">
                                       <div class="file-preview"
                                            style="cursor: pointer;"
                                            data-files="{{ json_encode(is_array(json_decode($hrms->phy_attach, true)) ? json_decode($hrms->phy_attach, true) : [$hrms->phy_attach]) }}"
                                            data-extension="{{ is_array(json_decode($hrms->phy_attach, true)) ? pathinfo(json_decode($hrms->phy_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->phy_attach, PATHINFO_EXTENSION) }}"
                                            onclick="openFileModal(this, 0)">
                                            {!! is_array(json_decode($hrms->phy_attach, true)) ? getFilePreview(json_decode($hrms->phy_attach, true)[0]) : getFilePreview($hrms->phy_attach) !!}
                                        </div>
                                        <!--@if($hrms->attachments)-->
                                        <!--    @foreach($hrms->attachments as $attachment)-->
                                        <!--        <div class="col-lg-3">-->
                                        <!--            <div class="attachment">-->
                                        <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    @endforeach-->
                                        <!--@endif-->
                                    </div>
                                </div>
                                <h5>Vaccination</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Vaccination Type  <br>  <input readonly class="form-control" value="{{ $hrms->vac_type }}" name="vac_type"  type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Vaccination Proof Type <br>  <input readonly class="form-control"  name="vac_pr" type="file" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="row">
                                      <div class="file-preview"
                                            style="cursor: pointer;"
                                            data-files="{{ json_encode(is_array(json_decode($hrms->vac_pr, true)) ? json_decode($hrms->vac_pr, true) : [$hrms->vac_pr]) }}"
                                            data-extension="{{ is_array(json_decode($hrms->vac_pr, true)) ? pathinfo(json_decode($hrms->vac_pr, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->vac_pr, PATHINFO_EXTENSION) }}"
                                            onclick="openFileModal(this, 0)">
                                            {!! is_array(json_decode($hrms->vac_pr, true)) ? getFilePreview(json_decode($hrms->vac_pr, true)[0]) : getFilePreview($hrms->vac_pr) !!}
                                        </div>
                                        <!--@if($hrms->attachments)-->
                                        <!--    @foreach($hrms->attachments as $attachment)-->
                                        <!--        <div class="col-lg-3">-->
                                        <!--            <div class="attachment">-->
                                        <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    @endforeach-->
                                        <!--@endif-->
                                    </div>
                                </div>

                            </div>

                                    </div>
                            </div>
                        </div>
                        <h5 style="text-align:center;"><u><b>Work Experience</b></u></h5>

                        <div id="workAccordion">
                            <!-- Existing work experience entries -->
                            @foreach ($hrms->workExperiences as $index => $work)
                            <div class="accordion-item" id="workItem{{ $index }}">
                                <h2 class="accordion-header" id="workHeading{{ $index }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#workCollapse{{ $index }}" aria-expanded="true" aria-controls="workCollapse{{ $index }}">
                                        Work Experience Details {{ $index + 1 }}
                                    </button>
                                </h2>
                                <div id="workCollapse{{ $index }}" class="accordion-collapse collapse show" aria-labelledby="workHeading{{ $index }}">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <input readonly type="hidden" name="workExperiences[{{ $index }}][w_id]" value="{{ $work->id }}">
                                            <div class="col-lg-5">
                                                <div class="row mb-2">
                                                    <div class="col-lg-11 spacing-right">
                                                        Organization Name <br>  <input readonly class="form-control" name="workExperiences[{{ $index }}][org_name]" value="{{ $work->org_name }}" type="text" placeholder="" style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-7 spacing-right">
                                                        Email of the Company<br>  <input readonly class="form-control" name="workExperiences[{{ $index }}][email_oc]" value="{{ $work->email_oc }}" type="text" placeholder="" style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                    POC <br>  <input readonly class="form-control" type="text" name="workExperiences[{{ $index }}][poc]" value="{{ $work->poc }}" placeholder="" style="width: 100%;">
                                                </div>
                                                </div>
                                                <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right">
                                                    Job Experience Certificate <br>  <input readonly class="form-control" name="workExperiences[{{ $index }}][jec]" type="file" placeholder="" style="width: 100%;" multiple>
                                                </div>
                                                <div class="row">
                                                      <div class="file-preview"
                                                        style="cursor: pointer;"
                                                        data-files="{{ json_encode(is_array(json_decode($work->jec, true)) ? json_decode($work->jec, true) : [$work->jec]) }}"
                                                        data-extension="{{ is_array(json_decode($work->jec, true)) ? pathinfo(json_decode($work->jec, true)[0], PATHINFO_EXTENSION) : pathinfo($work->jec, PATHINFO_EXTENSION) }}"
                                                        onclick="openFileModal(this, 0)">
                                                        {!! is_array(json_decode($work->jec, true)) ? getFilePreview(json_decode($work->jec, true)[0]) : getFilePreview($work->jec) !!}
                                                    </div>
                                                    <!--@if($hrms->attachments)-->
                                                    <!--    @foreach($hrms->attachments as $attachment)-->
                                                    <!--        <div class="col-lg-3">-->
                                                    <!--            <div class="attachment">-->
                                                    <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                                    <!--            </div>-->
                                                    <!--        </div>-->
                                                    <!--    @endforeach-->
                                                    <!--@endif-->
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Attachements  <br>  <input readonly class="form-control" name="workExperiences[{{ $index }}][jec_attach]" type="file" placeholder="" style="width: 100%;">
                                                </div>
                                                <div class="row">
                                                     <div class="file-preview"
                                                        style="cursor: pointer;"
                                                        data-files="{{ json_encode(is_array(json_decode($work->jec_attach, true)) ? json_decode($work->jec_attach, true) : [$work->jec_attach]) }}"
                                                        data-extension="{{ is_array(json_decode($work->jec_attach, true)) ? pathinfo(json_decode($work->jec_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($work->jec_attach, PATHINFO_EXTENSION) }}"
                                                        onclick="openFileModal(this, 0)">
                                                        {!! is_array(json_decode($work->jec_attach, true)) ? getFilePreview(json_decode($work->jec_attach, true)[0]) : getFilePreview($work->jec_attach) !!}
                                                    </div>
                                                        <!--@if($hrms->attachments)-->
                                                        <!--    @foreach($hrms->attachments as $attachment)-->
                                                        <!--        <div class="col-lg-3">-->
                                                        <!--            <div class="attachment">-->
                                                        <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                                        <!--            </div>-->
                                                        <!--        </div>-->
                                                        <!--    @endforeach-->
                                                        <!--@endif-->
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right">
                                                    Designation <br>  <input readonly class="form-control" name="workExperiences[{{ $index }}][w_desig]" value="{{ $work->w_desig }}" type="text" placeholder="" style="width: 100%;" multiple>
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Salary  <br>  <input readonly class="form-control" name="workExperiences[{{ $index }}][w_salary]" value="{{ $work->w_salary }}" type="text" placeholder="" style="width: 100%;">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 spacing-left">
                                                <div class="row mb-2">
                                                    <div class="col-lg-6 spacing-right">
                                                        Service Tenure <br>  <input readonly class="form-control" name="workExperiences[{{ $index }}][ser_tenure]" value="{{ $work->ser_tenure }}" type="text" placeholder="" style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-right spacing-left">
                                                        Others <br>  <input readonly class="form-control" type="file" name="workExperiences[{{ $index }}][ser_other]" placeholder="" style="width: 100%;">
                                                    </div>
                                                    <div class="row">
                                                         <div class="file-preview"
                                                        style="cursor: pointer;"
                                                        data-files="{{ json_encode(is_array(json_decode($work->ser_other, true)) ? json_decode($work->ser_other, true) : [$work->ser_other]) }}"
                                                        data-extension="{{ is_array(json_decode($work->ser_other, true)) ? pathinfo(json_decode($work->ser_other, true)[0], PATHINFO_EXTENSION) : pathinfo($work->ser_other, PATHINFO_EXTENSION) }}"
                                                        onclick="openFileModal(this, 0)">
                                                        {!! is_array(json_decode($work->ser_other, true)) ? getFilePreview(json_decode($work->ser_other, true)[0]) : getFilePreview($work->ser_other) !!}
                                                    </div>
                                                        <!--@if($hrms->attachments)-->
                                                        <!--    @foreach($hrms->attachments as $attachment)-->
                                                        <!--        <div class="col-lg-3">-->
                                                        <!--            <div class="attachment">-->
                                                        <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                                        <!--            </div>-->
                                                        <!--        </div>-->
                                                        <!--    @endforeach-->
                                                        <!--@endif-->
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-11 spacing-right">
                                                        Inservice Awards /Achivements <br>  <input readonly class="form-control" name="workExperiences[{{ $index }}][achivement]" value="{{ $work->achivement }}" type="text" placeholder="" style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right">
                                                    Joining Date <br>  <input readonly class="form-control" type="date" name="workExperiences[{{ $index }}][join_date]" value="{{ $work->join_date }}" placeholder="" style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-right spacing-left">
                                                    End Date <br>  <input readonly class="form-control" type="date" name="workExperiences[{{ $index }}][end_date]" value="{{ $work->end_date }}" placeholder="" style="width: 100%;" multiple>
                                                </div>
                                                <div class="col-lg-5 spacing-right" style="margin-top:10px;">
                                                    Total Experience <br>  <input readonly class="form-control" type="text" name="workExperiences[{{ $index }}][t_exp]" value="{{ $work->t_exp }}" placeholder="" style="width: 100%;" multiple>
                                                </div>
                                            </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Button to add more work experience entries -->
                        {{-- <button type="button" id="addWorkEntry" class="btn btn-primary mt-2">Add More Work Experience</button> --}}

                        <div class="row mt-4">
                        {{-- <center> <h4>Health Status</h4> </center> --}}


                        <div class="col-lg-8">
                            <div class="row mb-2">

                            </div>


                        </div>
                    </div>
                    </div>
                    <hr>
                    <!--compliances-->
                    <div class="tab-pane fade show m-3" style="opacity: 90%;" id="compliances" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row" style="display: flex; justify-content:flex-end;">
                        <center><h4>Employee Old Age Benefit </h4></center>
                            <div class="col-lg-3" style="margin-left:0px">
                                <br> <div class="form-check form-check-inline">
                                <input readonly class="form-check-input readonly" type="checkbox" id="inlineCheckbox" value="option1">
                                <label class="form-check-label" for="inlineCheckbox">Out of Scope</label>
                                </div>
                            </div>
                            <div class="col-lg-12  spacing-right" id="eobi-fields">
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            EOBI Registration No. of Staff<br>  <input readonly class="form-control" value="{{ $hrms->c_eobi }}"  name="c_eobi" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Fall in EOBI <br>  <input readonly class="form-control" name="f_eobi" value="{{ $hrms->f_eobi }}"  type="text" placeholder="" style="width: 100%;">
                                        </div>

                                        <div class="col-lg-4 spacing-right">
                                        Sub code of that EOBI Region <br>  <input readonly class="form-control" value="{{ $hrms->sub_eobi }}"  name="sub_eobi" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                    Front Side of EOBI Card  <br>  <input readonly class="form-control" id="inpFile30" type="file" name="front_eobi" placeholder="" style="width: 100%;">
                                    <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->front_eobi, true)) ? json_decode($hrms->front_eobi, true) : [$hrms->front_eobi]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->front_eobi, true)) ? pathinfo(json_decode($hrms->front_eobi, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->front_eobi, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->front_eobi, true)) ? getFilePreview(json_decode($hrms->front_eobi, true)[0]) : getFilePreview($hrms->front_eobi) !!}
                                    </div>
                                        {{-- <div class="image-preview42" id="imagePreview42">
                                            @if($hrms->front_eobi)
                                            <img src="{{ asset($hrms->front_eobi) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div> --}}
                                    </div>
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Back side of EOBI Card <br>  <input readonly class="form-control" id="inpFile31" name="back_eobi" type="file"  placeholder="" style="width: 100%;">
                                        <div class="row mb-2">
                                        <div class="col-lg-11 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->back_eobi, true)) ? json_decode($hrms->back_eobi, true) : [$hrms->back_eobi]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->back_eobi, true)) ? pathinfo(json_decode($hrms->back_eobi, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->back_eobi, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->back_eobi, true)) ? getFilePreview(json_decode($hrms->back_eobi, true)[0]) : getFilePreview($hrms->back_eobi) !!}
                                    </div>
                                        {{-- <div class="image-preview42" id="imagePreview42">
                                            @if($hrms->back_eobi)
                                            <img src="{{ asset($hrms->back_eobi) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div> --}}
                                    </div>
                                    </div>
                                    </div>

                                </div>
                                    {{-- <div class="row mb-2">
                                        <div class="col-lg-11">
                                            ScreenSot from EoBI Portal  <br>  <input readonly class="form-control" name="ss_eobi" type="file" id="inpFile4" placeholder="" style="width: 100%;" multiple>
                                        </div>
                                    </div> --}}





                            </div>
                            <div class="row" style="display: flex; justify-content:flex-end;">
                            <center><h4>Social Security</h4></center>
                            <div class="col-lg-3" style="margin-left:0px">
                                <br> <div class="form-check form-check-inline" >
                                    <input readonly class="form-check-input readonly" type="checkbox" id="lineCheckbox" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox">Out of Scope</label>
                                    </div>
                            </div>
                                <div class="col-lg-12 spacing-right" id="eobi-f">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Social Security Registration No. of Staff <br>  <input readonly class="form-control" value="{{ $hrms->ss_staff }}"  name="ss_staff" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Fall in EOBI <br><input readonly class="form-control" name="fall_ss"  type="text" value="{{ $hrms->fall_ss }}"  placeholder="" style="width: 100%;">
                                    </div>

                                    <div class="col-lg-4 spacing-right">
                                        Sub Code of that Social Security Region <br>  <input readonly class="form-control" value="{{ $hrms->sub_ss }}"  name="sub_ss" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                        Front Side of SS Card  <br>  <input readonly class="form-control" id="inpFile40" type="file" name="front_ss" placeholder="" style="width: 105%;">
                                        <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                        data-files="{{ json_encode(is_array(json_decode($hrms->front_ss, true)) ? json_decode($hrms->front_ss, true) : [$hrms->front_ss]) }}"
                                        data-extension="{{ is_array(json_decode($hrms->front_ss, true)) ? pathinfo(json_decode($hrms->front_ss, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->front_ss, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->front_ss, true)) ? getFilePreview(json_decode($hrms->front_ss, true)[0]) : getFilePreview($hrms->front_ss) !!}
                                    </div>
                                        {{-- <div class="image-preview42" id="imagePreview42">
                                            @if($hrms->front_ss)
                                            <img src="{{ asset($hrms->front_ss) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div> --}}
                                        </div>
                                        </div>
                                        <div class="col-lg-5">
                                            Back side of SS Card <br>  <input readonly class="form-control" id="inpFile41"  name="back_ss" type="file" placeholder="" style="width: 108%;">
                                            <div class="row mb-2">
                                            <div class="col-lg-11 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="file-preview"
                                                style="cursor: pointer;"
                                                data-files="{{ json_encode(is_array(json_decode($hrms->back_ss, true)) ? json_decode($hrms->back_ss, true) : [$hrms->back_ss]) }}"
                                                data-extension="{{ is_array(json_decode($hrms->back_ss, true)) ? pathinfo(json_decode($hrms->back_ss, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->back_ss, PATHINFO_EXTENSION) }}"
                                                onclick="openFileModal(this, 0)">
                                                {!! is_array(json_decode($hrms->back_ss, true)) ? getFilePreview(json_decode($hrms->back_ss, true)[0]) : getFilePreview($hrms->back_ss) !!}
                                            </div>
                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                    @if($hrms->back_ss)
                                                    <img src="{{ asset($hrms->back_ss) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                    @else
                                                    <span class="image-preview__default-text42">Image Preview</span>
                                                    @endif
                                                </div> --}}
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        {{-- <div class="row mb-2">
                                            <div class="col-lg-11">
                                                ScreenSot from EoBI Portal  <br>  <input readonly class="form-control" name="ss_eobi" type="file" id="inpFile4" placeholder="" style="width: 100%;" multiple>
                                            </div>
                                        </div> --}}

                                        {{-- <div class="row mb-2">
                                            <div class="col-lg-11">
                                            <!--Image Preview Screen Shot-->
                                            <div class="image-preview4" id="imagePreview4">
                                            <img src="" alt="Image Preview4" class="image-preview__image4">
                                            <span class="image-preview__default-text4"> Image Preview </span>
                                            </div>
                                            </div>
                                        </div> --}}
                                </div>

                                </div>
                            </div>

                            <div class="col-lg-6 spacing-left">
                                {{-- <h5>Observation and Appraisal</h5> --}}
                                <div class="row mb-2">
                                <div class=" mb-2 d-flex align-items-center">

                                    {{-- <label for="Type Of Training:" class="form-check-label spacing-right" >Observation Month</label>
                                    <div class="form-check form-check-inline spacing-left">
                                        <input readonly class="form-check-input readonly" type="checkbox" id="inlineCheckbox3" value="negative">
                                        <label class="form-check-label" for="inlineCheckbox3">Negative</label>
                                    </div>
                                    <div class="form-check form-check-inline spacing-left">
                                        <input readonly class="form-check-input readonly" type="checkbox" id="inlineCheckbox2" value="positives">
                                        <label class="form-check-label" for="inlineCheckbox2">Positive</label>
                                    </div> --}}


                                </div>
                                    {{-- <div class="col-lg-5 spacing-left spacing-right" style="margin-left:12px">
                                    Remarks by HR  <br>  <textarea readonly class="form-control" type="text" name="hr_remark" placeholder="" style="width: 100%;"></textarea readonly>
                                    </div> --}}
                                </div>
                                {{-- <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Attachment <br>  <input readonly class="form-control" type="file" name="observ_attach" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Appraisal(PKR) <br>  <input readonly class="form-control" type="text" name="apr_pk" placeholder="" style="width: 100%;">
                                    </div>
                                </div> --}}
                                {{-- <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                Screenshot Attachment<br>  <input readonly class="form-control" type="file" name="sc_attach" placeholder="" style="width: 100%;">
                                </div>
                                {{-- <div class="col-lg-5 spacing-left spacing-right">
                                    Scanned Document of Policy<br>  <input readonly class="form-control" name="subm_date" type="file" placeholder="" style="width: 100%;">
                                </div> --}}

                                {{-- <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                SS of Insurance Certificate<br>   <input readonly class="form-control" name="ss_ins_c" type="file" id="inpFile4" placeholder="" style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Amount Write with Insurance <br>  <input readonly class="form-control" type="text" name="amount_w_ins" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                    Others<br>   <input readonly class="form-control" type="file" id="inpFile4" name="policy_other" placeholder="" style="width: 100%;" multiple>
                                    </div>

                                </div> --}}
                        </div>
                        <div class="col-lg-12 spacing-right">
                            <center><h4>Group Life Insurrance</h4></center>
                                <div class="row" style="display: flex; justify-content:flex-end;">
                                    <div class="col-lg-3" style="margin-left:0px">
                                        <br> <div class="form-check form-check-inline">
                                        <input readonly class="form-check-input readonly" type="checkbox" id="inCheckbox" value="">
                                        <label class="form-check-label" for="">Out of Scope</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 spacing-right" id="eobi-field">
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                        Insurance No. of Employee  <br>  <input readonly class="form-control" value="{{ $hrms->gli_ins }}"  name="gli_ins" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-right">
                                            Insurance Company Name  <br>  <input readonly class="form-control" value="{{ $hrms->gli_name }}"  name="gli_name" type="text" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left spacing-right" style="margin-left:8px;">
                                            Policy Number of PIFFERS <br>  <input readonly class="form-control" type="text" value="{{ $hrms->gli_policy }}"  name="gli_policy" placeholder="" style="width: 98%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                            Type Of Insurrance <br>  <input readonly class="form-control" type="text" value="{{ $hrms->type_ins }}"  name="type_ins" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left spacing-right">
                                            Sum Insured <br>  <input readonly class="form-control" type="text" value="{{ $hrms->sum_gli }}"  name="sum_gli" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                        Date of Insurrance<br>  <input readonly class="form-control" type="date" value="{{ $hrms->date_ins }}"  name="date_ins" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left spacing-right">
                                        Scanned Document of Policy<br>  <input readonly class="form-control" name="snc_pol"   type="file" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="row">
                                                <div class="file-preview"
                                                        style="cursor: pointer;"
                                                        data-files="{{ json_encode(is_array(json_decode($hrms->snc_pol, true)) ? json_decode($hrms->snc_pol, true) : [$hrms->snc_pol]) }}"
                                                        data-extension="{{ is_array(json_decode($hrms->snc_pol, true)) ? pathinfo(json_decode($hrms->snc_pol, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->snc_pol, PATHINFO_EXTENSION) }}"
                                                        onclick="openFileModal(this, 0)">
                                                        {!! is_array(json_decode($hrms->snc_pol, true)) ? getFilePreview(json_decode($hrms->snc_pol, true)[0]) : getFilePreview($hrms->snc_pol) !!}
                                                    </div>
                                        <!--@if($hrms->attachments)-->
                                        <!--    @foreach($hrms->attachments as $attachment)-->
                                        <!--        <div class="col-lg-3">-->
                                        <!--            <div class="attachment">-->
                                        <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    @endforeach-->
                                        <!--@endif-->
                                        </div>
                                    </div>
                                    </div>
                                    {{-- <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                    SS of Insurance Certificate<br>   <input readonly class="form-control" name="ss_ins_c" type="file" id="inpFile4" placeholder="" style="width: 100%;" multiple>
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Amount Write with Insurance <br>  <input readonly class="form-control" type="text" name="amount_w_ins" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-right">
                                        Others<br>   <input readonly class="form-control" type="file" id="inpFile4" name="policy_other" placeholder="" style="width: 100%;" multiple>
                                        </div>

                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                        <h5>Next of Kin</h5>
                        <div class="col-lg-10 mt-2">
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Name <br>  <input readonly class="form-control" type="text" value="{{ $hrms->next_name }}"  name="next_name" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right spacing-left">
                                    CNIC <br>  <input readonly class="form-control" type="text" value="{{ $hrms->next_cnic }}"  name="next_cnic" placeholder="" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Father Name <br>  <input readonly class="form-control" type="text" value="{{ $hrms->next_fname }}"  name="next_fname" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Relationship <br>  <input readonly class="form-control" type="text" value="{{ $hrms->next_relation }}"  name="next_relation" placeholder="" style="width: 100%;">
                                    </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Death Certification <br>  <input readonly class="form-control" type="text" value="{{ $hrms->next_death }}"  name="next_death" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    FRC (Family Registration Certificate) <br> <input readonly class="form-control" value="{{ $hrms->next_frc }}"  name="next_frc" type="file" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-10 spacing-right">
                                    Affidavit from Legal Heirs of deceased Security Staff regarding Claim <br> <input readonly class="form-control" value="{{ $hrms->next_legal }}"  name="next_legal" type="file" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                    Photograph while giving the Claim <br> <input readonly class="form-control" name="next_photo" type="file" placeholder="" style="width: 100%;">
                                </div>
                                <div class="row">
                                     <div class="file-preview"
                                        style="cursor: pointer;"
                                         data-files="{{ json_encode(is_array(json_decode($hrms->next_photo, true)) ? json_decode($hrms->next_photo, true) : [$hrms->next_photo]) }}"
                                          data-extension="{{ is_array(json_decode($hrms->next_photo, true)) ? pathinfo(json_decode($hrms->next_photo, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->next_photo, PATHINFO_EXTENSION) }}"
                                           onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->next_photo, true)) ? getFilePreview(json_decode($hrms->next_photo, true)[0]) : getFilePreview($hrms->next_photo) !!}
                                     </div>
                                    <!--@if($hrms->attachments)-->
                                    <!--    @foreach($hrms->attachments as $attachment)-->
                                    <!--        <div class="col-lg-3">-->
                                    <!--            <div class="attachment">-->
                                    <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    @endforeach-->
                                    <!--@endif-->
                                </div>
                                <div class="col-lg-5 spacing-right">
                                    Acknowledgement of Receiving the Claim <br> <input readonly class="form-control" name="next_claim" type="file" placeholder="" style="width: 100%;">
                                </div>
                                <div class="row">
                                   <div class="file-preview"
                                        style="cursor: pointer;"
                                         data-files="{{ json_encode(is_array(json_decode($hrms->next_claim, true)) ? json_decode($hrms->next_claim, true) : [$hrms->next_claim]) }}"
                                          data-extension="{{ is_array(json_decode($hrms->next_claim, true)) ? pathinfo(json_decode($hrms->next_claim, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->next_claim, PATHINFO_EXTENSION) }}"
                                           onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->next_claim, true)) ? getFilePreview(json_decode($hrms->next_claim, true)[0]) : getFilePreview($hrms->next_claim) !!}
                                     </div>
                                    <!--@if($hrms->attachments)-->
                                    <!--    @foreach($hrms->attachments as $attachment)-->
                                    <!--        <div class="col-lg-3">-->
                                    <!--            <div class="attachment">-->
                                    <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    @endforeach-->
                                    <!--@endif-->
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3 spacing-right">
                                Amount of Claim <br>  <input readonly class="form-control" type="text" value="{{ $hrms->next_amount }}"  name="next_amount" placeholder="" style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-3 spacing-left spacing-right">
                                Check Number of Claim <br> <input readonly class="form-control" type="text" value="{{ $hrms->next_check }}"  name="next_check" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-2 spacing-left spacing-right">
                                Date of Check <br> <input readonly class="form-control" type="date" value="{{ $hrms->next_date }}"  name="next_date" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-2 spacing-left spacing-right">
                                Copy of the Check <br> <input readonly class="form-control" name="next_copy"  type="file" placeholder="" style="width: 100%;">
                                </div>
                                <div class="row">
                                      <div class="file-preview"
                                        style="cursor: pointer;"
                                         data-files="{{ json_encode(is_array(json_decode($hrms->next_copy, true)) ? json_decode($hrms->next_copy, true) : [$hrms->next_copy]) }}"
                                          data-extension="{{ is_array(json_decode($hrms->next_copy, true)) ? pathinfo(json_decode($hrms->next_copy, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->next_copy, PATHINFO_EXTENSION) }}"
                                           onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->next_copy, true)) ? getFilePreview(json_decode($hrms->next_copy, true)[0]) : getFilePreview($hrms->next_copy) !!}
                                     </div>
                                    <!--@if($hrms->attachments)-->
                                    <!--    @foreach($hrms->attachments as $attachment)-->
                                    <!--        <div class="col-lg-3">-->
                                    <!--            <div class="attachment">-->
                                    <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    @endforeach-->
                                    <!--@endif-->
                                </div>
                            </div>
                            <div class="row mb-2">
                            <div class="col-lg-3 spacing-right">
                                Name of bank <br>  <input readonly class="form-control" type="text" value="{{ $hrms->next_bank }}"  name="next_bank" placeholder="" style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-3 spacing-right">
                                Instrument Number <br>  <input readonly class="form-control" type="text" value="{{ $hrms->next_ins }}"  name="next_ins" placeholder="" style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-3 spacing-left spacing-right">
                                Instrument Attachment <br> <input readonly class="form-control" type="file" name="next_attach" placeholder="" style="width: 100%;">
                                </div>
                                <div class="row">
                                        <div class="file-preview"
                                        style="cursor: pointer;"
                                         data-files="{{ json_encode(is_array(json_decode($hrms->next_attach, true)) ? json_decode($hrms->next_attach, true) : [$hrms->next_attach]) }}"
                                          data-extension="{{ is_array(json_decode($hrms->next_attach, true)) ? pathinfo(json_decode($hrms->next_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->next_attach, PATHINFO_EXTENSION) }}"
                                           onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->next_attach, true)) ? getFilePreview(json_decode($hrms->next_attach, true)[0]) : getFilePreview($hrms->next_attach) !!}
                                     </div>
                                    <!--@if($hrms->attachments)-->
                                    <!--    @foreach($hrms->attachments as $attachment)-->
                                    <!--        <div class="col-lg-3">-->
                                    <!--            <div class="attachment">-->
                                    <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    @endforeach-->
                                    <!--@endif-->
                                </div>
                            </div>
                            <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Attachements <br>  <input readonly class="form-control" type="file" name="ex_next_attach" placeholder="" style="width: 100%;" multiple>
                                </div>
                                <div class="row">
                                         <div class="file-preview"
                                        style="cursor: pointer;"
                                         data-files="{{ json_encode(is_array(json_decode($hrms->ex_next_attach, true)) ? json_decode($hrms->ex_next_attach, true) : [$hrms->ex_next_attach]) }}"
                                          data-extension="{{ is_array(json_decode($hrms->ex_next_attach, true)) ? pathinfo(json_decode($hrms->ex_next_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->ex_next_attach, PATHINFO_EXTENSION) }}"
                                           onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->ex_next_attach, true)) ? getFilePreview(json_decode($hrms->ex_next_attach, true)[0]) : getFilePreview($hrms->ex_next_attach) !!}
                                     </div>
                                    <!--@if($hrms->attachments)-->
                                    <!--    @foreach($hrms->attachments as $attachment)-->
                                    <!--        <div class="col-lg-3">-->
                                    <!--            <div class="attachment">-->
                                    <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    @endforeach-->
                                    <!--@endif-->
                                </div>
                                <div class="col-lg-5 spacing-left">
                                Notes <br>   <textarea readonly id="w3review" class="form-control" name="ex_next_note" name="w3review" rows="4" cols="47">{{ $hrms->ex_next_note }}
                                </textarea readonly>
                                </div>
                            </div>
                        </div>
                            <!-- <div class="col-lg-2 mt-5">
                                <button type="button" class="add-more-btn" onclick="compliance_add_fields()">Add more</button>
                            </div>
                            <div id="compliance_add_fields">

                            </div> -->
                        </div>


                    </div>
                    <hr>
                    <!-- Inventory Bin Card
                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="inventory-bin-card" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-2">
                                    <div class="col-lg-11 spacing-right">
                                        Employee Name <br>  <input readonly class="form-control" name="emp_name" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Bin Card No.  <br>  <input readonly class="form-control" name="bin" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Employee No. <br>  <input readonly class="form-control" name="emp_no" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Title/Designation <br>  <input readonly class="form-control" name="emp_desig" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Stock Register No.  <br>  <input readonly class="form-control" name="stock" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Stock Register Page No. <br>  <input readonly class="form-control" name="stock_reg" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Others <br>  <input readonly class="form-control" type="file" name="stock_other" placeholder="" style="width: 100%;" multiple>
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Attachements <br>  <input readonly class="form-control" type="file" name="stock_attach" placeholder="" style="width: 100%;" multiple>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-10 spacing-left spacing-right">
                                    Notes <br> <textarea readonly id="w3review" class="form-control" name="stock_note" rows="4" cols="56">
                                    </textarea readonly>
                                </div>
                                </div>

                            </div>
                            <hr class="w-75 mx-auto"/>
                            <h3 class="text-center mb-3"><u>Inventory</u></h3>
                            <h5 class="text-center"><u>Bin Card Details</u></h5>
                            <div class="row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Employee No <br>  <input readonly class="form-control" type="text" placeholder="" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Employee Name <br>  <input readonly class="form-control" type="text" placeholder="" style="width: 100%;">
                                </div>

                                <div class="col-lg-4 spacing-right" style="margin-left:335px">
                                Stock Register <br>  <input readonly class="form-control" type="text" placeholder="" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Designation <br>  <input readonly class="form-control" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                Card No <br>  <input readonly class="form-control" type="text" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-4">
                                Stock Register page <br>  <input readonly class="form-control" type="text" placeholder="" style="width: 100%;">
                                </div>
                            </div>
                            <div class="section-body">
                            <div class="container-fluid">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="list" role="tabpanel">
                                        <div class="row" >
                                                <div class="row" id="section-container" style="display:flex; flex-direction:row;"></div>
                                                <div class="row">
                                                    <form>
                                                        <div class="form-group col-lg-4">
                                                            <label for="image">Image</label>
                                                            <input readonly type="file" class="form-control-file" id="image" accept="image/*">
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label for="name">Name</label>
                                                            <input readonly type="text" class="form-control" id="name">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <button style="width: 250px; margin-top:30px;" type="button" class="btn btn-primary" onclick="addSection()">Add More</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-lg-5" style="margin-top:80px; margin-left:37rem;">
                                                    Total Value of Inventory hold with Staff <br>  <input readonly class="form-control" type="" placeholder="" style="width: 60%;" multiple>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div> -->
                    <!--Security Guard License Last Tab-->
                    <div class="tab-pane m-3" style="opacity: 90%;" id="security" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                            <div class="col-lg-12 spacing-right">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        License No <br>  <input readonly class="form-control" type="text" name="s_license" value="{{ $hrms->s_license }}" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Isuing Authority <br>  <input readonly class="form-control" type="text" name="s_issuing" value="{{ $hrms->s_issuing }}"  placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Validity date. <br>  <input readonly class="form-control" type="date" name="s_v_date" value="{{ $hrms->s_v_date }}" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Date of issuance  <br>  <input readonly class="form-control" type="date" name="s_date" value="{{ $hrms->s_date }}" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Fee of License  <br>  <input readonly class="form-control" type="text" name="s_fee" value="{{ $hrms->s_fee }}" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-4 spacing-left spacing-right">
                                        Picture of License (front) <br>  <input readonly class="form-control" type="file" name="s_front" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="row">
                                     <div class="file-preview"
                                        style="cursor: pointer;"
                                         data-files="{{ json_encode(is_array(json_decode($hrms->s_front, true)) ? json_decode($hrms->s_front, true) : [$hrms->s_front]) }}"
                                          data-extension="{{ is_array(json_decode($hrms->s_front, true)) ? pathinfo(json_decode($hrms->s_front, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->s_front, PATHINFO_EXTENSION) }}"
                                           onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->s_front, true)) ? getFilePreview(json_decode($hrms->s_front, true)[0]) : getFilePreview($hrms->s_front) !!}
                                     </div>
                                        <!--@if($hrms->attachments)-->
                                        <!--    @foreach($hrms->attachments as $attachment)-->
                                        <!--        <div class="col-lg-3">-->
                                        <!--            <div class="attachment">-->
                                        <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    @endforeach-->
                                        <!--@endif-->
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Picture of License (back) <br>  <input readonly class="form-control" type="file" name="s_back" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="row">
                                           <div class="file-preview"
                                        style="cursor: pointer;"
                                         data-files="{{ json_encode(is_array(json_decode($hrms->s_back, true)) ? json_decode($hrms->s_back, true) : [$hrms->s_back]) }}"
                                          data-extension="{{ is_array(json_decode($hrms->s_back, true)) ? pathinfo(json_decode($hrms->s_back, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->s_back, PATHINFO_EXTENSION) }}"
                                           onclick="openFileModal(this, 0)">
                                        {!! is_array(json_decode($hrms->s_back, true)) ? getFilePreview(json_decode($hrms->s_back, true)[0]) : getFilePreview($hrms->s_back) !!}
                                     </div>
                                        <!--@if($hrms->attachments)-->
                                        <!--    @foreach($hrms->attachments as $attachment)-->
                                        <!--        <div class="col-lg-3">-->
                                        <!--            <div class="attachment">-->
                                        <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    @endforeach-->
                                        <!--@endif-->
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Notes. <br>  <textarea readonly class="form-control" type="text" name="s_notes" placeholder="" style="width: 100%;">{{ $hrms->s_notes }}</textarea readonly>
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Attachments  <br>  <input readonly class="form-control" type="file" name="s_attach" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="row">
                                            <div class="file-preview"
                                                style="cursor: pointer;"
                                                 data-files="{{ json_encode(is_array(json_decode($hrms->s_attach, true)) ? json_decode($hrms->s_attach, true) : [$hrms->s_attach]) }}"
                                                  data-extension="{{ is_array(json_decode($hrms->s_attach, true)) ? pathinfo(json_decode($hrms->s_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->s_attach, PATHINFO_EXTENSION) }}"
                                                   onclick="openFileModal(this, 0)">
                                                {!! is_array(json_decode($hrms->s_attach, true)) ? getFilePreview(json_decode($hrms->s_attach, true)[0]) : getFilePreview($hrms->s_attach) !!}
                                             </div>
                                        <!--@if($hrms->attachments)-->
                                        <!--    @foreach($hrms->attachments as $attachment)-->
                                        <!--        <div class="col-lg-3">-->
                                        <!--            <div class="attachment">-->
                                        <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    @endforeach-->
                                        <!--@endif-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- training
                    <div class="tab-pane m-3" style="opacity: 90%;" id="training-details" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">
                        <div class="col-lg-4 spacing-right mt-3">
                            Refresher training <div
                                class="form-check form-check-inline">
                                <input readonly class="form-check-input readonly ml-2 pt-1"
                                    type="checkbox" id="send-to-active"
                                    value="option1">

                            </div> <br>
                            <div id="send-active-options" style="display: none;">
                                    <div class=" mb-2 d-flex align-items-center">
                                    <div class="form-check form-check-inline spacing-left">
                                    <input readonly class="form-check-input readonly" type="checkbox" id="sends-to-all-yes" value="negative">
                                    <label class="form-check-label" for="inlineCheckbox1">On Site</label>
                                    </div>
                                    <div class="form-check form-check-inline spacing-left">
                                    <input readonly class="form-check-input readonly" type="checkbox" id="sends-to-all-no" value="positives">
                                    <label class="form-check-label" for="inlineCheckbox2">Online</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-right mt-3">
                            Live Firearm training <div
                                class="form-check form-check-inline">
                                <input readonly class="form-check-input readonly ml-2 pt-1"
                                    type="checkbox" id="send-to-active"
                                    value="option1">

                            </div>
                        </div>
                    </div>
                    <div class="input readonly-group mb-3 mt-4" style="width: 30%;">
                        <input readonly type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-outline-primary">search</button>
                    </div>
                    <div class="col-lg-12" style="margin-left:78px;">

                        <div class="" style="height: 36em;">
                            <div class="d">
                                <div class="container" style="display: flex; align-items: center; justify-content: center;">
                                    <div class="center-text" style="position: absolute;
                                    top: 48%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    text-align: center;">
                                    <h1 style="font-family: 'Times New Roman', Times, serif; font-weight: bolder; font-size: 2.5em;
                                    margin-right: 150px; margin-top: 30px;">Training<br>Modules</h1>
                                    </div>
                                    <div style="position: relative; width: 200px; height: 200px;">
                                        <div style="position: absolute;
                                            top: 12px;
                                            left: -16%;
                                            transform: rotate(-18deg);
                                            width: 60px;
                                            height: 60px;">
                                        <img src="training/first.png" alt="Your image">
                                        <input readonly type="checkbox" id="myCheckbox" class="checkbox-class" style="    position: absolute;
                                        top: 27%;
                                        left: 62%;
                                        /* transform: translate(-45%, -56%); */
                                        width: 25px;
                                        height: 24px;
                                        border: 1px solid black;
                                        border-radius: 4px;
                                        background-color: white;
                                        transform: rotate(19deg);">
                                        </div>
                                        <div style="position: absolute;     top: 19%;
                                            left: 27%;
                                            transform: rotate(-17deg); width: 60px; height: 60px;">
                                        <img src="training/second.png" alt="Your image">
                                        <input readonly type="checkbox" id="myCheckbox1" class="checkbox-class" style="    position: absolute;
                                        top: 58%;
                                        left: 103%;
                                        /* transform: translate(-50%, -50%); */
                                        width: 25px;
                                        height: 24px;
                                        border: 1px solid black;
                                        border-radius: 4px;
                                        background-color: white;
                                        transform: rotate(54deg);">
                                        </div>
                                        <div style="position: absolute;
                                            top: 65%;
                                            left: 61%;
                                            transform: rotate(-9deg); width: 60px; height: 60px;">
                                        <img src="training/third.png" alt="Your image">
                                        <input readonly type="checkbox" id="myCheckbox2" class="checkbox-class" style="    position: absolute;
                                        top: 47%;
                                        left: 64%;
                                        transform: translate(-50%, -50%);
                                        width: 25px;
                                        height: 24px;
                                        border: 1px solid black;
                                        border-radius: 4px;
                                        background-color: white;
                                        ">
                                        </div>
                                        <div style="position: absolute;
                                        top: 123%;
                                        left: 55%;
                                        transform: rotate(-17deg);
                                        width: 60px; height: 60px;">
                                            <img src="training/forth.png" alt="Your image">
                                            <input readonly type="checkbox" id="myCheckbox3" class="checkbox-class" style="position: absolute;
                                            top: 90%;
                                            left: 118%;
                                            /* transform: translate(-50%, -50%); */
                                            width: 25px;
                                            height: 24px;
                                            border: 1px solid black;
                                            border-radius: 4px;
                                            background-color: white;
                                            transform: rotate(38deg);">
                                        </div>
                                        <div style=" position: absolute;
                                            top: 164%;
                                            left: 30%;
                                            transform: rotate(-20deg);
                                            width: 60px;
                                            height: 60px;">
                                            <img src="training/fifth.png" alt="Your image">
                                            <input readonly type="checkbox" id="myCheckbox4" class="checkbox-class" style="position: absolute;
                                            top: 116%;
                                            left: 64%;
                                            /* transform: translate(-50%, -50%); */
                                            width: 25px;
                                            height: 24px;
                                            border: 1px solid black;
                                            border-radius: 4px;
                                            background-color: white;
                                            transform: rotate(71deg);
                                        ">
                                        </div>
                                        <div style=" position: absolute;
                                            top: 182%;
                                            left: -27%;
                                            transform: rotate(345deg);
                                            width: 60px;
                                            height: 60px;">
                                            <img src="training/sixth.png" alt="Your image">
                                            <input readonly type="checkbox" id="myCheckbox5"  class="checkbox-class" style="position: absolute;
                                            top: 109%;
                                            left: 59%;
                                            /* transform: translate(-50%, -50%); */
                                            width: 25px;
                                            height: 24px;
                                            border: 1px solid black;
                                            border-radius: 4px;
                                            background-color: white;
                                            transform: rotate(108deg);">
                                        </div>
                                        <div style=" position: absolute;
                                            top: 160%;
                                            left: -77%;
                                            transform: rotate(-10deg);
                                            width: 60px;
                                            height: 60px;">
                                            <img src="training/seventh.png" alt="Your image">
                                            <input readonly type="checkbox" id="myCheckbox6" class="checkbox-class" style="position: absolute;
                                            top: 94%;
                                            left: 40%;
                                            /* transform: translate(-50%, -50%); */
                                            width: 25px;
                                            height: 24px;
                                            border: 1px solid black;
                                            border-radius: 4px;
                                            background-color: white;
                                            transform: rotate(59deg);">
                                        </div>
                                        <div style=" position: absolute;
                                                top: 112%;
                                                left: -97%;
                                                transform: rotate(350deg);
                                            width: 60px;
                                            height: 60px;">
                                            <img src="training/eigth.png" alt="Your image">
                                            <input readonly type="checkbox" id="myCheckbox7" class="checkbox-class" style="    position: absolute;
                                            top: 28%;
                                            left: 82%;
                                            /* transform: translate(-50%, -50%); */
                                            width: 25px;
                                            height: 24px;
                                            border: 1px solid black;
                                            border-radius: 4px;
                                            background-color: white;
                                        ">
                                        </div>
                                        <div style=" position: absolute;
                                                top: 60%;
                                                left: -104%;
                                                transform: rotate(344deg);
                                                width: 60px;
                                                height: 60px;">
                                            <img src="training/ninth.png" alt="Your image">
                                            <input readonly type="checkbox" id="myCheckbox8" class="checkbox-class" style="    position: absolute;
                                            top: 77%;
                                            left: 44%;
                                            /* transform: translate(-50%, -50%); */
                                            width: 25px;
                                            height: 24px;
                                            border: 1px solid black;
                                            border-radius: 4px;
                                            background-color: white;
                                            transform: rotate(36deg);">
                                        </div>
                                        <div style=" position: absolute;
                                                top: 25%;
                                                left: -72%;
                                                transform: rotate(341deg);
                                                width: 60px;
                                                height: 60px;">
                                                <img src="training/tenth.png" alt="Your image">
                                                <input readonly type="checkbox" id="myCheckbox9" class="checkbox-class" style="    position: absolute;
                                                top: 29%;
                                                left: 67%;
                                                /* transform: translate(-50%, -50%); */
                                                width: 25px;
                                                height: 24px;
                                                border: 1px solid black;
                                                border-radius: 4px;
                                                background-color: white;
                                                transform: rotate(71deg); ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                            <div id="newSection"></div>
                            <div id="newSection1"></div>
                            <div id="newSection2"></div>
                            <div id="newSection3"></div>
                            <div id="newSection4"></div>
                            <div id="newSection5"></div>
                            <div id="newSection6"></div>
                            <div id="newSection7"></div>
                            <div id="newSection8"></div>
                            <div id="newSection9"></div>
                            <div class="my-3">
                            <div
                                class="container m-auto align-items-center d-flex justify-content-center">
                                <div class="col-10">
                                    <table class="table  table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sno</th>
                                                <th scope="col">Activity</th>
                                                <th scope="col">Timeline</th>
                                                <th scope="col">Responsible</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td><input readonly type="text" name='name[]'
                                                        placeholder='Enter Activity'
                                                        class="form-control" /></td>
                                                <td><input readonly type="text" name='name[]'
                                                        placeholder='Enter Timeline'
                                                        class="form-control" /></td>
                                                <td><input readonly type="text" name='name[]'
                                                        placeholder='Enter Responsible'
                                                        class="form-control" /></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">Larry the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- payroll
                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="payroll" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="col-lg-6 spacing-right">
                            <div class="row mb-2">
                                <div class="col-lg-4 spacing-right">
                                    Employee Number  <br>  <input readonly class="form-control" type="text" name="insp_date" placeholder="" style="width: 100%;">
                                </div>

                            </div>
                    </div>
                    </div> -->
                    <!--Inspection-->
                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="inspection" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class="col-lg-12 spacing-right">
                                    <div class="row mb-2">
                                        <h5>Inspection Performed By :</h5>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Employee No <br>  <input readonly class="form-control" type="text" value="{{ $hrms->insp_no }}" name="insp_no" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Name <br>  <input readonly class="form-control" type="text" value="{{ $hrms->insp_name }}" name="insp_name" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left">
                                            Cell No. <br>  <input readonly class="form-control" type="text" value="{{ $hrms->insp_cell }}" name="insp_cell" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left">
                                            Date of Inspection  <br>  <input readonly class="form-control" value="{{ $hrms->insp_date }}" type="date" name="insp_date" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 spacing-left">
                                        Picture of Inspection <br>  <input readonly class="form-control basic-info-attachements" id="inpFile43" type="file" name="insp_pic" placeholder="" style="width: 100%;" multiple>
                                        <div class="col-lg-5 spacing-right">
                                        <!-- Image Preview Biometric -->
                                        <div class="file-preview"
                                                style="cursor: pointer;"
                                                data-files="{{ json_encode(is_array(json_decode($hrms->h_verify, true)) ? json_decode($hrms->h_verify, true) : [$hrms->h_verify]) }}"
                                                data-extension="{{ is_array(json_decode($hrms->h_verify, true)) ? pathinfo(json_decode($hrms->h_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->h_verify, PATHINFO_EXTENSION) }}"
                                                onclick="openFileModal(this, 0)">
                                                {!! is_array(json_decode($hrms->h_verify, true)) ? getFilePreview(json_decode($hrms->h_verify, true)[0]) : getFilePreview($hrms->h_verify) !!}
                                            </div>
                                        {{-- <div class="image-preview42" id="imagePreview42">
                                            @if($hrms->h_verify)
                                            <img src="{{ asset($hrms->h_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                            @else
                                            <span class="image-preview__default-text42">Image Preview</span>
                                            @endif
                                        </div> --}}
                                        </div>
                                        </div>
                                        <div class="col-lg-4 spacing-right spacing-left">
                                        Remarks of Petroling Officer <br>  <textarea readonly class="form-control basic-info-attachements" value="{{ $hrms->rem_petr }}" type="text" name="rem_petr" placeholder="" style="width: 100%;" multiple></textarea readonly>
                                        </div>
                                        <div class="col-lg-4 spacing-left">
                                            Attachments <br>  <input readonly class="form-control basic-info-attachements" id="inpFile2" type="file" name="insp_attach" placeholder="" style="width: 100%;" multiple>
                                        </div>
                                        <div class="row">
                                              <div class="file-preview"
                                                style="cursor: pointer;"
                                                 data-files="{{ json_encode(is_array(json_decode($hrms->insp_attach, true)) ? json_decode($hrms->insp_attach, true) : [$hrms->insp_attach]) }}"
                                                  data-extension="{{ is_array(json_decode($hrms->insp_attach, true)) ? pathinfo(json_decode($hrms->insp_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->insp_attach, PATHINFO_EXTENSION) }}"
                                                   onclick="openFileModal(this, 0)">
                                                {!! is_array(json_decode($hrms->insp_attach, true)) ? getFilePreview(json_decode($hrms->insp_attach, true)[0]) : getFilePreview($hrms->insp_attach) !!}
                                             </div>
                                        <!--@if($hrms->attachments)-->
                                        <!--    @foreach($hrms->attachments as $attachment)-->
                                        <!--        <div class="col-lg-3">-->
                                        <!--            <div class="attachment">-->
                                        <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    @endforeach-->
                                        <!--@endif-->
                                        </div>
                                        <div class="col-lg-4 spacing-left">
                                            Notes <br>  <textarea readonly class="form-control basic-info-attachements" type="file"  name="insp_notes" placeholder="" style="width: 100%;" >{{ $hrms->insp_notes }}</textarea readonly>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--Observation-->
                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="observation" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class="col-lg-6 spacing-left">

                                <div class="row mb-2">
                                    <div class=" mb-2 d-flex align-items-center">

                                        <label for="Type Of Training:" class="form-check-label spacing-right" >Observation Month</label>
                                        <input readonly class="form-control" type="text" name="observ_mon" placeholder="" style="width: 70%;">
                                    </div>
                                    <div class="col-lg-11 spacing-right">
                                        Observation Type <br><input readonly id="observ_type" class="form-control" name="observ_type" value="{{ $hrms->observ_type }}"  placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-11 spacing-left spacing-right" style="margin-left:12px">
                                        Remarks by HR  <br>  <textarea readonly class="form-control" type="text" name="hr_remark"  placeholder="" style="width: 100%;">{{ $hrms->hr_remark }}</textarea readonly>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                        Attachment <br>  <input readonly class="form-control" type="file" name="ex_observ_attach" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="row">
                                           <div class="file-preview"
                                                style="cursor: pointer;"
                                                 data-files="{{ json_encode(is_array(json_decode($hrms->ex_observ_attach, true)) ? json_decode($hrms->ex_observ_attach, true) : [$hrms->ex_observ_attach]) }}"
                                                  data-extension="{{ is_array(json_decode($hrms->ex_observ_attach, true)) ? pathinfo(json_decode($hrms->ex_observ_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->ex_observ_attach, PATHINFO_EXTENSION) }}"
                                                   onclick="openFileModal(this, 0)">
                                                {!! is_array(json_decode($hrms->ex_observ_attach, true)) ? getFilePreview(json_decode($hrms->ex_observ_attach, true)[0]) : getFilePreview($hrms->ex_observ_attach) !!}
                                             </div>
                                        <!--@if($hrms->attachments)-->
                                        <!--    @foreach($hrms->attachments as $attachment)-->
                                        <!--        <div class="col-lg-3">-->
                                        <!--            <div class="attachment">-->
                                        <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    @endforeach-->
                                        <!--@endif-->
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <h5>Appraisal :</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                    Appraisal (PKR)<br>  <input readonly class="form-control" type="text" value="{{ $hrms->appraisal }}" name="appraisal" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                    Appraisal Screenshot Attachment<br>  <input readonly class="form-control" type="file" name="appraisal_attach" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="row">
                                         <div class="file-preview"
                                                style="cursor: pointer;"
                                                 data-files="{{ json_encode(is_array(json_decode($hrms->appraisal_attach, true)) ? json_decode($hrms->appraisal_attach, true) : [$hrms->appraisal_attach]) }}"
                                                  data-extension="{{ is_array(json_decode($hrms->appraisal_attach, true)) ? pathinfo(json_decode($hrms->appraisal_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->appraisal_attach, PATHINFO_EXTENSION) }}"
                                                   onclick="openFileModal(this, 0)">
                                                {!! is_array(json_decode($hrms->appraisal_attach, true)) ? getFilePreview(json_decode($hrms->appraisal_attach, true)[0]) : getFilePreview($hrms->appraisal_attach) !!}
                                             </div>
                                        <!--@if($hrms->attachments)-->
                                        <!--    @foreach($hrms->attachments as $attachment)-->
                                        <!--        <div class="col-lg-3">-->
                                        <!--            <div class="attachment">-->
                                        <!--                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    @endforeach-->
                                        <!--@endif-->
                                    </div>
                                    <div class="col-lg-6 spacing-right">
                                    Notes<br>  <textarea readonly class="form-control" type="file" name="appraisal_notes" placeholder="" style="width: 100%;">{{ $hrms->appraisal_notes }}</textarea readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <hr>
                 <div class="tab-pane fade m-3" style="opacity: 90%;" id="hrm-certificates" role="tabpanel" aria-labelledby="">
    <h4>HRM Certificates</h4>
    <div class="row" id="hrm-certificates-list">
        <!-- Data will be loaded here dynamically -->
    </div>
</div>


                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
            </form>
        </div>
    </section>
</div>

<!-- File Preview Modal -->
<!-- File Preview Modal -->
<div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">File Preview</h5>
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                <!--    <span aria-hidden="true">&times;</span>-->
                <!--</button>-->
            </div>
            <div class="modal-body" id="fileModalBody">
                <!-- File preview will be inserted here -->
            </div>
            <div class="modal-footer" id="downloadContainer">
                <!-- Download button will be inserted here -->
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<!-- HRM Certificates -->
<script>
    // Fetch hrm_email (you can replace this based on your actual logic)
    var hrm_email = "farhanqasim854@gmail.com";

    document.addEventListener('DOMContentLoaded', function() {
        axios.get('http://localhost:8001/api/hrm-activity', {
            params: { hrm_email: hrm_email }
        })
        .then(function (response) {
            if (response.status === 200) {
                const data = response.data;

                // User Data
                const user = data.user;
                console.log("User:", user);

                // Courses Data
                const courses = data.courses;
                const userQuizes = data.userQuizes;

                let htmlContent = '';

                if (courses.length > 0) {
                    courses.forEach(course => {
                        htmlContent += `
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="http://localhost:8001/${course.course_image}" class="card-img-top" alt="Course Image">
                                    <div class="card-body">
                                        <h5 class="card-title">${course.title}</h5>
                                        <p class="card-text">${course.description || 'No description available.'}</p>
                                        <a href="http://localhost:8001/${course.content}" class="btn btn-primary" target="_blank">View Course Content</a>
                                        <a href="http://localhost:8001/${course.certificate_image}" class="btn btn-secondary mt-2" target="_blank">Download Certificate</a>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                } else {
                    htmlContent += '<p>No courses available.</p>';
                }

                // Inserting dynamic content into the HTML row
                document.getElementById('hrm-certificates-list').innerHTML = htmlContent;

                // Displaying user quiz information if available
                if (userQuizes.length > 0) {
                    userQuizes.forEach(quiz => {
                        console.log("User Quiz:", quiz);
                        // You can display quiz results here, e.g., score, pass/fail, etc.
                    });
                }
            }
        })
        .catch(function (error) {
            console.log('Error fetching data from LMS API:', error);
        });
    });
</script>



<script>
function openFileModal(element, fileIndex = 0) {
    let fileData = element.getAttribute('data-files');

    if (!fileData) {
        console.error("No file data found.");
        return;
    }

    let modalBody = document.getElementById('fileModalBody');
    let downloadContainer = document.getElementById('downloadContainer');

    let previewHtml = '';
    let downloadHtml = '';

    try {
        let files = JSON.parse(fileData);

        if (!Array.isArray(files)) {
            files = [files]; // Ensure it's always an array
        }

        console.log("Parsed Files:", files);

        let file = files[fileIndex];
        if (!file) return;

        let fileUrl = file.startsWith('http') ? file : '/' + file.replace(/\\/g, '/'); // Normalize path
        let extension = file.split('.').pop().toLowerCase();

        // Handle different file types
        if (['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(extension)) {
            previewHtml = `<img src="${fileUrl}" width="100%" height="400px" alt="Image Preview" style="cursor:pointer;">`;
        } else if (extension === 'pdf') {
            previewHtml = `<iframe src="${fileUrl}" width="100%" height="500px"></iframe>`;
        } else if (['xlsx', 'xls'].includes(extension)) {
            previewHtml = `<img src="https://img.icons8.com/color/48/000000/ms-excel.png" alt="Excel File" style="height: 100px; cursor:pointer;">`;
        } else if (['zip', 'rar'].includes(extension)) {
            previewHtml = `<img src="https://img.icons8.com/color/48/000000/zip.png" alt="ZIP File" style="height: 100px; cursor:pointer;">`;
        } else {
            previewHtml = `<p>Preview not available for ${extension} files.</p>`;
        }

        // Download button
        downloadHtml = `<a href="${fileUrl}" download class="btn btn-primary mt-2">Download ${extension.toUpperCase()} File</a>`;

        // Inject into modal
        modalBody.innerHTML = previewHtml;
        downloadContainer.innerHTML = downloadHtml;

        // Show the modal
        $('#fileModal').modal('show');
    } catch (error) {
        console.error("JSON Parsing Error", error);
        modalBody.innerHTML = `<p>Error loading preview.</p>`;
    }
}
</script>

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
        button.textContent = 'System is Generating PDF';

        const element = document.getElementById('hrm_form');
        if (element) {
            const options = {
                margin: 1,
                filename: 'hrm_information.pdf',
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
            console.error('Element with ID "hrm_form" not found.');
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

        button.textContent = 'System is Sending Email ..';
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

        // Generate PDF and send it via email
        const element = document.getElementById('hrm_form');
        if (element) {
            const options = {
                margin: 1,
                filename: 'hrm_information.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
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
            console.error('Element with ID "hrm_form" not found.');
            button.textContent = 'Failed to Generate PDF';
        }
    } else {
        console.error('Modal or input fields not found.');
    }
}

</script>

<script>
    // Counter to track the number of education entries
    let educationCount = {{ count($hrms->education) }};

    // Function to add a new education entry as an accordion item
    function addEducationEntry() {
        educationCount++; // Increment the counter
        const newEntryHtml = `
            <div class="accordion-item" id="educationItem${educationCount}">
                <h2 class="accordion-header" id="educationHeading${educationCount}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#educationCollapse${educationCount}" aria-expanded="true" aria-controls="educationCollapse${educationCount}">
                        Education Details ${educationCount}
                    </button>
                </h2>
                <div id="educationCollapse${educationCount}" class="accordion-collapse collapse show" aria-labelledby="educationHeading${educationCount}" data-bs-parent="#educationAccordion">
                    <div class="accordion-body">
                        <div class="row">
                            <input readonly type="hidden" name="education[${educationCount - 1}][d_id]" value="">

                            <div class="col-lg-6">
                                <div class="row mb-2">
                                    <div class="form-type col-lg-3">
                                        Name of Degree  <br>  <input readonly class="form-control" type="text" value="" name="education[${educationCount - 1}][degree]" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="form-type col-lg-3">
                                        Date <br>  <input readonly class="form-control" type="date" name="education[${educationCount - 1}][degree_date]" value="" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="form-type col-lg-5 spacing-left">
                                        Scanned Certificate of Degree <br>  <input readonly class="form-control" type="file" name="education[${educationCount - 1}][degree_pic]" placeholder="" style="width: 100%;" multiple>
                                    </div>
                                    <div class="row">
                                        @if($hrms->attachments)
                                            @foreach($hrms->attachments as $attachment)
                                                <div class="col-lg-3">
                                                    <div class="attachment">
                                                        <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-6 form-type spacing-right">
                                        Institute Name <br>  <input readonly class="form-control" name="education[${educationCount - 1}][institute_name]" value="" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 form-type spacing-left">
                                    Awarding Body <br>  <input readonly class="form-control" name="education[${educationCount - 1}][a_body]" type="text" value="" placeholder="" style="width: 100%;">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-11 ">
                                        Notes <br>
                                        <textarea readonly id="w3review" class="form-control" style="width: 100%;" name="education[${educationCount - 1}][ex_notes]" rows="4" cols="40">
                                        </textarea readonly>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 spacing-left">
                                <div class="row mb-3">
                                    <div class="form-type col-lg-5 spacing-right">
                                        Degree No. <br>  <input readonly class="form-control" name="education[${educationCount - 1}][degree_no]" value="" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="form-type col-lg-5 spacing-left spacing-right">
                                    Degree Level <br>  <input readonly class="form-control" name="education[${educationCount - 1}][degree_level]" value="" type="text" placeholder="" style="width: 100%;">
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="form-type col-lg-5 spacing-right">
                                    Marks Obtained  <br>  <input readonly class="form-control" type="text" name="education[${educationCount - 1}][ob_marks]" value="" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="form-type col-lg-5 spacing-right">
                                        Total Marks  <br>  <input readonly class="form-control" type="text"  name="education[${educationCount - 1}][t_marks]" value="" placeholder="" style="width: 100%;">
                                    </div>

                                    <div class="form-type col-lg-5  spacing-right">
                                        Grade <br>  <input readonly class="form-control" type="text"  name="education[${educationCount - 1}][grade]" value="" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row">
                                <div class="form-type col-lg-5 spacing-right">
                                    Start Date <br>  <input readonly class="form-control" type="date" name="education[${educationCount - 1}][date_start]" value="" placeholder="" style="width: 100%;">
                                </div>
                                <div class="form-type col-lg-5 spacing-right">
                                    End Date <br>  <input readonly class="form-control" type="date" name="education[${educationCount - 1}][date_end]" value="" placeholder="" style="width: 100%;">
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-10 mt-3 form-type spacing-right">
                                    Address of Institution <br>  <input readonly class="form-control" name="education[${educationCount - 1}][adress_inst]" value="" type="text" placeholder="" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                Attachement <br>  <input readonly class="form-control" type="file" name="education[${educationCount - 1}][deg_attach]" placeholder="" style="width: 100%;" multiple>
                            </div>
                            <div class="row">
                                @if($hrms->attachments)
                                    @foreach($hrms->attachments as $attachment)
                                        <div class="col-lg-3">
                                            <div class="attachment">
                                                <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            </div>
                            </div>
                            {{-- <div class="col-lg-5 spacing-left my-5">
                                <button type="button" class="add-more-btn" onclick="education_add_fields()">Add More</button>
                            </div> --}}

                            <div id="education_add_fields">

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        `;
        // Append the new entry HTML to the accordion container
        $('#educationAccordion').append(newEntryHtml);
    }

    // Add event listener to the button for adding more education entries
    $('#addEducationEntry').on('click', function() {
        addEducationEntry();
    });
</script>


<script>
    // Counter to track the number of work experience entries
    let workCount = {{ count($hrms->workExperiences) }};

    // Function to add a new work experience entry as an accordion item
    function addWorkEntry() {
        workCount++; // Increment the counter
        const newEntryHtml = `
            <div class="accordion-item" id="workItem${workCount}">
                <h2 class="accordion-header" id="workHeading${workCount}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#workCollapse${workCount}" aria-expanded="true" aria-controls="workCollapse${workCount}">
                        Work Experience Details ${workCount}
                    </button>
                </h2>
                <div id="workCollapse${workCount}" class="accordion-collapse collapse show" aria-labelledby="workHeading${workCount}" data-bs-parent="#workAccordion">
                    <div class="accordion-body">
                        <div class="row">
                            <input readonly type="hidden" name="workExperiences[${workCount - 1}][w_id]" value="">

                            <div class="col-lg-5">
                                <div class="row mb-2">
                                    <div class="col-lg-11 spacing-right">
                                        Organization Name <br>  <input readonly class="form-control" name="workExperiences[${workCount - 1}][org_name]" value="" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-7 spacing-right">
                                        Email of the Company<br>  <input readonly class="form-control" name="workExperiences[${workCount - 1}][email_oc]" value="" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                    POC <br>  <input readonly class="form-control" type="text" name="workExperiences[${workCount - 1}][poc]" value="" placeholder="" style="width: 100%;">
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Job Experience Certificate <br>  <input readonly class="form-control" name="workExperiences[${workCount - 1}][jec]" type="file" placeholder="" style="width: 100%;" multiple>
                                </div>
                                <div class="row">
                                    @if($hrms->attachments)
                                        @foreach($hrms->attachments as $attachment)
                                            <div class="col-lg-3">
                                                <div class="attachment">
                                                    <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Attachements  <br>  <input readonly class="form-control" name="workExperiences[${workCount - 1}][jec_attach]" type="file" placeholder="" style="width: 100%;">
                                </div>
                                <div class="row">
                                        @if($hrms->attachments)
                                            @foreach($hrms->attachments as $attachment)
                                                <div class="col-lg-3">
                                                    <div class="attachment">
                                                        <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Designation <br>  <input readonly class="form-control" name="workExperiences[${workCount - 1}][w_desig]" value="" type="text" placeholder="" style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Salary  <br>  <input readonly class="form-control" name="workExperiences[${workCount - 1}][w_salary]" value="" type="text" placeholder="" style="width: 100%;">
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-4 spacing-left">
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                        Service Tenure <br>  <input readonly class="form-control" name="workExperiences[${workCount - 1}][ser_tenure]" value="" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-right spacing-left">
                                        Others <br>  <input readonly class="form-control" type="file" name="workExperiences[${workCount - 1}][ser_other]" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="row">
                                        @if($hrms->attachments)
                                            @foreach($hrms->attachments as $attachment)
                                                <div class="col-lg-3">
                                                    <div class="attachment">
                                                        <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-11 spacing-right">
                                        Inservice Awards /Achivements <br>  <input readonly class="form-control" name="workExperiences[${workCount - 1}][achivement]" value="" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Joining Date <br>  <input readonly class="form-control" type="date" name="workExperiences[${workCount - 1}][join_date]" value="" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right spacing-left">
                                    End Date <br>  <input readonly class="form-control" type="date" name="workExperiences[${workCount - 1}][end_date]" value="" placeholder="" style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-5 spacing-right" style="margin-top:10px;">
                                    Total Experience <br>  <input readonly class="form-control" type="text" name="workExperiences[${workCount - 1}][t_exp]" value="" placeholder="" style="width: 100%;" multiple>
                                </div>
                            </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        `;
        // Append the new entry HTML to the accordion container
        $('#workAccordion').append(newEntryHtml);
    }

    // Add event listener to the button for adding more work experience entries
    $('#addWorkEntry').on('click', function() {
        addWorkEntry();
    });
</script>


<script>
    // Counter to track the number of guarantor details entries
    let guarantorCount = {{ count($hrms->guarantors) }};

    // Function to add a new guarantor details entry
    function addGuarantorEntry() {
        guarantorCount++; // Increment the counter
        const newEntryHtml = `
            <div class="accordion-item" id="guarantorItem${guarantorCount}">
                <h2 class="accordion-header" id="guarantorHeading${guarantorCount}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#guarantorCollapse${guarantorCount}" aria-expanded="true" aria-controls="guarantorCollapse${guarantorCount}">
                        Guarantor No. ${guarantorCount}
                    </button>
                </h2>
                <div id="guarantorCollapse${guarantorCount}" class="accordion-collapse collapse show" aria-labelledby="guarantorHeading${guarantorCount}" data-bs-parent="#guarantorAccordion">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-lg-6" style="margin-top: 28px;">
                                <input readonly type="hidden" name="guarantors[${guarantorCount - 1}][g_id]" value="">
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Name  <br>  <input readonly class="form-control" name="guarantors[${guarantorCount - 1}][g_name]" value="" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 spacing-left spacing-right">
                                        Father Name <br>  <input readonly class="form-control" name="guarantors[${guarantorCount - 1}][g_fname]" value="" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                        Relationship<br>  <input readonly class="form-control" type="text" value="" name="guarantors[${guarantorCount - 1}][g_relation]" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Tenure of Relation<br>  <input readonly class="form-control" type="text" value="" name="guarantors[${guarantorCount - 1}][g_tenure_rel]"  placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                    CNIC (front)  <br>  <input readonly class="form-control" type="file" value="" name="guarantors[${guarantorCount - 1}][g_cnic_f]" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                    CNIC (back)  <br>  <input readonly class="form-control" type="file" value="" name="guarantors[${guarantorCount - 1}][g_cnic_b]" placeholder="" style="width: 100%;">
                                </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-11 spacing-right">
                                        Postal Verification of References <br>  <input readonly class="form-control" value="" name="guarantors[${guarantorCount - 1}][pos_verify]" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 spacing-left">
                                <h5>Address :</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Office No <br> <input readonly class="form-control" id="head_office_cell_no" name="guarantors[${guarantorCount - 1}][head_office_no]" value="" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Floor No <br> <input readonly class="form-control" id="head_office_cell_no" name="guarantors[${guarantorCount - 1}][head_floor_no]" value="" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Building <br> <input readonly class="form-control" id="head_office_cell_no" name="guarantors[${guarantorCount - 1}][head_building]" value="" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Block <br> <input readonly class="form-control" id="head_office_cell_no" name="guarantors[${guarantorCount - 1}][head_block]" value="" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Area <br> <input readonly class="form-control" id="head_office_cell_no" name="guarantors[${guarantorCount - 1}][head_area]" value="" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        City <br> <input readonly class="form-control" id="head_office_cell_no" name="guarantors[${guarantorCount - 1}][head_city]" value="" type="text" placeholder="" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-11 spacing-right">
                                        Attachements <br>  <input readonly class="form-control" type="file" name="guarantors[${guarantorCount - 1}][head_attach]"  placeholder="" style="width: 88%;" multiple>
                                    </div>
                                    <div class="row">
                                        @if($hrms->attachments)
                                            @foreach($hrms->attachments as $attachment)
                                                <div class="col-lg-3">
                                                    <div class="attachment">
                                                        <a href="{{ asset($attachment) }}" target="_blank">{{ basename($attachment) }}</a>
                                                    </div>
                                                </div>
                                            @endforeach
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
        $('#guarantorAccordion').append(newEntryHtml);
    }

    // Add event listener to the button for adding more guarantor details entries
    $('#addGuarantorEntry').on('click', function() {
        addGuarantorEntry();
    });
</script>


<script>

    // Education Add Fields
    var room1 = 1;
    function education_add_fields() {

    room1++;
    var objTo = document.getElementById('education_add_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "first-col removeclass"+room1);
    var rdiv = 'removeclass'+room1;
    divtest.innerHTML = '<div class="row"><div class="col-lg-6"><div class="row mb-2"><div class="form-type col-lg-3">Name of Degree <br> <input readonly class="form-control" type="text" name="degree[]" placeholder="" style="width: 100%;"></div><div class="form-type col-lg-3">Date <br> <input readonly class="form-control" type="date" name="degree_date[]" placeholder="" style="width: 100%;"></div><div class="form-type col-lg-5 spacing-left">Scanned Certificate of Degree <br> <input readonly class="form-control" type="file" name="degree_pic[]" placeholder="" style="width: 100%;" multiple></div><div class="col-lg-3 spacing-right" style="margin-left:248px;"><div class="image-preview28" id="imagePreview28"><img src="" alt="Image Preview28" class="image-preview__image28" style="height: 50%; width:50%;"><span class="image-preview__default-text28"> Image Preview </span></div></div></div><div class="row mb-2"><div class="col-lg-6 form-type spacing-right">Institute Name <br> <input readonly class="form-control" name="institute_name[]" type="text" placeholder="" style="width: 100%;"></div><div class="col-lg-5 form-type spacing-left">Awarding Body <br> <input readonly class="form-control" name="a_body[]" type="text" placeholder="" style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-12 spacing-left"></div></div><div class="row"><div class="col-lg-11">Notes <br> <textarea readonly class="form-control" style="width: 100%;" name="ex_notes[]" rows="4" cols="40"></textarea readonly></div></div></div><div class="col-lg-4 spacing-left"><div class="row mb-3"><div class="form-type col-lg-5 spacing-right">Degree No. <br> <input readonly class="form-control" name="degree_no[]" type="text" placeholder="" style="width: 100%;"></div><div class="form-type col-lg-5 spacing-left spacing-right">Degree Level <br> <input readonly class="form-control" name="degree_level[]" type="text" placeholder="" style="width: 100%;"></div></div><div class="row mb-2"><div class="form-type col-lg-5 spacing-right">Marks Obtained <br> <input readonly class="form-control" type="text" name="ob_marks[]" placeholder="" style="width: 100%;"></div><div class="form-type col-lg-5 spacing-right">Total Marks <br> <input readonly class="form-control" type="text" name="t_marks[]" placeholder="" style="width: 100%;"></div><div class="form-type col-lg-5 spacing-right">Grade <br> <input readonly class="form-control" type="text" name="grade[]" placeholder="" style="width: 100%;"></div></div><div class="row"><div class="form-type col-lg-5 spacing-right">Start Date <br> <input readonly class="form-control" type="date" name="date_start[]" placeholder="" style="width: 100%;"></div><div class="form-type col-lg-5 spacing-right">End Date <br> <input readonly class="form-control" type="date" name="date_end[]" placeholder="" style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-10 mt-3 form-type spacing-right">Address of Institution <br> <input readonly class="form-control" name="adress_inst[]" type="text" placeholder="" style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-5 spacing-right">Attachement <br> <input readonly class="form-control" type="file" name="deg_attach[]" placeholder="" style="width: 100%;" multiple></div></div><button type="button" class="remove-btn" onclick="education_remove_fields('+ room1 +')">Remove</button></div></div>';
    objTo.appendChild(divtest)
    }
    function education_remove_fields(rid) {
        $('.removeclass'+rid).remove();
    }

    //Work Experience Add Fields
    var room2 = 1;
    function work_add_fields() {

    room2++;
    var objTo = document.getElementById('work_add_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "second-col removeclass"+room2);
    var rdiv = 'removeclass'+room2;
    divtest.innerHTML = '<div class="row"><div class="col-lg-5"><div class="row mb-2"><div class="col-lg-11 spacing-right">Organization Name <br> <input readonly class="form-control" name="org_name[]" type="text" placeholder="" style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-7 spacing-right">Email of the Company<br> <input readonly class="form-control" name="email_oc[]" type="text" placeholder="" style="width: 100%;"></div><div class="col-lg-4 spacing-right">POC <br> <input readonly class="form-control" type="text" name="poc[]" placeholder="" style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right">Job Experience Certificate <br> <input readonly class="form-control" name="jec[]" type="file" placeholder="" style="width: 100%;" multiple></div><div class="col-lg-5 spacing-left spacing-right">Attachements <br> <input readonly class="form-control" name="jec_attach[]" type="file" placeholder="" style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right">Designation <br> <input readonly class="form-control" name="w_desig[]" type="text" placeholder="" style="width: 100%;" multiple></div><div class="col-lg-5 spacing-left spacing-right">Salary <br> <input readonly class="form-control" name="w_salary[]" type="text" placeholder="" style="width: 100%;"></div></div></div><div class="col-lg-4 spacing-left"><div class="row mb-2"><div class="col-lg-6 spacing-right">Service Tenure <br> <input readonly class="form-control" name="ser_tenure[]" type="text" placeholder="" style="width: 100%;"></div><div class="col-lg-5 spacing-right spacing-left">Others <br> <input readonly class="form-control" type="file" name="ser_other[]" placeholder="" style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-11 spacing-right">Inservice Awards /Achivements <br> <input readonly class="form-control" name="achivement[]" type="text" placeholder="" style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right">Joining Date <br> <input readonly class="form-control" type="date" name="join_date[]" placeholder="" style="width: 100%;"></div><div class="col-lg-5 spacing-right spacing-left">End Date <br> <input readonly class="form-control" type="date" name="end_date[]" placeholder="" style="width: 100%;" multiple></div><div class="col-lg-5 spacing-right" style="margin-top:10px;">Total Experience <br> <input readonly class="form-control" type="text" name="t_exp[]" placeholder="" style="width: 100%;" multiple></div></div><button type="button" class="remove-btn" onclick="work_remove_fields('+ room2 +')">Remove</button></div></div>';
    objTo.appendChild(divtest)
    }
    function work_remove_fields(rid) {
        $('.removeclass'+rid).remove();
    }


    ////training
    //Compliance Add Fields
    var room3 = 1;
    function compliance_add_fields() {

    room3++;
    var objTo = document.getElementById('compliance_add_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "Third-col removeclass"+room3);
    var rdiv = 'removeclass'+room2;
    divtest.innerHTML = '<div class="row"><div class="col-lg-10 mt-2"><div class="row mb-2"><div class="col-lg-5 spacing-right">CNIC <br>  <input readonly class="input readonly_field"  name="next_cnic[]" type="text" placeholder="" style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Name <br>  <input readonly class="input readonly_field" type="text" name="next_name[]" placeholder="" style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-5 spacing-right">Father Name <br>  <input readonly class="input readonly_field" name="next_fname[]" type="text" placeholder="" style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Relationship <br>  <input readonly class="input readonly_field" name="next_relation[]" type="text" placeholder="" style="width: 100%;"></div></div></div><div class="col-lg-2 mt-5"><button type="button" class="remove-btn" onclick="compliance_remove_fields('+ room3 +')">Remove</button></div></div>';
    objTo.appendChild(divtest)
    }
    function compliance_remove_fields(rid) {
        $('.removeclass'+rid).remove();
    }
    //end trainging

    guarantor = 1;
    //Guarantor Add Fields
    var room4 = 1;
    function guarantor_add_fields() {

    room4++;
    var objTo = document.getElementById('guarantor_add_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "Fourth-col removeclass"+room4);
    var rdiv = 'removeclass'+room4;

    guarantor +=1;
        divtest.innerHTML = `
        <div class="row">
            <h5>Guarantor No (${guarantor})</h5>
            <div class="col-lg-6">
                <div class="row mb-2">
                <div class="col-lg-5 spacing-right">
                    Name  <br>  <input readonly class="form-control" name="g_name[]" type="text" placeholder="" style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left spacing-right">
                    Father Name <br>  <input readonly class="form-control" name="g_fname[]" type="text" placeholder="" style="width: 100%;">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6 spacing-right">
                    Relationship<br>  <input readonly class="form-control" type="text" name="g_relation[]" placeholder="" style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-left spacing-right">
                    Tenure of Relation<br>  <input readonly class="form-control" type="text" name="g_tenure_rel[]"  placeholder="" style="width: 100%;">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6 spacing-right">
                CNIC (front)  <br>  <input readonly class="form-control" type="file" name="g_cnic_f[]" placeholder="" style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-left spacing-right">
                CNIC (back)  <br>  <input readonly class="form-control" type="file" name="g_cnic_b[]" placeholder="" style="width: 100%;">
            </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-11 spacing-right">
                    Postal Verification of References <br>  <input readonly class="form-control" name="pos_verify[]" type="text" placeholder="" style="width: 100%;">
                </div>
            </div>
            </div>
            <div class="col-lg-6 spacing-left">
                <h5>Address :</h5>
                <div class="row mb-2">
                    <div class="col-lg-5 spacing-right">
                        Office No <br> <input readonly class="form-control" id="head_office_cell_no" name="head_office_no[]" type="text" placeholder="" style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left">
                        Floor No <br> <input readonly class="form-control" id="head_office_cell_no" name="head_floor_no[]" type="text" placeholder="" style="width: 100%;">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-5 spacing-right">
                        Building <br> <input readonly class="form-control" id="head_office_cell_no" name="head_building[]" type="text" placeholder="" style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left">
                        Block <br> <input readonly class="form-control" id="head_office_cell_no" name="head_block[]" type="text" placeholder="" style="width: 100%;">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-5 spacing-right">
                        Area <br> <input readonly class="form-control" id="head_office_cell_no" name="head_area[]" type="text" placeholder="" style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left">
                        City <br> <input readonly class="form-control" id="head_office_cell_no" name="head_city[]" type="text" placeholder="" style="width: 100%;">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-11 spacing-right">
                        Attachements <br>  <input readonly class="form-control" type="file" name="head_attach" placeholder="" style="width: 88%;" multiple>
                        </div>
                </div>
            </div>
            <center>
                <button type="button" class="remove-btn" onclick="guarantor_remove_fields(${room4})">Remove</button>
            </center>
        </div>`;

    objTo.appendChild(divtest);
}
    function guarantor_remove_fields(rid) {
        $('.removeclass'+rid).remove();
        --guarantor;
    }

</script>

<script>
    const sameAsTempCheckbox = document.getElementById('sameAsTemp');
    const permanentAddressInputs = document.querySelectorAll('[name^="p_"]');
    sameAsTempCheckbox.addEventListener('change', function () {
        if (this.checked) {
            permanentAddressInputs.forEach(input readonly => {
                const temporaryInputName = input readonly.name.replace('p_', 't_');
                const temporaryInput = document.querySelector(`[name="${temporaryInputName}"]`);
                if (temporaryInput) {
                    if (input readonly.type === 'date') {
                        if (input readonly.name === 'p_residing') {
                            // Handle the p_residing date field
                            input readonly.value = temporaryInput.value;
                        }
                    } else {
                        input readonly.value = temporaryInput.value;
                    }
                }
            });
        } else {
            permanentAddressInputs.forEach(input readonly => {
                input readonly.value = '';
            });
        }
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // listen for changes to the checkbox
        $("#inlineCheckbox").change(function() {
            // if the checkbox is checked, hide the fields
            if (this.checked) {
                $("#eobi-fields").hide();
            } else { // if the checkbox is unchecked, show the fields
                $("#eobi-fields").show();
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // listen for changes to the checkbox
        $("#inCheckbox").change(function() {
            // if the checkbox is checked, hide the fields
            if (this.checked) {
                $("#eobi-field").hide();
            } else { // if the checkbox is unchecked, show the fields
                $("#eobi-field").show();
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // listen for changes to the checkbox
        $("#lineCheckbox").change(function() {
            // if the checkbox is checked, hide the fields
            if (this.checked) {
                $("#eobi-f").hide();
            } else { // if the checkbox is unchecked, show the fields
                $("#eobi-f").show();
            }
        });
    });
</script>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
