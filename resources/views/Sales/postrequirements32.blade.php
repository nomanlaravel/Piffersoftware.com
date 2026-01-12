@include('layouts.header')
@yield('main')
<!--End of the Navbar-->
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
   <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
</div>
<h5 style="text-align:center;"><b><u>Prospect Details</u></b></h5>
<form  method="POST" action="{{ route('requirement.store') }}" enctype="multipart/form-data">
   @csrf
   <div>
    @include('sales.includes.prospec')
      <!--Tabs forDetails-->
      @include('sales.includes.nav')
      <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
         <!--Commercials-->
         <div class="tab-pane fade m-3" style="opacity: 90%;" id="commercials" role="tabpanel"
            aria-labelledby="nav-home-tab">
            <!-- <div class="row">
               <div class="col-lg-12 spacing-right">
                   <div class="row mb-2">
                   <table class="table table-striped-columns">
                       <tr class="table-bordered table-active">
                           <th scope="" style="padding-bottom:10px; padding-top:40px;">Category</th>
                           <th scope="" style="padding-bottom:10px; padding-top:40px;">Salary</th>
                           <th scope="" style="padding-bottom:10px; padding-top:40px;">EOBI</th>
                           <th scope="" style="padding-bottom:10px; padding-top:40px;">Social Security</th>
                           <th scope="" style="padding-bottom:10px; padding-top:40px;">Group Life Insurrance</th>
                           <th scope="" style="padding-bottom:10px; padding-top:40px;">Uniform Cost</th>
                           <th scope="" style="padding-bottom:10px; padding-top:40px;">Weapon and Ammunition</th>
                           <th scope="" style="padding-bottom:10px; padding-top:40px;">Training Cost</th>
                           <th scope="" style="padding-bottom:10px; padding-top:40px;">Admin Cost</th>
                           <th scope="" style="padding-bottom:10px; padding-top:20px;">Monthly Rate per Unit</th>
                           <th scope="" style="padding-bottom:10px; padding-top:40px;">GST(16%)</th>
                           <th scope="" style="padding-bottom:10px; padding-top:40px;">WHT(3%)</th>
                           <th scope="">Total Monthly Rate Per Unit</th>
                       </tr>
                       </thead>
                       <tbody>
                           <tr class="table-bordered">
                               <tr>
                                   <th scope="row">
                                       Armed Security Supervisor
                                   </th>
                                   <td>24,000</td>
                                   <td>875</td>
                                   <td>N/A</td>
                                   <td>250</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>1,999</td>
                                   <td>28,621</td>
                                   <td>4,579</td>
                                   <td>1027</td>
                                   <td>34,227</td>
                               </tr>
                               <tr>
                                   <th scope="row">
                                       Armed Security Guard(Ex-Army)
                                   </th>
                                   <td>20,000</td>
                                   <td>875</td>
                                   <td>1,050</td>
                                   <td>250</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>1,999</td>
                                   <td>25,671</td>
                                   <td>4,107</td>
                                   <td>921</td>
                                   <td>30,699</td>
                               </tr>
                               <tr>
                                   <th scope="row">
                                       Armed Security Guard(Civil)
                                   </th>
                                   <td>17,500</td>
                                   <td>875</td>
                                   <td>1,050</td>
                                   <td>250</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>1,999</td>
                                   <td>23,171</td>
                                   <td>3,707</td>
                                   <td>831</td>
                                   <td>27,710</td>
                               </tr>
                           </tr>
                       </tbody>
                       </table>
                   </div>
                   <hr class="w-75 mx-auto"/>
                   <div class="row mb-2">
                   <table class="table table-striped-columns">
                       <thead>
                       <tr class="table-bordered table-active">
                           <th scope="">Category</th>
                           <th scope="">Salary</th>
                           <th scope="">EOBI</th>
                           <th scope="">Social Security</th>
                           <th scope="">Group Life Insurrance</th>
                           <th scope="">Uniform Cost</th>
                           <th scope="">Weapon Cost</th>
                           <th scope="">Training Cost</th>
                           <th scope="">Admin Cost</th>
                           <th scope="">Monthly Rate per Unit</th>
                           <th scope="">GST(16%)</th>
                           <th scope="">Total Monthly Rate Per Unit</th>
                           <th scope="">Admin Cost</th>
                           <th scope="">Total Admin Cost</th>
                       </tr>
                       </thead>
                       <tbody>
                           <tr class="table-bordered">
                               <tr>
                                   <th scope="row">
                                       Armed Security Supervisor
                                   </th>
                                   <td>24,000</td>
                                   <td>875</td>
                                   <td>N/A</td>
                                   <td>250</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td style="background-color:#dee2e6;">823</td>
                                   <td>27,445</td>
                                   <td>4,391</td>
                                   <td>31,837</td>
                                   <td style="background-color:#dee2e6;"></td>
                                   <td>1,497</td>
                               </tr>
                               <tr>
                                   <th scope="row">
                                       Armed Security Guard(Ex-Army)
                                   </th>
                                   <td>20,000</td>
                                   <td>875</td>
                                   <td>1,050</td>
                                   <td>250</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td style="background-color:#dee2e6;">732</td>
                                   <td>24,404</td>
                                   <td>3,905</td>
                                   <td>29309</td>
                                   <td style="background-color:#dee2e6;"></td>
                                   <td>1,497</td>
                               </tr>
                               <tr>
                                   <th scope="row">
                                       Armed Security Guard(Civil)
                                   </th>
                                   <td>17,500</td>
                                   <td>875</td>
                                   <td>1,050</td>
                                   <td>250</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td style="background-color:#dee2e6;">1,999</td>
                                   <td>21,827</td>
                                   <td>3,492</td>
                                   <td>25,319</td>
                                   <td style="background-color:#dee2e6;"></td>
                                   <td>1,497</td>
                               </tr>
                           </tr>
                       </tbody>
                       </table>
                   </div>
                   <hr class="w-75 mx-auto"/>
                   <h5>Lump Sum</h5>
                   <div class="row mb-2">
                   <table class="table table-striped-columns">
                       <thead>
                       <tr class="table-bordered table-active">
                           <th scope="">Category</th>
                           <th scope="">Salary</th>
                           <th scope="">Uniform Cost</th>
                           <th scope="">Weapon and Ammunition Cost</th>
                           <th scope="">Training Cost</th>
                           <th scope="">Admin Cost</th>
                           <th scope="">Monthly Rate per Unit</th>
                           <th scope="">GST(16%)</th>
                           <th scope="">WHT(3%)</th>
                           <th scope="">Total Monthly Rate Per Unit</th>
                       </tr>
                       </thead>
                       <tbody>
                           <tr class="table-bordered">
                               <tr>
                                   <th scope="row">
                                       Armed Security Supervisor
                                   </th>
                                   <td>24,000</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>2,490</td>
                                   <td>27,987</td>
                                   <td>4,478</td>
                                   <td>1,004</td>
                                   <td>33,469</td>
                               </tr>
                               <tr>
                                   <th scope="row">
                                       Armed Security Guard(Ex-Army)
                                   </th>
                                   <td>20,000</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>2,490</td>
                                   <td>23,987</td>
                                   <td>3,838</td>
                                   <td>861</td>
                                   <td>28,685</td>
                               </tr>
                               <tr>
                                   <th scope="row">
                                       Armed Security Guard(Civil)
                                   </th>
                                   <td>17,500</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>2,490</td>
                                   <td>21,487</td>
                                   <td>3,438</td>
                                   <td>771</td>
                                   <td>25,696</td>
                               </tr>
                           </tr>
                       </tbody>
                       </table>
                   </div>
                   <hr class="w-75 mx-auto"/>
                   <div class="row mb-2">
                   <table class="table table-striped-columns">
                       <thead>
                       <tr class="table-bordered table-active">
                           <th scope="">Category</th>
                           <th scope="">Salary</th>
                           <th scope="">Uniform Cost</th>
                           <th scope="">Weapon and Ammunition Cost</th>
                           <th scope="">Training Cost</th>
                           <th scope="">Admin Cost</th>
                           <th scope="">Monthly Rate per Unit</th>
                           <th scope="">GST(16%)</th>
                           <th scope="">Total Monthly Rate Per Unit</th>
                           <th>Admin Cost</th>
                           <th>Total Admin Cost</th>
                       </tr>
                       </thead>
                       <tbody>
                           <tr class="table-bordered">
                               <tr>
                                   <th scope="row">
                                       Armed Security Supervisor
                                   </th>
                                   <td>24,000</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>789</td>
                                   <td style="background-color:#dee2e6;">26,286</td>
                                   <td>4,206</td>
                                   <td>30,491</td>
                                   <td style="background-color:#dee2e6;"></td>
                                   <td>1,497</td>
                               </tr>
                               <tr>
                                   <th scope="row">
                                       Armed Security Guard(Ex-Army)
                                   </th>
                                   <td>20,000</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>665</td>
                                   <td style="background-color:#dee2e6;">22,162</td>
                                   <td>3,546</td>
                                   <td>25,708</td>
                                   <td style="background-color:#dee2e6;"></td>
                                   <td>1,497</td>
                               </tr>
                               <tr>
                                   <th scope="row">
                                       Armed Security Guard(Civil)
                                   </th>
                                   <td>17,500</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>499</td>
                                   <td>588</td>
                                   <td style="background-color:#dee2e6;">19,585</td>
                                   <td>3,134</td>
                                   <td>22,718</td>
                                   <td style="background-color:#dee2e6;"></td>
                                   <td>1,497</td>
                               </tr>
                           </tr>
                       </tbody>
                       </table>
                   </div>
               </div>
               </div> -->
            <div class="col-12 d-flex">
               <div class="col-md-4 mt-2 ml-3">
                  <input class="form-check-input" name="with_compliances_check" type="checkbox" id="check-complaines">
                  <label class="form-check-label" for="check">With compliances</label>
               </div>
               <div class="col-md-4 mt-2 ml-3">
                  <input class="form-check-input" name="lump_sum_check" type="checkbox" id="check-lumpsum">
                  <label class="form-check-label" for="check">Lump Sum</label>
               </div>
               <div class="col-md-4 mt-2 ml-3">
                  <input class="form-check-input" name="reverse_working_check" type="checkbox" id="check-reverse">
                  <label class="form-check-label" for="check">Reverse Working</label>
               </div>
            </div>
            <div id="check1" style="display:none;">
               <div class="col-12 d-flex">
                  <div class="col-md-6 mt-2 ml-3">
                     <input class="form-check-input" name="wc_shown_wht_check" type="checkbox" id="check1-shown">
                     <label class="form-check-label" for="check">Shown WHT</label>
                  </div>
                  <div class="col-md-6 mt-2 ml-3">
                     <input class="form-check-input" name="wc_hidden_wht_check" type="checkbox" id="check1-hidden">
                     <label class="form-check-label" for="check">Hidden WHT</label>
                  </div>
               </div>
            </div>
            <div id="check2" style="display:none;">
               <div class="col-12 d-flex">
                  <div class="col-md-6 mt-2 ml-3">
                     <input class="form-check-input" name="ls_shown_wht_check" type="checkbox" id="check2-shown">
                     <label class="form-check-label" for="check">Shown WHT</label>
                  </div>
                  <div class="col-md-6 mt-2 ml-3">
                     <input class="form-check-input" name="ls_hidden_wht_check" type="checkbox" id="check2-hidden">
                     <label class="form-check-label" for="check">Hidden WHT</label>
                  </div>
               </div>
            </div>
            <!-- With Complaines- Shown WHT -->
               @include('sales.includes.withcomplainsshownwht')
            <!-- With Complaines- Hidden WHT -->
               @include('sales.includes.withcomplainhiddenwht')
            <!-- Lump Sum- Shown WHT -->
              @include('sales.includes.lumpsumshownwht')
            <!-- Lump Sum- Hidden WHT -->
              @include('Sales.includes.lumpsumhiddenwht')
            <!-- Reverse Working -->
               @include('sales.includes.reversworking')
            <!--  -->
         </div>
         <!--address-info-->
           @include('sales.includes.address')
         <!--Customer Requirements-->
           @include('sales.includes.custommerreq')
         <!--Details of Sales Agent-->
           @include('sales.includes.detailsalesagent')
         <!--Sales Visit-->
           @include('sales.includes.salesvisit')
         <!--attachements-->
           @include('sales.includes.attachment')
         <!--Comparative Analysis-->
            @include('sales.includes.comparativeanalist')
         <!--RFQ Documents-->
           @include('sales.includes.rfqdocments')
      </div>
      <button type="submit">Submit</button>
   </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   document.addEventListener('DOMContentLoaded', function () {
       document.querySelector('.dropdown').addEventListener('mouseover', function () {
           document.querySelector('.dropdown-content').style.display = 'block';
       });

       document.querySelector('.dropdown').addEventListener('mouseout', function () {
           document.querySelector('.dropdown-content').style.display = 'none';
       });
   });
</script>
<script>
   document.getElementById('categoryOfEquipment').addEventListener('change', function () {
       var selectedOption = this.value;
       hideAllContent(); // Hide all content first

       // Show content based on selected option
       switch (selectedOption) {
           case 'ClassA':
               document.getElementById('classAContent').style.display = 'block';
               break;
           case 'ClassB':
               document.getElementById('classBContent').style.display = 'block';
               break;
           case 'ClassC':
               document.getElementById('classCContent').style.display = 'block';
               break;
           case 'ClassD':
               document.getElementById('classDContent').style.display = 'block';
               break;
           case 'ClassE':
               document.getElementById('classEContent').style.display = 'block';
               break;
           case 'ClassF':
               document.getElementById('classFContent').style.display = 'block';
               break;
           default:
               // Do nothing if no option selected
               break;
       }
   });

   // Function to hide all content
   function hideAllContent() {
       var contentDivs = document.querySelectorAll('.col-lg-12.spacing-right[id$="Content"]');
       contentDivs.forEach(function (div) {
           div.style.display = 'none';
       });
   }
</script>
<script>
   document.getElementById('smokeDetectorInstallation').addEventListener('change', function () {
       var installationOption = this.value;
       var installationChargesField = document.getElementById('installationChargesField');

       if (installationOption === 'yes') {
           installationChargesField.style.display = 'block';
       } else {
           installationChargesField.style.display = 'none';
       }
   });
</script>
<script>
   document.getElementById('internalShiftingSelect').addEventListener('change', function () {
       var internalShiftingOption = this.value;
       var internalShiftingChargesField = document.getElementById('internalShiftingChargesField');

       if (internalShiftingOption === 'yes') {
           internalShiftingChargesField.style.display = 'block';
       } else {
           internalShiftingChargesField.style.display = 'none';
       }
   });
</script>
<script>
   document.getElementById('reinstallationSelect').addEventListener('change', function () {
       var reinstallationOption = this.value;
       var reinstallationChargesField = document.getElementById('reinstallationChargesField');

       if (reinstallationOption === 'yes') {
           reinstallationChargesField.style.display = 'block';
       } else {
           reinstallationChargesField.style.display = 'none';
       }
   });
</script>
<script>
   document.getElementById('qrfMonitoringSelect').addEventListener('change', function () {
       var qrfMonitoringOption = this.value;
       var qrfMonitoringChargesField = document.getElementById('qrfMonitoringChargesField');

       if (qrfMonitoringOption === 'yes') {
           qrfMonitoringChargesField.style.display = 'block';
       } else {
           qrfMonitoringChargesField.style.display = 'none';
       }
   });
</script>
<script>
   document.getElementById('monthlyQrfMonitoringCharges').addEventListener('input', function () {
       var monthlyCharges = parseFloat(this.value);
       var yearlyChargesField = document.getElementById('yearlyQrfMonitoringCharges');

       if (!isNaN(monthlyCharges)) {
           yearlyChargesField.value = monthlyCharges * 12;
       } else {
           yearlyChargesField.value = '';
       }
   });
</script>
<script>
   document.getElementById('policeMonitoringSelect').addEventListener('change', function () {
       var policeMonitoringOption = this.value;
       var policeMonitoringChargesField = document.getElementById('policeMonitoringChargesField');

       if (policeMonitoringOption === 'yes') {
           policeMonitoringChargesField.style.display = 'block';
       } else {
           policeMonitoringChargesField.style.display = 'none';
       }
   });
</script>
<script>
   document.getElementById('monthlyPoliceMonitoringCharges').addEventListener('input', function () {
       var monthlyCharges = parseFloat(this.value);
       var yearlyChargesField = document.getElementById('yearlyPoliceMonitoringCharges');

       if (!isNaN(monthlyCharges)) {
           yearlyChargesField.value = monthlyCharges * 12;
       } else {
           yearlyChargesField.value = '';
       }
   });
</script>
<script>
   $(document).ready(function() {
       $("#men_addmore_btn").click(function() {
           $(".row-fluid:last").clone().appendTo(".row-fluid");
           $("#men_remove_btn").show();
           $("#men_addmore_btn").hide();
       });
       $("#men_remove_btn").click(function() {
           $(".row-fluid:last").remove();
           $("#men_remove_btn").hide();
           $("#men_addmore_btn").show();


       });
       $("#check-complaines").change(function() {
           if (this.checked) {
               $("#check1").show();
           } else {
               $("#check1").hide();
           }
       });
       $("#check-lumpsum").change(function() {
           if (this.checked) {
               $("#check2").show();
           } else {
               $("#check2").hide();
           }
       });

       $("#check1-shown").change(function() {
           if (this.checked) {
               $("#shown-WHT").show();
           } else {
               $("#shown-WHT").hide();
           }
       });
       $("#check1-hidden").change(function() {
           if (this.checked) {
               $("#hidden-WHT").show();
           } else {
               $("#hidden-WHT").hide();
           }
       });

       $("#check2-shown").change(function() {
           if (this.checked) {
               $("#shown-WHT-2").show();
           } else {
               $("#shown-WHT-2").hide();
           }
       });
       $("#check2-hidden").change(function() {
           if (this.checked) {
               $("#hidden-WHT-2").show();
           } else {
               $("#hidden-WHT-2").hide();
           }
       });

       $("#check-reverse").change(function() {
           if (this.checked) {
               $("#reverse-working").show();
           } else {
               $("#reverse-working").hide();
           }
       });

   });
</script>
<!-- <script>
   document.getElementById("reporting_address").addEventListener("click", function(event) {
       event.preventDefault(); // prevent the default behavior of the link

       var div = document.getElementById("reporting_address_form");

       if (div.style.display === "none") {
           div.style.display = "block"; // show the div
       } else {
           div.style.display = "none"; // hide the div
       }
    });
   </script> -->
<script>
   const reporting_address_check = document.getElementById("reporting_address_check");
   const reporting_address_form = document.getElementById("reporting_address_form");
   $("#reporting_address_check").change(function() {
       if (this.checked) {

           $("#reporting_address_form").show();
       } else {

           $("#reporting_address_form").hide();
       }
   });
</script>
<script>
   $(document).ready(function() {
       $("#byHandSubmittionCheckBox").change(function() {
           if (this.checked) {
               $("#byHandSubmittion_form").show();
           } else {
               $("#byHandSubmittion_form").hide();
           }
       });
   });
</script>
<script>
   $(document).ready(function() {
       $("#viaCourierSubmittion_checkBox").change(function() {
           if (this.checked) {
               $("#viaCourierSubmittion_form").show();
           } else {
               $("#viaCourierSubmittion_form").hide();
           }
       });
   });
</script>
<script>
   $(document).ready(function() {
       $("#viaEmailSubmittion_checkBox").change(function() {
           if (this.checked) {
               $("#viaEmailSubmittion_form").show();
           } else {
               $("#viaEmailSubmittion_form").hide();
           }
       });
   });
</script>
<script>
   $("#reporting_address_escort_check").change(function() {
       if (this.checked) {

           $("#reporting_address_escort_form").show();
       } else {

           $("#reporting_address_escort_form").hide();
       }
   });
</script>
<script>
   $("#check_driver").change(function() {
       if (this.checked) {

           $("#food_driver").show();
       } else {

           $("#food_driver").hide();
       }
   });
</script>
<script>
   $("#check_escort_driver").change(function() {
       if (this.checked) {

           $("#food_escort_driver").show();
       } else {

           $("#food_escort_driver").hide();
       }
   });
</script>
<script>
   $("#check_staff").change(function() {
       if (this.checked) {

           $("#check_staff_Men_Guarding").show();
       } else {

           $("#check_staff_Men_Guarding").hide();
       }
   });
</script>
<script>
   $("#check_escort_staff").change(function() {
       if (this.checked) {

           $("#check_escort_staff_Men_Guarding").show();
       } else {

           $("#check_escort_staff_Men_Guarding").hide();
       }
   });
</script>
<!-- <script>
   document.getElementById("airline").addEventListener("click", function(event) {
       event.preventDefault(); // prevent the default behavior of the link

       var div = document.getElementById("airline_details");

       if (div.style.display === "none") {
           div.style.display = "block"; // show the div
       } else {
           div.style.display = "none"; // hide the div
       }
    });
   </script> -->
<script>
   $("#airline_check").change(function() {
       if (this.checked) {

           $("#airline_check_form").show();
       } else {

           $("#airline_check_form").hide();
       }
   });
</script>
<!-- <script>
   document.getElementById("POC").addEventListener("click", function(event) {
       event.preventDefault(); // prevent the default behavior of the link

       var div = document.getElementById("POC_airline");

       if (div.style.display === "none") {
           div.style.display = "block"; // show the div
       } else {
           div.style.display = "none"; // hide the div
       }
    });
   </script> -->
<script>
   $("#POC_check").change(function() {
       if (this.checked) {

           $("#POC_check_form").show();
       } else {

           $("#POC_check_form").hide();
       }
   });
</script>
<script>
   $("#reporting_location_check").change(function() {
       if (this.checked) {

           $("#reporting_location_form").show();
       } else {

           $("#reporting_location_form").hide();
       }
   });
</script>
<script>
   $("#escort_services_check").change(function() {
       if (this.checked) {

           $("#escort_services_form").show();
       } else {

           $("#escort_services_form").hide();
       }
   });
</script>
<script>
   $("#canine_services_check").change(function() {
       if (this.checked) {

           $("#canine_services_form").show();
       } else {

           $("#canine_services_form").hide();
       }
   });
</script>
<script>
   $("#delievery_location_check").change(function() {
       if (this.checked) {

           $("#delievery_location_form").show();
       } else {

           $("#delievery_location_form").hide();
       }
   });
</script>
<script>
   $("#delievery_location_check_1").change(function() {
       if (this.checked) {

           $("#delievery_location_form_1").show();
       } else {

           $("#delievery_location_form_1").hide();
       }
   });
</script>
<script>
   $("#delievery_location_check_2").change(function() {
       if (this.checked) {

           $("#delievery_location_form_2").show();
       } else {

           $("#delievery_location_form_2").hide();
       }
   });
</script>
<script>
   $("#installation_location_check").change(function() {
       if (this.checked) {

           $("#installation_location_form").show();
       } else {

           $("#installation_location_form").hide();
       }
   });
</script>
<script>
   $("#delievery_location_check_3").change(function() {
       if (this.checked) {

           $("#delievery_location_form_3").show();
       } else {

           $("#delievery_location_form_3").hide();
       }
   });
</script>
<script>
   $("#installation_location_check_3").change(function() {
       if (this.checked) {

           $("#installation_location_form_3").show();
       } else {

           $("#installation_location_form_3").hide();
       }
   });
</script>
<script>
   $("#installation_location_check_1").change(function() {
       if (this.checked) {

           $("#installation_location_form_1").show();
       } else {

           $("#installation_location_form_1").hide();
       }
   });
</script>
<script>
   $("#installation_location_check_2").change(function() {
       if (this.checked) {

           $("#installation_location_form_2").show();
       } else {

           $("#installation_location_form_2").hide();
       }
   });
</script>
<!-- <script>
   document.getElementById("delivery_location").addEventListener("click", function(event) {
       event.preventDefault(); // prevent the default behavior of the link

       var div = document.getElementById("delivery_location_address");

       if (div.style.display === "none") {
           div.style.display = "block"; // show the div
       } else {
           div.style.display = "none"; // hide the div
       }
    });
   </script> -->
<!-- <script>
   document.getElementsByClassName("fuel").addEventListener("change", function (e) {
       e.preventDefault();

       var div = document.getElementById("fuel_rate_1");
       var selectedOption = this.value;

       if (selectedOption === "fuel_rate_1") {
           div.style.display = "flex"; // show the div
       } else {
           div.style.display = "none"; // hide the div
       }
   });
   </script> -->
<script>
   var fuel = document.getElementById("fuel");
   var fuel_rate_km = document.getElementById("fuel_rate_km");
   var fuel_rate_km_req = document.getElementById("fuel_rate_km_req");

   fuel.addEventListener("change", function() {
       if (fuel.value === "fuel_rate_1") {

           fuel_rate_km.style.display = "block";
           fuel_rate_km_req.style.display = "none";
       } else if (fuel.value === "fuel_rate_2") {

           fuel_rate_km.style.display = "none";
           fuel_rate_km_req.style.display = "block";
       }
   });
</script>
<script>
   var tooltaxdropdown = document.getElementById("tooltax_dropdown");
   var tooltax1 = document.getElementById("tooltax1");
   var tooltax2 = document.getElementById("tooltax2");

   tooltaxdropdown.addEventListener("change", function() {
       if (tooltaxdropdown.value === "tool_actual") {

           tooltax1.style.display = "block";
           tooltax2.style.display = "none";
       } else if (tooltaxdropdown.value === "tool_km") {

           tooltax1.style.display = "none";
           tooltax2.style.display = "block";
       }
   });
</script>
<script>
   var fuel_1 = document.getElementById("fuel_1");
   var fuel_rate_km_1 = document.getElementById("fuel_rate_km_1");
   var fuel_rate_km_req_1 = document.getElementById("fuel_rate_km_req_1");

   fuel.addEventListener("change", function() {
       if (fuel_1.value === "fuel_rate_1_1") {

           fuel_rate_km_1.style.display = "block";
           fuel_rate_km_req_1.style.display = "none";
       } else if (fuel_1.value === "fuel_rate_2_2") {

           fuel_rate_km_1.style.display = "none";
           fuel_rate_km_req_1.style.display = "block";
       }
   });
</script>
<script>
   document.getElementById("leadsubmit-category").addEventListener("click", function() {
       var customCategory = document.getElementById("leadcustom-category").value;
       var select = document.getElementById("leadcategory");
       var option = document.createElement("option");
       option.text = customCategory;
       option.value = customCategory;
       select.add(option);
   });
</script>
<script>
   function toggleCol8(colId) {
       var colCount = 11; // Number of columns

       for (var i = 1; i <= colCount; i++) {
           var col = document.getElementById('col-lg-8-' + i);
           if (col) {
               col.style.display = i === colId ? 'block' : 'none';
           }
       }
   }
