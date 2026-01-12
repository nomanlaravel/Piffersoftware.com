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
        <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin-left: -20px;">  Campaign View
        </h4>
    </div>

    <section>

        <button class="mb-4" id="download-pdf">Download PDF</button>
        <button id="send-email">Send PDF via Email</button>
        <a href="https://web.whatsapp.com/send?text=Check%20out%20this%20link%3A%20" target="_blank"><button>Send via Whatsapp</button></a>


        <div id="emailModal" class="modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
            <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 40%; border-radius: 10px; text-align: center; margin-top:4%;">
            <span class="close" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; position: relative; left: 49%;" >&times;</span>
            <label for="emailInput">Email To:</label>
            <input type="email" id="emailInput" placeholder="Email">

            <label for="ccInput">CC Recipient:</label>
            <input type="email" id="ccInput" placeholder="Enter CC Recipient">

            <label for="bccInput">BCC Recipient:</label>
            <input type="email" id="bccInput" placeholder="Enter BCC Recipient">

            <label for="subjectInput">Subject:</label>
            <input type="text" id="subjectInput" placeholder="Subject">

            <label for="bodyInput">Body:</label>
            <textarea id="bodyInput" rows="8" placeholder="Body"></textarea>

            <button id="sendEmailBtn" class="mt-2" style="width: 20%; display: block; margin: 0 auto;">Send</button>
            </div>
        </div>
        <form id="campaign_form">
            <div class=" row main-content div">

                <div class="col-lg-12">
                    <div class="row mb-2">
                        <h5 style="font-weight: bold">Demand Raised By :</h5>
                        <div class="col-lg-4 spacing-right">
                            Campaign Number: : <br> <input class="form-control" readonly id="" name="campaign_number"
                                type="text" value="{{ $campaign->campaign_number }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Item Name : <br> <input class="form-control" readonly id="" name="do_date"
                                type="text" value="{{ $campaign->item_name }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Name  <br> <input class="form-control" readonly id="" name="do_number"
                                type="text" value="{{ $campaign->leader_name }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Employee No <br> <input class="form-control" readonly id="" name="po_date"
                                type="text" value="{{ $campaign->leader_employee_no }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Cell No  <br> <input class="form-control" readonly id="" name="po_number"
                                type="text" value="{{ $campaign->leader_cell_no }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Email ID <br> <input class="form-control" readonly id="" name="vendor_id"
                                type="text" value="{{ $campaign->leader_email_id }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right ">
                            Campaign Start Date  <br> <input class="form-control" readonly id="" name="name_of_bank"
                                type="date" value="{{ $campaign->start_date }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Campaign End Date  <br> <input class="form-control" readonly id="" name="poc_name"
                                type="date" value="{{ $campaign->end_date }}" placeholder="..." style="width: 100%;">
                        </div>
                        <h5 style="font-weight: bold; margin-top: 5px;">Reporting To:</h5>
                        <div class="col-lg-4 spacing-right">
                            Name: <br> <input class="form-control" readonly id="" name="address_of_bank"
                                type="text" value="{{ $campaign->reporting_to_name }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Designation: <br> <input class="form-control" readonly id="" value="{{ $campaign->reporting_to_desig }}" name="cell_number" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Cell No: <br> <input class="form-control" readonly id="" value="{{ $campaign->reporting_to_cell }}" name="title_of_account"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Email ID: <br> <input class="form-control" readonly id=""
                                name="office_number" value="{{ $campaign->reporting_to_email }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Notes: <br> <input class="form-control" readonly id="" name="account_number"
                                type="text" value="{{ $campaign->reporting_to_notes }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            <label>Attachment:</label><br>
                            @if($campaign->reporting_to_attach)
                                <img src="{{ asset('campaigns/' . $campaign->reporting_to_attach) }}" alt="Attachment Image" style="width: 100%; max-height: 300px; object-fit: cover;">
                            @else
                                <p>No image available</p>
                            @endif
                        </div>



                    </div>

                    <div class="row mb-2">
                        <h5 style="font-weight: bold">Tax Information :</h5>
                        <div class="col-lg-4 spacing-right">
                            Region: <br> <input class="form-control" readonly id="" value="{{ $campaign->region }}" name="location"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Quantity of Item Dispatched: <br> <input class="form-control" readonly id="" value="{{ $campaign->item_quantity }}" name="rec_cell_number"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Price of Per Item:  <br> <input class="form-control" readonly id="" value="{{ $campaign->item_price }}" name="rec_city" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Total Price: <br> <input class="form-control" readonly id="" value="{{ $campaign->item_total_price }}" name="rec_fax"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Segment: <br> <input class="form-control" readonly id="" value="{{ $campaign->segment }}" name="rec_office_number"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Dispatched To: <br> <input class="form-control" readonly id="" name="taxable"
                                type="text" value="{{ $campaign->dispatched_to }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Dispatched with Signature/Visiting Card of: <br> <input class="form-control" readonly id="" value="{{ $campaign->dispatched_signature }}" name="tax_rate" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            List of Address Recipient:    <br> <input class="form-control" readonly id="" value="{{ $campaign->list_of_address_attach }}" name="total_tax"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Notes:  <br> <input class="form-control" readonly id="" value="{{ $campaign->dispatched_to_notes }}" name="shipping_cost"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            <label>Attachment:</label><br>
                            @if($campaign->dispatched_to_attach)
                                <img src="{{ asset('campaigns/' . $campaign->dispatched_to_attach) }}" alt="Attachment Image" style="width: 100%; max-height: 300px; object-fit: cover;">
                            @else
                                <p>No image available</p>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-2">
                        <h5 style="font-weight: bold">Raised By :</h5>
                        <div class="col-lg-4 spacing-right">
                            Courier Name: <br> <input class="form-control" readonly id="" value="{{ $campaign->courier_name }}" name="raised_by_name"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Price Per Unit: <br> <input class="form-control" readonly id="" value="{{ $campaign->courier_price }}" name="raised_by_cell" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Quantity: <br> <input class="form-control" readonly id="" value="{{ $campaign->courier_quantity }}" name="raised_by_signature"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Total Estimated Cost: <br> <input class="form-control" readonly id="" value="{{ $campaign->courier_total_cost }}" name="vetted_by_name"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Total Cost Of Campaign: <br> <input class="form-control" readonly id="" value="{{ $campaign->compaign_cost }}" name="vetted_by_cell" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            No of Items Return:  <br> <input class="form-control" readonly id="" value="{{ $campaign->no_of_items_return }}" name="vetted_by_signature"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>

                        <div class="col-lg-4 spacing-right">
                            Reason of Items Return:  <br> <input class="form-control" readonly id="" value="{{ $campaign->reason_of_items_return }}" name="approved_by_name"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Item Return:  <br> <input class="form-control" readonly id="" value="{{ $campaign->items_return_attach }}" name="approved_by_cell" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Per Unit Return Cost: <br> <input class="form-control" readonly id="" value="{{ $campaign->items_return_cost }}" name="approved_by_signature"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>

                        <div class="col-lg-4 spacing-right">
                            Total Return Cost: <br> <input class="form-control" readonly id="" value="{{ $campaign->items_return_total_cost }}" name="approved_by_name"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <h5 style="font-weight: bold">Dispatched By :</h5>
                        <div class="col-lg-4 spacing-right">
                            Name:  <br> <input class="form-control" readonly id="" value="{{ $campaign->dispatch_by_name }}" name="approved_by_name"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Employee No: <br> <input class="form-control" readonly id="" value="{{ $campaign->dispatch_by_employee }}" name="approved_by_cell" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Designation: <br> <input class="form-control" readonly id="" value="{{ $campaign->dispatch_by_desig }}" name="approved_by_signature"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>

                        <div class="col-lg-4 spacing-right">
                            Department:  <br> <input class="form-control" readonly id="" value="{{ $campaign->dispatch_by_dept }}" name="vetted_by_cell" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Notes  <br> <input class="form-control" readonly id="" value="{{ $campaign->dispatch_by_notes }}" name="vetted_by_signature"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            <label>Attachment:</label><br>
                            @if($campaign->dispatch_by_attach)
                                <img src="{{ asset('campaigns/' . $campaign->dispatch_by_attach) }}" alt="Attachment Image" style="width: 100%; max-height: 300px; object-fit: cover;">
                            @else
                                <p>No image available</p>
                            @endif
                        </div>

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




