@include('layouts.header') @yield('main')
<div class="customer_form">
  @include('headerlogout')

  <div style="display:flex; column-gap:10px; align-items:center">
    <button type="button" class="btn btn-link" onclick="history.back()">
      <i class="bi bi-arrow-left"></i>
     </button>
    <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;"> Training Form
    </h4>
  </div>
  <!-- <div class="modal-body"> -->
  <section>
    <form action="{{ route('update_train', ['id' => $trainings->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf @method('PUT')
      <div class="row">

        <div class="row mb-2" style="margin-left: 10px;">
          <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
            <h5>Training Activation Status</h5>

            <div class="form-check form-check-inline" style="margin-right: 90px;">
              <input class="form-check-input mr-2" type="radio" name="training_activation" {{ $trainings->training_activation == '1' ? 'checked' : '' }}
                value="1" id="activeRadio">
              <label class="form-check-label" for="activeRadio">Active</label>

              <input class="form-check-input ml-3 mr-2" type="radio" name="training_activation" {{ $trainings->training_activation == '0' ? 'checked' : '' }}
                value="0" id="inactiveRadio">
              <label class="form-check-label" for="inactiveRadio">Inactive</label>
            </div>
          </div>
        </div>
      </div>

      <!--Training/ Main Form-->
      <div class="row" style="font-weight:600;">
        <div class="justify-content-between d-flex mb-5 align-items-center">
          <h5> Training Details </h5>

        </div>
        <div class="col-lg-6 spacing-right">
          <div class="row mb-2">
            <div class="col-lg-10 spacing-right">
              Training Number
              <br>
              <input class="form-control" id="training_no" name="training_no" value="{{$trainings->training_no}}" type="text" placeholder="..."
                style="width: 100%;">
            </div>

          </div>
          <div class="row mb-2">
            <div class="col-lg-10 spacing-right">
              Training Region
              <br>
              <input class="form-control" id="training_region" name="training_region" id="training_region" value="{{$trainings->training_region}}" type="text"
                placeholder="..." style="width: 97%;">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Venue
              <br>
              <input class="form-control" name="venue" id="venue" value="{{$trainings->venue}}" type="text" placeholder="..." style="width: 100%;">
            </div>
            <div class="col-lg-5 spacing-left">
              Name of Range
              <br>
              <input class="form-control" name="name_of_range" id="name_of_range" value="{{$trainings->name_of_range}}" type="text" placeholder="..."
                style="width: 100%;">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Training Start Date
              <br>
              <input class="form-control" name="training_s_date" id="training_s_date" value="{{$trainings->training_s_date}}" type="date" placeholder="..."
                style="width: 100%;">
            </div>
            <div class="col-lg-5 spacing-left">
              Training End Date
              <br>
              <input class="form-control" name="training_e_date" value="{{$trainings->training_e_date}}" type="date" placeholder="..." style="width: 100%;">
            </div>
          </div>
          <div class="row mb-2">

            <div class="col-lg-5 spacing-right">
              Training Start Time
              <br>
              <input class="form-control" name="training_s_time" value="{{$trainings->training_s_time}}" type="time" placeholder="..." style="width: 100%;">
            </div>

            <div class="col-lg-5 spacing-left">
              Training End Time
              <br>
              <input class="form-control" name="training_e_time" value="{{$trainings->training_e_time}}" type="time" placeholder="..." style="width: 100%;">
            </div>
          </div>
          <div class="row mb-2">

            <div class="col-lg-5 spacing-right">
              Time of Guest Invitation
              <br>
              <input class="form-control" name="guest_invitation" id="guest_invitation" value="{{$trainings->guest_invitation}}" type="time" placeholder="..."
                style="width: 100%;">
            </div>

            <div class="col-lg-5 spacing-left">
              Registration Deadline (Date)
              <br>
              <input class="form-control" name="reg_date" id="reg_date" value="{{$trainings->reg_date}}" type="date" placeholder="..." style="width: 100%;">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-10 spacing-right">
              Registration Deadine (Time)
              <br>
              <input class="form-control" name="reg_time" id="reg_time" value="{{$trainings->reg_time}}" type="time" placeholder="..." style="width: 97%%;">
            </div>
          </div>

          <h5>Address</h5>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Office No
              <br>
              <input class="form-control" id="" name="office_no" value="{{$trainings->office_no}}" type="text" placeholder="..." style="width: 100%;">
            </div>
            <div class="col-lg-5 spacing-left">
              Floor
              <br>
              <input class="form-control" id="" name="floor" value="{{$trainings->floor}}" type="text" placeholder="..." style="width: 100%;">
            </div>

          </div>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Building
              <br>
              <input class="form-control" id="" name="building" value="{{$trainings->building}}" type="text" placeholder="..." style="width: 100%;">
            </div>
            <div class="col-lg-5 spacing-left">
              Block
              <br>
              <input class="form-control" id="" name="block" value="{{$trainings->block}}" type="text" placeholder="..." style="width: 100%;">
            </div>

          </div>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Area
              <br>
              <input class="form-control" id="" name="area" value="{{$trainings->area}}" type="text" placeholder="..." style="width: 100%;">
            </div>
            <div class="col-lg-5 spacing-left">
              City
              <br>
              <input class="form-control" id="" name="city" value="{{$trainings->city}}" type="text" placeholder="..." style="width: 100%;">
            </div>

          </div>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Photograph of Building
              <br>
              <input class="form-control" id="" name="photo" value="{{$trainings->photo}}" type="file" placeholder="..." style="width: 100%;">
              <div class="col-lg-5 spacing-right">
                <!-- Image Preview Biometric -->
                <div class="image-preview42" id="imagePreview42">
                  @if($trainings->photo)
                  <img src="{{ asset($trainings->photo) }}" alt="Image Preview42" class="image-preview__image42"
                    style="height: 100%; width:100%; margin-left:-13px;"> @else
                  <span class="image-preview__default-text42">Image Preview</span> @endif
                </div>
              </div>
            </div>
            <div class="col-lg-5 spacing-left">
              Email
              <br>
              <input class="form-control" id="" name="email" type="text" value="{{$trainings->email}}" placeholder="..." style="width: 100%;">
            </div>

          </div>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Website
              <br>
              <input class="form-control" id="" name="website" value="{{$trainings->website}}" type="text" placeholder="..." style="width: 100%;">
            </div>
            <div class="col-lg-5 spacing-left">
              Pin location
              <br>
              <input class="form-control" id="location-input" name="pin" value="{{$trainings->pin}}" type="text" placeholder="..." style="width: 100%;"
                onfocus="initAutocomplete()">
            </div>
          </div>
        </div>

        <div class="col-lg-6 spacing-left">
          <h5>Details of CRO :</h5>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Name of CRO
              <br>
              <input class="form-control" name="cro_name" value="{{$trainings->cro_name}}" type="text" placeholder="..." style="width: 100%;">
            </div>
            <div class="col-lg-5 spacing-left">
              Cell No. of CRO
              <br>
              <input class="form-control" name="cro_cell" value="{{$trainings->cro_cell}}" type="text" placeholder="..." style="width: 100%;">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Email of CRO
              <br>
              <input class="form-control" name="email_cro" value="{{$trainings->email_cro}}" type="text" placeholder="..." style="width: 100%;">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Organized by(RHQ)
              <br>
              <input class="form-control" name="organized_by" value="{{$trainings->organized_by}}" type="text" placeholder="..." style="width: 100%;">
            </div>
            <div class="col-lg-5 spacing-left">
              Branch
              <br>
              <input class="form-control" name="branch" value="{{$trainings->branch}}" type="text" placeholder="..." style="width: 100%;">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Demo of Video Clip
              <br>
              <input class="form-control" name="demo" value="{{$trainings->demo}}" type="file" placeholder="..." style="width: 100%;">
            </div>
            <div class="col-lg-5 spacing-left">
              Traiing Duration
              <br>
              <input class="form-control" name="duration" value="{{$trainings->duration}}" type="text" placeholder="..." style="width: 100%;">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-10 spacing-right">
              Booking Request
              <br>
              <input class="form-control" name="booking_attach" value="{{$trainings->booking_attach}}" type="file" placeholder="..." style="width: 97%;">
            </div>
          </div>
          <div class="row mb-2">

            <div class="col-lg-5 spacing-right mb-3">
              All Types Covered
              <br>
              <select id="staff_category" class="form-control" name="all_types_covered" style="width: 100%;">
                <option value="Yes" {{ $trainings->all_types_covered == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value="No" {{ $trainings->all_types_covered == 'No' ? 'selected' : '' }}>No</option>
              </select>
            </div>
            <div class="col-lg-5 spacing-right mb-3">
              Reports Submitted
              <br>
              <select class="form-control" name="reports_submitted" style="width: 94%;">
                <option value="Yes" {{ $trainings->reports_submitted == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value="No" {{ $trainings->reports_submitted == 'No' ? 'selected' : '' }}>No</option>
              </select>
            </div>

          </div>
        </div>
      </div>

      <!--Tabs forDetails-->

      <nav>
        <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#correnpondence" role="tab" aria-controls="nav-home"
            aria-selected="true">Correspondence</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#budgets" role="tab" aria-controls="nav-profile"
            aria-selected="false">Budgets</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#training" role="tab" aria-controls="nav-profile"
            aria-selected="false">Traning modules</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#weapons" role="tab" aria-controls="nav-contact"
            aria-selected="false">Weapons and Ammunition</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#facility" role="tab" aria-controls="nav-contact"
            aria-selected="false">Facility Management</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#findings" role="tab" aria-controls="nav-contact"
            aria-selected="false">Findings</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#online-training" role="tab" aria-controls="nav-contact"
            aria-selected="false">Online Training</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#range" role="tab" aria-controls="nav-contact"
            aria-selected="false">Training Range POC</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#check" role="tab" aria-controls="nav-contact"
            aria-selected="false">Checklist of Organizing Training</a>
        </div>
      </nav>


      <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
        <!--correnpondence-->
        <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="correnpondence" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="row">
            <div class="col-lg-12 spacing-right">
              <div class="row mb-2">
                <div class="col-lg-3 spacing-right">
                  Booking Request Number
                  <br>
                  <input class="form-control" type="text" name="booking_request" value="{{$trainings->booking_request}}" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 spacing-right ">
                  Date of Range Allocation Letter

                  <input class="form-control" name="date_allocation_letter" value="{{$trainings->date_allocation_letter}}" type="date" placeholder="..."
                    style="width: 100%;">
                </div>

                <div class="col-lg-3 spacing-right">
                  Range Allocation Letter
                  <input class="form-control" type="file" name="range_allocation_attach" value="{{$trainings->range_allocation_attach}}" placeholder="..."
                    style="width: 100%;">
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="image-preview42" id="imagePreview42">
                      @if($trainings->range_allocation_attach)
                      <img src="{{ asset($trainings->range_allocation_attach) }}" alt="Image Preview42" class="image-preview__image42"
                        style="height: 100%; width:100%; margin-left:-13px;"> @else
                      <span class="image-preview__default-text42">Image Preview</span> @endif
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 spacing-right">
                  Booking Request Date
                  <br>
                  <input class="form-control" type="date" name="booking_request_date" value="{{$trainings->booking_request_date}}" placeholder="..."
                    style="width: 100%;">
                </div>

                <div class="col-lg-3 spacing-right">
                  Copy of Booking Request
                  <br>
                  <input class="form-control" type="file" name="copy_booking_attach" value="{{$trainings->copy_booking_attach}}" placeholder="..."
                    style="width: 100%;">
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="image-preview42" id="imagePreview42">
                      @if($trainings->copy_booking_attach)
                      <img src="{{ asset($trainings->copy_booking_attach) }}" alt="Image Preview42" class="image-preview__image42"
                        style="height: 100%; width:100%; margin-left:-13px;"> @else
                      <span class="image-preview__default-text42">Image Preview</span> @endif
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 spacing-right">
                  Guard of Respective Date
                  <br>
                  <input class="form-control" type="file" name="guard_resp_attach" value="{{$trainings->guard_resp_attach}}" placeholder="..."
                    style="width: 100%;">
                  <div class="col-lg-5 spacing-right">
                    <!-- Image Preview Biometric -->
                    <div class="image-preview42" id="imagePreview42">
                      @if($trainings->guard_resp_attach)
                      <img src="{{ asset($trainings->guard_resp_attach) }}" alt="Image Preview42" class="image-preview__image42"
                        style="height: 100%; width:100%; margin-left:-13px;"> @else
                      <span class="image-preview__default-text42">Image Preview</span> @endif
                    </div>
                  </div>
                </div>


                <h5 class="mt-2">Invitation :</h5>
                <div class="col-lg-4 spacing-right mt-1">
                  Send Email to all active Customers of Respective Region
                  <div class="form-check form-check-inline">
                    <input class="form-check-input ml-2 pt-1" type="checkbox" name="email_active_check" {{ $trainings->email_active_check ? 'checked' : '' }}
                      id="send-to-active" value="option1">
                  </div>
                  <br>
                  <div id="send-active-options" style="display: none;">
                    Send Emails to all active Customers .?
                    <br>
                    <select class="form-control" name="send_email_active" style="width: 100%;">
                      <option value=""></option>
                      <option value="Yes" id="activecustomer">Yes</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4 spacing-right mt-3">
                  Send Email to all Inactive Customers of Respective Region
                  <div class="form-check form-check-inline">
                    <input class="form-check-input ml-2 pt-1" type="checkbox" name="email_inactive_check"
                      {{ $trainings->email_inactive_check ? 'checked' : '' }} id="send-to-inactive" value="option1">
                  </div>
                  <br>
                  <div id="send-inactive-options" style="display: none;">
                    Send Emails to all Inactive Customers .?
                    <br>
                    <select class="form-control" name="send_email_inactive" style="width: 100%;">
                      <option value=""></option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-4 spacing-right mt-3">
                  Send Email to all Prospects of Respective Region
                  <div class="form-check form-check-inline">
                    <input class="form-check-input ml-2 pt-1" name="email_all_check" {{ $trainings->email_all_check ? 'checked' : '' }} type="checkbox"
                      id="send-to-region" value="option1">
                  </div>
                  <br>
                  <div id="send-email-options" style="display: none;">
                    Send Emails to all Prospects .?
                    <br>
                    <input class="form-control" type="text" name="send_email_all" value="{{$trainings->send_email_all}}" placeholder="..." style="width: 100%;">
                  </div>
                </div>
                <h5 class="mt-2">Guards Participating in the Training :</h5>
                <div class="col-lg-4 spacing-right mt-3">
                  Guards of Respective Region
                  <div class="form-check form-check-inline">
                    <input class="form-check-input ml-2 pt-1" name="guards_respective" id="guards_respective_checkbox"
                      {{ $trainings->guards_respective ? 'checked' : '' }} type="checkbox" value="option1">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="table-responsive mt-2" id="activeTableContainer" style="display: none;">
                    <div style="height: 380px; overflow-y: auto;">
                      <table class="table table-bordered table-striped table-fixed">
                        <thead>
                          <tr>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>City Of Deployment</th>
                            <th>Customers Region</th>
                            <th>Action</th>
                            <th>
                              <input type="checkbox" id="select-all-checkbox"> Select All
                            </th>

                            <button class="mb-3" style="float: right;" type="button" id="send-all-button">Send Email to Selected
                              Users</button>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($activeCustomerRecords as $active)
                          <tr>
                            <td>{{ $active->customers_name }}</td>
                            <td>{{ $active->email }}</td>
                            <td>{{ $active->city_of_deployment }}</td>
                            <td>{{ $active->customers_region }}</td>
                            <td>
                              <a href="{{ route('viewcustomer', $active->id) }}">View Details</a>
                            </td>
                            <td>
                              <input type="checkbox" data-customerName="{{ $active->customers_name }}" data-customer-id="{{ $active->id }}"
                                data-customer-email="{{ $active->email }}" class="active_customer_check" value="" style="margin-left: 30%;">
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div id="customModal" class="modal"
                      style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60%; max-width: 1000px; height: 70%; max-height: 1000px; background-color: rgba(0, 0, 0, 0.5);">
                      <div class="modal-content"
                        style="position: relative; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); display: flex; flex-direction: column; align-items: center;">
                        <span class="close" id="cancel-send-email"
                          style="position: absolute; top: 10px; right: 10px; font-size: 20px; cursor: pointer;">&times;</span>
                        <p>Are you sure you want to send an email?</p>

                        <div id="email-form">
                          <div style="width: 210%; margin-left:-55%;">
                            <label for="email-cc" style="width: 100px;">CC:</label>
                            <input type="text" id="email-cc" name="email-cc" style="width: calc(100% - 120px);">
                          </div>

                          <div style="width: 210%; margin-left:-55%;">
                            <label for="email-bcc" style="width: 100px;">BCC:</label>
                            <input type="text" id="email-bcc" name="email-bcc" style="width: calc(100% - 120px);">
                          </div>

                          <div style="width: 210%; margin-left:-55%;">
                            <label for="email-subject" style="width: 100px;">Email Subject:</label>
                            <input type="text" id="email-subject" name="email-subject" value="LIVE FIRE ARM TRAINING" style="width: calc(100% - 120px);">
                          </div>
                          <div style="width: 210%; margin-left:-55%">
                            <label for="email-body" style="width: 100px;">Email Body:</label>
                            <textarea id="email-body" name="email-body" rows="10" style="width: calc(100% - 120px);">[Your email body here]</textarea>
                          </div>
                          <input type="file" id="customEmailAttachment" name="customEmailAttachment" accept="image/*">
                          <div style="display: flex; gap: 10px; justify-content: center;">
                            <button type="button" id="confirm-send-email">Yes, Send Email</button>
                            <button type="button" id="cancel-send-email">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="table-responsive mt-2" id="inactiveTableContainer" style="display: none;">
                    <div style="height: 380px; overflow-y: auto;">
                      <table class="table table-bordered table-striped table-fixed">
                        <thead>
                          <tr>
                            <th>In-Active Customer Name</th>
                            <th>In-Active Customer Email</th>
                            <th>City Of Deployment</th>
                            <th>In-Active Customers Region</th>
                            <th>Action</th>
                            <th>
                              <input type="checkbox" id="select-all-inactive-checkbox"> Select All
                            </th>
                            <button class="mb-3" style="float: right;" type="button" id="send-inactive-button">Send Email to
                              Selected Users</button>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($inactiveCustomerRecords as $inactive)
                          <tr>
                            <td>{{ $inactive->customers_name }}</td>
                            <td>{{ $inactive->email }}</td>
                            <td>{{ $inactive->city_of_deployment }}</td>
                            <td>{{ $inactive->customers_region }}</td>
                            <td>
                              <a href="{{ route('viewcustomer', $inactive->id) }}">View Details</a>
                            </td>
                            <td>
                              <input type="checkbox" data-customer-id="{{ $inactive->id }}" data-customer-email="{{ $inactive->email }}"
                                class="inactive_customer_check" value="" style="margin-left: 30%;">
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div id="inactiveCustomModal" class="modal"
                      style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60%; max-width: 1000px; height: 70%; max-height: 1000px; background-color: rgba(0, 0, 0, 0.5);">
                      <div class="modal-content"
                        style="position: relative; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); display: flex; flex-direction: column; align-items: center;">
                        <span class="close" id="inactive-cancel-send-email"
                          style="position: absolute; top: 10px; right: 10px; font-size: 20px; cursor: pointer;">&times;</span>
                        <p>Are you sure you want to send an email?</p>
                        <div id="inactive-email-form">
                          <div style="width: 210%; margin-left:-55%;">
                            <label for="inactive-email-cc" style="width: 100px;">CC:</label>
                            <input type="text" id="inactive-email-cc" name="inactive-email-cc" style="width: calc(100% - 120px);">
                          </div>
                          <div style="width: 210%; margin-left:-55%;">
                            <label for="inactive-email-bcc" style="width: 100px;">BCC:</label>
                            <input type="text" id="inactive-email-bcc" name="inactive-email-bcc" style="width: calc(100% - 120px);">
                          </div>
                          <div style="width: 210%; margin-left:-55%;">
                            <label for="inactive-email-subject" style="width: 100px;">Email Subject:</label>
                            <input type="text" id="inactive-email-subject" name="inactive-email-subject" value="LIVE FIRE ARM TRAINING"
                              style="width: calc(100% - 120px);">
                          </div>
                          <div style="width: 210%; margin-left:-55%">
                            <label for="inactive-email-body" style="width: 100px;">Email Body:</label>
                            <textarea id="inactive-email-body" name="inactive-email-body" rows="10"
                              style="width: calc(100% - 120px);">[Your email body here]</textarea>
                          </div>
                          <div style="width: 210%; margin-left:-55%;">
                            <label for="inactive-email-attachment" style="width: 100px;">Attachments:</label>
                            <input type="file" id="custominactiveEmailAttachment" name="custominactiveEmailAttachment" style="width: calc(100% - 120px);"
                              accept="image/*">
                          </div>

                          <div style="display: flex; gap: 10px; justify-content: center;">
                            <button type="button" id="inactive-confirm-send-email">Yes, Send Email</button>
                            <button type="button" id="inactive-cancel-send-email">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <style>
                  *:focus {
                        outline: none;
                      }

                      .select2-container--default .select2-results__option--selected {
                           background-color: #fff;
                               /* color: #0039cb; */
                      }

                      /* CheckBox CSS Style START */
                      .styled-input {
                               position: relative;
                               padding: 10px 0 10px 40px;
                               text-align: left;
                              }

                              .styled-input label {
                                   cursor: pointer;
                                  }

                                  .styled-input label:before,
                                  .styled-input label:after {
                                          content: "";
                                          position: absolute;
                                          top: 50%;
                                          border-radius: 50%;
                                  }

                                  .styled-input label:before {
                                                left: 0;
                                                 width: 25px;
                                                 height: 25px;
                                                 margin: -15px 0 0;
                                                 background: #f7f7f7;
                                              /* box-shadow: 0 0 1px grey; */
                                          }

                                      .styled-input label:after {
                                          left: 5px;
                                          width: 15px;
                                          height: 15px;
                                          margin: -10px 0 0;
                                          opacity: 0;
                                           background: #1f49b6;
                                           transform: translate3d(-40px, 0, 0) scale(0.5);
                                           transition: opacity 0.25s ease-in-out, transform 0.25s ease-in-out;
                                      }

                                  .styled-input input[type="checkbox"] {
                                        position: absolute;
                                        top: 0;
                                        left: -9999px;
                                        visibility: hidden;
                                          }

                                      .styled-input input[type="checkbox"]:checked + label {
                                        color: #1f49b6;
                                          }

                                          .styled-input input[type="checkbox"]:checked + label:after {
                                               transform: translate3d(0, 0, 0);
                                               opacity: 1;
                                              }

                                          .styled-input--square label:before,
                                          .styled-input--square label:after {
                                            border-radius: 3px;
                                      }
                </style>
                <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
                <div class="container">
                  <div class="row ">
                    <div class="col-lg-4  spacing-right  ">
                      List of Guards Participating in Training
                      <br>
                      <input class="form-control" type="file" name="list_guard_attach" value="{{$trainings->list_guard_attach}}" placeholder="..."
                        style="width: 100%;">
                      <div class="col-lg-5 spacing-right">
                        <!-- Image Preview Biometric -->
                        <div class="image-preview42" id="imagePreview42">
                          @if($trainings->list_guard_attach)
                          <img src="{{ asset($trainings->list_guard_attach) }}" alt="Image Preview42" class="image-preview__image42"
                            style="height: 100%; width:100%; margin-left:-13px;"> @else
                          <span class="image-preview__default-text42">Image Preview</span> @endif
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <script>
                  function formatState(state) {
                       if (!state.id) {
                                          return state.text;
                                        }
                                        let selected = "";
                                        if (state.selected) selected = "checked";
                                        // var $state = $(
                                        //     `<span><input type="checkbox" class="k-checkbox" id="checkbox-example" ${selected} /> ${state.text} </span>`
                                        // );
                                        var $state = $(
                                          `<div class="styled-input--square">
                                                      <div class="styled-input">
                                                          <input type="checkbox" class="k-checkbox" id="checkbox-example" ${selected} />
                                                          <label for="checkbox-example">${state.text}</label>
                                                      </div>
                                                  </div>`
                                        );
                                        return $state;
                                      }

                                      var Utils = $.fn.select2.amd.require("select2/utils");
                                      var Dropdown = $.fn.select2.amd.require("select2/dropdown");
                                      var DropdownSearch = $.fn.select2.amd.require("select2/dropdown/search");
                                      var CloseOnSelect = $.fn.select2.amd.require("select2/dropdown/closeOnSelect");
                                      var AttachBody = $.fn.select2.amd.require("select2/dropdown/attachBody");

                                      var dropdownAdapter = Utils.Decorate(
                                        Utils.Decorate(Utils.Decorate(Dropdown, DropdownSearch), CloseOnSelect),
                                        AttachBody
                                      );

                                      $(".js-example-templating")
                                        .select2({
                                          templateResult: formatState,
                                          placeholder: "Search ",
                                          multiple: true,
                                          dropdownAdapter: dropdownAdapter,
                                          minimumResultsForSearch: 0
                                          // maximumSelectionLength:2
                                        })
                                        .on("select2:opening select2:closing", function (event) {
                                          var searchfield = $(this).parent().find(".select2-search__field");
                                          searchfield.prop("disabled", true);
                                        });

                                      $(".js-example-templating").on("select2:select", function (e) {
                                        console.log("select id", e.params.data.id);
                                        var allData = [];
                                        // optionlarda ki tüm valueları dizinin içine al
                                        $(".js-example-templating option").each(function (i, e) {
                                          if ($(this).attr("value") != "-1") allData.push($(this).attr("value"));
                                        });
                                        console.log(allData);
                                        if (e.params.data.id === "-1") {
                                          let values = null;
                                          if ($(".js-example-templating").val().length == 1) values = allData;
                                          console.log($(".js-example-templating").val(), values, e.params.data.id);
                                          $(".js-example-templating").val(values).trigger("change");
                                          $(".js-example-templating").select2({
                                            templateResult: formatState,
                                            multiple: true
                                          });
                                        }
                                      });
                                      $(".js-example-templating").on("select2:unselect", function (e) {
                                        console.log("unselect id", e.params.data.id);
                                      });

                                      // $(".js-example-templating").on("select2:open", function (event) {
                                      //     console.log($(this))
                                      //     $('input.select2-search__field').attr('placeholder', 'please type something...');
                                      // });
                </script>
                <!--<h4 class="mt-3">Guards Associated with this Training : </h4>-->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
                <div class="table-responsive mt-2 " id="guardTableContainer" style="display: {{ $trainings->guards_respective ? 'block' : 'none' }}">
                  <div class="d-flex justify-content-end mb-4">
                    <button type="button" id="downloadTrainingPdf" class="btn btn-primary float-end"><i class="fa-solid fa-download"></i> PDF</button>
                  </div>
                  <div id="pdf-content" class="card p-3">
                    <div id="pdf-hidden-content" style="display: none;"></div>
                    <table id="usersTable" class="table table-bordered table-striped table-fixed">

                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Father Name</th>
                          <th>Employee Number</th>
                          <th>Region</th>
                          <th>Location</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($associatedGuards as $guard)
                        <tr>
                          <td>{{ $guard->name }}</td>
                          <td>{{ $guard->fname }}</td>
                          <td>{{ $guard->employee_no }}</td>
                          <td>{{ $guard->hrm_region }}</td>
                          <td>{{ $guard->hrm_location }}</td>
                          <td>
                            <a href="{{ route('viewhrm', $guard->id) }}">View Details</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>

                    </table>
                  </div>
                </div>
                <script>
                  document.getElementById('downloadPdfBtn').addEventListener('click', function (e) {
                      e.preventDefault();

                      const getValue = id => document.getElementById(id)?.value || 'N/A';
                      const getTime = name => document.querySelector(`input[name="${name}"]`)?.value || 'N/A';

                      // Training table HTML
                      const trainingTable = `
                          <table class="table table-bordered table-striped" style="width: 100%; border-collapse: collapse;" border="1">
                              <thead>
                                  <tr>
                                      <th>Training Number</th>
                                      <th>Training Region</th>
                                      <th>Venue</th>
                                      <th>Name of Range</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>${getValue('training_no')}</td>
                                      <td>${getValue('training_region')}</td>
                                      <td>${getValue('venue')}</td>
                                      <td>${getValue('name_of_range')}</td>
                                  </tr>
                              </tbody>
                          </table>
                          <br>
                      `;

                      // Clone guards table
                      const guardsTable = document.getElementById('usersTable')?.cloneNode(true);
                      guardsTable.style.width = "100%";
                      guardsTable.setAttribute("border", "1");
                      guardsTable.style.borderCollapse = "collapse";

                      // Create wrapper
                      const wrapper = document.createElement('div');
                      wrapper.innerHTML = trainingTable;
                      if (guardsTable) wrapper.appendChild(guardsTable);

                      // Add to hidden div and show it temporarily
                      const hiddenDiv = document.getElementById('pdf-hidden-content');
                      hiddenDiv.innerHTML = '';
                      hiddenDiv.style.display = 'block';
                      hiddenDiv.appendChild(wrapper);

                      // Generate PDF with full HD quality
                      setTimeout(() => {
                          html2pdf().from(hiddenDiv).set({
                              margin: [0.5, 0.5, 0.5, 0.5], // Top, left, bottom, right
                              filename: 'training_details_fullhd.pdf',
                              image: { type: 'jpeg', quality: 1.0 }, // Max image quality
                              html2canvas: {
                                  scale: 5,         // VERY high resolution
                                  useCORS: true     // Use if your content loads remote images
                              },
                              jsPDF: {
                                  unit: 'mm',
                                  format: [420, 297], // Custom size (A3 landscape) = Full HD area
                                  orientation: 'landscape'
                              }
                          }).save().then(() => {
                              hiddenDiv.style.display = 'none';
                          });
                      }, 100);
                  });
                </script>

    
</div>

</div>
</div>
</div>

</div>
<div>


<button type="submit">submit</button>
</form>

</section>



</body>

</html>
