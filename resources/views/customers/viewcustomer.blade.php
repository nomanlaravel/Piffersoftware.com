@include('layouts.header') @yield('main')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="customer_form">
    <!-- Add these links in your HTML head to include FullCalendar's CSS and JS -->
    <div id="main" style="margin-left: 92%;"> <button class="openbtn" onclick="openNav()">☰</button> </div>
    <div id="mySidebar" class="sidebar admin-setting"> <a href="javascript:void(0)" class="closebtn"
            onclick="closeNav()">×</a> <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update
            Profile</a> <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers
            Administration Setting</a> <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
        <hr> <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
    </div>
    <!--Popup model for User new entry-->
    <!-- <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true"> -->
    <!-- <div class="modal-dialog" role="document" style="max-width: 75%;"> -->
    <!-- <div class="modal-content"> -->
    <div class="modal-header border-0">
        <!--<h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin-left:-20px;"><i>Customers View :</i>-->
        <!--</h4>-->
        <!-- <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;"> </h4> -->
        <!-- <button type="button" class="close" aria-label="Close" onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                </button> -->
    </div>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <style>
        .deltebutton {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: red;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
    </style>
    <div class="modal-header border-0">
        <div style="display:flex; column-gap:10px; align-items:center"> <button type="button" class="btn btn-link"
                onclick="history.back()"> <i class="bi bi-arrow-left"></i> </button>
            <h5 class="mt-3" style="font-weight: 700;">Customers View: </h5>
        </div>
    </div> <!-- <div class="modal-body"> -->

    <section> <button id="download-pdf">Download PDF</button> <button id="send-email">Send PDF via
            Email</button> <a href="https://web.whatsapp.com/send?text=Check%20out%20this%20link%3A%20"
            target="_blank"><button>Send via Whatsapp</button></a>
        <div id="emailModal" class="modal"
            style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
            <div class="modal-content"
                style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 40%; border-radius: 10px; text-align: center; margin-top:4%;">
                <span class="close"
                    style="color: #aaa; float: right; font-size: 28px; font-weight: bold; position: relative; left: 49%;">&times;</span>
                <label for="emailInput">Email To:</label> <input type="email" id="emailInput" placeholder="Email">
                <label for="ccInput">CC Recipient:</label> <input type="email" id="ccInput"
                    placeholder=" Enter CC Recipient"> <label for="bccInput">BCC Recipient:</label>
                <input type="email" id="bccInput" placeholder="Enter BCC Recipient"> <label
                    for="subjectInput">Subject:</label> <input type="text" id="subjectInput" placeholder="Subject"
                    autocomplete="off"> <label for="bodyInput">Body:</label>
                <textarea id="bodyInput" rows="8" placeholder="Body" autocomplete="off"></textarea> <button
                    id="sendEmailBtn" class="mt-2" style="width: 20%; display: block; margin: 0 auto;">Send</button>
            </div>
        </div>
        <div id="hiddenBootstrapAlert" class="alert alert-danger alert-dismissible fade" role="alert"
            style="display: hidden;"> <span id="hiddenAlertContent"></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div id="hiddenRenewalAlert" class="alert alert-success alert-dismissible fade" role="alert"> <span
                id="hiddenRenewalAlertContent"></span> <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button> </div>
        <div class="row mb-2" style="margin-left: 20px;">
            <div class="col d-flex flex-column align-items-end" style="margin-right: 53px;">
                <div>
                    <h5>Customer Activation Status</h5>
                    <div class="form-check form-check-inline" style="margin-right: 90px;"> <input
                            class="form-check-input mr-2" type="radio" name="customers_activation_check" {{ $customers->customers_activation_check == '1' ? 'checked' : '' }} value="1" id="activeRadio">
                        <label class="form-check-label" for="activeRadio">Active</label> <input
                            class="form-check-input ml-3 mr-2" type="radio" name="customers_activation_check" {{ $customers->customers_activation_check == '0' ? 'checked' : '' }} value="0"
                            id="inactiveRadio"> <label class="form-check-label" for="inactiveRadio">Inactive</label>
                    </div>
                    <div class="col-12">
                        <div> <label class="form-label" for="entryofdate">Date Of Entry</label> <input
                                class="form-control" type="date" name="date_of_entry"
                                value="{{ $customers->date_of_entry }}" id="entryofdate"> </div>
                    </div>
                </div>
            </div>
        </div>
        <form enctype="multipart/form-data" id="customer_form">
            <!--Customer / Main Form-->
            <div class="row" style="font-weight:600;">
                <h5> Customer Information </h5>
                <div class="col-lg-6 spacing-right">
                    <div class="row mb-2 mt-3">
                        <div class="col-lg-5 spacing-right"> Customer ID <br> <input class="form-control" readonly
                                id="c_id" name="customers_id" value="{{ $customers->customers_id }}" type="text"
                                placeholder="..." style="width: 100%;" readonly> </div>
                        <div class="col-lg-6 spacing-left"> Customer Legal Name (As per NTN) <br> <input
                                class="form-control" readonly id="customers_name" type="text" name="customers_name"
                                value="{{ $customers->customers_name }}" placeholder="" style="width: 100%;"> </div>
                    </div>
                    <div class="row mb-2 mt-3">
                        <div class="col-lg-5 spacing-right"> Suffix <br> <input class="form-control" readonly
                                id="customers_suffix" name="customers_suffix" value="{{ $customers->customers_suffix }}"
                                type="text" placeholder="..." style="width: 100%;"> </div>
                        <div class="col-lg-6 spacing-left input-group"> City of Deployment <br> <input
                                class="form-control" readonly id="city_of_deployment" type="text"
                                name="city_of_deployment" value="{{ $customers->city_of_deployment }}" placeholder="..."
                                style="width: 100%;"> </div>
                    </div>
                    <div class="row mb-2 mt-3">
                        <div class="col-lg-10 spacing-right"> Display Name as <br> <input class="form-control" readonly
                                id="d_name" name="display_name_as" value="{{ $customers->display_name_as }}" type="text"
                                placeholder="..." style="width: 100%;"> </div>
                    </div>
                </div>
                <div class="col-lg-6 spacing-left">
                    <div class="row mb-2 mt-3">
                        <div class="col-lg-5 spacing-right"> Nature of Business <br> <input class="form-control"
                                readonly id="nature" value="{{ $customers->nature_of_business }}"
                                name="nature_of_business" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left"> Website <br> <input class="form-control" readonly
                                type="text" id="web" value="{{ $customers->website }}" name="website" placeholder=""
                                style="width: 100%;"> </div>
                    </div>
                    <div class="row mb-2 mt-3">
                        <div class="col-lg-5 spacing-right"> Phone/Cell No <br> <input class="form-control" readonly
                                type="text" id="phone" value="{{ $customers->phone }}" name="phone" placeholder="..."
                                style="width: 100%;"> </div>
                        <div class="col-lg-6 spacing-left input-group"> Email <br> <input class="form-control"
                                name="email" id="email" type="email" value="{{ $customers->email }}" placeholder="..."
                                style="width: 100%;"> </div>
                        {{-- <div class="row" style="margin-left: 3px; margin-top: 10px;">
                            <div class="col-lg-11 spacing-right">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Sub-customer</label>
                                    <input class="form-controld form-control" id="sub_customer" name="sub_customer"
                                        value="{{ $customers->sub_customer }}" type="text" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                        </div> --}} <div class="row" style="margin-left: 3px; margin-top: 10px;">
                            <div class="col-lg-11 spacing-right">
                                <div class="form-group form-check"> Sub Customer <br> <input
                                        class="form-control vldemail" name="sub_customer" id="" type="text"
                                        value="{{ $customers->sub_customer }}" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5>Approved Commercials</h5>
                    <div class="row mb-2 mt-3" style="margin-left:20px;">
                        <div class="form-check form-check-inline spacing-left"> <input class="form-check-input"
                                name="approved_com" type="checkbox" {{ $customers->approved_com ? 'checked' : '' }}
                                id="approved_commercials"> <label class="form-check-label"
                                for="inlineCheckbox1">Approved
                                Commercials</label> </div>
                    </div>
                    <div class="row mb-2 mt-5" style="margin-left:20px;">
                        <div class="form-check form-check-inline spacing-left"> <input class="form-check-input"
                                type="checkbox" {{ $customers->quick_box ? 'checked' : '' }} name="quick_box"
                                id="quick_box"> <label class="form-check-label" for="inlineCheckbox1">QuickBooks</label>
                        </div>
                    </div>
                    <div class="row d-flex flex-row align-items-center justify-content-center mt-5 mb-3">
                        <div class="col-4">
                            <div class="row" style="margin-left:10px;">
                                <div class="form-check form-check-inline spacing-left"> <input class="form-check-input"
                                        name="eobi" type="checkbox" {{ $customers->eobi ? 'checked' : '' }} id="eobi">
                                    <label class="form-check-label" for="inlineCheckbox1">EOBI</label> </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row" style="margin-left:10px;">
                                <div class="form-check form-check-inline spacing-left "> <input class="form-check-input"
                                        name="social_security" type="checkbox" {{ $customers->social_security ? 'checked' : '' }} id="social_security">
                                    <label class="form-check-label" for="inlineCheckbox1">Social Security</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row" style="margin-left:10px;">
                                <div class="form-check form-check-inline spacing-left"> <input class="form-check-input"
                                        name="grp_life_ins" type="checkbox" {{ $customers->grp_life_ins ? 'checked' : '' }} id="grp_life_ins"> <label class="form-check-label"
                                        for="inlineCheckbox1">Group Life Insurance</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row mb-2 mt-3">
                        <div class="col-lg-12 "> Approved Commercial Attachments <br> <input class="form-control"
                                readonly name="approved_attach" value="{{ $customers->approved_attach }}" type="file"
                                style="width: 100%;">
                            @if ($customers->approved_attach)
                                                    <div class="col-lg-12 mt-3" style="display: flex; gap:3px">
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($customers->approved_attach) }}"
                                                            data-extension="{{ pathinfo($customers->approved_attach, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)"> {!!
                                getFilePreview($customers->approved_attach) !!}

                                                        </div>
                                                        <!-- Delete Button -->
                                                        <a class="deltebutton"
                                                            href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'approved_attach']) }}"
                                                            onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                                    </div>
                            @else
                                <p class="text-center text-secondary">Attachment not found</p>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-2 mt-3">
                        <div class="col-lg-12 spacing-left"> QuickBooks Screenshot <br> <input class="form-control"
                                readonly value="{{ $customers->quickbooks_attach }}" name="quickbooks_attach"
                                type="file" style="width: 100%;">
                            @if ($customers->quickbooks_attach)
                                                    <div class="col-lg-12 mt-3" style="position: relative; display: flex; gap:3px">
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($customers->quickbooks_attach) }}"
                                                            data-extension="{{ pathinfo($customers->quickbooks_attach, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)"> {!!
                                getFilePreview($customers->quickbooks_attach) !!} </div>
                                                        <a class="deltebutton"
                                                            href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'quickbooks_attach']) }}"
                                                            onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                                    </div>
                            @else
                                <p class="text-center text-secondary">Attachment not found</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 spacing-right form-group"> Applicable Compliances <br> <input class="form-control"
                        readonly id="c_id" name="applicable_compliances"
                        value="{{ $customers->applicable_compliances }}" type="text" placeholder="..."
                        style="width: 100%;"> </div>
            </div>
            <hr>
            <!--Tabs forDetails-->
            <!--    <nav>
    <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-contact-tab" data-toggle="tab" href="#work-experience" role="tab" aria-controls="nav-experience" aria-selected="false">Contract Management
                                </a>
                                <a class="nav-item nav-link " id="nav-deployment-tab" data-toggle="tab" href="#education" role="tab" aria-controls="nav-deployment" aria-selected="false">Deployment Plan
                                </a>
                                <a class="nav-item nav-link " id="nav-contact-tab" data-toggle="tab" href="#guaranter-details" role="tab" aria-controls="nav-contact" aria-selected="false">Point of Contacts (POC)
                                </a>
                                <a class="nav-item nav-link" id="nav-operation-tab" data-toggle="tab"
                                    href="#patrolling" role="tab" aria-controls="nav-operations"
                                    aria-selected="false">Patrolling Supervisor Log
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#site" role="tab" aria-controls="nav-biometric" aria-selected="false"> Site Inspection
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#arm" role="tab" aria-controls="nav-biometric" aria-selected="false"> Armourer
                                </a>
                                <a class="nav-item nav-link" id="nav-incident-tab" data-toggle="tab" href="#incident_report" role="tab" aria-controls="nav-incident" aria-selected="false">Incident Report & Assignment Instruction Form
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#audit" role="tab" aria-controls="nav-biometric" aria-selected="false"> Audits
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#address-details" role="tab" aria-controls="nav-address" aria-selected="false">Monthly
                                    Performance Review Report
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#intelligence" role="tab" aria-controls="nav-biometric" aria-selected="false">BI & Promotional Activities
                                </a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#verifications" role="tab" aria-controls="nav-verifications" aria-selected="false">Feedback Management
                                </a>

        </div>
                        </nav> -->
            <!--contract management-->
            <div class="tab-pane fade show active m-3" style="opacity: 90%;" id="work-experience" role="tabpanel"
                aria-labelledby="nav-contact-tab">
                <div class="row">
                    <h5 class="mb-2" style="text-align:center"><i><b>Contract at a Glance :</b></i></h5>
                    <div class="row col-lg-12 mb-4">
                        <div class="col-lg-3 spacing-right"> Summary of Approved Strength: <br> <input
                                class="form-control" readonly value="{{ $customers->sum_apr }}" name="sum_apr"
                                type="file" placeholder="..." style="width: 100%;">
                            @if ($customers->sum_apr)
                                <div class="col-lg-12 mt-3" style="display: flex; gap:3px">
                                    <div class="file-preview" style="cursor: pointer;"
                                        data-file="{{ asset($customers->sum_apr) }}"
                                        data-extension="{{ pathinfo($customers->sum_apr, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this)"> {!! getFilePreview($customers->sum_apr) !!} </div>
                                    <a class="deltebutton"
                                        href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'sum_apr']) }}"
                                        onclick="return confirm('Are you sure you want to delete this file?')"
                                        class="deletestyle">x</a>
                                </div>
                            @else
                                <p class="text-center text-secondary">Attachment not found</p>
                            @endif
                        </div>
                        <div class="col-lg-3 spacing-right">
                            Accomodation Status: <br> <input class="form-control" readonly
                                value="{{ $customers->acm_status }}" name="acm_status" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                        <div class="col-lg-3 spacing-right"> Meal Details: <br> <input class="form-control" readonly
                                name="meal_detail" value="{{ $customers->meal_detail }}" type="text" placeholder="..."
                                style="width: 100%;"> </div>
                        <div class="col-lg-3  mt-2">
                            <lable for="apr_kpi" class="form-check-label spacing-right">Any approved KPIs or SOW::
                                </label>
                                <input class="form-control" readonly value="{{ $customers->apr_kpi }}" name="apr_kpi"
                                    id="apr_kpi" type="file" placeholder="...">
                                @if ($customers->apr_kpi)
                                    <div class="col-lg-12 mt-3" style="display: flex; gap:3px">
                                        <div class="file-preview" style="cursor: pointer;"
                                            data-file="{{ asset($customers->apr_kpi) }}"
                                            data-extension="{{ pathinfo($customers->apr_kpi, PATHINFO_EXTENSION) }}"
                                            onclick="openFileModal(this)"> {!! getFilePreview($customers->apr_kpi) !!}
                                        </div>
                                        <!-- Delete Button -->
                                        <a class="deltebutton"
                                            href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'apr_kpi']) }}"
                                            onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                    </div>
                                @else
                                    <p class="text-center text-secondary">Attachment not found</p>
                                @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <hr />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row mb-2">
                            <div class="col-lg-6 mt-2 spacing-right">
                                <div class=" mb-2 d-flex align-items-center"> <label for="Type Of Training:"
                                        class="form-check-label spacing-right">Approved Quotation Vetted by Sales
                                        Department :</label>
                                    <div class="form-check form-check-inline spacing-left"> <input
                                            class="form-check-input" name="approv_q_s" {{ $customers->approv_q_s ? 'checked' : '' }} type="checkbox" id="inlineCheckbox1" value=""> <label
                                            class="form-check-label" for="inlineCheckbox1"></label> </div>
                                </div>
                            </div>
                            <div class="col-lg-5 spacing-left spacing-right"> Attachments <br> <input
                                    class="form-control" readonly name="approv_q_s_attach" type="file" placeholder="..."
                                    style="width: 100%;">
                                @if ($customers->approv_q_s_attach)
                                                            <div class="col-lg-12 mt-2" style="position: relative; display: flex; gap:3px">
                                                                <div class="file-preview" style="cursor: pointer;"
                                                                    data-file="{{ asset($customers->approv_q_s_attach) }}"
                                                                    data-extension="{{ pathinfo($customers->approv_q_s_attach, PATHINFO_EXTENSION) }}"
                                                                    onclick="openFileModal(this)"> {!!
                                    getFilePreview($customers->approv_q_s_attach) !!} </div>
                                                                <!-- Delete Button -->
                                                                <a class="deltebutton"
                                                                    href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'approv_q_s_attach']) }}"
                                                                    onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                                            </div>
                                @else
                                    <p class="text-center text-secondary">Attachment not found</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 mt-2 spacing-right">
                                <div class=" mb-2 d-flex align-items-center"> <label for="Type Of Training:"
                                        class="form-check-label spacing-right">Approved Quotation Vetted by Contract
                                        Management Department :</label>
                                    <div class="form-check form-check-inline spacing-left"> <input
                                            class="form-check-input" type="checkbox" {{ $customers->approv_q_c ? 'checked' : '' }} name="approv_q_c" id="inlineCheckbox1" value=""> <label
                                            class="form-check-label" for="inlineCheckbox1"></label> </div>
                                </div>
                            </div>
                            <div class="col-lg-5 spacing-left spacing-right"> Attachments <br> <input
                                    class="form-control" readonly id="printing_date" name="approv_q_c_attach"
                                    type="file" placeholder="..." style="width: 100%;">
                                @if ($customers->approv_q_c_attach)
                                                            <div class="col-lg-12 mt-2" style="display: flex; gap:3px">
                                                                <div class="file-preview" style="cursor: pointer;"
                                                                    data-file="{{ asset($customers->approv_q_c_attach) }}"
                                                                    data-extension="{{ pathinfo($customers->approv_q_c_attach, PATHINFO_EXTENSION) }}"
                                                                    onclick="openFileModal(this)"> {!!
                                    getFilePreview($customers->approv_q_c_attach) !!} </div>
                                                                <!-- Delete Button --> <a class="deltebutton"
                                                                    href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'approv_q_c_attach']) }}"
                                                                    onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                                            </div>
                                @else
                                    <p class="text-center text-secondary">Attachment not found</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 mt-2 spacing-right">
                                <div class=" mb-2 d-flex align-items-center"> <label for="Type Of Training:"
                                        class="form-check-label spacing-right">Approved Quotation Vetted by CFO
                                        :</label>
                                    <div class="form-check form-check-inline spacing-left"> <input
                                            class="form-check-input" type="checkbox" {{ $customers->approv_q_cfo ? 'checked' : '' }} name="approv_q_cfo" id="inlineCheckbox1" value=""> <label
                                            class="form-check-label" for="inlineCheckbox1"></label> </div>
                                </div>
                            </div>
                            <div class="col-lg-5 spacing-left spacing-right"> Attachments <br> <input
                                    class="form-control" readonly id="printing_date" name="approv_q_cfo_attach"
                                    type="file" placeholder="..." style="width: 100%;">
                                @if ($customers->approv_q_cfo_attach)
                                                            <div class="col-lg-12 mt-2" style="display: flex; gap:3px">
                                                                <div class="file-preview" style="cursor: pointer;"
                                                                    data-file="{{ asset($customers->approv_q_cfo_attach) }}"
                                                                    data-extension="{{ pathinfo($customers->approv_q_cfo_attach, PATHINFO_EXTENSION) }}"
                                                                    onclick="openFileModal(this)"> {!!
                                    getFilePreview($customers->approv_q_cfo_attach) !!} </div>
                                                                <!-- Delete Button --> <a class="deltebutton"
                                                                    href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'approv_q_cfo_attach']) }}"
                                                                    onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                                            </div>
                                @else
                                    <p class="text-center text-secondary">Attachment not found</p>
                                @endif
                            </div>
                            <div class="row mb-2 mt-4">
                                <div class="col-lg-5 spacing-right"> Contract Execution Date: <br> <input
                                        class="form-control" readonly name="c_e_date" value="{{ $customers->c_e_date }}"
                                        type="date" placeholder="..." style="width: 100%;"> </div>
                                <div class="col-lg-5 spacing-right"> Contract end Date: <br> <input class="form-control"
                                        readonly name="c_end_date" value="{{ $customers->c_end_date }}" type="date"
                                        placeholder="..." style="width: 100%;"> </div>
                                <div class="col-lg-5 spacing-right"> Contract Renewal Date <br> <input
                                        class="form-control" readonly name="c_r_date" id="c_r_date"
                                        value="{{ $customers->c_r_date }}" type="date" placeholder="..."
                                        style="width: 100%;"> </div>
                                <div class="col-lg-5 spacing-right"> Renewal Reminder <br>
                                    {{-- <input class="form-control" readonly name="c_r_rem" id="c_r_rem"
                                        value="{{ $customers->c_r_rem }}" type="text" placeholder="..." style="width:
      100%;"> --}}
                                    <textarea id="c_r_rem" oninput="trimSpaces()" onclick="moveCursorToStart()"
                                        class="form-control" readonly name="c_r_rem" rows="2"
                                        cols="38">{{ $customers->c_r_rem }} </textarea>
                                </div>
                            </div>
                            <h5>Signatory Details :</h5>
                            <div class="row mb-2" id="signatoryDetailsContainer">
                                @foreach ($customers->customersignatories as $index => $signatories)
                                    <input type="hidden" name="customersignatories[{{ $index }}][s_id]"
                                        value="{{ $signatories->id }}">
                                    <div class="col-lg-5 spacing-right"> Name <br> <input class="form-control" readonly
                                            name="customersignatories[{{ $index }}][sign_name]"
                                            value="{{ $signatories->sign_name }}" type="text" placeholder="..."
                                            style="width: 100%;"> </div>
                                    <div class="col-lg-5 spacing-right"> Designation <br> <input class="form-control"
                                            readonly name="customersignatories[{{ $index }}][sign_desig]"
                                            value="{{ $signatories->sign_desig }}" type="text" placeholder="..."
                                            style="width: 100%;"> </div>
                                    <div class="col-lg-5 spacing-right"> Cell No <br> <input class="form-control" readonly
                                            type="text" name="customersignatories[{{ $index }}][sign_cell]"
                                            value="{{ $signatories->sign_cell }}" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-right"> Email <br> <input class="form-control" readonly
                                            type="text" name="customersignatories[{{ $index }}][sign_email]"
                                            value="{{ $signatories->sign_email }}" placeholder="..." style="width: 100%;">
                                    </div>
                                @endforeach {{-- <div class="new_branch mt-2" style="width:20%;">
                                    <button type="button" id="add_new_renewal_btn" onclick="addSignatorySection()">
                                        Add More
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 spacing-left">
                        <div class="row mb-2">
                            <div class="col-lg-12 spacing-right"> Draft Contract and Signed Agreement Read by<br>
                                <div class="form-check form-check-inline"> <input class="form-check-input"
                                        id="compliances" name="sales_dept" {{ $customers->sales_dept ? 'checked' : '' }}
                                        type="checkbox" id="inlineCheckbox1" value=""> <label class="form-check-label"
                                        for="inlineCheckbox1">Sales Dept.</label> </div>
                                <div class="form-check form-check-inline"> <input class="form-check-input"
                                        id="compliances" name="cmd" {{ $customers->cmd ? 'checked' : '' }}
                                        type="checkbox" id="inlineCheckbox2" value=""> <label class="form-check-label"
                                        for="inlineCheckbox2">CMD</label> </div>
                                <div class="form-check form-check-inline"> <input class="form-check-input"
                                        id="compliances" name="ops_dept" {{ $customers->ops_dept ? 'checked' : '' }}
                                        type="checkbox" id="inlineCheckbox2" value=""> <label class="form-check-label"
                                        for="inlineCheckbox2">Ops Dept.</label> </div>
                                <div class="form-check form-check-inline"> <input class="form-check-input"
                                        id="compliances" name="finance_dept" {{ $customers->finance_dept ? 'checked' : '' }} type="checkbox" id="inlineCheckbox2" value=""> <label
                                        class="form-check-label" for="inlineCheckbox2">Finance Dept.</label> </div>
                                <div class="form-check form-check-inline"> <input class="form-check-input"
                                        id="compliances" name="directors" {{ $customers->directors ? 'checked' : '' }}
                                        type="checkbox" id="inlineCheckbox2" value=""> <label class="form-check-label"
                                        for="inlineCheckbox2">Directors.</label> </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 mt-2 spacing-right">
                                <div class=" mb-2 d-flex align-items-center"> <label for="Type Of Training:"
                                        class="form-check-label spacing-right">Signed Service Contract Agreement
                                        Attached :</label>
                                    <div class="form-check form-check-inline spacing-left"> <input
                                            class="form-check-input" name="signed_ser" {{ $customers->approved_com ? 'checked' : '' }} type="checkbox" id="inlineCheckbox1" value=""> <label
                                            class="form-check-label" for="inlineCheckbox1"></label> </div>
                                </div>
                            </div>
                            <div class="col-lg-5 spacing-left spacing-right"> Attachments <br> <input
                                    class="form-control" readonly name="signed_ser_attach"
                                    value="{{ $customers->signed_ser_attach }}" type="file" placeholder="..."
                                    style="width: 100%;">
                                @if ($customers->signed_ser_attach)
                                                            <div class="col-lg-12 mt-2" style="display: flex; gap:3px">
                                                                <div class="file-preview" style="cursor: pointer;"
                                                                    data-file="{{ asset($customers->signed_ser_attach) }}"
                                                                    data-extension="{{ pathinfo($customers->signed_ser_attach, PATHINFO_EXTENSION) }}"
                                                                    onclick="openFileModal(this)"> {!!
                                    getFilePreview($customers->signed_ser_attach) !!} </div>
                                                                <!-- Delete Button --> <a class="deltebutton"
                                                                    href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'signed_ser_attach']) }}"
                                                                    onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                                            </div>
                                @else
                                    <p class="text-center text-secondary">Attachment not found</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 mt-2 spacing-right">
                                <div class=" mb-2 d-flex align-items-center"> <label for="Type Of Training:"
                                        class="form-check-label spacing-right">Communication Instructions Attached
                                        :</label>
                                    <div class="form-check form-check-inline spacing-left"> <input
                                            class="form-check-input" name="com_ins" {{ $customers->com_ins ? 'checked' : '' }} type="checkbox" id="inlineCheckbox1" value=""> <label
                                            class="form-check-label" for="inlineCheckbox1"></label> </div>
                                </div>
                            </div>
                            <div class="col-lg-5 spacing-left spacing-right"> Attachments <br> <input
                                    class="form-control" readonly name="com_ins_attach"
                                    value="{{ $customers->com_ins_attach }}" type="file" placeholder="..."
                                    style="width: 100%;">
                                @if ($customers->com_ins_attach)
                                                            <div class="col-lg-12 mt-2" style="display: flex; gap:3px">
                                                                <div class="file-preview" style="cursor: pointer;"
                                                                    data-file="{{ asset($customers->com_ins_attach) }}"
                                                                    data-extension="{{ pathinfo($customers->com_ins_attach, PATHINFO_EXTENSION) }}"
                                                                    onclick="openFileModal(this)"> {!!
                                    getFilePreview($customers->com_ins_attach) !!} </div>
                                                                <!-- Delete Button --> <a class="deltebutton"
                                                                    href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'com_ins_attach']) }}"
                                                                    onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                                            </div>
                                @else
                                    <p class="text-center text-secondary">Attachemnt not found</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 mt-2 spacing-right">
                                <div class=" mb-2 d-flex align-items-center"> <label for="Type Of Training:"
                                        class="form-check-label spacing-right">Testimonials (Reference Letters)
                                        Attached :</label>
                                    <div class="form-check form-check-inline spacing-left"> <input
                                            class="form-check-input" name="testimonials" {{ $customers->testimonials ? 'checked' : '' }} type="checkbox" id="inlineCheckbox1" value=""> <label
                                            class="form-check-label" for="inlineCheckbox1"></label> </div>
                                </div>
                            </div>
                            <div class="col-lg-5 spacing-left spacing-right"> Attachments <br> <input
                                    class="form-control" readonly value="{{ $customers->testimonials_attach }}"
                                    name="testimonials_attach" type="file" placeholder="..." style="width: 100%;">
                                @if ($customers->testimonials_attach)
                                                            <div class="col-lg-12 mt-2" style="display: flex; gap:3px">
                                                                <div class="file-preview" style="cursor: pointer;"
                                                                    data-file="{{ asset($customers->testimonials_attach) }}"
                                                                    data-extension="{{ pathinfo($customers->testimonials_attach, PATHINFO_EXTENSION) }}"
                                                                    onclick="openFileModal(this)"> {!!
                                    getFilePreview($customers->testimonials_attach) !!} </div>
                                                                <a class="deltebutton"
                                                                    href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'testimonials_attach']) }}"
                                                                    onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                                            </div>
                                @else
                                    <p class="text-center text-secondary">Attachment not found</p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 mt-2 spacing-right">
                                <div class=" mb-2 d-flex align-items-center"> <label for="Type Of Training:"
                                        class="form-check-label spacing-right">Details of Sales Incentives :</label>
                                    <div class="form-check form-check-inline spacing-left"> <input
                                            class="form-check-input" name="sales_inc" {{ $customers->sales_inc ? 'checked' : '' }} type="checkbox" id="inlineCheckbox1" value=""> <label
                                            class="form-check-label" for="inlineCheckbox1"></label> </div>
                                </div>
                            </div>
                            <div class="col-lg-5 spacing-left spacing-right"> Attachments <br> <input
                                    class="form-control" readonly name="sales_inc_attach"
                                    value="{{ $customers->sales_inc_attach }}" type="file" placeholder="..."
                                    style="width: 100%;">
                                @if ($customers->sales_inc_attach)
                                                            <div class="col-lg-12 mt-2" style="display: flex; gap:3px">
                                                                <div class="file-preview" style="cursor: pointer;"
                                                                    data-file="{{ asset($customers->sales_inc_attach) }}"
                                                                    data-extension="{{ pathinfo($customers->sales_inc_attach, PATHINFO_EXTENSION) }}"
                                                                    onclick="openFileModal(this)"> {!!
                                    getFilePreview($customers->sales_inc_attach) !!} </div>
                                                                <!-- Delete Button --> <a class="deltebutton"
                                                                    href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'sales_inc_attach']) }}"
                                                                    onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                                            </div>
                                @else
                                    <p class="text-center text-secondary">Attachment not found</p>
                                @endif
                            </div>
                        </div>
                        <h5>Performance Guaranty :</h5>
                        <div class="form-check form-check-inline"> <input class="form-check-input" name="pay_order"
                                id="compliances-na" type="checkbox" value=""> <label class="form-check-label"
                                for="compliances-na">N/A.</label> </div>
                        <div id="sectionToHide">
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-right"> Insurance Company Name <br> <input
                                        class="form-control" readonly value="{{ $customers->insc_name }}"
                                        name="insc_name" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-right"> Date of issue <br> <input class="form-control"
                                        readonly name="insc_date" value="{{ $customers->insc_date }}" type="date"
                                        placeholder="..." style="width: 100%;"> </div>
                            </div>
                            <div class="col-lg-12 spacing-right mb-3"> Performance Guaranty issued via <br> <select
                                    id="staff_category" class="form-control" readonly value="{{ $customers->per_guan }}"
                                    name="per_guan" style="width: 100%;">
                                    <option value="Pay Order">Pay Order</option>
                                    <option value="Demand Draft">Demand Draft</option>
                                </select> </div>
                        </div>
                    </div>
                    <div id="work_add_fields"> </div>
                    <div class="row mb-2"> </div>
                    <div class="row mb-2">
                        <div class="col-lg-6 spacing-left spacing-right mt-2"> Attachements <br> <input
                                class="form-control" readonly name="perfom_attach"
                                value="{{ $customers->perfom_attach }}" type="file" placeholder="..."
                                style="width: 70%;" multiple>
                            @if ($customers->perfom_attach)
                                                    <div class="col-lg-12 mt-2" style="display: flex; gap:3px">
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($customers->perfom_attach) }}"
                                                            data-extension="{{ pathinfo($customers->perfom_attach, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)"> {!!
                                getFilePreview($customers->perfom_attach) !!} </div>
                                                        <a class="deltebutton"
                                                            href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'perfom_attach']) }}"
                                                            onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                                    </div>
                            @else
                                <p class="text-center text-secondary">Attachment not found</p>
                            @endif
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right mt-2"> Notes <br>
                            <textarea id="w3review" oninput="trimSpaces()" onclick="moveCursorToStart()"
                                class="form-control" readonly name="perform_note" rows="2"
                                cols="38">{{ $customers->perform_note }} </textarea>
                        </div>
                    </div>
                </div>
                <h5 class="mb-2" style="text-align:center"><i><b>Payment Terms :</b></i></h5>
                <div class="row">
                    <div class="row mt-3" style="font-weight:600;">
                        <div class="col-lg-6 spacing-right mb-3"> Payment Terms <br> <select class="form-control"
                                readonly name="pay_terms" value="{{ $customers->pay_terms }}" style="width: 100%;">
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                            </select>
                        </div>
                        <div class="form-type col-lg-6 spacing-right"> NTN from FBR Site <br> <input
                                class="form-control" readonly type="file" name="ntn_fbr"
                                value="{{ $customers->ntn_fbr }}" placeholder="..." style="width: 100%;">
                            @if ($customers->ntn_fbr)
                                <div class="col-lg-12 mt-2" style="display: flex; gap:3px">
                                    <div class="file-preview" style="cursor: pointer;"
                                        data-file="{{ asset($customers->ntn_fbr) }}"
                                        data-extension="{{ pathinfo($customers->ntn_fbr, PATHINFO_EXTENSION) }}"
                                        onclick="openFileModal(this)"> {!! getFilePreview($customers->ntn_fbr) !!} </div>
                                    <!-- Delete Button --> <a class="deltebutton"
                                        href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'ntn_fbr']) }}"
                                        onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                </div>
                            @else
                                <p class="text-center text-secondary">Attachment not found</p>
                            @endif
                        </div>
                    </div>
                    <h5 class="mt-3">Relevant Details of Manager Billing of Customer</h5>
                    <div class="row">
                        <div class=" row main-content div">
                            <div class="col-lg-6">
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right"> POC Name <br> <input class="form-control"
                                            readonly id="" value="{{ $customers->poc_name }}" name="poc_name"
                                            type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right"> Designation <br> <input
                                            class="form-control" readonly id="head_office_email" name="poc_desig"
                                            value="{{ $customers->poc_desig }}" type="text" placeholder="..."
                                            style="width: 100%;"> </div>
                                    <div class="col-lg-6 spacing-right"> Cell Number <br> <input class="form-control"
                                            readonly id="" name="poc_cell" value="{{ $customers->poc_cell }}"
                                            type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-5 spacing-left spacing-right"> Email <br> <input
                                            class="form-control" readonly id="head_office_email" name="poc_email"
                                            value="{{ $customers->poc_email }}" type="email" placeholder="..."
                                            style="width: 100%;"> </div>
                                    <div class="col-lg-6 spacing-right"> Billing Cycle Details <br> <input
                                            class="form-control" readonly id="" value="{{ $customers->poc_bill_c }}"
                                            name="poc_bill_c" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-5 spacing-left spacing-right"> Billing Portal Details <br>
                                        <input class="form-control" readonly id="head_office_email"
                                            value="{{ $customers->poc_bill_d }}" name="poc_bill_d" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 spacing-right"> Billing Portal Link <br> <input
                                            class="form-control" readonly id="" value="{{ $customers->poc_bill_l }}"
                                            name="poc_bill_l" type="text" placeholder="..." style="width: 100%;"> </div>
                                </div>
                            </div>
                            <div class="col-lg-6 spacing-left">
                                <h5>Address</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right"> Office No <br> <input class="form-control"
                                            readonly id="" name="poc_office" value="{{ $customers->poc_office }}"
                                            type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-5 spacing-left"> Floor <br> <input class="form-control" readonly
                                            id="head_office_cell_no" name="poc_floor"
                                            value="{{ $customers->poc_floor }}" type="text" placeholder="..."
                                            style="width: 100%;"> </div>
                                    <div class="col-lg-5"> Building <br> <input class="form-control" readonly id=""
                                            name="poc_building" value="{{ $customers->poc_building }}" type="text"
                                            placeholder="..." style="width: 100%;"> </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right"> Block <br> <input class="form-control" readonly
                                            id="" name="poc_block" value="{{ $customers->poc_block }}" type="text"
                                            placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-5 spacing-left"> Area <br> <input class="form-control" readonly
                                            id="" name="poc_area" value="{{ $customers->poc_area }}" type="text"
                                            placeholder="..." style="width: 100%;"> </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right"> City <br> <input class="form-control" readonly
                                            id="" name="poc_city" value="{{ $customers->poc_city }}" type="text"
                                            placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-5 spacing-left"> Photograph of Location <br> <input
                                            class="form-control" readonly id="" name="poc_photo"
                                            value="{{ $customers->poc_photo }}" type="file" placeholder="..."
                                            style="width: 100%;">
                                        @if ($customers->poc_photo)
                                            <div class="col-lg-12 mt-2" style="display: flex; gap:3px">
                                                <div class="file-preview" style="cursor: pointer;"
                                                    data-file="{{ asset($customers->poc_photo) }}"
                                                    data-extension="{{ pathinfo($customers->poc_photo, PATHINFO_EXTENSION) }}"
                                                    onclick="openFileModal(this)">
                                                    {!! getFilePreview($customers->poc_photo) !!}
                                                </div>
                                                <!-- Delete Button --> <a class="deltebutton"
                                                    href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'poc_photo']) }}"
                                                    onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                            </div>
                                        @else
                                            <p class="text-center text-secondary">Attachment not found</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right"> Pin location <br> <input class="form-control"
                                            readonly id="" name="poc_pin" value="{{ $customers->poc_pin }}" type="text"
                                            placeholder="..." style="width: 100%;"> </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-left spacing-right mt-2"> Notes <br>
                                        <textarea id="w3review1" oninput="trimSpaces1()" onclick="moveCursorToStart1()"
                                            class="form-control" readonly name="poc_note" rows="2"
                                            cols="38">{{ $customers->poc_note }} </textarea>
                                    </div>
                                    <div class="col-lg-6 spacing-left spacing-right mt-2"> Attachements <br> <input
                                            class="form-control" readonly name="poc_attach"
                                            value="{{ $customers->poc_attach }}" type="file" placeholder="..."
                                            style="width: 70%;" multiple>
                                        @if ($customers->poc_attach)
                                                                            <div class="col-lg-12 mt-2" style="display: flex; gap:3px">
                                                                                <div class="file-preview" style="cursor: pointer;"
                                                                                    data-file="{{ asset($customers->poc_attach) }}"
                                                                                    data-extension="{{ pathinfo($customers->poc_attach, PATHINFO_EXTENSION) }}"
                                                                                    onclick="openFileModal(this)"> {!! getFilePreview($customers->poc_attach)
                                             !!} </div>
                                                                                <!-- Delete Button --> <a class="deltebutton"
                                                                                    href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'poc_attach']) }}"
                                                                                    onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                                                            </div>
                                        @else
                                            <p class="text-center text-secondary">Attachment not found</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" row main-content div">
                            <h5>Customer's CFO Details :</h5>
                            <div class="col-lg-6">
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right"> Name <br> <input class="form-control" readonly
                                            id="" name="cf_name" value="{{ $customers->cf_name }}" type="text"
                                            placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-5 spacing-left spacing-right"> Designation <br> <input
                                            class="form-control" readonly id="head_office_email" name="cf_desig"
                                            value="{{ $customers->cf_desig }}" type="text" placeholder="..."
                                            style="width: 100%;"> </div>
                                    <div class="col-lg-6 spacing-right"> Cell Number <br> <input class="form-control"
                                            readonly id="" name="cf_no" value="{{ $customers->cf_no }}" type="text"
                                            placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-6 spacing-right"> Email <br> <input class="form-control" readonly
                                            id="head_office_name" name="cf_email" value="{{ $customers->cf_email }}"
                                            type="text" placeholder="..." style="width: 100%;"> </div>
                                </div>
                            </div>
                            <div class="col-lg-6 spacing-left">
                                <h5>Address</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right"> Office No <br> <input class="form-control"
                                            readonly id="" name="cf_office" value="{{ $customers->cf_office }}"
                                            type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-5 spacing-left"> Floor <br> <input class="form-control" readonly
                                            id="head_office_cell_no" name="cf_floor" value="{{ $customers->cf_floor }}"
                                            type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-5 spacing-left"> Building <br> <input class="form-control"
                                            readonly id="" name="cf_building" value="{{ $customers->cf_building }}"
                                            type="text" placeholder="..." style="width: 100%;"> </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right"> Block <br> <input class="form-control" readonly
                                            id="" name="cf_block" value="{{ $customers->cf_block }}" type="text"
                                            placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-5 spacing-left"> Area <br> <input class="form-control" readonly
                                            id="" name="cf_area" value="{{ $customers->cf_area }}" type="text"
                                            placeholder="..." style="width: 100%;"> </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right"> City <br> <input class="form-control" readonly
                                            id="" name="cf_city" value="{{ $customers->cf_city }}" type="text"
                                            placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-5 spacing-left"> Photograph of Location <br> <input
                                            class="form-control" readonly id="" name="cf_photo"
                                            value="{{ $customers->cf_photo }}" type="file" placeholder="..."
                                            style="width: 100%;">
                                        @if ($customers->cf_photo)
                                            <div class="col-lg-12 mt-2" style="display: flex; gap:3px">
                                                <div class="file-preview" style="cursor: pointer;"
                                                    data-file="{{ asset($customers->cf_photo) }}"
                                                    data-extension="{{ pathinfo($customers->cf_photo, PATHINFO_EXTENSION) }}"
                                                    onclick="openFileModal(this)">
                                                    {!! getFilePreview($customers->cf_photo) !!}
                                                </div>
                                                <!-- Delete Button --> <a class="deltebutton"
                                                    href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'cf_photo']) }}"
                                                    onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                            </div>
                                        @else
                                            <p class="text-center text-secondary">Attachment not found</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-5 spacing-right"> Pin Location <br> <input class="form-control"
                                            readonly id="" name="cf_pin" value="{{ $customers->cf_pin }}" type="text"
                                            placeholder="..." style="width: 100%;"> </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-left spacing-right mt-2"> Notes <br>
                                        <textarea id="w3review2" class="form-control" readonly name="cf_note"
                                            oninput="trimSpaces2()" onclick="moveCursorToStart2()" rows="2"
                                            cols="38">{{ $customers->cf_note }} </textarea>
                                    </div>
                                    <div class="col-lg-6 spacing-left spacing-right mt-2"> Attachements <br> <input
                                            class="form-control" readonly name="cf_attach"
                                            value="{{ $customers->cf_attach }}" type="file" placeholder="..."
                                            style="width: 70%;" multiple>
                                        @if ($customers->cf_attach)
                                            <div class="col-lg-12 mt-2" style="display: flex; gap:3px">
                                                <div class="file-preview" style="cursor: pointer;"
                                                    data-file="{{ asset($customers->cf_attach) }}"
                                                    data-extension="{{ pathinfo($customers->cf_attach, PATHINFO_EXTENSION) }}"
                                                    onclick="openFileModal(this)">
                                                    {!! getFilePreview($customers->cf_attach) !!}
                                                </div>
                                                <!-- Delete Button --> <a class="deltebutton"
                                                    href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'cf_attach']) }}"
                                                    onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                            </div>
                                        @else
                                            <p class="text-center text-secondary">Attachment not found</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-3">List OF Currency</h5>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right form-group"> List Of Currency <br>
                            <div class="input-group" style="width: 100%;"> <input class="form-control" readonly id=""
                                    name="list_curr" value="{{ $customers->list_curr }}" type="text" placeholder="..."
                                    style="width: 100%;"> </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-12 spacing-right"> List Of Provinces<br>
                                <div class="form-check form-check-inline"> <input class="form-check-input" name="fbr"
                                        type="checkbox" id="inlineCheckbox1" {{ $customers->fbr ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineCheckbox1">FBR.</label> </div>
                                <div class="form-check form-check-inline"> <input class="form-check-input"
                                        id="compliances" name="pra" type="checkbox" id="inlineCheckbox2" {{ $customers->pra ? 'checked' : '' }}> <label class="form-check-label"
                                        for="inlineCheckbox2">PRA</label> </div>
                                <div class="form-check form-check-inline"> <input class="form-check-input"
                                        id="compliances" name="kpra" type="checkbox" id="inlineCheckbox2" {{ $customers->kpra ? 'checked' : '' }}> <label class="form-check-label"
                                        for="inlineCheckbox2">KPRA</label> </div>
                                <div class="form-check form-check-inline"> <input class="form-check-input"
                                        id="compliances" name="srb" type="checkbox" id="inlineCheckbox2" {{ $customers->srb ? 'checked' : '' }}> <label class="form-check-label"
                                        for="inlineCheckbox2">SRB</label> </div>
                                <div class="form-check form-check-inline"> <input class="form-check-input"
                                        id="compliances" name="bra" type="checkbox" id="inlineCheckbox2" {{ $customers->bra ? 'checked' : '' }}> <label class="form-check-label"
                                        for="inlineCheckbox2">BRA</label> </div>
                                <div class="form-check form-check-inline"> <input class="form-check-input"
                                        id="compliances" name="ajk" type="checkbox" id="inlineCheckbox2" {{ $customers->ajk ? 'checked' : '' }}> <label class="form-check-label"
                                        for="inlineCheckbox2">AJK</label> </div>
                                <div class="form-check form-check-inline"> <input class="form-check-input"
                                        id="compliances" name="gb" type="checkbox" id="inlineCheckbox2" {{ $customers->gb ? 'checked' : '' }}> <label class="form-check-label"
                                        for="inlineCheckbox2">GB</label> </div>
                                <div class="form-check form-check-inline"> <input class="form-check-input"
                                        id="compliances" name="all" type="checkbox" id="inlineCheckbox2" value="">
                                    <label class="form-check-label" for="inlineCheckbox2">ALL</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 spacing-right"> Attachment <br> <input class="form-control" readonly id=""
                                name="currency_attach" value="{{ $customers->currency_attach }}" type="file"
                                placeholder="..." style="width: 100%;">
                            @if ($customers->currency_attach)
                                                    <div class="col-lg-12 mt-2" style="display: flex; gap:3px">
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($customers->currency_attach) }}"
                                                            data-extension="{{ pathinfo($customers->currency_attach, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)"> {!!
                                getFilePreview($customers->currency_attach) !!} </div>
                                                        <!-- Delete Button --> <a class="deltebutton"
                                                            href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'currency_attach']) }}"
                                                            onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                                    </div>
                            @else
                                <p class="text-center text-secondary">Attachment not found</p>
                            @endif
                        </div>
                        <div class="col-lg-6 spacing-right"> Notes <br>
                            <textarea class="form-control" readonly id="w3review3" oninput="trimSpaces3()"
                                onclick="moveCursorToStart3()" name="currency_note" type="text" placeholder="..."
                                style="width: 100%;">{{ $customers->currency_note }}</textarea>
                        </div>
                    </div>
                </div>
                <h5 class="mb-2" style="text-align:center"><i><b>Salary and Other Benefits :</b></i></h5>
                <div class=" row main-content div">
                    <div class="col-lg-12">
                        <div class="row mb-2">
                            <div class="col-lg-3 spacing-right"> Category : <br> <input class="form-control" readonly
                                    id="" name="cat_name" value="{{ $customers->cat_name }}" type="text"
                                    placeholder="..." style="width: 100%;"> </div>
                            <div class="col-lg-3 spacing-left spacing-right"> Salary of [Category] <br> <input
                                    class="form-control" readonly id="head_office_email"
                                    value="{{ $customers->sal_cat }}" name="sal_cat" type="text" placeholder="..."
                                    style="width: 100%;"> </div>
                            <div class="col-lg-3 spacing-right"> Salary for No. of days <br> <input class="form-control"
                                    readonly id="" value="{{ $customers->sal_days }}" name="sal_days" type="text"
                                    placeholder="..." style="width: 100%;"> </div>
                            <div class="col-lg-3 spacing-right"> Leaves Allowed <br> <input class="form-control"
                                    readonly id="" name="leaves_a" value="{{ $customers->leaves_a }}" type="text"
                                    placeholder="..." style="width: 100%;"> </div>
                            <div class="col-lg-3 spacing-right"> Other Benefits <br> <input class="form-control"
                                    readonly id="" name="other_ben" value="{{ $customers->other_ben }}" type="text"
                                    placeholder="..." style="width: 100%;"> </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-6 spacing-left spacing-right mt-2"> Attachements <br> <input
                                class="form-control" readonly type="file" name="sal_attach"
                                value="{{ $customers->sal_attach }}" placeholder="..." style="width: 70%;" multiple>
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right mt-2"> Notes <br>
                            <textarea id="w3review4" oninput="trimSpaces4()" onclick="moveCursorToStart4()"
                                class="form-control" readonly name="sal_note" rows="2"
                                cols="38">{{ $customers->sal_note }} </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!--deployment details-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="education" role="tabpanel"
                aria-labelledby="nav-deployment-tab">
                <div class="row">
                    <h5 class="mb-2" style="text-align:center"><i><b>Manpower Deployment Plan :</b></i></h5>
                    @foreach ($customers->customermanpowers as $index => $manpowers)
                        <input type="hidden" name="customermanpowers[{{ $index }}][m_id]" value="{{ $manpowers->id }}">
                        <div class="row col-lg-12 manpower">
                            <div class="col-lg-6 spacing-right">
                                <div class="row mb-2">
                                    <div class="form-type col-lg-5 spacing-left"> Guard Post No <br> <input
                                            class="form-control" readonly type="text"
                                            name="customermanpowers[{{ $index }}][man_post]"
                                            value="{{ $manpowers->man_post }}" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right form-group"> Category <br>
                                        <div class="input-group" style="width: 100%;"> <input class="form-control" readonly
                                                name="customermanpowers[{{ $index }}][man_cat]"
                                                value="{{ $manpowers->man_cat }}" type="text" placeholder="..."
                                                style="width: 100%;"> </div>
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right form-group"> Uniform Type <br>
                                        <div class="input-group" style="width: 100%;"> <input class="form-control" readonly
                                                name="customermanpowers[{{ $index }}][man_uni]"
                                                value="{{ $manpowers->man_uni }}" type="text" placeholder="..."
                                                style="width: 100%;"> </div>
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right form-group"> Uniform Number <br>
                                        <div class="input-group" style="width: 100%;"> <input class="form-control" readonly
                                                name="customermanpowers[{{ $index }}][man_uni_no]"
                                                value="{{ $manpowers->man_uni_no }}" type="text" placeholder="..."
                                                style="width: 100%;"> </div>
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right form-group"> Weapon Type <br>
                                        <div class="input-group" style="width: 100%;"> <input class="form-control" readonly
                                                name="customermanpowers[{{ $index }}][man_weapon]"
                                                value="{{ $manpowers->man_weapon }}" type="text" placeholder="..."
                                                style="width: 100%;"> </div>
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right form-group"> Ammunition Type <br>
                                        <div class="input-group" style="width: 100%;"> <input class="form-control" readonly
                                                name="customermanpowers[{{ $index }}][man_ammu]"
                                                value="{{ $manpowers->man_ammu }}" type="text" placeholder="..."
                                                style="width: 100%;"> </div>
                                    </div>
                                    <div class="col-lg-5 spacing-left spacing-right form-group"> Equipment <br>
                                        <div class="input-group" style="width: 100%;"> <input class="form-control" readonly
                                                name="customermanpowers[{{ $index }}][man_equip]"
                                                value="{{ $manpowers->man_equip }}" type="text" placeholder="..."
                                                style="width: 100%;"> </div>
                                    </div>
                                    <div class="form-type col-lg-5 spacing-right"> Picture of Equipment <br> <input
                                            class="form-control" readonly
                                            name="customermanpowers[{{ $index }}][man_equip_attach]"
                                            value="{{ $manpowers->man_equip_attach }}" type="file" placeholder="..."
                                            style="width: 100%;">
                                        @if ($customers->man_equip_attach)
                                                                    <div class="col-lg-5 mt-2" style="display: flex; gap:3px">
                                                                        <div class="file-preview" style="cursor: pointer;"
                                                                            data-file="{{ asset($customers->man_equip_attach) }}"
                                                                            data-extension="{{ pathinfo($customers->man_equip_attach, PATHINFO_EXTENSION) }}"
                                                                            onclick="openFileModal(this)"> {!!
                                            getFilePreview($customers->man_equip_attach) !!} </div>
                                                                        <!-- Delete Button --> <a class="deltebutton"
                                                                            href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'man_equip_attach']) }}"
                                                                            onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                                                    </div>
                                        @else
                                            <p class="text-center text-secondary">Attachment not found</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 spacing-left">
                                <div class="row mb-3">
                                    <div class="form-type col-lg-6 spacing-right"> Shift Start date. <br> <input
                                            class="form-control" readonly
                                            name="customermanpowers[{{ $index }}][s_start_date]"
                                            value="{{ $manpowers->s_start_date }}" type="date" placeholder="..."
                                            style="width: 100%;"> </div>
                                    <div class="form-type col-lg-6 spacing-right"> Shift End date. <br> <input
                                            class="form-control" readonly name="customermanpowers[{{ $index }}][s_end_date]"
                                            value="{{ $manpowers->s_end_date }}" type="date" placeholder="..."
                                            style="width: 100%;"> </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-type col-lg-6 spacing-right"> Shift Start time. <br> <input
                                            class="form-control" readonly
                                            name="customermanpowers[{{ $index }}][s_start_time]"
                                            value="{{ $manpowers->s_start_time }}" type="time" placeholder="..."
                                            style="width: 100%;"> </div>
                                    <div class="form-type col-lg-6 spacing-right"> Shift End time. <br> <input
                                            class="form-control" readonly name="customermanpowers[{{ $index }}][s_end_time]"
                                            value="{{ $manpowers->s_end_time }}" type="time" placeholder="..."
                                            style="width: 100%;"> </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-type col-lg-6 spacing-right"> Deployment Start date. <br> <input
                                            class="form-control" readonly
                                            name="customermanpowers[{{ $index }}][man_start_date]"
                                            value="{{ $manpowers->man_start_date }}" type="date" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="form-type col-lg-6 spacing-right"> Deployment End date. <br> <input
                                            class="form-control" readonly
                                            name="customermanpowers[{{ $index }}][man_end_date]"
                                            value="{{ $manpowers->man_end_date }}" type="date" placeholder="..."
                                            style="width: 100%;"> </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-type col-lg-6 spacing-right"> Deployment Start time. <br> <input
                                            class="form-control" readonly
                                            name="customermanpowers[{{ $index }}][man_start_time]"
                                            value="{{ $manpowers->man_start_time }}" type="time" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="form-type col-lg-6 spacing-right"> Deployment End time. <br> <input
                                            class="form-control" readonly
                                            name="customermanpowers[{{ $index }}][man_end_time]"
                                            value="{{ $manpowers->man_end_time }}" type="time" placeholder="..."
                                            style="width: 100%;"> </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-type col-lg-6 spacing-right"> Quantity. <br> <input
                                            class="form-control" readonly name="customermanpowers[{{ $index }}][man_quan]"
                                            value="{{ $manpowers->man_quan }}" type="text" placeholder="..."
                                            style="width: 100%;"> </div>
                                    <div class="form-type col-lg-6 spacing-right"> Duty Hours. <br> <input
                                            class="form-control" readonly name="customermanpowers[{{ $index }}][man_hours]"
                                            value="{{ $manpowers->man_hours }}" type="text" placeholder="..."
                                            style="width: 100%;"> </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-type col-lg-6 spacing-right"> Post Orders / JD of Guard Post.
                                        <br> <input class="form-control" readonly
                                            name="customermanpowers[{{ $index }}][man_jd]" value="{{ $manpowers->man_jd }}"
                                            type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="form-type col-lg-6 spacing-right"> Any Special Instructions. <br>
                                        <input class="form-control" readonly
                                            name="customermanpowers[{{ $index }}][man_any_sp]"
                                            value="{{ $manpowers->man_any_sp }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-type col-lg-6 spacing-right"> Approved Leaves. <br> <input
                                            class="form-control" readonly name="customermanpowers[{{ $index }}][man_apr_l]"
                                            value="{{ $manpowers->man_apr_l }}" type="text" placeholder="..."
                                            style="width: 100%;"> </div>
                                    <div class="form-type col-lg-6 spacing-right"> Salary of total days. <br> <input
                                            class="form-control" readonly name="customermanpowers[{{ $index }}][man_salary]"
                                            value="{{ $manpowers->man_salary }}" type="text" placeholder="..."
                                            style="width: 100%;"> </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <h5>Patrolling Vehicle</h5>
                    <div class="row mb-3">
                        <div class="form-type col-lg-6 spacing-right"> Name <br> <input class="form-control" readonly
                                name="pat_name" value="{{ $customers->pat_name }}" type="text" placeholder="..."
                                style="width: 100%;"> </div>
                        <div class="form-type col-lg-6 spacing-right"> Model <br> <input class="form-control" readonly
                                name="pat_model" value="{{ $customers->pat_model }}" type="text" placeholder="..."
                                style="width: 100%;"> </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-type col-lg-6 spacing-right"> Make <br> <input class="form-control" readonly
                                name="pat_make" value="{{ $customers->pat_make }}" type="text" placeholder="..."
                                style="width: 100%;"> </div>
                        <div class="form-type col-lg-6 spacing-right"> Registration No. <br> <input class="form-control"
                                readonly value="{{ $customers->pat_reg }}" name="pat_reg" type="text" placeholder="..."
                                style="width: 100%;"> </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-type col-lg-6 spacing-right"> Quantity. <br> <input class="form-control"
                                readonly name="pat_quan" value="{{ $customers->pat_quan }}" type="text"
                                placeholder="..." style="width: 100%;"> </div>
                        <div class="form-type col-lg-6 spacing-right"> Price Per Unit. <br> <input class="form-control"
                                readonly name="pat_price" value="{{ $customers->pat_price }}" type="text"
                                placeholder="..." style="width: 100%;"> </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-type col-lg-6 spacing-right"> Total Value. <br> <input class="form-control"
                                readonly name="pat_val" value="{{ $customers->pat_val }}" type="text" placeholder="..."
                                style="width: 100%;"> </div>
                    </div>
                </div>
                <h5 class="mb-2" style="text-align:center"><i><b>Emergency Services :</b></i></h5>
                <div class="row" id="emergencyServices_add_fields">
                    @foreach ($customers->customeremergencies as $index => $emergencies)
                                        <input type="hidden" name="customeremergencies[{{ $index }}][e_id]" value="{{ $emergencies->id }}">
                                        <div class=" row main-content div">
                                            <div class="col-lg-6">
                                                <div class="row mb-2">
                                                    <div class="col-lg-6 spacing-left spacing-right form-group"> Emergency Services
                                                        <br> <input class="form-control" readonly
                                                            name="customeremergencies[{{ $index }}][emer_ser]"
                                                            value="{{ $emergencies->emer_ser }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-6 spacing-right"> Picture of Police Station <br> <input
                                                            class="form-control" readonly name="customeremergencies[{{ $index }}][emer_pic]"
                                                            value="{{ $emergencies->emer_pic }}" type="file" placeholder="..."
                                                            style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($emergencies->emer_pic) }}"
                                                                data-extension="{{ pathinfo($emergencies->emer_pic, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)"> {!! getFilePreview($emergencies->emer_pic)
                            !!} </div>
                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if ($customers->emer_pic)
                                                                <img src="{{ asset($customers->emer_pic) }}" alt="Image Preview42"
                                                                    class="image-preview__image42"
                                                                    style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                    class="image-preview__default-text42">Image Preview</span> @endif
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                    <h5>POC</h5>
                                                    <div class="col-lg-6 spacing-right"> Name. <br> <input class="form-control" readonly
                                                            id="" name="customeremergencies[{{ $index }}][emer_poc_name]"
                                                            value="{{ $emergencies->emer_poc_name }}" type="text" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                    <div class="col-lg-6 spacing-right"> Designation. <br> <input class="form-control"
                                                            readonly id="" name="customeremergencies[{{ $index }}][emer_poc_desig]"
                                                            value="{{ $emergencies->emer_poc_desig }}" type="text" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                    <div class="col-lg-6 spacing-right"> Cell Number. <br> <input class="form-control"
                                                            readonly id="" name="customeremergencies[{{ $index }}][emer_poc_cell]"
                                                            value="{{ $emergencies->emer_poc_cell }}" type="text" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                    <div class="col-lg-6 spacing-right"> Email. <br> <input class="form-control" readonly
                                                            id="" name="customeremergencies[{{ $index }}][emer_poc_email]"
                                                            value="{{ $emergencies->emer_poc_email }}" type="email" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                    <div class="col-lg-6 spacing-right"> Notes. <br>
                                                        <textarea class="form-control" readonly id="w3review5"
                                                            name="customeremergencies[{{ $index }}][emer_poc_notes]" type="notes"
                                                            oninput="trimSpaces5()" onclick="moveCursorToStart5()" placeholder="..."
                                                            style="width: 100%;">{{ $emergencies->emer_poc_notes }}</textarea>
                                                    </div>
                                                    <div class="col-lg-6 spacing-right"> Attachment <br> <input class="form-control"
                                                            readonly id="" name="customeremergencies[{{ $index }}][emer_poc_attach]"
                                                            value="{{ $emergencies->emer_poc_attach }}" type="file" placeholder="..."
                                                            style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($emergencies->emer_poc_attach) }}"
                                                                data-extension="{{ pathinfo($emergencies->emer_poc_attach, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)"> {!!
                            getFilePreview($emergencies->emer_poc_attach) !!} </div>
                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if ($emergencies->emer_poc_attach)
                                                                <img src="{{ asset($emergencies->emer_poc_attach) }}" alt="Image Preview42"
                                                                    class="image-preview__image42"
                                                                    style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                    class="image-preview__default-text42">Image
                                                                    Preview</span> @endif
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 spacing-left">
                                                <h5>Address :</h5>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right"> Office No <br> <input class="form-control" readonly
                                                            id="" value="{{ $emergencies->emer_office }}"
                                                            name="customeremergencies[{{ $index }}][emer_office]" type="text"
                                                            placeholder="..." style="width: 100%;"> </div>
                                                    <div class="col-lg-5 spacing-left"> Building <br> <input class="form-control" readonly
                                                            id="" value="{{ $emergencies->emer_building }}"
                                                            name="customeremergencies[{{ $index }}][emer_building]" type="text"
                                                            placeholder="..." style="width: 100%;"> </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right"> Block <br> <input class="form-control" readonly
                                                            id="" value="{{ $emergencies->emer_block }}"
                                                            name="customeremergencies[{{ $index }}][emer_block]" type="text"
                                                            placeholder="..." style="width: 100%;"> </div>
                                                    <div class="col-lg-5 spacing-left"> Area <br> <input class="form-control" readonly id=""
                                                            value="{{ $emergencies->emer_area }}"
                                                            name="customeremergencies[{{ $index }}][emer_area]" type="text"
                                                            placeholder="..." style="width: 100%;"> </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right"> City <br> <input class="form-control" readonly
                                                            id="" value="{{ $emergencies->emer_city }}"
                                                            name="customeremergencies[{{ $index }}][emer_city]" type="text"
                                                            placeholder="..." style="width: 100%;"> </div>
                                                    <div class="col-lg-5 spacing-left"> Photograph of Building <br> <input
                                                            class="form-control" readonly id="" value="{{ $emergencies->emer_loc }}"
                                                            name="customeremergencies[{{ $index }}][emer_loc]" type="file" placeholder="..."
                                                            style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($emergencies->emer_loc) }}"
                                                                data-extension="{{ pathinfo($emergencies->emer_loc, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)">
                                                                {!! getFilePreview($emergencies->emer_loc) !!}
                                                            </div>
                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if ($emergencies->emer_loc)
                                                                <img src="{{ asset($emergencies->emer_loc) }}" alt="Image Preview42"
                                                                    class="image-preview__image42"
                                                                    style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                    class="image-preview__default-text42">Image Preview</span> @endif
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right"> Email <br> <input class="form-control" readonly
                                                            id="" name="customeremergencies[{{ $index }}][emer_email]"
                                                            value="{{ $emergencies->emer_email }}" type="text" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                    <div class="col-lg-5 spacing-left"> Website <br> <input class="form-control" readonly
                                                            id="" name="customeremergencies[{{ $index }}][emer_web]"
                                                            value="{{ $emergencies->emer_web }}" type="text" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-right"> Pin location <br> <input class="form-control"
                                                            readonly id="" name="customeremergencies[{{ $index }}][emer_pin]"
                                                            value="{{ $emergencies->emer_pin }}" type="text" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                    <div class="col-lg-5 spacing-left"> GPS <br> <input class="form-control" readonly id=""
                                                            name="customeremergencies[{{ $index }}][emer_gps]"
                                                            value="{{ $emergencies->emer_gps }}" type="text" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 spacing-left mt-2"> Applicable Rental Property Number <br> <input
                                                class="form-control" readonly name="customeremergencies[{{ $index }}][emer_app_rental]"
                                                value="{{ $emergencies->emer_app_rental }}" type="text" placeholder="..."
                                                style="width: 70%;" multiple> </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 spacing-left spacing-right mt-2"> Attachements <br> <input
                                                    class="form-control" readonly name="customeremergencies[{{ $index }}][emer_attach]"
                                                    value="{{ $emergencies->emer_attach }}" type="file" placeholder="..."
                                                    style="width: 70%;" multiple>
                                                <div class="col-lg-5 spacing-right">
                                                    <div class="file-preview" style="cursor: pointer;"
                                                        data-file="{{ asset($emergencies->emer_attach) }}"
                                                        data-extension="{{ pathinfo($emergencies->emer_attach, PATHINFO_EXTENSION) }}"
                                                        onclick="openFileModal(this)"> {!! getFilePreview($emergencies->emer_attach)
                        !!} </div>
                                                    {{-- <div class="image-preview42" id="imagePreview42">
                                                        @if ($emergencies->emer_attach)
                                                        <img src="{{ asset($emergencies->emer_attach) }}" alt="Image Preview42"
                                                            class="image-preview__image42"
                                                            style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                            class="image-preview__default-text42">Image Preview</span> @endif
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 spacing-left spacing-right mt-2"> Notes <br>
                                                <textarea id="w3review6" class="form-control" readonly
                                                    name="customeremergencies[{{ $index }}][emer_note]" oninput="trimSpaces6()"
                                                    onclick="moveCursorToStart6()" rows="2"
                                                    cols="38">{{ $emergencies->emer_note }} </textarea>
                                            </div>
                                        </div>
                    @endforeach
                </div> {{-- <div style="width: 50%;">
                    <button class="btn btn-primary" type="button" onclick="emergencyServices_add_fields()">Add
                        More</button>
                </div> --}}
            </div>
            <hr>
            <!--Address-->
            <div class="tab-pane fade  m-3" style="opacity: 90%;" id="guaranter-details" role="tabpanel"
                aria-labelledby="nav-contact-tab">
                <div class="row add-more">
                    @foreach ($customers->customerdepartments as $index => $departments)
                                    <input type="hidden" name="customerdepartments[{{ $index }}][d_id]" value="{{ $departments->id }}">
                                    <div class=" row main-content div" id="department_add_fields">
                                        <div class="spacing-right form-group"> Department Type <br> <input class="form-control" readonly
                                                id="" name="customerdepartments[{{ $index }}][dept_type]"
                                                value="{{ $departments->dept_type }}" type="text" placeholder="..."
                                                style="width: 100%;"> </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right"> POC Name <br> <input class="form-control" readonly
                                                        name="customerdepartments[{{ $index }}][dept_name]"
                                                        value="{{ $departments->dept_name }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-5 spacing-left spacing-right"> Email <br> <input class="form-control"
                                                        readonly name="customerdepartments[{{ $index }}][dept_email]"
                                                        value="{{ $departments->dept_email }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-6 spacing-right"> Cell Number <br> <input class="form-control"
                                                        readonly name="customerdepartments[{{ $index }}][dept_cell]"
                                                        value="{{ $departments->dept_cell }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-5 spacing-left spacing-right"> Address <br> <input
                                                        class="form-control" readonly
                                                        name="customerdepartments[{{ $index }}][dept_address]"
                                                        value="{{ $departments->dept_address }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-6  spacing-right"> Designation <br> <input class="form-control"
                                                        readonly name="customerdepartments[{{ $index }}][dept_desig]"
                                                        value="{{ $departments->dept_desig }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-5 spacing-left spacing-right"> Visiting Card (front) <br>
                                                    <input class="form-control" readonly
                                                        name="customerdepartments[{{ $index }}][dept_front]"
                                                        value="{{ $departments->dept_front }}" type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6  spacing-right"> Visiting Card (back) <br> <input
                                                        class="form-control" readonly
                                                        name="customerdepartments[{{ $index }}][dept_back]"
                                                        value="{{ $departments->dept_back }}" type="file" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-6 spacing-left spacing-right"> Notes <br>
                                                    <textarea id="w3review7" class="form-control" readonly
                                                        name="customerdepartments[{{ $index }}][dept_notes]" oninput="trimSpaces7()"
                                                        onclick="moveCursorToStart7()" rows="2"
                                                        cols="24">{{ $departments->dept_notes }} </textarea>
                                                </div>
                                                <div class="col-lg-6 spacing-right"> Attachments <br> <input class="form-control"
                                                        readonly name="customerdepartments[{{ $index }}][dept_attach]"
                                                        value="{{ $departments->dept_attach }}" type="file" placeholder="..."
                                                        style="width: 100%;" multiple>
                                                    <div class="file-preview" style="cursor: pointer;"
                                                        data-file="{{ asset($departments->dept_attach) }}"
                                                        data-extension="{{ pathinfo($departments->dept_attach, PATHINFO_EXTENSION) }}"
                                                        onclick="openFileModal(this)"> {!!
                        getFilePreview($departments->dept_attach) !!} </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 spacing-left">
                                            <h5>Address</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right"> Office No <br> <input class="form-control" readonly
                                                        name="customerdepartments[{{ $index }}][dept_office]"
                                                        value="{{ $departments->dept_office }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-5 spacing-left"> Building <br> <input class="form-control" readonly
                                                        name="customerdepartments[{{ $index }}][dept_build]"
                                                        value="{{ $departments->dept_build }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right"> Block <br> <input class="form-control" readonly
                                                        name="customerdepartments[{{ $index }}][dept_block]"
                                                        value="{{ $departments->dept_block }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-5 spacing-left"> Area <br> <input class="form-control" readonly
                                                        name="customerdepartments[{{ $index }}][dept_area]"
                                                        value="{{ $departments->dept_area }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right"> City <br> <input class="form-control" readonly
                                                        name="customerdepartments[{{ $index }}][dept_city]"
                                                        value="{{ $departments->dept_city }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-5 spacing-left"> Photograph of building <br> <input
                                                        class="form-control" readonly
                                                        name="customerdepartments[{{ $index }}][dept_photo]"
                                                        value="{{ $departments->dept_photo }}" type="file" placeholder="..."
                                                        style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($departments->dept_photo) }}"
                                                            data-extension="{{ pathinfo($departments->dept_photo, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)"> {!!
                        getFilePreview($departments->dept_photo) !!} </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if ($departments->dept_photo)
                                                            <img src="{{ asset($departments->dept_photo) }}" alt="Image Preview42"
                                                                class="image-preview__image42"
                                                                style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                class="image-preview__default-text42">Image Preview</span> @endif
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right"> Pin Location <br> <input class="form-control"
                                                        readonly name="customerdepartments[{{ $index }}][dept_pin]"
                                                        value="{{ $departments->dept_pin }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-5 spacing-left"> GPS <br> <input class="form-control" readonly
                                                        name="customerdepartments[{{ $index }}][dept_gps]"
                                                        value="{{ $departments->dept_gps }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right mt-2"> Attachments <br> <input class="form-control"
                                                        readonly name="customerdepartments[{{ $index }}][dept_ex_attach]"
                                                        value="{{ $departments->dept_ex_attach }}" type="file" placeholder="..."
                                                        style="width: 70%;" multiple>
                                                    <div class="col-lg-5 spacing-right">
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($departments->dept_ex_attach) }}"
                                                            data-extension="{{ pathinfo($departments->dept_ex_attach, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)"> {!!
                        getFilePreview($departments->dept_ex_attach) !!} </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if ($departments->dept_ex_attach)
                                                            <img src="{{ asset($departments->dept_ex_attach) }}" alt="Image Preview42"
                                                                class="image-preview__image42"
                                                                style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                class="image-preview__default-text42">Image
                                                                Preview</span> @endif
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 spacing-left mt-2"> Notes <br>
                                                    <textarea id="w3review8" class="form-control" readonly
                                                        name="customerdepartments[{{ $index }}][dept_ex_notes]" oninput="trimSpaces8()"
                                                        onclick="moveCursorToStart8()" rows="2"
                                                        cols="38">{{ $departments->dept_ex_notes }} </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    @endforeach {{-- <div style="width: 50%;">
                        <button class="btn btn-primary" type="button" onclick="department_add_fields()">Add
                            More</button>
                    </div> --}}
                </div>
            </div>
            <hr>
            <!--Patrolling Section-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="patrolling" role="tabpanel"
                aria-labelledby="nav-loto-tab">
                <div class="row d-flex justify-content-end align-items-center">
                    <div class="row d-flex justify-content-end align-items-center">
                        <div class="col-lg-12">
                            <h5 class="mb-2" style="text-align:center"><i><b>Supervisor Visit Logs Here :</b></i>
                            </h5>
                            <div class="row mb-2 mt-3">
                                <div class="col-lg-4 spacing-right"> Visit Performed By: <br> <input
                                        class="form-control" readonly type="text"
                                        value="{{ $customers->visit_perf_by }}" name="visit_perf_by" placeholder="..."
                                        style="width: 100%;"> </div>
                                <div class="col-lg-4 spacing-right"> Location: <br> <input class="form-control" readonly
                                        type="text" name="pat_super_loc" value="{{ $customers->pat_super_loc }}"
                                        placeholder="..." style="width: 100%;"> </div>
                                <div class="col-lg-4 spacing-right"> Date: <br> <input class="form-control" readonly
                                        name="pat_super_date" value="{{ $customers->pat_super_date }}" type="date"
                                        placeholder="..." style="width: 100%;"> </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-4 spacing-right"> Day: <br> <input class="form-control" readonly
                                        type="text" name="pat_super_day" value="{{ $customers->pat_super_day }}"
                                        placeholder="..." style="width: 100%;"> </div>
                                <div class="col-lg-4 spacing-right"> Time: <br> <input class="form-control" readonly
                                        type="time" name="pat_super_times" value="{{ $customers->pat_super_times }}"
                                        placeholder="..." style="width: 100%;"> </div>
                                <div class="col-lg-4 spacing-right ">
                                    <div class=""> Photo Taken: <br> <input class="form-control" readonly
                                            value="{{ $customers->pat_super_photo }}" name="pat_super_photo" type="file"
                                            placeholder="..." style="width: 100%;"> </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-4 spacing-right ">
                                    <div class=""> Video Taken: <br> <input class="form-control " readonly
                                            name="pat_super_video" value="{{ $customers->pat_super_videp }}" type="file"
                                            placeholder="..." style="width: 100%;"> </div>
                                </div>
                                <div class="col-lg-4 mt-3 spacing-right "> Inform Client about the visit via email:
                                    <br>
                                    <div class="form-check form-check-inline"> <input class="form-check-input mr-2"
                                            type="radio" name="pat_super_inform_email" value="1" id="activeEmailRadio">
                                        <label class="form-check-label" for="activeEmailRadio">Yes</label> <input
                                            class="form-check-input ml-3 mr-2" type="radio"
                                            name="pat_super_inform_email" value="0" id="inactiveEmailRadio">
                                        <label class="form-check-label" for="inactiveEmailRadio">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3">
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
            </div>
            <hr>
            <!--Site-->
            <!-- <div class="tab-pane fade m-3" style="opacity: 90%;" id="site" role="tabpanel" aria-labelledby="nav-loto-tab">
 <div class="row">
  <div class="col-lg-12 spacing-right">
   <h5 class="mb-2" style="text-align:center"><i><b>Inspection Performed By :</b></i></h5>
   {{-- <div class="mt-2">
                                            <button class="btn btn-danger" type="button" id="add_inspection_btn">
                                                Add Inspection
                                            </button>
                                        </div> --}}
   <div id="inspectionDiv">
    @foreach ($customers->customerinspections as $index => $inspections)
    <div id="inspectionInfo"> <input type="hidden" name="customerinspections[{{ $index }}][i_id]" value="{{ $inspections->id }}">
     <div class="row mb-2">
      <div class="col-lg-4 spacing-right"> Inspection Number <br> <input class="form-control" readonly type="text"
        name="customerinspections[{{ $index }}][inspection_no]" value="{{ $inspections->inspection_no }}" placeholder="..." style="width: 100%;"> </div>
      <div class="col-lg-4 spacing-right"> Employee id <br> <input class="form-control" readonly type="text"
        name="customerinspections[{{ $index }}][inspection_emp_id]" value="{{ $inspections->inspection_emp_id }}" placeholder="..." style="width: 100%;"> </div>
      <div class="col-lg-4 spacing-right"> Name <br> <input class="form-control" readonly type="text"
        name="customerinspections[{{ $index }}][inspection_emp_name]" value="{{ $inspections->inspection_emp_name }}" placeholder="..." style="width: 100%;">
      </div>
     </div>
     <div class="row mb-2">
      <div class="col-lg-4 spacing-right"> Cell Number: <br> <input class="form-control" readonly type="text"
        name="customerinspections[{{ $index }}][inspection_emp_cell]" value="{{ $inspections->inspection_emp_cell }}" placeholder="" style="width: 100%;">
      </div>
      <div class="col-lg-4 spacing-right"> Department <br> <input class="form-control" readonly type="text"
        name="customerinspections[{{ $index }}][inspection_emp_dept]" value="{{ $inspections->inspection_emp_dept }}" placeholder="..." style="width: 100%;">
      </div>
      <div class="col-lg-4 spacing-left" style="margin-left:8px;"> Date of
       inspection. <br> <input class="form-control" readonly type="date" name="customerinspections[{{ $index }}][inspection_date]"
        value="{{ $inspections->inspection_date }}" placeholder="..." style="width: 100%;"> </div>
      <div class="col-lg-4 spacing-left"> Picture of Inspection <br> <input class="form-control basic-info-attachements" id="inpFile22" type="file"
        name="customerinspections[{{ $index }}][inspection_pic]" value="{{ $inspections->inspection_pic }}" placeholder="..." style="width: 100%;" multiple>
       <div class="col-lg-5 spacing-right">
        <div class="file-preview" style="cursor: pointer;" data-file="{{ asset($inspections->inspection_pic) }}"
         data-extension="{{ pathinfo($inspections->inspection_pic, PATHINFO_EXTENSION) }}" onclick="openFileModal(this)"> {!!
         getFilePreview($inspections->inspection_pic) !!} </div>
        {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if ($inspections->inspection_pic)
                                                                <img src="{{ asset($inspections->inspection_pic) }}" alt="Image Preview42"
        class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;"> @else <span class="image-preview__default-text42">Image
         Preview</span> @endif
       </div> --}}
      </div>
     </div>
     <div class="col-lg-4 spacing-right"> Remarks of Petroling Officer <br>
      <textarea readonly class="form-control basic-info-attachements" id="inpFile2" type="text" name="customerinspections[{{ $index }}][inspection_rem_petr]"
       placeholder="..." style="width: 100%;">{{ $inspections->inspection_rem_petr }}</textarea>
     </div>
    </div>
    <div class="row">
     <div class="col-lg-3"> Notes <br>
      <textarea readonly class="form-control basic-info-attachements" type="text" name="customerinspections[{{ $index }}][inspection_note]" placeholder="..."
       style="width: 100%;">{{ $inspections->inspection_note }}</textarea>
     </div>
     <div class="col-lg-3 spacing-left"> Attachments <br> <input class="form-control basic-info-attachements" id="" type="file"
       name="customerinspections[{{ $index }}][inspection_attach]" value="{{ $inspections->inspection_attach }}" placeholder="..." style="width: 100%;"
       multiple>
      <div class="col-lg-5 spacing-right">
       <div class="file-preview" style="cursor: pointer;" data-file="{{ asset($inspections->inspection_attach) }}"
        data-extension="{{ pathinfo($inspections->inspection_attach, PATHINFO_EXTENSION) }}" onclick="openFileModal(this)"> {!!
        getFilePreview($inspections->inspection_attach) !!} </div>
       {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if ($inspections->inspection_attach)
                                                                <img src="{{ asset($inspections->inspection_attach) }}" alt="Image Preview42"
       class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;"> @else <span class="image-preview__default-text42">Image
        Preview</span> @endif
      </div> --}}
     </div>
    </div>
   </div> {{-- <div class="mt-2">
                                                    <button class="btn btn-primary" type="button" id="add_inspection_btn" onclick="addInspectionSection()">
                                                        Add Inspection
                                                    </button>
                                                </div> --}}
  </div> {{-- <div class="mt-2">
                                                <button class="btn btn-danger" type="button" id="remove_inspection_btn">
                                                    Remove Inspection
                                                </button>
                                            </div> --}}
  @endforeach
 </div>
