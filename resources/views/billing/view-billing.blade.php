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
            <input type="email" id="ccInput" placeholder=" Enter CC Recipient">

            <label for="bccInput">BCC Recipient:</label>
            <input type="email" id="bccInput" placeholder="Enter BCC Recipient">

            <label for="subjectInput">Subject:</label>
            <input type="text" id="subjectInput" placeholder="Subject">

            <label for="bodyInput">Body:</label>
            <textarea id="bodyInput" rows="8" placeholder="Body"></textarea>

            <button id="sendEmailBtn" class="mt-2" style="width: 20%; display: block; margin: 0 auto;">Send</button>
            </div>
        </div>
        <form id="billing_form">
            <div class=" row main-content div">

                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                            Vendor : <br> <input class="form-control" readonly id="" value="{{ $billing->vendor }}" name="vendor"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            PO Number <br> <input class="form-control" readonly id="" value="{{ $billing->po_number }}" name="po_number"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Bill Date <br> <input class="form-control" readonly id="" value="{{ $billing->bill_date }}" name="bill_date"
                                type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Bill Number <br> <input class="form-control" readonly id="" value="{{ $billing->bill_number }}" name="bill_number"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Payment Terms <br> <input class="form-control" readonly id="" value="{{ $billing->payment_terms }}" name="payment_terms"
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
                                        aria-expanded="true" aria-controls="signatoryCollapse10{{ $index }}">
                                        Entry {{ $index + 1 }}
                                    </button>
                                </h2>
                                <div id="signatoryCollapse10{{ $index }}" class="collapse show" aria-labelledby="signatoryHeading10{{ $index }}">
                                    <div class="accordion-body">
                                        <div class="row mb-2" id="signatoryDetailsContainer10">
                                            <div class="col-lg-12" id="consultant_add_fields">
                                                <div class="row mb-2">
                                                    <input type="hidden" name="billingProducts[{{ $index }}][p_id]" value="{{ $product->id }}">
                                                    <div class="col-lg-4 spacing-right">
                                                        Serial Number <br> <input class="form-control" readonly name="billingProducts[{{ $index }}][serial_no]" value="{{ $product->serial_no }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left spacing-right">
                                                        Types <br> <input class="form-control" readonly name="billingProducts[{{ $index }}][types]" value="{{ $product->types }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Sizes <br> <input class="form-control" readonly name="billingProducts[{{ $index }}][sizes]" value="{{ $product->sizes }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-right">
                                                        Quantity <br> <input class="form-control" readonly name="billingProducts[{{ $index }}][quantity]" value="{{ $product->quantity }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Unit Price <br> <input class="form-control" readonly name="billingProducts[{{ $index }}][unit_price]" value="{{ $product->unit_price }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Tax <br> <input class="form-control" readonly name="billingProducts[{{ $index }}][tax]" value="{{ $product->tax }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Total <br> <input class="form-control" readonly name="billingProducts[{{ $index }}][total]" value="{{ $product->total }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-4 spacing-left">
                                                        Remarks <br> <input class="form-control" readonly name="billingProducts[{{ $index }}][remarks]" value="{{ $product->remarks }}" type="text" placeholder="..." style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
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
                            Bank Name <br> <input class="form-control" readonly id="" value="{{ $billing->bank_name }}" name="bank_name"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Cheque Number <br> <input class="form-control" readonly id="" value="{{ $billing->cheque_number }}" name="cheque_number"
                                type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Instrument Number <br> <input class="form-control" readonly id="" value="{{ $billing->ins_number }}" name="ins_number" type="text"
                                placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                            Attachments <br> <input class="form-control" readonly id="" name="attachments" type="text"
                                placeholder="..." style="width: 100%;">
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

        const element = document.getElementById('billing_form');
        if (element) {
            const options = {
                margin: 1,
                filename: 'billing_information.pdf',
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
        const element = document.getElementById('billing_form');
        if (element) {
            const options = {
                margin: 1,
                filename: 'billing_information.pdf',
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

                    fetch('/public/send-pdf-email', {
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
            console.error('Element with ID "billing_information" not found.');
            button.textContent = 'Failed to Generate PDF';
        }
    } else {
        console.error('Modal or input fields not found.');
    }
}
</script>
