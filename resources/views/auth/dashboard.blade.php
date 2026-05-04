@include('layouts.header')

@yield('main')

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
    <a href="{{ url('logout') }}"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
</div>

<h3 style="font-weight: 700; margin-left: 580px;">Piffers Security Services (PVT) LTD.</h3>


<div class="row head-heading" style="margin-top: 5%; margin-bottom: 5%; color: rgb(112, 0, 193);">
    <div class="col-lg-3">
        <h5> <a href=""> Get Things Done </a> </h5>
    </div>
    <div class="col-lg-3">
        <h5> <a href=""> Bussiness Overview </a> </h5>
    </div>
    <div class="col-lg-3">
        <h5> <a href=""> Customize Overview </a> </h5>
    </div>
    <div class="col-lg-3">
        <h5>
            <button type="button" data-toggle="modal" data-target="#composerEmail"
                class="btn btn-primary shadow px-3 py-2">Compose Email</button>
            <button type="button" onclick="startBulkWhatsApp()" class="btn btn-primary shadow px-3 py-2">
                <i class="bi bi-whatsapp mr-1"></i> Send WhatsApp Survey (All)
            </button>
        </h5>
    </div>
</div>

<!-- Notification Alerts -->
<div class="container" style="max-width: 1200px; margin: 0 auto;">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"
            style="border-radius: 8px; border-left: 4px solid #28a745; box-shadow: 0 2px 8px rgba(40, 167, 69, 0.2);">
            <i class="bi bi-check-circle-fill mr-2"></i>
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert"
            style="border-radius: 8px; border-left: 4px solid #ffc107; box-shadow: 0 2px 8px rgba(255, 193, 7, 0.2); white-space: pre-line;">
            <i class="bi bi-exclamation-triangle-fill mr-2"></i>
            <strong>Warning!</strong> {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert"
            style="border-radius: 8px; border-left: 4px solid #dc3545; box-shadow: 0 2px 8px rgba(220, 53, 69, 0.2);">
            <i class="bi bi-x-circle-fill mr-2"></i>
            <strong>Error!</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>

<!-- Compose Email Modal -->
<div class="modal fade" id="composerEmail" tabindex="-1" role="dialog" aria-labelledby="composerEmailLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 10px 40px rgba(0,0,0,0.15);">

            <form action="{{ route('customer.email.send') }}" method="POST" enctype="multipart/form-data"
                id="composeEmailForm">
                @csrf

                <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                           border-radius: 12px 12px 0 0; padding: 1.5rem; border: none;">
                    <h5 class="modal-title text-white" id="composerEmailLabel"
                        style="font-weight: 600; font-size: 1.25rem;">
                        <i class="bi bi-envelope-fill mr-2"></i>Compose Email
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"
                        style="opacity: 1; text-shadow: none;">
                        <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
                    </button>
                </div>

                <div class="modal-body" style="padding: 2rem; background-color: #f8f9fa;">

                    <!-- Recipients -->
                    <div class="form-group">
                        <label class="font-weight-bold"
                            style="color: #333; font-size: 0.95rem; margin-bottom: 0.75rem;">
                            <i class="bi bi-people-fill mr-2" style="color: #667eea;"></i>Select Recipients
                        </label>

                        <div class="custom-dropdown-container" style="position: relative;">

                            <div class="custom-dropdown-header" id="customDropdownHeader"
                                style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 12px 16px;
                                       cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                                <span id="selectedCount" style="color: #666;">Select customers...</span>
                                <i class="bi bi-chevron-down" id="dropdownIcon"
                                    style="transition: transform 0.3s ease; color: #667eea;"></i>
                            </div>

                            <div class="custom-dropdown-menu" id="customDropdownMenu" style="position: absolute; top: 100%; left: 0; right: 0; background: white;
                                       border: 2px solid #667eea; border-radius: 8px; margin-top: 8px; z-index: 1000;
                                       box-shadow: 0 8px 24px rgba(102, 126, 234, 0.15);">

                                <!-- Search & Filter -->
                                <div
                                    style="padding: 12px; border-bottom: 1px solid #e0e0e0; background-color: #fcfcfc;">
                                    <div class="row no-gutters">
                                        <div class="col-3 pr-1">
                                            <select id="regionFilter" class="form-control form-control-sm"
                                                style="border: 1px solid #e0e0e0; border-radius: 6px; font-size: 0.8rem; padding: 0 5px;">
                                                <option value="">All Regions</option>
                                                @if(isset($regions))
                                                    @foreach($regions as $region)
                                                        <option value="{{ $region }}">{{ $region }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-3 pr-1">
                                            <select id="statusFilter" class="form-control form-control-sm"
                                                style="border: 1px solid #e0e0e0; border-radius: 6px; font-size: 0.8rem; padding: 0 5px;">
                                                <option value="">All Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-3 pr-1">
                                            <select id="prospectFilter" class="form-control form-control-sm">
                                                <option value="">Select Prospect</option>
                                                <option value="prospect">Prospects</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <input type="text" id="customerSearch" class="form-control form-control-sm"
                                                placeholder="Search name/email..."
                                                style="border: 1px solid #e0e0e0; border-radius: 6px; font-size: 0.8rem;">
                                        </div>
                                    </div>
                                </div>

                                <!-- Select All -->
                                <div class="customer-option select-all-option" style="padding: 12px 16px; border-bottom: 2px solid #667eea;
                                           background: linear-gradient(to right, #f0f4ff, #ffffff); cursor: pointer;">
                                    <label style="display: flex; align-items: center; margin: 0; cursor: pointer;">
                                        <input type="checkbox" id="selectAllCustomers"
                                            style="width: 18px; height: 18px; margin-right: 12px; accent-color: #667eea;">
                                        <span style="font-weight: 600; color: #667eea;">
                                            <i class="bi bi-check-all mr-1"></i>Select All Customers
                                        </span>
                                    </label>
                                </div>

                                <!-- Customers List -->
                                <div id="customerList">
                                    @if(isset($customers) && count($customers) > 0)
                                        @foreach($customers as $customer)
                                            <div class="customer-option" data-email="{{ strtolower($customer->email) }}"
                                                data-name="{{ strtolower($customer->customers_name) }}"
                                                data-region="{{ $customer->customers_region }}"
                                                data-active="{{ $customer->customers_activation_check }}"
                                                data-payment="{{ $customer->payment }}"
                                                style="padding: 10px 16px; border-bottom: 1px solid #f0f0f0; cursor: pointer;">
                                                <label style="display: flex; align-items: center; margin: 0; cursor: pointer;">
                                                    <input type="checkbox" name="customers[]" value="{{ $customer->id }}"
                                                        class="customer-checkbox"
                                                        style="width: 18px; height: 18px; margin-right: 12px; accent-color: #667eea;">
                                                    <span style="color: #333; font-size: 0.9rem;">
                                                        {{$customer->customers_name}} - {{ $customer->email }}
                                                    </span>
                                                </label>
                                            </div>
                                        @endforeach
                                    @else
                                        <div style="padding: 20px; text-align: center; color: #999;">
                                            <i class="bi bi-inbox"
                                                style="font-size: 2rem; display: block; margin-bottom: 8px;"></i>
                                            No customers found
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- IMPORTANT hidden flag -->
                        <input type="hidden" name="send_to_all" id="sendToAllInput" value="0">
                        <!-- Excluded customers container (dynamic hidden inputs) -->
                        <div id="excludedCustomersContainer"></div>

                    </div>

                    <!-- Subject -->
                    <div class="form-group">
                        <label for="emailSubject" class="font-weight-bold"
                            style="color: #333; font-size: 0.95rem; margin-bottom: 0.75rem;">
                            <i class="bi bi-tag-fill mr-2" style="color: #667eea;"></i>Subject
                        </label>
                        <input type="text" class="form-control" id="emailSubject" name="email_subject"
                            placeholder="Enter email subject" required value="{{ old('email_subject') }}">
                    </div>

                    <!-- Message -->
                    <div class="form-group">
                        <label for="emailMessage" class="font-weight-bold"
                            style="color: #333; font-size: 0.95rem; margin-bottom: 0.75rem;">
                            <i class="bi bi-chat-text-fill mr-2" style="color: #667eea;"></i>Message
                        </label>
                        <textarea class="form-control" id="emailMessage" name="email_message" rows="6"
                            placeholder="Write your message here..." style="text-align: left;"
                            required>{{ old('email_message') }}</textarea>
                    </div>

                    <!-- Attachments -->
                    <div class="form-group">
                        <label class="font-weight-bold">
                            <i class="bi bi-paperclip mr-2" style="color: #667eea;"></i>Attachments (optional)
                        </label>
                        <div class="custom-file mb-2">
                            <input type="file" class="custom-file-input" id="emailAttachments" name="emailAttachments[]"
                                multiple>
                            <label class="custom-file-label" id="attachmentsLabel" for="emailAttachments">Choose
                                files...</label>
                        </div>
                        <div id="fileListContainer" class="d-flex flex-wrap mt-2" style="gap: 8px;">
                            <!-- File badges will appear here -->
                        </div>
                        <small class="text-muted"><i class="bi bi-info-circle mr-1"></i>You can select multiple files at
                            once.</small>
                    </div>
                </div>

                <div class="modal-footer"
                    style="background-color: #f8f9fa; border-top: 1px solid #e0e0e0; padding: 1.25rem 2rem; border-radius: 0 0 12px 12px;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="bi bi-x-circle mr-1"></i>Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-send-fill mr-1"></i>Send Email
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- WhatsApp Floating Toast Notification (Non-blocking) -->
<div id="whatsappToast" style="display: none; position: fixed; bottom: 20px; right: 20px; width: 350px; background: white; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); z-index: 9999; border-left: 5px solid #25D366; overflow: hidden; transition: transform 0.3s ease-out;">
    <div style="padding: 15px; display: flex; align-items: center; justify-content: space-between; background: #f8f9fa; border-bottom: 1px solid #eee;">
        <span style="font-weight: 700; color: #333;"><i class="bi bi-whatsapp mr-2" style="color: #25D366;"></i> WhatsApp Survey</span>
        <button type="button" onclick="$('#whatsappToast').fadeOut()" style="border: none; background: none; color: #999; cursor: pointer;">&times;</button>
    </div>
    <div style="padding: 20px;">
        <div id="waToastText" style="margin-bottom: 12px; font-weight: 600; color: #444; font-size: 0.9rem;">
            Initializing...
        </div>
        <div class="progress" style="height: 10px; border-radius: 5px; background-color: #e9ecef; margin-bottom: 10px;">
            <div id="waToastBar" class="progress-bar progress-bar-striped progress-bar-animated" 
                 role="progressbar" style="width: 0%; background-color: #25D366;"></div>
        </div>
        <div id="waToastDetail" style="font-size: 0.75rem; color: #777;">
            Sent: <span id="waSentCount">0</span> | Remaining: <span id="waRemainingCount">0</span>
        </div>
    </div>
</div>

            <h4>Tasks</h4>
            <h6 style="color: grey; margin-left: 255px;">We found email for sales transactions</h6>
            <h5 style="color: grey; font-weight: 700; margin-top: 5%;">
                Shorts
            </h5>
            <div class="row">
                <div class="col-lg-2">
                    <img src="dashboard/pic1.png" style="width:100%; height:70%;" alt=""> <br>
                    <p>Report a Non Account holder</p>
                </div>
                <div class="col-lg-2">
                    <img src="dashboard/pic2.png" style="width:100%; height:70%;" alt=""> <br>
                    <p>Guard without Nadra verification</p>
                </div>
                <div class="col-lg-2">
                    <img src="dashboard/pic3.png" style="width:100%; height:70%;" alt=""> <br>
                    <p>Guard without Police verification</p>
                </div>
                <div class="col-lg-2">
                    <img src="dashboard/pic4.png" style="width:100%; height:70%;" alt=""> <br>
                    <p>Guard without accounts</p>
                </div>
                <div class="col-lg-2">
                    <img src="dashboard/pic5.png" style="width:100%; height:70%;" alt=""> <br>
                    <p>Report a non account holders</p>
                </div>
            </div>

        </div>
        <!--Customer form ends here-->
    </div>


    <style>
        .custom-dropdown-menu {
            visibility: hidden;
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: opacity 0.3s ease, max-height 0.3s ease, visibility 0.3s;
        }

        .custom-dropdown-menu.show {
            visibility: visible;
            opacity: 1;
            max-height: 350px;
            overflow-y: auto;
        }

        .custom-dropdown-header.active #dropdownIcon {
            transform: rotate(180deg);
        }

        .customer-option:hover {
            background-color: #f0f4ff !important;
        }

        /* CKEditor Custom Styling */
        .ck-editor__editable_inline {
            min-height: 200px;
            border-bottom-left-radius: 8px !important;
            border-bottom-right-radius: 8px !important;
            text-align: left !important;
        }

        .ck-editor__editable_inline p,
        .ck-editor__editable_inline h1,
        .ck-editor__editable_inline h2,
        .ck-editor__editable_inline h3,
        .ck-editor__editable_inline h4,
        .ck-editor__editable_inline li,
        .ck-editor__editable_inline blockquote {
            text-align: left !important;
            margin-bottom: 0.5em !important;
        }

        .ck-editor__top {
            border-top-left-radius: 8px !important;
            border-top-right-radius: 8px !important;
        }
    </style>

    <script>
        let emailEditor;

        document.addEventListener('DOMContentLoaded', function () {

            // Initialize CKEditor
            ClassicEditor
                .create(document.querySelector('#emailMessage'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                    placeholder: 'Write your message here...'
                })
                .then(editor => {
                    emailEditor = editor;

                    // Remove required to prevent 'An invalid form control with name="email_message" is not focusable' error
                    const textarea = document.querySelector('#emailMessage');
                    if (textarea.hasAttribute('required')) {
                        textarea.removeAttribute('required');
                    }
                })
                .catch(error => {
                    console.error(error);
                });


            if (typeof jQuery === 'undefined') {
                console.error('jQuery is not loaded!');
                return;
            }

            const $ = jQuery;

            const dropdownHeader = $('#customDropdownHeader');
            const dropdownMenu = $('#customDropdownMenu');

            const selectAllCheckbox = $('#selectAllCustomers');
            const customerCheckboxes = $('.customer-checkbox');

            const selectedCountSpan = $('#selectedCount');
            const customerSearch = $('#customerSearch');
            const regionFilter = $('#regionFilter');
            const statusFilter = $('#statusFilter');

            const sendToAllInput = $('#sendToAllInput');
            const excludedContainer = $('#excludedCustomersContainer');
            const prospectFilter = $('#prospectFilter');

            let excludedCustomers = new Set();

            // ✅ Toggle dropdown
            dropdownHeader.on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                dropdownMenu.toggleClass('show');
                dropdownHeader.toggleClass('active');
            });

            // ✅ Close dropdown outside
            $(document).on('click', function (e) {
                if (!$(e.target).closest('.custom-dropdown-container').length) {
                    dropdownMenu.removeClass('show');
                    dropdownHeader.removeClass('active');
                }
            });

            // ✅ Search, Region, and Status Filter
            function filterCustomers() {
                const searchTerm = customerSearch.val().toLowerCase();
                const selectedRegion = regionFilter.val();
                const selectedStatus = statusFilter.val();
                const prospectOnly = prospectFilter.val() === 'prospect';

                $('#customerList .customer-option').each(function () {
                    const email = String($(this).data('email') || "");
                    const name = String($(this).data('name') || "");
                    const region = String($(this).data('region') || "");
                    const status = String($(this).data('active') !== undefined ? $(this).data('active') : "");
                    const payment = Number($(this).data('payment')); // 🔹 convert to number

                    const matchesSearch = email.includes(searchTerm) || name.includes(searchTerm);
                    const matchesRegion = selectedRegion === "" || region === selectedRegion;
                    const matchesStatus = selectedStatus === "" || status === selectedStatus;
                    const matchesProspect = !prospectOnly || payment === 0; // 🔹 strict comparison

                    $(this).toggle(matchesSearch && matchesRegion && matchesStatus && matchesProspect);
                });
            }
            customerSearch.on('keyup', filterCustomers);
            regionFilter.on('change', filterCustomers);
            statusFilter.on('change', filterCustomers);
            prospectFilter.on('change', filterCustomers);

            // ✅ Select All
            selectAllCheckbox.on('change', function () {
                const isChecked = $(this).prop('checked');

                excludedCustomers.clear();
                excludedContainer.empty();

                if (isChecked) {
                    // ✅ Enable select-all mode
                    sendToAllInput.val('1');

                    // ✅ Check all visually
                    customerCheckboxes.prop('checked', true);

                    // ✅ CRITICAL FIX:
                    // remove name attribute so customers[] DOES NOT SUBMIT
                    customerCheckboxes.each(function () {
                        $(this).data('original-name', $(this).attr('name')); // store original
                        $(this).removeAttr('name');
                    });

                } else {
                    // ✅ Disable select-all mode
                    sendToAllInput.val('0');

                    // ✅ Uncheck all
                    customerCheckboxes.prop('checked', false);

                    // ✅ Restore name attribute so manual selection submits customers[]
                    customerCheckboxes.each(function () {
                        const originalName = $(this).data('original-name') || 'customers[]';
                        $(this).attr('name', originalName);
                    });
                }

                updateSelectedCount();
            });

            // ✅ Individual checkbox click
            customerCheckboxes.on('change', function () {
                const customerId = $(this).val();
                const isChecked = $(this).prop('checked');

                // ✅ If select all mode
                if (sendToAllInput.val() === '1') {
                    // unchecked => excluded
                    if (!isChecked) excludedCustomers.add(customerId);
                    else excludedCustomers.delete(customerId);

                    renderExcludedInputs();
                    updateSelectedCount();
                    return;
                }

                // ✅ Manual selection mode
                selectAllCheckbox.prop('checked', false);
                updateSelectedCount();
            });

            function renderExcludedInputs() {
                excludedContainer.empty();

                excludedCustomers.forEach(id => {
                    excludedContainer.append(
                        `<input type="hidden" name="excluded_customers[]" value="${id}">`
                    );
                });
            }

            function updateSelectedCount() {
                const total = customerCheckboxes.length;

                if (sendToAllInput.val() === '1') {
                    const excludedCount = excludedCustomers.size;
                    const selectedCount = total - excludedCount;

                    selectedCountSpan
                        .html(`<i class="bi bi-check-all mr-1"></i>All customers (${selectedCount}/${total}) — Excluded: ${excludedCount}`)
                        .css('color', '#667eea');
                    return;
                }

                const checked = customerCheckboxes.filter(':checked').length;

                if (checked === 0) {
                    selectedCountSpan.text('Select customers...').css('color', '#666');
                } else {
                    selectedCountSpan
                        .html(`<i class="bi bi-check2 mr-1"></i>${checked} customer(s) selected`)
                        .css('color', '#667eea');
                }
            }

            // ✅ Attachments handling (Multiple)
            const attachmentsInput = $('#emailAttachments');
            const attachmentsLabel = $('#attachmentsLabel');
            const fileListContainer = $('#fileListContainer');

            attachmentsInput.on('change', function () {
                const files = this.files;
                fileListContainer.empty();

                if (files.length === 0) {
                    attachmentsLabel.html('Choose files...');
                    return;
                }

                attachmentsLabel.html(`${files.length} file(s) selected`);

                Array.from(files).forEach((file, index) => {
                    const fileSize = (file.size / 1024).toFixed(1); // KB
                    const badge = $(`
                <div class="badge badge-light border p-2 d-flex align-items-center" style="font-weight: 500; color: #555; background: #fff;">
                    <i class="bi bi-file-earmark-check mr-2" style="color: #28a745;"></i>
                    <span class="text-truncate" style="max-width: 150px;">${file.name}</span>
                    <span class="ml-2 text-muted" style="font-size: 0.75rem;">(${fileSize} KB)</span>
                </div>
            `);
                    fileListContainer.append(badge);
                });
            });

            // ✅ Reset modal
            $('#composerEmail').on('hidden.bs.modal', function () {
                $('#composeEmailForm')[0].reset();

                customerCheckboxes.prop('checked', false);
                selectAllCheckbox.prop('checked', false);

                // restore names always
                customerCheckboxes.each(function () {
                    $(this).attr('name', 'customers[]');
                });

                sendToAllInput.val('0');
                excludedCustomers.clear();
                excludedContainer.empty();

                updateSelectedCount();
                customerSearch.val('');
                regionFilter.val('');
                statusFilter.val('');
                $('#customerList .customer-option').show();
                attachmentsLabel.html('Choose files...');
                fileListContainer.empty();

                // Reset CKEditor
                if (emailEditor) {
                    emailEditor.setData('');
                }
            });



            updateSelectedCount();

            // Sync CKEditor data before submission
            $('#composeEmailForm').on('submit', function () {
                if (emailEditor) {
                    document.querySelector('#emailMessage').value = emailEditor.getData();
                }
            });

            // Debug submit
            $('#composeEmailForm').on('submit', function () {
                const formData = new FormData(this);
                console.log('--- SUBMIT ---');
                console.log('send_to_all:', formData.get('send_to_all'));
                console.log('customers[]:', formData.getAll('customers[]'));
                console.log('excluded_customers[]:', formData.getAll('excluded_customers[]'));
                console.log('subject:', formData.get('email_subject'));

                // Final sync before submit
                if (emailEditor) {
                    formData.set('email_message', emailEditor.getData());
                }
                console.log('message:', formData.get('email_message'));
            });


        });

        function startBulkWhatsApp() {
            if (!confirm('Are you sure you want to send the WhatsApp Survey to ALL customers? The process will run in the background of this page.')) {
                return;
            }

            $('#whatsappToast').fadeIn();
            sendWhatsAppBatch(0);
        }

        function sendWhatsAppBatch(offset) {
            $.ajax({
                url: "{{ route('admin.whatsapp.send_batch') }}",
                method: 'POST',
                data: {
                    offset: offset,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    let progress = Math.round((response.next_offset / response.total) * 100);
                    if (progress > 100) progress = 100;

                    let remaining = response.total - response.next_offset;
                    if (remaining < 0) remaining = 0;

                    $('#waToastBar').css('width', progress + '%');
                    $('#waToastText').text(`Sending surveys... ${progress}%`);
                    $('#waSentCount').text(response.next_offset);
                    $('#waRemainingCount').text(remaining);

                    // Show toast alert every 50 customers (every batch)
                    if (typeof toastr !== 'undefined') {
                        toastr.info(`Sent to ${response.next_offset} customers. ${remaining} remaining.`, 'WhatsApp Survey Progress');
                    }

                    if (!response.is_finished) {
                        sendWhatsAppBatch(response.next_offset);
                    } else {
                        $('#waToastText').html('<span style="color: #25D366;"><i class="bi bi-check-circle-fill"></i> Completed!</span>');
                        $('#waToastBar').removeClass('progress-bar-animated');
                        $('#waToastDetail').text('All 3000+ surveys sent successfully.');

                        if (typeof toastr !== 'undefined') {
                            toastr.success('Bulk WhatsApp Survey Completed!', 'Success');
                        }

                        // Auto-hide after 5 seconds
                        setTimeout(() => {
                            $('#whatsappToast').fadeOut();
                        }, 5000);
                    }
                },
                error: function (xhr) {
                    console.error(xhr);
                    $('#waToastText').html('<span style="color: #dc3545;"><i class="bi bi-x-circle-fill"></i> Error occurred</span>');
                    $('#waToastBar').addClass('bg-danger').removeClass('progress-bar-animated');
                    $('#waToastDetail').text('Status: ' + (xhr.responseJSON?.message || 'Connection failed'));
                }
            });
        }
    </script>

    @include('layouts.footer')