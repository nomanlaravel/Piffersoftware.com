@include('layouts.header')

@yield('main')

<div class="customer_form">
  @include('headerlogout')
    <div class="modal-header border-0">
        <div style="display:flex; column-gap:10px; align-items:center">
                    <button type="button" class="btn btn-link" onclick="history.back()">
                     <i class="bi bi-arrow-left"></i>
                    </button>
            <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin-left: -20px;">Edit Campaign
        </h4>

    </div>


    </div>

    <section>
        <form id="campaign_form" method="POST" action="{{ route('campaign.update', ['id' => $campaign->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class=" row main-content div">

                <div class="col-lg-12">
                    <div class="row mb-2">
                        <h5 style="font-weight: bold">Demand Raised By :</h5>
                        <div class="col-lg-4 spacing-right">
                            Item Name : <br> <input class="form-control"  id="" name="campaign_number"
                                type="text" value="{{ $campaign->campaign_number }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Item Name : <br> <input class="form-control"  id="" name="item_name"
                                type="text" value="{{ $campaign->item_name }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Name  <br> <input class="form-control"  id="" name="leader_name"
                                type="text" value="{{ $campaign->leader_name }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Employee No <br> <input class="form-control"  id="" name="leader_employee_no"
                                type="text" value="{{ $campaign->leader_employee_no }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Cell No  <br> <input class="form-control"  id="" name="leader_cell_no"
                                type="text" value="{{ $campaign->leader_cell_no }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Email ID <br> <input class="form-control"  id="" name="leader_email_id"
                                type="text" value="{{ $campaign->leader_email_id }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right ">
                            Campaign Start Date  <br> <input class="form-control"  id="" name="start_date"
                                type="date" value="{{ $campaign->start_date }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Campaign End Date  <br> <input class="form-control"  id="" name="end_date"
                                type="date" value="{{ $campaign->end_date }}" placeholder="..." style="width: 100%;">
                        </div>
                        <h5 style="font-weight: bold; margin-top: 5px;">Reporting To:</h5>
                        <div class="col-lg-4 spacing-right">
                            Name: <br> <input class="form-control"  id="" name="reporting_to_name"
                                type="text" value="{{ $campaign->reporting_to_name }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Designation: <br> <input class="form-control"  id="" value="{{ $campaign->reporting_to_desig }}" name="reporting_to_desig" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Cell No: <br> <input class="form-control"  id="" value="{{ $campaign->reporting_to_cell }}" name="reporting_to_cell"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Email ID: <br> <input class="form-control"  id=""
                                name="reporting_to_email" value="{{ $campaign->reporting_to_email }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Notes: <br> <input class="form-control"  id="" name="reporting_to_notes"
                                type="text" value="{{ $campaign->reporting_to_notes }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Attachment:<br> <input class="form-control"  id="" value="{{ $campaign->reporting_to_attach }}" name="reporting_to_attach" type="file"
                                placeholder="..." style="width: 100%;">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <h5 style="font-weight: bold">Tax Information :</h5>
                        <div class="col-lg-4 spacing-right">
                            Region: <br> <input class="form-control"  id="" value="{{ $campaign->region }}" name="region"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Quantity of Item Dispatched: <br> <input class="form-control"  id="" value="{{ $campaign->item_quantity }}" name="item_quantity"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Price of Per Item:  <br> <input class="form-control"  id="" value="{{ $campaign->item_price }}" name="item_price" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Total Price: <br> <input class="form-control"  id="" value="{{ $campaign->item_total_price }}" name="item_total_price"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Segment: <br> <input class="form-control"  id="" value="{{ $campaign->segment }}" name="segment"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Dispatched To: <br> <input class="form-control"  id="" name="dispatched_to"
                                type="text" value="{{ $campaign->dispatched_to }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Dispatched with Signature/Visiting Card of: <br> <input class="form-control"  id="" value="{{ $campaign->dispatched_signature }}" name="dispatched_signature" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            List of Address Recipient:    <br> <input class="form-control"  id="" value="{{ $campaign->list_of_address_attach }}" name="list_of_address_attach"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Notes:  <br> <input class="form-control"  id="" value="{{ $campaign->dispatched_to_notes }}" name="dispatched_to_notes"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Attachment: <br> <input class="form-control"  id="" value="{{ $campaign->dispatched_to_attach }}" name="dispatched_to_attach" type="file"
                                placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <h5 style="font-weight: bold">Raised By :</h5>
                        <div class="col-lg-4 spacing-right">
                            Courier Name: <br> <input class="form-control"  id="" value="{{ $campaign->courier_name }}" name="courier_name"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Price Per Unit: <br> <input class="form-control"  id="" value="{{ $campaign->courier_price }}" name="courier_price" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Quantity: <br> <input class="form-control"  id="" value="{{ $campaign->courier_quantity }}" name="courier_quantity"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Total Estimated Cost: <br> <input class="form-control"  id="" value="{{ $campaign->courier_total_cost }}" name="courier_total_cost"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Total Cost Of Campaign: <br> <input class="form-control"  id="" value="{{ $campaign->compaign_cost }}" name="compaign_cost" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            No of Items Return:  <br> <input class="form-control"  id="" value="{{ $campaign->no_of_items_return }}" name="no_of_items_return"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>

                        <div class="col-lg-4 spacing-right">
                            Reason of Items Return:  <br> <input class="form-control"  id="" value="{{ $campaign->reason_of_items_return }}" name="reason_of_items_return"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Item Return:  <br> <input class="form-control"  id="" value="{{ $campaign->items_return_attach }}" name="items_return_attach" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Per Unit Return Cost: <br> <input class="form-control"  id="" value="{{ $campaign->items_return_cost }}" name="items_return_cost"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Total Return Cost: <br> <input class="form-control"  id="" value="{{ $campaign->items_return_total_cost }}" name="items_return_total_cost"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <h5 style="font-weight: bold">Dispatched By :</h5>
                        <div class="col-lg-4 spacing-right">
                            Name:  <br> <input class="form-control"  id="" value="{{ $campaign->dispatch_by_name }}" name="dispatch_by_name"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Employee No: <br> <input class="form-control"  id="" value="{{ $campaign->dispatch_by_employee }}" name="dispatch_by_employee" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Designation: <br> <input class="form-control"  id="" value="{{ $campaign->dispatch_by_desig }}" name="dispatch_by_desig"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>

                        <div class="col-lg-4 spacing-right">
                            Department:  <br> <input class="form-control"  id="" value="{{ $campaign->dispatch_by_dept }}" name="dispatch_by_dept" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Notes  <br> <input class="form-control"  id="" value="{{ $campaign->dispatch_by_notes }}" name="dispatch_by_notes"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>

                        <div class="col-lg-4 spacing-right">
                            Attachments   <br> <input class="form-control"  id="" value="{{ $campaign->dispatch_by_attach }}" name="dispatch_by_attach"
                                type="file" placeholder="..." style="width: 100%;">
                        </div>

                                    <div class="col-lg-4  mt-2">
                                        <label for="send_count">Send Count:</label>
                                        <input id="send_count" class="form-control" name="send_count" type="text"  placeholder="..."  value="{{ $campaign->send_count }}"  />
                                    </div>
                                    <div class="col-lg-4  mt-2">
                                        <label for="send_count">Received BY:</label>
                                        <input class="form-control" name="received_by" type="text" placeholder="..."  value="{{ $campaign->received_by }}" />
                                    </div>
                                    <div class="col-lg-4  mt-2">
                                        <label for="send_count">Opened By:</label>
                                        <input class="form-control" name="opended_by" type="text" placeholder="..." value="{{ $campaign->opended_by }}" />
                                    </div>


                    </div>
                </div>

            </div>
            <button type="submit"  class="btn btn-primary float-end mt-4">Submit</button>
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

        const element = document.getElementById('purchase_form');
        if (element) {
            const options = {
                margin: 1,
                filename: 'purchase_information.pdf',
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
            console.error('Element with ID "purchase_form" not found.');
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

                    fetch('/send-pdf-email/campaign', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => {
                            console.log('Response status:', response.status);
                            console.log('Response status text:', response.statusText);
                            return response.json();
                        })
                        .then(data => {
                            console.log('Response data:', data);
                            if (data.message === 'Email sent successfully!') {
                                button.textContent = 'Email Sent!';
                            } else {
                                throw new Error('Failed to send email: ' + data.message);
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