</div>
</div>
</div> -->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="site" role="tabpanel"
                aria-labelledby="nav-loto-tab">
                <div class="row">
                    <div class="col-lg-12 spacing-right">
                        <h5 class="mb-2" style="text-align:center"><i><b>Inspection Performed By :</b></i></h5>
                        {{-- <div class="mt-2">
                            <button class="btn btn-danger" type="button" id="add_inspection_btn">
                                Add Inspection
                            </button>
                        </div> --}}
                        <!-- Inspection Summary Table -->
                        <div class="table-responsive bg-light p-3">
                            <table class="table table-striped table-bordered table-light text-center mb-0" id="inspectionTable">
                                <thead class="table">
                                    <tr>
                                        <th>Inspection Number</th>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Cell Number</th>
                                        <th>Department</th>
                                        <th>Date</th>
                                        <th>Picture</th>
                                        <th>Remarks</th>
                                        <th>Notes</th>
                                        <th>Attachments</th>
                                        <th>View Questions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers->customerinspections as $inspection)
                                        <tr>
                                            <td>{{ $inspection->inspection_no }}</td>
                                            <td>{{ $inspection->inspection_emp_id }}</td>
                                            <td>{{ $inspection->inspection_emp_name }}</td>
                                            <td>{{ $inspection->inspection_emp_cell }}</td>
                                            <td>{{ $inspection->inspection_emp_dept }}</td>
                                            <td>{{ $inspection->inspection_date }}</td>
                                            <td>
                                                @if($inspection->inspection_pic)
                                                    <div class="file-preview"
                                                        style="cursor:pointer; display:inline-block z-index:;"
                                                        data-file="{{ asset($inspection->inspection_pic) }}"
                                                        data-extension="{{ pathinfo($inspection->inspection_pic, PATHINFO_EXTENSION) }}"
                                                        onclick="openFileModal(this)">
                                                        {!! getFilePreview($inspection->inspection_pic) !!}
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $inspection->inspection_rem_petr }}</td>
                                            <td>{{ $inspection->inspection_note }}</td>
                                            <td>
                                                @if($inspection->inspection_attach)
                                                    <div class="file-preview" style="cursor:pointer; display:inline-block;"
                                                        data-file="{{ asset($inspection->inspection_attach) }}"
                                                        data-extension="{{ pathinfo($inspection->inspection_attach, PATHINFO_EXTENSION) }}"
                                                        onclick="openFileModal(this)">
                                                        {!! getFilePreview($inspection->inspection_attach) !!}
                                                    </div>
                                                @endif
                                            </td>
                                            <td><button class="btn btn-sm btn-info view-questions-btn me-1" data-inspection-id="{{ $inspection->id }}" data-customer-id="{{ $customers->id }}">
                                                    <i class="bi bi-eye"></i> View
                                                </button></td>
                                                

                                                <td>
                                                <!-- Edit Button triggers modal -->
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-toggle="modal" data-bs-target="#editInspectionModal{{ $inspection->id }}">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <!-- Delete Form -->


                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="deleteInspection({{ $inspection->id }})">
                                                    <i class="fa fa-trash"></i>
                                                </button>


                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                      

                        <!-- Pagination Controls -->
                        <nav aria-label="Inspection pagination" class="mt-3">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item">
                                    <a class="page-link" href="#" onclick="changePage(-1)" id="prevBtn">Previous</a>
                                </li>
                                <li class="page-item">
                                    <span class="page-link" id="pageInfo">Page 1 of <span
                                            id="totalPages">1</span></span>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" onclick="changePage(1)" id="nextBtn">Next</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- <script>
                            let currentPage = 1;
                            const recordsPerPage = 10;
                            let totalRecords = {{ $customers->customerinspections->count() }};

                            function showPage(page) {
                                const rows = document.querySelectorAll('#inspectionTable tbody tr');
                                rows.forEach(row => row.style.display = 'none');

                                const start = (page - 1) * recordsPerPage;
                                const end = Math.min(start + recordsPerPage, totalRecords);

                                for (let i = start; i < end; i++) {
                                    if (rows[i]) rows[i].style.display = 'table-row';
                                }

                                const totalPages = Math.ceil(totalRecords / recordsPerPage);
                                document.getElementById('pageInfo').innerHTML = `Page ${page} of ${totalPages}`;
                                currentPage = page;

                                document.getElementById('prevBtn').parentElement.classList.toggle('disabled', page === 1);
                                document.getElementById('nextBtn').parentElement.classList.toggle('disabled', page === totalPages);

                                // Add data-labels for mobile responsiveness
                                const headers = ['Inspection Number', 'Employee ID', 'Name', 'Cell Number', 'Department', 'Date', 'Picture', 'Remarks', 'Notes', 'Attachments'];
                                const cells = document.querySelectorAll('#inspectionTable td');
                                cells.forEach((cell, index) => {
                                    const colIndex = index % 10;
                                    if (headers[colIndex]) cell.dataset.label = headers[colIndex];
                                });
                            }

                            function changePage(direction) {
                                const totalPages = Math.ceil(totalRecords / recordsPerPage);
                                let newPage = currentPage + direction;

                                if (newPage < 1) newPage = 1;
                                if (newPage > totalPages) newPage = totalPages;

                                showPage(newPage);
                            }

                            document.addEventListener('DOMContentLoaded', () => {
                                if (totalRecords > 0) {
                                    showPage(1);
                                }

                                // View Questions Modal functionality
                                document.querySelectorAll('.view-questions-btn').forEach(btn => {
                                    btn.addEventListener('click', function() {
                                        const inspectionId = this.dataset.inspectionId;
                                        const customerId = this.dataset.customerId;
                                        loadQuestions(customerId, inspectionId);
                                    });
                                });
                            });

                            async function loadQuestions(customerId, inspectionId) {
                                const modal = new bootstrap.Modal(document.getElementById('questionsModal'));
                                const content = document.getElementById('questionsContent');
                                
                                content.innerHTML = `
                                    <div class="text-center">
                                        <div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                `;
                                
                                modal.show();

                                try {
                                    const response = await fetch(`/api/customer/${customerId}/inspection/${inspectionId}/questions`);
                                    const data = await response.json();
                                    
                                    if (data.success && data.data.length > 0) {
                                        let html = '<div class="accordion" id="questionsAccordion">';
                                        
                                        data.data.forEach((form, formIndex) => {
                                            html += `<div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button ${formIndex === 0 ? '' : 'collapsed'}" type="button" data-bs-toggle="collapse" data-bs-target="#formCollapse${formIndex}">
                                                        Form ${formIndex + 1} - Submitted: ${form.submitted_at}
                                                    </button>
                                                </h2>
                                                <div id="formCollapse${formIndex}" class="accordion-collapse collapse ${formIndex === 0 ? 'show' : ''}" data-bs-parent="#questionsAccordion">
                                                    <div class="accordion-body">
                                                        <div class="row g-3">`;
                                            
                                            form.answers.forEach(answer => {
                                                const question = answer.question;
                                                const selectedOption = answer.option ? answer.option.option_text : 'Custom';
                                                const customAnswer = answer.custom_answer || '';
                                                
                                                html += `
                                                        <div class="col-md-6">
                                                            <div class="card h-100 shadow-sm">
                                                                <div class="card-body">
                                                                    <h6 class="card-title fw-bold">${question.question}</h6>
                                                                    <div class="mb-2">
                                                                        <strong>Selected:</strong> ${selectedOption}
                                                                    </div>`;
                                            
                                                if (customAnswer) {
                                                    html += `<div class="mb-2">
                                                                <strong>Custom Answer:</strong> ${customAnswer}
                                                            </div>`;
                                                }
                                                
                                                if (question.options && question.options.length > 0) {
                                                    html += `<div><strong>Options:</strong><ul class="list-unstyled small text-muted">`;
                                                    question.options.forEach(option => {
                                                        html += `<li>${option.option_text}</li>`;
                                                    });
                                                    html += `</ul></div>`;
                                                }
                                                
                                                html += `</div></div></div>`;
                                            });
                                            
                                            html += `</div></div></div>`;
                                        });
                                        
                                        html += '</div>';
                                        content.innerHTML = html;
                                    } else {
                                        content.innerHTML = '<p class="text-center text-muted">No questions found for this inspection.</p>';
                                    }
                                } catch (error) {
                                    content.innerHTML = '<p class="text-center text-danger">Error loading questions. Please try again.</p>';
                                    console.error('Error:', error);
                                }
                            }
                        </script> -->
                        <script>
    let currentPage = 1;
    const recordsPerPage = 10;
    let totalRecords = {{ $customers->customerinspections->count() }};

    function showPage(page) {
        const rows = document.querySelectorAll('#inspectionTable tbody tr');
        rows.forEach(row => row.style.display = 'none');

        const start = (page - 1) * recordsPerPage;
        const end = Math.min(start + recordsPerPage, totalRecords);

        for (let i = start; i < end; i++) {
            if (rows[i]) rows[i].style.display = 'table-row';
        }

        const totalPages = Math.ceil(totalRecords / recordsPerPage);
        document.getElementById('pageInfo').innerHTML = `Page ${page} of ${totalPages}`;
        currentPage = page;

        document.getElementById('prevBtn').parentElement.classList.toggle('disabled', page === 1);
        document.getElementById('nextBtn').parentElement.classList.toggle('disabled', page === totalPages);

        // Mobile labels
        const headers = ['Inspection Number', 'Employee ID', 'Name', 'Cell Number', 'Department', 'Date', 'Picture', 'Remarks', 'Notes', 'Attachments'];
        const cells = document.querySelectorAll('#inspectionTable td');
        cells.forEach((cell, index) => {
            const colIndex = index % 10;
            if (headers[colIndex]) cell.dataset.label = headers[colIndex];
        });
    }

    function changePage(direction) {
        const totalPages = Math.ceil(totalRecords / recordsPerPage);
        let newPage = currentPage + direction;

        if (newPage < 1) newPage = 1;
        if (newPage > totalPages) newPage = totalPages;

        showPage(newPage);
    }

    document.addEventListener('DOMContentLoaded', () => {
        if (totalRecords > 0) {
            showPage(1);
        }

        // View Questions Button
document.querySelectorAll('.view-questions-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const inspectionId = this.dataset.inspectionId;
                const customerId = this.dataset.customerId;
                loadQuestions(customerId, inspectionId);
            });
        });
    });

