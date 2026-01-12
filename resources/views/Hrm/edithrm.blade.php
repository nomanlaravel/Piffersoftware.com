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
    <div class="row">
      <form action="{{ route('update_hrm', ['id' => $hrms->id]) }}" method="POST" enctype="multipart/form-data">
        @php
        if(!function_exists('getFilePreview')) {
        function getFilePreview($filePath) {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
        return '<img src="' . asset($filePath) . '" width="100px" height="100px">';
        } elseif ($extension === 'pdf') {
        return '<img src="https://img.icons8.com/color/48/000000/pdf.png" width="100px" height="100px">';
        } elseif (in_array($extension, ['xlsx', 'xls'])) {
        return '<img src="https://img.icons8.com/color/48/000000/ms-excel.png" width="100px" height="100px">';
        } elseif (in_array($extension, ['zip', 'rar'])) {
        return '<img src="https://img.icons8.com/color/48/000000/zip.png" width="100px" height="100px">';
        } else {
        return '<p>File Preview Not Available</p>';
        }
        }
        }
        @endphp
        @csrf
        @method('PUT')
        <div class="row">

          <div class="row mb-2" style="margin-left: 20px;">
            <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
              <h5>Employee Activation Status</h5>

              <div class="form-check form-check-inline" style="margin-right: 90px;">
                <input class="form-check-input mr-2" type="radio" name="activation" value="1" {{ $hrms->activation == '1' ? 'checked' : '' }} id="activeRadio">
                <label class="form-check-label" for="activeRadio">Active</label>

                <input class="form-check-input ml-3 mr-2" type="radio" name="activation" {{ $hrms->activation == '0' ? 'checked' : '' }} value="0"
                  id="inactiveRadio">
                <label class="form-check-label" for="inactiveRadio">Inactive</label>
              </div>
            </div>
          </div>

        </div>
        <div class="tab-content" id="">
          <div class="row fw-semibold">
            <div class="modal-header border-0">
              <div style="display:flex; column-gap:10px; align-items:center">
                <button type="button" class="btn btn-link" onclick="history.back()">
                  <i class="bi bi-arrow-left"></i>
                </button>
                <h5 class="mt-3" style="font-weight: 700;"> Security Staff: </h5>
              </div>
            </div>
            <!--<h5>Security Staff</h5>-->

            <div class="col-lg-6">
              <div class="row mb-2">
                <div class="col-md-12">
                  <label>Name</label>
                  <input class="form-control" name="name" value="{{ $hrms->name }}" type="text" placeholder="...">
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-md-6">
                  <label>Father's Name</label>
                  <input class="form-control" name="fname" value="{{ $hrms->fname }}" type="text" placeholder="...">
                </div>
                <div class="col-md-6">
                  <label>CNIC</label>
                  <input class="form-control" type="text" name="cnic" value="{{ $hrms->cnic }}" placeholder="XXXXX-XXXXXXX-X">
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-md-6">
                  <label>Employee No</label>
                  <input class="form-control" type="text" value="{{ $hrms->employee_no }}" name="employee_no" placeholder="...">
                </div>
                <div class="col-md-6">
                  <label>Cell Phone (official)</label>
                  <input class="form-control" name="cell" value="{{ $hrms->cell }}" type="text" placeholder="...">
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-md-6">
                  <label>Bank Name</label>
                  <input class="form-control" type="text" name="bank" value="{{ $hrms->bank }}" placeholder="...">
                </div>
                <div class="col-md-6">
                  <label>Account Title</label>
                  <input class="form-control" type="text" name="account_title" value="{{ $hrms->account_title }}" placeholder="...">
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-md-12">
                  <label>Bank Account</label>
                  <input class="form-control" name="bank_account" value="{{ $hrms->bank_account }}" type="text" placeholder="...">
                </div>
              </div>
              <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                  Client ID <br>
                  <input type="text" id="client_id" class="form-control mt-1" name="client_id" value="{{ $hrms->client_id }}" readonly>
                </div>
                <div class="col-lg-6 spacing-left">
                  Client Name <br>
                  <select id="customer_name" class="form-control mt-1" name="client_name">
                    <option value="">Select a client</option>
                    @foreach ($customers as $customer)
                    <option value="{{ $customer->customers_name }}" {{ $hrms->client_name == $customer->customers_name ? 'selected' : '' }}
                      data-id="{{ $customer->customers_id }}">
                      {{ $customer->customers_name }}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div>

            </div>
            <div class="col-lg-6">
              <div class="row mb-2">
                <div class="col-md-6">
                  <label>Photograph</label>
                  <input class="form-control" name="photo" id="inpFile42" type="file">
                  <div class="file-preview mt-2"
                    data-files="{{ json_encode(is_array(json_decode($hrms->photo, true)) ? json_decode($hrms->photo, true) : [$hrms->photo]) }}"
                    data-extension="{{ is_array(json_decode($hrms->photo, true)) ? pathinfo(json_decode($hrms->photo, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->photo, PATHINFO_EXTENSION) }}"
                    onclick="openFileModal(this, 0)">
                    {!! is_array(json_decode($hrms->photo, true)) ? getFilePreview(json_decode($hrms->photo, true)[0]) : getFilePreview($hrms->photo) !!}
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Category</label>
                  <input type="text" class="form-control" name="category" value="{{ $hrms->category }}" placeholder="...">
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-md-4">
                  <label>Rank</label>
                  <input class="form-control" value="{{ $hrms->rank }}" type="text" name="rank" placeholder="...">
                </div>
                <div class="col-md-4">
                  <label>Designation</label>
                  <input class="form-control" name="designation" value="{{ $hrms->designation }}" type="text" placeholder="...">
                </div>
                <div class="col-md-4">
                  <label>Unit</label>
                  <input class="form-control" name="unit" value="{{ $hrms->unit }}" type="text" placeholder="...">
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-md-12">
                  <label>Hired At</label>
                  <input type="text" name="hired_at" value="{{ $hrms->hired_at }}" class="form-control" placeholder="...">
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-md-6">
                  <label>Region</label>
                  <input class="form-control" type="text" name="hrm_region" value="{{ $hrms->hrm_region }}" placeholder="...">
                </div>
                <div class="col-md-6">
                  <label>Location</label>
                  <input class="form-control" name="hrm_location" value="{{ $hrms->hrm_location }}" type="text" placeholder="...">
                </div>
              </div>
            </div>
          </div>

        </div>
        <nav>
          <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#basic-info" role="tab" aria-controls="nav-home"
              aria-selected="true">Basic Info</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#address-details" role="tab" aria-controls="nav-profile"
              aria-selected="false">Address Details</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#verifications" role="tab" aria-controls="nav-contact"
              aria-selected="false">Verifications</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#education" role="tab" aria-controls="nav-profile"
              aria-selected="false">Education , Health & Work Experience</a>
            <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#compliances" role="tab" aria-controls="nav-home"
              aria-selected="true">Compliances</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#inventory-bin-card" role="tab" aria-controls="nav-profile"
              aria-selected="false">Inventory Record Card</a>
            <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#security" role="tab" aria-controls="nav-home" aria-selected="true">Security
              Guard License</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#training-details" role="tab" aria-controls="nav-contact"
              aria-selected="false">Training Details</a>
            <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#payroll" role="tab" aria-controls="nav-home"
              aria-selected="true">Payroll</a>
            <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#inspection" role="tab" aria-controls="nav-home" aria-selected="true">Site
              Inspection</a>
            <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#observation" role="tab" aria-controls="nav-home"
              aria-selected="true">Observation and Appraisal</a>
          </div>
        </nav>
        <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
          <!--Basic Info-->
          <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="basic-info" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
              <div class="col-lg-6 spacing-right">
                <div class="row mb-2">
                  <div class="col-lg-4 spacing-right">
                    Date of Birth <br> <input class="form-control" type="date" name="dob" value="{{ $hrms->dob }}" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-left spacing-right">
                    Religion <br> <input class="form-control" type="text" name="religion" value="{{ $hrms->religion }}" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-3 spacing-left">
                    Caste <br> <input class="form-control" type="text" name="caste" value="{{ $hrms->caste }}" placeholder="..." style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-3 spacing-right">
                    Gender <br><input class="form-control" name="gender" value="{{ $hrms->gender }}" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-right">
                    Cell No (personal) <br> <input class="form-control" name="p_cell" value="{{ $hrms->p_cell }}" type="text" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-left ">
                    Emergency Contact No <br> <input class="form-control" type="text" value="{{ $hrms->e_cell }}" name="e_cell" placeholder="..."
                      style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-lg-5 ">
                    Blood Group <br> <input class="form-control" type="text" name="blood" value="{{ $hrms->blood }}" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6">
                    Email <br> <input class="form-control" type="text" name="email" value="{{ $hrms->email }}" placeholder="..." style="width: 100%;">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 spacing-right">
                    CNIC Picture (front) <br> <input class="form-control" id="inpFile1" type="file" value="{{ $hrms->cnic_front }}" name="cnic_front"
                      placeholder="..." style="width: 100%;" multiple>
                    <div class="col-lg-5 spacing-right">
                      <!-- Image Preview Biometric -->
                      <div class="file-preview" style="cursor: pointer;"
                        data-files="{{ json_encode(is_array(json_decode($hrms->cnic_front, true)) ? json_decode($hrms->cnic_front, true) : [$hrms->cnic_front]) }}"
                        data-extension="{{ is_array(json_decode($hrms->cnic_front, true)) ? pathinfo(json_decode($hrms->cnic_front, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->cnic_front, PATHINFO_EXTENSION) }}"
                        onclick="openFileModal(this, 0)">
                        {!! is_array(json_decode($hrms->cnic_front, true)) ? getFilePreview(json_decode($hrms->cnic_front, true)[0]) :
                        getFilePreview($hrms->cnic_front) !!}
                      </div>
                      <!--<div class="image-preview1" id="imagePreview1">-->
                      <!--    @if($hrms->cnic_front)-->
                      <!--    <img src="{{ asset($hrms->cnic_front) }}" alt="Image Preview1" class="image-preview__image1" style="height: 100%; width:100%; margin-left:-13px;">-->
                      <!--    @else-->
                      <!--    <span class="image-preview__default-text1">Image Preview</span>-->
                      <!--    @endif-->
                      <!--</div>-->
                    </div>

                  </div>

                  <div class="col-lg-4 spacing-right spacing-left">
                    CNIC Picture (back) <br> <input class="form-control basic-info-attachements" id="inpFile12" type="file" value="{{ $hrms->cnic_back }}"
                      name="cnic_back" placeholder="..." style="width: 100%;" multiple>
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->cnic_back, true)) ? json_decode($hrms->cnic_back, true) : [$hrms->cnic_back]) }}"
                      data-extension="{{ is_array(json_decode($hrms->cnic_back, true)) ? pathinfo(json_decode($hrms->cnic_back, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->cnic_back, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->cnic_back, true)) ? getFilePreview(json_decode($hrms->cnic_back, true)[0]) :
                      getFilePreview($hrms->cnic_back) !!}
                    </div>
                    <!--<div class="image-preview12" id="imagePreview12">-->
                    <!--    @if($hrms->cnic_back)-->
                    <!--    <img src="{{ asset($hrms->cnic_back) }}" alt="Image Preview12" class="image-preview__image12" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text12">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                  <div class="col-lg-3 spacing-left">
                    Attachments <br>
                    <input class="form-control basic-info-attachements" id="inpFile3" type="file" name="f_attach[]" placeholder="..." style="width: 100%;"
                      multiple>
                  </div>
                  <div class="row">
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->f_attach, true)) ? json_decode($hrms->f_attach, true) : [$hrms->f_attach]) }}"
                      data-extension="{{ is_array(json_decode($hrms->f_attach, true)) ? pathinfo(json_decode($hrms->f_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->f_attach, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->f_attach, true)) ? getFilePreview(json_decode($hrms->f_attach, true)[0]) : getFilePreview($hrms->f_attach)
                      !!}
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

                  </div>
                  <div class="col-lg-3 spacing-left" style="margin-left: 45px;">

                  </div>
                </div>

              </div>
              <div class="col-lg-6 spacing-left">
                <div class="row mb-2">
                  <div class="col-lg-3 spacing-right">
                    Marital Status <br> <input class="form-control" type="text" name="m_status" value="{{ $hrms->m_status }}" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-2 spacing-left spacing-right">
                    No. of kids <br> <input class="form-control" type="text" name="no_of_kids" value="{{ $hrms->no_of_kids }}" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-2 spacing-left spacing-right">
                    Male Kids <br> <input class="form-control" type="text" name="m_kids" value="{{ $hrms->m_kids }}" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-3 spacing-left">
                    Female Kids <br> <input class="form-control" type="text" name="f_kids" value="{{ $hrms->f_kids }}" placeholder="..." style="width: 100%;">
                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                    CNIC Issue date <br> <input class="form-control" name="cnic_issue" type="date" value="{{ $hrms->cnic_issue }}" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left">
                    CNIC Expiry Date <br> <input class="form-control" type="date" name="cnic_expire" value="{{ $hrms->cnic_expire }}" placeholder="..."
                      style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                    Notes <br>
                    <textarea id="w3review" class="form-control" name="notes" rows="4" cols="53">{{ $hrms->notes }}</textarea>
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
                    Address <br> <input class="form-control" name="t_address" value="{{ $hrms->t_address }}" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-3 spacing-left">
                    Area <br> <input class="form-control" type="text" value="{{ $hrms->t_area }}" name="t_area" placeholder="..." style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                    City <br> <input class="form-control" type="text" value="{{ $hrms->t_city }}" name="t_city" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-3 spacing-left spacing-right">
                    Police Station <br> <input class="form-control" value="{{ $hrms->t_police }}" name="t_police" type="text" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-3 spacing-left">
                    District <br> <input class="form-control" value="{{ $hrms->t_district }}" name="t_district" type="text" placeholder="..."
                      style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-4 spacing-right">
                    Post Office <br> <input class="form-control" name="t_post" value="{{ $hrms->t_post }}" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-left spacing-right">
                    Tehsil <br> <input class="form-control" type="text" value="{{ $hrms->t_tehsil }}" name="t_tehsil" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-3 spacing-left">
                    Province <br> <input class="form-control" type="text" value="{{ $hrms->t_province }}" name="t_province" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-right">
                    Postal Code <br> <input class="form-control" name="t_postal" value="{{ $hrms->t_postal }}" type="text" placeholder="..."
                      style="width: 100%;">
                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                    Residing Since <br> <input class="form-control" name="t_residing" value="{{ $hrms->t_residing }}" type="date" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left">
                    GPS Location <br> <input class="form-control" name="t_gps" value="{{ $hrms->t_gps }}" type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-lg-4 spacing-right">
                    Attachements <br> <input class="form-control" name="t_attach" type="file" placeholder="..." style="width: 100%;" multiple>
                  </div>
                  <div class="row">
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->t_attach, true)) ? json_decode($hrms->t_attach, true) : [$hrms->t_attach]) }}"
                      data-extension="{{ is_array(json_decode($hrms->t_attach, true)) ? pathinfo(json_decode($hrms->t_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->t_attach, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->t_attach, true)) ? getFilePreview(json_decode($hrms->t_attach, true)[0]) : getFilePreview($hrms->t_attach)
                      !!}
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
                    Notes <br> <textarea id="w3review" class="form-control" name="t_note" rows="4" cols="37">{{ $hrms->t_note }}
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
                        Address <br> <input class="form-control" type="text" value="{{ $hrms->p_address }}" name="p_address" placeholder="..."
                          style="width: 100%;">
                      </div>
                      <div class="col-lg-3 spacing-left">
                        Area <br> <input class="form-control" type="text" value="{{ $hrms->p_area }}" name="p_area" placeholder="..." style="width: 100%;">
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-lg-5 spacing-right">
                        City <br> <input class="form-control" name="p_city" value="{{ $hrms->p_city }}" type="text" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-3 spacing-left spacing-right">
                        Police Station <br> <input class="form-control" value="{{ $hrms->p_police }}" name="p_police" type="text" placeholder="..."
                          style="width: 100%;">
                      </div>
                      <div class="col-lg-3 spacing-left">
                        District <br> <input class="form-control" value="{{ $hrms->p_district }}" name="p_district" type="text" placeholder="..."
                          style="width: 100%;">
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-lg-4 spacing-right">
                        Post Office <br> <input class="form-control" name="p_post" value="{{ $hrms->p_post }}" type="text" placeholder="..."
                          style="width: 100%;">
                      </div>
                      <div class="col-lg-4 spacing-left spacing-right">
                        Tehsil <br> <input class="form-control" name="p_tehsil" value="{{ $hrms->p_tehsil }}" type="text" placeholder="..."
                          style="width: 100%;">
                      </div>
                      <div class="col-lg-3 spacing-left">
                        Province <br> <input class="form-control" name="p_province" value="{{ $hrms->p_province }}" type="text" placeholder="..."
                          style="width: 100%;">
                      </div>
                      <div class="col-lg-4 spacing-right">
                        Postal Code <br> <input class="form-control" name="p_postal" value="{{ $hrms->p_postal }}" type="text" placeholder="..."
                          style="width: 100%;">
                      </div>
                    </div>

                    <div class="row mb-2">
                      <div class="col-lg-5 spacing-right">
                        Residing Since <br> <input class="form-control" name="p_residing" value="{{ $hrms->p_residing }}" type="date" placeholder="..."
                          style="width: 100%;">
                      </div>
                      <div class="col-lg-6 spacing-left">
                        GPS Location <br> <input class="form-control" name="p_gps" value="{{ $hrms->p_gps }}" type="text" placeholder="..."
                          style="width: 100%;">
                      </div>
                    </div>

                    <div class="row mb-2">
                      <div class="col-lg-4 spacing-right">
                        Attachements <br> <input class="form-control" type="file" name="p_attach" placeholder="..." style="width: 100%;" multiple>
                      </div>
                      <div class="row">
                        <div class="file-preview" style="cursor: pointer;"
                          data-files="{{ json_encode(is_array(json_decode($hrms->p_attach, true)) ? json_decode($hrms->p_attach, true) : [$hrms->p_attach]) }}"
                          data-extension="{{ is_array(json_decode($hrms->p_attach, true)) ? pathinfo(json_decode($hrms->p_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->p_attach, PATHINFO_EXTENSION) }}"
                          onclick="openFileModal(this, 0)">
                          {!! is_array(json_decode($hrms->p_attach, true)) ? getFilePreview(json_decode($hrms->p_attach, true)[0]) :
                          getFilePreview($hrms->p_attach) !!}
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
                        Notes <br> <textarea id="w3review" class="form-control" name="p_note" name="w3review" rows="4" cols="37">{{ $hrms->p_note }}
                        </textarea>
                      </div>
                    </div>
                    <!--<h5>Next of Kin</h5>-->
                    <div class="row mt-2">
                      <!--<div class="row mb-2">-->
                      <!--    <div class="col-lg-5 spacing-right">-->
                      <!--        Name <br>  <input class="form-control" name="nok_name" value="{{ $hrms->nok_name }}" type="text" placeholder="..." style="width: 100%;">-->
                      <!--    </div>-->
                      <!--    <div class="col-lg-5 spacing-right ">-->
                      <!--        CNIC <br>  <input class="form-control" name="nok_cnic" value="{{ $hrms->nok_cnic }}" type="text" placeholder="..." style="width: 100%;">-->
                      <!--    </div>-->
                      <!--</div>-->
                    </div>
                    <!--<div class="row mb-2">-->
                    <!--    <div class="col-lg-5 spacing-right">-->
                    <!--    Father Name <br>  <input class="form-control" name="nok_fname" value="{{ $hrms->nok_fname }}" type="text" placeholder="..." style="width: 100%;">-->
                    <!--    </div>-->
                    <!--    <div class="col-lg-5 spacing-left spacing-right">-->
                    <!--        Relationship <br>  <input class="form-control" name="nok_relation" value="{{ $hrms->nok_relation }}" type="text" placeholder="..." style="width: 100%;">-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="row mb-2">-->
                    <!--    <div class="col-lg-5 spacing-right">-->
                    <!--        Death Certification <br>  <input class="form-control" name="nok_death" value="{{ $hrms->nok_death }}" type="text" placeholder="..." style="width: 100%;">-->
                    <!--    </div>-->
                    <!--    <div class="col-lg-5 spacing-left spacing-right">-->
                    <!--        FRC (Family Registration Certificate) <br> <input class="form-control" name="nok_frc" value="{{ $hrms->nok_frc }}" type="text" placeholder="..." style="width: 100%;">-->
                    <!--    </div>-->
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
                  <div class="col-lg-11 ">
                    Hiring Form <br> <input class="form-control" id="inpFile13" name="h_verify" type="file" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->h_verify, true)) ? json_decode($hrms->h_verify, true) : [$hrms->h_verify]) }}"
                      data-extension="{{ is_array(json_decode($hrms->h_verify, true)) ? pathinfo(json_decode($hrms->h_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->h_verify, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->h_verify, true)) ? getFilePreview(json_decode($hrms->h_verify, true)[0]) : getFilePreview($hrms->h_verify)
                      !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->h_verify)-->
                    <!--    <img src="{{ asset($hrms->h_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11 ">
                    Biometric Verification <br> <input class="form-control" id="inpFile14" name="b_verify" type="file" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->b_verify, true)) ? json_decode($hrms->b_verify, true) : [$hrms->b_verify]) }}"
                      data-extension="{{ is_array(json_decode($hrms->b_verify, true)) ? pathinfo(json_decode($hrms->b_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->b_verify, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->b_verify, true)) ? getFilePreview(json_decode($hrms->b_verify, true)[0]) : getFilePreview($hrms->b_verify)
                      !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->b_verify)-->
                    <!--    <img src="{{ asset($hrms->b_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11" style="margin-top: 17px;">
                    Postal Verification <br> <input class="form-control" id="inpFile15" type="file" name="p_verify" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->p_verify, true)) ? json_decode($hrms->p_verify, true) : [$hrms->p_verify]) }}"
                      data-extension="{{ is_array(json_decode($hrms->p_verify, true)) ? pathinfo(json_decode($hrms->p_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->p_verify, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->p_verify, true)) ? getFilePreview(json_decode($hrms->p_verify, true)[0]) : getFilePreview($hrms->p_verify)
                      !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->p_verify)-->
                    <!--    <img src="{{ asset($hrms->p_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11 ">
                    Discharge Book/Experience Certificate <br> <input class="form-control" id="inpFile16" name="d_book" type="file" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->d_book, true)) ? json_decode($hrms->d_book, true) : [$hrms->d_book]) }}"
                      data-extension="{{ is_array(json_decode($hrms->d_book, true)) ? pathinfo(json_decode($hrms->d_book, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->d_book, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->d_book, true)) ? getFilePreview(json_decode($hrms->d_book, true)[0]) : getFilePreview($hrms->d_book) !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->d_book)-->
                    <!--    <img src="{{ asset($hrms->d_book) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11" style="margin-top: 10px;">
                    Vote Verification <br> <input class="form-control" type="file" id="inpFile17" name="v_verify" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->v_verify, true)) ? json_decode($hrms->v_verify, true) : [$hrms->v_verify]) }}"
                      data-extension="{{ is_array(json_decode($hrms->v_verify, true)) ? pathinfo(json_decode($hrms->v_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->v_verify, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->v_verify, true)) ? getFilePreview(json_decode($hrms->v_verify, true)[0]) : getFilePreview($hrms->v_verify)
                      !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->v_verify)-->
                    <!--    <img src="{{ asset($hrms->v_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11" style="margin-top: 10px;">
                    Copy of last Utility Bill <br> <input class="form-control" id="inpFile18" name="copy_bill" type="file" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->copy_bill, true)) ? json_decode($hrms->copy_bill, true) : [$hrms->copy_bill]) }}"
                      data-extension="{{ is_array(json_decode($hrms->copy_bill, true)) ? pathinfo(json_decode($hrms->copy_bill, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->copy_bill, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->copy_bill, true)) ? getFilePreview(json_decode($hrms->copy_bill, true)[0]) :
                      getFilePreview($hrms->copy_bill) !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->copy_bill)-->
                    <!--    <img src="{{ asset($hrms->copy_bill) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11" style="margin-top: 10px;">
                    NADRA Verification <br> <input class="form-control" id="inpFile19" type="file" name="n_verify" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->n_verify, true)) ? json_decode($hrms->n_verify, true) : [$hrms->n_verify]) }}"
                      data-extension="{{ is_array(json_decode($hrms->n_verify, true)) ? pathinfo(json_decode($hrms->n_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->n_verify, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->n_verify, true)) ? getFilePreview(json_decode($hrms->n_verify, true)[0]) : getFilePreview($hrms->n_verify)
                      !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->n_verify)-->
                    <!--    <img src="{{ asset($hrms->n_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11" style="margin-top: 10px;">
                    EVS Verification <br> <input class="form-control" type="file" id="inpFile20" name="insurrance" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->insurrance, true)) ? json_decode($hrms->insurrance, true) : [$hrms->insurrance]) }}"
                      data-extension="{{ is_array(json_decode($hrms->insurrance, true)) ? pathinfo(json_decode($hrms->insurrance, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->insurrance, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->insurrance, true)) ? getFilePreview(json_decode($hrms->insurrance, true)[0]) :
                      getFilePreview($hrms->insurrance) !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->insurrance)-->
                    <!--    <img src="{{ asset($hrms->insurrance) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11" style="margin-top: 10px;">
                    Guard Bank Account <br> <input class="form-control" id="inpFile21" type="file" name="guard_bank" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->guard_bank, true)) ? json_decode($hrms->guard_bank, true) : [$hrms->guard_bank]) }}"
                      data-extension="{{ is_array(json_decode($hrms->guard_bank, true)) ? pathinfo(json_decode($hrms->guard_bank, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->guard_bank, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->guard_bank, true)) ? getFilePreview(json_decode($hrms->guard_bank, true)[0]) :
                      getFilePreview($hrms->guard_bank) !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->guard_bank)-->
                    <!--    <img src="{{ asset($hrms->guard_bank) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11" style="margin-top: 10px;">
                    Bio Metric Record <br> <input class="form-control" id="inpFile22" type="file" name="bio_verify" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->bio_verify, true)) ? json_decode($hrms->bio_verify, true) : [$hrms->bio_verify]) }}"
                      data-extension="{{ is_array(json_decode($hrms->bio_verify, true)) ? pathinfo(json_decode($hrms->bio_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->bio_verify, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->bio_verify, true)) ? getFilePreview(json_decode($hrms->bio_verify, true)[0]) :
                      getFilePreview($hrms->bio_verify) !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->bio_verify)-->
                    <!--    <img src="{{ asset($hrms->bio_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11" style="margin-top: 10px;">
                    Covid 19 Vaccination <br> <input class="form-control" id="inpFile23" type="file" name="c_verify" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->c_verify, true)) ? json_decode($hrms->c_verify, true) : [$hrms->c_verify]) }}"
                      data-extension="{{ is_array(json_decode($hrms->c_verify, true)) ? pathinfo(json_decode($hrms->c_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->c_verify, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->c_verify, true)) ? getFilePreview(json_decode($hrms->c_verify, true)[0]) : getFilePreview($hrms->c_verify)
                      !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->c_verify)-->
                    <!--    <img src="{{ asset($hrms->c_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-lg-11" style="margin-top: 10px;">
                    DPO Verification <br> <input class="form-control" id="inpFile24" name="dpo_verify" type="file" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->dpo_verify, true)) ? json_decode($hrms->dpo_verify, true) : [$hrms->dpo_verify]) }}"
                      data-extension="{{ is_array(json_decode($hrms->dpo_verify, true)) ? pathinfo(json_decode($hrms->dpo_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->dpo_verify, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->dpo_verify, true)) ? getFilePreview(json_decode($hrms->dpo_verify, true)[0]) :
                      getFilePreview($hrms->dpo_verify) !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->dpo_verify)-->
                    <!--    <img src="{{ asset($hrms->dpo_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11">
                    DPO Form Sent <input class="form-control" value="{{ $hrms->form_send }}" name="form_send" type="text" placeholder="..."
                      style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11">
                    DPO Form Sent on <br> <input class="form-control" name="sent_on" value="{{ $hrms->sent_on }}" type="text" placeholder="..."
                      style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11" style="margin-top: 10px;">
                    DPO Form Sent <br> <input class="form-control" id="inpFile24" name="form_attach" type="file" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->form_attach, true)) ? json_decode($hrms->form_attach, true) : [$hrms->form_attach]) }}"
                      data-extension="{{ is_array(json_decode($hrms->form_attach, true)) ? pathinfo(json_decode($hrms->form_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->form_attach, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->form_attach, true)) ? getFilePreview(json_decode($hrms->form_attach, true)[0]) :
                      getFilePreview($hrms->form_attach) !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->form_attach)-->
                    <!--    <img src="{{ asset($hrms->form_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11">
                    DPO Form Received <br><input class="form-control" type="text" name="form_rec" value="{{ $hrms->form_rec }}" placeholder="..."
                      style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11">
                    DPO Form Received on <br> <input class="form-control" name="rec_on" value="{{ $hrms->rec_on }}" type="date" placeholder="..."
                      style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-11" style="margin-top: 10px;">
                    DPO Form Received <br> <input class="form-control" id="inpFile24" name="rec_attach" type="file" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->rec_attach, true)) ? json_decode($hrms->rec_attach, true) : [$hrms->rec_attach]) }}"
                      data-extension="{{ is_array(json_decode($hrms->rec_attach, true)) ? pathinfo(json_decode($hrms->rec_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->rec_attach, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->rec_attach, true)) ? getFilePreview(json_decode($hrms->rec_attach, true)[0]) :
                      getFilePreview($hrms->rec_attach) !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->rec_attach)-->
                    <!--    <img src="{{ asset($hrms->rec_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-lg-11" style="margin-top: 10px;">
                    8300 Verification <br> <input class="form-control" id="inpFile25" type="file" name="eight_verify" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->eight_verify, true)) ? json_decode($hrms->eight_verify, true) : [$hrms->eight_verify]) }}"
                      data-extension="{{ is_array(json_decode($hrms->eight_verify, true)) ? pathinfo(json_decode($hrms->eight_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->eight_verify, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->eight_verify, true)) ? getFilePreview(json_decode($hrms->eight_verify, true)[0]) :
                      getFilePreview($hrms->eight_verify) !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->eight_verify)-->
                    <!--    <img src="{{ asset($hrms->eight_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-lg-11" style="margin-top: 10px;">
                    E Sahulat Verification <br> <input class="form-control" id="inpFile26" type="file" name="sahulat_v" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->sahulat_v, true)) ? json_decode($hrms->sahulat_v, true) : [$hrms->sahulat_v]) }}"
                      data-extension="{{ is_array(json_decode($hrms->sahulat_v, true)) ? pathinfo(json_decode($hrms->sahulat_v, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->sahulat_v, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->sahulat_v, true)) ? getFilePreview(json_decode($hrms->sahulat_v, true)[0]) :
                      getFilePreview($hrms->sahulat_v) !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->sahulat_v)-->
                    <!--    <img src="{{ asset($hrms->sahulat_v) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>
              </div>
                <div class="col-lg-6">
                    <div class="row mb-2">
                    <div class="col-lg-6 spacing-right">
                        {{-- Look Back Date --}}
                        Look Back Date<br> <input class="form-control" name="look_back1" value="{{ $hrms->look_back1 }}" type="date" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-6 spacing-right">
                        {{-- Frequency --}}
                        Look Back Frequency <br> <input class="form-control" name="frequency1" value="{{ $hrms->frequency1 }}" type="text" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-12 spacing-right">
                        Notes <br> <textarea class="form-control" name="notes1" type="text" placeholder="..." style="width: 100%;">{{ $hrms->notes1 }}</textarea>
                    </div>
                    </div>
                    <div class="row mb-2">
                    <div class="col-lg-6 spacing-right">
                        Look Back Date <br> <input class="form-control" name="look_back2" value="{{ $hrms->look_back2 }}" type="date" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Look Back Frequency <br> <input class="form-control" name="frequency2" value="{{ $hrms->frequency2 }}" type="text" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-12 spacing-right">
                        Notes <br> <textarea class="form-control" name="notes2" type="text" placeholder="..." style="width: 100%;">{{ $hrms->notes2 }}</textarea>
                    </div>
                    </div>
                    <div class="row mb-2">
                    <div class="col-lg-6 spacing-right">
                        Look Back Date <br> <input class="form-control" name="look_back3" value="{{ $hrms->look_back3 }}" type="date" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Look Back Frequency <br> <input class="form-control" name="frequency3" value="{{ $hrms->frequency3 }}" type="text" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-12 spacing-right">
                        Notes <br> <textarea class="form-control" name="notes3" type="text" placeholder="..." style="width: 100%;">{{ $hrms->notes3 }}</textarea>
                    </div>
                    </div>
                    <div class="row mb-2">
                    <div class="col-lg-6 spacing-right">
                        Look Back Date <br> <input class="form-control" name="look_back4" value="{{ $hrms->look_back4 }}" type="date" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Look Back Frequency <br> <input class="form-control" name="frequency4" value="{{ $hrms->frequency4 }}" type="text" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-12 spacing-right">
                        Notes <br> <textarea class="form-control" name="notes4" type="text" placeholder="..." style="width: 100%;">{{ $hrms->notes4 }}</textarea>
                    </div>
                    </div>
                    <div class="row mb-2" style="margin-top:10px;">
                    <div class="col-lg-6 spacing-right">
                        Look Back Date <br> <input class="form-control" name="look_back5" value="{{ $hrms->look_back5 }}" type="date" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Look Back Frequency <br> <input class="form-control" name="frequency5" value="{{ $hrms->frequency5 }}" type="text" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-12 spacing-right">
                        Notes <br> <textarea class="form-control" name="notes5" type="text" placeholder="..." style="width: 100%;">{{ $hrms->notes5 }}</textarea>
                    </div>
                    </div>
                    <div class="row mb-2" style="margin-top:10px;">
                    <div class="col-lg-6 spacing-right">
                        Look Back Date <br> <input class="form-control" name="look_back6" value="{{ $hrms->look_back6 }}" type="date" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Look Back Frequency <br> <input class="form-control" name="frequency6" value="{{ $hrms->frequency6 }}" type="text" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-12 spacing-right">
                        Notes <br> <textarea class="form-control" name="notes6" type="text" placeholder="..." style="width: 100%;">{{ $hrms->notes6 }}</textarea>
                    </div>
                    </div>
                    <div class="row mb-2" style="margin-top:10px;">
                    <div class="col-lg-6 spacing-right">
                        Look Back Date <br> <input class="form-control" name="look_back7" value="{{ $hrms->look_back7 }}" type="date" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Look Back Frequency <br> <input class="form-control" name="frequency7" value="{{ $hrms->frequency7 }}" type="text" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-12 spacing-right">
                        Notes <br> <textarea class="form-control" name="notes7" type="text" placeholder="..." style="width: 100%;">{{ $hrms->notes7 }}</textarea>
                    </div>
                    </div>
                    <div class="row mb-2" style="margin-top:10px;">
                    <div class="col-lg-6 spacing-right">
                        Look Back Date <br> <input class="form-control" name="look_back8" value="{{ $hrms->look_back8 }}" type="date" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Look Back Frequency <br> <input class="form-control" name="frequency8" value="{{ $hrms->frequency8 }}" type="text" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-12 spacing-right">
                        Notes <br> <textarea class="form-control" name="notes8" type="text" placeholder="..." style="width: 100%;">{{ $hrms->notes8 }}</textarea>
                    </div>
                    </div>
                    <div class="row mb-2" style="margin-top:10px;">
                    <div class="col-lg-6 spacing-right">
                        Look Back Date <br> <input class="form-control" name="look_back9" value="{{ $hrms->look_back9 }}" type="date" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Look Back Frequency <br> <input class="form-control" name="frequency9" value="{{ $hrms->frequency9 }}" type="text" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-12 spacing-right">
                        Notes <br> <textarea class="form-control" name="notes9" type="text" placeholder="..." style="width: 100%;">{{ $hrms->notes9 }}</textarea>
                    </div>
                    </div>
                    <div class="row mb-2" style="margin-top:10px;">
                    <div class="col-lg-6 spacing-right">
                        Look Back Date <br> <input class="form-control" name="look_back10" value="{{ $hrms->look_back10 }}" type="date" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Look Back Frequency <br> <input class="form-control" name="frequency10" value="{{ $hrms->frequency10 }}" type="text" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-12 spacing-right">
                        Notes <br> <textarea class="form-control" name="notes10" type="text" placeholder="..." style="width: 100%;">{{ $hrms->notes10 }}</textarea>
                    </div>
                    </div>
                    <div class="row mb-2" style="margin-top:10px;">
                    <div class="col-lg-6 spacing-right">
                        Look Back Date <br> <input class="form-control" name="look_back11" value="{{ $hrms->look_back11 }}" type="date" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Look Back Frequency <br> <input class="form-control" name="frequency11" value="{{ $hrms->frequency11 }}" type="text" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-12 spacing-right">
                        Notes <br> <textarea class="form-control" name="notes11" type="text" placeholder="..." style="width: 100%;">{{ $hrms->notes11 }}</textarea>
                    </div>
                    </div>
                    <div class="row mb-2" style="margin-top:10px;">
                    <div class="col-lg-6 spacing-right">
                        Look Back Date <br> <input class="form-control" name="look_back12" value="{{ $hrms->look_back12 }}" type="date" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Look Back Frequency <br> <input class="form-control" name="frequency12" value="{{ $hrms->frequency12 }}" type="text" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-12 spacing-right">
                        Notes <br> <textarea class="form-control" name="notes12" type="text" placeholder="..."
                        style="width: 100%;">value={{ $hrms->notes12 }}</textarea>
                    </div>
                    </div>
                    <div class="row mb-2" style="margin-top:10px;">
                    <div class="col-lg-6 spacing-right">
                        Look Back Date <br> <input class="form-control" name="look_back13" value="{{ $hrms->look_back13 }}" type="date" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Look Back Frequency <br> <input class="form-control" name="frequency13" value="{{ $hrms->frequency13 }}" type="text" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-12 spacing-right">
                        Notes <br> <textarea class="form-control" name="notes13" type="text" placeholder="..." style="width: 100%;">{{ $hrms->notes13 }}</textarea>
                    </div>
                    </div>
                    <div class="row mb-2" style="margin-top:10px;">
                    <div class="col-lg-6 spacing-right">
                        Look Back Date <br> <input class="form-control" name="look_back14" value="{{ $hrms->look_back14 }}" type="date" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Look Back Frequency <br> <input class="form-control" name="frequency14" value="{{ $hrms->frequency14 }}" type="text" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-12 spacing-right">
                        Notes <br> <textarea class="form-control" name="notes14" type="text" placeholder="..." style="width: 100%;">{{ $hrms->notes14 }}</textarea>
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
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#guarantorCollapse{{ $index }}" aria-expanded="true"
                    aria-controls="guarantorCollapse{{ $index }}">
                    Guarantor No. {{ $index + 1 }}
                  </button>
                </h2>
                <div id="guarantorCollapse{{ $index }}" class="accordion-collapse collapse show" aria-labelledby="guarantorHeading{{ $index }}"
                  data-bs-parent="#guarantorAccordion">
                  <div class="accordion-body">
                    <div class="row">
                      <div class="col-lg-6" style="margin-top: 28px;">
                        <input type="hidden" name="guarantors[{{ $index }}][g_id]" value="{{ $guarantor->id }}">
                        <div class="row mb-2">
                          <div class="col-lg-5 spacing-right">
                            Name <br> <input class="form-control" name="guarantors[{{ $index }}][g_name]" value="{{ $guarantor->g_name }}" type="text"
                              placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-6 spacing-left spacing-right">
                            Father Name <br> <input class="form-control" name="guarantors[{{ $index }}][g_fname]" value="{{ $guarantor->g_fname }}" type="text"
                              placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-6 spacing-right">
                            Relationship<br> <input class="form-control" type="text" value="{{ $guarantor->g_relation }}"
                              name="guarantors[{{ $index }}][g_relation]" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                            Tenure of Relation<br> <input class="form-control" type="text" value="{{ $guarantor->g_tenure_rel }}"
                              name="guarantors[{{ $index }}][g_tenure_rel]" placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-6 spacing-right">
                            CNIC (front) <br> <input class="form-control" type="file" value="{{ $guarantor->g_cnic_f }}"
                              name="guarantors[{{ $index }}][g_cnic_f]" placeholder="..." style="width: 100%;">
                            <div class="file-preview" style="cursor: pointer;"
                              data-files="{{ json_encode(is_array(json_decode($guarantor->g_cnic_f, true)) ? json_decode($guarantor->g_cnic_f, true) : [$guarantor->g_cnic_f]) }}"
                              data-extension="{{ is_array(json_decode($guarantor->g_cnic_f, true)) ? pathinfo(json_decode($guarantor->g_cnic_f, true)[0], PATHINFO_EXTENSION) : pathinfo($guarantor->g_cnic_f, PATHINFO_EXTENSION) }}"
                              onclick="openFileModal(this, 0)">
                              {!! is_array(json_decode($guarantor->g_cnic_f, true)) ? getFilePreview(json_decode($guarantor->g_cnic_f, true)[0]) :
                              getFilePreview($guarantor->g_cnic_f) !!}
                            </div>
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                            CNIC (back) <br> <input class="form-control" type="file" value="{{ $guarantor->g_cnic_b }}"
                              name="guarantors[{{ $index }}][g_cnic_b]" placeholder="..." style="width: 100%;">
                            <div class="file-preview" style="cursor: pointer;"
                              data-files="{{ json_encode(is_array(json_decode($guarantor->g_cnic_b, true)) ? json_decode($guarantor->g_cnic_b, true) : [$guarantor->g_cnic_b]) }}"
                              data-extension="{{ is_array(json_decode($guarantor->g_cnic_b, true)) ? pathinfo(json_decode($guarantor->g_cnic_b, true)[0], PATHINFO_EXTENSION) : pathinfo($guarantor->g_cnic_b, PATHINFO_EXTENSION) }}"
                              onclick="openFileModal(this, 0)">
                              {!! is_array(json_decode($guarantor->g_cnic_b, true)) ? getFilePreview(json_decode($guarantor->g_cnic_b, true)[0]) :
                              getFilePreview($guarantor->g_cnic_b) !!}
                            </div>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-11 spacing-right">
                            Postal Verification of References <br> <input class="form-control" value="{{ $guarantor->pos_verify }}"
                              name="guarantors[{{ $index }}][pos_verify]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 spacing-left">
                        <h5>Address :</h5>
                        <div class="row mb-2">
                          <div class="col-lg-5 spacing-right">
                            Office No <br> <input class="form-control" id="head_office_cell_no" name="guarantors[{{ $index }}][head_office_no]"
                              value="{{ $guarantor->head_office_no }}" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left">
                            Floor No <br> <input class="form-control" id="head_office_cell_no" name="guarantors[{{ $index }}][head_floor_no]"
                              value="{{ $guarantor->head_floor_no }}" type="text" placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-5 spacing-right">
                            Building <br> <input class="form-control" id="head_office_cell_no" name="guarantors[{{ $index }}][head_building]"
                              value="{{ $guarantor->head_building }}" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left">
                            Block <br> <input class="form-control" id="head_office_cell_no" name="guarantors[{{ $index }}][head_block]"
                              value="{{ $guarantor->head_block }}" type="text" placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-5 spacing-right">
                            Area <br> <input class="form-control" id="head_office_cell_no" name="guarantors[{{ $index }}][head_area]"
                              value="{{ $guarantor->head_area }}" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left">
                            City <br> <input class="form-control" id="head_office_cell_no" name="guarantors[{{ $index }}][head_city]"
                              value="{{ $guarantor->head_city }}" type="text" placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-11 spacing-right">
                            Attachements <br> <input class="form-control" type="file" name="guarantors[{{ $index }}][head_attach]" placeholder="..."
                              style="width: 88%;" multiple>
                          </div>
                          <div class="row">
                            <div class="file-preview" style="cursor: pointer;"
                              data-files="{{ json_encode(is_array(json_decode($guarantor->head_attach, true)) ? json_decode($guarantor->head_attach, true) : [$guarantor->head_attach]) }}"
                              data-extension="{{ is_array(json_decode($guarantor->head_attach, true)) ? pathinfo(json_decode($guarantor->head_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($guarantor->head_attach, PATHINFO_EXTENSION) }}"
                              onclick="openFileModal(this, 0)">
                              {!! is_array(json_decode($guarantor->head_attach, true)) ? getFilePreview(json_decode($guarantor->head_attach, true)[0]) :
                              getFilePreview($guarantor->head_attach) !!}
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
              </div>
              @endforeach
            </div>

            <!-- Button to add more guarantor details entries -->
            <button type="button" id="addGuarantorEntry" class="btn btn-primary">Add More Guarantor Details</button>


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
                    Little Finger <br> <input class="form-control" id="inpFile6" type="file" name="l_finger" placeholder="..." style="width: 100%;" multiple>
                  </div>
                  <div class="col-lg-3 spacing-left spacing-right">
                    Fore Finger <br> <input class="form-control" type="file" id="inpFile7" name="f_finger" placeholder="..." style="width: 100%;" multiple>
                  </div>
                  <div class="col-lg-3 spacing-left">
                    Middle Finger <br> <input class="form-control" type="file" id="inpFile8" name="m_finger" placeholder="..." style="width: 100%;" multiple>
                  </div>
                </div>

                <!--Pictures-->
                <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->l_finger, true)) ? json_decode($hrms->l_finger, true) : [$hrms->l_finger]) }}"
                      data-extension="{{ is_array(json_decode($hrms->l_finger, true)) ? pathinfo(json_decode($hrms->l_finger, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->l_finger, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->l_finger, true)) ? getFilePreview(json_decode($hrms->l_finger, true)[0]) : getFilePreview($hrms->l_finger)
                      !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->l_finger)-->
                    <!--    <img src="{{ asset($hrms->l_finger) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                  <!--<div class="col-lg-5 spacing-right">-->
                  <!--     Image Preview Biometric -->

                  <!--    <div class="image-preview42" id="imagePreview42">-->
                  <!--        @if($hrms->f_finger)-->
                  <!--        <img src="{{ asset($hrms->f_finger) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                  <!--        @else-->
                  <!--        <span class="image-preview__default-text42">Image Preview</span>-->
                  <!--        @endif-->
                  <!--    </div>-->
                  <!--</div>-->
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->f_finger, true)) ? json_decode($hrms->f_finger, true) : [$hrms->f_finger]) }}"
                      data-extension="{{ is_array(json_decode($hrms->f_finger, true)) ? pathinfo(json_decode($hrms->f_finger, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->f_finger, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->f_finger, true)) ? getFilePreview(json_decode($hrms->f_finger, true)[0]) : getFilePreview($hrms->f_finger)
                      !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->f_finger)-->
                    <!--    <img src="{{ asset($hrms->f_finger) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-lg-3 spacing-right">
                    Index Finger <br> <input class="form-control" id="inpFile9" type="file" name="i_finger" placeholder="..." style="width: 100%;" multiple>
                  </div>
                  <div class="col-lg-3 spacing-left ">
                    Thumb Finger <br> <input class="form-control" type="file" id="inpFile10" name="t_finger" placeholder="..." style="width: 100%;" multiple>
                  </div>
                  <div class="col-lg-3 spacing-left ">
                    Additionals <br> <input class="form-control" type="file" id="inpFile11" name="additionals" placeholder="..." style="width: 100%;" multiple>
                  </div>
                </div>


                <!--Pictures-->
                <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->i_finger, true)) ? json_decode($hrms->i_finger, true) : [$hrms->i_finger]) }}"
                      data-extension="{{ is_array(json_decode($hrms->i_finger, true)) ? pathinfo(json_decode($hrms->i_finger, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->i_finger, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->i_finger, true)) ? getFilePreview(json_decode($hrms->i_finger, true)[0]) : getFilePreview($hrms->i_finger)
                      !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->i_finger)-->
                    <!--    <img src="{{ asset($hrms->i_finger) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->additionals, true)) ? json_decode($hrms->additionals, true) : [$hrms->additionals]) }}"
                      data-extension="{{ is_array(json_decode($hrms->additionals, true)) ? pathinfo(json_decode($hrms->additionals, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->additionals, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->additionals, true)) ? getFilePreview(json_decode($hrms->additionals, true)[0]) :
                      getFilePreview($hrms->additionals) !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->t_finger)-->
                    <!--    <img src="{{ asset($hrms->t_finger) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->additionals, true)) ? json_decode($hrms->additionals, true) : [$hrms->additionals]) }}"
                      data-extension="{{ is_array(json_decode($hrms->additionals, true)) ? pathinfo(json_decode($hrms->additionals, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->additionals, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->additionals, true)) ? getFilePreview(json_decode($hrms->additionals, true)[0]) :
                      getFilePreview($hrms->additionals) !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->additionals)-->
                    <!--    <img src="{{ asset($hrms->additionals) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>
                </div>

              </div>

              <div class="row mb-2">
                <div class="col-lg-3 spacing-right">
                  Attachements <br> <input class="form-control" type="file" name="f_attachment" placeholder="..." style="width: 100%;" multiple>
                </div>
                <div class="row">
                  <div class="file-preview" style="cursor: pointer;"
                    data-files="{{ json_encode(is_array(json_decode($hrms->f_attachment, true)) ? json_decode($hrms->f_attachment, true) : [$hrms->f_attachment]) }}"
                    data-extension="{{ is_array(json_decode($hrms->f_attachment, true)) ? pathinfo(json_decode($hrms->f_attachment, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->f_attachment, PATHINFO_EXTENSION) }}"
                    onclick="openFileModal(this, 0)">
                    {!! is_array(json_decode($hrms->f_attachment, true)) ? getFilePreview(json_decode($hrms->f_attachment, true)[0]) :
                    getFilePreview($hrms->f_attachment) !!}
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
                  Notes <br> <textarea id="w3review" class="form-control" name="finger_note" rows="4" cols="35">{{ $hrms->finger_note }}
                  </textarea>
                </div>
              </div>
            </div>
          </div>
          <!--education-->
          <div class="tab-pane fade m-3" style="opacity: 90%;" id="education" role="tabpanel" aria-labelledby="nav-profile-tab">
            <h5 style="text-align:center;"><u><b>Education</b></u></h5>

            <div id="educationAccordion">
              <!-- Existing education entries -->
              @foreach ($hrms->education as $index => $education)
              <div class="accordion-item" id="educationItem{{ $index }}">
                <h2 class="accordion-header" id="educationHeading{{ $index }}">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#educationCollapse{{ $index }}" aria-expanded="true"
                    aria-controls="educationCollapse{{ $index }}">
                    Education Details {{ $index + 1 }}
                  </button>
                </h2>
                <div id="educationCollapse{{ $index }}" class="accordion-collapse collapse show" aria-labelledby="educationHeading{{ $index }}"
                  data-bs-parent="#educationAccordion">
                  <div class="accordion-body">
                    <div class="row">
                      <input type="hidden" name="education[{{ $index }}][d_id]" value="{{ $education->id }}">
                      <div class="col-lg-4">
                        <div class="row mb-2">
                          <div class="form-type col-lg-3">
                            Name of Degree <br> <input class="form-control" type="text" value="{{ $education->degree }}" name="education[{{ $index }}][degree]"
                              placeholder="..." style="width: 100%;">
                          </div>
                          <div class="form-type col-lg-3">
                            Date <br> <input class="form-control" type="date" name="education[{{ $index }}][degree_date]" value="{{ $education->degree_date }}"
                              placeholder="..." style="width: 100%;">
                          </div>
                          <div class="form-type col-lg-5 spacing-left">
                            Scanned Certificate of Degree <br> <input class="form-control" type="file" name="education[{{ $index }}][degree_pic]"
                              placeholder="..." style="width: 100%;" multiple>
                          </div>
                          <div class="row">
                            <div class="file-preview" style="cursor: pointer;"
                              data-files="{{ json_encode(is_array(json_decode($hrms->degree_pic, true)) ? json_decode($hrms->degree_pic, true) : [$hrms->degree_pic]) }}"
                              data-extension="{{ is_array(json_decode($hrms->degree_pic, true)) ? pathinfo(json_decode($hrms->degree_pic, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->degree_pic, PATHINFO_EXTENSION) }}"
                              onclick="openFileModal(this, 0)">
                              {!! is_array(json_decode($hrms->degree_pic, true)) ? getFilePreview(json_decode($hrms->degree_pic, true)[0]) :
                              getFilePreview($hrms->degree_pic) !!}
                            </div>
                          </div>

                        </div>

                        <div class="row mb-2">
                          <div class="col-lg-6 form-type spacing-right">
                            Institute Name <br> <input class="form-control" name="education[{{ $index }}][institute_name]"
                              value="{{ $education->institute_name }}" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 form-type spacing-left">
                            Awarding Body <br> <input class="form-control" name="education[{{ $index }}][a_body]" type="text" value="{{ $education->a_body }}"
                              placeholder="..." style="width: 100%;">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-11 ">
                            Notes <br>
                            <textarea id="w3review" class="form-control" style="width: 100%;" name="education[{{ $index }}][ex_notes]" rows="4"
                              cols="40">{{ $education->ex_notes }}
                            </textarea>
                          </div>

                        </div>
                      </div>
                      <div class="col-lg-4 spacing-left">
                        <div class="row mb-3">
                          <div class="form-type col-lg-5 spacing-right">
                            Degree No. <br> <input class="form-control" name="education[{{ $index }}][degree_no]" value="{{ $education->degree_no }}"
                              type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="form-type col-lg-5 spacing-left spacing-right">
                            Degree Level <br> <input class="form-control" name="education[{{ $index }}][degree_level]" value="{{ $education->degree_level }}"
                              type="text" placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="form-type col-lg-5 spacing-right">
                            Marks Obtained <br> <input class="form-control" type="text" name="education[{{ $index }}][ob_marks]"
                              value="{{ $education->ob_marks }}" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="form-type col-lg-5 spacing-right">
                            Total Marks <br> <input class="form-control" type="text" name="education[{{ $index }}][t_marks]" value="{{ $education->t_marks }}"
                              placeholder="..." style="width: 100%;">
                          </div>

                          <div class="form-type col-lg-5  spacing-right">
                            Grade <br> <input class="form-control" type="text" name="education[{{ $index }}][grade]" value="{{ $education->grade }}"
                              placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-type col-lg-4 spacing-right">
                            Previous Education Start Date <br> <input class="form-control" id="preveduEndYears" type="date"
                              name="education[{{ $index }}][date_start]" value="{{ $education->date_start }}" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="form-type col-lg-4 spacing-right">
                            Previous Education End Date <br> <input class="form-control" id="nexteduStartYears" type="date"
                              name="education[{{ $index }}][date_end]" value="{{ $education->date_end }}" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="form-type col-lg-4">
                            {{-- <p class="text-danger">Gaps between Educational Career</p> --}}
                            <p id="gapeduResults"></p>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-10 mt-3 form-type spacing-right">
                            Address of Institution <br> <input class="form-control" name="education[{{ $index }}][adress_inst]"
                              value="{{ $education->adress_inst }}" type="text" placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-5 spacing-right">
                            Attachement <br> <input class="form-control" type="file" name="education[{{ $index }}][deg_attach]" placeholder="..."
                              style="width: 100%;" multiple>
                          </div>
                          <div class="row">
                            <div class="file-preview" style="cursor: pointer;"
                              data-files="{{ json_encode(is_array(json_decode($hrms->deg_attach, true)) ? json_decode($hrms->deg_attach, true) : [$hrms->deg_attach]) }}"
                              data-extension="{{ is_array(json_decode($hrms->deg_attach, true)) ? pathinfo(json_decode($hrms->deg_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->deg_attach, PATHINFO_EXTENSION) }}"
                              onclick="openFileModal(this, 0)">
                              {!! is_array(json_decode($hrms->deg_attach, true)) ? getFilePreview(json_decode($hrms->deg_attach, true)[0]) :
                              getFilePreview($hrms->deg_attach) !!}
                            </div>
                        
                          </div>
                        </div>
                      </div>
                      <div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <!-- Button to add more education entries -->
            <button type="button" id="addEducationEntry" class="btn btn-primary">Add More Education Details</button>

            <h5 style="text-align:center;"><u><b>Health</b></u></h5>
            <div class="row">
              <div class="col-lg-6 spacing-right">
                <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                    Age <br> <input class="form-control" id="inpFile5" name="h_age" value="{{ $hrms->h_age }}" type="text" placeholder="..."
                      style="width: 100%;" multiple>
                  </div>
                  <div class="col-lg-5 spacing-left">
                    Weight <br> <input class="form-control" type="text" name="weight" value="{{ $hrms->weight }}" placeholder="..." style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-4 spacing-right">
                    Height <br> <input class="form-control" type="text" name="height" value="{{ $hrms->height }}" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-3 spacing-left spacing-right">
                    Complection <br> <input class="form-control" type="text" name="complection" value="{{ $hrms->complection }}" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-3 spacing-left">
                    Disease <br><input id="medical_category" class="form-control" name="ay_other_d" value="{{ $hrms->ay_other_d }}" type="text"
                      placeholder="..." style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-4 spacing-right">
                    Medical Category <br><input class="form-control" name="medical_category" value="{{ $hrms->medical_category }}" placeholder="..."
                      style="width: 100%;" multiple>
                  </div>
                  <div class="col-lg-4 spacing-left spacing-right">
                    Card of Verification <br> <input class="form-control" id="inpFile44" name="vaccine_card" type="file" placeholder="..." style="width: 100%;"
                      multiple>
                  </div>
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->vaccine_card, true)) ? json_decode($hrms->vaccine_card, true) : [$hrms->vaccine_card]) }}"
                      data-extension="{{ is_array(json_decode($hrms->vaccine_card, true)) ? pathinfo(json_decode($hrms->vaccine_card, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->vaccine_card, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->vaccine_card, true)) ? getFilePreview(json_decode($hrms->vaccine_card, true)[0]) :
                      getFilePreview($hrms->vaccine_card) !!}
                    </div>
                    <!--<div class="image-preview42" id="imagePreview42">-->
                    <!--    @if($hrms->vaccine_card)-->
                    <!--    <img src="{{ asset($hrms->vaccine_card) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                    <!--    @else-->
                    <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                    <!--    @endif-->
                    <!--</div>-->
                  </div>


                </div>
                <h6 class="mt-4">For Phsychometric Test: <a href="phsychometric.html">Click Here</a></h6>
                <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                    Medical Fitness Certificate <br> <input class="form-control" name="medical_fit_card" type="file" placeholder="..." style="width: 100%;"
                      multiple>
                  </div>
                  <div class="row">
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->medical_fit_card, true)) ? json_decode($hrms->medical_fit_card, true) : [$hrms->medical_fit_card]) }}"
                      data-extension="{{ is_array(json_decode($hrms->medical_fit_card, true)) ? pathinfo(json_decode($hrms->medical_fit_card, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->medical_fit_card, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->medical_fit_card, true)) ? getFilePreview(json_decode($hrms->medical_fit_card, true)[0]) :
                      getFilePreview($hrms->medical_fit_card) !!}
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
                  <div class="col-lg-6 spacing-left">
                    Attachments <br> <input class="form-control" type="file" name="medical_fit_attach" placeholder="..." style="width: 100%;" multiple>
                  </div>
                  <div class="row">
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->medical_fit_attach, true)) ? json_decode($hrms->medical_fit_attach, true) : [$hrms->medical_fit_attach]) }}"
                      data-extension="{{ is_array(json_decode($hrms->medical_fit_attach, true)) ? pathinfo(json_decode($hrms->medical_fit_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->medical_fit_attach, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->medical_fit_attach, true)) ? getFilePreview(json_decode($hrms->medical_fit_attach, true)[0]) :
                      getFilePreview($hrms->medical_fit_attach) !!}
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
                    Notes <br> <textarea id="w3review" class="form-control" name="medical_fit_note" rows="4" cols="40">
                    {{ $hrms->medical_fit_note }}
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
                        Name <br> <input class="form-control" type="text" value="{{ $hrms->phy_name }}" name="phy_name" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-4 spacing-left">
                        Number <br> <input class="form-control" type="text" value="{{ $hrms->phy_cell }}" name="phy_cell" placeholder="..."
                          style="width: 100%;">
                      </div>
                    </div>
                    <h5>Address</h5>
                    <div class="row mb-2">
                      <div class="col-lg-5 spacing-right">
                        Office No <br> <input class="form-control" name="phy_office" value="{{ $hrms->phy_office }}" type="text" placeholder="..."
                          style="width: 100%;">
                      </div>
                      <div class="col-lg-5 spacing-left spacing-right">
                        Building <br> <input class="form-control" name="phy_building" value="{{ $hrms->phy_building }}" type="text" placeholder="..."
                          style="width: 100%;">
                      </div>
                      <div class="col-lg-5 spacing-right">
                        Block <br> <input class="form-control" name="phy_block" value="{{ $hrms->phy_block }}" type="text" placeholder="..."
                          style="width: 100%;">
                      </div>
                      <div class="col-lg-5 spacing-left spacing-right">
                        Area <br> <input class="form-control" name="phy_area" value="{{ $hrms->phy_area }}" type="text" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-5 spacing-right">
                        City <br> <input class="form-control" name="phy_city" value="{{ $hrms->phy_city }}" type="text" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-5 spacing-left spacing-right">
                        Location <br> <input class="form-control" name="phy_loc" value="{{ $hrms->phy_loc }}" type="text" placeholder="..."
                          style="width: 100%;">
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-lg-6 spacing-right">
                        Notes <br> <textarea class="form-control" name="phy_note" type="text" placeholder="..."
                          style="width: 100%;">{{ $hrms->phy_note }}</textarea>
                      </div>
                      <div class="col-lg-6 spacing-right">
                        Attachment <br> <input class="form-control" name="phy_attach" type="file" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="row">
                        <div class="file-preview" style="cursor: pointer;"
                          data-files="{{ json_encode(is_array(json_decode($hrms->phy_attach, true)) ? json_decode($hrms->phy_attach, true) : [$hrms->phy_attach]) }}"
                          data-extension="{{ is_array(json_decode($hrms->phy_attach, true)) ? pathinfo(json_decode($hrms->phy_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->phy_attach, PATHINFO_EXTENSION) }}"
                          onclick="openFileModal(this, 0)">
                          {!! is_array(json_decode($hrms->phy_attach, true)) ? getFilePreview(json_decode($hrms->phy_attach, true)[0]) :
                          getFilePreview($hrms->phy_attach) !!}
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
                        Vaccination Type <br> <input class="form-control" value="{{ $hrms->vac_type }}" name="vac_type" type="text" placeholder="..."
                          style="width: 100%;">
                      </div>
                      <div class="col-lg-5 spacing-left spacing-right">
                        Vaccination Proof Type <br> <input class="form-control" name="vac_pr" type="file" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="row">
                        <div class="file-preview" style="cursor: pointer;"
                          data-files="{{ json_encode(is_array(json_decode($hrms->vac_pr, true)) ? json_decode($hrms->vac_pr, true) : [$hrms->vac_pr]) }}"
                          data-extension="{{ is_array(json_decode($hrms->vac_pr, true)) ? pathinfo(json_decode($hrms->vac_pr, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->vac_pr, PATHINFO_EXTENSION) }}"
                          onclick="openFileModal(this, 0)">
                          {!! is_array(json_decode($hrms->vac_pr, true)) ? getFilePreview(json_decode($hrms->vac_pr, true)[0]) : getFilePreview($hrms->vac_pr)
                          !!}
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
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#workCollapse{{ $index }}" aria-expanded="true"
                    aria-controls="workCollapse{{ $index }}">
                    Work Experience Details {{ $index + 1 }}
                  </button>
                </h2>
                <div id="workCollapse{{ $index }}" class="accordion-collapse collapse show" aria-labelledby="workHeading{{ $index }}">
                  <div class="accordion-body">
                    <div class="row">
                      <input type="hidden" name="workExperiences[{{ $index }}][w_id]" value="{{ $work->id }}">
                      <div class="col-lg-5">
                        <div class="row mb-2">
                          <div class="col-lg-11 spacing-right">
                            Organization Name <br> <input class="form-control" name="workExperiences[{{ $index }}][org_name]" value="{{ $work->org_name }}"
                              type="text" placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-7 spacing-right">
                            Email of the Company<br> <input class="form-control" name="workExperiences[{{ $index }}][email_oc]" value="{{ $work->email_oc }}"
                              type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-right">
                            POC <br> <input class="form-control" type="text" name="workExperiences[{{ $index }}][poc]" value="{{ $work->poc }}"
                              placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-6 spacing-right">
                            Job Experience Certificate <br> <input class="form-control" name="workExperiences[{{ $index }}][jec]" type="file" placeholder="..."
                              style="width: 100%;" multiple>
                          </div>
                          <div class="row">
                            <div class="file-preview" style="cursor: pointer;"
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
                            Attachements <br> <input class="form-control" name="workExperiences[{{ $index }}][jec_attach]" type="file" placeholder="..."
                              style="width: 100%;">
                          </div>
                          <div class="row">
                            <div class="file-preview" style="cursor: pointer;"
                              data-files="{{ json_encode(is_array(json_decode($work->jec_attach, true)) ? json_decode($work->jec_attach, true) : [$work->jec_attach]) }}"
                              data-extension="{{ is_array(json_decode($work->jec_attach, true)) ? pathinfo(json_decode($work->jec_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($work->jec_attach, PATHINFO_EXTENSION) }}"
                              onclick="openFileModal(this, 0)">
                              {!! is_array(json_decode($work->jec_attach, true)) ? getFilePreview(json_decode($work->jec_attach, true)[0]) :
                              getFilePreview($work->jec_attach) !!}
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
                            Designation <br> <input class="form-control" name="workExperiences[{{ $index }}][w_desig]" value="{{ $work->w_desig }}" type="text"
                              placeholder="..." style="width: 100%;" multiple>
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                            Salary <br> <input class="form-control" name="workExperiences[{{ $index }}][w_salary]" value="{{ $work->w_salary }}" type="text"
                              placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 spacing-left">
                        <div class="row mb-2">
                          <div class="col-lg-6 spacing-right">
                            Service Tenure <br> <input class="form-control" name="workExperiences[{{ $index }}][ser_tenure]" value="{{ $work->ser_tenure }}"
                              type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-right spacing-left">
                            Others <br> <input class="form-control" type="file" name="workExperiences[{{ $index }}][ser_other]" placeholder="..."
                              style="width: 100%;">
                          </div>
                          <div class="row">
                            <div class="file-preview" style="cursor: pointer;"
                              data-files="{{ json_encode(is_array(json_decode($work->ser_other, true)) ? json_decode($work->ser_other, true) : [$work->ser_other]) }}"
                              data-extension="{{ is_array(json_decode($work->ser_other, true)) ? pathinfo(json_decode($work->ser_other, true)[0], PATHINFO_EXTENSION) : pathinfo($work->ser_other, PATHINFO_EXTENSION) }}"
                              onclick="openFileModal(this, 0)">
                              {!! is_array(json_decode($work->ser_other, true)) ? getFilePreview(json_decode($work->ser_other, true)[0]) :
                              getFilePreview($work->ser_other) !!}
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
                            Inservice Awards /Achivements <br> <input class="form-control" name="workExperiences[{{ $index }}][achivement]"
                              value="{{ $work->achivement }}" type="text" placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-6 spacing-right">
                            Joining Date <br> <input class="form-control" id="prevEndYear" type="date" name="workExperiences[{{ $index }}][join_date]"
                              value="{{ $work->join_date }}" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-right spacing-left">
                            End Date <br> <input class="form-control" id="nextStartYear" type="date" name="workExperiences[{{ $index }}][end_date]"
                              value="{{ $work->end_date }}" placeholder="..." style="width: 100%;" multiple>
                          </div>
                          <div class="col-lg-5 spacing-right" style="margin-top:10px;">
                            Total Experience <br> <input class="form-control" type="text" name="workExperiences[{{ $index }}][t_exp]" value="{{ $work->t_exp }}"
                              placeholder="" style="width: 100%;" multiple>
                          </div>
                          <p id="gapResult"></p>
                        </div>

                      </div>
                      <div class="col-lg-2">

                        <b class="text-danger">Gaps between Educational Career</b>


                        <label>Previous Education End Year:</label>
                        <input type="number" id="prevEndYear" class="form-control" placeholder="e.g., 2012">

                        <label>Next Education Start Year:</label>
                        <input type="number" id="nextStartYear" class="form-control" placeholder="e.g., 2014">

                        <p id="gapResult"></p>
                      </div>


                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <!-- Button to add more work experience entries -->
            <button type="button" id="addWorkEntry" class="btn btn-primary mt-2">Add More Work Experience</button>

            <div class="row mt-4">
              {{-- <center> <h4>Health Status</h4> </center> --}}


              <div class="col-lg-8">
                <div class="row mb-2">

                </div>


              </div>
            </div>
          </div>
          <!--compliances-->
          <div class="tab-pane fade show m-3" style="opacity: 90%;" id="compliances" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row" style="display: flex; justify-content:flex-end;">
              <center>
                <h4>Employee Old Age Benefit </h4>
              </center>
              <div class="col-lg-3" style="margin-left:0px">
                <br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="option1">
                  <label class="form-check-label" for="inlineCheckbox">Out of Scope</label>
                </div>
              </div>
              <div class="col-lg-12  spacing-right" id="eobi-fields">
                <div class="row mb-2">
                  <div class="col-lg-4 spacing-right">
                    EOBI Registration No. of Staff<br> <input class="form-control" value="{{ $hrms->c_eobi }}" name="c_eobi" type="text" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-left spacing-right">
                    Fall in EOBI <br> <input class="form-control" name="f_eobi" value="{{ $hrms->f_eobi }}" type="text" placeholder="..." style="width: 100%;">
                  </div>

                  <div class="col-lg-4 spacing-right">
                    Sub code of that EOBI Region <br> <input class="form-control" value="{{ $hrms->sub_eobi }}" name="sub_eobi" type="text" placeholder="..."
                      style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                    Front Side of EOBI Card <br> <input class="form-control" id="inpFile30" type="file" name="front_eobi" placeholder="..."
                      style="width: 100%;">
                    <div class="col-lg-5 spacing-right">
                      <!-- Image Preview Biometric -->
                      <div class="file-preview" style="cursor: pointer;"
                        data-files="{{ json_encode(is_array(json_decode($hrms->front_eobi, true)) ? json_decode($hrms->front_eobi, true) : [$hrms->front_eobi]) }}"
                        data-extension="{{ is_array(json_decode($hrms->front_eobi, true)) ? pathinfo(json_decode($hrms->front_eobi, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->front_eobi, PATHINFO_EXTENSION) }}"
                        onclick="openFileModal(this, 0)">
                        {!! is_array(json_decode($hrms->front_eobi, true)) ? getFilePreview(json_decode($hrms->front_eobi, true)[0]) :
                        getFilePreview($hrms->front_eobi) !!}
                      </div>
                      <!--<div class="image-preview42" id="imagePreview42">-->
                      <!--    @if($hrms->front_eobi)-->
                      <!--    <img src="{{ asset($hrms->front_eobi) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                      <!--    @else-->
                      <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                      <!--    @endif-->
                      <!--</div>-->
                    </div>
                  </div>
                  <div class="col-lg-5 spacing-left">
                    Back side of EOBI Card <br> <input class="form-control" id="inpFile31" name="back_eobi" type="file" placeholder="..." style="width: 100%;">
                    <div class="row mb-2">
                      <div class="col-lg-11 spacing-right">
                        <!-- Image Preview Biometric -->
                        <div class="file-preview" style="cursor: pointer;"
                          data-files="{{ json_encode(is_array(json_decode($hrms->back_eobi, true)) ? json_decode($hrms->back_eobi, true) : [$hrms->back_eobi]) }}"
                          data-extension="{{ is_array(json_decode($hrms->back_eobi, true)) ? pathinfo(json_decode($hrms->back_eobi, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->back_eobi, PATHINFO_EXTENSION) }}"
                          onclick="openFileModal(this, 0)">
                          {!! is_array(json_decode($hrms->back_eobi, true)) ? getFilePreview(json_decode($hrms->back_eobi, true)[0]) :
                          getFilePreview($hrms->back_eobi) !!}
                        </div>
                        <!--<div class="image-preview42" id="imagePreview42">-->
                        <!--    @if($hrms->back_eobi)-->
                        <!--    <img src="{{ asset($hrms->back_eobi) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                        <!--    @else-->
                        <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                        <!--    @endif-->
                        <!--</div>-->
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
                <center>
                  <h4>Social Security</h4>
                </center>
                <div class="col-lg-3" style="margin-left:0px">
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="lineCheckbox" value="option1">
                    <label class="form-check-label" for="inlineCheckbox">Out of Scope</label>
                  </div>
                </div>
                <div class="col-lg-12 spacing-right" id="eobi-f">
                  <div class="row mb-2">
                    <div class="col-lg-4 spacing-right">
                      Social Security Registration No. of Staff <br> <input class="form-control" value="{{ $hrms->ss_staff }}" name="ss_staff" type="text"
                        placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-left spacing-right">
                      Fall in EOBI <br><input class="form-control" name="fall_ss" type="text" value="{{ $hrms->fall_ss }}" placeholder="..."
                        style="width: 100%;">
                    </div>

                    <div class="col-lg-4 spacing-right">
                      Sub Code of that Social Security Region <br> <input class="form-control" value="{{ $hrms->sub_ss }}" name="sub_ss" type="text"
                        placeholder="..." style="width: 100%;">
                    </div>
                    <div class="row mb-2">
                      <div class="col-lg-5">
                        Front Side of SS Card <br> <input class="form-control" id="inpFile40" type="file" name="front_ss" placeholder="..."
                          style="width: 105%;">
                        <div class="col-lg-5 spacing-right">
                          <!-- Image Preview Biometric -->
                          <div class="file-preview" style="cursor: pointer;"
                            data-files="{{ json_encode(is_array(json_decode($hrms->front_ss, true)) ? json_decode($hrms->front_ss, true) : [$hrms->front_ss]) }}"
                            data-extension="{{ is_array(json_decode($hrms->front_ss, true)) ? pathinfo(json_decode($hrms->front_ss, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->front_ss, PATHINFO_EXTENSION) }}"
                            onclick="openFileModal(this, 0)">
                            {!! is_array(json_decode($hrms->front_ss, true)) ? getFilePreview(json_decode($hrms->front_ss, true)[0]) :
                            getFilePreview($hrms->front_ss) !!}
                          </div>
                          <!--<div class="image-preview42" id="imagePreview42">-->
                          <!--    @if($hrms->front_ss)-->
                          <!--    <img src="{{ asset($hrms->front_ss) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                          <!--    @else-->
                          <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                          <!--    @endif-->
                          <!--</div>-->
                        </div>
                      </div>
                      <div class="col-lg-5">
                        Back side of SS Card <br> <input class="form-control" id="inpFile41" name="back_ss" type="file" placeholder="..." style="width: 108%;">
                        <div class="row mb-2">
                          <div class="col-lg-11 spacing-right">
                            <!-- Image Preview Biometric -->
                            <div class="file-preview" style="cursor: pointer;"
                              data-files="{{ json_encode(is_array(json_decode($hrms->back_ss, true)) ? json_decode($hrms->back_ss, true) : [$hrms->back_ss]) }}"
                              data-extension="{{ is_array(json_decode($hrms->back_ss, true)) ? pathinfo(json_decode($hrms->back_ss, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->back_ss, PATHINFO_EXTENSION) }}"
                              onclick="openFileModal(this, 0)">
                              {!! is_array(json_decode($hrms->back_ss, true)) ? getFilePreview(json_decode($hrms->back_ss, true)[0]) :
                              getFilePreview($hrms->back_ss) !!}
                            </div>
                            <!--<div class="image-preview42" id="imagePreview42">-->
                            <!--    @if($hrms->back_ss)-->
                            <!--    <img src="{{ asset($hrms->back_ss) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                            <!--    @else-->
                            <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                            <!--    @endif-->
                            <!--</div>-->
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
                <center>
                  <h4>Group Life Insurance</h4>
                </center>
                <div class="row justify-content-end">
                  <div class="col-md-3">
                    <br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inCheckbox" value="">
                      <label class="form-check-label">Out of Scope</label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 spacing-right" id="eobi-field">
                  <div class="row mb-2">
                    <div class="col-md-6 col-lg-4">
                      <label>Insurance No. of Employee</label>
                      <input class="form-control" value="{{ $hrms->gli_ins }}" name="gli_ins" type="text" placeholder="...">
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <!--<label>Insurance Company Name</label>-->
                      <label>GLI Company</label>
                      <input class="form-control" value="{{ $hrms->gli_name }}" name="gli_name" type="text" placeholder="...">
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <label>Policy Number of PIFFERS</label>
                      <input class="form-control" type="text" value="{{ $hrms->gli_policy }}" name="gli_policy" placeholder="...">
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <label>Type Of Insurance</label>
                      <input class="form-control" type="text" value="{{ $hrms->type_ins }}" name="type_ins" placeholder="...">
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <label>Sum Insured</label>
                      <input class="form-control" type="text" value="{{ $hrms->sum_gli }}" name="sum_gli" placeholder="...">
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <label>Date of Insurance</label>
                      <input class="form-control" type="date" value="{{ $hrms->date_ins }}" name="date_ins" placeholder="...">
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <label>Scanned Document of Policy</label>
                      <input class="form-control" name="snc_pol" type="file" placeholder="...">
                      <div class="file-preview" style="cursor: pointer;"
                        data-files="{{ json_encode(is_array(json_decode($hrms->snc_pol, true)) ? json_decode($hrms->snc_pol, true) : [$hrms->snc_pol]) }}"
                        data-extension="{{ is_array(json_decode($hrms->snc_pol, true)) ? pathinfo(json_decode($hrms->snc_pol, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->snc_pol, PATHINFO_EXTENSION) }}"
                        onclick="openFileModal(this, 0)">
                        {!! is_array(json_decode($hrms->snc_pol, true)) ? getFilePreview(json_decode($hrms->snc_pol, true)[0]) : getFilePreview($hrms->snc_pol)
                        !!}
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
            <div class="row mt-4">
              <h5>Next of Kin</h5>
              <div class="col-lg-10 mt-2">
                <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                    Name <br> <input class="form-control" type="text" value="{{ $hrms->next_name }}" name="next_name" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right spacing-left">
                    CNIC <br> <input class="form-control" type="text" value="{{ $hrms->next_cnic }}" name="next_cnic" placeholder="..." style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                    Father Name <br> <input class="form-control" type="text" value="{{ $hrms->next_fname }}" name="next_fname" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left spacing-right">
                    Relationship <br> <input class="form-control" type="text" value="{{ $hrms->next_relation }}" name="next_relation" placeholder="..."
                      style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                    Death Certification <br> <input class="form-control" type="text" value="{{ $hrms->next_death }}" name="next_death" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left spacing-right">
                    FRC (Family Registration Certificate) <br> <input class="form-control" value="{{ $hrms->next_frc }}" name="next_frc" type="file"
                      placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-10 spacing-right">
                    Affidavit from Legal Heirs of deceased Security Staff regarding Claim <br> <input class="form-control" value="{{ $hrms->next_legal }}"
                      name="next_legal" type="file" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-right">
                    Photograph while giving the Claim <br> <input class="form-control" name="next_photo" type="file" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="row">
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->next_photo, true)) ? json_decode($hrms->next_photo, true) : [$hrms->next_photo]) }}"
                      data-extension="{{ is_array(json_decode($hrms->next_photo, true)) ? pathinfo(json_decode($hrms->next_photo, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->next_photo, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->next_photo, true)) ? getFilePreview(json_decode($hrms->next_photo, true)[0]) :
                      getFilePreview($hrms->next_photo) !!}
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
                    Acknowledgement of Receiving the Claim <br> <input class="form-control" name="next_claim" type="file" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="row">
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->next_claim, true)) ? json_decode($hrms->next_claim, true) : [$hrms->next_claim]) }}"
                      data-extension="{{ is_array(json_decode($hrms->next_claim, true)) ? pathinfo(json_decode($hrms->next_claim, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->next_claim, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->next_claim, true)) ? getFilePreview(json_decode($hrms->next_claim, true)[0]) :
                      getFilePreview($hrms->next_claim) !!}
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
                    Amount of Claim <br> <input class="form-control" type="text" value="{{ $hrms->next_amount }}" name="next_amount" placeholder="..."
                      style="width: 100%;" multiple>
                  </div>
                  <div class="col-lg-3 spacing-left spacing-right">
                    Check Number of Claim <br> <input class="form-control" type="text" value="{{ $hrms->next_check }}" name="next_check" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-2 spacing-left spacing-right">
                    Date of Check <br> <input class="form-control" type="date" value="{{ $hrms->next_date }}" name="next_date" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-2 spacing-left spacing-right">
                    Copy of the Check <br> <input class="form-control" name="next_copy" type="file" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="row">
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->next_copy, true)) ? json_decode($hrms->next_copy, true) : [$hrms->next_copy]) }}"
                      data-extension="{{ is_array(json_decode($hrms->next_copy, true)) ? pathinfo(json_decode($hrms->next_copy, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->next_copy, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->next_copy, true)) ? getFilePreview(json_decode($hrms->next_copy, true)[0]) :
                      getFilePreview($hrms->next_copy) !!}
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
                    Name of bank <br> <input class="form-control" type="text" value="{{ $hrms->next_bank }}" name="next_bank" placeholder="..."
                      style="width: 100%;" multiple>
                  </div>
                  <div class="col-lg-3 spacing-right">
                    Instrument Number <br> <input class="form-control" type="text" value="{{ $hrms->next_ins }}" name="next_ins" placeholder="..."
                      style="width: 100%;" multiple>
                  </div>
                  <div class="col-lg-3 spacing-left spacing-right">
                    Instrument Attachment <br> <input class="form-control" type="file" name="next_attach" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="row">
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->next_attach, true)) ? json_decode($hrms->next_attach, true) : [$hrms->next_attach]) }}"
                      data-extension="{{ is_array(json_decode($hrms->next_attach, true)) ? pathinfo(json_decode($hrms->next_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->next_attach, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->next_attach, true)) ? getFilePreview(json_decode($hrms->next_attach, true)[0]) :
                      getFilePreview($hrms->next_attach) !!}
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
                    Attachements <br> <input class="form-control" type="file" name="ex_next_attach" placeholder="..." style="width: 100%;" multiple>
                  </div>
                  <div class="row">
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->ex_next_attach, true)) ? json_decode($hrms->ex_next_attach, true) : [$hrms->ex_next_attach]) }}"
                      data-extension="{{ is_array(json_decode($hrms->ex_next_attach, true)) ? pathinfo(json_decode($hrms->ex_next_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->ex_next_attach, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->ex_next_attach, true)) ? getFilePreview(json_decode($hrms->ex_next_attach, true)[0]) :
                      getFilePreview($hrms->ex_next_attach) !!}
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
                    Notes <br> <textarea id="w3review" class="form-control" name="ex_next_note" name="w3review" rows="4" cols="47">{{ $hrms->ex_next_note }}
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
          {{-- Inventory Bin Card --}}
                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="inventory-bin-card" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Lot Number</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Article Name</th>
                                <th>Condition</th>
                                <th>Date</th>
                                <th>Item Name</th>
                                <th>Item Code</th>
                                <th>Quantity</th>
                                <th>Price/Unit</th>
                                <th>Total Price</th>
                                <th>Dispatcher Name</th>
                                <th>Tracking ID</th>
                                <th>Dispatch Through</th>
                                <th>Receiver Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dispatches as $index => $dispatch)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $dispatch->lot_number }}</td>
                                    <td>{{ $dispatch->category }}</td>
                                    <td>{{ $dispatch->sub_category }}</td>
                                    <td>{{ $dispatch->article_name }}</td>
                                    <td>{{ $dispatch->condition }}</td>
                                    <td>{{ $dispatch->date }}</td>
                                    <td>{{ $dispatch->item_name }}</td>
                                    <td>{{ $dispatch->item_code }}</td>
                                    <td>{{ $dispatch->quantity ?? 'N/A' }}</td>
                                    <td>{{ $dispatch->price_per_unit ?? 'N/A' }}</td>
                                    <td>{{ $dispatch->total_price ?? 'N/A' }}</td>
                                    <td>{{ $dispatch->dispatcher_name }}</td>
                                    <td>{{ $dispatch->tracking_id }}</td>
                                    <td>{{ $dispatch->dispatch_through }}</td>
                                    <td>{{ $dispatch->receiver_name }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="16" class="text-center">No dispatch records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    </div>

                    </div>
                    {{-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="inventory-bin-card" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-2">
                                    <div class="col-lg-11 spacing-right">
                                        Employee Name <br>  <input class="form-control" name="emp_name" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Bin Card No.  <br>  <input class="form-control" name="bin" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Employee No. <br>  <input class="form-control" name="emp_no" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Title/Designation <br>  <input class="form-control" name="emp_desig" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Stock Register No.  <br>  <input class="form-control" name="stock" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Stock Register Page No. <br>  <input class="form-control" name="stock_reg" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Others <br>  <input class="form-control" type="file" name="stock_other" placeholder="..." style="width: 100%;" multiple>
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right">
                                        Attachements <br>  <input class="form-control" type="file" name="stock_attach" placeholder="..." style="width: 100%;" multiple>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-10 spacing-left spacing-right">
                                    Notes <br> <textarea id="w3review" class="form-control" name="stock_note" rows="4" cols="56">
                                    </textarea>
                                </div>
                                </div>

                            </div>
                            <hr class="w-75 mx-auto"/>
                            <h3 class="text-center mb-3"><u>Inventory</u></h3>
                            <h5 class="text-center"><u>Bin Card Details</u></h5>
                            <div class="row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Employee No <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Employee Name <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                                </div>

                                <div class="col-lg-4 spacing-right" style="margin-left:335px">
                                Stock Register <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                            <div class="col-lg-4 spacing-right">
                                Designation <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                Card No <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4">
                                Stock Register page <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
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
                                                            <input type="file" class="form-control-file" id="image" accept="image/*">
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" id="name">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <button style="width: 250px; margin-top:30px;" type="button" class="btn btn-primary" onclick="addSection()">Add More</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-lg-5" style="margin-top:80px; margin-left:37rem;">
                                                    Total Value of Inventory hold with Staff <br>  <input class="form-control" type="" placeholder="" style="width: 60%;" multiple>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div> --}}
          <!--Security Guard License Last Tab-->
          <div class="tab-pane m-3" style="opacity: 90%;" id="security" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="row">
              <div class="col-lg-12 spacing-right">
                <div class="row mb-2">
                  <div class="col-lg-4 spacing-left spacing-right">
                    License No <br> <input class="form-control" type="text" name="s_license" value="{{ $hrms->s_license }}" placeholder="" style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-left spacing-right">
                    Isuing Authority <br> <input class="form-control" type="text" name="s_issuing" value="{{ $hrms->s_issuing }}" placeholder=""
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-left">
                    Validity date. <br> <input class="form-control" type="date" name="s_v_date" value="{{ $hrms->s_v_date }}" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-left">
                    Date of issuance <br> <input class="form-control" type="date" name="s_date" value="{{ $hrms->s_date }}" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-left">
                    Fee of License <br> <input class="form-control" type="text" name="s_fee" value="{{ $hrms->s_fee }}" placeholder="..." style="width: 100%;">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 spacing-left spacing-right">
                    Picture of License (front) <br> <input class="form-control" type="file" name="s_front" placeholder="" style="width: 100%;">
                  </div>
                  <div class="row">
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->s_front, true)) ? json_decode($hrms->s_front, true) : [$hrms->s_front]) }}"
                      data-extension="{{ is_array(json_decode($hrms->s_front, true)) ? pathinfo(json_decode($hrms->s_front, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->s_front, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->s_front, true)) ? getFilePreview(json_decode($hrms->s_front, true)[0]) : getFilePreview($hrms->s_front)
                      !!}
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
                    Picture of License (back) <br> <input class="form-control" type="file" name="s_back" placeholder="" style="width: 100%;">
                  </div>
                  <div class="row">
                    <div class="file-preview" style="cursor: pointer;"
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
                    Notes. <br> <textarea class="form-control" type="text" name="s_notes" placeholder="..." style="width: 100%;">{{ $hrms->s_notes }}</textarea>
                  </div>
                  <div class="col-lg-4 spacing-left">
                    Attachments <br> <input class="form-control" type="file" name="s_attach" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="row">
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->s_attach, true)) ? json_decode($hrms->s_attach, true) : [$hrms->s_attach]) }}"
                      data-extension="{{ is_array(json_decode($hrms->s_attach, true)) ? pathinfo(json_decode($hrms->s_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->s_attach, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->s_attach, true)) ? getFilePreview(json_decode($hrms->s_attach, true)[0]) : getFilePreview($hrms->s_attach)
                      !!}
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
          <div class="tab-pane m-3" style="opacity: 90%;" id="training-details" role="tabpanel" aria-labelledby="nav-contact-tab">
            @if (!empty($guard->trainingAssignment) && count($guard->trainingAssignment) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Training Number</th>
                            <th>Training Title</th>
                            <th>Training Start Date</th>
                            <th>Training End Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guard->trainingAssignment as $index => $assignment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $assignment->training->training_no ?? 'N/A' }}</td>
                                <td>{{ $assignment->training->type_of_training ?? 'N/A' }}</td>
                                <td>{{ $assignment->training->training_s_date ?? 'N/A' }}</td>
                                <td>{{ $assignment->training->training_e_date ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('viewtrain', ['id' => $assignment->training_id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info"></div>
            @endif
              @if(isset($certificates['error']))
                <div class="alert alert-danger">{{ $certificates['error'] }}</div>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Certificate Name</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(is_array($certificates) && !isset($certificates['error']))
                        @foreach($certificates as $cert)
                            <tr>
                                <td>{{ $cert['course_name'] ?? '' }}</td>
                                <td>{{ $cert['certificate_name'] ?? '' }}</td>
                                <td>
                                    <a href="{{ $cert['download_url'] ?? '#' }}" target="_blank">Download</a>
                                </td>
                            </tr>
                        @endforeach
                    @elseif(isset($certificates['error']))
                        <div class="alert alert-danger">{{ $certificates['error'] }}</div>
                    @else
                        <div class="alert alert-warning">No certificate data found.</div>
                    @endif

                    </tbody>
                </table>
            @endif



            <!--<div id="training-container">-->
            <!--    @foreach ($training as $index => $trainings)-->
            <!--        <div class="training-group">-->
            <!--            <div class="row">-->
            <!--                  <input type="hidden" name="trainings[{{ $index }}][training_id]" value="{{ $trainings->id }}">-->
            <!--                <div class="col-md-4 mb-3">-->
            <!--                    <label class="form-label">Trainer Name</label>-->
            <!--                    <input type="text" class="form-control" name="general_trainer_name[]" value="{{ $trainings->general_trainer_name }}" placeholder="Enter trainer name">-->
            <!--                </div>-->
            <!--                <div class="col-md-4 mb-3">-->
            <!--                    <label class="form-label">Training Number</label>-->
            <!--                    <input type="text" class="form-control" name="training_no[]" value="{{ $trainings->training_no }}" placeholder="Enter training number">-->
            <!--                </div>-->
            <!--                <div class="col-md-4 mb-3">-->
            <!--                    <label class="form-label">Training Date</label>-->
            <!--                    <input type="date" class="form-control" name="training_s_date[]" value="{{ $trainings->training_s_date }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-4 mb-3">-->
            <!--                    <label class="form-label">Training Venue</label>-->
            <!--                    <input type="text" class="form-control" placeholder="Enter venue" name="venue[]" value="{{ $trainings->venue }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-4 mb-3">-->
            <!--                    <label class="form-label">Training Region</label>-->
            <!--                    <input type="text" class="form-control" placeholder="Enter region" name="training_region[]" value="{{ $trainings->training_region }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-4 mb-3">-->
            <!--                    <label class="form-label">Name of Training Range (If any)</label>-->
            <!--                    <input type="text" class="form-control" placeholder="Enter range name" name="name_of_range[]" value="{{ $trainings->name_of_range }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-4 mb-3">-->
            <!--                    <label class="form-label">Type of Training</label>-->
            <!--                    <input type="text" class="form-control" placeholder="Enter type" name="type_of_training[]" value="{{ $trainings->type_of_training }}">-->
            <!--                </div>-->
            <!--                <div class="col-md-4 mb-3">-->
            <!--                    <label class="form-label">Training Courses (Attachment)</label>-->
            <!--                    <input type="file" class="form-control" name="training_course_file[]">-->
            <!--                         <div class="file-preview"-->
            <!--                    style="cursor: pointer;"-->
            <!--                     data-files="{{ json_encode(is_array(json_decode($trainings->training_course_file, true)) ? json_decode($trainings->training_course_file, true) : [$trainings->training_course_file]) }}"-->
            <!--                      data-extension="{{ is_array(json_decode($trainings->training_course_file, true)) ? pathinfo(json_decode($trainings->training_course_file, true)[0], PATHINFO_EXTENSION) : pathinfo($trainings->training_course_file, PATHINFO_EXTENSION) }}"-->
            <!--                       onclick="openFileModal(this, 0)">-->
            <!--                    {!! is_array(json_decode($trainings->training_course_file, true)) ? getFilePreview(json_decode($trainings->training_course_file, true)[0]) : getFilePreview($trainings->training_course_file) !!}-->
            <!--                 </div>-->
            <!--                </div>-->
            <!--                <div class="col-md-4 mb-3">-->
            <!--                    <label class="form-label">Proof of Training (Attachment)</label>-->
            <!--                    <input type="file" class="form-control" name="expenses_proof_attach[]">-->
            <!--                     <div class="file-preview"-->
            <!--                    style="cursor: pointer;"-->
            <!--                     data-files="{{ json_encode(is_array(json_decode($trainings->expenses_proof_attach, true)) ? json_decode($trainings->expenses_proof_attach, true) : [$trainings->expenses_proof_attach]) }}"-->
            <!--                      data-extension="{{ is_array(json_decode($trainings->expenses_proof_attach, true)) ? pathinfo(json_decode($trainings->expenses_proof_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($trainings->expenses_proof_attach, PATHINFO_EXTENSION) }}"-->
            <!--                       onclick="openFileModal(this, 0)">-->
            <!--                    {!! is_array(json_decode($trainings->expenses_proof_attach, true)) ? getFilePreview(json_decode($trainings->expenses_proof_attach, true)[0]) : getFilePreview($trainings->expenses_proof_attach) !!}-->
            <!--                 </div>-->
            <!--                </div>-->
            <!--                <div class="col-md-6 mb-3">-->
            <!--                    <label class="form-label">Training Certificate (Attachment)</label>-->
            <!--                    <input type="file" class="form-control" name="training_certificate[]">-->
            <!--                    <div class="file-preview"-->
            <!--                    style="cursor: pointer;"-->
            <!--                     data-files="{{ json_encode(is_array(json_decode($trainings->training_certificate, true)) ? json_decode($trainings->training_certificate, true) : [$trainings->training_certificate]) }}"-->
            <!--                      data-extension="{{ is_array(json_decode($trainings->training_certificate, true)) ? pathinfo(json_decode($trainings->training_certificate, true)[0], PATHINFO_EXTENSION) : pathinfo($trainings->training_certificate, PATHINFO_EXTENSION) }}"-->
            <!--                       onclick="openFileModal(this, 0)">-->
            <!--                    {!! is_array(json_decode($trainings->training_certificate, true)) ? getFilePreview(json_decode($trainings->training_certificate, true)[0]) : getFilePreview($trainings->training_certificate) !!}-->
            <!--                 </div>-->
            <!--                </div>-->
            <!--                <div class="col-md-6 mb-3">-->
            <!--                    <label class="form-label">Attachment (Optional)</label>-->
            <!--                    <input type="file" class="form-control" name="attachment_anyone[]">-->
            <!--                      <div class="file-preview"-->
            <!--                    style="cursor: pointer;"-->
            <!--                     data-files="{{ json_encode(is_array(json_decode($trainings->attachment_anyone, true)) ? json_decode($trainings->attachment_anyone, true) : [$trainings->attachment_anyone]) }}"-->
            <!--                      data-extension="{{ is_array(json_decode($trainings->attachment_anyone, true)) ? pathinfo(json_decode($trainings->attachment_anyone, true)[0], PATHINFO_EXTENSION) : pathinfo($trainings->attachment_anyone, PATHINFO_EXTENSION) }}"-->
            <!--                       onclick="openFileModal(this, 0)">-->
            <!--                    {!! is_array(json_decode($trainings->attachment_anyone, true)) ? getFilePreview(json_decode($trainings->attachment_anyone, true)[0]) : getFilePreview($trainings->attachment_anyone) !!}-->
            <!--                 </div>-->
            <!--                </div>-->
            <!--                <div class="col-md-12 mb-3">-->
            <!--                    <label class="form-label">Notes</label>-->
            <!--                    <textarea class="form-control" rows="3" placeholder="Enter any notes" name="training_notes[]">{{ $trainings->training_notes }}</textarea>-->
            <!--                </div>-->
            <!--                <div class="col-md-12 text-end">-->
            <!--                    <button type="button" class="btn btn-danger remove-training">Remove</button>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--       </div>-->
            <!--    @endforeach-->
            <!--</div>-->

            <!--<div class="mt-3">-->
            <!--    <button type="button" class="btn btn-primary" id="addMore">Add More</button>-->
            <!--</div>-->

            <!-- Table to Display Edited Data -->
            <!--<div class="mt-5">-->
            <!--    <h3>Training Data</h3>-->
            <!--    <table class="table table-bordered">-->
            <!--        <thead>-->
            <!--            <tr>-->
            <!--                <th>#</th>-->
            <!--                <th>Trainer Name</th>-->
            <!--                <th>Training No</th>-->
            <!--                <th>Training Date</th>-->
            <!--                <th>Region</th>-->
            <!--                <th>Type</th>-->
            <!--            </tr>-->
            <!--        </thead>-->
            <!--        <tbody id="trainingTableBody">-->
            <!--            @foreach ($training as $index=>$trainings)-->
            <!--            <tr>-->
            <!--                <td>{{ $index+1 }}</td>-->
            <!--                <td>{{ $trainings->general_trainer_name }}</td>-->
            <!--                <td>{{ $trainings->training_no }}</td>-->
            <!--                <td>{{ $trainings->training_s_date }}</td>-->
            <!--                <td>{{ $trainings->training_region }}</td>-->
            <!--                <td>{{ $trainings->type_of_training }}</td>-->
            <!--            </tr>-->
            <!--            @endforeach-->
            <!--        </tbody>-->
            <!--    </table>-->
            <!--</div>-->

            <script>
              document.getElementById("addMore").addEventListener("click", function() {
                  let container = document.getElementById("training-container");
                  let newGroup = document.querySelector(".training-group").cloneNode(true);

                  // Clear the cloned input values
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
          </div>
          <div class="tab-pane m-3" style="opacity: 90%;" id="payroll" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div id="payrollAccordion">
              <!-- Existing payroll entries -->
              @foreach ($hrms->payrolls as $index => $payroll)
              <div class="accordion-item" id="payrollItem{{ $index }}">
                <h2 class="accordion-header" id="payrollHeading{{ $index }}">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#payrollCollapse{{ $index }}" aria-expanded="true"
                    aria-controls="payrollCollapse{{ $index }}">
                    {{ optional($payroll->created_at)->format('M, Y') ?? 'N/A' }}
                    <!--{{ $index+1 }}-->

                  </button>
                </h2>
                <div id="payrollCollapse{{ $index }}" class="accordion-collapse collapse show" aria-labelledby="payrollHeading{{ $index }}"
                  data-bs-parent="#payrollAccordion">
                  <div class="accordion-body">
                    <div class="row">
                      <input type="hidden" name="payrolls[{{$index}}][p_id]" value="{{ $hrms->id }}">
                      <!--<input type="hidden" class="form-control" name="payrolls[{{$index}}][employee_id]" value="{{ $hrms->id }}" >-->

                      <!--<div class="col-md-4 mb-3">-->
                      <!--    <label class="form-label">Employee Name</label>-->
                      <!--    <input type="text" class="form-control" name="payrolls[{{$index}}][p_name]" value="{{ $hrms->name }}" >-->
                      <!--</div>-->

                      <!--<div class="col-md-4 mb-3">-->
                      <!--    <label class="form-label">Designation</label>-->
                      <!--    <input type="text" class="form-control" name="payrolls[{{$index}}][p_designation]" value="{{ $hrms->designation }}" >-->
                      <!--</div>-->
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Department</label>
                        <input type="text" class="form-control" name="payrolls[{{$index}}][p_department]" value="{{ $payroll->p_department }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Payroll Month</label>
                        <input type="date" class="form-control" name="payrolls[{{$index}}][pay_month]" value="{{ $payroll->pay_month }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Salary Details</label>
                        <input type="text" class="form-control" name="payrolls[{{$index}}][p_salary_details]" value="{{ $payroll->p_salary_details }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Attendance Records</label>
                        <input type="text" class="form-control" name="payrolls[{{$index}}][p_attendance_records]" value="{{ $payroll->p_attendance_records }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Leave Records</label>
                        <input type="text" class="form-control" name="payrolls[{{$index}}][p_leave_records]" value="{{ $payroll->p_leave_records }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Total Overtime Hours</label>
                        <input type="number" class="form-control" name="payrolls[{{$index}}][p_total_overtime_hours]"
                          value="{{ $payroll->p_total_overtime_hours }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Overtime Rate</label>
                        <input type="text" class="form-control" name="payrolls[{{$index}}][p_overtime_rate]" value="{{ $payroll->p_overtime_rate }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Tax Deductions</label>
                        <input type="tel" class="form-control" name="payrolls[{{$index}}][p_tax_deductions]" value="{{ $payroll->p_tax_deductions }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Insurance Deductions</label>
                        <input type="number" class="form-control" name="payrolls[{{$index}}][p_insurance_deductions]"
                          value="{{ $payroll->p_insurance_deductions }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Performance Bonus</label>
                        <input type="text" class="form-control" name="payrolls[{{$index}}][p_performance_bonus]" value="{{ $payroll->p_performance_bonus }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Year-end Bonus</label>
                        <input type="text" class="form-control" name="payrolls[{{$index}}][p_year_end_bonus]" value="{{ $payroll->p_year_end_bonus }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Other Allowances</label>
                        <input type="text" class="form-control" name="payrolls[{{$index}}][p_other_allowances]" value="{{ $payroll->p_other_allowances }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Gross Salary</label>
                        <input type="number" class="form-control" name="payrolls[{{$index}}][p_gross_salary]" value="{{ $payroll->p_gross_salary }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Total Deductions</label>
                        <input type="number" class="form-control" name="payrolls[{{$index}}][p_total_deductions]" value="{{ $payroll->p_total_deductions }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Net Salary</label>
                        <input type="number" class="form-control" name="payrolls[{{$index}}][p_net_salary]" value="{{ $payroll->p_net_salary }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">EOBI</label>
                        <input type="number" class="form-control" name="payrolls[{{$index}}][peobi]" value="{{ $payroll->peobi }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Employee Pay Slips</label>
                        <input type="file" class="form-control" name="payrolls[{{$index}}][p_employee_pay_slips]" value="{{ $payroll->p_employee_pay_slips }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Payroll Reports</label>
                        <input type="file" class="form-control" name="payrolls[{{$index}}][p_payroll_reports]" value="{{ $payroll->p_payroll_reports }}">
                      </div>

                      <div class="col-md-4 mb-3">
                        <label class="form-label">Other Deductions</label>
                        <input type="text" class="form-control" name="payrolls[{{$index}}][p_other_deductions]" value="{{ $payroll->p_other_deductions }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Lunch Allowlance</label>
                        <input type="text" class="form-control" name="payrolls[{{$index}}][lunch_allowlance]" value="{{ $payroll->lunch_allowlance }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Payroll Other</label>
                        <input type="text" class="form-control" name="payrolls[{{$index}}][p_others]" value="{{ $payroll->p_others }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Other Misc</label>
                        <input type="text" class="form-control" name="payrolls[{{$index}}][p_misc]" value="{{ $payroll->p_misc }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Payroll Income Tax</label>
                        <input type="text" class="form-control" name="payrolls[{{$index}}][income_tax]" value="{{ $payroll->income_tax }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Payroll Advance</label>
                        <input type="text" class="form-control" name="payrolls[{{$index}}][p_advance]" value="{{ $payroll->p_advance }}">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label class="form-label">Payroll total earning</label>
                        <input type="text" class="form-control" name="payrolls[{{$index}}][total_earning]" value="{{ $payroll->total_earning }}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <button type="button" id="addpayrollEntry" class="btn btn-primary">Add More payroll Details</button>
            <div id="payroll_add_fields">
            </div>
            <div class="table-responsive">
              <table class="table table-bordered mt-1" id="payrollSummaryTable">
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
                    <th>Employee Pay Slips</th>
                    <th>Payroll Reports</th>
                    <th>Other Deductions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($hrms->payrolls as $index => $payroll)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $payroll->p_name }}</td>
                    <td>{{ $payroll->p_designation }}</td>
                    <td>{{ $payroll->p_department }}</td>
                    <td>{{ $payroll->p_salary_details }}</td>
                    <td>{{ $payroll->p_attendance_records }}</td>
                    <td>{{ $payroll->p_leave_records }}</td>
                    <td>{{ $payroll->p_total_overtime_hours }}</td>
                    <td>{{ $payroll->p_overtime_rate }}</td>
                    <td>{{ $payroll->p_tax_deductions }}</td>
                    <td>{{ $payroll->p_insurance_deductions }}</td>
                    <td>{{ $payroll->p_performance_bonus }}</td>
                    <td>{{ $payroll->p_year_end_bonus }}</td>
                    <td>{{ $payroll->p_other_allowances }}</td>
                    <td>{{ $payroll->p_gross_salary }}</td>
                    <td>{{ $payroll->p_total_deductions }}</td>
                    <td>{{ $payroll->p_net_salary }}</td>
                    <td>{{ $payroll->p_employee_pay_slips }}</td>
                    <td>{{ $payroll->p_payroll_reports }}</td>
                    <td>{{ $payroll->p_other_deductions }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>

          </div>
          <!--Inspection-->
          <div class="tab-pane fade m-3" style="opacity: 90%;" id="inspection" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
              <div class="col-lg-12 spacing-right">
                <div class="row mb-2">
                  <h5>Inspection Performed By :</h5>
                  <div class="col-lg-4 spacing-left spacing-right">
                    Employee No <br> <input class="form-control" type="text" value="{{ $hrms->insp_no }}" name="insp_no" placeholder="" style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-left spacing-right">
                    Name <br> <input class="form-control" type="text" value="{{ $hrms->insp_name }}" name="insp_name" placeholder="" style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-left">
                    Cell No. <br> <input class="form-control" type="text" value="{{ $hrms->insp_cell }}" name="insp_cell" placeholder="..."
                      style="width: 100%;">
                  </div>
                  <div class="col-lg-4 spacing-left">
                    Date of Inspection <br> <input class="form-control" value="{{ $hrms->insp_date }}" type="date" name="insp_date" placeholder="..."
                      style="width: 100%;">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 spacing-left">
                    Picture of Inspection <br> <input class="form-control basic-info-attachements" id="inpFile43" type="file" name="insp_pic" placeholder="..."
                      style="width: 100%;" multiple>
                    <div class="col-lg-5 spacing-right">
                      <!-- Image Preview Biometric -->
                      <div class="file-preview" style="cursor: pointer;"
                        data-files="{{ json_encode(is_array(json_decode($hrms->h_verify, true)) ? json_decode($hrms->h_verify, true) : [$hrms->h_verify]) }}"
                        data-extension="{{ is_array(json_decode($hrms->h_verify, true)) ? pathinfo(json_decode($hrms->h_verify, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->h_verify, PATHINFO_EXTENSION) }}"
                        onclick="openFileModal(this, 0)">
                        {!! is_array(json_decode($hrms->h_verify, true)) ? getFilePreview(json_decode($hrms->h_verify, true)[0]) :
                        getFilePreview($hrms->h_verify) !!}
                      </div>
                      <!--<div class="image-preview42" id="imagePreview42">-->
                      <!--    @if($hrms->h_verify)-->
                      <!--    <img src="{{ asset($hrms->h_verify) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">-->
                      <!--    @else-->
                      <!--    <span class="image-preview__default-text42">Image Preview</span>-->
                      <!--    @endif-->
                      <!--</div>-->
                    </div>
                  </div>
                  <div class="col-lg-4 spacing-right spacing-left">
                    Remarks of Petroling Officer <br> <textarea class="form-control basic-info-attachements" value="{{ $hrms->rem_petr }}" type="text"
                      name="rem_petr" placeholder="..." style="width: 100%;" multiple></textarea>
                  </div>
                  <div class="col-lg-4 spacing-left">
                    Attachments <br> <input class="form-control basic-info-attachements" id="inpFile2" type="file" name="insp_attach" placeholder="..."
                      style="width: 100%;" multiple>
                  </div>
                  <div class="row">
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->insp_attach, true)) ? json_decode($hrms->insp_attach, true) : [$hrms->insp_attach]) }}"
                      data-extension="{{ is_array(json_decode($hrms->insp_attach, true)) ? pathinfo(json_decode($hrms->insp_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->insp_attach, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->insp_attach, true)) ? getFilePreview(json_decode($hrms->insp_attach, true)[0]) :
                      getFilePreview($hrms->insp_attach) !!}
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
                    Notes <br> <textarea class="form-control basic-info-attachements" type="file" name="insp_notes" placeholder="..."
                      style="width: 100%;">{{ $hrms->insp_notes }}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Observation-->
          <div class="tab-pane fade m-3 p-4" style="opacity: 90% ; " id="observation" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
              <div class="col-lg-6 spacing-left">
                <h5>Observation :</h5>
                <div class="row mb-2">
                  <div class="col-lg-12">
                    <label for="Type Of Training:" class="form-check-label spacing-right">Observation Month</label>
                    <input class="form-control" type="date" name="observ_mon" value="{{ $hrms->observ_mon }}" placeholder="..." />
                  </div>
                  <div class="col-lg-12 spacing-right">
                    Observation Type
                    <div class="input-group" style="width: 100%;">
                      <select id="observ_type" class="form-control mt-1" name="observ_type" style="width: 80%; border-radius: 4px 0 0 4px;">
                        <option value="">Select an Observation</option>
                        @foreach (App\Models\Observation::all() as $observation)
                        <option value="{{ $observation->o_name }}" {{ old('observ_type', $hrms->observ_type) == $observation->o_name ? 'selected' : '' }}>
                          {{ $observation->o_name }}
                        </option>
                        @endforeach
                      </select>

                      <div class="input-group-append" style="width: 20%;">
                        <a href="{{route('Observation.add')}}">
                          <button class="btn btn-primary" id="submit-region" type="button"
                            style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 spacing-left spacing-right" style="margin-left:12px">
                    Remarks by HR <br> <textarea class="form-control" type="text" name="hr_remark" placeholder="...">{{ $hrms->hr_remark }}</textarea>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-12 spacing-right">
                    Attachment <br> <input class="form-control" type="file" name="ex_observ_attach" placeholder="...">
                  </div>
                  <div class="row">
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->ex_observ_attach, true)) ? json_decode($hrms->ex_observ_attach, true) : [$hrms->ex_observ_attach]) }}"
                      data-extension="{{ is_array(json_decode($hrms->ex_observ_attach, true)) ? pathinfo(json_decode($hrms->ex_observ_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->ex_observ_attach, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->ex_observ_attach, true)) ? getFilePreview(json_decode($hrms->ex_observ_attach, true)[0]) :
                      getFilePreview($hrms->ex_observ_attach) !!}
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
                  <div class="col-lg-12 spacing-right">
                    Appraisal (PKR)<br> <input class="form-control" type="text" value="{{ $hrms->appraisal }}" name="appraisal" placeholder="..."
                      style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-lg-12 spacing-right">
                    Appraisal Screenshot Attachment<br> <input class="form-control" type="file" name="appraisal_attach" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="row">
                    <div class="file-preview" style="cursor: pointer;"
                      data-files="{{ json_encode(is_array(json_decode($hrms->appraisal_attach, true)) ? json_decode($hrms->appraisal_attach, true) : [$hrms->appraisal_attach]) }}"
                      data-extension="{{ is_array(json_decode($hrms->appraisal_attach, true)) ? pathinfo(json_decode($hrms->appraisal_attach, true)[0], PATHINFO_EXTENSION) : pathinfo($hrms->appraisal_attach, PATHINFO_EXTENSION) }}"
                      onclick="openFileModal(this, 0)">
                      {!! is_array(json_decode($hrms->appraisal_attach, true)) ? getFilePreview(json_decode($hrms->appraisal_attach, true)[0]) :
                      getFilePreview($hrms->appraisal_attach) !!}
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
                  <div class="col-lg-12 spacing-right">
                    Notes<br> <textarea class="form-control" type="file" name="appraisal_notes" placeholder="..."
                      style="width: 100%;">{{ $hrms->appraisal_notes }}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</section>
