@include('layouts.header')
@yield('main')
<div class=" customer_form" style="margin-bottom: 50px;">
   <div class="col-lg-12 d-flex">
      <div class="col-lg-3"  >
         <div style="text-align: center; margin-top: 20px;">
            <h5>Sales Compaign</h5>
         </div>
         <div style="height: 493px; overflow: auto; overflow-x: hidden; margin-top: 15px;">
            <div class="thumb_img_1" id="thumb_img_1" style="text-align: center; margin-top: 15px;">
               <img class="rounded_circle image_thumbnail" src="{{ asset('sales/letter.png') }}" height="80" width="80" alt="" style="border-radius: 50%;">
               <p>Sales Letter</p>
            </div>
            <div class=" thumb_img_2" id="thumb_img_2" style="text-align: center; margin-top: 15px;">
               <img class="rounded_circle image_thumbnail"  src="
                  sales/dispatch.png"
                  height="80" width="80"
                  alt="" style="border-radius: 50%;">
               <p>Profile Dispatch</p>
            </div>
            <div class=" thumb_img_3" id="thumb_img_3" style="text-align: center; margin-top: 15px;">
               <img class="rounded_circle image_thumbnail"  src="
                  sales/sms.png"
                  height="80" width="80"
                  alt="" style="border-radius: 50%;">
               <p>SMS</p>
            </div>
            <div class=" thumb_img_4" id="thumb_img_4" style="text-align: center; margin-top: 15px;">
               <img class="rounded_circle image_thumbnail"  src="
                  sales/email.png"
                  height="80" width="80"
                  alt="" style="border-radius: 50%;">
               <p>Email</p>
            </div>
            <div class=" thumb_img_5" id="thumb_img_5" style="text-align: center; margin-top: 15px;">
               <img class="rounded_circle image_thumbnail"  src="
                  sales/giveaway.png"
                  height="80" width="80"
                  alt="" style="border-radius: 50%;">
               <p>Giveaways</p>
            </div>
            <div class=" thumb_img_6" id="thumb_img_6" style="text-align: center; margin-top: 15px;">
               <img class="rounded_circle image_thumbnail"  src="
                  sales/billBord.png"
                  height="80" width="80"
                  alt="" style="border-radius: 50%;">
               <p>Bill Board</p>
            </div>
            <div class=" thumb_img_7" id="thumb_img_7" style="text-align: center; margin-top: 15px;">
               <img class="rounded_circle image_thumbnail"  src="
                  sales/celender.png"
                  height="80" width="80"
                  alt="" style="border-radius: 50%;">
               <p>Calender</p>
            </div>
            <div class="thumb_img_8" id="thumb_img_8" style="text-align: center; margin-top: 15px;">
               <img class="rounded_circle image_thumbnail"  src="
                  sales/clock.png"
                  height="80" width="80"
                  alt="" style="border-radius: 50%;">
               <p>Clock</p>
            </div>
            <div class=" thumb_img_9" id="thumb_img_9" style="text-align: center; margin-top: 15px;">
               <img class="rounded_circle image_thumbnail"  src="
                  sales/mango.png"
                  height="80" width="80"
                  alt="" style="border-radius: 50%;">
               <p>Mangoes</p>
            </div>
            <div class=" thumb_img_10" id="thumb_img_10" style="text-align: center; margin-top: 15px;">
               <img class="rounded_circle image_thumbnail"  src="
                  sales/leather.jpg"
                  height="80" width="80"
                  alt="" style="border-radius: 50%;">
               <p>Leather Folders</p>
            </div>
         </div>
      </div>
        <div class="col-lg-9">
         <div class="col-lg-12 mt-3 sales" id="image1-details" style="display: none;">
            <div class="details">
               <h5>Campaign Leader:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" name="letter_leader_name" class="form-control" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Employee No:</label>
                        <input type="text" name="letter_employee" class="form-control" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" name="letter_cell" class="form-control" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col ">
                        <label for="">Email ID:</label>
                        <input type="text" name="letter_email" class="form-control" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Campaign Start Date:</label>
                        <input type="date" class="form-control" name="letter_start_date"  placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Campaign End Date:</label>
                        <input type="date" class="form-control" name="letter_end_date"  placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
               <h5>Reporting To:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="letter_rep_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Designation:</label>
                        <input type="text" name="letter_rep_desig" class="form-control"  placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" name="letter__rep_cell" class="form-control" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Email ID:</label>
                        <input type="text" name="letter_rep_email" class="form-control" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3">
                     <div class="form-group col">
                        <p style="text-align: left; margin-bottom: 0px;"> <label for="notes">Notes:</label></p>
                        <textarea class="form-control" name="letter_rep_notes" id="notes" cols="42"  rows="2"></textarea>
                     </div>
                     <div class="  col">
                        <label for="">Attachment:</label>
                        <input type="file" class="form-control" name="letter_rep_attach" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
            </div>
            <nav>
               <div class="nav nav-tabs mt-3" id="myTabs" role="tablist">
                  <a class="nav-item nav-link active" id="spread-tab" data-bs-toggle="tab" href="#spread" role="tab" aria-controls="spread" aria-selected="true">Spread</a>
                  <a class="nav-item nav-link" id="dispatch-tab" data-bs-toggle="tab" href="#dispatch" role="tab" aria-controls="dispatch" aria-selected="false">Dispatching Details</a>
                  <a class="nav-item nav-link" id="response-tab" data-bs-toggle="tab" href="#response" role="tab" aria-controls="response" aria-selected="false">Response</a>
               </div>
            </nav>
            <div class="tab-content" id="myTabsContent">
               <div class="tab-pane fade show active" id="spread" role="tabpanel" aria-labelledby="spread-tab">
                  <div class=" mt-3 d-flex" >
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Region:</label>
                        <select class="form-control" name="letter_region" id="dropdownOptions">
                           <option value=""></option>
                           <option value="RHQ North">RHQ North</option>
                           <option value="RHQ Central 1">RHQ Central 1</option>
                           <option value="RHQ Central 2">RHQ Central 2</option>
                           <option value="RHQ Central 3">RHQ Central 3</option>
                           <option value="RHQ South">RHQ South</option>
                           <option value="addMore">Add More Region</option>
                        </select>
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity of Sales Letter Dispatched:   <br>  <input class="form-control" name="letter_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Price of Per Letter:    <br>  <input class="form-control" name="letter_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Price:   <br>  <input class="form-control" name="letter_total_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Segment:</label>
                        <select class="form-control" name="letter_segment" id="dropdownOptions_1">
                           <option value=""></option>
                           <option value="Oil">Oil</option>
                           <option value="Banks">Banks</option>
                           <option value="CPEC">CPEC</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched To:</label>
                        <select class="form-control" name="letter_dispatched" id="dropdownOptions_2">
                           <option value="CEO">CEO</option>
                           <option value="Head of Security">Head of Security</option>
                           <option value="Head of Procurement">Head of Procurement</option>
                           <option value="Administration Department">Administration Department</option>
                           <option value="HR Department">HR Department</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched with Signature/Visiting Card of:</label>
                        <select class="form-control" name="letter_signature" id="dropdownOptions_3">
                           <option value="CEO">CEO</option>
                           <option value="COO">COO</option>
                           <option value="CBO">CBO</option>
                           <option value="National Sales Manager">National Sales Manager</option>
                           <option value="Sales Manager">Sales Manager</option>
                           <option value="Manager Contract Management">Manager Contract Management</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6">
                        <div >
                           List of Address Recipient:   <br>  <input class="form-control" type="file" name="letter_address" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class=" col-lg-6">
                        Notes:  <br>
                        <textarea style="width: 100%;" name="letter_notes" cols="15" rows="4"></textarea>
                     </div>
                     <div class=" col-lg-6">
                        <div >
                           Attachement:   <br>  <input class="form-control" type="file" name="letter_attach" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="dispatch" role="tabpanel" aria-labelledby="dispatch-tab">
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Courier Name:    <br>  <input class="form-control" name="letter_courier_name" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Price Per Unit:   <br>  <input class="form-control" name="letter_courier_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity:    <br>  <input class="form-control" name="letter_courier_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Estimated Cost:   <br>  <input class="form-control" name="letter_courier_totalcost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost Of Campaign:    <br>  <input class="form-control" name="letter_compaign_cost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        No of Sales Letter Return:   <br>  <input class="form-control" name="letter_return" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Reason of Sales Letter Return:    <br>  <input class="form-control" name="letter_return_reason" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Sales Letter Return:   <br>  <input class="form-control" name="salesletter_return_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Per Unit Return Cost:    <br>  <input class="form-control" name="letter_return_cost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Return Cost:   <br>  <input class="form-control" name="letter_return_totalcost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <h5 class="mt-3 ml-3">Dispatched By:</h5>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Name:    <br>  <input class="form-control" name="letter_dispatch_name" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Employee No:   <br>  <input class="form-control" name="letter_dispatch_employee" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Designation:    <br>  <input class="form-control" name="letter_dispatch_desig" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Department:   <br>  <input class="form-control" name="letter_dispatch_dept" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 mt-2">
                        Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="letter_dispatch_notes" type="text" placeholder="..." style="width: 100%;"></textarea>
                     </div>
                     <div class="col-lg-6 mt-2">
                        Attachements    <br>  <input class="form-control" name="letter_dispatch_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="response" role="tabpanel" aria-labelledby="response-tab">
                  <button type="submit" class="btn btn-danger">Lead Generation</button> <br/>
                  <p class="mt-2">System is Redirecting you to the Lead Generation...</p>
               </div>
            </div>
         </div>
         <!-- Profile Dispatch Details -->
         <div class="col-lg-12 mt-3 profile" id="image2-details" style="display: none;">
            <div class="details">
               <h5>Campaign Leader:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" name="profile_leader_name" class="form-control" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Employee No:</label>
                        <input type="text" name="profile_employee" class="form-control" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" name="profile_cell" class="form-control" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col ">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="profile_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Campaign Start Date:</label>
                        <input type="text" name="profile_start_date" class="form-control" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Campaign End Date:</label>
                        <input type="text" name="profile_end_date" class="form-control" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
               <h5>Reporting To:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" name="profile_rep_name" class="form-control" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Designation:</label>
                        <input type="text" name="profile_rep_desig" class="form-control" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" name="profile_rep_cell" class="form-control" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Email ID:</label>
                        <input type="text" name="profile_rep_email" class="form-control" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3">
                     <div class="form-group col">
                        <p style="text-align: left; margin-bottom: 0px;"> <label for="notes">Notes:</label></p>
                        <textarea class="form-control" name="profile_rep_notes" id="notes" cols="42"  rows="2"></textarea>
                     </div>
                     <div class="col">
                        <label for="">Attachment:</label>
                        <input type="file" class="form-control" name="profile_rep_attach" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
            </div>
            <!-- Tabs-->
            <nav>
               <div class="nav nav-tabs mt-3" id="myTabs" role="tablist">
                  <a class="nav-item nav-link active" id="spread1-tab" data-bs-toggle="tab" href="#spread1" role="tab" aria-controls="spread1" aria-selected="true">Spread</a>
                  <a class="nav-item nav-link" id="dispatch1-tab" data-bs-toggle="tab" href="#dispatch1" role="tab" aria-controls="dispatch1" aria-selected="false">Dispatching Details</a>
                  <a class="nav-item nav-link" id="response1-tab" data-bs-toggle="tab" href="#response1" role="tab" aria-controls="response1" aria-selected="false">Response</a>
               </div>
            </nav>
            <!-- Tabs Details -->
            <div class="tab-content" id="myTabsContent1">
               <div class="tab-pane fade show active" id="spread1" role="tabpanel" aria-labelledby="spread1-tab">
                  <div class=" mt-3 d-flex" >
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Region:</label>
                        <select class="form-control" name="profile_region" id="dropdownOptions_32">
                           <option value="option1">RHQ North</option>
                           <option value="option2">RHQ Central 1</option>
                           <option value="option3">RHQ Central 2</option>
                           <option value="option4">RHQ Central 3</option>
                           <option value="option5">RHQ South</option>
                           <option value="addMore">Add More Region</option>
                        </select>
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity of Profile Dispatched:   <br>  <input class="form-control" name="profile_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Price of Per Profile:    <br>  <input class="form-control" name="profile_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Price:   <br>  <input class="form-control" name="profile_total_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Segment:</label>
                        <select class="form-control" name="profile_segment" id="dropdownOptions_33">
                           <option value="option1">Oil</option>
                           <option value="option2">Banks</option>
                           <option value="option3">CPEC</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched To:</label>
                        <select class="form-control" name="profile_dispatched" id="dropdownOptions_34">
                           <option value="option1">CEO</option>
                           <option value="option2">Head of Security</option>
                           <option value="option3">Head of Procurement</option>
                           <option value="option4">Administration Department</option>
                           <option value="option5">HR Department</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched with Signature/Visiting Card of:</label>
                        <select class="form-control" name="profile_signature" id="dropdownOptions_35">
                           <option value="option1">CEO</option>
                           <option value="option2">COO</option>
                           <option value="option3">CBO</option>
                           <option value="option4">National Sales Manager</option>
                           <option value="option5">Sales Manager</option>
                           <option value="option5">Manager Contract Management</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6">
                        <div >
                           List of Address Recipient:   <br>  <input class="form-control" name="profile_address" type="file" id="degree" name="Degree[]" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class=" col-lg-6">
                        Notes:  <br>
                        <textarea style="width: 100%;" name="profile_notes" id="" cols="15" rows="4"></textarea>
                     </div>
                     <div class=" col-lg-6">
                        <div >
                           Attachement:   <br>  <input class="form-control" type="file" id="degree" name="profile_attach" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="dispatch1" role="tabpanel" aria-labelledby="dispatch1-tab">
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Courier Name:    <br>  <input class="form-control" name="profile_courier_name" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Price Per Unit:   <br>  <input class="form-control" name="profile_courier_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity:    <br>  <input class="form-control" name="profile_courier_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Estimated Cost:   <br>  <input class="form-control" name="profile_courier_totalcost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost Of Campaign:    <br>  <input class="form-control" name="profile_compaign_cost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        No of Profile Return:   <br>  <input class="form-control" name="profile_return" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Reason:    <br>  <input class="form-control" name="profile_return_reason" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Profile Return:   <br>  <input class="form-control" name="profile_return_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Return Cost:    <br>  <input class="form-control" name="profile_return_cost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost:   <br>  <input class="form-control" name="profile_return_totalcost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <h5 class="mt-3 ml-3">Dispatched By:</h5>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Name:    <br>  <input class="form-control" name="profile_dispatch_name" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Employee No:   <br>  <input class="form-control" name="profile_dispatch_employee" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Designation:    <br>  <input class="form-control" name="profile_dispatch_desig" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Department:   <br>  <input class="form-control" name="profile_dispatch_dept" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 mt-2">
                        Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="profile_dispatch_notes" type="text" placeholder="..." style="width: 100%;"></textarea>
                     </div>
                     <div class="col-lg-6 mt-2">
                        Attachements    <br>  <input class="form-control" name="profile_dispatch_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="response1" role="tabpanel" aria-labelledby="response1-tab">
                  <button type="submit" class="btn btn-danger">Redirecting</button>
                  System is Redirecting you to the Lead Generation...
               </div>
            </div>
            <!--  -->
         </div>
         <!--  -->
         <!-- SMS Details -->
         <div class="col-lg-12 mt-3 sms" id="image3-details" style="display: none;">
            <div class="details">
               <h5>Campaign Leader:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="sms_leader_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Employee No:</label>
                        <input type="text" class="form-control" name="sms_employee" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="sms_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col ">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="sms_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Campaign Start Date:</label>
                        <input type="date" class="form-control" name="sms_start_date" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Campaign End Date:</label>
                        <input type="date" class="form-control" name="sms_end_date" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
               <h5>Reporting To:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="sms_rep_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Designation:</label>
                        <input type="text" class="form-control" name="sms_rep_desig" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="sms_rep_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="sms_rep_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3">
                     <div class="form-group col">
                        <p style="text-align: left; margin-bottom: 0px;"> <label for="notes">Notes:</label></p>
                        <textarea class="form-control" name="sms_rep_notes" id="notes" cols="42"  rows="2"></textarea>
                     </div>
                     <div class="  col">
                        <label for="">Attachment:</label>
                        <input type="file" class="form-control" name="sms_rep_attach" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
            </div>
            <!-- Tabs-->
            <nav>
               <div class="nav nav-tabs mt-3" id="myTabs" role="tablist">
                  <a class="nav-item nav-link active" id="spread2-tab" data-bs-toggle="tab" href="#spread2" role="tab" aria-controls="spread2" aria-selected="true">Spread</a>
                  <a class="nav-item nav-link" id="dispatch2-tab" data-bs-toggle="tab" href="#dispatch2" role="tab" aria-controls="dispatch2" aria-selected="false">Dispatching Details</a>
                  <a class="nav-item nav-link" id="response2-tab" data-bs-toggle="tab" href="#response2" role="tab" aria-controls="response2" aria-selected="false">Response</a>
               </div>
            </nav>
            <!--  -->
            <!-- Tabs Details -->
            <div class="tab-content" id="myTabsContent2">
               <div class="tab-pane fade show active"  id="spread2" role="tabpanel" aria-labelledby="spread2-tab">
                  <div class=" mt-3 d-flex" >
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Region:</label>
                        <select class="form-control" name="sms_region" id="dropdownOptions_4">
                           <option value="option1">RHQ North</option>
                           <option value="option2">RHQ Central 1</option>
                           <option value="option3">RHQ Central 2</option>
                           <option value="option4">RHQ Central 3</option>
                           <option value="option5">RHQ South</option>
                           <option value="addMore">Add More Region</option>
                        </select>
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity of SMS sent:   <br>  <input class="form-control" name="sms_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Price of Per SMS:    <br>  <input class="form-control" name="sms_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Price:   <br>  <input class="form-control" name="sms_total_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Segment:</label>
                        <select class="form-control" name="sms_region" id="dropdownOptions_5">
                           <option value="option1">Oil</option>
                           <option value="option2">Banks</option>
                           <option value="option3">CPEC</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Sent To:</label>
                        <select class="form-control" name="sms_sent_to" id="dropdownOptions_6">
                           <option value="option1">CEO</option>
                           <option value="option2">Head of Security</option>
                           <option value="option3">Head of Procurement</option>
                           <option value="option4">Administration Department</option>
                           <option value="option5">HR Department</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched with Signature/Visiting Card of:</label>
                        <select class="form-control" name="sms_signature" id="dropdownOptions_7">
                           <option value="option1">CEO</option>
                           <option value="option2">COO</option>
                           <option value="option3">CBO</option>
                           <option value="option4">National Sales Manager</option>
                           <option value="option5">Sales Manager</option>
                           <option value="option5">Manager Contract Management</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6">
                        <div >
                           List of Address Recipient:   <br>  <input class="form-control" type="file" name="sms_address" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class=" col-lg-6">
                        Notes:  <br>
                        <textarea style="width: 100%;" name="sms_notes" cols="15" rows="4"></textarea>
                     </div>
                     <div class=" col-lg-6">
                        <div >
                           Attachement:   <br>  <input class="form-control" type="file" name="sms_attach" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="dispatch2" role="tabpanel" aria-labelledby="dispatch2-tab">
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Network Name:    <br>  <input class="form-control" name="sms_network" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Price Per Unit:   <br>  <input class="form-control" name="sms_dispatch_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity:    <br>  <input class="form-control" name="sms_dispatch_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Estimated Cost:   <br>  <input class="form-control" name="sms_dispatch_totalcost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost Of Campaign:    <br>  <input class="form-control" name="sms_compaign_totalcost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        No of SMS Return:   <br>  <input class="form-control" name="sms_return" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Reason:    <br>  <input class="form-control" name="sms_return_reason" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        SMS Return:   <br>  <input class="form-control" name="sms_return_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <h5 class="mt-3 ml-3">Dispatched By:</h5>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Name:    <br>  <input class="form-control" name="sms_dispatch_name" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Employee No:   <br>  <input class="form-control" name="sms_dispatch_employee" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Designation:    <br>  <input class="form-control" name="sms_dispatch_desig" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Department:   <br>  <input class="form-control" name="sms_dispatch_dept" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 mt-2">
                        Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="sms_dispatch_notes" type="text" placeholder="..." style="width: 100%;"></textarea>
                     </div>
                     <div class="col-lg-6 mt-2">
                        Attachements    <br>  <input class="form-control" name="sms_dispatch_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="response2" role="tabpanel" aria-labelledby="response2-tab">
                  <button type="submit" class="btn btn-danger">Lead Generation</button> <br/>
                  <p class="mt-2">System is Redirecting you to the Lead Generation...</p>
               </div>
            </div>
            <!--  -->
         </div>
         <!--  -->
         <!--Email Details -->
         <div class="col-lg-12 mt-3 email" id="image4-details" style="display: none;">
            <div class="details">
               <h5>Campaign Leader:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="email_leader_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Employee No:</label>
                        <input type="text" class="form-control" name="email_employee" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="email_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col ">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="email_id" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Campaign Start Date:</label>
                        <input type="text" class="form-control" name="email_start_date" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Campaign End Date:</label>
                        <input type="text" class="form-control" name="email_end_date" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
               <h5>Reporting To:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="email_rep_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Designation:</label>
                        <input type="text" class="form-control" name="email_rep_desig" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="email_rep_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="email_rep_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3">
                     <div class="form-group col">
                        <p style="text-align: left; margin-bottom: 0px;"> <label for="notes">Notes:</label></p>
                        <textarea class="form-control" name="email_rep_notes" cols="42"  rows="2"></textarea>
                     </div>
                     <div class="  col">
                        <label for="">Attachment:</label>
                        <input type="file" class="form-control" name="email_rep_attach" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
            </div>
            <!-- Tabs-->
            <nav>
               <div class="nav nav-tabs mt-3" id="myTabs" role="tablist">
                  <a class="nav-item nav-link active" id="spread3-tab" data-bs-toggle="tab" href="#spread3" role="tab" aria-controls="spread3" aria-selected="true">Spread</a>
                  <a class="nav-item nav-link" id="dispatch3-tab" data-bs-toggle="tab" href="#dispatch3" role="tab" aria-controls="dispatch3" aria-selected="false">Dispatching Details</a>
                  <a class="nav-item nav-link" id="response3-tab" data-bs-toggle="tab" href="#response3" role="tab" aria-controls="response3" aria-selected="false">Response</a>
               </div>
            </nav>
            <!--  -->
            <!-- Tabs Details -->
            <div class="tab-content" id="myTabsContent3">
               <div class="tab-pane fade show active" id="spread3" role="tabpanel" aria-labelledby="spread3-tab">
                  <div class=" mt-3 d-flex" >
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Region:</label>
                        <select class="form-control" name="email_region" id="dropdownOptions_8">
                           <option value="option1">RHQ North</option>
                           <option value="option2">RHQ Central 1</option>
                           <option value="option3">RHQ Central 2</option>
                           <option value="option4">RHQ Central 3</option>
                           <option value="option5">RHQ South</option>
                           <option value="addMore">Add More Region</option>
                        </select>
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total emails sent:   <br>  <input class="form-control" name="total_email_sent" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Segment:</label>
                        <select class="form-control" name="email_segment" id="dropdownOptions_9">
                           <option value="option1">Oil</option>
                           <option value="option2">Banks</option>
                           <option value="option3">CPEC</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Sent To:</label>
                        <select class="form-control" name="email_sent_to" id="dropdownOptions_10">
                           <option value="option1">CEO</option>
                           <option value="option2">Head of Security</option>
                           <option value="option3">Head of Procurement</option>
                           <option value="option4">Administration Department</option>
                           <option value="option5">HR Department</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched with Signature/Visiting Card of:</label>
                        <select class="form-control" name="email_signature" id="dropdownOptions_11">
                           <option value="option1">CEO</option>
                           <option value="option2">COO</option>
                           <option value="option3">CBO</option>
                           <option value="option4">National Sales Manager</option>
                           <option value="option5">Sales Manager</option>
                           <option value="option5">Manager Contract Management</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6">
                        <div >
                           List of Address Recipient:   <br>  <input class="form-control"  type="file" name="email_address" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class=" col-lg-6">
                        Notes:  <br>
                        <textarea style="width: 100%;" name="email_notes" id="" cols="15" rows="4"></textarea>
                     </div>
                     <div class=" col-lg-6">
                        <div >
                           Attachement:   <br>  <input class="form-control" type="file" name="email_attach" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="dispatch3" role="tabpanel" aria-labelledby="dispatch3-tab">
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Domain (Email ID):    <br>  <input class="form-control" name="email_domain" type="email" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Price Per Unit:   <br>  <input class="form-control" name="email_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity:    <br>  <input class="form-control" name="email_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Estimated Cost:   <br>  <input class="form-control" name="email_totalcost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost Of Campaign:    <br>  <input class="form-control" name="email_compaign_cost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        No of Email Return:   <br>  <input class="form-control" name="email_return" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Reason:    <br>  <input class="form-control" name="email_return_reason" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Emails Return:   <br>  <input class="form-control" name="email_return_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <h5 class="mt-3 ml-3">Sent By:</h5>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Name:    <br>  <input class="form-control" name="email_sent_name" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Employee No:   <br>  <input class="form-control" name="email_sent_employee" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Designation:    <br>  <input class="form-control" name="email_sent_desig" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Department:   <br>  <input class="form-control" name="email_sent_dept" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 mt-2">
                        Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="email_sent_notes" type="text" placeholder="..." style="width: 100%;"></textarea>
                     </div>
                     <div class="col-lg-6 mt-2">
                        Attachements    <br>  <input class="form-control" name="email_sent_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="response3" role="tabpanel" aria-labelledby="response3-tab">
                  <button type="submit" class="btn btn-danger">Lead Generation</button> <br/>
                  <p class="mt-2">System is Redirecting you to the Lead Generation...</p>
               </div>
            </div>
            <!--  -->
         </div>
         <!--  -->
         <!-- Giveaways Details -->
         <div class="col-lg-12 mt-3 giveaways" id="image5-details" style="display: none;">
            <div class="details">
               <h5>Campaign Leader:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="give_leader_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Employee No:</label>
                        <input type="text" class="form-control" name="give_employee" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="give_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col ">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="give_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Campaign Start Date:</label>
                        <input type="text" class="form-control" name="give_start_date" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Campaign End Date:</label>
                        <input type="text" class="form-control" name="give_end_date" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
               <h5>Reporting To:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="give_rep_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Designation:</label>
                        <input type="text" class="form-control" name="give_rep_desig" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="give_rep_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="give_rep_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3">
                     <div class="form-group col">
                        <p style="text-align: left; margin-bottom: 0px;"> <label for="notes">Notes:</label></p>
                        <textarea class="form-control" name="give_rep_notes" cols="42"  rows="2"></textarea>
                     </div>
                     <div class="  col">
                        <label for="">Attachment:</label>
                        <input type="file" class="form-control" name="give_rep_attach" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
            </div>
            <!-- Tabs-->
            <nav>
               <div class="nav nav-tabs mt-3" id="myTabs" role="tablist">
                  <a class="nav-item nav-link active" id="spread4-tab" data-bs-toggle="tab" href="#spread4" role="tab" aria-controls="spread4" aria-selected="true">Spread</a>
                  <a class="nav-item nav-link" id="dispatch4-tab" data-bs-toggle="tab" href="#dispatch4" role="tab" aria-controls="dispatch4" aria-selected="false">Dispatching Details</a>
                  <a class="nav-item nav-link" id="response4-tab" data-bs-toggle="tab" href="#response4" role="tab" aria-controls="response4" aria-selected="false">Response</a>
               </div>
            </nav>
            <!--  -->
            <!-- Tabs Details -->
            <div class="tab-content" id="myTabsContent4">
               <div class="tab-pane fade show active" id="spread4" role="tabpanel" aria-labelledby="spread4-tab">
                  <div class=" mt-3 d-flex" >
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Region:</label>
                        <select class="form-control" name="give_region" id="dropdownOptions_12">
                           <option value="option1">RHQ North</option>
                           <option value="option2">RHQ Central 1</option>
                           <option value="option3">RHQ Central 2</option>
                           <option value="option4">RHQ Central 3</option>
                           <option value="option5">RHQ South</option>
                           <option value="addMore">Add More Region</option>
                        </select>
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Giveaway Item Name:   <br>  <input class="form-control" name="give_item_name" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity of Giveaway Dispatched:   <br>  <input class="form-control" name="give_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Price of Per Giveaway:   <br>  <input class="form-control" name="give_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Price:   <br>  <input class="form-control" name="give_totalcost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Segment:</label>
                        <select class="form-control" name="give_segment" id="dropdownOptions_13">
                           <option value="option1">Oil</option>
                           <option value="option2">Banks</option>
                           <option value="option3">CPEC</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched To:</label>
                        <select class="form-control" name="give_dispatched" id="dropdownOptions_14">
                           <option value="option1">CEO</option>
                           <option value="option2">Head of Security</option>
                           <option value="option3">Head of Procurement</option>
                           <option value="option4">Administration Department</option>
                           <option value="option5">HR Department</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched with Signature/Visiting Card of:</label>
                        <select class="form-control" name="give_signature" id="dropdownOptions_15">
                           <option value="option1">CEO</option>
                           <option value="option2">COO</option>
                           <option value="option3">CBO</option>
                           <option value="option4">National Sales Manager</option>
                           <option value="option5">Sales Manager</option>
                           <option value="option5">Manager Contract Management</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6">
                        <div >
                           List of Address Recipient:   <br>  <input class="form-control" type="file" name="give_address" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class=" col-lg-6">
                        Notes:  <br>
                        <textarea style="width: 100%;" name="give_notes" id="" cols="15" rows="4"></textarea>
                     </div>
                     <div class=" col-lg-6">
                        <div >
                           Attachement:   <br>  <input class="form-control" type="file" name="give_attach" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="dispatch4" role="tabpanel" aria-labelledby="dispatch4-tab">
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Courier Name:    <br>  <input class="form-control" name="give_courier_name" type="email" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Price Per Unit:   <br>  <input class="form-control" name="give_courier_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity:    <br>  <input class="form-control" name="give_courier_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Estimated Cost:   <br>  <input class="form-control" name="give_courier_totalcost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost Of Campaign:    <br>  <input class="form-control" name="give_compaign_cost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        No of Giveaways Return:   <br>  <input class="form-control" name="give_return" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Reason:    <br>  <input class="form-control" name="give_return_reason" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Giveaways Return:   <br>  <input class="form-control" name="give_return_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Return Cost:    <br>  <input class="form-control" name="give_return_cost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost:   <br>  <input class="form-control" name="give_return_totalcost" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <h5 class="mt-3 ml-3">Dispatched By:</h5>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Name:    <br>  <input class="form-control" name="give_dispatch_name" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Employee No:   <br>  <input class="form-control" name="give_dispatch_employee" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Designation:    <br>  <input class="form-control" name="give_dispatch_desig" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Department:   <br>  <input class="form-control" name="give_dispatch_dept" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 mt-2">
                        Notes <br> <textarea class="form-control mt-1" id="head_office_na" name="give_dispatch_notes" type="text" placeholder="..." style="width: 100%;"></textarea>
                     </div>
                     <div class="col-lg-6 mt-2">
                        Attachements    <br>  <input class="form-control" name="give_dispatch_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="response4" role="tabpanel" aria-labelledby="response4-tab">
                  <button type="submit" class="btn btn-danger">Lead Generation</button> <br/>
                  <p class="mt-2">System is Redirecting you to the Lead Generation...</p>
               </div>
            </div>
         </div>
         <!--  -->
         <!-- Bill Board Details -->
         <div class="col-lg-12 mt-3 billboard" id="image6-details" style="display: none;">
            <div class="details">
               <h5>Campaign Leader:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="bill_leader_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Employee No:</label>
                        <input type="text" class="form-control" name="bill_employee" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="bill_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col ">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="bill_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Campaign Start Date:</label>
                        <input type="text" class="form-control" name="bill_start_date" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Campaign End Date:</label>
                        <input type="text" class="form-control" name="bill_end_date" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
               <h5>Reporting To:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="bill_rep_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Designation:</label>
                        <input type="text" class="form-control" name="bill_rep_desig" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="bill_rep_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="bill_rep_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3">
                     <div class="form-group col">
                        <p style="text-align: left; margin-bottom: 0px;"> <label for="notes">Notes:</label></p>
                        <textarea class="form-control" name="bill_rep_notes" cols="42"  rows="2"></textarea>
                     </div>
                     <div class="  col">
                        <label for="">Attachment:</label>
                        <input type="file" class="form-control" name="bill_rep_attach" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
            </div>
            <!-- Tabs-->
            <nav>
               <div class="nav nav-tabs mt-3" id="myTabs" role="tablist">
                  <a class="nav-item nav-link active" id="spread5-tab" data-bs-toggle="tab" href="#spread5" role="tab" aria-controls="spread5" aria-selected="true">Spread</a>
                  <a class="nav-item nav-link" id="dispatch5-tab" data-bs-toggle="tab" href="#dispatch5" role="tab" aria-controls="dispatch5" aria-selected="false">Dispatching Details</a>
                  <a class="nav-item nav-link" id="response5-tab" data-bs-toggle="tab" href="#response5" role="tab" aria-controls="response5" aria-selected="false">Response</a>
               </div>
            </nav>
            <!--  -->
            <!-- Tabs Details -->
            <div class="tab-content" id="myTabsContent5">
               <div class="tab-pane fade show active" id="spread5" role="tabpanel" aria-labelledby="spread5-tab">
                  <div class=" mt-3 d-flex" >
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Region:</label>
                        <select class="form-control" name="bill_region" id="dropdownOptions_16">
                           <option value="option1">RHQ North</option>
                           <option value="option2">RHQ Central 1</option>
                           <option value="option3">RHQ Central 2</option>
                           <option value="option4">RHQ Central 3</option>
                           <option value="option5">RHQ South</option>
                           <option value="addMore">Add More Region</option>
                        </select>
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity of Bill Board:   <br>  <input class="form-control" name="bill_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Price of Per Bill Board:   <br>  <input class="form-control" name="bill_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Price:   <br>  <input class="form-control" name="bill_total_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Segment:</label>
                        <select class="form-control" name="bill_segment" id="dropdownOptions_17">
                           <option value="option1">Oil</option>
                           <option value="option2">Banks</option>
                           <option value="option3">CPEC</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched To:</label>
                        <select class="form-control" name="bill_dispatched" id="dropdownOptions_18">
                           <option value="option1">CEO</option>
                           <option value="option2">Head of Security</option>
                           <option value="option3">Head of Procurement</option>
                           <option value="option4">Administration Department</option>
                           <option value="option5">HR Department</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched with Signature/Visiting Card of:</label>
                        <select class="form-control" name="bill_signature" id="dropdownOptions_19">
                           <option value="option1">CEO</option>
                           <option value="option2">COO</option>
                           <option value="option3">CBO</option>
                           <option value="option4">National Sales Manager</option>
                           <option value="option5">Sales Manager</option>
                           <option value="option5">Manager Contract Management</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6">
                        <div >
                           List of Address Recipient:   <br>  <input class="form-control" type="file" name="bill_address" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class=" col-lg-6">
                        Notes:  <br>
                        <textarea style="width: 100%;" name="bill_notes" id="" cols="15" rows="4"></textarea>
                     </div>
                     <div class=" col-lg-6">
                        <div >
                           Attachement:   <br>  <input class="form-control" type="file" name="bill_attach" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="dispatch5" role="tabpanel" aria-labelledby="dispatch5-tab">
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Courier Name:    <br>  <input class="form-control" name="bill_courier_name" type="email" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Price Per Unit:   <br>  <input class="form-control" name="bill_courier_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity:    <br>  <input class="form-control" name="bill_courier_quantity"  type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Estimated Cost:   <br>  <input class="form-control" name="bill_courier_totalcost"  type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost Of Campaign:    <br>  <input class="form-control" name="bill_compaign_cost"  type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <h5 class="mt-3 ml-3">Dispatched By:</h5>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Name:    <br>  <input class="form-control" name="bill_dispatch_name"  type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Employee No:   <br>  <input class="form-control" name="bill_dispatch_employee" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Designation:    <br>  <input class="form-control" name="bill_dispatch_desig" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Department:   <br>  <input class="form-control" name="bill_dispatch_dept" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 mt-2">
                        Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="bill_dispatch_notes" type="text" placeholder="..." style="width: 100%;"></textarea>
                     </div>
                     <div class="col-lg-6 mt-2">
                        Attachements    <br>  <input class="form-control" name="bill_dispatch_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="response5" role="tabpanel" aria-labelledby="response5-tab">
                  <button type="submit" class="btn btn-danger">Lead Generation</button> <br/>
                  <p class="mt-2">System is Redirecting you to the Lead Generation...</p>
               </div>
            </div>
         </div>
         <!--  -->
         <!-- Calender Details -->
         <div class="col-lg-12 mt-3 calender" id="image7-details" style="display: none;">
            <div class="details">
               <h5>Campaign Leader:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="calender_leader_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Employee No:</label>
                        <input type="text" class="form-control" name="calender_employee" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="calender_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col ">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="calender_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Campaign Start Date:</label>
                        <input type="text" class="form-control" name="calender_start_date" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Campaign End Date:</label>
                        <input type="text" class="form-control" name="calender_end_date" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
               <h5>Reporting To:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="calender_rep_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Designation:</label>
                        <input type="text" class="form-control" name="calender_rep_desig" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="calender_rep_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="calender_rep_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3">
                     <div class="form-group col">
                        <p style="text-align: left; margin-bottom: 0px;"> <label for="notes">Notes:</label></p>
                        <textarea class="form-control" name="calender_rep_notes" id="notes" cols="42"  rows="2"></textarea>
                     </div>
                     <div class="  col">
                        <label for="">Attachment:</label>
                        <input type="file" class="form-control" name="calender_rep_attach" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
            </div>
            <!-- Tabs-->
            <nav>
               <div class="nav nav-tabs mt-3" id="myTabs" role="tablist">
                  <a class="nav-item nav-link active" id="spread6-tab" data-bs-toggle="tab" href="#spread6" role="tab" aria-controls="spread6" aria-selected="true">Spread</a>
                  <a class="nav-item nav-link" id="dispatch6-tab" data-bs-toggle="tab" href="#dispatch6" role="tab" aria-controls="dispatch6" aria-selected="false">Dispatching Details</a>
                  <a class="nav-item nav-link" id="response6-tab" data-bs-toggle="tab" href="#response6" role="tab" aria-controls="response6" aria-selected="false">Response</a>
               </div>
            </nav>
            <!--  -->
            <!-- Tabs Details -->
            <div class="tab-content" id="myTabsContent6">
               <div class="tab-pane fade show active" id="spread6" role="tabpanel" aria-labelledby="spread6-tab">
                  <div class=" mt-3 d-flex" >
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Region:</label>
                        <select class="form-control" name="calender_region" id="dropdownOptions_20">
                           <option value="option1">RHQ North</option>
                           <option value="option2">RHQ Central 1</option>
                           <option value="option3">RHQ Central 2</option>
                           <option value="option4">RHQ Central 3</option>
                           <option value="option5">RHQ South</option>
                           <option value="addMore">Add More Region</option>
                        </select>
                     </div>
                     <!-- <div class="col-lg-6 spacing-right mt-2">
                        Giveaway Item Name:   <br>  <input class="form-control" name="phy_address" type="text" placeholder="..." style="width: 100%;">
                        </div> -->
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity of Calender Dispatched:   <br>  <input class="form-control" name="calender_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Price of Per Calender:   <br>  <input class="form-control" name="calender_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Price:   <br>  <input class="form-control" name="calender_total_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Segment:</label>
                        <select class="form-control" name="calender_segment" id="dropdownOptions_21">
                           <option value="option1">Oil</option>
                           <option value="option2">Banks</option>
                           <option value="option3">CPEC</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched To:</label>
                        <select class="form-control" name="calender_dispatched" id="dropdownOptions_22">
                           <option value="option1">CEO</option>
                           <option value="option2">Head of Security</option>
                           <option value="option3">Head of Procurement</option>
                           <option value="option4">Administration Department</option>
                           <option value="option5">HR Department</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched with Signature/Visiting Card of:</label>
                        <select class="form-control" name="calender_signature" id="dropdownOptions_23">
                           <option value="option1">CEO</option>
                           <option value="option2">COO</option>
                           <option value="option3">CBO</option>
                           <option value="option4">National Sales Manager</option>
                           <option value="option5">Sales Manager</option>
                           <option value="option5">Manager Contract Management</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6">
                        <div >
                           List of Address Recipient:   <br>  <input class="form-control" type="file" name="calender_address" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class=" col-lg-6">
                        Notes:  <br>
                        <textarea style="width: 100%;" name="calender_notes" id="" cols="15" rows="4"></textarea>
                     </div>
                     <div class=" col-lg-6">
                        <div >
                           Attachement:   <br>  <input class="form-control" type="file" name="calender_attach" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="dispatch6" role="tabpanel" aria-labelledby="dispatch6-tab">
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Courier Name:    <br>  <input class="form-control" name="calender_courier_name" type="email" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Price Per Unit:   <br>  <input class="form-control" name="calender_courier_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity:    <br>  <input class="form-control" name="calender_courier_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Estimated Cost:   <br>  <input class="form-control" name="calender_courier_totalcost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost Of Campaign:    <br>  <input class="form-control" name="calender_compaign_cost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        No of Calender Return:   <br>  <input class="form-control" name="calender_return" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Reason:    <br>  <input class="form-control" name="calender_return_reason" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Calender Return:   <br>  <input class="form-control" name="calender_return_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Return Cost Per Unit:    <br>  <input class="form-control" name="calender_return_cost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost:   <br>  <input class="form-control" name="calender_return_totalcost" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <h5 class="mt-3 ml-3">Dispatched By:</h5>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Name:    <br>  <input class="form-control" name="calender_dispatch_name" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Employee No:   <br>  <input class="form-control" name="calender_dispatch_employee" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Designation:    <br>  <input class="form-control" name="calender_dispatch_desig" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Department:   <br>  <input class="form-control" name="calender_dispatch_dept" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 mt-2">
                        Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="calender_dispatch_notes" type="text" placeholder="..." style="width: 100%;"></textarea>
                     </div>
                     <div class="col-lg-6 mt-2">
                        Attachements    <br>  <input class="form-control" name="calender_dispatch_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="response6" role="tabpanel" aria-labelledby="response6-tab">
                  <button type="submit" class="btn btn-danger">Lead Generation</button> <br/>
                  <p class="mt-2">System is Redirecting you to the Lead Generation...</p>
               </div>
            </div>
         </div>
         <!--  -->
         <!-- Clock details -->
         <div class="col-lg-12 mt-3 clock" id="image8-details" style="display: none;">
            <div class="details">
               <h5>Campaign Leader:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="clock_leader_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Employee No:</label>
                        <input type="text" class="form-control" name="clock_employee" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="clock_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col ">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="clock_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Campaign Start Date:</label>
                        <input type="text" class="form-control" name="clock_start_date" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Campaign End Date:</label>
                        <input type="text" class="form-control" name="clock_end_date" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
               <h5>Reporting To:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="clock_rep_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Designation:</label>
                        <input type="text" class="form-control" name="clock_rep_desig" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="clock_rep_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="clock_rep_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3">
                     <div class="form-group col">
                        <p style="text-align: left; margin-bottom: 0px;"> <label for="notes">Notes:</label></p>
                        <textarea class="form-control" name="clock_rep_notes" id="notes" cols="42"  rows="2"></textarea>
                     </div>
                     <div class="  col">
                        <label for="">Attachment:</label>
                        <input type="file" class="form-control" name="clock_rep_attach" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
            </div>
            <!-- Tabs-->
            <nav>
               <div class="nav nav-tabs mt-3" id="myTabs" role="tablist">
                  <a class="nav-item nav-link active" id="spread7-tab" data-bs-toggle="tab" href="#spread7" role="tab" aria-controls="spread7" aria-selected="true">Spread</a>
                  <a class="nav-item nav-link" id="dispatch7-tab" data-bs-toggle="tab" href="#dispatch7" role="tab" aria-controls="dispatch7" aria-selected="false">Dispatching Details</a>
                  <a class="nav-item nav-link" id="response7-tab" data-bs-toggle="tab" href="#response7" role="tab" aria-controls="response7" aria-selected="false">Response</a>
               </div>
            </nav>
            <!-- Tabs Details -->
            <div class="tab-content" id="myTabsContent7">
               <div class="tab-pane fade show active" id="spread7" role="tabpanel" aria-labelledby="spread7-tab">
                  <div class=" mt-3 d-flex" >
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Region:</label>
                        <select class="form-control" name="clock_region" id="dropdownOptions_24">
                           <option value="option1">RHQ North</option>
                           <option value="option2">RHQ Central 1</option>
                           <option value="option3">RHQ Central 2</option>
                           <option value="option4">RHQ Central 3</option>
                           <option value="option5">RHQ South</option>
                           <option value="addMore">Add More Region</option>
                        </select>
                     </div>
                     <!-- <div class="col-lg-6 spacing-right mt-2">
                        Giveaway Item Name:   <br>  <input class="form-control" name="phy_address" type="text" placeholder="..." style="width: 100%;">
                        </div> -->
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity of Clock Dispatched:   <br>  <input class="form-control" name="clock_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Price of Per Clock:   <br>  <input class="form-control" name="clock_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Price:   <br>  <input class="form-control" name="clock_total_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Segment:</label>
                        <select class="form-control" name="clock_segment" id="dropdownOptions_25">
                           <option value="option1">Oil</option>
                           <option value="option2">Banks</option>
                           <option value="option3">CPEC</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched To:</label>
                        <select class="form-control" name="clock_dispatched" id="dropdownOptions_26">
                           <option value="option1">CEO</option>
                           <option value="option2">Head of Security</option>
                           <option value="option3">Head of Procurement</option>
                           <option value="option4">Administration Department</option>
                           <option value="option5">HR Department</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched with Signature/Visiting Card of:</label>
                        <select class="form-control" name="clock_signature" id="dropdownOptions_27">
                           <option value="option1">CEO</option>
                           <option value="option2">COO</option>
                           <option value="option3">CBO</option>
                           <option value="option4">National Sales Manager</option>
                           <option value="option5">Sales Manager</option>
                           <option value="option5">Manager Contract Management</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6">
                        <div >
                           List of Address Recipient:   <br>  <input class="form-control" type="file" name="clock_address" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class=" col-lg-6">
                        Notes:  <br>
                        <textarea style="width: 100%;" name="clock_notes" id="" cols="15" rows="4"></textarea>
                     </div>
                     <div class=" col-lg-6">
                        <div >
                           Attachement:   <br>  <input class="form-control" type="file" name="clock_attach" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="dispatch7" role="tabpanel" aria-labelledby="dispatch7-tab">
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Courier Name:    <br>  <input class="form-control" name="clock_courier_name" type="email" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Price Per Unit:   <br>  <input class="form-control" name="clock_courier_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity:    <br>  <input class="form-control" name="clock_courier_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Estimated Cost:   <br>  <input class="form-control" name="clock_courier_totalcost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost Of Campaign:    <br>  <input class="form-control" name="clock_compaign_cost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        No of Clock Return:   <br>  <input class="form-control" name="clock_return" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Reason:    <br>  <input class="form-control" name="clock_return_reason" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Clock Return:   <br>  <input class="form-control" name="clock_return_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Return Cost Per Unit:    <br>  <input class="form-control" name="clock_return_cost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost:   <br>  <input class="form-control" name="clock_return_totalcost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <h5 class="mt-3 ml-3">Dispatched By:</h5>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Name:    <br>  <input class="form-control" name="clock_dispatch_name" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Employee No:   <br>  <input class="form-control" name="clock_dispatch_employee" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Designation:    <br>  <input class="form-control" name="clock_dispatch_desig" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Department:   <br>  <input class="form-control" name="clock_dispatch_dept" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 mt-2">
                        Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="clock_dispatch_notes" type="text" placeholder="..." style="width: 100%;"></textarea>
                     </div>
                     <div class="col-lg-6 mt-2">
                        Attachements    <br>  <input class="form-control" name="clock_dispatch_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="response7" role="tabpanel" aria-labelledby="response7-tab">
                  <button type="submit" class="btn btn-danger">Lead Generation</button> <br/>
                  <p class="mt-2">System is Redirecting you to the Lead Generation...</p>
               </div>
            </div>
         </div>
         <!--  -->
         <!-- Mangoes Details -->
         <div class="col-lg-12 mt-3 mangoes" id="image9-details" style="display: none;">
            <div class="details">
               <h5>Campaign Leader:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="mango_leader_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Employee No:</label>
                        <input type="text" class="form-control" name="mango_employee" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="mango_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col ">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="mango_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Campaign Start Date:</label>
                        <input type="text" class="form-control" name="mango_start_date" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Campaign End Date:</label>
                        <input type="text" class="form-control" name="mango_end_date" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
               <h5>Reporting To:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="mango_rep_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Designation:</label>
                        <input type="text" class="form-control" name="mango_rep_desig" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="mango_rep_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="mango_rep_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3">
                     <div class="form-group col">
                        <p style="text-align: left; margin-bottom: 0px;"> <label for="notes">Notes:</label></p>
                        <textarea class="form-control" name="mango_rep_notes" cols="42"  rows="2"></textarea>
                     </div>
                     <div class="  col">
                        <label for="">Attachment:</label>
                        <input type="file" class="form-control" name="mango_rep_attach" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
            </div>
            <!-- Tabs-->
            <nav>
               <div class="nav nav-tabs mt-3" id="myTabs" role="tablist">
                  <a class="nav-item nav-link active" id="spread8-tab" data-bs-toggle="tab" href="#spread8" role="tab" aria-controls="spread8" aria-selected="true">Spread</a>
                  <a class="nav-item nav-link" id="dispatch8-tab" data-bs-toggle="tab" href="#dispatch8" role="tab" aria-controls="dispatch8" aria-selected="false">Dispatching Details</a>
                  <a class="nav-item nav-link" id="response8-tab" data-bs-toggle="tab" href="#response8" role="tab" aria-controls="response8" aria-selected="false">Response</a>
               </div>
            </nav>
            <!--  -->
            <!-- Tabs Details -->
            <div class="tab-content" id="myTabsContent8">
               <div class="tab-pane fade show active" id="spread8" role="tabpanel" aria-labelledby="spread8-tab">
                  <div class=" mt-3 d-flex" >
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Region:</label>
                        <select class="form-control" name="mango_region" id="dropdownOptions_28">
                           <option value="option1">RHQ North</option>
                           <option value="option2">RHQ Central 1</option>
                           <option value="option3">RHQ Central 2</option>
                           <option value="option4">RHQ Central 3</option>
                           <option value="option5">RHQ South</option>
                           <option value="addMore">Add More Region</option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity of Mangoes in Kg Dispatched:   <br>  <input class="form-control" name="mango_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Price of Per Kg Mangoes:   <br>  <input class="form-control" name="mango_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Price:   <br>  <input class="form-control" name="mango_total_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Segment:</label>
                        <select class="form-control" name="mango_segment" id="dropdownOptions_29">
                           <option value="option1">Oil</option>
                           <option value="option2">Banks</option>
                           <option value="option3">CPEC</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched To:</label>
                        <select class="form-control" name="mango_dispatched" id="dropdownOptions_30">
                           <option value="option1">CEO</option>
                           <option value="option2">Head of Security</option>
                           <option value="option3">Head of Procurement</option>
                           <option value="option4">Administration Department</option>
                           <option value="option5">HR Department</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched with Signature/Visiting Card of:</label>
                        <select class="form-control" name="mango_signature" id="dropdownOptions_31">
                           <option value="option1">CEO</option>
                           <option value="option2">COO</option>
                           <option value="option3">CBO</option>
                           <option value="option4">National Sales Manager</option>
                           <option value="option5">Sales Manager</option>
                           <option value="option5">Manager Contract Management</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6">
                        <div >
                           List of Address Recipient:   <br>  <input class="form-control" type="file" name="mango_address" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class=" col-lg-6">
                        Notes:  <br>
                        <textarea style="width: 100%;" name="mango_notes" cols="15" rows="4"></textarea>
                     </div>
                     <div class=" col-lg-6">
                        <div >
                           Attachement:   <br>  <input class="form-control" type="file" name="mango_attach" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="dispatch8" role="tabpanel" aria-labelledby="dispatch8-tab">
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Courier Name:    <br>  <input class="form-control" name="mango_courier_name" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Price Per Unit:   <br>  <input class="form-control" name="mango_courier_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity:    <br>  <input class="form-control" name="mango_courier_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Estimated Cost:   <br>  <input class="form-control" name="mango_courier_totalcost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost Of Campaign:    <br>  <input class="form-control" name="mango_compaign_cost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        No of Mangoes Return:   <br>  <input class="form-control" name="mango_return" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Reason:    <br>  <input class="form-control" name="mango_return_reason" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Mangoes Return:   <br>  <input class="form-control" name="mango_return_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Return Cost Unit Kg:    <br>  <input class="form-control" name="mango_return_cost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost:   <br>  <input class="form-control" name="mango_return_totalcost" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <h5 class="mt-3 ml-3">Dispatched By:</h5>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Name:    <br>  <input class="form-control" name="mango_dispatch_name" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Employee No:   <br>  <input class="form-control" name="mango_dispatch_employee" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Designation:    <br>  <input class="form-control" name="mango_dispatch_desig" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Department:   <br>  <input class="form-control" name="mango_dispatch_dept" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 mt-2">
                        Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="mango_dispatch_notes" type="text" placeholder="..." style="width: 100%;"></textarea>
                     </div>
                     <div class="col-lg-6 mt-2">
                        Attachements    <br>  <input class="form-control" name="mango_dispatch_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="response8" role="tabpanel" aria-labelledby="response8-tab">
                  <button type="submit" class="btn btn-danger">Lead Generation</button> <br/>
                  <p class="mt-2">System is Redirecting you to the Lead Generation...</p>
               </div>
            </div>
         </div>
         <!--  -->
         <div class="col-lg-12 mt-3 leather" id="image10-details" style="display: none;">
            <div class="details">
               <h5>Campaign Leader:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="clock_leader_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Employee No:</label>
                        <input type="text" class="form-control" name="clock_employee" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="clock_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col ">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="clock_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Campaign Start Date:</label>
                        <input type="text" class="form-control" name="clock_start_date" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Campaign End Date:</label>
                        <input type="text" class="form-control" name="clock_end_date" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
               <h5>Reporting To:</h5>
               <div>
                  <div class="row g-3 mb-1">
                     <div class="col">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="clock_rep_name" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Designation:</label>
                        <input type="text" class="form-control" name="clock_rep_desig" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3 mb-1">
                     <div class="col ">
                        <label for="">Cell No:</label>
                        <input type="text" class="form-control" name="clock_rep_cell" placeholder="..." aria-label="First name">
                     </div>
                     <div class="col">
                        <label for="">Email ID:</label>
                        <input type="text" class="form-control" name="clock_rep_email" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
                  <div class="row g-3">
                     <div class="form-group col">
                        <p style="text-align: left; margin-bottom: 0px;"> <label for="notes">Notes:</label></p>
                        <textarea class="form-control" name="clock_rep_notes" id="notes" cols="42"  rows="2"></textarea>
                     </div>
                     <div class="  col">
                        <label for="">Attachment:</label>
                        <input type="file" class="form-control" name="clock_rep_attach" placeholder="..." aria-label="Last name">
                     </div>
                  </div>
               </div>
            </div>
            <!-- Tabs-->
            <nav>
               <div class="nav nav-tabs mt-3" id="myTabs" role="tablist">
                  <a class="nav-item nav-link active" id="spread7-tab" data-bs-toggle="tab" href="#spread7" role="tab" aria-controls="spread7" aria-selected="true">Spread</a>
                  <a class="nav-item nav-link" id="dispatch7-tab" data-bs-toggle="tab" href="#dispatch7" role="tab" aria-controls="dispatch7" aria-selected="false">Dispatching Details</a>
                  <a class="nav-item nav-link" id="response7-tab" data-bs-toggle="tab" href="#response7" role="tab" aria-controls="response7" aria-selected="false">Response</a>
               </div>
            </nav>
            <!-- Tabs Details -->
            <div class="tab-content" id="myTabsContent7">
               <div class="tab-pane fade show active" id="spread7" role="tabpanel" aria-labelledby="spread7-tab">
                  <div class=" mt-3 d-flex" >
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Region:</label>
                        <select class="form-control" name="clock_region" id="dropdownOptions_24">
                           <option value="option1">RHQ North</option>
                           <option value="option2">RHQ Central 1</option>
                           <option value="option3">RHQ Central 2</option>
                           <option value="option4">RHQ Central 3</option>
                           <option value="option5">RHQ South</option>
                           <option value="addMore">Add More Region</option>
                        </select>
                     </div>
                     <!-- <div class="col-lg-6 spacing-right mt-2">
                        Giveaway Item Name:   <br>  <input class="form-control" name="phy_address" type="text" placeholder="..." style="width: 100%;">
                        </div> -->
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity of Leather Folders Dispatched:   <br>  <input class="form-control" name="clock_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Price of Per Leather Folders:   <br>  <input class="form-control" name="clock_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Price:   <br>  <input class="form-control" name="clock_total_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Segment:</label>
                        <select class="form-control" name="clock_segment" id="dropdownOptions_25">
                           <option value="option1">Oil</option>
                           <option value="option2">Banks</option>
                           <option value="option3">CPEC</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched To:</label>
                        <select class="form-control" name="clock_dispatched" id="dropdownOptions_26">
                           <option value="option1">CEO</option>
                           <option value="option2">Head of Security</option>
                           <option value="option3">Head of Procurement</option>
                           <option value="option4">Administration Department</option>
                           <option value="option5">HR Department</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="form-group col-lg-6">
                        <label for="dropdownOptions"> Dispatched with Signature/Visiting Card of:</label>
                        <select class="form-control" name="clock_signature" id="dropdownOptions_27">
                           <option value="option1">CEO</option>
                           <option value="option2">COO</option>
                           <option value="option3">CBO</option>
                           <option value="option4">National Sales Manager</option>
                           <option value="option5">Sales Manager</option>
                           <option value="option5">Manager Contract Management</option>
                           <option value="addMore">Add More </option>
                        </select>
                     </div>
                     <div class="form-group col-lg-6">
                        <div >
                           List of Address Recipient:   <br>  <input class="form-control" type="file" name="clock_address" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class=" col-lg-6">
                            Notes:  <br>
                        <textarea style="width: 100%;" name="clock_notes" id="" cols="15" rows="4"></textarea>
                     </div>
                     <div class=" col-lg-6">
                        <div >
                            Attachement:   <br>  <input class="form-control" type="file" name="clock_attach" placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="dispatch7" role="tabpanel" aria-labelledby="dispatch7-tab">
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Courier Name:    <br>  <input class="form-control" name="clock_courier_name" type="email" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Price Per Unit:   <br>  <input class="form-control" name="clock_courier_price" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Quantity:    <br>  <input class="form-control" name="clock_courier_quantity" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Estimated Cost:   <br>  <input class="form-control" name="clock_courier_totalcost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost Of Campaign:    <br>  <input class="form-control" name="clock_compaign_cost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        No of Clock Return:   <br>  <input class="form-control" name="clock_return" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Reason:    <br>  <input class="form-control" name="clock_return_reason" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Clock Return:   <br>  <input class="form-control" name="clock_return_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Return Cost Per Unit:    <br>  <input class="form-control" name="clock_return_cost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Total Cost:   <br>  <input class="form-control" name="clock_return_totalcost" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <h5 class="mt-3 ml-3">Dispatched By:</h5>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Name:    <br>  <input class="form-control" name="clock_dispatch_name" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Employee No:   <br>  <input class="form-control" name="clock_dispatch_employee" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 spacing-right mt-2">
                        Designation:    <br>  <input class="form-control" name="clock_dispatch_desig" type="text" placeholder="..." style="width: 100%;">
                     </div>
                     <div class="col-lg-6 spacing-right mt-2">
                        Department:   <br>  <input class="form-control" name="clock_dispatch_dept" type="text" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="col-lg-6 mt-2">
                        Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="clock_dispatch_notes" type="text" placeholder="..." style="width: 100%;"></textarea>
                     </div>
                     <div class="col-lg-6 mt-2">
                        Attachements    <br>  <input class="form-control" name="clock_dispatch_attach" type="file" placeholder="..." style="width: 100%;">
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="response7" role="tabpanel" aria-labelledby="response7-tab">
                  <button type="submit" class="btn btn-danger">Lead Generation</button> <br/>
                  <p class="mt-2">System is Redirecting you to the Lead Generation...</p>
               </div>
            </div>
         </div>
      </div>
      <!---- outer Image Div End -->
   </div>