async function loadQuestions(customerId, inspectionId) {
    // Safety: truncate and validate IDs to prevent 414 errors
    customerId = String(customerId).substring(0, 100).trim();
    inspectionId = String(inspectionId).substring(0, 100).trim();
    
    if (!customerId || !inspectionId) {
        showModalError('Invalid inspection ID');
        return;
    }

    const modal = new bootstrap.Modal(document.getElementById('questionsModal'));
    const content = document.getElementById('questionsContent');
    content.innerHTML = showModalLoading();

    // Store modal state for persistence
    sessionStorage.setItem('questionsModalState', JSON.stringify({
        isOpen: true,
        customerId,
        inspectionId,
        timestamp: Date.now()
    }));

    modal.show();

    try {
        // Use POST instead of GET to avoid URL length limits
        const response = await fetch('/api/customer/inspection/questions', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ customerId, inspectionId })
        });

        if (!response.ok) {
            if (response.status === 414) {
                throw new Error('Request too large - please contact support');
            }
            throw new Error(`HTTP ${response.status}: ${response.statusText}`);
        }

        const data = await response.json();

        if (data.success && data.data && data.data.length > 0) {
            content.innerHTML = renderQuestionsAccordion(data.data);
        } else {
            content.innerHTML = '<div class="alert alert-info text-center"><i class="bi bi-info-circle me-2"></i>No questions found for this inspection.</div>';
        }

    } catch (error) {
        console.error('Questions load error:', error);
        content.innerHTML = showModalError(`Failed to load questions: ${error.message}`);
    }
}

function showModalLoading() {
    return `
        <div class="d-flex justify-content-center align-items-center p-5">
            <div class="spinner-border text-primary me-3" role="status" style="width: 3rem; height: 3rem;">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div>
                <div class="fw-bold">Loading inspection questions...</div>
                <small class="text-muted">Please wait</small>
            </div>
        </div>
    `;
}

function showModalError(message) {
    return `
        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <div class="text-center p-4">
            <button class="btn btn-outline-primary" onclick="location.reload()">
                <i class="bi bi-arrow-clockwise"></i> Try Again
            </button>
        </div>
    `;
}

function renderQuestionsAccordion(forms) {
    let html = '<div class="accordion accordion-flush" id="questionsAccordion">';
    
    forms.forEach((form, formIndex) => {
        html += `
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button ${formIndex === 0 ? '' : 'collapsed'}" type="button" 
                            data-bs-toggle="collapse" data-bs-target="#formCollapse${formIndex}">
                        <i class="bi bi-clipboard-check me-2"></i>Form ${formIndex + 1} 
                        <span class="badge bg-info ms-2">${form.answers?.length || 0} Questions</span>
                        <small class="ms-2 text-muted">${form.submitted_at}</small>
                    </button>
                </h2>
                <div id="formCollapse${formIndex}" class="accordion-collapse collapse ${formIndex === 0 ? 'show' : ''}" 
                     data-bs-parent="#questionsAccordion">
                    <div class="accordion-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Question</th>
                                        <th>Options</th>
                                        <th>Custom Answer</th>
                                        <th>Selected</th>
                                    </tr>
                                </thead>
                                <tbody>`;
        
        if (form.answers && form.answers.length > 0) {
            form.answers.forEach(answer => {
                const question = answer.question || {};
                const selectedOption = answer.option ? answer.option.option_text : 'Custom Answer';
                const customAnswer = answer.custom_answer || '-';
                
                let optionsHtml = question.options?.length > 0 
                    ? question.options.map(opt => `<li>${opt.option_text}</li>`).join('')
                    : '<li class="text-muted">No options</li>';
                
                html += `
                    <tr>
                        <td class="fw-medium">${question.question || 'N/A'}</td>
                        <td><ul class="mb-0 small">${optionsHtml}</ul></td>
                        <td class="text-muted">${customAnswer}</td>
                        <td><span class="badge bg-success">${selectedOption}</span></td>
                    </tr>`;
            });
        } else {
            html += '<tr><td colspan="4" class="text-center text-muted py-4">No answers recorded</td></tr>';
        }
        
        html += `</tbody></table></div></div></div></div>`;
    });
    
    html += '</div>';
    return html;
}

