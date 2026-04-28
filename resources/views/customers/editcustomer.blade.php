@include('layouts.header')
@yield('main')
{{-- <option value="{{ $compliance->compliance_name }}" @if($compliance->compliance_name ==
  $customers->applicable_compliances) selected
  @endif>{{ $compliance->compliance_name }}</option> --}}
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
  <!--Popup model for User new entry-->
  <!-- <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true"> -->
  <!-- <div class="modal-dialog" role="document" style="max-width: 75%;"> -->
  <!-- <div class="modal-content"> -->
  <div class="modal-header border-0">
    <!-- <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;"> </h4> -->
    <!-- <button type="button" class="close" aria-label="Close" onclick="closeModal()">
         <span aria-hidden="true">&times;</span>
         </button> -->
  </div>
  <!-- <div class="modal-body"> -->
  <section>
    <div class="modal-header border-0">
      <div style="display:flex; column-gap:10px; align-items:center">
        <button type="button" class="btn btn-link" onclick="history.back()">
          <i class="bi bi-arrow-left"></i>
        </button>
        <h5 class="mt-3" style="font-weight: 700;"> Edit Customers: </h5>
      </div>
    </div>
    <form action="{{ route('update_customer', ['id' => $customers->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <!--Customer / Main Form-->
      <div class="row mb-2" style="margin-left: 20px;">
        <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
          <div>
            <h5>Customer Activation Status</h5>
            <div class="form-check form-check-inline" style="margin-right: 90px;">
              <input class="form-check-input mr-2" type="radio" name="customers_activation_check" {{ $customers->customers_activation_check == '1' ? 'checked' : '' }} value="1" id="activeRadio">
              <label class="form-check-label" for="activeRadio">Active</label>
              <input class="form-check-input ml-3 mr-2" type="radio" name="customers_activation_check" {{ $customers->customers_activation_check == '0' ? 'checked' : '' }} value="0" id="inactiveRadio">
              <label class="form-check-label" for="inactiveRadio">Inactive</label>
            </div>
            <div class="col-12">
              <div>
                <label class="form-label" for="entryofdate">Date Of Entry</label>
                <input class="form-control" type="date" name="date_of_entry" value="{{ $customers->date_of_entry }}"
                  id="entryofdate">
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="card">
        <div class="card-body">
          <div class="row" style="font-weight:600;">
            <h5> Customer Information </h5>
            <div class="col-lg-6 spacing-right">
              <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                  Customer ID <br> <input class="form-control" id="c_id" name="customers_id"
                    value="{{ $customers->customers_id }}" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Customer Legal Name (As per NTN) <br> <input class="form-control" id="customers_name" type="text"
                    name="customers_name" value="{{ $customers->customers_name }}" placeholder="" style="width: 100%;">
                </div>
              </div>
              <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                  Suffix <br> <input class="form-control" id="customers_suffix" name="customers_suffix"
                    value="{{ $customers->customers_suffix}}" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left input-group">
                  City of Deployment <br> <input class="form-control" id="city_of_deployment" type="text"
                    name="city_of_deployment" value="{{ $customers->city_of_deployment }}" placeholder="..."
                    style="width: 100%;">
                </div>
              </div>
              <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                  Region <br> <input class="form-control" id="customers_region" type="text"
                    value="{{ $customers->customers_region }}" name="customers_region" placeholder="..."
                    style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-right">
                  Belongs to Branch <br> <input class="form-control" id="customers_branch" type="text"
                    value="{{ $customers->branch_name }}" name="branch_name" placeholder="..." style="width: 100%;">
                </div>
              </div>
              <div class="row mb-2 mt-3 mb-2">
                <div class="col-10 spacing-right">
                  Display Name as <br> <input class="form-control" id="d_name" name="display_name_as"
                    value="{{ $customers->display_name_as }}" type="text" placeholder="..." style="width: 100%;">
                </div>
              </div>
            </div>
            <div class="col-lg-6 spacing-left">
              <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                  Nature of Business <br> <input class="form-control" id="nature"
                    value="{{ $customers->nature_of_business }}" name="nature_of_business" type="text" placeholder="..."
                    style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Website <br> <input class="form-control vldwebsite" type="text" id="web"
                    value="{{ $customers->website }}" name="website" placeholder="" style="width: 100%;">
                  <div id="websiteError" class="websiteError" style="color: red"></div>
                </div>
              </div>
              <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                  Phone/Cell No <br> <input class="form-control vldphone" type="text" id="phone"
                    value="{{ $customers->phone }}" name="phone" placeholder="..." style="width: 100%;">
                  <div id="phoneError" class="phoneError" style="color: red"></div>
                </div>
                <div class="col-lg-6 spacing-left input-group">
                  Email <br> <input class="form-control vldemail" name="email" id="email" type="email"
                    value="{{ $customers->email }}" placeholder="..." style="width: 100%;">
                  <div id="emailError" class="emailError" style="color: red"></div>
                </div>
                {{--
                <div class="row" style="margin-left: 3px; margin-top: 10px;">
                  <div class="col-lg-11 spacing-right">
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Sub-customer</label>
                      <input class="form-controld form-control" id="sub_customer" name="sub_customer"
                        value="{{ $customers->sub_customer }}" type="text" placeholder="..." style="width: 100%;">
                    </div>
                  </div>
                </div>
                --}}
                <div class="row" style="margin-left: 3px; margin-top: 10px;">
                  <div class="col-lg-11 spacing-right">
                    <div class="form-group form-check">
                      Sub Customer <br> <input class="form-control vldemail" name="sub_customer" id="" type="text"
                        value="{{ $customers->sub_customer }}" placeholder="..." style="width: 100%;">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <h5>Approved Commercials</h5>
              <div class="row mb-2 mt-3" style="margin-left:20px;">
                <div class="form-check form-check-inline spacing-left">
                  <input class="form-check-input" name="approved_com" type="checkbox" {{ $customers->approved_com ? 'checked' : '' }} id="approved_commercials">
                  <label class="form-check-label" for="inlineCheckbox1">Approved Commercials</label>
                </div>
              </div>
              <div class="row mb-2 mt-5" style="margin-left:20px;">
                <div class="form-check form-check-inline spacing-left">
                  <input class="form-check-input" type="checkbox" {{ $customers->quick_box ? 'checked' : '' }}
                    name="quick_box" id="quick_box">
                  <label class="form-check-label" for="inlineCheckbox1">QuickBooks</label>
                </div>
              </div>
              <div class="row mb-2 mt-5 d-flex flex-row align-items-end">
                <div class="col-4">
                  <div class="form-check form-check-inline spacing-right" style="margin-left:22px;">
                    <input class="form-check-input" type="checkbox" {{ $customers->eobi ? 'checked' : '' }} name="eobi"
                      id="eobi">
                    <label class="form-check-label" for="inlineCheckbox1">EOBI</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-check form-check-inline spacing-left">
                    <input class="form-check-input" type="checkbox" {{ $customers->social_security ? 'checked' : '' }}
                      name="social_security" id="social_security">
                    <label class="form-check-label" for="inlineCheckbox1">Social Security</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-check form-check-inline spacing-left">
                    <input class="form-check-input" type="checkbox" {{ $customers->grp_life_ins ? 'checked' : '' }}
                      name="grp_life_ins" id="grp_life_ins">
                    <label class="form-check-label" for="inlineCheckbox1">EOBI</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row mb-2 mt-3">
                <div class="col-lg-6 spacing-left">
                  <label>Approved Commercial Attachments</label><br>
                  <input class="form-control" id="approvedAttachInput" name="approved_attach" type="file"
                    placeholder="..." style="width: 100%;">
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="image-preview42 mt-2 preview-container" style="position: relative;">
                      @if($customers->approved_attach)
                        <img src="{{ asset($customers->approved_attach) }}" alt="Approved Attachment"
                          class="image-preview__image42 preview-image"
                          style="height: 100%; width: 100%; margin-left: -13px;"
                          data-image="{{ asset($customers->approved_attach) }}" data-bs-toggle="modal"
                          data-bs-target="#imagePreviewModal">

                        <!-- Cancel Icon -->
                        {{-- <button type="button" class="btn btn-danger btn-sm remove-image-btn"
                          data-customer-id="{{ $customers->id }}" data-type="approved_attach"
                          style="position: absolute; top: -6px; right: 3px; z-index: 10;">
                          &times;
                        </button> --}}
                      @else
                        <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                      @endif
                    </div>
                  </div>
                </div>


              </div>
              <div class="row mb-2 mt-3">
                <div class="col-lg-6 spacing-left">
                  QuickBooks Screenshot <br> <input class="form-control" value="{{ $customers->quickbooks_attach }}"
                    name="quickbooks_attach" type="file" placeholder="..." style="width: 100%;">
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="image-preview42 mt-2" id="imagePreview42" style="position: relative;">
                      @if($customers->quickbooks_attach)
                        <img src="{{ asset($customers->quickbooks_attach) }}" alt="QuickBooks Attachment"
                          class="image-preview__image42 preview-image"
                          style="height: 100%; width:100%; margin-left:-13px;"
                          data-image="{{ asset($customers->quickbooks_attach) }}" data-bs-toggle="modal"
                          data-bs-target="#imagePreviewModal">

                        <!-- Delete Button -->
                        {{-- <button type="button" class="btn btn-danger btn-sm remove-image-btn"
                          data-customer-id="{{ $customers->id }}" data-type="quickbooks_attach"
                          style="position: absolute; top: -6px; right: 3px; z-index: 10;">
                          &times;
                        </button> --}}
                      @else
                        <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                      @endif
                    </div>
                  </div>

                </div>
                <div class="col-lg-7 mt-3 spacing-right form-group">
                  Applicable Compliances <br>
                  <div class="input-group" style="width: 100%;">
                    <select id="dropdown" class="form-control mt-1" name="applicable_compliances"
                      value="{{ $customers->applicable_compliances }}" style="width: 70%; border-radius: 4px 0 0 4px; ">
                      <option value=""></option>
                      @foreach ($compliances as $compliance)
                        <option value="{{ $compliance->compliance_name }}"
                          @if($compliance->compliance_name == $customers->applicable_compliances) selected @endif>
                          {{ $compliance->compliance_name }}
                        </option>
                      @endforeach
                    </select>
                    <div class="input-group-append" style="width: 30%;">
                      <a href="{{ route('compliance') }}">
                        <button class="btn btn-primary" id="submit-category" type="button"
                          style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{--
            <div class="col-lg-4 spacing-right form-group">
              Applicable Compliances <br> <input class="form-control" id="c_id" name="applicable_compliances"
                value="{{ $customers->applicable_compliances }}" type="text" placeholder="..." style="width: 100%;">
            </div>
            --}}
          </div>
        </div>
      </div>
      <!--Tabs forDetails-->

      <div class="card mt-3">
        <div class="card-body">
          <nav>
            <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-contact-tab" data-toggle="tab" href="#work-experience"
                role="tab" aria-controls="nav-experience" aria-selected="false">Contract Management
              </a>
              <a class="nav-item nav-link " id="nav-deployment-tab" data-toggle="tab" href="#education" role="tab"
                aria-controls="nav-deployment" aria-selected="false">Deployment Plan
              </a>
              <a class="nav-item nav-link " id="nav-contact-tab" data-toggle="tab" href="#guaranter-details" role="tab"
                aria-controls="nav-contact" aria-selected="false">Point of Contacts (POC)
              </a>
              <a class="nav-item nav-link" id="nav-operation-tab" data-toggle="tab" href="#patrolling" role="tab"
                aria-controls="nav-operations" aria-selected="false">Patrolling Supervisor Log
              </a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#site" role="tab"
                aria-controls="nav-biometric" aria-selected="false"> Site
                Inspection
              </a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#arm" role="tab"
                aria-controls="nav-biometric" aria-selected="false"> Armourer
              </a>
              <a class="nav-item nav-link" id="nav-incident-tab" data-toggle="tab" href="#incident_report" role="tab"
                aria-controls="nav-incident" aria-selected="false">Incident Report & Assignment Instruction Form
              </a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#audit" role="tab"
                aria-controls="nav-biometric" aria-selected="false"> Audits
              </a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#address-details" role="tab"
                aria-controls="nav-address" aria-selected="false">Monthly
                Performance Review Report
              </a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#intelligence" role="tab"
                aria-controls="nav-biometric" aria-selected="false">BI & Promotional Activities
              </a>
              <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#verifications" role="tab"
                aria-controls="nav-verifications" aria-selected="false">Feedback Management
              </a>
            </div>
          </nav>

          <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
            <!--contract management-->
            <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="work-experience" role="tabpanel"
              aria-labelledby="nav-contact-tab">
              <div class="row">
                <h5 style="text-align:center;">Contract at a Glance</h5>
                <div class="row col-lg-12">
                  <div class="col-lg-3 spacing-right">
                    Summary of approved Strength: <br> <input class="form-control" value="{{ $customers->sum_apr }}"
                      name="sum_apr" type="file" placeholder="..." style="width: 100%;">
                    <div class="col-lg-5 spacing-right">
                      <div class="image-preview42 mt-2 preview-container" style="position: relative;"
                        id="imagePreview42">
                        @if($customers->sum_apr)
                          <img src="{{ asset($customers->sum_apr) }}" alt="Summary of Approved Strength"
                            class="image-preview__image42 preview-image"
                            style="height: 100%; width: 100%; margin-left: -13px;"
                            data-image="{{ asset($customers->sum_apr)}}" data-bs-toggle="modal"
                            data-bs-target="#imagePreviewModal">

                          <!-- Cancel Icon -->
                          {{-- <button type="button" class="btn btn-danger btn-sm remove-image-btn"
                            data-customer-id="{{ $customers->id }}" data-type="sum_apr"
                            style="position: absolute; top: -6px; right: 3px; z-index: 10;">
                            &times;
                          </button> --}}
                        @else
                          <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 spacing-right">
                    Accomodation Status: <br> <input class="form-control" value="{{ $customers->acm_status }}"
                      name="acm_status" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-3 spacing-right">
                    Meal Details: <br> <input class="form-control" name="meal_detail"
                      value="{{ $customers->meal_detail }}" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-3 spacing-right MT-2">
                    Any approved KPIs or SOW: <br> <input class="form-control" value="{{ $customers->apr_kpi }}"
                      name="apr_kpi" type="file" placeholder="..." style="width: 100%;">
                    <div class="col-lg-5 spacing-right">
                      <!-- Image Preview Biometric -->
                      <div class="image-preview42 mt-2" id="imagePreview42" style="position: relative;">
                        @if($customers->apr_kpi)
                          <img src="{{ asset($customers->apr_kpi) }}" alt="APR KPI Attachment"
                            class="image-preview__image42 preview-image"
                            style="height: 100%; width:100%; margin-left:-13px;"
                            data-image="{{ asset($customers->apr_kpi) }}" data-bs-toggle="modal"
                            data-bs-target="#imagePreviewModal">

                          <!-- Delete Button -->
                          {{-- <button type="button" class="btn btn-danger btn-sm remove-image-btn"
                            data-customer-id="{{ $customers->id }}" data-type="apr_kpi"
                            style="position: absolute; top: -6px; right: 3px; z-index: 10;">
                            &times;
                          </button> --}}
                        @else
                          <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                        @endif
                      </div>
                    </div>

                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="row mb-2">
                    <div class="col-lg-6 mt-2 spacing-right">
                      <div class=" mb-2 d-flex align-items-center">
                        <label for="Type Of Training:" class="form-check-label spacing-right">Approved Quotation Vetted
                          by Sales Department :</label>
                        <div class="form-check form-check-inline spacing-left">
                          <input class="form-check-input" name="approv_q_s" {{ $customers->approv_q_s ? 'checked' : '' }} type="checkbox" id="inlineCheckbox1" value="">
                          <label class="form-check-label" for="inlineCheckbox1"></label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right">
                      Attachments <br> <input class="form-control" name="approv_q_s_attach" type="file"
                        placeholder="..." style="width: 100%;">
                      <div class="col-lg-5 spacing-right">
                        <!-- Image Preview Biometric -->
                        <div class="image-preview42 mt-2" id="imagePreview42" style="position: relative;">
                          @if($customers->approv_q_s_attach)
                            <img src="{{ asset($customers->approv_q_s_attach) }}" alt="Approved QS Attachment"
                              class="image-preview__image42 preview-image"
                              style="height: 100%; width:100%; margin-left:-13px;"
                              data-image="{{ asset($customers->approv_q_s_attach) }}" data-bs-toggle="modal"
                              data-bs-target="#imagePreviewModal">

                            <!-- Delete Button -->
                            {{-- <button type="button" class="btn btn-danger btn-sm remove-image-btn"
                              data-customer-id="{{ $customers->id }}" data-type="approv_q_s_attach"
                              style="position: absolute; top: -6px; right: 3px; z-index: 10;">
                              &times;
                            </button> --}}
                          @else
                            <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-lg-6 mt-2 spacing-right">
                      <div class=" mb-2 d-flex align-items-center">
                        <label for="Type Of Training:" class="form-check-label spacing-right">Approved Quotation Vetted
                          by Contract Management Department :</label>
                        <div class="form-check form-check-inline spacing-left">
                          <input class="form-check-input" type="checkbox" {{ $customers->approv_q_c ? 'checked' : '' }}
                            name="approv_q_c" id="inlineCheckbox1" value="">
                          <label class="form-check-label" for="inlineCheckbox1"></label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right">
                      Attachments <br>
                      <input class="form-control" id="printing_date" name="approv_q_c_attach" type="file"
                        placeholder="..." style="width: 100%;">
                      <div class="col-lg-5 spacing-right">
                        <div class="image-preview42 mt-2" id="imagePreview42" style="position: relative;">
                          @if($customers->approv_q_c_attach)
                            <img src="{{ asset($customers->approv_q_c_attach) }}" alt="Approved QC Attachment"
                              class="image-preview__image42 preview-image"
                              style="height: 100%; width:100%; margin-left:-13px;"
                              data-image="{{ asset($customers->approv_q_c_attach) }}" data-bs-toggle="modal"
                              data-bs-target="#imagePreviewModal">

                            <!-- Delete Button -->
                            {{-- <button type="button" class="btn btn-danger btn-sm remove-image-btn"
                              data-customer-id="{{ $customers->id }}" data-type="approv_q_c_attach"
                              style="position: absolute; top: -6px; right: 3px; z-index: 10;">
                              &times;
                            </button> --}}
                          @else
                            <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                          @endif
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="row mb-2">
                    <div class="col-lg-6 mt-2 spacing-right">
                      <div class=" mb-2 d-flex align-items-center">
                        <label for="Type Of Training:" class="form-check-label spacing-right">Approved Quotation Vetted
                          by CFO :</label>
                        <div class="form-check form-check-inline spacing-left">
                          <input class="form-check-input" type="checkbox" {{ $customers->approv_q_cfo ? 'checked' : '' }} name="approv_q_cfo" id="inlineCheckbox1" value="">
                          <label class="form-check-label" for="inlineCheckbox1"></label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right">
                      Attachments <br> <input class="form-control" id="printing_date" name="approv_q_cfo_attach"
                        type="file" placeholder="..." style="width: 100%;">
                      <div class="col-lg-5 spacing-right">
                        <div class="image-preview42 mt-2" id="imagePreview42" style="position: relative;">
                          @if($customers->approv_q_cfo_attach)
                            <img src="{{ asset($customers->approv_q_cfo_attach) }}" alt="Approved CFO Attachment"
                              class="image-preview__image42 preview-image"
                              style="height: 100%; width:100%; margin-left:-13px;"
                              data-image="{{ asset($customers->approv_q_cfo_attach) }}" data-bs-toggle="modal"
                              data-bs-target="#imagePreviewModal">

                            <!-- Delete Button -->
                            {{-- <button type="button" class="btn btn-danger btn-sm remove-image-btn"
                              data-customer-id="{{ $customers->id }}" data-type="approv_q_cfo_attach"
                              style="position: absolute; top: -6px; right: 3px; z-index: 10;">
                              &times;
                            </button> --}}
                          @else
                            <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="row mb-2 mt-4">
                      <div class="col-lg-5 spacing-right">
                        Contract Execution Date: <br> <input class="form-control" name="c_e_date"
                          value="{{ $customers->c_e_date }}" type="date" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-5 spacing-right">
                        Contract end Date: <br> <input class="form-control" name="c_end_date"
                          value="{{ $customers->c_end_date }}" type="date" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-5 spacing-right">
                        Contract Renewal Date <br> <input class="form-control" name="c_r_date"
                          value="{{ $customers->c_r_date }}" type="date" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-5 spacing-right">
                        Renewal Reminder <br> <input class="form-control" name="c_r_rem"
                          value="{{ $customers->c_r_rem }}" type="text" placeholder="..." style="width: 100%;">
                      </div>
                    </div>
                    <h5>Signatory Details :</h5>
                    <div class="container my-5">
                      <div class="accordion" id="signatoryAccordion">
                        <!-- Initial Accordion Item -->
                        @foreach ($customers->customersignatories as $index => $signatories)
                          <div class="accordion-item" id="signatoryEntry{{ $index + 1 }}">
                            <h2 class="accordion-header" id="signatoryHeading{{ $index + 1 }}">
                              <button class="accordion-button" type="button" data-toggle="collapse"
                                data-target="#signatoryCollapse{{ $index + 1 }}" aria-expanded="false"
                                aria-controls="signatoryCollapse{{ $index + 1 }}">
                                Signatory Entry {{ $index + 1 }}
                              </button>
                            </h2>
                            <div id="signatoryCollapse{{ $index + 1 }}" class="collapse"
                              aria-labelledby="signatoryHeading{{ $index + 1 }}">
                              <div class="accordion-body">
                                <!-- Your existing form fields go here -->
                                <input type="hidden" name="customersignatories[{{ $index }}][s_id]"
                                  value="{{ $signatories->id }}">
                                <div class="row">
                                  <div class=col-lg-6>
                                    <div class="form-group">
                                      <label for="sign_name">Name</label>
                                      <input class="form-control" name="customersignatories[{{ $index }}][sign_name]"
                                        value="{{ $signatories->sign_name }}" type="text" placeholder="...">
                                    </div>
                                  </div>
                                  <div class="col-lg-6 spacing-right">
                                    Designation <br> <input class="form-control"
                                      name="customersignatories[{{ $index }}][sign_desig]"
                                      value="{{ $signatories->sign_desig }}" type="text" placeholder="..."
                                      style="width: 100%;">
                                  </div>

                                  <div class="col-lg-6 spacing-right">
                                    Cell No <br> <input class="form-control vldphone" type="text"
                                      name="customersignatories[{{ $index }}][sign_cell]"
                                      value="{{ $signatories->sign_cell }}" placeholder="..." style="width: 100%;">
                                    <div id="phoneError" class="phoneError" style="color: red"></div>
                                  </div>
                                  <div class="col-lg-6 spacing-right">
                                    Email <br> <input class="form-control vldemail" type="text"
                                      name="customersignatories[{{ $index }}][sign_email]"
                                      value="{{ $signatories->sign_email }}" placeholder="..." style="width: 100%;">
                                    <div id="emailError" class="emailError" style="color: red"></div>
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
                          <button type="button" class="btn btn-primary" id="addSignatory"
                            style="height:30px; width:150px;">Add More Signatory</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5 spacing-left">
                  <div class="row mb-2">
                    <div class="col-lg-12 spacing-right">
                      Draft Contract and Signed Agreement Read by<br>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" id="compliances" name="sales_dept" {{ $customers->sales_dept ? 'checked' : '' }} type="checkbox" id="inlineCheckbox1" value="">
                        <label class="form-check-label" for="inlineCheckbox1">Sales Dept.</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" id="compliances" name="cmd" {{ $customers->cmd ? 'checked' : '' }} type="checkbox" id="inlineCheckbox2" value="">
                        <label class="form-check-label" for="inlineCheckbox2">CMD</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" id="compliances" name="ops_dept" {{ $customers->ops_dept ? 'checked' : '' }} type="checkbox" id="inlineCheckbox2" value="">
                        <label class="form-check-label" for="inlineCheckbox2">Ops Dept.</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" id="compliances" name="finance_dept" {{ $customers->finance_dept ? 'checked' : '' }} type="checkbox" id="inlineCheckbox2" value="">
                        <label class="form-check-label" for="inlineCheckbox2">Finance Dept.</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" id="compliances" name="directors" {{ $customers->directors ? 'checked' : '' }} type="checkbox" id="inlineCheckbox2" value="">
                        <label class="form-check-label" for="inlineCheckbox2">Directors.</label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-lg-6 mt-2 spacing-right">
                      <div class=" mb-2 d-flex align-items-center">
                        <label for="Type Of Training:" class="form-check-label spacing-right">Signed Service Contract
                          Agreement Attached :</label>
                        <div class="form-check form-check-inline spacing-left">
                          <input class="form-check-input" name="signed_ser" {{ $customers->approved_com ? 'checked' : '' }} type="checkbox" id="inlineCheckbox1" value="">
                          <label class="form-check-label" for="inlineCheckbox1"></label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 spacing-left spacing-right">
                      Attachments <br> <input class="form-control" name="signed_ser_attach"
                        value="{{ $customers->signed_ser_attach }}" type="file" placeholder="..." style="width: 100%;">
                      <div class="col-lg-5 spacing-right">
                        <div class="image-preview42 mt-2" id="imagePreview42" style="position: relative;">
                          @if($customers->signed_ser_attach)
                            <img src="{{ asset($customers->signed_ser_attach) }}" alt="Signed Service Attachment"
                              class="image-preview__image42 preview-image"
                              style="height: 100%; width:100%; margin-left:-13px;"
                              data-image="{{ asset($customers->signed_ser_attach) }}" data-bs-toggle="modal"
                              data-bs-target="#imagePreviewModal">

                            <!-- Delete Button -->
                            {{-- <button type="button" class="btn btn-danger btn-sm remove-image-btn"
                              data-customer-id="{{ $customers->id }}" data-type="signed_ser_attach"
                              style="position: absolute; top: -6px; right: 3px; z-index: 10;">
                              &times;
                            </button> --}}
                          @else
                            <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-lg-6 mt-2 spacing-right">
                      <div class=" mb-2 d-flex align-items-center">
                        <label for="Type Of Training:" class="form-check-label spacing-right">Communication Instructions
                          Attached :</label>
                        <div class="form-check form-check-inline spacing-left">
                          <input class="form-check-input" name="com_ins" {{ $customers->com_ins ? 'checked' : '' }}
                            type="checkbox" id="inlineCheckbox1" value="">
                          <label class="form-check-label" for="inlineCheckbox1"></label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 spacing-left spacing-right">
                      Attachments <br> <input class="form-control" name="com_ins_attach"
                        value="{{ $customers->com_ins_attach }}" type="file" placeholder="..." style="width: 100%;">
                      <div class="col-lg-5 spacing-right">
                        <div class="image-preview42 mt-2" id="imagePreview42" style="position: relative;">
                          @if($customers->com_ins_attach)
                            <img src="{{ asset($customers->com_ins_attach) }}" alt="Commercial Insurance Attachment"
                              class="image-preview__image42 preview-image"
                              style="height: 100%; width:100%; margin-left:-13px;"
                              data-image="{{ asset($customers->com_ins_attach) }}" data-bs-toggle="modal"
                              data-bs-target="#imagePreviewModal">

                            <!-- Delete Button -->
                            {{-- <button type="button" class="btn btn-danger btn-sm remove-image-btn"
                              data-customer-id="{{ $customers->id }}" data-type="com_ins_attach"
                              style="position: absolute; top: -6px; right: 3px; z-index: 10;">
                              &times;
                            </button> --}}
                          @else
                            <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-lg-6 mt-2 spacing-right">
                      <div class=" mb-2 d-flex align-items-center">
                        <label for="Type Of Training:" class="form-check-label spacing-right">Testimonials (Reference
                          Letters) Attached :</label>
                        <div class="form-check form-check-inline spacing-left">
                          <input class="form-check-input" name="testimonials" {{ $customers->testimonials ? 'checked' : '' }} type="checkbox" id="inlineCheckbox1" value="">
                          <label class="form-check-label" for="inlineCheckbox1"></label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 spacing-left spacing-right">
                      Attachments <br> <input class="form-control" value="{{ $customers->testimonials_attach }}"
                        name="testimonials_attach" type="file" placeholder="..." style="width: 100%;">
                      <div class="col-lg-5 spacing-right">
                        <div class="image-preview42 mt-2" id="imagePreview42" style="position: relative;">
                          @if($customers->testimonials_attach)
                            <img src="{{ asset($customers->testimonials_attach) }}" alt="Testimonials Attachment"
                              class="image-preview__image42 preview-image"
                              style="height: 100%; width:100%; margin-left:-13px;"
                              data-image="{{ asset($customers->testimonials_attach) }}" data-bs-toggle="modal"
                              data-bs-target="#imagePreviewModal">

                            <!-- Delete Button -->
                            {{-- <button type="button" class="btn btn-danger btn-sm remove-image-btn"
                              data-customer-id="{{ $customers->id }}" data-type="testimonials_attach"
                              style="position: absolute; top: -6px; right: 3px; z-index: 10;">
                              &times;
                            </button> --}}
                          @else
                            <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-lg-6 mt-2 spacing-right">
                      <div class=" mb-2 d-flex align-items-center">
                        <label for="Type Of Training:" class="form-check-label spacing-right">Details of Sales
                          Incentives :</label>
                        <div class="form-check form-check-inline spacing-left">
                          <input class="form-check-input" name="sales_inc" {{ $customers->sales_inc ? 'checked' : '' }}
                            type="checkbox" id="inlineCheckbox1" value="">
                          <label class="form-check-label" for="inlineCheckbox1"></label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 spacing-left spacing-right">
                      Attachments <br> <input class="form-control" name="sales_inc_attach"
                        value="{{ $customers->sales_inc_attach }}" type="file" placeholder="..." style="width: 100%;">
                      <div class="col-lg-5 spacing-right">
                        <div class="image-preview42 mt-2" id="imagePreview42" style="position: relative;">
                          @if($customers->sales_inc_attach)
                            <img src="{{ asset($customers->sales_inc_attach) }}" alt="Sales Increment Attachment"
                              class="image-preview__image42 preview-image"
                              style="height: 100%; width:100%; margin-left:-13px;"
                              data-image="{{ asset($customers->sales_inc_attach) }}" data-bs-toggle="modal"
                              data-bs-target="#imagePreviewModal">

                            <!-- Delete Button -->
                            {{-- <button type="button" class="btn btn-danger btn-sm remove-image-btn"
                              data-customer-id="{{ $customers->id }}" data-type="sales_inc_attach"
                              style="position: absolute; top: -6px; right: 3px; z-index: 10;">
                              &times;
                            </button> --}}
                          @else
                            <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <h5>Performance Guaranty :</h5>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="pay_order" id="compliances-na" type="checkbox" value="">
                    <label class="form-check-label" for="compliances-na">N/A.</label>
                  </div>
                  <div id="sectionToHide">
                    <div class="row mb-2">
                      <div class="col-lg-6 spacing-right">
                        Insurance Company Name <br> <input class="form-control" value="{{ $customers->insc_name }}"
                          name="insc_name" type="text" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-6 spacing-right">
                        Date of issue <br> <input class="form-control" name="insc_date"
                          value="{{ $customers->insc_date }}" type="date" placeholder="..." style="width: 100%;">
                      </div>
                    </div>
                    <div class="col-lg-12 spacing-right mb-3">
                      Performance Guaranty issued via <br>
                      <select id="staff_category" class="form-control" value="{{ $customers->per_guan }}"
                        name="per_guan" style="width: 100%;">
                        <option value="Pay Order">Pay Order</option>
                        <option value="Demand Draft">Demand Draft</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div id="work_add_fields">
                </div>
                <div class="row mb-2">
                </div>
                <div class="row mb-2">
                  <div class="col-lg-6 spacing-left spacing-right mt-2">
                    Attachements <br> <input class="form-control mb-2" name="perfom_attach"
                      value="{{ $customers->perfom_attach }}" type="file" placeholder="..." style="width: 70%;"
                      multiple>
                    <div class="col-lg-5 spacing-right ">
                      <div class="image-preview42" id="imagePreview42">
                        @if($customers->perfom_attach)
                          <img src="{{ asset($customers->perfom_attach) }}" alt="Image Preview42"
                            class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                        @else
                          <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right mt-2">
                    Notes <br>
                    <textarea id="w3review" oninput="trimSpaces()" onclick="moveCursorToStart()" class="form-control"
                      name="perform_note" rows="2" cols="38">{{ $customers->perform_note }}
              </textarea>
                  </div>
                </div>
              </div>
              <h5 style="text-align:center;"><b><u>Payment Terms</u></b></h5>
              <div class="row">
                <div class="row mt-3" style="font-weight:600;">
                  <div class="col-lg-6 spacing-right mb-3">
                    Payment Terms <br>
                    <select class="form-control" name="pay_terms" value="{{ $customers->pay_terms }}"
                      style="width: 100%;">
                      <option value="Cash">Cash</option>
                      <option value="Cheque">Cheque</option>
                    </select>
                  </div>
                  <div class="form-type col-lg-6 spacing-right">
                    NTN from FBR Site <br> <input class="form-control" type="file" name="ntn_fbr"
                      value="{{ $customers->ntn_fbr }}" placeholder="..." style="width: 100%;">
                    <div class="col-lg-5 spacing-right mt-2">
                      <div class="image-preview42" id="imagePreview42">
                        @if($customers->ntn_fbr)
                          <img src="{{ asset($customers->ntn_fbr) }}" alt="Image Preview42" class="image-preview__image42"
                            style="height: 100%; width:100%; margin-left:-13px;">
                        @else
                          <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                        @endif
                      </div>
                    </div>
                  </div>
                  <h5 class="mt-3">Relevant Details of Manager Billing of Customer</h5>
                </div>

                <div class="row">
                  <div class=" row main-content div">
                    <div class="col-lg-6">
                      <div class="row mb-2">
                        <div class="col-lg-6 spacing-right">
                          POC Name <br> <input class="form-control" id="" value="{{ $customers->poc_name }}"
                            name="poc_name" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right">
                          Designation <br> <input class="form-control" id="head_office_email" name="poc_desig"
                            value="{{ $customers->poc_desig }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                          Cell Number <br> <input class="form-control vldphone" id="" name="poc_cell"
                            value="{{ $customers->poc_cell }}" type="text" placeholder="..." style="width: 100%;">
                          <div id="phoneError" class="phoneError" style="color: red"></div>
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right">
                          Email <br> <input class="form-control vldemail" id="head_office_email" name="poc_email"
                            value="{{ $customers->poc_email }}" type="email" placeholder="..." style="width: 100%;">
                          <div id="emailError" class="emailError" style="color: red"></div>
                        </div>
                        <div class="col-lg-6 spacing-right">
                          Billing Cycle Details <br> <input class="form-control" id=""
                            value="{{ $customers->poc_bill_c }}" name="poc_bill_c" type="text" placeholder="..."
                            style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right">
                          Billing Portal Details <br> <input class="form-control" id="head_office_email"
                            value="{{ $customers->poc_bill_d }}" name="poc_bill_d" type="text" placeholder="..."
                            style="width: 100%;">
                        </div>
                        <div class="col-lg-11 spacing-right">
                          Billing Portal Link <br> <input class="form-control" id=""
                            value="{{ $customers->poc_bill_l }}" name="poc_bill_l" type="text" placeholder="..."
                            style="width: 100%;">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 spacing-left">
                      <h5>Address</h5>
                      <div class="row mb-2">
                        <div class="col-lg-6 spacing-right">
                          Office No <br> <input class="form-control" id="" name="poc_office"
                            value="{{ $customers->poc_office }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left">
                          Floor <br> <input class="form-control" id="head_office_cell_no" name="poc_floor"
                            value="{{ $customers->poc_floor }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                          Building <br> <input class="form-control" id="" name="poc_building"
                            value="{{ $customers->poc_building }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left">
                          Block <br> <input class="form-control" id="" name="poc_block"
                            value="{{ $customers->poc_block }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-lg-6 spacing-right">
                          Area <br> <input class="form-control" id="" name="poc_area" value="{{ $customers->poc_area }}"
                            type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left">
                          City <br> <input class="form-control" id="" name="poc_city" value="{{ $customers->poc_city }}"
                            type="text" placeholder="..." style="width: 100%;">
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-lg-6 spacing-right">
                          Photograph of Location <br> <input class="form-control" id="" name="poc_photo"
                            value="{{ $customers->poc_photo }}" type="file" placeholder="..." style="width: 100%;">
                          <div class="col-lg-5 spacing-right">
                            <div class="image-preview42 mt-2 preview-container" style="position: relative;">
                              @if($customers->poc_photo)
                                <img src="{{ asset($customers->poc_photo) }}" alt="Photograph of Location"
                                  class="image-preview__image42 preview-image"
                                  style="height: 100%; width: 100%; margin-left: -13px;">

                                <!-- Cancel Icon -->
                                {{-- <button type="button" class="btn btn-danger btn-sm remove-image-btn"
                                  data-customer-id="{{ $customers->id }}" data-type="poc_photo"
                                  style="position: absolute; top: -6px; right: 3px; z-index: 10;">
                                  &times;
                                </button> --}}
                              @else
                                <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                              @endif

                            </div>
                          </div>

                        </div>
                        <script
                          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJW5_mifeg4pTLOW_Hgx70vDhU4osTceg&libraries=places"
                          defer></script>
                        <div class="col-lg-6 spacing-left">
                          Pin location <br> <input class="form-control" id="location-input" name="poc_pin"
                            value="{{ $customers->poc_pin }}" type="text" placeholder="..." style="width: 100%;"
                            onfocus="initAutocomplete()">
                        </div>
                      </div>
                      <div class="row ">
                        <div>
                          <br> <input class="form-control" id="" name="longitude" value="{{ $customers->longitude }}"
                            type="hidden" placeholder="..." style="width: 100%;">
                        </div>
                        <div>
                          <br> <input class="form-control" id="" name="latitude" value="{{ $customers->latitude }}"
                            type="hidden" placeholder="..." style="width: 100%;">
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                          Notes <br>
                          <textarea id="w3review1" oninput="trimSpaces1()" onclick="moveCursorToStart1()"
                            class="form-control" name="poc_note" rows="2" cols="38">{{ $customers->poc_note }}
                    </textarea>
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                          Attachements <br> <input class="form-control" name="poc_attach"
                            value="{{ $customers->poc_attach }}" type="file" placeholder="..." style="width: 70%;"
                            multiple>
                          <div class="col-lg-5 spacing-right">
                            <div class="image-preview42" id="imagePreview42">
                              @if($customers->poc_attach)
                                <img src="{{ asset($customers->poc_attach) }}" alt="Image Preview42"
                                  class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                              @else
                                <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class=" row main-content div">
                    <h5>Customer's CFO Details :</h5>
                    <div class="col-lg-6">
                      <div class="row mb-2">
                        <div class="col-lg-6 spacing-right">
                          Name <br> <input class="form-control" id="" name="cf_name" value="{{ $customers->cf_name }}"
                            type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right">
                          Designation <br> <input class="form-control" id="head_office_email" name="cf_desig"
                            value="{{ $customers->cf_desig }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                          Cell Number <br> <input class="form-control vldphone" id="" name="cf_no"
                            value="{{ $customers->cf_no }}" type="text" placeholder="..." style="width: 100%;">
                          <div id="phoneError" class="phoneError" style="color: red"></div>
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right">
                          Email <br> <input class="form-control vldemail" id="head_office_name" name="cf_email"
                            value="{{ $customers->cf_email }}" type="text" placeholder="..." style="width: 85%;">
                          <div id="emailError" class="emailError" style="color: red"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 spacing-left">
                      <h5>Address</h5>
                      <div class="row mb-2">
                        <div class="col-lg-6 spacing-right">
                          Office No <br> <input class="form-control" id="" name="cf_office"
                            value="{{ $customers->cf_office }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                          Floor <br> <input class="form-control" id="head_office_cell_no" name="cf_floor"
                            value="{{ $customers->cf_floor }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-right">
                          Building <br> <input class="form-control" id="" name="cf_building"
                            value="{{ $customers->cf_building }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                          Block <br> <input class="form-control" id="" name="cf_block"
                            value="{{ $customers->cf_block }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                          Area <br> <input class="form-control" id="" name="cf_area" value="{{ $customers->cf_area }}"
                            type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                          City <br> <input class="form-control" id="" name="cf_city" value="{{ $customers->cf_city }}"
                            type="text" placeholder="..." style="width: 100%;">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-5 spacing-right">
                          Photograph of Location <br> <input class="form-control" id="" name="cf_photo"
                            value="{{ $customers->cf_photo }}" type="file" placeholder="..." style="width: 100%;">
                          <div class="col-lg-5 spacing-right">
                            <div class="image-preview42" id="imagePreview42">
                              @if($customers->cf_photo)
                                <img src="{{ asset($customers->cf_photo) }}" alt="Image Preview42"
                                  class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                              @else
                                <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-5 spacing-left">
                          Pin Location <br> <input class="form-control" id="location-input1" name="cf_pin"
                            value="{{ $customers->cf_pin }}" type="text" placeholder="..." style="width: 100%;"
                            onfocus="initAutocomplete1()">
                        </div>
                      </div>
                      <div class="row ">
                        <div>
                          <br> <input class="form-control" id="" name="longitude1" value="{{ $customers->longitude1 }}"
                            type="hidden" placeholder="..." style="width: 100%;">
                        </div>
                        <div>
                          <br> <input class="form-control" id="" name="latitude1" value="{{ $customers->latitude1 }}"
                            type="hidden" placeholder="..." style="width: 100%;">
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                          Notes <br>
                          <textarea id="w3review2" class="form-control" name="cf_note" oninput="trimSpaces2()"
                            onclick="moveCursorToStart2()" rows="2" cols="38">{{ $customers->cf_note }}
                    </textarea>
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                          Attachements <br> <input class="form-control" name="cf_attach"
                            value="{{ $customers->cf_attach }}" type="file" placeholder="..." style="width: 70%;"
                            multiple>
                          <div class="col-lg-5 spacing-right">
                            <div class="image-preview42" id="imagePreview42">
                              @if($customers->cf_attach)
                                <img src="{{ asset($customers->cf_attach) }}" alt="Image Preview42"
                                  class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                              @else
                                <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <h5 class="mt-3">List OF Currency</h5>
                <div class="row mb-2">
                  <div class="col-lg-5 spacing-left spacing-right form-group">
                    List Of Currency <br>
                    {{--
                    <div class="input-group" style="width: 100%;">
                      <input class="form-control" id="" name="list_curr" value="{{ $customers->list_curr }}" type="text"
                        placeholder="..." style="width:
              100%;">
                    </div>
                    --}}
                    <div class="input-group" style="width: 100%;">
                      <select id="dropdown" class="form-control mt-1" name="list_curr"
                        style="width: 70%; border-radius: 4px 0 0 4px; ">
                        <option value=""></option>
                        @foreach ($currencies as $currency)
                          <option value="{{ $currency->currency_name }}"
                            @if($currency->currency_name == $customers->list_curr) selected @endif>
                            {{ $currency->currency_name }}
                          </option>
                          {{--
                          <option value="{{ $currency->currency_name }}">{{ $currency->currency_name }}</option>
                          --}}
                        @endforeach
                      </select>
                      <div class="input-group-append" style="width: 30%;">
                        <a href="{{ route('currency') }}">
                          <button class="btn btn-primary" type="button"
                            style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-lg-12 spacing-right">
                      List Of Provinces<br>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" name="fbr" type="checkbox" id="inlineCheckbox1" {{ $customers->fbr ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineCheckbox1">FBR.</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" id="compliances" name="pra" type="checkbox" id="inlineCheckbox2"
                          {{ $customers->pra ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineCheckbox2">PRA</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" id="compliances" name="kpra" type="checkbox"
                          id="inlineCheckbox2" {{ $customers->kpra ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineCheckbox2">KPRA</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" id="compliances" name="srb" type="checkbox" id="inlineCheckbox2"
                          {{ $customers->srb ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineCheckbox2">SRB</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" id="compliances" name="bra" type="checkbox" id="inlineCheckbox2"
                          {{ $customers->bra ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineCheckbox2">BRA</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" id="compliances" name="ajk" type="checkbox" id="inlineCheckbox2"
                          {{ $customers->ajk ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineCheckbox2">AJK</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" id="compliances" name="gb" type="checkbox" id="inlineCheckbox2"
                          {{ $customers->gb ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineCheckbox2">GB</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" id="compliances" name="all" type="checkbox" id="inlineCheckbox2"
                          value="">
                        <label class="form-check-label" for="inlineCheckbox2">ALL</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 spacing-right">
                    Attachment <br> <input class="form-control" id="" name="currency_attach"
                      value="{{ $customers->currency_attach }}" type="file" placeholder="..." style="width: 100%;">
                    <div class="col-lg-5 spacing-right">
                      <div class="image-preview42" id="imagePreview42">
                        @if($customers->currency_attach)
                          <img src="{{ asset($customers->currency_attach) }}" alt="Image Preview42"
                            class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                        @else
                          <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 spacing-right">
                    Notes <br> <textarea class="form-control" id="w3review3" oninput="trimSpaces3()"
                      onclick="moveCursorToStart3()" name="currency_note" type="text" placeholder="..."
                      style="width: 100%;">{{ $customers->currency_note }}</textarea>
                  </div>
                </div>
              </div>
              <h5 style="text-align:center;"><b><u>Salary and Other Benefits</u></b></h5>
              <div id="salaryContainer">
                @foreach ($customers->customersalary as $index => $salary)
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $index }}">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $index }}" aria-expanded="true" aria-controls="collapse{{ $index }}">
                        Salary Entry {{ $index }}
                      </button>
                    </h2>
                    <div id="collapse{{ $index }}" class="accordion-collapse collapse show"
                      aria-labelledby="heading{{ $index }}" data-bs-parent="#salaryContainer">
                      <div class="accordion-body">
                        <input type="hidden" name="customersalary[{{ $index }}][sal_id]" value="{{ $salary->id }}">
                        <!-- Add your existing fields with pre-filled data -->
                        <div class="row mb-2">
                          <div class="col-lg-4 spacing-right form-group">
                            Category <br>
                            <div class="input-group" style="width: 100%;">
                              <select id="dropdown" class="form-control mt-1"
                                name="customersalary[{{ $index }}][cat_name]" value="{{ $salary->cat_name }}"
                                style="width: 70%; border-radius: 4px 0 0 4px; ">
                                <option value=""></option>
                                @foreach ($saobcategories as $saobcategory)
                                  {{--
                                  <option value="{{ $saobcategory->saob_category_name}}">{{
                                    $saobcategory->saob_category_name }}</option>
                                  --}}
                                  <option value="{{ $saobcategory->saob_category_name }}"
                                    @if($saobcategory->saob_category_name == $salary->cat_name) selected @endif>
                                    {{ $saobcategory->saob_category_name }}
                                  </option>
                                @endforeach
                              </select>
                              <div class="input-group-append" style="width: 30%;">
                                <a href="{{ route('saobcategory') }}">
                                  <button class="btn btn-primary" id="submit-category" type="button"
                                    style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 spacing-left spacing-right">
                            Salary <br> <input class="form-control" id="head_office_email" value="{{ $salary->sal_cat }}"
                              name="customersalary[{{ $index }}][sal_cat]" type="text" placeholder="..."
                              style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                            Salary for No. of days <br> <input class="form-control" id="" value="{{ $salary->sal_days }}"
                              name="customersalary[{{ $index }}][sal_days]" type="text" placeholder="..."
                              style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                            Leaves Allowed <br> <input class="form-control" id=""
                              name="customersalary[{{ $index }}][leaves_a]" value="{{ $salary->leaves_a }}" type="text"
                              placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-6 spacing-right">
                            Other Benefits <br>
                            <textarea class="form-control" id="w3review23" name="customersalary[{{ $index }}][other_ben]"
                              type="notes" placeholder="..." style="width: 100%;">{{ $salary->other_ben }}</textarea>
                          </div>
                          <div class="form-type col-lg-6 spacing-right">
                            Attachements <br>
                            <input class="form-control" name="customersalary[{{ $index }}][sal_attach]"
                              value="{{ $salary->sal_attach }}" type="file" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                              <div class="image-preview42" id="imagePreview42">
                                @if($salary->sal_attach)
                                  <img src="{{ asset($salary->sal_attach) }}" alt="Image Preview42"
                                    class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                @else
                                  <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 spacing-left spacing-right mt-2">
                            Notes <br>
                            <textarea class="form-control" id="w3review5" name="customersalary[{{ $index }}][sal_note]"
                              type="notes" oninput="trimSpaces4()" onclick="moveCursorToStart4()" placeholder="..."
                              style="width: 100%;">{{ $salary->sal_note }}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="new-accordion-section mt-2">
                <button type="button" id="addNewAccordionBtn">Add More</button>
              </div>
            </div>
            <!--deployment details-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="education" role="tabpanel"
              aria-labelledby="nav-deployment-tab">
              <div class="row">
                <div class="container my-5">
                  <div class="accordion" id="manpowerAccordion">
                    <!-- Initial Accordion Item -->
                    @foreach ($customers->customermanpowers as $index => $manpowers)
                    @endforeach
                  </div>
                  <!-- Add More and Remove Buttons -->
                  <div class="row my-3">
                    <div class="col">
                      <button type="button" class="btn btn-primary" id="addManpower"
                        style="height:30px; width:150px;">Add More Manpower</button>
                    </div>
                  </div>
                </div>
                <h5>Patrolling Vehicle</h5>
                <div class="row mb-3">
                  <div class="form-type col-lg-6 spacing-right">
                    Vehicle Name <br> <input class="form-control" name="pat_name" value="{{ $customers->pat_name }}"
                      type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="form-type col-lg-6 spacing-right">
                    Model <br> <input class="form-control" name="pat_model" value="{{ $customers->pat_model }}"
                      type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="form-type col-lg-6 spacing-right">
                    Make <br> <input class="form-control" name="pat_make" value="{{ $customers->pat_make }}" type="text"
                      placeholder="..." style="width: 100%;">
                  </div>
                  <div class="form-type col-lg-6 spacing-right">
                    Registration No. <br> <input class="form-control" value="{{ $customers->pat_reg }}" name="pat_reg"
                      type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="form-type col-lg-6 spacing-right">
                    Quantity. <br> <input class="form-control" name="pat_quan" value="{{ $customers->pat_quan }}"
                      type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="form-type col-lg-6 spacing-right">
                    Price Per Unit. <br> <input class="form-control" name="pat_price"
                      value="{{ $customers->pat_price }}" type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="form-type col-lg-6 spacing-right">
                    Total Value. <br> <input class="form-control" name="pat_val" value="{{ $customers->pat_val }}"
                      type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>
              </div>
              <h5 style="text-align:center"><u><b>Emergency Services</b></u></h5>
              <div class="accordion" id="emergencyServicesAccordion">
                @foreach ($customers->customeremergencies as $index => $emergencies)
                  <div class="accordion-item" id="emergencyServicesEntry{{ $index + 1 }}">
                    <h2 class="accordion-header" id="emergencyServicesHeading{{ $index + 1 }}">
                      <button class="accordion-button" type="button" data-toggle="collapse"
                        data-target="#emergencyServicesCollapse{{ $index + 1 }}" aria-expanded="false"
                        aria-controls="emergencyServicesCollapse{{ $index + 1 }}">
                        Emergency Services Entry {{ $index + 1 }}
                      </button>
                    </h2>
                    <div id="emergencyServicesCollapse{{ $index + 1 }}" class="collapse"
                      aria-labelledby="emergencyServicesHeading{{ $index + 1 }}">
                      <div class="accordion-body">
                        <input type="hidden" name="customeremergencies[{{ $index }}][e_id]"
                          value="{{ $emergencies->id }}">
                        <div class=" row main-content div">
                          <div class="col-lg-6">
                            <div class="row mb-2">
                              <div class="col-lg-6 spacing-left spacing-right form-group">
                                Emergency Services <br>
                                <div class="input-group" style="width: 100%;">
                                  <select id="dropdown" class="form-control mt-1"
                                    name="customeremergencies[{{ $index }}][emer_ser]"
                                    value="{{ $emergencies->emer_ser }}" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                    @foreach ($emerser as $emerse)
                                      <option value="{{ $emerse->emerser_name }}"
                                        @if($emerse->emerser_name == $emergencies->emer_ser) selected @endif>
                                        {{ $emerse->emerser_name }}
                                      </option>
                                    @endforeach
                                  </select>
                                  <div class="input-group-append" style="width: 30%;">
                                    <a href="{{ route('emerser') }}">
                                      <button class="btn btn-primary" id="submit-category" type="button"
                                        style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6 spacing-right">
                                Picture of Police Station <br> <input class="form-control"
                                  name="customeremergencies[{{ $index }}][emer_pic]" value="{{ $emergencies->emer_pic }}"
                                  type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                    @if($customers->emer_pic)
                                      <img src="{{ asset($customers->emer_pic) }}" alt="Image Preview42"
                                        class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                      <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                    @endif
                                  </div>
                                </div>
                              </div>
                              <h5>POC</h5>
                              <div class="col-lg-6 spacing-right">
                                Name. <br> <input class="form-control" id=""
                                  name="customeremergencies[{{ $index }}][emer_poc_name]"
                                  value="{{ $emergencies->emer_poc_name }}" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                Designation. <br> <input class="form-control" id=""
                                  name="customeremergencies[{{ $index }}][emer_poc_desig]"
                                  value="{{ $emergencies->emer_poc_desig }}" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                Cell Number. <br> <input class="form-control vldphone" id=""
                                  name="customeremergencies[{{ $index }}][emer_poc_cell]"
                                  value="{{ $emergencies->emer_poc_cell }}" type="text" placeholder="..."
                                  style="width: 100%;">
                                <div id="phoneError" class="phoneError" style="color: red"></div>
                              </div>
                              <div class="col-lg-6 spacing-right">
                                Email. <br> <input class="form-control vldemail" id=""
                                  name="customeremergencies[{{ $index }}][emer_poc_email]"
                                  value="{{ $emergencies->emer_poc_email }}" type="email" placeholder="..."
                                  style="width: 100%;">
                                <div id="emailError" class="emailError" style="color: red"></div>
                              </div>
                              <div class="col-lg-6 spacing-right">
                                Notes. <br> <textarea class="form-control" id="w3review5"
                                  name="customeremergencies[{{ $index }}][emer_poc_notes]" type="notes"
                                  oninput="trimSpaces5()" onclick="moveCursorToStart5()" placeholder="..."
                                  style="width: 100%;">{{ $emergencies->emer_poc_notes }}</textarea>
                              </div>
                              <div class="col-lg-6 spacing-right">
                                Attachment <br> <input class="form-control" id=""
                                  name="customeremergencies[{{ $index }}][emer_poc_attach]"
                                  value="{{ $emergencies->emer_poc_attach }}" type="file" placeholder="..."
                                  style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                    @if($emergencies->emer_poc_attach)
                                      <img src="{{ asset($emergencies->emer_poc_attach) }}" alt="Image Preview42"
                                        class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                      <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 spacing-left">
                            <h5>Address :</h5>
                            <div class="row mb-2">
                              <div class="col-lg-5 spacing-right">
                                Office No <br> <input class="form-control" id="" value="{{ $emergencies->emer_office }}"
                                  name="customeremergencies[{{ $index }}][emer_office]" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-5 spacing-left">
                                Building <br> <input class="form-control" id="" value="{{ $emergencies->emer_building }}"
                                  name="customeremergencies[{{ $index }}][emer_building]" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                            </div>
                            <div class="row mb-2">
                              <div class="col-lg-5 spacing-right">
                                Block <br> <input class="form-control" id="" value="{{ $emergencies->emer_block }}"
                                  name="customeremergencies[{{ $index }}][emer_block]" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-5 spacing-left">
                                Area <br> <input class="form-control" id="" value="{{ $emergencies->emer_area }}"
                                  name="customeremergencies[{{ $index }}][emer_area]" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                            </div>
                            <div class="row mb-2">
                              <div class="col-lg-5 spacing-right">
                                City <br> <input class="form-control" id="" value="{{ $emergencies->emer_city }}"
                                  name="customeremergencies[{{ $index }}][emer_city]" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-5 spacing-left">
                                Photograph of Building <br> <input class="form-control" id=""
                                  value="{{ $emergencies->emer_loc }}" name="customeremergencies[{{ $index }}][emer_loc]"
                                  type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                    @if($emergencies->emer_loc)
                                      <img src="{{ asset($emergencies->emer_loc) }}" alt="Image Preview42"
                                        class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                      <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row mb-2">
                              <div class="col-lg-5 spacing-right">
                                Email <br> <input class="form-control vldemail" id=""
                                  name="customeremergencies[{{ $index }}][emer_email]"
                                  value="{{ $emergencies->emer_email }}" type="text" placeholder="..."
                                  style="width: 100%;">
                                <div id="emailError" class="emailError" style="color: red"></div>
                              </div>
                              <div class="col-lg-5 spacing-left">
                                Website <br> <input class="form-control vldwebsite" id=""
                                  name="customeremergencies[{{ $index }}][emer_web]" value="{{ $emergencies->emer_web }}"
                                  type="text" placeholder="..." style="width: 100%;">
                                <div id="websiteError" class="websiteError" style="color: red"></div>
                              </div>
                            </div>
                            <div class="row ">
                              <div class="col-lg-5 spacing-right">
                                Pin location <br> <input class="form-control" id="location-input2"
                                  name="customeremergencies[{{ $index }}][emer_pin]" value="{{ $emergencies->emer_pin }}"
                                  type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete2()">
                              </div>
                              <div>
                                <br> <input class="form-control" id="" name="longitude2"
                                  value="{{ $customers->longitude2 }}" type="hidden" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div>
                                <br> <input class="form-control" id="" name="latitude2"
                                  value="{{ $customers->latitude2 }}" type="hidden" placeholder="..."
                                  style="width: 100%;">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 spacing-left mt-2">
                          Applicable Rental Property Number <br> <input class="form-control"
                            name="customeremergencies[{{ $index }}][emer_app_rental]"
                            value="{{ $emergencies->emer_app_rental }}" type="text" placeholder="..." style="width: 70%;"
                            multiple>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-6 spacing-left spacing-right mt-2">
                            Attachements <br> <input class="form-control"
                              name="customeremergencies[{{ $index }}][emer_attach]"
                              value="{{ $emergencies->emer_attach }}" type="file" placeholder="..." style="width: 70%;"
                              multiple>
                            <div class="col-lg-5 spacing-right">
                              <div class="image-preview42" id="imagePreview42">
                                @if($emergencies->emer_attach)
                                  <img src="{{ asset($emergencies->emer_attach) }}" alt="Image Preview42"
                                    class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                @else
                                  <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 spacing-left spacing-right my-3">
                            Notes <br>
                            <textarea id="w3review6" class="form-control"
                              name="customeremergencies[{{ $index }}][emer_note]" oninput="trimSpaces6()"
                              onclick="moveCursorToStart6()" rows="2" cols="38">{{ $emergencies->emer_note }}
                      </textarea>
                          </div>
                          <hr>
                        </div>
                        <div class="input-group-append" style="width: 30%;">
                          <!--<button class="btn btn-success" type="button" onclick="emergencyServices_remove_fields({{ $index + 1 }})">Remove Emergency Service</button>-->
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div style="width: 50%;">
                <button class="btn btn-primary" type="button" onclick="emergencyServices_add_fields()">Add More</button>
              </div>
            </div>
            <!--Address-->
            <div class="tab-pane fade  m-3" style="opacity: 90%;" id="guaranter-details" role="tabpanel"
              aria-labelledby="nav-contact-tab">
              <div class="row accordion" id="departmentAccordion">
                @foreach ($customers->customerdepartments as $index => $departmentss)
                  <div class="accordion-item" id="departmentEntry{{ $index + 1 }}">
                    <h2 class="accordion-header" id="departmentHeading{{ $index + 1 }}">
                      <button class="accordion-button" type="button" data-toggle="collapse"
                        data-target="#departmentCollapse{{ $index + 1 }}" aria-expanded="false"
                        aria-controls="departmentCollapse{{ $index + 1 }}">
                        Department Entry {{ $index + 1 }}
                      </button>
                    </h2>
                    <div id="departmentCollapse{{ $index + 1 }}" class="collapse"
                      aria-labelledby="departmentHeading{{ $index + 1 }}">
                      <div class="accordion-body">
                        <input type="hidden" name="customerdepartments[{{ $index }}][d_id]"
                          value="{{ $departmentss->id }}">
                        <div class="spacing-right form-group">
                          Department Type <br>
                          <div class="input-group" style="width: 100%;">
                            <select id="dropdown" class="form-control mt-1"
                              name="customerdepartments[{{ $index }}][dept_type]" value="{{ $departmentss->dept_type }}"
                              style="width: 70%; border-radius: 4px 0 0 4px; ">
                              <option value=""></option>
                              @foreach ($departments as $department)
                                <option value="{{ $department->department_name }}"
                                  @if($department->department_name == $departmentss->dept_type) selected @endif>
                                  {{ $department->department_name}}
                                </option>
                              @endforeach
                            </select>
                            <div class="input-group-append" style="width: 30%;">
                              <a href="{{ route('department') }}">
                                <button class="btn btn-primary" type="button"
                                  style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="row mb-2">
                            <div class="col-lg-6 spacing-right">
                              POC Name <br> <input class="form-control"
                                name="customerdepartments[{{ $index }}][dept_name]" value="{{ $departmentss->dept_name }}"
                                type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-6 spacing-left spacing-right">
                              Email <br> <input class="form-control vldemail"
                                name="customerdepartments[{{ $index }}][dept_email]"
                                value="{{ $departmentss->dept_email }}" type="text" placeholder="..."
                                style="width: 100%;">
                              <div id="emailError" class="emailError" style="color: red"></div>
                            </div>
                            <div class="col-lg-6 spacing-right">
                              Cell Number <br> <input class="form-control vldphone"
                                name="customerdepartments[{{ $index }}][dept_cell]" value="{{ $departmentss->dept_cell }}"
                                type="text" placeholder="..." style="width: 100%;">
                              <div id="phoneError" class="phoneError" style="color: red"></div>
                            </div>
                            <div class="col-lg-6 spacing-left spacing-right">
                              Address <br> <input class="form-control"
                                name="customerdepartments[{{ $index }}][dept_address]"
                                value="{{ $departmentss->dept_address }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-6  spacing-right">
                              Designation <br> <input class="form-control"
                                name="customerdepartments[{{ $index }}][dept_desig]"
                                value="{{ $departmentss->dept_desig }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-6 spacing-left spacing-right">
                              Visiting Card (front) <br> <input class="form-control"
                                name="customerdepartments[{{ $index }}][dept_front]"
                                value="{{ $departmentss->dept_front }}" type="file" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-6  spacing-right">
                              Visiting Card (back) <br> <input class="form-control"
                                name="customerdepartments[{{ $index }}][dept_back]" value="{{ $departmentss->dept_back }}"
                                type="file" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-6 spacing-left spacing-right">
                              Notes <br>
                              <textarea id="w3review7" class="form-control"
                                name="customerdepartments[{{ $index }}][dept_notes]" oninput="trimSpaces7()"
                                onclick="moveCursorToStart7()" rows="2" cols="24">{{ $departmentss->dept_notes }}
                        </textarea>
                            </div>
                            <div class="col-lg-6 spacing-right">
                              Attachments <br> <input class="form-control"
                                name="customerdepartments[{{ $index }}][dept_attach]"
                                value="{{ $departmentss->dept_attach }}" type="file" placeholder="..."
                                style="width: 100%;" multiple>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 spacing-left">
                          <h5>Address</h5>
                          <div class="row mb-2">
                            <div class="col-lg-6 spacing-right">
                              Office No <br> <input class="form-control"
                                name="customerdepartments[{{ $index }}][dept_office]"
                                value="{{ $departmentss->dept_office }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                              Building <br> <input class="form-control"
                                name="customerdepartments[{{ $index }}][dept_build]"
                                value="{{ $departmentss->dept_build }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                              Block <br> <input class="form-control" name="customerdepartments[{{ $index }}][dept_block]"
                                value="{{ $departmentss->dept_block }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                              Area <br> <input class="form-control" name="customerdepartments[{{ $index }}][dept_area]"
                                value="{{ $departmentss->dept_area }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                              City <br> <input class="form-control" name="customerdepartments[{{ $index }}][dept_city]"
                                value="{{ $departmentss->dept_city }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                              Photograph of building <br> <input class="form-control"
                                name="customerdepartments[{{ $index }}][dept_photo]"
                                value="{{ $departmentss->dept_photo }}" type="file" placeholder="..."
                                style="width: 100%;">
                              <div class="col-lg-5 spacing-right">
                                <div class="image-preview42" id="imagePreview42">
                                  @if($departmentss->dept_photo)
                                    <img src="{{ asset($departmentss->dept_photo) }}" alt="Image Preview42"
                                      class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                  @else
                                    <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                              Pin Location <br> <input id="location-input3" class="form-control"
                                name="customerdepartments[{{ $index }}][dept_pin]" value="{{ $departmentss->dept_pin }}"
                                type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete3()">
                            </div>
                            <div>
                              <br> <input class="form-control" id="" name="longitude3"
                                value="{{ $customers->longitude3 }}" type="hidden" placeholder="..." style="width: 100%;">
                            </div>
                            <div>
                              <br> <input class="form-control" id="" name="latitude3" value="{{ $customers->latitude3 }}"
                                type="hidden" placeholder="..." style="width: 100%;">
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="col-lg-6 spacing-right mt-2">
                              Attachments <br> <input class="form-control"
                                name="customerdepartments[{{ $index }}][dept_ex_attach]"
                                value="{{ $departmentss->dept_ex_attach }}" type="file" placeholder="..."
                                style="width: 70%;" multiple>
                              <div class="col-lg-5 spacing-right">
                                <div class="image-preview42" id="imagePreview42">
                                  @if($departmentss->dept_ex_attach)
                                    <img src="{{ asset($departmentss->dept_ex_attach) }}" alt="Image Preview42"
                                      class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                  @else
                                    <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 spacing-left mt-2">
                              Notes <br>
                              <textarea id="w3review8" class="form-control"
                                name="customerdepartments[{{ $index }}][dept_ex_notes]" oninput="trimSpaces8()"
                                onclick="moveCursorToStart8()" rows="2" cols="38">{{ $departmentss->dept_ex_notes }}
                        </textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div style="width: 50%;">
                <button class="btn btn-primary" type="button" onclick="department_add_fields()">Add More</button>
              </div>
            </div>
            <!--Patrolling Section-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="patrolling" role="tabpanel"
              aria-labelledby="nav-loto-tab">
              <div class="row d-flex justify-content-end align-items-center">
                <div class="col-lg-12">
                  <h5>Supervisor Visit Logs Here</h5>
                  <div class="row mb-2 mt-3">
                    <div class="col-lg-4 spacing-right">
                      Visit Performed By: <br> <input class="form-control" type="text"
                        value="{{ $customers->visit_perf_by }}" name="visit_perf_by" placeholder="..."
                        style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-right">
                      Location: <br> <input class="form-control" type="text" name="pat_super_loc"
                        value="{{ $customers->pat_super_loc }}" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-right">
                      Date: <br> <input class="form-control" name="pat_super_date"
                        value="{{ $customers->pat_super_date }}" type="date" placeholder="..." style="width: 100%;">
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-lg-4 spacing-right">
                      Day: <br> <input class="form-control" type="text" name="pat_super_day"
                        value="{{ $customers->pat_super_day }}" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-right">
                      Time: <br> <input class="form-control" type="time" name="pat_super_times"
                        value="{{ $customers->pat_super_times }}" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-4 spacing-right ">
                      <div class="">
                        Photo Taken: <br> <input class="form-control " value="{{ $customers->pat_super_photo }}"
                          name="pat_super_photo" type="file" placeholder="..." style="width: 100%;">
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-lg-4 spacing-right">
                      <div>
                        Video Taken: <br>
                        <input class="form-control" name="pat_super_video" value="{{ $customers->pat_super_videp }}"
                          type="file" placeholder="..." style="width: 100%;">
                      </div>
                    </div>
                    <div class="col-lg-4 mt-3 spacing-right">
                      Inform Client about the visit via email: <br>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input mr-2" type="radio" name="pat_super_inform_email" value="1"
                          id="activeEmailRadio">
                        <label class="form-check-label" for="activeEmailRadio">Yes</label>
                        <input class="form-check-input ml-3 mr-2" type="radio" name="pat_super_inform_email" value="0"
                          id="inactiveEmailRadio">
                        <label class="form-check-label" for="inactiveEmailRadio">No</label>
                      </div>
                    </div>
                    <div id="customModal" class="modal"
                      style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60%; max-width: 1000px; height: 70%; max-height: 1200px; background-color: rgba(0, 0, 0, 0.5);">
                      <div class="modal-content"
                        style="position: relative; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); display: flex; flex-direction: column; align-items: center;">
                        <span class="close" id="closeCustomModal"
                          style="position: absolute; top: 10px; right: 10px; font-size: 20px; cursor: pointer;">&times;</span>
                        <h5>Email Details</h5>
                        <div style="display: flex; justify-content: space-between; width: 100%;">
                          <div style="flex: 1;">
                            <label for="recipientEmail" style="width: 100px;">To:</label>
                            <input type="email" id="recipientEmail" name="recipientEmail"
                              style="width: calc(106% - 120px);">
                          </div>
                          <div style="flex: 1;">
                            <label for="ccEmail" style="width: 30px; margin-left: 30px;">CC:</label>
                            <input type="email" id="ccEmail" style="width: calc(110% - 120px);" name="ccEmail">
                          </div>
                          <div style="flex: 1;">
                            <label for="bccEmail" style="width: 50px;">BCC:</label>
                            <input type="email" id="bccEmail" style="width: calc(110% - 120px);" name="bccEmail">
                          </div>
                        </div>
                        <div style="width: 100%;">
                          <label for="customEmailSubject" style="width: 100px;">Subject:</label>
                          <input type="text" id="customEmailSubject" name="customEmailSubject"
                            value="Post Visit Report by PIFFERS Security Services (Pvt.) Ltd."
                            style="width: calc(100% - 120px);">
                        </div>
                        <div style="width: 100%;">
                          <label for="customEmailBody" style="width: 100px;">Body:</label>
                          <textarea id="customEmailBody" name="customEmailBody" rows="10"
                            style="width: calc(100% - 120px);"></textarea>
                        </div>
                        <div style="width: 100%;">
                          <label for="customEmailAttachment" style="width: 100px;">Attachment:</label>
                          <input type="file" id="customEmailAttachment" name="customEmailAttachment[]"
                            accept="image/*, video/*" multiple>
                        </div>
                        <div class="mt-3" style="display: flex; gap: 10px; justify-content: center;">
                          <button type="button" id="confirm-send-email">Yes, Send Email</button>
                          <button type="button" id="cancel-send-email">Cancel</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 mt-3">
                      @if (!empty($customers->qrcode_path))
                        <img src="{{ asset($customers->qrcode_path) }}" alt="QR Code"
                          style="max-width: 100px; max-height: 100px;">
                      @else
                        No QR Code
                      @endif
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!--Site-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="site" role="tabpanel"
              aria-labelledby="nav-loto-tab">
              <div class="row">
                <div class="col-lg-12 spacing-right">
                  <h5>Inspection Performed By :</h5>
                  <div id="inspectionAccordion">
                    @foreach ($customers->customerinspections as $index => $inspections)
                      <div class="accordion-item" id="inspectionEntry{{ $index + 1 }}">
                        <h2 class="accordion-header" id="inspectionHeading{{ $index + 1 }}">
                          <button class="accordion-button" type="button" data-toggle="collapse"
                            data-target="#inspectionCollapse{{ $index + 1 }}" aria-expanded="false"
                            aria-controls="inspectionCollapse{{ $index + 1 }}">
                            Inspection Entry {{ $index + 1 }}
                          </button>
                        </h2>
                        <div id="inspectionCollapse{{ $index + 1 }}" class="collapse"
                          aria-labelledby="inspectionHeading{{ $index + 1 }}">
                          <div class="accordion-body">
                            <input type="hidden" name="customerinspections[{{ $index }}][i_id]"
                              value="{{ $inspections->id }}">
                            <div class="row mb-2">
                              <div class="col-lg-4 spacing-right">
                                Inspection Number <br> <input class="form-control" type="text"
                                  name="customerinspections[{{ $index }}][inspection_no]"
                                  value="{{ $inspections->inspection_no }}" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-4 spacing-right">
                                Employee id <br> <input class="form-control" type="text"
                                  name="customerinspections[{{ $index }}][inspection_emp_id]"
                                  value="{{ $inspections->inspection_emp_id }}" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-4 spacing-right">
                                Name <br> <input class="form-control" type="text"
                                  name="customerinspections[{{ $index }}][inspection_emp_name]"
                                  value="{{ $inspections->inspection_emp_name }}" placeholder="..." style="width: 100%;">
                              </div>
                            </div>
                            <div class="row mb-2">
                              <div class="col-lg-4 spacing-right">
                                Cell Number: <br> <input class="form-control vldphone" type="text"
                                  name="customerinspections[{{ $index }}][inspection_emp_cell]"
                                  value="{{ $inspections->inspection_emp_cell }}" placeholder="" style="width: 100%;">
                                <div id="phoneError" class="phoneError" style="color: red"></div>
                              </div>
                              <div class="col-lg-4 spacing-right">
                                Department <br> <input class="form-control" type="text"
                                  name="customerinspections[{{ $index }}][inspection_emp_dept]"
                                  value="{{ $inspections->inspection_emp_dept }}" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-4 spacing-left" style="margin-left:8px;">
                                Date of inspection. <br> <input class="form-control" type="date"
                                  name="customerinspections[{{ $index }}][inspection_date]"
                                  value="{{ $inspections->inspection_date }}" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-4 spacing-left">
                                Picture of Inspection <br> <input class="form-control basic-info-attachements"
                                  id="inpFile22" type="file" name="customerinspections[{{ $index }}][inspection_pic]"
                                  accept="image/*" placeholder="..." style="width: 100%;" multiple>
                                <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">

                                    @if($inspections->inspection_pic)
                                      <div class="file-preview" style="cursor:pointer; display:inline-block;"
                                        data-file="{{ asset($inspections->inspection_pic) }}"
                                        data-extension="{{ pathinfo($inspections->inspection_pic, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this)">

                                        {!! getFilePreview($inspections->inspection_pic) !!}

                                      </div>
                                    @else
                                      <img src="{{ asset('noimage.jpg') }}" width="70px" height="70px">
                                    @endif

                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4 spacing-right">
                                Remarks of Petroling Officer <br> <textarea class="form-control basic-info-attachements"
                                  id="inpFile2" type="text" name="customerinspections[{{ $index }}][inspection_rem_petr]"
                                  placeholder="..."
                                  style="width: 100%;">{{ $inspections->inspection_rem_petr }}</textarea>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-3">
                                Notes <br> <textarea class="form-control basic-info-attachements"
                                  name="customerinspections[{{ $index }}][inspection_note]" placeholder="..."
                                  style="width: 100%;">{{ $inspections->inspection_note }}</textarea>
                              </div>
                             <div class="col-lg-3 spacing-left">
    Attachments <br>

    <input class="form-control basic-info-attachements"
        type="file"
        name="customerinspections[{{ $index }}][inspection_attach]"
        accept="image/*,video/*,.pdf,.doc,.docx"
        style="width: 100%;"
        multiple>

    <div class="col-lg-5 spacing-right">
        <div class="image-preview42">

            @if($inspections->inspection_attach)

                <div class="file-preview"
                    style="cursor:pointer; display:inline-block;"
                    data-file="{{ asset($inspections->inspection_attach) }}"
                    data-extension="{{ pathinfo($inspections->inspection_attach, PATHINFO_EXTENSION) }}"
                    onclick="openFileModal(this)">

                    {!! getFilePreview($inspections->inspection_attach) !!}

                </div>

            @else
                <img src="{{ asset('noimage.jpg') }}" width="70" height="70">
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
                  <div class="mt-2">
                    <button class="btn btn-primary" type="button" id="add_inspection_btn"
                      onclick="addInspectionSection()">
                      Add Inspection
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="fileModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body text-center" id="fileModalContent">
            </div>
        </div>
    </div>
</div>
            <!--Armourer-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="arm" role="tabpanel"
              aria-labelledby="nav-loto-tab">
              <div id="cleaningAccordion">
                @foreach ($customers->customerarmourers as $index => $armourers)
                  <div class="accordion-item" id="cleaningEntry{{ $index + 1 }}">
                    <h2 class="accordion-header" id="cleaningHeading{{ $index + 1 }}">
                      <button class="accordion-button" type="button" data-toggle="collapse"
                        data-target="#cleaningCollapse{{ $index + 1 }}" aria-expanded="false"
                        aria-controls="cleaningCollapse{{ $index + 1 }}">
                        Cleaning Entry {{ $index + 1 }}
                      </button>
                    </h2>
                    <div id="cleaningCollapse{{ $index + 1 }}" class="collapse"
                      aria-labelledby="cleaningHeading{{ $index + 1 }}">
                      <div class="accordion-body">
                        <input type="hidden" name="customerarmourers[{{ $index }}][a_id]" value="{{ $armourers->id }}">
                        <div class="row col-lg-12">
                          <div class="col-lg-4 spacing-right">
                            Branch Name <br> <input class="form-control" type="text"
                              name="customerarmourers[{{ $index }}][arm_branch_name]"
                              value="{{ $armourers->arm_branch_name }}" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Branch ID <br> <input class="form-control" type="text"
                              name="customerarmourers[{{ $index }}][arm_branch_id]"
                              value="{{ $armourers->arm_branch_id }}" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Site ID <br> <input class="form-control" type="text"
                              name="customerarmourers[{{ $index }}][arm_site_id]" value="{{ $armourers->arm_site_id }}"
                              placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Client Name <br> <input class="form-control" type="text"
                              name="customerarmourers[{{ $index }}][arm_client_name]"
                              value="{{ $armourers->arm_client_name }}" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Weapon Number <br> <input class="form-control" type="text"
                              name="customerarmourers[{{ $index }}][arm_weapon_no]"
                              value="{{ $armourers->arm_weapon_no }}" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Weapon Bore <br> <input class="form-control" type="text"
                              name="customerarmourers[{{ $index }}][arm_weapon_bore]"
                              value="{{ $armourers->arm_weapon_bore }}" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Weapon Type <br> <input class="form-control" type="text"
                              name="customerarmourers[{{ $index }}][arm_weapon_type]"
                              value="{{ $armourers->arm_weapon_type }}" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Working Details <br> <input class="form-control" type="text"
                              name="customerarmourers[{{ $index }}][arm_work_detail]"
                              value="{{ $armourers->arm_work_detail }}" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-right">
                            Sign of Customer <br> <input class="form-control" type="text"
                              name="customerarmourers[{{ $index }}][arm_sign_cus]" value="{{ $armourers->arm_sign_cus }}"
                              placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="row mb-2">
                            <div class="col-lg-4 spacing-right" style="margin-bottom: 10px;">
                              New Authority Letter Issue : <br> <input class="form-control" id=""
                                name="customerarmourers[{{ $index }}][arm_auth]" value="{{ $armourers->arm_auth }}"
                                type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                              New Authority Letter No <br> <input class="form-control" id="head_office_email"
                                id="inpFile42" name="customerarmourers[{{ $index }}][arm_auth_no]"
                                value="{{ $armourers->arm_auth_no }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                              New Authority Letter Validity <br> <input class="form-control" id="head_office_email"
                                name="customerarmourers[{{ $index }}][arm_auth_date]"
                                value="{{ $armourers->arm_auth_date }}" type="date" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right" style="margin-bottom: 10px;">
                              Date of issue <br> <input class="form-control" id=""
                                name="customerarmourers[{{ $index }}][arm_auth_issue]"
                                value="{{ $armourers->arm_auth_issue }}" type="date" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                              Number of weapon cleaned <br> <input class="form-control" id="head_office_email"
                                id="inpFile42" name="customerarmourers[{{ $index }}][arm_weapon_cleaned]"
                                value="{{ $armourers->arm_weapon_cleaned }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                              Type of weapon cleaned <br> <input class="form-control" id="head_office_email"
                                name="customerarmourers[{{ $index }}][type_weapon_cleaned]"
                                value="{{ $armourers->type_weapon_cleaned }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                              Picture before cleaning <br> <input class="form-control" id=""
                                name="customerarmourers[{{ $index }}][arm_pic_b]" type="file"
                                value="{{ $armourers->arm_pic_b }}" placeholder="..." style="width: 100%;">
                              <div class="col-lg-5 spacing-right">
                                <div class="image-preview42" id="imagePreview42">
                                  @if($armourers->arm_pic_b)
                                    <img src="{{ asset($armourers->arm_pic_b) }}" alt="Image Preview42"
                                      class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                  @else
                                    <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 spacing-right">
                              Picture after cleaning <br> <input class="form-control" id=""
                                name="customerarmourers[{{ $index }}][arm_pic_a]" type="file"
                                value="{{ $armourers->arm_pic_a }}" placeholder="..." style="width: 100%;">
                              <div class="col-lg-5 spacing-right">
                                <div class="image-preview42" id="imagePreview42">
                                  @if($armourers->arm_pic_a)
                                    <img src="{{ asset($armourers->arm_pic_a) }}" alt="Image Preview42"
                                      class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                  @else
                                    <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 spacing-right">
                              Cost of the day <br> <input class="form-control" id=""
                                name="customerarmourers[{{ $index }}][arm_cost_day]"
                                value="{{ $armourers->arm_cost_day }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                              Cost Bill <br> <input class="form-control" id=""
                                name="customerarmourers[{{ $index }}][arm_cost_bill]"
                                value="{{ $armourers->arm_cost_bill }}" type="file" placeholder="..."
                                style="width: 100%;">
                              <div class="col-lg-5 spacing-right">
                                <div class="image-preview42" id="imagePreview42">
                                  @if($armourers->arm_cost_bill)
                                    <img src="{{ asset($armourers->arm_cost_bill) }}" alt="Image Preview42"
                                      class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                  @else
                                    <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 spacing-right">
                              Next cleaning activity due on : <br> <input class="form-control" id=""
                                name="customerarmourers[{{ $index }}][arm_next_clean]"
                                value="{{ $armourers->arm_next_clean }}" type="date" placeholder="..."
                                style="width: 100%;">
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="col-lg-4 spacing-right mt-2">
                              Notes <br>
                              <textarea id="w3review9" class="form-control"
                                name="customerarmourers[{{ $index }}][arm_next_clean]" oninput="trimSpaces9()"
                                onclick="moveCursorToStart9()" rows="2" cols="38">{{ $armourers->arm_next_clean }}
                        </textarea>
                            </div>
                            <div class="col-lg-4 spacing-left spacing-right mt-2">
                              Attachments <br> <input class="form-control"
                                name="customerarmourers[{{ $index }}][arm_auth_attach]"
                                value="{{ $armourers->arm_auth_attach }}" type="file" placeholder="..."
                                style="width: 70%;" multiple>
                              <div class="col-lg-5 spacing-right">
                                <div class="image-preview42" id="imagePreview42">
                                  @if($armourers->arm_auth_attach)
                                    <img src="{{ asset($armourers->arm_auth_attach) }}" alt="Image Preview42"
                                      class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                  @else
                                    <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
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
              <div class="new_branch mt-2">
                <button type="button" id="addCleaning" onclick="addCleaningSection()">Add More</button>
              </div>
            </div>
            <!--Incident form-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="incident_report" role="tabpanel"
              aria-labelledby="nav-incident-tab">
              <div>
                <div id="incidentAccordion">
                  @foreach ($customers->customerincidents as $index => $incidents)
                    <div class="accordion-item" id="incidentEntry{{ $index + 1 }}">
                      <h2 class="accordion-header" id="incidentHeading{{ $index + 1 }}">
                        <button class="accordion-button" type="button" data-toggle="collapse"
                          data-target="#incidentCollapse{{ $index + 1 }}" aria-expanded="false"
                          aria-controls="incidentCollapse{{ $index + 1 }}">
                          Incident Entry {{ $index + 1 }}
                        </button>
                      </h2>
                      <div id="incidentCollapse{{ $index + 1 }}" class="collapse"
                        aria-labelledby="incidentHeading{{ $index + 1 }}">
                        <div class="accordion-body">
                          <input type="hidden" name="customerincidents[{{ $index }}][in_id]" value="{{ $incidents->id }}">
                          <div class="col-lg-12">
                            <div class="row mb-2">
                              <div class="col-lg-3">
                                Client Name <br>
                                <input class="form-control" type="text"
                                  name="customerincidents[{{ $index }}][client_name]"
                                  value="{{ $incidents->client_name }}" placeholder="..." />
                              </div>
                              <div class="col-lg-3">
                                Client ID <br> <input class="form-control" type="text"
                                  name="customerincidents[{{ $index }}][client_id]" value="{{ $incidents->client_id }}"
                                  placeholder="...">
                              </div>
                              <div class="col-lg-3">
                                Site ID <br> <input class="form-control" type="text"
                                  name="customerincidents[{{ $index }}][client_site_id]"
                                  value="{{ $incidents->client_site_id }}" placeholder="...">
                              </div>
                              <div class="col-lg-3">
                                Client POC Name <br>
                                <input class="form-control" type="text" name="customerincidents[{{ $index }}][client_poc]"
                                  value="{{ $incidents->client_poc }}" placeholder="...">
                              </div>
                              <div class="col-lg-3 mt-2">
                                Cell <br> <input class="form-control vldphone" type="text"
                                  name="customerincidents[{{ $index }}][client_cell]"
                                  value="{{ $incidents->client_cell }}" placeholder="...">
                                <div id="phoneError" class="phoneError" style="color: red"></div>
                              </div>
                              <div class="col-lg-3  mt-2">
                                Email <br> <input class="form-control vldemail" type="text"
                                  name="customerincidents[{{ $index }}][client_email]"
                                  value="{{ $incidents->client_email }}" placeholder="...">
                                <div id="emailError" class="emailError" style="color: red"></div>
                              </div>
                              <div class="col-lg-3  mt-2">
                                Site Address <br>
                                <input class="form-control" type="text"
                                  name="customerincidents[{{ $index }}][client_site_address]"
                                  value="{{ $incidents->client_site_address }}" placeholder="...">
                              </div>
                              <div class="col-lg-3  mt-2">
                                Office/Floor <br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][client_office]"
                                  value="{{ $incidents->client_office }}" type="text" placeholder="...">
                              </div>
                              <div class="col-lg-3  mt-2">
                                Building Name<br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][client_build]"
                                  value="{{ $incidents->client_build }}" type="text" placeholder="...">
                              </div>
                              <div class="col-lg-3  mt-2">
                                Street <br>
                                <input class="form-control" type="text"
                                  name="customerincidents[{{ $index }}][client_street]"
                                  value="{{ $incidents->client_street }}" placeholder="...">
                              </div>
                              <div class="col-lg-3  mt-2">
                                Area <br> <input class="form-control" name="customerincidents[{{ $index }}][client_area]"
                                  value="{{ $incidents->client_area }}" type="text" placeholder="...">
                              </div>
                              <div class="col-lg-3  mt-2">
                                City <br> <input class="form-control" name="customerincidents[{{ $index }}][client_city]"
                                  value="{{ $incidents->client_city }}" type="text" placeholder="...">
                              </div>
                              <div class="col-lg-3  mt-2">
                                FIR # <br> <input class="form-control" name="customerincidents[{{ $index }}][client_fir]"
                                  value="{{ $incidents->client_fir }}" type="text" placeholder="...">
                              </div>

                              <div class="col-lg-3  mt-2">
                                Arrest # <br> <input class="form-control" name="customerincidents[{{ $index }}][arrest]"
                                  value="{{ $incidents->arrest }}" type="text" placeholder="...">
                              </div>
                              <div class="col-lg-3  mt-2">
                                Casualities <br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][casual]" value="{{ $incidents->casual }}"
                                  type="text" placeholder="...">
                              </div>
                              <div class="col-lg-3  mt-2">
                                Injuired <br> <input class="form-control" name="customerincidents[{{ $index }}][injuired]"
                                  value="{{ $incidents->injuired }}" type="text" placeholder="...">
                              </div>

                            </div>
                            <div class="row mb-2 mt-3">
                              <div class="col-lg-4  mt-2">
                                Incident Reported to <br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][incident_rep]"
                                  value="{{ $incidents->incident_rep }}" type="text" placeholder="...">
                              </div>
                              <div class="col-lg-4  mt-2">
                                Police Officer Name <br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][police_officer_name]"
                                  value="{{ $incidents->police_officer_name }}" type="text" placeholder="...">
                              </div>
                              <div class="col-lg-4  mt-2">
                                Station <br> <input class="form-control" type="text"
                                  name="customerincidents[{{ $index }}][station]" value="{{ $incidents->station }}"
                                  placeholder="...">
                              </div>
                              <div class="col-lg-4  mt-2">
                                Rank <br> <input class="form-control" type="text"
                                  name="customerincidents[{{ $index }}][rank]" value="{{ $incidents->rank }}"
                                  placeholder="...">
                              </div>
                              <div class="col-lg-4  mt-2">
                                Report Made by <br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][report_made_by]"
                                  value="{{ $incidents->report_made_by }}" type="text" placeholder="...">
                              </div>
                              <div class="col-lg-4  mt-2">
                                Date <br> <input class="form-control" name="customerincidents[{{ $index }}][report_date]"
                                  value="{{ $incidents->report_date }}" type="date" placeholder="...">
                              </div>
                              <div class="col-lg-4  mt-2">
                                Time <br> <input class="form-control" name="customerincidents[{{ $index }}][report_time]"
                                  value="{{ $incidents->report_time }}" type="time" placeholder="...">
                              </div>
                              <div class="col-lg-4  mt-2">
                                Approved By <br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][report_apr_by]"
                                  value="{{ $incidents->report_apr_by }}" type="text" placeholder="...">
                              </div>
                              <div class="col-lg-4  mt-2">
                                Shared with <br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][report_shared]"
                                  value="{{ $incidents->report_shared }}" type="text" placeholder="...">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="row mb-2">
                              <div class="col-lg-3 ">
                                Incident Type <br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][incident_type]"
                                  value="{{ $incidents->incident_type }}" type="text" placeholder="...">
                              </div>
                              <div class="col-lg-3 ">
                                Shoes <br>
                                <input class="form-control" type="text"
                                  name="customerincidents[{{ $index }}][attacker_shoe]"
                                  value="{{ $incidents->attacker_shoe }}" placeholder="...">
                              </div>
                              <div class="col-lg-3">
                                Beard/M <br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][attacker_beard]"
                                  value="{{ $incidents->attacker_beard }}" type="text" placeholder="...">
                              </div>
                              <div class="col-lg-3">
                                Language <br> <input class="form-control" type="text"
                                  name="customerincidents[{{ $index }}][attacker_lang]"
                                  value="{{ $incidents->attacker_lang }}" placeholder="...">
                              </div>
                              <div class="col-lg-4">
                                Focused on <br>
                                <input class="form-control" type="text" name="customerincidents[{{ $index }}][focused]"
                                  value="{{ $incidents->focused }}" placeholder="...">
                              </div>
                              <div class="col-lg-4">
                                Opening Phrase <br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][opening_phrase]"
                                  value="{{ $incidents->opening_phrase }}" type="text" placeholder="...">
                              </div>
                              <div class="col-lg-4">
                                Anything Unusual <br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][any_usual]" value="{{ $incidents->any_usual }}"
                                  type="text" placeholder="...">
                              </div>
                            </div>
                            <div class="row mb-2 ">


                              <div class="col-lg-4 ">
                                Weapon used by Attacker <br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][weapon_used]"
                                  value="{{ $incidents->weapon_used }}" type="text" placeholder="...">
                              </div>
                              <div class="col-lg-4 ">
                                Details of Attacker <br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][detail_of_attacker]"
                                  value="{{ $incidents->detail_of_attacker }}" type="text" placeholder="...">
                              </div>
                              <div class="col-lg-4">
                                Attacker Description <br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][attacker_desc]"
                                  value="{{ $incidents->attacker_desc }}" type="text" placeholder="...">
                              </div>

                            </div>
                            <div class="row mb-2">
                              <div class="col-lg-4">
                                Estimated Loss in PKR <br> <input class="form-control"
                                  name="customerincidents[{{ $index }}][estimated_loss]"
                                  value="{{ $incidents->estimated_loss }}" type="text" placeholder="...">
                              </div>
                              <div class="col-lg-4 ">
                                Description of Loss <br> <input class="form-control" type="text"
                                  name="customerincidents[{{ $index }}][desc_loss]" value="{{ $incidents->desc_loss }}"
                                  placeholder="...">
                              </div>
                              <div class="col-lg-4">
                                Officers Response <br> <input class="form-control" type="text"
                                  name="customerincidents[{{ $index }}][officer_response]"
                                  value="{{ $incidents->officer_response }}" placeholder="...">
                              </div>
                            </div>

                          </div>
                          <div class="row mb-2">
                            <div class="col-lg-6 spacing-left spacing-right mt-2">
                              Attachements <br> <input class="form-control" type="file"
                                name="customerincidents[{{ $index }}][incident_attach]"
                                value="{{ $incidents->incident_attach }}" placeholder="..." multiple>
                              <div class="col-lg-6 spacing-right">
                                <div class="image-preview42" id="imagePreview42">
                                  @if($incidents->incident_attach)
                                    <img src="{{ asset($incidents->incident_attach) }}" alt="Image Preview42"
                                      class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                  @else
                                    <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 spacing-left spacing-right mt-2">
                              Notes <br>
                              <textarea id="w3review10" class="form-control" oninput="trimSpaces10()"
                                onclick="moveCursorToStart10()" name="customerincidents[{{ $index }}][incident_note]"
                                rows="2" cols="38">{{ $incidents->incident_note }}
                        </textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
                <div class="new_branch mt-2">
                  <button type="button" onclick="client_add_fields()">Add More</button>
                </div>
              </div>
              <h5 style="text-align:center;"><b><u>Assigment Instruction Form</u></b></h5>
              <div id="assignmentAccordion">
                @foreach ($customers->customerassigments as $index => $assigments)
                  <div class="accordion-item" id="assignmentEntry{{ $index + 1 }}">
                    <h2 class="accordion-header" id="assignmentHeading{{ $index + 1 }}">
                      <button class="accordion-button" type="button" data-toggle="collapse"
                        data-target="#assignmentCollapse{{ $index + 1 }}" aria-expanded="false"
                        aria-controls="assignmentCollapse{{ $index + 1 }}">
                        Assignment Entry {{ $index + 1 }}
                      </button>
                    </h2>
                    <div id="assignmentCollapse{{ $index + 1 }}" class="collapse"
                      aria-labelledby="assignmentHeading{{ $index + 1 }}">
                      <div class="accordion-body">
                        <input type="hidden" name="customerassigments[{{ $index }}][asig_id]"
                          value="{{ $assigments->id }}">
                        <div class="col-lg-12">
                          <div class="row mb-2">
                            <div class="col-lg-3 ">
                              Customer Name <br>
                              <input class="form-control" name="customerassigments[{{ $index }}][asig_customer_name]"
                                value="{{ $assigments->asig_customer_name }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-3 ">
                              Task Assigning <br> <input class="form-control"
                                name="customerassigments[{{ $index }}][task_assigning]"
                                value="{{ $assigments->task_assigning }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-3">
                              Designation <br>
                              <input class="form-control" type="text" name="customerassigments[{{ $index }}][asig_desig]"
                                value="{{ $assigments->asig_desig }}" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 ">
                              Office/Floor <br> <input class="form-control"
                                name="customerassigments[{{ $index }}][asig_office]"
                                value="{{ $assigments->asig_office }}" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 ">
                              Building Name<br> <input class="form-control" type="text"
                                name="customerassigments[{{ $index }}][asig_building]"
                                value="{{ $assigments->asig_building }}" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3">
                              Road/Street <br> <input class="form-control" type="text"
                                name="customerassigments[{{ $index }}][asig_road]" value="{{ $assigments->asig_road }}"
                                placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 ">
                              Area <br> <input class="form-control" type="text"
                                name="customerassigments[{{ $index }}][asig_area]" value="{{ $assigments->asig_area }}"
                                placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 ">
                              City <br> <input class="form-control" type="text"
                                name="customerassigments[{{ $index }}][task_assigning]"
                                value="{{ $assigments->task_assigning }}" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3">
                              Country <br> <input class="form-control" type="text"
                                name="customerassigments[{{ $index }}][asig_country]"
                                value="{{ $assigments->asig_country }}" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 ">
                              Security Incharge <br> <input class="form-control"
                                name="customerassigments[{{ $index }}][asig_security]"
                                value="{{ $assigments->asig_security }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-3">
                              Contact Details <br> <input class="form-control"
                                name="customerassigments[{{ $index }}][asig_contact]"
                                value="{{ $assigments->asig_contact }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <h5 class="mt-3">Site Incharge Details</h5>
                            <div class="col-lg-3">
                              Incharge Name <br>
                              <input class="form-control" type="text"
                                name="customerassigments[{{ $index }}][incharge_name]"
                                value="{{ $assigments->incharge_name }}" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3">
                              Designation <br>
                              <input class="form-control" type="text"
                                name="customerassigments[{{ $index }}][incharge_desig]"
                                value="{{ $assigments->incharge_desig }}" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3">
                              Contact Details <br> <input class="form-control"
                                name="customerassigments[{{ $index }}][incharge_contact]"
                                value="{{ $assigments->incharge_contact }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-3">
                              High Risk Areas <br>
                              <input class="form-control" type="text"
                                name="customerassigments[{{ $index }}][incharge_help]"
                                value="{{ $assigments->incharge_help }}" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4">
                              Description of Risk <br>
                              <input class="form-control" type="text"
                                name="customerassigments[{{ $index }}][incharge_desc]"
                                value="{{ $assigments->incharge_desc }}" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4">
                              History of Risk <br> <input class="form-control"
                                name="customerassigments[{{ $index }}][incharge_risk]"
                                value="{{ $assigments->incharge_risk }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-4">
                              Assigned Area Manager Of PIFFERS <br>
                              <input class="form-control" type="text"
                                name="customerassigments[{{ $index }}][incharge_asig]"
                                value="{{ $assigments->incharge_asig }}" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-6">
                              Signed By <br> <input class="form-control"
                                name="customerassigments[{{ $index }}][incharge_signed_by]"
                                value="{{ $assigments->incharge_signed_by }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-6">
                              Date <br> <input class="form-control" type="date"
                                name="customerassigments[{{ $index }}][incharge_date]"
                                value="{{ $assigments->incharge_date }}" placeholder="..." style="width: 100%;">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="row mb-2">
                            <h5 class="mt-4">Address</h5>
                            <div class="row mb-2">
                              <div class="col-lg-4">
                                Office No <br> <input class="form-control" id=""
                                  name="customerassigments[{{ $index }}][incharge_offc]"
                                  value="{{ $assigments->incharge_offc }}" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-4">
                                Building <br> <input class="form-control" id=""
                                  name="customerassigments[{{ $index }}][incharge_build]"
                                  value="{{ $assigments->incharge_build }}" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-4 ">
                                Block <br> <input class="form-control" id=""
                                  name="customerassigments[{{ $index }}][incharge_block]"
                                  value="{{ $assigments->incharge_block }}" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-4">
                                Area <br> <input class="form-control" id=""
                                  name="customerassigments[{{ $index }}][incharge_area]"
                                  value="{{ $assigments->incharge_area }}" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-4 ">
                                City <br> <input class="form-control" id=""
                                  name="customerassigments[{{ $index }}][incharge_city]"
                                  value="{{ $assigments->incharge_city }}" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-4 ">
                                Pin Location <br> <input class="form-control" id="location-input4"
                                  name="customerassigments[{{ $index }}][incharge_pin]"
                                  value="{{ $assigments->incharge_pin }}" type="text" placeholder="..."
                                  style="width: 100%;" onfocus="initAutocomplete4()">
                              </div>
                              <div class="col-lg-3">
                                <br> <input class="form-control" id="" name="longitude4"
                                  value="{{ $customers->longitude4 }}" type="hidden" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-3">
                                <br> <input class="form-control" id="" name="latitude4"
                                  value="{{ $customers->latitude4 }}" type="hidden" placeholder="..."
                                  style="width: 100%;">
                              </div>
                            </div>
                            <div class="col-lg-3">
                              Country <br> <input class="form-control"
                                name="customerassigments[{{ $index }}][incharge_country]"
                                value="{{ $assigments->incharge_country }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-3">
                              Site ID <br> <input class="form-control"
                                name="customerassigments[{{ $index }}][incharge_site]"
                                value="{{ $assigments->incharge_site }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-3">
                              A-Guard <br> <input class="form-control"
                                name="customerassigments[{{ $index }}][incharge_a_g]"
                                value="{{ $assigments->incharge_a_g }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-3">
                              Un-A-Guard <br> <input class="form-control"
                                name="customerassigments[{{ $index }}][incharge_a_ung]"
                                value="{{ $assigments->incharge_a_ung }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-4 ">
                              Total Guard <br> <input class="form-control"
                                name="customerassigments[{{ $index }}][incharge_t_g]"
                                value="{{ $assigments->incharge_t_g }}" type="text" placeholder="..."
                                style="width: 100%;">
                            </div>
                            <div class="col-lg-4 ">
                              Recent Security Related Incidents <br>
                              <input class="form-control" type="text" name="customerassigments[{{ $index }}][rec_inc_rel]"
                                value="{{ $assigments->rec_inc_rel }}" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4">
                              Frequency Of Occurence <br>
                              <input class="form-control" type="text" name="customerassigments[{{ $index }}][feq_occ]"
                                value="{{ $assigments->feq_occ }}" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4">
                              Expectations from PIFFERS <br>
                              <input class="form-control" type="text" name="customerassigments[{{ $index }}][exp_piff]"
                                value="{{ $assigments->exp_piff }}" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4">
                              Any Special Instructions <br> <input class="form-control"
                                name="customerassigments[{{ $index }}][any_spec]" value="{{ $assigments->any_spec }}"
                                type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 ">
                              Petrolling Instruction <br>
                              <input class="form-control" type="text"
                                name="customerassigments[{{ $index }}][petr_instruc]"
                                value="{{ $assigments->petr_instruc }}" placeholder="..." style="width: 100%;">
                            </div>
                          </div>
                        </div>
                        <h3></h3>
                        <div class="row mb-2">
                          <div class="col-lg-6 spacing-left spacing-right mt-2">
                            Attachments <br> <input class="form-control" type="file"
                              name="customerassigments[{{ $index }}][asig_ex_attach]"
                              value="{{ $assigments->asig_ex_attach }}" placeholder="..." style="width: 70%;" multiple>
                            <div class="col-lg-5 spacing-right">
                              <div class="image-preview42" id="imagePreview42">
                                @if($assigments->asig_ex_attach)
                                  <img src="{{ asset($assigments->asig_ex_attach) }}" alt="Image Preview42"
                                    class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                @else
                                  <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 spacing-left spacing-right mt-2">
                            Notes <br>
                            <textarea id="w3review11" class="form-control"
                              name="customerassigments[{{ $index }}][asig_ex_notes]" oninput="trimSpaces11()"
                              onclick="moveCursorToStart11()" rows="2" cols="38">{{ $assigments->asig_ex_notes }}
                      </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="new_branch mt-2">
                <button type="button" id="addAssignment" onclick="addAssignmentSection()">Add More</button>
              </div>
            </div>
            <!--Audits-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="audit" role="tabpanel"
              aria-labelledby="nav-loto-tab">
              <div class="row" id="auditsAccordion">
                @foreach ($customers->customeraudits as $index => $audits)
                  <div class="accordion-item" id="auditEntry{{ $index + 1 }}">
                    <h2 class="accordion-header" id="auditHeading{{ $index + 1 }}">
                      <button class="accordion-button" type="button" data-toggle="collapse"
                        data-target="#auditCollapse{{ $index + 1 }}" aria-expanded="false"
                        aria-controls="auditCollapse{{ $index + 1 }}">
                        Audit {{ $index + 1 }}
                      </button>
                    </h2>
                    <div id="auditCollapse{{ $index + 1 }}" class="collapse"
                      aria-labelledby="auditHeading{{ $index + 1 }}">
                      <div class="accordion-body">
                        <input type="hidden" name="customeraudits[{{ $index }}][au_id]" value="{{ $audits->id }}">
                        <div class="col-lg-12">
                          <div class="row mb-2">
                            <div class="col-lg-3 spacing-right">
                              File Audited By : <br> <input class="form-control" id=""
                                name="customeraudits[{{ $index }}][audit_file]" value="{{ $audits->audit_file }}"
                                type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-left spacing-right">
                              Signature <br> <input class="form-control" id="head_office_email"
                                name="customeraudits[{{ $index }}][audit_sign]" value="{{ $audits->audit_sign }}"
                                type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                              Date <br> <input class="form-control" id="" name="customeraudits[{{ $index }}][audit_date]"
                                value="{{ $audits->audit_date }}" type="date" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-3 spacing-right">
                              Attachments <br> <input class="form-control" id=""
                                name="customeraudits[{{ $index }}][audit_attach]" value="{{ $audits->audit_attach }}"
                                type="file" placeholder="..." style="width: 100%;">
                              <div class="col-lg-5 spacing-right">
                                <div class="image-preview42" id="imagePreview42">
                                  @if($audits->audit_attach)
                                    <img src="{{ asset($audits->audit_attach) }}" alt="Image Preview42"
                                      class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                  @else
                                    <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <h5 class="mt-3">Checked By :</h5>
                        <div class="row mb-2">
                          <div class="col-lg-5 spacing-left spacing-right form-group">
                            Checked by: <br>
                            <div class="input-group" style="width: 100%;">
                              <select id="dropdown" class="form-control mt-1"
                                name="customeraudits[{{ $index }}][audit_checked_by]"
                                value="{{ $audits->audit_checked_by }}" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                <option value=""></option>
                                @foreach ($checkedby as $checked)
                                  <option value="{{ $checked->checkedby_name }}"
                                    @if($checked->checkedby_name == $audits->audit_checked_by) selected @endif>
                                    {{ $checked->checkedby_name}}
                                  </option>
                                @endforeach
                              </select>
                              <div class="input-group-append" style="width: 30%;">
                                <a href="{{ route('checkedby') }}">
                                  <button class="btn btn-primary" id="submit-category" type="button"
                                    style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-6 spacing-left spacing-right mt-2">
                            Attachements <br> <input class="form-control"
                              name="customeraudits[{{ $index }}][audit_ex_attach]" type="file"
                              value="{{ $audits->audit_ex_attach }}" placeholder="..." style="width: 70%;" multiple>
                            <div class="col-lg-5 spacing-right">
                              <div class="image-preview42" id="imagePreview42">
                                @if($audits->audit_ex_attach)
                                  <img src="{{ asset($audits->audit_ex_attach) }}" alt="Image Preview42"
                                    class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                @else
                                  <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 spacing-left spacing-right mt-2">
                            Notes <br>
                            <textarea id="w3review12" class="form-control" name="customeraudits[{{ $index }}][audit_note]"
                              oninput="trimSpaces12()" onclick="moveCursorToStart12()" rows="2" cols="38">{{ $audits->audit_note }}
                      </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="new_branch mt-2">
                <button type="button" class="add-more-btn" onclick="audits_add_more()">Add More</button>
              </div>
            </div>
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="address-details" role="tabpanel"
              aria-labelledby="nav-profile-tab">
              <!--Tabs forDetails-->
              <div class="row">
                <nav>
                  <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link" id="nav-meeting-tab" data-toggle="tab" href="#meeting" role="tab"
                      aria-controls="nav-meeting" aria-selected="false">Meetings
                      with Customer
                    </a>
                    <a class="nav-item nav-link" id="nav-meeting-tab" data-toggle="tab" href="#score" role="tab"
                      aria-controls="nav-meeting" aria-selected="false">Score
                      Card
                    </a>
                  </div>
                </nav>
                <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
                  <!--sales-pipeline-->
                  <div class="tab-pane fade m-3" style="opacity: 90%;" id="sales-pipeline" role="tabpanel"
                    aria-labelledby="nav-contact-tab">
                  </div>
                  <!--Meeting with Customer-->
                  <div class="tab-pane fade m-3" style="opacity: 90%;" id="meeting" role="tabpanel"
                    aria-labelledby="nav-meeting-tab">
                    <div class=" row main-content div">
                      <div class="col-lg-6">
                        <div class="row mb-2">
                          <div class="col-lg-6 spacing-right">
                            Date of meeting <br> <input class="form-control" id="" name="meeting_date"
                              value="{{ $customers->meeting_date }}" type="date" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                            Meeting Chaired By <br> <input class="form-control" id="head_office_email"
                              name="meeting_chaired" value="{{ $customers->meeting_chaired }}" type="text"
                              placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-6 spacing-right">
                            Minutes of Meeting <br> <input class="form-control" id="" name="meeting_minutes"
                              value="{{ $customers->meeting_minutes }}" type="text" placeholder="..."
                              style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                            Attachment <br> <input class="form-control" id="head_office_email" name="meeting_attach"
                              value="{{ $customers->meeting_attach }}" type="file" placeholder="..."
                              style="width: 100%;">
                          </div>
                          <div class="col-lg-5  spacing-right">
                            Customer Comments <br> <textarea class="form-control" id="head_office_comp"
                              name="meeting_comment" type="text" placeholder="..."
                              style="width: 100%;">{{ $customers->meeting_comment }}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 spacing-left">
                        <div class="row mb-2">
                          <div class="col-lg-5 spacing-left spacing-right form-group">
                            Main Point of Concern <br>
                            <div class="input-group" style="width: 100%;">
                              <select id="dropdown" class="form-control mt-1" name="meeting_main_point"
                                value="{{ $customers->meeting_main_point }}"
                                style="width: 70%; border-radius: 4px 0 0 4px; ">
                                <option value=""></option>
                                @foreach ($mpoc as $mpoc)
                                  <option value="{{  $mpoc->mpoc_name }}"
                                    @if($mpoc->mpoc_name == $customers->meeting_main_point) selected @endif>
                                    {{ $mpoc->mpoc_name }}
                                  </option>
                                @endforeach
                              </select>
                              <div class="input-group-append" style="width: 30%;">
                                <a href="{{ route('mpoc') }}">
                                  <button class="btn btn-primary" id="submit-category" type="button"
                                    style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-5 spacing-left">
                            Attachment <br> <input class="form-control" id="" name="meeting_ex_attach"
                              value="{{ $customers->meeting_ex_attach }}" type="file" placeholder="..."
                              style="width: 100%;">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-5 spacing-right">
                            Frequency of Meeting <br> <input class="form-control" id="" name="meeting_freq"
                              value="{{ $customers->meeting_freq }}" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left">
                            Attachment <br> <input class="form-control" id="" name="meeting_freq_attach"
                              value="{{ $customers->meeting_freq_attach }}" type="file" placeholder="..."
                              style="width: 100%;">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-lg-5  spacing-right">
                            Note <br> <textarea class="form-control" id="w3review21" name="meeting_freq_note"
                              oninput="trimSpaces21()" onclick="moveCursorToStart21()" type="text" placeholder="..."
                              style="width: 100%;">{{ $customers->meeting_freq_note }}</textarea>
                          </div>
                          <div class="col-lg-5 spacing-right" style="display: none">
                            Alert <br> <input class="form-control" id="" name="meeting_freq_alert" type="text"
                              value="{{ $customers->meeting_freq_alert }}" placeholder="meeting is pending"
                              style="width: 100%;">
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                          Attachements <br> <input class="form-control" type="file" name="meeting_alert_attach"
                            value="{{ $customers->meeting_alert_attach }}" placeholder="..." style="width: 70%;"
                            multiple>
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                          Notes <br>
                          <textarea id="w3review22" class="form-control" name="meeting_alert_notes"
                            oninput="trimSpaces22()" onclick="moveCursorToStart22()" rows="2" cols="38">{{ $customers->meeting_alert_notes }}
                  </textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--Score Card-->
                  <div class="tab-pane fade m-3" style="opacity: 90%;" id="score" role="tabpanel"
                    aria-labelledby="nav-meeting-tab">
                    <div class="container my-1">
                      <div class="accordion" id="scoreCardAccordion">
                        <!-- Initial Guarantor Accordion -->
                        <div class="accordion-item" id="scoreCardEntry1">
                          <h2 class="accordion-header" id="scoreCardHeading1">
                            <button class="accordion-button" type="button" data-toggle="collapse"
                              data-target="#scoreCardCollapse1" aria-expanded="true" aria-controls="scoreCardCollapse1">
                              scoreCard 1
                            </button>
                          </h2>
                          <div id="scoreCardCollapse1" class="accordion-collapse collapse show"
                            aria-labelledby="scoreCardHeading1">
                            <div class="accordion-body">
                              <img src="{{asset('smart.png')}}" alt="smart-turnout"
                                style="position:relative; left:22%;" />
                              <style>
                                .form_boot {
                                  border-top: none;
                                  border-right: none;
                                  border-left: none;
                                  border-bottom: 2 px solid black !imp;
                                }
                              </style>
                              <div class="row mb-1">
                                <div class="col-lg-4 spacing-left">
                                  Customer Name <br> <input class="form-control form_boot" name="scr_cus_name"
                                    value="{{ $customers->scr_cus_name }}" type="text" placeholder="..."
                                    style="width: 100%; ">
                                </div>
                                <div class="col-lg-4 spacing-left">
                                  Region <br> <input class="form-control form_boot" name="scr_cus_region"
                                    value="{{ $customers->scr_cus_region }}" type="text" placeholder="..."
                                    style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left">
                                  Customer ID <br> <input class="form-control form_boot" name="scr_cus_id"
                                    value="{{ $customers->scr_cus_id }}" type="text" placeholder="..."
                                    style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-left mt-2">
                                  Site ID <br> <input class="form-control form_boot" name="scr_cus_site_id"
                                    value="{{ $customers->scr_cus_site_id }}" type="text" placeholder="..."
                                    style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-left mt-2">
                                  Report <br> <input class="form-control form_boot" name="scr_cus_report"
                                    value="{{ $customers->scr_cus_report }}" type="text" placeholder="..."
                                    style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-left mt-2">
                                  Date <br> <input class="form-control form_boot" name="scr_cus_date"
                                    value="{{ $customers->scr_cus_date }}" type="date" placeholder="..."
                                    style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-left mt-2">
                                  For Month of: <br> <input class="form-control form_boot" name="f_month"
                                    value="{{ $customers->f_month }}" type="date" placeholder="..."
                                    style="width: 100%;">
                                </div>
                              </div>
                              <hr width="90%" />
                              <div class="row mt-3">
                                <h5 class="text-center">Score Card of Monthly Performance Report</h5>
                                <div class="col-lg-11">
                                  <table class="table table-bordered " style="border: 2px solid darkgray !important">
                                    <thead>
                                      <tr style="background-color: #3e3432; color:white;" width="100%">
                                        <th width="5%">Sr</th>
                                        <th width="20%">Category</th>
                                        <th width="45%">Sub-Category</th>
                                        <th width="15%">Marks</th>
                                        <th width="15%">Marks Obtained</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <style>
                                        .greenportion {
                                          background-color: chartreuse !important;
                                          color: white !important;
                                        }

                                        .orangeportion {
                                          background-color: orange !important;
                                          color: white !important;
                                        }

                                        .redrow {
                                          background-color: red !important;
                                          color: white !important;
                                        }

                                        .darkorange {
                                          background-color: #f77301 !important;
                                          color: white !important;
                                        }

                                        .bluerow {
                                          background-color: #4eaadd !important;
                                          color: white !important;
                                        }

                                        .darkbluerow {
                                          background-color: #012452 !important;
                                          color: white !important;
                                        }

                                        .brinjalrow {
                                          background-color: #870885 !important;
                                          color: white !important;
                                        }
                                      </style>
                                      {{-- Row 1 --}}
                                      <tr width="100%">
                                        <td class="greenportion" width="5%" rowspan="4">1</td>
                                        <td class="greenportion" width="20%" rowspan="4">Screening & Hiring</td>
                                        <td class="greenportion" width="45%">Shared Complete Hiring Form</td>
                                        <td class="greenportion" width="15%">5</td>
                                        <td width="15%"><input class="mark-input1" type="number"
                                            value="{{ $customers->marks1_schf }}" name="marks1_schf" /></td>
                                      </tr>
                                      <!-- Additional rows for the same sub-category -->
                                      <tr width="100%">
                                        <td class="greenportion" width="45%">Received & Shared Verifications</td>
                                        <td class="greenportion" width="15%">5</td>
                                        <td width="15%"><input class="mark-input1" type="number"
                                            value="{{ $customers->marks1_rsv }}" name="marks1_rsv" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td class="greenportion" width="45%">Received & Shared Guarantor Confirmation
                                        </td>
                                        <td class="greenportion" width="15%">5</td>
                                        <td width="15%"><input class="mark-input1" type="number"
                                            value="{{ $customers->marks1_rsgc }}" name="marks1_rsgc" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td class="greenportion" width="45%">Compliance Detail</td>
                                        <td class="greenportion" width="15%">5</td>
                                        <td width="15%"><input class="mark-input1" type="number"
                                            value="{{ $customers->marks1_cd }}" name="marks1_cd" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td width="5%"></td>
                                        <td width="20%"></td>
                                        <td width="45%">Total Marks:</td>
                                        <td width="15%">20</td>
                                        <td width="15%"><input id="result1" type="number"
                                            value="{{ $customers->marks1_tm1 }}" name="marks1_tm1" /></td>
                                      </tr>
                                      {{-- Row 2 --}}
                                      <tr width="100%">
                                        <td class="orangeportion" width="5%">2</td>
                                        <td class="orangeportion" width="20%">Smart Turnout</td>
                                        <td class="orangeportion" width="45%">Uniform Status</td>
                                        <td class="orangeportion" width="15%">15</td>
                                        <td width="15%"><input class="mark-input2" type="number"
                                            value="{{ $customers->marks2_us }}" name="marks2_us" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td width="5%"></td>
                                        <td width="20%"></td>
                                        <td width="45%">Total Marks:</td>
                                        <td width="15%">15</td>
                                        <td width="15%"><input id="result2" type="number"
                                            value="{{ $customers->marks2_tm2 }}" name="marks2_tm2" /></td>
                                      </tr>
                                      {{-- Row 3 --}}
                                      <tr width="100%">
                                        <td class="redrow" width="5%" rowspan="2">3</td>
                                        <td class="redrow" width="20%" rowspan="2">State of The Art Weapons</td>
                                        <td class="redrow" width="45%">Weapons Functioning Details Shared</td>
                                        <td class="redrow" width="15%">5</td>
                                        <td width="15%"><input class="mark-input3" type="number"
                                            value="{{ $customers->marks3_wfds }}" name="marks3_wfds" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td class="redrow" width="45%">Amour Visited</td>
                                        <td class="redrow" width="15%">5</td>
                                        <td width="15%"><input class="mark-input3" type="number"
                                            value="{{ $customers->marks3_av }}" name="marks3_av" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td width="5%"></td>
                                        <td width="20%"></td>
                                        <td width="45%">Total Marks:</td>
                                        <td width="15%">10</td>
                                        <td width="15%"><input id="result3" type="number"
                                            value="{{ $customers->marks3_tm3 }}" name="marks3_tm3" /></td>
                                      </tr>
                                      {{-- Row 4 --}}
                                      <tr width="100%">
                                        <td class="darkorange" width="5%" rowspan="2">4</td>
                                        <td class="darkorange" width="20%" rowspan="2">Periodical Trainings</td>
                                        <td class="darkorange" width="45%">Execution of Live Fire Arms Trainings</td>
                                        <td class="darkorange" width="15%">8</td>
                                        <td width="15%"><input class="mark-input4" type="number"
                                            value="{{ $customers->marks4_elfat }}" name="marks4_elfat" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td class="darkorange" width="45%">Availability of Training Hand Book with
                                          Guards</td>
                                        <td class="darkorange" width="15%">5</td>
                                        <td width="15%"><input class="mark-input4" type="number" name="marks4_athb" />
                                        </td>
                                      </tr>
                                      <tr width="100%">
                                        <td width="5%"></td>
                                        <td width="20%"></td>
                                        <td width="45%">Total Marks:</td>
                                        <td width="15%">13</td>
                                        <td width="15%"><input id="result4" type="number"
                                            value="{{ $customers->marks4_tm4 }}" name="marks4_tm4" /></td>
                                      </tr>
                                      {{-- Row 5 --}}
                                      <tr width="100%">
                                        <td class="bluerow" width="5%" rowspan="3">5</td>
                                        <td class="bluerow" width="20%" rowspan="3">Overall Excellence</td>
                                        <td class="bluerow" width="45%">Attendance Percentage as per Contract</td>
                                        <td class="bluerow" width="15%">5</td>
                                        <td width="15%"><input class="mark-input5" type="number"
                                            value="{{ $customers->marks5_apapc }}" name="marks5_apapc" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td class="bluerow" width="45%">Guarding Service</td>
                                        <td class="bluerow" width="15%">5</td>
                                        <td width="15%"><input class="mark-input5" type="number"
                                            value="{{ $customers->marks5_gs }}" name="marks5_gs" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td class="bluerow" width="45%">Finance (Invoices,Payroll,EOBI,Social
                                          Security,Sales Tax,Recovery Ledger)</td>
                                        <td class="bluerow" width="15%">5</td>
                                        <td width="15%"><input class="mark-input5" type="number"
                                            value="{{ $customers->marks5_finance }}" name="marks5_finance" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td width="5%"></td>
                                        <td width="20%"></td>
                                        <td width="45%">Total Marks:</td>
                                        <td width="15%">15</td>
                                        <td width="15%"><input id="result5" type="number"
                                            value="{{ $customers->marks5_tm5 }}" name="marks5_tm5" /></td>
                                      </tr>
                                      {{-- Row 6 --}}
                                      <tr width="100%">
                                        <td class="darkbluerow" width="5%">6</td>
                                        <td class="darkbluerow" width="20%">Customer Care</td>
                                        <td class="darkbluerow" width="45%">Shared Feedback Form (Soft via Email, Hard
                                          Copy Sent with Invoices)</td>
                                        <td class="darkbluerow" width="15%">5</td>
                                        <td width="15%"><input class="mark-input6" type="number"
                                            value="{{ $customers->marks6_sff }}" name="marks6_sff" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td width="5%"></td>
                                        <td width="20%"></td>
                                        <td width="45%">Total Marks:</td>
                                        <td width="15%">5</td>
                                        <td width="15%"><input id="result6" type="number"
                                            value="{{ $customers->marks6_tm6 }}" name="marks6_tm6" /></td>
                                      </tr>
                                      {{-- Row 7 --}}
                                      <tr width="100%">
                                        <td class="brinjalrow" width="5%" rowspan="6">7</td>
                                        <td class="brinjalrow" width="20%" rowspan="6">PIFFERS Hedonistic Approach</td>
                                        <td class="brinjalrow" width="45%">Monthly Visit of Top Management(GM/DGM/RM)
                                        </td>
                                        <td class="brinjalrow" width="15%">7</td>
                                        <td width="15%"><input class="mark-input7" type="number"
                                            value="{{ $customers->marks7_mvtm }}" name="marks7_mvtm" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td class="brinjalrow" width="45%">Monthly Performance Report Submitted</td>
                                        <td class="brinjalrow" width="15%">5</td>
                                        <td width="15%"><input class="mark-input7" type="number"
                                            value="{{ $customers->marks7_mprs }}" name="marks7_mprs" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td class="brinjalrow" width="45%">Shared Record of Learning Management Systems
                                          (LMS)</td>
                                        <td class="brinjalrow" width="15%">2.5</td>
                                        <td width="15%"><input class="mark-input7" type="number"
                                            value="{{ $customers->marks7_srlms }}" name="marks7_srlms" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td class="brinjalrow" width="45%">Reporting of Incident(s) at Site</td>
                                        <td class="brinjalrow" width="15%">2.5</td>
                                        <td width="15%"><input class="mark-input7" type="number"
                                            value="{{ $customers->marks7_risite }}" name="marks7_risite" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td class="brinjalrow" width="45%">Reporting of Incident(s) at Surroundings</td>
                                        <td class="brinjalrow" width="15%">2.5</td>
                                        <td width="15%"><input class="mark-input7" type="number"
                                            value="{{ $customers->marks7_risurr }}" name="marks7_risurr" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td class="brinjalrow" width="45%">Shared Details of Nearby Emergency Services
                                        </td>
                                        <td class="brinjalrow" width="15%">2.5</td>
                                        <td width="15%"><input class="mark-input7" type="number"
                                            value="{{ $customers->marks7_sdn1 }}" name="marks7_sdnl" /></td>
                                      </tr>
                                      <tr width="100%">
                                        <td width="5%"></td>
                                        <td width="20%"></td>
                                        <td width="45%">Total Marks:</td>
                                        <td width="15%">22</td>
                                        <td width="15%"><input id="result7" type="number"
                                            value="{{ $customers->marks7_tm7 }}" name="marks7_tm7" /></td>
                                      </tr>
                                      {{-- Grand Total Row --}}
                                      <tr width="100%" style="background-color: #32444f">
                                        <td width="5%"></td>
                                        <td width="20%"></td>
                                        <td width="45%" style="color: white">Grand Total:</td>
                                        <td width="15%" style="color: white">100</td>
                                        <td width="15%" style="color: white"><input id="grandTotal" type="number"
                                            value="{{ $customers->marks_grand_total }}" name="marks_grand_total" /></td>
                                      </tr>
                                    </tbody>
                                  </table>

                                </div>
                              </div>
                              <div class="row mb-1">
                                <div class="col-lg-4 spacing-left">
                                  Customer POC Name <br> <input class="form-control form_boot" name="cus_poc_name"
                                    value="{{ $customers->cus_poc_name }}" type="text" placeholder="..."
                                    style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left">
                                  Signature <br> <input class="form-control form_boot" name="cus_poc_signature"
                                    value="{{ $customers->cus_poc_signature }}" type="text" placeholder="..."
                                    style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left">
                                  Cell <br> <input class="form-control vldphone form_boot" name="cus_poc_cell"
                                    value="{{ $customers->cus_poc_cell }}" type="text" placeholder="..."
                                    style="width: 100%;">
                                  <div id="phoneError" class="phoneError" style="color: red"></div>
                                </div>
                                <div class="col-lg-4 spacing-left">
                                  CRO Name <br> <input class="form-control form_boot" name="cro_name"
                                    value="{{ $customers->cro_name }}" type="text" placeholder="..."
                                    style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left">
                                  Signature <br> <input class="form-control form_boot" name="cro_signature form_boot"
                                    value="{{ $customers->cro_signature }}" type="text" placeholder="..."
                                    style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left">
                                  Cell <br> <input class="form-control vldphone form_boot" name="cro_cell"
                                    value="{{ $customers->cro_cell }}" type="text" placeholder="..."
                                    style="width: 100%;">
                                  <div id="phoneError" class="phoneError" style="color: red"></div>
                                </div>
                                <div class="col-lg-4 spacing-left">
                                  GM/DGM Name <br> <input class="form-control form_boot" name="gm_name"
                                    value="{{ $customers->gm_name }}" type="text" placeholder="..."
                                    style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left">
                                  Signature <br> <input class="form-control form_boot" name="gm_signature"
                                    value="{{ $customers->gm_signature }}" type="text" placeholder="..."
                                    style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left">
                                  Cell <br> <input class="form-control vldphone form_boot" name="gm_signature"
                                    value="{{ $customers->gm_signature }}" type="text" placeholder="..."
                                    style="width: 100%;">
                                  <div id="phoneError" class="phoneError" style="color: red"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Add More and Save Buttons -->
                      <div class="row my-3">
                        <div class="col">
                          <button type="button" class="btn btn-primary" id="addscoreCardAccordion">Add new
                            scoreCard</button>
                        </div>
                        <button type="button" class="btn btn-primary" id="savescoreCardEntries">Save</button>
                      </div>

                      <!-- scoreCard Summary Table -->
                      <div class="table-responsive">
                        <table class="table table-bordered mt-1 " id="scoreCardSummaryTable">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Customer Name</th>
                              <th>Region</th>
                              <th>Report</th>
                              <th>Date</th>
                              <th>Month</th>

                            </tr>
                          </thead>

                          <tbody>

                          </tbody>
                        </table>
                      </div>
                    </div>

                    <!--<div class="d-flex justify-content-between align-items-center mt-3 mb-3">-->
                    <!--     <button class="btn btn-success" style="width:30%" id="newScoreCardButton">New Score Card</button>-->
                    <!--     <button class="btn btn-success" style="width:30%" id="saveScoreCardButton">Save Score Card</button>-->
                    <!--</div>-->
                    <div class=" row bg-dark pt-3 pb-3">
                      <div class="col-lg-4 text-center">
                        <b><a class="text-white" href="#">www.piffers.net</a></b>
                      </div>
                      <div class="col-lg-4">
                        <b class="text-white">Cell:</b>
                        <span class="text-white">+92-3466-8507444</span>
                      </div>
                      <div class="col-lg-4">
                        <b class="text-white">UAN :</b>
                        <span class="text-white">051-111-743-337</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--Intelligence-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="intelligence" role="tabpanel"
              aria-labelledby="nav-loto-tab">
              <div>
                <div id="businessAccordion">
                  @foreach ($customers->customerbussinesses as $index => $bussinesses)
                    <div class="accordion-item" id="businessEntry{{ $index + 1 }}">
                      <h2 class="accordion-header" id="businessHeading{{ $index + 1 }}">
                        <button class="accordion-button" type="button" data-toggle="collapse"
                          data-target="#businessCollapse{{ $index + 1 }}" aria-expanded="false"
                          aria-controls="businessCollapse{{ $index + 1 }}">
                          Business Entry {{ $index + 1 }}
                        </button>
                      </h2>
                      <div id="businessCollapse{{ $index + 1 }}" class="collapse"
                        aria-labelledby="businessHeading{{ $index + 1 }}">
                        <div class="accordion-body">
                          <input type="hidden" name="customerbussinesses[{{ $index }}][b_id]"
                            value="{{ $bussinesses->id }}">
                          <div class=" row main-content div">
                            <p>Please Collect information of other Business/Group of Customer.</p>
                            <h5>POC :</h5>
                            <div class="col-lg-12">
                              <div class="row mb-2">
                                <div class="col-lg-6 spacing-right">
                                  Name of Business <br> <input class="form-control"
                                    value="{{ $bussinesses->bussiness_name }}"
                                    name="customerbussinesses[{{ $index }}][bussiness_name]" type="text" placeholder="..."
                                    style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                  Nature of Business <br> <input class="form-control" id=""
                                    value="{{ $bussinesses->bussiness_nature }}"
                                    name="customerbussinesses[{{ $index }}][bussiness_nature]" type="text"
                                    placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-left">
                                  <h5>Address</h5>
                                  <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                      Office No <br> <input class="form-control" id=""
                                        value="{{ $bussinesses->bussiness_office_no }}"
                                        name="customerbussinesses[{{ $index }}][bussiness_office_no]" type="text"
                                        placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-right">
                                      Floor <br> <input class="form-control" id=""
                                        value="{{ $bussinesses->bussiness_floor }}"
                                        name="customerbussinesses[{{ $index }}][bussiness_floor]" type="text"
                                        placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5">
                                      Building <br> <input class="form-control" id=""
                                        value="{{ $bussinesses->bussiness_building }}"
                                        name="customerbussinesses[{{ $index }}][bussiness_building]" type="text"
                                        placeholder="..." style="width: 100%;">
                                    </div>
                                  </div>
                                  <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                      Block <br> <input class="form-control" id=""
                                        value="{{ $bussinesses->bussiness_block }}"
                                        name="customerbussinesses[{{ $index }}][bussiness_block]" type="text"
                                        placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                      Area <br> <input class="form-control" id=""
                                        value="{{ $bussinesses->bussiness_area }}"
                                        name="customerbussinesses[{{ $index }}][bussiness_area]" type="text"
                                        placeholder="..." style="width: 100%;">
                                    </div>
                                  </div>
                                  <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                      City <br> <input class="form-control" id=""
                                        value="{{ $bussinesses->bussiness_city }}"
                                        name="customerbussinesses[{{ $index }}][bussiness_city]" type="text"
                                        placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                      Photograph of Building <br> <input class="form-control" id=""
                                        value="{{ $bussinesses->bussiness_photo }}"
                                        name="customerbussinesses[{{ $index }}][bussiness_photo]" type="file"
                                        placeholder="..." style="width: 100%;">
                                      <div class="col-lg-5 spacing-right">
                                        <div class="image-preview42" id="imagePreview42">
                                          @if($bussinesses->bussiness_photo)
                                            <img src="{{ asset($bussinesses->bussiness_photo) }}" alt="Image Preview42"
                                              class="image-preview__image42"
                                              style="height: 100%; width:100%; margin-left:-13px;">
                                          @else
                                            <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                      Email <br> <input class="form-control vldemail" id=""
                                        name="customerbussinesses[{{ $index }}][bussiness_email]"
                                        value="{{ $bussinesses->bussiness_email }}" type="text" placeholder="..."
                                        style="width: 100%;">
                                      <div id="emailError" class="emailError" style="color: red"></div>
                                    </div>
                                    <div class="col-lg-5 spacing-left">
                                      Website <br> <input class="form-control vldwebsite" id=""
                                        name="customerbussinesses[{{ $index }}][bussiness_web]"
                                        value="{{ $bussinesses->bussiness_web }}" type="text" placeholder="..."
                                        style="width: 100%;">
                                      <div id="websiteError" class="websiteError" style="color: red"></div>
                                    </div>
                                  </div>
                                  <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right">
                                      Pin location <br> <input class="form-control" id="location-input5"
                                        name="customerbussinesses[{{ $index }}][bussiness_pin]"
                                        value="{{ $bussinesses->bussiness_pin }}" type="text" placeholder="..."
                                        style="width: 100%;" onfocus="initAutocomplete5()">
                                    </div>
                                    <div>
                                      <br> <input class="form-control" id="" name="longitude5"
                                        value="{{ $customers->longitude5 }}" type="hidden" placeholder="..."
                                        style="width: 100%;">
                                    </div>
                                    <div>
                                      <br> <input class="form-control" id="" name="latitude5"
                                        value="{{ $customers->latitude5 }}" type="hidden" placeholder="..."
                                        style="width: 100%;">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row mb-2">
                              <div class="col-lg-4 spacing-left spacing-right mt-2">
                                Notes <br>
                                <textarea id="w3review13" class="form-control"
                                  name="customerbussinesses[{{ $index }}][bussiness_notes]" oninput="trimSpaces13()"
                                  onclick="moveCursorToStart13()" rows="2" cols="38">{{ $bussinesses->bussiness_notes }}
                          </textarea>
                              </div>
                              <div class="col-lg-4 spacing-left spacing-right mt-2">
                                Attachements <br> <input class="form-control" value="{{ $bussinesses->bussiness_attach }}"
                                  type="file" name="customerbussinesses[{{ $index }}][bussiness_attach]" placeholder="..."
                                  style="width: 70%;" multiple>
                                <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                    @if($bussinesses->bussiness_attach)
                                      <img src="{{ asset($bussinesses->bussiness_attach) }}" alt="Image Preview42"
                                        class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                      <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
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
                <div style="width: 50%;">
                  <button class="btn btn-primary" type="button" onclick="business_add_more()">Add More</button>
                </div>
              </div>
              <h5 style="text-align:center;"><b><u>Promotional Activities</u></b></h5>
              <div>
                <div id="giveawaysAccordion">
                  @foreach ($customers->customeractivities as $index => $activitiess)
                    <div class="accordion-item" id="giveawayEntry{{ $index + 1 }}">
                      <h2 class="accordion-header" id="giveawayHeading{{ $index + 1 }}">
                        <button class="accordion-button" type="button" data-toggle="collapse"
                          data-target="#giveawayCollapse{{ $index + 1 }}" aria-expanded="false"
                          aria-controls="giveawayCollapse{{ $index + 1 }}">
                          Giveaway Entry {{ $index + 1 }}
                        </button>
                      </h2>
                      <div id="giveawayCollapse{{ $index + 1 }}" class="collapse"
                        aria-labelledby="giveawayHeading{{ $index + 1 }}">
                        <div class="accordion-body">
                          <input type="hidden" name="customeractivities[{{ $index }}][act_id]"
                            value="{{ $activitiess->id }}">
                          <div class="col-lg-6 spacing-right form-group">
                            Customer Details Entered in all Promotional Activities <br>
                            <div class="input-group" style="width: 100%;">
                              <select id="dropdown" class="form-control mt-1"
                                name="customeractivities[{{ $index }}][promotional_act]"
                                value="{{ $activitiess->promotional_act }}"
                                style="width: 70%; border-radius: 4px 0 0 4px; ">
                                <option value=""></option>
                                @foreach ($activities as $activity)
                                  <option value="{{ $activity->activity_name }}"
                                    @if($activity->activity_name == $activitiess->promotional_act) selected @endif>
                                    {{ $activity->activity_name }}
                                  </option>
                                @endforeach
                              </select>
                              <div class="input-group-append" style="width: 30%;">
                                <a href="{{ route('activities') }}">
                                  <button class="btn btn-primary" id="submit-category" type="button"
                                    style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 mt-1">
                            <div class="spacing-left">
                              Quantity <br> <input class="form-control" type="text"
                                name="customeractivities[{{ $index }}][promotional_quantity]"
                                value="{{ $activitiess->promotional_quantity }}" placeholder="..." style="width: 100%;">
                            </div>
                          </div>
                          <div class="form-type col-lg-6 spacing-right">
                            Estimated price<br> <input class="form-control" id="shift_start_date"
                              name="customeractivities[{{ $index }}][prom_price]" value="{{ $activitiess->prom_price }}"
                              type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="form-type col-lg-6 spacing-right">
                            Date <br> <input class="form-control" id="shift_end_date"
                              name="customeractivities[{{ $index }}][prom_date]" type="date"
                              value="{{ $activitiess->prom_date }}" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-6">
                            Notes <br> <textarea id="w3review14" class="form-control"
                              name="customeractivities[{{ $index }}][promotional_notes]" oninput="trimSpaces14()"
                              onclick="moveCursorToStart14()" rows="2" cols="38">{{ $activitiess->promotional_notes }}
                      </textarea>
                          </div>
                          <div class="col-lg-6 mb-3">
                            Attachments <br> <input class="form-control" type="file"
                              name="customeractivities[{{ $index }}][promotional_attach]"
                              value="{{ $activitiess->promotional_attach }}" placeholder="..." style="width: 100%;">
                            <div class="col-lg-5 spacing-right">
                              <div class="image-preview42" id="imagePreview42">
                                @if($activitiess->promotional_attach)
                                  <img src="{{ asset($activitiess->promotional_attach) }}" alt="Image Preview42"
                                    class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                @else
                                  <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                @endif
                              </div>
                            </div>
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
                <div class="row">
                  <div class="col-lg-2 spacing-left my-5">
                    <button type="button" class="add-more-btn" onclick="addPromotionalActivitySection()">Add
                      More</button>

                  </div>
                  <div class="col-lg-10 spacing-left my-5"> <button type="submit" class="btn btn-primary float-end">Save
                    </button></div>
                </div>
              </div>
            </div>
            <!--Notes Tab-->
            <div class="tab-pane fade  m-3" style="opacity: 90%;" id="notes-details" role="tabpanel"
              aria-labelledby="nav-notes-tab">
              <div class="row">
                <div class="col-lg-6 spacing-right">
                  <div class="row mb-2">
                    <div class="form-type col-lg-6 spacing-right">
                      Notes <br> <textarea class="form-control" type="text" id="" name="" placeholder=""
                        style="width: 100%;"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--Language Tab-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="language-details" role="tabpanel"
              aria-labelledby="nav-language-tab">
              <div class="row">
                <div class="col-lg-6 spacing-right">
                  <div class="row mb-2">
                    <div class="form-type col-lg-6 spacing-right">
                      Language <br>
                      <select id="" class="form-control" name="" style="width: 100%;">
                        <option value="">English</option>
                        <option value="">French</option>
                        <option value="">Spanish</option>
                        <option value="">Chinese</option>
                        <option value="">Portuguese</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--Feedback-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="verifications" role="tabpanel"
              aria-labelledby="nav-contact-tab">
              <h5 class="mt-4"><u><b>Feedback</b></u></h5>

              <script>
                document.addEventListener('DOMContentLoaded', function () {
                  // Listen for Bootstrap collapse events on feedback accordions
                  const feedbackObserver = new MutationObserver(function (mutations) {
                    mutations.forEach(function (mutation) {
                      if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                        const target = mutation.target;
                        if (target.classList.contains('show') && target.id.startsWith('feedbackCollapse')) {
                          const index = target.id.match(/feedbackCollapse(\d+)/)[1] - 1;
                          autoFillFeedback(index);
                        }
                      }
                    });
                  });

                  // Observe all collapse elements
                  document.querySelectorAll('.collapse').forEach(function (el) {
                    feedbackObserver.observe(el, { attributes: true });
                  });

                  function autoFillFeedback(index) {
                    // Get values from main customer form fields
                    const customerName = document.querySelector('input[name="customers_name"]').value || '';
                    const customerDisplayName = document.querySelector('input[name="display_name_as"]').value || '';
                    const customerEmail = document.querySelector('input[name="email"]').value || '';
                    const customerId = document.querySelector('input[name="customers_id"]').value || '';
                    const cityDeployment = document.querySelector('input[name="city_of_deployment"]').value || '';
                    const natureBusiness = document.querySelector('input[name="nature_of_business"]').value || '';
                    const customerPhone = document.querySelector('input[name="phone"]').value || '';

                    // Fill feedback fields
                    const clientNameInput = document.querySelector(`input[name="customerfeedbacks[${index}][feed_client_name]"]`);
                    const pocNameInput = document.querySelector(`input[name="customerfeedbacks[${index}][feed_client_poc_name]"]`);
                    const emailInput = document.querySelector(`input[name="customerfeedbacks[${index}][feed_client_email]"]`);
                    const clientIdInput = document.querySelector(`input[name="customerfeedbacks[${index}][feed_client_id]"]`);
                    const siteIdInput = document.querySelector(`input[name="customerfeedbacks[${index}][feed_client_site_id]"]`);
                    const desigInput = document.querySelector(`input[name="customerfeedbacks[${index}][feed_desig]"]`);
                    const cellInput = document.querySelector(`input[name="customerfeedbacks[${index}][feed_cell]"]`);

                    if (clientNameInput) clientNameInput.value = customerName;
                    if (pocNameInput) pocNameInput.value = customerDisplayName;
                    if (emailInput) emailInput.value = customerEmail;
                    if (clientIdInput) clientIdInput.value = customerId;
                    if (siteIdInput) siteIdInput.value = cityDeployment;
                    if (desigInput) desigInput.value = natureBusiness;
                    if (cellInput) cellInput.value = customerPhone;
                  }
                });
              </script>
              <div class="feedback">
                <div id="feedbackAccordion">
                  @foreach ($customers->customerfeedbacks as $index => $feedbacks)
                    <div class="accordion-item" id="feedbackEntry{{ $index + 1 }}">
                      <h2 class="accordion-header" id="feedbackHeading{{ $index + 1 }}">
                        <button class="accordion-button" type="button" data-toggle="collapse"
                          data-target="#feedbackCollapse{{ $index + 1 }}" aria-expanded="false"
                          aria-controls="feedbackCollapse{{ $index + 1 }}">
                          Feedback {{ $index + 1 }} Date: {{ $feedbacks->feed_date ?? now()->toDateString() }}

                        </button>
                      </h2>
                      <div id="feedbackCollapse{{ $index + 1 }}" class="collapse"
                        aria-labelledby="feedbackHeading{{ $index + 1 }}">
                        <div class="accordion-body">
                          <input type="hidden" name="customerfeedbacks[{{ $index }}][f_id]" value="{{ $feedbacks->id }}">
                          <div id="feedbackForm">
                            <div class="row">
                              <div class="col-lg-7">
                                <div class="row mb-2">
                                  <div class="col-lg-11 spacing-right">
                                    Client Name: <br> <input class="form-control"
                                      name="customerfeedbacks[{{ $index }}][feed_client_name]"
                                      value="{{ $feedbacks->feed_client_name }}" type="text" placeholder="..."
                                      style="width: 100%;">
                                  </div>
                                  <div class="col-lg-11 spacing-right">
                                    Client POC Name: <br> <input class="form-control"
                                      name="customerfeedbacks[{{ $index }}][feed_client_poc_name]"
                                      value="{{ $feedbacks->feed_client_poc_name }}" type="text" placeholder="..."
                                      style="width: 100%;">
                                  </div>
                                  <div class="col-lg-11 spacing-right">
                                    Email: <br> <input class="form-control vldemail"
                                      name="customerfeedbacks[{{ $index }}][feed_client_email]"
                                      value="{{ $feedbacks->feed_client_email }}" type="email" placeholder="..."
                                      style="width: 100%;">
                                    <div id="emailError" class="emailError" style="color: red"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-5">
                                <div class="row mb-2">
                                  <div class="col-lg-6 spacing-left spacing-right">
                                    Client ID: <br> <input class="form-control"
                                      name="customerfeedbacks[{{ $index }}][feed_client_id]"
                                      value="{{ $feedbacks->feed_client_id }}" type="text" placeholder="..."
                                      style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-right">
                                    Site ID: <br> <input class="form-control"
                                      name="customerfeedbacks[{{ $index }}][feed_client_site_id]"
                                      value="{{ $feedbacks->feed_client_site_id }}" type="text" placeholder="..."
                                      style="width: 100%;">
                                  </div>
                                </div>
                                <div class="row mb-5">
                                  <div class="col-lg-11 spacing-left spacing-right">
                                    Designation: <br> <input class="form-control"
                                      name="customerfeedbacks[{{ $index }}][feed_desig]"
                                      value="{{ $feedbacks->feed_desig }}" type="text" placeholder="..."
                                      style="width: 100%;">
                                  </div>
                                  <div class="col-lg-11 spacing-left spacing-right">
                                    Cell: <br> <input class="form-control vldphone" type="text"
                                      name="customerfeedbacks[{{ $index }}][feed_cell]"
                                      value="{{ $feedbacks->feed_cell }}" placeholder="..." style="width: 100%;">
                                    <div id="phoneError" class="phoneError" style="color: red"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-11">
                                <table class="table table-bordered" id="feedbackTable">
                                  <thead>
                                    <div class="row mb-5">
                                      <div class="col-lg-4 spacing-left spacing-right">
                                        <label class="form-lable">Feedback Date:</label>
                                        <input class="form-control" type="date"
                                          name="customerfeedbacks[{{ $index }}][feed_date]"
                                          value="{{ $feedbacks->feed_date }}" placeholder="..." style="width: 100%;" />
                                      </div>
                                      <div class="col-lg-4 spacing-left spacing-right">
                                        <label class="form-lable">Feedback for the month:</label>
                                        <input class="form-control" type="text"
                                          name="customerfeedbacks[{{ $index }}][feed_month]"
                                          value="{{ $feedbacks->feed_month }}" placeholder="..." style="width: 100%;" />
                                      </div>
                                    </div>
                                    <tr width="100%">
                                      <th width="75%">
                                        <p><b>A: Please Rate the following (Encircle from 1
                                            to 10):-
                                            (10 = Entirely Satisfied , 8 = Satisfied, 6 =
                                            Neutral, 2 = Unsatisfied, 0 = Entirely
                                            Unsatisfied)</b>
                                        </p>
                                      </th>
                                      <th width="5%">
                                        <img src="{{asset('emogi/smili.png')}}" width="30px" height="30px"
                                          alt="Entirely Satisfied">
                                        <!--Entirely Satisfied-->
                                      </th>
                                      <th width="5%">
                                        <img src="{{asset('emogi/facemode.png')}}" width="30px" height="30px"
                                          alt="Satisfied">
                                        <!--Satisfied-->
                                      </th>
                                      <th width="5%">
                                        <img src="{{asset('emogi/normal.png')}}" width="30px" height="30px" alt="Neutral">
                                        <!--Neutral-->
                                      </th>
                                      <th width="5%">
                                        <img src="{{asset('emogi/crying.png')}}" width="30px" height="30px"
                                          alt="Unsatisfied">
                                        <!--Unsatisfied-->
                                      </th>
                                      <th width="5%">
                                        <img src="{{asset('emogi/angry.png')}}" width="30px" height="30px"
                                          alt=" Entirely Unsatisfied">
                                        <!--Entirely Unsatisfied-->
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr width="100%">
                                      <td width="75%">1. Punctuality and Attendance of
                                        Guards
                                      </td>
                                      <td width="5%"><input type="radio" name="q1[" {{ $feedbacks->q1 == '10' ? 'checked' : '' }} value="10"></td>
                                      <td width="5%"><input type="radio" name="q1" {{ $feedbacks->q1 == '8' ? 'checked' : '' }} value="8"></td>
                                      <td width="5%"><input type="radio" name="q1" {{ $feedbacks->q1 == '6' ? 'checked' : '' }} value="6"></td>
                                      <td width="5%"><input type="radio" name="q1" {{ $feedbacks->q1 == '2' ? 'checked' : '' }} value="2"></td>
                                      <td width="5%"><input type="radio" name="q1" {{ $feedbacks->q1 == '0' ? 'checked' : '' }} value="0"></td>
                                    </tr>
                                    <tr width="100%">
                                      <td width="75%">2.Discipline, Behavior & Character
                                        of Guards
                                      </td>
                                      <td width="5%"><input type="radio" name="q2" {{ $feedbacks->q2 == '10' ? 'checked' : '' }} value="10"></td>
                                      <td width="5%"><input type="radio" name="q2" {{ $feedbacks->q2 == '8' ? 'checked' : '' }} value="8"></td>
                                      <td width="5%"><input type="radio" name="q2" {{ $feedbacks->q2 == '6' ? 'checked' : '' }} value="6"></td>
                                      <td width="5%"><input type="radio" name="q2" {{ $feedbacks->q2 == '2' ? 'checked' : '' }} value="2"></td>
                                      <td width="5%"><input type="radio" name="q2" {{ $feedbacks->q2 == '0' ? 'checked' : '' }} value="0"></td>
                                    </tr>
                                    <tr width="100%">
                                      <td width="75%">3. Smart Turnout of the Guards
                                        (Uniform)
                                      </td>
                                      <td width="5%"><input type="radio" name="q3" {{ $feedbacks->q3 == '10' ? 'checked' : '' }} value="10"></td>
                                      <td width="5%"><input type="radio" name="q3" {{ $feedbacks->q3 == '8' ? 'checked' : '' }} value="8"></td>
                                      <td width="5%"><input type="radio" name="q3" {{ $feedbacks->q3 == '6' ? 'checked' : '' }} value="6"></td>
                                      <td width="5%"><input type="radio" name="q3" {{ $feedbacks->q3 == '2' ? 'checked' : '' }} value="2"></td>
                                      <td width="5%"><input type="radio" name="q3" {{ $feedbacks->q3 == '0' ? 'checked' : '' }} value="0"></td>
                                    </tr>
                                    <tr width="100%">
                                      <td width="75%">4.Working Condition of Weapons &
                                        Security Equipments
                                      </td>
                                      <td width="5%"><input type="radio" name="q4" {{ $feedbacks->q4 == '10' ? 'checked' : '' }} value="10"></td>
                                      <td width="5%"><input type="radio" name="q4" {{ $feedbacks->q4 == '8' ? 'checked' : '' }} value="8"></td>
                                      <td width="5%"><input type="radio" name="q4" {{ $feedbacks->q4 == '6' ? 'checked' : '' }} value="6"></td>
                                      <td width="5%"><input type="radio" name="q4" {{ $feedbacks->q4 == '2' ? 'checked' : '' }} value="2"></td>
                                      <td width="5%"><input type="radio" name="q4" {{ $feedbacks->q4 == '0' ? 'checked' : '' }} value="0"></td>
                                    </tr>
                                    <tr width="100%">
                                      <td width="75%">5. Our Abidance regarding Taxes
                                        (Income Tax & Sales Tax)
                                      </td>
                                      <td width="5%"><input type="radio" name="q5" {{ $feedbacks->q5 == '10' ? 'checked' : '' }} value="10"></td>
                                      <td width="5%"><input type="radio" name="q5" {{ $feedbacks->q5 == '8' ? 'checked' : '' }} value="8"></td>
                                      <td width="5%"><input type="radio" name="q5" {{ $feedbacks->q5 == '6' ? 'checked' : '' }} value="6"></td>
                                      <td width="5%"><input type="radio" name="q5" {{ $feedbacks->q5 == '2' ? 'checked' : '' }} value="2"></td>
                                      <td width="5%"><input type="radio" name="q5" {{ $feedbacks->q5 == '0' ? 'checked' : '' }} value="0"></td>
                                    </tr>
                                    <tr width="100%">
                                      <td width="75%">6. Our Compliance wrt EOBI, Social
                                        Security & GLI of Guards
                                      </td>
                                      <td width="5%"><input type="radio" name="q6" {{ $feedbacks->q6 == '10' ? 'checked' : '' }} value="10"></td>
                                      <td width="5%"><input type="radio" name="q6" {{ $feedbacks->q6 == '8' ? 'checked' : '' }} value="8"></td>
                                      <td width="5%"><input type="radio" name="q6" {{ $feedbacks->q6 == '6' ? 'checked' : '' }} value="6"></td>
                                      <td width="5%"><input type="radio" name="q6" {{ $feedbacks->q6 == '2' ? 'checked' : '' }} value="2"></td>
                                      <td width="5%"><input type="radio" name="q6" {{ $feedbacks->q6 == '0' ? 'checked' : '' }} value="0"></td>
                                    </tr>
                                    <tr width="100%">
                                      <td width="75%">7. Timely Provision of Invoices &
                                        Guards Payroll Management
                                      </td>
                                      <td width="5%"><input type="radio" name="q7" {{ $feedbacks->q7 == '10' ? 'checked' : '' }} value="10"></td>
                                      <td width="5%"><input type="radio" name="q7" {{ $feedbacks->q7 == '8' ? 'checked' : '' }} value="8"></td>
                                      <td width="5%"><input type="radio" name="q7" {{ $feedbacks->q7 == '6' ? 'checked' : '' }} value="6"></td>
                                      <td width="5%"><input type="radio" name="q7" {{ $feedbacks->q7 == '2' ? 'checked' : '' }} value="2"></td>
                                      <td width="5%"><input type="radio" name="q7" {{ $feedbacks->q7 == '0' ? 'checked' : '' }} value="0"></td>
                                    </tr>
                                    <tr width="100%">
                                      <td width="75%">8. Level of Training of Guards</td>
                                      <td width="5%"><input type="radio" name="q8" {{ $feedbacks->q8 == '10' ? 'checked' : '' }} value="10"></td>
                                      <td width="5%"><input type="radio" name="q8" {{ $feedbacks->q8 == '8' ? 'checked' : '' }} value="8"></td>
                                      <td width="5%"><input type="radio" name="q8" {{ $feedbacks->q8 == '6' ? 'checked' : '' }} value="6"></td>
                                      <td width="5%"><input type="radio" name="q8" {{ $feedbacks->q8 == '2' ? 'checked' : '' }} value="2"></td>
                                      <td width="5%"><input type="radio" name="q8" {{ $feedbacks->q8 == '0' ? 'checked' : '' }} value="0"></td>
                                    </tr>
                                    <tr width="100%">
                                      <td width="75%">9. Level of Supervisory Staff
                                        Visiting the Guards
                                      </td>
                                      <td width="5%"><input type="radio" name="q9" {{ $feedbacks->q9 == '10' ? 'checked' : '' }} value="10"></td>
                                      <td width="5%"><input type="radio" name="q9" {{ $feedbacks->q9 == '8' ? 'checked' : '' }} value="8"></td>
                                      <td width="5%"><input type="radio" name="q9" {{ $feedbacks->q9 == '6' ? 'checked' : '' }} value="6"></td>
                                      <td width="5%"><input type="radio" name="q9" {{ $feedbacks->q9 == '2' ? 'checked' : '' }} value="2"></td>
                                      <td width="5%"><input type="radio" name="q9" {{ $feedbacks->q9 == '0' ? 'checked' : '' }} value="0"></td>
                                    </tr>
                                    <tr width="100%">
                                      <td width="75%">10. PIFFERS Mgmt Approach &
                                        Behavior towards Customer Service
                                      </td>
                                      <td width="5%"><input type="radio" name="q10" {{ $feedbacks->q10 == '10' ? 'checked' : '' }} value="10"></td>
                                      <td width="5%"><input type="radio" name="q10" {{ $feedbacks->q10 == '8' ? 'checked' : '' }} value="8"></td>
                                      <td width="5%"><input type="radio" name="q10" {{ $feedbacks->q10 == '6' ? 'checked' : '' }} value="6"></td>
                                      <td width="5%"><input type="radio" name="q10" {{ $feedbacks->q10 == '2' ? 'checked' : '' }} value="2"></td>
                                      <td width="5%"><input type="radio" name="q10" {{ $feedbacks->q10 == '0' ? 'checked' : '' }} value="0"></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div class="col-lg-4 spacing-right mb-3">
                                  Total Score: <br> <input class="form-control totalScore"
                                    name="customerfeedbacks[{{ $index }}][total_score]"
                                    value="{{ $feedbacks->total_score}}" type="text" placeholder="..."
                                    style="width: 100%;">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <p><b></b>B: Would you please, like to refer us any other Company /
                                Organization?</b>
                              </p>
                              <div class="col-lg-7">
                                <div class="row mb-2">
                                  <div class="col-lg-11 spacing-right">
                                    Company Name: <br> <input class="form-control"
                                      name="customerfeedbacks[{{ $index }}][feed_company_name]"
                                      value="{{ $feedbacks->feed_company_name }}" type="text" placeholder="..."
                                      style="width: 100%;">
                                  </div>
                                  <div class="col-lg-11 spacing-right">
                                    POC Name: <br> <input class="form-control"
                                      name="customerfeedbacks[{{ $index }}][feed_poc_name]"
                                      value="{{ $feedbacks->feed_poc_name }}" type="text" placeholder="..."
                                      style="width: 100%;">
                                  </div>
                                  <div class="col-lg-11 spacing-right">
                                    Suggestions / Comments:<br> <input class="form-control"
                                      name="customerfeedbacks[{{ $index }}][feed_comment]"
                                      value="{{ $feedbacks->feed_comment }}" type="text" placeholder="..."
                                      style="width: 100%;">
                                  </div>
                                  <div class="col-lg-11 spacing-right">
                                    Feedback Form Filled By:<br> <input class="form-control"
                                      name="customerfeedbacks[{{ $index }}][feedback_form]"
                                      value="{{ $feedbacks->feedback_form }}" type="text" placeholder="..."
                                      style="width: 100%;">
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-5">
                                <div class="row mb-2">
                                  <div class="col-lg-11 spacing-left spacing-right">
                                    Email: <br> <input class="form-control vldemail" type="text"
                                      name="customerfeedbacks[{{ $index }}][feed_email]"
                                      value="{{ $feedbacks->feed_email }}" placeholder="..." style="width: 100%;">
                                    <div id="emailError" class="emailError" style="color: red"></div>
                                  </div>
                                  <div class="col-lg-11 spacing-left spacing-right">
                                    Telephone: <br> <input class="form-control" type="text"
                                      name="customerfeedbacks[{{ $index }}][feed_telephone]"
                                      value="{{ $feedbacks->feed_telephone }}" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-11 spacing-left spacing-right">
                                    Signature & Date: <br> <input class="form-control"
                                      name="customerfeedbacks[{{ $index }}][feed_signature]"
                                      value="{{ $feedbacks->feed_signature }}" type="text" placeholder="..."
                                      style="width: 100%;">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <p>To Be Filled by PIFFERS SECURITY SERVICES (PVT) LTD</p>
                              <div class="col-lg-11 spacing-right">
                                Feedback Form Received By: <br> <input class="form-control"
                                  name="customerfeedbacks[{{ $index }}][feed_received]"
                                  value="{{ $feedbacks->feed_received }}" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-11 spacing-right">
                                Remarks: <br> <input class="form-control" type="text"
                                  name="customerfeedbacks[{{ $index }}][feed_remarks]"
                                  value="{{ $feedbacks->feed_remarks }}" placeholder="..." style="width: 100%;">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-11 spacing-right">
                                Attachments: <br> <input id="" class="form-control"
                                  name="customerfeedbacks[{{ $index }}][feed_attach]"
                                  value="{{ $feedbacks->feed_attach }}" type="file" placeholder="..."
                                  style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                    @if($feedbacks->feed_attach)
                                      <img src="{{ asset($feedbacks->feed_attach) }}" alt="Image Preview42"
                                        class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                      <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
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
                  <div class=" mt-2 d-flex justify-content-between align-items-center">
                    <button type="button" class="add-more-btn" style="width:30%" onclick="feedback_add_more()">Add
                      More</button>
                    {{-- <button type="button" style="width:30%" class="add-more-btn">Save</button> --}}
                  </div>
                </div>
              </div>
              <h5 class="mt-4"><u><b>Complaints Management</b></u></h5>
              <div>
                <div id="complaintAccordion">
                  @foreach ($customers->customercomplaints as $index => $complaints)
                    <div class="accordion-item" id="complaintEntry{{ $index + 1 }}">
                      <h2 class="accordion-header" id="complaintHeading{{ $index + 1 }}">
                        <button class="accordion-button" type="button" data-toggle="collapse"
                          data-target="#complaintCollapse{{ $index + 1 }}" aria-expanded="false"
                          aria-controls="complaintCollapse{{ $index + 1 }}">
                          Complaint Entry {{ $index + 1 }} Date:
                          {{ $complaints->complain_month ?? now()->toDateString() }}
                        </button>
                      </h2>
                      <div id="complaintCollapse{{ $index + 1 }}" class="collapse"
                        aria-labelledby="complaintHeading{{ $index + 1 }}">
                        <div class="accordion-body">
                          <input type="hidden" name="customercomplaints[{{ $index }}][com_id]"
                            value="{{ $complaints->id }}">
                          <div class="col-lg-12">
                            <div class="row mb-2">
                              <div class="col-lg-4 spacing-left spacing-right">
                                Complaint Number <br> <input class="form-control"
                                  name="customercomplaints[{{ $index }}][complaint_no]"
                                  value="{{ $complaints->complaint_no }}" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div>
                                <h5 class="mt-3" id="headingText" style="display: inline-block;">
                                  {{ $duty->heading_title ?? 'Guards Duty' }}
                                  <button class="btn btn-link" type="button" data-bs-toggle="modal"
                                    data-bs-target="#editHeadingModal" style="vertical-align: middle;">
                                    <i class="bi bi-pencil"
                                      style="font-size: 1.2rem; position: relative; right: 10px;"></i>
                                  </button>
                                </h5>
                              </div>
                              <div class="col-lg-5 spacing-left spacing-right form-group">
                                Guards Duty <br>
                                <div class="input-group" style="width: 100%;">
                                  <select id="dropdown" class="form-control mt-1"
                                    name="customercomplaints[{{ $index }}][complaint_guards_duty]"
                                    value="{{ $complaints->complaint_guards_duty }}"
                                    style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                    @foreach ($duties as $duty)
                                      <option value="{{  $duty->duty_name }}"
                                        @if($duty->duty_name == $complaints->complaint_guards_duty) selected @endif>
                                        {{ $duty->duty_name }}
                                      </option>
                                    @endforeach
                                  </select>
                                  <div class="input-group-append" style="width: 30%;">
                                    <a href="{{ route('duties') }}">
                                      <button class="btn btn-primary" id="submit-category" type="button"
                                        style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                                Complain Of Month <br> <input type="date" id="w3complaint15" class="form-control"
                                  name="customercomplaints[{{ $index }}][complain_month]">

                              </div>
                              <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                                Notes <br> <textarea id="w3review15" class="form-control"
                                  name="customercomplaints[{{ $index }}][complaint_gaurd_note]" oninput="trimSpaces15()"
                                  onclick="moveCursorToStart15()" rows="2" cols="40">{{ $complaints->complaint_gaurd_note }}
                          </textarea>
                              </div>
                              <div class="col-lg-3 spacing-left spacing-right">
                                Attachments <br> <input class="form-control"
                                  name="customercomplaints[{{ $index }}][complaint_guard_attach]" type="file"
                                  value="{{ $complaints->complaint_guard_attach }}" placeholder="..."
                                  style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                    @if($complaints->complaint_guard_attach)
                                      <img src="{{ asset($complaints->complaint_guard_attach) }}" alt="Image Preview42"
                                        class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                      <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="row mb-2">
                              <div>
                                <h5 class="mt-3" id="=headingequipment" style="display: inline-block;">
                                  {{ $equipment->equipment_title ?? 'Weapons, Uniform and Equipment' }}
                                  <button class="btn btn-link" type="button" data-bs-toggle="modal"
                                    data-bs-target="#editHeadingEquipmentModal" style="vertical-align: middle;">
                                    <i class="bi bi-pencil"
                                      style="font-size: 1.2rem; position: relative; right: 10px;"></i>
                                  </button>
                                </h5>
                              </div>
                              <div class="col-lg-5 spacing-left spacing-right form-group">
                                Weapons, Uniform and Equipment <br>
                                <br>
                                <div class="input-group" style="width: 100%;">
                                  <select id="dropdown" class="form-control mt-1"
                                    name="customercomplaints[{{ $index }}][wea_uni_equip]"
                                    value="{{ $complaints->wea_uni_equip }}"
                                    style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                    @foreach ($equipments as $equipment)
                                      <option value="{{ $equipment->equipment_name }}"
                                        @if($equipment->equipment_name == $complaints->wea_uni_equip) selected @endif>
                                        {{ $equipment->equipment_name }}
                                      </option>
                                    @endforeach
                                  </select>
                                  <div class="input-group-append" style="width: 30%;">
                                    <a href="{{ route('equipments') }}">
                                      <button class="btn btn-primary" id="submit-category" type="button"
                                        style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                                Notes <br> <textarea id="w3review16" oninput="trimSpaces16()"
                                  onclick="moveCursorToStart16()" class="form-control"
                                  name="customercomplaints[{{ $index }}][wue_note]" rows="2" cols="40">{{ $complaints->wue_note }}
                          </textarea>
                              </div>
                              <div class="col-lg-3 spacing-left spacing-right">
                                Attachments <br> <input class="form-control"
                                  name="customercomplaints[{{ $index }}][wue_attach]"
                                  value="{{ $complaints->wue_attach }}" type="file" placeholder="..."
                                  style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                    @if($complaints->wue_attach)
                                      <img src="{{ asset($complaints->wue_attach) }}" alt="Image Preview42"
                                        class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                      <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="row mb-2">
                              <div>
                                <h5 class="mt-3" id="headingfinance" style="display: inline-block">
                                  {{ $finance->finance_title ?? 'Finance Department Heading' }}
                                  <button class="btn btn-link" type="button" data-bs-toggle="modal"
                                    data-bs-target="#editHeadingFinanceModal" style="vertical-align: middle"><i
                                      class="bi bi-pencil"
                                      style="font-size: 1.2rem; position: relative; right: 10px;"></i></button>
                                </h5>
                              </div>
                              <div class="col-lg-5 spacing-left spacing-right form-group">
                                Finance Department <br>
                                <br>
                                <div class="input-group" style="width: 100%;">
                                  <select id="dropdown" class="form-control mt-1"
                                    name="customercomplaints[{{ $index }}][finance_dept]"
                                    value="{{ $complaints->finance_dept }}"
                                    style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                    @foreach ($finances as $finance)
                                      <option value="{{  $finance->finance_name }}"
                                        @if($finance->finance_name == $complaints->finance_dept) selected @endif>
                                        {{ $finance->finance_name }}
                                      </option>
                                    @endforeach
                                  </select>
                                  <div class="input-group-append" style="width: 30%;">
                                    <a href="{{ route('finances') }}">
                                      <button class="btn btn-primary" id="submit-category" type="button"
                                        style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                                Notes <br> <textarea id="w3review17" class="form-control"
                                  name="customercomplaints[{{ $index }}][fd_note]" oninput="trimSpaces17()"
                                  onclick="moveCursorToStart17()" rows="2" cols="40">{{ $complaints->fd_note }}
                          </textarea>
                              </div>
                              <div class="col-lg-3 spacing-left spacing-right">
                                Attachments <br> <input class="form-control"
                                  name="customercomplaints[{{ $index }}][fd_attach]" value="{{ $complaints->fd_attach }}"
                                  type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                    @if($complaints->fd_attach)
                                      <img src="{{ asset($complaints->fd_attach) }}" alt="Image Preview42"
                                        class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                      <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="row mb-2">
                              <h5>Source of Complaint</h5>
                              <div class="col-lg-5 spacing-left spacing-right form-group">
                                Source of Complaint <br>
                                <br>
                                <div class="input-group" style="width: 100%;">
                                  <select id="dropdown" class="form-control mt-1"
                                    name="customercomplaints[{{ $index }}][src_complaint]"
                                    value="{{ $complaints->src_complaint }}"
                                    style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                    @foreach ($sources as $source)
                                      <option value="{{ $source->source_name }}"
                                        @if($source->source_name == $complaints->src_complaint) selected @endif>
                                        {{ $source->source_name }}
                                      </option>
                                    @endforeach
                                  </select>
                                  <div class="input-group-append" style="width: 30%;">
                                    <a href="{{ route('sources') }}">
                                      <button class="btn btn-primary" id="submit-category" type="button"
                                        style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                                Notes <br> <textarea id="w3review" class="form-control"
                                  name="customercomplaints[{{ $index }}][src_note]" rows="2" cols="40">{{ $complaints->src_note }}
                          </textarea>
                              </div>
                              <div class="col-lg-3 spacing-left spacing-right">
                                Attachments <br> <input class="form-control"
                                  name="customercomplaints[{{ $index }}][src_attach]"
                                  value="{{ $complaints->src_attach }}" type="file" placeholder="..."
                                  style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                    @if($complaints->src_attach)
                                      <img src="{{ asset($complaints->src_attach) }}" alt="Image Preview42"
                                        class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                      <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="row mb-2">
                              <h5>Management Issues</h5>
                              <div class="col-lg-3 spacing-right">
                                <label for="mng_feedback">Feedback:</label> <br>
                                <input class="form-control" name="customercomplaints[{{ $index }}][mng_feed]"
                                  value="{{ $complaints->mng_feed }}" type="text" placeholder="..."
                                  style="width: 100%; margin-top: -7px;">
                              </div>
                              <div class="col-lg-3 spacing-left spacing-right">
                                Attachments <br> <input class="form-control" id="printing_date"
                                  name="customercomplaints[{{ $index }}][mng_attach]"
                                  value="{{ $complaints->mng_attach }}" type="file" placeholder="..."
                                  style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                    @if($complaints->mng_attach)
                                      <img src="{{ asset($complaints->mng_attach) }}" alt="Image Preview42"
                                        class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                      <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                    @endif
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 spacing-left" style="margin-left: 12px">
                                Notes <br> <textarea id="w3review18" class="form-control"
                                  name="customercomplaints[{{ $index }}][mng_note]" oninput="trimSpaces18()"
                                  onclick="moveCursorToStart18()" rows="2" cols="40">{{ $complaints->mng_note }}
                          </textarea>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="row mb-2">
                              <h5>Complaint POC Details</h5>
                              <div class="col-lg-4 spacing-right">
                                Name <br> <input class="form-control"
                                  name="customercomplaints[{{ $index }}][complaint_poc_name]"
                                  value="{{ $complaints->complaint_poc_name }}" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-4 spacing-right">
                                Designation <br> <input class="form-control"
                                  name="customercomplaints[{{ $index }}][complaint_poc_desig]"
                                  value="{{ $complaints->complaint_poc_desig }}" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-4 spacing-right">
                                Department <br> <input class="form-control"
                                  name="customercomplaints[{{ $index }}][complaint_poc_dept]"
                                  value="{{ $complaints->complaint_poc_dept }}" type="text" placeholder="..."
                                  style="width: 100%;">
                              </div>
                              <div class="col-lg-4 spacing-right">
                                Email<br> <input class="form-control vldemail"
                                  name="customercomplaints[{{ $index }}][complaint_poc_email]"
                                  value="{{ $complaints->complaint_poc_email }}" type="text" placeholder="..."
                                  style="width: 100%;">
                                <div id="emailError" class="emailError" style="color: red"></div>
                              </div>
                              <div class="col-lg-4 spacing-right">
                                Contact Number<br> <input class="form-control vldphone"
                                  name="customercomplaints[{{ $index }}][complaint_poc_contact]"
                                  value="{{ $complaints->complaint_poc_contact }}" type="text" placeholder="..."
                                  style="width: 100%;">
                                <div id="phoneError" class="phoneError" style="color: red"></div>
                              </div>
                              <div class="col-lg-4 spacing-right">
                                Picture of Complaint <br> <input class="form-control"
                                  name="customercomplaints[{{ $index }}][complaint_picture]"
                                  value="{{ $complaints->complaint_picture }}" type="file" placeholder="..."
                                  style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                    @if($complaints->complaint_picture)
                                      <img src="{{ asset($complaints->complaint_picture) }}" alt="Image Preview42"
                                        class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                      <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                    @endif
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4 spacing-right">
                                Details of Complaint <br> <textarea class="form-control"
                                  name="customercomplaints[{{ $index }}][details_complaint]" type="text" placeholder="..."
                                  style="width: 100%;">{{ $complaints->details_complaint }}</textarea>
                              </div>
                              <div class="col-lg-4 spacing-right">
                                Details Attachment<br> <input class="form-control"
                                  name="customercomplaints[{{ $index }}][details_attach]"
                                  value="{{ $complaints->details_attach }}" type="file" placeholder="..."
                                  style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                    @if($complaints->details_attach)
                                      <img src="{{ asset($complaints->details_attach) }}" alt="Image Preview42"
                                        class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                    @else
                                      <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                    @endif
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-5 spacing-left spacing-right form-group">
                                Complaint Tagged To : <br>
                                <div class="input-group" style="width: 100%;">
                                  <select id="dropdown" class="form-control mt-1"
                                    name="customercomplaints[{{ $index }}][complaint_tagged]"
                                    value="{{ $complaints->complaint_tagged }}"
                                    style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                    @foreach ($complaintsto as $complaintto)
                                      <option value="{{ $complaintto->tagged_to_name }}"
                                        @if($complaintto->tagged_to_name == $complaints->complaint_tagged) selected @endif>
                                        {{ $complaintto->tagged_to_name }}
                                      </option>
                                    @endforeach
                                  </select>
                                  <div class="input-group-append" style="width: 30%;">
                                    <a href="{{ route('complaintto') }}">
                                      <button class="btn btn-primary" id="submit-category" type="button"
                                        style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-5 spacing-left spacing-right form-group">
                                Complaint Addressed By : <br>
                                <div class="input-group" style="width: 100%;">
                                  <select id="dropdown" class="form-control mt-1"
                                    name="customercomplaints[{{ $index }}][complaint_arressed]"
                                    value="{{ $complaints->complaint_arressed }}"
                                    style="width: 70%; border-radius: 4px 0 0 4px; ">
                                    <option value=""></option>
                                    @foreach ($complaintsby as $complaintby)
                                      <option value="{{ $complaintby->addressed_by_name }}"
                                        @if($complaintby->addressed_by_name == $complaints->complaint_arressed) selected
                                        @endif>{{ $complaintby->addressed_by_name }}</option>
                                    @endforeach
                                  </select>
                                  <div class="input-group-append" style="width: 30%;">
                                    <a href="{{ route('complaintby') }}">
                                      <button class="btn btn-primary" id="submit-category" type="button"
                                        style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="col-lg-6 spacing-left spacing-right mt-2">
                              Attachements <br> <input class="form-control" type="file"
                                name="customercomplaints[{{ $index }}][complaint_addressed_attach]"
                                value="{{ $complaints->complaint_addressed_attach }}" placeholder="..."
                                style="width: 70%;" multiple>
                              <div class="col-lg-5 spacing-right">
                                <div class="image-preview42" id="imagePreview42">
                                  @if($complaints->complaint_addressed_attach)
                                    <img src="{{ asset($complaints->complaint_addressed_attach) }}" alt="Image Preview42"
                                      class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                  @else
                                    <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 spacing-left spacing-right my-3">
                              Notes <br>
                              <textarea id="w3review19" class="form-control" oninput="trimSpaces19()"
                                onclick="moveCursorToStart19()"
                                name="customercomplaints[{{ $index }}][complaint_addressed_note]" rows="2" cols="38">{{ $complaints->complaint_addressed_note }}
                        </textarea>
                            </div>
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  <!-- Update Heading Modal -->

                </div>
                <div class="mt-2 d-flex justify-content-between align-items-center">
                  <button style="width:30%" class="btn btn-primary" type="button" onclick="addComplaintSection()">
                    Add Complaint
                  </button>
                  {{-- <button type="button" style="width:30%" class="add-more-btn">Save</button> --}}

                </div>
              </div>
              <h5 class="mt-4"><u><b>Notifications</b></u></h5>
              <div>
                <div id="notificationsAccordion">
                  @foreach ($customers->customernotifications as $index => $notificationss)
                    <div class="accordion-item" id="notificationEntry{{ $index + 1 }}">
                      <h2 class="accordion-header" id="notificationHeading{{ $index + 1 }}">
                        <button class="accordion-button" type="button" data-toggle="collapse"
                          data-target="#notificationCollapse{{ $index + 1 }}" aria-expanded="false"
                          aria-controls="notificationCollapse{{ $index + 1 }}">
                          Notification {{ $index + 1 }} Date:
                          {{ $notificationss->notification_of_month ?? now()->toDateString() }}
                        </button>
                      </h2>
                      <div id="notificationCollapse{{ $index + 1 }}" class="collapse"
                        aria-labelledby="notificationHeading{{ $index + 1 }}">
                        <div class="accordion-body">
                          <input type="hidden" name="customernotifications[{{ $index }}][n_id]"
                            value="{{ $notificationss->id }}">
                          <div class="row mb-2">
                            <input type="hidden" name="customernotifications[{{ $index }}][n_id]"
                              value="{{ $notificationss->id }}">
                            <div class="col-lg-4 ">
                              Notification No. <br> <input class="form-control" type="text"
                                name="customernotifications[{{ $index }}][notification_no]"
                                value="{{ $notificationss->notification_no }}" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4  form-group">
                              Notification Related to :

                              <div class="input-group" style="width: 100%;">
                                <select id="dropdown" class="form-control mt-1"
                                  name="customernotifications[{{ $index }}][notification_related]"
                                  value="{{ $notificationss->notification_related }}"
                                  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                  <option value=""></option>
                                  @foreach ($notifications as $notification)
                                    <option value="{{ $notification->notification_name }}"
                                      @if($notification->notification_name == $notificationss->notification_related) selected
                                      @endif>{{ $notification->notification_name }}</option>
                                  @endforeach
                                </select>
                                <div class="input-group-append" style="width: 30%;">
                                  <a href="{{ route('notifications') }}">
                                    <button class="btn btn-primary" id="submit-category" type="button"
                                      style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 form-group">
                              Notification Shared With : <br>

                              <div class="input-group" style="width: 100%;">
                                <select id="dropdown" class="form-control mt-1"
                                  name="customernotifications[{{ $index }}][notification_shared]"
                                  value="{{ $notificationss->notification_shared }}"
                                  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                  <option value=""></option>
                                  @foreach ($notificationshared as $notificationshare)
                                    <option value="{{ $notificationshare->notification_shared_name}}" @if(
                                        $notificationshare->notification_shared_name ==
                                        $notificationss->notification_shared
                                      )
                                    selected @endif>{{ $notificationshare->notification_shared_name }}</option>
                                  @endforeach
                                </select>
                                <div class="input-group-append" style="width: 30%;">
                                  <a href="{{ route('notificationshared') }}">
                                    <button class="btn btn-primary" id="submit-category" type="button"
                                      style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 ">
                              Attachment. <br> <input class="form-control" type="file"
                                name="customernotifications[{{ $index }}][notification_attach]"
                                value="{{ $notificationss->notification_attach }}" placeholder="..." style="width: 100%;">
                              <div class="col-lg-5 spacing-right">
                                <div class="image-preview42" id="imagePreview42">
                                  @if($notificationss->notification_attach)
                                    <img src="{{ asset($notificationss->notification_attach) }}" alt="Image Preview42"
                                      class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                  @else
                                    <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 ">
                              Attachements <br> <input class="form-control" type="file"
                                name="customernotifications[{{ $index }}][notification_ex_attach]"
                                value="{{ $notificationss->notification_ex_attach }}" placeholder="..." multiple>
                              <div class="col-lg-6 spacing-right">
                                <div class="image-preview42" id="imagePreview42">
                                  @if($notificationss->notification_ex_attach)
                                    <img src="{{ asset($notificationss->notification_ex_attach) }}" alt="Image Preview42"
                                      class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                  @else
                                    <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 ">
                              Notification of Month <br> <input type="date" class="form-control"
                                name="customernotifications[{{ $index }}][notification_of_month]"
                                value="{{ $notificationss->notification_of_month }}" placeholder="...">
                            </div>

                          </div>

                          <div class="row mb-2">

                            <div class="col-lg-6 my-3">
                              Notes. <br> <textarea class="form-control" id="w3review20" type="text"
                                oninput="trimSpaces20()" onclick="moveCursorToStart20()"
                                name="customernotifications[{{ $index }}][notification_note]" placeholder="..."
                                style="width: 100%;">{{ $notificationss->notification_note }}</textarea>
                            </div>
                            <div class="col-lg-6 my-3">
                              Notes <br>
                              <textarea id="w3review" class="form-control"
                                name="customernotifications[{{ $index }}][notification_ex_note]" rows="2" cols="38">{{ $notificationss->notification_ex_note }}
                        </textarea>
                            </div>
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
                <div class=" mt-2 mb-2 d-flex justify-content-between align-items-center">
                  <button style="width:30%" type="button" class="add-more-btn" onclick="notifications_add_more()">Add
                    More</button>
                  {{-- <button type="button" style="width:30%" class="add-more-btn">Save</button> --}}
                </div>
              </div>
            </div>
            <!--monthly performance-->
          </div>
        </div>
      </div>
</div>
</div>
</div>
<div class="footer mt-5"
  style="bottom: 0; width: 100%; background-color: #320056; padding: 10px; display: flex; justify-content: space-between; align-items: center;">
  <button type="button" name="cancel" class="btn btn-secondary"
    style="color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 80px;"><i>Cancel</i></button>
  <div style="display: flex; align-items: center;">
    <img src="{{asset('logo.png')}}" alt="Logo" style="height: 30px; margin-right: 10px;">
    <h4 style="color: #fff; margin: 0; font-size: 14px;"><i>PIFFERS SECURITY SERVICES</i></h4>
  </div>
  <div class="dropdown" style="position: relative; display: inline-block;">
    <button type="button" class="btn btn-primary"
      style="background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 150px;"><i
        style="margin-right:30px;">Submission
        &#8594;</i></button>
    <div class="dropdown-content"
      style="display: none; position: absolute; background-color: #f9f9f9; min-width: 130px; box-shadow: 0px -8px 16px 0px rgba(0,0,0,0.2); z-index: 1; bottom: 100%;">
      <button type="submit" name="save_and_email"
        style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save
          & Email/Whatsapp</i></button>
      <button type="submit" name="save_and_share"
        style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save
          & share link</i></button>
      <button type="submit" name="save_and_new"
        style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save
          & New</i></button>
      <button type="submit"
        style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save
          & Close</i></button>
    </div>
  </div>
</div>
</form>

<!-- Image Preview Modal -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imagePreviewModalLabel">Image Preview</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img id="modalImage" src="" alt="Preview" class="img-fluid" style="max-height: 500px;">
      </div>
    </div>
  </div>
</div>

</section>
<!-- </div> -->
<!-- </div> -->
<!-- </div> -->
<!-- </div> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    var scoreCardEntryCount = 1;

    // Add More scoreCard Button Click Event
    $('#addscoreCardAccordion').on('click', function () {
      scoreCardEntryCount++;
      var newscoreCardAccordion = `
              <div class="accordion-item" id="scoreCardEntry${scoreCardEntryCount}">
                  <h2 class="accordion-header" id="scoreCardHeading${scoreCardEntryCount}">
                      <button class="accordion-button" type="button" data-toggle="collapse" data-target="#scoreCardCollapse${scoreCardEntryCount}" aria-expanded="true" aria-controls="scoreCardCollapse${scoreCardEntryCount}">
                          scoreCard ${scoreCardEntryCount}
                      </button>
                  </h2>
                  <div id="scoreCardCollapse${scoreCardEntryCount}" class="accordion-collapse collapse show"   aria-labelledby="scoreCardHeading1${scoreCardEntryCount}" data-parent="#scoreCardAccordion">
                      <div class="accordion-body">


  <img src="{{asset('smart.png')}}" alt="smart-turnout" style="position:relative; left:22%;" />
                  <style>
                      .form_boot{
                          border-top:none;
                          border-right:none;
                          border-left:none;
                          border-bottom:2 px solid black !imp;
                      }
                  </style>
                  <div class="row mb-1">
                     <div class="col-lg-4 spacing-left">
                        Customer Name <br> <input class="form-control form_boot" name="scr_cus_name"  value="{{ $customers->scr_cus_name }}"type="text" placeholder="..." style="width: 100%; ">
                     </div>
                     <div class="col-lg-4 spacing-left">
                        Region <br> <input class="form-control form_boot" name="scr_cus_region" value="{{ $customers->scr_cus_region }}" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-4 spacing-left">
                        Customer ID <br> <input class="form-control form_boot" name="scr_cus_id" value="{{ $customers->scr_cus_id }}" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-3 spacing-left mt-2">
                        Site ID <br> <input class="form-control form_boot" name="scr_cus_site_id" value="{{ $customers->scr_cus_site_id }}" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-3 spacing-left mt-2">
                        Report <br> <input class="form-control form_boot" name="scr_cus_report" value="{{ $customers->scr_cus_report }}" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-3 spacing-left mt-2">
                        Date <br> <input class="form-control form_boot" name="scr_cus_date" value="{{ $customers->scr_cus_date }}" type="date" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-3 spacing-left mt-2">
                        For Month of: <br> <input class="form-control form_boot" name="f_month" value="{{ $customers->f_month }}" type="date" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <hr width="90%" />
                  <div class="row mt-3">
                     <h5 class="text-center">Score Card of Monthly Performance Report</h5>
                     <div class="col-lg-11">
                        <table class="table table-bordered " style="border: 2px solid darkgray !important">
                           <thead>
                              <tr style="background-color: #3e3432; color:white;" width="100%">
                                 <th width="5%">Sr</th>
                                 <th width="20%">Category</th>
                                 <th width="45%">Sub-Category</th>
                                 <th width="15%">Marks</th>
                                 <th width="15%">Marks Obtained</th>
                              </tr>
                           </thead>
                           <tbody>
                               <style>
                                   .greenportion{
                                       background-color:chartreuse !important; color:white !important;
                                   }
                                   .orangeportion{
                                           background-color:orange !important; color:white !important;
                                   }
                                   .redrow{
                                        background-color:red !important; color:white !important;
                                   }
                                   .darkorange{
                                       background-color:#f77301 !important; color:white !important;
                                   }
                                   .bluerow{
                                          background-color:#4eaadd !important; color:white !important;
                                   }
                                   .darkbluerow{
                                       background-color:#012452 !important; color:white !important;
                                   }
                                   .brinjalrow{
                                       background-color:#870885 !important; color:white !important;
                                   }
                               </style>
                              {{-- Row 1 --}}
                              <tr  width="100%">
                                 <td class="greenportion" width="5%" rowspan="4">1</td>
                                 <td class="greenportion" width="20%" rowspan="4">Screening & Hiring</td>
                                 <td class="greenportion" width="45%">Shared Complete Hiring Form</td>
                                 <td class="greenportion" width="15%">5</td>
                                 <td width="15%"><input class="mark-input1" type="number" value="{{ $customers->marks1_schf }}" name="marks1_schf"/></td>
                              </tr>
                              <!-- Additional rows for the same sub-category -->
                              <tr  width="100%">
                                 <td class="greenportion" width="45%">Received & Shared Verifications</td>
                                 <td class="greenportion" width="15%">5</td>
                                 <td  width="15%"><input class="mark-input1" type="number" value="{{ $customers->marks1_rsv }}"  name="marks1_rsv"/></td>
                              </tr>
                              <tr  width="100%">
                                 <td class="greenportion" width="45%">Received & Shared Guarantor Confirmation</td>
                                 <td class="greenportion" width="15%">5</td>
                                 <td  width="15%"><input class="mark-input1" type="number" value="{{ $customers->marks1_rsgc }}" name="marks1_rsgc"/></td>
                              </tr>
                              <tr  width="100%">
                                 <td class="greenportion" width="45%">Compliance Detail</td>
                                 <td class="greenportion" width="15%">5</td>
                                 <td width="15%"><input class="mark-input1" type="number" value="{{ $customers->marks1_cd }}" name="marks1_cd"/></td>
                              </tr>
                              <tr  width="100%" >
                                 <td width="5%" ></td>
                                 <td width="20%" ></td>
                                 <td width="45%">Total Marks:</td>
                                 <td width="15%" >20</td>
                                 <td width="15%" ><input id="result1" type="number" value="{{ $customers->marks1_tm1 }}"  name="marks1_tm1"/></td>
                              </tr>
                              {{-- Row 2 --}}
                              <tr width="100%">
                                 <td class="orangeportion" width="5%" >2</td>
                                 <td class="orangeportion" width="20%">Smart Turnout</td>
                                 <td class="orangeportion" width="45%">Uniform Status</td>
                                 <td class="orangeportion" width="15%">15</td>
                                 <td width="15%"><input class="mark-input2" type="number" value="{{ $customers->marks2_us }}" name="marks2_us"/></td>
                              </tr>
                              <tr width="100%"  >
                                 <td width="5%" ></td>
                                 <td width="20%" ></td>
                                 <td width="45%" >Total Marks:</td>
                                 <td width="15%" >15</td>
                                 <td width="15%" ><input id="result2" type="number" value="{{ $customers->marks2_tm2 }}"  name="marks2_tm2"/></td>
                              </tr>
                              {{-- Row 3 --}}
                              <tr width="100%">
                                 <td class="redrow" width="5%" rowspan="2">3</td>
                                 <td class="redrow" width="20%" rowspan="2">State of The Art Weapons</td>
                                 <td class="redrow" width="45%">Weapons Functioning Details Shared</td>
                                 <td class="redrow" width="15%">5</td>
                                 <td width="15%"><input class="mark-input3" type="number" value="{{ $customers->marks3_wfds }}" name="marks3_wfds"/></td>
                              </tr>
                              <tr width="100%">
                                 <td class="redrow" width="45%">Amour Visited</td>
                                 <td class="redrow" width="15%">5</td>
                                 <td  width="15%"><input class="mark-input3" type="number" value="{{ $customers->marks3_av }}" name="marks3_av"/></td>
                              </tr>
                              <tr width="100%"  >
                                 <td width="5%" ></td>
                                 <td width="20%" ></td>
                                 <td width="45%" >Total Marks:</td>
                                 <td width="15%">10</td>
                                 <td width="15%" ><input id="result3" type="number" value="{{ $customers->marks3_tm3 }}" name="marks3_tm3"/></td>
                              </tr>
                              {{-- Row 4 --}}
                              <tr width="100%">
                                 <td class="darkorange" width="5%" rowspan="2">4</td>
                                 <td class="darkorange"  width="20%" rowspan="2">Periodical Trainings</td>
                                 <td class="darkorange"  width="45%">Execution of Live Fire Arms Trainings</td>
                                 <td class="darkorange"  width="15%">8</td>
                                 <td width="15%"><input class="mark-input4" type="number" value="{{ $customers->marks4_elfat }}" name="marks4_elfat"/></td>
                              </tr>
                              <tr width="100%">
                                 <td class="darkorange"  width="45%">Availability of Training Hand Book with Guards</td>
                                 <td class="darkorange"  width="15%">5</td>
                                 <td width="15%"><input class="mark-input4" type="number" name="marks4_athb"/></td>
                              </tr>
                              <tr width="100%" >
                                 <td width="5%" ></td>
                                 <td width="20%" ></td>
                                 <td width="45%">Total Marks:</td>
                                 <td width="15%" >13</td>
                                 <td width="15%"><input id="result4" type="number" value="{{ $customers->marks4_tm4 }}" name="marks4_tm4"/></td>
                              </tr>
                              {{-- Row 5 --}}
                              <tr width="100%">
                                 <td class="bluerow" width="5%" rowspan="3">5</td>
                                 <td class="bluerow" width="20%" rowspan="3">Overall Excellence</td>
                                 <td class="bluerow" width="45%">Attendance Percentage as per Contract</td>
                                 <td class="bluerow" width="15%">5</td>
                                 <td width="15%"><input class="mark-input5" type="number" value="{{ $customers->marks5_apapc }}" name="marks5_apapc"/></td>
                              </tr>
                              <tr width="100%">
                                 <td class="bluerow" width="45%">Guarding Service</td>
                                 <td class="bluerow" width="15%">5</td>
                                 <td width="15%"><input class="mark-input5" type="number" value="{{ $customers->marks5_gs }}" name="marks5_gs"/></td>
                              </tr>
                              <tr width="100%">
                                 <td class="bluerow" width="45%">Finance (Invoices,Payroll,EOBI,Social Security,Sales Tax,Recovery Ledger)</td>
                                 <td class="bluerow" width="15%">5</td>
                                 <td  width="15%"><input class="mark-input5" type="number" value="{{ $customers->marks5_finance }}"  name="marks5_finance"/></td>
                              </tr>
                              <tr width="100%">
                                 <td width="5%" ></td>
                                 <td width="20%" ></td>
                                 <td width="45%">Total Marks:</td>
                                 <td width="15%" >15</td>
                                 <td width="15%" ><input id="result5" type="number" value="{{ $customers->marks5_tm5 }}" name="marks5_tm5"/></td>
                              </tr>
                              {{-- Row 6 --}}
                              <tr width="100%">
                                 <td class="darkbluerow" width="5%" >6</td>
                                 <td class="darkbluerow" width="20%" >Customer Care</td>
                                 <td class="darkbluerow" width="45%">Shared Feedback Form (Soft via Email, Hard Copy Sent with Invoices)</td>
                                 <td class="darkbluerow" width="15%">5</td>
                                 <td width="15%"><input class="mark-input6" type="number" value="{{ $customers->marks6_sff }}" name="marks6_sff"/></td>
                              </tr>
                              <tr width="100%">
                                 <td width="5%" ></td>
                                 <td width="20%" ></td>
                                 <td width="45%">Total Marks:</td>
                                 <td width="15%" >5</td>
                                 <td width="15%"><input id="result6" type="number" value="{{ $customers->marks6_tm6 }}" name="marks6_tm6"/></td>
                              </tr>
                              {{-- Row 7 --}}
                              <tr width="100%">
                                 <td class="brinjalrow" width="5%" rowspan="6">7</td>
                                 <td  class="brinjalrow" width="20%" rowspan="6">PIFFERS Hedonistic Approach</td>
                                 <td  class="brinjalrow" width="45%">Monthly Visit of Top Management(GM/DGM/RM)</td>
                                 <td  class="brinjalrow" width="15%">7</td>
                                 <td width="15%"><input class="mark-input7" type="number" value="{{ $customers->marks7_mvtm }}" name="marks7_mvtm"/></td>
                              </tr>
                              <tr width="100%">
                                 <td  class="brinjalrow" width="45%">Monthly Performance Report Submitted</td>
                                 <td  class="brinjalrow" width="15%">5</td>
                                 <td width="15%"><input class="mark-input7" type="number" value="{{ $customers->marks7_mprs }}" name="marks7_mprs"/></td>
                              </tr>
                              <tr width="100%">
                                 <td  class="brinjalrow" width="45%">Shared Record of Learning Management Systems (LMS)</td>
                                 <td  class="brinjalrow" width="15%">2.5</td>
                                 <td width="15%"><input class="mark-input7" type="number" value="{{ $customers->marks7_srlms }}" name="marks7_srlms"/></td>
                              </tr>
                              <tr width="100%">
                                 <td  class="brinjalrow" width="45%">Reporting of Incident(s) at Site</td>
                                 <td  class="brinjalrow" width="15%">2.5</td>
                                 <td width="15%"><input class="mark-input7" type="number" value="{{ $customers->marks7_risite }}" name="marks7_risite"/></td>
                              </tr>
                              <tr width="100%">
                                 <td  class="brinjalrow" width="45%">Reporting of Incident(s) at Surroundings</td>
                                 <td  class="brinjalrow" width="15%">2.5</td>
                                 <td width="15%"><input class="mark-input7" type="number" value="{{ $customers->marks7_risurr }}" name="marks7_risurr"/></td>
                              </tr>
                              <tr width="100%">
                                 <td  class="brinjalrow" width="45%">Shared Details of Nearby Emergency Services</td>
                                 <td  class="brinjalrow" width="15%">2.5</td>
                                 <td width="15%"><input class="mark-input7" type="number" value="{{ $customers->marks7_sdn1 }}" name="marks7_sdnl"/></td>
                              </tr>
                              <tr width="100%" >
                                 <td width="5%" ></td>
                                 <td width="20%" ></td>
                                 <td width="45%">Total Marks:</td>
                                 <td width="15%">22</td>
                                 <td width="15%"><input id="result7" type="number" value="{{ $customers->marks7_tm7 }}" name="marks7_tm7"/></td>
                              </tr>
                              {{-- Grand Total Row --}}
                              <tr width="100%"  style="background-color: #32444f">
                                 <td width="5%" ></td>
                                 <td width="20%" ></td>
                                 <td width="45%" style="color: white">Grand Total:</td>
                                 <td width="15%" style="color: white">100</td>
                                 <td width="15%" style="color: white"><input id="grandTotal" type="number" value="{{ $customers->marks_grand_total }}" name="marks_grand_total"/></td>
                              </tr>
                           </tbody>
                        </table>

                     </div>
                  </div>
                  <div class="row mb-1">
                     <div class="col-lg-4 spacing-left">
                        Customer POC Name <br> <input class="form-control form_boot" name="cus_poc_name" value="{{ $customers->cus_poc_name }}" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-4 spacing-left">
                        Signature <br> <input class="form-control form_boot" name="cus_poc_signature" value="{{ $customers->cus_poc_signature }}" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-4 spacing-left">
                        Cell <br> <input class="form-control vldphone form_boot" name="cus_poc_cell" value="{{ $customers->cus_poc_cell }}" type="text" placeholder="..." style="width: 100%;">
                        <div id="phoneError" class="phoneError" style="color: red"></div>
                     </div>
                     <div class="col-lg-4 spacing-left">
                        CRO Name <br> <input class="form-control form_boot" name="cro_name" value="{{ $customers->cro_name }}" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-4 spacing-left">
                        Signature <br> <input class="form-control form_boot" name="cro_signature form_boot" value="{{ $customers->cro_signature }}" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-4 spacing-left">
                        Cell <br> <input class="form-control vldphone form_boot" name="cro_cell" value="{{ $customers->cro_cell }}" type="text" placeholder="..." style="width: 100%;">
                        <div id="phoneError" class="phoneError" style="color: red"></div>
                     </div>
                     <div class="col-lg-4 spacing-left">
                        GM/DGM Name <br> <input class="form-control form_boot" name="gm_name" value="{{ $customers->gm_name }}" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-4 spacing-left">
                        Signature <br> <input class="form-control form_boot" name="gm_signature" value="{{ $customers->gm_signature }}" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-4 spacing-left">
                        Cell <br> <input class="form-control vldphone form_boot" name="gm_signature" value="{{ $customers->gm_signature }}" type="text" placeholder="..." style="width: 100%;">
                        <div id="phoneError" class="phoneError" style="color: red"></div>
                     </div>
                      <center class="mt-2">
                                      <button type="button" style="width: 20%; float: right;" class="remove-btn btn-success" onclick="scoreCard_remove_fields(${scoreCardEntryCount})">Remove</button>
                                  </center>
                  </div>


                          </div>
                </div>
              </div>
          `;
      $('#scoreCardAccordion').append(newscoreCardAccordion);
    });

    // Save scoreCard Entries Button Click Event
    $('#savescoreCardEntries').on('click', function () {
      updatescoreCardSummaryTable();
    });

    // Function to update summary table for scoreCard entries
    function updatescoreCardSummaryTable() {
      // Clear existing rows
      $('#scoreCardSummaryTable tbody').empty();

      // Iterate through each scoreCard accordion item and update the summary table
      $('.accordion-item').each(function (index) {
        var cname = $(this).find('[name="scr_cus_name[]"]').val();
        var region = $(this).find('[name="scr_cus_region[]"]').val();
        var report = $(this).find('[name="scr_cus_report[]"]').val();
        var date = $(this).find('[name="scr_cus_date[]"]').val();
        var formonthof = $(this).find('[name="f_month[]"]').val();


        // Check if any relevant data is entered
        if (cname || region || report || date || formonthof
        ) {

          // Add a new row to the summary table
          $('#scoreCardSummaryTable tbody').append(`
                      <tr>
                          <td>${index + 1}</td>
                          <td>${cname}</td>
                          <td>${region}</td>
                          <td>${report}</td>
                          <td>${date}</td>
                          <td>${formonthof}</td>

                      </tr>
                  `);
        }
      });
    }
    window.scoreCard_remove_fields = function (id) {
      $('#scoreCardEntry' + id).remove();
      updatescoreCardSummaryTable();
    };
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Image click event for preview in modal
    document.querySelectorAll('.preview-image').forEach(image => {
      image.addEventListener('click', function () {
        const imageUrl = this.dataset.image; // Get the image source from data attribute
        const modalImage = document.getElementById('modalImage'); // Modal image element
        modalImage.src = imageUrl; // Set the modal image source
      });
    });
  });

</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.remove-image-btn').forEach(button => {
      button.addEventListener('click', function () {
        const customerId = this.dataset.customerId;
        const type = this.dataset.type;

        if (confirm(`Are you sure you want to delete this ${type}?`)) {
          fetch('{{ route("delete.attachment") }}', {
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({ customer_id: customerId, type: type }),
          })
            .then(response => response.json())
            .then(data => {
              if (data.success) {
                alert(data.message);

                // Reload the page after deletion
                location.reload();
              } else {
                alert(data.message);
              }
            })
            .catch(error => console.error('Error:', error));
        }
      });
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
  var signatoryRoom = {{ count($customers->customersignatories) }} + 1;

  $(document).ready(function () {
    $('#addSignatory').on('click', function () {
      var accordionCount = $('.accordion-item').length + 1;

      var accordionHtml = `
              <div class="accordion-item" id="signatoryEntry${signatoryRoom}">
                  <h2 class="accordion-header" id="signatoryHeading${signatoryRoom}">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#signatoryCollapse${signatoryRoom}" aria-expanded="false" aria-controls="signatoryCollapse${signatoryRoom}">
                          Signatory Entry ${signatoryRoom}
                      </button>
                  </h2>
                  <div id="signatoryCollapse${signatoryRoom}" class="collapse" aria-labelledby="signatoryHeading${signatoryRoom}">
                      <div class="accordion-body">
                          <!-- Your empty form fields go here -->
                          <input type="hidden" name="customersignatories[${signatoryRoom - 1}][s_id]" value="">
                          <div class="form-group">
                              <label for="sign_name">Name</label>
                              <input class="form-control" name="customersignatories[${signatoryRoom - 1}][sign_name]" value="" type="text" placeholder="...">
                          </div>
                          <div class="col-lg-5 spacing-right">
                              Designation <br>
                              <input class="form-control" name="customersignatories[${signatoryRoom - 1}][sign_desig]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-right">
                              Cell No <br>
                              <input class="form-control vldphone" type="text" name="customersignatories[${signatoryRoom - 1}][sign_cell]" value="" placeholder="..." style="width: 100%;">
                              <div id="phoneError" class="phoneError" style="color: red"></div>
                          </div>
                          <div class="col-lg-5 spacing-right">
                              Email <br>
                              <input class="form-control vldemail" type="text" name="customersignatories[${signatoryRoom - 1}][sign_email]" value="" placeholder="..." style="width: 100%;">
                              <div id="emailError" class="emailError" style="color: red"></div>
                          </div>
                         <div class="new_branch mt-2">
                              <button type="button" class="removeSignatory" data-accordion-id="signatoryEntry${signatoryRoom}">
                                  Remove
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
          `;

      $('#signatoryAccordion').append(accordionHtml);
      signatoryRoom++;
    });

    $('#signatoryAccordion').on('click', '.removeSignatory', function () {
      var accordionId = $(this).data('accordion-id');
      $('#' + accordionId).remove();
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  document.getElementById("activeEmailRadio").addEventListener("click", function () {
    console.log("Radio button clicked");
    openCustomModal();
  });

  function openCustomModal() {
    document.getElementById("customModal").style.display = "block";

    const emailBody = `
          Dear ${document.querySelector('input[name="customers_name"]').value},
          Greetings from PIFFERS!
          Hope you are doing well. It is submitted that, Supervisor ${document.querySelector('input[name="visit_perf_by"]').value} Visited ${document.querySelector('input[name="pat_super_loc"]').value} On ${document.querySelector('input[name="pat_super_date"]').value} on ${document.querySelector('input[name="pat_super_day"]').value}

          The Photos and videos of the visit are attached here for your reference
          Moreover, please feel free to contact us whenever you think we can be of any assistance.

          Thank You

          Best Regards

          Operation Department
          ${document.getElementById("customers_region").value}
          PIFFERS Security Services (Pvt.) Ltd.
      `;

    document.getElementById("customEmailBody").value = emailBody;
  }

  document.getElementById("confirm-send-email").addEventListener("click", function () {
    var emailSubject = document.getElementById("customEmailSubject").value;
    var emailBody = document.getElementById("customEmailBody").value;
    var recipientEmail = document.getElementById("recipientEmail").value;
    var ccEmail = document.getElementById("ccEmail").value;
    var bccEmail = document.getElementById("bccEmail").value;

    var attachmentFiles = document.getElementById("customEmailAttachment").files;
    var formData = new FormData();
    formData.append('subject', emailSubject);
    formData.append('body', emailBody);
    formData.append('recipientEmail', recipientEmail);
    formData.append('ccEmail', ccEmail);
    formData.append('bccEmail', bccEmail);

    for (var i = 0; i < attachmentFiles.length; i++) {
      formData.append('attachments[]', attachmentFiles[i]);
    }

    axios.post('/public/send-edit-report-email', formData, {
      headers: {
        'Content-Type': 'multipart/form-data',
      }
    })
      .then(response => {
        if (response.data.status === 'success') {
          alert('Email sent successfully.');
        } else {
          alert('Failed to send email.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Error occurred while sending email.');
      });

    document.getElementById("customModal").style.display = "none";
  });

  document.getElementById("cancel-send-email").addEventListener("click", function () {
    document.getElementById("customModal").style.display = "none";
  });

  document.getElementById("closeCustomModal").addEventListener("click", function () {
    document.getElementById("customModal").style.display = "none";
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {

    var successMessage = '{{ session("success") }}';
    var customerId = '{{ session("customerId") }}';

    if (successMessage && customerId) {
      var url = '{{ route("viewcustomer", ":id") }}';
      url = url.replace(':id', customerId);
      var popupMessage = 'Customer data stored successfully. Please find the URL below:';

      document.getElementById('popupMessage').innerText = popupMessage;

      document.getElementById('urlInput').value = url;

      var modal = document.getElementById('myModal');
      modal.style.display = "block";

      var closeBtn = document.getElementsByClassName("close")[0];
      closeBtn.onclick = function () {
        modal.style.display = "none";
      }

      window.onclick = function (event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    }
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    let accordionIndex = {{ count($customers->customersalary) }};

    $('#addNewAccordionBtn').click(function () {
      accordionIndex++;

      const newAccordion = `
              <div class="accordion-item">
                  <h2 class="accordion-header" id="heading${accordionIndex}">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${accordionIndex}" aria-expanded="true" aria-controls="collapse${accordionIndex}">
                          Salary Entry ${accordionIndex}
                      </button>
                  </h2>
                  <div id="collapse${accordionIndex}" class="accordion-collapse collapse show" aria-labelledby="heading${accordionIndex}" data-bs-parent="#salaryContainer">
                      <div class="accordion-body">
                          <input type="hidden" name="customersalary[${accordionIndex}][sal_id]" value="">
                          <!-- Add your fields for new data insertion here -->
                          <div class="row mb-2">
                              <div class="col-lg-4 spacing-right form-group">
                                  Category <br>
                                  <div class="input-group" style="width: 100%;">
                                      <select id="dropdown" class="form-control mt-1" name="customersalary[${accordionIndex}][cat_name]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                          <option value=""></option>
                                          @foreach ($saobcategories as $saobcategory)
                                            <option value="{{ $saobcategory->saob_category_name }}">{{ $saobcategory->saob_category_name }}</option>
                                          @endforeach
                                      </select>
                                      <div class="input-group-append" style="width: 30%;">
                                          <a href="{{ route('saobcategory') }}">
                                              <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-3 spacing-left spacing-right">
                                  Salary <br> <input class="form-control" id="head_office_email"  name="customersalary[${accordionIndex}][sal_cat]"  type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-3 spacing-right">
                                  Salary for No. of days <br> <input class="form-control" id=""  name="customersalary[${accordionIndex}][sal_days]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-3 spacing-right">
                                  Leaves Allowed <br> <input class="form-control" id=""  name="customersalary[${accordionIndex}][leaves_a]"  type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                  Other Benefits <br>
                                  <textarea class="form-control" id="w3review23"  name="customersalary[${accordionIndex}][other_ben]" type="notes" oninput="trimSpaces23()" onclick="moveCursorToStart23()" placeholder="..." style="width: 100%;">{{ $salary->other_ben }}</textarea>
                              </div>
                              <div class="form-type col-lg-6 spacing-right">
                                  Attachements <br>
                                  <input class="form-control"  name="customersalary[${accordionIndex}][sal_attach]" type="file" placeholder="..." style="width: 100%;">
                                  <div class="col-lg-5 spacing-right">
                                      <div class="image-preview42" id="imagePreview42">
                                      @if($salary->sal_attach)
                                        <img src="{{ asset($salary->sal_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                      @else
                                        <img src ="{{asset('noimage.jpg')}}"  alt="no image" width="70px" height="70px">
                                      @endif
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6 spacing-left spacing-right mt-2">
                                  Notes <br>
                                  <textarea class="form-control" id="w3review5"  name="customersalary[${accordionIndex}][sal_note]" type="notes" oninput="trimSpaces4()" onclick="moveCursorToStart4()" placeholder="..." style="width: 100%;">{{ $salary->sal_note }}</textarea>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          `;

      $('#salaryContainer').append(newAccordion);

      // Reset input fields of the new accordion
      $(`#collapse${accordionIndex}`).on('show.bs.collapse', function () {
        $(this).find('input[type="text"], textarea').val('');
      });
    });
  });
</script>
<script>
  var departmentRoom = {{ count($customers->customerdepartments) }} + 1;

  function department_add_fields() {
    departmentRoom++;
    var objTo = document.getElementById('departmentAccordion');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "accordion-item removeclass" + departmentRoom);

    divtest.innerHTML = `
          <h2 class="accordion-header" id="departmentHeading${departmentRoom}">
              <button class="accordion-button" type="button" data-toggle="collapse" data-target="#departmentCollapse${departmentRoom}" aria-expanded="false" aria-controls="departmentCollapse${departmentRoom}">
                  Department Entry ${departmentRoom}
              </button>
          </h2>
          <div id="departmentCollapse${departmentRoom}" class="collapse" aria-labelledby="departmentHeading${departmentRoom}">
              <div class="accordion-body">
                  <input type="hidden" name="customerdepartments[${departmentRoom - 1}][d_id]" value="">
                  <div class="spacing-right form-group">
                      Department Type <br>
                      <div class="input-group" style="width: 100%;">
                          <select id="dropdown" class="form-control mt-1" name="customerdepartments[${departmentRoom - 1}][dept_type]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                              <option value=""></option>
                              @foreach ($departments as $department)
                                <option value="{{ $department->department_name }}" @if($department->department_name == $departmentss->dept_type) selected @endif>{{ $department->department_name}}</option>

                              @endforeach
                          </select>
                          <div class="input-group-append" style="width: 30%;">
                              <a href="{{ route('department') }}">
                                  <button class="btn btn-primary" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                  <div class="row mb-2">
                  <div class="col-lg-6 spacing-right">
                  POC Name <br>
                  <input class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_name]" value="" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left spacing-right">
                  Email <br>
                  <input class="form-control vldemail" name="customerdepartments[${departmentRoom - 1}][dept_email]" value="" type="text" placeholder="..." style="width: 100%;">
                  <div id="emailError" class="emailError" style="color: red"></div>
                  </div>
                  <div class="col-lg-6 spacing-right">
                  Cell Number <br>
                  <input class="form-control vldphone" name="customerdepartments[${departmentRoom - 1}][dept_cell]" value="" type="text" placeholder="..." style="width: 100%;">
                  <div id="phoneError" class="phoneError" style="color: red"></div>
                  </div>
                  <div class="col-lg-5 spacing-left spacing-right">
                  Address <br>
                  <input class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_address]" value="" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-right">
                  Designation <br>
                  <input class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_desig]" value="" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left spacing-right">
                  Visiting Card (front) <br>
                  <input class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_front]" value="" type="file" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-right">
                  Visiting Card (back) <br>
                  <input class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_back]" value="" type="file" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                  Notes <br>
                  <textarea id="w3review7" class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_notes]" oninput="trimSpaces7()" onclick="moveCursorToStart7()" rows="2" cols="24"></textarea>
                  </div>
                  <div class="col-lg-6 spacing-right">
                  Attachments <br>
                  <input class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_attach]" value="" type="file" placeholder="..." style="width: 100%;" multiple>
                  </div>
                  </div>
                  </div>

                  <div class="col-lg-6 spacing-left">
                  <h5>Address</h5>
                  <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                  Office No <br>
                  <input class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_office]" value="" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left">
                  Building <br>
                  <input class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_build]" value="" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  </div>
                  <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                  Block <br>
                  <input class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_block]" value="" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left">
                  Area <br>
                  <input class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_area]" value="" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  </div>
                  <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                  City <br>
                  <input class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_city]" value="" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left">
                  Photograph of building <br>
                  <input class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_photo]" value="" type="file" placeholder="..." style="width: 100%;">
                  <div class="col-lg-5 spacing-right">
                  <div class="image-preview42" id="imagePreview42"></div>
                  </div>
                  </div>
                  </div>
                  <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                  Pin Location <br>
                  <input class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_pin]" id="location-input7" value="" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete7()">
                  </div>
                  <div>
                  <br>
                  <input class="form-control" id="" name="longitude3" value="" type="hidden" placeholder="..." style="width: 100%;">
                  </div>
                  <div>
                  <br>
                  <input class="form-control" id="" name="latitude3" value="" type="hidden" placeholder="..." style="width: 100%;">
                  </div>
                  </div>
                  <div class="row mb-2">
                  <div class="col-lg-6 spacing-right mt-2">
                  Attachments <br>
                  <input class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_ex_attach]" value="" type="file" placeholder="..." style="width: 70%;" multiple>
                  <div class="col-lg-5 spacing-right">
                  <div class="image-preview42" id="imagePreview42"></div>
                  </div>
                  </div>
                  <div class="col-lg-6 spacing-left mt-2">
                  Notes <br>
                  <textarea id="w3review8" class="form-control" name="customerdepartments[${departmentRoom - 1}][dept_ex_notes]" oninput="trimSpaces8()" onclick="moveCursorToStart8()" rows="2" cols="38"></textarea>
                  </div>
                  </div>

                  <div class="input-group-append" style="width: 30%;">
                  <button class="btn btn-primary" type="button" onclick="department_remove_fields(${departmentRoom})">Remove Department</button>
                  </div>
                  </div>
              </div>
          </div>
      `;

    objTo.appendChild(divtest);
  }

  function department_remove_fields(rid) {
    var element = document.querySelector('.removeclass' + rid);
    element.parentNode.removeChild(element);
  }
</script>
<script>
  var emergencyServicesRoom = {{ count($customers->customeremergencies) }} + 1;

  function emergencyServices_add_fields() {
    emergencyServicesRoom++;
    var objTo = document.getElementById('emergencyServicesAccordion');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "accordion-item removeclass" + emergencyServicesRoom);

    divtest.innerHTML = `
          <h2 class="accordion-header" id="emergencyServicesHeading${emergencyServicesRoom}">
              <button class="accordion-button" type="button" data-toggle="collapse" data-target="#emergencyServicesCollapse${emergencyServicesRoom}" aria-expanded="false" aria-controls="emergencyServicesCollapse${emergencyServicesRoom}">
                  Emergency Services Entry ${emergencyServicesRoom}
              </button>
          </h2>
          <div id="emergencyServicesCollapse${emergencyServicesRoom}" class="collapse" aria-labelledby="emergencyServicesHeading${emergencyServicesRoom}">
              <div class="accordion-body">
                  <input type="hidden" name="customeremergencies[${emergencyServicesRoom - 1}][e_id]" value="">
                  <div class="row main-content div">
  <div class="col-lg-6">
      <div class="row mb-2">
          <div class="col-lg-6 spacing-left spacing-right form-group">
              Emergency Services <br>
              <input class="form-control" name="customeremergencies[${emergencyServicesRoom - 1}][emer_ser]" value="" type="text" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-6 spacing-left spacing-right form-group">
                                  Emergency Services <br>
                                  <div class="input-group" style="width: 100%;">
                                      <select id="dropdown" class="form-control mt-1" name="customeremergencies[${emergencyServicesRoom - 1}][emer_ser]" value="" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                          <option value=""></option>
                                          @foreach ($emerser as $emerse)

                                            <option value="{{ $emerse->emerser_name }}" @if($emerse->emerser_name == $emergencies->emer_ser) selected @endif>{{ $emerse->emerser_name }}</option>
                                          @endforeach
                                      </select>
                                      <div class="input-group-append" style="width: 30%;">
                                          <a href="{{ route('emerser') }}">
                                              <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6 spacing-right">
                                  Picture of Police Station <br>
                                  <input class="form-control" name="customeremergencies[${emergencyServicesRoom - 1}][emer_pic]" value="" type="file" placeholder="..." style="width: 100%;">
                                  <div class="col-lg-5 spacing-right">
                                      <div class="image-preview42" id="imagePreview42"></div>
                                  </div>
                              </div>
                              <h5>POC</h5>
                              <div class="col-lg-6 spacing-right">
                                  Name. <br>
                                  <input class="form-control" id="" name="customeremergencies[${emergencyServicesRoom - 1}][emer_poc_name]" value="" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                  Designation. <br>
                                  <input class="form-control" id="" name="customeremergencies[${emergencyServicesRoom - 1}][emer_poc_desig]" value="" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                  Cell Number. <br>
                                  <input class="form-control vldphone" id="" name="customeremergencies[${emergencyServicesRoom - 1}][emer_poc_cell]" value="" type="text" placeholder="..." style="width: 100%;">
                                  <div id="phoneError" class="phoneError" style="color: red"></div>
                              </div>
                              <div class="col-lg-6 spacing-right">
                                  Email. <br>
                                  <input class="form-control vldemail" id="" name="customeremergencies[${emergencyServicesRoom - 1}][emer_poc_email]" value="" type="email" placeholder="..." style="width: 100%;">
                                  <div id="emailError" class="emailError" style="color: red"></div>
                              </div>
                              <div class="col-lg-6 spacing-right">
                                  Notes. <br>
                                  <textarea class="form-control" id="w3review5" name="customeremergencies[${emergencyServicesRoom - 1}][emer_poc_notes]" type="notes" oninput="trimSpaces5()" onclick="moveCursorToStart5()" placeholder="..." style="width: 100%;"></textarea>
                              </div>
                              <div class="col-lg-6 spacing-right">
                                  Attachment <br>
                                  <input class="form-control" id="" name="customeremergencies[${emergencyServicesRoom - 1}][emer_poc_attach]" value="" type="file" placeholder="..." style="width: 100%;">
                                  <div class="col-lg-5 spacing-right">
                                      <div class="image-preview42" id="imagePreview42"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 spacing-left">
                          <h5>Address :</h5>
                          <div class="row mb-2">
                              <div class="col-lg-5 spacing-right">
                                  Office No <br>
                                  <input class="form-control" id="" value="" name="customeremergencies[${emergencyServicesRoom - 1}][emer_office]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-5 spacing-left">
                                  Building <br>
                                  <input class="form-control" id="" value="" name="customeremergencies[${emergencyServicesRoom - 1}][emer_building]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-lg-5 spacing-right">
                                  Block <br>
                                  <input class="form-control" id="" value="" name="customeremergencies[${emergencyServicesRoom - 1}][emer_block]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-5 spacing-left">
                                  Area <br>
                                  <input class="form-control" id="" value="" name="customeremergencies[${emergencyServicesRoom - 1}][emer_area]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-lg-5 spacing-right">
                                  City <br>
                                  <input class="form-control" id="" value="" name="customeremergencies[${emergencyServicesRoom - 1}][emer_city]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-5 spacing-left">
                                  Photograph of Building <br>
                                  <input class="form-control" id="" value="" name="customeremergencies[${emergencyServicesRoom - 1}][emer_loc]" type="file" placeholder="..." style="width: 100%;">
                                  <div class="col-lg-5 spacing-right">
                                      <div class="image-preview42" id="imagePreview42"></div>
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-lg-5 spacing-right">
                                  Email <br>
                                  <input class="form-control vldemail" id="" name="customeremergencies[${emergencyServicesRoom - 1}][emer_email]" value="" type="text" placeholder="..." style="width: 100%;">
                                  <div id="emailError" class="emailError" style="color: red"></div>
                              </div>
                              <div class="col-lg-5 spacing-left">
                                  Website <br>
                                  <input class="form-control vldwebsite" id="" name="customeremergencies[${emergencyServicesRoom - 1}][emer_web]" value="" type="text" placeholder="..." style="width: 100%;">
                                  <div id="websiteError" class="websiteError" style="color: red"></div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-5 spacing-right">
                                  Pin location <br>
                                  <input class="form-control" id="location-input6" name="customeremergencies[${emergencyServicesRoom - 1}][emer_pin]" value="" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete6()">
                              </div>
                              <div>
                                  <br> <input class="form-control" id="" name="longitude2" value="" type="hidden" placeholder="..." style="width: 100%;">
                              </div>
                              <div>
                                  <br> <input class="form-control" id="" name="latitude2" value="" type="hidden" placeholder="..." style="width: 100%;">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 spacing-left mt-2">
                      Applicable Rental Property Number <br>
                      <input class="form-control" name="customeremergencies[${emergencyServicesRoom - 1}][emer_app_rental]" value="" type="text" placeholder="..." style="width: 70%;" multiple>
                  </div>
                  <div class="row mb-2">
                      <div class="col-lg-6 spacing-left spacing-right mt-2">
                          Attachments <br>
                          <input class="form-control" name="customeremergencies[${emergencyServicesRoom - 1}][emer_attach]" value="" type="file" placeholder="..." style="width: 70%;" multiple>
                          <div class="col-lg-5 spacing-right">
                              <div class="image-preview42" id="imagePreview42"></div>
                          </div>
                      </div>
                      <div class="col-lg-6 spacing-left spacing-right mt-2">
                          Notes <br>
                          <textarea id="w3review6" class="form-control" name="customeremergencies[${emergencyServicesRoom - 1}][emer_note]" oninput="trimSpaces6()" onclick="moveCursorToStart6()" rows="2" cols="38"></textarea>
                      </div>
                  </div>
                  <div class="input-group-append" style="width: 30%;">
                      <button class="btn btn-success" type="button" onclick="emergencyServices_remove_fields(${emergencyServicesRoom})">Remove Emergency Service</button>
                  </div>
              </div>
          </div>
      `;

    objTo.appendChild(divtest);
  }

  function emergencyServices_remove_fields(rid) {
    var element = document.querySelector('.removeclass' + rid);
    element.parentNode.removeChild(element);
  }
</script>
{{--
<script>
  var manpowerRoom = 1;

  function manpower_add_fields() {
    manpowerRoom++;
    var objTo = document.querySelector('.manpower');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "third-col removeclass" + manpowerRoom);

    divtest.innerHTML = `
       <input type="hidden" name="customermanpowers[${manpowerRoom - 1}][m_id]" value="">
                                   <div class="row col-lg-12 manpower">
                                       <div class="col-lg-6 spacing-right">
                                           <div class="row mb-2">
                                               <div class="form-type col-lg-5 spacing-left">
                                                   Guard Post No <br> <input class="form-control" type="text" name="customermanpowers[${manpowerRoom - 1}][man_post]" value="" placeholder="..." style="width: 100%;">
                                               </div>
                                               <div class="col-lg-5 spacing-left spacing-right form-group">
                                                   Category <br>
                                                   <div class="input-group" style="width: 100%;">
                                                       <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_cat]" value="" type="text" placeholder="..." style="width: 100%;">
                                                   </div>
                                               </div>
                                               <div class="col-lg-5 spacing-left spacing-right form-group">
                                                   Uniform Type <br>
                                                   <div class="input-group" style="width: 100%;">
                                                       <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_uni]" value="" type="text" placeholder="..." style="width: 100%;">
                                                   </div>
                                               </div>
                                               <div class="col-lg-5 spacing-left spacing-right form-group">
                                                   Uniform Number <br>
                                                   <div class="input-group" style="width: 100%;">
                                                       <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_uni_no]" value="" type="text" placeholder="..." style="width: 100%;">
                                                   </div>
                                               </div>
                                               <div class="col-lg-5 spacing-left spacing-right form-group">
                                                   Weapon Type <br>
                                                   <div class="input-group" style="width: 100%;">
                                                       <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_weapon]" value="" type="text" placeholder="..." style="width: 100%;">
                                                   </div>
                                               </div>
                                               <div class="col-lg-5 spacing-left spacing-right form-group">
                                                   Ammunition Type <br>
                                                   <div class="input-group" style="width: 100%;">
                                                       <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_ammu]" value="" type="text" placeholder="..." style="width: 100%;">
                                                   </div>
                                               </div>
                                               <div class="col-lg-5 spacing-left spacing-right form-group">
                                                   Equipment <br>
                                                   <div class="input-group" style="width: 100%;">
                                                       <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_equip]" value="" type="text" placeholder="..." style="width: 100%;">
                                                   </div>
                                               </div>
                                               <div class="form-type col-lg-5 spacing-right">
                                                   Picture of Equipment <br> <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_equip_attach]" value="" type="file" placeholder="..." style="width: 100%;">
                                                   <div class="col-lg-5 spacing-right">
                                                       <div class="image-preview42" id="imagePreview42">
                                                           @if($manpowers->man_equip_attach)
                                                           <img src="{{ asset($manpowers->man_equip_attach) }}" alt="Image Preview42"
class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
@else
<img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
@endif
</div>
</div>
</div>
</div>

</div>
<div class="col-lg-6 spacing-left">
  <div class="row mb-3">
    <div class="form-type col-lg-6 spacing-right">
      Shift Start date. <br> <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][s_start_date]" value="" type="date" placeholder="..."
        style="width: 100%;">
    </div>
    <div class="form-type col-lg-6 spacing-right">
      Shift End date. <br> <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][s_end_date]" value="" type="date" placeholder="..."
        style="width: 100%;">
      <div id="shiftEndDateError" style="color: red;"></div>
    </div>
  </div>
  <div class="row mb-3">
    <div class="form-type col-lg-6 spacing-right">
      Shift Start time. <br> <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][s_start_time]" value="" type="time" placeholder="..."
        style="width: 100%;">
    </div>
    <div class="form-type col-lg-6 spacing-right">
      Shift End time. <br> <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][s_end_time]" value="" type="time" placeholder="..."
        style="width: 100%;">
      <div id="shiftEndTimeError" style="color: red;"></div>
    </div>
  </div>
  <div class="row mb-3">
    <div class="form-type col-lg-6 spacing-right">
      Deployment Start date. <br> <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_start_date]" value="" type="date"
        placeholder="..." style="width: 100%;">
    </div>
    <div class="form-type col-lg-6 spacing-right">
      Deployment End date. <br> <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_end_date]" value="" type="date" placeholder="..."
        style="width: 100%;">
      <div id="deploymentEndDateError" style="color: red;"></div>
    </div>
  </div>
  <div class="row mb-3">
    <div class="form-type col-lg-6 spacing-right">
      Deployment Start time. <br> <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_start_time]" value="" type="time"
        placeholder="..." style="width: 100%;">
    </div>
    <div class="form-type col-lg-6 spacing-right">
      Deployment End time. <br> <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_end_time]" value="" type="time" placeholder="..."
        style="width: 100%;">
      <div id="deploymentEndTimeError" style="color: red;"></div>
    </div>
  </div>
  <div class="row mb-3">
    <div class="form-type col-lg-6 spacing-right">
      Quantity. <br> <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_quan]" value="" type="text" placeholder="..."
        style="width: 100%;">
    </div>
    <div class="form-type col-lg-6 spacing-right">
      Duty Hours. <br> <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_hours]" value="" type="text" placeholder="..."
        style="width: 100%;">
    </div>
  </div>
  <div class="row mb-3">
    <div class="form-type col-lg-6 spacing-right">
      Post Orders / JD of Guard Post. <br>
      <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_jd_attach]" value="" type="file" placeholder="..." style="width: 100%;">
      <div class="col-lg-5 spacing-right">
        <div class="image-preview42" id="imagePreview42">
          @if($manpowers->man_jd_attach)
          <img src="{{ asset($manpowers->man_jd_attach) }}" alt="Image Preview42" class="image-preview__image42"
            style="height: 100%; width:100%; margin-left:-13px;">
          @else
          <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
          @endif
        </div>
      </div>
    </div>
    <div class="form-type col-lg-6 spacing-right">
      Any Special Instructions. <br>
      <textarea class="form-control" id="w3review5" name="customermanpowers[${manpowerRoom - 1}][man_any_sp]" type="notes" oninput="trimSpaces5()"
        onclick="moveCursorToStart5()" placeholder="..." style="width: 100%;"></textarea>
    </div>
  </div>
  <div class="row mb-3">
    <div class="form-type col-lg-6 spacing-right">
      Approved Leaves. <br> <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_apr_l]" value="" type="text" placeholder="..."
        style="width: 100%;">
    </div>
    <div class="form-type col-lg-6 spacing-right">
      Salary of total days. <br> <input class="form-control" name="customermanpowers[${manpowerRoom - 1}][man_salary]" value="" type="text" placeholder="..."
        style="width: 100%;">
    </div>
  </div>
</div>


</div>

`;

    objTo.appendChild(divtest);
  }

  function manpower_remove_fields(rid) {
    var element = document.querySelector('.removeclass' + rid);
    element.parentNode.removeChild(element);
  }
</script> --}}
<script>
  var clientRoom = {{ count($customers->customerincidents) }} + 1;

  function client_add_fields() {
    clientRoom++;
    var objTo = document.getElementById('incidentAccordion');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "accordion-item removeclass" + clientRoom);

    divtest.innerHTML = `
          <h2 class="accordion-header" id="incidentHeading${clientRoom}">
              <button class="accordion-button" type="button" data-toggle="collapse" data-target="#incidentCollapse${clientRoom}" aria-expanded="false" aria-controls="incidentCollapse${clientRoom}">
                  Incident Entry ${clientRoom}
              </button>
          </h2>
          <div id="incidentCollapse${clientRoom}" class="collapse" aria-labelledby="incidentHeading${clientRoom}">
              <div class="accordion-body">
                  <input type="hidden" name="customerincidents[${clientRoom - 1}][in_id]" value="">
                  <div class="col-lg-6">
                      <div class="row mb-2">
                          <div class="col-lg-3 spacing-right">
                              Client Name <br>
                              <input class="form-control" type="text" name="customerincidents[${clientRoom - 1}][client_name]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left spacing-right">
                              Client ID <br> <input class="form-control" type="text" name="customerincidents[${clientRoom - 1}][client_id]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                              Site ID <br> <input class="form-control" type="text" name="customerincidents[${clientRoom - 1}][client_site_id]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                              Client POC Name <br>
                              <input class="form-control" type="text" name="customerincidents[${clientRoom - 1}][client_poc]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left spacing-right">
                              Cell <br> <input class="form-control vldphone" type="text" name="customerincidents[${clientRoom - 1}][client_cell]" value="" placeholder="..." style="width: 100%;">
                              <div id="phoneError" class="phoneError" style="color: red"></div>
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                              Email <br> <input class="form-control vldemail" type="text" name="customerincidents[${clientRoom - 1}][client_email]" value="" placeholder="..." style="width: 100%;">
                              <div id="emailError" class="emailError" style="color: red"></div>
                          </div>
                          <div class="col-lg-3 spacing-right">
                              Site Address <br>
                              <input class="form-control" type="text" name="customerincidents[${clientRoom - 1}][client_site_address]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left spacing-right">
                              Office/Floor <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][client_office]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                              Building Name<br> <input class="form-control" name="customerincidents[${clientRoom - 1}][client_build]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                              Street <br>
                              <input class="form-control" type="text" name="customerincidents[${clientRoom - 1}][client_street]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left spacing-right">
                              Area <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][client_area]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                              City <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][client_city]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 12px;">
                              FIR # <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][client_fir]" value="" type="text" placeholder="..." style="width: 115%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 30px;">
                              Arrest # <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][arrest]" value="" type="text" placeholder="..." style="width: 101%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 12px;">
                              Casualities <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][casual]" value="" type="text" placeholder="..." style="width: 115%;"">
                          </div>

                          <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 30px;">
                              Injuired <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][injuired]" value="" type="text" placeholder="..." style="width: 101%;">
                          </div>

                          <div class="row mb-2" style="margin-left:2px;">
                              <div class="col-lg-6 spacing-left spacing-right">
                                  Incident Reported to <br>  <input class="form-control" name="customerincidents[${clientRoom - 1}][incident_rep]" value="" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-left spacing-right">
                                  Police Officer Name <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][police_officer_name]" value="" type="text" placeholder="..." style="width: 87%;">
                              </div>
                              <div class="col-lg-6 spacing-left spacing-right">
                                  Station <br> <input class="form-control" type="text" name="customerincidents[${clientRoom - 1}][station]" value="" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-left spacing-right">
                                  Rank <br> <input class="form-control" type="text" name="customerincidents[${clientRoom - 1}][rank]" value="" placeholder="..." style="width: 87%;">
                              </div>
                              <div class="col-lg-6 spacing-left spacing-right">
                                  Report Made by <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][report_made_by]" value="" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-left spacing-right">
                                  Date <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][report_date]" value="" type="date" placeholder="..." style="width: 87%;">
                              </div>
                              <div class="col-lg-6 spacing-left spacing-right">
                                  Time <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][report_time]" value=""  type="time" placeholder="..." style="width: 87%;">
                              </div>
                              <div class="col-lg-6 spacing-left spacing-right">
                                  Approved By <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][report_apr_by]" value=""  type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-left spacing-right">
                                  Shared with <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][report_shared]" value="" type="text" placeholder="..." style="width: 87%;">
                              </div>
                          </div>
                      </div>

                  </div>
                  <div class="col-lg-6">
                      <div class="row mb-2">
                          <div class="col-lg-5 spacing-left spacing-right">
                              Incident Type <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][incident_type]" value="" type="text" placeholder="..." style="width: 87%;">
                          </div>
                          <div class="col-lg-6 spacing-left spacing-right">
                              Weapon used by Attacker <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][weapon_used]" value="" type="text" placeholder="..." style="width: 87%;">
                          </div>
                          <div class="col-lg-6 spacing-left spacing-right">
                              Details of Attacker <br> <input class="form-control"name="customerincidents[${clientRoom - 1}][detail_of_attacker]" value="" type="text" placeholder="..." style="width: 87%;">
                          </div>
                          <div class="col-lg-6 spacing-left spacing-right" style="margin-left: -42px;">
                              Attacker Description <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][attacker_desc]"  value="" type="text" placeholder="..." style="width: 87%;">
                          </div>
                          <div class="row mb-2" style="margin-left: -24px;">
                              <div class="col-lg-3 spacing-right">
                                  Shoes <br>
                                  <input class="form-control" type="text" name="customerincidents[${clientRoom - 1}][attacker_shoe]" value="" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-3 spacing-left spacing-right">
                                  Beard/M <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][attacker_beard]" value="" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-5 spacing-left spacing-right">
                                  Language <br> <input class="form-control" type="text" name="customerincidents[${clientRoom - 1}][attacker_lang]" value="" placeholder="..." style="width: 117%;">
                              </div>
                              <div class="col-lg-3 spacing-right">
                                  Focused on <br>
                                  <input class="form-control" type="text" name="customerincidents[${clientRoom - 1}][focused]" value="" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-3 spacing-left spacing-right">
                                  Opening Phrase <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][opening_phrase]" value="" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-5 spacing-left spacing-right">
                                  Anything Unusual <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][any_usual]" value="" type="text" placeholder="..." style="width: 117%;">
                              </div>
                          </div>
                      </div>
                      <div class="row mb-2" style="margin-top: -10px ;">
                          <div class="col-lg-6 spacing-left spacing-right">
                              Estimated Loss in PKR <br> <input class="form-control" name="customerincidents[${clientRoom - 1}][estimated_loss]" value="" type="text" placeholder="..." style="width: 91%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right" style="margin-left: -20px;">
                              Description of Loss <br> <input class="form-control" type="text" name="customerincidents[${clientRoom - 1}][desc_loss]" value="" placeholder="..." style="width: 110%;">
                          </div>
                      </div>
                      <div class="col-lg-6 spacing-left spacing-right" style="margin-top:-6px; margin-left:-15px;">
                          Officers Response <br> <input class="form-control" type="text" name="customerincidents[${clientRoom - 1}][officer_response]" value="" placeholder="..." style="width: 110%;">
                      </div>
                  </div>
                  <div class="row mb-2">
                      <div class="col-lg-6 spacing-left spacing-right mt-2">
                          Attachements <br> <input class="form-control" type="file" name="customerincidents[${clientRoom - 1}][incident_attach]" value="" placeholder="..." style="width: 70%;" multiple>
                          <div class="col-lg-5 spacing-right">
                              <div class="image-preview42" id="imagePreview42">
                                  @if($incidents->incident_attach)
                                    <img src="{{ asset($incidents->incident_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                  @else
                                    <img src ="{{asset('noimage.jpg')}}"  alt="no image" width="70px" height="70px">
                                  @endif
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 spacing-left spacing-right mt-2">
                          Notes <br>
                          <textarea id="w3review10" class="form-control" oninput="trimSpaces10()" onclick="moveCursorToStart10()" name="customerincidents[${clientRoom - 1}][incident_note]" rows="2" cols="38">{{ $incidents->incident_note }}
                          </textarea>
                      </div>
                  </div>
              </div>
          </div>
          <div class="new_branch mt-2">
              <button type="button" class="client_remove_fields" onclick="client_remove_fields(${clientRoom})">Remove</button>
          </div>
      `;

    objTo.appendChild(divtest);
  }

  function client_remove_fields(rid) {
    document.querySelector('.removeclass' + rid).remove();
  }
</script>
<script>
var inspectionRoom = {{ count($customers->customerinspections) }};

function addInspectionSection() {

    var index = inspectionRoom;

    var objTo = document.getElementById('inspectionAccordion');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "accordion-item removeclass" + index);
    divtest.setAttribute("id", "inspectionEntry" + index);

    divtest.innerHTML = `
        <h2 class="accordion-header" id="inspectionHeading${index}">
            <button class="accordion-button" type="button" data-toggle="collapse"
                data-target="#inspectionCollapse${index}">
                Inspection Entry ${index + 1}
            </button>
        </h2>

        <div id="inspectionCollapse${index}" class="collapse show">
            <div class="accordion-body">

                <input type="hidden" name="customerinspections[${index}][i_id]" value="">

                <div class="row mb-2">
                    <div class="col-lg-4">
                        Inspection Number
                        <input class="form-control"
                            name="customerinspections[${index}][inspection_no]">
                    </div>

                    <div class="col-lg-4">
                        Employee ID
                        <input class="form-control"
                            name="customerinspections[${index}][inspection_emp_id]">
                    </div>

                    <div class="col-lg-4">
                        Name
                        <input class="form-control"
                            name="customerinspections[${index}][inspection_emp_name]">
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-lg-4">
                        Cell Number
                        <input class="form-control"
                            name="customerinspections[${index}][inspection_emp_cell]">
                    </div>

                    <div class="col-lg-4">
                        Department
                        <input class="form-control"
                            name="customerinspections[${index}][inspection_emp_dept]">
                    </div>

                    <div class="col-lg-4">
                        Date
                        <input type="date" class="form-control"
                            name="customerinspections[${index}][inspection_date]">
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-lg-4">
                        Picture
                        <input type="file" class="form-control"
                            name="customerinspections[${index}][inspection_pic]">

                        <img src="/noimage.jpg" width="70">
                    </div>

                    <div class="col-lg-4">
                        Remarks
                        <textarea class="form-control"
                            name="customerinspections[${index}][inspection_rem_petr]"></textarea>
                    </div>

                    <div class="col-lg-4">
                        Notes
                        <textarea class="form-control"
                            name="customerinspections[${index}][inspection_note]"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        Attachments
                        <input type="file" class="form-control"
                            name="customerinspections[${index}][inspection_attach]">

                        <img src="/noimage.jpg" width="70">
                    </div>
                </div>

                <button type="button" class="btn btn-danger mt-2"
                    onclick="removeInspectionSection(${index})">
                    Remove
                </button>

            </div>
        </div>
    `;

    objTo.appendChild(divtest);

    inspectionRoom++;
}

function removeInspectionSection(rid) {
    var element = document.querySelector('.removeclass' + rid);
    if (element) element.remove();
}
</script>
<script>
  var feedbackRoom = {{ count($customers->customerfeedbacks) }} + 1;
  var assetPath = "{{ asset('') }}"; // Base asset path

  function feedback_add_more() {
    console.log('Adding feedback section:', feedbackRoom); // Debug
    var objTo = document.getElementById('feedbackAccordion');
    var divTest = document.createElement("div");
    divTest.setAttribute("class", "accordion-item removeclass" + feedbackRoom);

    divTest.innerHTML = `
          <h2 class="accordion-header" id="feedbackHeading${feedbackRoom}">
              <button class="accordion-button" type="button" data-toggle="collapse" data-target="#feedbackCollapse${feedbackRoom}" aria-expanded="false" aria-controls="feedbackCollapse${feedbackRoom}">
                  Feedback ${feedbackRoom} Date: ${new Date().toISOString().split('T')[0]}
              </button>
          </h2>
          <div id="feedbackCollapse${feedbackRoom}" class="collapse" aria-labelledby="feedbackHeading${feedbackRoom}">
              <div class="accordion-body">
                  <input type="hidden" name="customerfeedbacks[${feedbackRoom - 1}][f_id]" value="">
                  <div id="feedbackForm">
                      <div class="row">
                          <div class="col-lg-7">
                              <div class="row mb-2">
                                  <div class="col-lg-11 spacing-right">
                                      Client Name: <br> <input class="form-control" name="customerfeedbacks[${feedbackRoom - 1}][feed_client_name]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-11 spacing-right">
                                      Client POC Name: <br> <input class="form-control" name="customerfeedbacks[${feedbackRoom - 1}][feed_client_poc_name]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-11 spacing-right">
                                      Email: <br> <input class="form-control vldemail" name="customerfeedbacks[${feedbackRoom - 1}][feed_client_email]" value="" type="email" placeholder="..." style="width: 100%;">
                                      <div id="emailError${feedbackRoom}" class="emailError" style="color: red"></div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-5">
                              <div class="row mb-2">
                                  <div class="col-lg-6 spacing-left spacing-right">
                                      Client ID: <br> <input class="form-control" name="customerfeedbacks[${feedbackRoom - 1}][feed_client_id]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-right">
                                      Site ID: <br> <input class="form-control" name="customerfeedbacks[${feedbackRoom - 1}][feed_client_site_id]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                              <div class="row mb-5">
                                  <div class="col-lg-11 spacing-left spacing-right">
                                      Designation: <br> <input class="form-control" name="customerfeedbacks[${feedbackRoom - 1}][feed_desig]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-11 spacing-left spacing-right">
                                      Cell: <br> <input class="form-control vldphone" type="text" name="customerfeedbacks[${feedbackRoom - 1}][feed_cell]" value="" placeholder="..." style="width: 100%;">
                                      <div id="phoneError${feedbackRoom}" class="phoneError" style="color: red"></div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-11">
                              <table class="table table-bordered" id="feedbackTable${feedbackRoom}">
                                  <thead>
                                      <div class="row mb-5">

                                          <div class="col-lg-4 spacing-left spacing-right">
                                              <label class="form-lable">Feedback Date:</label>
                                              <input class="form-control" type="date" name="customerfeedbacks[${feedbackRoom - 1}][feed_date]" value="" placeholder="..." style="width: 100%;" />
                                          </div>
                                          <div class="col-lg-4 spacing-left spacing-right">
                                              <label class="form-lable">Feedback for the month:</label>
                                              <input class="form-control" type="text" name="customerfeedbacks[${feedbackRoom - 1}][feed_month]" value="" placeholder="..." style="width: 100%;" />
                                          </div>
                                      </div>
                                      <tr width="100%">
                                          <th width="75%">
                                              <p><b>A: Please Rate the following (Encircle from 1 to 10): (10 = Entirely Satisfied, 8 = Satisfied, 6 = Neutral, 2 = Unsatisfied, 0 = Entirely Unsatisfied)</b></p>
                                          </th>
                                          <th width="5%"><img src="${assetPath}emogi/smili.png" width="30px" height="30px" alt="Entirely Satisfied"></th>
                                          <th width="5%"><img src="${assetPath}emogi/facemode.png" width="30px" height="30px" alt="Satisfied"></th>
                                          <th width="5%"><img src="${assetPath}emogi/normal.png" width="30px" height="30px" alt="Neutral"></th>
                                          <th width="5%"><img src="${assetPath}emogi/crying.png" width="30px" height="30px" alt="Unsatisfied"></th>
                                          <th width="5%"><img src="${assetPath}emogi/angry.png" width="30px" height="30px" alt="Entirely Unsatisfied"></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr width="100%">
                                          <td width="75%">1. Punctuality and Attendance of Guards</td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q1]" value="10"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q1]" value="8"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q1]" value="6"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q1]" value="2"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q1]" value="0"></td>
                                      </tr>
                                      <tr width="100%">
                                          <td width="75%">2. Discipline, Behavior & Character of Guards</td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q2]" value="10"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q2]" value="8"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q2]" value="6"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q2]" value="2"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q2]" value="0"></td>
                                      </tr>
                                      <tr width="100%">
                                          <td width="75%">3. Smart Turnout of the Guards (Uniform)</td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q3]" value="10"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q3]" value="8"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q3]" value="6"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q3]" value="2"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q3]" value="0"></td>
                                      </tr>
                                      <tr width="100%">
                                          <td width="75%">4. Working Condition of Weapons & Security Equipments</td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q4]" value="10"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q4]" value="8"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q4]" value="6"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q4]" value="2"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q4]" value="0"></td>
                                      </tr>
                                      <tr width="100%">
                                          <td width="75%">5. Our Abidance regarding Taxes (Income Tax & Sales Tax)</td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q5]" value="10"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q5]" value="8"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q5]" value="6"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q5]" value="2"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q5]" value="0"></td>
                                      </tr>
                                      <tr width="100%">
                                          <td width="75%">6. Our Compliance wrt EOBI, Social Security & GLI of Guards</td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q6]" value="10"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q6]" value="8"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q6]" value="6"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q6]" value="2"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q6]" value="0"></td>
                                      </tr>
                                      <tr width="100%">
                                          <td width="75%">7. Timely Provision of Invoices & Guards Payroll Management</td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q7]" value="10"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q7]" value="8"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q7]" value="6"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q7]" value="2"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q7]" value="0"></td>
                                      </tr>
                                      <tr width="100%">
                                          <td width="75%">8. Level of Training of Guards</td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q8]" value="10"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q8]" value="8"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q8]" value="6"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q8]" value="2"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q8]" value="0"></td>
                                      </tr>
                                      <tr width="100%">
                                          <td width="75%">9. Level of Supervisory Staff Visiting the Guards</td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q9]" value="10"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q9]" value="8"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q9]" value="6"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q9]" value="2"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q9]" value="0"></td>
                                      </tr>
                                      <tr width="100%">
                                          <td width="75%">10. PIFFERS Mgmt Approach & Behavior towards Customer Service</td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q10]" value="10"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q10]" value="8"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q10]" value="6"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q10]" value="2"></td>
                                          <td width="5%"><input type="radio" name="customerfeedbacks[${feedbackRoom - 1}][q10]" value="0"></td>
                                      </tr>
                                  </tbody>
                              </table>
                              <div class="col-lg-4 spacing-right mb-3">
                                  Total Score: <br> <input class="form-control" name="customerfeedbacks[${feedbackRoom - 1}][total_score]" value="" id="totalScore${feedbackRoom}" type="text" placeholder="..." style="width: 100%;">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <p><b>B: Would you please like to refer us to any other Company/Organization?</b></p>
                          <div class="col-lg-7">
                              <div class="row mb-2">
                                  <div class="col-lg-11 spacing-right">
                                      Company Name: <br> <input class="form-control" name="customerfeedbacks[${feedbackRoom - 1}][feed_company_name]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-11 spacing-right">
                                      POC Name: <br> <input class="form-control" name="customerfeedbacks[${feedbackRoom - 1}][feed_poc_name]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-11 spacing-right">
                                      Suggestions / Comments:<br> <input class="form-control" name="customerfeedbacks[${feedbackRoom - 1}][feed_comment]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-11 spacing-right">
                                      Feedback Form Filled By:<br> <input class="form-control" name="customerfeedbacks[${feedbackRoom - 1}][feedback_form]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-5">
                              <div class="row mb-2">
                                  <div class="col-lg-11 spacing-left spacing-right">
                                      Email: <br> <input class="form-control vldemail" type="text" name="customerfeedbacks[${feedbackRoom - 1}][feed_email]" value="" placeholder="..." style="width: 100%;">
                                      <div id="emailError${feedbackRoom}" class="emailError" style="color: red"></div>
                                  </div>
                                  <div class="col-lg-11 spacing-left spacing-right">
                                      Telephone: <br> <input class="form-control" type="text" name="customerfeedbacks[${feedbackRoom - 1}][feed_telephone]" value="" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-11 spacing-left spacing-right">
                                      Signature & Date: <br> <input class="form-control" name="customerfeedbacks[${feedbackRoom - 1}][feed_signature]" value="" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <p>To Be Filled by PIFFERS SECURITY SERVICES (PVT) LTD</p>
                          <div class="col-lg-11 spacing-right">
                              Feedback Form Received By: <br> <input class="form-control" name="customerfeedbacks[${feedbackRoom - 1}][feed_received]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-11 spacing-right">
                              Remarks: <br> <input class="form-control" type="text" name="customerfeedbacks[${feedbackRoom - 1}][feed_remarks]" value="" placeholder="..." style="width: 100%;">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-11 spacing-right">
                              Attachments: <br> <input id="feed_attach${feedbackRoom}" class="form-control" name="customerfeedbacks[${feedbackRoom - 1}][feed_attach]" type="file" placeholder="..." style="width: 100%;">
                              <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42${feedbackRoom}">
                                      <img src="${assetPath}noimage.jpg" alt="no image" width="70px" height="70px">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="new_branch mt-2">
                      <button type="button" class="removeFeedback btn btn-danger" onclick="removeFeedbackSection(${feedbackRoom})">Remove</button>
                  </div>
              </div>
          </div>
      `;

    objTo.appendChild(divTest);
    feedbackRoom++; // Increment after adding
  }

  function removeFeedbackSection(room) {
    document.querySelector('.removeclass' + room).remove();
  }

  // Calculate total score dynamically
  document.addEventListener('change', function (event) {
    if (event.target.type === 'radio' && event.target.name.includes('customerfeedbacks')) {
      const index = event.target.name.match(/\d+/)[0];
      const scores = [0, 2, 6, 8, 10];
      let total = 0;
      for (let i = 1; i <= 10; i++) {
        const selected = document.querySelector(`input[name="customerfeedbacks[${index}][q${i}]"]:checked`);
        if (selected) total += parseInt(selected.value);
      }
      document.querySelector(`input[name="customerfeedbacks[${index}][total_score]"]`).value = total;
    }
  });
</script>

<script>
  var complaintRoom = {{ count($customers->customercomplaints) }} + 1; // Next display number (e.g., Entry 1 if no existing)
  var complaintIndex = {{ count($customers->customercomplaints) }}; // Next array index (starts at 0 if no existing)
  function addComplaintSection() {
    var currentRoom = complaintRoom;
    var currentIndex = complaintIndex;
    var objTo = document.getElementById('complaintAccordion');
    var divTest = document.createElement("div");
    divTest.setAttribute("class", "accordion-item removeclass" + currentRoom);
    divTest.innerHTML = `
          <h2 class="accordion-header" id="complaintHeading${currentRoom}">
              <button class="accordion-button" type="button" data-toggle="collapse" data-target="#complaintCollapse${currentRoom}" aria-expanded="false" aria-controls="complaintCollapse${currentRoom}">
                  Complaint Entry ${currentRoom}
              </button>
          </h2>
          <div id="complaintCollapse${currentRoom}" class="collapse" aria-labelledby="complaintHeading${currentRoom}">
              <div class="accordion-body">
                  <input type="hidden" name="customercomplaints[${currentIndex}][com_id]" value="">
                  <div class="col-lg-12">
  <div class="row mb-2">
      <div class="col-lg-4 spacing-left spacing-right">
          Complaint Number <br> <input class="form-control" name="customercomplaints[${currentIndex}][complaint_no]" value="" type="text" placeholder="..." style="width: 100%;">
      </div>
      <h5 class="mt-3">Guards Duty</h5>
      <div class="col-lg-5 spacing-left spacing-right form-group">
          Guards Duty <br>
          <div class="input-group" style="width: 100%;">
              <select id="dropdown_${currentRoom}" class="form-control mt-1" name="customercomplaints[${currentIndex}][complaint_guards_duty]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                  <option value=""></option>
                  @foreach ($duties as $duty)
                    <option value="{{ $duty->duty_name }}">{{ $duty->duty_name }}</option>
                  @endforeach
              </select>
              <div class="input-group-append" style="width: 30%;">
                  <a href="{{ route('duties') }}">
                      <button class="btn btn-primary" id="submit-category_${currentRoom}" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                  </a>
              </div>
          </div>
      </div>
      <div class="col-lg-5 spacing-left" style="margin-left: 12px">
         Complain Of Month <br>
          <input type="date" id="w3complaint_${currentRoom}" class="form-control" name="customercomplaints[${currentIndex}][complain_month]" />
       </div>
      <div class="col-lg-5 spacing-left" style="margin-left: 12px">
          Notes <br> <textarea id="w3review_guard_${currentRoom}" class="form-control" name="customercomplaints[${currentIndex}][complaint_gaurd_note]" oninput="trimSpaces(this)" onclick="moveCursorToStart(this)" rows="2" cols="40"></textarea>
          </div>
      <div class="col-lg-3 spacing-left spacing-right">
          Attachments <br> <input class="form-control" name="customercomplaints[${currentIndex}][complaint_guard_attach]" type="file" placeholder="..." style="width: 100%;">
          <div class="col-lg-5 spacing-right">
              <div class="image-preview42" id="imagePreview_${currentRoom}">
                  <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
              </div>
          </div>
      </div>
  </div>
  </div>
  <div class="col-lg-12">
  <div class="row mb-2">
      <h5>Weapons, Uniform and Equipment</h5>
      <div class="col-lg-5 spacing-left spacing-right form-group">
          Weapons, Uniform and Equipment <br>
          <br>
          <div class="input-group" style="width: 100%;">
              <select id="dropdown_wue_${currentRoom}" class="form-control mt-1" name="customercomplaints[${currentIndex}][wea_uni_equip]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                  <option value=""></option>
                  @foreach ($equipments as $equipment)
                    <option value="{{ $equipment->equipment_name }}">{{ $equipment->equipment_name }}</option>
                  @endforeach
              </select>
              <div class="input-group-append" style="width: 30%;">
                  <a href="{{ route('equipments') }}">
                      <button class="btn btn-primary" id="submit-category_wue_${currentRoom}" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                  </a>
              </div>
          </div>
      </div>
      <div class="col-lg-5 spacing-left" style="margin-left: 12px">
          Notes <br> <textarea id="w3review_wue_${currentRoom}" oninput="trimSpaces(this)" onclick="moveCursorToStart(this)" class="form-control" name="customercomplaints[${currentIndex}][wue_note]" rows="2" cols="40"></textarea>
          </div>
      <div class="col-lg-3 spacing-left spacing-right">
          Attachments <br> <input class="form-control" name="customercomplaints[${currentIndex}][wue_attach]" type="file" placeholder="..." style="width: 100%;">
          <div class="col-lg-5 spacing-right">
              <div class="image-preview42" id="imagePreview_wue_${currentRoom}">
                  <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
              </div>
          </div>
      </div>
  </div>
  </div>
  <div class="col-lg-12">
  <div class="row mb-2">
      <h5>Finance Department</h5>
      <div class="col-lg-5 spacing-left spacing-right form-group">
          Finance Department <br>
          <br>
          <div class="input-group" style="width: 100%;">
              <select id="dropdown_fd_${currentRoom}" class="form-control mt-1" name="customercomplaints[${currentIndex}][finance_dept]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                  <option value=""></option>
                  @foreach ($finances as $finance)
                    <option value="{{ $finance->finance_name }}">{{ $finance->finance_name }}</option>
                  @endforeach
              </select>
              <div class="input-group-append" style="width: 30%;">
                  <a href="{{ route('finances') }}">
                      <button class="btn btn-primary" id="submit-category_fd_${currentRoom}" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                  </a>
              </div>
          </div>
      </div>
      <div class="col-lg-5 spacing-left" style="margin-left: 12px">
          Notes <br> <textarea id="w3review_fd_${currentRoom}" class="form-control" name="customercomplaints[${currentIndex}][fd_note]" oninput="trimSpaces(this)" onclick="moveCursorToStart(this)" rows="2" cols="40"></textarea>
          </div>
      <div class="col-lg-3 spacing-left spacing-right">
          Attachments <br> <input class="form-control" name="customercomplaints[${currentIndex}][fd_attach]" type="file" placeholder="..." style="width: 100%;">
          <div class="col-lg-5 spacing-right">
              <div class="image-preview42" id="imagePreview_fd_${currentRoom}">
                  <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
              </div>
          </div>
      </div>
  </div>
  </div>
  <div class="col-lg-12">
  <div class="row mb-2">
      <h5>Source of Complaint</h5>
      <div class="col-lg-5 spacing-left spacing-right form-group">
          Source of Complaint <br>
          <br>
          <div class="input-group" style="width: 100%;">
              <select id="dropdown_src_${currentRoom}" class="form-control mt-1" name="customercomplaints[${currentIndex}][src_complaint]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                  <option value=""></option>
                  @foreach ($sources as $source)
                    <option value="{{ $source->source_name }}">{{ $source->source_name }}</option>
                  @endforeach
              </select>
              <div class="input-group-append" style="width: 30%;">
                  <a href="{{ route('sources') }}">
                      <button class="btn btn-primary" id="submit-category_src_${currentRoom}" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                  </a>
              </div>
          </div>
      </div>
      <div class="col-lg-5 spacing-left" style="margin-left: 12px">
          Notes <br> <textarea id="w3review_src_${currentRoom}" class="form-control" name="customercomplaints[${currentIndex}][src_note]" rows="2" cols="40"></textarea>
          </div>
      <div class="col-lg-3 spacing-left spacing-right">
          Attachments <br> <input class="form-control" name="customercomplaints[${currentIndex}][src_attach]" type="file" placeholder="..." style="width: 100%;">
          <div class="col-lg-5 spacing-right">
              <div class="image-preview42" id="imagePreview_src_${currentRoom}">
                  <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
              </div>
          </div>
      </div>
  </div>
  </div>
  <div class="col-lg-12">
  <div class="row mb-2">
      <h5>Management Issues</h5>
      <div class="col-lg-3 spacing-right">
          <label for="mng_feedback_${currentRoom}">Feedback:</label> <br>
          <input class="form-control" name="customercomplaints[${currentIndex}][mng_feed]" value="" type="text" placeholder="..." style="width: 100%; margin-top: -7px;">
      </div>
      <div class="col-lg-3 spacing-left spacing-right">
          Attachments <br> <input class="form-control" id="printing_date_${currentRoom}" name="customercomplaints[${currentIndex}][mng_attach]" type="file" placeholder="..." style="width: 100%;">
          <div class="col-lg-5 spacing-right">
              <div class="image-preview42" id="imagePreview_mng_${currentRoom}">
                  <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
              </div>
          </div>
      </div>
      <div class="col-lg-3 spacing-left" style="margin-left: 12px">
          Notes <br> <textarea id="w3review_mng_${currentRoom}" class="form-control" name="customercomplaints[${currentIndex}][mng_note]" oninput="trimSpaces(this)" onclick="moveCursorToStart(this)" rows="2" cols="40"></textarea>
      </div>
  </div>
  </div>
  <div class="col-lg-12">
  <div class="row mb-2">
      <h5>Complaint POC Details</h5>
      <div class="col-lg-4 spacing-right">
          Name <br> <input class="form-control" name="customercomplaints[${currentIndex}][complaint_poc_name]" value="" type="text" placeholder="..." style="width: 100%;">
      </div>
      <div class="col-lg-4 spacing-right">
          Designation <br> <input class="form-control" name="customercomplaints[${currentIndex}][complaint_poc_desig]" value="" type="text" placeholder="..." style="width: 100%;">
      </div>
      <div class="col-lg-4 spacing-right">
          Department <br> <input class="form-control" name="customercomplaints[${currentIndex}][complaint_poc_dept]" value="" type="text" placeholder="..." style="width: 100%;">
      </div>
      <div class="col-lg-4 spacing-right">
          Email<br> <input class="form-control vldemail" name="customercomplaints[${currentIndex}][complaint_poc_email]" value="" type="text" placeholder="..." style="width: 100%;">
          <div id="emailError_${currentRoom}" class="emailError" style="color: red"></div>
      </div>
      <div class="col-lg-4 spacing-right">
          Contact Number<br> <input class="form-control vldphone" name="customercomplaints[${currentIndex}][complaint_poc_contact]" value="" type="text" placeholder="..." style="width: 100%;">
          <div id="phoneError_${currentRoom}" class="phoneError" style="color: red"></div>
      </div>
      <div class="col-lg-4 spacing-right">
          Picture of Complaint <br> <input class="form-control" name="customercomplaints[${currentIndex}][complaint_picture]" type="file" placeholder="..." style="width: 100%;">
          <div class="col-lg-5 spacing-right">
              <div class="image-preview42" id="imagePreview_pic_${currentRoom}">
                  <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
              </div>
          </div>
      </div>
      <div class="col-lg-4 spacing-right">
          Details of Complaint <br> <textarea class="form-control" name="customercomplaints[${currentIndex}][details_complaint]" placeholder="..." style="width: 100%;"></textarea>
      </div>
      <div class="col-lg-4 spacing-right">
          Details Attachment<br> <input class="form-control" name="customercomplaints[${currentIndex}][details_attach]" type="file" placeholder="..." style="width: 100%;">
          <div class="col-lg-5 spacing-right">
              <div class="image-preview42" id="imagePreview_details_${currentRoom}">
                  <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
              </div>
          </div>
      </div>
      <div class="col-lg-5 spacing-left spacing-right form-group">
          Complaint Tagged To : <br>
      <div class="input-group" style="width: 100%;">
          <select id="dropdown_tagged_${currentRoom}" class="form-control mt-1" name="customercomplaints[${currentIndex}][complaint_tagged]" style="width: 70%; border-radius: 4px 0 0 4px; ">
              <option value=""></option>
              @foreach ($complaintsto as $complaintto)
                <option value="{{ $complaintto->tagged_to_name }}">{{ $complaintto->tagged_to_name }}</option>
              @endforeach
          </select>
          <div class="input-group-append" style="width: 30%;">
              <a href="{{ route('complaintto') }}">
                  <button class="btn btn-primary" id="submit-category_tagged_${currentRoom}" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
              </a>
          </div>
      </div>
      </div>
      <div class="col-lg-5 spacing-left spacing-right form-group">
          Complaint Addressed By : <br>
      <div class="input-group" style="width: 100%;">
          <select id="dropdown_addressed_${currentRoom}" class="form-control mt-1" name="customercomplaints[${currentIndex}][complaint_arressed]" style="width: 70%; border-radius: 4px 0 0 4px; ">
              <option value=""></option>
              @foreach ($complaintsby as $complaintby)
                <option value="{{ $complaintby->addressed_by_name }}">{{ $complaintby->addressed_by_name }}</option>
              @endforeach
          </select>
          <div class="input-group-append" style="width: 30%;">
              <a href="{{ route('complaintby') }}">
                  <button class="btn btn-primary" id="submit-category_addressed_${currentRoom}" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
              </a>
          </div>
      </div>
      </div>
  </div>
  </div>
  <div class="row mb-2">
  <div class="col-lg-6 spacing-left spacing-right mt-2">
      Attachments <br> <input class="form-control" type="file" name="customercomplaints[${currentIndex}][complaint_addressed_attach]" placeholder="..." style="width: 70%;" multiple>
      <div class="col-lg-5 spacing-right">
          <div class="image-preview42" id="imagePreview_addressed_${currentRoom}">
              <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
          </div>
      </div>
  </div>
  <div class="col-lg-6 spacing-left spacing-right my-2">
      Notes <br>
      <textarea id="w3review_addressed_${currentRoom}" class="form-control" oninput="trimSpaces(this)" onclick="moveCursorToStart(this)" name="customercomplaints[${currentIndex}][complaint_addressed_note]" rows="2" cols="38"></textarea>
  </div>
  </div>
              </div>
          </div>
          <div class="new_branch mt-2">
              <button type="button" onclick="removeComplaintSection(${currentRoom})">
                  Remove
              </button>
          </div>
      `;
    objTo.appendChild(divTest);
    complaintRoom++;
    complaintIndex++;
  }
  function removeComplaintSection(rid) {
    document.querySelector('.removeclass' + rid).remove();
  }
</script>
<script>
  var notificationsRoom = {{ count($customers->customernotifications) }} + 1;

  function notifications_add_more() {
    notificationsRoom++;
    var objTo = document.getElementById('notificationsAccordion');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "accordion-item removeclass" + notificationsRoom);

    divtest.innerHTML = `
          <h2 class="accordion-header" id="notificationHeading${notificationsRoom}">
              <button class="accordion-button" type="button" data-toggle="collapse" data-target="#notificationCollapse${notificationsRoom}" aria-expanded="false" aria-controls="notificationCollapse${notificationsRoom}">
                  Notification ${notificationsRoom}
              </button>
          </h2>
          <div id="notificationCollapse${notificationsRoom}" class="collapse" aria-labelledby="notificationHeading${notificationsRoom}">
              <div class="accordion-body">
                  <input type="hidden" name="customernotifications[${notificationsRoom - 1}][n_id]" value="">

                  <div class="row mb-2">

                  <input type="hidden" name="customernotifications[${notificationsRoom - 1}][n_id]" value="">
                  <div class="col-lg-3 spacing-right">
                      Notification No. <br> <input class="form-control" type="text" name="customernotifications[${notificationsRoom - 1}][notification_no]" value="" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left spacing-right form-group">
                      Notification Related to : <br>
                  <div class="input-group" style="width: 100%;">
                      <select id="dropdown" class="form-control mt-1" name="customernotifications[${notificationsRoom - 1}][notification_related]" value="" style="width: 70%; border-radius: 4px 0 0 4px; ">
                          <option value=""></option>
                          @foreach ($notifications as $notification)

                            <option value="{{ $notification->notification_name }}" @if($notification->notification_name == $notificationss->notification_related) selected @endif>{{ $notification->notification_name }}</option>
                          @endforeach
                      </select>
                      <div class="input-group-append" style="width: 30%;">
                          <a href="{{ route('notifications') }}">
                              <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                          </a>
                      </div>
                  </div>
                  </div>
                  </div>
                  <div class="col-lg-4 spacing-left">
                      Attachment. <br> <input class="form-control" type="file" name="customernotifications[${notificationsRoom - 1}][notification_attach]" value="" placeholder="..." style="width: 100%;">
                      <div class="col-lg-5 spacing-right">
                          <div class="image-preview42" id="imagePreview42">
                              @if($notificationss->notification_attach)
                                <img src="{{ asset($notifications->notification_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                              @else
                                <img src ="{{asset('noimage.jpg')}}"  alt="no image" width="70px" height="70px">
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3">
                      Notes. <br> <textarea class="form-control" id="w3review20" type="text" oninput="trimSpaces20()" onclick="moveCursorToStart20()" name="customernotifications[${notificationsRoom - 1}][notification_note]" placeholder="..." style="width: 100%;">{{ $notificationss->notification_note }}</textarea>
                  </div>
              </div>
              <div class="row">

                  <div class="col-lg-5 spacing-left spacing-right form-group">
                      Notification Shared With : <br>
                  <div class="input-group" style="width: 100%;">
                      <select id="dropdown" class="form-control mt-1" name="customernotifications[${notificationsRoom - 1}][notification_shared]" value="" style="width: 70%; border-radius: 4px 0 0 4px; ">
                          <option value=""></option>
                          @foreach ($notificationshared as $notificationshare)

                            <option value="{{ $notificationshare->notification_shared_name}}" @if($notificationshare->notifications_shared_name == $notificationss->notification_shared) selected @endif>{{ $notificationshare->notification_shared_name }}</option>
                          @endforeach
                      </select>
                      <div class="input-group-append" style="width: 30%;">
                          <a href="{{ route('notificationshared') }}">
                              <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                          </a>
                      </div>
                  </div>
                  </div>
              </div>
              <div class="row mb-2">
                  <div class="col-lg-6 spacing-left spacing-right mt-2">
                      Attachements <br> <input class="form-control" type="file" name="customernotifications[${notificationsRoom - 1}][notification_ex_attach]" value="" placeholder="..." style="width: 70%;" multiple>
                      <div class="col-lg-5 spacing-right">
                          <div class="image-preview42" id="imagePreview42">
                              @if($notificationss->notification_ex_attach)
                                <img src="{{ asset($notificationss->notification_ex_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                              @else
                                <img src ="{{asset('noimage.jpg')}}"  alt="no image" width="70px" height="70px">
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right mt-2">
                      Notes <br>
                      <textarea id="w3review" class="form-control" name="customernotifications[${notificationsRoom - 1}][notification_ex_note]" rows="2" cols="38">{{ $notificationss->notification_ex_note }}
                      </textarea>
                  </div>
              </div>
              </div>
          </div>
          <div class="new_branch mt-2">
              <button type="button" class="removeNotification" onclick="removeNotificationSection(${notificationsRoom})">Remove</button>
          </div>
      `;

    objTo.appendChild(divtest);
  }

  function removeNotificationSection(room) {
    document.querySelector('.removeclass' + room).remove();
  }
</script>
<script>
  var assignmentRoom = {{ count($customers->customerassigments) }} + 1;

  function addAssignmentSection() {
    assignmentRoom++;
    var objTo = document.getElementById('assignmentAccordion');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "accordion-item removeclass" + assignmentRoom);

    divtest.innerHTML = `
          <h2 class="accordion-header" id="assignmentHeading${assignmentRoom}">
              <button class="accordion-button" type="button" data-toggle="collapse" data-target="#assignmentCollapse${assignmentRoom}" aria-expanded="false" aria-controls="assignmentCollapse${assignmentRoom}">
                  Assignment Entry ${assignmentRoom}
              </button>
          </h2>
          <div id="assignmentCollapse${assignmentRoom}" class="collapse" aria-labelledby="assignmentHeading${assignmentRoom}">
              <div class="accordion-body">
                  <input type="hidden" name="customerassigments[${assignmentRoom - 1}][asig_id]" value="">
                  <div class="col-lg-6">
                      <div class="row mb-2">
                          <div class="col-lg-3 spacing-right">
                              Customer Name <br>
                              <input class="form-control" name="customerassigments[${assignmentRoom - 1}][asig_customer_name]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left spacing-right">
                              Task Assigning <br> <input class="form-control" name="customerassigments[${assignmentRoom - 1}][task_assigning]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                              Designation <br>
                              <input class="form-control" type="text" name="customerassigments[${assignmentRoom - 1}][asig_desig]" value=""  placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                              Office/Floor <br> <input class="form-control" name="customerassigments[${assignmentRoom - 1}][asig_office]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left spacing-right">
                              Building Name<br> <input class="form-control" type="text" name="customerassigments[${assignmentRoom - 1}][asig_building]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                              Road/Street <br> <input class="form-control" type="text" name="customerassigments[${assignmentRoom - 1}][asig_road]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-right">
                              Area <br> <input class="form-control" type="text" name="customerassigments[${assignmentRoom - 1}][asig_area]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                              City <br> <input class="form-control" type="text" name="customerassigments[${assignmentRoom - 1}][task_assigning]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-right">
                              Country <br> <input class="form-control" type="text" name="customerassigments[${assignmentRoom - 1}][asig_country]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                              Security Incharge <br> <input class="form-control" name="customerassigments[${assignmentRoom - 1}][asig_security]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-right">
                              Contact Details <br> <input class="form-control" name="customerassigments[${assignmentRoom - 1}][asig_contact]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>

                          <h5>Site Incharge Details</h5>
                          <div class="col-lg-3 spacing-right">
                              Incharge Name <br>
                              <input class="form-control" type="text" name="customerassigments[${assignmentRoom - 1}][incharge_name]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                              Designation <br>
                              <input class="form-control" type="text" name="customerassigments[${assignmentRoom - 1}][incharge_desig]" value=""  placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left spacing-right">
                              Contact Details <br> <input class="form-control" name="customerassigments[${assignmentRoom - 1}][incharge_contact]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-8 spacing-right">
                              High Risk Areas <br>
                              <input class="form-control" type="text" name="customerassigments[${assignmentRoom - 1}][incharge_help]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-8 spacing-right">
                              Description of Risk <br>
                              <input class="form-control" type="text" name="customerassigments[${assignmentRoom - 1}][incharge_desc]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-8 spacing-right">
                              History of Risk <br> <input class="form-control" name="customerassigments[${assignmentRoom - 1}][incharge_risk]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-8 spacing-right" style="margin-top: 40px">
                              Assigned Area Manager Of PIFFERS <br>
                              <input class="form-control" type="text" name="customerassigments[${assignmentRoom - 1}][incharge_asig]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-8 spacing-right">
                              Signed By <br> <input class="form-control" name="customerassigments[${assignmentRoom - 1}][incharge_signed_by]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-8 spacing-right">
                              Date <br> <input class="form-control" type="date" name="customerassigments[${assignmentRoom - 1}][incharge_date]" value="" placeholder="..." style="width: 100%;">
                          </div>
                      </div>

                  </div>
                  <div class="col-lg-6">
                      <div class="row mb-2">
                      <h5>Address</h5>
                          <div class="row mb-2">
                              <div class="col-lg-5 spacing-right">
                                  Office No <br> <input class="form-control" id="" name="customerassigments[${assignmentRoom - 1}][incharge_offc]" value="" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-5 spacing-left">
                                  Building <br> <input class="form-control" id="" name="customerassigments[${assignmentRoom - 1}][incharge_build]" value="" type="text" placeholder="..." style="width: 100%;">
                              </div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-lg-5 spacing-right">
                                  Block <br> <input class="form-control" id="" name="customerassigments[${assignmentRoom - 1}][incharge_block]" value="" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-5 spacing-left">
                                  Area <br> <input class="form-control" id="" name="customerassigments[${assignmentRoom - 1}][incharge_area]" value="" type="text" placeholder="..." style="width: 100%;">
                              </div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-lg-5 spacing-right">
                                  City <br> <input class="form-control" id="" name="customerassigments[${assignmentRoom - 1}][incharge_city]" value="" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-5 spacing-left">
                                  Pin Location <br> <input class="form-control" id="" name="customerassigments[${assignmentRoom - 1}][incharge_pin]" value="" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div>
                                  <br> <input class="form-control" id="" name="longitude4" value="" type="hidden" placeholder="..." style="width: 100%;">
                              </div>
                              <div>
                                  <br> <input class="form-control" id="" name="latitude4" value="" type="hidden" placeholder="..." style="width: 100%;">
                              </div>
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                              Country <br> <input class="form-control" name="customerassigments[${assignmentRoom - 1}][incharge_country]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                              Site ID <br> <input class="form-control" name="customerassigments[${assignmentRoom - 1}][incharge_site]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                              A-Guard <br> <input class="form-control" name="customerassigments[${assignmentRoom - 1}][incharge_a_g]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                              Un-A-Guard <br> <input class="form-control" name="customerassigments[${assignmentRoom - 1}][incharge_a_ung]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                              Total Guard <br> <input class="form-control" name="customerassigments[${assignmentRoom - 1}][incharge_t_g]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-8 spacing-right" style="margin-top:80px">
                              Recent Security Related Incidents <br>
                              <input class="form-control" type="text" name="customerassigments[${assignmentRoom - 1}][rec_inc_rel]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-8 spacing-right">
                              Frequency Of Occurence <br>
                              <input class="form-control" type="text" name="customerassigments[${assignmentRoom - 1}][feq_occ]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-8 spacing-right">
                              Expectations from PIFFERS <br>
                              <input class="form-control" type="text" name="customerassigments[${assignmentRoom - 1}][exp_piff]" value="" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-8 spacing-right">
                              Any Special Instructions <br> <input class="form-control" name="customerassigments[${assignmentRoom - 1}][any_spec]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>

                          <div class="col-lg-8 spacing-right">
                              Petrolling Instruction <br>
                              <input class="form-control" type="text" name="customerassigments[${assignmentRoom - 1}][petr_instruc]" value="" placeholder="..." style="width: 100%;">
                          </div>

                      </div>
                  </div>
                  <h3></h3>
                  <div class="row mb-2">
                      <div class="col-lg-6 spacing-left spacing-right mt-2">
                          Attachments <br> <input class="form-control" type="file" name="customerassigments[${assignmentRoom - 1}][asig_ex_attach]" value="" placeholder="..." style="width: 70%;" multiple>
                          <div class="col-lg-5 spacing-right">
                              <div class="image-preview42" id="imagePreview42">
                                    <img src="{{asset('noimage.jpg')}}"  alt="no image" width="70px" height="70px">
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 spacing-left spacing-right mt-2">
                          Notes <br>
                          <textarea id="w3review11" class="form-control" name="customerassigments[${assignmentRoom - 1}][asig_ex_notes]" oninput="trimSpaces11()" onclick="moveCursorToStart11()" rows="2" cols="38">{{ $assigments->asig_ex_notes }}
                          </textarea>
                      </div>
                  </div>
              </div>
          </div>
          <div class="new_branch mt-2">
              <button type="button" onclick="removeAssignmentSection(${assignmentRoom})">Remove</button>
          </div>
      `;

    objTo.appendChild(divtest);
  }

  function removeAssignmentSection(rid) {
    document.querySelector('.removeclass' + rid).remove();
  }
</script>
<script>
  var cleaningRoom = {{ count($customers->customerarmourers) }} + 1;

  function addCleaningSection() {
    cleaningRoom++;
    var objTo = document.getElementById('cleaningAccordion');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "accordion-item removeclass" + cleaningRoom);

    divtest.innerHTML = `
          <h2 class="accordion-header" id="cleaningHeading${cleaningRoom}">
              <button class="accordion-button" type="button" data-toggle="collapse" data-target="#cleaningCollapse${cleaningRoom}" aria-expanded="false" aria-controls="cleaningCollapse${cleaningRoom}">
                  Cleaning Entry ${cleaningRoom}
              </button>
          </h2>
          <div id="cleaningCollapse${cleaningRoom}" class="collapse" aria-labelledby="cleaningHeading${cleaningRoom}">
              <div class="accordion-body">
                  <input type="hidden" name="customerarmourers[${cleaningRoom - 1}][a_id]" value="">
                  <div class="row col-lg-12">
                      <div class="col-lg-4 spacing-right">
                          Branch Name <br> <input class="form-control" type="text" name="customerarmourers[${cleaningRoom - 1}][arm_branch_name]" value="" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-4 spacing-right">
                          Branch ID <br> <input class="form-control" type="text" name="customerarmourers[${cleaningRoom - 1}][arm_branch_id]" value="" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-4 spacing-right">
                          Site ID <br> <input class="form-control" type="text" name="customerarmourers[${cleaningRoom - 1}][arm_site_id]" value=""  placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-4 spacing-right">
                          Client Name <br> <input class="form-control" type="text" name="customerarmourers[${cleaningRoom - 1}][arm_client_name]" value="" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-4 spacing-right">
                          Weapon Number <br> <input class="form-control" type="text" name="customerarmourers[${cleaningRoom - 1}][arm_weapon_no]" value="" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-4 spacing-right">
                          Weapon Bore <br> <input class="form-control" type="text" name="customerarmourers[${cleaningRoom - 1}][arm_weapon_bore]" value="" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-4 spacing-right">
                          Weapon Type <br> <input class="form-control" type="text" name="customerarmourers[${cleaningRoom - 1}][arm_weapon_type]" value="" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-4 spacing-right">
                          Working Details <br> <input class="form-control" type="text" name="customerarmourers[${cleaningRoom - 1}][arm_work_detail]" value="" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-4 spacing-right">
                          Sign of Customer <br> <input class="form-control" type="text" name="customerarmourers[${cleaningRoom - 1}][arm_sign_cus]" value="" placeholder="..." style="width: 100%;">
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="row mb-2">
                          <div class="col-lg-4 spacing-right" style="margin-bottom: 10px;">
                              New Authority Letter Issue : <br> <input class="form-control" id="" name="customerarmourers[${cleaningRoom - 1}][arm_auth]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                          New Authority Letter No <br> <input class="form-control" id="head_office_email" id="inpFile42" name="customerarmourers[${cleaningRoom - 1}][arm_auth_no]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                          New Authority Letter Validity <br> <input class="form-control" id="head_office_email" name="customerarmourers[${cleaningRoom - 1}][arm_auth_date]" value="" type="date" placeholder="..." style="width: 100%;">

                          </div>
                          <div class="col-lg-4 spacing-right" style="margin-bottom: 10px;">
                              Date of issue <br> <input class="form-control" id="" name="customerarmourers[${cleaningRoom - 1}][arm_auth_issue]" value="" type="date" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                              Number of weapon cleaned <br> <input class="form-control" id="head_office_email" id="inpFile42" name="customerarmourers[${cleaningRoom - 1}][arm_weapon_cleaned]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                              Type of weapon cleaned <br> <input class="form-control" id="head_office_email" name="customerarmourers[${cleaningRoom - 1}][type_weapon_cleaned]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-right">
                              Picture before cleaning <br> <input class="form-control" id="" name="customerarmourers[${cleaningRoom - 1}][arm_pic_b]" type="file" value=""  placeholder="..." style="width: 100%;">
                              <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                        <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4 spacing-right">
                              Picture after cleaning <br> <input class="form-control" id="" name="customerarmourers[${cleaningRoom - 1}][arm_pic_a]" type="file" value="" placeholder="..." style="width: 100%;">
                              <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                        <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4 spacing-right">
                              Cost of the day <br> <input class="form-control" id="" name="customerarmourers[${cleaningRoom - 1}][arm_cost_day]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-right">
                              Cost Bill <br> <input class="form-control" id="" name="customerarmourers[${cleaningRoom - 1}][arm_cost_bill]" value="" type="file" placeholder="..." style="width: 100%;">
                              <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                        <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4 spacing-right">
                              Next cleaning activity due on : <br> <input class="form-control" id="" name="customerarmourers[${cleaningRoom - 1}][arm_next_clean]" value="" type="date" placeholder="..." style="width: 100%;">
                          </div>
                      </div>
                      <div class="row mb-2">
                          <div class="col-lg-4 spacing-right mt-2">
                              Notes <br>
                              <textarea id="w3review9" class="form-control" name="customerarmourers[${cleaningRoom - 1}][arm_next_clean]" oninput="trimSpaces9()" onclick="moveCursorToStart9()" rows="2" cols="38">
                              </textarea>
                          </div>
                          <div class="col-lg-4 spacing-left spacing-right mt-2">
                              Attachments <br> <input class="form-control" name="customerarmourers[${cleaningRoom - 1}][arm_auth_attach]" value="" type="file" placeholder="..." style="width: 70%;" multiple>
                              <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                        <img src="{{asset('noimage.jpg')}}" alt="no image" width="70px" height="70px">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="new_branch mt-2">
              <button type="button" class="removeCleaning" onclick="removeCleaningSection(${cleaningRoom})">Remove</button>
          </div>
      `;

    objTo.appendChild(divtest);
  }

  function removeCleaningSection(room) {
    document.querySelector('.removeclass' + room).remove();
  }
</script>
<script>
  var auditsRoom = {{ count($customers->customeraudits) }} + 1;

  function audits_add_more() {
    auditsRoom++;
    var objTo = document.getElementById('auditsAccordion');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "accordion-item removeclass" + auditsRoom);

    divtest.innerHTML = `
          <h2 class="accordion-header" id="auditHeading${auditsRoom}">
              <button class="accordion-button" type="button" data-toggle="collapse" data-target="#auditCollapse${auditsRoom}" aria-expanded="false" aria-controls="auditCollapse${auditsRoom}">
                  Audit ${auditsRoom}
              </button>
          </h2>
          <div id="auditCollapse${auditsRoom}" class="collapse" aria-labelledby="auditHeading${auditsRoom}">
              <div class="accordion-body">
                  <input type="hidden" name="customeraudits[${auditsRoom - 1}][au_id]" value="">
                  <div class="col-lg-12">
                      <div class="row mb-2">
                          <div class="col-lg-3 spacing-right">
                              File Audited By : <br> <input class="form-control" id="" name="customeraudits[${auditsRoom - 1}][audit_file]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left spacing-right">
                              Signature <br> <input class="form-control" id="head_office_email" name="customeraudits[${auditsRoom - 1}][audit_sign]" value="" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                              Date <br> <input class="form-control" id="" name="customeraudits[${auditsRoom - 1}][audit_date]" value="" type="date" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-right">
                              Attachments <br> <input class="form-control" id="" name="customeraudits[${auditsRoom - 1}][audit_attach]" value="" type="file" placeholder="..." style="width: 100%;">
                              <div class="col-lg-5 spacing-right">
                                  <div class="image-preview42" id="imagePreview42">
                                      @if($audits->audit_attach)
                                        <img src="{{ asset($audits->audit_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                      @else
                                        <img src ="{{asset('noimage.jpg')}}"  alt="no image" width="70px" height="70px">
                                      @endif
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <h5 class="mt-3">Checked By :</h5>
                  <div class="row mb-2">

                      <div class="col-lg-5 spacing-left spacing-right form-group">
                          Checked by: <br>
                          <div class="input-group" style="width: 100%;">
                              <select id="dropdown" class="form-control mt-1" name="customeraudits[${auditsRoom - 1}][audit_checked_by]" value="" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                  <option value=""></option>
                                  @foreach ($checkedby as $checked)

                                    <option value="{{ $checked->checkedby_name }}" @if($checked->checkedby_name == $audits->audit_checked_by) selected @endif>{{ $checked->checkedby_name}}</option>
                                  @endforeach
                              </select>
                              <div class="input-group-append" style="width: 30%;">
                                  <a href="{{ route('checkedby') }}">
                                      <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-2">
                      <div class="col-lg-6 spacing-left spacing-right mt-2">
                          Attachements <br> <input class="form-control" name="customeraudits[${auditsRoom - 1}][audit_ex_attach]" type="file" value="" placeholder="..." style="width: 70%;" multiple>
                          <div class="col-lg-5 spacing-right">
                              <div class="image-preview42" id="imagePreview42">
                                  @if($audits->audit_ex_attach)
                                    <img src="{{ asset($audits->audit_ex_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                  @else
                                    <img src ="{{asset('noimage.jpg')}}"  alt="no image" width="70px" height="70px">
                                  @endif
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 spacing-left spacing-right mt-2">
                          Notes <br>
                          <textarea id="w3review12" class="form-control" name="customeraudits[${auditsRoom - 1}][audit_note]" oninput="trimSpaces12()" onclick="moveCursorToStart12()" rows="2" cols="38">{{ $audits->audit_note }}
                          </textarea>
                      </div>
                  </div>
              </div>
          </div>
          <div class="new_branch mt-2">
              <button type="button" class="removeAudit" onclick="removeAuditSection(${auditsRoom})">Remove</button>
          </div>
      `;

    objTo.appendChild(divtest);
  }

  function removeAuditSection(room) {
    document.querySelector('.removeclass' + room).remove();
  }
</script>
<script>
  var businessRoom = {{ count($customers->customerbussinesses) }} + 1;

  function business_add_more() {
    businessRoom++;
    var objTo = document.getElementById('businessAccordion');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "accordion-item removeclass" + businessRoom);

    divtest.innerHTML = `
          <h2 class="accordion-header" id="businessHeading${businessRoom}">
              <button class="accordion-button" type="button" data-toggle="collapse" data-target="#businessCollapse${businessRoom}" aria-expanded="false" aria-controls="businessCollapse${businessRoom}">
                  Business Entry ${businessRoom}
              </button>
          </h2>
          <div id="businessCollapse${businessRoom}" class="collapse" aria-labelledby="businessHeading${businessRoom}">
              <div class="accordion-body">
                  <input type="hidden" name="customerbussinesses[${businessRoom - 1}][b_id]" value="">
                  <div class=" row main-content div">
                      <p>Please Collect information of other Business/Group of Customer.</p>
                      <h5>POC :</h5>
                      <div class="col-lg-12">
                          <div class="row mb-2">

                              <div class="col-lg-6 spacing-right">
                                  Name of Business <br> <input class="form-control"  value="" name="customerbussinesses[${businessRoom - 1}][bussiness_name]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                  Nature of Business <br> <input class="form-control" id="" value="" name="customerbussinesses[${businessRoom - 1}][bussiness_nature]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-left">
                                  <h5>Address</h5>
                                  <div class="row mb-2">
                                      <div class="col-lg-5 spacing-right">
                                          Office No <br> <input class="form-control" id="" value="" name="customerbussinesses[${businessRoom - 1}][bussiness_office_no]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-5 spacing-right">
                                          Floor <br> <input class="form-control" id="" value="" name="customerbussinesses[${businessRoom - 1}][bussiness_floor]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-5">
                                          Building <br> <input class="form-control" id="" value="" name="customerbussinesses[${businessRoom - 1}][bussiness_building]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                  </div>
                                  <div class="row mb-2">
                                      <div class="col-lg-5 spacing-right">
                                          Block <br> <input class="form-control" id="" value="" name="customerbussinesses[${businessRoom - 1}][bussiness_block]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-5 spacing-left">
                                          Area <br> <input class="form-control" id="" value="" name="customerbussinesses[${businessRoom - 1}][bussiness_area]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                  </div>
                                  <div class="row mb-2">
                                      <div class="col-lg-5 spacing-right">
                                          City <br> <input class="form-control" id="" value="" name="customerbussinesses[${businessRoom - 1}][bussiness_city]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-5 spacing-left">
                                          Photograph of Building <br> <input class="form-control" id="" value="" name="customerbussinesses[${businessRoom - 1}][bussiness_photo]" type="file" placeholder="..." style="width: 100%;">
                                          <div class="col-lg-5 spacing-right">
                                              <div class="image-preview42" id="imagePreview42">
                                                  @if($bussinesses->bussiness_photo)
                                                    <img src="{{ asset($bussinesses->bussiness_photo) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                  @else
                                                    <img src ="{{asset('noimage.jpg')}}"  alt="no image" width="70px" height="70px">
                                                  @endif
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row mb-2">
                                      <div class="col-lg-5 spacing-right">
                                          Email <br> <input class="form-control vldemail" id="" name="customerbussinesses[${businessRoom - 1}][bussiness_email]" value="" type="text" placeholder="..." style="width: 100%;">
                                          <div id="emailError" class="emailError" style="color: red"></div>
                                      </div>
                                      <div class="col-lg-5 spacing-left">
                                          Website <br> <input class="form-control vldwebsite" id="" name="customerbussinesses[${businessRoom - 1}][bussiness_web]" value="" type="text" placeholder="..." style="width: 100%;">
                                          <div id="websiteError" class="websiteError" style="color: red"></div>
                                      </div>
                                  </div>
                                  <div class="row mb-2">
                                      <div class="col-lg-5 spacing-right">
                                          Pin location <br> <input class="form-control" id="" name="customerbussinesses[${businessRoom - 1}][bussiness_pin]" value="}" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div>
                                          <br> <input class="form-control" id="" name="longitude5" value="" type="hidden" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div>
                                      <br> <input class="form-control" id="" name="latitude5" value="" type="hidden" placeholder="..." style="width: 100%;">
                                      </div>
                                  </div>
                              </div>



                          </div>

                      </div>
                      <div class="row mb-2">
                      <div class="col-lg-4 spacing-left spacing-right mt-2">
                          Notes <br>
                          <textarea id="w3review13" class="form-control" name="customerbussinesses[${businessRoom - 1}][bussiness_notes]" oninput="trimSpaces13()" onclick="moveCursorToStart13()" rows="2" cols="38">{{ $bussinesses->bussiness_notes }}
                          </textarea>
                      </div>
                      <div class="col-lg-4 spacing-left spacing-right mt-2">
                          Attachements <br> <input class="form-control" value="" type="file" name="customerbussinesses[${businessRoom - 1}][bussiness_attach]" placeholder="..." style="width: 70%;" multiple>
                          <div class="col-lg-5 spacing-right">
                              <div class="image-preview42" id="imagePreview42">
                                  @if($bussinesses->bussiness_attach)
                                    <img src="{{ asset($bussinesses->bussiness_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                  @else
                                    <img src ="{{asset('noimage.jpg')}}"  alt="no image" width="70px" height="70px">
                                  @endif
                              </div>
                          </div>
                      </div>

                      </div>
                      <div class="new_branch mt-2">
                          <button type="button" class="removeBusiness" onclick="removeBusinessSection(${businessRoom})">Remove</button>
                      </div>
                  </div>
              </div>
          </div>
      `;

    objTo.appendChild(divtest);
  }

  function removeBusinessSection(room) {
    document.querySelector('.removeclass' + room).remove();
  }
</script>
<script>
  var promotionalActivityRoom = {{ count($customers->customeractivities) }} + 1;

  function addPromotionalActivitySection() {
    promotionalActivityRoom++;
    var objTo = document.getElementById('giveawaysAccordion');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "accordion-item removeclass" + promotionalActivityRoom);

    divtest.innerHTML = `
          <h2 class="accordion-header" id="giveawayHeading${promotionalActivityRoom}">
              <button class="accordion-button" type="button" data-toggle="collapse" data-target="#giveawayCollapse${promotionalActivityRoom}" aria-expanded="false" aria-controls="giveawayCollapse${promotionalActivityRoom}">
                  Giveaway Entry ${promotionalActivityRoom}
              </button>
          </h2>
          <div id="giveawayCollapse${promotionalActivityRoom}" class="collapse" aria-labelledby="giveawayHeading${promotionalActivityRoom}">
              <div class="accordion-body">
                  <input type="hidden" name="customeractivities[${promotionalActivityRoom - 1}][act_id]" value="">
                  <div class="col-lg-6 spacing-right form-group">
                      Customer Details Entered in all Promotional Activities <br>
                  <div class="input-group" style="width: 100%;">
                      <select id="dropdown" class="form-control mt-1" name="customeractivities[{{ $index }}][promotional_act]" value="" style="width: 70%; border-radius: 4px 0 0 4px; ">
                          <option value=""></option>
                          @foreach ($activities as $activity)
                            <option value="{{ $activity->activity_name }}" @if($activity->activity_name == $activitiess->promotional_act) selected @endif>{{ $activity->activity_name }}</option>

                          @endforeach
                      </select>
                      <div class="input-group-append" style="width: 30%;">
                          <a href="{{ route('activities') }}">
                              <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                          </a>
                      </div>
                  </div>
                  </div>
                  <div class="col-lg-6 mt-1">
                      <div class="spacing-left">
                          Quantity <br> <input class="form-control" type="text" name="customeractivities[${promotionalActivityRoom - 1}][promotional_quantity]" value="" placeholder="..." style="width: 100%;">
                      </div>
                  </div>
                  <div class="form-type col-lg-6 spacing-right">
                      Estimated price<br> <input class="form-control" id="shift_start_date" name="customeractivities[${promotionalActivityRoom - 1}][prom_price]" value="" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="form-type col-lg-6 spacing-right">
                      Date <br> <input class="form-control" id="shift_end_date" name="customeractivities[${promotionalActivityRoom - 1}][prom_date]" type="date" value="" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6">

                      Notes <br> <textarea id="w3review14" class="form-control" name="customeractivities[${promotionalActivityRoom - 1}][promotional_notes]" oninput="trimSpaces14()" onclick="moveCursorToStart14()" rows="2" cols="38">{{ $activitiess->promotional_notes }}
                          </textarea>

                  </div>
                  <div class="col-lg-6">

                      Attachments <br> <input class="form-control" type="file" name="customeractivities[${promotionalActivityRoom - 1}][promotional_attach]" value="" placeholder="..." style="width: 100%;">
                      <div class="col-lg-5 spacing-right">
                          <div class="image-preview42" id="imagePreview42">
                              @if($activitiess->promotional_attach)
                                <img src="{{ asset($activitiess->promotional_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                              @else
                                <img src ="{{asset('noimage.jpg')}}"  alt="no image" width="70px" height="70px">
                              @endif
                          </div>
                      </div>

                  </div>

              </div>
          </div>
          <div class="new_branch mt-2">
              <button type="button" class="removePromotionalActivity" onclick="removePromotionalActivitySection(${promotionalActivityRoom})">Remove</button>
          </div>
      `;

    objTo.appendChild(divtest);
  }

  function removePromotionalActivitySection(room) {
    document.querySelector('.removeclass' + room).remove();
  }
</script>
<script>
  $('#edit-customer-icon').click(function () {
    //  openModal();
  });
</script>
<script>
  function openModal() {
    $('#add_user').modal('show');
  }

  // Click event for the "New Customer" button
  $('[data-target="#add_user"]').click(function () {
    openModal();
  });

</script>
<script>
  function closeModal() {
    $('#add_user').modal('hide');
  }
</script>
<script>
  // Wait for the DOM to load
  document.addEventListener('DOMContentLoaded', function () {
    // Select the search input element
    var searchInput = document.getElementById('search-input');

    // Select the table rows
    var rows = document.querySelectorAll('#my-table tbody tr');

    // Convert the rows to an array for easier manipulation
    var rowsArray = Array.from(rows);

    // Add an event listener for input changes
    searchInput.addEventListener('input', function () {
      var searchText = this.value.toLowerCase(); // Get the search text in lowercase

      // Filter the rows based on the search text
      var filteredRows = rowsArray.filter(function (row) {
        var nameColumn = row.querySelector('.col-lg-3'); // Select the column with the name

        // Get the name from the column
        var name = nameColumn.textContent.toLowerCase();

        // Check if the name matches the search text
        return name.includes(searchText);
      });

      // Move the matching rows to the top
      filteredRows.forEach(function (row) {
        row.parentNode.prepend(row);
      });
    });
  });
</script>
<script>
  const addFeedbackButton = document.getElementById("add_feedback_btn");
  const removeFeedbackButton = document.getElementById("remove_feedback_btn");
  const feedbackForm = document.getElementById("feedbackForm");

  addFeedbackButton.addEventListener("click", () => {
    feedbackForm.style.display = "block"; // Show the feedback form
  });

  removeFeedbackButton.addEventListener("click", () => {
    feedbackForm.style.display = "none"; // Hide the feedback form
  });
</script>
<script>
  const addComplaintButton = document.getElementById("add_complaint_btn");
  const removeComplaintButton = document.getElementById("remove_complaint_btn");
  const removeComplaintSectionButton = document.getElementById("remove_complaint_section_btn");
  const complaintForm = document.getElementById("complaintForm");

  addComplaintButton.addEventListener("click", () => {
    complaintForm.style.display = "block"; // Show the form
    removeComplaintButton.style.display = "block"; // Show the remove button
  });

  removeComplaintButton.addEventListener("click", () => {
    complaintForm.style.display = "none"; // Hide the form
    removeComplaintButton.style.display = "none"; // Hide the remove button
  });

  removeComplaintSectionButton.addEventListener("click", () => {
    complaintForm.style.display = "none"; // Hide the form
    removeComplaintButton.style.display = "none"; // Hide the remove button
  });
</script>
<script>
  const addNotificationButton = document.getElementById("add_notification_btn");
  const removeNotificationButton = document.getElementById("remove_notification_btn");
  const notificationForm = document.getElementById("notificationForm");

  addNotificationButton.addEventListener("click", () => {
    notificationForm.style.display = "block"; // Show the notification form
  });

  removeNotificationButton.addEventListener("click", () => {
    notificationForm.style.display = "none"; // Hide the notification form
  });
</script>
<script>
  const addInspectionButton = document.getElementById("add_inspection_btn");
  const removeInspectionButton = document.getElementById("remove_inspection_btn");
  const inspectionDiv = document.getElementById("inspectionDiv");

  addInspectionButton.addEventListener("click", () => {
    inspectionDiv.style.display = "block"; // Show the inspection form
  });

  removeInspectionButton.addEventListener("click", () => {
    inspectionDiv.style.display = "none"; // Hide the inspection form
  });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    var index = 0;

    $('#addMoreCheckbox').on('click', function () {
      index++;
      var inputHtml = '<input type="text" class="form-control currencyName" placeholder="New Currency ' + index + '">';
      var checkboxHtml = '<div class="form-check form-check-inline"><input class="form-check-input" name="compliances[]" type="checkbox" id="inlineCheckbox' + (index + 5) + '">' + inputHtml + '</div>';
      $('#new-checkboxes').append(checkboxHtml);

      // Update the newly added input field to create a corresponding label for the checkbox
      $('.currencyName').last().on('blur', function () {
        var checkboxId = $(this).siblings('input[type="checkbox"]').attr('id');
        var labelHtml = '<label class="form-check-label" for="' + checkboxId + '">' + $(this).val() + '</label>';
        $(this).siblings('input[type="checkbox"]').after(labelHtml);
        $(this).hide(); // Hide the input field after the label is created
      });
    });
  });
</script>
<script>
  $(document).ready(function () {
    var index = 0;

    $('#addMoreCheckbox1').on('click', function () {
      index++;
      var inputHtml = '<input type="text" class="form-control currencyName" placeholder="New ' + index + '">';
      var checkboxHtml = '<div class="form-check form-check-inline"><input class="form-check-input" name="compliances[]" type="checkbox" id="inlineCheckbox' + (index + 5) + '">' + inputHtml + '</div>';
      $('#new-checkboxes1').append(checkboxHtml);

      // Update the newly added input field to create a corresponding label for the checkbox
      $('.currencyName').last().on('blur', function () {
        var checkboxId = $(this).siblings('input[type="checkbox"]').attr('id');
        var labelHtml = '<label class="form-check-label" for="' + checkboxId + '">' + $(this).val() + '</label>';
        $(this).siblings('input[type="checkbox"]').after(labelHtml);
        $(this).hide(); // Hide the input field after the label is created
      });
    });
  });
</script>
<script>
  let input = document.querySelector(".input");
  let button = document.querySelector(".form-controld");
  button.disabled = true;
  input.addEventListener("change", stateHandle);

  function stateHandle() {
    if (document.querySelector(".input").value === "") {
      button.disabled = true;
    } else {
      button.disabled = false;
    }
  }
</script>
<script>
  function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
  }
</script>
<!-- <script>
   const inpFile = document.getElementById("inpFile");
   const previewContainer = document.getElementById("imagePreview");
   const previewImage = previewContainer.querySelector(".image-preview__image");
   const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

   inpFile.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText.style.display = "none";
           previewImage.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText.style.display = "null";
           previewImage.style.display = "null";
           previewImage.setAttribute("src", "");
       }


   });
   </script> -->
<!-- <script>
   const inpFile1 = document.getElementById("inpFile1");
   const previewContainer1 = document.getElementById("imagePreview1");
   const previewImage1 = previewContainer1.querySelector(".image-preview__image1");
   const previewDefaultText1 = previewContainer1.querySelector(".image-preview__default-text1");

   inpFile1.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText1.style.display = "none";
           previewImage1.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage1.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText1.style.display = "null";
           previewImage1.style.display = "null";
           previewImage1.setAttribute("src", "");
       }


   });
   </script> -->
<!--Image Preview Education-->
<!-- <script>
   const inpFile3 = document.getElementById("inpFile3");
   const previewContainer3 = document.getElementById("imagePreview3");
   const previewImage3 = previewContainer3.querySelector(".image-preview__image3");
   const previewDefaultText3 = previewContainer3.querySelector(".image-preview__default-text3");

   inpFile3.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText3.style.display = "none";
           previewImage3.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage3.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText3.style.display = "null";
           previewImage3.style.display = "null";
           previewImage3.setAttribute("src", "");
       }


   });
   </script> -->
<!--Image Preview Compliance-->
<!-- <script>
   const inpFile4 = document.getElementById("inpFile4");
   const previewContainer4 = document.getElementById("imagePreview4");
   const previewImage4 = previewContainer4.querySelector(".image-preview__image4");
   const previewDefaultText4 = previewContainer4.querySelector(".image-preview__default-text4");

   inpFile4.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText4.style.display = "none";
           previewImage4.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage4.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText4.style.display = "null";
           previewImage4.style.display = "null";
           previewImage4.setAttribute("src", "");
       }


   });
   </script> -->
<!--Image Preview Biometric-->
<!-- <script>
   const inpFile6 = document.getElementById("inpFile6");
   const previewContainer6 = document.getElementById("imagePreview6");
   const previewImage6 = previewContainer6.querySelector(".image-preview__image6");
   const previewDefaultText6 = previewContainer6.querySelector(".image-preview__default-text6");

   inpFile6.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText6.style.display = "none";
           previewImage6.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage6.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText6.style.display = "null";
           previewImage6.style.display = "null";
           previewImage6.setAttribute("src", "");
       }


   });
   </script> -->
<!-- <script>
   const inpFile7 = document.getElementById("inpFile7");
   const previewContainer7 = document.getElementById("imagePreview7");
   const previewImage7 = previewContainer7.querySelector(".image-preview__image7");
   const previewDefaultText7 = previewContainer7.querySelector(".image-preview__default-text7");

   inpFile7.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText7.style.display = "none";
           previewImage7.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage7.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText7.style.display = "null";
           previewImage7.style.display = "null";
           previewImage7.setAttribute("src", "");
       }


   });
   </script> -->
<!-- <script>
   const inpFile8 = document.getElementById("inpFile8");
   const previewContainer8 = document.getElementById("imagePreview8");
   const previewImage8 = previewContainer8.querySelector(".image-preview__image8");
   const previewDefaultText8 = previewContainer8.querySelector(".image-preview__default-text8");

   inpFile8.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText8.style.display = "none";
           previewImage8.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage8.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText8.style.display = "null";
           previewImage8.style.display = "null";
           previewImage8.setAttribute("src", "");
       }


   });
   </script> -->
<!-- <script>
   const inpFile9 = document.getElementById("inpFile9");
   const previewContainer9 = document.getElementById("imagePreview9");
   const previewImage9 = previewContainer9.querySelector(".image-preview__image9");
   const previewDefaultText9 = previewContainer9.querySelector(".image-preview__default-text9");

   inpFile9.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText9.style.display = "none";
           previewImage9.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage9.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText9.style.display = "null";
           previewImage9.style.display = "null";
           previewImage9.setAttribute("src", "");
       }


   });
   </script> -->
<!-- <script>
   const inpFile10 = document.getElementById("inpFile10");
   const previewContainer10 = document.getElementById("imagePreview10");
   const previewImage10 = previewContainer10.querySelector(".image-preview__image10");
   const previewDefaultText10 = previewContainer10.querySelector(".image-preview__default-text10");

   inpFile10.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText10.style.display = "none";
           previewImage10.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage10.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText10.style.display = "null";
           previewImage10.style.display = "null";
           previewImage10.setAttribute("src", "");
       }


   });
   </script> -->
<!-- <script>
   const inpFile11 = document.getElementById("inpFile11");
   const previewContainer11 = document.getElementById("imagePreview11");
   const previewImage11 = previewContainer11.querySelector(".image-preview__image11");
   const previewDefaultText11 = previewContainer11.querySelector(".image-preview__default-text11");

   inpFile11.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText11.style.display = "none";
           previewImage11.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage11.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText11.style.display = "null";
           previewImage11.style.display = "null";
           previewImage11.setAttribute("src", "");
       }


   });
   </script> -->
<!--
   <script>
       const inpFile12 = document.getElementById("inpFile12");
       const previewContainer12 = document.getElementById("imagePreview12");
       const previewImage12 = previewContainer12.querySelector(".image-preview__image12");
       const previewDefaultText12 = previewContainer12.querySelector(".image-preview__default-text12");

       inpFile12.addEventListener("change", function() {
           const file = this.files[0];

           if (file) {
               const reader = new FileReader();

               previewDefaultText12.style.display = "none";
               previewImage12.style.display = "block";

               reader.addEventListener("load", function() {
                   previewImage12.setAttribute("src", this.result);
               });

               reader.readAsDataURL(file);
           } else {
               previewDefaultText12.style.display = "null";
               previewImage12.style.display = "null";
               previewImage12.setAttribute("src", "");
           }


       });
   </script> -->
<!-- <script>
   const inpFile15 = document.getElementById("inpFile15");
   const previewContainer15 = document.getElementById("imagePreview15");
   const previewImage15 = previewContainer15.querySelector(".image-preview__image15");
   const previewDefaultText15 = previewContainer15.querySelector(".image-preview__default-text15");

   inpFile15.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText15.style.display = "none";
           previewImage15.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage15.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText15.style.display = "null";
           previewImage15.style.display = "null";
           previewImage15.setAttribute("src", "");
       }


   });
   </script> -->
<!-- <script>
   const inpFile20 = document.getElementById("inpFile20");
   const previewContainer20 = document.getElementById("imagePreview20");
   const previewImage20 = previewContainer20.querySelector(".image-preview__image20");
   const previewDefaultText20 = previewContainer20.querySelector(".image-preview__default-text20");

   inpFile20.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText20.style.display = "none";
           previewImage20.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage20.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText20.style.display = "null";
           previewImage20.style.display = "null";
           previewImage20.setAttribute("src", "");
       }


   });
   </script> -->
<!-- <script>
   const inpFile21 = document.getElementById("inpFile21");
   const previewContainer21 = document.getElementById("imagePreview21");
   const previewImage21 = previewContainer21.querySelector(".image-preview__image21");
   const previewDefaultText21 = previewContainer21.querySelector(".image-preview__default-text21");

   inpFile21.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText21.style.display = "none";
           previewImage21.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage21.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText21.style.display = "null";
           previewImage21.style.display = "null";
           previewImage21.setAttribute("src", "");
       }
   });
   </script> -->
<!-- <script>
   const inpFile22 = document.getElementById("inpFile22");
   const previewContainer22 = document.getElementById("imagePreview22");
   const previewImage22 = previewContainer22.querySelector(".image-preview__image22");
   const previewDefaultText22 = previewContainer22.querySelector(".image-preview__default-text22");

   inpFile22.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText22.style.display = "none";
           previewImage22.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage22.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText22.style.display = "null";
           previewImage22.style.display = "null";
           previewImage22.setAttribute("src", "");
       }
   });
   </script> -->
<!-- <script>
   const inpFile30 = document.getElementById("inpFile30");
   const previewContainer30 = document.getElementById("imagePreview30");
   const previewImage30 = previewContainer30.querySelector(".image-preview__image30");
   const previewDefaultText30 = previewContainer30.querySelector(".image-preview__default-text30");

   inpFile30.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText30.style.display = "none";
           previewImage30.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage30.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText30.style.display = "null";
           previewImage30.style.display = "null";
           previewImage30.setAttribute("src", "");
       }
   });
   </script> -->
<!-- <script>
   const inpFile41 = document.getElementById("inpFile41");
   const previewContainer41 = document.getElementById("imagePreview41");
   const previewImage41 = previewContainer41.querySelector(".image-preview__image41");
   const previewDefaultText41 = previewContainer41.querySelector(".image-preview__default-text41");

   inpFile41.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText41.style.display = "none";
           previewImage41.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage41.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText41.style.display = "null";
           previewImage41.style.display = "null";
           previewImage41.setAttribute("src", "");
       }

   });
   </script> -->
<!-- <script>
   const inpFile42 = document.getElementById("inpFile42");
   const previewContainer42 = document.getElementById("imagePreview42");
   const previewImage42 = previewContainer42.querySelector(".image-preview__image42");
   const previewDefaultText42 = previewContainer42.querySelector(".image-preview__default-text42");

   inpFile42.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText42.style.display = "none";
           previewImage42.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage42.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText42.style.display = "null";
           previewImage42.style.display = "null";
           previewImage42.setAttribute("src", "");
       }

   });
   </script> -->
<!-- <script>
   const inpFile43 = document.getElementById("inpFile43");
   const previewContainer43 = document.getElementById("imagePreview43");
   const previewImage43 = previewContainer43.querySelector(".image-preview__image43");
   const previewDefaultText43 = previewContainer43.querySelector(".image-preview__default-text43");

   inpFile43.addEventListener("change", function() {
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText43.style.display = "none";
           previewImage43.style.display = "block";

           reader.addEventListener("load", function() {
               previewImage43.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       } else {
           previewDefaultText43.style.display = "null";
           previewImage43.style.display = "null";
           previewImage43.setAttribute("src", "");
       }

   });
   </script> -->
<!--
   <script>
       const inpFile44 = document.getElementById("inpFile44");
       const previewContainer44 = document.getElementById("imagePreview44");
       const previewImage44 = previewContainer44.querySelector(".image-preview__image44");
       const previewDefaultText44 = previewContainer44.querySelector(".image-preview__default-text44");

       inpFile44.addEventListener("change", function() {
           const file = this.files[0];

           if (file) {
               const reader = new FileReader();

               previewDefaultText44.style.display = "none";
               previewImage44.style.display = "block";

               reader.addEventListener("load", function() {
                   previewImage44.setAttribute("src", this.result);
               });

               reader.readAsDataURL(file);
           } else {
               previewDefaultText44.style.display = "null";
               previewImage44.style.display = "null";
               previewImage44.setAttribute("src", "");
           }

       });
   </script> -->
<script>
  function trimSpaces() {
    var textarea = document.getElementById('w3review');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart() {
    var textarea = document.getElementById('w3review');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces1() {
    var textarea = document.getElementById('w3review1');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart1() {
    var textarea = document.getElementById('w3review1');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces2() {
    var textarea = document.getElementById('w3review2');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart2() {
    var textarea = document.getElementById('w3review2');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces3() {
    var textarea = document.getElementById('w3review3');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart3() {
    var textarea = document.getElementById('w3review3');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces4() {
    var textarea = document.getElementById('w3review4');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart4() {
    var textarea = document.getElementById('w3review4');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces5() {
    var textarea = document.getElementById('w3review5');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart5() {
    var textarea = document.getElementById('w3review5');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces23() {
    var textarea = document.getElementById('w3review23');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart23() {
    var textarea = document.getElementById('w3review23');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces22() {
    var textarea = document.getElementById('w3review22');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart22() {
    var textarea = document.getElementById('w3review22');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces6() {
    var textarea = document.getElementById('w3review6');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart6() {
    var textarea = document.getElementById('w3review6');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces7() {
    var textarea = document.getElementById('w3review7');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart7() {
    var textarea = document.getElementById('w3review7');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces8() {
    var textarea = document.getElementById('w3review8');
    textarea.value = textarea.value.trim();
  }


  function moveCursorToStart8() {
    var textarea = document.getElementById('w3review8');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces9() {
    var textarea = document.getElementById('w3review9');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart9() {
    var textarea = document.getElementById('w3review9');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces10() {
    var textarea = document.getElementById('w3review10');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart10() {
    var textarea = document.getElementById('w3review10');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces11() {
    var textarea = document.getElementById('w3review11');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart11() {
    var textarea = document.getElementById('w3review11');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces12() {
    var textarea = document.getElementById('w3review12');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart12() {
    var textarea = document.getElementById('w3review12');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces13() {
    var textarea = document.getElementById('w3review13');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart13() {
    var textarea = document.getElementById('w3review13');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces14() {
    var textarea = document.getElementById('w3review14');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart14() {
    var textarea = document.getElementById('w3review14');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces15() {
    var textarea = document.getElementById('w3review15');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart15() {
    var textarea = document.getElementById('w3review15');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces16() {
    var textarea = document.getElementById('w3review16');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart16() {
    var textarea = document.getElementById('w3review16');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces17() {
    var textarea = document.getElementById('w3review17');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart17() {
    var textarea = document.getElementById('w3review17');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces18() {
    var textarea = document.getElementById('w3review18');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart18() {
    var textarea = document.getElementById('w3review18');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces19() {
    var textarea = document.getElementById('w3review19');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart19() {
    var textarea = document.getElementById('w3review19');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces20() {
    var textarea = document.getElementById('w3review20');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart20() {
    var textarea = document.getElementById('w3review20');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces21() {
    var textarea = document.getElementById('w3review21');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart21() {
    var textarea = document.getElementById('w3review21');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  function trimSpaces22() {
    var textarea = document.getElementById('w3review22');
    textarea.value = textarea.value.trim();
  }

  function moveCursorToStart22() {
    var textarea = document.getElementById('w3review22');
    textarea.setSelectionRange(0, 0);
  }
</script>
<script>
  $(document).ready(function () {
    // Hide the second section initially.
    $("#sectionToHide").hide();

    // Listen for the click event on the "N/A" checkbox.
    $("#compliances-na").on("click", function () {
      // Toggle the visibility of the second section based on the checkbox's checked status.
      if (!this.checked) {
        $("#sectionToHide").show();
      } else {
        $("#sectionToHide").hide();
      }
    });

    // Check the initial state of the checkbox and show/hide the section accordingly.
    if ($("#compliances-na").is(":checked")) {
      $("#sectionToHide").hide();
    } else {
      $("#sectionToHide").show();
    }
  });
</script>
<script>
  $(document).ready(function () {
    // Function to update the result field
    function updateResultField() {
      var field1Value = $('#c_id').val();
      var field2Value = $('#customers_name').val();
      var field3Value = $('#city_of_deployment').val();
      var field4Value = $('#customers_suffix').val();

      // Your logic to combine the values (in this example, concatenation)
      var resultValue = field1Value + '-' + ' ' + field2Value + ' ' + field4Value + ' ' + '(' + field3Value + ')';

      // Update the result field
      $('#d_name').val(resultValue);
    }

    // Trigger the function when the values in the first two fields change
    $('#c_id, #customers_name,#customers_suffix,#city_of_deployment').on('input', function () {
      updateResultField();
    });
  });
</script>
<script>
  function validateEmail() {
    var emailInputs = document.getElementsByClassName('vldemail');
    var emailErrors = document.getElementsByClassName('emailError');

    // Regular expression for a basic email format validation
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Iterate through email inputs
    for (var i = 0; i < emailInputs.length; i++) {
      var emailInput = emailInputs[i];
      var emailError = emailErrors[i];

      // Check if the email is empty
      if (emailInput.value.trim() === '') {
        emailError.innerText = ''; // No error if the input is empty
      } else if (!emailRegex.test(emailInput.value)) {
        if (!/@/.test(emailInput.value)) {
          emailError.innerText = 'Please enter the "@" sign';
        } else if (!/.com$/.test(emailInput.value)) {
          emailError.innerText = 'Please enter ".com" at the end';
        } else {
          emailError.innerText = 'Invalid email format';
        }
      } else {
        emailError.innerText = '';
      }
    }
  }

  // Attach the event listener to each email input
  var emailInputs = document.getElementsByClassName('vldemail');
  for (var i = 0; i < emailInputs.length; i++) {
    emailInputs[i].addEventListener('input', validateEmail);
  }
</script>
<script>
  function validatePhoneNumber() {
    var phoneInputs = document.getElementsByClassName('vldphone');
    var phoneErrors = document.getElementsByClassName('phoneError');

    // Regular expression for a Pakistani phone number format
    var phoneRegex = /^(0[3-9][0-9]{2}[- ]?[0-9]{7})$/;

    // Iterate through phone inputs
    for (var i = 0; i < phoneInputs.length; i++) {
      var phoneInput = phoneInputs[i];
      var phoneError = phoneErrors[i];

      // Check if the phone number is empty
      if (phoneInput.value.trim() === '') {
        phoneError.innerText = ''; // No error if the input is empty
      } else if (!/^[0-9- ]+$/.test(phoneInput.value)) {
        phoneError.innerText = 'Only numbers and a single dash (-) are allowed';
      } else if (!phoneRegex.test(phoneInput.value)) {
        phoneError.innerText = 'Invalid phone number format. e.g: 03XX-XXXXXXX';
      } else if (phoneInput.value.length !== 12 && phoneInput.value.indexOf('-') !== -1) {
        phoneError.innerText = 'Phone number must be 12 characters long';
      } else if (!/-/.test(phoneInput.value.substring(4, 5))) {
        phoneError.innerText = 'Dash (-) is missing after the first 4 digits';
      } else {
        phoneError.innerText = '';
      }
    }
  }

  // Attach the event listener to each phone input
  var phoneInputs = document.getElementsByClassName('vldphone');
  for (var i = 0; i < phoneInputs.length; i++) {
    phoneInputs[i].addEventListener('input', validatePhoneNumber);
  }
</script>
<script>
  function validateWebsite() {
    var websiteInputs = document.getElementsByClassName('vldwebsite');
    var websiteErrors = document.getElementsByClassName('websiteError');

    // Regular expression for a website format
    var websiteRegex = /^www\.[a-zA-Z0-9-]+\.com$/;

    // Iterate through website inputs
    for (var i = 0; i < websiteInputs.length; i++) {
      var websiteInput = websiteInputs[i];
      var websiteError = websiteErrors[i];

      // Check if the website is empty
      if (websiteInput.value.trim() === '') {
        websiteError.innerText = ''; // No error if the input is empty
      } else if (!/^www\./.test(websiteInput.value)) {
        websiteError.innerText = 'Please start with "www."';
      } else if (!/.com$/.test(websiteInput.value)) {
        websiteError.innerText = 'Please end with ".com"';
      } else if (!websiteRegex.test(websiteInput.value)) {
        websiteError.innerText = 'Invalid website format. Please use the format like www.example.com';
      } else {
        websiteError.innerText = '';
      }
    }
  }

  // Attach the event listener to each website input
  var websiteInputs = document.getElementsByClassName('vldwebsite');
  for (var i = 0; i < websiteInputs.length; i++) {
    websiteInputs[i].addEventListener('input', validateWebsite);
  }
</script>
{{-- shift start date --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get references to the shift start and end date inputs
    var startDateInput = document.getElementsByName('customermanpowers[{{ $index }}][s_start_date]')[0];
    var endDateInput = document.getElementsByName('customermanpowers[{{ $index }}][s_end_date]')[0];
    var endDateError = document.getElementById('shiftEndDateError');

    // Attach an input event listener to the end date input
    endDateInput.addEventListener('input', function () {
      validateShiftDates(startDateInput, endDateInput, endDateError);
    });
  });

  function validateShiftDates(startDateInput, endDateInput, endDateError) {
    var startDate = new Date(startDateInput.value);
    var endDate = new Date(endDateInput.value);

    // Check if the end date is greater than or equal to the start date
    if (endDate < startDate) {
      endDateError.textContent = 'Shift End date should be greater than or equal to Shift Start date.';
    } else {
      endDateError.textContent = '';
    }
  }

  // Add this function to be called on form submission
  function validateForm() {
    var startDateInput = document.getElementsByName('customermanpowers[{{ $index }}][s_start_date]')[0];
    var endDateInput = document.getElementsByName('customermanpowers[{{ $index }}][s_end_date]')[0];
    var endDateError = document.getElementById('shiftEndDateError');

    validateShiftDates(startDateInput, endDateInput, endDateError);

    // Check if there are any errors before allowing form submission
    if (endDateError.textContent !== '') {
      // Prevent the form from being submitted
      event.preventDefault();
    }
  }
</script>
{{-- deployment start date --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get references to the shift start and end date inputs
    var startDateInput = document.getElementsByName('customermanpowers[{{ $index }}][man_start_date]')[0];
    var endDateInput = document.getElementsByName('customermanpowers[{{ $index }}][man_end_date]')[0];
    var endDateError = document.getElementById('deploymentEndDateError');

    // Attach an input event listener to the end date input
    endDateInput.addEventListener('input', function () {
      validateShiftDates(startDateInput, endDateInput, endDateError);
    });
  });

  function validateShiftDates(startDateInput, endDateInput, endDateError) {
    var startDate = new Date(startDateInput.value);
    var endDate = new Date(endDateInput.value);

    // Check if the end date is greater than or equal to the start date
    if (endDate < startDate) {
      endDateError.textContent = 'Deployment End date should be greater than or equal to Deployment Start date.';
    } else {
      endDateError.textContent = '';
    }
  }

  // Add this function to be called on form submission
  function validateForm() {
    var startDateInput = document.getElementsByName('customermanpowers[{{ $index }}][man_start_date]')[0];
    var endDateInput = document.getElementsByName('customermanpowers[{{ $index }}][man_end_date]')[0];
    var endDateError = document.getElementById('deploymentEndDateError');

    validateShiftDates(startDateInput, endDateInput, endDateError);

    // Check if there are any errors before allowing form submission
    if (endDateError.textContent !== '') {
      // Prevent the form from being submitted
      event.preventDefault();
    }
  }
</script>
{{-- shift start time --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get references to the shift start and end time inputs
    var startTimeInput = document.getElementsByName('customermanpowers[{{ $index }}][s_start_time]')[0];
    var endTimeInput = document.getElementsByName('customermanpowers[{{ $index }}][s_end_time]')[0];
    var endTimeError = document.getElementById('shiftEndTimeError');

    // Attach an input event listener to the end time input
    endTimeInput.addEventListener('input', function () {
      validateShiftTimes(startTimeInput, endTimeInput, endTimeError);
    });
  });

  function validateShiftTimes(startTimeInput, endTimeInput, endTimeError) {
    var startTime = parseTime(startTimeInput.value);
    var endTime = parseTime(endTimeInput.value);

    // Check if the end time is greater than the start time
    if (endTime <= startTime) {
      endTimeError.textContent = 'Shift End time should be greater than Shift Start time.';
    } else {
      endTimeError.textContent = '';
    }
  }

  // Add this function to be called on form submission
  function validateForm() {
    var startTimeInput = document.getElementsByName('customermanpowers[{{ $index }}][s_start_time]')[0];
    var endTimeInput = document.getElementsByName('customermanpowers[{{ $index }}][s_end_time]')[0];
    var endTimeError = document.getElementById('shiftEndTimeError');

    validateShiftTimes(startTimeInput, endTimeInput, endTimeError);

    // Check if there are any errors before allowing form submission
    if (endTimeError.textContent !== '') {
      // Prevent the form from being submitted
      event.preventDefault();
    }
  }

  function parseTime(timeString) {
    // Parse time in HH:mm format
    var parts = timeString.split(':');
    if (parts.length === 2) {
      var hours = parseInt(parts[0], 10);
      var minutes = parseInt(parts[1], 10);
      if (!isNaN(hours) && !isNaN(minutes)) {
        return { hours: hours, minutes: minutes };
      }
    }
    return null;
  }
</script>
{{-- deployment time --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get references to the shift start and end time inputs
    var startTimeInput = document.getElementsByName('customermanpowers[{{ $index }}][man_start_time]')[0];
    var endTimeInput = document.getElementsByName('customermanpowers[{{ $index }}][man_end_time]')[0];
    var endTimeError = document.getElementById('deploymentEndTimeError');

    // Attach an input event listener to the end time input
    endTimeInput.addEventListener('input', function () {
      validateShiftTimes(startTimeInput, endTimeInput, endTimeError);
    });
  });

  function validateShiftTimes(startTimeInput, endTimeInput, endTimeError) {
    var startTime = parseTime(startTimeInput.value);
    var endTime = parseTime(endTimeInput.value);

    // Check if the end time is greater than the start time
    if (endTime <= startTime) {
      endTimeError.textContent = 'Shift End time should be greater than Shift Start time.';
    } else {
      endTimeError.textContent = '';
    }
  }

  // Add this function to be called on form submission
  function validateForm() {
    var startTimeInput = document.getElementsByName('customermanpowers[{{ $index }}][man_start_time]')[0];
    var endTimeInput = document.getElementsByName('customermanpowers[{{ $index }}][man_end_time]')[0];
    var endTimeError = document.getElementById('deploymentEndTimeError');

    validateShiftTimes(startTimeInput, endTimeInput, endTimeError);

    // Check if there are any errors before allowing form submission
    if (endTimeError.textContent !== '') {
      // Prevent the form from being submitted
      event.preventDefault();
    }
  }

  function parseTime(timeString) {
    // Parse time in HH:mm format
    var parts = timeString.split(':');
    if (parts.length === 2) {
      var hours = parseInt(parts[0], 10);
      var minutes = parseInt(parts[1], 10);
      if (!isNaN(hours) && !isNaN(minutes)) {
        return { hours: hours, minutes: minutes };
      }
    }
    return null;
  }
</script>
{{-- duty hours --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get references to the shift start and end time inputs
    var startTimeInput = document.getElementsByName('customermanpowers[{{ $index }}][s_start_time]')[0];
    var endTimeInput = document.getElementsByName('customermanpowers[{{ $index }}][s_end_time]')[0];
    var dutyHoursInput = document.getElementsByName('customermanpowers[{{ $index }}][man_hours]')[0];

    // Attach input event listeners to both start and end time inputs
    startTimeInput.addEventListener('input', updateDutyHours);
    endTimeInput.addEventListener('input', updateDutyHours);

    function updateDutyHours() {
      var startTime = parseTime(startTimeInput.value);
      var endTime = parseTime(endTimeInput.value);

      if (startTime && endTime) {
        var dutyHours = calculateDutyHours(startTime, endTime);
        dutyHoursInput.value = dutyHours;
      } else {
        dutyHoursInput.value = ''; // Clear duty hours if either start or end time is not valid
      }
    }

    function parseTime(timeString) {
      // Parse time in HH:mm format
      var parts = timeString.split(':');
      if (parts.length === 2) {
        var hours = parseInt(parts[0], 10);
        var minutes = parseInt(parts[1], 10);
        if (!isNaN(hours) && !isNaN(minutes)) {
          return { hours: hours, minutes: minutes };
        }
      }
      return null;
    }

    function calculateDutyHours(startTime, endTime) {
      // Calculate the time difference in minutes
      var startMinutes = startTime.hours * 60 + startTime.minutes;
      var endMinutes = endTime.hours * 60 + endTime.minutes;
      var timeDifference = endMinutes - startMinutes;

      // Convert the time difference back to HH:mm format
      var calculatedHours = Math.floor(timeDifference / 60);
      var calculatedMinutes = timeDifference % 60;

      return ('0' + calculatedHours).slice(-2) + ':' + ('0' + calculatedMinutes).slice(-2);
    }
  });
</script>
{{-- calculation for leaves --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get references to the leaves allowed and salary for no. of days inputs
    var leavesAllowedInputs = document.getElementsByName('leaves_a[]');
    var salaryForDaysInputs = document.getElementsByName('sal_days[]');

    // Attach input event listeners to all salary for days inputs
    for (var i = 0; i < salaryForDaysInputs.length; i++) {
      salaryForDaysInputs[i].addEventListener('input', function (event) {
        var index = Array.from(salaryForDaysInputs).indexOf(event.target);
        updateLeavesAllowed(leavesAllowedInputs[index], salaryForDaysInputs[index]);
      });
    }

    // Trigger initial calculation for all inputs
    for (var i = 0; i < leavesAllowedInputs.length; i++) {
      updateLeavesAllowed(leavesAllowedInputs[i], salaryForDaysInputs[i]);
    }
  });

  function updateLeavesAllowed(leavesAllowedInput, salaryForDaysInput) {
    var salaryForDays = parseFloat(salaryForDaysInput.value);

    // Check if the salary for days is a valid number
    if (!isNaN(salaryForDays)) {
      // Calculate leaves allowed based on the formula (30 - Salary for No. of days)
      var leavesAllowed = 30 - salaryForDays;

      // Update the leaves allowed input value
      leavesAllowedInput.value = leavesAllowed.toFixed(2);

      // Optional: You can perform additional validation or adjustments here
    } else {
      // If the salary for days is not a valid number, clear the leaves allowed input
      leavesAllowedInput.value = '';
    }
  }
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get references to the quantity, price per unit, and total value inputs
    var quantityInput = document.getElementsByName('pat_quan')[0];
    var pricePerUnitInput = document.getElementsByName('pat_price')[0];
    var totalValueInput = document.getElementsByName('pat_val')[0];

    // Attach input event listeners to the quantity and price per unit inputs
    quantityInput.addEventListener('input', updateTotalValue);
    pricePerUnitInput.addEventListener('input', updateTotalValue);

    // Trigger initial calculation
    updateTotalValue();
  });

  function updateTotalValue() {
    var quantity = parseFloat(document.getElementsByName('pat_quan')[0].value);
    var pricePerUnit = parseFloat(document.getElementsByName('pat_price')[0].value);

    // Check if both quantity and price per unit are valid numbers
    if (!isNaN(quantity) && !isNaN(pricePerUnit)) {
      // Calculate total value based on the formula (Quantity * Price Per Unit)
      var totalValue = quantity * pricePerUnit;

      // Update the total value input value
      document.getElementsByName('pat_val')[0].value = totalValue.toFixed(2);

      // Optional: You can perform additional validation or adjustments here
    } else {
      // If either quantity or price per unit is not a valid number, clear the total value input
      document.getElementsByName('pat_val')[0].value = '';
    }
  }
</script>
{{-- working one --}}
<script>
  $(document).ready(function () {
    @foreach ($customers->customermanpowers as $index => $manpowers)
      var accordionCount = {{ $index + 1 }};

      var accordionHtml = `
                  <div class="accordion-item" id="manpowerEntry${accordionCount}">
                      <h2 class="accordion-header" id="manpowerHeading${accordionCount}">
                          <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#collapse${accordionCount}" aria-expanded="false" aria-controls="collapse${accordionCount}">
                              Manpower Entry ${accordionCount}
                          </button>
                      </h2>
                      <div id="collapse${accordionCount}" class="collapse" aria-labelledby="manpowerHeading${accordionCount}">
                          <div class="accordion-body">
                              <input type="hidden" name="customermanpowers[${accordionCount - 1}][m_id]" value="{{ $manpowers->id }}">
                              <div class="row col-lg-12 manpower">
                                  <div class="col-lg-6 spacing-right">
                                      <div class="row mb-2">


                                          <div class="col-lg-5 spacing-left  ">
                                              Guard Post No <br>
                                              <div class="input-group" style="width: 100%;">
                                                  <select id="dropdown" class="form-control mt-1" name="customermanpowers[${accordionCount - 1}][man_post]" value="{{ $manpowers->man_post }}" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                      <option value=""></option>
                                                      @foreach ($guardposts as $guardpost)
                                                        <option value="{{ $guardpost->guard_post }}" @if($guardpost->guard_post == $manpowers->man_post) selected @endif>{{ $guardpost->guard_post}}</option>

                                                      @endforeach
                                                  </select>
                                                  <div class="input-group-append" style="width: 30%;">
                                                      <a href="{{ route('guardpost') }}">
                                                          <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-lg-5  spacing-right form-group">
                                              Category <br>
                                              <div class="input-group" style="width: 100%;">
                                                  <select id="dropdown" class="form-control mt-1" name="customermanpowers[${accordionCount - 1}][man_cat]" value="{{ $manpowers->man_cat }}" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                      <option value=""></option>
                                                      @foreach ($categories as $category)
                                                        <option value="{{ $category->category_name }}" @if($category->category_name == $manpowers->man_cat) selected @endif>{{ $category->category_name}}</option>

                                                      @endforeach
                                                  </select>
                                                  <div class="input-group-append" style="width: 30%;">
                                                      <a href="{{ route('category') }}">
                                                          <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="col-lg-5 spacing-left spacing-right form-group">
                                              Uniform Type <br>
                                              <div class="input-group" style="width: 100%;">
                                                  <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_uni]" type="text" value="{{ $manpowers->man_uni }}" placeholder="..." style="width: 100%;">
                                              </div>
                                          </div>
                                          <div class="col-lg-5 spacing-left spacing-right form-group">
                                                  Uniform Number <br>
                                                  <div class="input-group" style="width: 100%;">
                                                      <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_uni_no]"  type="text" value="{{ $manpowers->man_uni_no }}" placeholder="..." style="width: 100%;">
                                                  </div>
                                              </div>
                                              <div class="col-lg-5 spacing-left spacing-right form-group">
                                                  Weapon Type <br>
                                                  <div class="input-group" style="width: 100%;">
                                                      <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_weapon]"  type="text" value="{{ $manpowers->man_weapon }}" placeholder="..." style="width: 100%;">
                                                  </div>
                                              </div>
                                              <div class="col-lg-5 spacing-left spacing-right form-group">
                                                  Ammunition Type <br>
                                                  <div class="input-group" style="width: 100%;">
                                                      <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_ammu]"  type="text" value="{{ $manpowers->man_ammu }}" placeholder="..." style="width: 100%;">
                                                  </div>
                                              </div>
                                              <div class="col-lg-5 spacing-left spacing-right form-group">
                                                  Equipment <br>
                                                  <div class="input-group" style="width: 100%;">
                                                      <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_equip]"  type="text" value="{{ $manpowers->man_equip }}" placeholder="..." style="width: 100%;">
                                                  </div>
                                              </div>
                                              <div class="form-type col-lg-5 spacing-right">
                                                  Picture of Equipment <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_equip_attach]"  type="file" value="{{ $manpowers->man_equip_attach }}" placeholder="..." style="width: 100%;">
                                                  <div class="col-lg-5 spacing-right">
                                                      <div class="image-preview42" id="imagePreview42">
                                                          @if($manpowers->man_equip_attach)
                                                            <img src="{{ asset($manpowers->man_equip_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                          @else
                                                            <img src ="{{asset('noimage.jpg')}}"  alt="no image" width="70px" height="70px">
                                                          @endif
                                                      </div>
                                                  </div>
                                              </div>

                                      </div>

                                  </div>
                                  <div class="col-lg-6 spacing-left">
                                      <div class="row mb-3">
                                          <div class="form-type col-lg-6 spacing-right">
                                              Shift Start date. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][s_start_date]" value="{{ $manpowers->s_start_date }}" type="date" placeholder="..." style="width: 100%;">
                                          </div>
                                          <div class="form-type col-lg-6 spacing-right">
                                              Shift End date. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][s_end_date]" value="{{ $manpowers->s_end_date }}" type="date" placeholder="..." style="width: 100%;">
                                              <div id="shiftEndDateError" style="color: red;"></div>
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="form-type col-lg-6 spacing-right">
                                              Shift Start time. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][s_start_time]" type="time" value="{{ $manpowers->s_start_time }}" placeholder="..." style="width: 100%;">
                                          </div>
                                          <div class="form-type col-lg-6 spacing-right">
                                              Shift End time. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][s_end_time]" type="time" value="{{ $manpowers->s_end_time }}" placeholder="..." style="width: 100%;">
                                              <div id="shiftEndTimeError" style="color: red;"></div>
                                          </div>
                                      </div>

                                      <div class="row mb-3">
                                          <div class="form-type col-lg-6 spacing-right">
                                          Deployment Start date. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_start_date]"  type="date" value="{{ $manpowers->man_start_date }}" placeholder="..." style="width: 100%;">
                                          </div>
                                          <div class="form-type col-lg-6 spacing-right">
                                          Deployment End date. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_end_date]"  type="date" value="{{ $manpowers->man_end_date }}" placeholder="..." style="width: 100%;">
                                          <div id="deploymentEndDateError" style="color: red;"></div>
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="form-type col-lg-6 spacing-right">
                                          Deployment Start time. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_start_time]"  type="time" value="{{ $manpowers->man_start_time }}" placeholder="..." style="width: 100%;">
                                          </div>
                                          <div class="form-type col-lg-6 spacing-right">
                                          Deployment End time. <br> <input class="form-control"  name="customermanpowers[${accordionCount - 1}][man_end_time]"  type="time" value="{{ $manpowers->man_end_date }}" placeholder="..." style="width: 100%;">
                                          <div id="deploymentEndTimeError" style="color: red;"></div>
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="form-type col-lg-6 spacing-right">
                                          Quantity. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_quan]"  type="text" value="{{ $manpowers->man_quan }}" placeholder="..." style="width: 100%;">
                                          </div>
                                          <div class="form-type col-lg-6 spacing-right">
                                          Duty Hours. <br> <input class="form-control"  name="customermanpowers[${accordionCount - 1}][man_hours]"  type="text" value="{{ $manpowers->man_hours }}" placeholder="..." style="width: 100%;">
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="form-type col-lg-6 spacing-right">
                                          Post Orders / JD of Guard Post. <br>
                                          <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_jd_attach]"  type="file" value="{{ $manpowers->man_jd_attach }}" placeholder="..." style="width: 100%;">
                                              <div class="col-lg-5 spacing-right">
                                                  <div class="image-preview42" id="imagePreview42">
                                                      @if($manpowers->man_jd_attach)
                                                        <img src="{{ asset($manpowers->man_jd_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                      @else
                                                        <img src ="{{asset('noimage.jpg')}}"  alt="no image" width="70px" height="70px">
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-type col-lg-6 spacing-right">
                                          Any Special Instructions. <br>
                                          <textarea class="form-control" id="w3review5" name="customermanpowers[${accordionCount - 1}][man_any_sp]" type="notes" oninput="trimSpaces5()" onclick="moveCursorToStart5()"  placeholder="..." style="width: 100%;">{{ $manpowers->man_any_sp }}</textarea>
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="form-type col-lg-6 spacing-right">
                                              Approved Leaves. <br> <input class="form-control"name="customermanpowers[${accordionCount - 1}][man_apr_l]"  value="{{ $manpowers->man_apr_l }}" type="text" placeholder="..." style="width: 100%;">
                                          </div>
                                          <div class="form-type col-lg-6 spacing-right">
                                              Salary of total days. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_salary]"  value="{{ $manpowers->man_salary }}" type="text" placeholder="..." style="width: 100%;">
                                          </div>
                                      </div>
                                  </div>
                                  <div style="width: 50%;">
                                      <button class="btn btn-primary removeAccordion" type="button">Remove</button>
                                  </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              `;

      $('#manpowerAccordion').append(accordionHtml);
    @endforeach
  });
</script>
<script>
  $(document).ready(function () {
    // Add More Button Click Event
    $('#addManpower').on('click', function () {
      var accordionCount = $('.accordion-item').length + 1;

      var newAccordion = `
              <div class="accordion-item" id="manpowerEntry${accordionCount}">
                  <h2 class="accordion-header" id="manpowerHeading${accordionCount}">
                      <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#collapse${accordionCount}" aria-expanded="false" aria-controls="collapse${accordionCount}">
                          Manpower Entry ${accordionCount}
                      </button>
                  </h2>
                  <div id="collapse${accordionCount}" class="collapse" aria-labelledby="manpowerHeading${accordionCount}">
                      <div class="accordion-body">
                          <!-- Add your input fields here with empty values -->
                          <input type="hidden" name="customermanpowers[${accordionCount - 1}][m_id]" value="">
                          <div class="row col-lg-12 manpower">
                              <div class="col-lg-6 spacing-right">
                                  <div class="row mb-2">
                                       <div class="col-lg-5 spacing-left  ">
                                          Guard Post No <br>
                                          <div class="input-group" style="width: 100%;">
                                              <select id="dropdown" class="form-control mt-1" name="customermanpowers[${accordionCount - 1}][man_post]" value="{{ $manpowers->man_post }}" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                  <option value=""></option>
                                                  @foreach ($guardposts as $guardpost)
                                                    <option value="{{ $guardpost->guard_post }}" @if($guardpost->guard_post == $manpowers->man_post) selected @endif>{{ $guardpost->guard_post}}</option>

                                                  @endforeach
                                              </select>
                                              <div class="input-group-append" style="width: 30%;">
                                                  <a href="{{ route('guardpost') }}">
                                                      <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-5  spacing-right form-group">
                                          Category <br>
                                          <div class="input-group" style="width: 100%;">
                                              <select id="dropdown" class="form-control mt-1" name="customermanpowers[${accordionCount - 1}][man_cat]" value="{{ $manpowers->man_cat }}" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                  <option value=""></option>
                                                  @foreach ($categories as $category)
                                                    <option value="{{ $category->category_name }}" @if($category->category_name == $manpowers->man_cat) selected @endif>{{ $category->category_name}}</option>

                                                  @endforeach
                                              </select>
                                              <div class="input-group-append" style="width: 30%;">
                                                  <a href="{{ route('category') }}">
                                                      <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-5 spacing-left spacing-right form-group">
                                          Uniform Type <br>
                                          <div class="input-group" style="width: 100%;">
                                              <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_uni]" type="text" value="" placeholder="..." style="width: 100%;">
                                          </div>
                                      </div>
                                      <div class="col-lg-5 spacing-left spacing-right form-group">
                                              Uniform Number <br>
                                              <div class="input-group" style="width: 100%;">
                                                  <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_uni_no]"  type="text" value="" placeholder="..." style="width: 100%;">
                                              </div>
                                          </div>
                                          <div class="col-lg-5 spacing-left spacing-right form-group">
                                              Weapon Type <br>
                                              <div class="input-group" style="width: 100%;">
                                                  <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_weapon]"  type="text" value="" placeholder="..." style="width: 100%;">
                                              </div>
                                          </div>
                                          <div class="col-lg-5 spacing-left spacing-right form-group">
                                              Ammunition Type <br>
                                              <div class="input-group" style="width: 100%;">
                                                  <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_ammu]"  type="text" value="" placeholder="..." style="width: 100%;">
                                              </div>
                                          </div>
                                          <div class="col-lg-5 spacing-left spacing-right form-group">
                                              Equipment <br>
                                              <div class="input-group" style="width: 100%;">
                                                  <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_equip]"  type="text" value="" placeholder="..." style="width: 100%;">
                                              </div>
                                          </div>
                                          <div class="form-type col-lg-5 spacing-right">
                                              Picture of Equipment <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_equip_attach]"  type="file" value="" placeholder="..." style="width: 100%;">
                                              <div class="col-lg-5 spacing-right">
                                                  <div class="image-preview42" id="imagePreview42">
                                                      @if($manpowers->man_equip_attach)
                                                        <img src="{{ asset($manpowers->man_equip_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                      @else
                                                        <img src ="{{asset('noimage.jpg')}}"  alt="no image" width="70px" height="70px">
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>

                                  </div>
                              </div>
                              <div class="col-lg-6 spacing-left">
                                  <div class="row mb-3">
                                      <div class="form-type col-lg-6 spacing-right">
                                          Shift Start date. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][s_start_date]" value="" type="date" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="form-type col-lg-6 spacing-right">
                                          Shift End date. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][s_end_date]" value="" type="date" placeholder="..." style="width: 100%;">
                                          <div id="shiftEndDateError" style="color: red;"></div>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <div class="form-type col-lg-6 spacing-right">
                                          Shift Start time. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][s_start_time]" type="time" value="" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="form-type col-lg-6 spacing-right">
                                          Shift End time. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][s_end_time]" type="time" value="" placeholder="..." style="width: 100%;">
                                          <div id="shiftEndTimeError" style="color: red;"></div>
                                      </div>
                                  </div>

                                  <div class="row mb-3">
                                      <div class="form-type col-lg-6 spacing-right">
                                      Deployment Start date. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_start_date]"  type="date" value="" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="form-type col-lg-6 spacing-right">
                                      Deployment End date. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_end_date]"  type="date" value="" placeholder="..." style="width: 100%;">
                                      <div id="deploymentEndDateError" style="color: red;"></div>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <div class="form-type col-lg-6 spacing-right">
                                      Deployment Start time. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_start_time]"  type="time" value="" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="form-type col-lg-6 spacing-right">
                                      Deployment End time. <br> <input class="form-control"  name="customermanpowers[${accordionCount - 1}][man_end_time]"  type="time" value="" placeholder="..." style="width: 100%;">
                                      <div id="deploymentEndTimeError" style="color: red;"></div>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <div class="form-type col-lg-6 spacing-right">
                                      Quantity. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_quan]"  type="text" value="" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="form-type col-lg-6 spacing-right">
                                      Duty Hours. <br> <input class="form-control"  name="customermanpowers[${accordionCount - 1}][man_hours]"  type="text" value="" placeholder="..." style="width: 100%;">
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <div class="form-type col-lg-6 spacing-right">
                                      Post Orders / JD of Guard Post. <br>
                                      <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_jd_attach]"  type="file" value="" placeholder="..." style="width: 100%;">
                                          <div class="col-lg-5 spacing-right">
                                              <div class="image-preview42" id="imagePreview42">
                                                  @if($manpowers->man_jd_attach)
                                                    <img src="{{ asset($manpowers->man_jd_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                  @else
                                                    <img src ="{{asset('noimage.jpg')}}"  alt="no image" width="70px" height="70px">
                                                  @endif
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-type col-lg-6 spacing-right">
                                      Any Special Instructions. <br>
                                      <textarea class="form-control" id="w3review5" name="customermanpowers[${accordionCount - 1}][man_any_sp]" type="notes" oninput="trimSpaces5()" onclick="moveCursorToStart5()"  placeholder="..." style="width: 100%;"></textarea>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <div class="form-type col-lg-6 spacing-right">
                                          Approved Leaves. <br> <input class="form-control"name="customermanpowers[${accordionCount - 1}][man_apr_l]"  value="" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="form-type col-lg-6 spacing-right">
                                          Salary of total days. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_salary]"  value="" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                  </div>
                              </div>
                              </div>
                              <div style="width: 50%;">
                                  <button class="btn btn-primary removeAccordion" type="button">Remove</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          `;

      $('#manpowerAccordion').append(newAccordion);
    });

    // Remove Accordion Button Click Event
    $(document).on('click', '.removeAccordion', function () {
      $(this).closest('.accordion-item').remove();
    });
  });
</script>
<script>
  function initAutocomplete() {
    var input = document.getElementById('location-input');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
      document.getElementById('latitude').value = place.geometry.location.lat();
      document.getElementById('longitude').value = place.geometry.location.lng();
    });
  }
</script>
<script>
  function initAutocomplete1() {
    var input = document.getElementById('location-input1');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
      document.getElementById('latitude1').value = place.geometry.location.lat();
      document.getElementById('longitude1').value = place.geometry.location.lng();
    });
  }
</script>
<script>
  function initAutocomplete2() {
    var input = document.getElementById('location-input2');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
      document.getElementById('latitude2').value = place.geometry.location.lat();
      document.getElementById('longitude2').value = place.geometry.location.lng();
    });
  }
</script>
<script>
  function initAutocomplete3() {
    var input = document.getElementById('location-input3');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
      document.getElementById('latitude3').value = place.geometry.location.lat();
      document.getElementById('longitude3').value = place.geometry.location.lng();
    });
  }
</script>
<script>
  function initAutocomplete4() {
    var input = document.getElementById('location-input4');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
      document.getElementById('latitude4').value = place.geometry.location.lat();
      document.getElementById('longitude4').value = place.geometry.location.lng();
    });
  }
</script>
<script>
  function initAutocomplete5() {
    var input = document.getElementById('location-input5');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
      document.getElementById('latitude5').value = place.geometry.location.lat();
      document.getElementById('longitude5').value = place.geometry.location.lng();
    });
  }
</script>
<script>
  function initAutocomplete6() {
    var input = document.getElementById('location-input6');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
      document.getElementById('latitude6').value = place.geometry.location.lat();
      document.getElementById('longitude6').value = place.geometry.location.lng();
    });
  }
</script>
<script>
  function initAutocomplete7() {
    var input = document.getElementById('location-input7');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
      document.getElementById('latitude7').value = place.geometry.location.lat();
      document.getElementById('longitude7').value = place.geometry.location.lng();
    });
  }
</script>
<script>
  google.maps.event.addDomListener(window, 'load', initAutocomplete);
</script>
{{-- /////// scripts for score cards total number calculation \\\\\\\\\\\ --}}
{{-- for row 1 --}}
<script>
  // Function to calculate and update the result field
  function updateResult() {
    var total = 0;

    // Loop through each input field with the class 'mark-input'
    $('.mark-input1').each(function () {
      // Parse the value as a number, default to 0 if NaN
      var value = parseFloat($(this).val()) || 0;

      // Add the value to the total
      total += value;
    });

    // Update the 'marks1_tm1' field with the calculated total
    $('#result1').val(total);
  }

  // Bind the updateResult function to the input fields' input event
  $('.mark-input1').on('input', updateResult);
</script>
{{-- for row 2 --}}
<script>
  // Function to calculate and update the result field
  function update2Result() {
    var total = 0;

    // Loop through each input field with the class 'mark-input'
    $('.mark-input2').each(function () {
      // Parse the value as a number, default to 0 if NaN
      var value = parseFloat($(this).val()) || 0;

      // Add the value to the total
      total += value;
    });

    // Update the 'marks1_tm1' field with the calculated total
    $('#result2').val(total);
  }

  // Bind the updateResult function to the input fields' input event
  $('.mark-input2').on('input', update2Result);
</script>
{{-- for row 3 --}}
<script>
  // Function to calculate and update the result field
  function update3Result() {
    var total = 0;

    // Loop through each input field with the class 'mark-input'
    $('.mark-input3').each(function () {
      // Parse the value as a number, default to 0 if NaN
      var value = parseFloat($(this).val()) || 0;

      // Add the value to the total
      total += value;
    });

    // Update the 'marks1_tm1' field with the calculated total
    $('#result3').val(total);
  }

  // Bind the updateResult function to the input fields' input event
  $('.mark-input3').on('input', update3Result);
</script>
{{-- for row 4 --}}
<script>
  // Function to calculate and update the result field
  function update4Result() {
    var total = 0;

    // Loop through each input field with the class 'mark-input'
    $('.mark-input4').each(function () {
      // Parse the value as a number, default to 0 if NaN
      var value = parseFloat($(this).val()) || 0;

      // Add the value to the total
      total += value;
    });

    // Update the 'marks1_tm1' field with the calculated total
    $('#result4').val(total);
  }

  // Bind the updateResult function to the input fields' input event
  $('.mark-input4').on('input', update4Result);
</script>
{{-- for row 5 --}}
<script>
  // Function to calculate and update the result field
  function update5Result() {
    var total = 0;

    // Loop through each input field with the class 'mark-input'
    $('.mark-input5').each(function () {
      // Parse the value as a number, default to 0 if NaN
      var value = parseFloat($(this).val()) || 0;

      // Add the value to the total
      total += value;
    });

    // Update the 'marks1_tm1' field with the calculated total
    $('#result5').val(total);
  }

  // Bind the updateResult function to the input fields' input event
  $('.mark-input5').on('input', update5Result);
</script>
{{-- for row 6 --}}
<script>
  // Function to calculate and update the result field
  function update6Result() {
    var total = 0;

    // Loop through each input field with the class 'mark-input'
    $('.mark-input6').each(function () {
      // Parse the value as a number, default to 0 if NaN
      var value = parseFloat($(this).val()) || 0;

      // Add the value to the total
      total += value;
    });

    // Update the 'marks1_tm1' field with the calculated total
    $('#result6').val(total);
  }

  // Bind the updateResult function to the input fields' input event
  $('.mark-input6').on('input', update6Result);
</script>
{{-- for row 7 --}}
<script>
  // Function to calculate and update the result field
  function update7Result() {
    var total = 0;

    // Loop through each input field with the class 'mark-input'
    $('.mark-input7').each(function () {
      // Parse the value as a number, default to 0 if NaN
      var value = parseFloat($(this).val()) || 0;

      // Add the value to the total
      total += value;
    });

    // Update the 'marks1_tm1' field with the calculated total
    $('#result7').val(total);
  }

  // Bind the updateResult function to the input fields' input event
  $('.mark-input7').on('input', update7Result);
</script>
{{-- for grand total --}}
<script>
  // Function to update the grand total
  function updateGrandTotal() {
    var grandTotal = 0;

    // Loop through each set
    for (var i = 1; i <= 7; i++) {
      // Loop through each mark-input field in the set
      $('[class^=mark-input' + i + ']').each(function () {
        var value = parseFloat($(this).val()) || 0;
        grandTotal += value;
      });
    }

    // Update the 'marks_grand_total' field with the calculated grand total
    $('#grandTotal').val(grandTotal);
  }

  // Function to update the Total Marks fields and trigger the grand total update
  function updateTotalMarks(setNumber) {
    var totalMarks = 0;

    // Loop through each mark-input field in the set
    $('[class^=mark-input' + setNumber + ']').each(function () {
      var value = parseFloat($(this).val()) || 0;
      totalMarks += value;
    });

    // Update the 'result' field in the set with the calculated total marks
    $('#result' + setNumber).val(totalMarks);

    // Trigger the grand total update
    updateGrandTotal();
  }

  // Bind the updateTotalMarks function to the input event for all mark-input fields
  $('[class^=mark-input]').on('input', function () {
    // Extract the set number from the field's class
    var setNumber = this.className.match(/\d+/)[0];
    updateTotalMarks(setNumber);
  });
</script>
{{-- Script for Feedback, which adds radio button values and stores to total score field --}}
<script>
  // Function to calculate and update the Total Score
  function updateTotalScore(accordionId) {
    var totalScore = 0;

    // Loop through radio buttons in the current accordion
    $('#' + accordionId + ' input[type="radio"]:checked').each(function () {
      // Add the value of the selected radio button to the total score
      totalScore += parseInt($(this).val(), 10);
    });

    // Update the corresponding 'total_score' input field for the accordion
    $('#' + accordionId + ' input[name="total_score[]"]').val(totalScore);
  }

  // Bind the updateTotalScore function to the change event for all radio buttons
  $(document).on('change', 'input[type="radio"]', function () {
    var accordionId = $(this).closest('.feedbackaccordion-item').attr('id');
    updateTotalScore(accordionId);
  });

  // Initial calculation when the page is fully loaded
  $(document).ready(function () {
    // Loop through each existing accordion to calculate total score
    $('.feedbackaccordion-item').each(function () {
      var accordionId = $(this).attr('id');
      updateTotalScore(accordionId);
    });
  });
</script>
{{-- Script for Feedback, which adds radio button values and stores to total score field --}}
<script>
  // Function to calculate and update the Total Score
  function updateTotalScore(accordionId) {
    var totalScore = 0;

    // Loop through radio buttons in the current accordion
    $('#' + accordionId + ' input[type="radio"]:checked').each(function () {
      // Add the value of the selected radio button to the total score
      totalScore += parseInt($(this).val(), 10);
    });

    // Update the corresponding 'total_score' input field for the accordion
    $('#' + accordionId + ' input[name="total_score[]"]').val(totalScore);
  }

  // Bind the updateTotalScore function to the change event for all radio buttons
  $(document).on('change', 'input[type="radio"]', function () {
    var accordionId = $(this).closest('.feedbackaccordion-item').attr('id');
    updateTotalScore(accordionId);
  });

  // Initial calculation when the page is fully loaded
  $(document).ready(function () {
    // Loop through each existing accordion to calculate total score
    $('.feedbackaccordion-item').each(function () {
      var accordionId = $(this).attr('id');
      updateTotalScore(accordionId);
    });
  });
</script>
<script>
  // Function to calculate and update the Total Score
  function updateTotalScore(accordionId) {
    var totalScore = 0;

    // Loop through radio buttons in the current accordion
    $('#' + accordionId + ' input[type="radio"]:checked').each(function () {
      // Add the value of the selected radio button to the total score
      totalScore += parseInt($(this).val(), 10);
    });

    // Update the corresponding 'total_score' input field for the accordion
    $('#' + accordionId + ' input[name="total_score[]"]').val(totalScore);
  }

  // Bind the updateTotalScore function to the change event for all radio buttons
  $(document).on('change', 'input[type="radio"]', function () {
    var accordionId = $(this).closest('.feedbackaccordion-item').attr('id');
    updateTotalScore(accordionId);
  });

  // Initial calculation when the page is fully loaded
  $(document).ready(function () {
    // Loop through each existing accordion to calculate total score
    $('.feedbackaccordion-item').each(function () {
      var accordionId = $(this).attr('id');
      updateTotalScore(accordionId);
    });
  });
</script>
<script>
  $(document).ready(function () {
    // Add code to update summary table
    function updateFeedbackSummaryTable() {
      // Clear existing rows
      $('#feedbackSummaryTable tbody').empty();
      $('.feedbackaccordion-item').each(function (index) {
        var fName = $(this).find('[name="feed_client_name[]"]').val();
        var fPocN = $(this).find('[name="feed_client_poc_name[]"]').val();
        var fEmail = $(this).find('[name="feed_client_email[]"]').val();
        $('#feedbackSummaryTable tbody').append(`
                  <tr>
                      <td>${index + 1}</td>
                      <td>${fName}</td>
                      <td>${fPocN}</td>
                      <td>${fEmail}</td>
                      <td><button class="btn btn-primary view-button-12" style="height:30px; width:90px;" data-index="${index}">View</button></td>
                  </tr>
              `);
      });
    }

    // Add More Button Click Event
    $('#addFeedback').on('click', function () {
      updateFeedbackSummaryTable();
    });

    // Remove Accordion Button Click Event
    $(document).on('click', '.removeFeedbackAccordion', function () {
      $(this).closest('.feedbackaccordion-item').remove();

      // Add code to update summary table
      updateFeedbackSummaryTable();
    });

    $(document).on('click', '.view-button-12', function () {
      event.preventDefault();
      var index = $(this).data('index');
      var accordionItem = $('.feedbackaccordion-item').eq(index);
      var accordionButton = accordionItem.find('[data-toggle="collapse"]');

      // Toggle open the accordion section
      accordionButton.trigger('click');
    });
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function () {

    function calculateTotal(container) {
      let total = 0;

      container.find('input[type="radio"]:checked').each(function () {
        total += parseInt($(this).val()) || 0;
      });

      container.find('.totalScore').val(total);
    }

    $(document).on('change', 'input[type="radio"]', function () {
      let container = $(this).closest('.accordion-body');
      calculateTotal(container);
    });

    $('.accordion-body').each(function () {
      calculateTotal($(this));
    });

  });
  function openFileModal(element) {

    let file = element.getAttribute('data-file');
    let ext = element.getAttribute('data-extension').toLowerCase();

    let content = '';

    if (['jpg','jpeg','png','gif','webp'].includes(ext)) {
        content = `<img src="${file}" style="width:100%">`;

    } else if (['mp4','webm'].includes(ext)) {
        content = `<video controls style="width:100%">
                        <source src="${file}">
                   </video>`;

    } else if (ext === 'pdf') {
        content = `<iframe src="${file}" width="100%" height="500px"></iframe>`;

    } else {
        content = `<a href="${file}" target="_blank">Download File</a>`;
    }

    document.getElementById('fileModalContent').innerHTML = content;

    let modal = new bootstrap.Modal(document.getElementById('fileModal'));
    modal.show();
}
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>