</script>
`
<script>
   function toggleDiv() {
       var div = document.getElementById("inputDiv");
       if (div.style.display === "none") {
           div.style.display = "block";
       } else {
           div.style.display = "none";
       }
   }
</script>
<script>
   function toggleDiv1() {
       var div1 = document.getElementById("inputDiv1");
       if (div1.style.display === "none") {
           div1.style.display = "block";
       } else {
           div1.style.display = "none";
       }
   }
</script>
<script>
   document.getElementById("men-guard").addEventListener("click", function(event) {
       event.preventDefault(); // prevent the default behavior of the link
       var div = document.getElementById("men");
       if (div.style.display === "none") {
           div.style.display = "block"; // show the div
       } else {
           div.style.display = "none"; // hide the div
       }
   });
</script>
<script>
   document.getElementById("escort1").addEventListener("click", function(event) {
       event.preventDefault(); // prevent the default behavior of the link
       var div = document.getElementById("escort");
       if (div.style.visibility === "hidden") {
           div.style.visibility = "visible"; // show the element
       } else {
           div.style.visibility = "hidden"; // hide the element
       }
   });
</script>
<script>
   document.getElementById("canine1").addEventListener("click", function(event) {
       event.preventDefault(); // prevent the default behavior of the link
       var div = document.getElementById("canine");
       if (div.style.display === "none") {
           div.style.display = "block"; // show the div
       } else {
           div.style.display = "none"; // hide the div
       }
   });
</script>
<script>
   document.getElementById("facility1").addEventListener("click", function(event) {
       event.preventDefault(); // prevent the default behavior of the link
       var div = document.getElementById("facility");
       if (div.style.display === "none") {
           div.style.display = "block"; // show the div
       } else {
           div.style.display = "none"; // hide the div
       }
   });
</script>
<script>
   document.addEventListener('DOMContentLoaded', function() {
       const salaryInput = document.getElementById('salary');
       const relieverAllowanceInput = document.getElementById('relieverAllowance');

       salaryInput.addEventListener('input', function() {
           const salary = parseFloat(salaryInput.value);
           const relieverAllowance = (salary / 26 * 4).toFixed(2); // Calculate reliever allowance
           relieverAllowanceInput.value = isNaN(relieverAllowance) ? '' : relieverAllowance; // Update reliever allowance input
       });
   });
</script>
<script>
   document.addEventListener('DOMContentLoaded', function() {
       const salaryInput = document.getElementById('hidesalary');
       const relieverAllowanceInput = document.getElementById('hiderelieverAllowance');

       salaryInput.addEventListener('input', function() {
           const salary = parseFloat(salaryInput.value);
           const relieverAllowance = (salary / 26 * 4).toFixed(2); // Calculate reliever allowance
           relieverAllowanceInput.value = isNaN(relieverAllowance) ? '' : relieverAllowance; // Update reliever allowance input
       });
   });
</script>
<script>
   document.getElementById("event1").addEventListener("click", function(event) {
       event.preventDefault(); // prevent the default behavior of the link
       var div = document.getElementById("event");
       if (div.style.display === "none") {
           div.style.display = "block"; // show the div
       } else {
           div.style.display = "none"; // hide the div
       }
   });
</script>
<script>
   document.getElementById("consultancy1").addEventListener("click", function(event) {
       event.preventDefault(); // prevent the default behavior of the link
       var div = document.getElementById("consultancy");
       if (div.style.display === "none") {
           div.style.display = "block"; // show the div
       } else {
           div.style.display = "none"; // hide the div
       }
   });
</script>
<script>
   document.getElementById("equipments1").addEventListener("click", function(event) {
       event.preventDefault(); // prevent the default behavior of the link
       var div = document.getElementById("equipments");
       if (div.style.display === "none") {
           div.style.display = "block"; // show the div
       } else {
           div.style.display = "none"; // hide the div
       }
   });
</script>
<script>
   document.getElementById("fire1").addEventListener("click", function(event) {
       event.preventDefault(); // prevent the default behavior of the link
       var div = document.getElementById("fire");
       if (div.style.display === "none") {
           div.style.display = "block"; // show the div
       } else {
           div.style.display = "none"; // hide the div
       }
   });
</script>
<script>
   document.getElementById("alarm1").addEventListener("click", function(event) {
       event.preventDefault(); // prevent the default behavior of the link
       var div = document.getElementById("alarm");
       if (div.style.display === "none") {
           div.style.display = "block"; // show the div
       } else {
           div.style.display = "none"; // hide the div
       }
   });
</script>
<script>
   document.getElementById("cctv1").addEventListener("click", function(event) {
       event.preventDefault(); // prevent the default behavior of the link
       var div = document.getElementById("cctv");
       if (div.style.display === "none") {
           div.style.display = "block"; // show the div
       } else {
           div.style.display = "none"; // hide the div
       }
   });
</script>
<script>
   document.getElementById("web1").addEventListener("click", function(event) {
       event.preventDefault(); // prevent the default behavior of the link
       var div = document.getElementById("web");
       if (div.style.display === "none") {
           div.style.display = "block"; // show the div
       } else {
           div.style.display = "none"; // hide the div
       }
   });
</script>
<!--Further Images Display Setup-->
<script>
   document.getElementById('img1').addEventListener('click', function() {
       var newDiv = document.getElementById('newDiv');
       newDiv.style.display = 'block';
   });

   function removeNewDiv() {
       var newDiv = document.getElementById('newDiv');
       newDiv.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img2').addEventListener('click', function() {
       var newDiv = document.getElementById('newDiv');
       newDiv.style.display = 'block';
   });

   function removeNewDiv() {
       var newDiv = document.getElementById('newDiv');
       newDiv.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img2').addEventListener('click', function() {
       var newDiv1 = document.getElementById('newDiv1');
       newDiv1.style.display = 'block';
   });

   function removeNewDiv1() {
       var newDiv1 = document.getElementById('newDiv1');
       newDiv1.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img3').addEventListener('click', function() {
       $('#newDiv5-a').hide();
       var newDiv5 = document.getElementById('newDiv5');
       newDiv5.style.display = 'block';
   });

   function removeNewDiv5() {
       var newDiv5 = document.getElementById('newDiv5');
       newDiv5.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img3-a').addEventListener('click', function() {
       $('#newDiv5').hide();
       var newDiv5_a = document.getElementById('newDiv5-a');
       newDiv5_a.style.display = 'block';
   });

   function removeNewDiv5_a() {
       var newDiv5_a = document.getElementById('newDiv5-a');
       newDiv5_a.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img4').addEventListener('click', function() {
       var newDiv6 = document.getElementById('newDiv6');
       newDiv6.style.display = 'block';
   });

   function removeNewDiv6() {
       var newDiv6 = document.getElementById('newDiv6');
       newDiv6.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img5').addEventListener('click', function() {
       var newDiv7 = document.getElementById('newDiv7');
       newDiv7.style.display = 'block';
   });

   function removeNewDiv7() {
       var newDiv7 = document.getElementById('newDiv7');
       newDiv7.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img6').addEventListener('click', function() {
       var newDiv8 = document.getElementById('newDiv8');
       newDiv8.style.display = 'block';
   });

   function removeNewDiv8() {
       var newDiv8 = document.getElementById('newDiv8');
       newDiv8.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img9').addEventListener('click', function() {
       $('#newDiv10-a').hide();
       var newDiv10 = document.getElementById('newDiv10');
       newDiv10.style.display = 'block';
   });

   function removeNewDiv10() {
       var newDiv10 = document.getElementById('newDiv10');
       newDiv10.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img9-a').addEventListener('click', function() {
       $('#newDiv10').hide();
       var newDiv10a = document.getElementById('newDiv10-a');
       newDiv10a.style.display = 'block';
   });

   function removeNewDiv10_a() {
       var newDiv10_a = document.getElementById('newDiv10-a');
       newDiv10_a.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img10').addEventListener('click', function() {
       var newDiv11 = document.getElementById('newDiv11');
       newDiv11.style.display = 'block';
   });

   function removeNewDiv11() {
       var newDiv11 = document.getElementById('newDiv11');
       newDiv11.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img11').addEventListener('click', function() {
       var newDiv12 = document.getElementById('newDiv12');
       newDiv12.style.display = 'block';
   });

   function removeNewDiv12() {
       var newDiv12 = document.getElementById('newDiv12');
       newDiv12.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img11-a').addEventListener('click', function() {
       var newDiv12a = document.getElementById('newDiv12-a');
       newDiv12a.style.display = 'block';
   });

   function removeNewDiv12a() {
       var newDiv12a = document.getElementById('newDiv12-a');
       newDiv12a.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img12').addEventListener('click', function() {
       var newDiv13 = document.getElementById('newDiv13');
       newDiv13.style.display = 'block';
   });

   function removeNewDiv13() {
       var newDiv13 = document.getElementById('newDiv13');
       newDiv13.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img13').addEventListener('click', function() {
       $("#newDiv14-a").hide();
       $("#newDiv14-b").hide();
       var newDiv14 = document.getElementById('newDiv14');
       newDiv14.style.display = 'block';


   });

   function removeNewDiv14() {
       var newDiv14 = document.getElementById('newDiv14');
       newDiv14.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img13-a').addEventListener('click', function() {
       $("#newDiv14").hide();
       $("#newDiv14-b").hide();
       var newDiv14a = document.getElementById('newDiv14-a');
       newDiv14a.style.display = 'block';

   });
</script>
<script>
   function remove_newDiv14_a() {
       var newDiv14a = document.getElementById('newDiv14-a');
       newDiv14a.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img13-b').addEventListener('click', function() {
       $("#newDiv14").hide();
       $("#newDiv14-a").hide();
       var newDiv14b = document.getElementById('newDiv14-b');
       newDiv14b.style.display = 'block';

   });
</script>
<script>
   function remove_newDiv14_b() {
       var newDiv14b = document.getElementById('newDiv14-b');
       newDiv14b.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img14').addEventListener('click', function() {
       var newDiv15 = document.getElementById('newDiv15');
       newDiv15.style.display = 'block';
   });

   function removeNewDiv15() {
       var newDiv15 = document.getElementById('newDiv15');
       newDiv15.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img15').addEventListener('click', function() {
       var newDiv3 = document.getElementById('newDiv3');
       newDiv3.style.display = 'block';
   });

   function removeNewDiv3() {
       var newDiv3 = document.getElementById('newDiv3');
       newDiv3.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img16').addEventListener('click', function() {
       var newDiv4 = document.getElementById('newDiv4');
       newDiv4.style.display = 'block';
   });

   function removeNewDiv4() {
       var newDiv4 = document.getElementById('newDiv4');
       newDiv4.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img3').addEventListener('click', function() {
       var newDiv9 = document.getElementById('newDiv9');
       newDiv9.style.display = 'block';
   });

   function removeNewDiv9() {
       var newDiv9 = document.getElementById('newDiv9');
       newDiv9.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img20').addEventListener('click', function() {
       var newDiv17 = document.getElementById('newDiv17');
       newDiv17.style.display = 'block';
   });

   function removeNewDiv17() {
       var newDiv17 = document.getElementById('newDiv17');
       newDiv17.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img23').addEventListener('click', function() {
       var newDiv18 = document.getElementById('newDiv18');
       newDiv18.style.display = 'block';
       console.log("clicked", newDiv18);
   });

   function removeNewDiv18() {
       var newDiv18 = document.getElementById('newDiv18');
       newDiv18.style.display = 'none';
   }
</script>
<script>
   document.getElementById('img25').addEventListener('click', function() {
       var newDiv25 = document.getElementById('newDiv25');
       newDiv25.style.display = 'block';
   });

   function removeNewDiv25() {
       var newDiv25 = document.getElementById('newDiv25');
       newDiv25.style.display = 'none';
   }
</script>
<!--Checkboxes-->
<script>
   const checkbox = document.getElementById('pilotcheck');
   const inputContainer = document.getElementById('inputContainer');

   checkbox.addEventListener('change', function() {
       if (checkbox.checked) {
           inputContainer.style.display = 'block';
       } else {
           inputContainer.style.display = 'none';
       }
   });
</script>
<script>
   $(document).ready(function() {
       $('#otherCheckboxesContainer').hide();

       // Add an event listener to the Bid Money checkbox
       $('#bidMoneyCheckbox').change(function() {
           if ($(this).is(':checked')) {
               // If the Bid Money checkbox is checked, display the other checkboxes
               $('#otherCheckboxesContainer').show();
           } else {
               // If the Bid Money checkbox is unchecked, hide the other checkboxes
               $('#otherCheckboxesContainer').hide();
           }
       });
   });
</script>
<script>
   function toggleGrievanceDiv() {
       const grevCheckbox = document.getElementById("grev");
       const grevDiv = document.getElementById("grevCheckbox");

       if (grevCheckbox.checked) {
           grevDiv.style.display = "block";
       } else {
           grevDiv.style.display = "none";
       }
   }
</script>
<script>
   // POC Daily Sales Add Fields
   var room13 = 1;

   function poc_dailysales_add_fields() {

       room13++;
       var objTo = document.getElementById('poc_dailysales_add_fields')
       var divtest = document.createElement("div");
       divtest.setAttribute("class", "first-col removeclass" + room13);
       var rdiv = 'removeclass' + room13;
       divtest.innerHTML =
           '<div class="row"> <div class="col-lg-4"> POC Name <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4"> POC Contact Number <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-2 spacing-left mt-4 mx-4"> <button type="button" class="remove-btn" onclick="poc_dailysales_remove_fields(' +
           room13 + ')">remove</button> </div></div>';
       objTo.appendChild(divtest)
   }

   function poc_dailysales_remove_fields(rid) {
       $('.removeclass' + rid).remove();
   }

   // Planning POC Add Fields
   var room15 = 1;

   function planning_poc_add_fields() {

       room15++;
       var objTo = document.getElementById('planning_poc_add_fields')
       var divtest = document.createElement("div");
       divtest.setAttribute("class", "first-col removeclass" + room15);
       var rdiv = 'removeclass' + room15;
       divtest.innerHTML =
           '<div class="row"> <div class="col-lg-4"> POC Name <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4"> POC Contact Number <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-2 spacing-left mt-4 mx-4"> <button type="button" class="remove-btn" onclick="planning_poc_remove_fields(' +
           room15 + ')">remove</button> </div></div>';
       objTo.appendChild(divtest)
   }

   function planning_poc_remove_fields(rid) {
       $('.removeclass' + rid).remove();
   }

   //public/sales_address_add_fields
   var room12 = 1;

   function sales_address_add_fields() {

       room12++;
       var objTo = document.getElementById('sales_address_add_fields')
       var divtest = document.createElement("div");
       divtest.setAttribute("class", "first-col removeclass" + room12);
       var rdiv = 'removeclass' + room12;
       divtest.innerHTML =
           ' <div class="row"> <div class="col-lg-6 spacing-right"> <div class="row mb-2"> <div class="col-lg-2 spacing-right"> Street <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> State <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> Country <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Region <br> <select id="hrm_type" class="form-control" name="hrmType" style="width: 100%;"> <option value="hrm_guard">region1</option> <option value="hrm_staff">region2</option> </select> </div> <div class="col-lg-3 spacing-left spacing-right"> City <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-2 spacing-left spacing-right"> Zip Code <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="form-control" type="text" placeholder="www.facebook.com/" style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="form-control" type="text" placeholder="www.skype.com/" style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="form-control" type="text" placeholder="www.twitter.com/" style="width: 100%;"> </div> </div> </div> <div class="col-lg-6 spacing-right"> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> Company <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-6 spacing-right"> Email <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> Fax <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div>  <div class="row mb-1"> <div class="col-lg-10 spacing-right"> website <br> <input class="form-control" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> Notes <br> <textarea style="width: 100%;" name="" id="" cols="15" rows="4"></textarea> </div> </div> </div> <div class="row"> <div class="col-lg-3" style="margin-left: 35%;"> <button type="button" class="remove-btn" style="width: 90%;" onclick="sales_address_remove_fields(' +
           room12 + ')">Remove Addresses</button> </div> </div> </div>';
       objTo.appendChild(divtest)
   }

   function sales_address_remove_fields(rid) {
       $('.removeclass' + rid).remove();
   }

   //dailysales_address_add_fields
   var room14 = 1;

   function dailysales_address_add_fields() {

       room14++;
       var objTo = document.getElementById('dailysales_address_add_fields')
       var divtest = document.createElement("div");
       divtest.setAttribute("class", "first-col removeclass" + room14);
       var rdiv = 'removeclass' + room14;
       divtest.innerHTML =
           ' <div class="row"> <div class="col-lg-6 spacing-right"> <div class="row mb-2"> <div class="col-lg-2 spacing-right"> Street <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> State <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> Country <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-5 spacing-right"> Region <br> <select id="hrm_type" class="form-control" name="hrmType" style="width: 100%;"> <option value="hrm_guard">region1</option> <option value="hrm_staff">region2</option> </select> </div> <div class="col-lg-3 spacing-left spacing-right"> City <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-2 spacing-left spacing-right"> Zip Code <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="form-control" type="text" placeholder="www.facebook.com/" style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="form-control" type="text" placeholder="www.skype.com/" style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> <input class="form-control" type="text" placeholder="www.twitter.com/" style="width: 100%;"> </div> </div> </div> <div class="col-lg-6 spacing-right"> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> Company <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-6 spacing-right"> Email <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-4 spacing-left spacing-right"> Fax <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> </div>  <div class="row mb-1"> <div class="col-lg-10 spacing-right"> website <br> <input class="form-control" type="text" id="degree" name="Degree[]" placeholder="..." style="width: 100%;"> </div> </div> <div class="row mb-2"> <div class="col-lg-10 spacing-right"> Notes <br> <textarea style="width: 100%;" name="" id="" cols="15" rows="4"></textarea> </div> </div> </div> <div class="row"> <div class="col-lg-3" style="margin-left: 35%;"> <button type="button" class="remove-btn" style="width: 90%;" onclick="dailysales_address_remove_fields(' +
           room14 + ')">Remove Addresses</button> </div> </div> </div>';
       objTo.appendChild(divtest)
   }

   function dailysales_address_remove_fields(rid) {
       $('.removeclass' + rid).remove();
   }

   // POC Lead Generation Details Add Fields
   var room11 = 1;

   function poc_add_fields() {

       room11++;
       var objTo = document.getElementById('poc_add_fields')
       var divtest = document.createElement("div");
       divtest.setAttribute("class", "first-col removeclass" + room11);
       var rdiv = 'removeclass' + room11;
       divtest.innerHTML = '<div class="row"> <div class="col-lg-3"> POC Name ' + room11 +
           ' <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-3"> POC Contact Number ' +
           room11 +
           ' <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div>  <div class="col-lg-3"> Visiting Card ' +
           room11 +
           ' <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;"> </div> <div class="col-lg-2 spacing-left mt-4 mx-4"> <button type="button" class="remove-btn" onclick="poc_remove_fields(' +
           room11 + ')">remove</button> </div></div>';
       objTo.appendChild(divtest)
   }

   function poc_remove_fields(rid) {
       $('.removeclass' + rid).remove();
   }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
   integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
   integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
   integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Script for validation on save button -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
   $(document).ready(function() {
       var saveButtonClicked = false;

       $('#validateBtn').click(function() {
           console.log("Button clicked!");
           saveButtonClicked = true;

           var isValid = true;

           // Your validation logic here
           $('#prospectNo').each(function() {
               var trimmedValue = $.trim($(this).val());
               console.log(trimmedValue);
               if (trimmedValue === '') {
                   isValid = false;
                   return false;
               }
           });

           if (isValid) {
               $('#validationMessage').removeClass('text-danger').addClass('text-success').html(
                   '<strong>Success : Mandatory fields are valid and Saved..!</strong>');
               // enableTab();
           } else {
               $('#validationMessage').removeClass('text-success').addClass('text-danger').html(
                   '<strong>Prospect No is required..!</strong>');
               // disableTab();
           }
       });

       // Function to enable the tab if save button is clicked and all fields are valid
       // function enableTab() {
       //     if (saveButtonClicked) {
       //         $('#nav-contact-tab').removeClass('disabled');
       //         $('#nav-contact-tab').attr('data-toggle', 'tab');
       //     }
       // }

       // Function to disable the tab if any field is invalid or save button is not clicked
       // function disableTab() {
       //     $('#nav-contact-tab').addClass('disabled');
       //     $('#nav-contact-tab').removeAttr('data-toggle');
       // }
   });
</script>
<!-- Script For Add more Gaurd Services -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory').on('click', function() {
           var SignatoryAccordionCount = $('#signatoryAccordion .signaccordion-item').length + 1;

           var newSignAccordion = `
                       <div class="accordion-item signaccordion-item" id="GuardEntry1${SignatoryAccordionCount}">
                           <h2 class="accordion-header" id="signatoryHeading${SignatoryAccordionCount}">
                               <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse${SignatoryAccordionCount}" aria-expanded="false" aria-controls="signatoryCollapse${SignatoryAccordionCount}">
                                   Guard Entry ${SignatoryAccordionCount}
                               </button>
                           </h2>
                           <div id="signatoryCollapse${SignatoryAccordionCount}" class="collapse" aria-labelledby="signatoryHeading${SignatoryAccordionCount}">
                           <div class="row row-fluid mx-2 mt-2 mb-2">

                               <div class="col-lg-6 spacing-left">
                                   Category <br>
                                   <select id="staff_category" class="form-control" name="guard_category[]"  style="width: 100%;">
                                       <option value="Armed Security Supervisor (Ex-Servicemen)">Armed Security Supervisor (Ex-Servicemen)</option>
                                       <option value="Armed Security Supervisor (Civil)">Armed Security Supervisor (Civil)</option>
                                       <option value="Unarmed Security Supervisor (Ex-Servicemen)">Unarmed Security Supervisor (Ex-Servicemen)</option>
                                       <option value="Unarmed Security Supervisor (Civil)">Unarmed Security Supervisor (Civil)</option>
                                       <option value="Armed Security Guard (Ex-Servicemen)">Armed Security Guard (Ex-Servicemen)</option>
                                       <option value="Armed Security Guard (Civil)">Armed Security Guard (Civil)</option>
                                       <option value="Unarmed Security Guard(Ex-Servicemen)">Unarmed Security Guard(Ex-Servicemen)</option>
                                       <option value="Unarmed Security Guard(Civil)">Unarmed Security Guard(Civil)</option>
                                       <option value="Close Protection Office/Executive Protective Officers">Close Protection Office/Executive Protective Officers</option>
                                       <option value="Lady Searcher">Lady Searcher</option>
                                       <option value="Male Searcher">Male Searcher</option>
                                       <option value="Bouncers">Bouncers</option>
                                       <option value="Project Head">Project Head</option>
                                       <option value="Security Manager">Security Manager</option>
                                       <option value="SSG">SSG</option>
                                       <option value="Male Facilitation Officer">Male Facilitation Officer</option>
                                       <option value="Female Facilitation Officer">Female Facilitation Officer</option>
                                       <option value="Escort Security Guard">Escort Security Guard</option>
                                       <option value="Baggae Scanner Operator">Baggae Scanner Operator</option>
                                       <option value="Sniper">Sniper</option>
                                       <option value="Traffic Controller">Traffic Controller</option>
                                       <option value="Ceremonial Guard">Ceremonial Guard</option>
                                       <option value="VIP Ceremonial Guard">VIP Ceremonial Guard</option>
                                       <option value="VVIP Ceremonial Guard">VVIP Ceremonial Guard</option>
                                       <option value="Fire Birgade">Fire Birgade</option>
                                       <option value="Paramedic Staff">Paramedic Staff</option>
                                       <option value="Security Facilitation Officers(SFO)">Security Facilitation Officers(SFO)</option>
                                       <option value="Guide">Guide</option>
                                   </select>
                               </div>
                               <div class="col-lg-6 spacing-right">
                                   Quantity : <br>
                                   <select id="leadcategory" class="form-control mt-1" name="guard_quantity[]"  style="width: 100%;">
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option>
                                       <option value="5">5</option>
                                       <option value="6">6</option>
                                       <option value="7">7</option>
                                       <option value="8">8</option>
                                       <option value="9">9</option>
                                   </select>
                               </div>
                               <div class="col-lg-6 spacing-left">
                                   Shift Timing : <br>
                                   <select id="leadcategory" class="form-control mt-1" name="guard_shift_timing[]"  style="width: 100%;">
                                       <option value="1x">1x</option>
                                       <option value="2x">2x</option>
                                       <option value="3x">3x</option>
                                       <option value="4x">4x</option>
                                       <option value="5x">5x</option>
                                       <option value="6x">6x</option>
                                       <option value="7x">7x</option>
                                       <option value="8x">8x</option>
                                       <option value="9x">9x</option>
                                   </select>
                               </div>
                               <div class="col-lg-6 spacing-right">
                                  Food by Client : <br>
                                   <select id="leadcategory" class="form-control mt-1" name="guard_food[]"  style="width: 100%;">
                                       <option value="">Yes</option>
                                       <option value="">No</option>
                                   </select>
                               </div>
                               <div class="col-lg-6 spacing-left">
                                   Accomodation By Client : <br>
                                   <select id="leadcategory" class="form-control mt-1" name="guard_accomodation[]"  style="width: 100%;">
                                       <option value="">Yes</option>
                                       <option value="">No</option>
                                    </select>
                               </div>
                               <div class="col-lg-6 spacing-right">
                                   Transportation by Client : <br>
                                   <select id="leadcategory" class="form-control mt-1" name="guard_transportation[]" style="width: 100%;">
                                       <option value="">Yes</option>
                                       <option value="">No</option>
                                   </select>
                               </div>
                               <div class="col-lg-6 spacing-left">
                                   Required on monthly basis : <br>
                                   <select id="monthlyRequirement" class="form-control mt-1" name="guard_required_monthly[]"  style="width: 100%;">
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                   </select>
                               </div>
                               <div class="col-lg-6 spacing-right"  id="dailyRequirementSection">
                                   Required on dialy basis : <br>
                                   <select  id="dailyRequirement" class="form-control mt-1" name="guard_required_dialy[]" style="width: 100%;">
                                       <option value=""></option>
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                   </select>
                               </div>
                               <div class="col-lg-6 mt-1" id="noOfDays">
                                   No. of days Security Staff required for    <br>
                                   <input class="form-control" type="text" name="no_of_days_guard_required[]" placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6">
                                   Financial Working Excel Sheet <br> <input class="form-control mt-1"
                                       id="head_office_email" name="financial_working_excel_attach[]"  type="file"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6">
                                   Financial Working Word Sheet <br> <input class="form-control mt-1"
                                       id="head_office_email" name="financial_working_word_attach[]"  type="file"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6">
                                   Financial Working PDF Sheet <br> <input class="form-control mt-1"
                                       id="head_office_email" name="financial_working_pdf_attach[]"  type="file"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6">
                                   Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="guard_notes[]"  type="text" placeholder="..." style="width: 100%;"></textarea>
                               </div>
                               <div class="col-lg-6">
                                   Attachments <br> <input class="form-control mt-1" id="head_office_email" name="guard_attach[]"  type="file"   placeholder="..." style="width: 100%;">
                               </div>
                           </div>
                               <button class="btn btn-danger btn-sm removeSignAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                           </div>
                       </div>
                   `;

           $('#signatoryAccordion').append(newSignAccordion);



       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion', function() {
           $(this).closest('.signaccordion-item').remove();
       });

   });
</script>
<!-- Script For Show data in table and Update Table of Gaurd servises -->
<script>
   $(document).ready(function() {
       // Function to update summary table for Guard entries
       function updateSignatorySummaryTable() {
           // Clear existing rows
           $('#signatorySummaryTable tbody').empty();

           // Iterate through each gaurd accordion item and update the summary table
           $('.signaccordion-item').each(function(index) {
               var guardCategory = $(this).find('[name="guard_category[]"]').val();
               var guardQuantity = $(this).find('[name="guard_quantity[]"]').val();
               var guardShiftTiming = $(this).find('[name="guard_shift_timing[]"]').val();

               // Check if any relevant data is entered
               if (guardCategory || guardQuantity || guardShiftTiming) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable tbody').append(`
                               <tr>
                                   <td>${index + 1}</td>
                                   <td>${guardCategory}</td>
                                   <td>${guardQuantity}</td>
                                   <td>${guardShiftTiming}</td>
                                   <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                                   <!-- Add more columns as needed -->
                               </tr>
                           `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory').on('click', function() {
           var signatoryEntryCount = $('#signatoryAccordion .signaccordion-item').length + 1;

           var newSignatoryEntry = `
                       <!-- Your existing signatory accordion HTML goes here -->

                   `;
           console.log('Adding signatory entry:', signatoryEntryCount);
           $('#signatoryAccordion').append(newSignatoryEntry);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable').on('click', function() {
           // Update the signatory summary table
           console.log("clicked save");
           updateSignatorySummaryTable();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button', function() {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion', function() {
           $(this).closest('.signaccordion-item').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<!-- Script for Add more Vehicals -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory2').on('click', function() {
           var SignatoryAccordionCount2 = $('#signatoryAccordion2 .signaccordion-item2').length + 1;

           var newSignAccordion2 = `
               <div class="accordion-item signaccordion-item2" id="signatoryEntry2${SignatoryAccordionCount2}">
                   <h2 class="accordion-header" id="signatoryHeading2${SignatoryAccordionCount2}">
                       <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse2${SignatoryAccordionCount2}" aria-expanded="false" aria-controls="signatoryCollapse2${SignatoryAccordionCount2}">
                           Vehical Entry ${SignatoryAccordionCount2}
                       </button>
                   </h2>
                   <div id="signatoryCollapse2${SignatoryAccordionCount2}" class="collapse" aria-labelledby="signatoryHeading2${SignatoryAccordionCount2}">
                       <div class="accordion-body">
                           <div class="row mb-2" id="signatoryDetailsContainer">
                           <div class="col-lg-6 spacing-right">

                                               Ownership Status:<br>
                                               <div class="input-group" style="width: 100%;">
                                                   <select id="applicable_compliances" class="form-control mt-1" name="vehicle_ownership[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                       <option value=""></option>
                                                   </select>
                                                   <div class="input-group-append" style="width: 30%;">
                                                       <a href="">
                                                           <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                       </a>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-lg-6 form-group spacing-left">
                                               Types:<br>
                                               <div class="input-group" style="width: 100%;">
                                                   <select id="applicable_compliances" class="form-control mt-1" name="vehicle_type[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                       <option value=""></option>
                                                       <option value="Pilot Vehicle">Pilot Vehicle
                                                       </option>
                                                       <option value="Escort Vehicle">Escort Vehicle
                                                       </option>
                                                       <option value="Follow Up Vehicle">Follow Up
                                                           Vehicle</option>
                                                   </select>
                                                   <div class="input-group-append" style="width: 30%;">
                                                       <a href="">
                                                           <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                       </a>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-lg-6 form-group spacing-left">
                                               Category:<br>
                                               <div class="input-group" style="width: 100%;">
                                                   <select id="applicable_compliances" class="form-control mt-1" name="vehicle_category[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                       <option value=""></option>

                                                   </select>
                                                   <div class="input-group-append" style="width: 30%;">
                                                       <a href="">
                                                           <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                       </a>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-lg-6 spacing-right">
                                               Required for : <br>
                                               <select id="leadcategory" name="vehicle_required[]" class="form-control mt-1"
                                                   style="width: 100%;">
                                                   <option value="">Monthly Basis</option>
                                                   <option value="">Daily Basis</option>
                                               </select>
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Monthly Maintenance Cost <br> <input class="form-control" name="vehicle_mantenance[]" type="text"
                                                   placeholder="..." style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1 spacing-right">
                                               Fuel <br>

                                               <select id="fuel" name="vehicle_fuel[]" class="form-control mt-1 "
                                                   style="width: 100%;">
                                                   <option value="fuel_rate_1"> As per Actual</option>
                                                   <option value="fuel_rate_2"> Per Kilometer</option>
                                               </select>
                                           </div>
                                           <div>
                                               <div class="col-lg-6 mt-1 " id="fuel_rate_km" style="display:none;">
                                               </div>
                                               <div class="col-lg-6 mt-1 " id="fuel_rate_km_req" style="display:none;">
                                                   Rate Per Kilometer <br> <input class="form-control" name="vehicle_rate_per_km[]" type="text"
                                                       placeholder="..." style="width: 100%;">

                                                   Kilometer Required <br> <input class="form-control" name="vehicle_km_required[]" type="text"
                                                       placeholder="..." style="width: 100%;">
                                               </div>
                                           </div>

                                           <div class="col-lg-6 mt-1 spacing-right">
                                               Tool Tax & Parking Charges <br>

                                               <select id="tooltax_dropdown" name="vehicle_toll[]" class="form-control mt-1 "
                                                   style="width: 100%;">
                                                   <option value="tool_actual"> As per Actual</option>
                                                   <option value="tool_km">Fixed</option>
                                               </select>
                                           </div>
                                           <div class="col-lg-6 mt-1 " id="tooltax1" style="display:none;">
                                           </div>
                                           <div class="col-lg-6 mt-1 " id="tooltax2" style="display:none;">
                                               Tool Tax & Parking Charges: <br> <input class="form-control "
                                                   type="text" name="vehicle_tol[]" placeholder="..." style="width: 100%;">
                                           </div>

                                           <div class="col-lg-6 mt-1">
                                               Meter Reading at the start of the duty <br> <input class="form-control"
                                                   type="file" name="vehicle_meter_reading[]" placeholder="..." style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Picture of Meter Reading before duty <br> <input class="form-control"
                                                   type="file" name="vehicle_meter_picture[]" placeholder="..." style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Reporting Time <br> <input class="form-control" name="vehicle_reporting_time[]" type="time"
                                                   placeholder="..." style="width: 100%;">
                                           </div>
                                           <!-- <div class="col-lg-6 mt-1 " id="reporting_address">
                                                       Reporting Address   <br>  <input class="form-control" name="vehicle_reporting_address[]" type="text" placeholder="..." style="width: 100%;">
                                                   </div> -->

                                           <div class="col-lg-6 mt-2 ml-3 ">
                                               <input class="form-check-input" name="vehicle_rep_office_no[]" type="checkbox"
                                                   id="reporting_address_check">
                                               <label class="form-check-label" for="check">Reporting Address</label>
                                           </div>




                                           <!-- Address Form -->
                                           <div class="container " id="reporting_address_form" style="display: none;">
                                           <div class="row row-cols-2">
                                                   <div class="col-lg-6 mt-1">
                                                       Office No <br> <input class="form-control" id=""
                                                           type="text" name="vehicle_rep_office_no[]" placeholder="..." style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                       Floor <br> <input class="form-control" id="" name="vehicle_rep_floor[]" type="text"
                                                           placeholder="..." style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                       Building <br> <input class="form-control" id=""
                                                         name="vehicle_rep_building[]"  type="text" placeholder="..." style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                       Block <br> <input class="form-control" id=""  type="text" name="vehicle_rep_block[]"
                                                           placeholder="..." style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                       Area <br> <input class="form-control" id="" name="vehicle_rep_area[]"  type="text"
                                                           placeholder="..." style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                       City <br> <input class="form-control" id="" name="vehicle_rep_city[]"  type="text"
                                                           placeholder="..." style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                       Photograph of Building <br> <input class="form-control" id=""
                                                            type="file" name="vehicle_rep_picture[]" placeholder="..." style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                       Pin location <br> <input class="form-control" id=""
                                                           type="text" name="vehicle_rep_location[]" placeholder="..." style="width: 100%;">
                                                   </div>
                                               </div>
                                           </div>
                                           <!--  -->

                                           <div class="col-lg-6 mt-1">
                                               Duty Start Date <br> <input class="form-control" type="date"
                                                   placeholder="..." name="vehicle_duty_start_date[]" style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Duty End Date <br> <input class="form-control" type="date"
                                                   placeholder="..." name="vehicle_duty_end_date[]" style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Duty Start Time <br> <input class="form-control" type="time"
                                                   placeholder="..." name="vehicle_duty_start_time[]" style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Duty End Time <br> <input class="form-control" type="time"
                                                   placeholder="..." name="vehicle_duty_end_time[]" style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Shift Duration <br> <input class="form-control" type="text"
                                                   placeholder="..." name="vehicle_shift_duration[]" style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               No. of Shifts <br> <input class="form-control" type="text"
                                                   placeholder="..." name="vehicle_no_of_shifts[]" style="width: 100%;">
                                           </div>


                                           <div class="col-lg-6 spacing-right mt-2 ml-3 ">
                                               <input class="form-check-input" type="checkbox" name="vehicle_req_with_driver[]" id="check_driver">
                                               <label class="form-check-label" for="check">Required with Driver</label>
                                           </div>



                                           <div class="col-lg-6 mt-1" id="food_driver" style="display: none;">

                                               Food For Driver By Client <br>
                                               <select id="tooltax_dropdown" name="vehicle_food_by_client[]" class="form-control mt-1 "
                                                   style="width: 100%;">
                                                   <option value="tool_actual"> Yes</option>
                                                   <option value="tool_km">No</option>
                                               </select>
                                           </div>




                                           <div class="col-lg-6 spacing-right mt-2 ml-3 ">
                                               <input class="form-check-input" type="checkbox" name="vehicle_req_with_security[]" id="check_staff">
                                               <label class="form-check-label" for="check">Required With Security
                                                   Staff</label>
                                           </div>

                                           <!-- Men Guarding Services Tab -->

                                           <div class="new-div" id="check_staff_Men_Guarding" style="display:none;">
                                               <div class="col-lg-12">
                                                   <div class="row mb-2">

                                                       <div class="col-lg-6 spacing-right">
                                                           Category <br>
                                                           <select id="staff_category" name="vehicle_guard_category[]" class="form-control"
                                                                style="width: 100%;">
                                                               <option value="">Armed Security Supervisor
                                                                   (Ex-Servicemen)</option>
                                                               <option value="">Armed Security Supervisor (Civil)
                                                               </option>
                                                               <option value="">Unarmed Security Supervisor
                                                                   (Ex-Servicemen)</option>
                                                               <option value="">Unarmed Security Supervisor (Civil)
                                                               </option>
                                                               <option value="">Armed Security Guard (Ex-Servicemen)
                                                               </option>
                                                               <option value="">Armed Security Guard (Civil)</option>
                                                               <option value="">Unarmed Security Guard(Ex-Servicemen)
                                                               </option>
                                                               <option value="">Unarmed Security Guard(Civil)</option>
                                                               <option value="">Close Protection Office/Executive
                                                                   Protective Officers</option>
                                                               <option value="">Lady Searcher</option>
                                                               <option value="">Male Searcher</option>
                                                               <option value="">Bouncers</option>
                                                               <option value="">Project Head</option>
                                                               <option value="">Security Manager</option>
                                                               <option value="">SSG</option>
                                                               <option value="">Male Facilitation Officer</option>
                                                               <option value="">Female Facilitation Officer</option>
                                                               <option value="">Escort Security Guard</option>
                                                               <option value="">Baggae Scanner Operator</option>
                                                               <option value="">Sniper</option>
                                                               <option value="">Traffic Controller</option>
                                                               <option value="">Ceremonial Guard</option>
                                                               <option value="">VIP Ceremonial Guard</option>
                                                               <option value="">VVIP Ceremonial Guard</option>
                                                               <option value="">Fire Birgade</option>
                                                               <option value="">Paramedic Staff</option>
                                                               <option value="">Security Facilitation Officers(SFO)
                                                               </option>
                                                               <option value="">Guide</option>
                                                           </select>
                                                       </div>
                                                       <div class="col-lg-6 spacing-right">
                                                           Quantity : <br>

                                                           <select id="leadcategory" name="vehicle_guard_quantity[]" class="form-control mt-1"
                                                                style="width: 100%;">
                                                               <option value="">1</option>
                                                               <option value="">2</option>
                                                               <option value="">3</option>
                                                               <option value="">4</option>
                                                               <option value="">5</option>
                                                               <option value="">6</option>
                                                               <option value="">7</option>
                                                               <option value="">8</option>
                                                               <option value="">9</option>
                                                           </select>
                                                       </div>
                                                       <div class="col-lg-6 spacing-right">
                                                           Shift Timing : <br>
                                                           <select id="leadcategory" name="vehicle_guard_shift_timing[]" class="form-control mt-1"
                                                                style="width: 90%;">
                                                               <option value="">1x</option>
                                                               <option value="">2x</option>
                                                               <option value="">3x</option>
                                                               <option value="">4x</option>
                                                               <option value="">5x</option>
                                                               <option value="">6x</option>
                                                               <option value="">7x</option>
                                                               <option value="">8x</option>
                                                               <option value="">9x</option>
                                                           </select>
                                                       </div>
                                                       <div class="col-lg-6 spacing-right">
                                                           Food by Client : <br>
                                                           <select id="leadcategory" name="vehicle_guard_food_by_client[]" class="form-control mt-1"
                                                                style="width: 90%;">
                                                               <option value="">Yes</option>
                                                               <option value="">No</option>
                                                           </select>
                                                       </div>
                                                       <div class="col-lg-6 spacing-right">
                                                           Accomodation By Client : <br>
                                                           <select id="leadcategory" name="vehicle_guard_accomodation[]" class="form-control mt-1"
                                                                style="width: 90%;">
                                                               <option value="">Yes</option>
                                                               <option value="">No</option>
                                                           </select>
                                                       </div>

                                                       <div class="col-lg-6 spacing-right">
                                                           Transportation by Client : <br>
                                                           <select id="leadcategory" name="vehicle_guard_transportation[]" class="form-control mt-1"
                                                                style="width: 90%;">
                                                               <option value="">Yes</option>
                                                               <option value="">No</option>
                                                           </select>
                                                       </div>
                                                       <div class="col-lg-6 spacing-right">
                                                           Required on monthly basis : <br>
                                                           <select id="leadcategory" name="vehicle_guard_req_monthly[]" class="form-control mt-1"
                                                                style="width: 90%;">
                                                               <option value="">Yes</option>
                                                               <option value="">No</option>
                                                           </select>
                                                       </div>
                                                       <div class="col-lg-6 spacing-right">
                                                           Required on dialy basis : <br>
                                                           <select id="leadcategory" name="vehicle_guard_req_dialy[]" class="form-control mt-1"
                                                              style="width: 90%;">
                                                               <option value="">Yes</option>
                                                               <option value="">No</option>
                                                           </select>
                                                       </div>
                                                       <div class="col-lg-6 mt-1">
                                                           No. of days Security Staff required for <br> <input
                                                               class="form-control" name="vehicle_guard_no[]" type="text" placeholder="..."
                                                               style="width: 100%;">
                                                       </div>
                                                       <div class="col-lg-6">
                                                           Notes <br> <textarea class="form-control mt-1"
                                                               id="head_office_name" name="vehicle_guard_notes[]"  type="text"
                                                               placeholder="..." style="width: 100%;"></textarea>
                                                       </div>
                                                       <div class="col-lg-6">
                                                           Attachments <br> <input class="form-control mt-1"
                                                               id="head_office_email" name="vehicle_guard_attach[]"  type="file"
                                                               placeholder="..." style="width: 100%;">
                                                       </div>
                                                       <!-- <button class="new-branch mt-2" onclick="removeNewDiv7()">Remove</button> -->
                                                   </div>
                                               </div>
                                           </div>

                                           <!--  -->
                                           <div class="col-lg-6">
                                               Notes <br> <textarea class="form-control mt-1" name="[]" id="head_office_name"
                                                    type="text" placeholder="..."
                                                   style="width: 100%;"></textarea>
                                           </div>
                                           <div class="col-lg-6">
                                               Attachments <br> <input class="form-control mt-1" name="[]" id="head_office_email"
                                                    type="file" placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                           </div>
                       </div>
                       <button class="btn btn-danger btn-sm removeSignAccordion2 mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                   </div>
               </div>
           `;

           $('#signatoryAccordion2').append(newSignAccordion2);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion2', function() {
           $(this).closest('.signaccordion-item2').remove();
       });
   });
</script>
<!-- Script For Show data in table and update table of Vehicals -->
<script>
   $(document).ready(function() {
       // Function to update summary table for Vehicals entries
       function updateSignatorySummaryTable2() {
           // Clear existing rows
           $('#signatorySummaryTable2 tbody').empty();

           // Iterate through each gaurd accordion item and update the summary table
           $('.signaccordion-item2').each(function(index) {
               var vehicleOwnership = $(this).find('[name="vehicle_ownership[]"]').val();
               var vehicleType = $(this).find('[name="vehicle_type[]"]').val();
               var vehicleCategory = $(this).find('[name="vehicle_category[]"]').val();
               console.log(OnerStatus);
               console.log(types);
               console.log(category);
               // Check if any relevant data is entered
               if (vehicleOwnership || vehicleType || vehicleCategory) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable2 tbody').append(`
                               <tr>
                                   <td>${index + 1}</td>
                                   <td>${vehicleOwnership}</td>
                                   <td>${vehicleType}</td>
                                   <td>${vehicleCategory}</td>
                                   <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                                   <!-- Add more columns as needed -->
                               </tr>
                           `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory2').on('click', function() {
           var signatoryEntryCount2 = $('#signatoryAccordion2 .signaccordion-item2').length + 1;

           var newSignatoryEntry2 = `
                       <!-- Your existing signatory accordion HTML goes here -->

                   `;
           console.log('Adding signatory entry:', signatoryEntryCount2);
           $('#signatoryAccordion2').append(newSignatoryEntry2);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable2').on('click', function() {
           // Update the signatory summary table
           console.log("clicked save");
           updateSignatorySummaryTable2();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button', function() {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item2').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion', function() {
           $(this).closest('.signaccordion-item2').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable2();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory2').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<!-- Script for add more Canine -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory3').on('click', function() {
           var SignatoryAccordionCount3 = $('#signatoryAccordion3 .signaccordion-item3').length + 1;

           var newSignAccordion3 = `
               <div class="accordion-item signaccordion-item3" id="signatoryEntry3${SignatoryAccordionCount3}">
                   <h2 class="accordion-header" id="signatoryHeading3${SignatoryAccordionCount3}">
                       <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse3${SignatoryAccordionCount3}" aria-expanded="false" aria-controls="signatoryCollapse3${SignatoryAccordionCount3}">
                           Canine Entry ${SignatoryAccordionCount3}
                       </button>
                   </h2>
                   <div id="signatoryCollapse3${SignatoryAccordionCount3}" class="collapse" aria-labelledby="signatoryHeading3${SignatoryAccordionCount3}">
                       <div class="accordion-body">
                           <div class="row mb-2" id="signatoryDetailsContainer3">
                               <div class="col-lg-6 spacing-right">
                                   Required for : <br>
                                   <select id="req_leadcategory"
                                       class="form-control mt-1" name="canine_req_for[]"
                                       style="width: 100%;">
                                       <option value="MonthlyBasis">Monthly Basis
                                       </option>
                                       <option value="DailyBasis">Daily Basis</option>
                                   </select>
                               </div>
                               <div class="col-lg-6 form-group spacing-left">
                                   Category:<br>
                                   <div class="input-group" style="width: 100%;">
                                       <select id="applicable_compliances" class="form-control mt-1" name="canine_category[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                           <option value=""></option>
                                       </select>
                                       <div class="input-group-append" style="width: 30%;">
                                           <a href="">
                                               <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                           </a>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-lg-6 mt-1" id="noOfDaysDogs">
                                   No. of days Dogs Require for <br> <input
                                       class="form-control" type="text" name="canine_req_for_days[]"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Color of Dog <br> <input class="form-control"
                                       type="text" placeholder="..." name="canine_color[]"
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   No. of Dog(s) <br> <input class="form-control"

                                       type="text" placeholder="..." name="canine_no[]"
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 spacing-right">
                                   Required with Handler : <br>
                                   <select id="req_handler_leadcategory" name="canine_req_handler[]"
                                       class="form-control mt-1"
                                       style="width: 100%;">
                                       <option value="">select</option>
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                   </select>
                               </div>
                               <div class="col-lg-6 mt-1" id="nameOFHandler">
                                   Name of Handler <br> <input class="form-control"
                                       type="text" name="canine_handler_name[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1" id="cnicOFHandler">
                                   CNIC <br> <input class="form-control" name="canine_handler_cnic_no[]" type="text"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1" id="ageOFHandler">
                                   Age <br> <input class="form-control" name="canine_handler_age[]" type="text"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1" id="experienceOFHandler">
                                   Experience <br> <input class="form-control"
                                       type="text" name="canine_handler_exp[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1" id="cellNoOFHandler">
                                   Cell Number <br> <input class="form-control"
                                       type="text" name="canine_handler_cell[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1" id="cnicFrontOFHandler">
                                   CNIC Front <br> <input class="form-control"
                                       type="file" name="canine_handler_cnic_front[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1" id="cnicBackOFHandler">
                                   CNIC Back <br> <input class="form-control"
                                       type="file" name="canine_handler_cnic_back[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Duty Start Date <br> <input class="form-control"
                                       type="date" name="canine_duty_start_date[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Duty End Date <br> <input class="form-control"
                                       type="date" name="canine_duty_end_date[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Duty Start Time <br> <input class="form-control"
                                       type="time" name="canine_duty_start_time[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Duty End Time <br> <input class="form-control"
                                       type="time" name="canine_duty_end_time[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Shift Duration <br> <input class="form-control"
                                       type="text" name="canine_shift_duration[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   No. of Shifts <br> <input class="form-control"
                                       type="text" name="canine_no_of_shifts[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Picture of Dogs <br> <input class="form-control"
                                       type="file" name="canine_pic_of_dogs[]" multiple placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6">
                                   Notes <br> <textarea class="form-control mt-1"
                                       id="head_office_name"
                                       type="text" name="canine_notes[]" placeholder="..."
                                       style="width: 100%;"></textarea>
                               </div>
                               <div class="col-lg-6">
                                   Attachments <br> <input class="form-control mt-1"
                                       id="head_office_email"
                                       type="file" name="canine_attach[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                           </div>
                       </div>
                       <button class="btn btn-danger btn-sm removeSignAccordion3 mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                   </div>
               </div>
           `;

           $('#signatoryAccordion3').append(newSignAccordion3);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion3', function() {
           $(this).closest('.signaccordion-item3').remove();
       });
   });
</script>
<!-- Script for show data in table and update table of canine services -->
<script>
   $(document).ready(function() {
       // Function to update summary table for signatory entries
       function updateSignatorySummaryTable3() {
           // Clear existing rows
           $('#signatorySummaryTable3 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item3').each(function(index) {
               var canineReqFor = $(this).find('[name="canine_req_for[]"]').val();
               var canineColor = $(this).find('[name="canine_color[]"]').val();
               var canineNo = $(this).find('[name="canine_no[]"]').val();

               // Check if any relevant data is entered
               if (canineReqFor || canineColor || canineNo) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable3 tbody').append(`
                       <tr>
                           <td>${index + 1}</td>
                           <td>${canineReqFor}</td>
                           <td>${canineColor}</td>
                           <td>${canineNo}</td>
                           <td><button type="button" class="btn btn-primary view-signatory-button"style="width: 100%" data-index="${index}">View</button></td>
                           <!-- Add more columns as needed -->
                       </tr>
                   `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory3').on('click', function() {
           var signatoryEntryCount3 = $('#signatoryAccordion3 .signaccordion-item3').length + 1;

           var newSignatoryEntry3 = `
               <!-- Your existing signatory accordion HTML goes here -->
           `;
           console.log('Adding signatory entry:', signatoryEntryCount3);
           $('#signatoryAccordion3').append(newSignatoryEntry3);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable3').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable3();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button', function() {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item3').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion3', function() {
           $(this).closest('.signaccordion-item3').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable3();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory3').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<!-- Script for add more Facilitation Services -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory4').on('click', function() {
           var SignatoryAccordionCount4 = $('#signatoryAccordion4 .signaccordion-item4').length + 1;

           var newSignAccordion4 = `
               <div class="accordion-item signaccordion-item4" id="signatoryEntry4${SignatoryAccordionCount4}">
                   <h2 class="accordion-header" id="signatoryHeading4${SignatoryAccordionCount4}">
                       <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse4${SignatoryAccordionCount4}" aria-expanded="false" aria-controls="signatoryCollapse4${SignatoryAccordionCount4}">
                           Facilitation Entry ${SignatoryAccordionCount4}
                       </button>
                   </h2>
                   <div id="signatoryCollapse4${SignatoryAccordionCount4}" class="collapse" aria-labelledby="signatoryHeading4${SignatoryAccordionCount4}">
                       <div class="accordion-body">
                           <div class="row mb-2" id="signatoryDetailsContainer">
                               <div class="col-lg-6 mt-1">
                                   Guest Arrival Time <br> <input class="form-control"
                                        type="time" name="guest_arrival_time[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Security Team Reporting Time <br> <input
                                       class="form-control" name="security_reporting_time[]" type="time"
                                        placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   PhotoGraph of Guest <br> <input class="form-control"
                                       type="file" name="photograph_of_guest[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   PhotoGraph of Passport <br> <input
                                       class="form-control" name="photograph_of_passport[]" type="file"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Nationality of Guest <br> <input
                                       class="form-control" name="nationality_of_guest[]" type="text"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-4 spacing-right"
                                   id="ssReportingLocation">
                                   <input class="form-check-input" name="security_staff_rep_loc[]" type="checkbox">
                                   <label class="form-check-label" for="check">Security
                                       Staff Reporting
                                       Location</label>
                               </div>
                               <div class="col-lg-6 mt-2 ml-3 ">
                                   <input class="form-check-input" name="airline_details[]" type="checkbox"
                                       id="airline_check">
                                   <label class="form-check-label" for="check">AirLine
                                       Details</label>
                               </div>
                               <div id="airline_check_form" class="container"
                                   style="display: none;">
                                   <div class="row row-cols-2">
                                       <div class="col-lg-6 mt-1">
                                           Name Of AirLine: <br> <input
                                               class="form-control" name="name_of_airline[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                           Contact Number Of AirLine <br> <input
                                               class="form-control" name="contact_of_airline[]" type="number"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                           Email Of AirLine <br> <input
                                               class="form-control" name="email_of_airline[]" type="email"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                           Website Of AirLine <br> <input
                                               class="form-control" name="web_of_airline[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                   </div>
                               </div>
                               <div class="col-lg-6 mt-2 ml-3 ">
                                   <input class="form-check-input" name="poc_of_airline[]" type="checkbox"
                                       id="POC_check">
                                   <label class="form-check-label" for="check">POC of
                                       Airline</label>
                               </div>
                               <div class="container" id="POC_check_form"
                                   style="display: none;">
                                   <div class="row row-cols-2">
                                       <div class="col-lg-12"> Address of POC of
                                           Airline:</div>
                                       <div class="col-lg-6 spacing-right">
                                           POC Name <br> <input class="form-control"
                                               type="text" name="facility_poc_name[]" placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 spacing-right">
                                           POC Designation <br> <input
                                               class="form-control" name="facility_poc_desig[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 spacing-right">
                                           POC Contact No <br> <input
                                               class="form-control" name="facility_poc_contact[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 spacing-right">
                                           POC Email <br> <input class="form-control"
                                                type="text" name="facility_poc_email[]" placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 spacing-right">
                                           Office No <br> <input class="form-control"
                                                type="text" name="facility_poc_office[]" placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 spacing-right">
                                           Floor <br> <input class="form-control" id=""
                                                type="text" name="facility_poc_floor[]" placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 spacing-right">
                                           Building <br> <input class="form-control"
                                                type="text" name="facility_poc_building[]" placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 spacing-right">
                                           Block <br> <input class="form-control"
                                                type="text" name="facility_poc_block[]" placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 spacing-right">
                                           Area <br> <input class="form-control"
                                                type="text" name="facility_poc_area[]" placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 spacing-right">
                                           City <br> <input class="form-control"
                                                type="text" name="facility_poc_city[]" placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 spacing-right">
                                           Photograph of Building <br> <input
                                               class="form-control" id=""
                                               type="file" name="facility_poc_building_photo[]" placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 spacing-right">
                                           Pin location <br> <input
                                               class="form-control" id=""
                                               type="text" name="facility_poc_loc[]" placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                   </div>
                               </div>

                               <!--  -->
                               <div class="col-lg-6 mt-1">
                                   Flight Number <br> <input class="form-control"
                                       type="text" name="flight_number[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Flying from which Country <br> <input
                                       class="form-control" name="flying_from[]" type="text"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Guest/Focal Person Contact Number <br> <input
                                       class="form-control" name="guest_number[]" type="text"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Copy Of Guest Ticket <br> <input
                                       class="form-control" name="copy_of_guest_ticket[]" type="file"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Copy of Guest Visa <br> <input class="form-control"
                                       type="file" name="copy_of_guest_visa[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Guest Travelling Schedule <br> <input
                                       class="form-control" name="guest_schedule[]" type="file"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <h5 class="mt-1">Baggage Details :</h5>
                               <div class="col-lg-6 spacing-right">
                                   Hand Carry : <br>
                                   <select id="leadcategory" name="hand_carry[]" class="form-control mt-1"
                                        style="width: 100%;">
                                       <option value="">Yes</option>
                                       <option value="">No</option>
                                   </select>
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Weight <br> <input class="form-control" name="luggage_weight[]" type="text"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Tag Number of Booked Luggage <br> <input
                                       class="form-control" name="tag_number[]" type="text"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Color of Bags <br> <input class="form-control"
                                       type="text" name="color_of_bags[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Weight of Bags <br> <input class="form-control"
                                       type="text" name="weight_of_bags[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Picture of Bags <br> <input class="form-control"
                                       type="file" name="picture_of_bags[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6">
                                   Notes <br> <textarea class="form-control mt-1"
                                       id="head_office_name"
                                       type="text" name="facilitation_notes[]" placeholder="..."
                                       style="width: 100%;"></textarea>
                               </div>
                               <div class="col-lg-6">
                                   Attachments <br> <input class="form-control mt-1"
                                       id="head_office_email" name="facilitation_attach[]"
                                       type="file" placeholder="..."
                                       style="width: 100%;">
                               </div>
                           </div>
                       </div>
                       <button class="btn btn-danger btn-sm removeSignAccordion4 mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                   </div>
               </div>
           `;

           $('#signatoryAccordion4').append(newSignAccordion4);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion4', function() {
           $(this).closest('.signaccordion-item4').remove();
       });
   });
</script>
<!-- Script for show data in table and update of Facilitation Services -->
<script>
   $(document).ready(function() {
       // Function to update summary table for signatory entries
       function updateSignatorySummaryTable4() {
           // Clear existing rows
           $('#signatorySummaryTable4 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item4').each(function(index) {
               var guestArrivalTime = $(this).find('[name="guest_arrival_time[]"]').val();
               var securityReportingTime = $(this).find('[name="security_reporting_time[]"]').val();
               var nationalityOfGuest = $(this).find('[name="nationality_of_guest[]"]').val();

               // Check if any relevant data is entered
               if (guestArrivalTime || securityReportingTime || nationalityOfGuest) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable4 tbody').append(`
                       <tr>
                           <td>${index + 1}</td>
                           <td>${guestArrivalTime}</td>
                           <td>${securityReportingTime}</td>
                           <td>${nationalityOfGuest}</td>
                           <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                           <!-- Add more columns as needed -->
                       </tr>
                   `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory4').on('click', function() {
           var signatoryEntryCount4 = $('#signatoryAccordion4 .signaccordion-item4').length + 1;

           var newSignatoryEntry4 = `
               <!-- Your existing signatory accordion HTML goes here -->
           `;
           console.log('Adding signatory entry:', signatoryEntryCount4);
           $('#signatoryAccordion4').append(newSignatoryEntry4);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable4').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable4();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button', function() {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item4').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion4', function() {
           $(this).closest('.signaccordion-item4').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable4();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory4').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<!-- Script for add more Facilitation Services (private jet) -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory4_1').on('click', function() {
           var SignatoryAccordionCount4_1 = $('#signatoryAccordion4_1 .signaccordion-item4_1').length +
               1;

           var newSignAccordion4_1 = `
       <div class="accordion-item signaccordion-item4_1" id="signatoryEntry4_1${SignatoryAccordionCount4_1}">
           <h2 class="accordion-header" id="signatoryHeading4_1${SignatoryAccordionCount4_1}">
               <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse4_1${SignatoryAccordionCount4_1}" aria-expanded="false" aria-controls="signatoryCollapse4_1${SignatoryAccordionCount4_1}">
                   Private Jet Entry ${SignatoryAccordionCount4_1}
               </button>
           </h2>
           <div id="signatoryCollapse4_1${SignatoryAccordionCount4_1}" class="collapse" aria-labelledby="signatoryHeading4_1${SignatoryAccordionCount4_1}">
               <div class="accordion-body">
                   <div class="row mb-2" id="signatoryDetailsContainer4_1">
                       <!-- Your content for entry goes here -->
                       <div class="col-lg-6 mt-1">
                           No. of Days Private Jet Required for <br> <input
                               class="form-control" name="no_of_days_private_jet[]" type="text"
                               placeholder="..."
                               style="width: 100%;">
                       </div>
                       <div class="col-lg-6 spacing-right">
                           Fuel <br>
                           <select id="leadcategoryfuel" name="fuel_for_private_jet[]" class="form-control mt-1"
                                style="width: 100%;">
                               <option value="">select</option>
                               <option value="As Per Actual">As Per Actual</option>
                               <option value="As Per Kilometer">As Per Kilometer
                               </option>
                           </select>
                       </div>
                       <div class="col-lg-12 mt-1 spacing-right" id="rateOfFuel">
                           Rate of Fuel per Kilometer <br> <input
                               class="form-control" name="rate_of_fuel_for_jet[]" type="text" placeholder="..."
                               style="width: 100%;">
                       </div>
                   </div>
               </div>
               <button class="btn btn-danger btn-sm removeSignAccordion4_1 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
           </div>
       </div>
       `;

           $('#signatoryAccordion4_1').append(newSignAccordion4_1);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion4_1', function() {
           $(this).closest('.signaccordion-item4_1').remove();
       });
   });
</script>
<!-- Script for show data in table and update of Facilitation Services (private jet) -->
<script>
   $(document).ready(function() {
       // Function to update summary table for signatory entries
       function updateSignatorySummaryTable4_1() {
           // Clear existing rows
           $('#signatorySummaryTable4_1 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item4_1').each(function(index) {
               var no_of_days_private_jet = $(this).find('[name="no_of_days_private_jet[]"]').val();
               var fuel_for_private_jet = $(this).find('[name="fuel_for_private_jet[]"]').val();
               var rate_of_fuel_for_jet = $(this).find('[name="rate_of_fuel_for_jet[]"]').val();

               // Check if any relevant data is entered
               if (no_of_days_private_jet || fuel_for_private_jet || rate_of_fuel_for_jet) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable4_1 tbody').append(`
               <tr>
                   <td>${index + 1}</td>
                   <td>${no_of_days_private_jet}</td>
                   <td>${fuel_for_private_jet}</td>
                   <td>${rate_of_fuel_for_jet}</td>
                   <td><button type="button" class="btn btn-primary view-signatory-button4_1" style="width: 100%" data-index="${index}">View</button></td>
               </tr>
           `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory4_1').on('click', function() {
           var signatoryEntryCount4_1 = $('#signatoryAccordion4_1 .signaccordion-item4_1').length + 1;

           var newSignatoryEntry4_1 = `
       <!-- Your existing signatory accordion HTML goes here, adjusted for 4_1 -->
       `;
           console.log('Adding signatory entry:', signatoryEntryCount4_1);
           $('#signatoryAccordion4_1').append(newSignatoryEntry4_1);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable4_1').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable4_1();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button4_1', function() {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item4_1').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion4_1', function() {
           $(this).closest('.signaccordion-item4_1').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable4_1();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory4_1').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<!-- Script for add more event Services -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory5').on('click', function() {
           var SignatoryAccordionCount5 = $('#signatoryAccordion5 .signaccordion-item5').length + 1;

           var newSignAccordion5 = `
           <div class="accordion-item signaccordion-item5" id="signatoryEntry5${SignatoryAccordionCount5}">
               <h2 class="accordion-header" id="signatoryHeading5${SignatoryAccordionCount5}">
                   <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse5${SignatoryAccordionCount5}" aria-expanded="false" aria-controls="signatoryCollapse5${SignatoryAccordionCount5}">
                       Event Entry ${SignatoryAccordionCount5}
                   </button>
               </h2>
               <div id="signatoryCollapse5${SignatoryAccordionCount5}" class="collapse" aria-labelledby="signatoryHeading5${SignatoryAccordionCount5}">
                   <div class="accordion-body">
                       <div class="row mb-2" id="signatoryDetailsContainer5">
                           <div class="row mb-2">
                               <div class="col-lg-6 spacing-right" id="Owner">
                                   Ownership Status : <br>
                                   <select id="Ownership_yes" name="ownership_status[]"
                                       class="form-control mt-1"
                                       style="width: 100%;">
                                       <option value="Company Owned">Company Owned
                                       </option>
                                       <option value="OutSourced">OutSourced
                                       </option>
                                   </select>
                               </div>
                               <div class="col-lg-6 spacing-right">
                                   Required for : <br>
                                   <select id="leadcategory" name="event_req_for[]"
                                       class="form-control mt-1"
                                       style="width: 100%;">
                                       <option value="Daily">Daily</option>
                                       <option value="Monthly">Monthly</option>
                                   </select>
                               </div>
                               <div class="col-lg-6 mt-1">
                                   No of days Security Staff Required for <br>
                                   <input class="form-control" name="event_no_of_staff[]"
                                        type="text"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Duty Start Date <br> <input class="form-control"
                                       type="date" name="event_duty_start_date[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Duty End Date <br> <input class="form-control"
                                       type="date" name="event_duty_end_date[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Duty Start Time <br> <input class="form-control"
                                       type="time" name="event_duty_start_time[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Duty End Time <br> <input class="form-control"
                                       type="time" name="event_duty_end_time[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Shift Duration <br> <input class="form-control"
                                       type="text" name="event_shift_duration[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1 spacing-right">
                                   Shift Type : <br>
                                   <select id="leadcategory" name="event_shift_type[]"
                                       class="form-control mt-1"
                                       style="width: 100%;">
                                       <option value="">Day Shift</option>
                                       <option value="">Night Shift</option>
                                   </select>
                               </div>
                               <div class="col-lg-6 mt-1">
                                   No. of Shifts <br> <input class="form-control"
                                       type="text" name="event_no_of_shifts[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-2 ml-3 ">
                                   <input class="form-check-input" name="event_reporting_location[]" type="checkbox"
                                       id="reporting_location_check">
                                   <label class="form-check-label"
                                       for="check">Reporting Location</label>
                               </div>
                               <!-- Address -->
                               <div class="container " id="reporting_location_form"
                                   style="display: none;">
                                   <div class="row row-cols-2">
                                       <div class="col-lg-6 mt-1">
                                           Office No <br> <input
                                               class="form-control" id=""
                                               type="text" name="event_office_no[]" placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                           Floor <br> <input class="form-control"
                                               id="" name="event_floor[]" type="text"
                                               placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                           Building <br> <input
                                               class="form-control" id=""
                                               type="text" name="event_building[]" placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                           Block <br> <input class="form-control"
                                               id="" name="event_block[]"  type="text"
                                               placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                           Area <br> <input class="form-control"
                                               id="" name="event_area[]" type="text"
                                               placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                           City <br> <input class="form-control"
                                               id="" name="event_city[]" type="text"
                                               placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                           Photograph of Building <br> <input
                                               class="form-control" id=""
                                               type="file" name="event_photo[]" placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                           Pin location <br> <input
                                               class="form-control" id=""
                                               type="text" name="event_loc[]" placeholder="..."
                                               style="width: 100%;">
                                       </div>
                                   </div>
                               </div>
                               <!--  -->
                               <div class="col-lg-6 mt-1">
                                   Event Date <br> <input class="form-control"
                                       type="date" name="event_date[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Event Venue <br> <input class="form-control"
                                       type="file" name="event_venue[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6">
                                   Deployment Plan <br> <input
                                       class="form-control mt-1"
                                       id="head_office_email"
                                       type="file" name="event_deployment_plan[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6">
                                   Notes <br> <textarea class="form-control mt-1"
                                       id="head_office_name"
                                       type="text" name="event_security_notes[]" placeholder="..."
                                       style="width: 100%;"></textarea>
                               </div>
                               <div class="col-lg-6">
                                   Attachments <br> <input
                                       class="form-control mt-1"
                                       id="head_office_email"
                                       type="file" name="event_security_attach[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <!-- Escort Services Form -->
                           </div>
                       </div>
                   </div>
                   <button class="btn btn-danger btn-sm removeSignAccordion5 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
               </div>
           </div>
       `;

           $('#signatoryAccordion5').append(newSignAccordion5);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion5', function() {
           $(this).closest('.signaccordion-item5').remove();
       });
   });
</script>
<!-- Script for show data in table and update of event Services -->
<script>
   $(document).ready(function() {
       // Function to update summary table for signatory entries
       function updateSignatorySummaryTable5() {
           // Clear existing rows
           $('#signatorySummaryTable5 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item5').each(function(index) {
               var ownership_status = $(this).find('[name="ownership_status[]"]').val();
               var event_req_for = $(this).find('[name="event_req_for[]"]').val();
               var event_no_of_staff = $(this).find('[name="event_no_of_staff[]"]').val();

               // Check if any relevant data is entered
               if (ownership_status || event_req_for || event_no_of_staff) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable5 tbody').append(`
                   <tr>
                       <td>${index + 1}</td>
                       <td>${ownership_status}</td>
                       <td>${event_req_for}</td>
                       <td>${event_no_of_staff}</td>
                       <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                       <!-- Add more columns as needed -->
                   </tr>
               `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory5').on('click', function() {
           var signatoryEntryCount5 = $('#signatoryAccordion5 .signaccordion-item5').length + 1;

           var newSignatoryEntry5 = `
           <!-- Your existing signatory accordion HTML goes here -->
       `;
           console.log('Adding signatory entry:', signatoryEntryCount5);
           $('#signatoryAccordion5').append(newSignatoryEntry5);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable5').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable5();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button', function() {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item5').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion5', function() {
           $(this).closest('.signaccordion-item5').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable5();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory5').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<!-- Script for add more secuirty consultancy Services -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory6').on('click', function() {
           var SignatoryAccordionCount6 = $('#signatoryAccordion6 .signaccordion-item6').length + 1;

           var newSignAccordion6 = `
       <div class="accordion-item signaccordion-item6" id="signatoryEntry6${SignatoryAccordionCount6}">
           <h2 class="accordion-header" id="signatoryHeading6${SignatoryAccordionCount6}">
               <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse6${SignatoryAccordionCount6}" aria-expanded="false" aria-controls="signatoryCollapse6${SignatoryAccordionCount6}">
                   Secuirty Consultancy Entry ${SignatoryAccordionCount6}
               </button>
           </h2>
           <div id="signatoryCollapse6${SignatoryAccordionCount6}" class="collapse" aria-labelledby="signatoryHeading6${SignatoryAccordionCount6}">
               <div class="accordion-body">
                   <div class="row mb-2" id="signatoryDetailsContainer6">
                       <!-- Your content for entry goes here -->
                       <div class="col-lg-6 form-group spacing-left">
                           Category:<br>
                           <div class="input-group" style="width: 100%;">
                               <select id="applicable_compliances" name="consultancy_category[]" class="form-control mt-1"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                   <option value=""></option>
                                   <option value="Security Planning">Security
                                       Planning</option>
                                   <option value="Risk Analysis">Risk Analysis
                                   </option>
                                   <option value="HSSE Survey">HSSE Survey</option>
                                   <option value="Security Training">Security
                                       Training</option>
                                   <option value="MEE TOO & Imitate Brand">MEE TOO
                                       & Imitate Brand
                                   </option>
                               </select>
                               <div class="input-group-append" style="width: 30%;">
                                   <a href="">
                                       <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                   </a>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6">
                           Scope of Work <br> <input class="form-control mt-1"
                               id="" name="scope_of_work[]" type="file"
                               placeholder="..." style="width: 100%;">
                       </div>
                       <div class="col-lg-6 mt-1">
                           Internal Deadline:<br> <input
                               class="form-control" name="internal_deadline[]" type="date"
                                placeholder="..."
                               style="width: 100%;">
                       </div>
                       <div class="col-lg-6 mt-1 ">
                           Date of Submission of Report <br> <input
                               class="form-control mt-1" name="consultancy_date_of_submission[]" id=""
                               type="date"
                               placeholder="..." style="width: 100%;">
                       </div>
                       <div class="col-lg-6 mt-1">
                           Notes <br> <textarea class="form-control mt-1"
                               id="head_office_name" name="consultancy_notes[]"
                               type="text" placeholder="..."
                               style="width: 100%;"></textarea>
                       </div>
                       <div class="col-lg-6 mt-1">
                           Attachements <br> <input class="form-control"
                               type="file" name="consultancy_attach[]" placeholder="..."
                               style="width: 100%;">
                       </div>
                   </div>
               </div>
               <button class="btn btn-danger btn-sm removeSignAccordion6 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
           </div>
       </div>
       `;

           $('#signatoryAccordion6').append(newSignAccordion6);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion6', function() {
           $(this).closest('.signaccordion-item6').remove();
       });
   });
</script>
<!-- Script for show data in table and update of secuirty consultancy Services -->
<Script>
   $(document).ready(function() {
       // Function to update summary table for signatory entries
       function updateSignatorySummaryTable6() {
           // Clear existing rows
           $('#signatorySummaryTable6 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item6').each(function(index) {
               var consultancy_category = $(this).find('[name="consultancy_category[]"]').val();
               var internal_deadline = $(this).find('[name="internal_deadline[]"]').val();
               var consultancy_date_of_submission = $(this).find('[name="consultancy_date_of_submission[]"]').val();

               // Check if any relevant data is entered
               if (consultancy_category || internal_deadline || consultancy_date_of_submission) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable6 tbody').append(`
               <tr>
                   <td>${index + 1}</td>
                   <td>${consultancy_category}</td>
                   <td>${internal_deadline}</td>
                   <td>${consultancy_date_of_submission}</td>
                   <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                   <!-- Add more columns as needed -->
               </tr>
           `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory6').on('click', function() {
           var signatoryEntryCount6 = $('#signatoryAccordion6 .signaccordion-item6').length + 1;

           var newSignatoryEntry6 = `
       <!-- Your existing signatory accordion HTML goes here -->
       `;
           console.log('Adding signatory entry:', signatoryEntryCount6);
           $('#signatoryAccordion6').append(newSignatoryEntry6);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable6').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable6();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button', function() {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item6').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion6', function() {
           $(this).closest('.signaccordion-item6').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable6();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory6').on('click', function(event) {
           event.preventDefault();
       });
   });
</Script>
<!-- Script for add more Fire fighting Services -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory7').on('click', function() {
           var SignatoryAccordionCount7 = $('#signatoryAccordion7 .signaccordion-item7').length + 1;

           var newSignAccordion7 = `
       <div class="accordion-item signaccordion-item7" id="signatoryEntry7${SignatoryAccordionCount7}">
           <h2 class="accordion-header" id="signatoryHeading7${SignatoryAccordionCount7}">
               <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse7${SignatoryAccordionCount7}" aria-expanded="false" aria-controls="signatoryCollapse7${SignatoryAccordionCount7}">
               Active Fire Equipment Entry ${SignatoryAccordionCount7}
               </button>
           </h2>
           <div id="signatoryCollapse7${SignatoryAccordionCount7}" class="collapse" aria-labelledby="signatoryHeading7${SignatoryAccordionCount7}">
               <div class="accordion-body">
                   <div class="row mb-2" id="signatoryDetailsContainer7">
                                                                       <div class="row mb-2">
                                                                           <div class="col-lg-3 spacing-right">
                                                                               Fire Class: <br>
                                                                               <select class="form-control mt-1"
                                                                                   style="width: 100%;" name="fireClass[]" id="categoryOfEquipment" >
                                                                                   <option value=" "></option>
                                                                                   <option value="ClassA" id="classA">Class A – Flammable Materials (e.g. Paper & Wood)</option>
                                                                                   <option value="ClassB" id="classB">Class B – Flammable Liquid (e.g. Paint & Petrol)</option>
                                                                                   <option value="ClassC" id="classC">Class C – Flammable Gasses (e.g. Butane & Methane)</option>
                                                                                   <option value="ClassD" id="classD">Class D – Flammable Metals (e.g. Lithium & Potassium)</option>
                                                                                   <option value="ClassE" id="classE">Class E – Electrical Equipment (e.g. Computers & Generators)</option>
                                                                                   <option value="ClassF" id="classF">Class F – Cooking Fats and Oils (e.g. Fryers & Chip Pans)</option>
                                                                               </select>
                                                                           </div>
                                                                           <div class="col-lg-12 spacing-right" id="classAContent" style="display:none">
                                                                               <div class="row mt-2">
                                                                                   <h5>Cylinder Type</h5>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="waterCylinder[]" id="checkbox1">
                                                                                       <label for="checkbox1">Water Cylinder</label>
                                                                                   </div>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="dryChemical[]" id="checkbox2">
                                                                                       <label for="checkbox2">Dry Chemical Powder BE </label>
                                                                                   </div>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="CoTwo[]" id="checkbox3">
                                                                                       <label for="checkbox3">Carbon Dioxide CO2 </label>
                                                                                   </div>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="foam[]" id="checkbox4">
                                                                                       <label for="checkbox4">Foam</label>
                                                                                   </div>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="wetChemical[]" id="checkbox5">
                                                                                       <label for="checkbox5">Wet Chemical</label>
                                                                                   </div>
                                                                               </div>
                                                                           </div>
                                                                           <div class="col-lg-12 spacing-right" id="classBContent" style="display:none;">
                                                                               <div class="row mt-2">
                                                                                   <h5>Cylinder Type</h5>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="dryChemicalAbe[]" id="checkbox1">
                                                                                       <label for="checkbox1">Dry Chemical Powder ABE</label>
                                                                                   </div>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="dryChemicalBe[]" id="checkbox2">
                                                                                       <label for="checkbox2">Dry Chemical Powder BE </label>
                                                                                   </div>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="Co2[]" id="checkbox3">
                                                                                       <label for="checkbox3">Carbon Dioxide CO2 </label>
                                                                                   </div>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="foam2[]" id="checkbox4">
                                                                                       <label for="checkbox4">Foam</label>
                                                                                   </div>
                                                                               </div>
                                                                           </div>
                                                                           <div class="col-lg-12 spacing-right" id="classCContent" style="display:none;">
                                                                               <div class="row mt-2">
                                                                                   <h5>Cylinder Type</h5>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="dryChemicalPowderABE[]" id="checkbox1">
                                                                                       <label for="checkbox1">Dry Chemical Powder ABE</label>
                                                                                   </div>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="dryChemicalPowderBE[]" id="checkbox2">
                                                                                       <label for="checkbox2">Dry Chemical Powder BE </label>
                                                                                   </div>
                                                                               </div>
                                                                           </div>
                                                                           <div class="col-lg-12 spacing-right" id="classDContent" style="display:none;">
                                                                               <div class="row mt-2">
                                                                                   <h5>Cylinder Type</h5>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="dryChemicalPowderABE1[]" id="checkbox1">
                                                                                       <label for="checkbox1">Dry Chemical Powder ABE</label>
                                                                                   </div>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="dryChemicalPowderBE1[]" id="checkbox2">
                                                                                       <label for="checkbox2">Dry Chemical Powder BE </label>
                                                                                   </div>
                                                                               </div>
                                                                           </div>
                                                                           <div class="col-lg-12 spacing-right" id="classEContent" style="display:none;">
                                                                               <div class="row mt-2">
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="dryChemicalPowderABE2[]" id="checkbox1">
                                                                                       <label for="checkbox1">Dry Chemical Powder ABE</label>
                                                                                   </div>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="dryChemicalPowderBE2[]" id="checkbox2">
                                                                                       <label for="checkbox2">Dry Chemical Powder BE </label>
                                                                                   </div>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="cd2[]" id="checkbox2">
                                                                                       <label for="checkbox2">Carbon Dioxide CO2</label>
                                                                                   </div>
                                                                               </div>
                                                                           </div>
                                                                           <div class="col-lg-12 spacing-right" id="classFContent" style="display:none;">
                                                                               <div class="row mt-2">
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="dryChemicalPowderBE3[]" id="checkbox2">
                                                                                       <label for="checkbox2">Dry Chemical Powder BE </label>
                                                                                   </div>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="foam3[]" id="checkbox1">
                                                                                       <label for="checkbox1">Foam</label>
                                                                                   </div>
                                                                                   <div class="col-lg-2">
                                                                                       <input type="checkbox" input="wetChemical2[]" id="checkbox2">
                                                                                       <label for="checkbox2">Wet Chemical</label>
                                                                                   </div>
                                                                               </div>
                                                                           </div>
                                                                           <div class="col-lg-3 spacing-right">
                                                                               Equipment Name : <br>
                                                                               <input class="form-control"
                                                                               type="text" name="fire_equipment_name[]" placeholder="..."
                                                                               style="width: 100%;">
                                                                           </div>
                                                                           <div class="col-lg-3 spacing-right">
                                                                               Cylinder Size : <br>
                                                                               <input class="form-control"
                                                                                   type="text" name="fire_cylinder_type[]" placeholder="..."
                                                                                   style="width: 100%;">
                                                                           </div>
                                                                           <div class="col-lg-3 mt-1">
                                                                               Article No<br> <input class="form-control"
                                                                                   type="text" name="fire_article_no[]"  placeholder="..."
                                                                                   style="width: 100%;">
                                                                           </div>
                                                                           <div class="col-lg-3 mt-1">
                                                                               Model <br> <input class="form-control" name="fire_model[]" type="text" placeholder="..."
                                                                                   style="width: 100%;">
                                                                           </div>
                                                                           <div class="col-lg-3 mt-1 spacing-right">
                                                                               Year of Manufacturing : <br>
                                                                               <input class="form-control" name="fire_year_of_manufacturing[]" type="text" placeholder="..."
                                                                                   style="width: 100%;">
                                                                           </div>
                                                                           <div class="col-lg-3 spacing-right">
                                                                               Expiry Date : <br>
                                                                               <input class="form-control" name="fire_expiry_date[]" type="date" placeholder="..."
                                                                                   style="width: 100%;">
                                                                           </div>
                                                                           <div class="col-lg-3 mt-1">
                                                                               Warranty Period <br> <input class="form-control" id=""
                                                                                   type="text" name="fire_warranty_period[]" placeholder="..." style="width: 100%;">
                                                                           </div>
                                                                           <p>"Your Fire Fighting Cylinder is going to expire on "</p>
                                                                           <div class="container " id="">
                                                                               <div class="row row-cols-2">

                                                                                   <div class="col-lg-3 mt-1">
                                                                                       Color <br> <input class="form-control" id="" name="fire_color[]" type="text"
                                                                                           placeholder="..." style="width: 100%;">
                                                                                   </div>
                                                                                   <div class="col-lg-3 mt-1">
                                                                                       Quantity <br> <input class="form-control" id="" name="fire_quantity[]"
                                                                                           type="text" placeholder="..." style="width: 100%;">
                                                                                   </div>
                                                                                   <div class="col-lg-3 mt-1">
                                                                                       Specifications Sheet: <br> <input class="form-control" id=""
                                                                                           type="file" name="fire_specifications[]" placeholder="..." style="width: 100%;">
                                                                                   </div>
                                                                               </div>
                                                                           </div>
                                                                       </div>
                                                                       <div class="col-lg-6">
                                                                           Notes <br> <textarea class="form-control mt-1"
                                                                               id="head_office_name"
                                                                               type="text" name="fire_notes[]" placeholder="..."
                                                                               style="width: 100%;"></textarea>
                                                                       </div>
                                                                       <div class="col-lg-6">
                                                                           Attachments <br> <input class="form-control mt-1"
                                                                               id="head_office_email" name="fire_attach[]"
                                                                               type="file" placeholder="..."
                                                                               style="width: 100%;">
                                                                       </div>
                                                                   </div>
               </div>
               <button class="btn btn-danger btn-sm removeSignAccordion7 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
           </div>
       </div>
       `;

           $('#signatoryAccordion7').append(newSignAccordion7);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion7', function() {
           $(this).closest('.signaccordion-item7').remove();
       });
   });
</script>
<!-- Script for show data in table and update of fire fighting Services -->
<script>
   $(document).ready(function() {
       // Function to update summary table for signatory entries
       function updateSignatorySummaryTable7() {
           // Clear existing rows
           $('#signatorySummaryTable7 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item7').each(function(index) {
               var fire_equipment_name = $(this).find('[name="fire_equipment_name[]"]').val();
               var fire_cylinder_type = $(this).find('[name="fire_cylinder_type[]"]').val();
               var fire_article_no = $(this).find('[name="fire_article_no[]"]').val();

               // Check if any relevant data is entered
               if (fire_equipment_name || fire_cylinder_type || fire_article_no) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable7 tbody').append(`
               <tr>
                   <td>${index + 1}</td>
                   <td>${fire_equipment_name}</td>
                   <td>${fire_cylinder_type}</td>
                   <td>${fire_article_no}</td>
                   <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                   <!-- Add more columns as needed -->
               </tr>
           `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory7').on('click', function() {
           var signatoryEntryCount7 = $('#signatoryAccordion7 .signaccordion-item7').length + 1;

           var newSignatoryEntry7 = `
       <!-- Your existing signatory accordion HTML goes here -->
       `;
           console.log('Adding signatory entry:', signatoryEntryCount7);
           $('#signatoryAccordion7').append(newSignatoryEntry7);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable7').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable7();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button', function() {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item7').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion7', function() {
           $(this).closest('.signaccordion-item7').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable7();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory7').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory15').on('click', function() {
           var SignatoryAccordionCount15 = $('#signatoryAccordion15 .signaccordion-item15').length + 1;

           var newSignAccordion15 = `
       <div class="accordion-item signaccordion-item15" id="signatoryEntry15${SignatoryAccordionCount15}">
           <h2 class="accordion-header" id="signatoryHeading15${SignatoryAccordionCount15}">
               <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse15${SignatoryAccordionCount15}" aria-expanded="false" aria-controls="signatoryCollapse15${SignatoryAccordionCount15}">
               Other Active Fire Equipment Entry ${SignatoryAccordionCount15}
               </button>
           </h2>
           <div id="signatoryCollapse15${SignatoryAccordionCount15}" class="collapse" aria-labelledby="signatoryHeading15${SignatoryAccordionCount15}">
               <div class="accordion-body">
                   <div class="row mb-2" id="signatoryDetailsContainer15">
                       <div class="row mb-2">
                           <div class="col-lg-6 spacing-right">
                               Categories : <br>
                               <select id="" class="form-control mt-1" name="other_fire_category[]"
                                   style="width: 100%;">
                                   <option value=""> </option>
                                   <option value="">Deluge System</option>
                                   <option value="">Sprinkler System
                                   </option>
                                   <option value="">Fire Monitor and Hydrants </option>
                                   <option value="">Fixed Foam System</option>
                                   <option value="">Fixed Gas Suppression system
                                   </option>
                               </select>
                           </div>
                           <div class="col-lg-6 spacing-right">
                               Equipment Name : <br>
                               <input class="form-control"
                                   type="text" name="other_equip_name[]" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Article No<br> <input class="form-control"
                                   type="text" name="other_article_no[]" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Model <br> <input class="form-control" name="other_model[]" type="text" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1 spacing-right">
                               Year of Manufacturing : <br>
                               <input class="form-control" name="other_year_of_manufacture[]" type="text" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-6 spacing-right">
                               Expiry Date : <br>
                               <input class="form-control" name="other_expiry_date[]" type="text" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <p>"Your Fire Fighting Cylinder is going to expire on "</p>
                           <div class="container " id="">
                               <div class="row row-cols-2">
                                   <div class="col-lg-6 mt-1">
                                       Warranty Period <br> <input class="form-control" id=""
                                           type="text" name="other_warranty_period[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Color <br> <input class="form-control" id="" name="other_color[]" type="text"
                                           placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Quantity <br> <input class="form-control" id=""
                                           type="text" name="other_quantity[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Specifications Sheet: <br> <input class="form-control" id=""
                                           type="file" name="other_specifications[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Scope of Work <br> <input class="form-control" id=""
                                           type="file" name="other_scope_of_work[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Any Special Instructions <br> <textarea class="form-control mt-1"
                                       id="head_office_name" name="other_instruction[]"
                                       type="text" placeholder="..."
                                       style="width: 100%;"></textarea>
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Picture of Building/Premises:  <br> <input class="form-control" id=""
                                           type="file" name="other_picture_of_building[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Complete Equipment Cost:  <br> <input class="form-control" id=""
                                           type="text" name="other_complete_cost[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Delivery charges:  <br> <input class="form-control" id=""
                                           type="text" name="other_delivery_charges[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Installation Cost: <br> <input class="form-control" id=""
                                           type="text" name="other_installtion_cost[]" placeholder="..." style="width: 100%;">
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6">
                           Notes <br> <textarea class="form-control mt-1"
                               id="head_office_name" name="other_fire_notes[]"
                               type="text" placeholder="..."
                               style="width: 100%;"></textarea>
                       </div>
                       <div class="col-lg-6">
                           Attachments <br> <input class="form-control mt-1"
                               id="head_office_email" name="other_fire_attachment[]"
                               type="file" placeholder="..."
                               style="width: 100%;">
                       </div>
                   </div>
               </div>
               <button class="btn btn-danger btn-sm removeSignAccordion15 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
           </div>
       </div>
       `;

           $('#signatoryAccordion15').append(newSignAccordion15);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion15', function() {
           $(this).closest('.signaccordion-item15').remove();
       });
   });
</script>
<!-- Script for show data in table and update of fire fighting Services -->
<script>
   $(document).ready(function() {
       // Function to update summary table for signatory entries
       function updateSignatorySummaryTable15() {
           // Clear existing rows
           $('#signatorySummaryTable15 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item15').each(function(index) {
               var other_fire_category = $(this).find('[name="other_fire_category[]"]').val();
               var other_equip_name = $(this).find('[name="other_equip_name[]"]').val();
               var other_article_no = $(this).find('[name="other_article_no[]"]').val();

               // Check if any relevant data is entered
               if (other_fire_category || other_equip_name || other_article_no) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable15 tbody').append(`
               <tr>
                   <td>${index + 1}</td>
                   <td>${other_fire_category}</td>
                   <td>${other_equip_name}</td>
                   <td>${other_article_no}</td>
                   <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                   <!-- Add more columns as needed -->
               </tr>
           `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory15').on('click', function() {
           var signatoryEntryCount15 = $('#signatoryAccordion15 .signaccordion-item15').length + 1;

           var newSignatoryEntry15 = `
       <!-- Your existing signatory accordion HTML goes here -->
       `;
           console.log('Adding signatory entry:', signatoryEntryCount15);
           $('#signatoryAccordion15').append(newSignatoryEntry15);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable15').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable15();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button', function() {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item15').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion15', function() {
           $(this).closest('.signaccordion-item15').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable15();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory15').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory16').on('click', function() {
           var SignatoryAccordionCount16 = $('#signatoryAccordion16 .signaccordion-item16').length + 1;

           var newSignAccordion16 = `
           <div class="accordion-item signaccordion-item16" id="signatoryEntry16${SignatoryAccordionCount16}">
           <h2 class="accordion-header" id="signatoryHeading16${SignatoryAccordionCount16}">
               <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse16${SignatoryAccordionCount16}" aria-expanded="false" aria-controls="signatoryCollapse16${SignatoryAccordionCount16}">
               Passive Fire Equipment Entry ${SignatoryAccordionCount16}
               </button>
           </h2>
           <div id="signatoryCollapse16${SignatoryAccordionCount16}" class="collapse" aria-labelledby="signatoryHeading16${SignatoryAccordionCount16}">
               <div class="accordion-body">
                   <div class="row mb-2" id="signatoryDetailsContainer16">
                       <div class="row mb-2">
                           <div class="col-lg-12 spacing-right">
                               Categories : <br>
                               <select id="" name="passive_category[]" class="form-control mt-1"
                                   style="width: 100%;">
                                   <option value=""> </option>
                                   <option value="">Fire Doors</option>
                                   <option value="">Fire Walls
                                   </option>
                                   <option value="">Fire Proof Coating </option>
                                   <option value="">Fire Proof (K Mass) Coating </option>
                                   <option value="">Fire Proof Enclosures
                                   </option>
                                   <option value="">Concrete Structure
                                   </option>
                               </select>
                           </div>
                           <h5>Dimensions</h5>
                           <div class="col-lg-6 spacing-right">
                               Length : <br>
                               <input class="form-control"
                                   type="text" name="passive_dimension[]" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Width<br> <input class="form-control"
                                   type="text" name="passive_width[]" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Height <br> <input class="form-control" name="passive_height[]" type="text" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1 spacing-right">
                               Thickness/Depth : <br>
                               <input class="form-control" name="passive_depth[]" type="text" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-6 spacing-right">
                               Quantity : <br>
                               <input class="form-control" name="passive_quantity[]" type="text" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-6 spacing-right">
                               Material : <br>
                               <input class="form-control"
                                   type="text" name="passive_material[]" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Equipment Name <br> <input class="form-control"
                                   type="text" name="passive_equipment[]"  placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Article No <br> <input class="form-control" name="passive_article[]" type="text" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1 spacing-right">
                               Model : <br>
                               <input class="form-control" name="passive_model[]" type="text" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-6 spacing-right">
                               Year of Manufacturing : <br>
                               <input class="form-control" name="passive_year_of_manufacture[]" type="text" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-6 spacing-right">
                               Expiry Date:  : <br>
                               <input class="form-control" name="passive_expiry[]" type="text" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <p>"Your Passive Fire Fighting Cylinder is going to expire on "</p>
                           <div class="container " id="">
                               <div class="row row-cols-2">
                                   <div class="col-lg-6 mt-1">
                                       Warranty Period <br> <input class="form-control" id=""
                                           type="text" name="passive_warranty[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Color <br> <input class="form-control" name="passive_color[]" id=""  type="text"
                                           placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Quantity <br> <input class="form-control" name="passive_second_quantity[]" id=""
                                           type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Scope of Work <br> <input class="form-control" name="passive_scope_of_work[]" id=""
                                           type="file" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Any Special Instructions <br> <textarea class="form-control mt-1"
                                       id="head_office_name" name="passive_instruction[]"
                                       type="text" placeholder="..."
                                       style="width: 100%;"></textarea>
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Picture of Building/Premises:  <br> <input class="form-control" id=""
                                           type="file" name="passive_building_picture[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Complete Equipment Cost:  <br> <input class="form-control" id=""
                                           type="text" name="passive_complete_cost[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Delivery charges:  <br> <input class="form-control" id=""
                                           type="text" name="passive_delivery_charges[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Installation Cost: <br> <input class="form-control" id=""
                                           type="text" name="passive_cost[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Drawings of the Buildings/Premises <br> <input class="form-control" id=""
                                           type="file" name="passive_drawings[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Pictures of the Buildings/Premises <br> <input class="form-control" id=""
                                           type="file" name="passive_pictures[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 mt-1">
                                       Complete Equipment Charges: <br> <input class="form-control" id=""
                                           type="text" name="passive_complete_equip_charges[]" placeholder="..." style="width: 100%;">
                                   </div>

                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <button class="btn btn-danger btn-sm removeSignAccordion116 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
           </div>
       </div>
       `;

           $('#signatoryAccordion16').append(newSignAccordion16);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion16', function() {
           $(this).closest('.signaccordion-item16').remove();
       });
   });
</script>
<!-- Script for show data in table and update of fire fighting Services -->
<script>
   $(document).ready(function() {
       // Function to update summary table for signatory entries
       function updateSignatorySummaryTable16() {
           // Clear existing rows
           $('#signatorySummaryTable16 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item16').each(function(index) {
               var passive_category = $(this).find('[name="passive_category[]"]').val();
               var passive_dimension = $(this).find('[name="passive_dimension[]"]').val();
               var passive_width = $(this).find('[name="passive_width[]"]').val();

               // Check if any relevant data is entered
               if (passive_category || passive_dimension || passive_width) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable16 tbody').append(`
               <tr>
                   <td>${index + 1}</td>
                   <td>${passive_category}</td>
                   <td>${passive_dimension}</td>
                   <td>${passive_width}</td>
                   <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                   <!-- Add more columns as needed -->
               </tr>
           `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory16').on('click', function() {
           var signatoryEntryCount16 = $('#signatoryAccordion16 .signaccordion-item16').length + 1;

           var newSignatoryEntry16 = `
       <!-- Your existing signatory accordion HTML goes here -->
       `;
           console.log('Adding signatory entry:', signatoryEntryCount16);
           $('#signatoryAccordion16').append(newSignatoryEntry16);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable16').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable16();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button', function() {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item16').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion16', function() {
           $(this).closest('.signaccordion-item16').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable16();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory16').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory17').on('click', function() {
           var SignatoryAccordionCount17 = $('#signatoryAccordion17 .signaccordion-item17').length + 1;

           var newSignAccordion17 = `
           <div class="accordion-item signaccordion-item17" id="signatoryEntry17${SignatoryAccordionCount17}">
           <h2 class="accordion-header" id="signatoryHeading17${SignatoryAccordionCount17}">
               <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse17${SignatoryAccordionCount17}" aria-expanded="false" aria-controls="signatoryCollapse17${SignatoryAccordionCount17}">
               Alarm Entry ${SignatoryAccordionCount17}
               </button>
           </h2>
           <div id="signatoryCollapse17${SignatoryAccordionCount17}" class="collapse" aria-labelledby="signatoryHeading17${SignatoryAccordionCount17}">
               <div class="accordion-body">
                   <div class="row mb-2" id="signatoryDetailsContainer17">
                       <div class="row mb-2">
                           <div class="col-lg-3 spacing-right">
                               Categories : <br>
                               <select id="" name="alarm_category[]" class="form-control mt-1"
                                    style="width: 100%;">
                                   <option value=""> </option>
                                   <option value="">Alarm Panel DSC</option>
                                   <option value="">Key Pad
                                   </option>
                                   <option value="">Metal Box </option>
                                   <option value="">Empty Panel Box</option>
                                   <option value="">Transformer
                                   </option>
                                   <option value="">Battery
                                   </option>
                                   <option value="">Add more with backend
                                   </option>
                               </select>
                           </div>
                           <div class="col-lg-3 spacing-right">
                               Equipment Name:  : <br>
                               <input class="form-control"
                                   type="text" name="alarm_equipment[]"  placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-3 mt-1">
                               Voltage (if any):  <br> <input class="form-control"
                                   type="text" name="alarm_voltage[]" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-3 mt-1">
                               Ampere (if any):   <br> <input class="form-control" name="alarm_ampere[]" type="text" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-3 mt-1 spacing-right">
                               Article No  <br>
                               <input class="form-control" name="alarm_article_no[]" type="text" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-3 spacing-right">
                               Model : <br>
                               <input class="form-control" name="alarm_model[]"  type="text" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-3 spacing-right">
                               Year of Manufacturing : <br>
                               <input class="form-control"
                                   type="text" name="alarm_year[]" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <div class="col-lg-3 spacing-right">
                               Expiry Date:  : <br>
                               <input class="form-control" name="alarm_expiry[]" type="text" placeholder="..."
                                   style="width: 100%;">
                           </div>
                           <p>"Your Passive Fire Fighting Cylinder is going to expire on "</p>
                           <div class="container " id="">
                               <div class="row row-cols-2">
                                   <div class="col-lg-3 mt-1">
                                       Warranty Period <br> <input class="form-control" id=""
                                           type="text" name="alarm_warranty[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Color <br> <input class="form-control" id="" name="alarm_color[]" type="text"
                                           placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Quantity <br> <input class="form-control" id=""
                                           type="text" name="alarm_quantity[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Scope of Work <br> <input class="form-control" id=""
                                           type="file" name="alarm_scope[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Any Special Instructions <br> <textarea class="form-control mt-1"
                                       id="head_office_name"
                                       type="text" name="alarm_ins[]" placeholder="..."
                                       style="width: 100%;"></textarea>
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Drawings of Building/Premises:  <br> <input class="form-control" id=""
                                           type="file" name="alarm_drawings[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Picture of Building/Premises:  <br> <input class="form-control" id=""
                                           type="file" name="alarm_pictures[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Complete Equipment Cost:  <br> <input class="form-control" id=""
                                           type="text" name="alarm_cost[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Delivery charges:  <br> <input class="form-control" id=""
                                           type="text" name="alarm_charges[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Installation Cost: <br> <input class="form-control" id=""
                                           type="text" name="alarm_ins_cost[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <p>Dimensions ( if any ) :</p>
                                   <div class="col-lg-3 mt-1">
                                       Length (if any):  <br> <input class="form-control" id=""
                                           type="text" name="alarm_length[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Width (if any):  <br> <input class="form-control" id="" name="alarm_width[]"  type="text"
                                           placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Height (if any):  <br> <input class="form-control" id=""
                                           type="text" name="alarm_height[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Thickness (if any):  <br> <input class="form-control" id=""
                                           type="text" name="alarm_thickness[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Diameter (if any):  <br> <input class="form-control" id=""
                                           type="text" name="alarm_diameter[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 spacing-right">
                                       Installation of smoke Detectors : <br>
                                       <select id="" name="alarm_ins_smoke[]" class="form-control mt-1"
                                            style="width: 100%;">
                                           <option value=""> </option>
                                           <option value="">Yes</option>
                                           <option value="">No</option>
                                       </select>
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Installation charges of Smoke Detectors:<br> <input class="form-control" id=""
                                           type="text" name="alarm_ins_cost_smoke[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 spacing-right">
                                       Internal Shifting of Panel/Devices:  <br>
                                       <select id="" name="alarm_internal_shifting[]" class="form-control mt-1"
                                           style="width: 100%;">
                                           <option value=""> </option>
                                           <option value="">Yes</option>
                                           <option value="">No</option>
                                       </select>
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Internal Shifting Charges of Panel/Devices:  <br> <input class="form-control" id=""
                                           type="text" name="alarm_internal_shifting_charges[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 spacing-right">
                                       Reinstallation of Complete Alarm System : <br>
                                       <select id="" name="alarm_reinstall[]" class="form-control mt-1"
                                           style="width: 100%;">
                                           <option value=""> </option>
                                           <option value="">Yes</option>
                                           <option value="">No</option>
                                       </select>
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Reinstallation Charges of Complete Alarm System:  <br> <input class="form-control" id=""
                                           type="text" name="alarm_reinstall_charges[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 spacing-right">
                                       QRF Monitoring Required : <br>
                                       <select id="" name="alarm_qrf[]" class="form-control mt-1"
                                           style="width: 100%;">
                                           <option value=""> </option>
                                           <option value="">Yes</option>
                                           <option value="">No</option>
                                       </select>
                                   </div>
                                   <div class="col-lg-3 mt-1" id="qrfMonitoringChargesField" style="display: none;">
                                       Monthly QRF Monitoring Charges: <br>
                                       <input class="form-control" name="alarm_qrf_monthly_charges[]" id="monthlyQrfMonitoringCharges" type="text" placeholder="..." style="width: 100%;">
                                       Yearly QRF Monitoring Charges: <br>
                                       <input class="form-control" name="alarm_qrf_yearly_charges[]" id="yearlyQrfMonitoringCharges" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 spacing-right">
                                       Police Monitoring Required : <br>
                                       <select id="" name="alarm_police_req[]" class="form-control mt-1"
                                            style="width: 100%;">
                                           <option value=""> </option>
                                           <option value="">Yes</option>
                                           <option value="">No</option>
                                       </select>
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Monthly Police Monitoring Charges:  <br> <input class="form-control" id=""
                                           type="text" name="alarm_police_monthly_charges[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Monthly Police Monitoring Charges:  <br> <input class="form-control" id=""
                                           type="text" name="alarm_police_yearly_charges[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Visit Charges KHI/LHR/ISB/RWP :  <br> <input class="form-control" id=""
                                           type="text" name="alarm_visit_charges[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Visit Charges Out City :  <br> <input class="form-control" id=""
                                           type="text" name="alarm_visit_city[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Notes  <br> <textarea class="form-control" id=""
                                           type="text" name="alarm_notes[]" placeholder="..." style="width: 100%;"></textarea>
                                   </div>
                                   <div class="col-lg-3 mt-1">
                                       Attachments:  <br> <input class="form-control" id="" name=""
                                           type="file" name="alarm_attachments[]" placeholder="..." style="width: 100%;">
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <button class="btn btn-danger btn-sm removeSignAccordion17 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
           </div>
       </div>
       `;

           $('#signatoryAccordion17').append(newSignAccordion17);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion17', function() {
           $(this).closest('.signaccordion-item17').remove();
       });
   });
</script>
<!-- Script for show data in table and update of fire fighting Services -->
<script>
   $(document).ready(function() {
       // Function to update summary table for signatory entries
       function updateSignatorySummaryTable17() {
           // Clear existing rows
           $('#signatorySummaryTable17 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item17').each(function(index) {
               var alarm_equipment = $(this).find('[name="alarm_equipment[]"]').val();
               var alarm_article_no = $(this).find('[name="alarm_article_no[]"]').val();
               var alarm_model = $(this).find('[name="alarm_model[]"]').val();

               // Check if any relevant data is entered
               if (alarm_equipment || alarm_article_no || alarm_model) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable17 tbody').append(`
               <tr>
                   <td>${index + 1}</td>
                   <td>${alarm_equipment}</td>
                   <td>${alarm_article_no}</td>
                   <td>${alarm_model}</td>
                   <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                   <!-- Add more columns as needed -->
               </tr>
           `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory16').on('click', function() {
           var signatoryEntryCount17 = $('#signatoryAccordion17 .signaccordion-item17').length + 1;

           var newSignatoryEntry17 = `
       <!-- Your existing signatory accordion HTML goes here -->
       `;
           console.log('Adding signatory entry:', signatoryEntryCount17);
           $('#signatoryAccordion17').append(newSignatoryEntry17);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable17').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable17();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button', function() {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item17').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion17', function() {
           $(this).closest('.signaccordion-item17').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable17();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory17').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<script>
   $(document).ready(function () {
       // Add More Button Click Event
       $('#addEmergency').on('click', function () {
           var EmergencyAccordionCount = $('#emergencyAccordion .emergencyaccordion-item').length + 1;

           var newEmergencyAccordion = `
               <div class="accordion-item emergencyaccordion-item" id="emergencyEntry${EmergencyAccordionCount}">
                   <h2 class="accordion-header" id="emergencyHeading${EmergencyAccordionCount}">
                       <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#emergencyCollapse${EmergencyAccordionCount}" aria-expanded="false" aria-controls="emergencyCollapse${EmergencyAccordionCount}">
                           Address Entry ${EmergencyAccordionCount}
                       </button>
                   </h2>
                   <div id="emergencyCollapse${EmergencyAccordionCount}" class="collapse" aria-labelledby="emergencyHeading${EmergencyAccordionCount}">
                       <div class="accordion-body">
                           <div class="row" id="emergencyServices_add_fields">
                               <div class="row">

                                   <div class="col-lg-6 spacing-left">
                                       <h5>Address</h5>
                                       <div class="row mb-1">
                                           <div class="col-lg-5 spacing-right">
                                               Office No <br> <input class="form-control" id="" name="office_no[]"
                                                   type="text" placeholder="..." style="width: 100%;">
                                           </div>
                                           <div class="col-lg-5 spacing-right">
                                               Floor <br> <input class="form-control" id="" name="floor[]"  type="text" placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                       </div>
                                       <div class="row mb-1">
                                           <div class="col-lg-5 spacing-right">
                                               Building <br> <input class="form-control" id=""
                                                   name="building[]" type="text" placeholder="..." style="width: 100%;">
                                           </div>
                                           <div class="col-lg-5 spacing-right">
                                               Block <br> <input class="form-control" id=""
                                                   type="text" name="block[]" placeholder="..." style="width: 100%;">
                                           </div>
                                       </div>
                                       <div class="row mb-1">
                                           <div class="col-lg-5 spacing-right">
                                               Area <br> <input class="form-control" id=""
                                                   type="text" name="area" placeholder="..." style="width: 100%;">
                                           </div>
                                           <div class="col-lg-5 spacing-right">
                                               City <br> <input class="form-control" id="head_office_cell_no" name="city[]" type="text"
                                                   placeholder="..." style="width: 100%;">
                                           </div>
                                       </div>
                                       <div class="row mb-1">
                                           <div class="col-lg-5 spacing-right">
                                               Photograph of Building <br> <input class="form-control" id="" name="builidng_attach[]" type="file"
                                                   placeholder="..." style="width: 100%;">
                                           </div>
                                           <div class="col-lg-5 spacing-right">
                                               Pin location <br> <input class="form-control" id="" name="pin_location"  type="text"
                                                   placeholder="..." style="width: 100%;">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-lg-6 spacing-right">
                                       <div class="row mb-1">
                                           <div class="col-lg-10 spacing-right">
                                               Company <br> <input class="form-control" type="text" name="company[]" placeholder="..." style="width: 100%;">
                                           </div>
                                       </div>
                                       <div class="row mb-1">
                                           <div class="col-lg-10 spacing-right">
                                               Email <br> <input class="form-control" type="text" name="email[]" placeholder="..." style="width: 100%;">
                                           </div>
                                       </div>
                                       <div class="row mb-1">
                                           <div class="col-lg-10 spacing-right">
                                               website <br> <input class="form-control" type="text" name="website[]" id="degree"
                                                   placeholder="..." style="width: 100%;">
                                           </div>
                                           <div class="col-lg-10 spacing-right">
                                               Attachments <br> <input class="form-control" type="file" name="attachments[]" id="degree"
                                                   placeholder="..." style="width: 100%;">
                                           </div>
                                       </div>
                                       <div class="row mb-1">
                                           <div class="col-lg-10 spacing-right">
                                               Notes & Remarks <br>
                                               <textarea style="width: 100%;" id="" name="notes[]" cols="15" rows="4"></textarea>
                                           </div>
                                       </div>
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
       $(document).on('click', '.removeEmergencyAccordion', function () {
           $(this).closest('.emergencyaccordion-item').remove();
       });
   });