</div>
</div>
<div class="footer" style="position: fixed; bottom: 0; width: 100%; background-color: #320056; padding: 10px; display: flex; justify-content: space-between; align-items: center;">
   <button type="button" name="cancel" class="btn btn-secondary" style="color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 80px;"><i>Cancel</i></button>
   <h4 style="color: #fff; margin: 0; font-size: 14px;"><i>PIFFERS SECURITY SERVICES</i></h4>
   <div class="dropdown" style="position: relative; display: inline-block;">
      <button type="button" class="btn btn-primary" style="background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 150px;"><i style="margin-right:30px;">Submission  &#8594;</i></button>
      <div class="dropdown-content" style="display: none; position: absolute; background-color: #f9f9f9; min-width: 130px; box-shadow: 0px -8px 16px 0px rgba(0,0,0,0.2); z-index: 1; bottom: 100%;">
         <button type="button" name="save_and_email" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & Email/Whatsapp</i></button>
         <button type="button" name="save_and_share" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & share link</i></button>
         <button type="submit" name="save_and_new" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & New</i></button>
         <button type="submit" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & Close</i></button>
      </div>
   </div>
</div>
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
   document.getElementById("thumb_img_1").addEventListener("click", function(event) {
      event.preventDefault(); // prevent the default behavior of the link
      $("#image2-details").hide();
      $("#image3-details").hide();
      $("#image4-details").hide();
      $("#image5-details").hide();
      $("#image6-details").hide();
      $("#image7-details").hide();
      $("#image8-details").hide();
      $("#image9-details").hide();

      var div = document.getElementById("image1-details");
      if (div.style.display === "none") {
         div.style.display = "block";
      } else {
         div.style.display = "none";
      }

   });
