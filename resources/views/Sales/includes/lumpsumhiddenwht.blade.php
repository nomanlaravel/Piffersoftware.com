<div id="hidden-WHT-2" style="display:none;">
    <h3 style="margin-left: 30px; margin-top: 10px;">Lump Sum- Hidden WHT</h3>
    <!-- <div class="col-12 d-flex">
       <div class="col-md-4">
           <div class="mb-3">
               Category : <br>
               <select id="category" class="form-control mt-1" name="category" style="width: 100%;">
                   <option value="">select</option>
                   <option value="Armed Security Supervisor">Armed Security Supervisor</option>
                   <option value="Armed Security Guard
                       (Ex-Army)">Armed Security Guard
                       (Ex-Army)</option>
                   <option value="Armed Security Guard
                       (Civil)">Armed Security Guard
                       (Civil)</option>
               </select>
           </div>
           <div class="mb-3">
               <label class="form-check-label" for="">Weapon & Ammunition Cost:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>
           <div class="mb-3">
               <label class="form-check-label" for="">Monthly Rate Per Unit:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;" readOnly>
           </div>
           <div class="mb-3">
               <label class="form-check-label" for="">Total Monthly Rate per Unit:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;" readOnly>
           </div>
       </div>
       <div class="col-md-4">
           <div class="mb-3">
               <label class="form-check-label" for="">Salary:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>
           <div class="mb-3">
               <label class="form-check-label" for="">Training Cost:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>
           <div class="mb-3">
               <label class="form-check-label" for="">GST:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;" readOnly>
           </div>
           <div class="mb-3">
               <label class="form-check-label" for="">Admin Cost:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;" readOnly>
           </div>
       </div>
       <div class="col-md-4">
           <div class="mb-3">
               <label class="form-check-label" for="">Uniform Cost:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>
           <div class="mb-3">
               <label class="form-check-label" for="">Hidden Admin Cost:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>
           <div class="mb-3">
               <label class="form-check-label" for="">WHT:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>
           <div class="mb-3">
               <label class="form-check-label" for="">Total Admin Cost:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;" readOnly>
           </div>
       </div>
       </div> -->
    <!-- Add more Lump sum- Hidden WHT (in commercial section) -->
    <div class="container my-1">
       <div class="accordion" id="signatoryAccordion14">
          <div class="accordion-item signaccordion-item14" id="signatoryEntry14">
             <h2 class="accordion-header" id="signatoryHeading14" style="color: white">
                <button class="accordion-button" style="background-color: #34005A; color:white"
                   type="button" data-toggle="collapse" data-target="#signatoryCollapse14"
                   aria-expanded="false" aria-controls="signatoryCollapse14">
                Entry 1
                </button>
             </h2>
             <div id="signatoryCollapse14" class="collapse" aria-labelledby="signatoryHeading14">
                <div class="accordion-body">
                   <!-- Your content for entry goes here -->
                   <div class="row mb-2" id="signatoryDetailsContainer14">
                      <div class="col-12 d-flex">
                         <div class="col-md-4">
                            <div class="mb-3">
                               Category : <br>
                               {{-- <select id="category" class="form-control mt-1" name="ls_hw_category[]"
                                  style="width: 100%;">
                                  <option value="">select</option>
                                  <option value="Armed Security Supervisor">Armed Security
                                     Supervisor
                                  </option>
                                  <option value="Armed Security Guard(Ex-Army)">Armed Security
                                     Guard
                                     (Ex-Army)
                                  </option>
                                  <option value="Armed Security Guard(Civil)">Armed Security Guard
                                     (Civil)
                                  </option>
                               </select> --}}
                               <div class="input-group" style="width: 100%;">
                                 <select id="lumsumhidden" class="form-control mt-1" name="ls_hw_category[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                 <option value=""></option>
                                 @foreach (App\Models\Dropdown::whereNotNull('lumsumhidden_category')->get() as $lumsumhiddencategory)
                                    <option value="{{  $lumsumhiddencategory->lumsumhidden_category }}">{{  $lumsumhiddencategory->lumsumhidden_category }}</option>
                                    @endforeach
                                 </select>
                                 <div class="input-group-append" style="width: 30%;">
                                    <a href="{{ route('comerciallumsumhiddencategory.add') }}">
                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                 </div>
                              </div>
                            </div>
                            <div class="mb-3">
                             <label class="form-check-label" for="">Current Minimum Wage of Region:</label>
                             <input class="form-control" name="ls_hw_current_min_wage_region[]"  type="text"
                                placeholder="..." style="width: 100%;" id="lshwcurrentminimumwageofregion" >
                          </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Uniform Cost:</label>
                               <input class="form-control" name="ls_hw_uni_cost[]" id="lshwuniformcost"  type="text"
                                  placeholder="..." style="width: 100%;">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Weapon & Ammunition
                               Cost:</label>
                               <input class="form-control" name="ls_hw_weapon_cost[]"  type="text"
                                  placeholder="..." style="width: 100%;" id="lshwweaponsandanimation">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Monthly Rate Per
                               Unit:</label>
                               <input class="form-control monthly_Rate_Per_UnitFieldc3" name="ls_hw_monthly_rate[]" type="text"
                                  placeholder="..."  style="width: 100%;" id="lshwmonthlyrateperunit"
                                  readOnly>
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Total Monthly Rate per
                               Unit(with tax):</label>
                               <input class="form-control totalMonthlyRatePerUnitFieldc3"
                                  type="text" placeholder="..." name="ls_hw_total_monthly_rate[]"
                                  style="width: 100%;" id="lshwtotalmonthlyrateperunitwithtax" readOnly>
                            </div>

                            <div class="mb-3">
                            <label class="form-check-label" for="">Total Monthly Rate per
                            Unit(without tax):</label>
                            <input class="form-control"
                               type="text" placeholder="..." name="ls_hw_total_monthly_rate_witout_tax[]"
                               style="width: 100%;" id="lshwtotalmonthlyrateperunitwithouttax" readOnly>
                         </div>
                         <div class="mb-3">
                             <label class="form-check-label" for="">Grand Total:</label>
                             <input class="form-control"
                                type="text" placeholder="..." name="ls_hw_grand_
                                total[]" id="lshwgrandtotal" style="width: 100%;" >
                          </div>
                         </div>
                         <div class="col-md-4">
                            <div class="mb-3">
                               <label class="form-check-label" for="">Salary:</label>
                               <input class="form-control" name="ls_hw_salary[]"   id="lshwsalery" type="text"
                                  placeholder="..." style="width: 100%;">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Social Security:</label>
                               <input class="form-control" name="ls_hw_social[]" type="text"
                                  placeholder="..." style="width: 100%;"    id="lshwsocialsecurity" >
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Training Cost:</label>
                               <input class="form-control" name="ls_hw_training_cost[]"  type="text"
                                  placeholder="..." style="width: 100%;"  id="lshwtrainingcost">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Applicable GST
                               Percentage:</label>
                               <input class="form-control" name="ls_hw_app_gst[]" type="text"
                                  placeholder="..."  id="lshwapplicablegstpercentage" style="width: 100%;">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">GST:</label>
                               <input class="form-control gstFieldc3" name="ls_hw_gst[]"  type="text"
                                  placeholder="..." style="width: 100%;"  id="lshwgst" readOnly>
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Admin Cost:</label>
                               <input class="form-control adminCostFieldc3"
                                  type="text" placeholder="..." name="ls_hw_admin_cost[]" id="lshwadmincost" style="width: 100%;" readOnly>
                            </div>
                            <div class="mb-3">
                             <label class="form-check-label" for="">Quantity:</label>
                             <input class="form-control"
                                type="text" placeholder="..." name="ls_hw_quantity[]" id="lshwquantity" style="width: 100%;" >
                          </div>
                         </div>
                         <div class="col-md-4">
                            <div class="mb-3">
                               <label class="form-check-label" for="">EOBI:</label>
                               <input class="form-control" name="ls_hw_eobi[]"  type="text"
                                  placeholder="..." id="lshwwobi" style="width: 100%;">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Group/ Life
                               insurance:</label>
                               <input class="form-control" name="ls_hw_group_life[]" type="text"
                                  placeholder="..." id="lshwgrouplifeinsurance" style="width: 100%;">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Hidden Admin Cost:</label>
                               <input class="form-control" name="ls_hw_hidden_admin_cost[]" type="text"
                                  placeholder="..." id="lshwhiddenadmincost" style="width: 100%;">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Applicable WHT
                               Percentage:</label>
                               <input class="form-control" name="ls_hw_app_wht_per[]"  type="text"
                                  placeholder="..." id="lshwapplicablewhtpercentage" style="width: 100%;">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">WHT:</label>
                               <input class="form-control whtFieldc3" name="ls_hw_wht[]" type="text"
                                  placeholder="..." style="width: 100%;" id="lshwwht" readOnly>
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Total Admin Cost:</label>
                               <input class="form-control totalAdminCostFieldc3" name="ls_hw_total_admin_cost[]"
                                  type="text" placeholder="..."
                                  style="width: 100%;" id="lshwtotaladmincost" readOnly>
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
             <button type="button" class="btn btn-primary" id="addSignatory14"
                style="height:30px; width:150px;">Add More</button>
          </div>
          <button type="button" class="btn btn-primary" id="updateSignatoryTable14">Save</button>
       </div>
    </div>

    <script>
     document.addEventListener("DOMContentLoaded", function () {
                     // Helper function to get value by ID
                     const getValue = (id) => parseFloat(document.getElementById(id).value) || 0;

                     // Helper function to set value by ID
                     const setValue = (id, value) => (document.getElementById(id).value = value.toFixed(2));

                     const calculateFields = () => {
                         // Get input values
                         const minWage = getValue("lshwcurrentminimumwageofregion");
                         const uniformCost = getValue("lshwuniformcost");
                         const weaponCost = getValue("lshwweaponsandanimation");
                         const salary = getValue("lshwsalery");
                         const socialSecurity = minWage * 0.06;
                         const eobi = minWage * 0.05;
                         const trainingCost = getValue("lshwtrainingcost");
                         const adminHiddenCost = getValue("lshwhiddenadmincost");
                         const gstPercentage = getValue("lshwapplicablegstpercentage") / 100;
                         const whtPercentage = getValue("lshwapplicablewhtpercentage") / 100;
                         const quantity = getValue("lshwquantity");

                         // Calculate Admin Cost
                         const adminCost =
                             adminHiddenCost +
                             (salary + eobi + socialSecurity + uniformCost + weaponCost + trainingCost + adminHiddenCost) /
                                 (1 - whtPercentage) -
                             (salary + eobi + socialSecurity + uniformCost + weaponCost + trainingCost + adminHiddenCost);

                         // Calculate Total Monthly Rate (without tax)
                         const totalMonthlyRateWithoutTax = salary + eobi + socialSecurity + uniformCost + weaponCost + trainingCost;

                         // Calculate GST
                         const gst = totalMonthlyRateWithoutTax * gstPercentage;

                         // Calculate Total Monthly Rate (with tax)
                         const totalMonthlyRateWithTax = totalMonthlyRateWithoutTax + gst;

                         // Calculate Grand Total
                         const grandTotal = totalMonthlyRateWithTax * quantity;

                         // Set calculated values
                         setValue("lshwsocialsecurity", socialSecurity);
                         setValue("lshwwobi", eobi);
                         setValue("lshwadmincost", adminCost);
                         setValue("lshwtotalmonthlyrateperunitwithouttax", totalMonthlyRateWithoutTax);
                         setValue("lshwgst", gst);
                         setValue("lshwtotalmonthlyrateperunitwithtax", totalMonthlyRateWithTax);
                         setValue("lshwgrandtotal", grandTotal);
                     };

                     // Attach event listeners to input fields
                     const fields = [
                         "lshwcurrentminimumwageofregion",
                         "lshwuniformcost",
                         "lshwweaponsandanimation",
                         "lshwsalery",
                         "lshwtrainingcost",
                         "lshwhiddenadmincost",
                         "lshwapplicablegstpercentage",
                         "lshwapplicablewhtpercentage",
                         "lshwquantity",
                     ];

                     fields.forEach((field) => {
                         document.getElementById(field).addEventListener("input", calculateFields);
                     });

                     // Initial calculation
                     calculateFields();
                 });

    </script>
    <div class="table-responsive">
       <table class="table table-bordered mt-1" id="signatorySummaryTable14">
          <thead>
             <tr>
                <th>sr.#</th>
                <th>Category</th>
                <th>Salary</th>
                <th>Reliever Allowance</th>
                <th>Uniform Cost</th>
                <th>Weapon & Ammunition Cost</th>
                <th>Training Cost</th>
                <th>Admin Cost</th>
                <th>Monthly Rate Per Unit</th>
                <th>GST(16%)</th>
                <th>Total Monthly Rate Per Unit</th>
                <th>Hidden Admin Cost</th>
                <th>Total Admin Cost</th>
                <th>View</th>
                <!-- Add more columns as needed -->
             </tr>
          </thead>
          <tbody>
             <!-- Summary data will be added here dynamically -->
          </tbody>
       </table>
    </div>
 </div>