// Restore modal state on page load
document.addEventListener('DOMContentLoaded', function() {
    const savedState = sessionStorage.getItem('questionsModalState');
    if (savedState) {
        try {
            const state = JSON.parse(savedState);
            if (state.isOpen && Date.now() - state.timestamp < 30000) { // 30s timeout
                // Re-trigger modal after DOM ready
                setTimeout(() => {
                    const btn = document.querySelector(`[data-inspection-id="${state.currentInspectionId}"]`);
                    if (btn) btn.click();
                }, 1000);
            }
        } catch (e) {
            console.warn('Invalid saved modal state');
        }
    }
});
</script>
                        <style>
                            #inspectionTable th,
                            #inspectionTable td {
                                vertical-align: top;
                                padding: 12px 8px;
                            }

                            #inspectionTable .form-control {
                                margin-top: 4px;
                            }

                            .file-preview img {
                                max-height: 60px;
                                max-width: 80px;
                            }

                            @media (max-width: 768px) {
                                #inspectionTable thead {
                                    display: none;
                                }

                                #inspectionTable tr {
                                    display: block;
                                    margin-bottom: 15px;
                                    border: 1px solid #ddd;
                                    padding: 10px;
                                    border-radius: 5px;
                                }

                                #inspectionTable td {
                                    display: block;
                                    text-align: right;
                                    position: relative;
                                    padding-left: 50%;
                                    border: none;
                                    padding-top: 8px;
                                }

                                #inspectionTable td:before {
                                    content: attr(data-label);
                                    position: absolute;
                                    left: 6px;
                                    width: 45%;
                                    font-weight: bold;
                                }
                            }
                        </style>

                        <script>
                            let currentPage = 1;
                            const recordsPerPage = 10;
                            let totalRecords = {{ $customers->customerinspections->count() }};

                            function showPage(page) {
                                const rows = document.querySelectorAll('#inspectionTable tbody tr');
                                rows.forEach((row, index) => {
                                    row.style.display = 'none';
                                });

                                const start = (page - 1) * recordsPerPage;
                                const end = start + recordsPerPage;

                                for (let i = start; i < Math.min(end, totalRecords); i++) {
                                    if (rows[i]) {
                                        rows[i].style.display = 'table-row';
                                    }
                                }

                                document.getElementById('pageInfo').innerHTML = `Page ${page} of ${Math.ceil(totalRecords / recordsPerPage)}`;
                                currentPage = page;

                                // Update buttons
                                document.getElementById('prevBtn').parentElement.classList.toggle('disabled', page === 1);
                                document.getElementById('nextBtn').parentElement.classList.toggle('disabled', page === Math.ceil(totalRecords / recordsPerPage));
                            }

                            function changePage(direction) {
                                const totalPages = Math.ceil(totalRecords / recordsPerPage);
                                let newPage = currentPage + direction;

                                if (newPage < 1) newPage = 1;
                                if (newPage > totalPages) newPage = totalPages;

                                showPage(newPage);
                            }

                            document.addEventListener('DOMContentLoaded', function () {
                                showPage(1);

                                // Add data-label for mobile
                                const headers = ['Inspection Number', 'Employee ID', 'Name', 'Cell Number', 'Department', 'Date', 'Picture', 'Remarks', 'Notes', 'Attachments'];
                                const cells = document.querySelectorAll('#inspectionTable td');
                                cells.forEach((cell, index) => {
                                    if (index % 10 === 0) cell.dataset.label = headers[0];
                                    else if (index % 10 === 1) cell.dataset.label = headers[1];
                                    // ... continue for all columns
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
            <hr>
            <!--Armourer-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="arm" role="tabpanel"
                aria-labelledby="nav-loto-tab">
                <div id="cleaningInfo">
                    <h5 class="mb-2" style="text-align:center"><i><b>Armourer Details :</b></i></h5>
                    @foreach ($customers->customerarmourers as $index => $armourers)
                                        <input type="hidden" name="customerarmourers[{{ $index }}][a_id]" value="{{ $armourers->id }}">
                                        <div class="row col-lg-12">
                                            <div class="col-lg-4 spacing-right"> Branch Name <br> <input class="form-control" readonly
                                                    type="text" name="customerarmourers[{{ $index }}][arm_branch_name]"
                                                    value="{{ $armourers->arm_branch_name }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-4 spacing-right"> Branch ID <br> <input class="form-control" readonly
                                                    type="text" name="customerarmourers[{{ $index }}][arm_branch_id]"
                                                    value="{{ $armourers->arm_branch_id }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-4 spacing-right"> Site ID <br> <input class="form-control" readonly
                                                    type="text" name="customerarmourers[{{ $index }}][arm_site_id]"
                                                    value="{{ $armourers->arm_site_id }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-4 spacing-right"> Client Name <br> <input class="form-control" readonly
                                                    type="text" name="customerarmourers[{{ $index }}][arm_client_name]"
                                                    value="{{ $armourers->arm_client_name }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-4 spacing-right"> Weapon Number <br> <input class="form-control" readonly
                                                    type="text" name="customerarmourers[{{ $index }}][arm_weapon_no]"
                                                    value="{{ $armourers->arm_weapon_no }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-4 spacing-right"> Weapon Bore <br> <input class="form-control" readonly
                                                    type="text" name="customerarmourers[{{ $index }}][arm_weapon_bore]"
                                                    value="{{ $armourers->arm_weapon_bore }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-4 spacing-right"> Weapon Type <br> <input class="form-control" readonly
                                                    type="text" name="customerarmourers[{{ $index }}][arm_weapon_type]"
                                                    value="{{ $armourers->arm_weapon_type }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-4 spacing-right"> Working Details <br> <input class="form-control" readonly
                                                    type="text" name="customerarmourers[{{ $index }}][arm_work_detail]"
                                                    value="{{ $armourers->arm_work_detail }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-4 spacing-right"> Sign of Customer <br> <input class="form-control" readonly
                                                    type="text" name="customerarmourers[{{ $index }}][arm_sign_cus]"
                                                    value="{{ $armourers->arm_sign_cus }}" placeholder="..." style="width: 100%;"> </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row mb-2">
                                                <div class="col-lg-4 spacing-right" style="margin-bottom: 10px;"> New Authority
                                                    Letter Issue : <br> <input class="form-control" readonly id=""
                                                        name="customerarmourers[{{ $index }}][arm_auth]" value="{{ $armourers->arm_auth }}"
                                                        type="text" placeholder="..." style="width: 100%;"> </div>
                                                <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;"> New
                                                    Authority Letter No <br> <input class="form-control" readonly id="head_office_email"
                                                        id="inpFile42" name="customerarmourers[{{ $index }}][arm_auth_no]"
                                                        value="{{ $armourers->arm_auth_no }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;"> New
                                                    Authority Letter Validity <br> <input class="form-control" readonly
                                                        id="head_office_email" name="customerarmourers[{{ $index }}][arm_auth_date]"
                                                        value="{{ $armourers->arm_auth_date }}" type="date" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-4 spacing-right" style="margin-bottom: 10px;"> Date of issue <br>
                                                    <input class="form-control" readonly id=""
                                                        name="customerarmourers[{{ $index }}][arm_auth_issue]"
                                                        value="{{ $armourers->arm_auth_issue }}" type="date" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                                                    Number of weapon cleaned <br> <input class="form-control" readonly
                                                        id="head_office_email" id="inpFile42"
                                                        name="customerarmourers[{{ $index }}][arm_weapon_cleaned]"
                                                        value="{{ $armourers->arm_weapon_cleaned }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;"> Type
                                                    of weapon cleaned <br> <input class="form-control" readonly id="head_office_email"
                                                        name="customerarmourers[{{ $index }}][type_weapon_cleaned]"
                                                        value="{{ $armourers->type_weapon_cleaned }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-4 spacing-right"> Picture before cleaning <br> <input
                                                        class="form-control" readonly id=""
                                                        name="customerarmourers[{{ $index }}][arm_pic_b]" type="file"
                                                        value="{{ $armourers->arm_pic_b }}" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($armourers->arm_pic_b) }}"
                                                            data-extension="{{ pathinfo($armourers->arm_pic_b, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)"> {!! getFilePreview($armourers->arm_pic_b) !!}
                                                        </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if ($armourers->arm_pic_b)
                                                            <img src="{{ asset($armourers->arm_pic_b) }}" alt="Image Preview42"
                                                                class="image-preview__image42"
                                                                style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                class="image-preview__default-text42">Image Preview</span> @endif
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 spacing-right"> Picture after cleaning <br> <input class="form-control"
                                                        readonly id="" name="customerarmourers[{{ $index }}][arm_pic_a]" type="file"
                                                        value="{{ $armourers->arm_pic_a }}" placeholder="..." style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($armourers->arm_pic_a) }}"
                                                            data-extension="{{ pathinfo($armourers->arm_pic_a, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)"> {!! getFilePreview($armourers->arm_pic_a) !!}
                                                        </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if ($armourers->arm_pic_a)
                                                            <img src="{{ asset($armourers->arm_pic_a) }}" alt="Image Preview42"
                                                                class="image-preview__image42"
                                                                style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                class="image-preview__default-text42">Image Preview</span> @endif
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 spacing-right"> Cost of the day <br> <input class="form-control"
                                                        readonly id="" name="customerarmourers[{{ $index }}][arm_cost_day]"
                                                        value="{{ $armourers->arm_cost_day }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-4 spacing-right"> Cost Bill <br> <input class="form-control" readonly
                                                        id="" name="customerarmourers[{{ $index }}][arm_cost_bill]"
                                                        value="{{ $armourers->arm_cost_bill }}" type="file" placeholder="..."
                                                        style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($armourers->arm_cost_bill) }}"
                                                            data-extension="{{ pathinfo($armourers->arm_cost_bill, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)"> {!! getFilePreview($armourers->arm_cost_bill)
                         !!} </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if ($armourers->arm_cost_bill)
                                                            <img src="{{ asset($armourers->arm_cost_bill) }}" alt="Image Preview42"
                                                                class="image-preview__image42"
                                                                style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                class="image-preview__default-text42">Image Preview</span> @endif
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 spacing-right"> Next cleaning activity due on : <br> <input
                                                        class="form-control" readonly id=""
                                                        name="customerarmourers[{{ $index }}][arm_next_clean]"
                                                        value="{{ $armourers->arm_next_clean }}" type="date" placeholder="..."
                                                        style="width: 100%;"> </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-4 spacing-right mt-2"> Notes <br>
                                                    <textarea id="w3review9" class="form-control" readonly
                                                        name="customerarmourers[{{ $index }}][arm_next_clean]" oninput="trimSpaces9()"
                                                        onclick="moveCursorToStart9()" rows="2"
                                                        cols="38">{{ $armourers->arm_next_clean }} </textarea>
                                                </div>
                                                <div class="col-lg-4 spacing-left spacing-right mt-2"> Attachments <br> <input
                                                        class="form-control" readonly
                                                        name="customerarmourers[{{ $index }}][arm_auth_attach]"
                                                        value="{{ $armourers->arm_auth_attach }}" type="file" placeholder="..."
                                                        style="width: 70%;" multiple>
                                                    <div class="col-lg-5 spacing-right">
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($armourers->arm_auth_attach) }}"
                                                            data-extension="{{ pathinfo($armourers->arm_auth_attach, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)"> {!!
                            getFilePreview($armourers->arm_auth_attach) !!} </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if ($armourers->arm_auth_attach)
                                                            <img src="{{ asset($armourers->arm_auth_attach) }}" alt="Image Preview42"
                                                                class="image-preview__image42"
                                                                style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    @endforeach {{-- <div class="new_branch mt-2">
                        <button type="button" id="addCleaning" onclick="addCleaningSection()">Add More</button>
                    </div> --}}
                </div>
            </div>
            <hr>
            <!--Incident form-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="incident_report" role="tabpanel"
                aria-labelledby="nav-incident-tab">
                <h5 class="mb-2" style="text-align:center"><i><b>Incident Report :</b></i></h5>
                <div class="row client-info">
                    @foreach ($customers->customerincidents as $index => $incidents)
                                    <input type="hidden" name="customerincidents[{{ $index }}][in_id]" value="{{ $incidents->id }}">
                                    <div class="col-lg-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-3 spacing-right"> Client Name <br> <input class="form-control" readonly
                                                    type="text" name="customerincidents[{{ $index }}][client_name]"
                                                    value="{{ $incidents->client_name }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-3 spacing-left spacing-right"> Client ID <br> <input class="form-control"
                                                    readonly type="text" name="customerincidents[{{ $index }}][client_id]"
                                                    value="{{ $incidents->client_id }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-5 spacing-left spacing-right"> Site ID <br> <input class="form-control"
                                                    readonly type="text" name="customerincidents[{{ $index }}][client_site_id]"
                                                    value="{{ $incidents->client_site_id }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right"> Client POC Name <br> <input class="form-control"
                                                    readonly type="text" name="customerincidents[{{ $index }}][client_poc]"
                                                    value="{{ $incidents->client_poc }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-3 spacing-left spacing-right"> Cell <br> <input class="form-control"
                                                    readonly type="text" name="customerincidents[{{ $index }}][client_cell]"
                                                    value="{{ $incidents->client_cell }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-5 spacing-left spacing-right"> Email <br> <input class="form-control"
                                                    readonly type="text" name="customerincidents[{{ $index }}][client_email]"
                                                    value="{{ $incidents->client_email }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right"> Site Address <br> <input class="form-control" readonly
                                                    type="text" name="customerincidents[{{ $index }}][client_site_address]"
                                                    value="{{ $incidents->client_site_address }}" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <div class="col-lg-3 spacing-left spacing-right"> Office/Floor <br> <input
                                                    class="form-control" readonly name="customerincidents[{{ $index }}][client_office]"
                                                    value="{{ $incidents->client_office }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <div class="col-lg-5 spacing-left spacing-right"> Building Name<br> <input
                                                    class="form-control" readonly name="customerincidents[{{ $index }}][client_build]"
                                                    value="{{ $incidents->client_build }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <div class="col-lg-3 spacing-right"> Street <br> <input class="form-control" readonly
                                                    type="text" name="customerincidents[{{ $index }}][client_street]"
                                                    value="{{ $incidents->client_street }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right"> Area <br> <input class="form-control"
                                                    readonly name="customerincidents[{{ $index }}][client_area]"
                                                    value="{{ $incidents->client_area }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <div class="col-lg-5 spacing-left spacing-right"> City <br> <input class="form-control"
                                                    readonly name="customerincidents[{{ $index }}][client_city]"
                                                    value="{{ $incidents->client_city }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 12px;"> FIR #
                                                <br> <input class="form-control" readonly
                                                    name="customerincidents[{{ $index }}][client_fir]"
                                                    value="{{ $incidents->client_fir }}" type="text" placeholder="..."
                                                    style="width: 115%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 30px;"> Arrest
                                                # <br> <input class="form-control" readonly
                                                    name="customerincidents[{{ $index }}][arrest]" value="{{ $incidents->arrest }}"
                                                    type="text" placeholder="..." style="width: 101%;"> </div>
                                            <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 12px;">
                                                Casualities <br> <input class="form-control" readonly
                                                    name="customerincidents[{{ $index }}][casual]" value="{{ $incidents->casual }}"
                                                    type="text" placeholder="..." style="width: 115%;"">
                                                </div>

                                                <div class=" col-lg-5 spacing-left spacing-right" style="margin-left: 30px;">
                                                Injuired <br> <input class="form-control" readonly
                                                    name="customerincidents[{{ $index }}][injuired]" value="{{ $incidents->injuired }}"
                                                    type="text" placeholder="..." style="width: 101%;"> </div>
                                            <div class="row mb-2" style="margin-left:2px;">
                                                <div class="col-lg-6 spacing-left spacing-right"> Incident Reported to <br> <input
                                                        class="form-control" readonly
                                                        name="customerincidents[{{ $index }}][incident_rep]"
                                                        value="{{ $incidents->incident_rep }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-6 spacing-left spacing-right"> Police Officer Name <br> <input
                                                        class="form-control" readonly
                                                        name="customerincidents[{{ $index }}][police_officer_name]"
                                                        value="{{ $incidents->police_officer_name }}" type="text" placeholder="..."
                                                        style="width: 87%;"> </div>
                                                <div class="col-lg-6 spacing-left spacing-right"> Station <br> <input
                                                        class="form-control" readonly type="text"
                                                        name="customerincidents[{{ $index }}][station]"
                                                        value="{{ $incidents->station }}" placeholder="..." style="width: 100%;"> </div>
                                                <div class="col-lg-6 spacing-left spacing-right"> Rank <br> <input class="form-control"
                                                        readonly type="text" name="customerincidents[{{ $index }}][rank]"
                                                        value="{{ $incidents->rank }}" placeholder="..." style="width: 87%;"> </div>
                                                <div class="col-lg-6 spacing-left spacing-right"> Report Made by <br> <input
                                                        class="form-control" readonly
                                                        name="customerincidents[{{ $index }}][report_made_by]"
                                                        value="{{ $incidents->report_made_by }}" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-left spacing-right"> Date <br> <input class="form-control"
                                                        readonly name="customerincidents[{{ $index }}][report_date]"
                                                        value="{{ $incidents->report_date }}" type="date" placeholder="..."
                                                        style="width: 87%;"> </div>
                                                <div class="col-lg-6 spacing-left spacing-right"> Time <br> <input class="form-control"
                                                        readonly name="customerincidents[{{ $index }}][report_time]"
                                                        value="{{ $incidents->report_time }}" type="time" placeholder="..."
                                                        style="width: 87%;"> </div>
                                                <div class="col-lg-6 spacing-left spacing-right"> Approved By <br> <input
                                                        class="form-control" readonly
                                                        name="customerincidents[{{ $index }}][report_apr_by]"
                                                        value="{{ $incidents->report_apr_by }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-6 spacing-left spacing-right"> Shared with <br> <input
                                                        class="form-control" readonly
                                                        name="customerincidents[{{ $index }}][report_shared]"
                                                        value="{{ $incidents->report_shared }}" type="text" placeholder="..."
                                                        style="width: 87%;"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-left spacing-right"> Incident Type <br> <input
                                                    class="form-control" readonly name="customerincidents[{{ $index }}][incident_type]"
                                                    value="{{ $incidents->incident_type }}" type="text" placeholder="..."
                                                    style="width: 87%;"> </div>
                                            <div class="col-lg-6 spacing-left spacing-right"> Weapon used by Attacker <br> <input
                                                    class="form-control" readonly name="customerincidents[{{ $index }}][weapon_used]"
                                                    value="{{ $incidents->weapon_used }}" type="text" placeholder="..."
                                                    style="width: 87%;"> </div>
                                            <div class="col-lg-6 spacing-left spacing-right"> Details of Attacker <br> <input
                                                    class="form-control" readonly
                                                    name="customerincidents[{{ $index }}][detail_of_attacker]"
                                                    value="{{ $incidents->detail_of_attacker }}" type="text" placeholder="..."
                                                    style="width: 87%;">
                                            </div>
                                            <div class="col-lg-6 spacing-left spacing-right" style="margin-left: -42px;">
                                                Attacker Description <br> <input class="form-control" readonly
                                                    name="customerincidents[{{ $index }}][attacker_desc]"
                                                    value="{{ $incidents->attacker_desc }}" type="text" placeholder="..."
                                                    style="width: 87%;"> </div>
                                            <div class="row mb-2" style="margin-left: -24px;">
                                                <div class="col-lg-3 spacing-right"> Shoes <br> <input class="form-control" readonly
                                                        type="text" name="customerincidents[{{ $index }}][attacker_shoe]"
                                                        value="{{ $incidents->attacker_shoe }}" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 spacing-left spacing-right"> Beard/M <br> <input
                                                        class="form-control" readonly
                                                        name="customerincidents[{{ $index }}][attacker_beard]"
                                                        value="{{ $incidents->attacker_beard }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-5 spacing-left spacing-right"> Language <br> <input
                                                        class="form-control" readonly type="text"
                                                        name="customerincidents[{{ $index }}][attacker_lang]"
                                                        value="{{ $incidents->attacker_lang }}" placeholder="..." style="width: 117%;">
                                                </div>
                                                <div class="col-lg-3 spacing-right"> Focused on <br> <input class="form-control"
                                                        readonly type="text" name="customerincidents[{{ $index }}][focused]"
                                                        value="{{ $incidents->focused }}" placeholder="..." style="width: 100%;"> </div>
                                                <div class="col-lg-3 spacing-left spacing-right"> Opening Phrase <br> <input
                                                        class="form-control" readonly
                                                        name="customerincidents[{{ $index }}][opening_phrase]"
                                                        value="{{ $incidents->opening_phrase }}" type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right"> Anything Unusual <br> <input
                                                        class="form-control" readonly name="customerincidents[{{ $index }}][any_usual]"
                                                        value="{{ $incidents->any_usual }}" type="text" placeholder="..."
                                                        style="width: 117%;"> </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2" style="margin-top: -10px ;">
                                            <div class="col-lg-6 spacing-left spacing-right"> Estimated Loss in PKR <br> <input
                                                    class="form-control" readonly name="customerincidents[{{ $index }}][estimated_loss]"
                                                    value="{{ $incidents->estimated_loss }}" type="text" placeholder="..."
                                                    style="width: 91%;"> </div>
                                            <div class="col-lg-5 spacing-left spacing-right" style="margin-left: -20px;">
                                                Description of Loss <br> <input class="form-control" readonly type="text"
                                                    name="customerincidents[{{ $index }}][desc_loss]"
                                                    value="{{ $incidents->desc_loss }}" placeholder="..." style="width: 110%;"> </div>
                                        </div>
                                        <div class="col-lg-6 spacing-left spacing-right" style="margin-top:-6px; margin-left:-15px;">
                                            Officers Response <br> <input class="form-control" readonly type="text"
                                                name="customerincidents[{{ $index }}][officer_response]"
                                                value="{{ $incidents->officer_response }}" placeholder="..." style="width: 110%;">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6 spacing-left spacing-right mt-2"> Attachements <br> <input
                                                class="form-control" readonly type="file"
                                                name="customerincidents[{{ $index }}][incident_attach]"
                                                value="{{ $incidents->incident_attach }}" placeholder="..." style="width: 70%;"
                                                multiple>
                                            <div class="col-lg-5 spacing-right">
                                                <div class="file-preview" style="cursor: pointer;"
                                                    data-file="{{ asset($incidents->incident_attach) }}"
                                                    data-extension="{{ pathinfo($incidents->incident_attach, PATHINFO_EXTENSION) }}"
                                                    onclick="openFileModal(this)"> {!!
                        getFilePreview($incidents->incident_attach) !!} </div>
                                                {{-- <div class="image-preview42" id="imagePreview42">
                                                    @if ($incidents->incident_attach)
                                                    <img src="{{ asset($incidents->incident_attach) }}" alt="Image Preview42"
                                                        class="image-preview__image42"
                                                        style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                        class="image-preview__default-text42">Image Preview</span> @endif
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 spacing-left spacing-right mt-2"> Notes <br>
                                            <textarea id="w3review10" class="form-control" readonly oninput="trimSpaces10()"
                                                onclick="moveCursorToStart10()" name="customerincidents[{{ $index }}][incident_note]"
                                                rows="2" cols="38">{{ $incidents->incident_note }} </textarea>
                                        </div>
                                    </div> {{-- <div class="new_branch mt-2">
                                        <button type="button" onclick="client_add_fields()">
                                            Add More
                                        </button>
                                    </div> --}}
                    @endforeach
                </div>
                <h5 class="mb-2" style="text-align:center"><i><b>Assigment Instruction :</b></i></h5>
                <div class="row" id="assignmentInfo">
                    @foreach ($customers->customerassigments as $index => $assigments)
                                    <input type="hidden" name="customerassigments[{{ $index }}][asig_id]" value="{{ $assigments->id }}">
                                    <div class="col-lg-6">
                                        <div class="row mb-2">
                                            <div class="col-lg-3 spacing-right"> Customer Name <br> <input class="form-control" readonly
                                                    name="customerassigments[{{ $index }}][asig_customer_name]"
                                                    value="{{ $assigments->asig_customer_name }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <div class="col-lg-3 spacing-left spacing-right"> Task Assigning <br> <input
                                                    class="form-control" readonly
                                                    name="customerassigments[{{ $index }}][task_assigning]"
                                                    value="{{ $assigments->task_assigning }}" type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right"> Designation <br> <input class="form-control" readonly
                                                    type="text" name="customerassigments[{{ $index }}][asig_desig]"
                                                    value="{{ $assigments->asig_desig }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-3 spacing-right"> Office/Floor <br> <input class="form-control" readonly
                                                    name="customerassigments[{{ $index }}][asig_office]"
                                                    value="{{ $assigments->asig_office }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <div class="col-lg-3 spacing-left spacing-right"> Building Name<br> <input
                                                    class="form-control" readonly type="text"
                                                    name="customerassigments[{{ $index }}][asig_building]"
                                                    value="{{ $assigments->asig_building }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right"> Road/Street <br> <input
                                                    class="form-control" readonly type="text"
                                                    name="customerassigments[{{ $index }}][asig_road]"
                                                    value="{{ $assigments->asig_road }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-5 spacing-right"> Area <br> <input class="form-control" readonly
                                                    type="text" name="customerassigments[{{ $index }}][asig_area]"
                                                    value="{{ $assigments->asig_area }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-5 spacing-left spacing-right"> City <br> <input class="form-control"
                                                    readonly type="text" name="customerassigments[{{ $index }}][task_assigning]"
                                                    value="{{ $assigments->task_assigning }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-right"> Country <br> <input class="form-control" readonly
                                                    type="text" name="customerassigments[{{ $index }}][asig_country]"
                                                    value="{{ $assigments->asig_country }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right"> Security Incharge <br> <input
                                                    class="form-control" readonly name="customerassigments[{{ $index }}][asig_security]"
                                                    value="{{ $assigments->asig_security }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <div class="col-lg-5 spacing-right"> Contact Details <br> <input class="form-control"
                                                    readonly name="customerassigments[{{ $index }}][asig_contact]"
                                                    value="{{ $assigments->asig_contact }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <h5>Site Incharge Details</h5>
                                            <div class="col-lg-3 spacing-right"> Incharge Name <br> <input class="form-control" readonly
                                                    type="text" name="customerassigments[{{ $index }}][incharge_name]"
                                                    value="{{ $assigments->incharge_name }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-right"> Designation <br> <input class="form-control" readonly
                                                    type="text" name="customerassigments[{{ $index }}][incharge_desig]"
                                                    value="{{ $assigments->incharge_desig }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-3 spacing-left spacing-right"> Contact Details <br> <input
                                                    class="form-control" readonly
                                                    name="customerassigments[{{ $index }}][incharge_contact]"
                                                    value="{{ $assigments->incharge_contact }}" type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-8 spacing-right"> High Risk Areas <br> <input class="form-control"
                                                    readonly type="text" name="customerassigments[{{ $index }}][incharge_help]"
                                                    value="{{ $assigments->incharge_help }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-8 spacing-right"> Description of Risk <br> <input class="form-control"
                                                    readonly type="text" name="customerassigments[{{ $index }}][incharge_desc]"
                                                    value="{{ $assigments->incharge_desc }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-8 spacing-right"> History of Risk <br> <input class="form-control"
                                                    readonly name="customerassigments[{{ $index }}][incharge_risk]"
                                                    value="{{ $assigments->incharge_risk }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <div class="col-lg-8 spacing-right" style="margin-top: 40px"> Assigned Area Manager
                                                Of PIFFERS <br> <input class="form-control" readonly type="text"
                                                    name="customerassigments[{{ $index }}][incharge_asig]"
                                                    value="{{ $assigments->incharge_asig }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-8 spacing-right"> Signed By <br> <input class="form-control" readonly
                                                    name="customerassigments[{{ $index }}][incharge_signed_by]"
                                                    value="{{ $assigments->incharge_signed_by }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <div class="col-lg-8 spacing-right"> Date <br> <input class="form-control" readonly
                                                    type="date" name="customerassigments[{{ $index }}][incharge_date]"
                                                    value="{{ $assigments->incharge_date }}" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-2">
                                            <h5>Address</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right"> Office No <br> <input class="form-control" readonly
                                                        id="" name="customerassigments[{{ $index }}][incharge_offc]"
                                                        value="{{ $assigments->incharge_offc }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-5 spacing-left"> Building <br> <input class="form-control" readonly
                                                        id="" name="customerassigments[{{ $index }}][incharge_build]"
                                                        value="{{ $assigments->incharge_build }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right"> Block <br> <input class="form-control" readonly
                                                        id="" name="customerassigments[{{ $index }}][incharge_block]"
                                                        value="{{ $assigments->incharge_block }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-5 spacing-left"> Area <br> <input class="form-control" readonly id=""
                                                        name="customerassigments[{{ $index }}][incharge_area]"
                                                        value="{{ $assigments->incharge_area }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right"> City <br> <input class="form-control" readonly
                                                        id="" name="customerassigments[{{ $index }}][incharge_city]"
                                                        value="{{ $assigments->incharge_city }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-5 spacing-left"> Pin Location <br> <input class="form-control"
                                                        readonly id="" name="customerassigments[{{ $index }}][incharge_pin]"
                                                        value="{{ $assigments->incharge_pin }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right"> Country <br> <input class="form-control"
                                                    readonly name="customerassigments[{{ $index }}][incharge_country]"
                                                    value="{{ $assigments->incharge_country }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <div class="col-lg-5 spacing-left spacing-right"> Site ID <br> <input class="form-control"
                                                    readonly name="customerassigments[{{ $index }}][incharge_site]"
                                                    value="{{ $assigments->incharge_site }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <div class="col-lg-5 spacing-left spacing-right"> A-Guard <br> <input class="form-control"
                                                    readonly name="customerassigments[{{ $index }}][incharge_a_g]"
                                                    value="{{ $assigments->incharge_a_g }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <div class="col-lg-5 spacing-left spacing-right"> Un-A-Guard <br> <input
                                                    class="form-control" readonly
                                                    name="customerassigments[{{ $index }}][incharge_a_ung]"
                                                    value="{{ $assigments->incharge_a_ung }}" type="text" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-5 spacing-left spacing-right"> Total Guard <br> <input
                                                    class="form-control" readonly name="customerassigments[{{ $index }}][incharge_t_g]"
                                                    value="{{ $assigments->incharge_t_g }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <div class="col-lg-8 spacing-right" style="margin-top:80px"> Recent Security Related
                                                Incidents <br> <input class="form-control" readonly type="text"
                                                    name="customerassigments[{{ $index }}][rec_inc_rel]"
                                                    value="{{ $assigments->rec_inc_rel }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-8 spacing-right"> Frequency Of Occurence <br> <input class="form-control"
                                                    readonly type="text" name="customerassigments[{{ $index }}][feq_occ]"
                                                    value="{{ $assigments->feq_occ }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-8 spacing-right"> Expectations from PIFFERS <br> <input
                                                    class="form-control" readonly type="text"
                                                    name="customerassigments[{{ $index }}][exp_piff]"
                                                    value="{{ $assigments->exp_piff }}" placeholder="..." style="width: 100%;"> </div>
                                            <div class="col-lg-8 spacing-right"> Any Special Instructions <br> <input
                                                    class="form-control" readonly name="customerassigments[{{ $index }}][any_spec]"
                                                    value="{{ $assigments->any_spec }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                            <div class="col-lg-8 spacing-right"> Petrolling Instruction <br> <input class="form-control"
                                                    readonly type="text" name="customerassigments[{{ $index }}][petr_instruc]"
                                                    value="{{ $assigments->petr_instruc }}" placeholder="..." style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <h3></h3>
                                    <div class="row mb-2">
                                        <div class="col-lg-6 spacing-left spacing-right mt-2"> Attachments <br> <input
                                                class="form-control" readonly type="file"
                                                name="customerassigments[{{ $index }}][asig_ex_attach]"
                                                value="{{ $assigments->asig_ex_attach }}" placeholder="..." style="width: 70%;"
                                                multiple>
                                            <div class="col-lg-5 spacing-right">
                                                <div class="file-preview" style="cursor: pointer;"
                                                    data-file="{{ asset($assigments->asig_ex_attach) }}"
                                                    data-extension="{{ pathinfo($assigments->asig_ex_attach, PATHINFO_EXTENSION) }}"
                                                    onclick="openFileModal(this)"> {!!
                        getFilePreview($assigments->asig_ex_attach) !!} </div>
                                                {{-- <div class="image-preview42" id="imagePreview42">
                                                    @if ($armourers->asig_ex_attach)
                                                    <img src="{{ asset($armourers->asig_ex_attach) }}" alt="Image Preview42"
                                                        class="image-preview__image42"
                                                        style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                        class="image-preview__default-text42">Image Preview</span> @endif
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 spacing-left spacing-right mt-2"> Notes <br>
                                            <textarea id="w3review11" class="form-control" readonly
                                                name="customerassigments[{{ $index }}][asig_ex_notes]" oninput="trimSpaces11()"
                                                onclick="moveCursorToStart11()" rows="2"
                                                cols="38">{{ $assigments->asig_ex_notes }} </textarea>
                                        </div>
                                    </div>
                    @endforeach {{-- <div class="new_branch mt-2">
                        <button type="button" id="addAssignment" onclick="addAssignmentSection()">Add More</button>
                    </div> --}}
                </div>
            </div>
            <hr>
            <!--Audits-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="audit" role="tabpanel"
                aria-labelledby="nav-loto-tab">
                <div class=" row main-content div" id="auditsInfo">
                    <h5 class="mb-2" style="text-align:center"><i><b>Audits :</b></i></h5>
                    @foreach ($customers->customeraudits as $index => $audits)
                                        <input type="hidden" name="customeraudits[{{ $index }}][au_id]" value="{{ $audits->id }}">
                                        <h5>Audit 1 :</h5>
                                        <div class="col-lg-12">
                                            <div class="row mb-2">
                                                <div class="col-lg-3 spacing-right"> File Audited By : <br> <input class="form-control"
                                                        readonly id="" name="customeraudits[{{ $index }}][audit_file]"
                                                        value="{{ $audits->audit_file }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-3 spacing-left spacing-right"> Signature <br> <input class="form-control"
                                                        readonly id="head_office_email" name="customeraudits[{{ $index }}][audit_sign]"
                                                        value="{{ $audits->audit_sign }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-3 spacing-right"> Date <br> <input class="form-control" readonly id=""
                                                        name="customeraudits[{{ $index }}][audit_date]" value="{{ $audits->audit_date }}"
                                                        type="date" placeholder="..." style="width: 100%;"> </div>
                                                <div class="col-lg-3 spacing-right"> Attachments <br> <input class="form-control" readonly
                                                        id="" name="customeraudits[{{ $index }}][audit_attach]"
                                                        value="{{ $audits->audit_attach }}" type="file" placeholder="..."
                                                        style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($audits->audit_attach) }}"
                                                            data-extension="{{ pathinfo($audits->audit_attach, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)"> {!! getFilePreview($audits->audit_attach) !!}
                                                        </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if ($audits->audit_attach)
                                                            <img src="{{ asset($audits->audit_attach) }}" alt="Image Preview42"
                                                                class="image-preview__image42"
                                                                style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                class="image-preview__default-text42">Image Preview</span> @endif
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="mt-3">Checked By :</h5>
                                        <div class="row mb-2">
                                            <div class="col-lg-5 spacing-right form-group"> Checked by: <br> <input class="form-control"
                                                    readonly id="" name="customeraudits[{{ $index }}][audit_checked_by]"
                                                    value="{{ $audits->audit_checked_by }}" type="text" placeholder="..."
                                                    style="width: 100%;"> </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 spacing-left spacing-right mt-2"> Attachements <br> <input
                                                    class="form-control" readonly name="customeraudits[{{ $index }}][audit_ex_attach]"
                                                    type="file" value="{{ $audits->audit_ex_attach }}" placeholder="..." style="width: 70%;"
                                                    multiple>
                                                <div class="col-lg-5 spacing-right">
                                                    <div class="file-preview" style="cursor: pointer;"
                                                        data-file="{{ asset($audits->audit_ex_attach) }}"
                                                        data-extension="{{ pathinfo($audits->audit_ex_attach, PATHINFO_EXTENSION) }}"
                                                        onclick="openFileModal(this)"> {!! getFilePreview($audits->audit_ex_attach)
                         !!} </div>
                                                    {{-- <div class="image-preview42" id="imagePreview42">
                                                        @if ($audits->audit_ex_attach)
                                                        <img src="{{ asset($audits->audit_ex_attach) }}" alt="Image Preview42"
                                                            class="image-preview__image42"
                                                            style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                            class="image-preview__default-text42">Image Preview</span> @endif
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 spacing-left spacing-right mt-2"> Notes <br>
                                                <textarea id="w3review12" class="form-control" readonly
                                                    name="customeraudits[{{ $index }}][audit_note]" oninput="trimSpaces12()"
                                                    onclick="moveCursorToStart12()" rows="2" cols="38">{{ $audits->audit_note }} </textarea>
                                            </div>
                                        </div> {{-- <div class="col-lg-2 spacing-left my-3">
                                            <button type="button" class="add-more-btn" onclick="audits_add_more()">Add More</button>
                                        </div> --}}
                    @endforeach
                </div>
            </div>
            <hr>
            <!--Intelligence-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="intelligence" role="tabpanel"
                aria-labelledby="nav-loto-tab">
                <div id="businessInfo">
                    <h5 class="mb-2" style="text-align:center"><i><b>Bussiness Information :</b></i></h5>
                    @foreach ($customers->customerbussinesses as $index => $bussinesses)
                                    <input type="hidden" name="customerbussinesses[{{ $index }}][b_id]" value="{{ $bussinesses->id }}">
                                    <div class=" row main-content div">
                                        <p>Please Collect information of other Business/Group of Customer.</p>
                                        <h5>POC :</h5>
                                        <div class="col-lg-12">
                                            <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right"> Name of Business <br> <input class="form-control"
                                                        readonly value="{{ $bussinesses->bussiness_name }}"
                                                        name="customerbussinesses[{{ $index }}][bussiness_name]" type="text"
                                                        placeholder="..." style="width: 100%;"> </div>
                                                <div class="col-lg-6 spacing-right"> Nature of Business <br> <input class="form-control"
                                                        readonly id="" value="{{ $bussinesses->bussiness_nature }}"
                                                        name="customerbussinesses[{{ $index }}][bussiness_nature]" type="text"
                                                        placeholder="..." style="width: 100%;"> </div>
                                                <div class="col-lg-6 spacing-left">
                                                    <h5>Address</h5>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5 spacing-right"> Office No <br> <input class="form-control"
                                                                readonly id="" value="{{ $bussinesses->bussiness_office_no }}"
                                                                name="customerbussinesses[{{ $index }}][bussiness_office_no]"
                                                                type="text" placeholder="..." style="width: 100%;"> </div>
                                                        <div class="col-lg-5 spacing-right"> Floor <br> <input class="form-control"
                                                                readonly id="" value="{{ $bussinesses->bussiness_floor }}"
                                                                name="customerbussinesses[{{ $index }}][bussiness_floor]" type="text"
                                                                placeholder="..." style="width: 100%;"> </div>
                                                        <div class="col-lg-5"> Building <br> <input class="form-control" readonly id=""
                                                                value="{{ $bussinesses->bussiness_building }}"
                                                                name="customerbussinesses[{{ $index }}][bussiness_building]" type="text"
                                                                placeholder="..." style="width: 100%;"> </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5 spacing-right"> Block <br> <input class="form-control"
                                                                readonly id="" value="{{ $bussinesses->bussiness_block }}"
                                                                name="customerbussinesses[{{ $index }}][bussiness_block]" type="text"
                                                                placeholder="..." style="width: 100%;"> </div>
                                                        <div class="col-lg-5 spacing-left"> Area <br> <input class="form-control"
                                                                readonly id="" value="{{ $bussinesses->bussiness_area }}"
                                                                name="customerbussinesses[{{ $index }}][bussiness_area]" type="text"
                                                                placeholder="..." style="width: 100%;"> </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5 spacing-right"> City <br> <input class="form-control"
                                                                readonly id="" value="{{ $bussinesses->bussiness_city }}"
                                                                name="customerbussinesses[{{ $index }}][bussiness_city]" type="text"
                                                                placeholder="..." style="width: 100%;"> </div>
                                                        <div class="col-lg-5 spacing-left"> Photograph of Building <br> <input
                                                                class="form-control" readonly id=""
                                                                value="{{ $bussinesses->bussiness_photo }}"
                                                                name="customerbussinesses[{{ $index }}][bussiness_photo]" type="file"
                                                                placeholder="..." style="width: 100%;">
                                                            <div class="col-lg-5 spacing-right">
                                                                <div class="file-preview" style="cursor: pointer;"
                                                                    data-file="{{ asset($bussinesses->bussiness_photo) }}"
                                                                    data-extension="{{ pathinfo($bussinesses->bussiness_photo, PATHINFO_EXTENSION) }}"
                                                                    onclick="openFileModal(this)"> {!!
                        getFilePreview($bussinesses->bussiness_photo) !!} </div>
                                                                {{-- <div class="image-preview42" id="imagePreview42">
                                                                    @if ($bussinesses->bussiness_photo)
                                                                    <img src="{{ asset($bussinesses->bussiness_photo) }}"
                                                                        alt="Image Preview42" class="image-preview__image42"
                                                                        style="height: 100%; width:100%; margin-left:-13px;"> @else
                                                                    <span class="image-preview__default-text42">Image
                                                                        Preview</span> @endif
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5 spacing-right"> Email <br> <input class="form-control"
                                                                readonly id="" name="customerbussinesses[{{ $index }}][bussiness_email]"
                                                                value="{{ $bussinesses->bussiness_email }}" type="text"
                                                                placeholder="..." style="width: 100%;"> </div>
                                                        <div class="col-lg-5 spacing-left"> Website <br> <input class="form-control"
                                                                readonly id="" name="customerbussinesses[{{ $index }}][bussiness_web]"
                                                                value="{{ $bussinesses->bussiness_web }}" type="text" placeholder="..."
                                                                style="width: 100%;"> </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-lg-5 spacing-right"> Pin location <br> <input
                                                                class="form-control" readonly id=""
                                                                name="customerbussinesses[{{ $index }}][bussiness_pin]"
                                                                value="{{ $bussinesses->bussiness_pin }}" type="text" placeholder="..."
                                                                style="width: 100%;"> </div>
                                                        <div class="col-lg-5 spacing-left"> GPS <br> <input class="form-control"
                                                                readonly id="" name="customerbussinesses[{{ $index }}][bussiness_gps]"
                                                                value="{{ $bussinesses->bussiness_gps }}" type="text" placeholder="..."
                                                                style="width: 100%;"> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-4 spacing-left spacing-right mt-2"> Notes <br>
                                                <textarea id="w3review13" class="form-control" readonly
                                                    name="customerbussinesses[{{ $index }}][bussiness_notes]" oninput="trimSpaces13()"
                                                    onclick="moveCursorToStart13()" rows="2"
                                                    cols="38">{{ $bussinesses->bussiness_notes }} </textarea>
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right mt-2"> Attachements <br> <input
                                                    class="form-control" readonly value="{{ $bussinesses->bussiness_attach }}"
                                                    type="file" name="customerbussinesses[{{ $index }}][bussiness_attach]"
                                                    placeholder="..." style="width: 70%;" multiple>
                                                <div class="col-lg-5 spacing-right">
                                                    <div class="file-preview" style="cursor: pointer;"
                                                        data-file="{{ asset($bussinesses->bussiness_attach) }}"
                                                        data-extension="{{ pathinfo($bussinesses->bussiness_attach, PATHINFO_EXTENSION) }}"
                                                        onclick="openFileModal(this)"> {!!
                        getFilePreview($bussinesses->bussiness_attach) !!} </div>
                                                    {{-- <div class="image-preview42" id="imagePreview42">
                                                        @if ($bussinesses->bussiness_attach)
                                                        <img src="{{ asset($bussinesses->bussiness_attach) }}" alt="Image Preview42"
                                                            class="image-preview__image42"
                                                            style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                            class="image-preview__default-text42">Image Preview</span> @endif
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div> {{-- <div class="col-lg-2 spacing-left my-3">
                                            <button type="button" class="add-more-btn" onclick="business_add_more()">Add More</button>
                                        </div> --}}
                                    </div>
                    @endforeach
                </div>
                <h5 class="mb-2" style="text-align:center"><i><b>Promotional Activities :</b></i></h5>
                <div class="row" id="give_a_ways">
                    @foreach ($customers->customeractivities as $index => $activities)
                                    <input type="hidden" name="customeractivities[{{ $index }}][act_id]" value="{{ $activities->id }}">
                                    <div class="col-lg-6 spacing-right form-group"> Customer Details Entered in all Promotional
                                        Activities <br> <input class="form-control" readonly type="text"
                                            name="customeractivities[{{ $index }}][promotional_act]"
                                            value="{{ $activities->promotional_act }}" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-6 mt-1">
                                        <div class="spacing-left"> Quantity <br> <input class="form-control" readonly type="text"
                                                name="customeractivities[{{ $index }}][promotional_quantity]"
                                                value="{{ $activities->promotional_quantity }}" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="form-type col-lg-6 spacing-right"> Estimated price<br> <input class="form-control"
                                            readonly id="shift_start_date" name="customeractivities[{{ $index }}][prom_price]"
                                            value="{{ $activities->prom_price }}" type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="form-type col-lg-6 spacing-right"> Date <br> <input class="form-control" readonly
                                            id="shift_end_date" name="customeractivities[{{ $index }}][prom_date]" type="date"
                                            value="{{ $activities->prom_date }}" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6"> Notes <br>
                                        <textarea id="w3review14" class="form-control" readonly
                                            name="customeractivities[{{ $index }}][promotional_notes]" oninput="trimSpaces14()"
                                            onclick="moveCursorToStart14()" rows="2"
                                            cols="38">{{ $activities->promotional_notes }} </textarea>
                                    </div>
                                    <div class="col-lg-6"> Attachments <br> <input class="form-control" readonly type="file"
                                            name="customeractivities[{{ $index }}][promotional_attach]"
                                            value="{{ $activities->promotional_attach }}" placeholder="..." style="width: 100%;">
                                        <div class="col-lg-5 spacing-right">
                                            <div class="file-preview" style="cursor: pointer;"
                                                data-file="{{ asset($activities->promotional_attach) }}"
                                                data-extension="{{ pathinfo($activities->promotional_attach, PATHINFO_EXTENSION) }}"
                                                onclick="openFileModal(this)"> {!!
                        getFilePreview($activities->promotional_attach) !!} </div>
                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                @if ($activities->promotional_attach)
                                                <img src="{{ asset($activities->promotional_attach) }}" alt="Image Preview42"
                                                    class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                @else <span class="image-preview__default-text42">Image Preview</span> @endif
                                            </div> --}}
                                        </div>
                                    </div>
                    @endforeach {{-- <div class="col-lg-2 spacing-left my-5">
                        <button type="button" class="add-more-btn" onclick="addPromotionalActivitySection()">Add
                            More</button>
                    </div> --}}
                </div>
            </div>
            <hr>
            <!--Feedback-->
            <div class="tab-pane fade m-3" style="opacity: 90%;" id="verifications" role="tabpanel"
                aria-labelledby="nav-contact-tab">
                <h5 class="mb-2" style="text-align:center"><i><b>FeedBack :</b></i></h5>
                <div class="feedback"> {{-- <div class="mt-2">
                        <button class="btn btn-danger" type="button" id="add_feedback_btn" onclick="togglefeedbackForm">
                            Add Feedback
                        </button>
                    </div> --}} @foreach ($customers->customerfeedbacks as $index => $feedbacks)
                                        <input type="hidden" name="customerfeedbacks[{{ $index }}][f_id]" value="{{ $feedbacks->id }}">
                                        <div id="feedbackForm">
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-11 spacing-right"> Client Name: <br> <input class="form-control"
                                                                readonly name="customerfeedbacks[{{ $index }}][feed_client_name]"
                                                                value="{{ $feedbacks->feed_client_name }}" type="text" placeholder="..."
                                                                style="width: 100%;"> </div>
                                                        <div class="col-lg-11 spacing-right"> Client POC Name: <br> <input
                                                                class="form-control" readonly
                                                                name="customerfeedbacks[{{ $index }}][feed_client_poc_name]"
                                                                value="{{ $feedbacks->feed_client_poc_name }}" type="text" placeholder="..."
                                                                style="width: 100%;"> </div>
                                                        <div class="col-lg-11 spacing-right"> Email: <br> <input class="form-control"
                                                                readonly name="customerfeedbacks[{{ $index }}][feed_client_email]"
                                                                value="{{ $feedbacks->feed_client_email }}" type="date" placeholder="..."
                                                                style="width: 100%;"> </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-left spacing-right"> Client ID: <br> <input
                                                                class="form-control" readonly
                                                                name="customerfeedbacks[{{ $index }}][feed_client_id]"
                                                                value="{{ $feedbacks->feed_client_id }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-5 spacing-right"> Site ID: <br> <input class="form-control"
                                                                readonly name="customerfeedbacks[{{ $index }}][feed_client_site_id]"
                                                                value="{{ $feedbacks->feed_client_site_id }}" type="text" placeholder="..."
                                                                style="width: 100%;"> </div>
                                                    </div>
                                                    <div class="row mb-5">
                                                        <div class="col-lg-11 spacing-left spacing-right"> Designation: <br> <input
                                                                class="form-control" readonly
                                                                name="customerfeedbacks[{{ $index }}][feed_desig]"
                                                                value="{{ $feedbacks->feed_desig }}" type="text" placeholder="..."
                                                                style="width: 100%;"> </div>
                                                        <div class="col-lg-11 spacing-left spacing-right"> Cell: <br> <input
                                                                class="form-control" readonly type="text"
                                                                name="customerfeedbacks[{{ $index }}][feed_cell]"
                                                                value="{{ $feedbacks->feed_cell }}" placeholder="..." style="width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-11">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <div class="row mb-5">
                                                                <div class="col-lg-4 spacing-left spacing-right">
                                                                    <h5>Feedback for the month:</h5>
                                                                </div>
                                                                <div class="col-lg-4 spacing-left spacing-right"> <input
                                                                        class="form-control" readonly type="text"
                                                                        name="customerfeedbacks[{{ $index }}][feed_month]"
                                                                        value="{{ $feedbacks->feed_month }}" placeholder="..."
                                                                        style="width: 100%;"> </div>
                                                            </div>
                                                            <tr width="100%">
                                                                <th width="75%">
                                                                    <p><b>A: Please Rate the following (Encircle from 1 to 5):- (1 =
                                                                            Entirely Satisfied , 2 = Satisfied, 3 = Neutral, 4 =
                                                                            Unsatisfied, 5 = Entirely Unsatisfied)</b> </p>
                                                                </th>
                                                                <th width="5%">Entirely Satisfied</th>
                                                                <th width="5%"> Satisfied</th>
                                                                <th width="5%">Neutral</th>
                                                                <th width="5%">Unsatisfied</th>
                                                                <th width="5%">Entirely Unsatisfied</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr width="100%">
                                                                <td width="75%">1. Punctuality and Attendance of Guards</td>
                                                                <td width="5%"><input type="radio" name="q1[]" {{ $feedbacks->q1 == '1' ? 'checked' : '' }} value="1">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q1[]" {{ $feedbacks->q1 == '2' ? 'checked' : '' }} value="2">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q1[]" {{ $feedbacks->q1 == '3' ? 'checked' : '' }} value="3">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q1[]" {{ $feedbacks->q1 == '4' ? 'checked' : '' }} value="4">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q1[]" {{ $feedbacks->q1 == '5' ? 'checked' : '' }} value="5">
                                                                </td>
                                                            </tr>
                                                            <tr width="100%">
                                                                <td width="75%">2.Discipline, Behavior & Character of Guards</td>
                                                                <td width="5%"><input type="radio" name="q2[]" {{ $feedbacks->q2 == '1' ? 'checked' : '' }} value="1">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q2[]" {{ $feedbacks->q2 == '2' ? 'checked' : '' }} value="2">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q2[]" {{ $feedbacks->q2 == '3' ? 'checked' : '' }} value="3">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q2[]" {{ $feedbacks->q2 == '4' ? 'checked' : '' }} value="4">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q2[]" {{ $feedbacks->q2 == '5' ? 'checked' : '' }} value="5">
                                                                </td>
                                                            </tr>
                                                            <tr width="100%">
                                                                <td width="75%">3. Smart Turnout of the Guards (Uniform)</td>
                                                                <td width="5%"><input type="radio" name="q3[]" {{ $feedbacks->q3 == '1' ? 'checked' : '' }} value="1">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q3[]" {{ $feedbacks->q3 == '2' ? 'checked' : '' }} value="2">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q3[]" {{ $feedbacks->q3 == '3' ? 'checked' : '' }} value="3">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q3[]" {{ $feedbacks->q3 == '4' ? 'checked' : '' }} value="4">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q3[]" {{ $feedbacks->q3 == '5' ? 'checked' : '' }} value="5">
                                                                </td>
                                                            </tr>
                                                            <tr width="100%">
                                                                <td width="75%">4.Working Condition of Weapons & Security
                                                                    Equipments</td>
                                                                <td width="5%"><input type="radio" name="q4[]" {{ $feedbacks->q4 == '1' ? 'checked' : '' }} value="1">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q4[]" {{ $feedbacks->q4 == '2' ? 'checked' : '' }} value="2">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q4[]" {{ $feedbacks->q4 == '3' ? 'checked' : '' }} value="3">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q4[]" {{ $feedbacks->q4 == '4' ? 'checked' : '' }} value="4">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q4[]" {{ $feedbacks->q4 == '5' ? 'checked' : '' }} value="5">
                                                                </td>
                                                            </tr>
                                                            <tr width="100%">
                                                                <td width="75%">5. Our Abidance regarding Taxes (Income Tax & Sales
                                                                    Tax)</td>
                                                                <td width="5%"><input type="radio" name="q5[]" {{ $feedbacks->q5 == '1' ? 'checked' : '' }} value="1">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q5[]" {{ $feedbacks->q5 == '2' ? 'checked' : '' }} value="2">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q5[]" {{ $feedbacks->q5 == '3' ? 'checked' : '' }} value="3">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q5[]" {{ $feedbacks->q5 == '4' ? 'checked' : '' }} value="4">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q5[]" {{ $feedbacks->q5 == '5' ? 'checked' : '' }} value="5">
                                                                </td>
                                                            </tr>
                                                            <tr width="100%">
                                                                <td width="75%">6. Our Compliance wrt EOBI, Social Security & GLI
                                                                    of Guards</td>
                                                                <td width="5%"><input type="radio" name="q6[]" {{ $feedbacks->q6 == '1' ? 'checked' : '' }} value="1">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q6[]" {{ $feedbacks->q6 == '2' ? 'checked' : '' }} value="2">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q6[]" {{ $feedbacks->q6 == '3' ? 'checked' : '' }} value="3">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q6[]" {{ $feedbacks->q6 == '4' ? 'checked' : '' }} value="4">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q6[]" {{ $feedbacks->q6 == '5' ? 'checked' : '' }} value="5">
                                                                </td>
                                                            </tr>
                                                            <tr width="100%">
                                                                <td width="75%">7. Timely Provision of Invoices & Guards Payroll
                                                                    Management</td>
                                                                <td width="5%"><input type="radio" name="q7[]" {{ $feedbacks->q7 == '1' ? 'checked' : '' }} value="1">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q7[]" {{ $feedbacks->q7 == '2' ? 'checked' : '' }} value="2">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q7[]" {{ $feedbacks->q7 == '3' ? 'checked' : '' }} value="3">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q7[]" {{ $feedbacks->q7 == '4' ? 'checked' : '' }} value="4">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q7[]" {{ $feedbacks->q7 == '5' ? 'checked' : '' }} value="5">
                                                                </td>
                                                            </tr>
                                                            <tr width="100%">
                                                                <td width="75%">8. Level of Training of Guards</td>
                                                                <td width="5%"><input type="radio" name="q8[]" {{ $feedbacks->q8 == '1' ? 'checked' : '' }} value="1">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q8[]" {{ $feedbacks->q8 == '2' ? 'checked' : '' }} value="2">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q8[]" {{ $feedbacks->q8 == '3' ? 'checked' : '' }} value="3">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q8[]" {{ $feedbacks->q8 == '4' ? 'checked' : '' }} value="4">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q8[]" {{ $feedbacks->q8 == '5' ? 'checked' : '' }} value="5">
                                                                </td>
                                                            </tr>
                                                            <tr width="100%">
                                                                <td width="75%">9. Level of Supervisory Staff Visiting the Guards
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q9[]" {{ $feedbacks->q9 == '1' ? 'checked' : '' }} value="1">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q9[]" {{ $feedbacks->q9 == '2' ? 'checked' : '' }} value="2">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q9[]" {{ $feedbacks->q9 == '3' ? 'checked' : '' }} value="3">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q9[]" {{ $feedbacks->q9 == '4' ? 'checked' : '' }} value="4">
                                                                </td>
                                                                <td width="5%"><input type="radio" name="q9[]" {{ $feedbacks->q9 == '5' ? 'checked' : '' }} value="5">
                                                                </td>
                                                            </tr>
                                                            <tr width="100%">
                                                                <td width="75%">10. PIFFERS Mgmt Approach & Behavior towards
                                                                    Customer Service</td>
                                                                <td width="5%"><input type="radio" name="q10[]" {{ $feedbacks->q10 == '1' ? 'checked' : '' }} value="1"></td>
                                                                <td width="5%"><input type="radio" name="q10[]" {{ $feedbacks->q10 == '2' ? 'checked' : '' }} value="2"></td>
                                                                <td width="5%"><input type="radio" name="q10[]" {{ $feedbacks->q10 == '3' ? 'checked' : '' }} value="3"></td>
                                                                <td width="5%"><input type="radio" name="q10[]" {{ $feedbacks->q10 == '4' ? 'checked' : '' }} value="4"></td>
                                                                <td width="5%"><input type="radio" name="q10[]" {{ $feedbacks->q10 == '5' ? 'checked' : '' }} value="5"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <p><b></b>B: Would you please, like to refer us any other Company / Organization?</b>
                                                </p>
                                                <div class="col-lg-7">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-11 spacing-right"> Company Name: <br> <input class="form-control"
                                                                readonly name="customerfeedbacks[{{ $index }}][feed_company_name]"
                                                                value="{{ $feedbacks->feed_company_name }}" type="text" placeholder="..."
                                                                style="width: 100%;"> </div>
                                                        <div class="col-lg-11 spacing-right"> POC Name: <br> <input class="form-control"
                                                                readonly name="customerfeedbacks[{{ $index }}][feed_poc_name]"
                                                                value="{{ $feedbacks->feed_poc_name }}" type="text" placeholder="..."
                                                                style="width: 100%;"> </div>
                                                        <div class="col-lg-11 spacing-right"> Suggestions / Comments:<br> <input
                                                                class="form-control" readonly
                                                                name="customerfeedbacks[{{ $index }}][feed_comment]"
                                                                value="{{ $feedbacks->feed_comment }}" type="text" placeholder="..."
                                                                style="width: 100%;"> </div>
                                                        <div class="col-lg-11 spacing-right"> Feedback Form Filled By:<br> <input
                                                                class="form-control" readonly
                                                                name="customerfeedbacks[{{ $index }}][feedback_form]"
                                                                value="{{ $feedbacks->feedback_form }}" type="text" placeholder="..."
                                                                style="width: 100%;"> </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-11 spacing-left spacing-right"> Email: <br> <input
                                                                class="form-control" readonly type="text"
                                                                name="customerfeedbacks[{{ $index }}][feed_email]"
                                                                value="{{ $feedbacks->feed_email }}" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-11 spacing-left spacing-right"> Telephone: <br> <input
                                                                class="form-control" readonly type="text"
                                                                name="customerfeedbacks[{{ $index }}][feed_telephone]"
                                                                value="{{ $feedbacks->feed_telephone }}" placeholder="..."
                                                                style="width: 100%;"> </div>
                                                        <div class="col-lg-11 spacing-left spacing-right"> Signature & Date: <br>
                                                            <input class="form-control" readonly
                                                                name="customerfeedbacks[{{ $index }}][feed_signature]"
                                                                value="{{ $feedbacks->feed_signature }}" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <p>To Be Filled by PIFFERS SECURITY SERVICES (PVT) LTD</p>
                                                <div class="col-lg-11 spacing-right"> Feedback Form Received By: <br> <input
                                                        class="form-control" readonly name="customerfeedbacks[{{ $index }}][feed_received]"
                                                        value="{{ $feedbacks->feed_received }}" type="text" placeholder="..."
                                                        style="width: 100%;"> </div>
                                                <div class="col-lg-11 spacing-right"> Remarks: <br> <input class="form-control" readonly
                                                        type="text" name="customerfeedbacks[{{ $index }}][feed_remarks]"
                                                        value="{{ $feedbacks->feed_remarks }}" placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-11 spacing-right"> Attachments: <br> <input id="" class="form-control"
                                                        readonly name="customerfeedbacks[{{ $index }}][feed_attach]"
                                                        value="{{ $feedbacks->feed_attach }}" type="file" placeholder="..."
                                                        style="width: 100%;">
                                                    <div class="col-lg-5 spacing-right">
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($feedbacks->feed_attach) }}"
                                                            data-extension="{{ pathinfo($feedbacks->feed_attach, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)"> {!! getFilePreview($feedbacks->feed_attach)
                           !!} </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if ($feedbacks->feed_attach)
                                                            <img src="{{ asset($feedbacks->feed_attach) }}" alt="Image Preview42"
                                                                class="image-preview__image42"
                                                                style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                class="image-preview__default-text42">Image Preview</span> @endif
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div> {{-- <div class="mt-2">
                                                <button class="btn btn-primary" type="button" id="" onclick="addFeedbackSection()">
                                                    Add Feedback
                                                </button>
                                            </div> --}} {{-- <div class="mt-2">
                                                <button class="btn btn-danger" type="button" id="remove_feedback_btn">
                                                    Remove Feedback
                                                </button>
                                            </div> --}}
                                        </div>
                                    </div>
                    @endforeach
                <h5 class="mb-2" style="text-align:center"><i><b>Complaints Management :</b></i></h5>
                {{-- <div class=" mt-2">
                    <button class="btn btn-dark" type="button" id="add_complaint_btn" onclick="toggleComplaintForm()">
                        Add Complaint
                    </button>
                </div> --}}
                <div class="row" id="complaintForm">
                    @foreach ($customers->customercomplaints as $index => $complaints)
                                            <input type="hidden" name="customercomplaints[{{ $index }}][com_id]" value="{{ $complaints->id }}">
                                            <div class="col-lg-12">
                                                <div class="row mb-2">
                                                    <div class="col-lg-4 spacing-left spacing-right"> Complaint Number <br> <input
                                                            class="form-control" readonly name="customercomplaints[{{ $index }}][complaint_no]"
                                                            value="{{ $complaints->complaint_no }}" type="text" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                    <h5 class="mt-3">Guards Duty</h5>
                                                    <div class="col-lg-5 spacing-left spacing-right form-group"> Guards Duty <br> <input
                                                            class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][complaint_guards_duty]"
                                                            value="{{ $complaints->complaint_guards_duty }}" type="text" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                    <div class="col-lg-5 spacing-left" style="margin-left: 12px"> Notes <br>
                                                        <textarea id="w3review15" class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][complaint_gaurd_note]"
                                                            oninput="trimSpaces15()" onclick="moveCursorToStart15()" rows="2"
                                                            cols="40">{{ $complaints->complaint_gaurd_note }} </textarea>
                                                    </div>
                                                    <div class="col-lg-3 spacing-left spacing-right"> Attachments <br> <input
                                                            class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][complaint_guard_attach]" type="file"
                                                            value="{{ $complaints->complaint_guard_attach }}" placeholder="..."
                                                            style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($complaints->complaint_guard_attach) }}"
                                                                data-extension="{{ pathinfo($complaints->complaint_guard_attach, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)"> {!!
                                getFilePreview($complaints->complaint_guard_attach) !!} </div>
                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if ($complaints->complaint_guard_attach)
                                                                <img src="{{ asset($complaints->complaint_guard_attach) }}"
                                                                    alt="Image Preview42" class="image-preview__image42"
                                                                    style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                    class="image-preview__default-text42">Image Preview</span>
                                                                @endif
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row mb-2">
                                                    <h5>Weapons, Uniform and Equipment</h5>
                                                    <div class="col-lg-5 spacing-left spacing-right form-group"> Weapons, Uniform and
                                                        Equipment <br> <input class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][wea_uni_equip]"
                                                            value="{{ $complaints->wea_uni_equip }}" type="text" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                    <div class="col-lg-5 spacing-left" style="margin-left: 12px"> Notes <br>
                                                        <textarea id="w3review16" oninput="trimSpaces16()" onclick="moveCursorToStart16()"
                                                            class="form-control" readonly name="customercomplaints[{{ $index }}][wue_note]"
                                                            rows="2" cols="40">{{ $complaints->wue_note }} </textarea>
                                                    </div>
                                                    <div class="col-lg-3 spacing-left spacing-right"> Attachments <br> <input
                                                            class="form-control" readonly name="customercomplaints[{{ $index }}][wue_attach]"
                                                            value="{{ $complaints->wue_attach }}" type="file" placeholder="..."
                                                            style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($complaints->wue_attach) }}"
                                                                data-extension="{{ pathinfo($complaints->wue_attach, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)"> {!! getFilePreview($complaints->wue_attach) !!}
                                                            </div>
                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if ($complaints->wue_attach)
                                                                <img src="{{ asset($complaints->wue_attach) }}" alt="Image Preview42"
                                                                    class="image-preview__image42"
                                                                    style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                    class="image-preview__default-text42">Image Preview</span> @endif
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row mb-2">
                                                    <h5>Finance Department</h5>
                                                    <div class="col-lg-5 spacing-left spacing-right form-group"> Finance Department <br>
                                                        <input class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][finance_dept]"
                                                            value="{{ $complaints->finance_dept }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left" style="margin-left: 12px"> Notes <br>
                                                        <textarea id="w3review17" class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][fd_note]" oninput="trimSpaces17()"
                                                            onclick="moveCursorToStart17()" rows="2"
                                                            cols="40">{{ $complaints->fd_note }} </textarea>
                                                    </div>
                                                    <div class="col-lg-3 spacing-left spacing-right"> Attachments <br> <input
                                                            class="form-control" readonly name="customercomplaints[{{ $index }}][fd_attach]"
                                                            value="{{ $complaints->fd_attach }}" type="file" placeholder="..."
                                                            style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($complaints->fd_attach) }}"
                                                                data-extension="{{ pathinfo($complaints->fd_attach, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)"> {!! getFilePreview($complaints->fd_attach) !!}
                                                            </div>
                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if ($complaints->fd_attach)
                                                                <img src="{{ asset($complaints->fd_attach) }}" alt="Image Preview42"
                                                                    class="image-preview__image42"
                                                                    style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                    class="image-preview__default-text42">Image Preview</span> @endif
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row mb-2">
                                                    <h5>Source of Complaint</h5>
                                                    <div class="col-lg-5 spacing-left spacing-right form-group"> Source of Complaint
                                                        <br><input class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][src_complaint]"
                                                            value="{{ $complaints->src_complaint }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left" style="margin-left: 12px"> Notes <br>
                                                        <textarea id="w3review" class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][src_note]" rows="2" cols="40">{{ $complaints->src_note }}
                           </textarea>
                                                    </div>
                                                    <div class="col-lg-3 spacing-left spacing-right"> Attachments <br> <input
                                                            class="form-control" readonly name="customercomplaints[{{ $index }}][src_attach]"
                                                            value="{{ $complaints->src_attach }}" type="file" placeholder="..."
                                                            style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($complaints->src_attach) }}"
                                                                data-extension="{{ pathinfo($complaints->src_attach, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)"> {!! getFilePreview($complaints->src_attach) !!}
                                                            </div>
                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if ($complaints->src_attach)
                                                                <img src="{{ asset($complaints->src_attach) }}" alt="Image Preview42"
                                                                    class="image-preview__image42"
                                                                    style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                    class="image-preview__default-text42">Image Preview</span> @endif
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row mb-2">
                                                    <h5>Management Issues</h5>
                                                    <div class="col-lg-3 spacing-right"> <label for="mng_feedback">Feedback:</label>
                                                        <br> <input class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][mng_feed]"
                                                            value="{{ $complaints->mng_feed }}" type="text" placeholder="..."
                                                            style="width: 100%; margin-top: -7px;">
                                                    </div>
                                                    <div class="col-lg-3 spacing-left spacing-right"> Attachments <br> <input
                                                            class="form-control" readonly id="printing_date"
                                                            name="customercomplaints[{{ $index }}][mng_attach]"
                                                            value="{{ $complaints->mng_attach }}" type="file" placeholder="..."
                                                            style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($complaints->mng_attach) }}"
                                                                data-extension="{{ pathinfo($complaints->mng_attach, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)"> {!! getFilePreview($complaints->mng_attach) !!}
                                                            </div>
                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if ($complaints->mng_attach)
                                                                <img src="{{ asset($complaints->mng_attach) }}" alt="Image Preview42"
                                                                    class="image-preview__image42"
                                                                    style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                    class="image-preview__default-text42">Image Preview</span> @endif
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 spacing-left" style="margin-left: 12px"> Notes <br>
                                                        <textarea id="w3review18" class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][mng_note]" oninput="trimSpaces18()"
                                                            onclick="moveCursorToStart18()" rows="2"
                                                            cols="40">{{ $complaints->mng_note }} </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row mb-2">
                                                    <h5>Complaint POC Details</h5>
                                                    <div class="col-lg-4 spacing-right"> Name <br> <input class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][complaint_poc_name]"
                                                            value="{{ $complaints->complaint_poc_name }}" type="text" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                    <div class="col-lg-4 spacing-right"> Designation <br> <input class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][complaint_poc_desig]"
                                                            value="{{ $complaints->complaint_poc_desig }}" type="text" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                    <div class="col-lg-4 spacing-right"> Department <br> <input class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][complaint_poc_dept]"
                                                            value="{{ $complaints->complaint_poc_dept }}" type="text" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                    <div class="col-lg-4 spacing-right"> Email<br> <input class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][complaint_poc_email]"
                                                            value="{{ $complaints->complaint_poc_email }}" type="text" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                    <div class="col-lg-4 spacing-right"> Contact Number<br> <input class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][complaint_poc_contact]"
                                                            value="{{ $complaints->complaint_poc_contact }}" type="text" placeholder="..."
                                                            style="width: 100%;"> </div>
                                                    <div class="col-lg-4 spacing-right"> Picture of Complaint <br> <input class="form-control"
                                                            readonly name="customercomplaints[{{ $index }}][complaint_picture]"
                                                            value="{{ $complaints->complaint_picture }}" type="file" placeholder="..."
                                                            style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($complaints->complaint_picture) }}"
                                                                data-extension="{{ pathinfo($complaints->complaint_picture, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)"> {!!
                                getFilePreview($complaints->complaint_picture) !!} </div>
                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if ($complaints->complaint_picture)
                                                                <img src="{{ asset($complaints->complaint_picture) }}" alt="Image Preview42"
                                                                    class="image-preview__image42"
                                                                    style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                    class="image-preview__default-text42">Image Preview</span>
                                                                @endif
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 spacing-right"> Details of Complaint <br>
                                                        <textarea class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][details_complaint]" type="text"
                                                            placeholder="..."
                                                            style="width: 100%;">{{ $complaints->details_complaint }}</textarea>
                                                    </div>
                                                    <div class="col-lg-4 spacing-right"> Details Attachment<br> <input class="form-control"
                                                            readonly name="customercomplaints[{{ $index }}][details_attach]"
                                                            value="{{ $complaints->details_attach }}" type="file" placeholder="..."
                                                            style="width: 100%;">
                                                        <div class="col-lg-5 spacing-right">
                                                            <div class="file-preview" style="cursor: pointer;"
                                                                data-file="{{ asset($complaints->details_attach) }}"
                                                                data-extension="{{ pathinfo($complaints->details_attach, PATHINFO_EXTENSION) }}"
                                                                onclick="openFileModal(this)"> {!!
                                getFilePreview($complaints->details_attach) !!} </div>
                                                            {{-- <div class="image-preview42" id="imagePreview42">
                                                                @if ($complaints->details_attach)
                                                                <img src="{{ asset($complaints->details_attach) }}" alt="Image Preview42"
                                                                    class="image-preview__image42"
                                                                    style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                    class="image-preview__default-text42">Image Preview</span>
                                                                @endif
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right form-group"> Complaint Tagged To :
                                                        <br><input class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][complaint_tagged]"
                                                            value="{{ $complaints->complaint_tagged }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right form-group"> Complaint Addressed By :
                                                        <br><input class="form-control" readonly
                                                            name="customercomplaints[{{ $index }}][complaint_arressed]"
                                                            value="{{ $complaints->complaint_arressed }}" type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-6 spacing-left spacing-right mt-2"> Attachements <br> <input
                                                        class="form-control" readonly type="file"
                                                        name="customercomplaints[{{ $index }}][complaint_addressed_attach]"
                                                        value="{{ $complaints->complaint_addressed_attach }}" placeholder="..."
                                                        style="width: 70%;" multiple>
                                                    <div class="col-lg-5 spacing-right">
                                                        <div class="file-preview" style="cursor: pointer;"
                                                            data-file="{{ asset($complaints->complaint_addressed_attach) }}"
                                                            data-extension="{{ pathinfo($complaints->complaint_addressed_attach, PATHINFO_EXTENSION) }}"
                                                            onclick="openFileModal(this)"> {!!
                                getFilePreview($complaints->complaint_addressed_attach) !!} </div>
                                                        {{-- <div class="image-preview42" id="imagePreview42">
                                                            @if ($complaints->complaint_addressed_attach)
                                                            <img src="{{ asset($complaints->complaint_addressed_attach) }}"
                                                                alt="Image Preview42" class="image-preview__image42"
                                                                style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                                class="image-preview__default-text42">Image Preview</span>
                                                            @endif
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 spacing-left spacing-right mt-2"> Notes <br>
                                                    <textarea id="w3review19" class="form-control" readonly oninput="trimSpaces19()"
                                                        onclick="moveCursorToStart19()"
                                                        name="customercomplaints[{{ $index }}][complaint_addressed_note]" rows="2"
                                                        cols="38">{{ $complaints->complaint_addressed_note }} </textarea>
                                                </div>
                                            </div>
                    @endforeach {{-- <div class="mt-2">
                        <button class="btn btn-primary" type="button" id="" onclick="addComplaintSection()">
                            Add Complaint
                        </button>
                    </div> --}} {{-- <div class="mt-2">
                        <button class="btn btn-dark" type="button" id="remove_complaint_btn">
                            Remove Complaint
                        </button>
                    </div> --}}
                </div>
                <h5 class="mb-2" style="text-align:center"><i><b>Notifications :</b></i></h5>
                {{-- <div class="mt-2">
                    <button class="btn btn-info" type="button" id="add_notification_btn">
                        Add Notification
                    </button>
                </div> --}}
                <div class="col-lg-12 spacing-right" id="notificationForm">
                    <div class="row mb-2">
                        @foreach ($customers->customernotifications as $index => $notifications)
                                            <input type="hidden" name="customernotifications[{{ $index }}][n_id]"
                                                value="{{ $notifications->id }}">
                                            <div class="col-lg-3 spacing-right"> Notification No. <br> <input class="form-control" readonly
                                                    type="text" name="customernotifications[{{ $index }}][notification_no]"
                                                    value="{{ $notifications->notification_no }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left spacing-right form-group"> Notification Related to :
                                                <br> <input class="form-control" readonly type="text"
                                                    name="customernotifications[{{ $index }}][notification_related]"
                                                    value="{{ $notifications->notification_related }}" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                            <div class="col-lg-4 spacing-left"> Attachment. <br> <input class="form-control" readonly
                                                    type="file" name="customernotifications[{{ $index }}][notification_attach]"
                                                    value="{{ $notifications->notification_attach }}" placeholder="..."
                                                    style="width: 100%;">
                                                <div class="col-lg-5 spacing-right">
                                                    <div class="file-preview" style="cursor: pointer;"
                                                        data-file="{{ asset($notifications->notification_attach) }}"
                                                        data-extension="{{ pathinfo($notifications->notification_attach, PATHINFO_EXTENSION) }}"
                                                        onclick="openFileModal(this)"> {!!
                            getFilePreview($notifications->notification_attach) !!} </div>
                                                    {{-- <div class="image-preview42" id="imagePreview42">
                                                        @if ($notifications->notification_attach)
                                                        <img src="{{ asset($notifications->notification_attach) }}" alt="Image Preview42"
                                                            class="image-preview__image42"
                                                            style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                            class="image-preview__default-text42">Image Preview</span>
                                                        @endif
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-3"> Notes. <br>
                                                <textarea class="form-control" readonly id="w3review20" type="text" oninput="trimSpaces20()"
                                                    onclick="moveCursorToStart20()"
                                                    name="customernotifications[{{ $index }}][notification_note]" placeholder="..."
                                                    style="width: 100%;">{{ $notifications->notification_note }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5 spacing-left spacing-right form-group"> Notification Shared With : <br>
                                                <input class="form-control" readonly type="text"
                                                    name="customernotifications[{{ $index }}][notification_shared]"
                                                    value="{{ $notifications->notification_shared }}" placeholder="..."
                                                    style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 spacing-left spacing-right mt-2"> Attachements <br> <input
                                                    class="form-control" readonly type="file"
                                                    name="customernotifications[{{ $index }}][notification_ex_attach]"
                                                    value="{{ $notifications->notification_ex_attach }}" placeholder="..."
                                                    style="width: 70%;" multiple>
                                                <div class="col-lg-5 spacing-right">
                                                    <div class="file-preview" style="cursor: pointer;"
                                                        data-file="{{ asset($notifications->notification_ex_attach) }}"
                                                        data-extension="{{ pathinfo($notifications->notification_ex_attach, PATHINFO_EXTENSION) }}"
                                                        onclick="openFileModal(this)"> {!!
                            getFilePreview($notifications->notification_ex_attach) !!} </div>
                                                    {{-- <div class="image-preview42" id="imagePreview42">
                                                        @if ($notifications->notification_ex_attach)
                                                        <img src="{{ asset($notifications->notification_ex_attach) }}" alt="Image Preview42"
                                                            class="image-preview__image42"
                                                            style="height: 100%; width:100%; margin-left:-13px;"> @else <span
                                                            class="image-preview__default-text42">Image Preview</span>
                                                        @endif
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 spacing-left spacing-right mt-2"> Notes <br>
                                                <textarea id="w3review" class="form-control" readonly
                                                    name="customernotifications[{{ $index }}][notification_ex_note]" rows="2"
                                                    cols="38">{{ $notifications->notification_ex_note }} </textarea>
                                            </div>
                                        </div>
                        @endforeach {{-- <div class="mt-2">
                        <button class="btn btn-primary" type="button" id="" onclick="addNotificationSection()">
                            Add Notification
                        </button>
                    </div> --}} {{-- <div class="mt-2">
                        <button class="btn btn-info" type="button" id="remove_notification_btn">
                            Remove Notification
                        </button>
                    </div> --}}

                    <hr>
                    <div class="container m-auto">
                        <!--monthly performance-->
                        <div class="tab-pane fade" style="opacity: 90%;" id="address-details" role="tabpanel"
                            aria-labelledby="nav-profile-tab">
                            <!--Tabs forDetails-->
                            <div class="row">
                                <!--Meeting with Customer-->
                                <div class="tab-pane fade m-3" style="opacity: 90%;" id="meeting" role="tabpanel"
                                    aria-labelledby="nav-meeting-tab">
                                    <div class=" row main-content div">
                                        <h5 class="mb-2" style="text-align:center"><i><b>Meeting Details :</b></i></h5>
                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right"> Date of meeting <br> <input
                                                        class="form-control" readonly id="meeting_date"
                                                        name="meeting_date" value="{{ $customers->meeting_date }}"
                                                        type="date" placeholder="..." style="width: 100%;"> </div>
                                                <div class="col-lg-5 spacing-left spacing-right"> Meeting Chaired By
                                                    <br> <input class="form-control" readonly id="head_office_email"
                                                        name="meeting_chaired" value="{{ $customers->meeting_chaired }}"
                                                        type="text" placeholder="..." style="width: 100%;"> </div>
                                                <div class="col-lg-6 spacing-right"> Minutes of Meeting <br> <input
                                                        class="form-control" readonly id="" name="meeting_minutes"
                                                        value="{{ $customers->meeting_minutes }}" type="text"
                                                        placeholder="..." style="width: 100%;"> </div>
                                                <div class="col-lg-5 spacing-left spacing-right"> Attachment <br> <input
                                                        class="form-control" readonly id="head_office_email"
                                                        name="meeting_attach" value="{{ $customers->meeting_attach }}"
                                                        type="file" placeholder="..." style="width: 100%;">
                                                    @if ($customers->meeting_attach)
                                                                                                    <div class="col-lg-5 spacing-right">
                                                                                                        <div class="file-preview" style="cursor: pointer;"
                                                                                                            data-file="{{ asset($customers->meeting_attach) }}"
                                                                                                            data-extension="{{ pathinfo($customers->meeting_attach, PATHINFO_EXTENSION) }}"
                                                                                                            onclick="openFileModal(this)"> {!!
                                                        getFilePreview($customers->meeting_attach) !!} </div>
                                                                                                        <!-- Delete Button --> <a
                                                                                                            href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'meeting_attach']) }}"
                                                                                                            onclick="return confirm('Are you sure you want to delete this file?')"
                                                                                                            style="position: absolute; top: 5px; right: 5px; background: red; color: white;
                                                                                                                    font-weight: bold; border-radius: 50%; width: 20px; height: 20px;
                                                                                                                    text-align: center; line-height: 18px; font-size: 14px; text-decoration: none;">x</a>
                                                                                                    </div>
                                                    @else
                                                        <p class="text-center text-secondary">Attachment not found</p>
                                                    @endif
                                                </div>
                                                <div class="col-lg-5  spacing-right"> Customer Comments <br>
                                                    <textarea class="form-control" readonly id="head_office_comp"
                                                        name="meeting_comment" type="text" placeholder="..."
                                                        style="width: 100%;">{{ $customers->meeting_comment }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 spacing-left">
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left spacing-right form-group"> Main Point
                                                    of Concern
                                                    <br> <input class="form-control" readonly id=""
                                                        name="meeting_main_point"
                                                        value="{{ $customers->meeting_main_point }}" type="file"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left"> Attachment <br> <input
                                                        class="form-control" readonly id="" name="meeting_ex_attach"
                                                        value="{{ $customers->meeting_ex_attach }}" type="file"
                                                        placeholder="..." style="width: 100%;">
                                                    @if ($customers->meeting_ex_attach)
                                                                                                    <div class="col-lg-5 spacing-right">
                                                                                                        <div class="file-preview" style="cursor: pointer;"
                                                                                                            data-file="{{ asset($customers->meeting_ex_attach) }}"
                                                                                                            data-extension="{{ pathinfo($customers->meeting_ex_attach, PATHINFO_EXTENSION) }}"
                                                                                                            onclick="openFileModal(this)"> {!!
                                                        getFilePreview($customers->meeting_ex_attach) !!} </div>
                                                                                                        <!-- Delete Button --> <a
                                                                                                            href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'meeting_ex_attach']) }}"
                                                                                                            onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                                                                                    </div>
                                                    @else
                                                        <p class="text-center text-secondary">Attachment not found</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right"> Frequency of Meeting <br> <input
                                                        class="form-control" readonly id="meeting_freq"
                                                        name="meeting_freq" value="{{ $customers->meeting_freq }}"
                                                        type="text" placeholder="..." style="width: 100%;"> </div>
                                                <div class="col-lg-5 spacing-left"> Attachment <br> <input
                                                        class="form-control" readonly id="" name="meeting_freq_attach"
                                                        value="{{ $customers->meeting_freq_attach }}" type="file"
                                                        placeholder="..." style="width: 100%;">
                                                    @if ($customers->meeting_freq_attach)
                                                                                                    <div class="col-lg-5 spacing-right">
                                                                                                        <div class="file-preview" style="cursor: pointer;"
                                                                                                            data-file="{{ asset($customers->meeting_freq_attach) }}"
                                                                                                            data-extension="{{ pathinfo($customers->meeting_freq_attach, PATHINFO_EXTENSION) }}"
                                                                                                            onclick="openFileModal(this)"> {!!
                                                        getFilePreview($customers->meeting_freq_attach) !!} </div>
                                                                                                        <!-- Delete Button --> <a
                                                                                                            href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'meeting_freq_attach']) }}"
                                                                                                            onclick="return confirm('Are you sure you want to delete this file?')">x</a>
                                                                                                    </div>
                                                    @else
                                                        <p class="text-center text-secondary"></p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5  spacing-right"> Note <br>
                                                    <textarea class="form-control" readonly id="w3review21"
                                                        name="meeting_freq_note" oninput="trimSpaces21()"
                                                        onclick="moveCursorToStart21()" type="text" placeholder="..."
                                                        style="width: 100%;">{{ $customers->meeting_freq_note }}</textarea>
                                                </div>
                                                <div class="col-lg-5 spacing-right"> Alert <br>
                                                    <textarea class="form-control" readonly
                                                        style="color: red; border:1px solid red;"
                                                        id="meeting_freq_alert" name="meeting_freq_alert"
                                                        oninput="trimSpaces21()" onclick="moveCursorToStart21()"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">{{ $customers->meeting_freq_alert }}</textarea>
                                                </div> <!-- Add this div where you want the calendar to appear -->
                                                <div id="calendar"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6 spacing-left spacing-right mt-2"> Attachements <br>
                                                <input class="form-control" readonly type="file"
                                                    name="meeting_alert_attach"
                                                    value="{{ $customers->meeting_alert_attach }}" placeholder="..."
                                                    style="width: 70%;" multiple>
                                                @if ($customers->meeting_alert_attach)
                                                                                            <div class="col-lg-5 d-flex">
                                                                                                <div class="file-preview" style="cursor: pointer;"
                                                                                                    data-file="{{ asset($customers->meeting_alert_attach) }}"
                                                                                                    data-extension="{{ pathinfo($customers->meeting_alert_attach, PATHINFO_EXTENSION) }}"
                                                                                                    onclick="openFileModal(this)"> {!!
                                                    getFilePreview($customers->meeting_alert_attach) !!} </div>
                                                                                                <!-- Delete Button -->
                                                                                                <a href="{{ route('admin.deleteCustomerImage', ['id' => $customers->id, 'column' => 'meeting_alert_attach']) }}"
                                                                                                    onclick="return confirm('Are you sure you want to delete this file?')"
                                                                                                    style="width: 20px;
                                                        height: 20px;
                                                        border-radius: 50%;
                                                        background-color: red;
                                                        display: flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        color: white;">x</a>
                                                                                            </div>
                                                @else
                                                    <p class="text-center text-secondary">Attachment not found</p>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 spacing-left spacing-right mt-2"> Notes <br>
                                                <textarea id="w3review22" class="form-control" readonly
                                                    name="meeting_alert_notes" oninput="trimSpaces22()"
                                                    onclick="moveCursorToStart22()" rows="2"
                                                    cols="38">{{ $customers->meeting_alert_notes }} </textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- Add this div where you want the calendar to appear -->
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--Score Card-->
                                <div class="tab-pane fade m-3" style="opacity: 90%;" id="score" role="tabpanel"
                                    aria-labelledby="nav-meeting-tab"> <img src="/smart.png" alt="smart-turnout"
                                        style="position:relative; left:22%;" />
                                    <div class="row mb-1">
                                        <div class="col-lg-4 spacing-left"> Customer Name <br> <input
                                                class="form-control" readonly name="scr_cus_name" type="text"
                                                placeholder="..." style="width: 100%;"> </div>
                                        <div class="col-lg-4 spacing-left"> Region <br> <input class="form-control"
                                                readonly name="scr_cus_region" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left"> Customer ID <br> <input class="form-control"
                                                readonly name="scr_cus_id" type="text" placeholder="..."
                                                style="width: 100%;"> </div>
                                        <div class="col-lg-4 spacing-left"> Site ID <br> <input class="form-control"
                                                readonly name="scr_cus_site_id" type="text" placeholder="..."
                                                style="width: 100%;"> </div>
                                        <div class="col-lg-4 spacing-left"> Report <br> <input class="form-control"
                                                readonly name="scr_cus_report" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left"> Date <br> <input class="form-control"
                                                readonly name="scr_cus_date" type="date" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                    </div>
                                    <hr width="90%" />
                                    <div class="row mt-3"> <img src="/score.jpg" alt="score-card" style="position:relative; left: -2px;
                                                    width: 92%;" />
                                        <div class="col-lg-11">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr width="100%">
                                                        <th width="5%">Sr</th>
                                                        <th width="20%">Category</th>
                                                        <th width="45%">Sub-Category</th>
                                                        <th width="15%">Marks</th>
                                                        <th width="15%">Marks Obtained</th>
                                                    </tr>
                                                </thead>
                                                <tbody> {{-- Row 1 --}}
                                                    <tr width="100%">
                                                        <td width="5%" rowspan="4"
                                                            style="background: rgb(24, 211, 24); color:white;">1</td>
                                                        <td width="20%" rowspan="4"
                                                            style="background: rgb(24, 211, 24); color:white;">Screening
                                                            & Hiring
                                                        </td>
                                                        <td width="45%"
                                                            style="background: rgb(24, 211, 24); color:white;">
                                                            Shared Complete Hiring Form</td>
                                                        <td width="15%"
                                                            style="background: rgb(24, 211, 24); color:white;">5
                                                        </td>
                                                        <td width="15%"><input class="mark-input1" type="number"
                                                                value="{{ $customers->marks1_schf }}"
                                                                name="marks1_schf" />
                                                        </td>
                                                    </tr> <!-- Additional rows for the same sub-category -->
                                                    <tr width="100%">
                                                        <td width="45%"
                                                            style="background: rgb(24, 211, 24); color:white;">
                                                            Received & Shared Verifications</td>
                                                        <td width="15%"
                                                            style="background: rgb(24, 211, 24); color:white;">5
                                                        </td>
                                                        <td width="15%"><input class="mark-input1" type="number"
                                                                value="{{ $customers->marks1_rsv }}"
                                                                name="marks1_rsv" /></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="45%"
                                                            style="background: rgb(24, 211, 24); color:white;">
                                                            Received & Shared Guarantor Confirmation</td>
                                                        <td width="15%"
                                                            style="background: rgb(24, 211, 24); color:white;">5
                                                        </td>
                                                        <td width="15%"><input class="mark-input1" type="number"
                                                                value="{{ $customers->marks1_rsgc }}"
                                                                name="marks1_rsgc" />
                                                        </td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="45%"
                                                            style="background: rgb(24, 211, 24); color:white;">
                                                            Compliance Detail</td>
                                                        <td width="15%"
                                                            style="background: rgb(24, 211, 24); color:white;">5
                                                        </td>
                                                        <td width="15%"><input class="mark-input1" type="number"
                                                                value="{{ $customers->marks1_cd }}" name="marks1_cd" />
                                                        </td>
                                                    </tr>
                                                    <tr width="100%" style="background-color: white">
                                                        <td width="5%"></td>
                                                        <td width="20%"></td>
                                                        <td width="45%" style="color: black">Total Marks:</td>
                                                        <td width="15%" style="color: black">20</td>
                                                        <td width="15%" style="color: black"><input id="result1"
                                                                type="number" value="{{ $customers->marks1_tm1 }}"
                                                                name="marks1_tm1" /></td>
                                                    </tr> {{-- Row 2 --}}
                                                    <tr width="100%">
                                                        <td width="5%" style="background: yellow; color:black;">2</td>
                                                        <td width="20%" style="background: yellow; color:black;">Smart
                                                            Turnout</td>
                                                        <td width="45%" style="background: yellow; color:black;">Uniform
                                                            Status</td>
                                                        <td width="15%" style="background: yellow; color:black;">15</td>
                                                        <td width="15%"><input class="mark-input2" type="number"
                                                                value="{{ $customers->marks2_us }}" name="marks2_us" />
                                                        </td>
                                                    </tr>
                                                    <tr width="100%" style="background-color: white">
                                                        <td width="5%"></td>
                                                        <td width="20%"></td>
                                                        <td width="45%" style="color: black">Total Marks:</td>
                                                        <td width="15%" style="color: black">15</td>
                                                        <td width="15%" style="color: black"><input id="result2"
                                                                type="number" value="{{ $customers->marks2_tm2 }}"
                                                                name="marks2_tm2" /></td>
                                                    </tr> {{-- Row 3 --}}
                                                    <tr width="100%">
                                                        <td width="5%" rowspan="2"
                                                            style="background: red; color:white;">3</td>
                                                        <td width="20%" rowspan="2"
                                                            style="background: red; color:white;">State of The Art
                                                            Weapons</td>
                                                        <td width="45%" style="background: red; color:white;">Weapons
                                                            Functioning Details Shared</td>
                                                        <td width="15%" style="background: red; color:white;">5</td>
                                                        <td width="15%"><input class="mark-input3" type="number"
                                                                value="{{ $customers->marks3_wfds }}"
                                                                name="marks3_wfds" />
                                                        </td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="45%" style="background: red; color:white;">Amour
                                                            Visited
                                                        </td>
                                                        <td width="15%" style="background: red; color:white;">5</td>
                                                        <td width="15%"><input class="mark-input3" type="number"
                                                                value="{{ $customers->marks3_av }}" name="marks3_av" />
                                                        </td>
                                                    </tr>
                                                    <tr width="100%" style="background-color: white">
                                                        <td width="5%"></td>
                                                        <td width="20%"></td>
                                                        <td width="45%" style="color: black">Total Marks:</td>
                                                        <td width="15%" style="color: black">10</td>
                                                        <td width="15%" style="color: black"><input id="result3"
                                                                type="number" value="{{ $customers->marks3_tm3 }}"
                                                                name="marks3_tm3" /></td>
                                                    </tr> {{-- Row 4 --}}
                                                    <tr width="100%">
                                                        <td width="5%" rowspan="2"
                                                            style="background: orange; color:white;">4</td>
                                                        <td width="20%" rowspan="2"
                                                            style="background: orange; color:white;">Periodical
                                                            Trainings</td>
                                                        <td width="45%" style="background: orange; color:white;">
                                                            Execution of
                                                            Live Fire Arms Trainings</td>
                                                        <td width="15%" style="background: orange; color:white;">8</td>
                                                        <td width="15%"><input class="mark-input4" type="number"
                                                                value="{{ $customers->marks4_elfat }}"
                                                                name="marks4_elfat" />
                                                        </td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="45%" style="background: orange; color:white;">
                                                            Availability
                                                            of Training Hand Book with Guards</td>
                                                        <td width="15%" style="background: orange; color:white;">5</td>
                                                        <td width="15%"><input class="mark-input4" type="number"
                                                                name="marks4_athb" /></td>
                                                    </tr>
                                                    <tr width="100%" style="background-color: white">
                                                        <td width="5%"></td>
                                                        <td width="20%"></td>
                                                        <td width="45%" style="color: black">Total Marks:</td>
                                                        <td width="15%" style="color: black">13</td>
                                                        <td width="15%" style="color: black"><input id="result4"
                                                                type="number" value="{{ $customers->marks4_tm4 }}"
                                                                name="marks4_tm4" /></td>
                                                    </tr> {{-- Row 5 --}}
                                                    <tr width="100%">
                                                        <td width="5%" rowspan="3"
                                                            style="background: skyblue; color:white;">5</td>
                                                        <td width="20%" rowspan="3"
                                                            style="background: skyblue; color:white;">Overall Excellence
                                                        </td>
                                                        <td width="45%" style="background: skyblue; color:white;">
                                                            Attendance
                                                            Percentage as per Contract</td>
                                                        <td width="15%" style="background: skyblue; color:white;">5</td>
                                                        <td width="15%"><input class="mark-input5" type="number"
                                                                value="{{ $customers->marks5_apapc }}"
                                                                name="marks5_apapc" />
                                                        </td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="45%" style="background: skyblue; color:white;">
                                                            Guarding
                                                            Service</td>
                                                        <td width="15%" style="background: skyblue; color:white;">5</td>
                                                        <td width="15%"><input class="mark-input5" type="number"
                                                                value="{{ $customers->marks5_gs }}" name="marks5_gs" />
                                                        </td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="45%" style="background: skyblue; color:white;">
                                                            Finance
                                                            (Invoices,Payroll,EOBI,Social Security,Sales Tax,Recovery
                                                            Ledger)</td>
                                                        <td width="15%" style="background: skyblue; color:white;">5</td>
                                                        <td width="15%"><input class="mark-input5" type="number"
                                                                value="{{ $customers->marks5_finance }}"
                                                                name="marks5_finance" /></td>
                                                    </tr>
                                                    <tr width="100%" style="background-color: white">
                                                        <td width="5%"></td>
                                                        <td width="20%"></td>
                                                        <td width="45%" style="color: black">Total Marks:</td>
                                                        <td width="15%" style="color: black">15</td>
                                                        <td width="15%" style="color: black"><input id="result5"
                                                                type="number" value="{{ $customers->marks5_tm5 }}"
                                                                name="marks5_tm5" /></td>
                                                    </tr> {{-- Row 6 --}}
                                                    <tr width="100%">
                                                        <td width="5%" style="background: blue; color:white;">6</td>
                                                        <td width="20%" style="background: blue; color:white;">Customer
                                                            Care
                                                        </td>
                                                        <td width="45%" style="background: blue; color:white;">Shared
                                                            Feedback Form (Soft via Email, Hard Copy Sent with Invoices)
                                                        </td>
                                                        <td width="15%" style="background: blue; color:white;">5</td>
                                                        <td width="15%"><input class="mark-input6" type="number"
                                                                value="{{ $customers->marks6_sff }}"
                                                                name="marks6_sff" /></td>
                                                    </tr>
                                                    <tr width="100%" style="background-color: white">
                                                        <td width="5%"></td>
                                                        <td width="20%"></td>
                                                        <td width="45%" style="color: black">Total Marks:</td>
                                                        <td width="15%" style="color: black">5</td>
                                                        <td width="15%" style="color: white"><input id="result6"
                                                                type="number" value="{{ $customers->marks6_tm6 }}"
                                                                name="marks6_tm6" /></td>
                                                    </tr> {{-- Row 7 --}}
                                                    <tr width="100%">
                                                        <td width="5%" rowspan="6"
                                                            style="background: blue; color:white;">7</td>
                                                        <td width="20%" rowspan="6"
                                                            style="background: blue; color:white;">PIFFERS Hedonistic
                                                            Approach
                                                        </td>
                                                        <td width="45%" style="background: blue; color:white;">Monthly
                                                            Visit
                                                            of Top Management(GM/DGM/RM)</td>
                                                        <td width="15%" style="background: blue; color:white;">7</td>
                                                        <td width="15%"><input class="mark-input7" type="number"
                                                                value="{{ $customers->marks7_mvtm }}"
                                                                name="marks7_mvtm" />
                                                        </td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="45%" style="background: blue; color:white;">Monthly
                                                            Performance Report Submitted</td>
                                                        <td width="15%" style="background: blue; color:white;">5</td>
                                                        <td width="15%"><input class="mark-input7" type="number"
                                                                value="{{ $customers->marks7_mprs }}"
                                                                name="marks7_mprs" />
                                                        </td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="45%" style="background: blue; color:white;">Shared
                                                            Record
                                                            of Learning Management Systems (LMS)</td>
                                                        <td width="15%" style="background: blue; color:white;">2.5</td>
                                                        <td width="15%"><input class="mark-input7" type="number"
                                                                value="{{ $customers->marks7_srlms }}"
                                                                name="marks7_srlms" />
                                                        </td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="45%" style="background: blue; color:white;">Reporting
                                                            of
                                                            Incident(s) at Site</td>
                                                        <td width="15%" style="background: blue; color:white;">2.5</td>
                                                        <td width="15%"><input class="mark-input7" type="number"
                                                                value="{{ $customers->marks7_risite }}"
                                                                name="marks7_risite" /></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="45%" style="background: blue; color:white;">Reporting
                                                            of
                                                            Incident(s) at Surroundings</td>
                                                        <td width="15%" style="background: blue; color:white;">2.5</td>
                                                        <td width="15%"><input class="mark-input7" type="number"
                                                                value="{{ $customers->marks7_risurr }}"
                                                                name="marks7_risurr" /></td>
                                                    </tr>
                                                    <tr width="100%">
                                                        <td width="45%" style="background: blue; color:white;">Shared
                                                            Details
                                                            of Nearby LEAs</td>
                                                        <td width="15%" style="background: blue; color:white;">2.5</td>
                                                        <td width="15%"><input class="mark-input7" type="number"
                                                                value="{{ $customers->marks7_sdn1 }}"
                                                                name="marks7_sdnl" />
                                                        </td>
                                                    </tr>
                                                    <tr width="100%" style="background-color: white">
                                                        <td width="5%"></td>
                                                        <td width="20%"></td>
                                                        <td width="45%" style="color: black">Total Marks:</td>
                                                        <td width="15%" style="color: black">22</td>
                                                        <td width="15%" style="color: black"><input id="result7"
                                                                type="number" value="{{ $customers->marks7_tm7 }}"
                                                                name="marks7_tm7" /></td>
                                                    </tr> {{-- Grand Total Row --}}
                                                    <tr width="100%" style="background-color: white">
                                                        <td width="5%"></td>
                                                        <td width="20%"></td>
                                                        <td width="45%" style="color: black">Grand Total:</td>
                                                        <td width="15%" style="color: black">100</td>
                                                        <td width="15%" style="color: black"><input id="grandTotal"
                                                                type="number"
                                                                value="{{ $customers->marks_grand_total }}"
                                                                name="marks_grand_total" /></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-4 spacing-left"> Customer POC Name <br> <input
                                                class="form-control" readonly name="cus_poc_name" type="text"
                                                placeholder="..." style="width: 100%;"> </div>
                                        <div class="col-lg-4 spacing-left"> Signature <br> <input class="form-control"
                                                readonly name="cus_poc_signature" type="text" placeholder="..."
                                                style="width: 100%;"> </div>
                                        <div class="col-lg-4 spacing-left"> Cell <br> <input class="form-control"
                                                readonly name="cus_poc_cell" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left"> CRO Name <br> <input class="form-control"
                                                readonly name="cro_name" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left"> Signature <br> <input class="form-control"
                                                readonly name="cro_signature" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left"> Cell <br> <input class="form-control"
                                                readonly name="cro_cell" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left"> GM/DGM Name <br> <input class="form-control"
                                                readonly name="gm_name" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left"> Signature <br> <input class="form-control"
                                                readonly name="gm_signature" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left"> Cell <br> <input class="form-control"
                                                readonly name="gm_signature" type="text" placeholder="..."
                                                style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