</script>
<script>
   document.getElementById("thumb_img_2").addEventListener("click", function(event) {
      event.preventDefault(); // prevent the default behavior of the link
      $("#image1-details").hide();
      $("#image3-details").hide();
      $("#image4-details").hide();
      $("#image5-details").hide();
      $("#image6-details").hide();
      $("#image7-details").hide();
      $("#image8-details").hide();
      $("#image9-details").hide();

      var div = document.getElementById("image2-details");
      if (div.style.display === "none") {
         div.style.display = "block";
      } else {
         div.style.display = "none";
      }
   });
</script>
<script>
   document.getElementById("thumb_img_3").addEventListener("click", function(event) {
      event.preventDefault(); // prevent the default behavior of the link
      $("#image2-details").hide();
      $("#image1-details").hide();
      $("#image4-details").hide();
      $("#image5-details").hide();
      $("#image6-details").hide();
      $("#image7-details").hide();
      $("#image8-details").hide();
      $("#image9-details").hide();

      var div = document.getElementById("image3-details");
      if (div.style.display === "none") {
         div.style.display = "block";
      } else {
         div.style.display = "none";
      }
   });
</script>
<script>
   document.getElementById("thumb_img_4").addEventListener("click", function(event) {
      event.preventDefault(); // prevent the default behavior of the link
      $("#image2-details").hide();
      $("#image3-details").hide();
      $("#image1-details").hide();
      $("#image5-details").hide();
      $("#image6-details").hide();
      $("#image7-details").hide();
      $("#image8-details").hide();
      $("#image9-details").hide();

      var div = document.getElementById("image4-details");
      if (div.style.display === "none") {
         div.style.display = "block"; // show the div
      } else {
         div.style.display = "none"; // hide the div
      }
   });
