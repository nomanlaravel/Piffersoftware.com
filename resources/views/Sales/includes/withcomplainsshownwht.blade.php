<div id="shown-WHT" style="display:none;">
    <h3 style="margin-left: 30px; margin-top: 10px;">With Complaines- Shown WHT</h3>
    <!-- <div class="col-12 d-flex">
       <div class="col-md-4">
           <div class="mb-3">
               Category : <br>
               <select id="category" class="form-control mt-1" name="category" style="width: 100%;">
                   <option value="">Armed Security Supervisor</option>
                   <option value="">Armed Security Guard
                       (Ex-Army)</option>
                   <option value="">Armed Security Guard
                       (Civil)</option>
               </select>
           </div>

           <div class="mb-3">
               <label class="form-check-label" for="">Social Security:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>

           <div class="mb-3">
               <label class="form-check-label" for="">Weapon & Ammunition Cost:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>

           <div class="mb-3">
               <label class="form-check-label" for="">Monthly Rate Per Unit:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>

           <div class="mb-3">
               <label class="form-check-label" for="">Total Monthly Rate per Unit:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>
       </div>
       <div class="col-md-4">
           <div class="mb-3">
               <label class="form-check-label" for="">Salary:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>

           <div class="mb-3">
               <label class="form-check-label" for="">Reliever Allowance:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>

           <div class="mb-3">
               <label class="form-check-label" for="">Group/ Life Insur-ance:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>

           <div class="mb-3">
               <label class="form-check-label" for="">Training Cost:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>

           <div class="mb-3">
               <label class="form-check-label" for="">Applicable GST Percentage:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>

       </div>

       <div class="col-md-4">
           <div class="mb-3">
               <label class="form-check-label" for="">EOBI:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>

           <div class="mb-3">
               <label class="form-check-label" for="">Uniform Cost:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>

           <div class="mb-3">
               <label class="form-check-label" for="">Admin Cost:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>

           <div class="mb-3">
               <label class="form-check-label" for="">WHT (4%):</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>

           <div class="mb-3">
               <label class="form-check-label" for="">Applicable WHT Percentage:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>

       </div>

       </div> -->
    <!-- Add more for with complains-Show WHT (in commercial section) -->
    <div class="container my-1">
       <div class="accordion" id="signatoryAccordion12">
          <div class="accordion-item signaccordion-item12" id="signatoryEntry12">
             <h2 class="accordion-header" id="signatoryHeading12" style="color: white">
                <button class="accordion-button" style="background-color: #34005A; color:white"
                   type="button" data-toggle="collapse" data-target="#signatoryCollapse12"
                   aria-expanded="false" aria-controls="signatoryCollapse12">
                Entry 1
                </button>
             </h2>
             <div id="signatoryCollapse12" class="collapse" aria-labelledby="signatoryHeading12">
                <div class="accordion-body">
                   <!-- Your content for entry goes here -->
                   <div class="row mb-2" id="signatoryDetailsContainer12">
                      <div class="col-12 d-flex">
                         <div class="col-md-4">

                            <div class="mb-3">

                               {{-- <select id="category" name="wc_sw_category[]" class="form-control mt-1"
                                  style="width: 100%;">
                                  <option>Select</option>
                                  <option value="Armed Security Supervisor">Armed Security
                                     Supervisor
                                  </option>
                                  <option value="Armed Security Guard
                                     (Ex-Army">Armed Security Guard
                                     (Ex-Army)
                                  </option>
                                  <option value="Armed Security Guard
                                     (Civil)">Armed Security Guard
                                     (Civil)
                                  </option>
                               </select> --}}
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
                          {{-- <div class="mb-3">
                             <label class="form-check-label" for="">Current  Minimum wage of Respective Region:</label>
                             <input class="form-control" name="wc_sw_cur_min_wg_res_re[]" type="text"
                                placeholder="..." style="width: 100%;">
                          </div> --}}
                          <div class="mb-3">
                             <label class="form-check-label" for="social_security">Social Security:</label>
                             <input
                                 class="form-control"
                                 id="social_security"
                                 name="wc_sw_social_check[]"
                                 type="text"
                                 placeholder="..."
                                 style="width: 100%;"
                                 readonly
                             >
                         </div>
                         <div class="mb-3">
                             <label class="form-check-label" for="min_wage">Current Minimum Wage of Region:</label>
                             <input
                                 class="form-control"
                                 id="min_wage"
                                 name="wc_sw_cur_min_wg_re[]"
                                 type="text"
                                 placeholder="..."
                                 style="width: 100%;"
                                 oninput="calculateValues()"
                             >
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
                               <input class="form-control monthly_Rate_Per_UnitFieldc1 totalWithGSTField"
                                  name="wc_sw_monthly_rate[]" type="text" placeholder="..."
                                  style="width: 100%;" readOnly>
                            </div>
                            <div class="mb-3">
                             <label for="ratePerUnit">Total Monthly Rate per Unit (without Taxes):</label>
                             <input type="number" class="form-control" id="ratePerUnit" name="wc_sw_total_monthly_rate_without_tax[]" readOnly>
                          </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Total Monthly Rate per
                               Unit (with Tax):</label>
                               <input class="form-control totalMonthlyRatePerUnitFieldc1"
                                  name="wc_sw_total_monthly_rate[]" type="text" placeholder="..."
                                  style="width: 100%;" readonly>
                            </div>
                         <div class="mb-3">
                             <label class="form-label" for="">Grand Total:</label>
                             <input class="form-control" type="text" id="grandTotal" name="grandTotal[]" readonly  style="width: 100%;">
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
                                  placeholder="..."  id="gstPercentage"     oninput="calculateWHT()" style="width: 100%;">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">GST:</label>
                               <input class="form-control gstFieldc1 calculatedGSTField" name="wc_sw_monthly_gst[]" type="text"
                                  placeholder="..." style="width: 100%;" readOnly>
                            </div>
                            <div class="mb-3">
                               <label class="form-label" for="">Quantity:</label>
                               <input class="form-control" type="number" id="quantity" name="quantity[]" style="width: 100%;">
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
                             <label class="form-check-label" for="eobi">EOBI:</label>
                             <input
                                 class="form-control"
                                 id="eobi"
                                 name="wc_sw_eobi[]"
                                 type="text"
                                 placeholder="..."
                                 style="width: 100%;"
                                 readonly
                             >
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
                               <label class="form-check-label "  for="">Applicable WHT
                               Percentage:</label>
                               <input class="form-control" name="wc_sw_app_wht[]"   type="text"
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
             </div>
          </div>
       </div>
       <!-- Add More and Remove Buttons -->
       <div class="row my-3">
          <div class="col">
             <button type="button" class="btn btn-primary" id="addSignatory12"
                style="height:30px; width:150px;">Add More</button>
          </div>
          <button type="button" class="btn btn-primary" id="updateSignatoryTable12">Save</button>
       </div>
    </div>
    <script>
       function calculateValues() {
           // Input fields
           const minWageInput = document.getElementById('min_wage');
           const socialSecurityInput = document.getElementById('social_security');
           const eobiInput = document.getElementById('eobi');
           const salaryInput = document.getElementById('salary');
           const groupInsuranceInput = document.querySelector('[name="wc_sw_group[]"]');
           const trainingCostInput = document.querySelector('[name="wc_sw_training_cost[]"]');
           const uniformCostInput = document.querySelector('[name="wc_sw_uni_cost[]"]');
           const weaponCostInput = document.querySelector('[name="wc_sw_weapon[]"]');
           const relieverAllowanceInput = document.getElementById('relieverAllowance');
           const adminCostInput = document.getElementById('adminCostField');
           const totalMonthlyRateWithoutTaxesInput = document.getElementById('ratePerUnit'); // Updated selector
           const totalMonthlyRateWithTaxesInput = document.querySelector('.totalMonthlyRatePerUnitFieldc1');
           const gstPercentageInput = document.getElementById('gstPercentage');
           const gstField = document.querySelector('.gstFieldc1');
           const whtPercentageInput = document.querySelector('[name="wc_sw_app_wht[]"]');
           const whtField = document.querySelector('.whtFieldc1');
           const quantityInput = document.getElementById('quantity');
           const grandTotalInput = document.getElementById('grandTotal'); // Updated selector

           // Helper to parse numbers safely
           const parseValue = (input) => parseFloat(input?.value) || 0;

           // Get values
           const minWage = parseValue(minWageInput);
           const salary = parseValue(salaryInput);
           const groupInsurance = parseValue(groupInsuranceInput);
           const trainingCost = parseValue(trainingCostInput);
           const uniformCost = parseValue(uniformCostInput);
           const weaponCost = parseValue(weaponCostInput);
           const relieverAllowance = parseValue(relieverAllowanceInput);
           const adminCost = parseValue(adminCostInput);
           const gstPercentage = parseValue(gstPercentageInput);
           const whtPercentage = parseValue(whtPercentageInput);
           const quantity = parseValue(quantityInput);

           // Calculate components
           const socialSecurity = minWage * 0.06;
           const eobi = minWage * 0.05;

           const totalMonthlyRateWithoutTaxes =
               salary +
               relieverAllowance +
               eobi +
               socialSecurity +
               groupInsurance +
               uniformCost +
               weaponCost +
               trainingCost +
               adminCost;

           const gst = (totalMonthlyRateWithoutTaxes * gstPercentage) / 100;
           const wht = (totalMonthlyRateWithoutTaxes + gst) / (1 - whtPercentage / 100);

           const totalMonthlyRateWithTaxes = totalMonthlyRateWithoutTaxes + gst + wht;
           const grandTotal = totalMonthlyRateWithTaxes * quantity;

           // Update values in the form
           socialSecurityInput.value = socialSecurity.toFixed(2);
           eobiInput.value = eobi.toFixed(2);
           totalMonthlyRateWithoutTaxesInput.value = totalMonthlyRateWithoutTaxes.toFixed(2);
           totalMonthlyRateWithTaxesInput.value = totalMonthlyRateWithTaxes.toFixed(2);
           gstField.value = gst.toFixed(2);
           whtField.value = wht.toFixed(2);
           grandTotalInput.value = grandTotal.toFixed(2);
       }

       // Attach event listeners to trigger recalculation
       function attachListeners(selector, event = 'input', callback) {
           document.querySelectorAll(selector).forEach((element) => {
               element.addEventListener(event, callback);
           });
       }

       attachListeners(
           '#min_wage, #salary, #gstPercentage, #relieverAllowance, #adminCostField, #quantity',
           'input',
           calculateValues
       );
       attachListeners(
           '[name="wc_sw_group[]"], [name="wc_sw_training_cost[]"], [name="wc_sw_uni_cost[]"], [name="wc_sw_weapon[]"], [name="wc_sw_app_wht[]"]',
           'input',
           calculateValues
       );
   </script>


    <div class="table-responsive">
       <table class="table table-bordered mt-1" id="signatorySummaryTable12">
          <thead>
             <tr>
                <th>sr.#</th>
                <th>Category</th>
                <th>Salary</th>
                <th>Reliever Allowance</th>
                <th>EOBI</th>
                <th>Social Security</th>
                <th>Group/Life Insurance</th>
                <th>Uniform Cost</th>
                <th>Weapon & Ammunition Cost</th>
                <th>Training Cost</th>
                <th>Admin Cost</th>
                <th>Monthly Rate Per Unit</th>
                <th>GST(16%)</th>
                <th>WHT(4%)</th>
                <th>Total Monthly Rate Per Unit</th>
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
