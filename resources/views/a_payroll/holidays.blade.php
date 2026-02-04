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
                    <a href="{{ url('postcustomer') }}"><button>+ Add Holiday</button></a>
                </div>
            @endif
            @if ($holidays->isEmpty())
                <p>No Holidays found.</p>
            @else

                <div class="table-responsive">
                    <table id="customersTable" class="table table-bordered table-striped table-fixed mt-3">
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

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
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
</div>
@include('layouts.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>


<script>
    $(document).ready(function () {
        function searchCustomers() {
            var searchText = $('#holiday-search').val().toLowerCase();
            $.ajax({
                url: "{{ route('search.holidays') }}",
                type: 'GET',
                data: { search: searchText },
                success: function (data) {
                    // Update the table body with the new rows
                    $('table tbody').html(data.html);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX error: ", status, error);
                    console.error("Response: ", xhr.responseText);
                    $('table tbody').html('<tr><td colspan="4">There was an error processing your request.</td></tr>');
                }
            });
        }

        $('#search-button').click(searchCustomers);

        $('#holiday-search').on('input', searchCustomers);
    });

    $(document).ready(function () {
        // INIT DATATABLE
        var table = $('#customersTable').DataTable({
            responsive: true,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50, 100],
        });
    });
</script>