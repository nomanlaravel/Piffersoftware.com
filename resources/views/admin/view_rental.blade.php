@include('layouts.header')
@yield('main')
<!--End of the Navbar-->
<!--Customer Form-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+TAS+Beginner&family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/mBox.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="jquery-3.7.1.min.js"></script>
<div class="customer_form" style="">
 <div class="row">
  <div class="col-11 d-flex flex-column justify-content-center align-items-center">
   <h1 class="d-inline fw-bold " style="color:black;font-family:'poppins';font-size:3rem; letter-spacing:6px;">
    PIFFERS Security Services</h1>
  </div>
  <div class="col-1 d-flex flex-column justify-content-center align-items-end">
   <div>
    <button class="openbtn fs-3" onclick="openNav()">☰</button>
   </div>
  </div>
 </div>

 <div id="mySidebar" class="sidebar admin-setting ">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
  <a href="#" style="color: gold;"> <i class="bi bi-gear mr-2"></i> PIFFERS Administration Setting</a>
  <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
  <hr>
  <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
 </div>
 <style>
  .body {
      background-color: lightblue !important;
  }

  .navtabrental {
      box-shadow: 2px 4px 10px 10px rgb(243, 243, 243);

  }

  .rentaltabnav {
      background-color: #efefef !important;

      border-radius: 15px !important;
  }

  .tabbtn {
      font-size: 1.1rem;
      width: 300px;
      padding: 10px 0px;
      border-radius: 10px !important;
  }

  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
      background-color: #320056 !important;
  }

  input:disabled {
      background: white !important;
      border-radius: 10px !important;
      padding: 15px;
      font-size: 0.9rem;
      width: 380px;
      height: 40px !important;
  }

  .nav1ta {
      background: #F6F7F8 !important;
      border-radius: 10px !important;
      border: 0px solid white;
      padding-top: 5px;
      height: 90px !important;
      width: 390px;
      resize: none;
      display: block;
  }

  .tabconhd {}

  .tabconpara {
      color: #320056;
      font-size: 1.1rem !important;
  }

  .nav6ta {
      background: #F6F7F8 !important;
      border-radius: 10px !important;
      border: 0px solid white;
      padding-top: 5px;
      height: 100px !important;
      display: block;
      min-width: 760px;
      resize: none;
  }

  .propimg {
      border-radius: 50%;
      height: 150px;
      width: 150px;
  }

  .cnicimgs {
      border-radius: 5%;
      max-height: 10em;
  }

  .pdfattach {
      border-radius: 5%;
      max-height: 10em;
      max-width: 16em;
  }

  .imgclickable:hover {
      opacity: 0.9;
  }

  .cnicimgs1 {
      border-radius: 5%;
      height: 100px;
      width: 150px;
  }

  .tab-content {
      min-height: 600px;
  }

  .aminp {
      border: 0px solid black !important;
      background: none !important;
      height: 20px !important;
  }

  @media only screen and (max-width: 600px) {
      input:disabled {
          background: #F6F7F8 !important;
          border-radius: 10px !important;
          padding: 15px;
          font-size: 0.9rem;
          width: 220px;
          height: 25px !important;
      }

      .nav6ta {
          background: white !important;
          border-radius: 10px !important;
          padding: 15px;
          height: 150px !important;
          width: 220px;
          min-width: 150px;
          resize: none;
      }

      .propimg {
          border-radius: 50%;
          max-height: 10em;
      }

      .cnicimgs {
          border-radius: 5%;
          max-height: 10em;
      }

      .tab-content {
          min-height: 600px !important;
      }
  }

  .delimage {
      position: absolute;
      top: 5px;
      right: 5px;
      background: red;
      color: white;
      font-weight: bold;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      text-align: center;
      line-height: 18px;
      font-size: 14px;
      text-decoration: none;
  }

  .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 60%;
      transform: translate(-50%, -50%);
      background-color: white;
      border: 0px solid #E7E7E7;
      border-radius: 15px;
      z-index: 9999;
      width: 800px;
      background: none !important;
  }
  .close-btn{
       position: absolute;
       top:5px;
       right:15px;
       cursor: pointer;
       font-size: 25px;
  }
 </style>
 <section class="my-5 px-lg-0 px-md-0 px-2 py-lg-0 py-md-0 py-2">
  <div class="modal-header border-0">
   <div style="display:flex; column-gap:10px; align-items:center">
    <button type="button" class="btn btn-link" onclick="history.back()">
     <i class="bi bi-arrow-left"></i>
    </button>
    <h5 class="mt-3" style="font-weight: 700;"> Rental Property Details: </h5>
   </div>
  </div>
  @php
  $rental = $rentals;
  @endphp
  <form enctype="multipart/form-data">
   @csrf
   <div class="d-flex navtabrental " style="background-color:#F6F7F8; border:2px solid rgb(166, 166, 166);border-radius:15px;">
    {{-- //////////////////    Tabs Navigation Menu   \\\\\\\\\\\\\ --}}
    <div class="nav  flex-column nav-pills me-3 rentaltabnav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
     <button class="nav-link active px-5 tabbtn" id="v-pills-basicdetails-tab" data-bs-toggle="pill" data-bs-target="#v-pills-basicdetails" type="button" role="tab" aria-controls="v-pills-basicdetails" aria-selected="true">Basic Details</button>
     <button class="nav-link  tabbtn" id="v-pills-address-tab" data-bs-toggle="pill" data-bs-target="#v-pills-address" type="button" role="tab" aria-controls="v-pills-address" aria-selected="false">Address</button>
     <button class="nav-link  tabbtn" id="v-pills-pcd-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pcd" type="button" role="tab" aria-controls="v-pills-pcd" aria-selected="false">Property Caretaker Details</button>
     <button class="nav-link  tabbtn" id="v-pills-pmd-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pmd" type="button" role="tab" aria-controls="v-pills-pmd" aria-selected="false">Plaza Management Details</button>
     <button class="nav-link  tabbtn" id="v-pills-iotp-tab" data-bs-toggle="pill" data-bs-target="#v-pills-iotp" type="button" role="tab" aria-controls="v-pills-iotp" aria-selected="false">In Charge of the Property</button>
     <button class="nav-link  tabbtn" id="v-pills-pod-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pod" type="button" role="tab" aria-controls="v-pills-pod" aria-selected="false">Property Owner Details</button>
     <button class="nav-link  tabbtn" id="v-pills-ub-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ub" type="button" role="tab" aria-controls="v-pills-ub" aria-selected="false">Utility Bills</button>
     <button class="nav-link  tabbtn" id="v-pills-rpd-tab" data-bs-toggle="pill" data-bs-target="#v-pills-rpd" type="button" role="tab" aria-controls="v-pills-rpd" aria-selected="false">Rental Payment Details</button>
    </div>

    {{-- ////////////////   Tab Content \\\\\\\\\\\\\\\\\ --}}
    <div class="tab-content  py-2 rentaltabcontent d-flex flex-row  align-items-center" id="v-pills-tabContent">

     {{-- //////////////////////////// Basic Details Content \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\   --}}
     <div class="tab-pane  fade show active " id="v-pills-basicdetails" role="tabpanel" aria-labelledby="v-pills-basicdetails-tab" tabindex="0">

      <div class="container row ">
       <div class="col-12 d-flex flex-row justify-content-center mt-1 mt-md-3 mt-lg-5">
        @if ($rental && $rental->pic)
        <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
         <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
          @php
          $attachments = explode(',', $rental->pic);
          @endphp
          @foreach ($attachments as $attachment)
          <div style="padding: 10px; position: relative;">
           @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
           <!-- Display Image -->
           <img src="{{ asset($attachment) }}" alt="Image Preview" onclick="showPopup(this)" class="propimg imgclickable">

           <!-- Delete Button -->
           <a href="{{ route('admin.deleteRentalImage', ['id' => $rental->id, 'column' => 'pic', 'file']) }}" onclick="return confirm('Are you sure you want to delete this image?')" class="delimage" x</a>

            <div class="popup" class="popup">
             <div style="position: relative; display: inline-block;">
              <img src="{{ asset($attachment) }}" style="height: 500px; width: 800px; border-radius:15px;" />
             </div>
             <span class="close-btn"  onclick="hidePopup(this)">&#10006;</span>
            </div>
            @elseif (Str::endsWith($attachment, ['.pdf']))
            <!-- Display PDF -->
            <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach" />
            <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download</a>
            @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
            <!-- Display Excel Sheet -->
            <div class="preview-excel" style="text-align: center;">
             <p>Excel Sheet Name:
              {{ pathinfo($attachment)['basename'] }}
             </p>
             <a href="{{ asset($attachment) }}">Download</a>
            </div>
            @else
            <span class="preview-default-text">Preview</span>
            @endif
          </div>
          @endforeach
         </div>
        </div>
        @else
        <p class="text-center text-secondary">Image not found</p>
        @endif
       </div>
       <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5  mb-3">
        <div class="">
         <h6 class="fs-6 mt-1 d-inline tabconhd">Office Name:</h6>
         <p class="my-auto  fs-6  d-inline ml-4 tabconpara">{{ $rental->office_name }}</p>
        </div>

       </div>
       <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5  mb-3">

        <h6 class="fs-6 mt-1 d-inline tabconhd">RP Number:</h6>
        <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->rp_no }}</p>

          {{-- <h5 class="ml-1">RP Number</h5>
          <input class="form-control" type="text" value="{{$rental->rp_no}}" disabled> --}}
       </div>

        {{-- <div class="col-lg-6 spacing-left mt-1">
            RP Number <br> <input class="form-control mt-1" id="rp_no" name="rp_no" value="{{ $rentals->rp_no }}" type="text" placeholder="..." style="width: 100%;">
        </div> --}}

      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">

       <h6 class="fs-6 mt-1 d-inline tabconhd">Type of Property:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->type }}</p>

       {{-- <h5 class="ml-1">Type of Property</h5>
                        <input class="form-control" type="text" value="{{$rental->type}}" disabled> --}}
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">

       <h6 class="fs-6 mt-1 d-inline tabconhd">Branch ID:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->branch }}</p>

       {{-- <h5 class="ml-1">Branch ID</h5>
                        <input class="form-control" type="text" value="{{$rental->branch}}" disabled> --}}
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">

       <h6 class="fs-6 mt-1 d-inline tabconhd">Reporting to:</h6>
       <p class="my-auto fs-6 d-inline ml-4 tabconpara">{{ $rental->report_to }}</p>

       {{-- <h5 class="ml-1">Reporting to</h5>
                        <input class="form-control" type="text" value="{{$rental->report_to}}" disabled> --}}
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4   mb-3">

       <h6 class="fs-6 mt-1 d-inline tabconhd">Description of Property:</h6>
       <textarea class="form-control  mt-1" placeholder="{{ $rental->desc }}"></textarea>

       {{-- <h5 class="ml-1">Description of Property</h5>
                        <input class="form-control" type="text" value="{{$rental->desc}}" disabled> --}}
      </div>
     </div>
    </div>

    {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ Address ////////////////////////////////////////////// --}}
    <div class="tab-pane fade" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-address-tab" tabindex="0">
     <div class="container row">
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Office No:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->office_no }}</p>

      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Building:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->building }}</p>

      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Block:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->block }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Area:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->area }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">City:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->city }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Location:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->location }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-5 mt-1 d-inline tabconhd">GPS:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->gps }}</p>
      </div>
     </div>
    </div>

    {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ Property Care taker Details  ////////////////////////////////// --}}
    <div class="tab-pane fade" id="v-pills-pcd" role="tabpanel" aria-labelledby="v-pills-pcd-tab" tabindex="0">
     <div class="container row">
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-lg-5 mt-md-3">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Name:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->care_name }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Cell:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->care_cell }}</p>
      </div>

      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h5 class="fs-6 tabconhd">CNIC Front:</h5>
       @if ($rental && $rental->care_cnic)
       <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
         @php
         $attachments = explode(',', $rental->care_cnic);
         @endphp
         @foreach ($attachments as $attachment)
         <div style="padding: 10px; position: relative;">
          @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
          <!-- Display Image -->
          <img src="{{ asset($attachment) }}" alt="Image Preview" onclick="showPopup(this)" class="cnicimgs imgclickable">

          <!-- Delete Button -->
          <a href="{{ route('admin.deleteRentalImage', ['id' => $rental->id, 'column' => 'care_cnic', 'file']) }}" onclick="return confirm('Are you sure you want to delete this image?')" class="delimage">x</a>

          <div class="popup" class="popup">
           <div style="position: relative; display: inline-block;">
            <img src="{{ asset($attachment) }}" style="height: 500px; width: 800px; border-radius:15px;" />
           </div>
           <span class="close-btn" onclick="hidePopup(this)">&#10006;</span>
          </div>
          @elseif (Str::endsWith($attachment, ['.pdf']))
          <!-- Display PDF -->
          <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach" />
          <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download</a>
          @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
          <!-- Display Excel Sheet -->
          <div class="preview-excel" style="text-align: center;">
           <p>Excel Sheet Name:
            {{ pathinfo($attachment)['basename'] }}
           </p>
           <a href="{{ asset($attachment) }}">Download</a>
          </div>
          @else
          <span class="preview-default-text">Preview</span>
          @endif
         </div>
         @endforeach
        </div>
       </div>
       @else
       <p class="text-center text-secondary">Image not found</p>
       @endif
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h5 class="fs-6 tabconhd">CNIC Back:</h5>
       @if ($rental && $rental->care_back)
       <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
         @php
         $attachments = explode(',', $rental->care_back);
         @endphp
         @foreach ($attachments as $attachment)
         <div style="padding: 10px; position: relative;">
          @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
          <!-- Display Image -->
          <img src="{{ asset($attachment) }}" alt="Image Preview" onclick="showPopup(this)" class="cnicimgs imgclickable">

          <!-- Delete Button -->
          <a href="{{ route('admin.deleteRentalImage', ['id' => $rental->id, 'column' => 'care_back', 'file']) }}" onclick="return confirm('Are you sure you want to delete this image?')" class="delimage">x</a>

          <div class="popup">
           <div style="position: relative; display: inline-block;">
            <img src="{{ asset($attachment) }}" style="height: 500px; width: 800px; border-radius:15px;" />
           </div>
           <span class="close-btn"  onclick="hidePopup(this)">&#10006;</span>
          </div>
          @elseif (Str::endsWith($attachment, ['.pdf']))
          <!-- Display PDF -->
          <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach" />
          <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download</a>
          @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
          <!-- Display Excel Sheet -->
          <div class="preview-excel" style="text-align: center;">
           <p>Excel Sheet Name:
            {{ pathinfo($attachment)['basename'] }}
           </p>
           <a href="{{ asset($attachment) }}">Download</a>
          </div>
          @else
          <span class="preview-default-text">Preview</span>
          @endif
         </div>
         @endforeach
        </div>
       </div>
       @else
       <p class="text-center text-secondary">Image not found</p>
       @endif
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h5 class="fs-6 tabconhd">Attachment:</h5>
       @if ($rental && $rental->care_attach)
       <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
         @php
         $attachments = explode(',', $rental->care_attach);
         @endphp
         @foreach ($attachments as $attachment)
         <div style="padding: 10px; position: relative;">
          @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
          <!-- Display Image -->
          <img src="{{ asset($attachment) }}" alt="Image Preview" onclick="showPopup(this)" class="cnicimgs imgclickable">

          <!-- Delete Button -->
          <a href="{{ route('admin.deleteRentalImage', ['id' => $rental->id, 'column' => 'care_attach', 'file']) }}" onclick="return confirm('Are you sure you want to delete this image?')" class="delimage">x</a>

          <div class="popup">
           <div style="position: relative; display: inline-block;">
            <img src="{{ asset($attachment) }}" style="height: 500px; width: 800px; border-radius:15px;" />
           </div>
           <span class="close-btn"  onclick="hidePopup(this)">&#10006;</span>
          </div>
          @elseif (Str::endsWith($attachment, ['.pdf']))
          <!-- Display PDF -->
          <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach" />
          <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download</a>
          @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
          <!-- Display Excel Sheet -->
          <div class="preview-excel" style="text-align: center;">
           <p>Excel Sheet Name:
            {{ pathinfo($attachment)['basename'] }}
           </p>
           <a href="{{ asset($attachment) }}">Download</a>
          </div>
          @else
          <span class="preview-default-text">Preview</span>
          @endif
         </div>
         @endforeach
        </div>
       </div>
       @else
       <p class="text-center text-secondary">Image not found</p>
       @endif
      </div>

     </div>
    </div>
    {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\  Plaza Management Details  //////////////////////////////////////////// --}}
    <div class="tab-pane fade" id="v-pills-pmd" role="tabpanel" aria-labelledby="v-pills-pmd-tab" tabindex="0">
     <div class="container row">
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Name:</h6>
       <p class="my-auto fs-6 tabconpara d-inline ml-4">{{ $rental->plaza_name }}</p>

      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Cell:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->plaza_cell }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Bank Name:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->plaza_bank }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Account Number:</h6>
       <p class="my-auto fs-6 d-inline ml-4 tabconpara">{{ $rental->plaza_account }}</p>
      </div>

      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h5 class="fs-6 tabconhd">CNIC Front:</h5>
       @if ($rental && $rental->plaza_cnic)
       <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
         @php
         $attachments = explode(',', $rental->plaza_cnic);
         @endphp
         @foreach ($attachments as $attachment)
         <div style="padding: 10px; position: relative;">
          @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
          <!-- Display Image -->
          <img src="{{ asset($attachment) }}" alt="Image Preview" onclick="showPopup(this)" class="cnicimgs imgclickable">

          <!-- Delete Button -->
          <a href="{{ route('admin.deleteRentalImage', ['id' => $rental->id, 'column' => 'plaza_cnic', 'file']) }}" onclick="return confirm('Are you sure you want to delete this image?')" class="delimage">x</a>

          <div class="popup" >
           <div style="position: relative; display: inline-block;">
            <img src="{{ asset($attachment) }}" style="height: 500px; width: 800px; border-radius:15px;" />
           </div>
           <span class="close-btn"  onclick="hidePopup(this)">&#10006;</span>
          </div>
          @elseif (Str::endsWith($attachment, ['.pdf']))
          <!-- Display PDF -->
          <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach" />
          <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download</a>
          @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
          <!-- Display Excel Sheet -->
          <div class="preview-excel" style="text-align: center;">
           <p>Excel Sheet Name:
            {{ pathinfo($attachment)['basename'] }}
           </p>
           <a href="{{ asset($attachment) }}">Download</a>
          </div>
          @else
          <span class="preview-default-text">Preview</span>
          @endif
         </div>
         @endforeach
        </div>
       </div>
       @else
       <p class="text-center text-secondary">Image not found</p>
       @endif
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h5 class="fs-6 tabconhd">CNIC Back:</h5>
       @if ($rental && $rental->plaza_back)
       <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
         @php
         $attachments = explode(',', $rental->plaza_back);
         @endphp
         @foreach ($attachments as $attachment)
         <div style="padding: 10px; position: relative;">
          @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
          <!-- Display Image -->
          <img src="{{ asset($attachment) }}" alt="Image Preview" onclick="showPopup(this)" class="cnicimgs imgclickable">

          <!-- Delete Button -->
          <a href="{{ route('admin.deleteRentalImage', ['id' => $rental->id, 'column' => 'plaza_back', 'file']) }}" onclick="return confirm('Are you sure you want to delete this image?')" class="delimage">x</a>

          <div class="popup" >
           <div style="position: relative; display: inline-block;">
            <img src="{{ asset($attachment) }}" style="height: 500px; width: 800px; border-radius:15px;" />
           </div>
           <span class="close-btn"  onclick="hidePopup(this)">&#10006;</span>
          </div>
          @elseif (Str::endsWith($attachment, ['.pdf']))
          <!-- Display PDF -->
          <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach" />
          <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download</a>
          @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
          <!-- Display Excel Sheet -->
          <div class="preview-excel" style="text-align: center;">
           <p>Excel Sheet Name:
            {{ pathinfo($attachment)['basename'] }}
           </p>
           <a href="{{ asset($attachment) }}">Download</a>
          </div>
          @else
          <span class="preview-default-text">Preview</span>
          @endif
         </div>
         @endforeach
        </div>
       </div>
       @else
       <p class="text-center text-secondary">Image not found</p>
       @endif
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h5 class="fs-6 tabconhd">Attachment:</h5>
       @if ($rental && $rental->plaza_attach)
       <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
         @php
         $attachments = explode(',', $rental->plaza_attach);
         @endphp
         @foreach ($attachments as $attachment)
         <div style="padding: 10px; position: relative;">
          @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
          <!-- Display Image -->
          <img src="{{ asset($attachment) }}" alt="Image Preview" onclick="showPopup(this)" class="cnicimgs imgclickable">

          <!-- Delete Button -->
          <a href="{{ route('admin.deleteRentalImage', ['id' => $rental->id, 'column' => 'plaza_attach', 'file']) }}" onclick="return confirm('Are you sure you want to delete this image?')" class="delimage">x</a>

          <div class="popup" class="popup">
           <div style="position: relative; display: inline-block;">
            <img src="{{ asset($attachment) }}" style="height: 500px; width: 800px; border-radius:15px;" />
           </div>
           <span class="close-btn"  onclick="hidePopup(this)">&#10006;</span>
          </div>
          @elseif (Str::endsWith($attachment, ['.pdf']))
          <!-- Display PDF -->
          <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach" />
          <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download</a>
          @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
          <!-- Display Excel Sheet -->
          <div class="preview-excel" style="text-align: center;">
           <p>Excel Sheet Name:
            {{ pathinfo($attachment)['basename'] }}
           </p>
           <a href="{{ asset($attachment) }}">Download</a>
          </div>
          @else
          <span class="preview-default-text">Preview</span>
          @endif
         </div>
         @endforeach
        </div>
       </div>
       @else
       <p class="text-center text-secondary">Image not found</p>
       @endif
      </div>
     </div>
    </div>

    {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ In Charge of the property ////////////////////////////////////////////   --}}
    <div class="tab-pane fade" id="v-pills-iotp" role="tabpanel" aria-labelledby="v-pills-iotp-tab" tabindex="0">
     <div class="container row">
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Name:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->inc_name }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Employee ID:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->inc_id }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Designation:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->inc_desig }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Cell Number:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->inc_cell }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Email:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->inc_email }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h5 class="fs-6 tabconhd">Attachment:</h5>
       @if ($rental && $rental->inc_atatch)
       <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
         @php
         $attachments = explode(',', $rental->inc_atatch);
         @endphp
         @foreach ($attachments as $attachment)
         <div style="padding: 10px; position: relative;">
          @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
          <!-- Display Image -->
          <img src="{{ asset($attachment) }}" alt="Image Preview" onclick="showPopup(this)" class="cnicimgs imgclickable">

          <!-- Delete Button -->
          <a href="{{ route('admin.deleteRentalImage', ['id' => $rental->id, 'column' => 'inc_atatch', 'file']) }}" onclick="return confirm('Are you sure you want to delete this image?')" class="delimage">x</a>

          <div class="popup" >
           <div style="position: relative; display: inline-block;">
            <img src="{{ asset($attachment) }}" style="height: 500px; width: 800px; border-radius:15px;" />
           </div>
           <span class="close-btn"  onclick="hidePopup(this)">&#10006;</span>
          </div>
          @elseif (Str::endsWith($attachment, ['.pdf']))
          <!-- Display PDF -->
          <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach" />
          <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download</a>
          @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
          <!-- Display Excel Sheet -->
          <div class="preview-excel" style="text-align: center;">
           <p>Excel Sheet Name:
            {{ pathinfo($attachment)['basename'] }}
           </p>
           <a href="{{ asset($attachment) }}">Download</a>
          </div>
          @else
          <span class="preview-default-text">Preview</span>
          @endif
         </div>
         @endforeach
        </div>
       </div>
       @else
       <p class="text-center text-secondary">Image not found</p>
       @endif
      </div>
     </div>
    </div>
    {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ Property Owner Details //////////////////////////////////////////////// --}}
    <div class="tab-pane fade " id="v-pills-pod" role="tabpanel" aria-labelledby="v-pills-pod-tab" tabindex="0">
     <div class="container row">
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Owner Name:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->owner_name }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Owner CNIC No:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->owner_cnic }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Owner Cell No:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->owner_cell }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Owner Bank Name:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->owner_bank }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Owner Account Title:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->owner_acc }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <div class="row">
        <div class="col">
         <h6 class="fs-6 mt-1 d-inline tabconhd">Owner Account Number:</h6>
        </div>
        <div class="col">
         <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->owner_acc_no }}
         </p>
        </div>
       </div>
       {{-- <h6 class="fs-5 mt-1 d-inline">Owner Account Number:</h6>
                    <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$rental->owner_acc_no}}</p> --}}
      </div>

      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h5 class="fs-6 tabconhd">CNIC Front:</h5>
       @if ($rental && $rental->owner_front)
       <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
         @php
         $attachments = explode(',', $rental->owner_front);
         @endphp
         @foreach ($attachments as $attachment)
         <div style="padding: 10px; position: relative;">
          @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
          <!-- Display Image -->
          <img src="{{ asset($attachment) }}" alt="Image Preview" onclick="showPopup(this)" class="cnicimgs imgclickable">

          <!-- Delete Button -->
          <a href="{{ route('admin.deleteRentalImage', ['id' => $rental->id, 'column' => 'owner_front', 'file']) }}" onclick="return confirm('Are you sure you want to delete this image?')" class="delimage">x</a>

          <!-- Popup -->
          <div class="popup" class="popup">
           <div style="position: relative; display: inline-block;">
            <img src="{{ asset($attachment) }}" style="height: 500px; width: 800px; border-radius:15px;" />
           </div>
           <span class="close-btn"  onclick="hidePopup(this)">&#10006;</span>
          </div>
          @elseif (Str::endsWith($attachment, ['.pdf']))
          <!-- Display PDF -->
          <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach" />
          <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download</a>
          @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
          <!-- Display Excel Sheet -->
          <div class="preview-excel" style="text-align: center;">
           <p>Excel Sheet Name:
            {{ pathinfo($attachment)['basename'] }}
           </p>
           <a href="{{ asset($attachment) }}">Download</a>
          </div>
          @else
          <span class="preview-default-text">Preview</span>
          @endif
         </div>
         @endforeach
        </div>
       </div>
       @else
       <p class="text-center text-secondary">Image not found</p>
       @endif
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h5 class="fs-6 tabconhd">CNIC Back:</h5>
       @if ($rental && $rental->owner_back)
       <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
         @php
         $attachments = explode(',', $rental->owner_back);
         @endphp
         @foreach ($attachments as $attachment)
         <div style="padding: 10px; position: relative;">
          @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
          <!-- Display Image -->
          <img src="{{ asset($attachment) }}" alt="Image Preview" onclick="showPopup(this)" class="cnicimgs imgclickable">

          <!-- Delete Button -->
          <a href="{{ route('admin.deleteRentalImage', ['id' => $rental->id, 'column' => 'owner_back', 'file']) }}" onclick="return confirm('Are you sure you want to delete this image?')" class="delimage">x</a>

          <!-- Popup -->
          <div class="popup" >
           <div style="position: relative; display: inline-block;">
            <img src="{{ asset($attachment) }}" style="height: 500px; width: 800px; border-radius:15px;" />
           </div>
           <span class="close-btn"  onclick="hidePopup(this)">&#10006;</span>
          </div>
          @elseif (Str::endsWith($attachment, ['.pdf']))
          <!-- Display PDF -->
          <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach" />
          <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download</a>
          @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
          <!-- Display Excel Sheet -->
          <div class="preview-excel" style="text-align: center;">
           <p>Excel Sheet Name:
            {{ pathinfo($attachment)['basename'] }}
           </p>
           <a href="{{ asset($attachment) }}">Download</a>
          </div>
          @else
          <span class="preview-default-text">Preview</span>
          @endif
         </div>
         @endforeach
        </div>
       </div>
       @else
       <p class="text-center text-secondary">Image not found</p>
       @endif
      </div>
     </div>
    </div>
    {{-- /////////////////////////////////////////////// Utility Bills \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
    <div class="tab-pane fade" id="v-pills-ub" role="tabpanel" aria-labelledby="v-pills-ub-tab" tabindex="0">
     <div class="container row">
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Electric Meter Reading:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->electric }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Gas Meter Reading:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->gas }}</p>
      </div>

      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       @if ($rental && $rental->elec_attach)
       <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
         @php
         $attachments = explode(',', $rental->elec_attach);
         @endphp
         @foreach ($attachments as $attachment)
         <div style="padding: 10px; position: relative;">
          @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
          <!-- Display Image -->
          <img src="{{ asset($attachment) }}" alt="Image Preview" onclick="showPopup(this)" class="cnicimgs imgclickable">

          <!-- Delete Button -->
          <a href="{{ route('admin.deleteRentalImage', ['id' => $rental->id, 'column' => 'elec_attach', 'file']) }}" onclick="return confirm('Are you sure you want to delete this image?')" class="delimage">x</a>

          <!-- Popup -->
          <div class="popup" class="popup">
           <div style="position: relative; display: inline-block;">
            <img src="{{ asset($attachment) }}" style="height: 500px; width: 800px; border-radius:15px;" />
           </div>
           <span class="close-btn"  onclick="hidePopup(this)">&#10006;</span>
          </div>
          @elseif (Str::endsWith($attachment, ['.pdf']))
          <!-- Display PDF -->
          <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach" />
          <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download</a>
          @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
          <!-- Display Excel Sheet -->
          <div class="preview-excel" style="text-align: center;">
           <p>Excel Sheet Name:
            {{ pathinfo($attachment)['basename'] }}
           </p>
           <a href="{{ asset($attachment) }}">Download</a>
          </div>
          @else
          <span class="preview-default-text">Preview</span>
          @endif
         </div>
         @endforeach
        </div>
       </div>
       @else
       <p class="text-center text-secondary">Image not found</p>
       @endif
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       @if ($rental && $rental->gas_attach)
       <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
         @php
         $attachments = explode(',', $rental->gas_attach);
         @endphp
         @foreach ($attachments as $attachment)
         <div style="padding: 10px; position: relative;">
          @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
          <!-- Display Image -->
          <img src="{{ asset($attachment) }}" alt="Image Preview" onclick="showPopup(this)" class="cnicimgs imgclickable">

          <!-- Delete Button -->
          <a href="{{ route('admin.deleteRentalImage', ['id' => $rental->id, 'column' => 'gas_attach', 'file']) }}" onclick="return confirm('Are you sure you want to delete this image?')" class="delimage">x</a>

          <!-- Popup -->
          <div class="popup" >
           <div style="position: relative; display: inline-block;">
            <img src="{{ asset($attachment) }}" style="height: 500px; width: 800px; border-radius:15px;" />
           </div>
           <span class="close-btn"  onclick="hidePopup(this)">&#10006;</span>
          </div>
          @elseif (Str::endsWith($attachment, ['.pdf']))
          <!-- Display PDF -->
          <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach" />
          <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download</a>
          @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
          <!-- Display Excel Sheet -->
          <div class="preview-excel" style="text-align: center;">
           <p>Excel Sheet Name:
            {{ pathinfo($attachment)['basename'] }}
           </p>
           <a href="{{ asset($attachment) }}">Download</a>
          </div>
          @else
          <span class="preview-default-text">Preview</span>
          @endif
         </div>
         @endforeach
        </div>
       </div>
       @else
       <p class="text-center text-secondary">Image not found</p>
       @endif
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Date of Moving in:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->mov_in }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Date of Moving out:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->mov_out }}</p>
      </div>

      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h5 class="fs-6 tabconhd">Last Copy Of Paid Bill:</h5>
       <h5 class="fs-6 tabconhd">Attachment:</h5>
       @if ($rental && $rental->last_bill)
       <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
         @php
         $attachments = explode(',', $rental->last_bill);
         @endphp
         @foreach ($attachments as $attachment)
         <div style="padding: 10px; position: relative;">
          @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
          <!-- Display Image -->
          <img src="{{ asset($attachment) }}" alt="Image Preview" onclick="showPopup(this)" class="cnicimgs imgclickable">

          <!-- Delete Button -->
          <a href="{{ route('admin.deleteRentalImage', ['id' => $rental->id, 'column' => 'last_bill', 'file']) }}" onclick="return confirm('Are you sure you want to delete this image?')" class="delimage">x</a>

          <!-- Popup -->
          <div class="popup" >
           <div style="position: relative; display: inline-block;">
            <img src="{{ asset($attachment) }}" style="height: 500px; width: 800px; border-radius:15px;" />
           </div>
           <span class="close-btn"  onclick="hidePopup(this)">&#10006;</span>
          </div>
          @elseif (Str::endsWith($attachment, ['.pdf']))
          <!-- Display PDF -->
          <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach" />
          <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download</a>
          @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
          <!-- Display Excel Sheet -->
          <div class="preview-excel" style="text-align: center;">
           <p>Excel Sheet Name:
            {{ pathinfo($attachment)['basename'] }}
           </p>
           <a href="{{ asset($attachment) }}">Download</a>
          </div>
          @else
          <span class="preview-default-text">Preview</span>
          @endif
         </div>
         @endforeach
        </div>
       </div>
       @else
       <p class="text-center text-secondary">Image not found</p>
       @endif
      </div>
     </div>
    </div>
    {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ Rental Payment Details ///////////////////////////////////////////// --}}
    <div class="tab-pane fade" id="v-pills-rpd" role="tabpanel" aria-labelledby="v-pills-rpd-tab" tabindex="0">
     <div class="container row">
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">RP No:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->rental_number }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Amount of Advance:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->amount_advance }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Instrument No:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->instrument_no }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Voucher No:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->voucher_no }}</p>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h6 class="fs-6 mt-1 d-inline tabconhd">Name of Bank:</h6>
       <p class="my-auto fs-6  d-inline ml-4 tabconpara">{{ $rental->name_bank }}</p>
      </div>
      <div class="col-lg-12 col-md-12 col-12 mt-2 mt-md-3 mt-lg-5">
       <h5 class="fs-6 mt-1 d-inline tabconhd">Notes:</h5>
       <textarea class="nav6ta d-inline mt-1" placeholder="{{ $rental->rental_notes }}"></textarea>
      </div>
      <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5">
       <h5 class="fs-6 tabconhd">Attachment:</h5>
       @if ($rental && $rental->rental_pic)
       <div class="col-lg-5 spacing-right" style="margin-left:-28px;">
        <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
         @php
         $attachments = explode(',', $rental->rental_pic);
         @endphp
         @foreach ($attachments as $attachment)
         <div style="padding: 10px; position: relative;">
          @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
          <!-- Display Image -->
          <img src="{{ asset($attachment) }}" alt="Image Preview" onclick="showPopup(this)" class="cnicimgs imgclickable">

          <!-- Delete Button -->
          <a href="{{ route('admin.deleteRentalImage', ['id' => $rental->id, 'column' => 'rental_pic', 'file']) }}" onclick="return confirm('Are you sure you want to delete this image?')" class="delimage">x</a>

          <!-- Popup -->
          <div class="popup" style="">
           <div style="position: relative; display: inline-block;">
            <img src="{{ asset($attachment) }}" style="height: 500px; width: 800px; border-radius:15px;" />
           </div>
           <span class="close-btn"  onclick="hidePopup(this)">&#10006;</span>
          </div>
          @elseif (Str::endsWith($attachment, ['.pdf']))
          <!-- Display PDF -->
          <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach" />
          <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download</a>
          @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
          <!-- Display Excel Sheet -->
          <div class="preview-excel" style="text-align: center;">
           <p>Excel Sheet Name:
            {{ pathinfo($attachment)['basename'] }}
           </p>
           <a href="{{ asset($attachment) }}">Download</a>
          </div>
          @else
          <span class="preview-default-text">Preview</span>
          @endif
         </div>
         @endforeach
        </div>
       </div>
       @else
       <p class="text-center text-secondary">Image not found</p>
       @endif
      </div>

      <div class="col-12 mt-5" id="rentalamountsdata">
       <table class="table">
        <thead>
         <tr>
          <th scope="col" class="fs-6 tabconhd">Rental Amount</th>
          <th scope="col" class="fs-6 tabconhd">Rental Execution Date</th>
          <th scope="col" class="fs-6 tabconhd">Rental End Date</th>
          <th scope="col" class="fs-6 tabconhd">Rental Attachment</th>
         </tr>
        </thead>
        <tbody>
         @foreach ($rentals->rentalamounts as $index => $amounts)
         <tr>
          <input type="hidden" name="rentalmaounts[{{ $index }}][rental_id]" value="{{ $amounts->id }}">
          <td><input class="form-control aminp fs-6 tabconpara fw-bold" readonly name="rentalamounts[{{ $index }}][rental_amount]" value="{{ $amounts->rental_amount }}" type="text" placeholder="..." style="width: 100%;"></td>
          <td> <input class="form-control aminp fs-6 tabconpara fw-bold" readonly name="rentalamounts[{{ $index }}][agreement_execution_date]" value="{{ $amounts->agreement_execution_date }}" type="text" placeholder="..." style="width: 100%;"></td>
          <td><input class="form-control aminp fs-6 tabconpara fw-bold" readonly type="text" name="rentalamounts[{{ $index }}][agreement_end_date]" value="{{ $amounts->agreement_end_date }}" placeholder="..." style="width: 100%;"></td>
          <td>
           @if ($amounts && $amounts->agreement_attachment)
           <div class="preview-container" id="previewContainer" style="display: flex; flex-direction: row; align-items: center;">
            @if ($amounts->agreement_attachment)
            @php
            $attachments = explode(
            ',',
            $amounts->agreement_attachment,
            );
            @endphp
            @foreach ($attachments as $attachment)
            <div style="padding: 10px;">
             @if (Str::endsWith($attachment, ['.jpg', '.jpeg', '.png', '.gif', '.bmp']))
             <!-- Display Image -->
             <img src="{{ asset($attachment) }}" alt="Image Preview" onclick="showPopup(this)" class="cnicimgs1 imgclickable">

             <div class="popup" >

              <div style="position: relative; display: inline-block;">
               <img src="{{ asset($attachment) }}" style="height: 500px; width: 800px; border-radius:15px;" />
              </div>
              <span class="close-btn"  onclick="hidePopup(this)">&#10006;</span>
             </div>
             @elseif (Str::endsWith($attachment, ['.pdf']))
             <!-- Display PDF -->
             <embed src="{{ asset($attachment) }}" type="application/pdf" class="pdfattach" />
             <a href="{{ asset($attachment) }}" target="_blank" rel="noopener noreferrer">Download</a>
             @elseif (Str::endsWith($attachment, ['.xls', '.xlsx', '.csv']))
             <!-- Display Excel Sheet -->
             <div class="preview-excel" style="text-align: center;">
              <p>Excel Sheet Name:
               {{ pathinfo($attachment)['basename'] }}
              </p>
              <a href="{{ asset($attachment) }}">Download</a>
             </div>
             @else
             <span class="preview-default-text">Preview</span>
             @endif
            </div>
            @endforeach
            @else
            <span class="preview-default-text">Attachment not
             found</span>
            @endif
           </div>
           @else
           <p class="text-center text-secondary">Image not found</p>
           @endif
          </td>
         </tr>
         @endforeach
        </tbody>
       </table>

      </div>

     </div>
    </div>

   </div>

</div>

</form>
</section>
</div>
@include('layouts.footer')

<script>
 function showPopup(icon) {
     const popup = icon.nextElementSibling;
     popup.style.display = "block";
 }

 function hidePopup(button) {
     const popup = button.parentNode;
     popup.style.display = "none";
 }
</script>
