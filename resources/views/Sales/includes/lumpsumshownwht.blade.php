<div id="shown-WHT-2" style="display:none;">
    <h3 style="margin-left: 30px; margin-top: 10px;">Lump Sum- Shown WHT</h3>
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
               <label class="form-check-label" for="">Applicable GST:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>
           <div class="mb-3">
               <label class="form-check-label" for="">GST:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;" readOnly>
           </div>
       </div>
       <div class="col-md-4">
           <div class="mb-3">
               <label class="form-check-label" for="">Uniform Cost:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>
           <div class="mb-3">
               <label class="form-check-label" for="">Admin Cost:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>
           <div class="mb-3">
               <label class="form-check-label" for="">Applicable WHT:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;">
           </div>
           <div class="mb-3">
               <label class="form-check-label" for="">WHT:</label>
               <input class="form-control" type="text" placeholder="..." style="width: 100%;" readOnly>
           </div>
       </div>
       </div> -->
    <!-- Add more for Lump sum- Shown WHT (in commercial section) -->
    <div class="container my-1">
       <div class="accordion" id="signatoryAccordion13">
          <div class="accordion-item signaccordion-item13" id="signatoryEntry13">
             <h2 class="accordion-header" id="signatoryHeading13" style="color: white">
                <button class="accordion-button" style="background-color: #34005A; color:white"
                   type="button" data-toggle="collapse" data-target="#signatoryCollapse13"
                   aria-expanded="false" aria-controls="signatoryCollapse13">
                Entry 1
                </button>
             </h2>
             <div id="signatoryCollapse13" class="collapse" aria-labelledby="signatoryHeading13">
                <div class="accordion-body">
                   <!-- Your content for entry goes here -->
                   <div class="row mb-2" id="signatoryDetailsContainer13">
                      <div class="col-12 d-flex">
                         <div class="col-md-4">
                            <div class="mb-3">
                               Category : <br>
                               {{-- <select id="category" class="form-control mt-1" name="ls_sw_category[]"
                                  style="width: 100%;">
                                  <option value="">select</option>
                                  <option value="Armed Security Supervisor">Armed Security
                                     Supervisor
                                  </option>
                                  <option value="Armed Security Guard
                                     (Ex-Army)">Armed Security Guard(Ex-Army)</option>
                                  <option value="Armed Security Guard
                                     (Civil)">Armed Security Guard(Civil)</option>
                               </select> --}}
                               <div class="input-group" style="width: 100%;">
                                  <select id="applicable_regions" class="form-control mt-1" name="ls_sw_category[]"  style="width: 70%; border-radius: 4px 0 0 4px; ">
                                     <option value=""></option>
                                  @foreach (App\Models\Dropdown::whereNotNull('lumsumshown_category')->get() as $lumsumshowncategory)
                                     <option value="{{  $lumsumshowncategory->lumsumshown_category }}">{{  $lumsumshowncategory->lumsumshown_category }}</option>
                                     @endforeach
                                  </select>
                                  <div class="input-group-append" style="width: 30%;">
                                     <a href="{{ route('comerciallumsumshowncategory.add') }}">
                                     <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                     </a>
                                  </div>
                               </div>
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Current Minimum Wage of Region:</label>
                               <input class="form-control" type="text" name="ls_sw_min_wage_region[]"
                                  placeholder="..." style="width: 100%;"  id ="lsswminwageregion" >
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Social Security:</label>
                               <input class="form-control" name="ls_sw_social[]" type="text"
                                  placeholder="..." style="width: 100%;"  id ="lsswmsocialsecurity" readonly>
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Weapon & Ammunition
                               Cost:</label>
                               <input class="form-control" name="ls_sw_weapon_cost[]" id ="lsswweaponcost"  type="text"
                                  placeholder="..." style="width: 100%;">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Monthly Rate Per
                               Unit:</label>
                               <input class="form-control monthly_Rate_Per_UnitFieldc2"
                                  type="text" placeholder="..." name="ls_sw_monthly_rate[]"
                                  style="width: 100%;"  id ="lsswmonthlyrateperunit"  readOnly>
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Total Monthly Rate per
                               Unit(with tax):</label>
                               <input class="form-control totalMonthlyRatePerUnitFieldc2" id ="lsswtotalmonthlyrateperunitwithtax"
                                  type="text" placeholder="..." name="ls_sw_total_monthly_rate[]"
                                  style="width: 100%;" readOnly>
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Total Monthly Rate per
                               Unit(without tax):</label>
                               <input class="form-control" id ="lsswtotalmonthlyrateperunitwithouttax"
                                  type="text" placeholder="..." name="ls_sw_total_monthly_rate_without_tax[]"
                                  style="width: 100%;" readOnly>
                            </div>

                         </div>
                         <div class="col-md-4">

                            <div class="mb-3">
                               <label class="form-check-label" for="">Salary:</label>
                               <input class="form-control" type="text" name="ls_sw_salary[]"
                                  placeholder="..." style="width: 100%;"  id ="lsswsalery" >
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Group/ Life
                               insurance:</label>
                               <input class="form-control" name="ls_sw_group_life[]" type="text"
                                  placeholder="..." style="width: 100%;"  id ="lsswgrouplife">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Training Cost:</label>
                               <input class="form-control" name="ls_sw_training_cost[]" type="text"
                                  placeholder="..." style="width: 100%;"  id ="lsswmintrainiingcost">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Applicable GST:</label>
                               <input class="form-control" name="ls_sw_app_gst[]"  type="text"
                                  placeholder="..." style="width: 100%;" id ="lsswapplicablegst">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">GST:</label>
                               <input class="form-control gstFieldc2" name="ls_sw_gst[]" type="text"
                                  placeholder="..." style="width: 100%;" readOnly id ="lsswgst">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Quantity
                              </label>
                               <input class="form-control"
                                  type="text" placeholder="..." name="ls_sw_quantity[]"
                                  style="width: 100%;"  id ="lsswquantity"  >
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Grand Total
                              </label>
                               <input class="form-control"
                                  type="text" placeholder="..." name="ls_sw_grandtotal[]"
                                  style="width: 100%;"  id ="lsswgrandtotal"  readOnly>
                            </div>
                         </div>
                         <div class="col-md-4">
                             <div class="mb-3">
                                 <label class="form-check-label" for="">Date:</label>
                                 <input class="form-control" name="ls_sw_date[]" type="date"
                                    placeholder="..." style="width: 100%;" id="lsswdate">
                              </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">EOBI:</label>
                               <input class="form-control" name="ls_sw_eobi[]"  type="text"
                                  placeholder="..." style="width: 100%;" id ="lssweobi">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Uniform Cost:</label>
                               <input class="form-control"  name="ls_sw_uni_cost[]" type="text"
                                  placeholder="..." style="width: 100%;" id ="lssuniformcost">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Admin Cost:</label>
                               <input class="form-control"  type="text" name="ls_sw_admin_cost[]"
                                  placeholder="..." style="width: 100%;" id ="lsswadmincost">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">Applicable WHT:</label>
                               <input class="form-control"  type="text" name="ls_sw_app_wht[]"
                                  placeholder="..." style="width: 100%;" id ="lsswapplicablewht">
                            </div>
                            <div class="mb-3">
                               <label class="form-check-label" for="">WHT:</label>
                               <input class="form-control whtFieldc2" name="ls_sw_wht[]"  type="text"
                                  placeholder="..." style="width: 100%;" id ="lsswwht" readOnly>
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
             <button type="button" class="btn btn-primary" id="addSignatory13"
                style="height:30px; width:150px;">Add More</button>
          </div>
          <button type="button" class="btn btn-primary" id="updateSignatoryTable13">Save</button>
       </div>
    </div>
     <script>
         document.addEventListener("DOMContentLoaded", function () {
             function calculatvaluesoflumpsum() {
                 // Get all input values
                 const minWage = parseFloat(document.getElementById("lsswminwageregion").value) || 0;
                 const salary = parseFloat(document.getElementById("lsswsalery").value) || 0;
                 const relieverAllowance = 0; // Add a field for Reliever Allowance if required
                 const groupLifeInsurance = parseFloat(document.getElementById("lsswgrouplife").value) || 0;
                 const uniformCost = parseFloat(document.getElementById("lssuniformcost").value) || 0;
                 const weaponCost = parseFloat(document.getElementById("lsswweaponcost").value) || 0;
                 const trainingCost = parseFloat(document.getElementById("lsswmintrainiingcost").value) || 0;
                 const adminCost = parseFloat(document.getElementById("lsswadmincost").value) || 0;
                 const applicableGst = parseFloat(document.getElementById("lsswapplicablegst").value) / 100 || 0;
                 const applicableWht = parseFloat(document.getElementById("lsswapplicablewht").value) / 100 || 0;
                 const quantity = parseFloat(document.getElementById("lsswquantity").value) || 0;

                 // Calculate Social Security and EOBI
                 const socialSecurity = minWage * 0.06;
                 document.getElementById("lsswmsocialsecurity").value = socialSecurity.toFixed(2);

                 const eobi = minWage * 0.05;
                 document.getElementById("lssweobi").value = eobi.toFixed(2);

                 // Calculate Total Monthly Rate per Unit (without taxes)
                 const totalRateWithoutTaxes = salary + relieverAllowance + eobi + socialSecurity + groupLifeInsurance + uniformCost + weaponCost + trainingCost + adminCost;
                 document.getElementById("lsswtotalmonthlyrateperunitwithouttax").value = totalRateWithoutTaxes.toFixed(2);

                 // Calculate GST
                 const gst = totalRateWithoutTaxes * applicableGst;
                 document.getElementById("lsswgst").value = gst.toFixed(2);

                 // Calculate WHT
                 const wht = (totalRateWithoutTaxes + gst) * applicableWht;
                 document.getElementById("lsswwht").value = wht.toFixed(2);

                 // Calculate Total Monthly Rate per Unit (with taxes)
                 const totalRateWithTaxes = totalRateWithoutTaxes + gst + wht;
                 document.getElementById("lsswtotalmonthlyrateperunitwithtax").value = totalRateWithTaxes.toFixed(2);

                 // Calculate Grand Total
                 const grandTotal = totalRateWithTaxes * quantity;
                 document.getElementById("lsswgrandtotal").value = grandTotal.toFixed(2);
             }

             // Attach event listeners to recalculate values whenever an input changes
             const inputs = document.querySelectorAll("input");
             inputs.forEach(input => {
                 input.addEventListener("input", calculatvaluesoflumpsum);
             });
         });
    </script>
    <div class="table-responsive">
       <table class="table table-bordered mt-1" id="signatorySummaryTable13">
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
