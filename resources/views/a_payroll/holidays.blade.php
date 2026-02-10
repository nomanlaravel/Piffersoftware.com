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
                <i class="fas fa-calendar-check"></i>
                <span>Leave Requests History</span>
            </div>
            <p class="table-card-subtitle">Track and manage employee leave applications</p>
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
    <div class="modal fade" id="holidayModal" tabindex="-1" aria-labelledby="holidayModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{route('dashboard.holidays.store')}}" class="modal-content" id="holidayForm">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="holidayModalLabel">Create New Holiday</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="methodField">

                    </div>
                    <div class="mb-3">
                        <label for="holiday_title" class="form-label">Title</label>
                        <input type="text" required class="form-control" name="holiday_title"
                            placeholder="E.g; Eid, Kashmir">
                    </div>
                    <div class="mb-3">
                        <label for="holiday_date" class="form-label">Date</label>
                        <input type="date" required class="form-control" name="holiday_date">
                    </div>
                    <div class="mb-3">
                        <label for="is_paid" class="form-label">Is_paid</label>
                        <select name="is_paid" id="is_paid" required class="form-control">
                            <option value="" selected>-- select --</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" id="type" required class="form-control">
                            <option value="" selected>-- select --</option>
                            <option value="holiday">Holiday</option>
                            <option value="weekend">Weekend</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="holidaySubmitBtn" class="btn btn-primary">Save changes</button>
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
  const $label = $('#holidayModalLabel');
  const $submit = $('#holidaySubmitBtn');
  const $methodField = $('#methodField');
  const $title = $('[name="holiday_title"]');
  const $date = $('[name="holiday_date"]');
  const $is_paid = $('[name="is_paid"]');
  const $type = $('[name="type"]');

  // CREATE mode
  $('#btnCreateHoliday').on('click', function () {
    $label.text('Create New Holiday');
    $submit.text('Create');

    $form.attr('action', "{{ route('dashboard.holidays.store') }}");
    $methodField.html('@method("POST")'); 

    $title.val('');
    $date.val('');
    $type.val('');
    $is_paid.val('');
  });

  // EDIT mode
  $(document).on('click', '.btnEditHoliday', function () {
    const id = $(this).data('id');
    const title = $(this).data('title');
    const date = $(this).data('date');
    const type = $(this).data('type');
    const is_paid = $(this).data('is_paid');

    $label.text('Edit Holiday');
    $submit.text('Update');

    $title.val(title);
    $date.val(date);
    $type.val(type);
    $is_paid.val(is_paid);
  });

$(document).on('click', '.btnDeleteHoliday', function(){
    const id = $(this).data('id');

    const deleteUrl = 
    "{{ route('dashboard.holidays.delete', ':id') }}".replace(':id', id);

    $("#deleteForm").attr('action', deleteUrl);
});
</script>