</div>

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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
  crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script>
  // Counter to track the number of payroll details entries
  let payrollCount = {{ count($hrms->payrolls) }};

  // Function to add a new payroll details entry
  function addpayrollEntry() {
      payrollCount++; // Increment the counter
      const currentDate = new Date();
      const options = { day: 'numeric', month: 'short', year: 'numeric' };
      const formattedDate = currentDate.toLocaleDateString('en-US', options);
      const newEntryHtml = `
          <div class="accordion-item" id="payrollItem${payrollCount}">
              <h2 class="accordion-header" id="payrollHeading${payrollCount}">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#payrollCollapse${payrollCount}" aria-expanded="true" aria-controls="payrollCollapse${payrollCount}">
                    ${formattedDate}
                  </button>
              </h2>
              <div id="payrollCollapse${payrollCount}" class="accordion-collapse collapse show" aria-labelledby="payrollHeading${payrollCount}" data-bs-parent="#payrollAccordion">
                  <div class="accordion-body">
                               <div class="row">
                            <input type="hidden" name="payrolls[${payrollCount - 1}][p_id]" value="{{ $payroll->id??"null" }}">


                            <div class="col-md-4 mb-3">
                                <label class="form-label">Department</label>
                                <input type="text" class="form-control" name="payrolls[${payrollCount - 1}][p_department]"  >
                            </div>
                             <div class="col-md-4 mb-3">
                                <label class="form-label">Payroll Month</label>
                                <input type="date" class="form-control" name="payrolls[${payrollCount - 1}][pay_month]" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Salary Details</label>
                                <input type="text" class="form-control" name="payrolls[${payrollCount - 1}][p_salary_details]" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Attendance Records</label>
                                <input type="text" class="form-control" name="payrolls[${payrollCount - 1}][p_attendance_records]"  >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Leave Records</label>
                                <input type="text" class="form-control" name="payrolls[${payrollCount - 1}][p_leave_records]"  >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Total Overtime Hours</label>
                                <input type="number" class="form-control" name="payrolls[${payrollCount - 1}][p_total_overtime_hours]"  >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Overtime Rate</label>
                                <input type="text" class="form-control" name="payrolls[${payrollCount - 1}][p_overtime_rate]" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Tax Deductions</label>
                                <input type="tel" class="form-control" name="payrolls[${payrollCount - 1}][p_tax_deductions]"  >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Insurance Deductions</label>
                                <input type="number" class="form-control" name="payrolls[${payrollCount - 1}][p_insurance_deductions]"  >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Performance Bonus</label>
                                <input type="text" class="form-control" name="payrolls[${payrollCount - 1}][p_performance_bonus]" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Year-end Bonus</label>
                                <input type="text" class="form-control" name="payrolls[${payrollCount - 1}][p_year_end_bonus]"  >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Other Allowances</label>
                                <input type="text" class="form-control" name="payrolls[${payrollCount - 1}][p_other_allowances]"  >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Gross Salary</label>
                                <input type="number" class="form-control" name="payrolls[${payrollCount - 1}][p_gross_salary]"  >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Total Deductions</label>
                                <input type="number" class="form-control" name="payrolls[${payrollCount - 1}][p_total_deductions]"  >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Net Salary</label>
                                <input type="number" class="form-control" name="payrolls[${payrollCount - 1}][p_net_salary]" >
                            </div>
                             <div class="col-md-4 mb-3">
                                <label class="form-label">EOBI</label>
                                <input type="number" class="form-control" name="payrolls[${payrollCount - 1}][peobi]" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Employee Pay Slips</label>
                                <input type="file" class="form-control" name="payrolls[${payrollCount - 1}][p_employee_pay_slips]"  >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Payroll Reports</label>
                                <input type="file" class="form-control" name="payrolls[${payrollCount - 1}][p_payroll_reports]" >
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Other Deductions</label>
                                <input type="number" class="form-control" name="payrolls[${payrollCount - 1}][p_other_deductions]" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Lunch Allowlance</label>
                                <input type="text" class="form-control" name="payrolls[${payrollCount - 1}][lunch_allowlance]" >
                            </div>
                                <div class="col-md-4 mb-3">
                                <label class="form-label">Payroll Other</label>
                                <input type="number" class="form-control" name="payrolls[${payrollCount - 1}][p_others]" >
                            </div>
                                <div class="col-md-4 mb-3">
                                <label class="form-label">Other Misc</label>
                                <input type="number" class="form-control" name="payrolls[${payrollCount - 1}][p_misc]" >
                            </div>
                                <div class="col-md-4 mb-3">
                                <label class="form-label">Payroll Income Tax</label>
                                <input type="number" class="form-control" name="payrolls[${payrollCount - 1}][income_tax]" >
                            </div>
                              <div class="col-md-4 mb-3">
                                <label class="form-label">Payroll Advance</label>
                                <input type="number" class="form-control" name="payrolls[${payrollCount - 1}][p_advance]" >
                            </div>
                              <div class="col-md-4 mb-3">
                                <label class="form-label">Payroll Total Earning</label>
                                <input type="number" class="form-control" name="payrolls[${payrollCount - 1}][total_earning]" >
                            </div>
              </div>
                  </div>
              </div>
          </div>
      `;
      // Append the new entry HTML to the container
      $('#payrollAccordion').append(newEntryHtml);
  }

  // Add event listener to the button for adding more payroll details entries
  $('#addpayrollEntry').on('click', function() {
      addpayrollEntry();
  });
