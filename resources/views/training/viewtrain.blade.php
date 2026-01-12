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
                <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i>Logout</a>
            </div>

            <!--Popup model for User new entry-->
            <!-- <div class="modal fade" id="add_user"> -->
                <!-- <div class="modal-dialog" role="document" style="max-width: 75%;"> -->
                    <!-- <div class="modal-content"> -->
                        <div style="display:flex; column-gap:10px; align-items:center">
                            <button type="button" class="btn btn-link" onclick="history.back()">
                            <i class="bi bi-arrow-left"></i>
                            </button>
                            <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin-left:-20px;"><i>Training View :</i>
                            </h4>

                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> -->
                        </div>
                        <!-- <div class="modal-body"> -->
                            <section >
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
                                @php
                                function getFilePreview($filePath) {
                                    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                                    if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                                        return "<img src='" . asset($filePath) . "' alt='Image Preview' class='image-preview' style='height: 100px; width:100px;'>";
                                    } elseif ($extension == 'pdf') {
                                        return "<img src='https://img.icons8.com/?size=100&id=mcyAsTDJNTI9&format=png' alt='PDF File' style='height: 100px; width: 100px;'>";
                                    } elseif (in_array($extension, ['xlsx', 'xls'])) {
                                        return "<img src='https://img.icons8.com/?size=48&id=117561&format=png' alt='Excel File' style='height: 100px; width: 100px;'>";
                                    } elseif (in_array($extension, ['zip', 'rar'])) {
                                        return "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTb7rfjFBWn453fYAj1o3T7fsbSYvBzdEn4jOV8FdclTI7NpIDMZfZ_x79_o3FrxsYpUeQ&usqp=CAU' alt='ZIP File' style='height: 100px; width: 100px;'>";
                                    } elseif (in_array($extension, ['mp4', 'webm', 'ogg'])) {
                                        return "<img src='https://cdn-icons-png.flaticon.com/128/732/732256.png' alt='Video File' style='height: 100px; width: 100px;'>";
                                    } else {
                                        return "<span class='image-preview__default-text42'>File Preview</span>";
                                    }
                                }
                            @endphp


                                <form id="training_form" action="" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="row mb-2" style="margin-left: 10px;">
                                            <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
                                              <h5>Training Activation Status</h5>

                                              <div class="form-check form-check-inline" style="margin-right: 90px;">
                                                <input class="form-check-input mr-2" type="radio" name="training_activation" {{ $trainings->training_activation == '1' ? 'checked' : '' }} value="1" id="activeRadio">
                                                <label class="form-check-label" for="activeRadio">Active</label>

                                                <input class="form-check-input ml-3 mr-2" type="radio" name="training_activation" {{ $trainings->training_activation == '0' ? 'checked' : '' }} value="0" id="inactiveRadio">
                                                <label class="form-check-label" for="inactiveRadio">Inactive</label>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Training/ Main Form-->
                                    <div class="row" style="font-weight:600;">
                                        <h5> Training Details </h5>
                                        <div class="col-lg-6 spacing-right">
                                            <div class="row mb-2">
                                                <div class="col-lg-10 spacing-right">
                                                    Training Number<br>
                                                    <input class="form-control" readonly name="training_no" value="{{$trainings->training_no}}" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-10 spacing-right">
                                                    Training Region<br>
                                                    <input class="form-control" readonly name="training_region" value="{{$trainings->training_region}}" type="text" placeholder="..."
                                                        style="width: 97%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Venue<br>
                                                    <input class="form-control" readonly name="venue" value="{{$trainings->venue}}" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Name of Range<br>
                                                    <input class="form-control" readonly name="name_of_range" value="{{$trainings->name_of_range}}" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Training Start Date<br>
                                                    <input class="form-control" readonly name="training_s_date" value="{{$trainings->training_s_date}}" type="date" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Training End Date<br>
                                                    <input class="form-control" readonly name="training_e_date" value="{{$trainings->training_e_date}}" type="date" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">

                                                <div class="col-lg-5 spacing-right">
                                                    Training Start Time<br>
                                                    <input class="form-control" readonly name="training_s_time" value="{{$trainings->training_s_time}}" type="time" placeholder="..."
                                                        style="width: 100%;">
                                                </div>

                                                <div class="col-lg-5 spacing-left">
                                                    Training End Time<br>
                                                    <input class="form-control" readonly name="training_e_time" value="{{$trainings->training_e_time}}" type="time" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">

                                                <div class="col-lg-5 spacing-right">
                                                    Time of Guest Invitation <br>
                                                    <input class="form-control" readonly name="guest_invitation" value="{{$trainings->guest_invitation}}" type="time" placeholder="..."
                                                        style="width: 100%;">
                                                </div>

                                                <div class="col-lg-5 spacing-left">
                                                    Registration Deadline (Date)<br>
                                                    <input class="form-control" readonly name="reg_date" value="{{$trainings->reg_date}}" type="date" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-10 spacing-right">
                                                    Registration Deadine (Time) <br>
                                                    <input class="form-control" readonly name="reg_time" value="{{$trainings->reg_time}}" type="time" placeholder="..."
                                                        style="width: 97%%;">
                                                </div>
                                            </div>

                                            <h5>Address</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Office No <br> <input class="form-control" readonly id="" name="office_no" value="{{$trainings->office_no}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Floor <br> <input class="form-control" readonly id="" name="floor" value="{{$trainings->floor}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Building <br> <input class="form-control" readonly id="" name="building" value="{{$trainings->building}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Block <br> <input class="form-control" readonly id="" name="block" value="{{$trainings->block}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Area <br> <input class="form-control" readonly id="" name="area" value="{{$trainings->area}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    City <br> <input class="form-control" readonly id="" name="city" value="{{$trainings->city}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Photograph of Building <br> <input class="form-control" readonly id="" name="photo" value="{{$trainings->photo}}" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($trainings->photo) }}"
                                                            data-extension="{{ pathinfo($trainings->photo, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)">
                                                                {!! getFilePreview($trainings->photo) !!}
                                                            </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if($trainings->photo)
                                                            <img src="{{ asset($trainings->photo) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Email <br> <input class="form-control" readonly id="" name="email" type="text" value="{{$trainings->email}}" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Website <br> <input class="form-control" readonly id="" name="website" value="{{$trainings->website}}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Pin location <br> <input class="form-control" readonly id="location-input" name="pin" value="{{$trainings->pin}}" type="text" placeholder="..." style="width: 100%;" onfocus="initAutocomplete()">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 spacing-left">
                                            <h5>Details of CRO :</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Name of CRO<br>
                                                    <input class="form-control" readonly name="cro_name" value="{{$trainings->cro_name}}" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Cell No. of CRO<br>
                                                    <input class="form-control" readonly name="cro_cell" value="{{$trainings->cro_cell}}" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Email of CRO<br>
                                                    <input class="form-control" readonly name="email_cro" value="{{$trainings->email_cro}}" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Organized by(RHQ)<br>
                                                    <input class="form-control" readonly name="organized_by" value="{{$trainings->organized_by}}" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Branch<br>
                                                    <input class="form-control" readonly name="branch" value="{{$trainings->branch}}" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>
                                           <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Demo of Video Clip<br>
                                                    <input class="form-control" readonly name="demo" value="{{$trainings->demo}}" type="file" placeholder="..."
                                                        style="width: 100%;">
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($trainings->demo) }}"
                                                            data-extension="{{ pathinfo($trainings->demo, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)">
                                                                {!! getFilePreview($trainings->demo) !!}
                                                            </div>
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Traiing Duration<br>
                                                    <input class="form-control" readonly name="duration" value="{{$trainings->duration}}" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-10 spacing-right">
                                                    Booking Request<br>
                                                    <input class="form-control" readonly name="booking_attach" value="{{$trainings->booking_attach}}" type="file" placeholder="..."
                                                        style="width: 97%;">
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($trainings->booking_attach) }}"
                                                            data-extension="{{ pathinfo($trainings->booking_attach, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)">
                                                                {!! getFilePreview($trainings->booking_attach) !!}
                                                            </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">

                                                <div class="col-lg-5 spacing-right mb-3">
                                                    All Types Covered <br>
                                                    <select id="staff_category" class="form-control" readonly name="all_types_covered" style="width: 100%;">
                                                        <option value="Yes" {{ $trainings->all_types_covered == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                        <option value="No" {{ $trainings->all_types_covered == 'No' ? 'selected' : '' }}>No</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-5 spacing-right mb-3">
                                                    Reports Submitted <br>
                                                    <select class="form-control" readonly name="reports_submitted" style="width: 94%;">
                                                        <option value="Yes" {{ $trainings->reports_submitted == 'Yes' ? 'selected' : '' }} >Yes</option>
                                                        <option value="No" {{ $trainings->reports_submitted == 'No' ? 'selected' : '' }}>No</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!--correnpondence-->
                                    <div class="tab-pane fade show active m-3" style="opacity: 90%;"
                                        id="correnpondence" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <h5 class="mb-2" style="text-align:center"><i><b>Correspondence :</b></i></h5>
                                        <div class="row">
                                            <div class="col-lg-12 spacing-right">
                                                <div class="row mb-2">
                                                    <div class="col-lg-3 spacing-right">
                                                        Booking Request Number<br> <input class="form-control" readonly
                                                            type="text" name="booking_request" value="{{$trainings->booking_request}}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-3 spacing-right ">
                                                        Date of Range Allocation Letter

                                                        <input class="form-control" readonly name="date_allocation_letter"  value="{{$trainings->date_allocation_letter}}"type="date"
                                                            placeholder="..." style="width: 100%;">
                                                    </div>

                                                    <div class="col-lg-3 spacing-right">
                                                        Range Allocation Letter<input class="form-control" readonly
                                                            type="file" name="range_allocation_attach" value="{{$trainings->range_allocation_attach}}" placeholder="..."
                                                            style="width: 100%;">
                                                            <div class="col-lg-5 spacing-right">
                                                                <!-- Image Preview Biometric -->
                                                                <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($trainings->range_allocation_attach) }}"
                                                                data-extension="{{ pathinfo($trainings->range_allocation_attach, PATHINFO_EXTENSION) }}"
                                                                    onclick="openFileModal(this)">
                                                                    {!! getFilePreview($trainings->range_allocation_attach) !!}
                                                                </div>
                                                                {{-- <div class="image-preview42" id="imagePreview42">
                                                                    @if($trainings->range_allocation_attach)
                                                                    <img src="{{ asset($trainings->range_allocation_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                    @else
                                                                    <span class="image-preview__default-text42">Image Preview</span>
                                                                    @endif
                                                                </div> --}}
                                                            </div>
                                                    </div>

                                                    <div class="col-lg-3 spacing-right">
                                                        Booking Request Date <br> <input class="form-control" readonly
                                                            type="date" name="booking_request_date" value="{{$trainings->booking_request_date}}" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>

                                                    <div class="col-lg-3 spacing-right">
                                                        Copy of Booking Request <br> <input class="form-control" readonly
                                                            type="file" name="copy_booking_attach" value="{{$trainings->copy_booking_attach}}" placeholder="..."
                                                            style="width: 100%;">
                                                            <div class="col-lg-5 spacing-right">
                                                                <!-- Image Preview Biometric -->
                                                                <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($trainings->copy_booking_attach) }}"
                                                                data-extension="{{ pathinfo($trainings->copy_booking_attach, PATHINFO_EXTENSION) }}"
                                                                    onclick="openFileModal(this)">
                                                                    {!! getFilePreview($trainings->copy_booking_attach) !!}
                                                                </div>
                                                                {{-- <div class="image-preview42" id="imagePreview42">
                                                                    @if($trainings->copy_booking_attach)
                                                                    <img src="{{ asset($trainings->copy_booking_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                    @else
                                                                    <span class="image-preview__default-text42">Image Preview</span>
                                                                    @endif
                                                                </div> --}}
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-3 spacing-right">
                                                        Guard of Respective Date <br> <input class="form-control" readonly
                                                        type="file" name="guard_resp_attach" value="{{$trainings->guard_resp_attach}}" placeholder="..."
                                                        style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <!-- Image Preview Biometric -->
                                                            <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($trainings->guard_resp_attach) }}"
                                                            data-extension="{{ pathinfo($trainings->guard_resp_attach, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)">
                                                                {!! getFilePreview($trainings->guard_resp_attach) !!}
                                                            </div>
                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if($trainings->guard_resp_attach)
                                                                <img src="{{ asset($trainings->guard_resp_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                @else
                                                                <span class="image-preview__default-text42">Image Preview</span>
                                                                @endif
                                                            </div> --}}
                                                        </div>
                                                    </div>


                                                    <h5 class="mt-2">Invitation :</h5>
                                                    <div class="col-lg-4 spacing-right mt-1">
                                                        Send Email to all active Customers of Respective Region
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input ml-2 pt-1" type="checkbox" name="email_active_check" {{ $trainings->email_active_check ? 'checked' : '' }} id="send-to-active" value="option1">
                                                        </div>
                                                        <br>
                                                        <div id="send-active-options" style="display: none;">
                                                            Send Emails to all active Customers .? <br> <input class="form-control" readonly
                                                            type="text" name="send_email_active" value="{{$trainings->send_email_active}}" placeholder="..."
                                                            style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 spacing-right mt-3">
                                                        Send Email to all Inactive Customers of Respective Region <div
                                                            class="form-check form-check-inline">
                                                            <input class="form-check-input ml-2 pt-1"
                                                                type="checkbox" name="email_inactive_check" {{ $trainings->email_inactive_check ? 'checked' : '' }} id="send-to-inactive"
                                                                value="option1">
                                                        </div> <br>
                                                        <div id="send-inactive-options" style="display: none;">
                                                            Send Emails to all Inactive Customers .? <br> <input class="form-control" readonly
                                                            type="text" name="send_email_inactive" value="{{$trainings->send_email_inactive}}" placeholder="..."
                                                            style="width: 100%;">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 spacing-right mt-3">
                                                        Send Email to all Prospects of Respective Region
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input ml-2 pt-1" name="email_all_check"  {{ $trainings->email_all_check ? 'checked' : '' }} type="checkbox" id="send-to-region" value="option1">
                                                        </div>
                                                        <br>
                                                        <div id="send-email-options" style="display: none;">
                                                            Send Emails to all Prospects .? <br> <input class="form-control" readonly
                                                            type="text" name="send_email_all" value="{{$trainings->send_email_all}}" placeholder="..."
                                                            style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <h5 class="mt-2">Guards Participating in the Training :</h5>
                                                    <div class="col-lg-4 spacing-right mt-3">
                                                        Guards of Respective Region
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input ml-2 pt-1" name="guards_respective"  id="guards_respective_checkbox" {{ $trainings->guards_respective ? 'checked' : '' }} type="checkbox" value="option1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3  mt-2 spacing-right  mt-3">
                                                        List of Guards Participating in Training <br> <input class="form-control" readonly
                                                            type="file" name="list_guard_attach" value="{{$trainings->list_guard_attach}}" placeholder="..."
                                                            style="width: 100%;">
                                                            <div class="col-lg-5 spacing-right">
                                                                <!-- Image Preview Biometric -->
                                                                <div class="file-preview" style="cursor: pointer;"
                                                                    data-file="{{ asset($trainings->list_guard_attach) }}"
                                                                    data-extension="{{ pathinfo($trainings->list_guard_attach, PATHINFO_EXTENSION) }}"
                                                                        onclick="openFileModal(this)">
                                                                        {!! getFilePreview($trainings->list_guard_attach) !!}
                                                                    </div>
                                                                {{-- <div class="image-preview42" id="imagePreview42">
                                                                    @if($trainings->list_guard_attach)
                                                                    <img src="{{ asset($trainings->list_guard_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                    @else
                                                                    <span class="image-preview__default-text42">Image Preview</span>
                                                                    @endif
                                                                </div> --}}
                                                            </div>
                                                    </div>
                                                    <h4 class="mt-3">Guards Associated with this Training : </h4>
                                                    <div class="table-responsive mt-2" id="guardTableContainer" style="display: {{ $trainings->guards_respective ? 'block' : 'none' }}">
                                                        <div style="height: 380px; overflow-y: auto;">
                                                            <table class="table table-bordered table-striped table-fixed">

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


                                                    <h5 class="mt-3">Point of Contact (POC) Details :</h5>

                                                    @foreach ($trainings->trainingpocs as $index => $pocs)
                                                        <input type="hidden" name="trainingpocs[{{ $index }}][poc_id]" value="{{ $pocs->id }}">
                                                        <div class="row">
                                                            <div class="col-lg-6 spacing-right">
                                                                <div class="row mb-2">
                                                                    <div class="form-type col-lg-11 spacing-right">
                                                                        Name of POC <br> <input class="form-control" readonly
                                                                            type="text" value="{{$pocs->poc_name}}" id="degree" name="trainingpocs[{{ $index }}][poc_name]"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="form-type col-lg-6 spacing-right">
                                                                        Title/Designation <br> <input class="form-control" readonly
                                                                            type="text" id="degree" value="{{$pocs->poc_desig}}" name="trainingpocs[{{ $index }}][poc_desig]"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="form-type col-lg-5 spacing-left spacing-right">
                                                                        Fax# <br> <input class="form-control" readonly type="text"
                                                                            id="date"  name="trainingpocs[{{ $index }}][poc_fax]" value="{{$pocs->poc_fax}}" placeholder="..."
                                                                            style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="form-type col-lg-5 spacing-right">
                                                                        Phone No. <br> <input class="form-control" readonly type="text"
                                                                            id="degree"  name="trainingpocs[{{ $index }}][poc_phone]" value="{{$pocs->poc_phone}}" placeholder="..."
                                                                            style="width: 100%;">
                                                                    </div>
                                                                    <div class="form-type col-lg-6 spacing-left spacing-right">
                                                                        Mobile <br> <input class="form-control" readonly type="text"
                                                                            id="date" name="trainingpocs[{{ $index }}][poc_mobile]" value="{{$pocs->poc_mobile}}" placeholder="..."
                                                                            style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="form-type col-lg-11 spacing-right">
                                                                        Website <br> <input class="form-control" readonly type="text"
                                                                            id="degree"  name="trainingpocs[{{ $index }}][poc_web]" value="{{$pocs->poc_web}}" placeholder="..."
                                                                            style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 spacing-right">
                                                                <div class="row mb-2">
                                                                    <div class="form-type col-lg-11 spacing-right">
                                                                        Email Address of POC <br> <input class="form-control" readonly
                                                                            type="text" id="degree" value="{{$pocs->poc_email}}" name="trainingpocs[{{ $index }}][poc_email]"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="form-type col-lg-11 spacing-right">
                                                                        Location of POC <br> <input class="form-control" readonly
                                                                            type="text" id="location-input1" value="{{$pocs->poc_loc}}" name="trainingpocs[{{ $index }}][poc_loc]"
                                                                            placeholder="..." style="width: 100%;" onfocus="initAutocomplete1()">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="form-type col-lg-7 spacing-right">
                                                                        Name of Document <br> <input class="form-control" readonly
                                                                            type="text" id="date" value="{{$pocs->poc_document}}" name="trainingpocs[{{ $index }}][poc_document]"
                                                                            placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="form-type col-lg-4 spacing-left spacing-right">
                                                                        System ID <br> <input class="form-control" readonly type="text"
                                                                            id="date" value="{{$pocs->system_id}}" name="trainingpocs[{{ $index }}][system_id]" placeholder="..."
                                                                            style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="form-type col-lg-11 spacing-right">
                                                                        Other Info <br>
                                                                        <textarea class="form-control" readonly name="trainingpocs[{{ $index }}][other_info]" id="exampleFormControlTextarea1" rows="3">{{ $pocs->other_info }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!--budgets-->
                                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="budgets" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <h5 class="mb-2" style="text-align:center"><i><b>Budget :</b></i></h5>
                                        @foreach ($trainings->trainingbudgets as $index => $budget)
                                        <input type="hidden" name="trainingbudgets[{{ $index }}][b_id]" value="{{ $budget->id }}">
                                        <div style="display: flex; align-items: right;">
                                            <div>
                                                <input type="checkbox" {{ $budget->out_of_scope ? 'checked' : '' }} name="out_of_scope" id="evCheckbox">
                                                <label for="evCheckbox" style="margin-left: 10px;">Out of Scope</label>
                                            </div>
                                        </div>
                                        <div id="everything">
                                            <div class="row" id="budgetDetailsContainer">
                                                <div class="col-lg-12 spacing-right">
                                                    <div class="row mb-2">
                                                        <div class="d-flex">
                                                            <div class="col-lg-6 spacing-right">
                                                                Category <br>
                                                                <input class="form-control mt-2" readonly name="trainingbudgets[{{ $index }}][budget_category]" value="{{ $budget->budget_category }}" style="width: 100%;">
                                                            </div>
                                                            <div class="col-lg-6 spacing-right">
                                                                Mode Of Payment <br>
                                                                <input class="form-control mt-2" readonly value="{{ $budget->mode_of_payment }}" name="trainingbudgets[{{ $index }}][mode_of_payment]" style="width: 100%;">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="d-flex mt-1">
                                                                <div class="col-md-3">
                                                                    Instrument No <br> <input class="form-control" readonly value="{{ $budget->budget_ins_no }}" name="trainingbudgets[{{ $index }}][budget_ins_no]" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Name Of Bank <br> <input class="form-control" readonly value="{{ $budget->name_of_bank }}" name="trainingbudgets[{{ $index }}][name_of_bank]" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Date of Payment <br> <input class="form-control" readonly value="{{ $budget->date_of_payment }}" name="trainingbudgets[{{ $index }}][date_of_payment]" type="date" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Amount Per Unit <br> <input class="form-control" readonly value="{{ $budget->amount_per_unit }}" name="trainingbudgets[{{ $index }}][amount_per_unit]" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-1">
                                                                <div class="col-md-3">
                                                                    Total Amount <br> <input class="form-control" readonly value="{{ $budget->total_amount }}" name="trainingbudgets[{{ $index }}][total_amount]" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Cheque <br> <input class="form-control" readonly name="trainingbudgets[{{ $index }}][cheque_attach]" value="{{ $budget->cheque_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        <!-- Image Preview Biometric -->
                                                                        <div class="file-preview" style="cursor: pointer;"
                                                                    data-file="{{ asset($budget->cheque_attach) }}"
                                                                    data-extension="{{ pathinfo($budget->cheque_attach, PATHINFO_EXTENSION) }}"
                                                                        onclick="openFileModal(this)">
                                                                        {!! getFilePreview($budget->cheque_attach) !!}
                                                                    </div>
                                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                                            @if($budget->cheque_attach)
                                                                            <img src="{{ asset($budget->cheque_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                            @else
                                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                                            @endif
                                                                        </div> --}}
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Voucher <br> <input class="form-control" readonly name="trainingbudgets[{{ $index }}][voucher_attach]" value="{{ $budget->voucher_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        <!-- Image Preview Biometric -->
                                                                        <div class="file-preview" style="cursor: pointer;"
                                                                        data-file="{{ asset($budget->voucher_attach) }}"
                                                                        data-extension="{{ pathinfo($budget->voucher_attach, PATHINFO_EXTENSION) }}"
                                                                            onclick="openFileModal(this)">
                                                                            {!! getFilePreview($budget->voucher_attach) !!}
                                                                        </div>
                                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                                            @if($budget->voucher_attach)
                                                                            <img src="{{ asset($budget->voucher_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                            @else
                                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                                            @endif
                                                                        </div> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        @endforeach




                                        <div class="row mb-2">
                                            <div class="form-type col-lg-3 mt-3">
                                                Estimated Amount <br> <input class="form-control" readonly name="estiated_amount" value="{{$trainings->estimated_amount}} " type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="form-type col-lg-3 mt-3">
                                                Actual Amount <br> <input class="form-control" readonly name="actual_amount" value="{{$trainings->actual_amount}}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="form-type col-lg-3 mt-3">
                                                Total Expense <br> <input class="form-control" readonly name="total_expense" value="{{$trainings->total_expense}}" type="text" placeholder="..." style="width: 100%;">
                                            </div>

                                            <div class="col-lg-3  form-type mt-3">
                                                Expenses Proof Attachement  <br> <input class="form-control" readonly id="" name="expenses_proof_attach" value="{{$trainings->expenses_proof_attach}}" type="file" placeholder="..." style="width: 100%;">
                                                <div class="col-lg-5 spacing-right">
                                                    <!-- Image Preview Biometric -->
                                                    <div class="file-preview" style="cursor: pointer;"
                                                     data-file="{{ asset($trainings->expenses_proof_attach) }}"
                                                      data-extension="{{ pathinfo($trainings->expenses_proof_attach, PATHINFO_EXTENSION) }}"
                                                        onclick="openFileModal(this)">
                                                        {!! getFilePreview($trainings->expenses_proof_attach) !!}
                                                    </div>
                                                    {{-- <div class="image-preview42" id="imagePreview42">
                                                        @if($trainings->expenses_proof_attach)
                                                        <img src="{{ asset($trainings->expenses_proof_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                        @else
                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                        @endif
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!--training modules-->
                                    <div class="tab-pane fade m-3" style="opacity: 90%;"
                                        id="training" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <h5 class="mb-2" style="text-align:center"><i><b>Training Modules :</b></i></h5>
                                        <div class="col-lg-12" style="margin-left:78px;">
                                            <div class="" style="height: 36em;">
                                                {{-- <div class="d">
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
                                                            <img src="/public/first.png" alt="Your image">
                                                            <input type="checkbox" id="myCheckbox" {{ $trainings->general_check ? 'checked' : '' }} name="general_check" class="checkbox-class" style="    position: absolute;
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
                                                            <img src="/public/second.png" alt="Your image">
                                                            <input type="checkbox" id="myCheckbox1" name="weapon_check" {{ $trainings->weapon_check ? 'checked' : '' }} class="checkbox-class" style="    position: absolute;
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
                                                            <img src="/public/third.png" alt="Your image">
                                                            <input type="checkbox" id="myCheckbox2" name="frisking_check" {{ $trainings->frisking_check ? 'checked' : '' }} class="checkbox-class" style="    position: absolute;
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
                                                                <img src="/public/forth.png" alt="Your image">
                                                                <input type="checkbox" id="myCheckbox3" name="gatehouse_check" {{ $trainings->gatehouse_check ? 'checked' : '' }} class="checkbox-class" style="position: absolute;
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
                                                                <img src="/public/fifth.png" alt="Your image">
                                                                <input type="checkbox" id="myCheckbox4" name="optimum_check" {{ $trainings->optimum_check ? 'checked' : '' }} class="checkbox-class" style="position: absolute;
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
                                                                <img src="/public/sixth.png" alt="Your image">
                                                                <input type="checkbox" id="myCheckbox5" name="radio_check" {{ $trainings->radio_check ? 'checked' : '' }} class="checkbox-class" style="position: absolute;
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
                                                                <img src="/public/seventh.png" alt="Your image">
                                                                <input type="checkbox" id="myCheckbox6" name="aid_check" {{ $trainings->aid_check ? 'checked' : '' }} class="checkbox-class" style="position: absolute;
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
                                                                <img src="/public/eigth.png" alt="Your image">
                                                                <input type="checkbox" id="myCheckbox7" name="fire_check" {{ $trainings->fire_check ? 'checked' : '' }} class="checkbox-class" style="    position: absolute;
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
                                                                <img src="/public/ninth.png" alt="Your image">
                                                                <input type="checkbox" id="myCheckbox8" name="self_check" {{ $trainings->self_check ? 'checked' : '' }} class="checkbox-class" style="    position: absolute;
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
                                                                    <img src="/public/tenth.png" alt="Your image">
                                                                    <input type="checkbox" id="myCheckbox9" name="close_check" {{ $trainings->close_check ? 'checked' : '' }} class="checkbox-class" style="    position: absolute;
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
                                                </div> --}}

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
                                                            <img src="/first.png" alt="Your image">
                                                            <input type="checkbox" id="myCheckbox" {{ $trainings->general_check ? 'checked' : '' }} name="general_check"  class="checkbox-class" style="    position: absolute;
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
                                                            <img src="/second.png" alt="Your image">
                                                            <input type="checkbox" id="myCheckbox1" {{ $trainings->weapon_check ? 'checked' : '' }} name="weapon_check" class="checkbox-class" style="    position: absolute;
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
                                                            <img src="/third.png" alt="Your image">
                                                            <input type="checkbox" id="myCheckbox2" {{ $trainings->frisking_check ? 'checked' : '' }} name="frisking_check" class="checkbox-class" style="    position: absolute;
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
                                                                <img src="/forth.png" alt="Your image">
                                                                <input type="checkbox" id="myCheckbox3" {{ $trainings->gatehouse_check ? 'checked' : '' }} name="gatehouse_check" class="checkbox-class" style="position: absolute;
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
                                                                <img src="/fifth.png" alt="Your image">
                                                                <input type="checkbox" id="myCheckbox4" {{ $trainings->optimum_check ? 'checked' : '' }} name="optimum_check" class="checkbox-class" style="position: absolute;
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
                                                                <img src="/sixth.png" alt="Your image">
                                                                <input type="checkbox" id="myCheckbox5" {{ $trainings->radio_check ? 'checked' : '' }} name="radio_check" class="checkbox-class" style="position: absolute;
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
                                                                <img src="/seventh.png" alt="Your image">
                                                                <input type="checkbox" id="myCheckbox6" {{ $trainings->aid_check ? 'checked' : '' }} name="aid_check" class="checkbox-class" style="position: absolute;
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
                                                                <img src="/eigth.png" alt="Your image">
                                                                <input type="checkbox" id="myCheckbox7" {{ $trainings->fire_check ? 'checked' : '' }} name="fire_check" class="checkbox-class" style="    position: absolute;
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
                                                                <img src="/ninth.png" alt="Your image">
                                                                <input type="checkbox" id="myCheckbox8" {{ $trainings->self_check ? 'checked' : '' }} name="self_check" class="checkbox-class" style="    position: absolute;
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
                                                                    <img src="/tenth.png" alt="Your image">
                                                                    <input type="checkbox" id="myCheckbox9" {{ $trainings->close_check ? 'checked' : '' }}  name="close_check" class="checkbox-class" style="    position: absolute;
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
                                                                    <img src="/eleventh.png" height="115px" width="115px" alt="Your image">
                                                                    <input type="checkbox" id="myCheckbox10" {{ $trainings->crime_check ? 'checked' : '' }}  name="crime_check" class="checkbox-class" style="    position: absolute;
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
                                                            Video of this Course <br> <input class="form-control" readonly id=""
                                                                name="general_video" value="{{ $trainings->general_video }}" type="file" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-5 spacing-left spacing-right">
                                                            Literature of this Course <br> <input class="form-control" readonly
                                                                id="" name="general_literature" value="{{ $trainings->general_literature }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <h5 class="mt-2">Trainer Details</h5>
                                                        <div class="col-lg-6 spacing-right">
                                                            Name <br> <input class="form-control" readonly id=""
                                                                name="general_trainer_name" value="{{ $trainings->general_trainer_name }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right">
                                                            Designation <br> <input class="form-control" readonly id=""
                                                                name="general_trainer_desig" value="{{ $trainings->general_trainer_desig }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6  spacing-right">
                                                            Email <br> <input class="form-control" readonly id=""
                                                                name="general_trainer_email" value="{{ $trainings->general_trainer_email }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-left">
                                                            Cell No <br> <input class="form-control" readonly id=""
                                                                name="general_trainer_cell" value="{{ $trainings->general_trainer_cell }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-right">
                                                            Office<br> <input class="form-control" readonly id=""
                                                                name="general_trainer_office" value="{{ $trainings->general_trainer_office }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-right">
                                                            RHQ <br> <input class="form-control" readonly id=""
                                                                name="general_trainer_rhq" value="{{ $trainings->general_trainer_rhq }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-right">
                                                            Region <br> <input class="form-control" readonly id=""
                                                                name="general_trainer_region" value="{{ $trainings->general_trainer_region }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-right">
                                                            Quantity of Trainer Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="general_trainer_cards" value="{{ $trainings->general_trainer_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right">
                                                            Quantity of Guards Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="general_guards_cards" value="{{ $trainings->general_guards_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
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
                                                        Video of this Course <br> <input class="form-control" readonly id=""
                                                            name="weapon_video" type="file" value="{{ $trainings->weapon_video }}" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Literature of this Course <br> <input class="form-control" readonly id=""
                                                            name="weapon_literature" value="{{ $trainings->weapon_literature }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <h5 class="mt-2">Trainer Details</h5>
                                                    <div class="col-lg-6 spacing-right">
                                                        Name <br> <input class="form-control" readonly id=""
                                                            name="weapon_trainer_name" value="{{ $trainings->weapon_trainer_name }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left spacing-right">
                                                        Designation <br> <input class="form-control" readonly id=""
                                                            name="weapon_trainer_desig" value="{{ $trainings->weapon_trainer_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6  spacing-right">
                                                        Email <br> <input class="form-control" readonly id=""
                                                            name="weapon_trainer_email" value="{{ $trainings->weapon_trainer_email }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Cell No <br> <input class="form-control" readonly id=""
                                                            name="weapon_trainer_cell" value="{{ $trainings->weapon_trainer_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Office<br> <input class="form-control" readonly id=""
                                                            name="weapon_trainer_office" value="{{ $trainings->weapon_trainer_office }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        RHQ <br> <input class="form-control" readonly id=""
                                                            name="weapon_trainer_rhq" value="{{ $trainings->weapon_trainer_rhq }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Region <br> <input class="form-control" readonly id=""
                                                            name="weapon_trainer_region" value="{{ $trainings->weapon_trainer_region }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-right">
                                                            Quantity of Trainer Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="weapon_trainer_cards" value="{{ $trainings->weapon_trainer_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right">
                                                            Quantity of Guards Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="weapon_guards_cards" value="{{ $trainings->weapon_guards_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
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
                                                        Video of this Course <br> <input class="form-control" readonly id=""
                                                            name="frisking_video" value="{{ $trainings->frisking_video }}" type="file" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Literature of this Course <br> <input class="form-control" readonly id=""
                                                            name="frisking_literature" value="{{ $trainings->frisking_literature }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <h5 class="mt-2">Trainer Details</h5>
                                                    <div class="col-lg-6 spacing-right">
                                                        Name <br> <input class="form-control" readonly id=""
                                                            name="frisking_trainer_name" value="{{ $trainings->frisking_trainer_name }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left spacing-right">
                                                        Designation <br> <input class="form-control" readonly id=""
                                                            name="frisking_trainer_desig" value="{{ $trainings->frisking_trainer_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6  spacing-right">
                                                        Email <br> <input class="form-control" readonly id=""
                                                            name="frisking_trainer_email" value="{{ $trainings->frisking_trainer_email }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Cell No <br> <input class="form-control" readonly id=""
                                                            name="frisking_trainer_email" value="{{ $trainings->frisking_trainer_email }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Office <br> <input class="form-control" readonly id=""
                                                            name="frisking_trainer_office" value="{{ $trainings->frisking_trainer_office }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        RHQ <br> <input class="form-control" readonly id=""
                                                            name="frisking_trainer_rhq" value="{{ $trainings->frisking_trainer_rhq }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Region <br> <input class="form-control" readonly id=""
                                                            name="frisking_trainer_region" value="{{ $trainings->frisking_trainer_region }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-right">
                                                            Quantity of Trainer Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="frisking_trainer_cards" value="{{ $trainings->frisking_trainer_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right">
                                                            Quantity of Guards Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="frisking_guards_name" value="{{ $trainings->frisking_guards_name }}" type="text"
                                                                placeholder="..." style="width: 100%;">
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
                                                        Video of this Course <br> <input class="form-control" readonly id=""
                                                            name="gatehouse_video" value="{{ $trainings->gatehouse_video }}" type="file" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Literature of this Course <br> <input class="form-control" readonly id=""
                                                            name="gatehouse_literature" value="{{ $trainings->gatehouse_literature }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <h5 class="mt-2">Trainer Details</h5>
                                                    <div class="col-lg-6 spacing-right">
                                                        Name <br> <input class="form-control" readonly id=""
                                                            name="gatehouse_trainer_name" value="{{ $trainings->gatehouse_trainer_name }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left spacing-right">
                                                        Designation <br> <input class="form-control" readonly id=""
                                                            name="gatehouse_trainer_desig" value="{{ $trainings->gatehouse_trainer_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6  spacing-right">
                                                        Email <br> <input class="form-control" readonly id=""
                                                            name="gatehouse_trainer_email" value="{{ $trainings->gatehouse_trainer_email }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Cell No <br> <input class="form-control" readonly id=""
                                                            name="gatehouse_trainer_cell" value="{{ $trainings->gatehouse_trainer_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Office <br> <input class="form-control" readonly id=""
                                                            name="gatehouse_trainer_office" value="{{ $trainings->gatehouse_trainer_office }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        RHQ <br> <input class="form-control" readonly id=""
                                                            name="gatehouse_trainer_rhq" value="{{ $trainings->gatehouse_trainer_rhq }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Region <br> <input class="form-control" readonly id=""
                                                            name="gatehouse_trainer_region" value="{{ $trainings->gatehouse_trainer_region }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-right">
                                                            Quantity of Trainer Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="gatehouse_trainer_cards" value="{{ $trainings->gatehouse_trainer_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right">
                                                            Quantity of Guards Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="gatehouse_guards_cards" value="{{ $trainings->gatehouse_guards_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
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
                                                        Video of this Course <br> <input class="form-control" readonly id=""
                                                            name="optimum_video" value="{{ $trainings->optimum_video }}" type="file" placeholder="..." style="width: 100%;">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($trainings->optimum_video) }}"
                                                            data-extension="{{ pathinfo($trainings->optimum_video, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)">
                                                                {!! getFilePreview($trainings->optimum_video) !!}
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Literature of this Course <br> <input class="form-control" readonly id=""
                                                            name="optimum_literature" value="{{ $trainings->optimum_literature }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <h5 class="mt-2">Trainer Details</h5>
                                                    <div class="col-lg-6 spacing-right">
                                                        Name <br> <input class="form-control" readonly id=""
                                                            name="optimum_trainer_name" value="{{ $trainings->optimum_trainer_name }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left spacing-right">
                                                        Designation <br> <input class="form-control" readonly id=""
                                                            name="optimum_trainer_desig" value="{{ $trainings->optimum_trainer_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6  spacing-right">
                                                        Email <br> <input class="form-control" readonly id=""
                                                            name="optimum_trainer_email" value="{{ $trainings->optimum_trainer_email }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Cell No <br> <input class="form-control" readonly id=""
                                                            name="optimum_trainer_cell" value="{{ $trainings->optimum_trainer_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Office <br> <input class="form-control" readonly id=""
                                                            name="optimum_trainer_office" value="{{ $trainings->optimum_trainer_office }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        RHQ <br> <input class="form-control" readonly id=""
                                                            name="optimum_trainer_rhq" value="{{ $trainings->optimum_trainer_rhq }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Region <br> <input class="form-control" readonly id=""
                                                            name="optimum_trainer_region" value="{{ $trainings->optimum_trainer_region }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-right">
                                                            Quantity of Trainer Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="optimum_trainer_cards" value="{{ $trainings->optimum_trainer_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right">
                                                            Quantity of Guards Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="optimum_guards_cards" value="{{ $trainings->optimum_guards_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
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
                                                        Video of this Course <br> <input class="form-control" readonly id=""
                                                            name="radio_video" value="{{ $trainings->radio_video }}" type="file" placeholder="..." style="width: 100%;">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($trainings->radio_video) }}"
                                                            data-extension="{{ pathinfo($trainings->radio_video, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)">
                                                                {!! getFilePreview($trainings->radio_video) !!}
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Literature of this Course <br> <input class="form-control" readonly id=""
                                                            name="radio_literature" value="{{ $trainings->radio_literature }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <h5 class="mt-2">Trainer Details</h5>
                                                    <div class="col-lg-6 spacing-right">
                                                        Name <br> <input class="form-control" readonly id=""
                                                            name="radio_trainer_name" value="{{ $trainings->radio_trainer_name }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left spacing-right">
                                                        Designation <br> <input class="form-control" readonly id=""
                                                            name="radio_trainer_desig" value="{{ $trainings->radio_trainer_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6  spacing-right">
                                                        Email <br> <input class="form-control" readonly id=""
                                                            name="radio_trainer_email" value="{{ $trainings->radio_trainer_email }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Cell No <br> <input class="form-control" readonly id=""
                                                            name="radio_trainer_cell" value="{{ $trainings->radio_trainer_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Office <br> <input class="form-control" readonly id=""
                                                            name="radio_trainer_office" value="{{ $trainings->radio_trainer_office }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        RHQ <br> <input class="form-control" readonly id=""
                                                            name="radio_trainer_rhq" value="{{ $trainings->radio_trainer_rhq }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Region <br> <input class="form-control" readonly id=""
                                                            name="radio_trainer_region" value="{{ $trainings->radio_trainer_region }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-right">
                                                            Quantity of Trainer Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="radio_trainer_cards" value="{{ $trainings->radio_trainer_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right">
                                                            Quantity of Guards Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="radio_guards_cards" value="{{ $trainings->radio_guards_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
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
                                                        Video of this Course <br> <input class="form-control" readonly id=""
                                                            name="firstaid_video" value="{{ $trainings->firstaid_video }}" type="file" placeholder="..." style="width: 100%;">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($trainings->firstaid_video) }}"
                                                            data-extension="{{ pathinfo($trainings->firstaid_video, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)">
                                                                {!! getFilePreview($trainings->firstaid_video) !!}
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Literature of this Course <br> <input class="form-control" readonly id=""
                                                            name="firstaid_literature" value="{{ $trainings->firstaid_literature }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <h5 class="mt-2">Trainer Details</h5>
                                                    <div class="col-lg-6 spacing-right">
                                                        Name <br> <input class="form-control" readonly id=""
                                                            name="firstaid_trainer_name" value="{{ $trainings->firstaid_trainer_name }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left spacing-right">
                                                        Designation <br> <input class="form-control" readonly id=""
                                                            name="firstaid_trainer_desig" value="{{ $trainings->firstaid_trainer_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6  spacing-right">
                                                        Email <br> <input class="form-control" readonly id=""
                                                            name="firstaid_trainer_email" value="{{ $trainings->firstaid_trainer_email }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Cell No <br> <input class="form-control" readonly id=""
                                                            name="firstaid_trainer_cell" value="{{ $trainings->firstaid_trainer_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Office <br> <input class="form-control" readonly id=""
                                                            name="firstaid_trainer_office" value="{{ $trainings->firstaid_trainer_office }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        RHQ <br> <input class="form-control" readonly id=""
                                                            name="firstaid_trainer_rhq" value="{{ $trainings->firstaid_trainer_rhq }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Region <br> <input class="form-control" readonly id=""
                                                            name="firstaid_trainer_region" value="{{ $trainings->firstaid_trainer_region }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-right">
                                                            Quantity of Trainer Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="firstaid_trainer_cards" value="{{ $trainings->firstaid_trainer_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right">
                                                            Quantity of Guards Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="firstaid_guards_cards" value="{{ $trainings->firstaid_guards_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
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
                                                        Video of this Course <br> <input class="form-control" readonly id=""
                                                            name="fire_video" value="{{ $trainings->fire_video }}" type="file" placeholder="..." style="width: 100%;">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($trainings->fire_video) }}"
                                                            data-extension="{{ pathinfo($trainings->fire_video, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)">
                                                                {!! getFilePreview($trainings->fire_video) !!}
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Literature of this Course <br> <input class="form-control" readonly id=""
                                                            name="fire_literature" value="{{ $trainings->fire_literature }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <h5 class="mt-2">Trainer Details</h5>
                                                    <div class="col-lg-6 spacing-right">
                                                        Name <br> <input class="form-control" readonly id=""
                                                            name="fire_trainer_name" value="{{ $trainings->fire_trainer_name }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left spacing-right">
                                                        Designation <br> <input class="form-control" readonly id=""
                                                            name="fire_trainer_desig" value="{{ $trainings->fire_trainer_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6  spacing-right">
                                                        Email <br> <input class="form-control" readonly id=""
                                                            name="fire_trainer_email" value="{{ $trainings->fire_trainer_email }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Cell No <br> <input class="form-control" readonly id=""
                                                            name="fire_trainer_cell" value="{{ $trainings->fire_trainer_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Office <br> <input class="form-control" readonly id=""
                                                            name="fire_trainer_office" value="{{ $trainings->fire_trainer_office }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        RHQ <br> <input class="form-control" readonly id=""
                                                            name="fire_trainer_rhq" value="{{ $trainings->fire_trainer_rhq }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Region <br> <input class="form-control" readonly id=""
                                                            name="fire_trainer_region" value="{{ $trainings->fire_trainer_region }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-right">
                                                            Quantity of Trainer Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="fire_trainer_cards" value="{{ $trainings->fire_trainer_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right">
                                                            Quantity of Guards Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="fire_guards_cards" value="{{ $trainings->fire_guards_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
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
                                                        Video of this Course <br> <input class="form-control" readonly id=""
                                                            name="self_video" value="{{ $trainings->self_video }}" type="file" placeholder="..." style="width: 100%;">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($trainings->self_video) }}"
                                                            data-extension="{{ pathinfo($trainings->self_video, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)">
                                                                {!! getFilePreview($trainings->self_video) !!}
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Literature of this Course <br> <input class="form-control" readonly id=""
                                                            name="self_literature" value="{{ $trainings->self_literature }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <h5 class="mt-2">Trainer Details</h5>
                                                    <div class="col-lg-6 spacing-right">
                                                        Name <br> <input class="form-control" readonly id=""
                                                            name="self_trainer_name" value="{{ $trainings->self_trainer_name }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left spacing-right">
                                                        Designation <br> <input class="form-control" readonly id=""
                                                            name="self_trainer_desig" value="{{ $trainings->self_trainer_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6  spacing-right">
                                                        Email <br> <input class="form-control" readonly id=""
                                                            name="self_trainer_email" value="{{ $trainings->self_trainer_email }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Cell No <br> <input class="form-control" readonly id=""
                                                            name="self_trainer_cell" value="{{ $trainings->self_trainer_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Office <br> <input class="form-control" readonly id=""
                                                            name="self_trainer_office" value="{{ $trainings->self_trainer_office }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        RHQ <br> <input class="form-control" readonly id=""
                                                            name="self_trainer_rhq" value="{{ $trainings->self_trainer_rhq }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Region <br> <input class="form-control" readonly id=""
                                                            name="self_trainer_region" value="{{ $trainings->self_trainer_region }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-right">
                                                            Quantity of Trainer Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="self_trainer_cards" value="{{ $trainings->self_trainer_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right">
                                                            Quantity of Guards Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="self_guards_cards" value="{{ $trainings->self_guards_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
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
                                                        Video of this Course <br> <input class="form-control" readonly id=""
                                                            name="close_video" value="{{ $trainings->close_video }}" type="file" placeholder="..." style="width: 100%;">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($trainings->close_video) }}"
                                                            data-extension="{{ pathinfo($trainings->close_video, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)">
                                                                {!! getFilePreview($trainings->close_video) !!}
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Literature of this Course <br> <input class="form-control" readonly id=""
                                                            name="close_literature" value="{{ $trainings->close_literature }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <h5 class="mt-2">Trainer Details</h5>
                                                    <div class="col-lg-6 spacing-right">
                                                        Name <br> <input class="form-control" readonly id=""
                                                            name="close_trainer_name" value="{{ $trainings->close_trainer_name }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left spacing-right">
                                                        Designation <br> <input class="form-control" readonly id=""
                                                            name="close_trainer_desig" value="{{ $trainings->close_trainer_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6  spacing-right">
                                                        Email <br> <input class="form-control" readonly id=""
                                                            name="close_trainer_email" value="{{ $trainings->close_trainer_email }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Cell No <br> <input class="form-control" readonly id=""
                                                            name="close_trainer_cell" value="{{ $trainings->close_trainer_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Office <br> <input class="form-control" readonly id=""
                                                            name="close_trainer_office" value="{{ $trainings->close_trainer_office }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        RHQ <br> <input class="form-control" readonly id=""
                                                            name="close_trainer_rhq" value="{{ $trainings->close_trainer_rhq }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Region <br> <input class="form-control" readonly id=""
                                                            name="close_trainer_region" value="{{ $trainings->close_trainer_region }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-right">
                                                            Quantity of Trainer Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="close_trainer_cards" value="{{ $trainings->close_trainer_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right">
                                                            Quantity of Guards Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="close_guards_cards" value="{{ $trainings->close_guards_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
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
                                                        Video of this Course <br> <input class="form-control" readonly id=""
                                                            name="crime_video" value="{{ $trainings->crime_video }}" type="file" placeholder="..." style="width: 100%;">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($trainings->crime_video) }}"
                                                            data-extension="{{ pathinfo($trainings->crime_video, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)">
                                                                {!! getFilePreview($trainings->crime_video) !!}
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Literature of this Course <br> <input class="form-control" readonly id="" name="crime_literature" value="{{ $trainings->crime_literature }}" type="file" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <h5 class="mt-2">Trainer Details</h5>
                                                    <div class="col-lg-6 spacing-right">
                                                        Name <br> <input class="form-control" readonly id=""
                                                            name="crime_trainer_name" value="{{ $trainings->crime_trainer_name }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left spacing-right">
                                                        Designation <br> <input class="form-control" readonly id=""
                                                            name="crime_trainer_desig" value="{{ $trainings->crime_trainer_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6  spacing-right">
                                                        Email <br> <input class="form-control" readonly id=""
                                                            name="crime_trainer_email" value="{{ $trainings->crime_trainer_email }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Cell No <br> <input class="form-control" readonly id=""
                                                            name="crime_trainer_cell" value="{{ $trainings->crime_trainer_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        Office <br> <input class="form-control" readonly id=""
                                                            name="crime_trainer_office" value="{{ $trainings->crime_trainer_office }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right">
                                                        RHQ <br> <input class="form-control" readonly id=""
                                                            name="crime_trainer_rhq" value="{{ $trainings->crime_trainer_rhq }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-left">
                                                        Region <br> <input class="form-control" readonly id=""
                                                            name="crime_trainer_region" value="{{ $trainings->crime_trainer_region }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-right">
                                                            Quantity of Trainer Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="crime_trainer_cards" value="{{ $trainings->crime_trainer_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-left spacing-right">
                                                            Quantity of Guards Cards for this Course : <br> <input class="form-control" readonly
                                                                id="" name="crime_guards_cards" value="{{ $trainings->crime_guards_cards }}" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>

                                                </div>
                                                <hr class="w-75 mx-auto" />
                                            </div>

                                        </div>
                                        <div class="my-3">
                                            <h5 class="mt-2 mb-3 " style="text-align:center">
                                               Checklist of Organizing Training
                                            </h5>
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
                                                                <td><input type="text" name='name[]'
                                                                        placeholder='Enter Activity'
                                                                        class="form-control" readonly /></td>
                                                                <td><input type="text" name='name[]'
                                                                        placeholder='Enter Timeline'
                                                                        class="form-control" readonly /></td>
                                                                <td><input type="text" name='name[]'
                                                                        placeholder='Enter Responsible'
                                                                        class="form-control" readonly /></td>
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
                                    </div>
                                    <hr>
                                    <!-- Weapon and Ammunition -->
                                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="weapons" tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <h5 class="mb-2" style="text-align:center"><i><b>Weapons and Ammunition :</b></i></h5>
                                        <div class="row">
                                            <div class="col-lg-12 spacing-right">
                                                <div class="row mb-2">
                                                    <div class="form-type col-lg-3 spacing-right">
                                                        @foreach ($trainings->trainingweapons as $index => $weapon)
                                                        <input type="hidden" name="trainingweapons[{{ $index }}][w_id]" value="{{ $weapon->id }}">
                                                        <h5 style="margin-bottom: -5px;">List of Weapons</h5> <br>

                                                        Type of Weapon <br><input class="form-control" readonly value="{{ $weapon->type_of_weapon }}" name="trainingweapons[{{ $index }}][type_of_weapon]" type="text"
                                                        placeholder="..." style="width: 100%;">

                                                        Weapon Number<br> <input class="form-control" readonly name="trainingweapons[{{ $index }}][weapon_no]" value="{{ $weapon->weapon_no }}" type="text"
                                                            placeholder="..." style="width: 100%;">

                                                        Caliber<br> <input
                                                            class="form-control" readonly type="text" name="trainingweapons[{{ $index }}][caliber]" value="{{ $weapon->caliber }}" placeholder="..."
                                                            style="width: 100%;">

                                                        Bore<br> <input
                                                        class="form-control" readonly name="trainingweapons[{{ $index }}][bore]" value="{{ $weapon->bore }}" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                        Price Per Unit<br> <input class="form-control" readonly name="trainingweapons[{{ $index }}][weapon_price_pu]" value="{{ $weapon->weapon_price_pu }}" type="text"
                                                            placeholder="..." style="width: 100%;">
                                                        Quantity<br> <input class="form-control" readonly name="trainingweapons[{{ $index }}][weapon_quantity]" value="{{ $weapon->weapon_quantity }}" type="text"
                                                            placeholder="..." style="width: 100%;">
                                                        Total Price<br> <input class="form-control" readonly name="trainingweapons[{{ $index }}][weapon_total_price]" value="{{ $weapon->weapon_total_price }}" type="text"
                                                            placeholder="..." style="width: 100%;">

                                                        Person Responsible for Weapon<br> <input
                                                            class="form-control" readonly type="text" name="trainingweapons[{{ $index }}][person_responsible_weapon]" value="{{ $weapon->person_responsible_weapon }}" placeholder="..."
                                                            style="width: 100%;">

                                                        Attachments <br> <input class="form-control" readonly name="trainingweapons[{{ $index }}][weapon_attach]" value="{{ $weapon->weapon_attach }}" type="file"
                                                            placeholder="..." style="width: 100%;">
                                                            <div class="col-lg-5 spacing-right">
                                                                <!-- Image Preview Biometric -->
                                                                <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($weapon->weapon_attach) }}"
                                                                data-extension="{{ pathinfo($weapon->weapon_attach, PATHINFO_EXTENSION) }}"
                                                                    onclick="openFileModal(this)">
                                                                    {!! getFilePreview($weapon->weapon_attach) !!}
                                                                </div>
                                                                {{-- <div class="image-preview42" id="imagePreview42">
                                                                    @if($weapon->weapon_attach)
                                                                    <img src="{{ asset($weapon->weapon_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                    @else
                                                                    <span class="image-preview__default-text42">Image Preview</span>
                                                                    @endif
                                                                </div> --}}
                                                            </div>

                                                        Notes <br> <textarea class="form-control" readonly name="trainingweapons[{{ $index }}][weapon_notes]" type="text"
                                                        placeholder="..." style="width: 100%;">{{ $weapon->weapon_notes }}</textarea>

                                                        @endforeach

                                                    </div>

                                                    <div class="form-type col-lg-3 spacing-right">
                                                        @foreach ($trainings->trainingammunitions as $index => $ammu)
                                                        <input type="hidden" name="trainingammunitions[{{ $index }}][am_id]" value="{{ $ammu->id }}">
                                                        <h5 style="margin-bottom: -5px;">List of Ammunition</h5>
                                                        <br>

                                                        Quantity<br> <input class="form-control" readonly name="trainingammunitions[{{ $index }}][ammu_quantity]" value="{{ $ammu->ammu_quantity }}" type="text"
                                                            placeholder="..." style="width: 100%;">

                                                        Type<br> <input class="form-control" readonly name="trainingammunitions[{{ $index }}][ammu_type]" value="{{ $ammu->ammu_type }}" type="text"
                                                            placeholder="..." style="width: 100%;">

                                                        Person Responsible for Ammunition<br> <input
                                                        class="form-control" readonly type="text" name="trainingammunitions[{{ $index }}][person_responsible_ammu]" value="{{ $ammu->person_responsible_ammu }}" placeholder="..."
                                                        style="width: 100%;">

                                                        Price per Unit <br> <input class="form-control" readonly
                                                            type="text" name="trainingammunitions[{{ $index }}][price_per_unit_ammu]" value="{{ $ammu->price_per_unit_ammu }}" placeholder="..."
                                                            style="width: 100%;">

                                                        Total Price <br> <input class="form-control" readonly name="trainingammunitions[{{ $index }}][total_price_ammu]" value="{{ $ammu->total_price_ammu }}" type="text"
                                                            placeholder="..." style="width: 100%;">

                                                        Attachments <br> <input class="form-control" readonly name="trainingammunitions[{{ $index }}][ammu_attach]" value="{{ $ammu->ammu_attach }}" type="file"
                                                        placeholder="..." style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <!-- Image Preview Biometric -->
                                                            <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($ammu->ammu_attach) }}"
                                                                data-extension="{{ pathinfo($ammu->ammu_attach, PATHINFO_EXTENSION) }}"
                                                                    onclick="openFileModal(this)">
                                                                    {!! getFilePreview($ammu->ammu_attach) !!}
                                                                </div>
                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if($ammu->ammu_attach)
                                                                <img src="{{ asset($ammu->ammu_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                @else
                                                                <span class="image-preview__default-text42">Image Preview</span>
                                                                @endif
                                                            </div> --}}
                                                        </div>

                                                        Notes <br> <textarea class="form-control" readonly name="trainingammunitions[{{ $index }}][ammu_notes]" type="text"
                                                        placeholder="..." style="width: 100%;">{{ $ammu->ammu_notes }}</textarea>
                                                        @endforeach
                                                    </div>

                                                    <div class="form-type col-lg-3 spacing-right">
                                                        <h5 style="margin-bottom: -5px;">Armourer Details</h5> <br>
                                                        @foreach ($trainings->trainingarmourers as $index => $armourers)
                                                        <input type="hidden" name="trainingarmourers[{{ $index }}][arm_id]" value="{{ $armourers->id }}">
                                                        Name <br> <input class="form-control" readonly name="trainingarmourers[{{ $index }}][armourer_name]" value="{{ $armourers->armourer_name }}" type="text"
                                                        placeholder="..." style="width: 100%;">

                                                        Cell Number <br> <input class="form-control" readonly name="trainingarmourers[{{ $index }}][armourer_cell]" value="{{ $armourers->armourer_cell }}" type="text"
                                                        placeholder="..." style="width: 100%;">

                                                        Attachments <br> <input class="form-control" readonly name="trainingarmourers[{{ $index }}][armourer_attach]" value="{{ $armourers->armourer_attach }}" type="file"
                                                        placeholder="..." style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <!-- Image Preview Biometric -->
                                                            <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($armourers->armourer_attach) }}"
                                                            data-extension="{{ pathinfo($armourers->armourer_attach, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)">
                                                                {!! getFilePreview($armourers->armourer_attach) !!}
                                                            </div>
                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if($armourers->armourer_attach)
                                                                <img src="{{ asset($armourers->armourer_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                @else
                                                                <span class="image-preview__default-text42">Image Preview</span>
                                                                @endif
                                                            </div> --}}
                                                        </div>

                                                        Notes <br> <textarea class="form-control" readonly name="trainingarmourers[{{ $index }}][armourer_notes]" type="text"
                                                        placeholder="..." style="width: 100%;">{{ $armourers->armourer_notes }}</textarea>
                                                        @endforeach

                                                    </div>

                                                    <div class="form-type col-lg-3 spacing-right">
                                                        <h5 style="margin-bottom: -5px;">List of Security Equipment
                                                        </h5> <br>
                                                        @foreach ($trainings->trainingequipments as $index => $equipment)
                                                        <input type="hidden" name="trainingequipments[{{ $index }}][e_id]" value="{{ $equipment->id }}">
                                                        Category <br> <input class="form-control" readonly name="trainingequipments[{{ $index }}][sec_equip_category]" value="{{ $equipment->sec_equip_category }}" type="text"
                                                            placeholder="..." style="width: 100%;">

                                                        Type <br> <input class="form-control" readonly name="trainingequipments[{{ $index }}][sec_equip_type]" value="{{ $equipment->sec_equip_type }}" type="text"
                                                            placeholder="..." style="width: 100%;">

                                                            Price Per Unit <br> <input class="form-control" readonly name="trainingequipments[{{ $index }}][sec_equip_pricepu]" value="{{ $equipment->sec_equip_pricepu }}" type="text"
                                                            placeholder="..." style="width: 100%;">
                                                        Quantity <br> <input class="form-control" readonly name="trainingequipments[{{ $index }}][sec_equip_quantity]" value="{{ $equipment->sec_equip_quantity }}" type="text"
                                                            placeholder="..." style="width: 100%;">
                                                        Total Price <br> <input class="form-control" readonly name="trainingequipments[{{ $index }}][sec_equip_totalprice]" value="{{ $equipment->sec_equip_totalprice }}" type="text"
                                                            placeholder="..." style="width: 100%;">

                                                        Person Responsible for Equipments<br> <input
                                                            class="form-control" readonly type="text" name="trainingequipments[{{ $index }}][person_responsible_sec_equip]" value="{{ $equipment->person_responsible_sec_equip }}" placeholder="..."
                                                            style="width: 100%;">

                                                        Attachments <br> <input class="form-control" readonly name="trainingequipments[{{ $index }}][sec_equip_attach]" value="{{ $equipment->sec_equip_attach }}" type="file"
                                                        placeholder="..." style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <!-- Image Preview Biometric -->
                                                            <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($equipment->sec_equip_attach) }}"
                                                            data-extension="{{ pathinfo($equipment->sec_equip_attach, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)">
                                                                {!! getFilePreview($equipment->sec_equip_attach) !!}
                                                            </div>
                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if($equipment->sec_equip_attach)
                                                                <img src="{{ asset($equipment->sec_equip_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                @else
                                                                <span class="image-preview__default-text42">Image Preview</span>
                                                                @endif
                                                            </div> --}}
                                                        </div>

                                                        Notes <br> <textarea class="form-control" readonly name="trainingequipments[{{ $index }}][sec_equip_notes]" type="text"
                                                        placeholder="..." style="width: 100%;">{{ $equipment->sec_equip_notes }}</textarea>

                                                        <div id="quantity-field">
                                                            Red Flag Quantity <br>
                                                            <input class="form-control" readonly type="text" name="trainingequipments[{{ $index }}][red_flag_quantity]" value="{{ $equipment->red_flag_quantity }}" placeholder="..." style="width: 100%;">
                                                        </div>

                                                        <div id="blue-field">
                                                            Target Quantity <br>
                                                            <input class="form-control" readonly type="text" name="trainingequipments[{{ $index }}][target_quantity]" value="{{ $equipment->target_quantity }}" placeholder="..." style="width: 100%;">
                                                        </div>

                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Facility Management -->
                                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="facility"
                                        tabpanel" aria-labelledby="nav-profile-tab">
                                        <h5 class="mb-2" style="text-align:center"><i><b>Facility Management :</b></i></h5>
                                        <div class="row">
                                            <div class="col-lg-12 spacing-right">
                                                <div class="row mb-2">
                                                    <div class="" style="display: flex; flex-direction:row">
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <div class="form-check form-check-inline spacing-left mt-2" >
                                                                    <input class="form-check-input" name="first_aid_check" {{ $trainings->first_aid_check ? 'checked' : '' }} type="checkbox" id="first-aid" value="negative">
                                                                    <label class="form-check-label" for="inlineCheckbox1"><b>No. of First Aid Boxes required.</b></label>
                                                                </div>
                                                                <br>
                                                                <div id="first-quantity" style="display:none;">
                                                                    Quantity <br>
                                                                    <input class="form-control" readonly name="first_aid_quantity" value="{{ $trainings->first_aid_quantity }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="form-check form-check-inline spacing-left mt-2" >
                                                                    <input class="form-check-input" name="umbrella_check" {{ $trainings->umbrella_check ? 'checked' : '' }} type="checkbox" id="umbrella" value="negative">
                                                                    <label class="form-check-label" for="inlineCheckbox1"><b>No. of Umbrellas required.</b></label>
                                                                </div>
                                                                <br>
                                                                <div id="umbrella-quantity" style="display:none;">
                                                                    Quantity <br>
                                                                    <input class="form-control" readonly name="umbrella_quantity" value="{{ $trainings->umbrella_quantity }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="form-check form-check-inline spacing-left mt-2">
                                                                    <input class="form-check-input" name="wireless_check" {{ $trainings->wireless_check ? 'checked' : '' }} type="checkbox" id="wirecheck" value="negative">
                                                                    <label class="form-check-label" for="inlineCheckbox1"><b>Wireless Sets.</b></label>
                                                                </div>
                                                                <br>
                                                                <div id="wire-field" style="display:none;">
                                                                    Quantity <br>
                                                                    <input class="form-control" readonly name="wireless_quantity" value="{{ $trainings->wireless_quantity }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="form-check form-check-inline spacing-left mt-2">
                                                                    <input class="form-check-input" name="mega_check" {{ $trainings->mega_check ? 'checked' : '' }} type="checkbox" id="megacheck" value="negative">
                                                                    <label class="form-check-label" for="inlineCheckbox1"><b>Mega Phones.</b></label>
                                                                </div>
                                                                <br>
                                                                <div id="mega-field" style="display:none;">
                                                                    Quantity <br>
                                                                    <input class="form-control" readonly name="mega_phone_quantity" value="{{ $trainings->mega_phone_quantity }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="form-check form-check-inline spacing-left mt-2">
                                                                    <input class="form-check-input" name="sofa_check" {{ $trainings->sofa_check ? 'checked' : '' }} type="checkbox" id="sofas" value="negative">
                                                                    <label class="form-check-label" for="inlineCheckbox1"><b>No of Sofas.</b></label>
                                                                </div>
                                                                <br>
                                                                <div id="sofa-field" style="display:none;">
                                                                    Quantity <br>
                                                                    <input class="form-control" readonly name="sofas_quantity" value="{{ $trainings->sofas_quantity }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="form-check form-check-inline spacing-left mt-2">
                                                                    <input class="form-check-input" name="water_check" {{ $trainings->water_check ? 'checked' : '' }} type="checkbox" id="water" value="negative">
                                                                    <label class="form-check-label" for="inlineCheckbox1"><b>No of Water Cooler required.</b></label>
                                                                </div>
                                                                <br>
                                                                <div id="water-field" style="display:none;">
                                                                    Quantity <br>
                                                                    <input class="form-control" readonly name="watercooler_quantity" value="{{ $trainings->watercooler_quantity }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <h5>List of Media Teams :</h5> Attachments <br> <input class="form-control" readonly
                                                            type="file" value="{{ $trainings->media_attach }}" name="media_attach" placeholder="..." style="width: 100%;">
                                                            <div class="col-lg-5 spacing-right">
                                                                <!-- Image Preview Biometric -->
                                                                <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($trainings->media_attach) }}"
                                                                data-extension="{{ pathinfo($trainings->media_attach, PATHINFO_EXTENSION) }}"
                                                                    onclick="openFileModal(this)">
                                                                    {!! getFilePreview($trainings->media_attach) !!}
                                                                </div>
                                                                {{-- <div class="image-preview42" id="imagePreview42">
                                                                    @if($trainings->media_attach)
                                                                    <img src="{{ asset($trainings->media_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                    @else
                                                                    <span class="image-preview__default-text42">Image Preview</span>
                                                                    @endif
                                                                </div> --}}
                                                            </div>

                                                            <label for="" class="mt-1">Notes</label>
                                                            <textarea class="form-control" readonly name="media_notes" id="exampleFormControlTextarea1" rows="3">{{ $trainings->media_notes }}</textarea>

                                                            Any More Attachments <br> <input class="form-control" readonly
                                                            type="file" value="{{ $trainings->media_attach_2 }}" name="media_attach_2" placeholder="..." style="width: 100%;">
                                                            <div class="col-lg-5 spacing-right">
                                                                <!-- Image Preview Biometric -->
                                                                <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($trainings->media_attach_2) }}"
                                                                data-extension="{{ pathinfo($trainings->media_attach_2, PATHINFO_EXTENSION) }}"
                                                                    onclick="openFileModal(this)">
                                                                    {!! getFilePreview($trainings->media_attach_2) !!}
                                                                </div>
                                                                {{-- <div class="image-preview42" id="imagePreview42">
                                                                    @if($trainings->media_attach_2)
                                                                    <img src="{{ asset($trainings->media_attach_2) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                    @else
                                                                    <span class="image-preview__default-text42">Image Preview</span>
                                                                    @endif
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                        <br>
                                                    </div>


                                                    <h5 class="mb-2" style="text-align:center"><i><b>Training Items :</b></i></h5>
                                                    @foreach ($trainings->trainingitems as $index => $item)
                                                        <input type="hidden" name="trainingitems[{{ $index }}][item_id]" value="{{ $item->id }}">
                                                        <div class="col-lg-6 spacing-right">
                                                            <h5 class="m-0">List of Items</h5>
                                                            <input class="form-control" readonly name="trainingitems[{{ $index }}][item_category]" value="{{ $item->item_category }}" type="text" placeholder="..." style="width: 100%;">
                                                        </div>

                                                        <div class="form-type col-lg-12 spacing-right">
                                                            <div class="d-flex mt-2">
                                                                <div class="col-md-3">
                                                                    Category<br> <input class="form-control" readonly name="trainingitems[{{ $index }}][item_category]" value="{{ $item->item_category }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Type<br> <input class="form-control" readonly name="trainingitems[{{ $index }}][item_type]" value="{{ $item->item_type }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Supplier <br> <input class="form-control" readonly name="trainingitems[{{ $index }}][item_supplier]" value="{{ $item->item_supplier }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Quantity<br> <input class="form-control" readonly name="trainingitems[{{ $index }}][item_quantity]" value="{{ $item->item_quantity }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-2">
                                                                <div class="col-md-3">
                                                                    price per Unit<br> <input class="form-control" readonly name="trainingitems[{{ $index }}][item_price]" value="{{ $item->item_price }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Total Price<br> <input class="form-control" readonly name="trainingitems[{{ $index }}][item_total_price]" value="{{ $item->item_total_price }}" type="text" placeholder="..." style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Notes <br> <textarea class="form-control" readonly name="trainingitems[{{ $index }}][item_notes]" type="text" placeholder="..." style="width: 100%;">{{ $item->item_notes }}</textarea>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Attachments <br> <input class="form-control" readonly name="trainingitems[{{ $index }}][item_attach]" value="{{ $item->item_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        <!-- Image Preview Biometric -->
                                                                        <div class="file-preview" style="cursor: pointer;"
                                                                            data-file="{{ asset($item->item_attach) }}"
                                                                            data-extension="{{ pathinfo($item->item_attach, PATHINFO_EXTENSION) }}"
                                                                                onclick="openFileModal(this)">
                                                                                {!! getFilePreview($item->item_attach) !!}
                                                                            </div>
                                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                                            @if($item->item_attach)
                                                                            <img src="{{ asset($item->item_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                            @else
                                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                                            @endif
                                                                        </div> --}}
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <h5 style="">Details of Vendor</h5>
                                                        <div class="d-flex">
                                                            <div class="col-md-3 spacing-left">
                                                                Name<input class="form-control" readonly type="text" name="trainingitems[{{ $index }}][item_vendor]" value="{{ $item->item_vendor }}" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-md-3">
                                                                Cell<br> <input class="form-control" readonly name="trainingitems[{{ $index }}][vendor_cell]" value="{{ $item->vendor_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-md-3">
                                                                Floor<br> <input class="form-control" readonly name="trainingitems[{{ $index }}][vendor_floor]" value="{{ $item->vendor_floor }}" type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-md-3">
                                                                Building<br> <input class="form-control" readonly name="trainingitems[{{ $index }}][vendor_building]" value="{{ $item->vendor_building }}" type="text" placeholder="..." style="width: 100%;">
                                                            </div>

                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="col-md-3">
                                                                Block<br> <input class="form-control" readonly name="trainingitems[{{ $index }}][vendor_block]" value="{{ $item->vendor_block }}" type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-md-3">
                                                                Area<br> <input class="form-control" readonly name="trainingitems[{{ $index }}][vendor_area]" value="{{ $item->vendor_area }}" type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-md-3">
                                                                City<br> <input class="form-control" readonly name="trainingitems[{{ $index }}][vendor_city]" value="{{ $item->vendor_city }}" type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-md-3">
                                                                Email<br> <input class="form-control" readonly name="trainingitems[{{ $index }}][vendor_email]" value="{{ $item->vendor_email }}" type="text" placeholder="..." style="width: 100%;">
                                                            </div>

                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="col-md-3">
                                                                Website<br> <input class="form-control" readonly name="trainingitems[{{ $index }}][vendor_website]" value="{{ $item->vendor_website }}" type="text" placeholder="..." style="width: 100%;">
                                                            </div>
                                                            <div class="col-md-3">
                                                                GPS<br> <input class="form-control" readonly name="trainingitems[{{ $index }}][vendor_gps]" value="{{ $item->vendor_gps }}" type="text" placeholder="..." style="width: 100%;" id="location-input5"
                                                                onfocus="initAutocomplete5()">
                                                            </div>
                                                            <div class="col-md-3 mt-2">
                                                                Notes <br> <textarea class="form-control" readonly name="trainingitems[{{ $index }}][vendor_notes]" type="text" placeholder="..." style="width: 100%;">{{ $item->vendor_notes }}</textarea>
                                                            </div>
                                                            <div class="col-md-3">
                                                                Attachments <br> <input class="form-control" readonly name="trainingitems[{{ $index }}][vendor_attach]" value="{{ $item->vendor_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                                <div class="col-lg-5 spacing-right">
                                                                    <!-- Image Preview Biometric -->
                                                                    <div class="file-preview" style="cursor: pointer;"
                                                                            data-file="{{ asset($item->vendor_attach) }}"
                                                                            data-extension="{{ pathinfo($item->vendor_attach, PATHINFO_EXTENSION) }}"
                                                                                onclick="openFileModal(this)">
                                                                                {!! getFilePreview($item->vendor_attach) !!}
                                                                            </div>
                                                                    {{-- <div class="image-preview42" id="imagePreview42">
                                                                        @if($item->vendor_attach)
                                                                        <img src="{{ asset($item->vendor_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                        @else
                                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                                        @endif
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <div class="col-md-12">
                                                        <h5 class="mt-3 mb-5"> Nearest Hospital near Firing Range</h5> <br> <input class="form-control" readonly type="text" name="nearest_hospital" placeholder="..." style="width: 50%;margin-top:-15px">
                                                    </div>



                                                    <h5 style="text-align:center"><i><b>Emergency Services</b></i></h5>

                                                    @foreach ($trainings->trainingemergencies as $index => $emergencies)
                                                        <input type="hidden" name="trainingemergencies[{{ $index }}][te_id]" value="{{ $emergencies->id }}">
                                                        <div class=" row main-content mt-3">
                                                            <div class="col-lg-6">
                                                                <div class="row mb-2">

                                                                    <div class="col-lg-6 spacing-left spacing-right form-group">
                                                                        Emergency Services <br> <input class="form-control" readonly id="" name="trainingemergencies[{{ $index }}][train_emer_ser]" value="{{ $emergencies->train_emer_ser }}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-6 spacing-right">
                                                                        Picture of Police Station <br> <input class="form-control" readonly name="trainingemergencies[{{ $index }}][train_emer_pic]" value="{{ $emergencies->train_emer_pic }}" type="file" placeholder="..." style="width: 100%;">
                                                                        <div class="col-lg-5 spacing-right">
                                                                            <div class="file-preview" style="cursor: pointer;"
                                                                            data-file="{{ asset($trainings->train_emer_pic) }}"
                                                                            data-extension="{{ pathinfo($trainings->train_emer_pic, PATHINFO_EXTENSION) }}"
                                                                                onclick="openFileModal(this)">
                                                                                {!! getFilePreview($trainings->train_emer_pic) !!}
                                                                            </div>
                                                                            {{-- <div class="image-preview16" id="imagePreview16">
                                                                                @if($trainings->train_emer_pic)
                                                                                <img src="{{ asset($trainings->train_emer_pic) }}" alt="Image Preview16" class="image-preview__image16" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                @else
                                                                                <span class="image-preview__default-text16">Image Preview</span>
                                                                                @endif
                                                                            </div> --}}
                                                                        </div>
                                                                    </div>
                                                                    <h5>POC</h5>
                                                                    <div class="col-lg-6 spacing-right">
                                                                        Name. <br> <input class="form-control" readonly id="" name="trainingemergencies[{{ $index }}][train_emer_poc_name]" value="{{ $emergencies->train_emer_poc_name }}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-6 spacing-right">
                                                                        Designation. <br> <input class="form-control" readonly id="" name="trainingemergencies[{{ $index }}][train_emer_poc_desig]" value="{{ $emergencies->train_emer_poc_desig }}"  type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-6 spacing-right">
                                                                        Cell Number. <br> <input class="form-control vldphone" readonly id="" name="trainingemergencies[{{ $index }}][emer_poc_cell]" value="{{ $emergencies->emer_poc_cell }}" type="text" placeholder="..." style="width: 100%;">
                                                                        <div id="phoneError" class="phoneError" style="color: red"></div>
                                                                    </div>
                                                                    <div class="col-lg-6 spacing-right">
                                                                        Email. <br> <input class="form-control vldemail" readonly id="" name="trainingemergencies[{{ $index }}][train_emer_poc_email]" value="{{ $emergencies->train_emer_poc_email }}" type="email" placeholder="..." style="width: 100%;">
                                                                        <div id="emailError" class="emailError" style="color: red"></div>
                                                                    </div>

                                                                    <div class="col-lg-6 spacing-right">
                                                                        Notes. <br> <textarea class="form-control" readonly id="w3review5" name="trainingemergencies[{{ $index }}][train_emer_poc_notes]" type="notes" oninput="trimSpaces5()" onclick="moveCursorToStart5()" placeholder="..." style="width: 100%;">{{ $emergencies->train_emer_poc_notes }}</textarea>
                                                                    </div>
                                                                    <div class="col-lg-6 spacing-right">
                                                                        Attachment <br> <input class="form-control" readonly id="" name="trainingemergencies[{{ $index }}][train_emer_poc_attach]" value="{{ $emergencies->train_emer_poc_attach }}" type="file" placeholder="..." style="width: 100%;">
                                                                        <div class="col-lg-5 spacing-right">
                                                                            <div class="file-preview" style="cursor: pointer;"
                                                                            data-file="{{ asset($emergencies->train_emer_poc_attach) }}"
                                                                            data-extension="{{ pathinfo($emergencies->train_emer_poc_attach, PATHINFO_EXTENSION) }}"
                                                                                onclick="openFileModal(this)">
                                                                                {!! getFilePreview($emergencies->train_emer_poc_attach) !!}
                                                                            </div>
                                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                                @if($emergencies->train_emer_poc_attach)
                                                                                <img src="{{ asset($emergencies->train_emer_poc_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                @else
                                                                                <span class="image-preview__default-text42">Image Preview</span>
                                                                                @endif
                                                                            </div> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6 spacing-left">
                                                                <h5>Address :</h5>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Office No <br> <input class="form-control" readonly id="" value="{{ $emergencies->train_emer_office }}" name="trainingemergencies[{{ $index }}][train_emer_office]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
                                                                        Building <br> <input class="form-control" readonly id="" value="{{ $emergencies->train_emer_building }}" name="trainingemergencies[{{ $index }}][train_emer_building]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Block <br> <input class="form-control" readonly id="" value="{{ $emergencies->train_emer_block }}" name="trainingemergencies[{{ $index }}][train_emer_block]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
                                                                        Area <br> <input class="form-control" readonly id="" value="{{ $emergencies->train_emer_area }}" name="trainingemergencies[{{ $index }}][train_emer_area]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        City <br> <input class="form-control" readonly id="" value="{{ $emergencies->train_emer_city }}" name="trainingemergencies[{{ $index }}][train_emer_city]" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
                                                                        Photograph of Building <br> <input class="form-control" readonly id="" value="{{ $emergencies->train_emer_buildphoto }}" name="trainingemergencies[{{ $index }}][train_emer_buildphoto]" type="file" placeholder="..." style="width: 100%;">
                                                                        <div class="col-lg-5 spacing-right">
                                                                            <div class="file-preview" style="cursor: pointer;"
                                                                            data-file="{{ asset($emergencies->train_emer_buildphoto) }}"
                                                                            data-extension="{{ pathinfo($emergencies->train_emer_buildphoto, PATHINFO_EXTENSION) }}"
                                                                                onclick="openFileModal(this)">
                                                                                {!! getFilePreview($emergencies->train_emer_buildphoto) !!}
                                                                            </div>
                                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                                @if($emergencies->train_emer_buildphoto)
                                                                                <img src="{{ asset($emergencies->train_emer_buildphoto) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                                @else
                                                                                <span class="image-preview__default-text42">Image Preview</span>
                                                                                @endif
                                                                            </div> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Email <br> <input class="form-control vldemail" readonly id="" name="trainingemergencies[{{ $index }}][train_emer_email]" value="{{ $emergencies->train_emer_email }}" type="text" placeholder="..." style="width: 100%;">
                                                                        <div id="emailError" class="emailError" style="color: red"></div>
                                                                    </div>
                                                                    <div class="col-lg-5 spacing-left">
                                                                        Website <br> <input class="form-control vldwebsite" readonly id="" name="trainingemergencies[{{ $index }}][train_emer_web]" value="{{ $emergencies->train_emer_web }}" type="text" placeholder="..." style="width: 100%;">
                                                                        <div id="websiteError" class="websiteError" style="color: red"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="row ">
                                                                    <div class="col-lg-5 spacing-right">
                                                                        Pin location <br> <input class="form-control" readonly id="" name="trainingemergencies[{{ $index }}][train_emer_pin]" value="{{ $emergencies->train_emer_pin }}" type="text" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    {{-- <div>
                                                                        <br> <input class="form-control" readonly id="" name="longitude2" value="{{ $customers->longitude2 }}" type="hidden" placeholder="..." style="width: 100%;">
                                                                    </div>
                                                                    <div>
                                                                        <br> <input class="form-control" readonly id="" name="latitude2" value="{{ $customers->latitude2 }}" type="hidden" placeholder="..." style="width: 100%;">
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 spacing-left mt-2">
                                                        Applicable Rental Property Number <br> <input class="form-control" readonly name="trainingemergencies[{{ $index }}][train_emer_app_rental]" value="{{ $emergencies->train_emer_app_rental }}" type="text" placeholder="..." style="width: 70%;" multiple>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-lg-6 spacing-left spacing-right mt-2">
                                                                Attachements <br> <input class="form-control" readonly name="trainingemergencies[{{ $index }}][train_emer_attach]" value="{{ $emergencies->train_emer_attach }}" type="file" placeholder="..." style="width: 70%;" multiple>
                                                                <div class="col-lg-5 spacing-right">
                                                                    <div class="file-preview" style="cursor: pointer;"
                                                                    data-file="{{ asset($emergencies->train_emer_attach) }}"
                                                                    data-extension="{{ pathinfo($emergencies->train_emer_attach, PATHINFO_EXTENSION) }}"
                                                                        onclick="openFileModal(this)">
                                                                        {!! getFilePreview($emergencies->train_emer_attach) !!}
                                                                    </div>
                                                                    {{-- <div class="image-preview42" id="imagePreview42">
                                                                        @if($emergencies->train_emer_attach)
                                                                        <img src="{{ asset($emergencies->train_emer_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                                        @else
                                                                        <span class="image-preview__default-text42">Image Preview</span>
                                                                        @endif
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 spacing-left spacing-right my-3">
                                                                Notes <br>
                                                                <textarea id="w3review6" class="form-control" readonly name="trainingemergencies[{{ $index }}][train_emer_note]" oninput="trimSpaces6()" onclick="moveCursorToStart6()" rows="2" cols="38">{{ $emergencies->train_emer_note }}
                                                                </textarea>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    @endforeach

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!--findings-->
                                    <div class="tab-pane fade m-3" style="opacity: 90%;" id="findings"
                                        role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <h5 class="mb-2" style="text-align:center"><i><b>Findings :</b></i></h5>
                                        <div class="row">
                                            <div class="col-lg-3 spacing-right">
                                                <h5>Incident :</h5>  Attachments <br> <input class="form-control" readonly
                                                    type="file" name="incident_attach" value="{{ $trainings->incident_attach }}" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="file-preview" style="cursor: pointer;"
                                                        data-file="{{ asset($trainings->incident_attach) }}"
                                                        data-extension="{{ pathinfo($trainings->incident_attach, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)">
                                                            {!! getFilePreview($trainings->incident_attach) !!}
                                                        </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if($trainings->incident_attach)
                                                            <img src="{{ asset($trainings->incident_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div> --}}
                                                    </div>

                                                <label for="" class="mt-1">Notes</label>
                                                <textarea class="form-control" readonly name="incident_notes" id="exampleFormControlTextarea1" rows="3">{{ $trainings->incident_notes }}</textarea>
                                            </div>

                                            <div class="col-lg-3 spacing-right">
                                                <h5>Suggestions :</h5>  Attachments <br> <input class="form-control" readonly
                                                    type="file" name="suggestion_attach" value="{{ $trainings->suggestion_attach }}" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="file-preview" style="cursor: pointer;"
                                                        data-file="{{ asset($trainings->suggestion_attach) }}"
                                                        data-extension="{{ pathinfo($trainings->suggestion_attach, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)">
                                                            {!! getFilePreview($trainings->suggestion_attach) !!}
                                                        </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if($trainings->suggestion_attach)
                                                            <img src="{{ asset($trainings->suggestion_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div> --}}
                                                    </div>

                                                <label for="" class="mt-1">Notes</label>
                                                <textarea class="form-control" readonly name="suggestion_notes" id="exampleFormControlTextarea1" rows="3">{{ $trainings->suggestion_notes }}</textarea>
                                            </div>

                                            <div class="col-lg-3 spacing-right">
                                                <h5>Observations :</h5>  Attachments <br> <input class="form-control" readonly
                                                    type="file" value="{{ $trainings->observation_attach }}" name="observation_attach" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="file-preview" style="cursor: pointer;"
                                                        data-file="{{ asset($trainings->observation_attach) }}"
                                                        data-extension="{{ pathinfo($trainings->observation_attach, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)">
                                                            {!! getFilePreview($trainings->observation_attach) !!}
                                                        </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if($trainings->observation_attach)
                                                            <img src="{{ asset($trainings->observation_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div> --}}
                                                    </div>

                                                <label for="" class="mt-1">Notes</label>
                                                <textarea class="form-control" readonly name="observation_notes" id="exampleFormControlTextarea1" rows="3">{{ $trainings->observation_notes }}</textarea>
                                            </div>

                                            <div class="col-lg-3 spacing-right">
                                                <h5>Remarks :</h5>  Attachments <br> <input class="form-control" readonly
                                                    type="file" name="remarks_attach" value="{{ $trainings->remarks_attach }}" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="file-preview" style="cursor: pointer;"
                                                        data-file="{{ asset($trainings->remarks_attach) }}"
                                                        data-extension="{{ pathinfo($trainings->remarks_attach, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)">
                                                            {!! getFilePreview($trainings->remarks_attach) !!}
                                                        </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if($trainings->remarks_attach)
                                                            <img src="{{ asset($trainings->remarks_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div> --}}
                                                    </div>

                                                <label for="" class="mt-1">Notes</label>
                                                <textarea class="form-control" readonly name="remarks_notes" id="exampleFormControlTextarea1" rows="3">{{ $trainings->remarks_notes }}</textarea>
                                            </div>


                                        </div>
                                    </div>

                                    <!--Online Training-->
                                    <div class="tab-pane fade m-3" style="opacity: 90%;"
                                        id="online-training" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <h5 class="mb-2" style="text-align:center"><i><b>Online Training :</b></i></h5>
                                            <div class="row">
                                                <h5 class="mt-2" style="margin-left: 10px;">Online Refresher Record Score Card :</h5>
                                                <h5 class="mt-2" style="margin-left: 40px;">Backend.. To Be Continued .....</h5>
                                            </div>
                                    </div>
                                    <!--Training Range-->
                                    <div class="tab-pane fade m-3" style="opacity: 90%;"
                                        id="range" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <h5 class="mb-2" style="text-align:center"><i><b>Training Range :</b></i></h5>
                                        <div class="col-lg-12">
                                            <div class=" row mb-2">
                                                <div class="col-lg-4 spacing-right">
                                                    Name  <br> <input class="form-control" readonly id="" name="t_range_name" value="{{ $trainings->t_range_name }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-left spacing-right">
                                                    Designation <br> <input class="form-control" readonly id="" name="t_range_desig" value="{{ $trainings->t_range_desig }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Department <br> <input class="form-control" readonly name="t_range_dept" value="{{ $trainings->t_range_dept }}" id="" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Cell Number <br> <input class="form-control" readonly name="t_range_cell" value="{{ $trainings->t_range_cell }}" id="" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-left">
                                                    Email <br> <input class="form-control" readonly name="t_range_email" value="{{ $trainings->t_range_email }}" type="text" placeholder="..." style="width: 104%;">
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Visiting Card Front <br> <input class="form-control" readonly id="" name="t_range_front" value="{{ $trainings->t_range_front }}" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="file-preview" style="cursor: pointer;"
                                                        data-file="{{ asset($trainings->t_range_front) }}"
                                                        data-extension="{{ pathinfo($trainings->t_range_front, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)">
                                                            {!! getFilePreview($trainings->t_range_front) !!}
                                                        </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if($trainings->t_range_front)
                                                            <img src="{{ asset($trainings->t_range_front) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 spacing-right">
                                                    Visiting Card Back <br> <input class="form-control" readonly id="" name="t_range_back" value="{{ $trainings->t_range_back }}" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="file-preview" style="cursor: pointer;"
                                                        data-file="{{ asset($trainings->t_range_back) }}"
                                                        data-extension="{{ pathinfo($trainings->t_range_back, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)">
                                                            {!! getFilePreview($trainings->t_range_back) !!}
                                                        </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if($trainings->t_range_back)
                                                            <img src="{{ asset($trainings->t_range_back) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <h5>Address of Training Range POC</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Office No <br> <input class="form-control" readonly id="" name="t_range_office" value="{{ $trainings->t_range_office }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Floor <br> <input class="form-control" readonly id="" name="t_range_floor" value="{{ $trainings->t_range_floor }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left">
                                                    Building <br> <input class="form-control" readonly id="" name="t_range_building" value="{{ $trainings->t_range_building }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-right">
                                                    Block <br> <input class="form-control" readonly id="" name="t_range_block" value="{{ $trainings->t_range_block }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left">
                                                    Area <br> <input class="form-control" readonly id="" name="t_range_area" value="{{ $trainings->t_range_area }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-right">
                                                    City <br> <input class="form-control" readonly id="" name="t_range_city" value="{{ $trainings->t_range_city }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left">
                                                    Photograph of Location <br> <input class="form-control" readonly id="" name="t_range_photo" value="{{ $trainings->t_range_photo }}" type="file" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <!-- Image Preview Biometric -->
                                                        <div class="file-preview" style="cursor: pointer;"
                                                        data-file="{{ asset($trainings->t_range_photo) }}"
                                                        data-extension="{{ pathinfo($trainings->t_range_photo, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)">
                                                            {!! getFilePreview($trainings->t_range_photo) !!}
                                                        </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if($trainings->t_range_photo)
                                                            <img src="{{ asset($trainings->t_range_photo) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                            @else
                                                            <span class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 spacing-right">
                                                    Email <br> <input class="form-control" readonly id="" name="adress_range_email" value="{{ $trainings->adress_range_email }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left">
                                                    Website <br> <input class="form-control" readonly id="" name="t_range_web" value="{{ $trainings->t_range_web }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-right">
                                                    Pin location <br> <input class="form-control" readonly id="location-input3" name="t_range_pin" value="{{ $trainings->t_range_pin }}"  type="text" placeholder="..." style="width: 100%;"
                                                    onfocus="initAutocomplete3()">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left">
                                                    GPS <br> <input class="form-control" readonly id="" name="t_range_gps" value="{{ $trainings->t_range_gps }}" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!--Checklist-->
                                    <div class="tab-pane fade m-3" style="opacity: 90%;"
                                        id="check" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <h5 class="mb-2" style="text-align:center"><i><b>Checklist of Organizing Training :</b></i></h5>
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
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_one_check ? 'checked' : '' }} name="point_one_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_one }}" name="point_one"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">2</td>
                                                        <td width="65%">Allocation of Training Number by Regulatory Affairs Department & Creation of Whatsapp Group</td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_two_check ? 'checked' : '' }} name="point_two_check"  style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_two }}" name="point_two"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">3</td>
                                                        <td width="65%">Designing of Invitation Cards</td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_three_check ? 'checked' : '' }} name="point_three_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_three }}" name="point_three"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">4</td>
                                                        <td width="65%">Request for funds by Master Trainer & Issuance of Funds by Finance Department </td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_four_check ? 'checked' : '' }} name="point_four_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_four }}" name="point_four"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">5</td>
                                                        <td width="65%">Request Letter for Range Allocation </td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_five_check ? 'checked' : '' }} name="point_five_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_five }}" name="point_five"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">6</td>
                                                        <td width="65%">List of Clients and Prospects for Participation </td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_six_check ? 'checked' : '' }} name="point_six_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_six }}" name="point_six"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">7</td>
                                                        <td width="65%">List of Guests for Participation </td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_seven_check ? 'checked' : '' }} name="point_seven_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_seven }}" name="point_seven"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">8</td>
                                                        <td width="65%">List of Trainees (Security Staff) </td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_eight_check ? 'checked' : '' }} name="point_eight_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_eight }}" name="point_eight"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">9</td>
                                                        <td width="65%">List of Admin Staff </td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_nine_check ? 'checked' : '' }} name="point_nine_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_nine }}" name="point_nine"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">10</td>
                                                        <td width="65%">List of Training Instructors Course Wise </td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_ten_check ? 'checked' : '' }} name="point_ten_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_ten }}" name="point_ten"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">11</td>
                                                        <td width="65%">List of Training Aids Including Panaflex & Trainer Cards with quantity</td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_eleven_check ? 'checked' : '' }} name="point_eleven_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_eleven }}" name="point_eleven"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">12</td>
                                                        <td width="65%">List of Weapons & Ammunition with Quantity & Caliber</td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_twelve_check ? 'checked' : '' }} name="point_twelve_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_twelve }}" name="point_twelve"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">13</td>
                                                        <td width="65%">List of Security Equipment with Quantity</td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_thirteen_check ? 'checked' : '' }} name="point_thirteen_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_thirteen }}" name="point_thirteen"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">14</td>
                                                        <td width="65%">List of Refreshment Items with Quantity</td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_forteen_check ? 'checked' : '' }} name="point_forteen_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_forteen }}" name="point_forteen"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">15</td>
                                                        <td width="65%">List of Catering and Crockery Items with Quantity</td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_fifteen_check ? 'checked' : '' }} name="point_fifteen_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_fifteen }}" name="point_fifteen"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">16</td>
                                                        <td width="65%">List of Transport with their Particulars and Quantity</td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_sixteen_check ? 'checked' : '' }} name="point_sixteen_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_sixteen }}" name="point_sixteen"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">17</td>
                                                        <td width="65%">List of Media Team (Camera Man & Helper)</td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_seventeen_check ? 'checked' : '' }} name="point_seventeen_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_seventeen }}" name="point_seventeen"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">18</td>
                                                        <td width="65%">List of Media Team (Camera Man & Helper)</td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_eighteen_check ? 'checked' : '' }} name="point_eighteen_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_eighteen }}" name="point_eighteen"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">19</td>
                                                        <td width="65%">Individual Security Staff Training Record </td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_ninteen_check ? 'checked' : '' }} name="point_ninteen_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_ninteen }}" name="point_ninteen"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">20</td>
                                                        <td width="65%">Letter of thanks to Concern Firing Range </td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_twenty_check ? 'checked' : '' }} name="point_twenty_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_twenty }}" name="point_twenty"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">21</td>
                                                        <td width="65%">Submission of Occurence Report if any </td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_twentyone_check ? 'checked' : '' }} name="point_twentyone_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_twentyone }}" name="point_twentyone"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">22</td>
                                                        <td width="65%">Submission of Observation , Suggestion and Recommendation if any </td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_twentytwo_check ? 'checked' : '' }} name="point_twentytwo_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_twentytwo }}" name="point_twentytwo"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">23</td>
                                                        <td width="65%">Concluding Remarks by Master Trainer </td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_twentythree_check ? 'checked' : '' }} name="point_twentythree_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_twentythree }}" name="point_twentythree"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">24</td>
                                                        <td width="65%">Submission of Training Report and expenses with all bills & Receipts </td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_twentyfour_check ? 'checked' : '' }} name="point_twentyfour_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_twentyfour }}" name="point_twentyfour"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">25</td>
                                                        <td width="65%">Sharing reports with Clients </td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_twentyfive_check ? 'checked' : '' }} name="point_twentyfive_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_twentyfive }}" name="point_twentyfive"/></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="5%">26</td>
                                                        <td width="65%">Sharing training Photographs on Social Media Platforms </td>
                                                        <td width="5%"><input type="checkbox" {{ $trainings->point_twentysix_check ? 'checked' : '' }} name="point_twentysix_check" style="position:relative; left:25%;"></td>
                                                        <td width="25%"><input class="form-control" readonly value="{{ $trainings->point_twentysix }}" name="point_twentysix"/></td>
                                                    </tr>
                                                </tbody>
                                            </table>
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


    <div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileModalLabel">File Preview</h5>
                </div>
                <div class="modal-body text-center" id="fileModalBody"></div>
                <div class="modal-footer">
                    <a href="#" id="downloadLink" download class="btn btn-primary">Download File</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openFileModal(element) {
            let filePath = element.getAttribute('data-file');
            let fileExtension = element.getAttribute('data-extension');
            let modalBody = document.getElementById('fileModalBody');
            let downloadLink = document.getElementById('downloadLink');
            let previewHtml = '';

            if (['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(fileExtension)) {
                previewHtml = `<img src="${filePath}" width="100%" height="300px" alt="Image Preview">`;
            } else if (fileExtension === 'pdf') {
                previewHtml = `<iframe src="${filePath}" width="100%" height="500px"></iframe>`;
            } else if (['xlsx', 'xls'].includes(fileExtension)) {
                previewHtml = `<img src="https://img.icons8.com/?size=48&id=117561&format=png" alt="Excel File" style="height: 200px; width: 250px;">`;
            } else if (['zip', 'rar'].includes(fileExtension)) {
                previewHtml = `<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTb7rfjFBWn453fYAj1o3T7fsbSYvBzdEn4jOV8FdclTI7NpIDMZfZ_x79_o3FrxsYpUeQ&usqp=CAU" alt="ZIP File" style="height: 200px; width: 250px;">`;
            } else if (['mp4', 'webm', 'ogg'].includes(fileExtension)) {
                previewHtml = `<video width="100%" height="300px" controls>
                                  <source src="${filePath}" type="video/${fileExtension}">
                                  Your browser does not support the video tag.
                              </video>`;
            } else {
                previewHtml = `<p>Preview not available.</p>`;
            }

            modalBody.innerHTML = previewHtml;
            downloadLink.href = filePath;

            $('#fileModal').modal('show');
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>


    <script>
        $(document).ready(function() {
            // Initially hide/show the table based on checkbox state
            $('#guardTableContainer').toggle($('#guards_respective_checkbox').prop('checked'));

            // Toggle table visibility when checkbox state changes
            $('#guards_respective_checkbox').change(function() {
                $('#guardTableContainer').toggle($(this).prop('checked'));
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const evCheckbox = document.getElementById('evCheckbox');
            const everythingDiv = document.getElementById('everything');

            if (evCheckbox) {
                if (evCheckbox.checked) {
                    everythingDiv.style.display = 'none';
                }

                evCheckbox.addEventListener('change', function() {
                    if (evCheckbox.checked) {
                        everythingDiv.style.display = 'none';
                    } else {
                        everythingDiv.style.display = 'block';
                    }
                });
            } else {
                console.error('Element with ID "evCheckbox" not found.');
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
                var checkboxHtml = '<div class="form-check form-check-inline"><input class="form-check-input" name="compliances[]" type="checkbox" id="inlineCheckbox' + (index+5) + '">' + inputHtml + '</div>';
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

            const element = document.getElementById('training_form');
            if (element) {
                const options = {
                    margin: 1,
                    filename: 'training_information.pdf',
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
            const element = document.getElementById('training_form');
            if (element) {
                const options = {
                    margin: 1,
                    filename: 'training_information.pdf',
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




<script>
    var emergencyServicesRoom = 1;

    function emergencyServices_add_fields() {
        emergencyServicesRoom++;
        var objTo = document.getElementById('emergencyServices_add_fields');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "third-col removeclass" + emergencyServicesRoom);

        divtest.innerHTML = `
            <div class="row my-5 " id="emergencyServicesContainer${emergencyServicesRoom}">


            </div>
        `;

        objTo.appendChild(divtest);
    }

    function emergencyServices_remove_fields(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>

<script>
    var pocRoom = {{ count($trainings->trainingpocs) }} + 1;

    function poc_add_fields() {
        pocRoom++;
        var objTo = document.getElementById('pocAccordion');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "accordion-item removeclass" + pocRoom);

        divtest.innerHTML = `
            <h2 class="accordion-header" id="pocHeading${pocRoom}">
                <button class="accordion-button" type="button" data-toggle="collapse" data-target="#pocCollapse${pocRoom}" aria-expanded="false" aria-controls="pocCollapse${pocRoom}">
                    POC Entry ${pocRoom}
                </button>
            </h2>
            <div id="pocCollapse${pocRoom}" class="collapse" aria-labelledby="pocHeading${pocRoom}">
                <div class="accordion-body">
                    <input type="hidden" name="trainingpocs[${pocRoom - 1}][poc_id]" value="">
                    <div class="row">
                        <div class="col-lg-6 spacing-right">
                            <div class="row mb-2">
                                <div class="form-type col-lg-11 spacing-right">
                                    Name of POC <br> <input class="form-control" readonly
                                        type="text" value="" id="degree" name="trainingpocs[${pocRoom - 1}][poc_name]"
                                        placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-type col-lg-6 spacing-right">
                                    Title/Designation <br> <input class="form-control" readonly
                                        type="text" id="degree" value="" name="trainingpocs[${pocRoom - 1}][poc_desig]"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="form-type col-lg-5 spacing-left spacing-right">
                                    Fax# <br> <input class="form-control" readonly type="text"
                                        id="date" value="" placeholder="..." name="trainingpocs[${pocRoom - 1}][poc_fax]"
                                        style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-type col-lg-5 spacing-right">
                                    Phone No. <br> <input class="form-control" readonly type="text"
                                        id="degree" value="" placeholder="..." name="trainingpocs[${pocRoom - 1}][poc_phone]"
                                        style="width: 100%;">
                                </div>
                                <div class="form-type col-lg-6 spacing-left spacing-right">
                                    Mobile <br> <input class="form-control" readonly type="text"
                                        id="date" value="" placeholder="..." name="trainingpocs[${pocRoom - 1}][poc_mobile]"
                                        style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-type col-lg-11 spacing-right">
                                    Website <br> <input class="form-control" readonly type="text"
                                        id="degree" value="" placeholder="..." name="trainingpocs[${pocRoom - 1}][poc_web]"
                                        style="width: 100%;">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 spacing-right">
                            <div class="row mb-2">
                                <div class="form-type col-lg-11 spacing-right">
                                    Email Address of POC <br> <input class="form-control" readonly
                                        type="text" id="degree" value="" name="trainingpocs[${pocRoom - 1}][poc_email]"
                                        placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-type col-lg-11 spacing-right">
                                    Location of POC <br> <input class="form-control" readonly
                                        type="text" id="location-input1" value="" name="trainingpocs[${pocRoom - 1}][poc_loc]"
                                        placeholder="..." style="width: 100%;" onfocus="initAutocomplete1()">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-type col-lg-7 spacing-right">
                                    Name of Document <br> <input class="form-control" readonly
                                        type="text" id="date" value="" name="trainingpocs[${pocRoom - 1}][poc_document]"
                                        placeholder="..." style="width: 100%;">
                                </div>
                                <div class="form-type col-lg-4 spacing-left spacing-right">
                                    System ID <br> <input class="form-control" readonly type="text"
                                        id="date" value="" placeholder="..." name="trainingpocs[${pocRoom - 1}][system_id]"
                                        style="width: 100%;">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-type col-lg-11 spacing-right">
                                    Other Info <br>
                                    <textarea class="form-control" readonly id="exampleFormControlTextarea1" name="trainingpocs[${pocRoom - 1}][other_info]" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        objTo.appendChild(divtest);
    }

    function poc_remove_fields(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>

<script>
    var emergencyServicesRoom = {{ count($trainings->trainingemergencies) }} + 1;

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

                    <input type="hidden" name="trainingemergencies[${emergencyServicesRoom - 1}][te_id]" value="">
                    <div class="row main-content div">
                    <div class="col-lg-6">
                        <div class="row mb-2">

                            <div class="col-lg-6 spacing-left spacing-right form-group">
                                Emergency Services <br>
                                <div class="input-group" style="width: 100%;">
                                    <select id="dropdown" class="form-control mt-1" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_ser]" value="" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                        <option value=""></option> 
                                       @foreach($trainemerser as $emerse)
                                            <option value="{{ $emerse->train_emerser_name }}" 
                                                @if(isset($emergencies) && in_array($emerse->train_emerser_name, $emergencies->pluck('train_emer_ser')->toArray())) selected @endif>
                                                {{ $emerse->train_emerser_name }}
                                            </option>
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
                                Picture of Police Station <br>
                                <input class="form-control" readonly name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_pic]" value="" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <div class="image-preview42" id="imagePreview42"></div>
                                </div>
                            </div>
                            <h5>POC</h5>
                            <div class="col-lg-6 spacing-right">
                                Name. <br>
                                <input class="form-control" readonly id="" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_poc_name]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-6 spacing-right">
                                Designation. <br>
                                <input class="form-control" readonly id="" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_poc_desig]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-6 spacing-right">
                                Cell Number. <br>
                                <input class="form-control vldphone" id="" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_poc_cell]" value="" type="text" placeholder="..." style="width: 100%;">
                                <div id="phoneError" class="phoneError" style="color: red"></div>
                            </div>
                            <div class="col-lg-6 spacing-right">
                                Email. <br>
                                <input class="form-control vldemail" id="" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_poc_email]" value="" type="email" placeholder="..." style="width: 100%;">
                                <div id="emailError" class="emailError" style="color: red"></div>
                            </div>
                            <div class="col-lg-6 spacing-right">
                                Notes. <br>
                                <textarea class="form-control" readonly id="w3review5" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_poc_notes]" type="notes" oninput="trimSpaces5()" onclick="moveCursorToStart5()" placeholder="..." style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-6 spacing-right">
                                Attachment <br>
                                <input class="form-control" readonly id="" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_poc_attach]" value="" type="file" placeholder="..." style="width: 100%;">
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
                                <input class="form-control" readonly id="" value="" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_office]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Building <br>
                                <input class="form-control" readonly id="" value="" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_building]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Block <br>
                                <input class="form-control" readonly id="" value="" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_block]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Area <br>
                                <input class="form-control" readonly id="" value="" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_area]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                City <br>
                                <input class="form-control" readonly id="" value="" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_city]" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Photograph of Building <br>
                                <input class="form-control" readonly id="" value="" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_loc]" type="file" placeholder="..." style="width: 100%;">
                                <div class="col-lg-5 spacing-right">
                                    <div class="image-preview42" id="imagePreview42"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Email <br>
                                <input class="form-control vldemail" id="" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_email]" value="" type="text" placeholder="..." style="width: 100%;">
                                <div id="emailError" class="emailError" style="color: red"></div>
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Website <br>
                                <input class="form-control vldwebsite" id="" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_web]" value="" type="text" placeholder="..." style="width: 100%;">
                                <div id="websiteError" class="websiteError" style="color: red"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 spacing-right">
                                Pin location <br>
                                <input class="form-control" readonly id="" name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_pin]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 spacing-left mt-2">
                    Applicable Rental Property Number <br>
                    <input class="form-control" readonly name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_app_rental]" value="" type="text" placeholder="..." style="width: 70%;" multiple>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                        Attachments <br>
                        <input class="form-control" readonly name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_attach]" value="" type="file" placeholder="..." style="width: 70%;" multiple>
                        <div class="col-lg-5 spacing-right">
                            <div class="image-preview42" id="imagePreview42"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                        Notes <br>
                        <textarea id="w3review6" class="form-control" readonly name="trainingemergencies[${emergencyServicesRoom - 1}][train_emer_note]" oninput="trimSpaces6()" onclick="moveCursorToStart6()" rows="2" cols="38"></textarea>
                    </div>
                </div>
                <div class="input-group-append" style="width: 30%;">
                    <button class="btn btn-primary" type="button" onclick="emergencyServices_remove_fields(${emergencyServicesRoom})">Remove Emergency Service</button>
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

            Name <br> <input class="form-control" readonly name="armourer_name[]" type="text"
            placeholder="..." style="width: 100%;">

            Cell Number <br> <input class="form-control" readonly name="armourer_cell[]" type="text"
            placeholder="..." style="width: 100%;">

            Attachments <br> <input class="form-control" readonly name="armourer_attach[]" type="file"
            placeholder="..." style="width: 100%;">

            Notes <br> <textarea class="form-control" readonly name="armourer_notes" type="text"
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

            Category <br> <input class="form-control" readonly name="sec_equip_category[]" type="text"
                placeholder="..." style="width: 100%;">

            Type <br> <input class="form-control" readonly name="sec_equip_type[]" type="text"
                placeholder="..." style="width: 100%;">


                Price Per Unit <br> <input class="form-control" readonly name="sec_equip_pricepu[]" type="text"
                placeholder="..." style="width: 100%;">
            Quantity <br> <input class="form-control" readonly name="sec_equip_quantity[]" type="text"
                placeholder="..." style="width: 100%;">
            Total Price <br> <input class="form-control" readonly name="sec_equip_totalprice[]" type="text"
                placeholder="..." style="width: 100%;">

            Person Responsible for Equipments<br> <input
                class="form-control" readonly type="text" name="person_responsible_sec_equip[]" placeholder="..."
                style="width: 100%;">

            Attachments <br> <input class="form-control" readonly name="sec_equip_attach[]" type="file"
            placeholder="..." style="width: 100%;">

            Notes <br> <textarea class="form-control" readonly name="sec_equip_notes[]" type="text"
            placeholder="..." style="width: 100%;"></textarea>

            <div id="quantity-field">
                Red Flag Qunatity <br>
                <input class="form-control" readonly type="text" name="red_flag_quantity[]" placeholder="..." style="width: 100%;">
            </div>

            <div id="blue-field">
                Target Quantity <br>
                <input class="form-control" readonly type="text" name="target_quantity[]" placeholder="..." style="width: 100%;">
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
        document.addEventListener('DOMContentLoaded', function() {
            const myCheckbox = document.getElementById('myCheckbox');
            const hiddenElements = document.querySelectorAll('.hidden-content');

            if (myCheckbox) {
                if (myCheckbox.checked) {
                    hiddenElements.forEach(element => {
                        element.style.display = 'block';
                    });
                }

                myCheckbox.addEventListener('click', function () {
                    hiddenElements.forEach(element => {
                        if (myCheckbox.checked) {
                            element.style.display = 'block';
                        } else {
                            element.style.display = 'none';
                        }
                    });
                });
            } else {
                console.error('Element with ID "myCheckbox" not found.');
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const myCheckbox1 = document.getElementById('myCheckbox1');
            const hiddenElements1 = document.querySelectorAll('.hidden-content1');

            if (myCheckbox1) {
                if (myCheckbox1.checked) {
                    hiddenElements1.forEach(element => {
                        element.style.display = 'block';
                    });
                }

                myCheckbox1.addEventListener('click', function () {
                    hiddenElements1.forEach(element => {
                        if (myCheckbox1.checked) {
                            element.style.display = 'block';
                        } else {
                            element.style.display = 'none';
                        }
                    });
                });
            } else {
                console.error('Element with ID "myCheckbox1" not found.');
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const myCheckbox2 = document.getElementById('myCheckbox2');
            const hiddenElements2 = document.querySelectorAll('.hidden-content2');

            if (myCheckbox2) {
                if (myCheckbox2.checked) {
                    hiddenElements2.forEach(element => {
                        element.style.display = 'block';
                    });
                }

                myCheckbox2.addEventListener('click', function () {
                    hiddenElements2.forEach(element => {
                        if (myCheckbox2.checked) {
                            element.style.display = 'block';
                        } else {
                            element.style.display = 'none';
                        }
                    });
                });
            } else {
                console.error('Element with ID "myCheckbox2" not found.');
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const myCheckbox3 = document.getElementById('myCheckbox3');
            const hiddenElements3 = document.querySelectorAll('.hidden-content3');

            if (myCheckbox3) {
                if (myCheckbox3.checked) {
                    hiddenElements3.forEach(element => {
                        element.style.display = 'block';
                    });
                }

                myCheckbox3.addEventListener('click', function () {
                    hiddenElements3.forEach(element => {
                        if (myCheckbox3.checked) {
                            element.style.display = 'block';
                        } else {
                            element.style.display = 'none';
                        }
                    });
                });
            } else {
                console.error('Element with ID "myCheckbox3" not found.');
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const myCheckbox4 = document.getElementById('myCheckbox4');
            const hiddenElements4 = document.querySelectorAll('.hidden-content4');

            if (myCheckbox4) {
                if (myCheckbox4.checked) {
                    hiddenElements4.forEach(element => {
                        element.style.display = 'block';
                    });
                }

                myCheckbox4.addEventListener('click', function () {
                    hiddenElements4.forEach(element => {
                        if (myCheckbox4.checked) {
                            element.style.display = 'block';
                        } else {
                            element.style.display = 'none';
                        }
                    });
                });
            } else {
                console.error('Element with ID "myCheckbox4" not found.');
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const myCheckbox5 = document.getElementById('myCheckbox5');
            const hiddenElements5 = document.querySelectorAll('.hidden-content5');

            if (myCheckbox5) {
                if (myCheckbox5.checked) {
                    hiddenElements5.forEach(element => {
                        element.style.display = 'block';
                    });
                }

                myCheckbox5.addEventListener('click', function () {
                    hiddenElements5.forEach(element => {
                        if (myCheckbox5.checked) {
                            element.style.display = 'block';
                        } else {
                            element.style.display = 'none';
                        }
                    });
                });
            } else {
                console.error('Element with ID "myCheckbox5" not found.');
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const myCheckbox6 = document.getElementById('myCheckbox6');
            const hiddenElements6 = document.querySelectorAll('.hidden-content6');

            if (myCheckbox6) {
                if (myCheckbox6.checked) {
                    hiddenElements6.forEach(element => {
                        element.style.display = 'block';
                    });
                }

                myCheckbox6.addEventListener('click', function () {
                    hiddenElements6.forEach(element => {
                        if (myCheckbox6.checked) {
                            element.style.display = 'block';
                        } else {
                            element.style.display = 'none';
                        }
                    });
                });
            } else {
                console.error('Element with ID "myCheckbox6" not found.');
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const myCheckbox7 = document.getElementById('myCheckbox7');
            const hiddenElements7 = document.querySelectorAll('.hidden-content7');

            if (myCheckbox7) {
                if (myCheckbox7.checked) {
                    hiddenElements7.forEach(element => {
                        element.style.display = 'block';
                    });
                }

                myCheckbox7.addEventListener('click', function () {
                    hiddenElements7.forEach(element => {
                        if (myCheckbox7.checked) {
                            element.style.display = 'block';
                        } else {
                            element.style.display = 'none';
                        }
                    });
                });
            } else {
                console.error('Element with ID "myCheckbox7" not found.');
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const myCheckbox8 = document.getElementById('myCheckbox8');
            const hiddenElements8 = document.querySelectorAll('.hidden-content8');

            if (myCheckbox8) {
                if (myCheckbox8.checked) {
                    hiddenElements8.forEach(element => {
                        element.style.display = 'block';
                    });
                }

                myCheckbox8.addEventListener('click', function () {
                    hiddenElements8.forEach(element => {
                        if (myCheckbox8.checked) {
                            element.style.display = 'block';
                        } else {
                            element.style.display = 'none';
                        }
                    });
                });
            } else {
                console.error('Element with ID "myCheckbox8" not found.');
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const myCheckbox9 = document.getElementById('myCheckbox9');
            const hiddenElements9 = document.querySelectorAll('.hidden-content9');

            if (myCheckbox9) {
                if (myCheckbox9.checked) {
                    hiddenElements9.forEach(element => {
                        element.style.display = 'block';
                    });
                }

                myCheckbox9.addEventListener('click', function () {
                    hiddenElements9.forEach(element => {
                        if (myCheckbox9.checked) {
                            element.style.display = 'block';
                        } else {
                            element.style.display = 'none';
                        }
                    });
                });
            } else {
                console.error('Element with ID "myCheckbox9" not found.');
            }
        });
    </script>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            const myCheckbox10 = document.getElementById('myCheckbox10');
            const hiddenElements10 = document.querySelectorAll('.hidden-content10');

            if (myCheckbox10) {
                if (myCheckbox10.checked) {
                    hiddenElements10.forEach(element => {
                        element.style.display = 'block';
                    });
                }

                myCheckbox10.addEventListener('click', function () {
                    hiddenElements10.forEach(element => {
                        if (myCheckbox10.checked) {
                            element.style.display = 'block';
                        } else {
                            element.style.display = 'none';
                        }
                    });
                });
            } else {
                console.error('Element with ID "myCheckbox10" not found.');
            }
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
        document.addEventListener('DOMContentLoaded', function() {
            const checkbox1 = document.getElementById('wirecheck');
            const wireField = document.getElementById('wire-field');

            if (checkbox1) {
                if (checkbox1.checked) {
                    wireField.style.display = 'block';
                }

                checkbox1.addEventListener('change', (event) => {
                    if (event.target.checked) {
                        wireField.style.display = 'block';
                    } else {
                        wireField.style.display = 'none';
                    }
                });
            } else {
                console.error('Element with ID "wirecheck" not found.');
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkbox2 = document.getElementById('megacheck');
            const megaField = document.getElementById('mega-field');

            if (checkbox2) {
                if (checkbox2.checked) {
                    megaField.style.display = 'block';
                }

                checkbox2.addEventListener('change', (event) => {
                    if (event.target.checked) {
                        megaField.style.display = 'block';
                    } else {
                        megaField.style.display = 'none';
                    }
                });
            } else {
                console.error('Element with ID "megacheck" not found.');
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sofacheckbox = document.getElementById('sofas');
            const sofaquantityField = document.getElementById('sofa-field');

            if (sofacheckbox) {
                if (sofacheckbox.checked) {
                    sofaquantityField.style.display = 'block';
                }

                sofacheckbox.addEventListener('change', (event) => {
                    if (event.target.checked) {
                        sofaquantityField.style.display = 'block';
                    } else {
                        sofaquantityField.style.display = 'none';
                    }
                });
            } else {
                console.error('Element with ID "sofas" not found.');
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const watercheckbox = document.getElementById('water');
            const waterquantityField = document.getElementById('water-field');

            if (watercheckbox) {
                if (watercheckbox.checked) {
                    waterquantityField.style.display = 'block';
                }

                watercheckbox.addEventListener('change', (event) => {
                    if (event.target.checked) {
                        waterquantityField.style.display = 'block';
                    } else {
                        waterquantityField.style.display = 'none';
                    }
                });
            } else {
                console.error('Element with ID "water" not found.');
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
        document.addEventListener('DOMContentLoaded', function() {
            const myCheckbox8 = document.getElementById('myCheckbox8');
            const hiddenElements8 = document.querySelectorAll('.hidden-content8');

            if (myCheckbox8) {
                if (myCheckbox8.checked) {
                    hiddenElements8.forEach(element => {
                        element.style.display = 'block';
                    });
                }

                myCheckbox8.addEventListener('click', function () {
                    hiddenElements8.forEach(element => {
                        if (myCheckbox8.checked) {
                            element.style.display = 'block';
                        } else {
                            element.style.display = 'none';
                        }
                    });
                });
            } else {
                console.error('Element with ID "myCheckbox8" not found.');
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const check = document.getElementById('first-aid');
            const quantity = document.getElementById('first-quantity');

            if (check) {
                if (check.checked) {
                    quantity.style.display = 'block';
                }

                check.addEventListener('change', (event) => {
                    if (event.target.checked) {
                        quantity.style.display = 'block';
                    } else {
                        quantity.style.display = 'none';
                    }
                });
            } else {
                console.error('Element with ID "first-aid" not found.');
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxe = document.getElementById('umbrella');
            const quantityF = document.getElementById('umbrella-quantity');

            if (checkboxe) {
                if (checkboxe.checked) {
                    quantityF.style.display = 'block';
                }

                checkboxe.addEventListener('change', (event) => {
                    if (event.target.checked) {
                        quantityF.style.display = 'block';
                    } else {
                        quantityF.style.display = 'none';
                    }
                });
            } else {
                console.error('Element with ID "umbrella" not found.');
            }
        });
    </script>


    <script>
        function reset_data() {
            document.getElementById("myForm").reset();
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sendToRegionCheckbox = document.getElementById('send-to-region');
            const sendEmailOptions = document.getElementById('send-email-options');

            if (sendToRegionCheckbox) {
                if (sendToRegionCheckbox.checked) {
                    sendEmailOptions.style.display = 'block';
                }

                sendToRegionCheckbox.addEventListener('change', () => {
                    if (sendToRegionCheckbox.checked) {
                        sendEmailOptions.style.display = 'block';
                    } else {
                        sendEmailOptions.style.display = 'none';
                    }
                });
            } else {
                console.error('Element with ID "send-to-region" not found.');
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sendToActiveCheckbox = document.getElementById('send-to-active');
            const sendActiveOptions = document.getElementById('send-active-options');

            if (sendToActiveCheckbox) {
                if (sendToActiveCheckbox.checked) {
                    sendActiveOptions.style.display = 'block';
                }

                sendToActiveCheckbox.addEventListener('change', () => {
                    if (sendToActiveCheckbox.checked) {
                        sendActiveOptions.style.display = 'block';
                    } else {
                        sendActiveOptions.style.display = 'none';
                    }
                });
            } else {
                console.error('Element with ID "send-to-active" not found.');
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sendToInactiveCheckbox = document.getElementById('send-to-inactive');
            const sendInactiveOptions = document.getElementById('send-inactive-options');

            if (sendToInactiveCheckbox) {
                if (sendToInactiveCheckbox.checked) {
                    sendInactiveOptions.style.display = 'block';
                }

                sendToInactiveCheckbox.addEventListener('change', () => {
                    if (sendToInactiveCheckbox.checked) {
                        sendInactiveOptions.style.display = 'block';
                    } else {
                        sendInactiveOptions.style.display = 'none';
                    }
                });
            } else {
                console.error('Element with ID "send-to-inactive" not found.');
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
                '<div class="row"> <div class="col-lg-6 spacing-right"> <div class="row mb-2"> <div class="form-type col-lg-3 spacing-right"> Name of Degree <br> <input class="form-control" readonly type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;"> </div> <div class="form-type col-lg-3 spacing-left spacing-right"> Date <br> <input class="form-control" readonly type="date" id="date" name="Date[]" placeholder="..." style="width: 100%;"> </div> <div class="form-type col-lg-5 spacing-left spacing-right"> Picture <br> <input class="form-control" readonly type="file" id="picture" name="Picture[]" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-11 form-type spacing-right"> Institute Name <br> <input class="form-control" readonly id="institute" name="Institute[]" type="text" placeholder="..." style="width: 100%;"> </div> </div> </div> <div class="col-lg-4 spacing-left"> <div class="row mb-3"> <div class="form-type col-lg-10 spacing-right"> Degree No. <br> <input class="form-control" readonly id="degree" name="Degree[]" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="form-type col-lg-5 spacing-right"> Marks <br> <input class="form-control" readonly type="text" id="marks" name="Marks[]" placeholder="..." style="width: 100%;"> </div> <div class="form-type col-lg-5 spacing-left spacing-right"> Grade <br> <input class="form-control" readonly type="text" id="grade" name="Grade[]" placeholder="..." style="width: 100%;"> </div> </div> </div> <div class="col-lg-2 spacing-left my-5"> <button type="button" class="remove-btn" onclick="education_remove_fields(' +
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
                '<div class="row"> <div class="col-lg-6"><div class="row mb-2"><div class="col-lg-3 spacing-right">Force No  <br>  <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-8 spacing-left spacing-right">Force Name <br>  <input class="form-control" readonly type="date" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right">Joining Rank <br>  <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Joining Unit <br>  <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right"> Retirement Rank <br>  <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Retirement Unit <br>  <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"></div></div></div><div class="col-lg-4 spacing-left"><div class="row mb-2"><div class="col-lg-6 spacing-right">Service Tenure <br>  <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-right spacing-left"> Others <br>  <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-6 spacing-right"> Inservice Awards <br>  <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-right spacing-left">Attachement <br>  <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"></div></div></div><div class="col-lg-2 spacing-left my-5"><button type="button" class="remove-btn" onclick="work_remove_fields(' +
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
                '<div class="row"><div class="col-lg-10 mt-2"><div class="row mb-2"><div class="col-lg-5 spacing-right">CNIC <br>  <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Name <br>  <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"></div></div><div class="row mb-2"><div class="col-lg-5 spacing-right">Father Name <br>  <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-5 spacing-left spacing-right">Relationship <br>  <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"></div></div></div><div class="col-lg-2 mt-5"><button type="button" class="remove-btn" onclick="compliance_remove_fields(' +
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
                ') </h5> <div class="col-lg-6"> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Name <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-6 spacing-left spacing-right"> Father Name <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-4 spacing-right"> Relationship <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-7 spacing-left spacing-right"> CNIC <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-11 colspan-2 spacing-right"> Address <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> </div> </div> <div class="col-lg-6 spacing-left"> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Landline <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-5 spacing-left"> Cell No <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10"> Email ID <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> </div> </div> <div class="col-lg-6"> <div class="row mb-2"> <div class="col-lg-4 spacing-right"> Verified by Police <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-7 spacing-left spacing-right"> Name of Police Station <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-11 spacing-right"> Name of SHO <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-11 spacing-right"> Address of Police Station <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> </div> </div> <div class="col-lg-6 spacing-left"> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Verified by VC/UC <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-5 spacing-left"> Name of VC/UC <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10"> Name of Chairman <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10"> Address of VC/UC Office <br> <input class="form-control" readonly type="text" placeholder="..." style="width: 100%;"> </div> </div> </div> <center> <button type="button" class="remove-btn" onclick="guarantor_remove_fields(' +
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

        inpFile12.addEventListener("change", function(){
            const file = this.files[0];

            if(file){
                const reader = new FileReader();

                previewDefaultText12.style.display = "none";
                previewImage12.style.display = "block";

                reader.addEventListener("load", function(){
                    previewImage12.setAttribute("src", this.result);
                });

                reader.readAsDataURL(file);
            }
            else{
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

        inpFile13.addEventListener("change", function(){
            const file = this.files[0];

            if(file){
                const reader = new FileReader();

                previewDefaultText13.style.display = "none";
                previewImage13.style.display = "block";

                reader.addEventListener("load", function(){
                    previewImage13.setAttribute("src", this.result);
                });

                reader.readAsDataURL(file);
            }
            else{
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

        inpFile14.addEventListener("change", function(){
            const file = this.files[0];

            if(file){
                const reader = new FileReader();

                previewDefaultText14.style.display = "none";
                previewImage14.style.display = "block";

                reader.addEventListener("load", function(){
                    previewImage14.setAttribute("src", this.result);
                });

                reader.readAsDataURL(file);
            }
            else{
                previewDefaultText14.style.display = "null";
                previewImage14.style.display = "null";
                previewImage14.setAttribute("src", "");
            }


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
        google.maps.event.addDomListener(window, 'load', initAutocomplete);
    </script>

       {{-- ////////////////////////////   MY ADDITION   \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}

  {{-- Budget calc for first  --}}
  <script>
    // Function to update total amount when amount per unit or quantity changes
    function updateTotalAmount(index) {
        var amountPerUnit = parseFloat(document.getElementsByName('amount_per_unit')[index].value) || 0;
        var quantity = parseFloat(document.getElementsByName('quantity')[index].value) || 0;

        // Calculate total amount
        var totalAmount = amountPerUnit * quantity;

        // Update the total amount input field
        document.getElementsByName('total_amount')[index].value = totalAmount.toFixed(2);
    }

    // Attach event listeners to amount per unit and quantity inputs
    document.addEventListener('input', function (event) {
        var target = event.target;
        var nameAttribute = target.getAttribute('name');

        // Check if the changed input is either amount per unit or quantity
        if (nameAttribute === 'amount_per_unit' || nameAttribute === 'quantity') {
            // Get the index of the input (assuming you have multiple sets of inputs)
            var index = target.dataset.index;

            // Update the total amount
            updateTotalAmount(index);
        }
    });
</script>

    {{-- budget calc for dynamically added --}}
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
        document.addEventListener('input', function (event) {
            var target = event.target;
            var parent = target.closest('.budgetContainer');

            // Check if the changed input is within a budgetContainer
            if (parent && parent.classList.contains('budgetContainer')) {
                // Check if the changed input is either amount per unit or quantity
                if (target.classList.contains('BudgetAmountPerUnit') || target.classList.contains('BudgetQuantity')) {
                    // Update the total amount for this budgetContainer
                    updateTotalAmount(target);
                }
            }
        });
    </script>

    {{-- loi calculation for dynamically added --}}
 

    {{-- budget accordian dynamic add fields  --}}
 


    <script>
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
</body>

</html>
