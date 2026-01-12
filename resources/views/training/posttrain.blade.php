@include('layouts.header')
@yield('main')
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
  <section style="margin-bottom: 50px;">

    <form action="{{ route('submit_train') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">

        <div class="row mb-2" style="margin-left: 20px;">
          <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
            <h5>Training Activation Status</h5>

            <div class="form-check form-check-inline" style="margin-right: 90px;">
              <input class="form-check-input mr-2" type="radio" name="training_activation" value="1" id="activeRadio">
              <label class="form-check-label" for="activeRadio">Active</label>

              <input class="form-check-input ml-3 mr-2" type="radio" name="training_activation" value="0" id="inactiveRadio">
              <label class="form-check-label" for="inactiveRadio">Inactive</label>
            </div>
          </div>
        </div>

      </div>
      <div class="row" style="font-weight:600;">
        <div class="col-lg-6 spacing-right">
          <div class="row mb-2">
            <div class="col-lg-10 spacing-right">
                <label for="training_no">Training Number</label>
              <input class="form-control" id="training_no" name="training_no" type="text" placeholder="..." >
              <input type="hidden" id="last_used_number" value="79">
            </div>
          </div>
          <div class="col-lg-10 spacing-left form-group">
            Type of Training <br>
            <div class="input-group" style="width: 100%;">
              <select id="type_of_training" class="form-control" name="type_of_training" style="width: 70%; border-radius: 4px 0 0 4px; ">
                <option value=""></option>
                @foreach ($types as $type)
                <option value="{{ $type->code }}">{{ $type->type_name }}</option>
                @endforeach
              </select>
              <div class="input-group-append" style="width: 30%;">
                <a href="{{ route('type') }}">
                  <button class="btn btn-primary" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0;">Add</button>
                </a>
              </div>
            </div>
          </div>
            <script>
            document.getElementById('type_of_training').addEventListener('change', function () {
                const trainingNoInput = document.getElementById('training_no');
                const year = new Date().getFullYear();
                const selectedOption = this.options[this.selectedIndex];
                const typeName = selectedOption.textContent.trim();

                function getInitials(name) {
                    return name.split(' ').map(word => word.charAt(0).toUpperCase()).join('');
                }

                function generateTrainingNumber(number, initials) {
                    return `${year}-${number}/PSS/ISB/TOG/${initials}`;
                }

                function getRandomNumber() {
                    return Math.floor(Math.random() * 9000) + 1; // Generates 100 to 9099
                }

                async function checkAndGenerate() {
                    const initials = getInitials(typeName);
                    let trainingNumber;
                    let exists = true;
                    let attempts = 0;

                    while (exists && attempts < 100) {
                        const randomNumber = getRandomNumber();
                        trainingNumber = generateTrainingNumber(randomNumber, initials);
                        const response = await fetch(`/check-training-number/${encodeURIComponent(trainingNumber)}`);
                        const data = await response.json();
                        exists = data.exists;
                        attempts++;
                    }
                    if (!exists) {
                        trainingNoInput.value = trainingNumber;
                    } else {
                        alert("Could not generate a unique training number. Try again.");
                    }
                }

                if (typeName) {
                    checkAndGenerate();
                } else {
                    trainingNoInput.value = '';
                }
            });
            </script>

          <div class="row mb-2">
            <div class="col-lg-10 spacing-right">
              Training Region<br>
              <input class="form-control" id="training_region" name="training_region" type="text" placeholder="..." style="width: 97%;">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Venue<br>
              <input class="form-control" id="venue" name="venue" type="text" placeholder="..." style="width: 100%;">
            </div>
            <div class="col-lg-5 spacing-left">
              Name of Range<br>
              <input class="form-control" id="name_of_range" name="name_of_range" type="text" placeholder="..." style="width: 100%;">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Training Start Date<br>
              <input class="form-control" id="training_s_date" name="training_s_date" type="date" placeholder="..." style="width: 100%;">
            </div>
            <div class="col-lg-5 spacing-left">
              Training End Date<br>
              <input class="form-control" id="training_e_date" name="training_e_date" type="date" placeholder="..." style="width: 100%;">
            </div>
          </div>
          <div class="row mb-2">

            <div class="col-lg-5 spacing-right">
              Training Start Time<br>
              <input class="form-control" id="training_s_time" name="training_s_time" type="time" placeholder="..." style="width: 100%;">
            </div>

            <div class="col-lg-5 spacing-left">
              Training End Time<br>
              <input class="form-control" name="training_e_time" type="time" placeholder="..." style="width: 100%;">
            </div>
          </div>
          <div class="row mb-2">

            <div class="col-lg-5 spacing-right">
              Time of Guest Invitation <br>
              <input class="form-control" id="guest_invitation" name="guest_invitation" type="time" placeholder="..." style="width: 100%;">
            </div>

            <div class="col-lg-5 spacing-left">
              Registration Deadline (Date)<br>
              <input class="form-control" id="reg_date" name="reg_date" type="date" placeholder="..." style="width: 100%;">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-10 spacing-right">
              Registration Deadine (Time) <br>
              <input class="form-control" id="reg_time" name="reg_time" type="time" placeholder="..." style="width: 97%;">
            </div>
          </div>

        </div>

        <div class="col-lg-6 spacing-left">
          <h5>Details of CRO :</h5>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Name of CRO<br>
              <input class="form-control" id="cro_name" name="cro_name" type="text" placeholder="..." style="width: 100%;">
            </div>
            <div class="col-lg-5 spacing-left">
              Cell No. of CRO<br>
              <input class="form-control" id="cro_cell" name="cro_cell" type="text" placeholder="..." style="width: 100%;">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-10 spacing-right">
              Email of CRO<br>
              <input class="form-control" id="email_cro" name="email_cro" type="text" placeholder="..." style="width: 97%;">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Organized by(RHQ)<br>
              <input class="form-control" id="organized_by" name="organized_by" type="text" placeholder="..." style="width: 100%;">
            </div>
            <div class="col-lg-5 spacing-left">
              Branch<br>
              <input class="form-control" id="branch" name="branch" type="text" placeholder="..." style="width: 100%;">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-5 spacing-right">
              Demo of Video Clip<br>
              <input class="form-control" id="demo" name="demo" type="file" placeholder="..." style="width: 100%;">
            </div>
            <div class="col-lg-5 spacing-left">
              Training Duration<br>
              <input class="form-control" id="duration" name="duration" type="text" placeholder="..." style="width: 100%;">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-10 spacing-right">
              Booking Request<br>
              <input class="form-control" id="booking_attach" name="booking_attach" type="file" placeholder="..." style="width: 97%;">
            </div>
          </div>
          <div class="row mb-2 ">
            <div class="col-lg-5 spacing-right mb-3">
              All Types Covered <br>
              <select class="form-control" id="all_types_covered" name="all_types_covered" style="width: 100%;">
                <option value=""></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="col-lg-5 spacing-right mb-3">
              Reports Submitted <br>
              <select class="form-control" id="reports_submitted" name="reports_submitted" style="width: 94%;">
                <option value=""></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
          </div>

        </div>
      </div>
        <h5>Address</h5>
         <div class="row mb-4 g-2">
            <div class="col-lg-4">
                <label for="office_no">Office No</label>
                <input class="form-control" id="office_no" name="office_no" type="text" placeholder="...">
            </div>

            <div class="col-lg-4">
                <label for="floor">Floor</label>
                <input class="form-control" id="floor" name="floor" type="text" placeholder="...">
            </div>

            <div class="col-lg-4">
                <label for="building">Building</label>
                <input class="form-control" id="building" name="building" type="text" placeholder="...">
            </div>

            <div class="col-lg-4">
                <label for="block">Block</label>
                <input class="form-control" id="block" name="block" type="text" placeholder="...">
            </div>

            <div class="col-lg-4">
                <label for="area">Area</label>
                <input class="form-control" id="area" name="area" type="text" placeholder="...">
            </div>

            <div class="col-lg-4">
                <label for="city">City</label>
                <input class="form-control" id="city" name="city" type="text" placeholder="...">
            </div>

            <div class="col-lg-3">
                <label for="photo">Photograph of Building</label>
                <input class="form-control" id="photo" name="photo" type="file" placeholder="...">
            </div>

            <div class="col-lg-3">
                <label for="email">Email</label>
                <input class="form-control" id="email" name="email" type="text" placeholder="...">
            </div>

            <div class="col-lg-3">
                <label for="website">Website</label>
                <input class="form-control" id="website" name="website" type="text" placeholder="...">
            </div>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJW5_mifeg4pTLOW_Hgx70vDhU4osTceg&libraries=places" defer></script>

            <div class="col-lg-3">
                <label for="location-input">Pin Location</label>
                <input class="form-control" id="location-input" name="pin" type="text" placeholder="..." onfocus="initAutocomplete()">
            </div>
        </div>

        <div class="mb-5">
          <button type="button" style="float: right;" id="validateBtn" class="btn btn-success mb-4">Save</button>
          <div id="validationMessage" class="mt-3"></div>
     </div>
      <div id="myModal" class="modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
        <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 30%; border-radius: 10px; text-align: center;">
          <span class="close" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; position: relative; left: 49%;">&times;</span>
          <p id="popupMessage"></p>
          <input type="text" id="urlInput" style="width: 98%; margin-top: 20px;" readonly>
          <div style="margin-top: 20px;">
            <a href="https://mail.google.com/mail/u/0/#inbox" id="gmailIcon" style="text-decoration: none; color: #000; margin-right: 20px;"><i class="fab fa-google" style="font-size: 24px;"></i></a>
            <a href="https://web.whatsapp.com/send?text=Check%20out%20this%20link%3A%20" id="whatsappIcon" style="text-decoration: none; color: #000;"><i class="fab fa-whatsapp" style="font-size: 24px;"></i></a>
            <span id="copyIcon" style="cursor: pointer; margin-right: 10px;"><i class="fas fa-copy" style="font-size: 23px; margin-left: 15px;"></i></span>
            <span id="copyText" style="font-size: 14px; color: green;"></span>
          </div>
        </div>
      </div>
      <!--Tabs forDetails-->
      <nav>
        <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
          <a class="nav-item nav-link disabled" id="nav-home-tab" data-toggle="tab" href="#correnpondence" role="tab" aria-controls="nav-home" aria-selected="true">Correspondence</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#budgets" role="tab" aria-controls="nav-profile" aria-selected="false">Budgets</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#training" role="tab" aria-controls="nav-profile" aria-selected="false">Traning modules</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#weapons" role="tab" aria-controls="nav-contact" aria-selected="false">Weapons and Ammunition</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#facility" role="tab" aria-controls="nav-contact" aria-selected="false">Facility Management</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#findings" role="tab" aria-controls="nav-contact" aria-selected="false">Findings</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#online-training" role="tab" aria-controls="nav-contact" aria-selected="false">Online Training</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#range" role="tab" aria-controls="nav-contact" aria-selected="false">Training Range POC</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#check" role="tab" aria-controls="nav-contact" aria-selected="false">Checklist of Organizing Training</a>
        </div>
      </nav>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
        $(document).ready(function() {
          // Disable all tabs except the first one
          $('.nav-tabs .nav-item').not(':first').addClass('disabled').attr('aria-disabled', 'true');
          // Click event listener for the "Save" buttons
          $('.saveButton').click(function() {
            var nextTabId = $(this).data('next-tab');
            var nextTabLink = $('a[href="' + nextTabId + '"]');
            // Enable the next tab
            nextTabLink.removeClass('disabled').removeAttr('aria-disabled');
            nextTabLink.tab('show');
          });
          // Tab change event listener
          $('.nav-tabs').on('click', '.nav-link', function(e) {
            if ($(this).hasClass('disabled')) {
              e.preventDefault(); // Prevent tab change
              alert('Please click the "Save" button in the current tab before navigating to the next tab.');
            }
          });
        });
      </script>

      <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
        <!--correnpondence-->
        <div class="tab-pane fade disabled m-3" style="opacity: 90%;" id="correnpondence" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="row">
            <div class="col-lg-12 spacing-right">
              <div class="row mb-2">

                <div class="col-lg-3 spacing-right">
                  Booking Request Number<br> <input class="form-control" type="text" id="booking_request" name="booking_request" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3  spacing-right">
                  Date of Range Allocation Letter

                  <input class="form-control" name="date_allocation_letter" id="date_allocation_letter" type="date" placeholder="..." style="width: 100%;">
                </div>

                <div class="col-lg-3 spacing-right">
                  Range Allocation Letter<input class="form-control" type="file" id="range_allocation_attach" name="range_allocation_attach" placeholder="..." style="width: 100%;">
                </div>

                <div class="col-lg-3 spacing-right">
                  Booking Request Date <br> <input class="form-control" type="date" name="booking_request_date" placeholder="..." style="width: 100%;">
                </div>

                <div class="col-lg-3 spacing-right">
                  Copy of Booking Request <br> <input class="form-control" type="file" name="copy_booking_attach" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-3 mt-2 spacing-right">
                  Guard of Respective Date <br> <input class="form-control" type="file" name="guard_resp_attach" placeholder="..." style="width: 100%;">
                </div>

                <h5 class="mt-3">Invitation :</h5>
                <div class="col-lg-4 spacing-right mt-3">
                  Send Email to all active Customers of Respective Region <div class="form-check form-check-inline">
                    <input class="form-check-input ml-2 pt-1" type="checkbox" name="email_active_check" id="send-to-active" value="option1">

                  </div> <br>
                  <div id="send-active-options" style="display: none;">
                    Send Emails to all active Customers .? <br>
                    <select class="form-control" name="send_email_active" style="width: 100%;">
                      <option value=""></option>
                      <option value="Yes" id="activecustomer">Yes</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4 spacing-right mt-3">
                  Send Email to all Inactive Customers of Respective Region <div class="form-check form-check-inline">
                    <input class="form-check-input ml-2 pt-1" type="checkbox" name="email_inactive_check" id="send-to-inactive" value="option1">

                  </div> <br>
                  <div id="send-inactive-options" style="display: none;">
                    Send Emails to all Inactive Customers .? <br>
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
                    <input class="form-check-input ml-2 pt-1" name="email_all_check" type="checkbox" id="send-to-region" value="option1">
                  </div>
                  <br>
                  <div id="send-email-options" style="display: none;">
                    Send Emails to all Prospects .? <br>
                    <select class="form-control" name="send_email_all" style="width: 100%;">
                      <option value=""></option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
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
                            <th><input type="checkbox" id="select-all-checkbox"> Select All</th>

                            <button class="mb-3" style="float: right;" type="button" id="send-all-button">Send Email to Selected Users</button>
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
                              <input type="checkbox" data-customerName="{{ $active->customers_name }}" data-customer-id="{{ $active->id }}" data-customer-email="{{ $active->email }}" class="active_customer_check" value="" style="margin-left: 30%;">

                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div id="customModal" class="modal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60%; max-width: 1000px; height: 70%; max-height: 1000px; background-color: rgba(0, 0, 0, 0.5);">
                      <div class="modal-content" style="position: relative; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); display: flex; flex-direction: column; align-items: center;">
                        <span class="close" id="cancel-send-email" style="position: absolute; top: 10px; right: 10px; font-size: 20px; cursor: pointer;">&times;</span>
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
                            <th><input type="checkbox" id="select-all-inactive-checkbox"> Select All</th>
                            <button class="mb-3" style="float: right;" type="button" id="send-inactive-button">Send Email to Selected Users</button>
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
                              <input type="checkbox" data-customer-id="{{ $inactive->id }}" data-customer-email="{{ $inactive->email }}" class="inactive_customer_check" value="" style="margin-left: 30%;">
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div id="inactiveCustomModal" class="modal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60%; max-width: 1000px; height: 70%; max-height: 1000px; background-color: rgba(0, 0, 0, 0.5);">
                      <div class="modal-content" style="position: relative; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); display: flex; flex-direction: column; align-items: center;">
                        <span class="close" id="inactive-cancel-send-email" style="position: absolute; top: 10px; right: 10px; font-size: 20px; cursor: pointer;">&times;</span>
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
                            <input type="text" id="inactive-email-subject" name="inactive-email-subject" value="LIVE FIRE ARM TRAINING" style="width: calc(100% - 120px);">
                          </div>
                          <div style="width: 210%; margin-left:-55%">
                            <label for="inactive-email-body" style="width: 100px;">Email Body:</label>
                            <textarea id="inactive-email-body" name="inactive-email-body" rows="10" style="width: calc(100% - 120px);">[Your email body here]</textarea>
                          </div>
                          <div style="width: 210%; margin-left:-55%;">
                            <label for="inactive-email-attachment" style="width: 100px;">Attachments:</label>
                            <input type="file" id="custominactiveEmailAttachment" name="custominactiveEmailAttachment" style="width: calc(100% - 120px);" accept="image/*">
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
                <h5 class="mt-2">Guards Participating in the Training :</h5>
                <div class="col-lg-3 spacing-right mt-4">
                  Guards of Respective Region
                  <div class="form-check form-check-inline">
                    <input class="form-check-input ml-2 pt-1" name="guards_respective" type="checkbox" id="showtable" value="option1">
                  </div>
                </div>

                <div class="col-lg-3 mt-2 spacing-right mt-3">
                  List of Guards Participating in Training <br>
                  <input class="form-control" type="file" name="list_guard_attach" placeholder="..." style="width: 100%;">
                </div>

                <div class="col-lg-12" >
                  <div class="card table-responsive mt-2 p-3" id="guardTableContainer" style="display: none;">
                      <!-- Save PDF Button (Hidden by default) -->
                    <div id="savePdfContainer" style="display: none; text-align: right; margin: 10px;">
                      <button id="savePdfBtn" type="button" style="padding: 8px 16px; background-color: green; color: white; border: none; border-radius: 5px;">
                        Save PDF
                      </button>
                    </div>
                     <table id="usersTable" class="table table-bordered table-striped table-fixed">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Father Name</th>
                            <th>Employee Number</th>
                            <th>Region</th>
                            <th>Location</th>
                            <th>Action</th>
                            <th><input type="checkbox" id="selectAllGuards" onchange="toggleGuardCheckboxes()">Select All</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($guardRecords as $guard)
                          <tr>
                            <td>{{ $guard->name }}</td>
                            <td>{{ $guard->fname }}</td>
                            <td>{{ $guard->employee_no }}</td>
                            <td>{{ $guard->hrm_region }}</td>
                            <td>{{ $guard->hrm_location }}</td>
                            <td>
                              <a href="{{ route('viewhrm', $guard->id) }}">View Details</a>
                            </td>
                            <td>
                              <input type="checkbox" class="guard-checkbox" name="guard_ids[]" value="{{ $guard->id }}" style="margin-left: 30%;">
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>
                <h5 class="mt-3">Point of Contact (POC) Details :</h5>
                <div class="container my-5">
                  <div class="accordion" id="pocAccordion">
                    <!-- Initial Accordion Item -->
                    <div class="accordion-item" id="pocEntry1">
                      <h2 class="accordion-header" id="pocHeading1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                          POC Entry 1
                        </button>
                      </h2>
                      <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="pocHeading1" data-bs-parent="#pocAccordion">
                        <div class="accordion-body">
                          <div class="container my-5">
                            <div id="pocContainer">
                              <div class="row">
                                <div class="col-lg-6 spacing-right">
                                  <div class="row mb-2">
                                    <div class="form-type col-lg-11 spacing-right">
                                      Name of POC <br> <input class="form-control" type="text" name="poc_name[]" placeholder="..." style="width: 100%;">
                                    </div>
                                  </div>
                                  <div class="row mb-2">
                                    <div class="form-type col-lg-6 spacing-right">
                                      Title/Designation <br> <input class="form-control" type="text" name="poc_desig[]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="form-type col-lg-5 spacing-left spacing-right">
                                      Fax# <br> <input class="form-control" type="text" name="poc_fax[]" placeholder="..." style="width: 100%;">
                                    </div>
                                  </div>
                                  <div class="row mb-2">
                                    <div class="form-type col-lg-5 spacing-right">
                                      Phone No. <br> <input class="form-control" type="text" name="poc_phone[]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="form-type col-lg-6 spacing-left spacing-right">
                                      Mobile <br> <input class="form-control" type="text" name="poc_mobile[]" placeholder="..." style="width: 100%;">
                                    </div>
                                  </div>
                                  <div class="row mb-2">
                                    <div class="form-type col-lg-11 spacing-right">
                                      Website <br> <input class="form-control" type="text" name="poc_web[]" placeholder="..." style="width: 100%;">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6 spacing-right">
                                  <div class="row mb-2">
                                    <div class="form-type col-lg-11 spacing-right">
                                      Email Address of POC <br> <input class="form-control" type="text" name="poc_email[]" placeholder="..." style="width: 100%;">
                                    </div>
                                  </div>
                                  <div class="row mb-2">
                                    <div class="form-type col-lg-11 spacing-right">
                                      Location of POC <br> <input class="form-control" type="text" name="poc_loc[]" placeholder="..." style="width: 100%;" onfocus="initAutocomplete1()">
                                    </div>
                                  </div>
                                  <div class="row mb-2">
                                    <div class="form-type col-lg-7 spacing-right">
                                      Name of Document <br> <input class="form-control" type="text" name="poc_document[]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="form-type col-lg-4 spacing-left spacing-right">
                                      System ID <br> <input class="form-control" type="text" name="system_id[]" placeholder="..." style="width: 100%;">
                                    </div>
                                  </div>
                                  <div class="row mb-2">
                                    <div class="form-type col-lg-11 spacing-right">
                                      Other Info <br>
                                      <textarea class="form-control" name="other_info[]" rows="3" cols="24"></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-12 text-right">
                                  <button class="btn btn-danger btn-sm removePOCSection" type="button">Remove</button>
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
                      <button type="button" class="btn btn-primary" style="width:30%;" id="addMorePOC">Add More POC</button>
                    </div>
                    <div class="col">
                      <button type="button" class="btn btn-primary" id="savePOC">Save</button>
                    </div>
                  </div>

                  <!-- Summary Table -->
                  <table class="table table-bordered mt-3" id="pocSummaryTable">
                    <thead>
                      <tr>
                        <th>Entry</th>
                        <th>Name of POC</th>
                        <th>Email of POC</th>
                        <th>Title / Designation</th>
                        <th>Phone Number</th>
                        <th>View</th>
                        <!-- Add more columns as needed -->
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary saveButton" data-next-tab="#budgets">Save and Next</button>

        </div>
        <!--budgets-->
        <div class="tab-pane fade m-3" style="opacity: 90%;" id="budgets" role="tabpanel" aria-labelledby="nav-profile-tab">
          <div style="display: flex; align-items: right;">
            <div>
              <input type="checkbox" name="out_of_scope" id="evCheckbox" value="on">
              <label for="evCheckbox" style="margin-left: 10px;">Out of Scope</label>
            </div>
          </div>

          {{-- accordion starting --}}
          <div class="container my-5 " id="accordionContainer">
            <div class="accordion" id="budgetAccordion">
              <!-- Initial Accordion Item -->
              <div class="accordion-item" id="manpowerEntry1">
                <h2 class="accordion-header" id="budgetHeading1" style="color: white">
                  <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                    Budget Entry 1
                  </button>
                </h2>
                <div id="collapse1" class="collapse" aria-labelledby="budgetHeading1">
                  <div class="accordion-body">
                    <div id="everything">
                      <div class="row budgetContainer" id="budgetDetailsContainer">
                        <div class="col-lg-12 spacing-right">
                          <div class="row my-2">
                            <div class="d-flex">
                              <div class="col-lg-6 spacing-right">
                                Category <br>
                                <select id="staff_category" class="form-control mt-2" name="budget_category[]" style="width: 100%;">
                                  <option value=""></option>
                                  <option value="Range Fees">Range Fees</option>
                                  <option value="Target Fees">Target Fees</option>
                                  <option value="Food Cost">Food Cost</option>
                                  <option value="Ammunition Cost">Ammunition Cost</option>
                                  <option value="Transportation Cost">Transportation Cost</option>
                                  <option value="Security Equipment Cost">Security Equipment Cost</option>
                                  <option value="Media">Media</option>
                                  <option value="Crockery">Crockery</option>
                                </select>
                              </div>
                              <div class="col-lg-6 spacing-right">
                                Mode Of Payment <br>
                                <select id="staff_category" class="form-control mt-2" name="mode_of_payment[]" style="width: 100%;">
                                  <option value="Cheque">Cheque</option>
                                  <option value="Cash">Cash</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="d-flex mt-1">
                                <div class="col-md-3">
                                  Instrument No <br> <input class="form-control" name="budget_ins_no[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-md-3">
                                  Name Of Bank <br> <input class="form-control" name="name_of_bank[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-md-3">
                                  Date of Payment <br> <input class="form-control" name="date_of_payment[]" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-md-3">
                                  Amount Per Unit <br> <input class="form-control BudgetAmountPerUnit" name="amount_per_unit[]" data-index="0" type="text" placeholder="..." style="width: 100%;">
                                </div>
                              </div>
                              <div class="d-flex mt-1">
                                <div class="col-md-3">
                                  Quantity <br> <input class="form-control BudgetQuantity" name="quantity[]" type="text" data-index="0" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-md-3">
                                  Total Amount <br> <input class="form-control BudgetTotalAmount" name="total_amount[]" data-index="0" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-md-3">
                                  Cheque <br> <input class="form-control" name="cheque_attach[]" type="file" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-md-3">
                                  Voucher <br> <input class="form-control" name="voucher_attach[]" type="file" placeholder="..." style="width: 100%;">
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

            <!-- Add More and Remove Buttons -->
            <div class="row my-3">
              <div class="col">
                <button type="button" class="btn btn-primary" id="addAccBudget" style="height:30px; width:150px;">Add More Budget</button>
              </div>
              <div class="col">
                <button type="button" class="btn btn-primary" id="addToTable" style="height:30px; width:150px;">Save</button>
              </div>
            </div>
          </div>

          <table class="table table-bordered mt-3" id="budgetSummaryTable">
            <thead>
              <tr>
                <th>Entry</th>
                <th>Category</th>
                <th>Instrument Number</th>
                <th>Name of the Bank</th>
                <th>Total Amount</th>
                <th>View</th>
                <!-- Add more columns as needed -->
              </tr>
            </thead>
            <tbody>
              <!-- Summary data will be added here dynamically -->
            </tbody>
          </table>

          <div class="row my-2">
            <div class="form-type col-lg-3 mt-3  ">
              Estimated/Calculated Amount <br> <input class="form-control" name="estimated_amount" type="text" placeholder="..." style="width: 100%;">
            </div>
            <div class="form-type col-lg-3 mt-3 ">
              Actual Amount <br> <input class="form-control" name="actual_amount" type="text" placeholder="..." style="width: 100%;">
            </div>
            <div class="form-type col-lg-3 mt-3 ">
              Total Expense <br> <input class="form-control" name="total_expense" type="text" placeholder="..." style="width: 100%;">
            </div>
            <div class="form-type col-lg-3 mt-3 ">
              Expenses Proof Attachement <br> <input class="form-control" name="expenses_proof_attach" type="file" placeholder="..." style="width: 100%;">
            </div>
          </div>
          <button type="button" class="btn btn-primary saveButton" data-next-tab="#training">Save and Next</button>
        </div>
        <!--training modules-->
        <div class="tab-pane fade m-3" style="opacity: 90%;" id="training" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                                                    top: -16px;
                                                                    left: 6%;
                                                                    transform: rotate(-15deg);
                                                                    width: 60px;
                                                                    height: 60px;">
                      <img src="/public/first.png" alt="Your image">
                      <input type="checkbox" id="myCheckbox" name="general_check" class="checkbox-class" style="    position: absolute;
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
                    <div style="position: absolute;     top: 7%;
                                                                    left: 53%;
                                                                    transform: rotate(-17deg); width: 60px; height: 60px;">
                      <img src="/public/second.png" alt="Your image">
                      <input type="checkbox" id="myCheckbox1" name="weapon_check" class="checkbox-class" style="    position: absolute;
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
                                                                    top: 55%;
                                                                    left: 90%;
                                                                    transform: rotate(-17deg); width: 60px; height: 60px;">
                      <img src="/public/third.png" alt="Your image">
                      <input type="checkbox" id="myCheckbox2" name="frisking_check" class="checkbox-class" style="    position: absolute;
                                                                top: 88%;
                                                                left: 134%;
                                                                transform: translate(-50%, -50%);
                                                                width: 25px;
                                                                height: 24px;
                                                                border: 1px solid black;
                                                                border-radius: 4px;
                                                                background-color: white;
                                                                ">
                    </div>
                    <div style="position: absolute;
                                                                top: 118%;
                                                                left: 85%;
                                                                transform: rotate(-20deg);
                                                                width: 60px; height: 60px;">
                      <img src="/public/forth.png" alt="Your image">
                      <input type="checkbox" id="myCheckbox3" name="gatehouse_check" class="checkbox-class" style="position: absolute;
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
                                                                    left: 60%;
                                                                    transform: rotate(-25deg);
                                                                    width: 60px;
                                                                    height: 60px;">
                      <img src="/public/fifth.png" alt="Your image">
                      <input type="checkbox" id="myCheckbox4" name="optimum_check" class="checkbox-class" style="position: absolute;
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
                                                                    top: 192%;
                                                                    left: 3%;
                                                                    transform: rotate(335deg);
                                                                    width: 60px;
                                                                    height: 60px;">
                      <img src="/public/sixth.png" alt="Your image">
                      <input type="checkbox" id="myCheckbox5" name="radio_check" class="checkbox-class" style="position: absolute;
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
                                                                    top: 196%;
                                                                    left: -60%;
                                                                    transform: rotate(-40deg);
                                                                    width: 60px;
                                                                    height: 60px;">
                      <img src="/public/seventh.png" alt="Your image">
                      <input type="checkbox" id="myCheckbox6" name="aid_check" class="checkbox-class" style="position: absolute;
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
                                                                        top: 155%;
                                                                        left: -106%;
                                                                        transform: rotate(327deg);
                                                                    width: 60px;
                                                                    height: 60px;">
                      <img src="/public/eigth.png" alt="Your image">
                      <input type="checkbox" id="myCheckbox7" name="fire_check" class="checkbox-class" style="    position: absolute;
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
                                                                        top: 95%;
                                                                        left: -134%;
                                                                        transform: rotate(330deg);
                                                                        width: 60px;
                                                                        height: 60px;">
                      <img src="/public/ninth.png" alt="Your image">
                      <input type="checkbox" id="myCheckbox8" name="self_check" class="checkbox-class" style="    position: absolute;
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
                                                                        top: 40%;
                                                                        left: -110%;
                                                                        transform: rotate(331deg);
                                                                        width: 60px;
                                                                        height: 60px;">
                      <img src="/public/tenth.png" alt="Your image">
                      <input type="checkbox" id="myCheckbox9" name="close_check" class="checkbox-class" style="    position: absolute;
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
                    <div style=" position: absolute;
                                                                        top: -3%;
                                                                        left: -60%;
                                                                        transform: rotate(355deg);
                                                                        width: 60px;
                                                                        height: 60px;">
                      <img src="/public/eleventh.png" height="115px" width="115px" alt="Your image">
                      <input type="checkbox" id="myCheckbox10" name="crime_check" class="checkbox-class" style="    position: absolute;
                                                                        top: 37%;
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
          <div id="newSection">
            <div class=" row main-content hidden-content div" style="display:none;">
              <h5>General Security Duties :</h5>
              <div class="col-lg-12">
                <div class="row mb-2">
                  <div class="col-lg-6 spacing-right">
                    Video of this Course <br> <input class="form-control" id="" name="general_video" type="file" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left spacing-right">
                    Literature of this Course <br>
                    <input class="form-control" id="" name="general_literature" type="file" placeholder="..." style="width: 100%;">
                  </div>
                  <h5 class="mt-2">Trainer Details</h5>
                  <div class="col-lg-6 spacing-right">
                    Name <br> <input class="form-control" id="" name="general_trainer_name" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                    Designation <br> <input class="form-control" id="" name="general_trainer_desig" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6  spacing-right">
                    Email <br> <input class="form-control" id="" name="general_trainer_email" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left">
                    Cell No <br> <input class="form-control" id="" name="general_trainer_cell" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-right">
                    Office<br> <input class="form-control" id="" name="general_trainer_office" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-right">
                    RHQ <br> <input class="form-control" id="" name="general_trainer_rhq" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-right">
                    Region <br> <input class="form-control" id="" name="general_trainer_region" type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>

              </div>

              <div class="col-lg-12">
                <div class="row mb-2">
                  <div class="col-lg-6 spacing-right">
                    Quantity of Trainer Cards for this Course : <br> <input class="form-control" id="" name="general_trainer_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                    Quantity of Guards Cards for this Course : <br> <input class="form-control" id="" name="general_guards_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>

              </div>
              <hr class="w-75 mx-auto" />
            </div>

          </div>
          <div id="newSection1">
            <div class=" row main-content hidden-content1  div" style="display:none;">
              <h5>Weapon Handling Techniques :</h5>
              <div class="row mb-2">
                <div class="col-lg-6 spacing-right">
                  Video of this Course <br> <input class="form-control" id="" name="weapon_video" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-left spacing-right">
                  Literature of this Course <br> <input class="form-control" id="" name="weapon_literature" type="file" placeholder="..." style="width: 100%;">
                </div>
                <h5 class="mt-2">Trainer Details</h5>
                <div class="col-lg-6 spacing-right">
                  Name <br> <input class="form-control" id="" name="weapon_trainer_name" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left spacing-right">
                  Designation <br> <input class="form-control" id="" name="weapon_trainer_desig" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6  spacing-right">
                  Email <br> <input class="form-control" id="" name="weapon_trainer_email" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Cell No <br> <input class="form-control" id="" name="weapon_trainer_cell" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Office<br> <input class="form-control" id="" name="weapon_trainer_office" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  RHQ <br> <input class="form-control" id="" name="weapon_trainer_rhq" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Region <br> <input class="form-control" id="" name="weapon_trainer_region" type="text" placeholder="..." style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row mb-2">
                  <div class="col-lg-6 spacing-right">
                    Quantity of Trainer Cards for this Course : <br> <input class="form-control" id="" name="weapon_trainer_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                    Quantity of Guards Cards for this Course : <br> <input class="form-control" id="" name="weapon_guards_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>

              </div>
              <hr class="w-75 mx-auto" />
            </div>

          </div>
          <div id="newSection2">
            <div class=" row  main-content hidden-content2 div" style="display:none;">
              <h5>Frisking Procedures :</h5>
              <div class="row mb-2">
                <div class="col-lg-6 spacing-right">
                  Video of this Course <br> <input class="form-control" id="" name="frisking_video" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-left spacing-right">
                  Literature of this Course <br> <input class="form-control" id="" name="frisking_literature" type="file" placeholder="..." style="width: 100%;">
                </div>
                <h5 class="mt-2">Trainer Details</h5>
                <div class="col-lg-6 spacing-right">
                  Name <br> <input class="form-control" id="" name="frisking_trainer_name" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left spacing-right">
                  Designation <br> <input class="form-control" id="" name="frisking_trainer_desig" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6  spacing-right">
                  Email <br> <input class="form-control" id="" name="frisking_trainer_email" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Cell No <br> <input class="form-control" id="" name="frisking_trainer_email" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  Office <br> <input class="form-control" id="" name="frisking_trainer_office" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  RHQ <br> <input class="form-control" id="" name="frisking_trainer_rhq" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Region <br> <input class="form-control" id="" name="frisking_trainer_region" type="text" placeholder="..." style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row mb-2">
                  <div class="col-lg-6 spacing-right">
                    Quantity of Trainer Cards for this Course : <br> <input class="form-control" id="" name="frisking_trainer_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                    Quantity of Guards Cards for this Course : <br> <input class="form-control" id="" name="frisking_guards_name" type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>
              </div>
              <hr class="w-75 mx-auto" />
            </div>
          </div>
          <div id="newSection3">
            <div class=" row main-content hidden-content3  div" style="display:none;">
              <h5>Gatehouse Mangement System :</h5>
              <div class="row mb-2">
                <div class="col-lg-6 spacing-right">
                  Video of this Course <br> <input class="form-control" id="" name="gatehouse_video" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-left spacing-right">
                  Literature of this Course <br> <input class="form-control" id="" name="gatehouse_literature" type="file" placeholder="..." style="width: 100%;">
                </div>
                <h5 class="mt-2">Trainer Details</h5>
                <div class="col-lg-6 spacing-right">
                  Name <br> <input class="form-control" id="" name="gatehouse_trainer_name" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left spacing-right">
                  Designation <br> <input class="form-control" id="" name="gatehouse_trainer_desig" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6  spacing-right">
                  Email <br> <input class="form-control" id="" name="gatehouse_trainer_email" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Cell No <br> <input class="form-control" id="" name="gatehouse_trainer_cell" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  Office <br> <input class="form-control" id="" name="gatehouse_trainer_office" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  RHQ <br> <input class="form-control" id="" name="gatehouse_trainer_rhq" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Region <br> <input class="form-control" id="" name="gatehouse_trainer_region" type="text" placeholder="..." style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row mb-2">
                  <div class="col-lg-6 spacing-right">
                    Quantity of Trainer Cards for this Course : <br> <input class="form-control" id="" name="gatehouse_trainer_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                    Quantity of Guards Cards for this Course : <br> <input class="form-control" id="" name="gatehouse_guards_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>
              </div>
              <hr class="w-75 mx-auto" />
            </div>
          </div>
          <div id="newSection4">
            <div class=" row main-content hidden-content4 div" style="display:none;">
              <h5>Optimum Use of Security Equipments :</h5>
              <div class="row mb-2">
                <div class="col-lg-6 spacing-right">
                  Video of this Course <br> <input class="form-control" id="" name="optimum_video" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-left spacing-right">
                  Literature of this Course <br> <input class="form-control" id="" name="optimum_literature" type="file" placeholder="..." style="width: 100%;">
                </div>
                <h5 class="mt-2">Trainer Details</h5>
                <div class="col-lg-6 spacing-right">
                  Name <br> <input class="form-control" id="" name="optimum_trainer_name" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left spacing-right">
                  Designation <br> <input class="form-control" id="" name="optimum_trainer_desig" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6  spacing-right">
                  Email <br> <input class="form-control" id="" name="optimum_trainer_email" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Cell No <br> <input class="form-control" id="" name="optimum_trainer_cell" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  Office <br> <input class="form-control" id="" name="optimum_trainer_office" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  RHQ <br> <input class="form-control" id="" name="optimum_trainer_rhq" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Region <br> <input class="form-control" id="" name="optimum_trainer_region" type="text" placeholder="..." style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row mb-2">
                  <div class="col-lg-6 spacing-right">
                    Quantity of Trainer Cards for this Course : <br> <input class="form-control" id="" name="optimum_trainer_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                    Quantity of Guards Cards for this Course : <br> <input class="form-control" id="" name="optimum_guards_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>
              </div>
              <hr class="w-75 mx-auto" />
            </div>
          </div>
          <div id="newSection5">
            <div class=" row main-content hidden-content5 div" style="display:none;">
              <h5>Radio Communication and Survillence :</h5>
              <div class="row mb-2">
                <div class="col-lg-6 spacing-right">
                  Video of this Course <br> <input class="form-control" id="" name="radio_video" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-left spacing-right">
                  Literature of this Course <br> <input class="form-control" id="" name="radio_literature" type="file" placeholder="..." style="width: 100%;">
                </div>
                <h5 class="mt-2">Trainer Details</h5>
                <div class="col-lg-6 spacing-right">
                  Name <br> <input class="form-control" id="" name="radio_trainer_name" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left spacing-right">
                  Designation <br> <input class="form-control" id="" name="radio_trainer_desig" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6  spacing-right">
                  Email <br> <input class="form-control" id="" name="radio_trainer_email" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Cell No <br> <input class="form-control" id="" name="radio_trainer_cell" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  Office <br> <input class="form-control" id="" name="radio_trainer_office" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  RHQ <br> <input class="form-control" id="" name="radio_trainer_rhq" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Region <br> <input class="form-control" id="" name="radio_trainer_region" type="text" placeholder="..." style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row mb-2">
                  <div class="col-lg-6 spacing-right">
                    Quantity of Trainer Cards for this Course : <br> <input class="form-control" id="" name="radio_trainer_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                    Quantity of Guards Cards for this Course : <br> <input class="form-control" id="" name="radio_guards_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>
              </div>
              <hr class="w-75 mx-auto" />
            </div>
          </div>
          <div id="newSection6">
            <div class=" row main-content hidden-content6  div" style="display:none;">
              <h5>First Aid and Rescue Techniques :</h5>
              <div class="row mb-2">
                <div class="col-lg-6 spacing-right">
                  Video of this Course <br> <input class="form-control" id="" name="firstaid_video" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-left spacing-right">
                  Literature of this Course <br> <input class="form-control" id="" name="firstaid_literature" type="file" placeholder="..." style="width: 100%;">
                </div>
                <h5 class="mt-2">Trainer Details</h5>
                <div class="col-lg-6 spacing-right">
                  Name <br> <input class="form-control" id="" name="firstaid_trainer_name" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left spacing-right">
                  Designation <br> <input class="form-control" id="" name="firstaid_trainer_desig" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6  spacing-right">
                  Email <br> <input class="form-control" id="" name="firstaid_trainer_email" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Cell No <br> <input class="form-control" id="" name="firstaid_trainer_cell" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  Office <br> <input class="form-control" id="" name="firstaid_trainer_office" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  RHQ <br> <input class="form-control" id="" name="firstaid_trainer_rhq" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Region <br> <input class="form-control" id="" name="firstaid_trainer_region" type="text" placeholder="..." style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row mb-2">
                  <div class="col-lg-6 spacing-right">
                    Quantity of Trainer Cards for this Course : <br> <input class="form-control" id="" name="firstaid_trainer_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                    Quantity of Guards Cards for this Course : <br> <input class="form-control" id="" name="firstaid_guards_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>
              </div>
              <hr class="w-75 mx-auto" />
            </div>
          </div>
          <div id="newSection7">
            <div class=" row main-content hidden-content7 div" style="display:none;">
              <h5>Fire Fighting and Damage Control :</h5>
              <div class="row mb-2">
                <div class="col-lg-6 spacing-right">
                  Video of this Course <br> <input class="form-control" id="" name="fire_video" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-left spacing-right">
                  Literature of this Course <br> <input class="form-control" id="" name="fire_literature" type="file" placeholder="..." style="width: 100%;">
                </div>
                <h5 class="mt-2">Trainer Details</h5>
                <div class="col-lg-6 spacing-right">
                  Name <br> <input class="form-control" id="" name="fire_trainer_name" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left spacing-right">
                  Designation <br> <input class="form-control" id="" name="fire_trainer_desig" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6  spacing-right">
                  Email <br> <input class="form-control" id="" name="fire_trainer_email" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Cell No <br> <input class="form-control" id="" name="fire_trainer_cell" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  Office <br> <input class="form-control" id="" name="fire_trainer_office" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  RHQ <br> <input class="form-control" id="" name="fire_trainer_rhq" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Region <br> <input class="form-control" id="" name="fire_trainer_region" type="text" placeholder="..." style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row mb-2">
                  <div class="col-lg-6 spacing-right">
                    Quantity of Trainer Cards for this Course : <br> <input class="form-control" id="" name="fire_trainer_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                    Quantity of Guards Cards for this Course : <br> <input class="form-control" id="" name="fire_guards_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>

              </div>
              <hr class="w-75 mx-auto" />
            </div>

          </div>
          <div id="newSection8">
            <div class=" row main-content hidden-content8 div" style="display:none;">
              <h5>Self Defense Techniques :</h5>
              <div class="row mb-2">
                <div class="col-lg-6 spacing-right">
                  Video of this Course <br> <input class="form-control" id="" name="self_video" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-left spacing-right">
                  Literature of this Course <br> <input class="form-control" id="" name="self_literature" type="file" placeholder="..." style="width: 100%;">
                </div>
                <h5 class="mt-2">Trainer Details</h5>
                <div class="col-lg-6 spacing-right">
                  Name <br> <input class="form-control" id="" name="self_trainer_name" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left spacing-right">
                  Designation <br> <input class="form-control" id="" name="self_trainer_desig" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6  spacing-right">
                  Email <br> <input class="form-control" id="" name="self_trainer_email" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Cell No <br> <input class="form-control" id="" name="self_trainer_cell" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  Office <br> <input class="form-control" id="" name="self_trainer_office" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  RHQ <br> <input class="form-control" id="" name="self_trainer_rhq" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Region <br> <input class="form-control" id="" name="self_trainer_region" type="text" placeholder="..." style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row mb-2">
                  <div class="col-lg-6 spacing-right">
                    Quantity of Trainer Cards for this Course : <br> <input class="form-control" id="" name="self_trainer_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                    Quantity of Guards Cards for this Course : <br> <input class="form-control" id="" name="self_guards_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>

              </div>
              <hr class="w-75 mx-auto" />
            </div>
          </div>
          <div id="newSection9">
            <div class=" row main-content hidden-content9 div" style="display:none;">
              <h5>Close Quater Battle (CBQ) :</h5>
              <div class="row mb-2">
                <div class="col-lg-6 spacing-right">
                  Video of this Course <br> <input class="form-control" id="" name="close_video" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-left spacing-right">
                  Literature of this Course <br> <input class="form-control" id="" name="close_literature" type="file" placeholder="..." style="width: 100%;">
                </div>
                <h5 class="mt-2">Trainer Details</h5>
                <div class="col-lg-6 spacing-right">
                  Name <br> <input class="form-control" id="" name="close_trainer_name" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left spacing-right">
                  Designation <br> <input class="form-control" id="" name="close_trainer_desig" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6  spacing-right">
                  Email <br> <input class="form-control" id="" name="close_trainer_email" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Cell No <br> <input class="form-control" id="" name="close_trainer_cell" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  Office <br> <input class="form-control" id="" name="close_trainer_office" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  RHQ <br> <input class="form-control" id="" name="close_trainer_rhq" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Region <br> <input class="form-control" id="" name="close_trainer_region" type="text" placeholder="..." style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row mb-2">
                  <div class="col-lg-6 spacing-right">
                    Quantity of Trainer Cards for this Course : <br> <input class="form-control" id="" name="close_trainer_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                    Quantity of Guards Cards for this Course : <br> <input class="form-control" id="" name="close_guards_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>

              </div>
              <hr class="w-75 mx-auto" />
            </div>

          </div>
          <div id="newSection10">
            <div class=" row main-content hidden-content10 div" style="display:none;">
              <h5>Crime Investigation Department (CID) :</h5>
              <div class="row mb-2">
                <div class="col-lg-6 spacing-right">
                  Video of this Course <br> <input class="form-control" id="" name="crime_video" type="file" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-left spacing-right">
                  Literature of this Course <br> <input class="form-control" id="" name="crime_literature" type="file" placeholder="..." style="width: 100%;">
                </div>
                <h5 class="mt-2">Trainer Details</h5>
                <div class="col-lg-6 spacing-right">
                  Name <br> <input class="form-control" id="" name="crime_trainer_name" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left spacing-right">
                  Designation <br> <input class="form-control" id="" name="crime_trainer_desig" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6  spacing-right">
                  Email <br> <input class="form-control" id="" name="crime_trainer_email" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Cell No <br> <input class="form-control" id="" name="crime_trainer_cell" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  Office <br> <input class="form-control" id="" name="crime_trainer_office" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-right">
                  RHQ <br> <input class="form-control" id="" name="crime_trainer_rhq" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                  Region <br> <input class="form-control" id="" name="crime_trainer_region" type="text" placeholder="..." style="width: 100%;">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row mb-2">
                  <div class="col-lg-6 spacing-right">
                    Quantity of Trainer Cards for this Course : <br> <input class="form-control" id="" name="crime_trainer_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                    Quantity of Guards Cards for this Course : <br> <input class="form-control" id="" name="crime_guards_cards" type="text" placeholder="..." style="width: 100%;">
                  </div>
                </div>

              </div>
              <hr class="w-75 mx-auto" />
            </div>

          </div>

          <h4>Training Program</h4>
          <div class="my-3">
            <div class="container m-auto align-items-center d-flex justify-content-center">
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
                      <td><input type="text" name='name[]' placeholder='Enter Activity' class="form-control" /></td>
                      <td><input type="text" name='name[]' placeholder='Enter Timeline' class="form-control" /></td>
                      <td><input type="text" name='name[]' placeholder='Enter Responsible' class="form-control" /></td>
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
          <button type="button" class="btn btn-primary saveButton" data-next-tab="#weapons">Save and Next</button>
        </div>
        <!-- Weapon and Ammunition -->
        <div class="tab-pane fade m-3" style="opacity: 90%;" id="weapons" tabpanel" aria-labelledby="nav-profile-tab">

          <div class="row">
            <div class="col-lg-12 spacing-right">
              <div class="row mb-2">
                <div class="form-type col-lg-3 spacing-right">
                  <h5 style="margin-bottom: -5px;">List of Weapons</h5><br>

                  Type of Weapon <br>
                  <div class="input-group" style="width: 100%;">
                    <select id="category" class="form-control mt-1" name="type_of_weapon[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                      <option value="222">222</option>
                      <option value="223">223</option>
                      <option value="30">30</option>
                    </select>
                    <div class="input-group-append" style="width: 30%;">
                      <a>
                        <button class="btn btn-primary" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                      </a>
                    </div>
                  </div>

                  Weapon Number<br> <input class="form-control" name="weapon_no[]" type="text" placeholder="..." style="width: 100%;">

                  Caliber<br> <input class="form-control" type="text" name="caliber[]" placeholder="..." style="width: 100%;">

                  Bore<br> <input class="form-control" name="bore[]" type="text" placeholder="..." style="width: 100%;">
                  Price Per Unit<br> <input class="form-control weapon-price" name="weapon_price_pu[]" type="text" placeholder="..." style="width: 100%;">

                  Quantity<br> <input class="form-control weapon-quantity" name="weapon_quantity[]" type="text" placeholder="..." style="width: 100%;">
                  Total Price<br> <input class="form-control weapon-totalprice" name="weapon_total_price[]" type="text" placeholder="..." style="width: 100%;">

                  Person Responsible for Weapon<br> <input class="form-control" type="text" name="person_responsible_weapon[]" placeholder="..." style="width: 100%;">

                  Attachments <br> <input class="form-control" name="weapon_attach[]" type="file" placeholder="..." style="width: 100%;">

                  Notes <br> <textarea class="form-control" name="weapon_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>

                  <button type="button" class="btn btn-dark" id="addWeaponButton" style="width:60%;">Add Weapon</button>
                  <div id="weaponContainer"></div>

                </div>

                <div class="form-type col-lg-3 spacing-right">
                  <h5 style="margin-bottom: -5px;">List of Ammunition</h5>
                  <br>

                  Type<br> <input class="form-control" name="ammu_type[]" type="text" placeholder="..." style="width: 100%;">

                  Person Responsible for Ammunition<br> <input class="form-control" type="text" name="person_responsible_ammu[]" placeholder="..." style="width: 100%;">

                  Price per Unit <br> <input class="form-control price" type="text" name="price_per_unit_ammu[]" placeholder="..." style="width: 100%;">

                  Quantity<br> <input class="form-control quantity" name="ammu_quantity[]" type="text" placeholder="..." style="width: 100%;">

                  Total Price <br> <input class="form-control totalprice" name="total_price_ammu[]" type="text" placeholder="..." style="width: 100%;">

                  Attachments <br> <input class="form-control" name="ammu_attach[]" type="file" placeholder="..." style="width: 100%;">

                  Notes <br> <textarea class="form-control" name="ammu_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>

                  <button type="button" class="btn btn-dark" id="addAmmuButton" style="width:80%;">Add Ammunition</button>
                  <div id="ammuContainer"></div>
                </div>

                <div class="form-type col-lg-3 spacing-right">
                  <h5 style="margin-bottom: -5px;">Armorer Details</h5> <br>

                  Name <br> <input class="form-control" name="armourer_name[]" type="text" placeholder="..." style="width: 100%;">

                  Cell Number <br> <input class="form-control" name="armourer_cell[]" type="text" placeholder="..." style="width: 100%;">

                  Attachments <br> <input class="form-control" name="armourer_attach[]" type="file" placeholder="..." style="width: 100%;">

                  Notes <br> <textarea class="form-control" name="armourer_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>

                  <button type="button" class="btn btn-dark" id="addArmButton" style="width:70%;">Add Armorer</button>
                  <div id="armContainer"></div>

                </div>

                <div class="form-type col-lg-3 spacing-right">
                  <h5 style="margin-bottom: -5px;">List of Security Equipment
                  </h5> <br>

                  Category <br> <input class="form-control" name="sec_equip_category[]" type="text" placeholder="..." style="width: 100%;">

                  Type <br> <input class="form-control" name="sec_equip_type[]" type="text" placeholder="..." style="width: 100%;">
                  Price Per Unit <br> <input class="form-control sec-price" name="sec_equip_pricepu[]" type="text" placeholder="..." style="width: 100%;">

                  Quantity <br> <input class="form-control sec-quantity" name="sec_equip_quantity[]" type="text" placeholder="..." style="width: 100%;">
                  Total Price <br> <input class="form-control sec-totalprice" name="sec_equip_totalprice[]" type="text" placeholder="..." style="width: 100%;">

                  Person Responsible for Equipments<br> <input class="form-control" type="text" name="person_responsible_sec_equip[]" placeholder="..." style="width: 100%;">

                  Attachments <br> <input class="form-control" name="sec_equip_attach[]" type="file" placeholder="..." style="width: 100%;">

                  Notes <br> <textarea class="form-control" name="sec_equip_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>

                  <br>
                  <div class="form-check form-check-inline spacing-left mt-2">
                    <input class="form-check-input" name="red_check[]" type="checkbox" id="redcheck" value="negative">
                    <label class="form-check-label" for="inlineCheckbox1">Red Flags</label>
                  </div>
                  <br>
                  <div id="quantity-field" style="display:none;">
                    Quantity <br>
                    <input class="form-control" type="text" name="red_flag_quantity[]" placeholder="..." style="width: 100%;">
                  </div>

                  <br>
                  <div>
                    <div class="form-check form-check-inline spacing-left mt-2">
                      <input class="form-check-input" name="" type="checkbox" id="bluecheck" value="negative">
                      <label class="form-check-label" for="inlineCheckbox1">Target</label>
                    </div>
                    <br>
                    <div id="blue-field" style="display:none;">
                      Quantity <br>
                      <input class="form-control" type="text" name="target_quantity[]" placeholder="..." style="width: 100%;">
                    </div>
                  </div>
                  <button type="button" class="btn btn-dark" id="addSecButton" style="width:70%;">Add Armorer</button>
                  <div id="secContainer"></div>
                </div>
              </div>

            </div>
          </div>
          <button type="button" class="btn btn-primary saveButton" data-next-tab="#facility">Save and Next</button>
        </div>
        <!-- Facility Management -->
        <div class="tab-pane fade m-3" style="opacity: 90%;" id="facility" tabpanel" aria-labelledby="nav-profile-tab">

          <div class="row">
            <div class="col-lg-12 spacing-right">
              <div class="row mb-2">
                <div class="" style="display: flex; flex-direction:row">
                  <div class="col-lg-6">
                    <div>
                      <div class="form-check form-check-inline spacing-left mt-2">
                        <input class="form-check-input" name="first_aid_check" type="checkbox" id="first-aid" value="negative">
                        <label class="form-check-label" for="inlineCheckbox1"><b>No. of First Aid Boxes required.</b></label>
                      </div>
                      <br>
                      <div id="first-quantity" style="display:none;">
                        Quantity <br>
                        <input class="form-control" name="first_aid_quantity" type="text" placeholder="..." style="width: 100%;">
                      </div>
                    </div>
                    <div>
                      <div class="form-check form-check-inline spacing-left mt-2">
                        <input class="form-check-input" name="umbrella_check" type="checkbox" id="umbrella" value="negative">
                        <label class="form-check-label" for="inlineCheckbox1"><b>No. of Umbrellas required.</b></label>
                      </div>
                      <br>
                      <div id="umbrella-quantity" style="display:none;">
                        Quantity <br>
                        <input class="form-control" name="umbrella_quantity" type="text" placeholder="..." style="width: 100%;">
                      </div>
                    </div>
                    <div>
                      <div class="form-check form-check-inline spacing-left mt-2">
                        <input class="form-check-input" name="wireless_check" type="checkbox" id="wirecheck" value="negative">
                        <label class="form-check-label" for="inlineCheckbox1"> <b>No. of Wireless Sets Required</b></label>
                      </div>
                      <br>
                      <div id="wire-field" style="display:none;">
                        Quantity <br>
                        <input class="form-control" name="wireless_quantity" type="text" placeholder="..." style="width: 100%;">
                      </div>

                    </div>
                    <div>
                      <div class="form-check form-check-inline spacing-left mt-2">
                        <input class="form-check-input" name="mega_check" type="checkbox" id="megacheck" value="negative">
                        <label class="form-check-label" for="inlineCheckbox1"><b>No. of Mega Phones Required</b></label>
                      </div>
                      <br>
                      <div id="mega-field" style="display:none;">
                        Quantity <br>
                        <input class="form-control" name="mega_phone_quantity" type="text" placeholder="..." style="width: 100%;">
                      </div>
                    </div>
                    <div>
                      <div class="form-check form-check-inline spacing-left mt-2">
                        <input class="form-check-input" name="sofa_check" type="checkbox" id="sofas" value="negative">
                        <label class="form-check-label" for="inlineCheckbox1"> <b>No. of Sofas Required</b></label>
                      </div>
                      <br>
                      <div id="sofa-field" style="display:none;">
                        Quantity <br>
                        <input class="form-control" name="sofas_quantity" type="text" placeholder="..." style="width: 100%;">
                      </div>
                    </div>
                    <div>
                      <div class="form-check form-check-inline spacing-left mt-2">
                        <input class="form-check-input" name="water_check" type="checkbox" id="water" value="negative">
                        <label class="form-check-label" for="inlineCheckbox1"><b>No. of Water Cooler Required </b></label>
                      </div>
                      <br>
                      <div id="water-field" style="display:none;">
                        Quantity <br>
                        <input class="form-control" name="watercooler_quantity" type="text" placeholder="..." style="width: 100%;">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <h5>List of Media Teams :</h5> Attachments <br> <input class="form-control" type="file" name="media_attach" placeholder="..." style="width: 100%;">

                    <label for="" class="mt-1">Notes</label>
                    <textarea class="form-control" name="media_notes" id="exampleFormControlTextarea1" rows="3"></textarea>

                    <div class="mt-2">Any More Attachments <br> <input class="form-control" type="file" name="media_attach_2" placeholder="..." style="width: 100%;">
                    </div>
                  </div>
                  <br>
                </div>

                {{-- accordion starting --}}
                <!-- Modified second accordion -->
                <div class="container my-5" id="ItemAccordionContainer">
                  <div class="accordion" id="itemAccordion">
                    <!-- Initial Accordion Item -->
                    <div class="accordion-item itemAccordion-item" id="itemEntry1">
                      <h2 class="accordion-header" id="itemHeading1" style="color: white">
                        <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse" data-target="#collapseItem1" aria-expanded="false" aria-controls="collapseItem1">
                          Item Entry 1
                        </button>
                      </h2>
                      <div id="collapseItem1" class="collapse" aria-labelledby="itemHeading1">
                        <div class="accordion-body">

                          <div id="vendorDetailsContainer">
                            <div class="col-lg-6 spacing-right">
                              <h5 class="m-0">List of Items</h5>
                              <select id="staff_category" class="form-control mt-0" name="list_items_category[]" style="width: 100%;">
                                <option value="List of Refreshment/Food Items">List of Refreshment/Food Items</option>
                                <option value="List of Catering/Crockery Items">List of Catering/Crockery Items</option>
                                <option value="List of Transport">List of Transport</option>
                              </select>
                            </div>

                            <div class="form-type col-lg-12 spacing-right">
                              <div class="d-flex mt-2">
                                <div class="col-md-3">
                                  Category<br> <input class="form-control" name="item_category[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-md-3">
                                  Type<br> <input class="form-control" name="item_type[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-md-3">
                                  Supplier <br> <input class="form-control" name="item_supplier[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-md-3">
                                  Quantity<br> <input class="form-control loi-quantity" name="item_quantity[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                              </div>
                              <div class="d-flex mt-2">
                                <div class="col-md-3">
                                  price per Unit<br> <input class="form-control loi-price" name="item_price[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-md-3">
                                  Total Price<br> <input class="form-control loi-totalprice" name="item_total_price[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-md-3">
                                  Notes <br> <textarea class="form-control" name="item_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                                <div class="col-md-3">
                                  Attachments <br> <input class="form-control" name="item_attach[]" type="file" placeholder="..." style="width: 100%;">
                                </div>

                              </div>
                            </div>

                            <h5 style="">Details of Vendor</h5>
                            <div class="d-flex">
                              <div class="col-md-3 spacing-left">
                                Name<input class="form-control" type="text" name="item_vendor[]" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-md-3">
                                Cell<br> <input class="form-control" name="vendor_cell[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-md-3">
                                Floor<br> <input class="form-control" name="vendor_floor[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-md-3">
                                Building<br> <input class="form-control" name="vendor_building[]" type="text" placeholder="..." style="width: 100%;">
                              </div>

                            </div>
                            <div class="d-flex">
                              <div class="col-md-3">
                                Block<br> <input class="form-control" name="vendor_block[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-md-3">
                                Area<br> <input class="form-control" name="vendor_area[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-md-3">
                                City<br> <input class="form-control" name="vendor_city[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-md-3">
                                Email<br> <input class="form-control" name="vendor_email[]" type="text" placeholder="..." style="width: 100%;">
                              </div>

                            </div>
                            <div class="d-flex">
                              <div class="col-md-3">
                                Website<br> <input class="form-control" name="vendor_website[]" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-md-3">
                                GPS<br> <input class="form-control" name="vendor_gps[]" id="location-input4" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete4()">
                              </div>
                              <div class="col-md-3 mt-2">
                                Notes <br> <textarea class="form-control" name="vendor_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                              </div>
                              <div class="col-md-3">
                                Attachments <br> <input class="form-control" name="vendor_attach[]" type="file" placeholder="..." style="width: 100%;">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Add More and Remove Buttons -->
                  <div class="row my-3">
                    <div class="col-lg-3">
                      <button type="button" class="btn btn-primary" id="addAccItem" style="height:30px; width:150px;">Add More Item</button>
                    </div>
                    <div class="col-lg-3">
                      <button type="button" class="btn btn-success" id="addToItemTable" style="height:30px; width:150px;">Save</button>
                    </div>
                  </div>
                </div>

                <table class="table table-bordered my-3" id="itemSummaryTable">
                  <thead>
                    <tr>
                      <th>Entry</th>
                      <th>List Of Item</th>
                      <th>Total Price</th>
                      <th>Vendor Name</th>
                      <th>Vendor Cell</th>
                      <th>Action</th>
                      <!-- Add more columns as needed -->
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Summary data will be added here dynamically -->
                  </tbody>
                </table>

                <div class="col-md-3 mt-1">
                  Estimated/Calculated Amount <br> <input class="form-control" name="estimated_amount_loi" type="text" placeholder="..." style="width: 100%;">
                </div>

                <h5 style="text-align:center"><u><b>Emergency Services</b></u></h5>
                {{--//////////////// Emergency Accordion \\\\\\\\\\\\\\\\\\\\ --}}
                <div class="container my-1">
                  <div class="accordion" id="emergencyAccordion">
                    <div class="accordion-item emergencyaccordion-item" id="emergencyEntry1">
                      <h2 class="accordion-header" id="emergencyHeading1" style="color: white">
                        <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse" data-target="#emergencyCollapse1" aria-expanded="false" aria-controls="emergencyCollapse1">
                          Emergency Entry 1
                        </button>
                      </h2>
                      <div id="emergencyCollapse1" class="collapse" aria-labelledby="emergencyHeading1">
                        <div class="accordion-body">
                          <!-- Your content for signatory entry goes here -->
                          <div class="row" id="emergencyServices_add_fields">
                            <div class=" row main-content div">
                              <div class="col-lg-6">
                                <div class="row mb-2">

                                  <div class="col-lg-6 spacing-left spacing-right form-group">
                                    Emergency Services <br>
                                    <div class="input-group" style="width: 100%;">
                                      <select id="dropdown" class="form-control mt-1" name="train_emer_ser[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                        <option value=""></option>
                                        @foreach ($trainemerser as $emerse)
                                        <option value="{{ $emerse->train_emerser_name}}">{{ $emerse->train_emerser_name }}</option>
                                        @endforeach
                                      </select>
                                      <div class="input-group-append" style="width: 30%;">
                                        <a href="{{ route('trainemerser') }}">
                                          <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 spacing-right">
                                    Picture of Department <br> <input class="form-control" name="train_emer_pic[]" type="file" placeholder="..." style="width: 100%;">
                                    <div class="col-lg-6">
                                      <!--Image Preview Biometric-->
                                      <div class="image-preview26" id="imagePreview26">
                                        <img src="" alt="Image Preview26" class="image-preview__image26" style="height: 100%; width:100%; margin-left:-15px">
                                        <span class="image-preview__default-text26"> Image Preview </span>
                                      </div>
                                    </div>
                                  </div>
                                  <h5>POC</h5>
                                  <div class="col-lg-6 spacing-right">
                                    Name. <br> <input class="form-control" id="head_office_name" name="train_emer_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-6 spacing-right">
                                    Designation. <br> <input class="form-control" id="head_office_name" name="train_emer_poc_desig[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-6 spacing-right">
                                    Cell Number. <br> <input class="form-control vldphone" id="head_office_name" name="train_emer_poc_cell[]" type="text" placeholder="..." style="width: 100%;">
                                    <div id="phoneError" class="phoneError" style="color: red"></div>
                                  </div>
                                  <div class="col-lg-6 spacing-right">
                                    Email. <br> <input class="form-control vldemail" id="head_office_name" name="train_emer_poc_email[]" type="email" placeholder="..." style="width: 100%;">
                                    <div class="emailError" style="color: red"></div>
                                  </div>

                                  <div class="col-lg-6 spacing-right">
                                    Notes. <br> <textarea class="form-control" id="w3review4" oninput="trimSpaces4()" onclick="moveCursorToStart4()" name="train_emer_poc_notes[]" type="notes" placeholder="..." style="width: 100%;"></textarea>
                                  </div>
                                  <div class="col-lg-6 spacing-right">
                                    Attachment <br> <input class="form-control" id="head_office_name" name="train_emer_poc_attach[]" type="file" placeholder="..." style="width: 100%;">
                                  </div>
                                </div>

                              </div>
                              <div class="col-lg-6 spacing-left">
                                <h5>Address :</h5>
                                <div class="row mb-2">
                                  <div class="col-lg-5 spacing-right">
                                    Office No <br> <input class="form-control" id="head_office_cell_no" name="train_emer_office[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-left">
                                    Building <br> <input class="form-control" id="head_office_cell_no" name="train_emer_building[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                </div>
                                <div class="row mb-2">
                                  <div class="col-lg-5 spacing-right">
                                    Block <br> <input class="form-control" id="head_office_cell_no" name="train_emer_block[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-left">
                                    Area <br> <input class="form-control" id="head_office_cell_no" name="train_emer_area[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                </div>
                                <div class="row mb-2">
                                  <div class="col-lg-5 spacing-right">
                                    City <br> <input class="form-control" id="head_office_cell_no" name="train_emer_city[]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-5 spacing-left">
                                    Photograph of Building <br> <input class="form-control" id="head_office_cell_no" name="train_emer_builphoto[]" type="file" placeholder="..." style="width: 100%;">
                                  </div>
                                </div>
                                <div class="row mb-2">
                                  <div class="col-lg-5 spacing-right">
                                    Email <br> <input class="form-control vldemail" id="" name="train_emer_email[]" type="text" placeholder="..." style="width: 100%;">
                                    <div class="emailError" style="color: red"></div>
                                  </div>
                                  <div class="col-lg-5 spacing-left">
                                    Website <br> <input class="form-control vldwebsite" id="" name="train_emer_web[]" type="text" placeholder="..." style="width: 100%;">
                                    <div id="websiteError" class="websiteError" style="color: red"></div>
                                  </div>
                                </div>
                                <div class="row mb-2">
                                  <div class="col-lg-10 spacing-right">
                                    Pin location <br> <input id="location-input2" class="form-control" id="" name="train_emer_pin[]" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete2()">
                                  </div>
                                  {{-- <div >
                                                                                                <br> <input class="form-control" id="" name="longitude2[]" type="hidden" placeholder="..." style="width: 100%;">
                                                                                            </div>
                                                                                            <div >
                                                                                            <br> <input class="form-control" id="" name="latitude2[]" type="hidden" placeholder="..." style="width: 100%;">
                                                                                            </div> --}}
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 spacing-left mt-2">
                              Applicable Rental Property Number <br> <input class="form-control" name="train_emer_app_rental[]" type="text" placeholder="..." style="width: 70%;" multiple>
                            </div>
                            <div class="row mb-2">
                              <div class="col-lg-6 spacing-left spacing-right mt-2">
                                Attachements <br> <input class="form-control" name="train_emer_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                              </div>
                              <div class="col-lg-6 spacing-left spacing-right mt-2">
                                Notes <br>
                                <textarea id="w3review5" oninput="trimSpaces5()" onclick="moveCursorToStart5()" class="form-control" name="train_emer_note[]" rows="2" cols="38">
                                                                                        </textarea>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Add More and Remove Buttons -->
                  <div class="row my-3">
                    <div class="col-lg-3">
                      <button type="button" class="btn btn-primary" id="addEmergency" style="height:30px; width:150px;">Add More Emergency</button>
                    </div>
                    <div class="col-lg-3">
                      <button type="button" class="btn btn-success" id="updateEmergencyTable" style="height:30px; width:150px;">Save</button>
                    </div>
                  </div>

                </div>

                <table class="table table-bordered mt-1" id="emergencySummaryTable">
                  <thead>
                    <tr>
                      <th>Entry</th>
                      <th>Emergency Services</th>
                      <th>POC Name</th>
                      <th>POC Desig</th>
                      <th>POC Cell No</th>
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
          </div>
          <button type="button" class="btn btn-primary saveButton" data-next-tab="#findings">Save and Next</button>
        </div>
        <!--findings-->
        <div class="tab-pane fade m-3" style="opacity: 90%;" id="findings" role="tabpanel" aria-labelledby="nav-contact-tab">
          <div class="row">
            <div class="col-lg-3 spacing-right">
              <h5>Incident :</h5> Attachments <br> <input class="form-control" type="file" name="incident_attach" placeholder="..." style="width: 100%;">

              <label for="" class="mt-1">Notes</label>
              <textarea class="form-control" name="incident_notes" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="col-lg-3 spacing-right">
              <h5>Suggestions :</h5> Attachments <br> <input class="form-control" type="file" name="suggestion_attach" placeholder="..." style="width: 100%;">

              <label for="" class="mt-1">Notes</label>
              <textarea class="form-control" name="suggestion_notes" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="col-lg-3 spacing-right">
              <h5>Observations :</h5> Attachments <br> <input class="form-control" type="file" name="observation_attach" placeholder="..." style="width: 100%;">

              <label for="" class="mt-1">Notes</label>
              <textarea class="form-control" name="observation_notes" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="col-lg-3 spacing-right">
              <h5>Remarks :</h5> Attachments <br> <input class="form-control" type="file" name="remarks_attach" placeholder="..." style="width: 100%;">

              <label for="" class="mt-1">Notes</label>
              <textarea class="form-control" name="remarks_notes" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

          </div>
          <button type="button" class="btn btn-primary saveButton" data-next-tab="#online-training">Save and Next</button>
        </div>
        <!--Online Training-->
        <div class="tab-pane fade m-3" style="opacity: 90%;" id="online-training" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="row">
            <h5 class="mt-2" style="margin-left: 10px;">Online Refresher Record Score Card :</h5>
            <h5 class="mt-2" style="margin-left: 40px;">Backend.. To Be Continued .....</h5>
          </div>
          <button type="button" class="btn btn-primary saveButton" data-next-tab="#range">Save and Next</button>
        </div>
        <!--Training Range-->
        <div class="tab-pane fade m-3" style="opacity: 90%;" id="range" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="col-lg-12">
            <div class=" row mb-2">
              <div class="col-lg-4 spacing-right">
                Name <br> <input class="form-control" id="" name="t_range_name" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-left spacing-right">
                Designation <br> <input class="form-control" id="" name="t_range_desig" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-right">
                Department <br> <input class="form-control" name="t_range_dept" id="" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-right">
                Cell Number <br> <input class="form-control" name="t_range_cell" id="" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-left">
                Email <br> <input class="form-control" name="t_range_email" type="text" placeholder="..." style="width: 104%;">
              </div>
              <div class="col-lg-4 spacing-right">
                Visiting Card Front <br> <input class="form-control" id="" name="t_range_front" type="file" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-right">
                Visiting Card Back <br> <input class="form-control" id="" name="t_range_back" type="file" placeholder="..." style="width: 100%;">
              </div>
            </div>
            <h5>Address of Training Range POC</h5>
            <div class="row mb-2">
              <div class="col-lg-5 spacing-right">
                Office No <br> <input class="form-control" id="" name="t_range_office" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left">
                Floor <br> <input class="form-control" id="" name="t_range_floor" type="text" placeholder="..." style="width: 100%;">
              </div>

            </div>
            <div class="row mb-2">
              <div class="col-lg-5 spacing-right">
                Building <br> <input class="form-control" id="" name="t_range_building" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left">
                Block <br> <input class="form-control" id="" name="t_range_block" type="text" placeholder="..." style="width: 100%;">
              </div>

            </div>
            <div class="row mb-2">
              <div class="col-lg-5 spacing-right">
                Area <br> <input class="form-control" id="" name="t_range_area" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left">
                City <br> <input class="form-control" id="" name="t_range_city" type="text" placeholder="..." style="width: 100%;">
              </div>

            </div>
            <div class="row mb-2">
              <div class="col-lg-5 spacing-right">
                Photograph of Location <br> <input class="form-control" id="" name="t_range_photo" type="file" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left">
                Email <br> <input class="form-control" id="" name="adress_range_email" type="text" placeholder="..." style="width: 100%;">
              </div>

            </div>
            <div class="row mb-2">
              <div class="col-lg-5 spacing-right">
                Website <br> <input class="form-control" id="" name="t_range_web" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left">
                Pin location <br> <input class="form-control" id="location-input3" name="t_range_pin" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete3()">
              </div>

            </div>
            <div class="row mb-2">
              <div class="col-lg-5 spacing-right">
                GPS <br> <input class="form-control" id="" name="t_range_gps" type="text" placeholder="..." style="width: 100%;">
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary saveButton" data-next-tab="#check">Save and Next</button>
        </div>
        <!--Checklist-->
        <div class="tab-pane fade m-3" style="opacity: 90%;" id="check" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="col-lg-11">
            <table class="table table-bordered">
              <thead>
                <tr width="100%">
                  <th width="5%">Sr</th>
                  <th width="65%">Check List</th>
                  <th width="5%">Status</th>
                  <th width="25%">Remarks</th>
                </tr>
              </thead>
              <tbody>
                <tr width="100%">
                  <td width="5%">1</td>
                  <td width="65%">Training Request Letter by GM & Nomination of Master Trainer</td>
                  <td width="5%"><input type="checkbox" name="point_one_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_one" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">2</td>
                  <td width="65%">Allocation of Training Number by Regulatory Affairs Department & Creation of Whatsapp Group</td>
                  <td width="5%"><input type="checkbox" name="point_two_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_two" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">3</td>
                  <td width="65%">Designing of Invitation Cards</td>
                  <td width="5%"><input type="checkbox" name="point_three_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_three" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">4</td>
                  <td width="65%">Request for funds by Master Trainer & Issuance of Funds by Finance Department </td>
                  <td width="5%"><input type="checkbox" name="point_four_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_four" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">5</td>
                  <td width="65%">Request Letter for Range Allocation </td>
                  <td width="5%"><input type="checkbox" name="point_five_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_five" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">6</td>
                  <td width="65%">List of Clients and Prospects for Participation </td>
                  <td width="5%"><input type="checkbox" name="point_six_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_six" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">7</td>
                  <td width="65%">List of Guests for Participation </td>
                  <td width="5%"><input type="checkbox" name="point_seven_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_seven" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">8</td>
                  <td width="65%">List of Trainees (Security Staff) </td>
                  <td width="5%"><input type="checkbox" name="point_eight_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_eight" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">9</td>
                  <td width="65%">List of Admin Staff </td>
                  <td width="5%"><input type="checkbox" name="point_nine_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_nine" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">10</td>
                  <td width="65%">List of Training Instructors Course Wise </td>
                  <td width="5%"><input type="checkbox" name="point_ten_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_ten" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">11</td>
                  <td width="65%">List of Training Aids Including Panaflex & Trainer Cards with quantity</td>
                  <td width="5%"><input type="checkbox" name="point_eleven_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_eleven" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">12</td>
                  <td width="65%">List of Weapons & Ammunition with Quantity & Caliber</td>
                  <td width="5%"><input type="checkbox" name="point_twelve_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_twelve" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">13</td>
                  <td width="65%">List of Security Equipment with Quantity</td>
                  <td width="5%"><input type="checkbox" name="point_thirteen_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_thirteen" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">14</td>
                  <td width="65%">List of Refreshment Items with Quantity</td>
                  <td width="5%"><input type="checkbox" name="point_forteen_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_forteen" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">15</td>
                  <td width="65%">List of Catering and Crockery Items with Quantity</td>
                  <td width="5%"><input type="checkbox" name="point_fifteen_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_fifteen" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">16</td>
                  <td width="65%">List of Transport with their Particulars and Quantity</td>
                  <td width="5%"><input type="checkbox" name="point_sixteen_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_sixteen" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">17</td>
                  <td width="65%">List of Media Team (Camera Man & Helper)</td>
                  <td width="5%"><input type="checkbox" name="point_seventeen_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_seventeen" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">18</td>
                  <td width="65%">List of Media Team (Camera Man & Helper)</td>
                  <td width="5%"><input type="checkbox" name="point_eighteen_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_eighteen" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">19</td>
                  <td width="65%">Individual Security Staff Training Record </td>
                  <td width="5%"><input type="checkbox" name="point_ninteen_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_ninteen" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">20</td>
                  <td width="65%">Letter of thanks to Concern Firing Range </td>
                  <td width="5%"><input type="checkbox" name="point_twenty_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_twenty" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">21</td>
                  <td width="65%">Submission of Occurence Report if any </td>
                  <td width="5%"><input type="checkbox" name="point_twentyone_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_twentyone" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">22</td>
                  <td width="65%">Submission of Observation , Suggestion and Recommendation if any </td>
                  <td width="5%"><input type="checkbox" name="point_twentytwo_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_twentytwo" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">23</td>
                  <td width="65%">Concluding Remarks by Master Trainer </td>
                  <td width="5%"><input type="checkbox" name="point_twentythree_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_twentythree" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">24</td>
                  <td width="65%">Submission of Training Report and expenses with all bills & Receipts </td>
                  <td width="5%"><input type="checkbox" name="point_twentyfour_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_twentyfour" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">25</td>
                  <td width="65%">Sharing reports with Clients </td>
                  <td width="5%"><input type="checkbox" name="point_twentyfive_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_twentyfive" /></td>
                </tr>
                <tr width="100%">
                  <td width="5%">26</td>
                  <td width="65%">Sharing training Photographs on Social Media Platforms </td>
                  <td width="5%"><input type="checkbox" name="point_twentysix_check" style="position:relative; left:25%;"></td>
                  <td width="25%"><input name="point_twentysix" /></td>
                </tr>
              </tbody>
            </table>
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
          <button type="button" class="btn btn-primary" style="background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 150px;"><i style="margin-right:30px;">Submission &#8594;</i></button>
          <div class="dropdown-content" style="display: none; position: absolute; background-color: #f9f9f9; min-width: 130px; box-shadow: 0px -8px 16px 0px rgba(0,0,0,0.2); z-index: 1; bottom: 100%;">
            <button type="submit" name="save_and_email" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & Email/Whatsapp</i></button>
            <button type="submit" name="save_and_share" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & share link</i></button>
            <button type="submit" name="save_and_new" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & New</i></button>
            <button type="submit" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & Close</i></button>
          </div>
        </div>
      </div>
    </form>

  </section>

  {{-- <!-- </div> -->
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-primary">Save Changes</button>
                            <button type="button" class="btn btn-secondary" onclick="reset_data()">RESET</button>

                        </div> --}}
</div>
<!-- </div> -->
<!-- </div> -->

<!-- </div> -->
<!--Customer form ends here-->
<!-- </div> -->

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.dropdown').addEventListener('mouseover', function() {
      document.querySelector('.dropdown-content').style.display = 'block';
    });
    document.querySelector('.dropdown').addEventListener('mouseout', function() {
      document.querySelector('.dropdown-content').style.display = 'none';
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Get the dropdown element
    var dropdown = document.querySelector('select[name="send_email_active"]');
    // Get the table container element
    var tableContainer = document.getElementById('activeTableContainer');
    // Add change event listener to the dropdown
    dropdown.addEventListener('change', function() {
      // Check if 'Yes' is selected
      if (dropdown.value === 'Yes') {
        // Show the table
        tableContainer.style.display = 'block';
      } else {
        // Hide the table
        tableContainer.style.display = 'none';
      }
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Get the dropdown element
    var dropdown = document.querySelector('select[name="send_email_inactive"]');
    // Get the table container element
    var tableContainer = document.getElementById('inactiveTableContainer');
    // Add change event listener to the dropdown
    dropdown.addEventListener('change', function() {
      // Check if 'Yes' is selected
      if (dropdown.value === 'Yes') {
        // Show the table
        tableContainer.style.display = 'block';
      } else {
        // Hide the table
        tableContainer.style.display = 'none';
      }
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var selectAllCheckbox = document.getElementById('select-all-checkbox');
    var checkboxes = document.querySelectorAll('.active_customer_check');
    var sendAllButton = document.getElementById('send-all-button');
    var modal = document.getElementById('customModal');
    var confirmButton = document.getElementById('confirm-send-email');
    var cancelButton = document.getElementById('cancel-send-email');
    var checkedCheckboxes;
    selectAllCheckbox.addEventListener('change', function() {
      checkboxes.forEach(function(checkbox) {
        checkbox.checked = selectAllCheckbox.checked;
      });
    });
    sendAllButton.addEventListener('click', function() {
      checkedCheckboxes = document.querySelectorAll('.active_customer_check:checked');
      if (checkedCheckboxes.length === 0) {
        alert('Please select at least one customer to send an email.');
        return;
      }
      modal.style.display = 'block';
    });
    confirmButton.addEventListener('click', function(event) {
      event.preventDefault();
      modal.style.display = 'none';
      var emailCC = document.getElementById('email-cc').value;
      var emailBCC = document.getElementById('email-bcc').value;
      var emailSubject = document.getElementById('email-subject').value;
      var emailBody = document.getElementById('email-body').value;
      var attachmentFile = document.getElementById("customEmailAttachment").files[0]; // Get the first selected file
      var formData = new FormData();
      formData.append('cc', emailCC);
      formData.append('bcc', emailBCC);
      formData.append('subject', emailSubject); // Ensure correct field name
      formData.append('body', emailBody); // Ensure correct field name
      // Append the attachment file to FormData
      if (attachmentFile) {
        formData.append('attachment', attachmentFile);
      }
      var customers = [];
      checkedCheckboxes.forEach(function(checkbox) {
        var customerId = checkbox.getAttribute('data-customer-id');
        var customerEmail = checkbox.getAttribute('data-customer-email');
        customers.push({
          customerId: customerId,
          email: customerEmail
        });
      });
      axios.post('/public/send-multiple-emails', formData, {
          headers: {
            'Content-Type': 'multipart/form-data' // Ensure correct content type
          },
          params: {
            customers: customers
          }
        })
        .then(function(response) {
          console.log('Axios Success:', response);
          alert(response.data.message);
        })
        .catch(function(error) {
          console.error('Axios Error:', error);
          alert('Failed to send emails.');
        });
    });
    cancelButton.addEventListener('click', function() {
      modal.style.display = 'none';
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var emailBodyTextarea = document.getElementById('email-body');
    var trainingRegionInput = document.getElementById('training_region');
    var venueInput = document.getElementById('venue');
    var nameOfRangeInput = document.getElementById('name_of_range');
    var trainingSDateInput = document.getElementById('training_s_date');
    var guestInvitationInput = document.getElementById('guest_invitation');
    var regDateInput = document.getElementById('reg_date');
    var regTimeInput = document.getElementById('reg_time');
    // Function to update the email body
    function updateEmailBody() {
      var selectedCustomers = document.querySelectorAll('.active_customer_check:checked');
      console.log("Selected Customers:", selectedCustomers);
      var customerNames = Array.from(selectedCustomers).map(customer => customer.dataset.customername).join(', ');
      console.log("Customer Names:", customerNames);
      var emailBodyTemplate = `Dear ${customerNames},

            Greetings from PIFFERS!

            Hope you are doing well. PIFFERS Security Services (Pvt.) Ltd has always given importance and remained focused on the training of the guards on a regular basis. Therefore, in order to ensure better quality standards, refreshing SOPs, Frisking procedures, Vehicle search procedures, weapon handling, and live firing, etc., PIFFERS is conducting regular training on a quarterly basis to train the guards.

            Foregoing in view, PIFFERS is arranging the above-mentioned training on ${trainingSDateInput.value} at ${trainingRegionInput.value}, ${venueInput.value}, ${nameOfRangeInput.value} to enhance professional skills and quality of services. The training of the guards will comprise the following segments:

            1) Live weapon Firing & Handling.
            2) Frisking and Search procedure.
            3) Fire Fighting & First Aid.
            4) Self-defense techniques.
            5) VIP Protection Drill.
            6) Unarmed Combat Drill.
            7) Dog Sniffing Protocol.


            Furthermore, I, on behalf of CEO/Director Lt. Cdr. Asad Qureshi (Retd.), cordially invite you to witness and participate in the live Firearms training on ${trainingSDateInput.value} at ${guestInvitationInput.value} hours. In this regard, you are kindly requested to share your particulars on <a href="mailto:ops@piffers.net">ops@piffers.net</a> by ${regTimeInput.value} on ${regDateInput.value} as mentioned below for ensuring timely admin arrangements and security clearance, etc:

            Vehicle Registration number
            Name
            CNIC
            Contact Number


            PIFFERS will feel honored to have your gracious presence to witness the Live Fire Arms Training session.

            Please ignore this email if you have already replied.

            Moreover, please feel free to contact us whenever you think we can be of any assistance.

            Thank You

            Best Regards

            Operation Department

            ${trainingRegionInput.value}

            PIFFERS Security Services (Pvt.) Ltd.`;
      emailBodyTextarea.innerHTML = emailBodyTemplate;
    }
    // Add event listeners to input fields
    trainingRegionInput.addEventListener('input', updateEmailBody);
    venueInput.addEventListener('input', updateEmailBody);
    nameOfRangeInput.addEventListener('input', updateEmailBody);
    trainingSDateInput.addEventListener('input', updateEmailBody);
    guestInvitationInput.addEventListener('input', updateEmailBody);
    regDateInput.addEventListener('input', updateEmailBody);
    regTimeInput.addEventListener('input', updateEmailBody);
    // Update email body initially
    updateEmailBody();
  });
</script>

{{--
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var inactiveCheckboxes = document.querySelectorAll('.inactive_customer_check');

            inactiveCheckboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    if (checkbox.checked) {
                        inactiveopenModal(checkbox);
                    }
                });
            });

            function inactiveopenModal(checkbox) {
                // Display the custom modal for inactive customers
                var modal = document.getElementById('inactivecustomModal');
                modal.style.display = 'block';

                // Store the customer ID and email in the modal for inactive customers
                var customerId = checkbox.getAttribute('data-customer-id');
                var customerEmail = checkbox.getAttribute('data-customer-email');
                modal.setAttribute('data-customer-id', customerId);
                modal.setAttribute('data-customer-email', customerEmail);
            }
        });
    </script>


    <script>
        function inactiveconfirmSendEmail() {
            // Get customer ID and email from the modal for inactive customers
            var modal = document.getElementById('inactivecustomModal');
            var customerId = modal.getAttribute('data-customer-id');
            var customerEmail = modal.getAttribute('data-customer-email');

            // Send email using AJAX for inactive customers
            axios.post('/send-inactive-email', { customerId: customerId, email: customerEmail })
                .then(function (response) {
                    console.log('Inactive Axios Success:', response);
                    alert(response.data.message);
                })
                .catch(function (error) {
                    console.error('Inactive Axios Error:', error);
                });

            // Close the modal for inactive customers
            inactivecloseModal();
        }
    </script>

    <script>
        function inactivecloseModal() {
            // Close the custom modal for inactive customers
            var modal = document.getElementById('inactivecustomModal');
            modal.style.display = 'none';
        }
    </script> --}}