</script>


<script>
// Function to calculate the gap between two dates
function calculateDateGap(endDateStr, startDateStr) {
    if (!endDateStr || !startDateStr) return '';
    
    const endDate = new Date(endDateStr);
    const startDate = new Date(startDateStr);
    
    if (isNaN(endDate) || isNaN(startDate)) return '';
    
    if (startDate <= endDate) {
        return 'No gap or overlap';
    }
    
    let years = startDate.getFullYear() - endDate.getFullYear();
    let months = startDate.getMonth() - endDate.getMonth();
    let days = startDate.getDate() - endDate.getDate();
    
    if (days < 0) {
        months--;
        days += new Date(startDate.getFullYear(), startDate.getMonth(), 0).getDate();
    }
    
    if (months < 0) {
        years--;
        months += 12;
    }
    
    let gapStr = '';
    if (years > 0) gapStr += `${years} year${years > 1 ? 's' : ''} `;
    if (months > 0) gapStr += `${months} month${months > 1 ? 's' : ''} `;
    if (days > 0) gapStr += `${days} day${days > 1 ? 's' : ''}`;
    
    return gapStr.trim() || 'No gap';
}

// Function to calculate all education gaps
function calculateAllEducationGaps() {
    const educationItems = document.querySelectorAll('#educationAccordion .accordion-item');
    
    for (let i = 1; i < educationItems.length; i++) {
        const prevItem = educationItems[i - 1];
        const currItem = educationItems[i];
        
        const prevEndInput = prevItem.querySelector('input[name$="[date_end]"]');
        const currStartInput = currItem.querySelector('input[name$="[date_start]"]');
        const gapP = currItem.querySelector('p[id="gapeduResults"]');
        
        if (prevEndInput && currStartInput && gapP) {
            const gap = calculateDateGap(prevEndInput.value, currStartInput.value);
            gapP.textContent = gap ? `Gap: ${gap}` : '';
        }
    }
}

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
                        <input type="hidden" name="education[${educationCount - 1}][d_id]" value="">
                        <div class="col-lg-6">
                            <div class="row mb-2">
                                <div class="form-type col-lg-3">
                                    Name of Degree <br> <input class="form-control" type="text" value="" name="education[${educationCount - 1}][degree]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="form-type col-lg-3">
                                    Date <br> <input class="form-control" type="date" name="education[${educationCount - 1}][degree_date]" value="" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="form-type col-lg-5 spacing-left">
                                    Scanned Certificate of Degree <br> <input class="form-control" type="file" name="education[${educationCount - 1}][degree_pic]" placeholder="..." style="width: 100%;" multiple>
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
                                    Institute Name <br> <input class="form-control" name="education[${educationCount - 1}][institute_name]" value="" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 form-type spacing-left">
                                    Awarding Body <br> <input class="form-control" name="education[${educationCount - 1}][a_body]" type="text" value="" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-11 ">
                                    Notes <br>
                                    <textarea id="w3review" class="form-control" style="width: 100%;" name="education[${educationCount - 1}][ex_notes]" rows="4" cols="40">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-left">
                            <div class="row mb-3">
                                <div class="form-type col-lg-5 spacing-right">
                                    Degree No. <br> <input class="form-control" name="education[${educationCount - 1}][degree_no]" value="" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="form-type col-lg-5 spacing-left spacing-right">
                                    Degree Level <br> <input class="form-control" name="education[${educationCount - 1}][degree_level]" value="" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-type col-lg-5 spacing-right">
                                    Marks Obtained <br> <input class="form-control" type="text" name="education[${educationCount - 1}][ob_marks]" value="" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="form-type col-lg-5 spacing-right">
                                    Total Marks <br> <input class="form-control" type="text" name="education[${educationCount - 1}][t_marks]" value="" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="form-type col-lg-5 spacing-right">
                                    Grade <br> <input class="form-control" type="text" name="education[${educationCount - 1}][grade]" value="" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-type col-lg-4 spacing-right">
                                    Previous Education Start Date <br> <input class="form-control" type="date" name="education[${educationCount - 1}][date_start]" value="" placeholder="..." style="width: 110%;">
                                </div>
                                <div class="form-type col-lg-4 spacing-right">
                                    Previous Education End Date <br> <input class="form-control" type="date" name="education[${educationCount - 1}][date_end]" value="" placeholder="..." style="width: 110%;">
                                </div>
                                <div class="form-type col-lg-12 spacing-right mb-5">
                                    <p class="text-danger">Gaps between Educational Career</p>
                                    <p id="gapeduResults"></p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-10 mt-3 form-type spacing-right">
                                    Address of Institution <br> <input class="form-control" name="education[${educationCount - 1}][adress_inst]" value="" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Attachement <br> <input class="form-control" type="file" name="education[${educationCount - 1}][deg_attach]" placeholder="..." style="width: 100%;" multiple>
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
                        <div id="education_add_fields">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    // Append the new entry HTML to the accordion container
    $('#educationAccordion').append(newEntryHtml);
    
    // Recalculate gaps after adding a new entry
    calculateAllEducationGaps();
}

