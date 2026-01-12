<div class="tab-pane fade show active m-3" style="opacity: 90%;" id="address-info" role="tabpanel"
aria-labelledby="nav-home-tab">
<div class="container my-1">
   <div class="accordion" id="emergencyAccordion">
      <div class="accordion-item emergencyaccordion-item" id="emergencyEntry1">
         <h2 class="accordion-header" id="emergencyHeading1" style="color: white">
            <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#emergencyCollapse1" aria-expanded="false" aria-controls="emergencyCollapse1">
            Address Entry 1
            </button>
         </h2>
         <div id="emergencyCollapse1" class="collapse" aria-labelledby="emergencyHeading1">
            <div class="accordion-body">
               <!-- Your content for signatory entry goes here -->
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
                                 type="text" name="area[]" placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-5 spacing-right">
                              City <br> <input class="form-control" id="" name="city[]" type="text"
                                 placeholder="..." style="width: 100%;">
                           </div>
                        </div>
                        <div class="row mb-1">
                           <div class="col-lg-5 spacing-right">
                              Photograph of Building <br> <input class="form-control" id="" name="builidng_attach[]" type="file"
                                 placeholder="..." style="width: 100%;">
                           </div>
                           <div class="col-lg-5 spacing-right">
                              Pin location <br> <input class="form-control" id="" name="pin_location[]"  type="text"
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
         </div>
      </div>
   </div>
   <!-- Add More and Remove Buttons -->
   <div class="row my-3">
      <div class="col">
         <button type="button" class="btn btn-primary" id="addEmergency" style="height:30px; width:150px;">Add More</button>
      </div>
      <button type="button" class="btn btn-primary" id="updateEmergencyTable" style="height:30px; width:150px;">Save</button>
   </div>
</div>
<table class="table table-bordered mt-1" id="emergencySummaryTable">
   <thead>
      <tr>
         <th>Entry</th>
         <th>Office No.</th>
         <th>Floor</th>
         <th>Building</th>
         <th>Block</th>
         <th>View</th>
         <!-- Add more columns as needed -->
      </tr>
   </thead>
   <tbody>
      <!-- Summary data will be added here dynamically -->
   </tbody>
</table>
</div>