<script>
  document.getElementById("copyIcon").addEventListener("click", function() {
    var urlInput = document.getElementById("urlInput");
    urlInput.select();
    document.execCommand("copy");
    document.getElementById("copyText").textContent = "Link copied!";
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var selectAllInactiveCheckbox = document.getElementById('select-all-inactive-checkbox');
    var inactiveCheckboxes = document.querySelectorAll('.inactive_customer_check');
    var sendInactiveButton = document.getElementById('send-inactive-button');
    var inactiveModal = document.getElementById('inactiveCustomModal');
    var inactiveConfirmButton = document.getElementById('inactive-confirm-send-email');
    var inactiveCancelButton = document.getElementById('inactive-cancel-send-email');
    var checkedInactiveCheckboxes;
    selectAllInactiveCheckbox.addEventListener('change', function() {
      inactiveCheckboxes.forEach(function(checkbox) {
        checkbox.checked = selectAllInactiveCheckbox.checked;
      });
    });
    sendInactiveButton.addEventListener('click', function() {
      checkedInactiveCheckboxes = document.querySelectorAll('.inactive_customer_check:checked');
      if (checkedInactiveCheckboxes.length === 0) {
        alert('Please select at least one inactive customer to send an email.');
        return;
      }
      inactiveModal.style.display = 'block';
    });
    inactiveConfirmButton.addEventListener('click', function(event) {
      event.preventDefault();
      inactiveModal.style.display = 'none';
      var inactiveemailCC = document.getElementById('inactive-email-cc').value;
      var inactiveemailBCC = document.getElementById('inactive-email-bcc').value;
      var emailSubject = document.getElementById('inactive-email-subject').value;
      var emailBody = document.getElementById('inactive-email-body').value;
      var attachmentFile = document.getElementById("custominactiveEmailAttachment").files[0]; // Get the first selected file
      var formData = new FormData();
      formData.append('cc', inactiveemailCC);
      formData.append('bcc', inactiveemailBCC);
      formData.append('subject', emailSubject); // Ensure correct field name
      formData.append('body', emailBody); // Ensure correct field name
      // Append the attachment file to FormData
      if (attachmentFile) {
        formData.append('attachment', attachmentFile);
      }
      var inactiveCustomers = [];
      checkedInactiveCheckboxes.forEach(function(checkbox) {
        var customerId = checkbox.getAttribute('data-customer-id');
        var customerEmail = checkbox.getAttribute('data-customer-email');
        inactiveCustomers.push({
          customerId: customerId,
          email: customerEmail
        });
      });
      axios.post('/public/send-multiple-inactive-email', formData, {
          headers: {
            'Content-Type': 'multipart/form-data' // Ensure correct content type
          },
          params: {
            customers: inactiveCustomers,
          }
        })
        .then(function(response) {
          console.log('Axios Success:', response);
          alert(response.data.message);
        })
        .catch(function(error) {
          console.error('Axios Error:', error);
          alert('Failed to send inactive emails.');
        });
    });
    inactiveCancelButton.addEventListener('click', function() {
      inactiveModal.style.display = 'none';
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var emailBodyTextarea = document.getElementById('inactive-email-body');
    var trainingRegionInput = document.getElementById('training_region');
    var venueInput = document.getElementById('venue');
    var nameOfRangeInput = document.getElementById('name_of_range');
    var trainingSDateInput = document.getElementById('training_s_date');
    var guestInvitationInput = document.getElementById('guest_invitation');
    var regDateInput = document.getElementById('reg_date');
    var regTimeInput = document.getElementById('reg_time');
    // Function to update the email body
    function updateEmailBody() {
      var emailBodyTemplate = `Dear,

            Greetings from PIFFERS!

            Hope you are doing well. PIFFERS Security Services (Pvt.) Ltd has always given importance and remained focused on the training of the guards on a regular basis. Therefore, in order to ensure better quality standards, refreshing SOPs, Frisking procedures, Vehicle search procedures, weapon handling, and live firing, etc., PIFFERS is conducting regular training on a quarterly basis to train the guards.

            Foregoing in view, PIFFERS is arranging the above-mentioned training on ${trainingSDateInput.value} at ${trainingRegionInput.value}, ${venueInput.value}, ${nameOfRangeInput.value} to enhance professional skills and quality of services. The training of the guards will comprise the following segments:

            1) Live weapon Firing & Handling.
            2) Frisking and Search procedure.
            3) Fire Fighting & First Aid.
            4) Self-defense techniques.
            5) VIP Protection Drill.
            6) Unarmed Combat Drill.
            7) Dog Sniffing Protocol.


            Furthermore, I, on behalf of CEO/Director Lt. Cdr. Asad Qureshi (Retd.), cordially invite you to witness and participate in the live Firearms training on ${trainingSDateInput.value} at ${guestInvitationInput.value} hours. In this regard, you are kindly requested to share your particulars on <a href="mailto:ops@piffers.net">ops@piffers.net</a> by ${regTimeInput.value} on ${regDateInput.value} as mentioned below for ensuring timely admin arrangements and security clearance, etc:

            Vehicle Registration number
            Name
            CNIC
            Contact Number


            PIFFERS will feel honored to have your gracious presence to witness the Live Fire Arms Training session.

            Please ignore this email if you have already replied.

            Moreover, please feel free to contact us whenever you think we can be of any assistance.

            Thank You

            Best Regards

            Operation Department

            ${trainingRegionInput.value}

            PIFFERS Security Services (Pvt.) Ltd.`;
      emailBodyTextarea.innerHTML = emailBodyTemplate;
    }
    // Add event listeners to input fields
    trainingRegionInput.addEventListener('input', updateEmailBody);
    venueInput.addEventListener('input', updateEmailBody);
    nameOfRangeInput.addEventListener('input', updateEmailBody);
    trainingSDateInput.addEventListener('input', updateEmailBody);
    guestInvitationInput.addEventListener('input', updateEmailBody);
    regDateInput.addEventListener('input', updateEmailBody);
    regTimeInput.addEventListener('input', updateEmailBody);
    // Update email body initially
    updateEmailBody();
  });
</script>

<script>
  function toggleGuardCheckboxes() {
    var guardCheckboxes = document.querySelectorAll('tbody input[type="checkbox"]');
    var selectAllGuardsCheckbox = document.getElementById('selectAllGuards');
    guardCheckboxes.forEach(function(guardCheckbox) {
      guardCheckbox.checked = selectAllGuardsCheckbox.checked;
    });
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

<script>
  const { jsPDF } = window.jspdf;
  let isSelectAll = false;

  document.addEventListener("DOMContentLoaded", function () {
    const selectAll = document.getElementById("selectAllGuards");
    const checkboxes = document.querySelectorAll(".guard-checkbox");
    const savePdfContainer = document.getElementById("savePdfContainer");
    const savePdfBtn = document.getElementById("savePdfBtn");

    // Handle select all
    selectAll.addEventListener("change", function () {
      isSelectAll = this.checked;

      checkboxes.forEach(cb => cb.checked = isSelectAll);
      toggleSaveButton();
    });



    // Handle individual checkbox change
    checkboxes.forEach(cb => {
      cb.addEventListener("change", function () {
        isSelectAll = false;
        selectAll.checked = false;
        toggleSaveButton();
      });
    });

    function toggleSaveButton() {
      const anyChecked = Array.from(document.querySelectorAll(".guard-checkbox")).some(cb => cb.checked);
      savePdfContainer.style.display = (anyChecked || isSelectAll) ? "block" : "none";
    }

    // Save PDF button
    savePdfBtn.addEventListener("click", function (e) {
      e.preventDefault();
      if (isSelectAll) {
        fetchAllAndGeneratePDF();
      } else {
        generateSelectedPDF();
      }
    });

    // Generate PDF for checked rows only
    function generateSelectedPDF() {
      const headers = [["Name", "Father Name", "Employee No", "Region", "Location"]];
      const rows = [];

      document.querySelectorAll(".guard-checkbox:checked").forEach(cb => {
        const row = cb.closest("tr");
        const columns = row.querySelectorAll("td");
        const rowData = Array.from(columns).slice(0, 5).map(td => td.innerText.trim());
        rows.push(rowData);
      });

      if (rows.length === 0) {
        alert("Please select at least one guard.");
        return;
      }

      const doc = new jsPDF();
      doc.text("Selected Guards", 14, 15);
      doc.autoTable({
        head: headers,
        body: rows,
        startY: 20,
        styles: { fontSize: 10 },
      });
      doc.save("selected_guards.pdf");
    }

    // Generate PDF from all database records via AJAX
    function fetchAllAndGeneratePDF() {
      fetch("{{ route('get.all.guards') }}")
        .then(res => res.json())
        .then(data => {
          const headers = [["Name", "Father Name", "Employee No", "Region", "Location"]];
          const rows = data.map(guard => [
            guard.name,
            guard.fname,
            guard.employee_no,
            guard.hrm_region,
            guard.hrm_location
          ]);

          const doc = new jsPDF();
          doc.text("All Guards", 14, 15);
          doc.autoTable({
            head: headers,
            body: rows,
            startY: 20,
            styles: { fontSize: 10 },
          });
          doc.save("all_guards.pdf");
        })
        .catch(err => {
          console.error(err);
          alert("Error fetching data.");
        });
    }
  });
</script>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    var checkbox = document.getElementById('inactive_customer_check');
    checkbox.addEventListener('click', function() {
      if (checkbox.checked) {
        var confirmation = confirm("Are you sure you want to send an email?");
        if (confirmation) {
          alert("Email sent!");
        } else {
          checkbox.checked = false;
        }
      }
    });
  });
</script>

<script>
  document.getElementById('showtable').addEventListener('change', function() {
    var tableContainer = document.getElementById('guardTableContainer');
    tableContainer.style.display = this.checked ? 'block' : 'none';
  });
</script>

<script>
  const evCheckbox = document.getElementById('evCheckbox');
  const everythingDiv = document.getElementById('accordionContainer');
  evCheckbox.addEventListener('change', function() {
    if (evCheckbox.checked) {
      everythingDiv.style.display = 'none';
    } else {
      everythingDiv.style.display = 'block';
    }
  });
</script>

<script>
  const naCheckbox = document.getElementById('naCheckbox');
  const rangeDiv = document.getElementById('rangeCheck');
  naCheckbox.addEventListener('change', function() {
    if (naCheckbox.checked) {
      rangeDiv.style.display = 'none';
    } else {
      rangeDiv.style.display = 'block';
    }
  });
</script>

<script>
  const tarCheckbox = document.getElementById('tarCheckbox');
  const targetDiv = document.getElementById('targetCheck');
  tarCheckbox.addEventListener('change', function() {
    if (tarCheckbox.checked) {
      targetDiv.style.display = 'none';
    } else {
      targetDiv.style.display = 'block';
    }
  });
</script>

<script>
  const faCheckbox = document.getElementById('faCheckbox');
  const foodDiv = document.getElementById('foodCheck');
  faCheckbox.addEventListener('change', function() {
    if (faCheckbox.checked) {
      foodDiv.style.display = 'none';
    } else {
      foodDiv.style.display = 'block';
    }
  });
</script>

<script>
  const aaCheckbox = document.getElementById('aaCheckbox');
  const ammuDiv = document.getElementById('ammuCheck');
  aaCheckbox.addEventListener('change', function() {
    if (aaCheckbox.checked) {
      ammuDiv.style.display = 'none';
    } else {
      ammuDiv.style.display = 'block';
    }
  });
</script>

<script>
  const taCheckbox = document.getElementById('taCheckbox');
  const transDiv = document.getElementById('transCheck');
  taCheckbox.addEventListener('change', function() {
    if (taCheckbox.checked) {
      transDiv.style.display = 'none';
    } else {
      transDiv.style.display = 'block';
    }
  });
</script>

<script>
  const saCheckbox = document.getElementById('saCheckbox');
  const secDiv = document.getElementById('secCheck');
  saCheckbox.addEventListener('change', function() {
    if (saCheckbox.checked) {
      secDiv.style.display = 'none';
    } else {
      secDiv.style.display = 'block';
    }
  });
</script>

<script>
  const maCheckbox = document.getElementById('maCheckbox');
  const mediaDiv = document.getElementById('mediaCheck');
  maCheckbox.addEventListener('change', function() {
    if (maCheckbox.checked) {
      mediaDiv.style.display = 'none';
    } else {
      mediaDiv.style.display = 'block';
    }
  });
</script>

<script>
  const caCheckbox = document.getElementById('caCheckbox');
  const crocDiv = document.getElementById('crocCheck');
  caCheckbox.addEventListener('change', function() {
    if (caCheckbox.checked) {
      crocDiv.style.display = 'none';
    } else {
      crocDiv.style.display = 'block';
    }
  });
</script>

<script>
  document.getElementById("submit-category").addEventListener("click", function() {
    var customCategory = document.getElementById("custom-category").value;
    var select = document.getElementById("category");
    var option = document.createElement("option");
    option.text = customCategory;
    option.value = customCategory;
    select.add(option);
  });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    var index = 0;
    $('#addMoreCheckbox').on('click', function() {
      index++;
      var inputHtml = '<input type="text" class="form-control currencyName" placeholder="New Activity ' + index + '">';
      var checkboxHtml = '<div class="form-check form-check-inline"><input class="form-check-input" name="compliances[]" type="checkbox" id="inlineCheckbox' + (index + 5) + '">' + inputHtml + '</div>';
      $('#new-check').append(checkboxHtml);
      // Update the newly added input field to create a corresponding label for the checkbox
      $('.currencyName').last().on('blur', function() {
        var checkboxId = $(this).siblings('input[type="checkbox"]').attr('id');
        var labelHtml = '<label class="form-check-label" for="' + checkboxId + '">' + $(this).val() + '</label>';
        $(this).siblings('input[type="checkbox"]').after(labelHtml);
        $(this).hide(); // Hide the input field after the label is created
      });
    });
  });