// Add event listener to the button for adding more education entries
$('#addEducationEntry').on('click', function() {
    addEducationEntry();
});

// Event listener for date changes in education section
document.addEventListener('change', (e) => {
    if (e.target.matches('input[name$="[date_start]"], input[name$="[date_end]"]') && e.target.closest('#educationAccordion')) {
        calculateAllEducationGaps();
    }
});

// Initial calculation on page load
document.addEventListener('DOMContentLoaded', () => {
    calculateAllEducationGaps();
});
</script>


<script>
// Counter to track the number of work experience entries
let workCount = {{ count($hrms->workExperiences) }};

// Function to calculate the gap between two dates
function calculateDateGap(endDateStr, startDateStr) {
    if (!endDateStr || !startDateStr) return '';
    
    const endDate = new Date(endDateStr);
    const startDate = new Date(startDateStr);
    
    if (isNaN(endDate) || isNaN(startDate)) return '';
    
    if (startDate <= endDate) {
        return 'No gap or overlap';
    }
    
    let years = startDate.getFullYear() - endDate.getFullYear();
    let months = startDate.getMonth() - endDate.getMonth();
    let days = startDate.getDate() - endDate.getDate();
    
    if (days < 0) {
        months--;
        days += new Date(startDate.getFullYear(), startDate.getMonth(), 0).getDate();
    }
    
    if (months < 0) {
        years--;
        months += 12;
    }
    
    let gapStr = '';
    if (years > 0) gapStr += `${years} year${years > 1 ? 's' : ''} `;
    if (months > 0) gapStr += `${months} month${months > 1 ? 's' : ''} `;
    if (days > 0) gapStr += `${days} day${days > 1 ? 's' : ''}`;
    
    return gapStr.trim() || 'No gap';
}