</script>
<script>
   document.getElementById("thumb_img_5").addEventListener("click", function(event) {
      event.preventDefault(); // prevent the default behavior of the link
      $("#image2-details").hide();
      $("#image3-details").hide();
      $("#image4-details").hide();
      $("#image1-details").hide();
      $("#image6-details").hide();
      $("#image7-details").hide();
      $("#image8-details").hide();
      $("#image9-details").hide();

      var div = document.getElementById("image5-details");
      if (div.style.display === "none") {
         div.style.display = "block"; // show the div
      } else {
         div.style.display = "none"; // hide the div
      }
   });
</script>
<script>
   document.getElementById("thumb_img_6").addEventListener("click", function(event) {
      event.preventDefault(); // prevent the default behavior of the link
      $("#image2-details").hide();
      $("#image3-details").hide();
      $("#image4-details").hide();
      $("#image5-details").hide();
      $("#image1-details").hide();
      $("#image7-details").hide();
      $("#image8-details").hide();
      $("#image9-details").hide();

      var div = document.getElementById("image6-details");
      if (div.style.display === "none") {
         div.style.display = "block"; // show the div
      } else {
         div.style.display = "none"; // hide the div
      }
   });
</script>
<script>
   document.getElementById("thumb_img_7").addEventListener("click", function(event) {
      event.preventDefault(); // prevent the default behavior of the link
      $("#image2-details").hide();
      $("#image3-details").hide();
      $("#image4-details").hide();
      $("#image5-details").hide();
      $("#image6-details").hide();
      $("#image1-details").hide();
      $("#image8-details").hide();
      $("#image9-details").hide();

      var div = document.getElementById("image7-details");
      if (div.style.display === "none") {
         div.style.display = "block"; // show the div
      } else {
         div.style.display = "none"; // hide the div
      }
   });