</script>

<script>
  $(document).ready(function() {
    $('#validateBtn').click(function() {
      console.log("Button clicked!");
      var isValid = true;
      // Select all input fields by their IDs and validate
      $('#training_no').each(function() {
        var trimmedValue = $.trim($(this).val());
        console.log(trimmedValue); // Log the trimmed value
        if (trimmedValue === '') { // Check if trimmed value is empty string
          isValid = false;
          return false;
        }
      });
      if (isValid) {
        $('#validationMessage').removeClass('text-danger').addClass('text-success').html('<strong>Success : Mandatory fields are valid and Saved..!</strong>');
        enableTab();
      } else {
        $('#validationMessage').removeClass('text-success').addClass('text-danger').html('<strong>Error : Training Number is required required to access below tabs..!</strong>');
        disableTab();
      }
    });
    // Function to enable the tab and show its content
    function enableTab() {
      $('#nav-home-tab').removeClass('disabled');
      $('#nav-home-tab').attr('data-toggle', 'tab');
      $('#correspondence').removeClass('d-none'); // Show the content of the tab
    }
    // Function to disable the tab and hide its content
    function disableTab() {
      $('#nav-home-tab').addClass('disabled');
      $('#nav-home-tab').removeAttr('data-toggle');
      $('#correspondence').addClass('d-none'); // Hide the content of the tab
    }
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var successMessage = '{{ session("success") }}';
    var trainingId = '{{ session("trainingId") }}';
    if (successMessage && trainingId) {
      var url = '{{ route("viewtrain", ":id") }}';
      url = url.replace(':id', trainingId);
      var popupMessage = 'Training data stored successfully. Please find the URL below:';
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

<script>
  var emergencyServicesRoom = 1;

  function emergencyServices_add_fields() {
    emergencyServicesRoom++;
    var objTo = document.getElementById('emergencyServices_add_fields');
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "third-col removeclass" + emergencyServicesRoom);
    divtest.innerHTML = `
                <div class="row">
                    <div class=" row main-content div">
                        <div class="col-lg-6">
                            <div class="row mb-2">
                                <div class="col-lg-6 spacing-left spacing-right form-group">
                                    Emergency Services <br>
                                        <div class="input-group" style="width: 100%;">
                                            <select id="dropdown" class="form-control mt-1" name="train_emer_ser[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value=""></option>
                                                @foreach ($trainemerser as $emerse)
                                                    <option value="{{ $emerse->train_emerser_name}}">{{ $emerse->train_emerser_name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append" style="width: 30%;">
                                                <a href="{{ route('trainemerser') }}">
                                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                </a>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Picture of Police Station <br> <input class="form-control" name="train_emer_pic[]" type="file" placeholder="..." style="width: 100%;">
                                    <div class="col-lg-6">
                                        <!--Image Preview Biometric-->
                                        <div class="image-preview26" id="imagePreview26">
                                            <img src="" alt="Image Preview26" class="image-preview__image26" style="height: 100%; width:100%; margin-left:-15px">
                                            <span class="image-preview__default-text26"> Image Preview </span>
                                        </div>
                                    </div>
                                </div>
                                <h5>POC</h5>
                                <div class="col-lg-6 spacing-right">
                                    Name. <br> <input class="form-control" id="head_office_name" name="train_emer_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Designation. <br> <input class="form-control" id="head_office_name" name="train_emer_poc_desig[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Cell Number. <br> <input class="form-control" id="head_office_name" name="train_emer_poc_cell[]" type="text" placeholder="..." style="width: 100%;">

                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Email. <br> <input class="form-control " id="head_office_name" name="train_emer_poc_email[]" type="text" placeholder="..." style="width: 100%;">

                                </div>

                                <div class="col-lg-6 spacing-right">
                                    Notes. <br> <textarea class="form-control" id="head_office_name" name="train_emer_poc_notes[]" type="notes" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Attachment <br> <input class="form-control" id="head_office_name" name="train_emer_poc_attach[]" type="file" placeholder="..." style="width: 100%;">
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 spacing-left">
                            <h5>Address :</h5>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Office No <br> <input class="form-control" id="head_office_cell_no" name="train_emer_office[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left">
                                    Building <br> <input class="form-control" id="head_office_cell_no" name="train_emer_building[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Block <br> <input class="form-control" id="head_office_cell_no" name="train_emer_block[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left">
                                    Area <br> <input class="form-control" id="head_office_cell_no" name="train_emer_area[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    City <br> <input class="form-control" id="head_office_cell_no" name="train_emer_city[]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left">
                                    Photograph of Building <br> <input class="form-control" id="head_office_cell_no" name="train_emer_photobuild[]" type="file" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Email <br> <input class="form-control " id="" name="train_emer_email[]" type="text" placeholder="..." style="width: 100%;">

                                </div>
                                <div class="col-lg-5 spacing-left">
                                    Website <br> <input class="form-control " id="" name="train_emer_web[]" type="text" placeholder="..." style="width: 100%;">

                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right">
                                    Pin location <br> <input class="form-control" id="" name="train_emer_pin[]" type="text" placeholder="..." style="width: 100%;">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 spacing-right mt-2">
                    Applicable Rental Property Number <br> <input class="form-control" name="train_emer_app_rental[]" type="text" placeholder="..." style="width: 70%;" multiple>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-6 spacing-right spacing-right mt-2">
                            Attachements <br> <input class="form-control" name="train_emer_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                            Notes <br>
                            <textarea id="w3review" class="form-control" name="train_emer_note[]" rows="2" cols="38">
                            </textarea>
                        </div>
                    </div>
                </div>

                <div style="width: 50%;">
                    <button class="btn btn-primary" type="button" onclick="emergencyServices_remove_fields(${emergencyServicesRoom})" >Remove</button>
                </div>
            `;
    objTo.appendChild(divtest);
  }

  function emergencyServices_remove_fields(rid) {
    $('.removeclass' + rid).remove();
  }
</script>

<script>
  var budgetRoom = 1;

  function addBudgetSection() {
    budgetRoom++;
    var objTo = document.getElementById('budgetDetailsContainer');
    var divTest = document.createElement("div");
    divTest.setAttribute("class", "removeclass" + budgetRoom);
    divTest.innerHTML = `
            <div id="everything">
                <div class="row budgetContainer" id="budgetDetailsContainer">
                    <div class="col-lg-12 spacing-right">
                        <div class="row mb-2">
                            <div class="d-flex">
                                <div class="col-lg-6 spacing-right">
                                    Category <br>
                                    <select id="staff_category" class="form-control mt-2" name="budget_category[]" style="width: 100%;">
                                        <option value="Range Fees">Range Fees</option>
                                        <option value="Target Fees">Target Fees</option>
                                        <option value="Food Cost">Food Cost</option>
                                        <option value="Ammunition Cost">Ammunition Cost</option>
                                        <option value="Transportation Cost">Transportation Cost</option>
                                        <option value="Security Equipment Cost">Security Equipment Cost</option>
                                        <option value="Media">Media</option>
                                        <option value="Crockery">Crockery</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 spacing-right">
                                    Mode Of Payment <br>
                                    <select id="staff_category" class="form-control mt-2" name="mode_of_payment[]" style="width: 100%;">
                                        <option value="">Cheque</option>
                                        <option value="">Cash</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        Instrument No <br> <input class="form-control" name="budget_ins_no[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-md-3">
                                        Name Of Bank <br> <input class="form-control" name="name_of_bank[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-md-3">
                                        Date of Payment <br> <input class="form-control" name="date_of_payment[]" type="date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-md-3">
                                        Amount Per Unit <br> <input class="form-control BudgetAmountPerUnit" name="amount_per_unit[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="d-flex mt-1">
                                    <div class="col-md-3">
                                        Quantity <br> <input class="form-control BudgetQuantity" name="quantity[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-md-3">
                                        Total Amount <br> <input class="form-control BudgetTotalAmount" name="total_amount[]" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-md-3">
                                        Cheque <br> <input class="form-control" name="cheque_attach[]" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-md-3">
                                        Voucher <br> <input class="form-control" name="voucher_attach[]" type="file" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                            </div>

                            <div class="new_branch mt-2">
                                <button type="button" id="removeBudgetSection" onclick="removeBudgetSection(${budgetRoom})">
                                    Remove
                                </button>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            `;
    objTo.appendChild(divTest);
  }

  function removeBudgetSection(rid) {
    var element = document.querySelector('.removeclass' + rid);
    element.parentNode.removeChild(element);
  }
</script>

<script>
  var vendorRoom = 1;

  function addVendorDetails() {
    vendorRoom++;
    var objTo = document.getElementById('vendorDetailsContainer');
    var divTest = document.createElement("div");
    divTest.setAttribute("class", "removeclass" + vendorRoom);
    divTest.innerHTML = `
            <div id="vendorDetailsContainer">
                <div class="col-lg-6 spacing-right">
                    <h5 class="m-0">List of Items</h5>
                    <select id="staff_category" class="form-control mt-0" name="list_items_category[]" style="width: 100%;">
                        <option value="List of Refreshment/Food Items">List of Refreshment/Food Items</option>
                        <option value="List of Catering/Crockery Items">List of Catering/Crockery Items</option>
                        <option value="List of Transport">List of Transport</option>
                    </select>
                </div>

                <div class="form-type col-lg-12 spacing-right">
                    <div class="d-flex mt-2">
                        <div class="col-md-3">
                            Category<br> <input class="form-control" name="item_category[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-md-3">
                            Type<br> <input class="form-control" name="item_type[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-md-3">
                            Supplier <br> <input class="form-control" name="item_supplier[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-md-3">
                            Quantity<br> <input class="form-control" name="item_quantity[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="d-flex mt-2">
                        <div class="col-md-3">
                            price per Unit<br> <input class="form-control" name="item_price[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-md-3">
                            Total Price<br> <input class="form-control" name="item_total_price[]" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-md-3">
                            Notes <br> <textarea class="form-control" name="item_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                        </div>
                        <div class="col-md-3">
                            Attachments <br> <input class="form-control" name="item_attach[]" type="file" placeholder="..." style="width: 100%;">
                        </div>

                    </div>
                </div>

                <h5 style="">Details of Vendor</h5>
                <div class="d-flex">
                    <div class="col-md-3 spacing-left">
                        Name<input class="form-control" type="text" name="item_vendor[]" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-md-3">
                        Cell<br> <input class="form-control" name="vendor_cell[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-md-3">
                        Floor<br> <input class="form-control" name="vendor_floor[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-md-3">
                        Building<br> <input class="form-control" name="vendor_building[]" type="text" placeholder="..." style="width: 100%;">
                    </div>

                </div>
                <div class="d-flex">
                    <div class="col-md-3">
                        Block<br> <input class="form-control" name="vendor_block[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-md-3">
                        Area<br> <input class="form-control" name="vendor_area[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-md-3">
                        City<br> <input class="form-control" name="vendor_city[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-md-3">
                        Email<br> <input class="form-control" name="vendor_email[]" type="text" placeholder="..." style="width: 100%;">
                    </div>

                </div>
                <div class="d-flex">
                    <div class="col-md-3">
                        Website<br> <input class="form-control" name="vendor_website[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-md-3">
                        GPS<br> <input class="form-control" name="vendor_gps[]" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-md-3 mt-2">
                        Notes <br> <textarea class="form-control" name="vendor_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                    </div>
                    <div class="col-md-3">
                        Attachments <br> <input class="form-control" name="vendor_attach[]" type="file" placeholder="..." style="width: 100%;">
                    </div>
                </div>
            </div>
                <div class="new_branch mt-2">
                    <button type="button" onclick="removeVendorDetails(${vendorRoom})">
                        Remove
                    </button>
                </div>
                <hr>
            `;
    objTo.appendChild(divTest);
  }

  function removeVendorDetails(rid) {
    var element = document.querySelector('.removeclass' + rid);
    element.parentNode.removeChild(element);
  }
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Get the button element
    const addButton = document.getElementById("addWeaponButton");
    // Get the container element
    const container = document.getElementById("weaponContainer");
    // Add a click event listener to the "Add Weapon" button
    addButton.addEventListener("click", function() {
      // Create a new div element
      const newDiv = document.createElement("div");
      // Add a class to the new div for styling
      newDiv.classList.add("weapon-section");
      // Set the content for the new div
      newDiv.innerHTML = `
                    Type of Weapon : <br>
                    <select class="form-control mt-1" name="type_of_weapon[]" style="width: 100%;">
                        <option value="222">222</option>
                        <option value="223">223</option>
                        <option value="30">30</option>
                    </select>
                    Weapon Number<br> <input class="form-control" name="weapon_no[]" type="text" placeholder="..." style="width: 100%;">
                    Caliber<br> <input class="form-control" name="caliber[]" type="text" placeholder="..." style="width: 100%;">
                    Bore<br> <input class="form-control" name="bore[]" type="text" placeholder="..." style="width: 100%;">
                    Price Per Unit<br> <input
                    class="form-control weapon-price" name="weapon_price_pu[]" type="text" placeholder="..."
                    style="width: 100%;">
                    Quantity<br> <input class="form-control" name="weapon_quantity[]" type="text" placeholder="..." style="width: 100%;">
                    Total Price<br> <input
                    class="form-control weapon-totalprice" name="weapon_total_price[]" type="text" placeholder="..."
                    style="width: 100%;">

                    Person Responsible for Weapon<br> <input class="form-control" name="person_responsible_weapon[]" type="text" placeholder="..." style="width: 100%;">
                    Attachments <br> <input class="form-control" name="weapon_attach[]" type="file" placeholder="..." style="width: 100%;">
                    Notes <br> <textarea class="form-control" name="weapon_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                    <button class="btn btn-dark remove-section" type="button">Remove</button>
                `;
      // Append the new div to the container
      container.appendChild(newDiv);
      // Add a click event listener to the "Remove" button
      const removeButton = newDiv.querySelector(".remove-section");
      removeButton.addEventListener("click", function() {
        container.removeChild(newDiv); // Remove the section when the "Remove" button is clicked
      });
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Get the button element
    const addButton = document.getElementById("addAmmuButton");
    // Get the container element
    const container = document.getElementById("ammuContainer");
    // Add a click event listener to the "Add Weapon" button
    addButton.addEventListener("click", function() {
      // Create a new div element
      const newDiv = document.createElement("div");
      // Add a class to the new div for styling
      newDiv.classList.add("ammu-section");
      // Set the content for the new div
      newDiv.innerHTML = `

                Type<br> <input class="form-control " name="ammu_type[]" type="text"
                    placeholder="..." style="width: 100%;">

                Person Responsible for Ammunition<br> <input
                class="form-control " type="text" name="person_responsible_ammu[]" placeholder="..."
                style="width: 100%;">

                Price per Unit <br> <input class="form-control price"
                    type="text" name="price_per_unit_ammu[]" placeholder="..."
                    style="width: 100%;">

                Quantity<br> <input class="form-control quantity" name="ammu_quantity[]" type="text"
                placeholder="..." style="width: 100%;">

                Total Price <br> <input class="form-control totalprice" name="total_price_ammu[]" type="text"
                    placeholder="..." style="width: 100%;">

                Attachments <br> <input class="form-control" name="ammu_attach[]" type="file"
                placeholder="..." style="width: 100%;">

                Notes <br> <textarea class="form-control" name="ammu_notes[]" type="text"
                placeholder="..." style="width: 100%;"></textarea>
                <button class="btn btn-dark remove-ammu-section" type="button">Remove</button>
            `;
      // Append the new div to the container
      container.appendChild(newDiv);
      // Add a click event listener to the "Remove" button
      const removeButton = newDiv.querySelector(".remove-ammu-section");
      removeButton.addEventListener("click", function() {
        container.removeChild(newDiv); // Remove the section when the "Remove" button is clicked
      });
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Get the button element
    const addButton = document.getElementById("addArmButton");
    // Get the container element
    const container = document.getElementById("armContainer");
    // Add a click event listener to the "Add Weapon" button
    addButton.addEventListener("click", function() {
      // Create a new div element
      const newDiv = document.createElement("div");
      // Add a class to the new div for styling
      newDiv.classList.add("arm-section");
      // Set the content for the new div
      newDiv.innerHTML = `

            Name <br> <input class="form-control" name="armourer_name[]" type="text"
            placeholder="..." style="width: 100%;">

            Cell Number <br> <input class="form-control" name="armourer_cell[]" type="text"
            placeholder="..." style="width: 100%;">

            Attachments <br> <input class="form-control" name="armourer_attach[]" type="file"
            placeholder="..." style="width: 100%;">

            Notes <br> <textarea class="form-control" name="armourer_notes" type="text"
            placeholder="..." style="width: 100%;"></textarea>
            <button class="btn btn-dark remove-arm-section" type="button">Remove</button>
        `;
      // Append the new div to the container
      container.appendChild(newDiv);
      // Add a click event listener to the "Remove" button
      const removeButton = newDiv.querySelector(".remove-arm-section");
      removeButton.addEventListener("click", function() {
        container.removeChild(newDiv); // Remove the section when the "Remove" button is clicked
      });
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Get the button element
    const addButton = document.getElementById("addSecButton");
    // Get the container element
    const container = document.getElementById("secContainer");
    // Add a click event listener to the "Add Weapon" button
    addButton.addEventListener("click", function() {
      // Create a new div element
      const newDiv = document.createElement("div");
      // Add a class to the new div for styling
      newDiv.classList.add("sec-section");
      // Set the content for the new div
      newDiv.innerHTML = `

            Category <br> <input class="form-control" name="sec_equip_category[]" type="text"
                placeholder="..." style="width: 100%;">

            Type <br> <input class="form-control" name="sec_equip_type[]" type="text"
                placeholder="..." style="width: 100%;">

                Price Per Unit <br> <input class="form-control sec-price" name="sec_equip_pricepu[]" type="text"
                    placeholder="..." style="width: 100%;">

                Quantity <br> <input class="form-control sec-quantity" name="sec_equip_quantity[]" type="text"
                    placeholder="..." style="width: 100%;">
                Total Price <br> <input class="form-control sec-totalprice" name="sec_equip_totalprice[]" type="text"
                    placeholder="..." style="width: 100%;">


            Person Responsible for Equipments<br> <input
                class="form-control" type="text" name="person_responsible_sec_equip[]" placeholder="..."
                style="width: 100%;">

            Attachments <br> <input class="form-control" name="sec_equip_attach[]" type="file"
            placeholder="..." style="width: 100%;">

            Notes <br> <textarea class="form-control" name="sec_equip_notes[]" type="text"
            placeholder="..." style="width: 100%;"></textarea>

            <div id="quantity-field">
                Red Flag Qunatity <br>
                <input class="form-control" type="text" name="red_flag_quantity[]" placeholder="..." style="width: 100%;">
            </div>

            <div id="blue-field">
                Target Quantity <br>
                <input class="form-control" type="text" name="target_quantity[]" placeholder="..." style="width: 100%;">
            </div>

        <button class="btn btn-dark remove-sec-section mt-1" type="button">Remove</button>
        `;
      // Append the new div to the container
      container.appendChild(newDiv);
      // Add a click event listener to the "Remove" button
      const removeButton = newDiv.querySelector(".remove-sec-section");
      removeButton.addEventListener("click", function() {
        container.removeChild(newDiv); // Remove the section when the "Remove" button is clicked
      });
    });
  });
</script>

<script>
  const myCheckbox = document.getElementById('myCheckbox');
  const hiddenElements = document.querySelectorAll('.hidden-content');
  myCheckbox.addEventListener('click', function() {
    hiddenElements.forEach(element => {
      if (this.checked) {
        element.style.display = 'block';
      } else {
        element.style.display = 'none';
      }
    });
  });
</script>

<script>
  const myCheckbox1 = document.getElementById('myCheckbox1');
  const hiddenElements1 = document.querySelectorAll('.hidden-content1');
  myCheckbox1.addEventListener('click', function() {
    hiddenElements1.forEach(element => {
      if (this.checked) {
        element.style.display = 'block';
      } else {
        element.style.display = 'none';
      }
    });
  });
</script>

<script>
  const myCheckbox2 = document.getElementById('myCheckbox2');
  const hiddenElements2 = document.querySelectorAll('.hidden-content2');
  myCheckbox2.addEventListener('click', function() {
    hiddenElements2.forEach(element => {
      if (this.checked) {
        element.style.display = 'block';
      } else {
        element.style.display = 'none';
      }
    });
  });
</script>

<script>
  const myCheckbox3 = document.getElementById('myCheckbox3');
  const hiddenElements3 = document.querySelectorAll('.hidden-content3');
  myCheckbox3.addEventListener('click', function() {
    hiddenElements3.forEach(element => {
      if (this.checked) {
        element.style.display = 'block';
      } else {
        element.style.display = 'none';
      }
    });
  });
</script>

<script>
  const myCheckbox4 = document.getElementById('myCheckbox4');
  const hiddenElements4 = document.querySelectorAll('.hidden-content4');
  myCheckbox4.addEventListener('click', function() {
    hiddenElements4.forEach(element => {
      if (this.checked) {
        element.style.display = 'block';
      } else {
        element.style.display = 'none';
      }
    });
  });
</script>

<script>
  const myCheckbox5 = document.getElementById('myCheckbox5');
  const hiddenElements5 = document.querySelectorAll('.hidden-content5');
  myCheckbox5.addEventListener('click', function() {
    hiddenElements5.forEach(element => {
      if (this.checked) {
        element.style.display = 'block';
      } else {
        element.style.display = 'none';
      }
    });
  });
</script>

<script>
  const myCheckbox6 = document.getElementById('myCheckbox6');
  const hiddenElements6 = document.querySelectorAll('.hidden-content6');
  myCheckbox6.addEventListener('click', function() {
    hiddenElements6.forEach(element => {
      if (this.checked) {
        element.style.display = 'block';
      } else {
        element.style.display = 'none';
      }
    });
  });
</script>

<script>
  const myCheckbox7 = document.getElementById('myCheckbox7');
  const hiddenElements7 = document.querySelectorAll('.hidden-content7');
  myCheckbox7.addEventListener('click', function() {
    hiddenElements7.forEach(element => {
      if (this.checked) {
        element.style.display = 'block';
      } else {
        element.style.display = 'none';
      }
    });
  });
</script>

<script>
  const myCheckbox8 = document.getElementById('myCheckbox8');
  const hiddenElements8 = document.querySelectorAll('.hidden-content8');
  myCheckbox8.addEventListener('click', function() {
    hiddenElements8.forEach(element => {
      if (this.checked) {
        element.style.display = 'block';
      } else {
        element.style.display = 'none';
      }
    });
  });
</script>

<script>
  const myCheckbox9 = document.getElementById('myCheckbox9');
  const hiddenElements9 = document.querySelectorAll('.hidden-content9');
  myCheckbox9.addEventListener('click', function() {
    hiddenElements9.forEach(element => {
      if (this.checked) {
        element.style.display = 'block';
      } else {
        element.style.display = 'none';
      }
    });
  });
</script>
<script>
  const myCheckbox10 = document.getElementById('myCheckbox10');
  const hiddenElements10 = document.querySelectorAll('.hidden-content10');
  myCheckbox10.addEventListener('click', function() {
    hiddenElements10.forEach(element => {
      if (this.checked) {
        element.style.display = 'block';
      } else {
        element.style.display = 'none';
      }
    });
  });
</script>

<!--End for the page content-->
<script>
  const checkbox = document.getElementById('redcheck');
  const quantityField = document.getElementById('quantity-field');
  checkbox.addEventListener('change', (event) => {
    if (event.target.checked) {
      quantityField.style.display = 'block';
    } else {
      quantityField.style.display = 'none';
    }
  });
</script>

<script>
  const checkbox1 = document.getElementById('wirecheck');
  const wireField = document.getElementById('wire-field');
  checkbox1.addEventListener('change', (event) => {
    if (event.target.checked) {
      wireField.style.display = 'block';
    } else {
      wireField.style.display = 'none';
    }
  });
</script>

<script>
  const checkbox2 = document.getElementById('megacheck');
  const megaField = document.getElementById('mega-field');
  checkbox2.addEventListener('change', (event) => {
    if (event.target.checked) {
      megaField.style.display = 'block';
    } else {
      megaField.style.display = 'none';
    }
  });
</script>

<script>
  const sofacheckbox = document.getElementById('sofas');
  const sofaquantityField = document.getElementById('sofa-field');
  sofacheckbox.addEventListener('change', (event) => {
    if (event.target.checked) {
      sofaquantityField.style.display = 'block';
    } else {
      sofaquantityField.style.display = 'none';
    }
  });
</script>

<script>
  const watercheckbox = document.getElementById('water');
  const waterquantityField = document.getElementById('water-field');
  watercheckbox.addEventListener('change', (event) => {
    if (event.target.checked) {
      waterquantityField.style.display = 'block';
    } else {
      waterquantityField.style.display = 'none';
    }
  });
</script>

<script>
  const checkboxes = document.getElementById('bluecheck');
  const quantityFields = document.getElementById('blue-field');
  checkboxes.addEventListener('change', (event) => {
    if (event.target.checked) {
      quantityFields.style.display = 'block';
    } else {
      quantityFields.style.display = 'none';
    }
  });
</script>

<script>
  const check = document.getElementById('first-aid');
  const quantity = document.getElementById('first-quantity');
  check.addEventListener('change', (event) => {
    if (event.target.checked) {
      quantity.style.display = 'block';
    } else {
      quantity.style.display = 'none';
    }
  });
</script>

<script>
  const checkboxe = document.getElementById('umbrella');
  const quantityF = document.getElementById('umbrella-quantity');
  checkboxe.addEventListener('change', (event) => {
    if (event.target.checked) {
      quantityF.style.display = 'block';
    } else {
      quantityF.style.display = 'none';
    }
  });
</script>

<script>
  function reset_data() {
    document.getElementById("myForm").reset();
  }
</script>

<script>
  const sendToRegionCheckbox = document.getElementById('send-to-region');
  const sendEmailOptions = document.getElementById('send-email-options');
  sendToRegionCheckbox.addEventListener('change', () => {
    if (sendToRegionCheckbox.checked) {
      sendEmailOptions.style.display = 'block';
    } else {
      sendEmailOptions.style.display = 'none';
    }
  });
</script>

<script>
  const sendToActiveCheckbox = document.getElementById('send-to-active');
  const sendActiveOptions = document.getElementById('send-active-options');
  sendToActiveCheckbox.addEventListener('change', () => {
    if (sendToActiveCheckbox.checked) {
      sendActiveOptions.style.display = 'block';
    } else {
      sendActiveOptions.style.display = 'none';
    }
  });
</script>

<script>
  const sendToInActiveCheckbox = document.getElementById('send-to-inactive');
  const sendInActiveOptions = document.getElementById('send-inactive-options');
  sendToInActiveCheckbox.addEventListener('change', () => {
    if (sendToInActiveCheckbox.checked) {
      sendInActiveOptions.style.display = 'block';
    } else {
      sendInActiveOptions.style.display = 'none';
    }
  });
</script>

<script>
  (function($bs) {
    const CLASS_NAME = 'has-child-dropdown-show';
    $bs.Dropdown.prototype.toggle = function(_orginal) {
      return function() {
        document.querySelectorAll('.' + CLASS_NAME).forEach(function(e) {
          e.classList.remove(CLASS_NAME);
        });
        let dd = this._element.closest('.dropdown').parentNode.closest('.dropdown');
        for (; dd && dd !== document; dd = dd.parentNode.closest('.dropdown')) {
          dd.classList.add(CLASS_NAME);
        }
        return _orginal.call(this);
      }
    }($bs.Dropdown.prototype.toggle);
    document.querySelectorAll('.dropdown').forEach(function(dd) {
      dd.addEventListener('hide.bs.dropdown', function(e) {
        if (this.classList.contains(CLASS_NAME)) {
          this.classList.remove(CLASS_NAME);
          e.preventDefault();
        }
        if (e.clickEvent && e.clickEvent.composedPath().some(el => el.classList && el
            .classList.contains('dropdown-toggle'))) {
          e.preventDefault();
        }
        e.stopPropagation(); // do not need pop in multi level mode
      });
    });
    // for hover
    function getDropdown(element) {
      return $bs.Dropdown.getInstance(element) || new $bs.Dropdown(element);
    }
    document.querySelectorAll('.dropdown-hover, .dropdown-hover-all .dropdown').forEach(function(dd) {
      dd.addEventListener('mouseenter', function(e) {
        let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
        if (!toggle.classList.contains('show')) {
          getDropdown(toggle).toggle();
        }
      });
      dd.addEventListener('mouseleave', function(e) {
        let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
        if (toggle.classList.contains('show')) {
          getDropdown(toggle).toggle();
        }
      });
    });
  })(bootstrap);
</script>

<script>
  function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
  }
</script>

<!--Field Addition-->
<script>
  // Education Add Fields
  var room1 = 1;

  function education_add_fields() {
    room1++;
    var objTo = document.getElementById('education_add_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "first-col removeclass" + room1);
    var rdiv = 'removeclass' + room1;
    divtest.innerHTML =
      '<div class="row"> <div class="col-lg-6 spacing-right"> <div class="row mb-2"> <div class="form-type col-lg-3 spacing-right"> Name of Degree <br> <input class="form-control" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;"> </div> <div class="form-type col-lg-3 spacing-left spacing-right"> Date <br> <input class="form-control" type="date" id="date" name="Date[]" placeholder="..." style="width: 100%;"> </div> <div class="form-type col-lg-5 spacing-left spacing-right"> Picture <br> <input class="form-control" type="file" id="picture" name="Picture[]" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-11 form-type spacing-right"> Institute Name <br> <input class="form-control" id="institute" name="Institute[]" type="text" placeholder="..." style="width: 100%;"> </div> </div> </div> <div class="col-lg-4 spacing-left"> <div class="row mb-3"> <div class="form-type col-lg-10 spacing-right"> Degree No. <br> <input class="form-control" id="degree" name="Degree[]" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="form-type col-lg-5 spacing-right"> Marks <br> <input class="form-control" type="text" id="marks" name="Marks[]" placeholder="..." style="width: 100%;"> </div> <div class="form-type col-lg-5 spacing-left spacing-right"> Grade <br> <input class="form-control" type="text" id="grade" name="Grade[]" placeholder="..." style="width: 100%;"> </div> </div> </div> <div class="col-lg-2 spacing-left my-5"> <button type="button" class="remove-btn" onclick="education_remove_fields(' +
      room1 + ')">Remove</button> </div></div>';
    objTo.appendChild(divtest)
  }

  function education_remove_fields(rid) {
    $('.removeclass' + rid).remove();
  }
  //Work Experience Add Fields
  var room2 = 1;

  function work_add_fields() {
    room2++;
    var objTo = document.getElementById('work_add_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "second-col removeclass" + room2);
    var rdiv = 'removeclass' + room2;
    divtest.innerHTML =
      '<div class="row"> <div class="col-lg-6"><div class="row mb-2"><div class="col-lg-3 spacing-right">Force No  <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-8 spacing-left spacing-right">Force Name <br>  <input class="form-control" type="date" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right">Joining Rank <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Joining Unit <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right"> Retirement Rank <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Retirement Unit <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;"></div></div></div><div class="col-lg-4 spacing-left"><div class="row mb-2"><div class="col-lg-6 spacing-right">Service Tenure <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-right spacing-left"> Others <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right"> Inservice Awards <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-right spacing-left">Attachement <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;"></div></div></div><div class="col-lg-2 spacing-left my-5"><button type="button" class="remove-btn" onclick="work_remove_fields(' +
      room2 + ');">Remove</button></div> </div>';
    objTo.appendChild(divtest)
  }

  function work_remove_fields(rid) {
    $('.removeclass' + rid).remove();
  }
  //Compliance Add Fields
  var room3 = 1;

  function compliance_add_fields() {
    room3++;
    var objTo = document.getElementById('compliance_add_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "Third-col removeclass" + room3);
    var rdiv = 'removeclass' + room2;
    divtest.innerHTML =
      '<div class="row"><div class="col-lg-10 mt-2"><div class="row mb-2"><div class="col-lg-5 spacing-right">CNIC <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Name <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-5 spacing-right">Father Name <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Relationship <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;"></div></div></div><div class="col-lg-2 mt-5"><button type="button" class="remove-btn" onclick="compliance_remove_fields(' +
      room3 + ')">Remove</button></div></div>';
    objTo.appendChild(divtest)
  }

  function compliance_remove_fields(rid) {
    $('.removeclass' + rid).remove();
  }
  guarantor = 1;
  //Guarantor Add Fields
  var room4 = 1;

  function guarantor_add_fields() {
    room4++;
    var objTo = document.getElementById('guarantor_add_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "Fourth-col removeclass" + room4);
    var rdiv = 'removeclass' + room4;
    guarantor += 1;
    divtest.innerHTML = '<div class="row"> <h5> Guarantor No (' + guarantor +
      ') </h5> <div class="col-lg-6"> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Name <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-6 spacing-left spacing-right"> Father Name <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-4 spacing-right"> Relationship <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-7 spacing-left spacing-right"> CNIC <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-11 colspan-2 spacing-right"> Address <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> </div> <div class="col-lg-6 spacing-left"> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Landline <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-5 spacing-left"> Cell No <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10"> Email ID <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> </div> <div class="col-lg-6"> <div class="row mb-2"> <div class="col-lg-4 spacing-right"> Verified by Police <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-7 spacing-left spacing-right"> Name of Police Station <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-11 spacing-right"> Name of SHO <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-11 spacing-right"> Address of Police Station <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> </div> <div class="col-lg-6 spacing-left"> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Verified by VC/UC <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-5 spacing-left"> Name of VC/UC <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10"> Name of Chairman <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10"> Address of VC/UC Office <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> </div> <center> <button type="button" class="remove-btn" onclick="guarantor_remove_fields(' +
      room4 + ')"> Remove </button> </center> </div>';
    objTo.appendChild(divtest)
  }

  function guarantor_remove_fields(rid) {
    $('.removeclass' + rid).remove();
    --guarantor;
  }
</script>

<!--Image Preview Basic Info-->
<script>
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
</script>

<script>
  const inpFile2 = document.getElementById("inpFile2");
  const previewContainer2 = document.getElementById("imagePreview2");
  const previewImage2 = previewContainer2.querySelector(".image-preview__image2");
  const previewDefaultText2 = previewContainer2.querySelector(".image-preview__default-text2");
  inpFile2.addEventListener("change", function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      previewDefaultText2.style.display = "none";
      previewImage2.style.display = "block";
      reader.addEventListener("load", function() {
        previewImage2.setAttribute("src", this.result);
      });
      reader.readAsDataURL(file);
    } else {
      previewDefaultText2.style.display = "null";
      previewImage2.style.display = "null";
      previewImage2.setAttribute("src", "");
    }
  });
</script>

<!--Image Preview Education-->
<script>
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
</script>

<!--Image Preview Compliance-->
<script>
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
</script>

<!--Image Preview Health Status-->
<script>
  const inpFile5 = document.getElementById("inpFile5");
  const previewContainer5 = document.getElementById("imagePreview5");
  const previewImage5 = previewContainer5.querySelector(".image-preview__image5");
  const previewDefaultText5 = previewContainer5.querySelector(".image-preview__default-text5");
  inpFile5.addEventListener("change", function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      previewDefaultText5.style.display = "none";
      previewImage5.style.display = "block";
      reader.addEventListener("load", function() {
        previewImage5.setAttribute("src", this.result);
      });
      reader.readAsDataURL(file);
    } else {
      previewDefaultText5.style.display = "null";
      previewImage5.style.display = "null";
      previewImage5.setAttribute("src", "");
    }
  });
</script>

<!--Image Preview Biometric-->
<script>
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
</script>

<script>
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
</script>

<script>
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
</script>

<script>
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
</script>

<script>
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
</script>

<script>
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
</script>

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
</script>

<script>
  const inpFile13 = document.getElementById("inpFile13");
  const previewContainer13 = document.getElementById("imagePreview13");
  const previewImage13 = previewContainer13.querySelector(".image-preview__image13");
  const previewDefaultText13 = previewContainer13.querySelector(".image-preview__default-text13");
  inpFile13.addEventListener("change", function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      previewDefaultText13.style.display = "none";
      previewImage13.style.display = "block";
      reader.addEventListener("load", function() {
        previewImage13.setAttribute("src", this.result);
      });
      reader.readAsDataURL(file);
    } else {
      previewDefaultText13.style.display = "null";
      previewImage13.style.display = "null";
      previewImage13.setAttribute("src", "");
    }
  });
</script>

<script>
  const inpFile14 = document.getElementById("inpFile14");
  const previewContainer14 = document.getElementById("imagePreview14");
  const previewImage14 = previewContainer14.querySelector(".image-preview__image14");
  const previewDefaultText14 = previewContainer14.querySelector(".image-preview__default-text14");
  inpFile14.addEventListener("change", function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      previewDefaultText14.style.display = "none";
      previewImage14.style.display = "block";
      reader.addEventListener("load", function() {
        previewImage14.setAttribute("src", this.result);
      });
      reader.readAsDataURL(file);
    } else {
      previewDefaultText14.style.display = "null";
      previewImage14.style.display = "null";
      previewImage14.setAttribute("src", "");
    }
  });
</script>

{{-- ////  Budget Total Amount Cacl of Frist Budget Entry  \\\ --}}
<script>
  // Function to update total amount when amount per unit or quantity changes
  function updateTotalAmount(index) {
    var amountPerUnit = parseFloat(document.getElementsByName('amount_per_unit[]')[index].value) || 0;
    var quantity = parseFloat(document.getElementsByName('quantity[]')[index].value) || 0;
    // Calculate total amount
    var totalAmount = amountPerUnit * quantity;
    // Update the total amount input field
    document.getElementsByName('total_amount[]')[index].value = totalAmount.toFixed(2);
  }
  // Attach event listeners to amount per unit and quantity inputs
  document.addEventListener('input', function(event) {
    var target = event.target;
    var nameAttribute = target.getAttribute('name');
    // Check if the changed input is either amount per unit or quantity
    if (nameAttribute === 'amount_per_unit[]' || nameAttribute === 'quantity[]') {
      // Get the index of the input (assuming you have multiple sets of inputs)
      var index = target.dataset.index;
      // Update the total amount
      updateTotalAmount(index);
    }
  });
</script>

{{-- /////  Budget Total Amount Calculation   \\\\\\  --}}
<script>
  function updateTotalAmount(element) {
    var budgetContainer = element.closest('.budgetContainer');
    var amountPerUnit = parseFloat(budgetContainer.querySelector('.BudgetAmountPerUnit').value) || 0;
    var quantity = parseFloat(budgetContainer.querySelector('.BudgetQuantity').value) || 0;
    var totalAmountField = budgetContainer.querySelector('.BudgetTotalAmount');
    var totalAmount = amountPerUnit * quantity;
    totalAmountField.value = totalAmount.toFixed(2);
  }
  // Attach event listeners to dynamically added fields
  document.addEventListener('input', function(event) {
    var target = event.target;
    var parent = target.closest('.budgetContainer');
    if (parent && parent.classList.contains('budgetContainer')) {
      if (target.classList.contains('BudgetAmountPerUnit') || target.classList.contains('BudgetQuantity')) {
        updateTotalAmount(target);
      }
    }
  });
</script>

{{-- Budget Summary Script  --}}
<script>
  $(document).ready(function() {
    // Function to update summary table from accordion entries and calculate total sum
    function updateSummaryTableFromAccordionAndCalculateSum() {
      // Clear existing rows
      $('#budgetSummaryTable tbody').empty();
      var totalAmountSum = 0; // Initialize total sum
      // Iterate through each accordion item and update the summary table
      $('.budgetContainer').each(function(index) {
        var budgetCategory = $(this).find('[name="budget_category[]"]').val();
        var instNumber = $(this).find('[name="budget_ins_no[]"]').val();
        var nameBank = $(this).find('[name="name_of_bank[]"]').val();
        var totalAmount = parseFloat($(this).find('[name="total_amount[]"]').val()) || 0;
        // Add to total sum
        totalAmountSum += totalAmount;
        // Add a new row to the summary table
        $('#budgetSummaryTable tbody').append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${budgetCategory}</td>
                        <td>${instNumber}</td>
                        <td>${nameBank}</td>
                        <td>${totalAmount.toFixed(2)}</td>
                        <td><button class="btn btn-primary view-button" style="padding:10px 25px; border-radius: 9px;" data-index="${index}">View</button></td>
                        <!-- Add more columns as needed -->
                    </tr>
                `);
      });
      // Update the total sum in the designated field
      $('[name="estimated_amount"]').val(totalAmountSum.toFixed(2));
    }
    // Add More Button Click Event
    $('#addAccBudget').on('click', function() {
      // Your existing code...
      // Add code to update summary table from accordion entries and calculate total sum
      updateSummaryTableFromAccordionAndCalculateSum();
    });
    // Save Button Click Event
    $('#addToTable').on('click', function() {
      // Your code to save the data entered in the accordion sections...
      // After saving, update the summary table and calculate total sum
      updateSummaryTableFromAccordionAndCalculateSum();
    });
    // Function to handle click event of "Save and Next" button
    $('.saveButton').on('click', function() {
      // Your code to save the form data and proceed to the next step...
      // After saving, update the summary table and calculate total sum
      updateSummaryTableFromAccordionAndCalculateSum();
    });
    // View Button Click Event
    $(document).on('click', '.view-button', function(event) {
      event.preventDefault(); // Prevent default behavior of the button
      var index = $(this).data('index');
      var accordionItem = $('.accordion-item').eq(index);
      var accordionButton = accordionItem.find('[data-toggle="collapse"]');
      // Toggle open the accordion section
      accordionButton.trigger('click');
    });
  });
</script>

{{-- ///////  Budget Estimated Amount Calculation   \\\\\\ --}}
{{-- <script>
    function updateEstimatedAmount() {
        var totalAmountFields = document.querySelectorAll('.BudgetTotalAmount');
        var estimatedAmountField = document.querySelector('[name="estimated_amount"]');
        var totalAmountSum = 0;

        totalAmountFields.forEach(function (field) {
            var amount = parseFloat(field.value) || 0;
            totalAmountSum += amount;
        });

        estimatedAmountField.value = totalAmountSum.toFixed(2);
    }

    document.addEventListener('input', function (event) {
        var target = event.target;

        // Check if the changed input is either amount per unit or quantity
        if (target.classList.contains('BudgetAmountPerUnit') || target.classList.contains('BudgetQuantity')) {
            // Update the total amount for this budgetContainer
            updateTotalAmount(target);

            // Update the estimated amount based on all total amounts
            updateEstimatedAmount();
        }
    });
</script> --}}

{{-- Emergency Accordion --}}
<script>
  $(document).ready(function() {
    // Add More Button Click Event
    $('#addEmergency').on('click', function() {
      var EmergencyAccordionCount = $('#emergencyAccordion .emergencyaccordion-item').length + 1;
      var newEmergencyAccordion = `
                <div class="accordion-item emergencyaccordion-item" id="emergencyEntry${EmergencyAccordionCount}">
                    <h2 class="accordion-header" id="emergencyHeading${EmergencyAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#emergencyCollapse${EmergencyAccordionCount}" aria-expanded="false" aria-controls="emergencyCollapse${EmergencyAccordionCount}">
                            Emergency Entry ${EmergencyAccordionCount}
                        </button>
                    </h2>
                    <div id="emergencyCollapse${EmergencyAccordionCount}" class="collapse" aria-labelledby="emergencyHeading${EmergencyAccordionCount}">
                        <div class="accordion-body">
                            <!-- Your content for signatory entry goes here -->
                            <div class="row" id="emergencyServices_add_fields">
                                <div class=" row main-content div">
                                    <div class="col-lg-6">
                                        <div class="row mb-2">

                                            <div class="col-lg-6 spacing-left spacing-right form-group">
                                                Emergency Services <br>
                                                <div class="input-group" style="width: 100%;">
                                                    <select id="dropdown" class="form-control mt-1" name="train_emer_ser[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                        <option value=""></option>
                                                        @foreach ($trainemerser as $emerse)
                                                            <option value="{{ $emerse->train_emerser_name}}">{{ $emerse->train_emerser_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="{{ route('trainemerser') }}">
                                                            <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Picture of Police Station <br> <input class="form-control" name="train_emer_pic[]" type="file" placeholder="..." style="width: 100%;">
                                                <div class="col-lg-6">
                                                    <!--Image Preview Biometric-->
                                                    <div class="image-preview26" id="imagePreview26">
                                                        <img src="" alt="Image Preview26" class="image-preview__image26" style="height: 100%; width:100%; margin-left:-15px">
                                                        <span class="image-preview__default-text26"> Image Preview </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5>POC</h5>
                                            <div class="col-lg-6 spacing-right">
                                                Name. <br> <input class="form-control" id="head_office_name" name="train_emer_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Designation. <br> <input class="form-control" id="head_office_name" name="train_emer_poc_desig[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Cell Number. <br> <input class="form-control vldphone" id="head_office_name" name="train_emer_poc_cell[]" type="text" placeholder="..." style="width: 100%;">
                                                <div id="phoneError" class="phoneError" style="color: red"></div>
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Email. <br> <input class="form-control vldemail" id="head_office_name" name="train_emer_poc_email[]" type="email" placeholder="..." style="width: 100%;">
                                                <div  class="emailError" style="color: red"></div>
                                            </div>

                                            <div class="col-lg-6 spacing-right">
                                                Notes. <br> <textarea class="form-control" id="w3review4" oninput="trimSpaces4()" onclick="moveCursorToStart4()" name="train_emer_poc_notes[]" type="notes" placeholder="..." style="width: 100%;"></textarea>
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Attachment <br> <input class="form-control" id="head_office_name" name="train_emer_poc_attach[]" type="file" placeholder="..." style="width: 100%;" >
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 spacing-left">
                                        <h5>Address :</h5>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Office No <br> <input class="form-control" id="head_office_cell_no" name="train_emer_office[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Building <br> <input class="form-control" id="head_office_cell_no" name="train_emer_building[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Block <br> <input class="form-control" id="head_office_cell_no" name="train_emer_block[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Area <br> <input class="form-control" id="head_office_cell_no" name="train_emer_area[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                City <br> <input class="form-control" id="head_office_cell_no" name="train_emer_city[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Photograph of Building <br> <input class="form-control" id="head_office_cell_no" name="train_emer_builphoto[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right">
                                                Email <br> <input class="form-control vldemail" id="" name="train_emer_email[]" type="text" placeholder="..." style="width: 100%;">
                                                <div  class="emailError" style="color: red"></div>
                                            </div>
                                            <div class="col-lg-5 spacing-left">
                                                Website <br> <input class="form-control vldwebsite" id="" name="train_emer_web[]" type="text" placeholder="..." style="width: 100%;">
                                                <div id="websiteError" class="websiteError" style="color: red"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-10 spacing-right">
                                                Pin location <br> <input id="location-input2" class="form-control" id="" name="train_emer_pin[]" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete2()">
                                            </div>
                                            {{-- <div >
                                                <br> <input class="form-control" id="" name="longitude2[]" type="hidden" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div >
                                            <br> <input class="form-control" id="" name="latitude2[]" type="hidden" placeholder="..." style="width: 100%;">
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 spacing-left mt-2">
                                Applicable Rental Property Number <br> <input class="form-control" name="train_emer_app_rental[]" type="text" placeholder="..." style="width: 70%;" multiple>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                                        Attachements <br> <input class="form-control" name="train_emer_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
                                    </div>
                                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                                        Notes <br>
                                        <textarea id="w3review5" oninput="trimSpaces5()" onclick="moveCursorToStart5()" class="form-control" name="train_emer_note[]" rows="2" cols="38">
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-danger btn-sm removeEmergencyAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;
      $('#emergencyAccordion').append(newEmergencyAccordion);
    });
    // Remove Accordion Button Click Event
    $(document).on('click', '.removeEmergencyAccordion', function() {
      $(this).closest('.emergencyaccordion-item').remove();
    });
  });
</script>

<script>
  $(document).ready(function() {
    // Function to update summary table for emergency entries
    function updateEmergencySummaryTable() {
      // Clear existing rows
      $('#emergencySummaryTable tbody').empty();
      // Iterate through each emergency accordion item and update the summary table
      $('.emergencyaccordion-item').each(function(index) {
        var emerService = $(this).find('[name="train_emer_ser[]"]').val();
        var pocName = $(this).find('[name="train_emer_poc_name[]"]').val();
        var pocDesig = $(this).find('[name="train_emer_poc_desig[]"]').val();
        var pocCell = $(this).find('[name="train_emer_poc_cell[]"]').val();
        // Check if any relevant data is entered
        if (emerService || pocName || pocDesig || pocCell) {
          // Add a new row to the summary table
          $('#emergencySummaryTable tbody').append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${emerService}</td>
                        <td>${pocName}</td>
                        <td>${pocDesig}</td>
                        <td>${pocCell}</td>
                        <td><button type="button" class="btn btn-primary view-emergency-button" data-index="${index}">View</button></td>
                        <!-- Add more columns as needed -->
                    </tr>
                `);
        }
      });
    }
    // Add More Emergency Button Click Event
    $('#addEmergency').on('click', function() {
      var emergencyEntryCount = $('#emergencyAccordion .emergencyaccordion-item').length + 1;
      var newEmergencyEntry = `
            <!-- Your existing emergency accordion HTML goes here -->
        `;
      console.log('Adding emergency entry:', emergencyEntryCount);
      $('#emergencyAccordion').append(newEmergencyEntry);
    });
    // Update Emergency Table Button Click Event
    $('#updateEmergencyTable').on('click', function() {
      // Update the emergency summary table
      updateEmergencySummaryTable();
    });
    // View Emergency Button Click Event
    $(document).on('click', '.view-emergency-button', function() {
      var index = $(this).data('index');
      var accordionItem = $('.emergencyaccordion-item').eq(index);
      // Toggle the collapse state of the accordion item
      accordionItem.find('.collapse').collapse('toggle');
    });
    // Remove Emergency Entry Button Click Event
    $(document).on('click', '.removeEmergencyAccordion', function() {
      $(this).closest('.emergencyaccordion-item').remove();
      // Update the emergency summary table
      updateEmergencySummaryTable();
    });
    // Prevent the default behavior of the Add More Emergency button
    $('#addEmergency').on('click', function(event) {
      event.preventDefault();
    });
  });
</script>

{{-- ///////   Accordion Budget   \\\\\\ --}}
<script>
  $(document).ready(function() {
    // Add More Button Click Event
    $('#addAccBudget').on('click', function() {
      // var accordionCount = $('.accordion-item').length + 1;
      // First Accordion
      var accordionCount = $('#budgetAccordion .accordion-item').length + 1;
      var newAccordion = `
                <div class="accordion-item" id="budgetEntry${accordionCount}">
                    <h2 class="accordion-header" id="budgetHeading${accordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#collapse${accordionCount}" aria-expanded="false" aria-controls="collapse${accordionCount}">
                            Budget Entry ${accordionCount}
                        </button>

                    </h2>
                    <div id="collapse${accordionCount}" class="collapse" aria-labelledby="budgetHeading${accordionCount}">
                        <div class="accordion-body">
                            <div id="everything">
                                <div class="row budgetContainer" id="budgetDetailsContainer">
                                    <div class="col-lg-12 spacing-right">
                                        <div class="row my-2">
                                            <div class="d-flex">
                                                <div class="col-lg-6 spacing-right">
                                                    Category <br>
                                                    <select id="staff_category" class="form-control mt-2" name="budget_category[]" style="width: 100%;">
                                                        <option value="Range Fees">Range Fees</option>
                                                        <option value="Target Fees">Target Fees</option>
                                                        <option value="Food Cost">Food Cost</option>
                                                        <option value="Ammunition Cost">Ammunition Cost</option>
                                                        <option value="Transportation Cost">Transportation Cost</option>
                                                        <option value="Security Equipment Cost">Security Equipment Cost</option>
                                                        <option value="Media">Media</option>
                                                        <option value="Crockery">Crockery</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Mode Of Payment <br>
                                                    <select id="staff_category" class="form-control mt-2" name="mode_of_payment[]" style="width: 100%;">
                                                        <option value="Cheque">Cheque</option>
                                                        <option value="Cash">Cash</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex mt-1">
                                                    <div class="col-md-3">
                                                        Instrument No <br> <input class="form-control" name="budget_ins_no[]" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-md-3">
                                                        Name Of Bank <br> <input class="form-control" name="name_of_bank[]" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-md-3">
                                                        Date of Payment <br> <input class="form-control" name="date_of_payment[]" type="date" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-md-3">
                                                        Amount Per Unit <br> <input class="form-control BudgetAmountPerUnit"  name="amount_per_unit[]" data-index="0" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="d-flex mt-1">
                                                    <div class="col-md-3">
                                                        Quantity <br> <input class="form-control BudgetQuantity"  name="quantity[]" type="text" data-index="0" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-md-3">
                                                        Total Amount <br> <input class="form-control BudgetTotalAmount"  name="total_amount[]" data-index="0" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-md-3">
                                                        Cheque <br> <input class="form-control" name="cheque_attach[]" type="file" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-md-3">
                                                        Voucher <br> <input class="form-control" name="voucher_attach[]" type="file" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeAccordion mx-5 my-3 removeBudgetSection" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>

                    </div>

                </div>
                `;
      $('#budgetAccordion').append(newAccordion);
    });
    // Remove Accordion Button Click Event
    $(document).on('click', '.removeAccordion', function() {
      $(this).closest('.accordion-item').remove();
    });
  });
</script>

<script>
  $(document).ready(function() {
    var accordionCount = 1;
    // Add More Button Click Event
    $('#addMorePOC').on('click', function() {
      accordionCount++;
      var newAccordionItem = `
            <div class="accordion-item" id="pocEntry${accordionCount}">
                <h2 class="accordion-header" id="pocHeading${accordionCount}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${accordionCount}" aria-expanded="false" aria-controls="collapse${accordionCount}">
                        POC Entry ${accordionCount}
                    </button>
                </h2>
                <div id="collapse${accordionCount}" class="accordion-collapse collapse" aria-labelledby="pocHeading${accordionCount}" data-bs-parent="#pocAccordion">
                    <div class="accordion-body">
                        <div class="container my-5">
                            <div id="pocContainer">
                                <div class="row">
                                    <div class="col-lg-6 spacing-right">
                                        <div class="row mb-2">
                                            <div class="form-type col-lg-11 spacing-right">
                                                Name of POC <br> <input class="form-control" type="text" name="poc_name[]" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="form-type col-lg-6 spacing-right">
                                                Title/Designation <br> <input class="form-control" type="text" name="poc_desig[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="form-type col-lg-5 spacing-left spacing-right">
                                                Fax# <br> <input class="form-control" type="text" name="poc_fax[]" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="form-type col-lg-5 spacing-right">
                                                Phone No. <br> <input class="form-control" type="text" name="poc_phone[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="form-type col-lg-6 spacing-left spacing-right">
                                                Mobile <br> <input class="form-control" type="text" name="poc_mobile[]" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="form-type col-lg-11 spacing-right">
                                                Website <br> <input class="form-control" type="text" name="poc_web[]" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 spacing-right">
                                        <div class="row mb-2">
                                            <div class="form-type col-lg-11 spacing-right">
                                                Email Address of POC <br> <input class="form-control" type="text" name="poc_email[]" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="form-type col-lg-11 spacing-right">
                                                Location of POC <br> <input class="form-control" type="text" name="poc_loc[]" placeholder="..." style="width: 100%;" onfocus="initAutocomplete1()">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="form-type col-lg-7 spacing-right">
                                                Name of Document <br> <input class="form-control" type="text" name="poc_document[]" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="form-type col-lg-4 spacing-left spacing-right">
                                                System ID <br> <input class="form-control" type="text" name="system_id[]" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="form-type col-lg-11 spacing-right">
                                                Other Info <br>
                                                <textarea class="form-control" name="other_info[]" rows="3" cols="24"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <button class="btn btn-danger btn-sm removePOCSection" type="button">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `;
      $('#pocAccordion').append(newAccordionItem);
    });
    // Remove Accordion Button Click Event
    $(document).on('click', '.removePOCSection', function() {
      $(this).closest('.accordion-item').remove();
      updatePOCSummary();
    });
    // Save Button Click Event
    $('#savePOC').on('click', function() {
      updatePOCSummary();
    });
    // View Button Click Event
    $(document).on('click', '.viewPOC', function() {
      var accordionItem = $(this).closest('.accordion-item');
      var accordionCollapse = accordionItem.find('.accordion-collapse');
      accordionCollapse.collapse('toggle');
    });
    // Update POC Summary Table
    function updatePOCSummary() {
      console.log("Updating POC summary table");
      $('#pocSummaryTable tbody').empty();
      $('.accordion-item').each(function(index) {
        var pocName = $(this).find('input[name="poc_name[]"]').val().trim();
        var pocDesig = $(this).find('input[name="poc_desig[]"]').val().trim();
        var pocEmail = $(this).find('input[name="poc_email[]"]').val().trim();
        var pocPhone = $(this).find('input[name="poc_phone[]"]').val().trim();
        var pocMobile = $(this).find('input[name="poc_mobile[]"]').val().trim();
        var pocWeb = $(this).find('input[name="poc_web[]"]').val().trim();
        // Only add row if all required fields have values
        if (pocName !== '') {
          var newRow = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${pocName}</td>
                        <td>${pocDesig}</td>
                        <td>${pocEmail}</td>
                        <td>${pocPhone}</td>
                        <td><button class="btn btn-info btn-sm viewPOC" type="button">View</button></td>
                    </tr>
                    `;
          $('#pocSummaryTable tbody').append(newRow);
        }
      });
    }
  });
</script>

{{-- /////// Item Accordion \\\\\  --}}

<script>
  $(document).ready(function() {
    // Add More Button Click Event
    $('#addAccItem').on('click', function() {
      var itemAccordionCount = $('#itemAccordion .itemAccordion-item').length + 1;
      var newItemAccordion = `
                <div class="accordion-item itemAccordion-item" id="itemEntry${itemAccordionCount}">
                    <h2 class="accordion-header" id="itemHeading${itemAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white" data-toggle="collapse" data-target="#collapseItem${itemAccordionCount}" aria-expanded="false" aria-controls="collapseItem${itemAccordionCount}">
                            Item Entry ${itemAccordionCount}
                        </button>
                    </h2>
                    <div id="collapseItem${itemAccordionCount}" class="collapse" aria-labelledby="itemHeading${itemAccordionCount}">
                        <div class="accordion-body">
                            <div id="vendorDetailsContainer">
                                    <div class="col-lg-6 spacing-right">
                                        <h5 class="m-0">List of Items</h5>
                                        <select id="staff_category" class="form-control mt-0" name="list_items_category[]" style="width: 100%;">
                                            <option value="List of Refreshment/Food Items">List of Refreshment/Food Items</option>
                                            <option value="List of Catering/Crockery Items">List of Catering/Crockery Items</option>
                                            <option value="List of Transport">List of Transport</option>
                                        </select>
                                    </div>

                                    <div class="form-type col-lg-12 spacing-right">
                                        <div class="d-flex mt-2">
                                            <div class="col-md-3">
                                                Category<br> <input class="form-control" name="item_category[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-md-3">
                                                Type<br> <input class="form-control" name="item_type[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-md-3">
                                                Supplier <br> <input class="form-control" name="item_supplier[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-md-3">
                                                Quantity<br> <input class="form-control loi-quantity itemQuantity" name="item_quantity[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="col-md-3">
                                                price per Unit<br> <input class="form-control loi-price itemPrice" name="item_price[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-md-3">
                                                Total Price<br> <input class="form-control loi-totalprice itemTotal" name="item_total_price[]" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-md-3">
                                                Notes <br> <textarea class="form-control" name="item_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                            </div>
                                            <div class="col-md-3">
                                                Attachments <br> <input class="form-control" name="item_attach[]" type="file" placeholder="..." style="width: 100%;">
                                            </div>

                                        </div>
                                    </div>

                                    <h5 style="">Details of Vendor</h5>
                                    <div class="d-flex">
                                        <div class="col-md-3 spacing-left">
                                            Name<input class="form-control" type="text" name="item_vendor[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-md-3">
                                            Cell<br> <input class="form-control" name="vendor_cell[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-md-3">
                                            Floor<br> <input class="form-control" name="vendor_floor[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-md-3">
                                            Building<br> <input class="form-control" name="vendor_building[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>

                                    </div>
                                    <div class="d-flex">
                                        <div class="col-md-3">
                                            Block<br> <input class="form-control" name="vendor_block[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-md-3">
                                            Area<br> <input class="form-control" name="vendor_area[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-md-3">
                                            City<br> <input class="form-control" name="vendor_city[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-md-3">
                                            Email<br> <input class="form-control" name="vendor_email[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>

                                    </div>
                                    <div class="d-flex">
                                        <div class="col-md-3">
                                            Website<br> <input class="form-control" name="vendor_website[]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-md-3">
                                            GPS<br> <input class="form-control" id="location-input5" name="vendor_gps[]" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete5()">
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            Notes <br> <textarea class="form-control" name="vendor_notes[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                        </div>
                                        <div class="col-md-3">
                                            Attachments <br> <input class="form-control" name="vendor_attach[]" type="file" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>

                                </div>
                        </div>
                        <button class="btn btn-danger btn-sm removeItemAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;
      console.log('Adding accordion item:', itemAccordionCount);
      $('#itemAccordion').append(newItemAccordion);
    });
    // Remove Accordion Button Click Event
    $(document).on('click', '.removeItemAccordion', function() {
      $(this).closest('.itemAccordion-item').remove();
    });
  });
</script>

{{-- /////// Item Accordion Summary \\\\\\\ --}}
<script>
  $(document).ready(function() {
    function updateItemSummaryTableAndCalculateSum() {
      $('#itemSummaryTable tbody').empty();
      var totalAmountSum = 0;
      $('.itemAccordion-item').each(function(index) {
        var itemCategory = $(this).find('[name="list_items_category[]"]').val();
        var itemTP = $(this).find('[name="item_total_price[]"]').val();
        var vendorName1 = $(this).find('[name="item_vendor[]"]').val();
        var vendorCell1 = $(this).find('[name="vendor_cell[]"]').val();
        if (itemCategory || itemTP || vendorName1 || vendorCell1) {
          var totalPrice = parseFloat(itemTP) || 0;
          totalAmountSum += totalPrice;
          $('#itemSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${itemCategory}</td>
                            <td>${itemTP}</td>
                            <td>${vendorName1}</td>
                            <td>${vendorCell1}</td>
                            <td><button type="button" class="btn btn-primary view-button-1" data-target="#collapseItem${index + 1}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
        }
      });
      $('[name="estimated_amount_loi"]').val(totalAmountSum.toFixed(2));
    }
    $('#addToItemTable').on('click', function() {
      updateItemSummaryTableAndCalculateSum();
    });
    // View Button Click Event
    $(document).on('click', '.view-button-1', function() {
      var targetId = $(this).data('target');
      $(targetId).collapse('toggle');
    });
    // Prevent the default behavior of the Add More button
    $('#addAccItem').on('click', function(event) {
      event.preventDefault();
    });
  });
</script>

{{-- List of Weapon Calc  --}}
<script>
  $(document).ready(function() {
    // Function to update total price when price per unit or quantity changes
    function updateTotalPrice(index) {
      var pricePerUnit = parseFloat($('.weapon-price').eq(index).val()) || 0;
      var quantity = parseFloat($('.weapon-quantity').eq(index).val()) || 0;
      // Calculate total price
      var totalPrice = pricePerUnit * quantity;
      // Update the total price input field
      $('.weapon-totalprice').eq(index).val(totalPrice.toFixed(2));
    }
    // Attach event listeners to price per unit and quantity inputs
    $(document).on('input', '.weapon-price, .weapon-quantity', function() {
      // Get the index of the input (assuming you have multiple sets of inputs)
      var index = $(this).closest('.row').index();
      // Update the total price
      updateTotalPrice(index);
    });
  });
</script>

{{-- List of Ammu Calc  --}}
<script>
  $(document).ready(function() {
    // Function to update total price when price per unit or quantity changes
    function updateTotalPriceAmmu(index) {
      var pricePerUnit = parseFloat($('.price').eq(index).val()) || 0;
      var quantity = parseFloat($('.quantity').eq(index).val()) || 0;
      // Calculate total price
      var totalPrice = pricePerUnit * quantity;
      // Update the total price input field
      $('.totalprice').eq(index).val(totalPrice.toFixed(2));
    }
    // Attach event listeners to price per unit and quantity inputs
    $(document).on('input', '.price, .quantity', function() {
      // Get the index of the input (assuming you have multiple sets of inputs)
      var index = $(this).closest('.row').index();
      // Update the total price
      updateTotalPriceAmmu(index);
    });
  });
</script>

{{-- Security Calculation --}}
<script>
  $(document).ready(function() {
    // Function to update total price when price per unit or quantity changes
    function updateTotalPriceSecEquip(index) {
      var pricePerUnit = parseFloat($('.sec-price').eq(index).val()) || 0;
      var quantity = parseFloat($('.sec-quantity').eq(index).val()) || 0;
      // Calculate total price
      var totalPrice = pricePerUnit * quantity;
      // Update the total price input field
      $('.sec-totalprice').eq(index).val(totalPrice.toFixed(2));
    }
    // Attach event listeners to price per unit and quantity inputs
    $(document).on('input', '.sec-price, .sec-quantity', function() {
      // Get the index of the input (assuming you have multiple sets of inputs)
      var index = $(this).closest('.row').index();
      // Update the total price
      updateTotalPriceSecEquip(index);
    });
  });
</script>

{{-- LOI Calculation --}}
<script>
  $(document).ready(function() {
    // Function to update total price when price per unit or quantity changes
    function updateTotalPriceLoi(index) {
      var pricePerUnit = parseFloat($('.loi-price').eq(index).val()) || 0;
      var quantity = parseFloat($('.loi-quantity').eq(index).val()) || 0;
      // Calculate total price
      var totalPrice = pricePerUnit * quantity;
      // Update the total price input field
      $('.loi-totalprice').eq(index).val(totalPrice.toFixed(2));
    }
    // Attach event listeners to price per unit and quantity inputs
    $(document).on('input', '.loi-price, .loi-quantity', function() {
      // Get the index of the input (assuming you have multiple sets of inputs)
      var index = $(this).closest('.row').index();
      // Update the total price
      updateTotalPriceLoi(index);
    });
  });
</script>

{{-- LOI accordian calculation --}}
<script>
  function updateItemTotalAmount(element) {
    var itemContainer = element.closest('.itemAccordion-item');
    var itemPrice = parseFloat(itemContainer.querySelector('.itemPrice').value) || 0;
    var itemQuantity = parseFloat(itemContainer.querySelector('.itemQuantity').value) || 0;
    var itemTotal = itemContainer.querySelector('.itemTotal');
    var itemTotalAmount = itemPrice * itemQuantity;
    itemTotal.value = itemTotalAmount.toFixed(2);
  }
  // Attach event listeners to dynamically added fields
  document.addEventListener('input', function(event) {
    var target = event.target;
    var parent = target.closest('.itemAccordion-item');
    // Check if the changed input is within an itemAccordion-item
    if (parent && parent.classList.contains('itemAccordion-item')) {
      // Check if the changed input is either itemPrice or itemQuantity
      if (target.classList.contains('itemPrice') || target.classList.contains('itemQuantity')) {
        // Update the total amount for this itemAccordion-item
        updateItemTotalAmount(target);
      }
    }
  });
</script>

<script>
  function initAutocomplete() {
    var input = document.getElementById('location-input');
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.addListener('place_changed', function() {
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
    autocomplete.addListener('place_changed', function() {
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
    autocomplete.addListener('place_changed', function() {
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
    autocomplete.addListener('place_changed', function() {
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
    autocomplete.addListener('place_changed', function() {
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
    autocomplete.addListener('place_changed', function() {
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
    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      document.getElementById('latitude6').value = place.geometry.location.lat();
      document.getElementById('longitude6').value = place.geometry.location.lng();
    });
  }
</script>

<script>
  google.maps.event.addDomListener(window, 'load', initAutocomplete);
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<!-- CSS and JS Dependencies -->
<!-- Select2 CSS -->
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<!-- Google Fonts for Handwritten Font -->
<style>
    .customer_form {
        padding: 20px;
    }
    .table-container {

        background-color: #fcfcfc;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        margin-top: 20px;
    }
    table.dataTable {
        border-collapse: collapse;
        width: 100%;

        font-size: 1.2em;
    }
    table.dataTable thead th {
        background-color: #ededed;
        border-bottom: 2px solid #ccc;
        padding: 10px;
        text-align: left;
    }
    table.dataTable tbody td {
        border-bottom: 1px solid #ddd;
        padding: 10px;
    }
    table.dataTable tbody tr:hover {
        background-color: #efefef;
    }
    /* DataTables Styling */
    .dataTables_wrapper .dataTables_filter input {

        font-size: 1.2em;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px;
    }
    .dataTables_wrapper .dataTables_length select {

        font-size: 1.2em;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {

        font-size: 1.2em;
        border: none;
        background: none;
        padding: 5px 10px;
        color: #333;
        border-radius: 20px !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        border-radius: 20px !important;
        border-radius: 5px;
    }
    .page-link{
        border-radius: 10px !important;
    }
    .dataTables_wrapper .dataTables_info {

        font-size: 1.2em;
    }
</style>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "responsive": true,
            "language": {
                "search": "Search:"
            },
            "columnDefs": [
                { "orderable": false, "targets": 0 } // Disable sorting on Order column
            ]
        });
    });
</script>
</body>

</html>
