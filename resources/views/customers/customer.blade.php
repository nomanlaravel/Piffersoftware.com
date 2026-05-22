@include('layouts.header')

@yield('main')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

{{-- DataTables CSS --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<div class="customer_form">
    <div class="tab-content" id="myTabContent" style="margin-left: -25px;">
        <div class="tab-pane fade show active flex ml-0" id="branches" role="tabpanel" aria-labelledby="home-tab">
            <div class="modal-header border-0 d-flex justify-content-between align-items-center">
                <div style="display:flex; column-gap:10px; align-items:center">
                    <button type="button" class="btn btn-link" onclick="history.back()">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                    <h5 class="mt-3" style="font-weight: 700;">Customers:</h5>
                </div>

                <div>
                    @include('headerlogout')
                </div>
            </div>
        </div>
    </div>

    
    @if (!$customers->isEmpty())
        <div class="accordion mb-3" id="totalCustomerAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTotalCustomer">
                    <button class="accordion-button text-white" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTotalCustomer" aria-expanded="true" aria-controls="collapseTotalCustomer" style="background-color: rgb(105, 196, 48);">
                        Customer Management
                    </button>
                </h2>

                    <div id="collapseTotalCustomer" class="accordion-collapse collapse show"

                    aria-labelledby="headingTotalCustomer" data-bs-parent="#totalCustomerAccordion">
                    <div class="accordion-body">
                        @if (Auth::user()->role != 'customer')
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <h4><i><b>Import Customers:</b></i></h4>

                                    <form action="{{ route('import.customers') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="file" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <h4><i><b>Search Customers:</b></i></h4>

                                    <div class="input-group mb-3">
                                        <input type="text" id="customer-search-top" class="form-control"
                                            placeholder="Search here...">
                                    </div>





                                </div>
                            </div>
                        @endif


@if(auth()->user()->hasAnyRole('Super Admin', 'Admin'))

    <div class="new_branch mt-2">
        <a href="{{ url('postcustomer') }}">
            <button>+ New Customer</button>
        </a>
    </div>

    @if ($customers->isEmpty())
        <p>No customers found.</p>
    @else

        <ul class="nav nav-tabs" id="myTab" role="tablist">

            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                    data-bs-target="#home" type="button" role="tab"
                    aria-controls="home" aria-selected="true">
                    Site Id Report
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                    data-bs-target="#profile" type="button" role="tab"
                    aria-controls="profile" aria-selected="false">
                    List Of Site ID
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                    data-bs-target="#contact" type="button" role="tab"
                    aria-controls="contact" aria-selected="false">
                    Monthly Site ID Report
                </button>
            </li>

        </ul>

        <div class="tab-content mt-4" id="myTabContent">

            <div class="tab-pane fade show active" id="home" role="tabpanel"
                aria-labelledby="home-tab">

                <form method="GET" action="{{ route('search_customer') }}">

                    <div class="row mb-4">

                        <div class="col-md-3">
                            <label>Customer Name</label>
                            <input type="text" name="customers_name"
                                class="form-control"
                                value="{{ request('customers_name') }}">
                        </div>

                        <div class="col-md-3">
                            <label>Customer Region</label>
                            <input type="text" name="customers_region"
                                class="form-control"
                                value="{{ request('customers_region') }}">
                        </div>

                        <div class="col-md-3">
                            <label>Customer ID</label>
                            <input type="text" name="customers_id"
                                class="form-control"
                                value="{{ request('customers_id') }}">
                        </div>

                        <div class="col-md-3">
                            <label for="payment">Payment Type</label>

                            <select name="payment" id="payment"
                                class="form-control">

                                <option value="">-- Select Payment Type --</option>

                                <option value="1"
                                    {{ request('payment') == '1' ? 'selected' : '' }}>
                                    Cash
                                </option>

                                <option value="2"
                                    {{ request('payment') == '2' ? 'selected' : '' }}>
                                    Cheque
                                </option>

                                <option value="0"
                                    {{ request('payment') == '0' ? 'selected' : '' }}>
                                    Others
                                </option>

                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="customers_activation_check">
                                Activation Status
                            </label>

                            <select name="customers_activation_check"
                                id="customers_activation_check"
                                class="form-control">

                                <option value="">-- Select Status --</option>

                                <option value="1"
                                    {{ request('customers_activation_check') == '1' ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="0"
                                    {{ request('customers_activation_check') == '0' ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>Date of Entry</label>

                            <input type="date" name="date_of_entry"
                                class="form-control"
                                value="{{ request('date_of_entry') }}">
                        </div>

                        <div class="col-md-2 mt-4">
                            <button type="submit"
                                class="btn btn-outline-light">

                                <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png"
                                    alt="" width="30px" height="30px">

                            </button>
                        </div>

                    </div>

                </form>

            </div>

            <div class="tab-pane fade" id="profile"
                role="tabpanel"
                aria-labelledby="profile-tab">

                <form method="GET"
                    action="{{ route('search_customer_id') }}">

                    <div class="row mb-4">

                        <div class="col-md-3">
                            <label>Customer ID</label>

                            <input type="text"
                                name="customers_id"
                                class="form-control"
                                value="{{ request('customers_id') }}">
                        </div>

                        <div class="col-md-2 mt-4">
                            <button type="submit"
                                class="btn btn-outline-light">

                                <img src="https://cdn-icons-png.flaticon.com/128/18444/18444736.png"
                                    alt="" width="30px" height="30px">

                            </button>
                        </div>

                    </div>

                </form>

            </div>

            <div class="tab-pane fade" id="contact"
                role="tabpanel"
                aria-labelledby="contact-tab">

                <form method="GET"
                    action="{{ route('search_customer_yearly') }}">

                    <div class="row mb-3">

                        <div class="col-md-3">
                            <label for="year">Select Year</label>

                            <select name="year"
                                id="year"
                                class="form-control">

                                <option value="">
                                    -- Select Year --
                                </option>

                                @foreach(range(now()->year, now()->year - 5) as $year)

                                    <option value="{{ $year }}"
                                        {{ request('year') == $year ? 'selected' : '' }}>

                                        {{ $year }}

                                    </option>

                                @endforeach

                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="customers_id">
                                Customer ID
                            </label>

                            <input type="text"
                                name="customers_id"
                                class="form-control"
                                value="{{ request('customers_id') }}">
                        </div>

                        <div class="col-md-2 align-self-end">
                            <button type="submit"
                                class="btn btn-dark">
                                Search
                            </button>
                        </div>

                    </div>

                </form>

            </div>

        </div>

    @endif

@endif





        <div class="table-responsive">
            <table id="customersTable" class="table table-bordered table-striped table-fixed mt-3">
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Customer Legal Name</th>
                        <th>Phone Number</th>
                        <th>Customers Region</th>

                        <th>Qr Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        @php
                            $notificationCount = App\Models\ReminderNotification::where('user_id', $customer->id)->where('is_read', 0)->where('entity_type', 'customer')->count();
                        @endphp
                        <tr>
                            <td>{{ $customer->customers_id }}</td>
                            <td>{{ $customer->customers_name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->customers_region }}</td>
                            <td>
                                @if($customer->qrcode_path)
                                    <div class="text-center">
                                        <a href="{{ asset($customer->qrcode_path) }}" target="_blank">
                                            <img src="{{ asset($customer->qrcode_path) }}" alt="QR Code" width="50" style="border: 1px solid #ddd; padding: 2px;">
                                        </a>
                                        <br>
                                        <a href="{{ asset($customer->qrcode_path) }}" download class="btn btn-sm btn-outline-info mt-1" title="Download QR Code">
                                            <i class="fa-solid fa-download"></i> Download
                                        </a>
                                    </div>
                                @else
                                    <span class="text-muted">No QR Code</span>
                                @endif
                            </td>
                            <td class="d-flex gap-2">
                                @if($customer->notification_status == 1)
                                    <div style="position: relative; display: inline-block;">
                                        <a href="{{ route('allnotifications', $customer->id) }}" style="color: inherit;">
                                            <i class="fa fa-bell" style="font-size: 24px; cursor: pointer;"></i>
                                            @if($notificationCount > 0)
                                                <span
                                                    style="position: absolute; top: -8px; right: -8px;
                                                                                                                        background: red; color: white;
                                                                                                                        border-radius: 50%; padding: 3px 7px;
                                                                                                                        font-size: 12px;">
                                                    {{ $notificationCount }}
                                                </span>
                                            @endif
                                        </a>
                                    </div>
                                @endif
                                <a href="{{ route('notification.status', $customer->id) }}"
                                    class="btn {{$customer->notification_status == 1 ? 'btn-primary' : 'btn-secondary'}} btn-sm">
                                    <i
                                        class="fa-solid {{$customer->notification_status == 1 ? 'fa-toggle-on' : 'fa-toggle-off'}}"></i>
                                </a>
                                <a href="{{ route('viewcustomer', ['id' => $customer->id]) }}" class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                @if (Auth::user()->role != 'customer' && Auth::user()->role != 'client')
                                    <a href="{{ route('editcustomer', ['id' => $customer->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                @endif
                                <a title="customers" class="btn btn-secondary btn-sm"
                                    href="{{ route('sub_customer', ['id' => $customer->id])}}">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                                @if (Auth::user()->role != 'user')
                                    <a title="guards" class="btn btn-secondary btn-sm"
                                        href="{{ route('getcustomer.guards', ['id' => $customer->id]) }}">
                                        <i class="fa-solid fa-user"></i>
                                    </a>
                                @endif
                                @if (
                                        auth()->user()->hasAnyRole('Super Admin')
                                    )
                                    @if (auth()->user()->role !== 'client')

                                        <a href="{{ route('deletecustomer', ['id' => $customer->id]) }}" class="btn btn-danger btn-sm">
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

<script>
     </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>


<script>

    // Sync top search with DataTables search

    $(document).ready(function () {
        var table = $('#customersTable').DataTable({
            responsive: true,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50, 100],
            dom: 'lfrtip',
            language: {
                search: "Search customers:",
                searchPlaceholder: "Search..."
            }
        });

        // Sync top search input with DataTable search
        $('#customer-search-top').on('input keyup', function() {
            var value = $(this).val();
            table.search(value).draw();
        });

        // Optional: Sync DataTable search back to top input
        $('.dataTables_filter input').on('input keyup', function() {
            $('#customer-search-top').val($(this).val());
        });
    });



</script>