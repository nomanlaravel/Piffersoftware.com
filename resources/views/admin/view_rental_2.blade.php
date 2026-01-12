@include('layouts.header')

@yield('main')

 <!--End of the Navbar-->

    <!--Customer Form-->
    <link rel="stylesheet" href="css/mBox.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="jquery-3.7.1.min.js"></script>
    <div class="customer_form" >

        <div id="main" style="margin-left: 92%;">
        <button class="openbtn" onclick="openNav()">☰</button>
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
            .body{
                background-color: #F6F7F8 !important;
            }
            .rentaltabnav{
        
            }
            .tabbtn{
                font-size: 1.3rem;
                width: 300px;
                padding: 20px 0px;
            }
            .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
            background-color: #320056 !important;
           }
           input:disabled{
            background: white !important;
            border-radius: 10px !important;
            padding: 15px;
            font-size: 0.9rem;
            width: 380px;
            height: 40px !important;           
           }
           .nav1ta{
            background: #F6F7F8 !important;
            border-radius: 10px !important;
            border: 0px solid white;
            padding-top: 5px;
            height: 90px !important;
            width: 390px;
            resize: none;
            display: block;
           }
           
           .nav6ta{
            background: #F6F7F8  !important;
            border-radius: 10px !important;
            border: 0px solid white;
            padding-top: 5px;
            height: 100px !important;
            display: block;
            min-width: 760px;
            resize: none;
           }
           .propimg{
            border-radius: 50%;
            height: 150px;
            width: 150px;
           }
           .cnicimgs{
            border-radius: 5%;
            max-height: 10em;
           }
           .tab-content{
           min-height: 600px;
           }
           @media only screen and (max-width: 600px) {
            input:disabled{
            background: #F6F7F8 !important;
            border-radius: 10px !important;
            padding: 15px;
            font-size: 0.9rem;
            width: 220px;
            height: 25px !important;           
           }
           .nav6ta{
            background: white !important;
            border-radius: 10px !important;
            padding: 15px;
            height: 150px !important;
            width: 220px;
            min-width: 150px;
            resize: none;
           }
           .propimg{
            border-radius: 50%;
            max-height: 10em;
           }
           .cnicimgs{
            border-radius: 5%;
            max-height: 10em;
           }
           .tab-content{
            min-height: 600px !important;
           }
            }
        </style>
    

