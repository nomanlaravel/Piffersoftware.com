@include('layouts.header')

@yield('main')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

{{-- DataTables CSS --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<div class="customer_form">
    @include('headerlogout')

    <div>
        <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">
            <div class="modal-header border-0">
                <div style="display:flex; column-gap:10px; align-items:center">
                    <button type="button" class="btn btn-link" onclick="history.back()">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                    <h5 class="mt-3" style="font-weight: 700;">Holidays: </h5>
                </div>
            </div>


            @if (Auth::user()->role != 'customer' && Auth::user()->role != 'client')
            <div class="new_branch my-2">
                <button type="button" id="btnCreateHoliday" class="btn btn-primary px-3" data-bs-toggle="modal"
                    data-bs-target="#holidayModal">
                    <i class="fa-solid fa-plus"></i> Add Holiday
                </button>
            </div>
            @endif
            @if ($holidays->isEmpty())
            <p>No Holidays found.</p>
            @else

            <div class="table-responsive">
                <table id="holidaysTable" class="table table-bordered table-striped table-fixed mt-3">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Holiday Title</th>
                            <th>Is_Paid</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Created by</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($holidays as $holiday)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $holiday->title }}</td>
                            <td>{{ $holiday->is_paid ? 'Yes' : 'No' }}</td>
                            <td>{{ $holiday->type }}</td>
                            <td>{{ $holiday->date }}</td>
                            <td>{{ $holiday->user['name'] }}</td>
                            <td class="d-flex gap-2">

                                @if (Auth::user()->role != 'customer' && Auth::user()->role != 'client')
                                <a href="javascript:void(0)"
                                    class="btn btn-primary btn-sm btnEditHoliday"
                                    data-bs-toggle="modal"
                                    data-bs-target="#holidayModal"
                                    data-id="{{$holiday->id}}"
                                    data-title={{$holiday->title}}
                                    data-date={{\Carbon\Carbon::parse($holiday->date)->format('Y-m-d')}}
                                    data-is_paid={{$holiday->is_paid}}
                                    data-type={{$holiday->type}}>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                @endif
                                @if (
                                auth()->user()->hasAnyRole('Super Admin')
                                )
                                @if (auth()->user()->role !== 'client')

                                <a href="javascript:void(0)"
                                    class="btn btn-danger btn-sm btnDeleteHoliday"
                                    data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal"
                                    data-id="{{$holiday->id}}"
                                    >
                                    <i class="fa-solid fa-trash"></i>
                                </a>

                                @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            @endif



        </div>
    </div>


    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="holidayDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="holidayDeleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
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
</div>
@include('layouts.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>


<script>
    $(document).ready(function () {
        // INIT DATATABLE
        var table = $('#holidaysTable').DataTable({
            responsive: true,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50, 100],
        });

        $('#holiday-search').on('keyup', function () {
            table.search(this.value).draw();
        });
    });
</script>

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
