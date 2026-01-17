@include('layouts.header')

@yield('main')

<div id="main" style="margin-left: 92%;">
    <button class="openbtn" onclick="openNav()">☰</button>
</div>

<div id="mySidebar" class="sidebar admin-setting">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
    <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration Setting</a>
    <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
    <hr>
    <a href="{{ url('logout') }}"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
</div>

<h3 style="font-weight: 700; margin-left: 205px;">PIFFERS SECURITY SERVICES PVT.LTD</h3>

{{-- WhatsApp success/error alerts --}}
@if(session('wa_success'))
    <div class="alert alert-success mx-3 mt-3">
        {{ session('wa_success') }}
    </div>
@endif

@if(session('wa_error'))
    <div class="alert alert-danger mx-3 mt-3">
        {{ session('wa_error') }}
    </div>
@endif


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
        <h5>
            {{-- Existing Compose Message Button --}}
            <button type="button" data-toggle="modal" data-target="#composerEmail"
                class="btn btn-primary shadow px-3 py-2">
                Compose Message
            </button>

            {{-- WhatsApp Test Button --}}
            <button type="button" data-toggle="modal" data-target="#whatsappTestModal"
                class="btn btn-success shadow px-3 py-2">
                WhatsApp Test
            </button>
        </h5>
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


{{-- ========================================================= --}}
{{-- WhatsApp Test Modal --}}
{{-- ========================================================= --}}
<div class="modal fade" id="whatsappTestModal" tabindex="-1" role="dialog" aria-labelledby="whatsappTestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="{{ route('admin.whatsapp.test.send') }}">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="whatsappTestModalLabel">
                        WhatsApp Test (Twilio Sandbox)
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="alert alert-warning">
                        <strong>Sandbox Note:</strong>
                        Receiver must join Twilio Sandbox first:
                        <br>
                        Send <code>join &lt;your-code&gt;</code> to <code>+14155238886</code>.
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Phone Number</label>
                        <input type="text"
                               name="phone"
                               class="form-control"
                               placeholder="0340xxxxxxx or +92340xxxxxxx"
                               value="{{ old('phone', '+92340') }}"
                               required>
                        <small class="text-muted">
                            Pakistan: 0340xxxxxxx / 92340xxxxxxx / +92340xxxxxxx
                        </small>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Message</label>
                        <textarea name="message"
                                  class="form-control"
                                  rows="5"
                                  required>{{ old('message', 'Hello! This is a WhatsApp test message from ERP.') }}</textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success px-4">Send WhatsApp</button>
                </div>

            </div>
        </form>
    </div>
</div>
{{-- WhatsApp Test Modal End --}}



{{-- ========================================================= --}}
{{-- NOTE: Your existing Compose Message Modal should remain here --}}
{{-- If you already have it in another file include, ignore this. --}}
{{-- ========================================================= --}}

{{-- Example placeholder (remove if already exists)
<div class="modal fade" id="composerEmail" tabindex="-1" role="dialog" aria-hidden="true">
   ...
</div>
--}}

@include('layouts.footer')