<section class="my-5 px-lg-0 px-md-0 px-2 py-lg-0 py-md-0 py-2">
    <form  enctype="multipart/form-data">
    @csrf    
    <div class="d-flex p-2 align-items-center" style="background-color:#F6F7F8; border:2px solid rgb(231, 231, 231);border-radius:15px;">
        {{-- //////////////////    Tabs Navigation Menu   \\\\\\\\\\\\\ --}}
        <div class="nav  flex-column nav-pills me-3 rentaltabnav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="nav-link active px-5 tabbtn" id="v-pills-basicdetails-tab" data-bs-toggle="pill" data-bs-target="#v-pills-basicdetails" type="button" role="tab" aria-controls="v-pills-basicdetails" aria-selected="true">Basic Details</button>
          <button class="nav-link  tabbtn" id="v-pills-address-tab" data-bs-toggle="pill" data-bs-target="#v-pills-address" type="button" role="tab" aria-controls="v-pills-address" aria-selected="false">Address</button>
          <button class="nav-link  tabbtn" id="v-pills-pcd-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pcd" type="button" role="tab" aria-controls="v-pills-pcd" aria-selected="false">Property Caretaker Details</button>
          <button class="nav-link  tabbtn" id="v-pills-pmd-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pmd" type="button" role="tab" aria-controls="v-pills-pmd" aria-selected="false" >Plaza Management Details</button>
          <button class="nav-link  tabbtn" id="v-pills-iotp-tab" data-bs-toggle="pill" data-bs-target="#v-pills-iotp" type="button" role="tab" aria-controls="v-pills-iotp" aria-selected="false">In Charge of the Property</button>
          <button class="nav-link  tabbtn" id="v-pills-pod-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pod" type="button" role="tab" aria-controls="v-pills-pod" aria-selected="false">Property Owner Details</button>
          <button class="nav-link  tabbtn" id="v-pills-ub-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ub" type="button" role="tab" aria-controls="v-pills-ub" aria-selected="false">Utility Bills</button>
          <button class="nav-link  tabbtn" id="v-pills-rpd-tab" data-bs-toggle="pill" data-bs-target="#v-pills-rpd" type="button" role="tab" aria-controls="v-pills-rpd" aria-selected="false">Rental Payment Details</button>
        </div>

        {{-- ////////////////   Tab Content \\\\\\\\\\\\\\\\\ --}}
        <div class="tab-content  py-2 rentaltabcontent " id="v-pills-tabContent">
            
             
            {{-- //////////////////////////// Basic Details Content \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\   --}}                  
          <div class="tab-pane  fade show active"  id="v-pills-basicdetails" role="tabpanel" aria-labelledby="v-pills-basicdetails-tab" tabindex="0">
                
             <div class="row mb-2">
                <div class="col-lg-6 spacing-left mt-1">
                    RP Number <br> <input class="form-control mt-1" id="rp_no" name="rp_no" value="{{ $rentals->rp_no }}" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                    Type of Property <br> <input class="form-control mt-1" id="type" vl name="type" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left">
                    Description of Property <br> <input class="form-control mt-1" id="desc" value="{{ $rentals->desc }}" name="desc" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left spacing-right mt-2">
                    Branch ID <br> <input class="form-control mt-1" id="" name="branch" value="{{ $rentals->branch }}" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-left spacing-right mt-2">
                    Reporting to <br> <input class="form-control mt-1" id="" name="report_to" value="{{ $rentals->report_to }}" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-6 spacing-left spacing-right mt-2">
                    Picture of Property <br> <input class="form-control mt-1" id="" value="{{ $rentals->pic }}" name="pic" type="file" placeholder="..." style="width: 100%;"><div class="col-lg-4 spacing-right">
                <!--Image Preview Biometric-->
                <div class="image-preview4" id="imagePreview4">
                    <img src="" alt="Image Preview4" class="image-preview__image4" style="height: 30%; width:30%;">
                    <span class="image-preview__default-text4"> Image Preview </span>
                </div>
                
             </div>
            </div>
             </div>
          </div>
           {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ Address ////////////////////////////////////////////// --}}
           <div class="tab-pane fade" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-address-tab" tabindex="0">
            
          </div>

            {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ Property Care taker Details  ////////////////////////////////// --}}
          <div class="tab-pane fade" id="v-pills-pcd" role="tabpanel" aria-labelledby="v-pills-pcd-tab" tabindex="0">
                                                        
          </div>
           {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\  Plaza Management Details  //////////////////////////////////////////// --}}                
          <div class="tab-pane fade" id="v-pills-pmd" role="tabpanel" aria-labelledby="v-pills-pmd-tab" tabindex="0">
                          
          </div>
        {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ In Charge of the property ////////////////////////////////////////////   --}}
          <div class="tab-pane fade" id="v-pills-iotp" role="tabpanel" aria-labelledby="v-pills-iotp-tab" tabindex="0">
            
        </div>
            {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ Property Owner Details //////////////////////////////////////////////// --}}
          <div class="tab-pane fade " id="v-pills-pod" role="tabpanel" aria-labelledby="v-pills-pod-tab" tabindex="0">
                  
          </div>
          {{-- /////////////////////////////////////////////// Utility Bills \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
          <div class="tab-pane fade" id="v-pills-ub" role="tabpanel" aria-labelledby="v-pills-ub-tab" tabindex="0">
                  
          </div>
          {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ Rental Payment Details ///////////////////////////////////////////// --}}
          <div class="tab-pane fade" id="v-pills-rpd" role="tabpanel" aria-labelledby="v-pills-rpd-tab" tabindex="0">
          
          </div>

          
          

     

         
      
      
          
        </div>
      
      </div>
      
    </form>
</section>
</div>
@include('layouts.footer')