</script>
<script>
   $(document).ready(function () {
       // Function to update summary table for emergency entries
       function updateEmergencySummaryTable() {
           // Clear existing rows
           $('#emergencySummaryTable tbody').empty();

           // Iterate through each emergency accordion item and update the summary table
           $('.emergencyaccordion-item').each(function (index) {
               var officeNo = $(this).find('[name="office_no[]"]').val();
               var floor = $(this).find('[name="floor[]"]').val();
               var building = $(this).find('[name="building[]"]').val();
               var block = $(this).find('[name="block[]"]').val();

               // Check if any relevant data is entered
               if (officeNo || floor || building || block) {
                   // Add a new row to the summary table
                   $('#emergencySummaryTable tbody').append(`
                       <tr>
                           <td>${index + 1}</td>
                           <td>${officeNo}</td>
                           <td>${floor}</td>
                           <td>${building}</td>
                           <td>${block}</td>
                           <td><button type="button" style="width:90%;" class="btn btn-primary view-emergency-button" data-index="${index}">View</button></td>
                           <!-- Add more columns as needed -->
                       </tr>
                   `);
               }
           });
       }

       // Update Emergency Table Button Click Event
       $('#updateEmergencyTable').on('click', function () {
           // Update the emergency summary table
           updateEmergencySummaryTable();
       });

       // View Emergency Button Click Event
       $(document).on('click', '.view-emergency-button', function () {
           var index = $(this).data('index');
           var accordionItem = $('.emergencyaccordion-item').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });
   });
