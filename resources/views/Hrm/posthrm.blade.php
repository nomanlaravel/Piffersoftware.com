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

    <section style="margin-bottom:50px;">
        <div class="row">
            <form action="{{ route('submit_hrm')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="row mb-2" style="margin-left: 20px;">
                        <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
                          <h5>Employee Activation Status</h5>

                          <div class="form-check form-check-inline" style="margin-right: 90px;">
                            <input class="form-check-input mr-2" type="radio" name="activation" value="1" id="activeRadio">
                            <label class="form-check-label" for="activeRadio">Active</label>

                            <input class="form-check-input ml-3 mr-2" type="radio" name="activation" value="0" id="inactiveRadio">
                            <label class="form-check-label" for="inactiveRadio">Inactive</label>
                          </div>
                        </div>
                    </div>

                </div>
                <div class="tab-content" id="">
                    <div class="row" style="font-weight:600;">
                         <div class="modal-header border-0">
                <div style="display:flex; column-gap:10px; align-items:center">
                    <button type="button" class="btn btn-link" onclick="history.back()">
                     <i class="bi bi-arrow-left"></i>
                    </button>
                    <h5 class="mt-3" style="font-weight: 700;">   Security Staff: </h5>
                </div>
              </div>
                        <!--<h5> Security Staff </h5>-->
                        <div class="col-lg-6 spacing-right">
                            <div class="row mb-2 mt-1">
                                <div class="col-lg-11">
                                    Name <br>  <input class="form-control" name="name" type="text" placeholder="..." style="width: 100%;" autocomplete="off">
                                </div>
                            </div>
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-right">
                                    Father's Name <br>  <input class="form-control" name="fname" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-left">
                                    CNIC <br>  <input class="form-control" type="text" name="cnic" placeholder="XXXXX-XXXXXXX-X" style="width: 100%;" autocomplete="off">
                                </div>
                            </div>
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-right">
                                Employee No <br>  <input class="form-control" type="text" name="employee_no" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-left input-group">
                                    Cell Phone (official) <br>  <input class="form-control" name="cell" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-right">
                                    Bank Name <br>  <input class="form-control" type="text" name="bank" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-left input-group">
                                    Bank Account <br>  <input class="form-control" name="bank_account" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <!--<div class="row mb-2 mt-3">-->
                            <!--    <div class="col-lg-5 spacing-right">-->
                            <!--        Client ID <br>-->
                            <!--        <input class="form-control" name="client_id" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--<select id="category" class="form-control mt-1" name="client_id" >-->
                                    <!--    <option value=""></option>-->
                                    <!--    @foreach ($customers as $customer)-->
                                    <!--        <option value="{{ $customer->customers_id }}">{{ $customer->customers_id }}</option>-->
                                    <!--    @endforeach-->
                                    <!--</select>-->
                            <!--    </div>-->
                            <!--    <div class="col-lg-6 spacing-left">-->
                            <!--        Client Name <br>-->

                            <!--        <select id="customer_name" class="form-control mt-1" name="client_name">-->
                            <!--            <option value=""></option>-->
                            <!--            @foreach ($customers as $customer)-->
                            <!--                <option value="{{ $customer->customers_name }}">{{ $customer->customers_name }}</option>-->
                            <!--            @endforeach-->
                            <!--        </select>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-right">
                                    Client ID <br>
                                    <input type="text" id="client_id" class="form-control mt-1" name="client_id" readonly>
                                </div>
                                <div class="col-lg-6 spacing-left">
                                    Client Name <br>
                                    <select id="customer_name" class="form-control mt-1" name="client_name">
                                        <option value="">Select a client</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->customers_name }}" data-id="{{ $customer->customers_id }}">
                                                {{ $customer->customers_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 spacing-left">
                            <div class="row mb-2">
                              <div class="col-lg-5 pt-1 spacing-right">
                                Photograph <br>
                                <input class="form-control" name="photo" id="inpFile42" type="file" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'preview42')">

                                <!-- Image Preview Section -->
                                <div class="image-preview" id="preview42" style="position: relative; margin-top: 10px;">
                                    <img src="" alt="Image Preview" class="image-preview__image" style="display: none; width: 100%; height: auto;">
                                    <span class="image-preview__default-text"> <!-- Image Preview --> </span>
                                </div>
                            </div>

                               <div class="col-lg-5 spacing-left spacing-right form-group">
                                    Category <br>
                                    <div class="input-group" style="width: 100%;">
                                        <select id="category" class="form-control mt-1" name="category" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                            <option value=""></option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->hrmcategory_name }}">{{ $category->hrmcategory_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append" style="width: 30%;">
                                            <a href="{{ url('hrmcategory') }}">
                                                <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-2 pt-1 spacing-right">
                                    Rank <br>  <input class="form-control" type="text" name="rank" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Designation <br>
                                    <div class="input-group" style="width: 100%;">
                                        <select id="dropdown" class="form-control mt-1" name="designation" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                            <option value=""></option>
                                            @foreach ($designations as $designation)
                                                <option value="{{ $designation->designation_name }}">{{ $designation->designation_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append" style="width: 30%;">
                                            <a href="{{ url('designation') }}">
                                                <button class="btn btn-primary" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 pt-1 spacing-left spacing-right">
                                    Unit <br>  <input class="form-control" name="unit" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-10 spacing-right form-group">
                                    Hired At <br>
                                    <div class="input-group" style="width: 100%;">
                                        <select id="hired_at" class="form-control mt-1" name="hired_at" style="width: 70%; border-radius: 4px 0 0 4px;">
                                            <option value=""></option>
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->branch_office_name }}">{{ $branch->branch_office_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append" style="width: 30%;">
                                            <a href="{{ url('admin') }}">
                                                <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-5 spacing-right">
                                    Region <br>  <input class="form-control" type="text" name="hrm_region" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-left">
                                    Location <br>  <input class="form-control" name="hrm_location" type="text" placeholder="..." style="width: 88%;">
                                </div>
                            </div>
                            <div class="row" style="margin-left: 3px; margin-top: 10px;">
                                    <div class="col-lg-11 spacing-right">
                                        <div class="form-group form-check">
                                            <!--<input type="checkbox" class="form-check-input input" id="exampleCheck1">-->
                                            <label class="form-check-label" for="exampleCheck1">Sub-Guards</label>
                                           <!-- Add Select2 CSS -->
                                            <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
                                            
                                            <select class="form-control select2" id="sub_guard_id" name="sub_guard_id" style="width: 100%;" >
                                                <option value="">Select a Guard</option>
                                                @foreach ($guards as $guard)
                                                    <option value="{{ $guard->id }}">{{ $guard->id }} - {{ $guard->name }}</option>
                                                @endforeach
                                            </select>
                                            
                                            <!-- Add jQuery and Select2 JS -->
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                            <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
                                            
                                            <script>
                                                $(document).ready(function() {
                                                    $('.select2').select2({
                                                        placeholder: "Select a Guard",
                                                        allowClear: true
                                                    });
                                                });
                                            </script>

                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>


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

                <nav>
                    <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#basic-info" role="tab" aria-controls="nav-home" aria-selected="true">Basic Info</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#address-details" role="tab" aria-controls="nav-profile" aria-selected="false">Address Details</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#verifications" role="tab" aria-controls="nav-contact" aria-selected="false">Verifications</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#education" role="tab" aria-controls="nav-profile" aria-selected="false">Education , Health & Work Experience</a>
                    <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#compliances" role="tab" aria-controls="nav-home" aria-selected="true">Compliances</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#inventory-bin-card" role="tab" aria-controls="nav-profile" aria-selected="false">Inventory Record Card</a>
                    <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#security" role="tab" aria-controls="nav-home" aria-selected="true">Security Guard License</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#training-details" role="tab" aria-controls="nav-contact" aria-selected="false">Training Details</a>
                    <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#payroll" role="tab" aria-controls="nav-home" aria-selected="true">Payroll</a>
                    <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#inspection" role="tab" aria-controls="nav-home" aria-selected="true">Site Inspection</a>
                    <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#observation" role="tab" aria-controls="nav-home" aria-selected="true">Observation and Appraisal</a>
                      <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#psychologistreport" role="tab" aria-controls="nav-home" aria-selected="true">Psychologist Report</a>
                    </div>
                </nav>
                <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
                    <!--Basic Info-->
                    <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="basic-info" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class="col-lg-6 spacing-right">
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Date of Birth  <br>  <input class="form-control" type="date" name="dob" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Religion <br>  <input class="form-control" type="text" name="religion" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left">
                                            Caste <br>  <input class="form-control" type="text" name="caste" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-3 spacing-right">
                                            Gender  <br>
                                            <select id="dropdown" class="form-control" name="gender" style="width: 100%;">
                                                <option value=""></option>
                                                <option value="male"> Male </option>
                                                <option value="female"> Female </option>
                                                <option value="undefined"> Undefined </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                        Cell No (personal)  <br>  <input class="form-control" name="p_cell" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                        <div class="col-lg-4 spacing-left ">
                                            Emergency Contact No <br>  <input class="form-control" type="text" name="e_cell" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-5 ">
                                            Blood Group  <br>  <input class="form-control" type="text" name="blood" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6">
                                            Email <br>  <input class="form-control" type="text" name="email" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-lg-4 spacing-right">
                                        CNIC Picture (front) <br>
                                        <input class="form-control" id="inpFile1" type="file" name="cnic_front" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'preview1')">
                                        <div class="image-preview" id="preview1" style="position: relative;">
                                            <img src="" alt="Image Preview" class="image-preview__image" style="display: none; width: 100%; height: auto;">
                                            <span class="image-preview__default-text"> <!--Image Preview--> </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 spacing-right spacing-left">
                                        CNIC Picture (back) <br>
                                        <input class="form-control basic-info-attachements" id="inpFile12" type="file" name="cnic_back" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'preview2')">
                                        <div class="image-preview" id="preview2" style="position: relative;">
                                            <img src="" alt="Image Preview" class="image-preview__image" style="display: none; width: 100%; height: auto;">
                                            <span class="image-preview__default-text"> <!--Image Preview--> </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 spacing-left">
                                        Attachments <br>
                                        <input class="form-control basic-info-attachements" id="inpFile000" type="file" name="f_attach" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'preview000')">
                                        <div class="image-preview" id="preview000" style="position: relative;">
                                            <img src="" alt="Image Preview000" class="image-preview__image000" style="display: none; width: 100%; height: auto;">
                                            <span class="image-preview__default-text000"> <!--Image Preview--> </span>
                                        </div>
                                    </div>
                                </div>

                                                            <!--    <div class="row mb-2">-->
                                                            <!--    <div class="col-lg-3 spacing-right">-->
                                                                    <!--Image Preview Biometric-->
                                                            <!--        <div class="image-preview1" id="imagePreview1">-->
                                                            <!--        <img src="" alt="Image Preview1" class="image-preview__image1" style="height: 50%; width:50%;">-->
                                                            <!--        <span class="image-preview__default-text1"> Image Preview </span>-->
                                                            <!--        </div>-->
                                                            <!--    </div>-->
                                                            <!--    <div class="col-lg-3 spacing-left" style="margin-left: 45px;">-->
                                                                    <!--Image Preview Biometric-->
                                                            <!--        <div class="image-preview12" id="imagePreview12">-->
                                                            <!--        <img src="" alt="Image Preview12" class="image-preview__image12" style="height: 50%; width:50%;">-->
                                                            <!--        <span class="image-preview__default-text12"> Image Preview12 </span>-->
                                                            <!--        </div>-->
                                                            <!--    </div>-->
                                                            <!--</div>-->

                            </div>
                            <div class="col-lg-6 spacing-left">
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Marital Status  <br>  <input class="form-control" type="text" name="m_status" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-2 spacing-left spacing-right">
                                        No. of kids <br>  <input class="form-control" type="text" name="no_of_kids" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-2 spacing-left spacing-right">
                                        Male Kids <br>  <input class="form-control" type="text" name="m_kids" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left">
                                        Female Kids <br>  <input class="form-control" type="text" name="f_kids" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        CNIC Issue date <br>  <input class="form-control" name="cnic_issue" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        CNIC Expiry Date <br>  <input class="form-control" type="date" name="cnic_expire" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Notes <br>
                                        <textarea id="w3review" class="form-control" name="notes" rows="4" cols="53">

                                        </textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--address-details-->
                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="address-details" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                            <div class="col-lg-6 spacing-right">
                                <h5>Temporary Address</h5>
                                    <div class="row mb-2">
                                    <div class="col-lg-8 spacing-right">
                                        Address  <br>  <input class="form-control" name="t_address" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left">
                                        Area  <br>  <input class="form-control" type="text" name="t_area" placeholder="..." style="width: 100%;">
                                    </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                            City  <br>  <input class="form-control" type="text" name="t_city" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left spacing-right">
                                            Police Station <br>  <input class="form-control" name="t_police" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left">
                                            District <br>  <input class="form-control" name="t_district" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Post Office  <br>  <input class="form-control" name="t_post" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Tehsil <br>  <input class="form-control" type="text" name="t_tehsil" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left">
                                            Province <br>  <input class="form-control" type="text" name="t_province" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                        Postal Code  <br>  <input class="form-control" name="t_postal" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Residing Since  <br>  <input class="form-control" name="t_residing" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 spacing-left">
                                        GPS Location <br>  <input class="form-control" name="t_gps" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Attachments <br>
                                            <input class="form-control" name="t_attach" id="inpFileAttach123" type="file" placeholder="..." style="width: 100%;" multiple onchange="previewImage(event, 'previewAttach123')">

                                            <!-- Image Preview Section -->
                                            <div class="image-preview" id="previewAttach123" style="position: relative; margin-top: 10px;">
                                                <img src="" alt="Image Preview" class="image-preview__image123" style="display: none; width: 100%; height: auto;">
                                                <span class="image-preview__default-text123"> <!-- Image Preview --> </span>
                                            </div>
                                        </div>

                                        <div class="col-lg-5 spacing-left spacing-right">
                                        Notes <br>   <textarea id="w3review" class="form-control"  name="t_note" rows="4" cols="37">
                                        </textarea>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-lg-6 spacing-left">
                                <h5>Permanent Address</h5>
                                    <input class="check-box mx-1" type="checkbox" id="sameAsTemp" placeholder="..."> Same as Temporary Address
                                    <div class="row mb-2">

                                        <div class="col-lg-12 spacing-left">

                                    <div class="row mb-2">
                                    <div class="col-lg-8 spacing-right">
                                        Address  <br>  <input class="form-control" type="text" name="p_address" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left">
                                        Area  <br>  <input class="form-control" type="text" name="p_area" placeholder="..." style="width: 100%;">
                                    </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                            City  <br>  <input class="form-control" name="p_city" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left spacing-right">
                                            Police Station <br>  <input class="form-control" name="p_police" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left">
                                            District <br>  <input class="form-control" name="p_district" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Post Office  <br>  <input class="form-control" name="p_post" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Tehsil <br>  <input class="form-control" name="p_tehsil" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left">
                                            Province <br>  <input class="form-control" name="p_province" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                        Postal Code  <br>  <input class="form-control" name="p_postal" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Residing Since  <br>  <input class="form-control" name="p_residing" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 spacing-left">
                                        GPS Location <br>  <input class="form-control" name="p_gps" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    </div>

                                    <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Attachements <br>  <input class="form-control" type="file" name="p_attach" placeholder="..." style="width: 100%;" multiple onchange="previewImage(event, 'p_attach')">
                                        <div class="row">
                                             <div class="col-lg-6 spacing-right">
                                            <div class="image-p_attach" id="p_attach">
                                                <img src="" alt="Image p_attach" class="image-preview__p_attach" style="height: 50%; width:50%; display: none;">
                                                <span class="image-preview__default-textp_attach">
                                                <!--Image Preview-->
                                                </span>
                                            </div>
                                </div>
                                        </div>
                                        </div>

                                        <div class="col-lg-5 spacing-left spacing-right">
                                        Notes <br>   <textarea id="w3review" class="form-control" name="p_note" name="w3review" rows="4" cols="37">
                                        </textarea>
                                        </div>
                                    </div>
                                    <!--<h5>Next of Kin</h5>-->
                                    <!--<div class="row mt-2">-->
                                    <!--    <div class="row mb-2">-->
                                    <!--        <div class="col-lg-5 spacing-right">-->
                                    <!--            Name <br>  <input class="form-control" name="nok_name" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--        </div>-->
                                    <!--        <div class="col-lg-5 spacing-right ">-->
                                    <!--            CNIC <br>  <input class="form-control" name="nok_cnic" type="text" placeholder="..." style="width: 100%;">-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                <!--<div class="row mb-2">-->
                                <!--    <div class="col-lg-5 spacing-right">-->
                                <!--        Father Name <br>  <input class="form-control" name="nok_fname" type="text" placeholder="..." style="width: 100%;">-->
                                <!--        </div>-->
                                <!--        <div class="col-lg-5 spacing-left spacing-right">-->
                                <!--            Relationship <br>  <input class="form-control" name="nok_relation" type="text" placeholder="..." style="width: 100%;">-->
                                <!--        </div>-->
                                <!--</div>-->
                                <!--<div class="row mb-2">-->
                                <!--    <div class="col-lg-5 spacing-right">-->
                                <!--            Death Certification <br>  <input class="form-control" name="nok_death" type="text" placeholder="..." style="width: 100%;">-->
                                <!--        </div>-->
                                <!--        <div class="col-lg-5 spacing-left spacing-right">-->
                                <!--            FRC (Family Registration Certificate) <br> <input class="form-control" name="nok_frc" type="text" placeholder="..." style="width: 100%;">-->
                                <!--        </div>-->
                                <!--</div>-->


                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!--verifications-->
                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="verifications" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                        <h4>Types of Verification</h4>
                            <div class="col-lg-6">
                           <div class="row mb-2">
                                <div class="col-lg-11">
                                    Hiring Form  <br>
                                    <input class="form-control" id="inpFile13" name="h_verify" type="file" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview13')">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    <!-- Image Preview Section -->
                                    <div class="image-preview13" id="imagePreview13" style="position: relative; margin-top: 10px;">
                                        <img src="" alt="Image Preview" class="image-preview__image13" style="display: none; width: 100%; height: auto;">
                                        <span class="image-preview__default-text13"> Image Preview </span>
                                    </div>
                                </div>
                            </div>

                           <div class="row mb-2">
                            <div class="col-lg-11">
                                Biometric Verification  <br>
                                <input class="form-control" id="inpFile14" name="b_verify" type="file" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview14')">
                            </div>
                            <div class="col-lg-3 spacing-right">
                                <!-- Image Preview Section -->
                                <div class="image-preview14" id="imagePreview14" style="position: relative; margin-top: 10px;">
                                    <img src="" alt="Image Preview" class="image-preview__image14" style="display: none; width: 100%; height: auto;">
                                    <span class="image-preview__default-text14"> Image Preview </span>
                                </div>
                            </div>
                        </div>

                              <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 17px;">
                                    Postal Verification  <br>
                                    <input class="form-control" id="inpFile15" name="p_verify" type="file" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview15')">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    <!-- Image Preview Section -->
                                    <div class="image-preview15" id="imagePreview15" style="position: relative; margin-top: 10px;">
                                        <img src="" alt="Image Preview" class="image-preview__image15" style="display: none; width: 100%; height: auto;">
                                        <span class="image-preview__default-text15"> Image Preview </span>
                                    </div>
                                </div>
                            </div>

                               <div class="row mb-2">
                                <div class="col-lg-11">
                                    Discharge Book/Experience Certificate  <br>
                                    <input class="form-control" id="inpFile16" name="d_book" type="file" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview16')">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    <!-- Image Preview Section -->
                                    <div class="image-preview16" id="imagePreview16" style="position: relative; margin-top: 10px;">
                                        <img src="" alt="Image Preview16" class="image-preview__image16" style="display: none; width: 100%; height: auto;">
                                        <span class="image-preview__default-text16"> Image Preview </span>
                                    </div>
                                </div>
                            </div>

                               <div class="row mb-2">
                                    <div class="col-lg-11" style="margin-top: 10px;">
                                        Vote Verification  <br>
                                        <input class="form-control" type="file" id="inpFile17" name="v_verify" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview17')">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        <!-- Image Preview Section -->
                                        <div class="image-preview17" id="imagePreview17" style="position: relative; margin-top: 10px;">
                                            <img src="" alt="Image Preview17" class="image-preview__image17" style="display: none; width: 100%; height: auto;">
                                            <span class="image-preview__default-text17"> Image Preview </span>
                                        </div>
                                    </div>
                                </div>
                            <!-- Copy of last Utility Bill -->
                            <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    Copy of last Utility Bill  <br>
                                    <input class="form-control" id="inpFile18" name="copy_bill" type="file" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview18')">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    <div class="image-preview18" id="imagePreview18">
                                        <img src="" alt="Image Preview18" class="image-preview__image18" style="height: 50%; width:50%; display: none;">
                                        <span class="image-preview__default-text18"> Image Preview </span>
                                    </div>
                                </div>
                            </div>

                            <!-- NADRA Verification -->
                            <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    NADRA Verification  <br>
                                    <input class="form-control" id="inpFile19" type="file" name="n_verify" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview19')">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    <div class="image-preview19" id="imagePreview19">
                                        <img src="" alt="Image Preview19" class="image-preview__image19" style="height: 50%; width:50%; display: none;">
                                        <span class="image-preview__default-text19"> Image Preview </span>
                                    </div>
                                </div>
                            </div>

                            <!-- EVS Verification -->
                            <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    EVS Verification  <br>
                                    <input class="form-control" type="file" id="inpFile20" name="insurrance" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview20')">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    <div class="image-preview20" id="imagePreview20">
                                        <img src="" alt="Image Preview20" class="image-preview__image20" style="height: 50%; width:50%; display: none;">
                                        <span class="image-preview__default-text20"> Image Preview </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Guard Bank Account -->
                            <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    Guard Bank Account  <br>
                                    <input class="form-control" id="inpFile21" type="file" name="guard_bank" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview21')">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    <div class="image-preview21" id="imagePreview21">
                                        <img src="" alt="Image Preview21" class="image-preview__image21" style="height: 50%; width:50%; display: none;">
                                        <span class="image-preview__default-text21"> Image Preview </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Bio Metric Record -->
                            <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    Bio Metric Record  <br>
                                    <input class="form-control" id="inpFile22" type="file" name="bio_verify" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview22')">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    <div class="image-preview22" id="imagePreview22">
                                        <img src="" alt="Image Preview22" class="image-preview__image22" style="height: 50%; width:50%; display: none;">
                                        <span class="image-preview__default-text22"> Image Preview </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Covid 19 Vaccination -->
                            <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    Covid 19 Vaccination  <br>
                                    <input class="form-control" id="inpFile23" type="file" name="c_verify" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview23')">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    <div class="image-preview23" id="imagePreview23">
                                        <img src="" alt="Image Preview23" class="image-preview__image23" style="height: 50%; width:50%; display: none;">
                                        <span class="image-preview__default-text23"> Image Preview </span>
                                    </div>
                                </div>
                            </div>

                            <!-- DPO Verification -->
                            <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    DPO Verification  <br>
                                    <input class="form-control" id="inpFile24" name="dpo_verify" type="file" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview24')">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    <div class="image-preview24" id="imagePreview24">
                                        <img src="" alt="Image Preview24" class="image-preview__image24" style="height: 50%; width:50%; display: none;">
                                        <span class="image-preview__default-text24"> Image Preview </span>
                                    </div>
                                </div>
                            </div>
                                <div class="row mb-2">
                                <div class="col-lg-11">
                                    DPO Form Sent <br>
                                    <select id="dropdown" type="text"  class="form-control mt-1" name="form_send" style="width: 100%;">
                                        <option value=""></option>
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                    </select>
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-11">
                                    DPO Form Sent on <br> <input class="form-control" name="sent_on" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                </div>
                               <!-- DPO Form Sent -->
                            <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    DPO Form Sent  <br>
                                    <input class="form-control" id="inpFile25" name="form_attach" type="file" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview25')">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    <div class="image-preview25" id="imagePreview25">
                                        <img src="" alt="Image Preview25" class="image-preview__image25" style="height: 50%; width:50%; display: none;">
                                        <span class="image-preview__default-text25"> Image Preview </span>
                                    </div>
                                </div>
                            </div>

                                <div class="row mb-2">
                                <div class="col-lg-11">
                                DPO Form Received  <br>
                                    <select id="dropdown" type="text"  class="form-control mt-1" name="form_rec" style="width: 100%;">
                                        <option value=""></option>
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                    </select>
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-11">
                                    DPO Form Received on <br> <input class="form-control" name="rec_on" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                DPO Form Received  <br>  <input class="form-control" id="inpFile26" name="rec_attach" type="file" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview26')">
                                </div>
                                  <div class="col-lg-3 spacing-right">
                                    <div class="image-preview26" id="imagePreview26">
                                        <img src="" alt="Image Preview26" class="image-preview__image26" style="height: 50%; width:50%; display: none;">
                                        <span class="image-preview__default-text26"> Image Preview </span>
                                    </div>
                                </div>
                                </div>

                                <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    8300 Verification  <br>  <input class="form-control" id="inpFile27" type="file" name="eight_verify" placeholder="..." style="width: 100%;"  onchange="previewImage(event, 'imagePreview27')">
                                </div>
                                <div class="col-lg-3 spacing-right">
                                    <!--Image Preview Biometric-->
                                    <div class="image-preview27" id="imagePreview27">
                                    <img src="" alt="Image Preview27" class="image-preview__image27"  style="height: 50%; width:50%; display: none;">
                                    <span class="image-preview__default-text27"> Image Preview </span>
                                    </div>
                                </div>
                                </div>

                                <div class="row mb-2">
                                <div class="col-lg-11" style="margin-top: 10px;">
                                    E Sahulat Verification  <br>  <input class="form-control" id="inpFile28" type="file" name="sahulat_v" placeholder="..." style="width: 100%;"  onchange="previewImage(event, 'imagePreview28')">
                                </div>
                                 <div class="col-lg-3 spacing-right">
                                    <div class="image-preview28" id="imagePreview28">
                                        <img src="" alt="Image Preview28" class="image-preview__image28" style="height: 50%; width:50%; display: none;">
                                        <span class="image-preview__default-text28"> Image Preview </span>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input class="form-control" name="look_back1" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input class="form-control" name="frequency1" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea class="form-control" name="notes1" type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input class="form-control" name="look_back2" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input class="form-control" name="frequency2" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea class="form-control" name="notes2" type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input class="form-control" name="look_back3" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input class="form-control" name="frequency3" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea class="form-control" name="notes3" type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input class="form-control" name="look_back4" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input class="form-control" name="frequency4" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea class="form-control" name="notes4" type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input class="form-control" name="look_back5" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input class="form-control" name="frequency5" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea class="form-control" name="notes5" type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input class="form-control" name="look_back6" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input class="form-control" name="frequency6" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea class="form-control" name="notes6" type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input class="form-control" name="look_back7" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input class="form-control" name="frequency7" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea class="form-control" name="notes7" type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input class="form-control" name="look_back8" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input class="form-control" name="frequency8" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea class="form-control" name="notes8" type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input class="form-control" name="look_back9" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input class="form-control" name="frequency9" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea class="form-control" name="notes9" type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input class="form-control" name="look_back10" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input class="form-control" name="frequency10" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea class="form-control" name="notes10" type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input class="form-control" name="look_back11" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input class="form-control" name="frequency11" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea class="form-control" name="notes11" type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input class="form-control" name="look_back12" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input class="form-control" name="frequency12" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea class="form-control" name="notes12" type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input class="form-control" name="look_back13" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input class="form-control" name="frequency13" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea class="form-control" name="notes13" type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2" style="margin-top:10px;">
                                <div class="col-lg-6 spacing-right">
                                    Look Back Period  <br>  <input class="form-control" name="look_back14" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Frequency  <br>  <input class="form-control" name="frequency14" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-12 spacing-right">
                                    Notes  <br>  <textarea class="form-control" name="notes14" type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="container my-1">
                            <div class="accordion" id="guarantorAccordion">
                                <!-- Initial Guarantor Accordion -->
                                <div class="accordion-item" id="guarantorEntry1">
                                    <h2 class="accordion-header" id="guarantorHeading1">
                                        <button class="accordion-button" type="button" data-toggle="collapse" data-target="#guarantorCollapse1" aria-expanded="true" aria-controls="guarantorCollapse1">
                                            Guarantor 1
                                        </button>
                                    </h2>
                                    <div id="guarantorCollapse1" class="accordion-collapse collapse show" aria-labelledby="guarantorHeading1" >
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-lg-6" style="margin-top: 28px;">
                                                    <div class="row mb-2">
                                                        <input type="hidden" name="g_id[]" value="">
                                                        <div class="col-lg-5 spacing-right">
                                                            Name  <br>  <input class="form-control" name="g_name[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right">
                                                            Father Name <br>  <input class="form-control" name="g_fname[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-right">
                                                            Relationship<br>  <input class="form-control" type="text" name="g_relation[]" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-5 spacing-left spacing-right">
                                                            Tenure of Relation<br>  <input class="form-control" type="text" name="g_tenure_rel[]"  placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-right">
                                                        CNIC (front)  <br>  <input class="form-control" type="file" name="g_cnic_f[]" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview29')">
                                                             <div class="row mb-2">
                                                            <div class="col-lg-18 spacing-right">
                                                            <div class="image-preview29" id="imagePreview29">
                                                                <img src="" alt="Image Preview29" class="image-preview__image29" style="height: 50%; width:50%; display: none;">
                                                                <!--<span class="image-preview__default-text29"> Image Preview </span>-->
                                                            </div>
                                                               </div>
                                                            </div>
                                                                 </div>
                                                             <div class="col-lg-5 spacing-left spacing-right">
                                                                                CNIC (back)  <br>  <input class="form-control" type="file" name="g_cnic_b[]" placeholder="..." style="width: 100%;" onchange="previewImage(event, 'imagePreview30')">
                        
                                                            <div class="row mb-2">
                                                              <div class="col-lg-8 spacing-right">
                                                                <div class="image-preview30" id="imagePreview30">
                                                                    <img src="" alt="Image Preview30" class="image-preview__image30" style="height: 50%; width:50%; display: none;">
                                                                    <!--<span class="image-preview__default-text30"> Image Preview </span>-->
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-11 spacing-right">
                                                            Postal Verification of References <br>  <input class="form-control" name="pos_verify[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 spacing-left">
                                                    <h5>Address :</h5>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5 spacing-right">
                                                            Office No <br> <input class="form-control" id="head_office_cell_no" name="head_office_no[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-5 spacing-left">
                                                            Floor No <br> <input class="form-control" id="head_office_cell_no" name="head_floor_no[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5 spacing-right">
                                                            Building <br> <input class="form-control" id="head_office_cell_no" name="head_building[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-5 spacing-left">
                                                            Block <br> <input class="form-control" id="head_office_cell_no" name="head_block[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5 spacing-right">
                                                            Area <br> <input class="form-control" id="head_office_cell_no" name="head_area[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-5 spacing-left">
                                                            City <br> <input class="form-control" id="head_office_cell_no" name="head_city[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-11 spacing-right">
                                                            Attachements <br>  <input class="form-control" type="file" name="head_attach" placeholder="..." style="width: 88%;" multiple   onchange="previewImage(event, 'imagePreview31')">
                                                              <div class="row mb-2">
                                                              <div class="col-lg-8 spacing-right">
                                                                <div class="image-preview31" id="imagePreview31">
                                                                    <img src="" alt="Image Preview31" class="image-preview__image31" style="height: 50%; width:50%; display: none;">
                                                                    <!--<span class="image-preview__default-text30"> Image Preview </span>-->
                                                                </div>
                                                              </div>
                                                            </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add More and Save Buttons -->
                            <div class="row my-3">
                                <div class="col">
                                    <button type="button" class="btn btn-primary" id="addGuarantorAccordion">Add More Guarantor</button>
                                </div>
                                <button type="button" class="btn btn-primary" id="saveGuarantorEntries">Save</button>
                            </div>

                            <!-- Guarantor Summary Table -->
                            <table class="table table-bordered mt-1" id="guarantorSummaryTable">
                                <thead>
                                    <tr>
                                        <th>Entry</th>
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>Relationship</th>
                                        <th>Tenure of Relation</th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Summary data will be added here dynamically -->
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <h5>
                                Finger Print Samples
                            </h5>
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Little Finger  <br>  <input class="form-control" id="inpFile6" type="file" name="l_finger" placeholder="..." style="width: 100%;" multiple onchange="previewImage(event, 'imagePreview32')">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Fore Finger <br>  <input class="form-control" type="file" id="inpFile7" name="f_finger" placeholder="..." style="width: 100%;" multiple onchange="previewImage(event, 'imagePreview33')">
                                    </div>
                                    <div class="col-lg-3 spacing-left">
                                        Middle Finger <br>  <input class="form-control" type="file" id="inpFile8" name="m_finger" placeholder="..." style="width: 100%;" multiple onchange="previewImage(event, 'imagePreview34')">
                                    </div>
                                </div>

                                <!--Pictures-->
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        <!--Image Preview Biometric-->
                                        <div class="image-imagePreview32" id="imagePreview32">
                                        <img src="" alt="Image Preview32" class="image-preview__image32" style="height: 30%; width:30%; display:none">
                                        <!--<span class="image-preview__default-text6"> Image Preview </span>-->
                                        </div>
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        <!--Image Preview Biometric-->
                                        <div class="image-imagePreview33" id="imagePreview33">
                                           <img src="" alt="Image Preview33" class="image-preview__image33" style="height: 50%; width:50%; display: none;">
                                            <!--<span class="image-preview__default-text30"> Image Preview </span>-->
                                        </div>
                                    </div>
                                    <div class="col-lg-3 spacing-left">
                                        <!--Image Preview Biometric-->
                                        <div class="image-imagePreview34" id="imagePreview34">
                                        <img src="" alt="Image Preview34" class="image-preview__image34" style="height: 50%; width:50%; display: none;">
                                        <!--<span class="image-preview__default-text8"> Image Preview </span>-->
                                        </div>
                                        </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Index Finger  <br>  <input class="form-control" id="inpFile35" type="file" name="i_finger" placeholder="..." style="width: 100%;" multiple onchange="previewImage(event, 'imagePreview35')">
                                    </div>
                                    <div class="col-lg-3 spacing-left ">
                                        Thumb Finger <br>  <input class="form-control" type="file" id="inpFile36" name="t_finger" placeholder="..." style="width: 100%;" multiple onchange="previewImage(event, 'imagePreview36')">
                                    </div>
                                    <div class="col-lg-3 spacing-left " >
                                        Additionals <br>  <input class="form-control" type="file" id="inpFile37" name="additionals" placeholder="..." style="width: 100%;" multiple onchange="previewImage(event, 'imagePreview37')">
                                    </div>
                                </div>



                                <!--Pictures-->
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                    <!--Image Preview Biometric-->
                                    <div class="image-imagePreview35" id="imagePreview35">
                                        <img src="" alt="Image imagePreview35" class="image-preview__imagePreview35 " style="height: 30%; width:30%; display:none">
                                        <!--<span class="image-preview__default-text9"> Image Preview </span>-->
                                    </div>
                                    </div>
                                    <div class="col-lg-3 spacing-left ">
                                    <!--Image Preview Biometric-->
                                    <div class="image-imagePreview36" id="imagePreview36">
                                        <img src="" alt="Image imagePreview36" class="image-preview__imagePreview36" style="height: 30%; width:30%; display:none">
                                        <!--<span class="image-preview__default-imagePreview36"> Image Preview </span>-->
                                    </div>
                                    </div>
                                    <div class="col-lg-3 spacing-left ">
                                        <!--Image Preview Biometric-->
                                        <div class="image-imagePreview37" id="imagePreview37">
                                        <img src="" alt="Image imagePreview37" class="image-preview__imagePreview37" style="height: 30%; width:30%; display:none">
                                        <!--<span class="image-preview__default-text11"> Image Preview </span>-->
                                    </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-2">
                            <div class="col-lg-3 spacing-right">
                                Attachements <br>  <input class="form-control" type="file" name="f_attachment" placeholder="..." style="width: 100%;" multiple onchange="previewImage(event, 'imagePreview38')">
                                    <div class="row mb-2">
                                      <div class="col-lg-8 spacing-right">
                                        <div class="image-imagePreview38" id="imagePreview38">
                                            <img src="" alt="Image imagePreview38" class="image-preview__imagePreview38" style="height: 50%; width:50%; display: none;">
                                            <!--<span class="image-preview__default-text30"> Image Preview </span>-->
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="col-lg-5 spacing-left spacing-right">
                                Notes <br>   <textarea id="w3review" class="form-control" name="finger_note" rows="4" cols="35">
                                </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--education-->
                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="education" role="tabpanel" aria-labelledby="nav-profile-tab">

                        <div class="container my-1">
                            <h5 style="text-align:center;"><u><b>Education</b></u></h5>
                            <div id="educationAccordion">
                                <!-- Initial Education Accordion -->
                                <div class="accordion" id="educationAccordion">
                                    <div class="accordion-item" id="educationEntry1">
                                        <h2 class="accordion-header" id="educationHeading1">
                                            <button class="accordion-button" type="button" data-toggle="collapse" data-target="#educationCollapse1" aria-expanded="true" aria-controls="educationCollapse1">
                                                Education Entry 1
                                            </button>
                                        </h2>
                                        <div id="educationCollapse1" class="collapse show" aria-labelledby="educationHeading1">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <input type="hidden" name="d_id[]" value="">
                                                    <div class="col-lg-6">
                                                        <div class="row mb-2">

                                                            <div class="form-type col-lg-3">
                                                                Name of Degree  <br>  <input class="form-control" type="text" name="degree[]" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="form-type col-lg-3">
                                                                Date <br>  <input class="form-control" type="date" name="degree_date[]" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="form-type col-lg-5 spacing-left">
                                                                Scanned Certificate of Degree <br>  <input class="form-control" type="file"  name="degree_pic[]" placeholder="..." style="width: 100%;" multiple>
                                                            </div>


                                                        </div>

                                                        <div class="row mb-2">
                                                            <div class="col-lg-6 form-type spacing-right">
                                                                Institute Name <br>  <input class="form-control" name="institute_name[]" type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-5 form-type spacing-left">
                                                            Awarding Body <br>  <input class="form-control" name="a_body[]" type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-11 ">
                                                                Notes <br>
                                                                <textarea id="w3review" class="form-control" style="width: 100%;" name="ex_notes[]" rows="4" cols="40">
                                                                </textarea>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        <div class="row mb-3">
                                                            <div class="form-type col-lg-5 spacing-right">
                                                                Degree No. <br>  <input class="form-control" name="degree_no[]" type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="form-type col-lg-5 spacing-left spacing-right">
                                                            Degree Level <br>  <input class="form-control" name="degree_level[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                        <div class="form-type col-lg-5 spacing-right">
                                                            Marks Obtained  <br>  <input class="form-control" type="text" name="ob_marks[]" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="form-type col-lg-5 spacing-right">
                                                                Total Marks  <br>  <input class="form-control" type="text"  name="t_marks[]" placeholder="..." style="width: 100%;">
                                                            </div>

                                                            <div class="form-type col-lg-5  spacing-right">
                                                                Grade <br>  <input class="form-control" type="text"  name="grade[]" placeholder="..." style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="form-type col-lg-5 spacing-right">
                                                            Start Date <br>  <input class="form-control" type="date"  name="date_start[]" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="form-type col-lg-5 spacing-right">
                                                            End Date <br>  <input class="form-control" type="date" name="date_end[]" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                        <div class="col-lg-10 mt-3 form-type spacing-right">
                                                            Address of Institution <br>  <input class="form-control" name="adress_inst[]" type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5 spacing-right">
                                                        Attachement <br>  <input class="form-control" type="file" name="deg_attach[]" placeholder="..." style="width: 100%;" multiple>
                                                    </div>

                                                    </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add More Button -->
                            <div class="row my-3">
                                <div class="col">
                                    <button type="button" class="btn btn-primary" id="addEducationAccordion">Add More Education</button>
                                    <button type="button" class="btn btn-primary" id="saveEducationEntries">Save</button>
                                </div>
                            </div>

                            <!-- Education Summary Table -->
                            <table class="table table-bordered mt-1" id="educationSummaryTable">
                                <thead>
                                    <tr>
                                        <th>Entry</th>
                                        <th>Degree</th>
                                        <th>Date</th>
                                        <th>Institute</th>
                                        <th>Action</th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Summary data will be added here dynamically -->
                                </tbody>
                            </table>
                        </div>

                        <h5 style="text-align:center;"><u><b>Health</b></u></h5>
                        <div class="row">
                            <div class="col-lg-6 spacing-right">
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                        Age  <br>  <input class="form-control" id="inpFile5" name="h_age" type="text" placeholder="..." style="width: 100%;" multiple>
                                        </div>
                                        <div class="col-lg-5 spacing-left">
                                        Weight  <br>  <input class="form-control" type="text" name="weight" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Height  <br> <input class="form-control" type="text" name="height" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left spacing-right">
                                        Complection <br>  <input class="form-control" type="text" name="complection" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left">
                                            Disease <br>
                                            <select id="medical_category" class="form-control" name="ay_other_d" style="width: 100%;">
                                                <option value=""></option>
                                                @foreach ($diseases as $disease)
                                                    <option value="$hrm_disease">{{ $disease->hrm_disease }}</option>
                                                @endforeach
                                            </select>
                                            <a href="{{ route('disease')}}"><button class="btn btn-primary" id="submit-category" type="button" style="width: 52%; height:38px; margin-top: 4px; border-radius: 0 4px 4px 0;">Add</button></a>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            Medical Category  <br>  <select id="medical_category" class="form-control" name="medical_category" style="width: 100%;">
                                                <option value="sugar">Sugar</option>
                                                <option value="BP">BP</option>
                                                <option value="polio">Polio</option>
                                                <option value="allergy">Any Allergy</option>
                                                <option value="heart_disease">Heart Disease</option>
                                                <option value="broken_bone">Broken Bone</option>
                                                <option value="any_other">Any Other</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Card of Verification <br>  <input class="form-control" id="inpFile44" name="vaccine_card" type="file" placeholder="..." style="width: 100%;" multiple>
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                            <!--Image Preview Biometric-->
                                            <div class="image-preview44" id="imagePreview44">
                                            <img src="" alt="Image Preview44" class="image-preview__image44" style="height: 50%; width:50%;">
                                            <span class="image-preview__default-text44"> Image Preview </span>
                                            </div>
                                        </div>

                                    </div>
                                    <h6 class="mt-4">For Phsychometric Test: <a href="phsychometric.html">Click Here</a></h6>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                        Medical Fitness Certificate <br>  <input class="form-control" name="medical_fit_card" type="file" placeholder="..." style="width: 100%;" multiple>
                                        </div>
                                        <div class="col-lg-6 spacing-left">
                                        Attachments <br>  <input class="form-control" type="file" name="medical_fit_attach" placeholder="..." style="width: 100%;" multiple>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                                        Notes <br>   <textarea id="w3review" class="form-control" name="medical_fit_note" rows="4" cols="40">
                                        </textarea>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-lg-6 spacing-left">
                                <h5>Details Of Physician</h5>
                                <div class="row mb-2">

                                        <div class="col-lg-12 spacing-left">

                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                    Name <br>  <input class="form-control" type="text" name="phy_name" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                    Number  <br>  <input class="form-control" type="text" name="phy_cell" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <h5>Address</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Office No  <br>  <input class="form-control" name="phy_office" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Building <br>  <input class="form-control" name="phy_building" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-right">
                                        Block  <br>  <input class="form-control" name="phy_block" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Area <br>  <input class="form-control" name="phy_area" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-right">
                                        City  <br>  <input class="form-control" name="phy_city" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Location <br>  <input class="form-control" name="phy_loc" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                        Notes  <br>  <textarea class="form-control" name="phy_note" type="text" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-6 spacing-right">
                                        Attachment  <br>  <input class="form-control" name="phy_attach" type="file" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                </div>
                                <h5>Vaccination</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Vaccination Type  <br>  <input class="form-control" name="vac_type" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Vaccination Proof Type <br>  <input class="form-control" name="vac_pr" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>

                            </div>

                                    </div>
                            </div>
                        </div>
                        <h5 style="text-align:center;"><u><b>Work Experience</b></u></h5>
                        <div class="container my-1">
                            <div class="accordion" id="workAccordion">
                                <!-- Initial Accordion Item -->
                                <div class="accordion-item workaccordion-item" id="workEntry1">
                                    <h2 class="accordion-header" id="workHeading1">
                                        <button class="accordion-button" type="button" data-toggle="collapse" data-target="#workCollapse1" aria-expanded="false" aria-controls="workCollapse1">
                                            Work Experience Entry 1
                                        </button>
                                    </h2>
                                    <div id="workCollapse1" class="collapse" aria-labelledby="workHeading1">
                                        <div class="row accordion-body">
                                            <input type="hidden" name="w_id[]" value="">
                                            <div class="col-lg-5">
                                                <div class="row mb-2">
                                                    <div class="col-lg-11 spacing-right">
                                                        Organization Name <br>  <input class="form-control" name="org_name[]" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-7 spacing-right">
                                                        Email of the Company<br>  <input class="form-control" name="email_oc[]" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                    POC <br>  <input class="form-control" type="text" name="poc[]" placeholder="..." style="width: 100%;">
                                                </div>
                                                </div>
                                                <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right">
                                                    Job Experience Certificate <br>  <input class="form-control" name="jec[]" type="file" placeholder="..." style="width: 100%;" multiple>
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Attachements  <br>  <input class="form-control" name="jec_attach[]" type="file" placeholder="..." style="width: 100%;">
                                                </div>
                                                </div>
                                                <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right">
                                                    Designation <br>  <input class="form-control" name="w_desig[]" type="text" placeholder="..." style="width: 100%;" multiple>
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Salary  <br>  <input class="form-control" name="w_salary[]" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 spacing-left">
                                                <div class="row mb-2">
                                                    <div class="col-lg-6 spacing-right">
                                                        Service Tenure <br>  <input class="form-control" name="ser_tenure[]" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-right spacing-left">
                                                        Others <br>  <input class="form-control" type="file" name="ser_other[]" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-11 spacing-right">
                                                        Inservice Awards /Achivements <br>  <input class="form-control" name="achivement[]" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right">
                                                    Joining Date <br>  <input class="form-control" type="date" name="join_date[]" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-right spacing-left">
                                                    End Date <br>  <input class="form-control" type="date" name="end_date[]" placeholder="..." style="width: 100%;" multiple>
                                                </div>
                                                <div class="col-lg-5 spacing-right" style="margin-top:10px;">
                                                    Total Experience <br>  <input class="form-control" type="text" name="t_exp[]" placeholder="" style="width: 100%;" multiple>
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
                                    <button type="button" class="btn btn-primary" id="addWorkAccordion">Add More Work Experience</button>
                                </div>
                                <button type="button" class="btn btn-primary" id="updateWorkTable">Save</button>
                            </div>
                        </div>

                        <table class="table table-bordered mt-1" id="workSummaryTable">
                            <thead>
                                <tr>
                                    <th>Entry</th>
                                    <th>Organization</th>
                                    <th>Designation</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Summary data will be added here dynamically -->
                            </tbody>
                        </table>



                        <div class="row mt-4">
                        {{-- <center> <h4>Health Status</h4> </center> --}}


                        <div class="col-lg-8">
                            <div class="row mb-2">

                            </div>


                        </div>
                    </div>
                    </div>
                    <div class="tab-pane m-3" style="opacity: 90%;" id="payroll" role="tabpanel" aria-labelledby="nav-contact-tab">
                 <div class="container my-1">
                        <div class="accordion" id="payrollAccordion">
                            <!-- Initial Guarantor Accordion -->
                            <div class="accordion-item" id="payrollEntry1">
                                <h2 class="accordion-header" id="payrollHeading1">
                                    <button class="accordion-button" type="button" data-toggle="collapse" data-target="#payrollCollapse1" aria-expanded="true" aria-controls="payrollCollapse1">
                                     <span id="payrollDate1"></span>   
                                    </button>
                                </h2>
                                <div id="payrollCollapse1" class="accordion-collapse collapse show" aria-labelledby="payrollHeading1" >
                                    <div class="accordion-body">
                                        <script>
                                    // Function to format and insert current date
                                    function setPayrollDate() {
                                        const currentDate = new Date();
                                        const options = { day: 'numeric', month: 'short', year: 'numeric' }; // Example: "13 Mar, 2025"
                                        const formattedDate = currentDate.toLocaleDateString('en-US', options);
                                
                                        // Insert the date in both header and body
                                        document.getElementById("payrollDate1").textContent = formattedDate;
                                    }
                                
                                    // Run function when the page loads
                                    document.addEventListener("DOMContentLoaded", setPayrollDate);
                                </script>
                                      <div class="row">
                                        <!--<div class="col-md-4 mb-3">-->
                                        <!--        <label class="form-label">Select Employee</label>-->
                                        <!--        <select class="form-control" name="employee_id[]">-->
                                        <!--            <option value="">-- Select Employee --</option>-->
                                        <!--            @foreach($hrms as $hrm)-->
                                        <!--                <option value="{{ $hrm->id }}">{{ $hrm->name }} ({{ $hrm->id }})</option>-->
                                        <!--            @endforeach-->
                                        <!--        </select>-->
                                        <!--    </div>-->

                                            <!--<div class="col-md-4 mb-3">-->
                                            <!--    <label class="form-label">Employee Name</label>-->
                                            <!--    <input type="text" class="form-control" name="p_name[]">-->
                                            <!--</div>-->
                                            <!--<div class="col-md-4 mb-3">-->
                                            <!--    <label class="form-label">Designation</label>-->
                                            <!--    <input type="text" class="form-control" name="p_designation[]">-->
                                            <!--</div>-->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Department</label>
                                                <input type="text" class="form-control" name="p_department[]">
                                            </div>
                                             <div class="col-md-4 mb-3">
                                                <label class="form-label">Payroll Month</label>
                                                <input type="date" class="form-control" name="pay_month[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Salary Details</label>
                                                <input type="number" class="form-control" name="p_salary_details[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Attendance Records</label>
                                                <input type="text" class="form-control" name="p_attendance_records[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Leave Records</label>
                                                <input type="text" class="form-control" name="p_leave_records[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Total Overtime Hours</label>
                                                <input type="number" class="form-control" name="p_total_overtime_hours[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Overtime Rate</label>
                                                <input type="number" class="form-control" name="p_overtime_rate[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Tax Deductions</label>
                                                <input type="number" class="form-control" name="p_tax_deductions[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Insurance Deductions</label>
                                                <input type="number" class="form-control" name="p_insurance_deductions[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Performance Bonus</label>
                                                <input type="number" class="form-control" name="p_performance_bonus[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Year-end Bonus</label>
                                                <input type="number" class="form-control" name="p_year_end_bonus[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Other Allowances</label>
                                                <input type="number" class="form-control" name="p_other_allowances[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Gross Salary</label>
                                                <input type="number" class="form-control" name="p_gross_salary[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Total Deductions</label>
                                                <input type="number" class="form-control" name="p_total_deductions[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Net Salary</label>
                                                <input type="number" class="form-control" name="p_net_salary[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Employee Pay Slips</label>
                                                <input type="file" class="form-control" name="p_employee_pay_slips[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Payroll Reports</label>
                                                <input type="file" class="form-control" name="p_payroll_reports[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Other Deductions</label>
                                                <input type="number" class="form-control" name="p_other_deductions[]">
                                            </div>
                                             <div class="col-md-4 mb-3">
                                                <label class="form-label">lunch Allowance</label>
                                                <input type="number" class="form-control" name="lunch_allowlance[]">
                                            </div>
                                             <div class="col-md-4 mb-3">
                                                <label class="form-label">Payroll Other</label>
                                                <input type="number" class="form-control" name="p_others[]">
                                            </div>
                                             <div class="col-md-4 mb-3">
                                                <label class="form-label">Payroll Misc</label>
                                                <input type="number" class="form-control" name="p_misc[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Payroll Income Tax</label>
                                                <input type="number" class="form-control" name="income_tax[]">
                                            </div>
                                             <div class="col-md-4 mb-3">
                                                <label class="form-label">Payroll Advanced</label>
                                                <input type="number" class="form-control" name="p_advance[]">
                                            </div>
                                             <div class="col-md-4 mb-3">
                                                <label class="form-label">Payroll Total Earning</label>
                                                <input type="number" class="form-control" name="total_earning[]">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add More and Save Buttons -->
                        <div class="row my-3">
                            <div class="col">
                                <button type="button" class="btn btn-primary" id="addPayrollAccordion">Add More Payroll</button>
                            </div>
                            <button type="button" class="btn btn-primary" id="savepayrollEntries">Save</button>
                        </div>
                    
                            <!-- Payroll Summary Table -->
                        <div class="table-responsive">
                                <table class="table table-bordered mt-1 " id="payrollSummaryTable">
                             <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee Name</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Salary Details</th>
                                    <th>Attendance Records</th>
                                    <th>Leave Records</th>
                                    <th>Total Overtime Hours</th>
                                    <th>Overtime Rate</th>
                                    <th>Tax Deductions</th>
                                    <th>Insurance Deductions</th>
                                    <th>Performance Bonus</th>
                                    <th>Year-End Bonus</th>
                                    <th>Other Allowances</th>
                                    <th>Gross Salary</th>
                                    <th>Total Deductions</th>
                                    <th>Net Salary</th>
                                    <th>Other Deductions</th>
                                </tr>
                            </thead>

                                <tbody>
                                  
                                </tbody>
                            </table>
                        </div>
            </div>
                </div>
                    <!--compliances-->
                    <div class="tab-pane fade show m-3" style="opacity: 90%;" id="compliances" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row" style="display: flex; justify-content:flex-end;">
                        <center><h4>Employee Old Age Benefit </h4></center>
                            <div class="col-lg-3" style="margin-left:0px">
                                <br> <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="option1">
                                <label class="form-check-label" for="inlineCheckbox">Out of Scope</label>
                                </div>
                            </div>
                            <div class="col-lg-12  spacing-right" id="eobi-fields">
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            EOBI Registration No. of Staff<br>  <input class="form-control" name="c_eobi" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Fall in EOBI <br>
                                            <div class="input-group" style="width: 97%;">
                                                <select id="catagory" class="form-control" name="f_eobi" style="width: 70%; border-radius: 4px 0 0 4px;">
                                                    <option value=""></option>
                                                    @foreach ($eobis as $eobi)
                                                        <option value="{{ $eobi->eobi_city }}">{{ $eobi->eobi_city }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                    <a href="{{ route('eobi') }}">
                                                        <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0;">Add</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 spacing-right">
                                        Sub code of that EOBI Region <br>  <input class="form-control" name="sub_eobi" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                    Front Side of EOBI Card  <br>  <input class="form-control" id="inpFile30" type="file" name="front_eobi" placeholder="..." style="width: 100%;">
                                    <div class="row mb-2">
                                        <div class="col-lg-11">
                                            <!--Image Preview Screen Shot-->
                                            <div class="image-preview30" id="imagePreview30">
                                            <img src="" alt="Image Preview30" class="image-preview__image30" style="width:20%">
                                            <span class="image-preview__default-text30"> Image Preview </span>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                        Back side of EOBI Card <br>  <input class="form-control" id="inpFile31" name="back_eobi" type="file" placeholder="..." style="width: 100%;">
                                        <div class="row mb-2">
                                        <div class="col-lg-11">
                                            <!--Image Preview Screen Shot-->
                                            <div class="image-preview31" id="imagePreview31">
                                            <img src="" alt="Image Preview31" class="image-preview__image31" style="width:28%">
                                            <span class="image-preview__default-text31"> Image Preview </span>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                </div>
                                    {{-- <div class="row mb-2">
                                        <div class="col-lg-11">
                                            ScreenSot from EoBI Portal  <br>  <input class="form-control" name="ss_eobi" type="file" id="inpFile4" placeholder="..." style="width: 100%;" multiple>
                                        </div>
                                    </div> --}}





                            </div>
                            <div class="row" style="display: flex; justify-content:flex-end;">
                            <center><h4>Social Security</h4></center>
                            <div class="col-lg-3" style="margin-left:0px">
                                <br> <div class="form-check form-check-inline" >
                                    <input class="form-check-input" type="checkbox" id="lineCheckbox" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox">Out of Scope</label>
                                    </div>
                            </div>
                                <div class="col-lg-12 spacing-right" id="eobi-f">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Social Security Registration No. of Staff <br>  <input class="form-control" name="ss_staff" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Fall in EOBI <br>
                                        <div class="input-group" style="width: 97%;">
                                            <select id="scatagory" class="form-control" name="fall_ss" style="width: 70%; border-radius: 4px 0 0 4px;">
                                                <option value=""></option>
                                                @foreach ($socials as $social)
                                                    <option value="{{ $social->social_city }}">{{ $social->social_city }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append" style="width: 30%;">
                                                <a href="{{ url('social') }}">
                                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0;">Add</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 spacing-right">
                                        Sub Code of that Social Security Region <br>  <input class="form-control" name="sub_ss" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                        Front Side of SS Card  <br>  <input class="form-control" id="inpFile40" type="file" name="front_ss" placeholder="..." style="width: 105%;">
                                        <div class="row mb-2">
                                            <div class="col-lg-11">
                                                <!--Image Preview Screen Shot-->
                                                <div class="image-preview40" id="imagePreview40">
                                                <img src="" alt="Image Preview40" class="image-preview__image40" style="width:28%">
                                                <span class="image-preview__default-text40"> Image Preview </span>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-5">
                                            Back side of SS Card <br>  <input class="form-control" id="inpFile41"  name="back_ss" type="file" placeholder="..." style="width: 108%;">
                                            <div class="row mb-2">
                                            <div class="col-lg-11">
                                                <!--Image Preview Screen Shot-->
                                                <div class="image-preview41" id="imagePreview41">
                                                <img src="" alt="Image Preview41" class="image-preview__image41" style="width:30%">
                                                <span class="image-preview__default-text41"> Image Preview </span>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        {{-- <div class="row mb-2">
                                            <div class="col-lg-11">
                                                ScreenSot from EoBI Portal  <br>  <input class="form-control" name="ss_eobi" type="file" id="inpFile4" placeholder="..." style="width: 100%;" multiple>
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
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="negative">
                                        <label class="form-check-label" for="inlineCheckbox3">Negative</label>
                                    </div>
                                    <div class="form-check form-check-inline spacing-left">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="positives">
                                        <label class="form-check-label" for="inlineCheckbox2">Positive</label>
                                    </div> --}}


                                </div>
                                    {{-- <div class="col-lg-5 spacing-left spacing-right" style="margin-left:12px">
                                    Remarks by HR  <br>  <textarea class="form-control" type="text" name="hr_remark" placeholder="..." style="width: 100%;"></textarea>
                                    </div> --}}
                                </div>
                                {{-- <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Attachment <br>  <input class="form-control" type="file" name="observ_attach" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Appraisal(PKR) <br>  <input class="form-control" type="text" name="apr_pk" placeholder="..." style="width: 100%;">
                                    </div>
                                </div> --}}
                                {{-- <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                Screenshot Attachment<br>  <input class="form-control" type="file" name="sc_attach" placeholder="..." style="width: 100%;">
                                </div>
                                {{-- <div class="col-lg-5 spacing-left spacing-right">
                                    Scanned Document of Policy<br>  <input class="form-control" name="subm_date" type="file" placeholder="..." style="width: 100%;">
                                </div> --}}

                                {{-- <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                SS of Insurance Certificate<br>   <input class="form-control" name="ss_ins_c" type="file" id="inpFile4" placeholder="..." style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Amount Write with Insurance <br>  <input class="form-control" type="text" name="amount_w_ins" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                    Others<br>   <input class="form-control" type="file" id="inpFile4" name="policy_other" placeholder="..." style="width: 100%;" multiple>
                                    </div>

                                </div> --}}
                        </div>
                        <div class="col-lg-12 spacing-right">
                            <center><h4>Group Life Insurrance</h4></center>
                                <div class="row" style="display: flex; justify-content:flex-end;">
                                    <div class="col-lg-3" style="margin-left:0px">
                                        <br> <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inCheckbox" value="">
                                        <label class="form-check-label" for="">Out of Scope</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 spacing-right" id="eobi-field">
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                        Insurance No. of Employee  <br>  <input class="form-control" name="gli_ins" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-right">
                                            Insurance Company Name  <br>  <input class="form-control" name="gli_name" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left spacing-right" style="margin-left:8px;">
                                            Policy Number of PIFFERS <br>  <input class="form-control" type="text" name="gli_policy" placeholder="..." style="width: 98%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                            Type Of Insurrance <br>  <input class="form-control" type="text" name="type_ins" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left spacing-right">
                                            Sum Insured <br>  <input class="form-control" type="text" name="sum_gli" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                        Date of Insurrance<br>  <input class="form-control" type="date" name="date_ins" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left spacing-right">
                                        Scanned Document of Policy<br>  <input class="form-control" name="snc_pol" type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    </div>
                                    {{-- <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                    SS of Insurance Certificate<br>   <input class="form-control" name="ss_ins_c" type="file" id="inpFile4" placeholder="..." style="width: 100%;" multiple>
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Amount Write with Insurance <br>  <input class="form-control" type="text" name="amount_w_ins" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-right">
                                        Others<br>   <input class="form-control" type="file" id="inpFile4" name="policy_other" placeholder="..." style="width: 100%;" multiple>
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
                                    Name <br>  <input class="form-control" type="text" name="next_name" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right spacing-left">
                                    CNIC <br>  <input class="form-control" type="text" name="next_cnic" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Father Name <br>  <input class="form-control" type="text" name="next_fname" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Relationship <br>  <input class="form-control" type="text" name="next_relation" placeholder="..." style="width: 100%;">
                                    </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Death Certification <br>  <input class="form-control" type="text" name="next_death" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    FRC (Family Registration Certificate) <br> <input class="form-control" name="next_frc" type="file" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-10 spacing-right">
                                    Affidavit from Legal Heirs of deceased Security Staff regarding Claim <br> <input class="form-control" name="next_legal" type="file" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                    Photograph while giving the Claim <br> <input class="form-control" name="next_photo" type="file" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right">
                                    Acknowledgement of Receiving the Claim <br> <input class="form-control" name="next_claim" type="file" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-3 spacing-right">
                                Amount of Claim <br>  <input class="form-control" type="text" name="next_amount" placeholder="..." style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-3 spacing-left spacing-right">
                                Check Number of Claim <br> <input class="form-control" type="text" name="next_check" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-2 spacing-left spacing-right">
                                Date of Check <br> <input class="form-control" type="date" name="next_date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-2 spacing-left spacing-right">
                                Copy of the Check <br> <input class="form-control" name="next_copy" type="file" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                            <div class="col-lg-3 spacing-right">
                                Name of bank <br>  <input class="form-control" type="text" name="next_bank" placeholder="..." style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-3 spacing-right">
                                Instrument Number <br>  <input class="form-control" type="text" name="next_ins" placeholder="..." style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-3 spacing-left spacing-right">
                                Instrument Attachment <br> <input class="form-control" type="file" name="next_attach" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Attachements <br>  <input class="form-control" type="file" name="ex_next_attach" placeholder="..." style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-5 spacing-left">
                                Notes <br>   <textarea id="w3review" class="form-control" name="ex_next_note" name="w3review" rows="4" cols="47">
                                </textarea>
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
                    <!-- Inventory Bin Card--->
                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="inventory-bin-card" role="tabpanel" aria-labelledby="nav-contact-tab">
                          <div class="table-responsive mt-2">
                <div style="height: 380px; overflow-y: auto;">
                    <table class="table table-bordered table-striped table-fixed">
                        <thead>
                            <tr>
                                <th class="col-lg-1 col-sm-1 col-1">Date</th>
                                <th class="col-lg-1 col-sm-1 col-1">Store Name</th>
                                <th class="col-lg-1 col-sm-5 col-1">Category</th>
                                <th class="col-lg-1 col-sm-5 col-1">Article Name</th>
                                <th class="col-lg-1 col-sm-1 col-1">Issued To</th>
                                <th class="col-lg-1 col-sm-1 col-1">Quantity</th>
                                <th class="col-lg-1 col-sm-1 col-1">Total Price</th>
                                <!--<th class="col-lg-1 col-sm-1 col-1">Action</th>-->
                            </tr>
                        </thead>

                        <tbody id="branch-table-body">
                            @foreach($dispatches as $dispatch)
                            <tr>
                                <td>{{$dispatch->date}}</td>
                                <td>{{$dispatch->category}}</td>
                                <td>{{$dispatch->sub_category}}</td>
                                <td>{{$dispatch->article_name}}</td>
                                <td>{{$dispatch->issued_to}}</td>
                                <td>{{$dispatch->quantity}}</td>
                                <td>{{$dispatch->total_price}}</td>
                                <!--<td style="display:flex; gap: 10px; align-items: center;">-->
                                <!--    <a class="btn btn-primary" style="width:84%; height:80%;">Edit</a>-->
                                <!--</td>-->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
                        <!--<div class="row">-->
                        <!--    <div class="col-lg-6">-->
                        <!--        <div class="row mb-2">-->
                        <!--            <div class="col-lg-11 spacing-right">-->
                        <!--                Employee Name <br>  <input class="form-control" name="emp_name" type="text" placeholder="..." style="width: 100%;">-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="row mb-2">-->
                        <!--            <div class="col-lg-3 spacing-right">-->
                        <!--                Bin Card No.  <br>  <input class="form-control" name="bin" type="text" placeholder="..." style="width: 100%;">-->
                        <!--            </div>-->
                        <!--            <div class="col-lg-3 spacing-left spacing-right">-->
                        <!--                Employee No. <br>  <input class="form-control" name="emp_no" type="text" placeholder="..." style="width: 100%;">-->
                        <!--            </div>-->
                        <!--            <div class="col-lg-5 spacing-left spacing-right">-->
                        <!--                Title/Designation <br>  <input class="form-control" name="emp_desig" type="text" placeholder="..." style="width: 100%;">-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="col-lg-6">-->
                        <!--        <div class="row mb-2">-->
                        <!--            <div class="col-lg-5 spacing-left spacing-right">-->
                        <!--                Stock Register No.  <br>  <input class="form-control" name="stock" type="text" placeholder="..." style="width: 100%;">-->
                        <!--            </div>-->
                        <!--            <div class="col-lg-5 spacing-left spacing-right">-->
                        <!--                Stock Register Page No. <br>  <input class="form-control" name="stock_reg" type="text" placeholder="..." style="width: 100%;">-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="row mb-2">-->
                        <!--            <div class="col-lg-5 spacing-left spacing-right">-->
                        <!--                Others <br>  <input class="form-control" type="file" name="stock_other" placeholder="..." style="width: 100%;" multiple>-->
                        <!--            </div>-->
                        <!--            <div class="col-lg-5 spacing-left spacing-right">-->
                        <!--                Attachements <br>  <input class="form-control" type="file" name="stock_attach" placeholder="..." style="width: 100%;" multiple>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="row">-->
                        <!--        <div class="col-lg-10 spacing-left spacing-right">-->
                        <!--            Notes <br> <textarea id="w3review" class="form-control" name="stock_note" rows="4" cols="56">-->
                        <!--            </textarea>-->
                        <!--        </div>-->
                        <!--        </div>-->

                        <!--    </div>-->
                        <!--    <hr class="w-75 mx-auto"/>-->
                        <!--    <h3 class="text-center mb-3"><u>Inventory</u></h3>-->
                        <!--    <h5 class="text-center"><u>Bin Card Details</u></h5>-->
                        <!--    <div class="row mb-2">-->
                        <!--    <div class="col-lg-4 spacing-right">-->
                        <!--        Employee No <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="row mb-2">-->
                        <!--    <div class="col-lg-4 spacing-right">-->
                        <!--        Employee Name <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">-->
                        <!--        </div>-->

                        <!--        <div class="col-lg-4 spacing-right" style="margin-left:335px">-->
                        <!--        Stock Register <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="row mb-2">-->
                        <!--    <div class="col-lg-4 spacing-right">-->
                        <!--        Designation <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">-->
                        <!--        </div>-->
                        <!--        <div class="col-lg-4 spacing-right">-->
                        <!--        Card No <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">-->
                        <!--        </div>-->
                        <!--        <div class="col-lg-4">-->
                        <!--        Stock Register page <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="section-body">-->
                        <!--    <div class="container-fluid">-->
                        <!--        <div class="tab-content">-->
                        <!--            <div class="tab-pane fade show active" id="list" role="tabpanel">-->
                        <!--                <div class="row" >-->
                        <!--                        <div class="row" id="section-container" style="display:flex; flex-direction:row;"></div>-->
                        <!--                        <div class="row">-->
                        <!--                            <form>-->
                        <!--                                <div class="form-group col-lg-4">-->
                        <!--                                    <label for="image">Image</label>-->
                        <!--                                    <input type="file" class="form-control-file" id="image" accept="image/*">-->
                        <!--                                </div>-->
                        <!--                                <div class="form-group col-lg-4">-->
                        <!--                                    <label for="name">Name</label>-->
                        <!--                                    <input type="text" class="form-control" id="name">-->
                        <!--                                </div>-->
                        <!--                                <div class="col-lg-4">-->
                        <!--                                    <button style="width: 250px; margin-top:30px;" type="button" class="btn btn-primary" onclick="addSection()">Add More</button>-->
                        <!--                                </div>-->
                        <!--                            </form>-->
                        <!--                        </div>-->
                        <!--                        <div class="col-lg-5" style="margin-top:80px; margin-left:37rem;">-->
                        <!--                            Total Value of Inventory hold with Staff <br>  <input class="form-control" type="" placeholder="" style="width: 60%;" multiple>-->
                        <!--                        </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--</div>-->
                    </div>
                    <!--Security Guard License Last Tab-->
                    <div class="tab-pane m-3" style="opacity: 90%;" id="security" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                            <div class="col-lg-12 spacing-right">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        License No <br>  <input class="form-control" type="text" name="s_license" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Isuing Authority <br>  <input class="form-control" type="text" name="s_issuing" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Validity date. <br>  <input class="form-control" type="date" name="s_v_date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Date of issuance  <br>  <input class="form-control" type="date" name="s_date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Fee of License  <br>  <input class="form-control" type="text" name="s_fee" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-4 spacing-left spacing-right">
                                        Picture of License (front) <br>  <input class="form-control" type="file" name="s_front" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Picture of License (back) <br>  <input class="form-control" type="file" name="s_back" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Notes. <br>  <textarea class="form-control" type="text" name="s_notes" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Attachments  <br>  <input class="form-control" type="file" name="s_attach" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- training -->
                    <div class="tab-pane m-3" style="opacity: 90%;" id="training-details" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div id="training-container">
                            <div class="training-group">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="trainerName" class="form-label">Trainer Name</label>
                                        <input type="text" class="form-control" name="general_trainer_name[]" placeholder="Enter trainer name">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="trainingNumber" class="form-label">Training Number</label>
                                        <input type="text" class="form-control" name="training_no[]" placeholder="Enter training number">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="trainingDate" class="form-label">Training Date</label>
                                        <input type="date" class="form-control" name="training_s_date[]">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="trainingVenue" class="form-label">Training Venue</label>
                                        <input type="text" class="form-control" placeholder="Enter venue" name="venue[]">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="trainingRegion" class="form-label">Training Region</label>
                                        <input type="text" class="form-control" placeholder="Enter region" name="training_region[]">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="trainingRange" class="form-label">Name of Training Range (If any)</label>
                                        <input type="text" class="form-control" placeholder="Enter range name" name="name_of_range[]">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="typeOfTraining" class="form-label">Type of Training</label>
                                        <input type="text" class="form-control" placeholder="Enter type" name="type_of_training[]">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="trainingCourses" class="form-label">Training Courses (Attachment)</label>
                                        <input type="file" class="form-control" name="training_course_file[]">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="proofOfTraining" class="form-label">Proof of Training (Attachment)</label>
                                        <input type="file" class="form-control" name="expenses_proof_attach[]">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="trainingCertificate" class="form-label">Training Certificate (Attachment)</label>
                                        <input type="file" class="form-control" name="training_certificate[]">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="attachment" class="form-label">Attachment (Optional)</label>
                                        <input type="file" class="form-control" name="attachment_anyone[]">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="notes" class="form-label">Notes</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter any notes" name="training_notes[]"></textarea>
                                    </div>
                                    <div class="col-md-12 text-end">
                                        <button type="button" class="btn btn-danger remove-training">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="button" class="btn btn-primary" id="addMore">Add More</button>
                        </div>
                    <script>
                    document.getElementById("addMore").addEventListener("click", function() {
                        let container = document.getElementById("training-container");
                        let newGroup = document.querySelector(".training-group").cloneNode(true);
                        newGroup.querySelectorAll("input, textarea").forEach(input => input.value = "");
                        container.appendChild(newGroup);
                    });

                    document.addEventListener("click", function(e) {
                        if (e.target.classList.contains("remove-training")) {
                            if (document.querySelectorAll(".training-group").length > 1) {
                                e.target.closest(".training-group").remove();
                            } else {
                                alert("At least one training entry is required.");
                            }
                        }
                    });
                    </script>


                    <!--<div class="row">-->
                    <!--    <div class="col-lg-4 spacing-right mt-3">-->
                    <!--        Refresher training <div-->
                    <!--            class="form-check form-check-inline">-->
                    <!--            <input class="form-check-input ml-2 pt-1"-->
                    <!--                type="checkbox" id="send-to-active"-->
                    <!--                value="option1">-->

                    <!--        </div> <br>-->
                    <!--        <div id="send-active-options" style="display: none;">-->
                    <!--                <div class=" mb-2 d-flex align-items-center">-->
                    <!--                <div class="form-check form-check-inline spacing-left">-->
                    <!--                <input class="form-check-input" type="checkbox" id="sends-to-all-yes" value="negative">-->
                    <!--                <label class="form-check-label" for="inlineCheckbox1">On Site</label>-->
                    <!--                </div>-->
                    <!--                <div class="form-check form-check-inline spacing-left">-->
                    <!--                <input class="form-check-input" type="checkbox" id="sends-to-all-no" value="positives">-->
                    <!--                <label class="form-check-label" for="inlineCheckbox2">Online</label>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="col-lg-4 spacing-right mt-3">-->
                    <!--        Live Firearm training <div-->
                    <!--            class="form-check form-check-inline">-->
                    <!--            <input class="form-check-input ml-2 pt-1"-->
                    <!--                type="checkbox" id="send-to-active"-->
                    <!--                value="option1">-->

                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="input-group mb-3 mt-4" style="width: 30%;">-->
                    <!--    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />-->
                    <!--    <button type="button" class="btn btn-outline-primary">search</button>-->
                    <!--</div>-->
                    <!--<div class="col-lg-12" style="margin-left:78px;">-->

                    <!--    <div class="" style="height: 36em;">-->
                    <!--        <div class="d">-->
                    <!--            <div class="container" style="display: flex; align-items: center; justify-content: center;">-->
                    <!--                <div class="center-text" style="position: absolute;-->
                    <!--                top: 48%;-->
                    <!--                left: 50%;-->
                    <!--                transform: translate(-50%, -50%);-->
                    <!--                text-align: center;">-->
                    <!--                <h1 style="font-family: 'Times New Roman', Times, serif; font-weight: bolder; font-size: 2.5em;-->
                    <!--                margin-right: 150px; margin-top: 30px;">Training<br>Modules</h1>-->
                    <!--                </div>-->
                    <!--                <div style="position: relative; width: 200px; height: 200px;">-->
                    <!--                    <div style="position: absolute;-->
                    <!--                        top: 12px;-->
                    <!--                        left: -16%;-->
                    <!--                        transform: rotate(-18deg);-->
                    <!--                        width: 60px;-->
                    <!--                        height: 60px;">-->
                    <!--                    <img src="training/first.png" alt="Your image">-->
                    <!--                    <input type="checkbox" id="myCheckbox" class="checkbox-class" style="    position: absolute;-->
                    <!--                    top: 27%;-->
                    <!--                    left: 62%;-->
                    <!--                    /* transform: translate(-45%, -56%); */-->
                    <!--                    width: 25px;-->
                    <!--                    height: 24px;-->
                    <!--                    border: 1px solid black;-->
                    <!--                    border-radius: 4px;-->
                    <!--                    background-color: white;-->
                    <!--                    transform: rotate(19deg);">-->
                    <!--                    </div>-->
                    <!--                    <div style="position: absolute;     top: 19%;-->
                    <!--                        left: 27%;-->
                    <!--                        transform: rotate(-17deg); width: 60px; height: 60px;">-->
                    <!--                    <img src="training/second.png" alt="Your image">-->
                    <!--                    <input type="checkbox" id="myCheckbox1" class="checkbox-class" style="    position: absolute;-->
                    <!--                    top: 58%;-->
                    <!--                    left: 103%;-->
                    <!--                    /* transform: translate(-50%, -50%); */-->
                    <!--                    width: 25px;-->
                    <!--                    height: 24px;-->
                    <!--                    border: 1px solid black;-->
                    <!--                    border-radius: 4px;-->
                    <!--                    background-color: white;-->
                    <!--                    transform: rotate(54deg);">-->
                    <!--                    </div>-->
                    <!--                    <div style="position: absolute;-->
                    <!--                        top: 65%;-->
                    <!--                        left: 61%;-->
                    <!--                        transform: rotate(-9deg); width: 60px; height: 60px;">-->
                    <!--                    <img src="training/third.png" alt="Your image">-->
                    <!--                    <input type="checkbox" id="myCheckbox2" class="checkbox-class" style="    position: absolute;-->
                    <!--                    top: 47%;-->
                    <!--                    left: 64%;-->
                    <!--                    transform: translate(-50%, -50%);-->
                    <!--                    width: 25px;-->
                    <!--                    height: 24px;-->
                    <!--                    border: 1px solid black;-->
                    <!--                    border-radius: 4px;-->
                    <!--                    background-color: white;-->
                    <!--                    ">-->
                    <!--                    </div>-->
                    <!--                    <div style="position: absolute;-->
                    <!--                    top: 123%;-->
                    <!--                    left: 55%;-->
                    <!--                    transform: rotate(-17deg);-->
                    <!--                    width: 60px; height: 60px;">-->
                    <!--                        <img src="training/forth.png" alt="Your image">-->
                    <!--                        <input type="checkbox" id="myCheckbox3" class="checkbox-class" style="position: absolute;-->
                    <!--                        top: 90%;-->
                    <!--                        left: 118%;-->
                    <!--                        /* transform: translate(-50%, -50%); */-->
                    <!--                        width: 25px;-->
                    <!--                        height: 24px;-->
                    <!--                        border: 1px solid black;-->
                    <!--                        border-radius: 4px;-->
                    <!--                        background-color: white;-->
                    <!--                        transform: rotate(38deg);">-->
                    <!--                    </div>-->
                    <!--                    <div style=" position: absolute;-->
                    <!--                        top: 164%;-->
                    <!--                        left: 30%;-->
                    <!--                        transform: rotate(-20deg);-->
                    <!--                        width: 60px;-->
                    <!--                        height: 60px;">-->
                    <!--                        <img src="training/fifth.png" alt="Your image">-->
                    <!--                        <input type="checkbox" id="myCheckbox4" class="checkbox-class" style="position: absolute;-->
                    <!--                        top: 116%;-->
                    <!--                        left: 64%;-->
                    <!--                        /* transform: translate(-50%, -50%); */-->
                    <!--                        width: 25px;-->
                    <!--                        height: 24px;-->
                    <!--                        border: 1px solid black;-->
                    <!--                        border-radius: 4px;-->
                    <!--                        background-color: white;-->
                    <!--                        transform: rotate(71deg);-->
                    <!--                    ">-->
                    <!--                    </div>-->
                    <!--                    <div style=" position: absolute;-->
                    <!--                        top: 182%;-->
                    <!--                        left: -27%;-->
                    <!--                        transform: rotate(345deg);-->
                    <!--                        width: 60px;-->
                    <!--                        height: 60px;">-->
                    <!--                        <img src="training/sixth.png" alt="Your image">-->
                    <!--                        <input type="checkbox" id="myCheckbox5"  class="checkbox-class" style="position: absolute;-->
                    <!--                        top: 109%;-->
                    <!--                        left: 59%;-->
                    <!--                        /* transform: translate(-50%, -50%); */-->
                    <!--                        width: 25px;-->
                    <!--                        height: 24px;-->
                    <!--                        border: 1px solid black;-->
                    <!--                        border-radius: 4px;-->
                    <!--                        background-color: white;-->
                    <!--                        transform: rotate(108deg);">-->
                    <!--                    </div>-->
                    <!--                    <div style=" position: absolute;-->
                    <!--                        top: 160%;-->
                    <!--                        left: -77%;-->
                    <!--                        transform: rotate(-10deg);-->
                    <!--                        width: 60px;-->
                    <!--                        height: 60px;">-->
                    <!--                        <img src="training/seventh.png" alt="Your image">-->
                    <!--                        <input type="checkbox" id="myCheckbox6" class="checkbox-class" style="position: absolute;-->
                    <!--                        top: 94%;-->
                    <!--                        left: 40%;-->
                    <!--                        /* transform: translate(-50%, -50%); */-->
                    <!--                        width: 25px;-->
                    <!--                        height: 24px;-->
                    <!--                        border: 1px solid black;-->
                    <!--                        border-radius: 4px;-->
                    <!--                        background-color: white;-->
                    <!--                        transform: rotate(59deg);">-->
                    <!--                    </div>-->
                    <!--                    <div style=" position: absolute;-->
                    <!--                            top: 112%;-->
                    <!--                            left: -97%;-->
                    <!--                            transform: rotate(350deg);-->
                    <!--                        width: 60px;-->
                    <!--                        height: 60px;">-->
                    <!--                        <img src="training/eigth.png" alt="Your image">-->
                    <!--                        <input type="checkbox" id="myCheckbox7" class="checkbox-class" style="    position: absolute;-->
                    <!--                        top: 28%;-->
                    <!--                        left: 82%;-->
                    <!--                        /* transform: translate(-50%, -50%); */-->
                    <!--                        width: 25px;-->
                    <!--                        height: 24px;-->
                    <!--                        border: 1px solid black;-->
                    <!--                        border-radius: 4px;-->
                    <!--                        background-color: white;-->
                    <!--                    ">-->
                    <!--                    </div>-->
                    <!--                    <div style=" position: absolute;-->
                    <!--                            top: 60%;-->
                    <!--                            left: -104%;-->
                    <!--                            transform: rotate(344deg);-->
                    <!--                            width: 60px;-->
                    <!--                            height: 60px;">-->
                    <!--                        <img src="training/ninth.png" alt="Your image">-->
                    <!--                        <input type="checkbox" id="myCheckbox8" class="checkbox-class" style="    position: absolute;-->
                    <!--                        top: 77%;-->
                    <!--                        left: 44%;-->
                    <!--                        /* transform: translate(-50%, -50%); */-->
                    <!--                        width: 25px;-->
                    <!--                        height: 24px;-->
                    <!--                        border: 1px solid black;-->
                    <!--                        border-radius: 4px;-->
                    <!--                        background-color: white;-->
                    <!--                        transform: rotate(36deg);">-->
                    <!--                    </div>-->
                    <!--                    <div style=" position: absolute;-->
                    <!--                            top: 25%;-->
                    <!--                            left: -72%;-->
                    <!--                            transform: rotate(341deg);-->
                    <!--                            width: 60px;-->
                    <!--                            height: 60px;">-->
                    <!--                            <img src="training/tenth.png" alt="Your image">-->
                    <!--                            <input type="checkbox" id="myCheckbox9" class="checkbox-class" style="    position: absolute;-->
                    <!--                            top: 29%;-->
                    <!--                            left: 67%;-->
                    <!--                            /* transform: translate(-50%, -50%); */-->
                    <!--                            width: 25px;-->
                    <!--                            height: 24px;-->
                    <!--                            border: 1px solid black;-->
                    <!--                            border-radius: 4px;-->
                    <!--                            background-color: white;-->
                    <!--                            transform: rotate(71deg); ">-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--        </div>-->
                    <!--        <div id="newSection"></div>-->
                    <!--        <div id="newSection1"></div>-->
                    <!--        <div id="newSection2"></div>-->
                    <!--        <div id="newSection3"></div>-->
                    <!--        <div id="newSection4"></div>-->
                    <!--        <div id="newSection5"></div>-->
                    <!--        <div id="newSection6"></div>-->
                    <!--        <div id="newSection7"></div>-->
                    <!--        <div id="newSection8"></div>-->
                    <!--        <div id="newSection9"></div>-->
                    <!--        <div class="my-3">-->
                    <!--        <div-->
                    <!--            class="container m-auto align-items-center d-flex justify-content-center">-->
                    <!--            <div class="col-10">-->
                    <!--                <table class="table  table-hover table-bordered">-->
                    <!--                    <thead>-->
                    <!--                        <tr>-->
                    <!--                            <th scope="col">Sno</th>-->
                    <!--                            <th scope="col">Activity</th>-->
                    <!--                            <th scope="col">Timeline</th>-->
                    <!--                            <th scope="col">Responsible</th>-->
                    <!--                        </tr>-->
                    <!--                    </thead>-->
                    <!--                    <tbody>-->
                    <!--                        <tr>-->
                    <!--                            <th scope="row">1</th>-->
                    <!--                            <td><input type="text" name='name[]'-->
                    <!--                                    placeholder='Enter Activity'-->
                    <!--                                    class="form-control" /></td>-->
                    <!--                            <td><input type="text" name='name[]'-->
                    <!--                                    placeholder='Enter Timeline'-->
                    <!--                                    class="form-control" /></td>-->
                    <!--                            <td><input type="text" name='name[]'-->
                    <!--                                    placeholder='Enter Responsible'-->
                    <!--                                    class="form-control" /></td>-->
                    <!--                        </tr>-->
                    <!--                        <tr>-->
                    <!--                            <th scope="row">2</th>-->
                    <!--                            <td>Jacob</td>-->
                    <!--                            <td>Thornton</td>-->
                    <!--                            <td>@fat</td>-->
                    <!--                        </tr>-->
                    <!--                        <tr>-->
                    <!--                            <th scope="row">3</th>-->
                    <!--                            <td colspan="2">Larry the Bird</td>-->
                    <!--                            <td>@twitter</td>-->
                    <!--                        </tr>-->
                    <!--                    </tbody>-->
                    <!--                </table>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    </div>
                    <!-- payroll-->
                    <!--<div class="tab-pane fade m-3" style="opacity: 90%;" id="payroll" role="tabpanel" aria-labelledby="nav-home-tab">-->
                    <!--    <div class="col-lg-6 spacing-right">-->
                    <!--        <div class="row mb-2">-->
                    <!--            <div class="col-lg-4 spacing-right">-->
                    <!--                Employee Number  <br>  <input class="form-control" type="text" name="insp_date" placeholder="..." style="width: 100%;">-->
                    <!--            </div>-->

                    <!--        </div>-->
                    <!--</div>-->
                    <!--</div> -->
                    <!--Inspection-->
                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="inspection" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class="col-lg-12 spacing-right">
                                    <div class="row mb-2">
                                        <h5>Inspection Performed By :</h5>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Employee No <br>  <input class="form-control" type="text" name="insp_no" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Name <br>  <input class="form-control" type="text" name="insp_name" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left">
                                            Cell No. <br>  <input class="form-control" type="text" name="insp_cell" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left">
                                            Date of Inspection  <br>  <input class="form-control" type="date" name="insp_date" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 spacing-left">
                                        Picture of Inspection <br>  <input class="form-control basic-info-attachements" id="inpFile43" type="file" name="insp_pic" placeholder="..." style="width: 100%;" multiple>
                                        <div class="col-lg-3 spacing-right">
                                            <!--Image Preview Biometric-->
                                            <div class="image-preview43" id="imagePreview43">
                                            <img src="" alt="Image Preview43" class="image-preview__image43" style="height: 100%; width:100%; margin-left:-13px;">
                                            <span class="image-preview__default-text43"> Image Preview </span>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-4 spacing-right spacing-left">
                                        Remarks of Petroling Officer <br>  <textarea class="form-control basic-info-attachements" id="inpFile2" type="text" name="rem_petr" placeholder="..." style="width: 100%;" multiple></textarea>
                                        </div>
                                        <div class="col-lg-4 spacing-left">
                                            Attachments <br>  <input class="form-control basic-info-attachements" id="inpFile2" type="file" name="insp_attach" placeholder="..." style="width: 100%;" multiple>
                                        </div>
                                        <div class="col-lg-4 spacing-left">
                                            Notes <br>  <textarea class="form-control basic-info-attachements" id="inpFile2" type="file" name="insp_notes" placeholder="..." style="width: 100%;" ></textarea>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!--Observation-->
                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="observation" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class="col-lg-6 spacing-left">

                                <div class="row mb-2">
                                    <div class=" mb-2 d-flex align-items-center">

                                        <label for="Type Of Training:" class="form-check-label spacing-right" >Observation Month</label>
                                        <input class="form-control" type="text" name="observ_mon" placeholder="..." style="width: 70%;">
                                    </div>
                                    <div class="col-lg-11 spacing-right">
                                        Observation Type
                                         <div class="input-group" style="width: 100%;">
                                      <select id="observ_type" class="form-control mt-1" name="observ_type" style="width: 70%; border-radius: 4px 0 0 4px;">
                                        <option value="">Select a Observaion</option>
                                        @foreach (App\Models\Observation::all() as $observation)
                                            <option value="{{ $observation->o_name }}">{{ $observation->o_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append" style="width: 30%;">
                                            <a href="{{route('Observation.add')}}">
                                                <button class="btn btn-primary" id="submit-region" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                            </a>
                                        </div>
                                    </div>
                                        <!--<br>  <select id="observ_type" class="form-control" name="observ_type" style="width: 97%;">-->
                                        <!--<option value="islamabad">Negative Observation</option>-->
                                        <!--<option value="lahore">Positive Observation</option>-->
                                        <!--</select>-->
                                    </div>
                                    <div class="col-lg-11 spacing-left spacing-right" style="margin-left:12px">
                                        Remarks by HR  <br>  <textarea class="form-control" type="text" name="hr_remark" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                        Attachment <br>  <input class="form-control" type="file" name="ex_observ_attach" placeholder="..." style="width: 100%;">
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-6">
                                <h5>Appraisal :</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                    Appraisal (PKR)<br>  <input class="form-control" type="text" name="appraisal" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                    Appraisal Screenshot Attachment<br>  <input class="form-control" type="file" name="appraisal_attach" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 spacing-right">
                                    Notes<br>  <textarea class="form-control" type="file" name="appraisal_notes" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="tab-pane fade m-3" style="opacity: 90%;" id="psychologistreport" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container my-1">
                            <div class="accordion" id="psychologistreportAccordion">
                                <!-- Initial Guarantor Accordion -->
                                <div class="accordion-item" id="psychologistreportEntry1">
                                    <h2 class="accordion-header" id="psychologistreportHeading1">
                                        <button class="accordion-button" type="button" data-toggle="collapse" data-target="#psychologistreportCollapse1" aria-expanded="true" aria-controls="psychologistreportCollapse1">
                                            psychologistreport 1
                                        </button>
                                    </h2>
                                    <div id="psychologistreportCollapse1" class="accordion-collapse collapse show" aria-labelledby="psychologistreportHeading1" >
                                        <div class="accordion-body">
                                            <div class="row">
                                               
                                                <div class="col-md-3">
                                                    <label class="form-label">Branch Name:</label>
                                                    <input type="text" class="form-control" name="psy_branch_name[]" placeholder="Enter Branch Name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Branch ID:</label>
                                                    <input type="text" class="form-control" name="psy_branch_id[]" placeholder="Enter Branch ID">
                                                </div>
                                                 <div class="col-md-3">
                                                    <label class="form-label">Date:</label>
                                                    <input type="date" class="form-control" name="psy_date[]">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Name of Customer:</label>
                                                    <input type="text" class="form-control" name="psy_customer_name[]" placeholder="Enter Customer Name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Site ID:</label>
                                                    <input type="text" class="form-control" name="psy_site_id[]" placeholder="Enter Site ID">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Evaluation No.:</label>
                                                    <input type="text" class="form-control" name="psy_evaluation_no[]" placeholder="Enter Evaluation No.">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Name of Guard:</label>
                                                    <input type="text" class="form-control" name="psy_guard_name[]" placeholder="Enter Guard Name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">CNIC No.:</label>
                                                    <input type="text" class="form-control" name="psy_cnic_no[]" placeholder="Enter CNIC No.">
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <label class="form-label">Session Report</label>
                                                    <input type="file" class="form-control mt-2" name="psy_session_report[]">
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sessionReport" name="psy_session_report_check[]">
                                                        <label class="form-check-label" for="sessionReport">Session Report</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="evaluationCertificate" name="psy_evaluation_certificate_check[]">
                                                        <label class="form-check-label" for="evaluationCertificate">Evaluation Certificate Issued</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sessionConducted" name="psy_session_conducted_check[]">
                                                        <label class="form-check-label" for="sessionConducted">Session Conducted</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-1">
                                                    <label class="form-label">Evaluation Certificate Issued (attachment)</label>
                                                    <input type="file" class="form-control mt-2" name="psy_evaluation_certificate_attachment[]">
                                                </div>
                                                <div class="col-md-3 mt-4">
                                                    <label class="form-label">Session Conducted (attachment)</label>
                                                    <input type="file" class="form-control mt-2" name="psy_session_conducted_attachment[]">
                                                </div>
                                                <div class="col-md-3 mt-4">
                                                    <label class="form-label">Crux of Session (Attachment):</label>
                                                    <input type="file" class="form-control" name="psy_crux_of_session_attachment[]">
                                                </div>
                                                <div class="col-md-3 mt-4">
                                                    <label class="form-label">Crux of Session:</label>
                                                    <input type="text" class="form-control" name="psy_crux_of_session[]" placeholder="Enter Crux">
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <label class="form-label">Next Revision Date:</label>
                                                    <input type="date" class="form-control" name="psy_next_revision_date[]">
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <label class="form-label">Certificates of Mental Health:</label>
                                                    <input type="file" class="form-control" name="psy_mental_health_certificates[]">
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <label class="form-label">Psychotherapy Progress Report:</label>
                                                    <input type="file" class="form-control" name="psy_chotherapy_progress_report[]">
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <label class="form-label">Attachment:</label>
                                                    <input type="file" class="form-control" name="psy_general_attachment[]">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Notes:</label>
                                                    <textarea class="form-control" rows="3" name="psy_notes[]" placeholder="Enter any additional notes..."></textarea>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Details of Evaluation:</label>
                                                    <textarea class="form-control" rows="4" name="psy_evaluation_details[]" placeholder="Enter details..."></textarea>
                                                </div>
                                            </div>
                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add More and Save Buttons -->
                            <div class="row my-3">
                                <div class="col">
                                    <button style="width:30%" type="button" class="btn btn-primary" id="addpsychologistreportAccordion">Add More psychologistreport</button>
                                </div>
                                <button type="button" class="btn btn-primary" id="savepsychologistreportEntries">Save</button>
                            </div>
                        
                                <!-- psychologistreport Summary Table -->
                            <div class="table-responsive">
                                    <table class="table table-bordered mt-1 " id="psychologistreportSummaryTable">
                            <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Branch Name</th>
                                        <th>Branch ID</th>
                                        <th>Name of Customer</th>
                                        <th>Site ID</th>
                                        <th>Evaluation No.</th>
                                        <th>Name of Guard</th>
                                        <th>CNIC No.</th>
                                        <th>Session Report</th>
                                        <th>Session Report Check</th>
                                        <th>Evaluation Certificate Issued</th>
                                        <th>Session Conducted</th>
                                        <th>Evaluation Certificate Issued (Attachment)</th>
                                        <th>Session Conducted (Attachment)</th>
                                        <th>Crux of Session (Attachment)</th>
                                        <th>Crux of Session</th>
                                        <th>Next Revision Date</th>
                                        <th>Certificates of Mental Health</th>
                                        <th>Psychotherapy Progress Report</th>
                                        <th>General Attachment</th>
                                        <th>Notes</th>
                                        <th>Details of Evaluation</th>
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
                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
            </form>
        </div>
    </section>
</div>

        <script>
        // Function to preview the image
            function previewImage(event, previewId) {
                var file = event.target.files[0]; // Get the file selected by the user
                var reader = new FileReader(); // Create a FileReader instance

                reader.onload = function() {
                    var preview = document.getElementById(previewId); // Get the preview div
                    var image = preview.querySelector('img'); // Get the img tag inside the preview

                    image.src = reader.result; // Set the source of the image to the file
                    image.style.display = 'block'; // Show the image
                };

                if (file) {
                    reader.readAsDataURL(file); // Read the file as a data URL
                }
            }

        </script>

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

<script>
    document.addEventListener('DOMContentLoaded', function() {

        var successMessage = '{{ session("success") }}';
        var hrmId = '{{ session("hrmId") }}';

        if (successMessage && hrmId) {
            var url = '{{ route("viewhrm", ":id") }}';
            url = url.replace(':id', hrmId);
            var popupMessage = 'HRM data stored successfully. Please find the URL below:';

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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        var payrollEntryCount = 1;

        // Add More payroll Button Click Event
        $('#addPayrollAccordion').on('click', function () {
            payrollEntryCount++;
             const currentDate = new Date();
                const options = { day: 'numeric', month: 'short', year: 'numeric' };
                const formattedDate = currentDate.toLocaleDateString('en-US', options);
            var newPayrollAccordion = `
                <div class="accordion-item" id="payrollEntry${payrollEntryCount}">
                    <h2 class="accordion-header" id="payrollHeading${payrollEntryCount}">
                        <button class="accordion-button" type="button" data-toggle="collapse" data-target="#payrollCollapse${payrollEntryCount}" aria-expanded="true" aria-controls="payrollCollapse${payrollEntryCount}">
                            ${formattedDate}
                        </button>
                    </h2>
                    <div id="payrollCollapse${payrollEntryCount}" class="accordion-collapse collapse show" aria-labelledby="payrollHeading1${payrollEntryCount}" data-parent="#payrollAccordion">
                        <div class="accordion-body">
                               <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Department</label>
                                                <input type="text" class="form-control" name="p_department[]">
                                            </div>
                                             <div class="col-md-4 mb-3">
                                                <label class="form-label">Payroll Month</label>
                                                <input type="date" class="form-control" name="pay_month[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Salary Details</label>
                                                <input type="number" class="form-control" name="p_salary_details[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Attendance Records</label>
                                                <input type="text" class="form-control" name="p_attendance_records[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Leave Records</label>
                                                <input type="text" class="form-control" name="p_leave_records[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Total Overtime Hours</label>
                                                <input type="number" class="form-control" name="p_total_overtime_hours[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Overtime Rate</label>
                                                <input type="number" class="form-control" name="p_overtime_rate[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Tax Deductions</label>
                                                <input type="number" class="form-control" name="p_tax_deductions[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Insurance Deductions</label>
                                                <input type="number" class="form-control" name="p_insurance_deductions[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Performance Bonus</label>
                                                <input type="number" class="form-control" name="p_performance_bonus[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Year-end Bonus</label>
                                                <input type="number" class="form-control" name="p_year_end_bonus[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Other Allowances</label>
                                                <input type="number" class="form-control" name="p_other_allowances[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Gross Salary</label>
                                                <input type="number" class="form-control" name="p_gross_salary[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Total Deductions</label>
                                                <input type="number" class="form-control" name="p_total_deductions[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Net Salary</label>
                                                <input type="number" class="form-control" name="p_net_salary[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Employee Pay Slips</label>
                                                <input type="file" class="form-control" name="p_employee_pay_slips[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Payroll Reports</label>
                                                <input type="file" class="form-control" name="p_payroll_reports[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Other Deductions</label>
                                                <input type="number" class="form-control" name="p_other_deductions[]">
                                            </div>
                                              <div class="col-md-4 mb-3">
                                                <label class="form-label">lunch Allowance</label>
                                                <input type="number" class="form-control" name="lunch_allowlance[]">
                                            </div>
                                             <div class="col-md-4 mb-3">
                                                <label class="form-label">Payroll Other</label>
                                                <input type="number" class="form-control" name="p_others[]">
                                            </div>
                                             <div class="col-md-4 mb-3">
                                                <label class="form-label">Payroll Misc</label>
                                                <input type="number" class="form-control" name="p_misc[]">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Payroll Income Tax</label>
                                                <input type="number" class="form-control" name="income_tax[]">
                                            </div>
                                             <div class="col-md-4 mb-3">
                                                <label class="form-label">Payroll Advanced</label>
                                                <input type="number" class="form-control" name="p_advance[]">
                                            </div>
                                             <div class="col-md-4 mb-3">
                                                <label class="form-label">Payroll Total Earning</label>
                                                <input type="number" class="form-control" name="total_earning[]">
                                            </div>
                                <center>
                                    <button type="button" style="width: 20%; float: right;" class="remove-btn" onclick="payroll_remove_fields(${payrollEntryCount})">Remove</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            $('#payrollAccordion').append(newPayrollAccordion);
        });

        // Save payroll Entries Button Click Event
        $('#savepayrollEntries').on('click', function () {
            updatePayrollSummaryTable();
        });

        // Function to update summary table for payroll entries
        function updatePayrollSummaryTable() {
            // Clear existing rows
            $('#payrollSummaryTable tbody').empty();

            // Iterate through each Payroll accordion item and update the summary table
          $('.accordion-item').each(function (index) {
               var employee_id = $(this).find('[name="employee_id[]"]').val();
                var name = $(this).find('[name="p_name[]"]').val();
                var designation = $(this).find('[name="p_designation[]"]').val();
                var department = $(this).find('[name="p_department[]"]').val();
                var salaryDetails = $(this).find('[name="p_salary_details[]"]').val();
                var attendanceRecords = $(this).find('[name="p_attendance_records[]"]').val();
                var leaveRecords = $(this).find('[name="p_leave_records[]"]').val();
                var totalOvertimeHours = $(this).find('[name="p_total_overtime_hours[]"]').val();
                var overtimeRate = $(this).find('[name="p_overtime_rate[]"]').val();
                var taxDeductions = $(this).find('[name="p_tax_deductions[]"]').val();
                var insuranceDeductions = $(this).find('[name="p_insurance_deductions[]"]').val();
                var performanceBonus = $(this).find('[name="p_performance_bonus[]"]').val();
                var yearEndBonus = $(this).find('[name="p_year_end_bonus[]"]').val();
                var otherAllowances = $(this).find('[name="p_other_allowances[]"]').val();
                var grossSalary = $(this).find('[name="p_gross_salary[]"]').val();
                var totalDeductions = $(this).find('[name="p_total_deductions[]"]').val();
                var netSalary = $(this).find('[name="p_net_salary[]"]').val();
                var otherDeductions = $(this).find('[name="p_other_deductions[]"]').val();
            
                // Check if any relevant data is entered
                if (name ||employee_id|| designation || department || salaryDetails || attendanceRecords || leaveRecords || 
                    totalOvertimeHours || overtimeRate || taxDeductions || insuranceDeductions || performanceBonus || 
                    yearEndBonus || otherAllowances || grossSalary || totalDeductions || netSalary  || otherDeductions) {
                    
                    // Add a new row to the summary table
                    $('#payrollSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${name}</td>
                            <td>${employee_id}</td>
                            <td>${designation}</td>
                            <td>${department}</td>
                            <td>${salaryDetails}</td>
                            <td>${attendanceRecords}</td>
                            <td>${leaveRecords}</td>
                            <td>${totalOvertimeHours}</td>
                            <td>${overtimeRate}</td>
                            <td>${taxDeductions}</td>
                            <td>${insuranceDeductions}</td>
                            <td>${performanceBonus}</td>
                            <td>${yearEndBonus}</td>
                            <td>${otherAllowances}</td>
                            <td>${grossSalary}</td>
                            <td>${totalDeductions}</td>
                            <td>${netSalary}</td>
                            <td>${otherDeductions}</td>
                        </tr>
                    `);
                }
            });
                    }
                     window.payroll_remove_fields = function (id) {
                    $('#payrollEntry' + id).remove();
                    updatePayrollSummaryTable();
                };
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

    // Education Add Fields
    var room1 = 1;
    function education_add_fields() {

    room1++;
    var objTo = document.getElementById('education_add_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "first-col removeclass"+room1);
    var rdiv = 'removeclass'+room1;
    divtest.innerHTML = '<div class="row"><div><input type="hidden" name="d_id[]" value="${room1}"></div><div class="col-lg-6"><div class="row mb-2"><div class="form-type col-lg-3">Name of Degree <br> <input class="form-control" type="text" name="degree[]" placeholder="..." style="width: 100%;"></div><div class="form-type col-lg-3">Date <br> <input class="form-control" type="date" name="degree_date[]" placeholder="..." style="width: 100%;"></div><div class="form-type col-lg-5 spacing-left">Scanned Certificate of Degree <br> <input class="form-control" type="file" name="degree_pic[]" placeholder="..." style="width: 100%;" multiple></div><div class="col-lg-3 spacing-right" style="margin-left:248px;"><div class="image-preview28" id="imagePreview28"><img src="" alt="Image Preview28" class="image-preview__image28" style="height: 50%; width:50%;"><span class="image-preview__default-text28"> Image Preview </span></div></div></div><div class="row mb-2"><div class="col-lg-6 form-type spacing-right">Institute Name <br> <input class="form-control" name="institute_name[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 form-type spacing-left">Awarding Body <br> <input class="form-control" name="a_body[]" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-12 spacing-left"></div></div><div class="row"><div class="col-lg-11">Notes <br> <textarea class="form-control" style="width: 100%;" name="ex_notes[]" rows="4" cols="40"></textarea></div></div></div><div class="col-lg-4 spacing-left"><div class="row mb-3"><div class="form-type col-lg-5 spacing-right">Degree No. <br> <input class="form-control" name="degree_no[]" type="text" placeholder="..." style="width: 100%;"></div><div class="form-type col-lg-5 spacing-left spacing-right">Degree Level <br> <input class="form-control" name="degree_level[]" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="form-type col-lg-5 spacing-right">Marks Obtained <br> <input class="form-control" type="text" name="ob_marks[]" placeholder="..." style="width: 100%;"></div><div class="form-type col-lg-5 spacing-right">Total Marks <br> <input class="form-control" type="text" name="t_marks[]" placeholder="..." style="width: 100%;"></div><div class="form-type col-lg-5 spacing-right">Grade <br> <input class="form-control" type="text" name="grade[]" placeholder="..." style="width: 100%;"></div></div><div class="row"><div class="form-type col-lg-5 spacing-right">Start Date <br> <input class="form-control" type="date" name="date_start[]" placeholder="..." style="width: 100%;"></div><div class="form-type col-lg-5 spacing-right">End Date <br> <input class="form-control" type="date" name="date_end[]" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-10 mt-3 form-type spacing-right">Address of Institution <br> <input class="form-control" name="adress_inst[]" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-5 spacing-right">Attachement <br> <input class="form-control" type="file" name="deg_attach[]" placeholder="..." style="width: 100%;" multiple></div></div><button type="button" class="remove-btn" onclick="education_remove_fields('+ room1 +')">Remove</button></div></div>';
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
    divtest.innerHTML = '<div class="row"><div><input type="hidden" name="w_id[]" value="${room2}"></div><div class="col-lg-5"><div class="row mb-2"><div class="col-lg-11 spacing-right">Organization Name <br> <input class="form-control" name="org_name[]" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-7 spacing-right">Email of the Company<br> <input class="form-control" name="email_oc[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-4 spacing-right">POC <br> <input class="form-control" type="text" name="poc[]" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right">Job Experience Certificate <br> <input class="form-control" name="jec[]" type="file" placeholder="..." style="width: 100%;" multiple></div><div class="col-lg-5 spacing-left spacing-right">Attachements <br> <input class="form-control" name="jec_attach[]" type="file" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right">Designation <br> <input class="form-control" name="w_desig[]" type="text" placeholder="..." style="width: 100%;" multiple></div><div class="col-lg-5 spacing-left spacing-right">Salary <br> <input class="form-control" name="w_salary[]" type="text" placeholder="..." style="width: 100%;"></div></div></div><div class="col-lg-4 spacing-left"><div class="row mb-2"><div class="col-lg-6 spacing-right">Service Tenure <br> <input class="form-control" name="ser_tenure[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-right spacing-left">Others <br> <input class="form-control" type="file" name="ser_other[]" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-11 spacing-right">Inservice Awards /Achivements <br> <input class="form-control" name="achivement[]" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right">Joining Date <br> <input class="form-control" type="date" name="join_date[]" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-right spacing-left">End Date <br> <input class="form-control" type="date" name="end_date[]" placeholder="..." style="width: 100%;" multiple></div><div class="col-lg-5 spacing-right" style="margin-top:10px;">Total Experience <br> <input class="form-control" type="text" name="t_exp[]" placeholder="" style="width: 100%;" multiple></div></div><button type="button" class="remove-btn" onclick="work_remove_fields('+ room2 +')">Remove</button></div></div>';
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
    divtest.innerHTML = '<div class="row"><div class="col-lg-10 mt-2"><div class="row mb-2"><div class="col-lg-5 spacing-right">CNIC <br>  <input class="input_field"  name="next_cnic[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Name <br>  <input class="input_field" type="text" name="next_name[]" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-5 spacing-right">Father Name <br>  <input class="input_field" name="next_fname[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Relationship <br>  <input class="input_field" name="next_relation[]" type="text" placeholder="..." style="width: 100%;"></div></div></div><div class="col-lg-2 mt-5"><button type="button" class="remove-btn" onclick="compliance_remove_fields('+ room3 +')">Remove</button></div></div>';
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
                <div class="col-lg-4 spacing-right">
                    <input type="hidden" name="g_id[]" value="${room4}">
                </div>
                <div class="row mb-2">
                <div class="col-lg-5 spacing-right">
                    Name  <br>  <input class="form-control" name="g_name[]" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left spacing-right">
                    Father Name <br>  <input class="form-control" name="g_fname[]" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6 spacing-right">
                    Relationship<br>  <input class="form-control" type="text" name="g_relation[]" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-left spacing-right">
                    Tenure of Relation<br>  <input class="form-control" type="text" name="g_tenure_rel[]"  placeholder="..." style="width: 100%;">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6 spacing-right">
                CNIC (front)  <br>  <input class="form-control" type="file" name="g_cnic_f[]" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-left spacing-right">
                CNIC (back)  <br>  <input class="form-control" type="file" name="g_cnic_b[]" placeholder="..." style="width: 100%;">
            </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-11 spacing-right">
                    Postal Verification of References <br>  <input class="form-control" name="pos_verify[]" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            </div>
            <div class="col-lg-6 spacing-left">
                <h5>Address :</h5>
                <div class="row mb-2">
                    <div class="col-lg-5 spacing-right">
                        Office No <br> <input class="form-control" id="head_office_cell_no" name="head_office_no[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left">
                        Floor No <br> <input class="form-control" id="head_office_cell_no" name="head_floor_no[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-5 spacing-right">
                        Building <br> <input class="form-control" id="head_office_cell_no" name="head_building[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left">
                        Block <br> <input class="form-control" id="head_office_cell_no" name="head_block[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-5 spacing-right">
                        Area <br> <input class="form-control" id="head_office_cell_no" name="head_area[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left">
                        City <br> <input class="form-control" id="head_office_cell_no" name="head_city[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-11 spacing-right">
                        Attachements <br>  <input class="form-control" type="file" name="head_attach" placeholder="..." style="width: 88%;" multiple>
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
    $(document).ready(function () {
        var psychologistreportEntryCount = 1;

        // Add More psychologistreport Button Click Event
        $('#addpsychologistreportAccordion').on('click', function () {
            psychologistreportEntryCount++;
            var newpsychologistreportAccordion = `
                <div class="accordion-item" id="psychologistreportEntry${psychologistreportEntryCount}">
                    <h2 class="accordion-header" id="psychologistreportHeading${psychologistreportEntryCount}">
                        <button class="accordion-button" type="button" data-toggle="collapse" data-target="#psychologistreportCollapse${psychologistreportEntryCount}" aria-expanded="true" aria-controls="psychologistreportCollapse${psychologistreportEntryCount}">
                            psychologistreport ${psychologistreportEntryCount}
                        </button>
                    </h2>
                    <div id="psychologistreportCollapse${psychologistreportEntryCount}" class="accordion-collapse collapse show" aria-labelledby="psychologistreportHeading1${psychologistreportEntryCount}" data-parent="#psychologistreportAccordion">
                        <div class="accordion-body">
                              <div class="row">
                    
                        <div class="col-md-3">
                            <label class="form-label">Branch Name:</label>
                            <input type="text" class="form-control" name="psy_branch_name[]" placeholder="Enter Branch Name">
                        </div>
                        
                        <div class="col-md-3">
                            <label class="form-label">Branch ID:</label>
                            <input type="text" class="form-control" name="psy_branch_id[]" placeholder="Enter Branch ID">
                        </div>
                            <div class="col-md-3">
                            <label class="form-label">Date:</label>
                            <input type="date" class="form-control" name="psy_date[]">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Name of Customer:</label>
                            <input type="text" class="form-control" name="psy_customer_name[]" placeholder="Enter Customer Name">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Site ID:</label>
                            <input type="text" class="form-control" name="psy_site_id[]" placeholder="Enter Site ID">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Evaluation No.:</label>
                            <input type="text" class="form-control" name="psy_evaluation_no[]" placeholder="Enter Evaluation No.">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Name of Guard:</label>
                            <input type="text" class="form-control" name="psy_guard_name[]" placeholder="Enter Guard Name">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">CNIC No.:</label>
                            <input type="text" class="form-control" name="psy_cnic_no[]" placeholder="Enter CNIC No.">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Session Report</label>
                            <input type="file" class="form-control mt-2" name="psy_session_report[]">
                        </div>
                        <div class="col-md-3 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sessionReport" name="psy_session_report_check[]">
                                <label class="form-check-label" for="sessionReport">Session Report</label>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="evaluationCertificate" name="psy_evaluation_certificate_check[]">
                                <label class="form-check-label" for="evaluationCertificate">Evaluation Certificate Issued</label>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sessionConducted" name="psy_session_conducted_check[]">
                                <label class="form-check-label" for="sessionConducted">Session Conducted</label>
                            </div>
                        </div>
                        <div class="col-md-3 mt-1">
                            <label class="form-label">Evaluation Certificate Issued (attachment)</label>
                            <input type="file" class="form-control mt-2" name="psy_evaluation_certificate_attachment[]">
                        </div>
                        <div class="col-md-3 mt-4">
                            <label class="form-label">Session Conducted (attachment)</label>
                            <input type="file" class="form-control mt-2" name="psy_session_conducted_attachment[]">
                        </div>
                        <div class="col-md-3 mt-4">
                            <label class="form-label">Crux of Session (Attachment):</label>
                            <input type="file" class="form-control" name="psy_crux_of_session_attachment[]">
                        </div>
                        <div class="col-md-3 mt-4">
                            <label class="form-label">Crux of Session:</label>
                            <input type="text" class="form-control" name="psy_crux_of_session[]" placeholder="Enter Crux">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Next Revision Date:</label>
                            <input type="date" class="form-control" name="psy_next_revision_date[]">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Certificates of Mental Health:</label>
                            <input type="file" class="form-control" name="psy_mental_health_certificates[]">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Psychotherapy Progress Report:</label>
                            <input type="file" class="form-control" name="psy_chotherapy_progress_report[]">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Attachment:</label>
                            <input type="file" class="form-control" name="psy_general_attachment[]">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Notes:</label>
                            <textarea class="form-control" rows="3" name="psy_notes[]" placeholder="Enter any additional notes..."></textarea>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Details of Evaluation:</label>
                            <textarea class="form-control" rows="4" name="psy_evaluation_details[]" placeholder="Enter details..."></textarea>
                        </div>
                    
                                <center style="margin-top:10px;">
                                    <button type="button" style="width: 20%; float: right;" class="remove-btn" onclick="psychologistreport_remove_fields(${psychologistreportEntryCount})">Remove</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            $('#psychologistreportAccordion').append(newpsychologistreportAccordion);
        });

        // Save psychologistreport Entries Button Click Event
        $('#savepsychologistreportEntries').on('click', function () {
            updatepsychologistreportSummaryTable();
        });

        // Function to update summary table for psychologistreport entries
        function updatepsychologistreportSummaryTable() {
            // Clear existing rows
            $('#psychologistreportSummaryTable tbody').empty();

            // Iterate through each psychologistreport accordion item and update the summary table
          $('.accordion-item').each(function (index) {
                var name = $(this).find('[name="p_name[]"]').val();
                var designation = $(this).find('[name="p_designation[]"]').val();
                var department = $(this).find('[name="p_department[]"]').val();
                var salaryDetails = $(this).find('[name="p_salary_details[]"]').val();
                var attendanceRecords = $(this).find('[name="p_attendance_records[]"]').val();
                var leaveRecords = $(this).find('[name="p_leave_records[]"]').val();
                var totalOvertimeHours = $(this).find('[name="p_total_overtime_hours[]"]').val();
                var overtimeRate = $(this).find('[name="p_overtime_rate[]"]').val();
                var taxDeductions = $(this).find('[name="p_tax_deductions[]"]').val();
                var insuranceDeductions = $(this).find('[name="p_insurance_deductions[]"]').val();
                var performanceBonus = $(this).find('[name="p_performance_bonus[]"]').val();
                var yearEndBonus = $(this).find('[name="p_year_end_bonus[]"]').val();
                var otherAllowances = $(this).find('[name="p_other_allowances[]"]').val();
                var grossSalary = $(this).find('[name="p_gross_salary[]"]').val();
                var totalDeductions = $(this).find('[name="p_total_deductions[]"]').val();
                var netSalary = $(this).find('[name="p_net_salary[]"]').val();
                var otherDeductions = $(this).find('[name="p_other_deductions[]"]').val();

                // Check if any relevant data is entered
                if (name || designation || department || salaryDetails || attendanceRecords || leaveRecords ||
                    totalOvertimeHours || overtimeRate || taxDeductions || insuranceDeductions || performanceBonus ||
                    yearEndBonus || otherAllowances || grossSalary || totalDeductions || netSalary  || otherDeductions) {

                    // Add a new row to the summary table
                    $('#psychologistreportSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${name}</td>
                            <td>${designation}</td>
                            <td>${department}</td>
                            <td>${salaryDetails}</td>
                            <td>${attendanceRecords}</td>
                            <td>${leaveRecords}</td>
                            <td>${totalOvertimeHours}</td>
                            <td>${overtimeRate}</td>
                            <td>${taxDeductions}</td>
                            <td>${insuranceDeductions}</td>
                            <td>${performanceBonus}</td>
                            <td>${yearEndBonus}</td>
                            <td>${otherAllowances}</td>
                            <td>${grossSalary}</td>
                            <td>${totalDeductions}</td>
                            <td>${netSalary}</td>
                            <td>${otherDeductions}</td>
                        </tr>
                    `);
                }
            });
                    }
                     window.psychologistreport_remove_fields = function (id) {
                    $('#psychologistreportEntry' + id).remove();
                    updatepsychologistreportSummaryTable();
                };
                });
       </script>

<script>
    $(document).ready(function () {
        var guarantorEntryCount = 1;

        // Add More Guarantor Button Click Event
        $('#addGuarantorAccordion').on('click', function () {
            guarantorEntryCount++;
            var newGuarantorAccordion = `
                <div class="accordion-item" id="guarantorEntry${guarantorEntryCount}">
                    <h2 class="accordion-header" id="guarantorHeading${guarantorEntryCount}">
                        <button class="accordion-button" type="button" data-toggle="collapse" data-target="#guarantorCollapse${guarantorEntryCount}" aria-expanded="true" aria-controls="guarantorCollapse${guarantorEntryCount}">
                            Guarantor ${guarantorEntryCount}
                        </button>
                    </h2>
                    <div id="guarantorCollapse${guarantorEntryCount}" class="accordion-collapse collapse show" aria-labelledby="guarantorHeading${guarantorEntryCount}" data-parent="#guarantorAccordion">
                        <div class="accordion-body">
                            <div class="row">
                                <h5>Guarantors</h5>
                                <div class="col-lg-6">
                                    <div class="col-lg-4 spacing-right">
                                        <input type="hidden" name="g_id[]" value="${room4}">
                                    </div>
                                    <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                        Name  <br>  <input class="form-control" name="g_name[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 spacing-left spacing-right">
                                        Father Name <br>  <input class="form-control" name="g_fname[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                        Relationship<br>  <input class="form-control" type="text" name="g_relation[]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Tenure of Relation<br>  <input class="form-control" type="text" name="g_tenure_rel[]"  placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                    CNIC (front)  <br>  <input class="form-control" type="file" name="g_cnic_f[]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                    CNIC (back)  <br>  <input class="form-control" type="file" name="g_cnic_b[]" placeholder="..." style="width: 100%;">
                                </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-11 spacing-right">
                                        Postal Verification of References <br>  <input class="form-control" name="pos_verify[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-6 spacing-left">
                                    <h5>Address :</h5>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                            Office No <br> <input class="form-control" id="head_office_cell_no" name="head_office_no[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left">
                                            Floor No <br> <input class="form-control" id="head_office_cell_no" name="head_floor_no[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                            Building <br> <input class="form-control" id="head_office_cell_no" name="head_building[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left">
                                            Block <br> <input class="form-control" id="head_office_cell_no" name="head_block[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                            Area <br> <input class="form-control" id="head_office_cell_no" name="head_area[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 spacing-left">
                                            City <br> <input class="form-control" id="head_office_cell_no" name="head_city[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-11 spacing-right">
                                            Attachements <br>  <input class="form-control" type="file" name="head_attach" placeholder="..." style="width: 88%;" multiple>
                                            </div>
                                    </div>
                                </div>
                                <center>
                                    <button type="button" style="width: 20%; float: right;" class="remove-btn" onclick="guarantor_remove_fields(${room4})">Remove</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            $('#guarantorAccordion').append(newGuarantorAccordion);
        });

        // Save Guarantor Entries Button Click Event
        $('#saveGuarantorEntries').on('click', function () {
            updateGuarantorSummaryTable();
        });

        // Function to update summary table for guarantor entries
        function updateGuarantorSummaryTable() {
            // Clear existing rows
            $('#guarantorSummaryTable tbody').empty();

            // Iterate through each guarantor accordion item and update the summary table
            $('.accordion-item').each(function (index) {
                var name = $(this).find('[name="g_name[]"]').val();
                var fname = $(this).find('[name="g_fname[]"]').val();
                var relation = $(this).find('[name="g_relation[]"]').val();
                var tenure = $(this).find('[name="g_tenure_rel[]"]').val();

                // Check if any relevant data is entered
                if (name || fname || relation || tenure) {
                    // Add a new row to the summary table
                    $('#guarantorSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${name}</td>
                            <td>${fname}</td>
                            <td>${relation}</td>
                            <td>${tenure}</td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function () {
        var educationEntryCount = 1;

        // Add More Education Button Click Event
        $('#addEducationAccordion').on('click', function () {
            educationEntryCount++;
            var newEducationAccordion = `
                <div class="accordion-item" id="educationEntry${educationEntryCount}">
                    <h2 class="accordion-header" id="educationHeading${educationEntryCount}">
                        <button class="accordion-button" type="button" data-toggle="collapse" data-target="#educationCollapse${educationEntryCount}" aria-expanded="true" aria-controls="educationCollapse${educationEntryCount}">
                            Education Entry ${educationEntryCount}
                        </button>
                        <button type="button" class="btn btn-danger btn-sm removeEducationAccordion" style="margin-left: 10px;">Remove</button>
                    </h2>
                    <div id="educationCollapse${educationEntryCount}" class="collapse" aria-labelledby="educationHeading${educationEntryCount}" data-parent="#educationAccordion">
                        <div class="accordion-body">
                            <div class="row">
                                <input type="hidden" name="d_id[]" value="">
                                <div class="col-lg-6">
                                    <div class="row mb-2">
                                        <div class="form-type col-lg-3">
                                            Name of Degree <br>
                                            <input class="form-control" type="text" name="degree[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="form-type col-lg-3">
                                            Date <br>
                                            <input class="form-control" type="date" name="degree_date[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="form-type col-lg-5 spacing-left">
                                            Scanned Certificate of Degree <br>
                                            <input class="form-control" type="file" name="degree_pic[]" placeholder="..." style="width: 100%;" multiple>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6 form-type spacing-right">
                                            Institute Name <br>
                                            <input class="form-control" name="institute_name[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 form-type spacing-left">
                                            Awarding Body <br>
                                            <input class="form-control" name="a_body[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-11">
                                            Notes <br>
                                            <textarea class="form-control" style="width: 100%;" name="ex_notes[]" rows="4" cols="40"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 spacing-left">
                                    <div class="row mb-3">
                                        <div class="form-type col-lg-5 spacing-right">
                                            Degree No. <br>
                                            <input class="form-control" name="degree_no[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="form-type col-lg-5 spacing-left spacing-right">
                                            Degree Level <br>
                                            <input class="form-control" name="degree_level[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="form-type col-lg-5 spacing-right">
                                            Marks Obtained <br>
                                            <input class="form-control" type="text" name="ob_marks[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="form-type col-lg-5 spacing-right">
                                            Total Marks <br>
                                            <input class="form-control" type="text" name="t_marks[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="form-type col-lg-5 spacing-right">
                                            Grade <br>
                                            <input class="form-control" type="text" name="grade[]" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-type col-lg-5 spacing-right">
                                            Start Date <br>
                                            <input class="form-control" type="date" name="date_start[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="form-type col-lg-5 spacing-right">
                                            End Date <br>
                                            <input class="form-control" type="date" name="date_end[]" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-10 mt-3 form-type spacing-right">
                                            Address of Institution <br>
                                            <input class="form-control" name="adress_inst[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5 spacing-right">
                                            Attachment <br>
                                            <input class="form-control" type="file" name="deg_attach[]" placeholder="..." style="width: 100%;" multiple>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            $('#educationAccordion').append(newEducationAccordion);
        });

        // Remove Education Entry Button Click Event
        $(document).on('click', '.removeEducationAccordion', function () {
            $(this).closest('.accordion-item').remove();
        });

        $(document).on('click', '.btn-primary', function() {
            var index = $(this).data('index');
            $('#educationCollapse' + index).collapse('toggle');
        });

        // Function to update summary table for education entries
        function updateEducationSummaryTable() {
            // Clear existing rows
            $('#educationSummaryTable tbody').empty();

            // Iterate through each education accordion item and update the summary table
            $('.accordion-item').each(function (index) {
                var degree = $(this).find('[name="degree[]"]').val();
                var date = $(this).find('[name="degree_date[]"]').val();
                var institute = $(this).find('[name="institute_name[]"]').val();

                // Check if any relevant data is entered
                if (degree || date || institute) {
                    // Add a new row to the summary table
                    $('#educationSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${degree}</td>
                            <td>${date}</td>
                            <td>${institute}</td>
                            <td><button type="button" style="width:45%" class="btn btn-primary " data-index="${index}">View</button></td>
                        </tr>
                    `);
                }
            });
        }

        // Save Education Entries Button Click Event
        $('#saveEducationEntries').on('click', function () {
            updateEducationSummaryTable();
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Function to update summary table for work experience entries
        function updateWorkSummaryTable() {
            // Clear existing rows
            $('#workSummaryTable tbody').empty();

            // Iterate through each work accordion item and update the summary table
            $('.workaccordion-item').each(function (index) {
                var orgName = $(this).find('[name="org_name[]"]').val();
                var wDesig = $(this).find('[name="w_desig[]"]').val();

                // Check if any relevant data is entered
                if (orgName || wDesig) {
                    // Add a new row to the summary table
                    $('#workSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${orgName}</td>
                            <td>${wDesig}</td>
                            <td><button type="button"  style="width:45%"  class="btn btn-primary view-work-button" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Work Experience Button Click Event
        $('#addWorkAccordion').on('click', function () {
            var workEntryCount = $('#workAccordion .workaccordion-item').length + 1;

            var newWorkAccordion = `
                <div class="accordion-item workaccordion-item" id="workEntry${workEntryCount}">
                    <h2 class="accordion-header" id="workHeading${workEntryCount}">
                        <button class="accordion-button" type="button" data-toggle="collapse" data-target="#workCollapse${workEntryCount}" aria-expanded="false" aria-controls="workCollapse${workEntryCount}">
                            Work Experience Entry ${workEntryCount}
                        </button>
                    </h2>
                    <div id="workCollapse${workEntryCount}" class="collapse" aria-labelledby="workHeading${workEntryCount}">
                        <div class="row accordion-body">
                            <div class="col-lg-5">
                                <div class="row mb-2">
                                    <div class="col-lg-11 spacing-right">
                                        Organization Name <br>  <input class="form-control" name="org_name[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-7 spacing-right">
                                        Email of the Company<br>  <input class="form-control" name="email_oc[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                    POC <br>  <input class="form-control" type="text" name="poc[]" placeholder="..." style="width: 100%;">
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Job Experience Certificate <br>  <input class="form-control" name="jec[]" type="file" placeholder="..." style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Attachements  <br>  <input class="form-control" name="jec_attach[]" type="file" placeholder="..." style="width: 100%;">
                                </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Designation <br>  <input class="form-control" name="w_desig[]" type="text" placeholder="..." style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Salary  <br>  <input class="form-control" name="w_salary[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-4 spacing-left">
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                        Service Tenure <br>  <input class="form-control" name="ser_tenure[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-right spacing-left">
                                        Others <br>  <input class="form-control" type="file" name="ser_other[]" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-11 spacing-right">
                                        Inservice Awards /Achivements <br>  <input class="form-control" name="achivement[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Joining Date <br>  <input class="form-control" type="date" name="join_date[]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right spacing-left">
                                    End Date <br>  <input class="form-control" type="date" name="end_date[]" placeholder="..." style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-5 spacing-right" style="margin-top:10px;">
                                    Total Experience <br>  <input class="form-control" type="text" name="t_exp[]" placeholder="" style="width: 100%;" multiple>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeWorkAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px; width: 20%; float: right;">Remove</button>
                    </div>
                </div>
            `;

            $('#workAccordion').append(newWorkAccordion);
        });

        // Remove Work Experience Entry Button Click Event
        $(document).on('click', '.removeWorkAccordion', function () {
            $(this).closest('.workaccordion-item').remove();
            // Update the work summary table
            updateWorkSummaryTable();
        });

        // Update Work Table Button Click Event
        $('#updateWorkTable').on('click', function () {
            // Update the work summary table
            updateWorkSummaryTable();
        });

        // View Work Button Click Event
        $(document).on('click', '.view-work-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.workaccordion-item').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Prevent the default behavior of the Add More Work button
        $('#addWorkAccordion').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>



<script>
    const sameAsTempCheckbox = document.getElementById('sameAsTemp');
    const permanentAddressInputs = document.querySelectorAll('[name^="p_"]');
    sameAsTempCheckbox.addEventListener('change', function () {
        if (this.checked) {
            permanentAddressInputs.forEach(input => {
                const temporaryInputName = input.name.replace('p_', 't_');
                const temporaryInput = document.querySelector(`[name="${temporaryInputName}"]`);
                if (temporaryInput) {
                    if (input.type === 'date') {
                        if (input.name === 'p_residing') {
                            // Handle the p_residing date field
                            input.value = temporaryInput.value;
                        }
                    } else {
                        input.value = temporaryInput.value;
                    }
                }
            });
        } else {
            permanentAddressInputs.forEach(input => {
                input.value = '';
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = '{{ session("success") }}';
        var hrmId = '{{ session("hrmId") }}';

        if (successMessage && hrmId) {
            var url = '{{ route("viewhrm", ":id") }}';
            url = url.replace(':id', hrmId);
            var popupMessage = 'HRM data stored successfully. Please find the URL below:';

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




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<!-- Include jQuery (required for Select2) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize Select2 on the select element with class 'customer-name'
        $('#customer_name').select2({
            placeholder: "Search Client",
            allowClear: true,
            width: '100%' // Adjust the width as needed
        });

        // Handle change event to update the client_id field
        $('#customer_name').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            var clientId = selectedOption.data('id');

            // Update the client_id input field
            $('#client_id').val(clientId);
        });
    });
    </script>
