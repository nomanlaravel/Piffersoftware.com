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

<h3 style="font-weight: 700; margin-left: 205px;">PIFFERS SECURITY SERVICES PVT.LTD</h3>


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
        </h5>
    </div>
</div>

<!-- Notification Alerts -->
<div class="container" style="max-width: 1200px; margin: 0 auto;">
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

            <form action="{{ route('customer.email.send') }}" method="POST" enctype="multipart/form-data" id="composeEmailForm">
                @csrf

                <div class="modal-header"
                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                           border-radius: 12px 12px 0 0; padding: 1.5rem; border: none;">
                    <h5 class="modal-title text-white" id="composerEmailLabel" style="font-weight: 600; font-size: 1.25rem;">
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

                            <div class="custom-dropdown-menu" id="customDropdownMenu"
                                style="position: absolute; top: 100%; left: 0; right: 0; background: white;
                                       border: 2px solid #667eea; border-radius: 8px; margin-top: 8px; z-index: 1000;
                                       box-shadow: 0 8px 24px rgba(102, 126, 234, 0.15);">

                                <!-- Search -->
                                <div style="padding: 12px; border-bottom: 1px solid #e0e0e0;">
                                    <input type="text" id="customerSearch" class="form-control"
                                        placeholder="Search customers..."
                                        style="border: 1px solid #e0e0e0; border-radius: 6px; padding: 8px 12px;">
                                </div>

                                <!-- Select All -->
                                <div class="customer-option select-all-option"
                                    style="padding: 12px 16px; border-bottom: 2px solid #667eea;
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
                                            <div class="customer-option"
                                                data-email="{{ strtolower($customer->email) }}"
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
                                            <i class="bi bi-inbox" style="font-size: 2rem; display: block; margin-bottom: 8px;"></i>
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
                            placeholder="Write your message here..." required>{{ old('email_message') }}</textarea>
                    </div>

                    <!-- Attachment -->
                    <div class="form-group">
                        <label for="emailAttachment" class="font-weight-bold">
                            <i class="bi bi-paperclip mr-2" style="color: #667eea;"></i>Attachment (optional)
                        </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="emailAttachment" name="emailAttachment">
                            <label class="custom-file-label" for="emailAttachment">Choose file...</label>
                        </div>
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

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

    const sendToAllInput = $('#sendToAllInput');
    const excludedContainer = $('#excludedCustomersContainer');

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

    // ✅ Search
    customerSearch.on('keyup', function () {
        const term = $(this).val().toLowerCase();

        $('#customerList .customer-option').each(function () {
            const email = $(this).data('email');
            if (!email) return;
            $(this).toggle(email.includes(term));
        });
    });

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

    // ✅ Attachment label
    $('#emailAttachment').on('change', function () {
        const fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName || 'Choose file...');
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
        $('#customerList .customer-option').show();
        $('#emailAttachment').next('.custom-file-label').html('Choose file...');
    });

    updateSelectedCount();

    // Debug submit
    $('#composeEmailForm').on('submit', function () {
        const formData = new FormData(this);
        console.log('--- SUBMIT ---');
        console.log('send_to_all:', formData.get('send_to_all'));
        console.log('customers[]:', formData.getAll('customers[]'));
        console.log('excluded_customers[]:', formData.getAll('excluded_customers[]'));
        console.log('subject:', formData.get('email_subject'));
        console.log('message:', formData.get('email_message'));
    });

});
</script>

@include('layouts.footer')