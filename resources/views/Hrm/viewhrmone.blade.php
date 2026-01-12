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
                background-color: #efefef !important;
                
                border-radius: 15px !important;
            }
            .tabbtn{
                font-size: 1.1rem;
                width: 300px;
                padding: 10px 0px;
                border-radius: 10px !important;
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
           .nav1ta2{
            background: white !important;
            border-radius: 10px !important;
            border: 0px solid white;
            padding-top: 5px;
            height: 80px !important;
            width: 500px;
            resize: none;
            display: block;
            
           }
          .imgclickable:hover{
            opacity: 0.9;
          }
          .pdfattach{
            border-radius: 5%;
            max-height: 10em;
            max-width: 10em;
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
            max-height: 9em;
           }
           .cnicimgs1{
            border-radius: 5%;
            height: 100px;
            width: 130px;
           }
           .tab-content{
           min-height: 600px;
           }
           .aminp{
            border: 0px solid black !important;
            background: none !important;
            height: 20px !important;
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
    

<section class="my-3 px-lg-0 px-md-0 px-2 py-lg-0 py-md-0 py-2">
   
    <form  enctype="multipart/form-data">
    @csrf    
    <div class="d-flex  " style="background-color:#F6F7F8; border:2px solid rgb(231, 231, 231);border-radius:15px;">

        {{-- //////////////////    Tabs Navigation Menu   \\\\\\\\\\\\\ --}}
        <div class="nav  flex-column nav-pills me-3 rentaltabnav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="nav-link active px-5 tabbtn" id="v-pills-ss-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ss" type="button" role="tab" aria-controls="v-pills-ss" aria-selected="true">Secuirty Staff</button>
          <button class="nav-link  tabbtn" id="v-pills-bi-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bi" type="button" role="tab" aria-controls="v-pills-bi" aria-selected="false">Basic Info</button>
          <button class="nav-link  tabbtn" id="v-pills-ad-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ad" type="button" role="tab" aria-controls="v-pills-ad" aria-selected="false">Address Details</button>
          <button class="nav-link  tabbtn" id="v-pills-vr-tab" data-bs-toggle="pill" data-bs-target="#v-pills-vr" type="button" role="tab" aria-controls="v-pills-vr" aria-selected="false" >Verifications</button>
          <button class="nav-link  tabbtn" id="v-pills-ehwe-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ehwe" type="button" role="tab" aria-controls="v-pills-ehwe" aria-selected="false">Education, Health & Work Experience</button>
          <button class="nav-link  tabbtn" id="v-pills-cmp-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cmp" type="button" role="tab" aria-controls="v-pills-cmp" aria-selected="false">Compliances</button>
          <button class="nav-link  tabbtn" id="v-pills-irc-tab" data-bs-toggle="pill" data-bs-target="#v-pills-irc" type="button" role="tab" aria-controls="v-pills-irc" aria-selected="false">Inventory Record Card</button>
          <button class="nav-link  tabbtn" id="v-pills-sgl-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sgl" type="button" role="tab" aria-controls="v-pills-sgl" aria-selected="false">Security Guard License</button>

          <button class="nav-link  tabbtn" id="v-pills-td-tab" data-bs-toggle="pill" data-bs-target="#v-pills-td" type="button" role="tab" aria-controls="v-pills-td" aria-selected="false">Training Details</button>
          <button class="nav-link  tabbtn" id="v-pills-p-tab" data-bs-toggle="pill" data-bs-target="#v-pills-p" type="button" role="tab" aria-controls="v-pills-p" aria-selected="false">Payroll</button>
          <button class="nav-link  tabbtn" id="v-pills-si-tab" data-bs-toggle="pill" data-bs-target="#v-pills-si" type="button" role="tab" aria-controls="v-pills-si" aria-selected="false">Site Inspection</button>
          <button class="nav-link  tabbtn" id="v-pills-oa-tab" data-bs-toggle="pill" data-bs-target="#v-pills-oa" type="button" role="tab" aria-controls="v-pills-oa" aria-selected="false">Observation and Appraisal</button>
        </div>

        {{-- ////////////////   Tab Content \\\\\\\\\\\\\\\\\ --}}
        <div class="tab-content  py-2 rentaltabcontent d-flex flex-row  align-items-center" id="v-pills-tabContent" >
           
             
            {{-- //////////////////////////// Security Staff \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\   --}}                  
             <div class="tab-pane  fade show active "  id="v-pills-ss" role="tabpanel" aria-labelledby="v-pills-ss-tab" tabindex="0">
                <div class="container row ">
                    <div class="col-12 d-flex flex-row justify-content-center mt-1 mt-md-3 mt-lg-5">
                          {{-- // Pop up image --}}
                        @if($hrm && $hrm->photo)
                            
                        <img src="{{asset($hrm->photo)}}" class="cnicimgs imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                        <div class="popup" style=" display: none;
                            position: fixed;
                            top: 50%;
                            left: 60%;
                            transform: translate(-50%, -50%);
                            background-color: white;
                            
                            border: 0px solid #E7E7E7;
                            border-radius:15px;
                            z-index: 9999;
                            width: 800px;
                            background:none !important;
                            ">
                        <div style="position: relative; display: inline-block;">
                            <img src="{{asset($hrm->photo)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                        </div>
                            <span class="close-btn" style="position: absolute;
                            top:5px;
                            right:15px;
                            cursor: pointer;
                            color:white;
                            font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                        </div>
                
                        @else
                        <p class="text-center text-secondary">No image available</p>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5  mb-3">    
                        <h6 class="fs-5 mt-1 d-inline">Name:</h6>
                        <p class="my-auto  fs-6 fw-normal d-inline ml-4">{{$hrm->name}}</p>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5  mb-3">
                        <h6 class="fs-5 mt-1 d-inline">Father Name:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->fname}}</p>         
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">     
                        <h6 class="fs-5 mt-1 d-inline">CNIC:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->cnic}}</p>           
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                   
                        <h6 class="fs-5 mt-1 d-inline">Employee No:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->employee_no}}</p>                   
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Cell Phone(Official):</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->cell}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4   mb-3">                
                        <h6 class="fs-5 mt-1 d-inline">Bank Name:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->bank}}</p>
                        {{-- <textarea class="nav1ta d-inline mt-1" placeholder="{{$hrm->bank}}"></textarea>                       --}}
                    </div>   
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Bank Account:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->bank_account}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Category:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->category}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Rank:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->rank}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Designation:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->designation}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Unit:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->unit}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Hired At:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->hired_at}}</p>                     
                    </div>       
                </div>
             </div>

            {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ Basic Info ////////////////////////////////////////////// --}}
            <div class="tab-pane fade" id="v-pills-bi" role="tabpanel" aria-labelledby="v-pills-bi-tab" tabindex="0">
                <div class="container row ">
                    
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5  mb-3">    
                        <h6 class="fs-5 mt-1 d-inline">Date of Birth:</h6>
                        <p class="my-auto  fs-6 fw-normal d-inline ml-4">{{$hrm->dob}}</p>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5  mb-3">
                        <h6 class="fs-5 mt-1 d-inline">Religion:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->religion}}</p>         
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">     
                        <h6 class="fs-5 mt-1 d-inline">Caste:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->caste}}</p>           
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                   
                        <h6 class="fs-5 mt-1 d-inline">Gender:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->gender}}</p>                   
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Cell No (personel):</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_cell}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4   mb-3">                
                        <h6 class="fs-5 mt-1 d-inline">Emergency Cell No:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->e_cell}}</p>                     
                    </div>   
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Blood Group:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->blood}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Email:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->email}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Marital Status:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->m_status}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">No. of Kids:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->no_of_kids}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Male Kids:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->m_kids}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Female Kids:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->f_kids}}</p>                     
                    </div>       
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">CNIC Issue Date:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->cnic_issue}}</p>                     
                    </div>       
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">CNIC Expiry Date:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->cnic_expire}}</p>                     
                    </div>       
                    <div class="col-6  mt-1 mt-md-3 mt-lg-4">
                        <h6 class="fs-5 mt-1 d-inline">CNIC Picture(Front):</h6>
                        {{-- // Pop up image --}}
                      @if($hrm && $hrm->cnic_front)
                          
                      <img src="{{asset($hrm->cnic_front)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                      <div class="popup" style=" display: none;
                          position: fixed;
                          top: 50%;
                          left: 60%;
                          transform: translate(-50%, -50%);
                          background-color: white;
                          
                          border: 0px solid #E7E7E7;
                          border-radius:15px;
                          z-index: 9999;
                          width: 800px;
                          background:none !important;
                          ">
                      <div style="position: relative; display: inline-block;">
                          <img src="{{asset($hrm->cnic_front)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                      </div>
                          <span class="close-btn" style="position: absolute;
                          top:5px;
                          right:15px;
                          cursor: pointer;
                          color:white;
                          font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                      </div>
              
                      @else
                      <p class="text-center text-secondary">No image available</p>
                      @endif
                        </div>
                        <div class="col-6  mt-1 mt-md-3 mt-lg-4">
                            <h6 class="fs-5 mt-1 d-inline">CNIC Picture(Back):</h6>
                            {{-- // Pop up image --}}
                        @if($hrm && $hrm->cnic_back)
                      
                        <img src="{{asset($hrm->cnic_back)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                        <div class="popup" style=" display: none;
                            position: fixed;
                            top: 50%;
                            left: 60%;
                            transform: translate(-50%, -50%);
                            background-color: white;
                            
                            border: 0px solid #E7E7E7;
                            border-radius:15px;
                            z-index: 9999;
                            width: 800px;
                            background:none !important;
                            ">
                        <div style="position: relative; display: inline-block;">
                            <img src="{{asset($hrm->cnic_back)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                        </div>
                            <span class="close-btn" style="position: absolute;
                            top:5px;
                            right:15px;
                            cursor: pointer;
                            color:white;
                            font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                        </div>
                
                        @else
                        <p class="text-center text-secondary">No image available</p>
                        @endif
                    </div>

                    <div class="col-6  mt-1 mt-md-3 mt-lg-4">
                        <h6 class="fs-5 mt-1 d-inline">Attachment:</h6>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->f_attach)
                        
                    <img src="{{asset($hrm->f_attach)}}" class="cnicimgs mt-2" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->f_attach)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Notes:</h6>
                        <textarea class="nav1ta d-inline mt-1" placeholder="{{$hrm->notes}}" disabled></textarea>                     
                    </div>      
                </div>
            </div>

                {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ Adress Details  ////////////////////////////////// --}}
            <div class="tab-pane fade" id="v-pills-ad" role="tabpanel" aria-labelledby="v-pills-ad-tab" tabindex="0">
                <div class="container row ">
                    <div class="col-lg-12 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  "> 
                        <h6 class="fs-3 mt-1 d-inline">Temporary Address</h6>
                    </div>
                    <div class="col-lg-12 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">    
                        <h6 class="fs-5 mt-1 d-inline">Address:</h6>
                        <p class="my-auto  fs-6 fw-normal d-inline ml-4">{{$hrm->t_address}}</p>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">
                        <h6 class="fs-5 mt-1 d-inline">Area:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->t_area}}</p>         
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">     
                        <h6 class="fs-5 mt-1 d-inline">City:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->t_city}}</p>           
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                   
                        <h6 class="fs-5 mt-1 d-inline">District:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->t_district}}</p>                   
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Post Office:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->t_post}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4   mb-3">                
                        <h6 class="fs-5 mt-1 d-inline">Tehsil:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->t_tehsil}}</p>                     
                    </div>   
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Province:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->t_province}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Postal Code:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->t_postal}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Residing Since:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->t_residing}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">GPS Location:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->t_gps}}</p>                     
                    </div>  
                    <div class="col-lg-12 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4   ">                                 
                        <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                        <textarea class="nav1ta d-inline mt-1" placeholder="{{$hrm->t_note}}" disabled></textarea>                     
                    </div>    
                    <div class="col-6  mt-1 mt-md-3 mt-lg-4 mb-3">
                        <h6 class="fs-5 mt-1 d-inline">Attachment:</h6> <br>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->t_attach)
                        
                    <img src="{{asset($hrm->t_attach)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->t_attach)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div>  

                    <div class="col-lg-12 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4 "> 
                        <h6 class="fs-3 mt-1 d-inline">Permanent Address</h6>
                    </div>
                    <div class="col-lg-12 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Address:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_address}}</p>                     
                    </div>  
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Area:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_area}}</p>                     
                    </div>       
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">City:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_city}}</p>                     
                    </div>       
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Police Station:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_police}}</p>                     
                    </div>       
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">District:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_district}}</p>                     
                    </div>       
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Post Office:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_post}}</p>                     
                    </div>       
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Tehsil:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_tehsil}}</p>                     
                    </div>       
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Province:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_province}}</p>                     
                    </div>       
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Postal Code:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_postal}}</p>                     
                    </div>       
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Residing Since:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_residing}}</p>                     
                    </div>       
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">GPS Location:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_gps}}</p>                     
                    </div>       
                    <div class="col-lg-12 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4 ">                                 
                        <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                        <textarea class="nav1ta d-inline mt-1" placeholder="{{$hrm->p_note}}" disabled></textarea>                     
                    </div>   
                    <div class="col-6  mt-1 mt-md-3 mt-lg-4">
                        <h6 class="fs-5 mt-1 d-inline">Attachment:</h6>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->p_attach)
                        
                    <img src="{{asset($hrm->p_attach)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->p_attach)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 

                    <div class="col-lg-12 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4 "> 
                        <h6 class="fs-3 mt-1 d-inline">Next of Kin</h6>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Name:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_gps}}</p>                     
                    </div> 
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">CNIC:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_gps}}</p>                     
                    </div> 
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Father Name:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_gps}}</p>                     
                    </div> 
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Relationship:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_gps}}</p>                     
                    </div> 
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">Death Certification:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_gps}}</p>                     
                    </div>  <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline" data-toggle="tooltip" data-placement="top" title="Family Registration Certificate">FRC:</h6>
                        
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->p_gps}}</p>                     
                    </div> 

                </div>
            </div>
            {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\  Verifications  //////////////////////////////////////////// --}}                
            <div class="tab-pane fade" id="v-pills-vr" role="tabpanel" aria-labelledby="v-pills-vr-tab" tabindex="0">
                <div class="container row ">
                    <div class="col-lg-12 col-md-6 col-12 mt-2 mt-md-3 mt-lg-4  "> 
                        {{-- /////////////////////  TYPES OF VERF \\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                        <h6 class="fs-3 mt-1 d-inline">Types of Verification</h6>
                    </div>
                    
                                            {{-- /////////////   Hiring  \\\\\\\\\\\\\\\\\\\\\ --}}
                    <div class="col-4  mt-1 mt-md-3 mt-lg-5 mb-3">
                        <h6 class="fs-5 mt-1 d-inline">Hiring Form:</h6> <br>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->h_verify)
                        
                    <img src="{{asset($hrm->h_verify)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->h_verify)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div>  

                    <div class="col-8 mt-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 ">                                 
                                <h6 class="fs-5 mt-1 d-inline">Look Back Period:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->look_back1}}</p>                     
                            </div> 
                            <div class="col-lg-6 col-md-6 col-12 ">                                 
                                <h6 class="fs-5 mt-1 d-inline">Frequency:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->frequency1}}</p>                     
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12 mt-lg-4 ">                                 
                                <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                                <textarea class="nav1ta2 d-inline mt-1" placeholder="{{$hrm->notes1}}" disabled></textarea>                     
                            </div> 
                        </div>
                    </div>  
                                            {{-- ///////////////////  Bio Metric \\\\\\\\\\\\\\\\\\\\\ --}}
                    <div class="col-4  mt-1 mt-md-3 mt-lg-5 mb-3">
                        <h6 class="fs-5 mt-1 d-inline">Biometric Verification:</h6>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->b_verify)
                        
                    <img src="{{asset($hrm->b_verify)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->b_verify)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                    <div class="col-8 mt-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 ">                                 
                                <h6 class="fs-5 mt-1 d-inline">Look Back Period:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->look_back2}}</p>                     
                            </div> 
                            <div class="col-lg-6 col-md-6 col-12 ">                                 
                                <h6 class="fs-5 mt-1 d-inline">Frequency:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->frequency2}}</p>                     
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12 mt-lg-4 ">                                 
                                <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                                <textarea class="nav1ta2 d-inline mt-1" placeholder="{{$hrm->notes2}}" disabled></textarea>                     
                            </div> 
                        </div>
                    </div>  
                                      {{-- //////////////////  Postal   \\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                    <div class="col-4  mt-1 mt-md-3 mt-lg-5 mb-3">
                        <h6 class="fs-5 mt-1 d-inline">Postal Verification:</h6>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->p_verify)
                        
                    <img src="{{asset($hrm->p_verify)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->p_verify)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                    <div class="col-8 mt-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Look Back Period:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->look_back3}}</p>                     
                            </div> 
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Frequency:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->frequency3}}</p>                     
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12 mt-lg-4">                                 
                                <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                                <textarea class="nav1ta2 d-inline mt-1" placeholder="{{$hrm->notes3}}" disabled></textarea>                     
                            </div> 
                        </div>
                    </div>  
                              {{-- ////////////////////// Discharge Book \\\\\\\\\\\\\\\\\\\\   --}}
                   
                    <div class="col-4  mt-1 mt-md-3 mt-lg-5 mb-3">
                        <h6 class="fs-5 mt-1 d-inline" data-toggle="tooltip" data-placement="top" title="Experience Certificate">Discharge Book:</h6> <br>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->d_book)
                        
                    <img src="{{asset($hrm->d_book)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->d_book)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                    <div class="col-8 mt-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Look Back Period:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->look_back4}}</p>                     
                            </div> 
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Frequency:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->frequency4}}</p>                     
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12 mt-lg-4">                                 
                                <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                                <textarea class="nav1ta2 d-inline mt-1" placeholder="{{$hrm->notes4}}" disabled></textarea>                     
                            </div> 
                        </div>
                    </div>  
                                {{-- /////////////////////////////  Vote Ver  \\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                    <div class="col-4  mt-1 mt-md-3 mt-lg-5 mb-3">
                        <h6 class="fs-5 mt-1 d-inline">Vote Cerification:</h6> <br>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->v_verify)
                        
                    <img src="{{asset($hrm->v_verify)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->v_verify)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                    <div class="col-8 mt-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Look Back Period:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->look_back5}}</p>                     
                            </div> 
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Frequency:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->frequency5}}</p>                     
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12 mt-lg-4">                                 
                                <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                                <textarea class="nav1ta2 d-inline mt-1" placeholder="{{$hrm->notes5}}" disabled></textarea>                     
                            </div> 
                        </div>
                    </div>  
                                        {{-- ////////////////   COLB   \\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                    <div class="col-4  mt-1 mt-md-3 mt-lg-5 mb-3">
                        <h6 class="fs-5 mt-1 d-inline">Copy of Last Bill:</h6> <br>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->copy_bill)
                        
                    <img src="{{asset($hrm->copy_bill)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->copy_bill)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                    <div class="col-8 mt-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Look Back Period:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->look_back6}}</p>                     
                            </div> 
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Frequency:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->frequency6}}</p>                     
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12 mt-lg-4">                                 
                                <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                                <textarea class="nav1ta2 d-inline mt-1" placeholder="{{$hrm->notes6}}" disabled></textarea>                     
                            </div> 
                        </div>
                    </div>  
                                {{-- ///////////////////////  NADRA \\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                    <div class="col-4  mt-1 mt-md-3 mt-lg-5 mb-3">
                        <h6 class="fs-5 mt-1 d-inline">NADRA Verfication:</h6> <br>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->n_verify)
                        
                    <img src="{{asset($hrm->n_verify)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->n_verify)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                    <div class="col-8 mt-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Look Back Period:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->look_back7}}</p>                     
                            </div> 
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Frequency:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->frequency7}}</p>                     
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12 mt-lg-4">                                 
                                <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                                <textarea class="nav1ta2 d-inline mt-1" placeholder="{{$hrm->notes7}}" disabled></textarea>                     
                            </div> 
                        </div>
                    </div>  
                                     {{-- ////////////////////////  EVS Ver  \\\\\\\\\\\\\\\\\\\\\\\\ --}}
                    <div class="col-4  mt-1 mt-md-3 mt-lg-5 mb-3">
                        <h6 class="fs-5 mt-1 d-inline">EVS Verification:</h6> <br>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->insurrance)
                        
                    <img src="{{asset($hrm->insurrance)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->insurrance)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                    <div class="col-8 mt-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Look Back Period:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->look_back8}}</p>                     
                            </div> 
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Frequency:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->frequency8}}</p>                     
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12 mt-lg-4">                                 
                                <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                                <textarea class="nav1ta2 d-inline mt-1" placeholder="{{$hrm->notes8}}" disabled></textarea>                     
                            </div> 
                        </div>
                    </div>  
                                    {{-- ////////////////////////   GBA    \\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                    <div class="col-4  mt-1 mt-md-3 mt-lg-5">
                        <h6 class="fs-5 mt-1 d-inline">Guard Bank Account:</h6> <br>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->guard_bank)
                        
                    <img src="{{asset($hrm->guard_bank)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->guard_bank)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                    <div class="col-8 mt-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 ">                                 
                                <h6 class="fs-5 mt-1 d-inline">Look Back Period:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->look_back9}}</p>                     
                            </div> 
                            <div class="col-lg-6 col-md-6 col-12 ">                                 
                                <h6 class="fs-5 mt-1 d-inline">Frequency:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->frequency9}}</p>                     
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12 mt-lg-4">                                 
                                <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                                <textarea class="nav1ta2 d-inline mt-1" placeholder="{{$hrm->notes9}}" disabled></textarea>                     
                            </div> 
                        </div>
                    </div>  
                            {{-- ////////////////////////////////////////     BMR \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                    <div class="col-4  mt-1 mt-md-3 mt-lg-5">
                        <h6 class="fs-5 mt-1 d-inline">Bio Metric Record:</h6> <br>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->bio_verify)
                        
                    <img src="{{asset($hrm->bio_verify)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->bio_verify)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                    <div class="col-8 mt-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 ">                                 
                                <h6 class="fs-5 mt-1 d-inline">Look Back Period:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->look_back10}}</p>                     
                            </div> 
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Frequency:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->frequency10}}</p>                     
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12 mt-lg-4 ">                                 
                                <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                                <textarea class="nav1ta2 d-inline mt-1" placeholder="{{$hrm->notes10}}" disabled></textarea>                     
                            </div> 
                        </div>
                    </div>  
                                        {{-- ////////////////////   Cov 19  \\\\\\\\\\\\\\\\\\\\\\\\ --}}
                    <div class="col-4  mt-1 mt-md-3 mt-lg-5">
                        <h6 class="fs-5 mt-1 d-inline">Covid-19 Vaccination:</h6> <br>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->c_verify)
                        
                    <img src="{{asset($hrm->c_verify)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->c_verify)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                    <div class="col-8 mt-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Look Back Period:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->look_back11}}</p>                     
                            </div> 
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Frequency:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->frequency11}}</p>                     
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12 mt-lg-4">                                 
                                <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                                <textarea class="nav1ta2 d-inline mt-1" placeholder="{{$hrm->notes11}}" disabled></textarea>                     
                            </div> 
                        </div>
                    </div>  
                                    {{-- ////////////////////////  DPO    \\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                   
                    <div class="col-4  mt-1 mt-md-3 mt-lg-5">
                        <h6 class="fs-5 mt-1 d-inline">DPO Verification:</h6> <br>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->dpo_verify)
                        
                    <img src="{{asset($hrm->dpo_verify)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->dpo_verify)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                    <div class="col-8 mt-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Look Back Period:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->look_back12}}</p>                     
                            </div> 
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Frequency:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->frequency12}}</p>                     
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12 mt-lg-4">                                 
                                <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                                <textarea class="nav1ta2 d-inline mt-1" placeholder="{{$hrm->notes12}}" disabled></textarea>                     
                            </div> 
                        </div>
                    </div>  

                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">DPO Form Sent:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->form_send}}</p>                     
                    </div> 
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">DPO Form Sent on:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->sent_on}}</p>                     
                    </div> 
                                      {{-- ////////////////////   DPO Form Sent \\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                    <div class="col-4  mt-1 mt-md-3 mt-lg-5 mb-3">
                        <h6 class="fs-5 mt-1 d-inline">DPO Form Sent:</h6> <br>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->form_attach)
                        
                    <img src="{{asset($hrm->form_attach)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->form_attach)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                    <div class="col-8 mt-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Look Back Period:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->look_back13}}</p>                     
                            </div> 
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Frequency:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->frequency13}}</p>                     
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12 mt-lg-4">                                 
                                <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                                <textarea class="nav1ta2 d-inline mt-1" placeholder="{{$hrm->notes13}}" disabled></textarea>                     
                            </div> 
                        </div>
                    </div>  

                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">DPO Form Received:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->for5_rec}}</p>                     
                    </div> 
                    <div class="col-lg-6 col-md-6 col-12 mt-2 mt-md-3 mt-lg-5  mb-3">                                 
                        <h6 class="fs-5 mt-1 d-inline">DPO Form Received on:</h6>
                        <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->rec_on}}</p>                     
                    </div> 
                                     {{-- ///////////////////// DPO Form Rec \\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                    <div class="col-4  mt-1 mt-md-3 mt-lg-5 mb-3">
                        <h6 class="fs-5 mt-1 d-inline">DPO Form Received:</h6> <br>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->rec_attach)
                        
                    <img src="{{asset($hrm->rec_attach)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->rec_attach)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                    <div class="col-8 mt-lg-5">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Look Back Period:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->look_back14}}</p>                     
                            </div> 
                            <div class="col-lg-6 col-md-6 col-12">                                 
                                <h6 class="fs-5 mt-1 d-inline">Frequency:</h6>
                                <p class="my-auto fs-6 fw-normal d-inline ml-4">{{$hrm->frequency14}}</p>                     
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12 mt-lg-4">                                 
                                <h6 class="fs-5 mt-1 d-inline">Notes:</h6><br>
                                <textarea class="nav1ta2 d-inline mt-1" placeholder="{{$hrm->notes14}}" disabled></textarea>                     
                            </div> 
                        </div>
                    </div>  
                                        {{-- /////////////////   8300 Ver \\\\\\\\\\\\\\\\\\\\\\\\\ --}}

                    <div class="col-6  mt-1 mt-md-3 mt-lg-5 mb-3">
                        <h6 class="fs-5 mt-1 d-inline">8300 Verification:</h6> <br>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->eight_verify)
                        
                    <img src="{{asset($hrm->eight_verify)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->eight_verify)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                                            {{-- //////////////    E Sahult Verf \\\\\\\\\\\\\\\\\\\\\ --}}
                    <div class="col-6  mt-1 mt-md-3 mt-lg-5 mb-3">
                        <h6 class="fs-5 mt-1 d-inline">E-Sahulat Verification:</h6> <br>
                        {{-- // Pop up image --}}
                    @if($hrm && $hrm->sahulat_v)
                        
                    <img src="{{asset($hrm->sahulat_v)}}" class="cnicimgs mt-2 imgclickable" onclick="showPopup(this)"  style=" position:relative; " />
                    <div class="popup" style=" display: none;
                        position: fixed;
                        top: 50%;
                        left: 60%;
                        transform: translate(-50%, -50%);
                        background-color: white;
                        
                        border: 0px solid #E7E7E7;
                        border-radius:15px;
                        z-index: 9999;
                        width: 800px;
                        background:none !important;
                        ">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{asset($hrm->sahulat_v)}}" style="height: 500px; width: 800px; border-radius:15px;" />
                    </div>
                        <span class="close-btn" style="position: absolute;
                        top:5px;
                        right:15px;
                        cursor: pointer;
                        color:white;
                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                    </div>
            
                    @else
                    <p class="text-center text-secondary">No image available</p>
                    @endif
                    </div> 
                </div>       
                              {{-- ///////////////////   Guarantor \\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
                <div class="container row mt-5">
                    <div class="col-lg-12">
                        <h6 class="fs-3 mt-1 d-inline">Guarantors</h6> <br>
                    </div>
                    <div class="col-12 mt-2" id="guarantorsdata">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Relationship</th>
                                <th scope="col">Tenure of Relationship</th>
                                <th scope="col">View</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($hrm->guarantors as $index => $guarantor)
                              <tr>
                                <input type="hidden" name="guarantors[{{ $index }}][g_id]" value="{{ $guarantor->id }}">
                                <td><input class="form-control aminp" readonly name="guarantors[{{ $index }}][g_name]" value="{{ $guarantor->g_name }}" type="text" placeholder="..." style="width: 100%;"></td>
                                <td><input class="form-control aminp" readonly type="text" name="guarantors[{{ $index }}][g_relation]" value="{{ $guarantor->g_relation}}" placeholder="..." style="width: 100%;"></td>
                                <td> <input class="form-control aminp" readonly name="guarantors[{{ $index }}][g_tenure_rel]" value="{{ $guarantor->g_tenure_rel }}" type="text" placeholder="..." style="width: 100%;"></td>
                                <td><button class="btn btn-primary" name="guarantors[{{ $index }}][id]" value="{{ $guarantor->id }}" action="{{ route('viewguarantors', ['id' => $guarantor->id]) }}">View</button></td>
                            </tr>
                              @endforeach
                            </tbody>
                          </table>
        
                        </div> 
                </div>              
            </div>
            {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ Education Health & Work Experience ////////////////////////////////////////////   --}}
            <div class="tab-pane fade" id="v-pills-ehwe" role="tabpanel" aria-labelledby="v-pills-ehwe-tab" tabindex="0">
                <div class="container row ">
                   
                    {{-- <div class="col-12 mt-5" id="hrmeducationdata">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Name of Degree</th>
                                <th scope="col">Date</th>
                                <th scope="col">Scanned Certificate of Degree</th>
                                <th scope="col">View</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($hrm->hrmeducation as $index => $education)
                              <tr>
                                <input type="hidden" name="rentalmaounts[{{ $index }}][rental_id]" value="{{ $amounts->id }}">
                                <td><input class="form-control aminp" readonly name="rentalamounts[{{ $index }}][rental_amount]" value="{{ $amounts->rental_amount }}" type="text" placeholder="..." style="width: 100%;"></td>
                                <td> <input class="form-control aminp" readonly name="rentalamounts[{{ $index }}][agreement_execution_date]" value="{{ $amounts->agreement_execution_date }}" type="text" placeholder="..." style="width: 100%;"></td>
                                <td><input class="form-control aminp" readonly type="text" name="rentalamounts[{{ $index }}][agreement_end_date]" value="{{ $amounts->agreement_end_date }}" placeholder="..." style="width: 100%;"></td>
                                <td>
                                    
                                    @if($amounts && $amounts->agreement_attachment) 
                                        
                                    <img src="{{asset($amounts->agreement_attachment)}}" name="rentalamounts[{{ $index }}][agreement_attachment]" class="cnicimgs1" onclick="showPopup(this)"  style=" position:relative;" />
                                    <div class="popup" style=" display: none;
                                        position: fixed;
                                        top: 50%;
                                        left: 60%;
                                        transform: translate(-50%, -50%);
                                        background-color: white;
                                        
                                        border: 0px solid #E7E7E7;
                                        border-radius:15px;
                                        z-index: 9999;
                                        width: 800px;
                                        background:none !important;
                                        ">
                                        <div style="position: relative; display: inline-block;">
                                        <img src="{{asset($amounts->agreement_attachment)}}"  name="rentalamounts[{{ $index }}][agreement_attachment]" style="height: 500px; width: 800px; border-radius:15px;" />
                                    </div>
                                        <span class="close-btn" style="position: absolute;
                                        top:5px;
                                        right:15px;
                                        cursor: pointer;
                                        font-size: 25px;" onclick="hidePopup(this)">&#10006;</span>
                                    </div>
                            
                                    @else
                                    <p class="text-center text-secondary">No image available</p>
                                    @endif   
        
                                </td>
                            </tr>
                              @endforeach
                            </tbody>
                          </table>
        
                        </div> --}}

                </div>
            </div>
                {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ Compliances //////////////////////////////////////////////// --}}
            <div class="tab-pane fade " id="v-pills-cmp" role="tabpanel" aria-labelledby="v-pills-cmp-tab" tabindex="0">
            
                        
            </div>
            {{-- /////////////////////////////////////////////// Inventory Record Card \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
            <div class="tab-pane fade" id="v-pills-irc" role="tabpanel" aria-labelledby="v-pills-irc-tab" tabindex="0">
            
            </div>
            {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ Security Guard License ///////////////////////////////////////////// --}}
            <div class="tab-pane fade" id="v-pills-sgl" role="tabpanel" aria-labelledby="v-pills-sgl-tab" tabindex="0">
                
                            
                    
                
            </div>
            {{-- //////////////////////////////////   Training Details \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
            <div class="tab-pane fade" id="v-pills-td" role="tabpanel" aria-labelledby="v-pills-td-tab" tabindex="0" >
                
            </div>

            {{-- ///////////////////////////////////////////   Payroll    \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
            <div class="tab-pane fade" id="v-pills-p" role="tabpanel" aria-labelledby="v-pills-p-tab" tabindex="0" >

            </div>

            {{-- ///////////////////////////////////////// Site Inspection \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
            <div class="tab-pane fade" id="v-pills-si" role="tabpanel" aria-labelledby="v-pills-si-tab" tabindex="0" >

            </div>

            {{-- ///////////////////////////////////////////  Obervation and Appraisal \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
            <div class="tab-pane fade" id="v-pills-oa" role="tabpanel" aria-labelledby="v-pills-oa-tab" tabindex="0" >

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