</script>
<script>
   $(document).ready(function () {
       // Add More Button Click Event
       $('#addDepartment').on('click', function () {
           var DepartmentAccordionCount = $('#departmentAccordion .departmentaccordion-item').length + 1;

           var newDepartmentAccordion = `
               <div class="accordion-item departmentaccordion-item" id="departmentEntry${DepartmentAccordionCount}">
                   <h2 class="accordion-header" id="departmentHeading${DepartmentAccordionCount}">
                       <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#departmentCollapse${DepartmentAccordionCount}" aria-expanded="false" aria-controls="departmentCollapse${DepartmentAccordionCount}">
                           POC Details ${DepartmentAccordionCount}
                       </button>
                   </h2>
                   <div id="departmentCollapse${DepartmentAccordionCount}" class="collapse" aria-labelledby="departmentHeading${DepartmentAccordionCount}">
                       <div class="accordion-body">
                           <div class="row add-more">
                               <div class=" row main-content div" id="department_add_fields">
                                   <div class="row mb-2">
                                       <div class="col-lg-4 spacing-right">
                                           POC Name <br> <input class="form-control" name="req_poc_name[]" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-4 spacing-right spacing-left">
                                           POC Contact Number <br> <input class="form-control" name="req_poc_num[]" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-4 spacing-right spacing-left">
                                           POC Designation <br> <input class="form-control" name="req_poc_desig[]" type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-4 spacing-right spacing-right">
                                           Visiting Card (Front) <br> <input class="form-control" name="req_poc_visiting_front[]" id="inpFile1" type="file" placeholder="..."
                                               style="width: 100%;">

                                       </div>
                                       <div class="col-lg-4 spacing-right spacing-left">
                                           Visiting Card (Back) <br> <input class="form-control" name="req_poc_visiting_back[]" type="file" id="inpFile2" placeholder="..."
                                               style="width: 100%;">

                                       </div>
                                       <div class="col-lg-4 spacing-right spacing-left">
                                           Email <br> <input class="form-control" type="text" name="req_poc_email[]" placeholder="..." style="width: 97%;">
                                       </div>
                                       <div class="col-lg-4 mb-3 ">
                                           POC Organization Name: <br> <input class="form-control" name="req_poc_org_name[]" type="text" placeholder="..." style="width: 97%;">
                                       </div>
                                       <h5>POC Address</h5>

                                       <div class="col-lg-4 spacing-right">
                                           Office No <br> <input class="form-control" id="" name="req_poc_office_no[]"
                                               type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-4 spacing-right">
                                           Floor <br> <input class="form-control" id="" name="req_poc_floor[]" type="text" placeholder="..."
                                               style="width: 100%;">
                                       </div>


                                       <div class="col-lg-4 spacing-right">
                                           Building <br> <input class="form-control" id="" name="req_poc_building[]"
                                               type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-4 spacing-right">
                                           Block <br> <input class="form-control" id="" name="req_poc_block[]"
                                               type="text" placeholder="..." style="width: 100%;">
                                       </div>


                                       <div class="col-lg-4 spacing-right">
                                           Area <br> <input class="form-control" id="" name="req_poc_area[]"
                                               type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-4 spacing-right">
                                           City <br> <input class="form-control" id="" name="req_poc_city[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-4 spacing-right">
                                           Photograph of Building <br> <input class="form-control" id="" name="req_poc_building_attach[]" type="file"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <!-- <div class="col-lg-6 spacing-right">
                                               Email <br> <input class="form-control" id="" name="c_pin" type="text" placeholder="..." style="width: 100%;">
                                           </div> -->
                                       <div class="col-lg-4 spacing-right">
                                           Pin location <br> <input class="form-control" id="" name="req_poc_pin[]" type="text" placeholder="..."
                                               style="width: 100%;">
                                       </div>

                                       <!-- <div class="row mb-2">
                                               <div class="col-lg-6 spacing-left">
                                                   Website <br> <input class="form-control" id="" name="c_pin" type="text" placeholder="..." style="width: 100%;">
                                               </div>
                                               <div class="col-lg-6 spacing-left">
                                                   Google Map <br> <input class="form-control" id="" name="c_pin" type="text" placeholder="..." style="width: 100%;">
                                               </div>
                                       </div> -->
                                   </div>
                               </div>
                               </div>
                           </div>

                       </div>
                       <button class="btn btn-danger btn-sm removeDepartmentAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                   </div>
               </div>
           `;

           $('#departmentAccordion').append(newDepartmentAccordion);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeDepartmentAccordion', function () {
           $(this).closest('.departmentaccordion-item').remove();
       });
   });