<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const downloadButton = document.getElementById('download-pdf');
    const sendButton = document.getElementById('send-email');
    const modal = document.getElementById('emailModal');
    const closeModal = modal.querySelector('.close');
    const sendEmailBtn = modal.querySelector('#sendEmailBtn');

    if (downloadButton && sendButton) {
        downloadButton.addEventListener('click', function() {
            downloadPDF();
        });

        sendButton.addEventListener('click', function() {
            modal.style.display = "block";
        });

        closeModal.addEventListener('click', function() {
            modal.style.display = "none";
        });

        sendEmailBtn.addEventListener('click', function() {
            sendPDFViaEmail();
        });
    } else {
        console.error('Buttons not found.');
    }
});

function downloadPDF() {
    const button = document.getElementById('download-pdf');
    if (button) {
        button.textContent = 'System is Generating PDF';

        const element = document.getElementById('campaign_form');
        if (element) {
            const options = {
                margin: 1,
                filename: 'campaign_information.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf()
                .set(options)
                .from(element)
                .toPdf()
                .get('pdf')
                .then(function(pdf) {
                    console.log('PDF generated:', pdf);

                    pdf.save(options.filename);
                    button.textContent = 'PDF Generated!';
                })
                .catch(error => {
                    console.error('Error generating PDF:', error);
                    button.textContent = 'Failed to Generate PDF';
                });
        } else {
            console.error('Element with ID "campaign_form" not found.');
            button.textContent = 'Failed to Generate PDF';
        }
    } else {
        console.error('Button with ID "download-pdf" not found.');
    }
}

function sendPDFViaEmail() {
    const modal = document.getElementById('emailModal');
    const emailInput = document.getElementById('emailInput');
    const ccInput = document.getElementById('ccInput');
    const bccInput = document.getElementById('bccInput');
    const subjectInput = document.getElementById('subjectInput');
    const bodyInput = document.getElementById('bodyInput');
    const button = document.getElementById('send-email');

    if (modal && emailInput && button) {
        modal.style.display = "none";

        button.textContent = 'System is Sending Email ..';
        const email = emailInput.value;
        const cc = ccInput.value;
        const bcc = bccInput.value;
        const subject = subjectInput.value;
        const body = bodyInput.value;

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('email', email);
        formData.append('cc', cc);
        formData.append('bcc', bcc);
        formData.append('subject', subject);
        formData.append('body', body);

        // Generate PDF and send it via email
        const element = document.getElementById('campaign_form');
        if (element) {
            const options = {
                margin: 1,
                filename: 'campaign_information.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
            };
            html2pdf()
                .set(options)
                .from(element)
                .toPdf()
                .get('pdf')
                .then(function(pdf) {
                    console.log('PDF generated:', pdf);

                    formData.append('pdf', pdf.output('blob'));

                    fetch('/public/send-pdf-email/campaign', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.text())  // Get the response as text
                        .then(data => {
                            console.log('Response data:', data);  // Log the full response
                            try {
                                const jsonData = JSON.parse(data);  // Try to parse as JSON
                                if (jsonData.message === 'Email sent successfully!') {
                                    button.textContent = 'Email Sent!';
                                } else {
                                    throw new Error('Failed to send email: ' + jsonData.message);
                                }
                            } catch (error) {
                                console.error('Error parsing JSON:', error);
                                button.textContent = 'Failed to Send Email';
                            }
                        })
                        .catch(error => {
                            console.error('Error sending email:', error);
                            button.textContent = 'Failed to Send Email';
                        });

                })
                .catch(error => {
                    console.error('Error generating PDF:', error);
                    button.textContent = 'Failed to Generate PDF';
                });
        } else {
            console.error('Element with ID "campaign_information" not found.');
            button.textContent = 'Failed to Generate PDF';
        }
    } else {
        console.error('Modal or input fields not found.');
    }
}
</script>
