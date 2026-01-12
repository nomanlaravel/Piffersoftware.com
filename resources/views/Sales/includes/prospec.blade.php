<div class="row mb-2">
    <div class="col-lg-4 spacing-right">
       Prospect No <br> <input class="form-control mt-2" name="prospectNo"  id="prospectNo" type="text" placeholder="..."
          style="width: 84%;">
    </div>
    <div class="col-lg-4 form-group">
       Category:<br>
       <div class="input-group" style="width: 100%;">
          <select id="category" class="form-control mt-1"  name="category" style="width: 70%; border-radius: 4px 0 0 4px; ">
             <option value=""></option>
             @foreach ($salescategory as $category)
             <option value="{{ $category->salesCategoryName }}">{{ $category->salesCategoryName }}</option>
             @endforeach
          </select>
          <div class="input-group-append" style="width: 30%;">
             <a href="{{ route('salescategory') }}">
             <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
             </a>
          </div>
       </div>
    </div>
    <div class="col-lg-4 form-group">
       RHQ :<br>
       <div class="input-group" style="width: 100%;">
          <select id="category" class="form-control mt-1"  name="rhq" style="width: 70%; border-radius: 4px 0 0 4px; ">
             <option value=""></option>
             @foreach ($salesrhq as $rhq)
             <option value="{{ $rhq->salesRhq }}">{{ $rhq->salesRhq }}</option>
             @endforeach
          </select>
          <div class="input-group-append" style="width: 30%;">
             <a href="{{ route('salesrhq') }}">
             <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
             </a>
          </div>
       </div>
    </div>
    <div class="col-lg-4 form-group">
       Branch Name  :<br>
       <div class="input-group" style="width: 100%;">
          <select id="category" class="form-control mt-1"  name="branch_name" style="width: 70%; border-radius: 4px 0 0 4px; ">
             <option value=""></option>
             @foreach ($admin as $admin)
             <option value="{{ $admin->branch_office_name }}">{{ $admin->branch_office_name }}</option>
             @endforeach
          </select>
          <div class="input-group-append" style="width: 30%;">
             <a href="{{ route('admin') }}">
             <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
             </a>
          </div>
       </div>
    </div>
    <div class="col-lg-4">
       Branch Code <br> <input class="form-control" name="branch_code" type="text" placeholder="..." style="width: 88%;">
    </div>
    <div class="col-lg-4 form-group">
       List of Giveaways:<br>
       <div class="input-group" style="width: 100%;">
          <select id="applicable_compliances" class="form-control mt-1"  name="lis_of_give" style="width: 70%; border-radius: 4px 0 0 4px; ">
             <option value=""></option>
             @foreach ($salesgive as $give)
             <option value="{{ $give->salesGive }}">{{ $give->salesGive }}</option>
             @endforeach
          </select>
          <div class="input-group-append" style="width: 30%;">
             <a href="{{ route('salesgive') }}">
             <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
             </a>
          </div>
       </div>
    </div>
 </div>
 <div class="mt-3 mb-3">
    <!-- Promotional Activities Dropdown -->
    <!-- <h5 class="mt-2">List of Promotional Activities</h5>
       <div class="form-check form-check-inline spacing-left">
       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="negative">
       <label class="form-check-label" for="inlineCheckbox1">Calenders</label>
       </div>
       <div class="form-check form-check-inline spacing-left">
       <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="positives">
       <label class="form-check-label" for="inlineCheckbox2">Iftar</label>
       </div>
       <div class="form-check form-check-inline spacing-left">
       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="negative">
       <label class="form-check-label" for="inlineCheckbox1">Greeting Cards</label>
       </div>
       <div class="form-check form-check-inline spacing-left">
       <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="positives">
       <label class="form-check-label" for="inlineCheckbox2">Giveaways</label>
       </div>
       <div class="form-check form-check-inline spacing-left">
       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="negative">
       <label class="form-check-label" for="inlineCheckbox1">Thought of the Day</label>
       </div>
       <div class="form-check form-check-inline spacing-left">
       <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="positives">
       <label class="form-check-label" for="inlineCheckbox2">Coporate SMS</label>
       </div>
       <div class="form-check form-check-inline spacing-left">
       <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="negative">
       <label class="form-check-label" for="inlineCheckbox1">All</label>
       </div>
       <div id="new-check"></div>
       <div id="new-check">
           <div class="form-check form-check-inline">
                   <input class="form-check-input" name="compliances[]" type="checkbox" id="addMoreCheckbox">
                   <label class="form-check-label" for="addMoreCheckbox">Add More</label>
           </div>
       </div> -->
 </div>
 <div class="row mb-2">
    <div class="col-lg-3 mt-1">
       Organization Name <br> <input class="form-control" name="orgName" type="text" placeholder="..." style="width: 100%;">
    </div>
    <div class="col-lg-3 mt-1">
       Organization Type <br> <input class="form-control" name="orgType" type="text" placeholder="..." style="width: 100%;">
    </div>
    <div class="col-lg-3 mt-1">
       Lead Generated By <br> <input class="form-control" name="leadBy" type="text" placeholder="..." style="width: 100%;">
    </div>
    <div class="col-lg-3 form-group spacing-left">
       Lead Type:<br>
       <div class="input-group" style="width: 100%;">
          <select id="leadcategory" class="form-control mt-1"  name="leadType" style="width: 70%; border-radius: 4px 0 0 4px; ">
             <option value=""></option>
             @foreach ($saleslead as $lead)
             <option value="{{ $lead->salesLead }}">{{ $lead->salesLead }}</option>
             @endforeach
          </select>
          <div class="input-group-append" style="width: 30%;">
             <a href="{{ route('saleslead') }}">
             <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
             </a>
          </div>
       </div>
    </div>
 </div>
 <h5><b>Lead Generated By:</b></h5>
 <div class="row mb-2">
    <div class="col-lg-4 spacing-right">
       Lead Agent Name <br> <input class="form-control" name="leadBy" type="text" placeholder="..." style="width: 100%;">
    </div>
    <div class="col-lg-4 form-group spacing-right">
       Type of Lead : <br>
       <div class="input-group" style="width: 100%;">
          <select id="category" class="form-control mt-1"  name="typeLead" style="width: 70%; border-radius: 4px 0 0 4px; ">
             <option value=""></option>
             @foreach ($saleslead as $lead)
             <option value="{{ $lead->salesLead }}">{{ $lead->salesLead }}</option>
             @endforeach
          </select>
          <div class="input-group-append" style="width: 30%;">
             <a href="{{ route('saleslead') }}">
             <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
             </a>
          </div>
       </div>
    </div>
    <div class="col-lg-4 form-group spacing-left">
       Source of Lead : <br>
       <div class="input-group" style="width: 100%;">
          <select id="category1" class="form-control mt-1"  name="srcLead" style="width: 70%; border-radius: 4px 0 0 4px; ">
             <option value="">Select a lead</option>
             @foreach (App\Models\SourceLead::all() as $leadname)
             <option value="{{ $leadname->lead_name }}">{{ $leadname->lead_name }}</option>
             @endforeach
          </select>
          <div class="input-group-append" style="width: 30%;">
             <a href="{{ route('sourceLead.add') }}">
             <button class="btn btn-primary" id="submit-category" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
             </a>
          </div>
       </div>
    </div>
    <div class="container my-1">
       <div class="accordion" id="departmentAccordion">
          <!-- Initial Accordion Item -->
          <div class="accordion-item departmentaccordion-item" id="departmentEntry1">
             <h2 class="accordion-header" id="departmentHeading1" style="color: white">
                <button class="accordion-button" style="background-color: #34005A; color:white"  type="button" data-toggle="collapse" data-target="#departmentCollapse1" aria-expanded="false" aria-controls="departmentCollapse1">
                POC Details
                </button>
             </h2>
             <div id="departmentCollapse1" class="collapse" aria-labelledby="departmentHeading1">
                <div class="accordion-body">
                   <!-- Your content for signatory entry goes here -->
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
          </div>
       </div>
       <!-- Add More and Remove Buttons -->
       <div class="row my-3">
          <div class="col">
             <button type="button" class="btn btn-primary" id="addDepartment" style="height:30px; width:170px;">Add More POC</button>
          </div>
          <button type="button" class="btn btn-primary" id="updateDepartmentTable" style="height:30px; width:200px;">Save</button>
       </div>
    </div>
    <table class="table table-bordered mt-1" id="departmentSummaryTable">
       <thead>
          <tr>
             <th>Entry</th>
             <th>POC Name</th>
             <th>POC Contact</th>
             <th>POC Email</th>
             <th>POC Desig</th>
             <th>View</th>
             <!-- Add more columns as needed -->
          </tr>
       </thead>
       <tbody>
          <!-- Summary data will be added here dynamically -->
       </tbody>
    </table>
    <h5><b>Lead Assigned By:</b></h5>
    <div class="col-lg-3 spacing-right">
       Name <br> <input class="form-control" id="leadAssignedByName" name="leadAssignedByName" type="text" placeholder="..."
          style="width: 100%;">
    </div>
    <div class="col-lg-3 spacing-right">
       Phone Number <br> <input class="form-control" name="leadAssignedByphoneNo" type="text" placeholder="..." style="width: 100%;">
    </div>
    <div class="col-lg-3 spacing-right">
       Email <br> <input class="form-control" name="leadAssignedByemail" type="text" placeholder="..." style="width: 100%;">
    </div>
    <div class="col-lg-3 spacing-right">
       Employee ID <br> <input class="form-control" name="leadAssignedById" type="text" placeholder="..." style="width: 100%;">
    </div>
    <h5><b>Lead Assigned To:</b></h5>
    <div class="col-lg-3 spacing-right">
       Name <br> <input class="form-control" name="leadAssignedToName" type="text" placeholder="..." style="width: 100%;">
    </div>
    <div class="col-lg-3 spacing-right">
       Phone Number <br> <input class="form-control" name="leadAssignedTophoneNo" type="text" placeholder="..." style="width: 100%;">
    </div>
    <div class="col-lg-3 spacing-right">
       Email <br> <input class="form-control" name="leadAssignedToEmail" type="text" placeholder="..." style="width: 100%;">
    </div>
    <div class="col-lg-3 spacing-right">
       Employee ID <br> <input class="form-control" name="leadAssignedToId" type="text" placeholder="..." style="width: 100%;">
    </div>
    <div class="col-lg-3 spacing-right">
       Estimated Quantity <br> <input class="form-control" name="leadAssignedToEstdQuan" type="text" placeholder="..." style="width: 100%;">
    </div>
    <div class="col-lg-3 spacing-right">
       Backend Calculation <br> <input class="form-control" name="backendCalculation" type="text" placeholder="..." style="width: 100%;">
    </div>
    <button type="button" id="validateBtn" class="btn btn-primary mt-4 mx-5">Save</button>
    <div id="validationMessage" class="mt-3"></div>
 </div>
