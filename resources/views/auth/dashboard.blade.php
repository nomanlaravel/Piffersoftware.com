@include('layouts.header')

@yield('main')

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
    <a href="{{ url('logout') }}"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
</div>

<h3 style="font-weight: 700; margin-left: 205px;">PIFFERS SECURITY SERVICES PVT.LTD</h3>

<div class="row head-heading" style="margin-top: 5%; margin-bottom: 5%; color: rgb(112, 0, 193);">
    <div class="col-lg-3">
        <h5> <a href=""> Get Things Done </a> </h5>
    </div>
    <div class="col-lg-3">
        <h5> <a href=""> Bussiness Overview </a> </h5>
    </div>
    <div class="col-lg-3">
        <h5> <a href=""> Customize Overview </a> </h5>
    </div>
    <div class="col-lg-3">
        <h5> <button type="button" data-toggle="modal" data-target="#composerEmail"
                class="btn btn-primary shadow px-3 py-2">Compose Email</button> </h5>
    </div>

    <!-- Compose Email Modal -->
    <div class="modal fade" id="composerEmail" tabindex="-1" role="dialog" aria-labelledby="composerEmailLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('customer.email.send') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="composerEmailLabel">Compose Email</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <!-- Select All Checkbox -->
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="selectAllCustomers"
                                name="send_to_all">
                            <label class="custom-control-label font-weight-bold" for="selectAllCustomers">Send to all
                                customers</label>
                        </div>

                        <!-- Customer Select -->
                        <div class="form-group" id="customerSelectGroup">
                            <label for="customers" class="font-weight-bold">Select Recipients</label>
                            <select id="customers" name="customers[]" class="form-control" multiple="multiple"
                                style="width: 100%;">
                                @if(isset($customers))
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">
                                            {{ $customer->email }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            <small class="text-muted">Hold Ctrl layout (or Command on Mac) to select multiple
                                options.</small>
                        </div>

                        <!-- Subject -->
                        <div class="form-group">
                            <label for="emailTitle" class="font-weight-bold">Subject</label>
                            <input type="text" class="form-control" id="emailTitle" name="emailTitle"
                                placeholder="Enter email subject" required>
                        </div>

                        <!-- Body -->
                        <div class="form-group">
                            <label for="emailBody" class="font-weight-bold">Message</label>
                            <textarea class="form-control" id="emailBody" name="emailBody" rows="6"
                                placeholder="Write your message here..." required></textarea>
                        </div>

                        <!-- Attachment -->
                        <div class="form-group">
                            <label for="emailAttachment" class="font-weight-bold">Attachment <span
                                    class="text-muted font-weight-normal">(optional)</span></label>
                            <input type="file" class="form-control-file" id="emailAttachment" name="emailAttachment">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary hiding-btn" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary hiding-btn">Send Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





</div>
<h4>Tasks</h4>
<h6 style="color: grey; margin-left: 255px;">We found email for sales transactions</h6>
<h5 style="color: grey; font-weight: 700; margin-top: 5%;">
    Shorts
</h5>
<div class="row">
    <div class="col-lg-2">
        <img src="dashboard/pic1.png" style="width:100%; height:70%;" alt=""> <br>
        <p>Report a Non Account holder</p>
    </div>
    <div class="col-lg-2">
        <img src="dashboard/pic2.png" style="width:100%; height:70%;" alt=""> <br>
        <p>Guard without Nadra verification</p>
    </div>
    <div class="col-lg-2">
        <img src="dashboard/pic3.png" style="width:100%; height:70%;" alt=""> <br>
        <p>Guard without Police verification</p>
    </div>
    <div class="col-lg-2">
        <img src="dashboard/pic4.png" style="width:100%; height:70%;" alt=""> <br>
        <p>Guard without accounts</p>
    </div>
    <div class="col-lg-2">
        <img src="dashboard/pic5.png" style="width:100%; height:70%;" alt=""> <br>
        <p>Report a non account holders</p>
    </div>
</div>

</div>
<!--Customer form ends here-->
</div>
@include('layouts.footer')

@push('scripts')
    <!-- jQuery (MUST be before Select2 & Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('#customers').select2({
                placeholder: 'Select customers',
                width: '100%',
                closeOnSelect: false,
                allowClear: true
            });

            // Handle "Send to all" checkbox
            $('#selectAllCustomers').change(function() {
                if (this.checked) {
                    // Hide the select box and disable it
                    $('#customerSelectGroup').slideUp();
                    $('#customers').prop('disabled', true);
                } else {
                    // Show the select box and enable it
                    $('#customerSelectGroup').slideDown();
                    $('#customers').prop('disabled', false);
                }
            });
        });
    </script>
@endpush