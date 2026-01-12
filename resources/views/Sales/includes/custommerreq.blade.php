<div class="tab-pane fade m-3" style="opacity: 90%; position:relative;" id="customer" role="tabpanel"
aria-labelledby="nav-profile-tab">
<div class="row col-lg-12 m-0 p-0">
   <div class="col-lg-4"
      style="margin-bottom: 20px; height: 775px; overflow: auto; overflow-x:hidden; position:relative; left:-5%;">
      <div style="position: relative; left:14%; margin-bottom:20px;">
         <img src="{{ asset('sales/guard.png') }}" height="150" width="220" />
         <!-- <img src="guard.png" height="150" width="220" /> -->
         <div
            style="position: absolute; top: 70%; left: 24%; transform: translate(-50%, -50%); text-align: center;">
            <p><a href="#" id="men-guard" onclick="toggleCol8(1)"
               style="color: black;"><b>Men<br>Guarding<br>Services</b></a></p>
         </div>
      </div>
      <div style="position: relative; left:14%; margin-bottom:20px;">
         <img src="{{ asset('sales/car.png') }}" height="150" width="220" />
         <!-- <img src="car.png" height="150" width="220" /> -->
         <div
            style="position: absolute; top: 70%; left: 24%; transform: translate(-50%, -50%); text-align: center;">
            <p><a href="#" id="escort1" onclick="toggleCol8(2)"
               style="color: white;"><b>Escort<br>Services</b></a></p>
         </div>
      </div>
      <div style="position: relative; left:14%; margin-bottom:20px;">
         <img src="{{ asset('sales/dog.png') }}" height="150" width="220" />
         <!-- <img src="dog.png" height="150" width="220" /> -->
         <div
            style="position: absolute; top: 70%; left: 24%; transform: translate(-50%, -50%); text-align: center;">
            <p><a href="#" id="canine1" onclick="toggleCol8(11)"
               style="color: white;"><b>Canine<br>Services</b></a></p>
         </div>
      </div>
      <div style="position: relative; left:14%; margin-bottom:20px;">
         <img src="{{ asset('sales/facility.png') }}" height="150" width="220" />
         <!-- <img src="facility.png" height="150" width="220" /> -->
         <div
            style="position: absolute; top: 70%; left: 24%; transform: translate(-50%, -50%); text-align: center;">
            <p><a href="#" id="facility1" onclick="toggleCol8(3)"
               style="color:black;"><b>Facilitation<br>Services</b></a></p>
         </div>
      </div>
      <div style="position: relative; left:14%; margin-bottom:20px;">
         <img src="{{ asset('sales/security.png') }}" height="150" width="220" />
         <!-- <img src="security.png" height="150" width="220" /> -->
         <div
            style="position: absolute; top: 70%; left: 24%; transform: translate(-50%, -50%); text-align: center;">
            <p><a href="#" id="event1" onclick="toggleCol8(4)"
               style="color:white;"><b>Event<br>Security</b></a></p>
         </div>
      </div>
      <div style="position: relative; left:14%; margin-bottom:20px;">
         <img src="{{ asset('sales/tech.png') }}" height="150" width="220" />
         <!-- <img src="tech.png" height="150" width="220" /> -->
         <div
            style="position: absolute; top: 70%; left: 24%; transform: translate(-50%, -50%); text-align: center;">
            <p><a href="#" id="consultancy1" onclick="toggleCol8(5)"
               style="color:white;"><b>Security<br>Consultancy</b></a></p>
         </div>
      </div>
      <div style="position: relative; left:14%; margin-bottom:20px;">
         <img src="{{ asset('sales/fire.png') }}" height="150" width="220" />
         <!-- <img src="fire.png" height="150" width="220" /> -->
         <div
            style="position: absolute; top: 70%; left: 24%; transform: translate(-50%, -50%); text-align: center;">
            <p><a href="#" id="fire1" onclick="toggleCol8(7)"
               style="color:black;"><b>Fire<br>Fighting<br>Equipments</b></a></p>
         </div>
      </div>
      <div style="position: relative; left:14%; margin-bottom:20px;">
         <img src="{{ asset('sales/door.png') }}" height="150" width="220" />
         <!-- <img src="door.png" height="150" width="220" /> -->
         <div
            style="position: absolute; top: 70%; left: 24%; transform: translate(-50%, -50%); text-align: center;">
            <p><a href="#" id="equipments1" onclick="toggleCol8(6)"
               style="color:black;"><b>Security<br>Equipments</b></a></p>
         </div>
      </div>
      <div style="position: relative; left:14%; margin-bottom:20px;">
         <img src="{{ asset('sales/camera2.png') }}" height="150" width="220" />
         <!-- <img src="camera2.png" height="150" width="220" /> -->
         <div
            style="position: absolute; top: 70%; left: 24%; transform: translate(-50%, -50%); text-align: center;">
            <p><a href="#" id="cctv1" onclick="toggleCol8(9)" style="color:black;"><b>Electronic <br> &
               Web <br> Surveillance<br> Solutions</b></a>
            </p>
         </div>
      </div>
      <div style="position: relative; left:14%; margin-bottom:20px;">
         <img src="{{ asset('sales/equip.png') }}" height="150" width="220" />
         <div
            style="position: absolute; top: 70%; left: 24%; transform: translate(-50%, -50%); text-align: center;">
            <p><a href="#" id="alarm1" onclick="toggleCol8(8)"
               style="color:black;"><b>Security<br>Alarm<br>System</b></a></p>
         </div>
      </div>
      <!-- <div style="position: relative; left:14%; margin-bottom:20px;">
         <img src="/public/sales/camera.png" height="150" width="220" />
         <div
             style="position: absolute; top: 70%; left: 24%; transform: translate(-50%, -50%); text-align: center;">
             <p><a href="#" id="web1" onclick="toggleCol8(10)"
                     style="color:black;"><b>Web<br>Surveillance<br>Solutions</b></a></p>
         </div>
         </div> -->
   </div>
   <div class="row col-lg-8 px-0 mx-0" id="col-lg-8-1" style="position:relative; left:5%">
      <div class="col-lg-12 d-flex row" id="men" style="position:relative; left:-13%;">
         <div class="col-lg-3">
            <div>
               <div class="img5" id="img5" style="text-align: center;">
                  <img class="rounded-circle img-thumbnail" class="small-icon"
                     style="width: 100px; height: 100px; object-fit: scale-down;"
                     src="{{ asset('sales/MSG.jpg') }}" height="100" width="100" alt="">
                  <p>Men Guarding Services</p>
               </div>
            </div>
         </div>
         <div class="col-lg-9">
            <div class="new-div " id="newDiv7" style="display:none;">
               <div class="col-lg-12">
                  <!-- For Add More Men Guarding services-->
                  <div class="container my-1">
                     <div class="accordion" id="signatoryAccordion">
                        <!-- Initial Accordion Item -->
                        <div class="accordion-item signaccordion-item" id="GuardEntry1">
                           <h2 class="accordion-header" id="signatoryHeading1"
                              style="color: white">
                              <button class="accordion-button"
                                 style="background-color: #34005A; color:white" type="button"
                                 data-toggle="collapse" data-target="#signatoryCollapse1"
                                 aria-expanded="false" aria-controls="signatoryCollapse1">
                              Guard Entry 1
                              </button>
                           </h2>
                           <div id="signatoryCollapse1" class="collapse"
                              aria-labelledby="signatoryHeading1">
                              <div class="row row-fluid mx-2 mt-2 mb-2">
                                 <div class="col-lg-4 form-group spacing-left">
                                    Category:<br>
                                    <div class="input-group" style="width: 100%;">
                                       <select id="applicable_compliances" class="form-control mt-1" name="guard_category[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                          <option value=""></option>
                                          @foreach ($salesguard as $guard)
                                          <option value="{{ $guard->salesGuard }}">{{ $guard->salesGuard }}</option>
                                          @endforeach
                                       </select>
                                       <div class="input-group-append" style="width: 30%;">
                                          <a href="{{ route('salesguard') }}">
                                          <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6 spacing-right">
                                    Quantity : <br>
                                    <select id="leadcategory" name="guard_quantity[]" class="form-control mt-1"
                                       style="width: 100%;">
                                       <option value=""></option>
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
                                    <select id="leadcategory" name="guard_shift_timing[]" class="form-control mt-1"
                                       style="width: 100%;">
                                       <option value=""></option>
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
                                    <select id="leadcategory" name="guard_food[]" class="form-control mt-1"
                                       style="width: 100%;">
                                       <option value=""></option>
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 spacing-left">
                                    Accomodation By Client : <br>
                                    <select id="leadcategory" name="guard_accomodation[]" class="form-control mt-1"
                                       style="width: 100%;">
                                       <option value=""></option>
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                    </select>
                                 </div>
                                 <!-- <div class="col-lg-6 spacing-right">
                                    Food by Client : <br>
                                    <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                    </select>
                                    </div> -->
                                 <div class="col-lg-6 spacing-right">
                                    Transportation by Client : <br>
                                    <select id="leadcategory" name="guard_transportation[]" class="form-control mt-1"
                                       style="width: 100%;">
                                       <option value=""></option>
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 spacing-left">
                                    Required on monthly basis : <br>
                                    <select id="monthlyRequirement" name="guard_required_monthly[]" class="form-control mt-1"
                                       style="width: 100%;">
                                       <option value=""></option>
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 spacing-right"
                                    id="dailyRequirementSection">
                                    Required on dialy basis : <br>
                                    <select id="dailyRequirement" name="guard_required_dialy[]" type="text" class="form-control mt-1"
                                       style="width: 100%;">
                                       <option value=""></option>
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 mt-1" id="noOfDays">
                                    No. of days Security Staff required for <br>
                                    <input class="form-control" name="no_of_days_guard_required[]" type="text" placeholder="..."
                                       style="width: 100%;">
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
                                    Notes <br> <textarea class="form-control mt-1"
                                       id="head_office_name" name="guard_notes[]" type="text"
                                       placeholder="..." style="width: 100%;"></textarea>
                                 </div>
                                 <div class="col-lg-6">
                                    Attachments <br> <input class="form-control mt-1"
                                       id="head_office_email" name="guard_attach[]" type="file"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Add More and Remove Buttons -->
                     <div class="row my-3">
                        <div class="col">
                           <button type="button" class="btn btn-primary" id="addSignatory"
                              style="height:30px; width:150px;">Add More</button>
                        </div>
                        <button type="button" class="btn btn-primary"
                           id="updateSignatoryTable">Save</button>
                     </div>
                  </div>
                  <table class="table table-bordered mt-1" id="signatorySummaryTable">
                     <thead>
                        <tr>
                           <th>Entry</th>
                           <th>Category</th>
                           <th>Quantity</th>
                           <th>Shift Timing</th>
                           <th>View</th>
                           <!-- Add more columns as needed -->
                        </tr>
                     </thead>
                     <tbody>
                        <!-- Summary data will be added here dynamically -->
                     </tbody>
                  </table>
                  <div class="row">
                     <div class="col-lg-6">
                        <!-- <button id="men_addmore_btn">Add More</button>  -->
                     </div>
                     <div class="col-lg-6">
                        <button class="btn btn-primary mt-2" id="men_remove_btn"
                           style="display:none; height:30px; width:150px;">Remove</button>
                     </div>
                  </div>
                  <center>
                     <div class="col-lg-6">
                        <button class="new-branch btn btn-primary mt-2"
                           style="height:30px; width:150px;"
                           onclick="removeNewDiv7()">Remove</button>
                     </div>
                  </center>
               </div>
            </div>
         </div>
         <!-- <div class="col-lg-3" >
            <div>
                <div class="img6" id="img6" style="text-align: center;">
                    <img class="rounded-circle img-thumbnail" class="small-icon" style="width: 100px; height: 100px;" src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" height="100" width="100" alt="">
                    <p>Guarding</p>
                </div>
                </div>
            </div>
            <div class="col-lg-9">
            <div class="new-div" id="newDiv8" style="display:flex;">
            <div class="col-lg-12">
                <div class="row mb-2">
                    <div class="col-lg-6 spacing-right">
                        Category <br>
                        <select id="staff_category" class="form-control" name="ay_other_d" style="width: 100%;">
                            <option value="">Armed Security Supervisor (Ex-Servicemen)</option>
                            <option value="">Armed Security Supervisor (Civil)</option>
                            <option value="">Unarmed Security Supervisor (Ex-Servicemen)</option>
                            <option value="">Unarmed Security Supervisor (Civil)</option>
                            <option value="">Armed Security Guard (Ex-Servicemen)</option>
                            <option value="">Armed Security Guard (Civil)</option>
                            <option value="">Unarmed Security Guard(Ex-Servicemen)</option>
                            <option value="">Unarmed Security Guard(Civil)</option>
                            <option value="">Close Protection Office/Executive Protective Officers</option>
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
                            <option value="">Security Facilitation Officers(SFO)</option>
                            <option value="">Guide</option>
                        </select>
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Quantity : <br>
                        <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
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
                        <select id="leadcategory" class="form-control mt-1" name="category" style="width: 90%;">
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
                        <select id="leadcategory" class="form-control mt-1" name="category" style="width: 90%;">
                            <option value="">Yes</option>
                            <option value="">No</option>
                        </select>
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Accomodation By Client : <br>
                        <select id="leadcategory" class="form-control mt-1" name="category" style="width: 90%;">
                            <option value="">Yes</option>
                            <option value="">No</option>
                        </select>
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Food by Client : <br>
                        <select id="leadcategory" class="form-control mt-1" name="category" style="width: 90%;">
                            <option value="">Yes</option>
                            <option value="">No</option>
                        </select>
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Transportation by Client : <br>
                        <select id="leadcategory" class="form-control mt-1" name="category" style="width: 90%;">
                            <option value="">Yes</option>
                            <option value="">No</option>
                        </select>
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Required on monthly basis : <br>
                        <select id="leadcategory" class="form-control mt-1" name="category" style="width: 90%;">
                            <option value="">Yes</option>
                            <option value="">No</option>
                        </select>
                    </div>
                    <div class="col-lg-6 spacing-right">
                        Required on dialy basis : <br>
                        <select id="leadcategory" class="form-control mt-1" name="category" style="width: 90%;">
                            <option value="">Yes</option>
                            <option value="">No</option>
                        </select>
                    </div>
                    <div class="col-lg-6 mt-1">
                        No. of days Security Staff required for    <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-6">
                        Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="audit_date" type="text" placeholder="..." style="width: 100%;"></textarea>
                    </div>
                    <div class="col-lg-6">
                        Attachments <br> <input class="form-control mt-1" id="head_office_email" name="audit_sign" type="file"   placeholder="..." style="width: 100%;">
                    </div>
                    <button class="new-branch mt-2" onclick="removeNewDiv8()">Remove</button>
                </div>
            </div>
            </div>
            </div> -->
      </div>
   </div>
   <div class="col-lg-8" id="col-lg-8-2" style="display:none;">
      <div class="col-lg-12">
         <div class="col-lg-12 row" id="escort" style="position:relative; left:-5%;">
            <div class="col-lg-3">
               <div class="img1" id="img1" style="text-align: center;">
                  <img class="rounded-circle img-thumbnail" class="small-icon"
                     style="width: 100px; height: 100px;"
                     src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                     height="100" width="100" alt="">
                  <p>Standard Vehicles</p>
               </div>
               <div class="img2" id="img2" style="text-align: center;">
                  <img class="rounded-circle img-thumbnail" class="small-icon"
                     style="width: 100px; height: 100px;"
                     src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                     height="100" width="100" alt="">
                  <p>Bullet Proof Vehicles</p>
               </div>
            </div>
            <div class="col-lg-9">
               <div class="new-div" id="newDiv" style="display:none;">
                  <div class="col-lg-12">
                     {{--
                     <div class="row mb-2">
                        <div class="col-lg-6 spacing-right">
                           Ownership Status: <br>
                           <select id="leadcategory" class="form-control mt-1" name="oscategory"
                              style="width: 100%;">
                              <option value="Company Owned">Company Owned</option>
                              <option value="OutSourced">OutSourced</option>
                           </select>
                        </div>
                        <div class="col-lg-6 spacing-right">
                           Types: <br>
                           <select id="leadcategory" class="form-control mt-1" name="tcategory"
                              style="width: 100%;">
                              <option value="Pilot Vehicle">Pilot Vehicle</option>
                              <option value="Escort Vehicle">Escort Vehicle</option>
                              <option value="Follow Up Vehicle">Follow Up Vehicle</option>
                           </select>
                        </div>
                        <div class="col-lg-6 spacing-right">
                           Category : <br>
                           <select id="leadcategory" class="form-control mt-1" name="ccategory"
                              style="width: 100%;">
                              <option value="Saloon">Saloon</option>
                              <option value="Yaris">Yaris</option>
                              <option value="Civic">Civic</option>
                              <option value="City">City</option>
                              <option value="Xli">Xli</option>
                           </select>
                        </div>
                        <div class="col-lg-6 spacing-right">
                           Required for : <br>
                           <select id="leadcategory" class="form-control mt-1" name="category"
                              style="width: 100%;">
                              <option value="">Monthly Basis</option>
                              <option value="">Daily Basis</option>
                           </select>
                        </div>
                        <div class="col-lg-6 mt-1">
                           Monthly Maintenance Cost <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1 spacing-right">
                           Fuel <br>
                           <select id="fuel" class="form-control mt-1 " name="category"
                              style="width: 100%;">
                              <option value="fuel_rate_1"> As per Actual</option>
                              <option value="fuel_rate_2"> Per Kilometer</option>
                           </select>
                        </div>
                        <div>
                           <div class="col-lg-6 mt-1 " id="fuel_rate_km" style="display:none;">
                           </div>
                           <div class="col-lg-6 mt-1 " id="fuel_rate_km_req" style="display:none;">
                              Rate Per Kilometer <br> <input class="form-control " type="text"
                                 placeholder="..." style="width: 100%;">
                              Kilometer Required <br> <input class="form-control " type="text"
                                 placeholder="..." style="width: 100%;">
                           </div>
                        </div>
                        <div class="col-lg-6 mt-1 spacing-right">
                           Toll Tax & Parking Charges <br>
                           <select id="tooltax_dropdown" class="form-control mt-1 " name="category"
                              style="width: 100%;">
                              <option value="tool_actual"> As per Actual</option>
                              <option value="tool_km">Fixed</option>
                           </select>
                        </div>
                        <div class="col-lg-6 mt-1 " id="tooltax1" style="display:none;">
                        </div>
                        <div class="col-lg-6 mt-1 " id="tooltax2" style="display:none;">
                           Toll Tax & Parking Charges: <br> <input class="form-control "
                              type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Meter Reading at the start of the duty <br> <input class="form-control"
                              type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Picture of Meter Reading before duty <br> <input class="form-control"
                              type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Reporting Time <br> <input class="form-control" type="time"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <!-- <div class="col-lg-6 mt-1 " id="reporting_address">
                           Reporting Address   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div> -->
                        <div class="col-lg-6 mt-2 ml-3 ">
                           <input class="form-check-input" type="checkbox"
                              id="reporting_address_check">
                           <label class="form-check-label" for="check">Reporting Address</label>
                        </div>
                        <!-- Address Form -->
                        <div class="container " id="reporting_address_form" style="display: none;">
                           <div class="row row-cols-2">
                              <div class="col-lg-6 mt-1">
                                 Office No <br> <input class="form-control" id="" name=""
                                    type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Floor <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Building <br> <input class="form-control" id="" name=""
                                    type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Block <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Area <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 City <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Photograph of Building <br> <input class="form-control" id=""
                                    name="" type="file" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Pin location <br> <input class="form-control" id="" name=""
                                    type="text" placeholder="..." style="width: 100%;">
                              </div>
                           </div>
                        </div>
                        <!--  -->
                        <div class="col-lg-6 mt-1">
                           Duty Start Date <br> <input class="form-control" type="date"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Duty End Date <br> <input class="form-control" type="date"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Duty Start Time <br> <input class="form-control" type="time"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Duty End Time <br> <input class="form-control" type="time"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Shift Duration <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           No. of Shifts <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <!-- Required with Driver : <br>
                           <select id="driver" class="form-control mt-1" name="category" style="width: 90%;">
                               <option value="yes">Yes</option>
                               <option value="">No</option>
                           </select> -->
                        <div class="col-lg-6 spacing-right mt-2 ml-3 ">
                           <input class="form-check-input" type="checkbox" id="check_driver">
                           <label class="form-check-label" for="check">Required with Driver</label>
                        </div>
                        <div class="col-lg-6 mt-1" id="food_driver" style="display: none;">
                           Food For Driver By Client <br>
                           <select id="tooltax_dropdown" class="form-control mt-1 " name="category"
                              style="width: 100%;">
                              <option value="tool_actual"> Yes</option>
                              <option value="tool_km">No</option>
                           </select>
                        </div>
                        <div class="col-lg-6 spacing-right mt-2 ml-3 ">
                           <input class="form-check-input" type="checkbox" id="check_staff">
                           <label class="form-check-label" for="check">Required With Security
                           Staff</label>
                        </div>
                        <!-- Men Guarding Services Tab -->
                        <div class="new-div" id="check_staff_Men_Guarding" style="display:none;">
                           <div class="col-lg-12">
                              <div class="row mb-2">
                                 <div class="col-lg-6 spacing-right">
                                    Category <br>
                                    <select id="staff_category" class="form-control"
                                       name="ay_other_d" style="width: 100%;">
                                       <option value="">Armed Security Supervisor
                                          (Ex-Servicemen)
                                       </option>
                                       <option value="">Armed Security Supervisor (Civil)
                                       </option>
                                       <option value="">Unarmed Security Supervisor
                                          (Ex-Servicemen)
                                       </option>
                                       <option value="">Unarmed Security Supervisor (Civil)
                                       </option>
                                       <option value="">Armed Security Guard (Ex-Servicemen)
                                       </option>
                                       <option value="">Armed Security Guard (Civil)</option>
                                       <option value="">Unarmed Security Guard(Ex-Servicemen)
                                       </option>
                                       <option value="">Unarmed Security Guard(Civil)</option>
                                       <option value="">Close Protection Office/Executive
                                          Protective Officers
                                       </option>
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
                                    <select id="leadcategory" class="form-control mt-1"
                                       name="category" style="width: 100%;">
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
                                    <select id="leadcategory" class="form-control mt-1"
                                       name="category" style="width: 90%;">
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
                                    <select id="leadcategory" class="form-control mt-1"
                                       name="category" style="width: 90%;">
                                       <option value="">Yes</option>
                                       <option value="">No</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 spacing-right">
                                    Accomodation By Client : <br>
                                    <select id="leadcategory" class="form-control mt-1"
                                       name="category" style="width: 90%;">
                                       <option value="">Yes</option>
                                       <option value="">No</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 spacing-right">
                                    Food by Client : <br>
                                    <select id="leadcategory" class="form-control mt-1"
                                       name="category" style="width: 90%;">
                                       <option value="">Yes</option>
                                       <option value="">No</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 spacing-right">
                                    Transportation by Client : <br>
                                    <select id="leadcategory" class="form-control mt-1"
                                       name="category" style="width: 90%;">
                                       <option value="">Yes</option>
                                       <option value="">No</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 spacing-right">
                                    Required on monthly basis : <br>
                                    <select id="leadcategory" class="form-control mt-1"
                                       name="category" style="width: 90%;">
                                       <option value="">Yes</option>
                                       <option value="">No</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 spacing-right">
                                    Required on dialy basis : <br>
                                    <select id="leadcategory" class="form-control mt-1"
                                       name="category" style="width: 90%;">
                                       <option value="">Yes</option>
                                       <option value="">No</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    No. of days Security Staff required for <br> <input
                                       class="form-control" type="text" placeholder="..."
                                       style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6">
                                    Notes <br> <textarea class="form-control mt-1"
                                       id="head_office_name" name="audit_date" type="text"
                                       placeholder="..." style="width: 100%;"></textarea>
                                 </div>
                                 <div class="col-lg-6">
                                    Attachments <br> <input class="form-control mt-1"
                                       id="head_office_email" name="audit_sign" type="file"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <!-- <button class="new-branch mt-2" onclick="removeNewDiv7()">Remove</button> -->
                              </div>
                           </div>
                        </div>
                        <!--  -->
                        <div class="col-lg-6">
                           Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                              name="audit_date" type="text" placeholder="..."
                              style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-6">
                           Attachments <br> <input class="form-control mt-1" id="head_office_email"
                              name="audit_sign" type="file" placeholder="..."
                              style="width: 100%;">
                        </div>
                     </div>
                     --}}
                     <!-- For Add more Vehicals -->
                     <div class="container my-1">
                        <div class="accordion" id="signatoryAccordion2">
                           <!-- Initial Accordion Item -->
                           <div class="accordion-item signaccordion-item2" id="signatoryEntry2">
                              <h2 class="accordion-header" id="signatoryHeading2"
                                 style="color: white">
                                 <button class="accordion-button"
                                    style="background-color: #34005A; color:white" type="button"
                                    data-toggle="collapse" data-target="#signatoryCollapse2"
                                    aria-expanded="false" aria-controls="signatoryCollapse2">
                                 Vehical Entry 1
                                 </button>
                              </h2>
                              <div id="signatoryCollapse2" class="collapse"
                                 aria-labelledby="signatoryHeading2">
                                 <div class="accordion-body">
                                    <!-- Your content for signatory entry goes here -->
                                    <div class="row mb-2" id="signatoryDetailsContainer">
                                       <div class="col-lg-6 form-group spacing-left">
                                          Ownership Status:<br>
                                          <div class="input-group" style="width: 100%;">
                                             <select id="applicable_compliances" class="form-control mt-1" name="vehicle_ownership[]"   style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value=""></option>
                                                @foreach ($salesvehicle as $vehicle)
                                                <option value="{{ $vehicle->salesVehicle }}">{{ $vehicle->salesVehicle }}</option>
                                                @endforeach
                                             </select>
                                             <div class="input-group-append" style="width: 30%;">
                                                <a href="{{ route('salesvehicle') }}">
                                                <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 form-group spacing-left">
                                          Types:<br>
                                          <div class="input-group" style="width: 100%;">
                                             <select id="applicable_compliances" class="form-control mt-1" name="vehicle_type[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value="">Select a type</option>
                                                @foreach (App\Models\VehicalType::all() as $vtype)
                                                <option value="{{ $vtype->v_type_name }}">{{ $vtype->v_type_name }}</option>
                                                @endforeach
                                             </select>
                                             <div class="input-group-append" style="width: 30%;">
                                                <a href="{{ route('vehicaltype.add') }}">
                                                <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 form-group spacing-left">
                                          Category:<br>
                                          <div class="input-group" style="width: 100%;">
                                             <select id="applicable_compliances" class="form-control mt-1" name="vehicle_category[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value="">Select a type</option>
                                                @foreach (App\Models\Vehicalcategory::all() as $vtype)
                                                <option value="{{ $vtype->v_category_name }}">{{ $vtype->v_category_name }}</option>
                                                @endforeach
                                             </select>
                                             <div class="input-group-append" style="width: 30%;">
                                                <a href="{{ route('vehicalcategory.add') }}">
                                                <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 spacing-right">
                                          Required for : <br>
                                          <select id="leadcategory" class="form-control mt-1"
                                             name="vehicle_required[]" style="width: 100%;">
                                             <option value=""></option>
                                             <option value="Monthly Basis">Monthly Basis</option>
                                             <option value="Daily Basis">Daily Basis</option>
                                          </select>
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                          Monthly Maintenance Cost <br> <input
                                             class="form-control" name="vehicle_mantenance[]" type="text"
                                             placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1 spacing-right">
                                          Fuel <br>
                                          <select id="fuel" name="vehicle_fuel[]" class="form-control mt-1 "
                                             style="width: 100%;">
                                             <option value="">
                                             </option>
                                             <option value=" As per Actual"> As per Actual
                                             </option>
                                             <option value="Per Kilometer"> Per Kilometer
                                             </option>
                                          </select>
                                       </div>
                                       <div>
                                          <div class="col-lg-6 mt-1 " id="fuel_rate_km"
                                             style="display:none;">
                                          </div>
                                          <div class="col-lg-6 mt-1 " id="fuel_rate_km_req"
                                             style="display:none;">
                                             Rate Per Kilometer <br> <input
                                                class="form-control" name="vehicle_rate_per_km[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                             Kilometer Required <br> <input
                                                class="form-control" name="vehicle_km_required[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                          </div>
                                       </div>
                                       <div class="col-lg-6 mt-1 spacing-right">
                                          Toll Tax & Parking Charges <br>
                                          <select id="tooltax_dropdown"
                                             class="form-control mt-1" name="vehicle_toll[]"
                                             style="width: 100%;">
                                             <option value="">
                                             </option>
                                             <option value="As per Actual"> As per Actual
                                             </option>
                                             <option value="Fixed">Fixed</option>
                                          </select>
                                       </div>
                                       <div class="col-lg-6 mt-1 " id="tooltax1"
                                          style="display:none;">
                                       </div>
                                       <div class="col-lg-6 mt-1 " id="tooltax2"
                                          style="display:none;">
                                          Toll Tax & Parking Charges: <br> <input
                                             class="form-control" name="vehicle_tol[]" type="text"
                                             placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                          Meter Reading at the start of the duty <br> <input
                                             class="form-control" name="vehicle_meter_reading[]" type="file"
                                             placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                          Picture of Meter Reading before duty <br> <input
                                             class="form-control" name="vehicle_meter_picture[]" type="file"
                                             placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                          Reporting Time <br> <input class="form-control"
                                             type="time" name="vehicle_reporting_time[]" placeholder="..."
                                             style="width: 100%;">
                                       </div>
                                       <!-- <div class="col-lg-6 mt-1 " id="reporting_address">
                                          Reporting Address   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                                          </div> -->
                                       <div class="col-lg-6 mt-2 ml-3 ">
                                          <input class="form-check-input" name="vehicle_reporting_address[]" type="checkbox"
                                             id="reporting_address_check">
                                          <label class="form-check-label"
                                             for="check">Reporting Address</label>
                                       </div>
                                       <!-- Address Form -->
                                       <div class="container " id="reporting_address_form"
                                          style="display: none;">
                                          <div class="row row-cols-2">
                                             <div class="col-lg-6 mt-1">
                                                Office No <br> <input class="form-control"
                                                   id="" name="vehicle_rep_office_no[]" type="text"
                                                   placeholder="..." style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                Floor <br> <input class="form-control" id=""
                                                   type="text" name="vehicle_rep_floor[]" placeholder="..."
                                                   style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                Building <br> <input class="form-control"
                                                   id="" name="vehicle_rep_building[]"  type="text"
                                                   placeholder="..." style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                Block <br> <input class="form-control" id=""
                                                   type="text" name="vehicle_rep_block[]" placeholder="..."
                                                   style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                Area <br> <input class="form-control" id=""
                                                   type="text" name="vehicle_rep_area[]" placeholder="..."
                                                   style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                City <br> <input class="form-control" id=""
                                                   type="text" name="vehicle_rep_city[]" placeholder="..."
                                                   style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                Photograph of Building <br> <input
                                                   class="form-control" name="vehicle_rep_picture[]" id=""
                                                   type="file" placeholder="..."
                                                   style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                Pin location <br> <input
                                                   class="form-control" name="vehicle_rep_location[]" id=""
                                                   type="text" placeholder="..."
                                                   style="width: 100%;">
                                             </div>
                                          </div>
                                       </div>
                                       <!--  -->
                                       <div class="col-lg-6 mt-1">
                                          Duty Start Date <br> <input class="form-control"
                                             type="date" name="vehicle_duty_start_date[]" placeholder="..."
                                             style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                          Duty End Date <br> <input class="form-control"
                                             type="date" name="vehicle_duty_end_date[]" placeholder="..."
                                             style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                          Duty Start Time <br> <input class="form-control"
                                             type="time" name="vehicle_duty_start_time[]" placeholder="..."
                                             style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                          Duty End Time <br> <input class="form-control"
                                             type="time" name="vehicle_duty_end_time[]" placeholder="..."
                                             style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                          Shift Duration <br> <input class="form-control"
                                             type="text" name="vehicle_shift_duration[]" placeholder="..."
                                             style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                          No. of Shifts <br> <input class="form-control"
                                             type="text" name="vehicle_no_of_shifts[]" placeholder="..."
                                             style="width: 100%;">
                                       </div>
                                       <!-- Required with Driver : <br>
                                          <select id="driver" class="form-control mt-1" name="category" style="width: 90%;">
                                              <option value="yes">Yes</option>
                                              <option value="">No</option>
                                          </select> -->
                                       <div class="col-lg-6 spacing-right mt-2 ml-3 ">
                                          <input class="form-check-input" name="vehicle_req_with_driver[]" type="checkbox"
                                             id="check_driver">
                                          <label class="form-check-label" for="check">Required
                                          with Driver</label>
                                       </div>
                                       <div class="col-lg-6 mt-1" id="food_driver"
                                          style="display: none;">
                                          Food For Driver By Client <br>
                                          <select id="tooltax_dropdown"
                                             class="form-control mt-1" name="vehicle_food_by_client[]"
                                             style="width: 100%;">
                                             <option value=""> </option>
                                             <option value="Yes">Yes</option>
                                             <option value="No">No</option>
                                          </select>
                                       </div>
                                       <div class="col-lg-6 spacing-right mt-2 ml-3 ">
                                          <input class="form-check-input" name="vehicle_req_with_security[]" type="checkbox"
                                             id="check_staff">
                                          <label class="form-check-label" for="check">Required
                                          With Security
                                          Staff</label>
                                       </div>
                                       <!-- Men Guarding Services Tab -->
                                       <div class="new-div" id="check_staff_Men_Guarding"
                                          style="display:none;">
                                          <div class="col-lg-12">
                                             <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right">
                                                   Category <br>
                                                   <select id="staff_category"
                                                      class="form-control" name="vehicle_guard_category[]"
                                                      style="width: 100%;">
                                                      <option value=""></option>
                                                      <option value="Armed Security
                                                         Supervisor
                                                         (Ex-Servicemen)">Armed Security
                                                         Supervisor
                                                         (Ex-Servicemen)
                                                      </option>
                                                      <option value="Armed Security
                                                         Supervisor (Civil)">Armed Security
                                                         Supervisor (Civil)
                                                      </option>
                                                      <option value="Unarmed Security
                                                         Supervisor
                                                         (Ex-Servicemen)">Unarmed Security
                                                         Supervisor
                                                         (Ex-Servicemen)
                                                      </option>
                                                      <option value="Unarmed Security
                                                         Supervisor (Civil)">Unarmed Security
                                                         Supervisor (Civil)
                                                      </option>
                                                      <option value="Armed Security
                                                         Guard (Ex-Servicemen)">Armed Security
                                                         Guard (Ex-Servicemen)
                                                      </option>
                                                      <option value="Armed Security
                                                         Guard (Civil)">Armed Security
                                                         Guard (Civil)
                                                      </option>
                                                      <option value="Unarmed Security
                                                         Guard(Ex-Servicemen)">Unarmed Security
                                                         Guard(Ex-Servicemen)
                                                      </option>
                                                      <option value="Unarmed Security
                                                         Guard(Civil)">Unarmed Security
                                                         Guard(Civil)
                                                      </option>
                                                      <option value="Close Protection
                                                         Office/Executive
                                                         Protective Officers">Close Protection
                                                         Office/Executive
                                                         Protective Officers
                                                      </option>
                                                      <option value="Lady Searcher">Lady Searcher
                                                      </option>
                                                      <option value="Male Searcher">Male Searcher
                                                      </option>
                                                      <option value="Bouncers">Bouncers</option>
                                                      <option value="Project Head">Project Head
                                                      </option>
                                                      <option value="Security Manager">Security Manager
                                                      </option>
                                                      <option value="SSG">SSG</option>
                                                      <option value="Male Facilitation
                                                         Officer">Male Facilitation
                                                         Officer
                                                      </option>
                                                      <option value="Female Facilitation
                                                         Officer">Female Facilitation
                                                         Officer
                                                      </option>
                                                      <option value="Escort Security
                                                         Guard">Escort Security
                                                         Guard
                                                      </option>
                                                      <option value="Baggae Scanner
                                                         Operator">Baggae Scanner
                                                         Operator
                                                      </option>
                                                      <option value="Sniper">Sniper</option>
                                                      <option value="Traffic Controller">Traffic Controller
                                                      </option>
                                                      <option value="Ceremonial Guard">Ceremonial Guard
                                                      </option>
                                                      <option value="VIP Ceremonial
                                                         Guard">VIP Ceremonial
                                                         Guard
                                                      </option>
                                                      <option value="VVIP Ceremonial
                                                         Guard">VVIP Ceremonial
                                                         Guard
                                                      </option>
                                                      <option value="Fire Birgade">Fire Birgade
                                                      </option>
                                                      <option value="Paramedic Staff">Paramedic Staff
                                                      </option>
                                                      <option value="Security
                                                         Facilitation Officers(SFO)">Security
                                                         Facilitation Officers(SFO)
                                                      </option>
                                                      <option value="Guide">Guide</option>
                                                   </select>
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                   Quantity : <br>
                                                   <select id="leadcategory"
                                                      class="form-control mt-1" name="vehicle_guard_quantity[]"
                                                      style="width: 100%;">
                                                      <option value=""></option>
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
                                                <div class="col-lg-6 spacing-right">
                                                   Shift Timing : <br>
                                                   <select id="leadcategory"
                                                      class="form-control mt-1" name="vehicle_guard_shift_timing[]"
                                                      style="width: 90%;">
                                                      <option value=""></option>
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
                                                   <select id="leadcategory"
                                                      class="form-control mt-1" name="vehicle_guard_food_by_client[]"
                                                      style="width: 90%;">
                                                      <option value=""></option>
                                                      <option value="Yes">Yes</option>
                                                      <option value="No">No</option>
                                                   </select>
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                   Accomodation By Client : <br>
                                                   <select id="leadcategory" name="vehicle_guard_accomodation[]"
                                                      class="form-control mt-1"
                                                      style="width: 90%;">
                                                      <option value=""></option>
                                                      <option value="Yes">Yes</option>
                                                      <option value="No">No</option>
                                                   </select>
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                   Transportation by Client : <br>
                                                   <select id="leadcategory" name="vehicle_guard_transportation[]"
                                                      class="form-control mt-1"
                                                      style="width: 90%;">
                                                      <option value=""></option>
                                                      <option value="Yes">Yes</option>
                                                      <option value="No">No</option>
                                                   </select>
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                   Required on monthly basis : <br>
                                                   <select id="leadcategory" name="vehicle_guard_req_monthly[]"
                                                      class="form-control mt-1"
                                                      style="width: 90%;">
                                                      <option value=""></option>
                                                      <option value="Yes">Yes</option>
                                                      <option value="No">No</option>
                                                   </select>
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                   Required on dialy basis : <br>
                                                   <select id="leadcategory" name="vehicle_guard_req_dialy[]"
                                                      class="form-control mt-1"
                                                      style="width: 90%;">
                                                      <option value=""></option>
                                                      <option value="Yes">Yes</option>
                                                      <option value="No">No</option>
                                                   </select>
                                                </div>
                                                <div class="col-lg-6 mt-1">
                                                   No. of days Security Staff required for
                                                   <br> <input class="form-control" name="vehicle_guard_no[]"
                                                      type="text" placeholder="..."
                                                      style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6">
                                                   Notes <br> <textarea
                                                      class="form-control mt-1"
                                                      id="head_office_name" name="vehicle_guard_notes[]"
                                                      type="text"
                                                      placeholder="..."
                                                      style="width: 100%;"></textarea>
                                                </div>
                                                <div class="col-lg-6">
                                                   Attachments <br> <input
                                                      class="form-control mt-1"
                                                      id="head_office_email" name="vehicle_guard_attach[]"
                                                      type="file"
                                                      placeholder="..."
                                                      style="width: 100%;">
                                                </div>
                                                <!-- <button class="new-branch mt-2" onclick="removeNewDiv7()">Remove</button> -->
                                             </div>
                                          </div>
                                       </div>
                                       <!--  -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Add More and Remove Buttons -->
                        <div class="row my-3">
                           <div class="col">
                              <button type="button" class="btn btn-primary" id="addSignatory2"
                                 style="height:30px; width:150px;">Add More
                              </button>
                           </div>
                           <button type="button" class="btn btn-primary"
                              id="updateSignatoryTable2">Save</button>
                        </div>
                     </div>
                     <table class="table table-bordered mt-1" id="signatorySummaryTable2">
                        <thead>
                           <tr>
                              <th>Entry</th>
                              <th>Ownership Status</th>
                              <th>Types</th>
                              <th>Category</th>
                              <th>View</th>
                              <!-- Add more columns as needed -->
                           </tr>
                        </thead>
                        <tbody>
                           <!-- Summary data will be added here dynamically -->
                        </tbody>
                     </table>
                     <center>
                        <div class="col-lg-6">
                           <button class="btn btn-primary new-branch mt-2" onclick="removeNewDiv()"
                              style="height:30px; width:150px;">Remove</button>
                        </div>
                     </center>
                  </div>
               </div>
            </div>
         </div>
         <!-- <div class="col-lg-3" >
            <div>
                <div class="img2" id="img2" style="text-align: center;">
                    <img class="rounded-circle img-thumbnail" class="small-icon" style="width: 100px; height: 100px;" src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" height="100" width="100" alt="">
                    <p>Armoured Vehicle</p>
                </div>
            </div>
            </div>
            <div class="col-lg-9">
            <div class="new-div" id="newDiv1" style="display:flex;">
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-6 spacing-right">
                            Types: <br>
                            <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
                                <option value="">Pilot Vehicle</option>
                                <option value="">Escort Vehicle</option>
                                <option value="">Follow Up Vehicle</option>
                            </select>
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Category : <br>
                            <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
                                <option value="">Saloon</option>
                                <option value="">Yaris</option>
                                <option value="">Civic</option>
                                <option value="">City</option>
                                <option value="">Xli</option>
                            </select>
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Required for : <br>
                            <select id="leadcategory" class="form-control mt-1" name="category" style="width: 90%;">
                                <option value="">Monthly Basis</option>
                                <option value="">Daily Basis</option>
                            </select>
                        </div>
                        <div class="col-lg-6 mt-1">
                            Monthly Maintenance Cost    <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Fuel   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Fuel Rate Per Kilometer    <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Kilometer Required   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Meter Reading at the start of the duty    <br>  <input class="form-control" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Picture of Meter Reading before duty   <br>  <input class="form-control" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Reporting Time    <br>  <input class="form-control" type="time" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Reporting Address   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Duty Start Date    <br>  <input class="form-control" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Duty End Date   <br>  <input class="form-control" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Duty Start Time    <br>  <input class="form-control" type="time" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Duty End Time   <br>  <input class="form-control" type="time" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Shift Duration    <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            No. of Shifts   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Required with Driver : <br>
                            <select id="leadcategory" class="form-control mt-1" name="category" style="width: 90%;">
                                <option value="">Yes</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="col-lg-6 spacing-right">
                            Required with Security Staff : <br>
                            <select id="leadcategory" class="form-control mt-1" name="category" style="width: 90%;">
                                <option value="">Yes</option>
                                <option value="">No</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="audit_date" type="text" placeholder="..." style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-6">
                            Attachments <br> <input class="form-control mt-1" id="head_office_email" name="audit_sign" type="file"   placeholder="..." style="width: 100%;">
                        </div>
                        <button class="new-branch mt-2" onclick="removeNewDiv1()">Remove</button>
                    </div>
                </div>
            </div>
            </div> -->
      </div>
   </div>
   <!-- Canine Services  -->
   <div class="col-lg-8" id="col-lg-8-11" style="display:none;">
      <div class="col-lg-12 mx-0 p-0">
         <div class="col-lg-12 d-flex row px-0 m-0" id="canine" style="position:relative; left:-5%;">
            <div class="col-lg-3">
               <div>
                  <div class="img15" id="img15" style="text-align: center;">
                     <img class="rounded-circle img-thumbnail" class="small-icon"
                        style="width: 100px; height: 100px;" src="/public/sales/canine.png" height="100"
                        width="100" alt="">
                     <p>Canine Services</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-9">
               <div class="new-div" id="newDiv3" style="display:none;">
                  <div class="col-lg-12">
                     {{--
                     <div class="row mb-2">
                        <div class="col-lg-6 spacing-right">
                           Required for : <br>
                           <select id="req_leadcategory" class="form-control mt-1" name="category"
                              style="width: 100%;">
                              <option value="MonthlyBasis">Monthly Basis</option>
                              <option value="DailyBasis">Daily Basis</option>
                           </select>
                        </div>
                        <div class="col-lg-6 mt-1" id="noOfDaysDogs">
                           No. of days Dogs Require for <br> <input class="form-control"
                              type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Color of Dog <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           No. of Dog(s) <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                           Required with Handler : <br>
                           <select id="req_handler_leadcategory" class="form-control mt-1"
                              name="category" style="width: 100%;">
                              <option value="">select</option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                           </select>
                        </div>
                        <div class="col-lg-6 mt-1" id="nameOFHandler">
                           Name of Handler <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1" id="cnicOFHandler">
                           CNIC <br> <input class="form-control" type="text" placeholder="..."
                              style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1" id="ageOFHandler">
                           Age <br> <input class="form-control" type="text" placeholder="..."
                              style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1" id="experienceOFHandler">
                           Experience <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1" id="cellNoOFHandler">
                           Cell Number <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1" id="cnicFrontOFHandler">
                           CNIC Front <br> <input class="form-control" type="file"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1" id="cnicBackOFHandler">
                           CNIC Back <br> <input class="form-control" type="file" placeholder="..."
                              style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Duty Start Date <br> <input class="form-control" type="date"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Duty End Date <br> <input class="form-control" type="date"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Duty Start Time <br> <input class="form-control" type="time"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Duty End Time <br> <input class="form-control" type="time"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Shift Duration <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           No. of Shifts <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Picture of Dogs <br> <input class="form-control" type="file" multiple
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6">
                           Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                              name="audit_date" type="text" placeholder="..."
                              style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-6">
                           Attachments <br> <input class="form-control mt-1" id="head_office_email"
                              name="audit_sign" type="file" placeholder="..."
                              style="width: 100%;">
                        </div>
                     </div>
                     --}}
                     <!-- For Add more Canine -->
                     <div class="container my-1">
                        <div class="accordion" id="signatoryAccordion3">
                           <!-- Initial Accordion Item -->
                           <div class="accordion-item signaccordion-item3" id="signatoryEntry3">
                              <h2 class="accordion-header" id="signatoryHeading3"
                                 style="color: white">
                                 <button class="accordion-button"
                                    style="background-color: #34005A; color:white" type="button"
                                    data-toggle="collapse" data-target="#signatoryCollapse3"
                                    aria-expanded="false" aria-controls="signatoryCollapse3">
                                 Canine Entry 1
                                 </button>
                              </h2>
                              <div id="signatoryCollapse3" class="collapse"
                                 aria-labelledby="signatoryHeading3">
                                 <div class="accordion-body">
                                    <!-- Your content for signatory entry goes here -->
                                    <div class="row mb-2" id="signatoryDetailsContainer3">
                                       <div class="col-lg-6 spacing-right">
                                          Required for : <br>
                                          <select id="req_leadcategory" name="canine_req_for[]"
                                             class="form-control mt-1"
                                             style="width: 100%;">
                                             <option value="MonthlyBasis">Monthly Basis
                                             </option>
                                             <option value="DailyBasis">Daily Basis</option>
                                          </select>
                                       </div>
                                       <div class="col-lg-6 form-group spacing-left">
                                          Category:<br>
                                          <div class="input-group" style="width: 100%;">
                                             <select id="applicable_compliances" class="form-control mt-1" name="canine_category[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value=""></option>
                                                @foreach ($salescanine as $canine)
                                                <option value="{{ $canine->salesCanine }}">{{ $canine->salesCanine }}</option>
                                                @endforeach
                                             </select>
                                             <div class="input-group-append" style="width: 30%;">
                                                <a href="{{ route('salescanine') }}">
                                                <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 mt-1" id="noOfDaysDogs">
                                          No. of days Dogs Require for <br> <input
                                             class="form-control" name="canine_req_for_days[]" type="text"
                                             placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                          Color of Dog <br> <input class="form-control"
                                             type="text" name="canine_color[]" placeholder="..."
                                             style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1">
                                          No. of Dog(s) <br> <input class="form-control"
                                             type="text" name="canine_no[]" placeholder="..."
                                             style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 spacing-right">
                                          Required with Handler : <br>
                                          <select id="req_handler_leadcategory"
                                             class="form-control mt-1" name="canine_req_handler[]"
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
                                             id="head_office_email" name="canine_attach[]"
                                             type="file" placeholder="..."
                                             style="width: 100%;">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Add More and Remove Buttons -->
                        <div class="row my-3">
                           <div class="col">
                              <button type="button" class="btn btn-primary" id="addSignatory3"
                                 style="height:30px; width:150px;">Add More</button>
                           </div>
                           <button type="button" class="btn btn-primary"
                              id="updateSignatoryTable3">Save</button>
                        </div>
                     </div>
                     <table class="table table-bordered mt-1" id="signatorySummaryTable3">
                        <thead>
                           <tr>
                              <th>Entry</th>
                              <th>Required For</th>
                              <th>Dog Color</th>
                              <th>No of Dog</th>
                              <th>View</th>
                              <!-- Add more columns as needed -->
                           </tr>
                        </thead>
                        <tbody>
                           <!-- Summary data will be added here dynamically -->
                        </tbody>
                     </table>
                     <center>
                        <div class="col-lg-6">
                           <button class="btn btn-primary new-branch mt-2"
                              onclick="removeNewDiv3()"
                              style="height:30px; width:150px;">Remove</button>
                        </div>
                     </center>
                  </div>
               </div>
            </div>
            <!-- <div class="col-lg-3" >
               <div>
                   <div class="img16" id="img16" style="text-align: center;">
                       <img class="rounded-circle img-thumbnail" class="small-icon" style="width: 100px; height: 100px;" src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" height="100" width="100" alt="">
                       <p>Services</p>
                   </div>
               </div>
               </div> -->
            <!-- <div class="col-lg-9">
               <div class="new-div" id="newDiv4" style="display:flex;">
                   <div class="col-lg-12">
                       <div class="row mb-2">
                           <div class="col-lg-6 spacing-right">
                               Required for : <br>
                               <select id="leadcategory" class="form-control mt-1" name="category" style="width: 90%;">
                                   <option value="">Monthly Basis</option>
                                   <option value="">Daily Basis</option>
                               </select>
                           </div>
                           <div class="col-lg-6 mt-1">
                               Monthly Maintenance Cost    <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Fuel   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Fuel Rate Per Kilometer    <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Kilometer Required   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Meter Reading at the start of the duty    <br>  <input class="form-control" type="file" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Picture of Meter Reading before duty   <br>  <input class="form-control" type="file" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Reporting Time    <br>  <input class="form-control" type="time" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Reporting Address   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Duty Start Date    <br>  <input class="form-control" type="date" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Duty End Date   <br>  <input class="form-control" type="date" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Duty Start Time    <br>  <input class="form-control" type="time" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Duty End Time   <br>  <input class="form-control" type="time" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Shift Duration    <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               No. of Shifts   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 spacing-right">
                               Required with Driver : <br>
                               <select id="leadcategory" class="form-control mt-1" name="category" style="width: 90%;">
                                   <option value="">Yes</option>
                                   <option value="">No</option>
                               </select>
                           </div>
                           <div class="col-lg-6 spacing-right">
                               Required with Security Staff : <br>
                               <select id="leadcategory" class="form-control mt-1" name="category" style="width: 90%;">
                                   <option value="">Yes</option>
                                   <option value="">No</option>
                               </select>
                           </div>
                           <button class="new-branch mt-2" onclick="removeNewDiv4()">Remove</button>
                       </div>
                   </div>
               </div>
               </div> -->
         </div>
      </div>
   </div>
   <!-- Facilitation Services -->
   <div class="col-lg-8" id="col-lg-8-3" style="display:none;">
      <div class="col-lg-12 mx-0 p-0">
         <div class="col-lg-12 d-flex row px-0 m-0" id="facility" style="position:relative; left:-5%;">
            <div class="col-lg-3">
               <div>
                  <div class="img3" id="img3" style="text-align: center;">
                     <img class="rounded-circle img-thumbnail" class="small-icon"
                        style="width: 100px; height: 100px; object-fit: auto;"
                        src="/public/sales/facilitationServ.png" height="100" width="100" alt="">
                     <p>Facilitation Services</p>
                  </div>
                  <div class="img3" id="img3-a" style="text-align: center;">
                     <img class="rounded-circle img-thumbnail" class="small-icon"
                        style="width: 100px; height: 100px;" src="/public/sales/privateJet.png"
                        height="100" width="100" alt="">
                     <p>Private Jet</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-9">
               <div class="new-div" id="newDiv5" style="display:none;">
                  <div class="col-lg-12">
                     {{--
                     <div class="row mb-2">
                        <div class="col-lg-6 mt-1">
                           Guest Arrival Time <br> <input class="form-control" type="time"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Security Team Reporting Time <br> <input class="form-control"
                              type="time" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           PhotoGraph of Guest <br> <input class="form-control" type="file"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           PhotoGraph of Passport <br> <input class="form-control" type="file"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Nationality of Guest <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-4 spacing-right" id="ssReportingLocation">
                           <input class="form-check-input" type="checkbox">
                           <label class="form-check-label" for="check">Security Staff Reporting
                           Location</label>
                        </div>
                        <div class="col-lg-6 mt-2 ml-3 ">
                           <input class="form-check-input" type="checkbox" id="airline_check">
                           <label class="form-check-label" for="check">AirLine Details</label>
                        </div>
                        <!-- Air Line Details -->
                        <!-- <div id="airline_details" style="display: none;">
                           <div class="col-lg-6 mt-1">
                               Name Of AirLine:    <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Contact Number Of AirLine   <br>  <input class="form-control" type="number" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Email Of AirLine     <br>  <input class="form-control" type="email" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Website Of AirLine  <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           </div> -->
                        <div id="airline_check_form" class="container" style="display: none;">
                           <div class="row row-cols-2">
                              <div class="col-lg-6 mt-1">
                                 Name Of AirLine: <br> <input class="form-control" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Contact Number Of AirLine <br> <input class="form-control"
                                    type="number" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Email Of AirLine <br> <input class="form-control" type="email"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Website Of AirLine <br> <input class="form-control" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                           </div>
                        </div>
                        <!--  -->
                        <!-- POC OF AIRLINE -->
                        <!-- <div class="col-lg-6 mt-1" id="POC" >
                           POC of AirLine   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div> -->
                        <div class="col-lg-6 mt-2 ml-3 ">
                           <input class="form-check-input" type="checkbox" id="POC_check">
                           <label class="form-check-label" for="check">POC of Airline</label>
                        </div>
                        <div class="container" id="POC_check_form" style="display: none;">
                           <div class="row row-cols-2">
                              <div class="col-lg-6 spacing-right">
                                 POC Name <br> <input class="form-control" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                 POC Designation <br> <input class="form-control" name=""
                                    type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                 POC Contact No <br> <input class="form-control" name=""
                                    type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                 POC Email <br> <input class="form-control" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-12"><strong> Address of POC of Airline: </strong></div>
                              <div class="col-lg-6 spacing-right">
                                 Office No <br> <input class="form-control" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                 Floor <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                 Building <br> <input class="form-control" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                 Block <br> <input class="form-control" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                 Area <br> <input class="form-control" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                 City <br> <input class="form-control" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                 Photograph of Building <br> <input class="form-control" id=""
                                    name="" type="file" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                 Pin location <br> <input class="form-control" id="" name=""
                                    type="text" placeholder="..." style="width: 100%;">
                              </div>
                           </div>
                        </div>
                        <!-- Adress info -->
                        <div class="container " id="address_POC_form" style="display: none;">
                           <div class="col-lg-6 spacing-left">
                              <h5>Address</h5>
                              <div class="row mb-1">
                                 <div class="col-lg-5 spacing-right">
                                    Office No <br> <input class="form-control"
                                       id="head_office_cell_no" name="head_office_cell_no[]"
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-5 spacing-right">
                                    Floor <br> <input class="form-control" id="" name="c_pin"
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                              </div>
                              <div class="row mb-1">
                                 <div class="col-lg-5 spacing-right">
                                    Building <br> <input class="form-control"
                                       id="head_office_cell_no" name="head_office_cell_no[]"
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-5 spacing-right">
                                    Block <br> <input class="form-control"
                                       id="head_office_cell_no" name="head_office_cell_no[]"
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                              </div>
                              <div class="row mb-1">
                                 <div class="col-lg-5 spacing-right">
                                    Area <br> <input class="form-control"
                                       id="head_office_cell_no" name="head_office_cell_no[]"
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-5 spacing-right">
                                    City <br> <input class="form-control"
                                       id="head_office_cell_no" name="c_city" type="text"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                              </div>
                              <div class="row mb-1">
                                 <div class="col-lg-5 spacing-right">
                                    Photograph of Building <br> <input class="form-control"
                                       id="" name="c_photo" type="file" placeholder="..."
                                       style="width: 100%;">
                                 </div>
                                 <div class="col-lg-5 spacing-right">
                                    Pin location <br> <input class="form-control" id=""
                                       name="c_pin" type="text" placeholder="..."
                                       style="width: 100%;">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--  -->
                        <div class="col-lg-6 mt-1">
                           Flight Number <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Flying from which Country <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Guest/Focal Person Contact Number <br> <input class="form-control"
                              type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Copy Of Guest Ticket <br> <input class="form-control" type="file"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Copy of Guest Visa <br> <input class="form-control" type="file"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Guest Travelling Schedule <br> <input class="form-control" type="file"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <h5 class="mt-1">Baggage Details :</h5>
                        <div class="col-lg-6 spacing-right">
                           Hand Carry : <br>
                           <select id="leadcategory" class="form-control mt-1" name="category"
                              style="width: 100%;">
                              <option value="">Yes</option>
                              <option value="">No</option>
                           </select>
                        </div>
                        <div class="col-lg-6 mt-1">
                           Weight <br> <input class="form-control" type="text" placeholder="..."
                              style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Tag Number of Booked Luggage <br> <input class="form-control"
                              type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Color of Bags <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Weight of Bags <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Picture of Bags <br> <input class="form-control" type="file"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6">
                           Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                              name="audit_date" type="text" placeholder="..."
                              style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-6">
                           Attachments <br> <input class="form-control mt-1" id="head_office_email"
                              name="audit_sign" type="file" placeholder="..."
                              style="width: 100%;">
                        </div>
                     </div>
                     --}}
                     <!-- For Add more Facilitation Services -->
                     <div class="container my-1">
                        <div class="accordion" id="signatoryAccordion4">
                           <!-- Initial Accordion Item -->
                           <div class="accordion-item signaccordion-item4" id="signatoryEntry4">
                              <h2 class="accordion-header" id="signatoryHeading4"
                                 style="color: white">
                                 <button class="accordion-button"
                                    style="background-color: #34005A; color:white" type="button"
                                    data-toggle="collapse" data-target="#signatoryCollapse4"
                                    aria-expanded="false" aria-controls="signatoryCollapse4">
                                 Facilitation Entry 1
                                 </button>
                              </h2>
                              <div id="signatoryCollapse4" class="collapse"
                                 aria-labelledby="signatoryHeading4">
                                 <div class="accordion-body">
                                    <!-- Your content for signatory entry goes here -->
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
                                                Airline:
                                             </div>
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
                                       {{--
                                       <div class="container " id="address_POC_form"
                                          style="display: none;">
                                          <div class="row row-cols-2">
                                             <div class="col-lg-6 mt-1">
                                                Office Number <br> <input
                                                   class="form-control" name="[]" type="text"
                                                   placeholder="..." style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                Building <br> <input class="form-control"
                                                   type="text" name="[]" placeholder="..."
                                                   style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                Block <br> <input class="form-control"
                                                   type="text" name="[]" placeholder="..."
                                                   style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                Area <br> <input class="form-control"
                                                   type="text" name="[]" placeholder="..."
                                                   style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                City <br> <input class="form-control"
                                                   type="text" name="[]" placeholder="..."
                                                   style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                Photograph of Building <br> <input
                                                   class="form-control" name="[]" type="file"
                                                   placeholder="..." style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                Email <br> <input class="form-control"
                                                   type="text" name="[]" placeholder="..."
                                                   style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                Website <br> <input class="form-control"
                                                   type="text" name="[]" placeholder="..."
                                                   style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                Pin Location <br> <input
                                                   class="form-control" name="[]" type="text"
                                                   placeholder="..." style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                GPS <br> <input class="form-control"
                                                   type="text" name="[]" placeholder="..."
                                                   style="width: 100%;">
                                             </div>
                                             <div class="col-lg-6">
                                                Notes <br> <textarea
                                                   class="form-control mt-1"
                                                   id="head_office_name"
                                                   type="text" name="[]" placeholder="..."
                                                   style="width: 100%;"></textarea>
                                             </div>
                                             <div class="col-lg-6 mt-1">
                                                Attachements <br> <input
                                                   class="form-control" name="[]" type="file"
                                                   placeholder="..." style="width: 100%;">
                                             </div>
                                          </div>
                                       </div>
                                       --}}
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
                                             <option value="Yes">Yes</option>
                                             <option value="No">No</option>
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
                              </div>
                           </div>
                        </div>
                        <!-- Add More and Remove Buttons -->
                        <div class="row my-3">
                           <div class="col">
                              <button type="button" class="btn btn-primary" id="addSignatory4"
                                 style="height:30px; width:150px;">Add More</button>
                           </div>
                           <button type="button" class="btn btn-primary"
                              id="updateSignatoryTable4">Save</button>
                        </div>
                     </div>
                     <table class="table table-bordered mt-1" id="signatorySummaryTable4">
                        <thead>
                           <tr>
                              <th>Entry</th>
                              <th>Guest Arrival Time</th>
                              <th>Security Team Reporting Time</th>
                              <th>Nationality of Guest</th>
                              <th>View</th>
                              <!-- Add more columns as needed -->
                           </tr>
                        </thead>
                        <tbody>
                           <!-- Summary data will be added here dynamically -->
                        </tbody>
                     </table>
                     <center>
                        <div class="col-lg-6">
                           <button class="btn btn-primary new-branch mt-2"
                              style="height:30px; width:150px;"
                              onclick="removeNewDiv5()">Remove</button>
                        </div>
                     </center>
                  </div>
               </div>
               <!-- For Private Jet -->
               <div class="new-div" id="newDiv5-a" style="display:none;">
                  {{--
                  <div class="col-lg-12">
                     <div class="row mb-2">
                        <div class="col-lg-6 mt-1">
                           No. of Days Private Jet Required for <br> <input class="form-control"
                              type="text" name="noOfDaysReqJet" placeholder="..."
                              style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                           Fuel <br>
                           <select id="leadcategoryfuel" class="form-control mt-1" name="fuel"
                              style="width: 100%;">
                              <option value="">select</option>
                              <option value="As Per Actual">As Per Actual</option>
                              <option value="As Per Kilometer">As Per Kilometer</option>
                           </select>
                        </div>
                        <div class="col-lg-12 mt-1 spacing-right" id="rateOfFuel">
                           Rate of Fuel per Kilometer <br> <input class="form-control" type="text"
                              placeholder="..." name="rateOfFuelPerKiloM" style="width: 100%;">
                        </div>
                     </div>
                  </div>
                  --}}
                  <!-- For Add more Private Jet -->
                  <div class="container my-1">
                     <div class="accordion" id="signatoryAccordion4_1">
                        <!-- Initial Accordion Item -->
                        <div class="accordion-item signaccordion-item4_1" id="signatoryEntry4_1">
                           <h2 class="accordion-header" id="signatoryHeading4_1"
                              style="color: white">
                              <button class="accordion-button"
                                 style="background-color: #34005A; color:white" type="button"
                                 data-toggle="collapse" data-target="#signatoryCollapse4_1"
                                 aria-expanded="false" aria-controls="signatoryCollapse4_1">
                              Private Jet Entry 1
                              </button>
                           </h2>
                           <div id="signatoryCollapse4_1" class="collapse"
                              aria-labelledby="signatoryHeading4_1">
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
                                       Rate of Fuel per Kilometer <br> <input name="rate_of_fuel_for_jet[]"
                                          class="form-control" type="text" placeholder="..."
                                          style="width: 100%;">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row my-3">
                        <div class="col">
                           <button type="button" class="btn btn-primary" id="addSignatory4_1"
                              style="height:30px; width:150px;">Add More</button>
                        </div>
                        <button type="button" class="btn btn-primary"
                           id="updateSignatoryTable4_1">Save</button>
                     </div>
                  </div>
                  <table class="table table-bordered mt-1" id="signatorySummaryTable4_1">
                     <thead>
                        <tr>
                           <th>Entry</th>
                           <th>No. of Days Private Jet Required for</th>
                           <th>Fuel</th>
                           <th>Rate of Fuel per Kilometer</th>
                           <th>View</th>
                        </tr>
                     </thead>
                     <tbody>
                        <!-- Summary data will be added here dynamically -->
                     </tbody>
                  </table>
                  <center>
                     <div class="col-lg-6">
                        <button class="btn btn-primary new-branch mt-2"
                           style="height:30px; width:150px;"
                           onclick="removeNewDiv5_a()">Remove</button>
                     </div>
                  </center>
               </div>
            </div>
            <!-- <div class="col-lg-3" >
               <div>
                   <div class="img4" id="img4" style="text-align: center;">
                       <img class="rounded-circle img-thumbnail" class="small-icon" style="width: 100px; height: 100px;" src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" height="100" width="100" alt="">
                       <p>Sojourn</p>
                   </div>
               </div>
               </div>
               <div class="col-lg-9">
               <div class="new-div" id="newDiv6" style="display:flex;">
                   <div class="col-lg-12">
                       <div class="row mb-2">
                           <div class="col-lg-6 mt-1">
                               Guest Arrival Time    <br>  <input class="form-control" type="time" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Security Team Reporting Time   <br>  <input class="form-control" type="time" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               PhotoGraph of Guest     <br>  <input class="form-control" type="file" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               PhotoGraph of Passport     <br>  <input class="form-control" type="file" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Nationality of Guest    <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Airline   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Flight Number     <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Flying from which Country   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Guest/Focal Person Contact Number    <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Copy Of Guest Ticket   <br>  <input class="form-control" type="file" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Copy of Guest Visa    <br>  <input class="form-control" type="file" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Guest Travelling Schedule    <br>  <input class="form-control" type="file" placeholder="..." style="width: 100%;">
                           </div>
                           <h5>Baggage Details :</h5>
                           <div class="col-lg-6 spacing-right">
                               Hand Carry : <br>
                               <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
                                   <option value="">Yes</option>
                                   <option value="">No</option>
                               </select>
                           </div>
                           <div class="col-lg-6 mt-1">
                               Weight   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Tag Number of Booked Luggage    <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Color of Bags   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Weight of Bags    <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Picture of Bags   <br>  <input class="form-control" type="file" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6">
                               Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="audit_date" type="text" placeholder="..." style="width: 100%;"></textarea>
                           </div>
                           <div class="col-lg-6">
                               Attachments <br> <input class="form-control mt-1" id="head_office_email" name="audit_sign" type="file"   placeholder="..." style="width: 100%;">
                           </div>
                           <button class="new-branch mt-2" onclick="removeNewDiv6()">Remove</button>
                       </div>
                   </div>
               </div>
               </div> -->
         </div>
      </div>
   </div>
   <!-- Event -->
   <div class="col-lg-8" id="col-lg-8-4" style="display:none;">
      <div class="col-lg-12 mx-0 p-0">
         <div class="col-lg-12 d-flex row px-0 m-0" id="event" style="position:relative; left:-5%;">
            <div class="col-lg-3">
               <div>
                  <div class="img20" id="img20" style="text-align: center;">
                     <img class="rounded-circle img-thumbnail" class="small-icon"
                        style="width: 100px; height: 100px; object-fit: auto;"
                        src="/public/sales/event.png" height="100" width="100" alt="">
                     <p>Event Security</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-9">
               <div class="new-div" id="newDiv17" style="display:none;">
                  <div class="col-lg-12">
                     {{--
                     <div class="row mb-2">
                        <div class="col-lg-6 spacing-right" id="Owner">
                           Nature of Event : <br>
                           <input
                              class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                           Required for : <br>
                           <select id="leadcategory" class="form-control mt-1" name="category"
                              style="width: 100%;">
                              <option value="">Daily</option>
                              <option value="">Monthly</option>
                           </select>
                        </div>
                        <div class="col-lg-6 mt-1">
                           No of days Security Staff Required for <br> <input class="form-control"
                              type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Duty Start Date <br> <input class="form-control" type="date"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Duty End Date <br> <input class="form-control" type="date"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Duty Start Time <br> <input class="form-control" type="time"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Duty End Time <br> <input class="form-control" type="time"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Shift Duration <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1 spacing-right">
                           Shift Type : <br>
                           <select id="leadcategory" class="form-control mt-1" name="category"
                              style="width: 100%;">
                              <option value="">Day Shift</option>
                              <option value="">Night Shift</option>
                           </select>
                        </div>
                        <div class="col-lg-6 mt-1">
                           No. of Shifts <br> <input class="form-control" type="text"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <!-- <div class="col-lg-6 mt-1" id="location_address">
                           Reporting Location   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div> -->
                        <div class="col-lg-6 mt-2 ml-3 ">
                           <input class="form-check-input" type="checkbox"
                              id="reporting_location_check">
                           <label class="form-check-label" for="check">Reporting Location</label>
                        </div>
                        <!-- Address -->
                        <div class="container " id="reporting_location_form" style="display: none;">
                           <div class="row row-cols-2">
                              <div class="col-lg-6 mt-1">
                                 Office No <br> <input class="form-control" id="" name=""
                                    type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Floor <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Building <br> <input class="form-control" id="" name=""
                                    type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Block <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Area <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 City <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Photograph of Building <br> <input class="form-control" id=""
                                    name="" type="file" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Pin location <br> <input class="form-control" id="" name=""
                                    type="text" placeholder="..." style="width: 100%;">
                              </div>
                           </div>
                        </div>
                        <!--  -->
                        <div class="col-lg-6 mt-1">
                           Event Date <br> <input class="form-control" type="date"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Event Venue <br> <input class="form-control" type="file"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6">
                           Deployment Plan <br> <input class="form-control mt-1"
                              id="head_office_email" name="audit_sign" type="file"
                              placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6">
                           Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                              name="audit_date" type="text" placeholder="..."
                              style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-6">
                           Attachments <br> <input class="form-control mt-1" id="head_office_email"
                              name="audit_sign" type="file" placeholder="..."
                              style="width: 100%;">
                        </div>
                        <!-- <div class="col-lg-6 mt-2 ml-3 ">
                           <input class="form-check-input" type="checkbox"
                               id="escort_services_check">
                           <label class="form-check-label" for="check">Escort Services</label>
                           </div> -->
                        <!-- Escort Services Form -->
                        <div class="new-div" id="escort_services_form" style="display:none;">
                           <div class="col-lg-12">
                              <div class="row mb-2">
                                 <div class="col-lg-6 spacing-right">
                                    Ownership Status: <br>
                                    <select id="leadcategory" class="form-control mt-1"
                                       name="oscategory" style="width: 90%;">
                                       <option value="Company Owned">Company Owned</option>
                                       <option value="OutSourced">OutSourced</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 spacing-right">
                                    Types: <br>
                                    <select id="leadcategory" class="form-control mt-1"
                                       name="tcategory" style="width: 100%;">
                                       <option value="Pilot Vehicle">Pilot Vehicle</option>
                                       <option value="Escort Vehicle">Escort Vehicle</option>
                                       <option value="Follow Up Vehicle">Follow Up Vehicle
                                       </option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 spacing-right">
                                    Category : <br>
                                    <select id="leadcategory" class="form-control mt-1"
                                       name="ccategory" style="width: 100%;">
                                       <option value="Saloon">Saloon</option>
                                       <option value="Yaris">Yaris</option>
                                       <option value="Civic">Civic</option>
                                       <option value="City">City</option>
                                       <option value="Xli">Xli</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 spacing-right">
                                    Required for : <br>
                                    <select id="leadcategory" class="form-control mt-1"
                                       name="category" style="width: 90%;">
                                       <option value="">Monthly Basis</option>
                                       <option value="">Daily Basis</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Monthly Maintenance Cost <br> <input class="form-control"
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1 spacing-right">
                                    Fuel <br>
                                    <select id="fuel_1" class="form-control mt-1 fuel"
                                       name="category" style="width: 90%;">
                                       <option value="fuel_rate_1_1"> Fuel Rate Per Kilometer
                                       </option>
                                       <option value="fuel_rate_2_2"> Kilometer Required
                                       </option>
                                    </select>
                                 </div>
                                 <div>
                                    <div class="col-lg-6 mt-1 " id="fuel_rate_km_1"
                                       style="display:none;">
                                       Fuel Rate Per Kilometer <br> <input
                                          class="form-control " type="text" placeholder="..."
                                          style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 mt-1 " id="fuel_rate_km_req_1"
                                       style="display:none;">
                                       Kilometer Required <br> <input class="form-control "
                                          type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Toll Tax & Parking Charges:
                                    <br> <input class="form-control " type="text"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Meter Reading at the start of the duty <br> <input
                                       class="form-control" type="file" placeholder="..."
                                       style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Picture of Meter Reading before duty <br> <input
                                       class="form-control" type="file" placeholder="..."
                                       style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Reporting Time <br> <input class="form-control" type="time"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <!-- <div class="col-lg-6 mt-1 " id="reporting_address">
                                    Reporting Address   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                                    </div> -->
                                 <div class="col-lg-6 mt-2 ml-3 ">
                                    <input class="form-check-input" type="checkbox"
                                       id="reporting_address_escort_check">
                                    <label class="form-check-label" for="check">Reporting
                                    Addresssss</label>
                                 </div>
                                 <!-- Address Form -->
                                 <div class="container " id="reporting_address_escort_form"
                                    style="display: none;">
                                    <div class="col-lg-6 spacing-left">
                                       <h5>Address</h5>
                                       <div class="row mb-1">
                                          <div class="col-lg-5 spacing-right">
                                             Office No <br> <input class="form-control"
                                                id="head_office_cell_no"
                                                name="head_office_cell_no[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                          </div>
                                          <div class="col-lg-5 spacing-right">
                                             Floor <br> <input class="form-control" id=""
                                                name="c_pin" type="text" placeholder="..."
                                                style="width: 100%;">
                                          </div>
                                       </div>
                                       <div class="row mb-1">
                                          <div class="col-lg-5 spacing-right">
                                             Building <br> <input class="form-control"
                                                id="head_office_cell_no"
                                                name="head_office_cell_no[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                          </div>
                                          <div class="col-lg-5 spacing-right">
                                             Block <br> <input class="form-control"
                                                id="head_office_cell_no"
                                                name="head_office_cell_no[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                          </div>
                                       </div>
                                       <div class="row mb-1">
                                          <div class="col-lg-5 spacing-right">
                                             Area <br> <input class="form-control"
                                                id="head_office_cell_no"
                                                name="head_office_cell_no[]" type="text"
                                                placeholder="..." style="width: 100%;">
                                          </div>
                                          <div class="col-lg-5 spacing-right">
                                             City <br> <input class="form-control"
                                                id="head_office_cell_no" name="c_city"
                                                type="text" placeholder="..."
                                                style="width: 100%;">
                                          </div>
                                       </div>
                                       <div class="row mb-1">
                                          <div class="col-lg-5 spacing-right">
                                             Photograph of Building <br> <input
                                                class="form-control" id="" name="c_photo"
                                                type="file" placeholder="..."
                                                style="width: 100%;">
                                          </div>
                                          <div class="col-lg-5 spacing-right">
                                             Pin location <br> <input class="form-control"
                                                id="" name="c_pin" type="text"
                                                placeholder="..." style="width: 100%;">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!--  -->
                                 <div class="col-lg-6 mt-1">
                                    Duty Start Date <br> <input class="form-control" type="date"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Duty End Date <br> <input class="form-control" type="date"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Duty Start Time <br> <input class="form-control" type="time"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Duty End Time <br> <input class="form-control" type="time"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Shift Duration <br> <input class="form-control" type="text"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    No. of Shifts <br> <input class="form-control" type="text"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <!-- Required with Driver : <br>
                                    <select id="driver" class="form-control mt-1" name="category" style="width: 90%;">
                                        <option value="yes">Yes</option>
                                        <option value="">No</option>
                                    </select> -->
                                 <div class="col-lg-6 spacing-right mt-2 ml-3 ">
                                    <input class="form-check-input" type="checkbox"
                                       id="check_escort_driver">
                                    <label class="form-check-label" for="check">Required with
                                    Driver</label>
                                 </div>
                                 <div class="col-lg-6 mt-1" id="food_escort_driver"
                                    style="display: none;">
                                    Food For Driver By Client <br> <input class="form-control"
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 spacing-right mt-2 ml-3 ">
                                    <input class="form-check-input" type="checkbox"
                                       id="check_escort_staff">
                                    <label class="form-check-label" for="check">Required With
                                    Security Staff</label>
                                 </div>
                                 <!-- Men Guarding Services Tab -->
                                 <div class="new-div" id="check_escort_staff_Men_Guarding"
                                    style="display:none;">
                                    <div class="col-lg-12">
                                       <div class="row mb-2">
                                          <div class="col-lg-6 spacing-right">
                                             Category <br>
                                             <select id="staff_category" class="form-control"
                                                name="ay_other_d" style="width: 100%;">
                                                <option value="">Armed Security Supervisor
                                                   (Ex-Servicemen)
                                                </option>
                                                <option value="">Armed Security Supervisor
                                                   (Civil)
                                                </option>
                                                <option value="">Unarmed Security Supervisor
                                                   (Ex-Servicemen)
                                                </option>
                                                <option value="">Unarmed Security Supervisor
                                                   (Civil)
                                                </option>
                                                <option value="">Armed Security Guard
                                                   (Ex-Servicemen)
                                                </option>
                                                <option value="">Armed Security Guard
                                                   (Civil)
                                                </option>
                                                <option value="">Unarmed Security
                                                   Guard(Ex-Servicemen)
                                                </option>
                                                <option value="">Unarmed Security
                                                   Guard(Civil)
                                                </option>
                                                <option value="">Close Protection
                                                   Office/Executive Protective Officers
                                                </option>
                                                <option value="">Lady Searcher</option>
                                                <option value="">Male Searcher</option>
                                                <option value="">Bouncers</option>
                                                <option value="">Project Head</option>
                                                <option value="">Security Manager</option>
                                                <option value="">SSG</option>
                                                <option value="">Male Facilitation Officer
                                                </option>
                                                <option value="">Female Facilitation Officer
                                                </option>
                                                <option value="">Escort Security Guard
                                                </option>
                                                <option value="">Baggae Scanner Operator
                                                </option>
                                                <option value="">Sniper</option>
                                                <option value="">Traffic Controller</option>
                                                <option value="">Ceremonial Guard</option>
                                                <option value="">VIP Ceremonial Guard
                                                </option>
                                                <option value="">VVIP Ceremonial Guard
                                                </option>
                                                <option value="">Fire Birgade</option>
                                                <option value="">Paramedic Staff</option>
                                                <option value="">Security Facilitation
                                                   Officers(SFO)
                                                </option>
                                                <option value="">Guide</option>
                                             </select>
                                          </div>
                                          <div class="col-lg-6 spacing-right">
                                             Quantity : <br>
                                             <select id="leadcategory"
                                                class="form-control mt-1" name="category"
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
                                             <select id="leadcategory"
                                                class="form-control mt-1" name="category"
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
                                             <select id="leadcategory"
                                                class="form-control mt-1" name="category"
                                                style="width: 90%;">
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                             </select>
                                          </div>
                                          <div class="col-lg-6 spacing-right">
                                             Accomodation By Client : <br>
                                             <select id="leadcategory"
                                                class="form-control mt-1" name="category"
                                                style="width: 90%;">
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                             </select>
                                          </div>
                                          <div class="col-lg-6 spacing-right">
                                             Food by Client : <br>
                                             <select id="leadcategory"
                                                class="form-control mt-1" name="category"
                                                style="width: 90%;">
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                             </select>
                                          </div>
                                          <div class="col-lg-6 spacing-right">
                                             Transportation by Client : <br>
                                             <select id="leadcategory"
                                                class="form-control mt-1" name="category"
                                                style="width: 90%;">
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                             </select>
                                          </div>
                                          <div class="col-lg-6 spacing-right">
                                             Required on monthly basis : <br>
                                             <select id="leadcategory"
                                                class="form-control mt-1" name="category"
                                                style="width: 90%;">
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                             </select>
                                          </div>
                                          <div class="col-lg-6 spacing-right">
                                             Required on dialy basis : <br>
                                             <select id="leadcategory"
                                                class="form-control mt-1" name="category"
                                                style="width: 90%;">
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                             </select>
                                          </div>
                                          <div class="col-lg-6 mt-1">
                                             No. of days Security Staff required for <br>
                                             <input class="form-control" type="text"
                                                placeholder="..." style="width: 100%;">
                                          </div>
                                          <div class="col-lg-6">
                                             Notes <br> <textarea class="form-control mt-1"
                                                id="head_office_name" name="audit_date"
                                                type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                          </div>
                                          <div class="col-lg-6">
                                             Attachments <br> <input
                                                class="form-control mt-1"
                                                id="head_office_email" name="audit_sign"
                                                type="file" placeholder="..."
                                                style="width: 100%;">
                                          </div>
                                          <!-- <button class="new-branch mt-2" onclick="removeNewDiv7()">Remove</button> -->
                                       </div>
                                    </div>
                                 </div>
                                 <!--  -->
                                 <div class="col-lg-6">
                                    Notes <br> <textarea class="form-control mt-1"
                                       id="head_office_name" name="audit_date" type="text"
                                       placeholder="..." style="width: 100%;"></textarea>
                                 </div>
                                 <div class="col-lg-6">
                                    Attachments <br> <input class="form-control mt-1"
                                       id="head_office_email" name="audit_sign" type="file"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <!-- <button class="new-branch mt-2" onclick="removeNewDiv()">Remove</button> -->
                              </div>
                           </div>
                        </div>
                        <!--  -->
                        <!-- <div class="col-lg-6 mt-2 ml-3 ">
                           <input class="form-check-input" type="checkbox"
                               id="canine_services_check">
                           <label class="form-check-label" for="check">Canine Services </label>
                           </div> -->
                        <!-- Canine Services Form -->
                        <div class="new-div" id="canine_services_form" style="display:none;">
                           <div class="col-lg-12">
                              <div class="row mb-2">
                                 <div class="col-lg-6 spacing-right">
                                    Required for : <br>
                                    <select id="leadcategory" class="form-control mt-1"
                                       name="category" style="width: 90%;">
                                       <option value="">Monthly Basis</option>
                                       <option value="">Daily Basis</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    No. of days Dogs Require for <br> <input
                                       class="form-control" type="text" placeholder="..."
                                       style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Color of Dog <br> <input class="form-control" type="text"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    No. of Dog(s) <br> <input class="form-control" type="text"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 spacing-right">
                                    Required with Handler : <br>
                                    <select id="leadcategory" class="form-control mt-1"
                                       name="category" style="width: 90%;">
                                       <option value="">Yes</option>
                                       <option value="">No</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Name of Handler <br> <input class="form-control" type="text"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    CNIC <br> <input class="form-control" type="text"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Age <br> <input class="form-control" type="text"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Experience <br> <input class="form-control" type="text"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Cell Number <br> <input class="form-control" type="text"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    CNIC Front <br> <input class="form-control" type="file"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    CNIC Back <br> <input class="form-control" type="file"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Duty Start Date <br> <input class="form-control" type="date"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Duty End Date <br> <input class="form-control" type="date"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Duty Start Time <br> <input class="form-control" type="time"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Duty End Time <br> <input class="form-control" type="time"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Shift Duration <br> <input class="form-control" type="text"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    No. of Shifts <br> <input class="form-control" type="text"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Picture of Dogs <br> <input class="form-control" type="file"
                                       multiple placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6">
                                    Notes <br> <textarea class="form-control mt-1"
                                       id="head_office_name" name="audit_date" type="text"
                                       placeholder="..." style="width: 100%;"></textarea>
                                 </div>
                                 <div class="col-lg-6">
                                    Attachments <br> <input class="form-control mt-1"
                                       id="head_office_email" name="audit_sign" type="file"
                                       placeholder="..." style="width: 100%;">
                                 </div>
                                 <!-- <button class="new-branch mt-2" onclick="removeNewDiv3()">Remove</button> -->
                              </div>
                           </div>
                        </div>
                        <!--  -->
                     </div>
                     --}}
                     <!-- For Add More Event services -->
                     <div class="container my-1">
                        <div class="accordion" id="signatoryAccordion5">
                           <!-- Initial Accordion Item -->
                           <div class="accordion-item signaccordion-item5" id="signatoryEntry5">
                              <h2 class="accordion-header" id="signatoryHeading5"
                                 style="color: white">
                                 <button class="accordion-button"
                                    style="background-color: #34005A; color:white" type="button"
                                    data-toggle="collapse" data-target="#signatoryCollapse5"
                                    aria-expanded="false" aria-controls="signatoryCollapse5">
                                 Event Entry 1
                                 </button>
                              </h2>
                              <div id="signatoryCollapse5" class="collapse"
                                 aria-labelledby="signatoryHeading5">
                                 <div class="accordion-body">
                                    <!-- Your content for entry goes here -->
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
                                                <option value="Day Shift">Day Shift</option>
                                                <option value="Night Shift">Night Shift</option>
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
                                                      class="form-control" name="event_office_no[]" id=""
                                                      type="text" placeholder="..."
                                                      style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 mt-1">
                                                   Floor <br> <input class="form-control"
                                                      id="" type="text" name="event_floor[]"
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
                                                      id="" name="event_block[]" type="text"
                                                      placeholder="..."
                                                      style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 mt-1">
                                                   Area <br> <input class="form-control"
                                                      id="" type="text" name="event_area[]"
                                                      placeholder="..."
                                                      style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 mt-1">
                                                   City <br> <input class="form-control"
                                                      id=""  type="text" name="event_city[]"
                                                      placeholder="..."
                                                      style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 mt-1">
                                                   Photograph of Building <br> <input
                                                      class="form-control" id="" name="event_photo[]"
                                                      type="file" placeholder="..."
                                                      style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 mt-1">
                                                   Pin location <br> <input
                                                      class="form-control" id="" name="event_loc[]"
                                                      type="text" placeholder="..."
                                                      style="width: 100%;">
                                                </div>
                                             </div>
                                          </div>
                                          <!--  -->
                                          <div class="col-lg-6 mt-1">
                                             Event Date <br> <input class="form-control"
                                                type="date" placeholder="..." name="event_date[]"
                                                style="width: 100%;">
                                          </div>
                                          <div class="col-lg-6 mt-1">
                                             Event Venue <br> <input class="form-control"
                                                type="file" placeholder="..." name="event_venue[]"
                                                style="width: 100%;">
                                          </div>
                                          <div class="col-lg-6">
                                             Deployment Plan <br> <input
                                                class="form-control mt-1"
                                                id="head_office_email" name="event_deployment_plan[]"
                                                type="file" placeholder="..."
                                                style="width: 100%;">
                                          </div>
                                          <div class="col-lg-6">
                                             Notes <br> <textarea class="form-control mt-1"
                                                id="head_office_name" name="event_security_notes[]"
                                                type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                          </div>
                                          <div class="col-lg-6">
                                             Attachments <br> <input
                                                class="form-control mt-1"
                                                id="head_office_email" name="event_security_attach[]"
                                                type="file" placeholder="..."
                                                style="width: 100%;">
                                          </div>
                                          <!-- Escort Services Form -->
                                          {{--
                                          <div class="new-div" id="escort_services_form"
                                             style="display:none;">
                                             <div class="col-lg-12">
                                                <div class="row mb-2">
                                                   <div class="col-lg-6 spacing-right">
                                                      Ownership Status: <br>
                                                      <select id="leadcategory"
                                                         class="form-control mt-1"
                                                         style="width: 90%;">
                                                         <option value="Company Owned">
                                                            Company Owned
                                                         </option>
                                                         <option value="OutSourced">
                                                            OutSourced
                                                         </option>
                                                      </select>
                                                   </div>
                                                   <div class="col-lg-6 spacing-right">
                                                      Types: <br>
                                                      <select id="leadcategory"
                                                         class="form-control mt-1"
                                                         style="width: 100%;">
                                                         <option value="Pilot Vehicle">
                                                            Pilot Vehicle
                                                         </option>
                                                         <option value="Escort Vehicle">
                                                            Escort Vehicle
                                                         </option>
                                                         <option
                                                            value="Follow Up Vehicle">
                                                            Follow Up Vehicle
                                                         </option>
                                                      </select>
                                                   </div>
                                                   <div class="col-lg-6 spacing-right">
                                                      Category : <br>
                                                      <select id="leadcategory"
                                                         class="form-control mt-1"
                                                         style="width: 100%;">
                                                         <option value="Saloon">Saloon
                                                         </option>
                                                         <option value="Yaris">Yaris
                                                         </option>
                                                         <option value="Civic">Civic
                                                         </option>
                                                         <option value="City">City
                                                         </option>
                                                         <option value="Xli">Xli</option>
                                                      </select>
                                                   </div>
                                                   <div class="col-lg-6 spacing-right">
                                                      Required for : <br>
                                                      <select id="leadcategory"
                                                         class="form-control mt-1"
                                                         style="width: 90%;">
                                                         <option value="">Monthly Basis
                                                         </option>
                                                         <option value="">Daily Basis
                                                         </option>
                                                      </select>
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                      Monthly Maintenance Cost <br> <input
                                                         class="form-control" type="text"
                                                         placeholder="..."
                                                         style="width: 100%;">
                                                   </div>
                                                   <div
                                                      class="col-lg-6 mt-1 spacing-right">
                                                      Fuel <br>
                                                      <select id="fuel_1"
                                                         class="form-control mt-1 fuel"
                                                         style="width: 90%;">
                                                         <option value="fuel_rate_1_1">
                                                            Fuel Rate Per Kilometer
                                                         </option>
                                                         <option value="fuel_rate_2_2">
                                                            Kilometer Required
                                                         </option>
                                                      </select>
                                                   </div>
                                                   <div>
                                                      <div class="col-lg-6 mt-1 "
                                                         id="fuel_rate_km_1"
                                                         style="display:none;">
                                                         Fuel Rate Per Kilometer <br>
                                                         <input class="form-control "
                                                            type="text"
                                                            placeholder="..."
                                                            style="width: 100%;">
                                                      </div>
                                                      <div class="col-lg-6 mt-1 "
                                                         id="fuel_rate_km_req_1"
                                                         style="display:none;">
                                                         Kilometer Required <br> <input
                                                            class="form-control "
                                                            type="text"
                                                            placeholder="..."
                                                            style="width: 100%;">
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                      Toll Tax & Parking Charges:
                                                      <br> <input class="form-control "
                                                         type="text" placeholder="..."
                                                         style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                      Meter Reading at the start of the
                                                      duty <br> <input
                                                         class="form-control" type="file"
                                                         placeholder="..."
                                                         style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                      Picture of Meter Reading before duty
                                                      <br> <input class="form-control"
                                                         type="file" placeholder="..."
                                                         style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                      Reporting Time <br> <input
                                                         class="form-control" type="time"
                                                         placeholder="..."
                                                         style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-2 ml-3 ">
                                                      <input class="form-check-input"
                                                         type="checkbox"
                                                         id="reporting_address_escort_check">
                                                      <label class="form-check-label"
                                                         for="check">Reporting
                                                      Addresssss</label>
                                                   </div>
                                                   <!-- Address Form -->
                                                   <div class="container "
                                                      id="reporting_address_escort_form"
                                                      style="display: none;">
                                                      <div class="col-lg-6 spacing-left">
                                                         <h5>Address</h5>
                                                         <div class="row mb-1">
                                                            <div
                                                               class="col-lg-5 spacing-right">
                                                               Office No <br> <input
                                                                  class="form-control"
                                                                  id="head_office_cell_no"
                                                                  type="text"
                                                                  placeholder="..."
                                                                  style="width: 100%;">
                                                            </div>
                                                            <div
                                                               class="col-lg-5 spacing-right">
                                                               Floor <br> <input
                                                                  class="form-control"
                                                                  id=""
                                                                  type="text"
                                                                  placeholder="..."
                                                                  style="width: 100%;">
                                                            </div>
                                                         </div>
                                                         <div class="row mb-1">
                                                            <div
                                                               class="col-lg-5 spacing-right">
                                                               Building <br> <input
                                                                  class="form-control"
                                                                  id="head_office_cell_no"
                                                                  type="text"
                                                                  placeholder="..."
                                                                  style="width: 100%;">
                                                            </div>
                                                            <div
                                                               class="col-lg-5 spacing-right">
                                                               Block <br> <input
                                                                  class="form-control"
                                                                  id="head_office_cell_no"
                                                                  type="text"
                                                                  placeholder="..."
                                                                  style="width: 100%;">
                                                            </div>
                                                         </div>
                                                         <div class="row mb-1">
                                                            <div
                                                               class="col-lg-5 spacing-right">
                                                               Area <br> <input
                                                                  class="form-control"
                                                                  id="head_office_cell_no"
                                                                  type="text"
                                                                  placeholder="..."
                                                                  style="width: 100%;">
                                                            </div>
                                                            <div
                                                               class="col-lg-5 spacing-right">
                                                               City <br> <input
                                                                  class="form-control"
                                                                  id="head_office_cell_no"
                                                                  type="text"
                                                                  placeholder="..."
                                                                  style="width: 100%;">
                                                            </div>
                                                         </div>
                                                         <div class="row mb-1">
                                                            <div
                                                               class="col-lg-5 spacing-right">
                                                               Photograph of Building
                                                               <br> <input
                                                                  class="form-control"
                                                                  id=""
                                                                  type="file"
                                                                  placeholder="..."
                                                                  style="width: 100%;">
                                                            </div>
                                                            <div
                                                               class="col-lg-5 spacing-right">
                                                               Pin location <br> <input
                                                                  class="form-control"
                                                                  id=""
                                                                  type="text"
                                                                  placeholder="..."
                                                                  style="width: 100%;">
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!--  -->
                                                   <div class="col-lg-6 mt-1">
                                                      Duty Start Date <br> <input
                                                         class="form-control" type="date"
                                                         placeholder="..."
                                                         style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                      Duty End Date <br> <input
                                                         class="form-control" type="date"
                                                         placeholder="..."
                                                         style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                      Duty Start Time <br> <input
                                                         class="form-control" type="time"
                                                         placeholder="..."
                                                         style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                      Duty End Time <br> <input
                                                         class="form-control" type="time"
                                                         placeholder="..."
                                                         style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                      Shift Duration <br> <input
                                                         class="form-control" type="text"
                                                         placeholder="..."
                                                         style="width: 100%;">
                                                   </div>
                                                   <div class="col-lg-6 mt-1">
                                                      No. of Shifts <br> <input
                                                         class="form-control" type="text"
                                                         placeholder="..."
                                                         style="width: 100%;">
                                                   </div>
                                                   <div
                                                      class="col-lg-6 spacing-right mt-2 ml-3 ">
                                                      <input class="form-check-input"
                                                         type="checkbox"
                                                         id="check_escort_driver">
                                                      <label class="form-check-label"
                                                         for="check">Required with
                                                      Driver</label>
                                                   </div>
                                                   <div class="col-lg-6 mt-1"
                                                      id="food_escort_driver"
                                                      style="display: none;">
                                                      Food For Driver By Client <br>
                                                      <input class="form-control"
                                                         type="text" placeholder="..."
                                                         style="width: 100%;">
                                                   </div>
                                                   <div
                                                      class="col-lg-6 spacing-right mt-2 ml-3 ">
                                                      <input class="form-check-input"
                                                         type="checkbox"
                                                         id="check_escort_staff">
                                                      <label class="form-check-label"
                                                         for="check">Required With
                                                      Security Staff</label>
                                                   </div>
                                                   <!--  -->
                                                   <div class="col-lg-6">
                                                      Notes <br> <textarea
                                                         class="form-control mt-1"
                                                         id="head_office_name"
                                                         type="text"
                                                         placeholder="..."
                                                         style="width: 100%;"></textarea>
                                                   </div>
                                                   <div class="col-lg-6">
                                                      Attachments <br> <input
                                                         class="form-control mt-1"
                                                         id="head_office_email"
                                                         type="file"
                                                         placeholder="..."
                                                         style="width: 100%;">
                                                   </div>
                                                   <!-- <button class="new-branch mt-2" onclick="removeNewDiv()">Remove</button> -->
                                                </div>
                                             </div>
                                          </div>
                                          --}}
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Add More and Remove Buttons -->
                        <div class="row my-3">
                           <div class="col">
                              <button type="button" class="btn btn-primary" id="addSignatory5"
                                 style="height:30px; width:150px;">Add More</button>
                           </div>
                           <button type="button" class="btn btn-primary"
                              id="updateSignatoryTable5">Save</button>
                        </div>
                     </div>
                     <table class="table table-bordered mt-1" id="signatorySummaryTable5">
                        <thead>
                           <tr>
                              <th>Entry</th>
                              <th>Ownership Status</th>
                              <th>Required for</th>
                              <th>No of days Security Staff Required for</th>
                              <th>View</th>
                              <!-- Add more columns as needed -->
                           </tr>
                        </thead>
                        <tbody>
                           <!-- Summary data will be added here dynamically -->
                        </tbody>
                     </table>
                     <center>
                        <div class="col-lg-6">
                           <button class=" btn btn-primary new-branch mt-2"
                              style="height:30px; width:150px;"
                              onclick="removeNewDiv17()">Remove</button>
                        </div>
                     </center>
                  </div>
               </div>
            </div>
            <!-- <div class="col-lg-3" >
               <div>
                   <div class="img21" id="img21" style="text-align: center;">
                       <img class="rounded-circle img-thumbnail" class="small-icon" style="width: 100px; height: 100px;" src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" height="100" width="100" alt="">
                       <p>Security</p>
                   </div>
               </div>
               </div>
               <div class="col-lg-9">
               <div class="new-div" id="newDiv18" style="display:flex;">
                   <div class="col-lg-12">
                       <div class="row mb-2">
                           <div class="col-lg-6 spacing-right">
                               Rental : <br>
                               <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
                                   <option value="">Daily</option>
                                   <option value="">Monthly</option>
                               </select>
                           </div>
                           <div class="col-lg-6 mt-1">
                               No of days Security Staff Required for   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Duty Start Date     <br>  <input class="form-control" type="date" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Duty End Date     <br>  <input class="form-control" type="date" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Duty Start Time    <br>  <input class="form-control" type="time" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Duty End Time   <br>  <input class="form-control" type="time" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Shift Duration     <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 spacing-right">
                               Shift Type : <br>
                               <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
                                   <option value="">Day Shift</option>
                                   <option value="">Night Shift</option>
                               </select>
                           </div>
                           <div class="col-lg-6 mt-1">
                               No. of Shifts    <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Reporting Location   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Event Date    <br>  <input class="form-control" type="date" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                               Event Venue    <br>  <input class="form-control" type="file" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6">
                               Deployment Plan <br> <input class="form-control mt-1" id="head_office_email" name="audit_sign" type="file"   placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6">
                               Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="audit_date" type="text" placeholder="..." style="width: 100%;"></textarea>
                           </div>
                           <div class="col-lg-6">
                               Attachments <br> <input class="form-control mt-1" id="head_office_email" name="audit_sign" type="file"   placeholder="..." style="width: 100%;">
                           </div>
                           <button class="new-branch mt-2" onclick="removeNewDiv18()">Remove</button>
                       </div>
                   </div>
               </div>
               </div> -->
         </div>
      </div>
   </div>
   <!-- Security Consultancy-->
   <div class="col-lg-8" id="col-lg-8-5" style="display:none;">
      <div class="col-lg-12 mx-0 p-0">
         <div class="col-lg-12 d-flex row px-0 m-0" id="consultancy"
            style="position:relative; left:-5%;">
            <div class="col-lg-3">
               <div>
                  <div class="img22" id="img23" style="text-align: center;">
                     <img class="rounded-circle img-thumbnail" class="small-icon"
                        style="width: 100px; height: 100px;" src="/public/sales/securityConsultancy.png"
                        height="100" width="100" alt="">
                     <p>Security Consultancy</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-9">
               <div class="new-div" id="newDiv18" style="display: none;">
                  <div class="col-lg-12">
                     {{--
                     <div class="row mb-2">
                        <div class="col-lg-6 spacing-right">
                           Category : <br>
                           <select id="" class="form-control mt-1" name="category"
                              style="width: 100%;">
                              <option value="Security Planning">Security Planning</option>
                              <option value="Risk Analysis">Risk Analysis</option>
                              <option value="HSSE Survey">HSSE Survey</option>
                              <option value="Security Training">Security Training</option>
                              <option value="MEE TOO & Imitate Brand">MEE TOO & Imitate Brand
                              </option>
                           </select>
                        </div>
                        <div class="col-lg-6">
                           Scope of Work <br> <input class="form-control mt-1" id=""
                              name="audit_sign" type="file" placeholder="..."
                              style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1 ">
                           Date of Submission of Report <br> <input class="form-control mt-1" id=""
                              name="audit_sign" type="date" placeholder="..."
                              style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                              name="audit_date" type="text" placeholder="..."
                              style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-6 mt-1">
                           Attachements <br> <input class="form-control" type="file"
                              placeholder="..." style="width: 100%;">
                        </div>
                     </div>
                     --}}
                     <!-- For Add more Secuirty consultancy -->
                     <div class="container my-1">
                        <div class="accordion" id="signatoryAccordion6">
                           <!-- Initial Accordion Item -->
                           <div class="accordion-item signaccordion-item6" id="signatoryEntry6">
                              <h2 class="accordion-header" id="signatoryHeading6"
                                 style="color: white">
                                 <button class="accordion-button"
                                    style="background-color: #34005A; color:white" type="button"
                                    data-toggle="collapse" data-target="#signatoryCollapse6"
                                    aria-expanded="false" aria-controls="signatoryCollapse6">
                                 Secuirty Consultancy Entry 1
                                 </button>
                              </h2>
                              <div id="signatoryCollapse6" class="collapse"
                                 aria-labelledby="signatoryHeading6">
                                 <div class="accordion-body">
                                    <div class="row mb-2" id="signatoryDetailsContainer6">
                                       <!-- Your content for entry goes here -->
                                       <div class="col-lg-6 form-group spacing-left">
                                          Category:<br>
                                          <div class="input-group" style="width: 100%;">
                                             <select id="applicable_compliances" class="form-control mt-1" name="consultancy_category[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value=""></option>
                                                @foreach ($salesconsultancy as $consultancy)
                                                <option value="{{ $consultancy->salesConsultancy }}">{{ $consultancy->salesConsultancy }}</option>
                                                @endforeach
                                             </select>
                                             <div class="input-group-append" style="width: 30%;">
                                                <a href="{{ route('salesconsultancy') }}">
                                                <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          Scope of Work <br> <input class="form-control mt-1"
                                             id=""  type="file" name="scope_of_work[]"
                                             placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1 ">
                                          Internal Deadline <br> <input
                                             class="form-control mt-1" id=""
                                             type="date" name="internal_deadline[]"
                                             placeholder="..." style="width: 100%;">
                                       </div>
                                       <div class="col-lg-6 mt-1 ">
                                          Date of Submission of Report <br> <input
                                             class="form-control mt-1" id="" name="consultancy_date_of_submission[]"
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
                                             type="file" placeholder="..." name="consultancy_attach[]"
                                             style="width: 100%;">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row my-3">
                           <div class="col">
                              <button type="button" class="btn btn-primary" id="addSignatory6"
                                 style="height:30px; width:150px;">Add More</button>
                           </div>
                           <button type="button" class="btn btn-primary"
                              id="updateSignatoryTable6">Save</button>
                        </div>
                     </div>
                     <table class="table table-bordered mt-1" id="signatorySummaryTable6">
                        <thead>
                           <tr>
                              <th>Entry</th>
                              <th>Category</th>
                              <th>Scope of Work</th>
                              <th>Date of Submission of Report</th>
                              <th>View</th>
                           </tr>
                        </thead>
                        <tbody>
                           <!-- Summary data will be added here dynamically -->
                        </tbody>
                     </table>
                     <center>
                        <div class="col-lg-6">
                           <button class="btn btn-primary new-branch mt-2"
                              style="height:30px; width:150px;"
                              onclick="removeNewDiv18()">Remove</button>
                        </div>
                     </center>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Fire -->
   <div class="col-lg-8" id="col-lg-8-7" style="display:none;">
      <div class="col-lg-12 mx-0 p-0">
         <div class="col-lg-12 row px-0 m-0" id="fire" >
            <div class="col-lg-3">
               <div>
                  <div class="img9" id="img9" style="text-align: center;">
                     <img class="rounded-circle img-thumbnail" class="small-icon"
                        style="width: 100px; height: 100px; object-fit: contain"
                        src="{{ asset('sales/active.png') }}" height="100" width="100" alt="">
                     <p>Active Fire Protection</p>
                  </div>
               </div>
               <div>
                  <div class="img9-a" id="img9-a" style="text-align: center;">
                     <img class="rounded-circle img-thumbnail" class="small-icon"
                        style="width: 100px; height: 100px; object-fit: contain"
                        src="{{ asset('sales/passive.jpg') }}" height="100" width="100" alt="">
                     <p>Passive Fire Protection</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-12" >
               <div class="col-lg-12">
                  <div class="new-div" id="newDiv10" style="display:none;">
                     <div class="col-lg-12">
                        <img src="{{ asset('sales/class.png') }}" style="width: 100%; margin:auto;">
                           {{--
                           <div class="row mb-2">
                              <div class="col-lg-6 spacing-right">
                                 Equipment Name : <br>
                                 <input class="form-control"
                                    type="text" name="noOfDaysEquipReqFor" placeholder="..."
                                    style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                 Cylinder Size : <br>
                                 <input class="form-control"
                                    type="text" name="noOfDaysEquipReqFor" placeholder="..."
                                    style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Article No<br> <input class="form-control"
                                    type="text" name="noOfDaysEquipReqFor" placeholder="..."
                                    style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Model <br> <input class="form-control" type="text" placeholder="..."
                                    style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1 spacing-right">
                                 Year of Manufacturing : <br>
                                 <input class="form-control" type="text" placeholder="..."
                                    style="width: 100%;">
                              </div>
                              <div class="col-lg-6 spacing-right">
                                 Expiry Date : <br>
                                 <input class="form-control" type="text" placeholder="..."
                                    style="width: 100%;">
                              </div>
                              <p>"Your Fire Fighting Cylinder is going to expire on "</p>
                              <div class="container " id="">
                                 <div class="row row-cols-2">
                                    <div class="col-lg-6 mt-1">
                                       Warranty Period <br> <input class="form-control" id="" name=""
                                          type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 mt-1">
                                       Color <br> <input class="form-control" id="" name="" type="text"
                                          placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 mt-1">
                                       Quantity <br> <input class="form-control" id="" name=""
                                          type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           --}}
                           <!-- For add more Fire Fighting services -->
                           <div class="container my-1"  style="">
                              <div class="accordion" id="signatoryAccordion7" style="width:100%;">
                                 <!-- Initial Accordion Item -->
                                 <div class="accordion-item signaccordion-item7" id="signatoryEntry7">
                                    <h2 class="accordion-header" id="signatoryHeading7"
                                       style="color: white">
                                       <button class="accordion-button"
                                          style="background-color: #34005A; color:white" type="button"
                                          data-toggle="collapse" data-target="#signatoryCollapse7"
                                          aria-expanded="false" aria-controls="signatoryCollapse7">
                                       Active Fire Equipment Entry 1
                                       </button>
                                    </h2>
                                    <div id="signatoryCollapse7" class="collapse"
                                       aria-labelledby="signatoryHeading7">
                                       <div class="accordion-body">
                                          <div class="row mb-2" id="signatoryDetailsContainer7">
                                             <div class="row mb-2">
                                                <div class="col-lg-3 spacing-right">
                                                   Fire Class: <br>
                                                   <select class="form-control mt-1"
                                                      style="width: 100%;" name="fireClass[]" id="categoryOfEquipment" >
                                                      <option value=" "></option>
                                                      <option value="classA" id="classA">Class A – Flammable Materials (e.g. Paper & Wood)</option>
                                                      <option value="classB" id="classB">Class B – Flammable Liquid (e.g. Paint & Petrol)</option>
                                                      <option value="classC" id="classC">Class C – Flammable Gasses (e.g. Butane & Methane)</option>
                                                      <option value="classD" id="classD">Class D – Flammable Metals (e.g. Lithium & Potassium)</option>
                                                      <option value="classD" id="classE">Class E – Electrical Equipment (e.g. Computers & Generators)</option>
                                                      <option value="classD" id="classF">Class F – Cooking Fats and Oils (e.g. Fryers & Chip Pans)</option>
                                                   </select>
                                                </div>
                                                <div class="col-lg-12 spacing-right" id="classAContent" style="display:none">
                                                   <div class="row mt-2">
                                                      <h5>Cylinder Type</h5>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="waterCylinder[]" id="checkbox1">
                                                         <label for="checkbox1">Water Cylinder</label>
                                                      </div>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="dryChemical[]" id="checkbox2">
                                                         <label for="checkbox2">Dry Chemical Powder BE </label>
                                                      </div>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="CoTwo[]" id="checkbox3">
                                                         <label for="checkbox3">Carbon Dioxide CO2 </label>
                                                      </div>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="foam[]" id="checkbox4">
                                                         <label for="checkbox4">Foam</label>
                                                      </div>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="wetChemical[]" id="checkbox5">
                                                         <label for="checkbox5">Wet Chemical</label>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-lg-12 spacing-right" id="classBContent" style="display:none;">
                                                   <div class="row mt-2">
                                                      <h5>Cylinder Type</h5>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="dryChemicalAbe[]" id="checkbox1">
                                                         <label for="checkbox1">Dry Chemical Powder ABE</label>
                                                      </div>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="dryChemicalBe[]" id="checkbox2">
                                                         <label for="checkbox2">Dry Chemical Powder BE </label>
                                                      </div>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="Co2[]" id="checkbox3">
                                                         <label for="checkbox3">Carbon Dioxide CO2 </label>
                                                      </div>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="foam2[]" id="checkbox4">
                                                         <label for="checkbox4">Foam</label>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-lg-12 spacing-right" id="classCContent" style="display:none;">
                                                   <div class="row mt-2">
                                                      <h5>Cylinder Type</h5>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="dryChemicalPowderABE[]" id="checkbox1">
                                                         <label for="checkbox1">Dry Chemical Powder ABE</label>
                                                      </div>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="dryChemicalPowderBE[]" id="checkbox2">
                                                         <label for="checkbox2">Dry Chemical Powder BE </label>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-lg-12 spacing-right" id="classDContent" style="display:none;">
                                                   <div class="row mt-2">
                                                      <h5>Cylinder Type</h5>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="dryChemicalPowderABE1[]" id="checkbox1">
                                                         <label for="checkbox1">Dry Chemical Powder ABE</label>
                                                      </div>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="dryChemicalPowderBE1[]" id="checkbox2">
                                                         <label for="checkbox2">Dry Chemical Powder BE </label>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-lg-12 spacing-right" id="classEContent" style="display:none;">
                                                   <div class="row mt-2">
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="dryChemicalPowderABE2[]" id="checkbox1">
                                                         <label for="checkbox1">Dry Chemical Powder ABE</label>
                                                      </div>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="dryChemicalPowderBE2[]" id="checkbox2">
                                                         <label for="checkbox2">Dry Chemical Powder BE </label>
                                                      </div>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="cd2[]" id="checkbox2">
                                                         <label for="checkbox2">Carbon Dioxide CO2</label>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-lg-12 spacing-right" id="classFContent" style="display:none;">
                                                   <div class="row mt-2">
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="dryChemicalPowderBE3[]" id="checkbox2">
                                                         <label for="checkbox2">Dry Chemical Powder BE </label>
                                                      </div>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="foam3[]" id="checkbox1">
                                                         <label for="checkbox1">Foam</label>
                                                      </div>
                                                      <div class="col-lg-2">
                                                         <input type="checkbox" name="wetChemical2[]" id="checkbox2">
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
                                                <div class="col-lg-3 mt-1">
                                                   Warranty Period <br> <input class="form-control" id=""
                                                      type="text" name="fire_warranty_period[]" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 spacing-right">
                                                    Expiry Date: <br>
                                                    <input
                                                      class="form-control"
                                                      id="fireExpiryDate"
                                                      name="fire_expiry_date[]"
                                                      type="date"
                                                      placeholder="..."
                                                      style="width: 100%;"
                                                    >
                                                  </div>
                                                  <p id="expiryMessage" style="text-align:end">"Your Fire Fighting Cylinder is going to expire on <span id="expiryDate"></span>"</p>

                                                  <script>
                                                    // Get input field and expiry message elements
                                                    const expiryDateInput = document.getElementById('fireExpiryDate');
                                                    const expiryDateSpan = document.getElementById('expiryDate');

                                                    // Add event listener to the date input
                                                    expiryDateInput.addEventListener('input', function () {
                                                      const selectedDate = expiryDateInput.value; // Get the selected date
                                                      if (selectedDate) {
                                                        expiryDateSpan.textContent = formatDate(selectedDate); // Update the span with formatted date
                                                      } else {
                                                        expiryDateSpan.textContent = ''; // Clear the span if no date is selected
                                                      }
                                                    });

                                                    // Function to format date (e.g., YYYY-MM-DD to MM/DD/YYYY)
                                                    function formatDate(dateString) {
                                                      const date = new Date(dateString);
                                                      const day = String(date.getDate()).padStart(2, '0');
                                                      const month = String(date.getMonth() + 1).padStart(2, '0'); // Month is zero-based
                                                      const year = date.getFullYear();
                                                      return `${month}/${day}/${year}`;
                                                    }
                                                  </script>

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
                                    </div>
                                 </div>
                              </div>
                              <div class="row my-3">
                                 <div class="col">
                                    <button type="button" class="btn btn-primary" id="addSignatory7"
                                       style="height:30px; width:150px;">Add More</button>
                                 </div>
                                 <button type="button" class="btn btn-primary float-end"
                                    id="updateSignatoryTable7">Save</button>
                              </div>
                           </div>
                           <div class="container-fluid">
                              <div class="row" style="width: 100%; ">
                                 <div class="col-lg-12">
                                    <table class="table table-bordered mt-1" id="signatorySummaryTable7">
                                       <thead>
                                          <tr>
                                             <th>Entry</th>
                                             <th>Equipment Name</th>
                                             <th>Cylinder Size </th>
                                             <th>Article No</th>
                                             <th>View</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <!-- Summary data will be added here dynamically -->
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>

                        <hr>
                        <h5>Other Active Fire Protection Systems </h5>
                        <div class="container my-1">
                           <div class="accordion" id="signatoryAccordion15" style="width:100%;">
                              <!-- Initial Accordion Item -->
                              <div class="accordion-item signaccordion-item15" id="signatoryEntry15">
                                 <h2 class="accordion-header" id="signatoryHeading15"
                                    style="color: white">
                                    <button class="accordion-button"
                                       style="background-color: #34005A; color:white" type="button"
                                       data-toggle="collapse" data-target="#signatoryCollapse15"
                                       aria-expanded="false" aria-controls="signatoryCollapse15">
                                    Other Active Fire Protection Entry 1
                                    </button>
                                 </h2>
                                 <div id="signatoryCollapse15" class="collapse"
                                    aria-labelledby="signatoryHeading15">
                                    <div class="accordion-body">
                                       <div class="row mb-2" id="signatoryDetailsContainer15">
                                          <div class="row mb-2">
                                             <div class="col-lg-6 spacing-right">
                                                Categories : <br>
                                                <select id="" class="form-control mt-1" name="other_fire_category[]"
                                                   style="width: 100%;">
                                                   <option value=""> </option>
                                                   <option value="Deluge System">Deluge System</option>
                                                   <option value="Sprinkler System">Sprinkler System
                                                   </option>
                                                   <option value="Fire Monitor and Hydrants">Fire Monitor and Hydrants </option>
                                                   <option value="Fixed Foam System<">Fixed Foam System</option>
                                                   <option value="Fixed Gas Suppression system">Fixed Gas Suppression system
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
                                 </div>
                              </div>
                           </div>
                           <div class="row my-3">
                              <div class="col">
                                 <button type="button" class="btn btn-primary" id="addSignatory15"
                                    style="height:30px; width:150px;">Add More</button>
                              </div>
                              <button type="button" class="btn btn-primary"
                                 id="updateSignatoryTable15">Save</button>
                           </div>
                        </div>
                        <div class="container-fluid">
                           <div class="row" style="width: 100%;">
                              <div class="col-lg-12">
                                 <table class="table table-bordered mt-1" id="signatorySummaryTable15">
                                    <thead>
                                       <tr>
                                          <th>Entry</th>
                                          <th>Equipment Name</th>
                                          <th>Article No</th>
                                          <th>Model</th>
                                          <th>View</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <!-- Summary data will be added here dynamically -->
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                        <div class="container" style="width: 100%;">
                            <div class="row">
                                <div class="col-lg-6">
                                   Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="audit_date" type="text" placeholder="..." style="width: 100%;
                                     "></textarea>
                                </div>
                                <div class="col-lg-6">
                                   Attachments <br> <input class="form-control mt-1" id="head_office_email" name="audit_sign" type="file" placeholder="..." style="width: 100%;">
                                </div>
                             </div>
                             <center>
                                <div class="col-lg-6">
                                   <button class=" btn btn-primary new-branch mt-2"
                                      style="height:30px; width:150px;"
                                      onclick="removeNewDiv10()">Remove</button>
                                </div>
                             </center>
                         </div>
                     </div>

                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="new-div" id="newDiv10-a" style="display:none;">
                     <div class="container my-1">
                        <div class="accordion" id="signatoryAccordion16">
                           <!-- Initial Accordion Item -->
                           <div class="accordion-item signaccordion-item16" id="signatoryEntry16">
                              <h2 class="accordion-header" id="signatoryHeading16"
                                 style="color: white">
                                 <button class="accordion-button"
                                    style="background-color: #34005A; color:white" type="button"
                                    data-toggle="collapse" data-target="#signatoryCollapse16"
                                    aria-expanded="false" aria-controls="signatoryCollapse16">
                                 Passive Fire Protection Entry 1
                                 </button>
                              </h2>
                              <div id="signatoryCollapse16" class="collapse"
                                 aria-labelledby="signatoryHeading16">
                                 <div class="accordion-body">
                                    <div class="row mb-2" id="signatoryDetailsContainer16">
                                       <div class="row mb-2">
                                          <div class="col-lg-12 spacing-right">
                                             Categories : <br>
                                             <select id="" name="passive_category[]" class="form-control mt-1"
                                                style="width: 100%;">
                                                <option value=""> </option>
                                                <option value="Fire Doors">Fire Doors</option>
                                                <option value="Fire Walls">Fire Walls
                                                </option>
                                                <option value="Fire Proof Coating">Fire Proof Coating </option>
                                                <option value="Fire Proof (K Mass) Coating">Fire Proof (K Mass) Coating </option>
                                                <option value="Fire Proof Enclosures">Fire Proof Enclosures
                                                </option>
                                                <option value="Concrete Structure">Concrete Structure
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
                                             Year of Manufacturing:<br>
                                             <input class="form-control" name="passive_year_of_manufacture[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                          </div>
                                          <div class="col-lg-6 spacing-right">
                                             Expiry Date:<br>
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
                              </div>
                           </div>
                        </div>
                        <div class="row my-3">
                           <div class="col">
                              <button type="button" class="btn btn-primary" id="addSignatory16"
                                 style="height:30px; width:150px;">Add More</button>
                           </div>
                           <button type="button" class="btn btn-primary"
                              id="updateSignatoryTable16">Save</button>
                        </div>
                     </div>
                     <table class="table table-bordered mt-1" id="signatorySummaryTable16">
                        <thead>
                           <tr>
                              <th>Entry</th>
                              <th>Category</th>
                              <th>Length </th>
                              <th>Width</th>
                              <th>View</th>
                           </tr>
                        </thead>
                        <tbody>
                           <!-- Summary data will be added here dynamically -->
                        </tbody>
                     </table>
                     <div class="col-lg-12">
                        Notes <br> <textarea class="form-control mt-1"
                           id="head_office_name" name="audit_date"
                           type="text" placeholder="..."
                           style="width: 100%;"></textarea>
                     </div>
                     <div class="col-lg-12">
                        Attachments <br> <input class="form-control mt-1"
                           id="head_office_email" name="audit_sign"
                           type="file" placeholder="..."
                           style="width: 100%;">
                     </div>
                     <center>
                        <div class="col-lg-6">
                           <button class=" btn btn-primary new-branch mt-2"
                              style="height:30px; width:150px;"
                              onclick="removeNewDiv10_a()">Remove</button>
                        </div>
                     </center>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Security Equipments -->
   <div class="col-lg-8" id="col-lg-8-6" style="display:none;">
      <div class="col-lg-12 mx-0 p-0">
         <div class="col-lg-12 d-flex row px-0 m-0" id="equipments" style="position:relative; left:-5%;">
            <div class="col-lg-3">
               <div>
                  <div class="img11" id="img11" style="text-align: center;">
                     <img class="rounded-circle img-thumbnail" class="small-icon"
                        style="width: 100px; height: 100px; object-fit: auto"
                        src="{{ asset('sales/securityEqu.png') }}" height="100" width="100" alt="">
                     <p>Security Equipment</p>
                  </div>
                  <div class="img11-a" id="img11-a" style="text-align: center;">
                     <img class="rounded-circle img-thumbnail" class="small-icon"
                        style="width: 100px; height: 100px; object-fit: auto"
                        src="{{ asset('sales/automatic.png') }}" height="100" width="100" alt="">
                     <p>Traffic Barrier</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-9">
               <div class="new-div" id="newDiv12" style="display:none;">
                  <div class="col-lg-12">
                     {{--
                     <div class="row mb-2">
                        <div class="col-lg-6 spacing-right" id="">
                           Category : <br>
                           <select id="" class="form-control mt-1" name="categoryOfSecEqu"
                              style="width: 100%;">
                              <option value="Walk through Gate">Walk through Gate</option>
                              <option value="Metal Detector">Metal Detector</option>
                              <option value="Barriers">Barriers</option>
                              <option value="Traffic Equipment">Traffic Equipment</option>
                           </select>
                        </div>
                        <div class="col-lg-6 spacing-right">
                           Ownership Status : <br>
                           <select class="form-control mt-1" name="onwerShipStatus"
                              style="width: 100%;">
                              <option value="Company Owned">Company Owned</option>
                              <option value="OutSourced">OutSourced</option>
                           </select>
                        </div>
                        <div class="col-lg-6 spacing-right mt-1">
                           Rental : <br>
                           <select id="leadcategory" class="form-control mt-1" name="rentalFor"
                              style="width: 100%;">
                              <option value="Daily">Daily</option>
                              <option value="Monthly">Monthly</option>
                           </select>
                        </div>
                        <div class="col-lg-6 mt-1">
                           No of days Equipment Required for <br> <input class="form-control"
                              type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Quantity <br> <input class="form-control" type="text" placeholder="..."
                              style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right mt-1">
                           Training for Customer's Staff Required : <br>
                           <select id="leadcategory" class="form-control mt-1" name="category"
                              style="width: 100%;">
                              <option value="">Yes</option>
                              <option value="">No</option>
                           </select>
                        </div>
                        <div class="col-lg-6 spacing-right">
                           Delivery Required : <br>
                           <select id="leadcategory" class="form-control mt-1" name="category"
                              style="width: 100%;">
                              <option value="">Yes</option>
                              <option value="">No</option>
                           </select>
                        </div>
                        <div class="col-lg-6 mt-2 ml-3 ">
                           <input class="form-check-input" type="checkbox"
                              id="delievery_location_check_1">
                           <label class="form-check-label" for="check">Delievery Location </label>
                        </div>
                        <div class="container " id="delievery_location_form_1"
                           style="display: none;">
                           <div class="row row-cols-2">
                              <div class="col-lg-6 mt-1">
                                 Office No <br> <input class="form-control" id="" name=""
                                    type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Floor <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Building <br> <input class="form-control" id="" name=""
                                    type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Block <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Area <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 City <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Photograph of Building <br> <input class="form-control" id=""
                                    name="" type="file" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Pin location <br> <input class="form-control" id="" name=""
                                    type="text" placeholder="..." style="width: 100%;">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6 spacing-right">
                           Installation Required : <br>
                           <select id="leadcategory" class="form-control mt-1" name="category"
                              style="width: 100%;">
                              <option value="">Yes</option>
                              <option value="">No</option>
                           </select>
                        </div>
                        <div class="col-lg-6 mt-2 ml-3 ">
                           <input class="form-check-input" type="checkbox"
                              id="installation_location_check_1">
                           <label class="form-check-label" for="check">Installation Location
                           </label>
                        </div>
                        <div class="container " id="installation_location_form_1"
                           style="display: none;">
                           <div class="row row-cols-2">
                              <div class="col-lg-6 mt-1">
                                 Office No <br> <input class="form-control" id="" name=""
                                    type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Floor <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Building <br> <input class="form-control" id="" name=""
                                    type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Block <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Area <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 City <br> <input class="form-control" id="" name="" type="text"
                                    placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Photograph of Building <br> <input class="form-control" id=""
                                    name="" type="file" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-6 mt-1">
                                 Pin location <br> <input class="form-control" id="" name=""
                                    type="text" placeholder="..." style="width: 100%;">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                              name="audit_date" type="text" placeholder="..."
                              style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-6">
                           Attachments <br> <input class="form-control mt-1" id="head_office_email"
                              name="audit_sign" type="file" placeholder="..."
                              style="width: 100%;">
                        </div>
                     </div>
                     --}}
                     <!-- For Add more Secuirty Equipment -->
                     <div class="container my-1">
                        <div class="accordion" id="signatoryAccordion8">
                           <!-- Initial Accordion Item -->
                           <div class="accordion-item signaccordion-item8" id="signatoryEntry8">
                              <h2 class="accordion-header" id="signatoryHeading8"
                                 style="color: white">
                                 <button class="accordion-button"
                                    style="background-color: #34005A; color:white" type="button"
                                    data-toggle="collapse" data-target="#signatoryCollapse8"
                                    aria-expanded="false" aria-controls="signatoryCollapse8">
                                 Security Equipment Entry 1
                                 </button>
                              </h2>
                              <div id="signatoryCollapse8" class="collapse"
                                 aria-labelledby="signatoryHeading8">
                                 <div class="accordion-body">
                                    <div class="row mb-2" id="signatoryDetailsContainer8">
                                       <!-- Your content for entry goes here -->
                                       <div class="col-lg-6 form-group spacing-left">
                                          Category:<br>
                                          <div class="input-group" style="width: 100%;">
                                             <select id="applicable_compliances" class="form-control mt-1" name="equipment_category[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                <option value=""></option>
                                                @foreach (\App\Models\SecurityEqupCate::all() as $equpc)
                                                <option value="{{ $equpc->security_equ_cate_name }}">{{ $equpc->security_equ_cate_name }}</option>
                                                @endforeach
                                             </select>
                                             <div class="input-group-append" style="width: 30%;">
                                                <a href="{{ route('securityequcategory.add') }}">
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
                              </div>
                           </div>
                        </div>
                        <div class="row my-3">
                           <div class="col">
                              <button type="button" class="btn btn-primary" id="addSignatory8"
                                 style="height:30px; width:150px;">Add More</button>
                           </div>
                           <button type="button" class="btn btn-primary"
                              id="updateSignatoryTable8">Save</button>
                        </div>
                     </div>
                     <table class="table table-bordered mt-1" id="signatorySummaryTable8">
                        <thead>
                           <tr>
                              <th>Entry</th>
                              <th>Category</th>
                              <th>Ownership Status</th>
                              <th>Rental</th>
                              <th>View</th>
                           </tr>
                        </thead>
                        <tbody>
                           <!-- Summary data will be added here dynamically -->
                        </tbody>
                     </table>
                     <center>
                        <div class="col-lg-6">
                           <button class=" btn btn-primary new-branch mt-2"
                              style="height:30px; width:150px;"
                              onclick="removeNewDiv12()">Remove</button>
                        </div>
                     </center>
                  </div>
               </div>
               <div class="new-div" id="newDiv12-a" style="display:none;">
                  <div class="col-lg-12">
                     <div class="container  my-1" id="incidentContainer" >
                        <div class="accordion" id="incidentAccordion" >
                           <!-- Initial Accordion Item -->
                           <div class="accordion-item incidentaccordion-item" id="incidentEntry1">
                              <h2 class="accordion-header" id="incidentHeading1" style="color: white">
                                 <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#incidentCollapse1" aria-expanded="false" aria-controls="incidentCollapse1">
                                 Automatic Traffic Barrier Entry 1
                                 </button>
                              </h2>
                              <div id="incidentCollapse1" class="collapse" aria-labelledby="incidentHeading1">
                                 <div class="accordion-body">
                                    <div class="row client-info">
                                       <div class="row mb-2">
                                          <div class="col-lg-6 form-group spacing-left">
                                             Ownership Status :<br>
                                             <div class="input-group" style="width: 100%;">
                                                <select id="applicable_compliances" class="form-control mt-1" name="barrier_ownership[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                   <option value=""></option>
                                                   @foreach (App\Models\BarrierOwnership::all() as $barriero)
                                                   <option value="{{ $barriero->bo_name }}">{{ $barriero->bo_name }}</option>
                                                   @endforeach
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                   <a href="{{ route('barrierownership.add') }}">
                                                   <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                   </a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-lg-6 form-group spacing-left">
                                             Rental :<br>
                                             <div class="input-group" style="width: 100%;">
                                                <select id="applicable_compliances" class="form-control mt-1"  name="barrier_rental[]" style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                   <option value=""></option>
                                                   @foreach (App\Models\BarrierRental::all() as $barrierrental)
                                                   <option value="{{ $barrierrental->br_name }}">{{ $barrierrental->br_name }}</option>
                                                   @endforeach
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                   <a href="{{ route('barrierrental.add') }}">
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
                                             Installation, Testing & Commissioning Cost :<br>
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
                              </div>
                           </div>
                        </div>
                        <!-- Add More and Remove Buttons -->
                        <div class="row my-3">
                           <div class="col">
                              <button type="button" class="btn btn-primary" id="addIncident" style="height:30px; width:150px;">Add More Barrier</button>
                           </div>
                           <button type="button" class="btn btn-primary" id="updateIncidentTable" style="height:30px; width:150px;">Save</button>
                        </div>
                     </div>
                     <table class="table table-bordered mt-3" id="incidentSummaryTable">
                        <thead>
                           <tr>
                              <th>Entry</th>
                              <th>Rental</th>
                              <th>No. of Days</th>
                              <th>Model</th>
                              <th>Brand</th>
                              <th>View</th>
                              <!-- Add more columns as needed -->
                           </tr>
                        </thead>
                        <tbody>
                           <!-- Summary data will be added here dynamically -->
                        </tbody>
                     </table>
                     <center>
                        <div class="col-lg-6">
                           <button class=" btn btn-primary new-branch mt-2"
                              style="height:30px; width:150px;"
                              onclick="removeNewDiv12a()">Remove</button>
                        </div>
                     </center>
                  </div>
               </div>
            </div>
            {{--
            <div class="col-lg-3" >
               <div>
                  <div class="img12" id="img12" style="text-align: center;">
                     <img class="rounded-circle img-thumbnail" class="small-icon" style="width: 100px; height: 100px;" src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" height="100" width="100" alt="">
                     <p>Equipments</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-9">
               <div class="new-div" id="newDiv13" style="display:flex;">
                  <div class="col-lg-12">
                     <div class="row mb-2">
                        <div class="col-lg-6 spacing-right">
                           Rental : <br>
                           <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
                              <option value="">Daily</option>
                              <option value="">Monthly</option>
                           </select>
                        </div>
                        <div class="col-lg-6 mt-1">
                           No of days Equipment Required for   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                           Quantity     <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                           Training for Customer's Staff Required : <br>
                           <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
                              <option value="">Yes</option>
                              <option value="">No</option>
                           </select>
                        </div>
                        <div class="col-lg-6 spacing-right">
                           Delivery Required : <br>
                           <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
                              <option value="">Yes</option>
                              <option value="">No</option>
                           </select>
                        </div>
                        <div class="col-lg-6 mt-1">
                           Delivery Location   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-right">
                           Installation Required : <br>
                           <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
                              <option value="">Yes</option>
                              <option value="">No</option>
                           </select>
                        </div>
                        <div class="col-lg-6 mt-1">
                           Installation Location   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6">
                           Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="audit_date" type="text" placeholder="..." style="width: 100%;"></textarea>
                        </div>
                        <div class="col-lg-6">
                           Attachments <br> <input class="form-control mt-1" id="head_office_email" name="audit_sign" type="file"   placeholder="..." style="width: 100%;">
                        </div>
                        <button class="new-branch mt-2" onclick="removeNewDiv13()">Remove</button>
                     </div>
                  </div>
               </div>
            </div>
            --}}
         </div>
      </div>
   </div>
   <!-- Electronic and web serveillance solution -->
   <div class="col-lg-8" id="col-lg-8-9" style="display:none;">
      <div class="col-lg-12 mx-0 p-0">
         <div class="col-lg-12 d-flex row px-0 m-0" id="cctv" style="position:relative; left:-5%;">
            <div class="col-lg-3">
               <div class="img13" id="img13" style="text-align: center;">
                  <img class="rounded-circle img-thumbnail" class="small-icon"
                     style="width: 100px; height: 100px; object-fit: auto;" src="{{ asset('sales/cctv.png') }}"
                     height="100" width="100" alt="">
                  <p>CCTV</p>
               </div>
               <div class="img13" id="img13-a" style="text-align: center;">
                  <img class="rounded-circle img-thumbnail" class="small-icon"
                     style="width: 100px; height: 100px; object-fit: auto;" src="{{ asset('sales/time.png') }}"
                     height="100" width="100" alt="">
                  <p>Time Attendance Machine</p>
               </div>
               <div class="img13" id="img13-b" style="text-align: center;">
                  <img class="rounded-circle img-thumbnail" class="small-icon"
                     style="width: 100px; height: 100px; object-fit: auto;"
                     src="{{ asset('sales/solution.png') }}" height="100" width="100" alt="">
                  <p>Web Surveillance Solution</p>
               </div>
            </div>
            <div class="col-lg-9">
               <div class="col-lg-12">
                  <div class="new-div" id="newDiv14-a" style="display:none;">
                     <div class="col-lg-12">
                        {{--
                        <div class="row mb-2">
                           <div class="col-lg-6 mt-1">
                              Category <br> <input class="form-control" type="text"
                                 placeholder="..." name="categoryOfTimeAtte"
                                 name="categoryOfTimeAtteM" style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                              Rate per Unit <br> <input class="form-control" type="text"
                                 placeholder="..." name="retePerUnit" style="width: 100%;">
                           </div>
                        </div>
                        --}}
                        <!-- For Add more Time Attendence Machine -->
                        <div class="container my-1">
                           <div class="accordion" id="signatoryAccordion9_1">
                              <!-- Initial Accordion Item -->
                              <div class="accordion-item signaccordion-item9_1"
                                 id="signatoryEntry9_1">
                                 <h2 class="accordion-header" id="signatoryHeading9_1"
                                    style="color: white">
                                    <button class="accordion-button"
                                       style="background-color: #34005A; color:white"
                                       type="button" data-toggle="collapse"
                                       data-target="#signatoryCollapse9_1"
                                       aria-expanded="false"
                                       aria-controls="signatoryCollapse9_1">
                                    Attendence Machine Entry 1
                                    </button>
                                 </h2>
                                 <div id="signatoryCollapse9_1" class="collapse"
                                    aria-labelledby="signatoryHeading9_1">
                                    <div class="accordion-body">
                                       <div class="row mb-2" id="signatoryDetailsContainer9_1">
                                          <!-- Your content for entry goes here -->
                                          <div class="col-lg-6 mt-1">
                                             {{--  <br> <input class="form-control"
                                                type="text" name="attendance_category[]" placeholder="..."
                                                style="width: 100%;"> --}}
                                                Category
                                                <div class="input-group" style="width: 100%;">
                                                   <select id="attendance_category" class="form-control mt-1" name="attendance_category[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                      <option value=""></option>
                                                      @foreach (App\Models\Dropdown::whereNotNull('attendence_machine_category')->get() as $attenmachinecategory)
                                                      <option value="{{  $attenmachinecategory->attendence_machine_category }}">{{  $attenmachinecategory->attendence_machine_category }}</option>
                                                      @endforeach
                                                   </select>
                                                   <div class="input-group-append" style="width: 30%;">
                                                      <a href="{{ route('attendencemachinecategory.add') }}">
                                                      <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                      </a>
                                                   </div>
                                                </div>
                                          </div>
                                          <div class="col-lg-6 mt-1">
                                            Quantity <br> <input class="form-control"
                                               type="text" name="attenden_quantity[]" placeholder="..."
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
                                 </div>
                              </div>
                           </div>
                           <div class="row my-3">
                              <div class="col">
                                 <button type="button" class="btn btn-primary"
                                    id="addSignatory9_1" style="height:30px; width:150px;">Add
                                 More</button>
                              </div>
                              <button type="button" class="btn btn-primary"
                                 id="updateSignatoryTable9_1">Save</button>
                           </div>
                        </div>
                        <table class="table table-bordered mt-1" id="signatorySummaryTable9_1">
                           <thead>
                              <tr>
                                 <th>Entry</th>
                                 <th>Category</th>
                                 <th>Rate Per Unit</th>
                                 <th>View</th>
                              </tr>
                           </thead>
                           <tbody>
                              <!-- Summary data will be added here dynamically -->
                           </tbody>
                        </table>
                        <center>
                           <div class="col-lg-6">
                              <button class=" btn btn-primary new-branch mt-2"
                                 style="height:30px; width:150px;"
                                 onclick="remove_newDiv14_a()">Remove</button>
                           </div>
                        </center>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="new-div" id="newDiv14-b" style="display:none;">
                     <div class="col-lg-12">
                        {{--
                        <div class="row mb-2">
                           <div class="col-lg-6 mt-1">
                              Category <br> <input class="form-control" type="text"
                                 placeholder="..." name="categoryOfWebSol" style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                              Scope of Work <br> <input class="form-control" type="file"
                                 placeholder="..." name="scopOfWork" style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                              Date of Submission of Report:<br> <input class="form-control"
                                 type="date" name="dateOfSubmittion" placeholder="..."
                                 style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                              Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                 name="audit_date" type="text" placeholder="..."
                                 style="width: 100%;"></textarea>
                           </div>
                        </div>
                        --}}
                        <!-- For add more Web Surveillance -->
                        <div class="container my-1">
                           <div class="accordion" id="signatoryAccordion9_2">
                              <!-- Initial Accordion Item -->
                              <div class="accordion-item signaccordion-item9_2"
                                 id="signatoryEntry9_2">
                                 <h2 class="accordion-header" id="signatoryHeading9_2"
                                    style="color: white">
                                    <button class="accordion-button"
                                       style="background-color: #34005A; color:white"
                                       type="button" data-toggle="collapse"
                                       data-target="#signatoryCollapse9_2"
                                       aria-expanded="false"
                                       aria-controls="signatoryCollapse9_2">
                                    Web Surveillance Entry 1
                                    </button>
                                 </h2>
                                 <div id="signatoryCollapse9_2" class="collapse"
                                    aria-labelledby="signatoryHeading9_2">
                                    <div class="accordion-body">
                                       <div class="row mb-2" id="signatoryDetailsContainer9_2">
                                          <!-- Your content for entry goes here -->
                                          <div class="col-lg-6 mt-1">
                                             Category <br> <input class="form-control"
                                                type="text" name="web_category[]" placeholder="..."
                                                style="width: 100%;">
                                          </div>
                                          <div class="col-lg-6 mt-1">
                                             Scope of Work <br> <input class="form-control"
                                                type="file" name="web_scope[]" placeholder="..."
                                                style="width: 100%;">
                                          </div>
                                          <div class="col-lg-6 mt-1">
                                             Internal Deadline:<br> <input
                                                class="form-control" name="web_date[]" type="date"
                                                placeholder="..."
                                                style="width: 100%;">
                                          </div>
                                          <div class="col-lg-6 mt-1">
                                             Date of Submission of Report:<br> <input
                                                class="form-control" name="web_sub_date[]" type="date"
                                                placeholder="..."
                                                style="width: 100%;">
                                          </div>
                                          <div class="col-lg-6 mt-1">
                                             Notes <br> <textarea class="form-control mt-1"
                                                id="head_office_name" name="web_notes[]"
                                                type="text" placeholder="..."
                                                style="width: 100%;"></textarea>
                                          </div>
                                          <div class="col-lg-6 mt-1">
                                             Attachments:<br> <input
                                                class="form-control" name="web_attachments[]" type="file"
                                                placeholder="..."
                                                style="width: 100%;">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row my-3">
                              <div class="col">
                                 <button type="button" class="btn btn-primary"
                                    id="addSignatory9_2" style="height:30px; width:150px;">Add
                                 More</button>
                              </div>
                              <button type="button" class="btn btn-primary"
                                 id="updateSignatoryTable9_2">Save</button>
                           </div>
                        </div>
                        <table class="table table-bordered mt-1" id="signatorySummaryTable9_2">
                           <thead>
                              <tr>
                                 <th>Entry</th>
                                 <th>Category</th>
                                 <th>Scope of work</th>
                                 <th>Date of Submittion</th>
                                 <th>View</th>
                              </tr>
                           </thead>
                           <tbody>
                              <!-- Summary data will be added here dynamically -->
                           </tbody>
                        </table>
                        <center>
                           <div class="col-lg-6">
                              <button class=" btn btn-primary new-branch mt-2"
                                 style="height:30px; width:150px;"
                                 onclick="remove_newDiv14_b()">Remove</button>
                           </div>
                        </center>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="new-div" id="newDiv14" style="display:none;">
                     <div class="col-lg-12">
                        {{--
                        <div class="row mb-2">
                           <div class="col-lg-6 spacing-right" id="">
                              Category : <br>
                              <select id="" class="form-control mt-1" name="categoryOfCCTV"
                                 style="width: 100%;">
                                 <option value="CCTV & Time Attendance Machine">CCTV & Time
                                    Attendance Machine
                                 </option>
                                 <option value="Supporting Equipment">Supporting Equipment
                                 </option>
                                 <option value="Web Surveillance Services">Web Surveillance
                                    Services
                                 </option>
                              </select>
                           </div>
                           <div class="col-lg-6 mt-1">
                              CCTV Brand <br> <input class="form-control" type="text"
                                 placeholder="..." name="cctvBrand" style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                              Pixels <br> <input class="form-control" type="text"
                                 placeholder="..." name="pixels" style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                              Night Vision <br> <input class="form-control" type="text"
                                 placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1 spacing-right">
                              CCTV Type : <br>
                              <select id="leadcategory" class="form-control mt-1" name="category"
                                 style="width: 100%;">
                                 <option value="">Dome</option>
                                 <option value="">PTZ</option>
                                 <option value="">Bullet</option>
                                 <option value="">Fish Eye</option>
                              </select>
                           </div>
                           <div class="col-lg-6 mt-1">
                              Backup Storage <br> <input class="form-control" type="text"
                                 placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1 spacing-right">
                              NVR : <br>
                              <select id="leadcategory" class="form-control mt-1" name="category"
                                 style="width: 100%;">
                                 <option value="">4 Channels</option>
                                 <option value="">8 Channels</option>
                                 <option value="">16 Channels</option>
                                 <option value="">32 Channels</option>
                              </select>
                           </div>
                           <div class="col-lg-6 mt-1">
                              Power Cable <br> <input class="form-control" type="text"
                                 placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1 spacing-right">
                              POE Switch : <br>
                              <select id="leadcategory" class="form-control mt-1" name="category"
                                 style="width: 100%;">
                                 <option value="">2 Port</option>
                                 <option value="">4 Port</option>
                                 <option value="">8 Port</option>
                              </select>
                           </div>
                           <div class="col-lg-6 mt-1">
                              Quantity <br> <input class="form-control" type="text"
                                 placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1">
                              Monthly Maintenance Cost <br> <input class="form-control"
                                 type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-1 spacing-right">
                              Required on : <br>
                              <select id="leadcategory" class="form-control mt-1" name="category"
                                 style="width: 100%;">
                                 <option value="">Daily Basis</option>
                                 <option value="">Monthly Basis</option>
                              </select>
                           </div>
                           <div class="col-lg-6 mt-1">
                              No of days Equipment Required for <br> <input class="form-control"
                                 type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 mt-2 ml-3 ">
                              <input class="form-check-input" type="checkbox"
                                 id="delievery_location_check_2">
                              <label class="form-check-label" for="check">Delievery Location
                              </label>
                           </div>
                           <div class="container " id="delievery_location_form_2"
                              style="display: none;">
                              <div class="row row-cols-2">
                                 <div class="col-lg-6 mt-1">
                                    Office No <br> <input class="form-control" id="" name=""
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Floor <br> <input class="form-control" id="" name=""
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Building <br> <input class="form-control" id="" name=""
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Block <br> <input class="form-control" id="" name=""
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Area <br> <input class="form-control" id="" name=""
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    City <br> <input class="form-control" id="" name=""
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Photograph of Building <br> <input class="form-control"
                                       id="" name="" type="file" placeholder="..."
                                       style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Pin location <br> <input class="form-control" id="" name=""
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 mt-2 ml-3 ">
                              <input class="form-check-input" type="checkbox"
                                 id="installation_location_check_2">
                              <label class="form-check-label" for="check">Installation Location
                              </label>
                           </div>
                           <div class="container " id="installation_location_form_2"
                              style="display: none;">
                              <div class="row row-cols-2">
                                 <div class="col-lg-6 mt-1">
                                    Office No <br> <input class="form-control" id="" name=""
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Floor <br> <input class="form-control" id="" name=""
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Building <br> <input class="form-control" id="" name=""
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Block <br> <input class="form-control" id="" name=""
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Area <br> <input class="form-control" id="" name=""
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    City <br> <input class="form-control" id="" name=""
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Photograph of Building <br> <input class="form-control"
                                       id="" name="" type="file" placeholder="..."
                                       style="width: 100%;">
                                 </div>
                                 <div class="col-lg-6 mt-1">
                                    Pin location <br> <input class="form-control" id="" name=""
                                       type="text" placeholder="..." style="width: 100%;">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 spacing-right">
                              Maintenance Required : <br>
                              <select id="leadcategory" class="form-control mt-1" name="category"
                                 style="width: 100%;">
                                 <option value="">Yes</option>
                                 <option value="">No</option>
                              </select>
                           </div>
                           <div class="col-lg-6 spacing-right">
                              Maintenance Required : <br>
                              <select id="leadcategory" class="form-control mt-1" name="category"
                                 style="width: 100%;">
                                 <option value="">Monthly Maintenance</option>
                                 <option value="">Annually Maintenance</option>
                              </select>
                           </div>
                           <div class="col-lg-6">
                              Notes <br> <textarea class="form-control mt-1" id="head_office_name"
                                 name="audit_date" type="text" placeholder="..."
                                 style="width: 100%;"></textarea>
                           </div>
                           <div class="col-lg-6">
                              Attachments <br> <input class="form-control mt-1"
                                 id="head_office_email" name="audit_sign" type="file"
                                 placeholder="..." style="width: 100%;">
                           </div>
                        </div>
                        --}}
                        <!-- For add more CCTV services -->
                        <div class="container my-1">
                           <div class="accordion" id="signatoryAccordion9">
                              <!-- Initial Accordion Item -->
                              <div class="accordion-item signaccordion-item9"
                                 id="signatoryEntry9">
                                 <h2 class="accordion-header" id="signatoryHeading9"
                                    style="color: white">
                                    <button class="accordion-button"
                                       style="background-color: #34005A; color:white"
                                       type="button" data-toggle="collapse"
                                       data-target="#signatoryCollapse9" aria-expanded="false"
                                       aria-controls="signatoryCollapse9">
                                    CCTV Entry 1
                                    </button>
                                 </h2>
                                 <div id="signatoryCollapse9" class="collapse"
                                    aria-labelledby="signatoryHeading9">
                                    <div class="accordion-body">
                                       <div class="row mb-2" id="signatoryDetailsContainer9">
                                          <!-- Your content for entry goes here -->
                                          <div class="col-lg-6 form-group spacing-left">
                                             Category:<br>
                                             <div class="input-group" style="width: 100%;">
                                                <select id="applicable_compliances" class="form-control mt-1" name="cctv_category[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                                   <option value=""></option>
                                                   @foreach (App\Models\CctvCategory::all() as $cctvcategory)
                                                   <option value="{{  $cctvcategory->cc_name }}">{{  $cctvcategory->cc_name }}</option>
                                                   @endforeach
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                   <a href="{{ route('cctvcategory.add') }}">
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
                                                   @foreach (App\Models\CctvBrand::all() as $cctvbrand)
                                                   <option value="{{  $cctvbrand->cb_name }}">{{  $cctvbrand->cb_name }}</option>
                                                   @endforeach
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                   <a href="{{ route('cctvbrand.add') }}">
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
                                                   @foreach (App\Models\CctvModel::all() as $cctvmodel)
                                                   <option value="{{  $cctvmodel->cm_name }}">{{  $cctvmodel->cm_name }}</option>
                                                   @endforeach
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                   <a href="{{ route('cctvmodel.add') }}">
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
                                                   @foreach (App\Models\CctvPixels::all() as $cctvpixel)
                                                   <option value="{{  $cctvpixel->cp_name }}">{{  $cctvpixel->cp_name }}</option>
                                                   @endforeach
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                   <a href="{{ route('cctvpixels.add') }}">
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
                                                   @foreach (App\Models\Dropdown::whereNotNull('cctv_type')->get() as $cctvtype)
                                                   <option value="{{  $cctvtype->cctv_type }}">{{  $cctvtype->cctv_type }}</option>
                                                   @endforeach
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                   <a href="{{ route('cctvtype.add') }}">
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
                                                   @foreach (App\Models\Dropdown::whereNotNull('cctv_backup_storage')->get() as $cctvbackup)
                                                   <option value="{{  $cctvbackup->cctv_backup_storage }}">{{  $cctvbackup->cctv_backup_storage }}</option>
                                                   @endforeach
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                   <a href="{{ route('backupstorage.add') }}">
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
                                                   @foreach (App\Models\Dropdown::whereNotNull('cctv_nvr')->get() as $cctvnvr)
                                                   <option value="{{  $cctvnvr->cctv_nvr }}">{{  $cctvnvr->cctv_nvr }}</option>
                                                   @endforeach
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                   <a href="{{ route('nvr.add') }}">
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
                                                   @foreach (App\Models\Dropdown::whereNotNull('cctv_poe_switch')->get() as $cctvpoes)
                                                   <option value="{{  $cctvpoes->cctv_poe_switch }}">{{  $cctvpoes->cctv_poe_switch }}</option>
                                                   @endforeach
                                                </select>
                                                <div class="input-group-append" style="width: 30%;">
                                                   <a href="{{route('poeswitch.add')}}">
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
                                 </div>
                              </div>
                           </div>
                           <div class="row my-3">
                              <div class="col">
                                 <button type="button" class="btn btn-primary" id="addSignatory9"
                                    style="height:30px; width:150px;">Add More</button>
                              </div>
                              <button type="button" class="btn btn-primary"
                                 id="updateSignatoryTable9">Save</button>
                           </div>
                        </div>
                        <table class="table table-bordered mt-1" id="signatorySummaryTable9">
                           <thead>
                              <tr>
                                 <th>Entry</th>
                                 <th>Category</th>
                                 <th>CCTV Brand</th>
                                 <th>Night Vision</th>
                                 <th>View</th>
                              </tr>
                           </thead>
                           <tbody>
                              <!-- Summary data will be added here dynamically -->
                           </tbody>
                        </table>
                        <center>
                           <div class="col-lg-6">
                              <button class=" btn btn-primary new-branch mt-2"
                                 style="height:30px; width:150px;"
                                 onclick="removeNewDiv14()">Remove</button>
                           </div>
                        </center>
                     </div>
                  </div>
               </div>
            </div>
            <!-- <div class="col-lg-3" >
               <div>
                   <div class="img14" id="img14" style="text-align: center;">
                       <img class="rounded-circle img-thumbnail" class="small-icon" style="width: 100px; height: 100px;" src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80" height="100" width="100" alt="">
                       <p>Camera</p>
                   </div>
               </div>
               </div>
               <div class="col-lg-9">
               <div class="new-div" id="newDiv15" style="display:flex;">
                   <div class="col-lg-12">
                       <div class="row mb-2">
                           <div class="col-lg-6 mt-1">
                               Quantity     <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 spacing-right">
                               Required on  : <br>
                               <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
                                   <option value="">Daily Basis</option>
                                   <option value="">Monthly Basis</option>
                               </select>
                           </div>
                           <div class="col-lg-6 mt-1">
                               No of days Equipment Required for   <br>  <input class="form-control" type="text" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-6 spacing-right">
                               Installation Required : <br>
                               <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
                                   <option value="">Yes</option>
                                   <option value="">No</option>
                               </select>
                           </div>
                           <div class="col-lg-6 spacing-right">
                               Maintenance Required : <br>
                               <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
                                   <option value="">Yes</option>
                                   <option value="">No</option>
                               </select>
                           </div>
                           <div class="col-lg-6 spacing-right">
                               Maintenance Required : <br>
                               <select id="leadcategory" class="form-control mt-1" name="category" style="width: 100%;">
                                   <option value="">Monthly Maintenance</option>
                                   <option value="">Annually Maintenance</option>
                               </select>
                           </div>
                           <div class="col-lg-6">
                               Notes <br> <textarea class="form-control mt-1" id="head_office_name" name="audit_date" type="text" placeholder="..." style="width: 100%;"></textarea>
                           </div>
                           <div class="col-lg-6">
                               Attachments <br> <input class="form-control mt-1" id="head_office_email" name="audit_sign" type="file"   placeholder="..." style="width: 100%;">
                           </div>
                           <button class="new-branch mt-2" onclick="removeNewDiv15()">Remove</button>
                       </div>
                   </div>
               </div>
               </div> -->
         </div>
      </div>
   </div>
   <!-- Security Alarm system -->
   <div class="col-lg-8" id="col-lg-8-8" style="display:none;">
      <div class="col-lg-12">
         <div class="col-lg-12 row" id="alarm" style="position:relative; left:-13%;">
            <div class="col-lg-3">
               <div>
                  <div class="img25" id="img25" style="text-align: center;">
                     <img class="rounded-circle img-thumbnail" class="small-icon"
                        style="width: 100px; height: 100px; object-fit: auto"
                        src="{{ asset('sales/securityAS.png') }}" height="100" width="100" alt="">
                     <p>Security Alarm System</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-9">
               <div class="col-lg-12">
                  <div class="new-div" id="newDiv25" style="display:none;">
                     <div class="container my-1">
                        <div class="accordion" id="signatoryAccordion17" style="width:225%;">
                           <!-- Initial Accordion Item -->
                           <div class="accordion-item signaccordion-item17" id="signatoryEntry17">
                              <h2 class="accordion-header" id="signatoryHeading17"
                                 style="color: white">
                                 <button class="accordion-button"
                                    style="background-color: #34005A; color:white" type="button"
                                    data-toggle="collapse" data-target="#signatoryCollapse17"
                                    aria-expanded="false" aria-controls="signatoryCollapse17">
                                 Alarm Entry 1
                                 </button>
                              </h2>
                              <div id="signatoryCollapse17" class="collapse"
                                 aria-labelledby="signatoryHeading17">
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
                                                type="text" name="alarm_equipment[]" placeholder="..."
                                                style="width: 100%;">
                                          </div>
                                          <div class="col-lg-3 mt-1">
                                             Voltage (if any):  <br> <input class="form-control"
                                                type="text" name="alarm_voltage[]"  placeholder="..."
                                                style="width: 100%;">
                                          </div>
                                          <div class="col-lg-3 mt-1">
                                             Ampere (if any):   <br> <input class="form-control" name="alarm_ampere[]" type="text" placeholder="..."
                                                style="width: 100%;">
                                          </div>
                                          <div class="col-lg-3 mt-1 spacing-right">
                                             Article No  <br>
                                             <input class="form-control" name="alarm_article_no[]"  type="text" placeholder="..."
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
                                            Expiry Date: : <br>
                                            <input class="form-control" name="alarm_expiry[]" type="text" placeholder="Enter date..." style="width: 100%;" id="expiryDate" onchange="updateExpiryMessage()">
                                        </div>
                                        <p id="expiryMessage" class="text-danger">
                                            Your Passive Fire Fighting Cylinder is going to expire on <span id="dummyDate">01/01/2025</span>
                                        </p>

                                        <script>
                                            function updateExpiryMessage() {
                                                // Get the selected date from the input field
                                                var selectedDate = document.getElementById('expiryDate').value;

                                                // Check if the selected date is valid
                                                if (selectedDate) {
                                                    var formattedDate = new Date(selectedDate).toLocaleDateString(); // Format the entered date
                                                    var dummyDateElement = document.getElementById('dummyDate');

                                                    // Replace the dummy date with the entered date
                                                    dummyDateElement.innerText = formattedDate;
                                                }
                                            }
                                        </script>


                                          <div class="container " id="">
                                             <div class="row row-cols-2">
                                                <div class="col-lg-3 mt-1">
                                                   Warranty Period <br> <input class="form-control" id=""
                                                      type="text" name="alarm_warranty[]" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 mt-1">
                                                   Color <br> <input class="form-control" id="" type="text"
                                                      placeholder="..." name="alarm_color[]" style="width: 100%;">
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
                                                      id="head_office_name" name="alarm_ins[]"
                                                      type="text" placeholder="..."
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
                                                <div class="col-lg-3 mt-1">
                                                </div>
                                                <div class="col-lg-3 mt-1">
                                                </div>
                                                <h3 class="mt-2">Dimensions (if any) :</h3>
                                                <div class="col-lg-3 mt-1">
                                                </div>
                                                <div class="col-lg-3 mt-1">
                                                </div>
                                                <br>
                                                <div class="col-lg-3 mt-1">
                                                   Length (if any):  <br> <input class="form-control" id=""
                                                      type="text" name="alarm_length[]" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 mt-1">
                                                   Width (if any):  <br> <input class="form-control" id=""  type="text"
                                                      placeholder="..." name="alarm_width[]" style="width: 100%;">
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
                                                   <select id="smokeDetectorInstallation" name="alarm_ins_smoke[]" class="form-control mt-1"  style="width: 100%;">
                                                      <option value=""> </option>
                                                      <option value="yes">Yes</option>
                                                      <option value="no">No</option>
                                                   </select>
                                                </div>
                                                <div class="col-lg-3 mt-1" id="installationChargesField" style="display: none;">
                                                   Installation charges of Smoke Detectors:<br>
                                                   <input class="form-control" name="alarm_ins_cost_smoke[]" id="installationCharges"  type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 spacing-right">
                                                   Internal Shifting of Panel/Devices: <br>
                                                   <select id="internalShiftingSelect" name="alarm_internal_shifting[]" class="form-control mt-1" style="width: 100%;">
                                                      <option value=""> </option>
                                                      <option value="yes">Yes</option>
                                                      <option value="no">No</option>
                                                   </select>
                                                </div>
                                                <div class="col-lg-3 mt-1" id="internalShiftingChargesField" style="display: none;">
                                                   Internal Shifting Charges of Panel/Devices: <br>
                                                   <input class="form-control" name="alarm_internal_shifting_charges[]" id="internalShiftingCharges" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 spacing-right">
                                                   Reinstallation of Complete Alarm System: <br>
                                                   <select id="reinstallationSelect" name="alarm_reinstall[]" class="form-control mt-1" style="width: 100%;">
                                                      <option value=""> </option>
                                                      <option value="yes">Yes</option>
                                                      <option value="no">No</option>
                                                   </select>
                                                </div>
                                                <div class="col-lg-3 mt-1" id="reinstallationChargesField" style="display: none;">
                                                   Reinstallation Charges of Complete Alarm System: <br>
                                                   <input class="form-control" name="alarm_reinstall_charges[]" id="reinstallationCharges" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 spacing-right">
                                                   QRF Monitoring Required: <br>
                                                   <select id="qrfMonitoringSelect" name="alarm_qrf[]" class="form-control mt-1" style="width: 100%;">
                                                      <option value=""> </option>
                                                      <option value="yes">Yes</option>
                                                      <option value="no">No</option>
                                                   </select>
                                                </div>
                                                <div class="col-lg-3 mt-1" id="qrfMonitoringChargesField" style="display: none;">
                                                   Monthly QRF Monitoring Charges: <br>
                                                   <input class="form-control" name="alarm_qrf_monthly_charges[]" id="monthlyQrfMonitoringCharges" type="text" placeholder="..." style="width: 100%;">
                                                   Yearly QRF Monitoring Charges: <br>
                                                   <input class="form-control" name="alarm_qrf_yearly_charges[]" id="yearlyQrfMonitoringCharges" type="text" placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-3 spacing-right">
                                                   Police Monitoring Required: <br>
                                                   <select id="policeMonitoringSelect" name="alarm_police_req[]" class="form-control mt-1" style="width: 100%;">
                                                      <option value=""> </option>
                                                      <option value="yes">Yes</option>
                                                      <option value="no">No</option>
                                                   </select>
                                                </div>
                                                <div class="col-lg-3 mt-1" id="policeMonitoringChargesField" style="display: none;">
                                                   Monthly Police Monitoring Charges: <br>
                                                   <input class="form-control" name="alarm_police_monthly_charges[]" id="monthlyPoliceMonitoringCharges" type="text" placeholder="..." style="width: 100%;">
                                                   Yearly Police Monitoring Charges: <br>
                                                   <input class="form-control" name="alarm_police_yearly_charges[]" id="yearlyPoliceMonitoringCharges" type="text" placeholder="..." style="width: 100%;">
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
                              </div>
                           </div>
                        </div>
                        <div class="row my-3">
                           <div class="col">
                              <button type="button" class="btn btn-primary" id="addSignatory17"
                                 style="height:30px; width:150px;">Add More</button>
                           </div>
                           <button type="button" class="btn btn-primary"
                              id="updateSignatoryTable17">Save</button>
                        </div>
                     </div>
                     <div class="container-fluid">
                        <div class="row" style="width:228%;">
                           <div class="col-lg-12">
                              <table class="table table-bordered mt-1" id="signatorySummaryTable17">
                                 <thead>
                                    <tr>
                                       <th>Entry</th>
                                       <th>Equipment Name</th>
                                       <th>Article No.</th>
                                       <th>Model</th>
                                       <th>View</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <!-- Summary data will be added here dynamically -->
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <center>
                        <div class="col-lg-6">
                           <button class=" btn btn-primary new-branch mt-2"
                              style="height:30px; width:150px;"
                              onclick="removeNewDiv()">Remove</button>
                        </div>
                     </center>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- web serveillance solution -->
   <!-- <div class="col-lg-8" id="col-lg-8-10" style="display:none;">
      <div class="col-lg-12">
          <div class="col-lg-12 row" id="web" style="position:relative; left:-13%;">
              <div class="col-lg-3">
                  <div>
                      <div class="" id="" style="text-align: center;">
                          <img class="rounded-circle img-thumbnail" class="small-icon"
                              style="width: 100px; height: 100px;"
                              src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                              height="100" width="100" alt="">
                          <p>Web</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-9">

              </div>

          </div>
      </div>
      </div> -->
</div>
</div>
