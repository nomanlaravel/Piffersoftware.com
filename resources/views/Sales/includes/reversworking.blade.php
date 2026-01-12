<div id="reverse-working" style="display:none;">
    <h3 style="margin-left: 30px; margin-top: 10px;">Reverse Working</h3>
    <div id="reverse-container">
     <div class="row field-group">
    <div class="col-12 d-flex">
       <div class="col-md-4">
          <div class="mb-3">

                 Category : <br>
                 <div class="input-group " style="width: 100%;">
                 <select id="category" class="form-control mt-1" name="reverseCategory" style="width: 70%;">
                    <option value=""></option>
                    @foreach (App\Models\Dropdown::whereNotNull('comercial_reverse_category')->get() as $com_rev_category)
                    <option value="{{  $com_rev_category->comercial_reverse_category }}">{{  $com_rev_category->comercial_reverse_category }}</option>
                    @endforeach
                 </select>
                 <div class="input-group-append" style="width: 30%;">
                    <a href="{{ route('comercialreversecategory.add') }}">
                    <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                    </a>
                 </div>
          </div>
         </div>
         <div class="mb-3">
             <label class="form-check-label" for="">Applicable GST Percentage:</label>
             <input class="form-control" type="text" name="reverseapplicablepercentageGst" id="reverseapplicabelpercentage" placeholder="..." style="width: 100%;">
          </div>
          <div class="mb-3">
             <label class="form-check-label" for="">After WHT:</label>
             <input class="form-control" type="text" name="reverseAfterWht" id="reverseafterwht" placeholder="..." style="width: 100%;">
          </div>

          <div class="mb-3">
             <label class="form-check-label" for="">Salary:</label>
             <input class="form-control" type="text" name="reverseSalary" id="reversesalery" placeholder="..." style="width: 100%;">
          </div>
          <div class="mb-3">
             <label class="form-check-label" for="">Total Profit:</label>
             <input class="form-control" type="text" name="reverseTotalProfit" id="reverstotalprofit" placeholder="..." style="width: 100%;">
          </div>
       </div>
       <div class="col-md-4">
         <div class="mb-3">
             <label class="form-check-label" for="">Applicable Wht Percentage:</label>
             <input class="form-control" type="text" name="reverseapplicablewhtpercent" id="reverapplicabelwhtpercentage" placeholder="..." style="width: 100%;">
          </div>

          <div class="mb-3">
             <label class="form-check-label" for="">Rate:</label>
             <input class="form-control" type="text" name="reverseRate" id="reverserate" placeholder="..." style="width: 100%;">
          </div>
          <div class="mb-3">
             <label class="form-check-label" for="">GST:</label>
             <input class="form-control" type="text" name="reverseGst" id="reversegst" placeholder="..." style="width: 100%;">
          </div>
          <div class="mb-3">
             <label class="form-check-label" for="">Profit:</label>
             <input class="form-control" type="text" name="reverseProfit" id="reverseprofit" placeholder="..." style="width: 100%;">
          </div>
       </div>
       <div class="col-md-4">
          <div class="mb-3">
             <label class="form-check-label" for="">WHT:</label>
             <input class="form-control" type="text" name="reverseWht" id="reversewht" placeholder="..." style="width: 100%;">
          </div>
          <div class="mb-3">
             <label class="form-check-label" for="">After GST:</label>
             <input class="form-control" type="text" name="reverseAfterGst" id="reverseaftergst" placeholder="..." style="width: 100%;">
          </div>
          <div class="mb-3">
             <label class="form-check-label" for="">QTY:</label>
             <input class="form-control" type="text" name="reverseQuantity" id="reversequantity" placeholder="..." style="width: 100%;">
          </div>
       </div>

    </div>
    <div class="col-md-12 ">
     <button type="button" class="btn btn-danger remove-field"  style="display:none; margin-top: 10px;">Remove</button>
 </div>
 </div>
</div>

    <div class="row my-3">
     <div class="col">
        <button type="button" class="btn btn-primary" id="addSignatoryreverseworking"
           style="height:30px; width:150px;">Add More</button>
     </div>
     <button type="button" class="btn btn-primary" id="updateSignatoryTablereverseworking">Save</button>
  </div>
  <script>
   document.addEventListener("DOMContentLoaded", function () {
                 const reverseContainer = document.getElementById("reverse-container");
                 const addMoreButton = document.getElementById("addSignatoryreverseworking");

                 // Add More Button Click Handler
                 addMoreButton.addEventListener("click", function () {
                     // Clone the first field group
                     const fieldGroup = reverseContainer.querySelector(".field-group").cloneNode(true);

                     // Clear the inputs in the cloned field group
                     fieldGroup.querySelectorAll("input").forEach(input => input.value = "");
                     fieldGroup.querySelector("select").selectedIndex = 0;

                     // Append the new field group to the container
                     reverseContainer.appendChild(fieldGroup);

                     // Show the remove button for the new field group only
                     fieldGroup.querySelector(".remove-field").style.display = "block";

                     // Add remove functionality to the new group
                     addRemoveHandler(fieldGroup);
                 });

                 // Remove Field Group
                 function addRemoveHandler(fieldGroup) {
                     const removeButton = fieldGroup.querySelector(".remove-field");
                     removeButton.addEventListener("click", function () {
                         fieldGroup.remove();
                     });
                 }

                 // Ensure the initial group does not have a visible remove button
                 reverseContainer.querySelectorAll(".field-group").forEach(function (fieldGroup, index) {
                     if (index === 0) {
                         fieldGroup.querySelector(".remove-field").style.display = "none";
                     } else {
                         fieldGroup.querySelector(".remove-field").style.display = "block";
                     }
                     addRemoveHandler(fieldGroup);
                 });
             });

 </script>
    <script>
         document.addEventListener('input', function () {
             // Retrieve values from the inputs
             const rate = parseFloat(document.getElementById('reverserate').value) || 0;
             const applicableWhtPercentage = parseFloat(document.getElementById('reverapplicabelwhtpercentage').value) || 0;
             const applicableGstPercentage = parseFloat(document.getElementById('reverseapplicabelpercentage').value) || 0;
             const salary = parseFloat(document.getElementById('reversesalery').value) || 0;
             const qty = parseFloat(document.getElementById('reversequantity').value) || 1;

             // Calculations
             const wht = rate * (applicableWhtPercentage / 100);
             const afterWht = rate - wht;
             const afterGst = applicableGstPercentage ? afterWht / (1 + applicableGstPercentage / 100) : afterWht;
             const gst = afterWht - afterGst;
             const profit = afterGst - salary;
             const totalProfit = profit * qty;

             // Update the respective fields
             document.getElementById('reversewht').value = wht.toFixed(2);
             document.getElementById('reverseafterwht').value = afterWht.toFixed(2);
             document.getElementById('reverseaftergst').value = afterGst.toFixed(2);
             document.getElementById('reversegst').value = gst.toFixed(2);
             document.getElementById('reverseprofit').value = profit.toFixed(2);
             document.getElementById('reverstotalprofit').value = totalProfit.toFixed(2);
         });
    </script>
    <!-- Add more Reverse Working (in comercial section) -->
 </div>