</div>

</form>
</section> <!-- </div> -->
<!-- </div> -->
<!-- </div> -->
<!-- </div> -->
<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModalLabel">File Preview</h5>
            </div>
            <div class="modal-body text-center" id="fileModalBody"></div>
            <div class="modal-footer"> <a href="#" id="downloadLink" download class="btn btn-primary">Download File</a>
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
            previewHtml =
                `<img src="https://img.icons8.com/?size=48&id=117561&format=png" alt="Excel File" style="height: 200px; width: 250px;">`;
        } else if (['zip', 'rar'].includes(fileExtension)) {
            previewHtml =
                `<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTb7rfjFBWn453fYAj1o3T7fsbSYvBzdEn4jOV8FdclTI7NpIDMZfZ_x79_o3FrxsYpUeQ&usqp=CAU" alt="ZIP File" style="height: 200px; width: 250px;">`;
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
    document.addEventListener("DOMContentLoaded", function () {
        const downloadButton = document.getElementById('download-pdf');
        const sendButton = document.getElementById('send-email');
        const modal = document.getElementById('emailModal');
        const closeModal = modal.querySelector('.close');
        const sendEmailBtn = modal.querySelector('#sendEmailBtn');

        if (downloadButton && sendButton) {
            downloadButton.addEventListener('click', function () {
                downloadPDF();
            });

            sendButton.addEventListener('click', function () {
                modal.style.display = "block";
            });

            closeModal.addEventListener('click', function () {
                modal.style.display = "none";
            });

            sendEmailBtn.addEventListener('click', function () {
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

            const element = document.getElementById('customer_form');
            if (element) {
                const options = {
                    margin: 1,
                    filename: 'customer_information.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }
                };
                html2pdf()
                    .set(options)
                    .from(element)
                    .toPdf()
                    .get('pdf')
                    .then(function (pdf) {
                        console.log('PDF generated:', pdf);

                        pdf.save(options.filename);
                        button.textContent = 'PDF Generated!';
                    })
                    .catch(error => {
                        console.error('Error generating PDF:', error);
                        button.textContent = 'Failed to Generate PDF';
                    });
            } else {
                console.error('Element with ID "customer_form" not found.');
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
            formData.append('cc', cc);
            formData.append('bcc', bcc);
            formData.append('subject', subject);
            formData.append('body', body);

            const element = document.getElementById('customer_form');
            if (element) {
                const options = {
                    margin: 1,
                    filename: 'customer_information.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }
                };
                html2pdf()
                    .set(options)
                    .from(element)
                    .toPdf()
                    .get('pdf')
                    .then(function (pdf) {
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
                console.error('Element with ID "customer_form" not found.');
                button.textContent = 'Failed to Generate PDF';
            }
        } else {
            console.error('Modal or input fields not found.');
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var signatoryRoom = 1;

    function addSignatorySection() {
        signatoryRoom++;
        var objTo = document.getElementById('signatoryDetailsContainer');
        var divTest = document.createElement("div");
        divTest.setAttribute("class", "removeclass" + signatoryRoom);

        divTest.innerHTML = `
      <div class="row mb-2">
          <div class="col-lg-5 spacing-right">
              Name <br> <input class="form-control" readonly name="sign_name[]" type="text" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-5 spacing-right">
              Designation <br> <input class="form-control" readonly name="sign_desig[]" type="text" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-5 spacing-right">
              Cell No <br> <input class="form-control" readonly type="text" name="sign_cell[]" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-5 spacing-right">
              Email <br> <input class="form-control" readonly type="text" name="sign_email[]" placeholder="..." style="width: 100%;">
          </div>
          <div class="new_branch mt-2">
              <button type="button" onclick="removeSignatorySection(${signatoryRoom})">
                  Remove
              </button>
          </div>
      </div>
      <hr>
  `;

        objTo.appendChild(divTest);
    }

    function removeSignatorySection(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>
<script>
    var departmentRoom = 1;

    function department_add_fields() {
        departmentRoom++;
        var objTo = document.getElementById('department_add_fields');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "third-col removeclass" + departmentRoom);

        divtest.innerHTML = `
   <div class=" row main-content div">
      <div class="spacing-right form-group">
      Department Type <br>
      <div class="input-group" style="width: 100%;">
          <select id="category" class="form-control mt-1" name="dept_type[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                  <option value="Legal Fee">Contract Management Department</option>
                  <option value="Speed Money">Security Department</option>
                  <option value="Consultancy Fee">Finance Department</option>
          </select>
      </div>
  </div>
  <div class="col-lg-6">
      <div class="row mb-2">
          <div class="col-lg-6 spacing-right">
              POC Name <br> <input class="form-control" readonly name="dept_name[]" type="text" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-5 spacing-left spacing-right">
              Email <br> <input class="form-control" readonly name="dept_email[]" type="text" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-6 spacing-right">
              Cell Number <br> <input class="form-control" readonly name="dept_cell[]" type="text" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-5 spacing-left spacing-right">
              Address <br> <input class="form-control" readonly name="dept_address[]" type="text" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-6  spacing-right">
              Designation <br> <input class="form-control" readonly name="dept_desig[]" type="text" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-5 spacing-left spacing-right">
             Visiting Card (front) <br> <input class="form-control" readonly name="dept_front[]" type="file" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-6  spacing-right">
              Visiting Card (back) <br> <input class="form-control" readonly name="dept_back[]" type="file" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-6 spacing-left spacing-right">
              Notes <br>
              <textarea id="w3review" class="form-control" readonly name="dept_notes[]" rows="2" cols="24">
              </textarea>
          </div>
          <div class="col-lg-6 spacing-right">
              Attachments <br> <input class="form-control" readonly name="dept_attach[]" type="file" placeholder="..." style="width: 100%;" multiple>

          </div>

      </div>

  </div>

  <div class="col-lg-6 spacing-left">
      <h5>Address</h5>
      <div class="row mb-2">
          <div class="col-lg-5 spacing-right">
              Office No <br> <input class="form-control" readonly name="dept_office[]" type="text" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-5 spacing-left">
              Building <br> <input class="form-control" readonly name="dept_build[]" type="text" placeholder="..." style="width: 100%;">
          </div>
      </div>
      <div class="row mb-2">
          <div class="col-lg-5 spacing-right">
              Block <br> <input class="form-control" readonly name="dept_block[]" type="text" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-5 spacing-left">
              Area <br> <input class="form-control" readonly name="dept_area[]" type="text" placeholder="..." style="width: 100%;">
          </div>
      </div>
      <div class="row mb-2">
          <div class="col-lg-5 spacing-right">
              City <br> <input class="form-control" readonly name="dept_city[]" type="text" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-5 spacing-left">
              Photograph of building <br> <input class="form-control" readonly name="dept_photo[]" type="file" placeholder="..." style="width: 100%;">
          </div>
      </div>
      <div class="row mb-2">
          <div class="col-lg-5 spacing-right">
              Pin Location <br> <input class="form-control" readonly name="dept_pin[]" type="text" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-5 spacing-left">
              GPS <br> <input class="form-control" readonly name="dept_gps[]" type="text" placeholder="..." style="width: 100%;">
          </div>
      </div>
      <div class="row mb-2">
          <div class="col-lg-6 spacing-right mt-2">
          Attachments <br> <input class="form-control" readonly name="dept_ex_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
          </div>
          <div class="col-lg-6 spacing-left mt-2">
              Notes <br>
              <textarea id="w3review" class="form-control" readonly name="dept_ex_notes[]" rows="2" cols="38">
              </textarea>
          </div>
      </div>
  </div>
  </div>
  <div class="input-group-append" style="width: 30%;">
      <button class="btn btn-primary" type="button" onclick="department_remove_fields(${departmentRoom})">Remove Department</button>
  </div>
  `;

        objTo.appendChild(divtest);
    }

    function department_remove_fields(rid) {
        $('.removeclass' + rid).remove();
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
  <div class="row">
      <div class=" row main-content div">
          <div class="col-lg-6">
              <div class="row mb-2">
                  <div class="col-lg-6 spacing-left spacing-right form-group">
                      Emergency Services <br>
                      <div class="input-group" style="width: 100%;">
                          <select id="category" class="form-control mt-1" name="emer_ser[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                  <option value="Legal Fee">Nearest Police Station</option>
                                  <option value="Speed Money">Nearest Hospital</option>
                                  <option value="Consultancy Fee">Nearest Fire Birgade</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-6 spacing-right">
                      Picture of Police Station <br> <input class="form-control" readonly name="emer_pic[]" type="file" placeholder="..." style="width: 100%;">
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
                      Name. <br> <input class="form-control" readonly id="" name="emer_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-right">
                      Designation. <br> <input class="form-control" readonly id="" name="emer_poc_desig[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-right">
                      Cell Number. <br> <input class="form-control" readonly id="" name="emer_poc_cell[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-right">
                      Email. <br> <input class="form-control" readonly id="" name="emer_poc_email[]" type="text" placeholder="..." style="width: 100%;">
                  </div>

                  <div class="col-lg-6 spacing-right">
                      Notes. <br> <textarea class="form-control" readonly id="" name="emer_poc_notes[]" type="notes" placeholder="..." style="width: 100%;"></textarea>
                  </div>
                  <div class="col-lg-6 spacing-right">
                      Attachment <br> <input class="form-control" readonly id="" name="emer_poc_attach[]" type="file" placeholder="..." style="width: 100%;">
                  </div>
              </div>

          </div>
          <div class="col-lg-6 spacing-left">
              <h5>Address :</h5>
              <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                      Office No <br> <input class="form-control" readonly id="" name="emer_office[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left">
                      Building <br> <input class="form-control" readonly id="" name="emer_building[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
              </div>
              <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                      Block <br> <input class="form-control" readonly id="" name="emer_block[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left">
                      Area <br> <input class="form-control" readonly id="" name="emer_area[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
              </div>
              <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                      City <br> <input class="form-control" readonly id="" name="emer_city[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left">
                      Photograph of Building <br> <input class="form-control" readonly id="" name="emer_loc[]" type="file" placeholder="..." style="width: 100%;">
                  </div>
              </div>
              <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                      Email <br> <input class="form-control" readonly id="" name="emer_email[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left">
                      Website <br> <input class="form-control" readonly id="" name="emer_web[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
              </div>
              <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                      Pin location <br> <input class="form-control" readonly id="" name="emer_pin[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left">
                      GPS <br> <input class="form-control" readonly id="" name="emer_gps[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-6 spacing-right mt-2">
      Applicable Rental Property Number <br> <input class="form-control" readonly name="emer_app_rental[]" type="text" placeholder="..." style="width: 70%;" multiple>
      </div>
      <div class="row mb-2">
          <div class="col-lg-6 spacing-right spacing-right mt-2">
              Attachements <br> <input class="form-control" readonly name="emer_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
          </div>
          <div class="col-lg-6 spacing-left spacing-right mt-2">
              Notes <br>
              <textarea id="w3review" class="form-control" readonly name="emer_note[]" rows="2" cols="38">
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
    var manpowerRoom = 1;

    function manpower_add_fields() {
        manpowerRoom++;
        var objTo = document.querySelector('.manpower');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "third-col removeclass" + manpowerRoom);

        divtest.innerHTML = `
  <div class="row col-lg-12 manpower">
  <div class="col-lg-6 spacing-right">
  <div class="row mb-2">
      <div class="form-type col-lg-5 spacing-left">
          Guard Post No <br> <input class="form-control" readonly type="text" id="Serial" name="g_post" placeholder="..." style="width: 100%;">
      </div>
      <div class="col-lg-5 spacing-left spacing-right form-group">
          Category <br>
          <div class="input-group" style="width: 100%;">
              <select class="form-control mt-1" name="" style="width: 70%; border-radius: 4px 0 0 4px; ">
              <option value="Armed Security Supervisor(Ex-Serviceman)">Armed Security Supervisor(Ex-Serviceman)</option>
              <option value="Other">Other</option>
              </select>
          </div>
      </div>
      <div class="col-lg-5 spacing-left spacing-right form-group">
          Uniform Type <br>
          <div class="input-group" style="width: 100%;">
              <select class="form-control mt-1" name="man_uni" style="width: 70%; border-radius: 4px 0 0 4px; ">
              <option value="">Standard Uniform</option>
              <option value="">Beige Uniform</option>
              </select>
          </div>
      </div>
      <div class="col-lg-5 spacing-left spacing-right form-group">
          Uniform Number <br>
          <div class="input-group" style="width: 100%;">
              <select class="form-control mt-1" name="man_uni_no" style="width: 70%; border-radius: 4px 0 0 4px; ">
              <option value="">30</option>
              <option value="">32</option>
              </select>
          </div>
      </div>
      <div class="col-lg-5 spacing-left spacing-right form-group">
          Weapon Type <br>
          <div class="input-group" style="width: 100%;">
              <select class="form-control mt-1" name="man_weapon" style="width: 70%; border-radius: 4px 0 0 4px; ">
              <option value="">222 Bore</option>
              <option value="">223 Bore</option>
              </select>
          </div>
      </div>
      <div class="col-lg-5 spacing-left spacing-right form-group">
          Ammunition Type <br>
          <div class="input-group" style="width: 100%;">
              <select class="form-control mt-1" name="man_ammu" style="width: 70%; border-radius: 4px 0 0 4px; ">
              <option value="">Strong</option>
              <option value="">Hard</option>
              </select>
          </div>
      </div>
      <div class="col-lg-5 spacing-left spacing-right form-group">
          Equipment <br>
          <div class="input-group" style="width: 100%;">
              <select class="form-control mt-1" name="man_make" style="width: 70%; border-radius: 4px 0 0 4px; ">
              <option value="">Make</option>
              <option value="">Model</option>
              </select>
          </div>
      </div>
      <div class="form-type col-lg-5 spacing-right">
          Picture of Equipment <br> <input class="form-control" readonly name="man_equip" type="file" placeholder="..." style="width: 100%;">
      </div>
  </div>

  </div>
  <div class="col-lg-6 spacing-left">
  <div class="row mb-3">
      <div class="form-type col-lg-6 spacing-right">
          Shift Start date. <br> <input class="form-control" readonly name="s_start_date" type="date" placeholder="..." style="width: 100%;">
      </div>
      <div class="form-type col-lg-6 spacing-right">
          Shift End date. <br> <input class="form-control" readonly name="s_end_date" type="date" placeholder="..." style="width: 100%;">
      </div>
  </div>
  <div class="row mb-3">
      <div class="form-type col-lg-6 spacing-right">
          Shift Start time. <br> <input class="form-control" readonly name="s_start_date" type="time" placeholder="..." style="width: 100%;">
      </div>
      <div class="form-type col-lg-6 spacing-right">
          Shift End time. <br> <input class="form-control" readonly name="s_end_date" type="time" placeholder="..." style="width: 100%;">
      </div>
  </div>
  <div class="row mb-3">
      <div class="form-type col-lg-6 spacing-right">
      Deployment Start date. <br> <input class="form-control" readonly name="man_start_date" type="date" placeholder="..." style="width: 100%;">
      </div>
      <div class="form-type col-lg-6 spacing-right">
      Deployment End date. <br> <input class="form-control" readonly name="man_end_date" type="date" placeholder="..." style="width: 100%;">
      </div>
  </div>
  <div class="row mb-3">
      <div class="form-type col-lg-6 spacing-right">
      Deployment Start time. <br> <input class="form-control" readonly name="man_start_time" type="time" placeholder="..." style="width: 100%;">
      </div>
      <div class="form-type col-lg-6 spacing-right">
      Deployment End time. <br> <input class="form-control" readonly  name="man_end_date" type="time" placeholder="..." style="width: 100%;">
      </div>
  </div>
  <div class="row mb-3">
      <div class="form-type col-lg-6 spacing-right">
      Quantity. <br> <input class="form-control" readonly name="man_quan" type="text" placeholder="..." style="width: 100%;">
      </div>
      <div class="form-type col-lg-6 spacing-right">
      Duty Hours. <br> <input class="form-control" readonly  name="man_hours" type="text" placeholder="..." style="width: 100%;">
      </div>
  </div>
  <div class="row mb-3">
      <div class="form-type col-lg-6 spacing-right">
      Post Orders / JD of Guard Post. <br> <input class="form-control" readonly name="man_jd" type="text" placeholder="..." style="width: 100%;">
      </div>
      <div class="form-type col-lg-6 spacing-right">
      Any Special Instructions. <br> <input class="form-control" readonly name="man_any_sp" type="text" placeholder="..." style="width: 100%;">
      </div>
  </div>
  <div class="row mb-3">
      <div class="form-type col-lg-6 spacing-right">
          Approved Leaves. <br> <input class="form-control" readonly name="man_apr_l" type="text" placeholder="..." style="width: 100%;">
      </div>
      <div class="form-type col-lg-6 spacing-right">
          Salary of total days. <br> <input class="form-control" readonly name="man_salary" type="text" placeholder="..." style="width: 100%;">
      </div>
  </div>
  </div>
  <div class="row mb-2">
  <div class="new_branch mt-2">
      <button type="button" onclick="manpower_remove_fields(${manpowerRoom})">
          Remove
      </button>
  </div>
  </div>
  </div>
  `;

        objTo.appendChild(divtest);
    }

    function manpower_remove_fields(rid) {
        $('.removeclass' + rid).remove();
    }
</script>
<script>
    var clientRoom = 1;

    function client_add_fields() {
        clientRoom++;
        var objTo = document.querySelector('.client-info');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "third-col removeclass" + clientRoom);

        divtest.innerHTML = `
  <div class="row">
      <div class="col-lg-6">
          <div class="row mb-2">
              <div class="col-lg-3 spacing-right">
                  Client Name <br>
                  <input class="form-control" readonly type="text" name="client_name[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-3 spacing-left spacing-right">
                  Client ID <br> <input class="form-control" readonly type="text" name="client_id[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right">
                  Site ID <br> <input class="form-control" readonly type="text" name="client_site_id[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-3 spacing-right">
                  Client POC Name <br>
                  <input class="form-control" readonly type="text" name="client_poc[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-3 spacing-left spacing-right">
                  Cell <br> <input class="form-control" readonly type="text" name="client_cell[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right">
                  Email <br> <input class="form-control" readonly type="text" name="client_email[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-3 spacing-right">
                  Site Address <br>
                  <input class="form-control" readonly type="text" name="client_site_address[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-3 spacing-left spacing-right">
                  Office/Floor <br> <input class="form-control" readonly name="client_office[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right">
                  Building Name<br> <input class="form-control" readonly name="client_build[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-3 spacing-right">
                  Street <br>
                  <input class="form-control" readonly type="text" name="client_street[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-3 spacing-left spacing-right">
                  Area <br> <input class="form-control" readonly name="client_area[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right">
                  City <br> <input class="form-control" readonly name="client_city[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 12px;">
                  FIR # <br> <input class="form-control" readonly name="client_fir[]" type="text" placeholder="..." style="width: 115%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 30px;">
                  Arrest # <br> <input class="form-control" readonly name="arrest[]" type="text" placeholder="..." style="width: 101%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 12px;">
                  Casualities <br> <input class="form-control" readonly name="casual[]" type="text" placeholder="..." style="width: 115%;"">
              </div>

              <div class="col-lg-5 spacing-left spacing-right" style="margin-left: 30px;">
                  Injuired <br> <input class="form-control" readonly name="injuired[]" type="text" placeholder="..." style="width: 101%;">
              </div>

              <div class="row mb-2" style="margin-left:2px;">
                  <div class="col-lg-6 spacing-left spacing-right">
                      Incident Reported to <br>
                     <select id="" class="form-control" readonly name="incident_rep[]" style="width: 100%;">
                          <option value="PIFFERS Office">PIFFERS Office</option>
                          <option value="Police Station/15">Police Station/15</option>
                          <option value="Ambulance">Ambulance</option>
                          <option value="Fire Brigade">Fire Brigade</option>
                          <option value="Rescue 1122">Rescue 1122</option>
                      </select>
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                      Police Officer Name <br> <input class="form-control" readonly name="police_officer_name[]" type="text" placeholder="..." style="width: 87%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                      Station <br> <input class="form-control" readonly type="text" name="station[]" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                      Rank <br> <input class="form-control" readonly type="text" name="rank[]" placeholder="..." style="width: 87%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                      Report Made by <br> <input class="form-control" readonly name="report_made_by[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                      Date <br> <input class="form-control" readonly name="report_date[]" type="date" placeholder="..." style="width: 87%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                      Time <br> <input class="form-control" readonly name="report_time[]" type="date" placeholder="..." style="width: 87%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                      Approved By <br> <input class="form-control" readonly name="report_apr_by[]" type="time" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left spacing-right">
                      Shared with <br> <input class="form-control" readonly name="report_shared[]" type="text" placeholder="..." style="width: 87%;">
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-6">
          <div class="row mb-2">
              <div class="col-lg-5 spacing-left spacing-right">
                  Incident Type <br> <select id="" class="form-control" readonly name="incident_type[]" style="width: 100%;">
                      <option value="Abuse">Abuse</option>
                      <option value="Violence">Violence</option>
                      <option value="Theft">Theft</option>
                      <option value="Robbery">Robbery</option>
                      <option value="Damage">Damage</option>
                      <option value="Terrorism">Terrorism</option>
                      <option value="Other">Other</option>
                  </select>
              </div>
              <div class="col-lg-6 spacing-left spacing-right">
                  Weapon used by Attacker <br> <select id="" class="form-control" readonly name="weapon_used[]" style="width: 100%;">
                      <option value="Gun">Gun</option>
                      <option value="Knives">Knives</option>
                      <option value="Stones">Stones</option>
                      <option value="Physical">Physical</option>
                      <option value="Chemical">Chemical</option>
                      <option value="Gas">Gas</option>
                      <option value="Others">Others</option>
                  </select>
              </div>
              <div class="col-lg-6 spacing-left spacing-right">
                  Details of Attacker <br> <select id="" class="form-control" readonly name="detail_of_attacker[]" style="width: 83%;">
                      <option value="Entry">Entry</option>
                      <option value="Exit">Exit</option>
                      <option value="Car/Bike">Car/Bike</option>
                      <option value="Car/Bike No">Car/Bike No</option>
                      <option value="Model">Model</option>
                      <option value="Type">Type</option>
                      <option value="Color">Color</option>
                  </select>
              </div>
              <div class="col-lg-6 spacing-left spacing-right" style="margin-left: -42px;">
                  Attacker Description <br> <select id="" class="form-control" readonly name="attacker_desc[]" style="width: 100%;">
                      <option value="Gender">Gender</option>
                      <option value="Age">Age</option>
                      <option value="Height">Height</option>
                      <option value="Complexion">Complexion</option>
                      <option value="Hair Color">Hair Color</option>
                      <option value="Wearing Color">Wearing Color</option>
                  </select>
              </div>
              <div class="row mb-2" style="margin-left: -24px;">
                  <div class="col-lg-3 spacing-right">
                      Shoes <br>
                      <input class="form-control" readonly type="text" name="attacker_shoe[]" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-3 spacing-left spacing-right">
                      Beard/M <br> <input class="form-control" readonly name="attacker_beard[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left spacing-right">
                      Language <br> <input class="form-control" readonly type="text" name="attacker_lang[]" placeholder="..." style="width: 117%;">
                  </div>
                  <div class="col-lg-3 spacing-right">
                      Focused on <br>
                      <input class="form-control" readonly type="text" name="focused[]" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-3 spacing-left spacing-right">
                      Opening Phrase <br> <input class="form-control" readonly name="opening_phrase[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left spacing-right">
                      Anything Unusual <br> <input class="form-control" readonly name="any_usual[]" type="text" placeholder="..." style="width: 117%;">
                  </div>
              </div>
          </div>
          <div class="row mb-2" style="margin-top: -10px ;">
              <div class="col-lg-6 spacing-left spacing-right">
                  Estimated Loss in PKR <br> <input class="form-control" readonly name="estimated_loss[]" type="text" placeholder="..." style="width: 91%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right" style="margin-left: -20px;">
                  Description of Loss <br> <input class="form-control" readonly type="text" name="desc_loss[]" placeholder="..." style="width: 110%;">
              </div>
          </div>
          <div class="col-lg-6 spacing-left spacing-right" style="margin-top:-6px; margin-left:-15px;">
              Officers Response <br> <select id="" class="form-control" readonly name="officer_response[]" style="width: 100%;">
                  <option value="Defense">Defense</option>
                  <option value="Attack">Attack</option>
                  <option value="Direct Firing">Direct Firing</option>
                  <option value="Air Firing">Air Firing</option>
                  <option value="Use Physical Force">Use Physical Force</option>
                  <option value="Stick">Stick</option>
              </select>
          </div>
      </div>
      <div class="row mb-2">
          <div class="col-lg-6 spacing-left spacing-right mt-2">
              Attachements <br> <input class="form-control" readonly type="file" name="incident_attach[]" placeholder="..." style="width: 70%;" multiple>
          </div>
          <div class="col-lg-6 spacing-left spacing-right mt-2">
              Notes <br>
              <textarea id="w3review" class="form-control" readonly name="incident_note[]" rows="2" cols="38">
              </textarea>
          </div>
      </div>
      <div class="new_branch mt-2">
           <button type="button" onclick="client_remove_fields(${clientRoom})">Remove</button>
      </div>
  </div>
  `;

        objTo.appendChild(divtest);
    }

    function client_remove_fields(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>
<script>
    var inspectionRoom = 1;

    function addInspectionSection() {
        inspectionRoom++;
        var objTo = document.getElementById('inspectionInfo');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "removeclass" + inspectionRoom);

        divtest.innerHTML = `
      <div class="row mb-2">
          <div class="col-lg-4 spacing-right">
              Inspection Number <br> <input class="form-control" readonly type="text" name="inspection_no[]" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-4 spacing-right">
              Employee id <br> <input class="form-control" readonly type="text" name="inspection_emp_id[]" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-4 spacing-right">
              Name <br> <input class="form-control" readonly type="text" name="inspection_emp_name[]" placeholder="..." style="width: 100%;">
          </div>
      </div>
      <div class="row mb-2">
          <div class="col-lg-4 spacing-right">
              Cell Number: <br> <input class="form-control" readonly type="text" name="inspection_emp_cell[]" placeholder="" style="width: 100%;">
          </div>
          <div class="col-lg-4 spacing-right">
              Department <br> <input class="form-control" readonly type="text" name="inspection_emp_dept[]" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-4 spacing-left" style="margin-left:8px;">
              Date of inspection. <br> <input class="form-control" readonly type="date" name="inspection_date[]" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-4 spacing-left">
              Picture of Inspection <br> <input class="form-control basic-info-attachements" id="inpFile${inspectionRoom}" type="file" name="inspection_pic[]" placeholder="..." style="width: 100%;" multiple>
              <div class="image-preview${inspectionRoom}" id="imagePreview${inspectionRoom}">
                  <img src="" alt="Image Preview" class="image-preview__image" style="height: 30%; width:30%;">
                  <span class="image-preview__default-text"> Image Preview </span>
              </div>
          </div>
          <div class="col-lg-4 spacing-right">
              Remarks of Petroling Officer <br> <textarea class="form-control basic-info-attachements" id="inpFile2" type="text" name="inspection_rem_petr[]" placeholder="..." style="width: 100%;" multiple></textarea>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-3">
              Notes <br> <textarea class="form-control basic-info-attachements" id="" type="text" name="inspection_note[]" placeholder="..." style="width: 100%;" multiple></textarea>
          </div>
          <div class="col-lg-3 spacing-left">
              Attachments <br> <input class="form-control basic-info-attachements" id="" type="file" name="inspection_attach[]" placeholder="..." style="width: 100%;" multiple>
          </div>
          <div class="new_branch mt-2">
              <button type="button" onclick="removeInspectionSection(${inspectionRoom})">
                  Remove
              </button>
          </div>
      </div>
      <hr>
  `;

        objTo.appendChild(divtest);
    }

    function removeInspectionSection(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>
<script>
    var feedbackRoom = 1;

    function addFeedbackSection() {
        feedbackRoom++;
        var objTo = document.getElementById('feedbackForm');
        var divTest = document.createElement("div");
        divTest.setAttribute("class", "removeclass" + feedbackRoom);

        divTest.innerHTML = `
      <div class="feedback">

          <div id="feedbackForm">
              <div class="row">
              <div class="col-lg-7">
                  <div class="row mb-2">
                      <div class="col-lg-11 spacing-right">
                          Client Name: <br> <input class="form-control" readonly name="feed_client_name[]" type="text" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-11 spacing-right">
                          Client POC Name: <br> <input class="form-control" readonly name="feed_client_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-11 spacing-right">
                          Email: <br> <input class="form-control" readonly name="feed_client_email[]" type="date" placeholder="..." style="width: 100%;">
                      </div>

                  </div>

              </div>

              <div class="col-lg-5">
                  <div class="row mb-2">
                      <div class="col-lg-6 spacing-left spacing-right">
                          Client ID: <br> <input class="form-control" readonly name="feed_client_id[]" type="text" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-5 spacing-right">
                          Site ID: <br> <input class="form-control" readonly name="feed_client_site_id[]" type="text" placeholder="..." style="width: 100%;">
                      </div>
                  </div>
                  <div class="row mb-5">
                      <div class="col-lg-11 spacing-left spacing-right">
                          Designation: <br> <input class="form-control" readonly name="feed_desig[]" type="text" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-11 spacing-left spacing-right">
                          Cell: <br> <input class="form-control" readonly type="text" name="feed_cell[]" placeholder="..." style="width: 100%;">
                      </div>

                  </div>

              </div>

              <div class="col-lg-11">
                  <table class="table table-bordered">
                      <thead>
                          <div class="row mb-5">
                              <div class="col-lg-4 spacing-left spacing-right">
                                  <h5>Feedback for the month:</h5>
                              </div>
                              <div class="col-lg-4 spacing-left spacing-right">
                                  <input class="form-control" readonly type="text" name="feed_month[]" placeholder="..." style="width: 100%;">
                              </div>


                          </div>


                          <tr width="100%">
                              <th width="75%">
                                  <p><b>A: Please Rate the following (Encircle from 1
                                          to 5):-
                                          (1 = Entirely Satisfied , 2 = Satisfied, 3 =
                                          Neutral, 4 = Unsatisfied, 5 = Entirely
                                          Unsatisfied)</b>
                                  </p>
                              </th>
                              <th width="5%">Entirely Satisfied</th>
                              <th width="5%"> Satisfied</th>
                              <th width="5%">Neutral</th>
                              <th width="5%">Unsatisfied</th>
                              <th width="5%">Entirely Unsatisfied</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr width="100%">
                              <td width="75%">1. Punctuality and Attendance of
                                  Guards</td>
                              <td width="5%"><input type="radio" name="q1[]" value="1"></td>
                              <td width="5%"><input type="radio" name="q1[]" value="2"></td>
                              <td width="5%"><input type="radio" name="q1[]" value="3"></td>
                              <td width="5%"><input type="radio" name="q1[]" value="4"></td>
                              <td width="5%"><input type="radio" name="q1[]" value="5"></td>
                          </tr>
                          <tr width="100%">
                              <td width="75%">2.Discipline, Behavior & Character
                                  of Guards</td>
                              <td width="5%"><input type="radio" name="q2[]" value="1"></td>
                              <td width="5%"><input type="radio" name="q2[]" value="2"></td>
                              <td width="5%"><input type="radio" name="q2[]" value="3"></td>
                              <td width="5%"><input type="radio" name="q2[]" value="4"></td>
                              <td width="5%"><input type="radio" name="q2[]" value="5"></td>
                          </tr>
                          <tr width="100%">
                              <td width="75%">3. Smart Turnout of the Guards
                                  (Uniform)</td>
                              <td width="5%"><input type="radio" name="q3[]" value="1"></td>
                              <td width="5%"><input type="radio" name="q3[]" value="2"></td>
                              <td width="5%"><input type="radio" name="q3[]" value="3"></td>
                              <td width="5%"><input type="radio" name="q3[]" value="4"></td>
                              <td width="5%"><input type="radio" name="q3[]" value="5"></td>
                          </tr>
                          <tr width="100%">
                              <td width="75%">4.Working Condition of Weapons &
                                  Security Equipments</td>
                              <td width="5%"><input type="radio" name="q4[]" value="1"></td>
                              <td width="5%"><input type="radio" name="q4[]" value="2"></td>
                              <td width="5%"><input type="radio" name="q4[]" value="3"></td>
                              <td width="5%"><input type="radio" name="q4[]" value="4"></td>
                              <td width="5%"><input type="radio" name="q4[]" value="5"></td>
                          </tr>
                          <tr width="100%">
                              <td width="75%">5. Our Abidance regarding Taxes
                                  (Income Tax & Sales Tax)</td>
                              <td width="5%"><input type="radio" name="q5[]" value="1"></td>
                              <td width="5%"><input type="radio" name="q5[]" value="2"></td>
                              <td width="5%"><input type="radio" name="q5[]" value="3"></td>
                              <td width="5%"><input type="radio" name="q5[]" value="4"></td>
                              <td width="5%"><input type="radio" name="q5[]" value="5"></td>
                          </tr>
                          <tr width="100%">
                              <td width="75%">6. Our Compliance wrt EOBI, Social
                                  Security & GLI of Guards</td>
                              <td width="5%"><input type="radio" name="q6[]" value="1"></td>
                              <td width="5%"><input type="radio" name="q6[]" value="2"></td>
                              <td width="5%"><input type="radio" name="q6[]" value="3"></td>
                              <td width="5%"><input type="radio" name="q6[]" value="4"></td>
                              <td width="5%"><input type="radio" name="q6[]" value="5"></td>
                          </tr>
                          <tr width="100%">
                              <td width="75%">7. Timely Provision of Invoices &
                                  Guards Payroll Management</td>
                              <td width="5%"><input type="radio" name="q7[]" value="1"></td>
                              <td width="5%"><input type="radio" name="q7[]" value="2"></td>
                              <td width="5%"><input type="radio" name="q7[]" value="3"></td>
                              <td width="5%"><input type="radio" name="q7[]" value="4"></td>
                              <td width="5%"><input type="radio" name="q7[]" value="5"></td>
                          </tr>
                          <tr width="100%">
                              <td width="75%">8. Level of Training of Guards</td>
                              <td width="5%"><input type="radio" name="q8[]" value="1"></td>
                              <td width="5%"><input type="radio" name="q8[]" value="2"></td>
                              <td width="5%"><input type="radio" name="q8[]" value="3"></td>
                              <td width="5%"><input type="radio" name="q8[]" value="4"></td>
                              <td width="5%"><input type="radio" name="q8[]" value="5"></td>
                          </tr>
                          <tr width="100%">
                              <td width="75%">9. Level of Supervisory Staff
                                  Visiting the Guards</td>
                              <td width="5%"><input type="radio" name="q9[]" value="1"></td>
                              <td width="5%"><input type="radio" name="q9[]" value="2"></td>
                              <td width="5%"><input type="radio" name="q9[]" value="3"></td>
                              <td width="5%"><input type="radio" name="q9[]" value="4"></td>
                              <td width="5%"><input type="radio" name="q9[]" value="5"></td>
                          </tr>
                          <tr width="100%">
                              <td width="75%">10. PIFFERS Mgmt Approach &
                                  Behavior towards Customer Service</td>
                              <td width="5%"><input type="radio" name="q10[]" value="1"></td>
                              <td width="5%"><input type="radio" name="q10[]" value="2"></td>
                              <td width="5%"><input type="radio" name="q10[]" value="3"></td>
                              <td width="5%"><input type="radio" name="q10[]" value="4"></td>
                              <td width="5%"><input type="radio" name="q10[]" value="5"></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="row">
              <p><b></b>B: Would you please, like to refer us any other Company /
                  Organization?</b></p>
              <div class="col-lg-7">
                  <div class="row mb-2">
                      <div class="col-lg-11 spacing-right">
                          Company Name: <br> <input class="form-control" readonly name="feed_company_name[]" type="text" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-11 spacing-right">
                          POC Name: <br> <input class="form-control" readonly name="feed_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-11 spacing-right">
                          Suggestions / Comments:<br> <input class="form-control" readonly name="feed_comment[]" type="text" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-11 spacing-right">
                          Feedback Form Filled By:<br> <input class="form-control" readonly name="feedback_form[]" type="text" placeholder="..." style="width: 100%;">
                      </div>

                  </div>
              </div>

              <div class="col-lg-5">
                  <div class="row mb-2">

                      <div class="col-lg-11 spacing-left spacing-right">
                          Email: <br> <input class="form-control" readonly type="text" name="feed_email[]" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-11 spacing-left spacing-right">
                          Telephone: <br> <input class="form-control" readonly type="text" name="feed_telephone[]" placeholder="..." style="width: 100%;">
                      </div>
                      <div class="col-lg-11 spacing-left spacing-right">
                          Signature & Date: <br> <input class="form-control" readonly name="feed_signature[]" type="text" placeholder="..." style="width: 100%;">
                      </div>

                  </div>

              </div>
          </div>
          <div class="row">
              <p>To Be Filled by PIFFERS SECURITY SERVICES (PVT) LTD</p>
              <div class="col-lg-11 spacing-right">
                  Feedback Form Received By: <br> <input class="form-control" readonly name="feed_received[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-11 spacing-right">
                  Remarks: <br> <input class="form-control" readonly type="text" name="feed_remarks[]" placeholder="..." style="width: 100%;">
              </div>
          </div>
          <div class="row">
              <div class="col-lg-11 spacing-right">
                  Attachments: <br> <input id="" class="form-control" readonly name="feed_attach[]" type="file" placeholder="..." style="width: 100%;">
              </div>

          </div>
          <div class="new_branch mt-2">
              <button type="button" onclick="removeFeedbackSection(${feedbackRoom})">
                  Remove
              </button>
          </div>
          </div>

      </div>
  `;

        objTo.appendChild(divTest);
    }

    function removeFeedbackSection(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>
<script>
    var complaintRoom = 1;

    function addComplaintSection() {
        complaintRoom++;
        var objTo = document.getElementById('complaintForm');
        var divTest = document.createElement("div");
        divTest.setAttribute("class", "removeclass" + complaintRoom);

        divTest.innerHTML = `
      <div class="col-lg-12">
          <div class="row mb-2">


              <div class="col-lg-4 spacing-left spacing-right">
                  Complaint Number <br> <input class="form-control" readonly name="complaint_no[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <h5 class="mt-3">Guards Duty</h5>

              <div class="col-lg-5 spacing-left spacing-right form-group">
                  Guards Duty <br>
                  <div class="input-group" style="width: 100%;">
                      <select class="form-control mt-1" name="complaint_guards_duty" style="width: 70%; border-radius: 4px 0 0 4px; ">
                          <option value="Legal Fee">Guards Behaviour</option>
                          <option value="Speed Money">Absenteeism </option>
                          <option value="Consultancy Fee">Guards Sleeping</option>
                      </select>
                      <div class="input-group-append" style="width: 30%;">
                          <a>
                              <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                          </a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                  Notes <br>   <textarea id="w3review" class="form-control" readonly name="complaint_gaurd_note[]" rows="2" cols="40">
                  </textarea>
                  </div>
              <div class="col-lg-3 spacing-left spacing-right">
                  Attachments <br> <input class="form-control" readonly name="complaint_guard_attach[]" type="file" placeholder="..." style="width: 100%;">
              </div>
          </div>
      </div>
      <div class="col-lg-12">
          <div class="row mb-2">
              <h5>Weapons, Uniform and Equipment</h5>
              <div class="col-lg-5 spacing-left spacing-right form-group">
                  Weapons, Uniform and Equipment <br>
                  <div class="input-group" style="width: 100%;">
                      <select class="form-control mt-1" name="wea_uni_equip[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                          <option value="Legal Fee">Uniform</option>
                          <option value="Speed Money">Aemourer </option>
                          <option value="Consultancy Fee">Ammunition</option>
                          <option value="Legal Fee">Wireless Sets</option>
                          <option value="Speed Money">Torch </option>
                      </select>
                      <div class="input-group-append" style="width: 30%;">
                          <a>
                              <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                          </a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                  Notes <br>   <textarea id="w3review" class="form-control" readonly name="wue_note[]" rows="2" cols="40">
                  </textarea>
                  </div>
              <div class="col-lg-3 spacing-left spacing-right">
                  Attachments <br> <input class="form-control" readonly name="wue_attach[]" type="file" placeholder="..." style="width: 100%;">
              </div>
          </div>
      </div>
      <div class="col-lg-12">
          <div class="row mb-2">
              <h5>Finance Department</h5>
              <div class="col-lg-5 spacing-left spacing-right form-group">
                  Finance Department <br>
                  <div class="input-group" style="width: 100%;">
                      <select class="form-control mt-1" name="finance_dept[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                          <option value="Legal Fee">Email</option>
                          <option value="Speed Money">SMS</option>
                          <option value="Consultancy Fee">CALL</option>
                          <option value="Legal Fee">UAN</option>
                          <option value="Speed Money">WHATSAPP </option>
                      </select>
                      <div class="input-group-append" style="width: 30%;">
                          <a>
                              <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                          </a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                  Notes <br>   <textarea id="w3review" class="form-control" readonly name="fd_note[]" rows="2" cols="40">
                  </textarea>
                  </div>
              <div class="col-lg-3 spacing-left spacing-right">
                  Attachments <br> <input class="form-control" readonly name="fd_attach[]" type="file" placeholder="..." style="width: 100%;">
              </div>
          </div>
      </div>
      <div class="col-lg-12">
          <div class="row mb-2">
              <h5>Source of Complaint</h5>
              <div class="col-lg-5 spacing-left spacing-right form-group">
                  Source of Complaint <br>
                  <div class="input-group" style="width: 100%;">
                      <select class="form-control mt-1" name="src_complaint[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                          <option value="Legal Fee">Email</option>
                          <option value="Speed Money">SMS</option>
                          <option value="Consultancy Fee">CALL</option>
                          <option value="Legal Fee">UAN</option>
                          <option value="Speed Money">WHATSAPP </option>
                      </select>
                      <div class="input-group-append" style="width: 30%;">
                          <a>
                              <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                          </a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-5 spacing-left" style="margin-left: 12px">
                  Notes <br>   <textarea id="w3review" class="form-control" readonly name="src_note[]" rows="2" cols="40">
                  </textarea>
                  </div>
              <div class="col-lg-3 spacing-left spacing-right">
                  Attachments <br> <input class="form-control" readonly name="src_attach[]" type="file" placeholder="..." style="width: 100%;">
              </div>
          </div>
      </div>
      <div class="col-lg-12">
          <div class="row mb-2">
              <h5>Management Issues</h5>
              <div class="col-lg-3 mt-2 spacing-right">
                  <div class=" mb-2 d-flex align-items-center">
                      Feedback : <br>
                      <select class="form-control mt-1" name="mng_feed[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                      </select>
                  </div>
              </div>
              <div class="col-lg-3 spacing-left spacing-right">
                  Attachments <br> <input class="form-control" readonly id="printing_date" name="mng_attach[]" type="file" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-3 spacing-left" style="margin-left: 12px">
                  Notes <br>   <textarea id="w3review" class="form-control" readonly name="mng_note[]" rows="2" cols="40">
                  </textarea>
              </div>
          </div>
      </div>
      <div class="col-lg-12">
          <div class="row mb-2">
              <h5>Complaint POC Details</h5>
              <div class="col-lg-4 spacing-right">
                  Name <br> <input class="form-control" readonly name="complaint_poc_name" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-right">
                  Designation <br> <input class="form-control" readonly name="complaint_poc_desig[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-right">
                  Department <br> <input class="form-control" readonly name="complaint_poc_dept[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-right">
                  Email<br> <input class="form-control" readonly name="complaint_poc_email[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-right">
                  Contact Number<br> <input class="form-control" readonly name="complaint_poc_contact[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-right">
                  Picture of Complaint <br> <input class="form-control" readonly name="complaint_picture[]" type="file" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-right">
                  Details of Complaint <br> <input class="form-control" readonly name="details_complaint[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-right">
                  Details Attachment<br> <input class="form-control" readonly name="details_attach[]" type="file" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right form-group">
                  Complaint Tagged To : <br>
                  <div class="input-group" style="width: 100%;">
                      <select class="form-control mt-1" name="complaint_tagged[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                          <option value="Legal Fee">talha sahni</option>
                      </select>
                      <div class="input-group-append" style="width: 30%;">
                          <a>
                              <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                          </a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-5 spacing-left spacing-right form-group">
                  Complaint Addressed By  : <br>
                  <div class="input-group" style="width: 100%;">
                      <select class="form-control mt-1" name="complaint_arressed[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                          <option value="Legal Fee">talha sahni</option>
                      </select>
                      <div class="input-group-append" style="width: 30%;">
                          <a>
                              <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row mb-2">
          <div class="col-lg-6 spacing-left spacing-right mt-2">
              Attachements <br> <input class="form-control" readonly type="file" name="complaint_addressed_attach[]" placeholder="..." style="width: 70%;" multiple>
          </div>
          <div class="col-lg-6 spacing-left spacing-right mt-2">
              Notes <br>
              <textarea id="w3review" class="form-control" readonly name="complaint_addressed_attach[]" rows="2" cols="38">
              </textarea>
          </div>
      </div>
      <div class="new_branch mt-2">
          <button type="button" onclick="removeComplaintSection(${complaintRoom})">
              Remove
          </button>
      </div>
      <hr>
  `;

        objTo.appendChild(divTest);
    }

    function removeComplaintSection(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>
<script>
    var notificationRoom = 1;

    function addNotificationSection() {
        notificationRoom++;
        var objTo = document.getElementById('notificationForm');
        var divTest = document.createElement("div");
        divTest.setAttribute("class", "removeclass" + notificationRoom);

        divTest.innerHTML = `
      <div class="col-lg-12 spacing-right" id="notificationForm">
          <div class="row mb-2">
              <div class="col-lg-3 spacing-right">
                  Notification No. <br> <input class="form-control" readonly type="text" name="notification_no[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-left spacing-right form-group">
                      Notification Related to : <br>
                      <div class="input-group" style="width: 100%;">
                          <select class="form-control mt-1" name="notification_related[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                              <option value="tax">tax</option>
                          </select>
                          <div class="input-group-append" style="width: 30%;">
                              <a>
                                  <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                              </a>
                          </div>
                      </div>
                  </div>
              <div class="col-lg-4 spacing-left">
                  Attachment. <br> <input class="form-control" readonly type="file" name="notification_attach[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-3">
                  Notes. <br> <textarea class="form-control" readonly type="text" name="notification_note[]" placeholder="..." style="width: 100%;"></textarea>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-5 spacing-left spacing-right form-group">
                  Notification Shared With : <br>
                  <div class="input-group" style="width: 100%;">
                      <select class="form-control mt-1" name="notification_shared[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                          <option value="talha sahni">talha sahni</option>
                      </select>
                      <div class="input-group-append" style="width: 30%;">
                          <a>
                              <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row mb-2">
              <div class="col-lg-6 spacing-left spacing-right mt-2">
                  Attachements <br> <input class="form-control" readonly type="file" name="notification_ex_attach[]" placeholder="..." style="width: 70%;" multiple>
              </div>
              <div class="col-lg-6 spacing-left spacing-right mt-2">
                  Notes <br>
                  <textarea id="w3review" class="form-control" readonly name="notification_ex_note[]" rows="2" cols="38">
                  </textarea>
              </div>
          </div>

      </div>
      <div class="new_branch mt-2">
          <button type="button" onclick="removeNotificationSection(${notificationRoom})">
              Remove
          </button>
      </div>
      <hr>
  `;

        objTo.appendChild(divTest);
    }

    function removeNotificationSection(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>
<script>
    var assignmentRoom = 1;

    function addAssignmentSection() {
        assignmentRoom++;
        var objTo = document.getElementById('assignmentInfo');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "removeclass" + assignmentRoom);

        divtest.innerHTML = `
  <div class="row">
      <div class="col-lg-6">
          <div class="row mb-2">
              <div class="col-lg-3 spacing-right">
                  Customer Name <br>
                  <input class="form-control" readonly name="asig_customer_name[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-3 spacing-left spacing-right">
                  Task Assigning <br> <input class="form-control" readonly name="task_assigning[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-3 spacing-right">
                  Designation <br>
                  <input class="form-control" readonly type="text" name="asig_desig[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-3 spacing-right">
                  Office/Floor <br> <input class="form-control" readonly name="asig_office[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-3 spacing-left spacing-right">
                  Building Name<br> <input class="form-control" readonly type="text" name="asig_building[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right">
                  Road/Street <br> <input class="form-control" readonly type="text" name="asig_road[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-right">
                  Area <br> <input class="form-control" readonly type="text" name="asig_area[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right">
                  City <br> <input class="form-control" readonly type="text" name="asig_city[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-right">
                  Country <br> <input class="form-control" readonly type="text" name="asig_country[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right">
                  Security Incharge <br> <input class="form-control" readonly name="asig_security[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-right">
                  Contact Details <br> <input class="form-control" readonly name="asig_contact[]" type="text" placeholder="..." style="width: 100%;">
              </div>

              <h5>Site Incharge Details</h5>
              <div class="col-lg-3 spacing-right">
                  Incharge Name <br>
                  <input class="form-control" readonly type="text" name="incharge_name[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-3 spacing-right">
                  Designation <br>
                  <input class="form-control" readonly type="text" name="incharge_desig[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-3 spacing-left spacing-right">
                  Contact Details <br> <input class="form-control" readonly name="incharge_contact[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-8 spacing-right">
                  High Risk Areas <br>
                  <input class="form-control" readonly type="text" name="incharge_help[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-8 spacing-right">
                  Description of Risk <br>
                  <input class="form-control" readonly type="text" name="incharge_desc[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-8 spacing-right">
                  History of Risk <br> <input class="form-control" readonly name="incharge_risk[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-8 spacing-right" style="margin-top: 40px">
                  Assigned Area Manager Of PIFFERS <br>
                  <input class="form-control" readonly type="text" name="incharge_asig[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-8 spacing-right">
                  Signed By <br> <input class="form-control" readonly name="incharge_signed_by[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-8 spacing-right">
                  Date <br> <input class="form-control" readonly type="date" name="incharge_date[]" placeholder="..." style="width: 100%;">
              </div>
          </div>

      </div>
      <div class="col-lg-6">
          <div class="row mb-2">
          <h5>Address</h5>
              <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                      Office No <br> <input class="form-control" readonly id="" name="incharge_offc[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left">
                      Building <br> <input class="form-control" readonly id="" name="incharge_build[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
              </div>
              <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                      Block <br> <input class="form-control" readonly id="" name="incharge_block[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left">
                      Area <br> <input class="form-control" readonly id="" name="incharge_area[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
              </div>
              <div class="row mb-2">
                  <div class="col-lg-5 spacing-right">
                      City <br> <input class="form-control" readonly id="" name="incharge_city[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-5 spacing-left">
                      Pin Location <br> <input class="form-control" readonly id="" name="incharge_pin[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
              </div>
              <div class="col-lg-5 spacing-left spacing-right">
                  Country <br> <input class="form-control" readonly name="incharge_country[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right">
                  Site ID <br> <input class="form-control" readonly name="incharge_site[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right">
                  A-Guard <br> <input class="form-control" readonly name="incharge_a_g[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right">
                  Un-A-Guard <br> <input class="form-control" readonly name="incharge_a_ung[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-5 spacing-left spacing-right">
                  Total Guard <br> <input class="form-control" readonly name="incharge_t_g[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-8 spacing-right" style="margin-top:80px">
                  Recent Security Related Incidents <br>
                  <input class="form-control" readonly type="text" name="rec_inc_rel[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-8 spacing-right">
                  Frequency Of Occurence <br>
                  <input class="form-control" readonly type="text" name="feq_occ[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-8 spacing-right">
                  Expectations from PIFFERS <br>
                  <input class="form-control" readonly type="text" name="exp_piff[]" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-8 spacing-right">
                  Any Special Instructions <br> <input class="form-control" readonly name="any_spec[]" type="text" placeholder="..." style="width: 100%;">
              </div>

              <div class="col-lg-8 spacing-right">
                  Petrolling Instruction <br>
                  <input class="form-control" readonly type="text" name="petr_instruc[]" placeholder="..." style="width: 100%;">
              </div>

          </div>
      </div>
      <h3></h3>
      <div class="row mb-2">
          <div class="col-lg-6 spacing-left spacing-right mt-2">
              Attachments <br> <input class="form-control" readonly type="file" name="asig_ex_attach[]" placeholder="..." style="width: 70%;" multiple>
          </div>
          <div class="col-lg-6 spacing-left spacing-right mt-2">
              Notes <br>
              <textarea id="w3review" class="form-control" readonly name="asig_ex_notes[]" rows="2" cols="38">
              </textarea>
          </div>
      </div>
      <div class="new_branch mt-2">
          <button type="button" onclick="removeAssignmentSection(${assignmentRoom})">Remove</button>
      </div>
  </div>
  `;

        objTo.appendChild(divtest);
    }

    function removeAssignmentSection(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
    }
</script>
<script>
    var cleaningRoom = 1;

    function addCleaningSection() {
        cleaningRoom++;
        var objTo = document.getElementById('cleaningInfo');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "removeclass" + cleaningRoom);

        divtest.innerHTML = `
   <div>
      <div class="row col-lg-12">
          <div class="col-lg-4 spacing-right">
              Branch Name <br> <input class="form-control" readonly type="text" name="arm_branch_name[]" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-4 spacing-right">
              Branch ID <br> <input class="form-control" readonly type="text" name="arm_branch_id[]" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-4 spacing-right">
              Site ID <br> <input class="form-control" readonly type="text" name="arm_site_id[]" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-4 spacing-right">
              Client Name <br> <input class="form-control" readonly type="text" name="arm_client_name[]" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-4 spacing-right">
              Weapon Number <br> <input class="form-control" readonly type="text" name="arm_weapon_no[]" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-4 spacing-right">
              Weapon Bore <br> <input class="form-control" readonly type="text" name="arm_weapon_bore[]" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-4 spacing-right">
              Weapon Type <br> <input class="form-control" readonly type="text" name="arm_weapon_type[]" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-4 spacing-right">
              Working Details <br> <input class="form-control" readonly type="text" name="arm_work_detail[]" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-4 spacing-right">
              Sign of Customer <br> <input class="form-control" readonly type="text" name="arm_sign_cus[]" placeholder="..." style="width: 100%;">
          </div>
      </div>
      <div class="col-lg-12">
          <div class="row mb-2">
              <div class="col-lg-4 spacing-right" style="margin-bottom: 10px;">
                  New Authority Letter Issue : <br> <input class="form-control" readonly id="" name="arm_auth[]" type="checkbox" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
              New Authority Letter No <br> <input class="form-control" readonly id="head_office_email" id="inpFile42" name="arm_auth_no[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
              New Authority Letter Validity <br> <input class="form-control" readonly id="head_office_email" name="arm_auth_date[]" type="date" placeholder="..." style="width: 100%;">

              </div>
              <div class="col-lg-4 spacing-right" style="margin-bottom: 10px;">
                  Date of issue <br> <input class="form-control" readonly id="" name="arm_auth_issue[]" type="date" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                  Number of weapon cleaned <br> <input class="form-control" readonly id="head_office_email" id="inpFile42" name="arm_weapon_cleaned[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-left spacing-right" style="margin-bottom: 10px;">
                  Type of weapon cleaned <br> <input class="form-control" readonly id="head_office_email" name="type_weapon_cleaned[]" type="text" placeholder="..." style="width: 100%;">

              </div>
              <div class="col-lg-4 spacing-right">
                  Picture before cleaning <br> <input class="form-control" readonly id="" name="arm_pic_b[]" type="file" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-right">
                  Picture after cleaning <br> <input class="form-control" readonly id="" name="arm_pic_a[]" type="file" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-right">
                  Cost of the day <br> <input class="form-control" readonly id="" name="arm_cost_day[]" type="text" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-right">
                  Cost Bill <br> <input class="form-control" readonly id="" name="arm_cost_bill[]" type="file" placeholder="..." style="width: 100%;">
              </div>
              <div class="col-lg-4 spacing-right">
                  Next cleaning activity due on : <br> <input class="form-control" readonly id="" name="arm_next_clean[]" type="date" placeholder="..." style="width: 100%;">
              </div>
          </div>
          <div class="row mb-2">
              <div class="col-lg-4 spacing-right mt-2">
                  Notes <br>
                  <textarea id="w3review" class="form-control" readonly name="arm_auth_notes[]" rows="2" cols="38">
                  </textarea>
              </div>
              <div class="col-lg-4 spacing-left spacing-right mt-2">
                  Attachments <br> <input class="form-control" readonly name="arm_auth_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
              </div>

          </div>

      </div>
      <div class="new_branch mt-2">
           <button type="button" class="removeCleaning" onclick="removeCleaningSection(${cleaningRoom})">Remove</button>
      </div>
  </div>
  `;

        objTo.appendChild(divtest);
    }

    function removeCleaningSection(room) {
        document.querySelector('.removeclass' + room).remove();
    }
</script>
<script>
    var auditsRoom = 1;

    function audits_add_more() {
        auditsRoom++;
        var objTo = document.getElementById('auditsInfo');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "audits-section removeclass" + auditsRoom);

        divtest.innerHTML = `
  <div class="col-lg-12">
      <div class="row mb-2">
          <div class="col-lg-3 spacing-right">
              File Audited By: <br>
              <input class="form-control" readonly name="audit_file[]" type="text" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-3 spacing-left spacing-right">
              Signature: <br>
              <input class="form-control" readonly name="audit_sign[]" type="text" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-3 spacing-right">
              Date: <br>
              <input class="form-control" readonly name="audit_date[]" type="date" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-3 spacing-right">
              Attachments: <br>
              <input class="form-control" readonly name="audit_attach[]" type="file" placeholder="..." style="width: 100%;">
          </div>
          <h5 class="mt-3">Checked By :</h5>
          <div class="row mb-2">
              <div class="col-lg-5 spacing-right form-group">
                  Checked by: <br>
                  <div class="input-group" style="width: 100%;">
                      <select id="" class="form-control mt-1" name="audit_checked_by[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                          <option value="CMD">CMD</option>
                          <option value="CM">CM</option>
                          <option value="DGM">DGM</option>
                          <option value="GM">GM</option>
                      </select>
                  </div>
              </div>
          </div>
          <div class="row mb-2">
              <div class="col-lg-6 spacing-left spacing-right mt-2">
                  Attachements <br> <input class="form-control" readonly name="audit_ex_attach[]" type="file" placeholder="..." style="width: 70%;" multiple>
              </div>
              <div class="col-lg-6 spacing-left spacing-right mt-2">
                  Notes <br>
                  <textarea id="w3review" class="form-control" readonly name="audit_note[]" rows="2" cols="38">
                  </textarea>
              </div>
          </div>
          <button type="button" class="remove-audit-btn" onclick="removeAuditSection(${auditsRoom})">Remove</button>
      </div>
  </div>
  `;

        objTo.appendChild(divtest);
    }

    function removeAuditSection(room) {
        document.querySelector('.audits-section.removeclass' + room).remove();
    }
</script>
<script>
    var businessRoom = 1;

    function business_add_more() {
        businessRoom++;
        var objTo = document.getElementById('businessInfo');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "business-section removeclass" + businessRoom);

        divtest.innerHTML = `
  <div class="col-lg-12">
      <div class="row mb-2">
          <h5>POC :</h5>
          <div class="col-lg-12">
              <div class="row mb-2">

                  <div class="col-lg-6 spacing-right">
                      Name of Business <br> <input class="form-control" readonly name="bussiness_name[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-right">
                      Nature of Business <br> <input class="form-control" readonly name="bussiness_nature[]" type="text" placeholder="..." style="width: 100%;">
                  </div>
                  <div class="col-lg-6 spacing-left">
                      <h5>Address</h5>
                      <div class="row mb-2">
                          <div class="col-lg-5 spacing-right">
                              Office No <br> <input class="form-control" readonly name="bussiness_office_no[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-right">
                              Office No <br> <input class="form-control" readonly name="bussiness_floor[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left">
                              Building <br> <input class="form-control" readonly name="bussiness_building[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                      </div>
                      <div class="row mb-2">
                          <div class="col-lg-5 spacing-right">
                              Block <br> <input class="form-control" readonly name="bussiness_block[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left">
                              Area <br> <input class="form-control" readonly name="bussiness_area[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                      </div>
                      <div class="row mb-2">
                          <div class="col-lg-5 spacing-right">
                              City <br> <input class="form-control" readonly name="bussiness_city[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left">
                              Photograph of Building <br> <input class="form-control" readonly name="bussiness_photo[]" type="file" placeholder="..." style="width: 100%;">
                          </div>
                      </div>
                      <div class="row mb-2">
                          <div class="col-lg-5 spacing-right">
                              Email <br> <input class="form-control" readonly name="bussiness_email[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left">
                              Website <br> <input class="form-control" readonly name="bussiness_web[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                      </div>
                      <div class="row mb-2">
                          <div class="col-lg-5 spacing-right">
                              Pin location <br> <input class="form-control" readonly name="bussiness_pin[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-5 spacing-left">
                              GPS <br> <input class="form-control" readonly name="bussiness_gps[]" type="text" placeholder="..." style="width: 100%;">
                          </div>
                      </div>
                  </div>



              </div>

          </div>
          <div class="row mb-2">
          <div class="col-lg-4 spacing-left spacing-right mt-2">
              Notes <br>
              <textarea id="w3review" class="form-control" readonly name="bussiness_notes[]" rows="2" cols="38">
              </textarea>
          </div>
          <div class="col-lg-4 spacing-left spacing-right mt-2">
              Attachements <br> <input class="form-control" readonly type="file" name="bussiness_attach[]" placeholder="..." style="width: 70%;" multiple>
          </div>

          </div>
          <button type="button" class="remove-business-btn" onclick="removeBusinessSection(${businessRoom})">Remove</button>
      </div>
  </div>
  `;

        objTo.appendChild(divtest);
    }

    function removeBusinessSection(room) {
        document.querySelector('.business-section.removeclass' + room).remove();
    }
</script>
<script>
    var promotionalActivityRoom = 1;

    function addPromotionalActivitySection() {
        promotionalActivityRoom++;
        var objTo = document.getElementById('give_a_ways');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "removeclass" + promotionalActivityRoom);

        divtest.innerHTML = `
      <div class="row">
          <div class="col-lg-6 spacing-right form-group">
              Customer Details Entered in all Promotional Activities <br>
              <div class="input-group" style="width: 100%;">
                  <select id="category" class="form-control mt-1" name="promotional_act[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                      <option value="Calenders">Calenders</option>
                      <option value="Iftar">Iftar</option>
                      <option value="Greetings Card">Greetings Card</option>
                      <option value="Give aways">Give aways</option>
                      <option value="Thought">Thought</option>
                      <option value="Corporate">Corporate</option>
                  </select>
              </div>
          </div>
          <div class="col-lg-6 mt-1">
              <div class="spacing-left">
                  Quantity <br> <input class="form-control" readonly type="text" name="promotional_quantity[]" placeholder="..." style="width: 100%;">
              </div>
          </div>
              <div class="form-type col-lg-6 spacing-right">
              Estimated price<br> <input class="form-control" readonly id="shift_start_date" name="prom_price[]" type="text" placeholder="..." style="width: 100%;">
          </div>
          <div class="form-type col-lg-6 spacing-right">
              Date <br> <input class="form-control" readonly id="shift_end_date" name="prom_date[]" type="date" placeholder="..." style="width: 100%;">
          </div>
          <div class="col-lg-6">

              Notes <br> <textarea id="w3review" class="form-control" readonly name="promotional_notes[]" rows="2" cols="38">
                  </textarea>

          </div>
          <div class="col-lg-6">

              Attachments <br> <input class="form-control" readonly type="file" name="promotional_attach[]" placeholder="..." style="width: 100%;">

          </div>
          <div class="col-lg-2 spacing-left my-5">
              <button type="button" onclick="removePromotionalActivitySection(${promotionalActivityRoom})">Remove</button>
          </div>
      </div>
      <hr>
  `;

        objTo.appendChild(divtest);
    }

    function removePromotionalActivitySection(rid) {
        var element = document.querySelector('.removeclass' + rid);
        element.parentNode.removeChild(element);
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
                var nameColumn = row.querySelector(
                    '.col-lg-3'); // Select the column with the name

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
            var inputHtml =
                '<input type="text" class="form-control currencyName" placeholder="New Currency ' +
                index + '">';
            var checkboxHtml =
                '<div class="form-check form-check-inline"><input class="form-check-input" name="compliances[]" type="checkbox" id="inlineCheckbox' +
                (index + 5) + '">' + inputHtml + '</div>';
            $('#new-checkboxes').append(checkboxHtml);

            // Update the newly added input field to create a corresponding label for the checkbox
            $('.currencyName').last().on('blur', function () {
                var checkboxId = $(this).siblings('input[type="checkbox"]').attr('id');
                var labelHtml = '<label class="form-check-label" for="' + checkboxId + '">' + $(
                    this).val() + '</label>';
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
            var inputHtml = '<input type="text" class="form-control currencyName" placeholder="New ' +
                index + '">';
            var checkboxHtml =
                '<div class="form-check form-check-inline"><input class="form-check-input" name="compliances[]" type="checkbox" id="inlineCheckbox' +
                (index + 5) + '">' + inputHtml + '</div>';
            $('#new-checkboxes1').append(checkboxHtml);

            // Update the newly added input field to create a corresponding label for the checkbox
            $('.currencyName').last().on('blur', function () {
                var checkboxId = $(this).siblings('input[type="checkbox"]').attr('id');
                var labelHtml = '<label class="form-check-label" for="' + checkboxId + '">' + $(
                    this).val() + '</label>';
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
        // Loop through each entry in customer_man_powers and display data
        @foreach ($customers->customermanpowers as $index => $manpowers)
                var accordionCount = {{ $index + 1 }};

                var accordionHtml = `
                  <div class="accordion-item" id="manpowerEntry${accordionCount}">
                      <h2 class="accordion-header" id="manpowerHeading${accordionCount}">
                          <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#collapse${accordionCount}" aria-expanded="false" aria-controls="collapse${accordionCount}">
                              Manpower Entry ${accordionCount}
                          </button>
                      </h2>
                      <div id="collapse${accordionCount}" class="collapse" aria-labelledby="manpowerHeading${accordionCount}">
                          <div class="accordion-body">
                              <input type="hidden" name="customermanpowers[${accordionCount - 1}][m_id]" value="{{ $manpowers->id }} readonly">
                              <div class="row col-lg-12 manpower">
                                  <div class="col-lg-6 spacing-right">
                                      <div class="row mb-2">
                                          <div class="form-type col-lg-5 spacing-left">
                                              Guard Post No <br> <input class="form-control" type="text" name="customermanpowers[${accordionCount - 1}][man_post]" value="{{ $manpowers->man_post }}" placeholder="..." style="width: 100%; readonly">
                                          </div>
                                          <div class="col-lg-5 spacing-left spacing-right form-group">
                                              Category <br>
                                              <div class="input-group" style="width: 100%;">
                                                  <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_cat]" value="{{ $manpowers->man_cat }}" type="text" placeholder="..." style="width: 100%; readonly">
                                              </div>
                                          </div>
                                          <div class="col-lg-5 spacing-left spacing-right form-group">
                                              Uniform Type <br>
                                              <div class="input-group" style="width: 100%;">
                                                  <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_uni]" type="text" value="{{ $manpowers->man_uni }}" placeholder="..." style="width: 100%; readonly">
                                              </div>
                                          </div>
                                          <div class="col-lg-5 spacing-left spacing-right form-group">
                                                  Uniform Number <br>
                                                  <div class="input-group" style="width: 100%;">
                                                      <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_uni_no]"  type="text" value="{{ $manpowers->man_uni_no }}" placeholder="..." style="width: 100%; readonly">
                                                  </div>
                                              </div>
                                              <div class="col-lg-5 spacing-left spacing-right form-group">
                                                  Weapon Type <br>
                                                  <div class="input-group" style="width: 100%;">
                                                      <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_weapon]"  type="text" value="{{ $manpowers->man_weapon }}" placeholder="..." style="width: 100%; readonly">
                                                  </div>
                                              </div>
                                              <div class="col-lg-5 spacing-left spacing-right form-group">
                                                  Ammunition Type <br>
                                                  <div class="input-group" style="width: 100%;">
                                                      <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_ammu]"  type="text" value="{{ $manpowers->man_ammu }}" placeholder="..." style="width: 100%; readonly">
                                                  </div>
                                              </div>
                                              <div class="col-lg-5 spacing-left spacing-right form-group">
                                                  Equipment <br>
                                                  <div class="input-group" style="width: 100%;">
                                                      <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_equip]"  type="text" value="{{ $manpowers->man_equip }}" placeholder="..." style="width: 100%; readonly">
                                                  </div>
                                              </div>
                                              <div class="form-type col-lg-5 spacing-right">
                                                  Picture of Equipment <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_equip_attach]"  type="file" value="{{ $manpowers->man_equip_attach }}" placeholder="..." style="width: 100%; readonly">
                                                  <div class="col-lg-5 spacing-right">
                                                      <div class="image-preview42" id="imagePreview42">
                                                          @if ($manpowers->man_equip_attach)
                                                              <img src="{{ asset($manpowers->man_equip_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                          @else
                                                              <span class="image-preview__default-text42">Image Preview</span>
                                                          @endif
                                                      </div>
                                                  </div>
                                              </div>

                                      </div>

                                  </div>
                                  <div class="col-lg-6 spacing-left">
                                      <div class="row mb-3">
                                          <div class="form-type col-lg-6 spacing-right">
                                              Shift Start date. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][s_start_date]" value="{{ $manpowers->s_start_date }}" type="date" placeholder="..." style="width: 100%; readonly">
                                          </div>
                                          <div class="form-type col-lg-6 spacing-right">
                                              Shift End date. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][s_end_date]" value="{{ $manpowers->s_end_date }}" type="date" placeholder="..." style="width: 100%; readonly">
                                              <div id="shiftEndDateError" style="color: red;"></div>
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="form-type col-lg-6 spacing-right">
                                              Shift Start time. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][s_start_time]" type="time" value="{{ $manpowers->s_start_time }}" placeholder="..." style="width: 100%; readonly">
                                          </div>
                                          <div class="form-type col-lg-6 spacing-right">
                                              Shift End time. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][s_end_time]" type="time" value="{{ $manpowers->s_end_time }}" placeholder="..." style="width: 100%; readonly">
                                              <div id="shiftEndTimeError" style="color: red;"></div>
                                          </div>
                                      </div>

                                      <div class="row mb-3">
                                          <div class="form-type col-lg-6 spacing-right">
                                          Deployment Start date. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_start_date]"  type="date" value="{{ $manpowers->man_start_date }}" placeholder="..." style="width: 100%; readonly">
                                          </div>
                                          <div class="form-type col-lg-6 spacing-right">
                                          Deployment End date. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_end_date]"  type="date" value="{{ $manpowers->man_end_date }}" placeholder="..." style="width: 100%; readonly">
                                          <div id="deploymentEndDateError" style="color: red;"></div>
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="form-type col-lg-6 spacing-right">
                                          Deployment Start time. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_start_time]"  type="time" value="{{ $manpowers->man_start_time }}" placeholder="..." style="width: 100%; readonly">
                                          </div>
                                          <div class="form-type col-lg-6 spacing-right">
                                          Deployment End time. <br> <input class="form-control"  name="customermanpowers[${accordionCount - 1}][man_end_time]"  type="time" value="{{ $manpowers->man_end_date }}" placeholder="..." style="width: 100%; readonly">
                                          <div id="deploymentEndTimeError" style="color: red;"></div>
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="form-type col-lg-6 spacing-right">
                                          Quantity. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_quan]"  type="text" value="{{ $manpowers->man_quan }}" placeholder="..." style="width: 100%; readonly">
                                          </div>
                                          <div class="form-type col-lg-6 spacing-right">
                                          Duty Hours. <br> <input class="form-control"  name="customermanpowers[${accordionCount - 1}][man_hours]"  type="text" value="{{ $manpowers->man_hours }}" placeholder="..." style="width: 100%; readonly">
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="form-type col-lg-6 spacing-right">
                                          Post Orders / JD of Guard Post. <br>
                                          <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_jd_attach]"  type="file" value="{{ $manpowers->man_jd_attach }}" placeholder="..." style="width: 100%; readonly">
                                              <div class="col-lg-5 spacing-right">
                                                  <div class="image-preview42" id="imagePreview42">
                                                      @if ($manpowers->man_jd_attach)
                                                          <img src="{{ asset($manpowers->man_jd_attach) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                                                      @else
                                                          <span class="image-preview__default-text42">Image Preview</span>
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-type col-lg-6 spacing-right">
                                          Any Special Instructions. <br>
                                          <textarea class="form-control" id="w3review5" name="customermanpowers[${accordionCount - 1}][man_any_sp]" type="notes" oninput="trimSpaces5()" onclick="moveCursorToStart5()"  placeholder="..." style="width: 100%;" readonly>{ $manpowers->man_any_sp }</textarea>
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="form-type col-lg-6 spacing-right">
                                              Approved Leaves. <br> <input class="form-control"name="customermanpowers[${accordionCount - 1}][man_apr_l]"  value="{{ $manpowers->man_apr_l }}" type="text" placeholder="..." style="width: 100%; readonly">
                                          </div>
                                          <div class="form-type col-lg-6 spacing-right">
                                              Salary of total days. <br> <input class="form-control" name="customermanpowers[${accordionCount - 1}][man_salary]"  value="{{ $manpowers->man_salary }}" type="text" placeholder="..." style="width: 100%; readonly">
                                          </div>
                                      </div>
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
</script> {{-- Script for showing the alert of meeting date --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the elements
        var meetingDateInput = document.getElementById('meeting_date');
        var frequencyInput = document.getElementById('meeting_freq');
        var alertTextarea = document.getElementById('meeting_freq_alert');
        var hiddenAlert = document.getElementById('hiddenBootstrapAlert');
        var hiddenAlertContent = document.getElementById('hiddenAlertContent');
        var customersNameInput = document.getElementById('customers_name');

        // Function to convert a date from one format to another
        function convertDateFormat(dateString, fromFormat, toFormat) {
            var dateObj = new Date(dateString);
            var year = dateObj.getFullYear();
            var month = ('0' + (dateObj.getMonth() + 1)).slice(-2);
            var day = ('0' + dateObj.getDate()).slice(-2);

            if (toFormat === 'MM/DD/YYYY') {
                return month + '/' + day + '/' + year;
            } else {
                return year + '-' + month + '-' + day;
            }
        }

        // Function to calculate the next meeting date
        function calculateNextMeetingDate() {
            var currentDate = new Date();
            var selectedDate = new Date(convertDateFormat(meetingDateInput.value, 'MM/DD/YYYY', 'YYYY-MM-DD'));
            var frequency = frequencyInput.value;
            var customersName = customersNameInput.value;

            if (frequency === 'Weekly') {
                selectedDate.setDate(selectedDate.getDate() + 7);
            } else if (frequency === 'Monthly') {
                selectedDate.setMonth(selectedDate.getMonth() + 1);
            }

            // Display the calculated next meeting date
            var nextMeetingDate = convertDateFormat(selectedDate.toISOString().split('T')[0], 'YYYY-MM-DD',
                'MM/DD/YYYY');
            alertTextarea.value = 'Next Meeting of ' + customersName + ' is on ' + nextMeetingDate;

            // Check if the calculated date is today or in the past
            if (
                currentDate.getFullYear() === selectedDate.getFullYear() &&
                currentDate.getMonth() === selectedDate.getMonth() &&
                currentDate.getDate() === selectedDate.getDate()
            ) {
                // Update to "Meeting Today" if the date arrives
                var alertMessage = 'Next Meeting of ' + customersName + ' is today on ' + nextMeetingDate;
                alertTextarea.value = alertMessage;

                // Show Bootstrap alert with custom message
                showBootstrapAlert(alertMessage);
            } else if (currentDate > selectedDate) {
                // Update to "Meeting was on" if the date has passed
                var alertMessage = 'Meeting of ' + customersName + ' was on ' + nextMeetingDate;
                alertTextarea.value = alertMessage;

                // Show Bootstrap alert with custom message
                showBootstrapAlert(alertMessage);
            }
        }

        // Function to show Bootstrap alert with custom message
        function showBootstrapAlert(message) {
            // Set the alert message
            hiddenAlertContent.textContent = message;

            // Show the alert
            hiddenAlert.classList.add('show');
        }

        // Add event listeners to update alert field when date or frequency changes
        meetingDateInput.addEventListener('input', calculateNextMeetingDate);
        frequencyInput.addEventListener('input', calculateNextMeetingDate);

        // Initial calculation on page load
        calculateNextMeetingDate();
    });

    // Function to trim leading and trailing spaces
    function trimSpaces21() {
        var textarea = document.getElementById('meeting_freq_alert');
        textarea.value = textarea.value.trim();
    }

    // Function to move cursor to the start
    function moveCursorToStart21() {
        var textarea = document.getElementById('meeting_freq_alert');
        textarea.setSelectionRange(0, 0);
    }
</script> {{-- script for showing alert for contract renewel date --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the elements
        var renewalDateInput = document.getElementById('c_r_date');
        var renewalReminderInput = document.getElementById('c_r_rem');
        var hiddenRenewalAlert = document.getElementById('hiddenRenewalAlert');
        var hiddenRenewalAlertContent = document.getElementById('hiddenRenewalAlertContent');

        // Function to convert a date from one format to another
        function convertDateFormat(dateString, fromFormat, toFormat) {
            var dateObj = new Date(dateString);
            var year = dateObj.getFullYear();
            var month = ('0' + (dateObj.getMonth() + 1)).slice(-2);
            var day = ('0' + dateObj.getDate()).slice(-2);

            if (toFormat === 'MM/DD/YYYY') {
                return month + '/' + day + '/' + year;
            } else {
                return year + '-' + month + '-' + day;
            }
        }

        // Function to calculate the next renewal alert date
        function calculateRenewalAlert() {
            var currentDate = new Date();
            var renewalDate = new Date(convertDateFormat(renewalDateInput.value, 'MM/DD/YYYY', 'YYYY-MM-DD'));

            // Calculate the difference in milliseconds
            var timeDifference = renewalDate.getTime() - currentDate.getTime();
            var daysDifference = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

            console.log("Days Difference:", daysDifference); // Debug statement

            // Show the appropriate reminder message
            if (daysDifference === 30) {
                renewalReminderInput.value = 'Your contract renewal date is on ' + convertDateFormat(renewalDate
                    .toISOString().split('T')[0], 'YYYY-MM-DD', 'MM/DD/YYYY');
            } else if (daysDifference < 30 && daysDifference > 0) {
                renewalReminderInput.value = 'Your contract renewal date is ' + daysDifference + ' days away.';
            } else if (daysDifference > 30) {
                var daysAfter = daysDifference - 30;
                renewalReminderInput.value = 'Your contract renewal date is after ' + daysAfter + ' days.';
            } else {
                renewalReminderInput.value = '';
            }

            // Show Bootstrap alert
            showRenewalBootstrapAlert();
        }

        // Function to show Bootstrap alert for renewal
        function showRenewalBootstrapAlert() {
            // Set the alert message
            var alertMessage = renewalReminderInput.value;
            hiddenRenewalAlertContent.textContent = alertMessage;

            // Show the alert only if there's a message
            if (alertMessage) {
                hiddenRenewalAlert.classList.add('show');
            } else {
                hiddenRenewalAlert.classList.remove('show');
            }
        }

        // Add event listener to update alert field when date changes
        renewalDateInput.addEventListener('input', calculateRenewalAlert);

        // Initial calculation on page load
        calculateRenewalAlert();
    });

    // Function to trim leading and trailing spaces
    function trimSpacesRenewal() {
        var textarea = document.getElementById('c_r_rem');
        textarea.value = textarea.value.trim();
    }
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
@foreach ($customers->customerinspections as $inspection)
<div class="modal fade" id="editInspectionModal{{ $inspection->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    data-bs-container="body" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('inspection.update', $inspection->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Inspection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label>Inspection Number</label>
                            <input type="text" name="inspection_no" class="form-control"
                                value="{{ $inspection->inspection_no }}" required>
                        </div>
                        <div class="col-md-6">
                            <label>Employee ID</label>
                            <input type="text" name="inspection_emp_id" class="form-control"
                                value="{{ $inspection->inspection_emp_id }}" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label>Name</label>
                            <input type="text" name="inspection_emp_name" class="form-control"
                                value="{{ $inspection->inspection_emp_name }}" required>
                        </div>
                        <div class="col-md-6">
                            <label>Cell Number</label>
                            <input type="text" name="inspection_emp_cell" class="form-control"
                                value="{{ $inspection->inspection_emp_cell }}" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label>Department</label>
                            <input type="text" name="inspection_emp_dept" class="form-control"
                                value="{{ $inspection->inspection_emp_dept }}" required>
                        </div>
                        <div class="col-md-6">
                            <label>Date</label>
                            <input type="date" name="inspection_date" class="form-control"
                                value="{{ $inspection->inspection_date }}" required>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label>Remarks</label>
                        <input type="text" name="inspection_rem_petr" class="form-control"
                            value="{{ $inspection->inspection_rem_petr }}" required>
                    </div>

                    <div class="mb-2">
                        <label>Notes</label>
                        <input type="text" name="inspection_note" class="form-control"
                            value="{{ $inspection->inspection_note }}" required>
                    </div>

                    <div class="mb-2">
                        <label>Picture</label>
                        <input type="file" name="inspection_pic" class="form-control">
                        @if($inspection->inspection_pic)
                            <img src="{{ asset($inspection->inspection_pic) }}"
                                style="width:80px;height:80px;object-fit:cover;" class="mt-2">
                        @endif
                    </div>

                    <div class="mb-2">
                        <label>Attachment</label>
                        <input type="file" name="inspection_attach" id="inspection_attach" class="form-control">
                        @if($inspection->inspection_attach)
                            <a href="{{ asset($inspection->inspection_attach) }}" target="_blank" class="d-block mt-2">View
                                Attachment</a>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endforeach
<form id="deleteInspectionForm" method="POST">
    @csrf
    @method('DELETE')
</form>

<script>
    function deleteInspection(id) {
        if (confirm('Are you sure you want to delete this inspection?')) {
            let form = document.getElementById('deleteInspectionForm');
            form.action = "{{ route('inspection.destroy', ':id') }}".replace(':id', id);
            form.submit();
        }
    }
</script>
<style>
    /* 1. GLOBAL MODAL FIX (Keep this OUTSIDE any media queries) */
    .modal { 
        z-index: 1061 !important; 
    }
    .modal-backdrop { 
        z-index: 1060 !important; 
    }

    /* 2. TABLE STYLING */
    #inspectionTable th, 
    #inspectionTable td {
        border: 1px solid black;
        padding: 12px 8px;
        font-size: 0.9rem;
        vertical-align: middle;
        white-space: nowrap;
    }

    /* Allow text-heavy columns to wrap so table doesn't get too wide */
    #inspectionTable td:nth-child(8), 
    #inspectionTable td:nth-child(9) {
        white-space: normal;
        word-break: break-word;
        min-width: 150px;
    }

    .file-preview {
        text-align: center;
        cursor: pointer;
        display: inline-block;
    }

    .file-preview img {
        max-height: 60px;
        max-width: 80px;
        border-radius: 4px;
        transition: transform 0.2s;
    }
    
    .file-preview img:hover {
        transform: scale(1.1);
    }

    /* 3. MOBILE RESPONSIVE STYLES */
    @media (max-width: 768px) {
        #inspectionTable thead {
            display: none;
        }

        #inspectionTable tr {
            display: block;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        #inspectionTable td {
            display: block;
            text-align: right;
            position: relative;
            padding-left: 50%;
            border: none !important;
            padding-top: 8px;
        }

        #inspectionTable td:before {
            content: attr(data-label);
            position: absolute;
            left: 6px;
            width: 45%;
            font-weight: bold;
            text-align: left;
        }
    }
</style>
<script>
document.getElementById('inspection_attach').addEventListener('change', function () {

    const file = this.files[0];

    if (file) {

        let maxSize = 50 * 1024 * 1024; // 50MB

        if (file.size > maxSize) {

            alert("Video/File is too large. Maximum allowed size is 50MB.");

            this.value = ""; // clear selected file

        }

    }

});
</script>

  <!-- Questions Modal -->
                        <div class="modal fade" id="questionsModal" tabindex="-1" aria-labelledby="questionsModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="questionsModalLabel">Inspection Questions</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="questionsContent">
                                        <div class="text-center">
                                            <div class="spinner-border" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

</html>