// Function to calculate all work experience gaps
function calculateAllWorkGaps() {
    const workItems = document.querySelectorAll('#workAccordion .accordion-item');
    
    for (let i = 1; i < workItems.length; i++) {
        const prevItem = workItems[i - 1];
        const currItem = workItems[i];
        
        const prevEndInput = prevItem.querySelector('input[name$="[end_date]"]');
        const currStartInput = currItem.querySelector('input[name$="[join_date]"]');
        const gapP = currItem.querySelector('p[id="gapResult"]');
        
        if (prevEndInput && currStartInput && gapP) {
            const gap = calculateDateGap(prevEndInput.value, currStartInput.value);
            gapP.textContent = gap ? `Gap: ${gap}` : '';
        }
    }
}

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
                        <input type="hidden" name="workExperiences[${workCount - 1}][w_id]" value="">
                        <div class="col-lg-5">
                            <div class="row mb-2">
                                <div class="col-lg-11 spacing-right">
                                    Organization Name <br> <input class="form-control" name="workExperiences[${workCount - 1}][org_name]" value="" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-7 spacing-right">
                                    Email of the Company <br> <input class="form-control" name="workExperiences[${workCount - 1}][email_oc]" value="" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    POC <br> <input class="form-control" type="text" name="workExperiences[${workCount - 1}][poc]" value="" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Job Experience Certificate <br> <input class="form-control" name="workExperiences[${workCount - 1}][jec]" type="file" placeholder="..." style="width: 100%;" multiple>
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
                                    Attachments <br> <input class="form-control" name="workExperiences[${workCount - 1}][jec_attach]" type="file" placeholder="..." style="width: 100%;">
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
                                    Designation <br> <input class="form-control" name="workExperiences[${workCount - 1}][w_desig]" value="" type="text" placeholder="..." style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Salary <br> <input class="form-control" name="workExperiences[${workCount - 1}][w_salary]" value="" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 spacing-left">
                            <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                    Service Tenure <br> <input class="form-control" name="workExperiences[${workCount - 1}][ser_tenure]" value="" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right spacing-left">
                                    Others <br> <input class="form-control" type="file" name="workExperiences[${workCount - 1}][ser_other]" placeholder="..." style="width: 100%;">
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
                                    Inservice Awards /Achievements <br> <input class="form-control" name="workExperiences[${workCount - 1}][achivement]" value="" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Total Experience <br> <input class="form-control" type="text" name="workExperiences[${workCount - 1}][t_exp]" value="" placeholder="" style="width: 100%;" multiple>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-4 spacing-right">
                                    Joining Date <br> <input class="form-control" type="date" name="workExperiences[${workCount - 1}][join_date]" value="" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right spacing-left">
                                    End Date <br> <input class="form-control" type="date" name="workExperiences[${workCount - 1}][end_date]" value="" placeholder="..." style="width: 100%;" multiple>
                                </div>
                                <div class="col-lg-4 spacing-right mb-5">
                                    <p class="text-danger">Gaps between Working Career</p>
                                    <p id="gapResult"></p>
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
    
    // Recalculate gaps after adding a new entry
    calculateAllWorkGaps();
}

