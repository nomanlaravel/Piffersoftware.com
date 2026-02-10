@include('layouts.header')

{{-- External CSS Vendors --}}
@include('vendors.data-tables')
@include('vendors.toastr')
@include('vendors.sweet-alerts')

{{-- Shared Attendance Module Styles --}}
@include('attendance_management.shared.styles')

<div class="customer_form">
    @include('headerlogout')

    {{-- Breadcrumb with Add Button --}}
    <x-bread-crumb-component :modal="true" modalId="add_holiday" modalType="Holiday" :showClock="'false'" />

    {{-- Success Alert --}}
    @if (Session::has('message') || isset($message))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check" aria-hidden="true"></i><strong class="ml-2">{{ Session::get('message') }}
                {{ $message ?? 'Done' }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    <div class="table-card">
        <div class="table-card-header">
            <div>
                <div class="table-card-title">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Holidays Management</span>
                </div>
                <p class="table-card-subtitle">Configure and manage company holidays and weekends</p>
            </div>
            <button class="btn-refresh" id="btn-refresh-table">
                <i class="fas fa-sync-alt"></i>
                <span>Refresh Data</span>
            </button>
        </div>
        <div class="table-card-body">
            <div class="table-responsive">
                <table class="table table-hover holidays-table w-100">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Holiday Title</th>
                            <th>Is_Paid</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Created by</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- DataTables populated via JS -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Create Holiday Modal -->
    <div class="modal fade" id="add_holiday" tabindex="-1" aria-labelledby="addHolidayLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{route('dashboard.holidays.store')}}" class="modal-content border-0 shadow-lg"
                id="holidayForm" style="border-radius: 16px;">
                @csrf
                <div class="modal-header bg-light border-bottom-0 p-4">
                    <h5 class="modal-title fw-bold" id="addHolidayLabel">Create New Holiday</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div id="methodField"></div>
                    <input type="hidden" name="id" id="holiday_id">
                    <div class="mb-3">
                        <label for="holiday_title"
                            class="form-label fw-semibold text-muted small text-uppercase">Title</label>
                        <input type="text" required class="form-control form-control-lg bg-light border-0"
                            name="holiday_title" placeholder="E.g; Eid, Kashmir Day">
                    </div>
                    <div class="mb-3">
                        <label for="holiday_date"
                            class="form-label fw-semibold text-muted small text-uppercase">Date</label>
                        <input type="date" required class="form-control form-control-lg bg-light border-0"
                            name="holiday_date">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="is_paid" class="form-label fw-semibold text-muted small text-uppercase">Is
                                Paid?</label>
                            <select name="is_paid" id="is_paid" required
                                class="form-select form-select-lg bg-light border-0">
                                <option value="" selected disabled>-- Select --</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="type"
                                class="form-label fw-semibold text-muted small text-uppercase">Type</label>
                            <select name="type" id="type" required class="form-select form-select-lg bg-light border-0">
                                <option value="" selected disabled>-- Select --</option>
                                <option value="holiday">Holiday</option>
                                <option value="weekend">Weekend</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 p-4 pt-0">
                    <button type="button" class="btn btn-light btn-lg px-4" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="holidaySubmitBtn" class="btn btn-primary btn-lg px-4 shadow-sm">Create
                        Holiday</button>
                </div>
            </form>
        </div>
    </div>

    <x-modal-leave-comment-component />
</div>


{{-- Shared Scripts --}}
@include('attendance_management.shared.scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('js/core/holidays/main.js') }}"></script>
<script src="{{ asset('js/core/holidays/table.js') }}"></script>

@include('layouts.footer')


<script>
    const $form = $('#holidayForm');
    const $label = $('#addHolidayLabel');
    const $submit = $('#holidaySubmitBtn');
    const $methodField = $('#methodField');
    const $title = $('[name="holiday_title"]');
    const $date = $('[name="holiday_date"]');
    const $is_paid = $('[name="is_paid"]');
    const $type = $('[name="type"]');

    // CREATE mode (triggered by manual button or breadcrumb)
    // Breadcrumb component button ID might be different. x-bread-crumb-component uses modalId="add_holiday".
    // So button usually targets #add_holiday. Data-bs-target="#holidayModal" is needed.
    // The component probably generates a button with data-toggle="modal" data-target="#add_holiday".
    // I should ensure the modal ID matches.
    // Component passed `modalId="add_holiday"`. So modal should have id="add_holiday".
    // NOTE: The modal ID in line 66 of snippet was 'holidayModal'.
    // I'll change it to 'add_holiday' to match breadcrumb component expectation.

    // CREATE mode
  // The breadcrumb button (if present) just opens the modal. We need to reset the form.
  $('#add_holiday').on('show.bs.modal', function (event) {
      
      const button = $(event.relatedTarget);
      if (button.hasClass('btnEditHoliday')) {
          // Edit mode handled below
      } else {
          // Assumed Create Mode
            $label.text('Create New Holiday');
            $submit.text('Create Holiday');
            $form.attr('action', "{{ route('dashboard.holidays.store') }}");
            $methodField.html('@method("POST")'); 
            $form[0].reset();
            $('#holiday_id').val(''); // Clear ID
      }
  });


  // EDIT mode
  $(document).on('click', '.btnEditHoliday', function () {
    const id = $(this).data('id');
    const title = $(this).data('title');
    const date = $(this).data('date');
    const type = $(this).data('type');
    const is_paid = $(this).data('is_paid');

    $label.text('Edit Holiday');
    $submit.text('Update Holiday');

    // Use store route for update as well, relying on hidden ID
    $form.attr('action', "{{ route('dashboard.holidays.store') }}");
    $methodField.html('@method("POST")');

    $('#holiday_id').val(id); // Set hidden ID
    $title.val(title);
    $date.val(date);
    $type.val(type);
    $is_paid.val(is_paid);
  });
</script>