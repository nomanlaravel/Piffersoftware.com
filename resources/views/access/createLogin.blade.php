@include('layouts.header')
@yield('main')
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Create User</h5>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-4 spacing-right ">
                    Customer Name <br>
                    <select id="customer_name" class="form-control mt-5" name="customer_name">
                        <option value="">Select Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->customers_name }}">{{ $customer->customers_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4 spacing-right">
                    Email <br>
                    <input class="form-control" name="email" type="email" placeholder="..." style="width: 100%;" required>
                </div>
                <div class="col-lg-4 spacing-right">
                    Password <br>
                    <input class="form-control" name="password" type="password" placeholder="..." style="width: 100%;" required>
                </div>
                <div class="col-lg-4 spacing-right">
                    Role <br>
                    <select id="role" class="form-control mt-1" name="role" required>
                        <option value="">Select Role</option>
                         @foreach ($roles as $role)
                            <option value="{{ $role->name }}" >{{ $role->name }}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
    <div class="row mt-5 g-4">
    <!-- User Card -->
    <div class="col-md-3">
        <div class="card bg-primary text-white rounded" data-role="user">
            <div class=""></div>
            <div class=" p-4 position-relative z-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1 opacity-90">Total Users</h5>
                        <h2 class="mb-0 fw-bolder">{{ $users->where('role', 'user')->count() }}</h2>
                        <!--<small class="opacity-75">Active accounts</small>-->
                    </div>
                    <div class="icon-circle bg-opacity-20 backdrop-blur-sm">
                      <i class="fa-solid fa-users fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="ripple"></div>
        </div>
    </div>
    <!-- Customer Card -->
    <div class="col-md-3">
        <div class="card bg-secondary text-white rounded" data-role="customer">
     
            <div class="card-content p-4 position-relative z-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1 opacity-90">Total Customers</h5>
                        <h2 class="mb-0 fw-bolder">{{ $users->where('role', 'customer')->count() }}</h2>
                        <!--<small class="opacity-75">Registered clients</small>-->
                    </div>
                    <div class="icon-circle bg-opacity-20 backdrop-blur-sm">
                        <i class="fa-solid fa-users fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="ripple"></div>
        </div>
    </div>
    <!-- Client Card -->
    <div class="col-md-3">
        <div class="card bg-warning text-white rounded" data-role="client">
  
            <div class="card-content p-4 position-relative z-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1 opacity-90">Total Clients</h5>
                        <h2 class="mb-0 fw-bolder">{{ $users->where('role', 'client')->count() }}</h2>
                        <!--<small class="opacity-75">Business partners</small>-->
                    </div>
                    <div class="icon-circle bg-opacity-20 backdrop-blur-sm">
                      <i class="fa-solid fa-users fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="ripple"></div>
        </div>
    </div>
    <!-- All Users Card -->
    <div class="col-md-3">
        <div class="card bg-primary text-white rounded" data-role="">
       
            <div class=" p-4 position-relative z-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1 opacity-90">All Users</h5>
                        <h2 class="mb-0 fw-bolder">{{ $users->count() }}</h2>
                        <!--<small class="opacity-75">Total members</small>-->
                    </div>
                    <div class="icon-circle bg-opacity-20 backdrop-blur-sm">
                        <i class="fa-solid fa-users fs-1"></i>
                    </div>
                </div>
            </div>
            <div class="ripple"></div>
        </div>
    </div>
</div>
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="mt-5">Existing Users :</h5>
    <div class="btn btn-primary">
        <a class="text-white" href="{{ route('roles.index') }}"><i class='bx bx-radio-circle'></i>All Roles</a>
    </div>
    </div>
    <div class="table-container">
        <div class="table-responsive">
            <table id="usersTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index=>$user)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                              @if ($user->role==="user")
                               <span class="badge bg-info">User</span>
                               @elseif ($user->role==="customer")
                               <span class="badge bg-secondary">Customer</span>
                               @elseif ($user->role==="client")
                               <span class="badge bg-primary">Client</span>
                                @else
                                <span class="badge bg-danger">No Role</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-light" href="{{ route('edit_access_role',$user->id) }}">
                                    Assign Access Rights
                                    <!--<img src="{{ asset('https://img.icons8.com/?size=80&id=MSUL5d8gbzWA&format=png') }}" width="30px" height="30px">-->
                                </a>
                                <a class="btn " href="{{route('admin_delete_customer',$user->id)}}">
                                    <img src="{{ asset('https://cdn1.iconfinder.com/data/icons/creative-round-ui/217/50-64.png') }}" width="30px" height="30px">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<!-- CSS and JS Dependencies -->
<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<!-- Google Fonts for Handwritten Font -->
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
<style>
    .customer_form {
        padding: 20px;
    }
    .table-container {
        background-color: #fcfcfc;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        margin-top: 20px;
    }
    table.dataTable {
        border-collapse: collapse;
        width: 100%;
        font-size: 1.2em;
    }
    table.dataTable thead th {
        background-color: #ededed;
        border-bottom: 2px solid #ccc;
        padding: 10px;
        text-align: left;
    }
    table.dataTable tbody td {
        border-bottom: 1px solid #ddd;
        padding: 10px;
    }
    table.dataTable tbody tr:hover {
        background-color: #efefef;
    }
    .card{
        cursor:pointer;
    }
    /* DataTables Styling */
    .dataTables_wrapper .dataTables_filter input {
        font-size: 1.2em;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px;
    }
    .dataTables_wrapper .dataTables_length select {
        font-size: 1.2em;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        font-size: 1.2em;
        border: none;
        background: none;
        padding: 5px 10px;
        color: #333;
        border-radius: 20px !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        border-radius: 20px !important;
        border-radius: 5px;
    }
    .page-link{
        border-radius: 10px !important;
    }
    .dataTables_wrapper .dataTables_info {
        font-size: 1.2em;
    }
</style>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize Select2
        $('#customer_name').select2({
            placeholder: "Search Customer",
            allowClear: true,
            width: '100%',
        });
        // Initialize DataTables and assign to variable
        var table = $('#usersTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "responsive": true,
            "language": {
                "search": "Search:"
            },
            "columnDefs": [
                { "orderable": false, "targets": 0 }
            ]
        });

        // Role Card Click → Filter Table
        $('.rounded').on('click', function() {
            let role = $(this).data('role');
            // Remove active class from all cards
            $('.rounded').removeClass('border border-white border-3 shadow-lg');
            // Add active style to clicked card
            $(this).addClass('border border-white border-3 shadow-lg');
            // Filter table
            if (role === '') {
                table.search('').columns().search('').draw(); // Show all
            } else {
                let displayRole = role.charAt(0).toUpperCase() + role.slice(1); // "user" -> "User"
                table.column(2).search('^' + displayRole + '$', true, false).draw();
            }
        });
        // Optional: Highlight "All Users" card by default
        $('.role-card[data-role=""]').addClass('border border-white border-3 shadow-lg');
    });
</script>