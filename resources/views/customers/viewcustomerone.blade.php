@include('layouts.header')

@yield('main')


<div class="customer_form">
   <!-- Add these links in your HTML head to include FullCalendar's CSS and JS -->


  
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

    <section>
        <button id="download-pdf">Download PDF</button>

        <div id="hiddenBootstrapAlert" class="alert alert-danger alert-dismissible fade" role="alert" style="display: hidden;">
            <span id="hiddenAlertContent"></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div id="hiddenRenewalAlert" class="alert alert-success alert-dismissible fade" role="alert">
            <span id="hiddenRenewalAlertContent"></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </section>
    <section id="customer_form" style="font-weight:600;">
        <h4><b><i>Customer Information</i></b></h4>
        <div class="row col-lg-12">
            <div class="col-lg-4">
                <label style="font-weight: bold; margin-bottom: -5px;">Customer ID:</label>
                <span style="display: block">{{ $customers->customers_id }}</span>
            </div>
            <div class="col-lg-8">
                <label style="font-weight: bold; margin-bottom: -5px;">Customer Legal Name (As per NTN):</label>
                <span style="display: block">{{ $customers->customers_name }}</span>
            </div>
        </div>
        <div class="row col-lg-12" style="margin-top:15px;">
            <div class="col-lg-4">
                <label style="font-weight: bold; margin-bottom: -5px;">Suffix:</label>
                <span style="display: block">{{ $customers->customers_suffix }}</span>
            </div>
            <div class="col-lg-8">
                <label style="font-weight: bold; margin-bottom: -5px;">City of Deployment:</label>
                <span style="display: block">{{ $customers->city_of_deployment }}</span>
            </div>
        </div>
        <div class="row col-lg-12" style="margin-top:15px;">
            <div class="col-lg-4">
                <label style="font-weight: bold; margin-bottom: -5px;">Display Name as:</label>
                <span style="display: block">{{ $customers->display_name_as }}</span>
            </div>
            <div class="col-lg-8">
                <label style="font-weight: bold; margin-bottom: -5px;">Nature of Business:</label>
                <span style="display: block">{{ $customers->nature_of_business }}</span>
            </div>
        </div>
        <div class="row col-lg-12" style="margin-top:15px;">
            <div class="col-lg-4">
                <label style="font-weight: bold; margin-bottom: -5px;">Website:</label>
                <span style="display: block">{{ $customers->website }}</span>
            </div>
            <div class="col-lg-8">
                <label style="font-weight: bold; margin-bottom: -5px;">Phone:</label>
                <span style="display: block">{{ $customers->phone }}</span>
            </div>
        </div>
        <div class="row col-lg-12" style="margin-top:15px;">
            <div class="col-lg-4">
                <label style="font-weight: bold; margin-bottom: -5px;">Email:</label>
                <span style="display: block">{{ $customers->email }}</span>
            </div>
            <div class="col-lg-8">
                <label style="font-weight: bold; margin-bottom: -5px;">Sub Customer:</label>
                <span style="display: block">{{ $customers->sub_customer }}</span>
            </div>
        </div>
        <div class="row col-lg-12" style="margin-top:15px;">
            <div class="col-lg-4">
                <label style="font-weight: bold; margin-bottom: -5px;">Approved Commercials:</label>
                <input style="display:block; margin-left:1px;" class="form-check-input" name="approved_com" type="checkbox" {{ $customers->approved_com ? 'checked' : '' }} id="approved_commercials">
            </div>
            <div class="col-lg-8">
                <label style="font-weight: bold; margin-bottom: -5px;">QuickBox:</label>
                <input style="display:block; margin-left:1px;" class="form-check-input" type="checkbox" {{ $customers->quick_box ? 'checked' : '' }}  name="quick_box" id="quick_box" >
            </div>
        </div>
        <div class="row col-lg-12" style="margin-top:35px;">
            <div class="col-lg-4">
                <label style="font-weight: bold; margin-bottom: -5px;">EOBI:</label>
                <input style="display:block; margin-left:1px;" class="form-check-input" name="eobi" type="checkbox" {{ $customers->eobi ? 'checked' : '' }} id="eobi">
            </div>
            <div class="col-lg-8">
                <label style="font-weight: bold; margin-bottom: -5px;">Social Security:</label>
                 <input style="display:block; margin-left:1px;" class="form-check-input" name="social_security" type="checkbox" {{ $customers->social_security ? 'checked' : '' }} id="social_security">
            </div>
        </div>
        <div class="row col-lg-12" style="margin-top:35px;">
            <div class="col-lg-4">
                <label style="font-weight: bold; margin-bottom: -5px;">Group Life Insurrance:</label>
                <input style="display:block; margin-left:1px;" class="form-check-input" name="grp_life_ins" type="checkbox" {{ $customers->grp_life_ins ? 'checked' : '' }} id="grp_life_ins">
            </div>
            <div class="col-lg-8">
                <label style="font-weight: bold; margin-bottom: -5px;">Applicable Compliances:</label>
                <span style="display: block">{{ $customers->applicable_compliances }}</span>
            </div>
        </div>
        <h4 style="margin-top:35px;"><b><i>Contract Management</i></b></h4>
        <div class="row col-lg-12">
            <div class="col-lg-4">
                <label style="font-weight: bold; margin-bottom: -5px;">Summary of approved Strength:</label>
                <div class="col-lg-5 spacing-right">
                    <div class="image-preview42" id="imagePreview42">
                        @if($customers->sum_apr)
                        <img src="{{ asset($customers->sum_apr) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                        @else
                        <span class="image-preview__default-text42">Image Preview</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <label style="font-weight: bold; margin-bottom: -5px;">Accomodation Status:</label>
                <span style="display: block">{{ $customers->acm_status }}</span>
            </div>
        </div>
        <div class="row col-lg-12" style="margin-top:35px;">
            <div class="col-lg-4">
                <label style="font-weight: bold; margin-bottom: -5px;"> Meal Details:</label>
                <span style="display: block">{{ $customers->meal_detail }}</span>
            </div>
            <div class="col-lg-4">
                <label style="font-weight: bold; margin-bottom: -5px;">Any approved KPIs or SOW:</label>
                <div class="col-lg-5 spacing-right">
                    <div class="image-preview42" id="imagePreview42">
                        @if($customers->apr_kpi)
                        <img src="{{ asset($customers->apr_kpi) }}" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%; margin-left:-13px;">
                        @else
                        <span class="image-preview__default-text42">Image Preview</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const button = document.getElementById('download-pdf');
            if (button) {
                button.addEventListener('click', function() {
                    const element = document.getElementById('customer_form');
                    if (element) {
                        const options = {
                            margin: 1,
                            filename: 'customer_information.pdf',
                            image: { type: 'jpeg', quality: 0.98 },
                            html2canvas: { scale: 2 },
                            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                        };
                        html2pdf()
                            .set(options)
                            .from(element)
                            .save();
                    } else {
                        console.error('Element with ID "customer_form" not found.');
                    }
                });
            } else {
                console.error('Button with ID "download-pdf" not found.');
            }
        });
    </script>
</div>