</script>
<script>
   document.getElementById("thumb_img_8").addEventListener("click", function(event) {
      event.preventDefault(); // prevent the default behavior of the link
      $("#image2-details").hide();
      $("#image3-details").hide();
      $("#image4-details").hide();
      $("#image5-details").hide();
      $("#image6-details").hide();
      $("#image7-details").hide();
      $("#image1-details").hide();
      $("#image9-details").hide();

      var div = document.getElementById("image8-details");
      if (div.style.display === "none") {
         div.style.display = "block"; // show the div
      } else {
         div.style.display = "none"; // hide the div
      }
   });
</script>
<script>
   document.getElementById("thumb_img_9").addEventListener("click", function(event) {
      event.preventDefault(); // prevent the default behavior of the link
      $("#image2-details").hide();
      $("#image3-details").hide();
      $("#image4-details").hide();
      $("#image5-details").hide();
      $("#image6-details").hide();
      $("#image7-details").hide();
      $("#image1-details").hide();
      $("#image8-details").hide();
      var div = document.getElementById("image9-details");
      if (div.style.display === "none") {
         div.style.display = "block"; // show the div
      } else {
         div.style.display = "none"; // hide the div
      }
   });
</script>
<script>
   document.getElementById("thumb_img_10").addEventListener("click", function(event) {
      event.preventDefault(); // prevent the default behavior of the link
      $("#image2-details").hide();
      $("#image3-details").hide();
      $("#image4-details").hide();
      $("#image5-details").hide();
      $("#image6-details").hide();
      $("#image7-details").hide();
      $("#image1-details").hide();
      $("#image8-details").hide();
      $("#image9-details").hide();
      var div = document.getElementById("image10-details");
      if (div.style.display === "none") {
         div.style.display = "block"; // show the div
      } else {
         div.style.display = "none"; // hide the div
      }
   });
</script>
<!--  -->
<script>
   document.getElementById("leadsubmit-category").addEventListener("click", function () {
     var customCategory = document.getElementById("leadcustom-category").value;
     var select = document.getElementById("leadcategory");
     var option = document.createElement("option");
     option.text = customCategory;
     option.value = customCategory;
     select.add(option);
   });
</script>
<script>
   $(document).ready(function () {
     $('#otherCheckboxesContainer').hide();

     // Add an event listener to the Bid Money checkbox
     $('#bidMoneyCheckbox').change(function () {
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
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
   integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
   crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
   integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
   crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
   integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
   crossorigin="anonymous"></script>
</body>
</html>