</script>
<script>
   $(document).ready(function () {
       // Function to update summary table for department entries
       function updateDepartmentSummaryTable() {
           // Clear existing rows
           $('#departmentSummaryTable tbody').empty();

           // Iterate through each department accordion item and update the summary table
           $('.departmentaccordion-item').each(function (index) {
               var reqPocName = $(this).find('[name="req_poc_name[]"]').val();
               var reqPocNum = $(this).find('[name="req_poc_num[]"]').val();
               var reqPocEmail = $(this).find('[name="req_poc_email[]"]').val();
               var reqPocDesig = $(this).find('[name="req_poc_desig[]"]').val();

               // Check if any relevant data is entered
               if (reqPocName || reqPocNum || reqPocEmail || reqPocDesig) {
                   // Add a new row to the summary table
                   $('#departmentSummaryTable tbody').append(`
                       <tr>
                           <td>${index + 1}</td>
                           <td>${reqPocName}</td>
                           <td>${reqPocNum}</td>
                           <td>${reqPocEmail}</td>
                           <td>${reqPocDesig}</td>
                           <td><button type="button" style="width: 90%;" class="btn btn-primary view-department-button" data-index="${index}">View</button></td>
                           <!-- Add more columns as needed -->
                       </tr>
                   `);
               }
           });
       }

       // Add More Department Button Click Event
       $('#addDepartment').on('click', function () {
           var departmentEntryCount = $('#departmentAccordion .departmentaccordion-item').length + 1;

           var newDepartmentEntry = `
               <!-- Your existing department accordion HTML goes here -->
           `;
           console.log('Adding department entry:', departmentEntryCount);
           $('#departmentAccordion').append(newDepartmentEntry);
       });

       // Update Department Table Button Click Event
       $('#updateDepartmentTable').on('click', function () {
           // Update the department summary table
           updateDepartmentSummaryTable();
       });

       // View Department Button Click Event
       $(document).on('click', '.view-department-button', function () {
           var index = $(this).data('index');
           var accordionItem = $('.departmentaccordion-item').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Prevent the default behavior of the Add More Department button
       $('#addDepartment').on('click', function (event) {
           event.preventDefault();
       });
   });
</script>
<script>
   $(document).ready(function () {
       // Add More Button Click Event
       $('#addArmour').on('click', function () {
           var ArmourAccordionCount = $('#armourAccordion .armouraccordion-item').length + 1;

           var newArmourAccordion = `
               <div class="accordion-item armouraccordion-item" id="armourEntry${ArmourAccordionCount}">
                   <h2 class="accordion-header" id="armourHeading${ArmourAccordionCount}">
                       <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#armourCollapse${ArmourAccordionCount}" aria-expanded="false" aria-controls="armourCollapse${ArmourAccordionCount}">
                           RFQ Report ${ArmourAccordionCount}
                       </button>
                   </h2>
                   <div id="armourCollapse${ArmourAccordionCount}" class="collapse" aria-labelledby="armourHeading${ArmourAccordionCount}">
                       <div class="accordion-body">
                           <div id="cleaningInfo" class="row">
                               <div class="col-lg-4 spacing-right">
                                   Date: <br> <input class="form-control" type="date" placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right">
                                   Report Uploaded By (Name): <br> <input class="form-control" type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right">

                                   Report Uploaded By (Number): <br> <input class="form-control" type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   Report Uploaded By (Email): <br> <input class="form-control" type="email" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   Office ID: <br> <input class="form-control" type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   Department ID: <br> <input class="form-control" type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   Reporting Person Name: <br> <input class="form-control" type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   Reporting Person Number: <br> <input class="form-control" type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   Reporting Person Email: <br> <input class="form-control" type="email" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   Region Name: <br> <input class="form-control" type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   Region Code: <br> <input class="form-control" type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   GM: <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   DGM: <br> <input class="form-control" type="email" placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   CRO: <br> <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   Client/ Location Visited: <br> <input class="form-control" type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   Response By: <br> <input class="form-control" type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   Opening Date: <br> <input class="form-control" type="date" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   Status: <br> <input class="form-control" type="email" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   Remarks: <br> <input class="form-control" type="email" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">
                                   Notes <br>
                                   <textarea class="form-control" style="width: 100%;" id="" cols="15"
                                       rows="4"></textarea>
                               </div>
                               <div class="col-lg-4 spacing-right mt-2">

                                   Attachements: <br> <input class="form-control" type="file" placeholder="..."
                                       style="width: 100%;">
                               </div>
                           </div>

                       </div>
                       <button class="btn btn-danger btn-sm removeArmourAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                   </div>
               </div>
           `;

           $('#armourAccordion').append(newArmourAccordion);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeArmourAccordion', function () {
           $(this).closest('.armouraccordion-item').remove();
       });
   });
</script>
<!-- JavaScript code -->
<script>
   $(document).ready(function () {
       // Function to update summary table for armour entries
       function updateArmourSummaryTable() {
           // Clear existing rows
           $('#armourSummaryTable tbody').empty();

           // Iterate through each armour accordion item and update the summary table
           $('.armouraccordion-item').each(function (index) {
               var branchName = $(this).find('[name="arm_branch_name[]"]').val();
               var branchID = $(this).find('[name="arm_branch_id[]"]').val();
               var clientName = $(this).find('[name="arm_client_name[]"]').val();
               var signCustomer = $(this).find('[name="arm_sign_cus[]"]').val();

               // Check if any relevant data is entered
               if (branchName || branchID || clientName || signCustomer) {
                   // Add a new row to the summary table
                   $('#armourSummaryTable tbody').append(`
                       <tr>
                           <td>${index + 1}</td>
                           <td>${branchName}</td>
                           <td>${branchID}</td>
                           <td>${clientName}</td>
                           <td>${signCustomer}</td>
                           <td><button type="button" class="btn btn-primary view-armour-button" data-index="${index}">View</button></td>
                           <!-- Add more columns as needed -->
                       </tr>
                   `);
               }
           });
       }

       // Add More Armour Button Click Event
       $('#addArmour').on('click', function () {
           var armourEntryCount = $('#armourAccordion .armouraccordion-item').length + 1;

           var newArmourEntry = `
               <!-- Your existing armour accordion HTML goes here -->
           `;
           console.log('Adding armour entry:', armourEntryCount);
           $('#armourAccordion').append(newArmourEntry);
       });

       // Update Armour Table Button Click Event
       $('#updateArmourTable').on('click', function () {
           // Update the armour summary table
           updateArmourSummaryTable();
       });

       // View Armour Button Click Event
       $(document).on('click', '.view-armour-button', function () {
           var index = $(this).data('index');
           var accordionItem = $('.armouraccordion-item').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Prevent the default behavior of the Add More Armour button
       $('#addArmour').on('click', function (event) {
           event.preventDefault();
       });
   });
</script>
<script>
   $(document).ready(function () {
       // Add More Button Click Event
       $('#addIncident').on('click', function () {
           var IncidentAccordionCount = $('#incidentAccordion .incidentaccordion-item').length + 1;

           var newIncidentAccordion = `
               <div class="accordion-item incidentaccordion-item" id="incidentEntry${IncidentAccordionCount}">
                   <h2 class="accordion-header" id="incidentHeading${IncidentAccordionCount}">
                       <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#incidentCollapse${IncidentAccordionCount}" aria-expanded="false" aria-controls="incidentCollapse${IncidentAccordionCount}">
                           Automatic Traffic Barrier Entry ${IncidentAccordionCount}
                       </button>
                   </h2>
                   <div id="incidentCollapse${IncidentAccordionCount}" class="collapse" aria-labelledby="incidentHeading${IncidentAccordionCount}">
                       <div class="accordion-body">
                          <div class="row client-info">
                               <div class="row mb-2">
                                   <div class="col-lg-6 form-group spacing-left">
                                       Ownership Status :<br>
                                       <div class="input-group" style="width: 100%;">
                                           <select id="applicable_compliances" class="form-control mt-1" name="barrier_ownership[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                               <option value=""></option>
                                           </select>
                                           <div class="input-group-append" style="width: 30%;">
                                               <a href="">
                                                   <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                               </a>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-lg-6 form-group spacing-left">
                                       Rental :<br>
                                       <div class="input-group" style="width: 100%;">
                                           <select id="applicable_compliances" class="form-control mt-1"  name="barrier_rental[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                               <option value="">Monthly</option>
                                               <option value="">Dialy</option>
                                           </select>
                                           <div class="input-group-append" style="width: 30%;">
                                               <a href="">
                                                   <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                               </a>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-lg-6">
                                       No. of Days:  <br>
                                       <input class="form-control" type="text" name="barrier_no_of_days[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Model: <br> <input class="form-control" name="barrier_model[]" type="text"  placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Brand:  <br> <input class="form-control" name="barrier_brand[]" type="text"  placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Specifications: <br>
                                       <input class="form-control" type="text" name="barrier_specifications[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Quantity:  <br> <input class="form-control vldphone" type="text" name="barrier_quantity[]"  placeholder="..." style="width: 100%;">
                                       <div id="phoneError" class="phoneError" style="color: red"></div>
                                   </div>
                                   <div class="col-lg-6">
                                       Unit Price:  <br> <input class="form-control vldemail" name="barrier_unit[]" type="text"  placeholder="..." style="width: 100%;">
                                       <div id="emailError" class="emailError" style="color: red"></div>
                                   </div>
                                   <div class="col-lg-6">
                                       Total Price: <br>
                                       <input class="form-control" type="text" name="barrier_price[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <h5>Road Loop Detector: </h5>
                                   <div class="col-lg-6">
                                       Model:  <br> <input class="form-control" name="detector_model[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Brand: <br> <input class="form-control" name="detector_brand[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Specifications: <br>
                                       <textarea class="form-control" type="text" name="detector_specifications[]" placeholder="..." style="width: 100%;"></textarea>
                                   </div>
                                   <div class="col-lg-6">
                                       Quantity:  <br> <input class="form-control" name="detector_quantity[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Unit Price: <br> <input class="form-control" name="detector_unit[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Total Price: <br> <input class="form-control" name="detector_price[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <h5>Traffic Lights: </h5>
                                   <div class="col-lg-6">
                                       Model:  <br> <input class="form-control" name="traffic_model[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Brand: <br> <input class="form-control" name="traffic_brand[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Specifications: <br>
                                       <textarea class="form-control" type="text" name="traffic_specifications[]" placeholder="..." style="width: 100%;"></textarea>
                                   </div>
                                   <div class="col-lg-6">
                                       Quantity:  <br> <input class="form-control" name="traffic_quantity[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Unit Price: <br> <input class="form-control" name="traffic_unit[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Total Price: <br> <input class="form-control" name="traffic_price[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <h5>Breakaway Coupler: </h5>
                                   <div class="col-lg-6">
                                       Model:  <br> <input class="form-control" name="coupler_model[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Brand: <br> <input class="form-control" name="coupler_brand[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Specifications: <br>
                                       <textarea class="form-control" type="text" name="coupler_specification[]"  placeholder="..." style="width: 100%;"></textarea>
                                   </div>
                                   <div class="col-lg-6">
                                       Quantity:  <br> <input class="form-control" name="coupler_quantity[]"  type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Unit Price: <br> <input class="form-control" name="coupler_unit[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Total Price: <br> <input class="form-control" name="coupler_price[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <h5>E-Tag Long Range RFID Reader: </h5>
                                   <div class="col-lg-6">
                                       Model:  <br> <input class="form-control" name="tag_model[]"  type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Brand: <br> <input class="form-control" name="tag_brand[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Specifications: <br>
                                       <textarea class="form-control" type="text" name="tag_specifications[]" placeholder="..." style="width: 100%;"></textarea>
                                   </div>
                                   <div class="col-lg-6">
                                       Quantity:  <br> <input class="form-control"  name="tag_quantity[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Unit Price: <br> <input class="form-control" name="tag_unit[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Total Price: <br> <input class="form-control" name="tag_price[]"  type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <h5>Long Range E-Tags: </h5>
                                   <div class="col-lg-6">
                                       Model:  <br> <input class="form-control" name="Etag_model[]"  type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Brand: <br> <input class="form-control" name="Etag_brand[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Specifications: <br>
                                       <textarea class="form-control" type="text" name="Etag_specifications[]" placeholder="..." style="width: 100%;"></textarea>
                                   </div>
                                   <div class="col-lg-6">
                                       Quantity:  <br> <input class="form-control" name="Etag_quantity[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Unit Price: <br> <input class="form-control" name="Etag_unit[]"  type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Total Price: <br> <input class="form-control" name="Etag_price[]"  type="text" placeholder="..." style="width: 100%;">
                                   </div>

                                   <h5>Pole for E-Tag Reader: </h5>
                                   <div class="col-lg-6">
                                       Model:  <br> <input class="form-control" name="pole_model[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Brand: <br> <input class="form-control" name="pole_brand[]"  type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Specifications: <br>
                                       <textarea class="form-control" name="pole_specifications[]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                   </div>
                                   <div class="col-lg-6">
                                       Quantity:  <br> <input class="form-control" name="pole_quantity[]"  type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Unit Price: <br> <input class="form-control" name="pole_unit[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Total Price: <br> <input class="form-control" name="pole_price[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <h5>Distribution Box with Circuit Breaker: </h5>
                                   <div class="col-lg-6">
                                       Model:  <br> <input class="form-control" name="breaker_model[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Brand: <br> <input class="form-control" type="text" name="breaker_brand[]" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Specifications: <br>
                                       <textarea class="form-control" type="text" name="breaker_specifications[]" placeholder="..." style="width: 100%;"></textarea>
                                   </div>
                                   <div class="col-lg-6">
                                       Quantity:  <br> <input class="form-control" name="breaker_quantity[]"  type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Unit Price: <br> <input class="form-control"  name="breaker_unit[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6">
                                       Total Price: <br> <input class="form-control" name="breaker_price[]" type="text" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 form-group">
                                       Installation, Testing & Commissioning :<br>
                                       <div class="input-group" style="width: 100%;">
                                           <select id="applicable_compliances" class="form-control mt-1" name="barrier_installation[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                               <option value="">Yes</option>
                                               <option value="">No</option>
                                           </select>
                                       </div>
                                   </div>
                                  <div class="col-lg-6 form-group">
                                       Installation, Testing & Commissioning Cost:<br>
                                       <div class="input-group" style="width: 100%;">
                                           <select id="applicable_compliances" class="form-control mt-1" name="barrier_installationss[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                               <option value="">Yes</option>
                                               <option value="">No</option>
                                           </select>
                                       </div>
                                   </div>
                                   <div class="col-lg-6 form-group">
                                       Training of Customer Staff Required :<br>
                                       <div class="input-group" style="width: 100%;">
                                           <select id="applicable_compliances" class="form-control mt-1" name="barrier_training[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                               <option value="">Yes</option>
                                               <option value="">No</option>
                                           </select>
                                       </div>
                                   </div>
                                   <div class="col-lg-6">
                                       Upload Training Material : <br> <input class="form-control" name="barrier_upload_training[]" type="file" placeholder="..." style="width: 100%;">
                                   </div>
                                   <div class="col-lg-6 form-group">
                                       Delivery Required :<br>
                                       <div class="input-group" style="width: 100%;">
                                           <select id="applicable_compliances" class="form-control mt-1" name="barrier_delivery[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                               <option value="">Yes</option>
                                               <option value="">No</option>
                                           </select>
                                       </div>
                                   </div>
                                   <div class="col-lg-6 mt-2 ml-3 ">
                                       <input class="form-check-input" name="barrier_del_loc[]" type="checkbox"
                                           id="delievery_location_check_3">
                                       <label class="form-check-label"
                                           for="check">Delievery Location
                                       </label>
                                   </div>
                                   <div class="container "
                                       id="delievery_location_form_3"
                                       style="display: none;">
                                       <div class="row row-cols-2">
                                           <div class="col-lg-6 mt-1">
                                               Office No <br> <input
                                                   class="form-control" id=""
                                                   type="text" name="barrier_office_no[]" placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Floor <br> <input class="form-control"
                                                   id="" name="barrier_floor[]"  type="text"
                                                   placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Building <br> <input
                                                   class="form-control" id=""
                                                   type="text" name="barrier_building[]" placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Block <br> <input class="form-control"
                                                   id="" name="barrier_block[]"  type="text"
                                                   placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Area <br> <input class="form-control"
                                                   id="" name="barrier_area[]" type="text"
                                                   placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               City <br> <input class="form-control"
                                                   id="" name="barrier_city[]"  type="text"
                                                   placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Photograph of Building <br> <input
                                                   class="form-control" id=""
                                                   type="file" name="barrier_photo_building[]" placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Pin location <br> <input
                                                   class="form-control" id=""
                                                   type="text" name="barrier_pin_loc[]" placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-lg-6 mt-2 ml-3 ">
                                       <input class="form-check-input" name="barrier_ins_loc[]" type="checkbox"
                                           id="installation_location_check_3">
                                       <label class="form-check-label"
                                           for="check">Installation Location
                                       </label>
                                   </div>
                                   <div class="container "
                                       id="installation_location_form_3"
                                       style="display: none;">
                                       <div class="row row-cols-2">
                                           <div class="col-lg-6 mt-1">
                                               Office No <br> <input
                                                   class="form-control" id=""
                                                   type="text" name="barrier_ins_office[]" placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Floor <br> <input class="form-control"
                                                   id=""  name="barrier_ins_floor[]" type="text"
                                                   placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Building <br> <input
                                                   class="form-control" id=""
                                                   type="text"  name="barrier_ins_building[]" placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Block <br> <input class="form-control"
                                                   id=""  name="barrier_ins_block[]"  type="text"
                                                   placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Area <br> <input class="form-control"
                                                   id=""  name="barrier_ins_area[]"  type="text"
                                                   placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               City <br> <input class="form-control"
                                                   id=""  name="barrier_ins_city[]" type="text"
                                                   placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Photograph of Building <br> <input
                                                   class="form-control" id=""
                                                   type="file"  name="barrier_ins_photo_building[]" placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                           <div class="col-lg-6 mt-1">
                                               Pin location <br> <input
                                                   class="form-control" id=""
                                                   type="text"  name="barrier_ins_pin_loc[]" placeholder="..."
                                                   style="width: 100%;">
                                           </div>
                                       </div>
                                   </div>
                               </div>

                               <div class="row mb-2">
                                   <div class="col-lg-6 mt-2">
                                       Attachements <br> <input class="form-control" type="file"  name="barrier_attachments[]"  placeholder="..." style="width: 100%;" multiple>
                                   </div>
                                   <div class="col-lg-6">
                                       Notes <br>
                                       <textarea id="w3review10" onclick="moveCursorToStart10()"  name="barrier_notes[]" oninput="trimSpaces10()" class="form-control"  rows="2" cols="38">
                                       </textarea>
                                   </div>
                               </div>

                           </div>
                       </div>
                       <button class="btn btn-danger btn-sm removeIncidentAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                   </div>
               </div>
           `;

           $('#incidentAccordion').append(newIncidentAccordion);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeIncidentAccordion', function () {
           $(this).closest('.incidentaccordion-item').remove();
       });
   });
</script>
<script>
   $(document).ready(function () {
       // Function to update incident summary table for incident entries
       function updateIncidentSummaryTable() {
           // Clear existing rows
           $('#incidentSummaryTable tbody').empty();

           // Iterate through each incident accordion item and update the summary table
           $('.incidentaccordion-item').each(function (index) {
               var barrier_rental = $(this).find('[name="barrier_rental[]"]').val();
               var barrier_no_of_days = $(this).find('[name="barrier_no_of_days[]"]').val();
               var barrier_model = $(this).find('[name="barrier_model[]"]').val();
               var barrier_brand = $(this).find('[name="barrier_brand[]"]').val();

               // Check if any relevant data is entered
               if (barrier_rental || barrier_no_of_days || barrier_model || barrier_brand) {
                   // Add a new row to the summary table
                   $('#incidentSummaryTable tbody').append(`
                       <tr>
                           <td>${index + 1}</td>
                           <td>${barrier_rental}</td>
                           <td>${barrier_no_of_days}</td>
                           <td>${barrier_model}</td>
                           <td>${barrier_brand}</td>
                           <td><button type="button" class="btn btn-primary view-incident-button" data-index="${index}">View</button></td>
                           <!-- Add more columns as needed -->
                       </tr>
                   `);
               }
           });
       }

       // Add More Incident Button Click Event
       $('#addIncident').on('click', function () {
           var incidentEntryCount = $('#incidentAccordion .incidentaccordion-item').length + 1;

           var newIncidentEntry = `
               <!-- Your existing incident accordion HTML goes here -->
           `;
           console.log('Adding incident entry:', incidentEntryCount);
           $('#incidentAccordion').append(newIncidentEntry);
       });

       // Update Incident Table Button Click Event
       $('#updateIncidentTable').on('click', function () {
           // Update the incident summary table
           updateIncidentSummaryTable();
       });

       // View Incident Button Click Event
       $(document).on('click', '.view-incident-button', function () {
           var index = $(this).data('index');
           var accordionItem = $('.incidentaccordion-item').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Prevent the default behavior of the Add More Incident button
       $('#addIncident').on('click', function (event) {
           event.preventDefault();
       });
   });
</script>
<!-- Script for add more secuirty equipment Services -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory8').on('click', function() {
           var SignatoryAccordionCount8 = $('#signatoryAccordion8 .signaccordion-item8').length + 1;
           var newSignAccordion8 = `
       <div class="accordion-item signaccordion-item8" id="signatoryEntry8${SignatoryAccordionCount8}">
           <h2 class="accordion-header" id="signatoryHeading8${SignatoryAccordionCount8}">
               <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse8${SignatoryAccordionCount8}" aria-expanded="false" aria-controls="signatoryCollapse8${SignatoryAccordionCount8}">
               Security Equipment Entry ${SignatoryAccordionCount8}
               </button>
           </h2>
           <div id="signatoryCollapse8${SignatoryAccordionCount8}" class="collapse" aria-labelledby="signatoryHeading8${SignatoryAccordionCount8}">
               <div class="accordion-body">
                   <div class="row mb-2" id="signatoryDetailsContainer8">
                       <!-- Your content for entry goes here -->
                       <div class="col-lg-6 form-group spacing-left">
                           Category:<br>
                           <div class="input-group" style="width: 100%;">
                               <select id="applicable_compliances" class="form-control mt-1" name="equipment_category[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                   <option value=""></option>
                                   <option value="Walk through Gate">Walk through
                                       Gate</option>
                                   <option value="Metal Detector">Metal Detector
                                   </option>
                                   <option value="Barriers">Barriers</option>
                                   <option value="Traffic Equipment">Traffic
                                       Equipment</option>
                               </select>
                               <div class="input-group-append" style="width: 30%;">
                                   <a href="">
                                       <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                   </a>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6 spacing-right">
                           Ownership Status : <br>
                           <select class="form-control mt-1" name="equipment_ownership[]"
                               style="width: 100%;">
                               <option value="Company Owned">Company Owned
                               </option>
                               <option value="OutSourced">OutSourced</option>
                           </select>
                       </div>

                       <div class="col-lg-6 spacing-right mt-1">
                           Rental : <br>
                           <select id="leadcategory" class="form-control mt-1" name="equipment_rental[]"
                               style="width: 100%;">
                               <option value="Daily">Daily</option>
                               <option value="Monthly">Monthly</option>
                           </select>
                       </div>
                       <div class="col-lg-6 mt-1">
                           No of days Equipment Required for <br> <input
                               class="form-control" type="text" name="equipment_no_of_days[]"
                               placeholder="..." style="width: 100%;">
                       </div>
                       <div class="col-lg-6 mt-1">
                           Quantity <br> <input class="form-control"
                               type="text" placeholder="..." name="equipment_quality[]"
                               style="width: 100%;">
                       </div>
                       <div class="col-lg-6 spacing-right mt-1">
                           Training for Customer's Staff Required : <br>
                           <select id="leadcategory" name="equipment_training[]" class="form-control mt-1"
                               style="width: 100%;">
                               <option value="">Yes</option>
                               <option value="">No</option>
                           </select>
                       </div>
                       <div class="col-lg-6 spacing-right">
                           Delivery Required : <br>
                           <select id="leadcategory" name="equipment_delivery[]" class="form-control mt-1"
                               style="width: 100%;">
                               <option value="">Yes</option>
                               <option value="">No</option>
                           </select>
                       </div>
                       <div class="col-lg-6 mt-2 ml-3 ">
                           <input class="form-check-input" name="equipment_dilevery_loc[]" type="checkbox"
                               id="delievery_location_check_1">
                           <label class="form-check-label"
                               for="check">Delievery Location </label>
                       </div>
                       <div class="container " id="delievery_location_form_1"
                           style="display: none;">
                           <div class="row row-cols-2">
                               <div class="col-lg-6 mt-1">
                                   Office No <br> <input class="form-control"
                                       id=""  type="text" name="equipment_del_office_no[]"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Floor <br> <input class="form-control" id=""
                                       type="text" placeholder="..." name="equipment_del_floor[]"
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Building <br> <input class="form-control"
                                       id=""  type="text" name="equipment_del_building[]"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Block <br> <input class="form-control" id=""
                                       type="text" placeholder="..." name="equipment_del_block[]"
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Area <br> <input class="form-control" id=""
                                       type="text" placeholder="..." name="equipment_del_area[]"
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   City <br> <input class="form-control" name="equipment_del_city[]" id=""
                                       type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Photograph of Building <br> <input
                                       class="form-control" id="" name="equipment_del_photo_building[]"
                                       type="file" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Pin location <br> <input
                                       class="form-control" id="" name="equipment_del_pin_loc[]"
                                       type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                           </div>
                       </div>

                       <div class="col-lg-6 spacing-right">
                           Installation Required : <br>
                           <select id="leadcategory" name="equipment_installation_req[]" class="form-control mt-1"
                               style="width: 100%;">
                               <option value="">Yes</option>
                               <option value="">No</option>
                           </select>
                       </div>
                       <div class="col-lg-6 mt-2 ml-3 ">
                           <input class="form-check-input" name="equipment_ins_loc[]" type="checkbox"
                               id="installation_location_check_1">
                           <label class="form-check-label"
                               for="check">Installation Location
                           </label>
                       </div>

                       <div class="container "
                           id="installation_location_form_1"
                           style="display: none;">
                           <div class="row row-cols-2">
                               <div class="col-lg-6 mt-1">
                                   Office No <br> <input class="form-control"
                                       id="" name="equipment_ins_office_no[]" type="text"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Floor <br> <input class="form-control" id=""
                                       type="text" name="equipment_ins_floor[]" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Building <br> <input class="form-control"
                                       id="" type="text" name="equipment_ins_building[]"
                                       placeholder="..." style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Block <br> <input class="form-control" id=""
                                       type="text" placeholder="..." name="equipment_ins_block[]"
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Area <br> <input class="form-control" id=""
                                       type="text" placeholder="..." name="equipment_ins_area[]"
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   City <br> <input class="form-control" name="equipment_ins_city[]" id=""
                                       type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Photograph of Building <br> <input
                                       class="form-control" name="equipment_ins_photo_building[]" id=""
                                       type="file" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Pin location <br> <input
                                       class="form-control" name="equipment_ins_pin_location[]" id=""
                                       type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6">
                           Notes <br> <textarea class="form-control mt-1"
                               id="head_office_name" name="equipment_notes[]"
                               type="text" placeholder="..."
                               style="width: 100%;"></textarea>
                       </div>
                       <div class="col-lg-6">
                           Attachments <br> <input class="form-control mt-1"
                               id="head_office_email" name="equipment_attachment[]"
                               type="file" placeholder="..."
                               style="width: 100%;">
                       </div>
                   </div>
               </div>
               <button class="btn btn-danger btn-sm removeSignAccordion8 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
           </div>
       </div>
       `;

           $('#signatoryAccordion8').append(newSignAccordion8);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion8', function() {
           $(this).closest('.signaccordion-item8').remove();
       });
   });
</script>
<!-- Script for show data in table and update of secuirty equipment Services -->
<Script>
   $(document).ready(function() {
       // Function to update summary table for signatory entries
       function updateSignatorySummaryTable8() {
           // Clear existing rows
           $('#signatorySummaryTable8 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item8').each(function(index) {
               var equipment_category = $(this).find('[name="equipment_category[]"]').val();
               var equipment_ownership = $(this).find('[name="equipment_ownership[]"]').val();
               var equipment_rental = $(this).find('[name="rentalFor[]"]').val();

               // Check if any relevant data is entered
               if (equipment_category || equipment_ownership || equipment_rental) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable8 tbody').append(`
               <tr>
                   <td>${index + 1}</td>
                   <td>${equipment_category}</td>
                   <td>${equipment_ownership}</td>
                   <td>${equipment_rental}</td>
                   <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                   <!-- Add more columns as needed -->
               </tr>
           `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory8').on('click', function() {
           var signatoryEntryCount8 = $('#signatoryAccordion8 .signaccordion-item8').length + 1;

           var newSignatoryEntry8 = `
       <!-- Your existing signatory accordion HTML goes here -->
       `;
           console.log('Adding signatory entry:', signatoryEntryCount8);
           $('#signatoryAccordion8').append(newSignatoryEntry8);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable8').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable8();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button', function() {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item8').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion8', function() {
           $(this).closest('.signaccordion-item8').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable8();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory8').on('click', function(event) {
           event.preventDefault();
       });
   });
</Script>
<!-- Script for add more Electronic and web Services (CCTV) -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory9').on('click', function() {
           var SignatoryAccordionCount9 = $('#signatoryAccordion9 .signaccordion-item9').length + 1;

           var newSignAccordion9 = `
       <div class="accordion-item signaccordion-item9" id="signatoryEntry9${SignatoryAccordionCount9}">
           <h2 class="accordion-header" id="signatoryHeading9${SignatoryAccordionCount9}">
               <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse9${SignatoryAccordionCount9}" aria-expanded="false" aria-controls="signatoryCollapse9${SignatoryAccordionCount9}">
                   CCTV Entry ${SignatoryAccordionCount9}
               </button>
           </h2>
           <div id="signatoryCollapse9${SignatoryAccordionCount9}" class="collapse" aria-labelledby="signatoryHeading9${SignatoryAccordionCount9}">
               <div class="accordion-body">
                   <div class="row mb-2" id="signatoryDetailsContainer9">
                       <!-- Your content for entry goes here -->
                       <div class="col-lg-6 form-group spacing-left">
                           Category:<br>
                           <div class="input-group" style="width: 100%;">
                               <select id="applicable_compliances" class="form-control mt-1" name="cctv_category[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                   <option value=""></option>
                                   <option
                                   value="CCTV & Time Attendance Machine">
                                   CCTV & Time
                                   Attendance Machine</option>
                               <option value="Supporting Equipment">
                                   Supporting Equipment
                               </option>
                               <option value="Web Surveillance Services">
                                   Web Surveillance
                                   Services</option>
                               </select>
                               <div class="input-group-append" style="width: 30%;">
                                   <a href="">
                                       <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                   </a>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6 form-group spacing-left">
                           CCTV Brand:<br>
                           <div class="input-group" style="width: 100%;">
                               <select id="applicable_compliances" class="form-control mt-1" name="cctv_brand[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                   <option value=""></option>
                               </select>
                               <div class="input-group-append" style="width: 30%;">
                                   <a href="">
                                       <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                   </a>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6 form-group spacing-left">
                           Model :<br>
                           <div class="input-group" style="width: 100%;">
                               <select id="applicable_compliances" class="form-control mt-1" name="cctv_model[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                   <option value=""></option>
                               </select>
                               <div class="input-group-append" style="width: 30%;">
                                   <a href="">
                                       <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                   </a>
                               </div>
                           </div>
                       </div>

                       <div class="col-lg-6 mt-1">
                           Year of Manufacturing <br> <input class="form-control"
                               type="text" placeholder="..." name="cctv_year_of_manu[]"
                               style="width: 100%;">
                       </div>

                       <div class="col-lg-6 form-group spacing-left">
                           Pixels :<br>
                           <div class="input-group" style="width: 100%;">
                               <select id="applicable_compliances" class="form-control mt-1" name="cctv_pixels[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                   <option value=""></option>
                               </select>
                               <div class="input-group-append" style="width: 30%;">
                                   <a href="">
                                       <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                   </a>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6 mt-1 spacing-right">
                           Night Vision : <br>
                           <select id="leadcategory"
                               class="form-control mt-1" name="cctv_night_vision[]"
                               style="width: 100%;">
                               <option value="">Yes</option>
                               <option value="">No</option>
                           </select>
                       </div>
                       <div class="col-lg-6 form-group spacing-left">
                           CCTV Type :<br>
                           <div class="input-group" style="width: 100%;">
                               <select id="applicable_compliances" class="form-control mt-1" name="cctv_type[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                   <option value=""></option>
                               </select>
                               <div class="input-group-append" style="width: 30%;">
                                   <a href="">
                                       <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                   </a>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6 form-group spacing-left">
                           Backup Storage :<br>
                           <div class="input-group" style="width: 100%;">
                               <select id="applicable_compliances" class="form-control mt-1" name="cctv_backup[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                   <option value=""></option>
                               </select>
                               <div class="input-group-append" style="width: 30%;">
                                   <a href="">
                                       <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                   </a>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6 form-group spacing-left">
                           NVR :<br>
                           <div class="input-group" style="width: 100%;">
                               <select id="applicable_compliances" class="form-control mt-1" name="cctv_nvr[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                   <option value=""></option>
                               </select>
                               <div class="input-group-append" style="width: 30%;">
                                   <a href="">
                                       <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                   </a>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6 mt-1 spacing-right">
                           Power Cable : <br>
                           <select id="leadcategory" name="cctv_powercable[]"
                               class="form-control mt-1"
                               style="width: 100%;">
                               <option value="">Yes</option>
                               <option value="">No</option>
                           </select>
                       </div>
                       <div class="col-lg-6 form-group spacing-left">
                           POE Switch :<br>
                           <div class="input-group" style="width: 100%;">
                               <select id="applicable_compliances" class="form-control mt-1" name="cctv_poe[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                   <option value=""></option>
                               </select>
                               <div class="input-group-append" style="width: 30%;">
                                   <a href="">
                                       <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                   </a>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6 mt-1">
                           Quantity <br> <input class="form-control"
                               type="text" placeholder="..." name="cctv_quantity[]"
                               style="width: 100%;">
                       </div>
                       <div class="col-lg-6 mt-1">
                           Monthly Maintenance Cost <br> <input
                               class="form-control" type="text" name="cctv_monthly_cost[]"
                               placeholder="..." style="width: 100%;">
                       </div>
                       <div class="col-lg-6 mt-1 spacing-right">
                           Required on : <br>
                           <select id="leadcategory"
                               class="form-control mt-1" name="cctv_req_on[]"
                               style="width: 100%;">
                               <option value="">Daily Basis</option>
                               <option value="">Monthly Basis</option>
                           </select>
                       </div>
                       <div class="col-lg-6 mt-1">
                           No of days Equipment Required for <br> <input
                               class="form-control" type="text" name="cctv_no_of_days[]"
                               placeholder="..." style="width: 100%;">
                       </div>
                       <div class="col-lg-6 mt-2 ml-3 ">
                           <input class="form-check-input" name="cctv_del_loc[]" type="checkbox"
                               id="delievery_location_check_2">
                           <label class="form-check-label"
                               for="check">Delievery Location
                           </label>
                       </div>
                       <div class="container "
                           id="delievery_location_form_2"
                           style="display: none;">
                           <div class="row row-cols-2">
                               <div class="col-lg-6 mt-1">
                                   Office No <br> <input
                                       class="form-control" id="" name="cctv_del_office[]"
                                       type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Floor <br> <input class="form-control"
                                       id=""  type="text" name="cctv_del_floor[]"
                                       placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Building <br> <input
                                       class="form-control" id="" name="cctv_del_building[]"
                                       type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Block <br> <input class="form-control"
                                       id=""  type="text" name="cctv_del_block[]"
                                       placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Area <br> <input class="form-control"
                                       id=""  type="text" name="cctv_del_area[]"
                                       placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   City <br> <input class="form-control"
                                       id=""  type="text" name="cctv_del_city[]"
                                       placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Photograph of Building <br> <input
                                       class="form-control" id="" name="cctv_del_photo_building[]"
                                       type="file" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Pin location <br> <input
                                       class="form-control" id="" name="cctv_del_pin_loc[]"
                                       type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6 mt-2 ml-3 ">
                           <input class="form-check-input" name="cctv_ins_loc[]" type="checkbox"
                               id="installation_location_check_2">
                           <label class="form-check-label"
                               for="check">Installation Location
                           </label>
                       </div>
                       <div class="container "
                           id="installation_location_form_2"
                           style="display: none;">
                           <div class="row row-cols-2">
                               <div class="col-lg-6 mt-1">
                                   Office No <br> <input
                                       class="form-control" name="cctv_ins_office[]"  id=""
                                       type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Floor <br> <input class="form-control"
                                       id=""  type="text" name="cctv_ins_floor[]"
                                       placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Building <br> <input
                                       class="form-control" id=""
                                       type="text" placeholder="..." name="cctv_ins_building[]"
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Block <br> <input class="form-control" name="cctv_ins_block[]"
                                       id="" type="text"
                                       placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Area <br> <input class="form-control" name="cctv_ins_area[]"
                                       id="" type="text"
                                       placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   City <br> <input class="form-control"
                                       id=""  type="text" name="cctv_ins_city[]"
                                       placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Photograph of Building <br> <input
                                       class="form-control" id="" name="cctv_ins_photo_building[]"
                                       type="file" placeholder="..."
                                       style="width: 100%;">
                               </div>
                               <div class="col-lg-6 mt-1">
                                   Pin location <br> <input
                                       class="form-control" id="" name="cctv_ins_pin_loc[]"
                                       type="text" placeholder="..."
                                       style="width: 100%;">
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6 spacing-right">
                           Maintenance Required : <br>
                           <select id="leadcategory"
                               class="form-control mt-1" name="cctv_maintenance_req[]"
                               style="width: 100%;">
                               <option value="">Yes</option>
                               <option value="">No</option>
                           </select>
                       </div>
                       <div class="col-lg-6 spacing-right">
                           Maintenance Required : <br>
                           <select id="leadcategory"
                               class="form-control mt-1" name="cctv_maintenance_req_basis[]"
                               style="width: 100%;">
                               <option value="">Monthly Maintenance
                               </option>
                               <option value="">Annually Maintenance
                               </option>
                           </select>
                       </div>
                       <div class="col-lg-6">
                           Notes <br> <textarea class="form-control mt-1"
                               id="head_office_name" name="cctv_notes[]"
                               type="text" placeholder="..."
                               style="width: 100%;"></textarea>
                       </div>
                       <div class="col-lg-6">
                           Attachments <br> <input
                               class="form-control mt-1"
                               id="head_office_email" name="cctv_attachments[]"
                               type="file" placeholder="..."
                               style="width: 100%;">
                       </div>
                   </div>
               </div>
               <button class="btn btn-danger btn-sm removeSignAccordion9 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
           </div>
       </div>
       `;

           $('#signatoryAccordion9').append(newSignAccordion9);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion9', function() {
           $(this).closest('.signaccordion-item9').remove();
       });
   });
</script>
<!-- Script for show data in table and update of electronic and web Services (CCTV) -->
<Script>
   $(document).ready(function() {
       // Function to update summary table for signatory entries
       function updateSignatorySummaryTable9() {
           // Clear existing rows
           $('#signatorySummaryTable9 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item9').each(function(index) {
               var cctv_category = $(this).find('[name="cctv_category[]"]').val();
               var cctv_brand = $(this).find('[name="cctv_brand[]"]').val();
               var cctv_night_vision = $(this).find('[name="cctv_night_vision[]"]').val();

               // Check if any relevant data is entered
               if (cctv_category || cctv_brand || cctv_night_vision) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable9 tbody').append(`
               <tr>
                   <td>${index + 1}</td>
                   <td>${cctv_category}</td>
                   <td>${cctv_brand}</td>
                   <td>${cctv_night_vision}</td>
                   <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                   <!-- Add more columns as needed -->
               </tr>
           `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory9').on('click', function() {
           var signatoryEntryCount9 = $('#signatoryAccordion9 .signaccordion-item9').length + 1;

           var newSignatoryEntry9 = `
       <!-- Your existing signatory accordion HTML goes here -->
       `;
           console.log('Adding signatory entry:', signatoryEntryCount9);
           $('#signatoryAccordion9').append(newSignatoryEntry9);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable9').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable9();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button', function() {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item9').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion9', function() {
           $(this).closest('.signaccordion-item9').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable9();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory9').on('click', function(event) {
           event.preventDefault();
       });
   });
</Script>
<!-- Script for add more Electronic and web Services (Time Attendance Machine) -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory9_1').on('click', function() {
           var SignatoryAccordionCount9_1 = $('#signatoryAccordion9_1 .signaccordion-item9_1').length +
               1;

           var newSignAccordion9_1 = `
       <div class="accordion-item signaccordion-item9_1" id="signatoryEntry9_1${SignatoryAccordionCount9_1}">
           <h2 class="accordion-header" id="signatoryHeading9_1${SignatoryAccordionCount9_1}">
               <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse9_1${SignatoryAccordionCount9_1}" aria-expanded="false" aria-controls="signatoryCollapse9_1${SignatoryAccordionCount9_1}">
               Attendence Machine Entry ${SignatoryAccordionCount9_1}
               </button>
           </h2>
           <div id="signatoryCollapse9_1${SignatoryAccordionCount9_1}" class="collapse" aria-labelledby="signatoryHeading9_1${SignatoryAccordionCount9_1}">
               <div class="accordion-body">
                   <div class="row mb-2" id="signatoryDetailsContainer9_1">
                       <!-- Your content for entry goes here -->
                       <div class="col-lg-6 mt-1">
                           Category <br> <input class="form-control"
                               type="text" name="attendance_category[]" placeholder="..."

                               style="width: 100%;">
                       </div>
                       <div class="col-lg-6 mt-1">
                           Rate per Unit <br> <input class="form-control"
                               type="text" name="attendance_rate[]" placeholder="..."
                               style="width: 100%;">
                       </div>
                       <div class="col-lg-6 mt-1">
                           Total Rate <br> <input class="form-control"
                               type="text" name="attendance_total_rate[]" placeholder="..."
                               style="width: 100%;">
                       </div>
                       <div class="col-lg-6 mt-1">
                           Specifications Sheet: <br> <input class="form-control"
                               type="file" name="attendance_sheet[]" placeholder="..."
                               style="width: 100%;">
                       </div>
                       <div class="col-lg-6 mt-1">
                           Specifications: <br> <textarea class="form-control"
                               type="file" name="attendance_specifications[]" placeholder="..."
                           style="width: 100%;"></textarea>
                       </div>
                       <div class="col-lg-6 mt-1">
                           Notes : <br> <textarea class="form-control"
                               type="file" name="attendance_notes[]" placeholder="..."
                               style="width: 100%;"></textarea>
                       </div>
                       <div class="col-lg-6 mt-1">
                           Attachment : <br> <input class="form-control"
                               type="file" name="attendance_attachment[]" placeholder="..."
                               style="width: 100%;">
                       </div>
                   </div>
               </div>
               <button class="btn btn-danger btn-sm removeSignAccordion9_1 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
           </div>
       </div>
       `;

           $('#signatoryAccordion9_1').append(newSignAccordion9_1);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion9_1', function() {
           $(this).closest('.signaccordion-item9_1').remove();
       });
   });
</script>
<!-- Script for show data in table and update of electronic and web Services (Time Attendance Machine) -->
<script>
   $(document).ready(function() {
       // Function to update summary table for signatory entries
       function updateSignatorySummaryTable9_1() {
           // Clear existing rows
           $('#signatorySummaryTable9_1 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item9_1').each(function(index) {
               var attendance_category = $(this).find('[name="attendance_category[]"]').val();
               var attendance_rate = $(this).find('[name="attendance_rate[]"]').val();

               // Check if any relevant data is entered
               if (attendance_category || attendance_rate) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable9_1 tbody').append(`
               <tr>
                   <td>${index + 1}</td>
                   <td>${attendance_category}</td>
                   <td>${attendance_rate}</td>
                   <td><button type="button" class="btn btn-primary view-signatory-button9_1" style="width: 100%" data-index="${index}">View</button></td>
               </tr>
           `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory9_1').on('click', function() {
           var signatoryEntryCount9_1 = $('#signatoryAccordion9_1 .signaccordion-item9_1').length + 1;

           var newSignatoryEntry9_1 = `
       <!-- Your existing signatory accordion HTML goes here, adjusted for 9_1 -->
       `;
           console.log('Adding signatory entry:', signatoryEntryCount9_1);
           $('#signatoryAccordion9_1').append(newSignatoryEntry9_1);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable9_1').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable9_1();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button9_1', function() {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item9_1').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion9_1', function() {
           $(this).closest('.signaccordion-item9_1').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable9_1();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory9_1').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<!-- Script for add more Electronic and web Services (Web Surveillance Solution) -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory9_2').on('click', function() {
           var SignatoryAccordionCount9_2 = $('#signatoryAccordion9_2 .signaccordion-item9_2').length +
               1;

           var newSignAccordion9_2 = `
       <div class="accordion-item signaccordion-item9_2" id="signatoryEntry9_2${SignatoryAccordionCount9_2}">
           <h2 class="accordion-header" id="signatoryHeading9_2${SignatoryAccordionCount9_2}">
               <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse9_2${SignatoryAccordionCount9_2}" aria-expanded="false" aria-controls="signatoryCollapse9_2${SignatoryAccordionCount9_2}">
               Web Surveillance Entry ${SignatoryAccordionCount9_2}
               </button>
           </h2>
           <div id="signatoryCollapse9_2${SignatoryAccordionCount9_2}" class="collapse" aria-labelledby="signatoryHeading9_2${SignatoryAccordionCount9_2}">
               <div class="accordion-body">
                   <div class="row mb-2" id="signatoryDetailsContainer9_2">
                       <!-- Your content for entry goes here -->
                       <div class="col-lg-6 mt-1">
                           Category <br> <input class="form-control"
                               type="text" placeholder="..."

                               style="width: 100%;">
                       </div>
                       <div class="col-lg-6 mt-1">
                           Scope of Work <br> <input class="form-control"
                               type="file" placeholder="..."
                                style="width: 100%;">
                       </div>
                       <div class="col-lg-6 mt-1">
                           Date of Submission of Report:<br> <input
                               class="form-control" type="date"
                                placeholder="..."
                               style="width: 100%;">
                       </div>
                       <div class="col-lg-6 mt-1">
                           Notes <br> <textarea class="form-control mt-1"
                               id="head_office_name"
                               type="text" placeholder="..."
                               style="width: 100%;"></textarea>
                       </div>
                   </div>
               </div>
               <button class="btn btn-danger btn-sm removeSignAccordion9_2 mx-5 my-3" type="button" style="padding:10px 25px; border-radius: 9px;">Remove</button>
           </div>
       </div>
       `;

           $('#signatoryAccordion9_2').append(newSignAccordion9_2);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion9_2', function() {
           $(this).closest('.signaccordion-item9_2').remove();
       });
   });
</script>
<!-- Script for show data in table and update of electronic and web Services (Web Surveillance Solution) -->
<script>
   $(document).ready(function() {
       // Function to update summary table for signatory entries
       function updateSignatorySummaryTable9_2() {
           // Clear existing rows
           $('#signatorySummaryTable9_2 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item9_2').each(function(index) {
               var category_of_webSol = $(this).find('[name="categoryOfWebSol"]').val();
               var scope_of_work = $(this).find('[name="scopOfWork"]').val();
               var date_of_submittion = $(this).find('[name="dateOfSubmittion"]').val();

               // Check if any relevant data is entered
               if (category_of_webSol || scope_of_work || date_of_submittion) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable9_2 tbody').append(`
               <tr>
                   <td>${index + 1}</td>
                   <td>${category_of_webSol}</td>
                   <td>${scope_of_work}</td>
                   <td>${date_of_submittion}</td>
                   <td><button type="button" class="btn btn-primary view-signatory-button9_2" style="width: 100%" data-index="${index}">View</button></td>
               </tr>
           `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory9_2').on('click', function() {
           var signatoryEntryCount9_2 = $('#signatoryAccordion9_2 .signaccordion-item9_2').length + 1;

           var newSignatoryEntry9_2 = `
       <!-- Your existing signatory accordion HTML goes here, adjusted for 9_2 -->
       `;
           console.log('Adding signatory entry:', signatoryEntryCount9_2);
           $('#signatoryAccordion9_2').append(newSignatoryEntry9_2);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable9_2').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable9_2();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button9_2', function() {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item9_2').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion9_2', function() {
           $(this).closest('.signaccordion-item9_2').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable9_2();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory9_2').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<!-- Script for show Required on daily basis and no of days staff required in men gaurding services -->
<script>
   document.addEventListener('DOMContentLoaded', function() {
       var monthlySelect = document.getElementById('monthlyRequirement');
       var dailySection = document.getElementById('dailyRequirementSection');
       var dailySelect = document.getElementById('dailyRequirement'); // Assuming this is your daily dropdown
       var noOfDayStaffRequired = document.getElementById('noOfDays');

       function toggleDailyRequirement() {
           // console.log('Monthly selection changed:', monthlySelect.value); // Debugging log
           if (monthlySelect.value === 'No') {
               // console.log('Showing daily section'); // Debugging log
               dailySection.style.display = 'block';
           } else {
               // console.log('Hiding daily section'); // Debugging log
               dailySection.style.display = 'none';
               noOfDayStaffRequired.style.display = 'none';
               dailySelect.value = '';
           }

       }

       function toggleNoOfDayStaffRequiredFor() {
           if (dailySelect.value === 'Yes') {
               noOfDayStaffRequired.style.display = 'block';

           } else {
               noOfDayStaffRequired.style.display = 'none';
           }
       }

       toggleDailyRequirement(); // Initial check

       monthlySelect.addEventListener('change', function() {
           toggleDailyRequirement();
           if (monthlySelect.value === 'Yes') {
               noOfDayStaffRequired.style.display = 'none';
           }
       });
       dailySelect.addEventListener('change', toggleNoOfDayStaffRequiredFor);
   });
</script>
<!-- Script for show no of days Dogs required and
   Required with Handler in Canine services -->
<Script>
   document.addEventListener('DOMContentLoaded', function() {
       var requiredFor = document.getElementById('req_leadcategory');
       var noOfDayDogsRequired = document.getElementById('noOfDaysDogs');

       var reqWithHandler = document.getElementById('req_handler_leadcategory');
       var hName = document.getElementById('nameOFHandler');
       var hCNIC = document.getElementById('cnicOFHandler');
       var hAge = document.getElementById('ageOFHandler');
       var hExperience = document.getElementById('experienceOFHandler');
       var hCellNo = document.getElementById('cellNoOFHandler');
       var hCNICF = document.getElementById('cnicFrontOFHandler');
       var hCNICB = document.getElementById('cnicBackOFHandler');


       function toggleNoOfDayDogsRequiredFor() {
           if (requiredFor.value === 'DailyBasis') {
               noOfDayDogsRequired.style.display = 'block';
           } else {
               noOfDayDogsRequired.style.display = 'none';
           }
       }
       toggleNoOfDayDogsRequiredFor();

       function toggleHandlerDetails() {
           if (reqWithHandler.value === "Yes") {
               hName.style.display = 'block';
               hCNIC.style.display = 'block';
               hAge.style.display = 'block';
               hExperience.style.display = 'block';
               hCellNo.style.display = 'block';
               hCNICF.style.display = 'block';
               hCNICB.style.display = 'block';
           } else {
               hName.style.display = 'none';
               hCNIC.style.display = 'none';
               hAge.style.display = 'none';
               hExperience.style.display = 'none';
               hCellNo.style.display = 'none';
               hCNICF.style.display = 'none';
               hCNICB.style.display = 'none';
           }
       }
       toggleHandlerDetails();


       requiredFor.addEventListener('change', toggleNoOfDayDogsRequiredFor);
       reqWithHandler.addEventListener('change', toggleHandlerDetails);
   });
</Script>
<!-- Script for show (Rate of fuel per kilometer) field of privet jet -->
<script>
   document.addEventListener('DOMContentLoaded', function() {

       var selectFuel = document.getElementById('leadcategoryfuel');
       var rateOfFuelField = document.getElementById('rateOfFuel');

       function toggleRateOfFuelTextField() {
           if (selectFuel.value === 'As Per Kilometer') {
               rateOfFuelField.style.display = 'block';
           } else {
               rateOfFuelField.style.display = 'none';
           }
       }
       toggleRateOfFuelTextField();

       selectFuel.addEventListener('change', toggleRateOfFuelTextField);
   })
</script>
<!-- Script for Add more with complains-Hidden WHT (in commercial section) -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory11').on('click', function() {
           var SignatoryAccordionCount11 = $('#signatoryAccordion11 .signaccordion-item11').length + 1;

           var newSignAccordion11 = `
               <div class="accordion-item signaccordion-item11" id="signatoryEntry11${SignatoryAccordionCount11}">
                   <h2 class="accordion-header" id="signatoryHeading11${SignatoryAccordionCount11}">
                       <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse11${SignatoryAccordionCount11}" aria-expanded="false" aria-controls="signatoryCollapse11${SignatoryAccordionCount11}">
                           Entry ${SignatoryAccordionCount11}
                       </button>
                   </h2>
                   <div id="signatoryCollapse11${SignatoryAccordionCount11}" class="collapse" aria-labelledby="signatoryHeading11${SignatoryAccordionCount11}">
                       <div class="accordion-body">
                           <div class="row mb-2" id="signatoryDetailsContainer11">
                               <div class="col-12 d-flex">
                                   <div class="col-md-4">
                                       <div class="mb-3">
                                           Category : <br>
                                           <select  name="wc_hw_category[]" class="form-control mt-1"
                                               style="width: 100%;">
                                               <option>Select</option>
                                               <option value="Armed Security Supervisor">Armed Security
                                                   Supervisor</option>
                                               <option value="Armed Security Guard
                                                   (Ex-Army">Armed Security Guard
                                                   (Ex-Army)</option>
                                               <option value="Armed Security Guard
                                                   (Civil)">Armed Security Guard
                                                   (Civil)</option>
                                           </select>
                                       </div>

                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Social Security:</label>
                                           <input class="form-control" name="wc_hw_social[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>

                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Weapon & Ammunition
                                               Cost:</label>
                                           <input class="form-control" name="wc_hw_weapon[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>

                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Monthly Rate Per
                                               Unit:</label>
                                           <input class="form-control monthly_Rate_Per_UnitFieldc"
                                           name="wc_hw_monthly_rate[]" type="text" placeholder="..."
                                               style="width: 100%;" readOnly>
                                       </div>

                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Total Monthly Rate per
                                               Unit:</label>
                                           <input class="form-control totalMonthlyRatePerUnitFieldc"
                                           name="wc_hw_total_monthly_rate[]" type="text" placeholder="..."
                                               style="width: 100%;" readOnly>
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">WHT:</label>
                                           <input class="form-control whtFieldc" name="wc_hw_wht[]" type="text"
                                               placeholder="..." style="width: 100%;" readOnly>
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Salary:</label>
                                           <input class="form-control" id="hidesalary" name="wc_hw_salary[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>

                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Group/ Life
                                               insurance:</label>
                                           <input class="form-control" name="wc_hw_group[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>

                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Training Cost:</label>
                                           <input class="form-control" name="wc_hw_training_cost[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>

                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Applicable GST
                                               Percentage:</label>
                                           <input class="form-control" name="wc_hw_app_gst[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>

                                       <div class="mb-3">
                                           <label class="form-check-label" for="">GST:</label>
                                           <input class="form-control gstFieldc" name="wc_hw_gst[]" type="text"
                                               placeholder="..." style="width: 100%;" readOnly>
                                       </div>

                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Admin Cost:</label>
                                           <input class="form-control adminCostFieldc" name="wc_hw_admin_cost[]"
                                               type="text" placeholder="..." style="width: 100%;" readOnly>
                                       </div>

                                   </div>

                                   <div class="col-md-4">

                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Reliever Allowance:</label>
                                           <input class="form-control "
                                           name="wc_hw_rel_allowance[]" id="hiderelieverAllowance" type="text" placeholder="..."
                                               style="width: 100%;" readOnly>
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">EOBI:</label>
                                           <input class="form-control" name="wc_hw_eobi[]" name="EOBI" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>

                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Uniform Cost:</label>
                                           <input class="form-control" name="wc_hw_uni_cost[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>

                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Hidden Admin Cost:</label>
                                           <input class="form-control" id="hiddenAdminCostField"
                                           name="wc_hw_hidden_admin_cost[]" type="text" placeholder="..."
                                               style="width: 100%;">
                                       </div>

                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Applicable WHT
                                               Percentage:</label>
                                           <input class="form-control" name="wc_hw_app_wht_per[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>

                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Total Admin Cost:</label>
                                           <input class="form-control totalAdminCostFieldc"
                                               name="wc_hw_total_admin_cost[]" type="text" placeholder="..."
                                               style="width: 100%;" readOnly>
                                       </div>

                                   </div>
                               </div>
                           </div>
                       </div>
                       <button class="btn btn-danger btn-sm removeSignAccordion11 mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                   </div>
               </div>
           `;

           $('#signatoryAccordion11').append(newSignAccordion11);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion11', function() {
           $(this).closest('.signaccordion-item11').remove();
       });
   });
</script>
<!-- Script for show data in table of complains-Hidden WHT (in commercial section) -->
<script>
   $(document).ready(function() {
       // Function to update summary table for entries
       function updateSignatorySummaryTable11() {
           // Clear existing rows
           $('#signatorySummaryTable11 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item11').each(function(index) {
               var category_of_G = $(this).find('[name="categoryOfG"]').val();
               var salary = parseFloat($(this).find('[name="salry"]').val());
               // var Reli_Allow = parseFloat($(this).find('[name="relieverAllowance"]').val());
               var eobi = parseFloat($(this).find('[name="EOBI"]').val());
               var social_Sec = parseFloat($(this).find('[name="socialSecuirty"]').val());
               var group_L_Ins = parseFloat($(this).find('[name="groupLifeInsurance"]').val());
               var uniform_Cost = parseFloat($(this).find('[name="uniformCost"]').val());
               var weapon_Amm_Cost = parseFloat($(this).find('[name="w&ACost"]').val());
               var traninig_Cost = parseFloat($(this).find('[name="traningCost"]').val());


               var hidden_Admin_Cost = parseFloat($(this).find('[name="hiddenAdminCost"]').val());

               var app_gst_percentage = parseFloat($(this).find('[name="app_gst_perc"]').val());
               var app_wht_percentage = parseFloat($(this).find('[name="app_wht_perc"]').val());

               // For Reliever Allowance
               var reli_allowance = parseFloat($(this).find('[name="relieverAllowance"]').val());


               // Sum Of Following For Admin Cost
               var forAdminCost_sof = salary + reli_allowance + eobi + social_Sec + group_L_Ins +
                   uniform_Cost + weapon_Amm_Cost + traninig_Cost;
               console.log(forAdminCost_sof, 'sof');

               // For Admin Cost
               var AdmiCost = parseFloat(((hidden_Admin_Cost + (forAdminCost_sof / 0.96)) -
                   forAdminCost_sof).toFixed(2));
               $(this).find('.adminCostFieldc').val(AdmiCost);
               // $('#adminCostField').val(AdmiCost);
               // $('.adminCostFieldc').val(AdmiCost);

               // For Monthly Rate Per Unit
               var monthly_Rate_Per_Unit = parseFloat((salary + reli_allowance + eobi + social_Sec +
                       group_L_Ins + uniform_Cost + weapon_Amm_Cost + traninig_Cost + AdmiCost)
                   .toFixed(2));
               $(this).find('.monthly_Rate_Per_UnitFieldc').val(monthly_Rate_Per_Unit);
               // $('#monthly_Rate_Per_UnitField').val(monthly_Rate_Per_Unit);
               // $('.monthly_Rate_Per_UnitFieldc').val(monthly_Rate_Per_Unit);

               // For Total Admin Cost
               var total_Admin_Cost = parseFloat((AdmiCost + hidden_Admin_Cost).toFixed(2));
               $(this).find('.totalAdminCostFieldc').val(total_Admin_Cost);
               // $('#totalAdminCostField').val(total_Admin_Cost);
               // $('.totalAdminCostFieldc').val(total_Admin_Cost);

               // For GST
               var gst = parseFloat((monthly_Rate_Per_Unit * (app_gst_percentage / 100)).toFixed(2));
               $(this).find('.gstFieldc').val(gst);
               // $('#gstField').val(gst);
               // $('.gstFieldc').val(gst);

               // For Total Monthly Rate Per Unit
               var total_Monthly_R_P_U = parseFloat((monthly_Rate_Per_Unit + gst).toFixed(2));
               $(this).find('.totalMonthlyRatePerUnitFieldc').val(total_Monthly_R_P_U);
               // $('#totalMonthlyRatePerUnitField').val(total_Monthly_R_P_U);
               // $('.totalMonthlyRatePerUnitFieldc').val(total_Monthly_R_P_U);

               // For WHT
               var wht = parseFloat((total_Monthly_R_P_U - (monthly_Rate_Per_Unit + gst)).toFixed(2));
               $(this).find('.whtFieldc').val(wht);
               // $('#whtField').val(wht);
               // $('.whtFieldc').val(wht);


               // Check if any relevant data is entered
               if (category_of_G || salary || reli_allowance || eobi || social_Sec ||
                   group_L_Ins || uniform_Cost || weapon_Amm_Cost ||
                   traninig_Cost || AdmiCost || monthly_Rate_Per_Unit || gst ||
                   total_Monthly_R_P_U || hidden_Admin_Cost || total_Admin_Cost) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable11 tbody').append(`
                       <tr>
                           <td>${index + 1}</td>
                           <td>${category_of_G}</td>
                           <td>${salary}</td>
                           <td>${reli_allowance}</td>
                           <td>${eobi}</td>
                           <td>${social_Sec}</td>
                           <td>${group_L_Ins}</td>
                           <td>${uniform_Cost}</td>
                           <td>${weapon_Amm_Cost}</td>
                           <td>${traninig_Cost}</td>
                           <td>${AdmiCost}</td>
                           <td>${monthly_Rate_Per_Unit}</td>
                           <td>${gst}</td>
                           <td>${total_Monthly_R_P_U}</td>
                           <td>${hidden_Admin_Cost}</td>
                           <td>${total_Admin_Cost}</td>
                           <td><button type="button" class="btn btn-primary view-signatory-button11" style="width: 100%;" data-index="${index}">View</button></td>
                           <!-- Add more columns as needed -->
                       </tr>
                   `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory11').on('click', function() {
           var signatoryEntryCount11 = $('#signatoryAccordion11 .signaccordion-item11')
               .length + 1;

           var newSignatoryEntry11 = `
               <!-- Your existing signatory accordion HTML goes here -->

           `;
           console.log('Adding signatory entry:', signatoryEntryCount11);
           $('#signatoryAccordion11').append(newSignatoryEntry11);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable11').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable11();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button11', function() {
           var index = $(this).data('index');
           var accordionItem11 = $('.signaccordion-item11').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem11.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion11', function() {
           $(this).closest('.signaccordion-item11').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable11();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory11').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<!-- Script for Add more with complains-Shown WHT (in commercial section) -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory12').on('click', function() {
           var SignatoryAccordionCount12 = $('#signatoryAccordion12 .signaccordion-item12').length + 1;

           var newSignAccordion12 = `
               <div class="accordion-item signaccordion-item12" id="signatoryEntry12${SignatoryAccordionCount12}">
                   <h2 class="accordion-header" id="signatoryHeading12${SignatoryAccordionCount12}">
                       <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse12${SignatoryAccordionCount12}" aria-expanded="false" aria-controls="signatoryCollapse12${SignatoryAccordionCount12}">
                           Entry ${SignatoryAccordionCount12}
                       </button>
                   </h2>
                   <div id="signatoryCollapse12${SignatoryAccordionCount12}" class="collapse" aria-labelledby="signatoryHeading12${SignatoryAccordionCount12}">
                       <div class="accordion-body">
                           <div class="row mb-2" id="signatoryDetailsContainer12">
                               <div class="col-12 d-flex">
                                   <div class="col-md-4">
                                       <div class="mb-3">
                                           Category : <br>
                                            <div class="input-group" style="width: 100%;">
                                            <select id="applicable_compliances" class="form-control mt-1" name="wc_sw_category[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                               <option value=""></option>
                                               @foreach (App\Models\Dropdown::whereNotNull('comercial_category')->get() as $com_category)
                                               <option value="{{  $com_category->comercial_category }}">{{  $com_category->comercial_category }}</option>
                                               @endforeach
                                            </select>
                                            <div class="input-group-append" style="width: 30%;">
                                               <a href="{{ route('comercialcategory.add') }}">
                                               <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                               </a>
                                            </div>
                                         </div>
                                       </div>

                                        <div class="mb-3">
                                        <label class="form-check-label" for="">Current  Minimum wage of Region:</label>
                                        <input class="form-control" name="wc_sw_cur_min_wg_re[]" type="text"
                                           placeholder="..." style="width: 100%;">
                                     </div>
                                    //   <div class="mb-3">
                                    //     <label class="form-check-label" for="">Current  Minimum wage of Respective Region:</label>
                                    //     <input class="form-control" name="wc_sw_cur_min_wg_res_re[]" type="text"
                                    //        placeholder="..." style="width: 100%;">
                                    //  </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Social Security:</label>
                                           <input class="form-control" name="wc_sw_social_check[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Weapon & Ammunition
                                               Cost:</label>
                                           <input class="form-control" name="wc_sw_weapon[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Monthly Rate Per
                                               Unit:</label>
                                           <input class="form-control monthly_Rate_Per_UnitFieldc1"
                                           name="wc_sw_monthly_rate[]" type="text" placeholder="..."
                                               style="width: 100%;" readOnly>
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Total Monthly Rate per
                                               Unit:</label>
                                           <input class="form-control totalMonthlyRatePerUnitFieldc1"
                                           name="wc_sw_total_monthly_rate[]" type="text" placeholder="..."
                                               style="width: 100%;" readONly>
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                    <div class="mb-3">
                                          Region : <br>
                                          <div class="input-group" style="width: 100%;">
                                             <select id="applicable_regions" class="form-control mt-1" name="wc_sw_region[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value=""></option>
                                             @foreach (App\Models\Dropdown::whereNotNull('commercial_region')->get() as $com_region)
                                                <option value="{{  $com_region->commercial_region }}">{{  $com_region->commercial_region }}</option>
                                                @endforeach
                                             </select>
                                             <div class="input-group-append" style="width: 30%;">
                                                <a href="{{ route('comercialregion.add') }}">
                                                <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label"  for="">Salary:</label>
                                           <input class="form-control" id="salary" name="wc_sw_salary[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Group/ Life
                                               insurance:</label>
                                           <input class="form-control"  name="wc_sw_group[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Training Cost:</label>
                                           <input class="form-control" name="wc_sw_training_cost[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Applicable GST
                                               Percentage:</label>
                                           <input class="form-control" name="wc_sw_app_gst[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">GST:</label>
                                           <input class="form-control gstFieldc1" name="wc_sw_monthly_gst[]" type="text"
                                               placeholder="..." style="width: 100%;" readOnly>
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                     <div class="mb-3">
                                            <label class="form-check-label" for="">Date:</label>
                                            <input class="form-control" name="wc_sw_date[]" type="date"
                                               placeholder="..." style="width: 100%;">
                                         </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Reliever Allowance:</label>
                                           <input class="form-control "
                                           name="wc_sw_rel_allowance[]" id="relieverAllowance" type="text" placeholder="..."
                                               style="width: 100%;" readOnly>
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">EOBI:</label>
                                           <input class="form-control" name="wc_sw_eobi[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Uniform Cost:</label>
                                           <input class="form-control" name="wc_sw_uni_cost[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <!-- <div class="mb-3">
                                           <label class="form-check-label" for="">Hidden Admin Cost:</label>
                                           <input class="form-control" id="hiddenAdminCostField"
                                               name="hiddenAdminCost" type="text" placeholder="..."
                                               style="width: 100%;">
                                       </div> -->
                                        <div class="mb-3">
                                           <label class="form-check-label" for="">Admin Cost:</label>
                                           <input class="form-control" id="adminCostField" name="wc_sw_admin_cost[]"
                                               type="text" placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Applicable WHT
                                               Percentage:</label>
                                           <input class="form-control" name="wc_sw_app_wht[]" type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">WHT:</label>
                                           <input class="form-control whtFieldc1" name="wc_sw_wht[]" type="text"
                                               placeholder="..." style="width: 100%;" readOnly>
                                       </div>

                                       <!-- <div class="mb-3">
                                           <label class="form-check-label" for="">Total Admin Cost:</label>
                                           <input class="form-control" id="totalAdminCostField"
                                               name="totalAdminCost" type="text" placeholder="..."
                                               style="width: 100%;" readOnly>
                                       </div> -->
                                   </div>
                               </div>
                           </div>
                       </div>
                       <button class="btn btn-danger btn-sm removeSignAccordion12 mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                   </div>
               </div>
           `;

           $('#signatoryAccordion12').append(newSignAccordion12);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion12', function() {
           $(this).closest('.signaccordion-item12').remove();
       });
   });
</script>
<!-- Script for show data in table of complains-Shown WHT (in commercial section) -->
<script>
   $(document).ready(function() {
       // Function to update summary table for entries
       function updateSignatorySummaryTable12() {
           // Clear existing rows
           $('#signatorySummaryTable12 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item12').each(function(index) {
               var category_of_G = $(this).find('[name="categoryOfG"]').val();
               var salary = parseFloat($(this).find('[name="salry"]').val());
               var reli_allowance = parseFloat($(this).find('[name="hiderelieverAllowance"]').val());
               var eobi = parseFloat($(this).find('[name="EOBI"]').val());
               var social_Sec = parseFloat($(this).find('[name="socialSecuirty"]').val());
               var group_L_Ins = parseFloat($(this).find('[name="groupLifeInsurance"]').val());
               var uniform_Cost = parseFloat($(this).find('[name="uniformCost"]').val());
               var weapon_Amm_Cost = parseFloat($(this).find('[name="w&ACost"]').val());
               var traninig_Cost = parseFloat($(this).find('[name="traningCost"]').val());
               var admin_Cost = parseFloat($(this).find('[name="adminCost"]').val());
               // var monthly_R_P_U = parseFloat($(this).find('[name="monthlyRatePerUnit"]').val());
               // var gst = parseFloat($(this).find('[name="gst"]').val());
               // var total_Monthly_R_P_U = parseFloat($(this).find('[name="totalMonthlyRatePerUnit"]').val());

               // var hidden_Admin_Cost = parseFloat($(this).find('[name="hiddenAdminCost"]').val());
               // var total_admin_cost = parseFloat($(this).find('[name="totalAdminCost"]').val());
               var app_gst_percentage = parseFloat($(this).find('[name="app_gst_perc"]').val());
               var app_wht_percentage = parseFloat($(this).find('[name="app_wht_perc"]').val());


               // Sum Of Following For Admin Cost
               // var forAdminCost_sof = salary + reli_allowance + eobi + social_Sec + group_L_Ins +
               //     uniform_Cost + weapon_Amm_Cost + traninig_Cost;
               // console.log(forAdminCost_sof, 'sof');

               // For Admin Cost
               // var AdmiCost = parseFloat(((hidden_Admin_Cost + (forAdminCost_sof / 0.96)) -
               //     forAdminCost_sof).toFixed(2));
               // $('#adminCostField').val(AdmiCost);
               // $('.adminCostFieldc').val(AdmiCost);

               // For Monthly Rate Per Unit
               var monthly_Rate_Per_Unit = parseFloat((salary + reli_allowance + eobi + social_Sec +
                       group_L_Ins + uniform_Cost + weapon_Amm_Cost + traninig_Cost + admin_Cost)
                   .toFixed(2));
               $(this).find('.monthly_Rate_Per_UnitFieldc1').val(monthly_Rate_Per_Unit);
               // For Total Admin Cost
               // var total_Admin_Cost = parseFloat((AdmiCost + hidden_Admin_Cost).toFixed(2));
               // $('#totalAdminCostField').val(total_Admin_Cost);
               // $('.totalAdminCostFieldc').val(total_Admin_Cost);

               // For GST
               var gst = parseFloat((monthly_Rate_Per_Unit * (app_gst_percentage / 100)).toFixed(2));
               $(this).find('.gstFieldc1').val(gst);
               // $('.gstFieldc1').val(gst);

               // For Total Monthly Rate Per Unit
               var total_Monthly_R_P_U = parseFloat(((monthly_Rate_Per_Unit + gst) / 0.96).toFixed(2));
               $(this).find('.totalMonthlyRatePerUnitFieldc1').val(total_Monthly_R_P_U);

               // For WHT
               var wht = parseFloat((total_Monthly_R_P_U - (monthly_Rate_Per_Unit + gst)).toFixed(2));
               $(this).find('.whtFieldc1').val(wht);


               // Check if any relevant data is entered
               if (category_of_G || salary || reli_allowance || eobi || social_Sec ||
                   group_L_Ins || uniform_Cost || weapon_Amm_Cost ||
                   traninig_Cost || admin_Cost || monthly_Rate_Per_Unit || gst ||
                   wht || total_Monthly_R_P_U) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable12 tbody').append(`
                       <tr>
                           <td>${index + 1}</td>
                           <td>${category_of_G}</td>
                           <td>${salary}</td>
                           <td>${reli_allowance}</td>
                           <td>${eobi}</td>
                           <td>${social_Sec}</td>
                           <td>${group_L_Ins}</td>
                           <td>${uniform_Cost}</td>
                           <td>${weapon_Amm_Cost}</td>
                           <td>${traninig_Cost}</td>
                           <td>${admin_Cost}</td>
                           <td>${monthly_Rate_Per_Unit}</td>
                           <td>${gst}</td>
                           <td>${wht}</td>
                           <td>${total_Monthly_R_P_U}</td>
                           <td><button type="button" class="btn btn-primary view-signatory-button12" style="width: 100%;" data-index="${index}">View</button></td>
                           <!-- Add more columns as needed -->
                       </tr>
                   `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory12').on('click', function() {
           var signatoryEntryCount12 = $('#signatoryAccordion12 .signaccordion-item12')
               .length + 1;

           var newSignatoryEntry12 = `
               <!-- Your existing signatory accordion HTML goes here -->

           `;
           console.log('Adding signatory entry:', signatoryEntryCount12);
           $('#signatoryAccordion12').append(newSignatoryEntry12);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable12').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable12();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button12', function() {
           var index = $(this).data('index');
           var accordionItem12 = $('.signaccordion-item12').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem12.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion12', function() {
           $(this).closest('.signaccordion-item12').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable12();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory12').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<!--  Script for Add more with Lump sum-Shown WHT (in commercial section)  -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory13').on('click', function() {
           var SignatoryAccordionCount13 = $('#signatoryAccordion13 .signaccordion-item13').length + 1;

           var newSignAccordion13 = `
               <div class="accordion-item signaccordion-item13" id="signatoryEntry13${SignatoryAccordionCount13}">
                   <h2 class="accordion-header" id="signatoryHeading13${SignatoryAccordionCount13}">
                       <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse13${SignatoryAccordionCount13}" aria-expanded="false" aria-controls="signatoryCollapse13${SignatoryAccordionCount13}">
                           Entry ${SignatoryAccordionCount13}
                       </button>
                   </h2>
                   <div id="signatoryCollapse13${SignatoryAccordionCount13}" class="collapse" aria-labelledby="signatoryHeading13${SignatoryAccordionCount13}">
                       <div class="accordion-body">
                           <div class="row mb-2" id="signatoryDetailsContainer13">
                               <div class="col-12 d-flex">
                                   <div class="col-md-4">
                                       <div class="mb-3">
                                           Category : <br>
                                           <select id="category" class="form-control mt-1"
                                               style="width: 100%;">
                                               <option value="">select</option>
                                               <option value="Armed Security Supervisor">Armed Security
                                                   Supervisor</option>
                                               <option value="Armed Security Guard
                                                   (Ex-Army)">Armed Security Guard(Ex-Army)</option>
                                               <option value="Armed Security Guard
                                                   (Civil)">Armed Security Guard(Civil)</option>
                                           </select>
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Social Security:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Weapon & Ammunition
                                               Cost:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Monthly Rate Per
                                               Unit:</label>
                                           <input class="form-control monthly_Rate_Per_UnitFieldc2"
                                                type="text" placeholder="..."
                                               style="width: 100%;" readOnly>
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Total Monthly Rate per
                                               Unit:</label>
                                           <input class="form-control totalMonthlyRatePerUnitFieldc2"
                                               type="text" placeholder="..."
                                               style="width: 100%;" readOnly>
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Salary:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Group/ Life
                                                       Insur-ancet:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Training Cost:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Applicable GST:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">GST:</label>
                                           <input class="form-control gstFieldc2"  type="text"
                                               placeholder="..." style="width: 100%;" readOnly>
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">EOBI:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Uniform Cost:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Admin Cost:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Applicable WHT:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">WHT:</label>
                                           <input class="form-control whtFieldc2"  type="text"
                                               placeholder="..." style="width: 100%;" readOnly>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <button class="btn btn-danger btn-sm removeSignAccordion13 mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                   </div>
               </div>
           `;

           $('#signatoryAccordion13').append(newSignAccordion13);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion13', function() {
           $(this).closest('.signaccordion-item13').remove();
       });
   });
</script>
<!-- Script for show data in table of Lump sum-Shown WHT (in commercial section) -->
<script>
   $(document).ready(function() {
       // Function to update summary table for entries
       function updateSignatorySummaryTable13() {
           // Clear existing rows
           $('#signatorySummaryTable13 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item13').each(function(index) {
               var category_of_G = $(this).find('[name="categoryOfG"]').val();
               var salary = parseFloat($(this).find('[name="salry"]').val());
               // var Reli_Allow = parseFloat($(this).find('[name="relieverAllowance"]').val());
               var eobi = parseFloat($(this).find('[name="EOBI"]').val());
               var social_Sec = parseFloat($(this).find('[name="socialSecuirty"]').val());
               var group_L_Ins = parseFloat($(this).find('[name="groupLifeInsurance"]').val());
               var uniform_Cost = parseFloat($(this).find('[name="uniformCost"]').val());
               var weapon_Amm_Cost = parseFloat($(this).find('[name="w&ACost"]').val());
               var traninig_Cost = parseFloat($(this).find('[name="traningCost"]').val());
               var admin_Cost = parseFloat($(this).find('[name="adminCost"]').val());
               // var monthly_R_P_U = parseFloat($(this).find('[name="monthlyRatePerUnit"]').val());
               // var gst = parseFloat($(this).find('[name="gst"]').val());
               // var total_Monthly_R_P_U = parseFloat($(this).find('[name="totalMonthlyRatePerUnit"]').val());

               // var hidden_Admin_Cost = parseFloat($(this).find('[name="hiddenAdminCost"]').val());
               // var total_admin_cost = parseFloat($(this).find('[name="totalAdminCost"]').val());
               var app_gst_percentage = parseFloat($(this).find('[name="app_gst_perc"]').val());
               var app_wht_percentage = parseFloat($(this).find('[name="app_wht_perc"]').val());

               // For Reliever Allowance
               var reli_allowance = parseFloat((salary / (26 * 4)).toFixed(2));
               parseFloat($(this).find('.reli_allowFieldc2').val(reli_allowance));

               // Sum Of Following For Admin Cost
               // var forAdminCost_sof = salary + reli_allowance + eobi + social_Sec + group_L_Ins +
               //     uniform_Cost + weapon_Amm_Cost + traninig_Cost;
               // console.log(forAdminCost_sof, 'sof');

               // For Admin Cost
               // var AdmiCost = parseFloat(((hidden_Admin_Cost + (forAdminCost_sof / 0.96)) -
               //     forAdminCost_sof).toFixed(2));
               // $('#adminCostField').val(AdmiCost);
               // $('.adminCostFieldc').val(AdmiCost);

               // For Monthly Rate Per Unit
               var monthly_Rate_Per_Unit = (salary + reli_allowance + eobi + social_Sec +
                   group_L_Ins + uniform_Cost + weapon_Amm_Cost + traninig_Cost + admin_Cost);
               var monthly_Rate_Per_Unit = parseFloat(monthly_Rate_Per_Unit.toFixed(2));
               //console.log(monthly_Rate_Per_Unit);
               $(this).find('.monthly_Rate_Per_UnitFieldc2').val(monthly_Rate_Per_Unit);
               // For Total Admin Cost
               // var total_Admin_Cost = parseFloat((AdmiCost + hidden_Admin_Cost).toFixed(2));
               // $('#totalAdminCostField').val(total_Admin_Cost);
               // $('.totalAdminCostFieldc').val(total_Admin_Cost);

               // For GST
               var gst = parseFloat((monthly_Rate_Per_Unit * (app_gst_percentage / 100)).toFixed(2));
               $(this).find('.gstFieldc2').val(gst);
               // $('.gstFieldc1').val(gst);

               // For Total Monthly Rate Per Unit
               var total_Monthly_R_P_U = parseFloat(((monthly_Rate_Per_Unit + gst) / 0.96).toFixed(2));
               $(this).find('.totalMonthlyRatePerUnitFieldc2').val(total_Monthly_R_P_U);

               // For WHT
               var wht = parseFloat((total_Monthly_R_P_U - (monthly_Rate_Per_Unit + gst)).toFixed(2));
               $(this).find('.whtFieldc2').val(wht);


               // Check if any relevant data is entered
               if (category_of_G || salary || reli_allowance || uniform_Cost || weapon_Amm_Cost ||
                   traninig_Cost || admin_Cost || monthly_Rate_Per_Unit || gst ||
                   wht || total_Monthly_R_P_U) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable13 tbody').append(`
                       <tr>
                           <td>${index + 1}</td>
                           <td>${category_of_G}</td>
                           <td>${salary}</td>
                           <td>${reli_allowance}</td>
                           <td>${uniform_Cost}</td>
                           <td>${weapon_Amm_Cost}</td>
                           <td>${traninig_Cost}</td>
                           <td>${admin_Cost}</td>
                           <td>${monthly_Rate_Per_Unit}</td>
                           <td>${gst}</td>
                           <td>${wht}</td>
                           <td>${total_Monthly_R_P_U}</td>
                           <td><button type="button" class="btn btn-primary view-signatory-button13" style="width: 100%;" data-index="${index}">View</button></td>
                           <!-- Add more columns as needed -->
                       </tr>
                   `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory13').on('click', function() {
           var signatoryEntryCount13 = $('#signatoryAccordion13 .signaccordion-item13')
               .length + 1;

           var newSignatoryEntry13 = `
               <!-- Your existing signatory accordion HTML goes here -->

           `;
           console.log('Adding signatory entry:', signatoryEntryCount13);
           $('#signatoryAccordion13').append(newSignatoryEntry13);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable13').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable13();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button13', function() {
           var index = $(this).data('index');
           var accordionItem13 = $('.signaccordion-item13').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem13.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion13', function() {
           $(this).closest('.signaccordion-item13').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable13();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory13').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<!--  Script for Add more with Lump sum-Hidden WHT (in commercial section)  -->
<script>
   $(document).ready(function() {
       // Add More Button Click Event
       $('#addSignatory14').on('click', function() {
           var SignatoryAccordionCount14 = $('#signatoryAccordion14 .signaccordion-item14').length + 1;

           var newSignAccordion14 = `
               <div class="accordion-item signaccordion-item14" id="signatoryEntry14${SignatoryAccordionCount14}">
                   <h2 class="accordion-header" id="signatoryHeading14${SignatoryAccordionCount14}">
                       <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse14${SignatoryAccordionCount14}" aria-expanded="false" aria-controls="signatoryCollapse14${SignatoryAccordionCount14}">
                           Entry ${SignatoryAccordionCount14}
                       </button>
                   </h2>
                   <div id="signatoryCollapse14${SignatoryAccordionCount14}" class="collapse" aria-labelledby="signatoryHeading14${SignatoryAccordionCount14}">
                       <div class="accordion-body">
                           <div class="row mb-2" id="signatoryDetailsContainer14">
                               <div class="col-12 d-flex">
                                   <div class="col-md-4">
                                       <div class="mb-3">
                                           Category : <br>
                                           <select id="category" class="form-control mt-1"
                                               style="width: 100%;">
                                               <option value="">select</option>
                                               <option value="Armed Security Supervisor">Armed Security
                                                   Supervisor</option>
                                               <option value="Armed Security Guard(Ex-Army)">Armed Security
                                                   Guard
                                                   (Ex-Army)</option>
                                               <option value="Armed Security Guard(Civil)">Armed Security Guard
                                                   (Civil)</option>
                                           </select>
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Uniform Cost:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Weapon & Ammunition
                                               Cost:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Monthly Rate Per
                                               Unit:</label>
                                           <input class="form-control monthly_Rate_Per_UnitFieldc3" type="text"
                                               placeholder="..." style="width: 100%;"
                                               readOnly>
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Total Monthly Rate per
                                               Unit:</label>
                                           <input class="form-control totalMonthlyRatePerUnitFieldc3"
                                               type="text" placeholder="..."
                                               style="width: 100%;" readOnly>
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Salary:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Social Security:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Training Cost:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Applicable GST
                                               Percentage:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">GST:</label>
                                           <input class="form-control gstFieldc3"  type="text"
                                               placeholder="..." style="width: 100%;" readOnly>
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Admin Cost:</label>
                                           <input class="form-control adminCostFieldc3"
                                               type="text" placeholder="..." style="width: 100%;" readOnly>
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">EOBI:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Group/ Life insurance:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Hidden Admin Cost:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Applicable WHT
                                               Percentage:</label>
                                           <input class="form-control"  type="text"
                                               placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">WHT:</label>
                                           <input class="form-control whtFieldc3"  type="text"
                                               placeholder="..." style="width: 100%;" readOnly>
                                       </div>
                                       <div class="mb-3">
                                           <label class="form-check-label" for="">Total Admin Cost:</label>
                                           <input class="form-control totalAdminCostFieldc3"
                                               type="text" placeholder="..."
                                               style="width: 100%;" readOnly>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <button class="btn btn-danger btn-sm removeSignAccordion14 mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                   </div>
               </div>
           `;

           $('#signatoryAccordion14').append(newSignAccordion14);
       });

       // Remove Accordion Button Click Event
       $(document).on('click', '.removeSignAccordion14', function() {
           $(this).closest('.signaccordion-item14').remove();
       });
   });
</script>
<!-- Script for show data in table of Lump sum-Hidden WHT (in commercial section) -->
<script>
   $(document).ready(function() {
       // Function to update summary table for entries
       function updateSignatorySummaryTable14() {
           // Clear existing rows
           $('#signatorySummaryTable14 tbody').empty();

           // Iterate through each signatory accordion item and update the summary table
           $('.signaccordion-item14').each(function(index) {
               var category_of_G = $(this).find('[name="categoryOfG"]').val();
               var salary = parseFloat($(this).find('[name="salry"]').val());
               // var Reli_Allow = parseFloat($(this).find('[name="relieverAllowance"]').val());
               var eobi = parseFloat($(this).find('[name="EOBI"]').val());
               var social_Sec = parseFloat($(this).find('[name="socialSecuirty"]').val());
               var group_L_Ins = parseFloat($(this).find('[name="groupLifeInsurance"]').val());
               var uniform_Cost = parseFloat($(this).find('[name="uniformCost"]').val());
               var weapon_Amm_Cost = parseFloat($(this).find('[name="w&ACost"]').val());
               var traninig_Cost = parseFloat($(this).find('[name="traningCost"]').val());
               // var admin_Cost = parseFloat($(this).find('[name="adminCost"]').val());
               // var monthly_R_P_U = parseFloat($(this).find('[name="monthlyRatePerUnit"]').val());
               // var gst = parseFloat($(this).find('[name="gst"]').val());
               // var total_Monthly_R_P_U = parseFloat($(this).find('[name="totalMonthlyRatePerUnit"]').val());

               var hidden_Admin_Cost = parseFloat($(this).find('[name="hiddenAdminCost"]').val());
               // var total_admin_cost = parseFloat($(this).find('[name="totalAdminCost"]').val());
               var app_gst_percentage = parseFloat($(this).find('[name="app_gst_perc"]').val());
               var app_wht_percentage = parseFloat($(this).find('[name="app_wht_perc"]').val());

               // For Reliever Allowance

               var reli_allowance = parseFloat((salary / (26 * 4)).toFixed(2));

               // $(this).find('.reli_allowFieldc3').val(reli_allowance);
               // $('#reli_allowField').val(
               //     reli_allowance);
               // $('.reli_allowFieldc').val(reli_allowance);

               // Sum Of Following For Admin Cost
               var forAdminCost_sof = (salary + reli_allowance + eobi + social_Sec + group_L_Ins +
                   uniform_Cost + weapon_Amm_Cost + traninig_Cost);
               console.log(forAdminCost_sof, 'sof');

               // For Admin Cost
               var AdmiCost = parseFloat(((hidden_Admin_Cost + (forAdminCost_sof / 0.96)) -
                   forAdminCost_sof).toFixed(2));
               $(this).find('.adminCostFieldc3').val(AdmiCost);
               // $('#adminCostField').val(AdmiCost);
               // $('.adminCostFieldc').val(AdmiCost);

               // For Monthly Rate Per Unit
               var monthly_Rate_Per_Unit = parseFloat((salary + reli_allowance + eobi + social_Sec +
                       group_L_Ins + uniform_Cost + weapon_Amm_Cost + traninig_Cost + AdmiCost)
                   .toFixed(2));
               $(this).find('.monthly_Rate_Per_UnitFieldc3').val(monthly_Rate_Per_Unit);
               // $('#monthly_Rate_Per_UnitField').val(monthly_Rate_Per_Unit);
               // $('.monthly_Rate_Per_UnitFieldc').val(monthly_Rate_Per_Unit);

               // For Total Admin Cost
               var total_Admin_Cost = parseFloat((AdmiCost + hidden_Admin_Cost).toFixed(2));
               $(this).find('.totalAdminCostFieldc3').val(total_Admin_Cost);
               // $('#totalAdminCostField').val(total_Admin_Cost);
               // $('.totalAdminCostFieldc').val(total_Admin_Cost);

               // For GST
               var gst = parseFloat((monthly_Rate_Per_Unit * (app_gst_percentage / 100)).toFixed(2));
               $(this).find('.gstFieldc3').val(gst);
               // $('#gstField').val(gst);
               // $('.gstFieldc').val(gst);

               // For Total Monthly Rate Per Unit
               var total_Monthly_R_P_U = parseFloat((monthly_Rate_Per_Unit + gst).toFixed(2));
               $(this).find('.totalMonthlyRatePerUnitFieldc3').val(total_Monthly_R_P_U);
               // $('#totalMonthlyRatePerUnitField').val(total_Monthly_R_P_U);
               // $('.totalMonthlyRatePerUnitFieldc').val(total_Monthly_R_P_U);

               // For WHT
               var wht = parseFloat((total_Monthly_R_P_U - (monthly_Rate_Per_Unit + gst)).toFixed(2));
               $(this).find('.whtFieldc3').val(wht);
               // $('#whtField').val(wht);
               // $('.whtFieldc').val(wht);


               // Check if any relevant data is entered
               if (category_of_G || salary || reli_allowance || uniform_Cost || weapon_Amm_Cost ||
                   traninig_Cost || AdmiCost || monthly_Rate_Per_Unit || gst ||
                   total_Monthly_R_P_U || hidden_Admin_Cost || total_Admin_Cost) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable14 tbody').append(`
                       <tr>
                           <td>${index + 1}</td>
                           <td>${category_of_G}</td>
                           <td>${salary}</td>
                           <td>${reli_allowance}</td>
                           <td>${uniform_Cost}</td>
                           <td>${weapon_Amm_Cost}</td>
                           <td>${traninig_Cost}</td>
                           <td>${AdmiCost}</td>
                           <td>${monthly_Rate_Per_Unit}</td>
                           <td>${gst}</td>
                           <td>${total_Monthly_R_P_U}</td>
                           <td>${hidden_Admin_Cost}</td>
                           <td>${total_Admin_Cost}</td>
                           <td><button type="button" class="btn btn-primary view-signatory-button14" style="width: 100%;" data-index="${index}">View</button></td>
                           <!-- Add more columns as needed -->
                       </tr>
                   `);
               }
           });
       }

       // Add More Signatory Button Click Event
       $('#addSignatory14').on('click', function() {
           var signatoryEntryCount14 = $('#signatoryAccordion14 .signaccordion-item14')
               .length + 1;

           var newSignatoryEntry14 = `
               <!-- Your existing signatory accordion HTML goes here -->

           `;
           console.log('Adding signatory entry:', signatoryEntryCount14);
           $('#signatoryAccordion14').append(newSignatoryEntry14);
       });

       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable14').on('click', function() {
           // Update the signatory summary table
           updateSignatorySummaryTable14();
       });

       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button14', function() {
           var index = $(this).data('index');
           var accordionItem14 = $('.signaccordion-item14').eq(index);

           // Toggle the collapse state of the accordion item
           accordionItem14.find('.collapse').collapse('toggle');
       });

       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion14', function() {
           $(this).closest('.signaccordion-item14').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable14();
       });

       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory14').on('click', function(event) {
           event.preventDefault();
       });
   });
</script>
<!-- Script for Add more with Reverse working (in commercial section) -->
<!-- Script for show data in table of Reverse working (in commercial section) -->
<!-- Script for Excel sheet upload or update in SOP of tender -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script>
   document.getElementById('excelFile').addEventListener('change', function(event) {
       var reader = new FileReader();
       reader.onload = function(event) {
           var data = new Uint8Array(event.target.result);
           var workbook = XLSX.read(data, {
               type: 'array'
           });
           var firstSheetName = workbook.SheetNames[0];
           var worksheet = workbook.Sheets[firstSheetName];
           displaySheet(worksheet);
       };
       reader.readAsArrayBuffer(event.target.files[0]);
   });

   function displaySheet(worksheet) {
       // Convert sheet to HTML and insert into table
       var htmlstr = XLSX.utils.sheet_to_html(worksheet);
       document.getElementById("excelDataTable").innerHTML = htmlstr.split('<table')[1].split('</table>')[0];

       // Make table editable and listen for changes
       makeTableEditable();
   }

   function makeTableEditable() {
       var table = document.getElementById("excelDataTable");
       var cells = table.getElementsByTagName('td');
       for (let i = 0; i < cells.length; i++) {
           cells[i].setAttribute('contenteditable', 'true');
           cells[i].addEventListener('blur', function(event) {
               // This is where you'd handle cell updates
               // For now, it just logs the new value
               console.log('Cell updated to:', event.target.innerText);
               // Update the table or data structure as needed
           });
       }
   }
</script>
<!-- Script for automatically total admin cost text field updated -->
<!-- <script>
   $(document).on('input', '#hiddenAdminCostField', function() {
       var hidden_Admin_Cost = parseFloat($(this).val()) || 0;

       // Directly target the admin cost field by its ID since it's unique
       var admin_Cost = parseFloat($('#adminCostField').val()) || 0;

       // Calculate the total admin cost
       var total_Admin_Cost = parseFloat((admin_Cost + hidden_Admin_Cost).toFixed(
           2));
       console.log(total_Admin_Cost);

       // Set the value of the total admin cost field
       $('#totalAdminCostField').val(total_Admin_Cost);
   });
   </script> -->
</body>
</html>
