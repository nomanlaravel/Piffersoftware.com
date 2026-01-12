
@include('layouts.header')
@yield('main')

<div class="customer_form">
   @include('headerlogout')
    <div class="col-lg-12 d-flex">
        <div class="col-lg-3">
            <div style="text-align: center; margin-top: 20px;">
                <h5>Sales Campaign</h5>
            </div>
            <div style="height: 493px; overflow: auto; overflow-x: hidden; margin-top: 15px;">
                @foreach ($items as $item)
                    <div style="text-align: center; margin-top: 15px;">
                        <div class="thumb_img_1" id="thumb_img_{{ $item->id }}" style="cursor: pointer;" onclick="showDetails('{{ $item->id }}', '{{ $item->item_name }}', '{{ $item->campaign_number }}', '{{ url($item->item_image) }}')">
                            <img class="rounded_circle image_thumbnail" src="{{ url($item->item_image) }}" height="80" width="80" alt="" style="border-radius: 50%;">
                            <p>{{ $item->item_name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-9">
            <div class="accordion" id="compaignAccordion17">
                <!-- Accordion items will be dynamically added here -->
            </div>

            <!-- Add More and Save Buttons -->
            <div class="row my-3" id="buttonContainer17" style="display: none;">
                <div class="col">
                    <button type="button" class="btn btn-primary d-none" id="addcompaign17" style="height:30px; width:150px;" disabled>Add More</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary float-end" id="updatecompaign17" style="height:30px; width:150px;">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Dependencies -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    let isCampaignSaved = true; // Track if the current campaign is saved
    let currentItemId = null; // Track the currently selected item

    function showDetails(itemId, itemName, campaignNumber, itemImage) {
        // if (!isCampaignSaved && currentItemId !== null) {
        //     toastr.warning('Please save the current campaign before adding another.', '', {
        //         "positionClass": "toast-top-right",
        //         "progressBar": true,
        //         "timeOut": "3000"
        //     });
        //     return;
        // }

        // Clear existing accordion items
        $('#compaignAccordion17').empty();
        currentItemId = itemId;
        isCampaignSaved = false;
        $('#addcompaign17').prop('disabled', true); // Disable Add More until saved
        $('#buttonContainer17').show(); // Show Add More and Save buttons

        // Create new accordion item
        var newAccordionItem = `
            <div class="accordion-item compaignaccordion-item17" id="compaignEntry17">
                <h2 class="accordion-header" id="compaignHeading171">
                    <button class="accordion-button" type="button" style="background-color: #34005A; color:white"
                        data-bs-toggle="collapse" data-bs-target="#compaignCollapse171"
                        aria-expanded="true" aria-controls="compaignCollapse171">
                        Campaign for ${itemName}
                    </button>
                </h2>
                <div id="compaignCollapse171" class="accordion-collapse collapse show" aria-labelledby="compaignHeading171">
                    <form id="campaignForm-${itemId}" action="{{ route('campaign.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="item_id" value="${itemId}">
                        <div class="accordion-body">
                            <div class="col-lg-12 mt-3 sales item-details" id="image1-details-${itemId}">
                                <div class="details">
                                    <h5>Campaign Leader:</h5>
                                    <div>
                                        <div class="row g-3 mb-1">
                                            <div class="col">
                                                <label for="campaign_number_${itemId}">Campaign Number:</label>
                                                <input type="text" name="campaign_number" class="form-control" value="${campaignNumber}" placeholder="..." aria-label="Campaign Number">
                                                @error('campaign_number')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="item_name_${itemId}">Item Name:</label>
                                                <input type="text" name="item_name" class="form-control" value="${itemName}" placeholder="..." aria-label="Item Name">
                                                @error('item_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="leader_name_${itemId}">Name:</label>
                                                <input type="text" name="leader_name" class="form-control" placeholder="..." aria-label="Leader Name">
                                                @error('leader_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="leader_employee_no_${itemId}">Employee No:</label>
                                                <input type="text" name="leader_employee_no" class="form-control" placeholder="..." aria-label="Employee No">
                                                @error('leader_employee_no')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-1">
                                            <div class="col">
                                                <label for="leader_cell_no_${itemId}">Cell No:</label>
                                                <input type="text" name="leader_cell_no" class="form-control" placeholder="..." aria-label="Cell No">
                                                @error('leader_cell_no')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="leader_email_id_${itemId}">Email ID:</label>
                                                <input type="email" name="leader_email_id" class="form-control" placeholder="..." aria-label="Email ID">
                                                @error('leader_email_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-1">
                                            <div class="col">
                                                <label for="start_date_${itemId}">Campaign Start Date:</label>
                                                <input type="date" class="form-control" name="start_date" placeholder="..." aria-label="Start Date">
                                                @error('start_date')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="end_date_${itemId}">Campaign End Date:</label>
                                                <input type="date" class="form-control" name="end_date" placeholder="..." aria-label="End Date">
                                                @error('end_date')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Reporting To:</h5>
                                    <div>
                                        <div class="row g-3 mb-1">
                                            <div class="col">
                                                <label for="reporting_to_name_${itemId}">Name:</label>
                                                <input type="text" class="form-control" name="reporting_to_name" placeholder="..." aria-label="Reporting Name">
                                                @error('reporting_to_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="reporting_to_desig_${itemId}">Designation:</label>
                                                <input type="text" name="reporting_to_desig" class="form-control" placeholder="..." aria-label="Designation">
                                                @error('reporting_to_desig')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-1">
                                            <div class="col">
                                                <label for="reporting_to_cell_${itemId}">Cell No:</label>
                                                <input type="text" name="reporting_to_cell" class="form-control" placeholder="..." aria-label="Cell No">
                                                @error('reporting_to_cell')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="reporting_to_email_${itemId}">Email ID:</label>
                                                <input type="email" name="reporting_to_email" class="form-control" placeholder="..." aria-label="Email ID">
                                                @error('reporting_to_email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="form-group col">
                                                <p style="text-align: left; margin-bottom: 0px;"><label for="notes_${itemId}">Notes:</label></p>
                                                <textarea class="form-control" name="reporting_to_notes" id="notes_${itemId}" cols="42" rows="2"></textarea>
                                                @error('reporting_to_notes')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="reporting_to_attach_${itemId}">Attachment:</label>
                                                <input type="file" class="form-control" name="reporting_to_attach" placeholder="..." aria-label="Attachment">
                                                @error('reporting_to_attach')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <nav>
                                    <div class="nav nav-tabs mt-3" id="myTabs_${itemId}" role="tablist">
                                        <a class="nav-item nav-link active" id="spread-tab-${itemId}" data-bs-toggle="tab" href="#spread-${itemId}" role="tab" aria-controls="spread" aria-selected="true">Spread</a>
                                        <a class="nav-item nav-link" id="dispatch-tab-${itemId}" data-bs-toggle="tab" href="#dispatch-${itemId}" role="tab" aria-controls="dispatch" aria-selected="false">Dispatching Details</a>
                                        <a class="nav-item nav-link" id="response-tab-${itemId}" data-bs-toggle="tab" href="#response-${itemId}" role="tab" aria-controls="response" aria-selected="false">Response</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="myTabsContent_${itemId}">
                                    <div class="tab-pane fade show active" id="spread-${itemId}" role="tabpanel" aria-labelledby="spread-tab">
                                        <div class="mt-3 d-flex">
                                            <div class="form-group col-lg-6">
                                                <label for="region_${itemId}">Region:</label>
                                                <div class="input-group" style="width: 100%;">
                                                    <select id="region_${itemId}" class="form-control mt-1" name="region" style="width: 70%; border-radius: 4px 0 0 4px;">
                                                        <option value="">Select a region</option>
                                                        @foreach (App\Models\Region::all() as $region)
                                                            <option value="{{ $region->region_name }}">{{ $region->region_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="{{ route('region.add') }}">
                                                            <button class="btn btn-primary" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                                @error('region')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Quantity of Item Dispatched:<br>
                                                <input class="form-control" name="item_quantity" type="text" placeholder="..." style="width: 100%;">
                                                @error('item_quantity')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Price of Per Item:<br>
                                                <input class="form-control" name="item_price" type="text" placeholder="..." style="width: 100%;">
                                                @error('item_price')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Total Price:<br>
                                                <input class="form-control" name="item_total_price" type="text" placeholder="..." style="width: 100%;">
                                                @error('item_total_price')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="form-group col-lg-6">
                                                <label for="segment_${itemId}">Segment:</label>
                                                <div class="input-group" style="width: 100%;">
                                                    <select id="segment_${itemId}" class="form-control mt-1" name="segment" style="width: 70%; border-radius: 4px 0 0 4px;">
                                                        <option value="">Select a Segment</option>
                                                        @foreach (App\Models\Segment::all() as $segment)
                                                            <option value="{{ $segment->segment_name }}">{{ $segment->segment_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="{{ route('segment.add') }}">
                                                            <button class="btn btn-primary" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                                @error('segment')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="dispatched_to_${itemId}">Dispatched To:</label>
                                                <div class="input-group" style="width: 100%;">
                                                    <select id="dispatched_to_${itemId}" class="form-control mt-1" name="dispatched_to" style="width: 70%; border-radius: 4px 0 0 4px;">
                                                        <option value="">Select a Dispatch</option>
                                                        @foreach (App\Models\Dispatching::all() as $dispatch)
                                                            <option value="{{ $dispatch->dispatch_name }}">{{ $dispatch->dispatch_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" style="width: 30%;">
                                                        <a href="{{ route('dispatch.add') }}">
                                                            <button class="btn btn-primary" type="button" style="width: 100%; height: 38px; border-radius: 0 4px 4px 0; margin-top:4px;">Add</button>
                                                        </a>
                                                    </div>
                                                </div>
                                                @error('dispatched_to')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="form-group col-lg-6">
                                                <label for="dispatched_signature_${itemId}">Dispatched with Signature/Visiting Card of:</label>
                                                <select class="form-control" name="dispatched_signature" id="dispatched_signature_${itemId}">
                                                    <option value="">Select</option>
                                                    <option value="CEO">CEO</option>
                                                    <option value="COO">COO</option>
                                                    <option value="CBO">CBO</option>
                                                    <option value="National Sales Manager">National Sales Manager</option>
                                                    <option value="Sales Manager">Sales Manager</option>
                                                    <option value="Manager Contract Management">Manager Contract Management</option>
                                                </select>
                                                @error('dispatched_signature')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <div>
                                                    List of Address Recipient:<br>
                                                    <input class="form-control" type="file" name="list_of_address_attach" placeholder="..." style="width: 100%;">
                                                    @error('list_of_address_attach')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-6">
                                                Notes:<br>
                                                <textarea style="width: 100%;" name="dispatched_to_notes" cols="15" rows="4"></textarea>
                                                @error('dispatched_to_notes')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    Attachment:<br>
                                                    <input class="form-control" type="file" name="dispatched_to_attach" placeholder="..." style="width: 100%;">
                                                    @error('dispatched_to_attach')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="dispatch-${itemId}" role="tabpanel" aria-labelledby="dispatch-tab">
                                        <div class="d-flex">
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Courier Name:<br>
                                                <input class="form-control" name="courier_name" type="text" placeholder="..." style="width: 100%;">
                                                @error('courier_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Price Per Unit:<br>
                                                <input class="form-control" name="courier_price" type="text" placeholder="..." style="width: 100%;">
                                                @error('courier_price')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Quantity:<br>
                                                <input class="form-control" name="courier_quantity" type="text" placeholder="..." style="width: 100%;">
                                                @error('courier_quantity')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Total Estimated Cost:<br>
                                                <input class="form-control" name="courier_total_cost" type="text" placeholder="..." style="width: 100%;">
                                                @error('courier_total_cost')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Total Cost Of Campaign:<br>
                                                <input class="form-control" name="compaign_cost" type="text" placeholder="..." style="width: 100%;">
                                                @error('compaign_cost')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 spacing-right mt-2">
                                                No of Items Return:<br>
                                                <input class="form-control" name="no_of_items_return" type="text" placeholder="..." style="width: 100%;">
                                                @error('no_of_items_return')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Reason of Items Return:<br>
                                                <input class="form-control" name="reason_of_items_return" type="text" placeholder="..." style="width: 100%;">
                                                @error('reason_of_items_return')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Item Return:<br>
                                                <input class="form-control" name="items_return_attach" type="file" placeholder="..." style="width: 100%;">
                                                @error('items_return_attach')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Per Unit Return Cost:<br>
                                                <input class="form-control" name="items_return_cost" type="text" placeholder="..." style="width: 100%;">
                                                @error('items_return_cost')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Total Return Cost:<br>
                                                <input class="form-control" name="items_return_total_cost" type="text" placeholder="..." style="width: 100%;">
                                                @error('items_return_total_cost')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <h5 class="mt-3 ml-3">Dispatched By:</h5>
                                        <div class="d-flex">
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Name:<br>
                                                <input class="form-control" name="dispatch_by_name" type="text" placeholder="..." style="width: 100%;">
                                                @error('dispatch_by_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Employee No:<br>
                                                <input class="form-control" name="dispatch_by_employee" type="text" placeholder="..." style="width: 100%;">
                                                @error('dispatch_by_employee')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Designation:<br>
                                                <input class="form-control" name="dispatch_by_desig" type="text" placeholder="..." style="width: 100%;">
                                                @error('dispatch_by_desig')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 spacing-right mt-2">
                                                Department:<br>
                                                <input class="form-control" name="dispatch_by_dept" type="text" placeholder="..." style="width: 100%;">
                                                @error('dispatch_by_dept')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-4 mt-2">
                                                Send Count:<br>
                                                <input class="form-control" name="send_count" type="text" placeholder="...">
                                                @error('send_count')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4 mt-2">
                                                Received By:<br>
                                                <input class="form-control" name="received_by" type="text" placeholder="...">
                                                @error('received_by')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4 mt-2">
                                                Opened By:<br>
                                                <input class="form-control" name="opended_by" type="text" placeholder="...">
                                                @error('opended_by')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-6 mt-2">
                                                Notes:<br>
                                                <textarea class="form-control mt-1" name="dispatch_by_notes" placeholder="..." style="width: 100%;"></textarea>
                                                @error('dispatch_by_notes')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mt-2">
                                                Attachments:<br>
                                                <input class="form-control" name="dispatch_by_attach" type="file" placeholder="..." style="width: 100%;">
                                                @error('dispatch_by_attach')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="response-${itemId}" role="tabpanel" aria-labelledby="response-tab">
                                        <button type="submit" class="btn btn-danger" style="margin-top: 20px;">Lead Generation</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <button class="btn btn-danger removecompaignAccordion17 mb-2 d-none" type="button" style="width:15%; margin-left:13px;">Remove</button>
                </div>
            </div>
        `;
        $('#compaignAccordion17').append(newAccordionItem);
        document.getElementById('image1-details-' + itemId).style.display = 'block';
    }

    $(document).ready(function () {
        // Form submission with Toastr
        $(document).on('submit', 'form[id^="campaignForm-"]', function(event) {
            event.preventDefault();
            var form = this;
            $(form).find('button[type="submit"]').prop('disabled', true);
            toastr.info('Data is submitting. You are redirecting to Lead Generation...', '', {
                "positionClass": "toast-top-right",
                "progressBar": true,
                "timeOut": "3000"
            });
            setTimeout(() => {
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        isCampaignSaved = true;
                        $('#addcompaign17').prop('disabled', false); // Enable Add More
                        toastr.success('Campaign saved successfully!', '', {
                            "positionClass": "toast-top-right",
                            "progressBar": true,
                            "timeOut": "3000"
                        });
                        $('#compaignAccordion17').empty(); // Clear accordion
                        $('#buttonContainer17').hide(); // Hide buttons
                        currentItemId = null;
                    },
                    error: function(xhr) {
                        $(form).find('button[type="submit"]').prop('disabled', false);
                        toastr.error('Failed to save campaign. Please try again.', '', {
                            "positionClass": "toast-top-right",
                            "progressBar": true,
                            "timeOut": "3000"
                        });
                    }
                });
            }, 2000);
        });

        // Save Button
        $('#updatecompaign17').on('click', function () {
            var form = $('form[id^="campaignForm-"]');
            if (form.length) {
                form.submit();
            } else {
                toastr.warning('No campaign form to save. Please select an item.', '', {
                    "positionClass": "toast-top-right",
                    "progressBar": true,
                    "timeOut": "3000"
                });
            }
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removecompaignAccordion17', function () {
            $(this).closest('.compaignaccordion-item17').remove();
            isCampaignSaved = true;
            $('#addcompaign17').prop('disabled', false);
            $('#buttonContainer17').hide(); // Hide buttons
            currentItemId = null;
        });
    });
</script>

