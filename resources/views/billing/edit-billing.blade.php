@include('layouts.header')

@yield('main')

<div class="customer_form">

    <div id="main" style="margin-left: 92%;">
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>

    <div id="mySidebar" class="sidebar admin-setting">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
        <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration
            Setting</a>
        <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
        <hr>
        <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
    </div>

    <div class="modal-header border-0">
        <div class="d-flex align-items-center mt-4">
            <button type="button" class="btn btn-link" onclick="history.back()"><i class="bi bi-arrow-left"></i></button>
            <h5 class="mt-3" style="font-weight: 700;">
                Billing Details
                </h5>
            </div>
    </div>


    <div id="myModal" class="modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
        <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 30%; border-radius: 10px; text-align: center;">
            <span class="close" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; position: relative; left: 49%;" >&times;</span>
            <p id="popupMessage"></p>
            <input type="text" id="urlInput" style="width: 98%; margin-top: 20px;" readonly>
            <div style="margin-top: 20px;">
                <a href="https://mail.google.com/mail/u/0/#inbox" id="gmailIcon" style="text-decoration: none; color: #000; margin-right: 10px;"><i class="fab fa-google" style="font-size: 24px;"></i></a>
                <a href="https://web.whatsapp.com/send?text=Check%20out%20this%20link%3A%20" id="whatsappIcon" style="text-decoration: none; color: #000; margin-right: 10px;"><i class="fab fa-whatsapp" style="font-size: 24px;"></i></a>
                <span id="copyIcon" style="cursor: pointer; margin-right: 10px;"><i class="fas fa-copy" style="font-size: 24px;"></i></span>
                <span id="copyText" style="font-size: 14px; color: green;"></span>
            </div>
        </div>
    </div>


    <section>
        <form method="POST" action="{{ route('billing.update', ['id' => $billing->id]) }}">
            @csrf
            @method('PUT')
            <div class=" row main-content div">

                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Vendor : <br> <input class="form-control" id="" value="{{ $billing->vendor }}" name="vendor"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            PO Number <br> <input class="form-control" id="" value="{{ $billing->po_number }}" name="po_number"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Bill Date <br> <input class="form-control" id="" value="{{ $billing->bill_date }}" name="bill_date"
                                type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Bill Number <br> <input class="form-control" id="" value="{{ $billing->bill_number }}" name="bill_number"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Payment Terms <br> <input class="form-control" id="" value="{{ $billing->payment_terms }}" name="payment_terms"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="container my-1">
                        <div class="accordion" id="signatoryAccordion10">
                            <!-- Initial Accordion Item -->
                            @foreach ($billing->billingProducts as $index => $product)
                            <div class="accordion-item signaccordion-item10" id="signatoryEntry10{{ $index }}">
                                <h2 class="accordion-header" id="signatoryHeading10{{ $index }}" style="color: white">
                                    <button class="accordion-button" style="background-color: #34005A; color:white"
                                        type="button" data-toggle="collapse" data-target="#signatoryCollapse10{{ $index }}"
                                        aria-expanded="false" aria-controls="signatoryCollapse10{{ $index }}">
                                        Entry {{ $index + 1 }}
                                    </button>
                                </h2>
                                <div id="signatoryCollapse10{{ $index }}" class="collapse" aria-labelledby="signatoryHeading10{{ $index }}">
                                    <div class="accordion-body">
                                        <div class="row mb-2" id="signatoryDetailsContainer10">
                                            <div class="col-lg-12" id="consultant_add_fields">
                                                <div class="row mb-2">
                                                    <input type="hidden" name="billingProducts[{{ $index }}][p_id]" value="{{ $product->id }}">
                                                    <div class="col-lg-4 spacing-right">
                                                        Serial Number <br> <input class="form-control" name="billingProducts[{{ $index }}][serial_no]" value="{{ $product->serial_no }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                        Types <br> <input class="form-control" name="billingProducts[{{ $index }}][types]" value="{{ $product->types }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Sizes <br> <input class="form-control" name="billingProducts[{{ $index }}][sizes]" value="{{ $product->sizes }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Quantity <br> <input class="form-control" name="billingProducts[{{ $index }}][quantity]" value="{{ $product->quantity }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Unit Price <br> <input class="form-control" name="billingProducts[{{ $index }}][unit_price]" value="{{ $product->unit_price }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Tax <br> <input class="form-control" name="billingProducts[{{ $index }}][tax]" value="{{ $product->tax }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Total <br> <input class="form-control" name="billingProducts[{{ $index }}][total]" value="{{ $product->total }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Remarks <br> <input class="form-control" name="billingProducts[{{ $index }}][remarks]" value="{{ $product->remarks }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Add More and Save Buttons -->
                        <div class="row my-3">
                            <div class="col">
                                <button type="button" class="btn btn-primary" id="addSignatory10" style="height:30px; width:150px;">Add More</button>
                            </div>
                            <button type="submit" class="btn btn-primary" id="updateSignatoryTable10">Save</button>
                        </div>
                    </div>
                    <table class="table table-bordered mt-1" id="signatorySummaryTable10">
                        <thead>
                            <tr>
                                <th>Entry</th>
                                <th>Serial Number</th>
                                <th>Types</th>
                                <th>Sizes</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>View</th>
                                <!-- Add more columns as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Summary data will be added here dynamically -->
                        </tbody>
                    </table>

                    <div class="row mb-2">
                        <h5 style="font-weight: bold">Full Payment Details :</h5>
                        <div class="col-lg-4 spacing-right">
                            Payment Details <br> <input class="form-control" readonly id="" value="{{ $billing->payment_details }}" name="payment_details"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Payment Mode <br> <input class="form-control" readonly id="" value="{{ $billing->payment_mode }}" name="payment_mode"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Bank Name <br> <input class="form-control" id="" value="{{ $billing->bank_name }}" name="bank_name"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Cheque Number <br> <input class="form-control" id="" value="{{ $billing->cheque_number }}" name="cheque_number"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Instrument Number <br> <input class="form-control" id="" value="{{ $billing->ins_number }}" name="ins_number" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Attachments <br> <input class="form-control" id="" name="attachments" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer" style="position: fixed; bottom: 0; width: 100%; background-color: #320056; padding: 10px; display: flex; justify-content: space-between; align-items: center; margin-left:-20%;">
                <button type="button" name="cancel" class="btn btn-secondary" style="color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 80px;"><i>Cancel</i></button>
                <div style="display: flex; align-items: center;">
                    <img src="/public/logo.png" alt="Logo" style="height: 30px; margin-right: 10px;">
                    <h4 style="color: #fff; margin: 0; font-size: 14px;"><i>PIFFERS SECURITY SERVICES</i></h4>
                </div>
                <div class="dropdown" style="position: relative; display: inline-block;">
                    <button type="button" class="btn btn-primary" style="background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 150px;"><i style="margin-right:30px;">Submission  &#8594;</i></button>
                    <div class="dropdown-content" style="display: none; position: absolute; background-color: #f9f9f9; min-width: 130px; box-shadow: 0px -8px 16px 0px rgba(0,0,0,0.2); z-index: 1; bottom: 100%;">
                        <button type="submit" name="save_and_email" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & Email/Whatsapp</i></button>
                        <button type="submit" name="save_and_share" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & share link</i></button>
                        <button type="submit" name="save_and_new" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & New</i></button>
                        <button type="submit" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & Close</i></button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
    document.addEventListener('DOMContentLoaded', function() {

        var successMessage = '{{ session("success") }}';
        var billingId = '{{ session("billingId") }}';

        if (successMessage && billingId) {
            var url = '{{ route("view.billing", ":id") }}';
            url = url.replace(':id', billingId);
            var popupMessage = 'Billing data stored successfully. Please find the URL below:';

            document.getElementById('popupMessage').innerText = popupMessage;

            document.getElementById('urlInput').value = url;

            var modal = document.getElementById('myModal');
            modal.style.display = "block";

            var closeBtn = document.getElementsByClassName("close")[0];
            closeBtn.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
    });
</script>

<script>
    document.getElementById("copyIcon").addEventListener("click", function() {
        var urlInput = document.getElementById("urlInput");
        urlInput.select();
        document.execCommand("copy");
        document.getElementById("copyText").textContent = "Link copied!";
    });

</script>

<!-- script for add more consultant details -->
<script>
    $(document).ready(function() {
        // Add More Button Click Event
        $('#addSignatory10').on('click', function() {
            var signatoryAccordionCount = $('#signatoryAccordion10 .signaccordion-item10').length;

            var newSignAccordion = `
                <div class="accordion-item signaccordion-item10" id="signatoryEntry10${signatoryAccordionCount}">
                    <h2 class="accordion-header" id="signatoryHeading10${signatoryAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse10${signatoryAccordionCount}" aria-expanded="false" aria-controls="signatoryCollapse10${signatoryAccordionCount}">
                            Entry ${signatoryAccordionCount + 1}
                        </button>
                    </h2>
                    <div id="signatoryCollapse10${signatoryAccordionCount}" class="collapse" aria-labelledby="signatoryHeading10${signatoryAccordionCount}">
                        <div class="accordion-body">
                            <div class="row mb-2" id="signatoryDetailsContainer10">
                                <div class="col-lg-12" id="consultant_add_fields">
                                    <div class="row mb-2">
                                        <input type="hidden" name="billingProducts[${signatoryAccordionCount}][p_id]" value="">
                                        <div class="col-lg-4 spacing-right">
                                            Serial Number <br> <input class="form-control" name="billingProducts[${signatoryAccordionCount}][serial_no]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Types <br> <input class="form-control" name="billingProducts[${signatoryAccordionCount}][types]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Sizes <br> <input class="form-control" name="billingProducts[${signatoryAccordionCount}][sizes]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Quantity <br> <input class="form-control" name="billingProducts[${signatoryAccordionCount}][quantity]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left">
                                            Unit Price <br> <input class="form-control" name="billingProducts[${signatoryAccordionCount}][unit_price]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left">
                                            Tax <br> <input class="form-control" name="billingProducts[${signatoryAccordionCount}][tax]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left">
                                            Total <br> <input class="form-control" name="billingProducts[${signatoryAccordionCount}][total]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left">
                                            Remarks <br> <input class="form-control" name="billingProducts[${signatoryAccordionCount}][remarks]" type="text" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger removeSignAccordion10" type="button" style="width:10%; margin-left:13px;">
                            Remove
                        </button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion10').append(newSignAccordion);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion10', function() {
            $(this).closest('.signaccordion-item10').remove();
        });
    });
</script>
<!-- script for show data of consultant details in table -->
<script>
    $(document).ready(function() {
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable10() {
            // Clear existing rows
            $('#signatorySummaryTable10 tbody').empty();

            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item10').each(function(index) {
                var consaltant_name = $(this).find('[name="c_name[]"]').val();
                var desg = $(this).find('[name="c_desig[]"]').val();
                var org = $(this).find('[name="c_org[]"]').val();
                var cell_number = $(this).find('[name="c_cell[]"]').val();
                var email = $(this).find('[name="c_email[]"]').val();
                var comsaltant_fees = $(this).find('[name="c_fee[]"]').val();

                // Check if any relevant data is entered
                if (consaltant_name || desg || org || cell_number || email || comsaltant_fees) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable10 tbody').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${consaltant_name}</td>
                                <td>${desg}</td>
                                <td>${org}</td>
                                <td>${cell_number}</td>
                                <td>${email}</td>
                                <td>${comsaltant_fees}</td>
                                <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                                <!-- Add more columns as needed -->
                            </tr>
                        `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory10').on('click', function() {
            var signatoryEntryCount10 = $('#signatoryAccordion10 .signaccordion-item10').length + 1;

            var newSignatoryEntry10 = `
                    <!-- Your existing signatory accordion HTML goes here -->

                `;
            console.log('Adding signatory entry:', signatoryEntryCount10);
            $('#signatoryAccordion10').append(newSignatoryEntry10);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable10').on('click', function() {
            // Update the signatory summary table
            console.log("clicked save");
            updateSignatorySummaryTable10();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function() {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item10').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function() {
            $(this).closest('.signaccordion-item10').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable10();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory10').on('click', function(event) {
            event.preventDefault();
        });
    });
</script>
