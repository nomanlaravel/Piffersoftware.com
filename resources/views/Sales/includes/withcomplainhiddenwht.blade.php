<div id="hidden-WHT" style="display:none;">
    <h3 style="margin-left: 30px; margin-top: 10px;">With Complaines- Hidden WHT</h3>
    <!-- <div class="col-12 d-flex">
       <div class="col-md-4">
           <div class="mb-3">
               Category : <br>
               <select id="category" class="form-control mt-1" name="categoryOfG" style="width: 100%;">
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
               <input class="form-control" name="salry" type="text" placeholder="..." style="width: 100%;">
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
               <label class="form-check-label" for="">GST
                   (16%):</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>

           <div class="mb-3">
               <label class="form-check-label" for="">Total Admin Cost:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>

       </div>

       <div class="col-md-4">
           <div class="mb-3">
               <label class="form-check-label" for="">EOBI:</label>
               <input class="form-control" name="EOBI" type="text" placeholder="..." style="width: 100%;">
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

       </div>
       </div> -->
    <!-- Add more for with complains-Hidden WHT (in commercial section) -->
    <div class="container my-1">
       <div class="accordion" id="signatoryAccordion11">
          <div class="accordion-item signaccordion-item11" id="signatoryEntry11">
             <h2 class="accordion-header" id="signatoryHeading11" style="color: white">
                <button class="accordion-button" style="background-color: #34005A; color:white"
                   type="button" data-toggle="collapse" data-target="#signatoryCollapse11"
                   aria-expanded="false" aria-controls="signatoryCollapse11">
                Entry 1
                </button>
             </h2>
             <div id="signatoryCollapse11" class="collapse" aria-labelledby="signatoryHeading11">
                <div class="accordion-body">
                   <!-- Your content for entry goes here -->
                   <div class="row mb-2" id="signatoryDetailsContainer11">
                      <div class="col-12 d-flex">
                         <div class="col-md-4">
                            <div class="mb-3">
                               Category : <br>
                               <div class="input-group " style="width: 100%;">
                                   <select  name="wc_hw_category[]" class="form-control mt-1" style="width: 70%;">
                                    <option value=""></option>
                                    @foreach (App\Models\Dropdown::whereNotNull('comaplains_category')->get() as $com_com_category)
                                    <option value="{{  $com_com_category->comaplains_category }}">{{  $com_com_category->comaplains_category }}</option>
                                    @endforeach
                                 </select>
                                 <div class="input-group-append" style="width: 30%;">
                                    <a href="{{ route('comercialcomplainscategory.add') }}">
                                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                    </a>
                                 </div>
                          </div>
                            </div>

                            <div class="mb-3">
                             <label class="form-check-label" for="">Current Minimum Wage of Respective Region:</label>
                             <input class="form-control" name="wc_hw_res_region[]" type="text"
                                placeholder="..." id="minimumWage" oninput="calculatinputevalues(this)"  style="width: 100%;">
                          </div>
                          <div class="mb-3">
                             <label class="form-check-label" for="">Social Security:</label>
                             <input class="form-control" id="socialSecurity" name="wc_hw_social[]" type="text"
                                placeholder="..." style="width: 100%;" readonly>
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
                               Unit(without tax):</label>
                               <input class="form-control totalMonthlyRatePerUnitFieldwt"
                                  name="wc_hw_total_monthly_rate_without_tax[]" type="text" placeholder="..."
                                  style="width: 100%;" readOnly>
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">
                               Quantity:</label>
                               <input class="form-control hwquantity"
                                  name="wc_hw_total_quantity[]" type="text" placeholder="..."
                                  style="width: 100%;" >
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">
                               Grand:</label>
                               <input class="form-control hwgrand"
                                  name="wc_hw_total_grand[]" type="text" placeholder="..."
                                  style="width: 100%;" >
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">WHT:</label>
                               <input class="form-control whtFieldc" name="wc_hw_wht[]" type="text"
                                  placeholder="..." style="width: 100%;" readOnly>
                            </div>
                         </div>
                         <div class="col-md-4">
                             <div class="mb-3">
                                 <label class="form-check-label" for="">Date:</label>
                                 <input class="form-control" name="wc_hw_date[]" type="date"
                                    placeholder="..." style="width: 100%;">
                              </div>
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
                               <label class="form-check-label" for="">Total Monthly Rate per
                               Unit(with tax):</label>
                               <input class="form-control totalMonthlyRatePerUnitFieldc"
                                  name="wc_hw_total_monthly_rate[]" type="text" placeholder="..."
                                  style="width: 100%;" readOnly>
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
                               <input  class="form-control" name="wc_hw_eobi[]" name="EOBI" type="text"
                                  placeholder="..." style="width: 100%;" id="eobi" readonly>
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
             </div>
          </div>
       </div>

       <script>
          document.addEventListener("DOMContentLoaded", () => {
              // Function to calculate Social Security and EOBI
              const calculateSecurityAndEobi = (minimumWage) => {
                  const socialSecurity = minimumWage * 0.06;
                  const eobi = minimumWage * 0.05;
                  return { socialSecurity, eobi };
              };

              // Function to calculate GST
              const calculateGst = (totalMonthlyRateWithoutTax) => {
                  return totalMonthlyRateWithoutTax * 0.16;
              };

              // Function to calculate Admin Cost
              const calculateAdminCost = (sumComponents, hiddenAdminCost, applicableWHTPercentage) => {
                  return (
                      hiddenAdminCost + (sumComponents / (1 - applicableWHTPercentage / 100)) - sumComponents
                  );
              };

              // Function to calculate Total Monthly Rate (with taxes)
              const calculateTotalMonthlyRateWithTax = (totalMonthlyRateWithoutTax, gst) => {
                  return totalMonthlyRateWithoutTax + gst;
              };

              // Function to calculate Grand Total
              const calculateGrandTotal = (totalMonthlyRateWithTax, quantity) => {
                  return totalMonthlyRateWithTax * quantity;
              };

              // Update all fields after calculating values
              const updateFields = (parentCol, values) => {
                  parentCol.querySelector("#socialSecurity").value = values.socialSecurity.toFixed(2);
                  parentCol.querySelector("#eobi").value = values.eobi.toFixed(2);
                  parentCol.querySelector(".gstFieldc").value = values.gst.toFixed(2);
                  parentCol.querySelector(".adminCostFieldc").value = values.adminCost.toFixed(2);
                  parentCol.querySelector(".totalMonthlyRatePerUnitFieldc").value = values.totalMonthlyRateWithTax.toFixed(2);
                  parentCol.querySelector(".hwgrand").value = values.grandTotal.toFixed(2);
              };

              // Function to handle recalculating all values
              const handleRecalculate = (parentCol) => {
                  const minimumWage = parseFloat(parentCol.querySelector("#minimumWage")?.value) || 0;
                  const hiddenAdminCost = parseFloat(parentCol.querySelector("#hiddenAdminCostField")?.value) || 0;
                  const salary = parseFloat(parentCol.querySelector("#hidesalary")?.value) || 0;
                  const relieverAllowance = parseFloat(parentCol.querySelector("#hiderelieverAllowance")?.value) || 0;
                  const groupInsurance = parseFloat(parentCol.querySelector("[name='wc_hw_group[]']")?.value) || 0;
                  const uniformCost = parseFloat(parentCol.querySelector("[name='wc_hw_uni_cost[]']")?.value) || 0;
                  const weaponCost = parseFloat(parentCol.querySelector("[name='wc_hw_weapon[]']")?.value) || 0;
                  const trainingCost = parseFloat(parentCol.querySelector("[name='wc_hw_training_cost[]']")?.value) || 0;
                  const totalMonthlyRateWithoutTax = parseFloat(parentCol.querySelector(".totalMonthlyRatePerUnitFieldwt")?.value) || 0;
                  const applicableWHTPercentage = parseFloat(parentCol.querySelector("[name='wc_hw_app_wht_per[]']")?.value) || 0;
                  const quantity = parseFloat(parentCol.querySelector(".hwquantity")?.value) || 0;

                  // Calculate Social Security, EOBI, and other components
                  const { socialSecurity, eobi } = calculateSecurityAndEobi(minimumWage);
                  const gst = calculateGst(totalMonthlyRateWithoutTax);
                  const sumComponents =
                      salary +
                      relieverAllowance +
                      eobi +
                      socialSecurity +
                      groupInsurance +
                      uniformCost +
                      weaponCost +
                      trainingCost +
                      hiddenAdminCost;

                  const adminCost = calculateAdminCost(sumComponents, hiddenAdminCost, applicableWHTPercentage);
                  const totalMonthlyRateWithTax = calculateTotalMonthlyRateWithTax(totalMonthlyRateWithoutTax, gst);
                  const grandTotal = calculateGrandTotal(totalMonthlyRateWithTax, quantity);

                  // Update all fields
                  updateFields(parentCol, { socialSecurity, eobi, gst, adminCost, totalMonthlyRateWithTax, grandTotal });
              };

              // Add event listeners to all relevant inputs
              document.querySelectorAll(".col-md-4 input").forEach((input) => {
                  input.addEventListener("input", (e) => {
                      const parentCol = e.target.closest(".col-md-4").parentElement;
                      handleRecalculate(parentCol);
                  });
              });
          });
          </script>

       <!-- Add More and Remove Buttons -->
       <div class="row my-3">
          <div class="col">
             <button type="button" class="btn btn-primary" id="addSignatory11"
                style="height:30px; width:150px;">Add More</button>
          </div>
          <button type="button" class="btn btn-primary" id="updateSignatoryTable11">Save</button>
       </div>
    </div>
    <div class="table-responsive">
       <table class="table table-bordered mt-1" id="signatorySummaryTable11">
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
