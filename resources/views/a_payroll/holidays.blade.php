@include('layouts.header')

@yield('main')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

{{-- DataTables CSS --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<div class="customer_form">
    @include('headerlogout')
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#branches" type="button"
                role="tab" aria-controls="branches" aria-selected="true"> Total Customers
            </button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">
            <div class="modal-header border-0">
                <div style="display:flex; column-gap:10px; align-items:center">
                    <button type="button" class="btn btn-link" onclick="history.back()">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                    <h5 class="mt-3" style="font-weight: 700;">Customers: </h5>
                </div>
            </div>


            @if (Auth::user()->role != 'holiday' && Auth::user()->role != 'client')
            <div class="new_branch mt-2">
                <button type="button" class="btn btn-primary px-3" data-bs-toggle="modal"
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
                            <th>Customer ID</th>
                            <th>Customer Legal Name</th>
                            <th>Phone Number</th>
                            <th>Customers Region</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($holidays as $holiday)
                        <tr>
                            <td>{{ $holiday->customers_id }}</td>
                            <td>{{ $holiday->customers_name }}</td>
                            <td>{{ $holiday->phone }}</td>
                            <td>{{ $holiday->customers_region }}</td>
                        </tr>


                        @endforeach

                    </tbody>
                </table>
            </div>
            @endif



        </div>
    </div>

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="holidayModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="holidayModalLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form id="deleteForm" action="" method="POST">
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
            <form method="post" action="{{route('dashboard.holidays.store')}}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="holidayModalLabel">Create New Holiday</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="holiday_title" class="form-label">Title</label>
                        <input type="text" required class="form-control" id="holiday_title" placeholder="E.g; Eid, Kashmir">
                    </div>
                    <div class="mb-3">
                        <label for="holiday_date" class="form-label">Date</label>
                        <input type="date" required class="form-control" id="holiday_date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
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