// Add event listener to the button for adding more work experience entries
$('#addWorkEntry').on('click', function() {
    addWorkEntry();
});

// Event listener for date changes in work experience section
document.addEventListener('change', (e) => {
    if (e.target.matches('input[name$="[join_date]"], input[name$="[end_date]"]') && e.target.closest('#workAccordion')) {
        calculateAllWorkGaps();
    }
});

// Initial calculation on page load
document.addEventListener('DOMContentLoaded', () => {
    calculateAllWorkGaps();
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
                              <input type="hidden" name="guarantors[${guarantorCount - 1}][g_id]" value="">
                              <div class="row mb-2">
                                  <div class="col-lg-5 spacing-right">
                                      Name  <br>  <input class="form-control" name="guarantors[${guarantorCount - 1}][g_name]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-6 spacing-left spacing-right">
                                      Father Name <br>  <input class="form-control" name="guarantors[${guarantorCount - 1}][g_fname]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                              <div class="row mb-2">
                                  <div class="col-lg-6 spacing-right">
                                      Relationship<br>  <input class="form-control" type="text" value="" name="guarantors[${guarantorCount - 1}][g_relation]" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-left spacing-right">
                                      Tenure of Relation<br>  <input class="form-control" type="text" value="" name="guarantors[${guarantorCount - 1}][g_tenure_rel]"  placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                              <div class="row mb-2">
                                  <div class="col-lg-6 spacing-right">
                                  CNIC (front)  <br>  <input class="form-control" type="file" value="" name="guarantors[${guarantorCount - 1}][g_cnic_f]" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-left spacing-right">
                                  CNIC (back)  <br>  <input class="form-control" type="file" value="" name="guarantors[${guarantorCount - 1}][g_cnic_b]" placeholder="..." style="width: 100%;">
                              </div>
                              </div>
                              <div class="row mb-2">
                                  <div class="col-lg-11 spacing-right">
                                      Postal Verification of References <br>  <input class="form-control" value="" name="guarantors[${guarantorCount - 1}][pos_verify]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6 spacing-left">
                              <h5>Address :</h5>
                              <div class="row mb-2">
                                  <div class="col-lg-5 spacing-right">
                                      Office No <br> <input class="form-control" id="head_office_cell_no" name="guarantors[${guarantorCount - 1}][head_office_no]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-left">
                                      Floor No <br> <input class="form-control" id="head_office_cell_no" name="guarantors[${guarantorCount - 1}][head_floor_no]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                              <div class="row mb-2">
                                  <div class="col-lg-5 spacing-right">
                                      Building <br> <input class="form-control" id="head_office_cell_no" name="guarantors[${guarantorCount - 1}][head_building]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-left">
                                      Block <br> <input class="form-control" id="head_office_cell_no" name="guarantors[${guarantorCount - 1}][head_block]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                              <div class="row mb-2">
                                  <div class="col-lg-5 spacing-right">
                                      Area <br> <input class="form-control" id="head_office_cell_no" name="guarantors[${guarantorCount - 1}][head_area]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-left">
                                      City <br> <input class="form-control" id="head_office_cell_no" name="guarantors[${guarantorCount - 1}][head_city]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                              <div class="row mb-2">
                                  <div class="col-lg-11 spacing-right">
                                      Attachements <br>  <input class="form-control" type="file" name="guarantors[${guarantorCount - 1}][head_attach]"  placeholder="..." style="width: 88%;" multiple>
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
  divtest.innerHTML = '<div class="row"><div class="col-lg-6"><div class="row mb-2"><div class="form-type col-lg-3">Name of Degree <br> <input class="form-control" type="text" name="degree[]" placeholder="..." style="width: 100%;"></div><div class="form-type col-lg-3">Date <br> <input class="form-control" type="date" name="degree_date[]" placeholder="..." style="width: 100%;"></div><div class="form-type col-lg-5 spacing-left">Scanned Certificate of Degree <br> <input class="form-control" type="file" name="degree_pic[]" placeholder="..." style="width: 100%;" multiple></div><div class="col-lg-3 spacing-right" style="margin-left:248px;"><div class="image-preview28" id="imagePreview28"><img src="" alt="Image Preview28" class="image-preview__image28" style="height: 50%; width:50%;"><span class="image-preview__default-text28"> Image Preview </span></div></div></div><div class="row mb-2"><div class="col-lg-6 form-type spacing-right">Institute Name <br> <input class="form-control" name="institute_name[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 form-type spacing-left">Awarding Body <br> <input class="form-control" name="a_body[]" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-12 spacing-left"></div></div><div class="row"><div class="col-lg-11">Notes <br> <textarea class="form-control" style="width: 100%;" name="ex_notes[]" rows="4" cols="40"></textarea></div></div></div><div class="col-lg-4 spacing-left"><div class="row mb-3"><div class="form-type col-lg-5 spacing-right">Degree No. <br> <input class="form-control" name="degree_no[]" type="text" placeholder="..." style="width: 100%;"></div><div class="form-type col-lg-5 spacing-left spacing-right">Degree Level <br> <input class="form-control" name="degree_level[]" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="form-type col-lg-5 spacing-right">Marks Obtained <br> <input class="form-control" type="text" name="ob_marks[]" placeholder="..." style="width: 100%;"></div><div class="form-type col-lg-5 spacing-right">Total Marks <br> <input class="form-control" type="text" name="t_marks[]" placeholder="..." style="width: 100%;"></div><div class="form-type col-lg-5 spacing-right">Grade <br> <input class="form-control" type="text" name="grade[]" placeholder="..." style="width: 100%;"></div></div><div class="row"><div class="form-type col-lg-5 spacing-right">Previous Education Start Date <br> <input class="form-control" type="date" name="date_start[]" placeholder="..." style="width: 100%;"></div><div class="form-type col-lg-5 spacing-right">End Date <br> <input class="form-control" type="date" name="date_end[]" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-10 mt-3 form-type spacing-right">Address of Institution <br> <input class="form-control" name="adress_inst[]" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-5 spacing-right">Attachement <br> <input class="form-control" type="file" name="deg_attach[]" placeholder="..." style="width: 100%;" multiple></div></div><button type="button" class="remove-btn" onclick="education_remove_fields('+ room1 +')">Remove</button></div></div>';
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
  divtest.innerHTML = '<div class="row"><div class="col-lg-5"><div class="row mb-2"><div class="col-lg-11 spacing-right">Organization Name <br> <input class="form-control" name="org_name[]" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-7 spacing-right">Email of the Company<br> <input class="form-control" name="email_oc[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-4 spacing-right">POC <br> <input class="form-control" type="text" name="poc[]" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right">Job Experience Certificate <br> <input class="form-control" name="jec[]" type="file" placeholder="..." style="width: 100%;" multiple></div><div class="col-lg-5 spacing-left spacing-right">Attachements <br> <input class="form-control" name="jec_attach[]" type="file" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right">Designation <br> <input class="form-control" name="w_desig[]" type="text" placeholder="..." style="width: 100%;" multiple></div><div class="col-lg-5 spacing-left spacing-right">Salary <br> <input class="form-control" name="w_salary[]" type="text" placeholder="..." style="width: 100%;"></div></div></div><div class="col-lg-4 spacing-left"><div class="row mb-2"><div class="col-lg-6 spacing-right">Service Tenure <br> <input class="form-control" name="ser_tenure[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-right spacing-left">Others <br> <input class="form-control" type="file" name="ser_other[]" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-11 spacing-right">Inservice Awards /Achivements <br> <input class="form-control" name="achivement[]" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right">Joining Date <br> <input class="form-control" type="date" name="join_date[]" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-right spacing-left">End Date <br> <input class="form-control" type="date" name="end_date[]" placeholder="..." style="width: 100%;" multiple></div><div class="col-lg-5 spacing-right" style="margin-top:10px;">Total Experience <br> <input class="form-control" type="text" name="t_exp[]" placeholder="" style="width: 100%;" multiple></div></div><button type="button" class="remove-btn" onclick="work_remove_fields('+ room2 +')">Remove</button></div></div>';
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


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
